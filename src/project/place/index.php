<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("place", "A small r/place clone"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>place</h1>

    <p>This was a small r/place clone that had a small playground to play on. Anyone could sign up on an account and place on intervals.</p>

    <p>This clone ran on place.mldkyt.com from August to October 2023, and within this time there were beautiful artworks and one time the thing got hacked and griefed.</p>

    <img src="place.png" alt="Screenshot from August 2023, showing the website loaded in Chrome, and a few boxes placed on a grid. The logged in user is Astolfo">

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/place">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("place"); ?>
    <?php project_comments("place"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
