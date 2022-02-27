-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2021 lúc 09:24 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `batdongsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tenadmin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `email`, `password`, `tenadmin`) VALUES
(1, 'admin@gmail.com', 'ceea23519f6f86ad67e9f798bf8002cb', 'Đầy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangso`
--

CREATE TABLE `bangso` (
  `idso` int(11) NOT NULL,
  `so` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bangso`
--

INSERT INTO `bangso` (`idso`, `so`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `madonvi` int(11) NOT NULL,
  `tendonvi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`madonvi`, `tendonvi`) VALUES
(1, 'Triệu Đồng'),
(2, 'Tỷ Đồng'),
(3, 'Trăm USD'),
(4, 'Triệu USD'),
(5, 'Tỷ USD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `magiaodich` int(11) NOT NULL,
  `loaigiaodich` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`magiaodich`, `loaigiaodich`) VALUES
(1, 'Nhà bán'),
(2, 'Nhà cho thuê'),
(3, 'Đất bán'),
(4, 'Đất cho thuê'),
(6, 'Tin cần mua - thuê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huongnha`
--

CREATE TABLE `huongnha` (
  `mahuong` int(11) NOT NULL,
  `tenhuong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `huongnha`
--

INSERT INTO `huongnha` (`mahuong`, `tenhuong`) VALUES
(1, 'TÂY'),
(2, 'NAM'),
(3, 'BẮC'),
(4, 'ĐÔNG'),
(5, 'TÂY NAM'),
(6, 'TÂY BẮC'),
(7, 'ĐÔNG NAM'),
(8, 'ĐÔNG BẮC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `idphanhoi` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`idphanhoi`, `hoten`, `email`, `noidung`) VALUES
(2, 'Phạm Ngọc Đầy', 'daypham037@gmail.com', 'Web đẹp nè');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `maqc` int(11) NOT NULL,
  `mota` varchar(200) NOT NULL,
  `hinh` int(50) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tentp`
--

CREATE TABLE `tentp` (
  `mattp` int(11) NOT NULL,
  `tenttp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tentp`
--

INSERT INTO `tentp` (`mattp`, `tenttp`) VALUES
(1, 'TP Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Cần Thơ'),
(4, 'Hải Phòng'),
(5, 'Đà Nẵng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `iduser` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tenthanhvien` varchar(50) NOT NULL,
  `diachi` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`iduser`, `password`, `tenthanhvien`, `diachi`, `email`, `dienthoai`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'Ngọc Đầy', 'Cần Thơ', 'daypham@gmail.com', '012312314'),
(5, 'ceea23519f6f86ad67e9f798bf8002cb', 'Le chi hao', 'Cần Thơ', 'chihao@gmail.com', '1231243253'),
(10, 'e10adc3949ba59abbe56e057f20f883e', 'Le chi hao5', 'Cần Thơ', 'daypham037@gmail.com7', '1231243253');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timtheodt`
--

CREATE TABLE `timtheodt` (
  `idtimdt` int(11) NOT NULL,
  `dientich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `timtheodt`
--

INSERT INTO `timtheodt` (`idtimdt`, `dientich`) VALUES
(1, 30),
(2, 50),
(3, 100),
(4, 200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timtheogia`
--

CREATE TABLE `timtheogia` (
  `idtimgia` int(11) NOT NULL,
  `mucgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `timtheogia`
--

INSERT INTO `timtheogia` (`idtimgia`, `mucgia`) VALUES
(3, 1),
(4, 2),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinbds`
--

CREATE TABLE `tinbds` (
  `mabds` int(11) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `mattp` int(11) NOT NULL,
  `quanhuyen` varchar(50) NOT NULL,
  `phuong` varchar(50) NOT NULL,
  `duong` varchar(30) NOT NULL,
  `ngaydangtin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thoihan` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `magiaodich` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dientichnen` varchar(50) NOT NULL,
  `mahuong` int(11) NOT NULL,
  `sotang` int(11) NOT NULL,
  `pngu` int(11) NOT NULL,
  `ptam` int(11) NOT NULL,
  `loaidat` varchar(50) NOT NULL,
  `madonvi` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `dientich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tinbds`
--

INSERT INTO `tinbds` (`mabds`, `tieude`, `mattp`, `quanhuyen`, `phuong`, `duong`, `ngaydangtin`, `thoihan`, `trangthai`, `mota`, `hinhanh`, `magiaodich`, `iduser`, `dientichnen`, `mahuong`, `sotang`, `pngu`, `ptam`, `loaidat`, `madonvi`, `gia`, `dientich`) VALUES
(92, 'Chính chủ nợ ngân hàng Bán gấp', 1, 'Hồ Thị Khắp', 'Ninh Kiều', 'Nguyễn Văn Cừ', '2021-06-13 16:23:26', 0, 0, 'Chính chủ nợ ngân hàng Bán gấp Chính chủ nợ ngân hàng Bán gấp Chính chủ nợ ngân hàng Bán gấp hell', 'tin1.jpg', 1, 1, '15', 1, 2, 3, 2, '', 2, 3, 30),
(95, 'Vinhome bán căn biệt thư mini ngõ 325 Kim Ngưu', 2, 'Trương Định', 'Tân Thới Nhất', 'Cách Mạng Tháng 8', '2021-06-13 15:31:28', 0, 0, '+ HOT, gia đình mua nhà Vinhome, cần bán gấp căn nhà trong ngõ 325 Kim Ngưu, phường Thanh Lương, quận Hai Bà Trưng.\r\n\r\n+ Ngõ 325 Kim Ngưu to như phố, ô tô chạy vòng quanh, tránh nhau thoải mái. Từ nhà ra ô tô chỉ vài bước chân, trước nhà xe ba gác chạy.\r\n\r\n+ Ngõ 325 thông các phố Lạc Trung, Minh Khai, Trần Khát Chân. Giao thông lên khu vực lõi của HN (theo quy hoạch mới nhất của thành phố) như phố Huế, Bà Triệu, Lê Duẩn, Đại Cồ Việt, Trần Khát Chân, Nguyễn Du, CV Thống Nhất... Rất gần. Từ nhà chỉ vài phút ra BV Thanh Nhàn, BV 108, Times City, Vincom Bà Triệu, gần các trường đại học danh tiếng của HN như Bách Khoa, KTQD, XD...\r\n\r\n+ Nhà gia đình tự tay xây dựng khung cột bê tông vô cùng chắc chắn, thiết kế model hiện đại, như một biệt thự nhỏ xinh với sân riêng rộng, ánh nắng ngập tràn, cây xanh xung quanh che phủ, nhiều khe thoáng, nội thất ngoại nhập, đồ gỗ xịn sò, chủ tự tin là đây là một trong những nhà đẹp nhất ngõ.\r\n\r\n- T1: Sân + phòng khách + bếp + phòng ăn, vệ sinh. Phòng khách v', 'tin2.jpg', 1, 1, '14', 4, 2, 3, 2, '', 2, 5, 20),
(96, 'Nhà cực đẹp ngay khu công nghiệp chợ', 4, 'Cam Lâm', 'Hoàng Mai', 'Cam Đức', '2021-06-13 15:31:30', 0, 0, 'Vị trí cực đẹp trung tâm chợ dân cư đông đúc, gần KCN Xuyên Á, KCN Hoàng Gia\r\n\r\nNằm trong vùng quy hoạch sáp nhập vào thành phố, trung tâm phát triển kinh tế trọng điểm khu vực Hóc Môn mở rộng\r\n\r\nTiềm năng sinh lời cực tốt, tiện ở lâu dài\r\n\r\nDiện tích 3.5x9 4x8 4x12 Nhà đúc thật 1 trệt 1 lầu\r\n\r\nGiá cực sốc chỉ từ 560 triệu 1 căn\r\n\r\nThổ cư 100% sổ sách rõ ràng\r\n\r\nDọn vào ở ngay tặng bộ nội thất sang trọng, hỗ trợ tận tình', 'tin3.jpg', 1, 1, '50', 6, 3, 4, 4, '', 2, 4, 60),
(97, 'Covid bán nhà, ngõ 254 Minh Khai, 20m ra oto', 1, 'Quận 12', 'Hai Bà Trưng', 'Hai Bà Trưng', '2021-06-13 15:31:33', 0, 0, '+ Chính chủ cần tiền giải quyết công việc bán gấp căn nhà trong ngõ 254 Minh Khai, Mai Động, Hoàng Mai.\r\n\r\n+ Ngõ 254 Minh Khai là ngõ ô tô, thông ra đường Hoàng Mai, nối dài ra KĐT Đền Lừ, thông ra ngõ Gốc Đề, chỉ vài bước chân là ra ô tô đỗ, đi bộ ra mặt phố Minh Khai. Phố Minh Khai và dự án đường vành đai 2,5 đã quy hoạch xong, vỉa hè lát đá, cây xanh phủ kín, tương lai sáng ngời.\r\n\r\n+ Nhà nằm vị trí trung tâm, thuận tiện đi Kim Ngưu, Phố Huế, Bà Triệu, Đại Cồ Việt, Lò Đúc, Trương Định, Đại La, chỉ 5 phút tới hồ Gươm. Gần các trường học C1,2,3 và nhiều trường ĐH lớn như Bách Khoa, Kinh Tế... Bệnh viện Thanh Nhàn, BV Bạch Mai... Khu dân cư an ninh, văn minh.\r\n\r\n+ Nhà xây vài năm, chủ tự xây tâm huyết, chắc chắn, khách mua có thể dọn vào ở luôn. Đặc biệt 2 mặt thoáng, ánh sáng ngập tràn không có căn thứ 2 như vậy trong khu vực.\r\n\r\n+ Thiết kế nhà xây trên diện tích 45m2, 3 phòng ngủ rộng rãi, phòng khách, bếp, sân phơi đầy nắng. Chủ tặng lại 2 điều hoà, 2 bình nóng lạnh.\r\n\r\n+ Sổ đỏ chín', 'tin4.jpg', 1, 1, '45', 1, 3, 4, 4, '', 2, 3, 60),
(98, 'Nhà bán Quang Trung 1/ HXH P10 GV', 1, 'Quận 3', 'Tân Thới Nhất', 'Nguyễn Văn Cừ', '2021-06-13 15:31:35', 0, 0, 'CẦN BÁN !\r\n\r\nNhà phố hẻm xe hơi, đường thông ra Quang Trung mới 100%. Khu đắc địa, gần Vincom Quang Trung..v..v\r\n\r\nHướng: Đông Nam 1 trệt 2 lầu:1 phòng khách, 1 bếp,1 phòng ăn, 4 phòng ngủ, 5 toilet, ban công mỗi tầng, giếng trời.\r\n\r\nDiện tích: 39,2 m2\r\n\r\nDiện tích sử dụng: khoảng 120m2\r\n\r\nPháp lý: đã hoàn công, sổ hồng 2021, sang tên công chứng nhanh trong ngày\r\n\r\nGiá: 4.700.000.000 đ\r\n\r\nLiên hệ 24/7: 0935185188 - Zalo ( Ms Phi Phượng)', 'tin5.jpg', 1, 1, '20', 3, 3, 4, 4, '', 2, 4, 60),
(99, 'Bán nhà hẻm, Diện tích 4*9,6m, 1 lầu, 1 gác', 1, 'Quận 3', 'Hoàng Mai', 'Cam Đức', '2021-06-13 15:31:37', 0, 0, '+ Kết cấu nhà: tường gạch, sàn BTCT, 1 lầu, có 1 gác\r\n\r\n+ Vị trí: xung quang nhà nhiều trường học mẫu giáo, trường tiểu học, cấp 1, cấp 2, cấp 3, gần chợ Tân Hương, gần siêu thị oeon\r\n\r\n+ Pháp lí đầy đủ, sổ hồng riêng. không bị lộ giới.\r\n\r\n+ Hẻm nhỏ, nhưng ngắn xe hơi vào gần nhà, nhà còn mới\r\n\r\n+ Có thương lượng giá\r\n\r\n+ Chi tiết xin liên hệ: Hiền - 0913202265, gặp chính chủ thương lượng', 'tin6.jpg', 1, 1, '30', 3, 2, 2, 2, '', 2, 2, 40),
(100, 'Cho thuê nhà mặt phố số 83 phố Hạ Đình', 2, 'Hồ Thị Khắp', 'An Hòa', 'Cách Mạng Tháng 8', '2021-06-13 15:31:38', 0, 0, 'Cho thuê nhà mặt phố số 83 phố Hạ Đình, quận Thành Xuân , Hà nội. MT 3m * 8 m, 4 tầng.\r\n\r\nGần 4 công ty: Bóng đèn phích nước Rạng Đông. Gần công ty May 40. gần Công ty giầy vải Thượng Đình\r\n\r\nGiá cho thuê: thoả thuận chính chủ', 'nhathue1.jpg', 2, 1, '15', 4, 1, 1, 1, '', 1, 20, 14),
(104, 'Cho thuê nhà nguyên căn quận Tân Bình TP.HCM', 2, 'An Hòa', 'Cam Đức', 'Cách Mạng Tháng 8', '2021-06-13 15:31:40', 0, 0, 'Cho thuê nhà nguyên căn quận Tân Bình TP.HCM Cho thuê nhà nguyên căn quận Tân Bình TP.HCM Cho thuê nhà nguyên căn quận Tân Bình TP.HCM', 'chothue3.jpg', 2, 1, '20', 5, 2, 2, 2, '', 1, 17, 20),
(105, 'CHO THUÊ NHÀ RIÊNG_TRẦN QUANG DIỆU_QUẬN 3', 3, 'Hồ Thị Khắp', 'Hoàng Mai', 'Nguyễn Văn Cừ', '2021-06-13 15:31:42', 0, 0, 'CHO THUÊ NHÀ RIÊNG_TRẦN QUANG DIỆU_QUẬN 3 CHO THUÊ NHÀ RIÊNG_TRẦN QUANG DIỆU_QUẬN 3 CHO THUÊ NHÀ RIÊNG_TRẦN QUANG DIỆU_QUẬN 3', 'chothue2.jpg', 2, 1, '15', 5, 1, 1, 1, '', 1, 5, 20),
(107, 'Bán đất nền khu dân cư Lê Duẩn', 1, 'Cam Lâm', 'An Hòa', 'Nguyễn Văn Cừ', '2021-06-13 15:31:43', 0, 0, '== CÒN VÀI LÔ ĐẤT KDC LÊ DUẨN - SÁT BÊN DỰ ÁN GOLDEN HILL - VỊ TRÍ ĐẸP HƠN - GẦN QUỐC LỘ - GẦN ĐƯỜNG VEN ĐẦM HƠN ==\r\n\r\n+++ Dự án Golden Hill đang có Giá từ 8-11tr/m2 ..\r\n\r\n===GÍA CỤM LÊ DUẨN Chỉ Từ: 6.5 - 8tr/m2.\r\n\r\n(Giá đầu tư thanh khoản nhanh).\r\n\r\n______________________\r\n\r\n+ Nằm trên vị trí đắc địa bậc nhất Cam Lâm nằm ven Đầm Thuỷ Triều. Xung quanh gần với các cụm trường học 1.2.3, UBND, chợ, bệnh viện vv.\r\n\r\n+ Tiện ích khu vực:\r\n\r\n- Cách QL1A chỉ 100m.\r\n\r\n- Cách đường Đinh Tiên Hoàng 500m.\r\n\r\n- 5 di chuyển đến biển bãi dài và cụm các khu resort 5.\r\n\r\n- 10 phút đến Cảng Hàng Không QT Cam Ranh.\r\n\r\n- 30 để đến TTTP Nha Trang.\r\n\r\nVị trí cụm KDC Lê Duẩn từ QL1A và đường ven đầm vào tới khu đất gần hơn Golden Hill.\r\n\r\n(Chỉ còn vài lô vị trí đẹp giá tốt. Quý khách hàng nhanh tay để sở hữu BĐS với tiềm năng sinh lời cao).', 'dat1.jpg', 3, 1, '', 1, 0, 0, 0, '150', 2, 3, 200),
(108, 'ất nền KDC view Đầm Trục đường Lê Duẩn', 1, 'An Hòa', 'Ninh Kiều', 'Nguyễn Văn Cừ', '2021-06-12 06:43:51', 0, 0, 'Chỉ còn vài Lô vị trí khá đẹp - Nhanh tay khi Giá còn thấp\r\n\r\nVị Trí: View Đầm Thủy Triều.\r\n\r\nCách trục đường Lê Duẩn chưa tới 100m.\r\n\r\nCách QL1A 800m - Cách đường ven đầm 500m.\r\n\r\nHội tụ đầy đủ các yếu tố tiềm năng: \"Nhất cận thị - Nhị cần giang - Tam cận lộ.\"\r\n\r\nPháp lý: Hoàn thiện.\r\n\r\nSổ đỏ.\r\n\r\nXây dựng tự do.\r\n\r\nThông tin Lô Đất:\r\n\r\nDiện tích: 210m2 (Ngang 7m - Thổ cư 100m2).\r\n\r\nMặt đường rộng 6m.\r\n\r\n==Cách KDC Dự án SkyLake 500m - Giá đang là 16-20tr/m2==\r\n\r\nGía Tốt An Cư hoặc Đầu Tư: 7tr/m2 (Có thương lượng).', 'dat2.jpg', 3, 1, '', 0, 0, 0, 0, 'Thổ cư', 2, 20, 60),
(109, 'Lô đất Mặt tiền đường Lê Lợi QH 54m', 1, 'Hồ Thị Khắp', 'An Hòa', 'Cách Mạng Tháng 8', '2021-06-12 06:46:00', 0, 0, 'Lô đất Mặt tiền đường Lê Lợi QH 54m Lô đất Mặt tiền đường Lê Lợi QH 54m Lô đất Mặt tiền đường Lê Lợi QH 54m Lô đất Mặt tiền đường Lê Lợi QH 54m', 'dat3.jpg', 3, 1, '', 0, 0, 0, 0, 'Thổ cư', 2, 3, 60),
(110, 'Cần tìm mặt bằng góc ngã 3, 4, 5, 6, vị trí đắc đị', 1, 'An Hòa', 'Ninh Kiều', 'NVC', '2021-06-12 06:48:04', 0, 0, 'Cần tìm mặt bằng quận 4 và các quận tại TP HCM mở hệ thống siêu thị cao cấp 24.7.\r\n- Tìm mặt bằng ở Hồ Chí Minh.\r\n- Đơn vị chúng tôi hiện đang tìm mặt bằng cho đối tác Hàn Quốc mở rộng 1000 siêu thị tại Việt Nam.\r\n- Cần tìm mặt bằng góc, ngã 3, 4, 5, 6.\r\n- Ngang khu đông đúc, gần đèn xanh đèn đỏ.\r\n- Đối diện, cạnh các trường cấp 2, 3, và đại học.\r\n- Shophouse, vị trí đắc địa trong các dự án, khu căn hộ đông dân cư.\r\n\r\nLiên hệ: 0934.367.517 (Zalo).\r\nGửi ghim map, địa chỉ chính xác, diện tích, giá để Duyệt trả lời Nhanh.', '', 6, 1, '', 0, 0, 0, 0, '', 2, 3, 300),
(111, 'Mua đất Nhơn Trạch khu vực HUD, XDHN giá tốt', 1, 'Hồ Thị Khắp', 'Ninh Kiều', 'NVC', '2021-06-12 06:48:45', 0, 0, 'Anh chị có lô đất HUD, XDHN Nhơn Trạch giá tốt thì liên hệ em.\r\nEm ưu tiên nhà vườn.\r\nDT 250 - 300m2.', 'tin1.jpg', 6, 1, '', 0, 0, 0, 0, '', 2, 2, 20),
(112, '(Sixdo) cần thuê nhà mặt tiền nằm trên các tuyến đ', 1, 'An Hòa', 'Nguyễn Văn Cừ 2', 'Nguyễn Văn Cừ 2', '2021-06-13 14:24:31', 0, 0, '  (Sixdo) cần thuê nhà mặt tiền nằm trên các tuyến đường chuyên thời trang HCM (Sixdo) cần thuê nhà mặt tiền nằm trên các tuyến đường chuyên thời trang HCM', 'mua1.jpg', 6, 1, '', 0, 0, 0, 0, '', 1, 500, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `matintuc` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `noidung` varchar(10000) NOT NULL,
  `tomtat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`matintuc`, `tieude`, `hinh`, `noidung`, `tomtat`) VALUES
(7, 'Đánh giá dự án Grandeur Palace Giảng Võ: Căn hộ hạng sang quận Ba Đình có gì khác biệt?', 'tintuc1.jpg', 'Về vị trí, dự án Grandeur Palace nằm tại 138B Giảng Võ, quận Ba Đình, Hà Nội, ngay ngã tư Cát Linh - Giảng Võ, cách không xa ga Cát Linh, điểm đầu của tuyến đường sắt trên cao Cát Linh - Hà Đông. Mật độ phương tiện giao thông tại khu vực này khá đông nên những tuyến đường quanh dự án như Kim Mã, Cát Linh, Giang Văn Minh, Nguyễn Thái Học… thường xuyên xảy ra tắc đường vào giờ cao điểm.\r\n\r\nCư dân tại dự án Grandeur Palace Giảng Võ sẽ rất nhanh chóng để có thể di chuyển đến khu trung tâm, các quận Hoàn Kiếm, Hai Bà Trưng… Tuy nhiên nếu di chuyển tới các khu vực Hà Đông, Mỹ Đình, Nam Từ Liêm… thì sẽ mất thời gian hơn, khoảng trên dưới 40 phút nếu đi ô tô. Dự án cách Đại học Văn hóa, Đại học Mỹ thuật Công nghiệp 1,4km; cách công viên Indira-Gandhi 1,6km, cách bệnh viện Xanh Pôn 2km, cách công viên Thủ Lệ 2km; cách Hồ Hoàn Kiếm 5km…', ''),
(9, 'Môi giới bất động sản: người lo lắng, kẻ thong dong mùa dịch', 'tintuc2.jpg', ' Giao dịch bất động sản (BĐS) gần như đình trệ tạm thời, tác động từ giãn cách xã hội ảnh hưởng lớn đến hoạt động của môi giới trong ngành. Bên cạnh tâm lý lạc quan, một số môi giới không giấu nổi lo lắng trước tình hình này.\r\nGần như cản năm 2020 không làm ăn được gì, một phần do dịch bệnh, một phần vì công ty không có dự án lớn nào để phân phối, anh Phước Hòa nhân viên kinh doanh tại công ty BĐS có trụ sở tại quận Bình Thạnh, TP.HCM không giấu được lo lắng khi tình hình dịch bệnh ngày một phức tạp hơn. Hỏi thăm về công việc những tuần gần đây, anh Hòa cho biết, thời điểm đầu năm, công ty nhận được HĐ phân phối một dự án tại Đồng Nai. Theo kế hoạch thì sẽ mở bán vào tháng 6 nhưng buộc phải tạm ngưng vì dịch.', ''),
(10, 'Sở hữu view tựa sơn hướng thuỷ hiếm có - bản sắc độc đáo của Bảo Lộc Gems Riverside 2', 'tintuc1.jpg', '  Bảo Lộc Gems Riverside thừa hưởng giá trị thiên nhiên hiếm có nơi sông nước giao hòa, khí hậu mát mẻ. Đặc biệt, nhằm kích cầu trong giai đoạn dịch Covid 19 - Redstar Group chính thức tung chính sách khủng với nhiều ưu đãi cho phân khu Emerald. Pháp lý minh bạch và nhiều chính sách ưu đãi giúp Emerald trở thành tâm điểm của nhiều nhà đầu tư thông thái.\r\n“Tựa sơn hướng thủy” - “hàng hiếm” nhiều chủ đầu tư săn đón\r\nNghiên cứu đã chứng minh không gian sống trong lành với sông nước có tác động tích cực đến sức khỏe thể chất lẫn tinh thần của con người. Hưởng nhiều loại ion có lợi, điều hòa khí hậu, thanh lọc không khí đồng thời tạo điểm nhấn cảnh quan trong bức tranh tổng thể.\r\n\r\nMặt khác, theo quan niệm phong thủy, “tựa sơn hướng thủy” mang lại may mắn, tài lộc. Nước giữ vai trò quan trọng trong việc tạo nguồn năng lượng sống tích cực, màu xanh được cho là mang lại hạnh phúc, bình an, cảm giác tĩnh tâm. Với thế nước bao bọc xung quanh và những con nước nhỏ len lỏi tạo nên một nguồn năng lượng vượng tài, vượng khí.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tucam`
--

CREATE TABLE `tucam` (
  `idtucam` int(11) NOT NULL,
  `tucam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tucam`
--

INSERT INTO `tucam` (`idtucam`, `tucam`) VALUES
(1, 'hell'),
(2, 'fuck'),
(3, 'me'),
(4, 'what the'),
(5, 'bt');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `bangso`
--
ALTER TABLE `bangso`
  ADD PRIMARY KEY (`idso`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`madonvi`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`magiaodich`);

--
-- Chỉ mục cho bảng `huongnha`
--
ALTER TABLE `huongnha`
  ADD PRIMARY KEY (`mahuong`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`idphanhoi`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`maqc`);

--
-- Chỉ mục cho bảng `tentp`
--
ALTER TABLE `tentp`
  ADD PRIMARY KEY (`mattp`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`iduser`);

--
-- Chỉ mục cho bảng `timtheodt`
--
ALTER TABLE `timtheodt`
  ADD PRIMARY KEY (`idtimdt`);

--
-- Chỉ mục cho bảng `timtheogia`
--
ALTER TABLE `timtheogia`
  ADD PRIMARY KEY (`idtimgia`);

--
-- Chỉ mục cho bảng `tinbds`
--
ALTER TABLE `tinbds`
  ADD PRIMARY KEY (`mabds`),
  ADD KEY `tinbds_tenp` (`mattp`),
  ADD KEY `tinbds_thanhvien` (`iduser`),
  ADD KEY `tinbds_donvi` (`madonvi`),
  ADD KEY `tinbds_huongnha` (`magiaodich`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matintuc`);

--
-- Chỉ mục cho bảng `tucam`
--
ALTER TABLE `tucam`
  ADD PRIMARY KEY (`idtucam`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bangso`
--
ALTER TABLE `bangso`
  MODIFY `idso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `madonvi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `magiaodich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `huongnha`
--
ALTER TABLE `huongnha`
  MODIFY `mahuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `idphanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `maqc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tentp`
--
ALTER TABLE `tentp`
  MODIFY `mattp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `timtheodt`
--
ALTER TABLE `timtheodt`
  MODIFY `idtimdt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `timtheogia`
--
ALTER TABLE `timtheogia`
  MODIFY `idtimgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tinbds`
--
ALTER TABLE `tinbds`
  MODIFY `mabds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `matintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tucam`
--
ALTER TABLE `tucam`
  MODIFY `idtucam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tinbds`
--
ALTER TABLE `tinbds`
  ADD CONSTRAINT `tinbds_donvi` FOREIGN KEY (`madonvi`) REFERENCES `donvi` (`madonvi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tinbds_giaodich` FOREIGN KEY (`magiaodich`) REFERENCES `giaodich` (`magiaodich`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tinbds_huongnha` FOREIGN KEY (`magiaodich`) REFERENCES `huongnha` (`mahuong`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tinbds_ibfk_1` FOREIGN KEY (`mattp`) REFERENCES `tentp` (`mattp`),
  ADD CONSTRAINT `tinbds_tenp` FOREIGN KEY (`mattp`) REFERENCES `tentp` (`mattp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tinbds_thanhvien` FOREIGN KEY (`iduser`) REFERENCES `thanhvien` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
