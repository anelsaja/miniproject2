-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 16.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembelian_tiket`
--

CREATE TABLE `data_pembelian_tiket` (
  `id` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `waktu_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pembelian_tiket`
--

INSERT INTO `data_pembelian_tiket` (`id`, `id_pemesan`, `id_tiket`, `jumlah_tiket`, `waktu_pembelian`) VALUES
(27, 24, 19, 2, '2024-06-07 09:22:10'),
(28, 24, 20, 1, '2024-06-07 09:22:10'),
(29, 25, 19, 2, '2024-06-07 09:22:39'),
(30, 25, 20, 1, '2024-06-07 09:22:39'),
(31, 26, 19, 2, '2024-06-07 09:22:53'),
(32, 26, 20, 1, '2024-06-07 09:22:53'),
(33, 27, 19, 1, '2024-06-07 09:24:02'),
(34, 27, 20, 1, '2024-06-07 09:24:02'),
(35, 28, 19, 1, '2024-06-07 09:25:18'),
(36, 28, 20, 2, '2024-06-07 09:25:18'),
(37, 29, 19, 1, '2024-06-07 09:30:06'),
(38, 29, 20, 2, '2024-06-07 09:30:06'),
(39, 30, 19, 2, '2024-06-07 09:38:29'),
(40, 30, 20, 2, '2024-06-07 09:38:29'),
(41, 31, 19, 2, '2024-06-07 09:38:52'),
(42, 31, 20, 2, '2024-06-07 09:38:52'),
(43, 32, 19, 1, '2024-06-07 09:39:14'),
(44, 32, 20, 2, '2024-06-07 09:39:14'),
(45, 33, 19, 1, '2024-06-07 09:39:59'),
(46, 33, 20, 2, '2024-06-07 09:39:59'),
(47, 34, 19, 1, '2024-06-07 09:47:52'),
(48, 34, 20, 2, '2024-06-07 09:47:52'),
(49, 35, 19, 1, '2024-06-07 09:50:13'),
(50, 35, 20, 2, '2024-06-07 09:50:13'),
(51, 36, 19, 1, '2024-06-07 09:50:37'),
(52, 36, 20, 2, '2024-06-07 09:50:37'),
(53, 37, 19, 1, '2024-06-07 09:52:08'),
(54, 37, 20, 2, '2024-06-07 09:52:08'),
(55, 38, 19, 1, '2024-06-07 09:55:26'),
(56, 38, 20, 2, '2024-06-07 09:55:26'),
(57, 39, 19, 1, '2024-06-07 09:55:46'),
(58, 39, 20, 2, '2024-06-07 09:55:46'),
(59, 40, 19, 1, '2024-06-07 09:56:32'),
(60, 40, 20, 2, '2024-06-07 09:56:32'),
(61, 41, 19, 1, '2024-06-07 10:02:22'),
(62, 41, 20, 2, '2024-06-07 10:02:22'),
(63, 42, 19, 1, '2024-06-07 10:24:04'),
(64, 42, 20, 2, '2024-06-07 10:24:04'),
(65, 43, 19, 1, '2024-06-07 10:24:38'),
(66, 43, 20, 2, '2024-06-07 10:24:38'),
(67, 44, 19, 1, '2024-06-07 10:25:50'),
(68, 44, 20, 2, '2024-06-07 10:25:50'),
(69, 45, 19, 2, '2024-06-07 13:43:08'),
(70, 46, 19, 1, '2024-06-07 13:47:04'),
(71, 46, 20, 1, '2024-06-07 13:47:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemesan`
--

CREATE TABLE `data_pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `idKonser` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pemesan`
--

