-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 08:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerpower`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikelcode` int(11) NOT NULL,
  `artikel` varchar(20) NOT NULL,
  `prijs` double(4,2) NOT NULL,
  `product_image` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikelcode`, `artikel`, `prijs`, `product_image`) VALUES
(1, 'Hedera Helix', 1.50, 'hedera-helix.jpg'),
(2, 'Prunus', 1.10, 'prunus.jpg'),
(3, 'Rododendron', 1.99, 'rododendron.jpg'),
(4, 'Rode roos', 1.00, 'roos.jpg'),
(5, 'Tulp', 1.20, 'oranje-tulpen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `artikelcode` int(11) NOT NULL,
  `winkelcode` int(4) NOT NULL,
  `aantal` int(4) NOT NULL,
  `klantcode` int(11) NOT NULL,
  `medewerkerscode` int(6) DEFAULT NULL,
  `afgehaald` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`artikelcode`, `winkelcode`, `aantal`, `klantcode`, `medewerkerscode`, `afgehaald`) VALUES
(3, 2, 5, 3, 2, 1),
(1, 3, 2, 3, 3, 1),
(4, 1, 2, 2, 1, 1),
(5, 1, 10, 2, 1, 1),
(5, 4, 10, 5, 2, 1),
(3, 4, 12, 1, 3, 1),
(5, 2, 3, 4, 2, 1),
(3, 4, 15, 2, 1, 1),
(4, 1, 4, 7, 1, 0),
(5, 3, 13, 8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `factuurnummer` int(11) NOT NULL,
  `factuurdatum` date NOT NULL,
  `klantcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factuur`
--

INSERT INTO `factuur` (`factuurnummer`, `factuurdatum`, `klantcode`) VALUES
(1, '2017-02-08', 3),
(2, '2017-02-06', 1),
(3, '2017-02-09', 7),
(4, '2017-01-03', 5),
(5, '2017-02-08', 4),
(6, '2017-02-03', 2),
(7, '2017-02-09', 6),
(8, '2017-02-06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `factuurregel`
--

CREATE TABLE `factuurregel` (
  `factuurnummer` int(11) NOT NULL,
  `artikelcode` int(11) NOT NULL,
  `aantal` int(4) NOT NULL,
  `prijs` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factuurregel`
--

INSERT INTO `factuurregel` (`factuurnummer`, `artikelcode`, `aantal`, `prijs`) VALUES
(1, 3, 5, 1.99),
(1, 1, 2, 1.50),
(6, 4, 2, 1.00),
(4, 5, 10, 1.20),
(3, 4, 4, 1.00),
(5, 5, 3, 1.20),
(3, 4, 7, 1.00),
(6, 2, 10, 1.10),
(6, 3, 15, 1.99),
(2, 3, 12, 1.99),
(7, 4, 10, 1.00),
(8, 5, 13, 1.20);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klantcode` int(11) NOT NULL,
  `voorletters` varchar(5) NOT NULL,
  `tussenvoegsels` varchar(8) DEFAULT NULL,
  `roepnaam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `adres` varchar(54) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(25) NOT NULL,
  `geboortedatum` date NOT NULL,
  `gebruikersnaam` varchar(18) NOT NULL,
  `wachtwoord` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klantcode`, `voorletters`, `tussenvoegsels`, `roepnaam`, `achternaam`, `adres`, `postcode`, `woonplaats`, `geboortedatum`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'J.P.', 'van', 'Jan', 'Vliet', 'Kerkstraat 14', '3525UP', 'Utrecht', '1982-09-20', 'Jvlient', '7546cef3b7b2c9de09f6974d75473bc6'),
(2, 'P.', 'van ''t', 'Pieter', 'Heer ', 'Decemberpad 10', '1335DW', 'Almere', '1956-09-20', 'pheer', '5a105e8b9d40e1329780d62ea2265d8a'),
(3, 'J.', NULL, 'Janine', 'Petersoom', 'Stadhoudersplein 14b', '3039DR', 'Rotterdam', '1980-09-20', 'petersoom', '2c3a840325e9e76a038a1c4163cf96f9'),
(4, 'P.J.', 'der', 'Peter', 'Kinderen', 'Voorstraat 108', '8861BM', 'Harlingen', '1980-09-02', 'kinderen10', '701f33b8d1366cde9cb3822256a62c01'),
(5, 'G', 'de', 'Gerard', 'Buis', 'Dreef 70', '3075HA', 'Rotterdam', '1966-05-01', 'buisdeg2', '38b0090d5c08dd8e805aa1b6805406a3'),
(6, 'A.', NULL, 'Aard', 'Bomhoff', 'Daguerrestraat 134', '2561TV', 'Den Haag', '1954-02-02', 'Aardb', '5702790813ef1e4d190b941dabb109c6'),
(7, 'K.', NULL, 'Karel', 'Weijerman', 'Purmerland 89', '1451ME', 'Purmerland', '1983-02-01', 'gekkekarel3', 'f9e8b47bd0fdb5e98487cbb4819c9311'),
(8, 'P.', NULL, 'Pam', 'Vroon', 'Visserijstraat 128', '1976CN', 'IJmuiden', '1976-06-18', 'pam12', '90ed844ec1fc4afce3aa1b35030f8289'),
(9, 't.s.', '', 'test', 'test', 'teststraat 5', '9999pp', 'Drachten', '2000-11-29', 'testgebruiker', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerkerscode` int(5) NOT NULL,
  `voorletters` varchar(5) NOT NULL,
  `voorvoegsels` varchar(9) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `gebruikersnaam` varchar(18) NOT NULL,
  `wachtwoord` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`medewerkerscode`, `voorletters`, `voorvoegsels`, `achternaam`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'J.J.', 'Dhr', 'Jong', 'jongeJ', '00afed684e3faad607edfbd58d588b86'),
