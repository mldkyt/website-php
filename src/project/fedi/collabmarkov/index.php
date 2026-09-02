<?php require "util.php"; ?>
<?php require "comments.php"; ?>
<?php require "likes.php"; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php require "global.php"; ?>
        <?php seo("Collaborative Markov Bot", "A fedi bot that posts markov generated posts based on what followers post"); ?>
    </head>

    <body>
        <?php require "header.php"; ?>

        <h1>Collaborative Markov Bot</h1>
        <p>
            the fediverse markov bot is a bot for the fediverse that makes posts based on a bunch of fedi posts in its corpus. sometimes it posts something extremely cool and sometimes it posts
            something that warrants a fediblock.
        </p>
        <p>
            the bot works very simply. anyone can consent to it using your posts, by default public and without cw, by following the bot. additional consent can be given to by asking for help (the bot
            will dm anyone who follows it), and you can consent to unlisted posts, and to posts with a cw. if the bot is unfollowed, all data about you gets wiped from the bot's database, except the
            two settings mentioned above.
        </p>
        <p>
            it saves these posts into a database, and once per 14 days tries to check historical posts if anything has federated to my instance. this is done so it doesn't take a solid 8 minutes of
            spamming my instance to get all posts. these posts can also be filtered for keywords, and hashtags in the case you want to reject any posts from going into the database.
        </p>
        <p>
            when it comes to posting time, which is every hour, the bot will take the whole database, and generate a post out of it. then it posts on the fediverse. in addition to posting, if
            configured, the bot will remove user mentions, and hashtags from any post, or intentionally break them.<br type="_moz" />
        </p>

        <p>
            <a href="https://soc.mldkyt.com/@collabmarkov">
                <button>Follow the bot</button>
            </a>
        </p>


        <?php project_likes("collabmarkov"); ?>
        <?php project_comments("collabmarkov"); ?>
        <?php require "footer.php"; ?>
    </body>
</html>
