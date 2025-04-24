-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mei 2023 om 20:02
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp-tech`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `BestellingNummer` int(11) NOT NULL,
  `KlantNummer` int(11) NOT NULL,
  `Naam` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Postcode` varchar(5) NOT NULL,
  `Gemeente` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Merk` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Prijs` int(11) NOT NULL,
  `Hoeveelheid` int(11) NOT NULL,
  `Aankoopdag` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`BestellingNummer`, `KlantNummer`, `Naam`, `Email`, `Postcode`, `Gemeente`, `Adres`, `ProductID`, `Merk`, `Model`, `Prijs`, `Hoeveelheid`, `Aankoopdag`) VALUES
(10, 1, 'Claes Quinten', 'quintenClaes7@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 7, 'Grendia', 'FG 45', 15000, 1, '2023-05-27'),
(12, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 6, 'JLG', 'E450AJ', 9000, 1, '2023-05-28'),
(13, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 8, 'Fenwick', 'H30', 13500, 1, '2023-05-28'),
(15, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9200', 'Gent', 'boempje straat 19', 9, 'Jensen', 'A231', 15000, 1, '2023-05-28'),
(16, 1, 'Claes Quinten', 'quintenClaes7@gmail.com', '9290', 'Gent', 'boempje straat 19', 28, 'Magni', 'MJP11.5', 25250, 1, '2023-05-28'),
(17, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Gent', 'boempje straat 19', 8, 'Fenwick', 'H30', 13500, 1, '2023-05-29');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inlogklant`
--

CREATE TABLE `inlogklant` (
  `KlantNummer` int(11) NOT NULL,
  `Naam` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Wachtwoord` varchar(128) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `inlogklant`
--

INSERT INTO `inlogklant` (`KlantNummer`, `Naam`, `Email`, `Wachtwoord`, `isAdmin`) VALUES
(1, 'Claes Quinten', 'quintenClaes7@gmail.com', '$2y$10$lFn9eVhslUaFkD.R50DizuSJflJghdx4J9P4tzHQBNPF.aa79R/Ei', 1),
(2, 'Claes Quinten', 'quinten.claes@hotmail.be', '$2y$10$kCQvJU9F3jlCTkUlbfCDCuZXJwga4JbvCqNETmiVRrsdsH2Lguoq.', 0),
(3, 'Claes Quinten', 'quintenclaes10@gmail.com', '$2y$10$ecU/4gsUBf8Eir.7ilXwbe41Fl4ZGrCTP6ODWxk.IBnfPOQwRjUgm', 0),
(4, 'Claes Quinten', 'quintenClaes8@gmail.com', '$2y$10$E.dTF613SyPtEdrKzcPGeeYcLhUCJ7kZsbgpEz6JAnVtTG/Kh.WDS', 0),
(5, 'Bizzie Meer\r\n', 'bizzie_77@yahoo.com', '$2y$10$84ZkNap1iOqhT0FYLcpoe.hmQWttCU2HkTVPkP52jVTZ/3SZVtTH.', 0),
(6, 'Claes Quinten', 'quintenClaes11@gmail.com', '$2y$10$TgAIp26iD15Dgp3ECJX8qe/hhVDipHBCOnofF3pqp3Hnr3J0xlsy.', 0),
(7, 'Meer Bizzie', 'bizzie_47@yahoo.com', '$2y$10$F0WzYemnEMoaMeuTnv1ZZOLjCkHwoWM2GDUbCkKPA7lmRb4txyIuO', 0),
(8, 'Claes Quinten', 'quintenClaes81@gmail.com', '$2y$10$9D36598LshNag/S50wDQ/.9qOh89.lStx6xodHJUduLwX89.8Mc0C', 0),
(9, 'Claes Quinten', 'quintenClaes12@gmail.com', '$2y$10$MqCVTapsGhi2bmcoIr7uUeYPBiWSWNZzcNS0XHfPF19rL/sOauNTe', 0),
(10, 'Depaepe Alessio', 'alessiodepaepe@gmail.com', '$2y$10$jMA4vTDI4dtSDFN0agPoLOMweQnBkWE94vqbCDafzJqXV.hBkPFX2', 1),
(11, 'Potter Harry', 'Harry.Potter@gmail.com', '$2y$10$bWoxAW6/bdHssVxjdppJ8.vYB29d3F38cK/1suLBEu1DDtaZniWJG', 0),
(13, 'Test Test', 'admin@gmail.com', '$2y$10$CzkiOm7oItEh0BGPZMSCH.9VtUBntsENkCcUxki2p8d75TTCYx7PW', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `machines`
--

CREATE TABLE `machines` (
  `ProductID` int(11) NOT NULL,
  `Soort` varchar(50) NOT NULL,
  `Merk` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Prijs` int(11) NOT NULL,
  `Gewicht` int(11) NOT NULL,
  `Bouwjaar` varchar(4) NOT NULL,
  `Aandrijving` varchar(30) NOT NULL,
  `Aankoopdag` date NOT NULL,
  `Hoeveelheid` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `machines`
--

INSERT INTO `machines` (`ProductID`, `Soort`, `Merk`, `Model`, `Prijs`, `Gewicht`, `Bouwjaar`, `Aandrijving`, `Aankoopdag`, `Hoeveelheid`, `img_path`) VALUES
(7, 'Heftruck', 'Grendia', 'FG 45', 15000, 4500, '2001', 'Diesel', '2022-12-01', 2, 'images/Machines/FG45.jpg'),
(8, 'Heftruck', 'Fenwick', 'H30', 13500, 3000, '2001', 'Diesel', '2022-12-01', 1, 'images/Machines/H30.jpg'),
(9, 'Houtversnipperaar', 'Jensen', 'A231', 15000, 1400, '2019', 'Diesel', '2022-12-01', 1, 'images/Machines/A231.jpg'),
(10, 'Heftruck', 'Yale', 'GLP30TF', 8500, 4450, '1996', 'Elektrisch', '2022-12-01', 1, 'images/Machines/GLP30TF.jpg'),
(11, 'Heftruck', 'Clark', 'C500Y', 1000, 900, '1996', 'Diesel', '2022-12-01', 1, 'images/Machines/C500Y.jpg'),
(12, 'Houtversnipperaar', 'Boxer', 'HV106', 1475, 196, '2016', 'Diesel', '2022-12-01', 1, 'images/Machines/HV106.jpg'),
(13, 'Houtversnipperaar', 'GEO', 'ECO7', 1470, 110, '2016', 'Diesel / Elektrische start', '2022-12-01', 1, 'images/Machines/ECO7.jpg'),
(14, 'Tractor', 'New Holland', 'T7040', 38800, 7400, '2010', 'Diesel', '2022-12-01', 1, 'images/Machines/T7040.jpg'),
(26, 'Hoogtewerker', 'JLG', 'E450AJ', 9000, 6565, '2005', 'Elektrisch', '2023-05-10', 2, 'images/Machines/E450AJ.jpg'),
(27, 'Hoogtewerker', 'JLG', '660SJ', 25900, 12720, '2017', 'Diesel', '2023-05-30', 1, 'images/Machines/660SJ.jpg'),
(28, 'Hoogtewerker', 'Magni', 'MJP11.5', 25250, 2950, '2023', 'Elektrisch', '2023-02-08', 1, 'images/Machines/MJP11.5.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`BestellingNummer`);

--
-- Indexen voor tabel `inlogklant`
--
ALTER TABLE `inlogklant`
  ADD PRIMARY KEY (`KlantNummer`),
  ADD KEY `Email` (`Email`);

--
-- Indexen voor tabel `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `BestellingNummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `inlogklant`
--
ALTER TABLE `inlogklant`
  MODIFY `KlantNummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `machines`
--
ALTER TABLE `machines`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
