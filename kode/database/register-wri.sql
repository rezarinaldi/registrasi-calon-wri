-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 01:55 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register-wri`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `iddivisi` int(5) NOT NULL,
  `namadivisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`iddivisi`, `namadivisi`) VALUES
(1, 'Android Engineering'),
(2, 'Web Development'),
(3, 'IoT Development'),
(4, 'UI/UX Designer'),
(5, 'Game Development');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `idpendaftar` int(5) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nowa` varchar(12) NOT NULL,
  `programstudi` varchar(20) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `asalsekolah` varchar(30) NOT NULL,
  `halperoleh` text NOT NULL,
  `kontribusi` text NOT NULL,
  `hardskill` varchar(50) NOT NULL,
  `softskill` varchar(50) NOT NULL,
  `karya` varchar(50) NOT NULL,
  `sosmed` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Dalam proses',
  `iddivisi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`idpendaftar`, `nim`, `nama`, `nowa`, `programstudi`, `kelas`, `asalsekolah`, `halperoleh`, `kontribusi`, `hardskill`, `softskill`, `karya`, `sosmed`, `status`, `iddivisi`) VALUES
(9, '1841720002', 'Oktaviano Andy Suryadi', '085766566560', 'D4-TI', 'TI-2D', 'SMKN Pasirian', 'Keluarga', 'Mencari teman', 'Web Development, ', 'Mentorship, ', '', 'http://', 'Dalam proses', 2),
(10, '1841720001', 'Intan Ayu Wandari', '08765456212', 'D4-TI', 'TI-2C', 'SMK Beringin', 'Teman', 'Prestasi', 'Web Development, Game Development, IoT Development', 'Public Speaking, Mentorship, Leadership, ', '-', 'http://', 'Tidak direkomendasikan', 1),
(11, '1841720006', 'Bella Setyo', '0865646213', 'D4-TI', 'TI-2D', 'SMK 5 Malang', 'Teman', 'Prestasi', 'Desain Grafis, Fotografi, Videografi, Writing, ', 'Team Work, ', 'http://', 'http://', 'Direkomendasikan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`) VALUES
(4, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'administrator', 'cek', '6ab97dc5c706cfdc425ca52a65d97b0d'),
(16, 'fikrul', 'fikrul', '3691308f2a4c2f6983f2880d32e29c84'),
(17, 'masbro', 'masbro', '5787ef096d1b52ac59c7095bb41189e5'),
(18, 'sony', 'sony', '33561003f44d374c719506bef4faeba4'),
(19, 'jember', 'jember', '90d840be792c6b4b8121d2785a136dc1'),
(20, 'dua', 'dua', 'a319360336c8cac32102f4dffbee4260'),
(21, 'tiga', 'tiga', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`iddivisi`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idpendaftar`),
  ADD KEY `iddivisi` (`iddivisi`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `iddivisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `idpendaftar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`iddivisi`) REFERENCES `divisi` (`iddivisi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
