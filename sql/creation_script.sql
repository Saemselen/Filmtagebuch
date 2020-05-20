/*
    * Modul 151
    * Projekt Filmtagebuch
    * Samis Moser
    * Path: './sql/creation_script.sql'
    * Beschreibung: SQL-Script zur Herstellung der DB 'Filmtagebuch' mit dem Benutzer 'FilmtagebuchUser' und den zugehörigen Tabellen und Test-Datensätzen
*/
DROP DATABASE IF EXISTS Filmtagebuch;
CREATE DATABASE Filmtagebuch;

DROP USER IF EXISTS "FilmtagebuchUser"@"localhost";
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

/* Erstellen einiger Test-Datensätze für filmsinträge (testuser) */

INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Trek: Der erste Kontakt","Sci-Fi","2019-04-15",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Taxi Driver","Drama","2019-05-20",8,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Casino","Drama","2019-10-12",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Scarface","Krimi","2019-12-19",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode I","Sci-Fi","2019-12-20",4,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode II","Sci-Fi","2019-12-21",3,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode III","Sci-Fi","2019-12-22",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode IV","Sci-Fi","2019-12-24",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode V","Sci-Fi","2019-12-25",10,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Wars Episode VI","Sci-Fi","2019-12-31",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Pulp Fiction","Drama","2020-01-10",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Reservoir Dogs","Drama","2020-02-05",8,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Django Unchained","Drama","2020-02-29",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Kill Bill Volume I","Action","2020-03-12",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Kill Bill Volume II","Action","2020-03-13",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Baby Driver","Action","2020-03-29",8,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Mac and devin go to high school","Komödie","2020-04-20",6,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Star Trek II: Der Zorn des Khan","Sci-Fi","2020-04-28",7,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Avengers: Infinity war","Action","2020-04-30",6,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Avengers: Endgame","Action","2020-05-01",8,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("The Irishman","Drama","2020-05-05",9,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("1917","Action","2020-05-12",8,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Solo: A Star Wars story","Sci-Fi","2020-05-15",4,"testuser");
INSERT INTO films (title,genre,seen,rating,user) VALUES ("Get Out","Horror","2020-05-20",9,"testuser");




