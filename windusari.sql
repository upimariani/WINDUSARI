-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 03.28
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `windusari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `no_rekening` varchar(125) DEFAULT NULL,
  `nama_bank` varchar(20) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `pin` varchar(15) DEFAULT NULL,
  `saldo` bigint(20) DEFAULT 0,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `no_rekening`, `nama_bank`, `nama_nasabah`, `pin`, `saldo`, `id_pelanggan`) VALUES
(26, '8999-66-333220-00-2', 'BNI', 'Zaenal', '080905', 8796000, 12),
(27, '5669-88-744452-33-6', 'BNI', 'Sukma', '140319', 924000, 15),
(28, '7889-96-655412-55-6', 'BNI', 'Jaenudin', '020211', 9864050, 19),
(29, '6332-58-874552-36-9', 'BNI', 'ARYA', '020270', 0, 19),
(30, '9885-63-325587-45-5', 'BNI', 'Hamdani', '070796', 0, 17),
(31, '8774-55-698874-45-5', 'BNI', 'Dinda Maelani', '140399', 9961050, 21),
(32, '4556-33-211599-87-8', 'BNI', 'Maila', '050599', 9928450, 22),
(33, '4558-99-655236-65-8', 'BNI', 'Upi', '050555', 9982300, 13),
(34, '5889-96-655123-66-9', 'BNI', 'Hamzah', '140399', 9683250, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `admin_send` text DEFAULT NULL,
  `pelanggan_send` text DEFAULT NULL,
  `time_chatting` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `id_admin`, `admin_send`, `pelanggan_send`, `time_chatting`) VALUES
(64, 9, 10, 'hai', NULL, '2021-07-28 11:50:31'),
(65, 13, 0, NULL, 'hai', '2021-07-28 11:59:44'),
(66, 9, 10, 'aku admin', NULL, '2021-07-28 12:01:12'),
(67, 9, 10, '', NULL, '2021-07-28 12:04:51'),
(68, 9, 10, 'aku', NULL, '2021-07-28 12:05:55'),
(69, 9, 10, 'ini', NULL, '2021-07-28 12:06:10'),
(70, 9, 10, 'ini aku', NULL, '2021-07-28 12:09:14'),
(71, 9, 10, 'aku admin', NULL, '2021-07-28 12:10:00'),
(72, 9, 10, 'upi', NULL, '2021-07-28 12:12:25'),
(73, 13, 10, 'aku', NULL, '2021-07-28 12:12:58'),
(74, 13, 10, 'aku admin', NULL, '2021-07-28 12:13:21'),
(75, 9, 10, 'aku adalah yang kamu harapkan', NULL, '2021-07-28 23:13:16'),
(76, 9, 10, 'kli', NULL, '2021-08-01 07:51:47'),
(77, 9, 10, 'aku', NULL, '2021-08-27 08:10:06'),
(78, 9, 10, 'hai juga', NULL, '2021-08-30 12:44:22'),
(79, 9, 10, NULL, 'contoh', '2021-09-05 02:00:13'),
(80, 13, 10, NULL, 'hai pelanggan', '2021-09-19 13:09:59'),
(81, 13, 10, NULL, 'hai', '2021-09-19 13:10:06'),
(82, 13, 10, NULL, 'aku', '2021-09-19 13:10:27'),
(89, 13, 10, 'hai juga pelanggan', NULL, '2021-09-19 13:21:18'),
(90, 13, 10, NULL, 'ini tes', '2021-09-19 13:23:37'),
(91, 13, 10, NULL, 'tes2', '2021-09-19 13:26:21'),
(92, 13, 10, NULL, 'tes3', '2021-09-19 13:29:28'),
(93, 13, 10, 'ini admin', NULL, '2021-09-19 13:37:12'),
(94, 13, 10, NULL, 'hai', '2021-09-19 13:39:04'),
(106, 9, NULL, 'iya gapapa', NULL, '2021-09-20 01:01:59'),
(107, 9, NULL, 'sa', NULL, '2021-09-20 01:02:07'),
(108, 13, NULL, 'as', NULL, '2021-09-20 01:03:04'),
(109, 13, NULL, 'as', NULL, '2021-09-20 01:03:48'),
(110, 13, NULL, 'cxcx', NULL, '2021-09-20 01:03:53'),
(111, 13, NULL, 'as', NULL, '2021-09-20 01:08:09'),
(112, 13, NULL, 'tes', NULL, '2021-09-20 01:10:13'),
(113, 13, NULL, 'aku admin', NULL, '2021-09-20 01:11:25'),
(114, 13, NULL, 'a', NULL, '2021-09-20 01:12:50'),
(115, 9, NULL, 'hai', NULL, '2021-09-20 01:13:21'),
(116, 13, 10, NULL, 'hai', '2021-09-20 01:17:28'),
(117, 9, NULL, 'cek', NULL, '2021-09-20 01:18:51'),
(118, 9, NULL, 'sho2', NULL, '2021-09-20 01:19:00'),
(119, 9, NULL, '2', NULL, '2021-09-20 01:21:48'),
(120, 9, NULL, '3', NULL, '2021-09-20 01:23:17'),
(121, 9, NULL, 'iya gapapa', NULL, '2021-09-20 01:24:38'),
(122, 9, NULL, 'iya gapapa', NULL, '2021-09-20 01:25:30'),
(123, 9, NULL, 'ini admin', NULL, '2021-09-20 01:26:26'),
(124, 9, NULL, 'ini admin', NULL, '2021-09-20 01:30:56'),
(125, 9, NULL, 'coba', NULL, '2021-09-20 01:31:03'),
(126, 9, NULL, 'aku', NULL, '2021-09-20 01:33:19'),
(127, 9, NULL, 'iya gapapa', NULL, '2021-09-20 01:33:36'),
(128, 13, 10, NULL, 'iya gapapa', '2021-09-20 01:34:48'),
(129, 13, NULL, 'iya gapapa', NULL, '2021-09-20 01:35:13'),
(130, 13, NULL, 'iya gapapa2', NULL, '2021-09-20 01:36:57'),
(131, 13, NULL, 'tes lagi', NULL, '2021-09-20 01:37:24'),
(132, 13, NULL, 'iya gapapa', NULL, '2021-09-20 01:37:54'),
(133, 13, 10, 'cek', NULL, '2021-09-20 01:40:12'),
(134, 13, 10, 'sekali lagi', NULL, '2021-09-20 01:40:57'),
(135, 13, 10, 'ya', NULL, '2021-09-20 01:41:19'),
(136, 13, 10, 'oy', NULL, '2021-09-20 02:40:57'),
(137, 13, 10, NULL, 'aku', '2021-09-20 02:41:16'),
(138, 13, 10, 'iya', NULL, '2021-09-20 13:29:27'),
(139, 12, 10, NULL, 'hai', '2021-09-23 04:51:47'),
(140, 12, 10, NULL, 'aku', '2021-09-23 04:51:54'),
(141, 21, 10, NULL, 'hai', '2021-10-12 06:49:36'),
(142, 11, 10, NULL, 'hai admin', '2021-10-14 01:37:43'),
(143, 13, 10, 'ada yang bisa dibantu?', NULL, '2021-10-14 03:53:04'),
(144, 21, 10, 'ada yang bisa dibantu?', NULL, '2021-10-14 04:54:08'),
(145, 11, 10, NULL, 'hai', '2021-10-25 04:40:25'),
(146, 11, 10, 'hai ada yang bisa dibantu?', NULL, '2021-11-13 06:20:02'),
(147, 11, 10, NULL, 'apakah produk sistik ready?', '2021-11-13 07:00:27'),
(148, 11, 10, NULL, 'hai', '2021-11-18 01:24:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `id_diskon` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_rinci`, `no_order`, `id_diskon`, `qty`) VALUES
(1, 'TI20211113OZ7BSDRY', 10, 1),
(2, 'TI20211113OZ7BSDRY', 19, 1),
(3, 'D202111132S3EYGUO', 22, 4),
(4, 'D202111132S3EYGUO', 25, 1),
(5, 'D202111132S3EYGUO', 19, 1),
(6, 'TI20211113XGOZUM2G', 24, 1),
(7, 'TI20211113XGOZUM2G', 12, 1),
(8, 'D20211113CG7ZMUP2', 1, 1),
(9, 'D20211113CG7ZMUP2', 4, 1),
(10, 'D20211117W5M92OYK', 1, 1),
(11, 'D20211117EHUFL6AT', 7, 1),
(12, 'D20211117EHUFL6AT', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_kategori` varchar(11) DEFAULT NULL,
  `id_produk` varchar(15) DEFAULT NULL,
  `nama_diskon` varchar(255) DEFAULT NULL,
  `besar_diskon` int(11) DEFAULT NULL,
  `level_member` varchar(30) DEFAULT NULL,
  `tgl_selesai` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_kategori`, `id_produk`, `nama_diskon`, `besar_diskon`, `level_member`, `tgl_selesai`) VALUES
