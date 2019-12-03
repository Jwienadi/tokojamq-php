-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 09:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokojamqfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `alamat_user` varchar(45) NOT NULL,
  `provinsi_user` varchar(45) NOT NULL,
  `kota_user` varchar(45) NOT NULL,
  `kec_user` varchar(45) NOT NULL,
  `kodepos_user` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(20) DEFAULT NULL,
  `no_rek` int(20) DEFAULT NULL,
  `nama_rek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `no_rek`, `nama_rek`) VALUES
(1, 'BCA', 2147483647, 'Melisa Krisnawati'),
(2, 'Mandiri', 2145463531, 'Jessica Wienadi'),
(3, 'BNI', 2142871972, 'Budianto Setiawan');

-- --------------------------------------------------------

--
-- Table structure for table `barang_penjualan`
--

CREATE TABLE `barang_penjualan` (
  `id_barang_penjualan` int(10) NOT NULL,
  `id_transaksi_penjualan` int(11) DEFAULT NULL,
  `product_warna_id` varchar(20) DEFAULT NULL,
  `jumlah_barang` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_penjualan`
--

INSERT INTO `barang_penjualan` (`id_barang_penjualan`, `id_transaksi_penjualan`, `product_warna_id`, `jumlah_barang`, `status`) VALUES
(3, 1, 'pw1', 2, '0'),
(4, 1, 'pw12', 3, '0'),
(11, 1, 'pw2', 2, '0'),
(12, 1, 'pw3', 2, '0'),
(13, 1, 'pw4', 2, '0'),
(14, 1, 'pw5', 2, '0'),
(15, 1, 'pw6', 2, '0'),
(16, 1, 'pw7', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `pengiriman_id` int(10) DEFAULT NULL,
  `no_resi_pengiriman` varchar(20) NOT NULL,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `tanggal_sampai` datetime DEFAULT NULL,
  `biaya_pengiriman` varchar(20) DEFAULT NULL,
  `nama_penerima` varchar(20) DEFAULT NULL,
  `no_telp_penerima` int(10) DEFAULT NULL,
  `alamat_penerima` varchar(50) DEFAULT NULL,
  `kota_penerima` varchar(20) DEFAULT NULL,
  `kodepos_penerima` int(20) DEFAULT NULL,
  `provinsi_penerima` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` varchar(20) NOT NULL,
  `nama_merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`merk_id`, `nama_merk`) VALUES
('m1', 'Pioneer'),
('m2', 'Esti Loren'),
('m3', 'Asako'),
('m4', 'Pagol'),
('m5', 'Edison');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(10) NOT NULL,
  `nama_kurir` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `merk_id` varchar(20) DEFAULT NULL,
  `nama_product` varchar(20) DEFAULT NULL,
  `hpp` varchar(20) DEFAULT NULL,
  `diameter` varchar(20) DEFAULT NULL,
  `tanggal_input` date DEFAULT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `merk_id`, `nama_product`, `hpp`, `diameter`, `tanggal_input`, `harga_jual`, `deskripsi`) VALUES
