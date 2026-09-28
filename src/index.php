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
            Hi, I'm mldkyt 🖤 (she/her) you can refer to me as "mld" or Luna. I am a <a href="https://git.mldkyt.com">programmer</a> and <a href="https://youtube.com/c/mldkyt">YouTuber</a> of sorts, more about that below.</p>

        <p>
            On youtube I post pretty much everything. Every time I get bored, I just start recording and post it on YT. In addition to random posts, there's also tutorials, videos documenting my programming projects and many more types of videos.
        </p>

        <p>
            I write code in many programming languages, mainly in Python, TypeScript, Go, PHP (this website is PHP!) and Rust. Some of my cool projects include <a href="/project/akabot">a Discord bot</a> that can replace other popular bots, or the <a href="/project/website">website</a> you're looking at. I have way too many projects for one's good, and this is very visible because <a href="https://git.mldkyt.com/mldkyt?q=&tab=repositories&archived=1&sort=recentupdate">a lot of them aren't maintained actively</a>. I have made My Summer Car mods, but don't make or maintain them anymore. I have also made a Mon Bazou mod and some Minecraft (joke) mods as well. My website can also be called a "project", there are many versions of it, in different frameworks and looks as well, but it mostly stayed the same. <a href="https://mldkyt.com/projects">You can view a full list of my projects here</a>. <a href="https://git.mldkyt.com/mldkyt?q=&tab=repositories">You can also view the repositories directly</a>.
        </p>

        <p>
            I am also <a href="https://soc.mldkyt.com/@mldkyt">active on the Fediverse</a>, where I made my first account on the 1st of September 2024. Ever since then, I have ran many self hosted servers, to test out the different software on the fediverse. I also run many different fediverse bots, like the <a href="https://soc.mldkyt.com/@collabmarkov">Fediverse Markov Bot</a>, that has gained so much popularity that it crashed my server multiple times.
        </p>

        <p>
            I am a Linux user since 2025, and I use NixOS (as of writing). The first time I tried out Linux was in 2020, and the reason I didn't switch was probably the choice of Ubuntu, and that I was gaming more back then. I would have probably switched earlier if I wasn't using Windows 7 until the very last moments. In 2023 I tried out Arch Linux for the first time, and actually stayed on it for a good month, and since then, I've been using Linux more and more frequently. The biggest change is when Microslop introduced online accounts, that was the point I made the full switch. I also use KDE Plasma btw. I have tried using various DE's and WM's, but my favorite was always KDE Plasma, and I didn't install Linux for customization reasons, I installed it because I had enough of Microslop's bullshit.
        </p>

        <p>
            You might wanna tell me what to put on this website because I ran out of ideas
        </p>
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
