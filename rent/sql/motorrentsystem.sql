-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2021-01-15 05:46:49
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `motorrentsystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `employee`
--

INSERT INTO `employee` (`number`, `password`, `name`, `Tel`) VALUES
('a1075514', '12345678', '方思媛', '0888888888'),
('a1075519', '12345678', '林于庭', '0777777777');

-- --------------------------------------------------------

--
-- 資料表結構 `form`
--

CREATE TABLE `form` (
  `number` varchar(20) NOT NULL,
  `renter_id` varchar(20) NOT NULL,
  `rent_date` varchar(30) DEFAULT NULL,
  `pick_time` varchar(20) DEFAULT NULL,
  `return_time` varchar(20) DEFAULT NULL,
  `take` int(1) NOT NULL COMMENT '是否取車',
  `return` int(1) DEFAULT NULL COMMENT '是否還車',
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `motor`
--

CREATE TABLE `motor` (
  `license` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `CC` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `motor`
--

INSERT INTO `motor` (`license`, `price`, `CC`, `type`, `state`) VALUES
('aaa-0001', 1200, 155, 'YAMAHA S-MAX ABS', 0),
('aaa-0002', 1100, 158, 'SYM DRG ABS', 0),
('aaa-0003', 950, 155, 'YAMAHA FORCE', 0),
('aaa-0004', 1100, 155, 'YAMAHA S-MAX 30週年版', 0),
('aaa-0005', 1100, 180, 'KYMCO 雷霆王 ABS', 0),
('aaa-0006', 1000, 150, 'KYMCO G6 ABS版', 0),
('aaa-0007', 900, 155, 'YAMAHA S-MAX', 0),
('aaa-0008', 1200, 155, 'YAMAHA S-MAX ABS', 0),
('aaa-0009', 1200, 155, 'YAMAHA S-MAX ABS', 0),
('aaa-0010', 1100, 155, 'YAMAHA S-MAX 30週年版', 0),
('bbb-0001', 850, 125, 'YAMAHA 勁戰4代 雙碟運動版', 0),
('bbb-0002', 1000, 125, 'YAMAHA勁戰5代ABS特仕版', 0),
('bbb-0003', 800, 125, 'SYM JET POWER S', 0),
('bbb-0004', 800, 125, 'SYM JET POWER S', 0),
('bbb-0005', 800, 125, 'SYM JET POWER S', 0),
('bbb-0006', 800, 125, 'YAMAHA Bws R', 0),
('bbb-0007', 750, 125, 'PGO Jbubu S', 0),
('bbb-0008', 750, 125, 'PGO Jbubu S', 0),
('bbb-0009', 750, 125, 'PGO Jbubu S', 0),
('bbb-0010', 750, 125, 'PGO Jbubu S', 0),
('ccc-0001', 650, 115, 'YAMAHA New CUXI', 0),
('ccc-0002', 500, 125, 'SUZUKI Address', 0),
('ccc-0003', 500, 110, 'SYM RX', 0),
('ccc-0004', 700, 110, 'KYMCO New Many', 0),
('ccc-0005', 650, 115, 'YAMAHA New CUXI', 0),
('ccc-0006', 650, 115, 'PGO J bubu', 0),
('ccc-0007', 650, 115, 'PGO J bubu', 0),
('ccc-0008', 700, 110, 'KYMCO New Many', 0),
('ccc-0009', 700, 110, 'KYMCO New Many', 0),
('ccc-0010', 700, 110, 'KYMCO New Many', 0),
('ccc-8787', 800, 1, 'GOGORO2', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `motor_license` varchar(20) NOT NULL,
  `form_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `renter`
--

CREATE TABLE `renter` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `Tel` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`number`);

--
-- 資料表索引 `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`number`),
  ADD KEY `renter_id` (`renter_id`);

--
-- 資料表索引 `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`license`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`motor_license`,`form_num`),
  ADD KEY `form_num` (`form_num`);

--
-- 資料表索引 `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`ID`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`ID`);

--
-- 資料表的 Constraints `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`motor_license`) REFERENCES `motor` (`license`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`form_num`) REFERENCES `form` (`number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
