-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2020 lúc 04:08 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_alldayfolwer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EmailKH` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhauKH` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `EmailKH`, `MatKhauKH`) VALUES
(1, 'Hoàng Khánh', 'hoangkhanh9119@gmail.com', '123456789'),
(2, 'demo', 'lhklyric@gmail.com', '12'),
(3, 'Khanh Lam', '0977829017@13', '123'),
(4, 'Hoàng Khánh', 'hoangkhanh9119@gmail.com', '123'),
(5, 'Khanh Lam', 'trungbeo20@gmail.com', '123'),
(6, 'Khanh Lam', 'hoangkhanh9119@gmail.com', '123'),
(7, 'Khanh Lam', 'hoangkhanh9119@gmail.com', '123'),
(8, 'Khanh Lam', 'hoangkhanh9119@gmail.com', '123'),
(9, 'Khanh Lam', 'hoangkhanh9119@gmail.com', '123'),
(10, 'Khanh Lam', 'hoangkhanh9119@gmail.com', '12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`,`EmailKH`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
