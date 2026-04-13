<?php
require "../../../components/comments.php"; ?>

<html>

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo("Website", "Lunya's website"); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>

    <h1>Lunya's website</h1>
    <p>On this page I (as part of a request) put some resources that you can use on your site. When using these resources, make sure to credit me and add my button!</p>

    <h2>Background stars effect</h2>
    <p>The background stars effect is a script that you can add into your website to add the stars effect from this website. The stars follow the mouse cursor, and increase count when moved quicker.</p>
    <a href="/project/website/background">
        <button>Add them to your website now!</button>
    </a>

    <h2>Cursor effects</h2>
    <p>The cursor effects is a library I originally found on the internet, so I'll link it on this website and provide a download link to it. I'll also provide some examples of the effects to copy and paste from here.</p>

    <a href="/project/website/cursoreffects">
        <button>Set up your own cursor effects now!</button>
    </a>

    <br />
    <br />

    <a href="https://forums.lunya.pet/viewforum.php?f=4">
        <button>Discuss the project (Forums)</button>
    </a>
    <a href="/discord">
        <button>Discuss the project (Discord)</button>
    </a>


    <?php project_comments("website"); ?>

    <?php require "../../../components/footer.php"; ?>

</body>

</html>
