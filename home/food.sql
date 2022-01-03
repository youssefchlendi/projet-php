-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2022 at 01:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `email`, `password`, `user`) VALUES
(1, 'youssef.chlendi@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `productId`, `clientId`, `orderId`, `quantity`) VALUES
(70, 12, 12, 41, 1),
(71, 12, 12, 42, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`, `description`) VALUES
(1, 'Burger', 'burgers'),
(2, 'Pizza', 'pasta'),
(3, 'Pasta', 'pasta'),
(13, 'Fries', 'Fries');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `statu` int(2) NOT NULL DEFAULT 0,
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `recovery` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `name`, `email`, `phone`, `password`, `adresse`, `statu`, `email_verification_link`, `email_verified_at`, `recovery`) VALUES
(11, 'youssef', 'youssef.chlendi@gmail.com', 22079448, 'b10c45a5c10400908d3e71f89ce62353', 'av', 1, 'b10c45a5c10400908d3e71f89ce623536110', '2021-12-04 15:09:02', NULL),
(12, 'test', 'ych.org@gmail.com', 22079448, '25d55ad283aa400af464c76d713c07ad', 'ych.org@gmail.com', 1, 'e48ac8832c69380105ae2fdcc36c45e31565', '2021-12-10 18:08:56', NULL),
(15, 'Mohamed Youssef chlendi', 'mohamedyoussefchlendi@bizerte.r-iset.tn', 22079448, '25d55ad283aa400af464c76d713c07ad', 'Av sakiet sidi youssef, km+1,5', 0, '61abb57fba691e156edf9ed8f6421c219445', NULL, NULL),
(16, 'Mohamed Youssef chlendi', 'youssefchlendi@ieee.org', 22079448, 'dd4b21e9ef71e1291183a46b913ae6f2', 'Av sakiet sidi youssef, km+1,5', 1, '7bbece8cece66b02d058b1633b48b99c8737', '2021-12-19 15:31:43', NULL),
(17, 'Raed', 'raed.charrad91@gmail.com', 54575220, 'c5923359276bb1daabc74465db0b6726', 'Zarzis', 1, 'a8d5516c3e83b8bfad18acd5ceb974d43168', '2021-12-19 15:39:09', NULL),
(18, 'Hani Riguene', 'hani.riguene2@gmail.com', 54861215, '827ccb0eea8a706c4c34a16891f84e7b', 'Route Tunis km 2.5', 1, 'c7c01823726105f342ffeaeacc25bde87344', '2021-12-24 15:09:07', NULL),
(19, 'mourad boussa', 'mourad.boisss@gmail.com', 56242989, 'ed3e82e25ea33625db59cc46cd20368e', '4144 mouensa sahbi', 1, 'ed3e82e25ea33625db59cc46cd20368e1401', '2021-12-25 11:35:03', NULL),
(20, 'fatma belhiba', 'fatma.belhibaa@gmail.com', 12345678, '7f59c6439e12a59cad47f1266cb69ac3', 'av sakiet sidi youssef', 1, '7f59c6439e12a59cad47f1266cb69ac3311', '2021-12-26 11:38:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `approved` int(11) DEFAULT 0,
  `adminId` int(11) DEFAULT NULL,
  `approvalDate` datetime DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `clientId`, `approved`, `adminId`, `approvalDate`, `orderDate`) VALUES
(42, 12, 1, NULL, '2022-01-03 00:22:04', '2022-01-02 23:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `name`, `description`, `price`, `image`, `category`) VALUES
(12, 'pizza', '123', 1, 'o2.jpg', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;