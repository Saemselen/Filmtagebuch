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
    <div id="login">
        <!--    Formular für Login    -->
        <form action="./scripts/login-script.php" method="post">
            <input type="text" name="uid" placeholder="Username..">
            <input type="password" name="pwd" placeholder="Password..">
            <button type="submit" name="login-submit">Login</button>
        </form>
        <!--    Link zur sign-up Seite    -->
        <p>Sie haben noch keinen Account? dann können Sie <a href="signup.php">hier</a> einen neuen Account erstellen!</p>
        <!--    Logout-Formular    -->
        <form action="scripts/logout-script.php">
            <button type="submit" name="logout-submit">Logout</button>
        </form>
    </div>
</body>
</html>