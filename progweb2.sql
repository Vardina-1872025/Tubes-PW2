-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 12:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `idalbums` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `releasedate` date NOT NULL,
  `producers` varchar(100) NOT NULL,
  `artists_idartists` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`idalbums`, `title`, `releasedate`, `producers`, `artists_idartists`, `cover`) VALUES
(1, 'Remember', '2008-11-05', 'Yang Hyun-Suk', 3, ''),
(2, 'The Boys', '2011-10-19', 'Leeo Soo-Man', 1, ''),
(3, 'Sorry, Sorry', '2009-03-12', 'Lee Soo-Man', 2, ''),
(4, 'Mr. Simple', '2011-09-19', 'Lee Soo-Man', 2, ''),
(5, 'How You Like That', '2020-07-19', 'Teddy Park', 12, ''),
(16, 'Ice Cream', '2020-08-20', 'Teddy Park', 12, 'Ice Cream.png'),
(22, 'test default', '2020-07-07', 'Dinda', 2, 'default.jpg'),
(23, 'Test2', '2020-11-23', '', 2, 'Test2.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `idartists` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `debut` date NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`idartists`, `name`, `debut`, `company`) VALUES
(1, 'Girls Generation', '2007-08-05', 'SM Entertainment'),
(2, 'Super Junior', '2005-11-06', 'SM Entertainment'),
(3, 'Big Bang', '2006-08-19', 'YG Entertainment'),
(12, 'Blackpink', '2016-08-08', 'YG Entertainment'),
(13, 'FX', '2009-09-01', 'SM Entertainment'),
(14, 'K-ARA', '2009-09-01', 'SM Entertainment'),
(18, 'test lagi', '2010-06-06', 'SM Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(1, 'Dinda Ayu', 'dindaayu', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`idalbums`),
  ADD KEY `fk_albums_artists_idx` (`artists_idartists`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`idartists`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `idalbums` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `idartists` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_artists` FOREIGN KEY (`artists_idartists`) REFERENCES `artists` (`idartists`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
