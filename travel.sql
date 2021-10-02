-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 02:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addloca`
--

CREATE TABLE `addloca` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `attraction` varchar(200) NOT NULL,
  `history` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addloca`
--

INSERT INTO `addloca` (`id`, `file`, `attraction`, `history`, `address`, `link`) VALUES
(5, 'หาดทรายรี.jpg', 'หาดทรายรี', 'หาดทรายรี ตั้งอยู่ใน ตำบลหาดทรายรี อำเภอเมืองชุมพร จังหวัดชุมพร ถือว่าเป็นสถานที่ท่องเที่ยวชื่อดังของชุมพรเลยค่ะ เพราะที่นี่จะมีหาดทรายขาวสะอาด บริเวณรอบๆ ก็จะมีทั้งที่พักและร้านอาหารให้บริการอีกด้วย ', 'หาดทรายรี ปากน้ำ-หาดทรายรี ตำบลหาดทรายรี อำเภอเมืองชุมพร จังหวัดชุมพร', 'https://goo.gl/maps/D8rrUtHR2VvYBEuX6 '),
(7, '4.jpg', 'ภูทับเบิก', 'ภูทับเบิก นั้นเป็นชื่อของหมู่บ้านที่ชื่อ หมู่บ้านม้งทับเบิก  โดยเป็นหมู่บ้านชาวเขาเผ่าม้ง เป็นยอดเขาที่สูงที่สุดในจังหวัดเพชรบูรณ์ ซึ่งมีความสูงจากระดับน้ำทะเลประมาณ 1,768 เมตร บนภูเขาสูงของจังหวัดเพช', 'ตำบล กกสะทอน อำเภอด่านซ้าย เลย 42120', 'https://goo.gl/maps/FgoufN9EVDXaXud26'),
(8, 'fuji.jpg', 'Fuji Mountain', 'เป็นภูเขาที่สูงที่สุดใน ประเทศญี่ปุ่น ราว 3,776 เมตร (12,388 ฟุต) ตั้งอยู่บริเวณจังหวัดชิซูโอกะและจังหวัดยามานาชิ ซึ่งอยู่ทางตะวันตกของ โตเกียว พื้นที่โดยรอบประกอบด้วย ทะเลสาบฟูจิทั้งห้า อุทยานแห่งชาต', 'Kitayama, Fujinomiya, Shizuoka 418-0112, Japan', 'https://goo.gl/maps/NmRyWUujFpm4FuGd8'),
(11, 'เขาเขียว.jpg', 'เขาเขียว', 'อยู่บริเวณเชิงเขาเขียว ห่างจากตัวเมืองศรีราชาประมาณ 25 กิโลเมตร นับเป็นผืนป่าแห่งเดียวในจังหวัดชลบุรี และเป็นสวนสัตว์ที่มีเนื้อที่มากกว่า 5,000 ไร่ ตั้งขึ้นเมื่อ พ.ศ. 2521 โดยฟื้นฟูสภาพป่าเขาเขียวที่เ', 'หมู่ที่ 7 235 ตำบล บางพระ อำเภอศรีราชา ชลบุรี 20110', 'https://goo.gl/maps/digcRpaVDCSTMZZu5'),
(12, '563000005860001.jpg', 'หาดบางแสน', 'เป็นสถานที่ท่องเที่ยวยอดนิยมของชาวไทย มีถนนตัดเลียบชายหาด ซึ่งเรียงรายไปด้วยร้านอาหาร ที่พัก เครื่องเล่นต่าง ๆ ให้เช่า และห้องอาบน้ำจืด ที่ตั้ง :ตำบลแสนสุข อำเภอเมือง จังหวัดชลบุรี ห่างจากตัวเมืองชลบุ', 'แสนสุข เมืองชลบุรี ชลบุรี 20000', 'https://goo.gl/maps/X3zsdnq3Yi9fmULbA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fistname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usergroup` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fistname`, `lastname`, `email`, `birthdate`, `gender`, `password`, `usergroup`) VALUES
(1, 'sopondclay', 'Kittikarn', 'Janbang', 'sopondclay@gmail.com', '2000-04-07', 'Male', '62c8f7a5ab1dc540a79a733725971dbd', 'A'),
(2, 'ploysiri', 'Ploysiri', 'Kadun', 'ploy@gmail.com', '1999-12-30', 'Female', 'e10adc3949ba59abbe56e057f20f883e', 'P'),
(3, 'hody', 'hodyly', 'jing', 'hody@gmail.com', '2021-10-13', 'Female', 'e10adc3949ba59abbe56e057f20f883e', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addloca`
--
ALTER TABLE `addloca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addloca`
--
ALTER TABLE `addloca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
