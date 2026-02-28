<?php
$conn = mysqli_connect(getenv("MARIADB_HOST"), getenv("MARIADB_USER"), getenv("MARIADB_PASSWORD"), getenv("MARIADB_DATABASE"));

$buttonList = [];

$query = $conn->prepare("SELECT filename FROM buttons");
$query->execute();
$query->bind_result($filename);
while ($query->fetch()) {
    $buttonList[] = $filename;
}
$query->close();


// Edit
if (isset($_POST["id"]) && isset($_POST["alt"]) && isset($_POST["url"])) {

    if (strlen($_POST["url"]) === 0) {
        $query = $conn->prepare("UPDATE buttons SET alt = ?, url = NULL WHERE id = ?");
        $query->bind_param("si", $_POST["alt"], $_POST["id"]);
    } else {
        $query = $conn->prepare("UPDATE buttons SET alt = ?, url = ? WHERE id = ?");
        $query->bind_param("ssi", $_POST["alt"], $_POST["url"], $_POST["id"]);
    }

    $query->execute();
    $query->close();

    $editOk = true;
}

// Add

if (isset($_POST["filename"]) && isset($_POST["alt"])) {

    if (isset($_POST["url"]) && strlen($_POST["url"]) > 0) {
        $query = $conn->prepare("INSERT INTO buttons(filename, alt, url) VALUES (?, ?, ?)");
        $query->bind_param("sss", $_POST["filename"], $_POST["alt"], $_POST["url"]);
    } else {
        $query = $conn->prepare("INSERT INTO buttons(filename, alt) VALUES (?, ?)");
        $query->bind_param("ss", $_POST["filename"], $_POST["alt"]);
    }
    $query->execute();
    $query->close();

    $addOk = true;
}

// Upload

if (isset($_FILES["button"])) {
    $target = "/var/www/html/buttons/" . basename($_FILES["button"]["name"]);

    if (file_exists($target)) {
        $uploadError = "The button with that name already exists";
    }

    if (!isset($uploadError)) {
        if (move_uploaded_file($_FILES["button"]["tmp_name"], $target)) {
            $uploadOk = true;
        } else {
            $uploadError = "Failed to move file to /src/buttons";
        }
    }
}

if (isset($_GET["delete"])) {

    if (file_exists("/var/www/html/buttons/" . basename($_GET["delete"]))) {
        unlink("/var/www/html/buttons/". basename($_GET["delete"]));
    } else {
        $deleteError = "Unable to find file";
    }

    $query = $conn->prepare("DELETE FROM buttons WHERE filename = ?");
    $query->bind_param("s", $_GET["delete"]);
    $query->execute();
    $query->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../../components/global.php'; ?>
    <?php seo("Buttons", "Management of buttons for lain's website."); ?>
</head>

<body>
    <?php require '../../components/header.php'; ?>

    <h1>Buttons Management</h1>
    <a href="/admin/">back</a>
    <br>

    <?php if (isset($editOk)) : ?>
        <div class="success">
            Edit was OK
        </div>
    <?php endif; ?>
    <?php if (isset($addOk)) : ?>
        <div class="success">
            Add was OK
        </div>
    <?php endif; ?>
    <?php if (isset($uploadOk)) : ?>
        <div class="success">
            Upload was OK
        </div>
    <?php endif; ?>
    <?php if (isset($uploadError)) : ?>
        <div class="error">
            <?= $uploadError ?>
        </div>
    <?php endif; ?>
    <?php if (isset($deleteError)) : ?>
        <div class="error">
            <?= $deleteError ?>
        </div>
    <?php endif; ?>
    
    <h2>Current buttons</h2>

    <table>
        <thead>
            <tr>
                <th>Filename</th>
                <th>Alt text</th>
                <th>Target URL</th>
                <th>Save</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = $conn->prepare("SELECT id, filename, alt, url FROM buttons");
            $query->execute();
            $query->bind_result($id, $filename, $alt, $url);
            while ($query->fetch()) { ?>
                <form action="/admin/buttons.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
                    <tr>
                        <td><?= $filename; ?></td>
                        <td>
                            <input type="text" name="alt" value="<?= htmlspecialchars($alt); ?>">
                        </td>
                        <td>
                            <input type="text" name="url" value="<?= isset($url) ? htmlspecialchars($url) : ""; ?>">
                        </td>
                        <td>
                            <button type="submit">Update</button>
                            <a href="?delete=<?= htmlspecialchars($filename); ?>">Delete</a>
                        </td>
                    </tr>
                </form>
            <?php }
            $query->close(); ?>
        </tbody>
    </table>

    <h2>Buttons that aren't added yet</h2>

    <table>
        <thead>
            <tr>
                <th>Filename</th>
                <th>Alt</th>
                <th>URL</th>
                <th>Add</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $buttons = scandir("/var/www/html/buttons");
            $buttons = array_filter($buttons, fn($x) => $x != '.' && $x != '..');

            $buttonsToAdd = array_filter($buttons, fn($x) => !in_array($x, $buttonList));
            foreach ($buttonsToAdd as $btn) :?>
                <tr>
                    <form action="/admin/buttons.php" method="post">
                        <td>
                            <input type="text" name="filename" value="<?= htmlspecialchars($btn); ?>" readonly>
                        </td>
                        <td>
                            <input type="text" name="alt" placeholder="88x31 button">
                        </td>
                        <td>
                            <input type="text" name="url" placeholder="https://website.com">
                        </td>
                        <td>
                            <button type="submit">Add</button>
                            <a href="?delete=<?= htmlspecialchars($btn); ?>">Delete</a>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>

    <h2>Add new button</h2>

    <form action="/admin/buttons.php" method="post" enctype="multipart/form-data">
        <label for="button">Button</label>
        <br>
        <input type="file" name="button" id="button" >
        <br>

        <button type="submit">Send to server</button>
    </form>


    <?php require '../../components/footer.php'; ?>
</body>

</html>