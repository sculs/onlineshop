    -- phpMyAdmin SQL Dump
    -- version 4.7.3
    -- https://www.phpmyadmin.net/
    --
    -- Host: localhost
    -- Generation Time: Nov 26, 2017 at 05:13 PM
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
      `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    --
    -- Dumping data for table `books`
    --

    INSERT INTO `books` (`bookid`, `title`, `price`, `link`, `category`, `description`) VALUES
    (101, 'Goodnight Moon', 60, '../img/products/book101-1.jpg', 'Children\'s book', 'by Margaret Wise Brown  (Author), Clement Hurd (Illustrator), January 3, 2006'),
    (102, 'Pippi Longstocking', 149, '../img/products/book102-1.jpg', 'Children\'s book', 'by Astrid Lindgren(Author), Ingrid Vang Nyman(Author), Translated, September 2, 20'),
    (103, 'The Giving Tree', 95, '../img/products/book103-1.jpg', 'Children\'s book', 'by Shel Silverstein  (Author), February 18, 2014, Hardcover'),
    (104, 'The Frog and Toad', 72, '../img/products/book104-1.jpg', 'Children\'s book', 'by Arnold Lobel  (Author, Illustrator), May 25, 2004'),
    (105, 'I Want My Hat Back', 129, '../img/products/book105-1.jpg', 'Children\'s book', 'by Jon Klassen (Author, Illustrator), September 27, 2011'),
    (201, 'Too Big to Fail', 89, '../img/products/book201-1.jpg', 'Business book', 'by Andrew Ross Sorkin, July 1, 2010'),
    (202, 'Wild Ride', 128, '../img/products/book202-1.jpg', 'Business book', 'by Ann Hagedorn Auerbach, December 15, 1995'),
    (203, 'Principles: Life and Work', 133, '../img/products/book203-1.jpg', 'Business book', 'by Ray Dalio, September 19, 2017'),
    (204, 'Den of Thieves', 135, '../img/products/book204-1.jpg', 'Business book', 'by James B. Stewart, September 1, 1992'),
    (205, 'King of Capital', 139, '../img/products/book205-1.jpg', 'Business book', 'by David Carey, John E. Morris, February 7, 2012'),
    (301, 'Web Design with HTML, CSS, JavaScript and jQuery S', 509, '../img/products/book301-1.jpg', 'IT book', 'by Jon Duckett, August 2014'),
    (302, 'Java: The Complete Reference', 385, '../img/products/book302-1.jpg', 'IT book', 'by Herbert Schildt, 2014'),
    (303, 'PHP and MySQL for Dynamic Web Sites', 448, '../img/products/book303-1.jpg', 'IT book', 'By Larry Ullman, November 3, 2017'),
    (304, 'Code Complete', 355, '../img/products/book304-1.jpg', 'IT book', 'by Steve McConnell, November 30, 2009'),
    (305, 'Learning Python', 619, '../img/products/book305-1.jpg', 'IT book', 'by Mark Lutz, 2009');

    -- --------------------------------------------------------

    --
    -- Table structure for table `sale`
    --

    CREATE TABLE `sale` (
      `count` int(3) NOT NULL,
      `user` int(3) NOT NULL,
      `book` int(3) NOT NULL,
      `saledate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `storage` int(5) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    --
    -- Dumping data for table `sale`
    --

    INSERT INTO `sale` (`count`, `user`, `book`, `saledate`, `storage`) VALUES
    (1, 102, 304, '0000-00-00 00:00:00', 99);

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
    (150, 'Song', '111', 'liusongscu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
    (151, 'Song', '123', 'aaa@aaa.bc', '202cb962ac59075b964b07152d234b70'),
    (152, 'Song', '123', 'aaa@aaa.bcd', '698d51a19d8a121ce581499d7b701668');

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
      ADD PRIMARY KEY (`count`);

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
      MODIFY `count` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
    --
    -- AUTO_INCREMENT for table `users`
    --
    ALTER TABLE `users`
      MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
