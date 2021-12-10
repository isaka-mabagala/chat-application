-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 02:25 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `chat_id` varchar(100) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `chat_id`, `from_user`, `to_user`, `message`, `time`) VALUES
(28, '19', 1, 9, ' hey girl', 1533085218),
(29, '19', 9, 1, ' yes boy', 1533085225),
(30, '19', 1, 9, 'mambo', 1533085231),
(31, '19', 9, 1, 'poaaa vp', 1533085238),
(32, '19', 1, 9, ' saf mzma u ??', 1533161919),
(33, '13', 1, 3, ' Hello Mr. android :D', 1533219162),
(34, '19', 9, 1, ' m mzma cjui u', 1533372961),
(35, '19', 1, 9, ' m nipo gudiiii', 1533373054),
(36, '13', 3, 1, ' Niambie developer', 1533374116),
(38, '13', 1, 3, 'fresh', 1533408576),
(39, '13', 1, 3, ' poa poa', 1533411620),
(40, '13', 3, 1, ' nipe habar', 1533411742),
(41, '13', 3, 1, 'developer', 1533411990),
(42, '32', 3, 2, ' hello sir', 1533412080),
(43, '32', 2, 3, ' hello coder', 1533412165),
(44, '32', 2, 3, 'uko poaaaa', 1533412171),
(48, '13', 1, 3, 'Ile project vp ??', 1533722178),
(49, '13', 3, 1, ' aaaaaahh ngoja nmcheck jamaaa nakupa feedback now', 1533722574),
(50, '15', 1, 5, ' ooiiii adjeeeee', 1533725993),
(51, '15', 5, 1, ' poaaa vp bab', 1533726115),
(52, '15', 1, 5, ' Gudiiii mishe vp', 1533832672),
(55, '15', 5, 1, 'poaaa tyuuuu', 1533842997),
(60, '15', 5, 1, 'code vp', 1533843915),
(64, '15', 1, 5, 'zinaenda tyuuu kibish', 1533846667),
(65, '15', 1, 5, 'vp ww', 1533847647),
(72, '21', 2, 1, ' coder', 1533915418),
(73, '21', 1, 2, ' yes sir', 1533915433),
(74, '19', 9, 1, ' hey', 1534440346),
(75, '19', 1, 9, ' yes mambo', 1534440527);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `file` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `file`) VALUES
(1, 'sms', 'chat_sms'),
(2, 'profile', 'profile'),
(3, 'user_info', 'user_info');

-- --------------------------------------------------------

--
-- Table structure for table `unread_msg`
--

CREATE TABLE `unread_msg` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unread_msg`
--

INSERT INTO `unread_msg` (`id`, `chat_id`, `user_id`, `unread`) VALUES
(1, 19, 9, 0),
(2, 13, 3, 2),
(5, 15, 5, 0),
(12, 21, 2, 1),
(13, 21, 1, 0),
(14, 19, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `real_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `description`, `avatar`, `password`, `time`, `real_time`) VALUES
(1, 'isaxstar', 'Web and system developer', '', '827ccb0eea8a706c4c34a16891f84e7b', 1531951200, 1535545065),
(2, 'jabir', 'Asst. Head Mkulima Library - SNAL.', '20180728_005101.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1531951200, 1533919174),
(3, 'lymo', 'I stop caring....', '20180727_185709.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1531951200, 1533733490),
(4, 'muddy', 'Lips denda', '20180727_185831.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532469600, 1532910996),
(5, 'g.love', 'Available', '', '827ccb0eea8a706c4c34a16891f84e7b', 1532469600, 1534880281),
(6, 'noel', 'Precious Memory!', '20180727_185754.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532469600, 1532179897),
(7, 'dethree', 'SmArT LiFe....@%**De3', '20180727_185418.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532469600, 1534087041),
(8, 'jimmy', 'Deep within I celebrate ur amaizn Grace(Thank u lord)', '20180727_185537.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532705100, 1532889184),
(9, 'lizzy', 'God\'s grace', '20180727_185625.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532705100, 1534684087),
(10, 'mary', 'hey there! I am using online chat', '', '827ccb0eea8a706c4c34a16891f84e7b', 1532705100, 1532889184),
(11, 'neema', 'Papaaaaaaaa', '20180727_185304.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532723940, 1532642400),
(12, 'tausi', 'Yes!..Jesus is My King', '', '827ccb0eea8a706c4c34a16891f84e7b', 1532724480, 1532921884),
(13, 'p.khama', 'money making monster.', '20180727_230808.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 1532732610, 1532636800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unread_msg`
--
ALTER TABLE `unread_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unread_msg`
--
ALTER TABLE `unread_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
