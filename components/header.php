
<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">

<div style="width: 100%; height: 16px; background: #7272f7; background: linear-gradient(90deg,rgba(97, 152, 255, 1) 0%, rgba(84, 84, 255, 1) 65%, rgba(0, 0, 255, 1) 100%);"></div>

<header id="header">
    <style>
        #headerImage {
            height: 140px;
            background-position: center;
            background-size: cover;
        }

        #headerImage>div {
            height: 140px;
        }

        #headerImage h2 {
            font-size: 2em;
            position: relative;
            left: 25px;
            top: 25px;
            text-shadow: 2px 2px 2px #000;
        }

        #headerImage p {
            position: relative;
            left: 25px;
            top: 20px;
            text-shadow: 2px 2px 2px #000;
        }

        .prideflags {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .prideflag {
            height: 15px;
            width: 100vw;
        }

        .buttons {
            display: flex;
            margin-left: 25px;
            gap: 5px;
        }

        .buttons img {
            height: 32px;
        }

        .error {
            background-image: linear-gradient(to bottom, rgb(136, 0, 0) 20%, rgb(78, 0, 0) 50%, rgb(150, 1, 1) 100%);
            color: white;
            border: 2px solid red;
            padding: 10px;
        }

        main > div {
            display: flex;
            flex-direction: row;
        }

        .socials {
            min-width: 250px;
            max-width: 250px;
        }
    </style>
    <?php
    $month = date("n");
    if ($month == 6): ?>
    <div id="headerprideflag">
        <div class="prideflags">
            <div class="prideflag" style="background-color: red;"></div>
            <div class="prideflag" style="background-color: orange;"></div>
            <div class="prideflag" style="background-color: yellow;"></div>
            <div class="prideflag" style="background-color: green;"></div>
            <div class="prideflag" style="background-color: blue;"></div>
            <div class="prideflag" style="background-color: purple;"></div>
        </div>
        <div class="prideflags">
            <div class="prideflag" style="background-color: cyan;"></div>
            <div class="prideflag" style="background-color: pink;"></div>
            <div class="prideflag" style="background-color: white; display: flex; justify-content: center;">
                <span style="color: black; font-size: 10px;">HAPPY PRIDE MONTH!</span>
            </div>
            <div class="prideflag" style="background-color: pink;"></div>
            <div class="prideflag" style="background-color: cyan;"></div>
        </div>
        <div class="prideflags">
            <div class="prideflag" style="background-color: #FF2890;"></div>
            <div class="prideflag" style="background-color: #FFD908;"></div>
            <div class="prideflag" style="background-color: #28B3FF;"></div>
        </div>
    </div>
    <?php endif;
    ?>
    <img src="/static/banner.jpg" alt="mldkyt written on a black background, white border and a bunch of stars drawn in the background. Under mldkyt is written programmer, youtuber.">
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/guestbook.php">Guestbook</a></li>
            <li><a href="https://mc.mldkyt.com">Minecraft</a></li>
            <li><a href="https://donate.mldkyt.com">Donate</a></li>
        </ul>
    </nav>
    <div class="error" id="tenminutes" style="display: none;">
        <script type="text/javascript">
            let alertVisible = false;

            function hide10Minutes() {
                $("#tenminutes").hide();
                alertVisible = false;
            }

            setTimeout(
                function() {
                    if (!alertVisible) {
                        $("#tenminutes").show();
                        alertVisible = true;
                    }
                },
                60 * 1000 * 10
            ); // 10 minutes
        </script>
        <p id="tenminutespassed">You have spent 10 minutes looking at this page. Shouldn't you be working? :3</p>
        <button onclick="hide10Minutes()">Hide</button>
    </div>
    <?php
    require "kv.php";

    $host = getenv("DB_POSTGRES_HOST");
    $user = getenv("DB_POSTGRES_USER");
    $pass = getenv("DB_POSTGRES_PASSWORD");
    $name = getenv("DB_POSTGRES_NAME");
    $port = getenv("DB_POSTGRES_PORT") ?: "5432";

    $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

    $message = db_key_get($conn, "announcement_message");

    if (strlen($message) > 0): ?>
    <div class="error">
        <p><?= $message ?></p>
    </div>

    <?php endif;
    ?>
</header>

<canvas id="background"></canvas>
<main>
    <div>
    <div class="main">
