<?php
require "../../../components/comments.php"; ?>

<!doctype html>
<html lang="en">
    <head>
    <?php require "../../../components/global.php"; ?>
    <?php seo(
        "Astolfo is coming for you evil variant",
        "The evil variant of Astolfo is coming for you",
    ); ?>
    <style>
        .tabs {
            display: flex;
            border: 1px solid gray;
        }

        .tab {
            padding: 2px 8px;
            color: inherit;
            text-decoration: none;
            border: 1px solid gray;
        }

        .selectedTab {
            border: 2px solid white;
        }
    </style>
    </head>

    <body>
        <?php require "../../../components/header.php"; ?>

        <h1>Astolfo is coming for you</h1>

        <div class="tabs">
            <a href="/project/astolfoiscomingforyou/safe" class="tab">Safe variant</a>
            <a href="/project/astolfoiscomingforyou/evil" class="tab selectedTab">Evil variant</a>
        </div>

        <br />

        <div id="unsafeVariant">
            <button id="showUnsafeVariant">Show unsafe variant YouTube video (Shares some data with YouTube) </button>
        </div>
        <br />
        <img src="evil_1.png" alt="Window of angry Astolfo coming for you, with a countdown of kilometers" />
        <br />
        <img src="evil_2.png" alt="Astolfo shuts down your machine in anger" />
        <br />
        <a href="https://git.the-wired.club/lunya/AstolfoIsComingForYou/releases">
            <button>Download the unsafe variant</button>
        </a>
        <a href="https://forums.lunya.pet/viewforum.php?f=6">
            <button>Discuss the project (Forums)</button>
        </a>
        <a href="/discord">
            <button>Discuss the project (Discord)</button>
        </a>

        <?php project_comments("astolfoiscomingforyou"); ?>

        <?php require "../../../components/footer.php"; ?>
        <script type="text/javascript">
            $("#showUnsafeVariant").click(function () {
                $("#unsafeVariant").html(
                    `<iframe width="780" height="439" src="https://www.youtube-nocookie.com/embed/ZtN1QqLx3ww?si=VaVwXDUo505gF9TS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`
                );
            });
        </script>
    </body>
</html>
