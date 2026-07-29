<?php

require "../components/util.php";

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

$postSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;

    // Check params
    if (!isset($_POST["username"]) || !isset($_POST["message"]) || !isset($_POST["mcaptcha__token"])) {
        $ok = false;
        $postFail = "Missing username or message";
    }

    if ($_POST["bot"] == "automated") {
        $ok = false;
        $postFail = "Bot check failed";
    }

    // Check if IP is banned
    $res = pg_query_params($conn, "SELECT id FROM guestbook_blocks WHERE ip = $1", [get_remote_addr()]);
    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postFail = "You are banned from posting on this guestbook.";
    }

    // Check unpost for current IP
    $res = pg_query_params($conn, "SELECT id FROM guestbook WHERE ip = $1 AND approved = 0", [get_remote_addr()]);
    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postFail = "Please wait for your existing post to get approved before posting another one";
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
        $ok = false;
        $postFail = "The captcha verification server is unavailable, please try again later";
    }

    $result = json_decode($response, true);

    if (!$result || empty($result["valid"])) {
        $ok = false;
        $postFail = "Captcha failed";
    }

    if ($ok) {
        $username = htmlspecialchars($_POST["username"]);
        $message = htmlspecialchars($_POST["message"]);

        pg_query_params($conn, "INSERT INTO guestbook(ip, \"name\", \"text\") VALUES ($1, $2, $3)", [get_remote_addr(), $username, $message]);

        // send notif (everything is fine if it doesn't succeed)
        if (getenv("NTFY_URL") && getenv("NTFY_TOKEN")) {
            file_get_contents(
                "https://" . getenv("NTFY_URL"),
                false,
                stream_context_create([
                    "http" => [
                        "method" => "POST",
                        "header" =>
                            "Content-Type: text/plain\r\n" .
                            "Title: New Guestbook Post\r\n" .
                            "Actions: view, Admin Panel, https://mldkyt.com/admin/guestbook.php\r\n" .
                            "Authorization: Bearer " .
                            getenv("NTFY_TOKEN"),
                        "content" => "New guestbook item submitted by " . $username,
                    ],
                ]),
            );
        }

        $postSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo("mldkyt's guestbook", "mldkyt's guestbook for visitors to sign."); ?>
</head>

<body>
    <?php require "../components/header.php"; ?>

    <h1>mldkyt's Guestbook</h1>

    <h2>Posting rules</h2>
    <ol>
        <li>No hate speech, bigotry, transphobia, homophobia etc.</li>
        <li>Don't spam on here</li>
        <li>mldkyt reserves the right to ban you off of here</li>
    </ol>

    <br />

    <div style="border: 2px solid white; padding: 4px;">
        <h2>Create a post</h2>
        <?php if (isset($postFail)) { ?>
        <div class="error">
            <span><?= $postFail ?></span>
        </div>
        <?php } ?>
        <?php if ($postSuccess) { ?>
        <div class="success">
            <span>Your post was sent successfully, please wait for approval by mldkyt for it to show up</span>
        </div>
        <?php } ?>

        <form method="post" action="/guestbook.php">
            <label for="username">Username</label>
            <br />
            <input type="text" name="username" id="username" style="width: 400px;" />

            <br />

            <label for="message" style="width: 400px;">Message</label>
            <br />
            <textarea name="message" id="message" cols="60" rows="5"></textarea>

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
            <div id="mcaptcha__widget-container"></div>
            <script src="https://unpkg.com/@mcaptcha/vanilla-glue@0.1.0-rc2/dist/index.js"></script>

            <button type="submit">Send</button>
        </form>
    </div>

    <br />

    <h2>Posts</h2>

    <?php
    // Show unapproved post by us if there's one
    $res = pg_query_params($conn, "SELECT \"name\", \"text\", created_at FROM guestbook WHERE ip = $1 AND approved = 0", [get_remote_addr()]);
    $row = pg_fetch_assoc($res);
    if ($row) { ?>
        <div style="border: 1px dashed white; padding: 2px; margin: 2px;">
            <h3><?= $row["name"] ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $row["text"] ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($row["created_at"])) ?></small></p>
            <small>This post is pending approval and visible only for you</small>
        </div>
    <?php }

    // Show all posts all time
    $res = pg_query($conn, "SELECT \"name\", \"text\", created_at, reply, reply_at FROM guestbook WHERE approved = 1 ORDER BY created_at DESC");
    while ($row = pg_fetch_assoc($res)) { ?>
        <div style="border: 1px solid white; padding: 2px; margin: 2px;">
            <h3><?= $row["name"] ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $row["text"] ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($row["created_at"])) ?></small></p>
            <?php if (isset($row["reply"]) && isset($row["reply_at"])) { ?>
            <div style="border: 1px solid white; padding: 2px; margin: 2px;">
                <p style="margin: 0; margin-left: 4px;"><strong>On <?= date("r", strtotime($row["reply_at"])) ?>, reply by mldkyt:</strong></p>
                <p style="margin: 0; margin-left: 4px;"><?= $row["reply"] ?></p>
            </div>
            <?php } ?>
        </div>
    <?php }
    ?>

    <?php require "../components/footer.php"; ?>
</body>

</html>
