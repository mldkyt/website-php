<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die(json_encode(["error" => "Invalid method"]));
}

$auth = $_SERVER["HTTP_AUTHORIZATION"] ?? "";
if (trim($auth) != "Bearer " . getenv("API_KEY")) {
    http_response_code(403);
    die(json_encode(["error" => "Unauthorized"]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!is_array($data) || json_last_error() != JSON_ERROR_NONE) {
    http_response_code(400);
    die(json_encode(["ok" => false, "error" => "Invalid json: " . json_last_error_msg()]));
}

if (!array_is_list($data)) {
    http_response_code(400);
    die(json_encode(["ok" => false, "error" => "Not a list"]));
}


$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");

if (!$conn) {
    http_response_code(500);
    die(json_encode(["error" => "Connection error"]));
}

foreach ($data as $key => $value) {
    if (!isset($value["title"]) || !isset($value["url"]) || !isset($value["id"]) || !isset($value["order"])) {
        continue;
    }

    pg_query_params($conn, "INSERT INTO videos (id, ord, title, url) VALUES ($1, $2, $3, $4) ON CONFLICT DO UPDATE SET ord = $2, title = $3, url = $4",
        [$value["id"], $value["order"], $value["title"], $value["url"]]);
}

print(json_encode(["ok" => true]));
