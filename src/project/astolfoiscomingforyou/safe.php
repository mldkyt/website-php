<?php
require "../../../components/util.php";
require "../../../components/comments.php";
require "../../../components/likes.php";
?>

<!doctype html>
<html lang="en">
    <head>
    <?php require "../../../components/global.php"; ?>
    <?php seo(
        "Astolfo is coming for you safe variant",
        "The safe variant of Astolfo is coming for you",
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
            <a href="/project/astolfoiscomingforyou/safe" class="tab selectedTab">Safe variant</a>
            <a href="/project/astolfoiscomingforyou/evil" class="tab">Evil variant</a>
        </div>

        <br />

        <div id="safeVariant">
            <button id="showSafeVariant">Show safe variant YouTube video (Shares some data with YouTube) </button>
        </div>

        <br />

        <img src="safe_1.png" alt="Window of Astolfo coming for you, with a countdown of kilometers" />
        <br />
        <img src="safe_2.png" alt="Astolfo gives you lots of compliments" />
        <br />

        <div>
            <a href="https://git.lunya.pet/lunya/AstolfoIsComingForYou/releases">
                <button>Download the safe variant</button>
            </a>
            <a href="https://forums.lunya.pet/viewforum.php?f=6">
                <button>Discuss the project (Forums)</button>
            </a>
            <a href="/discord">
                <button>Discuss the project (Discord)</button>
            </a>
        </div>

        <?php project_likes("astolfoiscomingforyou"); ?>
        <?php project_comments("astolfoiscomingforyou"); ?>

        <?php require "../../../components/footer.php"; ?>
        <script type="text/javascript">
            $("#showSafeVariant").click(function () {
                $("#safeVariant").html(
                    `<iframe width="780" height="439" src="https://www.youtube-nocookie.com/embed/HkuCNFGXMNU?si=lDmf3C1Cf65gE5bL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`
                );
            });
        </script>

    </body>
</html>
