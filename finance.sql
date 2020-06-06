-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 11:18 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `per_documents`
--

CREATE TABLE `per_documents` (
  `id` int(50) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_documents`
--

INSERT INTO `per_documents` (`id`, `file`, `description`, `created_at`, `updated_at`) VALUES
(6, '5af2b75f68605php course book.pdf', 'PHP course book', '2018-05-09 08:54:55', '2018-05-09 08:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `per_forex`
--

CREATE TABLE `per_forex` (
  `id` int(50) NOT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` decimal(10,2) DEFAULT NULL,
  `buying` decimal(10,2) DEFAULT NULL,
  `selling` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `per_forex`
--

INSERT INTO `per_forex` (`id`, `currency`, `unit`, `buying`, `selling`, `created_at`, `updated_at`) VALUES
(6, 'Japanese Yen', '10.00', '9.86', '9.80', '2018-05-08 09:54:52', '2018-05-08 09:54:52'),
(7, 'Yuan', '1.00', '16.92', '16.83', '2018-05-08 09:54:52', '2018-05-08 09:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `per_gallery`
--

CREATE TABLE `per_gallery` (
  `id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_gallery`
--

INSERT INTO `per_gallery` (`id`, `file`, `created_at`, `updated_at`) VALUES
(15, 'b2.jpg', '2018-05-07 10:12:45', '2018-05-07 10:12:45'),
(19, '5af02ad3ece10b1.jpg', '2018-05-07 10:30:43', '2018-05-07 10:30:43'),
(21, '5af1731988051images (3).jpg', '2018-05-08 09:51:21', '2018-05-08 09:51:21'),
(22, '5af3346be5f7d2.jpg', '2018-05-09 17:48:27', '2018-05-09 17:48:27'),
(23, '5af3346be5f7d1.jpg', '2018-05-09 17:48:27', '2018-05-09 17:48:27'),
(24, '5af3346cc72243.jpg', '2018-05-09 17:48:28', '2018-05-09 17:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `per_general_settings`
--

CREATE TABLE `per_general_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `working_hours` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_general_settings`
--

INSERT INTO `per_general_settings` (`id`, `name`, `phone`, `email`, `address`, `working_hours`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Catchy Road', '+9779813426920 , 4488542', 'info@catchyroad.com', 'SoalteeMode, Kathmandu', '10:00 - 5:00', '5af52ef956e6alogo.jpg', '2018-05-11 05:39:01', '2018-05-11 05:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `per_news`
--

CREATE TABLE `per_news` (
  `id` int(50) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_news`
--

INSERT INTO `per_news` (`id`, `title`, `content`, `photo`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', '<p><strong>Lorem Ipsum</strong><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:12px\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:12px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes&nbsp;by accident, sometimes on purpose (injected humour and the like).</span></p>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:12px\"><img alt=\"\" src=\"/finance/public/sms/text-editor/fileman/Uploads/facebook.png\" style=\"height:104px; width:350px\" />Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></p>\r\n\r\n<p>&nbsp;</p>', '5af1813834eb3twitter.jpg', 'yes', '2018-05-08 10:51:36', '2018-05-08 10:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `per_page`
--

CREATE TABLE `per_page` (
  `id` int(50) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_index` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_page`
--

INSERT INTO `per_page` (`id`, `title`, `description`, `photo`, `page_index`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>Instead of following the classic &quot;About Us&quot; script and writing a few paragraphs about the company&#39;s mission and origins, try something different -- there are plenty of ways to make it more visually compelling. Take Moz, for example. A lot has happened since it was founded in 2004 -- the company chose to share those milestones using a timeline, using a fun and clean design that incorporates clear headers, concise blurbs, and little graphics to break up the text. We love how humbly they preface the timeline, too, with a thank you to their community: &quot;We owe a huge thanks to our community for joining us on this awesome journey, and we hope that you&rsquo;ll continue to be a part of our story.&quot;</p>', NULL, 'about us', '0000-00-00 00:00:00', '2018-05-14 15:21:36'),
(2, 'Loan', '<p>In&nbsp;<a href=\"https://en.wikipedia.org/wiki/Finance\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Finance\">finance</a>, a&nbsp;<strong>loan</strong>&nbsp;is the lending of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Money\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Money\">money</a>&nbsp;from one individual, organization or entity to another individual, organization or entity. A loan is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Debt\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Debt\">debt</a>&nbsp;provided by an organization or individual to another entity at an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Interest_rate\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Interest rate\">interest rate</a>, and evidenced by a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Promissory_note\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Promissory note\">promissory note</a>&nbsp;which specifies, among other things, the principal amount of money borrowed, the interest rate the lender is charging, and date of repayment. A loan entails the reallocation of the subject&nbsp;<a href=\"https://en.wikipedia.org/wiki/Asset\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Asset\">asset</a>(s) for a period of time, between the&nbsp;<a class=\"extiw\" href=\"https://en.wiktionary.org/wiki/lender\" style=\"text-decoration-line: none; color: rgb(102, 51, 102); background: none;\" title=\"wikt:lender\">lender</a>&nbsp;and the&nbsp;<a class=\"extiw\" href=\"https://en.wiktionary.org/wiki/borrower\" style=\"text-decoration-line: none; color: rgb(102, 51, 102); background: none;\" title=\"wikt:borrower\">borrower</a>. In a loan, the borrower initially receives or&nbsp;<em>borrows</em>&nbsp;an amount of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Money\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Money\">money</a>, called the&nbsp;<em>principal</em>, from the lender, and is obligated to&nbsp;<em>pay back</em>&nbsp;or&nbsp;<em>repay</em>&nbsp;an equal amount of money to the lender at a later time.The loan is generally provided at a cost, referred to as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Interest\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Interest\">interest</a>&nbsp;on the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Debt\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Debt\">debt</a>, which provides an incentive for the lender to engage in the loan. In a legal loan, each of these obligations and restrictions is enforced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Contract\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Contract\">contract</a>, which can also place the borrower under additional restrictions known as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Loan_covenant\" style=\"text-decoration-line: none; color: rgb(11, 0, 128); background: none;\" title=\"Loan covenant\">loan covenants</a>. Although this article focuses on monetary loans, in practice any material object might be lent.</p>', NULL, 'loan', '0000-00-00 00:00:00', '2018-05-14 15:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `per_services`
--

CREATE TABLE `per_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `class` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `per_slider`
--

CREATE TABLE `per_slider` (
  `id` int(50) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_index` int(50) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_slider`
--

INSERT INTO `per_slider` (`id`, `title`, `order_index`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(2, 'slider 2', 2, 'slider 2', 's2.jpg', 'active', '2018-05-06 11:20:59', '2018-05-06 11:20:59'),
(3, 'Slider 1', 1, 'Slider 1', 's1.jpg', 'active', '2018-05-07 04:35:44', '2018-05-07 04:35:44'),
(4, 'Slider 3', 3, 'Slider 3', 's3.jpg', 'active', '2018-05-07 04:36:34', '2018-05-07 04:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `per_superadmin`
--

CREATE TABLE `per_superadmin` (
  `id` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `temporary_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_superadmin`
--

INSERT INTO `per_superadmin` (`id`, `name`, `email`, `password`, `temporary_address`, `permanent_address`, `contact`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Catchy Road', 'admin@admin.com', '$2y$10$MAT.r2k9iRAngOqD2ksE.u2D74wSleuasAM9kd/Shhlzi0O3wwUw2', 'Kalimati', 'kalimati', '4488542', '5afa7883ed3f0logo.jpg', 'dRAXFMNEtIaMpqWHc5eUt0GImHXl0sAVzI1tsATuq5GjUbkOuiBd2q4T64er', '2018-05-06 09:35:36', '2018-05-15 06:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `per_team`
--

CREATE TABLE `per_team` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `order_index` int(50) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_team`
--

INSERT INTO `per_team` (`id`, `name`, `designation`, `phone`, `email`, `description`, `order_index`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Test member', 'test', '9851087223', 'test277@gmail.com', '<p><strong>Lorem Ipsum</strong><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 1, '5af1804b95244a.jpg', '2018-05-08 08:44:33', '2018-05-08 10:47:39'),
(2, 'test 2', 'test2', '9813426920', 'test2@gmail.com', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px; text-align:justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></p>', 2, '5af1807c213b6c.jpg', '2018-05-08 09:03:18', '2018-05-08 10:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `per_testimonial`
--

CREATE TABLE `per_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `per_testimonial`
--

INSERT INTO `per_testimonial` (`id`, `name`, `message`, `photo`, `publish`, `created_at`, `updated_at`) VALUES
(2, 'Jack Thammarat', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></p>', '5af15be850fdba.jpg', 'yes', '2018-05-08 08:01:05', '2018-05-08 10:49:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `per_documents`
--
ALTER TABLE `per_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_forex`
--
ALTER TABLE `per_forex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_gallery`
--
ALTER TABLE `per_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_general_settings`
--
ALTER TABLE `per_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_news`
--
ALTER TABLE `per_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_page`
--
ALTER TABLE `per_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_services`
--
ALTER TABLE `per_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_slider`
--
ALTER TABLE `per_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_superadmin`
--
ALTER TABLE `per_superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_team`
--
ALTER TABLE `per_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_testimonial`
--
ALTER TABLE `per_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `per_documents`
--
ALTER TABLE `per_documents`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `per_forex`
--
ALTER TABLE `per_forex`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `per_gallery`
--
ALTER TABLE `per_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `per_general_settings`
--
ALTER TABLE `per_general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `per_news`
--
ALTER TABLE `per_news`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `per_page`
--
ALTER TABLE `per_page`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `per_services`
--
ALTER TABLE `per_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `per_slider`
--
ALTER TABLE `per_slider`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `per_superadmin`
--
ALTER TABLE `per_superadmin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `per_team`
--
ALTER TABLE `per_team`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `per_testimonial`
--
ALTER TABLE `per_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
