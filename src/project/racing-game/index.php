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
        "Racing Game",
        "An old racing game from 2017. Made without code!",
    ); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>
    <h1>Racing Game</h1>

    <p>Racing Game was a game I made back in 2017 in Unity, way before I knew anything about coding. It was made in the first ever release of Unity 2017, which was released on Jun 25th 2017. The game was made on 14th August 2017.</p>

    <p>Although I have the original game with me today, same cannot be said about the original source code. However, upon using an open source tool to decompile the game, it yielded a fully working 1:1 copy of the game! The "source code" of my game is available on my git forge now.</p>

    <p>The game doesn't include much content, as at the time I didn't know how to use Unity at all, it was more of an experimentation.</p>

    <h2>Features</h2>

    <ul>
        <li>Driving</li>
        <li>A few buildings on the map</li>
        <li>Big hills</li>
    </ul>

    <p>...and that's about it. The game doesn't really have much</p>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.lunya.pet/lunya/racing-game/releases">
            <button>Download the game</button>
        </a>
        <a href="https://git.lunya.pet/lunya/racing-game">
            <button>The "source code"</button>
        </a>
    </p>

    <?php project_likes("racing-game"); ?>
    <?php project_comments("racing-game"); ?>
    <?php require "../../../components/footer.php"; ?>
</body>

</html>
