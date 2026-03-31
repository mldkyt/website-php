<?php

require '../components/util.php';

if (isset($_POST["text"]) && isset($_POST["bot"])) {
    $ok = true;

    // check bot
    if ($_POST["bot"] == "automated") {
        $ok = false;
        $postError = "Bot check failed";
    }

    $conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

    // check existing post
    $query = $conn->prepare("SELECT id FROM anonymous_messages WHERE ip = ?");
    $query->bind_param("s", get_remote_addr());
    $query->execute();
    if ($query->fetch()) {
        $ok = false;
        $postError = "You already have an unanswered message";
    }
    $query->close();

    if ($ok) {
        $query = $conn->prepare("INSERT INTO anonymous_messages(ip, text) VALUES(?, ?)");
        $query->bind_param("ss", get_remote_addr(), htmlspecialchars(stripslashes(trim($_POST["text"]))));
        $query->execute();
        $query->close();

        $postOk = true;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../components/global.php'; ?>
    <?php seo("Contact Lunya", "The contacts for Lunya"); ?>
</head>

<body>
    <?php require '../components/header.php'; ?>

    <h1>Contact Lunya :3</h1>

    <?php if (isset($_POST["title"]) && (strtolower($_POST["title"]) == "contact lunya :3" || strtolower($_POST["title"]) == "contact")) : ?>

        <h2>Send me an anonymous message</h2>

        <?php if (isset($postOk)) : ?>
        <div class="success">
            Anonymous message was sent successfully!
        </div>
        <?php endif; ?>
        <?php if (isset($postError)) : ?>
            <div class="error">
                <?= $postError; ?>
            </div>
        <?php endif; ?>

        <?php
        // check existing post
        $conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));
        $query = $conn->prepare("SELECT id FROM anonymous_messages WHERE ip = ?");
        $query->bind_param("s", get_remote_addr());
        $query->execute();
        if ($query->fetch()) { ?>
        <p>You already sent a message and it is awaiting answering from Lunya</p>
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
        <?php
        }
        $query->close();
        $conn->close();
        ?>

        <h2>Community</h2>

        <p>These are socials that you can use to join and chat with my community.</p>

        <li>
            <strong>Discord</strong>: Join my <a href="/discord">Discord server</a>
        </li>
        <li>
            <strong>Forums</strong>: Create an account on <a href="https://forums.lunya.pet">forums.lunya.pet</a> and send me a DM from there.
        </li>

        <br />
        <h2>Personal/Direct</h2>

        <li>
            <strong>Email</strong>: Send me an email at <a href="mailto:lunya@murena.io">lunya@murena.io</a>. <br />
            <details>
                <summary>You can use my PGP key if you need privacy</summary>
                <p>
                    -----BEGIN PGP PUBLIC KEY BLOCK-----<br />
                    <br />
                    mDMEaIv3YhYJKwYBBAHaRw8BAQdAQS8uWs/46vyMjVRj+miO/W6Ebg/DElHNb5Ug<br />
                    rbeL5Gu0D2x1bnlhQG11cmVuYS5pb4hyBBMWCAAaBAsJCAcCFQgCFgECGQAFgmiL<br />
                    92ICngECmwMACgkQRYWRrUxMAjNnTAEAxLfJWpXr/iBJvNIRmO+25ZFtB5FOLzYS<br />
                    efEpStH+zKIBAIOWk/3OPy1R1eU8om55TI6VSaf2PwSQbtzt1t5cE0gEuDgEaIv3<br />
                    YhIKKwYBBAGXVQEFAQEHQAg2m1ZbwbnSmGwJZgk7aHOITQo4puABxDZLCqcbTekL<br />
                    AwEIB4hhBBgWCAAJBYJoi/diApsMAAoJEEWFka1MTAIzUrYA/RQNpvoxspq80PGI<br />
                    QKR4lrMDVkXows1b0mNeR/n59V5RAP9CDdYycsqwHgol6pMlp5cygu8B26Hzxgx9<br />
                    6HPTNZOMCA==<br />
                    =IsKm<br />
                    -----END PGP PUBLIC KEY BLOCK-----<br />
                </p>
            </details>
        </li>
        <li>
            <strong>Fedi</strong>: Send a DM on fedi to <code>@lunya@sk.lunya.pet</code>.
        </li>
        <br>
    <?php else : ?>

        <?php if (isset($_POST["title"])) : ?>
        <div class="error">
            That was not the page title, please enter the page title to show the contact page
        </div>
        <?php endif; ?>

        <p>In order to see this page, please type the title above into the field below:</p>

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

    <?php require '../components/footer.php'; ?>
</body>

</html>
