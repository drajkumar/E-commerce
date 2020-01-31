-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 08:58 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoudagar`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` int(200) NOT NULL,
  `description` text NOT NULL,
  `about_img` varchar(60) NOT NULL,
  `createat` datetime NOT NULL,
  `updateat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `username`, `password`, `salt`, `joined`) VALUES
(1, 'admin', 'c44119add047f7234e1522c180f56e260582b12fdc60d3fcc731168e72555a4f', 'lmlJsiP«›ð¡áj’ùþqºáÙ[lc¡\'/V³õ', '2017-11-27 08:16:09'),
(2, 'drajkumar@gmail.com', 'c4fc2e0ba34b166083121cd338766510a0645ff7a6c41732e1c8f088c81d5257', '1534412045.0273', '2018-08-16 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(50) NOT NULL,
  `createed_time` date NOT NULL,
  `updateed_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `description`, `picture`, `createed_time`, `updateed_time`) VALUES
(2, 'efgdefg ddfgfd edvdf rrrrr', 'xcsxsadsaxsaxaxas rrrrrr', 'f50931224d5fd1663875569eb0f02769.jpg', '2018-08-06', '2018-08-06'),
(3, 'this is a good post', 'usdfjdsfg jhdsjhfsjk kjshdfjdsg ', '6a7f1aa78931feb1dc8d073394d7883d.jpg', '2018-08-06', '0000-00-00'),
(4, 'Wow what a idea ', 'skladjaskd sjkdhsakd skjhdskad skjhdskajd ', '3441b96949d5ed94791bf8a092368753.jpg', '2018-08-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(190) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `blog_id`, `comment`, `name`, `email`, `website`, `created_at`) VALUES
(1, 4, 'ddsdsads', 'rajkumar', 'chondi@gmail.com', 'www.omouk.com', '2027-08-18 00:00:00'),
(2, 4, 'yugutugjhgjhgh jhgkhg uikjhgjh hgjhg jhgjhg jhg', 'Golam Foysol', 'drajkumar@gmail.com', 'hghjghj', '2027-08-18 00:00:00'),
(4, 4, 'jhddskfhdskjfdsf dkjhfdskjfdhsfj', 'Golam Foysol', 'rajkumar@gmail.com', 'dsdsdc', '2027-08-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `packs_id` int(11) NOT NULL,
  `packs_uq_id` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(70) NOT NULL,
  `category` varchar(40) NOT NULL,
  `new_rate` int(11) NOT NULL,
  `old_rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`packs_id`, `packs_uq_id`, `title`, `description`, `picture`, `category`, `new_rate`, `old_rate`, `created_at`) VALUES
(1, '5b77fc1ed22f5', '4 camara dddddd', 'this is a good packes', '329405b5f61efbd1dc3ff16948367734.jpg', 'electronics', 5000, 0, '2018-08-18 10:59:42'),
(2, '5b7a8d737b3ee', 'kdjskfjsdifds ', 'skdjskodfjskfjsdkf', '7ed046e7b5a07a9d6286b75d26a09cba.jpg', 'eventmanagement', 34324, 0, '2018-08-20 09:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_uq_id` varchar(32) NOT NULL,
  `product_head_text` varchar(150) NOT NULL,
  `product_description` text NOT NULL,
  `new_price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `product_main_chata` varchar(100) NOT NULL,
  `product_sub_chata` varchar(100) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_uq_id`, `product_head_text`, `product_description`, `new_price`, `old_price`, `product_main_chata`, `product_sub_chata`, `product_code`, `stok`, `product_img`, `status`, `add_time`) VALUES
(1, '5b55d18fe7cf8', 'Shirt peour corton', 'This is a good product and good quyality', 500, 0, 'men', 'Shirt', 'S-20', 10, 'fa3116d1eaba82a6c92cb453e4974c0c.jpg', 1, '2018-07-23 13:01:03'),
(2, '5b56f114daa05', 'Bra and panties', 'skbdaskdhskj  kasjalkdkdk lksjdlskd', 450, 500, 'women', 'undergarment', 'B-45', 20, '4871d22997c4d497518e8e1c693cc8a4.jpg', 1, '2018-07-24 09:27:48'),
(3, '5b56f1a7247b4', 'Bra', 'jjk jhjk jhjk hkj jhkj kjhkj ', 400, 0, 'women', 'undergarment', 'B-32', 20, '35a77560ede5acf4dbaa59b91ab8031f.jpg', 1, '2018-07-24 09:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_catagori`
--

CREATE TABLE `product_catagori` (
  `chata_id` int(11) NOT NULL,
  `main_catagori` varchar(100) NOT NULL,
  `sub_chatagori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_catagori`
--

INSERT INTO `product_catagori` (`chata_id`, `main_catagori`, `sub_chatagori`) VALUES
(1, 'men', 'Shirt'),
(2, 'men', 'Pants'),
(3, 'women', 'undergarment'),
(4, 'men', 'undergarmants'),
(5, 'electronics', 'CC Camera'),
(6, 'foods', 'Sweets'),
(7, 'event Management', 'Weeding'),
(8, 'all products', 'allproducts'),
(9, 'about us', 'aboutus'),
(10, 'books', 'programing');

-- --------------------------------------------------------

--
-- Table structure for table `product_gelary`
--

CREATE TABLE `product_gelary` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `id` int(11) NOT NULL,
  `option_product_id` int(11) NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `option_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`id`, `option_product_id`, `option_name`, `option_value`) VALUES
(3, 3, 'Color', 'Blue'),
(4, 3, 'Color', 'black'),
(5, 3, 'size', 'xl'),
(6, 3, 'size', 'xxl');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `user_phone_num` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productcode` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `paymant_type` int(11) NOT NULL,
  `paymant_code` varchar(50) NOT NULL,
  `paymant_status` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`order_id`, `register_id`, `user_phone_num`, `product_id`, `productcode`, `quantity`, `size`, `color`, `subtotal`, `paymant_type`, `paymant_code`, `paymant_status`, `order_time`, `status`) VALUES
(10, 2, '017110855322', 3, 'B-32', 5, 'xxl', 'black', 2000, 1, '', 0, '2017-08-18 00:00:00', 1),
(11, 2, '017110855322', 1, 'S-20', 7, 'nosize', 'nocolor', 3500, 1, '', 0, '2025-08-18 00:00:00', 0),
(12, 2, '017110855322', 2, 'B-45', 8, 'nosize', 'nocolor', 3600, 1, '', 0, '2025-08-18 00:00:00', 0),
(13, 2, '017110855322', 1, 'S-20', 4, 'nosize', 'nocolor', 2000, 1, '', 0, '2026-08-18 00:00:00', 0),
(14, 2, '017110855322', 2, 'B-45', 4, 'nosize', 'nocolor', 1800, 1, '', 0, '2026-08-18 00:00:00', 0),
(15, 2, '017110855322', 3, 'B-32', 6, 'xl', 'Blue', 2400, 1, '', 0, '2026-08-18 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `joined` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `fullname`, `phone`, `email`, `password`, `salt`, `email_code`, `address`, `joined`, `status`) VALUES
(2, 'rajkumarddddd', '017110855322', 'drajkumar@gmail.com', '9031a79860f41dff29da43683e37ee8bed1f37ca0a10095160aaaa4469a25c3c', '1534540093.9113', '', 'sdsfsdfsdfdsfdssdf', '2016-08-18 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_uq_id` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(70) NOT NULL,
  `category` varchar(40) NOT NULL,
  `new_rate` int(11) NOT NULL,
  `old_rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_uq_id`, `title`, `description`, `picture`, `category`, `new_rate`, `old_rate`, `created_at`) VALUES
(1, '5b77fdc080412', 'sddsffsscsc', 'scscscscsc', 'd6d7c3fb51a1a317a21fb921f0c6d9ee.jpg', 'eventmanagement', 1400, 500, '2018-08-18 11:06:40'),
(2, '5b7a896f05572', 'dcasfdfsdfsd dfsfsdfsdf', 'dfsdfdsf dsfdsffs dsfdsfdsfsd dfdsfsdf', '5d8979e53723dfd432ca741c3992b721.jpg', 'eventmanagement', 343434, 0, '2018-08-20 09:27:11'),
(3, '5b7a89cb41391', 'oifjdoifsd fdifdsoifd dsfuf', 'kdjfslkfjds soidfjsf sdoifjdsoif doifjsodi f', '2418b54f4edadf40163c31ec891cc8ee.jpg', 'electronics', 3333, 0, '2018-08-20 09:28:43'),
(4, '5b7a8a3151781', 'jhfdjfhdsf dfhdskjfhdsf dfkjsdhfkjdsfhdjfhdsjkf', 'fmsdkfjds dfdsfkjdf dkjfhsdfkjd dskjfhdskjf h', 'ad24c1a1c7eeab2b935d67c2a865d642.jpg', 'electronics', 343434234, 0, '2018-08-20 09:30:25');

--
-- Indexes for dumped tables
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `send_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `phone`, `email`, `message`, `send_time`) VALUES
(1, 'Golam Foysol', '3433224324324', 'mesuq.live@yahoo.com', 'gjhfgsfetwfwjdsjhdfgwedwhgdvwhgdf', '2031-08-18 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`packs_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_catagori`
--
ALTER TABLE `product_catagori`
  ADD PRIMARY KEY (`chata_id`);

--
-- Indexes for table `product_gelary`
--
ALTER TABLE `product_gelary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `packs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_catagori`
--
ALTER TABLE `product_catagori`
  MODIFY `chata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_gelary`
--
ALTER TABLE `product_gelary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
