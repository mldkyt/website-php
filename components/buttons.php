

<?php

$buttons = scandir("/var/www/html/buttons");
$buttons = array_filter($buttons, fn($x) => $x != '.' && $x != '..');
foreach ($buttons as $button) : ?>
<img src="/buttons/<?= $button ?>" alt="<?= explode(".", $button)[0]; ?> 88x31 button" style="width: 88px; height: 31px;">
<?php endforeach; ?>
