</div>
<div class="socials">
    <strong style="margin: 8px;">Socials</strong><br>
    <ul>
        <?php
        $res = pg_query($conn, "SELECT \"name\", \"url\" from socials ORDER BY position, id");
        while ($row = pg_fetch_assoc($res)): ?>
        <li>
            <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]) ?></a>
        </li>
        <?php endwhile;
        ?>
    </ul>
    <strong style="margin: 8px;">Contacts</strong><br>
    <ul>
        <li>
            <a href="/anonymous-message">Send me an anonymous message</a>
        </li>
        <?php
        $res = pg_query($conn, "SELECT \"name\", \"url\" from contacts ORDER BY position, id");
        while ($row = pg_fetch_assoc($res)): ?>
        <li>
            <?php if (strlen($row["url"]) > 0): ?>
            <a href="<?= htmlspecialchars($row["url"]) ?>"><?= htmlspecialchars($row["name"]) ?></a>
            <?php else: ?>
            <span><?= htmlspecialchars($row["name"]) ?></span>
            <?php endif; ?>
        </li>
        <?php endwhile;
        ?>
    </ul>

    <img src="/button.gif" alt="88x31 button for mldkyt">
    <?php
    $host = getenv("DB_POSTGRES_HOST");
    $user = getenv("DB_POSTGRES_USER");
    $pass = getenv("DB_POSTGRES_PASSWORD");
    $name = getenv("DB_POSTGRES_NAME");
    $port = getenv("DB_POSTGRES_PORT") ?: "5432";

    $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
    $res = pg_query("SELECT filename, alt, url FROM buttons");

    while ($row = pg_fetch_assoc($res)) {
        if (isset($row["url"])) { ?>
            <a href="<?= $row["url"] ?>">
                <img src="/buttons/<?= $row["filename"] ?>" alt="<?= $row["alt"] ?>" style="width: 88px; height: 31px;">
            </a>
        <?php } else { ?>
            <img src="/buttons/<?= $row["filename"] ?>" alt="<?= $row["alt"] ?>">
        <?php }
    }
    ?>
</div>
</div>

<br>
<footer>
    <style>
        #footerLinks {
            display: flex;
            flex-direction: row;
        }

        #footerLinks p {
            margin-right: 1em;
        }
    </style>
    <p>Copyright (C) <?= date("Y") ?> mldkyt</p>
    <div id="footerLinks">
        <p><a href="https://discord.gg/aE2MXH5Qp6">Discord</a></p>
        <p id="views"></p>
    </div>
    <script type="text/javascript" defer>
        $.post("/api/views", function(data) {
            $("#views").text(`${data.views} views`);
        });
    </script>
</footer>
</main>
<script src="/scripts/background.js"></script>
</div>
