<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * File: 'login-script.php'
*/

// überprüfen ob der login button geklickt wurde
if(isset($_POST["login-submit"])){

    //SQL-Connection-Variable importieren
    require("db-script.php");

    $mailuid = $_POST["mailuid"];
    $password = $_POST["pwd"];

    // ? Ist ein Input leer (error=emptyinputs)
    if(empty($mailuid) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?";
        $stmt = mysqli_stmt_init($connection);
        // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);

            $res = mysqli_stmt_get_result($stmt);
            // überprüfen ob ein resultat zurück kommt
            if($row = mysqli_fetch_assoc($res)){
                // ja

                // eingegebenes Passwort mit Passwort-hash aus der DB vergleichen
                $pwdCheck = password_verify($password, $row["PWD"]);
                if(!$pwdCheck){
                    // Falsches Passwort (error=wrongpwd)
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck){
                    // => Richtiges Passwort
                    // session starten
                    session_start();
                    $_SESSION["userID"] = $row["UID"];
                    $_SESSION["userName"] = $row["Username"];

                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    // $pwdCheck weder true noch false (error=wrongpwd)
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                // nein (error=nouser)
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}