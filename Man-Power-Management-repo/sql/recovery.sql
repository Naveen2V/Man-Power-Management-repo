-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 07:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `ID` varchar(10) DEFAULT NULL,
  `First_name` varchar(30) DEFAULT NULL,
  `Last_name` varchar(30) DEFAULT NULL,
  `Birthday` varchar(10) DEFAULT NULL,
  `Employee_Address` varchar(60) DEFAULT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Alternative_Phone_Number` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Aadher_num` varchar(20) DEFAULT NULL,
  `Pan_num` varchar(15) DEFAULT NULL,
  `Skill_Set` varchar(20) DEFAULT NULL,
  `Skill_Set2` varchar(20) DEFAULT NULL,
  `Skill_Set3` varchar(20) DEFAULT NULL,
  `Skill_Set4` varchar(20) DEFAULT NULL,
  `Skill_Set5` varchar(20) DEFAULT NULL,
  `Department` varchar(20) DEFAULT NULL,
  `sqlid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`ID`, `First_name`, `Last_name`, `Birthday`, `Employee_Address`, `Phone_Number`, `Alternative_Phone_Number`, `Email`, `Aadher_num`, `Pan_num`, `Skill_Set`, `Skill_Set2`, `Skill_Set3`, `Skill_Set4`, `Skill_Set5`, `Department`, `sqlid`) VALUES
('20CS081', ' Greyson', 'B', '2006-07-01', 'Monterrey, Mexico', '+91 9880907548', '+91 8350825938', 'Greyson20060701@gmail.com', '0372 1129 3682', 'GVRVP4469M', 'PHP', 'Python', 'JavaScript', 'JavaScript', 'R', 'Store', 1),
('20ME201', 'Hariharan', 'A', '2003-08-01', 'Rasht, Iran', '+91 9390348529', '+91 9583452918', 'Hariharan20030801@gmail.com', '3601 3278 0098', 'SAPXB2196X', 'Scala', 'CSS', 'Scheme', 'R', 'C#', 'Production', 4),
('20CS002', ' Noah', 'D', '2003-07-01', 'JAKARTA, Indonesia', '+91 6090413542', '+91 9403658712', ' Noah20030701@gmail.com', '6804 5316 0192', 'EEDRL5869Q', 'Scheme', 'HTML', 'R', 'MATLAB', 'SQL', 'Maintenance', 5),
('20CS001', ' Liam', 'G', '2005-10-01', 'TOKYO, Japan', '+91 7599622264', '+91 7878111581', ' Liam20051001@gmail.com', '0659 1495 5977', 'EDEPG4687N', 'Ruby', 'PHP', 'Scheme', 'C++', 'Ruby', 'Maintenance', 10),
('20CS003', ' Oliver', 'J', '2005-07-01', 'New York (NY), United States', '+91 6066685818', '+91 7615874335', ' Oliver20050701@gmail.com', '0442 9137 3852', 'UGWML0251R', 'Ruby', 'Perl', 'TypeScript', 'C++', 'Swift', 'R&D', 11),
('20CS0010', ' Alexander', 'U', '2005-10-01', 'Osaka, Japan', '+91 7447356843', '+91 9582229907', ' Alexander20051001@gmail.com', '4356 8673 4021', 'IMVEP9822M', 'Golang (Go)', 'MATLAB', 'Scala', 'Java', 'HTML', 'Production', 12),
('20CS005', ' William', 'H', '2000-10-01', 'MANILA, Philippines', '+91 8083099025', '+91 9480001015', ' William20001001@gmail.com', '3204 2662 7511', 'VYQHP0686V', 'Golang (Go)', 'HTML', 'Swift', 'HTML', 'Golang (Go)', 'Quality', 13),
('20CS006', ' James', 'B', '2001-03-01', 'Mumbai (Bombay), India', '+91 9649511703', '+91 9082716287', ' James20010301@gmail.com', '3207 8354 7455', 'EVOUG5501E', 'Java', 'Perl', 'Scheme', 'CSS', 'C++', 'Quality', 14),
('20CS007', ' Benjamin', 'P', '2005-07-01', 'Sao Paulo, Brazil', '+91 9559852892', '+91 9361188236', ' Benjamin20050701@gmail.com', '5591 0967 7820', 'LPQRP5857B', 'TypeScript', 'SQL', 'CSS', 'Perl', 'C#', 'Other', 15),
('20CS008', ' Lucas', 'M', '2006-07-01', 'MEXICO CITY, Mexico', '+91 9591212539', '+91 9004711107', ' Lucas20060701@gmail.com', '2634 2408 0986', 'TBFDP5577G', 'Swift', 'JavaScript', 'Kotlin', 'Scala', 'HTML', 'Other', 16),
('20CS011', ' Mason', 'D', '2006-11-11', 'CAIRO, Egypt', '+91 6452103228', '+91 9982735879', ' Mason20061111@gmail.com', '0218 7402 1712', 'QVUKP8008Q', 'CSS', 'R', 'SQL', 'CSS', 'JavaScript', 'Store', 17),
('20CS009', ' Henry', 'M', '2001-03-01', 'Delhi, India', '+91 9381387650', '+91 9536035573', ' Henry20010301@gmail.com', '1335 6553 8077', 'QGJCA6070J', 'Scheme', 'Golang (Go)', 'Golang (Go)', 'TypeScript', 'Scala', 'Production', 18),
('20CS012', ' Michael', 'U', '2001-03-01', 'Kolkata (Calcutta), India', '+91 7957932761', '+91 9076582561', ' Michael20010301@gmail.com', '5356 4898 3375', 'BDXNP2054L', 'Scala', 'C#', 'MATLAB', 'Golang (Go)', 'CSS', 'R&D', 19),
('20CS013', ' Ethan', 'S', '2005-07-01', 'Los Angeles (CA), United States', '+91 9074421262', '+91 9624735446', ' Ethan20050701@gmail.com', '2259 4500 3855', 'KKXTP3967Y', 'R', 'C++', 'C#', 'Rust', 'Python', 'Maintenance', 20),
('20CS014', ' Daniel', 'T', '2000-11-01', 'Shanghai, China', '+91 9473357104', '+91 6242978294', ' Daniel20001101@gmail.com', '8460 4551 1244', 'KWVPJ2564K', 'Java', 'Golang (Go)', 'Python', 'C#', 'C#', 'Staffs', 21),
('20CS015', ' Jacob', 'Q', '2006-07-01', 'MOSCOW, Russia', '+91 9210451183', '+91 7230623859', 'Jacob20060701@gmail.com', '8191 1078 6160', 'DXLWF8287Y', 'Kotlin', 'Java', 'R', 'python', 'C#', 'Production', 22),
('20CS022', ' Owen', 'N', '1999-03-08', 'PARIS, France', '+91 9658800745', '+91 9869434507', ' Owen19990308@gmail.com', '7776 7392 8879', 'YKXCG7388M', 'Perl', 'Scala', 'Scala', 'Java', 'Scala', 'Store', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`sqlid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `sqlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
