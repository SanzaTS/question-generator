-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 02:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_generator`
--

-- --------------------------------------------------------

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_surname`, `admin_email`) VALUES
(1, 'Jack', 'Mabaso', 'admin@tut.ac.za');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `lecture_name`, `lecture_surname`, `lecture_emai`) VALUES
(1234567, 'Sbusiso', 'Sithole', 'sbusiso@tut.ac.za'),
(123456789, 'Sanele', 'Machai', 'sanele@tut.ac.za');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_subject`

INSERT INTO `lecture_subject` (`id`, `lecture_id`, `subject_code`, `sylabus`) VALUES
(1, 123456789, 'DSO34AT', 'Database Design,Business Intelegence');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

INSERT INTO `subject` (`subject_code`, `Subject_name`) VALUES
('DSO34AT', 'DEVELOPMENT SOFTWARE IIIA'),
('IDC30AT', 'INDUSTRY EXPOSURE IIIA'),
('ISY34AT', 'iNFORMATION SYSTEMS IIIA'),
('ISY34BT', 'iNFORMATION SYSTEMS IIIB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

INSERT INTO `users` (`email`, `password`, `role`) VALUES
('admin@tut.ac.za', 'password', 'Admin'),
('sanele@tut.ac.za', 'password', 'Lecture'),
('sbusiso@tut.ac.za', 'password', 'Lecture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`);





