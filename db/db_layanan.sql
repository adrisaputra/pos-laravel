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

-- membuang struktur untuk table db_layanan.failed_jobs
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

-- Membuang data untuk tabel db_layanan.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.layanan_tbl
CREATE TABLE IF NOT EXISTS `layanan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `persyaratan` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_layanan.layanan_tbl: ~16 rows (lebih kurang)
/*!40000 ALTER TABLE `layanan_tbl` DISABLE KEYS */;
INSERT INTO `layanan_tbl` (`id`, `nama_layanan`, `keterangan`, `persyaratan`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Surat Izin Usaha Mikro Kecil (IUMK)', 'Kartu yang diisyaratkan untuk mendapatkan pekerjaan serta mendata tingkat pengangguran.', '<p>1. KTP</p>\r\n\r\n<p>2. Kartu Keluarga</p>\r\n\r\n<p>3. Pas foto warna 4x6</p>\r\n\r\n<p>4. Surat Keterangan Tempat Usaha dari Kepala Desa</p>', '1630069991.png', 11, '2021-08-27 13:06:06', '2021-09-14 01:51:29'),
	(2, 'Surat Keterangan Sekretariat', 'Surat yang menyatakan domisili sekretariat, organisasi masyarakat dan partai politik.', '<p>1. Surat Pengantar dari RT setempat diketahui Kades/Lurah</p>\r\n\r\n<p>2. KTP dan KK Ketua/Penanggung jawab&nbsp;</p>\r\n\r\n<p>3. Akta&nbsp;pendirian/susunan kepengurusan yang telah di sahkan oleh pimpinan setingkat diatas di Parpol/LSM</p>\r\n\r\n<p>4. Surat Keterangan Terdaftar</p>\r\n\r\n<p>5. Bukti&nbsp;lunas PBB Tahun berjalan</p>', '1630070211.png', 11, '2021-08-27 13:16:51', '2021-09-14 01:53:21'),
	(4, 'Surat Keterangan Kematian', 'Usaha Jasa Makanan dan Minuman, Rumah Makan, Kafe dan lain lain.', '<ol>\r\n	<li><span style="font-size:16px;">KTP asli suami istri&nbsp;</span></li>\r\n	<li><span style="font-size:16px;">KK asli</span></li>\r\n	<li><span style="font-size:16px;">Surat pengantar dari desa/lurah</span></li>\r\n	<li><span style="font-size:16px;">Surat ket. Kematian dari desa/lurah</span></li>\r\n	<li><span style="font-size:16px;">Mengisi formulir F-2.29</span></li>\r\n</ol>', '1630070830.png', 1, '2021-08-27 13:27:10', '2021-08-27 16:08:06'),
	(5, 'Surat Keterangan Ahli Waris', 'Surat Nikah Sebagai Tanda Bukti Sah Perkawinan dimata Negara', '<p>1. SKAW yang ditandatangani oleh Ahli Waris di atas materai 10.000 dibenarkan oleh Kepala Desa//Lurah</p>\r\n\r\n<p>2. Akta Kematian</p>\r\n\r\n<p>3. Buku Akta Nikah</p>\r\n\r\n<p>4. Akta&nbsp;Kelahiran,</p>\r\n\r\n<p>5. Kartu Keluarga</p>\r\n\r\n<p>6. KTP Semua yg bertanda tangan di SKAW</p>\r\n\r\n<p>7. Buku Lunas PBB Tahun Berjalan<br />\r\n&nbsp;</p>', '1630070889.png', 11, '2021-08-27 13:28:09', '2021-09-14 01:55:28'),
	(6, 'Surat Keterangan Domisili', 'Akta Kelahiran adalah Bukti Sah mengenai Status dan Peristiwa Kelahiran', '<p>1. Kartu Tanda Penduduk (KTP)</p>\r\n\r\n<p>2. Kartu Keluarga (KK)</p>\r\n\r\n<p>3. Surat pengantar dari Ketua RT dan RW atau kepala desa yang sesuai dengan data pada KTP atau alamat sebelumnya.</p>\r\n\r\n<p>4. Surat permohonan yang menunjukkan keabsahan dokumen dan data (ditandatangani di atas materai Rp10.000).</p>\r\n\r\n<p>5. Surat kuasa jika pengurusan Surat Domisili diwakilkan dengan materai Rp10.000.</p>', '1630071262.png', 11, '2021-08-27 13:34:22', '2021-09-16 08:03:50'),
	(7, 'Kartu BPJS Ketenagakerjaan', 'Kartu BPJS Ketenagakerjaan', '<p><strong>Permohonan Kartu BPJS (BPU)</strong></p>\r\n\r\n<p>1. KTP</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Klaim JHT</strong></p>\r\n\r\n<p>1.&nbsp;Kartu BPJS ketenagakerjaan</p>\r\n\r\n<p>2. KTP/Paspor Peserta</p>\r\n\r\n<p>3.&nbsp;Kartu Keluarga</p>\r\n\r\n<p>4.&nbsp;Surat Keterangan Aktif Bekerja</p>\r\n\r\n<p>5&nbsp;Surat Keterangan Berhenti Bekerja Dari Perusahaan</p>\r\n\r\n<p>6.&nbsp;Surat Keterangan Pengunduran Diri</p>\r\n\r\n<p>7.&nbsp;Penetapan PHK dari PHI</p>', '1631584159.jpg', 11, '2021-08-27 13:43:57', '2021-09-14 01:49:19'),
	(8, 'Kartu BPJS Kesehatan', 'Kartu BPJS Kesehatan', 'Kartu BPJS Kesehatan', '1630071861.png', 1, '2021-08-27 13:44:21', '2021-08-27 13:44:21'),
	(9, 'Kartu Keluarga', 'Kartu Keluarga', '<p><strong>Kartu Keluarga (Baru)</strong></p>\r\n\r\n<p>1.&nbsp;Formulir Permohonan</p>\r\n\r\n<p>2.&nbsp;Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kartu Keluarga (Hilang)</strong></p>\r\n\r\n<p>1.&nbsp;Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian</p>\r\n\r\n<p>2.&nbsp;KTP&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kartu Keluarga (Perkawinan)</strong></p>\r\n\r\n<p>1.&nbsp;KK Lama (suami istri)</p>\r\n\r\n<p>2.&nbsp;Formulir KK (F.1-01)</p>\r\n\r\n<p>3.&nbsp;KTP Suami dan Istri</p>\r\n\r\n<p>4.&nbsp;Surat Nikah/Akta Nikah</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kartu Keluarga (Perubahan Data)</strong></p>\r\n\r\n<p>1.&nbsp;KK Lama</p>\r\n\r\n<p>2. KTP</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kartu Keluarga (Pindah Datang)</strong></p>\r\n\r\n<p>1.<strong>&nbsp;</strong>KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan)</p>\r\n\r\n<p>2. SKP WNI</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Kartu Keluarga (Rusak)</strong></p>\r\n\r\n<p>1.&nbsp;KK yang rusak</p>\r\n\r\n<p>2. KTP</p>', '1630071875.png', 11, '2021-08-27 13:44:35', '2021-09-16 08:14:06'),
	(10, 'Akta Kelahiran', 'Akta Kelahiran', '<p><strong>Akta Kelahiran (Anak Ibu)</strong></p>\r\n\r\n<p>1.&nbsp;Formulir Akta Kelahiran</p>\r\n\r\n<p>2.&nbsp;Suket Lahir dari Dokter/Bidan Penolong</p>\r\n\r\n<p>3.&nbsp;Kartu keluarga</p>\r\n\r\n<p>4.&nbsp;KTP (Suami Istri)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Akta Kelahiran (Pengangkatan Anak)</strong></p>\r\n\r\n<p>1.&nbsp;Formulir Pengangkatan Anak</p>\r\n\r\n<p>2.&nbsp;Akta Kelahiran Anak</p>\r\n\r\n<p>3.&nbsp;Kartu keluarga</p>\r\n\r\n<p>4.&nbsp;KTP Orang Tua Angkat</p>\r\n\r\n<p>5.&nbsp;Persetujuan Pengadilan</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Akta Kelahiran (Tidak Tercatat)</strong></p>\r\n\r\n<p>1.&nbsp;Formulir Akta Kelahiran</p>\r\n\r\n<p>2.&nbsp;Suket Lahir dari Dokter/Bidan Penolong</p>\r\n\r\n<p>3.&nbsp;Kartu keluarga</p>\r\n\r\n<p>4.&nbsp;KTP (Suami istri)</p>\r\n\r\n<p>5.&nbsp;SPTJM Suami Istri</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Akta Kelahiran (Tercatat)</strong></p>\r\n\r\n<p>1.&nbsp;Formulir Akta Kelahiran</p>\r\n\r\n<p>2.&nbsp;Suket Lahir dari Dokter/Bidan Penolong</p>\r\n\r\n<p>3.&nbsp;Kartu keluarga</p>\r\n\r\n<p>4.&nbsp;KTP (Suami istri)</p>\r\n\r\n<p>5.&nbsp;Buku Nikah</p>', '1630071889.png', 11, '2021-08-27 13:44:49', '2021-09-16 08:18:01'),
	(11, 'Kartu Identitas Anak (KIA)', 'Kartu Identitas Anak (KIA)', '<p>1.&nbsp;Kartu Keluarga</p>\r\n\r\n<p>2.&nbsp;Akta Kelahiran</p>\r\n\r\n<p>3.&nbsp;Foto Warna 3 x 4 Latar Belakang Merah/Biru</p>\r\n\r\n<p>4.&nbsp;KTP&nbsp;</p>', '1630071901.png', 11, '2021-08-27 13:45:01', '2021-09-16 08:18:57'),
	(12, 'Surat Pacak Kapal', 'Surat Pacak Kapal', '<p>1. KTP</p>\r\n\r\n<p>2.&nbsp;Keterangan jual beli kapal mengetahui Desa/lurah</p>\r\n\r\n<p>3.&nbsp;Foto Fisik Kapal</p>\r\n\r\n<p>4.&nbsp;Formulir Permohonan</p>', '1630071914.png', 11, '2021-08-27 13:45:14', '2021-09-16 08:19:46'),
	(13, 'Kartu Pencari Kerja', 'Kartu Pencari Kerja', '<p>1. Ijazah Terakhir</p>\r\n\r\n<p>2.&nbsp;Transkrip Nilai</p>\r\n\r\n<p>3.&nbsp;Foto Warna 4 x 6</p>\r\n\r\n<p>4.&nbsp;Sertifikat Keahlian</p>\r\n\r\n<p>5.&nbsp;KTP&nbsp;</p>\r\n\r\n<p>6.&nbsp;Berat Badan (Kg)</p>\r\n\r\n<p>7.&nbsp;Tinggi Badan (Cm)&nbsp;</p>\r\n\r\n<p>8.&nbsp;Tujuan Perusahaan</p>', '1630071939.png', 11, '2021-08-27 13:45:39', '2021-09-16 08:21:02'),
	(14, 'Rekomendasi Resepsi Pernikahan', 'Rekomendasi Resepsi Pernikahan', '<p>1.&nbsp;KTP pemohon/Penanggung Jawab</p>\r\n\r\n<p>2.&nbsp;Surat Pernyataan Penerapan Prokes Mengetahui Ketua Satgas Desa/Kelurahan</p>', '1630071957.png', 11, '2021-08-27 13:45:57', '2021-09-16 08:21:49'),
	(15, 'Layanan Perizinan PTSP', 'Layanan Perizinan PTSP', 'Layanan Perizinan PTSP', '1630071971.png', 1, '2021-08-27 13:46:11', '2021-08-27 13:46:11');
/*!40000 ALTER TABLE `layanan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_layanan.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_07_30_050258_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_layanan.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.pengaduan_tbl
CREATE TABLE IF NOT EXISTS `pengaduan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengaduan` varchar(50) DEFAULT NULL,
  `perihal` mediumtext DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `tempat_kejadian` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `waktu_kejadian` time DEFAULT NULL,
  `nip_pelapor` varchar(300) DEFAULT NULL,
  `nama_pelapor` varchar(300) DEFAULT NULL,
  `no_hp_pelapor` varchar(300) DEFAULT NULL,
  `alamat_pelapor` varchar(300) DEFAULT NULL,
  `opd_pelapor` varchar(300) DEFAULT NULL,
  `nama_pelaku` varchar(300) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `unit_kerja` varchar(200) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `status_hapus` int(11) NOT NULL DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_layanan.pengaduan_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaduan_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengaduan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.pengajuan_tbl
