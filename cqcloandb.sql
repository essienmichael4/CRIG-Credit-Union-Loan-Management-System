-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 02:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cqcloandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(13) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_names` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `member_code` varchar(255) DEFAULT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) NOT NULL,
  `member_status` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `loan_amount` float NOT NULL,
  `loan_interest` float NOT NULL,
  `loan_arrears` float DEFAULT NULL,
  `loan_to_be_payed` float NOT NULL,
  `loan_paid` float NOT NULL DEFAULT 0,
  `apply_date` date DEFAULT curdate(),
  `applicant_first_due_date` date NOT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `guarantor_fullname_first` varchar(255) NOT NULL,
  `guarantor_phone_first` varchar(255) NOT NULL,
  `guarantor_staffnum_first` varchar(255) NOT NULL,
  `guaranteed_amount_first` varchar(255) NOT NULL,
  `guarantor_fullname_second` varchar(255) NOT NULL,
  `guarantor_phone_second` varchar(255) NOT NULL,
  `guarantor_staffnum_second` varchar(255) NOT NULL,
  `guaranteed_amount_second` varchar(255) NOT NULL,
  `guarantor_fullname_third` varchar(255) NOT NULL,
  `guarantor_phone_third` varchar(255) NOT NULL,
  `guarantor_staffnum_third` varchar(255) NOT NULL,
  `guaranteed_amount_third` varchar(255) NOT NULL,
  `guarantor_fullname_fourth` varchar(255) NOT NULL,
  `guarantor_phone_fourth` varchar(255) NOT NULL,
  `guarantor_staffnum_fourth` varchar(255) NOT NULL,
  `guaranteed_amount_fourth` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `first_due_date` date DEFAULT NULL,
  `first_due_date_status` varchar(255) DEFAULT NULL,
  `first_due_recipient` varchar(255) DEFAULT NULL,
  `second_due_date` date DEFAULT NULL,
  `second_due_date_status` varchar(255) DEFAULT NULL,
  `second_due_recipient` varchar(255) DEFAULT NULL,
  `third_due_date` date DEFAULT NULL,
  `third_due_date_status` varchar(255) DEFAULT NULL,
  `third_due_recipient` varchar(255) DEFAULT NULL,
  `fourth_due_date` date DEFAULT NULL,
  `fourth_due_date_status` varchar(255) DEFAULT NULL,
  `fourth_due_recipient` varchar(255) DEFAULT NULL,
  `fifth_due_date` date DEFAULT NULL,
  `fifth_due_date_status` varchar(255) DEFAULT NULL,
  `fifth_due_recipient` varchar(255) DEFAULT NULL,
  `sixth_due_date` date DEFAULT NULL,
  `sixth_due_date_status` varchar(255) DEFAULT NULL,
  `sixth_due_recipient` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `approval_status` varchar(255) NOT NULL DEFAULT 'pending',
  `loan_status` varchar(255) DEFAULT NULL,
  `day_approved` datetime DEFAULT NULL,
  `day_granted` datetime DEFAULT NULL,
  `granted_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `first_name`, `last_name`, `other_names`, `phone_number`, `member_code`, `staff_id`, `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_arrears`, `loan_to_be_payed`, `loan_paid`, `apply_date`, `applicant_first_due_date`, `mode_of_payment`, `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, `recipient_name`, `first_due_date`, `first_due_date_status`, `first_due_recipient`, `second_due_date`, `second_due_date_status`, `second_due_recipient`, `third_due_date`, `third_due_date_status`, `third_due_recipient`, `fourth_due_date`, `fourth_due_date_status`, `fourth_due_recipient`, `fifth_due_date`, `fifth_due_date_status`, `fifth_due_recipient`, `sixth_due_date`, `sixth_due_date_status`, `sixth_due_recipient`, `approved_by`, `approval_status`, `loan_status`, `day_approved`, `day_granted`, `granted_by`) VALUES
(1, 'Michael', 'Essien', '', '263436049', 'mem123', 'cid1234', 'CRIG', 'member', 'school fees', 5000, 1000, 5880, 6000, 120, '2022-05-07', '2022-05-31', 'Member', 'godwin', '6265656586', 'cd1111', '1500', 'asnate', '273536024', 'cg11242', '1500', 'timmy', '596869875', 'cd12356', '1500', 'francis', '209241336', 'cd56456', '1500', 'Michael Essien', '2022-06-30', 'paid', '', '2022-07-30', NULL, NULL, '2022-08-29', NULL, NULL, '2022-09-28', NULL, NULL, '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, 'michael essien', 'approved', 'pending', '2022-06-08 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deletedusers`
--

CREATE TABLE `deletedusers` (
  `id` int(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uid` int(13) NOT NULL,
  `deletedby` varchar(255) NOT NULL,
  `day_deleted` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(13) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_names` varchar(255) DEFAULT NULL,
  `mem_code` varchar(255) NOT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `name_of_spouse` varchar(255) DEFAULT NULL,
  `number_of_children` int(11) DEFAULT NULL,
  `next_of_kin` varchar(255) DEFAULT NULL,
  `next_of_kin_phone` varchar(255) DEFAULT NULL,
  `next_of_kin_relation` varchar(255) DEFAULT NULL,
  `next_of_kin_occupation` varchar(255) DEFAULT NULL,
  `next_of_kin_address` varchar(255) DEFAULT NULL,
  `balance` float NOT NULL DEFAULT 0,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `home_town` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `place_of_work` varchar(255) DEFAULT NULL,
  `day_created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `first_name`, `last_name`, `other_names`, `mem_code`, `staff_id`, `phone`, `marital_status`, `name_of_spouse`, `number_of_children`, `next_of_kin`, `next_of_kin_phone`, `next_of_kin_relation`, `next_of_kin_occupation`, `next_of_kin_address`, `balance`, `date_of_birth`, `address`, `residential_address`, `home_town`, `occupation`, `division`, `place_of_work`, `day_created`, `created_by`, `account_status`) VALUES
(10, 'Michael', 'Essien', 'Yaw', 'cqc1234567890', '', '0263436049', 'Single', NULL, 0, 'Godwin Essien', '02542424242', 'Brother', 'Accountant', 'Elijoe Peace Hostel', 2000, '1995-06-02', 'Elijoe Peace Hostel', 'Elijoe Peace Hostel', 'Adweso', 'NSP', 'SIU', 'CRIG', '2022-06-03 11:19:45', 'Michael Essien', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(13) NOT NULL,
  `member_code` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `deposit_type` varchar(255) DEFAULT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `amount_transacted` float NOT NULL,
  `amount_in_account` float NOT NULL,
  `balance_in_account` float NOT NULL,
  `transaction_day` datetime DEFAULT current_timestamp(),
  `transacted_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `member_code`, `transaction_type`, `deposit_type`, `receipt_number`, `amount_transacted`, `amount_in_account`, `balance_in_account`, `transaction_day`, `transacted_by`) VALUES
(1, 'cqc1234567890', 'deposit', 'bulk', NULL, 2000, 0, 2000, '2022-06-03 11:19:45', 'Michael Essien');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(13) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_names` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `day_created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `other_names`, `username`, `staff_id`, `phone`, `email`, `role`, `password`, `day_created`, `created_by`, `status`) VALUES
(1, 'Michael', 'Essien', NULL, 'codejunior', NULL, NULL, 'essienmichael4@gmail.com', 'super', 'prototype', '2022-05-02 19:00:58', 'Michael Essien', 'logged in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deletedusers`
--
ALTER TABLE `deletedusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mem_code` (`mem_code`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deletedusers`
--
ALTER TABLE `deletedusers`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
