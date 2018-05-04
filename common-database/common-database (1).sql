-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 jan. 2018 à 17:47
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTweet` int(11) NOT NULL,
  `commentContent` varchar(240) DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `commentCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idComment`),
  KEY `idUser` (`idUser`),
  KEY `idTweet` (`idTweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `idFollowed` int(11) NOT NULL,
  `idFollower` int(11) NOT NULL,
  `dateUpdateStatus` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `followStatus` varchar(5) NOT NULL DEFAULT 'true',
  KEY `idUser` (`idFollowed`,`idFollower`),
  KEY `idFollower` (`idFollower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTweet` int(11) NOT NULL,
  `dateUpdateStatus` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likeStatus` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idLike`),
  KEY `idUser` (`idUser`),
  KEY `idTweet` (`idTweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `idSender` int(11) NOT NULL,
  `idReceiver` int(11) NOT NULL,
  `msgContent` varchar(20000) DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `msgCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedSender` varchar(5) NOT NULL DEFAULT 'true',
  `deletedReceiver` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idMsg`),
  KEY `idUser` (`idSender`,`idReceiver`),
  KEY `idReceiver` (`idReceiver`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `idTweet` int(11) NOT NULL,
  `tagName` varchar(240) NOT NULL,
  `tagCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTag`),
  KEY `idTweet` (`idTweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `idTweet` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `tweetContent` varchar(240) DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `idReTweet` int(11) DEFAULT NULL,
  `idReTweetFrom` int(11) DEFAULT NULL,
  `tweetDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idTweet`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `idUrl` int(11) NOT NULL AUTO_INCREMENT,
  `longUrl` varchar(255) NOT NULL,
  `shortUrl` varchar(20) NOT NULL,
  PRIMARY KEY (`idUrl`),
  KEY `shortUrl` (`shortUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `displayName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(254) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idUrlAvatar` int(11) DEFAULT NULL,
  `theme` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idUser`),
  KEY `idUrlAvatar` (`idUrlAvatar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idTweet`) REFERENCES `tweet` (`idTweet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`idFollowed`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`idFollower`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idTweet`) REFERENCES `tweet` (`idTweet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idReceiver`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idSender`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idTweet`) REFERENCES `tweet` (`idTweet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD CONSTRAINT `tweet_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idUrlAvatar`) REFERENCES `url` (`idUrl`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
