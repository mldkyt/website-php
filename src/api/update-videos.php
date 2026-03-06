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

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

if (!$conn) {
    http_response_code(500);
    die(json_encode(["error" => mysqli_connect_error()]));
}

foreach ($data as $key => $value) {
    if (!isset($value["title"]) || !isset($value["url"]) || !isset($value["id"]) || !isset($value["order"])) {
        continue;
    }

    $query = $conn->prepare("INSERT INTO videos (id, ord, title, url) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE title = VALUES(title), url = VALUES(url), ord = VALUES(ord)");
    $query->bind_param("siss",  $value["id"], $value["order"], $value["title"], $value["url"]);
    $query->execute();
    $query->close();
}

$conn->close();

print(json_encode(["ok" => true]));
