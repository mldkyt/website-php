

<?php

$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));
$query = $conn->prepare("SELECT filename, alt, url FROM buttons");
$query->execute();
$query->bind_result($filename, $alt, $url);

while ($query->fetch()) {
    if (isset($url)) { ?>
        <a href="<?= $url ?>">
            <img src="/buttons/<?= $filename; ?>" alt="<?= $alt; ?>" style="width: 88px; height: 31px;">
        </a>
    <?php } else { ?>
        <img src="/buttons/<?= $filename; ?>" alt="<?= $alt; ?>">
    <?php }
} ?>
