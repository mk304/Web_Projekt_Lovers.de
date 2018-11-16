<?php
include_once '../../userdata.php';

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$id = isset($_GET['id'])? $_GET['id'] : "";
$sql = "select * from upload_image where id=?";
$statement = $pdo->prepare($sql);
$statement->bindParam(1, $id);
$statement->execute();
$row = $statement->fetch();
header("Content-Type:".$row['mime']);
echo $row['data'];
?>

<?php
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from myblob where id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:".$row['mime']);
echo $row['data'];
//echo '<img src="data:image/jpeg;base64,'.base64_encode($row['data']).'"/>';
