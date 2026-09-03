<?php
require "util.php";
require "comments.php";
require "likes.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require "global.php"; ?>
        <?php seo("Fedi meow", "A fedi bot that meows every hour."); ?>
    </head>

    <body>
        <?php require "header.php"; ?>

        <h1>Fedi Keysmash Bot</h1>

        <p>This is a bot that detects and quotes keysmashes.</p>

        <p>This bot is entirely opt-in. You can follow it, but for it to quote your posts, you'll have to explicitly consent to it.</p>

        <p>This bot takes your posts through a password strength meter, and if they're strong enough, they're considered keysmashes. This is perfect for bottoms to rate their passwords :3</p>

        <p>Additionally, the bot replies to posts it gets mentioned in, if they contain a password. Note this will NOT quote your note</p>

        <p>
            <a href="https://soc.mldkyt.com/@keysmash">
                <button>Main instance</button>
            </a>
            <a href="https://git.mldkyt.com/mldkyt/fedikeysmashbot">
                <button>Source code</button>
            </a>
        </p>

        <?php project_likes("keysmash"); ?>
        <?php project_comments("keysmash"); ?>
        <?php require "footer.php"; ?>
    </body>
</html>
