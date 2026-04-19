<?php
require "../../../components/util.php";
require "../../../components/likes.php";
require "../../../components/comments.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo(
        "Soobscrib",
        "A project from 2021 about subscribing to \"MLDKYT\". A game where you have to subscribe to win.",
    ); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>
    <h1>Soobscrib</h1>

    <p>Soobscrib is a really short and small game released in 2021 based on an idea given to me. The game is up on Itch.IO today and anyone can play it.</p>

    <p>The game is about subscribing to "MLDKYT", which was my old username. <a href="https://youtu.be/pZjBxp02hr4">More on that is here (YouTube)</a>. After the game is won the player has 2 options, either to quit the game or restart as anyone they choose. The original video about this game shows "MLDKYT" and "Aceward" who wrote the suggestion back in 2021.</p>

    <p>The itch release below is dated to 12th July 2025, the original game was released sometime before Jul 13, 2021. This was the second game I accidentally deleted off of my Itch.IO page, but I was able to recover it.</p>

    <p>There is no source code available (again I do not have it archived like my other old projects), however it is really easy to recreate</p>

    <h2>Downloads and other content</h2>
    <p>
        <a href="https://youtu.be/zBQIIjk0t74">
            <button>A game where you have to subscribe to win | Soobscrib (YouTube video)</button>
        </a>
        <a href="https://catgirllunya.itch.io/soobscrib">
            <button>Download this game (Itch.IO)</button>
        </a>
    </p>

    <?php project_likes("soobscrib"); ?>
    <?php project_comments("soobscrib"); ?>
    <?php require "../../../components/footer.php"; ?>
</body>

</html>
