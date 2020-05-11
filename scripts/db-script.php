<?php

$DBServername = "localhost";
$DBUsername = "root";
$DBPwd = "";
$DBName = "filmtagebuch";

$connection = mysqli_connect($DBServername,$DBUsername,$DBPwd,$DBName);

if(!$connection){
    die("Connection failed: " . mysqli_connect_error());
}