(1, 'KC6TW', 'WSBARV8', '0', 0, '1', '0'),
(2, 'KC6TW', 'WSBARV8', '0', 0, '2', '0'),
(3, 'KC6TW', 'WSBARV8', '0', 0, '3', '0'),
(4, 'YJD9U', 'WS7EBHS', '0', 0, '1', '0'),
(5, 'YJD9U', 'WS7EBHS', '0', 0, '2', '0'),
(6, 'YJD9U', 'WS7EBHS', '0', 0, '3', '0'),
(7, 'MXPQZ', 'WSLHNRN', '0', 0, '1', '0'),
(8, 'MXPQZ', 'WSLHNRN', '0', 0, '2', '0'),
(9, 'MXPQZ', 'WSLHNRN', '0', 0, '3', '0'),
(10, 'FXIHQ', 'WSLO6ZX', '0', 0, '1', '0'),
(11, 'FXIHQ', 'WSLO6ZX', '0', 0, '2', '0'),
(12, 'FXIHQ', 'WSLO6ZX', '0', 0, '3', '0'),
(13, 'T2E9F', 'WSOTP6Y', '0', 0, '1', '0'),
(14, 'T2E9F', 'WSOTP6Y', '0', 0, '2', '0'),
(15, 'T2E9F', 'WSOTP6Y', '0', 0, '3', '0'),
(16, 'BKXRH', 'WSRHU4D', '0', 0, '1', '0'),
(17, 'BKXRH', 'WSRHU4D', '0', 0, '2', '0'),
(18, 'BKXRH', 'WSRHU4D', '0', 0, '3', '0'),
(19, '0Z87Q', 'WSAZPWP', '0', 0, '1', '0'),
(20, '0Z87Q', 'WSAZPWP', '0', 0, '2', '0'),
(21, '0Z87Q', 'WSAZPWP', '0', 0, '3', '0'),
(22, 'Z8PQE', 'WSLBKUZ', '0', 0, '1', '0'),
(23, 'Z8PQE', 'WSLBKUZ', '0', 0, '2', '0'),
(24, 'Z8PQE', 'WSLBKUZ', '0', 0, '3', '0'),
(25, '01XV5', 'WSOULWI', '0', 0, '1', '0'),
(26, '01XV5', 'WSOULWI', '0', 0, '2', '0'),
(27, '01XV5', 'WSOULWI', 'Harian', 5, '3', '12/31/2021'),
(28, 'PWOYG', 'WS7EBHS', '0', 0, '1', '0'),
(29, 'PWOYG', 'WS7EBHS', '0', 0, '2', '0'),
(30, 'PWOYG', 'WS7EBHS', '0', 0, '3', '0'),
(31, 'VRGHG', 'WS7EBHS', '0', 0, '1', '0'),
(32, 'VRGHG', 'WS7EBHS', '0', 0, '2', '0'),
(33, 'VRGHG', 'WS7EBHS', '0', 0, '3', '0'),
(34, 'NPAHD', 'WSAZPWP', '0', 0, '1', '0'),
(35, 'NPAHD', 'WSAZPWP', '0', 0, '2', '0'),
(36, 'NPAHD', 'WSAZPWP', '0', 0, '3', '0'),
(37, 'XDIKW', 'WSAZPWP', '0', 0, '1', '0'),
(38, 'XDIKW', 'WSAZPWP', '0', 0, '2', '0'),
(39, 'XDIKW', 'WSAZPWP', '0', 0, '3', '0'),
(40, 'XVQGE', 'WSBARV8', '0', 0, '1', '0'),
(41, 'XVQGE', 'WSBARV8', '0', 0, '2', '0'),
(42, 'XVQGE', 'WSBARV8', '0', 0, '3', '0'),
(43, 'LFPXF', 'WSLBKUZ', '0', 0, '1', '0'),
(44, 'LFPXF', 'WSLBKUZ', '0', 0, '2', '0'),
(45, 'LFPXF', 'WSLBKUZ', '0', 0, '3', '0'),
(46, 'TFGZB', 'WSOULWI', '0', 0, '1', '0'),
(47, 'TFGZB', 'WSOULWI', '0', 0, '2', '0'),
(48, 'TFGZB', 'WSOULWI', '0', 0, '3', '0'),
(49, 'G2JJQ', 'WSOULWI', '0', 0, '1', '0'),
(50, 'G2JJQ', 'WSOULWI', '0', 0, '2', '0'),
(51, 'G2JJQ', 'WSOULWI', '0', 0, '3', '0'),
(52, 'ZUSE0', 'WSOULWI', '0', 0, '1', '0'),
(53, 'ZUSE0', 'WSOULWI', '0', 0, '2', '0'),
(54, 'ZUSE0', 'WSOULWI', '0', 0, '3', '0'),
(55, 'S0VHD', 'WSLHNRN', '0', 0, '1', '0'),
(56, 'S0VHD', 'WSLHNRN', '0', 0, '2', '0'),
(57, 'S0VHD', 'WSLHNRN', '0', 0, '3', '0'),
(58, 'OUXRH', 'WSLHNRN', '0', 0, '1', '0'),
(59, 'OUXRH', 'WSLHNRN', '0', 0, '2', '0'),
(60, 'OUXRH', 'WSLHNRN', '0', 0, '3', '0'),
(61, 'YA6AJ', 'WSLHNRN', '0', 0, '1', '0'),
(62, 'YA6AJ', 'WSLHNRN', '0', 0, '2', '0'),
(63, 'YA6AJ', 'WSLHNRN', '0', 0, '3', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `id_jasa_pengiriman` int(11) NOT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `nama_expedisi` varchar(15) DEFAULT NULL,
  `estimasi` varchar(20) DEFAULT NULL,
  `paket` varchar(25) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`id_jasa_pengiriman`, `no_order`, `nama_expedisi`, `estimasi`, `paket`, `berat`, `ongkir`, `provinsi`, `kota`, `alamat`, `kode_pos`) VALUES
