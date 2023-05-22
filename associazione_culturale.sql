DROP DATABASE IF EXISTS `associazione_culturale`;
CREATE DATABASE `associazione_culturale`;
USE `associazione_culturale`;

DROP TABLE IF EXISTS `ruoli`;
CREATE TABLE IF NOT EXISTS `ruoli` (
 `id` enum ('P', 'E') NOT NULL,
 `descrizione` varchar(255) UNIQUE NOT NULL,
  PRIMARY KEY (`id`)
  );
INSERT INTO `ruoli` (`id`, `descrizione`) VALUES
('P', 'Personale'), ('E', 'Espositore');

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
 `id` enum ('D', 'F', 'S') NOT NULL,
 `descrizione` varchar(255) UNIQUE NOT NULL,
  PRIMARY KEY (`id`)
  );
INSERT INTO `categorie` (`id`, `descrizione`) VALUES
('D', 'Dipinto'), ('F', 'Fotografia'), ('S', 'Scultura');
  
DROP TABLE IF EXISTS `utenti`;
CREATE TABLE IF NOT EXISTS `utenti` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) UNIQUE NOT NULL,
 `password` varchar(255) NOT NULL,
 `id_ruolo` enum ('P', 'E') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `utenti_fk_1` FOREIGN KEY (`id_ruolo`) REFERENCES `ruoli` (`id`)
  );
  
INSERT INTO `utenti` ( `username`,`password`, `id_ruolo`)  VALUES
('mario.rossi', '$2y$10$waxs8Vd2U6XQ5DXKtsAMTuupkg7U9gnlRAA7nqEI7/rz24JXy2DmC', 'P'), 
('paolo.bianchi', '$2y$10$9jogDO0tRIvUaIRXfFdEhu0zSiY9iLddLn9higS8710xHUyQWgR6K', 'P'),
('maurizio.macchi', '$2y$10$VzxQGZp3I6wkC1Yzg1U2xe0ejUYHTTg.xZjWG9VID2liA/bL/S41S', 'E'),
('chiara.gandolfo', '$2y$10$xlJ2/Ae74XIHE2pz6iIKFu98nHANb11lqVXB2xzJv1Eg3WTP9NaGW', 'E');

  
DROP TABLE IF EXISTS `espositori`;
CREATE TABLE IF NOT EXISTS `espositori` (
 `id_espositore` int(11) NOT NULL,
 `nome` varchar(255) NOT NULL,
 `cognome` varchar(255) NOT NULL,
 `data_di_nascita` date NOT NULL,
 `luogo_di_nascita` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `qualifica` ENUM ('professionista', 'amatore', 'esperto non professionista' ) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  PRIMARY KEY (`id_espositore`),
  CONSTRAINT `espositori_fk_1` FOREIGN KEY (`id_espositore`) REFERENCES `utenti` (`id`));
  
INSERT INTO `espositori` VALUES
(3, 'Maurizio', 'Macchi', '1951-12-15', 'Varese', 'maurizio.macchi@gmail.com', 'amatore', 'CV_maurizio_macchi.pdf'), 
(4, 'Chiara', 'Gandolfo', '1983-09-03', 'Tradate', 'chiara.gandolfo@gmail.com', 'professionista', 'CV_chiara_gandolfo.pdf');
  
DROP TABLE IF EXISTS `contributi`;
CREATE TABLE IF NOT EXISTS `contributi` (
 `id_contributo` int(11) NOT NULL AUTO_INCREMENT,
 `titolo` varchar(255) NOT NULL,
 `id_espositore` int(11)  NOT NULL,
 `sintesi` varchar(2000) NOT NULL,
 `immagine` varchar(255) NOT NULL,
  `url_appprofondimento` varchar(255),
`stato` ENUM ('da visionare', 'accettato', 'rifiutato') NOT NULL,
  PRIMARY KEY (`id_contributo`),
  CONSTRAINT `contributi_fk_1` FOREIGN KEY (`id_espositore`) REFERENCES `espositori` (`id_espositore`));

INSERT INTO `contributi` (`titolo`, `id_espositore`, `sintesi`, `immagine`, `url_appprofondimento`, `stato`) VALUES
('tramonto', 3, 'tramonto a Santorini (Grecia)', 'tramonto.gpg', 'www.ttt.it', 'da visionare'), 
('alba', 3, 'alba a Santorini (Grecia)', 'alba.gpg', 'www.aaa.it', 'accettato'); 

DROP TABLE IF EXISTS `categorie_contributi`;
CREATE TABLE IF NOT EXISTS `categorie_contributi` (
	`id_contributo` int(11) NOT NULL,
    `id_categoria` enum ('D', 'F', 'S') NOT NULL,
    PRIMARY KEY (`id_contributo`, `id_categoria`),
	CONSTRAINT `categorie_contrinuti_fk_1` FOREIGN KEY (`id_contributo`) REFERENCES `contributi` (`id_contributo`),
    CONSTRAINT `categorie_contrinuti_fk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`));
    
INSERT INTO `categorie_contributi` VALUES (1, 'D');
INSERT INTO `categorie_contributi` VALUES (2, 'F');
