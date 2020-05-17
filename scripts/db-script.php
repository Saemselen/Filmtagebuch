<?php
/* 
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * File: 'db-script.php'
    * Beschreibung: Script zur Herstellung einer MySQL Datenbankverbindung
*/

$DBServername = "localhost";
$DBUsername = "FilmtagebuchUser";
$DBPwd = "123456";
$DBName = "filmtagebuch";

$connection = mysqli_connect($DBServername,$DBUsername,$DBPwd,$DBName);

if(!$connection){
    die("Connection failed: " . mysqli_connect_error());
}