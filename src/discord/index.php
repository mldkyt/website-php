<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Discord Server", "Lunya's Discord Server"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>

    <h1>Lunya's Discord Server</h1>
    <p>Here you can join the Discord server that is owned by Lunya.</p>
    <p>Here you can get help with any of her mods, chat with the community or ask her questions.</p>
    <p>You will get video announcements, new project announcements and ability to get involved in developing of some projects.</p>
    <?php if (isset($_POST["title"]) && (strtolower($_POST["title"] == "discord") || strtolower($_POST["title"]) == "lunya's discord server" || strtolower($_POST["title"]) == "lunyas discord server")) : ?>
    <p>
        <a href="https://discord.gg/uTWjgy2E4v">
            <button>Join</button>
        </a>
    </p>
    <?php else : ?>

        <?php if (isset($_POST["title"])) : ?>
        <div class="error">
            That was not the page title, please enter the page title to show the Discord invite
        </div>
        <?php endif; ?>

        <p>In order to view the Discord invite link (and for me to avoid bots), enter the title of this page into here:</p>

        <form action="/discord/" method="post">
            <label for="title">Page title:</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <br>
            <button type="submit">Show Discord invite</button>
        </form>
    <?php endif; ?>
    <h2>Updates directly from Lunya</h2>
    <p>This server is where you'll find the latest Lunya news. It's where we post new projects, YouTube videos, and when Lunya goes live.</p>

    <h2>Nekona Support</h2>
    <p>The Lunya server also is a support server for Nekona. Get help with commands, report bugs, and suggest improvements for the bot.</p>
    <p>The bot has an updates channel for news and to announce when it's offline.</p>

    <h2>Custom bot: Ai</h2>
    <p>There's a custom bot called Lunya's Ai. It's a bot that helps with everything in the server.</p>

    <h2>Friendly and safe community</h2>
    <p>With our rules, you can expect to not be uncomfortable chatting in this Discord server.</p>
    <p>We have strict rules to protect our members from getting attacked or from getting uncomfortable.</p>

    <h2>All of my projects, in one place</h2>
    <p>On this Discord server, you can find all of my projects' discussions in one place.</p>
    <p>We have a channel for each project where we discuss the project, share updates, and more.</p>
    <p>You can find the list of all projects by clicking <a href="/projects">here</a>.</p>

    <h2>LGBTQ+ friendly</h2>
    <p>This server is LGBTQ+ friendly. We have a safe and friendly community.</p>
    <p>Any jokes against you all LGBTQ+ members will be removed and their respective authors will be punished accordingly.</p>
    <p>We believe that LGBTQ+ members are vulnerable and that they should be treated with respect.</p>
    <p>Everyone else is also treated with respect as well.</p>

    <?php require '../../components/footer.php'; ?>
</body>

</html>
