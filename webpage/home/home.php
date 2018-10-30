<?php


//include_once '../ui/header.php';
include_once '../register/login_test.php';
include_once 'sidebar.html';
include_once '../../userdata.php';

session_start();
include_once 'neuerheader.php';

?>
<div class="titel" >

    <h1>Allgemein</h1>

</div>
<div class="posts">
    <ul>
        <li class =nposts> Ein neuer post</li>
        <li class =nposts> Ein neuer post</li>
        <li class =nposts> Ein neuer post</li>
        <li class =nposts> eilurgk iequwrg wierukgwe iurgwe iutrgew uiewt weiugt wiutgwitugqwitugwer iuwegt t</li>
        <li class =nposts> Ein neuer post</li>
        <li class =nposts> Lorem</li>

    </ul>
</div>
<?php
session_start();
include_once 'footer.php';

?>

<form action="../register/post_input.php" method="post">
    <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Post verfassen..." name="post"></textarea>

        <select size="1" name="Channel">
        <?php
        //Channels für Dropdown Menü aus Datenbank ausgeben
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
        $sql = "SELECT name from channels";
        $query = $pdo->prepare($sql);
        $query->execute();
        while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value=/".$zeile["name"].'">'. $zeile["name"];}
        ?>
        </select>

        <input type="submit" value="teilen">
    </div>
</form>



<?php
//Daten aus Channel Wohnungssuche ausgeben
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_3 = "SELECT post from posts WHERE channel='3'";
$query_3 = $pdo->prepare($sql_3);
$query_3->execute();

echo"Wohnungssuche"."<br>";
while ($row = $query_3->fetchObject()) {
    echo "$row->post"."<br>";}

?>

