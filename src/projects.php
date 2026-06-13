

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
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
            font-size: medium;
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
            height: 70px;
        }

        .error {
            background: rgb(94, 3, 3);
            margin-top: 20px;
            padding: 10px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .project a {
            color: white;
            text-decoration: none;
        }

        .projectContainer {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        @media screen and (max-width: 650px) {
            .projectContainer {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php require "../components/header.php"; ?>

    <h1>Luna's projects</h1>
    <p>This is a list of Luna's projects.</p>
    <div class="projectContainer">
        <a href="/project/nekona">
            <div class="project" style="background-image: url(/project/nekona/nekona.jpg);">
                <h3>Nekona</h3>
                <p>A fully featured general purpose discord bot with over 30 features.</p>
            </div>
        </a>
        <a href="/project/website">
            <div class="project" style="background-image: url(/project/website/homepage.png);">
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
            <div class="project" style="background-image: url(/project/fedi/keysmash/keysmash.jpg);">
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
        <a href="/project/mcfuck">
            <div class="project" style="background-image: url(/project/mcfuck/main.png);">
                <h3>MCFuck</h3>
                <p>An application to mess up your Minecraft settings.</p>
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
        <a href="/project/cutiequiz">
            <div class="project" style="background-image: url(/project/cutiequiz/3.png);">
                <h3>Cutie Quiz</h3>
                <p>Cutie Quiz is a quiz app whic determines how cute you are. Archived and shut down on Oct 31st.</p>
            </div>
        </a>
        <a href="/project/neko/chat" style="background-image: url(/project/neko/chat.png);">
            <div class="project">
                <h3>NekoChat</h3>
                <p>embeddable chat for any nekoweb website</p>
            </div>
        </a>
        <a href="/project/fedi/meow">
            <div class="project" style="background-image: url(/project/fedi/meow/fedimeow.png);">
                <h3>Fedi Meow</h3>
                <p>This is a bot that meows every hour on fedi.</p>
            </div>
        </a>
        <a href="/project/fedi/summarizer">
            <div class="project" style="background-image: url(/project/fedi/summarizer/fedisummarizer.png);">
                <h3>Fedi Summarizer</h3>
                <p>This bot summarizes the amount of notes you post every midnight.</p>
            </div>
        </a>
        <a href="/project/fedi/streaks">
            <div class="project" style="background-image: url(/project/fedi/streaks/fedistreaks.png);">
                <h3>Fedi Streaks</h3>
                <p>This bot counts consecutive days of you posting on fedi.</p>
            </div>
        </a>
        <a href="/project/racing-game">
            <div class="project" style="background-image: url(/project/racing-game/img.webp);">
                <h3>Racing Game</h3>
                <p>An old game from 2017 about racing. Made without code!</p>
            </div>
        </a>
        <a href="/project/soobscrib">
            <div class="project" style="background-image: url(/project/soobscrib/soobscrib.webp);">
                <h3>Soobscrib</h3>
                <p>A game where you have to subscribe to win.</p>
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

    <?php require "../components/footer.php"; ?>
</body>

</html>
