-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminUserName` varchar(50) NOT NULL,
  `AdminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminUserName`, `AdminPass`) VALUES
('admin1', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_ID` int(11) NOT NULL,
  `DR_USERNAME` varchar(50) NOT NULL,
  `PATIENTNAME` varchar(50) NOT NULL,
  `Day` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `specialization` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_ID`, `DR_USERNAME`, `PATIENTNAME`, `Day`, `Time`, `specialization`) VALUES
(30, 'doctor1', 'ammarM', '0001-01-01', '01:01 AM', 'Neurologist'),
(31, 'doctor2', 'ahmedY992', '0001-01-01', '02:01 AM', 'Dentist'),
(57, 'doctor2', 'matar2020', '0001-01-11', '11:01 AM', 'Dentist'),
(58, 'doctor2', 'matar2020', '0002-01-01', '01:01 AM', 'Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DR_Name` varchar(50) NOT NULL,
  `DR_username` varchar(50) NOT NULL,
  `DR_password` varchar(50) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Phonenumber` int(11) NOT NULL,
  `Specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DR_Name`, `DR_username`, `DR_password`, `Shift`, `Phonenumber`, `Specialization`) VALUES
('Ahmed Mostafa', 'doctor1', 'doctor1234', 'Morning', 1026785357, 'Neurologist'),
('Adham Selim', 'doctor10', 'doctor', 'Morning', 117765890, 'Cardiologist'),
('Abed Helmy', 'doctor2', 'doctor', 'Morning', 1134894467, 'Dentist'),
('Ayman Noah', 'doctor4', 'doctor', 'Night', 1155346890, 'Dermatologist'),
('fdfsdfsd', 'fsdfsdf42434', 'doctor1234', 'Morning', 3424324, 'Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `medicalreport`
--

CREATE TABLE `medicalreport` (
  `REPORT_ID` varchar(50) NOT NULL,
  `DRNAME` varchar(50) DEFAULT NULL,
  `PatientName` varchar(50) NOT NULL,
  `DIAGNOSIS` varchar(50) NOT NULL,
  `Prescription` varchar(50) NOT NULL,
  `AppointmentTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalreport`
--

INSERT INTO `medicalreport` (`REPORT_ID`, `DRNAME`, `PatientName`, `DIAGNOSIS`, `Prescription`, `AppointmentTime`) VALUES
('Report-1', 'doctor2', 'ahmadBanna1', 'Cancer', 'lebos', '00:20:00'),
('Report-2', 'doctor10', 'kareem2000', 'Diabetes', 'panadol', '00:00:00'),
('Report-3', 'doctor2', 'matar2020', 'dasdasd', 'dasdasdas', '00:00:00'),
('Report-4', 'doctor1', 'ammarM', 'dasdasd', 'dasdasdas', '00:00:00'),
('Report-5', 'doctor1', 'matar2020', 'dasdasd', 'dasdasdas', '00:00:00'),
('Report-7', 'doctor1', 'matar2020', 'sdadasd', 'dsadasd', '01:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Name`, `Username`, `Email`, `Password`) VALUES
('Ahmad Salah', 'ahmadBanna1', 'ahmad192098@bue.edu.eg', 'user12345678'),
('Ahmed Yasser', 'ahmedY992', 'ahmed187098@bue.edu.eg', 'user12345678'),
('Ammar Montaser', 'ammarM', 'ammar182@bue.edu.eg', 'user12345678'),
('Belal mohamed', 'belalM122', 'belal187364@bue.edu.eg', 'user12345678'),
('Kareem Abed', 'kareem2000', 'kareem180973@bue.edu.eg', 'user12345678'),
('Ammar Sayedvbvbvvbvb', 'matar2020', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnn@yahoo.com', 'user12345678'),
('Omar Wael', 'omarW99', 'omar179550@bue.edu.eg', 'user12345678'),
('Sarah Ahmad', 'sAhmed', 'sarah187630@bue.edu.eg', 'user12345678'),
('Shehab Yasser', 'shehabY', 'shehab180975@bue.edu.eg', 'user12345678'),
('Mostafa Wael', 'waelM239', 'mostafa179843@bue.edu.eg', 'user12345678');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `RUserName` varchar(50) NOT NULL,
  `RPassword` varchar(50) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`RUserName`, `RPassword`, `Shift`, `Name`) VALUES
('Receptionist1', 'receptionist1', 'Morning', 'ahmed'),
('Receptionist2', 'receptionist1', 'Night', 'mona');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminUserName`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_ID`),
  ADD KEY `doctorFK` (`DR_USERNAME`),
  ADD KEY `Patientfk` (`PATIENTNAME`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DR_username`);

--
-- Indexes for table `medicalreport`
--
ALTER TABLE `medicalreport`
  ADD PRIMARY KEY (`REPORT_ID`),
  ADD KEY `punFK` (`PatientName`),
  ADD KEY `dunFK` (`DRNAME`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`RUserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `Patientfk` FOREIGN KEY (`PATIENTNAME`) REFERENCES `patient` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorFK` FOREIGN KEY (`DR_USERNAME`) REFERENCES `doctor` (`DR_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalreport`
--
ALTER TABLE `medicalreport`
  ADD CONSTRAINT `dunFK` FOREIGN KEY (`DRNAME`) REFERENCES `doctor` (`DR_username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `punFK` FOREIGN KEY (`PatientName`) REFERENCES `patient` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
