<?php
//upload.php
session_start();
$kuerzel = $_SESSION["kuerzel"];

if($_FILES["file"]["name"] != '')
{
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = uniqid('', true).$kuerzel. '.' . $ext;
    $location = '../../profilbilder/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
}
?>
