<?php
include_once '../../userdata.php';

$id = $_GET['id'];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = "select * from upload_image where id=$id";
$statement = $pdo->prepare($sql);
$statement->bindParam(1, $id);
$statement->execute();
$row = $statement->fetch();
header('Content-Type:'.$row['mime']);
echo $row['data'];

?>