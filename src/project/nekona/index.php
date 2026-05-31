<?php
require "../../../components/util.php";
require "../../../components/comments.php";
require "../../../components/likes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo(
        "Nekona",
        "A fully featured general purpose discord bot with over 30 features",
    ); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>

    <h1 id="nekona">The Nekona Discord Bot</h1>
    <p>Nekona is a featureful open-source Discord bot!</p>
    <p>Features:</p>
    <ul>
    <li>Counting: Counting channels add a bit of fun into your server with channels purely for counting.</li>
    <li>Leveling: Adds levels, level-up rewards and more fun into your server.</li>
    <li>Moderation Commands: The moderation commands, along with moderator roles, allow you to add an extra step for attackers to deal with when using bots to destroy your Discord server. Add your moderator role to moderator roles and remove the usual Discord permissions.</li>
    <li>Chat Streaks: Chat Streaks allow you to see how chronically online are your members. It counts consecutive days of chatting. A chat streak is lost when the member skips a day.</li>
    <li>Welcome &amp; Goodbye Messages: You can use Nekona to welcome new members and say goodbye to those who leave. There are two grace periods available, one for before the welcome message is sent, and one for when the welcome message gets deleted (when a member leaves too quickly). Both can be disabled</li>
    <li>Logging: This module logs events into the logs channel of your choosing.</li>
    <li>Automod Actions: Automod Actions allow you to perform extra actions when an AutoMod rule is triggered.</li>
    <li>Chat Summary: Chat Summary shows a summary of who sent how many messages at the end of the day.</li>
    <li>Server Settings: Server settings help you adjust the Nekona settings for your server. There are 2 types of settings: normal settings and list settings. Available settings for each module of Nekona can be read under the respective page. Use the sidebar.</li>
    <li>User Settings: User settings help you adjust the Nekona settings for yourself. There are 2 types of settings: normal settings and list settings. Available settings for each module of Nekona can be read under the respective page. Use the sidebar.</li>
    <li>Roles On Join: Add roles to members who join the server</li>
    <li>Chat Revive: Dead channels? With the help of Chat Revive, you can revive them after a set amount of minutes.</li>
    <li>Temporary VC: Temporary voice channels.</li>
    <li>Statistic Channels: You can set up channels that periodically update with the statistics of your server on the top of your server channel list. Create a voice channel and put it on top of the list, and ensure the bot has channel edit permissions.</li>
    <li>Verification: You can set up verification for your server using the verification module. Members have to solve a simple math problem to verify.</li>
    </ul>

    <p>
        <a href="https://top.gg/bot/1426903542601613444">
            <button>Invite Nekona</button>
        </a>
        <a href="https://top.gg/bot/1426903542601613444/vote">
            <button>Vote for Nekona</button>
        </a>
        <a href="https://git.mldchan.dev/luna/nekona/wiki">
            <button>Read the docs</button>
        </a>
        <a href="/discord">
            <button>Join the Discord server</button>
        </a>
    </p>

    <br />
    <br />


    <?php project_likes("nekona"); ?>
    <?php project_comments("nekona"); ?>

    <?php require "../../../components/footer.php"; ?>
</body>

</html>
