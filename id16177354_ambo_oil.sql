-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2022 at 10:53 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16177354_ambo_oil`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `UOM` varchar(100) NOT NULL,
  `opening_stock` varchar(100) NOT NULL,
  `received` varchar(100) NOT NULL,
  `supplied` varchar(100) NOT NULL,
  `physical_stock` varchar(10000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_name`, `UOM`, `opening_stock`, `received`, `supplied`, `physical_stock`, `date`) VALUES
(1, 'XL super', 'kg', '12x1L', '100', '30', '70', '2020-09-04'),
(2, 'superduty C3 40', 'kg', '4x4L', '304', '50', '254', '2020-09-04'),
(5, 'oluem super', 'kg', '200L', '100', '29', '71', '2020-09-05'),
(6, 'superduty C3 40', 'kg', '4x4L', '140', '99', '41', '2020-09-08'),
(7, 'oluem super', 'kg', '200L', '100', '29', '71', '2020-09-05'),
(8, 'oluem super', 'kg', '200L', '100', '29', '71', '2020-09-05'),
(9, 'ATF DEX III', 'kg', 'BULK', '100', '99', '49', '2020-09-05'),
(10, 'oluem syn', 'kg', '200L', '46', '34', '12', '2020-09-05'),
(11, 'oluem 4TX', 'kg', '12x1L', '76', '34', '42', '2020-09-05'),
(12, 'brake fluid dot 3', 'kg', '12x4L', '932', '232', '700', '2020-09-05'),
(13, 'oluem syn', 'kg', '200L', '1000', '234', '766', '2020-09-08'),
(14, 'Oluem SYN', 'kg', '10 cans', '46', '29', '17', '2020-09-08'),
(15, 'oluem syn', 'kg', '23L', '40', '30', '10', '2020-09-08'),
(16, 'oluem syn', 'kg', '10 cans', '50', '232', '182', '2020-09-08'),
(17, 'oluem syn', 'kg', '4x5l', '304', '232', '72', '2020-09-08'),
(18, 'ATF DEX II', 'kg', '200L', '46', '232', '186', '2020-09-08'),
(19, 'oluem super', 'carton', '10', '51', '5', '46', '2020-09-09'),
(20, 'oluem syn', 'kg', '4x4l', '100', '40', '60', '2020-09-09'),
(21, 'oluem sl', '4x4l', '363', '282', '73', '572', '2020-09-10'),
(22, 'oluem sl', '12x1l', '283', '31', '42', '272', '2020-09-10'),
(23, 'oluem sl', '4x4l', '10', '5', '10', '5', '2020-09-10'),
(24, 'oluem sl ', '4x4l', '5', '56', '8', '53', '2020-09-10'),
(25, 'Oluem SL', '200L', '129', '10', '21', '118', '2020-09-10'),
(26, 'XL  Super 20W/50', '200L', '18', '0', '8', '10', '2020-09-10'),
(27, 'XL Super 20W/50', '200l', '19', '0', '8', '11', '2020-09-10'),
(28, 'superduty hd 41', '4x4l', '20', '2', '10', '12', '2020-09-10'),
(29, 'oluem super 43', 'BULK', '20', '98', '62', '56', '2020-09-20'),
(30, 'Superduty C3 15W/40 (CI4)', '25l', '64', '20', '15', '69', '2020-09-20'),
(31, 'oluem xl', '4x4l', '50', '120', '87', '83', '2020-10-04'),
(32, 'oluem super 40', '25l', '89', '11', '45', '55', '2020-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_list`
--

CREATE TABLE `inventory_list` (
  `id` int(50) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `pack_size` varchar(11) DEFAULT NULL,
  `low_point` int(11) DEFAULT NULL,
  `physical_stock` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_list`
--

INSERT INTO `inventory_list` (`id`, `product`, `pack_size`, `low_point`, `physical_stock`) VALUES
(1, 'Oluem SYN', '200L', 30, '182'),
(2, 'Oluem SYN', '4X5L', 38, '72'),
(3, 'Oluem SYN', '4X4L', 12, '60'),
(4, 'Oluem SYN', '12X1L', 68, '182'),
(5, 'Oluem SL', '4X4L', 12, '53'),
(6, 'Oluem SL', '12X1L', 12, '272'),
(7, 'Oluem SL', '200L', 21, '118'),
(8, 'Oluem XL', '4X4L', 12, '83'),
(9, 'XL Super 20W/50', '200L', 12, '11'),
(10, 'Oluem Super 40', '25L', 12, '55'),
(11, 'Oluem Super 41', '4X4L', 12, ''),
(12, 'Oluem Super 42', '12X1L', 12, ''),
(13, 'Oluem Super 43', 'BULK', 12, '56'),
(14, 'Superduty C3 15W/40 (CI4)', '25L', 12, '69'),
(15, 'Superduty C3 15W/40 (CI4)', '200L', 12, ''),
(16, 'Superduty C3 15W/40 (CI4)', 'BULK', 12, ''),
(17, 'Superduty C3 15W/40 (CH4)', '25L', 12, ''),
(18, 'Superduty C3 15W/40 (CH4)', '200L', 76, ''),
(19, 'Superduty C3 15W/40 (CH4)', 'BULK', 12, ''),
(20, 'Superduty C3 15W/40 (CF4)', '25L', 12, ''),
(21, 'Superduty C3 15W/40 (CF4)', '200L', 12, ''),
(22, 'Superduty C3 15W/40 (CF4)', 'BULK', 12, ''),
(23, 'Superduty  C3 10W CD/SF', '200L', 12, ''),
(24, 'Superduty  C3 10W CD/SF', 'BULK', 12, ''),
(25, 'Superduty C3 40', '4X4L', 12, '254'),
(26, 'Superduty C3 41', '25L', 12, ''),
(27, 'Superduty C3 42', '200L', 12, ''),
(28, 'Superduty C3 43', 'BULK', 12, ''),
(29, 'Superduty HD 40', '200L', 12, ''),
(30, 'Superduty HD 41', '4X4L', 12, '12'),
(31, 'Superduty HD 42', '25L', 12, ''),
(32, 'Superduty HD 43', 'BULK', 12, ''),
(33, 'Oluem 4TX', '12X1L', 12, ''),
(34, 'Motorcycle oil', '12X1L', 12, ''),
(35, 'ATF DEX II', '12X1L', 12, ''),
(36, 'ATF DEX II', '4X4L', 12, ''),
(37, 'ATF DEX II', '200L', 12, '186'),
(38, 'ATF DEX II', 'BULK', 12, ''),
(39, 'ATF DEX III', '12X1L', 12, ''),
(40, 'ATF DEX III', '4X4L', 12, ''),
(41, 'ATF DEX III', '200L', 12, ''),
(42, 'Brake fluid dot 3', '20X0.5L', 12, ''),
(43, 'Brake fluid dot 4', '20X0.5L', 12, ''),
(44, NULL, NULL, 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_products`
--

CREATE TABLE `outstanding_products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `UOM` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outstanding_products`
--

INSERT INTO `outstanding_products` (`id`, `product_name`, `UOM`, `quantity`, `amount`, `supplier`, `date`) VALUES
(1, 'ATF DEX III', 'kg', '10 cans', '#80000', 'tonero', '2020-08-31'),
(3, 'oluem super', 'kg', '10 cans', '#30000', 'franco', '2020-09-03'),
(6, 'hydraulic', 'kg', '5 cans', '#5000', 'muritz', '2020-09-03'),
(7, 'hydraulic', 'kg', '50 cans', '#30000', 'muritz', '2020-09-04'),
(8, 'oluem syn', 'kg', '68 cans', '#30000', 'muritz', '2020-09-03'),
(14, 'oluem hydraulic', 'kg', '10 cans', '#10000', 'abuguja patience', '2020-09-03'),
(15, 'oluem super', 'kg', '10 cans', '#10000', 'abuguja patience', '2020-09-03'),
(16, 'hydraulic', 'kg', '10 cans', '#50000', 'tonero', '2020-09-03'),
(18, 'oluem super', '12x1L', '5 cans', '#10000', 'franco', '2020-09-14'),
(19, 'oluem super', '12x1L', '0', '#0', 'franco', '2020-09-17'),
(21, 'oluem super', '12x1L', '1', '#38', 'franco', '2021-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `PRODUCT` varchar(157) NOT NULL,
  `PACK_SIZE` varchar(7) NOT NULL,
  `OMP/CSP` varchar(7) NOT NULL,
  `OMP/CSP_UNIT` varchar(7) NOT NULL,
  `Retail_DSP` varchar(7) NOT NULL,
  `Retail_DSP_UNIT` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `PRODUCT`, `PACK_SIZE`, `OMP/CSP`, `OMP/CSP_UNIT`, `Retail_DSP`, `Retail_DSP_UNIT`) VALUES
(2, ' PASSENGER CAR MOTOR OILS (for PETORL or DIESEL CARS, LIGHT COMMERCIAL VEHICLES & 4WDs)', '', '', '', '', ''),
(3, 'Oluem SYN', '200L', '450,000', '450,000', '423,000', '423,000'),
(4, '', '4X5L', '58,000', '14,500', '55,520', '13,880'),
(5, '', '4X4L', '44,000', '11,000', '42,160', '10,540'),
(6, '', '12X1L', '36,000', '3,000', '34,440', '2,870'),
(7, 'Oluem SL', '4X4L', '18,000', '4,500', '17,160', '4,290'),
(8, '', '12X1L', '15,600', '1,300', '14,844', '1,237'),
(9, '', '200L', '180,000', '180,000', '169,200', '169,200'),
(10, 'Oluem XL', '4X4L', '15,200', '3,800', '14,528', '3,632'),
(11, 'XL Super 20W/50', '200L', '168,000', '168,000', '157,920', '157,920'),
(12, 'Oluem Super 40', '25L', '16,500', '16,500', '15,510', '15,510'),
(13, '', '4X4L', '12,200', '3,050', '11,468', '2,867'),
(14, '', '12X1L', '9,840', '820', '9,310', '776'),
(15, '', 'BULK', '660', '660', '620', '620'),
(16, ' HEAVY DUTY DIESEL ENGINE OILS (for DIESEL VANS, TRUCKS, AGRICULTURAL EQUIPMENT & GENERATORS)', '', '', '', '', ''),
(17, 'Superduty C3 15W/40 (CI4)', '25L', '22,500', '22,500', '21,150', '21,150'),
(18, '', '200L', '179,000', '179,000', '168,260', '168,260'),
(19, '', 'BULK', '800', '800', '752', '752'),
(20, 'Superduty C3 15W/40 (CH4)', '25L', '20,500', '20,500', '19,270', '19,270'),
(21, '', '200L', '160,000', '160,000', '150,400', '150,400'),
(22, '', 'BULK', '755', '755', '710', '710'),
(23, 'Superduty C3 15W/40 (CF4)', '25L', '20,500', '20,500', '19,270', '19,270'),
(24, '', '200L', '165,000', '165,000', '155,100', '155,100'),
(25, '', 'BULK', '750', '750', '705', '705'),
(26, 'Superduty  C3 10W CD/SF', '200L', '130,000', '130,000', '126,100', '126,100'),
(27, '', 'BULK', '570', '570', '553', '553'),
(28, 'Superduty C3 40', '4X4L', '14,400', '3,600', '13,616', '3,404'),
(29, '', '25L', '19,250', '19,250', '18,220', '18,220'),
(30, '', '200L', '148,000', '148,000', '139,120', '139,120'),
(31, '', 'BULK', '700', '700', '658', '658'),
(32, 'Superduty HD 40', '200L', '138,000', '138,000', '129,720', '129,720'),
(33, '', '4X4L', '12,300', '3,075', '11,519', '2,880'),
(34, '', '25L', '16,800', '16,800', '15,917', '15,917'),
(35, '', 'BULK', '700', '655', '616', '616'),
(36, 'POWER BIKES, MOTORCYCLES & TRICYCLES', '', '', '', '', ''),
(37, 'Oluem 4TX', '12X1L', '12,500', '1,042', '11,750', '979'),
(38, 'Motorcycle oil', '12X1L', '11,000', '917', '10,340', '862'),
(39, ' AUTOMOTIVE TRANSMISSON OILS', '', '', '', '', ''),
(40, 'ATF DEX II', '12X1L', '13,200', '1,100', '12,588', '1,049'),
(41, '', '4X4L', '16,000', '4,000', '15,280', '3,820'),
(42, '', '200L', '168,000', '168,000', '157,920', '157,920'),
(43, '', 'BULK', '800', '800', '752', '752'),
(44, 'ATF DEX III', '12X1L', '16,800', '1,400', '15,972', '1,331'),
(45, '', '4X4L', '20,800', '5,200', '19,792', '4,948'),
(46, '', '200L', '250,000', '250,000', '235,000', '235,000'),
(47, 'Brake fluid dot 3', '20X0.5L', '16,000', '800', '15,520', '776'),
(48, 'Brake fluid dot 4', '20X0.5L', '18,000', '900', '17,460', '873');

-- --------------------------------------------------------

--
-- Table structure for table `received_stock`
--

CREATE TABLE `received_stock` (
  `id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `UOM` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `received_stock`
--

INSERT INTO `received_stock` (`id`, `product_name`, `UOM`, `supplier`, `amount`, `quantity`, `date`) VALUES
(1, 'oluem super', 'kg', 'amaka', '#10000', '10 cans', '0000-00-00 00:00:00'),
(2, 'oluem super', 'kg', 'amaka', '#30000', '50 cans', '2020-08-11 00:00:00'),
(3, 'oluem super', 'kg', 'nonso', '#80000', '68 cans', '0000-00-00 00:00:00'),
(4, 'oluem hydraulic', 'kg', 'meche', '#50000', '9 drums', '2020-08-25 15:20:30'),
(5, 'oluem hydraulic', 'kg', 'ozo', '#10000', '9 drums', '2020-08-27 00:00:00'),
(6, 'oluem super', 'kg', 'meche', '#80000', '68 cans', '2020-08-27 00:00:00'),
(7, 'oluem super', 'kg', 'meche', '#80000', '10 cans', '2020-08-27 00:00:00'),
(8, 'oluem hydraulic', 'kg', 'amaka', '#50000', '23L', '2020-08-27 00:00:00'),
(9, 'oluem super', 'kg', 'meche', '#30000', '23L', '0000-00-00 00:00:00'),
(10, 'oluem super', 'kg', 'meche', '#30000', '23L', '0000-00-00 00:00:00'),
(11, 'oluem super', 'kg', 'ozo', '#50000', '50 cans', '2020-08-27 00:00:00'),
(12, 'oluem super', 'kg', 'nwankwo', '#80000', '10 cans', '2020-08-27 00:00:00'),
(13, 'oluem hydraulic', 'kg', 'nwankwo', '#80000', '23L', '2020-08-27 00:00:00'),
(14, 'oluem super', 'kg', 'meche', '#50000', '9 drums', '2020-08-27 00:00:00'),
(15, 'XL super', 'kg', 'abuguja patience', '#80000', '23L', '2020-09-03 00:00:00'),
(16, 'ATF DEX III', 'kg', 'muritz', '#10000', '9 drums', '2020-09-03 00:00:00'),
(17, 'Oluem super ', '25l', 'Tony', '15000', '200 litres', '2021-02-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplied_stock`
--

CREATE TABLE `supplied_stock` (
  `id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `UOM` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplied_stock`
--

INSERT INTO `supplied_stock` (`id`, `product_name`, `UOM`, `customer_name`, `amount`, `quantity`, `date`) VALUES
(1, 'oluem syn', 'kg', 'meche', '#50000', '10 cans', '2020-08-28 00:00:00'),
(2, 'oluem super', 'kg', 'franco', '#30000', '10 cans', '2020-08-28 00:00:00'),
(3, 'oluem super', 'kg', 'abuguja patience', '#10000', '68 cans', '2020-08-28 00:00:00'),
(4, 'hydraulic', 'kg', 'tonero', '#80000', '10 cans', '2020-08-28 00:00:00'),
(5, 'oluem super', 'kg', 'abuguja patience', '#30000', '10 cans', '2020-08-28 00:00:00'),
(6, 'XL super', 'kg', 'abuguja patience', '#50000', '50 cans', '2020-09-03 00:00:00'),
(7, 'superduty C3 40', 'BULK', 'mr. a-z', '3923', '200L', '2020-09-20 00:00:00'),
(8, 'Dcgg', 'Fggg', 'Xfff', '3445', '23', '2022-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstName`, `lastName`, `status`) VALUES
(1, 'admin', 'iabuguqa@gmail.com', '$2y$10$oma17Cx/uWf1teRiNjlaQe8oK0rU6W9LKxRJbCGBlTAYJsKAYOhOS', 'Maurice', 'Abuguja', 'admin'),
(4, 'ada', 'iabuguqa@gmail.com', '$2y$10$LUjKKX3Rgpke.8qVVf1cF.8vlpaHlDoW7oUoqkDyGkZd1i4bqpDz6', 'Ada', 'Eze', 'user'),
(5, 'iseeisaw', 'iseesnakeaqwo@gmail.com', '$2y$10$Ush6AAHYnOEH7uT1wyVk4OEJ80uWgZSPcyDg93HtGFYIExmJH3JBu', 'Isee', 'Isaw', 'user'),
(6, 'Hamis', 'contact@hamisahmed.com', '$2y$10$v/eBhF7IrvYiXzyQ9N1rT.VB53381qXiNWvbZznJCg8q1a7BR.PPm', 'Hamis', 'Ahmed', 'user'),
(7, 'CharlesEkubz', 'charleswakili797@gmail.com', '$2y$10$UUG/osJyY5.95wd1Z5G4UuC31Wpa9wY606HYevHULLG6maxIWP1cu', 'Charles', 'Ekube', 'user'),
(8, 'Mikey', 'cesarvelliconnections@gmail.com', '$2y$10$oLt.PuUqAEK/JJGmywjlqenM6KTOOiJl8cDnYwZK78P.LhHeAqc2a', 'Mike', 'Angelo', 'user'),
(9, 'Collins', 'yingzibillionz@gmail.con', '$2y$10$KPTrMXRuZ46sKTXPeSAx5eYO82puTmJTgyrbpK6S6NHe0Vq2O3OKm', 'Ekene', 'Ekene', 'user'),
(10, 'Ayougwu', 'Dypernest@gmail.com', '$2y$10$kx7QrhZ0F9s3fycfW502hOhOHWMBRc0s5HsY1.tmQ3gu.18D0VU0q', 'Ernest', 'Ugwu', 'user'),
(11, 'Bryanzu', 'bryannuel008@gmail.com', '$2y$10$tLKWEKDkONpKyV5yNQzMCO1uHuGo6QZUV8lSEpP4YVMR9/Ryf1LXW', 'Izuchukwu', 'Akpeh', 'user'),
(12, 'TeeCee360', 'emehemmanuel1@gmail.com', '$2y$10$mF3CP6Apt080RPeeVxTRfuqvhNdkjD0sEMquMHWmKRWb7QKoov8Wm', 'Tochukwu', 'Emeh', 'user'),
(13, 'hehehe', 'leroynnalue65@gmail.com', '$2y$10$dG3vSLA6DO3FjQ23apZBBOzkPyhS1o4ppdCpxDO2785ePKiE52Fl2', 'Som', 'Tom', 'user'),
(14, 'zipej', 'zasymone@mailinator.com', '$2y$10$NRbVWYwpVAfjwSMWn3ZewuMAomYMWfakDGlo/R86vQ3VinsS41my.', 'Vance', 'Shelton', 'user'),
(15, 'zypiqevun', 'jumeh@mailinator.com', '$2y$10$AUxMgDdNqm6creascuI.XufjcdBm24g7kTN0dWX9e/RogpbTyum3a', 'Harper', 'Alexander', 'user'),
(16, 'jitimy', 'xaxan@mailinator.com', '$2y$10$/X8G/BYlu3WvmEHHnEuGt.l0bhYHZednxVxmk8aFZ7tfgVrbvGfku', 'Vladimir', 'Kelley', 'user'),
(17, 'Profjay', 'jeremiahakintomide22@gmail.com', '$2y$10$tDWWxVpPZp5JBLSFHyMNB.pe7w0I56wqhW.MnwyvoKg3ONUpp6MH2', 'JEREMIAH', 'Akintomide', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_list`
--
ALTER TABLE `inventory_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outstanding_products`
--
ALTER TABLE `outstanding_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `received_stock`
--
ALTER TABLE `received_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplied_stock`
--
ALTER TABLE `supplied_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `inventory_list`
--
ALTER TABLE `inventory_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `outstanding_products`
--
ALTER TABLE `outstanding_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `received_stock`
--
ALTER TABLE `received_stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplied_stock`
--
ALTER TABLE `supplied_stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
