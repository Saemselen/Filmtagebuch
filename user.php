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
    <link rel="stylesheet" href="./css/user_style.css">
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
        <div id="user">
            <div id="left">
                <?php
                    function sqlQuery($statement,$param){
                        require("./scripts/db-script.php");
                        $sql = $statement;

                        $stmt = mysqli_stmt_init($connection);

                        // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ./user.php?error=sqlerror");
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt,"s",$param);
                            mysqli_stmt_execute($stmt);
            
                            $res = mysqli_stmt_get_result($stmt);

                            if($row = mysqli_fetch_row($res)){
                                return $row[0];
                            }
                        }
                    }


                    echo "<h2>".$_SESSION["userName"]."</h2>";
                    echo "<h4>Filme gesehen:</h4>";

                    

                    $sql1 = "SELECT COUNT(*) FROM films WHERE user = ?";

                    $sql2 = "SELECT AVG(rating) FROM films WHERE user = ?";

                    $filmsseen = sqlQuery($sql1,$_SESSION["userName"]);
                    $avgrating = round(sqlQuery($sql2,$_SESSION["userName"]),1);

                    
                    echo "<h1>".$filmsseen."</h1>";
                    echo "<h4>Durchschnittliche Bewertung:</h4>";
                    echo "<h1>".$avgrating."</h1>";
                    
                    
                
                ?>
            </div>
            <div id="right">
                <form action="./scripts/logout-script.php" method="post">
                    <button type="submit" name="logout-submit">Abmelden</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>