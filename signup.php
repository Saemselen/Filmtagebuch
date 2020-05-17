<!--
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './signup.php'
    * Beschreibung: Signup-Seite
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Filmtagebuch</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/signup_style.css">
</head>
<body>
    <header>
        <?php
            require('./nav.php');
        ?>
    </header>
    <div id="content">
    <!--    Formular zur Erstellung eines neuen Accounts    -->
    
    <?php
        echo "<div id=\"signup\">";
        if(isset($_GET['uid']) && isset($_GET['mail'])){
            //Mail und uid als get-variable vorhanden => mail und uid als values einfügen
            echo "
            <form action=\"./scripts/signup-script.php\" method=\"post\">
                <h1>Sign up</h1>
                <input type=\"text\" name=\"uid\" value=\"".$_GET["uid"]."\" placeholder=\"Benutzername\">
                <input type=\"text\" name=\"mail\" value=\"".$_GET["mail"]."\" placeholder=\"E-Mail\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Passwort\">
                <input type=\"password\" name=\"pwd-repeat\" placeholder=\"Passwort wiederholen\">
                <button id=\"submit\" type=\"submit\" name=\"signup-submit\">Account erstellen</button>
            </form>";
        }
        else if(isset($_GET['uid'])){
            //Nur UID als get-variable vorhanden
            echo "
            <form action=\"./scripts/signup-script.php\" method=\"post\">
                <h1>Sign up</h1>
                <input type=\"text\" name=\"uid\" value=\"".$_GET["uid"]."\" placeholder=\"Benutzername\">
                <input type=\"text\" name=\"mail\" placeholder=\"E-Mail\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Passwort\">
                <input type=\"password\" name=\"pwd-repeat\" placeholder=\"Passwort wiederholen\">
                <button id=\"submit\" type=\"submit\" name=\"signup-submit\">Account erstellen</button>
            </form>";
        }
        else if (isset($_GET['mail'])){
            //Nur mail als get-variable vorhanden
            echo "
            <form action=\"./scripts/signup-script.php\" method=\"post\">
                <h1>Sign up</h1>
                <input type=\"text\" name=\"uid\" placeholder=\"Benutzername\">
                <input type=\"text\" name=\"mail\" value=\"".$_GET["mail"]."\" placeholder=\"E-Mail\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Passwort\">
                <input type=\"password\" name=\"pwd-repeat\" placeholder=\"Passwort wiederholen\">
                <button id=\"submit\" type=\"submit\" name=\"signup-submit\">Account erstellen</button>
            </form>";

        }
        else{
            //Keine GET-variablen => leeres Formular ausgeben
            echo "
            <form action=\"./scripts/signup-script.php\" method=\"post\">
                <h1>Sign up</h1>
                <input type=\"text\" name=\"uid\" placeholder=\"Benutzername\">
                <input type=\"text\" name=\"mail\" placeholder=\"E-Mail\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Passwort\">
                <input type=\"password\" name=\"pwd-repeat\" placeholder=\"Passwort wiederholen\">
                <button id=\"submit\" type=\"submit\" name=\"signup-submit\">Account erstellen</button>
            </form>";
        }
        echo "<p>Sie haben schon einen Account? dann können Sie sich <a href=\"login.php\">hier</a> anmelden!</p>";
        echo "</div>";
    ?>
        
        
    </div>
</body>
</html>