(1, 'm1', 'DP 2110', '65000', '22', '2019-11-19', '75000', 'lorem ipsum 1'),
(2, 'm1', 'PT 2042', '85000', '24', '2019-11-19', '95000', 'lorem ipsum 2'),
(3, 'm5', 'EDW 11', '55000', '19', '2019-11-27', '65000', 'lorem ipsum 3'),
(4, 'm1', 'PT 2095', '85000', '24', '2019-11-19', '95000', 'lorem ipsum 4'),
(5, 'm1', 'PT 2134', '75000', '22', '2019-11-19', '85000', 'lorem ipsum 5'),
(6, 'm1', 'PT 2132', '80000', '20', '2019-11-19', '90000', 'lorem ipsum 6'),
(7, 'm5', 'EDW 18', '50000', '19', '2019-11-27', '60.000', 'lorem ipsum 7'),
(8, 'm5', 'EDW 30T', '60.000', '20', '2019-11-27', '70000', 'lorem ipsum 8'),
(9, 'm5', 'EDW 24', '65000', '23', '2019-11-27', '75.000', 'lorem ipsum 9'),
(10, 'm4', 'PGW 342', '75000', '24', '2019-11-27', '90000', 'lorem ipsum 10'),
(11, 'm4', 'PGW 371', '80000', '24', '2019-11-27', '95000', 'lorem ipsum 11'),
(12, 'm4', 'PGW 332', '75000', '24', '2019-11-27', '90000', 'lorem ipsum 12'),
(13, 'm4', 'PGW 383', '75000', '25', '2019-11-27', '90000', 'lorem ipsum 13'),
(14, 'm2', 'PT 2043', '65000', '24', '2019-11-20', '75000', 'lorem ipsum 14'),
(15, 'm2', 'HS 2088', '80000', '24', '2019-11-20', '95000', 'lorem ipsum 15'),
(16, 'm5', 'EDW 22', '55000', '21', '2019-11-27', '70000', 'lorem ipsum 16'),
(17, 'm5', 'EDW 33', '60000', '21', '2019-11-27', '75000', 'lorem ipsum 17'),
(18, 'm2', 'HS 2027', '90000', '25', '2019-11-20', '105000', 'lorem ipsum 18'),
(19, 'm2', 'HS 2066', '80000', '25', '2019-11-27', '95000', 'lorem ipsum 19'),
(20, 'm3', 'PT 2103', '50000', '22', '2019-11-26', '65000', 'lorem ipsum 20'),
(21, 'm3', 'PT 2105', '55000', '22', '2019-11-26', '70000', 'lorem ipsum 21');

-- --------------------------------------------------------

--
-- Table structure for table `product_warna`
--

