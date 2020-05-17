<!--
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './user.php'
    * Beschreibung: Benutzerprofil-Seite (Zum Abmelden)
-->
<?php
    // Errors ausschalten, da hier normalerweise ein Error wegen doppelter Session initialisierung kommt
    error_reporting(0);
    ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        session_start();
        if(isset($_SESSION['userID'])){
            echo "<title>".$_SESSION['userName']." | Filmtagebuch</title>";
        }
        else{
            header("Location ./login.php");
            exit();
        }
    ?>
</head>
<body>
    <header>
        <?php
            require("nav.php");
        ?>
    </header>
    <div id="content">
        <form action="./scripts/logout-script.php" method="post">
            <button type="submit" name="logout-submit">Abmelden</button>
        </form>
    </div>
</body>
</html>