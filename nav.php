<?php 
    session_start();
?>
<nav>
    <ul>
        <li><a href="./index.php">Meine Filme</a></li>
        <li><a href="./suche.php">Suche</a></li>
        <li id="nav-login"><a href="./login.php">Login</a></li>
        <!-- Benutzername wird angezeigt falls angemeldet -->
        
            <?php
                if(isset($_SESSION["userID"])){
                    //user eingeloggt
                    echo "<script type=\"text/javascript\">document.getElementById(\"nav-login\").style.display = \"none\";</script>";
                    echo "<li><a href=\"./user.php\">" . $_SESSION["userName"] . "</a></li>";
                }
                else{
                    //user nicht eingeloggt
                    echo "<script type=\"text/javascript\">document.getElementById(\"nav-login\").style.display = \"block\";</script>";
                }
                
            ?>
        
    </ul>
</nav>