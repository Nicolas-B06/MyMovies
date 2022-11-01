-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour my-movies
CREATE DATABASE IF NOT EXISTS `my-movies` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `my-movies`;

-- Listage de la structure de la table my-movies. playlist
CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(10) unsigned NOT NULL DEFAULT '0',
  `isPrivate` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_playlist_user` (`userId`) USING BTREE,
  CONSTRAINT `FK_playlist_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table my-movies. playlist_movie
CREATE TABLE IF NOT EXISTS `playlist_movie` (
  `playlistId` int(10) unsigned NOT NULL,
  `movieId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`playlistId`,`movieId`),
  CONSTRAINT `FK__playlist` FOREIGN KEY (`playlistId`) REFERENCES `playlist` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table my-movies. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES
(1, 'admin', 'admin@admin.a', '$2y$10$.w2W7t4B8l/TB5QBrhBCqe/5owFcm8x/WYGPI3ue0Uk17.l9J8zka', 1),
(2, 'toto', 'toto@toto.t', '$2y$10$.w2W7t4B8l/TB5QBrhBCqe/5owFcm8x/WYGPI3ue0Uk17.l9J8zka', 0),
(3, 'tata', 'tata@tata.t', '$2y$10$.w2W7t4B8l/TB5QBrhBCqe/5owFcm8x/WYGPI3ue0Uk17.l9J8zka', 0),
(4, 'DIO', 'kono@dio.da', '$2y$10$.w2W7t4B8l/TB5QBrhBCqe/5owFcm8x/WYGPI3ue0Uk17.l9J8zka', 0);

INSERT INTO playlist VALUES
(1, 1, 'fake 001', 10000, 1),
(2, 1, 'fake 002', 10000, 0),
(3, 2, 'fake 001', 10000, 1),
(4, 2, 'fake 002', 10000, 0),
(5, 3, 'fake 001', 10000, 1),
(6, 3, 'fake 002', 10000, 0),
(7, 4, 'fake 001', 10000, 1),
(8, 4, 'fake 002', 10000, 0);

INSERT INTO playlist_movie VALUES
(1, 663712),
(1, 436270),
(1, 717728),
(2, 663712),
(2, 436270),
(2, 717728),
(3, 663712),
(3, 436270),
(3, 717728),
(4, 663712),
(4, 436270),
(4, 717728),
(5, 663712),
(5, 436270),
(5, 717728),
(6, 663712),
(6, 436270),
(6, 717728),
(7, 663712),
(7, 436270),
(7, 717728),
(8, 663712),
(8, 436270),
(8, 717728);

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
