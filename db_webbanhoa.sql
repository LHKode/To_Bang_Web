-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 08:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webbanhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `descriptions` varchar(191) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `age`, `phone`, `facebook`, `youtube`, `avatar`, `address`, `descriptions`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, '03-03-2018-e0d0e0c53cd0da15f59e73d21582444a.jpg', 'Hà Nội', NULL, NULL, 'MlhmTuheyCNUfa9jFZnO6RvlHbbBUR3AUpFjldGMjP7jfCXiZ62NkzqcJUM4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `p_title` varchar(190) DEFAULT NULL,
  `p_slug` varchar(190) DEFAULT NULL,
  `p_descriptions` longtext DEFAULT NULL,
  `p_content` longtext DEFAULT NULL,
  `p_admin_id` int(11) DEFAULT NULL,
  `p_thunbar` varchar(190) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `p_title`, `p_slug`, `p_descriptions`, `p_content`, `p_admin_id`, `p_thunbar`, `created_at`, `updated_at`) VALUES
(8, 'Cây hồng cổ Sapa', 'cay-hong-co-sapa', 'ồng Cổ Sapa luôn được săn tìm  thực tế hồng đắt là do sự quý hiếm cũng như hoa đẹp và bền hơn hẳn so với các loại hồng thường, đặc điểm của cây hoa hồng cổ Sapa ra hoa gần như quanh năm cũng như việc nhân giống chỉ có thể là chiết chứ ko dâm được. ', '<p><strong>Hồng Cổ Sapa&nbsp;</strong>lu&ocirc;n được săn t&igrave;m &nbsp;thực tế hồng đắt l&agrave; do sự qu&yacute; hiếm cũng như hoa đẹp v&agrave; bền hơn hẳn so với c&aacute;c loại hồng thường, đặc điểm của c&acirc;y hoa&nbsp;<strong>hồng cổ Sapa</strong>&nbsp;ra hoa gần như quanh năm cũng như việc nh&acirc;n giống chỉ c&oacute; thể l&agrave; chiết chứ ko d&acirc;m được. &nbsp;M&ugrave;i hoa hồng cổ rất thơm hoa bền c&agrave;nh d&agrave;y,&nbsp;<strong>Hồng cổ Sapa</strong>&nbsp;được mang sang Việt Nam từ thời ph&aacute;p n&ecirc;n một số nơi gọi l&agrave; hồng ph&aacute;p. Loại hồng n&agrave;y được trồng rải r&aacute;c khắp miền bắc tập trung nhiều ở sapa.<strong>&nbsp;<img alt=\"cayhongcosapa\" src=\"http://www.congtycayxanh.vn/images/Cay-Xanh/cayhongcosapa.png\" style=\"height:649px; width:650px\" /></strong></p>\r\n\r\n<p>Một v&agrave;i đặc điểm của loại hồng đặc biệt n&agrave;y khiến d&acirc;n chơi hoa hồng say đắm nếu bạn đ&atilde; từng 1 lần nh&igrave;n thấy n&oacute; th&igrave; m&igrave;nh nghĩ chắc sẽ kh&ocirc;ng c&oacute; loại hoa hồng n&agrave;o mang lại cho bạn cảm gi&aacute;c th&iacute;ch th&uacute; đến vậy, Hoa gần như nở tr&agrave;n th&acirc;n, Kể cả những b&ocirc;ng đ&atilde; t&agrave;n th&igrave; form của hoa gần như vẫn to&agrave;n diện. Hoa sẽ đẹp nhất v&agrave;o th&aacute;ng 9 trở đi tại miền bắc khi những ng&agrave;y nắng gắt bắt đầu kết th&uacute;c.<br />\r\n<img alt=\"hoahongcosapa\" src=\"http://www.congtycayxanh.vn/images/banner/service/hoahongcosapa.jpg\" style=\"height:721px; width:646px\" /><br />\r\n<strong>Hoa hồng cổ Sapa</strong>&nbsp;gần như vẫn đẹp mặc d&ugrave; đ&atilde; nở gần nửa th&aacute;ng<br />\r\n<img alt=\"hoahongcosapa co nhieuhoa\" src=\"http://www.congtycayxanh.vn/images/banner/service/hoahongcosapa_co_nhieuhoa.jpg\" /></p>\r\n\r\n<p>Một bụi nhỏ c&oacute; thể sở hữu cả 100 b&ocirc;ng hoa c&ugrave;ng 1 l&uacute;c v&agrave; ra quanh năm đ&acirc;y l&agrave; đặc điểm m&agrave; hiếm loại hồng n&agrave;o c&oacute; được kh&ocirc;ng chỉ đẹp ở hoa cổ sapa c&ograve;n sở hữu vẻ đẹp từ l&aacute;. L&aacute; non m&agrave;u đỏ rất bắt mắt v&agrave; đầy sức sống<br />\r\nT&ecirc;n gọi&nbsp;<a href=\"http://www.congtycayxanh.vn/hong-co-sapa.html\" target=\"_blank\"><strong>Hoa Hồng Cổ Sapa</strong></a><br />\r\nT&ecirc;n kh&aacute;c : C&acirc;y hồng cổ SaPa,&nbsp;<strong>c&acirc;y hoa hồng Ph&aacute;p&nbsp;</strong>Ph&acirc;n bố&nbsp;<strong>c&acirc;y hồng cổ sapa</strong><br />\r\nC&acirc;y c&oacute; nguồn gốc từ Ch&acirc;u &Acirc;u, trồng nhiều nhất ở nước Ph&aacute;p.&nbsp;<strong>Hồng cổ</strong>&nbsp;l&agrave; c&acirc;y bản địa của SaPa - Việt Nam.</p>\r\n\r\n<p><strong><img alt=\"cayhongcosapa\" src=\"http://www.congtycayxanh.vn/images/Cay-Xanh/cayhongcosapa.jpg\" style=\"height:803px; width:647px\" /><br />\r\nĐặc điểm đặc trưng của hồng cổ sapa</strong><br />\r\n- L&agrave;&nbsp;c&acirc;y bụi, t&aacute;n rộng. Th&acirc;n c&oacute; l&ocirc;ng mao v&agrave; gai<br />\r\n- L&aacute; c&acirc;y m&agrave;u xanh tươi.&nbsp;L&aacute; dạng l&aacute; k&eacute;p l&ocirc;ng chim mọc c&aacute;ch, m&eacute;p l&aacute; l&agrave; răng cư&shy;a.<br />\r\n- C&acirc;y rất sai nụ v&agrave; nhiều hoa. Hoa c&oacute; nhiều m&agrave;u nhưng chủ yếu l&agrave; m&agrave;u hồng v&agrave; m&agrave;u t&iacute;m. Hoa to bằng miệng b&aacute;t cơm, c&oacute; c&aacute;c c&aacute;nh xếp kh&iacute;t với nhau. Hoa c&oacute; m&ugrave;i thơm nhẹ dễ chịu.&nbsp;<br />\r\n- Quả nhỏ, m&agrave;u xanh, c&oacute; h&igrave;nh tr&aacute;i xoan, trong chứa rất nhiều hạt, thuộc loại quả nang.</p>\r\n\r\n<p><img alt=\"cosapa-loaidep\" src=\"http://www.congtycayxanh.vn/images/Cay-Xanh/cosapa-loaidep.jpg\" style=\"height:859px; width:644px\" /><br />\r\n<strong>Kỹ thuật chăm s&oacute;c c&acirc;y hồng cổ sapa&nbsp;</strong><br />\r\n- Nh&acirc;n giống bằng c&aacute;ch chiết &nbsp;c&agrave;nh. Trồng c&acirc;y v&agrave;o m&ugrave;a xu&acirc;n hoặc m&ugrave;a thu.</p>\r\n\r\n<p>- C&acirc;y c&oacute; sức sống mạnh mẽ, rất dễ chăm s&oacute;c.&nbsp;<br />\r\n- Th&iacute;ch nghi với nhiều điều kiện kh&iacute; hậu kh&aacute;c nhau. C&oacute; khả năng chịu lạnh tới -15 độ C.<br />\r\n- C&acirc;y ưa s&aacute;ng n&ecirc;n cần trồng chỗ c&oacute; nhiều &aacute;nh nắng.<br />\r\n- Th&iacute;ch hợp nhất với đất thịt pha ph&ugrave; sa. Đất trồng cần tơi xốp v&agrave; tho&aacute;t nước tốt.&nbsp;<br />\r\n- Thường xuy&ecirc;n tỉa c&agrave;nh v&agrave; l&aacute; cho t&aacute;n c&acirc;y th&ocirc;ng tho&aacute;ng.<br />\r\n- C&acirc;y 4 năm tuổi sẽ cho sản lượng hoa thấp, cần tiến h&agrave;nh trồng lại. .&nbsp;<br />\r\n<img alt=\"hongcosapaa-\" src=\"http://www.congtycayxanh.vn/images/Cayxanh/hongcosapaa-.jpg\" style=\"height:485px; width:647px\" /><br />\r\nHồng cổ sapa c&oacute; hoa rất bền v&agrave; c&aacute;nh d&agrave;y cũng như hoa nở vẫn giữ phom rất chuẩn<br />\r\n<img alt=\"vnp hongcoava\" src=\"http://www.congtycayxanh.vn/images/Cayxanh/vnp_hongcoava.jpg\" style=\"height:480px; width:646px\" /><br />\r\nC&acirc;y hồng cổ lớn của một chủ vườn c&oacute; tiếng tại Hưng Y&ecirc;n<br />\r\n<img alt=\"cosapa\" src=\"http://www.congtycayxanh.vn/images/Cayxanh/cosapa.jpg\" /><br />\r\n<strong>Cổ sapa c&oacute; hoa rất bền&nbsp;</strong><br />\r\n<img alt=\"cosapa loai vua phai\" src=\"http://www.congtycayxanh.vn/images/Cay-Xanh/cosapa_loai_vua_phai.jpg\" style=\"height:909px; width:638px\" /><br />\r\nCổ sapa loại vừa phải l&agrave; c&acirc;y chiết sức ph&aacute;t triển rất mạnh được rất nhiều người lựa chọn v&igrave; gi&aacute; phải chăng so với c&acirc;y to, c&oacute; chiều cao 1,5m t&aacute;n rộng 1m<br />\r\n<img alt=\"cosapagiong\" src=\"http://www.congtycayxanh.vn/images/Cay-Xanh/cosapagiong.jpg\" style=\"height:744px; width:634px\" /><br />\r\nLoại giống c&oacute; chiều cao 1,5m c&oacute; hoa lu&ocirc;n gi&aacute; tốt c&oacute; chiều cao 1m t&aacute;n rộng 40cm<br />\r\nTừ kh&oacute;a t&igrave;m kiếm;&nbsp;<strong>Ban cay hong co sapa, ban Hong co sapa</strong></p>\r\n', 1, 'cayhongcosapa.png', '2018-06-27 14:46:07', '2018-06-27 14:46:07'),
(9, 'Hoa bó ngày 8/3', 'hoa-bo-ngay-83', 'Mô tả ngắn', '<p>&nbsp;</p>\r\n\r\n<p><strong>B&oacute; hoa tươi&nbsp;</strong>Thanks gồm c&aacute;c loại hoa tươi:</p>\r\n\r\n<p>- 9 hoa hồng đỏ</p>\r\n\r\n<p>- Cẩm chướng đỏ viền</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>- Giấy g&oacute;i - nơ xuất xứ HQ</p>\r\n\r\n<p>* Shop HoaYeuThuong cam kết chất lượng hoa tr&ecirc;n từng sản phẩm hoa được giao đến tay người nhận.</p>\r\n\r\n<p>* Đặt hoa số lượng lớn vui l&ograve;ng gọi hotline: 18006353</p>\r\n\r\n<p><img src=\"https://hoayeuthuong.com/editor/tiny_mce/plugins/advimage/ShowItemSubImage.aspx?id=1527\" /></p>\r\n', 1, '6005_shop-hoa-tuoi.jpg', '2019-03-03 16:24:53', '2019-03-03 16:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) DEFAULT 0,
  `giasanpham` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_chitietdonhang`, `donhang_id`, `sanpham_id`, `soluong`, `giasanpham`, `created_at`) VALUES
(65, 27, 12, 1, 450000, '2018-10-24 16:42:58'),
(66, 28, 12, 1, 450000, '2018-10-24 16:43:36'),
(67, 29, 18, 5, 225000, '2019-03-03 16:11:35'),
(68, 30, 20, 1, 550000, '2019-03-03 16:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `danhmuc_id` int(11) DEFAULT 0,
  `kieudanhmuc` tinyint(4) DEFAULT 1,
  `anhdanhmuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` tinyint(4) DEFAULT 0,
  `noibat` tinyint(4) DEFAULT 0,
  `icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `danhmuc_id`, `kieudanhmuc`, `anhdanhmuc`, `vitri`, `noibat`, `icon`, `color`, `trangthai`) VALUES
