<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/error_handler.php'
    * Beschreibung: Script zum handeln von Errors bei der Eingabe von Userinputs
*/
if(isset($_GET['error'])){
    echo "<script>
        alert(\"[Error] ". $_GET["error"] ."\");
    </script>";
}