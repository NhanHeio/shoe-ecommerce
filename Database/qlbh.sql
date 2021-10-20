-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2021 lúc 02:34 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` int(4) NOT NULL,
  `Size` varchar(3) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `Size`, `TenHH`, `Gia`) VALUES
('DH1', 'HH008', 1, '39', 'Nike Para-Noise 1.0', 13000000),
('DH2', 'HH009', 1, '40', 'Nike Para-Noise 2.0', 15000000),
('DH3', 'HH001', 2, '40', 'Nike Air Fore 1', 1200000),
('DH4', 'HH001', 1, '40', 'Nike Air Fore 1', 1200000),
('DH4', 'HH003', 1, '39', 'Nike Jordan 2', 5200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethanghoa`
--

CREATE TABLE `chitiethanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `Size` varchar(2) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethanghoa`
--

INSERT INTO `chitiethanghoa` (`MSHH`, `Size`, `SoLuong`) VALUES
('HH001', '39', 10),
('HH001', '40', 10),
('HH001', '41', 10),
('HH002', '39', 10),
('HH002', '40', 10),
('HH002', '41', 10),
('HH003', '39', 9),
('HH003', '40', 10),
('HH003', '41', 10),
('HH004', '39', 10),
('HH004', '40', 10),
('HH004', '41', 10),
('HH005', '39', 10),
('HH005', '40', 10),
('HH005', '41', 10),
('HH006', '39', 10),
('HH006', '40', 10),
('HH006', '41', 10),
('HH007', '39', 10),
('HH007', '40', 10),
('HH007', '41', 10),
('HH008', '39', 10),
('HH008', '40', 10),
('HH008', '41', 10),
('HH009', '39', 10),
('HH009', '40', 10),
('HH009', '41', 10),
('HH010', '39', 10),
('HH010', '40', 10),
('HH010', '41', 10),
('HH011', '39', 10),
('HH011', '40', 10),
('HH011', '41', 10),
('HH012', '39', 10),
('HH012', '40', 10),
('HH012', '41', 10),
('HH013', '39', 10),
('HH013', '40', 10),
('HH013', '41', 10),
('HH014', '39', 10),
('HH014', '40', 10),
('HH014', '41', 10),
('HH015', '39', 10),
('HH015', '40', 10),
('HH015', '41', 10),
('HH016', '39', 10),
('HH016', '40', 10),
('HH016', '41', 10),
('HH017', '39', 10),
('HH017', '40', 10),
('HH017', '41', 10),
('HH018', '39', 10),
('HH018', '40', 10),
('HH018', '41', 10),
('HH019', '39', 10),
('HH019', '40', 10),
('HH019', '41', 10),
('HH020', '39', 10),
('HH020', '40', 10),
('HH020', '41', 10);

--
-- Bẫy `chitiethanghoa`
--
DELIMITER $$
CREATE TRIGGER `chitiethanghoa_AFTER_UPDATE` AFTER UPDATE ON `chitiethanghoa` FOR EACH ROW BEGIN
	set @sum = (select sum(SoLuong) from chitiethanghoa where MSHH = NEW.MSHH);
    update hanghoa
	 set SoLuongHang = @sum where MSHH = NEW.MSHH;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSKH` varchar(5) NOT NULL,
  `MSNV` varchar(5) NOT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `TrangThai`) VALUES
('DH1', 'KH001', 'NV001', '2020-12-20 00:00:00', 'confirmed'),
('DH2', 'KH002', 'NV001', '2020-12-20 00:00:00', 'confirmed'),
('DH3', 'KH001', 'NV001', '2021-01-01 00:00:00', 'unconfirmed'),
('DH4', 'KH002', 'NV001', '2021-01-01 00:00:00', 'unconfirmed');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MSKH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) DEFAULT NULL,
  `Size` varchar(3) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MSKH`, `MSHH`, `TenHH`, `Size`, `SoLuong`) VALUES
('KH003', 'HH001', 'Nike Air Fore 1', '39', 2);

