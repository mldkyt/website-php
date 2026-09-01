<?php

function project_handle_post($conn, string $ip, string $project): bool
{
    if (isset($_POST["pc_name"]) && isset($_POST["pc_comment"]) && isset($_POST["mcaptcha__token"])) {
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

        // Check mcaptcha
        $mcaptchaToken = $_POST["mcaptcha__token"];

        $payload = [
            "token" => $mcaptchaToken,
            "key" => getenv("MCAPTCHA_SITE_KEY"),
            "secret" => getenv("MCAPTCHA_SECRET_KEY"),
        ];

        $ch = curl_init(getenv("MCAPTCHA_DOMAIN") . "/api/v1/pow/siteverify");

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
            CURLOPT_POSTFIELDS => json_encode($payload),
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return false;
        }

        $result = json_decode($response, true);

        if (!$result || empty($result["valid"])) {
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
        <label
          data-mcaptcha_url="<?= getenv("MCAPTCHA_DOMAIN") . "/widget/?sitekey=" . getenv("MCAPTCHA_SITE_KEY") ?>"
          for="mcaptcha__token"
          id="mcaptcha__token-label"
        >
          mCaptcha authorization token.
          <a
            href="https://mcaptcha.org/docs/user-manual/how-to-mcaptcha-without-js/"
            >Instructions</a
          >.
          <input type="text" name="mcaptcha__token" id="mcaptcha__token" />
        </label>
        <div id="mcaptcha__widget-container"
            style="width: 300px; height: 75px;"></div>
        <script src="https://unpkg.com/@mcaptcha/vanilla-glue@0.1.0-rc2/dist/index.js"></script>
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
