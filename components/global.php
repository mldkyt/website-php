<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<style>
    * {
        font-family: "JetBrains Mono", monospace;
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
    }

    /* Header */
    header {
        max-width: 800px;
        margin: 0 auto;
        color: #fff;
    }

    header nav {
        width: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%,rgba(21, 21, 21, 1) 28.000000000000004%,rgba(72, 72, 72, 1) 56.00000000000001%,rgba(29, 29, 29, 1) 76%,rgba(0, 0, 0, 1) 100%);
        /*padding: 5px 15px;*/
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline;
        padding: 5px 10px;
    }

    nav li:hover {
        color: #6C53A6;
        background: linear-gradient(to bottom, rgba(16, 16, 16, 1) 0%,rgba(72, 72, 72, 1) 56.00000000000001%,rgba(29, 29, 29, 1) 83%,rgba(0, 0, 0, 1) 100%);
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
        color: #6C53A6;
        cursor: pointer;
        font-size: larger;
        font-weight: bold;
    }

    /* Links */

    a {
        color: #6C53A6;
    }

    a:hover {
        color: #61479e;
    }

    a:active {
        color: #4b3187;
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
        color: #331f61;
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

<script src="/scripts/jquery.js"></script>
<script src="/scripts/seedrandom.js"></script>
<script defer src="https://a.mldkyt.com/script.js" data-website-id="43bc27a1-8bfc-45a2-baf2-dbb4b4c9ef02"></script>
<script defer src="https://a.mldkyt.com/recorder.js" data-website-id="43bc27a1-8bfc-45a2-baf2-dbb4b4c9ef02"></script>

<?php function seo($title, $description)
{
    ?>
    <meta charset="UTF-8" />
    <title><?= $title ?> | mldkyt's website</title>
    <meta name="description" content="<?= $description ?>" />
    <meta name="author" content="mldkyt" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-language" content="en" />
    <meta property="og:title" content="<?= $title ?> | mldkyt's website" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://mldkyt.com" />
    <meta property="og:site_name" content="mldkyt's website" />
    <meta property="og:locale" content="en_US" />
    <meta name="twitter:title" content="<?= $title ?> | mldkyt's website" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="fediverse:creator" content="mldkyt@soc.mldkyt.com" />
<?php
} ?>
