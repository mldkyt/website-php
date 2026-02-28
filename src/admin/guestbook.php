<?php
$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));


// Approve post
if (isset($_GET["approve"])) {
    $query = $conn->prepare("UPDATE guestbook SET approved = 1 WHERE id = ?");
    $query->bind_param("i", $_GET["approve"]);
    $query->execute();
    $query->close();
}

// Decline/Delete post
if (isset($_GET["delete"])) {
    $query = $conn->prepare("DELETE FROM guestbook WHERE id = ?");
    $query->bind_param("i", $_GET["delete"]);
    $query->execute();
    $query->close();
}

// Reply
if (isset($_POST["reply"]) && isset($_POST["id"])) {
    // Set reply
    $query = $conn->prepare("UPDATE guestbook SET reply = ? WHERE id = ?");
    $query->bind_param("si", $_POST["reply"], $_POST["id"]);
    $query->execute();
    $query->close();

    // Set reply at and don't update it when reply gets edited
    $query = $conn->prepare("UPDATE guestbook SET reply_at = CURRENT_TIMESTAMP() WHERE id = ? AND reply_at IS NULL");
    $query->bind_param("i", $_POST["id"]);
    $query->execute();
    $query->close();
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
    $query = $conn->prepare("SELECT id, name, text, ip FROM guestbook WHERE approved = 0 ORDER BY created_at ASC");
    $query->execute();
    $query->bind_result($id, $name, $text, $ip);
    while ($query->fetch()) : ?>
        <div style="padding: 4px; border: 1px dashed white;">
            <p><strong><?= $name; ?></strong></p>
            <p><strong><?= $text; ?></strong></p>
            <p><small><?= $ip; ?></small></p>
            <a href="?approve=<?= $id; ?>">Approve</a>
            <a href="?delete=<?= $id; ?>">Decline</a>
        </div>
    <?php endwhile; 
    $query->close();
    ?>

    <h2>Existing posts</h2>

    <?php
    $query = $conn->prepare("SELECT id, name, text, ip, reply FROM guestbook WHERE approved = 1 ORDER BY created_at DESC");
    $query->execute();
    $query->bind_result($id, $name, $text, $ip, $reply);
    while ($query->fetch()) : ?>
        <div style="padding: 4px; border: 1px solid white;">
            <p><strong><?= $name; ?></strong></p>
            <p><strong><?= $text; ?></strong></p>
            <p><small><?= $ip; ?></small></p>
            <form method="post" action="/admin/guestbook.php">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <textarea name="reply" placeholder="Reply..."><?= isset($reply) ? $reply : ""; ?></textarea>
                <button type="submit">Reply</button>
            </form>
            <a href="?delete=<?= $id; ?>">Delete</a>
        </div>
    <?php endwhile;
    $query->close();
    ?>

    <?php require '../../components/footer.php'; ?>
</body>

</html>
<?php
$conn->close();
?>