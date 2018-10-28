<?php


if(!isset($_SESSION["log"])) {

}
    else {
        header("Location: ../home/Startseite.php");
    }




if ($_SESSION["log"]=="TRUE") {

}
    else {
        session_destroy();
        header("Location: ../home/Startseite.php");
}



?>