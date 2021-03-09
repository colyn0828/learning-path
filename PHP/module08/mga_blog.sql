-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 02:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgao7`
--

-- --------------------------------------------------------

--
-- Table structure for table `mga_blog`
--

CREATE TABLE `mga_blog` (
  `mga_title` varchar(50) NOT NULL,
  `mga_message` text NOT NULL,
  `mga_timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `bid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mga_blog`
--

INSERT INTO `mga_blog` (`mga_title`, `mga_message`, `mga_timedate`, `bid`) VALUES
('ANAP1525', 'Systems Analysis and Design I  :(  :(  :o ', '2021-03-02 19:14:05', 1),
('CMIS1014', 'System Foundations :)  :) ', '2021-03-02 19:14:24', 2),
('COMP1008', 'Digital Graphic Design Tools :)  :)  :) ', '2021-03-02 19:14:43', 3),
('COMP1017', 'Web Design Fundamentals I :)  :)  :)  :)  :) ', '2021-03-02 19:14:59', 4),
('CPSC1520', 'Client-Side Scripting with JavaScript :)  :(  :{ ', '2021-03-02 19:16:34', 6),
('CPSC1012', 'Programming Fundamentals :o  :o  :o ', '2021-03-02 19:15:41', 5),
('DMIT1001', 'Communications for Digital Media & IT :(  :(  :{ ', '2021-03-02 19:16:58', 7),
('DMIT1528', 'Web Business Essentials :o  :o  :( ', '2021-03-02 19:19:10', 8),
('DMIT1530', 'Web Design Fundamentals II :(  :(  :{  :) ', '2021-03-02 19:20:16', 9),
('DMIT2000', 'Advanced Communication for Digital Media and IT :)  :)  :{  :) ', '2021-03-02 19:20:37', 10),
('DMIT2008', 'Front-End Development :o  :o  :o  :o  :o  :o  :o  :o  :o  :o  :o ', '2021-03-02 19:21:06', 11),
('DMIT2025', 'PHP and MySQL :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :)  :) ', '2021-03-02 19:21:55', 12),
('ORGB1500', 'Organizational Behaviour for Media and IT :o  :(  :) ', '2021-03-02 19:22:14', 13),
('CPSC1517', 'Intro to App Development :{  :{  :{ ', '2021-03-02 19:24:06', 14),
('DMIT2504', 'Android Development :{  :{  :{  :{  :(  :(  :)  :) ', '2021-03-02 19:24:37', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mga_blog`
--
ALTER TABLE `mga_blog`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mga_blog`
--
ALTER TABLE `mga_blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
