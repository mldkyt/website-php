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
    <?php require "../components/global.php"; ?>
    <?php seo("Home page", "Welcome to mldkyt's website!"); ?>

    <style>
        .projects {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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
    <?php require "../components/header.php"; ?>
    <h1>Welcome to mldkyt's website!</h1>

    <section>

        <div style="float: right; border: 1px solid white; min-width: 300px;">
            <strong style="margin: 8px;">Socials</strong><br>
            <ul>
                <?php
                $res = pg_query($conn, "SELECT \"name\", \"url\" from socials");
                while ($row = pg_fetch_assoc($res)): ?>
                <li>
                    <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]) ?></a>
                </li>
                <?php endwhile;
                ?>
            </ul>
            <strong style="margin: 8px;">Contacts</strong><br>
            <ul>
                <?php
                $res = pg_query($conn, "SELECT \"name\", \"url\" from contacts");
                while ($row = pg_fetch_assoc($res)): ?>
                <li>
                    <?php if (strlen($row["url"]) > 0): ?>
                    <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]) ?></a>
                    <?php else: ?>
                    <span><?= htmlspecialchars($row["name"]) ?></span>
                    <?php endif; ?>
                </li>
                <?php endwhile;
                ?>
            </ul>
        </div>

        <h2>About me</h2>
        <p>
            Hi, I'm mldkyt, a Czech <a href="https://git.mldkyt.com/mldkyt" target="_blank">developer</a> and a <a
                href="https://www.youtube.com/@catgirl_ceo"
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

        <p>I run my own services for myself and some of my friends. I have a <a href="https://soc.mldkyt.com/">Mastodon</a> fedi instance, a <a href="https://git.mldkyt.com/mldkyt">git</a> forge for all my coding needs and a bunch of other services. I track the status on <a href="https://status.mldchan.dev">Uptime-kuma</a>. Services that aren't listed here are primarily for personal use, or are not specifically used by/for me, such as my Discord and fedi bots.</p>

        <p>
            <a href="https://git.mldkyt.com/mldkyt/.profile/src/branch/main/AboutMe.md">Read more about me</a> :3
        </p>
    </section>

    <h2>Recent updates</h2>

    <?php
    $res = pg_query($conn, "SELECT \"title\", \"body\", \"url\" from updates order by created_at desc limit 3");
    while ($row = pg_fetch_assoc($res)): ?>
    <div>
        <p><strong><?= $row["title"] ?></strong></p>
        <p><?= $row["body"] ?></p>
        <?php if (isset($row["url"]) && strlen($row["url"]) > 0) { ?>
        <p><a href="<?= $row["url"] ?>">Learn more...</a></p>
        <?php } ?>
    </div>
    <?php endwhile;
    ?>

    <h2>Projects</h2>

    <div class="projects">
        <?php
        $projects = pg_query($conn, "SELECT \"name\", \"description\", \"url\" FROM projects");
        while ($project = pg_fetch_assoc($projects)) { ?>
        <div>
            <strong><?= $project["name"] ?></strong>
            <p><?= $project["description"] ?></p>
            <a href="<?= $project["url"] ?>">Read more about <?= $project["name"] ?></a>
        </div>
        <?php }
        ?>
    </div>

    <br  />
    <p>
        <a href="https://fediring.net/previous?host=mldkyt.com"><button>←</button></a>
        <a href="https://fediring.net/"><button>Fediring</button></a>
        <a href="https://fediring.net/next?host=mldkyt.com"><button>→</button></a>
    </p>
    <br />

    <img src="/button.gif" alt="88x31 button for mldkyt">
    <?php require "../components/buttons.php"; ?>

    <br />
    <br />
    <?php require "../components/footer.php"; ?>
</body>

</html>
