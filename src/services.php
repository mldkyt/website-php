
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo(
        "Services",
        "Check out my list of self-hosted services, including Forgejo and Akkoma! :3",
    ); ?>
</head>

<body>
    <?php require "../components/header.php"; ?>

    <h1>Self-hosted services</h1>

    <p>Here's what I run. Some are my projects, some are FOSS software hosted for myself (and friends).</p>

    <h2>Nekona: Discord Bot</h2>
    <p>I maintain and run my own Discord bot. More on that is available <a href="/project/nekona/">in its project page</a>.</p>
    <p>There are 2 versions of Nekona that are run on my server. One is the public version and the other is a more private "friends only" version.</p>

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

    <p>I host a few bots on this account. All posts are unlisted and the accounts can be followed from any instance</p>

    <?php require "../components/footer.php"; ?>
</body>

</html>
