-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2023 at 08:19 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'Ek', 'E', 'aekzin15@gmail.com', '$2y$10$h5N7H8EW4hUuM.WaAQ1mROEqDHKz/1Bk1yoC7gezbVs602/6J2VRq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `branch_id` (`branch_id`),
  KEY `publication_id` (`publication_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `branch_id`, `publication_id`, `description`, `author`, `quantity`, `book_cover`, `book`) VALUES
(5, 'Python Data Analytics', 12, 1, '\"Python Data Analytics\" is a comprehensive guide to using Python for data analysis, covering everything from data manipulation to visualization.', 'Fabio Nalli', 100, '643e14a2de1df.jpg', '643e14a2dec2d.pdf'),
(6, 'Python for kid', 12, 1, '\"Python for Kid\" is a fun and interactive introduction to Python programming, designed to teach kids the basics of coding in a playful way.', 'Tomohiro Maekawa', 100, '643e150999a39.jpg', '643e15099a1b6.pdf'),
(4, 'Python on the way home', 12, 1, '\'Python on the Way Home\' is a novel by Japanese author Tomohiro Maekawa. The story follows a young man named Ryosuke who has just quit his job and is taking the train home when he encounters a mysterious woman who asks him to help her solve a puzzle. ', 'Tomohiro Maekawa', 100, '643e12990be40.jpg', '643e12990c4f2.pdf'),
(7, 'Python for Data Engineers', 12, 1, '\"Python for Data Engineers\" is a practical guide to using Python for data engineering tasks, covering everything from data ingestion to data processing and storage.', 'Tomohiro Maekawa', 50, '643e15706210d.jpg', '643e15706287d.pdf'),
(8, 'C++ for Programming', 12, 1, '\"C++ Programming\" is a comprehensive guide to learning C++ programming language, covering everything from basic syntax to advanced topics such as object-oriented programming and data structures.', 'Fabio Nalli', 50, '643e15acb2c2c.jpg', '643e15acb350e.pdf'),
(9, 'Headway Elementary 4th', 10, 1, 'Headway Elementary 4th is a highly acclaimed English language learning course designed for beginners. The course provides a comprehensive approach to learning the English language, covering a range of topics that include grammar, vocabulary, reading, writing, and speaking. The materials are thoughtfully structured and paced, with a focus on helping learners build a strong foundation in the language.', 'Liz and John Soars', 50, '643ea9cf8ff0b.jpg', '643ea9cf9065f.pdf'),
(10, 'Headway Pre-intermediate 4th', 10, 1, 'Headway Pre-intermediate 4th is a popular English language learning course that builds upon the foundation established in Headway Elementary 4th. The course is designed for learners who have a basic understanding of English and are ready to move on to more advanced language skills.', 'Liz and John Soars', 50, '643eaa2e78e05.png', '643eaa2e7957e.pdf'),
(11, 'Headway intermediate 4th', 10, 1, 'Headway intermediate 4th is a popular English language learning course that builds upon the foundation established in Headway Elementary 4th. The course is designed for learners who have a basic understanding of English and are ready to move on to more advanced language skills.', 'Liz and John Soars', 50, '643eaa526bfc9.webp', '643eaa526c766.pdf'),
(12, 'Headway Upper intermediate 4th', 10, 1, 'Headway upper intermediate 4th is a popular English language learning course that builds upon the foundation established in Headway Elementary 4th. The course is designed for learners who have a basic understanding of English and are ready to move on to more advanced language skills.', 'Liz and John Soars', 50, '643eaa64ad08b.jpg', '643eaa64adbaa.pdf'),
(13, 'Headway advance intermediate 4th', 10, 1, 'Headway advance intermediate 4th is a popular English language learning course that builds upon the foundation established in Headway Elementary 4th. The course is designed for learners who have a basic understanding of English and are ready to move on to more advanced language skills.', 'Liz and John Soars', 50, '643eaa7881485.jpg', '643eaa7882190.pdf'),
(14, 'The Little Book of Economics', 9, 1, '\"The Little Book of Economics\" is a concise and accessible introduction to the fundamental principles of economics. Authored by N. Gregory Mankiw, a renowned economist and professor at Harvard University, this book breaks down complex economic concepts into bite-sized pieces that are easy to understand. The book covers a wide range of topics, including supply and demand, macroeconomics, microeconomics, monetary policy, and more. The author uses clear language and real-world examples to illustrate key concepts, making the subject matter relatable and engaging. Whether you\'re a student studying economics for the first time or a curious reader looking to expand your knowledge, \"The Little Book of Economics\" is an excellent resource to add to your library.', 'Bruce Lesin', 45, '643eaece05701.jpg', '643eaece05fe3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `branch_image` varchar(255) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_image`) VALUES
(7, 'Business Administration  ', 'business_administration.jpg'),
(8, 'Finance and Banking', 'finance_and_banking.jpeg'),
(9, 'Economics', 'economics.jpg'),
(10, 'Education, Arts, and Humanities', 'Education_arts_and_humanities.jpg'),
(11, 'Tourism and Hospitality', 'tourism_and_hospitality.jpg'),
(12, 'Infomation of Technology and Science', 'Infomation_of_technology_and_science.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

DROP TABLE IF EXISTS `issued`;
CREATE TABLE IF NOT EXISTS `issued` (
  `issued_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `issue_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `issued_day` int(11) DEFAULT NULL,
  `returned` tinyint(1) DEFAULT '0',
  `approved` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`issued_id`),
  KEY `student_id` (`student_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`issued_id`, `student_id`, `book_id`, `issue_date`, `issued_day`, `returned`, `approved`) VALUES
(1, 4, 6, '2023-04-18 10:23:44', 5, 0, 1),
(2, 4, 8, '2023-04-18 10:28:36', 3, 0, 0),
(3, 4, 7, '2023-04-18 13:32:31', 7, 1, 1),
(4, 5, 12, '2023-04-18 14:35:55', 7, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

DROP TABLE IF EXISTS `librarian`;
CREATE TABLE IF NOT EXISTS `librarian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'librarian',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'E', 'E', 'lekzin15@gmail.com', '$2y$10$h5N7H8EW4hUuM.WaAQ1mROEqDHKz/1Bk1yoC7gezbVs602/6J2VRq', 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `publication_id` int(11) NOT NULL AUTO_INCREMENT,
  `publication_name` varchar(100) NOT NULL,
  PRIMARY KEY (`publication_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`publication_id`, `publication_name`) VALUES
(1, 'Books'),
(2, 'Journals'),
(3, 'Magazines'),
(4, 'Newspapers'),
(5, 'Reference materials'),
(6, 'Audio and video recordings'),
(7, 'E-books'),
(8, 'Digital archives'),
(9, 'Theses and dissertations'),
(10, 'Government documents ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `year` int(10) NOT NULL,
  `major` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key_name` (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_id`, `faculty_id`, `year`, `major`, `email`, `address`, `profile_pic`, `password`) VALUES
(4, 'Ek', 'Ae', '12345678', 12, 2, 'Software Engineer', 'sekzin15@gmail.com', 'No.3', 'pic_01.jpg', '$2y$10$h5N7H8EW4hUuM.WaAQ1mROEqDHKz/1Bk1yoC7gezbVs602/6J2VRq'),
(5, 'Rithisak', 'Narin', '12345678', 10, 2, 'English for Education', 'snarinrithisak@gmail.com', 'Khan Sen Sok, Phnom Penh', 'pic_02.jpg', '$2y$10$tU5dDqP7zQkxDyvUoG2NKuxKRufDX7UgC7kt0HHllC/NpkVqBEwtq'),
(6, 'Bormey', 'Hul', '12345678', 12, 3, 'Software Engineer', 'shulbormey@gmail.com', 'Khan Por Senchey, Phnom Penh', 'theisen_tarra.jpg', '$2y$10$aukKRqSEpeWdrZrJUIj/m.bEc7S2mPxA6/HZgNwbC4YeGTzGnxRVW');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `branches` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
