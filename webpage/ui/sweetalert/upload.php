<?php
include_once '../../../userdata.php';
$kuerzel = "mk304";

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO posts (kuerzel, channel, post, status) VALUES (?, ?, ?, 'unread')";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$channel", "$post"));





if(isset($_POST['submit'])){
 $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');


    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 1000000){
                    $fileNameNew = uniqid('', true).$kuerzel.".".$fileActualExt;
                    $fileDestination = "../../profilbilder/".$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $bild_id = $fileDestination
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
                $sql = "INSERT INTO postimg (kuerzel, bild_id,) VALUES (?, ? )";

                $statement = $pdo->prepare($sql);
                $statement->execute(array("$kuerzel", "$bild_id"));



            }else {
                echo"Deine Datei ist zu groß! (Max Größe 1MB)";
            }
        }else {
            echo"Leider gab es ein Probleim! :(";
        }
    }else {
        echo"Diese Dateiformat wird nicht unterstützt!";
    }




}