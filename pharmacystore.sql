-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 02:50 PM
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
  `adm_id` int(3) NOT NULL,
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
(101, 'เจ้าของกิจการ', '0816629398', 'admin', '25d55ad283aa400af464c76d713c07ad', 'เจ้าของกิจการ'),
(102, 'เภสัชกร', '0323564578', 'admin2', '25d55ad283aa400af464c76d713c07ad', 'เภสัชกร');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bills`
--

CREATE TABLE `tbl_bills` (
  `bill_no` int(11) NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_user` varchar(255) NOT NULL,
  `cus_pass` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_phone` varchar(255) NOT NULL,
  `cus_age` varchar(255) NOT NULL,
  `cus_height` varchar(255) NOT NULL,
  `cus_weight` varchar(255) NOT NULL,
  `cus_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_user`, `cus_pass`, `cus_name`, `cus_phone`, `cus_age`, `cus_height`, `cus_weight`, `cus_gender`) VALUES
(1, 'wisit', 'a6c7cac3471b53fb6cea8f71d12d9f6e', 'วิศิษฏ์', '0845678995', '22', '180', '60', 'ชาย');

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
  `order_id` int(11) NOT NULL,
  `cus_id` char(13) DEFAULT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_total` float(8,2) NOT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_phone` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cus_id`, `order_datetime`, `order_total`, `order_address`, `order_phone`, `order_status`) VALUES
(100026, '1', '2023-02-18 20:09:13', 25.00, '16 ชอย มิตรภาพ 4 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0845678995', 'ยกเลิก'),
(100027, '1', '2023-02-18 20:09:13', 39.00, '151/49 ซอย มะลิวัลย์ 5 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0845678995', 'ยกเลิก'),
(100028, '1', '2023-02-18 20:11:13', 25.00, '149/8 ชอย มิตรภาพ 4 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0845678995', 'ยกเลิก'),
(100029, '1', '2023-02-18 20:13:18', 13.00, 'CRP9+HVG ซอย มะลิวัลย์ 5 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0845678995', 'ยังไม่ชำระเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `ol_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`ol_id`, `order_id`, `pro_id`, `qty`, `sub_total`) VALUES
(312, 100026, '3341206888984', 1, 25.00),
(313, 100027, '7615846815232', 1, 39.00),
(314, 100028, '3341206888984', 1, 25.00),
(315, 100029, '9124972868114', 1, 13.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payprove`
--

CREATE TABLE `tbl_payprove` (
  `pay_id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `pay_slip` varchar(255) NOT NULL,
  `pay_datetime` datetime DEFAULT NULL,
  `adm_id` char(3) DEFAULT NULL,
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
  `pro_brand` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_unit` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `pro_price` double(5,2) NOT NULL,
  `pro_kind` varchar(255) NOT NULL,
  `pro_limit` int(11) NOT NULL,
  `pro_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_img`, `pro_brand`, `pro_name`, `pro_detail`, `pro_unit`, `type_id`, `pro_price`, `pro_kind`, `pro_limit`, `pro_status`) VALUES
('1927295159788', 'promotion_online_33_1.jpg', 'หงส์ไทย', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง ยาดมสมุนไพรหมักใช้สำหรับสูดดม กลิ่นหอมเย็นชื่นใจ ต้นตำรับสมุนไพรหมักแห่งแรกในไทย ด้วยส่วนประกอบจากสมุนไพรนานาชนิด                                                                                                   ', 'กระปุก', 4, 39.00, 'ยาสามัญประจำบ้าน', 10, 1),
('1927295159794', 'promotion_online_33_1.jpg', 'หงส์ไทย', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง ยาดมสมุนไพรหมักใช้สำหรับสูดดม กลิ่นหอมเย็นชื่นใจ ต้นตำรับสมุนไพรหมักแห่งแรกในไทย ด้วยส่วนประกอบจากสมุนไพรนานาชนิด                                                                                                   ', 'กระปุก', 4, 39.00, 'ยาสามัญประจำบ้าน', 10, 1),
('1927295159797', 'promotion_online_33_1.jpg', 'หงส์ไทย', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง ยาดมสมุนไพรหมักใช้สำหรับสูดดม กลิ่นหอมเย็นชื่นใจ ต้นตำรับสมุนไพรหมักแห่งแรกในไทย ด้วยส่วนประกอบจากสมุนไพรนานาชนิด                                                                                                   ', 'กระปุก', 4, 39.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3920799176747', 'promotion_online_28_.jpg', 'Vicks', 'วิคส์ วาโปรัป 5 กรัม', 'วิคส์ วาโปรับ บรรเทาอาการหวัด คลายหวัด คัดจมูก ยาทาระเหยบรรเทาอาการคัดจมูกชนิดขี้ผึ้ง ช่วยให้หายใจโล่ง', 'กระปุก', 2, 27.00, 'ยาสามัญประจำบ้าน', 10, 1),
('7609537033941', 'promotion_online_39_.jpg', 'Gaviscon', 'Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ 10 มล. 12 ซอง', 'Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ 10 มล. 12 ซอง Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ ช่วยบรรเทาอาการแสบร้อนกลางอกจากโรคกรดไหลย้อน และอาหารไม่ย่อย เนื่องจากมีกรดมากเกินไปในกระเพาะอาหารโดยรวมตัวกันเป็นชั้นเจลลอยตัวอยู่ชั้นบนของกรดในกระเพาะ', 'กล่อง', 7, 295.00, 'ยาสามัญประจำบ้าน', 5, 1);

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
(2, 'กลุ่มยาแก้แพ้ ลดน้ำมูกและหวัด'),
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
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `req_id` int(11) NOT NULL,
  `cus_id` char(13) DEFAULT NULL,
  `req_sym` varchar(255) DEFAULT NULL,
  `req_time` datetime DEFAULT NULL,
  `req_time_change` datetime DEFAULT NULL,
  `adm_id` char(3) DEFAULT NULL,
  `req_modify` datetime DEFAULT NULL,
  `req_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`req_id`, `cus_id`, `req_sym`, `req_time`, `req_time_change`, `adm_id`, `req_modify`, `req_status`) VALUES
(34120234, '1', 'ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว', '2023-02-23 19:30:00', NULL, NULL, NULL, 'รอยืนยัน'),
(43120243, '1', 'ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว', '2023-02-04 19:09:00', NULL, NULL, '2023-02-19 19:10:23', 'ยกเลิก');

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
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_bills`
--
ALTER TABLE `tbl_bills`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400000;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100030;

--
-- AUTO_INCREMENT for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `tbl_payprove`
--
ALTER TABLE `tbl_payprove`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43120244;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `cancel_old_orders` ON SCHEDULE EVERY 1 DAY STARTS '2023-02-18 20:09:13' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tbl_order
SET order_status = 'ยกเลิก'
WHERE order_datetime <= DATE_SUB(NOW(), INTERVAL 7 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
