

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php";
    require "util.php";
    require "comments.php";
    require "likes.php"; ?>
    <?php seo("BBCode Celeste", "Extension library for BBCode for Celeste effects"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>BBCode Celeste</h1>

    <p>A library which extends the BBCode library with Celeste effects. Here are the supported effects: </p>

    <ul>
        <li><strong>Shake</strong>: The shake effect seen in some dialogs in Celeste when a character is screaming</li>
        <li><strong>Wave</strong>: The wave effect seen in some dialogs in Celeste.</li>
    </ul>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/BBcodeCeleste">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("bbcodeceleste"); ?>
    <?php project_comments("bbcodeceleste"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
