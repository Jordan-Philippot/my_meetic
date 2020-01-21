CREATE TABLE membre (
    id_membre INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_loisir INT UNSIGNED NOT NULL,
    id_ville INT UNSIGNED NOT NULL,
    nom VARCHAR(60) NOT NULL,
    prenom VARCHAR(60) NOT NULL,
    date_naissance DATE NOT NULL,
    genre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(150) NOT NULL,
    date_inscription DATETIME NOT NULL,
    etat INT UNSIGNED NOT NULL,
 
    PRIMARY KEY (id_membre)
)
ENGINE=INNODB;



INSERT INTO membre (id_membre, id_loisir, id_ville, nom, prenom, date_naissance, genre, email, password, date_inscription, etat) VALUES
('1', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art'),
('1', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art', 'art');


______________________________________________________________


CREATE TABLE loisir (
    id_loisir INT UNSIGNED NOT NULL,
    nom_loisir VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_loisir)
)
ENGINE=INNODB;



INSERT INTO loisir (id_loisir, nom_loisir) VALUES
('1', 'art'),
('2', 'benevolat'),
('3', 'bien_etre'),
('4', 'culture'),
('5', 'danse'),
('6', 'film'),
('7', 'gastronomie'),
('8', 'informatique'),
('9', 'litterature'),
('10', 'meditation'),
('11', 'musique'),
('12', 'sport'),
('13', 'technologie'),
('14', 'voyage');

____________________________________________________________________________



CREATE TABLE ville (
    id_ville INT UNSIGNED NOT NULL,
    nom_ville VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_ville)
)
ENGINE=INNODB;



INSERT INTO ville (id_ville, nom_ville) VALUES
('1', 'angers'),
('2', 'bordeaux'),
('3', 'dijon'),
('4', 'grenoble'),
('5', 'lille'),
('6', 'limoges'),
('7', 'lyon'),
('8', 'marseille'),
('9', 'montpellier'),
('10', 'nantes'),
('11', 'nice'),
('12', 'paris'),
('13', 'rennes'),
('14', 'strasbourg'),
('15', 'toulon');


____________________________________________________________



CREATE TABLE loisir_membre (
    id_membres INT UNSIGNED NOT NULL,
    id_loisirs INT UNSIGNED NOT NULL
)
ENGINE=INNODB;



loisir: 

art
benevolat
bien_etre
bricolage
culture
danse
film
gastronomie
informatique
litterature
meditation
musique
sport
technologie
voyage


Ville: 

angers
bordeaux
dijon
grenoble
lens
lille
limoges
lyon
marseille
montpellier
nantes
nice
paris
rennes
strasbourg
toulon















