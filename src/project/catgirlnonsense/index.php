<?php
require "../../../components/comments.php";

function uwu_nonsense($length)
{
    $out = [];
    for ($x = 0; $x <= $length / 2; $x++) {
        $rand = mt_rand(0, sizeof($GLOBALS["nonsense"]) - 1);
        $out[] = $GLOBALS["nonsense"][$rand];
    }
    return str_replace(" ", "", implode(" ", $out));
}

function uwu_nya($length)
{
    return "ny" . str_repeat("a", $length);
}

function uwu_blush($length)
{
    return ">" . str_repeat("/", $length) . "<";
}

function uwu_action($rand)
{
    if ($rand == 12) {
        $rand = 11;
    }
    return $GLOBALS["actions"][$rand];
}

function uwu_keysmash($length)
{
    $out = [];
    for ($x = 0; $x <= $length; $x++) {
        $randomAsciiValue = rand(65, 90); // ASCII values for uppercase letters A-Z
        $randomLetter = chr($randomAsciiValue);
        $out[] = strtolower($randomLetter);
    }
    return str_replace(" ", "", implode(" ", $out));
}

function uwu_scrunkly($length)
{
    return "aw " . uwu_keysmash($length - 3);
}

function generate($maxlen, $softlimit = false)
{
    $uwu = isset($_POST["uwu"]);
    $owo = isset($_POST["owo"]);
    $nya = isset($_POST["nya"]);
    $blush = isset($_POST["blush"]);
    $three = isset($_POST["3"]);
    $actions = isset($_POST["actions"]);
    $keysmashing = isset($_POST["keysmashing"]);
    $screaming = isset($_POST["screaming"]);
    $scrunkly = isset($_POST["scrunkly"]);
    $nonsense = isset($_POST["nonsense"]);
    $ara = isset($_POST["ara"]);

    $GLOBALS["actions"] = [
        "*tilts head*",
        "*twitches ears slightly*",
        "*purrs*",
        "*falls asleep*",
        "*sits on ur keyboard*",
        "*nuzzles*",
        "*stares at u*",
        "*points towards case of monster zero ultra*",
        "*sneezes*",
        "*plays with yarn*",
        "*eats all ur doritos*",
        "*lies down on a random surface*",
    ];

    $GLOBALS["nonsense"] = [
        "aa",
        "am",
        "an",
        "ao",
        "eo",
        "ew",
        "me",
        "mr",
        "ny",
        "ow",
        "pp",
        "pu",
        "ra",
        "re",
        "rm",
        "rn",
        "ro",
        "rp",
        "rw",
        "ur",
        "wm",
        "wn",
        "wp",
        "wr",
        "ww",
        "ya",
    ];

    // How many characters so far
    $currentlen = 0;

    // Output string
    $out = [];

    // Last selection
    $last = -1;

    while (true) {
        $random = mt_rand(0, 11);

        // Don't repeat the same thing twice
        if ($last == $random) {
            continue;
        }

        if ($random == 0) {
            if (!$uwu) {
                continue;
            }

            $str = "uwu";
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 1) {
            if (!$nonsense) {
                continue;
            }

            // nonsense
            $str = uwu_nonsense(mt_rand(5, 25));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 2) {
            if (!$nya) {
                continue;
            }

            // nyaaa~
            $str = uwu_nya(mt_rand(3, 6));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 3) {
            if (!$blush) {
                continue;
            }

            // >///<
            $str = uwu_blush(mt_rand(3, 5));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 4) {
            if (!$three) {
                continue;
            }

            // :3
            $str = ":3";
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 5) {
            if (!$actions) {
                continue;
            }

            // Actions
            $str = uwu_action(mt_rand(0, sizeof($GLOBALS["actions"])));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 6) {
            if (!$keysmashing) {
                continue;
            }

            // Keysmash;
            $str = uwu_keysmash(mt_rand(5, 25));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 7) {
            if (!$screaming) {
                continue;
            }

            // screaming
            $str = str_repeat("A", mt_rand(3, 5));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 8) {
            if (!$scrunkly) {
                continue;
            }

            // aww the scrunkly
            $str = uwu_scrunkly(mt_rand(5, 25));
            $out[] = $str;
            $currentlen += strlen($str);
        } elseif ($random == 9) {
            if (!$owo) {
                continue;
            }

            // owo
            $out[] = "owo";
            $currentlen += strlen("owo");
        } elseif ($random == 10) {
            if (!$ara) {
                continue;
            }

            //ara ara
            $out[] = "ara ara~";
            $currentlen += strlen("ara ara~");
        }
        if ($currentlen >= $maxlen) {
            break;
        }
        $last = $random;
    }

    if ($softlimit == false) {
        return substr(implode(" ", $out), 0, $maxlen);
    } else {
        return implode(" ", $out);
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require "../../../components/global.php"; ?>
        <?php seo("Catgirl Nonsense", "Catgirl nonsense generator"); ?>
    </head>

    <body>
        <?php require "../../../components/header.php"; ?>

        <h1>CatGirl nonsense generator</h1>
        <form id="catgirlForm" style="margin-left: 1em;" method="post" action="/project/catgirlnonsense/">
            <label for="amount">Amount:</label>
            <input id="amount" name="amount" type="number" min="1" value="<?= isset(
                $_POST["amount"],
            )
                ? $_POST["amount"]
                : "100" ?>" />
            <br />
            <label for="uwu">uwu~</label>
            <input id="uwu" name="uwu" type="checkbox" checked />
            <br />
            <label for="owo">owo~</label>
            <input id="owo" name="owo" type="checkbox" checked />
            <br />
            <label for="nya">nya~</label>
            <input id="nya" name="nya" type="checkbox" checked />
            <br />
            <label for="blush">&gt;//////&lt;</label>
            <input id="blush" name="blush" type="checkbox" checked />
            <br />
            <label for="3">:3</label>
            <input id="3" name="3" type="checkbox" checked />
            <br />
            <label for="actions">Actions</label>
            <input id="actions" name="actions" type="checkbox" checked />
            <br />
            <label for="keysmashing">Keysmashing</label>
            <input id="keysmashing" name="keysmashing" type="checkbox" checked />
            <br />
            <label for="screaming">Screaming</label>
            <input id="screaming" name="screaming" type="checkbox" checked />
            <br />
            <label for="scrunkly">Aww the scrunkly</label>
            <input id="scrunkly" name="scrunkly" type="checkbox" checked />
            <br />
            <label for="nonsense">Random nonsense</label>
            <input id="nonsense" name="nonsense" type="checkbox" checked />
            <br />
            <label for="ara">ara ara~</label>
            <input id="ara" name="ara" type="checkbox" checked />
            <br />
            <button type="submit">Generate</button>
        </form>
        <div id="generatedOutput">
        <?php
        $uwu = isset($_POST["uwu"]);
        $owo = isset($_POST["owo"]);
        $nya = isset($_POST["nya"]);
        $blush = isset($_POST["blush"]);
        $three = isset($_POST["3"]);
        $actions = isset($_POST["actions"]);
        $keysmashing = isset($_POST["keysmashing"]);
        $screaming = isset($_POST["screaming"]);
        $scrunkly = isset($_POST["scrunkly"]);
        $nonsense = isset($_POST["nonsense"]);
        $ara = isset($_POST["ara"]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                $uwu ||
                $owo ||
                $nya ||
                $blush ||
                $three ||
                $actions ||
                $keysmashing ||
                $screaming ||
                $scrunkly ||
                $nonsense ||
                $ara
            ) {
                $amount = isset($_POST["amount"]) ? $_POST["amount"] : 100;
                echo generate($amount, softlimit: true);
            } else {
                echo "Invalid parameters, please check at least one checkbox";
            }
        }
        ?>
        </div>

        <br>

        <a href="https://forums.lunya.pet/viewforum.php?f=9">
            <button>Discuss the project (Forums)</button>
        </a>
        <a href="/discord">
            <button>Discuss the project (Discord)</button>
        </a>


        <?php project_comments("catgirlnonsense"); ?>

        <?php require "../../../components/footer.php"; ?>

    </body>
</html>