CREATE TABLE IF NOT EXISTS `pengajuan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(50) DEFAULT NULL,
  `nik` varchar(300) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `no_hp` varchar(300) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `kartu_keluarga` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `surat_keterangan_dari_desa` varchar(100) DEFAULT NULL,
  `ijazah_terakhir` varchar(100) DEFAULT NULL,
  `transkrip_nilai` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(100) DEFAULT NULL,
  `tinggi_badan` varchar(100) DEFAULT NULL,
  `berat_badan` varchar(100) DEFAULT NULL,
  `tujuan_perusahaan` varchar(100) DEFAULT NULL,
  `formulir_akta_kematian` varchar(100) DEFAULT NULL,
  `surat_keterangan_kematian` varchar(100) DEFAULT NULL,
  `surat_pengantar_rt` varchar(100) DEFAULT NULL,
  `akta_pendirian` varchar(100) DEFAULT NULL,
  `surat_keterangan_terdaftar` varchar(100) DEFAULT NULL,
  `bukti_lunas_pbb` varchar(100) DEFAULT NULL,
  `skaw` varchar(100) DEFAULT NULL,
  `akta_kematian` varchar(100) DEFAULT NULL,
  `buku_akta_nikah` varchar(100) DEFAULT NULL,
  `akta_kelahiran` varchar(100) DEFAULT NULL,
  `buku_lunas_pbb` varchar(100) DEFAULT NULL,
  `kartu_bpjs` varchar(100) DEFAULT NULL,
  `suket_bekerja` varchar(100) DEFAULT NULL,
  `suket_berhenti_bekerja` varchar(100) DEFAULT NULL,
  `suket_pengunduran_diri` varchar(100) DEFAULT NULL,
  `penetapan_phk` varchar(100) DEFAULT NULL,
  `surat_permohonan` varchar(100) DEFAULT NULL,
  `surat_kuasa` varchar(100) DEFAULT NULL,
  `keterangan_jual_beli_kapal` varchar(100) DEFAULT NULL,
  `foto_kapal` varchar(100) DEFAULT NULL,
  `pernyataan_domisili` varchar(100) DEFAULT NULL,
  `surat_keterangan_hilang` varchar(100) DEFAULT NULL,
  `kartu_keluarga_lama` varchar(100) DEFAULT NULL,
  `formulir_kk` varchar(100) DEFAULT NULL,
  `surat_nikah` varchar(100) DEFAULT NULL,
  `skp_wni` varchar(100) DEFAULT NULL,
  `formulir_akta_kelahiran` varchar(100) DEFAULT NULL,
  `suket_lahir` varchar(100) DEFAULT NULL,
  `formulir_pengangkatan_anak` varchar(100) DEFAULT NULL,
  `persetujuan_pengadilan` varchar(100) DEFAULT NULL,
  `sptjm` varchar(100) DEFAULT NULL,
  `buku_nikah` varchar(100) DEFAULT NULL,
  `surat_pernyataan` varchar(100) DEFAULT NULL,
  `catatan_perbaikan` varchar(200) DEFAULT NULL,
  `nama_layanan` varchar(200) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT 0,
  `hasil` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `status_hapus` int(11) NOT NULL DEFAULT 0,
  `kategori` int(11) DEFAULT 0,
  `eksekutor` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_layanan.pengajuan_tbl: ~18 rows (lebih kurang)
/*!40000 ALTER TABLE `pengajuan_tbl` DISABLE KEYS */;
INSERT INTO `pengajuan_tbl` (`id`, `no_pengajuan`, `nik`, `nama`, `no_hp`, `alamat`, `ktp`, `kartu_keluarga`, `foto`, `surat_keterangan_dari_desa`, `ijazah_terakhir`, `transkrip_nilai`, `sertifikat`, `tinggi_badan`, `berat_badan`, `tujuan_perusahaan`, `formulir_akta_kematian`, `surat_keterangan_kematian`, `surat_pengantar_rt`, `akta_pendirian`, `surat_keterangan_terdaftar`, `bukti_lunas_pbb`, `skaw`, `akta_kematian`, `buku_akta_nikah`, `akta_kelahiran`, `buku_lunas_pbb`, `kartu_bpjs`, `suket_bekerja`, `suket_berhenti_bekerja`, `suket_pengunduran_diri`, `penetapan_phk`, `surat_permohonan`, `surat_kuasa`, `keterangan_jual_beli_kapal`, `foto_kapal`, `pernyataan_domisili`, `surat_keterangan_hilang`, `kartu_keluarga_lama`, `formulir_kk`, `surat_nikah`, `skp_wni`, `formulir_akta_kelahiran`, `suket_lahir`, `formulir_pengangkatan_anak`, `persetujuan_pengadilan`, `sptjm`, `buku_nikah`, `surat_pernyataan`, `catatan_perbaikan`, `nama_layanan`, `layanan_id`, `hasil`, `status`, `status_hapus`, `kategori`, `eksekutor`, `tanggal`, `user_id`, `admin_id`, `created_at`, `updated_at`) VALUES
	(1, '2021091000441411', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091000441411.png', '2021091000441411.png', '2021091000441411.png', '2021091000441411.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yytyt', 'Surat Izin Usaha Mikro Kecil (IUMK)', 1, NULL, 1, 0, NULL, 2, '2021-09-10', 11, 2, '2021-09-10 00:44:14', '2021-09-14 01:12:05'),
	(2, '2021091000502611', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091000502611.png', '2021091000502611.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091000502611.png', '2021091000502611.png', '2021091000502611.png', '2021091000502611.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ddd', 'Surat Keterangan Sekretariat', 2, NULL, 1, 0, NULL, 2, '2021-09-10', 11, 2, '2021-09-10 00:50:26', '2021-09-14 01:12:02'),
	(3, '2021091001002911', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091001002911.png', '2021091001002911.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091001002911.png', '2021091001002911.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'perbaiki semua', 'Surat Keterangan Kematian', 4, NULL, 1, 0, NULL, 8, '2021-09-10', 11, 14, '2021-09-10 01:00:29', '2021-09-14 00:38:16'),
	(4, '2021091002184311', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091002184311.png', '2021091002184311.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091002184311.png', '2021091002184311.png', '2021091002184311.png', '2021091002184311.png', '2021091002184311.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'perbaiki semua', 'Surat Keterangan Ahli Waris', 5, NULL, 1, 0, NULL, 2, '2021-09-10', 11, 2, '2021-09-10 02:18:43', '2021-09-14 01:11:58'),
	(5, '2021091002254211', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091002254211.png', '2021091002254211.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091002254211.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091002254211.png', '2021091002254211.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ssasa', 'Surat Keterangan Domisili', 6, '2021091002254211.pdf', 6, 0, NULL, 7, '2021-09-10', 11, 16, '2021-09-10 02:25:42', '2021-09-12 14:07:16'),
	(6, '2021091002263811', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091002263811.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sasa', 'Kartu BPJS Ketenagakerjaan', 7, NULL, 5, 0, 1, 12, '2021-09-10', 11, 15, '2021-09-10 02:26:38', '2021-09-12 11:07:00'),
	(10, '2021091002520611', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091002520611.png', '2021091002520611.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091002520611.png', '2021091002520611.png', '2021091002520611.png', '2021091002520611.png', '2021091002520611.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xx', 'Kartu BPJS Ketenagakerjaan', 7, '2021091002520611.pdf', 6, 0, 2, 12, '2021-09-10', 11, 15, '2021-09-10 02:52:06', '2021-09-14 01:41:38'),
	(12, '2021091003400411', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091003400411.jpg', NULL, NULL, NULL, '2021091003400411.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ddsfd', 'Kartu Keluarga', 9, NULL, 1, 0, 1, 8, '2021-09-10', 11, 14, '2021-09-10 03:40:04', '2021-09-14 00:52:46'),
	(13, '2021091003542911', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091003542911.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091003542911.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ggf', 'Kartu Keluarga', 9, NULL, 1, 0, 2, 8, '2021-09-10', 11, 14, '2021-09-10 03:54:29', '2021-09-14 00:52:31'),
	(14, '2021091004090911', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091004090911.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091004090911.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yt', 'Kartu Keluarga', 9, NULL, 1, 0, 2, 8, '2021-09-10', 11, 14, '2021-09-10 04:09:09', '2021-09-14 00:51:51'),
	(16, '2021091004154111', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091004154111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091004154111.jpg', '2021091004154111.jpg', '2021091004154111.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yt', 'Kartu Keluarga', 9, NULL, 1, 0, 3, 8, '2021-09-10', 11, 14, '2021-09-10 04:15:41', '2021-09-14 00:51:29'),
	(17, '2021091004172211', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091004172211.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091004172211.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yt', 'Kartu Keluarga', 9, NULL, 1, 0, 4, 8, '2021-09-10', 11, 14, '2021-09-10 04:17:22', '2021-09-14 00:50:55'),
	(18, '2021091004205011', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091004205011.jpg', NULL, NULL, '2021091004205011.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 't', 'Kartu Keluarga', 9, NULL, 1, 0, 5, 8, '2021-09-10', 11, 14, '2021-09-10 04:20:50', '2021-09-14 00:50:30'),
	(19, '2021091004363111', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091004363111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091004363111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r', 'Kartu Keluarga', 9, NULL, 1, 0, 6, 8, '2021-09-10', 11, 14, '2021-09-10 04:36:31', '2021-09-14 00:50:10'),
	(20, '2021091005254911', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005254911.jpg', '2021091005254911.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005254911.jpg', '2021091005254911.jpg', NULL, NULL, NULL, NULL, NULL, 'a', 'Akta Kelahiran', 10, NULL, 1, 0, 1, 8, '2021-09-10', 11, 14, '2021-09-10 05:25:49', '2021-09-14 00:48:14'),
	(21, '2021091005333711', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005333711.jpg', '2021091005333711.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005333711.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005333711.jpg', '2021091005333711.jpg', NULL, NULL, NULL, 'xx', 'Akta Kelahiran', 10, NULL, 1, 0, 2, 8, '2021-09-10', 11, 14, '2021-09-10 05:33:37', '2021-09-14 00:47:45'),
	(22, '2021091005342011', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005342011.png', '2021091005342011.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005342011.png', '2021091005342011.png', NULL, NULL, '2021091005342011.png', NULL, NULL, 'papal', 'Akta Kelahiran', 10, NULL, 1, 0, 3, 8, '2021-09-10', 11, 14, '2021-09-10 05:34:20', '2021-09-14 00:47:07'),
	(23, '2021091005350111', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005350111.jpg', '2021091005350111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005350111.jpg', '2021091005350111.jpg', NULL, NULL, NULL, '2021091005350111.jpg', NULL, 'x', 'Akta Kelahiran', 10, NULL, 1, 0, 4, 8, '2021-09-10', 11, 14, '2021-09-10 05:35:01', '2021-09-14 00:38:07'),
	(24, '2021091005405411', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005405411.png', '2021091005405411.png', '2021091005405411.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005405411.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salah', 'Kartu Identitas Anak (KIA)', 11, NULL, 1, 0, NULL, 8, '2021-09-10', 11, 14, '2021-09-10 05:40:54', '2021-09-14 00:38:12'),
	(25, '2021091005464111', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005464111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091005464111.png', NULL, '2021091005464111.png', '2021091005464111.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ktp tidak sesuai', 'Surat Pacak Kapal', 12, NULL, 1, 0, NULL, 2, '2021-09-10', 11, 2, '2021-09-10 05:46:41', '2021-09-14 01:11:55'),
	(26, '2021091005512311', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091005512311.jpg', NULL, '2021091005512311.jpg', NULL, '2021091005512311.jpg', '2021091005512311.jpg', '2021091005512311.jpg', '171', '71', 'aaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salah semua gais', 'Kartu Pencari Kerja', 13, '2021091005512311.pdf', 6, 0, NULL, 9, '2021-09-10', 11, 13, '2021-09-10 05:51:23', '2021-09-14 01:40:08'),
	(27, '2021091111292511', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091111292511.png', '2021091111292511.png', '2021091111292511.png', '2021091111292511.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kartu keluarga tidak sesuai', 'Surat Izin Usaha Mikro Kecil (IUMK)', 1, '2021091111292511.pdf', 6, 0, NULL, 2, '2021-09-11', 11, 2, '2021-09-11 11:29:25', '2021-09-11 11:35:14'),
	(28, '2021091401042211', '7471091610910001', 'Adri Saputra Ibrahim', '082259504093', 'BTN. Permata Anawai', '2021091401042211.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021091401042211.png', 'ewewewewre', 'Rekomendasi Resepsi Pernikahan', 14, NULL, 1, 0, NULL, 2, '2021-09-14', 11, 2, '2021-09-14 01:04:22', '2021-09-14 01:11:52'),
	(29, '2021091608501912', '7471091610910002', 'Eis Nur Hiliya', '081230963501', 'BTN. Permata Anawai', '2021091608501912.png', '2021091608501912.png', '2021091608501912.png', '2021091608501912.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Surat Izin Usaha Mikro Kecil (IUMK)', 1, '2021091608501912.pdf', 6, 0, NULL, 2, '2021-09-16', 12, 2, '2021-09-16 08:50:19', '2021-09-16 15:18:35');
/*!40000 ALTER TABLE `pengajuan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.pengaturan_tbl
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

