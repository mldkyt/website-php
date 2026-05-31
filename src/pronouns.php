<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "../components/global.php"; ?>
    <?php seo("Pronouns", "Luna's Pronouns"); ?>

    <style>
        .hellyeah {
            color: lightgreen;
            font-weight: bolder;
        }

        .ok {
            color: green;
        }

        .neutral {
            color: gray;
        }

        .no {
            color: darkred;
        }

        .descriptions {
            display: flex;
            gap: 1em;
        }

        table{
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require "../components/header.php"; ?>
    <h1>Luna's Pronouns Page</h1>
    <p><small>hell yeah</small></p>

    <p>This is a page for my pronouns and other things. </p>

    <p class="descriptions">
        <span class="hellyeah">Hell Yeah</span>
        <span class="ok">ok</span>
        <span class="neutral">Neutral</span>
        <span class="no">No</span>
    </p>

    <?php if (!isset($_GET["profanity"]) || $_GET["profanity"] !== "1"): ?>
    <a href="?profanity=1">
        <button>Show slurs</button>
    </a>
    <?php endif; ?>

    <br>
    <br>

    <hr>

    <br>

    <table>
        <thead>
            <tr>
                <th>Names</th>
                <th>Pronouns</th>
                <th>Gender Descriptors</th>
                <th>Honorifics</th>
            </tr>
        </thead>

        <?php
        $names = [
            ["class" => "hellyeah", "name" => "Luna"],
            ["class" => "hellyeah", "name" => "lunya"],
            ["class" => "ok", "name" => "mldchan"],
            ["class" => "no", "name" => "mldkyt"],
            ["class" => "no", "name" => "mldchan"],
            ["class" => "no", "name" => "[Deadname]"],
        ];
        $pronouns = [
            ["class" => "hellyeah", "pronoun" => "she/her"],
            ["class" => "neutral", "pronoun" => "they/them"],
            ["class" => "neutral", "pronoun" => "it/its"],
            ["class" => "no", "pronoun" => "he/him"],
        ];
        $terms = [
            ["class" => "hellyeah", "term" => "girl"],
            ["class" => "hellyeah", "term" => "catgirl"],
            ["class" => "hellyeah", "term" => "girlfailure"],
            ["class" => "hellyeah", "term" => "kitty"],
            ["class" => "hellyeah", "term" => "sis"],
            ["class" => "hellyeah", "term" => "big sis"],
            ["class" => "hellyeah", "term" => "big sister"],
            ["class" => "hellyeah", "term" => "girlie"],
            ["class" => "hellyeah", "term" => "queen"],
        ];
        $gender = [
            ["class" => "hellyeah", "descriptor" => "woman"],
            ["class" => "hellyeah", "descriptor" => "girl"],
            ["class" => "hellyeah", "descriptor" => "transfem"],
            ["class" => "ok", "descriptor" => "enby"],
            ["class" => "ok", "descriptor" => "person"],
            ["class" => "no", "descriptor" => "man"],
            ["class" => "no", "descriptor" => "boy"],
            ["class" => "no", "descriptor" => "transmasc"],
        ];
        $honorifics = [
            ["class" => "hellyeah", "honorific" => "Ms."],
            ["class" => "hellyeah", "honorific" => "Mrs."],
            ["class" => "hellyeah", "honorific" => "Ma'am"],
            ["class" => "hellyeah", "honorific" => "Madam"],
            ["class" => "ok", "honorific" => "Mx."],
            ["class" => "no", "honorific" => "Mr."],
        ];
        $compliments = [
            ["class" => "hellyeah", "compliment" => "adorable"],
            ["class" => "hellyeah", "compliment" => "cute"],
            ["class" => "hellyeah", "compliment" => "pretty"],
            ["class" => "hellyeah", "compliment" => "pretty kitty"],
            ["class" => "hellyeah", "compliment" => "cutie"],
            ["class" => "hellyeah", "compliment" => "hot"],
            ["class" => "hellyeah", "compliment" => "hottie"],
            ["class" => "no", "compliment" => "handsome"],
        ];
        $relationshipTerms = [
            ["class" => "hellyeah", "term" => "friend"],
            ["class" => "hellyeah", "term" => "girlfriend"],
            ["class" => "hellyeah", "term" => "wife"],
            ["class" => "ok", "term" => "enbyfriend"],
            ["class" => "no", "term" => "boyfriend"],
        ];

        if (isset($_GET["profanity"]) && $_GET["profanity"] === "1") {
            $terms[] = ["class" => "hellyeah", "term" => "dyke"];
            $terms[] = ["class" => "hellyeah", "term" => "tranny"];
            $terms[] = ["class" => "hellyeah", "term" => "faggot"];
        }

        foreach (
            [
                ["class" => "no", "term" => "boy"],
                ["class" => "no", "term" => "son"],
                ["class" => "no", "term" => "brother"],
                ["class" => "no", "term" => "catboy"],
                ["class" => "no", "term" => "boyfailure"],
                ["class" => "no", "term" => "puppy"],
                ["class" => "no", "term" => "prince"],
                ["class" => "no", "term" => "king"],
                ["class" => "no", "term" => "bro"],
            ]
            as $term
        ) {
            $terms[] = $term;
        }
        ?>
        <tbody>
            <?php for (
                $i = 0;
                $i <
                max(
                    sizeof($names),
                    sizeof($pronouns),
                    sizeof($gender),
                    sizeof($honorifics),
                );
                $i++
            ): ?>
                <tr>
                    <td class="<?= $names[$i]["class"] ?>"><?= $names[$i][
    "name"
] ?></td>
                    <td class="<?= $pronouns[$i]["class"] ?>"><?= $pronouns[$i][
    "pronoun"
] ?></td>
                    <td class="<?= $gender[$i]["class"] ?>"><?= $gender[$i][
    "descriptor"
] ?></td>
                    <td class="<?= $honorifics[$i]["class"] ?>"><?= $honorifics[
    $i
]["honorific"] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Terms</th>
                <th>Compliments &gt;w&lt;</th>
                <th>Relationship Terms</th>
            </tr>
        </thead>
        <tbody>
            <?php for (
                $i = 0;
                $i <
                max(
                    sizeof($terms),
                    sizeof($compliments),
                    sizeof($relationshipTerms),
                );
                $i++
            ): ?>
                <tr>
                    <td class="<?= $terms[$i]["class"] ?>"><?= $terms[$i][
    "term"
] ?></td>
                    <td class="<?= $compliments[$i][
                        "class"
                    ] ?>"><?= $compliments[$i]["compliment"] ?></td>
                    <td class="<?= $relationshipTerms[$i][
                        "class"
                    ] ?>"><?= $relationshipTerms[$i]["term"] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <br>

    <?php require "../components/footer.php"; ?>
</body>

</html>
