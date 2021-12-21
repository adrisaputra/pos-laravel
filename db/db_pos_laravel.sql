-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table db_pos_laravel.barang_tbl
CREATE TABLE IF NOT EXISTS `barang_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `stok_awal` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.barang_tbl: ~10 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_tbl` DISABLE KEYS */;
INSERT INTO `barang_tbl` (`id`, `barcode`, `nama_barang`, `kategori_id`, `satuan_id`, `diskon`, `stok_awal`, `harga_beli`, `harga_jual`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '8997021407432', 'LVN', NULL, 2, 0, 200, 0, 250000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(2, '8997004301429', 'sponge choco 120g', NULL, 1, 0, 200, 0, 11000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(3, '8997004301108', 'pilows coklate 110g', NULL, 1, 0, 200, 0, 10000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(4, '8997004301245', 'pilows ubi 110g', NULL, 1, 0, 200, 0, 10000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(5, '8997004304635', 'pillows cklte 60g', NULL, 1, 0, 200, 0, 5000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(6, '8991038772194', 'medisoft coton ball 75g', NULL, 1, 0, 200, 0, 11000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(7, '8992759134117', 'nice tisu 60 shet', NULL, 1, 0, 200, 0, 4000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(8, '711844330108', 'ABC sardines cabai 155g', NULL, 3, 0, 200, 0, 9000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(9, '711844330009', 'ABC sardines tomat 155g', NULL, 3, 0, 200, 0, 9000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43'),
	(10, '8999999032647', 'pepsoden exper protec 65g', NULL, 1, 0, 200, 0, 12000, 1, '2021-12-21 03:11:43', '2021-12-21 03:11:43');
/*!40000 ALTER TABLE `barang_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.kategori_tbl
CREATE TABLE IF NOT EXISTS `kategori_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.kategori_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori_tbl` DISABLE KEYS */;
INSERT INTO `kategori_tbl` (`id`, `nama_kategori`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 'Shampo', 1, '2021-12-18 09:02:29', '2021-12-18 09:02:29');
/*!40000 ALTER TABLE `kategori_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_07_30_050258_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.pembelian_tbl
CREATE TABLE IF NOT EXISTS `pembelian_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.pembelian_tbl: ~10 rows (lebih kurang)
/*!40000 ALTER TABLE `pembelian_tbl` DISABLE KEYS */;
INSERT INTO `pembelian_tbl` (`id`, `tanggal`, `barcode`, `nama_barang`, `kategori_id`, `satuan_id`, `supplier_id`, `jumlah`, `catatan`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '2021-12-12', '8997021407432', 'LVN', NULL, 2, 2, 20, 'XXX', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(2, '2021-12-12', '8997004301429', 'sponge choco 120g', NULL, 1, 2, 20, 'XXX', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(3, '2021-12-12', '8997004301108', 'pilows coklate 110g', NULL, 1, NULL, 30, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(4, '2021-12-12', '8997004301245', 'pilows ubi 110g', NULL, 1, NULL, 20, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(5, '2021-12-12', '8997004304635', 'pillows cklte 60g', NULL, 1, NULL, 10, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(6, '2021-12-12', '8991038772194', 'medisoft coton ball 75g', NULL, 1, NULL, 40, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(7, '2021-12-12', '8992759134117', 'nice tisu 60 shet', NULL, 1, NULL, 20, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(8, '2021-12-12', '711844330108', 'ABC sardines cabai 155g', NULL, 3, NULL, 10, 'XXX', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(9, '2021-12-12', '711844330009', 'ABC sardines tomat 155g', NULL, 3, NULL, 20, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29'),
	(10, '2021-12-12', '8999999032647', 'pepsoden exper protec 65g', NULL, 1, NULL, 20, '', 1, '2021-12-21 03:12:29', '2021-12-21 03:12:29');
/*!40000 ALTER TABLE `pembelian_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.pengaturan_tbl
CREATE TABLE IF NOT EXISTS `pengaturan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(200) DEFAULT NULL,
  `singkatan_nama_aplikasi` varchar(200) DEFAULT NULL,
  `logo_kecil` varchar(100) DEFAULT NULL,
  `logo_besar` varchar(100) DEFAULT NULL,
  `background_login` varchar(100) DEFAULT NULL,
  `background_sidebar` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.pengaturan_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaturan_tbl` DISABLE KEYS */;
INSERT INTO `pengaturan_tbl` (`id`, `nama_aplikasi`, `singkatan_nama_aplikasi`, `logo_kecil`, `logo_besar`, `background_login`, `background_sidebar`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'POS', 'POS', '16400580051.png', '16397940172.png', '16304197653.jpg', '16292583814.jpg', 1, '2021-08-05 11:27:10', '2021-12-21 03:40:05');
/*!40000 ALTER TABLE `pengaturan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.profil_tbl
CREATE TABLE IF NOT EXISTS `profil_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.profil_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `profil_tbl` DISABLE KEYS */;
INSERT INTO `profil_tbl` (`id`, `nama_toko`, `alamat`, `telp`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'ALVIN', 'JL.', '0401', 'alvin@gmail.com', NULL, '2021-12-18 02:58:47');
/*!40000 ALTER TABLE `profil_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.retur_tbl
CREATE TABLE IF NOT EXISTS `retur_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.retur_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `retur_tbl` DISABLE KEYS */;
INSERT INTO `retur_tbl` (`id`, `tanggal`, `barcode`, `nama_barang`, `kategori_id`, `satuan_id`, `jumlah`, `catatan`, `user_id`, `created_at`, `updated_at`) VALUES
	(5, '2021-12-12', '8997021407432', 'LVN', NULL, 2, 2, 'rusak', 1, '2021-12-21 03:24:07', '2021-12-21 03:24:07'),
	(6, '2021-12-12', '8997004301429', 'sponge choco 120g', NULL, 1, 5, 'rusak', 1, '2021-12-21 03:24:07', '2021-12-21 03:24:07');
/*!40000 ALTER TABLE `retur_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.satuan_tbl
CREATE TABLE IF NOT EXISTS `satuan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.satuan_tbl: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `satuan_tbl` DISABLE KEYS */;
INSERT INTO `satuan_tbl` (`id`, `nama_satuan`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'PCS', 1, '2021-12-18 09:18:35', '2021-12-18 09:18:35'),
	(2, 'BOTOL', 1, '2021-12-18 09:18:41', '2021-12-18 09:18:41'),
	(3, 'KALENG', 1, '2021-12-18 09:19:23', '2021-12-18 09:19:34');
/*!40000 ALTER TABLE `satuan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.sessions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ElhHf8TEoHvIe1xVce6Ov5Jwz7PCId61LtXARlLG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWTNvaERYNWhYUmpNbmFTVHpEQzdsak9zMG9ETm9vbkNSeHNsZVFXbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL25ydkdaVy8xNzNiWDYxV0hwUmI3TzFxcTlmZmxLUWVQQVlpMjl3UEVGdEhQc2d1MllPdFciO30=', 1640058279),
	('g5km4Dcz3eeONlbcmWHVwj7lnNDkWAUx0QufGAT1', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidHNtQlBrNVpGMkcweGZqaU9XWE5zblY0Rlc5a0VEN1Izd1RUc3p2bCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9wb3MtbGFyYXZlbC9iYXJhbmciO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9wb3MtbGFyYXZlbC9iYXJhbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL25ydkdaVy8xNzNiWDYxV0hwUmI3TzFxcTlmZmxLUWVQQVlpMjl3UEVGdEhQc2d1MllPdFciO30=', 1640053924);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.supplier_tbl
CREATE TABLE IF NOT EXISTS `supplier_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_pos_laravel.supplier_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `supplier_tbl` DISABLE KEYS */;
INSERT INTO `supplier_tbl` (`id`, `nama_supplier`, `telepon`, `alamat`, `deskripsi`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 'musly', '0828282', 'hshsahsa', 'hsghgdshgds', 1, '2021-12-19 11:59:57', '2021-12-19 11:59:57');
/*!40000 ALTER TABLE `supplier_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_pos_laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_pos_laravel.users: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `no_hp`, `alamat`, `group`, `foto`, `opd_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', '', 'administrator@gmail.com', NULL, '$2y$10$/nrvGZW/173bX61WHpRb7O1qq9fflKQePAYi29wPEFtHPsgu2YOtW', NULL, NULL, NULL, NULL, NULL, 1, '1629338927.jpg', NULL, 1, '2021-08-03 17:21:11', '2021-08-19 02:08:47'),
	(23, 'operator', NULL, 'operator@gmail.com', NULL, '$2y$10$kXWDFBa6k2pPCu2kCLGyRuqzv0kANPqxkm7UC/M4pitAmSwQObLt.', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, '2021-12-21 03:43:45', '2021-12-21 03:43:45'),
	(24, 'kasir', NULL, 'kasir@gmail.com', NULL, '$2y$10$wc71idZlRYO2vCIEsohOeevtpDthnW/aADGa5eZuVkIZz.jh2IeRe', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 1, '2021-12-21 03:44:27', '2021-12-21 03:44:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