CREATE TABLE `product_warna` (
  `product_warna_id` varchar(20) NOT NULL,
  `warna_id` varchar(20) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `stok` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_warna`
--

INSERT INTO `product_warna` (`product_warna_id`, `warna_id`, `product_id`, `stok`) VALUES
('pw1', 'w1', 1, '10'),
('pw10', 'w5', 6, '5'),
('pw11', 'w2', 4, '5'),
('pw12', 'w4', 2, '3'),
('pw13', 'w7', 4, '2'),
('pw14', 'w5', 14, '2'),
('pw15', 'w6', 15, '4'),
('pw16', 'w9', 14, '5'),
('pw17', 'w5', 15, '5'),
('pw18', 'w6', 18, '2'),
('pw19', 'w10', 14, '8'),
('pw2', 'w2', 2, '5'),
('pw20', 'w10', 20, '3'),
('pw21', 'w2', 21, '5'),
('pw22', 'w9', 20, '5'),
('pw23', 'w4', 20, '5'),
('pw24', 'w7', 20, '2'),
('pw25', 'w2', 3, '7'),
('pw26', 'w11', 3, '7'),
('pw27', 'w5', 3, '4'),
('pw28', 'w12', 3, '4'),
('pw29', 'w6', 3, '8'),
('pw3', 'w3', 1, '7'),
('pw30', 'w2', 7, '6'),
('pw31', 'w11', 7, '6'),
('pw32', 'w5', 7, '6'),
('pw33', 'w4', 7, '3'),
('pw34', 'w1', 8, '5'),
('pw35', 'w10', 9, '8'),
('pw36', 'w9', 9, '6'),
('pw37', 'w5', 10, '2'),
('pw38', 'w6', 10, '2'),
('pw39', 'w10', 11, '3'),
('pw4', 'w4', 4, '7'),
('pw40', 'w5', 11, '2'),
('pw41', 'w5', 12, '2'),
('pw42', 'w6', 12, '2'),
('pw43', 'w5', 13, '4'),
('pw44', 'w2', 16, '3'),
('pw45', 'w4', 16, '3'),
('pw46', 'w7', 16, '3'),
('pw47', 'w2', 17, '6'),
('pw48', 'w6', 17, '6'),
('pw49', 'w5', 17, '6'),
('pw5', 'w5', 5, '5'),
('pw50', 'w5', 19, '8'),
('pw6', 'w6', 6, '12'),
('pw7', 'w7', 2, '9'),
('pw8', 'w8', 4, '11'),
('pw9', 'w9', 5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `kode_promo` varchar(20) NOT NULL,
  `mini_pembelian` varchar(20) DEFAULT NULL,
  `jumlah_promo` int(20) DEFAULT NULL,
  `sistem_promo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi_penjualan` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(45) DEFAULT NULL,
  `no_resi_pengiriman` varchar(45) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `subtotal_transaksi` varchar(45) DEFAULT NULL,
  `total_transaksi` varchar(45) DEFAULT NULL,
  `kode_promo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_transaksi_penjualan`, `user_id`, `bank_id`, `status_pembayaran`, `no_resi_pengiriman`, `tanggal_transaksi`, `subtotal_transaksi`, `total_transaksi`, `kode_promo`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(45) NOT NULL DEFAULT '',
  `first_name` varchar(45) NOT NULL DEFAULT '',
  `last_name` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `phone_number` int(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `first_name`, `last_name`, `password`, `phone_number`, `user_id`) VALUES
('abc@gmail.com', 'abc', 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 123, 1),
('james@gmail.com', 'james', 'wijaya', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2147483647, 2),
('jwienadi@gmail.com', 'jessica', 'wie', '8cb2237d0679ca88db6464eac60da96345513964', 2147483647, 3),
('mkrisnawati01@gmail.com', 'MELISA', 'KRISNAWATI', '65997911608b3c4496b687dfeb0e35af4b97bd76', 1233, 4);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `warna_id` varchar(20) NOT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`warna_id`, `warna`) VALUES
('w1', 'wood'),
('w10', 'Gold'),
('w11', 'Brown'),
('w12', 'Tosca'),
('w2', 'Blue'),
('w3', 'Dark Wood'),
('w4', 'Green'),
('w5', 'Black'),
('w6', 'White'),
('w7', 'Red'),
('w8', 'Orange'),
('w9', 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `product_id` int(20) DEFAULT NULL,
  `wishlist_id` int(20) NOT NULL,
  `jumlah_barang` int(10) DEFAULT NULL,
  `harga_jual` int(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `barang_penjualan`
--
ALTER TABLE `barang_penjualan`
  ADD PRIMARY KEY (`id_barang_penjualan`),
  ADD KEY `id_transaksi_penjualan` (`id_transaksi_penjualan`),
  ADD KEY `product_warna_id` (`product_warna_id`);

--
-- Indexes for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`no_resi_pengiriman`),
  ADD KEY `pengiriman_id` (`pengiriman_id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `merk_id` (`merk_id`);

--
-- Indexes for table `product_warna`
--
ALTER TABLE `product_warna`
  ADD PRIMARY KEY (`product_warna_id`),
  ADD KEY `warna_id` (`warna_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`kode_promo`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi_penjualan`),
  ADD KEY `email` (`user_id`),
  ADD KEY `no_resi_pengiriman` (`no_resi_pengiriman`),
  ADD KEY `kode_promo` (`kode_promo`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_penjualan`
--
ALTER TABLE `barang_penjualan`
  MODIFY `id_barang_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_transaksi_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_penjualan`
--
ALTER TABLE `barang_penjualan`
  ADD CONSTRAINT `barang_penjualan_ibfk_1` FOREIGN KEY (`id_transaksi_penjualan`) REFERENCES `transaksi_penjualan` (`id_transaksi_penjualan`),
  ADD CONSTRAINT `barang_penjualan_ibfk_2` FOREIGN KEY (`product_warna_id`) REFERENCES `product_warna` (`product_warna_id`);

--
-- Constraints for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_ibfk_1` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`pengiriman_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`merk_id`);

--
-- Constraints for table `product_warna`
--
ALTER TABLE `product_warna`
  ADD CONSTRAINT `product_warna_ibfk_1` FOREIGN KEY (`warna_id`) REFERENCES `warna` (`warna_id`),
  ADD CONSTRAINT `product_warna_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_2` FOREIGN KEY (`no_resi_pengiriman`) REFERENCES `detail_pengiriman` (`no_resi_pengiriman`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_3` FOREIGN KEY (`kode_promo`) REFERENCES `promo_code` (`kode_promo`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
