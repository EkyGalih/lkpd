-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Sep 2022 pada 13.09
-- Versi server: 5.7.33
-- Versi PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lkpd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non revisi',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `apbd`
--

CREATE TABLE `apbd` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rekening` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_anggaran_sebelum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_anggaran_setelah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selisih_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apbd`
--

INSERT INTO `apbd` (`id`, `kode_rekening`, `nama_rekening`, `uraian`, `sub_uraian`, `jml_anggaran_sebelum`, `jml_anggaran_setelah`, `selisih_anggaran`, `persen`, `user_id`, `tahun_anggaran`, `created_at`, `updated_at`) VALUES
('01c75370-a880-474f-9f6a-735b589cc994', '4.2.01', 'PENDAPATAN DAERAH', 'PENDAPATAN TRANSFER', 'Pendapatan Transfer Pemerintah Pusat', '3463147644000', '3425156711263', '37990932737', '1', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('02a90b8b-8421-4745-b385-6cc31fd8d0d2', '5.4.01', 'BELANJA', 'BELANJA TRANSFER', 'Belanja Bagi Hasil', '696041354704', '757145246300', '61103891596', '9', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('0474d436-6d51-45c3-a671-40b4a9884441', '4.1.01', 'PENDAPATAN DAERAH', 'PENDAPATAN ASLI DAERAH (PAD)', 'Pajak Daerah', '1487726538148', '1601353821000', '113627282852', '8', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-07-01 02:44:56', '2022-07-01 02:44:56'),
('06ea899e-ddd7-4b65-9762-5c4a137c71c9', '5', 'BELANJA', NULL, NULL, '', '', '', NULL, 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('07d0da98-a9e6-4b10-b26d-c26a89c7feb7', '4.1', 'PENDAPATAN DAERAH', 'PENDAPATAN ASLI DAERAH PAD', NULL, '1954341221233', '2258283418223', '303942196990', '16', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('08a9363e-8f78-455a-9102-c07c70d347c4', '5.2.05', 'BELANJA', 'BELANJA MODAL', 'Belanja Modal Aset Tetap Lainnya', '21759599494', '21415605882', '343993612', '2', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('0c7301da-1138-46be-85e2-c2f989ffc1e5', '4', 'PENDAPATAN DAERAH', NULL, NULL, '', '', '', NULL, 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('1ca0f603-935e-4867-be09-e363cdcb0f87', '4.1.03', 'PENDAPATAN DAERAH', 'PENDAPATAN ASLI DAERAH PAD', 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', '64104210166', '46263633123', '17840577043', '28', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('3655b5f5-f099-4ce1-a05e-f3a801ae8d7f', '5.1.05', 'BELANJA', 'BELANJA OPERASI', 'Belanja Hibah', '1396221410359', '1292085893254', '104135517105', '7', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('44243ec2-a470-47ea-95a5-f69ea2e6d319', '5.2.02', 'BELANJA', 'BELANJA MODAL', 'Belanja Modal Peralatan dan Mesin', '248501023243', '297885154129', '49384130886', '2', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('461b9d0a-7044-4efd-a911-40cf9efe1efc', '5.2.03', 'BELANJA', 'BELANJA MODAL', 'Belanja Modal Gedung dan Bangunan', '178594663157', '328734665445', '150140002288', '84', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('4788382e-bf33-40a0-a854-b283736200c7', '5.2.04', 'BELANJA', 'BELANJA MODAL', 'Belanja Modal Jalan, Jaringan, dan Irigasi', '324096128688', '598292035320', '274195906632', '85', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('4951b577-6d56-43ce-8270-8611d18c46e3', '6.1.04', 'PEMBIAYAAN', 'PENERIMAAN PEMBIAYAAN', 'Penerimaan Pinjaman Daerah', '0', '525540000000', '525540000000', '100', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('4c595f06-042a-4b30-a239-05a46a0cf180', '5.1.02', 'BELANJA', 'BELANJA OPERASI', 'Belanja Barang dan Jasa', '1118701905618', '1467449698641', '348747793023', '31', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('4dd39732-9220-459f-9d6e-801569dc1092', '4.3.01', 'PENDAPATAN DAERAH', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', 'Pendapatan Hibah', '54780903944', '54780903944', '0', '0', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('718ffc1b-92c9-441b-a0ec-6bd507b36ed2', '6', 'PEMBIAYAAN', NULL, NULL, '', '', '', NULL, 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('847e9335-efb9-4f72-afc0-6481adf792c1', '5.1', 'BELANJA', 'BELANJA OPERASI', NULL, '4048470998641', '4315298315161', '266827316520', '7', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('8bb4531b-2784-4acd-886f-4c5b1dbec20b', '5.1.03', 'BELANJA', 'BELANJA OPERASI', 'Belanja Bunga', '0', '5055850083', '5055850083', '1', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('8bebb365-e15f-4878-a9b6-51b7efc4eee6', '4.3', 'PENDAPATAN DAERAH', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', NULL, '54780903944', '54780903944', '0', '0', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('8cbbe370-c722-4ed8-ab38-609bf9beb658', '5.3.01', 'BELANJA', 'BELANJA TIDAK TERDUGA', 'Belanja Tidak Terduga', '10000000000', '58606843539', '48606843539', '486', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('909a5959-3618-4cd6-82b0-50edce04a840', '4.1.02', 'PENDAPATAN DAERAH', 'PENDAPATAN ASLI DAERAH PAD', 'Retribusi Daerah', '47219957500', '47219957500', '0', '0', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('9f405164-48c0-4e0c-8e6d-1ee7413f27eb', '6.1.01', 'PEMBIAYAAN', 'PENERIMAAN PEMBIAYAAN', 'Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', '65000000000', '119812833596', '54812833596', '84', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('a510b697-af61-446b-ab32-eef6ca031eed', '6.3', 'PEMBIAYAAN', 'PENGELUARAN PEMBIAYAAN', 'Sisa Lebih Pembiayaan Anggaran Daerah Tahun Berkenaan', '0', '0', '0', '100', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('ad3411e3-8618-4ab8-8e47-a3321bca4afd', '5.1.06', 'BELANJA', 'BELANJA OPERASI', 'Belanja Bantuan Sosial', '8921876600', '8649276600', '272600000', '3', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('bb907b07-51e0-4072-801d-b689ee25720a', '4.1.04', 'PENDAPATAN DAERAH', 'PENDAPATAN ASLI DAERAH PAD', 'Lain-lain PAD yang Sah', '355290515419', '563446006600', '208155491181', '59', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('bb962489-8939-411c-a50f-6aaae17dbe99', '6.2', 'PEMBIAYAAN', 'PENGELUARAN PEMBIAYAAN', NULL, '10000000000', '5000000000', '5000000000', '50', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('bda2f65b-7bb1-4c72-9f80-b75c3d538ae2', '5.1.04', 'BELANJA', 'BELANJA OPERASI', 'Belanja Subsidi', '1631860720', '396275790', '1235584930', '76', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('c27b3301-2ea9-47e6-a963-72343139b631', '4.2.02', 'PENDAPATAN DAERAH', 'PENDAPATAN TRANSFER', 'Pendapatan Transfer Antar Daerah', '1662086250', '1742930885', '80844635', '5', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('c2ef54a8-4937-487c-a032-06ce608f860e', '5.4', 'BELANJA', 'BELANJA TRANSFER', NULL, '696399442204', '758584178435', '62184736231', '9', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('d6139e98-3e14-4d02-b8ad-e361e353c7b7', '5.3', 'BELANJA', 'BELANJA TIDAK TERDUGA', NULL, '10000000000', '58606843539', '48606843539', '486', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('d9f94c14-f209-48cd-9002-da7e772b1cf3', '5.1.01', 'BELANJA', 'BELANJA OPERASI', 'Belanja Pegawai', '1522993945344', '1541661320793', '18667375449', '1', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('dc4a2617-7b86-42fa-9ce6-bf7028725fb0', '6.2.02', 'PEMBIAYAAN', 'PENGELUARAN PEMBIAYAAN', 'Penyertaan Modal Daerah', '10000000000', '5000000000', '5000000000', '50', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('dd6be629-ae6d-4dc8-8984-1e0107e6512e', '4.2', 'PENDAPATAN DAERAH', 'PENDAPATAN TRANSFER', NULL, '3464809730250', '3426899642148', '37910088102', '1', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('f4cfa729-f0bb-4361-a079-6413da886bff', '6.1', 'PEMBIAYAAN', 'PENERIMAAN PEMBIAYAAN', NULL, '65000000000', '645352833596', '580352833596', '893', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('f553a64d-1ed5-4209-8dfd-6adfbbe30d27', '5.2.01', 'BELANJA', 'BELANJA MODAL', 'Belanja Modal Tanah', '1050000000', '1500000000', '450000000', '43', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('f60ca548-7eb5-4472-8ac1-566b70a08f42', '5.4.02', 'BELANJA', 'BELANJA TRANSFER', 'Belanja Bantuan Keuangan', '358087500', '1438932135', '1080844635', '302', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48'),
('ff8f27b4-9a89-48fc-834d-cf11bee43977', '5.2', 'BELANJA', 'BELANJA MODAL', NULL, '774061414582', '1247827460776', '473766046194', '61', 'c760170f-f055-11ec-aceb-244bfebc253d', '2022', '2022-06-21 06:24:48', '2022-06-21 06:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arus_kas`
--

CREATE TABLE `arus_kas` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_unik` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_arus_kas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kredit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekuitas`
--

CREATE TABLE `ekuitas` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_uraian` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kredit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_realisasi`
--

CREATE TABLE `iku_realisasi` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasaran_strategis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator_kinerja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_tercapai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_rekening`
--

CREATE TABLE `kode_rekening` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rekening` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rekening` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kode_rekening`
--

INSERT INTO `kode_rekening` (`id`, `nama_rekening`, `kode_rekening`, `ref`, `created_at`, `updated_at`) VALUES
('104c186e-a1f5-4ad6-aa42-ecc5c53fade7', 'Pendapatan Transfer Pemerintah Pusat', '4.2.01', '5.1.1.2.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('12f2184a-64ae-486b-87f0-1e01bdade29a', 'BELANJA', '5', '5.1.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('15ba1daa-6fe4-4a0a-b26e-9c2d8386ee9a', 'BELANJA MODAL', '5.2', '5.1.2.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('1a9cda46-90e7-4de8-bb36-1b8382298b71', 'Penerimaan Pinjaman Daerah', '6.1.04', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('1ca7546f-4916-4263-b789-0cd13dcab131', 'Sisa Lebih Pembiayaan Anggaran Daerah Tahun Berkenaan', '6.3', '5.1.4.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('2395266e-33f3-49d7-9aa5-24229c3e47dc', 'Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', '6.1.01', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('2ddf17b1-ca72-4cc7-b031-0a32098c19f5', 'Pendapatan Hibah', '4.3.01', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('30149811-05ef-456f-a1ca-dfa9dc8a3c70', 'Belanja Bunga', '5.1.03', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('33194299-09bf-478b-9aad-cce6b83dddd9', 'Belanja Modal Jalan, Jaringan, dan Irigasi', '5.2.04', '5.1.2.2.4', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('36c0cae6-ab2d-41f3-9e15-b4d2316c63fc', 'Belanja Modal Peralatan dan Mesin', '5.2.02', '5.1.2.2.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('376ef149-da17-41d6-8fd1-9308d1c9f302', 'PENERIMAAN PEMBIAYAAN', '6.1', '5.1.4.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('41d7f2c2-06a0-423f-af0a-37c4159637b2', 'Pajak Daerah', '4.1.01', '5.1.1.1.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('473a03c0-bd2d-491a-99a3-f0b13da22f6c', 'Belanja Bagi Hasil', '5.4.01', '5.1.3.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('6c513169-3439-472e-86f2-4cc6097f3729', 'PENGELUARAN PEMBIAYAAN', '6.2', '5.1.4.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('7a059d37-b922-4404-b04f-dc0099383341', 'PENDAPATAN DAERAH', '4', '5.1.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('80f55efc-4f96-410d-a2ae-ee1047f9aa3c', 'Belanja Modal Aset Tetap Lainnya', '5.2.05', '5.1.2.2.5', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('92d3d27a-c547-42b8-9b1c-ad1393ebf964', 'BELANJA TRANSFER', '5.4', '5.1.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('9e77a247-80e3-4258-b47c-44ef7c2684cf', 'Belanja Hibah', '5.1.05', '5.1.2.1.4', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('a3e19c03-8855-4fae-98bb-2959664fae63', 'Belanja Tidak Terduga', '5.3.01', '5.1.2.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('a445836c-9848-4223-80e9-190b15ddab48', 'Belanja Barang dan Jasa', '5.1.02', '5.1.2.1.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('a9a250f2-a6c8-4443-85b8-771982595f90', 'PEMBIAYAAN', '6', '5.1.4', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('ac5c07a4-d510-4a9c-bb62-2e80b1e1b730', 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH', '4.3', '5.1.1.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('ad230c56-94b7-43c5-a1ae-c984a0eda770', 'BELANJA TIDAK TERDUGA', '5.3', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('c15657c4-9318-4fe5-a9f5-5792a94a8614', 'BELANJA OPERASI', '5.1', '5.1.2.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('c64aaf6b-1084-49db-9f5f-1feb02017b08', 'PENDAPATAN TRANSFER', '4.2', '5.1.1.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('d813ccb5-70e1-4fe9-9fea-ec7635ad0774', 'Retribusi Daerah', '4.1.02', '5.1.1.1.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('d90e4d1d-6f81-4f0a-952f-a9a8bb7095d8', 'Belanja Bantuan Sosial', '5.1.06', '5.1.2.1.5', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('db186957-15ea-41b5-b715-89447f7c3782', 'Pendapatan Transfer Antar Daerah', '4.2.02', '5.1.1.2.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('dbf1c5a2-90dd-4d05-8630-d81e63fb80f1', 'Belanja Modal Gedung dan Bangunan', '5.2.03', '5.1.2.2.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('e9f7b96c-7fde-4f7b-9199-77f69ab348b9', 'Belanja Subsidi', '5.1.04', '5.1.2.1.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('edc23423-7172-43f1-97ba-022e01076458', 'Belanja Modal Tanah', '5.2.01', '5.1.2.2.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('ee4ada13-fb95-49a9-90a1-23bcf6b5e2ed', 'Belanja Bantuan Keuangan', '5.4.02', '5.1.3.2', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('f0464081-11b8-45c0-9ea3-edd42c53993f', 'Penyertaan Modal Daerah', '6.2.02', '-', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('f5632b3c-867d-4bdc-b57b-5ccdd1b862d8', 'PENDAPATAN ASLI DAERAH (PAD)', '4.1', '5.1.1.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('f773ce97-80b1-4f25-a1ba-c5e4cdfb0896', 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', '4.1.03', '5.1.1.1.3', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('fc3e70cc-d8a9-4686-8571-8ef9b0427000', 'Lain-lain PAD yang Sah', '4.1.04', '5.1.1.1.4', '2022-06-19 23:44:18', '2022-06-19 23:44:18'),
('fd658b86-dbd5-4014-82d1-bfdf99dcc8a8', 'Belanja Pegawai', '5.1.01', '5.1.2.1.1', '2022-06-19 23:44:18', '2022-06-19 23:44:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_25_163814_create_laporan_realisasi_anggaran', 1),
(6, '2022_04_25_164136_create_perubahan_saldo_anggaran_lebih', 1),
(7, '2022_04_25_164359_create_neraca', 1),
(8, '2022_04_25_164920_create_operasional', 1),
(9, '2022_04_25_164931_create_arus_kas', 1),
(10, '2022_04_25_164947_create_ekuitas', 1),
(11, '2022_04_26_013320_add_foreign_to_laporan_realisasi_anggaran', 1),
(12, '2022_04_26_013422_add_foreign_to_perubahan_saldo_anggaran_lebih', 1),
(13, '2022_04_26_013429_add_foreign_to_neraca', 1),
(14, '2022_04_26_013438_add_foreign_to_operasional', 1),
(15, '2022_04_26_013445_add_foreign_to_arus_kas', 1),
(16, '2022_04_26_013453_add_foreign_to_ekuitas', 1),
(17, '2022_04_26_033255_create_schedule', 1),
(18, '2022_04_26_033554_add_foreign_to_schedule', 1),
(19, '2022_04_28_094229_create_kode_rekening', 1),
(20, '2022_05_16_180956_create_total_saldo', 1),
(21, '2022_05_16_183208_add_foreign_ekuitas_to_total_saldo', 1),
(22, '2022_06_08_155739_create_anggaran', 1),
(30, '2022_06_20_081059_create_apbd', 2),
(32, '2022_07_01_110905_create_iku_realisasi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca`
--

CREATE TABLE `neraca` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_uraian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_uraian` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kenaikan_penurunan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persen` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_use` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perubahan_saldo_anggaran_lebih`
--

CREATE TABLE `perubahan_saldo_anggaran_lebih` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_uraian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi_anggaran`
--

CREATE TABLE `realisasi_anggaran` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_uraian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realisasi_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persen` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` enum('audited','unaudited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unaudited',
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_acara` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_acara` date NOT NULL,
  `jam_acara` time NOT NULL,
  `lokasi_acara` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redaksi_acara` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `acara_dari` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_saldo`
--

CREATE TABLE `total_saldo` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_keuangan` enum('arus_kas','realisasi_anggaran','neraca','ekuitas','perubahan_saldo','operasional') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_unik` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_anggaran` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minggu` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pegawai` enum('admin','pimpinan','pegawai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pegawai',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `foto`, `password`, `jenis_pegawai`, `remember_token`, `created_at`, `updated_at`) VALUES
('c760170f-f055-11ec-aceb-244bfebc253d', 'Admin Bpkad', 'admin', 'prog.bpkad.ntb@gmail.com', NULL, '$2y$10$ZxIGFBzzB9jRmSm6DvisVu1lrqw2CIiLZ/cUeBl0kVoSJdYRlQifK', 'admin', '9AksFP05CEyJnmxUnKmNnuvDDv0EpceEDxwkjdl5CktdsvsnIDBRk1VkwT0u', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apbd`
--
ALTER TABLE `apbd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `apbd_kode_rekening_unique` (`kode_rekening`);

--
-- Indeks untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  ADD KEY `arus_kas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `ekuitas`
--
ALTER TABLE `ekuitas`
  ADD KEY `ekuitas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `iku_realisasi`
--
ALTER TABLE `iku_realisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kode_rekening`
--
ALTER TABLE `kode_rekening`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_rekening_kode_rekening_unique` (`kode_rekening`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `neraca`
--
ALTER TABLE `neraca`
  ADD KEY `neraca_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD KEY `operasional_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perubahan_saldo_anggaran_lebih`
--
ALTER TABLE `perubahan_saldo_anggaran_lebih`
  ADD KEY `perubahan_saldo_anggaran_lebih_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `realisasi_anggaran`
--
ALTER TABLE `realisasi_anggaran`
  ADD KEY `realisasi_anggaran_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `total_saldo`
--
ALTER TABLE `total_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  ADD CONSTRAINT `arus_kas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ekuitas`
--
ALTER TABLE `ekuitas`
  ADD CONSTRAINT `ekuitas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `neraca`
--
ALTER TABLE `neraca`
  ADD CONSTRAINT `neraca_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD CONSTRAINT `operasional_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perubahan_saldo_anggaran_lebih`
--
ALTER TABLE `perubahan_saldo_anggaran_lebih`
  ADD CONSTRAINT `perubahan_saldo_anggaran_lebih_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `realisasi_anggaran`
--
ALTER TABLE `realisasi_anggaran`
  ADD CONSTRAINT `realisasi_anggaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
