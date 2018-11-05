<?php
include_once '../../userdata.php';
include_once 'neuerheader.php';
session_start();

$kuerzel = $_SESSION["kuerzel"];

echo "Hallo ".$kuerzel."<br>";
echo "Das ist dein eigenes Profil";



?>