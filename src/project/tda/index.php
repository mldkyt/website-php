

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "global.php"; ?>
    <?php seo("Tour de App projects", "Archive of Tour de App 2023 and 2025 years of mine"); ?>
</head>

<body>
    <?php require "header.php"; ?>

    <h1>Tour de App projects</h1>

    <p>Tour de App is a Czech programming competition where teams of 3-5 people create applications based on what the assignment is. There are a few rounds, ranging from the longest ones, to the shortest ones which are about creating an app in ~8 hours.</p>

    <p>I had a few entries in this programming competition and here are the projects that came out of that:</p>

    <h2>2023 entry</h2>

    <p>The first entry is in 2023. The assignment for this was a programming tracking application. The first revision was in dotnet, before we switched to Next.js. The app could track programmers, how long they've coded for, and had full CSV exports and imports, a full backup system, and many other cool features.</p>

    <p>Unfortunately because the whole project is based on top of MongoDB, I cannot test it. The URL is hard-coded in the code, and the database behind the whole project is gone. If I had enough time, I would rewrite it in another database instead, like SQLite so that there was no reliance.</p>

    <h2>2025 entry</h2>

    <p>This entry is split into multiple projects. First there's the "syntax surge" project which is before grandfinale, and then there's the grandfinale project.</p>

    <p>The syntax surge project is an App for the nomination round of the Tour de App competition. It is built using NextJS and TailwindCSS, Prism for database, and SQLite for storage. It was a game of tic-tac-toe that used polling in order to synchronize changes between players. Both players would enter matchmaking and get matchmaked into a game. The score was then calculated using "ELO", a score calculation algorithm provided in the assignment, and implemented in the app. The normal mode required accounts, and people could win, lose, or draw. Depending on that, the score was calculated differently. Users can be banned or unbanned as well. The freeplay mode doesn't require accounts and doesn't calculate any scores, it is there just for fun.</p>

    <p>The grandfinale project is different. It is a voting app where a voting campaign gets created, and people can vote on a choice. It uses the same polling technique, and the whole project was implemented in 1 day, minus the setup on the day prior to that day.</p>

    <?php require "footer.php"; ?>
</body>

</html>
