-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 11:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_cashed`
--

CREATE TABLE `app_cashed` (
  `id` int(11) NOT NULL,
  `staId` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `classId` int(11) NOT NULL,
  `detales` varchar(100) NOT NULL,
  `cearedBy` int(10) UNSIGNED NOT NULL,
  `updatedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_class`
--

CREATE TABLE `app_class` (
  `id` int(11) NOT NULL,
  `className` varchar(30) NOT NULL,
  `detales` varchar(100) NOT NULL,
  `createdBy` int(10) UNSIGNED NOT NULL,
  `updatedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_class_cors`
--

CREATE TABLE `app_class_cors` (
  `id` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `corsId` int(11) NOT NULL,
  `tachId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_cors`
--

CREATE TABLE `app_cors` (
  `id` int(11) NOT NULL,
  `corName` varchar(30) NOT NULL,
  `detales` varchar(100) DEFAULT NULL,
  `grade` int(11) NOT NULL,
  `createdBy` int(10) UNSIGNED NOT NULL,
  `updatedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_fahter`
--

CREATE TABLE `app_fahter` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `phon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `addres` varchar(100) DEFAULT NULL,
  `stuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_sex`
--

CREATE TABLE `app_sex` (
  `id` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_sex`
--

INSERT INTO `app_sex` (`id`, `sex`) VALUES
(1, 'ذكر'),
(2, 'أنثى'),
(3, '------');

-- --------------------------------------------------------

--
-- Table structure for table `app_staudan`
--

CREATE TABLE `app_staudan` (
  `id` int(11) NOT NULL,
  `staName` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `amunt` decimal(10,0) NOT NULL,
  `feeding` varchar(200) DEFAULT NULL,
  `img` char(30) DEFAULT NULL,
  `updatedBy` int(10) UNSIGNED NOT NULL,
  `createdBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_teatcher`
--

CREATE TABLE `app_teatcher` (
  `id` int(11) NOT NULL,
  `techName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `abut` varchar(200) NOT NULL,
  `sexId` int(11) NOT NULL,
  `createdBy` int(10) UNSIGNED NOT NULL,
  `pdatedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` char(65) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `SubscriptionDate` date NOT NULL,
  `lastLogin` datetime NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `online` varchar(3) DEFAULT 'no',
  `tage` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `lastLogin`, `GroupId`, `status`, `online`, `tage`) VALUES
