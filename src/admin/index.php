<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Administration", "mldkyt's website administration"); ?>
</head>

<body>
    <?php require "../../components/header.php"; ?>

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
    ?>

    <h1>Administration</h1>

    <ul>
        <li><a href="/admin/guestbook.php">Guestbook Admin Page</a></li>
        <li><a href="/admin/buttons.php">Manage Buttons</a></li>
        <li><a href="/admin/projects.php">Manage Projects</a></li>
        <li><a href="/admin/socials.php">Manage Socials</a></li>
        <li><a href="/admin/contacts.php">Manage Contacts</a></li>
        <li><a href="/admin/updates.php">Manage updates</a></li>
    </ul>

    <h2>Announcement message</h2>
    <form method="post" action="/admin/index.php">
        <label for="announcement_message">Message</label><br>
        <textarea name="announcement_message" id="announcement_message"><?= db_key_get($conn, "announcement_message") ?></textarea>
        <br>
        <br>
        <button type="submit">Set announcement</button>
    </form>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
