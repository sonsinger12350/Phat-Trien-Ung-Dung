-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2021 at 04:11 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15363841_quanlihoctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id_baiviet` int(11) NOT NULL,
  `tenbaiviet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nguoitao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lophoc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giotao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id_baiviet`, `tenbaiviet`, `nguoitao`, `lophoc`, `noidung`, `file`, `giotao`) VALUES
(2, 'Sinh hoạt chủ nhiệm', 'Giáo Viên', 'ĐHHTTT13A', 'Ngày 22/12', 'Kiemtoan.docx', '2021-01-07 01:09:46'),
(6, 'ABC', 'Giáo Viên 2', 'ĐHHTTT13B', '123', 'Report-LeLuongSon_17032431-MaiHuuTuong_17030191.docx', '2020-12-30 20:03:59'),
(7, 'ABCD', 'Giáo Viên', 'ĐHHTTT13A', 'abac', 'CongNgheMoi.pptx', '2021-01-07 01:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `lophoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chat_message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `lophoc`, `chat_message`, `timestamp`, `status`) VALUES
(1, 26, 11, 'DHHTTT13A', 'Alo', '2021-01-06 17:00:42', 1),
(2, 9, 11, 'ĐHHTTT13A', '123', '2021-01-06 17:07:03', 0),
(3, 6, 4, '', 'Alo', '2021-01-06 17:10:13', 2),
(4, 9, 11, 'ĐHHTTT13A', 'Alo', '2021-01-06 17:11:18', 0),
(5, 11, 9, 'ĐHHTTT13A', 'alo 1234', '2021-01-06 17:16:44', 0),
(6, 9, 11, 'ĐHHTTT13A', 'Ok', '2021-01-06 17:17:00', 0),
(7, 9, 11, 'ĐHHTTT13A', 'Ông về coi kỹ slide đi mai thuyết trình', '2021-01-06 17:17:27', 0),
(8, 9, 11, 'ĐHHTTT13A', 'Ko chat nhóm đc', '2021-01-06 17:18:33', 0),
(9, 9, 11, 'ĐHHTTT13A', 'Vc', '2021-01-06 17:18:36', 2),
(10, 4, 11, 'ĐHHTTT13A', 'Xin chào', '2021-01-07 01:45:45', 0),
(11, 4, 11, 'ĐHHTTT13A', 'Alo', '2021-01-07 01:46:04', 0),
(12, 4, 9, 'ĐHHTTT13A', 'aloalo', '2021-01-07 01:48:50', 2),
(13, 9, 11, 'ĐHHTTT13A', 'Xin chào', '2021-01-07 02:34:52', 0),
(14, 9, 11, 'ĐHHTTT13A', '123', '2021-01-07 02:35:30', 0),
(15, 11, 9, 'ĐHHTTT13A', 'Chào Bạn', '2021-01-07 02:36:35', 0),
(16, 9, 11, 'ĐHHTTT13A', 'Bạn khỏe không', '2021-01-07 02:36:51', 0),
(17, 11, 9, 'ĐHHTTT13A', 'Tôi ổn', '2021-01-07 02:37:01', 0),
(18, 11, 9, 'ĐHHTTT13A', 'xin chào gáio viên', '2021-01-07 02:37:36', 0),
(19, 6, 11, 'ĐHHTTT13A', 'Xin chào', '2021-01-07 02:37:44', 1),
(20, 4, 25, 'ĐHHTTT13B', 'dfgfg\njk\n\ngjh', '2021-01-28 04:25:15', 0),
(21, 4, 25, 'ĐHHTTT13B', 'hi', '2021-01-28 04:25:27', 0),
(22, 25, 4, '', 'ok em', '2021-01-30 12:56:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `id_diem` int(11) NOT NULL,
  `masv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lophoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tenmonhoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `thuongky` float NOT NULL,
  `giuaky` float NOT NULL,
  `cuoiky` float NOT NULL,
  `diemtong` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`id_diem`, `masv`, `hoten`, `lophoc`, `tenmonhoc`, `thuongky`, `giuaky`, `cuoiky`, `diemtong`) VALUES
(36, '17032431', 'Lê Lương Sơn', 'ĐHHTTT13A', '5', 9, 9, 9, 9),
(33, '17030191', 'Mai Hữu Tường', 'ĐHHTTT13A', '1', 7, 8, 7, 7.3),
(39, '17030192', 'Michael', 'ĐHHTTT13B', '2', 8, 8, 9, 8.5),
(40, '17030191', 'Mai Hữu Tường', 'ĐHHTTT13A', '1', 7, 8, 5, 6.3);

-- --------------------------------------------------------

--
-- Table structure for table `hososinhvien`
--

CREATE TABLE `hososinhvien` (
  `id_hososv` int(11) NOT NULL,
  `masv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lophoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nganh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hososinhvien`
--

INSERT INTO `hososinhvien` (`id_hososv`, `masv`, `hoten`, `lophoc`, `gioitinh`, `ngaysinh`, `noisinh`, `nganh`, `anh`) VALUES
(2, '17030191', 'Mai Hữu Tường', 'ĐHHTTT13A', 'Nam', '1999-10-26', 'Tỉnh Long An', 'Hệ Thống Thông Tin', 'tuong.png'),
(3, '17032431', 'Lê Lương Sơn', 'ĐHHTTT13A', 'Nam', '1999-08-10', 'Tỉnh Long An', 'Hệ Thống Thông Tin', 'avatar.jpg'),
(4, '17030192', 'Michael', 'ĐHHTTT13B', 'Nam', '1999-01-12', 'TP.Hồ Chí Minh', 'Công Nghệ Thông Tin', 'Capture.PNG'),
(5, '17022342', 'Angel', 'ĐHHTTT13B', 'Nữ', '1999-02-12', 'TP.Hồ Chí Minh', 'Công Nghệ Thông Tin', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 11, '2021-01-06 16:55:53', 'no'),
(2, 11, '2021-01-06 16:55:53', 'no'),
(3, 11, '2021-01-06 16:58:30', 'no'),
(4, 11, '2021-01-06 16:58:30', 'no'),
(5, 9, '2021-01-06 16:58:46', 'no'),
(6, 9, '2021-01-06 16:58:46', 'no'),
(7, 11, '2021-01-06 16:59:04', 'no'),
(8, 11, '2021-01-06 16:59:04', 'no'),
(9, 6, '2021-01-06 17:03:08', 'no'),
(10, 6, '2021-01-06 17:03:08', 'no'),
(11, 11, '2021-01-06 17:03:59', 'no'),
(12, 11, '2021-01-06 17:03:59', 'no'),
(13, 11, '2021-01-06 17:06:28', 'no'),
(14, 11, '2021-01-06 17:06:28', 'no'),
(15, 4, '2021-01-06 17:09:59', 'no'),
(16, 4, '2021-01-06 17:09:59', 'no'),
(17, 6, '2021-01-06 17:10:23', 'no'),
(18, 6, '2021-01-06 17:10:23', 'no'),
(19, 11, '2021-01-06 17:10:55', 'no'),
(20, 11, '2021-01-06 17:10:55', 'no'),
(21, 25, '2021-01-06 17:16:22', 'no'),
(22, 25, '2021-01-06 17:16:22', 'no'),
(23, 9, '2021-01-06 17:16:30', 'no'),
(24, 9, '2021-01-06 17:16:30', 'no'),
(25, 6, '2021-01-06 17:23:36', 'no'),
(26, 6, '2021-01-06 17:23:36', 'no'),
(27, 4, '2021-01-06 18:09:35', 'no'),
(28, 4, '2021-01-06 18:09:35', 'no'),
(29, 6, '2021-01-06 18:17:27', 'no'),
(30, 6, '2021-01-06 18:17:27', 'no'),
(31, 9, '2021-01-06 18:52:21', 'no'),
(32, 9, '2021-01-06 18:52:21', 'no'),
(33, 6, '2021-01-06 18:52:39', 'no'),
(34, 6, '2021-01-06 18:52:39', 'no'),
(35, 4, '2021-01-06 18:55:02', 'no'),
(36, 4, '2021-01-06 18:55:02', 'no'),
(37, 9, '2021-01-06 22:20:34', 'no'),
(38, 9, '2021-01-06 22:20:34', 'no'),
(39, 9, '2021-01-06 22:20:34', 'no'),
(40, 9, '2021-01-06 22:20:34', 'no'),
(41, 11, '2021-01-07 01:04:27', 'no'),
(42, 11, '2021-01-07 01:04:27', 'no'),
(43, 6, '2021-01-07 01:08:24', 'no'),
(44, 6, '2021-01-07 01:08:24', 'no'),
(45, 11, '2021-01-07 01:10:02', 'no'),
(46, 11, '2021-01-07 01:10:02', 'no'),
(47, 4, '2021-01-07 01:17:49', 'no'),
(48, 4, '2021-01-07 01:17:49', 'no'),
(49, 9, '2021-01-07 01:41:17', 'no'),
(50, 9, '2021-01-07 01:41:17', 'no'),
(51, 4, '2021-01-07 01:44:30', 'no'),
(52, 4, '2021-01-07 01:44:30', 'no'),
(53, 11, '2021-01-07 01:45:14', 'no'),
(54, 11, '2021-01-07 01:45:14', 'no'),
(55, 11, '2021-01-07 01:58:36', 'no'),
(56, 11, '2021-01-07 01:58:36', 'no'),
(57, 11, '2021-01-07 01:58:42', 'no'),
(58, 11, '2021-01-07 01:58:42', 'no'),
(59, 9, '2021-01-07 01:59:06', 'no'),
(60, 9, '2021-01-07 01:59:06', 'no'),
(61, 9, '2021-01-07 02:33:35', 'no'),
(62, 9, '2021-01-07 02:33:35', 'no'),
(63, 11, '2021-01-07 02:35:21', 'no'),
(64, 11, '2021-01-07 02:35:21', 'no'),
(65, 9, '2021-01-07 02:35:22', 'no'),
(66, 9, '2021-01-07 02:35:22', 'no'),
(67, 9, '2021-01-07 02:36:23', 'no'),
(68, 9, '2021-01-07 02:36:23', 'no'),
(69, 6, '2021-01-07 02:37:55', 'no'),
(70, 6, '2021-01-07 02:37:55', 'no'),
(71, 25, '2021-01-28 03:32:41', 'no'),
(72, 25, '2021-01-28 03:32:41', 'no'),
(73, 25, '2021-01-28 03:33:47', 'no'),
(74, 25, '2021-01-28 03:33:47', 'no'),
(75, 25, '2021-01-28 04:05:59', 'no'),
(76, 25, '2021-01-28 04:05:59', 'no'),
(77, 25, '2021-01-28 04:07:26', 'no'),
(78, 25, '2021-01-28 04:07:26', 'no'),
(79, 25, '2021-01-28 05:08:05', 'no'),
(80, 25, '2021-01-28 05:08:05', 'no'),
(81, 25, '2021-01-28 06:14:58', 'no'),
(82, 25, '2021-01-28 06:14:58', 'no'),
(83, 25, '2021-01-30 12:54:06', 'no'),
(84, 25, '2021-01-30 12:54:06', 'no'),
(85, 4, '2021-01-30 12:54:54', 'no'),
(86, 4, '2021-01-30 12:54:54', 'no'),
(87, 25, '2021-02-07 00:49:27', 'no'),
(88, 25, '2021-02-07 00:49:27', 'no'),
(89, 4, '2021-02-07 00:49:55', 'no'),
(90, 4, '2021-02-07 00:49:55', 'no'),
(91, 4, '2021-02-25 14:24:17', 'no'),
(92, 4, '2021-02-25 14:24:17', 'no'),
(93, 11, '2021-03-19 00:34:13', 'no'),
(94, 11, '2021-03-19 00:34:13', 'no'),
(95, 4, '2021-04-01 08:24:07', 'no'),
(96, 4, '2021-04-01 08:24:07', 'no'),
(97, 4, '2021-04-12 08:56:33', 'no'),
(98, 4, '2021-04-12 08:56:33', 'no'),
(99, 11, '2021-04-13 01:24:18', 'no'),
(100, 11, '2021-04-13 01:24:18', 'no'),
(101, 4, '2021-04-27 01:58:06', 'no'),
(102, 4, '2021-04-27 01:58:07', 'no'),
(103, 11, '2021-04-27 04:08:06', 'no'),
(104, 11, '2021-04-27 04:08:06', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `id_monhoc` int(11) NOT NULL,
  `tenmonhoc` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id_monhoc`, `tenmonhoc`) VALUES
