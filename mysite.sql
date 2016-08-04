-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 08:02 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(300) COLLATE utf8_bin NOT NULL,
  `title_sr` varchar(300) COLLATE utf8_bin NOT NULL,
  `title_bg` varchar(300) COLLATE utf8_bin NOT NULL,
  `summary_en` varchar(1000) COLLATE utf8_bin NOT NULL,
  `summary_sr` varchar(1000) COLLATE utf8_bin NOT NULL,
  `summary_bg` varchar(1000) COLLATE utf8_bin NOT NULL,
  `text_en` text COLLATE utf8_bin NOT NULL,
  `text_sr` text COLLATE utf8_bin NOT NULL,
  `text_bg` text COLLATE utf8_bin NOT NULL,
  `time` datetime DEFAULT NULL,
  `tags` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tagovi` (`tags`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `short_sr` text COLLATE utf8_bin NOT NULL,
  `short_en` text COLLATE utf8_bin NOT NULL,
  `short_bg` text COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(300) COLLATE utf8_bin NOT NULL,
  `pictures` varchar(5000) COLLATE utf8_bin NOT NULL,
  `long_sr` text COLLATE utf8_bin NOT NULL,
  `long_en` text COLLATE utf8_bin NOT NULL,
  `lont_bg` text COLLATE utf8_bin NOT NULL,
  `github` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `demo` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
