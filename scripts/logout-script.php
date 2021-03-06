<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/logout-script.php'
    * Beschreibung: Script für das Löschen der SESSION Variabeln beim Logout-Prozess
*/

if(isset($_POST['logout-submit'])){
    // Session starten, session variabeln löschen 
    session_start();
    session_unset();
    session_destroy();

    // Link zu index 
    header("Location: ../index.php?logout=success");
}
else{
    header("Location ../index.php");
    exit();
}

