<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("AstolfOS", "A Linux customization pack from 2023"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>AstolfOS</h1>

    <p>A small project consisting of a few configuration files and bash scripts to turn your Ubuntu 22.04 system into AstolfOS.</p>

    <h3>KDE screenshots</h3>

    <img src="desktop.webp" alt="AstolfOS desktop with Astolfo as background, a few icons, and the taskbar start button being Astolfo.">
    <img src="neofetch.webp" alt="Neofetch screenshot with Astolfo as the picture, and AstolfOS 22.04 as the name of the OS">
    <img src="settings.webp" alt="Settings page screenshot with Astolfo as the icon, AstolfOS 22.04 as the name and my website linked under that. KDE Plasma 5.24.7 on X11">

    <h3>Gnome screenshots</h3>

    <img src="gnome_settings.webp" alt="Settings page screenshot with Astolfo as the icon and AstolfOS 22.04 as the name">
    <img src="gnome_neofetch.webp" alt="Neofetch screenshot with Astolfo as the picture, and AstolfOS 22.04 as the name of the OS">

    <p>This project mainly focuses on Ubuntu 22.04. I also inherently avoid calling it a distro since this is just a script that applies changes, and doesn't ship a whole repository and package manager as well. Here is a full list of what it customizes:</p>

    <ul>
        <li>Add Astolfo to the neofetch command output</li>
        <li>Rename the operating system to AstolfOS</li>
        <li>Changes the OS logo if viewed from KDE</li>
        <li>Updates Bash prompt</li>
    </ul>

    <p>NOTE: The script hasn't been updated with the new git repo in mind, so it uses an outdated username and a dead GitHub link in the bash scripts.</p>

    <p>
        <a href="https://git.mldkyt.com/mldkyt/AstolfOS/releases">
            <button>Repository</button>
        </a>
    </p>

    <?php require "footer.php"; ?>
</body>

</html>
