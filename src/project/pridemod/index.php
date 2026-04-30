<?php
require "../../../components/util.php";
require "../../../components/comments.php";
require "../../../components/likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo("Pride Mod", "Le Pride mod for My Summer Car and My Winter Car"); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>

    <h1>Pride Mod</h1>
    <p>A mod for celebrating pride month in My Summer Car and My Winter Car.</p>
    <p>Pride Month Mod for My Summer Car and My Winter Car! Current features:</p>
    <ul>
        <li><strong>UI color changer</strong>: LGBTQ+, Transgender, Non Binary, Pansexual and custom!</li>
        <li><strong>Pride Flags:</strong> LGBTQ+ Pride Flags including Lesbian, Gay, Bisexual, Transgender and custom!</li>
        <li><strong>OwOifier:</strong> OwOifies all text in all mods and all places.</li>
        <li><strong>Identity Changer:</strong> Allows you to become an enby, girl, trans masc, trans fem in My Summer Car!</li>
        <li><strong>Estrogen:</strong> Estrogen, dashing and double jumping in My Summer Car!</li>
    </ul>
    <p>
        <a href="https://www.nexusmods.com/mysummercar/mods/8943">
            <button>Download the mod on NexusMods (My Summer Car)</button>
        </a>
        <a href="https://www.nexusmods.com/mywintercar/mods/838">
            <button>Download the mod on NexusMods (My Winter Car)</button>
        </a>
        <a href="/discord">
            <button>Discuss the project (Discord)</button>
        </a>
    </p>

    <?php project_likes("pridemod"); ?>
    <?php project_comments("pridemod"); ?>
    <?php require "../../../components/footer.php"; ?>

</body>

</html>
