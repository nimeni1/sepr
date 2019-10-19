-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 12:26 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `name`, `title`, `content`) VALUES
(1, 'lee', 'secure programming title1', 'sdadas'),
(2, 'cheng', 'secure programming title2', 'tttttttttttt'),
(3, 'test', 'secure programming title3', 'sadadas'),
(4, 'test', 'secure programming title4', 'last test content'),
(5, 'test', 'secure programming title5', 'post somthing'),
(6, 'test', 'secure programming title6', 'post testing');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(10) NOT NULL,
  `Book_title` varchar(100) NOT NULL,
  `Book_writer` varchar(20) NOT NULL,
  `Book_price` varchar(100) NOT NULL,
  `Book_description` text NOT NULL,
  `Is_avail` int(1) DEFAULT '1',
  `image_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Book_title`, `Book_writer`, `Book_price`, `Book_description`, `Is_avail`, `image_path`) VALUES
('0071592539', 'Security Analysis: Sixth Edition, Foreword by Warren Buffett', ' Benjamin Graham', '39', 'A road map for investing that I have now been following for 57 years."--From the Foreword by Warren E. Buffett\nFirst published in 1934, Security Analysis is one of the most influential financial books ever written. Selling more than one million copies through five editions, it has provided generations of investors with the timeless value investing philosophy and techniques of Benjamin Graham and David L. Dodd.\nAs relevant today as when they first appeared nearly 75 years ago, the teachings of Benjamin Graham, "the father of value investing," have withstood the test of time across a wide diversity of market conditions, countries, and asset classes.\nThis new sixth edition, based on the classic 1940 version, is enhanced with 200 additional pages of commentary from some of today leading Wall Street money managers. These masters of value investing explain why the principles and techniques of Graham and Dodd are still highly relevant even in today vastly different markets', 1, 'security'),
('1449340377', 'Python Cookbook: No. 3 : Recipes for Mastering Python', ' David Beazley', '28', 'If you need help writing programs in Python 3, or want to update older Python 2 code, this book is just the ticket. Packed with practical recipes written and tested with Python 3.3, this unique cookbook is for experienced Python programmers who want to focus on modern tools and idioms. Inside, you will find complete recipes for more than a dozen topics, covering the core Python language as well as tasks common to a wide variety of application domains. Each recipe contains code samples you can use in your projects right away, along with a discussion about how and why the solution works. Topics include: Data Structures and Algorithms Strings and Text Numbers, Dates, and Times Iterators and Generators Files and I/O Data Encoding and Processing Functions Classes and Objects Metaprogramming Modules and Packages Network and Web Programming Concurrency Utility Scripting and System Administration Testing, Debugging, and Exceptions C Extensions ', 1, 'python_cook_book'),
('1449361323', 'Data Science for Business : What You Need to Know About Data Mining and Data-Analytic Thinking', ' Foster Provost', '25', 'Written by renowned data science experts Foster Provost and Tom Fawcett, Data Science for Business introduces the fundamental principles of data science, and walks you through the "data-analytic thinking" necessary for extracting useful knowledge and business value from the data you collect. This guide also helps you understand the many data-mining techniques in use today. Based on an MBA course Provost has taught at New York University over the past ten years, Data Science for Business provides examples of real-world business problems to illustrate these principles.\nYou will not only learn how to improve communication between business stakeholders and data scientists, but also how participate intelligently in your company data science projects. You will also discover how to think data-analytically, and fully appreciate how data science methods can support business decision-making.', 1, 'datascience'),
('1491950781', 'Efficient R Programming', '  Colin Gillespie', '23', 'There are many excellent R resources for visualization, data science, and package development. Hundreds of scattered vignettes, web pages, and forums explain how to use R in particular domains. But little has been written on how to simply make R work effectively-until now. This hands-on book teaches novices and experienced R users how to write efficient R code. Drawing on years of experience teaching R courses, authors Colin Gillespie and Robin Lovelace provide practical advice on a range of topics-from optimizing the set-up of RStudio to leveraging C++-that make this book a useful addition to any R user bookshelf. Academics, business users, and programmers from a wide range of backgrounds stand to benefit from the guidance in Efficient R Programming.', 1, 'R_programming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'atest', 'atest@c.com', 'b50cd72da9f57f8bf6880303ff5b7622'),
(3, 'aaa', 'a@a.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(4, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
