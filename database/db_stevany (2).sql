-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2026 pada 20.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stevany`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `pengguna_id`, `judul`, `slug`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Festival Payung Indonesia Kembali Digelar di Borobudur', 'festival-payung-indonesia-kembali-digelar-di-borobudur', 'Festival Payung Indonesia kembali hadir sebagai salah satu agenda budaya tahunan yang diselenggarakan di kawasan Candi Borobudur, Magelang. Acara ini menampilkan berbagai jenis payung tradisional dari berbagai daerah di Indonesia yang dipadukan dengan pertunjukan seni dan budaya.\r\n\r\nKegiatan ini bertujuan untuk melestarikan warisan budaya nusantara sekaligus menarik minat wisatawan domestik maupun mancanegara untuk berkunjung ke Magelang.', 'aa04ab488e88d61ed666ef3b800349bc.jpeg', '2026-06-27 15:17:16', '2026-06-27 15:17:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `destinasi_nama` varchar(150) NOT NULL,
  `destinasi_deskripsi` longtext DEFAULT NULL,
  `destinasi_alamat` text DEFAULT NULL,
  `destinasi_gambar` varchar(255) DEFAULT NULL,
  `harga_tiket` varchar(100) DEFAULT NULL,
  `jam_operasional` varchar(100) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasi_id`, `kategori_id`, `destinasi_nama`, `destinasi_deskripsi`, `destinasi_alamat`, `destinasi_gambar`, `harga_tiket`, `jam_operasional`, `maps`, `status`, `created_at`) VALUES
