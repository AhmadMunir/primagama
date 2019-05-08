-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2019 at 04:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primagama`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswaByid` (IN `id` INT(11))  NO SQL
SELECT * FROM tbl_siswa WHERE id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswaByKelas` (IN `idk` INT(3))  NO SQL
SELECT * FROM tbl_siswa WHERE id_kelas = idk$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `jenjang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_grade` int(2) NOT NULL,
  `id_jenjang` int(2) NOT NULL,
  `kelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_grade`, `id_jenjang`, `kelas`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 1, '4'),
(5, 1, '5'),
(6, 1, '6'),
(7, 2, '7'),
(8, 2, '8'),
(9, 2, '9'),
(10, 3, '10'),
(11, 3, '11'),
(12, 3, '12'),
(13, 4, 'LL');

-- --------------------------------------------------------

--
-- Table structure for table `lgn_admin`
--

CREATE TABLE `lgn_admin` (
  `id_lgn` int(2) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lgn_admin`
--

INSERT INTO `lgn_admin` (`id_lgn`, `id_admin`, `username`, `password`) VALUES
(1, 1, 'munir', 'munir');

-- --------------------------------------------------------

--
-- Table structure for table `lgn_ortu`
--

CREATE TABLE `lgn_ortu` (
  `id_lgnortu` int(11) NOT NULL,
  `id_ortu` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lgn_siswa`
--

CREATE TABLE `lgn_siswa` (
  `id_lgnsiswa` int(5) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lgn_tentor`
--

CREATE TABLE `lgn_tentor` (
  `id_lgntentor` int(3) NOT NULL,
  `id_tentor` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(2) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_lengkap`, `tgl_lahir`, `alamat`, `no_hp`, `foto`) VALUES
(1, 'munir', '1999-02-14', 'bondowoso', '082316285715', 'sadas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `id_tentor` int(2) NOT NULL,
  `id_ruang` int(2) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `jenjang` enum('SD','SMP','SMA','Lain-lain') NOT NULL,
  `id_program` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `jumlah`, `jenjang`, `id_program`) VALUES
(1, 'null', 18, 'Lain-lain', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `id_grade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ortu`
--

CREATE TABLE `tbl_ortu` (
  `id_ortu` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `no_hpayah` varchar(14) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `no_hpibu` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id_program` int(2) NOT NULL,
  `nama_program` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`id_program`, `nama_program`) VALUES
(1, 'REGULER'),
(2, 'INTENSIF UN'),
(3, 'INTENSIF SBMPTN'),
(4, 'STAN'),
(5, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id_ruang` int(2) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(10) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `agama` enum('Islam','Katholik','Kristen','Hindu','Budha','Kong Hu Cu','Lain-Lain') NOT NULL,
  `email` varchar(60) NOT NULL,
  `id_program` int(2) DEFAULT '1',
  `no_hp` varchar(14) DEFAULT NULL,
  `id_kelas` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_lengkap`, `nama_panggilan`, `tempat`, `tanggal_lahir`, `sekolah`, `id_grade`, `jenis_kelamin`, `alamat`, `agama`, `email`, `id_program`, `no_hp`, `id_kelas`) VALUES
(1, 'Ahmad Munir', 'Munir', 'Bondowoso', '1999-02-14', 'SMA Negeri 1 Tenggarang', 12, 'Laki-laki', 'Sukosari', 'Islam', 'hel000941@gmail.com', 1, NULL, 1),
(2, 'Alex Rudi Herlambang', 'Alex', 'Jember', '1998-02-10', 'Smk N 5 Jember', 11, 'Laki-laki', 'Puger', 'Islam', 'alex@gmail.com', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentor`
--

CREATE TABLE `tbl_tentor` (
  `id_tentor` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `no_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas` (
`nama_kelas` varchar(20)
,`jumlah` int(2)
,`jenjang` enum('SD','SMP','SMA','Lain-lain')
,`nama_program` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`nama_lengkap` varchar(50)
,`sekolah` varchar(30)
,`kelas` varchar(2)
,`nama_program` varchar(15)
,`nama_kelas` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas`  AS  select `a`.`nama_kelas` AS `nama_kelas`,`a`.`jumlah` AS `jumlah`,`a`.`jenjang` AS `jenjang`,`b`.`nama_program` AS `nama_program` from (`tbl_kelas` `a` join `tbl_program` `b`) where (`a`.`id_program` = `b`.`id_program`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS  select `a`.`nama_lengkap` AS `nama_lengkap`,`a`.`sekolah` AS `sekolah`,`b`.`kelas` AS `kelas`,`c`.`nama_program` AS `nama_program`,`d`.`nama_kelas` AS `nama_kelas` from (((`tbl_siswa` `a` join `kelas` `b`) join `tbl_program` `c`) join `tbl_kelas` `d`) where ((`a`.`id_grade` = `b`.`id_grade`) and (`a`.`id_program` = `c`.`id_program`) and (`a`.`id_kelas` = `d`.`id_kelas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `lgn_admin`
--
ALTER TABLE `lgn_admin`
  ADD PRIMARY KEY (`id_lgn`),
  ADD UNIQUE KEY `id_admin` (`id_admin`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `lgn_ortu`
--
ALTER TABLE `lgn_ortu`
  ADD PRIMARY KEY (`id_lgnortu`),
  ADD UNIQUE KEY `id_ortu` (`id_ortu`);

--
-- Indexes for table `lgn_siswa`
--
ALTER TABLE `lgn_siswa`
  ADD PRIMARY KEY (`id_lgnsiswa`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `lgn_tentor`
--
ALTER TABLE `lgn_tentor`
  ADD PRIMARY KEY (`id_lgntentor`),
  ADD UNIQUE KEY `id_tentor` (`id_tentor`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_tentor` (`id_tentor`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_grade` (`id_grade`);

--
-- Indexes for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD UNIQUE KEY `no_hpibu` (`no_hpibu`),
  ADD UNIQUE KEY `no_hpayah` (`no_hpayah`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_grade` (`id_grade`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  ADD PRIMARY KEY (`id_tentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lgn_admin`
--
ALTER TABLE `lgn_admin`
  MODIFY `id_lgn` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  MODIFY `id_tentor` int(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Constraints for table `lgn_admin`
--
ALTER TABLE `lgn_admin`
  ADD CONSTRAINT `lgn_admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`);

--
-- Constraints for table `lgn_ortu`
--
ALTER TABLE `lgn_ortu`
  ADD CONSTRAINT `lgn_ortu_ibfk_1` FOREIGN KEY (`id_ortu`) REFERENCES `tbl_ortu` (`id_ortu`);

--
-- Constraints for table `lgn_siswa`
--
ALTER TABLE `lgn_siswa`
  ADD CONSTRAINT `lgn_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

--
-- Constraints for table `lgn_tentor`
--
ALTER TABLE `lgn_tentor`
  ADD CONSTRAINT `lgn_tentor_ibfk_1` FOREIGN KEY (`id_tentor`) REFERENCES `tbl_tentor` (`id_tentor`);

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_3` FOREIGN KEY (`id_ruang`) REFERENCES `tbl_ruang` (`id_ruang`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_4` FOREIGN KEY (`id_tentor`) REFERENCES `tbl_tentor` (`id_tentor`);

--
-- Constraints for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`);

--
-- Constraints for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD CONSTRAINT `tbl_mapel_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `kelas` (`id_grade`);

--
-- Constraints for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD CONSTRAINT `tbl_ortu_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `kelas` (`id_grade`),
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`),
  ADD CONSTRAINT `tbl_siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
