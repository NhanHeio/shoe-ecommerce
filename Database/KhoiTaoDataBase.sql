GO
CREATE TABLE NhanVien
(
	MSNV varchar(5) primary key NOT NULL,
	HoTenNV varchar(50) NOT NULL,
	ChucVu varchar(50) NOT NULL,
	DiaChi varchar(50),
	SoDienThoai varchar(10) NOT NULL
)
GO
CREATE TABLE KhachHang
(
	MSKH varchar(5) primary key NOT NULL,
	HoTenKH varchar(50) NOT NULL,
	DiaChi varchar(50)  NOT NULL,
	SoDienThoai varchar(10) NOT NULL
)
GO
CREATE TABLE DatHang
(
	SoDonDH varchar(5) primary key NOT NULL,
	MSKH varchar(5)  NOT NULL,
	MSNV varchar(5) NOT NULL,
	NgayDH datetime NOT NULL,
	TrangThai varchar(10) NOT NULL,
	foreign key (MSKH) references KhachHang,
	foreign key (MSNV) references NhanVien
)
GO
CREATE TABLE NhomHangHoa
(
	MaNhom varchar(5) primary key NOT NULL,
	TenNhom varchar(50) NOT NULL
)
GO
CREATE TABLE HangHoa
(
	MSHH varchar(5) primary key NOT NULL,
	TenHH varchar(50) NOT NULL,
	Gia int NOT NULL,
	SoLuongHang tinyint NOT NULL,
	MaNhom varchar(5) NOT NULL,
	Hinh varchar(50) NOT NULL,
	MoTaHH varchar(200) NOT NULL,
	foreign key (MaNhom) references NhomHangHoa
)
GO
CREATE TABLE ChiTietDatHang
(
	SoDonDH varchar(5)	NOT NULL,
	MSHH varchar(5) NOT NULL,
	SoLuong tinyint NOT NULL,
	GiaDatHang real NOT NULL,
	foreign key (SoDonDH) references DatHang,
	foreign key (MSHH) references HangHoa
)
ALTER TABLE ChiTietDatHang
ADD CONSTRAINT PK_ChiTietDatHang PRIMARY KEY (SoDonDH,MSHH)