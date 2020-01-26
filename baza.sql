DROP DATABASE IF EXISTS szk;

CREATE DATABASE szk;

USE szk;


CREATE TABLE Faculties
(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    symbol CHAR(5) NOT NULL UNIQUE;
    nazwa CHAR(100) NOT NULL;
)


INSERT INTO Faculties(symbol,nazwa) VALUES("W1","Architektura");
INSERT INTO Faculties(symbol,nazwa) VALUES("W2","Budownictwo");
INSERT INTO Faculties(symbol,nazwa) VALUES("W3","Chemiczny");
INSERT INTO Faculties(symbol,nazwa) VALUES("W4","Elektronika");
INSERT INTO Faculties(symbol,nazwa) VALUES("W5","Eleketryczny");
INSERT INTO Faculties(symbol,nazwa) VALUES("W6","Geoinżynieria, Górnictwo i Geologia");
INSERT INTO Faculties(symbol,nazwa) VALUES("W7","Inżynieria Środowiska");
INSERT INTO Faculties(symbol,nazwa) VALUES("W8","Informatyka i Zarządzanie");
INSERT INTO Faculties(symbol,nazwa) VALUES("W9","Mechaniczno Energetyczny");
INSERT INTO Faculties(symbol,nazwa) VALUES("W10","Mechaniczny");
INSERT INTO Faculties(symbol,nazwa) VALUES("W11","Podstawowych Problemów Techniki");
INSERT INTO Faculties(symbol,nazwa) VALUES("W12","Eleketroniki i Mikrosystemów i Fotoniki");
INSERT INTO Faculties(symbol,nazwa) VALUES("W13","Matematyki");






