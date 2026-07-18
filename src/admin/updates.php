<?php

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect(
    "host=$host port=$port dbname=$name user=$user password=$pass",
);

if (isset($_POST["title"]) && isset($_POST["body"]) && isset($_POST["url"])) {
    if (isset($_POST["id"])) {
        pg_query_params(
            $conn,
            "UPDATE updates SET \"title\" = $1, \"body\" = $2, \"url\" = $3 WHERE id = $4",
            [
                $_POST["title"],
                $_POST["body"],
                $_POST["url"],
                intval($_POST["id"]),
            ],
        );
    } else {
        pg_query_params(
            $conn,
            "INSERT INTO updates(\"title\", \"body\", \"url\") VALUES ($1, $2, $3)",
            [$_POST["title"], $_POST["body"], $_POST["url"]],
        );
    }

    http_response_code(303);
    header("Location: /admin/updates.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Updates Administration", "This is the updates admin page"); ?>
</head>

<body>
    <?php require "../../components/header.php"; ?>

    <h1>Updates manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Create new update</h2>

    <form action="/admin/updates.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="body">Body</label>
        <br>
        <textarea name="body" id="body"></textarea>
        <br>
        <label for="url">URL</label>
        <input type="url" name="url" id="url">
        <br>
        <button type="submit">Add</button>
    </form>

    <h2>Past updates</h2>

    <?php
    $res = pg_query(
        $conn,
        "SELECT id, \"title\", \"body\", \"url\" FROM updates ORDER BY created_at DESC",
    );
    while ($row = pg_fetch_assoc($res)) { ?>

    <form action="/admin/updates.php" method="post">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars(
            $row["title"],
        ) ?>">
        <br>
        <label for="body">Body</label>
        <br>
        <textarea name="body" id="body"><?= htmlspecialchars(
            $row["body"],
        ) ?></textarea>
        <br>
        <label for="url">URL</label>
        <input type="url" name="url" id="url" value="<?= htmlspecialchars(
            $row["url"],
        ) ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <br>

    <?php }
    ?>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
