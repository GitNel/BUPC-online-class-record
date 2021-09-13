-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 12:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-06-11 12:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(80) DEFAULT NULL,
  `class_num` int(4) NOT NULL,
  `class_section` varchar(5) NOT NULL,
  `class_createdate` date NOT NULL DEFAULT current_timestamp(),
  `dept_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_stat` enum('A','I','','') NOT NULL,
  `sy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`class_id`, `class_name`, `class_num`, `class_section`, `class_createdate`, `dept_id`, `user_id`, `class_stat`, `sy_id`) VALUES
(1, 'BSIT', 1, 'A', '2021-09-08', 1, 2, 'A', 1),
(2, 'BSIT', 2, 'B', '2021-09-09', 1, 2, 'A', 2),
(3, 'BSIT', 3, 'C', '2021-09-13', 1, 2, 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_stat` enum('A','I','','') NOT NULL COMMENT 'A= Active .. I= Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`course_id`, `course_name`, `course_code`, `course_stat`) VALUES
(1, 'BSIT', 'bsit123', 'A'),
(2, 'BSELT', 'BSELT123', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblcritequi`
--

CREATE TABLE `tblcritequi` (
  `equi_id` int(11) NOT NULL,
  `crit_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `eq_comp1` int(11) NOT NULL,
  `eq_comp2` int(11) NOT NULL,
  `eq_comp3` int(11) NOT NULL,
  `eq_comp4` int(11) NOT NULL,
  `eq_comp5` int(11) NOT NULL,
  `eq_comp6` int(11) NOT NULL,
  `eq_comp7` int(11) NOT NULL,
  `eq_comp8` int(11) NOT NULL,
  `eq_comp9` int(11) NOT NULL,
  `eq_comp10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcritequi`
--

INSERT INTO `tblcritequi` (`equi_id`, `crit_id`, `subj_id`, `eq_comp1`, `eq_comp2`, `eq_comp3`, `eq_comp4`, `eq_comp5`, `eq_comp6`, `eq_comp7`, `eq_comp8`, `eq_comp9`, `eq_comp10`) VALUES
(1, 1, 1, 25, 25, 50, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 3, 25, 25, 25, 25, 0, 0, 0, 0, 0, 0),
(4, 4, 4, 10, 10, 20, 20, 20, 20, 0, 0, 0, 0),
(5, 5, 5, 20, 20, 20, 20, 20, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcriteria`
--

CREATE TABLE `tblcriteria` (
  `crit_id` int(11) NOT NULL,
  `crit_name` varchar(255) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comp1` varchar(255) NOT NULL,
  `comp2` varchar(255) NOT NULL,
  `comp3` varchar(255) NOT NULL,
  `comp4` varchar(255) NOT NULL,
  `comp5` varchar(255) NOT NULL,
  `comp6` varchar(255) NOT NULL,
  `comp7` varchar(255) NOT NULL,
  `comp8` varchar(255) NOT NULL,
  `comp9` varchar(255) NOT NULL,
  `comp10` varchar(255) NOT NULL,
  `crit_stat` enum('A','I','','') NOT NULL COMMENT 'A = Active ... I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcriteria`
--

INSERT INTO `tblcriteria` (`crit_id`, `crit_name`, `subj_id`, `user_id`, `comp1`, `comp2`, `comp3`, `comp4`, `comp5`, `comp6`, `comp7`, `comp8`, `comp9`, `comp10`, `crit_stat`) VALUES
(1, 'Midterm', 1, 2, 'Assignment', 'Quiz', 'Exam', '', '', '', '', '', '', '', 'A'),
(3, 'Midterm', 3, 2, 'Assignment', 'Quiz', 'Exam', 'Reports', '', '', '', '', '', '', 'A'),
(4, 'Riz Mid.', 4, 2, 'Assignment', 'Quiz', 'Exam', 'Reports', 'Recitation', 'Laboratory', '', '', '', '', 'A'),
(5, 'Social Finals', 5, 2, 'Assignment', 'Quiz', 'Exam', 'Reports', 'Recitation', '', '', '', '', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`dept_id`, `dept_name`, `dept_code`) VALUES
(1, 'CSD', 'csd111'),
(3, 'ECO', 'CSD123');

-- --------------------------------------------------------

--
-- Table structure for table `tblenroll`
--

CREATE TABLE `tblenroll` (
  `enroll_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `enroll_date` date NOT NULL DEFAULT current_timestamp(),
  `enroll_stat` enum('P','A','I','') NOT NULL COMMENT 'P- Pending ... A-Active .. I-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblenroll`
--

INSERT INTO `tblenroll` (`enroll_id`, `class_id`, `user_id`, `enroll_date`, `enroll_stat`) VALUES
(0, 1, 1, '2021-07-01', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tblgrading`
--

CREATE TABLE `tblgrading` (
  `grad_id` int(11) NOT NULL,
  `grad_name` varchar(255) NOT NULL,
  `equi_id` int(11) NOT NULL,
  `grad_equiva` int(11) NOT NULL,
  `grad_tot_pts` int(11) NOT NULL,
  `grad_crtion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgrading`
--

INSERT INTO `tblgrading` (`grad_id`, `grad_name`, `equi_id`, `grad_equiva`, `grad_tot_pts`, `grad_crtion`) VALUES
(1, 'Assignment # 1', 1, 25, 100, '2021-09-09'),
(2, 'Quiz # 1', 1, 25, 100, '2021-09-09'),
(3, 'Assignment # 1', 3, 25, 100, '2021-09-09'),
(4, 'Exam 1', 1, 50, 100, '2021-09-09'),
(6, 'Report # 1', 3, 25, 90, '2021-09-09'),
(7, 'Quiz # 2', 1, 25, 50, '2021-09-09'),
(8, 'Quiz # 1', 3, 25, 50, '2021-09-09'),
(9, 'Assignment # 1', 4, 10, 10, '2021-09-09'),
(10, 'Recitation # 1', 4, 20, 100, '2021-09-09'),
(11, 'Assignment # 1', 5, 20, 100, '2021-09-13'),
(12, 'Report # 1', 5, 20, 50, '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `stud_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stud_stat` enum('A','I','') NOT NULL COMMENT ' A-Active .. I-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_id`, `subj_id`, `user_id`, `stud_stat`) VALUES
(1, 1, 1, 'A'),
(2, 1, 3, 'A'),
(4, 3, 1, 'A'),
(5, 3, 5, 'A'),
(6, 4, 1, 'A'),
(7, 4, 3, 'A'),
(8, 4, 4, 'A'),
(9, 4, 7, 'A'),
(11, 5, 1, 'A'),
(12, 5, 3, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `subj_id` int(11) NOT NULL,
  `subj_name` varchar(100) NOT NULL,
  `subj_code` varchar(100) NOT NULL,
  `subj_create` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subj_class_code` varchar(50) NOT NULL,
  `subj_stat` enum('A','I','','') NOT NULL COMMENT 'A = Active ... I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`subj_id`, `subj_name`, `subj_code`, `subj_create`, `user_id`, `class_id`, `subj_class_code`, `subj_stat`) VALUES
(1, 'Math in the Modern World', 'mmw123', '2021-09-08', 2, 1, '7emqS2sm', 'A'),
(3, 'Electronics', 'elect111', '2021-09-08', 2, 1, 'BlE0nyxY', 'A'),
(4, 'Rizal', 'riz223', '2021-09-09', 2, 2, '4t6GYyW1', 'A'),
(5, 'Social', 'soc123', '2021-09-13', 2, 3, 'j3RtdXgC', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblsy`
--

CREATE TABLE `tblsy` (
  `sy_id` int(11) NOT NULL,
  `sy_name` varchar(255) NOT NULL,
  `sy_start` date NOT NULL,
  `sy_end` date NOT NULL,
  `sy_stat` enum('A','I','','') NOT NULL COMMENT 'A= Active .. I= inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsy`
--

INSERT INTO `tblsy` (`sy_id`, `sy_name`, `sy_start`, `sy_end`, `sy_stat`) VALUES
(1, '2021-2022 Second Semester', '2021-01-04', '2021-05-28', 'A'),
(2, '2021-2022 First Semester', '2021-08-08', '2021-12-17', 'A'),
(3, '2019-2020 Second Semester', '2020-01-06', '2020-05-29', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `tbltallypts`
--

CREATE TABLE `tbltallypts` (
  `tally_id` int(11) NOT NULL,
  `grad_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `tally_pts_get` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltallypts`
--

INSERT INTO `tbltallypts` (`tally_id`, `grad_id`, `stud_id`, `subj_id`, `tally_pts_get`) VALUES
(1, 3, 5, 3, 100),
(2, 3, 4, 3, 78),
(4, 6, 5, 3, 50),
(5, 6, 4, 3, 90),
(7, 1, 1, 1, 99),
(8, 1, 2, 1, 78),
(10, 2, 1, 1, 89),
(11, 2, 2, 1, 100),
(13, 4, 1, 1, 90),
(14, 4, 2, 1, 90),
(16, 7, 1, 1, 45),
(17, 7, 2, 1, 34),
(19, 8, 5, 3, 45),
(20, 8, 4, 3, 45),
(22, 9, 8, 4, 9),
(23, 9, 6, 4, 10),
(24, 9, 9, 4, 10),
(25, 9, 7, 4, 9),
(29, 10, 8, 4, 100),
(30, 10, 6, 4, 40),
(31, 10, 9, 4, 10),
(32, 10, 7, 4, 90),
(33, 11, 11, 5, 50),
(34, 11, 12, 5, 78),
(36, 12, 11, 5, 50),
(37, 12, 12, 5, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `user_gender` enum('F','M','','') NOT NULL COMMENT 'F- Female .. M- Male',
  `user_name` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `repass_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` enum('P','S','','') NOT NULL COMMENT 'P- Professor .. S- Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `middle_name`, `user_gender`, `user_name`, `user_img`, `repass_name`, `user_pass`, `user_role`) VALUES
(1, 'Jhun Paul', 'Moratalla', 'Rico', 'M', '2018-PC-000001', '', 'qwe', 'qwe', 'S'),
(2, 'Jane', 'Doe', 'Longfellow', 'F', '2018-PC-000002', '', 'qwe', 'qwe', 'P'),
(3, 'Arnel', 'Sta. Romana', 'Samu', 'M', '2018-PC-000003', '', 'qwe', 'qwe', 'S'),
(4, 'Kean', 'Bastian', 'Samu', 'F', '2018-PC-000004', '', 'qwe', 'qwe', 'S'),
(5, 'Max', 'Lenon', 'Kon', 'M', '2018-PC-000005', '', 'qwe', 'qwe', 'S'),
(6, 'Jason', 'Mendez', 'Hart', 'M', '2018-PC-000006', '', 'qwe', 'qwe', 'P'),
(7, 'Jona', 'Price', 'Hart', 'F', '2018-PC-000007', '', 'qwe', 'qwe', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tblcritequi`
--
ALTER TABLE `tblcritequi`
  ADD PRIMARY KEY (`equi_id`);

--
-- Indexes for table `tblcriteria`
--
ALTER TABLE `tblcriteria`
  ADD PRIMARY KEY (`crit_id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tblenroll`
--
ALTER TABLE `tblenroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `tblgrading`
--
ALTER TABLE `tblgrading`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tblsy`
--
ALTER TABLE `tblsy`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `tbltallypts`
--
ALTER TABLE `tbltallypts`
  ADD PRIMARY KEY (`tally_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcritequi`
--
ALTER TABLE `tblcritequi`
  MODIFY `equi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcriteria`
--
ALTER TABLE `tblcriteria`
  MODIFY `crit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblenroll`
--
ALTER TABLE `tblenroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblgrading`
--
ALTER TABLE `tblgrading`
  MODIFY `grad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsy`
--
ALTER TABLE `tblsy`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltallypts`
--
ALTER TABLE `tbltallypts`
  MODIFY `tally_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
