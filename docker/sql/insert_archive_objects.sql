CREATE TABLE IF NOT EXISTS `archiveObject` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) DEFAULT NULL,
    `category` varchar(50) DEFAULT NULL,
    `institution` varchar(50) DEFAULT NULL,
    `datum` date NOT NULL,
    `stav` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'Mapa Žilinského kraja 1890', 'Mapy', 'Štátny archív Žilina', '1890-01-01', 'Digitalizované'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'Mapa Žilinského kraja 1890'
);

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'Krstný list J. Kováča', 'Dokumenty', 'Farský úrad', '1923-01-01', 'Uložené'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'Krstný list J. Kováča'
);

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'Fotografia námestia', 'Fotografie', 'Mestské múzeum', '1955-01-01', 'Digitalizované'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'Fotografia námestia'
);

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'Kronika obce Terchová', 'Kroniky', 'Obecný úrad Terchová', '1932-01-01', 'Uložené'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'Kronika obce Terchová'
);

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'Plán železničnej stanice', 'Plány', 'Štátny archív Žilina', '1908-01-01', 'Digitalizované'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'Plán železničnej stanice'
);

INSERT INTO `archiveObject` (`name`, `category`, `institution`, `datum`, `stav`)
SELECT 'List richtára mestu', 'Korešpondencia', 'Mestský archív', '1876-01-01', 'Uložené'
WHERE NOT EXISTS (
    SELECT 1 FROM `archiveObject` WHERE `name` = 'List richtára mestu'
);
