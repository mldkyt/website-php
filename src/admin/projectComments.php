<?php
$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (isset($_GET["delete"])) {
    pg_query_params($conn, "DELETE FROM project_comments WHERE id = $1", [$_GET["delete"]]);

    header("Location: /admin/projectComments.php");
    exit();
}

if (isset($_GET["approve"])) {
    pg_query_params($conn, "UPDATE project_comments SET approved = 1 WHERE id = $1", [$_GET["approve"]]);

    header("Location: /admin/projectComments.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Project Comments", "Luna's website administration"); ?>
</head>

<body>
    <?php require "../../components/header.php"; ?>

    <h1>Project Comments</h1>

    <h2>Unapproved comments</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>IP</th>
                <th>Project</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $res = pg_query($conn, "SELECT id, ip, project, name, comment FROM project_comments WHERE approved = 0");
            while ($row = pg_fetch_assoc($res)): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["ip"] ?></td>
                <td><?= $row["project"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["comment"] ?></td>
                <td>
                    <a href="?approve=<?= $row["id"] ?>">Approve</a>
                    <a href="?delete=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile;
            ?>
        </tbody>
    </table>

    <h2>Approved comments</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>IP</th>
                <th>Project</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $res = pg_query($conn, "SELECT id, ip, project, \"name\", comment FROM project_comments WHERE approved = 1");
            while ($row = pg_fetch_assoc($res)): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["ip"] ?></td>
                <td><?= $row["project"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["comment"] ?></td>
                <td>
                    <a href="?delete=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile;
            ?>
        </tbody>
    </table>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