--
-- Bẫy `giohang`
--
DELIMITER $$
CREATE TRIGGER `giohang_AFTER_INSERT` AFTER INSERT ON `giohang` FOR EACH ROW BEGIN
	set @sl = NEW.SoLuong;
    set @mshh =NEW.MSHH;
    set @size =New.Size;
	update chitiethanghoa
		set SoLuong = SoLuong - @sl
		where (MSHH = @mshh and Size = @size);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `giohang_AFTER_UPDATE` AFTER UPDATE ON `giohang` FOR EACH ROW BEGIN
	set @sl = NEW.SoLuong;
    set @mshh =NEW.MSHH;
    set @size =New.Size;
	update chitiethanghoa
		set SoLuong = SoLuong - @sl
		where (MSHH = @mshh and Size = @size);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `giohang_BEFORE_DELETE` BEFORE DELETE ON `giohang` FOR EACH ROW BEGIN
	set @sl = OLD.SoLuong;
    set @mshh =OLD.MSHH;
    set @size =OLD.Size;
    update chitiethanghoa
		set SoLuong = SoLuong + @sl
		where (MSHH = @mshh and Size = @size);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `giohang_BEFORE_UPDATE_1` BEFORE UPDATE ON `giohang` FOR EACH ROW BEGIN
	set @mshh =NEW.MSHH;
    set @size =New.Size;
    set @sl = (select SoLuong from giohang where(MSHH = @mshh and Size = @size));
	update chitiethanghoa
		set SoLuong = SoLuong + @sl
		where (MSHH = @mshh and Size = @size);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) NOT NULL,
  `Hinh` varchar(50) NOT NULL,
  `MoTaHH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('HH001', 'Nike Air Fore 1', 1200000, 30, '1', 'HH001.jpg', 'Màu trắng'),
('HH002', 'Nike Jordan 1', 5500000, 20, '2', 'HH002.jpg', 'Màu trắng x Đỏ'),
('HH003', 'Nike Jordan 2', 5200000, 29, '1', 'HH003.jpg', 'Màu Đỏ x Trắng'),
('HH004', 'Nike Air Max 90', 2200000, 30, '1', 'HH004.jpg', 'Màu trắng'),
('HH005', 'Nike Air Max 97', 2500000, 30, '2', 'HH005.jpg', 'Màu đen'),
('HH006', 'Nike Air Max 270', 3200000, 30, '1', 'HH006.jpg', 'Màu đen'),
('HH007', 'Nike Air Zoom', 1800000, 20, '1', 'HH007.jpg', 'Màu đen'),
('HH008', 'Nike Para-Noise 1.0', 13300000, 10, '1', 'HH008.jpg', 'Màu đen'),
('HH009', 'Nike Para-Noise 2.0', 15000000, 10, '1', 'HH009.jpg', 'Màu trắng'),
('HH010', 'Nike SB', 1500000, 30, '1', 'HH010.jpg', 'Màu đen'),
('HH011', 'Nike Copy 1', 1000000, 30, '1', 'HH011.jpg', 'Màu trắng'),
('HH012', 'Nike Copy 2', 2000000, 30, '1', 'HH012.jpg', 'Màu đen'),
('HH013', 'Nike Copy 3', 3000000, 30, '2', 'HH013.jpg', 'Màu trắng'),
('HH014', 'Nike Copy 4', 4000000, 30, '2', 'HH014.jpg', 'Màu đen'),
('HH015', 'Nike Copy 5', 5000000, 30, '2', 'HH015.jpg', 'Màu trắng'),
('HH016', 'Nike Copy 5', 5000000, 30, '2', 'HH016.jpg', 'Màu trắng'),
('HH017', 'Nike Copy 6', 6000000, 30, '2', 'HH017.jpg', 'Màu trắng'),
('HH018', 'Nike Kid 1', 1250000, 30, '3', 'HH018.jpg', 'Màu đen'),
('HH019', 'Nike Kid 2', 2000000, 30, '3', 'HH019.jpg', 'Màu đen'),
('HH020', 'Nike Kid 3', 2000000, 30, '3', 'HH020.jpg', 'Màu đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Matkhau` varchar(16) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `Email`, `Matkhau`, `Image`) VALUES
('KH001', 'Ho Trung Nhan', 'Nguyen Van Linh, Can Tho', '0774000828', 'nhan@gmail.com', '123', 'KH001.jpg'),
('KH002', 'Vo Van Thai', 'Tran Nam Phu, Can Tho', '0792052354', 'thai@gmail.com', '123', 'KH002.jpg'),
('KH003', 'Nguyen Huu Thien Phu', 'Chau Thanh A, Hau Giang', '1234567891', 'phu@gmail.com', '123', 'KH003.jpg'),
('KH004', 'Tran Duc Huy', '123ct', '1111111111', 'huy@gmail.com', '12345678', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Matkhau` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Email`, `Matkhau`) VALUES
('NV001', 'Ho Trung Nhan', 'Giam doc', '123 ct', '0774000828', 'hotrungnhan2000@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('1', 'Men'),
('2', 'Women'),
('3', 'Kids');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `chitiethanghoa`
--
ALTER TABLE `chitiethanghoa`
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaNhom` (`MaNhom`);

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
  ADD PRIMARY KEY (`MaNhom`,`TenNhom`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `chitiethanghoa`
--
ALTER TABLE `chitiethanghoa`
  ADD CONSTRAINT `chitiethanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
