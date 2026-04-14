<?php
require "../../../../components/comments.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../../components/global.php"; ?>
        <?php seo(
            "FediMeow",
            "This is a bot that meows every hour on fedi.",
        ); ?>
    </head>

    <body>
        <?php require "../../../../components/header.php"; ?>

        <h1>Fedi Meow</h1>
        <p>This is a bot that meows every hour on fedi.</p>
        <p>This bot is really simple. It sends a message containing meow or nya, randomly adding a tidlie or a :3 to the message.</p>

        <p>Because of low usage, the main instance of fedi meow was shut down because it polluted the DB. But if you want to run this, the code will forever be available.</p>

        <p>
            <a href="https://git.lunya.pet/lunya/fedimeow">
                <button>Source code</button>
            </a>
        </p>

        <?php project_comments("fedimeow"); ?>

        <?php require "../../../../components/footer.php"; ?>

    </body>
</html>
