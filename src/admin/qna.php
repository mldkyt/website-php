<?php
$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

// Edit

if (isset($_POST["question"]) && isset($_POST["answer"]) && isset($_POST["id"])) {
    // check existence
    $query = $conn->prepare("SELECT * FROM qna WHERE id = ?");
    $query->bind_param("i", $_POST["id"]);
    $query->execute();
    if (!$query->fetch()) {
        $error = "Non-existant record";
    }

    $query->close();
    
    if (!isset($error)) {
        $query = $conn->prepare("UPDATE qna SET question = ?, answer = ? WHERE id = ?");
        $query->bind_param("ssi", $_POST["question"], $_POST["answer"], $_POST["id"]);
        $query->execute();
        $query->close();
    }
    
    header("Location: /admin/qna.php");
    die();
}

// Add

elseif (isset($_POST["question"]) && isset($_POST["answer"])) {
    $query = $conn->prepare("INSERT INTO qna(question, answer) VALUES(?, ?)");
    $query->bind_param("ss", $_POST["question"], $_POST["answer"]);
    $query->execute();
    $query->close();

    header("Location: /admin/qna.php");
    die();
}

// Delete

if (isset($_GET["delete"])) {
    $query = $conn->prepare("DELETE FROM qna WHERE id = ?");
    $query->bind_param("i", $_GET["delete"]);
    $query->execute();
    $query->close();

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
    $query = $conn->prepare("SELECT id, question FROM qna WHERE answer IS NULL");
    $query->execute();
    $query->bind_result($id, $question);
    while ($query->fetch()) {
        ?>
        <div style="border: 1px solid white; padding: 4px">
            <form method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <label for="answer">Q: </label>
                <input type="text" name="question" id="question" value="<?= htmlspecialchars($question); ?>">
                <br>
                <label for="answer">A: </label>
                <input type="text" name="answer" id="answer" placeholder="...">
                <br>
                <button type="submit">Add reply</button>
            </form>
            <span><a href="?delete=<?= $id; ?>">Delete this answer</a></span> <br>
        </div>
        <?php
    } 
    $query->close();
    ?>

    <h2>Existing QnA</h2>

    <?php
    $query = $conn->prepare("SELECT id, question, answer FROM qna WHERE answer IS NOT NULL");
    $query->execute();
    $query->bind_result($id, $question, $answer);
    while ($query->fetch()) {
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label for="answer">Q: </label>
            <input type="text" name="question" id="question" value="<?= htmlspecialchars($question); ?>">
            <br>
            <label for="answer">A: </label>
            <input type="text" name="answer" id="answer" value="<?= htmlspecialchars($answer); ?>">
            <br>
            <button type="submit">Add reply</button>
        </form>
        <span><a href="?delete=<?= $id; ?>">Delete this answer</a></span> <br>
        <br>
        <?php
    } 
    $query->close();
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
<?php
$conn->close();
?>