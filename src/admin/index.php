<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Administration", "lain's website administration"); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>
    
    <h1>Administration</h1>

    <ul>
        <li><a href="/admin/anonmsg.php">Anonymous Messages</a></li>
        <li><a href="/admin/guestbook.php">Guestbook Admin Page</a></li>
    </ul>

    <?php require '../../components/footer.php'; ?>
</body>

</html>