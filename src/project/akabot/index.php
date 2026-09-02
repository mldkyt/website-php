<?php
require "util.php";
require "comments.php";
require "likes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Akabot", "A fully featured general purpose discord bot with over 30 features"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1 id="akabot">The Akabot Discord Bot</h1>
    <p>
        the akabot discord bot is a free and open source discord bot, fully modular, with over 30+ features. it is a direct response to the increasing bots that require payment for basic features.
        in the case that the main instance's somehow limited, the option of self hosting is possible. the bot is lightweight and easy to run on anything that supports python.
    </p>
    <p>as for the features, here's a list with short descriptions for each feature:</p>
    <ul>
        <li><strong>anti raid</strong>: configurable minimum age of account, and profile picture check for member joins</li>
        <li>
            <strong>automod actions</strong>: configurable additional actions to perform when an automod action rule gets triggered within discord, including kicking a member, timing them out for
            some time, or banning them outright
        </li>
        <li><strong>chat revive</strong>: keep your discord server active by pinging a role whenever there's extended inactivity on your discord server</li>
        <li><strong>chat streaks</strong>:&nbsp;keep your discord server active by having members maintain a chat streak, which counts up by 1 every day, and gets reset when they miss a day</li>
        <li><strong>chat summary</strong>: configurable leaderboard of chat members after every day, month and year</li>
        <li><strong>counting</strong>: counting channels with number detection, and advanced/cursed methods of counting</li>
        <li><strong></strong><strong>economy</strong>: members can maintain money in banks and wallets, work to get more money, rob other players, gamble, pay each other</li>
        <li>
            <strong>rp commands</strong>: post lurk, shrug, wave, poke, smile, wink, blush, smug, tickle, yeet, highfive, wag, bite, cuddle, kick, carry, hug, bonk, pat, kiss, slap, lap pillow,
            handhold gifs, fully configurable and respecting consent of members
        </li>
        <li><strong>yaoi and yuri commands</strong>: because those are important</li>
        <li><strong>giveaways</strong>: with re-rolls and multiple winner support</li>
        <li><strong>leveling</strong>: fully configurable leveling with rewards, and configurable multipliers</li>
        <li><strong>logs</strong>: with multiple channel support, configurable log types</li>
        <li><strong>mail</strong>: no-annoyance way for delivery of important messages or announcements</li>
        <li><strong>markov chain</strong>: fun module that attempts to generate mixups of chat messages once every while</li>
        <li><strong>meow back</strong>: configurable meow, waf, bark, :3, owo, uwu, awawa back at members</li>
        <li><strong>message counting</strong>: leaderboard of most active members in a discord server</li>
        <li><strong>moderation commands</strong>: configurable moderation role and a way to /kick, /ban, /timeout members without appropriate permissions but with the moderation role</li>
        <li><strong>periodic messages</strong>: send a message once every amount of days, hours, months or years in a channel</li>
        <li><strong>reaction roles</strong>: normal reaction roles, add only, remove only, and single choice reaction roles</li>
        <li><strong>roles on join</strong>: auto assign roles chosen by admins to new members</li>
        <li><strong>saves</strong>: personal message bookmarks for members</li>
        <li><strong>suggestions</strong>: create a suggestion channel with voting in your server, and optionally with comments</li>
        <li><strong>tags</strong>: keyword-based messages</li>
        <li><strong>temporary voice channels</strong>: public and private temporary voice channels, fully configurable</li>
        <li>
            <strong>top.gg integration</strong>: bonuses for voting, submitting of slash commands and server count to top.gg listing. 2x leveling bonus for 12 hours per vote. optional, by default
            it's disabled unless configured
        </li>
        <li><strong>vc notifications</strong>: members can subscribe to per-member, per-channel or all vc notifications in a server</li>
        <li><strong>voting</strong>: voting credits that users get for voting for the bot, which can be used to reset the chat streak if missed</li>
        <li><strong>web</strong>: the bot is fully configurable from a web ui, currently no theme yet</li>
        <li>
            <strong>welcome and goodbye</strong>: welcome members who join your server and say goodbye to those who leave, fully configurable message content, and join grace periods (delay sending
            the welcome message by a few seconds from the join, and delete the welcome message if the member leaves too quickly)
        </li>
    </ul>
    <p>as you can see, the bot has many features, and the list keeps expanding as i get new ideas or suggestions.</p>

    <p>
        <a href="https://discord.gg/applications/1172922944033411243">
            <button>Verified on Discord discover page!!!</button>
        </a>
        <a href="https://top.gg/bot/1172922944033411243">
            <button>top.gg</button>
        </a>
        <a href="https://discordbots.net/bot/3591-akabot">
            <button>discordbots.net</button>
        </a>
        <a href="https://discordlist.gg/bot/1172922944033411243">
            <button>discordlist.gg</button>
        </a>
        <a href="/discord">
            <button>Join the support Discord server</button>
        </a>
    </p>

    <br />
    <br />


    <?php project_likes("akabot"); ?>
    <?php project_comments("akabot"); ?>

    <?php require "footer.php"; ?>
</body>

</html>
