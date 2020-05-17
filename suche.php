<!--
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './suche.php'
    * Beschreibung: Suche-Seite
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suche | Filmtagebuch</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/table_style.css">
</head>
<body>
        <header>
            <?php
                    require("./nav.php");
            ?>
        </header>
        <?php
            echo "<div id=\"content\">";
            if(isset($_SESSION["userName"])){

            }
            else{
                // user nicht eingeloggt
                echo "<h2>Huch, sieht aus als wärst du nicht angemeldet</h2>";
                echo "<p id=\"p-link\">Klicke <a href=\"./login.php\">hier</a> um dich anzumelden</p>";
            }
            echo "</div>";
        ?>
</body>
</html>