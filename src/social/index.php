

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../../components/global.php"; ?>
    <?php seo("Luna's socials", "All of Luna's social and chat platforms"); ?>

    <style>
        .social {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .social h3 {
            height: 100px;
            width: 100%;
            font-size: large;
            text-align: center;
            text-shadow: 1px 1px 1px #000;
            background: #333333aa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error {
            background: rgb(94, 3, 3);
            margin-top: 20px;
            padding: 10px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .social a {
            color: white;
            text-decoration: none;
        }

        .socCont {
            display: grid;
            grid-template-columns: 1fr;
        }
    </style>
</head>

<body>
    <?php require "../../components/header.php"; ?>

    <h1>Luna's socials</h1>
    <h2>The Community</h2>
    <p>You can join Luna's community using this Discord link:</p>
    <div class="socCont">
        <a href="/discord">
            <div class="social" style="background-image: url(discord.png)">
                <h3>Discord Server</h3>
            </div>
        </a>
    </div>
    <h2>Social Networks</h2>
    <div class="socCont">
        <a href="https://fedi.mldchan.dev/users/luna">
            <div class="social" style="background-image: url(sharkey.png)">
                <h3>The Fediverse (@luna@fedi.mldchan.dev)</h3>
            </div>
        </a>
        <a href="https://pt.mldchan.dev/c/lunyavids">
            <div class="social" style="background-image: url(peertube.jpg)">
                <h3>Federated videos (@lunyavids@pt.mldchan.dev)</h3>
            </div>
        </a>
        <a href="https://www.youtube.com/channel/UC7JMha1kjOS7gsJXwNtosNw">
            <div class="social" style="background-image: url(youtube.png)">
                <h3>YouTube (@catgirl_ceo)</h3>
            </div>
        </a>
        <a href="https://git.mldchan.dev/luna">
            <div class="social" style="background-image: url(forgejo.png)">
                <h3>Forgejo (Luna on git.mldchan.dev)</h3>
            </div>
        </a>
        <a href="https://www.twitch.tv/catgirl_ceo">
            <div class="social" style="background-image: url(twitch.png)">
                <h3>Twitch (@catgirl_ceo)</h3>
            </div>
        </a>
    </div>

    <p>Also check out my <a href="/discord">Discord server</a>.</p>

    <h2>Other accounts</h2>

    <p>A brief list of accounts:</p>

    <ul>
        <li><a href="https://github.com/c4tgrl">GitHub (c4tgrl; Unused)</a></li>
        <li><a href="https://gitlab.com/estradiol">GitLab.com (estradiol)</a></li>
        <li><a href="https://git.gay/catgirl">git.gay (catgirl)</a></li>
        <li><a href="https://codeberg.org/estradiol">Codeberg (estradiol)</a></li>
        <li><a href="https://namemc.com/profile/catgirl_ceo.1">NameMC (Catgirl_CEO)</a></li>
    </ul>

    <?php require "../../components/footer.php"; ?>
</body>

</html>
