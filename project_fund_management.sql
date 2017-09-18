-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 07:35 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fund_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledger_entry`
--

CREATE TABLE `acc_ledger_entry` (
  `acc_ledger_id` int(11) NOT NULL,
  `acc_ledger_pro_code` int(11) NOT NULL,
  `acc_ledger_date` date NOT NULL,
  `acc_ledger_voucher_numb` varchar(255) NOT NULL,
  `acc_ledger_desc` varchar(255) NOT NULL,
  `acc_ledger_debit` float NOT NULL,
  `acc_ledger_credit` float NOT NULL,
  `acc_ledger_bal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_ledger_entry`
--

INSERT INTO `acc_ledger_entry` (`acc_ledger_id`, `acc_ledger_pro_code`, `acc_ledger_date`, `acc_ledger_voucher_numb`, `acc_ledger_desc`, `acc_ledger_debit`, `acc_ledger_credit`, `acc_ledger_bal`) VALUES
(1, 1, '2017-08-18', '12312', 'adasdasda', 1231230, 131231, 0),
(2, 1, '2017-08-18', '12312', 'adasdasda', 1231230, 131231, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `dm_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_address` varchar(255) NOT NULL,
  `dept_nodal_name` varchar(255) NOT NULL,
  `dept_nodal_email` varchar(255) NOT NULL,
  `dept_nodal_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loc_city`
--

CREATE TABLE `loc_city` (
  `dis_id` int(11) NOT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loc_city`
--

INSERT INTO `loc_city` (`dis_id`, `district`) VALUES
(1, 'Gurgaon'),
(2, 'Hisar'),
(3, 'Palwal'),
(4, 'Jind'),
(5, 'Kaithal'),
(6, 'Karnal'),
(7, 'Mahendragarh'),
(8, 'Mewat'),
(9, 'Panchkula'),
(10, 'Rewari'),
(11, 'Rohtak'),
(12, 'Sirsa'),
(13, 'Yamunanagar'),
(14, 'Charkhi Dadri');

-- --------------------------------------------------------

--
-- Table structure for table `new_project`
--

CREATE TABLE `new_project` (
  `pro_id` int(11) NOT NULL,
  `pro_code` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `req_method` varchar(255) NOT NULL,
  `amt_rec` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_project`
--

INSERT INTO `new_project` (`pro_id`, `pro_code`, `pro_name`, `req_method`, `amt_rec`, `department`, `state`, `city`) VALUES
(1, 'PJ00', 'abc', 'acd', '100000', 'fff', 'Punjab', 'Haryana'),
(13, 'PJ02', 'abc1', 'acd', '100000', 'fff', 'Punjab', 'Haryana'),
(14, 'PJ03', 'abc3', 'acd', '100000', 'fff', 'Punjab', 'Haryana');

-- --------------------------------------------------------

--
-- Table structure for table `project_expenditure`
--

CREATE TABLE `project_expenditure` (
  `pro_expend_id` int(11) NOT NULL,
  `pro_expend_project_code` float NOT NULL,
  `pro_expend_credit` float NOT NULL,
  `pro_expend__debit` float NOT NULL,
  `pro_expend_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_master`
--

CREATE TABLE `project_master` (
  `pm_id` int(11) NOT NULL,
  `pro_code` int(11) NOT NULL DEFAULT '0',
  `pro_name_info` varchar(255) NOT NULL,
  `pro_department_info` varchar(255) NOT NULL,
  `pro_req_method_info` varchar(255) NOT NULL,
  `pro_email_date` date NOT NULL,
  `pro_email_from` varchar(255) NOT NULL,
  `pro_letter_no` varchar(255) NOT NULL,
  `pro_letter_date` date NOT NULL,
  `pro_letter_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_master`
--

INSERT INTO `project_master` (`pm_id`, `pro_code`, `pro_name_info`, `pro_department_info`, `pro_req_method_info`, `pro_email_date`, `pro_email_from`, `pro_letter_no`, `pro_letter_date`, `pro_letter_from`) VALUES
(1, 1, '1', '1', '1', '2017-08-02', 'Test', 'Test', '2017-08-24', 'Test'),
(2, 1, '2', '3', '1', '2017-08-18', 'Test', 'Test', '2017-08-25', 'Test'),
(3, 1, '2', '3', '1', '2017-08-18', 'Test', 'Test', '2017-08-25', 'Test'),
(4, 0, '2', '3', '1', '2017-08-18', 'Test', 'Test', '2017-08-25', 'Test'),
(5, 0, '2', '1', '1', '0000-00-00', '', '', '2017-08-31', ''),
(6, 0, '1', '1', '2', '2017-09-22', 'Test', '', '0000-00-00', ''),
(7, 0, '1', '1', '1', '0000-00-00', '', '1234', '2017-09-05', 'Saranjit');

-- --------------------------------------------------------

--
-- Table structure for table `request_form`
--

CREATE TABLE `request_form` (
  `req_form_id` int(11) NOT NULL,
  `transaction_req_id` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `req_received_date` datetime NOT NULL,
  `req_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_methods`
--

CREATE TABLE `request_methods` (
  `req_meth_id` int(11) NOT NULL,
  `request_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`u_id`, `username`, `password`, `name`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_ledger_entry`
--
ALTER TABLE `acc_ledger_entry`
  ADD PRIMARY KEY (`acc_ledger_id`);

--
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `loc_city`
--
ALTER TABLE `loc_city`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `new_project`
--
ALTER TABLE `new_project`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_name` (`pro_name`),
  ADD UNIQUE KEY `pro_code` (`pro_code`);

--
-- Indexes for table `project_expenditure`
--
ALTER TABLE `project_expenditure`
  ADD PRIMARY KEY (`pro_expend_id`);

--
-- Indexes for table `project_master`
--
ALTER TABLE `project_master`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `request_form`
--
ALTER TABLE `request_form`
  ADD PRIMARY KEY (`req_form_id`);

--
-- Indexes for table `request_methods`
--
ALTER TABLE `request_methods`
  ADD PRIMARY KEY (`req_meth_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_ledger_entry`
--
ALTER TABLE `acc_ledger_entry`
  MODIFY `acc_ledger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loc_city`
--
ALTER TABLE `loc_city`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `new_project`
--
ALTER TABLE `new_project`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project_expenditure`
--
ALTER TABLE `project_expenditure`
  MODIFY `pro_expend_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_master`
--
ALTER TABLE `project_master`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `request_form`
--
ALTER TABLE `request_form`
  MODIFY `req_form_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_methods`
--
ALTER TABLE `request_methods`
  MODIFY `req_meth_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
