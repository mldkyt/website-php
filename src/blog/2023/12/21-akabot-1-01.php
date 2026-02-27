<!doctype html>
<html lang="en">
    <head>
        <?php require '../../../../components/global.php'; ?>
        <?php seo("Akabot 1.01", "Akabot was updated to 1.01"); ?>
    </head>
    <body>
        <?php require '../../../../components/header.php'; ?>

                <h1>Akabot 1.01</h1>
                <p>Akabot small update version 1.01 is out! This bug fix fixes a few critical things in the code of Akabot.</p>
                <p>It also brings two new features into Akabot - Chat Revive and Level up rewards.</p>
                <p>Chat Revive is a feature which pings a channel when it's inactive for a while, reviving the chat. It won't ping twice if there's still no activity.</p>
                <p>Level-up rewards are simple: If a user has hit a new level and doesn't have a reward role, it will be added to the member.</p>
        <?php require '../../../../components/footer.php'; ?>
    </body>
</html>