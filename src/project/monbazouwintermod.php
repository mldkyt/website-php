<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Mon Bazou Winter Mod", "Unfinished winter mod for Mon Bazou"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Mon Bazou Winter Mod</h1>

    <p>Decided to make a winter mod for Mon Bazou following the winter mod for My Summer Car, but the project kind of got unfinished.</p>

    <p>Everything the mod did was set the road textures and the terrain textures to winter textures, and that's it. The physics behaved the same entirely, and foliage had to be disabled by using in-game settings.</p>

    <?php project_likes("monbazouwintermod"); ?>
    <?php project_comments("monbazouwintermod"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
