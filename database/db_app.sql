-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jun 2024 pada 19.05
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(40) NOT NULL DEFAULT 'cart',
  `id_payment` int(11) DEFAULT 0,
  `bukti_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_order`, `id_user`, `tgl_order`, `status`, `id_payment`, `bukti_pembayaran`) VALUES
(1, '179MS.vEmcqPw', 6, '2024-06-15 14:29:22', 'Selesai', 1, '0'),
(2, '17Sw4ITcU95FQ', 6, '2024-06-15 14:33:26', 'Ditolak', 1, '0'),
(3, '17W/0maY7fi/M', 6, '2024-06-15 14:34:29', 'Pembayaran', 1, '666e33d4718e3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_detail`, `id_order`, `id_product`, `qty`) VALUES
(1, '179MS.vEmcqPw', 2, 1),
(2, '179MS.vEmcqPw', 8, 1),
(3, '179MS.vEmcqPw', 6, 1),
(4, '17Sw4ITcU95FQ', 3, 1),
(6, '17W/0maY7fi/M', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Skincare'),
(2, 'Bodycare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(1, 'Bank BCA', '7425372432', 'Rizka Maelani Solikhin'),
(2, 'mandiri', '1730014285242', 'Rizka Maelani solikhin'),
(3, 'DANA', '08978826548', 'Rizka Maelani Solikhin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(40) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_product` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_product`, `nama_product`, `id_kategori`, `harga`, `deskripsi`, `foto_product`, `tanggal`) VALUES
(1, 'Day Cream', 1, 100000, 'No BPOM : (90)MD123456123456(91)230312 . Isi : 10 Gram. Day cream ini untuk pemakaian siang hari sudah ada spf 30+++ yang membantu melindungi kulit dari paparan sinar matahari yang buruk, untuk penggunaanya sesudah pemakaian serum/toner.\r\nDidalamnya sudah terdapat kandungan beeswax, zinc, niacinamide, Salacylic acid, tea tree oil, membantu menyamarkan noda hitam, mencegah timbulnya jerawat, memudarkan bekas jerawat, menyamarkan garis halus, memperlambat penuanan\r\ndini, mengecilkan pori-pori, melembabkan, mencerahkan dan memutihkan kulit wajah. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e4974394cd.png', '2024-06-09'),
(2, 'Toner', 1, 85000, 'No BPOM : 18231201058. Isi : 60ml. Toner ini untuk membersihkan kulit wajah dari sisa makeup, debu, kotoran, dan menyegarkan kulit. Mengandung Camellia sinensis\r\nleaf extract dan carica papaya fruit extract until melembabkan, serta menutrisi wajah, sehingga wajah tampak cerah dan lembab. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e4981b2579.png', '2024-06-09'),
(3, 'Lulur', 2, 115000, 'No BPOM : BPOM NA 182230100039. Isi : 150 Gram. Body scrub ini mengandung berbagai bahan alami seperti honey, collagen, hydrogenated coconut oil, dan citric acid. Kombinasi bahan-bahan ini membantu melembabkan kulit, mencerahkan, dan membersihkan kotoran yang menempel pada kulit. Penggunaan body scrub secara teratur akan membuat kulit terasa lebih halus, lembut, dan tampak lebih cerah. Kandungan honey dan collagen bekerja untuk memperbaiki tekstur kulit dan memberikan kelembaban yang tahan lama, sementara citric acid membantu eksfoliasi sel kulit mati untuk kulit yang tampak lebih bersih dan bercahaya.\r\n', '666d0ab66f329.png', '2024-06-09'),
(4, 'Lotion', 2, 60000, 'No BPOM : BPOM NA 182230100039. Isi : 100 ml. Body lotion ini mengandung SPF 30+++ yang memberikan perlindungan maksimal terhadap sinar matahari yang berbahaya. Selain itu, lotion ini juga memiliki efek moisturizing dan brightening berkat kandungan niacinamide, alpha arbutin, aloevera, dan honey. Penggunaan body lotion ini secara rutin akan membantu melembabkan kulit tanpa rasa lengket, serta membuat kulit tampak lebih sehat, cerah, dan lembut. Aloe vera dan honey dalam formulasi lotion ini berfungsi untuk memberikan kelembaban yang mendalam, menjaga elastisitas kulit, dan memberikan sensasi segar sepanjang hari.', '666d0aab43c5d.png', '2024-06-15'),
(5, 'Night Cream', 1, 90000, 'No BPOM : (90)NA18230112845. Isi : 10 Gram. Night cream untuk pemakaian malam hari, didalamnya sudah ada kandungan aloevera, tea tree oil, chamomile extract, niacinamide, yang membantu menyamarkan noda hitam, mencegah timbulnya jerawat, memudarkan bekas jerawat, menyamarkan garis halus, memperlambat penuanan dini, mengecilkan pori-pori, melembabkan, mencerahkan dan memutihkan kulit wajah. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e49902cae6.png', '2024-06-15'),
(6, 'Serum', 1, 115000, 'No BPOM :  18220101663. Isi  : 10ml. Serum untuk pemakaian malam hari sebelum menggunakan night cream, didalamnya sudah ada kandungan serum, vitamin c, firming, moisturizing, niacinamide, mulberry, alpha arbutin, manfaatnya bisa membantu melembabkan kulit, menyamarkan noda hitam, membuat kulit lebih bersih, halus dan terawat. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e49abee357.png', '2024-06-15'),
(7, 'Acne Spot Treatment', 1, 60000, 'No BPOM : NA18230113773. Isi  : 5ml. Acne spot treatment hadir untuk menghilangkan jerawat yang seringkali datang tak diundang dalam kehidupanmu. Kandungan salicylic acid dan vitex agnus castus extract dapat menyembuhkan jerawat dalam waktu singkat dan dengan menghadirkan sensasi dingin selama penggunaan.\r\ncara penggunaan dapat dilakukan 2-3 kali sehari setelah mencuci muka pada siang hari dan setelah menggunakan toner pada malam hari, cukup ditotol/dioles di area kulit yang berjerawat saja, insyaallah jerawat akan kempes dan tidak sempat meradang. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e49cd030cb.png', '2024-06-15'),
(8, '1 Paket Lotion', 2, 120000, 'Promo untuk para pembeli setia YPA.CO BEAUTY kita ada promo special yaitu beli 2 lotion gratis 1. Isi  : 100ml. Body lotion ini mengandung SPF 30+++ yang memberikan perlindungan maksimal terhadap sinar matahari yang berbahaya. Selain itu, lotion ini juga memiliki efek moisturizing dan brightening berkat kandungan niacinamide, alpha arbutin, aloevera, dan honey. Penggunaan body lotion ini secara rutin akan membantu melembabkan kulit tanpa rasa lengket, serta membuat kulit tampak lebih sehat, cerah, dan lembut. Aloe vera dan honey dalam formulasi lotion ini berfungsi untuk memberikan kelembaban yang mendalam, menjaga elastisitas kulit, dan memberikan sensasi segar sepanjang hari.', '666e49e330b7d.png', '2024-06-15'),
(9, '1 Paket Jasvil', 1, 300000, 'Satu paket jasvil ini berisi : Toner, Soap Bar, Day Cream, Night Cream, dan free Pouch hitam', '666e4b14d27b1.png', '2024-06-15'),
(10, '1 Paket Jasvil + Serum', 1, 415000, 'Satu paket ini berisi : Toner, Soap Bar, Day Cream, Night Cream, Serum, dan free Pouch hitam', '666e4b20dbb7c.png', '2024-06-15'),
(11, 'Facial Wash Jasvil', 1, 85000, 'Isi : 100ml. Manfaatnya bisa mencerahkan, menyegarkan, mengangkat kotoran di wajah, membuat wajah tampak lebih bersih, lebih fresh dan pastinya praktis di bawa ke kantor, traveling atau kemanapun. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e4b436210b.png', '2024-06-15'),
(12, 'Rice Soap Bar Thailand', 1, 40000, 'Sabun Beras Susu , Original Thailand Kandungannya : Rice Milk Soap ( Gluta + Collagen ) dan Jam Milk Soap. Produk ORIGINAL dari thailand yang bisa membersihkan dan mencerahkan kulit, menghilangkan bintik-bintik hitam, menghaluskan kulit, membuat kulit lembab berseri-seri, berfungsi untuk menjadikan kulit lebih halus, bebas kotoran, dan kenyal, menghilangkan bekas jerawat dan jerawat, berfungsi meninggalkan bekas make up pada wajah, berfungsi mencerahkan ketiak hitam, celah-celah paha dan lutut, serta siku hitam, aman untuk semua jenis kulit termasuk kulit kering dan kulit sensitif, dapat digunakan untuk kulit wajah dan tubuh, dapat menghilangkan BB alias Bau Badan. Ini juga pastinya Halal, BPOM dan aman untuk Bumil dan Busui.', '666e4b967ff52.png', '2024-06-15'),
(13, '1 Paket Bodycare', 2, 165000, 'Isinya terdiri dari : Lulur dan Lotion, yang merupakan komponen combo yang sangat cepat dalam membantu mencerahkan badan. ', '666d96d0abb37.jpeg', '2024-06-15'),
(14, 'Soap Bar Jasvil', 1, 40000, 'No BPOM : NA18230500056. Isi : 65 Gram.  Sabun batang ini dirancang khusus dengan kandungan beras yang kaya akan asam lemak esensial seperti linoleic acid dan oleic acid. Kedua asam lemak ini sangat bermanfaat untuk menjaga kelembaban alami kulit, sehingga kulit terasa lebih lembab dan halus. Selain itu, sabun ini juga mengandung coconut oil, yang dikenal luas akan khasiatnya dalam melembabkan kulit secara mendalam. Penggunaan coconut oil dalam sabun ini memastikan kulit Anda tidak merasa kering atau tertarik baik saat pemakaian maupun setelahnya, memberikan pengalaman mandi yang menyenangkan dan hasil kulit yang lembut serta terhidrasi.\r\n', '666e4ba6e24b7.png', '2024-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_lengkap`, `email`, `password`, `no_telp`, `alamat`, `role`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin123', '085678923875', 'Indonesia', 'admin'),
(5, 'Test', 'test@gmail.com', 'test1234', '088809823755', 'Jl Cikoko Barat Raya', 'member'),
(6, 'Rizka maelani solikhin', 'rizka@gmail.com', '123', '08978826548', 'Perum tiraimas Desa duren, kec. klari, kab.karawang', 'member'),
(7, 'Aistina', 'aistinaaliyazahra@gmail.com', '12345', '0897888888888', 'wadas', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
