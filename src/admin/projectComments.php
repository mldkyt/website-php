<?php

$conn = mysqli_connect(
    getenv("MARIADB_HOST"),
    getenv("MARIADB_USER"),
    getenv("MARIADB_PASSWORD"),
    getenv("MARIADB_DATABASE"),
);

if (isset($_GET["delete"])) {
    $query = $conn->prepare("DELETE FROM project_comments WHERE id = ?");
    $query->bind_param("i", $_GET["delete"]);
    $query->execute();
    $query->close();

    header("Location: /admin/projectComments.php");
    exit();
}

if (isset($_GET["approve"])) {
    $query = $conn->prepare(
        "UPDATE project_comments SET approved = 1 WHERE id = ?",
    );
    $query->bind_param("i", $_GET["approve"]);
    $query->execute();
    $query->close();

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
            $query = $conn->prepare(
                "SELECT id, ip, project, name, comment FROM project_comments WHERE approved = 0",
            );
            $query->execute();
            $query->bind_result($id, $ip, $project, $name, $comment);
            while ($query->fetch()): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $ip ?></td>
                <td><?= $project ?></td>
                <td><?= $name ?></td>
                <td><?= $comment ?></td>
                <td>
                    <a href="?approve=<?= $id ?>">Approve</a>
                    <a href="?delete=<?= $id ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile;
            $query->close();
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
            $query = $conn->prepare(
                "SELECT id, ip, project, name, comment FROM project_comments WHERE approved = 1",
            );
            $query->execute();
            $query->bind_result($id, $ip, $project, $name, $comment);
            while ($query->fetch()): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $ip ?></td>
                <td><?= $project ?></td>
                <td><?= $name ?></td>
                <td><?= $comment ?></td>
                <td>
                    <a href="?delete=<?= $id ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile;
            $query->close();
            ?>
        </tbody>
    </table>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
