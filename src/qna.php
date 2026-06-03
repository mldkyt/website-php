<?php

require '../components/util.php';

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

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
    $res = pg_query_params($conn, "SELECT id FROM qna WHERE ip = $1 AND answer IS NULL", [get_remote_addr()]);
    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postFail = "Please wait for your existing question to be answered before asking again";
    }

    if ($ok) {
        $question = htmlspecialchars($_POST["question"]);

        pg_query_params("INSERT INTO qna(ip, question) VALUES ($1, $2)", [get_remote_addr(), $question]);

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
    $res = pg_query("SELECT question, answer FROM qna WHERE answer IS NOT NULL");
    while ($row = pg_fetch_assoc($res)) :
    ?>
    <span><strong>Q: <?= htmlspecialchars($row["question"]); ?></strong></span> <br>
    <span>A: <?= htmlspecialchars($row["answer"]); ?></span> <br>
    <br>
    <?php endwhile;
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
