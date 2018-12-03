<?php
session_start();

if ($_SESSION["log"]=="TRUE") {

}
    else {
        session_destroy();
        header("Location: ../home/Startseite.php?seite=login_fail");
}



?>