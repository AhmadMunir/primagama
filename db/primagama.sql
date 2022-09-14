-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 02:56 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOrtu` (IN `id` VARCHAR(18))  NO SQL
SELECT * FROM tbl_ortu where id_siswa=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswaByid` (IN `id` INT(11))  NO SQL
SELECT * FROM tbl_siswa WHERE id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswaByKelas` (IN `idk` INT(3))  NO SQL
SELECT * FROM tbl_siswa WHERE id_kelas = idk$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_absenBysiswa` (IN `id` VARCHAR(17))  NO SQL
SELECT * FROM tbl_absen WHERE id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_biaya` (IN `id` INT(2))  NO SQL
SELECT biaya FROM tbl_program WHERE id_program = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_detailsiswa` (IN `id` VARCHAR(17))  NO SQL
SELECT a.id_siswa, a.nama_lengkap, a.nama_panggilan, a.tempat, a.tanggal_lahir, a.jenis_kelamin, a.alamat, a.agama,a.email, a.no_hp, a.foto, b.nama_program, c.nama_ayah,c.pekerjaan_ayah, c.no_hpayah, c.nama_ibu, c.pekerjaan_ibu, c.no_hpibu, d.nama_kelas, e.nama_sekolah, f.kelas
FROM tbl_siswa a, tbl_program b, tbl_ortu c, tbl_kelas d, tbl_sekolah e, kelas f
WHERE a.id_program = b.id_program AND a.id_sekolah = e.id_sekolah AND a.id_grade = f.id_grade AND a.id_program = b.id_program AND a.id_siswa = c.id_siswa AND a.id_kelas = d.id_kelas AND a.id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_detailtentor` (IN `id` INT(2))  NO SQL
SELECT a.id_tentor, a.nama, a.alamat, a.tempat, a.jenis_kelamin, a.tanggal_lahir ,a.no_hp, a.email, a.foto, b.nama_mapel, b.id_mapel
FROM tbl_tentor a, tbl_mapel b
WHERE a.id_mapel = b.id_mapel AND a.id_tentor = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_isikelas` (IN `kls` INT(2))  NO SQL
SELECT a.id_siswa, a.nama_lengkap, b.nama_sekolah
FROM tbl_siswa a, tbl_sekolah b
WHERE a.id_sekolah = b.id_sekolah AND id_kelas = kls$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jadwalBykelas` (IN `id` INT(2))  NO SQL
SELECT * FROM view_jadwal WHERE id_kelas = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_nilaibyprgrm` (IN `id` INT(2))  NO SQL
SELECT a.id, a.id_siswa, a.nilai, a.try_out_ke, b.nama_mapel
FROM tbl_nilai a, tbl_mapel b
WHERE a.id_mapel = b.id_mapel and b.id_program = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_tghterahir` (IN `id` VARCHAR(17))  NO SQL
SELECT b.id_siswa, b.nama_lengkap, a.id_pembayaran, a.waktu, a.jumlah_bayar, a.sisa_tagihan, c.kelas, d.nama_program
FROM tbl_pembayaran a, tbl_siswa b, kelas c, tbl_program d
WHERE a.id_siswa = b.id_siswa AND b.id_grade = c.id_grade AND b.id_program = d.id_program AND a.id_siswa = id ORDER BY waktu DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_to2` (IN `id` VARCHAR(17), IN `idm` VARCHAR(20), IN `nl` INT(3))  NO SQL
UPDATE tbl_nilai SET to2 = nl WHERE id_siswa = id AND id_mapel = idm$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_to3` (IN `id` VARCHAR(17), IN `idm` VARCHAR(20), IN `nl` INT(3))  NO SQL
UPDATE tbl_nilai SET to3 = nl WHERE id_siswa = id AND id_mapel = idm$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_to4` (IN `id` VARCHAR(17), IN `idm` VARCHAR(20), IN `nl` INT(3))  NO SQL
UPDATE tbl_nilai SET to4 = nl WHERE id_siswa = id AND id_mapel = idm$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_to5` (IN `id` VARCHAR(17), IN `idm` VARCHAR(20), IN `nl` INT(3))  NO SQL
UPDATE tbl_nilai SET to5 = nl WHERE id_siswa = id AND id_mapel = idm$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatidgrade` (IN `id` VARCHAR(17))  NO SQL
SELECT id_grade
FROM tbl_siswa
WHERE id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatnamasekolah` (IN `id` VARCHAR(17))  NO SQL
SELECT b.nama_sekolah, c.nama_program
FROM tbl_siswa a, tbl_sekolah b, tbl_program c
WHERE a.id_sekolah=b.id_sekolah AND a.id_program = c.id_program AND id_siswa = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dump_tbl_kelas_reqjadwal`
--

