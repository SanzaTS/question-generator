-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 09:38 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_surname` varchar(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_surname`, `admin_email`) VALUES
(1, 'Jack', ' Mabaso', 'admin@tut.ac.za'),
(6, 'Rob', ' Van Damme', 'rvd@tut.ac.za');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `mid` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `reciever` varchar(30) NOT NULL,
  `Msg` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`mid`, `sender`, `reciever`, `Msg`, `date`, `time`) VALUES
(10, 'sithole@tut.ac.za', 'kevinhart@tut.ac.za', 'umgcine nini', '06/07/19', '10:51:18'),
(11, 'sithole@tut.ac.za', 'joshua@tut.ac.za', 'ANgaz', '06/07/19', '10:52:23'),
(12, 'sithole@tut.ac.za', 'joshua@tut.ac.za', 'ANgaz', '06/07/19', '10:53:18'),
(13, 'admin@tut.ac.za', 'sithole@tut.ac.za', 'check password', '07/07/19', '12:05:05'),
(14, 'joshua@tut.ac.za', 'admin@tut.ac.za', 'helo there', '07/07/19', '10:45:55'),
(15, 'joshua@tut.ac.za', 'admin@tut.ac.za', 'whatApp', '07/07/19', '08:51:56'),
(16, 'admin@tut.ac.za', 'joshua@tut.ac.za', 'hi ', '11/07/19', '01:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lecture_id` int(10) NOT NULL,
  `lecture_name` varchar(20) NOT NULL,
  `lecture_surname` varchar(20) NOT NULL,
  `lecture_emai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `lecture_name`, `lecture_surname`, `lecture_emai`) VALUES
(1236780099, 'kevin', 'hart', 'kevinhart@tut.ac.za'),
(2135566489, 'Jacob', 'dlamini', 'dlamini@tut.ac.za'),
(2142227140, 'joshua', 'mathews', 'joshua@tut.ac.za'),
(2147483647, 'sanele', 'sithole', 'sanelesithole001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_subject`
--

CREATE TABLE `lecture_subject` (
  `id` int(100) NOT NULL,
  `lecture_id` int(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `sylabus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_subject`
--

INSERT INTO `lecture_subject` (`id`, `lecture_id`, `subject_code`, `sylabus`) VALUES
(19, 1236780099, 'DSO34AT', 'database system'),
(21, 2135566489, 'ISY34AT', ''),
(22, 2142227140, 'ISY34AT', ''),
(23, 2147483647, 'IDC30AT', '');

-- --------------------------------------------------------

--
-- Table structure for table `long_question`
--

CREATE TABLE `long_question` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `marks` int(10) NOT NULL,
  `subj_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `long_question`
--

INSERT INTO `long_question` (`id`, `question`, `answer`, `marks`, `subj_code`) VALUES
(1, 'what is a database?', 'a dbms is a complex softwaresystem that is used to manage,store and manipulatedata and metadata used', 3, 'DSO34AT'),
(2, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attributes.they are used to performsome specific operat', 5, 'DSO34AT'),
(3, 'Why is the use of DBMS recommended? Explain by listing some of its major advantages.', 'Controlled Redundancy: DBMS supports a mechanism to control redundancy of data inside the database b', 10, 'DSO34AT'),
(4, 'Explain the concepts of a Primary key and Foreign Key.', 'Primary Key is used to uniquely identify the records in a database table while Foreign Key is mainly', 4, 'DSO34AT'),
(5, 'Explain Entity, Entity Type, and Entity Set in DBMS?', ' Entity is an object, place or thing which has its independent existence in the real world and about', 9, 'DSO34AT'),
(6, 'What are the different levels of abstraction in the DBMS?', 'Physical Level: This is the lowest level of the data abstraction which states how the data is stored', 6, 'DSO34AT'),
(7, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribution,and diversity required new technology archite', 5, 'DSO34AT'),
(8, 'what are charecterestic of a good leader', 'kind,worth,put people first', 6, 'IDC30AT'),
(9, 'WHAT IS EMOTIOANL INTELLEGENCE', 'ability to be able to understand other people ', 3, 'IDC30AT'),
(10, 'HOW TO DEAL WITH TOXIC LEADE', 'report,talk to people,put people first', 6, 'IDC30AT'),
(11, 'What is a project manager', 'person who  ensure the project meets objectives', 4, 'ISY34BT'),
(12, 'What is a KNOWN UNKNWOWN', 'iTS WHEN WE PREDICTICT THE OUT COME BEFORE IT HAPPEN', 4, 'ISY34BT'),
(13, 'What is a project STAKEHOLDERr', 'sponser,manager,user', 4, 'ISY34BT');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice`
--

CREATE TABLE `multiple_choice` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `marks` int(10) NOT NULL,
  `subj_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiple_choice`
--

INSERT INTO `multiple_choice` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`, `subj_code`) VALUES
(1, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 'DSO34AT'),
(2, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 'DSO34AT'),
(3, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 'DSO34AT'),
(12, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 'DSO34AT'),
(13, 'Person who sponser the project', 'sponser', 'winner', 'loser', 'user', 'sponser', 2, 'ISY34BT'),
(14, 'The money given to beused in a particular project', 'sponser', 'budget', 'lotto', 'npv', 'budget', 2, 'ISY34BT'),
(15, 'Method of redoing the proccess to correct mistakes', 'loop', 'throwback', 'scrum', 'agile', 'agile', 2, 'ISY34BT'),
(16, 'Ability to understand other people from diferent diversity', 'councelor', 'organisational culture', 'loser', 'emotional behavior', 'organisational culture', 2, 'IDC30AT'),
(17, 'Study of how people interact', 'social phychology', 'social behavior', 'sponser', 'fight', 'social phychology', 2, 'IDC30AT'),
(18, 'How tohanle your self in a meeting', 'communication skills', 'sponser', 'social phychology', 'agile', 'communicationskills', 2, 'IDC30AT');

-- --------------------------------------------------------

--
-- Table structure for table `one_word`
--

CREATE TABLE `one_word` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `marks` int(10) NOT NULL,
  `subj_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `one_word`
--

INSERT INTO `one_word` (`id`, `question`, `answer`, `marks`, `subj_code`) VALUES
(1, '_____ uniquly identifies a table.', 'primary key', 2, 'DSO34AT'),
(2, '_____ the process of un-normalizing the table', 'denomarlization', 2, 'DSO34AT'),
(3, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 'DSO34AT'),
(5, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 'DSO34AT'),
(6, 'person handle business objective is_____', 'Project Managers', 2, 'ISY34BT'),
(7, 'Technique to ensure task are done acordingly_____', 'wbs', 2, 'ISY34BT'),
(8, 'To project future returns_____', 'NPV', 2, 'ISY34BT'),
(10, 'its what donal trump did_____', 'Risk Taker', 2, 'IDC30AT'),
(11, 'its how you behave in a company_____', 'Organisational behaviour', 2, 'IDC30AT'),
(12, 'its ability to understand other people_____', 'Emotional Intellegence', 2, 'IDC30AT'),
(13, 'word that identifies a value to be stored is_____', 'data type', 2, 'DSO34AT'),
(14, 'Who benefit the most on the project', 'Project sponsor', 2, 'ISY34BT');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `question_id` int(10) NOT NULL,
  `lecture_id` int(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `moderator` varchar(20) NOT NULL,
  `duration` int(1) NOT NULL,
  `edate` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`question_id`, `lecture_id`, `subject_code`, `moderator`, `duration`, `edate`, `category`, `filename`, `date`, `time`) VALUES
(1, 1236780099, 'DSO34AT', 'Sithole,ML', 3, '19/07/27', 'Semester Test', 'semesterT2019-79doc', '19/07/16', '02:52:35'),
(2, 1236780099, 'DSO34AT', 'Xulu,M', 1, '19/07/22', 'class test', 'class test2019-36doc', '19/07/17', '08:40:18'),
(3, 1236780099, 'DSO34AT', 'Zwane,TZ', 4, '19/07/29', 'Examination', 'Examination2019-50doc', '19/07/17', '08:40:39'),
(4, 1236780099, 'DSO34AT', 'Sirhole,SA', 2, '19/07/20', 'Semester Test', 'semesterT2019-72doc', '19/07/17', '09:10:54'),
(5, 1236780099, 'DSO34AT', 'Sanele,QU', 2, '19/10/02', 'Semester Test', 'semesterT2019-85doc', '19/07/17', '09:13:00'),
(6, 1236780099, 'DSO34AT', 'Mangethe,OP', 4, '19/12/22', 'Examination', 'Examination2019-65doc', '19/07/17', '09:14:05'),
(7, 2147483647, 'IDC30AT', 'Machai,II', 3, '19/07/09', 'class test ', 'class test2019-10doc', '19/07/18', '01:56:54'),
(8, 2147483647, 'IDC30AT', 'dlamini Se', 4, '19/07/18', 'semester Test ', 'semester Test2019-31doc', '19/07/18', '02:29:17'),
(9, 2147483647, 'IDC30AT', 'sanele gg', 3, '19/07/18', 'semester Test ', 'semester Test2019-55doc', '19/07/18', '07:44:17'),
(10, 1236780099, 'DSO34AT', 'sanele gg', 3, '19/07/18', 'class test ', 'class test2019-88doc', '19/07/18', '09:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(10) NOT NULL,
  `title` varchar(75) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `title`, `description`, `link`) VALUES
(1, 'Java Web Services Tutorial - javatpoint\r\n', 'Java web services tutorial for beginners and professionals with examples on soap, ... defined by Java for developing web service applications since JavaEE 6.', 'https://www.javatpoint.com/java-web-services-tutorial'),
(2, 'JEE or J2EE Design Patterns - Javatpoint\r\n', 'Java Tutorial or Learn Java or Core Java Tutorial or Java Programming Tutorials for beginners and professionals with ... 2) Java EE (Java Enterprise Edition).', 'https://www.javatpoint.com/jee-or-j2ee-design-patterns'),
(3, 'Organizational Behavior Questions and Answers -', 'Organizational Behavior Questions and Answers - Discover the eNotes.com ... like you that can answer any question you might have on Organizational Behavior.', 'eNotes.com\r\nhttps://www.enotes.com/homework-help/top'),
(4, 'Answer outlines for end of chapter questions - Oxford University Press', 'Fincham & Rhodes: Principles of Organizational Behaviour: 4e ... containing suggestions fpr points to include in your answers to the end of chapter questions.', 'https://global.oup.com/uk/or'),
(5, 'Organizational Behavior Questions and Answers -', 'Organizational Behavior Questions and Answers - Discover the eNotes.com ... like you that can answer any question you might have on Organizational Behavior.', ' eNotes.com\r\nhttps://www.enotes.com/homework-help/top'),
(6, '585 questions with answers in Organizational Behavior | Science topic', 'Get answers to questions in Organizational Behavior from experts. ... I just completed my second book - which was written in Jamaica, BTW. It used Jamaican ...', 'https://www.researchgate.net '),
(7, 'Organizational Behaviour Multiple Choice Questions with Answers\r\n', 'These MCQs & answers can help to both students and teachers to .... The eld of organisational behaviour examines such questions as the nature of leadership .... F.W.Taylor 12) The book “The Psychology of management” was published by a) ...', 'https://www.academia.edu/.../Organi'),
(8, 'Organizational Behaviour Multiple Choice Questions with Answers', 'U a Organizational Behaviour Multiple Choice Questions with Answers MCQ .... The eld of organisational behaviour examines such questions as the nature of .... F.W.Taylor 12) The book “The Psychology of management” was published by a) ...', 'https://www.academia.edu/.../organi'),
(9, 'Systems Analysis and Design in a Changing World John W. Satzinger ...', 'Find all the study resources for Systems Analysis and Design in a Changing World by John W. Satzinger; Stephen ... Exam June 2018, questions and answers.', 'https://www.studocu.com/.../s'),
(10, '(DOC) Solution Manual for Systems Analysis and Design in a ...', 'Solution Manual for Systems Analysis and Design in a Changing World 7th Edition by ... in-a-Changing-World-7th-Edition-by-Satzinger Review Questions 1.', 'https://www.academia.edu/.../Solutio'),
(11, 'Systems Analysis and Design in a Changing World', 'PREFACE interpreting analysis and design models and actually creating analysis ... SOLUTIONS We provide instructors with answers to review questions and ...', '\r\nhttps://books.google.co.za/books?isbn=0324593775'),
(12, '64 questions with answers in Database Design | Science topic', 'Get answers to questions in Database Design from experts.', 'https://www.researchgate.net'),
(13, '64 questions with answers in Database Design | Science topic', 'Get answers to questions in Database Design from experts.', 'https://www.researchgate.net'),
(14, '64 questions with answers in Database Design | Science topic', 'Get answers to questions in Database Design from experts.', 'https://www.researchgate.net'),
(15, 'Database Design: Questions and Answers - Webanketa', 'Get answers to questions in Database Design from experts.', 'https://www.researchgate.net '),
(16, 'Database Design: Questions and Answers - Webanketa', 'You can download Database Design: Questions and Answers by George Duckett for free here. This book available for all free-registered members in PDF, Mobi, ...', ' Webanketa\r\nhttps://webanketa.com/forms/64w32csg6rqp2sb46nh32d9m/en/');

-- --------------------------------------------------------

--
-- Table structure for table `selected_long`
--

CREATE TABLE `selected_long` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `mark` int(10) NOT NULL,
  `qid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_long`
--

INSERT INTO `selected_long` (`id`, `question`, `answer`, `mark`, `qid`) VALUES
(1, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribu', 5, 1),
(2, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 1),
(3, 'Explain the concepts of a Primary key and Foreign Key.', 'Primary Key is used to uniquely identify the recor', 4, 1),
(4, 'what is a database?', 'a dbms is a complex softwaresystem that is used to', 3, 1),
(5, 'Explain Entity, Entity Type, and Entity Set in DBMS?', ' Entity is an object, place or thing which has its', 9, 2),
(6, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 2),
(7, 'what is a database?', 'a dbms is a complex softwaresystem that is used to', 3, 2),
(8, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribu', 5, 2),
(9, 'Why is the use of DBMS recommended? Explain by listing some of its major advantages.', 'Controlled Redundancy: DBMS supports a mechanism t', 10, 3),
(10, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 3),
(11, 'Explain Entity, Entity Type, and Entity Set in DBMS?', ' Entity is an object, place or thing which has its', 9, 3),
(12, 'What are the different levels of abstraction in the DBMS?', 'Physical Level: This is the lowest level of the da', 6, 3),
(13, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 4),
(14, 'what is a database?', 'a dbms is a complex softwaresystem that is used to', 3, 4),
(15, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribu', 5, 4),
(16, 'Why is the use of DBMS recommended? Explain by listing some of its major advantages.', 'Controlled Redundancy: DBMS supports a mechanism t', 10, 4),
(17, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 5),
(18, 'Explain Entity, Entity Type, and Entity Set in DBMS?', ' Entity is an object, place or thing which has its', 9, 5),
(19, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribu', 5, 5),
(20, 'what is a database?', 'a dbms is a complex softwaresystem that is used to', 3, 5),
(21, 'Explain Entity, Entity Type, and Entity Set in DBMS?', ' Entity is an object, place or thing which has its', 9, 6),
(22, 'What are the different levels of abstraction in the DBMS?', 'Physical Level: This is the lowest level of the da', 6, 6),
(23, 'Discuss Big Data?', 'Big data is data whose scale,timelessness,distribu', 5, 6),
(24, 'what is a database?', 'a dbms is a complex softwaresystem that is used to', 3, 6),
(25, 'HOW TO DEAL WITH TOXIC LEADE', 'report,talk to people,put people first', 6, 7),
(26, 'WHAT IS EMOTIOANL INTELLEGENCE', 'ability to be able to understand other people ', 3, 7),
(27, 'what are charecterestic of a good leader', 'kind,worth,put people first', 6, 7),
(28, 'HOW TO DEAL WITH TOXIC LEADE', 'report,talk to people,put people first', 6, 8),
(29, 'WHAT IS EMOTIOANL INTELLEGENCE', 'ability to be able to understand other people ', 3, 8),
(30, 'what are charecterestic of a good leader', 'kind,worth,put people first', 6, 8),
(31, 'what are charecterestic of a good leader', 'kind,worth,put people first', 6, 9),
(32, 'HOW TO DEAL WITH TOXIC LEADE', 'report,talk to people,put people first', 6, 9),
(33, 'WHAT IS EMOTIOANL INTELLEGENCE', 'ability to be able to understand other people ', 3, 9),
(34, 'What are the different levels of abstraction in the DBMS?', 'Physical Level: This is the lowest level of the da', 6, 10),
(35, 'what is a key?what are different keys in database?', 'a key is nothing but a attribute or group of attri', 5, 10),
(36, 'Why is the use of DBMS recommended? Explain by listing some of its major advantages.', 'Controlled Redundancy: DBMS supports a mechanism t', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `selected_multiple`
--

CREATE TABLE `selected_multiple` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `mark` int(10) NOT NULL,
  `qid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_multiple`
--

INSERT INTO `selected_multiple` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `qid`) VALUES
(1, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 1),
(2, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 1),
(3, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 1),
(4, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 1),
(5, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 2),
(6, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 2),
(7, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 2),
(8, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 2),
(9, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 3),
(10, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 3),
(11, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 3),
(12, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 3),
(13, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 4),
(14, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 4),
(15, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 4),
(16, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 4),
(17, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 5),
(18, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 5),
(19, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 5),
(20, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 5),
(21, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 6),
(22, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 6),
(23, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 6),
(24, 'It unequely identifies a tabble or row', 'primary key', 'foreign key', 'normalization', 'erd', 'Primary Key', 2, 6),
(25, 'How tohanle your self in a meeting', 'communication skills', 'sponser', 'social phychology', 'agile', 'communicationskills', 2, 7),
(26, 'Ability to understand other people from diferent diversity', 'councelor', 'organisational culture', 'loser', 'emotional behavior', 'organisational culture', 2, 7),
(27, 'Study of how people interact', 'social phychology', 'social behavior', 'sponser', 'fight', 'social phychology', 2, 7),
(28, 'Ability to understand other people from diferent diversity', 'councelor', 'organisational culture', 'loser', 'emotional behavior', 'organisational culture', 2, 8),
(29, 'Study of how people interact', 'social phychology', 'social behavior', 'sponser', 'fight', 'social phychology', 2, 8),
(30, 'How tohanle your self in a meeting', 'communication skills', 'sponser', 'social phychology', 'agile', 'communicationskills', 2, 8),
(31, 'How tohanle your self in a meeting', 'communication skills', 'sponser', 'social phychology', 'agile', 'communicationskills', 2, 9),
(32, 'Study of how people interact', 'social phychology', 'social behavior', 'sponser', 'fight', 'social phychology', 2, 9),
(33, 'Ability to understand other people from diferent diversity', 'councelor', 'organisational culture', 'loser', 'emotional behavior', 'organisational culture', 2, 9),
(34, 'to avoid anomalies you need ?', 'normalization', 'erd', 'table', 'oop', 'Normalization', 2, 10),
(35, 'logical representetion of a real world data.', 'Table', 'Data Warehouse', 'ERD', 'Entity', 'ERD', 2, 10),
(36, 'who look monitor the database ?', 'database administrator', 'data analyst', 'database design', 'programmer', 'Database Adminaistrator', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `selected_word`
--

CREATE TABLE `selected_word` (
  `id` int(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `marks` int(10) NOT NULL,
  `qid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_word`
--

INSERT INTO `selected_word` (`id`, `question`, `answer`, `marks`, `qid`) VALUES
(1, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 1),
(2, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 1),
(3, '_____ uniquly identifies a table.', 'primary key', 2, 1),
(4, '_____ uniquly identifies a table.', 'primary key', 2, 2),
(5, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 2),
(6, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 2),
(7, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 3),
(8, '_____ uniquly identifies a table.', 'primary key', 2, 3),
(9, '_____ the process of un-normalizing the table', 'denomarlization', 2, 3),
(10, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 4),
(11, '_____ the process of un-normalizing the table', 'denomarlization', 2, 4),
(12, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 4),
(13, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 5),
(14, '_____ uniquly identifies a table.', 'primary key', 2, 5),
(15, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 5),
(16, '_____ the process of un-normalizing the table', 'denomarlization', 2, 6),
(17, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 6),
(18, '_____ uniquly identifies a table.', 'primary key', 2, 6),
(19, 'its what donal trump did_____', 'Risk Taker', 2, 7),
(20, 'its ability to understand other people_____', 'Emotional Intellegence', 2, 7),
(21, 'its how you behave in a company_____', 'Organisational behaviour', 2, 7),
(22, 'its what donal trump did_____', 'Risk Taker', 2, 8),
(23, 'its how you behave in a company_____', 'Organisational behaviour', 2, 8),
(24, 'its ability to understand other people_____', 'Emotional Intellegence', 2, 8),
(25, 'its what donal trump did_____', 'Risk Taker', 2, 9),
(26, 'its ability to understand other people_____', 'Emotional Intellegence', 2, 9),
(27, 'its how you behave in a company_____', 'Organisational behaviour', 2, 9),
(28, '____ it ensures that the foreign key is not violeted', 'referential intergrity', 2, 10),
(29, 'Data that have been store in multiple location is called __________.', 'Distributed Database', 2, 10),
(30, 'word that identifies a value to be stored is_____', 'data type', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` varchar(10) NOT NULL,
  `Subject_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
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

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL,
  `createdAt` varchar(13) NOT NULL,
  `last_activity` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `role`, `createdAt`, `last_activity`) VALUES
('admin@tut.ac.za', 'password', 'Admin', '12/03/19', 'Online'),
('dlamini@tut.ac.za', 'password', 'Lecture', '14/07/19', 'Offline'),
('joshua@tut.ac.za', 'password', 'Lecture', '02/02/19', 'Offline'),
('kevinhart@tut.ac.za', 'password', 'Lecture', '02/02/19', 'Online'),
('rvd@tut.ac.za', 'password', 'Admin', '02/02/19', 'Offline'),
('sanelesithole001@gmail.com', 'password', 'Lecture', '02/02/19', 'Offline'),
('sanza@tut.ac.za', 'password', 'Lecture', '14/07/19', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `lecture_subject`
--
ALTER TABLE `lecture_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecture_id` (`lecture_id`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `long_question`
--
ALTER TABLE `long_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_code` (`subj_code`);

--
-- Indexes for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_code` (`subj_code`);

--
-- Indexes for table `one_word`
--
ALTER TABLE `one_word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_code` (`subj_code`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `subject_code` (`subject_code`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_long`
--
ALTER TABLE `selected_long`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `selected_multiple`
--
ALTER TABLE `selected_multiple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `selected_word`
--
ALTER TABLE `selected_word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lecture_subject`
--
ALTER TABLE `lecture_subject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `long_question`
--
ALTER TABLE `long_question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `one_word`
--
ALTER TABLE `one_word`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `selected_long`
--
ALTER TABLE `selected_long`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `selected_multiple`
--
ALTER TABLE `selected_multiple`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `selected_word`
--
ALTER TABLE `selected_word`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecture_subject`
--
ALTER TABLE `lecture_subject`
  ADD CONSTRAINT `lecture_subject_ibfk_1` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`),
  ADD CONSTRAINT `lecture_subject_ibfk_2` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lecture_id`);

--
-- Constraints for table `long_question`
--
ALTER TABLE `long_question`
  ADD CONSTRAINT `long_question_ibfk_1` FOREIGN KEY (`subj_code`) REFERENCES `subject` (`subject_code`);

--
-- Constraints for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  ADD CONSTRAINT `multiple_choice_ibfk_1` FOREIGN KEY (`subj_code`) REFERENCES `subject` (`subject_code`);

--
-- Constraints for table `one_word`
--
ALTER TABLE `one_word`
  ADD CONSTRAINT `one_word_ibfk_1` FOREIGN KEY (`subj_code`) REFERENCES `subject` (`subject_code`);

--
-- Constraints for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD CONSTRAINT `question_paper_ibfk_1` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`),
  ADD CONSTRAINT `question_paper_ibfk_2` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lecture_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
