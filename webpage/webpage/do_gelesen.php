
<?php
include_once '../../userdata.php';
session_start();

$id = $_GET['posts_id'];
$channel = $_GET['channel'];
$kuerzel = $_SESSION['kuerzel'];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$statement = $pdo->prepare("UPDATE notification SET $kuerzel = 'read' WHERE post = (SELECT post FROM posts WHERE posts_id=:id )");
$statement->execute(array(":id"=>"$id"));
if (!$statement){
    echo "Prepare Fehler.";
}

header("location: home.php?channel=$channel");

?>