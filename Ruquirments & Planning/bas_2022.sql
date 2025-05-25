-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 mei 2025 om 20:57
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bas_2022`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikelen`
--

CREATE TABLE `artikelen` (
  `artikel_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  `voorraad` int(11) DEFAULT NULL,
  `minimum_voorraad` int(11) DEFAULT NULL,
  `maximum_voorraad` int(11) DEFAULT NULL,
  `locatie` varchar(50) DEFAULT NULL,
  `leverancier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikelen`
--

INSERT INTO `artikelen` (`artikel_id`, `naam`, `omschrijving`, `prijs`, `voorraad`, `minimum_voorraad`, `maximum_voorraad`, `locatie`, `leverancier_id`) VALUES
(1, 'Aardbeienjam', 'Pot van 500g', 2.50, 8, 10, 100, 'Stelling A1', 1),
(2, 'Afwasmiddel', 'Fles 1L', 1.80, 50, 15, 100, 'Stelling B2', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inkooporders`
--

CREATE TABLE `inkooporders` (
  `inkooporder_id` int(11) NOT NULL,
  `artikel_id` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `leverancier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `inkooporders`
--

INSERT INTO `inkooporders` (`inkooporder_id`, `artikel_id`, `aantal`, `datum`, `leverancier_id`) VALUES
(1, 1, 92, '2025-05-25 20:44:26', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klant_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `adres` varchar(200) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `telefoon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klant_id`, `naam`, `adres`, `postcode`, `telefoon`) VALUES
(1, 'Jan Jansen', 'Bergweg 10, Rotterdam', '3037AB', '0612345678'),
(2, 'Anna de Vries', 'Hoofdstraat 22, Rotterdam', '3054CD', '0687654321');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leveranciers`
--

CREATE TABLE `leveranciers` (
  `leverancier_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefoon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leveranciers`
--

INSERT INTO `leveranciers` (`leverancier_id`, `naam`, `email`, `telefoon`) VALUES
(1, 'Voeding BV', 'info@voedingbv.nl', '010-1234567'),
(2, 'NonFood Supplies', 'contact@nonfood.nl', '010-7654321');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verkooporderregels`
--

CREATE TABLE `verkooporderregels` (
  `regel_id` int(11) NOT NULL,
  `verkooporder_id` int(11) DEFAULT NULL,
  `artikel_id` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `verkooporderregels`
--

INSERT INTO `verkooporderregels` (`regel_id`, `verkooporder_id`, `artikel_id`, `aantal`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 2, 2, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verkooporders`
--

CREATE TABLE `verkooporders` (
  `verkooporder_id` int(11) NOT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `verkooporders`
--

INSERT INTO `verkooporders` (`verkooporder_id`, `klant_id`, `datum`, `status`) VALUES
(1, 1, '2025-05-25 20:44:26', 'Bezorgd'),
(2, 2, '2025-05-25 20:44:26', 'Onderweg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `leverancier_id` (`leverancier_id`);

--
-- Indexen voor tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`inkooporder_id`),
  ADD KEY `artikel_id` (`artikel_id`),
  ADD KEY `leverancier_id` (`leverancier_id`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`leverancier_id`);

--
-- Indexen voor tabel `verkooporderregels`
--
ALTER TABLE `verkooporderregels`
  ADD PRIMARY KEY (`regel_id`),
  ADD KEY `verkooporder_id` (`verkooporder_id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indexen voor tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`verkooporder_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `inkooporder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `leverancier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `verkooporderregels`
--
ALTER TABLE `verkooporderregels`
  MODIFY `regel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  MODIFY `verkooporder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `artikelen`
--
ALTER TABLE `artikelen`
  ADD CONSTRAINT `artikelen_ibfk_1` FOREIGN KEY (`leverancier_id`) REFERENCES `leveranciers` (`leverancier_id`);

--
-- Beperkingen voor tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD CONSTRAINT `inkooporders_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikelen` (`artikel_id`),
  ADD CONSTRAINT `inkooporders_ibfk_2` FOREIGN KEY (`leverancier_id`) REFERENCES `leveranciers` (`leverancier_id`);

--
-- Beperkingen voor tabel `verkooporderregels`
--
ALTER TABLE `verkooporderregels`
  ADD CONSTRAINT `verkooporderregels_ibfk_1` FOREIGN KEY (`verkooporder_id`) REFERENCES `verkooporders` (`verkooporder_id`),
  ADD CONSTRAINT `verkooporderregels_ibfk_2` FOREIGN KEY (`artikel_id`) REFERENCES `artikelen` (`artikel_id`);

--
-- Beperkingen voor tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD CONSTRAINT `verkooporders_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`klant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
