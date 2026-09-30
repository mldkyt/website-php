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
        "Discord Bot Control",
        "Simple Windows Forms app for controlling a Discord bot using a GUI.",
    ); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Discord Bot Control</h1>

    <p>This simple app written in C# and WinForms allows self control of a Discord bot.</p>

    <h2>Abilities</h2>
    <ul>
        <li>View guilds</li>
        <li>View text channels</li>
        <li>View threads</li>
        <li>Member lists</li>
        <li>Create and manage invites</li>
        <li>Role view</li>
        <li>Editing of roles</li>
    </ul>

    <p>This project was never finished but it is still usable. What isn't implemented:</p>

    <ul>
        <li><strong>Forum Channels</strong>: Those were not released around the time this program was written.</li>
        <li><strong>Announcement Channels</strong>: Same as forum channels; not released</li>
        <li><strong>Intents</strong>: The bot starts with all intents, and doesn't let you run it without certain intents.</li>
        <li><strong>Role Management</strong>: While editing individual roles is there, no rearrangement of roles is implemented.</li>
        <li><strong>Channel Management</strong>: No ability to edit channels, and no ability to rearrange them is implemented.</li>
    </ul>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/DiscordBotControl">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("discordbotcontrol"); ?>
    <?php project_comments("discordbotcontrol"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
