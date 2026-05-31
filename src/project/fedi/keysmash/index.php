<?php
require "../../../../components/util.php";
require "../../../../components/comments.php";
require "../../../../components/likes.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../../components/global.php"; ?>
        <?php seo("Fedi meow", "A fedi bot that meows every hour."); ?>
    </head>

    <body>
        <?php require "../../../../components/header.php"; ?>

        <h1>Fedi Keysmash Bot</h1>

        <p>This is a bot that detects and quotes keysmashes.</p>

        <p>This bot is entirely opt-in. You can follow it, but for it to quote your posts, you'll have to explicitly consent to it.</p>

        <p>This bot takes your posts through a password strength meter, and if they're strong enough, they're considered keysmashes. This is perfect for bottoms to rate their passwords :3</p>

        <p>Additionally, the bot replies to posts it gets mentioned in, if they contain a password. Note this will NOT quote your note</p>

        <p>
            <a href="https://sk.lunya.pet/@keysmash">
                <button>Main instance</button>
            </a>
            <a href="https://git.mldchan.dev/luna/fedikeysmashbot">
                <button>Source code</button>
            </a>
        </p>

        <?php project_likes("keysmash"); ?>
        <?php project_comments("keysmash"); ?>
        <?php require "../../../../components/footer.php"; ?>
    </body>
</html>