-- Membuang data untuk tabel db_layanan.pengaturan_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaturan_tbl` DISABLE KEYS */;
INSERT INTO `pengaturan_tbl` (`id`, `nama_aplikasi`, `singkatan_nama_aplikasi`, `logo_kecil`, `logo_besar`, `background_login`, `background_sidebar`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Layanan Online Kec. Kabaena Barat', NULL, '16292591131.png', '16304185432.png', '16304197653.jpg', '16292583814.jpg', 1, '2021-08-05 11:27:10', '2021-08-31 14:22:45');
/*!40000 ALTER TABLE `pengaturan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.personal_access_tokens
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

-- Membuang data untuk tabel db_layanan.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.profil_tbl
CREATE TABLE IF NOT EXISTS `profil_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_layanan.profil_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `profil_tbl` DISABLE KEYS */;
INSERT INTO `profil_tbl` (`id`, `nama_dinas`, `alamat`, `telp`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Kecamatan Kabaena Barat', 'JL.', '0401', 'kabaenabarat@gmail.com', NULL, '2021-08-25 03:57:44');
/*!40000 ALTER TABLE `profil_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.sessions
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

-- Membuang data untuk tabel db_layanan.sessions: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('5hkV7xJVKXnw3UDvmkoPE1bcyQ0qPGYalgReHysQ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiRHJ5bklNakdFaWpFeGlHMFhpZzRERFFSYVJlOXdmMGQzSEpqRzBhdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvbGF5YW5hbi1rYWJhZW5hYmFyYXQvbG9naW4iO319', 1631806576);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.skm_tbl
CREATE TABLE IF NOT EXISTS `skm_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `skm` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_layanan.skm_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `skm_tbl` DISABLE KEYS */;
INSERT INTO `skm_tbl` (`id`, `nik`, `skm`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '7471091610910002', 3, 12, '2021-09-16 15:18:35', '2021-09-16 15:18:35');
/*!40000 ALTER TABLE `skm_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_layanan.users
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_layanan.users: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `no_hp`, `alamat`, `group`, `foto`, `opd_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', '', 'administrator@gmail.com', NULL, '$2y$10$/nrvGZW/173bX61WHpRb7O1qq9fflKQePAYi29wPEFtHPsgu2YOtW', NULL, NULL, NULL, NULL, NULL, 1, '1629338927.jpg', NULL, 1, '2021-08-03 17:21:11', '2021-08-19 02:08:47'),
	(2, 'kecamatan', '', 'kecamatan@gmail.com', NULL, '$2y$10$VA00V47YZUkGu69uy5eite7nOJC3zAle7tjbNxXZax/VhDZMlXHvq', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, '2021-08-05 13:13:48', '2021-08-29 03:16:58'),
	(11, '7471091610910001', 'Adri Saputra Ibrahim', '7471091610910001@gmail.com', NULL, '$2y$10$CNKOgWTg.3GE9hk81bpjEuqT398ksU3vO5kGViJ2Z6C7v49yDXvTO', NULL, NULL, NULL, '082259504093', 'BTN. Permata Anawai', 14, '1631456721.jpg', NULL, 1, '2021-08-27 11:07:36', '2021-09-12 14:25:21'),
	(12, '7471091610910002', 'Eis Nur Hiliya', '7471091610910002@gmail.com', NULL, '$2y$10$smdrRpNqIZNxgr6EcGbbSOnIPXuIC/DLRdJblSU3T5b74TIY9mzi.', NULL, NULL, NULL, '081230963501', 'BTN. Permata Anawai', 14, NULL, NULL, 1, '2021-08-27 11:08:10', '2021-08-27 11:08:10'),
	(13, 'distransnaker', NULL, 'distransnaker@gmail.com', NULL, '$2y$10$1GhxSFkggWfcwdP2gsEAmOu3fn3zhH5lryS8NkGCmHL1a/iqLWirW', NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, 1, '2021-09-01 03:23:40', '2021-09-14 01:39:53'),
	(14, 'disdukcapil', NULL, 'disdukcapil@gmail.com', NULL, '$2y$10$g29was61sG.0ClTPWH/5Jew3hOXFq/BK/EkuVvXxS0iepmYAyz2yW', NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, 1, '2021-09-12 10:43:21', '2021-09-12 10:43:21'),
	(15, 'bpjs_ketenagakerjaan', NULL, 'bpjs_ketenagakerjaan@gmail.com', NULL, '$2y$10$xXqaNFWeqTgL7lNesx9fCerqQduQhS3RopZ1K8JHQNR40VTk31LUy', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, 1, '2021-09-12 11:01:24', '2021-09-12 11:01:24'),
	(16, 'rahantari', NULL, 'rahantari@gmail.com', NULL, '$2y$10$beWz9s1Vi1hUGSdMtQTmzO1vucHLa2NpoIVWcTIIURCfxB8X9QXkO', NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, 1, '2021-09-12 14:03:28', '2021-09-12 14:03:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