INSERT INTO `data_pemesan` (`id`, `nama`, `email`, `no_hp`, `idKonser`, `total_harga`) VALUES
(24, 'asfasf', 'safasf@safsdfdf', '341414', NULL, 0.00),
(25, 'asfasf', 'safasf@safsdfdf', '341414', NULL, 0.00),
(26, 'asfasf', 'safasf@safsdfdf', '341414', NULL, 0.00),
(27, 'qeqeqe', 'qeqe@asdasd', '34234', NULL, 0.00),
(28, 'adadad', 'adada@ssf', '325235235', NULL, 0.00),
(29, 'adadad', 'adada@ssf', '325235235', NULL, 0.00),
(30, 'faaf', 'sfasfa@dfgdg', '23525', NULL, 0.00),
(31, 'faaf', 'sfasfa@dfgdg', '23525', NULL, 0.00),
(32, 'fefewf', 'wfwef@sdgsd', '45462', NULL, 0.00),
(33, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(34, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(35, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(36, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(37, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(38, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(39, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(40, 'eqtqetq', 'rqre@sdgsdg', '1414124', NULL, 0.00),
(41, 'dsdwd', 'wfwfw@sfsf', '24242', NULL, 0.00),
(42, 'fsdf', 'ddsgsd@sdgsdg', '345245', NULL, 0.00),
(43, 'asfasf', 'ddsf@dd', '4314', NULL, 0.00),
(44, 'sfsfsf', 'sfsfs@sfssf', '3523535', NULL, 0.00),
(45, 'dfasf', 'adfdf@adfsdg', '413134325', NULL, 0.00),
(46, 'fdafadf', 'sdgdg@adfda', '3134134', NULL, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemilik_tiket`
--

CREATE TABLE `data_pemilik_tiket` (
  `id` int(11) NOT NULL,
  `id_pemesan` int(11) DEFAULT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `jenis_tiket` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `email_pemilik` varchar(100) DEFAULT NULL,
  `no_hp_pemilik` varchar(20) DEFAULT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_konser`
--

CREATE TABLE `jadwal_konser` (
  `id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(23) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(22) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `syarat_dan_ketentuan` text DEFAULT NULL,
  `nama_orkes` varchar(100) NOT NULL,
  `sosial_media_link` varchar(255) DEFAULT NULL,
  `artis` text DEFAULT NULL,
  `imgorkes` varchar(255) DEFAULT NULL,
  `imgsosmed` varchar(255) DEFAULT NULL,
  `imgpanggung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_konser`
--

INSERT INTO `jadwal_konser` (`id`, `img`, `title`, `tanggal`, `lokasi`, `waktu`, `deskripsi`, `harga`, `syarat_dan_ketentuan`, `nama_orkes`, `sosial_media_link`, `artis`, `imgorkes`, `imgsosmed`, `imgpanggung`) VALUES
(1, 'konser 1.jpeg', 'FAMILY PLAT G', '2024-09-29', 'Cikarang Barat, Bekasi', 'Siang', '😍😍HAPPY PARTY FAMILY PLAT G😍😍<br />\r\nMengundang seluruh Pemuda-Pemudi Cikarang yang memiliki motor plat G\r\nMari berjoget ria bersama pada:<br />\r\n📅 29 September 2024<br />\r\n⏰ 15.00 - END<br />\r\n📍 Cikarang, Jawa Barat<br />\r\n💵 20K<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Photocards, Handbanner, Sticker<br />\r\n2. ⁠Food and Drink<br />\r\n3. ⁠Photobooth Corner<br />\r\n4. ⁠Doorprize<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati<br />', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />\r\n5. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'GG Music', 'https://www.youtube.com/@GGMUSIKGELAGELO', 'Adinda Rachel, Kurnia Rahma, Shinta Arsinta, Siska Amanda, Dinda Teratu.', 'GG Musik.png', 'youtube.png', 'layout.jpg'),
(2, 'konser 2.jpeg', 'BUKBER ZARIDEN MUSIK', '2024-03-30', 'Kembang, Jepara', 'Malam', 'BUKBER ZARIDIN MUSIK<br />\r\nMengundang seluruh Pemuda-Pemudi sahabat Zariden Musik!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 3 Maret 2024<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id.<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain! <br />         \r\n3. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Dinda Teratu, Siska Amanda, Bunga Permata', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(3, 'konser 3.jpeg', 'MONDOL JOS MONDOL', '2024-03-23', 'Kalongan, Purwodadi', 'Malam', 'MONDOL JOS MONDOL<br />\r\nMengundang seluruh yang ingin menikmati musik bersama Mondol Jos Mondol!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 23 Maret 2024<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Makan makan bersama<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!', 'Mondol Music', 'https://www.instagram.com/mondolmusic', 'Ana Sintiya, Diaz Permata, Rita PK', 'Mondol.jpg', 'ig.png', 'layout.jpg'),
(4, 'konser 4.jpeg', 'HAPPY PARTY PBK', '2024-04-16', 'Gajah, Demak', 'Siang', 'HAPPY PARTY PBK<br />\r\nMengundang seluruh Pemuda-Pemudi PBK!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 16 April 2024<br />\r\n⏰ 14.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju<br />\r\n2. Minuman<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Giana Alfinot, Seruni Angelica, Icha Febriana, Dinda Teratu', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(5, 'konser 5.jpeg', 'ARPAW COMUMNITY', '2024-05-04', 'Cluwak, Pati', 'Malam', 'HAPPY PARTY ARPAW COMMUNITY<br />\r\nMengundang seluruh Pemuda-Pemudi ARPAW COMMUNITY!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Makan<br />\r\n3. Minum<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Ajeng Febria, Din Annesia, Adinda Rachel, Dinda Teratu, Diors Celine, Evis Renata', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(6, 'konser 6.jpeg', 'SENGKUNI GENK', '2024-05-27', 'Gunungwungkal, Pati', 'Malam', 'HAPPY PARTY SENGKUNI GENK<br />\r\nMengundang seluruh Pemuda-Pemudi SENGKUNI GENK!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 27 Mei 2024<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Minum Saja<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 25000, '1. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n2. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n3. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />\r\n4. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'Shaun The Sheep', 'https://www.youtube.com/@kemputstsmanagemen1345', 'Adinda Rachel, Dinda Teratu, Feby Maharani, Salma Novita', 'STS.png', 'youtube.png', 'layout.jpg'),
(7, 'konser 7.jpeg', 'MAKELAR ONLINE PART 6 ', '2024-11-17', 'Pakis Aji, Jepara', 'Malam', '😍😍MAKELAR ONLINE PART 6😍😍<br />\r\nMengundang seluruh Pemuda-Pemudi MAKELAR ONLINE PART 6\r\nMari berjoget ria bersama pada:<br />\r\n📅 17 November 2024<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Photocards, Handbanner, Sticker<br />\r\n2. ⁠Food and Drink<br />', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />\r\n5. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'Romansa', 'https://www.youtube.com/@Romansa_Nyess', 'Evis Renata, Evan Aqwila, Edot Arisna, Dinda Teratu', 'Romansa.png', 'youtube.png', 'layout.jpg'),
(8, 'konser 8.jpeg', 'BIRTHDAY PARTY K. RAHMA', '2024-12-21', 'Private Party', 'Malam', 'BIRTHDAY PARTY KURNIA RAHMA<br />\r\nMengundang seluruh Pemuda-Pemudi Cikarang yang memiliki motor plat G\r\nMari berjoget ria bersama pada:<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Photocards, Handbanner, Sticker<br />\r\n2. ⁠Food and Drink<br />\r\n#inpodangdut #orkespati<br />', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />', 'Shaun The Sheep', 'https://www.youtube.com/@kemputstsmanagemen1345', 'Dinda Teratu, Yessa Oktavia, Salma Novita, Siska Amanda, Din Annesia', 'STS.png', 'youtube.png', 'layout.jpg'),
(9, 'konser 9.jpeg', 'ANNIVERSARY M. MONICA', '2024-10-05', 'RM. Saptoerenggo Pati', 'Malam', 'ANNIVERSARY 2ND MONIC MONICA😍<br />\r\nMengundang seluruh Pemuda-Pemudi Cikarang yang memiliki motor plat G\r\nMari berjoget ria bersama pada:<br />\r\n💵 20K<br />\r\n\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati<br />', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />', 'Shaun The Sheep', 'https://www.youtube.com/@kemputstsmanagemen1345', 'Adinda Rachel, Dinda Teratu, Yessa Oktavia, Feby Maharani', 'STS.png', 'youtube.png', 'layout.jpg'),
(10, 'konser 10.jpeg', 'HAPPY PARTY CATALUNYA', '2024-06-28', 'Kembang, Jepara', 'Siang', '😍😍HAPPY PARTY FAMILY PLAT G😍😍<br />\r\nMengundang seluruh Pemuda-Pemudi Cikarang yang memiliki motor plat G\r\nMari berjoget ria bersama pada:<br />\r\n📍 Kembang, Jepara<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Photocards, Handbanner, Sticker<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati<br />', 25000, '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />', 'New Gapero', 'https://www.instagram.com/newgapero_official', 'Evis Renata, Dinda Teratu, Eva Aqwiella, Ulfa Damayanti', 'New Gapero.png', 'ig.png', 'layout.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `idKonser` int(11) NOT NULL,
  `namaPaket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `tipePaket` enum('VIP','Reguler') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `idKonser`, `namaPaket`, `harga`, `stock`, `tipePaket`) VALUES
(1, 1, 'VIP', 50000, 15, 'VIP'),
(2, 1, 'Reguler', 25000, 20, 'Reguler'),
(3, 2, 'VIP', 50000, 15, 'VIP'),
(4, 2, 'Reguler', 30000, 20, 'Reguler'),
(5, 3, 'VIP', 50000, 15, 'VIP'),
(6, 3, 'Reguler', 32000, 20, 'Reguler'),
(7, 4, 'VIP', 50000, 15, 'VIP'),
(8, 4, 'Reguler', 31000, 20, 'Reguler'),
(9, 5, 'VIP', 50000, 15, 'VIP'),
(10, 5, 'Reguler', 35000, 20, 'Reguler'),
(11, 6, 'VIP', 50000, 15, 'VIP'),
(12, 6, 'Reguler', 37000, 20, 'Reguler'),
(13, 7, 'VIP', 50000, 15, 'VIP'),
(14, 7, 'Reguler', 24000, 20, 'Reguler'),
(15, 8, 'VIP', 50000, 15, 'VIP'),
(16, 8, 'Reguler', 26000, 20, 'Reguler'),
(17, 9, 'VIP', 50000, 15, 'VIP'),
(18, 9, 'Reguler', 28000, 20, 'Reguler'),
(19, 10, 'VIP', 50000, 7, 'VIP'),
(20, 10, 'Reguler', 24000, 9, 'Reguler');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pembelian_tiket`
--
ALTER TABLE `data_pembelian_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indeks untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_data_pemesan_jadwal_konser` (`idKonser`);

--
-- Indeks untuk tabel `data_pemilik_tiket`
--
ALTER TABLE `data_pemilik_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indeks untuk tabel `jadwal_konser`
--
ALTER TABLE `jadwal_konser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKonser` (`idKonser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pembelian_tiket`
--
ALTER TABLE `data_pembelian_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `data_pemilik_tiket`
--
ALTER TABLE `data_pemilik_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_konser`
--
ALTER TABLE `jadwal_konser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pembelian_tiket`
--
ALTER TABLE `data_pembelian_tiket`
  ADD CONSTRAINT `data_pembelian_tiket_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `data_pemesan` (`id`),
  ADD CONSTRAINT `data_pembelian_tiket_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  ADD CONSTRAINT `FK_data_pemesan_jadwal_konser` FOREIGN KEY (`idKonser`) REFERENCES `jadwal_konser` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_pemilik_tiket`
--
ALTER TABLE `data_pemilik_tiket`
  ADD CONSTRAINT `data_pemilik_tiket_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `data_pemesan` (`id`),
  ADD CONSTRAINT `data_pemilik_tiket_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id`);

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`idKonser`) REFERENCES `jadwal_konser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
