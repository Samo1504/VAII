-- Adminer 6.2.0 MariaDB 13.0.2-MariaDB-ubu2604 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `archiveObject`;
CREATE TABLE `archiveObject` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `name` varchar(50) NOT NULL,
                                 `category` varchar(50) DEFAULT NULL,
                                 `institution` varchar(50) DEFAULT NULL,
                                 `datum` date NOT NULL,
                                 `stav` varchar(50) NOT NULL,
                                 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `archiveObject` (`id`, `name`, `category`, `institution`, `datum`, `stav`) VALUES
                                                                                           (1,	'Mapa Žilinského kraja 1890',	'Mapy',	'Štátny archív Žilina',	'1890-01-01',	'Digitalizované'),
                                                                                           (2,	'Krstný list J. Kováča',	'Dokumenty',	'Farský úrad',	'1923-01-01',	'Uložené'),
                                                                                           (3,	'Fotografia námestia',	'Fotografie',	'Mestské múzeum',	'1955-01-01',	'Digitalizované'),
                                                                                           (4,	'Kronika obce Terchová',	'Kroniky',	'Obecný úrad Terchová',	'1932-01-01',	'Uložené'),
                                                                                           (5,	'Plán železničnej stanice',	'Plány',	'Štátny archív Žilina',	'1908-01-01',	'Digitalizované'),
                                                                                           (6,	'List richtára mestu',	'Korešpondencia',	'Mestský archív',	'1876-01-01',	'Uložené');

-- 2026-11-08 14:15:12 UTC