-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2026 pada 15.31
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
-- Database: `madrasahku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') DEFAULT 'admin',
  `is_aktif` tinyint(1) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_users`
--

INSERT INTO `admin_users` (`id`, `nama`, `username`, `email`, `password`, `role`, `is_aktif`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'admin@madrasahku.sch.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'superadmin', 1, NULL, '2026-07-24 14:25:40', '2026-07-24 14:25:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `urutan`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Apa saja kurikulum yang diterapkan di Madrasahku?', 'Madrasahku menerapkan tiga kurikulum: Kurikulum Merdeka dari Kemendikbud, Kurikulum Madrasah dari Kemenag, dan Kurikulum Lokal yang meliputi Tahfidz dan Bahasa Arab.', 1, 1, '2026-07-24 14:25:40', '2026-07-24 14:25:40'),
(2, 'Berapa biaya pendaftaran SPMB?', 'Biaya formulir pendaftaran sebesar Rp 50.000. Biaya daftar ulang bagi yang diterima sebesar Rp 800.000. Tersedia program beasiswa untuk siswa berprestasi dan kurang mampu.', 2, 1, '2026-07-24 14:25:40', '2026-07-24 14:25:40'),
(3, 'Apakah tersedia program beasiswa?', 'Ya, Madrasahku menyediakan beasiswa prestasi akademik, beasiswa hafalan Al-Quran, beasiswa tidak mampu (PIP), dan diskon untuk anak guru.', 3, 1, '2026-07-24 14:25:40', '2026-07-24 14:25:40'),
(4, 'Bagaimana jam belajar di Madrasahku?', 'Pembelajaran berlangsung Senin-Kamis dan Sabtu-Minggu pukul 07.00-15.00 WIB. Hari Jumat libur.', 4, 1, '2026-07-24 14:25:40', '2026-07-24 14:25:40'),
(5, 'Di mana lokasi Madrasahku?', 'Madrasahku berlokasi di 4M5F+HXM, Kauman, Kec. Pekalongan Tim., Kota Pekalongan, Jawa Tengah 51127.', 5, 1, '2026-07-24 14:25:40', '2026-07-24 14:25:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT 1,
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `deskripsi`, `gambar`, `is_aktif`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Kelas Modern', '24 ruang kelas ber-AC dengan fasilitas multimedia', 'gallery/kelas.jpg', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Perpustakaan Digital', 'Koleksi 5000+ buku dan akses e-library', 'gallery/perpustakaan.jpg', 1, 2, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Lab Komputer', '40 unit komputer dengan akses internet', 'gallery/lab.jpg', 1, 3, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Lapangan Olahraga', 'Lapangan futsal, basket, dan voli', 'gallery/lapangan.jpg', 1, 4, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Masjid Sekolah', 'Masjid dengan kapasitas 500 jamaah', 'gallery/masjid.jpg', 1, 5, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'Kantin Sehat', 'Menyediakan makanan bergizi dan halal', 'gallery/kantin.jpg', 1, 6, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` enum('Kegiatan','Fasilitas','Prestasi','SPMB','Umum') DEFAULT 'Kegiatan',
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `teks_tombol` varchar(100) DEFAULT 'Daftar Sekarang',
  `link_tombol` varchar(255) DEFAULT '/spmb',
  `urutan` int(11) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hero`
--

INSERT INTO `hero` (`id`, `judul`, `subtitle`, `gambar`, `teks_tombol`, `link_tombol`, `urutan`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di Madrasahku Pekalongan', 'Membentuk Generasi Berilmu, Berakhlak, dan Berprestasi', 'hero/hero1.jpg', 'Daftar Sekarang', '/spmb', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Pendidikan Islam Berkualitas', 'Perpaduan Kurikulum Nasional dengan Nilai-Nilai Islami', 'hero/hero2.jpg', 'Pelajari Lebih Lanjut', '/profil', 2, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Fasilitas Modern & Lengkap', 'Mendukung Proses Pembelajaran yang Optimal', 'hero/hero3.jpg', 'Lihat Fasilitas', '/profil', 3, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `kategori` enum('Libur','Ujian','Kegiatan','SPMB','Lainnya') DEFAULT 'Kegiatan',
  `keterangan` text DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id`, `kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `kategori`, `keterangan`, `tahun_ajaran`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Tahun Ajaran Baru 2026/2027', '2026-07-15', NULL, 'Kegiatan', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Masa Orientasi Siswa Baru', '2026-07-15', '2026-07-18', 'Kegiatan', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Ujian Tengah Semester 1', '2026-09-21', '2026-09-25', 'Ujian', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Penilaian Akhir Semester 1', '2026-11-30', '2026-12-05', 'Ujian', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Pembagian Rapor Semester 1', '2026-12-19', NULL, 'Kegiatan', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'Libur Semester 1', '2026-12-20', '2027-01-02', 'Libur', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(7, 'Awal Semester 2', '2027-01-05', NULL, 'Kegiatan', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(8, 'Penilaian Akhir Semester 2', '2027-05-12', '2027-05-17', 'Ujian', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(9, 'Pembagian Rapor & Kelulusan', '2027-06-26', NULL, 'Kegiatan', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(10, 'Libur Semester 2', '2027-06-27', '2027-07-12', 'Libur', NULL, '2026/2027', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_pesan`
--

CREATE TABLE `kontak_pesan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('belum_dibaca','sudah_dibaca','ditindaklanjuti') NOT NULL DEFAULT 'belum_dibaca',
  `dibuat_pada` datetime NOT NULL,
  `dibaca_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak_pesan`
--

INSERT INTO `kontak_pesan` (`id`, `nama`, `email`, `telepon`, `subjek`, `pesan`, `status`, `dibuat_pada`, `dibaca_pada`) VALUES
(1, 'Hawwin Amrinaa Rosyada', 'hawwin.rosyada@gmail.com', '089636560528', 'spmbm', 'qwertyuioasdfghjk', 'belum_dibaca', '2026-08-08 03:46:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `misi`
--

CREATE TABLE `misi` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `misi`
--

INSERT INTO `misi` (`id`, `isi`, `urutan`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Menyelenggarakan pendidikan berkualitas berbasis nilai Islam', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Mengembangkan potensi akademik dan non-akademik siswa', 2, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Membentuk karakter Islami yang kuat', 3, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Membekali siswa dengan keterampilan abad 21', 4, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Membangun lingkungan belajar yang kondusif dan inspiratif', 5, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `kategori` enum('Akademik','SPMB','Keagamaan','Keuangan','Ekstrakurikuler','Beasiswa','Teknologi','Umum') DEFAULT 'Umum',
  `is_penting` tinyint(1) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `konten`, `kategori`, `is_penting`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Jadwal Penilaian Akhir Semester (PAS) Genap 2026', 'Penilaian Akhir Semester Genap akan dilaksanakan pada tanggal 15-22 Mei 2026. Siswa diwajibkan hadir tepat waktu dan membawa perlengkapan ujian. Jadwal lengkap akan dibagikan melalui wali kelas masing-masing.', 'Akademik', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Pendaftaran SPMB Tahun Ajaran 2026/2027 Dibuka', 'Pendaftaran Peserta Didik Baru untuk tahun ajaran 2026/2027 telah dibuka mulai 1 Februari 2026. Kuota terbatas 120 siswa. Daftar segera melalui menu SPMB atau datang langsung ke sekretariat madrasah.', 'SPMB', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Libur Semester Genap dan Pembagian Rapor', 'Pembagian rapor semester genap akan dilaksanakan pada 26 Juni 2026 pukul 08:00 WIB. Orang tua/wali murid diharapkan hadir. Libur semester dimulai 27 Juni - 10 Juli 2026.', 'Akademik', 0, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Peringatan Isra Mi\'raj Nabi Muhammad SAW', 'Dalam rangka memperingati Isra Mi\'raj, akan diadakan kegiatan dzikir bersama dan ceramah pada Jumat, 6 Februari 2026 pukul 07:00-10:00. Seluruh siswa wajib hadir dengan pakaian muslim/muslimah.', 'Keagamaan', 0, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Batas Akhir Pembayaran SPP Bulan Februari 2026', 'Pembayaran SPP bulan Februari paling lambat tanggal 10 Februari 2026. Pembayaran dapat dilakukan melalui transfer bank atau langsung ke bagian tata usaha.', 'Keuangan', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'Lomba Cerdas Cermat Antar Kelas', 'Akan diadakan Lomba Cerdas Cermat tingkat madrasah pada 14 Februari 2026. Setiap kelas mengirimkan 3 perwakilan siswa terbaik. Pendaftaran melalui wali kelas maksimal 8 Februari 2026.', 'Ekstrakurikuler', 0, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(7, 'Program Beasiswa Prestasi Semester Genap', 'Madrasah menyediakan beasiswa prestasi untuk 10 siswa berprestasi. Kriteria: Rata-rata nilai minimal 85, hafalan minimal 2 juz, dan berkelakuan baik.', 'Beasiswa', 0, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(8, 'Perbaikan Sistem Informasi Akademik Online', 'Sistem informasi akademik online akan mengalami maintenance pada 10-11 Januari 2026. Selama periode tersebut, akses portal siswa dan orang tua mungkin terganggu.', 'Teknologi', 0, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_kontak`
--

CREATE TABLE `pesan_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `pesan` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `juara` varchar(100) NOT NULL,
  `lomba` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tingkat` enum('Sekolah','Kota','Provinsi','Nasional','Internasional') DEFAULT 'Kota',
  `ikon` varchar(50) DEFAULT 'trophy',
  `is_featured` tinyint(1) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `juara`, `lomba`, `tahun`, `tingkat`, `ikon`, `is_featured`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Juara 1', 'MTQ Tingkat Kota', '2025', 'Kota', 'trophy', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Juara 2', 'Olimpiade Matematika Provinsi', '2025', 'Provinsi', 'award', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Juara 1', 'Lomba Kaligrafi Nasional', '2024', 'Nasional', 'trophy', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Juara 3', 'Debat Bahasa Inggris Regional', '2024', 'Provinsi', 'award', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_akademik`
--

CREATE TABLE `program_akademik` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tingkat` varchar(100) DEFAULT 'Semua Tingkat',
  `is_aktif` tinyint(1) DEFAULT 1,
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_akademik`
--

INSERT INTO `program_akademik` (`id`, `nama`, `deskripsi`, `tingkat`, `is_aktif`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Tahfidz Al-Quran', 'Program menghafal Al-Quran dengan target minimal 3 juz untuk lulusan', 'Semua Tingkat', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Bahasa Arab & Inggris', 'Program dwi bahasa untuk meningkatkan kompetensi berbahasa internasional', 'Kelas 4-6', 1, 2, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Sains & Teknologi', 'Pembelajaran STEM dan robotika untuk mempersiapkan era digital', 'Kelas 5-6', 1, 3, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Kepemimpinan Islam', 'Pembinaan karakter dan kepemimpinan berbasis nilai-nilai Islam', 'Kelas 5-6', 1, 4, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Ekstrakurikuler Beragam', 'Futsal, Basket, Pramuka, Tilawah, Kaligrafi, Jurnalistik, dan lainnya', 'Semua Tingkat', 1, 5, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` enum('text','textarea','image','number','boolean') DEFAULT 'text',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `label`, `type`, `created_at`, `updated_at`) VALUES
(1, 'nama_madrasah', 'Madrasahku', 'Nama Madrasah', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'tagline', 'Membentuk Generasi Berilmu, Berakhlak, dan Berprestasi', 'Tagline', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'kota', 'Pekalongan', 'Kota', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'alamat', '4M5F+HXM, Kauman, Kec. Pekalongan Tim., Kota Pekalongan, Jawa Tengah 51127', 'Alamat Lengkap', 'textarea', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'telepon', '(0285) 1234-5678', 'Telepon', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'whatsapp', '0812-3456-7890', 'WhatsApp', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(7, 'email', 'info@madrasahku.sch.id', 'Email', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(8, 'email_spmb', 'spmb@madrasahku.sch.id', 'Email SPMB', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(9, 'jam_operasional', 'Senin-Kamis & Sabtu-Minggu: 07.00-15.00 WIB', 'Jam Operasional', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(10, 'logo', 'logo.png', 'Logo', 'image', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(11, 'favicon', 'favicon.ico', 'Favicon', 'image', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(12, 'meta_desc', 'Madrasahku adalah sekolah Islam terbaik di Pekalongan yang mengintegrasikan kurikulum nasional dengan nilai-nilai Islam', 'Meta Description', 'textarea', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(13, 'google_maps_embed', '', 'Google Maps Embed URL', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(14, 'facebook_url', '', 'Facebook URL', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(15, 'instagram_url', '', 'Instagram URL', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(16, 'youtube_url', '', 'YouTube URL', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(17, 'tahun_berdiri', '1995', 'Tahun Berdiri', 'number', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(18, 'akreditasi', 'A', 'Akreditasi', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(19, 'kepala_madrasah', 'Dr. H. Ahmad Syarif, M.Pd.I', 'Nama Kepala Madrasah', 'text', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(20, 'sambutan_kepala', 'Assalamu\'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua.\n\nMadrasahku hadir sebagai lembaga pendidikan Islam yang berkomitmen mengintegrasikan ilmu pengetahuan dengan nilai-nilai keislaman. Kami berupaya mencetak generasi yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlakul karimah dan siap menghadapi tantangan zaman.\n\nMari bersama-sama kita wujudkan pendidikan yang berkualitas untuk masa depan putra-putri kita yang gemilang.', 'Sambutan Kepala Madrasah', 'textarea', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(21, 'foto_kepala', '', 'Foto Kepala Madrasah', 'image', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(22, 'sejarah', 'Madrasahku didirikan pada tahun 1995 dengan semangat untuk menyediakan pendidikan Islam yang berkualitas di wilayah Pekalongan. Berawal dari 3 ruang kelas dengan 60 siswa, kini telah berkembang menjadi lembaga pendidikan dengan lebih dari 800 siswa dan fasilitas modern yang lengkap.\n\nSepanjang perjalanannya, Madrasahku terus berinovasi dalam mengintegrasikan kurikulum nasional dengan nilai-nilai Islam yang kuat, menghasilkan lulusan yang tidak hanya cerdas secara intelektual tetapi juga berakhlak mulia dan siap menghadapi tantangan global.', 'Sejarah Madrasah', 'textarea', '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(23, 'visi', 'Menjadi lembaga pendidikan Islam unggulan yang mencetak generasi berakhlak mulia, berprestasi, dan berwawasan global pada tahun 2030.', 'Visi Madrasah', 'textarea', '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spmb_info`
--

CREATE TABLE `spmb_info` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spmb_info`
--

INSERT INTO `spmb_info` (`id`, `key`, `value`, `label`, `updated_at`) VALUES
(1, 'tahun_ajaran', '2026/2027', 'Tahun Ajaran', '2026-07-24 14:25:39'),
(2, 'kuota', '120', 'Kuota Siswa', '2026-07-24 14:25:39'),
(3, 'tanggal_buka', '2026-02-01', 'Tanggal Pembukaan', '2026-07-24 14:25:39'),
(4, 'tanggal_tutup', '2026-04-30', 'Tanggal Penutupan', '2026-07-24 14:25:39'),
(5, 'biaya_formulir', '50000', 'Biaya Formulir (Rp)', '2026-07-24 14:25:39'),
(6, 'biaya_daftar_ulang', '800000', 'Biaya Daftar Ulang (Rp)', '2026-07-24 14:25:39'),
(7, 'biaya_seragam', '450000', 'Biaya Seragam (Rp)', '2026-07-24 14:25:39'),
(8, 'spp_bulanan', '100000', 'SPP Bulanan (Rp)', '2026-07-24 14:25:39'),
(9, 'promo_diskon', '20', 'Promo Diskon (%)', '2026-07-24 14:25:39'),
(10, 'promo_kuota', '30', 'Kuota Promo (Siswa)', '2026-07-24 14:25:39'),
(11, 'catatan_berkas', 'Semua berkas diserahkan dalam map warna hijau dengan nama calon siswa ditulis di pojok kanan atas.', 'Catatan Berkas', '2026-07-24 14:25:39'),
(12, 'persyaratan', '[\"Foto copy Akta Kelahiran (1 lembar)\",\"Foto copy Kartu Keluarga (1 lembar)\",\"Foto copy Surat Keterangan Lulus dari TK/RA (1 lembar)\",\"Pas foto ukuran 3x4 (1 lembar, background merah)\",\"Foto copy KPS/PIP/PKH (jika ada)\",\"Foto copy Piagam Prestasi (jika ada)\",\"Formulir pendaftaran yang telah diisi lengkap\"]', 'Daftar Persyaratan (JSON)', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spmb_jadwal`
--

CREATE TABLE `spmb_jadwal` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spmb_jadwal`
--

INSERT INTO `spmb_jadwal` (`id`, `kegiatan`, `tanggal`, `urutan`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Dibuka', '1 Februari - 30 April 2026', 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Tes Seleksi Gelombang 1', '10 Mei 2026', 2, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Pengumuman Gelombang 1', '15 Mei 2026', 3, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Tes Seleksi Gelombang 2', '25 Mei 2026', 4, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Pengumuman Gelombang 2', '30 Mei 2026', 5, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'Daftar Ulang', '1-15 Juni 2026', 6, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(7, 'Tahun Ajaran Baru Dimulai', '15 Juli 2026', 7, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `angka` varchar(50) NOT NULL,
  `ikon` varchar(50) DEFAULT 'users',
  `warna` varchar(100) DEFAULT 'from-emerald-500 to-teal-600',
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id`, `label`, `angka`, `ikon`, `warna`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Siswa Aktif', '800+', 'users', 'from-emerald-500 to-teal-600', 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Tenaga Pendidik', '45+', 'graduation-cap', 'from-amber-500 to-orange-600', 2, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Prestasi', '50+', 'trophy', 'from-blue-500 to-indigo-600', 3, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Tahun Berkiprah', '28', 'award', 'from-purple-500 to-pink-600', 4, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `is_aktif` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `jabatan`, `nama`, `foto`, `urutan`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Madrasah', 'Dr. H. Ahmad Syarif, M.Pd.I', NULL, 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Wakil Kepala Kurikulum', 'Dra. Hj. Siti Aminah, M.Pd', NULL, 2, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Wakil Kepala Kesiswaan', 'H. Muhammad Iqbal, S.Pd.I', NULL, 3, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Wakil Kepala Humas', 'Drs. Abdul Rahman, M.M', NULL, 4, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_pendidik`
--

CREATE TABLE `tenaga_pendidik` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `bidang_studi` varchar(200) NOT NULL,
  `pendidikan` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT 1,
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tenaga_pendidik`
--

INSERT INTO `tenaga_pendidik` (`id`, `nama`, `bidang_studi`, `pendidikan`, `foto`, `is_aktif`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Dra. Hj. Fatimah Azzahra', 'Bahasa Arab & Al-Quran', 'S1 Pendidikan Bahasa Arab', NULL, 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Ahmad Fadli, S.Pd', 'Matematika', 'S1 Pendidikan Matematika', NULL, 1, 2, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Siti Nurhaliza, S.Pd', 'Bahasa Inggris', 'S1 Pendidikan Bahasa Inggris', NULL, 1, 3, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(4, 'Muhammad Rizki, S.Si', 'IPA & Biologi', 'S1 Biologi', NULL, 1, 4, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(5, 'Hj. Khadijah, S.Ag', 'Fiqih & Akidah Akhlak', 'S1 Syariah', NULL, 1, 5, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(6, 'Umar Faruk, S.Pd', 'Sejarah Kebudayaan Islam', 'S1 Pendidikan Agama Islam', NULL, 1, 6, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `role` varchar(100) DEFAULT 'Wali Murid',
  `foto` varchar(255) DEFAULT NULL,
  `testimoni` text NOT NULL,
  `rating` tinyint(4) DEFAULT 5,
  `is_aktif` tinyint(1) DEFAULT 1,
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `role`, `foto`, `testimoni`, `rating`, `is_aktif`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Ibu Siti Rahayu', 'Wali Murid', '', 'Alhamdulillah, anak saya berkembang pesat tidak hanya dalam hal akademik, tetapi juga akhlak dan kepribadiannya sejak bersekolah di Madrasahku.', 5, 1, 1, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(2, 'Bapak Ahmad Fauzi', 'Wali Murid', '', 'Guru-guru yang kompeten dan fasilitas yang memadai membuat anak saya semakin semangat belajar. Terima kasih Madrasahku!', 5, 1, 2, '2026-07-24 14:25:39', '2026-07-24 14:25:39'),
(3, 'Ibu Dewi Lestari', 'Alumni', '', 'Berkat pendidikan di Madrasahku, saya bisa melanjutkan ke universitas favorit dan memiliki fondasi keislaman yang kuat.', 5, 1, 3, '2026-07-24 14:25:39', '2026-07-24 14:25:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_pesan`
--
ALTER TABLE `kontak_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_akademik`
--
ALTER TABLE `program_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indeks untuk tabel `spmb_info`
--
ALTER TABLE `spmb_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indeks untuk tabel `spmb_jadwal`
--
ALTER TABLE `spmb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tenaga_pendidik`
--
ALTER TABLE `tenaga_pendidik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kontak_pesan`
--
ALTER TABLE `kontak_pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `program_akademik`
--
ALTER TABLE `program_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `spmb_info`
--
ALTER TABLE `spmb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `spmb_jadwal`
--
ALTER TABLE `spmb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tenaga_pendidik`
--
ALTER TABLE `tenaga_pendidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
