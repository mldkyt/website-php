<?php
if ($_SERVER["REQUEST_URI"] != "/") {
    if (!str_ends_with($_SERVER["REQUEST_URI"], ".php")) {
        header("Location: " . $_SERVER["REQUEST_URI"] . ".php");
        die("Redirecting...");
    } else {
        http_response_code(404);
        die("404 page not found");
    }
}

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Home page", "Welcome to mldkyt's website!"); ?>

    <style>
        .projects {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .projects > div {
            margin: 4px;
            padding: 4px;
            border: 1px solid white;
            display: grid;
            grid-template-rows: min-content 1fr min-content;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>
    <section>
        <p>
            Hi, I'm mldkyt, a Czech <a href="https://git.mldkyt.com/mldkyt" target="_blank">programmer</a> and a <a
                href="https://www.youtube.com/@mldkyt"
                target="_blank">YouTuber</a>. Also don't forget to <a href="/guestbook">sign my guestbook</a> while you're on my site! :3
        </p>

        <p>
            My community has its center on <a href="https://discord.gg/aE2MXH5Qp6" target="_blank">Discord</a>, however if you can't access the Discord due to not having an account, <a href="/discord/explore">you can explore the Discord server publicly</a> :3
        </p>

        <p>On YouTube I post pretty much everything from gameplays to showing off my projects. I am to upload every Friday but most of the time it doesn't work out because I have no ideas on what to upload.</p>

        <p>
            I can code in many programming languages such as C, C++, Java, Kotlin, JavaScript, TypeScript, Go, Rust, HTML,
            CSS, Python, Astro and many others. I wrote many cool things which you can check out by scrolling down.
        </p>

        <p>I run my own services for myself and some of my friends. I have a <a href="https://soc.mldkyt.com/">Mastodon</a> fedi instance, a <a href="https://git.mldkyt.com/mldkyt">git</a> forge for all my coding needs and a bunch of other services. I track the status on <a href="https://status.mldkyt.com">Uptime-kuma</a>. Services that aren't listed here are primarily for personal use, or are not specifically used by/for me, such as my Discord and fedi bots.</p>
    </section>

    <br  />
    <p>
        <a href="https://fediring.net/previous?host=mldkyt.com"><button>←</button></a>
        <a href="https://fediring.net/"><button>Fediring</button></a>
        <a href="https://fediring.net/next?host=mldkyt.com"><button>→</button></a>
    </p>
    <br />

    <?php require "footer.php"; ?>
</body>

</html>
