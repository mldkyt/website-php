

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php";
    require "util.php";
    require "comments.php";
    require "likes.php"; ?>
    <?php seo("CountdownUntilNewYear", "Project used as a countdown until the end of the year for a stream."); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>CountdownUntilNewYear</h1>

    <p>A simple Vite+React project that was used when I streamed a countdown for the end of 2024. It served that purpose very well.</p>

    <p>The codebase wasn't updated ever since 2024 and 2025 didn't see an end of a year stream.</p>

    <h2>Downloads</h2>
    <p>
        <a href="https://git.mldkyt.com/mldkyt/countdown-until-new-year">
            <button>Repository</button>
        </a>
    </p>

    <?php project_likes("countdownuntilnewyear"); ?>
    <?php project_comments("countdownuntilnewyear"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
