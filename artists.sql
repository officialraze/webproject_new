-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 27. Nov 2018 um 21:41
-- Server-Version: 5.6.34-log
-- PHP-Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `artists`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `cover`) VALUES
(1, 'Preset Junkies EP', 'presetjunkies'),
(2, 'Purple Dragons (Dragons VIP) - Single', 'purpledragons'),
(3, 'We\'re Not Alone - EP', 'werenotalone');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `artist_name` varchar(15) DEFAULT NULL,
  `genre` varchar(18) DEFAULT NULL,
  `age` varchar(9) DEFAULT NULL,
  `popular_song` varchar(21) DEFAULT NULL,
  `listeners` varchar(10) DEFAULT NULL,
  `images` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `artist`
--

INSERT INTO `artist` (`id`, `artist_name`, `genre`, `age`, `popular_song`, `listeners`, `images`) VALUES
(1, 'Porter Robinson', 'Electronic / Dance', '26', 'Shelter', '1,426,369', 'porterrobinson'),
(2, 'Virtual Riot', 'Dubstep', '24', 'Warriors Of The Night', '696.437', 'virtualriot'),
(3, 'Panda Eyes', 'Dubstep', '22', 'Highscore', '275.751', 'pandaeyes'),
(4, 'Skrillex', 'Dubstep', '30', 'Where Are Ü Now', '12,252,003', 'skrillex'),
(5, 'Diplo', 'Electronic / Dance', '39', 'Thunderclouds', '23,300,164', 'diplo'),
(6, 'Haywyre', 'Electronic / Dance', '26', 'Do You Don\'t You', '160.633', 'haywyre'),
(7, 'Barely Alive', 'Dubstep', '25', 'Bad Thang', '405.123', 'barelyalive'),
(8, 'Marshmello', 'Future Bass', '-', 'Friends', '31,637,993', 'marshmello'),
(9, 'Tokyo Machine', 'Electronic / Dance', '-', 'Rock it', '172.91', 'tokyomachine'),
(10, 'Slushii', 'Future Bass', '21', 'There x2', '1,690,097', 'slushii'),
(11, 'Fox Stevenson', 'Dubstep', '26', 'Bulgogi', '621.019', 'foxstevenson'),
(12, 'Avicii', 'Electronic / Dance', '28 (Tod)', 'Wake Me Up', '21,255,137', 'avicii'),
(13, 'Madeon', 'Electronic / Dance', '24', 'Shelter', '1,240,586', 'madeon'),
(14, 'Excision', 'Dubstep', '32', 'Gold (Stupid Love)', '1,139,508', 'excision'),
(15, 'Ray Volpe', 'Dubstep', '21', 'Hunt Me Down', '150.9', 'rayvolpe'),
(16, 'Eliminate', 'Dubstep', '-', 'Snake Bite - VIP', '75.59', 'eliminate'),
(17, 'San Holo', 'Future Bass', '27', 'Light', '3,612,017', 'sanholo'),
(18, 'Raze.Exe', 'Future Bass', '18', 'Coffee', '11', 'razeexe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `songs`
--

CREATE TABLE `songs` (
  `artist_id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `songs`
--

INSERT INTO `songs` (`artist_id`, `song_name`, `album_id`) VALUES
(2, 'Remedy Ft. Leah Culver', 1),
(2, 'Purple Dragons (Dragons VIP)', 2),
(2, 'We\'re Not Alone', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indizes für die Tabelle `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
