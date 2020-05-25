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
    <link rel="stylesheet" href="./css/search_style.css">
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
                echo "<div id=\"suche\">";
                echo "<form method=\"post\">";
                echo "<input id=\"i-search\" name=\"search-title\" type=\"text\" placeholder=\"Filmtitel, Genre, Datum oder Bewertung suchen\">";
                echo "<button id=\"i-button\"name=\"search-submit\" type=\"submit\">Suchen</button>";
                echo "</form>";

                echo "</div>";

                if(isset($_POST["search-submit"])){
                    if(empty($_POST["search-title"])){
                        header("Location: ./suche.php?error=emptyinputs");
                    }
                    else{
                        // ausgabe
            
                        echo "<table id=\"results-table\">";
                        echo "<tr id=\"tr01\">";
                        echo "<th>Filmtitel</th>";
                        echo "<th>Genre</th>";
                        echo "<th>Gesehen</th>";
                        echo "<th>Bewertung</th>";
                        echo "</tr>";

                        require("./scripts/db-script.php");

                        $searchstring = "%".$_POST["search-title"]."%";
                        
                        $sql = "SELECT fid,title,genre,seen,rating FROM films WHERE title LIKE ? OR genre like ? OR seen like ? OR rating LIKE ?";
                        $stmt = mysqli_stmt_init($connection);

                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("Location: ./suche.php?error=sqlerror");
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt,"ssss",$searchstring,$searchstring,$searchstring,$searchstring);
                            mysqli_stmt_execute($stmt);

                            $res = mysqli_stmt_get_result($stmt);
                            
                            while($row = mysqli_fetch_assoc($res)){
                                echo "<tr>";
                                echo "<td>".$row["title"]."</td>";
                                echo "<td>".$row["genre"]."</td>";
                                echo "<td>".$row["seen"]."</td>";
                                echo "<td>".$row["rating"]."</td>";
                                echo "<td display=\"none\" class=\"entry\"></td>";
                                echo "</tr>";   
                            }
                        }
                        echo "</table>";
                        
                        echo "<div id=\"noresults-label\">";
                        echo "<p>Huch, sieht aus als würde deine Suche keine Resultate zurückliefern, versuche etwas anderes zu suchen!</p>";
                        echo "</div>";

                        // SQL-Verbidung beenden
                        mysqli_stmt_close($stmt);
                        mysqli_close($connection);

                    }
                }
            }
            else{
                // user nicht eingeloggt
                echo "<h2>Huch, sieht aus als wärst du nicht angemeldet</h2>";
                echo "<p id=\"p-link\">Klicke <a href=\"./login.php\">hier</a> um dich anzumelden</p>";
            }
            echo "</div>";
        ?>
        <script src="./js/suche_script.js"></script>
</body>
</html>