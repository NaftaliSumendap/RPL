-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 06.40
-- Versi server: 11.3.0-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `idBuku` int(11) NOT NULL,
  `namaBuku` varchar(255) NOT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `tot_pinjam` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idBuku`, `namaBuku`, `id_penulis`, `id_category`, `sinopsis`, `tot_pinjam`, `gambar`, `file`) VALUES
(10, 'A Meal With Jesus', 4, 2, 'Tim Chester, melalui buku ini, dengan kreativitas mumpuni menjelaskan bagaimana kegiatan sepele ini menjadi sebuah peluang berharga untuk berbagi anugerah, membangun komunitas, bahkan menjalankan misi Allah bagi dunia ini.', 0, 'A Meal With Jesus.jpeg', ''),
(11, 'God Is Bigger', 1, 2, 'Berisi pengalaman pribadi penulis ketika melewati titik-titik terendah dalam hidupnya sebagai penderita bipolar disorder, tetapi kemudian dikuatkan oleh Tuhan untuk terus tegar dan kuat.', 0, 'God Is Bigger.jpeg', 'tes.txt'),
(12, 'Christian Worldview', 1, 2, 'Segala sesuatu yang kita pikirkan, katakan, dan lakukan mencerminkan worldview kita. Disadari atau tidak, keyakinan dasar kita tentang Allah, manusia, sejarah, dan masa depan turut menentukan bagaimana kita hidup.', 1, 'Christian Worldview.jpeg', ''),
(13, 'Informatika', 5, 1, 'TEST', 1, 'computer_book3.jpg', ''),
(14, 'A House Party in Tuscany', 6, 3, 'Di Arniano, putri mereka, Amber Guinness, menemukan minat memasak dan mendirikan The Arniano Painting School bersama salah satu pendiri William Roper Curzon. Perpaduan antara makanan dan seni, sekolah ini merayakan keterampilan memasak dan menjadi tuan rumah Amber serta bakat William dalam menyebarkan pengetahuan dan hasratnya terhadap melukis.', 0, 'hobby_book1.jpg', 'tes.txt'),
(19, 'Nostromo On The Prowl', 3, 5, 'Ini adalah sekuel A NEW ERA saya dan merupakan novel kedelapan dalam Seri Kostroma saya. Ini menggambarkan petualangan berkelanjutan di Luar Angkasa Kapten Tina Forster dan kapal kargo raksasanya yang perkasa, NOSTROMO. NOSTROMO sedang melakukan perbaikan darurat setelah pertempuran epik melawan Predator Luar Angkasa yang mengerikan di Sistem TOI 700, dengan Tina Forster yang tidak sabar untuk kembali ke Luar Angkasa untuk terus melindungi Kemanusiaan dari Predator Luar Angkasa tersebut. Serangan baru dari para Predator itu akan segera memberinya kesempatan untuk memberi mereka pelajaran baru..', 3, '1681322677.jpg', 'Nostromo On The Prowl.pdf'),
(20, 'Building Products With Big Data', 7, 1, 'Membangun Produk dengan Data melihat konsep dan pendekatan yang diperlukan untuk mengubah data mentah organisasi menjadi produk cerdas. Dengan menyusun ulang pemikiran tim produk tentang pembuatan perangkat lunak, buku ini menunjukkan kepada pembaca cara memadukan teknologi pembelajaran mesin dengan jenis keputusan strategis yang dibuat dalam penemuan produk. Pendekatan konseptual dalam buku ini membantu mengungkap mitos pembelajaran mesin dengan cara menutup kesenjangan antara praktisi teknis dan pemikir tingkat tinggi.', 0, 'computer_book1.jpg', 'tes.txt'),
(21, 'The Music Therapy Profession: Inspiring Health, Wellness, and Joy', 8, 2, 'Profesi Terapi Musik: Kesehatan, Kesejahteraan & Kegembiraan yang Menginspirasi Buku ini berupaya memberi informasi kepada masyarakat umum dan juga musisi dan pelajar musik di level apa pun yang mereka mainkan, tentang, siapa, apa, di mana, dan bagaimana terapi musik ditulis dalam bahasa yang familiar. Ini terdiri dari tujuh bab termasuk 26 esai audisi yang ditulis oleh mantan siswa dengan tujuan mengapa mengejar gelar terapi musik menegaskan motivasi individu untuk berbuat baik di dunia melalui musik. Ungkapan terakhir ini menyentuh inti buku ini. Ini bukan buku yang bertipe tekstual, melainkan bacaan yang bagus untuk membantu menyebarkan informasi tentang profesi Terapi Musik yang menginspirasi dan bermanfaat.', 0, 'hobby_book2.jpg', 'tes.txt'),
(22, 'test', 3, 5, 'test', 0, 'book1.jpg', 'tes.txt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Ilmu Komputer dan Teknologi'),
(2, 'Kesehatan dan Kebugaran'),
(3, 'Hobi dan Keterampilan'),
(5, 'Fantasy'),
(8, 'Action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penulis`
--

