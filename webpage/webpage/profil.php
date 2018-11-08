<?php
include_once '../../userdata.php';
include_once '../ui/neuerheader.php';
session_start();

$kuerzel = $_SESSION["kuerzel"];

?>

<div class="titelbild"><img src="../bilder/head.jpg"></div>
<div class="profilbild"><img src="../bilder/testprofilbild.jpg"></div>


<?php

echo "Hallo " . $kuerzel . "<br>";
echo "Das ist dein eigenes profil";

?>



<?php
include_once '../ui/footer.php';

?>
