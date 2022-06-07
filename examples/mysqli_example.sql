-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 07. Jun 2022 um 17:25
-- Server-Version: 8.0.28
-- PHP-Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `MYSQL_DATABASE`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `root_table`
--

CREATE TABLE `root_table` (
  `ID` mediumint NOT NULL,
  `DEL` bit(1) NOT NULL DEFAULT b'0',
  `NAME` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `root_table`
--

INSERT INTO `root_table` (`ID`, `DEL`, `NAME`) VALUES
(1, b'0', 'ALPHA'),
(2, b'0', 'BRAVO'),
(3, b'0', 'CHARLIE'),
(4, b'0', 'DELTA'),
(5, b'0', 'ECHO'),
(6, b'0', 'FOXTROT'),
(7, b'0', 'GOLF'),
(8, b'0', 'HOTEL'),
(9, b'0', 'INDIA'),
(10, b'0', 'JULIETT'),
(11, b'0', 'KILO'),
(12, b'0', 'LIMA'),
(13, b'0', 'MIKE'),
(14, b'0', 'NOVEMBER'),
(15, b'0', 'OSCAR'),
(16, b'0', 'PAPA'),
(17, b'0', 'QUEBEC'),
(18, b'0', 'ROMEO'),
(19, b'0', 'SIERRA'),
(20, b'0', 'TANGO'),
(21, b'0', 'UNIFORM'),
(22, b'0', 'VICTOR'),
(23, b'0', 'WHISKEY'),
(24, b'0', 'XRAY'),
(25, b'0', 'YANKEE'),
(26, b'0', 'ZULU'),


--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `root_table`
--
ALTER TABLE `root_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `root_table`
--
ALTER TABLE `root_table`
  MODIFY `ID` mediumint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
