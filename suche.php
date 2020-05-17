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
                echo "<h2>Hallo, sieht aus als wärst du nicht eingeloggt</h2>";
                echo "<p id=\"p-link\">Klicke <a href=\"./login.php\">hier</a> um dich einzuloggen</p>";
            }
            echo "</div>";
        ?>
</body>
</html>