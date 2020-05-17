<?php
if(isset($_GET['error'])){
    echo "<div id=\"errormessage\">Error (".$_GET["error"].")</div>";
}