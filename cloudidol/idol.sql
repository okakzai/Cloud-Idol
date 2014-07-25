-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 11:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `idol`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(6) NOT NULL,
  `password` varchar(6) NOT NULL,
  `bahasa` varchar(30) NOT NULL DEFAULT '0',
  `link` varchar(6) NOT NULL DEFAULT '0',
  `lokasi` varchar(30) NOT NULL DEFAULT 'Jakarta',
  `photo` varchar(70) NOT NULL DEFAULT 'http://localhost/cloud.idol/images/profile.gif',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `email`, `username`, `password`, `bahasa`, `link`, `lokasi`, `photo`) VALUES
(1, 'Zainal Abidin', 'kakzai@gmail.com', 'usersa', '123456', '0', '0', 'Jakarta', 'http://localhost/cloudidol/images/profile.gif');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(6) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `perusahaan` varchar(30) NOT NULL,
  `univ` varchar(30) NOT NULL,
  `sma` varchar(30) NOT NULL,
  `smp` varchar(30) NOT NULL,
  `musik` varchar(30) NOT NULL,
  `buku` varchar(30) NOT NULL,
  `film` varchar(30) NOT NULL,
  `tv` varchar(30) NOT NULL,
  `game` varchar(30) NOT NULL,
  `domisili` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL DEFAULT '0',
  `about` varchar(70) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kodepos` varchar(7) NOT NULL,
  `web` varchar(30) NOT NULL,
  `id_im` varchar(30) NOT NULL DEFAULT '-',
  `name_im` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `username`, `tanggal`, `perusahaan`, `univ`, `sma`, `smp`, `musik`, `buku`, `film`, `tv`, `game`, `domisili`, `asal`, `gender`, `about`, `telp`, `alamat`, `kota`, `kodepos`, `web`, `id_im`, `name_im`) VALUES
(1, 'usersa', '07/01/2014', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '-', '0');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(6) NOT NULL,
  `song` varchar(70) NOT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `username`, `song`) VALUES
(1, 'usersa', 'http://localhost/cloudidol/uploads/song/Sunset.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(6) NOT NULL,
  `status` varchar(150) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_nickname` varchar(20) NOT NULL,
  `user_web` varchar(100) NOT NULL,
  `user_logincount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_nickname`, `user_web`, `user_logincount`) VALUES
(1, 'admin', '*64FB9F1367706163338F2945F41DB219FE8EFA47', 'Administrator', 'Admin', 'http://blog.putraweb.net/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE IF NOT EXISTS `wall` (
  `wall_id` int(11) NOT NULL AUTO_INCREMENT,
  `wall_content` longtext NOT NULL,
  `wall_time` varchar(30) NOT NULL,
  `wall_ip` varchar(30) NOT NULL,
  `wall_deleted` int(1) NOT NULL DEFAULT '0',
  `wall_contain_media` int(1) DEFAULT '0',
  `wall_media_info` longtext,
  PRIMARY KEY (`wall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wall`
--

INSERT INTO `wall` (`wall_id`, `wall_content`, `wall_time`, `wall_ip`, `wall_deleted`, `wall_contain_media`, `wall_media_info`) VALUES
(1, 'Huff...selesai juga', '1287469237', '0.0.0.0', 0, 0, NULL),
(2, 'Hehe', '1287470156', '0.0.0.0', 1, 0, NULL),
(3, 'Nature by Numbers ', '1287470220', '0.0.0.0', 0, 1, 'youtube^^^kkGeOWYOFoA'),
(4, 'Sistem akademik Unnes ', '1287470366', '0.0.0.0', 0, 1, 'link^^^http://akademik.unnes.ac.id/index.php');
