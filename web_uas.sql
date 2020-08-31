-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2020 at 02:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `jeniskelamin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `alamat`, `telepon`, `level`, `jeniskelamin`) VALUES
('amelsa', 'a74e3e125678f45523ade1b5305aa390', 'ayumelatisuka@gmail.com', 'Ngawi', '085145236789', 'Admin', 'Admin'),
('Elsava Rama', 'b7484cfec70fac652067d88d7bb3c21a', 'elsavaramahesselmahesa@gmail.com', 'Magetan', '082356789123', 'Pengguna', 'Pengguna'),
('ika', '7965c82127bd8517d2495e8efb12702c', 'ika@gmail.com', 'Sumenep', '085331348196', 'Pengguna', 'Admin'),
('laila99', '861924d0ab71292f993f6e00b39974b4', 'ilakk@gmail.com', 'Blitar', '085331348196', 'Admin', 'Pengguna'),
('nurul', '6968a2c57c3a4fee8fadc79a80355e4d', 'nurul@gmail.com', 'Medan', '085145236789', 'Pengguna', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `kd_art` int(11) NOT NULL,
  `nama_art` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`kd_art`, `nama_art`, `harga`, `stok`, `gambar`) VALUES
(1, 'Rotan Chair', 800000, 9, 'feature_3.png'),
(2, 'Single Sofa Mini', 500000, 122, 'offer_img.png'),
(3, 'Etnich Chair', 300000, 300, 'product_4.png'),
(4, 'Chair Matt Colour', 300000, 153, 'product_5.png'),
(5, 'Storages Box', 100000, 199, 'produk1.jpg'),
(6, 'Shelving Storages', 400000, 97, 'produk2.png'),
(7, 'Pillows', 75000, 98, 'produk3.jpg'),
(8, 'Living Room Tables', 800000, 196, 'range.jpg'),
(9, 'Alat Saji', 400000, 99, 'produk5.jpeg'),
(10, 'Rak Buku', 350000, 297, 'produk6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kd_pembelian` int(11) NOT NULL,
  `kd_art` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `jumlah` varchar(20) DEFAULT NULL,
  `jenis_tf` varchar(50) DEFAULT NULL,
  `total_harga` varchar(100) NOT NULL,
  `status` enum('lunas','belum_lunas','disabled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kd_pembelian`, `kd_art`, `username`, `jumlah`, `jenis_tf`, `total_harga`, `status`) VALUES
(2, 1, 'ika', '2', 'transfer', '200000', 'disabled'),
(5, 7, 'ika', '1', 'tunai', '75000', 'lunas'),
(8, 8, 'ika', '1', 'tunai', '800000', 'disabled'),
(9, 6, 'ika', '1', 'tunai', '1200000', 'disabled'),
(10, 8, 'ika', '1', 'tunai', '800000', 'disabled'),
(11, 4, 'nurul', '1', 'tunai', '300000', 'disabled'),
(12, 9, 'nurul', '1', 'tunai', '700000', 'disabled'),
(13, 5, 'nurul', '1', 'tunai', '800000', 'disabled'),
(14, 6, 'nurul', '1', 'transfer', '400000', 'lunas'),
(15, 2, 'nurul', '1', 'tunai', '500000', 'lunas'),
(16, 6, 'Elsava Rama', '1', 'transfer', '400000', 'disabled'),
(17, 10, 'Elsava Rama', '1', 'transfer', '750000', 'disabled'),
(19, 10, 'Elsava Rama', '1', 'transfer', '350000', 'disabled'),
(20, 10, 'Elsava Rama', '1', 'transfer', '350000', 'belum_lunas');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `pembelian_before_insert` BEFORE INSERT ON `pembelian` FOR EACH ROW UPDATE art 
SET stok=stok - NEW.jumlah
WHERE kd_art=new.kd_art
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_all`
-- (See below for the actual view)
--
CREATE TABLE `view_all` (
`kd_pembelian` int(11)
,`username` varchar(50)
,`jumlah` varchar(20)
,`jenis_tf` varchar(50)
,`total_harga` varchar(100)
,`status` enum('lunas','belum_lunas','disabled')
,`nama_art` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_all`
--
DROP TABLE IF EXISTS `view_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all`  AS  select `pembelian`.`kd_pembelian` AS `kd_pembelian`,`pembelian`.`username` AS `username`,`pembelian`.`jumlah` AS `jumlah`,`pembelian`.`jenis_tf` AS `jenis_tf`,`pembelian`.`total_harga` AS `total_harga`,`pembelian`.`status` AS `status`,`art`.`nama_art` AS `nama_art` from (`pembelian` join `art` on((`art`.`kd_art` = `pembelian`.`kd_art`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`kd_art`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kd_pembelian`),
  ADD KEY `FK_pembelian_art` (`kd_art`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `kd_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kd_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_pembelian_art` FOREIGN KEY (`kd_art`) REFERENCES `art` (`kd_art`),
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `check_pembelian` ON SCHEDULE EVERY 10 HOUR STARTS '2020-04-22 23:21:11' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE pembelian SET pembelian.status = "disabled" WHERE pembelian.status ="belum_lunas"$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
