<?php

require '../components/util.php';

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

$postSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;

    // Check params
    if (!isset($_POST["username"]) || !isset($_POST["message"]) || !isset($_POST["bot"])) {
        $ok = false;
        $postFail = "Missing username or message";
    }

    if ($_POST["bot"] == "automated") {
        $ok = false;
        $postFail = "Bot check failed";
    }

    // Check unpost for current IP
    $res = pg_query_params($conn, "SELECT id FROM guestbook WHERE ip = $1 AND approved = 0", [get_remote_addr()]);
    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postFail = "Please wait for your existing post to get approved before posting another one";
    }

    if ($ok) {
        $username = htmlspecialchars($_POST["username"]);
        $message = htmlspecialchars($_POST["message"]);

        pg_query_params($conn, "INSERT INTO guestbook(ip, \"name\", \"text\") VALUES ($1, $2, $3)", [get_remote_addr(), $username, $message]);

        // send notif (everything is fine if it doesn't succeed)
        if (getenv("NTFY_URL") && getenv("NTFY_TOKEN")) {
            file_get_contents('https://' . getenv("NTFY_URL"), false, stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' =>
                        "Content-Type: text/plain\r\n" .
                        "Title: New Guestbook Post\r\n" .
                        "Actions: view, Admin Panel, https://mldchan.dev/admin/guestbook.php\r\n" .
                        "Authorization: Bearer " . getenv("NTFY_TOKEN"),
                    'content' => 'New guestbook item submitted by ' . $username
                ]
            ]));
        }

        $postSuccess = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../components/global.php'; ?>
    <?php seo("mldchan's guestbook", "mldchan's guestbook for visitors to sign."); ?>
</head>

<body>
    <?php require '../components/header.php'; ?>

    <h1>mldchan's Guestbook</h1>

    <br />

    <div style="border: 2px solid white; padding: 4px;">
        <h2>Create a post</h2>
        <?php if (isset($postFail)) { ?>
        <div class="error">
            <span><?= $postFail; ?></span>
        </div>
        <?php } ?>
        <?php if ($postSuccess) { ?>
        <div class="success">
            <span>Your post was sent successfully, please wait for approval by mldchan for it to show up</span>
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

            <br />
            <label for="bot">Please verify you are not a bot</label>
            <br>
            <select name="bot" id="bot">
                <option value="automated">I'm an automated bot</option>
                <option value="bot">I'm a bot</option>
                <option value="critter">I'm a <i>critter</i></option>
                <option value="human">I'm not an automated bot, not a bot and not a critter</option>
            </select>
            <br />

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
            <h3><?= $row["name"]; ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $row["text"]; ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($row["created_at"])) ?></small></p>
            <small>This post is pending approval and visible only for you</small>
        </div>
    <?php }

    // Show all posts all time
    $res = pg_query($conn, "SELECT \"name\", \"text\", created_at, reply, reply_at FROM guestbook WHERE approved = 1 ORDER BY created_at DESC");
    while ($row = pg_fetch_assoc($res)) { ?>
        <div style="border: 1px solid white; padding: 2px; margin: 2px;">
            <h3><?= $row["name"]; ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $row["text"]; ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($row["created_at"])); ?></small></p>
            <?php if (isset($row["reply"]) && isset($row["reply_at"])) { ?>
            <div style="border: 1px solid white; padding: 2px; margin: 2px;">
                <p style="margin: 0; margin-left: 4px;"><strong>On <?= date("r", strtotime($row["reply_at"])); ?>, reply by mldchan:</strong></p>
                <p style="margin: 0; margin-left: 4px;"><?= $row["reply"]; ?></p>
            </div>
            <?php } ?>
        </div>
    <?php }
    ?>

    <?php require '../components/footer.php'; ?>
</body>

</html>