(2, 'O.T.', 'Dhr', 'veen', 'inhetveen', '00afed684e3faad607edfbd58d588b86'),
(3, 'T.', 'Mvr', 'tam', 'tammet', '00afed684e3faad607edfbd58d588b86');

-- --------------------------------------------------------

--
-- Table structure for table `winkel`
--

CREATE TABLE `winkel` (
  `winkelcode` int(4) NOT NULL,
  `winkelnaam` varchar(20) NOT NULL,
  `winkeladres` varchar(54) NOT NULL,
  `winkelpostcode` varchar(6) NOT NULL,
  `winkelplaats` varchar(25) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `winkel`
--

INSERT INTO `winkel` (`winkelcode`, `winkelnaam`, `winkeladres`, `winkelpostcode`, `winkelplaats`, `telefoonnummer`) VALUES
(1, 'FlowerPower', 'Grootzand 27', '8601AR', 'Sneek', '0515992831'),
(2, 'FlowerPower Speciaal', 'Kerkstraat 6', '9101LG', 'Dokkum', '0519220938'),
(3, 'FlowerPower Blom', 'Noorderbuurt 31', '9203AL', 'Drachten', '0512883923'),
(4, 'FlowerPower City', 'Naauw 5', '8911HW', 'Leeuwarden', '0582561969'),
(5, 'FlowerPower Veen', 'Dracht 69', '8442BL', 'Heerenveen', '0513654961');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelcode`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD KEY `winkelcode` (`winkelcode`),
  ADD KEY `klantcode` (`klantcode`),
  ADD KEY `medewerkerscode` (`medewerkerscode`),
  ADD KEY `artikelcode` (`artikelcode`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuurnummer`),
  ADD KEY `klantcode` (`klantcode`);

--
-- Indexes for table `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD KEY `factuurnummer` (`factuurnummer`),
  ADD KEY `artikelcode` (`artikelcode`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantcode`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerkerscode`);

--
-- Indexes for table `winkel`
--
ALTER TABLE `winkel`
  ADD PRIMARY KEY (`winkelcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `factuurnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klantcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerkerscode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `winkel`
--
ALTER TABLE `winkel`
  MODIFY `winkelcode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`klantcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`artikelcode`) REFERENCES `artikel` (`artikelcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bestelling_ibfk_3` FOREIGN KEY (`medewerkerscode`) REFERENCES `medewerker` (`medewerkerscode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bestelling_ibfk_4` FOREIGN KEY (`winkelcode`) REFERENCES `winkel` (`winkelcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`klantcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD CONSTRAINT `factuurregel_ibfk_1` FOREIGN KEY (`factuurnummer`) REFERENCES `factuur` (`factuurnummer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factuurregel_ibfk_2` FOREIGN KEY (`artikelcode`) REFERENCES `artikel` (`artikelcode`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
