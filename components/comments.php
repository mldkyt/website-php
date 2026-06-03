<?php

use PgSql\Connection;

function project_handle_post(Connection $conn, string $ip, string $project): bool
{
    if (
        isset($_POST["pc_name"]) &&
        isset($_POST["pc_comment"]) &&
        isset($_POST["pc_verify"])
    ) {
        $name = htmlspecialchars($_POST["pc_name"]);
        $comment = htmlspecialchars($_POST["pc_comment"]);
        $verify = htmlspecialchars($_POST["pc_verify"]);

        if ($verify === "bot") {
            return false;
        }

        if (strlen($name) < 1 || strlen($name) > 20) {
            return false;
        }

        if (strlen($comment) < 4 || strlen($comment) > 500) {
            return false;
        }

        $res = pg_query_params("SELECT id FROM project_comments WHERE project = $1 AND ip = $2 AND approved = 0", [$project, $ip]);
        if (pg_fetch_assoc($res)) {
            return false;
        }

        pg_query_params($conn, "INSERT INTO project_comments(ip, project, \"name\", comment) VALUES ($1, $2, $3, $4)",
            [$ip, $project, $name, $comment]);      

        return true;
    } else {
        return true;
    }
}

function project_comments(string $project)
{
    $ip = get_remote_addr();
    global $conn;
    if (!isset($conn)) {
        $host = getenv('DB_POSTGRES_HOST');
        $user = getenv('DB_POSTGRES_USER');
        $pass = getenv('DB_POSTGRES_PASSWORD');
        $name = getenv('DB_POSTGRES_NAME');
        $port = getenv('DB_POSTGRES_PORT') ?: '5432';

        $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
    }

    if (!project_handle_post($conn, $ip, $project)) {
        echo "<p>An error occured while submitting the project comment form. Check if you have filled out the form and have verified the captcha</p>";
    }

    $comments = [];

    $res = pg_query_params($conn, "SELECT ip FROM project_comments WHERE project = $1 AND ip = $2 AND approved = 0",
        [$project, $ip]);
    $showForm = !pg_fetch_assoc($res);

    $res = pg_query_params("SELECT \"name\", comment FROM project_comments WHERE approved = 1 AND project = $1", [$project]);

    if ($showForm): ?>

    <h2>Post a comment</h2>

    <form method="post">
        <label for="name">Name</label>
        <br />
        <input type="text" name="pc_name" id="pc_name" placeholder="lunya" />
        <br />
        <label for="comment">Comment</label>
        <br />
        <input type="text" name="pc_comment" id="pc_comment" />
        <br />
        <select name="pc_verify" id="pc_verify">
            <option value="bot" selected>I am a bot</option>
            <option value="human">I'm not automated (I am either a bot that isn't automated or a human, or any other critter)</option>
        </select>
        <br />
        <button type="submit">Post</button>
    </form>
    <?php endif;
    ?>

    <h2><?= sizeof($comments) ?> Comments</h2>

    <?php if (sizeof($comments) > 0): ?>

    <?php foreach ($comments as $comment): ?>
        <h3><?= $comment["name"] ?></h3>
        <p><?= $comment["comment"] ?></p>
    <?php endforeach; ?>
    <br />
    <br />
    <br />
    <?php endif;
}
