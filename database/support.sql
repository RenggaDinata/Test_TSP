-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jun 2016 pada 16.30
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `support`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sheet_em`
--

CREATE TABLE `sheet_em` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `gambar1` varchar(50) NOT NULL,
  `keterangan1` text NOT NULL,
  `date2` date NOT NULL,
  `gambar2` varchar(50) NOT NULL,
  `keterangan2` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `verify` varchar(20) NOT NULL,
  `effects` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pic` int(4) NOT NULL,
  `inputer` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sheet_em`
--

INSERT INTO `sheet_em` (`id`, `title`, `date1`, `gambar1`, `keterangan1`, `date2`, `gambar2`, `keterangan2`, `status`, `verify`, `effects`, `location`, `pic`, `inputer`) VALUES
(84, 'Ganti Harddisk', '2016-01-20', 'image30-06-2016-02-11-44Funny-Minion-Cartoon-Wallp', 'Hard Disk Bad', '2016-06-30', '', '', 'open', 'On Progress', 'Safety', 'Lantai 2', 15, 1);

--
-- Trigger `sheet_em`
--
DELIMITER $$
CREATE TRIGGER `triger_hse` AFTER INSERT ON `sheet_em` FOR EACH ROW BEGIN
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_em`
--

CREATE TABLE `user_em` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_em`
--

INSERT INTO `user_em` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'rengga.dinata@gmail.com', 1),
(17, 'Rengga', 'f0e5ccc01aeffe13327c927efdf891a5', 'Rengga', 'rengga@gmail.com', 1),
(16, 'Triyanto', '53cfb449fa90add90e0f628c7ff77fcc', 'Triyanto', 'triyanto@gmail.com', 2),
(15, 'Dinata', '28f94a80ed1da0db3e952efc92007cfa', 'Dinata', 'dinata@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sheet_em`
--
ALTER TABLE `sheet_em`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_em`
--
ALTER TABLE `user_em`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sheet_em`
--
ALTER TABLE `sheet_em`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `user_em`
--
ALTER TABLE `user_em`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
