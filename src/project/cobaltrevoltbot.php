

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php";
    require "util.php";
    require "comments.php";
    require "likes.php"; ?>
    <?php seo("Cobalt Revolt Bot", "A bot that would use the Cobalt service to download any link posted in a Revolt channel."); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Cobalt Revolt Bot</h1>

    <p>This was a simple Revolt/Stoat bot that would take links posted in a channel and attempt to download them using the Cobalt API. </p>

    <p>It supported many platforms, such as YouTube, Twitter, and more including pictures and videos.</p>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/CobaltRevoltBot">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("cobaltrevoltbot"); ?>
    <?php project_comments("cobaltrevoltbot"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
