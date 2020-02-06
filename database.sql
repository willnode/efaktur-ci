-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbefaktur
CREATE DATABASE IF NOT EXISTS `dbefaktur` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbefaktur`;

-- Dumping structure for table dbefaktur.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `dokumen_id` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen_nama` varchar(255) NOT NULL DEFAULT '',
  `dokumen_file` varchar(255) NOT NULL,
  `dokumen_tgl` date NOT NULL DEFAULT curdate(),
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`dokumen_id`),
  KEY `FK_dokumen_login` (`login_id`),
  CONSTRAINT `FK_dokumen_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table dbefaktur.login
CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
