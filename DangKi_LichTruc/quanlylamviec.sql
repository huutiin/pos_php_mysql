-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2023 lúc 08:51 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlylamviec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `matk` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `tentk` varchar(50) DEFAULT NULL,
  `mk` varchar(50) DEFAULT NULL,
  `quyen` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`matk`, `manv`, `tentk`, `mk`, `quyen`) VALUES
(1, 1, 'john_account', '123', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietluong`
--

CREATE TABLE `chitietluong` (
  `matinhluong` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `luongcoban` int(11) DEFAULT NULL,
  `mathoigianca` int(11) DEFAULT NULL,
  `tenthoigianca` varchar(20) DEFAULT NULL,
  `thoigianstar` time DEFAULT NULL,
  `thoigianend` time DEFAULT NULL,
  `sogiolv` decimal(4,2) DEFAULT NULL,
  `tuanlamviec` int(11) DEFAULT NULL,
  `luongtongcong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietluong`
--

INSERT INTO `chitietluong` (`matinhluong`, `manv`, `ten`, `luongcoban`, `mathoigianca`, `tenthoigianca`, `thoigianstar`, `thoigianend`, `sogiolv`, `tuanlamviec`, `luongtongcong`) VALUES
(1, 1, 'John', 17000, 1, 'Ca 1', '08:00:00', '12:00:00', 4.00, 1, 68000),
(2, 1, 'John', 17000, 2, 'Ca 2', '12:00:00', '16:00:00', 4.00, 1, 68000),
(3, 1, 'John', 17000, 3, 'Ca 3', '16:00:00', '21:30:00', 5.50, 1, 93500),
(4, 1, 'John', 17000, 4, 'Ca hỗ trợ', '16:30:00', '19:30:00', 3.00, 1, 51000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `malichlamviec` int(11) NOT NULL,
  `mathoigianca` int(11) DEFAULT NULL,
  `malichranh` int(11) DEFAULT NULL,
  `manv` int(11) DEFAULT NULL,
  `tuanlichlamviec` int(11) DEFAULT NULL,
  `thu` varchar(10) DEFAULT NULL,
  `tenca` varchar(20) DEFAULT NULL,
  `tennv1` varchar(100) DEFAULT NULL,
  `tennv2` varchar(100) DEFAULT NULL,
  `tennv3` varchar(100) DEFAULT NULL,
  `tennv4` varchar(100) DEFAULT NULL,
  `tennv5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`malichlamviec`, `mathoigianca`, `malichranh`, `manv`, `tuanlichlamviec`, `thu`, `tenca`, `tennv1`, `tennv2`, `tennv3`, `tennv4`, `tennv5`) VALUES
(1, 1, 1, 1, 1, 'Sat', 'Ca 1', 'John', NULL, NULL, NULL, NULL),
(2, 2, 2, 1, 1, 'Sun', 'Ca 2', 'John', NULL, NULL, NULL, NULL),
(3, 3, 3, 1, 1, 'Mon', 'Ca 3', 'John', NULL, NULL, NULL, NULL),
(4, 4, 4, 1, 1, 'Tue', 'Ca hỗ trợ', 'John', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichranh`
--

CREATE TABLE `lichranh` (
  `malichranh` int(11) NOT NULL,
  `mathoigianca` int(11) DEFAULT NULL,
  `manv` int(11) DEFAULT NULL,
  `tuanlichranh` int(11) DEFAULT NULL,
  `thu` varchar(10) DEFAULT NULL,
  `tenca` varchar(20) DEFAULT NULL,
  `tennv` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichranh`
--

INSERT INTO `lichranh` (`malichranh`, `mathoigianca`, `manv`, `tuanlichranh`, `thu`, `tenca`, `tennv`) VALUES
(1, 1, 1, 1, 'Sat', 'Ca 1', 'John'),
(2, 2, 1, 1, 'Sun', 'Ca 2', 'John'),
(3, 3, 1, 1, 'Mon', 'Ca 3', 'John'),
(4, 4, 1, 1, 'Tue', 'Ca hỗ trợ', 'John');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `luongcoban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ten`, `luongcoban`) VALUES
(1, 'John', 17000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoanluong`
--

CREATE TABLE `thanhtoanluong` (
  `mathanhtoan` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `tuanlamviec` int(11) DEFAULT NULL,
  `tongluong` int(11) DEFAULT NULL,
  `luongdanhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoanluong`
--

INSERT INTO `thanhtoanluong` (`mathanhtoan`, `manv`, `tuanlamviec`, `tongluong`, `luongdanhan`) VALUES
(1, 1, 1, 68000, 0),
(2, 1, 2, 68000, 0),
(3, 1, 3, 93500, 0),
(4, 1, 4, 51000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigianca`
--

CREATE TABLE `thoigianca` (
  `mathoigianca` int(11) NOT NULL,
  `tenthoigianca` varchar(20) DEFAULT NULL,
  `thoigianstar` time DEFAULT NULL,
  `thoigianend` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigianca`
--

INSERT INTO `thoigianca` (`mathoigianca`, `tenthoigianca`, `thoigianstar`, `thoigianend`) VALUES
(1, 'Ca 1', '08:00:00', '12:00:00'),
(2, 'Ca 2', '12:00:00', '16:00:00'),
(3, 'Ca 3', '16:00:00', '21:30:00'),
(4, 'Ca hỗ trợ', '16:30:00', '19:30:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`matk`);

--
-- Chỉ mục cho bảng `chitietluong`
--
ALTER TABLE `chitietluong`
  ADD PRIMARY KEY (`matinhluong`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`malichlamviec`);

--
-- Chỉ mục cho bảng `lichranh`
--
ALTER TABLE `lichranh`
  ADD PRIMARY KEY (`malichranh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `thanhtoanluong`
--
ALTER TABLE `thanhtoanluong`
  ADD PRIMARY KEY (`mathanhtoan`);

--
-- Chỉ mục cho bảng `thoigianca`
--
ALTER TABLE `thoigianca`
  ADD PRIMARY KEY (`mathoigianca`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietluong`
--
ALTER TABLE `chitietluong`
  MODIFY `matinhluong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `malichlamviec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichranh`
--
ALTER TABLE `lichranh`
  MODIFY `malichranh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thanhtoanluong`
--
ALTER TABLE `thanhtoanluong`
  MODIFY `mathanhtoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thoigianca`
--
ALTER TABLE `thoigianca`
  MODIFY `mathoigianca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
