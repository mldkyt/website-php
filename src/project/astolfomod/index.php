<?php
require "../../../components/util.php";
require "../../../components/comments.php";
require "../../../components/likes.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../components/global.php"; ?>
        <?php seo("Astolfo Mod", "The Astolfo Forge Mod for Minecraft"); ?>

        <style>
            .message {
                background: rgb(82, 15, 15);
                border: 2px solid red;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <?php require "../../../components/header.php"; ?>
        <h1>Astolfo Mod</h1>

        <div class="message">
            <strong>UPDATE: </strong>
            <span>The mod is now available on Modrinth for download! If you prefer that site for downloading, <a href="https://modrinth.com/mod/astolfo-mod" target="_blank">click here</a>.</span>
        </div>

        <h2>What does this mod add?</h2>

        <h3>Mobs</h3>

        <ul>
            <li><b>Astolfo in 3 outfits</b> - Astolfo Schoolgirl, Astolfo Armour, and Astolfo in Casual outfit</li>
            <li><b>Felix Argyle</b></li>
            <li><b>Hideri Kanzaki</b></li>
            <li><b>Venti</b></li>
            <li><b>Rimuru</b></li>
            <li><b>Nagisa Shiota</b></li>
            <li><b>Sieg</b> (Fate/Apocrypha)</li>
            <li><b>Bridget</b> <i>(I know she's a transgender girl but I included her because why not)</i></li>
        </ul>

        <h2>Commands</h2>

        <ul>
            <li>
                <code>/duplicatecuties &lt;amount&gt; &lt;range&gt;</code> - Duplicate all of the added mobs within the range amount times. The mod doesn't have any limits in the 2 parameters, so entering big numbers might cause your
                game to crash!
            </li>
            <li>
                <code>/despawn &lt;selector&gt;</code> - This command is simple and allows you to "kill" monsters without the animation. This prevents the particles from death spawning and lagging your game if you have too many mobs from
                this mod spawned.
            </li>
            <li>
                <code>/cuterain &lt;iterations&gt; &lt;range&gt; &lt;height&gt;</code> - This command makes the mobs above rain from the sky. It runs how many times iterations is, spawning mobs in the range provided, spawning them in
                the specified height. Every iteration spawns 1 of each mob above, excluding creative mobs.
            </li>
        </ul>

        <h2>Creative items and mobs</h2>

        <ul>
            <li><b>Astolfo Attractor</b> - The text "gay" in the menu, attracts only variants of Astolfo.</li>
            <li><b>Astolfo Repellent</b> - A Felix Argyle entity which repels all Astolfos from its location.</li>
            <li><b>Monster White</b> - No crafting recipe yet, gives you speed and jump boost and gives you trans rights 🏳️‍⚧️❤️</li>
        </ul>

        <h2>Video about the mod</h2>

        <p>I've also made a video about the mod on my YouTube channel, so if you want to watch that, you can do so:</p>

        <div id="video">
            <button onclick="showVideo()">Show YouTube video describing the mod (This will share some data with YouTube) </button>
        </div>

        <h2>Supporting this mod</h2>

        <h3>1. Suggestions</h3>

        <p>
            The simplest you can do for now is to <b>create an idea suggestion</b> for the mod using a <a href="https://git.mldchan.dev/luna/AstolfoForge/issues">GitHub issue</a>.
        </p>

        <h3>2. Reporting bugs</h3>

        <p>
            If you find any bug in the mod, <b>you can report it</b> using <a href="https://git.mldchan.dev/luna/AstolfoForge/issues">GitHub issues</a> for it to be fixed. It will be fixed once I get some free time.
        </p>

        <h3>3. Financial support</h3>

        <p><b>You can currently support me on <a href="https://ko-fi.com/c4tgirl">Ko-fi</a> right now.</b> This is currently the only way I accept donations; within a week I'll set up GitHub Sponsors as well.</p>

        <details>
            <summary>Gallery</summary>
            <img src="crowd.png" alt="Astolfo Crowd in Minecraft" />
            <img src="biome.png" alt="Astolfo Biome in Minecraft" />
            <img src="casual.png" alt="Casual Astolfo in Minecraft" />
            <img src="armor.png" alt="Armored Astolfo in Minecraft" />
            <img src="schoolgirl.png" alt="School girl outfit Astolfo in Minecraft" />
            <img src="astolfoflower.png" alt="Astolfo Flower in Minecraft" />
        </details>

        <details>
            <summary>Changelog</summary>
            <h3>v1.2</h3>
            <ul>
                <li>Added Hideri</li>
                <li>Added Bridget</li>
                <li>Added Venti</li>
                <li>Added /cuterain</li>
                <li>Added /despawn</li>
                <li>Added /duplicatecuties</li>
                <li>Removed /duplicateastolfos</li>
                <li>Added Rimuru</li>
                <li>Added Nagisa</li>
                <li>Added Sieg</li>
            </ul>
            <h3>v1.1</h3>
            <ul>
                <li>Added Astolfo Sword</li>
                <li>Added Astolfo Biome</li>
                <li>Added Felix Agryle</li>
            </ul>
            <h3>v1.0</h3>
            <ul>
                <li>First release</li>
            </ul>
        </details>

        <h2>Download</h2>

        <div>
            <a href="https://modrinth.com/mod/astolfo-mod">
                <button>View Modrinth page!</button>
            </a>
            <a href="https://git.mldchan.dev/luna/AstolfoForge/releases/latest">
                <button>Download the latest <strong>Forge 1.20.1</strong> release from GitHub</button>
            </a>
            <a href="/discord">
                <button>Discuss the project (Discord)</button>
            </a>
        </div>

        <?php project_likes("astolfomod"); ?>
        <?php project_comments("astolfomod"); ?>

        <?php require "../../../components/footer.php"; ?>
        <script type="text/javascript">
            function showVideo() {
                $("#video").html(
                    '<iframe width="800" height="450" src="https://www.youtube-nocookie.com/embed/bBvrp8puvdw?si=1KTa9xR-AzxIyX_2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'
                );
            }
        </script>
    </body>
</html>
