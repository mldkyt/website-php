<?php

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["url"])) {
    if (isset($_POST["id"])) {
        pg_query_params($conn, "UPDATE projects SET \"name\" = $1, \"description\" = $2, \"url\" = $3 WHERE id = $4",
            [$_POST["name"], $_POST["description"], $_POST["url"], intval($_POST["id"])]);
    }
    else {
        pg_query_params($conn, "INSERT INTO projects(\"name\", \"description\", \"url\") VALUES ($1, $2, $3)", 
            [$_POST["name"], $_POST["description"], $_POST["url"]]);
    }

    http_response_code(303);
    header("Location: /admin/projects.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Project Administration", "This is the project admin page"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>
    
    <h1>Project manager</h1>
    <a href="/admin/">back</a>
    <br>

    <h2>Create new post</h2>
    
    <form action="/admin/projects.php" method="post">
        <label for="name">Project name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Project description</label>
        <br>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="url">Project URL</label>
        <input type="url" name="url" id="url">
        <br>
        <button type="submit">Add</button>
    </form>

    <h2>Projects</h2>

    <?php
    $res = pg_query($conn, "SELECT id, \"name\", \"description\", \"url\" FROM projects");
    while (($row = pg_fetch_assoc($res))) {
    ?>

    <h2><?= $row["name"]; ?></h2>
    <form action="/admin/projects.php" method="post">
        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
        <label for="name">Project name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($row["name"]); ?>">
        <br>
        <label for="description">Project description</label>
        <br>
        <textarea name="description" id="description"><?= htmlspecialchars($row["description"]); ?></textarea>
        <br>
        <label for="url">Project URL</label>
        <input type="url" name="url" id="url" value="<?= htmlspecialchars($row["url"]); ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <br>

    <?php } ?>

    <?php require '../../components/footer.php'; ?>
</body>

</html>
