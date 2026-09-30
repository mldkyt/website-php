<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<html>

<head>
    <?php require "global.php"; ?>
    <?php seo("Website", "mldkyt's website"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>mldkyt's website</h1>
    <p>On this page I (as part of a request) put some resources that you can use on your site. When using these resources, make sure to credit me and add my button!</p>

    <h2>Background stars effect</h2>
    <p>The background stars effect is a script that you can add into your website to add the stars effect from this website. The stars follow the mouse cursor, and increase count when moved quicker.</p>
    <a href="/project/website/background">
        <button>Add them to your website now!</button>
    </a>

    <h2>Cursor effects</h2>
    <p>The cursor effects is a library I originally found on the internet, so I'll link it on this website and provide a download link to it. I'll also provide some examples of the effects to copy and paste from here.</p>

    <a href="/project/website/cursoreffects">
        <button>Set up your own cursor effects now!</button>
    </a>

    <h2>Historical versions</h2>

    <p>This website revision isn't the latest, and the backend has changed a few times before landing here. Here's the rough history:</p>

    <h3>Prior versions</h3>

    <p>There were prior versions to the ones below available, but they are only on the web archive. One of them was developed using Bootstrap Studio, and hosted on GitHub pages.</p>

    <h3>2024-01-30</h3>

    <p>This is a website version I found on my hard drive. Unfortunately the <code>.git</code> folder was lost. This version is designed around Bootstrap and Next.js.</p>

    <p>Content-wise, it contains info about me, has projects, tools, my MSC meshsave, pronouns, and support for articles, redirects, a femboy list, tracking clicks of various buttons on the site.</p>

    <p>At some time in March 2024, I switched to using Nekoweb, and the Nekoweb website is a private repository, mainly because it contains many private things as part of the build process, and open sourcing it would mean revising a lot of git history.</p>

    <p>This version of the website was likely hosted on Vercel, and routed through Cloudflare for DDoS and bot protection.</p>

    <div>
        <a href="https://git.mldkyt.com/mldkyt/website-2024-01-30">
            <button>Website 2024-01-30 source</button>
        </a>
    </div>

    <h3>2025-07-15</h3>

    <p>This version of the site was created as part of new year 2025 and it was a whole redesign and reimagination of my website.</p>

    <p>Content wise the site contained main pages with projects, latest YouTube videos, languages I can code in and misc things I do. All projects were listed as part of this website as well. This website also had blogs and polls as well.</p>

    <p>This site was replaced with the Nekoweb website together with a Golang backend due to low available RAM on my server (Raspberry Pi).</p>

    <div>
        <a href="https://git.mldkyt.com/mldkyt/website-2025-07-15">
            <button>Website 2025-07-15 source</button>
        </a>
    </div>

    <h3>2026-02-28</h3>

    <p>This version of the website doesn't have any visual changes from the version(s) after it, and it is just a backend update. The Golang backend was replaced for PHP, and the website functions exactly the same way as before.</p>

    <div>
        <a href="https://git.mldkyt.com/mldkyt/website-2026-02-28">
            <button>Website 2026-02-28 source</button>
        </a>
    </div>

    <br />
    <br />

    <div>
        <a href="/discord">
            <button>Discuss the project (Discord)</button>
        </a>
    </div>

    <?php project_likes("website"); ?>
    <?php project_comments("website"); ?>

    <?php require "footer.php"; ?>

</body>

</html>
