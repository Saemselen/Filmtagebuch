<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Filmtagebuch</title>
</head>
<body>
    <!--  Navigation   -->
    <header>
        <?php
                require("./nav.php");
        ?>
    </header>
    <!--    Content der Seite (Login-Formular)    -->
    <div>
        <h1>Login</h1>
        <!--    Formular für Login    -->
        <form action="./scripts/login-script.php" method="post">
            <input type="text" name="uid" placeholder="Benutzername">
            <input type="password" name="pwd" placeholder="Passwort">
            <button type="submit" name="login-submit">Anmelden</button>
        </form>
        <!--    Link zur sign-up Seite    -->
        <p>Sie haben noch keinen Account? dann können Sie <a href="signup.php">hier</a> einen neuen Account erstellen!</p>
        <!--    Logout-Formular    -->
        <form action="scripts/logout-script.php">
            <button type="submit" name="logout-submit">Abmelden</button>
        </form>
    </div>
</body>
</html>