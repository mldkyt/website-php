<?php
require "../../../components/comments.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../components/global.php"; ?>
        <?php seo(
            "PawSense",
            "Leading Innovation for Detecting Cat(girls) at Computers",
        ); ?>
    </head>

    <body>
        <?php require "../../../components/header.php"; ?>

        <h1>PawSense</h1>

        <p>This is a joke program that shows a "Cat-Like Behaviour Detected" window. This window is currently purely decorational</p>

        <p>Upon opening, the program displays a window saying "Cat-Like Typing Detected".</p>

        <img src="img1.png" alt="A window open in Windows 10, showing a program with the title PawSense and a big caption Cat-Like Typing Detected" />

        <p>For the user to discard this message, they either have to click the button in the middle or type "human" or "terminate" in the box below.</p>

        <p>
            <a href="https://git.lunya.pet/lunya/PawSense/releases">
                <button>Download</button>
            </a>
            <a href="https://git.lunya.pet/lunya/PawSense">
                <button>View the source code</button>
            </a>
            <a href="https://forums.lunya.pet/viewforum.php?f=13w">
                <button>Discuss the project (Forums)</button>
            </a>
            <a href="/discord">
                <button>Discuss the project (Discord)</button>
            </a>
        </p>


        <?php project_comments("pawsense"); ?>

        <?php require "../../../components/footer.php"; ?>
    </body>
</html>
