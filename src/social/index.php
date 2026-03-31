<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Lunya's socials", "All of Lunya's social and chat platforms"); ?>

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

        .socialContainer {
            display: grid;
            grid-template-columns: 1fr;
        }
    </style>
</head>

<body>
    <?php require '../../components/header.php'; ?>

    <h1>Lunya's socials</h1>
    <h2>The Community</h2>
    <p>You can join Lunya's community using this Discord link:</p>
    <div class="socialContainer">
        <a href="/discord">
            <div class="social" style="background-image: url(discord.png)">
                <h3>Discord Server</h3>
            </div>
        </a>
        <a href="https://forums.lunya.pet">
            <div class="social" style="background-image: url(forums.png)">
                <h3>Forums</h3>
            </div>
        </a>
    </div>
    <h2>Social Networks</h2>
    <div class="socialContainer">
        <a href="https://sk.lunya.pet/@lunya">
            <div class="social" style="background-image: url(sharkey.png)">
                <h3>The Fediverse (@lunya@sk.lunya.pet)</h3>
            </div>
        </a>
        <a href="https://pt.lunya.pet/c/lunyavids">
            <div class="social" style="background-image: url(peertube.jpg)">
                <h3>Federated videos (@lunyavids@pt.lunya.pet)</h3>
            </div>
        </a>
        <a href="https://www.youtube.com/channel/UC7JMha1kjOS7gsJXwNtosNw">
            <div class="social" style="background-image: url(youtube.png)">
                <h3>YouTube (@LunyaUwU)</h3>
            </div>
        </a>
        <a href="https://git.the-wired.club/lunya">
            <div class="social" style="background-image: url(forgejo.png)">
                <h3>Forgejo (Lunya on git.the-wired.club)</h3>
            </div>
        </a>
        <a href="https://www.twitch.tv/catgirl_ceo">
            <div class="social" style="background-image: url(twitch.png)">
                <h3>Twitch (@catgirl_ceo)</h3>
            </div>
        </a>
        <a href="https://www.nexusmods.com/profile/gothcatgrl">
            <div class="social" style="background-image: url(nexusmods.jpg)">
                <h3>NexusMods (@gothcatgrl)</h3>
            </div>
        </a>
    </div>

    <p>Also check out my <a href="/discord">Discord server</a> and <a href="https://forums.lunya.pet" target="_blank">forums</a>.</p>

    <h2>Other accounts</h2>

    <p>A brief list of accounts:</p>

    <ul>
        <li><a href="https://github.com/c4tgrl">GitHub (Unused)</a></li>
        <li><a href="https://gitlab.com/catgrl">GitLab.com (catgrl)</a></li>
        <li><a href="https://git.gay/catgirl">git.gay (catgirl)</a></li>
        <li><a href="https://codeberg.org/c4tgirl">Codeberg (c4tgirl)</a></li>
        <li><a href="https://namemc.com/profile/gothcatgrl.1">NameMC (gothcatgrl)</a></li>
        <li><a href="https://e-z.bio/lunya">E-Z bio (lunya)</a></li>
    </ul>

    <?php require '../../components/footer.php'; ?>
</body>

</html>
