<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "global.php"; ?>
        <?php seo(
            "Fedi Streaks",
            "This bot counts consecutive days of you posting on fedi.",
        ); ?>
    </head>

    <body>
        <?php require "header.php"; ?>

        <h1>Fedi Streaks</h1>
        <p>This bot counts consecutive days of you posting on fedi.</p>
        <p>Fedi Streaks checks your profile every day for new notes. If it doesn't find you posting for one day, you lose the streak. Every day you post, you get +1 streaks of sending notes.</p>
        <p>
            This bot mainly derives from Chat Streaks in Akabot, which is pretty much this but for Discord. The bot follows back within 30 seconds which allows you to check that it actually works. (If Luna's Akkoma instance is up,
            there's a high chance this is up as well).
        </p>
        <p>Fedi streaks had very low usage on fedi, so the main instance of it was shut down. But if you want to host an instance for yourself, the source code is below.</p>
        <p>
            <a href="https://git.mldkyt.com/mldkyt/fedi-streaks">
                <button>Source code</button>
            </a>
        </p>

        <?php project_likes("fedistreaks"); ?>
        <?php project_comments("fedistreaks"); ?>

        <?php require "footer.php"; ?>

    </body>
</html>
