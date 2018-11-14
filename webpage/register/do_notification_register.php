<?php
include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];


// alle vorhandenen Posts automatisch in Tabelle notification übertragen
$pdo_n = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_n = "INSERT INTO notification (post)  
SELECT post FROM posts";

$stmt_n=$pdo_n->prepare($sql_n);
if (!$stmt_n){
    echo "Prepare Fehler.";
}

if (!$stmt_n->execute()) {
    echo "Query Fehler.";
}


// für jedes Kürzel eine eigene Spalte in Tabelle notification einfügen
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