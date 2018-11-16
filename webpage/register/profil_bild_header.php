<?php
include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];



if(isset($_POST['submit'])){
 $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg');


    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 1000000){
                    $fileNameNew = "header".$kuerzel.".".$fileActualExt;
                    $fileDestination = "../headerbilder/".$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);





            }else {
                echo"Deine Datei ist zu groß! (Max Größe 1MB)";
            }
        }else {
            echo"Leider gab es ein Probleim! :(";
        }
    }else {
        echo"Dieses Dateiformat wird nicht unterstützt!";
    }




}