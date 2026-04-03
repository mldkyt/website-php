<html>

<head>
    <?php require '../../../components/global.php'; ?>
    <?php seo("Cursor Effects", "Lunya's cursor effects on her website."); ?>
</head>

<body>
    <?php require '../../../components/header.php'; ?>

    <h1>The Cursor Effects</h1>
    <a href="/project/website">&lt; Go back to full list</a>

    <h2>How do I add cursor effects to my website?</h2>
    <ol start="1">
        <li>
            To add cursor effects to your website, <a href="https://github.com/tholman/cursor-effects?tab=readme-ov-file#how-to-use">follow this link</a>
        </li>
        <li>
            Append the script tag that's visible as the first thing in the head tag of your website. <br />
            <i>Optionally open it and save it in your project and host it on your own.</i>
        </li>
        <li>Create a script tag under this script tag to add your cursor effects. Look below for examples.</li>
        <li>
            Here's my configuration, which you can copy and paste and it will give you a non-binary cursor: <br />
            <code>
                cursoreffects.fairyDustCursor({ <br />
                    colors: ["#5BCEFA", "#F5A9B8", "#FFFFFF"] <br />
                }); <br />
                cursoreffects.rainbowCursor({ <br />
                    colors: ["lightblue", "pink", "white", "pink", "lightblue"], length: 50, size: 5 <br />
                }); <br />
            </code>
        </li>
        <li>Customize and create your own configuration by following the documentation</li>
        <li>If you like this guide and/or used my code, please add my button that's right below!</li>
    </ol>

    <br />

    <h2>Please credit me!</h2>
    <p>You can add the button from right below here:</p>
    <img src="/button.gif" alt="Button" />
    <p>
        Make sure to wrap it with an <code>&lt;a&gt;</code> tag to make it a link and set the <code>href</code> to
        <code>lunya.pet</code>
    </p>

    <a href="https://forums.lunya.pet/viewforum.php?f=4">
        <button>Discuss the project (Forums)</button>
    </a>
    <a href="/discord">
        <button>Discuss the project (Discord)</button>
    </a>
    <?php require '../../../components/footer.php'; ?>

</body>

</html>