(1, 'D20210904WECDEIY4', 'jne', '1-2 Hari', 'CTC', 1250, 7000, 'Jawa Barat', 'Kuningan', 'Winduherang', '45511'),
(2, 'D20210904CVXQQOUY', 'jne', '1-2 Hari', 'REG', 500, 13000, 'DKI Jakarta', 'Jakarta Selatan', 'asasasasa', '1212'),
(3, 'D20210904CTTIF1U0', 'jne', '1-2 Hari', 'REG', 1500, 26000, 'DKI Jakarta', 'Jakarta Selatan', 'asasasasa', '1212'),
(4, 'D20210904TADVCBHS', 'jne', '5-7 Hari', 'REG', 500, 55000, 'Kepulauan Riau', 'Kepulauan Anambas', 'asasasasa', '1212'),
(5, 'D20210906LOBJ3SIP', 'tiki', '4 Hari', 'ECO', 3000, 27000, 'Jawa Barat', 'Bandung', 'Cilegob', '455112'),
(6, 'D20210906MVR8UIUK', 'jne', '1-2 Hari', 'REG', 1000, 19000, 'DI Yogyakarta', 'Bantul', 'asasasasa', '1212'),
(7, 'D20210907MJUNECRU', 'jne', '3-6 Hari', 'OKE', 750, 34000, 'Lampung', 'Tulang Bawang', 'asasasasa', '1212'),
(8, 'D20210907SAO96FND', 'tiki', '4 Hari', 'ECO', 250, 9000, 'DKI Jakarta', 'Jakarta Pusat', 'asasasasa', '1212'),
(9, 'D202109080KHAJWL6', 'jne', '3-6 Hari', 'OKE', 1000, 18000, 'Banten', 'Lebak', 'Winduherang', '45511'),
(10, 'D20210914MRTGAEGN', 'pos', '3 HARI Hari', 'Paket Kilat Khusus', 1000, 39500, 'Kepulauan Riau', 'Batam', 'Riau', '45511'),
(11, 'D20210918UZWEQ8TO', 'jne', '5-7 Hari', 'OKE', 500, 52000, 'Kalimantan Barat', 'Sanggau', 'asadsd', '12121'),
(12, 'D20210919KVKSFBX7', 'tiki', '6 Hari', 'ECO', 250, 77000, 'Maluku Utara', 'Halmahera Barat', 'asasasasa', '1212'),
(13, 'D20210920AIM2GFDN', 'jne', '1-1 Hari', 'CTCYES', 500, 9000, 'Jawa Barat', 'Kuningan', '', ''),
(14, 'D20210920EJBJXMI1', 'jne', '3-6 Hari', 'OKE', 3500, 72000, 'Banten', 'Pandeglang', 'Karang Anyar', '45551'),
(15, 'D202109219NCXWGTZ', 'jne', '5-7 Hari', 'OKE', 750, 52000, 'Kalimantan Selatan', 'Tabalong', 'Anyar', '45533'),
(16, 'D202109224JTFYPKT', 'jne', '3-6 Hari', 'OKE', 500, 19000, 'DI Yogyakarta', 'Kulon Progo', 'Karang Anyar', '45552'),
(17, 'D20210923GKEO6D3X', 'tiki', '4 Hari', 'REG', 500, 86000, 'Kalimantan Utara', 'Malinau', 'asasasasa', '1212'),
(18, 'D202110120S4SKYRV', 'jne', '3-6 Hari', 'OKE', 1000, 19000, 'DI Yogyakarta', 'Gunung Kidul', 'Gunung Kidul No.24', '45552'),
(19, 'D20211014W85DFBPJ', 'jne', '3-6 Hari', 'OKE', 1250, 49000, 'Bengkulu', 'Bengkulu Utara', 'Bengkulu', '4551'),
(20, 'D20211014KFYIX12N', 'jne', '1-2 Hari', 'CTC', 500, 7000, 'Jawa Barat', 'Kuningan', 'Kuningan', '45551'),
(21, 'D20211112CQDERPZK', 'jne', '1-2 Hari', 'CTC', 9500, 70000, 'Jawa Barat', 'Kuningan', 'Winduherang', '4551'),
(22, 'D202111132S3EYGUO', 'jne', '2-3 Hari', 'REG', 1500, 98000, 'Kalimantan Tengah', 'Palangka Raya', 'Kalimantan', '45587'),
(23, 'D20211113CG7ZMUP2', 'jne', '1-2 Hari', 'CTC', 500, 7000, 'Jawa Barat', 'Kuningan', 'Windu Haji', '4551'),
(24, 'D20211117W5M92OYK', 'jne', '1-2 Hari', 'CTC', 250, 7000, 'Jawa Barat', 'Kuningan', 'Winduherang-4551', '4551'),
(25, 'D20211117EHUFL6AT', 'jne', '1-2 Hari', 'CTC', 500, 7000, 'Jawa Barat', 'Kuningan', 'Jln. Ramajaksa-Lingk Kramat JayaRT07RW08Desa/KelurahanWinduherang', '45551');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `id` varchar(10) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `qty_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id`, `berat_produk`, `harga_produk`, `qty_produk`) VALUES
('01XV5', 'WSOULWI', 250, 5000, 69),
('0Z87Q', 'WSAZPWP', 250, 6000, 18),
('BKXRH', 'WSRHU4D', 250, 7000, 20),
('FXIHQ', 'WSLO6ZX', 250, 6000, 28),
('G2JJQ', 'WSOULWI', 2500, 50000, 45),
('KC6TW', 'WSBARV8', 250, 10000, 18),
('LFPXF', 'WSLBKUZ', 500, 14000, 50),
('MXPQZ', 'WSLHNRN', 250, 10000, 29),
('NPAHD', 'WSAZPWP', 500, 12000, 50),
('OUXRH', 'WSLHNRN', 2500, 100000, 30),
('PWOYG', 'WS7EBHS', 500, 14000, 63),
('S0VHD', 'WSLHNRN', 500, 20000, 50),
('T2E9F', 'WSOTP6Y', 250, 10000, 30),
('TFGZB', 'WSOULWI', 500, 10000, 30),
('VRGHG', 'WS7EBHS', 2500, 70000, 50),
('XDIKW', 'WSAZPWP', 2500, 60000, 70),
('XVQGE', 'WSBARV8', 500, 20000, 30),
('YA6AJ', 'WSLHNRN', 3000, 120000, 15),
('YJD9U', 'WS7EBHS', 250, 7000, 48),
('Z8PQE', 'WSLBKUZ', 250, 7000, 10),
('ZUSE0', 'WSOULWI', 3000, 60000, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `point` varchar(50) NOT NULL DEFAULT '0',
  `level_member` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_depan`, `nama_belakang`, `email`, `username`, `password`, `point`, `level_member`) VALUES
(11, 'Hamzah', 'Nur', 'nurhamzah@gmail.com', 'nurhamzah', 'hamzah', '103360', '1'),
(12, 'Zaenal', 'Ahmad', 'zaenal_ahmas@gmail.com', 'zaenalahmad', 'zaenal', '260', '3'),
(13, 'Lusy', 'Dwie', 'septiani@gmail.com', 'Septiani', 'lusyds', '1340', '2'),
(14, 'Tiara', 'Anjani', 'tiara@gmail.com', 'tiara', 'tiara', '0', '3'),
(15, 'Sukma', 'Dwi', 'sukma@gmail.com', 'sukma', 'sukmadwie', '100000', '1'),
(17, 'Robi', 'Herdiansyah', 'robi@gmail.com', 'robi12345', 'robi', '0', '3'),
(18, 'Andi', 'Hamdani', 'andi@gmail.com', 'andihamdani', 'andi', '0', '3'),
(19, '12', '34', '12@gmail.com', '12345', '12345', '1300', '2'),
(20, 'Rowina', 'Nopi', 'rowina@gmail.com', 'rowina', 'rowina', '0', '3'),
(21, 'Dinda', 'Maelani', 'dinda@gmail.com', 'dindamaelani', 'dinda12345', '440', '3'),
(22, 'Maila', 'Dwi', 'maila@gmail.com', 'mailadwi', 'mailadwi', '650', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` varchar(10) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `gambar`) VALUES
('WS7EBHS', 'Kepang', '<p>Komposisi:</p><ol><li>Tepung Terigu</li><li>Gula</li></ol>', 'IMG20210905200703.jpg'),
('WSAZPWP', 'Ladu', '<p>Komposisi:</p><ol><li>Tepung Tapioka</li><li>Garam</li></ol>', 'ladu.jpg'),
('WSBARV8', 'Gemblong', '<p>Komposisi</p><ol><li>Singkong</li><li>Tepung Tapioka</li><li>Garam</li></ol>', 'gemblong.jpg'),
('WSLBKUZ', 'Kuping Gajah', '<p>Komposisi:</p><ol><li>Tepung Tapioka</li><li>Gula</li></ol>', 'kuping_gajah.jpg'),
('WSLHNRN', 'Jinten', '<p>Komposisi:</p><ol><li>Tepung Terigu</li><li>Gula Pasir</li><li>Jintan Hitam</li></ol>', 'jinten.jpg'),
('WSLO6ZX', 'Kacang Asin', 'Asin dan Gurih', 'kacang_asin.jpg'),
('WSOTP6Y', 'Kacang Telor', '<p>Komposisi:</p><ol><li>Kacang Tanah</li><li>Tepung Terigu</li><li>Garam</li><li>Mentega</li></ol>', 'kacang_telor.jpg'),
('WSOULWI', 'Sistik', '<p>Komposisi:</p><ol><li>Tepung Tapioka</li><li>Tepung Terigu</li><li>Mentega</li><li>Garam</li></ol>', 'sistik.jpg'),
('WSRHU4D', 'Pangpang', '<p>Komposisi:</p><ol><li>Tepung Terigu</li><li>Cabai merah</li><li>Garam</li></ol>', 'pangpang.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id` varchar(20) DEFAULT NULL,
  `nilai_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id`, `nilai_rating`) VALUES