(1, 'school', '$2a$07$yeNCSNwRpYopOhv0TrrReOldjhVQ2hPw9q1PL.wuNqUBINHNmgIWS', 'admin@gmail.com', '0910000000', '2019-10-05', '2019-10-08 10:37:04', 2, 1, 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

CREATE TABLE `app_users_groups` (
  `GroupId` tinyint(3) UNSIGNED NOT NULL,
  `GroupName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`) VALUES
(1, 'المحاسب'),
(2, 'المدير العام'),
(3, 'المراجع العام');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_profiles`
--

CREATE TABLE `app_users_profiles` (
  `userId` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `toge` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_profiles`
--

INSERT INTO `app_users_profiles` (`userId`, `firstname`, `lastname`, `Address`, `DOB`, `image`, `toge`) VALUES
(1, 'admin', 'school', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_groups_privileges`
--

CREATE TABLE `app_user_groups_privileges` (
  `Id` int(5) UNSIGNED NOT NULL,
  `GroupId` tinyint(3) UNSIGNED NOT NULL,
  `privilegeId` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_user_groups_privileges`
--

INSERT INTO `app_user_groups_privileges` (`Id`, `GroupId`, `privilegeId`) VALUES
(1, 1, 1),
(2, 1, 4),
(4, 1, 7),
(5, 2, 1),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 1, 6),
(11, 2, 8),
(12, 2, 9),
(13, 2, 10),
(14, 2, 11),
(15, 2, 12),
(16, 2, 13),
(17, 2, 14),
(18, 2, 15),
(19, 2, 16),
(20, 2, 17),
(21, 2, 18),
(22, 2, 19),
(23, 2, 20),
(24, 2, 21),
(25, 2, 22),
(26, 2, 23),
(27, 2, 24),
(28, 2, 25),
(29, 2, 26),
(30, 2, 27),
(31, 2, 28),
(32, 2, 29),
(33, 2, 30),
(34, 2, 31),
(35, 2, 32),
(36, 2, 33),
(37, 2, 34),
(38, 3, 1),
(39, 3, 5),
(40, 3, 7),
(41, 3, 9),
(42, 3, 12),
(43, 3, 14),
(44, 3, 15),
(45, 3, 16),
(46, 3, 17),
(47, 3, 20),
(48, 3, 21),
(49, 3, 22),
(50, 3, 23),
(51, 3, 24),
(52, 3, 26),
(53, 3, 27),
(54, 3, 28),
(55, 3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_privileges`
--

CREATE TABLE `app_user_privileges` (
  `privilegeId` int(5) UNSIGNED NOT NULL,
  `privilege` varchar(30) NOT NULL,
  `privilegetitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_user_privileges`
--

INSERT INTO `app_user_privileges` (`privilegeId`, `privilege`, `privilegetitle`) VALUES
(1, '/student/default', 'استعراض الطلاب'),
(4, '/student/add', 'انشاء طالب جديد'),
(5, '/student/delete', 'حذف الطالب'),
(6, '/privileges/add', 'انشاء صلاحية جديدة'),
(7, '/student/edit', 'تعديل بيانات الطالب'),
(8, '/usergroup/default', 'استعراض المجموعات'),
(9, '/privileges/default', 'عرض الصلاحيات'),
(10, '/privileges/edit', 'تعديل الصلاحية'),
(11, '/privileges/delete', 'حذف الصلاحية'),
(12, '/users/default', 'عرض المستخدمين'),
(13, '/users/edit', 'تعديل المستخدم'),
(14, '/users/add', 'انشاء مستخدم جديد'),
(15, '/material/default', 'استعراص المواد الدراسية'),
(16, '/usergroup/edit', 'تعديل المجموعة'),
(17, '/usergroup/add', 'انشاء مجموعة جديدة'),
(18, '/material/add', 'انشاء مادة دراسية'),
(19, '/material/edit', 'تعديل مادة دراسية'),
(20, '/classes/default', 'استعراض الفصول الدراسية'),
(21, '/classes/add', 'انشاء فصل جديد'),
(22, '/classes/edit', 'تعديل الفصل الدراسي'),
(23, '/teatcher/default', 'استعراض المعلمين'),
(24, '/teatcher/add', 'انشاء معلم جديد'),
(25, '/teatcher/edit', 'تعديل المعلم'),
(26, '/classes/cours', 'اضافة مادة إلى فصل'),
(27, '/classes/delete', 'حذف المادة من الفصل'),
(28, '/teatcher/cours', 'اضافة مادة إلى معلم'),
(29, '/student/profile', 'عرض بيانات الطالب'),
(30, '/cashed/default', 'استعراض الرسوم الدراسية'),
(31, '/cashed/add', 'اضلافة رسوم لطالب'),
(32, '/cashed/edit', 'تعديل رسوم الطالب'),
(33, '/student/cashed', 'اضافة رسوم للطالب'),
(34, '/report/default', 'نافذة التقارير');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_cashed`
--
ALTER TABLE `app_cashed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staId` (`staId`),
  ADD KEY `classId` (`classId`),
  ADD KEY `cearedBy` (`cearedBy`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `app_class`
--
ALTER TABLE `app_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdBy` (`createdBy`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `app_class_cors`
--
ALTER TABLE `app_class_cors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classId` (`classId`),
  ADD KEY `corsId` (`corsId`),
  ADD KEY `tachId` (`tachId`);

--
-- Indexes for table `app_cors`
--
ALTER TABLE `app_cors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdBy` (`createdBy`),
  ADD KEY `updatedBy` (`updatedBy`);

--
-- Indexes for table `app_fahter`
--
ALTER TABLE `app_fahter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_sex`
--
ALTER TABLE `app_sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_staudan`
--
ALTER TABLE `app_staudan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sex` (`sex`),
  ADD KEY `updatedBy` (`updatedBy`),
  ADD KEY `createdBy` (`createdBy`),
  ADD KEY `classId` (`classId`);

--
-- Indexes for table `app_teatcher`
--
ALTER TABLE `app_teatcher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdBy` (`createdBy`),
  ADD KEY `pdatedBy` (`pdatedBy`),
  ADD KEY `sexId` (`sexId`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `app_user_groups_privileges`
--
ALTER TABLE `app_user_groups_privileges`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `privilegeId` (`privilegeId`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `app_user_privileges`
--
ALTER TABLE `app_user_privileges`
  ADD PRIMARY KEY (`privilegeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_cashed`
--
ALTER TABLE `app_cashed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_class`
--
ALTER TABLE `app_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_class_cors`
--
ALTER TABLE `app_class_cors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `app_cors`
--
ALTER TABLE `app_cors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_fahter`
--
ALTER TABLE `app_fahter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `app_sex`
--
ALTER TABLE `app_sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_staudan`
--
ALTER TABLE `app_staudan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `app_teatcher`
--
ALTER TABLE `app_teatcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `GroupId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_user_groups_privileges`
--
ALTER TABLE `app_user_groups_privileges`
  MODIFY `Id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `app_user_privileges`
--
ALTER TABLE `app_user_privileges`
  MODIFY `privilegeId` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
