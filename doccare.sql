-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 05:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doccare`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinicid` int(3) NOT NULL,
  `doc_id` int(3) NOT NULL,
  `clinicname` varchar(40) NOT NULL,
  `caddress` varchar(30) NOT NULL,
  `city` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `estproof` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor-registration`
--

CREATE TABLE `doctor-registration` (
  `doc_id` int(3) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `token` varchar(40) NOT NULL,
  `registration_status` varchar(10) NOT NULL,
  `saluation` varchar(5) NOT NULL,
  `spec_id` int(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `regnumber` varchar(15) NOT NULL,
  `council` varchar(30) NOT NULL,
  `year` int(5) NOT NULL,
  `docregpic` varchar(80) NOT NULL,
  `experience` int(5) NOT NULL,
  `about` varchar(255) NOT NULL,
  `verification_status` int(2) NOT NULL,
  `ban_status` int(2) NOT NULL DEFAULT 0,
  `del_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor-registration`
--

INSERT INTO `doctor-registration` (`doc_id`, `fname`, `lname`, `email`, `password`, `token`, `registration_status`, `saluation`, `spec_id`, `city`, `state`, `regnumber`, `council`, `year`, `docregpic`, `experience`, `about`, `verification_status`, `ban_status`, `del_status`) VALUES
(27, 'Sivasagar', 'college', 'pmanna097@gmail.com', '$2y$10$4xcr2qJt91ClBTliTO4HVOYCu5XW44GZ588HWhJ8UFFt1.5QEtvXK', '179ae92728096b0e9c15', '0', '', 0, '', '', '', '', 0, '', 0, '', 0, 0, 0),
(31, 'qwqwqzzzzzzzzzzzzzz', 'qwqwqqqqqqqqq', 'www.prasenjitmanna@gmail.com', '$2y$10$ySAxAe8pB00lNZUqYZbcoORcoAS1ZlQNlFFIM1zYkMdZG/YfzWsgy', '2cea5635cb9bfc7357e776873f90cb', '0', '', 0, '', '', '', '', 0, '', 0, '', 0, 0, 0),
(32, 'Prasenjit', 'Manna', 'assazmenter5@gmail.com', '$2y$10$.SVGrq3L6ZnyktN.svpzIO88GKXK920HGMII1/KYUjI0SeZ1zIiIW', '6e4243e90ce91a2a0ac3ff95451f44', '0', '', 0, '', '', '', '', 0, '', 0, '', 0, 0, 0),
(33, 'Prasenjit', 'Manna', 'assamennter5@gmail.com', '$2y$10$PtS2psbwj4T7OzJOOl.LEumn2stPzemuMq6VEYzrXIf302O6p5.tC', 'b3755931ec15709ab55150e3bae50c', '1', 'Dr', 11, 'Sibsagar', 'state', '15115', 'Tamil Nadu Medical Council', 2021, 'doctor/', 1, '', 0, 0, 0),
(34, 'PANCHAMI', 'MANNA', 'assamenter5@gmail.com', '$2y$10$J4VpZ6GNblkFkO6OfYHFpeUrczK7ACmxMeiuOFSGpKjwTn9xSN6vC', 'a81f30d2d0577a8452d2057527b7a8', '1', 'Dr', 18, 'Sibsagar', 'Assam', '15115', 'Select Council', 2021, 'doctor/', 5, 'fxbnbnbnbng vjkdfx', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `id` int(3) NOT NULL,
  `clinicid` int(3) NOT NULL,
  `doc_id` int(3) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `average_consulting_time` int(5) NOT NULL,
  `fees` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_specialist`
--

CREATE TABLE `doc_specialist` (
  `spec_id` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_specialist`
--

INSERT INTO `doc_specialist` (`spec_id`, `specialization`) VALUES
(3, 'Diabetology'),
(4, 'Cardiology'),
(5, 'Dentist'),
(6, 'Dermatologist'),
(7, 'Gynecologist'),
(8, 'Neurologist(brain)'),
(9, 'Medicine'),
(10, 'Gastroterologists'),
(11, 'Family Physicians'),
(12, 'Internists'),
(13, 'Nephrologists'),
(14, 'Oncologists'),
(15, 'Otolaryngologists'),
(16, 'Plastic Surgeons'),
(17, 'Pulmonlogists'),
(18, 'General Surgeons'),
(19, 'Ayurveda'),
(20, 'veterinary'),
(21, 'Vascular Surgery'),
(22, 'Yoga Therapy'),
(23, 'Primary Care'),
(24, 'Public Health'),
(25, 'Speech Therapist'),
(26, 'Urology'),
(27, 'Physiotherapist'),
(28, 'Psychology'),
(29, 'Nutrition'),
(30, 'Homepathy'),
(31, 'Pathology'),
(32, 'Orthopedic Surgery'),
(33, 'Nuclear Medicine'),
(34, 'Infectious Disease'),
(35, 'Infertility Disease'),
(36, 'Allergy/Immunology'),
(37, 'Cardiac Electrophysiology'),
(38, 'Colorectal Surgeon'),
(39, 'Audiology'),
(40, 'Acupuncturist'),
(41, 'Endocrinology'),
(42, 'Embryology Service'),
(43, 'Epidemiology'),
(44, 'Endodontists');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(3) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(10) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'aaa', 'Manna', 'www.prasenjitmanna@gmail.com', 'aaaa'),
(2, 'Prasenjit', 'Manna', 'Pmanna097@Gmail.Com', 'sss'),
(3, 'Prasenjit', 'Manna', 'Pmanna097@Gmail.Com', 'sss'),
(4, 'Prasenjit', 'Manna', 'www.prasenjitmanna@gmail.com', 'qq'),
(5, 'Prasenjit', 'Manna', 'Pmanna097@Gmail.Com', 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicid`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `doctor-registration`
--
ALTER TABLE `doctor-registration`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_specialist`
--
ALTER TABLE `doc_specialist`
  ADD PRIMARY KEY (`spec_id`) USING BTREE;

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinicid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor-registration`
--
ALTER TABLE `doctor-registration`
  MODIFY `doc_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_specialist`
--
ALTER TABLE `doc_specialist`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor-registration` (`doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
