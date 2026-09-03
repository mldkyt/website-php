<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("uwurandom-rs", "Catgirl nonsense, but in the Rust programming langauge, for maximum femininity."); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>uwurandom-rs</h1>
    <p>Catgirl nonsense, but in the Rust programming langauge, for maximum femininity.</p>
    <p>
        This project, or library to say it right, does the same thing as <a href="/project/catgirlnonsense">Catgirl nonsense</a> does, but it does it as a library in the Rust programming language. Written by a transgirl btw.
    </p>
    <p>The library is very easy to use, for the maximum femefficiency :3</p>
    <p>
        <a href="https://crates.io/crates/mldkyt-uwurandom-rs">
            <button>Download from crates.io</button>
        </a>
        <a href="https://git.mldkyt.com/mldkyt/uwurandom-rs">
            <button>Download from git.mldkyt.com</button>
        </a>
        <a href="/discord">
            <button>Discuss the project (Discord)</button>
        </a>
    </p>

    <?php project_likes("uwurandom-rs"); ?>
    <?php project_comments("uwurandom-rs"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
