CREATE DATABASE FairytaleDatabase;

USE FairytaleDatabase;

CREATE TABLE Personaj (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NumeRol VARCHAR(50),
    Descriere VARCHAR(255)
);

CREATE TABLE Locatie (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NumeLocatie VARCHAR(50),
    Descriere VARCHAR(255)
);

CREATE TABLE Obiecte (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NumeObiect VARCHAR(50),
    Descriere VARCHAR(255),
    Stare ENUM('Folosit', 'Neutilizat')
);

CREATE TABLE Actiuni (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NumeActiune VARCHAR(50),
    Descriere VARCHAR(255)
);

CREATE TABLE DetaliiActiuni (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ActiuneID INT,
    PersonajID INT,
    ObiectID INT,
    LocatieID INT,
    FOREIGN KEY (ActiuneID) REFERENCES Actiuni(ID),
    FOREIGN KEY (PersonajID) REFERENCES Personaj(ID),
    FOREIGN KEY (ObiectID) REFERENCES Obiecte(ID),
    FOREIGN KEY (LocatieID) REFERENCES Locatie(ID)
);

INSERT INTO Personaj (NumeRol, Descriere)
VALUES ('Scufița-Roșie', 'O fată tânără cu o pelerină roșie.'),
       ('Mama', 'Mama Scufiței-Roșii.'),
       ('Lupul', 'Un lup rău.'),
       ('Tăietorul de lemne', 'Un om care taie lemne în pădure.'),
       ('Bunica', 'Bunica Scufiței-Roșii.');

INSERT INTO Locatie (NumeLocatie, Descriere)
VALUES ('Căsuța din pădure', 'Mica casă în mijlocul pădurii.'),
       ('Casa bunicii', 'Casa bunicii Scufiței-Roșii.'),
       ('Pădurea', 'Pădurea întunecată și înspăimântătoare.');
       
 INSERT INTO Obiecte (NumeObiect, Descriere, Stare)
VALUES ('Cozonac', 'Un cozonac proaspăt copt.', 'Neutilizat'),
       ('Sticlă cu vin', 'O sticlă de vin roșu.', 'Neutilizat'),
       ('Topor', 'Un topor mare și ascuțit.', 'Neutilizat'),
       ('Toporul de lemne', 'Toporul folosit pentru a tăia lemne.', 'Neutilizat');
       
 INSERT INTO Actiuni (NumeActiune, Descriere)
VALUES ('Trimis la bunica', 'Scufița-Roșie a fost trimisă să ducă cozonac bunicii.'),
       ('Întâlnire cu lupul', 'Scufița-Roșie a întâlnit lupul în pădure.'),
       ('Întâlnire cu tăietorul de lemne', 'Scufița-Roșie a întâlnit tăietorul de lemne în pădure.');

INSERT INTO DetaliiActiuni (ActiuneID, PersonajID, ObiectID, LocatieID)
VALUES (1, 1, 1, 2),  -- Scufița-Roșie trimisă la bunica cu un cozonac
       (2, 1, 3, 3),  -- Scufița-Roșie întâlnind lupul în pădure
       (3, 1, 4, 3);  -- Scufița-Roșie întâlnind tăietorul de lemne în pădure
      
      


