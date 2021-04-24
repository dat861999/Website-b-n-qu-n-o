-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2020 lúc 06:42 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES
(1, 'A0201', 1, 100),
(1, 'G0401', 1, 250),
(2, 'A0201', 1, 100),
(2, 'G0401', 1, 250),
(3, 'A0101', 2, 100),
(3, 'A0105', 3, 360),
(4, 'A0102', 3, 450);

--
-- Bẫy `chitietdathang`
--
DELIMITER $$
CREATE TRIGGER `Update_Amount` AFTER INSERT ON `chitietdathang` FOR EACH ROW BEGIN
UPDATE `hanghoa` SET `SoLuongHang` = SoLuongHang - new.SoLuong
WHERE `MSHH` = `MSHH`;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MSKH` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MSNV` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `NgayDH`, `TrangThai`, `MSKH`, `MSNV`) VALUES
(1, '2020-06-18 12:43:22', '1', 'quan', 'Admin'),
(2, '2020-06-18 12:43:26', '1', 'quan', 'Admin'),
(3, '2020-06-18 13:07:45', '0', 'quan', 'Null'),
(4, '2020-06-18 13:36:55', '0', 'quan', 'Null');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaHH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('A0101', 'Áo khoác', 200, 50, 'N01', 'img/products/product-8.jpg', 'Áo khoác nam ấm áp '),
('A0102', 'Áo thun', 150, 60, 'N01', 'img/products/N0101.jpg', 'Áo thun trơn (Đen)'),
('A0103', 'Áo sơ mi', 160, 67, 'N01', 'img/products/N0102.jpg', 'Áo sơ mi (Sọc caro)'),
('A0104', 'Áo khoác nam', 250, 30, 'N01', 'img/products/N0103.jpg', 'Áo khoác nam'),
('A0105', 'Áo thun', 120, 80, 'N01', 'img/products/N0104.jpg', 'Áo thun nam thời trang'),
('A0201', 'Áo len', 100, 42, 'N02', 'img/products/product-1.jpg', 'Áo len nữ (Vàng)'),
('A0202', 'Áo Len (Ngắn)', 130, 82, 'N02', 'img/products/product-2.jpg', 'Áo len nữ (Tím sen)'),
('A0203', 'Áo khoác nữ', 150, 92, 'N02', 'img/products/product-3.jpg', 'Áo khoác '),
('A0204', 'Áo len', 160, 79, 'N02', 'img/products/product-6.jpg', 'Áo len (Sóc nâu)'),
('A0401', 'Váy cho bé gái', 150, 20, 'N03', 'img/products/N0301.jpg', 'Váy bé gái siêu cute'),
('A0402', 'Áo sơ mi bé trai', 100, 88, 'N03', 'img/products/N0302.jpg', 'Áo sơ mi bé trai'),
('A0403', 'Áo khoác cho bé gái', 250, 73, 'N03', 'img/products/N0303.jpg', 'Áo khoác cho bé gái siêu cute'),
('A0404', 'Áo ấm cho bé trai', 150, 99, 'N03', 'img/products/N0304.jpg', 'Áo ấm cho bé trai siêu hot'),
('A0405', 'Váy cho bé gái', 200, 92, 'N03', 'img/products/N0305.jpg', 'Váy bé gái siêu cute'),
('B0401', 'Balo', 200, 10, 'N04', 'img/products/product-7.jpg', 'Balo (Teemo ông vàng)'),
('G0401', 'Giày', 250, 72, 'N04', 'img/products/product-9.jpg', 'Giày thể thao '),
('K0401', 'Khăn choàng', 100, 92, 'N04', 'img/products/product-4.jpg', 'Chiếc khăn gió ấm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `Password`) VALUES
('huy', 'Huỳnh Nhựt Huy', 'CG_TG', '0382143402', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Password`) VALUES
('Admin', 'Huynh Nhut Huy', 'Admin', 'DHP_CG_TG', '0382143402', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenNhom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('N01', 'Đồ Nam'),
('N02', 'Đồ Nữ'),
('N03', 'Đồ trẻ em'),
('N04', 'Phụ kiện');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `nhomhkfk` (`MaNhom`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `nhomhkfk` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
