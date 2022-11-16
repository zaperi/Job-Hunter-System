-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 10:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lookyourjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `comps`
--

CREATE TABLE `comps` (
  `id` int(15) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_password` varchar(255) NOT NULL,
  `staff_phonenum` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_ssm` int(15) NOT NULL,
  `comp_size` varchar(255) NOT NULL,
  `comp_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comps`
--

INSERT INTO `comps` (`id`, `staff_name`, `staff_email`, `staff_password`, `staff_phonenum`, `comp_name`, `comp_ssm`, `comp_size`, `comp_type`) VALUES
(1, 'Siti Norhafiza', 'sitinorhafiza@kuptm.com', 'siti123', '01294892398', 'KUPTM', 111, '<150', 'Government'),
(4, 'Dania Zafira', 'daniazafira@gmail.com', 'dania123', '01829803239', 'KPTM', 211, '30-100', 'Goverment'),
(5, 'Lana Hamra', 'lanahamra@tnb.com', 'lana123', '01923878239', 'TnB', 214, '50', 'Goverment'),
(6, 'Aiman Mahirah', 'aimanmahirah@kpjselangor.com', 'aiman123', '01782378349', 'KPJ Selanggor', 341, '60', 'Goverment'),
(7, 'Izat Ashraf', 'izatashraf@rch.com', 'izat123', '01253894818', 'Royale Chulan Hotel', 670, '80', 'Goverment'),
(8, 'Lana', 'lana@kpjap.com', 'lana123', '01293849301', 'KPJ Ampang Puteri', 910, '150', 'Goverment'),
(9, 'Mahirah', 'mahirah@aeon.com', 'mahirah123', '01729378439', 'AEON', 901, '50', 'Goverment'),
(10, 'Zafira', 'zafira@chkl.com', 'zafira123', '01832984237', 'Concorde Hotel Kuala Lumpur', 982, '120', 'Goverment'),
(11, 'Amira', 'amira@aia.com', 'amira123', '01839348349', 'AIA', 903, '150', 'Goverment'),
(12, 'Yasmin', 'yasmin@bo.com', 'yasmin123', '01643948397', 'Burn Out', 723, '25', 'Goverment');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(15) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `jstaff_name` varchar(255) NOT NULL,
  `jcomp_name` varchar(255) NOT NULL,
  `jstaff_email` varchar(255) NOT NULL,
  `jphone_num` varchar(255) NOT NULL,
  `comp_ssm` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `jstaff_name`, `jcomp_name`, `jstaff_email`, `jphone_num`, `comp_ssm`) VALUES
(9, 'Accountant', 'Siti Norhafiza', 'KUPTM', 'sitinorhafiza@kuptm.com', '01294892398', 111),
(14, 'IT Manager', 'Dania Zafira', 'KPTM', 'daniazafira@kptm.com', '0123478991', 211),
(15, 'IT Analysis', 'Lana Hamra', 'TnB', 'lanahamra@tnb.com', '01923878239', 214),
(16, 'Finance', 'Aiman Mahirah', 'KPJ Selanggor', 'aimanmahirah@kpjselangor.com', '01782378349', 341),
(17, 'Accountant', 'Izat Ashraf', 'Royale Chulan Hotel', 'izatashraf@rch.com', '01253894818', 670),
(18, 'Security', 'Lana', 'KPJ Ampang Puteri', 'lana@kpjap.com', '01293849301', 910),
(19, 'Cashier', 'Mahirah', 'AEON', 'mahirah@aeon.com', '01729378439', 901),
(20, 'Chief cashier', 'Mahirah', 'AEON', 'mahirah@aeon.com', '01729378439', 901),
(21, 'CEO', 'Zafira', 'Concorde Hotel Kuala Lumpur', 'zafira@chkl.com', '01832984237', 982),
(22, 'Manager Accounting', 'Amira', 'AIA', 'amira@aia.com', '01839348349', 903),
(23, 'Accountant', 'Yasmin', 'Burn Out', 'yasmin@bo.com', '01643948397', 723);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comps`
--
ALTER TABLE `comps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comps`
--
ALTER TABLE `comps`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
