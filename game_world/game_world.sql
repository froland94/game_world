-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 10:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `game_world`
--
CREATE DATABASE IF NOT EXISTS `game_world` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `game_world`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(7, 'MMORPG'),
(8, 'SinglePlayer'),
(9, 'MultiPlayer'),
(10, 'MOBA'),
(11, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`) VALUES
(1, 'test'),
(2, 'test'),
(3, 'proba');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(24) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(600) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`, `image`) VALUES
(2, 'Battlefield', '2016-06-21 05:05:07', 'Call of Duty is a first-person shooter video game franchise. The series began on Microsoft Windows, and later expanded to consoles and handhelds. Several spin-off games have been released. The earlier games in the series are set primarily in World War II, including Call of Duty, Call of Duty 2, and Call of Duty 3.', '55053-1416-ps5.jpg'),
(3, 'Crysis', '2016-06-20 23:45:50', 'Call of Duty is a first-person shooter video game franchise. The series began on Microsoft Windows, and later expanded to consoles and handhelds. Several spin-off games have been released. The earlier games in the series are set primarily in World War II, including Call of Duty, Call of Duty 2, and Call of Duty 3.', 'jiggy.jpg'),
(10, 'Test', '2016-06-21 21:47:16', 'Call of Duty is a first-person shooter video game franchise. The series began on Microsoft Windows, and later expanded to consoles and handhelds. Several spin-off games have been released. The earlier games in the series are set primarily in World War II, including Call of Duty, Call of Duty 2, and Call of Duty 3.', '27626-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `dest_city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nmb_products` int(11) NOT NULL,
  `total_value` double NOT NULL,
  `order_date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `id` (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `id`, `dest_city`, `address`, `nmb_products`, `total_value`, `order_date`) VALUES
(50, '11', 40, 'City', 'Address nmb', 1, 6000, '2016-07-02 13:02:22'),
(51, '11', 39, 'City', 'Address nmb', 1, 450, '2016-07-02 13:07:04'),
(52, '55', 39, 'City', 'Address nmb', 1, 450, '2016-07-02 18:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `price_action` double NOT NULL,
  `in_stock` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(950) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `img`, `name`, `price`, `price_action`, `in_stock`, `category`, `description`, `youtube`) VALUES
(35, 8, '7903-4.jpg', 'Assassin Creed', 5000, 0, 55, '8', 'Assassin''s Creed is an action-adventure video game series created by Ubisoft that consists of nine main games and a number of supporting materials. The games have appeared on the PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Microsoft Windows, OS X, Nintendo DS, PlayStation Portable, PlayStation Vita, iOS, HP webOS,[1] Android, Nokia Symbian Windows Phone platforms, and the Wii U.', ''),
(36, 8, '40920-11.jpg', 'Tomb Raider', 4000, 0, 55, '8', 'Crystal Dynamics began development of Tomb Raider soon after the release of Tomb Raider: Underworld in 2008. Rather than a sequel, the team decided to completely reboot the series, establishing the origins of Lara Croft for the second time, following Tomb Raider: Legend. Tomb Raider is set on Yamatai, an island from which Lara, who is untested and not yet the battle-hardened explorer she is in other titles in the series, must save her friends and escape while being hunted down by a malevolent cult.', ''),
(38, 11, '2066-10.jpg', 'Need for Speed', 5000, 500, 65, '11', 'Need for Speed, also known by its initials NFS, is a racing video game franchise published by Electronic Arts and developed by several studios including EA Black Box, Criterion Games and Ghost Games.\r\n\r\nThe series released its first title, The Need for Speed in 1994. The title comes from a famous quote from the 1986 film Top Gun. All installments of the series consist of racing cars on various tracks, with several titles including police pursuits in races. Since Need for Speed: High Stakes, the series has also integrated car body customization into gameplay.', ''),
(39, 11, '43485-12.jpg', 'Son of Rome', 4500, 450, 63, '11', 'Set in an alternate version of Rome, Ryse follows the life of the Roman centurion Marius Vitus as he becomes one of the leaders in the Roman Legion. Gameplay revolves around Marius using his sword to strike enemies and shield to deflect attacks. Execution sequences are also featured in the game, which are quick-time events that serve as an extension to combat. The game''s combat emphasizes on "flow", a term referring to a player''s ability to move on to fight against another enemy upon defeating an enemy with few limitations in between.', ''),
(40, 7, '73280-ryse.jpg', 'Rise', 6000, 0, 66, '7', 'The game''s development began in 2006. Originally it was set to be a first-person Kinect-only title for the Xbox 360. However, the team later made three new prototypes, and redesigned to become a third-person hack and slash game, with Kinect serving a diminished role. The development of the game was originally handled by Crytek Budapest, but was later transferred to Crytek''s headquarters in Frankfurt, Germany.', ''),
(41, 9, '58319-prototype.jpg', 'Prototype', 3500, 0, 67, '9', 'A prototype is an early sample, model, or release of a product built to test a concept or process or to act as a thing to be replicated or learned from.[1] It is a term used in a variety of contexts, including semantics, design, electronics, and software programming. A prototype is designed to test and try a new design to enhance precision by system analysts and users. Prototyping serves to provide specifications for a real, working system rather than a theoretical one.[2] In some workflow models, creating a prototype (a process sometimes called materialization)', ''),
(42, 11, '65951-9.jpg', 'The Division', 3000, 300, 87, '11', 'Tom Clancy''s The Division is an online-only open world third-person shooter video game developed by Ubisoft Massive and published by Ubisoft, with assistance from Red Storm Entertainment, for Microsoft Windows, PlayStation 4 and Xbox One. It was announced during Ubisoft''s E3 2013 press conference, and was released worldwide on 8 March 2016. The Division is set in a dystopian New York City in the aftermath of a smallpox pandemic; the player, who is an agent of the titular Strategic Homeland Division, commonly referred to as simply "The Division"', ''),
(43, 9, '41131-70156-slate.jpg', 'Call of Duty', 2000, 0, 89, '9', 'Call of Duty is a first-person shooter video game franchise. The series began on Microsoft Windows, and later expanded to consoles and handhelds. Several spin-off games have been released. The earlier games in the series are set primarily in World War II, including Call of Duty, Call of Duty 2, and Call of Duty 3. Beginning with Call of Duty 4: Modern Warfare, which is set in modern times, the series has shifted focus away from World War II. Modern Warfare, released November 2007, was followed by World at War and Modern Warfare 2. Black Ops, ', 'https://www.youtube.com/embed/ENkfuzeBdRE'),
(44, 10, '3658-xbox6.jpg', 'Batman', 4567, 0, 67, '10', 'Batman''s secret identity is Bruce Wayne, an American billionaire, playboy, philanthropist, and owner of Wayne Enterprises. After witnessing the murder of his parents as a child, he swore revenge on criminals, an oath tempered by a sense of justice. Wayne trains himself physically and intellectually and crafts a bat-inspired persona to fight crime.[8] Batman operates in the fictional Gotham City, with assistance from various supporting characters, including his butler Alfred, police commissioner Jim Gordon, and vigilante allies such as Robin.', 'https://www.youtube.com/embed/neY2xVmOfUM'),
(45, 10, '30490-1416-ps5.jpg', 'Mortal Kombat', 7445, 0, 67, '10', 'Mortal Kombat: Deception is a fighting game developed and published by Midway as the sixth installment of the Mortal Kombat (MK) series. It was released for the PlayStation 2 and Xbox in October 2004, and for the Nintendo GameCube in March 2005. Mortal Kombat: Deception follows the storyline from the fifth installment, Deadly Alliance. Its story centers on the revival of the Dragon King Onaga, who attempts to conquer the realms featured in the series after defeating the sorcerers Quan Chi and Shang Tsung, the main antagonists in the previous game', 'https://www.youtube.com/embed/XGnVhqhmip8'),
(46, 10, '74809-ps7.jpg', 'Street Fighter', 2456, 0, 676, '10', 'The player competes in a series of one-on-one matches against a series of computer-controlled opponents or in a single match against another player. Each match consists of three rounds in which the player must defeat an opponent in less than 30 seconds. If a match ends before a fighter is knocked out, then the fighter with the greater amount of energy left will be declared the round''s winner. The player must win two rounds in order to defeat the opponent and proceed to the next battle. If the third round ends in a tie, then the computer-controlled opponent will win by default.', 'https://www.youtube.com/embed/KIOMBc6E_MQ'),
(47, 9, 'xbox3.jpg', 'Fallout 4', 1549, 0, 65, '9', 'As revealed in the trailer on June 3, 2015, the setting takes place in Boston, Massachusetts. Famous local landmarks like the Paul Revere Monument, the USS Constitution, as well as the Massachusetts State House with its unique Golden Dome are included in the game world. Other notable present-day locations that make an appearance in the game are Scollay Square, Bunker Hill memorial', ''),
(48, 10, '40500-93278-31454-5646-xbox4.jpg', 'Payday', 4565, 0, 45, '10', 'A payday loan (also called a payday advance, salary loan, payroll loan, small dollar loan, short term, or cash advance loan) is a small, short-term unsecured loan, "regardless of whether repayment of loans is linked to a borrower''s payday."[1][2][3] The loans are also sometimes referred to as "cash advances," though that term can also refer to cash provided against a prearranged line of credit such as a credit card. Payday advance loans rely on the consumer having previous payroll and employment records.', ''),
(49, 7, '1987-6.jpg', 'The Elder Scrolls', 2546, 0, 67, '7', 'The Elder Scrolls is a series of action role-playing open world fantasy video games primarily developed by Bethesda Game Studios and published by Bethesda Softworks. The series is known for its elaborate and richly detailed open worlds and its focus on free-form gameplay. Morrowind, Oblivion, and Skyrim all won Game of the Year awards from multiple outlets. The series has sold more than 40 million copies worldwide.', ''),
(50, 7, '3601-xbox7.jpg', 'Resident Evil', 2000, 200, 56, '7', 'Resident Evil, known as Biohazard (ãƒã‚¤ã‚ªãƒã‚¶ãƒ¼ãƒ‰ BaiohazÄdo?) in Japan, is a survival horror video game based media franchise created by Shinji Mikami and owned by the video game company Capcom. The franchise focuses around a series of survival horror video games, but has since branched out into comic books, novels and novelizations, sound dramas, a series of live-action films and animated sequels to the games, and a variety of associated merchandise, such as action figures. The overarching plot of the series focuses on multiple characters and their', ''),
(52, 9, '17136-8.jpg', 'Battlefield', 5000, 0, 500, '9', 'The battlefield lay quiet, for it was now a graveyard of the unburied. Their corpses lay among the buttercups and forget-me-nots. The sun still shone and the wind still blew, but somewhere mothers and fathers', ''),
(53, 8, '96596-witcher.jpg', 'The Witcher', 2000, 0, 67, '8', 'A witcher (or hexer) is someone who has undergone extensive training, ruthless mental and physical conditioning, and mysterious rituals (which take place at "witcher schools" such as Kaer Morhen) in preparation for becoming an itinerant monsterslayer for hire. Geralt, the central character in Andrzej Sapkowski''s Witcher series and the subsequent games inspired by them, is said in the stories to be one of the greatest witchers; he is certainly legendary', ''),
(54, 11, '64612-god.jpg', 'God of War', 5000, 500, 67, '11', 'God of War is a third-person action-adventure video game developed by Santa Monica Studio and published by Sony Computer Entertainment (SCE). First released on March 22, 2005, for the PlayStation 2 (PS2) console, it is the first installment in the series of the same name and the third chronologically. Loosely based on Greek mythology, it is set in ancient Greece with vengeance as its central motif. The player controls the protagonist Kratos, a Spartan warrior who serves the Olympian Gods. The goddess Athena tasks Kratos with killing Ares', ''),
(55, 9, '82704-watch.jpg', 'Overwatch', 6000, 0, 86, '9', 'Overwatch puts players into two teams of six, with each player selecting one of several pre-defined hero characters with unique movement, attributes, and skills; these heroes are divided into four classes: Offense, Defense, Tank, and Support. Players on a team work together to secure and defend control points on a map and/or escort a payload across the map in a limited amount of time. Players gain cosmetic rewards that do', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('inactive','active') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `surname`, `email`, `city`, `address`, `reg_date`, `admin`, `comment`, `activation_code`, `status`) VALUES
('11', '4d6b54d5f3252fcac0fad7953617d91c', '11', '11', '', '11', '11 11', '2016-07-02 13:02:06', 0, '', '', 'active'),
('55', 'c3a2f013901b819dfb25f613ddb5097d', '55', '55', '55@55.rs', '55', '55 55', '2016-07-02 18:21:49', 0, '', 'a0c177e3f653b2045c2db97ac1d545f0', 'active'),
('Tamas', '34458e137294fe1fe8bab00c6dfbb872', 'tamas', 'varga', 'vargata@vargata.ts', 'Subotica', 'HV 42', '2016-07-02 18:18:57', 0, '', '', 'inactive');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
