-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sijamufip`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasis`
--

CREATE TABLE `evaluasis` (
  `id_evaluasi` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `tanggal_terakhir_dilakukan` date NOT NULL,
  `tanggal_diperbarui` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_eval`
--

CREATE TABLE `file_eval` (
  `id_feval` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_nfeval` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_p1`
--

CREATE TABLE `file_p1` (
  `id_fp1` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_p1`
--

INSERT INTO `file_p1` (`id_fp1`, `files`, `created_at`, `updated_at`) VALUES
(1, '///01 kebijakan', '2024-09-25 06:45:44', '2024-09-25 06:45:44'),
(2, '///standar pendidikan UTM', '2024-09-28 05:30:46', '2024-09-28 05:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `file_p2_renpro`
--

CREATE TABLE `file_p2_renpro` (
  `id_fp2_renpro` bigint(20) UNSIGNED NOT NULL,
  `id_plks` bigint(20) UNSIGNED NOT NULL,
  `id_nfp2_renpro` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `tahun1` varchar(255) NOT NULL,
  `tahun2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_p2_renpro`
--

INSERT INTO `file_p2_renpro` (`id_fp2_renpro`, `id_plks`, `id_nfp2_renpro`, `files`, `tahun1`, `tahun2`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '/000_renstra-pif\\', '2020-2022', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_p2_rps`
--

CREATE TABLE `file_p2_rps` (
  `id_fp2_rps` bigint(20) UNSIGNED NOT NULL,
  `id_plks` bigint(20) UNSIGNED NOT NULL,
  `id_nfp2_rps` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `tahun1` varchar(255) NOT NULL,
  `tahun2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_p4`
--

CREATE TABLE `file_p4` (
  `id_fp4` bigint(20) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_nfp4` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_p5`
--

CREATE TABLE `file_p5` (
  `id_fp5` bigint(20) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_nfp5` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jamutims`
--

CREATE TABLE `jamutims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `PJ` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jamutims`
--

INSERT INTO `jamutims` (`id`, `nip`, `nama`, `email`, `PJ`, `created_at`, `updated_at`) VALUES
(1, 19880823201803001, 'Muhamad Afif Effindi', 'mafif@gmail.com', 'Ketua Jaminan Mutu', '2024-07-25 07:15:15', '2024-07-25 07:15:15'),
(2, 19880823201803002, 'Eriqa Pratiwi', 'eriqa@gmail.com', 'Sekretaris Jaminan Mutu', '2024-07-25 07:17:13', '2024-07-25 07:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_05_081514_create_jamutims_table', 1),
(6, '2024_07_13_053900_create_penetapans_table', 1),
(7, '2024_07_13_054002_create_pelaksanaans_table', 1),
(8, '2024_07_13_054119_create_evaluasis_table', 1),
(9, '2024_07_13_054218_create_pengendalians_table', 1),
(10, '2024_07_13_054316_create_peningkatans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nama_filep2_renpro`
--

CREATE TABLE `nama_filep2_renpro` (
  `id_nfp2_renpro` bigint(20) UNSIGNED NOT NULL,
  `id_plks` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_filep2_renpro`
--

INSERT INTO `nama_filep2_renpro` (`id_nfp2_renpro`, `id_plks`, `nama_file`, `id_prodi`, `created_at`, `update_at`) VALUES
(1, 1, 'Renstra-PIF', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nama_filep2_rps`
--

CREATE TABLE `nama_filep2_rps` (
  `id_nfp2_rps` bigint(20) UNSIGNED NOT NULL,
  `id_plks` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_file_eval`
--

CREATE TABLE `nama_file_eval` (
  `id_nfeval` bigint(20) UNSIGNED NOT NULL,
  `nama_fileeval` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_evaluasi` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_file_p1`
--

CREATE TABLE `nama_file_p1` (
  `id_nfp1` bigint(20) UNSIGNED NOT NULL,
  `id_fp1` bigint(20) UNSIGNED NOT NULL,
  `nama_filep1` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_file_p1`
--

INSERT INTO `nama_file_p1` (`id_nfp1`, `id_fp1`, `nama_filep1`, `created_at`, `update_at`) VALUES
(1, 1, 'kebijakan spmi', '2024-09-25 07:11:35', '2024-09-25 07:11:35'),
(2, 2, 'Standar Pendidikan Universitas Trunojoyo Madura', '2024-09-28 05:31:58', '2024-09-28 05:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `nama_file_p4`
--

CREATE TABLE `nama_file_p4` (
  `id_nfp4` bigint(20) NOT NULL,
  `nama_filep4` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_pengendalian` bigint(20) NOT NULL,
  `id_fp4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_file_p5`
--

CREATE TABLE `nama_file_p5` (
  `id_nfp5` bigint(20) NOT NULL,
  `nama_filep5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_peningkatan` bigint(20) NOT NULL,
  `id_fp5` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaans`
--

CREATE TABLE `pelaksanaans` (
  `id_plks` bigint(20) UNSIGNED NOT NULL,
  `level_plks` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelaksanaans`
--

INSERT INTO `pelaksanaans` (`id_plks`, `level_plks`, `created_at`, `updated_at`) VALUES
(1, 'Prodi', '2024-10-04 14:54:13', '2024-10-04 14:54:13'),
(2, 'Fakultas', '2024-10-04 14:54:13', '2024-10-04 14:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `penetapans`
--

CREATE TABLE `penetapans` (
  `id_penetapan` bigint(20) UNSIGNED NOT NULL,
  `submenu_penetapan` varchar(255) NOT NULL,
  `id_nfp1` bigint(20) UNSIGNED NOT NULL,
  `id_fp1` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penetapans`
--

INSERT INTO `penetapans` (`id_penetapan`, `submenu_penetapan`, `id_nfp1`, `id_fp1`, `created_at`, `updated_at`) VALUES
(1, 'perangkatspmi', 1, 1, '2024-09-25 07:12:29', '2024-09-25 07:12:29'),
(44, 'standarinstitusi', 2, 2, '2024-09-28 05:33:34', '2024-09-28 05:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengendalians`
--

CREATE TABLE `pengendalians` (
  `id_pengendalian` bigint(20) UNSIGNED NOT NULL,
  `bidang_standar` varchar(255) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `laporan_rtm` varchar(255) NOT NULL,
  `laporan_rtl` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peningkatans`
--

CREATE TABLE `peningkatans` (
  `id_peningkatan` int(10) UNSIGNED NOT NULL,
  `nama_dokumen_p5` varchar(255) NOT NULL,
  `dokumenp5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nfp5` bigint(20) NOT NULL,
  `id_fp5` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prodi`
--

CREATE TABLE `tabel_prodi` (
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_prodi`
--

INSERT INTO `tabel_prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Pendidikan Guru Sekolah Dasar (PGSD)'),
(2, 'Pendidikan Bahasa dan Sastra Indonesia (PBSI)'),
(3, 'Pendidikan Informatika (PIF)'),
(4, 'Pendidikan Ilmu Pengetahuan Alam (PIPA)'),
(5, 'Pendidikan Guru Pendidikan Anak Usia Dini (PGPAUD)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_eval`
--
ALTER TABLE `file_eval`
  ADD PRIMARY KEY (`id_feval`);

--
-- Indexes for table `file_p1`
--
ALTER TABLE `file_p1`
  ADD PRIMARY KEY (`id_fp1`);

--
-- Indexes for table `file_p2_renpro`
--
ALTER TABLE `file_p2_renpro`
  ADD PRIMARY KEY (`id_fp2_renpro`),
  ADD KEY `renpro_pelaksanaans_foreign` (`id_plks`),
  ADD KEY `renpro_namafilep2_foreign` (`id_nfp2_renpro`);

--
-- Indexes for table `file_p2_rps`
--
ALTER TABLE `file_p2_rps`
  ADD PRIMARY KEY (`id_fp2_rps`),
  ADD KEY `rps_pelaksanaans_foreign` (`id_plks`),
  ADD KEY `rps_namafilep2_rps_foreign` (`id_nfp2_rps`);

--
-- Indexes for table `file_p4`
--
ALTER TABLE `file_p4`
  ADD PRIMARY KEY (`id_fp4`);

--
-- Indexes for table `file_p5`
--
ALTER TABLE `file_p5`
  ADD PRIMARY KEY (`id_fp5`);

--
-- Indexes for table `jamutims`
--
ALTER TABLE `jamutims`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jamutims_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_filep2_renpro`
--
ALTER TABLE `nama_filep2_renpro`
  ADD PRIMARY KEY (`id_nfp2_renpro`),
  ADD KEY `nfilep2_renpro_tprodi_foreign` (`id_prodi`),
  ADD KEY `nfilep2_renpro_pelaksanaans_foreign` (`id_plks`);

--
-- Indexes for table `nama_filep2_rps`
--
ALTER TABLE `nama_filep2_rps`
  ADD PRIMARY KEY (`id_nfp2_rps`),
  ADD KEY `namafilep2_prodi_foreign` (`id_prodi`),
  ADD KEY `nfilep2_rps_pelaksanaans_foreign` (`id_plks`);

--
-- Indexes for table `nama_file_eval`
--
ALTER TABLE `nama_file_eval`
  ADD PRIMARY KEY (`id_nfeval`);

--
-- Indexes for table `nama_file_p1`
--
ALTER TABLE `nama_file_p1`
  ADD PRIMARY KEY (`id_nfp1`),
  ADD KEY `namafilep1_filep1_foreign` (`id_fp1`);

--
-- Indexes for table `nama_file_p4`
--
ALTER TABLE `nama_file_p4`
  ADD PRIMARY KEY (`id_nfp4`);

--
-- Indexes for table `nama_file_p5`
--
ALTER TABLE `nama_file_p5`
  ADD PRIMARY KEY (`id_nfp5`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelaksanaans`
--
ALTER TABLE `pelaksanaans`
  ADD PRIMARY KEY (`id_plks`);

--
-- Indexes for table `penetapans`
--
ALTER TABLE `penetapans`
  ADD PRIMARY KEY (`id_penetapan`),
  ADD KEY `penetapan_namafilep1_foreign` (`id_nfp1`),
  ADD KEY `penetapan_filep1_foreign` (`id_fp1`);

--
-- Indexes for table `pengendalians`
--
ALTER TABLE `pengendalians`
  ADD PRIMARY KEY (`id_pengendalian`);

--
-- Indexes for table `peningkatans`
--
ALTER TABLE `peningkatans`
  ADD PRIMARY KEY (`id_peningkatan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasis`
--
ALTER TABLE `evaluasis`
  MODIFY `id_evaluasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_eval`
--
ALTER TABLE `file_eval`
  MODIFY `id_feval` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_p1`
--
ALTER TABLE `file_p1`
  MODIFY `id_fp1` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_p2_renpro`
--
ALTER TABLE `file_p2_renpro`
  MODIFY `id_fp2_renpro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_p2_rps`
--
ALTER TABLE `file_p2_rps`
  MODIFY `id_fp2_rps` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_p4`
--
ALTER TABLE `file_p4`
  MODIFY `id_fp4` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_p5`
--
ALTER TABLE `file_p5`
  MODIFY `id_fp5` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jamutims`
--
ALTER TABLE `jamutims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nama_filep2_renpro`
--
ALTER TABLE `nama_filep2_renpro`
  MODIFY `id_nfp2_renpro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nama_filep2_rps`
--
ALTER TABLE `nama_filep2_rps`
  MODIFY `id_nfp2_rps` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nama_file_eval`
--
ALTER TABLE `nama_file_eval`
  MODIFY `id_nfeval` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama_file_p1`
--
ALTER TABLE `nama_file_p1`
  MODIFY `id_nfp1` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nama_file_p4`
--
ALTER TABLE `nama_file_p4`
  MODIFY `id_nfp4` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama_file_p5`
--
ALTER TABLE `nama_file_p5`
  MODIFY `id_nfp5` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelaksanaans`
--
ALTER TABLE `pelaksanaans`
  MODIFY `id_plks` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penetapans`
--
ALTER TABLE `penetapans`
  MODIFY `id_penetapan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pengendalians`
--
ALTER TABLE `pengendalians`
  MODIFY `id_pengendalian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peningkatans`
--
ALTER TABLE `peningkatans`
  MODIFY `id_peningkatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  MODIFY `id_prodi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_p2_renpro`
--
ALTER TABLE `file_p2_renpro`
  ADD CONSTRAINT `renpro_namafilep2_foreign` FOREIGN KEY (`id_nfp2_renpro`) REFERENCES `nama_filep2_renpro` (`id_nfp2_renpro`),
  ADD CONSTRAINT `renpro_pelaksanaans_foreign` FOREIGN KEY (`id_plks`) REFERENCES `pelaksanaans` (`id_plks`);

--
-- Constraints for table `file_p2_rps`
--
ALTER TABLE `file_p2_rps`
  ADD CONSTRAINT `rps_namafilep2_rps_foreign` FOREIGN KEY (`id_nfp2_rps`) REFERENCES `nama_filep2_rps` (`id_nfp2_rps`),
  ADD CONSTRAINT `rps_pelaksanaans_foreign` FOREIGN KEY (`id_plks`) REFERENCES `pelaksanaans` (`id_plks`);

--
-- Constraints for table `nama_filep2_renpro`
--
ALTER TABLE `nama_filep2_renpro`
  ADD CONSTRAINT `nfilep2_renpro_pelaksanaans_foreign` FOREIGN KEY (`id_plks`) REFERENCES `pelaksanaans` (`id_plks`),
  ADD CONSTRAINT `nfilep2_renpro_tprodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`);

--
-- Constraints for table `nama_filep2_rps`
--
ALTER TABLE `nama_filep2_rps`
  ADD CONSTRAINT `nfilep2_rps_pelaksanaans_foreign` FOREIGN KEY (`id_plks`) REFERENCES `pelaksanaans` (`id_plks`),
  ADD CONSTRAINT `nfilep2_rps_tprodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`);

--
-- Constraints for table `nama_file_p1`
--
ALTER TABLE `nama_file_p1`
  ADD CONSTRAINT `namafilep1_filep1_foreign` FOREIGN KEY (`id_fp1`) REFERENCES `file_p1` (`id_fp1`);

--
-- Constraints for table `penetapans`
--
ALTER TABLE `penetapans`
  ADD CONSTRAINT `penetapan_filep1_foreign` FOREIGN KEY (`id_fp1`) REFERENCES `file_p1` (`id_fp1`),
  ADD CONSTRAINT `penetapan_namafilep1_foreign` FOREIGN KEY (`id_nfp1`) REFERENCES `nama_file_p1` (`id_nfp1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
