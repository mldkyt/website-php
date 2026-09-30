<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Akabot for Fluxer", "A cancelled port of Akabot to Fluxer"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1 id="akabot">Akabot for Fluxer</h1>
    <p>
        Akabot for Fluxer was an attempt to port Akabot to Fluxer, a new alternative to Discord. This port was way more complete than the Stoat one, but not as complete as the Discord one. Unlike the Discord version of Akabot, Akabot for Fluxer was written inside of TypeScript using the Deno runtime instead of Python.
    </p>
    <p>
        The features of this version of the bot include:</p>
    <ul>
        <li><strong>Anti Raid</strong>: Advanced anti-raid with caps detection, duplicate messages detection, invite detection, join burst detection, and mention spam detection</li>
        <li>
            <strong>Chat Revive</strong>: Revive the chat if it's dead for a while by pinging a role after a set delay.
        </li>
        <li><strong>Chat Streaks</strong>: Streak of how many days you have sent a message after each other.</li>
        <li><strong>Chat Summary</strong>: Daily, weekly and monthly chat streaks with full customizability!</li>
        <li><strong>Counting</strong>: Counting channels featuring any count mode, letting chatting alongside counting, and other counting modes such as word count</li>
        <li><strong>Leveling</strong>: Leveling system with rewards, and multipliers</li>
        <li><strong>Logging</strong>: Full per-channel configurable logging, logging all basic system events, and Akabot events as well</li>
        <li><strong>Meow Back</strong>: Meow, bark, :3, waf, awawa and owo back at anyone who posts any of these. Part of the fun :3</li>
        <li><strong>Reaction Roles</strong>: !iam &lt;role&gt; system</li>
        <li><strong>Roles on Join</strong>: Select a list of roles to add to any newly joined member.</li>
        <li><strong>Verification</strong>: Basic token-based verification for Fluxer servers.</li>
        <li><strong>Welcome & Goodbye Messages</strong>: Customizable Welcome and Goodbye messages, including text and embeds.</li>
        <li><strong>Full web configuration</strong>: Everything above is fully customizable from the web UI of the bot.</li>
    </ul>
    <p>This bot had a web UI before the main bot got its web UI. It also had a more unique way of loading modules, instead of relying on Cogs and relying on the Discord library to load modules, it loaded modules on its own, including custom web routes.</p>
    <p>The primary reason for the web UI is the lack of slash commands on Fluxer, meaning people won't see the help and autocomplete pop up, and they would do a lot of guessing. So instead there was a web UI for all configurations.</p>
    <p>The cancellation reason is the fact that I couldn't find a use case for Fluxer. Almost no-one switched from Discord to Fluxer, and maintaining an entirely different codebase for Fluxer is out of question for me and my time.</p>

    <br />
    <br />


    <?php project_likes("akabot_fluxer"); ?>
    <?php project_comments("akabot_fluxer"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