CREATE TABLE `data_penulis` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_penulis`
--

INSERT INTO `data_penulis` (`id`, `nama`, `email`, `password`) VALUES
(1, 'naf', 'aku@gmail.com', '$2y$10$INnhTM.obVVcwOXtmMgVDe5UTPbP2YFadqkkyHv3Qm3oy/EXpyMuK'),
(3, 'Michel Poulin', 'Michel@gmail.com', '$2y$10$UbVLvf3v83YAQkh6lL./I.28XXekRw9DzGQ88hloO.MVAiT9jsnGq'),
(4, 'Tim Chester ', 'Tim@gmail.com', '$2y$10$oGucGAIKxTAd4Gnu6eMQoeAqkKG6XWfj6A95tFFcYhrxpx8bDuuZ.'),
(5, 'Willdan Aprizal Arifin', 'Wildan@gmail.com', '$2y$10$wbgaFVxgrq0myiVD35teieFn93W48a8rO/IKRhSxLeIsS2.DbfJK6'),
(6, 'Amber Guinness', 'ambersss@gmail.com', '$2y$10$XqMMyb7ABUVZm4JVQrjABurqmLSadVZp7URsQ5gL4KUbtrQxWC6vu'),
(7, 'Sean McClure', 'seanthewriter@gmail.com', '$2y$10$WuPHC90VfK2RCbwnKH7i8upcEB0pBXqMsTj.7qeshP2eZF4YnIZ3i'),
(8, 'Christine Korb', 'cristin@gmail.com', '$2y$10$vM9NHnKNfVvo5zv3f2E0LuL.omrhlcVetkkQi0rzY3Skod/mi6bfq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `total_buku` int(11) NOT NULL,
  `tot_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `password`, `gambar`, `total_buku`, `tot_pinjam`) VALUES
(1, 'naf', 'aku@gmail.com', '$2y$10$oH7e5EP5KwTqtxKDt6jnbe7qaV66QywGjXkcVdxde8nyFRI4gYdkW', 'images.jpg', 9, 1),
(2, 'Latihan 1', 'nnnnn@rtwert', '$2y$10$cq8CCLW7Jv86yOjKvX7sHu82BMTez070bcjNRa6pYxaNvNN2M1ES6', 'kemampuan-300x300.jpg', 9, 3),
(3, 'Latihan 1 RR', 'RR@gmail.com', '$2y$10$uQnrb.eGtCa2ExWEnwFcxeR/I9W3/mKJFgqQXetkN2TVN0RCdylza', 'default.jpg', 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `rata-rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tahun`, `bulan`, `total_penjualan`, `rata-rata`) VALUES
(1, '2023', 'Desember', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regist`
--

CREATE TABLE `regist` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `regist`
--

INSERT INTO `regist` (`id`, `nama`, `email`, `password`, `image`) VALUES
(1, 'naf', 'aku2@gmail.com', '$2y$10$mRcqpltO1VE7nkPcB1E8j.CLPABFy5tFjCdOlD.BWBQ4bzMvGf9IW', 'profile_picture.jpg'),
(3, 'Latihan 1', 'n@gmail.com', '$2y$10$0uTO5EOxjTdo8a7jeL.2NulT2AX46SXtDDxk0Um.3ufLpCLXu.6t2', ''),
(5, 'Latihan 1 RR', 'aku7@gmail.com', '$2y$10$wMYbql.4f8Zo7BFbS5UbW.OPKT9lKg2dpPRKl18SsnlWO98eb4puW', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(1, 2, 12, 'Keren', 5),
(2, 2, 19, 'Keren', 5),
(3, 1, 19, 'Buku yang menarik', 5),
(4, 2, 13, 'cukup', 4),
(5, 3, 19, 'meh', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id`, `id_user`, `id_buku`) VALUES
(1, 2, 12),
(2, 2, 19),
(4, 2, 13),
(5, 1, 19),
(6, 3, 19);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `data_penulis`
--
ALTER TABLE `data_penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `review_ibfk_1` (`id_buku`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `ulasan_ibfk_1` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `idBuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_penulis`
--
ALTER TABLE `data_penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `data_penulis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`idBuku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