(1, 'WSEGKR0', 4),
(2, 'WSEGKR0', 5),
(3, 'WSUVMYC', 3),
(4, 'WSVPDZ2', 4),
(5, 'WSQPST7', 0),
(6, 'WSTGT39', 0),
(7, 'WSEGKR0', 5),
(8, 'WSTKUSN', 4),
(9, 'WSDN5Y6', 0),
(10, 'WSUVMYC', 4),
(11, 'WSVPDZ2', 5),
(12, 'WSWOIFJ', 0),
(13, 'WSXGILO', 0),
(14, 'WSMZISA', 0),
(15, 'WSZNKFY', 0),
(16, 'WSVPDZ2', 4),
(17, 'WSXGILO', 4),
(18, 'WSTKUSN', 5),
(19, 'WSVBJJO', 0),
(20, 'WSW3K4I', 0),
(21, 'WSUVMYC', 5),
(22, 'WSQPST7', 4),
(23, 'WSXGILO', 5),
(24, 'WSXNRVV', 0),
(25, 'WSUYPME', 0),
(26, 'WSTKUSN', 5),
(27, 'WSUVMYC', 4),
(28, 'WSTKUSN', 5),
(29, 'WSUVMYC', 5),
(30, 'WSTKUSN', 5),
(31, 'WSUVMYC', 5),
(32, 'WSVPDZ2', 4),
(33, 'WSRUWKX', 0),
(34, 'WSW3K4I', 5),
(35, 'WSUVMYC', 5),
(36, 'WSBARV8', 0),
(37, 'WS7EBHS', 0),
(38, 'WSLHNRN', 0),
(39, 'WSLO6ZX', 0),
(40, 'WSOTP6Y', 0),
(41, 'WSRHU4D', 0),
(42, 'WSAZPWP', 0),
(43, 'WSLBKUZ', 0),
(44, 'WSOULWI', 0),
(45, 'WSLO6ZX', 5),
(46, 'WSAZPWP', 4),
(47, 'WSLBKUZ', 5),
(48, 'WSOULWI', 5),
(49, 'WSAZPWP', 5),
(50, 'WSLBKUZ', 5),
(51, 'WSLO6ZX', 5),
(52, 'WSBARV8', 5),
(53, 'WS7EBHS', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_diskon` int(11) DEFAULT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `time_review` timestamp NULL DEFAULT current_timestamp(),
  `isi_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_diskon`, `no_order`, `time_review`, `isi_review`) VALUES
(1, 10, 'TI20211113OZ7BSDRY', '2021-11-13 06:08:05', 'Recommended Bangett'),
(2, 19, 'TI20211113OZ7BSDRY', '2021-11-13 06:08:05', 'Sukaaa'),
(3, 22, 'D202111132S3EYGUO', '2021-11-13 06:09:58', 'Bagus Banget, pengiriman cepat'),
(4, 25, 'D202111132S3EYGUO', '2021-11-13 06:09:58', 'Sukakkkk\r\n'),
(5, 19, 'D202111132S3EYGUO', '2021-11-13 06:09:58', 'Suka Pisan'),
(6, 24, 'TI20211113XGOZUM2G', '2021-11-13 06:16:59', 'penjual ramah'),
(7, 12, 'TI20211113XGOZUM2G', '2021-11-13 06:16:59', 'produk yang diperjual belikan berkualitas'),
(8, 1, 'D20211113CG7ZMUP2', '2021-11-13 07:04:03', 'Recomended'),
(9, 4, 'D20211113CG7ZMUP2', '2021-11-13 07:04:03', 'Enakk'),
(10, 1, 'D20211117W5M92OYK', '2021-11-17 22:26:19', '0'),
(11, 7, 'D20211117EHUFL6AT', '2021-11-17 22:35:53', '0'),
(12, 4, 'D20211117EHUFL6AT', '2021-11-17 22:35:53', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telp`) VALUES
(1, 'Windu Sari', 211, 'Jln.Ramajaksa Lingk.Kramat Jaya Kelurahan Winduherang', '085156727368');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_jasa_pengiriman` int(11) DEFAULT NULL,
  `status_pengiriman` text DEFAULT NULL,
  `keterangan` text NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_jasa_pengiriman`, `status_pengiriman`, `keterangan`, `time`) VALUES
