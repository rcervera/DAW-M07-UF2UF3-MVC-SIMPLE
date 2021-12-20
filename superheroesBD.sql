DROP TABLE heroes;
CREATE TABLE heroes (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  realname varchar(75) NOT NULL,
  heroname varchar(50) NOT NULL,
  gender varchar(10) NOT NULL,
  race varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO heroes (id, realname, heroname, gender, race) VALUES
(1, 'Bruce Banner', 'Hulk', 'male', 'human'),
(2, 'Tony Stark', 'Iron Man', 'male', 'human'),
(3, 'Peter Parker', 'Spider-Man', 'male', 'human'),
(4, 'Thor Odinson', 'Thor', 'male', 'Asgardian'),
(5, 'Natasha Romanoff', 'Black Widow', 'female', 'human');

DROP TABLE superpowers;
CREATE TABLE superpowers (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  description varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO superpowers (description) VALUES
('Accelerated Healing'),
('Berserk Mode'),
('Bloodlust'),
( 'Cold Resistance'),
( 'Durability'),
( 'Electricity Resistance'),
('Emotional Power Up'),
('Endurance'),
('Energy Resistance'),
( 'Fire Resistance'),
( 'Gamma Mutant Physiology'),
('Heat Resistance'),
( 'Hellfire Resistance'),
( 'Insanity'),
( 'Intelligence'),
( 'Invulnerability'),
( 'Radiation Absorption'),
( 'Radiation Control'),
( 'Radiation Immunity'),
( 'Rage Power'),
( 'Reactive Power Level'),
( 'Regeneration'),
( 'Seismic Power'),
( 'Stamina'),
( 'Super Speed'),
( 'Super Strength'),
( 'Agility'),
( 'Danger Sense'),
( 'Durability'),
( 'Intelligence'),
( 'Peak Human Condition'),
( 'Reflexes'),
( 'Stamina'),
( 'Substance Secretion'),
( 'Super Speed'),
( 'Super Strength'),
( 'Wallcrawling'),
( 'Web Creation'),
( 'Acrobatics');

DROP TABLE heroeshabilities;
CREATE TABLE `heroeshabilities` (
  `idheroe` int(11) NOT NULL,
  `idpower` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `heroeshabilities`
  ADD PRIMARY KEY (`idheroe`,`idpower`),
  ADD KEY `idpower` (`idpower`);


ALTER TABLE `heroeshabilities`
  ADD CONSTRAINT `heroeshabilities_ibfk_1` FOREIGN KEY (`idheroe`) REFERENCES `heroes` (`id`),
  ADD CONSTRAINT `heroeshabilities_ibfk_2` FOREIGN KEY (`idpower`) REFERENCES `superpowers` (`id`);



INSERT INTO heroeshabilities (idheroe, idpower, level) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(2, 4, NULL),
(2, 5, NULL),
(2, 6, NULL),
(3, 17, NULL),
(3, 20, NULL),
(3, 21, NULL),
(4, 32, NULL),
(5, 23, NULL),
(5, 26, NULL),
(5, 29, NULL),
(5, 32, NULL),
(5, 30, NULL),
(5, 24, NULL),
(5, 34, NULL);

CREATE TABLE usuaris (
  nom varchar(25) NOT NULL,
  cognoms varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  username varchar(25) NOT NULL PRIMARY KEY,
  password varchar(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuaris` (`nom`, `cognoms`, `email`, `username`, `password`) VALUES ('enric', 'Pou Ponts', 'ponts@vidalibarraquer.net', 'enric', MD5('z67yeeui'));

ALTER TABLE superpowers ADD (mesura VARCHAR(25));

CREATE TABLE mesures (nom VARCHAR(25) PRIMARY KEY);
insert into mesures(nom) values("km/h");
insert into mesures(nom) values("km");
insert into mesures(nom) values("jules");
insert into mesures(nom) values("watts");

ALTER TABLE heroes ADD (puntuacio INT(3));
UPDATE heroes set puntuacio = 0;