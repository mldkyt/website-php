<?php

require "../components/util.php";

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (isset($_POST["text"]) && isset($_POST["bot"])) {
    $ok = true;

    // check bot
    if ($_POST["bot"] == "automated") {
        $ok = false;
        $postError = "Bot check failed";
    }

    $res = pg_query_params("SELECT id FROM anonymous_messages WHERE ip = $1", [get_remote_addr()]);
    if (pg_fetch_assoc($res)) {
        $ok = false;
        $postError = "You already have an unanswered message";
    }

    if (pg_fetch_assoc($res)) {
        pg_query_params($conn, "INSERT INTO anonymous_messages(ip, \"text\") VALUES ($1, $2)", [get_remote_addr(), htmlspecialchars(stripslashes(trim($_POST["text"])))]);
        
        $postOk = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo("Contact Luna", "The contacts for Luna"); ?>
</head>

<body>
    <?php require "../components/header.php"; ?>

    <h1>Contact Luna :3</h1>

    <?php if (isset($_POST["title"]) && (strtolower($_POST["title"]) == "contact lunya :3" || strtolower($_POST["title"]) == "contact")): ?>

        <h2>Send me an anonymous message</h2>

        <?php if (isset($postOk)): ?>
        <div class="success">
            Anonymous message was sent successfully!
        </div>
        <?php endif; ?>
        <?php if (isset($postError)): ?>
            <div class="error">
                <?= $postError ?>
            </div>
        <?php endif; ?>

        <?php
        // check existing post
        $res = pg_query_params($conn, "SELECT id FROM anonymous_messages WHERE ip = $1", [get_remote_addr()]);
        if (pg_fetch_assoc($res)) { ?>
        <p>You already sent a message and it is awaiting answering from Luna</p>
        <?php } else { ?>
        <form action="/contact.php" method="post">
            <!-- bypass hiding page -->
            <input type="hidden" name="title" value="contact">

            <label for="text">Message</label>
            <br>
            <textarea type="text" name="text" id="text"></textarea>
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
            <button type="submit">Send anonymous message</button>
        </form>
        <?php }
        ?>

        <h2>Community</h2>

        <p>These are socials that you can use to join and chat with my community.</p>

        <li>
            <strong>Discord</strong>: Join my <a href="/discord">Discord server</a>
        </li>

        <br />
        <h2>Personal/Direct</h2>

        <li>
            <strong>Email</strong>: Send me an email at <a href="mailto:estrogen@tuta.io">estrogen@tuta.io</a>. <br />
            <details>
                <summary>You can use my PGP key if you need privacy</summary>
                <p>
                   -----BEGIN PGP PUBLIC KEY BLOCK-----<br />
<br />
                    mDMEaehmPhYJKwYBBAHaRw8BAQdAKSha0Lhin+WoRAu0v7c4W/MWR8O8QJRv3ejH<br />
                    B5oYprC0I0NhdGdpcmwgRXN0cm9nZW4gPGVzdHJvZ2VuQHR1dGEuaW8+iHIEExYI<br />
                    ABoECwkIBwIVCAIWAQIZAQWCaehmPgKeAQKbAwAKCRDxDzi14cg7pJjFAP93JFlD<br />
                    EuPX0Yp3HyRxj+YkoUvHBAixi/V5qYbW8GozFQEA6zgZTD4HFjE8afPnpCksq+2i<br />
                    NS/xOmUSGJOmMvWucQu4OARp6GY+EgorBgEEAZdVAQUBAQdATXECOlVGztCiP19h<br />
                    0X4rYfgt+L1ZpZkQb2a6g7XUzBADAQgHiHgEGBYIAAkFgmnoZj4CmwwAIQkQ8Q84<br />
                    teHIO6QWIQQCeuCJ7ONXjr2eKmHxDzi14cg7pOX6AQCQZQ5Nh1tKL9h76dI+5uQV<br />
                    Rc9Go0W6mtPlTsf4be93+gD/eHS6tI7Hk01tWCtv5++5Jcwx6WB//cQa5AxSXgFs<br />
                    lw8=<br />
                    =9g2d<br />
                    -----END PGP PUBLIC KEY BLOCK-----<br />
                </p>
            </details>
        </li>
        <li>
            <strong>Fedi</strong>: Send a DM on fedi to <code>@luna@fedi.mldchan.dev</code>.
        </li>
        <li>
            <strong>Matrix</strong>: <code>@luna:matrix.mldchan.dev</code>.
        </li>
        <li>
            <strong>Signal</strong>: I have a signal, the username is <code>lunya.69</code> but due to my phone being really bad it doesn't send me notifications and Signal generally doesn't work so expect me to not respond. You can also ping me on another social network to check it.
        </li>
        <li>
            <strong>Discord</strong>: <a href="/discord">Join my Discord server</a>. I do not accept friend requests and don't check DMs unless someone tells me to.
        </li>
        <li>
            <strong>Fluxer</strong>: <code>catgirl#3164</code> but please use another contact method, I don't check this one.
        </li>
        <br>
    <?php else: ?>

        <?php if (isset($_POST["title"])): ?>
        <div class="error">
            That was not the page title, please enter the page title to show the contact page
        </div>
        <?php endif; ?>

        <p>In order to see this page, please type the title above (THE HEADING!!!) into the field below:</p>

        <form action="/contact.php" method="post">
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <br>
            <button type="submit">View contact page</button>
        </form>

        <br>
        <p>Unfortunately bots got here before you did and started spamming me e-mail, so I am kind of forced to do this :(</p>

    <?php endif; ?>

    <?php require "../components/footer.php"; ?>
</body>

</html>
