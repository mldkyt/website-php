<?php

header("Content-Type: application/json");
require '../../components/util.php';

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

// get view count
$query = $conn->prepare("SELECT SUM(views) FROM views");
$query->execute();
$query->bind_result($views);
$query->fetch();
$query->close();

// per IP view increasing limit
$query = $conn->prepare("DELETE FROM views_expire WHERE expire < NOW()");
$query->execute();
$query->close();

$query = $conn->prepare("SELECT id FROM views_expire WHERE ip = ?");
$query->bind_param("s", get_remote_addr());
$query->execute();

if ($query->fetch()) {
    echo json_encode(["views"=>$views]);
    $query->close();
    exit();
}

$query->close();

$query = $conn->prepare("INSERT INTO views_expire(ip, expire) VALUES (?, NOW() + INTERVAL 30 MINUTE)");
$query->bind_param("s", get_remote_addr());
$query->execute();
$query->close();

$date = date("Y-m-d");

$query = $conn->prepare("INSERT INTO views VALUES(?, 1) ON DUPLICATE KEY UPDATE views = views + 1");
$query->bind_param("s", $date);
$query->execute();
$query->close();

echo json_encode(["views" => $views + 1]);
