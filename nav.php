<nav>
    <ul>
        <li><a href="./meine_filme.php">Meine Filme</a></li>
        <li><a href="./suche.php">Suche</a></li>
        <li><a href="./login.php">Login</a></li>
        <!-- Benutzername wird angezeigt falls angemeldet -->
        
            <?php
                echo "<li><a href=\"./user.php\">" . $uid . "</a></li>";
            ?>
        
    </ul>
</nav>