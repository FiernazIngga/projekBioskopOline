-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2025 at 06:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskopweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

DROP TABLE IF EXISTS `admin_data`;
CREATE TABLE `admin_data` (
  `id_admin` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id_admin`, `username`, `password`) VALUES
(1, 'upn', '123');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

DROP TABLE IF EXISTS `riwayat`;
CREATE TABLE `riwayat` (
  `id_riwayat` int NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_video` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_video`, `tanggal`) VALUES
(1, 'usr_68fa3463db0ee_20251023', '35', '2025-11-06 15:18:18'),
(2, 'usr_68fa3463db0ee_20251023', '39', '2025-11-12 00:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `role_user` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Free',
  `expired_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `id_user`, `role_user`, `expired_at`) VALUES
(1, 'usr_68fa3463db0ee_20251023', 'Basic', '2026-04-06 05:24:21'),
(2, 'usr_68fa3637bc364_20251023', 'Basic', '2025-12-03 12:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `simpan_film`
--

DROP TABLE IF EXISTS `simpan_film`;
CREATE TABLE `simpan_film` (
  `id_simpan` int NOT NULL,
  `id_film` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simpan_film`
--

INSERT INTO `simpan_film` (`id_simpan`, `id_film`, `id_user`) VALUES
(12, '36', 'usr_68fa3463db0ee_20251023'),
(13, '38', 'usr_68fa3463db0ee_20251023'),
(14, '44', 'usr_68fa3463db0ee_20251023'),
(15, '35', 'usr_68fa3463db0ee_20251023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_profil` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `email`, `foto_profil`) VALUES
('usr_68fa3463db0ee_20251023', 'Prada Bimaya Ardi', 'admin', '123', 'prada@gmail.com', 'usr_68fa3463db0ee_20251023_1761228323.jpg'),
('usr_68fa3637bc364_20251023', 'Albertus Ali Edited', 'user', '123', 'albertus@gmail.com', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) DEFAULT 'basic',
  `jumlah_view` int DEFAULT '0',
  `jumlah_perating` int DEFAULT '0',
  `rating` int DEFAULT '0',
  `trailer` varchar(255) DEFAULT NULL,
  `indexPencarian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `sinopsis`, `file_video`, `thumbnail`, `genre`, `durasi`, `tanggal_upload`, `role`, `jumlah_view`, `jumlah_perating`, `rating`, `trailer`, `indexPencarian`) VALUES
(38, 'Captain America USA', 'Steve Rogers adalah seorang pemuda yang lemah secara fisik namun berhati mulia. Ia direkrut untuk program super soldier dan berubah menjadi Captain America. Bersama sekutunya, ia melawan organisasi jahat HYDRA. Ia harus menyeimbangkan kehidupan sebagai pahlawan dan teman-temannya. Pertempuran dan pengorbanan menjadi bagian dari perjuangannya untuk keadilan.', '1762349006_bahan.mp4', '1762349006_captainamerica.jpg', 'Action, Super Hero', '1 Jam 30 Menit', '2025-11-05 20:23:26', 'Premium', 0, 0, 0, '1762349006_bahan.mp4', 'Captain America aksi petualangan Marvel Studios 2011 Steve Rogers pahlawan super HYDRA perjuangan keberanian pengorbanan'),
(39, 'Detective Conan', 'Shinichi Kudo adalah detektif remaja jenius. Ia diserang organisasi misterius dan tubuhnya mengecil menjadi anak-anak. Dengan nama Conan Edogawa, ia menyelesaikan berbagai kasus kriminal. Bersama teman dan ayahnya, ia berusaha menemukan identitas asli pelaku. Setiap kasus menantang kecerdikannya dan membawanya lebih dekat pada organisasi jahat.', '1762349069_bahan.mp4', '1762349069_detectiveconan.jpg', 'Animasi, Mistery, Comedy', '1 Jam 30 Menit', '2025-11-05 20:24:29', 'Basic', 2, 0, 0, '1762349069_bahan.mp4', 'Detective Conan misteri kriminal Jepang Gosho Aoyama 1996 Shinichi Kudo Conan Edogawa detektif cerdas kasus penyelidikan organisasi rahasia'),
(40, 'F1', 'Film ini mengikuti dunia balap Formula 1 yang penuh tekanan. Para pembalap harus menghadapi kecepatan, strategi tim, dan risiko besar di setiap lintasan. Rivalitas antar pembalap dan konflik pribadi menambah ketegangan. Kamera menyorot aksi balap yang menegangkan dan drama di balik layar. Kemenangan di akhir lomba menjadi puncak perjuangan dan dedikasi mereka.', '1762349138_bahan.mp4', '1762349138_f1.jpg', 'Action, Sports', '1 Jam 30 Menit', '2025-11-05 20:25:38', 'Premium', 0, 0, 0, '1762349138_bahan.mp4', 'F1 balap olahraga Formula 1 Studio 2013 balap mobil cepat rivalitas strategi tim adrenalin kecepatan kemenangan persaingan'),
(41, 'F9', 'Dom Toretto dan timnya menghadapi ancaman baru dari keluarga musuh lama. Mereka harus menjalankan misi berbahaya demi keselamatan dunia. Mobil-mobil super dan aksi ekstrem menjadi fokus cerita. Persahabatan dan loyalitas diuji di setiap langkah. Akhirnya, mereka menemukan cara mengalahkan musuh sambil menjaga ikatan keluarga.', '1762349193_bahan.mp4', '1762349193_f9.jpg', 'Action, Sports', '1 Jam 30 Menit', '2025-11-05 20:26:33', 'Premium', 0, 0, 0, '1762349193_bahan.mp4', 'F9 aksi petualangan Universal Pictures 2021 Dom Toretto mobil ekstrem musuh lama misi berbahaya persahabatan loyalitas pertarungan'),
(42, 'Final Destination', 'Sekelompok remaja selamat dari kecelakaan maut karena firasat salah satu dari mereka. Namun, kematian tampaknya mengejar mereka satu per satu. Setiap kematian berlangsung dengan cara yang mengerikan dan tak terduga. Mereka berusaha mencari cara menghindari takdir yang sudah ditetapkan. Ketegangan meningkat karena rasa takut dan paranoia terus menghantui.', '1762349244_bahan.mp4', '1762349244_finaldestination.jpg', 'Triller, Horror, Action', '2 Jam 10 Menit', '2025-11-05 20:27:24', 'Premium', 0, 0, 0, '1762349244_bahan.mp4', 'Final Destination horor thriller New Line Cinema 2000 remaja firasat kematian takdir ketegangan paranoia keselamatan'),
(43, 'Johny English', 'Johnny English adalah agen rahasia yang kikuk tapi penuh keberanian. Ia ditugaskan menyelamatkan negara dari ancaman internasional. Meski sering membuat kesalahan, instingnya kadang menyelamatkan situasi. Perpaduan aksi dan komedi membuat misi-misinya lucu dan seru. Pada akhirnya, keberaniannya membawa kemenangan meski dengan cara yang tak biasa.', '1762349293_bahan.mp4', '1762349293_johnyenglish.jpg', 'Comedy, Action, Mistery', '2 Jam 10 Menit', '2025-11-05 20:28:13', 'Premium', 0, 0, 0, '1762349293_bahan.mp4', 'Johnny English komedi aksi Studio Universal 2003 agen rahasia kikuk misi internasional keberanian kesalahan lucu insting kemenangan'),
(44, 'Jumbo', 'Seorang anak kecil berteman dengan gajah raksasa di sirkus. Persahabatan mereka diuji ketika pihak sirkus ingin mengeksploitasi gajah itu. Anak dan gajah bekerja sama untuk mengatasi bahaya dan melindungi satu sama lain. Cerita penuh kehangatan dan petualangan seru. Nilai persahabatan dan keberanian menjadi inti cerita.', '1762349394_bahan.mp4', '1762349394_jumbo.jpg', 'Animasi,  Comedy, Family', '1 Jam 45 Menit', '2025-11-05 20:29:54', 'Premium', 0, 0, 0, '1762349394_bahan.mp4', 'Jumbo petualangan keluarga Sirkus Studio 2008 anak gajah raksasa persahabatan bahaya keberanian kehangatan'),
(45, 'Mission Imposible', 'Ethan Hunt adalah agen IMF yang menghadapi misi hampir mustahil. Ia harus menyelamatkan dunia dari ancaman besar sambil menghadapi pengkhianatan. Dengan timnya, ia mengeksekusi rencana penuh aksi dan kecerdikan. Setiap misi menuntut keberanian dan ketelitian tinggi. Ketegangan dan adrenalin membuat setiap aksi terasa nyata.', '1762349467_bahan.mp4', '1762349467_misssionimposible.jpg', 'Action, Mistery, Horror', '2 Jam 10 Menit', '2025-11-05 20:31:07', 'Premium', 0, 0, 0, '1762349467_bahan.mp4', 'Mission Impossible aksi spionase Paramount Pictures 1996 Ethan Hunt agen IMF misi mustahil pengkhianatan keberanian'),
(46, 'Monster Inc', 'Mike dan Sulley bekerja di pabrik monster yang menghasilkan energi dari teriakan anak-anak. Kehidupan mereka berubah ketika seorang anak manusia masuk ke dunia monster. Mereka berusaha melindungi anak itu sambil menjaga rahasia dunia mereka. Persahabatan diuji dalam situasi sulit dan menegangkan. Akhirnya, mereka menemukan cara baru untuk mendapatkan energi dengan lebih menyenangkan.', '1762349505_bahan.mp4', '1762349505_monsterinc.jpg', 'Animasi,  Comedy, Family', '1 Jam 45 Menit', '2025-11-05 20:31:45', 'Premium', 0, 0, 0, '1762349505_bahan.mp4', 'Monster Inc animasi komedi Pixar 2001 Mike Sulley anak manusia teriakan pabrik monster persahabatan rahasia energi'),
(47, 'Running Man', 'Dalam dunia dystopian, peserta diwajibkan mengikuti permainan mematikan untuk hiburan publik. Mereka diburu oleh pemburu profesional di arena berbahaya. Setiap strategi dan pergerakan bisa menentukan hidup atau mati. Tokoh utama berjuang untuk bertahan hidup sekaligus mengungkap konspirasi di balik permainan. Aksi dan ketegangan menjadi inti cerita.', '1762349578_bahan.mp4', '1762349578_runningman.jpg', 'Action, Fantasy, Super Power', '2 Jam 10 Menit', '2025-11-05 20:32:58', 'Premium', 0, 0, 0, '1762349578_bahan.mp4', 'Running Man aksi thriller Studio Sci-Fi 1987 dystopian permainan mematikan peserta pemburu strategi bertahan hidup konspirasi'),
(48, 'Spiderman Home Run', 'Peter Parker digigit laba-laba radioaktif dan mendapatkan kekuatan super. Ia belajar menggunakan kekuatan untuk melindungi kota New York. Konflik dengan musuh seperti Green Goblin menguji keberaniannya. Kehidupan pribadinya juga penuh tantangan antara cinta dan tanggung jawab. Pesan moral: dengan kekuatan besar datang tanggung jawab besar.', '1762349643_bahan.mp4', '1762349643_spidermanhomerun.jpg', 'Action, Fantasy, Super Power', '1 Jam 45 Menit', '2025-11-05 20:34:03', 'Premium', 0, 0, 0, '1762349643_bahan.mp4', 'Spider-Man aksi superhero Marvel Studios 2002 Peter Parker laba-laba kekuatan super New York Green Goblin keberanian cinta tanggung jawab'),
(49, 'Superman', 'Clark Kent datang ke Bumi dari planet Krypton dan memiliki kekuatan super. Ia memutuskan melindungi umat manusia dari ancaman jahat. Kekuatan super dan moralitasnya diuji saat melawan musuh kuat. Kisahnya mengajarkan keberanian, keadilan, dan pengorbanan. Ia menjadi simbol harapan bagi seluruh dunia.', '1762349678_bahan.mp4', '1762349678_superman.jpg', 'Action, Fantasy, Super Power', '1 Jam 30 Menit', '2025-11-05 20:34:38', 'Basic', 0, 0, 0, '1762349678_bahan.mp4', 'Superman aksi superhero Warner Bros 1978 Clark Kent Krypton kekuatan super melindungi manusia keadilan keberanian pengorbanan simbol harapan'),
(50, 'The Conjuring', 'Pasangan Ed dan Lorraine Warren menghadapi kasus paranormal yang menakutkan. Mereka menyelidiki rumah berhantu dan mencoba membantu keluarga yang terancam. Kejadian mengerikan dan supranatural menimbulkan ketegangan tinggi. Keahlian mereka diuji menghadapi roh jahat. Cerita penuh kengerian dan misteri yang menegangkan.', '1762349710_bahan.mp4', '1762349710_theconjuring.jpg', 'Horror, Triller', '1 Jam 45 Menit', '2025-11-05 20:35:10', 'Basic', 0, 0, 0, '1762349710_bahan.mp4', 'The Conjuring horor paranormal Warner Bros 2013 Ed Lorraine Warren paranormal rumah berhantu keluarga ketegangan supranatural misteri'),
(51, 'Top Gun', 'Pete “Maverick” Mitchell adalah pilot muda berbakat tapi berani nekat. Ia diterima di sekolah elit Top Gun untuk melatih kemampuan tempur udara. Rivalitas, persahabatan, dan cinta muncul di tengah kompetisi sengit. Misi berbahaya menguji keterampilan dan mentalnya. Akhirnya, Maverick membuktikan dirinya sebagai pilot top sekaligus belajar tanggung jawab.', '1762349758_bahan.mp4', '1762349758_topgun.jpg', 'Action, Triller', '1 Jam 30 Menit', '2025-11-05 20:35:58', 'Premium', 0, 0, 0, '1762349758_bahan.mp4', 'Top Gun aksi militer Paramount Pictures 1986 Pete Maverick Mitchell pilot sekolah elit udara rivalitas persahabatan cinta misi berbahaya'),
(52, 'Toy Story 4', 'Woody dan teman mainannya menghadapi petualangan baru saat mainan baru muncul. Persahabatan diuji dan mereka harus belajar melepaskan serta menerima perubahan. Bonnie dan mainannya menghadapi tantangan yang tak terduga. Aksi dan humor berpadu dengan emosi yang menyentuh. Cerita menekankan arti persahabatan dan pertumbuhan.', '1762349796_bahan.mp4', '1762349796_toystory4.jpg', 'Animasi,  Comedy, Family', '2 Jam 10 Menit', '2025-11-05 20:36:36', 'Premium', 0, 0, 0, '1762349796_bahan.mp4', 'Toy Story 4 animasi petualangan Pixar 2019 Woody teman mainan persahabatan humor emosi pertumbuhan perubahan Bonnie'),
(53, 'Transformers', 'Robot alien Autobots dan Decepticons bertempur di Bumi untuk mendapatkan artefak penting. Sam Witwicky terlibat secara tidak sengaja dalam konflik besar. Pertempuran epik dan efek visual spektakuler menghiasi film. Persahabatan manusia dan robot menjadi inti cerita. Akhirnya, kebaikan berusaha mengalahkan kejahatan yang mengancam dunia.', '1762349842_bahan.mp4', '1762349842_transformers.jpg', 'Action, Fantasy, Super Power', '1 Jam 30 Menit', '2025-11-05 20:37:22', 'Premium', 0, 0, 0, '1762349842_bahan.mp4', 'Transformers aksi sci-fi Paramount Pictures 2007 Autobots Decepticons Sam Witwicky robot alien pertarungan epik efek visual manusia kebaikan kejahatan'),
(54, 'Zootopia', 'Judy Hopps, kelinci polisi pertama di Zootopia, ingin membuktikan kemampuannya. Ia bekerjasama dengan rubah licik, Nick Wilde, untuk memecahkan kasus misterius. Kota penuh hewan menjadi tempat petualangan dan misteri. Cerita menghadirkan humor, aksi, dan pesan moral tentang toleransi. Akhirnya, kasus terpecahkan dan persahabatan mereka semakin kuat.', '1762349874_bahan.mp4', '1762349874_zootopia.jpg', 'Animasi,  Comedy, Family', '2 Jam 10 Menit', '2025-11-05 20:37:54', 'Premium', 0, 0, 0, '1762349874_bahan.mp4', 'Zootopia animasi komedi Disney 2016 Judy Hopps Nick Wilde kelinci rubah polisi misteri kasus kota hewan humor aksi toleransi persahabatan'),
(55, 'Baby Bos Edited', 'Seorang bayi misterius muncul dengan misi rahasia. Kakaknya harus bekerja sama untuk menjaga rahasia itu dari orang dewasa. Petualangan kocak dan lucu terjadi di rumah dan kantor. Cerita mengajarkan nilai keluarga dan kerja sama. Akhirnya, rahasia bayi terungkap dengan cara menyenangkan tapi penuh tawa.', '1762445108_bahan.mp4', '1762445108_babybos.jpg', 'Animasi,  Comedy, Family', '1 Jam 30 Menit', '2025-11-06 23:05:08', 'Basic', 0, 0, 0, '1762445108_bahan.mp4', 'Baby Boss animasi keluarga DreamWorks 2017 bayi misterius misi rahasia kakak petualangan lucu keluarga kerja sama tawa rumah kantor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `simpan_film`
--
ALTER TABLE `simpan_film`
  ADD PRIMARY KEY (`id_simpan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `video` ADD FULLTEXT KEY `judul` (`judul`,`sinopsis`,`genre`);
ALTER TABLE `video` ADD FULLTEXT KEY `indexPencarian` (`indexPencarian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `simpan_film`
--
ALTER TABLE `simpan_film`
  MODIFY `id_simpan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
