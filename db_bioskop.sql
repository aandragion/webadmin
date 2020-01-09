-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2020 pada 15.17
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(50) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `logo_bank` varchar(50) NOT NULL,
  `no_rekening` int(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `logo_bank`, `no_rekening`, `nama_pemilik`) VALUES
('5d880db876ad5', 'BNI', '5d880db876ad5.png', 2147483647, 'nama bni'),
('5d8810b053e6b', 'BRI', '5d8810b053e6b.jpg', 2147483647, 'nama BRI'),
('5d881319f0a4a', 'BCA', '5d881319f0a4a.png', 655646, 'nama bca'),
('5d88134403ceb', 'Mandiri', '5d88134403ceb.jpg', 454764677, 'nama mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` varchar(64) NOT NULL,
  `judul_film` varchar(45) NOT NULL,
  `sinopsis` varchar(3000) NOT NULL,
  `trailer` varchar(500) NOT NULL DEFAULT 'default.mp4',
  `gambar` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `id_genre` varchar(11) NOT NULL,
  `status_film` varchar(20) NOT NULL,
  `durasi` varchar(30) NOT NULL,
  `total_view` decimal(2,1) NOT NULL,
  `rilis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `sinopsis`, `trailer`, `gambar`, `id_genre`, `status_film`, `durasi`, `total_view`, `rilis`) VALUES
('23', 'Black Panther', 'After the events of Captain America: Civil War, Prince T\'Challa returns home to the reclusive, technologically advanced African nation of Wakanda to serve as his country\'s new king. However, T\'Challa soon finds that he is challenged for the throne from factions within his own country. When two foes conspire to destroy Wakanda, the hero known as Black Panther must team up with C.I.A. agent Everett K. Ross and members of the Dora Milaje, Wakandan special forces, to prevent Wakanda from being dragged into a world war.', 'dxWvtMOGAhw', '5d085ca3518d9.jpg', 'G001', 'playing', '134', '8.5', '2018-02-14'),
('5dbd905aae457', 'Avengers: Endgame', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\'s actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...', 'TcMBFSGVi1c', '5dbd905aae457.jpg', 'G001', 'playing', '181', '2.0', '2019-04-24'),
('5dd14965e5497', 'Jumanji: The Next Level', 'The gang is back but the game has changed. As they return to Jumanji to rescue one of their own, they discover that nothing is as they expect. The players will have to brave parts unknown and unexplored, from the arid deserts to the snowy mountains, in order to escape the world\'s most dangerous game.', 'rBxcF-r9Ibs', '5dd14965e5497.jpg', 'G001', 'coming soon', '114', '0.0', '2019-12-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` varchar(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
('G001', 'Action'),
('G002', 'Drama'),
('G003', 'Comedy'),
('G004', 'Thriller'),
('G005', 'Sci-Fi'),
('G006', 'Romace'),
('G007', 'Documentary'),
('G008', 'Adventure'),
('G009', 'Fantasy'),
('G010', 'War'),
('G011', 'Biographical'),
('G012', 'Horror'),
('G013', 'Mystery'),
('G014', 'Family'),
('G015', 'Animation'),
('G016', 'Musical');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` varchar(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id_harga`, `harga`) VALUES
('M001', 35000),
('M002', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `icash`
--

CREATE TABLE `icash` (
  `id_icash` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo_icash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `icash`
--

INSERT INTO `icash` (`id_icash`, `id_user`, `saldo_icash`) VALUES
(2, 1022, 50),
(3, 1023, 10075000),
(4, 1024, 115000),
(5, 1002, 975000),
(6, 1003, 1125002),
(7, 1025, 260000),
(8, 1026, 225000),
(9, 1027, 960000),
(10, 1028, 1065000),
(11, 1028, 1065000),
(12, 1029, 440000),
(13, 1030, 0),
(14, 1031, 0),
(15, 1032, 810000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(11) NOT NULL,
  `id_film` varchar(64) NOT NULL,
  `tgl_jadwal` varchar(30) NOT NULL,
  `id_jamtayang` varchar(11) NOT NULL,
  `id_harga` varchar(11) NOT NULL,
  `id_studio` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `tgl_jadwal`, `id_jamtayang`, `id_harga`, `id_studio`) VALUES
('5db654785e2', '5dbd905aae457', '2019-10-29', 'T003', 'M001', 'S001'),
('5db921c0708', '5dbd905aae457', '2012-12-12', 'T001', 'M002', 'S001'),
('5db923d93d4', '23', '2019-12-03', 'T003', 'M002', 'S001'),
('5dbd9661ae9', '5dbd905aae457', '2019-12-03', 'T001', 'M001', 'S002'),
('5dc2b7e548a', '5dbd905aae457', '2019-12-26', 'T003', 'M001', 'S001'),
('5dc3ad11afb', '5dbd905aae457', '2019-11-04', 'T001', 'M002', 'S001'),
('5dfc3e20be6', '23', '2019-12-25', 'T002', 'M001', 'S001'),
('5e00536e196', '23', '2019-12-24', 'T002', 'M001', 'S001'),
('5e04d81f01f', '5dbd905aae457', '2019-12-31', 'T002', 'M001', 'S001'),
('5e0d77ca0a2', '23', '2020-01-02', 'T002', 'M001', 'S001'),
('j001', '23', '2019-12-26', 'T001', 'M002', 'S001'),
('j002', '23', '2019-12-31', 'T002', 'M002', 'S001'),
('j003', '23', '2019-10-10', 'T002', 'M002', 'S002'),
('j004', '23', '2019-12-02', 'T002', 'M001', 'S002');

--
-- Trigger `jadwal`
--
DELIMITER $$
CREATE TRIGGER `jadwal` AFTER INSERT ON `jadwal` FOR EACH ROW BEGIN
 insert recort set id_jadwal = new.id_jadwal;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamtayang`
--

CREATE TABLE `jamtayang` (
  `id_jamtayang` varchar(11) NOT NULL,
  `jam_tayang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jamtayang`
--

INSERT INTO `jamtayang` (`id_jamtayang`, `jam_tayang`) VALUES
('T001', '10:00:00'),
('T002', '15:00:00'),
('T003', '17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` varchar(11) NOT NULL,
  `Kursi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `Kursi`) VALUES
('K001', 'A1'),
('K002', 'A2'),
('K003', 'A3'),
('K004', 'A4'),
('K005', 'A5'),
('K006', 'A6'),
('K007', 'A7'),
('K008', 'A8'),
('K009', 'A9'),
('K010', 'A10'),
('K011', 'B1'),
('K012', 'B2'),
('K013', 'B3'),
('K014', 'B4'),
('K015', 'B5'),
('K016', 'B6'),
('K017', 'B7'),
('K018', 'B8'),
('K019', 'B9'),
('K020', 'B10'),
('K021', 'C1'),
('K022', 'C2'),
('K023', 'C3'),
('K024', 'C4'),
('K025', 'C5'),
('K026', 'C6'),
('K027', 'C7'),
('K028', 'C8'),
('K029', 'C9'),
('K030	', 'C10	'),
('K031', 'D1'),
('K032', 'D2'),
('K033', 'D3'),
('K034', 'D4'),
('K035', 'D5'),
('K036', 'D6'),
('K037', 'D7'),
('K038', 'D8'),
('K039', 'D9'),
('K040', 'D10'),
('K041', 'E1'),
('K042', 'E2'),
('K043', 'E3'),
('K044', 'E4'),
('K045', 'E5'),
('K046', 'E6'),
('K047', 'E7'),
('K048', 'E8'),
('K049', 'E9'),
('K050', 'E10'),
('K051', 'F1'),
('K052', 'F2'),
('K053', 'F3'),
('K054', 'F4'),
('K055', 'F5'),
('K056', 'F6'),
('K057', 'F7'),
('K058', 'F8'),
('K059', 'F9'),
('K060', 'F10'),
('K061', 'G1'),
('K062', 'G2'),
('K063', 'G3'),
('K064', 'G4'),
('K065', 'G5'),
('K066', 'G6'),
('K067', 'G7'),
('K068', 'G8'),
('K069', 'G9'),
('K070', 'G10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nonton`
--

CREATE TABLE `nonton` (
  `id_nonton` int(11) NOT NULL,
  `id_pesan` varchar(15) NOT NULL,
  `kursi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nonton`
--

INSERT INTO `nonton` (`id_nonton`, `id_pesan`, `kursi`) VALUES
(5, '5dd14432a4e7f', 'C3'),
(8, '5dd6120010041', 'D2'),
(9, '5dd6120010041', 'D2 D3'),
(10, '5dfbfd19d849c', 'F5'),
(11, '5dfc3e7cf3c99', 'A2'),
(12, '5dd141db87757', 'B2'),
(13, '5dd141db87757', 'B2 B4'),
(14, '5e01c1b0c95de', 'A1 B2'),
(15, '5e01c1b0c95de', 'A1 A2 B2'),
(16, '5dd141db87757', 'B2 B3 B4'),
(17, '5e005d2dedcf3', 'E4'),
(18, '5e005d2dedcf3', 'E4 F4'),
(19, '5e005d2dedcf3', 'E4 F4'),
(20, '5e005d2dedcf3', 'E4 F4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_keluar` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_pesan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_keluar`, `tgl`, `id_user`, `id_pesan`) VALUES
(44, '2019-11-17 12:49:31', 1029, '5dd141db87757'),
(46, '2019-11-17 13:01:32', 1029, '5dd144accf695'),
(47, '2019-11-21 04:26:40', 1029, '5dd6120010041'),
(48, '2019-11-24 13:40:22', 1029, '5dda884680f81'),
(49, '2019-12-19 14:39:31', 1029, '5dfb8ba3a337a'),
(50, '2019-12-20 03:17:34', 1032, '5dfc3d4e2067e'),
(51, '2019-12-20 03:22:36', 1032, '5dfc3e7cf3c99'),
(57, '2019-12-23 06:01:34', 2, '1'),
(58, '2019-12-23 06:02:05', 1029, '5e00585d6e88e'),
(60, '2019-12-23 06:22:37', 1029, '5e005d2dedcf3'),
(61, '2019-12-23 06:24:03', 1029, '5e005d83a8f46'),
(62, '2019-12-24 07:43:44', 1029, '5e01c1b0c95de');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_film` varchar(50) NOT NULL,
  `id_jadwal` varchar(11) NOT NULL,
  `id_kursi` varchar(11) NOT NULL,
  `jumlah_pesanan` int(10) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_status` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `tanggal_pesan`, `id_film`, `id_jadwal`, `id_kursi`, `jumlah_pesanan`, `total_harga`, `id_status`) VALUES
('1', 2, '2019-12-28 08:46:32', '23', '5e00536e196', 'B1', 1, 35000, 2),
('5dd141db87757', 1029, '2020-01-02 05:32:05', '23', '5db923d93d4', 'B2 B3 B4', 2, 70000, 3),
('5dd1428b93fb7', 1029, '2019-12-19 17:00:00', '23', '5db923d93d4', 'D3', 1, 35000, 1),
('5dd14432a4e7f', 1029, '2019-11-19 07:26:16', '5dbd905aae457', '5dbd9661ae9', 'C3', 1, 35000, 1),
('5dd144accf695', 1029, '2019-11-17 13:01:50', '23', '5db923d93d4', 'E4', 1, 35000, 3),
('5dd6120010041', 1029, '2019-11-25 11:44:49', '23', 'j002', 'D1 D2 D3', 3, 120000, 3),
('5dda884680f81', 1029, '2019-12-19 22:37:23', '23', 'j004', 'D1', 1, 35000, 1),
('5dfb8ba3a337a', 1029, '2019-12-19 22:37:23', '5dbd905aae457', '5dc2b7e548a', 'E4', 1, 35000, 1),
('5dfbfd19d849c', 1029, '2019-12-19 22:44:31', '23', '5db923d93d4', 'F5', 1, 40000, 3),
('5dfc3d4e2067e', 1032, '2019-12-20 03:17:34', '23', '5db923d93d4', 'B3 B4 C4', 3, 120000, 1),
('5dfc3e7cf3c99', 1032, '2019-12-20 03:32:22', '23', '5dfc3e20be6', 'A2 B2', 2, 70000, 3),
('5e00585d6e88e', 1029, '2019-12-23 06:02:05', '23', '5e00536e196', 'C2 C3', 2, 70000, 1),
('5e005d2dedcf3', 1029, '2020-01-02 07:43:31', '23', '5e00536e196', 'E4 F4', 2, 70000, 3),
('5e005d83a8f46', 1029, '2019-12-23 06:24:03', '23', '5e00536e196', 'E5', 1, 35000, 1),
('5e01c1b0c95de', 1029, '2019-12-24 07:44:18', '5dbd905aae457', '5dc2b7e548a', 'A1 A2 B2', 3, 105000, 3);

--
-- Trigger `pesan`
--
DELIMITER $$
CREATE TRIGGER `saldokeluar` AFTER INSERT ON `pesan` FOR EACH ROW BEGIN
if new.id_status = 1 then
INSERT INTO pengeluaran set id_pesan= new.id_pesan, id_user= new.id_user;
 update icash set saldo_icash = saldo_icash - new.total_harga
 where id_user= new.id_user;
  end if;
  update recort set j_pesanan = (select COUNT(id_pesan) from pesan where id_jadwal= new.id_jadwal), j_kursi= (select SUM(jumlah_pesanan) from pesan where id_jadwal= new.id_jadwal),j_kursib=((select count(id_kursi) from kursi)-(select SUM(jumlah_pesanan) from pesan where id_jadwal= new.id_jadwal)) ,pemasukkan = (SELECT SUM(total_harga) from pesan WHERE id_jadwal=new.id_jadwal) where id_jadwal= new.id_jadwal;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_film` varchar(64) NOT NULL,
  `nilai` decimal(2,1) NOT NULL,
  `ulasan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `tanggal`, `id_user`, `id_film`, `nilai`, `ulasan`) VALUES
(50, '2019-11-17 13:05:08', 1029, '23', '8.5', 'keren'),
(51, '2019-11-26 14:09:10', 1029, '23', '9.5', 'seru'),
(52, '2019-11-26 14:09:59', 1029, '5dbd905aae457', '4.5', 'oke'),
(53, '2019-11-26 14:12:56', 1029, '23', '3.5', ''),
(54, '2019-12-14 09:26:57', 1029, '23', '5.0', 'y');

--
-- Trigger `rating`
--
DELIMITER $$
CREATE TRIGGER `rating` AFTER INSERT ON `rating` FOR EACH ROW BEGIN
 update film set total_view = (((SELECT SUM(nilai) from rating WHERE id_film= new.id_film)/(SELECT SUM(nilai) from rating))*10)
 where id_film= new.id_film;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `recort`
--

CREATE TABLE `recort` (
  `id_recort` int(11) NOT NULL,
  `id_jadwal` varchar(11) NOT NULL,
  `j_pesanan` int(11) NOT NULL,
  `j_kursi` int(11) NOT NULL,
  `j_kursib` int(11) NOT NULL,
  `pemasukkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `recort`
--

INSERT INTO `recort` (`id_recort`, `id_jadwal`, `j_pesanan`, `j_kursi`, `j_kursib`, `pemasukkan`) VALUES
(1, '5e00536e196', 4, 6, 64, 210000),
(2, '5db654785e2', 0, 0, 0, 0),
(3, '5db921c0708', 0, 0, 0, 0),
(4, '5db923d93d4', 0, 0, 0, 0),
(5, '5dbd9661ae9', 0, 0, 0, 0),
(6, '5dc2b7e548a', 0, 0, 0, 0),
(7, '5dc3ad11afb', 0, 0, 0, 0),
(8, '5dfc3e20be6', 0, 0, 0, 0),
(9, 'j001', 0, 0, 0, 0),
(10, 'j002', 0, 0, 0, 0),
(11, 'j003', 0, 0, 0, 0),
(12, 'j004', 0, 0, 0, 0),
(13, '5e04d81f01f', 0, 0, 0, 0),
(14, '5e0d77ca0a2', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Berhasil'),
(2, 'Proses'),
(3, 'Selesai'),
(4, 'Gagal'),
(5, 'Scan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id_studio` varchar(11) NOT NULL,
  `studio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id_studio`, `studio`) VALUES
('S001', '1'),
('S002', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id_topup` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bank` varchar(50) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `n_pemilik` varchar(50) NOT NULL,
  `bts_topup` varchar(30) NOT NULL,
  `id_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`id_topup`, `tanggal`, `id_user`, `id_bank`, `jumlah_transfer`, `n_pemilik`, `bts_topup`, `id_status`) VALUES
(64, '2019-11-17 19:48:16', 1029, '5d880db876ad5', 1000000, 'machrus', '2019-11-17 20:48:16', '1'),
(65, '2019-11-17 21:27:54', 1029, '5d8810b053e6b', 50000, 'machrus', '2019-11-17 22:27:54', '4'),
(66, '2019-11-20 12:22:03', 1029, '5d881319f0a4a', 25000, 'ggg', '2019-11-20 13:22:03', '4'),
(67, '2019-11-24 20:40:36', 1029, '5d8810b053e6b', 10000, 'machrus', '2019-11-24 21:40:36', '4'),
(68, '2019-12-20 05:46:47', 1029, '5d880db876ad5', 25000, 'g', '2019-12-20 06:46:47', '1'),
(69, '2019-12-20 05:51:26', 1029, '5d880db876ad5', 25000, 'y', '2019-12-20 06:51:26', '1'),
(70, '2019-12-20 10:15:16', 1032, '5d880db876ad5', 1000000, 'machrus', '2019-12-20 11:15:16', '1');

--
-- Trigger `topup`
--
DELIMITER $$
CREATE TRIGGER `topupsaldo` AFTER UPDATE ON `topup` FOR EACH ROW BEGIN
 if new.id_status = 1 then
 update icash set saldo_icash = saldo_icash + new.jumlah_transfer
 where id_user= new.id_user;
 end if;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesan` varchar(15) NOT NULL,
  `id_bank` varchar(45) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bts_transfer` varchar(30) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transfer`
--

INSERT INTO `transfer` (`id_transfer`, `id_user`, `id_pesan`, `id_bank`, `nama`, `bts_transfer`, `id_status`) VALUES
(7, 1029, '5dd1428b93fb7', '5d8810b053e6b', 'machrus ', '2019-11-17 20:52:22', 1),
(8, 1029, '5dd14432a4e7f', '5d88134403ceb', 'machrus ', '2019-11-17 20:59:25', 4),
(9, 1029, '5dfbfd19d849c', '5d881319f0a4a', 'hh', '2019-12-20 06:43:35', 1);

--
-- Trigger `transfer`
--
DELIMITER $$
CREATE TRIGGER `status` AFTER UPDATE ON `transfer` FOR EACH ROW BEGIN

 update pesan set id_status = new.id_status
 where id_pesan= new.id_pesan;

 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('1','2') DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `alamat`, `email`, `no_tlp`, `password`, `hak_akses`, `photo`) VALUES
(1001, 'admin', 'banyuwangi', 'admin@gmail.com', '089660652230', '21232f297a57a5a743894a0e4a801fc3', '1', ''),
(1002, 'user', 'banyuwangi', 'user@gmail.com', '089660652230', 'ee11cbb19052e40b07aac0ca060c23ee', '2', 'Screenshot_2019-08-27-09-03-50.png'),
(1003, 'oke', 'oke', 'oke@gmail.com ', '8686', '0079fcb602361af76c4fd616d60f9414', '2', 'Screenshot_2019-08-07-21-33-56.png'),
(1023, 'coba', 'alamat', 'coba@gmail.com', '089660652230', 'c3ec0f7b054e729c5a716c8125839829', '2', 'Screenshot_2019-10-07-00-32-56.png'),
(1025, 'aan', 'kediri', 'aanmachrus@gmail.com', '0896606522320', '4607ed4bd8140e9664875f907f48ae14', '2', '1571724336283.jpg'),
(1026, 'Alfan Fatoni', 'salamrejo', 'alfanfatoni92@gmail.com', '08983784759', '25d55ad283aa400af464c76d713c07ad', '2', 'IMG_20191019_115308.jpg'),
(1029, 'machrus', 'Banyuwangi', 'machrus@gmail.com', '08123456789', '202cb962ac59075b964b07152d234b70', '2', '1569543611715.jpg'),
(1030, 'aan', 'Kediri', 'aanmachrus@gmail.com', '089660652230', 'c20ad4d76fe97759aa27a0c99bff6710', '2', NULL),
(1031, 'danang', 'banyuwangi', 'danang@gamil.com', '0899999', '6a17faad3b1275fd2558d5435c58440e', '2', NULL),
(1032, 'aanmachrus', 'banyuwangi', 'aanmachrus@gmail.com', '08123456789', 'c20ad4d76fe97759aa27a0c99bff6710', '2', NULL);

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `saldo` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    INSERT INTO icash
    set id_user = new.id_user;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `icash`
--
ALTER TABLE `icash`
  ADD PRIMARY KEY (`id_icash`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jamtayang`
--
ALTER TABLE `jamtayang`
  ADD PRIMARY KEY (`id_jamtayang`);

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indeks untuk tabel `nonton`
--
ALTER TABLE `nonton`
  ADD PRIMARY KEY (`id_nonton`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `recort`
--
ALTER TABLE `recort`
  ADD PRIMARY KEY (`id_recort`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `icash`
--
ALTER TABLE `icash`
  MODIFY `id_icash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nonton`
--
ALTER TABLE `nonton`
  MODIFY `id_nonton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `recort`
--
ALTER TABLE `recort`
  MODIFY `id_recort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `topup`
--
ALTER TABLE `topup`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
