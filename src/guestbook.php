<?php

require '../components/util.php';

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

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
    $query = $conn->prepare("SELECT id FROM guestbook WHERE ip = ? AND approved = 0");
    $query->bind_param("s", get_remote_addr());
    $query->execute();
    if ($query->fetch()) {
        $ok = false;
        $postFail = "Please wait for your existing post to get approved before posting another one.";
    }
    $query->close();

    if ($ok) {
        $username = htmlspecialchars($_POST["username"]);
        $message = htmlspecialchars($_POST["message"]);

        $query = $conn->prepare("INSERT INTO guestbook(ip, name, text) VALUES (?, ?, ?)");
        $query->bind_param("sss", get_remote_addr(), $username, $message);
        $query->execute();
        $query->close();

        $postSuccess = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../components/global.php'; ?>
    <?php seo("lain's guestbook", "lain's guestbook for visitors to sign."); ?>
</head>

<body>
    <?php require '../components/header.php'; ?>
    
    <h1>lain's Guestbook</h1>
    
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
            <span>Your post was sent successfully, please wait for approval by lain for it to show up</span>
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
    $query = $conn->prepare("SELECT name, text, created_at FROM guestbook WHERE ip = ? AND approved = 0");
    $query->bind_param("s", get_remote_addr());
    $query->execute();
    $query->bind_result($name, $text, $createdAt);
    if ($query->fetch()) { ?>
        <div style="border: 1px dashed white; padding: 2px; margin: 2px;">
            <h3><?= $name; ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $text; ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($createdAt)) ?></small></p>
            <small>This post is pending approval and visible only for you</small>
        </div>
    <?php }
    $query->close();

    // Show all posts all time
    $query = $conn->prepare("SELECT name, text, created_at, reply, reply_at FROM guestbook WHERE approved = 1 ORDER BY created_at DESC");
    $query->execute();
    $query->bind_result($name, $text, $createdAt, $reply, $replyAt);
    while ($query->fetch()) { ?>
        <div style="border: 1px solid white; padding: 2px; margin: 2px;">
            <h3><?= $name; ?></h3>
            <p style="margin: 0; margin-left: 4px;"><?= $text; ?></p>
            <p style="margin: 0; margin-left: 4px;"><small><?= date("r", strtotime($createdAt)); ?></small></p>
            <?php if (isset($reply) && isset($replyAt)) { ?>
            <div style="border: 1px solid white; padding: 2px; margin: 2px;">
                <p style="margin: 0; margin-left: 4px;"><strong>On <?= date("r", strtotime($replyAt)); ?>, reply by lain:</strong></p>
                <p style="margin: 0; margin-left: 4px;"><?= $reply; ?></p>
            </div>
            <?php } ?>
        </div>
    <?php }
    $query->close();
    $conn->close();
    ?>

    <?php require '../components/footer.php'; ?>
</body>

</html>