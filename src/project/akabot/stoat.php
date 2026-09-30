<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Akabot for Stoat", "Cancelled version of Akabot for Stoat/Revolt."); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1 id="akabot">Akabot for Stoat</h1>
    <p>
        Akabot for Revolt/Stoat was a quickly discontinued project after being started because almost all libraries for Stoat/Revolt are not finished. The latest update to it was to update and follow the rename of the library.    </p>
    <p>The features that got implemented prior to the cancellation of the projects were:</p>
    <ul>
        <li><strong>Auto React</strong>: Add a keyword for messages that the bot will react to</li>
        <li>
            <strong>Auto Response</strong>: Add a keyword for messages the bot will respond to with a message.
        </li>
        <li><strong>Birthdays</strong>: Set a birthday, and get reminded when it's time to wish a happy birthday!</li>
        <li><strong>Chat Streaks</strong>: Streaks when you chat in consecutive days in a server.</li>
        <li><strong>Chat Summary</strong>: Summaries of who chatted the most at the end of the day. Normal only.</li>
    </ul>
    <p>The project also used MongoDB for the database and wasn't ported to simple PostgreSQL. Older Akabot versions like 4.0 used MongoDB as well, which is where the bot was inspired from.</p>

    <br />
    <br />


    <?php project_likes("akabot_stoat"); ?>
    <?php project_comments("akabot_stoat"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
