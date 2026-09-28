<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Raldi Mod", "A cheat menu for an old version of Raldi's Crackhouse"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Raldi Mod</h1>

    <p>This was a cheat menu that was released for Raldi's Crackhouse 1.6.2 and the project was canceled when 2.0 of the game was released. It was cancelled and archived after there were issues created for 2.0 support on the repository.</p>

    <h2>Features:</h2>
    <ul>
        <li><strong>Menu</strong>: In-game menu with cool animations, text with RGB which totally gives you more FPS</li>
        <li><strong>Baldi doesn't move</strong>: Disables Raldi's movement.</li>
        <li><strong>Baldi doesn't hear</strong>: Disables Raldi's ability to hear anything.</li>
        <li><strong>Disable Cow</strong>: Disables Polish Cow.</li>
        <li><strong>Disable Furry</strong>: Disables Chipfloke.</li>
        <li><strong>Disable Van</strong>: Disables the van that kidnaps you.</li>
        <li><strong>Disable Beans</strong>: Disables beans (the one with the gun).</li>
        <li><strong>Monke Mode</strong>: Enables permanent Monke mode.</li>
        <li><strong>Disable Mr Breast</strong>: Disables Mr Beast and cancels challenge if running.</li>
        <li><strong>Missed Her Breastalovania</strong>: Activatest Mr Beast megalovania music</li>
        <li><strong>Add Stamina</strong>: Adds player stamina</li>
        <li><strong>Add Money</strong>: Adds money to player</li>
        <li><strong>Add items</strong>: Ability to add few ittems to player inventory</li>
    </ul>

    <p>This shitpost of a mod was made before my transition so apologize for edgy language holy shit</p>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/RaldiMod">Repository</a>
        <a href="https://git.mldkyt.com/mldkyt/RaldiMod/releases">Download</a>
    </p>

    <?php project_likes("raldimod"); ?>
    <?php project_comments("raldimod"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
