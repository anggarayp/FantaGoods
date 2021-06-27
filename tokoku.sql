-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 05:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kode_produk` char(3) NOT NULL,
  `jml_beli` mediumint(9) NOT NULL,
  `keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tbl_detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tbl_detail_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET tbl_produk.jml_beli=tbl_produk.jml_beli-new.jml_beli WHERE tbl_produk.kode_produk=new.kode_produk;	
    end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `id_inbox` int(11) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(150) NOT NULL,
  `waktu_kirim` datetime NOT NULL,
  `isi_pesan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `id_pembelian` int(11) NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `email` varchar(200) NOT NULL,
  `status_pembelian` enum('selesai','pending') NOT NULL DEFAULT 'pending',
  `rek_tujuan` tinyint(4) NOT NULL,
  `jasa_kurir` tinyint(4) NOT NULL,
  `alamat_tujuan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kode_produk` char(3) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_beli` mediumint(9) NOT NULL,
  `harga_jual` mediumint(9) NOT NULL,
  `jml_beli` mediumint(9) NOT NULL,
  `photo_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `nama_produk`, `merk`, `tgl_beli`, `harga_beli`, `harga_jual`, `jml_beli`, `photo_produk`) VALUES
('1', 'Kail Pancing', 'Daiichi', '2021-06-26', 15000, 25000, 25, '1.jpeg'),
('2', 'Tali pancing', 'Trilene', '2021-06-18', 10000, 15000, 35, '2.jpg'),
('3', 'Reel Pancing', 'Shimano', '2021-06-24', 55000, 75000, 10, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `email` varchar(200) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `password` char(32) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `level` enum('administrator','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`email`, `nama_lengkap`, `password`, `alamat`, `handphone`, `waktu_daftar`, `level`) VALUES
('admin@admin.com', 'Fajar Baskoro', '202cb962ac59075b964b07152d234b70', 'Surabaya', '', '2019-01-12 04:59:35', 'administrator'),
('anggaga@gmail.com', 'Anggara', 'e10adc3949ba59abbe56e057f20f883e', 'Surabaya', '', '2021-06-27 17:52:34', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
