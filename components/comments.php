<?php

require "util.php";
function project_handle_post(mysqli $conn, string $ip, string $project): bool
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

        $query = $conn->prepare(
            "SELECT id FROM project_comments WHERE project = ? AND ip = ? AND approved = 0",
        );
        $query->bind_param("ss", $project, $ip);
        $query->execute();
        if ($query->fetch()) {
            $query->close();
            return false;
        }
        $query->close();

        $query = $conn->prepare(
            "INSERT INTO project_comments(ip, project, name, comment) VALUES (?, ?, ?, ?)",
        );
        $query->bind_param("ssss", $ip, $project, $name, $comment);
        $query->execute();
        $query->close();

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
        $conn = mysqli_connect(
            getenv("MARIADB_HOST"),
            getenv("MARIADB_USER"),
            getenv("MARIADB_PASSWORD"),
            getenv("MARIADB_DATABASE"),
        );
    }

    if (!project_handle_post($conn, $ip, $project)) {
        echo "<p>An error occured while submitting the project comment form. Check if you have filled out the form and have verified the captcha</p>";
    }

    $comments = [];

    $query = $conn->prepare(
        "SELECT id FROM project_comments WHERE project = ? AND ip = ? AND approved = 0",
    );
    $query->bind_param("ss", $project, $ip);
    $query->execute();
    $showForm = !$query->fetch();
    $query->close();

    $query = $conn->prepare(
        "SELECT name, comment FROM project_comments WHERE approved = 1 AND project = ?",
    );
    $query->bind_param("s", $project);
    $query->execute();
    $query->bind_result($commentName, $commentComment);
    while ($query->fetch()) {
        $comments[] = ["name" => $commentName, "comment" => $commentComment];
    }

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
