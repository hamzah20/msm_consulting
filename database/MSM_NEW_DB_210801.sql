-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for msm_db
CREATE DATABASE IF NOT EXISTS `msm_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `msm_db`;

-- Dumping structure for table msm_db.s_appl
CREATE TABLE IF NOT EXISTS `s_appl` (
  `ID` varchar(50) NOT NULL DEFAULT '',
  `APPL_GROUP_ID` varchar(50) NOT NULL DEFAULT '',
  `APPL_PARENT_ID` varchar(50) NOT NULL DEFAULT '',
  `NAME` varchar(50) NOT NULL DEFAULT '',
  `ORDER_NO` tinyint(4) NOT NULL DEFAULT '0',
  `LINK` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_appl: 21 rows
/*!40000 ALTER TABLE `s_appl` DISABLE KEYS */;
INSERT INTO `s_appl` (`ID`, `APPL_GROUP_ID`, `APPL_PARENT_ID`, `NAME`, `ORDER_NO`, `LINK`) VALUES
	('DATA_COMPANY', 'DATA', 'CLIENT', 'Profil Perusahaan', 1, 'products'),
	('DATA_PROFILE', 'DATA', 'CLIENT', 'Karyawan (Pegawai)', 2, ''),
	('UTILITY_TAXOFFICE', 'UTLITY_LIST', 'UTILITY', 'Kantor Pelayanan Pajak', 1, ''),
	('UTILITY_VENDOR', 'UTLITY_LIST', 'UTILITY', 'Vendor (Lain-Lain)', 2, 'banner'),
	('UTILITY_MSMGROUP', 'UTLITY_LIST', 'UTILITY', 'MSM Group', 3, 'orders'),
	('TAX_CALCULATION_PPH21', 'TAX_CALCULATION', 'TAX', 'PPh 21', 1, 'member'),
	('TAX_CALCULATION_PPH22', 'TAX_CALCULATION', 'TAX', 'PPh 22', 2, 'privacy'),
	('TAX_CALCULATION_PPH23', 'TAX_CALCULATION', 'TAX', 'PPh 23', 3, 'about'),
	('TAX_CALCULATION_PPH4_2', 'TAX_CALCULATION', 'TAX', 'PPh 4(2)', 4, 'terms'),
	('TAX_CALCULATION_PPH25', 'TAX_CALCULATION', 'TAX', 'PPh 25', 5, 'faq'),
	('TAX_CALCULATION_PPN', 'TAX_CALCULATION', 'TAX', 'PPN', 6, 'contact'),
	('TAX_ACTIVITY_SUMMARY', 'TAX_ACTIVITY', 'TAX', 'Ringkasan', 1, 'margin'),
	('ACTIVITY_LIST_MANAGEMENT_TASK', 'ACTIVITY_LIST', 'MANAGEMENT', 'Penugasan (Task)', 1, 'products'),
	('ACTIVITY_LIST_CLIENT_REGISTRATION', 'ACTIVITY_LIST', 'MANAGEMENT', 'Registrasi Calon Klien', 2, 'products'),
	('ACTIVITY_LIST_MANAGEMENT_INBOX', 'ACTIVITY_LIST', 'MANAGEMENT', 'Pesan Masuk', 3, 'products'),
	('ACTIVITY_LIST_MANAGEMENT_OUTBOX', 'ACTIVITY_LIST', 'MANAGEMENT', 'Pesan Keluar', 4, 'products'),
	('SETTING_LIST_KLU', 'SETTING_LIST', 'SETTINGS', 'Klasifikasi Lapangan Usaha', 1, 'products'),
	('SETTING_LIST_INCOME_TYPE', 'SETTING_LIST', 'SETTINGS', 'Jenis Setoran', 2, 'products'),
	('SETTING_LIST_COUNTRY_ORIGIN', 'SETTING_LIST', 'SETTINGS', 'Negara Domisili', 3, 'products'),
	('SETTING_LIST_ACCESS_PERMISSION', 'SETTING_LIST', 'SETTINGS', 'Hak Akses', 4, 'products'),
	('SETTING_LIST_EMAIL', 'SETTING_LIST', 'SETTINGS', 'Email', 5, 'products');
/*!40000 ALTER TABLE `s_appl` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_appl_detail
CREATE TABLE IF NOT EXISTS `s_appl_detail` (
  `REC_ID` int(10) NOT NULL,
  `APPL_ID` varchar(50) NOT NULL DEFAULT '',
  `ID` varchar(50) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  `ORDER_NO` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_appl_detail: 25 rows
/*!40000 ALTER TABLE `s_appl_detail` DISABLE KEYS */;
INSERT INTO `s_appl_detail` (`REC_ID`, `APPL_ID`, `ID`, `DESCRIPTION`, `ORDER_NO`) VALUES
	(1, 'PRODUCT', 'VIEW', 'VIEW', 1),
	(2, 'PRODUCT', 'ADD', 'ADD', 2),
	(3, 'PRODUCT', 'EDIT', 'EDIT', 3),
	(4, 'PRODUCT', 'DELETE', 'DELETE', 4),
	(5, 'PRODUCT', 'UPLOAD', 'UPLOAD', 5),
	(6, 'BANNER', 'VIEW', 'VIEW', 1),
	(7, 'BANNER', 'ADD', 'ADD', 2),
	(8, 'BANNER', 'EDIT', 'EDIT', 3),
	(9, 'BANNER', 'DELETE', 'DELETE', 4),
	(10, 'BANNER', 'UPLOAD', 'UPLOAD', 5),
	(11, 'USER', 'VIEW', 'VIEW', 1),
	(12, 'USER', 'ADD', 'ADD', 2),
	(13, 'USER', 'EDIT', 'EDIT', 3),
	(14, 'USER', 'DELETE', 'DELETE', 4),
	(15, 'GROUP', 'VIEW', 'VIEW', 1),
	(16, 'GROUP', 'ADD', 'ADD', 2),
	(17, 'GROUP', 'EDIT', 'EDIT', 3),
	(18, 'GROUP', 'DELETE', 'DELETE', 4),
	(19, 'MEMBER', 'VIEW', 'VIEW', 1),
	(20, 'MEMBER', 'EDIT', 'EDIT', 2),
	(21, 'MEMBER', 'DELETE', 'DELETE', 3),
	(22, 'CATEGORY', 'VIEW', 'VIEW', 1),
	(23, 'CATEGORY', 'ADD', 'ADD', 2),
	(24, 'CATEGORY', 'EDIT', 'EDIT', 3),
	(25, 'CATEGORY', 'DELETE', 'DELETE', 4);
/*!40000 ALTER TABLE `s_appl_detail` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_appl_group
CREATE TABLE IF NOT EXISTS `s_appl_group` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(50) NOT NULL DEFAULT '',
  `PARENT_ID` varchar(50) NOT NULL DEFAULT '',
  `NAME` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `ORDER_NO` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_appl_group: 6 rows
/*!40000 ALTER TABLE `s_appl_group` DISABLE KEYS */;
INSERT INTO `s_appl_group` (`REC_ID`, `ID`, `PARENT_ID`, `NAME`, `DESCRIPTION`, `ORDER_NO`) VALUES
	(1, 'DATA', 'CLIENT', 'Data', 'fa fa-database', 1),
	(2, 'UTLITY_LIST', 'UTILITY', 'Daftar Utilitas', 'fa fa-file', 2),
	(3, 'TAX_CALCULATION', 'TAX', 'Hitung Pajak', 'fa fa-calculator', 3),
	(4, 'TAX_ACTIVITY', 'TAX', 'Aktivitas Pajak', 'fa fa-users', 4),
	(5, 'ACTIVITY_LIST', 'MANAGEMENT', 'Daftar Kegiatan', 'fa fa-users', 5),
	(6, 'SETTING_LIST', 'SETTINGS', 'Daftar Pengaturan', 'fa fa-cog', 6);
/*!40000 ALTER TABLE `s_appl_group` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_appl_parent
CREATE TABLE IF NOT EXISTS `s_appl_parent` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(50) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `ORDER_NO` int(11) DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_appl_parent: ~5 rows (approximately)
/*!40000 ALTER TABLE `s_appl_parent` DISABLE KEYS */;
INSERT INTO `s_appl_parent` (`REC_ID`, `ID`, `NAME`, `DESCRIPTION`, `ORDER_NO`) VALUES
	(1, 'CLIENT', 'Klient', 'Klient', 1),
	(2, 'UTILITY', 'Utilitas', 'Utilitas', 2),
	(3, 'TAX', 'Kepatuhan Pajak', 'Kepatuhan Pajak', 3),
	(4, 'MANAGEMENT', 'Manajemen Kegiatan', 'Manajemen Kegiatan', 3),
	(5, 'SETTINGS', 'Pengaturan', 'Pengaturan', 3);
/*!40000 ALTER TABLE `s_appl_parent` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_group
CREATE TABLE IF NOT EXISTS `s_group` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_group: 1 rows
/*!40000 ALTER TABLE `s_group` DISABLE KEYS */;
INSERT INTO `s_group` (`ID`, `NAME`, `DESCRIPTION`) VALUES
	('ADMIN', 'Administrator', 'Administrator');
/*!40000 ALTER TABLE `s_group` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_group_appl
CREATE TABLE IF NOT EXISTS `s_group_appl` (
  `GROUP_ID` varchar(15) NOT NULL DEFAULT '',
  `APPL_ID` varchar(50) NOT NULL DEFAULT '',
  `ROLE` varchar(255) NOT NULL DEFAULT '',
  `ID` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_group_appl: 21 rows
/*!40000 ALTER TABLE `s_group_appl` DISABLE KEYS */;
INSERT INTO `s_group_appl` (`GROUP_ID`, `APPL_ID`, `ROLE`, `ID`) VALUES
	('ADMIN', 'DATA_COMPANY', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 0),
	('ADMIN', 'DATA_PROFILE', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 1),
	('ADMIN', 'UTILITY_TAXOFFICE', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 2),
	('ADMIN', 'UTILITY_VENDOR', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 3),
	('ADMIN', 'UTILITY_MSMGROUP', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 4),
	('ADMIN', 'TAX_CALCULATION_PPH21', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 5),
	('ADMIN', 'TAX_CALCULATION_PPH22', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 6),
	('ADMIN', 'TAX_CALCULATION_PPH23', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 7),
	('ADMIN', 'TAX_CALCULATION_PPH4_2', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 8),
	('ADMIN', 'TAX_CALCULATION_PPH25', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 9),
	('ADMIN', 'TAX_CALCULATION_PPN', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 10),
	('ADMIN', 'TAX_ACTIVITY_SUMMARY', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 11),
	('ADMIN', 'ACTIVITY_LIST_MANAGEMENT_TASK', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 12),
	('ADMIN', 'ACTIVITY_LIST_CLIENT_REGISTRATION', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 13),
	('ADMIN', 'ACTIVITY_LIST_MANAGEMENT_INBOX', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 14),
	('ADMIN', 'ACTIVITY_LIST_MANAGEMENT_OUTBOX', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 15),
	('ADMIN', 'SETTING_LIST_KLU', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 16),
	('ADMIN', 'SETTING_LIST_INCOME_TYPE', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 17),
	('ADMIN', 'SETTING_LIST_COUNTRY_ORIGIN', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 18),
	('ADMIN', 'SETTING_LIST_ACCESS_PERMISSION', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 19),
	('ADMIN', 'SETTING_LIST_EMAIL', 'VIEW;ADD;EDIT;DELETE;UPLOAD', 20);
/*!40000 ALTER TABLE `s_group_appl` ENABLE KEYS */;

-- Dumping structure for table msm_db.s_user
CREATE TABLE IF NOT EXISTS `s_user` (
  `ID` varchar(15) NOT NULL DEFAULT '',
  `NAME` varchar(15) NOT NULL DEFAULT '',
  `SALT` varchar(100) DEFAULT NULL,
  `PASS` text,
  `GROUP_ID` varchar(15) NOT NULL DEFAULT '',
  `STATUS` varchar(15) NOT NULL DEFAULT '',
  `ATTEMPTED_LOGIN` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table msm_db.s_user: 2 rows
/*!40000 ALTER TABLE `s_user` DISABLE KEYS */;
INSERT INTO `s_user` (`ID`, `NAME`, `SALT`, `PASS`, `GROUP_ID`, `STATUS`, `ATTEMPTED_LOGIN`) VALUES
	('tonystark', 'Tony Stark', NULL, '0192023a7bbd73250516f069df18b500', 'ADMIN', 'ACTIVE', 0),
	('ADMIN', 'Administrator', 'cd0aa65e51bc50c47c26cfb2acc577c7e726125d', '$2y$12$Lqhj.ZejwOtdqnnDybKOpeGoKXzFoVlZMgJ69llW2Rrc8fBvMh5.u', 'ADMIN', 'ACTIVE', 0);
/*!40000 ALTER TABLE `s_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
