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
            hi, i'm mldkyt 🖤 you can refer to me as "mld" or Luna. i am a <a href="https://git.mldkyt.com">programmer</a> and <a href="https://youtube.com/c/mldkyt">youtuber</a> of sorts, more about that below.</p>

        <p>
            on youtube i post pretty much everything. every time i get bored, i just start recording and post it on YT. in addition to random posts, there's also tutorials, videos documenting my programming projects and many more types of videos.
        </p>

        <p>
            i write code in many programming languages, mainly in python, typescript, go, php and rust. some of my cool projects include <a href="/project/akabot">a discord bot</a> that can replace other popular bots, or the <a href="/project/website">website</a> you're looking at. i have way too many projects for one's good, and this is very visible because <a href="https://git.mldkyt.com/mldkyt?q=&tab=repositories&archived=1&sort=recentupdate">a lot of them aren't maintained actively</a>. i have made my summer car mods, but don't make or maintain them anymore. i have also made a mon bazou mod and some minecraft (joke) mods as well. my website can also be called a "project", there are many versions of it, in different frameworks and looks as well, but it mostly stayed the same. <a href="https://mldkyt.com/projects">you can view a full list of my projects here</a>. <a href="https://git.mldkyt.com/mldkyt?q=&tab=repositories">you can also view the repositories directly</a>.
        </p>

        <p>
            i am also <a href="https://soc.mldkyt.com/@mldkyt">active on the fediverse</a>, where i made my first account on the 1st of september 2024. Ever since then, i have ran many self hosted servers, to test out the different software on the fediverse. i also run many different fediverse bots, like the <a href="https://soc.mldkyt.com/@collabmarkov">fediverse markov bot</a>, that has gained so much popularity that it crashed my server multiple times.
        </p>

        <p>
            i am a linux user since 2025, and i use arch linux (btw). the choice of arch linux is that it's minimal, but has good repositories, and the aur if a package isn't in the repositories. the first time i tried out linux was in 2020, and the reason i didn't switch was probably the choice of ubuntu, and that i was gaming more back then. i would have probably switched earlier if i wasn't using windows 7 until the very last moments. in 2023 i tried out arch linux for the first time, and actually stayed on it for a good month, and since then, i've been using linux more and more frequently. the biggest change is when microslop introduced online accounts, that was the point i made the full switch. i also use kde plasma btw. i have tried using various de's and wm's, but my favorite was always kde plasma, and i didn't install linux for customization reasons, i installed it because i had enough of microslop's bullshit.
        </p>

        <p>
            you might wanna tell me what to put on this website because i ran out of ideas
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
