<meta http-equiv="refresh" content="url=https://mars.iuk.hdm-stuttgart.de/~mk304/Web_Projekt/webpage/webpage/home.php">
<?php
include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];
$channel = $_SESSION["channel"];


// Code Quelle(ohne Datenbank): https://www.youtube.com/watch?v=y4GxrIa7MiE
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
            if($fileSize< 5000000){
                    $fileNameNew = uniqid('', true).$kuerzel.".".$fileActualExt;
                    $fileDestination = "../bildupload/".$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $bild_id = $fileNameNew;
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
                $sql = "INSERT INTO posts (kuerzel, channel, bild_id) VALUES (?, ?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array("$kuerzel","$channel", "$bild_id"));
                header("Location: ../webpage/home.php?channel=$channel");
            }else {
                echo"Deine Datei ist zu groß! (Max Größe 5MB)";
            }
        }else {
            echo"Leider gab es ein Problem! :(";
        }
    }else {
        echo"Dieses Dateiformat wird nicht unterstützt!";
    }
}

// neue Bilder in Tabelle notification übertragen
$pdo2 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql2 = "INSERT INTO notification (post)  
SELECT posts_id FROM posts WHERE not exists
(select post from notification where notification.post = posts.posts_id) ";

$stmt=$pdo2->prepare($sql2);
if (!$stmt){
    echo "Prepare Fehler.";
}
if (!$stmt->execute()) {
    echo "Query Fehler.";
}

// eigene Posts sollen als "gelesen" markiert werden, damit diese nicht als neue Nachrichten angezeigt werden
$sql3 = "UPDATE notification SET $kuerzel ='read' WHERE post= (SELECT posts_id FROM posts WHERE bild_id=:bild_id)";

$statement3 = $pdo->prepare($sql3);

$statement3->execute(array(":bild_id"=>"$bild_id"));




