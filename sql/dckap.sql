-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dckap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phone` varchar(15) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `emp_pro_img` varchar(255) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_name`, `emp_email`, `emp_phone`, `emp_code`, `emp_pro_img`, `emp_dob`, `emp_address`, `emp_status`, `create_date`, `update_date`) VALUES
(1, 'ankuresh verma', 'ankuresh@gmail.com', '9784561345', '5241278', '20618.jpg', '2021-05-02', 'Lucknow city', 1, '2021-05-25 01:46:09', '2021-05-25 09:00:09'),
(3, 'Sarojani Verma', 'sarojani@gmail.com', '7898788956', '543546', '42886.jpg', '2021-05-20', 'Gujaini Kanpur', 1, '2021-05-25 08:06:15', '2021-05-25 09:04:29'),
(4, 'Ankit verma', 'ankit@gmail.com', '7874585455', '46787', '13607.jpg', '2021-05-20', 'kanpur Nagar', 1, '2021-05-25 08:06:58', '2021-05-25 08:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_email` (`emp_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
