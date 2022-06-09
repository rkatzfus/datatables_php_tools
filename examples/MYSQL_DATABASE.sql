-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 09. Jun 2022 um 19:58
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
-- Tabellenstruktur für Tabelle `dropdown_table`
--

CREATE TABLE `dropdown_table` (
  `ID` mediumint NOT NULL,
  `DEL` bit(1) NOT NULL DEFAULT b'0',
  `TEXT` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `dropdown_table`
--

INSERT INTO `dropdown_table` (`ID`, `DEL`, `TEXT`) VALUES
(1, b'0', 'ONE'),
(2, b'0', 'TWO'),
(3, b'0', 'THREE'),
(4, b'0', 'FOUR'),
(5, b'0', 'FIVE'),
(6, b'0', 'SIX'),
(7, b'0', 'SEVEN'),
(8, b'0', 'EIGHT'),
(9, b'0', 'NINE');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `root_table`
--

CREATE TABLE `root_table` (
  `ID` mediumint NOT NULL,
  `DEL` bit(1) NOT NULL DEFAULT b'0',
  `TEXT_FIELD` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CHECKBOX` bit(1) NOT NULL DEFAULT b'0',
  `REF_DROPDOWN` mediumint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `root_table`
--

INSERT INTO `root_table` (`ID`, `DEL`, `TEXT_FIELD`, `CHECKBOX`, `REF_DROPDOWN`) VALUES
(1, b'0', 'ALPHA', b'0', NULL),
(2, b'0', 'BRAVO', b'0', NULL),
(3, b'0', 'CHARLIE', b'0', NULL),
(4, b'0', 'DELTA', b'0', NULL),
(5, b'0', 'ECHO', b'1', NULL),
(6, b'0', 'FOXTROT', b'0', NULL),
(7, b'0', 'GOLF', b'0', NULL),
(8, b'0', 'HOTEL', b'0', NULL),
(9, b'0', 'INDIA', b'0', NULL),
(10, b'0', 'JULIETT', b'1', NULL),
(11, b'0', 'KILO', b'1', NULL),
(12, b'0', 'LIMA', b'0', NULL),
(13, b'0', 'MIKE', b'1', NULL),
(14, b'0', 'NOVEMBER', b'0', NULL),
(15, b'0', 'OSCAR', b'0', NULL),
(16, b'0', 'PAPA', b'0', NULL),
(17, b'0', 'QUEBEC', b'0', NULL),
(18, b'0', 'ROMEO', b'0', NULL),
(19, b'0', 'SIERRA', b'0', NULL),
(20, b'0', 'TANGO', b'0', NULL),
(21, b'0', 'UNIFORM', b'0', NULL),
(22, b'0', 'VICTOR', b'0', NULL),
(23, b'0', 'WHISKEY', b'0', NULL),
(24, b'0', 'XRAY', b'0', NULL),
(25, b'0', 'YANKEE', b'0', NULL),
(26, b'0', 'ZULU', b'0', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dropdown_table`
--
ALTER TABLE `dropdown_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `root_table`
--
ALTER TABLE `root_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dropdown_table`
--
ALTER TABLE `dropdown_table`
  MODIFY `ID` mediumint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `root_table`
--
ALTER TABLE `root_table`
  MODIFY `ID` mediumint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
