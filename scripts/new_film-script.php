<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/new_film.php'
    * Beschreibung: Script um einen neuen Eintrag (Film) in die Datenbank hinzuzufügen
*/
if(isset($_POST['new_film-submit'])){

    //SQL-Connection-Variable importieren
    require('./db-script.php');

    $filmtitle = $_POST["film_title"];
    $genre = $_POST["film_genre"];
    $seen = $_POST["film_seen"];
    $rating = $_POST["film_rating"];


    $user = $_POST["user"];


    // => Validieren der Userinputs

    // ? Ist ein Input leer (error=emptyinputs)
    if(empty($filmtitle) || empty($genre) || empty($seen) || empty($rating)){
        header("Location: ../index.php?error=emptyinputs&title=".$filmtitle."&genre=".$genre."&seen=".$seen."&rating=".$rating);
        exit();
    }
    else{
        // Inputs valide
        $sql = "INSERT INTO films (title, genre, seen, rating, user) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"sssss", $filmtitle, $genre, $seen, $rating, $user);
            mysqli_stmt_execute($stmt);

            header("Location: ../index.php?addfilm=success");
        }
    }
    // SQL-Verbidung beenden
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    header("Location: ../index.php");
    exit();
}