<?php

use PgSql\Connection;

function handle_post(Connection $conn): bool|string {
    if (isset($_POST["id"]) && isset($_POST["text"])) {
        // fetch item
        $res = pg_query_params($conn, "SELECT \"text\" FROM anonymous_messages WHERE id = $1", [$_POST["id"]]);
        $row = pg_fetch_assoc($res);
        if (!$row) {
            return "Unable to find this specific anonymous message";
        }

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
            "text" => "> ". $row["text"] . "\n" . $_POST["text"]
        ]));

        $response = curl_exec($curl);
        if ($response === false) {
            return "cURL error" . curl_errno($curl) . ": " . curl_error($curl);
        }

        // delete record
        pg_query_params(
            $conn,
            "DELETE FROM anonymous_messages WHERE id = $1",
            [$_POST["id"]]
        );

        return true;
    }
    else {
        return true;
    }
}

function handle_delete(Connection $conn): bool|string {
    if (isset($_GET["delete"])) {
        pg_query_params("DELETE FROM anonymous_messages WHERE id = $1", [$_GET["delete"]]);

        return true;
    } else {
        return true;
    }
}

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

$handlePostResult = handle_post($conn);
if (!is_bool($handlePostResult)) {
    $postError = $handlePostResult;
}

$handleDeleteResult = handle_delete($conn);
if (!is_bool($handleDeleteResult)) {
    $deleteError = $handleDeleteResult;
}

$res = pg_query($conn, "SELECT id, \"text\" FROM anonymous_messages LIMIT 1");
$anonymousMessage = pg_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Anonymous Messages", "Management of anonymous messages for mldchan's website."); ?>
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

    <?php if ($anonymousMessage) : ?>

        <div style="padding: 4px; border: 1px solid white;">
            <p><?= $anonymousMessage["text"]; ?></p>
            <form action="/admin/anonmsg.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($anonymousMessage["id"]); ?>">

                <label for="answer">Answer:</label>
                <br>
                <input type="text" name="text" id="text">
                <br>
                <br>

                <button type="submit">Send back!</button>
            </form>

            <br>

            <a href="?delete=<?= htmlspecialchars($anonymousMessage["id"]); ?>">Delete this message</a>
        </div>

    <?php else : ?>
        <div class="err">
            No anonymous messages
        </div>
    <?php endif; ?>


    <?php require '../../components/footer.php'; ?>
</body>

</html>
