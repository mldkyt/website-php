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

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo("Home page", "Welcome to Luna's website!"); ?>
</head>

<body>
    <?php require "../components/header.php"; ?>
    <h1>Welcome to Luna's website!</h1>

    <h2>About me</h2>
    <p>
        Hi, I'm Luna (<a href="/pronouns">she/her</a>), and I'm a silly transgender lesbian catgirl (yes that's a spell), and I <a href="https://git.mldchan.dev/luna" target="_blank">code in production</a>, make <a
            href="https://www.youtube.com/channel/UC7JMha1kjOS7gsJXwNtosNw"
            target="_blank">YouTube videos</a> and <a href="https://sk.lunya.pet/@lunya" target="_blank">shitpost on fedi</a>! I have a <a href="/discord" target="_blank">Discord</a> server :3
    </p>

    <p>
        I write my code in a lot of programming languages, the choice of course based on which programming language I know best for the task. I've written projects in C, C++, Java, Kotlin, JavaScript, TypeScript, Go, Rust, HTML,
        CSS, Python, Astro and others in the past.
    </p>

    <p>
        On YouTube, I've published mostly <a href="https://www.youtube.com/watch?v=7RT3EZiDEeE&list=PLBuV8_rRvRfDdSWKlJBUNhzGo-Qgzi_nk&pp=gAQB" target="_blank">videos about My Summer Car</a>, <a
            href="https://www.youtube.com/watch?v=kebvJDNGDr0&list=PLBuV8_rRvRfDXeLbrypTB88hhOCZzLMcw&pp=gAQB"
            target="_blank">Mon Bazou</a>, <a href="https://www.youtube.com/watch?v=Rk5XmItKA1w&list=PLBuV8_rRvRfDDmQTZZ_F-L-PQkVAeMYBo&pp=gAQB" target="_blank">Minecraft</a>, <a
            href="https://www.youtube.com/watch?v=9-O8-Y6f818&list=PLBuV8_rRvRfD36HvpMg6BnfeLVzBVS5sq&pp=gAQB"
            target="_blank">Celeste</a> and other games. Some of these videos are tutorials, some have a vTuber like appearance, some document my own projects, others are just shitposts. <a href="https://www.youtube.com/channel/UC7JMha1kjOS7gsJXwNtosNw" target="_blank">You're welcome to check out my YouTube channel</a>. <a href="/qna">I also have a QnA on this website.</a>
    </p>

    <p>
        Wanna read a more personal "about me"? <a href="/about-me">Read about me~</a> :3 Otherwise, check out the things I've done:
    </p>

    <h3><a href="/projects">Programming Projects</a></h3>
    <ul>
        <li>
            <a href="/project/nekona"><strong>Nekona</strong></a> is a fully featured general purpose discord bot with over 30 features.
        </li>
        <li>
            Wanna be invaded by Astolfo? <a href="/project/astolfoiscomingforyou"><strong>Astolfo is coming for you</strong></a> is a Windows program that recreates the meme.
        </li>
        <li>
            Ever felt like a catgirl? <a href="/project/pawsense">PawSense</a> is for you.
        </li>
        <li>
            <a href="/project/astolfomod"><strong>Astolfo Mod</strong></a> adds a bunch of femboys and transgirls into minecraft :3
        </li>
        <li>
            <a href="/project/catgirlnonsense"><strong>catgirls dreams mmwrmwamrwamrmwa &gt;/////////&lt; wrwageiogjaa uwu :3 *pats you*</strong></a>
        </li>
    </ul>

    <h3><a href="https://www.youtube.com/channel/UC7JMha1kjOS7gsJXwNtosNw">Latest YouTube videos</a></h3>

    <ul>
        <?php
        $res = pg_query("SELECT title, url FROM videos ORDER BY ord DESC LIMIT 5");
        while ($row = pg_fetch_assoc($res)): ?>
        <li><a href="<?= htmlspecialchars($row["url"]) ?>"><strong><?= htmlspecialchars($row["title"]) ?></strong></a></li>
        <?php endwhile;
        ?>
    </ul>

    <p>Videos that perform well get mirrored to <a href="https://pt.lunya.pet/c/lunyavids" target="_blank">PeerTube</a>.</p>

    <br />
    <details>
        <summary>Webrings</summary>
        <p>
            <a href="https://fediring.net/previous?host=lunya.pet"><button>←</button></a>
            <a href="https://fediring.net/"><button>Fediring</button></a>
            <a href="https://fediring.net/next?host=lunya.pet"><button>→</button></a>
        </p>

        <div style="text-align:center">
            <a href="https://baccyflap.com/noai/?prv&s=aka" target="_top">« prev</a> |
            <a href="https://baccyflap.com/noai" target="_blank">no ai webring</a>
            <a style="font-size:60%" href="https://baccyflap.com/noai/?rnd" target="_top">(random)</a> |
            <a href="https://baccyflap.com/noai/?nxt&s=aka" target="_top">next »</a>
        </div>
    </details>
    <br />

    <h2>Buttons</h2>

    <h3>My button :3</h3>
    <p>I have my own button that <a href="/button.php">you can add to your website today. :3</a></p>

    <img src="/button.gif" alt="88x31 button for Luna">

    <?php require "../components/buttons.php"; ?>

    <br />
    <br />
    <?php require "../components/footer.php"; ?>
</body>

</html>
