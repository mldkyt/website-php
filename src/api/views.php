<?php

header("Content-Type: application/json");
require "util.php";

$host = getenv("DB_POSTGRES_HOST");
$user = getenv("DB_POSTGRES_USER");
$pass = getenv("DB_POSTGRES_PASSWORD");
$name = getenv("DB_POSTGRES_NAME");
$port = getenv("DB_POSTGRES_PORT") ?: "5432";

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

// get view count
$res = pg_query($conn, "SELECT SUM(views) AS views FROM views");
$row = pg_fetch_assoc($res);
$views = $row["views"];

// per IP view increasing limit
pg_query($conn, "DELETE FROM views_expire WHERE expire < now()");

$res = pg_query_params($conn, "SELECT id FROM views_expire WHERE ip = $1", [get_remote_addr()]);
if (pg_fetch_assoc($res)) {
    echo json_encode(["views" => $views]);
    exit();
}

pg_query_params($conn, "INSERT INTO views_expire(ip, expire) VALUES ($1, now() + interval '30 minutes')", [get_remote_addr()]);

$date = date("Y-m-d");

pg_query_params($conn, "INSERT INTO views VALUES ($1, 1) ON CONFLICT (date) DO UPDATE SET views = views.views + 1", [$date]);

echo json_encode(["views" => $views + 1]);
