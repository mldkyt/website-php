<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Administration", "mldkyt's website administration"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <?php
    $host = getenv("DB_POSTGRES_HOST");
    $user = getenv("DB_POSTGRES_USER");
    $pass = getenv("DB_POSTGRES_PASSWORD");
    $name = getenv("DB_POSTGRES_NAME");
    $port = getenv("DB_POSTGRES_PORT") ?: "5432";

    $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

    if ($_SERVER["REQUEST_METHOD"] && isset($_POST["announcement_message"])) {
        $message = htmlspecialchars(stripslashes(trim($_POST["announcement_message"])));
        db_key_set($conn, "announcement_message", $message);
    }

    $unreadAnonymousMessage = pg_query("SELECT COUNT(id) AS unread FROM anonymous_messages");
    $unreadAnonymousMessage = pg_fetch_assoc($unreadAnonymousMessage)["unread"];

    $guestbookUnread = pg_query("SELECT COUNT(id) AS unread FROM guestbook WHERE approved = 0");
    $guestbookUnread = pg_fetch_assoc($guestbookUnread)["unread"];

    $unapprovedProjectComments = pg_query($conn, "SELECT COUNT(id) AS comments FROM project_comments WHERE approved = 0");
    $unapprovedProjectComments = pg_fetch_assoc($unapprovedProjectComments)["comments"];
    ?>

    <h1>Administration</h1>

    <ul>
        <li><a href="/admin/anonymous-messages.php">(<?= $unreadAnonymousMessage ?>) Anonymous Messages</a></li>
        <li><a href="/admin/guestbook.php">(<?= $guestbookUnread ?>) Guestbook Admin Page</a></li>
        <li><a href="/admin/projectComments.php">(<?= $unapprovedProjectComments ?>) Manage project comments</a></li>
        <li><a href="/admin/buttons.php">Manage Buttons</a></li>
        <li><a href="/admin/socials.php">Manage Socials</a></li>
        <li><a href="/admin/contacts.php">Manage Contacts</a></li>
    </ul>

    <h2>Announcement message</h2>
    <form method="post" action="/admin/index.php">
        <label for="announcement_message">Message</label><br>
        <textarea name="announcement_message" id="announcement_message"><?= db_key_get($conn, "announcement_message") ?></textarea>
        <br>
        <br>
        <button type="submit">Set announcement</button>
    </form>

    <?php require "footer.php"; ?>
</body>

</html>
