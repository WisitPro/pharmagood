-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 06:15 AM
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
  `adm_name` varchar(100) NOT NULL,
  `adm_phone` char(10) NOT NULL,
  `adm_user` varchar(40) NOT NULL,
  `adm_pass` varchar(20) NOT NULL,
  `adm_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_name`, `adm_phone`, `adm_user`, `adm_pass`, `adm_role`) VALUES
('1', 'admin', '0812345678', 'admin', '12345', 'เจ้าของกิจการ'),
('2', 'เภสัช', '0812345678', 'admin2', '1234', 'เจ้าของกิจการ'),
('3', 'admin', '0812345678', 'admin3', '1234', 'เภสัชกร');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` char(13) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_phone` char(10) NOT NULL,
  `cus_user` varchar(40) NOT NULL,
  `cus_pass` varchar(20) NOT NULL,
  `cus_add` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_name`, `cus_phone`, `cus_user`, `cus_pass`, `cus_add`) VALUES
('1111111111111', 'วิศิษฏ์ จรรยาไพบูลย์', '0123456789', 'test', '1234', 'ขอนแก่น'),
('1409903033103', 'จรรยาไพบูลย์', '0619398616', 'wisit143', '1234', 'ขอนแก่น');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_total` float(8,2) NOT NULL,
  `cus_id` char(13) NOT NULL,
  `order_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `ol_id` int(11) NOT NULL,
  `pro_id` char(13) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` varchar(13) NOT NULL,
  `pro_img` varchar(200) DEFAULT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_type` varchar(50) NOT NULL,
  `pro_price` double(5,2) NOT NULL,
  `pro_kind` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_img`, `pro_name`, `pro_type`, `pro_price`, `pro_kind`) VALUES
('0188375659266', 'https://img.my-best.in.th/press_component/item_part_images/bcba1c7bb33cac55b046dda852298be1.jpg?ixlib=rails-4.2.0&q=70&lossless=0&w=640&h=640&fit=clip', 'แอลกอฮอล์ล้างแผล ศริบัญชา', 'เวชภัณฑ์', 45.00, 'ยาทั่วไป'),
('0895237098827', 'https://cdn.gedgoodlife.com/wp-content/uploads/2021/05/img-product-allernix.jpg', 'อัลเลอร์นิค ชนิดเม็ด', 'ยาแก้แพ้ คัน ผื่น', 74.00, 'ยาทั่วไป'),
('1234567891234', '', 'dsad', 'ยาบรรเทาอาการท้องเสีย', 20.00, 'ยาทั่วไป'),
('2553759139777', 'https://cf.shopee.co.th/file/02fd615611ab653f558ce68756770988', 'แอนตาซิล เยล เฮชเฮช 240มล.', 'ยาลดกรด แก้ท้องอืด', 50.00, 'ยาทั่วไป'),
('6086665296983', 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/k/i/kids_mask_13_.jpg', 'หน้ากากอนามัย SKYNLAB+', 'อุปกรณ์อื่นๆ', 99.00, 'ยาทั่วไป'),
('6862463282041', 'https://img.priceza.com/img1/30046/0001/30046-20190530162105-15181543641118054.jpg', 'ยาธาตุน้ำข้าว ตรากระต่ายบิน', 'ยาบรรเทาอาการท้องเสีย', 57.00, 'ยาทั่วไป'),
('7865790314231', 'https://backend.tops.co.th/media/catalog/product/8/8/8853042000109.jpg', 'ยาแก้ไอน้ำดำ ตราเสือดาว', 'ยาแก้ไอ ขับเสมหะ', 25.00, 'ยาทั่วไป'),
('8107262378112', 'https://static.hdmall.co.th/system/image_attachments/images/000/123/525/original/Systral-Cream-%28Chlorphenoxamine-Cream-25-g%29.jpg', 'ซิสทราล ครีม คลอร์เฟนอกซามีน', 'ยาทาผิวหนัง', 115.00, 'ยาทั่วไป'),
('8335036947725', 'https://media.allonline.7eleven.co.th/pdmain/459689-01-medicine-nonprescription-drugs-hongthai.jpg', 'ยาหม่อง ตราหงส์ไทย', 'ยาดม ยาหม่อง', 58.00, 'ยาทั่วไป'),
('8851473007698', 'https://cf.shopee.co.th/file/3dab73dcd1573c76fa8a23e4a1d63948_tn', 'ทิฟฟี่', 'ยาแก้ปวด ลดไข้', 18.00, 'ยาผ่านเภสัชกร'),
('8872600843606', 'https://punsuk.com/2623-6737-thickbox_default/tylenol-paracetamol-500-100-.jpg', 'ไทรินอล', 'ยาแก้ปวด ลดไข้', 50.00, 'ยาทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `req_id` int(5) NOT NULL,
  `cus_id` char(13) DEFAULT NULL,
  `req_sym` varchar(255) DEFAULT NULL,
  `req_time` datetime DEFAULT NULL,
  `req_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`req_id`, `cus_id`, `req_sym`, `req_time`, `req_status`) VALUES
(1, '1409903033103', 'ปวดหัว', '2022-11-24 10:03:49', 'รอการยืนยันจากเภสัชกร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

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
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `req_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `cus_id` FOREIGN KEY (`cus_id`) REFERENCES `tbl_customer` (`cus_id`);

--
-- Constraints for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD CONSTRAINT `tbl_orderlist_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`);

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tbl_customer` (`cus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
