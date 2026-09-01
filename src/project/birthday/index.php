<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "global.php"; ?>
        <?php seo("Birthday", "Birthday is an app that tells you when someone has a birthday."); ?>
    </head>

    <body>
        <?php require "header.php"; ?>
        <h1>Birthday</h1>
        <p>Forces you to wish birthday to anyone in your circle so you never forget.</p>

        <h2>Configuration</h2>
        <p>Running the app with <code>/config</code> as a parameter will show a configuration window.</p>
        <img src="config.png" alt="Configuration Window" />
        <img src="add.png" alt="Add new birthday Window" />

        <p>To add a new birthday, click on Actions &gt; Add new birthday.</p>
        <p><strong>Don't forget to save your birthdays before exiting the application! File &gt; Save changes</strong></p>
        <p>Please note that because of this app being old, there is a link pointing to mldkyt.com, which doesn't work.</p>

        <p>
            <a href="https://git.mldkyt.com/mldkyt/Birthday/releases">
                <button>Download latest release</button>
            </a>
            <a href="/discord">
                <button>Discuss the project (Discord)</button>
            </a>
        </p>

        <?php project_likes("birthday"); ?>
        <?php project_comments("birthday"); ?>
        <?php require "footer.php"; ?>
    </body>
</html>
