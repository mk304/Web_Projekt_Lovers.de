<!doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Registrierung</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>


<body>

<?php

session_start();

include_once '../../userdata.php';


$kuerzel = $_POST["kuerzel"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$pw = $_POST["pw"];



$_SESSION ["kuerzel"]="$kuerzel";
$_SESSION ["vorname"]="$vorname";
$_SESSION ["nachname"]="$nachname";
$_SESSION ["email"]="$email";
$_SESSION ["pw"]="$pw";


//Überprüfung, ob Kürzel in Datenbank bereits vergeben ist
$pdo_check = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_statement = "SELECT kuerzel FROM user WHERE kuerzel=:kuerzel";

$statement_check = $pdo_check->prepare($sql_statement);
$statement_check->execute(array(":kuerzel"=>"$kuerzel"));

$row = $statement_check->fetchObject();

if ($kuerzel == $row->kuerzel) {
    session_destroy(); ?>
    <div class="alert alert-danger" role="alert">
        Sie sind bereits registriert. Weiter zum <a href="../home/Startseite.php" class="alert-link">LOGIN</a>
    </div>

    <?php
    //header("Location: ../home/Startseite.php");

}else{    $_SESSION["log"] = "TRUE";
    header("Location: ../home/Startseite.php?seite=register-form-seite2");

}

//Daten werden in Datenbank geschrieben
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO user(kuerzel, vorname, nachname, email, pw) VALUES (?, ?, ?, ?, ?)";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$vorname", "$nachname", "$email", "$pw"));



// für jedes neue Kürzel eine eigene Spalte in Tabelle notification einfügen
$pdo_n2 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_n2 = "ALTER TABLE notification ADD $kuerzel VARCHAR (50)";

$stmt_n2=$pdo_n2->prepare($sql_n2);
if (!$stmt_n2){
    echo "Prepare Fehler.";
}

if (!$stmt_n2->execute(array("kuerzel"=>$kuerzel))) {
    echo "Query Fehler.";
}



// alle Posts als gelesen markieren
$pdo_n3 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_n3 = "UPDATE notification SET $kuerzel = 'read'";

$stmt_n3=$pdo_n3->prepare($sql_n3);
if (!$stmt_n3){
    echo "Prepare Fehler bei 3.";
}

if (!$stmt_n3->execute()) {
    echo "Query Fehler bei 3.";
}



//header("Location: ../webpage/home.php");




?>


</body>

</html>
