<meta http-equiv="refresh" content="1; url=https://mars.iuk.hdm-stuttgart.de/~mk304/Web_Projekt/webpage/webpage/profil.php">

<!-- Sweetalert 2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../ui/sweetalert/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="../ui/sweetalert/sweetalert2.min.css">

<?php

include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];


// Code Quelle: https://www.youtube.com/watch?v=y4GxrIa7MiE
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
                $fileNameNew = "profilbild".$kuerzel.".".$fileActualExt;
                $fileDestination = "../profilbilder/".$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);





            }else {
                echo"<script> swal({
                type: 'error',
                title: 'Deine Datei ist zu groß!', 
                text: 'Max Größe 1MB',
            </script>";}

        }
        else {
            echo"Leider gab es ein Probleim! :(";
        }
    }else {
        echo"Dieses Dateiformat wird nicht unterstützt!";
    }
}

// neue Posts in Tabelle notification übertragen
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO notification (post)  
SELECT posts_id FROM posts WHERE not exists
(select post from notification where notification.post = posts.posts_id) ";