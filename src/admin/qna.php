<?php

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");


// Edit

if (isset($_POST["question"]) && isset($_POST["answer"]) && isset($_POST["id"])) {
    $res = pg_query_params($conn, "SELECT * FROM qna WHERE id = $1", [$_POST["id"]]);
    if (!pg_fetch_assoc($res)) {
        $error = "Non-existant record";
    }
    
    if (!isset($error)) {
        pg_query_params($conn, "UPDATE qna SET question = $2, answer = $3 WHERE id = $1", [$_POST["id"], $_POST["question"], $_POST["answer"]]);
    }
    
    header("Location: /admin/qna.php");
    die();
}

// Add

elseif (isset($_POST["question"]) && isset($_POST["answer"])) {
    pg_query_params($conn, "INSERT INTO qna(question, answer) VALUES ($1, $2)", [$_POST["question"], $_POST["answer"]]);

    header("Location: /admin/qna.php");
    die();
}

// Delete

if (isset($_GET["delete"])) {
    pg_query_params($conn, "DELETE FROM qna WHERE id = $1", [$_GET["delete"]]);

    header("Location: /admin/qna.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("QnA Administration", "This is the QnA admin page"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>
    
    <h1>QnA manager</h1>
    <a href="/admin/">back</a>
    <br>

    
    <h2>To answer</h2>
    <?php
    $res = pg_query($conn, "SELECT id, question FROM qna WHERE answer IS NULL");
    while ($row = pg_fetch_assoc($res)) {
        ?>
        <div style="border: 1px solid white; padding: 4px">
            <form method="post">
                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                <label for="answer">Q: </label>
                <input type="text" name="question" id="question" value="<?= htmlspecialchars($row["question"]); ?>">
                <br>
                <label for="answer">A: </label>
                <input type="text" name="answer" id="answer" placeholder="...">
                <br>
                <button type="submit">Add reply</button>
            </form>
            <span><a href="?delete=<?= $row["id"]; ?>">Delete this answer</a></span> <br>
        </div>
        <?php
    }
    ?>

    <h2>Existing QnA</h2>

    <?php
    $res = pg_query($conn, "SELECT id, question, answer FROM qna WHERE answer IS NOT NULL");
    while ($row = pg_fetch_assoc($res)) {
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= $row["id"]; ?>">
            <label for="answer">Q: </label>
            <input type="text" name="question" id="question" value="<?= htmlspecialchars($row["question"]); ?>">
            <br>
            <label for="answer">A: </label>
            <input type="text" name="answer" id="answer" value="<?= htmlspecialchars($row["answer"]); ?>">
            <br>
            <button type="submit">Add reply</button>
        </form>
        <span><a href="?delete=<?= $row["id"]; ?>">Delete this answer</a></span> <br>
        <br>
        <?php
    }
    ?>

    <h2>Add QnA</h2>

    <form method="post">
        <label for="question">Q: </label>
        <input type="text" name="question" id="question">
        <br>
        <label for="answer">A: </label>
        <input type="text" name="answer" id="answer">
        <br>
        <button type="submit">Add</button>
    </form>
    

    <?php require '../../components/footer.php'; ?>
</body>

</html>
