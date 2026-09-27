

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Urban Grocery Store", "A frontend for ordering things in an RP store on an Unturned server"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Urban Grocery Store</h1>

    <p>The Urban Grocery Store project was a temporary frontend for ordering and reserving things for an Unturned RP server. Players could order items and me and my friend could prepare them on the server.</p>

    <p>The project also used to have a different name it went under, and that is "Urban Alcohol Store" as the store in-game had some progress to it.</p>

    <p>Items are hardcoded to the software, and there's no checking for what is ordered. This was never exploited during the runtime though. The store could also be remotely closed by using Vercel's edge configuration (and the whole store was hosted on Vercel)</p>

    <p>When stuff was ordered, it would be sent to a Discord webhook. There was no database hooked up to this project, and the only exploit possible here would probably be wasting runtime hours.</p>

    <p>The last commit to the project was made on May 28, 2023. The store was closed down as I got banned for advertising another server in the shop server, and the server went through an update that broke everything.</p>

    <p>
        <a href="https://git.mldkyt.com/mldkyt/urban-grocery-store">
            <button>Repository</button>
        </a>
    </p>

    <?php require "footer.php"; ?>
</body>

</html>
