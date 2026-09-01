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
        <p>The Collaborative Markov Bot is a fedi bot that takes posts from every follower it gets and generates a markovified post from that.</p>
        <p>It is a bot that takes all posts from all followers and generates a markovified post from all of them. It has the following features:</p>

        <ul>
            <li>
                <strong>Settings</strong> - DMing the bot <code>help</code> sends you a list of commands. You can enable inclusion of CWd posts and inclusion of unlisted posts into the corpus.
            </li>
            <li>
                <strong>Filtering</strong> - Filtering can be configured, excluding posts containing specific keywords or hashtags.
            </li>
            <li>
                <strong>Breaking or Removing Mentions</strong> - The bot can be configured to either break (e.g. add a space after the <code>@</code> in the note) or remove mentions.
            </li>
        </ul>

        <p>Collaborative Markov Bot can be followed by anyone, in order for the bot to have the best quality!</p>

        <p>
            <i>Collaborative Markov Bot doesn&apos;t and will NEVER USE any post for any other use other than the bot&apos;s functionality.</i>
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
