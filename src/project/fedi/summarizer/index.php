<?php
require "../../../../components/util.php";
require "../../../../components/comments.php";
require "../../../../components/likes.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../../components/global.php"; ?>
        <?php seo(
            "Fedi Summarizer",
            "This bot summarizes the amount of notes you post every midnight.",
        ); ?>
    </head>

    <body>
        <?php require "../../../../components/header.php"; ?>

        <h1>Fedi Summarizer</h1>
        <p>This bot summarizes the amount of notes you post every midnight.</p>
        <p>This bot summarizes the amount of notes you post every midnight. It does so in your private messages.</p>
        <p>The message sent to you every midnight contains the following information currently:</p>
        <ul>
            <li>Notes count</li>
            <li>Quote notes</li>
            <li>Reply notes</li>
            <li>Renotes</li>
            <li>Total reactions on your posts</li>
            <li>Most popular used emoji on your posts</li>
        </ul>

        <img src="message.png" alt="The example message" />

        <br />
        <br />

        <p>The main instance of fedi summarizer was unused, so it has been shut down. If you want to run this bot for yourself, the source code is available forever.</p>

        <br />
        <br />

        <p>
            <a href="https://git.lunya.pet/lunya/fedi-summarizer">
                <button>Source code</button>
            </a>
        </p>


        <?php project_likes("fedisummarizer"); ?>
        <?php project_comments("fedisummarizer"); ?>
        <?php require "../../../../components/footer.php"; ?>
    </body>
</html>
