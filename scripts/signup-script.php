<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './scripts/signup-script.php'
    * Beschreibung: Script zum eintragen eines neuen Benutzers in der Datenbank im Signup-Prozess
*/


// überprüfen ob der submit button geklickt wurde
if(isset($_POST['signup-submit'])){

    //SQL-Connection-Variable importieren
    require('./db-script.php');

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // => Validieren der User-Inputs

    // ? Ist ein Input leer (error=emptyinputs)
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyinputs&uid=".$username."&mail=".$email);
        exit();
    }
    // ? Wurde eine ungültige Email UND ein ungültiger Benutzername angegeben (error=invalidmailuid)
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    // ? Wurde eine ungültige Email angegeben (error=invalidmail)
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    // ? Wurde ein ungültiger Benutzername angegeben (error=invaliduid)
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invaliduid&mail".$email);
        exit();
    }
    // ? Stimmen die beiden eingegebenen Passwörter nicht überein (error=nopasswordmatch)
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=nopasswordmatch&uid=".$username."&mail=".$email);
        exit();
    }
    // ? existiert der Benutzername bereits in der DB (error=uidtaken)
    else{
        // SQL Statement vorbereiten (Für den Benutzernamen wird aus Sicherheitsgründen ein Placeholder verwendet (SQL-Injection-Protection))
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($connection);
        // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            // Wert $username (string) in Statement einfügen
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Statement ausführen
            mysqli_stmt_execute($stmt);
            // Resultat in Variable $stmt speichern
            mysqli_stmt_store_result($stmt);

            // Anzahl rows aus dem Result in Veriable $check speichern
            $check = mysqli_stmt_num_rows($stmt);
            // Überprüfen ob Resultat mehr als 0 rows lang ist. D.h. Benutzername existiert bereits in der DB
            if($check > 0){
                header("Location: ../signup.php?error=uidtaken&mail=".$email);
                exit();
            }
            else{
                
                $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{
                    // Passwort mittels bcrypt hashen
                    $hashedPWD = password_hash($password, PASSWORD_DEFAULT);

                    // Werte 
                    // $username (string), 
                    // $email (string), 
                    // $hashedPWD (string) in Statement einfügen
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPWD);
                    // Statement ausführen
                    mysqli_stmt_execute($stmt);

                    header("Location: ../login.php?signup=success");
                }

            }
        }
    }
    // SQL-Verbidung beenden
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    // Falls der Submit button nicht geklickt wurde => User zur Startseite zurückschicken
    header("Location: ../index.php");
    exit();
}