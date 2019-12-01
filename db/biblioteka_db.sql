-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 10:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testowa`
--

-- --------------------------------------------------------

--
-- Table structure for table `czytelnicy`
--

CREATE TABLE `czytelnicy` (
  `id_czytelnika` smallint(3) NOT NULL,
  `imie_nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `klasa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Uwagi` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `czytelnicy`
--

INSERT INTO `czytelnicy` (`id_czytelnika`, `imie_nazwisko`, `klasa`, `Uwagi`) VALUES
(2, 'Krzysztof Krywiak', 'Specjalna', NULL),
(3, 'Duszik Agnieszka', '1A', NULL),
(4, 'Kowalska Aleksandra', '1A', NULL),
(5, 'Nowak Lucyna', '1B', NULL),
(6, 'Zielona Krystyna', '1B', NULL),
(7, 'Adamska Ewa', '2A', NULL),
(8, 'Nawrocka Beata', '2A', NULL),
(9, 'Zarecka Milena', '2B', NULL),
(10, 'Mądra Ewa', '2B', NULL),
(11, 'Kaspro Irena', '3A', NULL),
(12, 'Kuli Kamila', '3A', NULL),
(13, 'Beatowska Beata', '3B', NULL),
(14, 'Waldemarski Waldemar', '3B', NULL),
(15, 'Katarzynska Katarzyna', '4A', NULL),
(16, 'Szulc Anna', '4A', NULL),
(17, 'Janińska Janina ', '4B', NULL),
(18, 'Beatowska Beata', '4B', NULL),
(19, 'Sranna Anna ', '5A', NULL),
(20, 'Srareksandra Aleksandra', '5B', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ksiazki`
--

CREATE TABLE `ksiazki` (
  `numer_inwentarza` smallint(5) NOT NULL,
  `nazwa_miejsca` varchar(75) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` decimal(15,2) NOT NULL,
  `data_wpisu` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_dowodu` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tytul` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rok_wydawca` varchar(75) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ksiazki`
--

INSERT INTO `ksiazki` (`numer_inwentarza`, `nazwa_miejsca`, `cena`, `data_wpisu`, `nr_dowodu`, `tytul`, `autor`, `rok_wydawca`) VALUES
(10001, 'Prz', '2.00', '29.III 1996', '9/96', 'Wierna rzeka', 'Henryk Sienkiewicz', '1981 W-wa KIW.'),
(10002, 'Naukowe', '2.00', '29.III 1996', '9/96', 'Niewolnica ', 'Henryk Sienkiewicz', '1986W-wa PIW'),
(10003, 'Obybczajowe', '2.00', '29.III 1996', '9/96', 'Pechowa dziewczyna', 'Henryk Sienkiewicz', '1992 W-wa Harlegin'),
(10004, 'Prz', '2.00', '29.III 1996', '9/96', 'Sprzedaj mi marzenie', 'Henryk Sienkiewicz', '1992 W-wa Harlegin');

-- --------------------------------------------------------

--
-- Table structure for table `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` mediumint(7) NOT NULL,
  `numer_inwentarza` smallint(5) NOT NULL,
  `id_czytelnika` smallint(3) NOT NULL,
  `data_wyp` date NOT NULL,
  `data_odd` date DEFAULT NULL,
  `Uwagi` char(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wypozyczenia`, `numer_inwentarza`, `id_czytelnika`, `data_wyp`, `data_odd`, `Uwagi`) VALUES
(1, 10001, 2, '2019-09-05', '2019-09-05', NULL),
(2, 10002, 3, '2019-09-05', '2019-09-05', NULL),
(3, 10003, 4, '2019-09-05', '2019-09-05', NULL),
(4, 10004, 5, '2019-09-05', '2019-09-05', NULL),
(5, 10001, 6, '2019-09-05', '2019-09-05', NULL),
(6, 10002, 7, '2019-09-05', '2019-09-05', NULL),
(7, 10003, 8, '2019-09-05', '2019-09-05', NULL),
(8, 10004, 9, '2019-09-05', '2019-09-05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `czytelnicy`
--
ALTER TABLE `czytelnicy`
  ADD PRIMARY KEY (`id_czytelnika`);

--
-- Indexes for table `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`numer_inwentarza`);

--
-- Indexes for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`),
  ADD KEY `FK_jest_wypozyczana` (`numer_inwentarza`),
  ADD KEY `FK_wypozycza_ksiazke` (`id_czytelnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `czytelnicy`
--
ALTER TABLE `czytelnicy`
  MODIFY `id_czytelnika` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `numer_inwentarza` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` mediumint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `FK_jest_wypozyczana` FOREIGN KEY (`numer_inwentarza`) REFERENCES `ksiazki` (`numer_inwentarza`),
  ADD CONSTRAINT `FK_wypozycza_ksiazke` FOREIGN KEY (`id_czytelnika`) REFERENCES `czytelnicy` (`id_czytelnika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