(1, 'Công Nghệ Mới'),
(2, 'Phát Triển Ứng Dụng Web'),
(3, 'Toán Cao Cấp'),
(4, 'Quản Lí Dự Án Hệ Thống Thông Tin'),
(5, 'Hoạch Định Tài Nguyên Doanh Nghiệp'),
(6, 'Hệ Thống Thông Tin Quản Lí'),
(7, 'Khóa Luận Tốt Nghiệp'),
(8, 'Thực Tập Doanh Nghiệp'),
(9, 'Nhập Môn Dữ Liệu Lớn'),
(10, 'Lập Trình Phân Tích Dữ Liệu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `malogin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lophoc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phanquyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `malogin`, `password`, `ten`, `lophoc`, `phanquyen`) VALUES
(4, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin', '', 'admin'),
(6, 'Giaovien', 'c4ca4238a0b923820dcc509a6f75849b', 'Giáo Viên', 'ĐHHTTT13A', 'giaovien'),
(9, '17030191', 'c4ca4238a0b923820dcc509a6f75849b', 'Hữu Tường', 'ĐHHTTT13A', 'sinhvien'),
(12, 'Giaovien2', 'c4ca4238a0b923820dcc509a6f75849b', 'Giáo Viên 2', 'ĐHHTTT13B', 'giaovien'),
(11, '17032431', 'c4ca4238a0b923820dcc509a6f75849b', 'Lương Sơn', 'ĐHHTTT13A', 'sinhvien'),
(25, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Minh', 'ĐHHTTT13B', 'sinhvien'),
(26, '17030192', 'c4ca4238a0b923820dcc509a6f75849b', 'Michael', 'ĐHHTTT13B', 'sinhvien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id_diem`);

--
-- Indexes for table `hososinhvien`
--
ALTER TABLE `hososinhvien`
  ADD PRIMARY KEY (`id_hososv`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id_monhoc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
  MODIFY `id_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hososinhvien`
--
ALTER TABLE `hososinhvien`
  MODIFY `id_hososv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id_monhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
