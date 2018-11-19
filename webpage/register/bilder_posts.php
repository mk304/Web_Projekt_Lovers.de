
<?php
include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];
$channel = $_GET["channel"];
?>

<meta content="1; url=https://mars.iuk.hdm-stuttgart.de/~mk304/Web_Projekt/webpage/webpage/home.php?channel=<?php echo $channel?>">

<?php

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
                    $fileDestination = "../bildupload/".$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $bild_id = $fileNameNew;
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
                $sql = "INSERT INTO postimg (kuerzel, channel, bild_id) VALUES (?, ?, ?)";

                $statement = $pdo->prepare($sql);
                $statement->execute(array("$kuerzel","$channel", "$bild_id"));
                header("location: home.php?channel=$channel");
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

