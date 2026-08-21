<?php

require "../components/util.php";

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;

    // Check message submitted
    if (!isset($_POST["message"])) {
        $ok = false;
        $postFail = "Message was not found";
    }

    // Check message length
    if (strlen($_POST["message"]) < 4 || strlen($_POST["message"]) > 1000) {
        $ok = false;
        $postFail = "Message is too short or too long";
    }

    // Contact type array check
    if (isset($_POST["contact-type"]) && $_POST["contact-type"] !== "fedi" && $_POST["contact-type"] !== "email") {
        $ok = false;
        $postFail = "Invalid contact type";
    }

    // Contact length
    if (isset($_POST["contact"]) && (strlen($_POST["contact"]) < 2 || strlen($_POST["contact"]) > 100)) {
        $ok = false;
        $postFail = "Contact length is out of range";
    }

    // At least contact or public response has to be set in order to be able to post
    if (!(isset($_POST["contact-type"]) && isset($_POST["contact"])) && !isset($_POST["public"])) {
        $ok = false;
        $postFail = "At least public message or contact has to be provided to send an anonymous message";
    }

    // Verify existing message
    $res = pg_query_params($conn, "SELECT id FROM anonymous_messages WHERE ip = $1", [get_remote_addr()]);

    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postFail = "You have already sent a private message and can't send another one.";
    }

    // Message
    $message = $_POST["message"];
    $sendPublicly = isset($_POST["public"]) && $_POST["public"] === "on";
    $contactType = isset($_POST["contact-type"]) ? $_POST["contact-type"] : "none";
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : "";

    // Check mcaptcha
    $mcaptchaToken = $_POST["mcaptcha__token"];

    $payload = [
        "token" => $mcaptchaToken,
        "key" => getenv("MCAPTCHA_SITE_KEY"),
        "secret" => getenv("MCAPTCHA_SECRET_KEY"),
    ];

    $ch = curl_init(getenv("MCAPTCHA_DOMAIN") . "/api/v1/pow/siteverify");

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($payload),
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        $ok = false;
        $postFail = "The captcha verification server is unavailable, please try again later";
    }

    $result = json_decode($response, true);

    if (!$result || empty($result["valid"])) {
        $ok = false;
        $postFail = "Captcha failed";
    }

    if ($ok) {
        pg_query_params($conn, "INSERT INTO anonymous_messages(ip, message, public, \"contactType\", contact) VALUES ($1, $2, $3, $4, $5)", [
            get_remote_addr(),
            htmlspecialchars($_POST["message"]),
            $sendPublicly ? 1 : 0,
            $contactType,
            $contact,
        ]);

        // send notif (everything is fine if it doesn't succeed)
        if (getenv("NTFY_URL") && getenv("NTFY_TOKEN")) {
            file_get_contents(
                "https://" . getenv("NTFY_URL"),
                false,
                stream_context_create([
                    "http" => [
                        "method" => "POST",
                        "header" =>
                            "Content-Type: text/plain\r\n" .
                            "Title: Anonymous Message received\r\n" .
                            "Actions: view, Admin Panel, https://mldkyt.com/admin/anonymous-messages.php\r\n" .
                            "Authorization: Bearer " .
                            getenv("NTFY_TOKEN"),
                        "content" => "New anonymous message to review",
                    ],
                ]),
            );
        }

        $postSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo("Anonymous Messages", "Send an anonymous message to mldkyt!"); ?>
</head>

<body>
    <?php require "../components/header.php"; ?>

    <h1>Anonymous Messages</h1>

    <?php if (isset($postFail)) { ?>
    <div class="error">
        <span><?= $postFail ?></span>
    </div>
    <?php } ?>
    <?php if ($postSuccess) { ?>
    <div class="success">
        <span>Your post was sent successfully.</span>
    </div>
    <?php } ?>

    <p>Send an anonymous message to mldkyt!</p>

    <?php
    $res = pg_query_params($conn, "SELECT id FROM anonymous_messages WHERE ip = $1", [get_remote_addr()]);

    if (pg_fetch_assoc($res)): ?>
    <p>You have sent an anonymous message that hasn't been yet answered by mldkyt. Please wait until she answers your message in order to send another one.</p>
    <?php $res = pg_query_params($conn, "SELECT id FROM anonymous_messages_bans WHERE ip = $1", [get_remote_addr()]);elseif (pg_fetch_assoc($res)): ?>
    <p>You are banned from sending anonymous messages to mldkyt.</p>
    <?php else: ?>
    <form method="post">
        <label for="message">Message</label>
        <br>
        <textarea id="message" name="message" required min="4" max="1000"></textarea>
        <br>
        <br/>

        <input type="checkbox" checked id="public" name="public">
        <label for="public">Post this anonymous message publicly</label>
        <br />
        <br />

        <label for="contact-type">Contact me on</label>
        <br/>
        <input type="radio" name="contact-type" value="fedi"> Fediverse DM
        <br/>
        <input type="radio" name="contact-type" value="email"> E-mail
        <br/>
        <br/>

        <label for="contact">Contact</label>
        <br/>
        <input type="text" name="contact" id="contact" placeholder="e.g. @mldkyt@soc.mldkyt.com">
        <br/>
        <br/>

        <label
          data-mcaptcha_url="<?= getenv("MCAPTCHA_DOMAIN") . "/widget/?sitekey=" . getenv("MCAPTCHA_SITE_KEY") ?>"
          for="mcaptcha__token"
          id="mcaptcha__token-label"
        >
          mCaptcha authorization token.
          <a
            href="https://mcaptcha.org/docs/user-manual/how-to-mcaptcha-without-js/"
            >Instructions</a
          >.
          <input type="text" name="mcaptcha__token" id="mcaptcha__token" />
        </label>
        <div id="mcaptcha__widget-container"></div>
        <script src="https://unpkg.com/@mcaptcha/vanilla-glue@0.1.0-rc2/dist/index.js"></script>

        <button type="submit">Send</button>
    </form>
    <?php endif;
    ?>

    <?php require "../components/footer.php"; ?>
</body>

</html>
