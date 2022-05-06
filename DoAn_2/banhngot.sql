-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 11:39 AM
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
-- Cơ sở dữ liệu: `banhngot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user`, `pass`, `hoten`, `anh`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', '1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(100) NOT NULL,
  `anh_danhmuc` varchar(100) NOT NULL,
  `hienthi` varchar(100) NOT NULL,
  `chitiet_danhmuc` varchar(1000) NOT NULL,
  `sub` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `ten_danhmuc`, `anh_danhmuc`, `hienthi`, `chitiet_danhmuc`, `sub`) VALUES
(1, 'Bánh Kem', 'banhkem.png', '1', 'Bánh kem là sản phẩm mà khách hàng rất ưa thích. Thấy thế chúng tôi đã mang đến những sản phẩm chất lượng và đa dạng mẫu mã.', 'banhkem'),
(2, 'Burgers', 'berger.png', '1', 'Cửa hàng kinh doanh đa dạng các loại bánh mì, từ bánh mặn đến bánh ngọt và luôn quan tâm đến những ý kiến đóng góp từ khách hàng.', 'burgers'),
(3, 'Donut', 'donut.png', '1', 'Là sản phẩm mà của hàng mới kinh doanh nhưng đã nhanh chóng thu hút và trở thành một trong những mặt hàng thiết yếu của cửa hàng.', 'donut'),
(4, 'Sukem', '', '0', '', 'sukem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_datban`
--

CREATE TABLE `tbl_datban` (
  `id_datban` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `ngay` varchar(100) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `songuoi` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `id_khachhang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_datban`
--

INSERT INTO `tbl_datban` (`id_datban`, `hoten`, `email`, `sdt`, `ngay`, `thoigian`, `songuoi`, `trangthai`, `id_khachhang`) VALUES
(5, 'bin', 'admin@gmail.com', '0866744002', '10/26/2021', '23:01:00', 4, 1, 0),
(6, 'bin', 'admin@gmail.com', '0866744002', '10/19/2021', '10:02 PM', 3, 1, 0),
(7, 'binbin', 'admin@gmail.com', '0866744002', '10/17/2021', '10:08 AM', 9, 0, 0),
(8, 'binbin', 'admin@gmail.com', '0866744002', '10/17/2021', '6:10 PM', 8, 0, 0),
(9, 'binbin', 'admin@gmail.com', '0866744002', '10/17/2021', '4:15 PM', 5, 0, 0),
(10, 'bin', 'admin@gmail.com', '0866744002', '10/17/2021', '9:54 AM', 7, 0, 0),
(11, 'bin', 'admin@gmail.com', '0866744002', '10/17/2021', '9:54 AM', 7, 0, 0),
(12, 'bin', 'admin@gmail.com', '0866744002', '10/17/2021', '9:58 AM', 5, 0, 1),
(13, 'binbin', 'admin@gmail.com', '0866744002', '10/23/2021', '10:08 AM', 10, 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongban` int(11) NOT NULL,
  `gia` varchar(100) NOT NULL,
  `mahang` varchar(100) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL DEFAULT 0,
  `id_khachhang` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(1000) NOT NULL,
  `pttt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `id_sanpham`, `soluongban`, `gia`, `mahang`, `ngaydat`, `tinhtrang`, `id_khachhang`, `hoten`, `sdt`, `email`, `diachi`, `pttt`) VALUES
(24, 18, 2, '180000', '8029', '2021-10-22 15:11:50', 4, 1, 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', 1),
(25, 2, 1, '180000', '8029', '2021-10-22 15:11:50', 4, 1, 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', 1),
(26, 3, 1, '190000', '1085', '2021-10-23 04:49:36', 5, 1, 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', 1),
(27, 2, 1, '180000', '556', '2021-10-23 05:15:41', 0, 1, 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(100) NOT NULL,
  `gia_sanpham` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `id_sanpham`, `ten_sanpham`, `gia_sanpham`, `soluong`, `id_khachhang`) VALUES
(25, 3, 'Bánh Kem Cacao', '180', 3, 2),
(26, 4, 'Bánh Kem Socola', '180', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `ghichu` varchar(1000) NOT NULL,
  `id_khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `hoten`, `email`, `sdt`, `ghichu`, `id_khachhang`) VALUES
(1, 'bin', 'admin@gmail.com', '0866744002', '123', 0),
(5, 'binbin', 'admin@gmail.com', '0866744002', '1', 0),
(6, 'binbin', '1111@123', '0866744002', 'qqqq', 0),
(7, 'bin', 'admin@gmail.com', '0866744002', 'đá', 0),
(8, 'bin', 'admin@gmail.com', '0866744002', 'đá', 0),
(9, 'bin', 'admin@gmail.com', '0866744002', 'sa', 1),
(10, 'binbin', 'dangngocbin2000@gmail.com', '0866744002', 'ưq', 0),
(11, 'binbin', 'dangngocbin2000@gmail.com', '0866744002', 'ưq', 0),
(12, 'binbin', 'dangngocbin2000@gmail.com', '0866744002', 'ưq', 0),
(13, 'bin', 'admin@gmail.com', '0866744002', 'ss', 0),
(14, 'bin', 'dangngocbin2000@gmail.com', '0866744002', 'đ', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL DEFAULT 'no_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `user`, `pass`, `hoten`, `sdt`, `email`, `diachi`, `anh`) VALUES
(1, 'bebin', '202cb962ac59075b964b07152d234b70', 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', '1.jpg'),
(2, 'embinbebong', '202cb962ac59075b964b07152d234b70', 'Đặng Ngọc Bin', '0123456789', 'dangngocbin2000@gmail.com', 'Đồng Tháp', 'no_imgage.png'),
(3, 'bin', '202cb962ac59075b964b07152d234b70', 'Bin Bin', '0866744002', 'admin@gmail.com', 'Đồng Tháp', 'no_image.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `chitiet_sanpham` varchar(10000) NOT NULL,
  `gia_sanpham` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `hienthi` int(11) NOT NULL DEFAULT 0,
  `id_danhmuc` int(11) NOT NULL,
  `hot` int(11) NOT NULL DEFAULT 2,
  `nhanhieu` varchar(100) NOT NULL DEFAULT 'Bin Cake',
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `ten_sanpham`, `soluong`, `chitiet_sanpham`, `gia_sanpham`, `hinhanh`, `hienthi`, `id_danhmuc`, `hot`, `nhanhieu`, `soluongban`) VALUES
(1, 'Bánh Kem Nho', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm nho và bông đường bi bạc.', 180000, 'banhkem_1.jpg', 1, 1, 0, 'Bin Cake', 0),
(2, 'Bánh Kem Dâu', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm dâu và bông đường bi bạc.', 180000, 'banhkem_2.jpg', 1, 1, 0, 'Bin Cake', 1),
(3, 'Bánh Kem Cacao', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí phủ thêm 1 lớp cacao và bông đường bi bạc.', 190000, 'banhkem_3.jpg', 1, 1, 0, 'Bin Cake', 1),
(4, 'Bánh Kem Socola', 10, 'Bánh Chocolate Cake  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm hoa kem tươi và bông đường bi bạc.', 180000, 'banhkem_4.jpg', 1, 1, 0, 'Bin Cake', 0),
(5, 'Donut chấm bi', 10, 'Bánh donut chấm bi là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với rất nhiều chấm bi trên bánh.', 25000, 'donut_6.jpg', 1, 3, 0, 'Bin Cake', 0),
(6, 'Bánh Kem Dâu (nhỏ)', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm dâu và bông đường bi bạc.', 100000, 'banhkem_6.jpg', 1, 1, 0, 'Bin Cake', 0),
(7, 'Bánh Kem Cherry', 10, 'Bánh kem Cherry là ý tưởng tuyệt vời cho tình nhân với cốt bánh socola 3 lớp ngọt ngào, nhân vị cocktail trái cây tươi thêm những lát socola bào cho một buổi tối lãng mạn.', 200000, 'banhkem_8.jpg', 1, 1, 1, 'Bin Cake', 0),
(8, 'Bánh Kem Blue', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm 1 phần kem màu xanh và bông đường bi bạc.', 180000, 'banhkem_9.jpg', 1, 1, 0, 'Bin Cake', 0),
(9, 'Bánh Kem Băng Giá', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm hoa quả và 1 lớp khí băng áo ngoài bánh.', 200000, 'banhkem_11.jpg', 1, 1, 1, 'Bin Cake', 0),
(10, 'Bánh Kem Trà Xanh', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm hoa quả, trà xanh và bông đường bi bạc.', 180000, 'banhkem_13.jpg', 1, 1, 0, 'Bin Cake', 0),
(12, 'Bánh Kem Full Dâu', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm xung quanh bánh rất nhiều dâu tây và bông đường bi bạc.', 199000, 'banhkem_7.jpg', 1, 1, 0, 'Bin Cake', 0),
(13, 'Bánh Kem Tình Yêu', 10, 'Bánh kem nho  với cốt bánh socola 5 lớp với điểm đặc biệt là ở lớp nhân socola chất lượng cao, nhân mứt hoa quả hỗn hợp, bánh được phủ lớp kem socola, trang trí thêm hoa quả và bông đường bi bạc có hình trái tim to và bự.', 199000, 'banhkem_14.jpg', 1, 1, 0, 'Bin Cake', 0),
(14, 'Donut tình Yêu', 100, 'Bánh donut tình yêu là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với hình trái tim.', 30000, 'donut_5.jpg', 1, 3, 0, 'Bin Cake', 0),
(15, 'Donut Socola', 100, 'Bánh donut socola là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với 1 lớp socola bao phủ mặt bánh', 30000, 'donut_3.jpg', 1, 3, 0, 'Bin Cake', 0),
(16, 'Donut Pinky', 100, 'Bánh donut pinky là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với màu hồng .', 30000, 'donut_7.jpg', 1, 3, 0, 'Bin Cake', 0),
(17, 'Donut Kiểu Nhật', 100, 'Bánh donut kiểu nhật là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và loại bánh này rất nổi bật ở Nhật.', 30000, 'donut_8.jpg', 1, 3, 1, 'Bin Cake', 0),
(18, 'Donut Bí Mật', 100, 'Bánh donut full là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được làm để bán 1 hộp với 6 loại bánh ngẫu nhiên khác nhau trong mỗi hộp.', 250000, 'donut_9.jpg', 1, 3, 1, 'Bin Cake', 2),
(20, 'Burger Gà Cay', 100, 'Burger gà cay là một loại thức ăn bao gồm bánh mì kẹp thịt gà xay ở giữa. Miếng thịt có thể được hun khói và ướp gia vị cay đặc biệt của cửa hàng chúng tôi.', 50000, 'ga_cay.jpg', 1, 2, 0, 'Bin Cake', 0),
(21, 'Burger Gà', 100, 'Burger gà là một loại thức ăn bao gồm bánh mì kẹp thịt gà xay ở giữa. Miếng thịt có thể được hun khói .', 49000, 'ga.jpg', 1, 2, 0, 'Bin Cake', 0),
(22, 'Burger Gà Phô Mai', 100, 'Burger gà là một loại thức ăn bao gồm bánh mì kẹp thịt gà xay ở giữa. Miếng thịt có thể được hun khói và được thêm phô mai làm hương vị bánh thêm đậm đà.', 49000, 'ga_pho_mai_db.jpg', 1, 2, 0, 'Bin Cake', 0),
(23, 'Burger Bò 2 Lớp', 100, 'Burger bò 2 lớp là một loại thức ăn bao gồm bánh mì kẹp thịt bò xay ở giữa. Miếng thịt có thể được hun khói và được thêm 1 lớp bò làm bánh hấp dẫn, bắt mắt hơn .', 49000, 'bo_2lop.jpg', 1, 2, 0, 'Bin Cake', 0),
(24, 'Burger Bò Lớn', 100, 'Burger bò lớn là một loại thức ăn bao gồm bánh mì kẹp thịt bò xay ở giữa. Miếng thịt lớn sẽ được hun khói và tạo ra cảm giác ngon ngọt khi ăn.', 59000, 'bo_lon.jpg', 1, 2, 0, 'Bin Cake', 0),
(25, 'Burger Bò Phô Mai', 100, 'Burger bò phô mai đặc biệt là một loại thức ăn bao gồm bánh mì kẹp thịt bò xay ở giữa. Miếng thịt lớn sẽ được hun khói và tạo ra cảm giác ngon ngọt khi ăn.', 59000, 'bo_phomai_db.jpg', 1, 2, 0, 'Bin Cake', 0),
(26, 'Burger Bò Bigmac', 100, 'Burger bò bigmac là một loại thức ăn bao gồm bánh mì kẹp thịt bò xay ở giữa. Miếng thịt lớn sẽ được hun khói và là món burger full size của của hàng chúng tôi.', 69000, 'bigmac.jpg', 1, 2, 1, 'Bin Cake', 0),
(27, 'Donut Bí Ngô', 100, 'Bánh donut bí ngô là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây, và được chế biến lại với hình dạng quả bí ngô', 30000, 'bi_ngo.jpg', 1, 3, 1, 'Bin Cake', 0),
(28, 'Donut Green Tea', 100, 'Bánh donut green tea là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây, và được chế biến lại với hương vị trà xanh.', 30000, 'green-tea.jpg', 1, 3, 0, 'Bin Cake', 0),
(29, 'Donut King', 100, 'Bánh donut king là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với trong giống 1 vương miện của vua.', 30000, 'king.jpg', 1, 3, 0, 'Bin Cake', 0),
(30, 'Donut Spider', 100, 'Bánh donut spider là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây và được chế biến lại với hình dáng giống tơ nhện.', 30000, 'spider.jpg', 1, 3, 0, 'Bin Cake', 0),
(31, 'Donut Bear', 100, 'Bánh donut bear là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây, và được chế biến lại với hình dạng 1 chú gấu.', 30000, 'thebear.jpg', 1, 3, 0, 'Bin Cake', 0),
(32, 'Donut Frog', 100, 'Bánh donut frog là một loại bánh ngọt rán hoặc nướng để ăn tráng miệng hay ăn vặt. Đây là loại bánh rất nổi tiếng và phổ biến ở nhiều nước phương Tây, và được chế biến lại với hình dạng 1 chú ếch.', 30000, 'the-frog.jpg', 1, 3, 0, 'Bin Cake', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_datban`
--
ALTER TABLE `tbl_datban`
  ADD PRIMARY KEY (`id_datban`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Chỉ mục cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_datban`
--
ALTER TABLE `tbl_datban`
  MODIFY `id_datban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