(1, 5, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[JAKARTA]', '2021-09-06 01:18:46'),
(2, 5, 'SHIPMENT PICKED UP BY COURIER', '[KUNINGAN]', '2021-09-06 01:18:59'),
(3, 9, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[JAKARTA]', '2021-09-08 02:45:20'),
(4, 9, 'RECEIVED AT ORIGIN GATEWAY', '[YOGYAKARTA]', '2021-09-08 02:45:33'),
(5, 14, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[JAKARTA]', '2021-09-20 13:23:25'),
(6, 14, 'DEPATED FROM TRANSIT', '[JAKARTA]', '2021-09-20 13:23:43'),
(7, 3, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[JAKARTA]', '2021-09-21 00:38:12'),
(8, 3, 'DEPATED FROM TRANSIT', '[YOGYAKARTA]', '2021-09-21 00:38:25'),
(9, 3, 'RECEIVED AT ORIGIN GATEWAY', '[JAKARTA]', '2021-09-22 01:21:59'),
(10, 3, 'DEPATED FROM TRANSIT', '[JAKARTA]', '2021-09-22 01:25:48'),
(11, 18, 'RECEIVED AT SORTING CENTER', '[JAKARTA]', '2021-10-12 06:09:48'),
(12, 18, 'WITH DELIVERY COURIER', 'MAMAN RUDIMAN', '2021-10-12 06:10:01'),
(13, 19, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[JAKARTA]', '2021-10-14 01:26:54'),
(14, 19, 'RECEIVED AT INBOUND STATION', '[JAKARTA]', '2021-10-14 01:27:06'),
(15, 20, 'RECEIVED AT ORIGIN GATEWAY', '[JAKARTA]', '2021-10-14 04:46:48'),
(16, 21, 'SHIPMENT RECEIVED BY COUNTER OFFICER', '[KUNINGAN]', '2021-11-12 20:48:02'),
(17, 21, 'RECEIVED AT ORIGIN GATEWAY', '[KUNINGAN]', '2021-11-12 20:48:31'),
(18, 22, 'RECEIVED AT ORIGIN GATEWAY', '[JAKARTA]', '2021-11-13 06:11:26'),
(19, 23, 'WITH DELIVERY COURIER', 'MAMAN RUDIMAN', '2021-11-13 07:07:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_order` varchar(30) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tgl_order` varchar(10) DEFAULT NULL,
  `nama_penerima` varchar(125) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` int(1) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `kode_pembayaran` varchar(30) DEFAULT 'COD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_order`, `id_pelanggan`, `tgl_order`, `nama_penerima`, `no_telp`, `subtotal`, `total_bayar`, `status_pembayaran`, `status_order`, `no_resi`, `kode_pembayaran`) VALUES
('D202111132S3EYGUO', 11, '2021-11-13', 'Ahmda', '085156727368', 38250, 136250, 1, 3, '123456', 'WSBRIKXENINR3YWH2'),
('D20211113CG7ZMUP2', 11, '2021-11-13', 'Hamzah', '085156727368', 17000, 24000, 1, 3, '002278994', 'WSBRIV2CHSSYTI1MD'),
('D20211117EHUFL6AT', 11, '2021-11-17', 'Jordi', '085156727368', 17000, 24000, 0, 0, NULL, 'WSBRITLRAUTQ8OARI'),
('D20211117W5M92OYK', 11, '2021-11-17', 'Jajang', '085156727368', 10000, 17000, 0, 0, NULL, 'WSBRIPHR2OYCMZBKO'),
('TI20211113OZ7BSDRY', 11, '2021-11-13', 'Nanda Rism', '085156727368', 12000, 12000, 3, 3, '-', 'cod'),
('TI20211113XGOZUM2G', 12, '2021-11-13', 'zaenal', '085156727368', 13000, 13000, 3, 3, '-', 'cod');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(10, 'Bambang', 'Admin', 'Admin', 1),
(15, 'JNE', 'jne', 'jne', 2),
(16, 'POS', 'pos', 'pos', 4),
(17, 'TIKI', 'tiki', 'tiki', 3),
(18, 'ahmad', 'username', 'ahmas', 4),
(19, 'BNI', 'bni', 'bni', 5),
(21, 'Upi', 'upimariani', 'upimariani', 1),
(25, 'Upi Mariani', 'upmar', 'upimariani', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`id_jasa_pengiriman`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_order`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  MODIFY `id_jasa_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
