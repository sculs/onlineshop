-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2017 at 10:36 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(3) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(3) NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `storage` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `price`, `link`, `category`, `description`, `storage`) VALUES
(101, 'Goodnight Moon', 60, 'img/products/book101-1.jpg', 'Children\'s book', 'by Margaret Wise Brown  (Author), Clement Hurd (Illustrator), January 3, 2006', '100'),
(102, 'Pippi Longstocking', 149, 'img/products/book102-1.jpg', 'Children\'s book', 'by Astrid Lindgren(Author), Ingrid Vang Nyman(Author), Translated, September 2, 20', '100'),
(103, 'The Giving Tree', 95, 'img/products/book103-1.jpg', 'Children\'s book', 'by Shel Silverstein  (Author), February 18, 2014, Hardcover', '98'),
(104, 'The Frog and Toad', 72, 'img/products/book104-1.jpg', 'Children\'s book', 'by Arnold Lobel  (Author, Illustrator), May 25, 2004', '100'),
(105, 'I Want My Hat Back', 129, 'img/products/book105-1.jpg', 'Children\'s book', 'by Jon Klassen (Author, Illustrator), September 27, 2011', '95'),
(201, 'Too Big to Fail', 89, 'img/products/book201-1.jpg', 'Business book', 'by Andrew Ross Sorkin, July 1, 2010', '100'),
(202, 'Wild Ride', 128, 'img/products/book202-1.jpg', 'Business book', 'by Ann Hagedorn Auerbach, December 15, 1995', '99'),
(203, 'Principles: Life and Work', 133, 'img/products/book203-1.jpg', 'Business book', 'by Ray Dalio, September 19, 2017', '100'),
(204, 'Den of Thieves', 135, 'img/products/book204-1.jpg', 'Business book', 'by James B. Stewart, September 1, 1992', '100'),
(205, 'King of Capital', 139, 'img/products/book205-1.jpg', 'Business book', 'by David Carey, John E. Morris, February 7, 2012', '100'),
(301, 'Web Design with HTML, CSS, JavaScript and jQuery S', 509, 'img/products/book301-1.jpg', 'IT book', 'by Jon Duckett, August 2014', '97'),
(302, 'Java: The Complete Reference', 385, 'img/products/book302-1.jpg', 'IT book', 'by Herbert Schildt, 2014', '100'),
(303, 'PHP and MySQL for Dynamic Web Sites', 448, 'img/products/book303-1.jpg', 'IT book', 'By Larry Ullman, November 3, 2017', '98'),
(304, 'Code Complete', 355, 'img/products/book304-1.jpg', 'IT book', 'by Steve McConnell, November 30, 2009', '100'),
(305, 'Learning Python', 619, 'img/products/book305-1.jpg', 'IT book', 'by Mark Lutz, 2009', '100');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `serialNumber` int(20) NOT NULL,
  `shopStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(3) NOT NULL,
  `orderNumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bookid` int(3) NOT NULL,
  `saledate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productPrice` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`serialNumber`, `shopStatus`, `amount`, `orderNumber`, `userid`, `bookid`, `saledate`, `productPrice`) VALUES
(107, 'paid', 2, '20171128084804166121', 'liusongscu@gmail.com', 201, '2017-11-28 20:48:04', 89),
(108, 'paid', 4, '20171128092525167975', 'liusongscu@gmail.com', 102, '2017-11-28 21:25:25', 149),
(109, 'paid', 1, '20171128092538167746', 'liusongscu@gmail.com', 204, '2017-11-28 21:25:38', 135),
(110, 'paid', 2, '20171128092931167756', 'liusongscu@gmail.com', 305, '2017-11-28 21:29:31', 619),
(111, 'paid', 1, '20171128092940167257', 'liusongscu@gmail.com', 303, '2017-11-28 21:29:40', 448),
(112, 'paid', 3, '20171128093117167612', 'liusongscu@gmail.com', 105, '2017-11-28 21:31:17', 129),
(113, 'paid', 1, '20171128093216167262', 'liusongscu@gmail.com', 202, '2017-11-28 21:32:16', 128),
(114, 'paid', 2, '20171128093223167978', 'liusongscu@gmail.com', 303, '2017-11-28 21:32:23', 448),
(115, 'paid', 2, '20171128093512167944', 'liusongscu@gmail.com', 105, '2017-11-28 21:35:12', 129),
(116, 'paid', 2, '20171128100707167565', 'liusongscu@gmail.com', 103, '2017-11-28 22:07:07', 95),
(117, 'paid', 3, '20171128100918167991', 'liusongscu@gmail.com', 301, '2017-11-28 22:09:18', 509),
(118, 'active', 1, '20171128103004167833', 'liusongscu@gmail.com', 102, '2017-11-28 22:30:04', 149);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(3) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `number`, `email`, `password`) VALUES
(168, 'aa', 'aa', 'aa@aa.aa', '4124bc0a9335c27f086f24ba207a4912'),
(170, 'aaa', 'aaa', 'aaa@aaa.bc', '47bce5c74f589f4867dbd57e9ca9f808'),
(171, 'aaa', 'aaa', 'aaa@aaa.bcd', '4124bc0a9335c27f086f24ba207a4912'),
(172, 'aaa', 'aaa', 'aaa@aaa.bccdgfeav', '47bce5c74f589f4867dbd57e9ca9f808'),
(173, 'aaa', 'aaa', 'aaaaa@aaa.aaaaaa', '47bce5c74f589f4867dbd57e9ca9f808');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`serialNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `serialNumber` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
