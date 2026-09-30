

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php";
    require "util.php";
    require "comments.php";
    require "likes.php"; ?>
    <?php seo("Nexus Enhancements for Firefox", "Simple extension for blocking usernames inside of the NexusMods comment sections."); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Nexus Enhancements for Firefox</h1>

    <p>a small extension for Firefox originally made for personal use :3</p>
    <img src="nexusmodsfirefox.png" alt="User Interface">
    <p>this simple exception really simply allows you to hide comments from specific users on nexusmods mods and images.</p>
    <p>this extension was last tested in like August 2024, so the extensions may not work :3c</p>
    <br />

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/NexusEnhancementsForFirefox/releases">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("nmfirefox"); ?>
    <?php project_comments("nmfirefox"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
