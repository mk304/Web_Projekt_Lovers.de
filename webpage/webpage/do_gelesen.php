
<?php
include_once '../../userdata.php';

$id = $_GET['posts_id'];
$channel = $_GET['channel'];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$statement = $pdo->prepare("UPDATE posts SET `status` = 'read' WHERE `posts_id` = $id");
$statement->execute();

header("location: home.php?channel=$channel");

?>