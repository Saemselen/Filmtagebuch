<!--
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './login.php'
    * Beschreibung: Login-Seite
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Filmtagebuch</title>
    <link rel="stylesheet" href="./css/login_style.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <!--  Navigation   -->
    <header>
        <?php
                require("./nav.php");
                if(isset($_SESSION["userID"])){
                    header("Location: index.php");
                    exit();
                }
        ?>
    </header>
    <!--    Content der Seite (Login-Formular)    -->
    <div id="content">
        <div id="login">
            <?php
                require("./scripts/error_handler.php");
            ?>
            <!--    Formular für Login    -->
            <form action="./scripts/login-script.php" method="post">
                <h1>Login</h1>    
                <input type="text" name="mailuid" placeholder="Benutzername / E-Mail">
                <input type="password" name="pwd" placeholder="Passwort">
                <button id="submit" type="submit" name="login-submit">Anmelden</button>
            </form>
            <!--    Link zur sign-up Seite    -->
            <p>Du hast noch keinen Account? Dann kannst du <a href="signup.php">hier</a> einen neuen Account erstellen!</p>
        </div>
    </div>
</body>
</html>