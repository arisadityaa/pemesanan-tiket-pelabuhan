-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 14.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelabuhan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bokings`
--

CREATE TABLE `bokings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` enum('Accept','Reject','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bokings`
--

INSERT INTO `bokings` (`id`, `ticket_id`, `member_id`, `total_price`, `count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 30000, 2, 'Accept', '2023-10-23 20:42:11', '2023-10-23 20:46:18', NULL),
(2, 6, 1, 100000, 2, 'Accept', '2023-10-23 21:16:32', '2023-10-23 21:17:23', NULL),
(3, 3, 1, 5000, 1, 'Accept', '2023-10-27 10:48:03', '2023-10-27 10:48:34', NULL),
(4, 2, 2, 30000, 2, 'Accept', '2023-10-30 08:07:19', '2023-10-30 08:07:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employes`
--

INSERT INTO `employes` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(2, 3, '2023-10-30 07:24:58', '2023-10-30 07:24:58', NULL),
(3, 4, '2023-10-30 07:25:47', '2023-10-30 07:25:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pelabuhan Banyuwangi', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(2, 'Pelabuhan Ketapang', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(3, 'Pelabuhan Gilimanuk', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(4, 'Pelabuhan Benoa', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(5, 'Pelabuhan Sanur', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(6, 'Pelabuhan Madura', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(7, 'Pelabuhan Banyuwangi', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(2, 5, '2023-10-30 08:06:57', '2023-10-30 08:06:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_08_28_140756_create_locations_table', 1),
(6, '2023_08_31_134219_create_employes_table', 1),
(7, '2023_08_31_134241_create_members_table', 1),
(8, '2023_08_31_140937_create_tickets_table', 1),
(9, '2023_08_31_152300_create_bokings_table', 1),
(10, '2023_09_28_141027_create_sails_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `sails`
--

CREATE TABLE `sails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `boking_id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sails`
--

INSERT INTO `sails` (`id`, `boking_id`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-10-23 20:46:18', '2023-10-23 20:46:18', NULL),
(2, 3, 1, '2023-10-27 10:48:34', '2023-10-27 10:48:34', NULL),
(3, 4, 1, '2023-10-30 08:07:41', '2023-10-30 08:07:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `sail_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `location_id`, `name`, `stock`, `price`, `description`, `sail_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ticket Pelabuhan Banyuwangi - Pelabuhan Sanur', 10, 20000, 'Occaecat Lorem nulla ut pariatur commodo magna id sit sit tempor ad deserunt et occaecat.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-23 21:18:54', NULL),
(2, 1, 'Ticket Pelabuhan Banyuwangi - Pelabuhan Ketapang', 7, 15000, 'Amet eu est irure consequat aute sit voluptate nisi veniam laboris sunt excepteur.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-30 08:07:19', NULL),
(3, 2, 'Ticket Pelabuhan Ketapang - Pelabuhan Ketapang', 9, 5000, 'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-27 10:48:03', NULL),
(4, 2, 'Ticket Pelabuhan Ketapang - Pelabuhan Banyuwangi', 10, 50000, 'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(5, 3, 'Ticket Pelabuhan Gilimanuk - Pelabuhan Ketapang', 10, 5000, 'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-23 21:18:46', NULL),
(6, 3, 'Ticket Pelabuhan Gilimanuk - Pelabuhan Banyuwangi', 10, 50000, 'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.', '2023-10-16 20:31:00', '2023-10-22 14:07:51', '2023-10-23 21:17:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','employe') NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Made', 'm@gmail.com', NULL, '$2y$10$Cj0nX9LlXEO7DFcmbap7Guhj9PpgGXaDZuIF5DARNpLqPLEOf/qK6', 'employe', NULL, '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(2, 'Aris', 'a@gmail.com', NULL, '$2y$10$mb32ULEAod1Ok/HO8XVqxuPDMOPEq4CoottlSuQdrpUdCzgZrcWSy', 'member', NULL, '2023-10-22 14:07:51', '2023-10-22 14:07:51', NULL),
(3, 'Wayan', 'w@g', NULL, '$2y$10$2IDBW6c16jPRwcnAT2uIfudVig4AT1W5uT4EZ58teADrLK7VYUzW6', 'employe', NULL, '2023-10-30 07:24:58', '2023-10-30 07:24:58', NULL),
(4, 'Cece', 'c@gmail.com', NULL, '$2y$10$4NduWZiYrRRi1WpfdCDHuOefDmxcvEwZBUDDoWcpWKiXDZFEPJMkW', 'employe', NULL, '2023-10-30 07:25:47', '2023-10-30 07:25:47', NULL),
(5, 'Maya', 'may@gmail.com', NULL, '$2y$10$BuHLM9Im9FVSzoeedc8VA.kAb5vNUWw92jmiMdTps9Hjis.iHgZUG', 'member', NULL, '2023-10-30 08:06:57', '2023-10-30 08:06:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bokings`
--
ALTER TABLE `bokings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bokings_ticket_id_foreign` (`ticket_id`),
  ADD KEY `bokings_member_id_foreign` (`member_id`);

--
-- Indeks untuk tabel `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `sails`
--
ALTER TABLE `sails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sails_boking_id_foreign` (`boking_id`),
  ADD KEY `sails_employe_id_foreign` (`employe_id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_location_id_foreign` (`location_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bokings`
--
ALTER TABLE `bokings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sails`
--
ALTER TABLE `sails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bokings`
--
ALTER TABLE `bokings`
  ADD CONSTRAINT `bokings_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `bokings_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Ketidakleluasaan untuk tabel `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sails`
--
ALTER TABLE `sails`
  ADD CONSTRAINT `sails_boking_id_foreign` FOREIGN KEY (`boking_id`) REFERENCES `bokings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sails_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`);

--
-- Ketidakleluasaan untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
