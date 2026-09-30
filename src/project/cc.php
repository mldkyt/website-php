<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("ComputerCraft scripts", "Monorepo full of scripts"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>ComputerCraft scripts</h1>

    <p>The ComputerCraft scripts (cc repo) is a collection of scripts that I host on git and download into the game using ComputerCraft's http module into the game. This way I can update from outside of the game and also write the code outside of the game.</p>

    <p>All scripts contain a startup routine that would safely attempt to download the latest version of the script into every ComputerCraft PC before starting the actual main program.</p>

    <h2>Create SMP</h2>

    <p>This used to be a server between one friend and me, and I used hosted one script in here.</p>

    <h3>Estrogenmanager</h3>

    <p>Seems to be a script that would display tank levels in an estrogen factory.</p>

    <p>Features a self-update system with a version check.</p>

    <h3>Farmerbot</h3>

    <p>This simple script was meant to be installed on a CC turtle and would attempt to farm crops. The way it worked is it went on a field, scanning for maturity of plants underneath. If a plant was mature, it would destroy it and plant seeds. It repeated this forever, turning around when hitting a wall.</p>

    <p>When starting up a version check would be performed between a version.json installed in the folder of the turtle and on the server. Files would be redownloaded when versions didn't match.</p>

    <h3>Farmerbot2</h3>

    <p>This is another version of farmerbot for god knows what. Doesn't feature any self-updating.</p>

    <h3>Rootdir</h3>

    <p>The root directory of the script features a simple ad disply script with a similar update system, that would display "femboy.bio/mldkyt" on monitor_0 in a network. </p>

    <h2>Cutie Hangout</h2>

    <p>This is a folder featuring scripts for the cutie hangout Minecraft server (friend group). All scripts below feature a simple update routine at startup that overwrites all files with latest copies.</p>

    <h3>app</h3>

    <p>An unfinished app store system with a decentralized app store. Servers ran the server software which would give out a file list to the whole system. Clients could download apps and save them. This worked via in-game networking.</p>

    <h3>Base Display</h3>

    <p>Simple program that would display all computers inside of the same network and whether they were online or not.</p>

    <h3>Estrogen</h3>

    <p>Displays piss and estrogen levels on a display link.</p>

    <h3>Farm Chest</h3>

    <p>Displays the usage of a farm chest and its fullness on a screen next to the chest.</p>

    <h3>Playtime</h3>

    <p>Uses an external server ran by me on my network in order to display players and playtime of players on the server.</p>

    <p>The external server would have an API endpoint requested by this program which would return a JSON with players and playtimes. This information would be displayed in-game.</p>

    <h3>Status</h3>

    <p>Higher-quality diplay of local computers with on-screen settings, touchscreen support and more. Runs its tasks in parallel to optimize for load.</p>

    <h2>mldkyt mc</h2>

    <p>These are scripts used inside of the mldkyt community Minecraft server.</p>

    <h3>spawn_info_board</h3>

    <p>Script that shows all the server information on the screen at spawn, and allows navigation for users to read about all the server features.</p>

    <h3>station_boat_giver</h3>

    <p>Screen that offers players boats and runs commands to give them out.</p>

    <h3>station_map</h3>

    <p>Script that draws a map on a CC screen of the underground tunnels.</p>

    <h2>VelkySMP</h2>

    <p>Scripts used when Velky SMP used to be a Tekkit 2 server. Velky is an English VTuber.</p>

    <h3>guestbook</h3>

    <p>Simple guestbook app with keyboard input that let players sign that they were at my base.</p>

    <h3>guestbook-cloud</h3>

    <p>Same as above but sends everything to my server, so that a thief cannot steal the computer with the data.</p>

    <h3>news</h3>

    <p>Fetches a JSON file from my nekoweb website and displays the news on a scrolling screen.</p>

    <h3>player</h3>

    <p>This folder contains many utilites and player scripts that were used on Plethora equipment attached to the player. </p>

    <p><strong>basenotifs</strong>: This simple script listens for global broadcasts from my base, and sends me chat notifications when someone enters or leaves my base.</p>
    <p><strong>entdisplay</strong>: Lists entities in the corner of my screen</p>
    <p><strong>entsense</strong>: Greets and says goodbye to nearby players in view range.</p>
    <p><strong>eventlogger</strong>: Simply logs everything into chat</p>
    <p><strong>meow</strong>: Randomly generates meows and posts them in chat</p>
    <p><strong>netlogger</strong>: Logs all received messages</p>
    <p><strong>spinningfish</strong>: Joke program that adds spinning fish above all players heads.</p>
    <p><strong>ui</strong>: Despite the name it renders time on screen</p>

    <h3>radarmon</h3>

    <p>Script that posts players going in and out of my base on a Discord webhook.</p>

    <h3>spawnmon</h3>

    <p>Monitor that displayed the list of players on VelkySMP on spawn.</p>

    <p>The latest version has players hardcoded into the program as the server behind it stopped working on 2024/10/31. The servers watching over the Minecraft server were running since 2024/02/25.</p>

    <p>The simple variant of the script simply doesn't rely on color support and touchscreen support and just displays the list. This one doesn't have hardcoded values.</p>

    <h3>starter</h3>

    <p>Finds all computers on the same network and starts all of them.</p>

    <h3>ticketclient and ticketserver</h3>

    <p>This was an unfinished ticket ordering system, as the server had a work-in-progress train system.</p>

    <p>The ticket client sat at the front gate of every train station and the user would buy a ticket on it.</p>

    <p>The ticket server handled storage, generation and verification operations.</p>

    <h3>tips</h3>

    <p>Simply rendered tips and a next and previous button for a few tips related to the spawnmon project. Mainly that the website allowed showing a full list of players, and that players could customize their profile by asking me.</p>

    <h3>Additional scripts</h3>

    <p>The download script at the root of the directory simply downloaded a few handy scripts, when passed as a parameter. E.g. "download json" would download json.lua from gist.</p>

    <p>The utils file is a collection of handy utilities shared by almost all the scripts used to perform handy operations.</p>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/cc">
            <button>Monorepo</button>
        </a>
    </p>

    <?php project_likes("cc"); ?>
    <?php project_comments("cc"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
