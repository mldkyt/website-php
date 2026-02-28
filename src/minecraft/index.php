<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Minecraft Server", "lain's community Minecraft server!"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>
    
    <h1>lain&apos;s Minecraft Server</h1>

    <p>This is the official lain&apos;s community server. It is mostly an SMP currently, but in the future we plan to host events :3</p>

    <details>
        <summary>Rules</summary>

        <p>The rules are very simple. <strong>Rules:</strong></p>
        <ul>
            <li>have common sense</li>
            <li>do not grief</li>
            <li>do not cheat</li>
        </ul>
    </details>

    <details>
        <summary>Image Gallery</summary>

        <img
            src={spawn.src}
            alt="Screenshot of a Minecraft building kind of hanging off a cliff. The entire floor is made of glass surrounded by oak logs. There's a main part, 5x5 with just fences around it. To it is another part connected which is slightly smaller and has a roof."
        />
    </details>

    <details>
        <summary>Server Commands & Info</summary>

        <h2>Changing your skin</h2>
        <p>
            Since the MC server allows offline accounts to log in, skins don't work the same way they used to. To set a skin, please use the following command: <code>/skin set &lt;username&gt;</code>. Replace the username with
            the username of a player who has the desired skin.
        </p>
        
        <h2>Homes</h2>
        <p>
            You can set both normal and named homes, by using the <code>/sethome</code> and <code>/sethome &lt;name&gt;</code> commands. To teleport around, you can use <code>/home home</code> to teleport to your primary home, <code
                >/home bed</code
            > to teleport to your bed or <code>/home &lt;name&gt;</code> to teleport to a named home.
        </p>

        <h2>Warps</h2>
        <p>List warps using <code>/warps</code>. You can use a warp by typing <code>/warp &lt;name&gt;</code>. To set a warp, please contact an admin. Unlike homes, warps are public, and require an admin to set them.</p>

        <h2>Locking your stuff</h2>
        <p>If you want to lock your stuff to prevent other players from e.g. stealing your stuff, you can use the classic <code>/lock</code> command. Once you run it, click on the item you want to lock to lock it.</p>
        <p>Additional commands exist:</p>
        <ul>
            <li><code>/cpublic</code> - Publicly lock something (anyone can access it)</li>
            <li><code>/cdonation</code> - Create a donation chest</li>
            <li><code>/csupply</code> - Create a supply chest</li>
            <li><code>/cpassword</code> - Create a password-protected lock</li>
            <li><code>/cinfo</code> - Get information about a locked item</li>
            <li><code>/cmodify</code> - Modify a locked item</li>
            <li><code>/unlock</code> - Remove a lock from your item</li>
        </ul>

        <h2>Random warp</h2>
        <p>Simply type <code>/rtp</code> to teleport somewhere randomly.</p>

        <h2>Other useful commands</h2>
        <ul>
            <li><strong>Admin Contact</strong> - the <code>/contact</code> command is there to contact admins. Aliases are <code>/social</code>, <code>/socials</code>, <code>/matrix</code>, <code>/xmpp</code></li>
            <li><strong>Discord Server</strong> - a <code>/discord</code> command is there to get an invite.</li>
            <li><strong>Meow</strong> - the <code>/meow</code> command will meow</li>
        </ul>

        <h2>Getting your builds listed as images on this website</h2>
        <p>
            If you want to show the world your Minecraft build, contact the owner. There's <a href="/contact">a contact page</a> on this website you can use to reach out to her. She will take pictures of your build and list them in
            the images section of this website.
        </p>
    </details>

    <br />

    <h2>How do I join?</h2>

    <?php if (isset($_POST["title"]) && (strtolower($_POST["title"]) == "minecraft" || strtolower($_POST["title"]) == "lain's minecraft server" || strtolower($_POST["title"]) == "lains minecraft server")) : ?>
        <p>The server IP is <code>lunya.pet</code>, any version between 1.7.2 and 1.21.11 will work. <strong>Minecraft account is not required!</strong></p>
    <?php else : ?>

        <?php if (isset($_POST["title"])) : ?>
        <div class="error">
            That was not the page title, please enter the page title to show the Minecraft IP
        </div>
        <?php endif; ?>

        <p>In order to see the Minecraft server IP, please enter the page title below</p>

        <form action="/minecraft/" method="post">
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <br>
            <button type="submit">View Minecraft server IP</button>
        </form>

    <?php endif; ?>

    <p>The server is protected with a register+login system. In the case you forget your password, please reach out to the admins to get it reset.</p>

    <p>Have fun :3</p>

    <?php require '../../components/footer.php'; ?>
</body>

</html>