

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
    <p>I maintain and run my own Discord bot. More on that is available <a href="/nekona">in its project page</a>.</p>
    <p>There are 2 versions of Nekona that are run on my server. One is the public version and the other is a more private "friends only" version.</p>

    <h2>Forgejo: Git server</h2>
    <p>Here's where all my code (usually tested in production) is stored.</p>
    <ul>
        <li>
            <a href="https://git.lunya.pet/lunya" target="_blank">My account on my Forgejo instance</a>
        </li>
    </ul>

    <h2>Sharkey: The Fediverse</h2>
    <p>Sharkey is a silly federated microblogging platform which spend most of my time on and post on very frequently.</p>
    <ul>
        <li>
            <a href="https://sk.lunya.pet/@lunya" target="_blank">View my profile on Sharkey</a>
        </li>
    </ul>

    <p>Wanna join Sharkey? <a href="https://sharkey.fediverse.observer" target="_blank">Find yourself a Sharkey instance</a>. You can sign up on any instance, and you'll still be able to follow me.</p>

    <p>There are a few bots hosted on my Sharkey instance. They are followable generally from the whole fediverse.</p>

    <h2>PHPBB: Forums</h2>
    <p>I run a forum as an alternative to Discord. Anyone can sign up and post.</p>
    <ul>
        <li><a href="https://forums.lunya.pet" target="_blank">Open my forums</a></li>
    </ul>

    <?php require "../components/footer.php"; ?>
</body>

</html>