(20, 'HOA CẮT CÀNH', 0, 1, '', 6, 1, 'fa fa-dashboard', '#2476db', 1),
(21, 'HOA HỘP / HOA GIỎ', 0, 1, '', 5, 1, ' fa fa-ge', NULL, 1),
(22, 'HOA CHẬU / GIỎ TREO', 0, 1, '', 4, 1, 'fa fa-tree', '#42ef10', 1),
(23, 'HOA LAN', 0, 1, '', 3, 1, 'fa fa-gift', NULL, 1),
(24, 'HOA SỰ KIỆN', 0, 1, '', 2, 0, 'fa fa-pagelines', NULL, 1),
(25, 'TIỂU CẢNH / SÂN VƯỜN', 0, 1, '', 1, 0, 'fa fa-leaf', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `madonhang` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` float DEFAULT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `quantrivien_id` int(11) DEFAULT 0,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vanchuyen` tinyint(4) DEFAULT 0,
  `ngaythanhtoan` date DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT 0,
  `ngaycapnhat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `madonhang`, `tongtien`, `khachhang_id`, `ngaytao`, `quantrivien_id`, `ghichu`, `vanchuyen`, `ngaythanhtoan`, `trangthai`, `ngaycapnhat`) VALUES
(27, '33Bqcptaxb', 500000, 8, NULL, 0, '', 1, '2018-10-24', 0, NULL),
(28, 'GYNYKTJB5P', 480000, 8, NULL, 0, '', 2, NULL, 0, NULL),
(29, 'BadGFTCPqj', 1175000, 11, NULL, 0, 'giao hàng sau 10h trưa', 1, NULL, 0, NULL),
(30, 'SYnJwBQp46', 580000, 11, NULL, 0, 'giao hàng sau 10h trưa', 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hit` tinyint(4) DEFAULT 0,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_khachhang`, `tenkhachhang`, `email`, `matkhau`, `sodienthoai`, `diachi`, `hit`, `ghichu`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'Khách hàng A', 'khachhanga@gmail.com', '123456', '0987654321', 'Xóm 3 Quỳnh Lưu Nghệ An ', 0, 'ko ', '2018-06-10 10:42:28', '2018-06-10 10:42:28'),
(2, 'Khách hàng B', 'khachhangb@gmail.com', '123456', '098765467', 'Hải Phòng', 0, NULL, '2018-06-10 10:42:58', '2018-06-10 10:42:58'),
(11, 'Nguyễn Văn Dược', 'duocnvoit1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01659020898', 'thái bình', 0, 'giao hàng sau 10h trưa', '2019-03-03 16:11:35', '2019-03-03 16:11:35'),
(12, 'Nguyễn Văn Dược', 'duocnvoit@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01659020898', 'thái bình', 0, NULL, '2019-09-14 08:41:51', '2019-09-14 08:41:51'),
(13, 'NGuyễn Văn Dược', 'duocnvoit121@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0928817228', 'Thôn Nội Thôn Xã Tây Đô Huyện Hưng Hà Tỉnh Thái Bình', 0, NULL, '2019-11-10 09:37:37', '2019-11-10 09:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieude` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `hoten`, `email`, `tieude`, `noidung`, `thoigian`) VALUES
(1, 'Quốc học', 'quochoc@gmail.com', 'Hoa xấu', 'hódfjsdfsdfklsjdflsdfsdf', '2018-07-01 07:13:28'),
(2, 'NGuyễn Văn Dược', 'duocnvoit@gmail.com', 'giúp tôi', 'Đặt hàng ', '2019-03-03 16:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quantrivien`
--

CREATE TABLE `tbl_quantrivien` (
  `id_quantrivien` int(11) NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT 1,
  `hoatdong` tinyint(4) DEFAULT 0,
  `capdo` int(11) DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quantrivien`
--

INSERT INTO `tbl_quantrivien` (`id_quantrivien`, `hoten`, `sodienthoai`, `email`, `matkhau`, `trangthai`, `hoatdong`, `capdo`, `ngaytao`, `ngaycapnhat`) VALUES
(2, 'Admin', '01659020898', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 1, 2, '2018-06-10 09:22:53', '2019-03-03 16:14:19'),
(3, 'Văn Dược', '0987654321', 'vanduoc@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 0, 2, '2018-06-10 09:41:43', '2019-03-03 16:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masanpham` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `danhmuc_id` int(11) DEFAULT 0,
  `giasanpham` int(11) DEFAULT 0,
  `soluong` int(11) DEFAULT 0,
  `giamgia` tinyint(4) DEFAULT 0,
  `anhsanpham` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khuyenmai` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `noibat` tinyint(4) DEFAULT 0,
  `trangthai` tinyint(4) DEFAULT 1,
  `soluotmua` int(11) DEFAULT 0,
  `noidung` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `danhmuc_id`, `giasanpham`, `soluong`, `giamgia`, `anhsanpham`, `khuyenmai`, `mota`, `noibat`, `trangthai`, `soluotmua`, `noidung`, `ngaytao`, `ngaycapnhat`) VALUES
(10, 'Hoa cắt cành 001', 'j9wi0cviq4g91ropiesul', 20, 350000, 0, 10, '2018-06-23__7d0f1086f5ac4eff86cb9097f5983b22jpg.jpeg', '<p>Các loại hoa</p>', '<p>mô tả</p>', 0, 1, 0, '<p>C&aacute;c loại hoa</p>\r\n', '2018-06-23 08:17:12', '2018-06-24 17:49:57'),
(11, 'Hoa ly đà lạt 002', 'lgxbsriou8myeakxedj1f', 20, 600000, 82, 5, '2018-06-23__0-7326-1455941620-copyjpg.jpeg', '<p>Hoa ly đà lạt 002<br></p>', '<p>Hoa ly đà lạt 002<br></p>', 0, 0, 0, '<p>Hoa ly đ&agrave; lạt 002</p>\r\n', '2018-06-23 09:12:46', '2018-10-20 07:34:06'),
(12, 'Mẫu hoa sinh nhật 003', 'xc4p5hfg0qr85one8grmh', 20, 500000, 82, 10, '2018-06-23__4907-copyjpg.jpeg', '<p>Mẫu hoa sinh nhật 003<br></p>', '<p>Mẫu hoa sinh nhật 003<br></p>', 0, 1, 0, '<p>Mẫu hoa sinh nhật 003</p>\r\n', '2018-06-23 09:17:28', '2018-10-24 16:46:13'),
(13, 'Giỏ hoa lễ cưới 039', 'ncpcaje6m9hg75z1572h5', 21, 700000, 22, 0, '2018-06-23__1301217213915-copyjpg.jpeg', '<p>Không</p>', '<p>Giỏ hoa lễ cưới 039<br></p>', 0, 1, 0, '<p>Giỏ hoa lễ cưới 039</p>\r\n', '2018-06-23 17:46:25', '2018-07-01 07:21:38'),
(14, 'Giỏ hoa để bàn  0369', '48nxm76qjgjnrhf5sc6vv', 22, 599900, 4, 0, '2018-06-23__20121209184809199-copyjpg.jpeg', '<p>Giỏ hoa để bàn  0369<br></p>', '<p>Giỏ hoa để bàn  0369<br></p>', 0, 1, 0, '<p>Giỏ hoa để b&agrave;n &nbsp;0369</p>\r\n', '2018-06-23 18:02:24', '2018-06-24 17:45:16'),
(15, 'Hoa Lan 098', 'e4ms26qdzhrmgp6q2yd7gb', 23, 600000, 80, 0, '2018-07-01__1416hinh-nen-lang-hoa-doc-dao-voi-nhieu-chung-loai-khac-nhau-copyjpg.jpeg', '<p>Không</p>', '<p>hoa lan rừng&nbsp;</p>', 0, 1, 0, '<p>hoa lan rừng&nbsp;</p>\r\n', '2018-07-01 07:10:27', '2018-07-01 07:10:27'),
(16, 'Hoa hồng bó ngày 8/3', '2w8s86qti27zkgi70p9px', 25, 580000, 50, 10, '2019-03-03__5045cua-hang-hoajpg.jpeg', '<p>Nôi dung</p>', '<p>Mô tả sản phẩm</p>', 0, 1, 0, '<p>B&agrave;i viết li&ecirc;n quan</p>\r\n', '2019-03-03 15:52:03', '2019-03-03 15:52:03'),
(17, 'BÓ HOA TƯƠI - MỘT TÌNH YÊU', 'shcwd1sxwec4ghr28enp7n', 20, 200000, 200, 0, '2019-03-03__5419shop-hoa-tuoijpg.jpeg', '<p>\r\n\r\n</p><ul><li>Tặng banner, thiệp (trị giá 20.000đ) miễn phí</li><li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li><li>Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE lần thứ 2, 5% cho đơn hàng Bạn tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn tạo ONLINE lần thứ 12 <em>(Chỉ áp dụng tại Tp. HCM)</em></li><li>Giao miễn phí trong nội thành 63/63 tỉnh</li><li>Giao gấp trong vòng 2 giờ</li><li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li><li>Cam kết hoa tươi trên 3 ngày</li></ul>\r\n\r\n<br><p></p>', '<p>\r\n\r\nBó hoa được thiết kế đơn giản với một hoa hồng đỏ rednaomi cùng các loại hoa, lá phụ mang ý nghĩa \"Em là tình yêu duy nhất của anh\". Không cần cầu kỳ với nhiều hoa hay lá phụ, \"Môt tình yêu\" vẫn đủ sức làm lay động bất cứ ai với thiết kế và vẻ đẹp giản đơn của mình\r\n\r\n<br></p>', 0, 1, 0, '<p>Hoa tươi</p>\r\n', '2019-03-03 15:53:50', '2019-03-03 15:54:10'),
(18, 'BÓ HOA TƯƠI - GREEN MEMORY', 'zdrirv6zxqd0rof7ruy5o', 20, 250000, 10, 10, '2019-03-03__6005shop-hoa-tuoijpg.jpeg', '<p>\r\n\r\n</p><ul><li>Tặng banner, thiệp (trị giá 20.000đ) miễn phí</li><li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li><li>Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE lần thứ 2, 5% cho đơn hàng Bạn tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn tạo ONLINE lần thứ 12 <em>(Chỉ áp dụng tại Tp. HCM)</em></li><li>Giao miễn phí trong nội thành 63/63 tỉnh</li><li>Giao gấp trong vòng 2 giờ</li><li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li><li>Cam kết hoa tươi trên 3 ngày</li></ul>\r\n\r\n<br><p></p>', '<p>\r\n\r\nBó hoa cẩm chướng xanh với tone màu mát mẻ cùng với sự chấm phá tinh khôi của những cụm hoa mimi trắng ngần. Green memory gợi nhớ cho ta về những kỉ niệm tươi mới và đẹp đẽ. Thích hợp tặng cho nam vào những dịp kỉ niệm, sinh nhật, chúc mừng...\r\n\r\n<br></p>', 0, 1, 0, '<p>B&oacute; hoa cẩm chướng xanh với tone m&agrave;u m&aacute;t mẻ c&ugrave;ng với sự chấm ph&aacute; tinh kh&ocirc;i của những cụm hoa mimi trắng ngần. Green memory gợi nhớ cho ta về những kỉ niệm tươi mới v&agrave; đẹp đẽ. Th&iacute;ch hợp tặng cho nam v&agrave;o những dịp kỉ niệm, sinh nhật, ch&uacute;c mừng...</p>\r\n', '2019-03-03 15:55:18', '2019-03-03 15:55:18'),
(19, 'HOA TẶNG MẸ - TÌNH YÊU DIỆU KỲ', '2kbx2pspseq4ngrobrmldk', 21, 700000, 50, 10, '2019-03-03__5454dien-hoajpg.jpeg', '<p>\r\n\r\n</p><ul><li>Tặng banner, thiệp (trị giá 20.000đ) miễn phí</li><li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li><li>Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE lần thứ 2, 5% cho đơn hàng Bạn tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn tạo ONLINE lần thứ 12 <em>(Chỉ áp dụng tại Tp. HCM)</em></li><li>Giao miễn phí trong nội thành 63/63 tỉnh</li><li>Giao gấp trong vòng 2 giờ</li><li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li><li>Cam kết hoa tươi trên 3 ngà</li></ul>\r\n\r\n<br><p></p>', '<p>\r\n\r\nTình yêu là thứ cảm xúc đẹp đẽ và mạnh mẽ nhất. Tình yêu cho chúng ta sống giữa mộng mơ và thực tại, cho chúng ta nếm trải đầy đủ cung bậc cảm xúc: Hỉ - nộ - ái - ố. Phức tạp là vậy nhưng nào có ai trách vì mình được yêu quá nhiều bao giờ, người ta chỉ buồn vì chưa tìm ra tình yêu của đời mình mà thôi. Giỏ hoa là lời chúc, là sự tôn vinh cho sự diệu kỳ của tình yêu.\r\n\r\n<br></p>', 0, 1, 0, '<p><strong>Giỏ hoa tươi&nbsp;</strong>T&igrave;nh Y&ecirc;u Diệu Kỳ gồm c&aacute;c loại hoa:</p>\r\n\r\n<p>- 20 hồng v&agrave;ng</p>\r\n\r\n<p>- Hoa thủy ti&ecirc;n v&agrave;ng</p>\r\n\r\n<p>- Salem/ thạch thảo/ mimi trắng</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>* Shop HoaYeuThuong cam kết chất lượng hoa tr&ecirc;n từng sản phẩm hoa được giao đến tay người nhận</p>\r\n', '2019-03-03 15:57:20', '2019-03-03 15:57:20'),
(20, 'GIỎ HOA TƯƠI - HẠNH PHÚC', 'jt0nkaicqrh6zyrcx0qzmg', 21, 550000, 40, 0, '2019-03-03__5205shop-hoa-tuoijpg.jpeg', '<p>\r\n\r\n</p><ul><li>Tặng banner, thiệp (trị giá 20.000đ) miễn phí</li><li>Giảm ngay 20.000đ khi Bạn tạo đơn hàng online</li><li>Giảm tiếp 3% cho đơn hàng Bạn tạo ONLINE lần thứ 2, 5% cho đơn hàng Bạn tạo ONLINE lần thứ 6 và 10% cho đơn hàng Bạn tạo ONLINE lần thứ 12 <em>(Chỉ áp dụng tại Tp. HCM)</em></li><li>Giao miễn phí trong nội thành 63/63 tỉnh</li><li>Giao gấp trong vòng 2 giờ</li><li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li><li>Cam kết hoa tươi trên 3 ngày</li></ul>\r\n\r\n<br><p></p>', '<p>\r\n\r\nHạnh phúc là cái gì? Đó là cảm giác đến từ trái tim, chứ không phải nhận định của người khác. Hạnh phúc và bi ai thực sự, chỉ có bản thân mới hiểu, định nghĩa của hạnh phúc của mỗi người đâu có giống nhau. Hạnh phúc là hai người yên lặng bảo vệ, gom góp tất cả tình yêu gửi sâu vào đáy lòng, ngày qua ngày mang ra thưởng thức. Giỏ hoa này sẽ lan tỏa và nhân rộng hạnh phúc đến từng người, từng nhà, trong từng mối quan hệ tình cảm giữa con người với nhau.\r\n\r\n<br></p>', 0, 1, 0, '<p><strong>Giỏ hoa tươi&nbsp;</strong>Hạnh Ph&uacute;c gồm c&aacute;c loại hoa ;&nbsp;</p>\r\n\r\n<p>- Hoa hồng sen</p>\r\n\r\n<p>- Hoa hồng da</p>\r\n\r\n<p>- Hoa m&otilde;m s&oacute;i</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>* Điện HoaYeuThuong giảm ngay 20.000VND khi qu&yacute; kh&aacute;ch tự tạo đơn h&agrave;ng online tr&ecirc;n website hoayeuthuong.com</p>\r\n', '2019-03-03 15:58:53', '2019-03-03 15:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `madonhang` (`madonhang`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Indexes for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Indexes for table `tbl_quantrivien`
--
ALTER TABLE `tbl_quantrivien`
  ADD PRIMARY KEY (`id_quantrivien`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD UNIQUE KEY `masanpham` (`masanpham`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_quantrivien`
--
ALTER TABLE `tbl_quantrivien`
  MODIFY `id_quantrivien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
