

<?php

$host = getenv('DB_POSTGRES_HOST');
$user = getenv('DB_POSTGRES_USER');
$pass = getenv('DB_POSTGRES_PASSWORD');
$name = getenv('DB_POSTGRES_NAME');
$port = getenv('DB_POSTGRES_PORT') ?: '5432';

$conn = pg_connect("host=$host port=$port dbname=$name user=$user password=$pass");
$res = pg_query("SELECT filename, alt, url FROM buttons");

while ($row = pg_fetch_assoc($res)) {
    if (isset($row["url"])) { ?>
        <a href="<?= $row["url"] ?>">
            <img src="/buttons/<?= $row["filename"]; ?>" alt="<?= $row["alt"]; ?>" style="width: 88px; height: 31px;">
        </a>
    <?php } else { ?>
        <img src="/buttons/<?= $row["filename"]; ?>" alt="<?= $row["alt"]; ?>">
    <?php }
} ?>
