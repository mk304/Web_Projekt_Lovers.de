<?php
include_once '../../userdata.php';
session_start();



// mögliche Skills aus DB ausgeben
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = "SELECT skill, id from skills";
$query = $pdo->prepare($sql);
$query->execute();
?>
<form action="do_skills_input.php" method="post">

        <?php while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "   <label>
                     <input type='checkbox' name='".$zeile['skill']."' value='".$zeile['id']."'>".
                     $zeile['skill']."
                     </label>";
            }?>
    <input type="submit" value="speichern">
</form>
