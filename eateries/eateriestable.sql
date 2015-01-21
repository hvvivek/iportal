-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2015 at 01:34 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `eateries`
--

CREATE TABLE IF NOT EXISTS `eateries` (
`ID` int(11) NOT NULL,
  `Eatery` varchar(200) NOT NULL,
  `Timings` varchar(300) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `IMenu` varchar(600) NOT NULL,
  `DMenu` varchar(600) NOT NULL,
  `MDetails` varchar(30000) NOT NULL,
  `SDetails` varchar(30000) NOT NULL,
  `BImages` varchar(600) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `eateries`
--

INSERT INTO `eateries` (`ID`, `Eatery`, `Timings`, `Position`, `IMenu`, `DMenu`, `MDetails`, `SDetails`, `BImages`) VALUES
(1, 'La_Salade', 'Monday_03:00,PM_12:00,AM/Tuesday_03:00,PM_12:00,AM/Wednesday_03:00,PM_12:00,AM/Thursday_03:00,PM_12:00,AM/Friday_03:00,PM_12:00,AM/Saturday_03:00,PM_12:00,AM/Sunday_03:00,PM_12:00,AM', '12.987091,80.235666', 'las_menu.png,las_menu_1.png', 'La_salade_Menu.pdf', 'priyeshkumar81@gmail.com,9841577300,Mr.Priyesh', 'Sasidhar_Kasi,ME10B085,Jamuna,kasisasidhar5@gmail.com/Ankit_Tandekar,BE12B001,Alakananda,ankittandekar@gmail.com/Kishore_K_S,CE13B025,Saraswathi,kishoreks1995@gmail.com', 'las.jpg,las_1.jpg'),
(2, 'Kickstart', 'Monday_11:30,AM_02:00,AM/Tuesday_11:30,AM_02:00,AM/Wednesday_11:30,AM_02:00,AM/Thursday_11:30,AM_02:00,AM/Friday_11:30,AM_02:00,AM/Saturday_11:30,AM_02:00,AM/Sunday_11:30,AM_02:00,AM', '12.991402,80.234413', 'KS.jpg,KS_1.jpg', 'Kickstart_menu.pdf', 'thekickstartcafe@gmail.com,9840014899,Mr.Pratik', 'L.Leela_Sailaja,CH11B032,Sharavati,leelasailajalalam@gmail.com/Ankita_Naik,MM12B045,Sharavati,ankinikee@gmail.com/Yashasweee_Pal,MM13B036,Sharavati,yashasweepal95@gmail.com', ''),
(3, 'Andavar', 'Monday_08:00,AM_10:30,PM/Tuesday_08:00,AM_10:30,PM/Wednesday_08:00,AM_10:30,PM/Thursday_08:00,AM_10:30,PM/Friday_08:00,AM_10:30,PM/Saturday_08:00,AM_10:30,PM/Sunday_08:00,AM_10:30,PM', '12.986765,80.235064', 'AM.jpg,AM_1.jpg,AM_2.jpg', 'Andavar_Menu.pdf', 'andavarfresh@gmail.com,9884338585,Mr.Kalaiselvan', 'Sasidhar_Kasi,ME10B085,Jamuna,kasisasidhar5@gmail.com/Aditya_Malpani,AE12B040,Godavari,aditya8993@gmail.com/A_L_P_Rayudu,NA12B001,Alakananda,abbireddynani@gmail.com', ''),
(4, 'Gurunath', 'Monday_09:00,AM_09:00,PM/Tuesday_09:00,AM_09:00,PM/Wednesday_09:00,AM_09:00,PM/Thursday_09:00,AM_09:00,PM/Friday_09:00,AM_09:00,PM/Saturday_09:00,AM_09:00,PM/Sunday_09:00,AM_09:00,PM', '12.986832,80.235330', 'guru_1.jpg,guru_2.jpg,guru_3.jpg,guru_4.jpg,guru_5.jpg', 'guru_dept.pdf', 'sreegurunath@gmail.com,9444777268,Mr.Nagaraj', 'L.Leela_Sailaja,CH11B032,Sharavati,leelasailajalalam@gmail.com/Ankit_Tandekar,BE12B001,Alakananda,ankittandekar@gmail.com/Kishore_K_S,CE13B025,Saraswathi,kishoreks1995@gmail.com', ''),
(5, 'IRCTC', 'Monday_Open,24*7_Never,Closes/Tuesday_Open,24*7_Never,Closes/Wednesday_Open,24*7_Never,Closes/Thursday_Open,24*7_Never,Closes/Friday_Open,24*7_Never,Closes/Saturday_Open,24*7_Never,Closes/Sunday_Open,24*7_Never,Closes', '12.987673,80.237251', 'IRCTC.jpg,IRCTC_1.jpg', 'irctc_menu.pdf', 'cchakrapani2629@irctc.com,9003120270,Mr.Chakarapani', 'Sasidhar_Kasi,ME10B085,Jamuna,kasisasidhar5@gmail.com/Aditya_Malpani,AE12B040,Godavari,aditya8993@gmail.com/A_L_P_Rayudu,NA12B001,Alakananda,abbireddynani@gmail.com', ''),
(6, 'OAT_Eatery', 'Friday_8:00,PM,(If,movie,is,screened)_Closes,after,the,movie/Saturday_8:00,PM_Closes,after,the,movie', '12.988664,80.233893', 'OAT_Eatery.jpg', 'OAT_Eatery.pdf', ',9884775423,Mr.Sridhar', '', ''),
(7, 'Gurunath_Eatery', 'Monday_09:00,AM_01:00,AM/Tuesday_09:00,AM_01:00,AM/Wednesday_09:00,AM_01:00,AM/Thursday_09:00,AM_01:00,AM/Friday_09:00,AM_01:00,AM/Saturday_09:00,AM_01:00,AM/Sunday_09:00,AM_01:00,AM', '12.986811,80.235400', 'gurue_1.jpg,gurue_2.jpg,gurue_3.jpg,gurue_4.jpg,gurue_5.jpg,gurue_6.jpg,gurue_7.jpg,gurue_8.jpg,gurue_9.jpg,gurue_10.jpg,gurue_11.jpg,gurue_12.jpg', 'guru_dept.pdf', 'sreegurunath@gmail.com,9444777268,Mr.Nagaraj', 'Sasidhar_Kasi,ME10B085,Jamuna,kasisasidhar5@gmail.com/Ankit_Tandekar,BE12B001,Alakananda,ankittandekar@gmail.com/Kishore_K_S,CE13B025,Saraswathi,kishoreks1995@gmail.com', ''),
(8, 'Ramu_Tea_Stall', 'Monday_12:00,PM_04:00,AM/Tuesday_12:00,PM_04:00,AM/Wednesday_12:00,PM_04:00,AM/Thursday_12:00,PM_04:00,AM/Friday_12:00,PM_04:00,AM/Saturday_12:00,PM_04:00,AM/Sunday_12:00,PM_04:00,AM', '12.987080,80.236280', '', '', ',9884444489,Mr.Ramu', 'Sasidhar_Kasi,ME10B085,Jamuna,kasisasidhar5@gmail.com/Roja_Immanni,NA11B013,Sharavati/N.Shakthi_Priya,,,sakthipriya6788@gmail.com', '');

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
