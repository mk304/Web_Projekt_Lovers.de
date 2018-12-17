
<?php
session_start();
include_once '../../userdata.php';

$kuerzel = $_POST["kuerzel"];
$pw = $_POST["pw"];
$_SESSION["kuerzel"] = $kuerzel;
$_SESSION["pw"] = $pw;

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = "SELECT pw FROM user WHERE kuerzel=:kuerzel";

$statement = $pdo->prepare($sql);
$statement->execute(array(":kuerzel" => "$kuerzel"));
$row = $statement->fetchObject();

// Passwort Hash wird geprüft --> bei Übereinstimmung wird Nutzer eingeloggt
if (password_verify($pw, $row->pw)) {
    $_SESSION["log"] = "TRUE";
    header("Location: ../webpage/home.php?channel=");

} else {
    session_destroy();
    header("Location: ../home/Startseite.php?seite=warning_login");;
}

if (!$statement){
    echo "Prepare Fehler.";
}

?>
