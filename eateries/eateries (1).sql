-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2015 at 11:21 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `eateries`
--

CREATE TABLE IF NOT EXISTS `eateries` (
`ID` int(11) NOT NULL,
  `Eatery` varchar(200) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `IMenu` varchar(600) NOT NULL,
  `DMenu` varchar(600) NOT NULL,
  `MDetails` varchar(30000) NOT NULL,
  `BImages` varchar(600) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `eateries`
--

INSERT INTO `eateries` (`ID`, `Eatery`, `Position`, `IMenu`, `DMenu`, `MDetails`, `BImages`) VALUES
(1, 'La_Salade', '12.987091,80.235666', 'las_menu.png,las_menu_1.png', 'La_salade_Menu.pdf', 'priyeshkumar81@gmail.com,9841577300,Mr.Priyesh', 'las.jpg,las_1.jpg'),
(2, 'Kickstart', '12.991402,80.234413', 'KS.jpg,KS_1.jpg', 'Kickstart_menu.pdf', 'thekickstartcafe@gmail.com,9840014899,Mr.Pratik', ''),
(3, 'Andavar', '12.986765,80.235064', 'AM.jpg,AM_1.jpg,AM_2.jpg', 'Andavar_Menu.pdf', 'andavarfresh@gmail.com,9884338585,Mr.Kalaiselvan', ''),
(4, 'Gurunath', '12.986832,80.235330', 'guru_1.jpg,guru_2.jpg,guru_3.jpg,guru_4.jpg,guru_5.jpg', 'guru_dept.pdf', 'sreegurunath@gmail.com,9444777268,Mr.Nagaraj', ''),
(5, 'IRCTC', '12.987673,80.237251', 'IRCTC.jpg,IRCTC_1.jpg', 'irctc_menu.pdf', 'cchakrapani2629@irctc.com,9003120270,Mr.Chakarapani', ''),
(6, 'OAT_Eatery', '12.988664,80.233893', 'OAT_Eatery.jpg', 'OAT_Eatery.pdf', ',9884775423,Mr.Sridhar', ''),
(7, 'Gurunath_Eatery', '12.986811,80.235400', 'gurue_1.jpg,gurue_2.jpg,gurue_3.jpg,gurue_4.jpg,gurue_5.jpg,gurue_6.jpg,gurue_7.jpg,gurue_8.jpg,gurue_9.jpg,gurue_10.jpg,gurue_11.jpg,gurue_12.jpg', 'guru_dept.pdf', 'sreegurunath@gmail.com,9444777268,Mr.Nagaraj', ''),
(8, 'Ramu_Tea_Stall', '12.987080,80.236280', '', '', ',9884444489,Mr.Ramu', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eateries`
--
ALTER TABLE `eateries`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eateries`
--
ALTER TABLE `eateries`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
