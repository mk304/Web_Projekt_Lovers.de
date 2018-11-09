
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
    session_start();
    include_once '../ui/footer.php';

    ?>
