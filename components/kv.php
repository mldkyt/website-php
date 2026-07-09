<?php
function db_key_get($conn, $key) {
    $data = pg_query_params($conn, "SELECT value FROM kv WHERE key = $1", [$key]);
    $fetch = pg_fetch_assoc($data);

    if ($fetch) {
        return $fetch["value"];
    }

    return null;
}

function db_key_set($conn, $key, $value) {
    pg_query_params($conn, "INSERT INTO kv(key, value) VALUES ($1, $2) ON CONFLICT (key) DO UPDATE SET value = $2", [$key, $value]);
}
