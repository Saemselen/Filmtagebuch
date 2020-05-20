<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/remove_entry-script.php'
    * Beschreibung: Script zum Entfernen von Einträgen aus der Datenbank
*/
if(isset($_POST["remove-entry-submit"]) && isset($_GET["e_title"])){
    $title = $_GET["e_title"];
    

    require("./db-script.php");
    $sql = "DELETE FROM films WHERE title=?";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$title);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?removeentry=success");
    }
    // SQL-Verbidung beenden
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    exit();
}
else{
    header("Location: ../index.php");
    exit();
}