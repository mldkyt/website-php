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
    <div>
        <input type="checkbox" name="enablebackground" id="enablebackground" />
        <label for="enablebackground">Enable Background Effect</label>
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

        $.post("/api/views", function(data) {
            $("#views").text(`${data.views} views`);
        });
    </script>
</footer>

</main>
<script src="/scripts/background.js"></script>
</div>
