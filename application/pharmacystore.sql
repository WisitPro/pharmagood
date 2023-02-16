-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 03:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` char(3) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_phone` char(10) DEFAULT NULL,
  `adm_user` varchar(255) NOT NULL,
  `adm_pass` varchar(255) NOT NULL,
  `adm_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_name`, `adm_phone`, `adm_user`, `adm_pass`, `adm_role`) VALUES
('101', 'DEV', '081245678', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'เจ้าของกิจการ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bills`
--

CREATE TABLE `tbl_bills` (
  `bill_no` varchar(255) NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` char(13) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_phone` char(10) NOT NULL,
  `cus_user` varchar(255) NOT NULL,
  `cus_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_name`, `cus_phone`, `cus_user`, `cus_pass`) VALUES
('1111111111111', 'dev', '0123456789', 'test', '81dc9bdb52d04dc20036dbd8313ed055'),
('1409903033103', 'วิศิษฏ์ จรรยาไพบูลย์', '0648185686', 'wisit', 'a6c7cac3471b53fb6cea8f71d12d9f6e'),
('1488888888888', 'วิศิษฏ์', '0123456789', 'test2', 'a6c7cac3471b53fb6cea8f71d12d9f6e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `order_id` varchar(255) NOT NULL,
  `adm_id` char(3) NOT NULL,
  `delivery_datetime` datetime NOT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `delivery_success` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`order_id`, `adm_id`, `delivery_datetime`, `delivery_status`, `delivery_success`) VALUES
('04120204', '101', '2023-02-12 20:07:46', 'จัดส่งเรียบร้อย', '2023-02-12 20:08:06'),
('36160236', '101', '2023-02-11 18:35:37', 'กำลังทำการส่ง', NULL),
('37170237', '101', '2023-02-15 00:58:47', 'จัดส่งเรียบร้อย', '2023-02-15 00:59:24'),
('48170248', '101', '2023-02-12 01:02:34', 'จัดส่งเรียบร้อย', '2023-02-12 02:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE `tbl_information` (
  `id` int(11) NOT NULL,
  `key_1` varchar(255) NOT NULL,
  `key_2` varchar(255) NOT NULL,
  `key_3` varchar(255) NOT NULL,
  `value_1` varchar(255) NOT NULL,
  `value_2` varchar(255) NOT NULL,
  `value_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`id`, `key_1`, `key_2`, `key_3`, `value_1`, `value_2`, `value_3`) VALUES
(1, 'ธนาคาร', 'เลขที่บัญชี', 'ชื่อบัญชี', 'กรุงไทย', '7880428100', 'ร้านขายยา บ้านยาศรีฐาน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` varchar(255) NOT NULL,
  `cus_id` char(13) DEFAULT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_total` float(8,2) NOT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_phone` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `ol_id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `pro_id` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payprove`
--

CREATE TABLE `tbl_payprove` (
  `pay_id` varchar(255) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `pay_slip` varchar(255) NOT NULL,
  `pay_datetime` datetime DEFAULT NULL,
  `adm_id` char(3) NOT NULL,
  `pay_modify` datetime DEFAULT NULL,
  `prove_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` varchar(255) NOT NULL,
  `pro_img` varchar(255) DEFAULT NULL,
  `pro_name` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `pro_price` double(5,2) NOT NULL,
  `pro_kind` varchar(255) NOT NULL,
  `pro_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_img`, `pro_name`, `type_id`, `pro_price`, `pro_kind`, `pro_limit`) VALUES
('0078081472641', 'https://img.my-best.in.th/contents/4b2924fa3f4f320b499defb65fdf072f.png?ixlib=rails-4.2.0&q=70&lossless=0&w=1200&h=900&fit=crop&s=3a14d2f5f861140a759eb1781dda6df9', 'ชุดปฐมพยาบาลเบื้องต้น พร้อมอุปกรณ์ 79 ชิ้น', 16, 120.00, 'เวชภัณฑ์', 10),
('0350608765376', 'https://image.makewebeasy.net/makeweb/0/jKFUCwieZ/Food/1633256149802.jpg', 'คาอาบอน ชาร์โคล แก้ท้องเสีย 10 เม็ด', 8, 25.00, 'ยาสามัญประจำบ้าน', 10),
('0942050911533', 'https://cf.shopee.co.th/file/93ea7d279486565a3ee7d74ec57ce310', 'ยาแก้ไอตราเสือดาว 60 มล.', 3, 17.00, 'ยาสามัญประจำบ้าน', 5),
('1270740056929', 'https://inwfile.com/s-cz/w9dzuk.jpg', 'Duphalac ยาระบาย 100 มล.', 9, 180.00, 'ยาสามัญประจำบ้าน', 5),
('1585376111738', 'https://cf.shopee.co.th/file/438624727e7db390744a99b330d8ed2d', 'แชมบัค บรรเทาอาการ แมลงกัดต่อย', 11, 82.00, 'ยาสามัญประจำบ้าน', 10),
('1593527158853\r\n', 'https://pim-cdn0.ofm.co.th/products/large/0001964.jpg', 'Navamed ยาแก้เมารถ แบบแผง', 5, 5.00, 'ยาสามัญประจำบ้าน', 5),
('1826046930670', 'https://inwfile.com/s-e/icvhg8.jpg', 'Ezerra Cream  ยาแก้คันผิวหนัง', 13, 750.00, 'ยาสามัญประจำบ้าน', 10),
('1838839938893', 'https://www.tudsinjai.com/wa-data/public/shop/products/37/01/137/images/351/351.970.jpg', 'ยาทิฟฟี่ แผง 4 เม็ด', 1, 13.00, 'ยาสามัญประจำบ้าน', 10),
('1934753391254', 'https://www.tmanpharma.co.th/files/product/large/product-000366-1569299724.jpg', 'สเปรย์พ่นคอโพรโพลิซ พลัส เอ็กเฮิร์บ', 6, 159.00, 'ยาสามัญประจำบ้าน', 5),
('1982978601801', 'https://cf.shopee.co.th/file/c0a5fe34ce137dce441a14b3945105fe', 'Mederma ยาทาแผลไฟไหม้ น้ำร้อนลวก 20 g', 14, 860.00, 'ยาสามัญประจำบ้าน', 5),
('2390284884655', 'https://st.bigc-cs.com/public/media/catalog/product/55/88/8850172243055/8850172243055_4.jpg', 'บีแพนเธน เซนซิเดิร์ม ครีม  ยาแก้คันผิวหนัง 20 g', 13, 420.00, 'ยาสามัญประจำบ้าน', 10),
('2503846869506', 'https://cf.shopee.co.th/file/ecf929fe4c907f8f7c60978ad5cf803c', ' Blackmores Multivitamin 12+ วิตามินรวม 60 เม็ด', 15, 780.00, 'ยาสามัญประจำบ้าน', 10),
('2539112007761', 'https://cf.shopee.co.th/file/c8c52eab28bfd5824774f0b9aab113c7', 'น้ำมันมวย บรรเทากล้ามเนื้อ 30ml ', 11, 39.00, 'ยาสามัญประจำบ้าน', 10),
('2549773745988', 'https://obs.line-scdn.net/r/ect/ect/image_164224278299261136119ca2194t0f1ec9cf', 'Senokot ยาระบาย แบบแผง', 9, 115.00, 'ยาสามัญประจำบ้าน', 5),
('2654283658748', 'https://cf.shopee.co.th/file/1245b5bcf2bd1c6c46a36ad297681b33', 'ยาแก้เมารถ Cooling Massage Oil', 5, 5.00, 'ยาสามัญประจำบ้าน', 5),
('2796785767662', 'https://cf.shopee.co.th/file/8a73b8c77c7d0444b4bba80d0ff2f538', 'ยาดมตราโป๊ยเชียน', 4, 20.00, 'ยาสามัญประจำบ้าน', 10),
('3138610444321', 'https://cf.shopee.co.th/file/3dc7ba5957a173635f68139266b84a7b', 'Yanhee Burrny Gel  ยาทาแผลไฟไหม้ น้ำร้อนลวก 30 g', 14, 120.00, 'ยาสามัญประจำบ้าน', 10),
('3341206888984', 'https://img10.jd.co.th/mobilecms/s750x750_jfs/t7/202/11492773932/81450/ab5b3d66/627ce27eNbd54fa60.jpg!q70.jpg', 'ซูลิดีน บรรเทาอาการหวัด ', 2, 25.00, 'ยาสามัญประจำบ้าน', 5),
('4133030080080', 'https://static.hdmall.co.th/system/image_attachments/images/000/123/563/original/%E0%B9%80%E0%B8%9A%E0%B8%99%E0%B8%94%E0%B9%89%E0%B8%B2_500_%28Mebendazole%29.jpg', 'เบนด้า 500 ยาถ่ายพญาธิแบบแผง\r\n', 10, 35.00, 'ยาสามัญประจำบ้าน', 5),
('4365805624506', 'https://inwfile.com/s-cz/3o2ex5.jpg', 'Nutrivita Multivitamin & Minerals   วิตามินรวม 10 เม็ด', 15, 150.00, 'ยาสามัญประจำบ้าน', 10),
('4511054433769', 'https://st.bigc-cs.com/public/media/catalog/product/11/88/8850109073311/8850109073311.jpg', 'ยาดม Peppermint Field', 4, 20.00, 'ยาสามัญประจำบ้าน', 10),
('4795687338619', 'https://www.pimmanee.co.th/vmart/wp-content/uploads/2022/01/000896-2.jpg', 'Gaviscon กาวิสคอนดูอัลแอคชั่น ชนิดเม็ด 16 เม็ด', 7, 258.00, 'ยาสามัญประจำบ้าน', 5),
('6748153364306', 'https://img10.jd.co.th/n0/jfs/t40/23/1382331069/26286/79ff76d6/63527e02N17368a7f.jpg!q70.jpg', 'Tear Mac Eye Drops Solution ยาหยอดตา 10 มล.', 12, 80.00, 'ยาสามัญประจำบ้าน', 5),
('7615846815232', 'https://moombhesaj.com/wp-content/uploads/2020/04/loratadine-1.jpg', 'Clarid Loratadine ยาแก้แพ้ 10 เม็ด', 2, 39.00, 'ยาสามัญประจำบ้าน', 5),
('8453489566415', 'https://api.watsons.co.th/medias/prd-front-301850.jpg?context=bWFzdGVyfGltYWdlc3w0NTcyM3xpbWFnZS9qcGVnfGgzYS9oYzMvMTExNTQxNzkxOTQ5MTAvV1RDVEgtMzAxODUwLWZyb250LmpwZ3w2MzczMjE5MzhlYjcyMmQ0MTY0MDliZTdlNGIzNTI2ZWMxYmFkODEzMzgyZTMzMmQ4NDk0Y2JhZThmZjhmOWMy', 'Welcare หน้ากากอนามัย 3 ชั้น เลเวล 2 50 ชิ้น/กล่อง', 16, 125.00, 'ยาสามัญประจำบ้าน', 10),
('9124972868114', 'https://ocs-k8s-prod.s3.ap-southeast-1.amazonaws.com/PRODUCT_1619431667176.jpeg', 'ไทลินอล ยาบรรเทาปวดลดไข้ 10 เม็ด', 1, 13.00, 'ยาสามัญประจำบ้าน', 10),
('9459544217466', 'https://inwfile.com/s-fy/rq4a8e.jpg', 'ยาแก้ไออาปาเช่ 60 มล.', 3, 25.00, 'ยาสามัญประจำบ้าน', 5),
('9642469764546', 'https://punsuk.com/3011-6660-thickbox_default/kamillosan-m-15-ml-bottle-with-sprayer.jpg', 'สเปรย์พ่นคอ คามิลโลซาน เอ็ม', 6, 155.00, 'ยาสามัญประจำบ้าน', 5),
('9826912895852', 'https://cf.shopee.co.th/file/444e05cf1f6242f4c90ca5c12085656f', 'ยาธาตุน้ำขาว ตรากระต่ายบิน 50 มล.', 7, 19.00, 'ยาสามัญประจำบ้าน', 10),
('9987068493429', 'https://aqua.c1ub.net/home/upload/files/1505188983_u1_EZPmk8iy.jpg', 'ฟูกาคาร์', 10, 35.00, 'ยาสามัญประจำบ้าน', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`type_id`, `type_name`) VALUES
(1, 'กลุ่มยาบรรเทาปวดลดไข้'),
(2, 'กลุ่มยาแก้แพ้ ลดน้ำมูก'),
(3, 'กลุ่มยาแก้ไอ ขับเสมหะ'),
(4, 'กลุ่มยาดม หรือยาทาแก้วิงเวียน หน้ามืด คัดจมูก'),
(5, 'กลุ่มยาแก้เมารถ เมาเรือ'),
(6, 'กลุ่มยาสำหรับโรคปาก และลำคอ '),
(7, 'กลุ่มยาแก้ปวดท้อง ท้องอืด ท้องขึ้น ท้องเฟ้อ'),
(8, 'กลุ่มยาแก้ท้องเสีย'),
(9, 'กลุ่มยาระบาย '),
(10, 'กลุ่มยาถ่ายพยาธิลำไส้'),
(11, 'กลุ่มยาบรรเทาอาการปวดกล้ามเนื้อ แมลงกัดต่อย'),
(12, 'กลุ่มยาสำหรับโรคตา'),
(13, 'กลุ่มยาสำหรับโรคผิวหนัง'),
(14, 'กลุ่มยารักษาแผลติดเชื้อไฟไหม้ น้ำร้อนลวก'),
(15, 'กลุ่มยาบำรุงร่างกาย'),
(16, 'เวชภัณฑ์หรืออุปกรณ์การแพทย์ทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quickcode`
--

CREATE TABLE `tbl_quickcode` (
  `key_1` varchar(255) NOT NULL,
  `key_2` varchar(255) NOT NULL,
  `key_3` varchar(255) NOT NULL,
  `value_1` varchar(255) NOT NULL,
  `value_2` varchar(255) NOT NULL,
  `value_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `req_id` varchar(255) NOT NULL,
  `cus_id` char(13) DEFAULT NULL,
  `cus_phone` varchar(255) DEFAULT NULL,
  `req_sym` varchar(255) DEFAULT NULL,
  `req_time` datetime DEFAULT NULL,
  `req_time_change` datetime DEFAULT NULL,
  `adm_id` char(3) DEFAULT NULL,
  `req_modify` datetime DEFAULT NULL,
  `req_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_bills`
--
ALTER TABLE `tbl_bills`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk` (`order_id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD PRIMARY KEY (`ol_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`pro_id`);

--
-- Indexes for table `tbl_payprove`
--
ALTER TABLE `tbl_payprove`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `adm_id` (`adm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
