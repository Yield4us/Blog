-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2014 at 04:29 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `cookie` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `cookie`) VALUES
(1, 'yield@gmail.com', '202cb962ac59075b964b07152d234b70', 'e426160c6ba73eff60d508b41cde5a11'),
(2, 'myemail@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2c3b4997c0e1d9be89434c5c731d5582'),
(3, 'my@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6a3181f9b2addf178d3e67cd4fe4572b');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `author` varchar(60) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `author`, `text`) VALUES
(3, 5, 'Yield', 'Asd'),
(4, 5, 'Yield', 'Termainte'),
(5, 4, 'Yield', 'Ogo, krut'''),
(6, 4, 'Yield', 'Termiante');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `ctime` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `post` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `ctime`, `title`, `post`) VALUES
(1, 1, 123, 'Never Give Up', 'The text of post'),
(4, 2, 1393616867, 'Our last night', 'Lorem ipsum sot amet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
