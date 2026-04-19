<?php

function project_likes(string $project)
{
    $ip = get_remote_addr();
    global $conn;
    if (!isset($conn)) {
        $conn = mysqli_connect(
            getenv("MARIADB_HOST"),
            getenv("MARIADB_USER"),
            getenv("MARIADB_PASSWORD"),
            getenv("MARIADB_DATABASE"),
        );
    }

    if ($_GET["like"] === "1") {
        $query = $conn->prepare(
            "SELECT COUNT(id) FROM project_likes WHERE ip = ? AND project = ?",
        );
        $query->bind_param("ss", $ip, $project);
        $query->execute();
        $query->bind_result($projectLikeCheck);
        $query->fetch();
        $query->close();

        if ($projectLikeCheck == 0) {
            $query = $conn->prepare(
                "INSERT INTO project_likes(ip, project) VALUES (?, ?)",
            );
            $query->bind_param("ss", $ip, $project);
            $query->execute();
            $query->close();
        }
    }

    $query = $conn->prepare(
        "SELECT COUNT(id) FROM project_likes WHERE project = ? AND ip = ?",
    );
    $query->bind_param("ss", $project, $ip);
    $query->execute();
    $query->bind_result($hasLikedHerOwnProject);
    $query->fetch();
    $query->close();

    $query = $conn->prepare(
        "SELECT COUNT(id) FROM project_likes WHERE project = ?",
    );
    $query->bind_param("s", $project);
    $query->execute();
    $query->bind_result($projectCountOfLikes);
    $query->fetch();
    $query->close();

    if ($hasLikedHerOwnProject != 0) {
        echo "<button>$projectCountOfLikes likes</button>";
    } else {
        echo "<a href=\"?like=1\"><button>$projectCountOfLikes likes</button></a>";
    }
}
