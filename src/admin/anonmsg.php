<?php

function handle_post(mysqli $conn): bool|string {
    if (isset($_POST["id"]) && isset($_POST["text"])) {
        // fetch item
        $query = $conn->prepare("SELECT text FROM anonymous_messages WHERE id = ?");
        $query->bind_param("i", $_POST["id"]);
        $query->execute();
        $query->bind_result($text);
        if (!$query->fetch()) {
            $query->close();
            return "Unable to find this specific anonymous message";
        }
        $query->close();

        // post
        $curl = curl_init("https://" . getenv("SHARKEY_URL") . "/api/notes/create");
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json", 
            "Authorization: Bearer " . getenv("SHARKEY_TOKEN")
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            "text" => "> ". $text . "\n" . $_POST["text"]
        ]));

        $response = curl_exec($curl);
        if ($response === false) {
            return "cURL error" . curl_errno($curl) . ": " . curl_error($curl);
        }

        // delete record
        $query = $conn->prepare("DELETE FROM anonymous_messages WHERE id = ?");
        $query->bind_param("i", $_POST["id"]);
        $query->execute();
        $query->close();

        return true;
    }
    else {
        return true;
    }
}

function handle_delete(mysqli $conn): bool|string {
    if (isset($_GET["delete"])) {
        $query = $conn->prepare("DELETE FROM anonymous_messages WHERE id = ?");
        $query->bind_param("i", $_GET["delete"]);
        $query->execute();
        $query->close();

        return true;
    } else {
        return true;
    }
}

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

$handlePostResult = handle_post($conn);
if (!is_bool($handlePostResult)) {
    $postError = $handlePostResult;
}

$handleDeleteResult = handle_delete($conn);
if (!is_bool($handleDeleteResult)) {
    $deleteError = $handleDeleteResult;
}

$query = $conn->prepare("SELECT id, text FROM anonymous_messages LIMIT 1");
$query->execute();
$query->bind_result($id, $text);
$isAnonymousMessage = $query->fetch();
$query->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Anonymous Messages", "Management of anonymous messages for lain's website."); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>

    <h1>Anonymous Messages Management</h1>
    <a href="/admin/">back</a>
    <br>
    <?php if (isset($postError)) :?>
        <div class="error">
            Reply operation error: <?= $postError; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($deleteError)) :?>
        <div class="error">
            Delete operation error: <?= $deleteError; ?>
        </div>
    <?php endif; ?>

    <?php if ($isAnonymousMessage) : ?>

        <div style="padding: 4px; border: 1px solid white;">
            <p><?= $text; ?></p>
            <form action="/admin/anonmsg.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">

                <label for="answer">Answer:</label>
                <br>
                <input type="text" name="text" id="text">
                <br>
                <br>

                <button type="submit">Send back!</button>
            </form>

            <br>

            <a href="?delete=<?= htmlspecialchars($id); ?>">Delete this message</a>
        </div>

    <?php else : ?>
        <div class="err">
            No anonymous messages
        </div>
    <?php endif; ?>


    <?php require '../../components/footer.php'; ?>
</body>

</html>