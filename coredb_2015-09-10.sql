-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 08:50 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('AddPermission', 2, 'Able to add permission', NULL, NULL, 1434271619, 1434271619),
('Author', 1, 'Author descriptions', NULL, NULL, 1434264927, 1434264927),
('Client', 1, 'Client Roles', NULL, NULL, 1434268923, 1434268923),
('CreatePost', 2, 'Able to create post', NULL, NULL, 1437560729, 1437560729),
('Duduk nganga', 2, 'goyang kaki', NULL, NULL, 1439363830, 1439363830),
('Remove Permission', 2, 'Able to remove permission', NULL, NULL, 1434271729, 1434271729),
('System Admin', 1, 'System Administration', NULL, NULL, 1437560806, 1437560806),
('ViewAuthorisation', 2, 'Able to view Authorisation', NULL, NULL, 1434271465, 1434271465);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Client', 'AddPermission'),
('Client', 'Author'),
('System Admin', 'Client'),
('Author', 'Duduk nganga'),
('Author', 'Remove Permission');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE IF NOT EXISTS `contest` (
  `id` int(7) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_type` int(2) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `contest_id`, `question_id`, `question_type`, `question`, `answer`, `status`) VALUES
(87, 53, 1, 0, 'ytry', '{"answer1":"ytry","answer2":"ytry","answer3":"yrty","answer4":"ytry","answer5":"A"}', 1),
(88, 53, 2, 1, 'yrty', '{"answer1":"ryt"}', 1),
(89, 54, 1, 0, 'yrrt', '{"answer1":"yrtyrtyu","answer2":"rtuty","answer3":"utyu","answer4":"utyu","answer5":"A"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_main`
--

CREATE TABLE IF NOT EXISTS `contest_main` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contest_name` varchar(31) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_main`
--

INSERT INTO `contest_main` (`id`, `user_id`, `contest_name`, `status`) VALUES
(53, 6, 'trtr', 1),
(54, 6, 'tyrerty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_code`
--

CREATE TABLE IF NOT EXISTS `cust_code` (
  `id` int(1) NOT NULL,
  `call_outs` int(11) NOT NULL,
  `hybrizy_code` varchar(19) NOT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE IF NOT EXISTS `lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(4, 'ACTIVE', 1, 'Status-Package', 1),
(5, 'INACTIVE', 0, 'Status-Package', 2),
(6, 'ACTIVE', 1, 'Contest', 1),
(7, 'INACTIVE', 0, 'Contest', 2),
(8, 'Free Customisation', 1, 'Item-Offer', 1),
(9, '24 Hour Support', 2, 'Item-Offer', 2),
(10, '10GB Disk Space', 3, 'Item-Offer', 3),
(11, 'Cloud Storage', 4, 'Item-Offer', 4),
(12, 'Online Protection', 5, 'Item-Offer', 5),
(13, 'fa-gift', 1, 'Icon-Offer', 1),
(14, 'fa-inbox', 2, 'Icon-Offer', 2),
(15, 'fa-globe', 3, 'Icon-Offer', 3),
(16, 'fa-cloud-upload', 4, 'Icon-Offer', 4),
(17, 'fa-umbrella', 5, 'Icon-Offer', 5),
(18, 'fa-trash', 6, 'Icon-Offer', 6);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1432527015),
('m130524_201442_init', 1432527020),
('m140506_102106_rbac_init', 1432540036);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `frontIcon` int(11) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `package_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `item`, `frontIcon`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `package_id`) VALUES
(9, 1, 1, 1, NULL, NULL, NULL, NULL, 2),
(10, 2, 2, 1, NULL, NULL, NULL, NULL, 2),
(12, 3, 3, 0, NULL, NULL, NULL, NULL, 2),
(16, 4, 4, 0, NULL, NULL, NULL, NULL, 2),
(17, 5, 5, 0, NULL, NULL, NULL, NULL, 2),
(18, 1, 1, 1, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `order_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `user_id1` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `order_id`, `package_id`, `status`, `created_by`, `created_at`, `user_id1`) VALUES
(8, 2, 1, 1, 1, 1441730148, 1441730148, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(80) NOT NULL DEFAULT '',
  `maxCallOut` int(11) NOT NULL COMMENT 'maximum of callouts allowed',
  `maxAllowedCode` int(11) NOT NULL COMMENT 'number of given code',
  `enable` int(11) DEFAULT '0' COMMENT 'Status of the package',
  `code` varchar(19) DEFAULT NULL COMMENT 'package code',
  `videoMaxSize` varchar(7) DEFAULT '1000',
  `pictureMaxSize` varchar(7) DEFAULT '512',
  `minBalance` int(11) DEFAULT NULL COMMENT 'Minimum balamce on callouts',
  `update_by` int(11) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `maxCallOut`, `maxAllowedCode`, `enable`, `code`, `videoMaxSize`, `pictureMaxSize`, `minBalance`, `update_by`, `updated_at`, `create_by`, `created_at`) VALUES
(2, 'Free Package', 50, 1, 1, 'PKGT12015', '', '', NULL, 1, 1441861640, 1, 1441702935),
(3, 'Package 1', 1500, 1, 1, 'PKGT252015', '', '', NULL, 1, 1441861676, 1, 1441784925),
(4, 'Package 2', 5000, 1, 1, 'PKGT32015', '', '', NULL, 1, 1441861710, 1, 1441861710),
(5, 'Package 3', 10000, 1, 1, 'PKGT452015', '', '', NULL, 1, 1441861740, 1, 1441861740);

-- --------------------------------------------------------

--
-- Table structure for table `setting_item`
--

CREATE TABLE IF NOT EXISTS `setting_item` (
  `id` int(11) NOT NULL,
  `name` varchar(101) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_item`
--

INSERT INTO `setting_item` (`id`, `name`, `update_by`, `create_by`) VALUES
(1, 'layout', NULL, NULL),
(2, 'unify', NULL, NULL),
(3, 'inspinia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `id` int(11) NOT NULL,
  `top_package` varchar(80) NOT NULL,
  `rate` float NOT NULL,
  `total_callout` int(11) NOT NULL,
  `price` float NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `top_package`, `rate`, `total_callout`, `price`, `enable`) VALUES
(1, '500', 0.2, 500, 100, 1),
(2, '1000', 0.15, 1000, 150, 1),
(3, '10000', 0.1, 10000, 1000, 1),
(4, '100000', 0.05, 100000, 5000, 1),
(5, '500000', 0.03, 500000, 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '7',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '5QgSFLJaRv4Rr1wZ3sVBjMw9IStH7pK1', '$2y$13$jQ2cBEwxWubRtF853Xpfe.pVG4mEikyUjJfXsOrV/MDYFXz6FutdC', NULL, 'fahmy@aptinventions.com', 10, 1432527060, 1432527060),
(4, 'hafiz', 'ZgDKSsT86pzwLnx9TTPSnBCg0vNl_-oA', '$2y$13$DAcaXvFWIHUEFhj1ciBXduOZSWHCD/UNuzXqqQfLV5przLud2cxRO', NULL, 'hafiz@bb.com', 7, 1439791273, 1439791273);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contest_main`
--
ALTER TABLE `contest_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_code`
--
ALTER TABLE `cust_code`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `package_id_UNIQUE` (`package_id`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`,`package_id`), ADD KEY `fk_offer_package1_idx` (`package_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`,`user_id1`), ADD KEY `fk_order_user1_idx` (`user_id1`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `package_code_idx` (`code`);

--
-- Indexes for table `setting_item`
--
ALTER TABLE `setting_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `contest_main`
--
ALTER TABLE `contest_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `cust_code`
--
ALTER TABLE `cust_code`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lookup`
--
ALTER TABLE `lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting_item`
--
ALTER TABLE `setting_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
ADD CONSTRAINT `fk_offer_package1` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id1`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
