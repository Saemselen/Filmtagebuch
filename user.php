<?php
    // Errors ausschalten, da hier normalerweise ein Error wegen doppelter Session initialisierung kommt
    error_reporting(0);
    ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <div>
        <form action="scripts/logout-script.php">
            <button type="submit" name="logout-submit">Abmelden</button>
        </form>
    </div>
</body>
</html>