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
    <p>Copyright (C) <?= date("Y"); ?> mldchan</p>
    <div id="footerLinks">
        <p><a href="https://discord.gg/aE2MXH5Qp6">Discord</a></p>
        <p id="views"></p>
    </div>
    <p>
        <input type="checkbox" name="enablecursor" id="enablecursor" />
        <label for="enablecursor">Enable Cursor Effects <i>(thank you <a href="https://bee.nekoweb.org">bee</a> for allowing
                me to steal this)</i></label>
    </p>

    <div>
        <input type="checkbox" name="enablebackground" id="enablebackground" />
        <label for="enablebackground">Enable Background Effect</label>
    </div>
    <div id="christmas">
        <input type="checkbox" name="enablechristmas" id="enableChristmas" />
        <label for="enableChristmas">Enable Christmas Effects (Available during Christmas)</label>
    </div>
    <script type="text/javascript" defer>
        if (!localStorage.getItem("stars")) {
            localStorage.setItem("stars", "disable");
        }

        if (localStorage.getItem("stars") === "enable") {
            $("#enablebackground").prop("checked", true);
        } else {
            $("#enablebackground").prop("checked", false);
        }

        if (!localStorage.getItem("christmasTheme")) localStorage.setItem("christmasTheme", "enable");
        if (localStorage.getItem("christmasTheme") === "enable") {
            $("#enableChristmas").prop("checked", true);
        }

        $("#enablebackground").change(function() {
            if (this.checked) {
                console.log("Set enable");
                localStorage.setItem("stars", "enable");
            } else {
                console.log("Set disable");
                localStorage.setItem("stars", "disable");
            }

            document.location.reload();
        });

        $("#enableChristmas").change(function() {
            if (this.checked) {
                localStorage.setItem("christmasTheme", "enable");
            } else {
                localStorage.setItem("christmasTheme", "disable");
            }

            location.reload();
        });

        $.post("/api/views", function(data) {
            $("#views").text(`${data.views} views`);
        });
    </script>
</footer>

</main>
<script src="/scripts/background.js"></script>
</div>
