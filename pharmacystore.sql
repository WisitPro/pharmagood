-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 09:49 AM
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
  `adm_id` int(11) NOT NULL,
  `adm_name` varchar(50) NOT NULL,
  `adm_phone` char(10) DEFAULT NULL,
  `adm_user` varchar(30) NOT NULL,
  `adm_pass` varchar(30) NOT NULL,
  `adm_role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_name`, `adm_phone`, `adm_user`, `adm_pass`, `adm_role`) VALUES
(101, 'เจ้าของกิจการ', '0816629398', 'admin', 'admin1234', 'เจ้าของกิจการ'),
(102, 'เภสัชกร 1', '0823564578', 'admin2', 'admin1234 ', 'เภสัชกร'),
(103, 'เภสัชกร 2', '0894655451', 'admin3', 'admin1234 ', 'เภสัชกร'),
(105, 'เภสัชกร 6', '0848485555', 'admin5', 'admin1234 ', 'เภสัชกร');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bills`
--

CREATE TABLE `tbl_bills` (
  `order_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bills`
--

INSERT INTO `tbl_bills` (`order_id`, `bill_no`, `bill_date`) VALUES
(100113, 100121, '2023-03-05 16:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_user` varchar(30) NOT NULL,
  `cus_pass` varchar(30) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_phone` char(10) NOT NULL,
  `cus_age` int(3) NOT NULL,
  `cus_height` float(5,2) NOT NULL,
  `cus_weight` float(5,2) NOT NULL,
  `cus_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_user`, `cus_pass`, `cus_name`, `cus_phone`, `cus_age`, `cus_height`, `cus_weight`, `cus_gender`) VALUES
(7, 'customer1', '12345678', 'วิศิษฏ์ จรรยาไพบูลย์', '0648185686', 22, 180.00, 60.00, 'ชาย'),
(8, 'customer2', '12345678', 'ฐาปกรณ์ อุดรรักษ์', '0948781245', 23, 146.00, 62.00, 'ชาย'),
(9, 'customer3', '12345678', 'ณัฐดนัย ผ่องศิริ', '0648795614', 23, 167.00, 60.00, 'ชาย'),
(10, 'customer4', '12345678', 'ชัชนันท์ พลพงษ์', '0858799663', 23, 165.00, 60.00, 'ชาย'),
(11, 'customer5', '12345678', 'เจษรินทร์ เศษวงศ์', '0846645654', 23, 155.00, 55.00, 'ชาย');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `order_id` varchar(255) NOT NULL,
  `delivery_service` varchar(255) NOT NULL,
  `delivery_tracking` varchar(255) NOT NULL,
  `adm_id` char(3) NOT NULL,
  `delivery_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`order_id`, `delivery_service`, `delivery_tracking`, `adm_id`, `delivery_datetime`) VALUES
('100113', 'Kerry', '125487946456445', '101', '2023-03-05 16:41:00');

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
  `cus_id` int(11) DEFAULT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_total` float(8,2) NOT NULL,
  `order_address` text DEFAULT NULL,
  `order_phone` char(10) DEFAULT NULL,
  `order_type` int(1) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cus_id`, `order_datetime`, `order_total`, `order_address`, `order_phone`, `order_type`, `order_status`) VALUES
(100113, 7, '2023-03-05 16:41:27', 124.00, 'CRQ9+6JJ ขก.1062 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0648185686', 1, 'จัดส่งแล้ว'),
(100114, 7, '2023-03-05 17:02:19', 45.00, '152/12-13 ซอยวัดป่าชัยวัน, ถนนมิตรภาพ, ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น, 40000 ตำบลในเมือง อำเภอเมืองขอนแก่น ขอนแก่น 40000 ประเทศไทย', '0648185686', 1, 'ชำระเงินแล้ว'),
(100115, 7, '2023-03-07 14:59:25', 20.00, 'CRJ8+38 เทศบาลนครขอนแก่น อำเภอเมืองขอนแก่น ขอนแก่น ประเทศไทย', '0648185686', 1, 'ยังไม่ชำระเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `order_id` int(11) NOT NULL,
  `pro_id` char(13) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`order_id`, `pro_id`, `qty`, `sub_total`) VALUES
