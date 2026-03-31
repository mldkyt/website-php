<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "MS UI Gothic", nec_apc3, Verdana, sans-serif;
        image-rendering: -moz-crisp-edges;
        image-rendering: -webkit-crisp-edges;
        image-rendering: pixelated;
        image-rendering: crisp-edges;
    }

    :root {
        color-scheme: dark;
    }

    /* Override ul and li beforehand to get overriden again by header */

    ul {
        margin-bottom: 20px;
        list-style-type: disc;
    }

    li {
        color: #eee;
        margin-left: 1.2em;
        margin-top: 4px;
        margin-bottom: 4px;
    }

    /* Header */
    header {
        max-width: 800px;
        margin: 0 auto;
        color: #fff;
    }

    header nav {
        padding: 5px 15px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline;
        margin-right: 10px;
        margin-left: 0;
    }

    nav a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    /* Content */

    main {
        max-width: 800px;
        margin: 0 auto;
        background-color: black;
    }

    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0 4px;
    }

    p {
        color: #eee;
        margin: 0 6px;
        margin-bottom: 20px;
    }

    img {
        max-width: 100%;
    }

    details>summary {
        color: #f991df;
        cursor: pointer;
        font-size: larger;
        font-weight: bold;
    }

    /* Links */

    a {
        color: #f991df;
    }

    a:hover {
        color: #8482f7;
    }

    a:active {
        color: #4c4af1;
    }

    /* Footer */

    footer {
        max-width: 800px;
        margin: 0 auto;
        /* background: linear-gradient(to bottom, #222222 0%, #2c2c2c 30% 70%, #222222 100%); */
    }

    footer p {
        margin: 0;
    }

    /* Button styles */
    button {
        background-color: #c0c0c0;
        color: black;
        padding: 4px 20px;
        border: 2px solid gray;
        border-top: 3px solid lightgray;
    }

    button:hover {
        border: 3px solid rgb(53, 53, 53);
        border-top: 3px solid rgb(97, 97, 97);
    }

    button:active {
        border-bottom: 3px solid gray;
        border-right: 3px solid gray;
        border-left: 4px solid gray;
        border-top: 4px solid gray;
    }

    button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* code tags */
    code {
        color: rgb(231, 124, 245);
        font-family: monospace;
    }

    /* background */
    #background {
        position: fixed;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .error {
        border: 1px solid red;
        background-image: linear-gradient(to bottom, rgb(136, 0, 0) 20%, rgb(78, 0, 0) 50%, rgb(150, 1, 1) 100%);
        padding: 2px;
    }

    .success {
        border: 1px solid rgb(102, 255, 0);
        background-image: linear-gradient(to bottom, rgb(0, 136, 0) 20%, rgb(3, 78, 0) 50%, rgb(6, 150, 1) 100%);
        padding: 2px;
    }
</style>

<script src="/scripts/cursoreffects.js"></script>
<script src="/scripts/jquery.js"></script>
<script src="/scripts/pako.js"></script>
<script src="/scripts/purify.js"></script>
<script src="/scripts/seedrandom.js"></script>

<script defer>
    window.addEventListener("load", (event) => {
        if (localStorage.getItem("cursorSetting") == "disable") {
            return;
        }

    const date = new Date();

        if ((date.getMonth() === 11 || (date.getMonth() === 0 && date.getDay() < 15)) && localStorage.getItem("christmasTheme") !== "disable") {
            const colors = [
                "#00f",
                "#f00",
                "#0f0",
                "#ff0",
                "#f7f",
                "#0ff"
            ];

            let fairyDustElements = [];
            let rainbowElements = [];

            for(let i = 0; i < ~~(Math.random() * 10); i++) {
                fairyDustElements.push(colors[~~(Math.random() * colors.length)]);
            }

            for(let i = 0; i < ~~(Math.random() * 10); i++) {
                rainbowElements.push(colors[~~(Math.random() * colors.length)]);
            }

        cursoreffects.fairyDustCursor({
                colors: fairyDustElements
        });
        cursoreffects.rainbowCursor({
                colors: rainbowElements, length: ~~(Math.random() * 100), size: 5
        });
        }
        else {
            cursoreffects.fairyDustCursor({
                colors: ["#5BCEFA", "#F5A9B8", "#FFFFFF"]
            });
            cursoreffects.rainbowCursor({
                colors: ["lightblue", "pink", "white", "pink", "lightblue"], length: 50, size: 5
            });
        }

    });

    window.onload = function setUpEnableCursor() {
        // Footer toggle cursor switch
        /** @type {HTMLInputElement} */
        let enableCursor = document.getElementById("enablecursor");
        enableCursor.checked = localStorage.getItem("cursorSetting") != "disable";
        enableCursor.onchange = function toggleCursor() {
            if (enableCursor.checked) {
                if (localStorage.getItem("cursorSetting") != null) {
                    localStorage.removeItem("cursorSetting");
                }
            } else {
                localStorage.setItem("cursorSetting", "disable");
            }

            location.reload();
        };
    };
</script>

<?php function seo($title, $description) { ?>
    <meta charset="UTF-8" />
    <title><?= $title; ?> | Lunya's website</title>
    <meta name="description" content="<?= $description; ?>" />
    <meta name="author" content="Lunya" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-language" content="en" />
    <meta property="og:title" content="<?= $title; ?> | Lunya's website" />
    <meta property="og:description" content="<?= $description; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://lunya.pet" />
    <meta property="og:site_name" content="Lunya's website" />
    <meta property="og:locale" content="en_US" />
    <meta name="twitter:title" content="<?= $title; ?> | Lunya's website" />
    <meta name="twitter:description" content="<?= $description; ?>" />
    <meta name="fediverse:creator" content="lunya@sk.lunya.pet" />
<?php } ?>
