<?php

require '../components/util.php';

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));


if (isset($_POST["question"]) && isset($_POST["bot"])) {
    echo "Post body";

    $ok = true;

    // Check params
    if ($_POST["bot"] === "automated") {
        $ok = false;
        $postFail = "Bot check failed";
        echo "Bot check failed";
    }

    // Check unpost for current IP
    $query = $conn->prepare("SELECT id FROM qna WHERE ip = ? AND answer IS NULL");
    $query->bind_param("s", get_remote_addr());
    $query->execute();
    if ($query->fetch()) {
        $ok = false;
        $postFail = "Please wait for your existing question to be answered before asking again.";
    }
    $query->close();

    if ($ok) {
        $question = htmlspecialchars($_POST["question"]);

        $query = $conn->prepare("INSERT INTO qna(ip, question) VALUES (?, ?)");
        $query->bind_param("ss", get_remote_addr(), $question);
        $query->execute();
        $query->close();

        echo "Post success";
        $postSuccess = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../components/global.php'; ?>
    <?php seo("QnA", "Luna's commonly asked questions (QnA) page"); ?>
</head>

<body>
    <?php require '../components/header.php'; ?>
    <h1>Commonly asked questions (QnA)!</h1>

    <?php if (isset($postFail)) { ?>
    <div class="error">
        <span><?= $postFail; ?></span>
    </div>
    <?php } ?>
    <?php if ($postSuccess) { ?>
    <div class="success">
        <span>Your question was sent successfully, please wait for answer by Luna for it to show up</span>
    </div>
    <?php } ?>

    <?php
    $query = $conn->prepare("SELECT question, answer FROM qna WHERE answer IS NOT NULL");
    $query->execute();
    $query->bind_result($q, $a);
    while ($query->fetch()) :
    ?>
    <span><strong>Q: <?= htmlspecialchars($q); ?></strong></span> <br>
    <span>A: <?= htmlspecialchars($a); ?></span> <br>
    <br>
    <?php endwhile;
    $query->close();
    ?>

    <br>

    <h2>Ask a question!</h2>
    <form method="post">

        <label for="question">Question: </label> <br>
        <input type="text" name="question" id="question"> <br>
        <br>

        <label for="bot">Please verify you are not a bot</label>
        <br>
        <select name="bot" id="bot">
            <option value="automated">I'm an automated bot</option>
            <option value="bot">I'm a bot</option>
            <option value="critter">I'm a <i>critter</i></option>
            <option value="human">I'm not an automated bot, not a bot and not a critter</option>
        </select>
        <br />
        <br>
        <button type="submit">Ask!</button>
        <br>
    </form>


    <?php require '../components/footer.php'; ?>
</body>

</html>
