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

function validate_captcha()
{
    if (!isset($_POST["mcaptcha__token"])) {
        return false;
    }

    $mcaptchaToken = $_POST["mcaptcha__token"];

    $payload = [
        "token" => $mcaptchaToken,
        "key" => getenv("MCAPTCHA_SITE_KEY"),
        "secret" => getenv("MCAPTCHA_SECRET_KEY"),
    ];

    $ch = curl_init(getenv("MCAPTCHA_DOMAIN") . "/api/v1/pow/siteverify");

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($payload),
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        return false;
    }

    $result = json_decode($response, true);

    if ($result && !empty($result["valid"])) {
        // CAPTCHA passed
        return true;
    }

    return false;
}

$captcha = validate_captcha();
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
            <?php if ($captcha): ?>
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

            <?php endif; ?>
        </div>

        <?php if (!$captcha): ?>
        <h2>Please verify</h2>
        <p>All socials and contact information is hidden to deter bad actors from abusing the information. Please verify this captcha to see this information</p>
        <form method="post">
            <label
              data-mcaptcha_url="<?= getenv("MCAPTCHA_DOMAIN") . "/widget/?sitekey=" . getenv("MCAPTCHA_SITE_KEY") ?>"
              for="mcaptcha__token"
              id="mcaptcha__token-label"
            >
              mCaptcha authorization token.
              <a
                href="https://mcaptcha.org/docs/user-manual/how-to-mcaptcha-without-js/"
                >Instructions</a
              >.
              <input type="text" name="mcaptcha__token" id="mcaptcha__token" />
            </label>
            <div id="mcaptcha__widget-container"></div>
            <script src="https://unpkg.com/@mcaptcha/vanilla-glue@0.1.0-rc2/dist/index.js"></script>

            <button type="submit">Verify</button>
        </form>
        <?php endif; ?>

        <h2>About me</h2>

        <p>
            Hi, I'm mldkyt, a Czech <a href="https://git.mldkyt.com/mldkyt" target="_blank">developer</a> and a <a
                href="https://www.youtube.com/@catgirl_ceo"
                target="_blank">YouTuber</a>. Also don't forget to <a href="/guestbook">sign my guestbook</a> while you're on my site! :3
        </p>

        <p>
            My community has its center on <?php if (
                $captcha
            ): ?><a href="https://discord.gg/aE2MXH5Qp6" target="_blank">Discord</a><?php else: ?>Discord<?php endif; ?>, however if you can't access the Discord due to not having an account, <a href="/discord/explore">you can explore the Discord server publicly</a> :3
            <?php if (!$captcha): ?>(The Discord text becomes a link when captcha is verified.)<?php endif; ?>
        </p>

        <p>On YouTube I post pretty much everything from gameplays to showing off my projects. I am to upload every Friday but most of the time it doesn't work out because I have no ideas on what to upload.</p>

        <p>
            I can code in many programming languages such as C, C++, Java, Kotlin, JavaScript, TypeScript, Go, Rust, HTML,
            CSS, Python, Astro and many others. I wrote many cool things which you can check out by scrolling down.
        </p>

        <p>I run my own services for myself and some of my friends. I have a <a href="https://soc.mldkyt.com/">Mastodon</a> fedi instance, <a href="https://gitlab.mldkyt.com/mldkyt">Gitlab</a> forge for all my coding needs and a bunch of other services. I track the status on <a href="https://status.mldchan.dev">Uptime-kuma</a>. Services that aren't listed here are primarily for personal use, or are not specifically used by/for me, such as my Discord and fedi bots.</p>

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
