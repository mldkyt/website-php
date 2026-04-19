<?php

require "../../../components/util.php";
require "../../../components/comments.php";
require "../../../components/likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo("Cutie Quiz", "A cutie quiz to determine how cute you are :3"); ?>
    <script type="text/javascript">
        function showMedia() {
            $("#media_wrapper").html(`
                        <img src="1.png" alt="Cutie Quiz home page"></img>
                        <img src="2.png" alt="Cutie Quiz enter username page"></img>
                        <img src="3.png" alt="Cutie Quiz results page for user Lunya"></img>
                        <p>
                            <button onclick="hideMedia()">Hide Media</button>
                        </p>
                    `);
        }

        function hideMedia() {
            $("#media_wrapper").html(`
                        <p>
                            <button onclick="showMedia()">Show Media</button>
                        </p>
                    `);
        }
    </script>
</head>

<body>
    <?php require "../../../components/header.php"; ?>

    <h1>Cutie Quiz</h1>
    <div class="error">
        <h2>No longer updated</h2>
        <p>This project was scheduled for shutdown on Oct 31st. You will always be able to view the source code.</p>
    </div>
    <p>
        Cutie Quiz is a quiz app whic determines how cute you are. It's a joke, btw.
    </p>
    <p>
        Cutie Quiz is a tiny app which takes a username and then determines how cute you are by analyzing brain
        waves.
    </p>
    <p>
        It does this using revolutionary next-generation technology, which is newer and better than AI and
        determines values without errors. It has such good accuracy that you don't need any other source of
        information to verify your results because our results are always accurate.
    </p>

    <div id="media_wrapper">
        <p>
            <button onclick="showMedia()">Show Media</button>
        </p>
    </div>

    <p>
        <a href="https://cutie-quiz.vercel.app">
            <button>Take it NOW!</button>
        </a>
        <a href="https://git.lunya.pet/lunya/CutieQuiz">
            <button>Open GitHub page</button>
        </a>
    </p>


    <?php project_likes("cutiequiz"); ?>
    <?php project_comments("cutiequiz"); ?>
    <?php require "../../../components/footer.php"; ?>
</body>

</html>