(2, 1, 'Silancur ', 'Silancur Highland adalah destinasi wisata alam di lereng tenggara Gunung Sumbing, tepatnya di Dusun Dadapan, Desa Mangli, Kecamatan Kaliangkrik, Kabupaten Magelang, Jawa Tengah. Terletak di ketinggian sekitar 1.300 mdpl, tempat ini menawarkan panorama pegunungan yang sejuk, taman bunga, dan golden sunrise.', 'Dadapan, Mangli, Kec. Kaliangkrik, Kabupaten Magelang, Jawa Tengah 56153', '17bbd2152e46203282eb712a3fa9c920.jpeg', 'Rp10.000 (Senin-Sabtu)  -   Rp15.000 (Minggu)', '05.00-20.00', 'https://maps.app.goo.gl/RABBUkhuSuT1KinZ9', 'aktif', '2026-07-15 13:58:28'),
(3, 1, 'Nepal Van Java', 'Desa wisata dengan panorama Gunung Sumbing.', 'Dusun Butuh, Kaliangkrik', 'nepal-van-java.jpg', 'Rp10.000', '06.00 - 18.00', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16'),
(4, 2, 'Candi Borobudur', 'Candi Borobudur adalah kompleks candi Buddha terbesar di dunia, yang terletak di Kabupaten Magelang, Jawa Tengah, berjarak sekitar 40 km barat laut Yogyakarta. Dibangun pada abad ke-8 oleh Dinasti Syailendra, situs Warisan Dunia UNESCO ini memiliki 72 stupa dan ribuan panel relief yang memukau.', 'Jl. Badrawati, Kw. Candi Borobudur, Borobudur, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah', 'a5271a76b749958c60df75c559948b57.jpeg', 'Rp50.000', '06.30 - 16.30', 'https://maps.app.goo.gl/afWjp4CKqJznBEU88', 'aktif', '2026-07-20 16:42:16'),
(5, 2, 'Candi Mendut', 'Candi Buddha bersejarah di Magelang.', 'Mendut, Mungkid', 'mendut.jpg', 'Rp20.000', '07.00 - 17.00', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16'),
(6, 3, 'Bukit Rhema (Gereja Ayam)', 'Gereja Ayam adalah sebuah bangunan tempat doa umat Kristen yang terletak di Desa Karangrejo, Kecamatan Borobudur, Kabupaten Magelang, Provinsi Jawa Tengah, Indonesia. Bangunan ini populer disebut Gereja Ayam karena bentuk kepalanya menyerupai ayam, meskipun perancangnya, Daniel Alamsyah, menegaskan bahwa bentuknya sebenarnya adalah burung merpati sebagai simbol perdamaian dan doa bagi segala bangsa.', 'Karangrejo Gombong, Kurahan, Kembanglimus, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah 56553', '8ad95f3ffc556828cda9b89fc37b6d7c.jpeg', 'Rp25.000', '05.00 - 18.00', 'https://maps.app.goo.gl/g7FEJsRXh1TdUYEK6', 'aktif', '2026-07-20 16:42:16'),
(7, 4, 'Museum Samudraraksa', 'Museum Samudra Raksa atau Museum Kapal Samudraraksa adalah museum bahari yang terletak dalam Taman Wisata Candi Borobudur. Lokasi Museum Samudra Raksa masuk dalam wilayah Kecamatan Borobudur, Kabupaten Magelang. Museum ini menampilkan jalur perdagangan bahari antara Indonesia purba, Madagaskar, dan pesisir Afrika Timur, yang mahsyur dijuluki \"Jalur Kayumanis\". Koleksi utama pameran museum ini adalah rekonstruksi Kapal Borobudur dalam ukuran sesungguhnya yang telah menempuh perjalanan napak tilas mengarungi Samudra Hindia dari Jakarta menuju Accra, Ghana pada tahun 2003—2004.', 'Jl. Badrawati, Kw. Candi Borobudur, Borobudur, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah 56553', '5bdbf03e2897982b2a80f83025590280.jpeg', 'Rp25.000', '08.00 - 16.00', 'https://maps.app.goo.gl/vDqKyBBpwymcWwts8', 'aktif', '2026-07-20 16:42:16'),
(8, 5, 'Taman Kyai Langgeng', 'Taman rekreasi keluarga di Kota Magelang.', 'Jl. Cemp. No.6, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56122', '1ef5dd320b659dd966200ea6b52c629f.jpeg', 'Rp30.000', '08.00 - 17.00', 'https://maps.app.goo.gl/a7ufx6U5Eh2UH8VG9', 'aktif', '2026-07-20 16:42:16'),
(9, 6, 'Desa Wisata Candirejo', 'Wisata budaya khas pedesaan Jawa.', 'Borobudur, Magelang', 'candirejo.jpg', 'Rp20.000', '08.00 - 17.00', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16'),
(10, 7, 'Camping Resto Borobudur', 'Pusat kuliner khas Magelang.', 'Banjaran 2, Karanganyar, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah 56553', '0fa73c3d70cbfe7e183305faf809734f.jpeg', 'Gratis', '09.00 - 21.00', 'https://maps.app.goo.gl/t8cuFLJKEtfttTbT6', 'aktif', '2026-07-20 16:42:16'),
(11, 8, 'Agrowisata Salak Ngablak', 'Wisata kebun salak.', 'Ngablak, Magelang', 'salak.jpg', 'Rp15.000', '08.00 - 16.00', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16'),
(12, 9, 'Camping Ground Silancur', 'Area camping dengan panorama Gunung Sumbing.', 'Kaliangkrik, Magelang', 'camping.jpg', 'Rp20.000', '24 Jam', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16'),
(13, 10, 'Svargabumi Borobudur', 'Wisata buatan dengan spot foto estetik.', 'Borobudur, Magelang', 'svargabumi.jpg', 'Rp30.000', '08.00 - 17.00', 'https://maps.google.com/', 'nonaktif', '2026-07-20 16:42:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_destinasi`
--

CREATE TABLE `galeri_destinasi` (
  `galeri_id` int(11) NOT NULL,
  `destinasi_id` int(11) NOT NULL,
  `judul_foto` varchar(150) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_destinasi`
--

INSERT INTO `galeri_destinasi` (`galeri_id`, `destinasi_id`, `judul_foto`, `foto`, `created_at`) VALUES
(2, 2, 'Sunrise Silancur Highland', 'df365a4a86a04a27207db28d3e561976.jpeg', '2026-07-15 14:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `nama_hotel` varchar(150) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `harga_mulai` varchar(50) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `jam_checkin` varchar(20) DEFAULT NULL,
  `jam_checkout` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `nama_hotel`, `alamat`, `telepon`, `email`, `website`, `maps`, `deskripsi`, `gambar`, `created_at`, `harga_mulai`, `rating`, `fasilitas`, `jam_checkin`, `jam_checkout`) VALUES
(1, 'Hotel Puri Asri', 'Jl. Cemp. No.9, Kemirirejo, Kec. Magelang, Jawa Tengah, 56172', '0811365115', 'Hotelpuriasri@gmail.com', 'https://id.trip.com/hotels/central-magelang-hotel-detail-691594/hotel-puri-asri?locale=en-ID&allianceid=14901&sid=17926830&ppcid=adid-83082226281457_akid-dat-2334881661724405:loc-91_adgid-1329311955265071&utm_source=bing&utm_medium=cpc&utm_campaign=5213', 'https://share.google/wGfEeRfvNRQheC0Tv', 'Hotel Puri Asri Magelang adalah resor bintang 5 yang terletak di Jalan Cempaka No.9, Kemirirejo, Magelang. Berdiri di lahan seluas 10 hektar dengan konsep bernuansa alam, hotel ini menawarkan pemandangan Sungai Progo, persawahan, serta Gunung Sumbing. Tempat ini ideal untuk staycation keluarga karena dilengkapi fasilitas seperti kolam renang outdoor dan arena bermain anak.', '6a3ffbc3726651cba16e50eeb78bf13e.jpeg', '2026-06-27 14:15:07', 'Rp550.000 ', '4.6', 'Wifi, Kolam Renang, Restoran, AC, Tempat Parkir, GYM, SPA', '14.00', '12.00'),
(2, 'Hotel Atria', 'Jl. Jend. Sudirman No.42, Tidar Sel., Kec. Magelang Sel., Kota Magelang, Jawa Tengah 56125', '085877859999', 'reservation@atriamagelang.com', ' https://share.google/XDNXnHH85T5QUDhSO', 'https://maps.app.goo.gl/gX6Nc7QTMgUw3cdZ6', 'Hotel Atria Magelang merupakan hotel berbintang yang menawarkan kenyamanan bagi wisatawan maupun pelaku bisnis. Berlokasi strategis di pusat Kota Magelang, hotel ini memiliki akses yang mudah menuju berbagai destinasi wisata seperti Candi Borobudur, Alun-Alun Kota Magelang, dan kawasan kuliner. Hotel ini menyediakan kamar yang modern dan nyaman, dilengkapi dengan berbagai fasilitas seperti kolam renang, restoran, pusat kebugaran, ruang pertemuan, serta layanan resepsionis 24 jam. Dengan pelayanan yang ramah dan fasilitas yang lengkap, Hotel Atria Magelang menjadi pilihan ideal untuk menginap selama berada di Kota Magelang.', '6ce5f7dc989b0d5440c8371281b7913c.jpeg', '2026-07-20 18:06:58', 'Rp 650.000 / malam', '4.4', 'Wifi, Kolam Renang, Restoran, AC, Parkir, Gym, Spa, Lift, Resepsionis 24 Jam, Ruang Meeting, Laundry, Room Service, TV, Air Panas, Coffee Shop', '14:00', '12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`kategori_id`, `kategori_nama`, `kategori_deskripsi`, `created_at`) VALUES
(1, 'Wisata Alam', 'WIsata alam yang ada di Kota Magelang', '2026-06-27 07:42:13'),
(2, 'Wisata Sejarah', 'Destinasi wisata yang memiliki nilai sejarah dan menyimpan berbagai peninggalan bersejarah di wilayah Magelang.', '2026-06-27 07:45:21'),
(3, 'Wisata Religi', 'Destinasi wisata religi yang menjadi tujuan ibadah, ziarah, maupun wisata spiritual di Magelang.', '2026-06-27 07:46:05'),
(4, 'Wisata Edukasi', 'Tempat wisata yang memberikan pengalaman belajar, pengetahuan, dan edukasi bagi seluruh pengunjung.', '2026-06-27 07:47:18'),
(5, 'Wisata Keluarga', 'Tempat rekreasi yang cocok dikunjungi bersama keluarga dengan berbagai fasilitas hiburan.', '2026-06-27 07:48:30'),
(6, 'Wisata Budaya', 'Destinasi wisata yang menampilkan kebudayaan, adat istiadat, seni, dan tradisi khas Magelang.', '2026-06-27 07:49:11'),
(7, 'Wisata Kuliner', 'Kawasan wisata yang menawarkan berbagai kuliner khas Magelang serta makanan tradisional.', '2026-06-27 07:50:03'),
(8, 'Agrowisata', 'Destinasi wisata berbasis pertanian, perkebunan, maupun peternakan yang dapat dinikmati wisatawan.', '2026-06-27 07:51:24'),
(9, 'Camping Ground', 'Area wisata yang menyediakan lokasi berkemah dan aktivitas alam terbuka.', '2026-06-27 07:52:10'),
(10, 'Wisata Buatan', 'Destinasi wisata hasil pengembangan manusia seperti taman rekreasi, wahana permainan, dan taman tematik.', '2026-06-27 07:53:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `kontak_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(200) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `status` enum('belum_dibaca','dibaca') DEFAULT 'belum_dibaca',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`kontak_id`, `nama`, `email`, `subjek`, `pesan`, `status`, `created_at`) VALUES
(1, 'Andi Pratama', 'andi@gmail.com', 'Informasi Tiket Borobudur', 'Halo admin, saya ingin menanyakan harga tiket masuk terbaru untuk Candi Borobudur pada akhir pekan. Terima kasih.', 'belum_dibaca', '2026-06-27 15:41:42'),
(2, 'Siti Rahma', 'siti@gmail.com', 'Jam Operasional Ketep Pass', 'Mohon informasi jam operasional Ketep Pass saat hari libur nasional.', 'dibaca', '2026-06-27 15:41:42'),
(3, 'Budi Santoso', 'budi@gmail.com', 'Kerjasama Promosi Wisata', 'Kami tertarik melakukan kerja sama promosi wisata Magelang melalui media digital. Mohon informasi lebih lanjut.', 'belum_dibaca', '2026-06-27 15:41:42'),
(4, 'Rina Wulandari', 'rina@gmail.com', 'Penginapan Dekat Borobudur', 'Apakah ada rekomendasi hotel atau penginapan yang dekat dengan kawasan Borobudur untuk keluarga?', 'dibaca', '2026-06-27 15:41:42'),
(5, 'Dedi Kurniawan', 'dedi@gmail.com', 'Nepal Van Java', 'Apakah Nepal Van Java buka setiap hari dan apakah tersedia area parkir yang luas?', 'belum_dibaca', '2026-06-27 15:41:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(100) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_email` varchar(100) DEFAULT NULL,
  `pengguna_foto` varchar(255) DEFAULT 'default.png',
  `pengguna_level` enum('superadmin','admin') DEFAULT 'admin',
  `pengguna_status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_foto`, `pengguna_level`, `pengguna_status`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'superadmin', '0192023a7bbd73250516f069df18b500', 'admin@wisatamagelang.com', 'eac8b881f137de5a3fa29bc6842113d5.png', 'superadmin', 'aktif', '2026-06-27 07:42:12', '2026-07-14 07:51:19'),
(4, 'admin ', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'a2b87e8effbdf31477a628f86dd0e4c1.png', 'admin', 'aktif', '2026-07-20 16:27:04', '2026-07-20 16:27:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `tentang_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`tentang_id`, `judul`, `deskripsi`, `visi`, `misi`, `gambar`, `updated_at`) VALUES
(1, 'Tentang Wisata Magelang', 'Wisata Magelang merupakan platform informasi pariwisata yang menyediakan berbagai informasi destinasi wisata, hotel, penginapan, berita wisata, serta informasi pendukung lainnya yang berada di Kabupaten dan Kota Magelang.\r\n\r\nWebsite ini dibuat untuk membantu wisatawan dalam memperoleh informasi yang akurat mengenai objek wisata, fasilitas penginapan, lokasi destinasi, harga tiket masuk, jam operasional, serta informasi terbaru seputar pariwisata di Magelang.\r\n\r\nDengan adanya sistem ini, diharapkan masyarakat dan wisatawan dapat lebih mudah merencanakan perjalanan wisata serta mengenal potensi wisata yang dimiliki oleh Magelang.', 'Menjadi media informasi pariwisata Magelang yang terpercaya, informatif, dan mudah diakses oleh masyarakat serta wisatawan.', '1. Menyediakan informasi destinasi wisata yang lengkap dan akurat.\r\n2. Mempermudah wisatawan dalam menemukan lokasi wisata dan penginapan.\r\n3. Mempromosikan potensi wisata daerah Magelang kepada masyarakat luas.\r\n4. Menyajikan berita dan informasi terbaru seputar pariwisata Magelang.\r\n5. Mendukung perkembangan sektor pariwisata melalui pemanfaatan teknologi informasi.', 'd9068f281c92818449ce72143d389b16.jpeg', '2026-06-27 15:00:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `fk_berita_pengguna` (`pengguna_id`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasi_id`),
  ADD KEY `fk_destinasi_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `galeri_destinasi`
--
ALTER TABLE `galeri_destinasi`
  ADD PRIMARY KEY (`galeri_id`),
  ADD KEY `fk_galeri_destinasi` (`destinasi_id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indeks untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`tentang_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `destinasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `galeri_destinasi`
--
ALTER TABLE `galeri_destinasi`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `kontak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `tentang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_pengguna` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`pengguna_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `fk_destinasi_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_wisata` (`kategori_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galeri_destinasi`
--
ALTER TABLE `galeri_destinasi`
  ADD CONSTRAINT `fk_galeri_destinasi` FOREIGN KEY (`destinasi_id`) REFERENCES `destinasi` (`destinasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
