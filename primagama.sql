-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2019 at 04:18 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatidgrade` (IN `id` VARCHAR(17))  NO SQL
SELECT id_grade
FROM tbl_siswa
WHERE id_siswa = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatnamaprogram` (IN `id` VARCHAR(17))  NO SQL
SELECT b.nama_program
FROM tbl_siswa a, tbl_program b
WHERE a.id_program = b.id_program AND id_siswa=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatnamasekolah` (IN `id` VARCHAR(17))  NO SQL
SELECT b.nama_sekolah, c.nama_program
FROM tbl_siswa a, tbl_sekolah b, tbl_program c
WHERE a.id_sekolah=b.id_sekolah AND a.id_program = c.id_program AND id_siswa = id$$

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
  `id_siswa` varchar(17) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lgn_siswa`
--

INSERT INTO `lgn_siswa` (`id_lgnsiswa`, `id_siswa`, `username`, `password`) VALUES
(5, '01782084500000001', 'munir', 'munir');

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
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `jam_datang` varchar(30) NOT NULL,
  `jam_pulang` varchar(30) NOT NULL,
  `keterangan` varchar(15) NOT NULL
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
  `email` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_lengkap`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `foto`) VALUES
(1, 'munir', '1999-02-14', 'bondowoso', '082316285715', 'hel000491@gmail.com', 'ridi.jpg');

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
(1, 'UN001', 18, 'Lain-lain', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `id_program` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`, `id_program`) VALUES
('USMA01', 'BIOLOGI', 2),
('USMA02', 'KIMIA', 2),
('USMA03', 'MATEMATIKA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_siswa` varchar(17) NOT NULL,
  `id_tentor` int(11) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, ' SD Negeri Badean 1 Kec. Bondowoso', 1, 1),
