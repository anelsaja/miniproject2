-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 17.52
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
-- Struktur dari tabel `jadwal_konser`
--

CREATE TABLE `jadwal_konser` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
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
(1, 'konser 1.jpeg', 'FAMILY PLAT G', '29 September 2024', 'Cikarang Barat, Bekasi', 'Siang', '😍😍HAPPY PARTY FAMILY PLAT G😍😍<br />\r\nMengundang seluruh Pemuda-Pemudi Cikarang yang memiliki motor plat G\r\nMari berjoget ria bersama pada:<br />\r\n📅 29 September 2024<br />\r\n⏰ 15.00 - END<br />\r\n📍 Cikarang, Jawa Barat<br />\r\n💵 20K<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Photocards, Handbanner, Sticker<br />\r\n2. ⁠Food and Drink<br />\r\n3. ⁠Photobooth Corner<br />\r\n4. ⁠Doorprize<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati<br />', 'Rp 20.000,-', '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />\r\n5. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'GG Music', 'https://www.youtube.com/@GGMUSIKGELAGELO', 'Adinda Rachel, Kurnia Rahma, Shinta Arsinta, Siska Amanda, Dinda Teratu.', 'GG Musik.png', 'youtube.png', 'layout.jpg'),
(2, 'konser 2.jpeg', 'BUKBER ZARIDEN MUSIK', '3 Maret 2024', 'Kembang, Jepara', 'Malam', 'BUKBER ZARIDIN MUSIK<br />\r\nMengundang seluruh Pemuda-Pemudi sahabat Zariden Musik!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 3 Maret 2024<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 'Rp 20.000,-', '1. Entry Pass yang sah hanya yang dibeli via OJINK.id.<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain! <br />         \r\n3. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Dinda Teratu, Siska Amanda, Bunga Permata', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(3, 'konser 3.jpeg', 'MONDOL JOS MONDOL', '23 Maret 2024', 'Kalongan, Purwodadi', 'Malam', 'MONDOL JOS MONDOL<br />\r\nMengundang seluruh yang ingin menikmati musik bersama Mondol Jos Mondol!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 23 Maret 2024<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Makan makan bersama<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 'Rp 20.000,-', '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n4. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!', 'Mondol Music', 'https://www.instagram.com/mondolmusic', 'Ana Sintiya, Diaz Permata, Rita PK', 'Mondol.jpg', 'ig.png', 'layout.jpg'),
(4, 'konser 4.jpeg', 'HAPPY PARTY PBK', '16 April 2024', 'Gajah, Demak', 'Siang', 'HAPPY PARTY PBK<br />\r\nMengundang seluruh Pemuda-Pemudi PBK!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 16 April 2024<br />\r\n⏰ 14.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju<br />\r\n2. Minuman<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 'Rp 25.000,-', '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n3. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Giana Alfinot, Seruni Angelica, Icha Febriana, Dinda Teratu', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(5, 'konser 5.jpeg', 'ARPAW COMUNITY', '4 Mei 2024', 'Cluwak, Pati', 'Malam', 'HAPPY PARTY ARPAW COMMUNITY<br />\r\nMengundang seluruh Pemuda-Pemudi ARPAW COMMUNITY!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Makan<br />\r\n3. Minum<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 'Rp 26.000,-', '1. Entry Pass yang sah hanya yang dibeli via OJINK.id<br />\r\n2. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!', 'Zaridin Music', 'https://www.youtube.com/@zariden_music', 'Ajeng Febria, Din Annesia, Adinda Rachel, Dinda Teratu, Diors Celine, Evis Renata', 'Zariden.png', 'youtube.png', 'layout.jpg'),
(6, 'konser 6.jpeg', 'SENGKUNI GENK', '27 Mei 2024', 'Gunungwungkal, Pati', 'Malam', 'HAPPY PARTY SENGKUNI GENK<br />\r\nMengundang seluruh Pemuda-Pemudi SENGKUNI GENK!!!<br />\r\nMari berjoget ria bersama pada:<br />\r\n📅 27 Mei 2024<br />\r\n⏰ 19.00 - END<br />\r\nBenefit yang anda dapatkan dari orkes ini adalah:<br />\r\n1. Baju Orkes<br />\r\n2. Minum Saja<br />\r\nJangan lupakan Orkes ini dan dapatkan tiket anda di Ojink<br />\r\nDM @inpoorkespati & LINK GROUP untuk info lebih lanjut<br />\r\nKami tunggu kedatangan anda!!!<br />\r\n#inpoorkespati #inpodangdut #orkespati', 'Rp 30.000,-', '1. Entry Pass hanya berlaku untuk satu orang. Jangan berbagi dengan orang lain!<br />\r\n2. Panitia dan Promotor tidak bertanggung jawab atas kerugian akibat pembelian tiket dari sumber yang tidak resmi.<br />\r\n3. Tiket yang hilang atau dicuri tidak bisa diganti. Jagalah tiket Anda dengan baik!<br />\r\n4. Panitia, Promotor, dan Pengisi Acara tidak menanggung biaya transportasi atau akomodasi jika acara dibatalkan atau diundur.', 'Shaun The Sheep', 'https://www.youtube.com/@kemputstsmanagemen1345', 'Adinda Rachel, Dinda Teratu, Feby Maharani, Salma Novita', 'STS.png', 'youtube.png', 'layout.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_konser`
--
ALTER TABLE `jadwal_konser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_konser`
--
ALTER TABLE `jadwal_konser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
