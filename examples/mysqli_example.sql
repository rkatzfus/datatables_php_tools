SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `test_table` (
  `ID` mediumint NOT NULL,
  `DEL` bit(1) NOT NULL DEFAULT b'0',
  `NAME` char(30) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `test_table` (`ID`, `DEL`, `NAME`) VALUES
(1, b'0', 'a'),
(2, b'0', 'b'),
(3, b'0', 'c'),
(4, b'0', 'd'),
(5, b'1', 'e'),
(6, b'0', 'f'),
(7, b'0', 'g'),
(8, b'0', 'h'),
(9, b'0', 'j'),
(10, b'0', 'i'),
(11, b'0', 'k'),
(12, b'0', 'l'),
(13, b'0', 'm'),
(14, b'0', 'n'),
(15, b'0', 'o'),
(16, b'0', 'p'),
(17, b'0', 'q'),
(18, b'0', 'r'),
(19, b'0', 's'),
(20, b'0', 't'),
(21, b'0', 'u'),
(22, b'0', 'v'),
(23, b'0', 'w'),
(24, b'0', 'x'),
(25, b'0', 'y'),
(26, b'0', 'z');

ALTER TABLE `test_table`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `test_table`
  MODIFY `ID` mediumint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