CREATE TABLE `dump_tbl_kelas_reqjadwal` (
  `id_kelas` int(2) NOT NULL,
  `id_ruang` int(2) NOT NULL,
  `id_tentor` int(2) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(2) NOT NULL,
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
-- Table structure for table `kec`
--

CREATE TABLE `kec` (
  `id_kec` int(2) NOT NULL,
  `nama_kec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kec`
--

INSERT INTO `kec` (`id_kec`, `nama_kec`) VALUES
(1, 'Bondowoso'),
(2, 'Cerme'),
(3, 'Tlogosari'),
(4, 'Wringin'),
(5, 'Tapen'),
(6, 'Botolinggo'),
(7, 'Maesan'),
(8, 'Tenggarang'),
(9, 'Wonosari'),
(10, 'Tamanan'),
(11, 'Curahdami'),
(12, 'Grujukan'),
(13, 'Pujer'),
(14, 'Sumber Wringin'),
(15, 'Jambesari'),
(16, 'Prajekan'),
(17, 'Pakem'),
(18, 'Klabang'),
(19, 'Tegalampel'),
(20, 'Sukosari'),
(21, 'Taman Krocok'),
(22, 'Binakal'),
(23, 'Ijen');

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
(13, 4, 'LL'),
(14, 4, 'xx');

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
(1, 1, 'munir', 'ec83c3ce4c0288ad7868947965b8847c'),
(2, 3, 'alex', '202cb962ac59075b964b07152d234b70');

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

--
-- Dumping data for table `lgn_ortu`
--

INSERT INTO `lgn_ortu` (`id_lgnortu`, `id_ortu`, `username`, `password`) VALUES
(2, 8, '01782084500000005', '5c66cdd3b5b72868a7cab85b30251c01'),
(4, 10, '01782084500000007', '01782084500000007'),
(5, 11, '01782084500000008', 'ad7c4daac5db8f1e2141ba1c4095496f'),
(6, 12, '01782084500000009', '5aa2c0fa34f3dd2454f50675b459caa4'),
(7, 13, '01782084500000010', '01782084500000010'),
(8, 14, '01782084500000011', '01782084500000011'),
(9, 15, '01782084500000012', 'c45cc88318c56169bfd4623b10e2e172'),
(10, 16, '01782084500000013', '01782084500000013'),
(11, 17, '01782084500000014', '01782084500000014'),
(12, 18, '01782084500000015', '01782084500000015'),
(13, 19, '01782084500000016', '01782084500000016'),
(14, 20, '01782084500000017', '2d52114df57466db2f27b14d677f0385');

-- --------------------------------------------------------

--
-- Table structure for table `lgn_siswa`
--

CREATE TABLE `lgn_siswa` (
  `id_lgnsiswa` int(5) NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lgn_siswa`
--

INSERT INTO `lgn_siswa` (`id_lgnsiswa`, `id_siswa`, `username`, `password`) VALUES
(6, '01782084500000002', 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076'),
(7, '01782084500000003', 'munir', 'munir'),
(13, '01782084500000005', 'Yanu', '8d33853b12bdbbc64f035934f87598f6'),
(15, '01782084500000007', 'Ilham', 'Ilham'),
(16, '01782084500000008', 'purti', 'e76df20903654f7f128dc37632fb9ab6'),
(17, '01782084500000009', 'Dani', '0b2cc82e6a177b18faefd88581b8597d'),
(18, '01782084500000010', 'fita', '52998c670d491bebb072923b8f7ccecb'),
(19, '01782084500000011', 'nova', '1a9c91f6e0310d4f55b7ee7f22c2c9df'),
(20, '01782084500000012', '01782084500000012', '74bfebec67d1a87b161e5cbcf6f72a4a'),
(21, '01782084500000013', 'risah', 'fce47e332cf1c6768d68ce4ea7eefcd6'),
(22, '01782084500000014', 'dian', 'd0dc3cf35b5a58d5234e6863457406e1'),
(23, '01782084500000015', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32'),
(24, '01782084500000016', '01782084500000016', '6878c309268c7bc852fb0f81c6419904'),
(25, '01782084500000017', 'rahmad', 'f54662f6c4cbcaca24996afe77378fa2');

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

--
-- Dumping data for table `lgn_tentor`
--

INSERT INTO `lgn_tentor` (`id_lgntentor`, `id_tentor`, `username`, `password`) VALUES
(3, 4, 'danila', 'd19f12b4b87cc69454157743e77ecef5'),
(4, 5, 'Yudha@gmail.com', '8a2cb2d9a9b457d8d3159b6b86335208'),
(5, 6, 'Ira@gmail.com', '2bd3ac14f210a42392d24f7d5a1677fd');

-- --------------------------------------------------------

--
-- Table structure for table `notif_req_jadwal`
--

CREATE TABLE `notif_req_jadwal` (
  `id` int(11) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_req_jadwal`
--

INSERT INTO `notif_req_jadwal` (`id`, `id_mapel`, `status`) VALUES
(2, 'UNSMAA0001', '0'),
(3, 'UNSMAA0004', '0'),
(4, 'UNSMAA0006', '0'),
(5, 'UNSMAA0004', '0'),
(6, 'UNSMAA0004', '0'),
(7, 'UNSMAA0004', '0'),
(8, 'UNSMAA0004', '0'),
(9, 'RSMP7001', '0'),
(10, 'RSMP7001', '0'),
(11, 'RSMP7001', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reqjdl_bantu`
-- (See below for the actual view)
--
CREATE TABLE `reqjdl_bantu` (
`id_mapel` varchar(20)
,`id_grade` int(2)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `jam_datang` varchar(30) NOT NULL,
  `jam_pulang` varchar(30) NOT NULL,
  `keterangan` varchar(15) DEFAULT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_absen`, `id_siswa`, `jam_datang`, `jam_pulang`, `keterangan`, `tgl`) VALUES
(1, '01782084500000005', '17:28:20', '20:21:22', NULL, '2019-05-25'),
(3, '01782084500000005', '17:28:20', '20:21:22', NULL, '2019-05-26'),
(5, '01782084500000005', '17:28:20', '20:21:22', NULL, '2019-05-27'),
(7, '01782084500000007', '17:28:20', '20:21:22', NULL, '2019-05-27'),
(8, '01782084500000008', '17:28:40', '20:24:29', NULL, '2019-05-27'),
(9, '01782084500000009', '17:29:40', '20:24:30', NULL, '2019-05-27'),
(10, '01782084500000010', '17:30:40', '20:24:32', NULL, '2019-05-27'),
(11, '01782084500000007', '17:28:20', '20:21:22', NULL, '2019-05-27'),
(12, '01782084500000008', '17:28:40', '20:24:29', NULL, '2019-05-27'),
(13, '01782084500000009', '17:29:40', '20:24:30', NULL, '2019-05-27'),
(14, '01782084500000010', '17:30:40', '20:24:32', NULL, '2019-05-27'),
(15, '01782084500000007', '17:28:20', '20:21:22', NULL, '2019-06-21'),
(16, '01782084500000008', '17:28:40', '20:24:29', NULL, '2019-06-21'),
(17, '01782084500000009', '17:29:40', '20:24:30', NULL, '2019-06-21'),
(18, '01782084500000010', '17:30:40', '20:24:32', NULL, '2019-06-21'),
(19, '01782084500000007', '17:28:20', '20:21:22', NULL, '2019-06-22'),
(20, '01782084500000008', '17:28:40', '20:24:29', NULL, '2019-06-22'),
(21, '01782084500000009', '17:29:40', '20:24:30', NULL, '2019-06-22'),
(22, '01782084500000010', '17:30:40', '20:24:32', NULL, '2019-06-22'),
(23, '01782084500000007', '17:28:20', '20:21:22', NULL, '2019-06-23'),
(24, '01782084500000008', '17:28:40', '20:24:29', NULL, '2019-06-23'),
(25, '01782084500000009', '17:29:40', '20:24:30', NULL, '2019-06-23'),
(26, '01782084500000010', '17:30:40', '20:24:32', NULL, '2019-06-23');

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
  `email` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_lengkap`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `foto`) VALUES
(1, 'munir', '1999-02-14', 'bondowoso', '082316285715', 'hel000491@gmail.com', '1.jpg'),
(3, 'Alex Rudi Herlambang', '1998-10-24', 'Mlokorejo Puger-Jember', '085746816375', 'alexrudiherlambang98@gmail.com', '3.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_tentor` int(2) NOT NULL,
  `id_ruang` int(2) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_kelas`, `id_mapel`, `id_tentor`, `id_ruang`, `hari`, `jam`) VALUES
(1, 1, 'RSD4001', 4, 1, 'Kamis', '13:00-14:30'),
(2, 3, 'UNSMAA0005', 4, 1, 'Senin', '13:00-14:30'),
(3, 3, 'UNSMAA0001', 4, 2, 'Senin', '15:00-16:30'),
(4, 3, 'UNSMAA0002', 4, 2, 'Selasa', '13:00-14:30'),
(5, 2, 'UNSMP0001', 4, 2, 'Senin', '15:00-16:30'),
(6, 3, 'UNSMAA0004', 4, 2, 'Rabu', '18:00-20:30'),
(7, 3, 'UNSMAA0002', 6, 2, 'Rabu', '13:00-14:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `jumlah` int(2) DEFAULT NULL,
  `id_program` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `jumlah`, `id_program`) VALUES
(1, 'UN001', 2, 2),
(2, 'UNSMP001', 4, 14),
(3, 'UNSMAA001', 6, 15),
(99, 'null', NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_reqjadwal`
--

CREATE TABLE `tbl_kelas_reqjadwal` (
  `id_kelas` int(2) NOT NULL,
  `id_ruang` int(2) NOT NULL,
  `id_tentor` int(2) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas_reqjadwal`
--

INSERT INTO `tbl_kelas_reqjadwal` (`id_kelas`, `id_ruang`, `id_tentor`, `id_mapel`, `tanggal`, `jam`) VALUES
(3, 2, 5, 'UNSMAA0002', '2019-06-25', '15:00');

--
-- Triggers `tbl_kelas_reqjadwal`
--
DELIMITER $$
CREATE TRIGGER `del_req` AFTER INSERT ON `tbl_kelas_reqjadwal` FOR EACH ROW BEGIN
 DELETE FROM tbl_request_jadwal WHERE id_mapel = new.id_mapel;
 DELETE FROM notif_req_jadwal WHERE id_mapel = new.id_mapel;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dump` BEFORE DELETE ON `tbl_kelas_reqjadwal` FOR EACH ROW BEGIN
INSERT INTO dump_tbl_kelas_reqjadwal(id_kelas, id_ruang, id_tentor,id_mapel, tanggal,jam)VALUES(old.id_kelas, old.id_ruang, old.id_tentor,old.id_mapel, old.tanggal,old.jam);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `id_program` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`, `id_program`) VALUES
('RSD4001', 'IPA SD Kls 4', 1),
('RSD4002', 'MATEMATIKA SD Kls 4', 1),
('RSD4003', 'IPS SD Kls 4', 1),
('RSD4004', 'B.Indo SD Kls 4', 1),
('RSD4005', 'B.Ing SD Kls 4', 1),
('RSD5001', 'IPA SD Kls 5', 2),
('RSD5002', 'MATEMATIKA SD Kls 5', 2),
('RSD5003', 'IPS SD Kls 5', 2),
('RSD5004', 'B.Indo SD Kls 5', 2),
('RSD5005', 'B.Ing SD Kls 5', 2),
('RSD6001', 'IPA SD Kls 6', 3),
('RSD6002', 'MATEMATIKA SD Kls 6', 3),
('RSD6003', 'IPS SD Kls 6', 3),
('RSD6004', 'B.Indo SD Kls 6', 3),
('RSD6005', 'B.Ing SD Kls 6', 3),
('RSMAA1001', 'BIOLOGI SMA Kls 10', 7),
('RSMAA1002', 'KIMIA SMA Kls 10', 7),
('RSMAA1003', 'FISIKA SMA Kls 10', 7),
('RSMAA1004', 'MATEMATIKA SMA Kls 10', 7),
('RSMAA1005', 'B.Indo SMA Kls 10', 7),
('RSMAA1006', 'B.Ing SMA Kls 10', 7),
('RSMAA1101', 'BIOLOGI SMA Kls 11', 8),
('RSMAA1102', 'KIMIA SMA Kls 11', 8),
('RSMAA1103', 'FISIKA SMA Kls 11', 8),
('RSMAA1104', 'MATEMATIKA SMA Kls 11', 8),
('RSMAA1105', 'B.Indo SMA Kls 11', 8),
('RSMAA1106', 'B.Ing SMA Kls 11', 8),
('RSMAA1201', 'BIOLOGI SMA Kls 12', 9),
('RSMAA1202', 'KIMIA SMA Kls 12', 9),
('RSMAA1203', 'FISIKA SMA Kls 12', 9),
('RSMAA1204', 'MATEMATIKA SMA Kls 12', 9),
('RSMAA1205', 'B.Indo SMA Kls 12', 9),
('RSMAA1206', 'B.Ing SMA Kls 12', 9),
('RSMAS1001', 'EKONOMI SMA Kls 10', 10),
('RSMAS1002', 'GEOGRAFI SMA Kls 10', 10),
('RSMAS1003', 'SEJARAH SMA Kls 10', 10),
('RSMAS1004', 'MATEMATIKA SMA Kls 10', 10),
('RSMAS1005', 'B.Indo SMA Kls 10', 10),
('RSMAS1006', 'B.Ing SMA Kls 10', 10),
('RSMAS1101', 'EKONOMI SMA Kls 11', 11),
('RSMAS1102', 'GEOGRAFI SMA Kls 11', 11),
('RSMAS1103', 'SEJARAH SMA Kls 11', 11),
('RSMAS1104', 'MATEMATIKA SMA Kls 11', 11),
('RSMAS1105', 'B.Indo SMA Kls 11', 11),
('RSMAS1106', 'B.Ing SMA Kls 11', 11),
('RSMAS1201', 'EKONOMI SMA Kls 12', 12),
('RSMAS1202', 'GEOGRAFI SMA Kls 12', 12),
('RSMAS1203', 'SEJARAH SMA Kls 12', 12),
('RSMAS1204', 'MATEMATIKA SMA Kls 12', 12),
('RSMAS1205', 'B.Indo SMA Kls 12', 12),
('RSMAS1206', 'B.Ing SMA Kls 12', 12),
('RSMP7001', 'FISIKA SMP Kls 7', 4),
('RSMP7002', 'BIOLOGI SMP Kls 7', 4),
('RSMP7003', 'MATEMATIKA SMP Kls 7', 4),
('RSMP7004', 'B.Indo SMP Kls 7', 4),
('RSMP7005', 'B.Ing SMP Kls 7', 4),
('RSMP7006', 'GEOGRAFI SMP Kls 7', 4),
('RSMP7007', 'EKONOMI SMP Kls 7', 4),
('RSMP8001', 'FISIKA SMP Kls 8', 5),
('RSMP8002', 'BIOLOGI SMP Kls 8', 5),
('RSMP8003', 'MATEMATIKA SMP Kls 8', 5),
('RSMP8004', 'B.Indo SMP Kls 8', 5),
('RSMP8005', 'B.Ing SMP Kls 8', 5),
('RSMP8006', 'GEOGRAFI SMP Kls 8', 5),
('RSMP8007', 'EKONOMI SMP Kls 8', 5),
('RSMP9001', 'FISIKA SMP Kls 9', 6),
('RSMP9002', 'BIOLOGI SMP Kls 9', 6),
('RSMP9003', 'MATEMATIKA SMP Kls 9', 6),
('RSMP9004', 'B.Indo SMP Kls 9', 6),
('RSMP9005', 'B.Ing SMP Kls 9', 6),
('RSMP9006', 'GEOGRAFI SMP Kls 9', 6),
('RSMP9007', 'EKONOMI SMP Kls 9', 6),
('SBMA0001', 'SBMA FISIKA', 17),
('SBMA0002', 'SBMA BIOLOGI', 17),
('SBMA0003', 'SBMA KIMIA', 17),
('SBMA0004', 'SBMA MATEMATIKA', 17),
('SBMA0005', 'SBMA B.Ind', 17),
('SBMA0006', 'SBMA B.Ing', 17),
('SBMA0007', 'SBMA TPA', 17),
('SBMS0001', 'SMBMS SEJARAH', 18),
('SBMS0002', 'SMBMS GEOGRAFI', 18),
('SBMS0003', 'SMBMS EKONOMI', 18),
('SBMS0004', 'SMBMS MATEMATIKA', 18),
('SBMS0005', 'SMBMS B.Ind', 18),
('SBMS0006', 'SMBMS B.Ing', 18),
('SBMS0007', 'SMBMS TPA', 18),
('STAN0001', 'STAN TIU', 20),
('STAN0002', 'STAN TWK', 20),
('UNSD0001', 'UN IPA SD', 13),
('UNSD0002', 'UN MATEMATIKA SD', 13),
('UNSD0003', 'UN B.Ind SD', 13),
('UNSMAA0001', 'UNA FISIKA SMA', 15),
('UNSMAA0002', 'UNA BIOLOGI SMA', 15),
('UNSMAA0003', 'UNA KIMIA SMA', 15),
('UNSMAA0004', 'UNA MATEMATIKA SMA', 15),
('UNSMAA0005', 'UNA B.Ind SMA', 15),
('UNSMAA0006', 'UNA B.Ing SMA', 15),
('UNSMAS0007', 'UNS SEJARAH SMA', 16),
('UNSMAS0008', 'UNS GEOGRAFI SMA', 16),
('UNSMAS0009', 'UNS EKONOMI SMA', 16),
('UNSMAS0010', 'UNS MATEMATIKA SMA', 16),
('UNSMAS0011', 'UNS B.Ind SMA', 16),
('UNSMAS0012', 'UNS B.Ing SMA', 16),
('UNSMP0001', 'UN IPA SMP', 14),
('UNSMP0002', 'UN MATEMATIKA SMP', 14),
('UNSMP0003', 'UN B.Ind SMP', 14),
('UNSMP0004', 'UN B.Ing SMP', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(10) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `to1` tinyint(2) DEFAULT NULL,
  `to2` tinyint(2) DEFAULT NULL,
  `to3` tinyint(2) DEFAULT NULL,
  `to4` tinyint(2) DEFAULT NULL,
  `to5` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `id_mapel`, `id_siswa`, `to1`, `to2`, `to3`, `to4`, `to5`) VALUES
(20, 'RSMAA1104', '01782084500000002', 50, NULL, NULL, NULL, NULL),
(31, 'UNSMAA0004', '01782084500000002', 100, NULL, NULL, NULL, NULL),
(32, 'UNSMAA0004', '01782084500000007', 100, NULL, NULL, NULL, NULL),
(33, 'UNSMAA0004', '01782084500000008', 100, NULL, NULL, NULL, NULL),
(34, 'UNSMAA0004', '01782084500000009', 90, NULL, NULL, NULL, NULL),
(35, 'UNSMAA0004', '01782084500000010', 75, NULL, NULL, NULL, NULL),
(36, 'UNSMAA0002', '01782084500000007', 100, NULL, NULL, NULL, NULL),
(37, 'UNSMAA0002', '01782084500000008', 100, NULL, NULL, NULL, NULL),
(38, 'UNSMAA0002', '01782084500000009', 90, NULL, NULL, NULL, NULL),
(39, 'UNSMAA0002', '01782084500000010', 75, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ortu`
--

CREATE TABLE `tbl_ortu` (
  `id_ortu` int(11) NOT NULL,
  `id_siswa` varchar(17) DEFAULT NULL,
  `nama_ayah` varchar(40) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `no_hpayah` varchar(14) DEFAULT NULL,
  `nama_ibu` varchar(40) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `no_hpibu` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ortu`
--

INSERT INTO `tbl_ortu` (`id_ortu`, `id_siswa`, `nama_ayah`, `pekerjaan_ayah`, `no_hpayah`, `nama_ibu`, `pekerjaan_ibu`, `no_hpibu`) VALUES
(1, '01782084500000002', 'dsadasd', 'sadsadsa', '222', NULL, 'sadsadsa', '2222'),
(2, '01782084500000003', 'Sukarno', 'PNS', '085236042274', 'Jumirah', 'PNS', '082316285715'),
(8, '01782084500000005', 'Sulastro', 'PNS', '0823237982', 'sulastri', 'PNS', '089772877292'),
(10, '01782084500000007', 'Dana', 'PNS', '0899829982', 'Dini', 'PNS', '0877287272'),
(11, '01782084500000008', 'ayah', 'pns', '08290928', 'ibu', 'pns', '082989282'),
(12, '01782084500000009', 'Jumadi', 'PNS', '0877839938399', 'Jumaida', 'PNS', '08929829822'),
(13, '01782084500000010', 'Rian', 'PNS', '0899287287287', 'Rani', 'PNS', '0878278278278'),
(14, '01782084500000011', 'Ayah', 'Montir', '08992892', 'Ibu', 'Montir', '08928928928'),
(15, '01782084500000012', 'Bapak', 'Bapak Rumah Tangga', '0829928928928', 'Ibu', 'Bapak Rumah Tangga', '0289289279289'),
(16, '01782084500000013', 'Sukarno', 'PNS', '0928292292928', 'Jumirah', 'PNS', '092829829829'),
(17, '01782084500000014', 'ayah', 'Bapak Rumah Tangga', '0892982982982', 'Dini', 'Bapak Rumah Tangga', '08292829829829'),
(18, '01782084500000015', 'Aya', 'pns', '02892890298', 'ibu', 'pns', '09280928092809'),
(19, '01782084500000016', 'Diana', 'lidkns', '0892982982', 'junaida', 'lidkns', '092829929'),
(20, '01782084500000017', 'bapak', 'pns', '08298298029', 'ibuk', 'pns', '09820980298098');

--
-- Triggers `tbl_ortu`
--
DELIMITER $$
CREATE TRIGGER `add_lgnortu` AFTER INSERT ON `tbl_ortu` FOR EACH ROW BEGIN
INSERT lgn_ortu(id_ortu, username, password)
VALUES (new.id_ortu, new.id_siswa, new.id_siswa);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` varchar(17) NOT NULL,
  `jumlah_bayar` int(15) NOT NULL,
  `sisa_tagihan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `waktu`, `id_siswa`, `jumlah_bayar`, `sisa_tagihan`) VALUES
('P000000001', '2019-05-19 01:13:05', '01782084500000002', 200000, 1000000),
('P000000003', '2019-05-19 01:18:16', '01782084500000003', 200000, 1000000),
('P000000004', '2019-05-19 22:38:44', '01782084500000003', 200000, 800000),
('P000000005', '2019-05-19 22:41:49', '01782084500000003', 300000, 500000),
('P000000006', '2019-05-19 23:16:24', '01782084500000003', 250000, 250000),
('P000000007', '2019-05-20 13:38:18', '01782084500000003', 230000, 20000),
('P000000008', '2019-05-21 11:49:58', '01782084500000003', 20000, 0),
('P000000009', '2019-05-23 01:36:25', '01782084500000007', 0, 1000000),
('P000000010', '2019-05-23 01:49:53', '01782084500000007', 200000, 800000),
('P000000011', '2019-05-23 13:41:58', '01782084500000008', 0, 1000000),
('P000000012', '2019-05-23 13:42:35', '01782084500000008', 200000, 800000),
('P000000013', '2019-05-25 02:48:33', '01782084500000008', 200000, 600000),
('P000000014', '2019-05-28 00:57:46', '01782084500000009', 0, 1000000),
('P000000015', '2019-05-28 01:10:37', '01782084500000010', 0, 1000000),
('P000000016', '2019-05-28 02:37:48', '01782084500000011', 0, 1000000),
('P000000017', '2019-05-28 09:47:40', '01782084500000012', 0, 1000000),
('P000000018', '2019-05-28 09:49:37', '01782084500000008', 200000, 400000),
('P000000019', '2019-05-29 23:53:56', '01782084500000008', 250000, 150000),
('P000000020', '2019-06-02 06:05:05', '01782084500000013', 0, 1000000),
('P000000021', '2019-06-02 06:55:28', '01782084500000014', 0, 1000000),
('P000000022', '2019-06-02 07:06:58', '01782084500000015', 0, 1000000),
('P000000023', '2019-06-03 10:55:26', '01782084500000016', 0, 1000000),
('P000000024', '2019-06-07 08:34:46', '01782084500000008', 150000, 0),
('P000000025', '2019-06-15 19:46:43', '01782084500000017', 0, 1000001),
('P000000026', '2019-06-26 06:23:00', '01782084500000002', 20000, 980000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id_program` int(2) NOT NULL,
  `nama_program` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL,
  `id_jenjang` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`id_program`, `nama_program`, `biaya`, `id_jenjang`) VALUES
(1, 'REGULER SD 4', 1000000, 1),
(2, 'REGULER SD 5', 1000000, 1),
(3, 'REGULER SD 6', 1000000, 1),
(4, 'REGULER SMP 7', 1000000, 2),
(5, 'REGULER SMP 8', 1000000, 2),
(6, 'REGULER SMP 9', 1000000, 2),
(7, 'REGULER SMA IPA 10', 1200000, 3),
(8, 'REGULER SMA IPA 11', 1000000, 3),
(9, 'REGULER SMA IPA 12', 1000000, 3),
(10, 'REGULER SMA IPS 10', 1000001, 3),
(11, 'REGULER SMA IPS 11', 1000002, 3),
(12, 'REGULER SMA IPS 12', 1000003, 3),
(13, 'INTENSIF UN SD', 1000000, 1),
(14, 'INTENSIF UN SMP', 1000000, 2),
(15, 'INTENSIF UN SMA IPA', 1000000, 3),
(16, 'INTENSIF UN SMA IPS', 1000001, 3),
(17, 'INTENSIF SBMPTN SAINTEK', 1000000, NULL),
(18, 'INTENSIF SBMPTN SOSHUM', 1000001, NULL),
(19, 'INTENSIF SBMPTN CAMPURAN', 1000002, NULL),
(20, 'INTENSIF STAN', 1000000, NULL),
(21, 'Lain-Lain', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_jadwal`
--

CREATE TABLE `tbl_request_jadwal` (
  `id_jadwal` int(15) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `id_grade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request_jadwal`
--

INSERT INTO `tbl_request_jadwal` (`id_jadwal`, `id_mapel`, `tanggal`, `id_siswa`, `id_grade`) VALUES
(5, 'UNSMAA0003', '2019-06-04', '01782084500000012', 12),
(7, 'RSMP8003', '2019-06-04', '01782084500000013', 8),
(9, 'UNSMAA0006', '2019-06-12', '01782084500000012', 12),
(11, 'UNSMAA0001', '2019-06-19', '01782084500000011', 12),
(12, 'UNSMAA0006', '2019-06-04', '01782084500000011', 12),
(13, 'RSD6002', '2019-06-04', '01782084500000010', 6),
(14, 'UNSMAA0001', '2019-06-17', '01782084500000017', 11),
(21, 'RSD5002', '2019-06-20', '01782084500000005', 7),
(22, 'RSMP7003', '2019-06-22', '01782084500000002', 12),
(23, 'UNSMAA0004', '2019-06-21', '01782084500000011', 12),
(25, 'UNSMAA0001', '2019-06-20', '01782084500000009', 12),
(26, 'UNSMAA0004', '0000-00-00', '01782084500000009', 12),
(27, 'UNSMAA0006', '2019-06-14', '01782084500000009', 12),
(28, 'UNSMAA0002', '2019-06-26', '01782084500000017', 12),
(30, 'UNSMAA0003', '2019-06-28', '01782084500000017', 12),
(33, 'UNSMAA0004', '2019-06-25', '01782084500000017', 12),
(34, 'RSMP7001', '2019-07-10', '01782084500000002', 12),
(35, 'RSMP7004', '2019-07-10', '01782084500000002', 12),
(36, 'RSMP7006', '2019-07-10', '01782084500000002', 12),
(37, 'RSMP7001', '2019-11-30', '01782084500000002', 1),
(38, 'RSMP7001', '2019-11-30', '01782084500000002', 1),
(39, 'RSMP7001', '2019-11-30', '01782084500000002', 1),
(40, 'RSMP7001', '2019-11-30', '01782084500000002', 1),
(41, 'RSMP7005', '2021-08-31', '01782084500000002', 12);

--
-- Triggers `tbl_request_jadwal`
--
DELIMITER $$
CREATE TRIGGER `nootif` AFTER INSERT ON `tbl_request_jadwal` FOR EACH ROW BEGIN
IF((SELECT COUNT(id_mapel) FROM tbl_request_jadwal WHERE id_mapel = new.id_mapel)>=3)
THEN INSERT INTO notif_req_jadwal(id_mapel, status) VALUES(new.id_mapel, '1');
 
   END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id_ruang` int(2) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(3) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `id_kec` int(2) NOT NULL,
  `id_jenjang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`, `id_kec`, `id_jenjang`) VALUES
(1, 'SDLB ABCD BINA MANDIRI', 3, 4),
(2, 'SLB NEGERI CINDOGO', 5, 4),
(3, 'SMAS RAUDLATUL FALAH', 2, 3),
(4, 'SMKN 1 CERMEE', 2, 3),
(5, 'SMKS DARUL FALAH', 2, 3),
(6, 'SMAS ISLAM TLOGOSARI', 3, 3),
(7, 'SMKN 1 TLOGOSARI', 3, 3),
(8, 'SMA ISLAM RA`IYATUL HUSNAN', 4, 3),
(9, 'SMA NURUL HIDAYAH', 4, 3),
(10, 'SMAS ISLAM DARUL FIKRI', 4, 3),
(11, 'SMKN 1 WRINGIN', 4, 3),
(12, 'SMK NAHDATUL ULAMA WRINGIN', 4, 3),
(13, 'SMKS AT TAUFIQ', 4, 3),
(14, 'SMAN 1 TAPEN', 5, 3),
(15, 'SMKN 1 TAPEN', 5, 3),
(16, 'SMK NAILUL HUDA', 5, 3),
(17, 'SMKS AL-AKHYAR', 5, 3),
(18, 'SMKS DARUL JANNAH', 5, 3),
(19, 'SMA NU NURUL HIKMAH', 6, 3),
(20, 'SMA RIYADUL ULUM', 6, 3),
(21, 'SMKN 1 MAESAN', 7, 3),
(22, 'SMKS SABILIL MUTTAQIN', 7, 3),
(23, 'SMAN 1 TENGGARANG', 8, 3),
(24, 'SMA ISLAM NURUL KHALIL', 8, 3),
(25, 'SMKS AL HIKAM', 8, 3),
(26, 'SMKS NU', 8, 3),
(27, 'SMKS Nurul Hidayah', 8, 3),
(28, 'SMKS AL MAARIF DARULMAGHFUR', 9, 3),
(29, 'SMKS DARUS SALAM', 9, 3),
(30, 'SMKS MANBAUL ULUM WONOSARI', 9, 3),
(31, 'SMKS MIFTAHUL ULUM', 9, 3),
(32, 'SMAN TAMANAN', 10, 3),
(33, 'SMKN 1 TAMANAN', 10, 3),
(34, 'SMK FATIHUL ULUM', 10, 3),
(35, 'SMKS ADZ DZAKIRIN', 10, 3),
(36, 'SMA ISLAM AS SYUHADA`', 11, 3),
(37, 'SMAS NURUL MARIFAH', 11, 3),
(38, 'SMKS RAUDLATUL HASAN', 11, 3),
(39, 'SMKS TARUNA HUSADA', 11, 3),
(40, 'SMAN GRUJUGAN', 12, 3),
(41, 'SMAS Islam Nurul Huda', 12, 3),
(42, 'SMKN 1 GRUJUGAN', 12, 3),
(43, 'SMK NURUL HASAN', 12, 3),
(44, 'SMKS NURUL ISLAM', 12, 3),
(45, 'SMAN 1 PUJER', 13, 3),
(46, 'SMAS ISLAM PUJER', 13, 3),
(47, 'SMKN 1 PUJER', 13, 3),
(48, 'SMK BUSTANUL ULUM PADASAN', 13, 3),
(49, 'SMKS DARUL ULUM', 13, 3),
(50, 'SMA ISLAM RAUDLATUL MUSTARSYIDIN', 14, 3),
(51, 'SMKN 1 SUMBERWRINGIN', 14, 3),
(52, 'SMKS SALAFIYAH SYAFIIYAH', 14, 3),
(53, 'SMA ISLAM AL-UTSMANI', 15, 3),
(54, 'SMK MIFTAHUL HASAN AL-UTSMANI', 15, 3),
(55, 'SMKS AL FURQON', 15, 3),
(56, 'SMKS AL IMAM', 15, 3),
(57, 'SMAN 1 PRAJEKAN', 16, 3),
(58, 'SMKN 1 PRAJEKAN', 16, 3),
(59, 'SMK NURUT TAQWA', 16, 3),
(60, 'SMKS MAMBAUL ULUM', 16, 3),
(61, 'SMKN 1 PAKEM', 17, 3),
(62, 'SMK NURUL FALAH PAKEM', 17, 3),
(63, 'SMKN 1 KLABANG', 18, 3),
(64, 'SMK PP Negeri 1 TEGALAMPEL', 19, 3),
(65, 'SMK MA ARIF TEGALAMPEL', 19, 3),
(66, 'SMAN 1 SUKOSARI', 20, 3),
(67, 'SMAS ISLAM AL FATAH', 20, 3),
(68, 'SMAS Islam Nurul Latif', 20, 3),
(69, 'SMK NU 02 BONDOWOSO', 20, 3),
(70, 'SMK NU 03 BONDOWOSO', 20, 3),
(71, 'SMKS NURUL FALAH', 22, 3),
(72, 'SMKN 1 SEMPOL', 23, 3),
(73, ' SMP Negeri 1 Cermee', 2, 2),
(74, ' SMP Negeri 2 Cermee', 2, 2),
(75, ' SMP Negeri 3 Satu Atap Cermee', 2, 2),
(76, ' SMP Negeri 4 Satu Atap Cermee', 2, 2),
(77, 'SMP NU 11', 2, 2),
(78, 'SMP NU 15 Cermee', 2, 2),
(79, ' SMP Negeri 1 Tlogosari', 3, 2),
(80, ' SMP Negeri 2 Satu Atap Tlogosari', 3, 2),
(81, 'SMP ISLAM AS SALAM', 3, 2),
(82, 'SMP NU 08 BONDOWOSO', 3, 2),
(83, 'SMP NURUL HUDA', 3, 2),
(84, ' SMP Negeri 1 Wringin', 4, 2),
(85, 'SMP AT-TAUFIQ', 4, 2),
(86, 'SMP ISLAM DARUL FIKRI', 4, 2),
(87, 'SMP ISLAM DARUSSALAM', 4, 2),
(88, 'SMP Nahdlatul Ulama 07 Wringin', 4, 2),
(89, ' SMP Negeri 1 Tapen', 5, 2),
(90, ' SMP Negeri 2 Tapen', 5, 2),
(91, 'SMP DARUL JANNAH', 5, 2),
(92, 'SMP ISLAM IBRAHIM HAMDANI', 5, 2),
(93, ' SMP Negeri 1 Satu Atap Botolinggo', 6, 2),
(94, ' SMP Negeri 2 Satu Atap Botolinggo', 6, 2),
(95, 'SMP NU 02', 6, 2),
(96, 'SMP NU 13 SUMBERCANTING BONDOWOSO', 6, 2),
(97, 'SMP THORIQUL JANNAH', 6, 2),
(98, ' SMP Negeri 1 Maesan', 7, 2),
(99, ' SMP Negeri 2 Maesan', 7, 2),
(100, ' SMP Negeri 3 Satu Atap Maesan', 7, 2),
(101, 'SMP Islam AL - MUSTAQIMY', 7, 2),
(102, 'SMP ISLAM DARUL MUWAHHIDIN', 7, 2),
(103, ' SMP Negeri 1 Tenggarang', 8, 2),
(104, ' SMP Negeri 2 Tenggarang', 8, 2),
(105, 'SMP ISLAM NURUL KHALIL', 8, 2),
(106, 'SMP NU 01', 8, 2),
(107, 'SMP NU 04', 8, 2),
(108, 'SMP NURUL ULAMA', 8, 2),
(109, 'SMP WISMA ASWAJA', 8, 2),
(110, ' SMP Negeri 1 Wonosari', 9, 2),
(111, 'SMP ARIEF IBRAHIM', 9, 2),
(112, 'SMP ISLAM TERPADU BINA INSAN CEMERLANG', 9, 2),
(113, 'SMP MANBAUL ULUM', 9, 2),
(114, 'SMP NU 09 BONDOWOSO', 9, 2),
(115, 'SMPS AL MAARIF DARUL MAGHFUR', 9, 2),
(116, ' SMP Negeri 1 Tamanan', 10, 2),
(117, ' SMP Negeri 2 Tamanan', 10, 2),
(118, ' SMP Negeri 3 Satu Atap Tamanan', 10, 2),
(119, 'SMP ADZ DZAKIRIN', 10, 2),
(120, 'SMP AL BAROKAH', 10, 2),
(121, 'SMP ISLAM AL FAUZI HASAN', 10, 2),
(122, 'SMP NU 14', 10, 2),
(123, ' SMP Negeri 1 Curahdami', 11, 2),
(124, 'SMP AL-MUHIBBIN', 11, 2),
(125, 'SMP ISLAM AS SYUHADA 45', 11, 2),
(126, 'SMP ISLAM RAUDLATUL HASAN', 11, 2),
(127, 'SMP NURUL KHALIL', 11, 2),
(128, ' SMP Negeri 1 Grujugan', 12, 2),
(129, ' SMP Negeri 2 Satu Atap Grujugan', 12, 2),
(130, 'SMP NURUL HUDA', 12, 2),
(131, 'SMP PLUS AL ISHLAH', 12, 2),
(132, ' SMP Negeri 1 Pujer', 13, 2),
(133, ' SMP Negeri 2 Satu Atap Pujer', 13, 2),
(134, 'SMP ISLAM AL BAROKAH', 13, 2),
(135, 'SMP MIFTAHUL ULUM PUJER', 13, 2),
(136, ' SMP Negeri 1 Sumber Wringin', 14, 2),
(137, ' SMP Negeri 2 Satu Atap Sumber Wringin', 14, 2),
(138, ' SMP Negeri 3 Satu Atap Sumber Wringin', 14, 2),
(139, 'SMP NU 03 BONDOWOSO', 14, 2),
(140, 'SMP RAUDLATUL MUSTARSYIDIN', 14, 2),
(141, ' SMP Negeri 1 Jambesari Darus Sholah', 15, 2),
(142, ' SMP Negeri 2 Satu Atap Jambesari DS', 15, 2),
(143, 'SMP AL FURQON', 15, 2),
(144, 'SMP ISLAM AL FATAH', 15, 2),
(145, 'SMP MIFTAHUL HASAN AL UTSMANI', 15, 2),
(146, 'SMP NU 06 JAMBESARI DARUS SHOLAH', 15, 2),
(147, 'SMP SUNAN KALIJOGO', 15, 2),
(148, ' SMP Negeri 1 Prajekan', 16, 2),
(149, ' SMP Negeri 2 Prajekan', 16, 2),
(150, 'SMP MAMBAUL ULUM', 16, 2),
(151, ' SMP Negeri 1 Pakem', 17, 2),
(152, ' SMP Negeri 2 Pakem', 17, 2),
(153, ' SMP Negeri 1 Klabang', 18, 2),
(154, ' SMP Negeri 1 Tegalampel', 19, 2),
(155, 'SMP ISLAM MIFTAHUL ULUM', 19, 2),
(156, 'SMP MAARIF 1 TEGALAMPEL', 19, 2),
(157, ' SMP Negeri 1 Sukosari', 20, 2),
(158, 'SMP NU 05 BONDOWOSO', 20, 2),
(159, 'SMP NU 10', 20, 2),
(160, ' SMP Negeri 1 Taman Krocok', 21, 2),
(161, ' SMP Negeri 1 Binakal', 22, 2),
(162, ' SMP Negeri 1 Ijen', 23, 2),
(163, ' SMP Negeri 2 Satu Atap Ijen', 23, 2),
(164, ' SD Negeri Badean 1 Kec. Bondowoso', 1, 1),
(165, ' SD Negeri Badean 2 Kec. Bondowoso', 1, 1),
(166, ' SD Negeri Badean 3 Kec. Bondowoso', 1, 1),
(167, ' SD Negeri Blindungan 1 Kec. Bondowoso', 1, 1),
(168, ' SD Negeri Blindungan 2 Kec. Bondowoso', 1, 1),
(169, ' SD Negeri Dabasah 1 Kec. Bondowoso', 1, 1),
(170, ' SD Negeri Dabasah 2 Kec. Bondowoso', 1, 1),
(171, ' SD Negeri Dabasah 3 Kec. Bondowoso', 1, 1),
(172, ' SD Negeri Dabasah 4 Kec. Bondowoso', 1, 1),
(173, ' SD Negeri Dabasah 5 Kec. Bondowoso', 1, 1),
(174, ' SD Negeri Kademangan 1 Kec. Bondowoso', 1, 1),
(175, ' SD Negeri Kademangan 2 Kec. Bondowoso', 1, 1),
(176, ' SD Negeri Kembang 1 Kec. Bondowoso', 1, 1),
(177, ' SD Negeri Kembang 2 Kec. Bondowoso', 1, 1),
(178, ' SD Negeri Kotakulon 1 Kec. Bondowoso', 1, 1),
(179, ' SD Negeri Kotakulon 2 Kec. Bondowoso', 1, 1),
(180, ' SD Negeri Kotakulon 3 Kec. Bondowoso', 1, 1),
(181, ' SD Negeri Kotakulon 4 Kec. Bondowoso', 1, 1),
(182, ' SD Negeri Nangkaan Kec. Bondowoso', 1, 1),
(183, ' SD Negeri Pancuran 1 Kec. Bondowoso', 1, 1),
(184, ' SD Negeri Pancuran 2 Kec. Bondowoso', 1, 1),
(185, ' SD Negeri Pancuran 3 Kec. Bondowoso', 1, 1),
(186, ' SD Negeri Pejaten 1 Kec. Bondowoso', 1, 1),
(187, ' SD Negeri Pejaten 2 Kec. Bondowoso', 1, 1),
(188, ' SD Negeri Sukowiryo 1 Kec. Bondowoso', 1, 1),
(189, ' SD Negeri Sukowiryo 2 Kec. Bondowoso', 1, 1),
(190, ' SD Negeri Tamansari 1 Kec. Bondowoso', 1, 1),
(191, ' SD Negeri Tamansari 2 Kec. Bondowoso', 1, 1),
(192, 'SD AL IRSYAD AL ISLAMIYAH', 1, 1),
(193, 'SD ISLAM HIDAYATUL HASAN', 1, 1),
(194, 'SD IT KUNTUM INSAN CEMERLANG', 1, 1),
(195, 'SD KRISTEN PETRA', 1, 1),
(196, 'SD MUHAMMADIYAH', 1, 1),
(197, 'SD YIMA ISLAMIC SCHOOL', 1, 1),
(198, 'SDI INTEGRAL LUQMAN AL HAKIM', 1, 1),
(199, 'SDK INDRA SISWA', 1, 1),
(200, 'SDN SULING WETAN 2', 2, 1),
(201, ' SD Negeri Bajuran 1 Kec. Cermee', 2, 1),
(202, ' SD Negeri Bajuran 2 Kec. Cermee', 2, 1),
(203, ' SD Negeri Bajuran 3 Kec. Cermee', 2, 1),
(204, ' SD Negeri Batu Ampar 1 Kec. Cermee', 2, 1),
(205, ' SD Negeri Batu Ampar 2 Kec. Cermee', 2, 1),
(206, ' SD Negeri Batu Salang Kec. Cermee', 2, 1),
(207, ' SD Negeri Bercak 1 Kec. Cermee', 2, 1),
(208, ' SD Negeri Bercak 2 Kec. Cermee', 2, 1),
(209, ' SD Negeri Bercak Asri 1 Kec. Cermee', 2, 1),
(210, ' SD Negeri Bercak Asri 2 Kec. Cermee', 2, 1),
(211, ' SD Negeri Cermee 1 Kec. Cermee', 2, 1),
(212, ' SD Negeri Cermee 2 Kec. Cermee', 2, 1),
(213, ' SD Negeri Cermee 3 Kec. Cermee', 2, 1),
(214, ' SD Negeri Cermee 4 Kec. Cermee', 2, 1),
(215, ' SD Negeri Cermee 5 Kec. Cermee', 2, 1),
(216, ' SD Negeri Grujukan 1 Kec. Cermee', 2, 1),
(217, ' SD Negeri Grujukan 2 Kec. Cermee', 2, 1),
(218, ' SD Negeri Jirek Mas 1 Kec. Cermee', 2, 1),
(219, ' SD Negeri Jirek Mas 2 Kec. Cermee', 2, 1),
(220, ' SD Negeri Kladi 1 Kec. Cermee', 2, 1),
(221, ' SD Negeri Kladi 2 Kec. Cermee', 2, 1),
(222, ' SD Negeri Palalangan 1 Kec. Cermee', 2, 1),
(223, ' SD Negeri Palalangan 2 Kec. Cermee', 2, 1),
(224, ' SD Negeri Palalangan 3 Kec. Cermee', 2, 1),
(225, ' SD Negeri Ramban Kulon 1 Kec. Cermee', 2, 1),
(226, ' SD Negeri Ramban Kulon 2 Kec. Cermee', 2, 1),
(227, ' SD Negeri Ramban Kulon 3 Kec. Cermee', 2, 1),
(228, ' SD Negeri Ramban Wetan 1 Kec. Cermee', 2, 1),
(229, ' SD Negeri Ramban Wetan 2 Kec. Cermee', 2, 1),
(230, ' SD Negeri Ramban Wetan 3 Kec. Cermee', 2, 1),
(231, ' SD Negeri Ramban Wetan 4 Kec. Cermee', 2, 1),
(232, ' SD Negeri Ramban Wetan 5 Kec. Cermee', 2, 1),
(233, ' SD Negeri Solor 1 Kec. Cermee', 2, 1),
(234, ' SD Negeri Solor 2 Kec. Cermee', 2, 1),
(235, ' SD Negeri Solor 3 Kec. Cermee', 2, 1),
(236, ' SD Negeri Solor 4 Kec. Cermee', 2, 1),
(237, ' SD Negeri Solor 5 Kec. Cermee', 2, 1),
(238, ' SD Negeri Suling Kulon 1 Kec. Cermee', 2, 1),
(239, ' SD Negeri Suling Kulon 2 Kec. Cermee', 2, 1),
(240, ' SD Negeri Suling Wetan 1 Kec. Cermee', 2, 1),
(241, 'SD NU 01', 2, 1),
(242, 'SD NU 02 CERMEE', 2, 1),
(243, 'SDN BRAMBANG DARUSSALAM 1', 3, 1),
(244, 'SDN GUNOSARI 3', 3, 1),
(245, 'SDN JEBUNG KIDUL 1', 3, 1),
(246, 'SDN JEBUNG KIDUL 2', 3, 1),
(247, 'SDN PAKISAN 1', 3, 1),
(248, 'SDN PAKISAN 2', 3, 1),
(249, 'SDN PAKISAN 3', 3, 1),
(250, 'SDN PAKISAN 4', 3, 1),
(251, 'SDN PAKISAN 6', 3, 1),
(252, 'SDN SULEK 1', 3, 1),
(253, 'SDN TLOGOSARI 2', 3, 1),
(254, 'SDN TROTOSARI 2', 3, 1),
(255, ' SD Negeri Brambang Darussalam 2 Kec. Tlogosari', 3, 1),
(256, ' SD Negeri Gunosari 1 Kec. Tlogosari', 3, 1),
(257, ' SD Negeri Gunosari 2 Kec. Tlogosari', 3, 1),
(258, ' SD Negeri Gunosari 4 Kec. Tlogosari', 3, 1),
(259, ' SD Negeri Jebung Lor 1 Kec. Tlogosari', 3, 1),
(260, ' SD Negeri Jebung Lor 2 Kec. Tlogosari', 3, 1),
(261, ' SD Negeri Kembangsari 1 Kec. Tlogosari', 3, 1),
(262, ' SD Negeri Kembangsari 2 Kec. Tlogosari', 3, 1),
(263, ' SD Negeri Kembangsari 3 Kec. Tlogosari', 3, 1),
(264, ' SD Negeri Kembangsari 4 Kec. Tlogosari', 3, 1),
(265, ' SD Negeri Kembangsari 5 Kec. Tlogosari', 3, 1),
(266, ' SD Negeri Pakisan 5 Kec. Tlogosari', 3, 1),
(267, ' SD Negeri Patemon 1 Kec. Tlogosari', 3, 1),
(268, ' SD Negeri Patemon 2 Kec. Tlogosari', 3, 1),
(269, ' SD Negeri Patemon 3 Kec. Tlogosari', 3, 1),
(270, ' SD Negeri Sulek 2 Kec. Tlogosari', 3, 1),
(271, ' SD Negeri Sulek 3 Kec. Tlogosari', 3, 1),
(272, ' SD Negeri Tlogosari 1 Kec. Tlogosari', 3, 1),
(273, ' SD Negeri Tlogosari 3 Kec. Tlogosari', 3, 1),
(274, ' SD Negeri Tlogosari 4 Kec. Tlogosari', 3, 1),
(275, ' SD Negeri Trotosari 1 Kec. Tlogosari', 3, 1),
(276, ' SD Negeri Trotosari 3 Kec. Tlogosari', 3, 1),
(277, ' SD Negeri Trotosari 4 Kec. Tlogosari', 3, 1),
(278, ' SD Negeri Ambulu 1 Kec. Wringin', 4, 1),
(279, ' SD Negeri Ambulu 2 Kec. Wringin', 4, 1),
(280, ' SD Negeri Ampelan 1 Kec. Wringin', 4, 1),
(281, ' SD Negeri Ampelan 2 Kec. Wringin', 4, 1),
(282, ' SD Negeri Banyuputih Kec. Wringin', 4, 1),
(283, ' SD Negeri Banyuwulu 1 Kec. Wringin', 4, 1),
(284, ' SD Negeri Banyuwulu 2 Kec. Wringin', 4, 1),
(285, ' SD Negeri Banyuwulu 3 Kec. Wringin', 4, 1),
(286, ' SD Negeri Banyuwulu 4 Kec. Wringin', 4, 1),
(287, ' SD Negeri Bukor Kec. Wringin', 4, 1),
(288, ' SD Negeri Glingseran Kec. Wringin', 4, 1),
(289, ' SD Negeri Gubrih 1 Kec. Wringin', 4, 1),
(290, ' SD Negeri Gubrih 2 Kec. Wringin', 4, 1),
(291, ' SD Negeri Jambewungu 1 Kec. Wringin', 4, 1),
(292, ' SD Negeri Jambewungu 2 Kec. Wringin', 4, 1),
(293, ' SD Negeri Jatisari Kec. Wringin', 4, 1),
(294, ' SD Negeri Jatitamban Kec. Wringin', 4, 1),
(295, ' SD Negeri Sumber Canting 1 Kec. Wringin', 4, 1),
(296, ' SD Negeri Sumber Canting 2 Kec. Wringin', 4, 1),
(297, ' SD Negeri Sumber Canting 3 Kec. Wringin', 4, 1),
(298, ' SD Negeri Sumber Canting 4 Kec. Wringin', 4, 1),
(299, ' SD Negeri Sumber Malang Kec. Wringin', 4, 1),
(300, ' SD Negeri Wringin 1 Kec. Wringin', 4, 1),
(301, ' SD Negeri Wringin 2 Kec. Wringin', 4, 1),
(302, ' SD Negeri Wringin 3 Kec. Wringin', 4, 1),
(303, ' SD Negeri Wringin 4 Kec. Wringin', 4, 1),
(304, ' SD Negeri Wringin 5 Kec. Wringin', 4, 1),
(305, 'SDI NURUL HIDAYAH', 4, 1),
(306, 'SDN CINDOGO 2', 5, 1),
(307, 'SDN GUNUNGANYAR 1', 5, 1),
(308, 'SDN GUNUNGANYAR 2', 5, 1),
(309, 'SDN JURANGSAPI 1', 5, 1),
(310, 'SDN JURANGSAPI 2', 5, 1),
(311, 'SDN JURANGSAPI 3', 5, 1),
(312, 'SDN KALITAPEN 1', 5, 1),
(313, 'SDN KALITAPEN 2', 5, 1),
(314, 'SDN KALITAPEN 3', 5, 1),
(315, 'SDN MANGLI WETAN 1', 5, 1),
(316, 'SDN MANGLI WETAN 2', 5, 1),
(317, 'SDN MRAWAN 1', 5, 1),
(318, 'SDN MRAWAN 2', 5, 1),
(319, 'SDN TAAL 2', 5, 1),
(320, 'SDN TAAL 3', 5, 1),
(321, 'SDN TAPEN 1', 5, 1),
(322, 'SDN TAPEN 2', 5, 1),
(323, 'SDN TAPEN 3', 5, 1),
(324, 'SDN WONOKUSUMO 1', 5, 1),
(325, 'SDN WONOKUSUMO 2', 5, 1),
(326, 'SDN WONOKUSUMO 3', 5, 1),
(327, 'SDN WONOKUSUMO 4', 5, 1),
(328, ' SD Negeri Cindogo 1 Kec. Tapen', 5, 1),
(329, ' SD Negeri Taal 1 Kec. Tapen', 5, 1),
(330, ' SD Negeri Botolinggo 1 Kec. Botolinggo', 6, 1),
(331, ' SD Negeri Botolinggo 2 Kec. Botolinggo', 6, 1),
(332, ' SD Negeri Botolinggo 3 Kec. Botolinggo', 6, 1),
(333, ' SD Negeri Gayam Kidul 1 Kec. Botolinggo', 6, 1),
(334, ' SD Negeri Gayam Kidul 2 Kec. Botolinggo', 6, 1),
(335, ' SD Negeri Gayam Kidul 3 Kec. Botolinggo', 6, 1),
(336, ' SD Negeri Gayam Kidul 4 Kec. Botolinggo', 6, 1),
(337, ' SD Negeri Gayam Lor 1 Kec. Botolinggo', 6, 1),
(338, ' SD Negeri Gayam Lor 2 Kec. Botolinggo', 6, 1),
(339, ' SD Negeri Klekean 1 Kec. Botolinggo', 6, 1),
(340, ' SD Negeri Klekean 2 Kec. Botolinggo', 6, 1),
(341, ' SD Negeri Lanas 1 Kec. Botolinggo', 6, 1),
(342, ' SD Negeri Lanas 2 Kec. Botolinggo', 6, 1),
(343, ' SD Negeri Lanas 3 Kec. Botolinggo', 6, 1),
(344, ' SD Negeri Lanas 4 Kec. Botolinggo', 6, 1),
(345, ' SD Negeri Lumutan 1 Kec. Botolinggo', 6, 1),
(346, ' SD Negeri Lumutan 2 Kec. Botolinggo', 6, 1),
(347, ' SD Negeri Lumutan 3 Kec. Botolinggo', 6, 1),
(348, ' SD Negeri Pancur 1 Kec. Botolinggo', 6, 1),
(349, ' SD Negeri Pancur 2 Kec. Botolinggo', 6, 1),
(350, ' SD Negeri Penang 1 Kec. Botolinggo', 6, 1),
(351, ' SD Negeri Penang 2 Kec. Botolinggo', 6, 1),
(352, ' SD Negeri Penang 3 Kec. Botolinggo', 6, 1),
(353, ' SD Negeri Penang 4 Kec. Botolinggo', 6, 1),
(354, ' SD Negeri Sumber Canting 1 Kec. Botolinggo', 6, 1),
(355, ' SD Negeri Sumber Canting 2 Kec. Botolinggo', 6, 1),
(356, 'SD AL FATIMAH', 6, 1),
(357, 'SDN GAMBANGAN 1', 7, 1),
(358, 'SDN MAESAN', 7, 1),
(359, 'SDN SUGERLOR 1', 7, 1),
(360, 'SDN SUMBERANYAR 2', 7, 1),
(361, 'SDN SUMBERSARI 3', 7, 1),
(362, ' SD Negeri Gambangan 2 Kec. Maesan', 7, 1),
(363, ' SD Negeri Gunungsari 1 Kec. Maesan', 7, 1),
(364, ' SD Negeri Gunungsari 2 Kec. Maesan', 7, 1),
(365, ' SD Negeri Pakuniran 1 Kec. Maesan', 7, 1),
(366, ' SD Negeri Pakuniran 2 Kec. Maesan', 7, 1),
(367, ' SD Negeri Penanggungan Kec. Maesan', 7, 1),
(368, ' SD Negeri Pujer Baru 1 Kec. Maesan', 7, 1),
(369, ' SD Negeri Pujer Baru 2 Kec. Maesan', 7, 1),
(370, ' SD Negeri Pujer Baru 3 Kec. Maesan', 7, 1),
(371, ' SD Negeri Sucolor 1 Kec. Maesan', 7, 1),
(372, ' SD Negeri Sucolor 2 Kec. Maesan', 7, 1),
(373, ' SD Negeri Sucolor 3 Kec. Maesan', 7, 1),
(374, ' SD Negeri Suger Lor 2 Kec. Maesan', 7, 1),
(375, ' SD Negeri Suger Lor 3 Kec.  Maesan', 7, 1),
(376, ' SD Negeri Sumber Anyar 1 Kec. Maesan', 7, 1),
(377, ' SD Negeri Sumber Pakem 1 Kec. Maesan', 7, 1),
(378, ' SD Negeri Sumber Pakem 2 Kec. Maesan', 7, 1),
(379, ' SD Negeri Sumbersari 1 Kec. Maesan', 7, 1),
(380, ' SD Negeri Sumbersari 2 Kec. Maesan', 7, 1),
(381, ' SD Negeri Tanah Wulan 2 Kec. Maesan', 7, 1),
(382, ' SD Negeri Tanahwulan 1 Kec. Maesan', 7, 1),
(383, ' SD Negeri  Pekalangan 2 Kec. Tenggarang', 8, 1),
(384, ' SD Negeri Bataan 1 Kec. Tenggarang', 8, 1),
(385, ' SD Negeri Bataan 2 Kec. Tenggarang', 8, 1),
(386, ' SD Negeri Dawuhan Kec. Tenggarang', 8, 1),
(387, ' SD Negeri Gebang Kec. Tenggarang', 8, 1),
(388, ' SD Negeri Kajar 1 Kec. Tenggarang', 8, 1),
(389, ' SD Negeri Kajar 2 Kec. Tenggarang', 8, 1),
(390, ' SD Negeri Kasemek 1 Kec. Tenggarang', 8, 1),
(391, ' SD Negeri Kasemek 2 Kec. Tenggarang', 8, 1),
(392, ' SD Negeri Koncer 1 Kec. Tenggarang', 8, 1),
(393, ' SD Negeri Koncer 2 Kec. Tenggarang', 8, 1),
(394, ' SD Negeri Lojajar Kec. Tenggarang', 8, 1),
(395, ' SD Negeri Pekalangan 1 Kec. Tenggarang', 8, 1),
(396, ' SD Negeri Pekalangan 3 Kec. Tenggarang', 8, 1),
(397, ' SD Negeri Sumber Salam 1 Kec. Tenggarang', 8, 1),
(398, ' SD Negeri Sumber Salam 2 Kec. Tenggarang', 8, 1),
(399, ' SD Negeri Tangsil Kulon 1 Kec. Tenggarang', 8, 1),
(400, ' SD Negeri Tangsil Kulon 2 Kec. Tenggarang', 8, 1),
(401, ' SD Negeri Tenggarang 1 Kec. Tenggarang', 8, 1),
(402, ' SD Negeri Tenggarang 2 Kec. Tenggarang', 8, 1),
(403, ' SD Negeri Tenggarang 3 Kec. Tenggarang', 8, 1),
(404, 'SDN BENDOARUM 1', 9, 1),
(405, 'SDN BENDOARUM 2', 9, 1),
(406, 'SDN JUMPONG', 9, 1),
(407, 'SDN LOMBOK KULON 1', 9, 1),
(408, 'SDN LOMBOK KULON 2', 9, 1),
(409, 'SDN LOMBOK KULON 3', 9, 1),
(410, 'SDN PASAREJO 1', 9, 1),
(411, 'SDN PELALANGAN', 9, 1),
(412, 'SDN TANGSIL WETAN 2', 9, 1),
(413, 'SDN TRAKTAKAN 1', 9, 1),
(414, 'SDN WONOSARI 1', 9, 1),
(415, ' SD Negeri Kapuran Kec. Wonosari', 9, 1),
(416, ' SD Negeri Lombok Wetan Kec. Wonosari', 9, 1),
(417, ' SD Negeri Pasarejo 2 Kec. Wonosari', 9, 1),
(418, ' SD Negeri Sumber Kalong Kec. Wonosari', 9, 1),
(419, ' SD Negeri Tangsil Wetan 1 Kec. Wonosari', 9, 1),
(420, ' SD Negeri Tangsil Wetan 3 Kec. Wonosari', 9, 1),
(421, ' SD Negeri Traktakan 2 Kec. Wonosari', 9, 1),
(422, ' SD Negeri Tumpeng 1 Kec. Wonosari', 9, 1),
(423, ' SD Negeri Tumpeng 2 Kec. Wonosari', 9, 1),
(424, ' SD Negeri Wonosari 2 Kec. Wonosari', 9, 1),
(425, ' SD Negeri Wonosari 3 Kec. Wonosari', 9, 1),
(426, 'SD DARUT THALABAH', 9, 1),
(427, ' SD Negeri Kalianyar 1 Kec. Tamanan', 10, 1),
(428, ' SD Negeri Kalianyar 2 Kec. Tamanan', 10, 1),
(429, ' SD Negeri Karang Melok 1 Kec. Tamanan', 10, 1),
(430, ' SD Negeri Karang Melok 2 Kec. Tamanan', 10, 1),
(431, ' SD Negeri Kemirian 1 Kec. Tamanan', 10, 1),
(432, ' SD Negeri Kemirian 2 Kec. Tamanan', 10, 1),
(433, ' SD Negeri Mengen 1 Kec. Tamanan', 10, 1),
(434, ' SD Negeri Mengen 2 Kec. Tamanan', 10, 1),
(435, ' SD Negeri Sukosari 1 Kec. Tamanan', 10, 1),
(436, ' SD Negeri Sukosari 2 Kec. Tamanan', 10, 1),
(437, ' SD Negeri Sumber Anom Kec. Tamanan', 10, 1),
(438, ' SD Negeri Sumber Kemuning 1 Kec. Tamanan', 10, 1),
(439, ' SD Negeri Sumber Kemuning 2 Kec. Tamanan', 10, 1),
(440, ' SD Negeri Tamanan 1 Kec. Tamanan', 10, 1),
(441, ' SD Negeri Tamanan 2 Kec. Tamanan', 10, 1),
(442, ' SD Negeri Tamanan 3 Kec. Tamanan', 10, 1),
(443, ' SD Negeri Wonosuko 1 Kec. Tamanan', 10, 1),
(444, ' SD Negeri Wonosuko 2 Kec. Tamanan', 10, 1),
(445, ' SD Negeri Wonosuko 3 Kec. Tamanan', 10, 1),
(446, ' SD Negeri Wonosuko 4 Kec. Tamanan', 10, 1),
(447, ' SD Negeri Curahdami 1 Kec. Curahdami', 11, 1),
(448, ' SD Negeri Curahdami 2 Kec. Curahdami', 11, 1),
(449, ' SD Negeri Curahdami 3 Kec. Curahdami', 11, 1),
(450, ' SD Negeri Curahpoh 1 Kec. Curahdami', 11, 1),
(451, ' SD Negeri Curahpoh 2 Kec. Curahdami', 11, 1),
(452, ' SD Negeri Jetis 1 Kec. Curahdami', 11, 1),
(453, ' SD Negeri Jetis 2 Kec. Curahdami', 11, 1),
(454, ' SD Negeri Jetis 3 Kec. Curahdami', 11, 1),
(455, ' SD Negeri Kupang Kec. Curahdami', 11, 1),
(456, ' SD Negeri Locare 1 Kec. Curahdami', 11, 1),
(457, ' SD Negeri Locare 2 Kec. Curahdami', 11, 1),
(458, ' SD Negeri Pakuwesi 1 Kec. Curahdami', 11, 1),
(459, ' SD Negeri Pakuwesi 2 Kec. Curahdami', 11, 1),
(460, ' SD Negeri Penambangan Kec. Curahdami', 11, 1),
(461, ' SD Negeri Petung 1 Kec. Curahdami', 11, 1),
(462, ' SD Negeri Petung 2 Kec. Curahdami', 11, 1),
(463, ' SD Negeri Poncogati 1 Kec. Curahdami', 11, 1),
(464, ' SD Negeri Poncogati 2 Kec. Curahdami', 11, 1),
(465, ' SD Negeri Selolembu Kec. Curahdami', 11, 1),
(466, ' SD Negeri Sumber Salak Kec. Curahdami', 11, 1),
(467, ' SD Negeri Sumbersuko 1 Kec. Curahdami', 11, 1),
(468, ' SD Negeri Sumbersuko 2 Kec. Curahdami', 11, 1),
(469, 'SDN DAWUHAN', 12, 1),
(470, ' SD Negeri Dadapan 1 Kec. Grujugan', 12, 1),
(471, ' SD Negeri Dadapan 2 Kec. Grujugan', 12, 1),
(472, ' SD Negeri Grujugan Kidul 1 Kec. Grujugan', 12, 1),
(473, ' SD Negeri Grujugan Kidul 2 Kec. Grujugan', 12, 1),
(474, ' SD Negeri Grujugan Kidul 3 Kec. Grujugan', 12, 1),
(475, ' SD Negeri Kabuaran 1 Kec. Grujugan', 12, 1),
(476, ' SD Negeri Kabuaran 2 Kec. Grujugan', 12, 1),
(477, ' SD Negeri Kejawan Kec. Grujugan', 12, 1),
(478, ' SD Negeri Pekauman Kec. Grujugan', 12, 1),
(479, ' SD Negeri Sumber Pandan 1 Kec. Grujugan', 12, 1),
(480, ' SD Negeri Sumberpandan 2 Kec. Grujugan', 12, 1),
(481, ' SD Negeri Taman 1 Kec. Grujugan', 12, 1),
(482, ' SD Negeri Taman 2 Kec. Grujugan', 12, 1),
(483, ' SD Negeri Tegalmijin 1 Kec. Grujugan', 12, 1),
(484, ' SD Negeri Tegalmijin 2 Kec. Grujugan', 12, 1),
(485, ' SD Negeri Wanisodo Kec. Grujugan', 12, 1),
(486, ' SD Negeri Wonosari 1 Kec. Grujugan', 12, 1),
(487, ' SD Negeri Wonosari 2 Kec. Grujugan', 12, 1),
(488, ' SD Negeri Wonosari 3 Kec. Grujugan', 12, 1),
(489, ' SD Negeri Wonosari 4 Kec. Grujugan', 12, 1),
(490, 'SD PLUS AL ISLAH', 12, 1),
(491, 'SDN KEJAYAN 1', 13, 1),
(492, 'SDN MANGLI', 13, 1),
(493, 'SDN MASKUNING WETAN 1', 13, 1),
(494, 'SDN PADASAN', 13, 1),
(495, 'SDN SUKODONO 1', 13, 1),
(496, 'SDN SUKOKERTO 1', 13, 1),
(497, 'SDN SUKOKERTO 2', 13, 1),
(498, ' SD Negeri Alassumur 1 Kec. Pujer', 13, 1),
(499, ' SD Negeri Alassumur 2 Kec. Pujer', 13, 1),
(500, ' SD Negeri Kejayan 2 Kec. Pujer', 13, 1),
(501, ' SD Negeri Kejayan 3 Kec. Pujer', 13, 1),
(502, ' SD Negeri Maskuning Kulon 1 Kec. Pujer', 13, 1),
(503, ' SD Negeri Maskuning Kulon 2 Kec. Pujer', 13, 1),
(504, ' SD Negeri Maskuning Wetan 2 Kec. Pujer', 13, 1),
(505, ' SD Negeri Maskuning Wetan 3 Kec. Pujer', 13, 1),
(506, ' SD Negeri Mengok 1 Kec. Pujer', 13, 1),
(507, ' SD Negeri Mengok 2 Kec. Pujer', 13, 1),
(508, ' SD Negeri Randulima Kec. Pujer', 13, 1),
(509, ' SD Negeri Sukodono 2 Kec. Pujer', 13, 1),
(510, ' SD Negeri Sukowono Kec. Pujer', 13, 1),
(511, 'SDN REJOAGUNG 1', 14, 1),
(512, 'SDN REJOAGUNG 3', 14, 1),
(513, 'SDN SUKOREJO 1', 14, 1),
(514, 'SDN SUKOREJO 2', 14, 1),
(515, 'SDN SUKOREJO 3', 14, 1),
(516, 'SDN SUKOREJO 5', 14, 1),
(517, 'SDN SUKOREJO 6', 14, 1),
(518, 'SDN SUKOSARI KIDUL 1', 14, 1),
(519, 'SDN SUKOSARI KIDUL 2', 14, 1),
(520, 'SDN SUMBER GADING', 14, 1),
(521, 'SDN SUMBER WRINGIN 1', 14, 1),
(522, 'SDN SUMBER WRINGIN 2', 14, 1),
(523, 'SDN TEGALJATI 1', 14, 1),
(524, 'SDN TEGALJATI 2', 14, 1),
(525, ' SD Negeri Rejoagung 2 Kec. Sumber Wringin', 14, 1),
(526, ' SD Negeri Rejoagung 4 Kec. Sumber Wringin', 14, 1),
(527, ' SD Negeri Rejoagung 5 Kec. Sumber Wringin', 14, 1),
(528, ' SD Negeri Sukorejo 4 Kec. Sumber Wringin', 14, 1),
(529, ' SD Negeri Tegaljati 3 Kec. Sumber Wringin', 14, 1),
(530, 'SD RAUDLATUL MUSTARSYIDIN', 14, 1),
(531, 'SDN GRUJUGAN LOR 1', 15, 1),
(532, 'SDN GRUJUGAN LOR 2', 15, 1),
(533, 'SDN JAMBEANOM 1', 15, 1),
(534, 'SDN JAMBEANOM 2', 15, 1),
(535, 'SDN JAMBESARI 1', 15, 1),
(536, 'SDN JAMBESARI 2', 15, 1),
(537, 'SDN JAMBESARI 3', 15, 1),
(538, 'SDN PEJAGAN', 15, 1),
(539, 'SDN PENGARANG 1', 15, 1),
(540, 'SDN PENGARANG 2', 15, 1),
(541, 'SDN PENGARANG 3', 15, 1),
(542, 'SDN PUCANGANOM 1', 15, 1),
(543, 'SDN PUCANGANOM 2', 15, 1),
(544, 'SDN SUMBER JERUK 1', 15, 1),
(545, 'SDN SUMBER JERUK 2', 15, 1),
(546, 'SDN TEGALPASIR', 15, 1),
(547, ' SD Negeri Sumber Anyar Kec. Jambesari DS', 15, 1),
(548, ' SD Negeri Bandilan 1 Kec. Prajekan', 16, 1),
(549, ' SD Negeri Bandilan 2 Kec. Prajekan', 16, 1),
(550, ' SD Negeri Bandilan 3 Kec. Prajekan', 16, 1),
(551, ' SD Negeri Bandilan 4 Kec. Prajekan', 16, 1),
(552, ' SD Negeri Bandilan 5 Kec. Prajekan', 16, 1),
(553, ' SD Negeri Cangkring Kec. Prajekan', 16, 1),
(554, ' SD Negeri Prajekan Kidul 1 Kec. Prajekan', 16, 1),
(555, ' SD Negeri Prajekan Kidul 2 Kec. Prajekan', 16, 1),
(556, ' SD Negeri Prajekan Kidul 3 Kec. Prajekan', 16, 1),
(557, ' SD Negeri Prajekan Lor 1 Kec. Prajekan', 16, 1),
(558, ' SD Negeri Prajekan Lor 2 Kec. Prajekan', 16, 1),
(559, ' SD Negeri Sempol 1 Kec. Prajekan', 16, 1),
(560, ' SD Negeri Sempol 2 Kec. Prajekan', 16, 1),
(561, ' SD Negeri Sempol 3 Kec. Prajekan', 16, 1),
(562, ' SD Negeri Sempol 4 Kec. Prajekan', 16, 1),
(563, ' SD Negeri Tarum Kec. Prajekan', 16, 1),
(564, ' SD Negeri Walidono 1 Kec. Prajekan', 16, 1),
(565, ' SD Negeri Walidono 2 Kec. Prajekan', 16, 1),
(566, ' SD Negeri Walidono 3 Kec. Prajekan', 16, 1),
(567, ' SD Negeri Walidono 4 Kec. Prajekan', 16, 1),
(568, ' SD Negeri Andungsari 1 Kec. Pakem', 17, 1),
(569, ' SD Negeri Andungsari 2 Kec. Pakem', 17, 1),
(570, ' SD Negeri Ardisaeng 1 Kec. Pakem', 17, 1),
(571, ' SD Negeri Ardisaeng 2 Kec. Pakem', 17, 1),
(572, ' SD Negeri Gadingsari 1 Kec. Pakem', 17, 1),
(573, ' SD Negeri Gadingsari 2 Kec. Pakem', 17, 1),
(574, ' SD Negeri Kupang 1 Kec. Pakem', 17, 1),
(575, ' SD Negeri Kupang 2 Kec. Pakem', 17, 1),
(576, ' SD Negeri Kupang 3 Kec. Pakem', 17, 1),
(577, ' SD Negeri Pakem Kec. Pakem', 17, 1),
(578, ' SD Negeri Patemon 1 Kec. Pakem', 17, 1),
(579, ' SD Negeri Patemon 2 Kec. Pakem', 17, 1),
(580, ' SD Negeri Petung 1 Kec. Pakem', 17, 1),
(581, ' SD Negeri Petung 2 Kec. Pakem', 17, 1),
(582, ' SD Negeri Sumber Dumpyong 2 Kec. Pakem', 17, 1),
(583, ' SD Negeri Sumber Dumpyong 3 Kec. Pakem', 17, 1),
(584, ' SD Negeri Sumber Dumpyong.1 Kec. Pakem', 17, 1),
(585, 'SDN LEPRAK 1', 18, 1),
(586, ' SD Negeri Besuk Kec. Klabang', 18, 1),
(587, ' SD Negeri Blimbing 1 Kec. Klabang', 18, 1),
(588, ' SD Negeri Blimbing 2 Kec. Klabang', 18, 1),
(589, ' SD Negeri Blimbing 3 Kec. Klabang', 18, 1),
(590, ' SD Negeri Karanganyar 1 Kec. Klabang', 18, 1),
(591, ' SD Negeri Karanganyar 2 Kec. Klabang', 18, 1),
(592, ' SD Negeri Karangsengon 1 Kec. Klabang', 18, 1),
(593, ' SD Negeri Karangsengon 2 Kec. Klabang', 18, 1),
(594, ' SD Negeri Klabang Kec. Klabang', 18, 1),
(595, ' SD Negeri Leprak 2 Kec. Klabang', 18, 1),
(596, ' SD Negeri Leprak 3 Kec. Klabang', 18, 1),
(597, ' SD Negeri Pandak 1 Kec. Klabang', 18, 1),
(598, ' SD Negeri Pandak 2 Kec. Klabang', 18, 1),
(599, ' SD Negeri Sumbersuko 1 Kec. Klabang', 18, 1),
(600, ' SD Negeri Sumbersuko 2 Kec. Klabang', 18, 1),
(601, ' SD Negeri Wonoboyo 1 Kec. Klabang', 18, 1),
(602, ' SD Negeri Wonoboyo 2 Kec. Klabang', 18, 1),
(603, ' SD Negeri Wonoboyo 3 Kec. Klabang', 18, 1),
(604, ' SD Negeri Karanganyar 1 Kec. Tegalampel', 19, 1),
(605, ' SD Negeri Karanganyar 2 Kec. Tegalampel', 19, 1),
(606, ' SD Negeri Karanganyar 3 Kec. Tegalampel', 19, 1),
(607, ' SD Negeri Klabang 1 Kec. Tegalampel', 19, 1),
(608, ' SD Negeri Klabang 2 Kec. Tegalampel', 19, 1),
(609, ' SD Negeri Klabang 3 Kec. Tegalampel', 19, 1),
(610, ' SD Negeri Klabang Agung Kec. Tegalampel', 19, 1),
(611, ' SD Negeri Mandiro 1 Kec. Tegalampel', 19, 1),
(612, ' SD Negeri Mandiro 2 Kec. Tegalampel', 19, 1),
(613, ' SD Negeri Mandiro 3 Kec. Tegalampel', 19, 1),
(614, ' SD Negeri Purnama 1 Kec. Tegalampel', 19, 1),
(615, ' SD Negeri Sekarputih 1 Kec. Tegalampel', 19, 1),
(616, ' SD Negeri Sekarputih 2 Kec. Tegalampel', 19, 1),
(617, ' SD Negeri Tanggulangin 1 Kec. Tegalampel', 19, 1),
(618, ' SD Negeri Tanggulangin 2 Kec. Tegalampel', 19, 1),
(619, ' SD Negeri Tegalampel Kec. Tegalampel', 19, 1),
(620, 'SDN KERANG', 20, 1),
(621, 'SDN NOGOSARI 1', 20, 1),
(622, 'SDN NOGOSARI 2', 20, 1),
(623, 'SDN NOGOSARI 3', 20, 1),
(624, 'SDN PECALONGAN 1', 20, 1),
(625, 'SDN PECALONGAN 3', 20, 1),
(626, 'SDN SUKOSARI 1', 20, 1),
(627, 'SDN SUKOSARI 2', 20, 1),
(628, 'SDN SUKOSARI 3', 20, 1),
(629, 'SDN SUKOSARI 4', 20, 1),
(630, ' SD Negeri Pecalongan 2 Kec. Sukosari', 20, 1),
(631, ' SD Negeri Gentong 1 Kec. Tamankrocok', 21, 1),
(632, ' SD Negeri Gentong 2 Kec. Tamankrocok', 21, 1),
(633, ' SD Negeri Kemuningan 1 Kec. Tamankrocok', 21, 1),
(634, ' SD Negeri Kemuningan 2 Kec. Tamankrocok', 21, 1),
(635, ' SD Negeri Kemuningan 3 Kec. Taman Krocok', 21, 1),
(636, ' SD Negeri Kretek 1 Kec. Tamankrocok', 21, 1),
(637, ' SD Negeri Kretek 2 Kec. Taman Krocok', 21, 1),
(638, ' SD Negeri Kretek 3 Kec. Taman Krocok', 21, 1),
(639, ' SD Negeri Paguan 1 Kec. Taman Krocok', 21, 1),
(640, ' SD Negeri Paguan 2 Kec. Taman Krocok', 21, 1),
(641, ' SD Negeri Sumber Kokap 1 Kec. Taman Krocok', 21, 1),
(642, ' SD Negeri Sumber Kokap 2 Kec. Taman Krocok', 21, 1),
(643, ' SD Negeri Taman 1 Kec. Taman Krocok', 21, 1),
(644, ' SD Negeri Taman 2 Kec. Taman Krocok', 21, 1),
(645, ' SD Negeri Taman 3 Kec. Taman Krocok', 21, 1),
(646, ' SD Negeri Trebungan Kec. Taman Krocok', 21, 1),
(647, ' SD Negeri Baratan Kec. Binakal', 22, 1),
(648, ' SD Negeri Bendelan 1 Kec. Binakal', 22, 1),
(649, ' SD Negeri Bendelan 2 Kec. Binakal', 22, 1),
(650, ' SD Negeri Bendelan 3 Kec. Binakal', 22, 1),
(651, ' SD Negeri Binakal Kec. Binakal', 22, 1),
(652, ' SD Negeri Gadingsari Kec. Binakal', 22, 1),
(653, ' SD Negeri Jeruk Soksok 1 Kec. Binakal', 22, 1),
(654, ' SD Negeri Jeruk Soksok 2 Kec. Binakal', 22, 1),
(655, ' SD Negeri Jeruk Soksok 3 Kec. Binakal', 22, 1),
(656, ' SD Negeri Kembangan Kec. Binakal', 22, 1),
(657, ' SD Negeri Sumber Tengah 1 Kec. Binakal', 22, 1),
(658, ' SD Negeri Sumber Tengah 2 Kec. Binakal', 22, 1),
(659, ' SD Negeri Sumberwaru 1 Kec. Binakal', 22, 1),
(660, ' SD Negeri Sumberwaru 2 Kec. Binakal', 22, 1),
(661, 'SDN JAMPIT 2', 23, 1),
(662, 'SDN KALIANYAR 3', 23, 1),
(663, 'SDN SUMBEREJO', 23, 1),
(664, ' SD Negeri Jampit 1 Kec. Ijen', 23, 1),
(665, ' SD Negeri Kalianyar 1 Kec. Ijen', 23, 1),
(666, ' SD Negeri Kalianyar 2 Kec. Ijen', 23, 1),
(667, ' SD Negeri Kaligedang Kec. Ijen', 23, 1),
(668, ' SD Negeri Kalisat Kec. Ijen', 23, 1),
(669, ' SD Negeri Sempol 1 Kec. Ijen', 23, 1),
(670, ' SD Negeri Sempol 2 Kec. Ijen', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(17) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(10) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_sekolah` int(3) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `agama` enum('Islam','Katholik','Kristen','Hindu','Budha','Kong Hu Cu','Lain-Lain') NOT NULL,
  `email` varchar(60) NOT NULL,
  `id_program` int(2) DEFAULT '1',
  `no_hp` varchar(14) DEFAULT NULL,
  `id_kelas` int(2) DEFAULT '99',
  `foto` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_lengkap`, `nama_panggilan`, `tempat`, `tanggal_lahir`, `id_sekolah`, `id_grade`, `jenis_kelamin`, `alamat`, `agama`, `email`, `id_program`, `no_hp`, `id_kelas`, `foto`) VALUES
('01782084500000002', 'Deby', 'deby', 'Bondowoso', '1996-02-17', 21, 1, 'Laki-laki', 'Tapen,', 'Islam', 'deb1y@gmail.com', 4, '087645365432', 1, '01782084500000002.jpg'),
('01782084500000003', 'Ahmad Munir', 'munir', 'Bondowoso', '1999-02-14', 23, 12, 'Laki-laki', 'Sukosari', 'Islam', 'hel000941@gmail.com', 3, NULL, 2, 'default.png'),
('01782084500000005', 'Yanuar Tegar Pamungkas', 'Yanu', 'Bondowoso', '2000-09-09', 85, 7, 'Laki-laki', 'Bondowoso', 'Islam', 'yanu@gmail.com', 2, NULL, 2, 'default.png'),
('01782084500000007', 'Ilham Adi Setiawan', 'Ilham', 'Bondowoso', '1998-08-19', 23, 11, 'Laki-laki', 'Klabang,Bondowoso', 'Islam', 'ilham@gmail.com', 10, NULL, 2, 'default.png'),
('01782084500000008', 'Firlana Purti', 'purti', 'Bondowoso', '1999-10-08', 7, 12, 'Perempuan', 'Bondowoso', 'Islam', 'putri@gmail.com', 15, NULL, 3, '01782084500000008.jpg'),
('01782084500000009', 'Dani Sumantri', 'Dani', 'Bondowoso', '2003-02-19', 3, 12, 'Laki-laki', 'Perumahan Mutiara Indah, Klabang, Bondowoso', 'Islam', 'Dani@gmail.com', 15, NULL, 3, 'default.png'),
('01782084500000010', 'Lofita Soluna', 'fita', 'Bondowoso', '2000-12-19', 4, 6, 'Perempuan', 'Gang Jambu, Kecamatan Tegal Boto, Bondowoso', 'Islam', 'luna@gmail.com', 3, NULL, 1, 'default.png'),
('01782084500000011', 'Hana Setnova', 'nova', 'Jakarta', '2001-02-01', 7, 12, 'Perempuan', 'Perumahan River Side, Kembang, Bondowoso', 'Islam', 'dia@gmail.com', 15, NULL, 3, 'default.png'),
('01782084500000012', 'Firmasnsyah Wahyu Maumakan', 'firman', 'Bondowoso', '2002-10-02', 67, 12, 'Laki-laki', 'Gerbongan, Jember', 'Islam', 'firmansyah20@gmail.com', 15, NULL, 3, 'default.png'),
('01782084500000013', 'Nur Farisah', 'risah', 'Bondowoso', '2005-02-10', 160, 8, 'Laki-laki', 'Sukosari Lor, Sukosari, Bondowoso', 'Islam', 'risah@gmail.com', 5, NULL, 2, 'default.png'),
('01782084500000014', 'Dani syiam', 'dian', 'bondowoso', '2000-02-02', 69, 12, 'Laki-laki', 'Perumahan Mutiara Indah, Klabang, Bondowoso', 'Islam', 'munirhmad113@gmail.com', 15, NULL, 3, 'default.png'),
('01782084500000015', 'Doni sianjay kertonegoro', 'doni', 'Jakarta', '2004-02-19', 77, 8, 'Laki-laki', 'Perumahan River Side, Kembang, Bondowoso', 'Islam', 'doni@gmail.com', 4, NULL, 99, '01782084500000015.jpg'),
('01782084500000016', 'Rahmad darmawan', 'rahmad', 'Bondowoso', '2008-09-29', 76, 7, 'Laki-laki', 'Perumahan Mutiara Indah, Klabang, Bondowoso', 'Islam', 'rahmad@gmail.com', 4, NULL, 99, 'default.png'),
('01782084500000017', 'Rahmad', 'sulistio', 'Bondowoso', '2003-05-10', 6, 11, 'Perempuan', 'Gerbongan, Jember', 'Islam', 'rahmad2@gmail.com', 15, NULL, 3, '01782084500000017.jpg');

--
-- Triggers `tbl_siswa`
--
DELIMITER $$
CREATE TRIGGER `add_lgnsiswa` AFTER INSERT ON `tbl_siswa` FOR EACH ROW BEGIN
INSERT INTO lgn_siswa(id_siswa, username, password)
VALUES (NEW.id_siswa, NEW.id_siswa, MD5(NEW.nama_panggilan));
INSERT INTO tbl_ortu(id_siswa)
VALUES (NEW.id_siswa);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_Update` AFTER UPDATE ON `tbl_siswa` FOR EACH ROW BEGIN
DECLARE akhir INT;
DECLARE awal INT;
DECLARE kls INT;

SET akhir = (SELECT COUNT(*) FROM tbl_kelas);
SET akhir = akhir+1;

SET awal = 1;

WHILE awal < akhir DO
SET kls = (SELECT COUNT(*) FROM tbl_siswa WHERE id_kelas = awal);
UPDATE tbl_kelas SET jumlah=kls WHERE id_kelas = awal;
SET awal=awal+1;
END WHILE;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentor`
--

CREATE TABLE `tbl_tentor` (
  `id_tentor` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tentor`
--

INSERT INTO `tbl_tentor` (`id_tentor`, `nama`, `alamat`, `tempat`, `tanggal_lahir`, `id_mapel`, `no_hp`, `email`, `foto`, `jenis_kelamin`) VALUES
(4, 'Danilla Surahman', 'Perumahan Mutiara Indah, Klabang, Bondowoso', 'Bondowoso', '1998-04-08', 'RSD5002', '087364758474', 'danilla123@gmail.com', 'default.png', 'Laki-laki'),
(5, 'Frebriansyah Yudha', 'Kebonsari', 'Jember', '1997-01-24', 'RSD4003', NULL, 'Yudha@gmail.com', '5.PNG', 'Laki-laki'),
(6, 'Ira auliani', 'Perumahan River Side, Kembang, Bondowoso', 'Bondowoso', '1995-08-07', 'RSMAA1204', NULL, 'Ira@gmail.com', 'default.png', 'Perempuan');

--
-- Triggers `tbl_tentor`
--
DELIMITER $$
CREATE TRIGGER `add_lgntentor` AFTER INSERT ON `tbl_tentor` FOR EACH ROW BEGIN
INSERT lgn_tentor(id_tentor, username, password)
VALUES (new.id_tentor, new.email, new.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_absen`
-- (See below for the actual view)
--
CREATE TABLE `view_absen` (
`id_absen` int(11)
,`nama_lengkap` varchar(50)
,`nama_kelas` varchar(20)
,`jam_datang` varchar(30)
,`jam_pulang` varchar(30)
,`keterangan` varchar(15)
,`tgl` date
,`id_kelas` int(2)
,`id_siswa` varchar(17)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_angsuran`
-- (See below for the actual view)
--
CREATE TABLE `view_angsuran` (
`id_pembayaran` varchar(10)
,`waktu` datetime
,`id_siswa` varchar(17)
,`jumlah_bayar` int(15)
,`sisa_tagihan` int(15)
,`nama_lengkap` varchar(50)
,`kelas` varchar(2)
,`nama_program` varchar(30)
,`id_ortu` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `view_jadwal` (
`id_jadwal` int(3)
,`nama_mapel` varchar(30)
,`hari` varchar(10)
,`jam` varchar(20)
,`id_kelas` int(2)
,`nama_kelas` varchar(20)
,`id_tentor` int(2)
,`nama` varchar(30)
,`nama_ruang` varchar(25)
,`username` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas` (
`id_kelas` int(2)
,`nama_kelas` varchar(20)
,`jumlah` int(2)
,`id_program` int(2)
,`nama_program` varchar(30)
,`id_jenjang` int(2)
,`jenjang` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas_request`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas_request` (
`id_kelas` int(2)
,`id_mapel` varchar(20)
,`nama_mapel` varchar(30)
,`id_tentor` int(2)
,`nama_tentor` varchar(30)
,`id_ruang` int(2)
,`nama_ruang` varchar(25)
,`tanggal` date
,`jam` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilai_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_nilai_siswa` (
`id` int(10)
,`id_mapel` varchar(20)
,`nama_mapel` varchar(30)
,`id_siswa` varchar(17)
,`nama_lengkap` varchar(50)
,`to1` tinyint(2)
,`to2` tinyint(2)
,`to3` tinyint(2)
,`to4` tinyint(2)
,`to5` tinyint(2)
,`id_kelas` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_notif_reqjadwal`
-- (See below for the actual view)
--
CREATE TABLE `view_notif_reqjadwal` (
`id` int(11)
,`id_mapel` varchar(20)
,`nama_mapel` varchar(30)
,`status` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ortu`
-- (See below for the actual view)
--
CREATE TABLE `view_ortu` (
`id_ortu` int(11)
,`id_siswa` varchar(17)
,`nama_ayah` varchar(40)
,`pekerjaan_ayah` varchar(20)
,`no_hpayah` varchar(14)
,`nama_ibu` varchar(40)
,`pekerjaan_ibu` varchar(20)
,`no_hpibu` varchar(14)
,`username` varchar(255)
,`anak` varchar(50)
,`panak` varchar(10)
,`id_sekolah` int(3)
,`nama_sekolah` varchar(255)
,`id_kelas` int(2)
,`nama_kelas` varchar(20)
,`program` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_reqjdl_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_reqjdl_siswa` (
`id_mapel` varchar(20)
,`nama_mapel` varchar(30)
,`total` bigint(21)
,`id_program` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`id_siswa` varchar(17)
,`nama_lengkap` varchar(50)
,`nama_panggilan` varchar(10)
,`id_grade` int(11)
,`kelas` varchar(2)
,`nama_sekolah` varchar(255)
,`id_program` int(2)
,`nama_program` varchar(30)
,`nama_kelas` varchar(20)
,`username` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa_detail` (
`id_siswa` varchar(17)
,`nama_lengkap` varchar(50)
,`nama_panggilan` varchar(10)
,`tempat` varchar(20)
,`tanggal_lahir` date
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`alamat` varchar(60)
,`agama` enum('Islam','Katholik','Kristen','Hindu','Budha','Kong Hu Cu','Lain-Lain')
,`email` varchar(60)
,`no_hp` varchar(14)
,`foto` varchar(255)
,`nama_program` varchar(30)
,`nama_ayah` varchar(40)
,`pekerjaan_ayah` varchar(20)
,`no_hpayah` varchar(14)
,`nama_ibu` varchar(40)
,`pekerjaan_ibu` varchar(20)
,`no_hpibu` varchar(14)
,`nama_kelas` varchar(20)
,`nama_sekolah` varchar(255)
,`kelas` varchar(2)
,`id_kelas` int(2)
,`id_program` int(2)
,`id_sekolah` int(3)
,`id_grade` int(11)
,`username` varchar(255)
,`id_ortu` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa_tgn`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa_tgn` (
`ID Siswa` varchar(17)
,`Nama Lengkap` varchar(50)
,`Asal Sekolah` varchar(255)
,`Program` varchar(30)
,`Kelas` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tentor`
-- (See below for the actual view)
--
CREATE TABLE `view_tentor` (
`id_tentor` int(2)
,`nama` varchar(30)
,`alamat` varchar(60)
,`no_hp` varchar(14)
,`email` varchar(255)
,`nama_mapel` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tntr_dtl`
-- (See below for the actual view)
--
CREATE TABLE `view_tntr_dtl` (
`id_tentor` int(2)
,`nama` varchar(30)
,`alamat` varchar(60)
,`tempat` varchar(30)
,`tanggal_lahir` date
,`id_mapel` varchar(10)
,`no_hp` varchar(14)
,`email` varchar(255)
,`foto` varchar(255)
,`jenis_kelamin` enum('Laki-laki','Perempuan','','')
,`nama_mapel` varchar(30)
,`username` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `reqjdl_bantu`
--
DROP TABLE IF EXISTS `reqjdl_bantu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reqjdl_bantu`  AS  select `tbl_request_jadwal`.`id_mapel` AS `id_mapel`,`tbl_request_jadwal`.`id_grade` AS `id_grade`,count(0) AS `total` from `tbl_request_jadwal` group by `tbl_request_jadwal`.`id_mapel` ;

-- --------------------------------------------------------

--
-- Structure for view `view_absen`
--
DROP TABLE IF EXISTS `view_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_absen`  AS  select `b`.`id_absen` AS `id_absen`,`a`.`nama_lengkap` AS `nama_lengkap`,`c`.`nama_kelas` AS `nama_kelas`,`b`.`jam_datang` AS `jam_datang`,`b`.`jam_pulang` AS `jam_pulang`,`b`.`keterangan` AS `keterangan`,`b`.`tgl` AS `tgl`,`c`.`id_kelas` AS `id_kelas`,`a`.`id_siswa` AS `id_siswa` from ((`tbl_siswa` `a` join `tbl_absen` `b`) join `tbl_kelas` `c`) where ((`a`.`id_siswa` = `b`.`id_siswa`) and (`a`.`id_kelas` = `c`.`id_kelas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_angsuran`
--
DROP TABLE IF EXISTS `view_angsuran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_angsuran`  AS  select `a`.`id_pembayaran` AS `id_pembayaran`,`a`.`waktu` AS `waktu`,`a`.`id_siswa` AS `id_siswa`,`a`.`jumlah_bayar` AS `jumlah_bayar`,`a`.`sisa_tagihan` AS `sisa_tagihan`,`b`.`nama_lengkap` AS `nama_lengkap`,`c`.`kelas` AS `kelas`,`d`.`nama_program` AS `nama_program`,`e`.`id_ortu` AS `id_ortu` from ((((`tbl_pembayaran` `a` join `tbl_siswa` `b`) join `kelas` `c`) join `tbl_program` `d`) join `tbl_ortu` `e`) where ((`a`.`id_siswa` = `b`.`id_siswa`) and (`b`.`id_grade` = `c`.`id_grade`) and (`b`.`id_program` = `d`.`id_program`) and (`b`.`id_siswa` = `e`.`id_siswa`) and (`a`.`jumlah_bayar` <> 0)) order by `a`.`waktu` ;

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal`
--
DROP TABLE IF EXISTS `view_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal`  AS  select `a`.`id_jadwal` AS `id_jadwal`,`b`.`nama_mapel` AS `nama_mapel`,`a`.`hari` AS `hari`,`a`.`jam` AS `jam`,`c`.`id_kelas` AS `id_kelas`,`c`.`nama_kelas` AS `nama_kelas`,`d`.`id_tentor` AS `id_tentor`,`d`.`nama` AS `nama`,`e`.`nama_ruang` AS `nama_ruang`,`f`.`username` AS `username` from (((((`tbl_jadwal` `a` join `tbl_mapel` `b`) join `tbl_kelas` `c`) join `tbl_tentor` `d`) join `tbl_ruang` `e`) join `lgn_tentor` `f`) where ((`a`.`id_kelas` = `c`.`id_kelas`) and (`a`.`id_mapel` = `b`.`id_mapel`) and (`d`.`id_tentor` = `a`.`id_tentor`) and (`e`.`id_ruang` = `a`.`id_ruang`) and (`d`.`id_tentor` = `f`.`id_tentor`)) order by `a`.`hari` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas`  AS  select `a`.`id_kelas` AS `id_kelas`,`a`.`nama_kelas` AS `nama_kelas`,`a`.`jumlah` AS `jumlah`,`a`.`id_program` AS `id_program`,`c`.`nama_program` AS `nama_program`,`b`.`id_jenjang` AS `id_jenjang`,`b`.`jenjang` AS `jenjang` from ((`tbl_kelas` `a` join `jenjang` `b`) join `tbl_program` `c`) where ((`a`.`id_program` = `c`.`id_program`) and (`b`.`id_jenjang` = `c`.`id_jenjang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_kelas_request`
--
DROP TABLE IF EXISTS `view_kelas_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas_request`  AS  select `a`.`id_kelas` AS `id_kelas`,`a`.`id_mapel` AS `id_mapel`,`b`.`nama_mapel` AS `nama_mapel`,`a`.`id_tentor` AS `id_tentor`,`c`.`nama` AS `nama_tentor`,`a`.`id_ruang` AS `id_ruang`,`d`.`nama_ruang` AS `nama_ruang`,`a`.`tanggal` AS `tanggal`,`a`.`jam` AS `jam` from (((`tbl_kelas_reqjadwal` `a` join `tbl_mapel` `b`) join `tbl_tentor` `c`) join `tbl_ruang` `d`) where ((`a`.`id_ruang` = `d`.`id_ruang`) and (`a`.`id_tentor` = `c`.`id_tentor`) and (`a`.`id_mapel` = `b`.`id_mapel`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilai_siswa`
--
DROP TABLE IF EXISTS `view_nilai_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilai_siswa`  AS  select `a`.`id` AS `id`,`a`.`id_mapel` AS `id_mapel`,`b`.`nama_mapel` AS `nama_mapel`,`a`.`id_siswa` AS `id_siswa`,`c`.`nama_lengkap` AS `nama_lengkap`,`a`.`to1` AS `to1`,`a`.`to2` AS `to2`,`a`.`to3` AS `to3`,`a`.`to4` AS `to4`,`a`.`to5` AS `to5`,`c`.`id_kelas` AS `id_kelas` from ((`tbl_nilai` `a` join `tbl_mapel` `b`) join `tbl_siswa` `c`) where ((`a`.`id_mapel` = `b`.`id_mapel`) and (`a`.`id_siswa` = `c`.`id_siswa`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_notif_reqjadwal`
--
DROP TABLE IF EXISTS `view_notif_reqjadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_notif_reqjadwal`  AS  select `a`.`id` AS `id`,`a`.`id_mapel` AS `id_mapel`,`b`.`nama_mapel` AS `nama_mapel`,`a`.`status` AS `status` from (`notif_req_jadwal` `a` join `tbl_mapel` `b`) where (`a`.`id_mapel` = `b`.`id_mapel`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_ortu`
--
DROP TABLE IF EXISTS `view_ortu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ortu`  AS  select `a`.`id_ortu` AS `id_ortu`,`a`.`id_siswa` AS `id_siswa`,`a`.`nama_ayah` AS `nama_ayah`,`a`.`pekerjaan_ayah` AS `pekerjaan_ayah`,`a`.`no_hpayah` AS `no_hpayah`,`a`.`nama_ibu` AS `nama_ibu`,`a`.`pekerjaan_ibu` AS `pekerjaan_ibu`,`a`.`no_hpibu` AS `no_hpibu`,`b`.`username` AS `username`,`c`.`nama_lengkap` AS `anak`,`c`.`nama_panggilan` AS `panak`,`c`.`id_sekolah` AS `id_sekolah`,`d`.`nama_sekolah` AS `nama_sekolah`,`c`.`id_kelas` AS `id_kelas`,`e`.`nama_kelas` AS `nama_kelas`,`f`.`nama_program` AS `program` from (((((`tbl_ortu` `a` join `lgn_ortu` `b`) join `tbl_siswa` `c`) join `tbl_sekolah` `d`) join `tbl_kelas` `e`) join `tbl_program` `f`) where ((`a`.`id_siswa` = `c`.`id_siswa`) and (`a`.`id_ortu` = `b`.`id_ortu`) and (`c`.`id_sekolah` = `d`.`id_sekolah`) and (`c`.`id_kelas` = `e`.`id_kelas`) and (`c`.`id_program` = `f`.`id_program`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_reqjdl_siswa`
--
DROP TABLE IF EXISTS `view_reqjdl_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reqjdl_siswa`  AS  select `a`.`id_mapel` AS `id_mapel`,`b`.`nama_mapel` AS `nama_mapel`,`a`.`total` AS `total`,`b`.`id_program` AS `id_program` from (`reqjdl_bantu` `a` join `tbl_mapel` `b`) where (`a`.`id_mapel` = `b`.`id_mapel`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS  select `a`.`id_siswa` AS `id_siswa`,`a`.`nama_lengkap` AS `nama_lengkap`,`a`.`nama_panggilan` AS `nama_panggilan`,`a`.`id_grade` AS `id_grade`,`b`.`kelas` AS `kelas`,`d`.`nama_sekolah` AS `nama_sekolah`,`c`.`id_program` AS `id_program`,`c`.`nama_program` AS `nama_program`,`e`.`nama_kelas` AS `nama_kelas`,`f`.`username` AS `username` from (((((`tbl_siswa` `a` join `kelas` `b`) join `tbl_program` `c`) join `tbl_sekolah` `d`) join `tbl_kelas` `e`) join `lgn_siswa` `f`) where ((`a`.`id_grade` = `b`.`id_grade`) and (`a`.`id_sekolah` = `d`.`id_sekolah`) and (`a`.`id_program` = `c`.`id_program`) and (`a`.`id_kelas` = `e`.`id_kelas`) and (`a`.`id_siswa` = `f`.`id_siswa`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa_detail`
--
DROP TABLE IF EXISTS `view_siswa_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa_detail`  AS  select `a`.`id_siswa` AS `id_siswa`,`a`.`nama_lengkap` AS `nama_lengkap`,`a`.`nama_panggilan` AS `nama_panggilan`,`a`.`tempat` AS `tempat`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`jenis_kelamin` AS `jenis_kelamin`,`a`.`alamat` AS `alamat`,`a`.`agama` AS `agama`,`a`.`email` AS `email`,`a`.`no_hp` AS `no_hp`,`a`.`foto` AS `foto`,`b`.`nama_program` AS `nama_program`,`c`.`nama_ayah` AS `nama_ayah`,`c`.`pekerjaan_ayah` AS `pekerjaan_ayah`,`c`.`no_hpayah` AS `no_hpayah`,`c`.`nama_ibu` AS `nama_ibu`,`c`.`pekerjaan_ibu` AS `pekerjaan_ibu`,`c`.`no_hpibu` AS `no_hpibu`,`d`.`nama_kelas` AS `nama_kelas`,`e`.`nama_sekolah` AS `nama_sekolah`,`f`.`kelas` AS `kelas`,`a`.`id_kelas` AS `id_kelas`,`a`.`id_program` AS `id_program`,`a`.`id_sekolah` AS `id_sekolah`,`a`.`id_grade` AS `id_grade`,`g`.`username` AS `username`,`c`.`id_ortu` AS `id_ortu` from ((((((`tbl_siswa` `a` join `tbl_program` `b`) join `tbl_ortu` `c`) join `tbl_kelas` `d`) join `tbl_sekolah` `e`) join `kelas` `f`) join `lgn_siswa` `g`) where ((`a`.`id_program` = `b`.`id_program`) and (`a`.`id_sekolah` = `e`.`id_sekolah`) and (`a`.`id_grade` = `f`.`id_grade`) and (`a`.`id_program` = `b`.`id_program`) and (`a`.`id_siswa` = `c`.`id_siswa`) and (`a`.`id_kelas` = `d`.`id_kelas`) and (`a`.`id_siswa` = `g`.`id_siswa`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa_tgn`
--
DROP TABLE IF EXISTS `view_siswa_tgn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa_tgn`  AS  select `a`.`id_siswa` AS `ID Siswa`,`a`.`nama_lengkap` AS `Nama Lengkap`,`e`.`nama_sekolah` AS `Asal Sekolah`,`b`.`nama_program` AS `Program`,`d`.`nama_kelas` AS `Kelas` from (((`tbl_siswa` `a` join `tbl_program` `b`) join `tbl_kelas` `d`) join `tbl_sekolah` `e`) where ((`a`.`id_sekolah` = `e`.`id_sekolah`) and (`a`.`id_program` = `b`.`id_program`) and (`a`.`id_kelas` = `d`.`id_kelas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tentor`
--
DROP TABLE IF EXISTS `view_tentor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tentor`  AS  select `a`.`id_tentor` AS `id_tentor`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`a`.`no_hp` AS `no_hp`,`a`.`email` AS `email`,`b`.`nama_mapel` AS `nama_mapel` from (`tbl_tentor` `a` join `tbl_mapel` `b`) where (`a`.`id_mapel` = `b`.`id_mapel`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tntr_dtl`
--
DROP TABLE IF EXISTS `view_tntr_dtl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tntr_dtl`  AS  select `a`.`id_tentor` AS `id_tentor`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`a`.`tempat` AS `tempat`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`id_mapel` AS `id_mapel`,`a`.`no_hp` AS `no_hp`,`a`.`email` AS `email`,`a`.`foto` AS `foto`,`a`.`jenis_kelamin` AS `jenis_kelamin`,`b`.`nama_mapel` AS `nama_mapel`,`c`.`username` AS `username` from ((`tbl_tentor` `a` join `tbl_mapel` `b`) join `lgn_tentor` `c`) where ((`a`.`id_mapel` = `b`.`id_mapel`) and (`a`.`id_tentor` = `c`.`id_tentor`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dump_tbl_kelas_reqjadwal`
--
ALTER TABLE `dump_tbl_kelas_reqjadwal`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kec`
--
ALTER TABLE `kec`
  ADD PRIMARY KEY (`id_kec`);

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
-- Indexes for table `notif_req_jadwal`
--
ALTER TABLE `notif_req_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_siswa` (`id_siswa`);

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
-- Indexes for table `tbl_kelas_reqjadwal`
--
ALTER TABLE `tbl_kelas_reqjadwal`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_grade` (`id_program`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD UNIQUE KEY `no_hpibu` (`no_hpibu`),
  ADD UNIQUE KEY `no_hpayah` (`no_hpayah`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tbl_request_jadwal`
--
ALTER TABLE `tbl_request_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_grade` (`id_grade`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `id_kec` (`id_kec`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_grade` (`id_grade`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  ADD PRIMARY KEY (`id_tentor`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dump_tbl_kelas_reqjadwal`
--
ALTER TABLE `dump_tbl_kelas_reqjadwal`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lgn_admin`
--
ALTER TABLE `lgn_admin`
  MODIFY `id_lgn` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lgn_ortu`
--
ALTER TABLE `lgn_ortu`
  MODIFY `id_lgnortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lgn_siswa`
--
ALTER TABLE `lgn_siswa`
  MODIFY `id_lgnsiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lgn_tentor`
--
ALTER TABLE `lgn_tentor`
  MODIFY `id_lgntentor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notif_req_jadwal`
--
ALTER TABLE `notif_req_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_kelas_reqjadwal`
--
ALTER TABLE `tbl_kelas_reqjadwal`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_request_jadwal`
--
ALTER TABLE `tbl_request_jadwal`
  MODIFY `id_jadwal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;

--
-- AUTO_INCREMENT for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  MODIFY `id_tentor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `lgn_admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lgn_ortu`
--
ALTER TABLE `lgn_ortu`
  ADD CONSTRAINT `lgn_ortu_ibfk_1` FOREIGN KEY (`id_ortu`) REFERENCES `tbl_ortu` (`id_ortu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lgn_siswa`
--
ALTER TABLE `lgn_siswa`
  ADD CONSTRAINT `lgn_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lgn_tentor`
--
ALTER TABLE `lgn_tentor`
  ADD CONSTRAINT `lgn_tentor_ibfk_1` FOREIGN KEY (`id_tentor`) REFERENCES `tbl_tentor` (`id_tentor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `tbl_absen_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
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
  ADD CONSTRAINT `tbl_mapel_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD CONSTRAINT `tbl_ortu_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD CONSTRAINT `tbl_program_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Constraints for table `tbl_request_jadwal`
--
ALTER TABLE `tbl_request_jadwal`
  ADD CONSTRAINT `tbl_request_jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `tbl_request_jadwal_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `tbl_request_jadwal_ibfk_3` FOREIGN KEY (`id_grade`) REFERENCES `kelas` (`id_grade`);

--
-- Constraints for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD CONSTRAINT `tbl_sekolah_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`),
  ADD CONSTRAINT `tbl_sekolah_ibfk_2` FOREIGN KEY (`id_kec`) REFERENCES `kec` (`id_kec`);

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `kelas` (`id_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_4` FOREIGN KEY (`id_sekolah`) REFERENCES `tbl_sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_5` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `hapus_req` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-06-23 03:21:37' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM tbl_kelas_reqjadwal WHERE tanggal < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
