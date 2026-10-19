<?php

function project_handle_post($conn, string $ip, string $project): bool
{
    if (isset($_POST["pc_name"]) && isset($_POST["pc_comment"]) && isset($_POST["cf-turnstile-response"])) {
        $name = htmlspecialchars($_POST["pc_name"]);
        $comment = htmlspecialchars($_POST["pc_comment"]);

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

        // Check Cloudflare Turnstile
        $turnstileToken = $_POST["cf-turnstile-response"];

        $payload = [
            "secret" => getenv("TURNSTILE_SECRETKEY"),
            "response" => $turnstileToken,
            "remoteip" => $ip,
        ];

        $ch = curl_init("https://challenges.cloudflare.com/turnstile/v0/siteverify");

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
            CURLOPT_POSTFIELDS => http_build_query($payload),
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return false;
        }

        $result = json_decode($response, true);

        if (!$result || empty($result["success"])) {
            return false;
        }

        pg_query_params($conn, "INSERT INTO project_comments(ip, project, \"name\", comment) VALUES ($1, $2, $3, $4)", [$ip, $project, $name, $comment]);

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
        $host = getenv("DB_POSTGRES_HOST");
        $user = getenv("DB_POSTGRES_USER");
        $pass = getenv("DB_POSTGRES_PASSWORD");
        $name = getenv("DB_POSTGRES_NAME");
        $port = getenv("DB_POSTGRES_PORT") ?: "5432";

        $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
    }

    if (!project_handle_post($conn, $ip, $project)) {
        echo "<p>An error occured while submitting the project comment form. Check if you have filled out the form and have verified the captcha</p>";
    }

    $comments = [];

    $res = pg_query_params($conn, "SELECT ip FROM project_comments WHERE project = $1 AND ip = $2 AND approved = 0", [$project, $ip]);
    $showForm = !pg_fetch_assoc($res);

    $res = pg_query_params("SELECT \"name\", comment FROM project_comments WHERE approved = 1 AND project = $1", [$project]);
    while ($row = pg_fetch_assoc($res)) {
        $comments[] = ["name" => $row["name"], "comment" => $row["comment"]];
    }
    ?>

    <br />
    <br />
    <?php if ($showForm): ?>
    <h2>Post a comment</h2>

    <form method="post">
        <input type="text" name="pc_name" id="pc_name" placeholder="mldkyt" />
        <input type="text" name="pc_comment" id="pc_comment" placeholder="Cool project" />
        <br />
        <div class="cf-turnstile" data-sitekey="<?= getenv("TURNSTILE_SITEKEY") ?>"></div>
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
        <br />
        <button type="submit">Post</button>
    </form>
    <?php endif; ?>

    <h2><?= sizeof($comments) ?> Comments</h2>

    <?php foreach ($comments as $comment): ?>
        <h3><?= $comment["name"] ?></h3>
        <p><?= $comment["comment"] ?></p>
    <?php endforeach;
}
