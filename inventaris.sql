-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2014 at 01:14 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE IF NOT EXISTS `alat` (
  `kd_alat` int(11) NOT NULL AUTO_INCREMENT,
  `label_alat` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `kd_kategori` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `kd_pembuat` int(11) NOT NULL,
  `thn_buat` int(4) NOT NULL,
  PRIMARY KEY (`kd_alat`),
  KEY `kategori_alat` (`kd_kategori`),
  KEY `nama_pembuat` (`kd_pembuat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`kd_alat`, `label_alat`, `model`, `kd_kategori`, `merk`, `kd_pembuat`, `thn_buat`) VALUES
(3, 'spidol', 'BG-2', 1, 'snowman', 1, 2010),
(2, 'Samsung Galaxy Y', 'GT530SO', 1, 'Samsung', 1, 2010),
(4, 'spidol', 'BG-2', 4, 'snowwhite', 1, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `detail_inventaris`
--

CREATE TABLE IF NOT EXISTS `detail_inventaris` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kd_inventaris` char(30) NOT NULL,
  `kd_alat` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_inventaris` (`kd_inventaris`),
  KEY `label_alat` (`kd_alat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detail_inventaris`
--

INSERT INTO `detail_inventaris` (`id`, `kd_inventaris`, `kd_alat`, `status`) VALUES
(1, 'P001', 1, 1),
(2, 'P002', 2, 1),
(3, 'P003', 2, 1),
(4, 'P002', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `kd_inventaris` char(30) NOT NULL,
  `kd_karyawan` int(11) NOT NULL,
  `kd_petugas` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  PRIMARY KEY (`kd_inventaris`),
  KEY `inven_karyawan` (`kd_karyawan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`kd_inventaris`, `kd_karyawan`, `kd_petugas`, `tgl_pinjam`) VALUES
('P001', 1, 1, '2014-02-23'),
('P002', 1, 1, '2014-02-18'),
('P003', 1, 1, '2014-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kd_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tlp` char(12) NOT NULL,
  PRIMARY KEY (`kd_karyawan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kd_karyawan`, `status`, `nama_karyawan`, `ruang`, `tgl_daftar`, `jenis_kelamin`, `alamat`, `tlp`) VALUES
(1, 'Operator', 'Titin', '3', '2014-02-23', 'P', 'aaaa', '0989878'),
(2, 'Operator', 'ucok', '4', '2014-02-10', 'L', 'aaaaaaaa', '0089767');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_alat` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `kategori_alat`) VALUES
(2, 'Kendaraan'),
(3, 'Handphone');

-- --------------------------------------------------------

--
-- Table structure for table `pembuat`
--

CREATE TABLE IF NOT EXISTS `pembuat` (
  `kd_pembuat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pembuat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_pembuat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pembuat`
--

INSERT INTO `pembuat` (`kd_pembuat`, `nama_pembuat`, `kota`) VALUES
(1, 'Snowman', 'Jakarta'),
(2, 'Samsung', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kd_inventaris` char(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kd_alat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `label_alat` (`kd_alat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `kd_inventaris`, `tgl_kembali`, `kd_alat`) VALUES
(1, 'P001', '2014-02-23', 0),
(2, 'P001', '2014-02-23', 1),
(3, 'P001', '2014-02-23', 1),
(4, 'P001', '2014-02-23', 1),
(5, 'P002', '2014-02-23', 2),
(6, 'P003', '2014-02-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `kd_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tlp` char(12) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`kd_petugas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nama_petugas`, `jenis_kelamin`, `alamat`, `tlp`, `user`, `password`, `hak_akses`) VALUES
(1, 'siti', 'P', 'margaasih', '089662090945', 'siti', '1234', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
