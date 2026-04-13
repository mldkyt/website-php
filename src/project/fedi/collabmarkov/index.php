<?php
require "../../../../components/comments.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo("Collaborative Markov Bot", "A bot that makes a "); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>
    <h1>Collaborative Markov Bot</h1>

    <img src="collabmarkov.jpg" alt="Collaborative Markov bot's profile, with some fire effect over it and a few posts overlaid over each other." />

    <h2>This bot is very silly :3</h2>

    <p>
        When you follow the bot, the bot will add your posts into its corpus and follow you to get more. When 180 people follow an instance of this bot, very silly things are bound to happen. The best posts are pinned on the
        profile of the bot itself, so if you want to check them out, check the profile below.
    </p>

    <p>Users who want to follow the bot but not be part of the corpus can add <code>#NoMarkov</code> inside their bio to make the bot not interact with them <strong>at all.</strong></p>

    <p>
        <a href="https://sk.lunya.pet/@collabmarkov">
            <button>Official account (feel free to follow!)</button>
        </a>
        <a href="https://git.the-wired.club/lunya/collabmarkov">
            <button>Source code</button>
        </a>
    </p>


    <?php project_comments("collabmarkov"); ?>

    <?php require "../../../components/footer.php"; ?>
</body>

</html>
