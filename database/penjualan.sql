-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 01:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KdBarang` varchar(5) NOT NULL,
  `NamaBarang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KdBarang`, `NamaBarang`) VALUES
('B1', 'Barang 1'),
('B2', 'Barang 2'),
('B3', 'Barang 3');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `NoFaktur` int(5) NOT NULL,
  `KdBarang` varchar(5) NOT NULL,
  `Qty` int(10) NOT NULL,
  `HargaSatuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`NoFaktur`, `KdBarang`, `Qty`, `HargaSatuan`) VALUES
(1, 'B1', 1, 1000),
(1, 'B2', 1, 1500),
(2, 'B2', 2, 1500),
(3, 'B1', 1, 1000),
(3, 'B3', 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_header`
--

CREATE TABLE `penjualan_header` (
  `NoFaktur` int(5) NOT NULL,
  `Tanggal` date NOT NULL,
  `KdToko` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_header`
--

INSERT INTO `penjualan_header` (`NoFaktur`, `Tanggal`, `KdToko`) VALUES
(1, '2018-01-01', 'A'),
(2, '2018-01-01', 'B'),
(3, '2018-01-02', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `KdToko` varchar(5) NOT NULL,
  `NamaToko` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`KdToko`, `NamaToko`) VALUES
('A', 'Toko A'),
('B', 'Toko B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan_header`
--
ALTER TABLE `penjualan_header`
  ADD PRIMARY KEY (`NoFaktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
