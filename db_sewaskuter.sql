-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 07:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sewaskuter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `telp`, `alamat`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', '085789667838', 'Jl Gatot Subroto Jatiuwung Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `skuter`
--

CREATE TABLE IF NOT EXISTS `skuter` (
`id_skuter` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(12) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `skuter`
--

INSERT INTO `skuter` (`id_skuter`, `nama`, `harga`, `foto`, `status`) VALUES
(1, 'Big Scooter', 100000, 'big.jpg', 'ada'),
(2, 'Razor', 85000, 'razor.jpg', ''),
(3, 'Zero 9', 70000, 'zero.jpg', 'ada'),
(4, 'Qicycle', 65000, 'qicycle.jpg', 'ada'),
(5, 'Kick Scooter', 65000, 'seqway.png', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `tanya`
--

CREATE TABLE IF NOT EXISTS `tanya` (
`id_cu` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `pesan` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tanya`
--

INSERT INTO `tanya` (`id_cu`, `nama`, `email`, `telp`, `pesan`) VALUES
(1, 'intan', 'intavini0@gmail.com', '085789667838', 'bagaimana langkah sewa?');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_skuter` int(11) NOT NULL,
  `lama` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_skuter`, `lama`, `total`, `username`, `tgl_pesan`) VALUES
('202001270001', 2, 2, 170000, 'intan', '2020-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksikembali`
--

CREATE TABLE IF NOT EXISTS `transaksikembali` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_skuter` varchar(10) NOT NULL,
  `denda` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksikembali`
--

INSERT INTO `transaksikembali` (`id_transaksi`, `id_skuter`, `denda`) VALUES
('202001260001', '4', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `telp`, `alamat`) VALUES
(1, 'user1', 'user1', 'user1@gmail.com', '081234345656', 'jatiuwung'),
(2, 'user2', 'user2', 'user2@gmail.com', '087789894545', 'cimone'),
(5, 'intan', 'katasandi', 'intanvini0@gmail.com', '083853384343', 'jatiuwung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skuter`
--
ALTER TABLE `skuter`
 ADD PRIMARY KEY (`id_skuter`);

--
-- Indexes for table `tanya`
--
ALTER TABLE `tanya`
 ADD PRIMARY KEY (`id_cu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksikembali`
--
ALTER TABLE `transaksikembali`
 ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skuter`
--
ALTER TABLE `skuter`
MODIFY `id_skuter` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tanya`
--
ALTER TABLE `tanya`
MODIFY `id_cu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
