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
            grid-template-rows: 22px 1fr 22px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require "../components/header.php"; ?>
    <h1>Welcome to Luna's website!</h1>

    <div style="display: flex; flex-direction: row;">
        <div style="float: left;">
            <h2>About me</h2>
            <p>
                Hi, I'm Luna (<a href="https://en.pronouns.page/u/catgirl_ceo">she/her</a>), 20F 🏳️‍⚧️ catgirl <a href="https://git.mldchan.dev/luna" target="_blank">develper</a>, <a
                    href="https://www.youtube.com/@catgirl_ceo"
                    target="_blank">YouTuber</a> and <a href="https://fedi.mldchan.dev/users/luna" target="_blank">shitposter</a>. Join my community on <a href="/discord" target="_blank">Discord</a>! :3
            </p>

            <p>
                I can code in many programming languages such as C, C++, Java, Kotlin, JavaScript, TypeScript, Go, Rust, HTML,
                CSS, Python, Astro and many others
            </p>

            <p>idk what to put here but suggestions are welcome :3</p>

            <p>
                <a href="/https://git.mldchan.dev/luna/.profile/src/branch/main/AboutMe.md">Read more about me</a> :3 
            </p>
        </div>
        <div style="float: right; border: 1px solid white; width: 600px;">
            <strong style="margin: 8px;">Socials</strong><br>
            <ul>
                <?php 
                $res = pg_query($conn, "SELECT \"name\", \"url\" from socials");
                while (($row = pg_fetch_assoc($res))) :
                ?>
                <li>
                    <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
            <strong style="margin: 8px;">Contacts</strong><br>
            <ul>
                <?php 
                $res = pg_query($conn, "SELECT \"name\", \"url\" from contacts");
                while (($row = pg_fetch_assoc($res))) :
                ?>
                <li>
                    <?php if (strlen($row["url"]) > 0) : ?>
                    <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]); ?></a>
                    <?php else : ?>
                    <span><?= htmlspecialchars($row["name"]) ?></span>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <h2 style="clear: both;">Projects</h2>

    <div class="projects">
        <?php 
        $projects = pg_query($conn, "SELECT \"name\", \"description\", \"url\" FROM projects");
        while ($project = pg_fetch_assoc($projects)) { ?>
        <div>
            <strong><?= $project["name"]; ?></strong>
            <p><?= $project["description"]; ?></p>
            <a href="<?= $project["url"]; ?>">Read more about <?= $project["name"]; ?></a>
        </div>
        <?php }
        ?>
    </div>

    <br  />
    <p style="clear: both;">
        <a href="https://fediring.net/previous?host=mldchan.dev"><button>←</button></a>
        <a href="https://fediring.net/"><button>Fediring</button></a>
        <a href="https://fediring.net/next?host=mldchan.dev"><button>→</button></a>
    </p>
    <br />

    <img src="/button.gif" alt="88x31 button for Luna">
    <?php require "../components/buttons.php"; ?>

    <br />
    <br />
    <?php require "../components/footer.php"; ?>
</body>

</html>
