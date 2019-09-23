-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2019 at 04:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project14`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'PC'),
(2, 'XBOX'),
(3, 'PLAYSTATION'),
(4, 'NINTENDO');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_games` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_comment_user1_idx` (`id_user`),
  KEY `fk_comment_games1_idx` (`id_games`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_vercode`
--

DROP TABLE IF EXISTS `email_vercode`;
CREATE TABLE IF NOT EXISTS `email_vercode` (
  `id_email_vercode` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vercode` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vercode_time_sent` datetime DEFAULT NULL,
  `register_time` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_email_vercode_status` int(11) NOT NULL,
  PRIMARY KEY (`id_email_vercode`),
  KEY `fk_email_vercode_user1_idx` (`id_user`),
  KEY `fk_email_vercode_email_vercode_status1_idx` (`id_email_vercode_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_vercode`
--

INSERT INTO `email_vercode` (`id_email_vercode`, `email`, `vercode`, `vercode_time_sent`, `register_time`, `id_user`, `id_email_vercode_status`) VALUES
(1, 'nemanja_jocic@yahoo.com', '5ce1e6ab831685c2af88d43406e6dbf67e8a0457', '2019-06-30 15:02:53', '2019-06-30 15:02:55', 1, 5),
(2, 'johndoe@gmail.com', 'ccd80992a456a1175d6765274d5fcf51b09edcbe', '2019-06-30 20:25:34', '2019-06-30 20:25:35', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `email_vercode_status`
--

DROP TABLE IF EXISTS `email_vercode_status`;
CREATE TABLE IF NOT EXISTS `email_vercode_status` (
  `id_email_vercode_status` int(11) NOT NULL AUTO_INCREMENT,
  `email_vercode_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email_vercode_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_email_vercode_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_vercode_status`
--

INSERT INTO `email_vercode_status` (`id_email_vercode_status`, `email_vercode_name`, `email_vercode_description`) VALUES
(1, 'EMAIL_VERCODE_GENERATED', 'EMAIL_VERCODE_GENERATED'),
(2, 'EMAIL_VERCODE_SENT', 'EMAIL_VERCODE_SENT'),
(3, 'EMAIL_VERCODE_REGENERATED', 'EMAIL_VERCODE_REGENERATED'),
(4, 'EMAIL_VERCODE_EXPIRED', 'EMAIL_VERCODE_EXPIRED'),
(5, 'EMAIL_VERCODE_VERIFIED', 'EMAIL_VERCODE_VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id_games` int(11) NOT NULL AUTO_INCREMENT,
  `game_title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `game_description` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `valute` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_games`),
  KEY `fk_games_category1_idx` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_games`, `game_title`, `game_description`, `price`, `valute`, `image`, `id_category`) VALUES
(1, 'Cyberpunk 2077', 'Cyberpunk 2077 is an upcoming role-playing video game developed and published by CD Projekt, releasing for Microsoft Windows, PlayStation 4, and Xbox One on 16 April 2020. Adapted from the 1988 tabletop game Cyberpunk 2020, it is set fifty-seven years later in dystopian Night City, California, an open world with six distinct regions. In a first-person perspective, players assume the role of the customisable mercenary V, who can reach prominence in three character classes by applying experience points to stat upgrades. V has an arsenal of ranged weapons and options for melee combat.', '8459.99', 'RSD', 'img/Cyberpunk.jpg', 1),
(2, 'Call of Duty 4: Modern Warfare', 'Call of Duty 4: Modern Warfare is a first-person shooter developed by Infinity Ward and published by Activision. An installment in the Call of Duty series, it was released in November 2007 for the PlayStation 3, Xbox 360, and Microsoft Windows, and was ported to the Wii as Call of Duty: Modern Warfare – Reflex Edition in 2009. The game breaks away from the World War II setting of previous entries in the series and is instead set in modern times. Developed for over two years, the game uses a proprietary game engine.', '8459.99', 'RSD', 'img/Call.jpg', 1),
(3, '11-11: Memories Retold', '11-11 Memories Retold is a narrative adventure video game set during the First World War. It was released on 9 November 2018, two days before the centennial of the armistice. It is co-developed by Digixart Entertainment Studios and Aardman Animations, and published by Bandai Namco Entertainment.', '6555.99', 'RSD', 'img/11art.jpg', 1),
(4, 'Ace Combat 7: Skies Unknown', 'Ace Combat 7: Skies Unknown[a] is a combat flight action video game developed and published by Bandai Namco Entertainment. An entry in the long-running Ace Combat series, it was released for the PlayStation 4 and Xbox One in January 2019, and for Microsoft Windows the following month. The game features support for virtual reality.', '9899.99', 'RSD', 'img/AceCombat.jpg', 2),
(5, 'The Banner Saga 2', 'The Banner Saga 2 is a tactical role-playing video game developed by Stoic Studio and published by Versus Evil. It is the sequel to The Banner Saga, and the second part of a trilogy of games.', '7655.99', 'RSD', 'img/BannerSaga.jpg', 2),
(87, 'Borderlands 3', 'Borderlands 3 is a loot-driven first-person shooter. Players, either playing alone or in parties up to four people, make a character from one of four classes available, and take on various missions given out by non-playable characters (NPCs) and at bounty boards to gain experience, in-game monetary rewards, and reward items. Players can also gain these items by defeating enemies throughout the game. ', '5445.99', 'RSD', 'img/Borderlands.jpg', 2),
(88, 'Call of Duty: Ghosts', 'Call of Duty: Ghosts is a first-person shooter video game developed by Infinity Ward and published by Activision, it is the tenth major installment in the Call of Duty series and the sixth developed by Infinity Ward. It was released for Microsoft Windows, PlayStation 3, Xbox 360, and Wii U on November 5, 2013. The game was released with the launch of the PlayStation 4 and Xbox One.', '8999.99', 'RSD', 'img/CallGhost.jpg', 3),
(89, 'Call of Duty: Black Ops 4', 'Call of Duty: Black Ops 4 (stylized as Call of Duty: Black Ops IIII) is a multiplayer first-person shooter developed by Treyarch and published by Activision. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 12, 2018. It is a sequel to the 2015 game Call of Duty: Black Ops III, the fifth entry in the Black Ops sub-series, and the 15th installment in the Call of Duty series overall.', '9999.99', 'RSD', 'img/CallBlack4.jpg', 3),
(90, 'Dangun Feveron', 'Dangun Feveron (弾銃Feveron (ダンガンフィーバロン {Dunganfie Baron}) Dangan Feveron, lit. \"Bullet Gun Feveron\"), also known by its overseas title Fever SOS, is a vertical scrolling shooter game developed by Cave and published by Nihon System Inc. in 1998. The gameplay is typical of manic shooters, with numerous swarms of enemies onscreen at any given time, and bosses that shoot intimidatingly large clusters of bullets. Unique to this title, the score of the game is disco music, which is a particularly unusual choice for a shoot \'em up. In April 2016.', '7899.99', 'RSD', 'img/Dangun.jpg', 3),
(91, 'Days Gone', 'Days Gone is an action-adventure survival horror video game developed by SIE Bend Studio and published by Sony Interactive Entertainment for PlayStation 4 on April 26, 2019. Set in a post-apocalyptic Oregon two years after a global pandemic, former outlaw-turned-drifter Deacon St. John discovers the possibility of his wife Sarah still being alive, which leads Deacon on a quest to find her. Days Gone is played from a third-person perspective, in which the play.', '6999.99', 'RSD', 'img/DaysGone.jpg', 4),
(92, 'Destiny 2', 'Destiny 2 is an online-only multiplayer first-person shooter video game developed by Bungie. It was released for PlayStation 4 and Xbox One on September 6, 2017, followed by a Microsoft Windows version the following month.[1][2] The game was published by Activision until early 2019, when Bungie acquired the publishing rights to the franchise. It is the sequel to 2014\'s Destiny and its subsequent expansions. Set in a \"mythic science fiction\" world, the game features a multiplayer \"shared-world\" environment with elements of role-playing games.', '8999.99', 'RSD', 'img/Destiny2.jpg', 4),
(93, 'Dirt Rally 2.0', 'Dirt Rally 2.0 is focused on rallying and rallycross. Players compete in timed stage events on tarmac and off-road terrain in varying weather conditions. The game features stages in Argentina, Australia, New Zealand, Poland, Spain and the United States.[1] Codemasters also announced plans to expand the game through the release of downloadable content.[2] Dirt Rally 2.0 lets players choose between a total of fifty cars, including World Rallycross Supercars and eight circuits from the FIA World Rallycross Championship.[2][3] Every car can have its setup adjusted before a race.', '6999.99', 'RSD', 'img/DirtRally.jpg', 4),
(94, 'Dragon Ball Xenoverse', 'The game is set almost entirely within a number of 3D battle arenas which are mostly modeled after notable locations in the Dragon Ball universe, accessed from the main hub – the Toki-Toki City. Fighters can traverse the levels free-roaming in large spaces and can fight on ground, in the air and underwater. The game features spoken dialogue from a majority of main characters while in battle, and characters show facial expressions when they strike an opponent or take damage. Although limited, the players have some freedom to explore the planet Earth as it exists in the Dragon Ball.', '5999.99', 'RSD', 'img/DragonBall.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  `id_user_status` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_user_user_status_idx` (`id_user_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fname`, `lname`, `username`, `email`, `password`, `role`, `id_user_status`) VALUES
(1, 'Nemanja', 'Jocic', 'njocic', 'nemanja_jocic@yahoo.com', '30c950dfb17a6bd04c95737690825c68b115b1e9', 'admin', 2),
(2, 'John', 'Doe', 'johndoe', 'johndoe@gmail.com', '30c950dfb17a6bd04c95737690825c68b115b1e9', 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `id_user_status` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_status_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id_user_status`, `user_status_name`, `user_status_description`) VALUES
(1, 'USER_STATUS_VERIFICATION', 'USER_STATUS_VERIFICATION'),
(2, 'USER_STATUS_ACTIVE', 'USER_STATUS_ACTIVE'),
(3, 'USER_STATUS_NOT_ACTIVE', 'USER_STATUS_NOT_ACTIVE'),
(4, 'USER_STATUS_BLOCKED', 'USER_STATUS_BLOCKED'),
(5, 'USER_STATUS_DEACTIVATED', 'USER_STATUS_DEACTIVATED');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_games1` FOREIGN KEY (`id_games`) REFERENCES `games` (`id_games`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `email_vercode`
--
ALTER TABLE `email_vercode`
  ADD CONSTRAINT `fk_email_vercode_email_vercode_status1` FOREIGN KEY (`id_email_vercode_status`) REFERENCES `email_vercode_status` (`id_email_vercode_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_email_vercode_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_games_category1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_status` FOREIGN KEY (`id_user_status`) REFERENCES `user_status` (`id_user_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