(100113, '0763459865629', 1, 85.00),
(100113, '1927295159797', 1, 39.00),
(100114, '2995399871138', 1, 45.00),
(100115, '2082541576530', 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payprove`
--

CREATE TABLE `tbl_payprove` (
  `order_id` int(11) NOT NULL,
  `pay_bank` varchar(30) DEFAULT NULL,
  `pay_number` varchar(20) DEFAULT NULL,
  `pay_slip` varchar(50) NOT NULL,
  `pay_datetime` datetime DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `pay_modify` datetime DEFAULT NULL,
  `prove_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payprove`
--

INSERT INTO `tbl_payprove` (`order_id`, `pay_bank`, `pay_number`, `pay_slip`, `pay_datetime`, `adm_id`, `pay_modify`, `prove_status`) VALUES
(100113, ' ธนาคารกรุงเทพ', ' 123456787879845 ', 'S__1771110752.jpg', '2023-03-05 16:21:35', 101, '2023-03-05 16:38:55', 'ยืนยันแล้ว'),
(100114, ' ธนาคารกรุงศรีอยุธยา', ' 213213213213123 ', 'S__1771110716.jpg', '2023-03-05 17:02:19', NULL, NULL, 'รอการยืนยัน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` char(13) NOT NULL,
  `pro_img` varchar(50) DEFAULT NULL,
  `pro_brand` varchar(20) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_unit` varchar(20) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `pro_price` double(5,2) NOT NULL,
  `pro_kind` varchar(50) NOT NULL,
  `pro_limit` int(11) NOT NULL,
  `pro_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_img`, `pro_brand`, `pro_name`, `pro_detail`, `pro_unit`, `type_id`, `pro_price`, `pro_kind`, `pro_limit`, `pro_status`) VALUES
('0684325698754', 'startiger.jpg', 'เสือ', 'ยาแก้ไอน้ำดำ', 'ใช้เป็นยาบรรเทาอาการไอ ช่วยขับเสมหะ และทำให้ชุ่มคอ สำหรับรักษาอาการไอระคายคอ ไอแห้งๆ ที่ไม่มีเสมหะ\r\n             ', 'ขวด', 3, 22.00, 'ยาสามัญประจำบ้าน', 5, 0),
('0763459865629', 'baby.jpg', 'Byebye-Fever', 'Byebye-Fever แผ่นเจลลดไข้สำหรับเด็กเล็ก', 'Byebye-Fever แผ่นเจลลดไข้สำหรับเด็กเล็ก 4 ชิ้น/กล่อง แผ่นเจลให้ความเย็น สำหรับลดไข้ (เครื่องมือแพทย์แบบใช้ครั้งเดียว) แผ่นเจลอาจติดได้ไม่สนิทหากมีเหงื่อออกมาก                ', 'กล่อง', 1, 85.00, 'ยาสามัญประจำบ้าน', 10, 1),
('1927295159797', 'promotion_online_33_1.jpg', 'หงส์ไทย', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2', 'ยาดมสมุนไพร ตราหงส์ไทย สูตร 2 กระปุกเหลือง ยาดมสมุนไพรหมักใช้สำหรับสูดดม กลิ่นหอมเย็นชื่นใจ ต้นตำรับสมุนไพรหมักแห่งแรกในไทย ด้วยส่วนประกอบจากสมุนไพรนานาชนิด                                                                                     ', 'กระปุก', 4, 39.00, 'ยาสามัญประจำบ้าน', 10, 1),
('2082541576530', 'poysian_magenta_front_880.jpg', 'โป๊ยเซียน', 'ยาดม ตรา โป๊ยเซียน', 'ยาดม ตรา โป๊ยเซียน ใช้ดม ใช้ทา ในหลอดเดียวกัน                        ', 'หลอด', 4, 20.00, 'ยาสามัญประจำบ้าน', 10, 1),
('2995399871138', 'fah.png', 'อ้วยอัน', 'อ้วยอัน ยาแคปซูลฟ้าทะลายโจร 350MG 30 แคปซูล', 'สมุนไพรฟ้าทะลายโจร มีฤทธิ์กระตุ้นภูมิคุ้มกัน ทำให้มีร่างกายสามารถต่อสู้กับเชื้อไวรัส แก้ไข้ แก้ไอ เจ็บคอ ท้องเสีย ปวดท้อง ทำให้ความสามารถของเชื้อไวรัส ในการเกาะติดกับผนังเซลล์ลดลง จึงทำให้เชื้อไวรัสเข้าสู่เซลล์ได้ยากขึ้น ชนิดแคปซูล 30 เม็ด พกพาสะดวก\r\n', 'ซอง', 1, 45.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3125149410726', 'tonaf.png', 'TONAF', 'TONAF 15 Gm', 'ครีมโทนาฟ (TONAFF) ประกอบด้วยตัวยา Tolnaftate ลักษณะการออกฤทธิ์ของตัวยาคือ เข้าไปทำลายเชื้อราให้มีลักษณะผิดรูปร่าง และหยุดการเจริญเติบโต จึงสามารถใช้รักษาโรคเชื้อราที่เกิดกับจุดต่าง ๆ ในร่างกาย เช่น เชื้อราบนหนังศีรษะ น้ำกัดเท้า หรือผิวหนังทั่วร่างกายโดยเฉพาะจุดอับชื้น', 'กล่อง', 13, 90.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3165475042593', 'kol.jpg', 'เบตาดีน การ์เกิล', 'เบตาดีน การ์เกิล น้ำยาบ้วนปาก 30 มล.', 'เบตาดีน การ์เกิล (ใช้กลั้ว) มีฤทธิ์ฆ่าเชื้อจุลินทรีย์ทั้งไวรัส แบคทีเรียและเชื้อราได้มากกว่า 99.99% ช่วยลดอาการอักเสบ บริเวณช่องปากและลำคอ', 'กล่อง', 6, 185.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3481580060882', 'banda.jpg', 'เบนด้า 500', 'เบนด้า 500 500 มิลลิกรัม', 'ยาถ่ายพยาธิยี่ห้อไหนดี แนะนำ เบนด้า 500 ยาถ่ายพยาธิ สำหรับใช้ถ่ายพยาธิเส้นด้าย ตัวกลม แส้ม้า ปากขอ และเข็มหมุด โดยในยาเม็ด 1 เม็ด ประกอบด้วยตัวยาสำคัญ คือ มีเบนดาโซล (Mebendazole) 500 มิลลิกรัม โดยกินเพียง 1 เม็ดครั้งเดียว และเคี้ยวก่อนกลืน', 'กล่อง', 10, 35.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3829004073173', 'nava.jpg', 'นาวาเมด', 'ยาแก้เมารถเมาเรือ นาวาเมด (แผง2เม็ด)', 'ป้องกันและรักษาอาการคลื่นไส้ อาเจียน มึนงง จากการเมารถ เมาเรือ (motion sickness) และอาการบ้านหมุน (vertigo) (อาการมึนงงอย่างมาก หรือมีความรู้สึกว่าสิ่งต่างๆ รอบๆ ตัวหมุนอย่างรวดเร็ว)\r\nยาในรูปแบบเม็ด สำหรับรับประทาน', 'แผง', 5, 5.00, 'ยาสามัญประจำบ้าน', 10, 1),
('3920799176747', 'promotion_online_28_.jpg', 'Vicks', 'วิคส์ วาโปรัป 5 กรัม', 'วิคส์ วาโปรับ บรรเทาอาการหวัด คลายหวัด คัดจมูก ยาทาระเหยบรรเทาอาการคัดจมูกชนิดขี้ผึ้ง ช่วยให้หายใจโล่ง', 'กระปุก', 2, 27.00, 'ยาสามัญประจำบ้าน', 10, 1),
('4348664935217', 'mask.png', 'Hofcare', 'Hofcare หน้ากากอนามัย 3 ชั้น สีดำ 50 ชิ้น', 'Hofcare หน้ากากอนามัย 3 ชั้น สีดำ 50 ชิ้น ฮอฟแคร์ หน้ากากอนามัย 3 ชั้น PM 2.5 ประสิทธิภาพการกรองเชื้อแบคทีเรียอนุภาค 2.9 ไมครอน ได้มากกว่า 99% (BFE>99%) โดย Nelson Labs, USA ผลิตจากวัสดุที่ถูกสุขอนามัย', 'กล่อง', 16, 90.00, 'ยาสามัญประจำบ้าน', 10, 1),
('4911181380697', 'fixi2.png', 'อภัยภูเบศร', 'ยาอมแก้ไอ ผสมมะขามป้อม ตรา อภัยภูเบศร สูตร 2', 'ยาอมแก้ไอ ผสมมะขามป้อม ตรา อภัยภูเบศร สูตร 2 1 ห่อ มี 40 เม็ด บรรเทาอาการไอ ขับเสมหะ ทำให้ชุ่มคอ                ', 'ห่อ', 3, 12.00, 'ยาสามัญประจำบ้าน', 10, 1),
('4937229275884', 'd7c8488522c8d52ea954fca4b86e0afa.png', 'Clarityne', 'ยาแก้แพ้ Clarityne 1 กล่อง', 'ยาแก้แพ้ Clarityne 1 กล่อง มี 10 เม็ด บรรเทาอาการจากภูมิแพ้ ยับยั้งลมพิษเรื้อรังและผื่นผิวหนังอื่น ๆ\r\n        ', 'กล่อง', 2, 165.00, 'ยาสามัญประจำบ้าน', 10, 1),
('4997177263480', 'gel.png', ' Burrny Gel', ' Burrny Gel 30 กรัม', 'Burrny Gel 30 กรัม รักษาผิวที่ถูกทำลาย แผลพุพอง ลดอาการแสบร้อน ป้องกันแผลเป็น\r\nสำหรับผู้ที่เกิดผิวไหม้จากแดดเผา หรือเกิดแผลไฟไหม้ในระดับที่ไม่รุนแรง Burrny Gel จากยันฮี เป็นอีกตัวยาที่เหมาะจะมีติดบ้านไว้ใช้ยามฉุกเฉิน ด้วยคุณสมบัติของว่านหางจระเข้ (Aloe Barbadensis) จะช่วยรักษาและบรรเทาอาการปวดแสบปวดร้อนจากบาดแผลให้ทุเลาลง', 'กล่อง', 14, 50.00, 'ยาสามัญประจำบ้าน', 10, 1),
('5844594698042', 'fixi.png', 'อภัยภูเบศร', 'อภัยภูเบศร ยาอมแก้ไอผสมมะขามป้อม สูตร 1', 'อภัยภูเบศร ยาอมแก้ไอผสมมะขามป้อม สูตร 1 หนึ่งห่อ มี 40 เม็ด บรรเทาอาการไอ ขับเสมหะ ทำให้ชุ่มคอ วิธีใช้ ใช้อมครั้งละ 1-2 เม็ด ใช้เมื่อมีอาการ                ', 'ห่อ', 3, 12.00, 'ยาสามัญประจำบ้าน', 10, 1),
('5863644756470', 'car.jpg', 'คาอาบอน', 'คาอาบอน 260 mg 10 แคปชูล', 'คาอาบอน 260 mg 10 แคปชูล รักษาอาการท้องเสีย\r\nรับประทานก่อนหรือหลังทานยาอื่นๆ 2ซม', 'ซอง', 8, 25.00, 'ยาสามัญประจำบ้าน', 10, 1),
('7039275720815', 'vita.jpg', 'Nutrivita', 'Nutrivita Multivitamin & Minerals 10 เม็ด', 'วิตามินรวม Nutrivita ตัวนี้ บอกเลยว่าเหมาะสำหรับคนที่ไม่ต้องการกินวิตามินทีละหลายๆ เม็ดค่ะ เพราะ MEGA We care ได้รวมสารต้านอนุมูลอิสระ 6 ชนิด ไม่ว่าจะเป็นวิตามิน C, วิตามิน D, วิตามิน E, Zinc, ซิลิเนียม, เบต้าแคโรทีน และวิตามิน B 10 ชนิด        ', 'กล่อง', 15, 150.00, 'ยาสามัญประจำบ้าน', 10, 1),
('7609537033941', 'promotion_online_39_.jpg', 'Gaviscon', 'Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ ', 'Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ 10 มล. 12 ซอง Gaviscon กาวิสคอนซัสเพนชั่นเปปเปอร์มิ้นต์ ชนิดน้ำ ช่วยบรรเทาอาการแสบร้อนกลางอกจากโรคกรดไหลย้อน และอาหารไม่ย่อย เนื่องจากมีกรดมากเกินไปในกระเพาะอาหารโดยรวมตัวกันเป็นชั้นเจลลอยตัวอยู่ชั้นบนของกรดในกระเพาะ', 'กล่อง', 7, 295.00, 'ยาสามัญประจำบ้าน', 5, 1),
('7729639667695', 'makam.png', 'ธันยพร', 'ยาแคปซูลมะขามแขก 100 แคปซูล', 'สมุนไพรไทยแบบดั้งเดิม ช่วยแก้อาการท้องผูก บรรเทาริดสีดวง\r\nใครที่มองหาวิธีแก้อาการท้องผูกแบบดั้งเดิม และมีอาการท้องผูกในระดับหนัก การเลือกมะขามแขกก็เป็นทางเลือกที่สามารถช่วยให้อาการบรรเทาลงได้                ', 'กระปุก', 9, 92.00, 'ยาสามัญประจำบ้าน', 10, 1),
('7800319472577', 'bee.jpg', 'Real elixir', 'Real elixir propolis fresh spray สเปรย์พ่นช่องปาก ', 'โพรโพลิซ บรรเทาอาการเจ็บคอ ระคายคอ ทอนซิลอักเสบ บรรเทาอาการได้ตั้งแต่ครั้งแรกที่ใช้ ช่วยฆ่าเชื้อแบคทีเรีย เชื้อไวรัส เชื้อราที่ก่อโรค        ', 'ซอง', 6, 149.00, 'ยาสามัญประจำบ้าน', 10, 1),
('8203198028352', 'tynor.png', 'Tynor', 'tynor ผ้าพันแผล I10 ORTHOSTOCKINETE ยาว 10 ม. กว้า', ' ผ้าพันแผลไทนอร์ (Tynor I10 ORTHOSTOCKINETE) ความยาว 10 เมตร กว้าง 7.5 เซนติเมตร ใช้รองระหว่างผิวกับเฝือก หรือแผลเป็นใส่สบาย ได้มาตรฐาน ทนทาน ของแท้ คุ้มราคา สินค้านำเข้าจากต่างประเทศ จัดส่งโดย ฟาสซิโน ชุมชนยาที่มีร้านกว่าร้อยสาขาทั่วประเทศ ประสบการณ์เวชภัณฑ์มากกว่า 37 ปี ราคายุติธรรม พร้อมมีเภสัชกรที่มีความเชี่ยวชาญให้คำปรึกษาผ่านช่องแชท ตลอดเวลาทำการ        ', 'กล่อง', 16, 640.00, 'ยาสามัญประจำบ้าน', 10, 1),
('8399781326006', 'eye.jpg', 'Sofclens', 'Sofclens น้ำเกลือ ซอฟคลีน 100 มล.', 'น้ำเกลือ ซอฟคลีน Sofclens 100 ml น้ำเกลือล้างจมูก ล้างคอนแทคเลนส์ ล้างตา ครบในขวดเดียวน้ำเกลือ ผลิตโดยผ่านกระบวนการสเตอริไลส์ ทำให้ปราศจากเชื้อ สามารถใช้ล้างจมูก ล้างคอนแทคเลนส์ ล้างตา ', 'ขวด', 12, 36.00, 'ยาสามัญประจำบ้าน', 10, 1),
('8999032269743', 'zam.jpg', 'Zambuk Oint', 'Zambuk Oint แซม บัค 18 กรัม', 'Zambuk Oint แซมบัค 18 กรัม แบรนด์อันดับหนึ่ง ที่ผู้บริโภคเลือกใช้ในกลุ่มยาบรรเทาอาการแมลงสัตว์กัดต่อย (IPSOS market research: Aug 2019) ไม่แสบร้อน มีส่วนผสมจากธรรมชาติ เหมาะสำหรับเด็กและทุกช่วงวัย', 'กระปุก', 11, 42.00, 'ยาสามัญประจำบ้าน', 10, 1),
('9076694480730', 'rabbit.jpg', 'กระต่ายบิน', 'ยาธาตุน้ำขาวตรากระต่ายบิน 1 ขวด 200ml', 'ธาตุน้ำขาวตรากระต่ายบิน 1 ขวด 200ml แก้อาการท้องเสีย ท้องเฟ้อ ท้องอืด        ', 'ขวด', 7, 59.00, 'ยาสามัญประจำบ้าน', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
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
  `cus_id` int(11) DEFAULT NULL,
  `req_sym` text DEFAULT NULL,
  `req_time` datetime DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `req_modify` datetime DEFAULT NULL,
  `req_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`req_id`, `cus_id`, `req_sym`, `req_time`, `adm_id`, `req_modify`, `req_status`) VALUES
(43120298, 7, 'ปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัวปวดหัว', '2023-03-12 17:02:00', NULL, '2023-03-07 14:52:51', 'ยกเลิก');

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
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `bill_no` (`bill_no`) USING BTREE,
  ADD KEY `order_id` (`order_id`);

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
  ADD PRIMARY KEY (`order_id`,`pro_id`),
  ADD KEY `fk_orderlist` (`order_id`,`pro_id`),
  ADD KEY `2pk_fk_orderlist` (`order_id`,`pro_id`);

--
-- Indexes for table `tbl_payprove`
--
ALTER TABLE `tbl_payprove`
  ADD PRIMARY KEY (`order_id`),
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
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_bills`
--
ALTER TABLE `tbl_bills`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100122;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100116;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43120299;

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
