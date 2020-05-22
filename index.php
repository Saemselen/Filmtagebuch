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
            // => tabelle mit Einträgen des Benutzers anzeigen (Standardmässig nach "neueste zuerst" sortiert)

            // button um formular einzublenden
            echo "<button id=\"btn-show-form\" onclick=\"showForm()\">Eintrag hinzufügen</button>";
 
            // formular zum hinzufügen von Einträgen 
            echo "<form id=\"newfilmform\" action=\"./scripts/new_film-script.php\" method=\"post\">";
            echo "<input type=\"text\" name=\"film_title\" placeholder=\"Filmtitel\">";
            echo "<p>Genre</p><select name=\"film_genre\">
                  <option value=\"Sci-Fi\">Sci-Fi</option>
                  <option value=\"Drama\">Drama</option>
                  <option value=\"Abenteuer\">Abenteuer</option>
                  <option value=\"Action\">Action</option>
                  <option value=\"Dokumentation\">Dokumentation</option>
                  <option value=\"Komödie\">Komödie</option>
                  <option value=\"Fantasy\">Fantasy</option>
                  <option value=\"Biografie\">Biografie</option>
                  <option value=\"Krimi\">Krimi</option>
                  <option value=\"Horror\">Horror</option>
                  </select>";
            echo "<p>Gesehen</p><input type=\"date\" name=\"film_seen\">";
            echo "<p>Bewertung (1-10)</p><input type=\"number\" name=\"film_rating\" min=\"1\" max=\"10\">";
            echo "<input type=\"hidden\" value=\"".$_SESSION["userName"]."\" name=\"user\">";
            echo "<button id=\"film-submit\" type=\"submit\" name=\"new_film-submit\">Hinzufügen</button>";
            echo "</form>";

            // ausgabe
            
            echo "<table id=\"results-table\">";
            echo "<form method=\"post\">";
            echo "<tr id=\"tr01\">";
            echo "<th>Filmtitel 
            <button id=\"up_title\" type=\"submit\" name=\"sort_up_title\">▲</button>
            <button id=\"down_title\" type=\"submit\" name=\"sort_down_title\">▼</button>
            </th>";
            echo "<th>Genre 
            <button id=\"up_genre\" type=\"submit\" name=\"sort_up_genre\">▲</button>
            <button id=\"down_genre\" type=\"submit\" name=\"sort_down_genre\">▼</button>
            </th>";
            echo "<th>Gesehen 
            <button id=\"up_seen\" type=\"submit\" name=\"sort_up_seen\">▲</button>
            <button id=\"down_seen\" type=\"submit\" name=\"sort_down_seen\">▼</button>
            </th>";
            echo "<th>Bewertung 
            <button id=\"up_rating\" type=\"submit\" name=\"sort_up_rating\">▲</button>
            <button id=\"down_rating\" type=\"submit\" name=\"sort_down_rating\">▼</button>
            </th>";
            echo "<th id=\"th-del\">Löschen</th>";
            echo "</form>";
            echo "</tr>";

            require("./scripts/db-script.php");


            //sortieren der ausgabe
            if(isset($_POST["sort_up_title"])){
                $sortparam = "up_title";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY title DESC";
            }
            else if(isset($_POST["sort_down_title"])){
                $sortparam = "down_title";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY title ASC";
            }
            else if(isset($_POST["sort_up_genre"])){
                $sortparam = "up_genre";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY genre DESC";
            }
            else if(isset($_POST["sort_down_genre"])){
                $sortparam = "down_genre";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY genre ASC";
            }
            else if(isset($_POST["sort_up_seen"])){
                $sortparam = "up_seen";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY seen ASC";
            }
            else if(isset($_POST["sort_down_seen"])){
                $sortparam = "down_seen";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY seen DESC";
            }
            else if(isset($_POST["sort_up_rating"])){
                $sortparam = "up_rating";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY rating ASC";
            }
            else if(isset($_POST["sort_down_rating"])){
                $sortparam = "down_rating";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=? ORDER BY rating DESC";
            }
            else{
                $sortparam = "default";
                $sql = "SELECT title,genre,seen,rating FROM films WHERE user=?";
            }

            require("./scripts/sql_connection.php");
            $stmt = mysqli_stmt_init($connection);

            if(isset($sortparam) && $sortparam != "default"){
                echo "<script>";
                echo "document.getElementById(\"$sortparam\").style.color = \"rgb(235, 123, 123)\";";
                echo "</script>";
            }

            // Überprüfen ob SQL Anfrage nicht funktioniert (error=sqlerror)
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ./index.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$_SESSION["userName"]);
                mysqli_stmt_execute($stmt);

                $res = mysqli_stmt_get_result($stmt);
                // durch sql array loopen
                
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    echo "<form method=\"post\" action=\"./scripts/remove_entry-script.php?e_title=".$row["title"]."\">";
                    echo "<td>".$row["title"]."</td>";
                    echo "<td>".$row["genre"]."</td>";
                    echo "<td>".$row["seen"]."</td>";
                    echo "<td>".$row["rating"]."</td>";
                    echo "<td><button name=\"remove-entry-submit\" type=\"submit\">⛔</button></td></form>";
                    echo "<td display=\"none\" class=\"entry\"></td>";
                    echo "</tr>";   

                }
                echo "</table>";


                // !!! Hie wird eifach nüt meh glade
                echo "<div id=\"noresults-label\">";
                echo "<p>Huch, sieht aus als hättest du noch keine Filme eingetragen.</p>";
                echo "</div>";
            }


            // SQL-Verbidung beenden
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
        }
        else{
            // user nicht eingeloggt
            echo "<h2>Huch, sieht aus als wärst du nicht angemeldet</h2>";
            echo "<p id=\"p-link\">Klicke <a href=\"./login.php\">hier</a> um dich anzumelden</p>";
        }
        echo "</div>";
    ?>
    <script src="./js/index_script.js"></script>
</body>
</html>