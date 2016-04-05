-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2016 at 10:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demo`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryId` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `createdDate` date NOT NULL,
  PRIMARY KEY (`articleId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`categoryId`),
  KEY `PARENTID_IDX` (`parentId`) COMMENT 'Parent ID Indexes'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `parentId`, `name`, `description`) VALUES
(5, NULL, 'Operating System', 'Category to hold articles relevant to a specific type of Operating System'),
(6, 5, 'Linux', 'Linux HowTo, Notes, Documents'),
(7, 5, 'Unix Solaris', 'Oracle Solaris documents and information'),
(8, NULL, 'Server Setup and Configuration', 'Category for articles on setup various server such as WAMP, FTP, MySQL, Web Server, PHP Server'),
(9, NULL, 'Web Development', 'Technologies and Tools use in Web Development'),
(10, 9, 'PHP Programming Language ', 'PHP code snippet, howto'),
(11, 5, 'Microsoft Windows', 'All related articles with Microsoft Windows'),
(12, 10, 'Code Igniter Framework', 'Information and code snippet for Code Igniter Framework some thing long in the description to see it wrap around.'),
(13, 14, 'HTML', 'All about HTML 5 information'),
(14, 9, 'Web front end UI development tools', 'HTML/CSS/Java Scripts'),
(15, 14, 'CSS and CSS Framework', 'Articles about CSS, Bootstrap, Material Design Lite, or any other CSS framework'),
(16, 14, 'Javascripts', 'Java Script Framework, jQuery, AngularJS, JavaScript libraries');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `ArticleCategory_FK` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `ParentCategory_FK` FOREIGN KEY (`parentId`) REFERENCES `categories` (`categoryId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Recreate the demo user with password demo
--
GRANT USAGE ON *.* TO 'demo'@'%' IDENTIFIED BY PASSWORD '*C142FB215B6E05B7C134B1A653AD4B455157FD79';

--
-- Regrant all privileges to demo database to demo
--
GRANT ALL PRIVILEGES ON `demo`.* TO 'demo'@'%' WITH GRANT OPTION;
