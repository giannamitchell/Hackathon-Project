-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 04:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `alert_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `alert_type` varchar(50) DEFAULT NULL,
  `alert_message` text DEFAULT NULL,
  `alert_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alert_id`, `patient_id`, `alert_type`, `alert_message`, `alert_timestamp`) VALUES
(1, 1, NULL, 'Abnormal heart rate detected!', '2025-03-23 15:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `phone_number`, `address`) VALUES
(1, 'John', 'Doe', '1980-05-10', 'Male', 'johndoe@example.com', '123-456-7890', '123 Main St, City, Country');

-- --------------------------------------------------------

--
-- Table structure for table `patient_login`
--

CREATE TABLE `patient_login` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

CREATE TABLE `patient_registration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender_identity` varchar(50) DEFAULT NULL,
  `preferred_pronouns` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `ssn` varchar(50) DEFAULT NULL,
  `primary_language` varchar(100) DEFAULT NULL,
  `ethnicity` varchar(100) DEFAULT NULL,
  `race` varchar(100) DEFAULT NULL,
  `permanent_address` text NOT NULL,
  `mailing_address` text DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_relationship` varchar(100) NOT NULL,
  `emergency_phone` varchar(20) NOT NULL,
  `emergency_address` text DEFAULT NULL,
  `primary_insurance` varchar(255) DEFAULT NULL,
  `policy_number` varchar(100) DEFAULT NULL,
  `group_number` varchar(100) DEFAULT NULL,
  `secondary_insurance` varchar(255) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `current_medications` text DEFAULT NULL,
  `pre_existing_conditions` text DEFAULT NULL,
  `past_surgeries` text DEFAULT NULL,
  `family_medical_history` text DEFAULT NULL,
  `hipaa_authorization` tinyint(1) DEFAULT 0,
  `consent_to_treatment` tinyint(1) DEFAULT 0,
  `financial_responsibility` tinyint(1) DEFAULT 0,
  `release_of_information` tinyint(1) DEFAULT 0,
  `patient_signature` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `witness_signature` varchar(255) DEFAULT NULL,
  `witness_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_registration`
--

INSERT INTO `patient_registration` (`id`, `full_name`, `date_of_birth`, `gender_identity`, `preferred_pronouns`, `marital_status`, `ssn`, `primary_language`, `ethnicity`, `race`, `permanent_address`, `mailing_address`, `phone_number`, `email_address`, `emergency_name`, `emergency_relationship`, `emergency_phone`, `emergency_address`, `primary_insurance`, `policy_number`, `group_number`, `secondary_insurance`, `allergies`, `current_medications`, `pre_existing_conditions`, `past_surgeries`, `family_medical_history`, `hipaa_authorization`, `consent_to_treatment`, `financial_responsibility`, `release_of_information`, `patient_signature`, `date`, `witness_signature`, `witness_date`) VALUES
(1, 'erdtfhgjkj', '2025-03-13', 'male', 'drftgyhuij', 'single', '2345678', 'xdcfvgbhnjkm', 'fcvgbhnjmk', 'fcgvbhjnkml', 'wsedrftgyhuji', 'fcvgbhjn', 'bhnjkm', 'jkml@erftgyhu', 'fgvbhnjkm', 'gvbhnjkm', 'fgbhjnk', 'vgbhjkl', 'vgbhnjkm', 'fcvgbhnjkm', 'bnm,', '', ' vbnm', ' nm,', 'dfvgbhnjmk', 'dcfvgbh', 'cvgbhnj', 1, 1, 1, 1, 'fghj', '2025-03-23', 'edrftgyhuji', '2025-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `provider_id` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `password_hash`) VALUES
('provider123', 'hashed_password_here');

-- --------------------------------------------------------

--
-- Table structure for table `vitals`
--

CREATE TABLE `vitals` (
  `id` int(11) NOT NULL,
  `blood_pressure` varchar(10) DEFAULT NULL,
  `respiratory_rate` varchar(10) DEFAULT NULL,
  `body_temperature` varchar(10) DEFAULT NULL,
  `pulse_rate` varchar(10) DEFAULT NULL,
  `oxygen_saturation` varchar(10) DEFAULT NULL,
  `bmi` varchar(10) DEFAULT NULL,
  `glucose_level` varchar(10) DEFAULT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitals`
--

INSERT INTO `vitals` (`id`, `blood_pressure`, `respiratory_rate`, `body_temperature`, `pulse_rate`, `oxygen_saturation`, `bmi`, `glucose_level`, `recorded_at`) VALUES
(1, '50', '16', '98.4', '48', '98', '45', '58', '2025-03-23 10:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`alert_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_login`
--
ALTER TABLE `patient_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient_registration`
--
ALTER TABLE `patient_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `vitals`
--
ALTER TABLE `vitals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_login`
--
ALTER TABLE `patient_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_registration`
--
ALTER TABLE `patient_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vitals`
--
ALTER TABLE `vitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
