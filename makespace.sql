-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2014 at 08:41 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `makespace`
--
CREATE DATABASE IF NOT EXISTS `makespace` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `makespace`;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `connecion_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1` varchar(100) NOT NULL,
  `user_2` varchar(100) NOT NULL,
  `pending` int(11) NOT NULL,
  PRIMARY KEY (`connecion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`connecion_id`, `user_1`, `user_2`, `pending`) VALUES
(18, 'Test', 'Brenz', 0),
(19, 'Brenz', 'Tim', 0),
(23, 'Remste', 'Tim', 0),
(24, 'Remste', 'Test', 0),
(26, 'Brenz', 'Remste', 0),
(29, 'Demo2', 'Remste', 0),
(30, 'Demo', 'Remste', 0),
(31, 'Duncan', 'Tim', 0),
(32, 'Brenz', 'Spillerz', 0),
(33, 'Remste', 'Spillerz', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `message` varchar(5000) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=310 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `from_user`, `to_user`, `message`) VALUES
(285, 19, 26, 'U2FsdGVkX18zUPE1tnUCgMxUfNepEh3MZ7/LVrSlOzU=');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `head` int(2) NOT NULL,
  `last_active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `head`, `last_active`) VALUES
(1, 'Tim', '$2y$12$CtQRUUOFSW6PCVnGvylLK.hDnw451JlQYr3oiTkTy1kGHXKqG0ux.', 4, '2014-02-10 11:55:45'),
(17, 'TimTest', '$2y$12$9bk/kw//FIV6BOMVKHIGletioDkCcCpm1AzI/ekY630d2oE3H5I3e', 1, '2014-02-09 12:59:31'),
(19, 'Remste', '$2y$12$lSuwZIq5glPol4Bx/pGVcOdnTwOIBs0LZXHfVRTt/acWgqnHrZl6q', 2, '2014-02-10 11:32:53'),
(20, 'Test', '$2y$12$zmZ5vzefkeAMlIoIn7i69.gCTyMR9WekH6CT5GMpR9LtRcM.Z.45K', 8, '2014-02-09 14:38:08'),
(21, 'Brenz', '$2y$12$8Wc/mO7nbx57Y4MPIVwljePWis4RVlGKfytLuc406ymqRKTLBZ4Ui', 3, '2014-02-10 18:01:45'),
(22, 'Timbo', '$2y$12$hpzPfrM4lRY/lXG.biX3GubrjSznMkovvqwZxBSZ6dFv1eerPsEq6', 5, '2014-02-09 16:19:21'),
(23, 'Demo2', '$2y$12$htDOglVPYAWXEgMayMlJQuYZg4wWILV/JBxmAXemfSSFcJwBthN0i', 2, '2014-02-09 16:45:04'),
(24, 'Demo', '$2y$12$H7sK..J6fN44HHG0k2s1ne/BUi50RblXWMEJXWvOUk/Mp.jve.5P2', 1, '2014-02-09 17:19:28'),
(25, 'Duncan', '$2y$12$bNdyj3Vukqo8AIAJA35CJejdwvsAeET5VY98IeASWMFlePsKwMl8y', 1, '2014-02-09 23:53:25'),
(26, 'Spillerz', '$2y$12$zRjiyftzt83s8Wd9uaG9xuvEzIxnY6zOUjVE.sTlhZ1H2YIph3MIa', 2, '2014-02-10 11:49:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
