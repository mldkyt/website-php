<html>

<head>
    <?php require "../../../components/global.php"; ?>
    <?php seo("Background", "Luna's background script for her website."); ?>
</head>

<body>
    <?php require "../../../components/header.php"; ?>

    <h1>The background stars effect</h1>
    <a href="/project/website">&lt; Go back to full list</a>

    <h2>How do I add this effect?</h2>
    <ol start="1">
        <li>
            To begin adding the background stars effect to your website, you need to add a script to your page. <a href="/scripts/background.js">Right click this link and save it in your project to start.</a>
        </li>
        <li>
            You'll need to modify your code to be according to mine for it to work. Here's an example of how a page should look like:
            <br />
            <code>
                &lt;body&gt; <br /> &lt;canvas id="background"&gt;&lt;/canvas&gt; <br /> &lt;div id="abovebackground" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"&gt; <br /> &lt;!-- Your page
                content goes here! --&gt; <br /> &lt;/div&gt; <br /> &lt;script is:inline defer src="/scripts/background.js"&gt;&lt;/script&gt; <br /> &lt;/body&gt;
            </code>
        </li>
        <li>Make sure that the script tag at the bottom of the example is pointing to the correct location of the script. If you have it in a different folder, make sure to change the path to the script.</li>
        <li>Add my button to your website and make sure to give proper credit to my work!</li>
    </ol>

    <br />

    <h2>How do I add your button?</h2>
    <p>You can add the button from right below here:</p>
    <img src="/button.gif" alt="Button" />
    <p>
        Make sure to wrap it with an <code>&lt;a&gt;</code> tag to make it a link and set the <code>href</code> to
        <code>mldchan.dev</code>
    </p>

    <a href="/discord">
        <button>Discuss my website (Discord)</button>
    </a>
    <?php require "../../../components/footer.php"; ?>

</body>

</html>
