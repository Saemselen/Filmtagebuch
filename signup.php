<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Filmtagebuch</title>
</head>
<body>
    <header>
        <?php
            require('./nav.php');
        ?>
    </header>
    <div>
        <!--    Formular zur Erstellung eines neuen Accounts    -->
        <h1>Sign up</h1>
        <form action="./scripts/signup-script.php" method="post">
            <input type="text" name="uid" placeholder="Benutzername">
            <input type="text" name="mail" placeholder="E-Mail">
            <input type="password" name="pwd" placeholder="Passwort">
            <input type="password" name="pwd-repeat" placeholder="Passwort wiederholen">
            <button type="submit" name="signup-submit">Account erstellen</button>
        </form>
    </div>
</body>
</html>