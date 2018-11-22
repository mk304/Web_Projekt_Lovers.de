<!doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login Check</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>

</head>


<body>
<?php
session_start();

include_once '../../userdata.php';


$kuerzel = $_POST["kuerzel"];
$pw = $_POST["pw"];

$_SESSION["kuerzel"] = $kuerzel;
$_SESSION["pw"] = $pw;

$options = [
    'cost' => 12
];
$hash = password_hash($pw, PASSWORD_DEFAULT, $options);


$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = "SELECT pw FROM user WHERE kuerzel=:kuerzel";

$statement = $pdo->prepare($sql);
$statement->execute(array(":kuerzel" => "$kuerzel"));

$row = $statement->fetchObject();

if (password_verify($pw, $hash)) {
    $_SESSION["log"] = "TRUE";
    header("Location: ../webpage/home.php");


} else {
    $_SESSION["log"] = "FALSE";
    header("Location: ../home/Startseite.php");
}

if (!$statement){
    echo "Prepare Fehler.";
}

?>


</body>

</html>