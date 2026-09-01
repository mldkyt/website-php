<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Services", "Check out my list of self-hosted services, including Forgejo and Akkoma! :3"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Self-hosted services</h1>

    <p>Here's what I run. Some are my projects, some are FOSS software hosted for myself (and friends).</p>

    <h2>Akabot: Discord Bot</h2>
    <p>I maintain and run my own Discord bot. More on that is available <a href="/project/akabot">in its project page</a>.</p>
    <p>There are 2 versions of Akabot that are run on my server. One is the public version and the other is a more private "friends only" version.</p>

    <h2>Forgejo: Git server</h2>
    <p>Here's where all my code (usually tested in production) is stored.</p>
    <ul>
        <li>
            <a href="https://git.mldchan.dev/luna" target="_blank">My account on my Forgejo instance</a>
        </li>
    </ul>

    <h2>Akkoma: The fediverse</h2>
    <p>Akkoma is basically the cooler Pleroma. It is a social network that connects with the fediverse, a decentralized network similarly to how e-mail works.</p>
    <ul>
        <li>
            <a href="https://fedi.mldchan.dev/users/luna" target="_blank">View my profile on Akkoma</a>
        </li>
    </ul>

    <p><a href="https://akkoma.fediverse.observer/list">Find yourself an Akkoma instance</a></p>

    <h2>Fedi Bots: A bunch of various fedi bots</h2>
    <p>I run a few fedi bots on my server, some being really popular. Here's what is running:</p>
    <ul>
        <li><a href="https://fedi.mldchan.dev/users/collabmarkov">Collabmarkov</a>: Collaborative Markov Bot - This bot takes the posts of all followers and generates markov posts from those posts combined.</li>
        <li><a href="https://fedi.mldchan.dev/users/meowbot">Meowbot</a>: A bot that simply meows. Cat version of wafbot</li>
        <li><a href="https://fedi.mldchan.dev/users/wafbot">Wafbot</a>: A bot that simply wafs. Fox version of meowbot</li>
    </ul>
    <p>These bots have no websites. The user profiles above are the "websites" essentially but you'll likely access them through your instance anyway.</p>

    <h2>Uptime-Kuma: Service status tracking</h2>
    <p>Uptime-Kuma tracks the status of services and sends me notifications to know when a service isn't working. </p>
    <ul>
        <li>
            <a href="https://status.mldchan.dev">View service status</a>
        </li>
    </ul>

    <?php require "footer.php"; ?>
</body>

</html>
