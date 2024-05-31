-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2024 at 02:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashboi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `aid` int NOT NULL,
  `about_content` text NOT NULL,
  `do_content` text NOT NULL,
  `history_content` text NOT NULL,
  `mission_content` text NOT NULL,
  `aimage` varchar(200) NOT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`aid`, `about_content`, `do_content`, `history_content`, `mission_content`, `aimage`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, '<p>প্রিয় মার্চেন্ট,</p>\r\n\r\n<p>bestexpress&nbsp; ৪-৬&nbsp; ঘণ্টায় chittagong সিটিতে&nbsp;&nbsp;শতভাগ নিশ্চয়তায়&nbsp;পার্সেল ডেলিভারি সার্ভিস দিচ্ছে।</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;আপনার প্রোডাক্টটি নিরাপদে কাস্টমার দের কাছে পৌঁছে দিতে আমরা বদ্ধ পরিকর।</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;পার্সেল নিয়ে খুব বেশি চিন্তিত আমাদের মাধ্যমে পার্সেল ডেলিভারিতে পাচ্ছেন বিশেষ কিছু সুবিধা :</p>\r\n\r\n<p>১<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;ডেলিভারি চার্জ in Side Dhaka মধ্যে মাত্র ৬০ টাকা।</p>\r\n\r\n<p>২<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;২৪ ঘন্টার মধ্যে হোম ডেলিভারি।</p>\r\n\r\n<p>৩<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;প্রোডাক্ট ডেলিভারি হওয়ার &nbsp;দিনই পেমেন্ট।</p>\r\n\r\n<p>8<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;কোন ধরনের COD চার্জ নেই।</p>\r\n\r\n<p>5<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;&nbsp;সপ্তাহে ৭দিনই পেমেন্ট।</p>\r\n\r\n<p>আমাদের সাথে যোগাযোগ -</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" style=\"height:16px; width:16px\" /> মোবাইল - <span dir=\"auto\">01714044180</span></p>\r\n', 'OxR Courier is a modern logistic service provider . আমরা সারা বাংলাদেশের প্রতিটি জেলায় দ্রুততম গতিতে এবং সাশ্রয়ই মূল্যে ডেলিভারী দিয়ে থাকি । এছাড়া দিন রাত ২৪ ঘণ্টা যেকোনো পরিস্থিতিতে  সর্বদা আমরা সচল । আমাদের উদ্দেশ হল আধুনিক ডেলিভারী সার্ভিসের মাধ্যমে দেশের কোনায় কোনায় আপনাদের পণ্য দ্রুত পৌছে দেওয়া ।   উন্নত ওয়েবসাইট , দক্ষ ডেলিভারী মেন এবং সঠিক মনিটরিং এর মাধ্যমে আমরা আমাদের উদ্দেশ্য বাস্তবায়নে এখন অনেকটাই  সফল যা  অন্যদের থেকে OxR Courier কে করে অনন্য।Hillvio ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 'Untitled.png', NULL, '2020-07-17 14:53:47', 364, '2022-09-25 09:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `access_lavels`
--

CREATE TABLE `access_lavels` (
  `ax_id` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `lavelName` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `access_lavels`
--

INSERT INTO `access_lavels` (`ax_id`, `compid`, `lavelName`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, '', 'Supper Admin', 'Active', 1, '2020-09-07 09:10:27', NULL, '2020-09-07 09:10:35'),
(2, '', 'Admin', 'Active', 1, '2020-09-07 09:10:27', NULL, '2020-09-07 09:10:39'),
(3, 'SUN-SP-00003', 'Staff', 'Active', 8, '2023-07-10 10:22:34', NULL, '2023-07-10 10:22:34'),
(4, 'SUN-SP-00003', 'Manager', 'Active', 8, '2023-07-10 10:22:40', NULL, '2023-07-10 10:22:40'),
(5, 'SUN-SP-00003', 'HR Admin', 'Active', 8, '2023-07-10 10:22:43', 8, '2023-07-10 10:23:16'),
(7, 'SUN-DE-00012', 'Admin2', 'Active', 12, '2023-09-23 08:29:52', NULL, '2023-09-23 08:29:52'),
(10, 'SUN-DE-00012', 'staff', 'Active', 12, '2023-10-20 22:03:38', NULL, '2023-10-20 22:03:38'),
(11, 'SUN-SU-00010', 'Sales & Marketing', 'Active', 10, '2023-11-16 18:03:46', NULL, '2023-11-16 18:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `compid` varchar(30) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `compid`, `activity`, `timestamp`) VALUES
(319, 8, '', 'User Logged in to dashboard', '2023-11-29 17:22:14'),
(320, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:38:40'),
(321, 1, '1', 'User Logged in to dashboard', '2023-11-29 17:39:35'),
(322, 1, '1', 'User Logged Out', '2023-11-29 17:39:40'),
(323, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-11-29 17:40:29'),
(324, 10, 'SUN-SU-00010', 'User Logged Out', '2023-11-29 17:40:40'),
(325, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:41:00'),
(326, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:42:34'),
(327, 1, '1', 'User Logged in to dashboard', '2023-11-29 17:42:59'),
(328, 1, '1', 'User Logged Out', '2023-11-29 17:44:09'),
(329, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:44:39'),
(330, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:44:40'),
(331, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:50:21'),
(332, 9, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:51:44'),
(333, 9, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:52:18'),
(334, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:52:26'),
(335, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:58:03'),
(336, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 17:58:05'),
(337, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 17:58:39'),
(338, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-11-29 18:01:29'),
(339, 10, 'SUN-SU-00010', 'Purchase is added (PO-SUN00002)', '2023-11-29 18:02:45'),
(340, 10, 'SUN-SU-00010', 'User Logged Out', '2023-11-29 18:09:48'),
(341, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 18:09:50'),
(342, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-29 18:13:57'),
(343, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-11-29 18:14:07'),
(344, 10, 'SUN-SU-00010', 'User Logged Out', '2023-11-29 18:19:38'),
(345, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-29 18:19:41'),
(346, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-30 10:38:09'),
(347, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-30 16:47:57'),
(348, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-11-30 17:09:49'),
(349, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00050)', '2023-11-30 17:12:40'),
(350, 8, 'SUN-SP-00003', 'User Logged Out', '2023-11-30 18:51:04'),
(351, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-11-30 18:51:15'),
(352, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00043)', '2023-11-30 12:51:49'),
(353, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00023)', '2023-11-30 18:53:57'),
(354, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00044)', '2023-11-30 12:54:17'),
(355, 1, '1', 'User Logged in to dashboard', '2023-12-02 04:49:04'),
(356, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-02 06:33:45'),
(357, 8, 'SUN-SP-00003', 'Sale is deleted (INV-CAS00050)', '2023-12-02 06:33:54'),
(358, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-03 09:31:24'),
(359, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-04 12:27:53'),
(360, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-04 16:26:33'),
(361, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-05 18:53:58'),
(362, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-05 18:59:07'),
(363, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-05 19:05:31'),
(364, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-05 19:05:42'),
(365, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00045)', '2023-12-05 13:07:40'),
(366, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00046)', '2023-12-05 13:12:02'),
(367, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-06 02:36:26'),
(368, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-06 14:01:35'),
(369, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-07 05:43:48'),
(370, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00047)', '2023-12-06 23:44:23'),
(371, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00048)', '2023-12-06 23:46:45'),
(372, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-07 17:04:37'),
(373, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-07 18:12:30'),
(374, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00049)', '2023-12-07 12:18:29'),
(375, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00024)', '2023-12-07 18:20:03'),
(376, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00050)', '2023-12-07 12:20:41'),
(377, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00051)', '2023-12-07 12:26:17'),
(378, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-07 18:52:56'),
(379, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-07 18:53:34'),
(380, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-07 19:40:15'),
(381, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-07 19:58:41'),
(382, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-07 19:59:00'),
(383, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-08 14:47:10'),
(384, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-08 14:47:16'),
(385, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-09 00:44:20'),
(386, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-09 00:53:01'),
(387, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-09 12:14:42'),
(388, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-10 05:49:10'),
(389, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-10 07:15:44'),
(390, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-11 06:22:49'),
(391, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-11 20:16:57'),
(392, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-11 20:17:01'),
(393, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-11 20:17:13'),
(394, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00052)', '2023-12-11 14:18:44'),
(395, 10, 'SUN-SU-00010', 'User Logged Out', '2023-12-11 20:19:05'),
(396, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-11 20:19:08'),
(397, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00056)', '2023-12-11 21:34:54'),
(398, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-12 05:18:01'),
(399, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-12 06:04:11'),
(400, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-12 06:04:27'),
(401, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00053)', '2023-12-12 00:05:02'),
(402, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00054)', '2023-12-12 00:05:57'),
(403, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-12 15:42:25'),
(404, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-12 15:45:29'),
(405, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-13 02:36:30'),
(406, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-14 02:37:27'),
(407, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00025)', '2023-12-14 02:38:49'),
(408, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00055)', '2023-12-13 20:39:20'),
(409, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00056)', '2023-12-13 20:41:54'),
(410, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00057)', '2023-12-13 20:42:55'),
(411, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00058)', '2023-12-13 20:43:50'),
(412, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-18 05:30:33'),
(413, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-18 16:25:39'),
(414, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-18 16:26:04'),
(415, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-18 16:39:37'),
(416, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-19 12:16:06'),
(417, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00059)', '2023-12-19 06:17:20'),
(418, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00060)', '2023-12-19 06:18:05'),
(419, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00061)', '2023-12-19 06:22:56'),
(420, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00062)', '2023-12-19 06:23:38'),
(421, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-20 04:57:03'),
(422, 8, 'SUN-SP-00003', 'User Logged Out', '2023-12-20 04:58:20'),
(423, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-20 06:43:03'),
(424, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-20 11:20:55'),
(425, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-21 09:36:17'),
(426, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00026)', '2023-12-21 09:37:25'),
(427, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00063)', '2023-12-21 03:37:46'),
(428, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00064)', '2023-12-21 03:39:06'),
(429, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00027)', '2023-12-21 09:39:57'),
(430, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00065)', '2023-12-21 03:40:20'),
(431, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00066)', '2023-12-21 03:41:03'),
(432, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00067)', '2023-12-21 03:45:51'),
(433, 10, 'SUN-SU-00010', 'User Logged Out', '2023-12-21 09:47:52'),
(434, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-24 11:25:43'),
(435, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00028)', '2023-12-24 11:26:39'),
(436, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00068)', '2023-12-24 05:27:08'),
(437, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00069)', '2023-12-24 05:27:49'),
(438, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-25 04:27:46'),
(439, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-25 20:56:31'),
(440, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00070)', '2023-12-25 15:03:24'),
(441, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00029)', '2023-12-25 21:05:21'),
(442, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00071)', '2023-12-25 15:06:04'),
(443, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00072)', '2023-12-25 15:09:48'),
(444, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-27 18:25:36'),
(445, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00030)', '2023-12-27 18:27:09'),
(446, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00073)', '2023-12-27 12:27:39'),
(447, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00031)', '2023-12-27 18:28:53'),
(448, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00074)', '2023-12-27 12:29:20'),
(449, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00075)', '2023-12-27 12:30:55'),
(450, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-28 07:15:59'),
(451, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-30 11:52:18'),
(452, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00076)', '2023-12-30 05:53:53'),
(453, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00032)', '2023-12-30 11:54:54'),
(454, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00077)', '2023-12-30 05:55:20'),
(455, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00078)', '2023-12-30 05:56:28'),
(456, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00079)', '2023-12-30 05:56:51'),
(457, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00080)', '2023-12-30 05:59:09'),
(458, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-31 04:45:22'),
(459, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00081)', '2023-12-30 22:45:40'),
(460, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00082)', '2023-12-30 22:45:56'),
(461, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00083)', '2023-12-30 22:46:16'),
(462, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00084)', '2023-12-30 22:46:35'),
(463, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2023-12-31 11:14:40'),
(464, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2023-12-31 19:44:55'),
(465, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00033)', '2023-12-31 19:46:04'),
(466, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00085)', '2023-12-31 13:46:28'),
(467, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00086)', '2023-12-31 13:48:59'),
(468, 10, 'SUN-SU-00010', 'Credit Voucher is deleted (V-SUN00068)', '2023-12-31 13:50:00'),
(469, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00087)', '2023-12-31 13:53:08'),
(470, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-01 17:16:06'),
(471, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00034)', '2024-01-01 17:18:02'),
(472, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00088)', '2024-01-01 11:19:48'),
(473, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00089)', '2024-01-01 11:21:26'),
(474, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00090)', '2024-01-01 11:22:14'),
(475, 10, 'SUN-SU-00010', 'Sale is added (INV-SUN00031)', '2024-01-01 17:23:50'),
(476, 10, 'SUN-SU-00010', 'Sale is updated (INV-SUN00031)', '2024-01-01 17:24:39'),
(477, 10, 'SUN-SU-00010', 'Sale is added (INV-SUN00059)', '2024-01-01 17:25:08'),
(478, 10, 'SUN-SU-00010', 'User Logged Out', '2024-01-01 17:27:55'),
(479, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-08 16:51:36'),
(480, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00035)', '2024-01-08 16:52:33'),
(481, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00091)', '2024-01-08 10:53:22'),
(482, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00092)', '2024-01-08 10:57:50'),
(483, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00036)', '2024-01-08 16:59:08'),
(484, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00093)', '2024-01-08 11:03:27'),
(485, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-08 18:36:48'),
(486, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00094)', '2024-01-08 12:37:48'),
(487, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-08 19:34:33'),
(488, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-09 11:51:03'),
(489, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-09 18:35:34'),
(490, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-10 19:08:11'),
(491, 8, 'SUN-SP-00003', 'Product is added (Rice 1 Kg)', '2024-01-10 19:08:56'),
(492, 8, 'SUN-SP-00003', 'Supplier is added (S-CAS00002)', '2024-01-10 19:10:02'),
(493, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00017)', '2024-01-10 19:10:50'),
(494, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00018)', '2024-01-10 19:11:17'),
(495, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00019)', '2024-01-10 19:11:38'),
(496, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00009)', '2024-01-10 19:13:45'),
(497, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00058)', '2024-01-10 19:14:06'),
(498, 8, 'SUN-SP-00003', 'User Logged Out', '2024-01-10 19:42:27'),
(499, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-10 19:42:30'),
(500, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-10 19:56:52'),
(501, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00038)', '2024-01-10 19:57:52'),
(502, 10, 'SUN-SU-00010', 'Sale is added (INV-SUN00060)', '2024-01-10 19:58:42'),
(503, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00095)', '2024-01-10 13:59:33'),
(504, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00096)', '2024-01-10 14:01:22'),
(505, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-11 13:31:01'),
(506, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00097)', '2024-01-11 07:31:57'),
(507, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00098)', '2024-01-11 07:33:40'),
(508, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00099)', '2024-01-11 07:34:07'),
(509, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00100)', '2024-01-11 07:35:23'),
(510, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-12 10:54:34'),
(511, 10, 'SUN-SU-00010', 'User Logged Out', '2024-01-12 10:57:39'),
(512, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-13 05:59:52'),
(513, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00039)', '2024-01-13 06:01:57'),
(514, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00101)', '2024-01-13 00:02:37'),
(515, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-13 11:30:35'),
(516, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-13 17:54:06'),
(517, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00040)', '2024-01-13 17:58:10'),
(518, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00102)', '2024-01-13 11:58:45'),
(519, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00103)', '2024-01-13 12:05:42'),
(520, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00104)', '2024-01-13 12:06:10'),
(521, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-14 09:58:36'),
(522, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-14 19:24:23'),
(523, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00041)', '2024-01-14 19:26:48'),
(524, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00105)', '2024-01-14 13:28:13'),
(525, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00042)', '2024-01-14 19:30:00'),
(526, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00106)', '2024-01-14 13:30:35'),
(527, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00107)', '2024-01-14 13:32:36'),
(528, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-16 13:18:36'),
(529, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-17 11:35:01'),
(530, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-17 21:06:22'),
(531, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00043)', '2024-01-17 21:09:09'),
(532, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00108)', '2024-01-17 15:09:51'),
(533, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00109)', '2024-01-17 15:10:25'),
(534, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00110)', '2024-01-17 15:13:40'),
(535, 10, 'SUN-SU-00010', 'User Logged Out', '2024-01-17 21:14:40'),
(536, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-17 21:14:46'),
(537, 10, 'SUN-SU-00010', 'Purchase is added (PO-SUN00003)', '2024-01-17 21:21:14'),
(538, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-17 22:15:18'),
(539, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-20 05:26:32'),
(540, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-21 05:26:09'),
(541, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00111)', '2024-01-20 23:26:43'),
(542, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00112)', '2024-01-20 23:31:36'),
(543, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-21 11:42:19'),
(544, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00113)', '2024-01-21 05:42:36'),
(545, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00114)', '2024-01-21 05:43:26'),
(546, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-23 13:00:18'),
(547, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00115)', '2024-01-23 07:01:06'),
(548, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00116)', '2024-01-23 07:08:14'),
(549, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-24 14:02:26'),
(550, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00044)', '2024-01-24 14:03:07'),
(551, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-24 14:37:42'),
(552, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00117)', '2024-01-24 08:42:27'),
(553, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00118)', '2024-01-24 08:43:31'),
(554, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-24 17:06:40'),
(555, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-25 12:15:10'),
(556, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00119)', '2024-01-25 06:16:21'),
(557, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00120)', '2024-01-25 06:19:05'),
(558, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-27 11:36:00'),
(559, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00121)', '2024-01-27 05:36:53'),
(560, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00122)', '2024-01-27 05:38:35'),
(561, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00123)', '2024-01-27 05:39:58'),
(562, 10, 'SUN-SU-00010', 'User Logged Out', '2024-01-27 11:42:48'),
(563, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-28 05:25:04'),
(564, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-28 21:30:52'),
(565, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-30 05:50:18'),
(566, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-01-30 06:13:25'),
(567, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00061)', '2024-01-30 06:14:53'),
(568, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-31 06:08:33'),
(569, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00124)', '2024-01-31 00:09:02'),
(570, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00125)', '2024-01-31 00:09:36'),
(571, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00126)', '2024-01-31 00:09:59'),
(572, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00127)', '2024-01-31 00:10:26'),
(573, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-31 10:06:18'),
(574, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00128)', '2024-01-31 04:10:00'),
(575, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-01-31 11:24:28'),
(576, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-01 10:41:34'),
(577, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-01 14:36:47'),
(578, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00129)', '2024-02-01 08:37:38'),
(579, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00045)', '2024-02-01 14:39:05'),
(580, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00130)', '2024-02-01 08:39:52'),
(581, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00131)', '2024-02-01 08:41:15'),
(582, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-03 18:24:01'),
(583, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00132)', '2024-02-03 12:25:18'),
(584, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00133)', '2024-02-03 12:26:03'),
(585, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-04 13:51:36'),
(586, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00134)', '2024-02-04 07:52:09'),
(587, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-05 04:40:53'),
(588, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00046)', '2024-02-05 04:48:14'),
(589, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00135)', '2024-02-04 22:48:48'),
(590, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-06 08:59:40'),
(591, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00047)', '2024-02-06 09:02:58'),
(592, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00136)', '2024-02-06 03:03:25'),
(593, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00137)', '2024-02-06 03:04:53'),
(594, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-06 18:49:07'),
(595, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-07 11:06:30'),
(596, 10, 'SUN-SU-00010', 'User Logged Out', '2024-02-07 11:07:03'),
(597, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-07 14:04:18'),
(598, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-09 19:47:29'),
(599, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00138)', '2024-02-09 13:53:15'),
(600, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00139)', '2024-02-09 13:57:04'),
(601, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-10 08:57:08'),
(602, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-10 17:35:11'),
(603, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00140)', '2024-02-10 11:35:41'),
(604, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00141)', '2024-02-10 11:38:13'),
(605, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-11 11:37:52'),
(606, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00142)', '2024-02-11 05:38:15'),
(607, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00143)', '2024-02-11 05:39:32'),
(608, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-12 09:57:56'),
(609, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-12 10:04:52'),
(610, 10, 'SUN-SU-00010', 'Customer is added (C-SUN00048)', '2024-02-12 10:06:17'),
(611, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00144)', '2024-02-12 04:06:57'),
(612, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00145)', '2024-02-12 04:08:05'),
(613, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00146)', '2024-02-12 04:08:42'),
(614, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-13 16:50:19'),
(615, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-13 17:13:33'),
(616, 12, 'SUN-DE-00012', 'User Logged in to dashboard', '2024-02-14 04:47:44'),
(617, 12, 'SUN-DE-00012', 'User Logged Out', '2024-02-14 04:49:04'),
(618, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-14 10:38:58'),
(619, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-17 11:22:31'),
(620, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-17 11:31:20'),
(621, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-17 13:32:54'),
(622, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00147)', '2024-02-17 07:33:30'),
(623, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00148)', '2024-02-17 07:37:50'),
(624, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00149)', '2024-02-17 07:38:22'),
(625, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-18 04:48:46'),
(626, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-18 08:57:08'),
(627, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00150)', '2024-02-18 02:57:38'),
(628, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00151)', '2024-02-18 03:09:25'),
(629, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-18 09:41:09'),
(630, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-18 18:45:16'),
(631, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-20 14:49:24'),
(632, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00152)', '2024-02-20 08:49:55'),
(633, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00153)', '2024-02-20 08:51:52'),
(634, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00154)', '2024-02-20 08:52:34'),
(635, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 05:00:16'),
(636, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00010)', '2024-02-21 05:12:24'),
(637, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 06:41:41'),
(638, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-21 07:00:56'),
(639, 12, 'SUN-DE-00012', 'User Logged in to dashboard', '2024-02-21 11:40:52'),
(640, 12, 'SUN-DE-00012', 'User Logged Out', '2024-02-21 11:41:01'),
(641, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 11:41:03'),
(642, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-21 11:41:07'),
(643, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 11:58:48'),
(644, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 12:01:01'),
(645, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 12:04:57'),
(646, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 12:06:15'),
(647, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 12:09:41'),
(648, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-21 13:39:53'),
(649, 10, 'SUN-SU-00010', 'User Logged Out', '2024-02-21 13:40:25'),
(650, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 13:40:28'),
(651, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-21 13:43:25'),
(652, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-21 13:43:32'),
(653, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00068)', '2024-02-21 13:46:27'),
(654, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-21 13:50:49'),
(655, 1, '1', 'User Logged in to dashboard', '2024-02-23 10:22:00'),
(656, 15, 'SUN-RA-00015', 'User Logged in to dashboard', '2024-02-23 10:22:57'),
(657, 11, 'SUN-AF-00011', 'User Logged in to dashboard', '2024-02-23 10:23:56'),
(658, 1, '1', 'User Logged Out', '2024-02-23 10:24:23'),
(659, 15, 'SUN-RA-00015', 'User Logged in to dashboard', '2024-02-23 10:28:04'),
(660, 15, 'SUN-RA-00015', 'Product is added (Bashundhara Soyabean Oil 1 Liter)', '2024-02-23 10:33:38'),
(661, 15, 'SUN-RA-00015', 'Supplier is added (S-RAN00001)', '2024-02-23 10:36:02'),
(662, 15, 'SUN-RA-00015', 'Purchase is added (PO-RAN00001)', '2024-02-23 10:37:27'),
(663, 15, 'SUN-RA-00015', 'Customer is added (C-RAN00001)', '2024-02-23 10:40:03'),
(664, 15, 'SUN-RA-00015', 'Sale is added (INV-RAN00001)', '2024-02-23 10:40:52'),
(665, 15, 'SUN-RA-00015', 'Sale payment is made of 20 (INV-RAN00001)', '2024-02-23 10:42:12'),
(666, 15, 'SUN-RA-00015', 'Sale payment is made of 30 (INV-RAN00001)', '2024-02-23 10:42:25'),
(667, 15, 'SUN-RA-00015', 'Sale is added (INV-RAN00070)', '2024-02-23 10:44:30'),
(668, 15, 'SUN-RA-00015', 'Debit Voucher is added (V-RAN00001)', '2024-02-23 04:46:04'),
(669, 15, 'SUN-RA-00015', 'User Logged Out', '2024-02-23 11:07:01'),
(670, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-23 11:07:11'),
(671, 1, '1', 'User Logged in to dashboard', '2024-02-23 13:03:15'),
(672, 1, '1', 'User Logged Out', '2024-02-23 13:03:29'),
(673, 1, '1', 'User Logged in to dashboard', '2024-02-23 13:42:10'),
(674, 1, '1', 'User Logged Out', '2024-02-23 13:42:22'),
(675, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-25 08:52:10'),
(676, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-25 10:39:19'),
(677, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00155)', '2024-02-25 04:39:51'),
(678, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00156)', '2024-02-25 04:42:13'),
(679, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-26 11:54:31'),
(680, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-26 11:54:44'),
(681, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-27 13:34:16'),
(682, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-27 13:34:16'),
(683, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-27 13:37:44'),
(684, 8, 'SUN-SP-00003', 'Product is added (BOP W18L KEY 48g AZM PP Woven Sack)', '2024-02-27 13:47:28'),
(685, 8, 'SUN-SP-00003', 'Product is added (TN 18 29L 40g AZ5 PP Woven Sack)', '2024-02-27 13:49:30'),
(686, 8, 'SUN-SP-00003', 'Product is added (TN 18 29L 50g PG2 PP Woven Sack)', '2024-02-27 13:51:54'),
(687, 8, 'SUN-SP-00003', 'Product is added (W 18 28L 60g AN3 PP Woven Sack)', '2024-02-27 13:55:15'),
(688, 8, 'SUN-SP-00003', 'Product is added ( W 18 29L 50g PG2 PP Woven Sack)', '2024-02-27 13:57:13'),
(689, 8, 'SUN-SP-00003', 'Product is updated ( W 18 29L 50g PG2 PP Woven Sack)', '2024-02-27 14:04:41'),
(690, 8, 'SUN-SP-00003', 'Product is added ( W 20 28L 44g NZ PP Woven Sack)', '2024-02-27 14:06:40'),
(691, 8, 'SUN-SP-00003', 'Supplier is added (S-CAS00003)', '2024-02-27 14:18:12'),
(692, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00020)', '2024-02-27 14:19:02'),
(693, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-27 17:34:38'),
(694, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-27 18:11:22'),
(695, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-27 18:39:36'),
(696, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00157)', '2024-02-27 12:42:05'),
(697, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00158)', '2024-02-27 12:42:58'),
(698, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-28 07:20:49'),
(699, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-28 08:45:59'),
(700, 8, 'SUN-SP-00003', 'User Logged Out', '2024-02-28 09:26:13'),
(701, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-28 16:15:02'),
(702, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00159)', '2024-02-28 10:15:26'),
(703, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-28 17:04:11'),
(704, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00069)', '2024-02-28 17:05:44'),
(705, 8, 'SUN-SP-00003', 'Debit Voucher is added (V-CAS00019)', '2024-02-28 11:06:57'),
(706, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-02-29 05:06:28'),
(707, 15, 'SUN-RA-00015', 'User Logged in to dashboard', '2024-02-29 19:36:03'),
(708, 15, 'SUN-RA-00015', 'Product is added (Product Nam 333)', '2024-02-29 19:36:49'),
(709, 15, 'SUN-RA-00015', 'Debit Voucher is added (V-RAN00002)', '2024-02-29 13:37:59'),
(710, 15, 'SUN-RA-00015', 'Sale is added (INV-RAN00071)', '2024-02-29 19:45:03'),
(711, 15, 'SUN-RA-00015', 'Sale is added (INV-RAN00073)', '2024-02-29 19:45:26'),
(712, 15, 'SUN-RA-00015', 'User Logged Out', '2024-02-29 20:27:22'),
(713, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-02-29 20:27:31'),
(714, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00160)', '2024-02-29 14:28:43'),
(715, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-01 16:11:38'),
(716, 8, 'SUN-SP-00003', 'User Logged Out', '2024-03-01 17:44:08'),
(717, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-01 17:44:26'),
(718, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00161)', '2024-03-01 11:44:50'),
(719, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00162)', '2024-03-01 11:45:13'),
(720, 10, 'SUN-SU-00010', 'User Logged Out', '2024-03-01 17:45:23'),
(721, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-02 10:32:00'),
(722, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00021)', '2024-03-02 10:33:09'),
(723, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-05 17:32:17'),
(724, 8, 'SUN-SP-00003', 'User Logged Out', '2024-03-05 17:33:05'),
(725, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-05 17:35:36'),
(726, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-06 17:43:54'),
(727, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-07 06:49:14'),
(728, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-11 02:34:30'),
(729, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-11 09:58:14'),
(730, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-12 06:07:31'),
(731, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-12 06:12:01'),
(732, 8, 'SUN-SP-00003', 'Sale is deleted (INV-ROH00079)', '2024-03-12 06:12:26'),
(733, 8, 'SUN-SP-00003', 'Debit Voucher is deleted (V-CAS00016)', '2024-03-12 00:12:50'),
(734, 8, 'SUN-SP-00003', 'Purchase is deleted (PO-CAS00021)', '2024-03-12 06:13:11'),
(735, 8, 'SUN-SP-00003', 'Product is deleted ( Y 18 29L STEP 45g AN3 PP Woven Sack)', '2024-03-12 06:13:34'),
(736, 8, 'SUN-SP-00003', 'Product is added (Nayeem)', '2024-03-12 06:14:06'),
(737, 8, 'SUN-SP-00003', 'User Logged Out', '2024-03-12 06:20:13'),
(738, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-14 10:06:09'),
(739, 8, 'SUN-SP-00003', 'Product is added (500 Miter 4 Fit Roll)', '2024-03-14 10:07:05'),
(740, 8, 'SUN-SP-00003', 'Product stock is stored (500 Miter 4 Fit Roll)', '2024-03-14 10:07:19'),
(741, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-16 16:15:13'),
(742, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-18 10:33:22'),
(743, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00163)', '2024-03-18 04:35:13'),
(744, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00164)', '2024-03-18 04:36:21'),
(745, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00165)', '2024-03-18 04:36:57'),
(746, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00166)', '2024-03-18 04:42:20'),
(747, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-20 07:26:53'),
(748, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-20 14:59:33'),
(749, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-23 17:35:20'),
(750, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-24 08:34:13'),
(751, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-25 05:31:53'),
(752, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00167)', '2024-03-24 23:32:31'),
(753, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-25 16:53:54'),
(754, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-26 07:05:45'),
(755, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00168)', '2024-03-26 01:06:21'),
(756, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00169)', '2024-03-26 01:09:20'),
(757, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-26 09:46:55'),
(758, 8, 'SUN-SP-00003', 'Product is updated (Test product 6)', '2024-03-26 09:48:05'),
(759, 8, 'SUN-SP-00003', 'Product is updated (Test product 6 )', '2024-03-26 09:48:24'),
(760, 8, 'SUN-SP-00003', 'Sale is updated (INV-CAS00017)', '2024-03-26 09:48:36'),
(761, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-26 19:08:42'),
(762, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-28 10:01:07'),
(763, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-28 16:05:04'),
(764, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-28 17:20:06'),
(765, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-28 19:05:18'),
(766, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-29 08:35:22'),
(767, 8, 'SUN-SP-00003', 'User Logged Out', '2024-03-29 08:43:24'),
(768, 16, 'SUN-BR-00016', 'User Logged in to dashboard', '2024-03-29 08:51:32'),
(769, 16, 'SUN-BR-00016', 'User Logged Out', '2024-03-29 08:52:09'),
(770, 10, 'SUN-SU-00010', 'User Logged in to dashboard', '2024-03-29 11:49:58'),
(771, 10, 'SUN-SU-00010', 'Credit Voucher is added (V-SUN00170)', '2024-03-29 05:50:36'),
(772, 10, 'SUN-SU-00010', 'Debit Voucher is added (V-SUN00171)', '2024-03-29 05:52:12'),
(773, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-03-31 06:56:17'),
(774, 8, 'SUN-SP-00003', 'Product is updated (naaa)', '2024-03-31 06:56:37'),
(775, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-02 05:38:58'),
(776, 9, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 00:22:28'),
(777, 9, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 00:22:37'),
(778, 1, '1', 'User Logged in to dashboard', '2024-04-08 00:24:59'),
(779, 12, 'SUN-DE-00012', 'User Logged in to dashboard', '2024-04-08 00:26:07'),
(780, 12, 'SUN-DE-00012', 'User Logged Out', '2024-04-08 00:26:24'),
(781, 11, 'SUN-AF-00011', 'User Logged in to dashboard', '2024-04-08 00:26:31'),
(782, 11, 'SUN-AF-00011', 'User Logged Out', '2024-04-08 00:26:38'),
(783, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 00:27:33'),
(784, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 05:08:38'),
(785, 8, 'SUN-SP-00003', 'Product is added (Tanvir_Test)', '2024-04-08 05:09:20'),
(786, 8, 'SUN-SP-00003', 'Product is updated (Tanvir_Test)', '2024-04-08 05:09:48'),
(787, 8, 'SUN-SP-00003', 'Product stock is stored (Tanvir_Test)', '2024-04-08 05:09:59'),
(788, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00021)', '2024-04-08 05:11:38'),
(789, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00082)', '2024-04-08 05:14:00'),
(790, 8, 'SUN-SP-00003', 'Sale payment is made of 2402 (INV-CAS00082)', '2024-04-08 05:14:19'),
(791, 8, 'SUN-SP-00003', 'Credit Voucher is added (V-CAS00020)', '2024-04-07 23:15:51'),
(792, 8, 'SUN-SP-00003', 'Credit Voucher is added (V-CAS00021)', '2024-04-07 23:16:09'),
(793, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 07:28:03'),
(794, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 07:36:35'),
(795, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 07:36:47'),
(796, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 07:36:58'),
(797, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 07:37:25'),
(798, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 07:42:01'),
(799, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 09:35:13'),
(800, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 14:04:52'),
(801, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 18:25:59'),
(802, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 18:26:15'),
(803, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 18:49:23'),
(804, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-08 18:56:20'),
(805, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-08 18:57:19'),
(806, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-09 14:41:01'),
(807, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-10 08:05:02'),
(808, 8, 'SUN-SP-00003', 'Imported Products', '2024-04-10 08:12:35'),
(809, 8, 'SUN-SP-00003', 'Product stock is stored (Tanvir_Test)', '2024-04-10 08:13:02'),
(810, 8, 'SUN-SP-00003', 'Purchase payment is made of 60000 (PO-CAS00020)', '2024-04-10 08:13:50'),
(811, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00022)', '2024-04-10 08:16:37'),
(812, 8, 'SUN-SP-00003', 'Purchase payment is made of 500 (PO-CAS00022)', '2024-04-10 08:17:03'),
(813, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00085)', '2024-04-10 08:26:44'),
(814, 8, 'SUN-SP-00003', 'Sale is updated (INV-CAS00085)', '2024-04-10 08:27:52'),
(815, 8, 'SUN-SP-00003', 'Credit Voucher is added (V-CAS00022)', '2024-04-10 02:34:31'),
(816, 8, 'SUN-SP-00003', 'Credit Voucher is deleted (V-CAS00022)', '2024-04-10 02:35:48'),
(817, 8, 'SUN-SP-00003', 'Credit Voucher is deleted (V-CAS00020)', '2024-04-10 02:35:54'),
(818, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00052)', '2024-04-10 08:39:27'),
(819, 8, 'SUN-SP-00003', 'Supplier is updated (S-CAS00001)', '2024-04-10 08:41:29'),
(820, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-16 05:02:17'),
(821, 8, 'SUN-SP-00003', 'Product is updated (new Test product)', '2024-04-16 05:03:08'),
(822, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-16 05:07:39'),
(823, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-16 09:24:47'),
(824, 8, 'SUN-SP-00003', 'Product is deleted (tttt)', '2024-04-16 09:33:13'),
(825, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-16 10:10:08'),
(826, 8, 'SUN-SP-00003', 'Sale is updated (INV-CAS00039)', '2024-04-16 10:15:35'),
(827, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-16 19:05:53'),
(828, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 04:20:01'),
(829, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-17 07:48:43'),
(830, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 07:49:05'),
(831, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-17 08:14:46'),
(832, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 08:15:07'),
(833, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-17 08:19:02'),
(834, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 08:19:14'),
(835, 8, 'SUN-SP-00003', 'Product is deleted (aaa)', '2024-04-17 08:35:11'),
(836, 8, 'SUN-SP-00003', 'Product is deleted (ttt)', '2024-04-17 08:35:15'),
(837, 8, 'SUN-SP-00003', 'Product is updated (Tanvir_Test)', '2024-04-17 08:35:40'),
(838, 8, 'SUN-SP-00003', 'Product is added (Test)', '2024-04-17 08:36:23'),
(839, 8, 'SUN-SP-00003', 'Product is updated (Test)', '2024-04-17 08:45:08'),
(840, 8, 'SUN-SP-00003', 'Product is deleted (W 18 28L 60g AN3 PP Woven Sack)', '2024-04-17 08:58:11'),
(841, 8, 'SUN-SP-00003', 'Product is deleted (Nayeem)', '2024-04-17 08:58:50'),
(842, 8, 'SUN-SP-00003', 'Product is added (23)', '2024-04-17 09:01:12'),
(843, 8, 'SUN-SP-00003', 'Product is deleted (23)', '2024-04-17 09:01:17'),
(844, 8, 'SUN-SP-00003', 'Product is added (qwqw)', '2024-04-17 10:11:13'),
(845, 8, 'SUN-SP-00003', 'Product is deleted (qwqw)', '2024-04-17 10:11:18'),
(846, 8, 'SUN-SP-00003', 'Product is added (tanvir)', '2024-04-17 10:23:42'),
(847, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 10:24:47'),
(848, 8, 'SUN-SP-00003', 'Product is deleted (tanvir)', '2024-04-17 10:27:52'),
(849, 8, 'SUN-SP-00003', 'Product is deleted (Test)', '2024-04-17 10:30:51'),
(850, 8, 'SUN-SP-00003', 'Product is updated (Test product 6 )', '2024-04-17 10:31:30'),
(851, 8, 'SUN-SP-00003', 'Product is added (wewe)', '2024-04-17 10:44:55'),
(852, 8, 'SUN-SP-00003', 'Product is deleted (wewe)', '2024-04-17 10:45:02'),
(853, 8, 'SUN-SP-00003', 'Product is deleted (Test Services)', '2024-04-17 10:57:44'),
(854, 8, 'SUN-SP-00003', 'Purchase is added (PO-CAS00023)', '2024-04-17 10:59:35'),
(855, 8, 'SUN-SP-00003', 'Product is updated (Tanvir_Test)', '2024-04-17 11:05:59'),
(856, 8, 'SUN-SP-00003', 'Product stock is stored (Tanvir_Test)', '2024-04-17 11:06:53'),
(857, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-17 15:38:21'),
(858, 8, 'SUN-SP-00003', 'Product is added (RFL Chair)', '2024-04-17 15:41:57'),
(859, 8, 'SUN-SP-00003', 'Product is deleted (RFL Chair)', '2024-04-17 15:43:16'),
(860, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00089)', '2024-04-17 15:44:38'),
(861, 8, 'SUN-SP-00003', 'Sale payment is made of 40 (INV-CAS00089)', '2024-04-17 15:45:34'),
(862, 8, 'SUN-SP-00003', 'Sale payment is made of 7 (INV-CAS00089)', '2024-04-17 15:46:29'),
(863, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 08:48:27'),
(864, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 09:15:49'),
(865, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 09:42:41'),
(866, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 10:05:57'),
(867, 8, 'SUN-SP-00003', 'Sale is updated (INV-CAS00038)', '2024-04-18 11:36:36'),
(868, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 19:52:58'),
(869, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-18 22:39:44'),
(870, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-18 23:10:43'),
(871, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-20 05:14:54'),
(872, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00053)', '2024-04-20 08:28:43'),
(873, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00091)', '2024-04-20 08:30:05'),
(874, 8, 'SUN-SP-00003', 'Sale is updated (INV-ROH00016)', '2024-04-20 09:17:58'),
(875, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-20 11:13:05'),
(876, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-20 11:23:03'),
(877, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-20 12:05:56'),
(878, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-21 09:18:54'),
(879, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-21 10:02:09'),
(880, 1, '1', 'User Logged in to dashboard', '2024-04-21 14:56:09'),
(881, 1, '1', 'User Logged Out', '2024-04-21 14:56:31'),
(882, 9, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-21 14:57:15'),
(883, 9, 'SUN-SP-00003', 'User Logged Out', '2024-04-21 14:57:23'),
(884, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-21 14:57:25'),
(885, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-21 14:57:54'),
(886, 1, '1', 'User Logged in to dashboard', '2024-04-21 14:58:01'),
(887, 1, '1', 'User Logged Out', '2024-04-21 14:58:06'),
(888, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-21 17:44:05'),
(889, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-22 03:20:46'),
(890, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-22 05:35:49'),
(891, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-22 06:02:42'),
(892, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-22 06:03:25'),
(893, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-23 21:48:55'),
(894, 8, 'SUN-SP-00003', 'Debit Voucher is added (V-CAS00022)', '2024-04-23 15:58:20'),
(895, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-23 22:15:11'),
(896, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-23 22:15:13'),
(897, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-23 22:30:31'),
(898, 1, '1', 'User Logged in to dashboard', '2024-04-23 22:34:55'),
(899, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-24 05:38:19'),
(900, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-25 05:42:51'),
(901, 1, '1', 'User Logged in to dashboard', '2024-04-25 06:44:46'),
(902, 1, '1', 'User Logged Out', '2024-04-25 06:45:50'),
(903, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-25 06:46:18'),
(904, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-25 10:25:58'),
(905, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-25 19:10:21'),
(906, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-26 12:26:19'),
(907, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-26 12:26:29'),
(908, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-26 12:50:22'),
(909, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-26 20:04:59'),
(910, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-27 04:50:06'),
(911, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00061)', '2024-04-27 04:50:25'),
(912, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-27 04:58:52'),
(913, 8, 'SUN-SP-00003', 'Customer is added (C-CAS00062)', '2024-04-27 04:59:16'),
(914, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-27 21:27:58'),
(915, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-28 07:04:29'),
(916, 1, '1', 'User Logged in to dashboard', '2024-04-28 09:31:54'),
(917, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-28 10:20:38'),
(918, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00099)', '2024-04-28 10:22:11'),
(919, 8, 'SUN-SP-00003', 'Sale is added (INV-CAS00100)', '2024-04-28 10:28:01'),
(920, 8, 'SUN-SP-00003', 'Product is deleted (House Rent 2 )', '2024-04-28 10:34:59'),
(921, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-28 10:37:36'),
(922, 1, '1', 'User Logged in to dashboard', '2024-04-28 13:00:53'),
(923, 1, '1', 'User Logged in to dashboard', '2024-04-28 13:21:13'),
(924, 1, '1', 'User Logged in to dashboard', '2024-04-28 13:52:56'),
(925, 1, '1', 'User Logged Out', '2024-04-28 13:53:05'),
(926, 1, '1', 'User Logged in to dashboard', '2024-04-28 13:54:01'),
(927, 1, '1', 'User Logged in to dashboard', '2024-04-28 14:01:34'),
(928, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-28 14:06:53'),
(929, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-28 14:14:31'),
(930, 1, '1', 'User Logged in to dashboard', '2024-04-28 16:45:33'),
(931, 1, '1', 'User Logged in to dashboard', '2024-04-29 01:06:29'),
(932, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-29 04:17:16'),
(933, 8, 'SUN-SP-00003', 'User Logged Out', '2024-04-29 04:17:28'),
(934, 1, '1', 'User Logged in to dashboard', '2024-04-29 04:17:39'),
(935, 1, '1', 'User Logged in to dashboard', '2024-04-29 04:27:35'),
(936, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-29 04:48:00'),
(937, 8, 'SUN-SP-00003', 'Credit Voucher is added (V-CAS00023)', '2024-04-28 22:49:08'),
(938, 1, '1', 'User Logged in to dashboard', '2024-04-29 05:05:20'),
(939, 1, '1', 'User Logged Out', '2024-04-29 05:09:29'),
(940, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-29 05:20:42'),
(941, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-30 09:17:35'),
(942, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-30 09:29:37'),
(943, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-30 09:54:04'),
(944, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-04-30 10:00:46'),
(945, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-15 19:03:19'),
(946, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-15 20:47:53'),
(947, 8, 'SUN-SP-00003', 'User Logged Out', '2024-05-15 20:48:05');
INSERT INTO `activity_logs` (`id`, `user_id`, `compid`, `activity`, `timestamp`) VALUES
(948, 1, '1', 'User Logged in to dashboard', '2024-05-15 20:48:10'),
(949, 1, '1', 'User Logged Out', '2024-05-15 20:49:34'),
(950, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-15 20:49:38'),
(951, 8, 'SUN-SP-00003', 'User Logged Out', '2024-05-15 20:50:18'),
(952, 1, '1', 'User Logged in to dashboard', '2024-05-15 20:50:21'),
(953, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-20 10:19:28'),
(954, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-21 12:05:21'),
(955, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-22 13:43:59'),
(956, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-23 15:11:47'),
(957, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-26 10:35:02'),
(958, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-26 10:38:30'),
(959, 8, 'SUN-SP-00003', 'User Logged Out', '2024-05-26 12:46:52'),
(960, 24, 'COM-TES00024', 'User Logged in to dashboard', '2024-05-26 12:55:22'),
(961, 24, 'COM-TES00024', 'User Logged Out', '2024-05-26 12:55:32'),
(962, 25, 'COM-DEV00025', 'User Logged in to dashboard', '2024-05-26 13:04:51'),
(963, 25, 'COM-DEV00025', 'User Logged Out', '2024-05-26 13:05:02'),
(964, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-26 13:17:27'),
(965, 8, 'SUN-SP-00003', 'User Logged Out', '2024-05-26 13:18:07'),
(966, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-30 09:30:38'),
(967, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-30 15:29:20'),
(968, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-31 04:37:55'),
(969, 8, 'SUN-SP-00003', 'User Logged Out', '2024-05-31 07:11:31'),
(970, 26, 'COM-ERA00026', 'User Logged in to dashboard', '2024-05-31 07:13:19'),
(971, 26, 'COM-ERA00026', 'User Logged Out', '2024-05-31 07:20:50'),
(972, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-31 07:21:08'),
(973, 8, 'SUN-SP-00003', 'User Logged in to dashboard', '2024-05-31 07:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `acid` int NOT NULL,
  `areaName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`acid`, `areaName`) VALUES
(1, 'Inside Dhaka'),
(2, 'Outside Dhaka'),
(3, 'Emergency Delivery Inside Dhaka'),
(4, 'Emergency Delivery Outside Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asID` int NOT NULL,
  `asDate` date NOT NULL,
  `compid` varchar(20) NOT NULL,
  `asName` varchar(50) NOT NULL,
  `ascode` varchar(20) DEFAULT NULL,
  `pprice` float NOT NULL,
  `currency` int NOT NULL,
  `qty` int NOT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asID`, `asDate`, `compid`, `asName`, `ascode`, `pprice`, `currency`, `qty`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, '0000-00-00', 'SUN-SU-00010', 'Ac', 'A-SUN00001', 51000, 0, 1, 10, '2023-11-16 18:02:42', NULL, '2023-11-16 18:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `balance_adjustment`
--

CREATE TABLE `balance_adjustment` (
  `id` int NOT NULL,
  `compid` varchar(30) NOT NULL,
  `empid` int NOT NULL,
  `date` varchar(20) NOT NULL,
  `adjustment_type` varchar(15) NOT NULL,
  `amount` int NOT NULL,
  `note` text NOT NULL,
  `accountType` varchar(30) NOT NULL,
  `accountNo` int NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `balance_adjustment`
--

INSERT INTO `balance_adjustment` (`id`, `compid`, `empid`, `date`, `adjustment_type`, `amount`, `note`, `accountType`, `accountNo`, `regby`, `regdate`) VALUES
(1, 'SUN-SP-00003', 0, '2023-12-05', 'Deposit', 100, 'Test', 'Cash', 4, 8, '2023-12-05 18:55:11'),
(2, 'SUN-SP-00003', 0, '2023-12-05', 'Withdrawal', 100, 'test', 'Bank', 2, 8, '2023-12-05 18:56:21'),
(3, 'SUN-SP-00003', 0, '2023-12-05', 'Withdrawal', 100, '', 'Cash', 4, 8, '2023-12-05 18:57:12'),
(4, 'SUN-SP-00003', 0, '2023-12-05', 'Deposit', 10, 'test by sunshine', 'Cash', 4, 8, '2023-12-05 19:00:13'),
(5, 'SUN-SP-00003', 0, '2023-12-05', 'Deposit', 2000, 'test by sunshine', 'Bank', 2, 8, '2023-12-05 19:00:27'),
(6, 'SUN-SP-00003', 0, '2023-12-05', 'Deposit', 99, 'mobile test', 'Mobile', 2, 8, '2023-12-05 19:00:53'),
(7, 'SUN-SP-00003', 0, '2023-12-05', 'Withdrawal', 49, 'withdrowal', 'Mobile', 2, 8, '2023-12-05 19:01:35'),
(8, 'SUN-SP-00003', 0, '2023-12-05', 'Withdrawal', 300, 'test', 'Bank', 2, 8, '2023-12-05 19:04:05'),
(9, 'SUN-SP-00003', 0, '2023-12-05', 'Deposit', 11, 'rr', 'Bank', 2, 8, '2023-12-05 19:04:43'),
(10, 'SUN-SU-00010', 0, '2023-12-04', 'Deposit', 200, 'Mukta Clinet Meeting Jonno Diche', 'Cash', 3, 10, '2023-12-05 19:09:24'),
(11, 'SUN-SU-00010', 0, '2023-12-05', 'Deposit', 200, 'Mukta Clinet Meeting Jonno Diche', 'Cash', 3, 10, '2023-12-05 19:09:56'),
(12, 'SUN-SU-00010', 0, '2023-12-05', 'Withdrawal', 22, 'test by sunshine', 'Cash', 3, 10, '2023-12-05 19:13:35'),
(13, 'SUN-SP-00003', 0, '2023-12-06', 'Deposit', 100, 'test by sunshine', 'Cash', 4, 8, '2023-12-06 02:36:50'),
(14, 'SUN-SP-00003', 0, '2023-12-06', 'Withdrawal', 200, 'test by sunshine', 'Cash', 4, 8, '2023-12-06 02:37:11'),
(15, 'SUN-SP-00003', 0, '2023-12-06', 'Deposit', 200, 'test by sunshine', 'Bank', 2, 8, '2023-12-06 02:38:42'),
(16, 'SUN-SP-00003', 0, '2023-12-06', 'Withdrawal', 200, 'test by sunshine', 'Mobile', 2, 8, '2023-12-06 02:38:56'),
(17, 'SUN-SP-00003', 0, '2023-12-06', 'Deposit', 500, 'test by sunshine', 'Mobile', 2, 8, '2023-12-06 02:39:35'),
(18, 'SUN-SP-00003', 0, '2023-12-06', 'Withdrawal', 51, 'test by sunshine', 'Mobile', 2, 8, '2023-12-06 02:39:55'),
(19, 'SUN-SP-00003', 0, '2023-12-09', 'Deposit', 200, '', 'Cash', 4, 8, '2023-12-09 12:15:16'),
(20, 'SUN-SP-00003', 0, '2023-12-09', 'Withdrawal', 200, 'test by sunshine', 'Cash', 4, 8, '2023-12-09 12:15:28'),
(21, 'SUN-SU-00010', 0, '2023-12-11', 'Deposit', 10000, 'Loan From Adnan Vai Cashboi Investor', 'Cash', 3, 10, '2023-12-11 20:17:47'),
(22, 'SUN-SU-00010', 0, '2023-12-11', 'Deposit', 500, 'Loan From Mukta', 'Cash', 3, 10, '2023-12-11 20:18:06'),
(23, 'SUN-SU-00010', 0, '2023-12-25', 'Deposit', 2000, 'payment', 'Cash', 0, 10, '2023-12-25 05:11:50'),
(24, 'SUN-SU-00010', 0, '2023-12-25', 'Withdrawal', 2000, '', 'Cash', 3, 10, '2023-12-25 05:12:06'),
(25, 'SUN-SP-00003', 0, '2024-01-10', 'Deposit', 100, 'test by sunshine', 'Cash', 4, 8, '2024-01-10 19:39:58'),
(26, 'SUN-SU-00010', 0, '2024-01-21', 'Deposit', 4000, 'Loan From Alfaz vai', 'Cash', 3, 10, '2024-01-21 05:33:05'),
(27, 'SUN-SU-00010', 0, '2024-02-11', 'Deposit', 10000, 'Helal Vai kase Loan', 'Cash', 3, 10, '2024-02-11 11:40:08'),
(28, 'SUN-SP-00003', 0, '2024-04-10', 'Withdrawal', 2402, '', 'Cash', 4, 8, '2024-04-10 08:36:14'),
(29, 'SUN-SP-00003', 0, '2024-04-23', 'Deposit', 100, 'test by sunshine', 'Cash', 4, 8, '2024-04-23 22:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `ba_id` int NOT NULL,
  `compid` varchar(20) DEFAULT NULL,
  `accountNo` varchar(50) DEFAULT NULL,
  `accountName` varchar(50) DEFAULT NULL,
  `bankName` varchar(50) DEFAULT NULL,
  `branchName` varchar(50) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`ba_id`, `compid`, `accountNo`, `accountName`, `bankName`, `branchName`, `balance`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(2, 'SUN-SP-00003', '123', 'Sunshine IT', 'DBBL', 'Panthapath', 211, 'Active', 8, '2023-07-09 09:04:17', 8, '2023-12-06 02:38:42'),
(3, 'SUN-AF-00011', 'afs-123', 'Afsana', 'Brac Bank', 'Farmgate', 0, 'Active', 11, '2023-09-23 05:14:33', NULL, '2023-09-23 05:14:33'),
(4, 'SUN-DE-00012', '123', 'Brac 22', 'Brac Bank', 'Panthapath', 0, 'Active', 12, '2023-09-23 08:28:24', 12, '2023-10-20 21:16:26'),
(5, 'SUN-SU-00010', '1502931462001', 'CITY Bank', 'SUNSHINE IT ', 'Kawran Bazar', 0, 'Active', 10, '2023-11-16 17:52:32', NULL, '2023-11-16 17:52:32'),
(6, 'SUN-SU-00010', '1561100014826', 'SUNSHINE ', 'DBBL', 'Mymensingh', 0, 'Active', 10, '2023-11-16 17:54:20', NULL, '2023-11-16 17:54:20'),
(7, 'SUN-SU-00010', ' 0172101000008347', 'SUNSHINE IT', 'UCB', '', 0, 'Active', 10, '2023-11-16 17:55:06', NULL, '2023-11-16 17:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brid` int NOT NULL,
  `compid` varchar(50) NOT NULL,
  `bName` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brid`, `compid`, `bName`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(3, '', 'Test Brand', 'Active', 8, '2023-09-04 18:37:55', NULL, '2023-09-04 18:37:55'),
(4, '', 'Arong', 'Active', 8, '2023-09-12 21:03:49', NULL, '2023-09-12 21:03:49'),
(6, 'SUN-DE-00012', 'Oneplus', 'Active', 12, '2023-09-24 08:33:09', NULL, '2023-09-24 08:33:09'),
(7, 'SUN-SP-00003', 'Lotto', 'Active', 8, '2023-10-26 08:03:48', NULL, '2023-10-26 08:03:48'),
(8, 'SUN-SP-00003', 'ab', 'Active', 8, '2023-10-26 08:05:44', NULL, '2023-10-26 08:05:44'),
(9, 'SUN-SP-00003', 'ab', 'Active', 8, '2023-10-26 08:06:56', NULL, '2023-10-26 08:06:56'),
(10, 'SUN-SP-00003', 'ab', 'Active', 8, '2023-10-26 08:07:28', NULL, '2023-10-26 08:07:28'),
(11, 'SUN-SU-00010', 'Sunshine IT', 'Active', 10, '2023-11-14 19:16:27', NULL, '2023-11-14 19:16:27'),
(12, 'SUN-SP-00003', 'rrr', 'Active', 8, '2024-04-10 08:49:48', NULL, '2024-04-10 08:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `cpid` int NOT NULL,
  `uid` int NOT NULL,
  `pid` int NOT NULL,
  `quantity` int NOT NULL,
  `uprice` float NOT NULL,
  `tprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `ca_id` int NOT NULL,
  `compid` varchar(20) DEFAULT NULL,
  `cashName` varchar(50) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`ca_id`, `compid`, `cashName`, `balance`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-DE-00012', 'Cash In Hand', 10000, 'Active', 12, '2023-09-24 05:31:47', NULL, '2023-10-20 21:17:34'),
(2, 'SUN-AF-00011', 'Central Cash', 0, 'Active', 11, '2023-09-25 05:54:56', NULL, '2023-09-25 05:54:56'),
(3, 'SUN-SU-00010', 'Cash in Hand', 22878, 'Active', 10, '2023-09-26 18:14:33', NULL, '2024-02-11 11:40:08'),
(4, 'SUN-SP-00003', 'Cash in Hand', 47708, 'Active', 8, '2023-10-05 18:28:24', NULL, '2024-04-23 22:00:52'),
(5, 'SUN-RA-00015', 'Cash in Hand', NULL, 'Active', 15, '2023-11-05 18:53:23', NULL, '2023-11-05 18:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `fpShow` int NOT NULL DEFAULT '2',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `compid`, `categoryName`, `fpShow`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SU-00010', 'After Sales Service', 2, 'Active', 10, '2023-11-07 22:08:06', NULL, '2023-11-07 22:08:06'),
(2, 'SUN-SP-00003', 'category 1', 2, 'Active', 8, '2023-11-10 11:30:33', NULL, '2023-11-10 11:30:33'),
(3, 'SUN-SU-00010', 'Domain Purchase', 2, 'Active', 10, '2023-11-14 20:06:04', NULL, '2023-11-14 20:06:04'),
(4, 'SUN-SU-00010', 'Hosting', 2, 'Active', 10, '2023-11-14 20:06:40', NULL, '2023-11-14 20:06:40'),
(5, 'SUN-SP-00003', 'test cat 1', 2, 'Active', 8, '2023-11-22 10:18:12', NULL, '2023-11-22 10:18:12'),
(6, 'SUN-RA-00015', 'OIL', 2, 'Active', 15, '2024-02-23 10:33:38', NULL, '2024-02-23 10:33:38'),
(7, 'SUN-SP-00003', 'TN ', 2, 'Active', 8, '2024-02-27 13:49:30', NULL, '2024-02-27 13:49:30'),
(8, 'SUN-SP-00003', 'TN', 2, 'Active', 8, '2024-02-27 13:51:54', NULL, '2024-02-27 13:51:54'),
(9, 'SUN-SP-00003', 'White LAM', 2, 'Active', 8, '2024-02-27 13:55:15', NULL, '2024-02-27 13:55:15'),
(10, 'SUN-SP-00003', 'Cement', 2, 'Active', 8, '2024-03-12 06:14:06', NULL, '2024-03-12 06:14:06'),
(11, 'SUN-SP-00003', 'test', 2, 'Active', 8, '2024-04-10 08:12:35', 8, '2024-04-10 08:49:14'),
(12, 'SUN-SP-00003', 'aaa', 2, 'Active', 8, '2024-04-10 08:12:35', NULL, '2024-04-10 08:12:35'),
(14, 'SUN-SP-00003', 'therapy', 2, 'Active', 8, '2024-04-28 10:21:22', NULL, '2024-04-28 10:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(100) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companys`
--

CREATE TABLE `companys` (
  `companyID` int NOT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `companycode` varchar(20) DEFAULT NULL,
  `companyAddress` varchar(100) DEFAULT NULL,
  `companyPhone` varchar(15) DEFAULT NULL,
  `companyEmail` varchar(100) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `com_profile`
--

CREATE TABLE `com_profile` (
  `com_pid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `com_address` varchar(50) NOT NULL,
  `com_mobile` varchar(100) NOT NULL,
  `com_email` varchar(50) DEFAULT NULL,
  `com_web` varchar(100) DEFAULT NULL,
  `com_logo` varchar(100) NOT NULL,
  `com_balance` double(10,2) DEFAULT NULL,
  `com_bimg` varchar(100) DEFAULT NULL,
  `com_simg` varchar(100) DEFAULT NULL,
  `regby` int NOT NULL,
  `regdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_profile`
--

INSERT INTO `com_profile` (`com_pid`, `compid`, `com_name`, `com_address`, `com_mobile`, `com_email`, `com_web`, `com_logo`, `com_balance`, `com_bimg`, `com_simg`, `regby`, `regdt`) VALUES
(1, 'SUN-SP-00003', 'Rohim store', '69/C,Green Road, Panthapath,Dhaka', '01714044181', 'sunshine.com.bd@gmail.com', NULL, '97933329008.png', NULL, NULL, NULL, 8, '2024-04-10 08:43:43'),
(2, 'SUN-SU-00010', 'Sunshine IT', '69/C,Green Road (5th Floor), Panthapath,Dhaka-1205', '01714044180', 'info@sunshine.com.bd', NULL, 'Sunshine_Logo_11.png', NULL, NULL, NULL, 10, '2023-11-07 21:54:45'),
(3, 'SUN-AF-00011', 'Afsana', 'Dhaka', '+8801963649996', '', NULL, 'gicon.jpg', NULL, NULL, NULL, 11, '2023-09-23 05:18:59'),
(4, 'SUN-DE-00012', 'Demo Company IT', 'Dhaka, Bangladesh', '+8801714044182', '', NULL, 'pngtree.png', NULL, NULL, NULL, 12, '2023-10-20 21:46:10'),
(5, '1', 'Sunshine It', 'Sunshine It', '01714044181', 'sunshine.com.bd@gmail.com', 'sunshine.com.bd', '', NULL, NULL, NULL, 0, '2023-11-04 08:39:40'),
(6, 'SUN-RA-00015', 'Rana Store', '', '+8801673528020', '', NULL, '', NULL, NULL, NULL, 0, '2023-11-05 18:53:23'),
(8, 'COM-ABC00019', 'ABC Company', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-04-28 09:46:09'),
(9, 'COM-ABC00020', 'ABC Company', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-04-29 05:09:51'),
(10, 'COM-ABC00021', 'ABC', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-05-15 20:09:00'),
(12, 'COM-NEV00019', 'Neville Castaneda', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-05-26 12:47:52'),
(13, 'COM-TES00024', 'Test', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-05-26 12:53:09'),
(14, 'COM-DEV00025', 'Dev Shop', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-05-26 12:58:17'),
(15, 'COM-ERA00026', 'Erasmus Guerrero', '', '', NULL, NULL, '', NULL, NULL, NULL, 0, '2024-05-31 07:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `cost_type`
--

CREATE TABLE `cost_type` (
  `ct_id` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `costName` varchar(50) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_type`
--

INSERT INTO `cost_type` (`ct_id`, `compid`, `costName`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-DE-00012', 'Interior Design', 'Active', 12, '2023-09-24 05:37:18', NULL, '2023-09-24 05:37:18'),
(2, 'SUN-AF-00011', 'Transport Cost', 'Active', 11, '2023-09-25 04:59:27', NULL, '2023-09-25 04:59:27'),
(3, 'SUN-SP-00003', 'Current Bill', 'Active', 8, '2023-10-05 18:44:51', NULL, '2023-10-05 18:44:51'),
(4, 'SUN-SP-00003', 'Mobile Bill', 'Active', 8, '2023-10-05 18:44:54', NULL, '2023-10-05 18:44:54'),
(5, 'SUN-SP-00003', 'Others Cost', 'Active', 8, '2023-10-05 18:44:57', NULL, '2023-10-05 18:44:57'),
(6, 'SUN-SP-00003', 'Journey', 'Active', 8, '2023-10-05 18:45:00', NULL, '2023-10-05 18:45:00'),
(7, 'SUN-SP-00003', 'Office Bhara', 'Active', 8, '2023-10-05 18:45:10', NULL, '2023-10-05 18:45:10'),
(8, 'SUN-SU-00010', 'Helal Vai Sunshine IT Monthly SEO ', 'Active', 10, '2023-11-07 22:18:02', NULL, '2023-11-07 22:18:02'),
(9, 'SUN-SU-00010', 'Mukta ', 'Active', 10, '2023-11-07 22:46:45', NULL, '2023-11-07 22:46:45'),
(10, 'SUN-SU-00010', 'Domain Renewal', 'Active', 10, '2023-11-07 22:47:08', NULL, '2023-11-07 22:47:08'),
(11, 'SUN-SU-00010', 'Facebook Bost', 'Active', 10, '2023-11-07 22:47:24', NULL, '2023-11-07 22:47:24'),
(12, 'SUN-SU-00010', 'Emam Uddin (Supportengineer)', 'Active', 10, '2023-11-08 10:18:49', NULL, '2023-11-08 10:18:49'),
(13, 'SUN-SU-00010', 'Domain & Hosting Purchase', 'Active', 10, '2023-11-08 10:20:06', NULL, '2023-11-08 10:20:06'),
(14, 'SUN-SU-00010', 'Sohe Rana (CEO)', 'Active', 10, '2023-11-08 10:20:21', NULL, '2023-11-08 10:20:21'),
(15, 'SUN-SU-00010', 'Client Meeting Sohel Rana', 'Active', 10, '2023-11-12 17:53:04', NULL, '2023-11-12 17:53:04'),
(16, 'SUN-SU-00010', 'Office food', 'Active', 10, '2023-11-12 17:53:17', NULL, '2023-11-12 17:53:17'),
(17, 'SUN-SU-00010', 'Office Equipment ', 'Active', 10, '2023-11-12 17:53:32', NULL, '2023-11-12 17:53:32'),
(18, 'SUN-SU-00010', 'Office khala Monthly bill ', 'Active', 10, '2023-11-12 17:53:50', NULL, '2023-11-12 17:53:50'),
(19, 'SUN-SU-00010', 'Internet Bill/ Hastag', 'Active', 10, '2023-11-13 06:19:35', NULL, '2023-11-13 06:19:35'),
(20, 'SUN-SU-00010', 'Moyla Bill', 'Active', 10, '2023-11-13 06:19:46', NULL, '2023-11-13 06:19:46'),
(21, 'SUN-SU-00010', 'Staff Salary', 'Active', 10, '2023-11-14 06:34:04', NULL, '2023-11-14 06:34:04'),
(22, 'SUN-SU-00010', 'Office Rent', 'Active', 10, '2023-11-14 19:20:14', NULL, '2023-11-14 19:20:14'),
(23, 'SUN-SU-00010', 'Agrani Bank Loan', 'Active', 10, '2023-11-14 19:27:50', NULL, '2023-11-14 19:27:50'),
(24, 'SUN-SU-00010', 'Mosjid a Dan', 'Active', 10, '2023-11-14 19:28:07', NULL, '2023-11-14 19:28:07'),
(25, 'SUN-SU-00010', 'Other Expense', 'Active', 10, '2023-11-14 19:28:21', NULL, '2023-11-14 19:28:21'),
(26, 'SUN-SU-00010', 'Theme/ Plugin/ Template Purchase', 'Active', 10, '2023-11-14 19:28:49', NULL, '2023-11-14 19:28:49'),
(27, 'SUN-SU-00010', 'Cashboi  Investment', 'Active', 10, '2023-11-14 19:29:19', NULL, '2023-11-14 19:29:19'),
(29, 'SUN-SU-00010', 'Client Meeting', 'Active', 10, '2023-11-14 19:29:51', NULL, '2023-11-14 19:29:51'),
(30, 'SUN-SU-00010', 'Hosting Renewal', 'Active', 10, '2023-11-15 13:41:28', NULL, '2023-11-15 13:41:28'),
(31, 'SUN-SU-00010', 'Current Bill', 'Active', 10, '2023-11-20 20:30:55', NULL, '2023-11-20 20:30:55'),
(32, 'SUN-SU-00010', 'Bdstall Monthly subscription free', 'Active', 10, '2023-11-20 20:51:48', NULL, '2023-11-20 20:51:48'),
(33, 'SUN-RA-00015', 'Others Cost', 'Active', 15, '2024-02-23 10:45:32', NULL, '2024-02-23 10:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countrysl` int NOT NULL,
  `counscode` varchar(5) NOT NULL,
  `counname` varchar(15) NOT NULL,
  `councapital` varchar(20) NOT NULL,
  `councurname` varchar(20) NOT NULL,
  `councurcode` varchar(5) NOT NULL,
  `counphcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `cus_id` varchar(15) DEFAULT NULL,
  `customerName` varchar(50) NOT NULL,
  `custCompany` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `custMobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `upzid` int NOT NULL,
  `disid` int NOT NULL,
  `divid` int NOT NULL,
  `balance` float DEFAULT NULL,
  `custNotes` mediumtext NOT NULL,
  `custLimit` float NOT NULL,
  `trCode` varchar(30) NOT NULL,
  `custTerms` varchar(100) NOT NULL,
  `custType` int NOT NULL DEFAULT '1',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `compid`, `cus_id`, `customerName`, `custCompany`, `mobile`, `custMobile`, `email`, `address`, `upzid`, `disid`, `divid`, `balance`, `custNotes`, `custLimit`, `trCode`, `custTerms`, `custType`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SU-00010', 'C-SUN00001', 'Faysal Vai/Gulshan', 'Hassan Techno Builders', '01790505318', '', '', 'Gulshan @, Dhaka', 0, 0, 0, 0, 'Business Client', 0, '', '', 1, 'Active', 10, '2023-11-07 22:14:03', NULL, '2023-11-07 22:14:03'),
(2, 'SUN-SU-00010', 'C-SUN00002', 'Gonoshasto Cox Bazar', '', '', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-07 22:45:02', NULL, '2023-11-07 22:45:02'),
(3, 'SUN-SU-00010', 'C-SUN00003', 'Ratan Vai Gramaus Mymensingh ', '', '01873873154', '', '', 'Mymensingh', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-08 10:15:13', NULL, '2023-11-08 10:15:13'),
(4, 'SUN-SU-00010', 'C-SUN00004', 'Mohiul Islam', 'naharcorporation.com', '01730046240', '', '', 'Mohammadpur', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-08 10:17:06', NULL, '2023-11-08 10:17:06'),
(5, 'SUN-SP-00003', NULL, 'Rohim mia', '', '01711223344', '', '', '', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 8, '2023-11-10 12:00:36', NULL, '2023-11-10 12:00:36'),
(6, 'SUN-SU-00010', 'C-SUN00006', 'Sohag vai Jatrabari', 'Introvert Courier', '01882611111', '', '', '', 0, 0, 0, 0, '', 0, 'DHA001', '', 1, 'Active', 10, '2023-11-12 17:48:08', NULL, '2023-11-12 17:48:08'),
(7, 'SUN-SU-00010', 'C-SUN00007', 'Ridoy vai', 'Safe life Courier', '+880 1773-45485', '', '', '', 0, 0, 0, 0, '', 0, 'DHA001', '', 1, 'Active', 10, '2023-11-12 17:49:10', NULL, '2023-11-12 17:49:10'),
(8, 'SUN-SP-00003', 'C-CAS00008', 'Sohel Rana', 'Sunshine IT', '01683470966', '01726747500', 'sunshine@gmail.com', '69/C,Green Road, Panthapath', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 8, '2023-11-12 18:10:46', NULL, '2023-11-12 18:10:46'),
(9, 'SUN-SU-00010', 'C-SUN00009', 'mahiyaelevator.com', 'mahiyaelevator.com', '+880 1975-30430', '', '', 'Apartment 8/C, Nigar Plaza, Plot-32/B, Road-02, Sector-03, Uttara, Dhaka-1230', 0, 0, 0, 0, '2 Ta Software o akta Website Niche', 0, '', '', 0, 'Active', 10, '2023-11-14 06:36:31', NULL, '2023-11-14 06:36:31'),
(10, 'SUN-SU-00010', 'C-SUN00010', 'Rashid Sir/ Damekom.com', 'Jobcare', '01726316179', '', '', 'তালতলা বাসস্টান্ডে', 0, 0, 0, 0, 'VIP Client', 0, '', '', 2, 'Active', 10, '2023-11-14 19:15:30', 10, '2024-01-11 13:33:08'),
(11, 'SUN-SU-00010', 'C-SUN00011', 'Rampura Clinet', 'Rampura Clinet', '01714044181', '', '', 'Rampura', 0, 0, 0, 0, '', 0, 'DHA001', '', 1, 'Active', 10, '2023-11-14 19:25:43', NULL, '2023-11-14 19:25:43'),
(12, 'SUN-SU-00010', 'C-SUN00012', 'Shamim Vai Sunmi POS Device', '', '01764821939', '', 'techtackbd.com', 'Elephant Road', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 10, '2023-11-14 20:11:02', NULL, '2023-11-14 20:11:02'),
(13, 'SUN-SU-00010', 'C-SUN00013', 'Abu Nousher / Kalabagan', '', '01912657122', '', '', '84 , Bashir Uddin Road, Kalabagan', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 10, '2023-11-14 20:15:35', NULL, '2023-11-14 20:15:35'),
(14, 'SUN-SU-00010', 'C-SUN00014', 'Norosindi Accounting ', 'Arham Spinning Mills', '01921652066', '', '', 'Norosindi ', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 10, '2023-11-16 17:12:04', NULL, '2023-11-16 17:12:04'),
(15, 'SUN-SU-00010', 'C-SUN00015', 'jakirtraders', 'jakirtraders', '01860557777', '', 'jakirtraders2010@gmail.com', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-19 13:02:38', NULL, '2023-11-19 13:02:38'),
(16, 'SUN-SU-00010', 'C-SUN00016', 'Mostofa Vai ', 'mirrorparlour.com', '01819271911', '', 'mostofa78@gmail.com', 'Jatrabari', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-20 20:29:43', NULL, '2023-11-20 20:29:43'),
(17, 'SUN-SU-00010', 'C-SUN00017', 'Courier Khaigao', 'AmarCourier.com.bd', '01609690906', '', '', 'Khaigao', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-20 20:36:08', NULL, '2023-11-20 20:36:08'),
(18, 'SUN-SU-00010', 'C-SUN00018', 'Ali Vai@ Manager- Mosar Coil', 'Manager- Mosar Coil', '01911063681', '', '', 'Dhanmondi 27', 0, 0, 0, 0, '65000 maje Basic Menufacture Ready kore Dite bolteche', 0, '', '', 0, 'Active', 10, '2023-11-20 20:40:20', NULL, '2023-11-20 20:40:20'),
(19, 'SUN-SU-00010', 'C-SUN00019', 'Shawn Vai @ Dhanmondi Lake Par', '', '01682897064', '', '', 'Dhanmondi Lake Par', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 10, '2023-11-20 20:43:48', NULL, '2023-11-20 20:43:48'),
(20, 'SUN-SU-00010', 'C-SUN00020', 'MA Salam Enterprise', 'MA Salam Enterprise', '01714044183', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-21 18:35:18', NULL, '2023-11-21 18:35:18'),
(21, 'SUN-SU-00010', 'C-SUN00021', 'Mahbub Anwar Sumon', 'teknafmedicalcenterbd.com', '01777259844', '', '', 'Coxbazar', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-26 05:55:36', NULL, '2023-11-26 05:55:36'),
(22, 'SUN-SU-00010', 'C-SUN00022', 'Emam Salas', 'Emam Salas', '01714044188', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-27 04:37:06', NULL, '2023-11-27 04:37:06'),
(23, 'SUN-SU-00010', 'C-SUN00023', 'Others Income', 'Others Income', '01714044186', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-11-30 18:53:57', NULL, '2023-11-30 18:53:57'),
(24, 'SUN-SU-00010', 'C-SUN00024', 'Joynal vai Dubai', 'dreamyvape.shop', '+971586757231', '', '', 'Dubai', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-07 18:20:03', NULL, '2023-12-07 18:20:03'),
(25, 'SUN-SU-00010', 'C-SUN00025', 'Ahsan Vai', 'Kauser and Sons Savar', '01673781208', '', '', 'Savar', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-14 02:38:49', NULL, '2023-12-14 02:38:49'),
(26, 'SUN-SU-00010', 'C-SUN00026', 'Razzak Vai ', 'Mostafa Vai Lok ', '01713198711', '', 'a.razzak2011.ra@gmail.co', 'Mirpur', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-21 09:37:25', NULL, '2023-12-21 09:37:25'),
(27, 'SUN-SU-00010', 'C-SUN00027', 'Agrobee ', 'Hima Mart', '+880 1831-06946', '', '', 'Dhaka', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-21 09:39:57', NULL, '2023-12-21 09:39:57'),
(28, 'SUN-SU-00010', 'C-SUN00028', 'KKML', 'KKML', '0 1623-850550', '', '', 'Gulisthan', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-24 11:26:39', NULL, '2023-12-24 11:26:39'),
(29, 'SUN-SU-00010', 'C-SUN00029', 'Shahed vai', 'Islam Engineering workshop', '+971 50 721 664', '', '', 'Abu dabi', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-25 21:05:21', NULL, '2023-12-25 21:05:21'),
(30, 'SUN-SU-00010', 'C-SUN00030', 'Rashel VAi / Cindrella Tel company', 'Cindrella Tel company', '01611108880', '', '', 'Panthapath', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-27 18:27:09', NULL, '2023-12-27 18:27:09'),
(31, 'SUN-SU-00010', 'C-SUN00031', 'Akanda Computer/ Netrokona', 'Akanda Computer', '+880 1711-28116', '', '', 'Netrokona', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-27 18:28:53', NULL, '2023-12-27 18:28:53'),
(32, 'SUN-SU-00010', 'C-SUN00032', 'Priyota Bazar ', 'Priyota Bazar ', '0 1911-656532', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-30 11:54:54', NULL, '2023-12-30 11:54:54'),
(33, 'SUN-SU-00010', 'C-SUN00033', 'Shahed Ashraf/ braverman', 'Inflame ', '+880 1521-41304', '', '', 'Baridhara', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2023-12-31 19:46:04', NULL, '2023-12-31 19:46:04'),
(34, 'SUN-SU-00010', 'C-SUN00034', 'Md. Kaisaπ Rajvi', 'A r Rahman Scientific', '+880 1722-37556', '', 'arahmanscientific2011@gmail.com', 'Ground Floor, Ittefaq Moor, Mamun Mansion, 52/2 Toyenbee Circular Road, Dhaka', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-01 17:18:02', NULL, '2024-01-01 17:18:02'),
(35, 'SUN-SU-00010', 'C-SUN00035', 'Nayeem Sales', '', '01828555868', '', '', 'Sunshine IT Office', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-08 16:52:33', NULL, '2024-01-08 16:52:33'),
(36, 'SUN-SU-00010', 'C-SUN00036', 'Sohel Rana Sales', '', '01714044182', '', '', '', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-08 16:59:08', NULL, '2024-01-08 16:59:08'),
(37, 'SUN-SP-00003', 'C-CAS00009', 'test Customer', '', '01714044150', '', 'sunshine.com.bd@gmail.com', 'Dhaka', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 8, '2024-01-10 19:13:45', NULL, '2024-01-10 19:13:45'),
(38, 'SUN-SU-00010', 'C-SUN00038', 'Bondhon E-commerce Apu', 'Bondhon', '+880 1712-20558', '', '', 'Mirpur, Dhaka', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-10 19:57:52', NULL, '2024-01-10 19:57:52'),
(39, 'SUN-SU-00010', 'C-SUN00039', 'Torikul Vai Gutibro', 'zuqobd.com', '+880 1765-71546', '', '', 'Rapa Plaza dhanmondi', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-13 06:01:57', NULL, '2024-01-13 06:01:57'),
(40, 'SUN-SU-00010', 'C-SUN00040', 'Rajbari Inventory', 'Lam Trade International', '01759913651', '', 'lambrandbd@gmail.com', 'Rajbari', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-13 17:58:10', NULL, '2024-01-13 17:58:10'),
(41, 'SUN-SU-00010', 'C-SUN00041', 'Muhammad Jinnat Ali/ Savar', 'Raj Electro Power BD', '01719527382', '', 'rajelectropowerbd@gmail.com', 'Savar/ Rubel Vai Refer', 0, 0, 0, 0, 'Savar/ Rubel Vai Refer', 0, '', '', 0, 'Active', 10, '2024-01-14 19:26:48', NULL, '2024-01-14 19:26:48'),
(42, 'SUN-SU-00010', 'C-SUN00042', 'Aziz Vai Lalbag/ Abcibd', 'Abcibd.com', '01670832265', '', 'abcibabytoys1987@gmail.com', 'Lalbag Kella More', 0, 0, 0, 0, 'Reseller Client', 0, '', '', 0, 'Active', 10, '2024-01-14 19:30:00', NULL, '2024-01-14 19:30:00'),
(43, 'SUN-SU-00010', 'C-SUN00043', 'Abaroni Engineering / Zashim Vai', 'Abaroni Engineering ', '01777757715', '', '', 'Banani F Block 3 No Road House-77A', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-17 21:09:09', NULL, '2024-01-17 21:09:09'),
(44, 'SUN-SU-00010', 'C-SUN00044', 'Project Ielts APPS', '', '0 1821-913544', '', '', 'Green Road', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-01-24 14:03:07', NULL, '2024-01-24 14:03:07'),
(45, 'SUN-SU-00010', 'C-SUN00045', 'Union porishad Software ', '', '+880 1324-76111', '', '', 'Chittagong', 0, 0, 0, 0, '', 0, '', '', 0, 'Active', 10, '2024-02-01 14:39:05', NULL, '2024-02-01 14:39:05'),
(46, 'SUN-SU-00010', 'C-SUN00046', 'mobilexpressbd.com', 'Kustiya', '01884308338', '', 'bbfirst86@gmail.com', 'Moddho Bazar, Bheramara, Kushtia', 0, 0, 0, 0, '*** Dealer client ', 0, '', '', 0, 'Active', 10, '2024-02-05 04:48:14', NULL, '2024-02-05 04:48:14'),
(47, 'SUN-SU-00010', 'C-SUN00047', 'Jahangir vai ', 'Moon OPC', '01837579819', '', 'Jahangir.irmc@gmail.com', 'badda', 0, 0, 0, 0, 'VIP Client', 0, '', '', 0, 'Active', 10, '2024-02-06 09:02:58', NULL, '2024-02-06 09:02:58'),
(48, 'SUN-SU-00010', 'C-SUN00048', 'Ruman Vai/ Kolaura Client ', 'upon group', '01740465042', '', 'ruman6626@gmail.com', '', 0, 0, 0, 0, '# Refer client', 0, '', '', 0, 'Active', 10, '2024-02-12 10:06:17', NULL, '2024-02-12 10:06:17'),
(49, 'SUN-SP-00003', 'C-CAS00010', 'ahsan', '', '001144254', '', '', 'rajapur', 0, 0, 0, 500, '', 0, '', '', 1, 'Active', 8, '2024-02-21 05:12:24', 8, '2024-04-10 08:38:17'),
(50, 'SUN-RA-00015', 'C-RAN00001', 'islam', '', '01959279333', '', '', 'Khluna', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 15, '2024-02-23 10:40:03', NULL, '2024-02-23 10:40:03'),
(51, 'SUN-SP-00003', NULL, 'MD. TANVIR AHMED', '', '01753781569', '', 'tanvirpoly@gmail.com', 'Amodpur, Halima Nagar', 0, 0, 0, 500000, '', 0, '', '', 1, 'Active', 8, '2024-04-01 07:17:02', 8, '2024-04-10 08:38:02'),
(52, 'SUN-SP-00003', 'C-CAS00052', 'tttt', 'tt', '445454545454545', '454545454545', 'tanvirpoly@gmail.com', 'Amodpur, Halima Nagar', 0, 0, 0, 45, 'rfr', 45, 'DHA002', '', 1, 'Active', 8, '2024-04-10 08:39:27', NULL, '2024-04-10 08:39:27'),
(53, 'SUN-SP-00003', 'C-CAS00053', 'Tanvir Test', 'Companyb Test', '12345678901', '', 'abcd@gmail.com', 'dhaka', 0, 0, 0, 100, 'test', 5000, 'DHA001', '', 1, 'Active', 8, '2024-04-20 08:28:43', NULL, '2024-04-20 08:28:43'),
(54, 'SUN-SP-00003', 'C-CAS00054', 'Rohim mia', '', '1714044181', '', NULL, 'Dhaka', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(55, 'SUN-SP-00003', 'C-CAS00055', 'karim mia', '', '1714044182', '', NULL, 'Dhaka', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(56, 'SUN-SP-00003', 'C-CAS00056', 'sumon', '', '1714044183', '', NULL, NULL, 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(57, 'SUN-SP-00003', 'C-CAS00057', 'emam', '', '1714044184', '', NULL, 'mym', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(58, 'SUN-SP-00003', 'C-CAS00058', 'nayeem', '', '1714044185', '', NULL, 'barishal', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(59, 'SUN-SP-00003', 'C-CAS00059', 'mukta', '', '1714044186', '', NULL, 'khaulna', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(60, 'SUN-SP-00003', 'C-CAS00060', 'tanvir', '', '1714044187', '', NULL, 'gazipur', 0, 0, 0, NULL, '', 0, '', '', 1, 'Active', 8, '2024-04-23 22:05:35', NULL, '2024-04-23 22:05:35'),
(61, 'SUN-SP-00003', 'C-CAS00061', 'md shariful islam', '', '01959279111', '', 'sharifuljob2020@gmail.com', 'Khluna', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 8, '2024-04-27 04:50:25', NULL, '2024-04-27 04:50:25'),
(62, 'SUN-SP-00003', 'C-CAS00062', 'Nayeem', '', '01999999999', '', '', '', 0, 0, 0, 0, '', 0, '', '', 1, 'Active', 8, '2024-04-27 04:59:16', NULL, '2024-04-27 04:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dpt_id` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dpt_id`, `compid`, `dept_name`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'Sales', 'Active', 8, '2023-07-13 09:33:06', NULL, '2023-07-13 09:33:06'),
(2, 'SUN-SP-00003', 'Marketing', 'Active', 8, '2023-07-13 09:33:08', NULL, '2023-07-13 09:33:08'),
(3, 'SUN-SP-00003', 'Operation', 'Active', 8, '2023-07-13 09:33:10', NULL, '2023-07-13 09:33:10'),
(4, 'SUN-SP-00003', 'Finance', 'Active', 8, '2023-07-13 09:33:12', NULL, '2023-07-13 09:33:12'),
(5, 'SUN-AF-00011', 'Sales', 'Active', 11, '2023-09-23 06:13:41', NULL, '2023-09-23 06:13:41'),
(6, 'SUN-AF-00011', 'Marketing', 'Active', 11, '2023-09-23 06:13:46', NULL, '2023-09-23 06:13:46'),
(7, 'SUN-AF-00011', 'Business', 'Active', 11, '2023-09-23 06:13:51', NULL, '2023-09-23 06:13:51'),
(9, 'SUN-DE-00012', 'test', 'Active', 12, '2023-09-23 08:28:01', NULL, '2023-09-23 08:28:01'),
(12, 'SUN-SU-00010', 'Administration', 'Active', 10, '2023-11-14 19:16:48', NULL, '2023-11-14 19:16:48'),
(13, 'SUN-SU-00010', 'Programmer', 'Active', 10, '2023-11-14 19:16:56', NULL, '2023-11-14 19:16:56'),
(14, 'SUN-SU-00010', 'Web Developer', 'Active', 10, '2023-11-14 19:17:02', NULL, '2023-11-14 19:17:02'),
(15, 'SUN-SU-00010', 'Support Engineer', 'Active', 10, '2023-11-14 19:17:11', NULL, '2023-11-14 19:17:11'),
(16, 'SUN-SU-00010', 'Sales ', 'Active', 10, '2023-11-20 20:33:25', NULL, '2023-11-20 20:33:25'),
(17, 'SUN-SP-00003', 'test dept 1', 'Active', 8, '2023-11-22 09:58:58', NULL, '2023-11-22 09:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int NOT NULL,
  `division_id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.26361358', '89.91794786', 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `emp_id` varchar(15) DEFAULT NULL,
  `dpt_id` int DEFAULT NULL,
  `employeeName` varchar(50) DEFAULT NULL,
  `empaddress` mediumtext,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `trCode` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `compid`, `emp_id`, `dpt_id`, `employeeName`, `empaddress`, `phone`, `email`, `joiningDate`, `salary`, `nid`, `image`, `trCode`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'E-SUN00001', 1, 'Mohammad Raihan', 'Dhaka', '01902664265', '', '2023-07-29', 0, '', '', '', 'Active', 8, '2023-07-13 11:20:30', 8, '2024-04-10 08:41:45'),
(3, 'SUN-SP-00003', 'E-SUN00003', 1, 'Emam Uddin', 'Green Road', '01714044181', 'sunshineemam@gmail.com', '2023-08-04', 20000, '12154112', '', '', 'Active', 8, '2023-08-04 12:25:00', NULL, '2023-08-04 12:25:00'),
(4, 'SUN-AF-00011', 'E-AFS00001', 5, 'Israt', 'Mohakhali', '01521213698', '', '2023-06-01', 25000, '', '', '', 'Active', 11, '2023-09-23 06:14:12', NULL, '2023-09-23 06:14:12'),
(5, 'SUN-AF-00011', 'E-AFS00002', 7, 'Asma', 'Banani', '01589632541', '', '2020-02-04', 40000, '', '', '', 'Active', 11, '2023-09-23 06:17:45', NULL, '2023-09-23 06:17:45'),
(6, 'SUN-DE-00012', 'E-DEM00001', 9, 'Abu Bakar', 'Dhaka-1205', '01526935478', '', '2023-08-09', 30000, '', '134258115_10218218547317055_8996644294426742359_o.jpg', '', 'Active', 12, '2023-09-23 08:31:25', 12, '2023-10-20 22:00:49'),
(9, 'SUN-SP-00003', 'E-CAS00004', 3, 'Rana', 'Dhaka', '11223344557', '', '2023-10-04', 0, '', '666.png', '', 'Active', 8, '2023-10-06 16:26:53', 8, '2023-10-07 18:52:23'),
(10, 'SUN-SU-00010', 'E-SUN00001', 12, 'Sohel Rana', '69/C,green Road, Panthapath', '01714044180', 'sunshine.com.bd@gmail.com', '2018-01-01', 40000, '19906122007000025', '3696-Sohel_Rana.jpg', '', 'Active', 10, '2023-11-16 17:57:27', NULL, '2023-11-16 17:57:27'),
(11, 'SUN-SU-00010', 'E-SUN00002', 14, 'Mukta', 'Semoli', '01997451631', 'muktacse.diu@gmail.com', '2021-01-01', 25000, '', '4545.jpg', '', 'Active', 10, '2023-11-16 18:01:03', NULL, '2023-11-16 18:01:03'),
(12, 'SUN-SU-00010', 'E-SUN00003', 13, 'Sajedul islam Sajib', 'Bosundhara', '01633135411', '', '2018-01-01', 30000, '', '', '', 'Active', 10, '2023-11-20 20:47:50', NULL, '2023-11-20 20:47:50'),
(14, 'SUN-SP-00003', 'E-CAS00005', 2, 'ewe', 'wewe', '23232323322', 'tanvirpoly@gmail.com', '2024-04-10', 232323, '232323', '', '', 'Active', 8, '2024-04-10 08:42:10', NULL, '2024-04-10 08:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE `employee_payment` (
  `empPid` int NOT NULL,
  `compid` varchar(20) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `month` varchar(5) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `paid` float NOT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `accountNo` int DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `regby` int DEFAULT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`empPid`, `compid`, `empid`, `year`, `month`, `salary`, `paid`, `accountType`, `accountNo`, `note`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-DE-00012', 6, '2023', '10', 30000, 2000, 'Cash', 1, '', 12, '2023-10-21 03:56:53', NULL, '2023-10-20 21:56:53'),
(2, 'SUN-SP-00003', 3, '2023', '10', 20000, 20000, 'Cash', 4, '', 8, '2023-10-26 11:15:43', NULL, '2023-10-26 05:15:43'),
(3, 'SUN-SP-00003', 3, '2023', '10', 20000, 10000, 'Cash', 4, '', 8, '2023-10-29 02:05:02', NULL, '2023-10-28 20:05:02'),
(4, 'SUN-SP-00003', 2, '2023', '10', 0, 1000, 'Cash', 4, '', 8, '2023-10-31 23:17:03', NULL, '2023-10-31 17:17:03'),
(5, 'SUN-SP-00003', 3, '2023', '11', 20000, 50, 'Cash', 4, '', 8, '2023-11-01 23:31:32', NULL, '2023-11-01 17:31:32'),
(6, 'SUN-SP-00003', 3, '2023', '11', 20000, 1950, 'Cash', 4, '', 8, '2023-11-26 22:17:04', 8, '2024-04-10 08:36:31'),
(9, 'SUN-SP-00003', 1, '2024', '04', 0, 3444440, 'Cash', 4, '', 8, '2024-04-10 14:36:55', NULL, '2024-04-10 08:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `emp_dev_attendance`
--

CREATE TABLE `emp_dev_attendance` (
  `autoid` int NOT NULL,
  `accid` int NOT NULL,
  `device_id` tinyint NOT NULL,
  `compid` varchar(50) NOT NULL,
  `ename` varchar(35) DEFAULT NULL,
  `adate` date DEFAULT NULL,
  `year` int DEFAULT NULL,
  `month` int DEFAULT NULL,
  `ain` time DEFAULT NULL,
  `aout` time DEFAULT NULL,
  `late` varchar(80) DEFAULT NULL,
  `early` varchar(80) DEFAULT NULL,
  `off_start` time DEFAULT NULL,
  `off_end` time DEFAULT NULL,
  `oAddress` varchar(250) NOT NULL,
  `regby` int NOT NULL,
  `regdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `updt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_dev_attendance`
--

INSERT INTO `emp_dev_attendance` (`autoid`, `accid`, `device_id`, `compid`, `ename`, `adate`, `year`, `month`, `ain`, `aout`, `late`, `early`, `off_start`, `off_end`, `oAddress`, `regby`, `regdt`, `upby`, `updt`) VALUES
(1, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2023-09-05', 2023, 9, '15:47:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-05 08:47:57', NULL, '2023-09-05 08:47:57'),
(2, 2, 1, 'SUN-SP-00003', 'Abu Bakar', '2023-09-05', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-05 08:47:57', NULL, '2023-09-05 08:47:57'),
(3, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2023-09-05', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-05 08:47:57', NULL, '2023-09-05 08:47:57'),
(4, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2023-09-13', 2023, 9, '01:49:00', '04:50:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-12 20:49:48', NULL, '2023-09-12 20:49:48'),
(5, 2, 1, 'SUN-SP-00003', 'Abu Bakar', '2023-09-13', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-12 20:49:48', NULL, '2023-09-12 20:49:48'),
(6, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2023-09-13', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-09-12 20:49:48', NULL, '2023-09-12 20:49:48'),
(7, 4, 1, 'SUN-AF-00011', 'Israt', '2023-09-23', 2023, 9, '10:05:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 11, '2023-09-23 06:18:00', NULL, '2023-09-23 06:18:00'),
(8, 5, 1, 'SUN-AF-00011', 'Asma', '2023-09-23', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 11, '2023-09-23 06:18:00', NULL, '2023-09-23 06:18:00'),
(9, 4, 1, 'SUN-AF-00011', 'Israt', '2023-09-23', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Absence', 11, '2023-09-23 06:18:44', NULL, '2023-09-23 06:18:44'),
(10, 5, 1, 'SUN-AF-00011', 'Asma', '2023-09-23', 2023, 9, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 11, '2023-09-23 06:18:44', NULL, '2023-09-23 06:18:44'),
(11, 6, 1, 'SUN-DE-00012', 'Abu Bakar', '2023-10-20', 2023, 10, '03:58:00', '03:58:00', NULL, '0', NULL, NULL, 'Present', 12, '2023-10-20 21:59:00', NULL, '2023-10-20 21:59:00'),
(12, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2023-10-28', 2023, 10, '01:02:00', '01:07:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:14', NULL, '2023-10-28 19:01:14'),
(13, 2, 1, 'SUN-SP-00003', 'Abu Bakar', '2023-10-28', 2023, 10, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:14', NULL, '2023-10-28 19:01:14'),
(14, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2023-10-28', 2023, 10, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:14', NULL, '2023-10-28 19:01:14'),
(15, 9, 1, 'SUN-SP-00003', 'Rana', '2023-10-28', 2023, 10, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:14', NULL, '2023-10-28 19:01:14'),
(16, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2023-10-29', 2023, 10, '01:04:00', '13:06:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:34', NULL, '2023-10-28 19:01:34'),
(17, 2, 1, 'SUN-SP-00003', 'Abu Bakar', '2023-10-29', 2023, 10, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:34', NULL, '2023-10-28 19:01:34'),
(18, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2023-10-29', 2023, 10, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:34', NULL, '2023-10-28 19:01:34'),
(19, 9, 1, 'SUN-SP-00003', 'Rana', '2023-10-29', 2023, 10, '00:00:00', '11:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2023-10-28 19:01:34', 8, '2023-11-21 17:00:17'),
(20, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2024-02-21', 2024, 2, '19:41:00', '19:43:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-02-21 13:41:33', NULL, '2024-02-21 13:41:33'),
(21, 2, 1, 'SUN-SP-00003', 'Abu Bakar', '2024-02-21', 2024, 2, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-02-21 13:41:33', NULL, '2024-02-21 13:41:33'),
(22, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2024-02-21', 2024, 2, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-02-21 13:41:33', NULL, '2024-02-21 13:41:33'),
(23, 9, 1, 'SUN-SP-00003', 'Rana', '2024-02-21', 2024, 2, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-02-21 13:41:33', NULL, '2024-02-21 13:41:33'),
(24, 1, 1, 'SUN-SP-00003', 'Mohammad Raihan', '2024-04-23', 2024, 4, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-04-23 22:02:29', NULL, '2024-04-23 22:02:29'),
(25, 3, 1, 'SUN-SP-00003', 'Emam Uddin', '2024-04-23', 2024, 4, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-04-23 22:02:29', NULL, '2024-04-23 22:02:29'),
(26, 9, 1, 'SUN-SP-00003', 'Rana', '2024-04-23', 2024, 4, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-04-23 22:02:29', NULL, '2024-04-23 22:02:29'),
(27, 14, 1, 'SUN-SP-00003', 'ewe', '2024-04-23', 2024, 4, '00:00:00', '00:00:00', NULL, '0', NULL, NULL, 'Present', 8, '2024-04-23 22:02:29', NULL, '2024-04-23 22:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `emp_targer`
--

CREATE TABLE `emp_targer` (
  `etid` int NOT NULL,
  `compid` varchar(50) NOT NULL,
  `empid` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `tAmount` float NOT NULL,
  `notes` mediumtext,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_targer`
--

INSERT INTO `emp_targer` (`etid`, `compid`, `empid`, `month`, `year`, `tAmount`, `notes`, `regby`, `regdate`, `upby`, `up_date`) VALUES
(1, '0', 1, 1, 2020, 100000, '', 8, '2023-09-05 06:35:13', NULL, '2023-09-05 06:35:13'),
(2, 'SUN-DE-00012', 6, 10, 2023, 10000, '', 12, '2023-09-23 08:32:18', 12, '2023-10-20 22:04:03'),
(4, 'SUN-AF-00011', 5, 10, 2023, 10000, '', 11, '2023-09-25 04:52:36', NULL, '2023-09-25 04:52:36'),
(5, 'SUN-SP-00003', 3, 10, 2023, 1500, '', 8, '2023-10-05 19:00:54', NULL, '2023-10-05 19:00:54'),
(6, 'SUN-SP-00003', 2, 10, 2023, 100, '', 8, '2023-10-05 19:01:02', NULL, '2023-10-05 19:01:02'),
(7, 'SUN-SP-00003', 1, 10, 2023, 500, '', 8, '2023-10-05 19:01:10', NULL, '2023-10-05 19:01:10'),
(8, 'SUN-SU-00010', 10, 11, 2023, 300000, '# this Target and Collect Best try', 10, '2023-11-16 18:05:00', NULL, '2023-11-16 18:05:00'),
(9, 'SUN-SP-00003', 1, 1, 2024, 334, '343', 8, '2024-04-10 08:50:04', NULL, '2024-04-10 08:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `help_support`
--

CREATE TABLE `help_support` (
  `hs_id` int NOT NULL,
  `compid` varchar(15) NOT NULL,
  `s_id` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `help_support`
--

INSERT INTO `help_support` (`hs_id`, `compid`, `s_id`, `subject`, `message`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'HS-CAS00001', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 8, '2023-09-12 21:12:24', NULL, '2023-09-12 21:12:24'),
(3, 'SUN-SP-00003', 'HS-CAS00002', 'Requesting for the database backup', 'It will be a great help, if you can provide me the database backup of my software.	', 8, '2023-09-19 17:12:15', NULL, '2023-09-19 17:12:15'),
(4, 'SUN-SP-00003', 'HS-CAS00004', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 'fghgj', 8, '2023-09-19 20:16:08', NULL, '2023-09-19 20:16:08'),
(5, 'SUN-SP-00003', 'HS-CAS00005', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 'gjj', 8, '2023-09-22 17:44:26', NULL, '2023-09-22 17:44:26'),
(6, 'SUN-DE-00012', 'HS-DEM00006', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 'Domain ssl active kore den, Sohel Rana, Sunsine IT', 12, '2023-10-20 22:06:54', NULL, '2023-10-20 22:06:54'),
(7, 'SUN-SU-00010', 'HS-SUN00007', 'KKML Saturday Training', 'KKML Saturday Training\r\nAmi \r\nMisbah\r\nSajedul', 10, '2023-11-16 18:28:40', NULL, '2023-11-16 18:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `help_support_reply`
--

CREATE TABLE `help_support_reply` (
  `hpr_id` int NOT NULL,
  `hp_id` int NOT NULL,
  `reply` text NOT NULL,
  `regby` int NOT NULL,
  `regdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `help_support_reply`
--

INSERT INTO `help_support_reply` (`hpr_id`, `hp_id`, `reply`, `regby`, `regdate`) VALUES
(1, 1, 'Thanks\r\nSupport Team, Sunshine IT\r\nOffice: 69/C, Green Road(5th floor), Panthapath,Dhaka-1205\r\nSales: +8801714044180 (10.00 AM-6.00 PM Every Day)\r\nTechnical Support: +8801714044181 (10.00 AM- 6.00 PM Every Day)', 8, '13/09/2023 03:13:29 am'),
(2, 6, 'Reply Message *', 12, '21/10/2023 04:07:05 am'),
(3, 6, 'Message *', 12, '21/10/2023 04:08:35 am'),
(4, 7, 'Lunch Pore Jabo', 10, '17/11/2023 12:28:58 am');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `hbid` int NOT NULL,
  `hbanner` varchar(200) NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobileaccount`
--

CREATE TABLE `mobileaccount` (
  `ma_id` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `accountName` varchar(50) DEFAULT NULL,
  `accountNo` int DEFAULT NULL,
  `accountType` varchar(20) DEFAULT NULL,
  `accountOwner` varchar(50) DEFAULT NULL,
  `operatorName` char(50) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobileaccount`
--

INSERT INTO `mobileaccount` (`ma_id`, `compid`, `accountName`, `accountNo`, `accountType`, `accountOwner`, `operatorName`, `balance`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(2, 'SUN-SP-00003', 'Bkash', 123, NULL, 'Sunshine IT', NULL, 200, 'Active', 8, '2023-07-09 09:05:14', NULL, '2023-12-06 02:39:55'),
(3, 'SUN-AF-00011', 'Rocket', 123, NULL, 'Afsana', NULL, 0, 'Active', 11, '2023-09-23 05:26:54', 11, '2023-09-23 05:30:11'),
(4, 'SUN-DE-00012', 'Nagad22', 123, NULL, 'Sunshine IT', NULL, 0, 'Active', 12, '2023-09-23 08:29:02', 12, '2023-09-23 08:29:07'),
(5, 'SUN-SU-00010', 'Bkash Personal', 1683470965, NULL, 'Sohel Rana', NULL, 0, 'Active', 10, '2023-11-16 18:03:22', NULL, '2023-11-16 18:03:22'),
(6, 'SUN-SP-00003', 'Nagad Personal', 2, NULL, 'Pinnacle Agro', NULL, 0, 'Active', 8, '2024-02-21 13:47:02', NULL, '2024-02-21 13:47:02'),
(7, 'SUN-SP-00003', 'Rocket', 1711335577, NULL, 'Pinnacle Agro', NULL, 0, 'Active', 8, '2024-02-21 13:47:13', NULL, '2024-02-21 13:47:13'),
(8, 'SUN-SP-00003', 'uvjuvbiub', 4646, NULL, '', NULL, 0, 'Active', 8, '2024-04-28 10:27:50', NULL, '2024-04-28 10:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int NOT NULL,
  `ntype` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `order_no` varchar(15) DEFAULT NULL,
  `custName` varchar(100) NOT NULL,
  `custMobile` varchar(15) NOT NULL,
  `custEmail` varchar(100) DEFAULT NULL,
  `custAddres` varchar(200) NOT NULL,
  `tAmount` float NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `compid`, `order_no`, `custName`, `custMobile`, `custEmail`, `custAddres`, `tAmount`, `regdate`) VALUES
(1, 'SUN-SP-00003', 'O-00001', 'Test', '01782561321', '', 'asdasdfas', 90, '2024-05-26 12:28:11'),
(2, 'SUN-SP-00003', 'O-00002', 'Quintessa Fowler', '01827212345', 'kiqir@mailinator.com', 'Similique fugit con', 90, '2024-05-26 12:35:05'),
(3, 'SUN-SP-00003', 'O-00003', 'Phoebe Alexander', 'Nobis dolor', 'kalisefo@mailinator.com', 'Itaque et sed omnis ', 90, '2024-05-26 12:41:17'),
(4, 'SUN-SP-00003', 'O-00004', 'Colleen Sparks', 'In tempora ', 'dijy@mailinator.com', 'Adipisicing saepe du', 90, '2024-05-26 12:42:39'),
(5, 'SUN-SP-00003', 'O-00005', 'Ross Boyd', 'Enim vitae ', 'juqutizep@mailinator.com', 'Suscipit similique d', 90, '2024-05-26 12:43:03'),
(6, 'SUN-SP-00003', 'O-00006', 'Katell Dickson', 'Minus vitae', 'tuwyrav@mailinator.com', 'Eos recusandae Aspe', 90, '2024-05-26 12:44:32'),
(7, 'SUN-SP-00003', 'O-00007', 'Katell Dickson', 'Minus vitae', 'tuwyrav@mailinator.com', 'Eos recusandae Aspe', 90, '2024-05-26 12:45:03'),
(8, 'SUN-SP-00003', 'O-00008', 'Blossom Schultz', 'Aliquid occ', 'rodylebol@mailinator.com', 'Sapiente quos ad lab', 15, '2024-05-26 12:45:15'),
(9, 'SUN-SP-00003', 'O-00009', 'Ali Delacruz', '01736187462', 'suridukoso@mailinator.com', 'Et pariatur Aut dis', 45, '2024-05-30 10:16:27'),
(10, 'SUN-SP-00003', 'O-00010', 'Ali Delacruz', '01736187462', 'suridukoso@mailinator.com', 'Et pariatur Aut dis', 45, '2024-05-30 10:26:29'),
(11, 'SUN-SP-00003', 'O-00011', 'Bevis Pennington', '01736187462', 'hytufyl@mailinator.com', 'Aliqua Nulla blandi', 30.5, '2024-05-30 10:31:32'),
(12, 'SUN-SP-00003', 'O-00012', 'Rudyard Sherman', 'Non eos mi', 'vonev@mailinator.com', 'Assumenda error ipsa', 15, '2024-05-30 10:32:40'),
(13, 'SUN-SP-00003', 'O-00013', 'Carla Carpenter', '01736187462', 'gobihuhut@mailinator.com', 'Nulla esse ratione o', 30, '2024-05-30 13:42:22'),
(14, 'SUN-SP-00003', 'O-00014', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:43:48'),
(15, 'SUN-SP-00003', 'O-00015', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:44:12'),
(16, 'SUN-SP-00003', 'O-00016', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:44:58'),
(17, 'SUN-SP-00003', 'O-00017', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:46:40'),
(18, 'SUN-SP-00003', 'O-00018', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:47:58'),
(19, 'SUN-SP-00003', 'O-00019', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:48:54'),
(20, 'SUN-SP-00003', 'O-00020', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:52:58'),
(21, 'SUN-SP-00003', 'O-00021', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:53:31'),
(22, 'SUN-SP-00003', 'O-00022', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:54:20'),
(23, 'SUN-SP-00003', 'O-00023', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:55:34'),
(24, 'SUN-SP-00003', 'O-00024', 'Frances Chavez', '01736187462', 'qupifapy@mailinator.com', 'Atque dolorem tempor', 15, '2024-05-30 13:56:32'),
(25, 'SUN-SP-00003', 'O-00025', 'asdasd', '01736187462', 'asf@asfd.asf', 'asdasfas', 75, '2024-05-30 14:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `opid` int NOT NULL,
  `oid` int NOT NULL,
  `product` int NOT NULL,
  `quantity` int NOT NULL,
  `sprice` float NOT NULL,
  `tPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`opid`, `oid`, `product`, `quantity`, `sprice`, `tPrice`) VALUES
(1, 1, 23, 5, 18, 90),
(2, 2, 23, 5, 18, 90),
(3, 3, 23, 5, 18, 90),
(4, 4, 23, 5, 18, 90),
(5, 5, 23, 5, 18, 90),
(6, 6, 23, 5, 18, 90),
(7, 7, 23, 5, 18, 90),
(8, 8, 25, 1, 15, 15),
(9, 9, 24, 3, 15, 45),
(10, 10, 24, 3, 15, 45),
(11, 11, 24, 1, 15, 15),
(12, 11, 28, 1, 15.5, 15.5),
(13, 12, 24, 1, 15, 15),
(14, 13, 25, 1, 15, 15),
(15, 13, 24, 1, 15, 15),
(16, 14, 24, 1, 15, 15),
(17, 15, 24, 1, 15, 15),
(18, 16, 24, 1, 15, 15),
(19, 17, 24, 1, 15, 15),
(20, 18, 24, 1, 15, 15),
(21, 19, 24, 1, 15, 15),
(22, 20, 24, 1, 15, 15),
(23, 21, 24, 1, 15, 15),
(24, 22, 24, 1, 15, 15),
(25, 23, 24, 1, 15, 15),
(26, 24, 24, 1, 15, 15),
(27, 25, 24, 5, 15, 75);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageId` int NOT NULL,
  `pageName` varchar(50) DEFAULT NULL,
  `controllerName` varchar(50) DEFAULT NULL,
  `listViewName` varchar(50) DEFAULT NULL,
  `addViewName` varchar(50) DEFAULT NULL,
  `editViewName` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageId`, `pageName`, `controllerName`, `listViewName`, `addViewName`, `editViewName`, `status`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 'Dashboard', 'Home', 'Home', 'Home', 'Home', 'Active', '2019-10-06 16:55:49', 1, NULL, NULL),
(2, 'product', 'Product', 'product', 'product', 'product', 'Active', '2019-10-06 16:56:41', 1, '2020-07-16 16:46:51', NULL),
(3, 'purchase', 'Purchase', 'purchase', 'purchase', 'purchase', 'Active', '2019-10-06 17:02:02', 1, '2020-07-16 16:47:28', NULL),
(4, 'sale_list', 'Sale', 'sale\r\n', 'sale\r\n', 'sale\r\n', 'Active', '2019-10-06 17:02:34', 1, '2020-07-25 20:11:42', NULL),
(5, 'new_sale', 'Sale', 'new_sale', 'new_sale', 'new_sale', 'Active', '2019-10-06 17:02:57', 1, '2020-07-16 16:48:32', NULL),
(6, 'voucher', 'Voucher', 'voucher', 'voucher', 'voucher', 'Active', '2019-10-06 17:03:24', 1, '2020-07-16 16:49:23', NULL),
(7, 'returns', 'Returns', 'returns', 'returns', 'returns', 'Active', '2019-10-06 17:03:41', 1, '2020-07-16 16:49:54', NULL),
(8, 'quotation', 'Quotation', 'quotation', 'quotation', 'quotation', 'Active', '2019-10-06 17:10:01', 1, '2020-07-16 16:50:30', NULL),
(9, 'users', 'Home', 'users', 'users', 'users', 'Active', '2019-10-06 17:10:24', 1, '2020-07-16 16:52:26', NULL),
(10, 'reports', 'Home', 'reports', 'reports', 'reports', 'Active', '2019-10-06 17:11:11', 1, '2020-07-16 16:52:42', NULL),
(11, 'setting', 'Home', 'setting', 'setting', 'setting', 'Active', '2019-10-06 17:11:35', 1, '2020-07-16 16:53:09', NULL),
(12, 'Customer', 'Customer', 'Customer', 'Customer', 'Customer', 'Active', '2019-10-06 17:12:02', 1, '2020-07-16 17:03:17', NULL),
(13, 'Supplier', 'Supplier', 'Supplier', 'Supplier', 'Supplier', 'Active', '2019-10-06 17:15:41', 1, '2020-07-16 17:03:55', NULL),
(14, 'Employee', 'Employee', 'Employee', 'Employee', 'Employee', 'Active', '2019-10-06 17:16:03', 1, '2020-07-16 17:04:48', NULL),
(15, 'User', 'User', 'User', 'User', 'User', 'Active', '2020-07-21 22:14:00', NULL, '2020-07-21 22:14:15', NULL),
(16, 'CashAccount', 'CashAccount', 'CashAccount', 'CashAccount', 'CashAccount', 'Active', '2019-10-06 17:18:21', 1, '2020-07-16 17:07:34', NULL),
(17, 'BankAccount', 'BankAccount', 'BankAccount', 'BankAccount', 'BankAccount', 'Active', '2019-10-06 17:18:45', 1, '2020-07-16 17:07:50', NULL),
(18, 'MobileAccount', 'MobileAccount', 'MobileAccount', 'MobileAccount', 'MobileAccount', 'Active', '2019-10-06 17:19:16', 1, '2020-07-16 17:08:21', NULL),
(19, 'Category', 'Category', 'Category', 'Category', 'Category', 'Active', '2019-12-23 23:15:28', NULL, '2020-07-16 17:10:25', NULL),
(20, 'Cost', 'Cost', 'Cost', 'Cost', 'Cost', 'Active', '2019-10-06 17:20:06', 1, '2020-07-16 17:10:42', NULL),
(21, 'User Lists', 'User', 'User Lists', 'User Lists', 'User Lists', 'Active', '2019-10-06 17:20:28', 1, '2020-07-21 21:50:06', NULL),
(22, 'Payment List', 'Voucher', 'Payment List', 'Payment List', 'Payment List', 'Active', '2019-10-06 17:20:56', 1, '2020-07-21 21:51:01', NULL),
(23, 'Notice', 'Voucher', 'Notice', 'Notice', 'Notice', 'Active', '2019-10-06 17:21:17', 1, '2020-08-03 14:42:37', NULL),
(24, 'Product Stock Report', 'Product', 'Product Stock Report', 'Product Stock Report', 'Product Stock Report', 'Active', '2019-10-06 17:25:28', 1, '2019-12-23 21:24:43', NULL),
(25, 'Company / Warehouse', 'Company', 'Company / Warehouse', 'Company / Warehouse', 'Company / Warehouse', 'Active', '2019-10-06 17:25:52', 1, '2019-12-23 21:24:49', NULL),
(26, 'Supplier', 'Supplier', 'Supplier', 'Supplier', 'Supplier', 'Active', '2019-10-06 17:26:13', 1, '2019-12-23 21:39:00', NULL),
(27, 'Employee', 'Employee', 'Employee', 'Employee', 'Employee', 'Active', '2019-10-06 17:26:38', 1, '2019-12-23 21:39:07', 1),
(28, 'Users', 'User', 'Users', 'Users', 'Users', 'Active', '2019-10-06 17:26:57', 1, '2019-12-23 21:39:14', NULL),
(29, 'Category', 'Category', 'Category', 'Category', 'Category', 'Active', '2019-10-06 17:27:17', 1, '2019-12-23 21:39:19', NULL),
(30, 'Units', 'Category', 'Units', 'Units', 'Units', 'Active', '2019-10-06 17:27:32', 1, '2019-12-23 21:39:23', NULL),
(31, 'Brands', 'Category', 'Brands', 'Brands', 'Brands', 'Active', '2019-10-06 17:27:53', 1, '2019-12-23 21:39:29', NULL),
(32, 'Department', 'Employee', 'Department', 'Department', 'Department', 'Active', '2019-10-06 17:28:21', 1, '2019-12-23 21:39:35', 1),
(33, 'Designation', 'Employee', 'Designation', 'Designation', 'Designation', 'Active', '2019-10-06 17:28:39', 1, '2019-12-23 21:39:41', NULL),
(34, 'Users Role', 'AccessLavels', 'Users Role', 'Users Role', 'Users Role', 'Active', '2019-10-06 17:29:25', 1, '2019-12-23 21:39:47', NULL),
(35, 'Expense Type', 'Cost', 'Expense Type', 'Expense Type', 'Expense Type', 'Active', '2019-10-06 17:30:17', 1, '2019-12-23 21:39:53', NULL),
(36, 'Access Permission', 'AccessPermission', 'Access Permission', 'Access Permission', 'Access Permission', 'Active', '2019-10-06 17:30:49', 1, '2019-12-23 21:40:02', NULL),
(37, 'Company Profile', 'Cost', 'Company Profile', 'Company Profile', 'Company Profile', 'Active', '2019-10-06 17:31:25', 1, '2019-12-23 21:40:09', NULL),
(43, 'Customer', 'Customer', 'Customer', 'Customer', 'Customer', 'Active', '2019-12-23 23:23:52', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_access_relationship`
--

CREATE TABLE `page_access_relationship` (
  `pageAccessRelationId` int NOT NULL,
  `accessLavel` int DEFAULT NULL,
  `pageId` int DEFAULT NULL,
  `isList` tinyint DEFAULT NULL,
  `isAdd` tinyint DEFAULT NULL,
  `isEdit` tinyint DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `page_access_relationship`
--

INSERT INTO `page_access_relationship` (`pageAccessRelationId`, `accessLavel`, `pageId`, `isList`, `isAdd`, `isEdit`, `status`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 1, 1, NULL, NULL, NULL, 'Active', '2019-12-23 22:28:08', NULL, NULL, NULL),
(2, 1, 21, NULL, NULL, NULL, 'Active', '2019-12-23 22:28:11', NULL, '2020-07-21 21:51:33', NULL),
(3, 1, 22, NULL, NULL, NULL, 'Active', '2019-12-23 22:28:15', NULL, '2020-07-21 21:51:38', NULL),
(4, 1, 23, NULL, NULL, NULL, 'Active', '2019-12-23 22:28:18', NULL, '2020-08-03 14:43:01', NULL),
(5, 10, 5, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:17', NULL, '2020-07-21 21:02:47', NULL),
(6, 10, 6, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:20', NULL, '2020-07-21 21:02:58', NULL),
(7, 10, 7, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:23', NULL, '2020-07-21 21:03:03', NULL),
(8, 10, 8, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:25', NULL, '2020-07-21 21:02:52', NULL),
(9, 10, 9, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:29', NULL, '2020-07-21 21:02:43', NULL),
(10, 10, 10, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:31', NULL, '2020-07-21 21:02:31', NULL),
(11, 10, 11, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:34', NULL, '2020-07-21 21:02:20', NULL),
(12, 2, 1, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:36', NULL, '2020-07-16 16:56:25', NULL),
(13, 2, 2, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:39', NULL, '2020-07-16 16:58:29', NULL),
(14, 2, 3, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:42', NULL, '2020-07-16 16:58:41', NULL),
(15, 2, 4, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:44', NULL, '2020-07-16 16:58:50', NULL),
(16, 2, 5, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:47', NULL, '2020-07-16 16:59:10', NULL),
(17, 2, 6, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:49', NULL, '2020-07-16 16:59:27', NULL),
(18, 2, 7, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:52', NULL, '2020-07-16 16:59:38', NULL),
(19, 2, 8, NULL, NULL, 0, 'Active', '2019-12-23 23:17:29', NULL, '2020-07-16 16:59:51', NULL),
(20, 2, 9, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:57', NULL, '2020-07-16 17:00:12', NULL),
(21, 2, 10, NULL, NULL, NULL, 'Active', '2019-12-23 22:30:59', NULL, '2020-07-16 17:00:16', NULL),
(22, 2, 11, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:03', NULL, '2020-07-16 17:00:00', NULL),
(23, 2, 12, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:06', NULL, '2020-07-16 17:02:56', NULL),
(24, 2, 13, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:08', NULL, '2020-07-16 17:03:45', NULL),
(25, 2, 14, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:11', NULL, '2020-07-16 17:04:31', NULL),
(26, 2, 15, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:13', NULL, '2020-07-16 17:05:17', NULL),
(27, 2, 16, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:15', NULL, '2020-07-16 17:08:41', NULL),
(28, 2, 17, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:21', NULL, '2020-07-16 17:08:46', NULL),
(29, 2, 18, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:24', NULL, '2020-07-16 17:08:50', NULL),
(30, 2, 19, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:27', NULL, '2020-07-16 17:11:14', NULL),
(31, 2, 20, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:29', NULL, '2020-07-16 17:11:11', NULL),
(32, 3, 1, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:31', NULL, '2020-07-21 21:19:23', NULL),
(33, 3, 2, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:34', NULL, '2020-07-21 21:19:28', NULL),
(34, 3, 3, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:36', NULL, '2020-07-21 21:19:32', NULL),
(35, 3, 4, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:38', NULL, '2020-07-21 21:35:09', NULL),
(36, 3, 5, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:41', NULL, '2020-07-21 21:35:28', NULL),
(37, 3, 6, NULL, NULL, NULL, 'Active', '2019-12-23 22:31:44', NULL, '2020-07-21 21:35:32', NULL),
(39, 3, 7, NULL, NULL, NULL, 'Active', '2019-12-23 23:24:21', NULL, '2020-07-21 21:35:37', NULL),
(40, 3, 8, NULL, NULL, NULL, NULL, '2020-07-21 21:36:49', NULL, NULL, NULL),
(41, 3, 10, NULL, NULL, NULL, NULL, '2020-07-21 21:36:49', NULL, '2020-07-21 21:37:27', NULL),
(42, 3, 11, NULL, NULL, NULL, NULL, '2020-07-21 21:36:55', NULL, '2020-07-21 21:37:42', NULL),
(43, 3, 16, NULL, NULL, NULL, NULL, '2020-07-21 21:36:55', NULL, '2020-07-21 21:38:00', NULL),
(44, 3, 17, NULL, NULL, NULL, NULL, '2020-07-21 21:40:18', NULL, '2020-07-21 21:40:38', NULL),
(45, 3, 18, NULL, NULL, NULL, NULL, '2020-07-21 21:40:18', NULL, '2020-07-21 21:40:42', NULL),
(46, 3, 19, NULL, NULL, NULL, NULL, '2020-07-21 21:40:20', NULL, '2020-07-21 21:40:46', NULL),
(47, 3, 20, NULL, NULL, NULL, NULL, '2020-07-21 21:40:20', NULL, '2020-07-21 21:40:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_setting`
--

CREATE TABLE `page_setting` (
  `psid` int NOT NULL,
  `sid` int NOT NULL,
  `pName` varchar(100) NOT NULL,
  `pContent` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `page_setting`
--

INSERT INTO `page_setting` (`psid`, `sid`, `pName`, `pContent`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 2, 'Sunshine IT', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Active', 8, '2021-05-04 10:35:21', 1, '2023-07-10 10:32:09'),
(2, 0, 'Contact US', 'Contact Details: \r\n•	FABULOUS TECHNOLOGY \r\n•	Office Address: House No-4, Road No-10, Sector-10, Uttara, Dhaka-1230.\r\n•	Phone Number: +8801842-948484. \r\n•	Email Address: info@fabulous.com.bd\r\n', 'Active', 1, '2021-05-04 10:35:44', 1, '2021-05-09 11:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `preturns`
--

CREATE TABLE `preturns` (
  `prid` int NOT NULL,
  `compid` varchar(45) NOT NULL,
  `prDate` date NOT NULL,
  `prCode` varchar(20) NOT NULL,
  `customerID` int NOT NULL,
  `challanNo` varchar(20) NOT NULL,
  `totalPrice` float NOT NULL,
  `paidPrice` float NOT NULL,
  `accountType` varchar(10) NOT NULL,
  `accountNo` int NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preturns`
--

INSERT INTO `preturns` (`prid`, `compid`, `prDate`, `prCode`, `customerID`, `challanNo`, `totalPrice`, `paidPrice`, `accountType`, `accountNo`, `note`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', '2023-10-26', 'PR-CAS00001', 0, 'PO-CAS00001', 160, 160, 'Cash', 4, '', 8, '2023-10-26 08:47:43', NULL, '2023-10-26 08:47:43'),
(2, 'SUN-SP-00003', '2023-10-28', 'PR-CAS00002', 0, 'PO-CAS00002', 50, 50, 'Cash', 4, '', 8, '2023-10-28 20:15:22', NULL, '2023-10-28 20:15:22'),
(3, 'SUN-SP-00003', '2023-11-01', 'PR-CAS00003', 0, 'PO-CAS00007', 9, 9, 'Cash', 4, '', 8, '2023-11-01 17:33:14', NULL, '2023-11-01 17:33:14'),
(4, 'SUN-SP-00003', '2023-11-12', 'PR-CAS00004', 1, 'PO-CAS00008', 50, 50, 'Cash', 4, '', 8, '2023-11-12 18:06:21', NULL, '2023-11-12 18:06:21'),
(6, 'SUN-SP-00003', '2024-04-10', 'PR-CAS00005', 0, 'PO-CAS00022', 10, 10, 'Cash', 4, '', 8, '2024-04-10 08:17:39', NULL, '2024-04-10 08:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `preturns_product`
--

CREATE TABLE `preturns_product` (
  `prpid` int NOT NULL,
  `prid` int NOT NULL,
  `product` int NOT NULL,
  `quantity` int NOT NULL,
  `pPrice` float NOT NULL,
  `tPrice` float NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preturns_product`
--

INSERT INTO `preturns_product` (`prpid`, `prid`, `product`, `quantity`, `pPrice`, `tPrice`, `regby`, `regdate`) VALUES
(1, 4, 2, 5, 10, 50, 8, '2023-11-12 18:06:21'),
(3, 6, 2, 1, 10, 10, 8, '2024-04-10 08:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `type` enum('service','product') DEFAULT NULL,
  `productcode` varchar(20) DEFAULT NULL,
  `categoryID` int DEFAULT NULL,
  `scategory` int DEFAULT NULL,
  `brand` int DEFAULT NULL,
  `unit` int DEFAULT NULL,
  `pprice` float NOT NULL,
  `sprice` float NOT NULL,
  `wprice` float NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `alertqty` int NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `spstatus` int NOT NULL DEFAULT '2',
  `details` text,
  `specifict` text,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `compid`, `productName`, `type`, `productcode`, `categoryID`, `scategory`, `brand`, `unit`, `pprice`, `sprice`, `wprice`, `status`, `alertqty`, `image`, `spstatus`, `details`, `specifict`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SU-00010', 'Software After Sales Service#', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 2000, 0, 'Active', 0, '', 0, '<p>gffg</p>\r\n', '', 10, '2023-11-07 22:09:14', 10, '2023-11-16 17:33:38'),
(2, 'SUN-SP-00003', 'Test product', 'product', 'P-CAS00001', 2, 0, 8, 2, 10, 20, 0, 'Active', 0, '', 2, '', '', 8, '2023-11-10 11:30:33', NULL, '2023-11-10 11:30:33'),
(4, 'SUN-SU-00010', 'POS Software', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 10000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:03:56', NULL, '2023-11-14 20:03:56'),
(5, 'SUN-SU-00010', 'Accounting Software', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 55000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:04:23', NULL, '2023-11-14 20:04:23'),
(6, 'SUN-SU-00010', 'Ecommerce Website Development', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 10000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:04:51', NULL, '2023-11-14 20:04:51'),
(7, 'SUN-SU-00010', 'Dynamic  Website Development', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 12000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:05:13', NULL, '2023-11-14 20:05:13'),
(8, 'SUN-SU-00010', 'Domain Name Registration', 'product', 'P-SUN00007', 3, 0, 0, 1, 1100, 1200, 0, 'Active', 0, '', 2, '', '', 10, '2023-11-14 20:06:04', NULL, '2023-11-14 20:06:04'),
(9, 'SUN-SU-00010', 'Hosting Server', 'product', 'P-SUN00008', 4, 0, 0, 1, 1000, 1200, 0, 'Active', 0, '', 2, '', '', 10, '2023-11-14 20:06:40', NULL, '2023-11-14 20:06:40'),
(10, 'SUN-SU-00010', 'Courier Management Software', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 0, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:07:18', NULL, '2023-11-14 20:07:18'),
(11, 'SUN-SU-00010', 'Inventory Management Software', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 10000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-14 20:08:34', NULL, '2023-11-14 20:08:34'),
(12, 'SUN-SU-00010', 'Customized Software Development', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 15000, 0, 'Active', 0, '123.png', 0, '', '', 10, '2023-11-14 20:09:16', 10, '2023-11-14 20:20:23'),
(13, 'SUN-SU-00010', 'Customized Accounting Software ', 'service', 'S-SUN00012', 1, 0, NULL, 1, 0, 65000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-15 15:03:11', NULL, '2023-11-15 15:03:11'),
(14, 'SUN-SP-00003', 'new Test product', 'product', 'P-CAS00003', 2, 4, 7, 2, 2, 3, 0, 'Active', 400, 'Untitled1.png', 2, '<p>Test</p>\r\n', 'Testy', 8, '2023-11-19 15:54:55', 8, '2023-11-19 15:55:59'),
(15, 'SUN-SP-00003', 'naaa', 'product', 'P-CAS00014', 2, 3, 7, 2, 3, 4, 0, 'Active', 6, '370569747_721835536623470_7987489714894889141_n.jpg', 2, '<p>rrr</p>\r\n', 'tttt', 8, '2023-11-19 15:58:03', 8, '2023-11-19 16:33:59'),
(16, 'SUN-SU-00010', 'Dealership Management Software', 'service', 'S-SUN00012', 1, NULL, NULL, 1, 0, 10000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-19 16:12:03', NULL, '2023-11-19 16:12:03'),
(17, 'SUN-SP-00003', 'Test product 6 ', 'product', 'P-CAS00015', 2, 5, 7, 2, 6, 12, 0, 'Active', 28, '', 2, '', '', 8, '2023-11-19 17:29:32', 8, '2024-04-17 10:31:30'),
(18, 'SUN-SU-00010', 'Apps Development', 'service', 'S-SUN00012', 1, NULL, NULL, 1, 0, 40000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-20 20:37:02', NULL, '2023-11-20 20:37:02'),
(19, 'SUN-SU-00010', 'Manufacture Software', 'service', 'S-SUN00012', 1, NULL, NULL, 1, 0, 60000, 0, 'Active', 0, '', 2, '', NULL, 10, '2023-11-20 20:41:16', NULL, '2023-11-20 20:41:16'),
(20, 'SUN-SP-00003', 'test Product 777', 'product', 'P-CAS00017', 2, 5, 8, 2, 0, 12, 0, 'Active', 0, '', 2, '', '', 8, '2023-11-26 16:51:05', 8, '2023-11-29 16:25:14'),
(21, 'SUN-SP-00003', 'Rice 1 Kg', 'product', 'P-CAS00020', 2, 5, 7, 2, 10, 20, 0, 'Active', 5, '', 2, '', '', 8, '2024-01-10 19:08:56', NULL, '2024-01-10 19:08:56'),
(22, 'SUN-RA-00015', 'Bashundhara Soyabean Oil 1 Liter', 'product', 'P-RAN00001', 6, 0, 0, 3, 10, 20, 0, 'Active', 5, 'Bashundhara-Fortified-Soyabeen-Oil-1-Ltr-7.jpg', 2, 'Description\r\nBuy Bashundhara Fortified Soybean Oil 1 Litre from Daily Bazar.\r\n\r\nBrand: Bashundhara\r\nWeight: 1 litre\r\nType: Fortified Soyabean Oil', 'Brand: Bashundhara\r\nWeight: 1 litre\r\nType: Fortified Soyabean Oil', 15, '2024-02-23 10:33:38', NULL, '2024-02-23 10:33:38'),
(23, 'SUN-SP-00003', 'BOP W18L KEY 48g AZM PP Woven Sack', 'product', 'P-CAS00021', 0, 0, 0, 2, 14.25, 18, 0, 'Active', 14, '', 1, '', '', 8, '2024-02-27 13:47:28', NULL, '2024-02-27 13:47:28'),
(24, 'SUN-SP-00003', 'TN 18 29L 40g AZ5 PP Woven Sack', 'product', 'P-CAS00023', 7, 0, 0, 0, 0, 15, 0, 'Active', 0, '', 1, '', '', 8, '2024-02-27 13:49:30', NULL, '2024-02-27 13:49:30'),
(25, 'SUN-SP-00003', 'TN 18 29L 50g PG2 PP Woven Sack', 'product', 'P-CAS00024', 8, 0, 0, 2, 11.75, 15, 0, 'Active', 0, '', 1, '', '', 8, '2024-02-27 13:51:54', NULL, '2024-02-27 13:51:54'),
(27, 'SUN-SP-00003', ' W 18 29L 50g PG2 PP Woven Sack', 'product', 'P-CAS00026', 7, 0, 0, 2, 11.5, 15, 0, 'Active', 0, '', 2, '', '', 8, '2024-02-27 13:57:13', 8, '2024-02-27 14:04:41'),
(28, 'SUN-SP-00003', ' W 20 28L 44g NZ PP Woven Sack', 'product', 'P-CAS00027', 9, 0, 0, 2, 11, 15.5, 0, 'Active', 0, '', 1, '', '', 8, '2024-02-27 14:06:40', NULL, '2024-02-27 14:06:40'),
(30, 'SUN-RA-00015', 'Product Nam 333', 'product', 'P-RAN00022', 6, 0, 0, 0, 10, 20, 0, 'Active', 0, '', 2, '', '', 15, '2024-02-29 19:36:49', NULL, '2024-02-29 19:36:49'),
(32, 'SUN-SP-00003', '500 Miter 4 Fit Roll', 'product', 'P-CAS00031', 2, 5, 0, 2, 8, 10, 0, 'Active', 0, '', 2, '', '', 8, '2024-03-14 10:07:05', NULL, '2024-03-14 10:07:05'),
(33, 'SUN-SP-00003', 'Tanvir_Test', 'product', 'P-CAS00032', 2, 2, 3, 2, 12, 12, 0, 'Active', 2, 'logo3.png', 2, '<p>12</p>\r\n', '12', 8, '2024-04-08 05:09:20', 8, '2024-04-17 11:05:59'),
(44, 'SUN-SP-00003', 'TV Servicing ', 'service', 'S-CAS00012', 2, NULL, NULL, 2, 0, 300, 0, 'Active', 0, '', 2, '', NULL, 8, '2024-04-17 15:42:35', NULL, '2024-04-17 15:42:35'),
(46, 'SUN-SP-00003', 'lite therapy', 'service', 'S-CAS00012', 14, NULL, NULL, 2, 0, 10, 0, 'Active', 0, '', 2, '', NULL, 8, '2024-04-28 10:21:50', NULL, '2024-04-28 10:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `productId` int NOT NULL,
  `categoryId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `product_type`, `image`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'লাইফ স্টাইল', 'images_(1).jpg', 'Active', 0, '2021-07-16 06:32:59', 110, '2021-07-16 06:32:59'),
(2, 'ইলেকট্রনিক্স', 'electronics.png', 'Active', 0, '2020-10-29 07:09:49', 1, '2020-10-29 07:09:49'),
(3, 'ডকুমেন্ট', 'doc.png', 'Active', 1, '2020-10-29 07:09:49', 1, '2020-10-29 07:09:49'),
(4, 'প্যাকেজ', 'package.png', 'Active', 1, '2020-10-29 07:09:49', NULL, '2020-10-29 07:09:49'),
(5, 'জিনিসপত্র', 'accessories.png', 'Active', 1, '2020-10-29 07:09:49', NULL, '2020-10-29 07:09:49'),
(6, 'তরল', 'licud.jpg', 'Active', 1, '2020-10-29 07:09:49', NULL, '2020-10-29 07:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `purchaseDate` date DEFAULT NULL,
  `challanNo` varchar(20) DEFAULT NULL,
  `supplier` int DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `paidAmount` float DEFAULT NULL,
  `pAmount` float NOT NULL,
  `due` float NOT NULL,
  `sCost` float DEFAULT NULL,
  `vCost` varchar(20) DEFAULT NULL,
  `vType` varchar(10) DEFAULT NULL,
  `vAmount` float DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `disType` varchar(10) DEFAULT NULL,
  `disAmount` float DEFAULT NULL,
  `accountType` varchar(15) DEFAULT NULL,
  `accountNo` int DEFAULT NULL,
  `terms` text,
  `note` varchar(100) DEFAULT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `compid`, `purchaseDate`, `challanNo`, `supplier`, `totalPrice`, `paidAmount`, `pAmount`, `due`, `sCost`, `vCost`, `vType`, `vAmount`, `discount`, `disType`, `disAmount`, `accountType`, `accountNo`, `terms`, `note`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', '2023-10-26', 'PO-CAS00001', 1, 235000, 125000, 125000, 110000, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-10-26 04:51:26', NULL, '2023-10-26 04:51:26'),
(2, 'SUN-SP-00003', '2023-10-28', 'PO-CAS00002', 2, 1000, 1000, 1000, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-10-28 19:53:01', NULL, '2023-10-28 19:53:01'),
(3, 'SUN-SP-00003', '2023-10-28', 'PO-CAS00003', 2, 800, 800, 800, 0, 0, '0', '0', 0, '0', '0', 0, 'Bank', 2, '', '', 8, '2023-10-28 20:02:34', NULL, '2023-10-28 20:02:34'),
(4, 'SUN-SP-00003', '2023-11-01', 'PO-CAS00004', 1, 50, 50, 50, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-01 17:11:12', NULL, '2023-11-01 17:11:12'),
(5, 'SUN-SP-00003', '2023-11-01', 'PO-CAS00005', 1, 60, 60, 60, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-01 17:11:34', NULL, '2023-11-01 17:11:34'),
(6, 'SUN-SP-00003', '2023-11-01', 'PO-CAS00006', 1, 80, 80, 80, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-01 17:11:56', NULL, '2023-11-01 17:11:56'),
(7, 'SUN-SP-00003', '2023-11-01', 'PO-CAS00007', 1, 90, 90, 90, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-01 17:23:36', NULL, '2023-11-01 17:23:36'),
(8, 'SUN-SP-00003', '2023-11-12', 'PO-CAS00008', 1, 100, 100, 100, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-12 18:06:00', NULL, '2023-11-12 18:06:00'),
(9, 'SUN-SU-00010', '2023-11-16', 'PO-SUN00001', 2, 1200, 0, 0, 1200, 0, '0', '0', 0, '0', '0', 0, 'Cash', 3, '', '', 10, '2023-11-16 18:17:58', NULL, '2023-11-16 18:17:58'),
(10, 'SUN-SP-00003', '2023-11-19', 'PO-CAS00009', 1, 50, 0, 0, 50, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-19 17:30:16', NULL, '2023-11-19 17:30:16'),
(11, 'SUN-SP-00003', '2023-11-19', 'PO-CAS00010', 1, 60, 0, 0, 60, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-19 17:30:30', NULL, '2023-11-19 17:30:30'),
(12, 'SUN-SP-00003', '2023-11-19', 'PO-CAS00011', 1, 80, 0, 0, 80, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-19 17:30:47', NULL, '2023-11-19 17:30:47'),
(13, 'SUN-SP-00003', '2023-11-23', 'PO-CAS00012', 1, 110, 110, 110, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-23 21:19:10', NULL, '2023-11-23 21:19:10'),
(14, 'SUN-SP-00003', '2023-11-26', 'PO-CAS00013', 1, 50, 0, 0, 50, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-26 16:51:33', NULL, '2023-11-26 16:51:33'),
(15, 'SUN-SP-00003', '2023-11-26', 'PO-CAS00014', 1, 80, 0, 0, 80, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-26 16:51:52', NULL, '2023-11-26 16:51:52'),
(16, 'SUN-SP-00003', '2023-11-26', 'PO-CAS00015', 1, 90, 0, 0, 90, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-26 16:52:07', NULL, '2023-11-26 16:52:07'),
(17, 'SUN-SP-00003', '2023-11-29', 'PO-CAS00016', 1, 30, 0, 0, 30, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2023-11-29 16:59:48', NULL, '2023-11-29 16:59:48'),
(18, 'SUN-SU-00010', '2023-11-29', 'PO-SUN00002', 2, 4610, 4610, 4610, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 3, '', 'amar courier', 10, '2023-11-29 18:02:45', NULL, '2023-11-29 18:02:45'),
(19, 'SUN-SP-00003', '2024-01-10', 'PO-CAS00017', 3, 100, 100, 100, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2024-01-10 19:10:50', NULL, '2024-01-10 19:10:50'),
(20, 'SUN-SP-00003', '2024-01-10', 'PO-CAS00018', 3, 150, 150, 150, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2024-01-10 19:11:17', NULL, '2024-01-10 19:11:17'),
(21, 'SUN-SP-00003', '2024-01-10', 'PO-CAS00019', 3, 200, 200, 200, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2024-01-10 19:11:38', NULL, '2024-01-10 19:11:38'),
(22, 'SUN-SU-00010', '2024-01-17', 'PO-SUN00003', 2, 1000, 1000, 1000, 0, 0, '0', '0', 0, '0', '0', 0, 'Cash', 3, '', '', 10, '2024-01-17 21:21:14', NULL, '2024-01-17 21:21:14'),
(23, 'SUN-RA-00015', '2024-02-23', 'PO-RAN00001', 4, 100, 50, 50, 50, 5, '5', '5', 5, '10', '0', 10, 'Cash', 5, '', '', 15, '2024-02-23 10:37:27', NULL, '2024-02-23 10:37:27'),
(26, 'SUN-SP-00003', '2024-04-08', 'PO-CAS00021', 1, 27.44, 28, 28, -0.56, 2, '2', '2', 2, '2%', '%', 0.56, 'Cash', 4, '', '', 8, '2024-04-08 05:11:38', NULL, '2024-04-08 05:11:38'),
(27, 'SUN-SP-00003', '2024-04-10', 'PO-CAS00022', 1, 50, 500, 0, -450, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2024-04-10 08:16:37', 8, '2024-04-10 08:17:03'),
(28, 'SUN-SP-00003', '2024-04-17', 'PO-CAS00023', 3, 20, 0, 0, 20, 0, '0', '0', 0, '0', '0', 0, 'Cash', 4, '', '', 8, '2024-04-17 10:59:35', NULL, '2024-04-17 10:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE `purchase_payment` (
  `pp_id` int NOT NULL,
  `pur_id` int NOT NULL,
  `amount` float NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `accountNo` varchar(50) NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_payment`
--

INSERT INTO `purchase_payment` (`pp_id`, `pur_id`, `amount`, `accountType`, `accountNo`, `regby`, `regdate`) VALUES
(1, 24, 60000, 'Cash', '4', 8, '2024-04-10 08:13:50'),
(2, 27, 500, 'Cash', '4', 8, '2024-04-10 08:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `pp_id` int NOT NULL,
  `purchaseID` int DEFAULT NULL,
  `productID` int DEFAULT NULL,
  `pprice` float DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`pp_id`, `purchaseID`, `productID`, `pprice`, `quantity`, `totalPrice`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 8, 2, 10, 10, 100, 8, '2023-11-12 18:06:00', NULL, '2023-11-12 18:06:00'),
(2, 9, 8, 1200, 1, 1200, 10, '2023-11-16 18:17:58', NULL, '2023-11-16 18:17:58'),
(3, 10, 17, 5, 10, 50, 8, '2023-11-19 17:30:16', NULL, '2023-11-19 17:30:16'),
(4, 11, 17, 6, 10, 60, 8, '2023-11-19 17:30:30', NULL, '2023-11-19 17:30:30'),
(5, 12, 17, 8, 10, 80, 8, '2023-11-19 17:30:47', NULL, '2023-11-19 17:30:47'),
(6, 13, 17, 11, 10, 110, 8, '2023-11-23 21:19:10', NULL, '2023-11-23 21:19:10'),
(7, 14, 20, 5, 10, 50, 8, '2023-11-26 16:51:33', NULL, '2023-11-26 16:51:33'),
(8, 15, 20, 8, 10, 80, 8, '2023-11-26 16:51:52', NULL, '2023-11-26 16:51:52'),
(9, 16, 20, 9, 10, 90, 8, '2023-11-26 16:52:07', NULL, '2023-11-26 16:52:07'),
(10, 17, 2, 10, 3, 30, 8, '2023-11-29 16:59:48', NULL, '2023-11-29 16:59:48'),
(11, 18, 8, 1610, 1, 1610, 10, '2023-11-29 18:02:45', NULL, '2023-11-29 18:02:45'),
(12, 18, 9, 3000, 1, 3000, 10, '2023-11-29 18:02:45', NULL, '2023-11-29 18:02:45'),
(13, 19, 21, 10, 10, 100, 8, '2024-01-10 19:10:50', NULL, '2024-01-10 19:10:50'),
(14, 20, 21, 15, 10, 150, 8, '2024-01-10 19:11:17', NULL, '2024-01-10 19:11:17'),
(15, 21, 21, 20, 10, 200, 8, '2024-01-10 19:11:38', NULL, '2024-01-10 19:11:38'),
(16, 22, 4, 1000, 1, 1000, 10, '2024-01-17 21:21:14', NULL, '2024-01-17 21:21:14'),
(17, 23, 22, 10, 10, 100, 15, '2024-02-23 10:37:27', NULL, '2024-02-23 10:37:27'),
(18, 24, 24, 10.3, 6000, 61800, 8, '2024-02-27 14:19:02', NULL, '2024-02-27 14:19:02'),
(22, 26, 33, 12, 2, 24, 8, '2024-04-08 05:11:38', NULL, '2024-04-08 05:11:38'),
(23, 27, 2, 10, 5, 50, 8, '2024-04-10 08:16:37', NULL, '2024-04-10 08:16:37'),
(24, 28, 2, 10, 2, 20, 8, '2024-04-17 10:59:35', NULL, '2024-04-17 10:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `qutid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `qinvoice` varchar(20) NOT NULL,
  `quotationDate` date NOT NULL,
  `customerID` int NOT NULL,
  `totalPrice` float NOT NULL,
  `totalQuantity` varchar(20) NOT NULL,
  `message` mediumtext NOT NULL,
  `terms` text NOT NULL,
  `note` text,
  `file` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`qutid`, `compid`, `qinvoice`, `quotationDate`, `customerID`, `totalPrice`, `totalQuantity`, `message`, `terms`, `note`, `file`, `regby`, `regdate`, `upby`, `update`) VALUES
(3, 'SUN-SP-00003', 'Q-CAS00001', '2023-10-26', 27, 80, '1', '', '', '', 'System_Architecture_LARMS.pdf', 8, '2023-10-26 05:34:40', 8, '2023-10-26 05:46:13'),
(4, 'SUN-SP-00003', 'Q-CAS00002', '2023-10-26', 17, 80, '1', '', '', '', 'hq720.jpg', 8, '2023-10-26 05:53:37', NULL, '2023-10-26 05:53:37'),
(5, 'SUN-SP-00003', 'Q-CAS00003', '2023-10-28', 27, 230, '2', 'Dear Sir, Good Day! Welcome To Sunshine IT,i hope you are well. Please Check Attach link for PSO Software Proposal From Sunshine IT', '<p>TERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONSTERMS &amp; CONDITIONS</p>\r\n', '', 'logo.jpg', 8, '2023-10-28 20:06:17', NULL, '2023-10-28 20:06:17'),
(7, 'SUN-SU-00010', 'Q-SUN00001', '2023-11-14', 12, 30000, '1', '', '<p>Demo Website#&nbsp;https://techtackbd.com/</p>\r\n\r\n<p>Development Time: 40 Days</p>\r\n\r\n<p>January 1st Week a Delivery Dite hobe</p>\r\n\r\n<p>PC Build option ta bad jabe</p>\r\n\r\n<p>30k budget maje Kaj comolete kore daoya hobe</p>\r\n\r\n<p>&nbsp;</p>\r\n', '30k budget maje Kaj comolete kore daoya hobe', '', 10, '2023-11-14 20:13:20', NULL, '2023-11-14 20:13:20'),
(8, 'SUN-SU-00010', 'Q-SUN00002', '2023-11-14', 13, 15000, '1', 'Dear Sir, Advance Payment Work Order Confirmation 5000 Taka  Middle Payment (When Work 50-60% Complete) 5000 Taka  Delivery Payment (After Work Complete and test) 5000 Taka', '<p><strong>Advance Payment Work Order Confirmation 5000 Taka</strong></p>\r\n\r\n<p><span class=\"marker\"><em><strong>Middle Payment (When Work 50-60% Complete) 5000 Taka</strong></em></span></p>\r\n\r\n<p>Delivery Payment (After Work Complete and test) 5000 Taka</p>\r\n', 'Middle Payment (When Work 50-60% Complete) 5000 Taka', '', 10, '2023-11-14 20:18:11', NULL, '2023-11-14 20:18:11'),
(9, 'SUN-SU-00010', 'Q-SUN00003', '2023-11-20', 18, 65000, '2', 'Dear Sir, Good Day! Welcome To Sunshine IT,i hope you are well. Please Check Attach link for Manufacture Software Proposal From Sunshine IT', '<p>Manufacture Software&nbsp;</p>\r\n\r\n<p>60-65000 Takar maje Sopftware Dite hobe</p>\r\n', 'Next Meeting a Owner sathe bosa', '', 10, '2023-11-20 20:42:33', NULL, '2023-11-20 20:42:33'),
(10, 'SUN-SU-00010', 'Q-SUN00004', '2023-11-20', 19, 157800, '16', 'Dear Sir, Good Day! Welcome To Sunshine IT,i hope you are well. Please Check Attach link for Software Proposal From Sunshine IT', '<p>4 ta website + 4 ta Software</p>\r\n', '', '', 10, '2023-11-20 20:46:12', NULL, '2023-11-20 20:46:12'),
(11, 'SUN-SP-00003', 'Q-CAS00004', '2024-04-29', 62, 3, '3', '', '', 'sdssss', '22.jpg', 8, '2024-04-29 06:15:47', NULL, '2024-04-29 06:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_product`
--

CREATE TABLE `quotation_product` (
  `qutpid` int NOT NULL,
  `qutid` int NOT NULL,
  `productID` int NOT NULL,
  `salePrice` float NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `totalPrice` float NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_product`
--

INSERT INTO `quotation_product` (`qutpid`, `qutid`, `productID`, `salePrice`, `quantity`, `totalPrice`, `regby`, `regdate`, `upby`, `update`) VALUES
(2, 7, 6, 30000, '1', 30000, 10, '2023-11-14 20:13:20', NULL, '2023-11-14 20:13:20'),
(3, 8, 12, 15000, '1', 15000, 10, '2023-11-14 20:18:11', NULL, '2023-11-14 20:18:11'),
(4, 9, 19, 60000, '1', 60000, 10, '2023-11-20 20:42:33', NULL, '2023-11-20 20:42:33'),
(5, 9, 8, 5000, '1', 5000, 10, '2023-11-20 20:42:33', NULL, '2023-11-20 20:42:33'),
(6, 10, 12, 25000, '4', 100000, 10, '2023-11-20 20:46:12', NULL, '2023-11-20 20:46:12'),
(7, 10, 7, 12000, '4', 48000, 10, '2023-11-20 20:46:12', NULL, '2023-11-20 20:46:12'),
(8, 10, 9, 1250, '4', 5000, 10, '2023-11-20 20:46:12', NULL, '2023-11-20 20:46:12'),
(9, 10, 8, 1200, '4', 4800, 10, '2023-11-20 20:46:12', NULL, '2023-11-20 20:46:12'),
(10, 11, 2, 1, '3', 3, 8, '2024-04-29 06:15:47', NULL, '2024-04-29 06:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnId` int NOT NULL,
  `returnDate` date DEFAULT NULL,
  `compid` varchar(20) DEFAULT NULL,
  `customerID` int NOT NULL,
  `rid` varchar(20) DEFAULT NULL,
  `invoice` varchar(20) NOT NULL,
  `totalPrice` float NOT NULL,
  `paidAmount` float NOT NULL,
  `scharge` varchar(15) NOT NULL,
  `sctype` varchar(5) NOT NULL,
  `scAmount` float DEFAULT NULL,
  `accountType` varchar(20) DEFAULT NULL,
  `accountNo` int DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returnId`, `returnDate`, `compid`, `customerID`, `rid`, `invoice`, `totalPrice`, `paidAmount`, `scharge`, `sctype`, `scAmount`, `accountType`, `accountNo`, `note`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, '2023-10-28', 'SUN-SP-00003', 19, 'R-CAS00001', 'INV-CAS00009', 100, 100, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2023-10-28 20:17:37', NULL, '2023-10-28 20:17:37'),
(2, '2023-10-30', 'SUN-SP-00003', 27, 'R-CAS00002', 'INV-CAS00010', 450, 450, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2023-10-30 08:55:34', NULL, '2023-10-30 08:55:34'),
(3, '2023-11-01', 'SUN-SP-00003', 29, 'R-CAS00003', 'INV-CAS00013', 10, 10, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2023-11-01 17:32:40', NULL, '2023-11-01 17:32:40'),
(4, '2023-11-12', 'SUN-SP-00003', 5, 'R-CAS00004', 'INV-CAS00017', 20, 20, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2023-11-12 18:06:55', NULL, '2023-11-12 18:06:55'),
(5, '2023-11-26', 'SUN-SP-00003', 5, 'R-CAS00005', 'INV-CAS00039', 50, 50, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2023-11-26 16:53:52', NULL, '2023-11-26 16:53:52'),
(6, '2024-02-23', 'SUN-RA-00015', 50, 'R-RAN00001', 'INV-RAN00001', 40, 40, '0', '', 0, 'Cash', 5, '', 'Active', 15, '2024-02-23 10:45:00', NULL, '2024-02-23 10:45:00'),
(7, '2024-04-10', 'SUN-SP-00003', 49, 'R-CAS00006', 'INV-CAS00085', 20, 20, '0', '', 0, 'Cash', 4, '', 'Active', 8, '2024-04-10 08:30:15', NULL, '2024-04-10 08:30:15'),
(8, '2024-04-23', 'SUN-SP-00003', 53, 'R-CAS00007', 'INV-CAS00091', 20, 15, '5', '5', 5, 'Cash', 4, '', 'Active', 8, '2024-04-23 21:54:19', NULL, '2024-04-23 21:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `returns_product`
--

CREATE TABLE `returns_product` (
  `rp_id` int NOT NULL,
  `compid` varchar(20) DEFAULT NULL,
  `rt_id` int NOT NULL,
  `productID` int NOT NULL,
  `quantity` float DEFAULT NULL,
  `salePrice` float NOT NULL,
  `totalPrice` float NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_product`
--

INSERT INTO `returns_product` (`rp_id`, `compid`, `rt_id`, `productID`, `quantity`, `salePrice`, `totalPrice`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 4, 2, 1, 20, 20, 8, '2023-11-12 18:06:55', NULL, '2023-11-12 18:06:55'),
(2, 'SUN-SP-00003', 5, 20, 5, 10, 50, 8, '2023-11-26 16:53:52', NULL, '2023-11-26 16:53:52'),
(3, 'SUN-RA-00015', 6, 22, 2, 20, 40, 15, '2024-02-23 10:45:00', NULL, '2024-02-23 10:45:00'),
(4, 'SUN-SP-00003', 7, 2, 1, 20, 20, 8, '2024-04-10 08:30:15', NULL, '2024-04-10 08:30:15'),
(5, 'SUN-SP-00003', 8, 2, 1, 20, 20, 8, '2024-04-23 21:54:19', NULL, '2024-04-23 21:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL,
  `saleDate` date DEFAULT NULL,
  `customerID` int DEFAULT NULL,
  `totalAmount` float DEFAULT NULL,
  `paidAmount` float DEFAULT NULL,
  `pAmount` float NOT NULL,
  `dueamount` float NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `discountType` varchar(5) DEFAULT NULL,
  `discountAmount` float DEFAULT NULL,
  `sCost` float DEFAULT NULL,
  `vCost` varchar(10) DEFAULT NULL,
  `vType` varchar(5) DEFAULT NULL,
  `vAmount` float DEFAULT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `accountNo` varchar(50) DEFAULT NULL,
  `terms` text,
  `note` mediumtext,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 for general 2 for pos sale',
  `regby` int DEFAULT NULL,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `compid`, `invoice_no`, `saleDate`, `customerID`, `totalAmount`, `paidAmount`, `pAmount`, `dueamount`, `discount`, `discountType`, `discountAmount`, `sCost`, `vCost`, `vType`, `vAmount`, `accountType`, `accountNo`, `terms`, `note`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'INV-CAS00001', '2023-10-26', 1, 810, 20, 20, 790, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-26 10:52:32', NULL, '2023-10-26 10:52:32'),
(2, 'SUN-SP-00003', 'INV-CAS00001', '2023-10-26', 17, 80, 0, 0, 80, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-26 12:11:27', NULL, '2023-10-26 12:11:27'),
(3, 'SUN-SP-00003', 'INV-CAS00003', '2023-10-26', 2, 280, 0, 0, 280, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-26 12:12:33', NULL, '2023-10-26 12:12:33'),
(4, 'SUN-SP-00003', 'INV-CAS00004', '2023-10-26', 27, 660, 0, 0, 660, '30', '0', 30, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-26 14:24:14', NULL, '2023-10-26 14:24:14'),
(5, 'SUN-SP-00003', 'INV-CAS00005', '2023-10-28', 19, 200, 200, 200, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-29 01:54:09', NULL, '2023-10-29 01:54:09'),
(6, 'SUN-SP-00003', 'INV-CAS00006', '2023-10-28', 19, 200, 100, 100, 100, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-29 01:54:44', NULL, '2023-10-29 01:54:44'),
(7, 'SUN-SP-00003', 'INV-CAS00007', '2023-10-28', 27, 300, 0, 0, 300, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-29 02:09:30', NULL, '2023-10-29 02:09:30'),
(8, 'SUN-SP-00003', 'INV-CAS00008', '2023-10-28', 19, 300, 0, 0, 300, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-29 02:09:52', NULL, '2023-10-29 02:09:52'),
(9, 'SUN-SP-00003', 'INV-CAS00009', '2023-10-28', 19, 100, 0, 0, 100, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-29 02:17:13', NULL, '2023-10-29 02:17:13'),
(10, 'SUN-SP-00003', 'INV-CAS00010', '2023-10-30', 27, 450, 0, 0, 450, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-30 14:54:44', NULL, '2023-10-30 14:54:44'),
(11, 'SUN-SP-00003', 'INV-CAS00011', '2023-10-30', 28, 1000, 0, 0, 1000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-10-30 23:48:32', NULL, '2023-10-30 23:48:32'),
(12, 'SUN-SP-00003', 'INV-CAS00012', '2023-11-01', 29, 100, 100, 100, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-01 23:15:18', NULL, '2023-11-01 23:15:18'),
(13, 'SUN-SP-00003', 'INV-CAS00013', '2023-11-01', 29, 100, 0, 0, 100, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-01 23:15:32', NULL, '2023-11-01 23:15:32'),
(14, 'SUN-SP-00003', 'INV-CAS00014', '2023-11-06', 29, 4000, 0, 0, 4000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-06 10:31:33', NULL, '2023-11-06 10:31:33'),
(15, 'SUN-SP-00003', 'INV-ROH00015', '2023-11-10', 5, 20, 20, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-10 18:00:49', NULL, '2023-11-10 18:00:49'),
(16, 'SUN-SP-00003', 'INV-ROH00016', '2023-11-10', 5, 21, 40, 40, -19, '0', '0', 0, 1, '', '', 0, 'Cash', '4', '', 'By Sunshine', 1, 8, '2023-11-10 18:01:47', 8, '2024-04-20 15:17:58'),
(17, 'SUN-SP-00003', 'INV-CAS00017', '2023-11-12', 5, 40, 0, 0, 40, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-13 00:06:37', 8, '2024-03-26 15:48:36'),
(18, 'SUN-SP-00003', 'INV-CAS00018', '2023-11-12', 8, 33, 30, 30, 3, '2', '2', 2, 10, '5', '5', 5, 'Cash', '4', '', '', 1, 8, '2023-11-13 00:11:29', NULL, '2023-11-13 00:11:29'),
(19, 'SUN-SP-00003', 'INV-CAS00019', '2023-11-12', 8, 200, 100, 100, 100, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-13 00:12:03', NULL, '2023-11-13 00:12:03'),
(20, 'SUN-SP-00003', 'INV-CAS00020', '2023-11-12', 8, 300, 300, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-13 00:27:12', 8, '2023-11-13 00:53:13'),
(21, 'SUN-SP-00003', 'INV-ROH00021', '2023-11-13', 8, 20, 20, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-13 22:39:33', NULL, '2023-11-13 22:39:33'),
(22, 'SUN-SP-00003', 'INV-CAS00022', '2023-11-14', 5, 250, 0, 0, 250, '0', '0', 0, 50, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-14 17:58:24', NULL, '2023-11-14 17:58:24'),
(23, 'SUN-SP-00003', 'INV-ROH00023', '2023-11-15', 0, 20, 20, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-15 16:26:29', NULL, '2023-11-15 16:26:29'),
(24, 'SUN-SU-00010', 'INV-SUN00001', '2023-11-15', 13, 15000, 5000, 5000, 10000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '', '', 1, 10, '2023-11-15 19:40:05', NULL, '2023-11-15 19:40:05'),
(25, 'SUN-SU-00010', 'INV-SUN00025', '2023-11-16', 14, 80000, 10000, 10000, 70000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '<p>10000 Taka Advance Payment</p>\r\n', '', 1, 10, '2023-11-16 23:24:20', NULL, '2023-11-16 23:24:20'),
(26, 'SUN-SP-00003', 'INV-ROH00024', '2023-11-19', 8, 320, 320, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-19 17:17:06', NULL, '2023-11-19 17:17:06'),
(27, 'SUN-SP-00003', 'INV-ROH00027', '2023-11-19', 0, 20, 20, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-19 17:21:12', NULL, '2023-11-19 17:21:12'),
(28, 'SUN-SP-00003', 'INV-ROH00028', '2023-11-19', 0, 20, 20, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-19 18:19:31', NULL, '2023-11-19 18:19:31'),
(29, 'SUN-SU-00010', 'INV-SUN00026', '2023-11-19', 15, 20000, 0, 0, 20000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '', 'fb bost theke sales //ref - Emam/9000 taka adv 11000 due // voucher diye payment', 1, 10, '2023-11-19 22:12:56', 10, '2023-11-19 22:13:44'),
(30, 'SUN-SU-00010', 'INV-SUN00030', '2023-11-20', 17, 80000, 0, 0, 80000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '<p>Payment 4 ta intallment a dibe</p>\r\n\r\n<p>1st 25000</p>\r\n\r\n<p>Next Proti masher a tarikh 18000 kore</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 1, 10, '2023-11-21 02:38:35', NULL, '2023-11-21 02:38:35'),
(31, 'SUN-SP-00003', 'INV-ROH00029', '2023-11-21', 8, 320, 400, 0, -80, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-11-21 17:49:28', NULL, '2023-11-21 17:49:28'),
(32, 'SUN-SP-00003', 'INV-CAS00032', '2023-11-21', 5, 40, 40, 40, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 14, '2023-11-21 22:42:54', NULL, '2023-11-21 22:42:54'),
(33, 'SUN-SP-00003', 'INV-CAS00033', '2023-11-21', 8, 320, 200, 200, 120, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 14, '2023-11-21 22:43:15', NULL, '2023-11-21 22:43:15'),
(35, 'SUN-SP-00003', 'INV-CAS00035', '2023-11-22', 8, 32, 32, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-23 00:33:39', NULL, '2023-11-23 00:33:39'),
(37, 'SUN-SP-00003', 'INV-CAS00037', '2023-11-26', 8, 100, 100, 100, 0, '0', '0', 0, 0, '0', '0', 0, 'Bank', '2', '', '', 1, 8, '2023-11-26 22:29:17', NULL, '2023-11-26 22:29:17'),
(38, 'SUN-SP-00003', 'INV-CAS00038', '2023-11-26', 8, 32, 32, 32, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 2, 8, '2023-11-26 22:47:07', 8, '2024-04-18 17:36:36'),
(39, 'SUN-SP-00003', 'INV-CAS00039', '2023-11-26', 5, 100, 100, 100, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-26 22:53:13', 8, '2024-04-16 16:15:35'),
(40, 'SUN-SP-00003', 'INV-CAS00040', '2023-11-26', 8, 90, 50, 0, 40, '7', '7', 7, 60, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-26 23:16:44', NULL, '2023-11-26 23:16:44'),
(41, 'SUN-SP-00003', 'INV-CAS00041', '2023-11-26', 8, 5, 3, 0, 2, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-26 23:25:40', NULL, '2023-11-26 23:25:40'),
(42, 'SUN-SP-00003', 'INV-CAS00042', '2023-11-27', 8, 5, 5, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-27 23:43:28', NULL, '2023-11-27 23:43:28'),
(43, 'SUN-SP-00003', 'INV-CAS00043', '2023-11-27', 8, 29, 20, 0, 9, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-27 23:52:41', NULL, '2023-11-27 23:52:41'),
(44, 'SUN-SP-00003', 'INV-CAS00044', '2023-11-27', 8, 12, 5, 0, 7, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, 'test by sunshine', 2, 8, '2023-11-28 02:12:21', NULL, '2023-11-28 02:12:21'),
(45, 'SUN-SP-00003', 'INV-CAS00045', '2023-11-29', 8, 40, 20, 20, 20, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2023-11-29 22:58:57', NULL, '2023-11-29 22:58:57'),
(46, 'SUN-SP-00003', 'INV-CAS00046', '2023-11-29', 8, 12, 5, 0, 7, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2023-11-29 23:13:22', NULL, '2023-11-29 23:13:22'),
(47, 'SUN-SP-00003', 'INV-CAS00047', '2023-11-29', 5, 40, 40, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2023-11-30 00:03:56', NULL, '2023-11-30 00:03:56'),
(48, 'SUN-SP-00003', 'INV-CAS00048', '2023-11-29', 8, 12, 12, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2023-11-30 00:19:47', NULL, '2023-11-30 00:19:47'),
(49, 'SUN-SP-00003', 'INV-CAS00049', '2023-11-30', 5, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2023-11-30 22:48:19', NULL, '2023-11-30 22:48:19'),
(51, 'SUN-SP-00003', 'INV-ROH00050', '2023-12-04', 5, 126, 126, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-12-04 15:19:05', NULL, '2023-12-04 15:19:05'),
(52, 'SUN-SP-00003', 'INV-CAS00051', '2023-12-04', 5, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2023-12-04 22:28:02', NULL, '2023-12-04 22:28:02'),
(53, 'SUN-SP-00003', 'INV-CAS00052', '2023-12-07', 8, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2023-12-07 23:05:03', NULL, '2023-12-07 23:05:03'),
(54, 'SUN-SP-00003', 'INV-ROH00054', '2023-12-11', 5, 47, 47, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-12-12 00:50:31', NULL, '2023-12-12 00:50:31'),
(55, 'SUN-SP-00003', 'INV-ROH00055', '2023-12-11', 5, 51, 51, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2023-12-12 00:52:57', NULL, '2023-12-12 00:52:57'),
(56, 'SUN-SP-00003', 'INV-CAS00056', '2023-12-11', 8, 93.2, 20, 20, 73.2, '5.20', '0', 5.2, 50, '10%', '%', 4.4, 'Cash', '4', '<p>Terms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; ConditionsTerms &amp; Conditions</p>\r\n', '', 1, 8, '2023-12-12 03:34:54', NULL, '2023-12-12 03:34:54'),
(57, 'SUN-SP-00003', 'INV-CAS00057', '2023-12-11', 8, 200, 200, 0, 0, '14', '4', 14, 60, '10%', '%', 14, 'Cash', '4', NULL, '', 2, 8, '2023-12-12 03:54:31', NULL, '2023-12-12 03:54:31'),
(58, 'SUN-SU-00010', 'INV-SUN00031', '2024-01-01', 34, 12000, 0, 0, 12000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '', '', 1, 10, '2024-01-01 23:23:50', 10, '2024-01-01 23:24:39'),
(59, 'SUN-SU-00010', 'INV-SUN00059', '2024-01-01', 22, 5000, 0, 0, 5000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '', '', 1, 10, '2024-01-01 23:25:08', NULL, '2024-01-01 23:25:08'),
(60, 'SUN-SP-00003', 'INV-CAS00058', '2024-01-10', 37, 200, 200, 200, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-01-11 01:14:06', NULL, '2024-01-11 01:14:06'),
(61, 'SUN-SU-00010', 'INV-SUN00060', '2024-01-10', 38, 12000, 6000, 6000, 6000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '3', '', '', 1, 10, '2024-01-11 01:58:42', NULL, '2024-01-11 01:58:42'),
(62, 'SUN-SP-00003', 'INV-CAS00061', '2024-01-30', 5, 384, 0, 0, 384, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-01-30 12:14:53', NULL, '2024-01-30 12:14:53'),
(63, 'SUN-SP-00003', 'INV-ROH00063', '2024-01-31', 0, 0, 120, 0, -120, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-01-31 16:36:35', NULL, '2024-01-31 16:36:35'),
(64, 'SUN-SP-00003', 'INV-ROH00064', '2024-01-31', 0, 0, 120, 0, -120, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-01-31 16:36:38', NULL, '2024-01-31 16:36:38'),
(65, 'SUN-SP-00003', 'INV-ROH00065', '2024-01-31', 0, 0, 120, 0, -120, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-01-31 16:36:51', NULL, '2024-01-31 16:36:51'),
(66, 'SUN-SP-00003', 'INV-ROH00066', '2024-01-31', 0, 0, 120, 0, -120, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-01-31 16:36:52', NULL, '2024-01-31 16:36:52'),
(67, 'SUN-SP-00003', 'INV-ROH00067', '2024-01-31', 0, 0, 120, 0, -120, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-01-31 16:37:09', NULL, '2024-01-31 16:37:09'),
(68, 'SUN-SP-00003', 'INV-CAS00068', '2024-02-21', 37, 20, 0, 0, 20, '0', '0', 0, 0, '0', '0', 0, 'Mobile', '2', '', '', 1, 8, '2024-02-21 19:46:27', NULL, '2024-02-21 19:46:27'),
(69, 'SUN-RA-00015', 'INV-RAN00001', '2024-02-23', 50, 90, 90, 40, 0, '20', '0', 20, 5, '5', '5', 5, 'Cash', '5', '', '', 1, 15, '2024-02-23 16:40:52', 15, '2024-02-23 16:42:25'),
(70, 'SUN-RA-00015', 'INV-RAN00070', '2024-02-23', 50, 100, 0, 0, 100, '0', '0', 0, 0, '0', '0', 0, 'Cash', '5', '', '', 1, 15, '2024-02-23 16:44:30', NULL, '2024-02-23 16:44:30'),
(71, 'SUN-SP-00003', 'INV-CAS00069', '2024-02-28', 37, 300000, 0, 0, 300000, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-02-28 23:05:44', NULL, '2024-02-28 23:05:44'),
(72, 'SUN-RA-00015', 'INV-RAN00071', '2024-02-29', 50, 20, 0, 0, 20, '0', '0', 0, 0, '0', '0', 0, 'Cash', '5', '', '', 1, 15, '2024-03-01 01:45:03', NULL, '2024-03-01 01:45:03'),
(73, 'SUN-RA-00015', 'INV-RAN00073', '2024-02-29', 50, 20, 0, 0, 20, '0', '0', 0, 0, '0', '0', 0, 'Cash', '5', '', '', 1, 15, '2024-03-01 01:45:26', NULL, '2024-03-01 01:45:26'),
(74, 'SUN-SP-00003', 'INV-CAS00070', '2024-03-05', 49, 15, 15, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2024-03-05 23:35:44', NULL, '2024-03-05 23:35:44'),
(75, 'SUN-SP-00003', 'INV-CAS00071', '2024-03-06', 49, 25, 15, 0, 10, '5', '5', 5, 0, '10', '0', 10, 'Cash', '4', NULL, '', 2, 8, '2024-03-06 23:53:27', NULL, '2024-03-06 23:53:27'),
(76, 'SUN-SP-00003', 'INV-ROH00076', '2024-03-07', 8, 60, 60, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-03-07 12:42:26', NULL, '2024-03-07 12:42:26'),
(77, 'SUN-SP-00003', 'INV-ROH00077', '2024-03-07', 5, 15, 15, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-03-07 12:42:50', NULL, '2024-03-07 12:42:50'),
(78, 'SUN-SP-00003', 'INV-ROH00078', '2024-03-07', 37, 55, 55, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-03-07 12:43:39', NULL, '2024-03-07 12:43:39'),
(80, 'SUN-SP-00003', 'INV-ROH00079', '2024-03-14', 5, 50, 50, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-03-14 16:08:50', NULL, '2024-03-14 16:08:50'),
(81, 'SUN-SP-00003', 'INV-CAS00080', '2024-03-26', 49, 100, 100, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Bank', '0', NULL, '', 2, 8, '2024-03-27 01:16:29', NULL, '2024-03-27 01:16:29'),
(82, 'SUN-SP-00003', 'INV-CAS00082', '2024-04-08', 49, 2402, 2402, 0, 0, '2', '2', 2, 2, '2', '2', 2, 'Cash', '4', '', '', 1, 8, '2024-04-08 11:14:00', 8, '2024-04-08 11:14:19'),
(83, 'SUN-SP-00003', 'INV-CAS00083', '2024-04-08', 51, 0, 0, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2024-04-09 00:52:33', NULL, '2024-04-09 00:52:33'),
(84, 'SUN-SP-00003', 'INV-CAS00084', '2024-04-08', 49, 0, 0, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2024-04-09 00:54:10', NULL, '2024-04-09 00:54:10'),
(85, 'SUN-SP-00003', 'INV-CAS00085', '2024-04-10', 49, 100, 100, 100, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-04-10 14:26:44', 8, '2024-04-10 14:27:52'),
(86, 'SUN-SP-00003', 'INV-ROH00086', '2024-04-16', 0, 41, 41, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-04-16 14:51:55', NULL, '2024-04-16 14:51:55'),
(87, 'SUN-SP-00003', 'INV-ROH00087', '2024-04-17', 0, 44, 44, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-04-17 17:57:55', NULL, '2024-04-17 17:57:55'),
(88, 'SUN-SP-00003', 'INV-ROH00088', '2024-04-17', 0, 6, 6, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-04-17 17:58:11', NULL, '2024-04-17 17:58:11'),
(89, 'SUN-SP-00003', 'INV-CAS00089', '2024-04-17', 51, 92, 92, 45, 0, '0', '0', 0, 60, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-04-17 21:44:38', 8, '2024-04-17 21:46:29'),
(90, 'SUN-SP-00003', 'INV-CAS00090', '2024-04-18', 51, 12, 12, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '0', NULL, '', 2, 8, '2024-04-18 17:36:12', NULL, '2024-04-18 17:36:12'),
(91, 'SUN-SP-00003', 'INV-CAS00091', '2024-04-20', 53, 20, 20, 20, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-04-20 14:30:05', NULL, '2024-04-20 14:30:05'),
(92, 'SUN-SP-00003', 'INV-CAS00092', '2024-04-23', 60, 32, 15, 0, 17, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, 'test by sunshine', 2, 8, '2024-04-24 04:21:59', NULL, '2024-04-24 04:21:59'),
(93, 'SUN-SP-00003', 'INV-CAS00093', '2024-04-23', 51, 80, 50, 0, 30, '1', '1', 1, 60, '5%', '%', 1, 'Cash', '4', NULL, 'test by sunshine', 2, 8, '2024-04-24 04:27:35', NULL, '2024-04-24 04:27:35'),
(94, 'SUN-SP-00003', 'INV-CAS00094', '2024-04-25', 60, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2024-04-25 11:42:59', NULL, '2024-04-25 11:42:59'),
(95, 'SUN-SP-00003', 'INV-CAS00095', '2024-04-25', 60, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2024-04-25 12:46:46', NULL, '2024-04-25 12:46:46'),
(96, 'SUN-SP-00003', 'INV-ROH00096', '2024-04-26', 0, 126, 126, 0, 0, '0', '%', 0, NULL, NULL, NULL, NULL, 'Cash', 'Cash', NULL, 'By Sunshine', 1, 8, '2024-04-26 18:24:37', NULL, '2024-04-26 18:24:37'),
(97, 'SUN-SP-00003', 'INV-CAS00097', '2024-04-27', 61, 20, 20, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2024-04-27 10:50:37', NULL, '2024-04-27 10:50:37'),
(98, 'SUN-SP-00003', 'INV-CAS00098', '2024-04-27', 62, 220, 220, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', NULL, '', 2, 8, '2024-04-27 11:01:20', NULL, '2024-04-27 11:01:20'),
(99, 'SUN-SP-00003', 'INV-CAS00099', '2024-04-28', 62, 0, 0, 0, 0, '0', '0', 0, 0, '0', '0', 0, 'Cash', '4', '', '', 1, 8, '2024-04-28 16:22:11', NULL, '2024-04-28 16:22:11'),
(100, 'SUN-SP-00003', 'INV-CAS00100', '2024-04-28', 62, 10, 0, 0, 10, '0', '0', 0, 0, '0', '0', 0, 'Mobile', '6', '', '', 1, 8, '2024-04-28 16:28:01', NULL, '2024-04-28 16:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment`
--

CREATE TABLE `sales_payment` (
  `sp_id` int NOT NULL,
  `saleID` int NOT NULL,
  `amount` float NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `accountNo` varchar(50) NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales_payment`
--

INSERT INTO `sales_payment` (`sp_id`, `saleID`, `amount`, `accountType`, `accountNo`, `regby`, `regdate`) VALUES
(1, 20, 200, 'Cash', '4', 8, '2023-11-12 18:53:03'),
(2, 20, 100, 'Cash', '4', 8, '2023-11-12 18:53:13'),
(3, 69, 20, 'Cash', '5', 15, '2024-02-23 10:42:12'),
(4, 69, 30, 'Cash', '5', 15, '2024-02-23 10:42:25'),
(5, 82, 2402, 'Cash', '4', 8, '2024-04-08 05:14:19'),
(6, 89, 40, 'Cash', '4', 8, '2024-04-17 15:45:34'),
(7, 89, 7, 'Cash', '4', 8, '2024-04-17 15:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE `sale_product` (
  `sp_id` int NOT NULL,
  `saleID` int DEFAULT NULL,
  `productID` int DEFAULT NULL,
  `sprice` float DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`sp_id`, `saleID`, `productID`, `sprice`, `quantity`, `totalPrice`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 15, 2, 20, 1, 20, 8, '2023-11-10 12:00:49', NULL, '2023-11-10 12:00:49'),
(4, 18, 2, 20, 1, 20, 8, '2023-11-12 18:11:29', NULL, '2023-11-12 18:11:29'),
(5, 19, 2, 20, 10, 200, 8, '2023-11-12 18:12:03', NULL, '2023-11-12 18:12:03'),
(6, 20, 3, 300, 1, 300, 8, '2023-11-12 18:27:12', NULL, '2023-11-12 18:27:12'),
(7, 21, 2, 20, 1, 20, 8, '2023-11-13 16:39:33', NULL, '2023-11-13 16:39:33'),
(8, 22, 2, 20, 10, 200, 8, '2023-11-14 11:58:24', NULL, '2023-11-14 11:58:24'),
(9, 23, 2, 20, 1, 20, 8, '2023-11-15 10:26:29', NULL, '2023-11-15 10:26:29'),
(10, 24, 12, 15000, 1, 15000, 10, '2023-11-15 13:40:05', NULL, '2023-11-15 13:40:05'),
(11, 25, 13, 65000, 1, 65000, 10, '2023-11-16 17:24:20', NULL, '2023-11-16 17:24:20'),
(12, 25, 7, 15000, 1, 15000, 10, '2023-11-16 17:24:20', NULL, '2023-11-16 17:24:20'),
(13, 26, 2, 20, 1, 20, 8, '2023-11-19 11:17:06', NULL, '2023-11-19 11:17:06'),
(14, 26, 3, 300, 1, 300, 8, '2023-11-19 11:17:06', NULL, '2023-11-19 11:17:06'),
(15, 27, 2, 20, 1, 20, 8, '2023-11-19 11:21:12', NULL, '2023-11-19 11:21:12'),
(16, 28, 2, 20, 1, 20, 8, '2023-11-19 12:19:31', NULL, '2023-11-19 12:19:31'),
(19, 29, 16, 10000, 1, 10000, 10, '2023-11-19 16:13:44', NULL, '2023-11-19 16:13:44'),
(20, 29, 4, 10000, 1, 10000, 10, '2023-11-19 16:13:44', NULL, '2023-11-19 16:13:44'),
(21, 30, 10, 40000, 1, 40000, 10, '2023-11-20 20:38:35', NULL, '2023-11-20 20:38:35'),
(22, 30, 18, 40000, 1, 40000, 10, '2023-11-20 20:38:35', NULL, '2023-11-20 20:38:35'),
(23, 31, 17, 12, 1, 12, 8, '2023-11-21 11:49:28', NULL, '2023-11-21 11:49:28'),
(24, 31, 15, 4, 2, 8, 8, '2023-11-21 11:49:28', NULL, '2023-11-21 11:49:28'),
(25, 31, 3, 300, 1, 300, 8, '2023-11-21 11:49:28', NULL, '2023-11-21 11:49:28'),
(26, 32, 2, 20, 2, 40, 14, '2023-11-21 16:42:54', NULL, '2023-11-21 16:42:54'),
(27, 33, 3, 300, 1, 300, 14, '2023-11-21 16:43:15', NULL, '2023-11-21 16:43:15'),
(28, 33, 2, 20, 1, 20, 14, '2023-11-21 16:43:15', NULL, '2023-11-21 16:43:15'),
(30, 35, 2, 20, 1, 20, 8, '2023-11-22 18:33:39', NULL, '2023-11-22 18:33:39'),
(31, 35, 17, 12, 1, 12, 8, '2023-11-22 18:33:39', NULL, '2023-11-22 18:33:39'),
(33, 37, 2, 20, 5, 100, 8, '2023-11-26 16:29:17', NULL, '2023-11-26 16:29:17'),
(37, 40, 20, 5, 1, 5, 8, '2023-11-26 17:16:44', NULL, '2023-11-26 17:16:44'),
(38, 40, 17, 12, 1, 12, 8, '2023-11-26 17:16:44', NULL, '2023-11-26 17:16:44'),
(39, 40, 2, 20, 1, 20, 8, '2023-11-26 17:16:44', NULL, '2023-11-26 17:16:44'),
(40, 41, 20, 5, 1, 5, 8, '2023-11-26 17:25:40', NULL, '2023-11-26 17:25:40'),
(41, 42, 20, 5, 1, 5, 8, '2023-11-27 17:43:28', NULL, '2023-11-27 17:43:28'),
(42, 43, 20, 5, 1, 5, 8, '2023-11-27 17:52:41', NULL, '2023-11-27 17:52:41'),
(43, 43, 17, 12, 2, 24, 8, '2023-11-27 17:52:41', NULL, '2023-11-27 17:52:41'),
(44, 44, 17, 12, 1, 12, 8, '2023-11-27 20:12:21', NULL, '2023-11-27 20:12:21'),
(46, 45, 2, 20, 2, 40, 8, '2023-11-29 16:58:57', NULL, '2023-11-29 16:58:57'),
(47, 46, 17, 12, 1, 12, 8, '2023-11-29 17:13:22', NULL, '2023-11-29 17:13:22'),
(48, 47, 2, 20, 2, 40, 8, '2023-11-29 18:03:56', NULL, '2023-11-29 18:03:56'),
(49, 48, 17, 12, 1, 12, 8, '2023-11-29 18:19:47', NULL, '2023-11-29 18:19:47'),
(50, 49, 2, 20, 1, 20, 8, '2023-11-30 16:48:19', NULL, '2023-11-30 16:48:19'),
(52, 51, 2, 20, 3, 60, 8, '2023-12-04 09:19:05', NULL, '2023-12-04 09:19:05'),
(53, 51, 14, 3, 6, 18, 8, '2023-12-04 09:19:05', NULL, '2023-12-04 09:19:05'),
(54, 51, 15, 4, 3, 12, 8, '2023-12-04 09:19:05', NULL, '2023-12-04 09:19:05'),
(55, 51, 17, 12, 2, 24, 8, '2023-12-04 09:19:05', NULL, '2023-12-04 09:19:05'),
(56, 51, 20, 12, 1, 12, 8, '2023-12-04 09:19:05', NULL, '2023-12-04 09:19:05'),
(57, 52, 2, 20, 1, 20, 8, '2023-12-04 16:28:02', NULL, '2023-12-04 16:28:02'),
(58, 53, 2, 20, 1, 20, 8, '2023-12-07 17:05:03', NULL, '2023-12-07 17:05:03'),
(59, 54, 2, 20, 1, 20, 8, '2023-12-11 18:50:31', NULL, '2023-12-11 18:50:31'),
(60, 54, 14, 3, 1, 3, 8, '2023-12-11 18:50:31', NULL, '2023-12-11 18:50:31'),
(61, 54, 17, 12, 1, 12, 8, '2023-12-11 18:50:31', NULL, '2023-12-11 18:50:31'),
(62, 54, 20, 12, 1, 12, 8, '2023-12-11 18:50:31', NULL, '2023-12-11 18:50:31'),
(63, 55, 2, 20, 1, 20, 8, '2023-12-11 18:52:57', NULL, '2023-12-11 18:52:57'),
(64, 55, 14, 3, 1, 3, 8, '2023-12-11 18:52:57', NULL, '2023-12-11 18:52:57'),
(65, 55, 15, 4, 1, 4, 8, '2023-12-11 18:52:57', NULL, '2023-12-11 18:52:57'),
(66, 55, 17, 12, 1, 12, 8, '2023-12-11 18:52:57', NULL, '2023-12-11 18:52:57'),
(67, 55, 20, 12, 1, 12, 8, '2023-12-11 18:52:57', NULL, '2023-12-11 18:52:57'),
(68, 56, 2, 20, 1, 20, 8, '2023-12-11 21:34:54', NULL, '2023-12-11 21:34:54'),
(69, 56, 17, 12, 1, 12, 8, '2023-12-11 21:34:54', NULL, '2023-12-11 21:34:54'),
(70, 56, 20, 12, 1, 12, 8, '2023-12-11 21:34:54', NULL, '2023-12-11 21:34:54'),
(71, 57, 2, 20, 1, 20, 8, '2023-12-11 21:54:31', NULL, '2023-12-11 21:54:31'),
(72, 57, 17, 12, 10, 120, 8, '2023-12-11 21:54:31', NULL, '2023-12-11 21:54:31'),
(74, 58, 11, 10000, 1, 10000, 10, '2024-01-01 17:24:39', NULL, '2024-01-01 17:24:39'),
(75, 58, 8, 1000, 1, 1000, 10, '2024-01-01 17:24:39', NULL, '2024-01-01 17:24:39'),
(76, 58, 9, 1000, 1, 1000, 10, '2024-01-01 17:24:39', NULL, '2024-01-01 17:24:39'),
(77, 59, 11, 5000, 1, 5000, 10, '2024-01-01 17:25:08', NULL, '2024-01-01 17:25:08'),
(78, 60, 21, 20, 10, 200, 8, '2024-01-10 19:14:06', NULL, '2024-01-10 19:14:06'),
(79, 61, 6, 10000, 1, 10000, 10, '2024-01-10 19:58:42', NULL, '2024-01-10 19:58:42'),
(80, 61, 8, 2000, 1, 2000, 10, '2024-01-10 19:58:42', NULL, '2024-01-10 19:58:42'),
(81, 62, 2, 20, 12, 240, 8, '2024-01-30 06:14:53', NULL, '2024-01-30 06:14:53'),
(82, 62, 20, 12, 12, 144, 8, '2024-01-30 06:14:53', NULL, '2024-01-30 06:14:53'),
(83, 68, 2, 20, 1, 20, 8, '2024-02-21 13:46:27', NULL, '2024-02-21 13:46:27'),
(84, 69, 22, 20, 5, 100, 15, '2024-02-23 10:40:52', NULL, '2024-02-23 10:40:52'),
(85, 70, 22, 20, 5, 100, 15, '2024-02-23 10:44:30', NULL, '2024-02-23 10:44:30'),
(86, 71, 2, 10000, 30, 300000, 8, '2024-02-28 17:05:44', NULL, '2024-02-28 17:05:44'),
(87, 72, 22, 20, 1, 20, 15, '2024-02-29 19:45:03', NULL, '2024-02-29 19:45:03'),
(88, 73, 22, 20, 1, 20, 15, '2024-02-29 19:45:26', NULL, '2024-02-29 19:45:26'),
(89, 74, 14, 3, 1, 3, 8, '2024-03-05 17:35:44', NULL, '2024-03-05 17:35:44'),
(90, 74, 20, 12, 1, 12, 8, '2024-03-05 17:35:44', NULL, '2024-03-05 17:35:44'),
(91, 75, 2, 20, 1, 20, 8, '2024-03-06 17:53:27', NULL, '2024-03-06 17:53:27'),
(92, 76, 2, 20, 3, 60, 8, '2024-03-07 06:42:26', NULL, '2024-03-07 06:42:26'),
(93, 77, 14, 3, 1, 3, 8, '2024-03-07 06:42:50', NULL, '2024-03-07 06:42:50'),
(94, 77, 20, 12, 1, 12, 8, '2024-03-07 06:42:50', NULL, '2024-03-07 06:42:50'),
(95, 78, 2, 20, 2, 40, 8, '2024-03-07 06:43:39', NULL, '2024-03-07 06:43:39'),
(96, 78, 17, 12, 1, 12, 8, '2024-03-07 06:43:39', NULL, '2024-03-07 06:43:39'),
(97, 78, 14, 3, 1, 3, 8, '2024-03-07 06:43:39', NULL, '2024-03-07 06:43:39'),
(101, 80, 32, 10, 5, 50, 8, '2024-03-14 10:08:50', NULL, '2024-03-14 10:08:50'),
(102, 17, 2, 20, 2, 40, 8, '2024-03-26 09:48:36', NULL, '2024-03-26 09:48:36'),
(103, 81, 20, 12, 2, 24, 8, '2024-03-26 19:16:29', NULL, '2024-03-26 19:16:29'),
(104, 81, 17, 12, 3, 36, 8, '2024-03-26 19:16:29', NULL, '2024-03-26 19:16:29'),
(105, 81, 21, 20, 1, 20, 8, '2024-03-26 19:16:29', NULL, '2024-03-26 19:16:29'),
(106, 81, 2, 20, 1, 20, 8, '2024-03-26 19:16:29', NULL, '2024-03-26 19:16:29'),
(107, 82, 33, 12, 200, 2400, 8, '2024-04-08 05:14:00', NULL, '2024-04-08 05:14:00'),
(109, 85, 2, 20, 5, 100, 8, '2024-04-10 08:27:52', NULL, '2024-04-10 08:27:52'),
(110, 86, 2, 20, 1, 20, 8, '2024-04-16 08:51:55', NULL, '2024-04-16 08:51:55'),
(111, 86, 14, 3, 1, 3, 8, '2024-04-16 08:51:55', NULL, '2024-04-16 08:51:55'),
(112, 86, 23, 18, 1, 18, 8, '2024-04-16 08:51:55', NULL, '2024-04-16 08:51:55'),
(113, 39, 20, 10, 10, 100, 8, '2024-04-16 10:15:35', NULL, '2024-04-16 10:15:35'),
(114, 87, 2, 20, 1, 20, 8, '2024-04-17 11:57:55', NULL, '2024-04-17 11:57:55'),
(115, 87, 15, 4, 1, 4, 8, '2024-04-17 11:57:55', NULL, '2024-04-17 11:57:55'),
(116, 87, 21, 20, 1, 20, 8, '2024-04-17 11:57:55', NULL, '2024-04-17 11:57:55'),
(117, 88, 14, 3, 2, 6, 8, '2024-04-17 11:58:11', NULL, '2024-04-17 11:58:11'),
(118, 89, 2, 20, 1, 20, 8, '2024-04-17 15:44:38', NULL, '2024-04-17 15:44:38'),
(119, 89, 17, 12, 1, 12, 8, '2024-04-17 15:44:38', NULL, '2024-04-17 15:44:38'),
(120, 90, 20, 12, 1, 12, 8, '2024-04-18 11:36:12', NULL, '2024-04-18 11:36:12'),
(121, 38, 2, 20, 1, 20, 8, '2024-04-18 11:36:36', NULL, '2024-04-18 11:36:36'),
(122, 38, 17, 12, 1, 12, 8, '2024-04-18 11:36:36', NULL, '2024-04-18 11:36:36'),
(123, 91, 2, 20, 1, 20, 8, '2024-04-20 08:30:05', NULL, '2024-04-20 08:30:05'),
(124, 16, 2, 20, 1, 20, 8, '2024-04-20 09:17:58', NULL, '2024-04-20 09:17:58'),
(125, 16, 2, 20, 1, 0, 8, '2024-04-20 09:17:58', NULL, '2024-04-20 09:17:58'),
(126, 16, 2, 20, 1, 0, 8, '2024-04-20 09:17:58', NULL, '2024-04-20 09:17:58'),
(127, 92, 2, 20, 1, 20, 8, '2024-04-23 22:21:59', NULL, '2024-04-23 22:21:59'),
(128, 92, 17, 12, 1, 12, 8, '2024-04-23 22:21:59', NULL, '2024-04-23 22:21:59'),
(129, 93, 2, 20, 1, 20, 8, '2024-04-23 22:27:35', NULL, '2024-04-23 22:27:35'),
(130, 94, 2, 20, 1, 20, 8, '2024-04-25 05:42:59', NULL, '2024-04-25 05:42:59'),
(131, 95, 2, 20, 1, 20, 8, '2024-04-25 06:46:46', NULL, '2024-04-25 06:46:46'),
(132, 96, 2, 20, 2, 40, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(133, 96, 21, 20, 2, 40, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(134, 96, 15, 4, 1, 4, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(135, 96, 17, 12, 1, 12, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(136, 96, 20, 12, 1, 12, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(137, 96, 23, 18, 1, 18, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(138, 97, 2, 20, 1, 20, 8, '2024-04-27 04:50:37', NULL, '2024-04-27 04:50:37'),
(139, 98, 21, 20, 11, 220, 8, '2024-04-27 05:01:20', NULL, '2024-04-27 05:01:20'),
(140, 99, 46, 10, 0, 0, 8, '2024-04-28 10:22:11', NULL, '2024-04-28 10:22:11'),
(141, 99, 33, 12, 0, 0, 8, '2024-04-28 10:22:11', NULL, '2024-04-28 10:22:11'),
(142, 99, 32, 10, 0, 0, 8, '2024-04-28 10:22:11', NULL, '2024-04-28 10:22:11'),
(143, 100, 46, 10, 1, 10, 8, '2024-04-28 10:28:01', NULL, '2024-04-28 10:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE `service_info` (
  `siid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `siName` varchar(100) NOT NULL,
  `siCode` varchar(20) NOT NULL,
  `siPrice` float NOT NULL,
  `categoryID` int NOT NULL,
  `unit` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `siDetails` text,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`siid`, `compid`, `siName`, `siCode`, `siPrice`, `categoryID`, `unit`, `image`, `siDetails`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-DE-00012', 'Cleaning', 'SDEM00001', 500, 0, 0, '', '', 'Active', 12, '2023-09-24 05:34:51', NULL, '2023-09-24 05:34:51'),
(2, 'SUN-DE-00012', 'Bit Rent', 'SDEM00002', 350, 0, 0, '', '', 'Active', 12, '2023-09-24 11:52:50', NULL, '2023-09-24 11:52:50'),
(3, 'SUN-AF-00011', 'Cleaning', 'SAFS00003', 2000, 0, 0, '', '', 'Active', 11, '2023-09-25 06:02:49', NULL, '2023-09-25 06:02:49'),
(7, 'SUN-SP-00003', 'test', 'S-CAS00007', 11, 1, 1, 'unnamed.jpg', 'ffff', 'Active', 8, '2023-10-30 14:16:29', NULL, '2023-10-30 14:16:29'),
(8, 'SUN-SP-00003', 'TestS', 'S-CAS00008', 100, 15, 1, 'Untitled.png', 'Test', 'Active', 8, '2023-10-31 14:46:39', NULL, '2023-10-31 14:46:39'),
(9, 'SUN-SP-00003', 'TestSC', 'S-CAS00009', 0, 1, 1, 'Untitled1.png', 'Testt', 'Active', 8, '2023-10-31 16:22:17', NULL, '2023-10-31 16:22:17'),
(11, 'SUN-SP-00003', 'House Rent 66', 'S-CAS00011', 15000, 1, 1, 'Pepsi_-_250ml_BD_original.jpg', '', 'Active', 8, '2023-11-02 19:35:29', NULL, '2023-11-02 19:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_sale`
--

CREATE TABLE `service_sale` (
  `ssid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `ssDate` date NOT NULL,
  `ssCode` varchar(20) NOT NULL,
  `custid` int NOT NULL,
  `amount` float NOT NULL,
  `pAmount` float NOT NULL,
  `accountType` varchar(15) NOT NULL,
  `accountNo` int NOT NULL,
  `terms` text,
  `note` varchar(200) DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_sale`
--

INSERT INTO `service_sale` (`ssid`, `compid`, `ssDate`, `ssCode`, `custid`, `amount`, `pAmount`, `accountType`, `accountNo`, `terms`, `note`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', '2023-10-26', 'SS-CAS00001', 2, 60000, 60000, 'Cash', 4, '', '', 8, '2023-10-26 05:04:57', NULL, '2023-10-26 05:04:57'),
(2, 'SUN-SP-00003', '2023-10-26', 'SS-CAS00002', 10, 80000, 80000, 'Cash', 4, '', '', 8, '2023-10-26 05:05:22', NULL, '2023-10-26 05:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `service_sale_details`
--

CREATE TABLE `service_sale_details` (
  `sidid` int NOT NULL,
  `ssid` int NOT NULL,
  `siid` int NOT NULL,
  `quantity` int NOT NULL,
  `sprice` float NOT NULL,
  `tPrice` float NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_sale_details`
--

INSERT INTO `service_sale_details` (`sidid`, `ssid`, `siid`, `quantity`, `sprice`, `tPrice`, `regby`, `regdate`) VALUES
(1, 1, 1, 1, 20000, 20000, 8, '2023-10-26 05:04:57'),
(2, 1, 2, 1, 25000, 25000, 8, '2023-10-26 05:04:57'),
(3, 1, 3, 1, 15000, 15000, 8, '2023-10-26 05:04:57'),
(4, 2, 1, 2, 20000, 40000, 8, '2023-10-26 05:05:22'),
(5, 2, 2, 1, 25000, 25000, 8, '2023-10-26 05:05:22'),
(6, 2, 3, 1, 15000, 15000, 8, '2023-10-26 05:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `sma_units`
--

CREATE TABLE `sma_units` (
  `id` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `unitName` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sma_units`
--

INSERT INTO `sma_units` (`id`, `compid`, `unitName`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SU-00010', 'PCS', 'Active', 10, '2023-11-07 22:08:47', NULL, '2023-11-07 22:08:47'),
(2, 'SUN-SP-00003', 'PCS', 'Active', 8, '2023-11-10 11:30:33', NULL, '2023-11-10 11:30:33'),
(3, 'SUN-RA-00015', 'PCS', 'Active', 15, '2024-02-23 10:33:38', NULL, '2024-02-23 10:33:38'),
(4, 'SUN-SP-00003', 'tt', 'Active', 8, '2024-04-10 08:12:35', NULL, '2024-04-10 08:12:35'),
(5, 'SUN-SP-00003', 'aa', 'Active', 8, '2024-04-10 08:12:35', NULL, '2024-04-10 08:12:35'),
(7, 'SUN-SP-00003', 'rrrr', 'Active', 8, '2024-04-10 08:49:39', 8, '2024-04-10 08:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `product` int DEFAULT NULL,
  `totalPices` float DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `compid`, `product`, `totalPices`, `regby`, `regdate`, `upby`, `update`) VALUES
(14, 'SUN-SU-00010', 12, -1, 10, '2023-11-15 13:40:05', NULL, '2023-11-15 13:40:05'),
(15, 'SUN-SU-00010', 13, -1, 10, '2023-11-16 17:24:20', NULL, '2023-11-16 17:24:20'),
(16, 'SUN-SU-00010', 7, -1, 10, '2023-11-16 17:24:20', NULL, '2023-11-16 17:24:20'),
(26, 'SUN-SU-00010', 16, -1, 10, '2023-11-19 16:13:44', NULL, '2023-11-19 16:13:44'),
(31, 'SUN-SU-00010', 10, -1, 10, '2023-11-20 20:38:35', NULL, '2023-11-20 20:38:35'),
(32, 'SUN-SU-00010', 18, -1, 10, '2023-11-20 20:38:35', NULL, '2023-11-20 20:38:35'),
(100, 'SUN-SU-00010', 9, 0, 10, '2024-01-01 17:24:39', NULL, '2024-01-01 17:24:39'),
(101, 'SUN-SU-00010', 11, -2, 10, '2024-01-01 17:25:08', NULL, '2024-01-01 17:25:08'),
(106, 'SUN-SU-00010', 6, -1, 10, '2024-01-10 19:58:42', NULL, '2024-01-10 19:58:42'),
(107, 'SUN-SU-00010', 8, 0, 10, '2024-01-10 19:58:42', NULL, '2024-01-10 19:58:42'),
(108, 'SUN-SU-00010', 4, 0, 10, '2024-01-17 21:21:14', NULL, '2024-01-17 21:21:14'),
(116, 'SUN-SP-00003', 24, 0, 8, '2024-02-27 14:19:02', NULL, '2024-04-10 08:46:21'),
(119, 'SUN-RA-00015', 22, 0, 15, '2024-02-29 19:45:26', NULL, '2024-02-29 19:45:26'),
(170, 'SUN-SP-00003', 14, -14, 8, '2024-04-17 11:58:11', NULL, '2024-04-17 11:58:11'),
(191, 'SUN-SP-00003', 15, -8, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(192, 'SUN-SP-00003', 17, 9, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(193, 'SUN-SP-00003', 20, -1, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(194, 'SUN-SP-00003', 23, -2, 8, '2024-04-26 12:24:37', NULL, '2024-04-26 12:24:37'),
(195, 'SUN-SP-00003', 2, 0, 8, '2024-04-27 04:50:37', NULL, '2024-04-27 04:50:37'),
(196, 'SUN-SP-00003', 21, 5, 8, '2024-04-27 05:01:20', NULL, '2024-04-27 05:01:20'),
(198, 'SUN-SP-00003', 33, 131028, 8, '2024-04-28 10:22:11', NULL, '2024-04-28 10:22:11'),
(199, 'SUN-SP-00003', 32, 495, 8, '2024-04-28 10:22:11', NULL, '2024-04-28 10:22:11'),
(200, 'SUN-SP-00003', 46, -1, 8, '2024-04-28 10:28:01', NULL, '2024-04-28 10:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `stock_store`
--

CREATE TABLE `stock_store` (
  `ss_id` int NOT NULL,
  `compid` varchar(25) NOT NULL,
  `product` int NOT NULL,
  `totalPices` int NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_store`
--

INSERT INTO `stock_store` (`ss_id`, `compid`, `product`, `totalPices`, `regby`, `regdate`) VALUES
(1, 'SUN-SP-00003', 2, 100, 8, '2023-11-10 11:30:39'),
(2, 'SUN-SP-00003', 32, 500, 8, '2024-03-14 10:07:19'),
(3, 'SUN-SP-00003', 33, 121212, 8, '2024-04-08 05:09:59'),
(4, 'SUN-SP-00003', 33, 10000, 8, '2024-04-10 08:13:02'),
(5, 'SUN-SP-00003', 33, 14, 8, '2024-04-17 11:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `sid` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `sName` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `sMobile` varchar(15) NOT NULL,
  `sEmail` varchar(100) DEFAULT NULL,
  `sAddress` varchar(200) NOT NULL,
  `sdCharge` float DEFAULT NULL,
  `sFacebook` varchar(200) NOT NULL DEFAULT '#',
  `sGoogle` varchar(200) NOT NULL DEFAULT '#',
  `sTwitter` varchar(200) NOT NULL DEFAULT '#',
  `sInstagram` varchar(200) NOT NULL DEFAULT '#',
  `sbImage` varchar(200) NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PATHAO_USER_NAME` varchar(255) DEFAULT NULL,
  `PATHAO_PASSWORD` varchar(255) DEFAULT NULL,
  `PATHAO_CLIENT_ID` varchar(255) DEFAULT NULL,
  `PATHAO_CLIENT_SECRET` varchar(255) DEFAULT NULL,
  `STEADFAST_API_KEY` varchar(255) DEFAULT NULL,
  `STEADFAST_API_SECRET` varchar(255) DEFAULT NULL,
  `FACEBOOK_PIXEL_ID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`sid`, `compid`, `sName`, `slug`, `sMobile`, `sEmail`, `sAddress`, `sdCharge`, `sFacebook`, `sGoogle`, `sTwitter`, `sInstagram`, `sbImage`, `regby`, `regdate`, `upby`, `update`, `PATHAO_USER_NAME`, `PATHAO_PASSWORD`, `PATHAO_CLIENT_ID`, `PATHAO_CLIENT_SECRET`, `STEADFAST_API_KEY`, `STEADFAST_API_SECRET`, `FACEBOOK_PIXEL_ID`) VALUES
(1, 'SUN-SP-00003', 'Test Store Evaly', 'Test-Store-Evaly', '01736187462', 'evaly@gmail.com', 'Savar bus stand, Savar, Dhaka', 15, 'http://localhost:8000/onlineStore', 'http://localhost:8000/onlineStore', 'http://localhost:8000/onlineStore', 'http://localhost:8000/onlineStore', 'programmer-eat-sleep-code-and-repeat_3840x2160.jpg', 8, '2024-05-31 06:59:53', NULL, '2024-05-31 06:59:53', 'sunshine.com.bd@gmail.com', '94n13O0WF', 'jnegLZDawZ', 'GKwD9lGC2RNd4CumTpGVmPWrh3c8eQsf1iyWaiOy', '', '', '1404104700280095');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `scatid` int NOT NULL,
  `catid` int NOT NULL,
  `scatName` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scatid`, `catid`, `scatName`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(2, 1, 'Sub 1', 'Active', 8, '2023-09-04 17:55:33', 8, '2023-09-04 18:09:05'),
(3, 1, 'Sub 10', 'Active', 8, '2023-09-04 18:34:18', 12, '2023-09-23 08:25:01'),
(4, 1, 'Sub 111', 'Active', 8, '2023-09-04 18:34:25', NULL, '2023-09-04 18:34:25'),
(5, 2, 'Sub 2', 'Active', 8, '2023-09-04 18:34:31', NULL, '2023-09-04 18:34:31'),
(7, 4, 'demo Subcategory', 'Active', 8, '2023-09-05 05:19:32', NULL, '2023-09-05 05:19:32'),
(8, 5, 'shirt', 'Active', 8, '2023-09-12 21:03:40', NULL, '2023-09-12 21:03:40'),
(9, 9, 'test', 'Active', 12, '2023-09-24 08:36:42', 8, '2024-04-10 08:49:26'),
(10, 1, 'aa1', 'Active', 8, '2023-10-26 08:05:44', NULL, '2023-10-26 08:05:44'),
(11, 1, 'aa1', 'Active', 8, '2023-10-26 08:06:56', NULL, '2023-10-26 08:06:56'),
(12, 1, 'aa1', 'Active', 8, '2023-10-26 08:07:28', NULL, '2023-10-26 08:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierID` int NOT NULL,
  `compid` varchar(20) NOT NULL,
  `sup_id` varchar(15) DEFAULT NULL,
  `supplierName` varchar(50) DEFAULT NULL,
  `compname` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Active',
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierID`, `compid`, `sup_id`, `supplierName`, `compname`, `mobile`, `email`, `address`, `balance`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'S-CAS00001', 'Rohim Mia ABC', '', '01714044169', 'sunshine@gmail.com', 'tangail', 0, 'Active', 8, '2023-11-12 18:05:43', 8, '2024-04-10 08:41:29'),
(2, 'SUN-SU-00010', 'S-SUN00001', 'EBN Host', 'EBN Host', '01714044180', 'sunshine.com.bd@gmail.com', 'Mymensingh', 0, 'Active', 10, '2023-11-16 18:17:22', NULL, '2023-11-16 18:17:22'),
(3, 'SUN-SP-00003', 'S-CAS00002', 'Supplier Name', 'Supplier Name', '01714044186', 'sunshine.com.bd@gmail.com', 'Dhaka', 0, 'Active', 8, '2024-01-10 19:10:02', NULL, '2024-01-10 19:10:02'),
(4, 'SUN-RA-00015', 'S-RAN00001', 'Supplier Name', 'mayer doa store', '01959279111', 'sharifuljob2020@gmail.com', 'Khluna', 0, 'Active', 15, '2024-02-23 10:36:02', NULL, '2024-02-23 10:36:02'),
(5, 'SUN-SP-00003', 'S-CAS00003', 'Para', '', '', '', '', 5000, 'Active', 8, '2024-02-27 14:18:12', NULL, '2024-02-27 14:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_page_title`
--

CREATE TABLE `tbl_master_page_title` (
  `master_id` int NOT NULL,
  `master_title` varchar(50) NOT NULL,
  `c_master_title` varchar(50) NOT NULL,
  `regby` int NOT NULL,
  `regedt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_page_title`
--

INSERT INTO `tbl_master_page_title` (`master_id`, `master_title`, `c_master_title`, `regby`, `regedt`, `upby`, `update`) VALUES
(1, 'dashboard', 'Dashboard', 1, '2020-09-12 12:08:10', 0, '2020-09-12 06:08:10'),
(2, 'product', 'Product', 1, '2020-09-12 12:08:34', 0, '2020-09-12 06:08:34'),
(3, 'purchase', 'Purchase', 1, '2020-09-12 12:09:01', 0, '2020-09-12 06:09:01'),
(4, 'sales', 'Sales', 1, '2020-09-12 12:09:16', 0, '2020-09-12 06:09:16'),
(5, 'return', 'Return', 1, '2020-09-12 12:09:31', 0, '2020-09-12 06:09:31'),
(6, 'quotation', 'Quotation', 1, '2020-09-12 12:09:48', 0, '2020-09-12 06:09:48'),
(7, 'voucher', 'Voucher', 1, '2020-09-12 12:10:01', 0, '2020-09-12 06:10:01'),
(8, 'users', 'Users', 1, '2020-09-12 12:10:19', 0, '2020-09-12 06:10:19'),
(9, 'report', 'Report', 1, '2020-09-12 12:11:04', 0, '2020-09-12 06:11:04'),
(10, 'setting', 'Setting', 1, '2020-09-12 12:11:16', 0, '2020-09-12 06:11:16'),
(11, 'page_setup', 'Page Setup', 1, '2020-09-12 12:11:41', 0, '2020-09-12 06:11:41'),
(12, 'access_setup', 'Access Setup', 1, '2020-09-12 12:12:06', 0, '2020-09-12 06:12:06'),
(13, 'help_support', 'Help & Support', 1, '2020-09-12 12:39:58', 0, '2020-09-12 06:39:58'),
(14, 'Employee_payment', 'Employee Payment', 1, '2020-11-23 05:05:45', 0, '2020-11-23 05:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pageid` int NOT NULL,
  `master_page` int NOT NULL,
  `pagename` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `regby` int NOT NULL,
  `regdt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int NOT NULL,
  `updt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pageid`, `master_page`, `pagename`, `cname`, `regby`, `regdt`, `upby`, `updt`) VALUES
(1, 1, 'dashboard', 'Dashboard', 1, '2020-09-12 12:13:20', 0, '2020-09-12 06:13:20'),
(2, 2, 'product', 'Product', 1, '2020-09-12 12:14:01', 0, '2020-09-12 06:14:01'),
(3, 3, 'purchase', 'Purchase', 1, '2020-09-12 12:14:53', 0, '2020-09-12 06:14:53'),
(4, 4, 'sales', 'Sales', 1, '2020-09-12 12:18:33', 0, '2020-09-12 06:18:33'),
(5, 5, 'return', 'Return', 1, '2020-09-12 12:18:57', 0, '2020-09-12 06:18:57'),
(6, 6, 'quotation', 'Quotation', 1, '2020-09-12 12:19:15', 0, '2020-09-12 06:19:15'),
(7, 7, 'voucher', 'Voucher', 1, '2020-09-12 12:19:37', 0, '2020-09-12 06:19:37'),
(8, 8, 'users', 'Users', 1, '2020-09-12 12:19:55', 0, '2020-09-12 06:19:55'),
(9, 9, 'report', 'Report', 1, '2020-09-12 12:20:12', 0, '2020-09-12 06:20:12'),
(10, 10, 'setting', 'Setting', 1, '2020-09-12 12:20:27', 0, '2020-09-12 06:20:27'),
(11, 11, 'page_setup', 'Page Setup', 1, '2020-09-12 12:20:50', 0, '2020-09-12 06:20:50'),
(12, 12, 'access_setup', 'Access Setup', 1, '2020-09-12 12:21:13', 0, '2020-09-12 06:21:13'),
(13, 13, 'help_support', 'Help & Support', 1, '2020-09-12 12:40:20', 0, '2020-09-12 06:40:20'),
(14, 14, 'Employee_payment', 'Employee Payment', 1, '2020-11-23 05:06:09', 0, '2020-11-23 05:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_functions`
--

CREATE TABLE `tbl_page_functions` (
  `pfunc_id` int NOT NULL,
  `master` varchar(50) NOT NULL,
  `pageid` int NOT NULL,
  `pfunc_name` varchar(100) DEFAULT NULL,
  `fcname` varchar(100) DEFAULT NULL,
  `regby` int NOT NULL,
  `regdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `updt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page_functions`
--

INSERT INTO `tbl_page_functions` (`pfunc_id`, `master`, `pageid`, `pfunc_name`, `fcname`, `regby`, `regdt`, `upby`, `updt`) VALUES
(1, '2', 2, 'add_product', 'Add Product', 1, '2020-09-12 06:22:32', NULL, '2020-09-12 06:22:32'),
(2, '2', 2, 'view_product', 'View Product', 1, '2020-09-12 06:23:03', NULL, '2020-09-12 06:23:03'),
(3, '2', 2, 'edit_product', 'Edit Product', 1, '2020-09-12 06:23:24', NULL, '2020-09-12 06:23:24'),
(4, '2', 2, 'delete_product', 'Delete Product', 1, '2020-09-12 06:23:48', NULL, '2020-09-12 06:23:48'),
(5, '2', 2, 'store_product', 'Store Product', 1, '2020-09-12 06:24:18', NULL, '2020-09-12 06:24:18'),
(6, '2', 2, 'import_product', 'Import Product', 1, '2020-09-12 06:24:42', NULL, '2020-09-12 06:24:42'),
(7, '3', 3, 'new_purchase', 'New Purchase', 1, '2020-09-12 06:26:01', NULL, '2020-09-12 06:26:01'),
(8, '3', 3, 'edit_purchase', 'Edit Purchase', 1, '2020-09-12 06:26:26', NULL, '2020-09-12 06:26:26'),
(9, '3', 3, 'view_purchase', 'View Purchase', 1, '2020-09-12 06:27:02', NULL, '2020-09-12 06:27:02'),
(10, '3', 3, 'delete_purchase', 'Delete Purchase', 1, '2020-09-12 06:27:27', NULL, '2020-09-12 06:27:27'),
(11, '4', 4, 'new_sale', 'New Sale', 1, '2020-09-12 06:28:54', NULL, '2020-09-12 06:28:54'),
(12, '4', 4, 'view_sale', 'View Sale', 1, '2020-09-12 06:29:11', NULL, '2020-09-12 06:29:11'),
(13, '4', 4, 'edit_sale', 'Edit Sale', 1, '2020-09-12 06:29:35', NULL, '2020-09-12 06:29:35'),
(14, '4', 4, 'delete_sale', 'Delete Sale', 1, '2020-09-12 06:30:30', NULL, '2020-09-12 06:30:30'),
(15, '5', 5, 'new_return', 'New Return', 1, '2020-09-12 06:31:20', NULL, '2020-09-12 06:31:20'),
(16, '5', 5, 'view_return', 'View Return', 1, '2020-09-12 06:31:44', NULL, '2020-09-12 06:31:44'),
(17, '5', 5, 'edit_return', 'Edit Retun', 1, '2020-09-12 06:32:33', NULL, '2020-09-12 06:32:33'),
(18, '5', 5, 'delete_return', 'Delete Return', 1, '2020-09-12 06:33:04', NULL, '2020-09-12 06:33:04'),
(19, '6', 6, 'new_quotation', 'New Quotation', 1, '2020-09-12 06:36:09', NULL, '2020-09-12 06:36:09'),
(20, '6', 6, 'view_quotation', 'View Quotation', 1, '2020-09-12 06:36:42', NULL, '2020-09-12 06:36:42'),
(21, '6', 6, 'edit_quotation', 'Edit Quotation', 1, '2020-09-12 06:37:07', NULL, '2020-09-12 06:37:07'),
(22, '6', 6, 'delete_quotation', 'Delete Quotation', 1, '2020-09-12 06:37:29', NULL, '2020-09-12 06:37:29'),
(23, '7', 7, 'new_voucher', 'New Voucher', 1, '2020-09-12 06:41:17', NULL, '2020-09-12 06:41:17'),
(24, '7', 7, 'view_voucher', 'View Voucher', 1, '2020-09-12 06:41:44', NULL, '2020-09-12 06:41:44'),
(25, '7', 7, 'edit_voucher', 'Edit Voucher', 1, '2020-09-12 06:42:20', NULL, '2020-09-12 06:42:20'),
(26, '7', 7, 'delete_voucher', 'Delete Voucher', 1, '2020-09-12 06:42:38', NULL, '2020-09-12 06:42:38'),
(27, '8', 8, 'customer', 'Customer', 1, '2020-09-12 07:02:31', NULL, '2020-09-12 07:03:42'),
(28, '8', 8, 'supplier', 'Supplier', 1, '2020-09-12 07:03:05', NULL, '2020-09-12 07:03:05'),
(29, '8', 8, 'employee', 'Staff / Employee', 1, '2020-09-12 07:04:06', NULL, '2020-09-12 07:04:06'),
(30, '8', 8, 'user', 'User', 1, '2020-09-12 07:04:28', NULL, '2020-09-12 07:04:28'),
(31, '9', 9, 'sales_report', 'Sales Report', 1, '2020-09-12 07:05:05', NULL, '2020-09-12 07:05:05'),
(32, '9', 9, 'purchase_report', 'Purchase Report', 1, '2020-09-12 07:05:30', NULL, '2020-09-12 07:05:30'),
(33, '9', 9, 'profit_loss_report', 'Profit / Loss Report', 1, '2020-09-12 07:06:08', NULL, '2020-09-12 07:06:08'),
(34, '9', 9, 'sales_purchase_report', 'Sales / Purchase Report', 1, '2020-09-12 07:06:51', NULL, '2020-09-12 07:06:51'),
(35, '9', 9, 'customer_report', 'Customer Report', 1, '2020-09-12 07:07:18', NULL, '2020-09-12 07:07:18'),
(36, '9', 9, 'customer_ledger', 'Customer Ledger', 1, '2020-09-12 07:07:46', NULL, '2020-09-12 07:07:46'),
(37, '9', 9, 'supplier_report', 'Supplier Report', 1, '2020-09-12 07:08:12', NULL, '2020-09-12 07:08:12'),
(38, '9', 9, 'supplier_ledger', 'Supplier Ledger', 1, '2020-09-12 07:08:37', NULL, '2020-09-12 07:08:37'),
(39, '9', 9, 'stock_report', 'Stock Report', 1, '2020-09-12 07:09:04', NULL, '2020-09-12 07:09:04'),
(40, '9', 9, 'voucher_report', 'Voucher Report', 1, '2020-09-12 07:09:40', NULL, '2020-09-12 07:09:40'),
(41, '9', 9, 'daily_report', 'Daily Report', 1, '2020-09-12 07:10:03', NULL, '2020-09-12 07:10:03'),
(42, '9', 9, 'cash_book', 'Cash Book', 1, '2020-09-12 07:10:28', NULL, '2020-09-12 07:10:28'),
(43, '9', 9, 'bank_book', 'Bank Book', 1, '2020-09-12 07:10:59', NULL, '2020-09-12 07:10:59'),
(44, '9', 9, 'mobile_book', 'Mobile Book', 1, '2020-09-12 07:11:25', NULL, '2020-09-12 07:11:25'),
(45, '10', 10, 'category', 'Category', 1, '2020-09-12 07:18:59', NULL, '2020-09-12 07:18:59'),
(46, '10', 10, 'unit', 'Unit', 1, '2020-09-12 07:19:20', NULL, '2020-09-12 07:19:20'),
(47, '10', 10, 'expense_type', 'Expense Type', 1, '2020-09-12 07:19:50', NULL, '2020-09-12 07:19:50'),
(48, '10', 10, 'department', 'Department', 1, '2020-09-12 07:20:13', NULL, '2020-09-12 07:20:13'),
(49, '10', 10, 'bank_account', 'Bank Account', 1, '2020-09-12 07:20:41', NULL, '2020-09-12 07:20:41'),
(50, '10', 10, 'mobile_account', 'Mobile Account', 1, '2020-09-12 07:21:14', NULL, '2020-09-12 07:21:14'),
(51, '10', 10, 'notice', 'Notice', 1, '2020-09-12 07:21:30', NULL, '2020-09-12 07:21:30'),
(52, '10', 10, 'user_type', 'User Type', 1, '2020-09-12 07:22:04', NULL, '2020-09-12 07:22:04'),
(53, '14', 14, 'newPayment', 'New Payment', 1, '2020-11-23 05:06:40', NULL, '2020-11-23 05:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_f_permission`
--

CREATE TABLE `tbl_user_f_permission` (
  `f_id` int NOT NULL,
  `utype` int NOT NULL,
  `compid` varchar(15) NOT NULL,
  `regby` int NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_product` int DEFAULT NULL,
  `view_product` int DEFAULT NULL,
  `edit_product` int DEFAULT NULL,
  `delete_product` int DEFAULT NULL,
  `store_product` int DEFAULT NULL,
  `import_product` int DEFAULT NULL,
  `new_purchase` int DEFAULT NULL,
  `edit_purchase` int DEFAULT NULL,
  `view_purchase` int DEFAULT NULL,
  `delete_purchase` int DEFAULT NULL,
  `new_sale` int DEFAULT NULL,
  `view_sale` int DEFAULT NULL,
  `edit_sale` int DEFAULT NULL,
  `delete_sale` int DEFAULT NULL,
  `new_return` int DEFAULT NULL,
  `view_return` int DEFAULT NULL,
  `edit_return` int DEFAULT NULL,
  `delete_return` int DEFAULT NULL,
  `new_quotation` int DEFAULT NULL,
  `view_quotation` int DEFAULT NULL,
  `edit_quotation` int DEFAULT NULL,
  `delete_quotation` int DEFAULT NULL,
  `new_voucher` int DEFAULT NULL,
  `view_voucher` int DEFAULT NULL,
  `edit_voucher` int DEFAULT NULL,
  `delete_voucher` int DEFAULT NULL,
  `customer` int DEFAULT NULL,
  `supplier` int DEFAULT NULL,
  `employee` int DEFAULT NULL,
  `user` int DEFAULT NULL,
  `sales_report` int DEFAULT NULL,
  `purchase_report` int DEFAULT NULL,
  `profit_loss_report` int DEFAULT NULL,
  `sales_purchase_report` int DEFAULT NULL,
  `customer_report` int DEFAULT NULL,
  `customer_ledger` int DEFAULT NULL,
  `supplier_report` int DEFAULT NULL,
  `supplier_ledger` int DEFAULT NULL,
  `stock_report` int DEFAULT NULL,
  `voucher_report` int DEFAULT NULL,
  `daily_report` int DEFAULT NULL,
  `cash_book` int DEFAULT NULL,
  `bank_book` int DEFAULT NULL,
  `mobile_book` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `unit` int DEFAULT NULL,
  `expense_type` int DEFAULT NULL,
  `department` int DEFAULT NULL,
  `bank_account` int DEFAULT NULL,
  `mobile_account` int DEFAULT NULL,
  `notice` int DEFAULT NULL,
  `user_type` int DEFAULT NULL,
  `newPayment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_f_permission`
--

INSERT INTO `tbl_user_f_permission` (`f_id`, `utype`, `compid`, `regby`, `regdate`, `upby`, `update`, `add_product`, `view_product`, `edit_product`, `delete_product`, `store_product`, `import_product`, `new_purchase`, `edit_purchase`, `view_purchase`, `delete_purchase`, `new_sale`, `view_sale`, `edit_sale`, `delete_sale`, `new_return`, `view_return`, `edit_return`, `delete_return`, `new_quotation`, `view_quotation`, `edit_quotation`, `delete_quotation`, `new_voucher`, `view_voucher`, `edit_voucher`, `delete_voucher`, `customer`, `supplier`, `employee`, `user`, `sales_report`, `purchase_report`, `profit_loss_report`, `sales_purchase_report`, `customer_report`, `customer_ledger`, `supplier_report`, `supplier_ledger`, `stock_report`, `voucher_report`, `daily_report`, `cash_book`, `bank_book`, `mobile_book`, `category`, `unit`, `expense_type`, `department`, `bank_account`, `mobile_account`, `notice`, `user_type`, `newPayment`) VALUES
(18, 2, 'SUN-SP-00003', 6, '2020-09-18 20:09:59', 0, '2020-11-23 05:15:00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(19, 8, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 9, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 10, 'SUN-SP-00003', 8, '2020-09-18 20:41:22', 8, '2022-04-08 18:27:53', 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(758, 92, 'SUN-SP-00003', 8, '2023-02-18 11:24:07', 8, '2023-02-18 05:24:56', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(759, 3, 'SUN-SP-00003', 8, '2023-07-10 16:22:34', 8, '2023-11-21 16:40:54', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(760, 4, 'SUN-SP-00003', 8, '2023-07-10 16:22:40', 0, '2023-07-10 10:22:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(761, 5, 'SUN-SP-00003', 8, '2023-07-10 16:22:43', 0, '2023-07-10 10:22:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(762, 2, 'SUN-SU-00010', 10, '2023-09-18 17:28:48', 0, '2023-09-18 11:28:48', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(763, 2, 'SUN-AF-00011', 11, '2023-09-23 10:44:42', 0, '2023-09-23 04:44:42', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(764, 2, 'SUN-DE-00012', 12, '2023-09-23 10:45:27', 0, '2023-09-23 04:45:27', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(765, 6, 'SUN-DE-00012', 12, '2023-09-23 14:29:21', 0, '2023-09-23 08:29:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(766, 7, 'SUN-DE-00012', 12, '2023-09-23 14:29:52', 0, '2023-09-23 08:29:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(767, 8, 'SUN-DE-00012', 12, '2023-09-25 10:43:25', 0, '2023-09-25 04:43:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(768, 9, 'SUN-DE-00012', 12, '2023-09-25 10:43:59', 0, '2023-09-25 04:43:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(769, 10, 'SUN-DE-00012', 12, '2023-10-21 04:03:38', 0, '2023-10-20 22:03:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(770, 1, '1', 0, '2023-11-04 14:36:00', 0, '2023-11-04 08:36:00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(771, 2, 'SUN-RA-00015', 15, '2023-11-06 00:53:23', 0, '2023-11-05 18:53:23', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(772, 11, 'SUN-SU-00010', 10, '2023-11-17 00:03:46', 0, '2023-11-16 18:03:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_m_permission`
--

CREATE TABLE `tbl_user_m_permission` (
  `uperid` int NOT NULL,
  `utype` int NOT NULL,
  `compid` varchar(15) NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dashboard` int DEFAULT NULL,
  `product` int DEFAULT NULL,
  `purchase` int DEFAULT NULL,
  `sales` int DEFAULT NULL,
  `return` int DEFAULT NULL,
  `quotation` int DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `users` int DEFAULT NULL,
  `report` int DEFAULT NULL,
  `setting` int DEFAULT NULL,
  `page_setup` int DEFAULT NULL,
  `access_setup` int DEFAULT NULL,
  `help_support` int DEFAULT NULL,
  `Employee_payment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_m_permission`
--

INSERT INTO `tbl_user_m_permission` (`uperid`, `utype`, `compid`, `regby`, `regdate`, `upby`, `update`, `dashboard`, `product`, `purchase`, `sales`, `return`, `quotation`, `voucher`, `users`, `report`, `setting`, `page_setup`, `access_setup`, `help_support`, `Employee_payment`) VALUES
(18, 2, 'SUN-SP-00003', 6, '2020-09-18 20:09:59', 0, '2020-11-23 05:12:55', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(19, 8, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 9, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 10, 'SUN-SP-00003', 8, '2020-09-18 20:41:22', 8, '2020-11-23 05:12:51', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, NULL, 0, 1, 1),
(758, 92, 'SUN-SP-00003', 8, '2023-02-18 05:24:07', 8, '2023-02-18 05:24:56', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(759, 3, 'SUN-SP-00003', 8, '2023-07-10 10:22:34', 8, '2023-11-21 16:40:54', 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, NULL, 0, 0, 0),
(760, 4, 'SUN-SP-00003', 8, '2023-07-10 10:22:40', 0, '2023-07-10 10:22:40', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(761, 5, 'SUN-SP-00003', 8, '2023-07-10 10:22:43', 0, '2023-07-10 10:22:43', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(762, 2, 'SUN-SU-00010', 10, '2023-09-18 11:28:48', 0, '2023-09-18 11:28:48', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(763, 2, 'SUN-AF-00011', 11, '2023-09-23 04:44:42', 0, '2023-09-23 04:44:42', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(764, 2, 'SUN-DE-00012', 12, '2023-09-23 04:45:27', 0, '2023-09-23 04:45:27', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(765, 6, 'SUN-DE-00012', 12, '2023-09-23 08:29:21', 0, '2023-09-23 08:29:21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(766, 7, 'SUN-DE-00012', 12, '2023-09-23 08:29:52', 0, '2023-09-23 08:29:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(767, 8, 'SUN-DE-00012', 12, '2023-09-25 04:43:25', 0, '2023-09-25 04:43:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(768, 9, 'SUN-DE-00012', 12, '2023-09-25 04:43:59', 0, '2023-09-25 04:43:59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(769, 10, 'SUN-DE-00012', 12, '2023-10-20 22:03:38', 0, '2023-10-20 22:03:38', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(770, 1, '1', 0, '2023-11-04 08:36:38', 0, '2023-11-04 08:36:38', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(771, 2, 'SUN-RA-00015', 15, '2023-11-05 18:53:23', 0, '2023-11-05 18:53:23', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(772, 11, 'SUN-SU-00010', 10, '2023-11-16 18:03:46', 0, '2023-11-16 18:03:46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_p_permission`
--

CREATE TABLE `tbl_user_p_permission` (
  `pr_id` int NOT NULL,
  `utype` int NOT NULL,
  `compid` varchar(15) NOT NULL,
  `regby` int NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dashboard` int DEFAULT NULL,
  `product` int DEFAULT NULL,
  `purchase` int DEFAULT NULL,
  `sales` int DEFAULT NULL,
  `return` int DEFAULT NULL,
  `quotation` int DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `users` int DEFAULT NULL,
  `report` int DEFAULT NULL,
  `setting` int DEFAULT NULL,
  `page_setup` int DEFAULT NULL,
  `access_setup` int DEFAULT NULL,
  `help_support` int DEFAULT NULL,
  `Employee_payment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_p_permission`
--

INSERT INTO `tbl_user_p_permission` (`pr_id`, `utype`, `compid`, `regby`, `regdate`, `upby`, `update`, `dashboard`, `product`, `purchase`, `sales`, `return`, `quotation`, `voucher`, `users`, `report`, `setting`, `page_setup`, `access_setup`, `help_support`, `Employee_payment`) VALUES
(18, 2, 'SUN-SP-00003', 6, '2020-09-18 20:09:59', 0, '2020-11-23 05:19:32', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(19, 8, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 9, 'SUN-SP-00003', 8, '2020-09-18 20:40:20', 0, '2020-09-18 20:40:20', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 10, 'SUN-SP-00003', 8, '2020-09-18 20:41:22', 8, '2020-11-23 05:35:32', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, NULL, 0, 1, 1),
(758, 92, 'SUN-SP-00003', 8, '2023-02-18 11:24:07', 8, '2023-02-18 05:24:56', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(759, 3, 'SUN-SP-00003', 8, '2023-07-10 16:22:34', 8, '2023-11-21 16:40:54', 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, NULL, 0, 0, 0),
(760, 4, 'SUN-SP-00003', 8, '2023-07-10 16:22:40', 0, '2023-07-10 10:22:40', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(761, 5, 'SUN-SP-00003', 8, '2023-07-10 16:22:43', 0, '2023-07-10 10:22:43', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(762, 2, 'SUN-SU-00010', 10, '2023-09-18 17:28:48', 0, '2023-09-18 11:28:48', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(763, 2, 'SUN-AF-00011', 11, '2023-09-23 10:44:42', 0, '2023-09-23 04:44:42', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(764, 2, 'SUN-DE-00012', 12, '2023-09-23 10:45:27', 0, '2023-09-23 04:45:27', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(765, 6, 'SUN-DE-00012', 12, '2023-09-23 14:29:21', 0, '2023-09-23 08:29:21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(766, 7, 'SUN-DE-00012', 12, '2023-09-23 14:29:52', 0, '2023-09-23 08:29:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(767, 8, 'SUN-DE-00012', 12, '2023-09-25 10:43:25', 0, '2023-09-25 04:43:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(768, 9, 'SUN-DE-00012', 12, '2023-09-25 10:43:59', 0, '2023-09-25 04:43:59', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(769, 10, 'SUN-DE-00012', 12, '2023-10-21 04:03:38', 0, '2023-10-20 22:03:38', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(770, 1, '1', 0, '2023-11-04 14:37:07', 0, '2023-11-04 08:37:07', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(771, 2, 'SUN-RA-00015', 15, '2023-11-06 00:53:23', 0, '2023-11-05 18:53:23', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1),
(772, 11, 'SUN-SU-00010', 10, '2023-11-17 00:03:46', 0, '2023-11-16 18:03:46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `territory`
--

CREATE TABLE `territory` (
  `trid` int NOT NULL,
  `compid` varchar(50) NOT NULL,
  `trName` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `territory`
--

INSERT INTO `territory` (`trid`, `compid`, `trName`, `status`, `regby`, `regdate`, `upby`, `up_date`) VALUES
(1, 'SUN-SP-00003', 'DHA001', 'Active', 8, '2023-07-13 09:42:09', NULL, '2023-07-13 09:42:09'),
(2, 'SUN-SP-00003', 'DHA002', 'Active', 8, '2023-07-13 09:42:12', NULL, '2023-07-13 09:42:12'),
(3, 'SUN-SP-00003', 'CTG001', 'Active', 8, '2023-07-13 09:42:15', NULL, '2023-07-13 09:42:15'),
(6, 'SUN-DE-00012', 'DHA001', 'Active', 12, '2023-09-24 08:37:32', NULL, '2023-09-24 08:37:32'),
(7, 'SUN-DE-00012', 'DHA0012', 'Active', 12, '2023-09-24 08:40:37', 12, '2023-09-24 08:42:31'),
(8, 'SUN-DE-00012', 'DHA002', 'Active', 12, '2023-09-24 08:41:15', NULL, '2023-09-24 08:41:15'),
(9, 'SUN-DE-00012', 'CTG0012', 'Active', 12, '2023-09-24 08:41:26', 12, '2023-09-24 08:41:37'),
(10, 'SUN-AF-00011', 'Dhanmondi', 'Active', 11, '2023-09-25 05:18:38', NULL, '2023-09-25 05:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_account`
--

CREATE TABLE `transfer_account` (
  `ta_id` int NOT NULL,
  `compid` varchar(30) NOT NULL,
  `facType` varchar(15) NOT NULL,
  `facAcno` int NOT NULL,
  `sacType` varchar(15) NOT NULL,
  `sacAcno` int NOT NULL,
  `amount` float NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfer_account`
--

INSERT INTO `transfer_account` (`ta_id`, `compid`, `facType`, `facAcno`, `sacType`, `sacAcno`, `amount`, `note`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'SUN-SP-00003', 'Cash', 4, 'Bank', 2, 4000, '', 8, '2023-10-26 05:05:38', 8, '2024-04-23 22:03:09'),
(2, 'SUN-SP-00003', 'Bank', 2, 'Cash', 4, 12, '', 8, '2024-04-10 08:37:31', NULL, '2024-04-10 08:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int NOT NULL,
  `district_id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    '),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd'),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int NOT NULL,
  `compid` varchar(15) NOT NULL,
  `empid` int NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `compname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userrole` int NOT NULL DEFAULT '2',
  `database_name` varchar(255) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `otp` varchar(6) DEFAULT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock_alert` int NOT NULL DEFAULT '0',
  `stock_alert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `daily_alert` int NOT NULL DEFAULT '0',
  `daily_alert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monthly_alert` int NOT NULL DEFAULT '0',
  `monthly_alert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `compid`, `empid`, `name`, `compname`, `email`, `mobile`, `password`, `userrole`, `database_name`, `photo`, `status`, `otp`, `regby`, `regdate`, `upby`, `update`, `stock_alert`, `stock_alert_date`, `daily_alert`, `daily_alert_date`, `monthly_alert`, `monthly_alert_date`) VALUES
(1, '1', 0, 'Sunshine It', 'Sunshine It', 'admin', '+88017140441844', '123456', 1, '', NULL, 'Active', NULL, 1, '2023-11-04 08:34:02', NULL, '2023-11-29 17:51:19', 0, '2023-11-04 08:34:02', 0, '2023-11-29 17:51:19', 0, '2023-11-29 17:51:19'),
(8, 'SUN-SP-00003', 0, 'Cash Boi', 'Cash Boi', 'sunshine.com.bd@gmail.com', '+8801683470965', '22446688', 2, '', 'icon-5359553_1280.png', 'Active', '260686', NULL, '2020-09-18 14:09:59', 8, '2024-03-15 17:41:58', 1, '2023-01-09 18:00:00', 1, '2024-03-15 17:41:58', 0, '2024-03-15 17:41:58'),
(9, 'SUN-SP-00003', 3, 'Emam Uddin', 'SUNSHINE IT', 'sunshineemam@gmail.com', '+8801714044181', '123456', 3, '', NULL, 'Active', NULL, 8, '2023-08-04 12:25:16', NULL, '2023-10-05 18:08:35', 0, '2023-08-04 12:25:16', 0, '2023-10-05 18:08:35', 0, '2023-10-05 18:08:35'),
(10, 'SUN-SU-00010', 0, 'SUNSHINE IT', 'SUNSHINE IT', '', '+8801714044180', '224466', 2, '', NULL, 'Active', '469283', NULL, '2023-09-18 11:28:48', 10, '2023-11-14 20:00:07', 0, '2023-09-18 11:28:48', 0, '2023-11-14 20:00:07', 0, '2023-11-14 20:00:07'),
(11, 'SUN-AF-00011', 0, 'Afsana', 'Afsana', '', '+8801963649996', '123456', 2, '', 'gicon.jpg', 'Active', NULL, NULL, '2023-09-23 04:44:42', NULL, '2023-09-23 05:18:46', 0, '2023-09-23 04:44:42', 0, '2023-09-23 05:18:46', 0, '2023-09-23 05:18:46'),
(12, 'SUN-DE-00012', 0, 'Demo', 'Demo', '', '+8801714044182', '123456', 2, '', 'userss2.png', 'Active', NULL, NULL, '2023-09-23 04:45:27', NULL, '2023-09-23 04:48:34', 0, '2023-09-23 04:45:27', 0, '2023-09-23 04:48:34', 0, '2023-09-23 04:48:34'),
(13, 'SUN-DE-00012', 6, 'Abu Bakar', 'Demo', '', '+8801526935478', '1234', 7, '', NULL, 'Active', NULL, 12, '2023-09-23 08:31:48', 12, '2023-09-23 08:31:56', 0, '2023-09-23 08:31:48', 0, '2023-09-23 08:31:56', 0, '2023-09-23 08:31:56'),
(14, 'SUN-SP-00003', 1, 'Mohammad Raihan', 'Cash Boi', '', '+8801902664265', '1234', 4, '', NULL, 'Active', NULL, 8, '2023-10-22 09:56:27', 8, '2024-04-10 08:42:24', 0, '2023-10-22 09:56:27', 0, '2024-04-10 08:42:24', 0, '2024-04-10 08:42:24'),
(15, 'SUN-RA-00015', 0, 'Rana Store', 'Rana Store', '', '+8801673528020', '123456', 2, '', NULL, 'Active', NULL, NULL, '2023-11-05 18:53:23', NULL, '2023-11-05 18:53:23', 0, '2023-11-05 18:53:23', 0, '2023-11-05 18:53:23', 0, '2023-11-05 18:53:23'),
(18, 'SUN-SP-00003', 9, 'Rana', 'Cash Boi', '', '+8811223344557', '1234', 4, '', NULL, 'Active', NULL, 8, '2024-04-23 22:06:53', 8, '2024-04-23 22:07:04', 0, '2024-04-23 22:06:53', 0, '2024-04-23 22:07:04', 0, '2024-04-23 22:07:04'),
(23, 'COM-NEV00019', 0, 'Neville Castaneda', 'Neville Castaneda', '', '+8801921145121', '12345678', 2, 'cashboi_com_neville_castaneda_3196', NULL, 'Inactive', NULL, NULL, '2024-05-26 12:47:52', NULL, '2024-05-26 12:52:39', 0, '2024-05-26 12:47:52', 0, '2024-05-26 12:52:39', 0, '2024-05-26 12:52:39'),
(24, 'COM-TES00024', 0, 'Test', 'Test', '', '+8801921141121', '12345678', 2, 'cashboi_com_test_5644', NULL, 'Active', NULL, NULL, '2024-05-26 12:53:09', NULL, '2024-05-26 12:55:16', 0, '2024-05-26 12:53:09', 0, '2024-05-26 12:55:16', 0, '2024-05-26 12:55:16'),
(25, 'COM-DEV00025', 0, 'Dev Shop', 'Dev Shop', '', '+8801736187462', '123456', 2, 'cashboi_com_dev_shop_8170', NULL, 'Active', '072314', NULL, '2024-05-26 12:58:17', 25, '2024-05-26 13:04:32', 0, '2024-05-26 12:58:17', 0, '2024-05-26 13:04:32', 0, '2024-05-26 13:04:32'),
(26, 'COM-ERA00026', 0, 'Erasmus Guerrero', 'Erasmus Guerrero', '', '+8801671562312', '12345678', 2, 'cashboi_com_erasmus_guerrero_5543', NULL, 'Active', NULL, NULL, '2024-05-31 07:11:46', NULL, '2024-05-31 07:13:14', 0, '2024-05-31 07:11:46', 0, '2024-05-31 07:13:14', 0, '2024-05-31 07:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `um_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `regby` int DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`um_id`, `name`, `message`, `image`, `regby`, `regdate`, `upby`, `update`) VALUES
(3, 'Welcome To bestexpressbd.com', 'Welcome To bestexpressbd.com', 'cute_n_tight.jpg', 1, '2020-12-30 06:39:25', 364, '2022-09-25 09:45:32'),
(4, 'Welcome To bestexpressbd.com', 'Welcome To bestexpressbd.com', 'best.png', 110, '2021-07-17 06:17:55', 364, '2022-09-25 09:45:56'),
(5, 'Welcome To bestexpressbd.com', 'Welcome To bestexpressbd.com', 'halal.jpg', 110, '2021-07-17 06:20:03', 364, '2022-09-25 09:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `up_id` int NOT NULL,
  `compid` varchar(50) NOT NULL,
  `package` varchar(30) NOT NULL,
  `ptime` int NOT NULL,
  `amount` float NOT NULL,
  `uid` int NOT NULL,
  `pstatus` int NOT NULL DEFAULT '0',
  `pdate` datetime NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sms_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`up_id`, `compid`, `package`, `ptime`, `amount`, `uid`, `pstatus`, `pdate`, `regby`, `regdate`, `upby`, `update`, `sms_status`) VALUES
(1, 'SUN-SP-00003', 'Month', 4, 499, 8, 1, '2021-09-18 08:09:59', 8, '2023-09-04 17:53:06', 1, '2023-11-22 18:30:24', 0),
(2, 'SUN-SP-00003', 'Month', 4, 499, 8, 1, '2021-09-18 08:09:59', 8, '2023-10-15 09:42:12', 1, '2023-11-22 18:30:28', 0),
(3, 'SUN-SU-00010', 'Month', 4, 499, 10, 0, '2024-09-18 05:28:48', 10, '2023-11-16 18:29:44', NULL, '2023-11-16 18:29:44', 0),
(4, 'SUN-SU-00010', 'Month', 4, 499, 10, 0, '2024-09-18 05:28:48', 10, '2023-11-21 16:38:18', NULL, '2023-11-21 16:38:18', 0),
(5, 'SUN-SP-00003', 'Month', 4, 499, 8, 1, '2021-09-18 08:09:59', 8, '2023-11-21 17:15:32', 1, '2023-11-22 18:30:18', 0),
(6, 'SUN-SP-00003', 'Basic', 4, 4999, 8, 1, '2021-09-18 08:09:59', 1, '2023-11-22 18:27:02', NULL, '2023-11-22 18:27:02', 0),
(7, 'SUN-SP-00003', 'Basic', 1, 500, 8, 1, '2021-10-18 08:09:59', 1, '2023-11-22 18:28:12', NULL, '2023-11-22 18:28:12', 0),
(8, 'SUN-SP-00003', 'Basic', 4, 4999, 8, 1, '2022-10-18 08:09:59', 1, '2023-11-22 18:28:26', NULL, '2023-11-22 18:28:26', 0),
(9, 'SUN-SP-00003', 'Premium', 4, 4999, 8, 1, '2023-10-18 08:09:59', 1, '2023-11-22 18:31:50', NULL, '2023-11-22 18:31:50', 0),
(10, 'SUN-SP-00003', 'Standard', 4, 4999, 8, 1, '2024-10-18 08:09:59', 1, '2023-11-22 18:31:59', NULL, '2023-11-22 18:31:59', 0),
(11, 'SUN-SU-00010', 'Month', 4, 499, 10, 0, '2024-09-18 05:28:48', 10, '2024-01-17 21:23:54', NULL, '2024-01-17 21:23:54', 0),
(12, 'SUN-SP-00003', 'Month', 4, 499, 8, 0, '2025-10-18 08:09:59', 8, '2024-02-21 13:44:05', NULL, '2024-02-21 13:44:05', 0),
(13, 'SUN-SP-00003', 'Month', 4, 499, 8, 0, '2025-10-18 08:09:59', 8, '2024-02-29 05:07:54', NULL, '2024-02-29 05:07:54', 0),
(14, 'SUN-SP-00003', 'Basic', 4, 4999, 8, 0, '2025-10-18 08:09:59', 8, '2024-04-10 08:45:21', NULL, '2024-04-10 08:45:21', 0),
(15, 'SUN-SP-00003', 'Month', 4, 499, 8, 0, '2025-10-18 08:09:59', 8, '2024-04-16 05:04:23', NULL, '2024-04-16 05:04:23', 0),
(16, 'SUN-SP-00003', 'Month', 4, 499, 8, 0, '2025-10-18 08:09:59', 8, '2024-04-27 21:28:33', NULL, '2024-04-27 21:28:33', 0),
(17, 'SUN-SP-00003', 'Basic', 4, 4999, 8, 1, '2025-10-18 08:09:59', 8, '2024-05-15 20:49:52', 1, '2024-05-15 20:50:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaucher`
--

CREATE TABLE `vaucher` (
  `vuid` int NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `voucherdate` date NOT NULL,
  `compid` varchar(100) DEFAULT NULL,
  `customerID` int DEFAULT NULL,
  `empid` int DEFAULT NULL,
  `costType` int DEFAULT NULL,
  `supplier` int DEFAULT NULL,
  `vauchertype` varchar(20) NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `totalamount` float DEFAULT NULL,
  `accountType` varchar(11) DEFAULT NULL,
  `accountNo` int DEFAULT NULL,
  `status` int NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaucher`
--

INSERT INTO `vaucher` (`vuid`, `invoice`, `voucherdate`, `compid`, `customerID`, `empid`, `costType`, `supplier`, `vauchertype`, `reference`, `totalamount`, `accountType`, `accountNo`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'V-CAS00001', '2023-10-26', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 250, 'Cash', 4, 1, 8, '2023-10-26 04:58:13', 8, '2023-10-26 04:58:17'),
(2, 'V-CAS00002', '2023-10-28', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-10-28 19:55:09', 8, '2023-10-28 19:55:13'),
(3, 'V-CAS00003', '2023-10-28', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-10-28 19:55:31', 8, '2023-10-28 19:55:35'),
(4, 'V-CAS00004', '2023-10-30', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 1000, 'Cash', 4, 1, 8, '2023-10-30 17:49:06', 8, '2023-10-30 17:49:12'),
(5, 'V-CAS00005', '2023-11-01', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-11-01 17:16:00', 8, '2023-11-01 17:16:05'),
(6, 'V-CAS00006', '2023-11-01', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-11-01 17:30:21', 8, '2023-11-01 17:30:25'),
(7, 'V-CAS00007', '2023-11-01', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Supplier Pay', '', 20, 'Cash', 4, 1, 8, '2023-11-01 17:30:52', 8, '2023-11-01 17:30:55'),
(8, 'V-SUN00001', '2023-11-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '14 Month Service Charge  (hassantechnobuilders.com ) Next domain Hosting amader Renewal korte hobe', 10500, 'Cash', 3, 1, 10, '2023-11-07 22:15:31', 10, '2023-11-07 22:16:55'),
(9, 'V-SUN00002', '2023-11-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Monthly SEO Bill Nov 2023', 10200, 'Cash', 3, 1, 10, '2023-11-07 22:18:49', 10, '2023-11-07 22:18:53'),
(10, 'V-SUN00003', '2023-11-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Gonoshasto Software Due Payment', 15357, 'Cash', 3, 1, 10, '2023-11-07 22:45:37', 10, '2023-11-07 22:50:29'),
(11, 'V-SUN00004', '2023-11-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 15000, 'Cash', 3, 1, 10, '2023-11-07 22:50:01', 10, '2023-11-07 22:51:31'),
(12, 'V-SUN00005', '2023-11-04', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Aziz Vai Rayerbazar Resirt', 12500, 'Cash', 3, 1, 10, '2023-11-07 22:56:42', 10, '2023-11-07 22:57:35'),
(13, 'V-SUN00006', '2023-11-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Ratan vai Mym', 10000, 'Cash', 3, 1, 10, '2023-11-08 10:15:47', 10, '2023-11-08 10:15:51'),
(14, 'V-SUN00007', '2023-11-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Nahar Corporation', 5000, 'Cash', 3, 1, 10, '2023-11-08 10:17:33', 10, '2023-11-08 10:17:38'),
(15, 'V-SUN00008', '2023-11-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Emam Monthly Salary ', 15000, 'Cash', 3, 1, 10, '2023-11-08 10:19:23', 10, '2023-11-08 10:19:27'),
(16, 'V-SUN00009', '2023-11-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 2100, 'Cash', 3, 1, 10, '2023-11-08 10:21:13', 10, '2023-11-08 10:21:18'),
(17, 'V-SUN00010', '2023-11-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'faysal vai Due Payment for Support charge', 3000, 'Cash', 3, 1, 10, '2023-11-08 10:22:02', 10, '2023-11-08 10:22:06'),
(18, 'V-SUN00011', '2023-11-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Courier Soft Adv Payment', 10000, 'Cash', 3, 1, 10, '2023-11-12 17:50:09', 10, '2023-11-13 06:20:12'),
(19, 'V-SUN00012', '2023-11-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 2500, 'Cash', 3, 1, 10, '2023-11-12 17:51:40', 10, '2023-11-13 06:20:08'),
(20, 'V-SUN00013', '2023-11-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 5400, 'Cash', 3, 1, 10, '2023-11-12 17:57:27', 10, '2023-11-13 06:20:04'),
(21, 'V-CAS00008', '2023-11-12', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-11-12 18:12:21', 8, '2023-11-12 18:12:25'),
(22, 'V-CAS00009', '2023-11-12', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 300, 'Cash', 4, 1, 8, '2023-11-12 18:50:53', 8, '2023-11-12 18:51:00'),
(23, 'V-SUN00014', '2023-11-13', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 1800, 'Cash', 3, 1, 10, '2023-11-13 06:20:53', 10, '2023-11-13 06:20:57'),
(24, 'V-SUN00015', '2023-11-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'sajedul Salary ', 20000, 'Cash', 3, 1, 10, '2023-11-14 06:34:31', 10, '2023-11-14 06:34:35'),
(25, 'V-SUN00016', '2023-11-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', ' Mahiya Elevator/ Uttara', 19000, 'Cash', 3, 1, 10, '2023-11-14 06:37:11', 10, '2023-11-14 06:37:15'),
(26, 'V-SUN00017', '2023-11-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Website Advance Payment/ Taltola', 70000, 'Cash', 3, 1, 10, '2023-11-14 19:17:58', 10, '2023-11-14 19:18:02'),
(27, 'V-SUN00018', '2023-11-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 75125, 'Cash', 3, 1, 10, '2023-11-14 19:23:59', 10, '2023-11-14 19:31:42'),
(28, 'V-SUN00019', '2023-11-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Rampura Client Ref# Emam', 6000, 'Cash', 3, 1, 10, '2023-11-14 19:26:34', 10, '2023-11-14 19:26:40'),
(29, 'V-SUN00020', '2023-11-15', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'sunshine-it.com Hosting Renewal +Bikroy Job POST+Logo Design', 5220, 'Cash', 3, 1, 10, '2023-11-15 13:47:42', 10, '2023-11-15 13:47:49'),
(30, 'V-SUN00021', '2023-11-16', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Personal Expense+Personal Expense', 1000, 'Cash', 3, 1, 10, '2023-11-16 17:26:43', 10, '2023-11-16 17:26:47'),
(31, 'V-SUN00022', '2023-11-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Sohag vai Due Payment Complete', 13000, 'Cash', 3, 1, 10, '2023-11-18 16:01:23', 10, '2023-11-18 16:01:27'),
(32, 'V-SUN00023', '2023-11-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 6500, 'Cash', 3, 1, 10, '2023-11-18 16:02:39', 10, '2023-11-18 16:02:43'),
(33, 'V-SUN00024', '2023-11-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '2 ta Software Advance Payment', 9000, 'Cash', 3, 1, 10, '2023-11-19 13:03:10', 10, '2023-11-19 13:03:14'),
(34, 'V-SUN00025', '2023-11-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 3400, 'Cash', 3, 1, 10, '2023-11-19 13:05:12', 10, '2023-11-19 13:05:16'),
(35, 'V-SUN00026', '2023-11-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 6740, 'Cash', 3, 1, 10, '2023-11-19 16:10:34', 10, '2023-11-19 16:10:43'),
(36, 'V-CAS00010', '2023-11-20', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 89, 'Cash', 4, 1, 8, '2023-11-20 17:20:52', 8, '2023-11-20 17:21:00'),
(37, 'V-SUN00027', '2023-11-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'mirrorparlour.com Software Middle Payment', 7000, 'Cash', 3, 1, 10, '2023-11-20 20:30:23', 10, '2023-11-20 20:30:27'),
(38, 'V-SUN00028', '2023-11-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 21000, 'Cash', 3, 1, 10, '2023-11-20 20:32:38', 10, '2023-11-21 18:36:41'),
(39, 'V-SUN00029', '2023-11-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Ma Salam Enterprise Jatrabari/ Software Due Payment', 9000, 'Cash', 3, 1, 10, '2023-11-21 18:36:09', 10, '2023-11-21 18:36:45'),
(40, 'V-SUN00030', '2023-11-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Norosindi Accounting/Software Advance Payment', 10000, 'Cash', 3, 1, 10, '2023-11-21 18:39:57', 10, '2023-11-21 18:40:01'),
(41, 'V-SUN00031', '2023-11-15', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Software Advance Payment/ kolabagan', 5000, 'Cash', 3, 1, 10, '2023-11-21 18:41:24', 10, '2023-11-21 18:41:28'),
(42, 'V-SUN00032', '2023-11-22', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 8500, 'Cash', 3, 1, 10, '2023-11-22 10:16:02', 10, '2023-11-22 10:16:07'),
(43, 'V-SUN00033', '2023-11-22', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Nahar Corporation', 2000, 'Cash', 3, 1, 10, '2023-11-22 15:12:28', 10, '2023-11-22 15:12:33'),
(44, 'V-SUN00034', '2023-11-22', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense Sohel Rana', 2500, 'Cash', 3, 1, 10, '2023-11-22 15:13:50', 10, '2023-11-22 15:13:54'),
(45, 'V-SUN00035', '2023-11-23', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'jakirtraders Software Due Payment', 11000, 'Cash', 3, 1, 10, '2023-11-23 11:50:39', 10, '2023-11-23 11:50:43'),
(46, 'V-SUN00036', '2023-11-23', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 10000, 'Cash', 3, 1, 10, '2023-11-23 11:52:22', 10, '2023-11-23 11:52:26'),
(47, 'V-SUN00037', '2023-11-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 1100, 'Cash', 3, 1, 10, '2023-11-25 18:08:23', 10, '2023-11-25 18:08:28'),
(48, 'V-SUN00038', '2023-11-26', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Sumon coxbazar Software Advance Payment', 10000, 'Cash', 3, 1, 10, '2023-11-26 05:56:32', 10, '2023-11-26 05:56:36'),
(49, 'V-SUN00039', '2023-11-26', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 10200, 'Cash', 3, 1, 10, '2023-11-26 06:32:05', 10, '2023-11-26 06:32:12'),
(50, 'V-CAS00011', '2023-11-26', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 200, 'Cash', 4, 1, 8, '2023-11-26 16:36:26', 8, '2023-11-26 16:36:39'),
(51, 'V-CAS00012', '2023-11-26', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 10, 'Cash', 4, 1, 8, '2023-11-26 16:54:28', 8, '2023-11-26 16:54:33'),
(52, 'V-CAS00013', '2023-11-26', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 22, 'Cash', 4, 1, 8, '2023-11-26 18:22:41', 8, '2023-11-26 18:23:32'),
(53, 'V-CAS00014', '2023-11-26', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 101, 'Cash', 4, 1, 8, '2023-11-26 18:23:09', 8, '2023-11-26 18:23:21'),
(54, 'V-SUN00040', '2023-11-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'AmarCourier.com.bd / Advance Payment', 25000, 'Cash', 3, 1, 10, '2023-11-27 04:34:59', 10, '2023-11-27 04:38:09'),
(55, 'V-SUN00041', '2023-11-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 8000, 'Cash', 3, 1, 10, '2023-11-27 04:37:32', 10, '2023-11-27 04:38:04'),
(56, 'V-SUN00042', '2023-11-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 35540, 'Cash', 3, 1, 10, '2023-11-27 11:42:25', 10, '2023-11-27 11:42:29'),
(57, 'V-CAS00015', '2023-11-27', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 50, 'Cash', 4, 1, 8, '2023-11-27 20:09:49', 8, '2023-11-27 20:09:53'),
(59, 'V-CAS00017', '2023-11-29', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 100, 'Cash', 4, 1, 8, '2023-11-29 17:04:01', 8, '2023-11-29 17:04:05'),
(60, 'V-CAS00018', '2023-11-29', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 100, 'Cash', 4, 1, 8, '2023-11-29 17:12:08', 8, '2023-11-29 17:12:13'),
(61, 'V-SUN00043', '2023-11-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Babur jonmo din Expense', 10000, 'Cash', 3, 1, 10, '2023-11-30 18:51:49', 10, '2023-11-30 18:51:53'),
(62, 'V-SUN00044', '2023-11-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 3000, 'Cash', 3, 1, 10, '2023-11-30 18:54:17', 10, '2023-11-30 18:54:21'),
(63, 'V-SUN00045', '2023-12-05', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 5400, 'Cash', 3, 1, 10, '2023-12-05 19:07:40', 10, '2023-12-05 19:07:45'),
(64, 'V-SUN00046', '2023-12-03', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5500, 'Cash', 3, 1, 10, '2023-12-05 19:12:02', 10, '2023-12-05 19:12:08'),
(65, 'V-SUN00047', '2023-12-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2023-12-07 05:44:23', 10, '2023-12-07 05:44:29'),
(66, 'V-SUN00048', '2023-12-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 5000, 'Cash', 3, 1, 10, '2023-12-07 05:46:45', 10, '2023-12-07 05:46:49'),
(67, 'V-SUN00049', '2023-12-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Expense', 18500, 'Cash', 3, 1, 10, '2023-12-07 18:18:29', 10, '2023-12-07 18:18:35'),
(68, 'V-SUN00050', '2023-12-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Joynal Vai Dubai', 5000, 'Cash', 3, 1, 10, '2023-12-07 18:20:41', 10, '2023-12-07 18:20:47'),
(69, 'V-SUN00051', '2023-12-07', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 23500, 'Cash', 3, 1, 10, '2023-12-07 18:26:17', 10, '2023-12-07 18:26:24'),
(70, 'V-SUN00052', '2023-12-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 10500, 'Cash', 3, 1, 10, '2023-12-11 20:18:44', 10, '2023-12-11 20:18:49'),
(71, 'V-SUN00053', '2023-12-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '1500 Taka Kom diche', 4500, 'Cash', 3, 1, 10, '2023-12-12 06:05:02', 10, '2023-12-12 06:05:15'),
(72, 'V-SUN00054', '2023-12-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 3300, 'Cash', 3, 1, 10, '2023-12-12 06:05:57', 10, '2023-12-12 06:06:01'),
(73, 'V-SUN00055', '2023-12-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 10000, 'Cash', 3, 1, 10, '2023-12-14 02:39:20', 10, '2023-12-14 02:39:26'),
(74, 'V-SUN00056', '2023-12-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 14840, 'Cash', 3, 1, 10, '2023-12-14 02:41:54', 10, '2023-12-14 02:41:59'),
(75, 'V-SUN00057', '2023-12-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Income', 9500, 'Cash', 3, 1, 10, '2023-12-14 02:42:55', 10, '2023-12-14 02:42:59'),
(76, 'V-SUN00058', '2023-12-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 4300, 'Cash', 3, 1, 10, '2023-12-14 02:43:50', 10, '2023-12-14 02:43:54'),
(77, 'V-SUN00059', '2023-12-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Jobcare', 20000, 'Cash', 3, 1, 10, '2023-12-19 12:17:20', 10, '2023-12-19 12:17:24'),
(78, 'V-SUN00060', '2023-12-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '1 Dec Due theke Due', 8500, 'Cash', 3, 1, 10, '2023-12-19 12:18:05', 10, '2023-12-19 12:23:02'),
(79, 'V-SUN00061', '2023-12-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Office Bhara', 21050, 'Cash', 3, 1, 10, '2023-12-19 12:22:56', 10, '2023-12-19 12:23:06'),
(80, 'V-SUN00062', '2023-12-19', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Dubai Software Ref# Emam', 6000, 'Cash', 3, 1, 10, '2023-12-19 12:23:38', 10, '2023-12-19 12:23:42'),
(81, 'V-SUN00063', '2023-12-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'razzak vai', 5000, 'Cash', 3, 1, 10, '2023-12-21 09:37:46', 10, '2023-12-21 09:39:13'),
(82, 'V-SUN00064', '2023-12-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 4500, 'Cash', 3, 1, 10, '2023-12-21 09:39:06', 10, '2023-12-21 09:39:10'),
(83, 'V-SUN00065', '2023-12-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 1000, 'Cash', 3, 1, 10, '2023-12-21 09:40:20', 10, '2023-12-21 09:40:24'),
(84, 'V-SUN00066', '2023-12-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 10500, 'Cash', 3, 1, 10, '2023-12-21 09:41:03', 10, '2023-12-21 09:41:07'),
(85, 'V-SUN00067', '2023-12-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 8040, 'Cash', 3, 1, 10, '2023-12-21 09:45:51', 10, '2023-12-21 09:45:58'),
(87, 'V-SUN00069', '2023-12-24', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 420, 'Cash', 3, 1, 10, '2023-12-24 11:27:49', 10, '2023-12-24 11:27:56'),
(88, 'V-SUN00070', '2023-12-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Saas renew emam', 4500, 'Cash', 3, 1, 10, '2023-12-25 21:03:24', 10, '2023-12-25 21:03:34'),
(89, 'V-SUN00071', '2023-12-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Dubai 5000 adv', 5000, 'Cash', 3, 1, 10, '2023-12-25 21:06:04', 10, '2023-12-25 21:06:09'),
(90, 'V-SUN00072', '2023-12-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 7570, 'Cash', 3, 1, 10, '2023-12-25 21:09:48', 10, '2023-12-25 21:09:55'),
(91, 'V-SUN00073', '2023-12-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 6000, 'Cash', 3, 1, 10, '2023-12-27 18:27:39', 10, '2023-12-28 07:16:09'),
(92, 'V-SUN00074', '2023-12-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 6000, 'Cash', 3, 1, 10, '2023-12-27 18:29:20', 10, '2023-12-27 18:29:24'),
(93, 'V-SUN00075', '2023-12-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 6540, 'Cash', 3, 1, 10, '2023-12-27 18:30:55', 10, '2023-12-27 18:31:00'),
(94, 'V-SUN00076', '2023-12-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 11200, 'Cash', 3, 1, 10, '2023-12-30 11:53:53', 10, '2023-12-30 11:53:57'),
(95, 'V-SUN00077', '2023-12-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 7000, 'Cash', 3, 1, 10, '2023-12-30 11:55:20', 10, '2023-12-30 11:55:24'),
(96, 'V-SUN00078', '2023-12-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 3000, 'Cash', 3, 1, 10, '2023-12-30 11:56:28', 10, '2023-12-30 11:56:32'),
(97, 'V-SUN00079', '2023-12-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 4000, 'Cash', 3, 1, 10, '2023-12-30 11:56:51', 10, '2023-12-30 11:56:54'),
(98, 'V-SUN00080', '2023-12-30', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 30600, 'Cash', 3, 1, 10, '2023-12-30 11:59:09', 10, '2023-12-30 11:59:15'),
(99, 'V-SUN00081', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 4000, 'Cash', 3, 1, 10, '2023-12-31 04:45:40', 10, '2023-12-31 04:46:51'),
(100, 'V-SUN00082', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 2000, 'Cash', 3, 1, 10, '2023-12-31 04:45:56', 10, '2023-12-31 04:46:47'),
(101, 'V-SUN00083', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 5000, 'Cash', 3, 1, 10, '2023-12-31 04:46:16', 10, '2023-12-31 04:46:43'),
(102, 'V-SUN00084', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 1000, 'Cash', 3, 1, 10, '2023-12-31 04:46:35', 10, '2023-12-31 04:46:39'),
(103, 'V-SUN00085', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'POS Adv Payment', 7000, 'Cash', 3, 1, 10, '2023-12-31 19:46:28', 10, '2023-12-31 19:46:37'),
(104, 'V-SUN00086', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 7500, 'Cash', 3, 1, 10, '2023-12-31 19:48:59', 10, '2023-12-31 19:49:04'),
(105, 'V-SUN00087', '2023-12-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 2000, 'Cash', 3, 1, 10, '2023-12-31 19:53:08', 10, '2023-12-31 19:53:12'),
(106, 'V-SUN00088', '2024-01-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Software 50% Adv Payment', 6000, 'Cash', 3, 1, 10, '2024-01-01 17:19:48', 10, '2024-01-01 17:19:54'),
(107, 'V-SUN00089', '2024-01-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 7500, 'Cash', 3, 1, 10, '2024-01-01 17:21:26', 10, '2024-01-01 17:21:31'),
(108, 'V-SUN00090', '2024-01-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Jatrabari Sales// Ready Inventory', 5000, 'Cash', 3, 1, 10, '2024-01-01 17:22:14', 10, '2024-01-01 17:22:18'),
(109, 'V-SUN00091', '2024-01-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Nayeem Travel client 50% Advance', 7500, 'Cash', 3, 1, 10, '2024-01-08 16:53:22', 10, '2024-01-08 16:53:29'),
(110, 'V-SUN00092', '2024-01-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 37180, 'Cash', 3, 1, 10, '2024-01-08 16:57:50', 10, '2024-01-08 17:03:39'),
(111, 'V-SUN00093', '2024-01-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 14000, 'Cash', 3, 1, 10, '2024-01-08 17:03:27', 10, '2024-01-08 17:03:33'),
(112, 'V-SUN00094', '2024-01-08', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 20370, 'Cash', 3, 1, 10, '2024-01-08 18:37:48', 10, '2024-01-08 18:37:54'),
(113, 'V-SUN00095', '2024-01-10', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Income', 6000, 'Cash', 3, 1, 10, '2024-01-10 19:59:33', 10, '2024-01-10 19:59:37'),
(114, 'V-SUN00096', '2024-01-10', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 6020, 'Cash', 3, 1, 10, '2024-01-10 20:01:22', 10, '2024-01-11 13:31:20'),
(115, 'V-SUN00097', '2024-01-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Website Due Payment/ Cindrella', 6000, 'Cash', 3, 1, 10, '2024-01-11 13:31:57', 10, '2024-01-11 13:32:01'),
(116, 'V-SUN00098', '2024-01-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 6000, 'Cash', 3, 1, 10, '2024-01-11 13:33:40', 10, '2024-01-11 13:33:44'),
(117, 'V-SUN00099', '2024-01-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-01-11 13:34:07', 10, '2024-01-11 13:34:13'),
(118, 'V-SUN00100', '2024-01-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 17040, 'Cash', 3, 1, 10, '2024-01-11 13:35:23', 10, '2024-01-11 13:35:28'),
(119, 'V-SUN00101', '2024-01-13', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'domain Renewal Payment Extra', 380, 'Cash', 3, 1, 10, '2024-01-13 06:02:37', 10, '2024-01-13 06:02:44'),
(120, 'V-SUN00102', '2024-01-13', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-01-13 17:58:45', 10, '2024-01-13 17:58:50'),
(121, 'V-SUN00103', '2024-01-13', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 9555, 'Cash', 3, 1, 10, '2024-01-13 18:05:42', 10, '2024-01-13 18:05:47'),
(122, 'V-SUN00104', '2024-01-13', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Income', 4000, 'Cash', 3, 1, 10, '2024-01-13 18:06:10', 10, '2024-01-13 18:06:13'),
(123, 'V-SUN00105', '2024-01-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Savar/ Rubel Vai Refer', 10000, 'Cash', 3, 1, 10, '2024-01-14 19:28:13', 10, '2024-01-14 19:28:16'),
(124, 'V-SUN00106', '2024-01-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Aziz Vai Website Advance Payment', 10000, 'Cash', 3, 1, 10, '2024-01-14 19:30:35', 10, '2024-01-14 19:30:41'),
(125, 'V-SUN00107', '2024-01-14', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 20210, 'Cash', 3, 1, 10, '2024-01-14 19:32:36', 10, '2024-01-14 19:32:41'),
(126, 'V-SUN00108', '2024-01-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Software Adv Payment', 5000, 'Cash', 3, 1, 10, '2024-01-17 21:09:51', 10, '2024-01-17 21:09:56'),
(127, 'V-SUN00109', '2024-01-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Website Payment', 3000, 'Cash', 3, 1, 10, '2024-01-17 21:10:25', 10, '2024-01-17 21:10:29'),
(128, 'V-SUN00110', '2024-01-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'expense', 16445, 'Cash', 3, 1, 10, '2024-01-17 21:13:40', 10, '2024-01-17 21:13:45'),
(129, 'V-SUN00111', '2024-01-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-01-21 05:26:43', 10, '2024-01-21 05:26:47'),
(130, 'V-SUN00112', '2024-01-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 9250, 'Cash', 3, 1, 10, '2024-01-21 05:31:36', 10, '2024-01-21 05:31:41'),
(131, 'V-SUN00113', '2024-01-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-01-21 11:42:36', 10, '2024-01-21 11:42:41'),
(132, 'V-SUN00114', '2024-01-21', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-01-21 11:43:26', 10, '2024-01-21 11:43:30'),
(133, 'V-SUN00115', '2024-01-23', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Ref# Emam / Electronic Shop Software Advance', 6000, 'Cash', 3, 1, 10, '2024-01-23 13:01:06', 10, '2024-01-23 13:01:10'),
(134, 'V-SUN00116', '2024-01-23', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 4790, 'Cash', 3, 1, 10, '2024-01-23 13:08:14', 10, '2024-01-23 13:08:19'),
(135, 'V-SUN00117', '2024-01-24', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 53935, 'Cash', 3, 1, 10, '2024-01-24 14:42:27', 10, '2024-01-24 14:42:33'),
(136, 'V-SUN00118', '2024-01-24', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Software Adv Payment/ Edu apps', 40000, 'Cash', 3, 1, 10, '2024-01-24 14:43:31', 10, '2024-01-24 14:43:36'),
(137, 'V-SUN00119', '2024-01-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'income', 23000, 'Cash', 3, 1, 10, '2024-01-25 12:16:21', 10, '2024-01-25 12:16:27'),
(138, 'V-SUN00120', '2024-01-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 22570, 'Cash', 3, 1, 10, '2024-01-25 12:19:05', 10, '2024-01-25 12:19:12'),
(139, 'V-SUN00121', '2024-01-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'abaroni Engineering Due Soft payment ', 5000, 'Cash', 3, 1, 10, '2024-01-27 11:36:53', 10, '2024-01-27 11:37:00'),
(140, 'V-SUN00122', '2024-01-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '27 Jan 2024', 11500, 'Cash', 3, 1, 10, '2024-01-27 11:38:35', 10, '2024-01-27 11:38:40'),
(141, 'V-SUN00123', '2024-01-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Dubai POS agent Client', 5000, 'Cash', 3, 1, 10, '2024-01-27 11:39:58', 10, '2024-01-27 11:40:02'),
(142, 'V-SUN00124', '2024-01-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Dubai POS', 5000, 'Cash', 3, 1, 10, '2024-01-31 06:09:02', 10, '2024-01-31 06:10:47'),
(143, 'V-SUN00125', '2024-01-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Pabel vai Ecommerce Landing Page', 3000, 'Cash', 3, 1, 10, '2024-01-31 06:09:36', 10, '2024-01-31 06:10:44'),
(144, 'V-SUN00126', '2024-01-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Tangail POS', 6000, 'Cash', 3, 1, 10, '2024-01-31 06:09:59', 10, '2024-01-31 06:10:40'),
(145, 'V-SUN00127', '2024-01-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Ecommerce Abdullah ', 3000, 'Cash', 3, 1, 10, '2024-01-31 06:10:26', 10, '2024-01-31 06:10:36'),
(146, 'V-SUN00128', '2024-01-31', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Theme Purchase for Course Site ', 7366, 'Cash', 3, 1, 10, '2024-01-31 10:10:00', 10, '2024-01-31 10:10:04'),
(147, 'V-SUN00129', '2024-02-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Project ielts', 5000, 'Cash', 3, 1, 10, '2024-02-01 14:37:38', 10, '2024-02-03 18:25:37'),
(148, 'V-SUN00130', '2024-02-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Union porishod/ nayeem sales', 5000, 'Cash', 3, 1, 10, '2024-02-01 14:39:52', 10, '2024-02-03 18:25:33'),
(149, 'V-SUN00131', '2024-02-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 5000, 'Cash', 3, 1, 10, '2024-02-01 14:41:15', 10, '2024-02-03 18:25:29'),
(150, 'V-SUN00132', '2024-02-03', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 4500, 'Cash', 3, 1, 10, '2024-02-03 18:25:18', 10, '2024-02-03 18:25:23'),
(151, 'V-SUN00133', '2024-02-03', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Website Due Payment/ Emam Ecommerce', 4000, 'Cash', 3, 1, 10, '2024-02-03 18:26:03', 10, '2024-02-03 18:26:07'),
(152, 'V-SUN00134', '2024-02-04', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Mortuja Vai Website Advance ', 6000, 'Cash', 3, 1, 10, '2024-02-04 13:52:09', 10, '2024-02-04 13:52:13'),
(153, 'V-SUN00135', '2024-02-05', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Inventory Client Kustiya ', 7500, 'Cash', 3, 1, 10, '2024-02-05 04:48:48', 10, '2024-02-05 04:48:55'),
(154, 'V-SUN00136', '2024-02-06', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'customized Software Payment ', 18100, 'Cash', 3, 1, 10, '2024-02-06 09:03:25', 10, '2024-02-06 09:03:29'),
(155, 'V-SUN00137', '2024-02-06', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 32150, 'Cash', 3, 1, 10, '2024-02-06 09:04:53', 10, '2024-02-06 09:04:58'),
(156, 'V-SUN00138', '2024-02-09', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense 8+9 Feb', 28280, 'Cash', 3, 1, 10, '2024-02-09 19:53:15', 10, '2024-02-09 19:53:20'),
(157, 'V-SUN00139', '2024-02-09', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 31100, 'Cash', 3, 1, 10, '2024-02-09 19:57:04', 10, '2024-02-09 19:57:09'),
(158, 'V-SUN00140', '2024-02-10', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Chowdhory Computer', 6000, 'Cash', 3, 1, 10, '2024-02-10 17:35:41', 10, '2024-02-10 17:35:45'),
(159, 'V-SUN00141', '2024-02-10', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 4750, 'Cash', 3, 1, 10, '2024-02-10 17:38:13', 10, '2024-02-10 17:38:17'),
(160, 'V-SUN00142', '2024-02-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 6000, 'Cash', 3, 1, 10, '2024-02-11 11:38:15', 10, '2024-02-11 11:38:19'),
(161, 'V-SUN00143', '2024-02-11', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 17100, 'Cash', 3, 1, 10, '2024-02-11 11:39:32', 10, '2024-02-11 11:39:37'),
(162, 'V-SUN00144', '2024-02-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Ruman vai kulaura', 20000, 'Cash', 3, 1, 10, '2024-02-12 10:06:57', 10, '2024-02-12 10:07:01'),
(163, 'V-SUN00145', '2024-02-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 22940, 'Cash', 3, 1, 10, '2024-02-12 10:08:05', 10, '2024-02-12 10:08:10'),
(164, 'V-SUN00146', '2024-02-12', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Lab Asia Client Adv', 3000, 'Cash', 3, 1, 10, '2024-02-12 10:08:42', 10, '2024-02-12 10:08:46'),
(165, 'V-SUN00147', '2024-02-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Manufacture Client / Emam Sales', 9000, 'Cash', 3, 1, 10, '2024-02-17 13:33:30', 10, '2024-02-17 13:33:34'),
(166, 'V-SUN00148', '2024-02-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 12010, 'Cash', 3, 1, 10, '2024-02-17 13:37:50', 10, '2024-02-17 13:37:54'),
(167, 'V-SUN00149', '2024-02-17', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Lab Asia Client ', 2000, 'Cash', 3, 1, 10, '2024-02-17 13:38:22', 10, '2024-02-17 13:38:26'),
(168, 'V-SUN00150', '2024-02-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'kustioya payment', 7500, 'Cash', 3, 1, 10, '2024-02-18 08:57:38', 10, '2024-02-18 08:57:42'),
(169, 'V-SUN00151', '2024-02-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 7750, 'Cash', 3, 1, 10, '2024-02-18 09:09:25', 10, '2024-02-18 09:09:29'),
(170, 'V-SUN00152', '2024-02-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'POS uttara Payment', 16000, 'Cash', 3, 1, 10, '2024-02-20 14:49:55', 10, '2024-02-20 14:49:59'),
(171, 'V-SUN00153', '2024-02-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 15715, 'Cash', 3, 1, 10, '2024-02-20 14:51:52', 10, '2024-02-20 14:52:06'),
(172, 'V-SUN00154', '2024-02-20', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'abdullah vai website ', 3000, 'Cash', 3, 1, 10, '2024-02-20 14:52:34', 10, '2024-02-20 14:52:37'),
(173, 'V-RAN00001', '2024-02-23', 'SUN-RA-00015', NULL, 0, NULL, NULL, 'Debit Voucher', 'food Bill', 50, 'Cash', 5, 1, 15, '2024-02-23 10:46:04', 15, '2024-02-23 10:46:08'),
(174, 'V-SUN00155', '2024-02-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Pabna Payment', 15000, 'Cash', 3, 1, 10, '2024-02-25 10:39:51', 10, '2024-02-25 10:39:55'),
(175, 'V-SUN00156', '2024-02-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 14130, 'Cash', 3, 1, 10, '2024-02-25 10:42:13', 10, '2024-02-25 10:42:17'),
(176, 'V-SUN00157', '2024-02-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 11600, 'Cash', 3, 1, 10, '2024-02-27 18:42:05', 10, '2024-02-27 18:42:15'),
(177, 'V-SUN00158', '2024-02-27', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 10000, 'Cash', 3, 1, 10, '2024-02-27 18:42:58', 10, '2024-02-27 18:43:07'),
(178, 'V-SUN00159', '2024-02-28', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Aziz Lalbag', 5000, 'Cash', 3, 1, 10, '2024-02-28 16:15:26', 10, '2024-02-28 16:15:30'),
(179, 'V-CAS00019', '2024-02-28', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', '', 216, 'Cash', 0, 1, 8, '2024-02-28 17:06:57', 8, '2024-02-28 17:07:06'),
(180, 'V-RAN00002', '2024-02-29', 'SUN-RA-00015', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 20, 'Cash', 5, 1, 15, '2024-02-29 19:37:59', 15, '2024-02-29 19:38:04'),
(181, 'V-SUN00160', '2024-02-29', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 3200, 'Cash', 3, 1, 10, '2024-02-29 20:28:43', 10, '2024-02-29 20:28:48'),
(182, 'V-SUN00161', '2024-03-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Khaled Vai uk', 20000, 'Cash', 3, 1, 10, '2024-03-01 17:44:50', 10, '2024-03-01 17:44:54'),
(183, 'V-SUN00162', '2024-03-01', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'bhara', 20000, 'Cash', 3, 1, 10, '2024-03-01 17:45:13', 10, '2024-03-01 17:45:16'),
(184, 'V-SUN00163', '2024-03-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 10000, 'Cash', 3, 1, 10, '2024-03-18 10:35:13', 10, '2024-03-18 10:43:09'),
(185, 'V-SUN00164', '2024-03-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 12000, 'Cash', 3, 1, 10, '2024-03-18 10:36:21', 10, '2024-03-18 10:43:00'),
(186, 'V-SUN00165', '2024-03-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 10000, 'Cash', 3, 1, 10, '2024-03-18 10:36:57', 10, '2024-03-18 10:42:46'),
(187, 'V-SUN00166', '2024-03-18', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 29400, 'Cash', 3, 1, 10, '2024-03-18 10:42:20', 10, '2024-03-18 10:42:35'),
(188, 'V-SUN00167', '2024-03-25', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', '', 5920, 'Cash', 3, 1, 10, '2024-03-25 05:32:31', 10, '2024-03-25 05:32:38'),
(189, 'V-SUN00168', '2024-03-26', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', 'Pabna Payment', 10000, 'Cash', 3, 1, 10, '2024-03-26 07:06:21', 10, '2024-03-26 07:06:28'),
(190, 'V-SUN00169', '2024-03-26', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 9700, 'Cash', 3, 1, 10, '2024-03-26 07:09:20', 10, '2024-03-26 07:09:38'),
(191, 'V-SUN00170', '2024-03-29', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Credit Voucher', '', 25000, 'Cash', 3, 1, 10, '2024-03-29 11:50:36', 10, '2024-03-29 11:50:40'),
(192, 'V-SUN00171', '2024-03-29', 'SUN-SU-00010', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 29700, 'Cash', 3, 1, 10, '2024-03-29 11:52:12', 10, '2024-03-29 11:52:17'),
(194, 'V-CAS00021', '2024-04-08', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', NULL, 'Cash', 4, 1, 8, '2024-04-08 05:16:09', 8, '2024-04-10 08:31:56'),
(196, 'V-CAS00022', '2024-04-23', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Debit Voucher', 'Expense', 200, 'Cash', 4, 1, 8, '2024-04-23 21:58:20', 8, '2024-04-23 21:58:24'),
(197, 'V-CAS00023', '2024-04-29', 'SUN-SP-00003', NULL, 0, NULL, NULL, 'Credit Voucher', '', 100, 'Cash', 4, 1, 8, '2024-04-29 04:49:08', 8, '2024-04-29 04:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `vaucher_particular`
--

CREATE TABLE `vaucher_particular` (
  `vpid` int NOT NULL,
  `vuid` int NOT NULL,
  `vutype` int NOT NULL COMMENT '1 for income 2 for expense, 3 for supplier',
  `vutid` int NOT NULL,
  `particulars` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaucher_particular`
--

INSERT INTO `vaucher_particular` (`vpid`, `vuid`, `vutype`, `vutid`, `particulars`, `amount`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 1, 1, 1, '', 250, 8, '2023-10-26 04:58:13', NULL, '2023-10-26 04:58:13'),
(2, 2, 1, 19, 'Payment', 50, 8, '2023-10-28 19:55:09', NULL, '2023-10-28 19:55:09'),
(3, 3, 1, 19, 'Payment', 50, 8, '2023-10-28 19:55:31', NULL, '2023-10-28 19:55:31'),
(4, 4, 1, 28, 'Payment', 1000, 8, '2023-10-30 17:49:06', NULL, '2023-10-30 17:49:06'),
(5, 5, 1, 29, 'Payment', 50, 8, '2023-11-01 17:16:00', NULL, '2023-11-01 17:16:00'),
(6, 6, 2, 3, 'office ', 50, 8, '2023-11-01 17:30:21', NULL, '2023-11-01 17:30:21'),
(7, 7, 3, 1, 'eee', 20, 8, '2023-11-01 17:30:52', NULL, '2023-11-01 17:30:52'),
(9, 8, 1, 1, 'hassantechnobuilders.com 14 Month Service Charge ', 10500, 10, '2023-11-07 22:16:33', NULL, '2023-11-07 22:16:33'),
(10, 9, 2, 8, 'Helal Vai Sunshine IT Monthly SEO ', 10200, 10, '2023-11-07 22:18:49', NULL, '2023-11-07 22:18:49'),
(15, 10, 1, 2, 'Software Due Payment', 15357, 10, '2023-11-07 22:50:26', NULL, '2023-11-07 22:50:26'),
(16, 11, 2, 9, 'October Due Salary', 10000, 10, '2023-11-07 22:51:18', NULL, '2023-11-07 22:51:18'),
(17, 11, 2, 10, 'Sunshine It', 3000, 10, '2023-11-07 22:51:18', NULL, '2023-11-07 22:51:18'),
(18, 11, 2, 11, 'Tanjid vai', 2000, 10, '2023-11-07 22:51:18', NULL, '2023-11-07 22:51:18'),
(19, 12, 1, 1, 'Aziz Vai Rayerbazar Resirt', 12500, 10, '2023-11-07 22:56:42', NULL, '2023-11-07 22:56:42'),
(20, 13, 1, 3, 'Website Due Payment', 10000, 10, '2023-11-08 10:15:47', NULL, '2023-11-08 10:15:47'),
(21, 14, 1, 4, 'Nahar Corporation', 5000, 10, '2023-11-08 10:17:33', NULL, '2023-11-08 10:17:33'),
(22, 15, 2, 12, 'Monthly Salary ', 15000, 10, '2023-11-08 10:19:23', NULL, '2023-11-08 10:19:23'),
(23, 16, 2, 13, 'Hsana Vai Website Domain Hosting kina', 1900, 10, '2023-11-08 10:21:13', NULL, '2023-11-08 10:21:13'),
(24, 16, 2, 14, 'Personal Expense', 200, 10, '2023-11-08 10:21:13', NULL, '2023-11-08 10:21:13'),
(25, 17, 1, 1, 'Due Payment for Support charge', 3000, 10, '2023-11-08 10:22:02', NULL, '2023-11-08 10:22:02'),
(26, 18, 1, 6, 'Courier Soft Adv Payment', 10000, 10, '2023-11-12 17:50:09', NULL, '2023-11-12 17:50:09'),
(27, 19, 1, 6, 'Courier Customized', 2500, 10, '2023-11-12 17:51:40', NULL, '2023-11-12 17:51:40'),
(28, 20, 2, 15, '', 300, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(29, 20, 2, 12, 'Uttara client meeting ', 200, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(30, 20, 2, 14, 'Shapla Taka daoya ', 2000, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(31, 20, 2, 14, 'Sohag ', 1900, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(32, 20, 2, 14, 'Sohel Rana office basa miliye ', 1000, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(33, 20, 2, 18, '3000', 0, 10, '2023-11-12 17:57:27', NULL, '2023-11-12 17:57:27'),
(34, 21, 1, 8, 'Payment', 50, 8, '2023-11-12 18:12:21', NULL, '2023-11-12 18:12:21'),
(35, 22, 1, 8, 'INV-CAS00020', 300, 8, '2023-11-12 18:50:53', NULL, '2023-11-12 18:50:53'),
(36, 23, 2, 19, 'Monthly Bill', 1500, 10, '2023-11-13 06:20:53', NULL, '2023-11-13 06:20:53'),
(37, 23, 2, 20, 'Monthly Bill', 300, 10, '2023-11-13 06:20:53', NULL, '2023-11-13 06:20:53'),
(38, 24, 2, 21, 'sajedul Salary ', 20000, 10, '2023-11-14 06:34:31', NULL, '2023-11-14 06:34:31'),
(39, 25, 1, 9, ' Mahiya Elevator/ Uttara', 19000, 10, '2023-11-14 06:37:11', NULL, '2023-11-14 06:37:11'),
(40, 26, 1, 10, 'Website Advance Payment', 70000, 10, '2023-11-14 19:17:58', NULL, '2023-11-14 19:17:58'),
(54, 28, 1, 11, 'Software Due Payment', 6000, 10, '2023-11-14 19:26:34', NULL, '2023-11-14 19:26:34'),
(55, 27, 2, 21, 'mukta', 20000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(56, 27, 2, 21, 'sajedul salary', 4000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(57, 27, 2, 21, 'Emam', 3000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(58, 27, 2, 12, 'Sales Commition', 2700, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(59, 27, 2, 14, 'Abba Ke taka Pathano', 5100, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(60, 27, 2, 22, 'Office Rent', 10000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(61, 27, 2, 27, 'Latifur Vai Cashboi Apps Advance', 10000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(62, 27, 2, 26, 'Ecommerce Theme Purchase', 10125, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(63, 27, 2, 14, 'Shapla/ Babu Jama', 2000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(64, 27, 2, 14, 'Head Phone', 1200, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(65, 27, 2, 24, 'Mosjid dan', 500, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(66, 27, 2, 23, 'Bank agrani Account Rrenew ', 6000, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(67, 27, 2, 29, 'KKML Jaoya/ Sohel Rana', 500, 10, '2023-11-14 19:31:36', NULL, '2023-11-14 19:31:36'),
(68, 29, 2, 30, 'sunshine-it.com Hosting Renewal ', 3550, 10, '2023-11-15 13:47:42', NULL, '2023-11-15 13:47:42'),
(69, 29, 2, 25, 'Bikroy Job POST', 500, 10, '2023-11-15 13:47:42', NULL, '2023-11-15 13:47:42'),
(70, 29, 2, 25, 'Logo Design', 1020, 10, '2023-11-15 13:47:42', NULL, '2023-11-15 13:47:42'),
(71, 29, 2, 16, 'Guest Food// Investor', 150, 10, '2023-11-15 13:47:42', NULL, '2023-11-15 13:47:42'),
(72, 30, 2, 14, 'Personal Expense', 500, 10, '2023-11-16 17:26:43', NULL, '2023-11-16 17:26:43'),
(73, 30, 2, 25, 'Personal Expense', 500, 10, '2023-11-16 17:26:43', NULL, '2023-11-16 17:26:43'),
(74, 31, 1, 6, 'Due Payment Complete', 13000, 10, '2023-11-18 16:01:23', NULL, '2023-11-18 16:01:23'),
(75, 32, 2, 14, 'Personal Expense', 1000, 10, '2023-11-18 16:02:39', NULL, '2023-11-18 16:02:39'),
(76, 32, 2, 15, 'KKML Meeting Expense', 500, 10, '2023-11-18 16:02:39', NULL, '2023-11-18 16:02:39'),
(77, 32, 2, 21, 'Sumon Ex Programmer Salary', 5000, 10, '2023-11-18 16:02:39', NULL, '2023-11-18 16:02:39'),
(78, 33, 1, 15, '2 ta Software Advance Payment', 9000, 10, '2023-11-19 13:03:10', NULL, '2023-11-19 13:03:10'),
(79, 34, 2, 12, 'sales woner', 1000, 10, '2023-11-19 13:05:12', NULL, '2023-11-19 13:05:12'),
(80, 34, 2, 13, 'Domain Hosting for New Client', 2000, 10, '2023-11-19 13:05:12', NULL, '2023-11-19 13:05:12'),
(81, 34, 2, 25, 'office paper Prinnt', 100, 10, '2023-11-19 13:05:12', NULL, '2023-11-19 13:05:12'),
(82, 34, 2, 25, 'Guest food Office', 300, 10, '2023-11-19 13:05:12', NULL, '2023-11-19 13:05:12'),
(83, 35, 2, 11, 'tanjid vai', 4000, 10, '2023-11-19 16:10:34', NULL, '2023-11-19 16:10:34'),
(84, 35, 2, 14, 'personal expennse', 700, 10, '2023-11-19 16:10:34', NULL, '2023-11-19 16:10:34'),
(85, 35, 2, 14, 'abba', 2040, 10, '2023-11-19 16:10:34', NULL, '2023-11-19 16:10:34'),
(86, 36, 2, 3, '', 59, 8, '2023-11-20 17:20:52', NULL, '2023-11-20 17:20:52'),
(87, 36, 2, 6, '', 30, 8, '2023-11-20 17:20:52', NULL, '2023-11-20 17:20:52'),
(88, 37, 1, 16, 'mirrorparlour.com Software Middle Payment', 7000, 10, '2023-11-20 20:30:23', NULL, '2023-11-20 20:30:23'),
(89, 38, 2, 31, 'office current Bill', 6100, 10, '2023-11-20 20:32:38', NULL, '2023-11-20 20:32:38'),
(90, 38, 2, 23, 'Bank Loan Return', 14000, 10, '2023-11-20 20:32:38', NULL, '2023-11-20 20:32:38'),
(91, 38, 2, 15, 'Clinet Meeting', 100, 10, '2023-11-20 20:32:38', NULL, '2023-11-20 20:32:38'),
(92, 38, 2, 14, 'Personal Expense', 800, 10, '2023-11-20 20:32:38', NULL, '2023-11-20 20:32:38'),
(93, 39, 1, 20, 'Software Due Payment', 9000, 10, '2023-11-21 18:36:09', NULL, '2023-11-21 18:36:09'),
(94, 40, 1, 14, 'Software Advance Payment', 10000, 10, '2023-11-21 18:39:57', NULL, '2023-11-21 18:39:57'),
(95, 41, 1, 13, 'Software Advance Payment', 5000, 10, '2023-11-21 18:41:24', NULL, '2023-11-21 18:41:24'),
(96, 42, 2, 12, 'Sales Commition', 1500, 10, '2023-11-22 10:16:02', NULL, '2023-11-22 10:16:02'),
(97, 42, 2, 25, 'Hafijul Vai Payment', 7000, 10, '2023-11-22 10:16:02', NULL, '2023-11-22 10:16:02'),
(98, 43, 1, 4, 'Software Due Payment', 2000, 10, '2023-11-22 15:12:28', NULL, '2023-11-22 15:12:28'),
(99, 44, 2, 14, 'Bazar + Medicine + Shapla', 2400, 10, '2023-11-22 15:13:50', NULL, '2023-11-22 15:13:50'),
(100, 44, 2, 25, 'Bkash Transction Charge', 100, 10, '2023-11-22 15:13:50', NULL, '2023-11-22 15:13:50'),
(101, 45, 1, 15, 'Software Due Payment', 11000, 10, '2023-11-23 11:50:39', NULL, '2023-11-23 11:50:39'),
(102, 46, 2, 12, 'Sales Commition + Convence ', 2000, 10, '2023-11-23 11:52:22', NULL, '2023-11-23 11:52:22'),
(103, 46, 2, 14, 'Shapla Birth Day Market', 3000, 10, '2023-11-23 11:52:22', NULL, '2023-11-23 11:52:22'),
(104, 46, 2, 25, 'Hafiz Vai Freelance work Payment ', 5000, 10, '2023-11-23 11:52:22', NULL, '2023-11-23 11:52:22'),
(105, 47, 2, 16, 'Guest Food', 100, 10, '2023-11-25 18:08:23', NULL, '2023-11-25 18:08:23'),
(106, 47, 2, 14, 'Personal Expense', 1000, 10, '2023-11-25 18:08:23', NULL, '2023-11-25 18:08:23'),
(107, 48, 1, 21, 'Software Advance Payment', 10000, 10, '2023-11-26 05:56:32', NULL, '2023-11-26 05:56:32'),
(108, 49, 2, 11, 'Facebook bost+ Google ad', 5000, 10, '2023-11-26 06:32:05', NULL, '2023-11-26 06:32:05'),
(109, 49, 2, 32, 'bdsatll madhomme 1 Week Bost Ecom/ POS/ Courier', 900, 10, '2023-11-26 06:32:05', NULL, '2023-11-26 06:32:05'),
(110, 49, 2, 13, 'clinic Software Jonno domain and Hosting', 1900, 10, '2023-11-26 06:32:05', NULL, '2023-11-26 06:32:05'),
(111, 49, 2, 13, 'Norosindi Software Jonno domain and Hosting', 1900, 10, '2023-11-26 06:32:05', NULL, '2023-11-26 06:32:05'),
(112, 49, 2, 14, 'Mobile Recharge 300+ Shapla 200', 500, 10, '2023-11-26 06:32:05', NULL, '2023-11-26 06:32:05'),
(113, 50, 2, 3, 'bill', 100, 8, '2023-11-26 16:36:26', NULL, '2023-11-26 16:36:26'),
(114, 50, 2, 4, 'bil2', 100, 8, '2023-11-26 16:36:26', NULL, '2023-11-26 16:36:26'),
(115, 51, 2, 3, 'Current Bill', 10, 8, '2023-11-26 16:54:28', NULL, '2023-11-26 16:54:28'),
(116, 52, 2, 3, '', 10, 8, '2023-11-26 18:22:41', NULL, '2023-11-26 18:22:41'),
(117, 52, 2, 4, '', 12, 8, '2023-11-26 18:22:41', NULL, '2023-11-26 18:22:41'),
(118, 53, 2, 4, '', 56, 8, '2023-11-26 18:23:09', NULL, '2023-11-26 18:23:09'),
(119, 53, 2, 5, '', 45, 8, '2023-11-26 18:23:09', NULL, '2023-11-26 18:23:09'),
(120, 54, 1, 17, 'AmarCourier.com.bd', 25000, 10, '2023-11-27 04:34:59', NULL, '2023-11-27 04:34:59'),
(121, 55, 1, 22, 'POs Client', 8000, 10, '2023-11-27 04:37:32', NULL, '2023-11-27 04:37:32'),
(122, 56, 2, 32, 'facebook Bost', 900, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(123, 56, 2, 25, 'Money Receipt', 1020, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(124, 56, 2, 21, 'Nayeem Salary', 10000, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(125, 56, 2, 21, 'Latifur Vai apps Courier Payment', 5000, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(126, 56, 2, 11, 'fb bost + google ad', 5000, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(127, 56, 2, 14, 'babur Jonmo diner Jonno ', 5000, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(128, 56, 2, 13, 'amar courie domain Purchase .com.bd + host', 4620, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(129, 56, 2, 14, 'Personal Expense', 4000, 10, '2023-11-27 11:42:25', NULL, '2023-11-27 11:42:25'),
(130, 57, 2, 6, 'zzz', 50, 8, '2023-11-27 20:09:49', NULL, '2023-11-27 20:09:49'),
(133, 59, 2, 3, 'bill', 100, 8, '2023-11-29 17:04:01', NULL, '2023-11-29 17:04:01'),
(134, 60, 2, 6, 'bill', 100, 8, '2023-11-29 17:12:08', NULL, '2023-11-29 17:12:08'),
(135, 61, 2, 14, 'Babur jonmo din Expense', 10000, 10, '2023-11-30 18:51:49', NULL, '2023-11-30 18:51:49'),
(136, 62, 1, 23, 'ataur vai Usa ', 3000, 10, '2023-11-30 18:54:17', NULL, '2023-11-30 18:54:17'),
(137, 63, 2, 22, 'Nov Office Due Bhara', 5000, 10, '2023-12-05 19:07:40', NULL, '2023-12-05 19:07:40'),
(138, 63, 2, 14, 'Clinet Meeting Cost', 200, 10, '2023-12-05 19:07:40', NULL, '2023-12-05 19:07:40'),
(139, 63, 2, 14, 'Clinet Meeting Cost', 200, 10, '2023-12-05 19:07:40', NULL, '2023-12-05 19:07:40'),
(140, 64, 1, 22, 'POS Adv Payment', 3500, 10, '2023-12-05 19:12:02', NULL, '2023-12-05 19:12:02'),
(141, 64, 1, 23, 'Babur Jonmo din Oi khna thke Deposit', 2000, 10, '2023-12-05 19:12:02', NULL, '2023-12-05 19:12:02'),
(142, 65, 1, 23, 'the Cozy Nest Website', 5000, 10, '2023-12-07 05:44:23', NULL, '2023-12-07 05:44:23'),
(143, 66, 2, 22, 'Nov due Office Rent', 4000, 10, '2023-12-07 05:46:45', NULL, '2023-12-07 05:46:45'),
(144, 66, 2, 14, 'sohel Meeting + Emam Sales commition', 1000, 10, '2023-12-07 05:46:45', NULL, '2023-12-07 05:46:45'),
(145, 67, 1, 14, 'Software Advance Payment', 10000, 10, '2023-12-07 18:18:29', NULL, '2023-12-07 18:18:29'),
(146, 67, 1, 22, 'Website Advance Payment', 3500, 10, '2023-12-07 18:18:29', NULL, '2023-12-07 18:18:29'),
(147, 67, 1, 22, 'Web+ Software Advance Payment', 5000, 10, '2023-12-07 18:18:29', NULL, '2023-12-07 18:18:29'),
(148, 68, 1, 24, 'Software Advance Payment', 5000, 10, '2023-12-07 18:20:41', NULL, '2023-12-07 18:20:41'),
(149, 69, 2, 21, 'sumon Due Salary', 5000, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(150, 69, 2, 14, 'Abba Bkash Pathano Office Due Loan Return', 10000, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(151, 69, 2, 14, 'Babur Jonmo diner Due Return', 5000, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(152, 69, 2, 13, 'Domain Hosting@', 1900, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(153, 69, 2, 12, 'Sales Commition', 1100, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(154, 69, 2, 14, 'sohel Rana ', 500, 10, '2023-12-07 18:26:18', NULL, '2023-12-07 18:26:18'),
(155, 70, 2, 21, 'sajedul salary', 10000, 10, '2023-12-11 20:18:44', NULL, '2023-12-11 20:18:44'),
(156, 70, 2, 14, 'Personal Expense', 500, 10, '2023-12-11 20:18:44', NULL, '2023-12-11 20:18:44'),
(157, 71, 1, 16, 'mirrior Due Payment', 4500, 10, '2023-12-12 06:05:02', NULL, '2023-12-12 06:05:02'),
(158, 72, 2, 21, 'Office Khala', 3000, 10, '2023-12-12 06:05:57', NULL, '2023-12-12 06:05:57'),
(159, 72, 2, 30, 'ABCI bd Aziz Vai Lalbag Hopsting kina', 300, 10, '2023-12-12 06:05:57', NULL, '2023-12-12 06:05:57'),
(160, 73, 1, 25, 'APPS final Payment', 10000, 10, '2023-12-14 02:39:20', NULL, '2023-12-14 02:39:20'),
(161, 74, 2, 21, 'Emam Salary', 12000, 10, '2023-12-14 02:41:54', NULL, '2023-12-14 02:41:54'),
(162, 74, 2, 11, 'pos bost', 2040, 10, '2023-12-14 02:41:54', NULL, '2023-12-14 02:41:54'),
(163, 74, 2, 25, 'Mobile Recharge emam', 300, 10, '2023-12-14 02:41:54', NULL, '2023-12-14 02:41:54'),
(164, 74, 2, 14, 'Expense', 500, 10, '2023-12-14 02:41:54', NULL, '2023-12-14 02:41:54'),
(165, 75, 1, 16, 'Payment', 4500, 10, '2023-12-14 02:42:55', NULL, '2023-12-14 02:42:55'),
(166, 75, 1, 24, 'Payment', 5000, 10, '2023-12-14 02:42:55', NULL, '2023-12-14 02:42:55'),
(167, 76, 2, 18, 'Office Bkhala', 3000, 10, '2023-12-14 02:43:50', NULL, '2023-12-14 02:43:50'),
(168, 76, 2, 14, 'Sohel Rana', 1000, 10, '2023-12-14 02:43:50', NULL, '2023-12-14 02:43:50'),
(169, 76, 2, 14, 'Client Meeting', 300, 10, '2023-12-14 02:43:50', NULL, '2023-12-14 02:43:50'),
(170, 77, 1, 10, 'Payment Received ', 20000, 10, '2023-12-19 12:17:20', NULL, '2023-12-19 12:17:20'),
(171, 78, 2, 9, '1 Dec Due theke', 8500, 10, '2023-12-19 12:18:05', NULL, '2023-12-19 12:18:05'),
(172, 79, 2, 22, 'Office Bhara', 11000, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(173, 79, 2, 14, 'Shapla 2000', 2000, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(174, 79, 2, 25, 'Sohel Vai Graphics Design', 1000, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(175, 79, 2, 25, 'Rahat PHP Intern', 1000, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(176, 79, 2, 25, 'Ecommerce biggapon Advance', 510, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(177, 79, 2, 11, 'Tanjid Fb bost ', 2040, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(178, 79, 2, 14, 'Personal Expense', 400, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(179, 79, 2, 16, 'Office food', 100, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(180, 79, 2, 12, 'Sales Commition', 1100, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(181, 79, 2, 13, 'Domain Hosting ', 1900, 10, '2023-12-19 12:22:56', NULL, '2023-12-19 12:22:56'),
(182, 80, 1, 22, 'Dubai Software', 6000, 10, '2023-12-19 12:23:38', NULL, '2023-12-19 12:23:38'),
(183, 81, 1, 26, 'Software Advance Payment', 5000, 10, '2023-12-21 09:37:46', NULL, '2023-12-21 09:37:46'),
(184, 82, 1, 22, 'Software Adv Payment ', 4500, 10, '2023-12-21 09:39:06', NULL, '2023-12-21 09:39:06'),
(185, 83, 1, 27, 'Website Advance Payment', 1000, 10, '2023-12-21 09:40:20', NULL, '2023-12-21 09:40:20'),
(186, 84, 2, 21, 'sajedul salary', 10200, 10, '2023-12-21 09:41:03', NULL, '2023-12-21 09:41:03'),
(187, 84, 2, 14, 'Personal Expense', 300, 10, '2023-12-21 09:41:03', NULL, '2023-12-21 09:41:03'),
(188, 85, 2, 25, 'Loan Return Adnban vai ', 5000, 10, '2023-12-21 09:45:51', NULL, '2023-12-21 09:45:51'),
(189, 85, 2, 25, 'Ad Create ', 2040, 10, '2023-12-21 09:45:51', NULL, '2023-12-21 09:45:51'),
(190, 85, 2, 14, 'Personal Expense', 1000, 10, '2023-12-21 09:45:51', NULL, '2023-12-21 09:45:51'),
(192, 87, 2, 15, 'client meeting KKML', 420, 10, '2023-12-24 11:27:49', NULL, '2023-12-24 11:27:49'),
(193, 88, 1, 22, 'Saas renew ', 4500, 10, '2023-12-25 21:03:24', NULL, '2023-12-25 21:03:24'),
(194, 89, 1, 29, 'Dubai client', 5000, 10, '2023-12-25 21:06:04', NULL, '2023-12-25 21:06:04'),
(195, 90, 2, 14, 'Hasan loan back', 1000, 10, '2023-12-25 21:09:48', NULL, '2023-12-25 21:09:48'),
(196, 90, 2, 14, 'Tanjid loan back', 1000, 10, '2023-12-25 21:09:48', NULL, '2023-12-25 21:09:48'),
(197, 90, 2, 31, 'Current Bill', 4820, 10, '2023-12-25 21:09:48', NULL, '2023-12-25 21:09:48'),
(198, 90, 2, 14, 'Personal Expense', 750, 10, '2023-12-25 21:09:48', NULL, '2023-12-25 21:09:48'),
(199, 91, 1, 30, 'Website Advance Payment', 6000, 10, '2023-12-27 18:27:39', NULL, '2023-12-27 18:27:39'),
(200, 92, 1, 31, 'Software full Payment', 6000, 10, '2023-12-27 18:29:20', NULL, '2023-12-27 18:29:20'),
(201, 93, 2, 14, 'Personal Expense', 2100, 10, '2023-12-27 18:30:55', NULL, '2023-12-27 18:30:55'),
(202, 93, 2, 13, 'Netrokonar jonno', 1900, 10, '2023-12-27 18:30:55', NULL, '2023-12-27 18:30:55'),
(203, 93, 2, 13, '2 ta Domain  Hosting', 2040, 10, '2023-12-27 18:30:55', NULL, '2023-12-27 18:30:55'),
(204, 93, 2, 25, 'Bank Kete Niche ', 500, 10, '2023-12-27 18:30:55', NULL, '2023-12-27 18:30:55'),
(205, 94, 1, 21, 'Payment Received ', 11200, 10, '2023-12-30 11:53:53', NULL, '2023-12-30 11:53:53'),
(206, 95, 1, 32, 'Website Due Payment', 7000, 10, '2023-12-30 11:55:20', NULL, '2023-12-30 11:55:20'),
(207, 96, 1, 27, 'Due Payment ', 3000, 10, '2023-12-30 11:56:28', NULL, '2023-12-30 11:56:28'),
(208, 97, 1, 22, 'Payment Collect', 4000, 10, '2023-12-30 11:56:51', NULL, '2023-12-30 11:56:51'),
(209, 98, 2, 14, 'Shapla Taka Daoya ', 3000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(210, 98, 2, 14, 'Gura  + Bazar', 1600, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(211, 98, 2, 14, 'Guest Food', 5000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(212, 98, 2, 21, 'Hafijul vai ', 10000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(213, 98, 2, 25, 'Adnan Vai Taka BAck', 5000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(214, 98, 2, 21, 'Latifur vai ', 4000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(215, 98, 2, 11, 'bost ', 2000, 10, '2023-12-30 11:59:09', NULL, '2023-12-30 11:59:09'),
(216, 99, 1, 21, 'Software Due Payment', 4000, 10, '2023-12-31 04:45:40', NULL, '2023-12-31 04:45:40'),
(217, 100, 1, 26, 'Payment', 2000, 10, '2023-12-31 04:45:56', NULL, '2023-12-31 04:45:56'),
(218, 101, 2, 21, 'Mukta salary', 5000, 10, '2023-12-31 04:46:16', NULL, '2023-12-31 04:46:16'),
(219, 102, 2, 14, 'Personal Expense', 1000, 10, '2023-12-31 04:46:35', NULL, '2023-12-31 04:46:35'),
(220, 103, 1, 33, 'POS Adv Payment', 7000, 10, '2023-12-31 19:46:28', NULL, '2023-12-31 19:46:28'),
(221, 104, 2, 11, 'fb bost', 4000, 10, '2023-12-31 19:48:59', NULL, '2023-12-31 19:48:59'),
(222, 104, 2, 21, 'hafijul vai', 1700, 10, '2023-12-31 19:48:59', NULL, '2023-12-31 19:48:59'),
(223, 104, 2, 25, 'City bank katche', 300, 10, '2023-12-31 19:48:59', NULL, '2023-12-31 19:48:59'),
(224, 104, 2, 14, 'Sohel Personal Expense', 1500, 10, '2023-12-31 19:48:59', NULL, '2023-12-31 19:48:59'),
(225, 105, 1, 26, 'Payment', 2000, 10, '2023-12-31 19:53:08', NULL, '2023-12-31 19:53:08'),
(226, 106, 1, 34, 'Software 50% Adv Payment', 6000, 10, '2024-01-01 17:19:48', NULL, '2024-01-01 17:19:48'),
(227, 107, 2, 21, 'Nayeem Salary', 5000, 10, '2024-01-01 17:21:26', NULL, '2024-01-01 17:21:26'),
(228, 107, 2, 25, 'client Meeting / Narasindi', 700, 10, '2024-01-01 17:21:26', NULL, '2024-01-01 17:21:26'),
(229, 107, 2, 14, 'Personal Expense', 300, 10, '2024-01-01 17:21:26', NULL, '2024-01-01 17:21:26'),
(230, 107, 2, 21, 'emam Sales Commition+ Convince ', 1500, 10, '2024-01-01 17:21:26', NULL, '2024-01-01 17:21:26'),
(231, 108, 1, 22, 'Jatrabari Sales// Ready Inventory', 5000, 10, '2024-01-01 17:22:14', NULL, '2024-01-01 17:22:14'),
(232, 109, 1, 35, 'Travel client 50% Advance', 7500, 10, '2024-01-08 16:53:22', NULL, '2024-01-08 16:53:22'),
(233, 110, 2, 15, 'Kkml meeting ', 400, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(234, 110, 2, 14, 'Mosjid a dan ', 500, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(235, 110, 2, 21, 'Nayeem sales Commition', 750, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(236, 110, 2, 21, 'Sajedul salary', 20370, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(237, 110, 2, 14, 'Personal Expense', 4000, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(238, 110, 2, 21, 'Sajedul+ Mukta+ Nayeem+ Sohel', 11160, 10, '2024-01-08 16:57:50', NULL, '2024-01-08 16:57:50'),
(239, 111, 1, 36, 'Dubai islam Engineer workshop', 3000, 10, '2024-01-08 17:03:27', NULL, '2024-01-08 17:03:27'),
(240, 111, 1, 31, 'Website Advance Payment', 5000, 10, '2024-01-08 17:03:27', NULL, '2024-01-08 17:03:27'),
(241, 111, 1, 35, 'Ittefak more', 6000, 10, '2024-01-08 17:03:27', NULL, '2024-01-08 17:03:27'),
(242, 112, 2, 21, 'Sajedul Salary ', 20370, 10, '2024-01-08 18:37:48', NULL, '2024-01-08 18:37:48'),
(243, 113, 1, 38, 'Website adv Payment', 6000, 10, '2024-01-10 19:59:33', NULL, '2024-01-10 19:59:33'),
(244, 114, 2, 30, 'sunshine.com.bd Renewal', 3010, 10, '2024-01-10 20:01:22', NULL, '2024-01-10 20:01:22'),
(245, 114, 2, 8, 'Tips', 510, 10, '2024-01-10 20:01:22', NULL, '2024-01-10 20:01:22'),
(246, 114, 2, 21, 'Nayeem sales Commition', 310, 10, '2024-01-10 20:01:22', NULL, '2024-01-10 20:01:22'),
(247, 114, 2, 13, 'bondon Domain', 1890, 10, '2024-01-10 20:01:22', NULL, '2024-01-10 20:01:22'),
(248, 114, 2, 14, 'Mosjid Dan+ Others', 300, 10, '2024-01-10 20:01:22', NULL, '2024-01-10 20:01:22'),
(249, 115, 1, 30, 'Website Due Payment', 6000, 10, '2024-01-11 13:31:57', NULL, '2024-01-11 13:31:57'),
(250, 116, 1, 10, 'Hosting Payment Complete', 6000, 10, '2024-01-11 13:33:40', NULL, '2024-01-11 13:33:40'),
(251, 117, 1, 31, 'Website Due Payment', 5000, 10, '2024-01-11 13:34:07', NULL, '2024-01-11 13:34:07'),
(252, 118, 2, 21, 'Emam Salary', 5000, 10, '2024-01-11 13:35:23', NULL, '2024-01-11 13:35:23'),
(253, 118, 2, 21, 'Mukta salary', 5000, 10, '2024-01-11 13:35:23', NULL, '2024-01-11 13:35:23'),
(254, 118, 2, 13, 'Jobcare', 1940, 10, '2024-01-11 13:35:23', NULL, '2024-01-11 13:35:23'),
(255, 118, 2, 21, 'Rahat', 5050, 10, '2024-01-11 13:35:23', NULL, '2024-01-11 13:35:23'),
(256, 118, 2, 14, 'others', 50, 10, '2024-01-11 13:35:23', NULL, '2024-01-11 13:35:23'),
(257, 119, 1, 39, 'domain Renewal Payment Extra', 380, 10, '2024-01-13 06:02:37', NULL, '2024-01-13 06:02:37'),
(258, 120, 1, 40, 'Software Adv Payment', 5000, 10, '2024-01-13 17:58:45', NULL, '2024-01-13 17:58:45'),
(259, 121, 2, 14, 'Shapla Taka Daoya + Personal', 1220, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(260, 121, 2, 19, 'Internet Bill', 1500, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(261, 121, 2, 13, 'Domain Hosting Purchase', 1900, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(262, 121, 2, 29, 'Maona client Meeting', 500, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(263, 121, 2, 14, 'office food ', 100, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(264, 121, 2, 20, 'moyla', 300, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(265, 121, 2, 21, 'emam Uddin', 4000, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(266, 121, 2, 25, 'Print', 35, 10, '2024-01-13 18:05:42', NULL, '2024-01-13 18:05:42'),
(267, 122, 1, 22, 'agrobd', 4000, 10, '2024-01-13 18:06:10', NULL, '2024-01-13 18:06:10'),
(268, 123, 1, 41, 'Savar/ Rubel Vai Refer', 10000, 10, '2024-01-14 19:28:13', NULL, '2024-01-14 19:28:13'),
(269, 124, 1, 42, 'Website Advance Payment', 10000, 10, '2024-01-14 19:30:35', NULL, '2024-01-14 19:30:35'),
(270, 125, 2, 21, 'Rahat', 3000, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(271, 125, 2, 13, 'New Softarte jonno savar', 1900, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(272, 125, 2, 29, 'emam', 110, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(273, 125, 2, 14, 'Basar jonno adv', 5000, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(274, 125, 2, 25, 'Helal Vai Loan Taka Return', 10000, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(275, 125, 2, 15, 'Banani Meeting', 200, 10, '2024-01-14 19:32:36', NULL, '2024-01-14 19:32:36'),
(276, 126, 1, 43, 'Software Adv Payment', 5000, 10, '2024-01-17 21:09:51', NULL, '2024-01-17 21:09:51'),
(277, 127, 1, 38, 'Website Payment', 3000, 10, '2024-01-17 21:10:25', NULL, '2024-01-17 21:10:25'),
(278, 128, 2, 21, 'Nayeem', 5000, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(279, 128, 2, 25, 'khala', 3000, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(280, 128, 2, 25, 'Bank Loan Jonno', 5000, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(281, 128, 2, 25, 'Generator Tel+ Service', 1000, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(282, 128, 2, 13, 'HK ', 1730, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(283, 128, 2, 12, 'sales Commition', 715, 10, '2024-01-17 21:13:40', NULL, '2024-01-17 21:13:40'),
(284, 129, 1, 22, 'Rampura Website Livepro', 5000, 10, '2024-01-21 05:26:43', NULL, '2024-01-21 05:26:43'),
(285, 130, 2, 21, 'Emam Due Salary ', 4000, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(286, 130, 2, 14, 'Sohel Rana Personal', 1000, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(287, 130, 2, 14, 'Sohel Basa Gas', 1650, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(288, 130, 2, 14, 'CRM Client Due Loan', 2000, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(289, 130, 2, 15, 'Rahat Client Meeting', 300, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(290, 130, 2, 14, 'Personal Expense', 300, 10, '2024-01-21 05:31:36', NULL, '2024-01-21 05:31:36'),
(291, 131, 1, 42, 'Payment', 5000, 10, '2024-01-21 11:42:36', NULL, '2024-01-21 11:42:36'),
(292, 132, 2, 11, 'bdstall+ Tanjid vai ', 4000, 10, '2024-01-21 11:43:26', NULL, '2024-01-21 11:43:26'),
(293, 132, 2, 13, 'Domain Kina', 1000, 10, '2024-01-21 11:43:26', NULL, '2024-01-21 11:43:26'),
(294, 133, 1, 22, 'Electronic Shop Software Advance', 6000, 10, '2024-01-23 13:01:06', NULL, '2024-01-23 13:01:06'),
(295, 134, 2, 31, 'office current Bill', 4000, 10, '2024-01-23 13:08:14', NULL, '2024-01-23 13:08:14'),
(296, 134, 2, 14, 'Personal Expense', 500, 10, '2024-01-23 13:08:14', NULL, '2024-01-23 13:08:14'),
(297, 134, 2, 25, 'Office Food', 70, 10, '2024-01-23 13:08:14', NULL, '2024-01-23 13:08:14'),
(298, 134, 2, 25, 'Paper Print', 220, 10, '2024-01-23 13:08:14', NULL, '2024-01-23 13:08:14'),
(299, 135, 2, 22, 'Office Bhara', 20000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(300, 135, 2, 31, 'office current Bill', 4000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(301, 135, 2, 14, 'sohel Rana / Bazar', 1000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(302, 135, 2, 25, 'Bank Loan Jonno expense Rayhan Vai', 11530, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(303, 135, 2, 21, 'Nayeem Salary', 5000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(304, 135, 2, 21, 'Mukta salary', 5000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(305, 135, 2, 25, 'Sajib Staff Biye ', 5000, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(306, 135, 2, 0, 'print', 160, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(307, 135, 2, 13, '2 ta domain Purchase ', 2145, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(308, 135, 2, 25, 'Client Meeting', 100, 10, '2024-01-24 14:42:27', NULL, '2024-01-24 14:42:27'),
(309, 136, 1, 44, 'Software Adv Payment', 40000, 10, '2024-01-24 14:43:31', NULL, '2024-01-24 14:43:31'),
(310, 137, 1, 36, 'Hasan Vai Website Due Payment', 12000, 10, '2024-01-25 12:16:21', NULL, '2024-01-25 12:16:21'),
(311, 137, 1, 36, 'Jatrabari Resturent', 6000, 10, '2024-01-25 12:16:21', NULL, '2024-01-25 12:16:21'),
(312, 137, 1, 36, 'Rajbari Software ', 5000, 10, '2024-01-25 12:16:21', NULL, '2024-01-25 12:16:21'),
(313, 138, 2, 21, 'hafijul', 12300, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(314, 138, 2, 25, 'Alfaz vai loan Back', 4000, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(315, 138, 2, 13, 'Hosting  Kina Hasan Vai Jonno', 850, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(316, 138, 2, 25, 'Sales Commition Mahmuda Trading', 2000, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(317, 138, 2, 11, 'BDstall facebook bost ', 1920, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(318, 138, 2, 21, 'rahat', 500, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(319, 138, 2, 14, 'Expense', 1000, 10, '2024-01-25 12:19:05', NULL, '2024-01-25 12:19:05'),
(320, 139, 1, 43, 'Due Payment', 5000, 10, '2024-01-27 11:36:53', NULL, '2024-01-27 11:36:53'),
(321, 140, 2, 14, 'Persnal Bazar', 1500, 10, '2024-01-27 11:38:35', NULL, '2024-01-27 11:38:35'),
(322, 140, 2, 21, 'Mukta Due Salary', 5000, 10, '2024-01-27 11:38:35', NULL, '2024-01-27 11:38:35'),
(323, 140, 2, 21, 'Helal Vai SEO Payment', 5000, 10, '2024-01-27 11:38:35', NULL, '2024-01-27 11:38:35'),
(324, 141, 1, 36, 'Dubai POS agent Client', 5000, 10, '2024-01-27 11:39:58', NULL, '2024-01-27 11:39:58'),
(325, 142, 1, 36, 'Dubai POS', 5000, 10, '2024-01-31 06:09:02', NULL, '2024-01-31 06:09:02'),
(326, 143, 1, 36, 'Pabel vai Ecommerce Landing Page', 3000, 10, '2024-01-31 06:09:36', NULL, '2024-01-31 06:09:36'),
(327, 144, 1, 36, 'Tangail POS', 6000, 10, '2024-01-31 06:09:59', NULL, '2024-01-31 06:09:59'),
(328, 145, 1, 36, 'Ecommerce Abdullah ', 3000, 10, '2024-01-31 06:10:26', NULL, '2024-01-31 06:10:26'),
(329, 146, 2, 26, 'Theme Purchase for Course Site ', 7366, 10, '2024-01-31 10:10:00', NULL, '2024-01-31 10:10:00'),
(330, 147, 1, 44, 'Adv payment ', 5000, 10, '2024-02-01 14:37:38', NULL, '2024-02-01 14:37:38'),
(331, 148, 1, 45, 'Website payment', 5000, 10, '2024-02-01 14:39:52', NULL, '2024-02-01 14:39:52'),
(332, 149, 1, 36, 'Saifulful vai Dresspro', 3000, 10, '2024-02-01 14:41:15', NULL, '2024-02-01 14:41:15'),
(333, 149, 1, 36, 'Monir vai ', 2000, 10, '2024-02-01 14:41:15', NULL, '2024-02-01 14:41:15'),
(334, 150, 2, 21, 'rahat jonno joma', 2500, 10, '2024-02-03 18:25:18', NULL, '2024-02-03 18:25:18'),
(335, 150, 2, 25, 'food', 500, 10, '2024-02-03 18:25:18', NULL, '2024-02-03 18:25:18'),
(336, 150, 2, 14, 'Personal Expense', 500, 10, '2024-02-03 18:25:18', NULL, '2024-02-03 18:25:18'),
(337, 150, 2, 12, 'Sales Commition + Convence ', 1000, 10, '2024-02-03 18:25:18', NULL, '2024-02-03 18:25:18'),
(338, 151, 1, 22, 'Website Due Payment', 4000, 10, '2024-02-03 18:26:03', NULL, '2024-02-03 18:26:03'),
(339, 152, 1, 36, 'Mortuja Vai Website Advance ', 6000, 10, '2024-02-04 13:52:09', NULL, '2024-02-04 13:52:09'),
(340, 153, 1, 46, 'Inventory Client Kustiya ', 7500, 10, '2024-02-05 04:48:48', NULL, '2024-02-05 04:48:48'),
(341, 154, 1, 47, 'customized Software Payment ', 18100, 10, '2024-02-06 09:03:25', NULL, '2024-02-06 09:03:25'),
(342, 155, 2, 21, 'Rahat', 8000, 10, '2024-02-06 09:04:53', NULL, '2024-02-06 09:04:53'),
(343, 155, 2, 21, 'Emam Salary', 20000, 10, '2024-02-06 09:04:53', NULL, '2024-02-06 09:04:53'),
(344, 155, 2, 13, 'jahangir vai jonno ', 3100, 10, '2024-02-06 09:04:53', NULL, '2024-02-06 09:04:53'),
(345, 155, 2, 13, 'hosting for Arif vai', 950, 10, '2024-02-06 09:04:53', NULL, '2024-02-06 09:04:53'),
(346, 155, 2, 15, 'meeting', 100, 10, '2024-02-06 09:04:53', NULL, '2024-02-06 09:04:53'),
(347, 156, 2, 21, 'sajedul', 15000, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(348, 156, 2, 21, 'nayeem Sales Commition', 1500, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(349, 156, 2, 21, 'Emam Sales Commition', 700, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(350, 156, 2, 25, 'khala', 3000, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(351, 156, 2, 14, 'father Taka', 2040, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(352, 156, 2, 14, 'Personal Expense dokaner loan', 1000, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(353, 156, 2, 14, 'Personal Expense', 500, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(354, 156, 2, 21, 'nayeem sales Commition', 1020, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(355, 156, 2, 10, 'Ecommerce jonno domain kina', 920, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(356, 156, 2, 14, 'gotokaler Personal Bazar', 1700, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(357, 156, 2, 25, 'Office Biskit', 100, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(358, 156, 2, 15, 'Client meeting Gazipur', 600, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(359, 156, 2, 25, 'print+ Recharge', 200, 10, '2024-02-09 19:53:15', NULL, '2024-02-09 19:53:15'),
(360, 157, 1, 22, 'POS Payment', 3800, 10, '2024-02-09 19:57:04', NULL, '2024-02-09 19:57:04'),
(361, 157, 1, 35, 'Gazipur orongo vai', 15000, 10, '2024-02-09 19:57:04', NULL, '2024-02-09 19:57:04'),
(362, 157, 1, 35, 'Travel', 9000, 10, '2024-02-09 19:57:04', NULL, '2024-02-09 19:57:04'),
(363, 157, 1, 36, 'Saiful vai Website', 3300, 10, '2024-02-09 19:57:04', NULL, '2024-02-09 19:57:04'),
(364, 158, 1, 22, 'Chowdhory Computer', 6000, 10, '2024-02-10 17:35:41', NULL, '2024-02-10 17:35:41'),
(365, 159, 2, 12, 'Sales Commition+ Convence uttara', 900, 10, '2024-02-10 17:38:13', NULL, '2024-02-10 17:38:13'),
(366, 159, 2, 14, 'doctor dekhano+ Shapla + sohel', 3250, 10, '2024-02-10 17:38:13', NULL, '2024-02-10 17:38:13'),
(367, 159, 2, 16, 'office food+ mpoyla ', 350, 10, '2024-02-10 17:38:13', NULL, '2024-02-10 17:38:13'),
(368, 159, 2, 14, 'recharge ', 50, 10, '2024-02-10 17:38:13', NULL, '2024-02-10 17:38:13'),
(369, 159, 2, 25, 'nayeem phone Recharge', 200, 10, '2024-02-10 17:38:13', NULL, '2024-02-10 17:38:13'),
(370, 160, 1, 35, 'Union Porishod', 6000, 10, '2024-02-11 11:38:15', NULL, '2024-02-11 11:38:15'),
(371, 161, 2, 21, 'sajedul Salary ', 10000, 10, '2024-02-11 11:39:32', NULL, '2024-02-11 11:39:32'),
(372, 161, 2, 21, 'Nayeem Salary', 6000, 10, '2024-02-11 11:39:32', NULL, '2024-02-11 11:39:32'),
(373, 161, 2, 21, 'Commotion Nayeem ', 600, 10, '2024-02-11 11:39:32', NULL, '2024-02-11 11:39:32'),
(374, 161, 2, 25, 'sohel Rana ', 500, 10, '2024-02-11 11:39:32', NULL, '2024-02-11 11:39:32'),
(375, 162, 1, 48, 'customized Software Advance Payment', 20000, 10, '2024-02-12 10:06:57', NULL, '2024-02-12 10:06:57'),
(376, 163, 2, 21, 'Nayeem Salary', 14000, 10, '2024-02-12 10:08:05', NULL, '2024-02-12 10:08:05'),
(377, 163, 2, 21, 'Sajib', 5000, 10, '2024-02-12 10:08:05', NULL, '2024-02-12 10:08:05'),
(378, 163, 2, 25, 'Sales Commition', 2040, 10, '2024-02-12 10:08:05', NULL, '2024-02-12 10:08:05'),
(379, 163, 2, 13, 'Kulaura domain Hosting', 1900, 10, '2024-02-12 10:08:05', NULL, '2024-02-12 10:08:05'),
(380, 164, 1, 36, 'Lab Asia Client Adv', 3000, 10, '2024-02-12 10:08:42', NULL, '2024-02-12 10:08:42'),
(381, 165, 1, 22, 'Manufacture Client ', 9000, 10, '2024-02-17 13:33:30', NULL, '2024-02-17 13:33:30'),
(382, 166, 2, 25, 'Uddesho apps Code kina', 6120, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(383, 166, 2, 13, 'Renewal payra', 1230, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(384, 166, 2, 12, 'Sohel Loan Taka Back', 1000, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(385, 166, 2, 25, 'SMs kina', 100, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(386, 166, 2, 25, 'Mobile Recharge sohel', 100, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(387, 166, 2, 12, 'Sales Commition', 1000, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(388, 166, 2, 25, 'Aziz Vai Hosting Renewal', 400, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(389, 166, 2, 25, 'Office Food', 60, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(390, 166, 2, 14, 'Personal Expense+ shapla+ Doctor', 2000, 10, '2024-02-17 13:37:50', NULL, '2024-02-17 13:37:50'),
(391, 167, 1, 36, 'Lab Asia Client ', 2000, 10, '2024-02-17 13:38:22', NULL, '2024-02-17 13:38:22'),
(392, 168, 1, 46, 'Software Due Payment', 7500, 10, '2024-02-18 08:57:38', NULL, '2024-02-18 08:57:38'),
(393, 169, 2, 25, 'Bangla motor taka Back', 5560, 10, '2024-02-18 09:09:25', NULL, '2024-02-18 09:09:25'),
(394, 169, 2, 25, 'Domain Hosting gazipur ar', 1890, 10, '2024-02-18 09:09:25', NULL, '2024-02-18 09:09:25'),
(395, 169, 2, 25, 'office Print + food', 300, 10, '2024-02-18 09:09:25', NULL, '2024-02-18 09:09:25'),
(396, 170, 1, 35, 'POS uttara Payment', 16000, 10, '2024-02-20 14:49:55', NULL, '2024-02-20 14:49:55'),
(397, 171, 2, 29, 'rahat', 2800, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(398, 171, 2, 25, 'Nayeem sales commition', 2000, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(399, 171, 2, 25, 'Mukta salary', 7000, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(400, 171, 2, 25, 'sajib ', 3000, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(401, 171, 2, 25, 'Bank document Ready', 815, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(402, 171, 2, 25, 'Guest Food', 100, 10, '2024-02-20 14:51:52', NULL, '2024-02-20 14:51:52'),
(403, 172, 1, 36, 'abdullah vai website ', 3000, 10, '2024-02-20 14:52:34', NULL, '2024-02-20 14:52:34'),
(404, 173, 2, 33, 'food Bill', 50, 15, '2024-02-23 10:46:04', NULL, '2024-02-23 10:46:04'),
(405, 174, 1, 36, 'Pabna Payment', 15000, 10, '2024-02-25 10:39:51', NULL, '2024-02-25 10:39:51'),
(406, 175, 2, 25, 'Money Receipt', 1450, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(407, 175, 2, 25, 'Apps developer', 2040, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(408, 175, 2, 14, 'Guest Food', 600, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(409, 175, 2, 14, 'Personal Expense', 3500, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(410, 175, 2, 14, 'Current Bill', 4500, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(411, 175, 2, 14, 'Facebook bost', 2040, 10, '2024-02-25 10:42:13', NULL, '2024-02-25 10:42:13'),
(412, 176, 2, 25, 'Agrani bank loan Renewalv taka', 5000, 10, '2024-02-27 18:42:05', NULL, '2024-02-27 18:42:05'),
(413, 176, 2, 16, 'Adnan guest food + others ', 500, 10, '2024-02-27 18:42:05', NULL, '2024-02-27 18:42:05'),
(414, 176, 2, 14, 'Shapla ', 2040, 10, '2024-02-27 18:42:05', NULL, '2024-02-27 18:42:05'),
(415, 176, 2, 11, 'Pos new bost', 3060, 10, '2024-02-27 18:42:05', NULL, '2024-02-27 18:42:05'),
(416, 176, 2, 10, 'Mortuja domain', 1000, 10, '2024-02-27 18:42:05', NULL, '2024-02-27 18:42:05'),
(417, 177, 1, 36, 'Pos bosundhara surat', 10000, 10, '2024-02-27 18:42:58', NULL, '2024-02-27 18:42:58'),
(418, 178, 1, 36, 'Aziz Lalbag', 5000, 10, '2024-02-28 16:15:26', NULL, '2024-02-28 16:15:26'),
(419, 179, 2, 3, 'tes', 216, 8, '2024-02-28 17:06:57', NULL, '2024-02-28 17:06:57'),
(420, 180, 2, 33, 'Office Bhara', 20, 15, '2024-02-29 19:37:59', NULL, '2024-02-29 19:37:59'),
(421, 181, 2, 13, 'Hosting for Uddessho', 2300, 10, '2024-02-29 20:28:43', NULL, '2024-02-29 20:28:43'),
(422, 181, 2, 25, 'mukta', 500, 10, '2024-02-29 20:28:43', NULL, '2024-02-29 20:28:43'),
(423, 181, 2, 25, 'sohel', 300, 10, '2024-02-29 20:28:43', NULL, '2024-02-29 20:28:43'),
(424, 181, 2, 25, 'offive food', 100, 10, '2024-02-29 20:28:43', NULL, '2024-02-29 20:28:43'),
(425, 182, 1, 36, 'Khaled Vai uk', 20000, 10, '2024-03-01 17:44:50', NULL, '2024-03-01 17:44:50'),
(426, 183, 2, 22, 'bhara', 20000, 10, '2024-03-01 17:45:13', NULL, '2024-03-01 17:45:13'),
(427, 184, 1, 35, 'Banani client', 10000, 10, '2024-03-18 10:35:13', NULL, '2024-03-18 10:35:13'),
(428, 185, 1, 35, 'Al noor syntific', 12000, 10, '2024-03-18 10:36:21', NULL, '2024-03-18 10:36:21'),
(429, 186, 2, 22, '', 10000, 10, '2024-03-18 10:36:57', NULL, '2024-03-18 10:36:57'),
(430, 187, 2, 32, '3 maser', 18900, 10, '2024-03-18 10:42:20', NULL, '2024-03-18 10:42:20'),
(431, 187, 2, 25, 'Nayeem+rahat+monir vai+Vue js vai+ nayeem+Theme +sohel Rana ', 10500, 10, '2024-03-18 10:42:20', NULL, '2024-03-18 10:42:20'),
(432, 188, 2, 31, 'current bioll office', 5000, 10, '2024-03-25 05:32:31', NULL, '2024-03-25 05:32:31'),
(433, 188, 2, 10, 'pima domain kina', 920, 10, '2024-03-25 05:32:31', NULL, '2024-03-25 05:32:31'),
(434, 189, 1, 36, 'Pabna Payment', 10000, 10, '2024-03-26 07:06:21', NULL, '2024-03-26 07:06:21'),
(435, 190, 2, 21, 'Hafijul vai', 9000, 10, '2024-03-26 07:09:20', NULL, '2024-03-26 07:09:20'),
(436, 190, 2, 14, 'expense', 500, 10, '2024-03-26 07:09:20', NULL, '2024-03-26 07:09:20'),
(437, 190, 2, 29, 'Client Meeting jatrabari', 200, 10, '2024-03-26 07:09:20', NULL, '2024-03-26 07:09:20'),
(438, 191, 1, 36, 'Dubai Apps Development', 25000, 10, '2024-03-29 11:50:36', NULL, '2024-03-29 11:50:36'),
(439, 192, 2, 21, 'Mukta salary', 15300, 10, '2024-03-29 11:52:12', NULL, '2024-03-29 11:52:12'),
(440, 192, 2, 8, 'Deposit ', 3000, 10, '2024-03-29 11:52:12', NULL, '2024-03-29 11:52:12'),
(441, 192, 2, 25, 'ridoy vai Developer', 5100, 10, '2024-03-29 11:52:12', NULL, '2024-03-29 11:52:12'),
(442, 192, 2, 25, 'Current Bill', 1300, 10, '2024-03-29 11:52:12', NULL, '2024-03-29 11:52:12'),
(443, 192, 2, 25, 'Current Bil', 5000, 10, '2024-03-29 11:52:12', NULL, '2024-03-29 11:52:12'),
(444, 196, 2, 4, 'mobile bill', 100, 8, '2024-04-23 21:58:20', NULL, '2024-04-23 21:58:20'),
(445, 196, 2, 5, 'Office Bhara', 100, 8, '2024-04-23 21:58:20', NULL, '2024-04-23 21:58:20'),
(446, 197, 1, 5, 'Payment', 100, 8, '2024-04-29 04:49:08', NULL, '2024-04-29 04:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `why_1stpick`
--

CREATE TABLE `why_1stpick` (
  `wid` int NOT NULL,
  `subject` varchar(100) NOT NULL,
  `wmesg` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  `regby` int NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upby` int DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `why_1stpick`
--

INSERT INTO `why_1stpick` (`wid`, `subject`, `wmesg`, `image`, `status`, `regby`, `regdate`, `upby`, `update`) VALUES
(1, 'দিনই পেমেন্ট', 'অর্ডার ডেলিভারির দিনই সরাসরি ক্যাশ, ব্যাংক অথবা বিকাশ ও নগদ এর মাধ্যমে পেমেন্ট করা হয়।', 'ic.jpg', 'Active', 1, '2020-07-25 03:00:57', 110, '2021-07-17 07:20:43'),
(3, 'সবচেয়ে  দ্রুত ডেলিভারি', 'আমাদের রয়েছে দক্ষ ডেলিভারিম্যান, যারা প্রতিটি পার্সেল যত্ন সহকারে দ্রুততম সময়ে কাস্টমারের কাছে পোঁছে দিচ্ছে ।', 'bike_icon.jpg', 'Active', 1, '2020-07-25 05:37:26', 110, '2021-07-17 07:22:42'),
(4, '0% COD চার্জ', 'চট্রগ্রাম সিটির ভেতর ডেলিভারি দিতে, নেই কোন “ক্যাশ অন ডেলিভারি” চার্জ', 'cod3.svg', 'Active', 1, '2020-07-25 05:37:54', 43, '2021-07-12 10:56:04'),
(6, 'ডেলিভারি সার্ভিস', 'চট্রগ্রাম সিটিসহ সারা মেট্রো এরিয়া কুরিয়ার এর মাধ্যমে সেবা প্রদান করা হয়।', 'images_(2).jpg', 'Active', 1, '2020-08-05 14:21:53', 110, '2021-07-17 07:24:24'),
(7, 'রিয়েল টাইম অর্ডার ট্র্যাকিং', 'রিয়েল টাইম অর্ডার ট্র্যাকিং এর মাধ্যমে জানতে পারবেন প্রতিটি অর্ডারের সর্বশেষ আপডেট, যেকোন সময়', 'download.png', 'Active', 1, '2020-08-05 14:22:36', 110, '2021-07-17 07:32:57'),
(8, 'বিকাশ ও নগদ পেমেন্ট সুবিধা', 'ডেলিভারির পেমেন্টের সুবিধার জন্য কাস্টমার এখন ডেলিভারির পেমেন্ট করতে পারবেন ক্যাশ অন ডেলিভারি ও বিকাশের মাধ্যমে, একদম ঘরের দরজায় !', 'bkash_nogod_icon.jpg', 'Active', 1, '2020-08-06 19:16:42', 110, '2021-07-17 07:26:28'),
(12, 'ফ্রী ডেলিভারি ', 'একটি মার্চেন্ট অ্যাকাউন্ট খুলে প্রতি ১০ টি ডেলিভারি তে পাচ্ছেন একটি ফ্রী ডেলিভারি - সত্ত্ব প্রযোজ্য ', 'Pickup2.png', 'Active', 1, '2021-05-06 21:05:45', 43, '2021-07-12 13:28:08'),
(14, '২৪/৭ কল সেন্টার', '২৪/৭  আমাদের দক্ষ অফিসার দ্বারা ক্লায়েন্টদের প্রয়োজনের সকল তথ্য সরবরাহ করা হয়।', 'images_(3).jpg', 'Active', 1, '2021-05-06 21:23:09', 110, '2021-07-17 07:27:54'),
(15, 'ফুড ডেলিভারি ', 'ফুড ডেলিভারি চার্জ ৯০-১১০ টাকা (বিশেষ যত্নের সাথে ফুড ডেলিভারি করা হয়)', 'food-delivery-vector-6252882_(1).jpg', 'Active', 110, '2021-09-25 10:18:43', 110, '2021-09-25 10:20:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `access_lavels`
--
ALTER TABLE `access_lavels`
  ADD PRIMARY KEY (`ax_id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`acid`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asID`);

--
-- Indexes for table `balance_adjustment`
--
ALTER TABLE `balance_adjustment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`ba_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brid`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`cpid`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `com_profile`
--
ALTER TABLE `com_profile`
  ADD PRIMARY KEY (`com_pid`);

--
-- Indexes for table `cost_type`
--
ALTER TABLE `cost_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countrysl`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dpt_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `employee_payment`
--
ALTER TABLE `employee_payment`
  ADD PRIMARY KEY (`empPid`);

--
-- Indexes for table `emp_dev_attendance`
--
ALTER TABLE `emp_dev_attendance`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `emp_targer`
--
ALTER TABLE `emp_targer`
  ADD PRIMARY KEY (`etid`);

--
-- Indexes for table `help_support`
--
ALTER TABLE `help_support`
  ADD PRIMARY KEY (`hs_id`);

--
-- Indexes for table `help_support_reply`
--
ALTER TABLE `help_support_reply`
  ADD PRIMARY KEY (`hpr_id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`hbid`);

--
-- Indexes for table `mobileaccount`
--
ALTER TABLE `mobileaccount`
  ADD PRIMARY KEY (`ma_id`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`opid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `page_access_relationship`
--
ALTER TABLE `page_access_relationship`
  ADD PRIMARY KEY (`pageAccessRelationId`);

--
-- Indexes for table `page_setting`
--
ALTER TABLE `page_setting`
  ADD PRIMARY KEY (`psid`);

--
-- Indexes for table `preturns`
--
ALTER TABLE `preturns`
  ADD PRIMARY KEY (`prid`);

--
-- Indexes for table `preturns_product`
--
ALTER TABLE `preturns_product`
  ADD PRIMARY KEY (`prpid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`qutid`);

--
-- Indexes for table `quotation_product`
--
ALTER TABLE `quotation_product`
  ADD PRIMARY KEY (`qutpid`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`returnId`);

--
-- Indexes for table `returns_product`
--
ALTER TABLE `returns_product`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `sales_payment`
--
ALTER TABLE `sales_payment`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `service_info`
--
ALTER TABLE `service_info`
  ADD PRIMARY KEY (`siid`);

--
-- Indexes for table `service_sale`
--
ALTER TABLE `service_sale`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `service_sale_details`
--
ALTER TABLE `service_sale_details`
  ADD PRIMARY KEY (`sidid`);

--
-- Indexes for table `sma_units`
--
ALTER TABLE `sma_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `stock_store`
--
ALTER TABLE `stock_store`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scatid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `tbl_master_page_title`
--
ALTER TABLE `tbl_master_page_title`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pageid`);

--
-- Indexes for table `tbl_page_functions`
--
ALTER TABLE `tbl_page_functions`
  ADD PRIMARY KEY (`pfunc_id`);

--
-- Indexes for table `tbl_user_f_permission`
--
ALTER TABLE `tbl_user_f_permission`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_user_m_permission`
--
ALTER TABLE `tbl_user_m_permission`
  ADD PRIMARY KEY (`uperid`);

--
-- Indexes for table `tbl_user_p_permission`
--
ALTER TABLE `tbl_user_p_permission`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `territory`
--
ALTER TABLE `territory`
  ADD PRIMARY KEY (`trid`);

--
-- Indexes for table `transfer_account`
--
ALTER TABLE `transfer_account`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`um_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `vaucher`
--
ALTER TABLE `vaucher`
  ADD PRIMARY KEY (`vuid`);

--
-- Indexes for table `vaucher_particular`
--
ALTER TABLE `vaucher_particular`
  ADD PRIMARY KEY (`vpid`);

--
-- Indexes for table `why_1stpick`
--
ALTER TABLE `why_1stpick`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access_lavels`
--
ALTER TABLE `access_lavels`
  MODIFY `ax_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `acid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balance_adjustment`
--
ALTER TABLE `balance_adjustment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bankaccount`
--
ALTER TABLE `bankaccount`
  MODIFY `ba_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `cpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `ca_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companys`
--
ALTER TABLE `companys`
  MODIFY `companyID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `com_profile`
--
ALTER TABLE `com_profile`
  MODIFY `com_pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cost_type`
--
ALTER TABLE `cost_type`
  MODIFY `ct_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countrysl` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dpt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_payment`
--
ALTER TABLE `employee_payment`
  MODIFY `empPid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_dev_attendance`
--
ALTER TABLE `emp_dev_attendance`
  MODIFY `autoid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `emp_targer`
--
ALTER TABLE `emp_targer`
  MODIFY `etid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `help_support`
--
ALTER TABLE `help_support`
  MODIFY `hs_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `help_support_reply`
--
ALTER TABLE `help_support_reply`
  MODIFY `hpr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `hbid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobileaccount`
--
ALTER TABLE `mobileaccount`
  MODIFY `ma_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `opid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `page_access_relationship`
--
ALTER TABLE `page_access_relationship`
  MODIFY `pageAccessRelationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `page_setting`
--
ALTER TABLE `page_setting`
  MODIFY `psid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `preturns`
--
ALTER TABLE `preturns`
  MODIFY `prid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preturns_product`
--
ALTER TABLE `preturns_product`
  MODIFY `prpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `productId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `pp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `pp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `qutid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quotation_product`
--
ALTER TABLE `quotation_product`
  MODIFY `qutpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `returns_product`
--
ALTER TABLE `returns_product`
  MODIFY `rp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sales_payment`
--
ALTER TABLE `sales_payment`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `service_info`
--
ALTER TABLE `service_info`
  MODIFY `siid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_sale`
--
ALTER TABLE `service_sale`
  MODIFY `ssid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_sale_details`
--
ALTER TABLE `service_sale_details`
  MODIFY `sidid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sma_units`
--
ALTER TABLE `sma_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `stock_store`
--
ALTER TABLE `stock_store`
  MODIFY `ss_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scatid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_master_page_title`
--
ALTER TABLE `tbl_master_page_title`
  MODIFY `master_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pageid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_page_functions`
--
ALTER TABLE `tbl_page_functions`
  MODIFY `pfunc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_user_f_permission`
--
ALTER TABLE `tbl_user_f_permission`
  MODIFY `f_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT for table `tbl_user_m_permission`
--
ALTER TABLE `tbl_user_m_permission`
  MODIFY `uperid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT for table `tbl_user_p_permission`
--
ALTER TABLE `tbl_user_p_permission`
  MODIFY `pr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT for table `territory`
--
ALTER TABLE `territory`
  MODIFY `trid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfer_account`
--
ALTER TABLE `transfer_account`
  MODIFY `ta_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `um_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `up_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vaucher`
--
ALTER TABLE `vaucher`
  MODIFY `vuid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `vaucher_particular`
--
ALTER TABLE `vaucher_particular`
  MODIFY `vpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `why_1stpick`
--
ALTER TABLE `why_1stpick`
  MODIFY `wid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
