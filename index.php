<!--
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './index.php'
    * Beschreibung: Startseite (Meine Filme)
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Filme | Filmtagebuch</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/index_style.css">
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
        if(isset($_SESSION["userID"])){
            // user eingeloggt
            // => tabelle mit Einträgen des Benutzers anzeigen

            // button um formular einzublenden
            echo "<button id=\"btn-show-form\" onclick=\"showForm()\">Eintrag hinzufügen</button>";

            

            // formular zum hinzufügen von Einträgen 
            echo "<form id=\"newfilmform\" action=\"./scripts/new_film-script.php\" method=\"post\">";
            echo "<input type=\"text\" name=\"film_title\" placeholder=\"Filmtitel\">";
            echo "<p>Genre</p><select name=\"film_genre\">
                  <option value=\"Sci-Fi\">Sci-Fy</option>
                  <option value=\"Drama\">Drama</option>
                  <option value=\"Abenteuer\">Abenteuer</option>
                  <option value=\"Action\">Action</option>
                  <option value=\"Dokumentation\">Dokumentation</option>
                  <option value=\"Komödie\">Komödie</option>
                  <option value=\"Fantasy\">Fantasy</option>
                  <option value=\"Biografie\">Biografie</option>
                  </select>";
            echo "<p>Gesehen</p><input type=\"date\" name=\"film_seen\">";
            echo "<p>Bewertung (1-10)</p><input type=\"number\" name=\"film_rating\" min=\"1\" max=\"10\">";
            echo "<input type=\"hidden\" value=\"".$_SESSION["userName"]."\" name=\"user\">";
            echo "<button id=\"film-submit\" type=\"submit\" name=\"new_film-submit\">Hinzufügen</button>";
            echo "</form>";

            // ausgabe
            echo "<table>";
            echo "<tr>";
            echo "<th>Filmtitel</th>";
            echo "<th>Genre</th>";
            echo "<th>Gesehen</th>";
            echo "<th>Bewertung</th>";
            echo "</tr>";

            require("./scripts/db-script.php");

            $sql = "SELECT title,genre,seen,rating FROM films WHERE user=?";
            $stmt = mysqli_stmt_init($connection);


            // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ./index.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$_SESSION["userName"]);
                mysqli_stmt_execute($stmt);

                $res = mysqli_stmt_get_result($stmt);
                // durch array loopen
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    echo "<td>".$row["title"]."</td>";
                    echo "<td>".$row["genre"]."</td>";
                    echo "<td>".$row["seen"]."</td>";
                    echo "<td>".$row["rating"]."</td>";
                    echo "</tr>";   
                }
            }

            
            

            echo "</table>";

        }
        else{
            // user nicht eingeloggt
            echo "<h2>Hallo, sieht aus als wärst du nicht eingeloggt</h2>";
            echo "<p id=\"p-link\">Klicke <a href=\"./login.php\">hier</a> um dich einzuloggen</p>";
        }
        echo "</div>";
    ?>
    <script src="./js/index_script.js"></script>
</body>
</html>