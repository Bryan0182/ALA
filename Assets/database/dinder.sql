-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 apr 2022 om 10:51
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinder`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dogs`
--

CREATE TABLE `dogs` (
  `dogs_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `hondenfoto` varchar(100) NOT NULL,
  `naam` varchar(219) NOT NULL,
  `leeftijd` int(11) DEFAULT NULL,
  `ras` varchar(219) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `dogs`
--

INSERT INTO `dogs` (`dogs_ID`, `user_ID`, `hondenfoto`, `naam`, `leeftijd`, `ras`) VALUES
(7, 15, 'berner_sennen.jpg', 'Beer', 7, 'Berner Sennen'),
(8, 16, 'labrador.jpg', 'Sammy', 4, 'Labrador'),
(9, 24, 'mopshond.jpg', 'Fikkie', 4, 'Mopshond'),
(10, 18, 'golden-retriever.jpg', 'Max', 1, 'Golden Retriever'),
(11, 19, 'rottweiler.jpg', 'Spike', 3, 'Rottweiler'),
(12, 23, 'bullmastif.jpg', 'Rocky', 6, 'Bullmastif'),
(13, 20, 'finse-spits.jpg', 'Bobby', 3, 'Finse Spits');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `matches`
--

CREATE TABLE `matches` (
  `matches_ID` int(11) NOT NULL,
  `username` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `matches`
--

INSERT INTO `matches` (`matches_ID`, `username`) VALUES
(1, 'Cristina_Yang');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `profielfoto` varchar(100) NOT NULL,
  `voornaam` varchar(22) NOT NULL,
  `achternaam` varchar(22) NOT NULL,
  `woonplaats` varchar(219) NOT NULL,
  `leeftijd` int(11) NOT NULL,
  `hobbies` varchar(319) NOT NULL,
  `opzoek` varchar(319) NOT NULL,
  `gebruikersnaam` varchar(22) NOT NULL,
  `email` varchar(319) NOT NULL,
  `wachtwoord` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_ID`, `profielfoto`, `voornaam`, `achternaam`, `woonplaats`, `leeftijd`, `hobbies`, `opzoek`, `gebruikersnaam`, `email`, `wachtwoord`) VALUES
(15, 'bryan.jpg', 'Bryan', 'de Knikker', 'Reeuwijk', 17, 'Lezen, Netflixen en wijn drinken.', 'Niemand, ik ben al bezet!', 'Bryan_0182', 'bdeknikker04@gmail.com', '23129f8777ef7dbd190e341ea2eb35e7'),
(16, 'cristina.jpg', 'Cristina', 'Yang', 'Gouda', 24, 'Opereren', 'Dokter', 'Cristina_Yang', 'cristina@gmail.com', '6ad70ec29921488b300bd37b8b57ff92'),
(17, 'finn.jpg', 'Finn', 'Jansen', 'Eindhoven', 38, 'Roken en PSV', 'Brabander', 'FinnieBoy', 'finn@hotmail.com', 'c35b6ae38859263edc7ee0d91c9ff85a'),
(18, 'chantal.jpg', 'Chantal', 'Janzen', 'Amsterdam', 43, 'Presenteren en grappen maken', 'Niemand ik ben al bezet', 'Chantalleke', 'chantal@gmail.com', 'bf83f26ea48ca9135f083b6c731677e6'),
(19, 'freek.jpg', 'Freek', 'Bartels', 'Amsterdam', 35, 'Zingen en acteren', 'Een leuke, gezellige man.', 'Freek', 'freekb@gmail.com', 'f4716a20bd7686804142dae4e820df73'),
(20, 'buddy.jpg', 'Buddy', 'Vedder', 'Amsterdam', 27, 'Acteren en presenteren', 'Een leuke meid', 'BuddyV', 'buddy@gmail.com', '0d18ffb8e23dd08367e3ab6ba23f3f57'),
(21, 'harry.png', 'Harry', 'Piekema', 'Amsterdam', 62, 'Hamsteren, bonussen en hamburgers met korting', 'Iemand in de bonus', 'HarryPiek', 'harry@hotmail.com', '3f66ebeeec502726e711102887371e99'),
(22, 'jan.jpg', 'Jan', 'Versteegh', 'Amsterdam', 36, 'Lingo', 'Niemand, ben al getrouwd.', 'Jantje', 'jan@gmail.com', '9d6c4fda09498d3f0a6efd20ffce0243'),
(23, 'frank.jpg', 'Frank', 'Lammers', 'Amsterdam', 50, 'Acteren en drugs verkopen.', 'Niemand', 'Frankie', 'frank@hotmail.com', 'd1a13936d973419ba69a81428e155fac'),
(24, 'jim.png', 'Jim', 'Bakkum', 'Naarden', 34, 'Acteren en drag queen zijn', 'Niemand, ben al getrouwd.', 'Jim', 'jim@gmail.com', 'd54b3c8fcd5ba07e47b400e69a287966');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_chat_messages`
--

CREATE TABLE `user_chat_messages` (
  `message_ID` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `recipient` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_chat_messages`
--

INSERT INTO `user_chat_messages` (`message_ID`, `message_content`, `username`, `message_time`, `recipient`) VALUES
(8, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(9, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(10, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(11, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(12, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(13, 'Halo', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(14, 'Test', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(15, 'Test', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(16, 'Test', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(17, 'Hello', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(18, 'Hello', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(19, 'test', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang'),
(20, 'Heyy', 'Bryan_0182', '0000-00-00 00:00:00', 'Cristina_Yang');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`dogs_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexen voor tabel `user_chat_messages`
--
ALTER TABLE `user_chat_messages`
  ADD PRIMARY KEY (`message_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dogs`
--
ALTER TABLE `dogs`
  MODIFY `dogs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `user_chat_messages`
--
ALTER TABLE `user_chat_messages`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `dogs`
--
ALTER TABLE `dogs`
  ADD CONSTRAINT `dogs_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
