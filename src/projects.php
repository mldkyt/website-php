<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Project list", "Luna's full project list"); ?>
    <style>
        .project {
            margin-bottom: 20px;
            background: #333;
            color: #fff;
            height: 100px;
            background-position: center;
            background-size: cover;
            border: 4px solid gray;
            border-bottom: 4px solid rgb(61, 61, 61);
            border-right: 4px solid rgb(61, 61, 61);
            margin: 4px;
        }

        .project h3 {
            padding: 6px 0;
            height: 30px;
            font-size: 30px;
            text-shadow: 2px 2px 2px #000;
            background: #333333aa;
            padding-left: 10px;
        }

        .project p {
            margin: 0;
            padding-left: 20px;
            color: #ffffff;
            text-shadow: 2px 2px 2px #000;
            background: #333333aa;
            height: 60px;
        }

        .project a {
            color: white;
            text-decoration: none;
        }

        .projectContainer {
            display: grid;
            grid-template-columns: 1fr;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Luna's projects</h1>
    <p>This is a list of Luna's projects.</p>
    <div class="projectContainer">
        <a href="/project/akabot">
            <div class="project" style="background-image: url(/project/akabot/akabot.png);">
                <h3>Akabot</h3>
                <p>A fully featured general purpose discord bot with over 30 features.</p>
            </div>
        </a>
        <a href="/project/website">
            <div class="project" style="background-image: url(/project/website/banner.png);">
                <h3>Website</h3>
                <p>This very website! Add effects used on my site to yours!</p>
            </div>
        </a>
        <a href="/project/fedi/collabmarkov">
            <div class="project" style="background-image: url(/project/fedi/collabmarkov/collabmarkov.png);">
                <h3>Collaborative Markov Bot</h3>
                <p>A silly fediverse Markov bot</p>
            </div>
        </a>
        <a href="/project/fedi/keysmash">
            <div class="project" style="background-image: url(/project/fedi/keysmash/keysmash.png);">
                <h3>Fedi Keysmash Bot</h3>
                <p>Fedi keysmash detector and quoter</p>
            </div>
        </a>
        <a href="/project/astolfoiscomingforyou">
            <div class="project" style="background-image: url(/project/astolfoiscomingforyou/safe_1.png);">
                <h3>Astolfo is coming for you</h3>
                <p>Astolfo comes for you, with friendly and unfriendly variants.</p>
            </div>
        </a>
        <a href="/project/astolfomod">
            <div class="project" style="background-image: url(/project/astolfomod/biome.png);">
                <h3>Astolfo Mod</h3>
                <p>A Minecraft mod that adds many non-binary, transgender and femboy characters to the game.</p>
            </div>
        </a>
        <a href="/project/sodiboost">
            <div class="project" style="background-image: url(/project/sodiboost/sodiboost.png);">
                <h3>Sodiboost</h3>
                <p>A silly little mod about Sodiboo on fedi.</p>
            </div>
        </a>
        <a href="/project/catgirlnonsense">
            <div class="project" style="background-image: url(/project/catgirlnonsense/main.png);">
                <h3>Catgirl Nonsense</h3>
                <p>Catgirl nonsense generator.</p>
            </div>
        </a>
        <a href="/project/uwurandom-rs">
            <div class="project" style="background-image: url(/project/uwurandom-rs/main.png);">
                <h3>uwurandom-rs</h3>
                <p>Catgirl nonsense, but in the Rust programming langauge, for maximum femininity.</p>
            </div>
        </a>
        <a href="/project/birthday">
            <div class="project" style="background-image: url(/project/birthday/main.png);">
                <h3>Birthday</h3>
                <p>Forces you to wish birthday to anyone in your circle so you never forget.</p>
            </div>
        </a>
        <a href="/project/pawsense">
            <div class="project" style="background-image: url(/project/pawsense/img1.png);">
                <h3>PawSense</h3>
                <p>A joke program that shows a cat-like behaviour detected dialog.</p>
            </div>
        </a>
    </div>
    <br />

    <h2>Archived Projects</h2>
    <p>A list of projects that are deprecated, archived or deleted. Downloads are available for certain projects.</p>
    <div class="projectContainer">
        <a href="/project/racing-game">
            <div class="project" style="background-image: url(/project/racing-game/img.webp);">
                <h3>Racing Game</h3>
                <p>An old game from 2017 about racing. Made without coding knowledge.</p>
            </div>
        </a>
        <a href="/project/soobscrib">
            <div class="project" style="background-image: url(/project/soobscrib/soobscrib.webp);">
                <h3>Soobscrib</h3>
                <p>A game where you have to subscribe to win.</p>
            </div>
        </a>
        <a href="/project/akabot/stoat.php">
            <div class="project">
                <h3>Akabot for Revolt/Stoat</h3>
                <p>Akabot attempt to port to Revolt/Stoat. Cancelled.</p>
            </div>
        </a>
        <a href="/project/akabot/fluxer.php">
            <div class="project">
                <h3>Akabot for Fluxer</h3>
                <p>More complete port of Akabot to Fluxer. Cancelled.</p>
            </div>
        </a>
        <a href="/project/ugs">
            <div class="project">
                <h3>Urban Grocery Store</h3>
                <p>Unturned RP server shop</p>
            </div>
        </a>
        <a href="/project/tda">
            <div class="project">
                <h3>Tour de App projects</h3>
                <p>Projects written inside the Tour de App Czech programmer competition</p>
            </div>
        </a>
        <a href="/project/fedi/meow" style="background-image: url(/project/fedi/meow/fedimeow.png);">
            <div class="project">
                <h3>Fedi meow</h3>
                <p>A bot that would meow every hour on fedi</p>
            </div>
        </a>
        <a href="/project/fedi/streaks" style="background-image: url(/project/fedi/streaks/fedistreaks.png);">
            <div class="project">
                <h3>Fedi Streaks</h3>
                <p>Akabot-like streaks for daily posting</p>
            </div>
        </a>
        <a href="/project/fedi/summarizer" style="background-image: url(/project/fedi/summarizer/fedisummarizer.png);">
            <div class="project">
                <h3>Fedi Summarizer</h3>
                <p>Akabot-like summaries every night</p>
            </div>
        </a>
    </div>

    <h2>Lost Projects</h2>
    <p>A list of projects that I know of or have documentation of, but are otherwise lost.</p>
    <div class="projectContainer">

        <a href="/project/trash-looter.php">
            <div class="project">
                <h3>Trash Looter</h3>
                <p>A small game made for teamseas. Lost media as of now.</p>
            </div>
        </a>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>
