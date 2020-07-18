-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 04:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Sci-Fi'),
(2, 'Comedy'),
(3, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(250) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_content`, `comment_date`) VALUES
(1, 1, 'Diwakar Singh', 'Comment', '2019-10-14'),
(2, 1, 'Joel', 'HEy', '2019-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_type` varchar(250) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` text NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_desc` text NOT NULL,
  `post_comment_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_type`, `post_title`, `post_author`, `post_date`, `post_content`, `post_cat_id`, `post_image`, `post_desc`, `post_comment_count`) VALUES
(1, 'review', 'Alita: Battle Angel', 'diwakar', '2019-10-14', 'I don&#039;t write reviews very often but I was so awestruck after watching Alita I&#039;ve been watching the trailers again non-stop since I got home and am seriously considering watching the movie again maybe on IMAX, so why not write a review. I&#039;ve been waiting for Alita to hit theaters since the first trailer came out last year, and it didn&#039;t disappoint: she is simply adorable, and to accomplish something like this with a CGI character is an incredible feat on its own. But on top of that there&#039;s a good story, some of the best action scenes I&#039;ve ever seen, and what&#039;s also great is that it feels like an actual movie, as opposed to a bunch of action scenes stitched together. <br />\r\n<br />\r\nI&#039;m not giving out any spoilers but I&#039;ll say this, Alita is now one of my favorite heroes of all time, it got me excited and with misty eyes throughout the entire flick and I left the theater with a smile on my face, can&#039;t wait for part 2! So, I&#039;d have to say that it&#039;s as good as it gets.		', 0, 'alita.jpg', 'Better than I expected, and I was expecting A LOT!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `user_password` text NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(250) NOT NULL,
  `user_join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `fullname`, `user_email`, `user_image`, `user_role`, `user_join_date`) VALUES
(1, 'diwakar', '12345678', 'Diwakar Singh', 'diwakar@mail.com', '03000e73.jpg', 'admin', '2019-02-28'),
(2, 'johndoe', '12345678', 'John Doe', 'johndoe@mail.com', 'Deadpool-Logo-Dark-Art-Hero-iphone-6-wallpaper-ilikewallpaper_com.jpg', 'user', '2019-08-01'),
(3, 'janeDoe', '12345678', 'Jane Doe', 'janedoe@mail.com', '', 'user', '2019-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
