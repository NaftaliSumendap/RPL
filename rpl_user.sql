-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 09.12
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
  `penulis` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `tot_buku` int(11) NOT NULL,
  `tot_pinjam` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idBuku`, `namaBuku`, `penulis`, `id_category`, `sinopsis`, `tot_buku`, `tot_pinjam`, `gambar`) VALUES
(10, 'A Meal With Jesus', 'Tim Chester', 2, 'Tim Chester, melalui buku ini, dengan kreativitas mumpuni menjelaskan bagaimana kegiatan sepele ini menjadi sebuah peluang berharga untuk berbagi anugerah, membangun komunitas, bahkan menjalankan misi Allah bagi dunia ini.', 0, 0, 'A Meal With Jesus.jpeg'),
(11, 'God Is Bigger', 'NA', 2, 'Berisi pengalaman pribadi penulis ketika melewati titik-titik terendah dalam hidupnya sebagai penderita bipolar disorder, tetapi kemudian dikuatkan oleh Tuhan untuk terus tegar dan kuat.', 0, 0, 'God Is Bigger.jpeg'),
(12, 'Christian Worldview', 'NA', 2, 'Segala sesuatu yang kita pikirkan, katakan, dan lakukan mencerminkan worldview kita. Disadari atau tidak, keyakinan dasar kita tentang Allah, manusia, sejarah, dan masa depan turut menentukan bagaimana kita hidup.', 0, 0, 'Christian Worldview.jpeg'),
(13, 'Informatika', 'Willdan Aprizal Arifin', 1, 'TEST', 0, 0, 'computer_book3.jpg'),
(14, 'A House Party in Tuscany', 'Amber Guinness', 3, 'Di Arniano, putri mereka, Amber Guinness, menemukan minat memasak dan mendirikan The Arniano Painting School bersama salah satu pendiri William Roper Curzon. Perpaduan antara makanan dan seni, sekolah ini merayakan keterampilan memasak dan menjadi tuan rumah Amber serta bakat William dalam menyebarkan pengetahuan dan hasratnya terhadap melukis.', 0, 0, 'hobby_book1.jpg');

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
(5, 'Fantasy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `total_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `password`, `total_buku`) VALUES
(1, 'naf', 'aku@gmail.com', '$2y$10$oH7e5EP5KwTqtxKDt6jnbe7qaV66QywGjXkcVdxde8nyFRI4gYdkW', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `tahun` year(4) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `rata-rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`tahun`, `bulan`, `total_penjualan`, `rata-rata`) VALUES
('2023', 'Desember', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis_user`
--

CREATE TABLE `penulis_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penulis_user`
--

INSERT INTO `penulis_user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'naf', 'aku@gmail.com', '$2y$10$INnhTM.obVVcwOXtmMgVDe5UTPbP2YFadqkkyHv3Qm3oy/EXpyMuK');

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
(1, 'naf', 'aku@gmail.com', '$2y$10$mRcqpltO1VE7nkPcB1E8j.CLPABFy5tFjCdOlD.BWBQ4bzMvGf9IW', 'images.jpg'),
(3, 'Latihan 1', 'n@gmail.com', '$2y$10$0uTO5EOxjTdo8a7jeL.2NulT2AX46SXtDDxk0Um.3ufLpCLXu.6t2', ''),
(5, 'Latihan 1 RR', 'aku7@gmail.com', '$2y$10$wMYbql.4f8Zo7BFbS5UbW.OPKT9lKg2dpPRKl18SsnlWO98eb4puW', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penulis_user`
--
ALTER TABLE `penulis_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `idBuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penulis_user`
--
ALTER TABLE `penulis_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
