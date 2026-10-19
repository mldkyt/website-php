<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Services", "Check out my list of self-hosted services, including Forgejo and Akkoma! :3"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>List of services</h1>

    <p>I run services either for myself, shared with friends or even publicly! Here's a non-exhaustive list:</p>

    <ul>
        <li><a href="https://a.mldkyt.com/">Umami</a>: Privacy friendly analytics. Deployed across my services</li>
        <li><a href="https://b.mldkyt.com/">Glitchtip</a>: Catching errors in production with alerts</li>
        <li><a href="https://c.mldkyt.com/">Cryptpad</a>: Personal drive, task list, forms, etc.</li>
        <li><a href="https://g.mldkyt.com/">Grafana</a>: Primarily used for iocaine analytics</li>
        <li><a href="https://h.mldkyt.com/">HomeAssistant</a></li>
        <li><a href="https://soc.mldkyt.com/@mldkyt">Mastodon</a>: The fediverse</li>
        <li><a href="https://git.mldkyt.com/">Forgejo</a>: Code forge</li>
        <li><a href="https://status.mldkyt.com/">Status page</a></li>
        <li><a href="https://akabot.mldkyt.com/">Akabot website</a></li>
        <li><a href="https://photos.mldkyt.com/">Immich</a>: Storage of photos and videos, search, albums, sharing pictures</li>
        <li><a href="https://mail.mldkyt.com/">Stalwart</a>: E-mail</li>
        <li><a href="https://m.mldkyt.com/">Tuwunel</a>: Matrix chatting platform</li>
        <li><a href="https://mc.mldkyt.com/">Minecraft</a>: Minecraft website, server, map etc.</li>
        <li><a href="https://ntfy.mldkyt.com/">ntfy</a>: Notifications</li>
        <li><a href="https://v.mldkyt.com/">Vaultwarden</a>: Password vault, syncing between devices</li>
        <li><a href="https://xmpp.mldkyt.com/">Prosody</a>: XMPP chatting server</li>
    </ul>

    <p>Additional services that don't have a website (e.g. bots):</p>

    <ul>
        <li>Akabot</li>
        <li>Akabot beta</li>
        <li>Akabot for Fluxer</li>
        <li>mldmon: A Discord bot for user commands and management of <a href="https://discord.mldkyt.com">mldkyt's Discord server</a></li>
        <li>Collaborative Markov Bot: <a href="https://soc.mldkyt.com/@collabmarkov">Fedi</a></li>
        <li>Keysmash Bot: <a href="https://soc.mldkyt.com/@collabmarkov">Fedi</a></li>
        <li>Meowbot: <a href="https://soc.mldkyt.com/@meowbot">Fedi</a></li>
        <li>Wafbot: <a href="https://soc.mldkyt.com/@wafbot">Fedi</a></li>
        <li>Yuribot: <a href="https://soc.mldkyt.com/@YuriBot">Fedi</a></li>
        <li>Yaoibot: <a href="https://soc.mldkyt.com/@YaoiBot">Fedi</a></li>
    </ul>

    <p>Even if the services count is a lot, this all doesn't take any more than 16 gigabytes of RAM on the main server. And most of it is hosted for me.</p>

    <p>If you just wanna know which services are interactable by the public, you have the website, Akabot (the Discord bot part), Minecraft and that's about it (if I don't count registering on these services). If you wanna count registration, then you can count in Forgejo.</p>

    <h2>Hardware</h2>

    <p>The services are split into 3 devices, a VPS, a Raspberry Pi and a dedicated server. You may be wondering why, and it has to do with my internet bandwidth. I am working with 50mbps, so I have decided to place a VPS in front of everything for caching and handling all AI requests.</p>

    <p>VPS: Cheapest VPS from OVH they offer. It costs around 80 dollars per year and it can handle caddy fine. In addition to caddy, it also runs the mail server, and the status website. 8GB RAM.</p>
    <p>Home server: Almost everything runs here, apart from Discord bots. R9 5900XT, 32 GB of RAM. I was able to afford these specs right before the prices went downhill.</p>
    <p>RPi: The RPi runs everything that should NOT go over a VPN connection, which are the Discord bots: Akabot, Akabot for Fluxer, Akabot development and mldmon. RPi 5, 8GB RAM model, with a 250GB NVME.</p>

    <?php require "footer.php"; ?>
</body>

</html>
