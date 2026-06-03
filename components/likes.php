<?php

function project_likes(string $project)
{
    $ip = get_remote_addr();
    global $conn;
    if (!isset($conn)) {
        $host = getenv('DB_POSTGRES_HOST');
        $user = getenv('DB_POSTGRES_USER');
        $pass = getenv('DB_POSTGRES_PASSWORD');
        $name = getenv('DB_POSTGRES_NAME');
        $port = getenv('DB_POSTGRES_PORT') ?: '5432';

        $conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
    }

    if ($_GET["like"] === "1") {
        $res = pg_query_params($conn, "SELECT COUNT(id) AS projectLikeCheck FROM project_likes WHERE ip = $1 AND project = $2", [$ip, $project]);
        $row = pg_fetch_assoc($res);
        if ($row["projectLikeCheck"] == 0) {
            pg_query_params($conn, "INSERT INTO project_likes(ip, project) VALUES ($1, $2)", [$ip, $project]);
        }
    }

    $res = pg_query_params($conn, "SELECT COUNT(id) AS hasLikedHerOwnProject FROM project_likes WHERE project = $1 AND ip = $2", [$project, $ip]);
    $row = pg_fetch_assoc($res);
    $hasLikedHerOwnProject = $row["hasLikedHerOwnProject"];

    $res = pg_query_params($conn, "SELECT COUNT(id) AS projectCountOfLikes FROM project_likes WHERE project = $1", [$project]);
    $row = pg_fetch_assoc($res);
    $projectCountOfLikes = $row["projectCountOfLikes"];

    if ($hasLikedHerOwnProject != 0) {
        echo "<button>$projectCountOfLikes likes</button>";
    } else {
        echo "<a href=\"?like=1\"><button>$projectCountOfLikes likes</button></a>";
    }
}
