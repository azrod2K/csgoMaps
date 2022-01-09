-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour csgomaps
CREATE DATABASE IF NOT EXISTS `csgomaps` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `csgomaps`;

-- Listage de la structure de la table csgomaps. maps
CREATE TABLE IF NOT EXISTS `maps` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nm_Maps` varchar(25) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Txt_Description` varchar(255) NOT NULL,
  `Txt_Strategie` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Listage des données de la table csgomaps.maps : ~17 rows (environ)
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;
INSERT INTO `maps` (`Id`, `Nm_Maps`, `Img`, `Txt_Description`, `Txt_Strategie`) VALUES
	(1, 'Inferno', 'de_inferno', 'la maps est tire d\'une ville en italie', ''),
	(2, 'Mirage', 'de_mirage', 'la maps est tire de la ville Morocco', ''),
	(3, 'Nuke', 'de_nuke', 'la maps est tire de la ville Northeastern United States', ''),
	(4, 'Overpass', 'de_overpass', 'la maps est tire de la ville berlin', ''),
	(5, 'Dust II', 'de_dust2', 'la maps est tire de la ville Morocco', ''),
	(6, 'Vertigo', 'de_vertigo', 'la maps est tire d\'une ville au United States', ''),
	(7, 'Ancient', 'de_ancient', 'la maps est inspire d\'un temple', ''),
	(8, 'Train', 'de_train', 'la maps est tire d\'une ville en Russie', ''),
	(9, 'Cache', 'de_cache', 'la maps est tire de la ville de Chernobyl', ''),
	(10, 'Grind', 'cs_grind', 'la maps est inspire d\'une plate-forme pétrolière', ''),
	(11, 'Mocha', 'cs_mocha', 'la maps est tire d\'une ville en Colombie', ''),
	(12, 'Militia', 'cs_militia', 'c\'est une maps ou les force de l\'ordre doivent sauver les otages', ''),
	(13, 'Agency', 'cs_agency', 'la maps est tire d\'une ville au United States', ''),
	(14, 'Office', 'cs_office', 'la maps est tire d\'une ville au United States', ''),
	(15, 'Italy', 'cs_italy', 'la maps est tire d\'une ville en Italie', ''),
	(16, 'Assault', 'cs_assault', 'la maps est tire de la ville Belmont Avenue, Chicago, United States', ''),
	(17, 'Cobblestone', 'de_cbble', 'la maps a était retire des mapes officiels', '');
/*!40000 ALTER TABLE `maps` ENABLE KEYS */;

-- Listage de la structure de la table csgomaps. tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nm_Nom` varchar(50) NOT NULL,
  `Nm_Prenom` varchar(50) NOT NULL,
  `Txt_Mail` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `isAdmin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table csgomaps.tbl_users : ~2 rows (environ)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `Nm_Nom`, `Nm_Prenom`, `Txt_Mail`, `Password`, `isAdmin`) VALUES
	(1, 'Machado', 'David', 'david.mchdb@eduge.ch', '71fd6316a43e689b03beddd925dc2ab3', 1),
	(2, 'Montagna', 'Leo', 'leo.mntgn@eduge.ch', '0ce3266d4eb71ad50f7a90aee6d21dcd', 1);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
