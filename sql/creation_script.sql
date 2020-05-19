/*
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './sql/creation_script.sql'
    * Beschreibung: SQL-Script zur Herstellung der DB 'Filmtagebuch' mit dem Benutzer 'FilmtagebuchUser' und den zugehörigen Tabellen und Test-Datensätzen
*/

CREATE DATABASE Filmtagebuch;

CREATE USER 'FilmtagebuchUser'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON Filmtagebuch.* TO 'FilmtagebuchUser'@'localhost';

USE Filmtagebuch;

CREATE TABLE users(
	UID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username TINYTEXT NOT NULL,
	email TINYTEXT NOT NULL,
	pwd LONGTEXT NOT NULL
);

/* Erstellen eines Testbenutzers 'testuser' mit der email 'testuser@mail.com' und dem passwort '123456' (BCRYPT-hashwert, da dies normalerweise im PHP-script passiert) */
INSERT INTO users (username, email, pwd) VALUES ("testuser", "testuser@mail.com", "$2y$10$mODirsrEkwDa2nYXEnyKB.BG8k.vS1HKuoSKDvWu9ciB7DQ2IkF0y");

CREATE TABLE films(
	FID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title TINYTEXT NOT NULL,
	genre TINYTEXT NOT NULL,
	seen DATE NOT NULL,
	rating INT NOT NULL,
	user TINYTEXT NOT NULL
);

/* Erstellen einiger Test-Datensätze für Filmeinträge (testuser) */

INSERT INTO filme (title,genre,seen,rating,user) VALUES ("Star Wars Episode III","Sci-Fi","2020-03-20",6,"testuser");
INSERT INTO filme (title,genre,seen,rating,user) VALUES ("Pulp Fiction","Drama","2020-01-15",9,"testuser");