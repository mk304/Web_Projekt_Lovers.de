<?php
session_start();

// Überprüfung ob Nutzer eingeloggt ist. Falls nicht wird die Session abgebrochen und der User auf die Login-Seite geleitet.
if ($_SESSION["log"]=="TRUE") {
}
    else {
        session_destroy();
        header("Location: ../home/Startseite.php?seite=login_fail");
}
?>