(2, ' SD Negeri Badean 2 Kec. Bondowoso', 1, 1),
(3, ' SD Negeri Badean 3 Kec. Bondowoso', 1, 1),
(4, ' SD Negeri Blindungan 1 Kec. Bondowoso', 1, 1),
(5, ' SD Negeri Blindungan 2 Kec. Bondowoso', 1, 1),
(6, ' SD Negeri Dabasah 1 Kec. Bondowoso', 1, 1),
(7, ' SD Negeri Dabasah 2 Kec. Bondowoso', 1, 1),
(8, ' SD Negeri Dabasah 3 Kec. Bondowoso', 1, 1),
(9, ' SD Negeri Dabasah 4 Kec. Bondowoso', 1, 1),
(10, ' SD Negeri Dabasah 5 Kec. Bondowoso', 1, 1),
(11, ' SD Negeri Kademangan 1 Kec. Bondowoso', 1, 1),
(12, ' SD Negeri Kademangan 2 Kec. Bondowoso', 1, 1),
(13, ' SD Negeri Kembang 1 Kec. Bondowoso', 1, 1),
(14, ' SD Negeri Kembang 2 Kec. Bondowoso', 1, 1),
(15, ' SD Negeri Kotakulon 1 Kec. Bondowoso', 1, 1),
(16, ' SD Negeri Kotakulon 2 Kec. Bondowoso', 1, 1),
(17, ' SD Negeri Kotakulon 3 Kec. Bondowoso', 1, 1),
(18, ' SD Negeri Kotakulon 4 Kec. Bondowoso', 1, 1),
(19, ' SD Negeri Nangkaan Kec. Bondowoso', 1, 1),
(20, ' SD Negeri Pancuran 1 Kec. Bondowoso', 1, 1),
(21, ' SD Negeri Pancuran 2 Kec. Bondowoso', 1, 1),
(22, ' SD Negeri Pancuran 3 Kec. Bondowoso', 1, 1),
(23, ' SD Negeri Pejaten 1 Kec. Bondowoso', 1, 1),
(24, ' SD Negeri Pejaten 2 Kec. Bondowoso', 1, 1),
(25, ' SD Negeri Sukowiryo 1 Kec. Bondowoso', 1, 1),
(26, ' SD Negeri Sukowiryo 2 Kec. Bondowoso', 1, 1),
(27, ' SD Negeri Tamansari 1 Kec. Bondowoso', 1, 1),
(28, ' SD Negeri Tamansari 2 Kec. Bondowoso', 1, 1),
(29, 'SD AL IRSYAD AL ISLAMIYAH', 1, 1),
(30, 'SD ISLAM HIDAYATUL HASAN', 1, 1),
(31, 'SD IT KUNTUM INSAN CEMERLANG', 1, 1),
(32, 'SD KRISTEN PETRA', 1, 1),
(33, 'SD MUHAMMADIYAH', 1, 1),
(34, 'SD YIMA ISLAMIC SCHOOL', 1, 1),
(35, 'SDI INTEGRAL LUQMAN AL HAKIM', 1, 1),
(36, 'SDK INDRA SISWA', 1, 1),
(37, 'SDN SULING WETAN 2', 2, 1),
(38, ' SD Negeri Bajuran 1 Kec. Cermee', 2, 1),
(39, ' SD Negeri Bajuran 2 Kec. Cermee', 2, 1),
(40, ' SD Negeri Bajuran 3 Kec. Cermee', 2, 1),
(41, ' SD Negeri Batu Ampar 1 Kec. Cermee', 2, 1),
(42, ' SD Negeri Batu Ampar 2 Kec. Cermee', 2, 1),
(43, ' SD Negeri Batu Salang Kec. Cermee', 2, 1),
(44, ' SD Negeri Bercak 1 Kec. Cermee', 2, 1),
(45, ' SD Negeri Bercak 2 Kec. Cermee', 2, 1),
(46, ' SD Negeri Bercak Asri 1 Kec. Cermee', 2, 1),
(47, ' SD Negeri Bercak Asri 2 Kec. Cermee', 2, 1),
(48, ' SD Negeri Cermee 1 Kec. Cermee', 2, 1),
(49, ' SD Negeri Cermee 2 Kec. Cermee', 2, 1),
(50, ' SD Negeri Cermee 3 Kec. Cermee', 2, 1),
(51, ' SD Negeri Cermee 4 Kec. Cermee', 2, 1),
(52, ' SD Negeri Cermee 5 Kec. Cermee', 2, 1),
(53, ' SD Negeri Grujukan 1 Kec. Cermee', 2, 1),
(54, ' SD Negeri Grujukan 2 Kec. Cermee', 2, 1),
(55, ' SD Negeri Jirek Mas 1 Kec. Cermee', 2, 1),
(56, ' SD Negeri Jirek Mas 2 Kec. Cermee', 2, 1),
(57, ' SD Negeri Kladi 1 Kec. Cermee', 2, 1),
(58, ' SD Negeri Kladi 2 Kec. Cermee', 2, 1),
(59, ' SD Negeri Palalangan 1 Kec. Cermee', 2, 1),
(60, ' SD Negeri Palalangan 2 Kec. Cermee', 2, 1),
(61, ' SD Negeri Palalangan 3 Kec. Cermee', 2, 1),
(62, ' SD Negeri Ramban Kulon 1 Kec. Cermee', 2, 1),
(63, ' SD Negeri Ramban Kulon 2 Kec. Cermee', 2, 1),
(64, ' SD Negeri Ramban Kulon 3 Kec. Cermee', 2, 1),
(65, ' SD Negeri Ramban Wetan 1 Kec. Cermee', 2, 1),
(66, ' SD Negeri Ramban Wetan 2 Kec. Cermee', 2, 1),
(67, ' SD Negeri Ramban Wetan 3 Kec. Cermee', 2, 1),
(68, ' SD Negeri Ramban Wetan 4 Kec. Cermee', 2, 1),
(69, ' SD Negeri Ramban Wetan 5 Kec. Cermee', 2, 1),
(70, ' SD Negeri Solor 1 Kec. Cermee', 2, 1),
(71, ' SD Negeri Solor 2 Kec. Cermee', 2, 1),
(72, ' SD Negeri Solor 3 Kec. Cermee', 2, 1),
(73, ' SD Negeri Solor 4 Kec. Cermee', 2, 1),
(74, ' SD Negeri Solor 5 Kec. Cermee', 2, 1),
(75, ' SD Negeri Suling Kulon 1 Kec. Cermee', 2, 1),
(76, ' SD Negeri Suling Kulon 2 Kec. Cermee', 2, 1),
(77, ' SD Negeri Suling Wetan 1 Kec. Cermee', 2, 1),
(78, 'SD NU 01', 2, 1),
(79, 'SD NU 02 CERMEE', 2, 1),
(80, ' SMP Negeri 1 Cermee', 2, 2),
(81, ' SMP Negeri 2 Cermee', 2, 2),
(82, ' SMP Negeri 3 Satu Atap Cermee', 2, 2),
(83, ' SMP Negeri 4 Satu Atap Cermee', 2, 2),
(84, 'SMP NU 11', 2, 2),
(85, 'SMP NU 15 Cermee', 2, 2),
(86, 'SMAS RAUDLATUL FALAH', 2, 3),
(87, 'SMKN 1 CERMEE', 2, 3),
(88, 'SMKS DARUL FALAH', 2, 3),
(89, 'SDN BRAMBANG DARUSSALAM 1', 3, 1),
(90, 'SDN GUNOSARI 3', 3, 1),
(91, 'SDN JEBUNG KIDUL 1', 3, 1),
(92, 'SDN JEBUNG KIDUL 2', 3, 1),
(93, 'SDN PAKISAN 1', 3, 1),
(94, 'SDN PAKISAN 2', 3, 1),
(95, 'SDN PAKISAN 3', 3, 1),
(96, 'SDN PAKISAN 4', 3, 1),
(97, 'SDN PAKISAN 6', 3, 1),
(98, 'SDN SULEK 1', 3, 1),
(99, 'SDN TLOGOSARI 2', 3, 1),
(100, 'SDN TROTOSARI 2', 3, 1),
(101, ' SD Negeri Brambang Darussalam 2 Kec. Tlogosari', 3, 1),
(102, ' SD Negeri Gunosari 1 Kec. Tlogosari', 3, 1),
(103, ' SD Negeri Gunosari 2 Kec. Tlogosari', 3, 1),
(104, ' SD Negeri Gunosari 4 Kec. Tlogosari', 3, 1),
(105, ' SD Negeri Jebung Lor 1 Kec. Tlogosari', 3, 1),
(106, ' SD Negeri Jebung Lor 2 Kec. Tlogosari', 3, 1),
(107, ' SD Negeri Kembangsari 1 Kec. Tlogosari', 3, 1),
(108, ' SD Negeri Kembangsari 2 Kec. Tlogosari', 3, 1),
(109, ' SD Negeri Kembangsari 3 Kec. Tlogosari', 3, 1),
(110, ' SD Negeri Kembangsari 4 Kec. Tlogosari', 3, 1),
(111, ' SD Negeri Kembangsari 5 Kec. Tlogosari', 3, 1),
(112, ' SD Negeri Pakisan 5 Kec. Tlogosari', 3, 1),
(113, ' SD Negeri Patemon 1 Kec. Tlogosari', 3, 1),
(114, ' SD Negeri Patemon 2 Kec. Tlogosari', 3, 1),
(115, ' SD Negeri Patemon 3 Kec. Tlogosari', 3, 1),
(116, ' SD Negeri Sulek 2 Kec. Tlogosari', 3, 1),
(117, ' SD Negeri Sulek 3 Kec. Tlogosari', 3, 1),
(118, ' SD Negeri Tlogosari 1 Kec. Tlogosari', 3, 1),
(119, ' SD Negeri Tlogosari 3 Kec. Tlogosari', 3, 1),
(120, ' SD Negeri Tlogosari 4 Kec. Tlogosari', 3, 1),
(121, ' SD Negeri Trotosari 1 Kec. Tlogosari', 3, 1),
(122, ' SD Negeri Trotosari 3 Kec. Tlogosari', 3, 1),
(123, ' SD Negeri Trotosari 4 Kec. Tlogosari', 3, 1),
(124, ' SMP Negeri 1 Tlogosari', 3, 2),
(125, ' SMP Negeri 2 Satu Atap Tlogosari', 3, 2),
(126, 'SMP ISLAM AS SALAM', 3, 2),
(127, 'SMP NU 08 BONDOWOSO', 3, 2),
(128, 'SMP NURUL HUDA', 3, 2),
(129, 'SDLB ABCD BINA MANDIRI', 3, 4),
(130, 'SMAS ISLAM TLOGOSARI', 3, 3),
(131, 'SMKN 1 TLOGOSARI', 3, 3),
(132, ' SD Negeri Ambulu 1 Kec. Wringin', 4, 1),
(133, ' SD Negeri Ambulu 2 Kec. Wringin', 4, 1),
(134, ' SD Negeri Ampelan 1 Kec. Wringin', 4, 1),
(135, ' SD Negeri Ampelan 2 Kec. Wringin', 4, 1),
(136, ' SD Negeri Banyuputih Kec. Wringin', 4, 1),
(137, ' SD Negeri Banyuwulu 1 Kec. Wringin', 4, 1),
(138, ' SD Negeri Banyuwulu 2 Kec. Wringin', 4, 1),
(139, ' SD Negeri Banyuwulu 3 Kec. Wringin', 4, 1),
(140, ' SD Negeri Banyuwulu 4 Kec. Wringin', 4, 1),
(141, ' SD Negeri Bukor Kec. Wringin', 4, 1),
(142, ' SD Negeri Glingseran Kec. Wringin', 4, 1),
(143, ' SD Negeri Gubrih 1 Kec. Wringin', 4, 1),
(144, ' SD Negeri Gubrih 2 Kec. Wringin', 4, 1),
(145, ' SD Negeri Jambewungu 1 Kec. Wringin', 4, 1),
(146, ' SD Negeri Jambewungu 2 Kec. Wringin', 4, 1),
(147, ' SD Negeri Jatisari Kec. Wringin', 4, 1),
(148, ' SD Negeri Jatitamban Kec. Wringin', 4, 1),
(149, ' SD Negeri Sumber Canting 1 Kec. Wringin', 4, 1),
(150, ' SD Negeri Sumber Canting 2 Kec. Wringin', 4, 1),
(151, ' SD Negeri Sumber Canting 3 Kec. Wringin', 4, 1),
(152, ' SD Negeri Sumber Canting 4 Kec. Wringin', 4, 1),
(153, ' SD Negeri Sumber Malang Kec. Wringin', 4, 1),
(154, ' SD Negeri Wringin 1 Kec. Wringin', 4, 1),
(155, ' SD Negeri Wringin 2 Kec. Wringin', 4, 1),
(156, ' SD Negeri Wringin 3 Kec. Wringin', 4, 1),
(157, ' SD Negeri Wringin 4 Kec. Wringin', 4, 1),
(158, ' SD Negeri Wringin 5 Kec. Wringin', 4, 1),
(159, 'SDI NURUL HIDAYAH', 4, 1),
(160, ' SMP Negeri 1 Wringin', 4, 2),
(161, 'SMP AT-TAUFIQ', 4, 2),
(162, 'SMP ISLAM DARUL FIKRI', 4, 2),
(163, 'SMP ISLAM DARUSSALAM', 4, 2),
(164, 'SMP Nahdlatul Ulama 07 Wringin', 4, 2),
(165, 'SMA ISLAM RA`IYATUL HUSNAN', 4, 3),
(166, 'SMA NURUL HIDAYAH', 4, 3),
(167, 'SMAS ISLAM DARUL FIKRI', 4, 3),
(168, 'SMKN 1 WRINGIN', 4, 3),
(169, 'SMK NAHDATUL ULAMA WRINGIN', 4, 3),
(170, 'SMKS AT TAUFIQ', 4, 3),
(171, 'SDN CINDOGO 2', 5, 1),
(172, 'SDN GUNUNGANYAR 1', 5, 1),
(173, 'SDN GUNUNGANYAR 2', 5, 1),
(174, 'SDN JURANGSAPI 1', 5, 1),
(175, 'SDN JURANGSAPI 2', 5, 1),
(176, 'SDN JURANGSAPI 3', 5, 1),
(177, 'SDN KALITAPEN 1', 5, 1),
(178, 'SDN KALITAPEN 2', 5, 1),
(179, 'SDN KALITAPEN 3', 5, 1),
(180, 'SDN MANGLI WETAN 1', 5, 1),
(181, 'SDN MANGLI WETAN 2', 5, 1),
(182, 'SDN MRAWAN 1', 5, 1),
(183, 'SDN MRAWAN 2', 5, 1),
(184, 'SDN TAAL 2', 5, 1),
(185, 'SDN TAAL 3', 5, 1),
(186, 'SDN TAPEN 1', 5, 1),
(187, 'SDN TAPEN 2', 5, 1),
(188, 'SDN TAPEN 3', 5, 1),
(189, 'SDN WONOKUSUMO 1', 5, 1),
(190, 'SDN WONOKUSUMO 2', 5, 1),
(191, 'SDN WONOKUSUMO 3', 5, 1),
(192, 'SDN WONOKUSUMO 4', 5, 1),
(193, ' SD Negeri Cindogo 1 Kec. Tapen', 5, 1),
(194, ' SD Negeri Taal 1 Kec. Tapen', 5, 1),
(195, ' SMP Negeri 1 Tapen', 5, 2),
(196, ' SMP Negeri 2 Tapen', 5, 2),
(197, 'SMP DARUL JANNAH', 5, 2),
(198, 'SMP ISLAM IBRAHIM HAMDANI', 5, 2),
(199, 'SMAN 1 TAPEN', 5, 3),
(200, 'SMKN 1 TAPEN', 5, 3),
(201, 'SMK NAILUL HUDA', 5, 3),
(202, 'SMKS AL-AKHYAR', 5, 3),
(203, 'SMKS DARUL JANNAH', 5, 3),
(204, 'SLB NEGERI CINDOGO', 5, 4),
(205, ' SD Negeri Botolinggo 1 Kec. Botolinggo', 6, 1),
(206, ' SD Negeri Botolinggo 2 Kec. Botolinggo', 6, 1),
(207, ' SD Negeri Botolinggo 3 Kec. Botolinggo', 6, 1),
(208, ' SD Negeri Gayam Kidul 1 Kec. Botolinggo', 6, 1),
(209, ' SD Negeri Gayam Kidul 2 Kec. Botolinggo', 6, 1),
(210, ' SD Negeri Gayam Kidul 3 Kec. Botolinggo', 6, 1),
(211, ' SD Negeri Gayam Kidul 4 Kec. Botolinggo', 6, 1),
(212, ' SD Negeri Gayam Lor 1 Kec. Botolinggo', 6, 1),
(213, ' SD Negeri Gayam Lor 2 Kec. Botolinggo', 6, 1),
(214, ' SD Negeri Klekean 1 Kec. Botolinggo', 6, 1),
(215, ' SD Negeri Klekean 2 Kec. Botolinggo', 6, 1),
(216, ' SD Negeri Lanas 1 Kec. Botolinggo', 6, 1),
(217, ' SD Negeri Lanas 2 Kec. Botolinggo', 6, 1),
(218, ' SD Negeri Lanas 3 Kec. Botolinggo', 6, 1),
(219, ' SD Negeri Lanas 4 Kec. Botolinggo', 6, 1),
(220, ' SD Negeri Lumutan 1 Kec. Botolinggo', 6, 1),
(221, ' SD Negeri Lumutan 2 Kec. Botolinggo', 6, 1),
(222, ' SD Negeri Lumutan 3 Kec. Botolinggo', 6, 1),
(223, ' SD Negeri Pancur 1 Kec. Botolinggo', 6, 1),
(224, ' SD Negeri Pancur 2 Kec. Botolinggo', 6, 1),
(225, ' SD Negeri Penang 1 Kec. Botolinggo', 6, 1),
(226, ' SD Negeri Penang 2 Kec. Botolinggo', 6, 1),
(227, ' SD Negeri Penang 3 Kec. Botolinggo', 6, 1),
(228, ' SD Negeri Penang 4 Kec. Botolinggo', 6, 1),
(229, ' SD Negeri Sumber Canting 1 Kec. Botolinggo', 6, 1),
(230, ' SD Negeri Sumber Canting 2 Kec. Botolinggo', 6, 1),
(231, 'SD AL FATIMAH', 6, 1),
(232, ' SMP Negeri 1 Satu Atap Botolinggo', 6, 2),
(233, ' SMP Negeri 2 Satu Atap Botolinggo', 6, 2),
(234, 'SMP NU 02', 6, 2),
(235, 'SMP NU 13 SUMBERCANTING BONDOWOSO', 6, 2),
(236, 'SMP THORIQUL JANNAH', 6, 2),
(237, 'SMA NU NURUL HIKMAH', 6, 3),
(238, 'SMA RIYADUL ULUM', 6, 3),
(239, 'SDN GAMBANGAN 1', 7, 1),
(240, 'SDN MAESAN', 7, 1),
(241, 'SDN SUGERLOR 1', 7, 1),
(242, 'SDN SUMBERANYAR 2', 7, 1),
(243, 'SDN SUMBERSARI 3', 7, 1),
(244, ' SD Negeri Gambangan 2 Kec. Maesan', 7, 1),
(245, ' SD Negeri Gunungsari 1 Kec. Maesan', 7, 1),
(246, ' SD Negeri Gunungsari 2 Kec. Maesan', 7, 1),
(247, ' SD Negeri Pakuniran 1 Kec. Maesan', 7, 1),
(248, ' SD Negeri Pakuniran 2 Kec. Maesan', 7, 1),
(249, ' SD Negeri Penanggungan Kec. Maesan', 7, 1),
(250, ' SD Negeri Pujer Baru 1 Kec. Maesan', 7, 1),
(251, ' SD Negeri Pujer Baru 2 Kec. Maesan', 7, 1),
(252, ' SD Negeri Pujer Baru 3 Kec. Maesan', 7, 1),
(253, ' SD Negeri Sucolor 1 Kec. Maesan', 7, 1),
(254, ' SD Negeri Sucolor 2 Kec. Maesan', 7, 1),
(255, ' SD Negeri Sucolor 3 Kec. Maesan', 7, 1),
(256, ' SD Negeri Suger Lor 2 Kec. Maesan', 7, 1),
(257, ' SD Negeri Suger Lor 3 Kec.  Maesan', 7, 1),
(258, ' SD Negeri Sumber Anyar 1 Kec. Maesan', 7, 1),
(259, ' SD Negeri Sumber Pakem 1 Kec. Maesan', 7, 1),
(260, ' SD Negeri Sumber Pakem 2 Kec. Maesan', 7, 1),
(261, ' SD Negeri Sumbersari 1 Kec. Maesan', 7, 1),
(262, ' SD Negeri Sumbersari 2 Kec. Maesan', 7, 1),
(263, ' SD Negeri Tanah Wulan 2 Kec. Maesan', 7, 1),
(264, ' SD Negeri Tanahwulan 1 Kec. Maesan', 7, 1),
(265, ' SMP Negeri 1 Maesan', 7, 2),
(266, ' SMP Negeri 2 Maesan', 7, 2),
(267, ' SMP Negeri 3 Satu Atap Maesan', 7, 2),
(268, 'SMP Islam AL - MUSTAQIMY', 7, 2),
(269, 'SMP ISLAM DARUL MUWAHHIDIN', 7, 2),
(270, 'SMKN 1 MAESAN', 7, 3),
(271, 'SMKS SABILIL MUTTAQIN', 7, 3),
(272, ' SD Negeri  Pekalangan 2 Kec. Tenggarang', 8, 1),
(273, ' SD Negeri Bataan 1 Kec. Tenggarang', 8, 1),
(274, ' SD Negeri Bataan 2 Kec. Tenggarang', 8, 1),
(275, ' SD Negeri Dawuhan Kec. Tenggarang', 8, 1),
(276, ' SD Negeri Gebang Kec. Tenggarang', 8, 1),
(277, ' SD Negeri Kajar 1 Kec. Tenggarang', 8, 1),
(278, ' SD Negeri Kajar 2 Kec. Tenggarang', 8, 1),
(279, ' SD Negeri Kasemek 1 Kec. Tenggarang', 8, 1),
(280, ' SD Negeri Kasemek 2 Kec. Tenggarang', 8, 1),
(281, ' SD Negeri Koncer 1 Kec. Tenggarang', 8, 1),
(282, ' SD Negeri Koncer 2 Kec. Tenggarang', 8, 1),
(283, ' SD Negeri Lojajar Kec. Tenggarang', 8, 1),
(284, ' SD Negeri Pekalangan 1 Kec. Tenggarang', 8, 1),
(285, ' SD Negeri Pekalangan 3 Kec. Tenggarang', 8, 1),
(286, ' SD Negeri Sumber Salam 1 Kec. Tenggarang', 8, 1),
(287, ' SD Negeri Sumber Salam 2 Kec. Tenggarang', 8, 1),
(288, ' SD Negeri Tangsil Kulon 1 Kec. Tenggarang', 8, 1),
(289, ' SD Negeri Tangsil Kulon 2 Kec. Tenggarang', 8, 1),
(290, ' SD Negeri Tenggarang 1 Kec. Tenggarang', 8, 1),
(291, ' SD Negeri Tenggarang 2 Kec. Tenggarang', 8, 1),
(292, ' SD Negeri Tenggarang 3 Kec. Tenggarang', 8, 1),
(293, ' SMP Negeri 1 Tenggarang', 8, 2),
(294, ' SMP Negeri 2 Tenggarang', 8, 2),
(295, 'SMP ISLAM NURUL KHALIL', 8, 2),
(296, 'SMP NU 01', 8, 2),
(297, 'SMP NU 04', 8, 2),
(298, 'SMP NURUL ULAMA', 8, 2),
(299, 'SMP WISMA ASWAJA', 8, 2),
(300, 'SMAN 1 TENGGARANG', 8, 3),
(301, 'SMA ISLAM NURUL KHALIL', 8, 3),
(302, 'SMKS AL HIKAM', 8, 3),
(303, 'SMKS NU', 8, 3),
(304, 'SMKS Nurul Hidayah', 8, 3),
(305, 'SDN BENDOARUM 1', 9, 1),
(306, 'SDN BENDOARUM 2', 9, 1),
(307, 'SDN JUMPONG', 9, 1),
(308, 'SDN LOMBOK KULON 1', 9, 1),
(309, 'SDN LOMBOK KULON 2', 9, 1),
(310, 'SDN LOMBOK KULON 3', 9, 1),
(311, 'SDN PASAREJO 1', 9, 1),
(312, 'SDN PELALANGAN', 9, 1),
(313, 'SDN TANGSIL WETAN 2', 9, 1),
(314, 'SDN TRAKTAKAN 1', 9, 1),
(315, 'SDN WONOSARI 1', 9, 1),
(316, ' SD Negeri Kapuran Kec. Wonosari', 9, 1),
(317, ' SD Negeri Lombok Wetan Kec. Wonosari', 9, 1),
(318, ' SD Negeri Pasarejo 2 Kec. Wonosari', 9, 1),
(319, ' SD Negeri Sumber Kalong Kec. Wonosari', 9, 1),
(320, ' SD Negeri Tangsil Wetan 1 Kec. Wonosari', 9, 1),
(321, ' SD Negeri Tangsil Wetan 3 Kec. Wonosari', 9, 1),
(322, ' SD Negeri Traktakan 2 Kec. Wonosari', 9, 1),
(323, ' SD Negeri Tumpeng 1 Kec. Wonosari', 9, 1),
(324, ' SD Negeri Tumpeng 2 Kec. Wonosari', 9, 1),
(325, ' SD Negeri Wonosari 2 Kec. Wonosari', 9, 1),
(326, ' SD Negeri Wonosari 3 Kec. Wonosari', 9, 1),
(327, 'SD DARUT THALABAH', 9, 1),
(328, ' SMP Negeri 1 Wonosari', 9, 2),
(329, 'SMP ARIEF IBRAHIM', 9, 2),
(330, 'SMP ISLAM TERPADU BINA INSAN CEMERLANG', 9, 2),
(331, 'SMP MANBAUL ULUM', 9, 2),
(332, 'SMP NU 09 BONDOWOSO', 9, 2),
(333, 'SMPS AL MAARIF DARUL MAGHFUR', 9, 2),
(334, 'SMKS AL MAARIF DARULMAGHFUR', 9, 3),
(335, 'SMKS DARUS SALAM', 9, 3),
(336, 'SMKS MANBAUL ULUM WONOSARI', 9, 3),
(337, 'SMKS MIFTAHUL ULUM', 9, 3),
(338, ' SD Negeri Kalianyar 1 Kec. Tamanan', 10, 1),
(339, ' SD Negeri Kalianyar 2 Kec. Tamanan', 10, 1),
(340, ' SD Negeri Karang Melok 1 Kec. Tamanan', 10, 1),
(341, ' SD Negeri Karang Melok 2 Kec. Tamanan', 10, 1),
(342, ' SD Negeri Kemirian 1 Kec. Tamanan', 10, 1),
(343, ' SD Negeri Kemirian 2 Kec. Tamanan', 10, 1),
(344, ' SD Negeri Mengen 1 Kec. Tamanan', 10, 1),
(345, ' SD Negeri Mengen 2 Kec. Tamanan', 10, 1),
(346, ' SD Negeri Sukosari 1 Kec. Tamanan', 10, 1),
(347, ' SD Negeri Sukosari 2 Kec. Tamanan', 10, 1),
(348, ' SD Negeri Sumber Anom Kec. Tamanan', 10, 1),
(349, ' SD Negeri Sumber Kemuning 1 Kec. Tamanan', 10, 1),
(350, ' SD Negeri Sumber Kemuning 2 Kec. Tamanan', 10, 1),
(351, ' SD Negeri Tamanan 1 Kec. Tamanan', 10, 1),
(352, ' SD Negeri Tamanan 2 Kec. Tamanan', 10, 1),
(353, ' SD Negeri Tamanan 3 Kec. Tamanan', 10, 1),
(354, ' SD Negeri Wonosuko 1 Kec. Tamanan', 10, 1),
(355, ' SD Negeri Wonosuko 2 Kec. Tamanan', 10, 1),
(356, ' SD Negeri Wonosuko 3 Kec. Tamanan', 10, 1),
(357, ' SD Negeri Wonosuko 4 Kec. Tamanan', 10, 1),
(358, ' SMP Negeri 1 Tamanan', 10, 2),
(359, ' SMP Negeri 2 Tamanan', 10, 2),
(360, ' SMP Negeri 3 Satu Atap Tamanan', 10, 2),
(361, 'SMP ADZ DZAKIRIN', 10, 2),
(362, 'SMP AL BAROKAH', 10, 2),
(363, 'SMP ISLAM AL FAUZI HASAN', 10, 2),
(364, 'SMP NU 14', 10, 2),
(365, 'SMAN TAMANAN', 10, 3),
(366, 'SMKN 1 TAMANAN', 10, 3),
(367, 'SMK FATIHUL ULUM', 10, 3),
(368, 'SMKS ADZ DZAKIRIN', 10, 3),
(369, ' SD Negeri Curahdami 1 Kec. Curahdami', 11, 1),
(370, ' SD Negeri Curahdami 2 Kec. Curahdami', 11, 1),
(371, ' SD Negeri Curahdami 3 Kec. Curahdami', 11, 1),
(372, ' SD Negeri Curahpoh 1 Kec. Curahdami', 11, 1),
(373, ' SD Negeri Curahpoh 2 Kec. Curahdami', 11, 1),
(374, ' SD Negeri Jetis 1 Kec. Curahdami', 11, 1),
(375, ' SD Negeri Jetis 2 Kec. Curahdami', 11, 1),
(376, ' SD Negeri Jetis 3 Kec. Curahdami', 11, 1),
(377, ' SD Negeri Kupang Kec. Curahdami', 11, 1),
(378, ' SD Negeri Locare 1 Kec. Curahdami', 11, 1),
(379, ' SD Negeri Locare 2 Kec. Curahdami', 11, 1),
(380, ' SD Negeri Pakuwesi 1 Kec. Curahdami', 11, 1),
(381, ' SD Negeri Pakuwesi 2 Kec. Curahdami', 11, 1),
(382, ' SD Negeri Penambangan Kec. Curahdami', 11, 1),
(383, ' SD Negeri Petung 1 Kec. Curahdami', 11, 1),
(384, ' SD Negeri Petung 2 Kec. Curahdami', 11, 1),
(385, ' SD Negeri Poncogati 1 Kec. Curahdami', 11, 1),
(386, ' SD Negeri Poncogati 2 Kec. Curahdami', 11, 1),
(387, ' SD Negeri Selolembu Kec. Curahdami', 11, 1),
(388, ' SD Negeri Sumber Salak Kec. Curahdami', 11, 1),
(389, ' SD Negeri Sumbersuko 1 Kec. Curahdami', 11, 1),
(390, ' SD Negeri Sumbersuko 2 Kec. Curahdami', 11, 1),
(391, ' SMP Negeri 1 Curahdami', 11, 2),
(392, 'SMP AL-MUHIBBIN', 11, 2),
(393, 'SMP ISLAM AS SYUHADA 45', 11, 2),
(394, 'SMP ISLAM RAUDLATUL HASAN', 11, 2),
(395, 'SMP NURUL KHALIL', 11, 2),
(396, 'SMA ISLAM AS SYUHADA`', 11, 3),
(397, 'SMAS NURUL MARIFAH', 11, 3),
(398, 'SMKS RAUDLATUL HASAN', 11, 3),
(399, 'SMKS TARUNA HUSADA', 11, 3),
(400, 'SDN DAWUHAN', 12, 1),
(401, ' SD Negeri Dadapan 1 Kec. Grujugan', 12, 1),
(402, ' SD Negeri Dadapan 2 Kec. Grujugan', 12, 1),
(403, ' SD Negeri Grujugan Kidul 1 Kec. Grujugan', 12, 1),
(404, ' SD Negeri Grujugan Kidul 2 Kec. Grujugan', 12, 1),
(405, ' SD Negeri Grujugan Kidul 3 Kec. Grujugan', 12, 1),
(406, ' SD Negeri Kabuaran 1 Kec. Grujugan', 12, 1),
(407, ' SD Negeri Kabuaran 2 Kec. Grujugan', 12, 1),
(408, ' SD Negeri Kejawan Kec. Grujugan', 12, 1),
(409, ' SD Negeri Pekauman Kec. Grujugan', 12, 1),
(410, ' SD Negeri Sumber Pandan 1 Kec. Grujugan', 12, 1),
(411, ' SD Negeri Sumberpandan 2 Kec. Grujugan', 12, 1),
(412, ' SD Negeri Taman 1 Kec. Grujugan', 12, 1),
(413, ' SD Negeri Taman 2 Kec. Grujugan', 12, 1),
(414, ' SD Negeri Tegalmijin 1 Kec. Grujugan', 12, 1),
(415, ' SD Negeri Tegalmijin 2 Kec. Grujugan', 12, 1),
(416, ' SD Negeri Wanisodo Kec. Grujugan', 12, 1),
(417, ' SD Negeri Wonosari 1 Kec. Grujugan', 12, 1),
(418, ' SD Negeri Wonosari 2 Kec. Grujugan', 12, 1),
(419, ' SD Negeri Wonosari 3 Kec. Grujugan', 12, 1),
(420, ' SD Negeri Wonosari 4 Kec. Grujugan', 12, 1),
(421, 'SD PLUS AL ISLAH', 12, 1),
(422, ' SMP Negeri 1 Grujugan', 12, 2),
(423, ' SMP Negeri 2 Satu Atap Grujugan', 12, 2),
(424, 'SMP NURUL HUDA', 12, 2),
(425, 'SMP PLUS AL ISHLAH', 12, 2),
(426, 'SMAN GRUJUGAN', 12, 3),
(427, 'SMAS Islam Nurul Huda', 12, 3),
(428, 'SMKN 1 GRUJUGAN', 12, 3),
(429, 'SMK NURUL HASAN', 12, 3),
(430, 'SMKS NURUL ISLAM', 12, 3),
(431, 'SDN KEJAYAN 1', 13, 1),
(432, 'SDN MANGLI', 13, 1),
(433, 'SDN MASKUNING WETAN 1', 13, 1),
(434, 'SDN PADASAN', 13, 1),
(435, 'SDN SUKODONO 1', 13, 1),
(436, 'SDN SUKOKERTO 1', 13, 1),
(437, 'SDN SUKOKERTO 2', 13, 1),
(438, ' SD Negeri Alassumur 1 Kec. Pujer', 13, 1),
(439, ' SD Negeri Alassumur 2 Kec. Pujer', 13, 1),
(440, ' SD Negeri Kejayan 2 Kec. Pujer', 13, 1),
(441, ' SD Negeri Kejayan 3 Kec. Pujer', 13, 1),
(442, ' SD Negeri Maskuning Kulon 1 Kec. Pujer', 13, 1),
(443, ' SD Negeri Maskuning Kulon 2 Kec. Pujer', 13, 1),
(444, ' SD Negeri Maskuning Wetan 2 Kec. Pujer', 13, 1),
(445, ' SD Negeri Maskuning Wetan 3 Kec. Pujer', 13, 1),
(446, ' SD Negeri Mengok 1 Kec. Pujer', 13, 1),
(447, ' SD Negeri Mengok 2 Kec. Pujer', 13, 1),
(448, ' SD Negeri Randulima Kec. Pujer', 13, 1),
(449, ' SD Negeri Sukodono 2 Kec. Pujer', 13, 1),
(450, ' SD Negeri Sukowono Kec. Pujer', 13, 1),
(451, ' SMP Negeri 1 Pujer', 13, 2),
(452, ' SMP Negeri 2 Satu Atap Pujer', 13, 2),
(453, 'SMP ISLAM AL BAROKAH', 13, 2),
(454, 'SMP MIFTAHUL ULUM PUJER', 13, 2),
(455, 'SMAN 1 PUJER', 13, 3),
(456, 'SMAS ISLAM PUJER', 13, 3),
(457, 'SMKN 1 PUJER', 13, 3),
(458, 'SMK BUSTANUL ULUM PADASAN', 13, 3),
(459, 'SMKS DARUL ULUM', 13, 3),
(460, 'SDN REJOAGUNG 1', 14, 1),
(461, 'SDN REJOAGUNG 3', 14, 1),
(462, 'SDN SUKOREJO 1', 14, 1),
(463, 'SDN SUKOREJO 2', 14, 1),
(464, 'SDN SUKOREJO 3', 14, 1),
(465, 'SDN SUKOREJO 5', 14, 1),
(466, 'SDN SUKOREJO 6', 14, 1),
(467, 'SDN SUKOSARI KIDUL 1', 14, 1),
(468, 'SDN SUKOSARI KIDUL 2', 14, 1),
(469, 'SDN SUMBER GADING', 14, 1),
(470, 'SDN SUMBER WRINGIN 1', 14, 1),
(471, 'SDN SUMBER WRINGIN 2', 14, 1),
(472, 'SDN TEGALJATI 1', 14, 1),
(473, 'SDN TEGALJATI 2', 14, 1),
(474, ' SD Negeri Rejoagung 2 Kec. Sumber Wringin', 14, 1),
(475, ' SD Negeri Rejoagung 4 Kec. Sumber Wringin', 14, 1),
(476, ' SD Negeri Rejoagung 5 Kec. Sumber Wringin', 14, 1),
(477, ' SD Negeri Sukorejo 4 Kec. Sumber Wringin', 14, 1),
(478, ' SD Negeri Tegaljati 3 Kec. Sumber Wringin', 14, 1),
(479, 'SD RAUDLATUL MUSTARSYIDIN', 14, 1),
(480, ' SMP Negeri 1 Sumber Wringin', 14, 2),
(481, ' SMP Negeri 2 Satu Atap Sumber Wringin', 14, 2),
(482, ' SMP Negeri 3 Satu Atap Sumber Wringin', 14, 2),
(483, 'SMP NU 03 BONDOWOSO', 14, 2),
(484, 'SMP RAUDLATUL MUSTARSYIDIN', 14, 2),
(485, 'SMA ISLAM RAUDLATUL MUSTARSYIDIN', 14, 3),
(486, 'SMKN 1 SUMBERWRINGIN', 14, 3),
(487, 'SMKS SALAFIYAH SYAFIIYAH', 14, 3),
(488, 'SDN GRUJUGAN LOR 1', 15, 1),
(489, 'SDN GRUJUGAN LOR 2', 15, 1),
(490, 'SDN JAMBEANOM 1', 15, 1),
(491, 'SDN JAMBEANOM 2', 15, 1),
(492, 'SDN JAMBESARI 1', 15, 1),
(493, 'SDN JAMBESARI 2', 15, 1),
(494, 'SDN JAMBESARI 3', 15, 1),
(495, 'SDN PEJAGAN', 15, 1),
(496, 'SDN PENGARANG 1', 15, 1),
(497, 'SDN PENGARANG 2', 15, 1),
(498, 'SDN PENGARANG 3', 15, 1),
(499, 'SDN PUCANGANOM 1', 15, 1),
(500, 'SDN PUCANGANOM 2', 15, 1),
(501, 'SDN SUMBER JERUK 1', 15, 1),
(502, 'SDN SUMBER JERUK 2', 15, 1),
(503, 'SDN TEGALPASIR', 15, 1),
(504, ' SD Negeri Sumber Anyar Kec. Jambesari DS', 15, 1),
(505, ' SMP Negeri 1 Jambesari Darus Sholah', 15, 2),
(506, ' SMP Negeri 2 Satu Atap Jambesari DS', 15, 2),
(507, 'SMP AL FURQON', 15, 2),
(508, 'SMP ISLAM AL FATAH', 15, 2),
(509, 'SMP MIFTAHUL HASAN AL UTSMANI', 15, 2),
(510, 'SMP NU 06 JAMBESARI DARUS SHOLAH', 15, 2),
(511, 'SMP SUNAN KALIJOGO', 15, 2),
(512, 'SMA ISLAM AL-UTSMANI', 15, 3),
(513, 'SMK MIFTAHUL HASAN AL-UTSMANI', 15, 3),
(514, 'SMKS AL FURQON', 15, 3),
(515, 'SMKS AL IMAM', 15, 3),
(516, ' SD Negeri Bandilan 1 Kec. Prajekan', 16, 1),
(517, ' SD Negeri Bandilan 2 Kec. Prajekan', 16, 1),
(518, ' SD Negeri Bandilan 3 Kec. Prajekan', 16, 1),
(519, ' SD Negeri Bandilan 4 Kec. Prajekan', 16, 1),
(520, ' SD Negeri Bandilan 5 Kec. Prajekan', 16, 1),
(521, ' SD Negeri Cangkring Kec. Prajekan', 16, 1),
(522, ' SD Negeri Prajekan Kidul 1 Kec. Prajekan', 16, 1),
(523, ' SD Negeri Prajekan Kidul 2 Kec. Prajekan', 16, 1),
(524, ' SD Negeri Prajekan Kidul 3 Kec. Prajekan', 16, 1),
(525, ' SD Negeri Prajekan Lor 1 Kec. Prajekan', 16, 1),
(526, ' SD Negeri Prajekan Lor 2 Kec. Prajekan', 16, 1),
(527, ' SD Negeri Sempol 1 Kec. Prajekan', 16, 1),
(528, ' SD Negeri Sempol 2 Kec. Prajekan', 16, 1),
(529, ' SD Negeri Sempol 3 Kec. Prajekan', 16, 1),
(530, ' SD Negeri Sempol 4 Kec. Prajekan', 16, 1),
(531, ' SD Negeri Tarum Kec. Prajekan', 16, 1),
(532, ' SD Negeri Walidono 1 Kec. Prajekan', 16, 1),
(533, ' SD Negeri Walidono 2 Kec. Prajekan', 16, 1),
(534, ' SD Negeri Walidono 3 Kec. Prajekan', 16, 1),
(535, ' SD Negeri Walidono 4 Kec. Prajekan', 16, 1),
(536, ' SMP Negeri 1 Prajekan', 16, 2),
(537, ' SMP Negeri 2 Prajekan', 16, 2),
(538, 'SMP MAMBAUL ULUM', 16, 2),
(539, 'SMAN 1 PRAJEKAN', 16, 3),
(540, 'SMKN 1 PRAJEKAN', 16, 3),
(541, 'SMK NURUT TAQWA', 16, 3),
(542, 'SMKS MAMBAUL ULUM', 16, 3),
(543, ' SD Negeri Andungsari 1 Kec. Pakem', 17, 1),
(544, ' SD Negeri Andungsari 2 Kec. Pakem', 17, 1),
(545, ' SD Negeri Ardisaeng 1 Kec. Pakem', 17, 1),
(546, ' SD Negeri Ardisaeng 2 Kec. Pakem', 17, 1),
(547, ' SD Negeri Gadingsari 1 Kec. Pakem', 17, 1),
(548, ' SD Negeri Gadingsari 2 Kec. Pakem', 17, 1),
(549, ' SD Negeri Kupang 1 Kec. Pakem', 17, 1),
(550, ' SD Negeri Kupang 2 Kec. Pakem', 17, 1),
(551, ' SD Negeri Kupang 3 Kec. Pakem', 17, 1),
(552, ' SD Negeri Pakem Kec. Pakem', 17, 1),
(553, ' SD Negeri Patemon 1 Kec. Pakem', 17, 1),
(554, ' SD Negeri Patemon 2 Kec. Pakem', 17, 1),
(555, ' SD Negeri Petung 1 Kec. Pakem', 17, 1),
(556, ' SD Negeri Petung 2 Kec. Pakem', 17, 1),
(557, ' SD Negeri Sumber Dumpyong 2 Kec. Pakem', 17, 1),
(558, ' SD Negeri Sumber Dumpyong 3 Kec. Pakem', 17, 1),
(559, ' SD Negeri Sumber Dumpyong.1 Kec. Pakem', 17, 1),
(560, ' SMP Negeri 1 Pakem', 17, 2),
(561, ' SMP Negeri 2 Pakem', 17, 2),
(562, 'SMKN 1 PAKEM', 17, 3),
(563, 'SMK NURUL FALAH PAKEM', 17, 3),
(564, 'SDN LEPRAK 1', 18, 1),
(565, ' SD Negeri Besuk Kec. Klabang', 18, 1),
(566, ' SD Negeri Blimbing 1 Kec. Klabang', 18, 1),
(567, ' SD Negeri Blimbing 2 Kec. Klabang', 18, 1),
(568, ' SD Negeri Blimbing 3 Kec. Klabang', 18, 1),
(569, ' SD Negeri Karanganyar 1 Kec. Klabang', 18, 1),
(570, ' SD Negeri Karanganyar 2 Kec. Klabang', 18, 1),
(571, ' SD Negeri Karangsengon 1 Kec. Klabang', 18, 1),
(572, ' SD Negeri Karangsengon 2 Kec. Klabang', 18, 1),
(573, ' SD Negeri Klabang Kec. Klabang', 18, 1),
(574, ' SD Negeri Leprak 2 Kec. Klabang', 18, 1),
(575, ' SD Negeri Leprak 3 Kec. Klabang', 18, 1),
(576, ' SD Negeri Pandak 1 Kec. Klabang', 18, 1),
(577, ' SD Negeri Pandak 2 Kec. Klabang', 18, 1),
(578, ' SD Negeri Sumbersuko 1 Kec. Klabang', 18, 1),
(579, ' SD Negeri Sumbersuko 2 Kec. Klabang', 18, 1),
(580, ' SD Negeri Wonoboyo 1 Kec. Klabang', 18, 1),
(581, ' SD Negeri Wonoboyo 2 Kec. Klabang', 18, 1),
(582, ' SD Negeri Wonoboyo 3 Kec. Klabang', 18, 1),
(583, ' SMP Negeri 1 Klabang', 18, 2),
(584, 'SMKN 1 KLABANG', 18, 3),
(585, ' SD Negeri Karanganyar 1 Kec. Tegalampel', 19, 1),
(586, ' SD Negeri Karanganyar 2 Kec. Tegalampel', 19, 1),
(587, ' SD Negeri Karanganyar 3 Kec. Tegalampel', 19, 1),
(588, ' SD Negeri Klabang 1 Kec. Tegalampel', 19, 1),
(589, ' SD Negeri Klabang 2 Kec. Tegalampel', 19, 1),
(590, ' SD Negeri Klabang 3 Kec. Tegalampel', 19, 1),
(591, ' SD Negeri Klabang Agung Kec. Tegalampel', 19, 1),
(592, ' SD Negeri Mandiro 1 Kec. Tegalampel', 19, 1),
(593, ' SD Negeri Mandiro 2 Kec. Tegalampel', 19, 1),
(594, ' SD Negeri Mandiro 3 Kec. Tegalampel', 19, 1),
(595, ' SD Negeri Purnama 1 Kec. Tegalampel', 19, 1),
(596, ' SD Negeri Sekarputih 1 Kec. Tegalampel', 19, 1),
(597, ' SD Negeri Sekarputih 2 Kec. Tegalampel', 19, 1),
(598, ' SD Negeri Tanggulangin 1 Kec. Tegalampel', 19, 1),
(599, ' SD Negeri Tanggulangin 2 Kec. Tegalampel', 19, 1),
(600, ' SD Negeri Tegalampel Kec. Tegalampel', 19, 1),
(601, ' SMP Negeri 1 Tegalampel', 19, 2),
(602, 'SMP ISLAM MIFTAHUL ULUM', 19, 2),
(603, 'SMP MAARIF 1 TEGALAMPEL', 19, 2),
(604, 'SMK PP Negeri 1 TEGALAMPEL', 19, 3),
(605, 'SMK MA ARIF TEGALAMPEL', 19, 3),
(606, 'SDN KERANG', 20, 1),
(607, 'SDN NOGOSARI 1', 20, 1),
(608, 'SDN NOGOSARI 2', 20, 1),
(609, 'SDN NOGOSARI 3', 20, 1),
(610, 'SDN PECALONGAN 1', 20, 1),
(611, 'SDN PECALONGAN 3', 20, 1),
(612, 'SDN SUKOSARI 1', 20, 1),
(613, 'SDN SUKOSARI 2', 20, 1),
(614, 'SDN SUKOSARI 3', 20, 1),
(615, 'SDN SUKOSARI 4', 20, 1),
(616, ' SD Negeri Pecalongan 2 Kec. Sukosari', 20, 1),
(617, ' SMP Negeri 1 Sukosari', 20, 2),
(618, 'SMP NU 05 BONDOWOSO', 20, 2),
(619, 'SMP NU 10', 20, 2),
(620, 'SMAN 1 SUKOSARI', 20, 3),
(621, 'SMAS ISLAM AL FATAH', 20, 3),
(622, 'SMAS Islam Nurul Latif', 20, 3),
(623, 'SMK NU 02 BONDOWOSO', 20, 3),
(624, 'SMK NU 03 BONDOWOSO', 20, 3),
(625, ' SD Negeri Gentong 1 Kec. Tamankrocok', 21, 1),
(626, ' SD Negeri Gentong 2 Kec. Tamankrocok', 21, 1),
(627, ' SD Negeri Kemuningan 1 Kec. Tamankrocok', 21, 1),
(628, ' SD Negeri Kemuningan 2 Kec. Tamankrocok', 21, 1),
(629, ' SD Negeri Kemuningan 3 Kec. Taman Krocok', 21, 1),
(630, ' SD Negeri Kretek 1 Kec. Tamankrocok', 21, 1),
(631, ' SD Negeri Kretek 2 Kec. Taman Krocok', 21, 1),
(632, ' SD Negeri Kretek 3 Kec. Taman Krocok', 21, 1),
(633, ' SD Negeri Paguan 1 Kec. Taman Krocok', 21, 1),
(634, ' SD Negeri Paguan 2 Kec. Taman Krocok', 21, 1),
(635, ' SD Negeri Sumber Kokap 1 Kec. Taman Krocok', 21, 1),
(636, ' SD Negeri Sumber Kokap 2 Kec. Taman Krocok', 21, 1),
(637, ' SD Negeri Taman 1 Kec. Taman Krocok', 21, 1),
(638, ' SD Negeri Taman 2 Kec. Taman Krocok', 21, 1),
(639, ' SD Negeri Taman 3 Kec. Taman Krocok', 21, 1),
(640, ' SD Negeri Trebungan Kec. Taman Krocok', 21, 1),
(641, ' SMP Negeri 1 Taman Krocok', 21, 2),
(642, ' SD Negeri Baratan Kec. Binakal', 22, 1),
(643, ' SD Negeri Bendelan 1 Kec. Binakal', 22, 1),
(644, ' SD Negeri Bendelan 2 Kec. Binakal', 22, 1),
(645, ' SD Negeri Bendelan 3 Kec. Binakal', 22, 1),
(646, ' SD Negeri Binakal Kec. Binakal', 22, 1),
(647, ' SD Negeri Gadingsari Kec. Binakal', 22, 1),
(648, ' SD Negeri Jeruk Soksok 1 Kec. Binakal', 22, 1),
(649, ' SD Negeri Jeruk Soksok 2 Kec. Binakal', 22, 1),
(650, ' SD Negeri Jeruk Soksok 3 Kec. Binakal', 22, 1),
(651, ' SD Negeri Kembangan Kec. Binakal', 22, 1),
(652, ' SD Negeri Sumber Tengah 1 Kec. Binakal', 22, 1),
(653, ' SD Negeri Sumber Tengah 2 Kec. Binakal', 22, 1),
(654, ' SD Negeri Sumberwaru 1 Kec. Binakal', 22, 1),
(655, ' SD Negeri Sumberwaru 2 Kec. Binakal', 22, 1),
(656, ' SMP Negeri 1 Binakal', 22, 2),
(657, 'SMKS NURUL FALAH', 22, 3),
(658, 'SDN JAMPIT 2', 23, 1),
(659, 'SDN KALIANYAR 3', 23, 1),
(660, 'SDN SUMBEREJO', 23, 1),
(661, ' SD Negeri Jampit 1 Kec. Ijen', 23, 1),
(662, ' SD Negeri Kalianyar 1 Kec. Ijen', 23, 1),
(663, ' SD Negeri Kalianyar 2 Kec. Ijen', 23, 1),
(664, ' SD Negeri Kaligedang Kec. Ijen', 23, 1),
(665, ' SD Negeri Kalisat Kec. Ijen', 23, 1),
(666, ' SD Negeri Sempol 1 Kec. Ijen', 23, 1),
(667, ' SD Negeri Sempol 2 Kec. Ijen', 23, 1),
(668, ' SMP Negeri 1 Ijen', 23, 2),
(669, ' SMP Negeri 2 Satu Atap Ijen', 23, 2),
(670, 'SMKN 1 SEMPOL', 23, 3);

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
  `id_kelas` int(2) DEFAULT '1',
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_lengkap`, `nama_panggilan`, `tempat`, `tanggal_lahir`, `id_sekolah`, `id_grade`, `jenis_kelamin`, `alamat`, `agama`, `email`, `id_program`, `no_hp`, `id_kelas`, `foto`) VALUES
('01782084500000001', 'Ahmad Munir', 'munir', 'Bondowoso', '1999-02-14', 20, 6, 'Laki-laki', 'Bondowoso', 'Islam', 'munirahmad113@gmail.com', 2, NULL, 1, 'default.jpg');

--
-- Triggers `tbl_siswa`
--
DELIMITER $$
CREATE TRIGGER `add_lgnsiswa` AFTER INSERT ON `tbl_siswa` FOR EACH ROW BEGIN
INSERT INTO lgn_siswa(id_siswa, username, password)
VALUES (NEW.id_siswa, NEW.nama_panggilan, NEW.nama_panggilan);
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
`id_siswa` varchar(17)
,`nama_lengkap` varchar(50)
,`kelas` varchar(2)
,`nama_sekolah` varchar(255)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS  select `a`.`id_siswa` AS `id_siswa`,`a`.`nama_lengkap` AS `nama_lengkap`,`b`.`kelas` AS `kelas`,`d`.`nama_sekolah` AS `nama_sekolah`,`c`.`nama_program` AS `nama_program`,`e`.`nama_kelas` AS `nama_kelas` from ((((`tbl_siswa` `a` join `kelas` `b`) join `tbl_program` `c`) join `tbl_sekolah` `d`) join `tbl_kelas` `e`) where ((`a`.`id_grade` = `b`.`id_grade`) and (`a`.`id_sekolah` = `d`.`id_sekolah`) and (`a`.`id_program` = `c`.`id_program`) and (`a`.`id_kelas` = `e`.`id_kelas`)) ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
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
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_grade` (`id_program`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_tentor` (`id_tentor`);

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
-- AUTO_INCREMENT for table `lgn_siswa`
--
ALTER TABLE `lgn_siswa`
  MODIFY `id_lgnsiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;

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
  ADD CONSTRAINT `lgn_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lgn_tentor`
--
ALTER TABLE `lgn_tentor`
  ADD CONSTRAINT `lgn_tentor_ibfk_1` FOREIGN KEY (`id_tentor`) REFERENCES `tbl_tentor` (`id_tentor`);

--
-- Constraints for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `tbl_absen_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

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
  ADD CONSTRAINT `tbl_mapel_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`id_tentor`) REFERENCES `tbl_tentor` (`id_tentor`),
  ADD CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`);

--
-- Constraints for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD CONSTRAINT `tbl_ortu_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

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
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `kelas` (`id_grade`),
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `tbl_program` (`id_program`),
  ADD CONSTRAINT `tbl_siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `tbl_siswa_ibfk_4` FOREIGN KEY (`id_sekolah`) REFERENCES `tbl_sekolah` (`id_sekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
