<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/login-script.php'
    * Beschreibung: Script zur Authentifizierung des Benutzers beim Login
*/


// überprüfen ob der login button geklickt wurde
if(isset($_POST["login-submit"])){

    //SQL-Connection-Variable importieren
    require("db-script.php");

    $mailuid = $_POST["mailuid"];
    $password = $_POST["pwd"];

    // ? Ist ein Input leer (error=emptyinputs)
    if(empty($mailuid) || empty($password)){
        header("Location: ../login.php?error=emptyinputs");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
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
                $pwdCheck = password_verify($password, $row["pwd"]);
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
                    $_SESSION["userName"] = $row["username"];

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
        // SQL-Verbidung beenden
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
}
else{
    header("Location: ../index.php");
    exit();
}