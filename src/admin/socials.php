<?php

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (isset($_POST["action"]) && $_POST["action"] === "reorder" && isset($_POST["order"])) {
    $order = array_map("intval", $_POST["order"]);
    pg_query($conn, "BEGIN");
    foreach ($order as $i => $id) {
        pg_query_params($conn, "UPDATE socials SET position = $1 WHERE id = $2", [$i, $id]);
    }
    pg_query($conn, "COMMIT");
    http_response_code(204);
    exit();
}

if (isset($_POST["name"]) && isset($_POST["url"])) {
    if (isset($_POST["id"])) {
        pg_query_params($conn, "UPDATE socials SET \"name\" = $1, \"url\" = $2 WHERE id = $3", [$_POST["name"], $_POST["url"], intval($_POST["id"])]);
    } else {
        pg_query_params($conn, "INSERT INTO socials(\"name\", \"url\", position) VALUES ($1, $2, (SELECT COALESCE(MAX(position), -1) + 1 FROM socials))", [$_POST["name"], $_POST["url"]]);
    }

    http_response_code(303);
    header("Location: /admin/socials.php");
    exit();
}

if (isset($_GET["delete"])) {
    pg_query_params($conn, "DELETE FROM socials WHERE id = $1", [$_GET["delete"]]);
    http_response_code(303);
    header("Location: /admin/socials.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Socials Administration", "This is the socials admin page"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Socials manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Create new social</h2>

    <form action="/admin/socials.php" method="post">
        <label for="name">Social name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="url">Social URL</label>
        <input type="url" name="url" id="url">
        <br>
        <button type="submit">Add</button>
    </form>

    <h2>Socials</h2>

    <ul class="sortable" id="sortable">
        <?php
        $res = pg_query($conn, "SELECT id, \"name\", \"url\" FROM socials ORDER BY position, id");
        while ($row = pg_fetch_assoc($res)) { ?>

        <li data-id="<?= $row["id"] ?>">
            <span class="drag-handle" draggable="true">&#8942;&#8942;</span>
            <form action="/admin/socials.php" method="post">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <label for="name">Social name</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($row["name"]) ?>">
                <label for="url">Social URL</label>
                <input type="url" name="url" id="url" value="<?= htmlspecialchars($row["url"]) ?>">
                <button type="submit">Update</button>
            </form>
            <a href="?delete=<?= $row["id"] ?>">Delete</a>
        </li>

        <?php }
        ?>
    </ul>

    <span id="order-status"></span>

    <?php require "footer.php"; ?>
    <script src="/scripts/admin-sort.js"></script>
</body>

</html>