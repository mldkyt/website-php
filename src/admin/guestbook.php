<?php

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

// Approve post
if (isset($_GET["approve"])) {
    pg_query_params($conn, "UPDATE guestbook SET approved = 1 WHERE id = $1", [$_GET["approve"]]);
}

// Decline/Delete post
if (isset($_GET["delete"])) {
    pg_query_params($conn, "DELETE FROM guestbook WHERE id = $1", [$_GET["delete"]]);
}

// Reply
if (isset($_POST["reply"]) && isset($_POST["id"])) {
    pg_query_params($conn, "UPDATE guestbook SET reply = $2 WHERE id = $1", [$_POST["id"], $_POST["reply"]]);
    pg_query_params($conn, "UPDATE guestbook SET reply_at = now() WHERE id = $1 AND reply_at IS NULL", [$_POST["id"]]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Guestbook Administration", "This is the guestbook admin page"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>
    
    <h1>Guestbook manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Posts to approve</h2>
    <?php
    $res = pg_query($conn, "SELECT id, \"name\", \"text\", ip FROM guestbook WHERE approved = 0 ORDER BY created_at ASC");
    while ($row = pg_fetch_assoc($res)) : ?>
        <div style="padding: 4px; border: 1px dashed white;">
            <p><strong><?= $row["name"]; ?></strong></p>
            <p><strong><?= $row["text"]; ?></strong></p>
            <p><small><?= $row["ip"]; ?></small></p>
            <a href="?approve=<?= $row["id"]; ?>">Approve</a>
            <a href="?delete=<?= $row["id"]; ?>">Decline</a>
        </div>
    <?php endwhile;
    ?>

    <h2>Existing posts</h2>

    <?php
    $res = pg_query($conn, "SELECT id, name, text, ip, reply FROM guestbook WHERE approved = 1 ORDER BY created_at DESC");
    while ($row = pg_fetch_assoc($res)) : ?>
        <div style="padding: 4px; border: 1px solid white;">
            <p><strong><?= $row["name"]; ?></strong></p>
            <p><strong><?= $row["text"]; ?></strong></p>
            <p><small><?= $row["ip"]; ?></small></p>
            <form method="post" action="/admin/guestbook.php">
                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                <textarea name="reply" placeholder="Reply..."><?= isset($row["reply"]) ? $row["reply"] : ""; ?></textarea>
                <button type="submit">Reply</button>
            </form>
            <a href="?delete=<?= $row["id"]; ?>">Delete</a>
        </div>
    <?php endwhile;
    ?>

    <?php require '../../components/footer.php'; ?>
</body>

</html>
