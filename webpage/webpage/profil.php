
<?php
session_start();

include_once '../../userdata.php';
include_once '../ui/neuerheader.php';

$kuerzel = $_SESSION["kuerzel"];
$profilname = $_GET["profilname"];


?>

<div class="titelbild"><img src="../bilder/head.jpg"></div>
<div class="profilbild"><img src="../bilder/testprofilbild.jpg"></div>

<div class="wrapper1">
    <div class="one">One</div>
    <div class="two">Two</div>

</div>

<?php
// Ausgabe der Skills
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "SELECT skill from skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:kuerzel)";
$query = $pdo->prepare($sql);
if (!$query->execute(array(":kuerzel"=>"$kuerzel")));
while ($row = $query->fetchObject()) {
    echo "<ul>$row->skill</ul>";
}



include_once '../ui/footer.php';
?>
