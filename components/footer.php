</div>
<div class="socials">
    <strong style="margin: 8px;">Socials</strong><br>
    <ul>
        <?php
        $res = pg_query($conn, "SELECT \"name\", \"url\" from socials");
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
        $res = pg_query($conn, "SELECT \"name\", \"url\" from contacts");
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
</div>
</div>

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
