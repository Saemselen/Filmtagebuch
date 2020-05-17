<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Filme | Filmtagebuch</title>
</head>
<body>
    <header>
        <?php
            require("./nav.php");
        ?>
    </header>
    <?php

        function getFilms($username){
            
        }




        echo "<div id=\"content\">";
        if(isset($_SESSION["userID"])){
            // user eingeloggt
            // => tabelle mit Einträgen des Benutzers anzeigen

            // button um formular einzublenden
            echo "<button id=\"btn-show-form\" onclick=\"showForm()\">Eintrag hinzufügen</button>";

            

            // formular zum hinzufügen von Einträgen (leer)
            echo "<form id=\"newfilmform\" action=\"./scripts/new_film-script.php\" method=\"post\">";
            echo "<input type=\"text\" name=\"film_title\" placeholder=\"Filmtitel\">";
            echo "<input type=\"text\" name=\"film_genre\" placeholder=\"Genre\">";
            echo "<p>Gesehen<input type=\"date\" name=\"film_seen\"></p>";
            echo "<p>Bewertung (1-10)<input type=\"number\" name=\"film_rating\" min=\"1\" max=\"10\"></p>";
            echo "<input type=\"hidden\" value=\"".$_SESSION["userName"]."\" name=\"user\">";
            echo "<button type=\"submit\" name=\"new_film-submit\">Hinzufügen</button>";
            echo "</form>";

            // ausgabe
            echo "<table>";
            echo "<tr>";
            echo "<th>Filmtitel</th>";
            echo "<th>Genre</th>";
            echo "<th>Gesehen</th>";
            echo "<th>Bewertung (1-10)</th>";
            echo "</tr>";

            $result = getFilms($_SESSION["userName"]);

            echo "</table>";

        }
        else{
            // user nicht eingeloggt
            echo "<h2>Hallo, sieht aus als wärst du nicht eingeloggt</h2>";
            echo "<p>Klicke <a href=\"./login.php\">hier</a> um dich einzuloggen</p>";
        }
        echo "</div>";
    ?>
    <script src="./js/index_script.js"></script>
</body>
</html>