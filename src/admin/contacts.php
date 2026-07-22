<?php

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (isset($_POST["name"]) && isset($_POST["url"])) {
    if (isset($_POST["id"])) {
        pg_query_params($conn, "UPDATE contacts SET \"name\" = $1, \"url\" = $2 WHERE id = $3", [$_POST["name"], $_POST["url"], intval($_POST["id"])]);
    } else {
        pg_query_params($conn, "INSERT INTO contacts(\"name\", \"url\") VALUES ($1, $2)", [$_POST["name"], $_POST["url"]]);
    }

    http_response_code(303);
    header("Location: /admin/contacts.php");
    exit();
}

if (isset($_GET["delete"])) {
    pg_query_params($conn, "DELETE FROM contacts WHERE id = $1", [$_GET["delete"]]);
    http_response_code(303);
    header("Location: /admin/contacts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Contacts Administration", "This is the contacts admin page"); ?>
</head>

<body>
    <?php require "../../components/header.php"; ?>

    <h1>Contacts manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Create new contact</h2>

    <form action="/admin/contacts.php" method="post">
        <label for="name">Social name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="url">Social URL</label>
        <input type="url" name="url" id="url">
        <br>
        <button type="submit">Add</button>
    </form>

    <h2>Contacts</h2>

    <?php
    $res = pg_query($conn, "SELECT id, \"name\", \"url\" FROM contacts");
    while ($row = pg_fetch_assoc($res)) { ?>

    <form action="/admin/contacts.php" method="post">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <label for="name">Social name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($row["name"]) ?>">
        <br>
        <label for="url">Social URL</label>
        <input type="url" name="url" id="url" value="<?= htmlspecialchars($row["url"]) ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="?delete=<?= $row["id"] ?>">Delete</a>
    <br>
    <br>

    <?php }
    ?>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
