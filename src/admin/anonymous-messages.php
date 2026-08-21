<?php

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

// Acknowledge post (delete)
if (isset($_GET["acknowledge"])) {
    pg_query_params($conn, "DELETE FROM anonymous_messages WHERE id = $1", [$_GET["acknowledge"]]);
}

// Ban user who made a post
if (isset($_GET["ban"])) {
    $res = pg_query_params($conn, "SELECT ip FROM anonymous_messages WHERE id = $1", [$_GET["ban"]]);
    $data = pg_fetch_assoc($res);
    pg_query_params($conn, "INSERT INTO anonymous_messages_bans(ip) VALUES ($1)", [$data["ip"]]);
    pg_query_params($conn, "DELETE FROM anonymous_messages WHERE id = $1", [$_GET["ban"]]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Anonymous Messages Administration", "This is the anonymous messages admin page"); ?>
</head>

<body>
    <?php require "../../components/header.php"; ?>

    <h1>Anonymous messages manager manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Anonymous messages to read and answer</h2>
    <?php
    $res = pg_query($conn, "SELECT id, message, public, \"contactType\", contact, ip FROM anonymous_messages");
    while ($row = pg_fetch_assoc($res)): ?>
        <div style="padding: 4px; border: 1px dashed white;">
            <p><strong><?= $row["message"] ?></strong></p>
            <?php if ($row["contactType"] != "none" && strlen($row["contact"]) > 0): ?>
            <p><strong>Contact: </strong> <?= $row["contactType"] ?>, <?= $row["contact"] ?></p>
            <?php endif; ?>
            <?php if ($row["public"] == 1): ?>
            <p>Post this anonymous message publicly</p>
            <?php endif; ?>
            <a href="?acknowledge=<?= $row["id"] ?>">Acknowledge</a>
            <p><small><?= $row["ip"] ?></small></p>
            <a href="?ban=<?= $row["id"] ?>">Ban</a>
        </div>
    <?php endwhile;
    ?>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
