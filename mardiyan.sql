/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 127.0.0.1:3306
 Source Schema         : mardiyan

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/09/2024 11:44:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  `id_detail_penjualan` int NOT NULL AUTO_INCREMENT,
  `id_variasi` int NOT NULL,
  `harga_beli` decimal(10, 2) NOT NULL,
  `harga_jual` decimal(10, 2) NOT NULL,
  `id_akun` int NOT NULL,
  `kode_penjualan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keranjang` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_penjualan`) USING BTREE,
  INDEX `id_variasi`(`id_variasi` ASC) USING BTREE,
  INDEX `id_akun`(`id_akun` ASC) USING BTREE,
  INDEX `kode_penjualan`(`kode_penjualan` ASC) USING BTREE,
  CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_variasi`) REFERENCES `variasi_produk` (`id_variasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `pengguna` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan
-- ----------------------------
INSERT INTO `detail_penjualan` VALUES (1, 5, 70000.00, 850000.00, 13, 'KD99232', '0', 2);
INSERT INTO `detail_penjualan` VALUES (14, 5, 700000.00, 850000.00, 13, 'INV-7331513', '0', 2);
INSERT INTO `detail_penjualan` VALUES (15, 5, 700000.00, 850000.00, 13, 'INV-7331513', '0', 1);
INSERT INTO `detail_penjualan` VALUES (19, 3, 100000.00, 120000.00, 13, 'INV-4154313', '0', 2);
INSERT INTO `detail_penjualan` VALUES (20, 11, 1400000.00, 1599000.00, 13, NULL, '1', 1);

-- ----------------------------
-- Table structure for gambar_produk
-- ----------------------------
DROP TABLE IF EXISTS `gambar_produk`;
CREATE TABLE `gambar_produk`  (
  `id_gambar` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_produk` int NOT NULL,
  PRIMARY KEY (`id_gambar`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  CONSTRAINT `gambar_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gambar_produk
-- ----------------------------
INSERT INTO `gambar_produk` VALUES (7, 'd6929b9a-e67a-4a60-acd1-766815e9f3ce.jpg', 4);
INSERT INTO `gambar_produk` VALUES (8, '09305781-10f9-44fc-92eb-f955361a508b.jpg', 4);
INSERT INTO `gambar_produk` VALUES (9, '986550af-26ca-4cea-8a98-982acf4a57a6.jpg', 4);
INSERT INTO `gambar_produk` VALUES (10, '7a1ecd4d-7ea9-47ce-8f84-3c40349ee490.jpg', 4);
INSERT INTO `gambar_produk` VALUES (11, '6e18d93d-0768-4ee6-8967-f68b519016ab.jpg', 1);
INSERT INTO `gambar_produk` VALUES (12, '23a65bff-7b6d-47cb-9afc-659e77291869.jpg', 1);
INSERT INTO `gambar_produk` VALUES (13, 'ebefdf96-ef9d-4bf3-83cc-68f7db4b2b89.jpg', 1);
INSERT INTO `gambar_produk` VALUES (14, '01673510-dbfb-4af7-b3c9-fed09d039a34.jpg', 3);
INSERT INTO `gambar_produk` VALUES (15, '13eb8049-3005-4bd1-9f5a-d28c9f27cbbd.jpg', 3);
INSERT INTO `gambar_produk` VALUES (16, '27ef18e2-553c-4ba3-bba7-64f4f7301ae4.jpg', 3);
INSERT INTO `gambar_produk` VALUES (17, '196cf560-65f6-4db2-a1b4-2e4c10822629.jpg', 5);
INSERT INTO `gambar_produk` VALUES (18, '6f4c79de-23af-45f8-afe1-36839e977ef9.jpg', 5);
INSERT INTO `gambar_produk` VALUES (19, 'fcf71ea5-e8d4-4aa7-8f99-55d87f13ebd6.jpg', 5);

-- ----------------------------
-- Table structure for merk
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk`  (
  `id_merk` int NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_merk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of merk
-- ----------------------------
INSERT INTO `merk` VALUES (2, 'Adidas');
INSERT INTO `merk` VALUES (3, 'Nike');
INSERT INTO `merk` VALUES (4, 'Puma');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `city_id` int NULL DEFAULT NULL,
  `province_id` int NULL DEFAULT NULL,
  `kode_pos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_akun` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE,
  INDEX `id_akun`(`id_akun` ASC) USING BTREE,
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `pengguna` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 'Nur Ajah', 'Jakarta Utara Blok M', 155, 6, '51352', '085225796739', 13);

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `jumlah` int NOT NULL,
  `harga_beli` decimal(10, 2) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `id_variasi` int NOT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE,
  INDEX `id_variasi`(`id_variasi` ASC) USING BTREE,
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_variasi`) REFERENCES `variasi_produk` (`id_variasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (1, 10, 700000.00, '2024-08-12', 5);
INSERT INTO `pembelian` VALUES (3, 3, 100000.00, '2024-08-02', 3);
INSERT INTO `pembelian` VALUES (4, 20, 1400000.00, '2024-08-22', 11);
INSERT INTO `pembelian` VALUES (5, 2, 900000.00, '2024-08-22', 1);
INSERT INTO `pembelian` VALUES (6, 2, 1800000.00, '2024-08-22', 10);
INSERT INTO `pembelian` VALUES (7, 2, 1400000.00, '2024-08-22', 12);

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_akun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin');
INSERT INTO `pengguna` VALUES (13, 'nur@gmail.com', 'ed1e56ef963bb91c45a14a50c2f3cd95', 'pelanggan');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `kode_penjualan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pelanggan` int NOT NULL,
  `total` decimal(10, 2) NOT NULL,
  `tanggal_penjualan` date NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengiriman` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE,
  INDEX `penjualan_ibfk_1`(`id_pelanggan` ASC) USING BTREE,
  INDEX `kode_penjualan`(`kode_penjualan` ASC) USING BTREE,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`kode_penjualan`) REFERENCES `detail_penjualan` (`kode_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (2, 'INV-7331513', 1, 2564000.00, '2024-08-21', 'Dikirim', 'BRI', 'YES', 'LV890721544CN');
INSERT INTO `penjualan` VALUES (5, 'INV-4154313', 1, 258000.00, '2024-08-22', 'Ditahan', 'Shopeepay', 'REG', NULL);

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_merk` int NULL DEFAULT NULL,
  `harga_beli` decimal(10, 2) NULL DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `harga_jual` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE,
  INDEX `id_merk`(`id_merk` ASC) USING BTREE,
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 'ADIDAS SUPERSTAR EG4958', 2, 900000.00, '<p>Brand New with Tag / Box<br>100% Original Authentic<br>100% Trusted since 2016<br><br>Semua produk yang dijual telah melalui tahap pengecekan keaslian dan kondisi fisik oleh staff ahli kami</p>', 1020000.00);
INSERT INTO `produk` VALUES (3, 'Nike P-6000 PRM Triple Black Men (100% Authentic)', 3, 1800000.00, '<p>Brand New with Tag / Box<br>100% Original Authentic<br>100% Trusted since 2016<br><br>Semua produk yang dijual telah melalui tahap pengecekan keaslian dan kondisi fisik oleh staff ahli kami</p>', 1999000.00);
INSERT INTO `produk` VALUES (4, 'ADIDAS RUNNING Galaxy 7 Running Shoes', 2, 700000.00, '<p>Lace up and go. These adidas running shoes will keep you comfortable, however late your day runs. A great everyday shoe, they have a light and airy mesh upper to keep your feet cool and a Cloudfoam midsole for springiness. The rubber outsole is designed to stay firm across all surfaces, from wet grass to slow clay. Switch up your plans without changing your shoes.<br><br>Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste.</p>\r\n<ul>\r\n<li>Regular fit</li>\r\n<li>Lace closure</li>\r\n<li>Textile upper</li>\r\n<li>OrthoLite sockliner</li>\r\n<li>Cloudfoam midsole</li>\r\n<li>Textile lining</li>\r\n</ul>', 850000.00);
INSERT INTO `produk` VALUES (5, 'Palermo Alpine Snow-Puma White', 4, 1400000.00, '<p>Brand New with Tag / Box<br>100% Original Authentic<br>100% Trusted since 2016<br><br>Semua produk yang dijual telah melalui tahap pengecekan keaslian dan kondisi fisik oleh staff ahli kami</p>', 1599000.00);

-- ----------------------------
-- Table structure for variasi_produk
-- ----------------------------
DROP TABLE IF EXISTS `variasi_produk`;
CREATE TABLE `variasi_produk`  (
  `id_variasi` int NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `warna` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_produk` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_variasi`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  CONSTRAINT `variasi_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of variasi_produk
-- ----------------------------
INSERT INTO `variasi_produk` VALUES (1, '41', 'Hitam', 1);
INSERT INTO `variasi_produk` VALUES (3, '43', 'Hitam', 3);
INSERT INTO `variasi_produk` VALUES (4, '39', 'Putih', 4);
INSERT INTO `variasi_produk` VALUES (5, '40', 'Putih', 4);
INSERT INTO `variasi_produk` VALUES (6, '41', 'Putih', 4);
INSERT INTO `variasi_produk` VALUES (7, '42', 'Putih', 4);
INSERT INTO `variasi_produk` VALUES (8, '43', 'Putih', 4);
INSERT INTO `variasi_produk` VALUES (9, '40', 'Putih', 1);
INSERT INTO `variasi_produk` VALUES (10, '40', 'Hitam', 3);
INSERT INTO `variasi_produk` VALUES (11, '41', 'Hitam', 5);
INSERT INTO `variasi_produk` VALUES (12, '40', 'Hitam', 5);

-- ----------------------------
-- View structure for v_keranjang
-- ----------------------------
DROP VIEW IF EXISTS `v_keranjang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_keranjang` AS select `produk`.`nama_produk` AS `nama_produk`,`variasi_produk`.`ukuran` AS `ukuran`,`variasi_produk`.`warna` AS `warna`,`detail_penjualan`.`harga_jual` AS `harga_jual`,`detail_penjualan`.`id_akun` AS `id_akun`,`detail_penjualan`.`id_detail_penjualan` AS `id_detail_penjualan`,`gambar_produk`.`gambar` AS `gambar`,`produk`.`id_produk` AS `id_produk`,`detail_penjualan`.`jumlah` AS `jumlah` from (((`detail_penjualan` join `variasi_produk` on((`detail_penjualan`.`id_variasi` = `variasi_produk`.`id_variasi`))) join `produk` on((`variasi_produk`.`id_produk` = `produk`.`id_produk`))) join `gambar_produk` on((`produk`.`id_produk` = `gambar_produk`.`id_produk`))) where (`detail_penjualan`.`keranjang` = '1') group by `detail_penjualan`.`id_detail_penjualan`;

-- ----------------------------
-- View structure for v_laporanpembelian
-- ----------------------------
DROP VIEW IF EXISTS `v_laporanpembelian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_laporanpembelian` AS select `pembelian`.`id_pembelian` AS `id_pembelian`,`pembelian`.`jumlah` AS `jumlah`,`pembelian`.`harga_beli` AS `harga_beli`,`pembelian`.`tanggal_beli` AS `tanggal_beli`,`pembelian`.`id_variasi` AS `id_variasi`,`variasi_produk`.`ukuran` AS `ukuran`,`variasi_produk`.`warna` AS `warna`,`produk`.`nama_produk` AS `nama_produk` from ((`pembelian` join `variasi_produk` on((`pembelian`.`id_variasi` = `variasi_produk`.`id_variasi`))) join `produk` on((`variasi_produk`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_laporanpenjualan
-- ----------------------------
DROP VIEW IF EXISTS `v_laporanpenjualan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_laporanpenjualan` AS select `detail_penjualan`.`id_detail_penjualan` AS `id_detail_penjualan`,`variasi_produk`.`ukuran` AS `ukuran`,`variasi_produk`.`warna` AS `warna`,`produk`.`nama_produk` AS `nama_produk`,`detail_penjualan`.`harga_beli` AS `harga_beli`,`detail_penjualan`.`harga_jual` AS `harga_jual`,`detail_penjualan`.`jumlah` AS `jumlah`,`penjualan`.`tanggal_penjualan` AS `tanggal_penjualan`,`variasi_produk`.`id_variasi` AS `id_variasi` from (((`detail_penjualan` join `variasi_produk` on((`detail_penjualan`.`id_variasi` = `variasi_produk`.`id_variasi`))) join `produk` on((`variasi_produk`.`id_produk` = `produk`.`id_produk`))) join `penjualan` on((`detail_penjualan`.`kode_penjualan` = `penjualan`.`kode_penjualan`)));

-- ----------------------------
-- View structure for v_pembelian
-- ----------------------------
DROP VIEW IF EXISTS `v_pembelian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pembelian` AS select `pembelian`.`id_pembelian` AS `id_pembelian`,`pembelian`.`jumlah` AS `jumlah`,`pembelian`.`harga_beli` AS `harga_beli`,`pembelian`.`tanggal_beli` AS `tanggal_beli`,`pembelian`.`id_variasi` AS `id_variasi`,`variasi_produk`.`warna` AS `warna`,`variasi_produk`.`ukuran` AS `ukuran`,`produk`.`nama_produk` AS `nama_produk` from ((`pembelian` join `variasi_produk` on((`pembelian`.`id_variasi` = `variasi_produk`.`id_variasi`))) join `produk` on((`variasi_produk`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_penjualandepan
-- ----------------------------
DROP VIEW IF EXISTS `v_penjualandepan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penjualandepan` AS select `penjualan`.`id_penjualan` AS `id_penjualan`,`penjualan`.`kode_penjualan` AS `kode_penjualan`,`penjualan`.`id_pelanggan` AS `id_pelanggan`,`penjualan`.`total` AS `total`,`penjualan`.`tanggal_penjualan` AS `tanggal_penjualan`,`penjualan`.`status` AS `status`,`penjualan`.`pembayaran` AS `pembayaran`,`penjualan`.`pengiriman` AS `pengiriman`,`pelanggan`.`id_akun` AS `id_akun`,`penjualan`.`no_resi` AS `no_resi`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pelanggan`.`alamat` AS `alamat`,`pelanggan`.`kode_pos` AS `kode_pos`,`pelanggan`.`no_hp` AS `no_hp` from (`penjualan` join `pelanggan` on((`penjualan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`)));

-- ----------------------------
-- View structure for v_pesanan
-- ----------------------------
DROP VIEW IF EXISTS `v_pesanan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pesanan` AS select `produk`.`nama_produk` AS `nama_produk`,`variasi_produk`.`ukuran` AS `ukuran`,`variasi_produk`.`warna` AS `warna`,`detail_penjualan`.`harga_jual` AS `harga_jual`,`detail_penjualan`.`id_akun` AS `id_akun`,`detail_penjualan`.`id_detail_penjualan` AS `id_detail_penjualan`,`gambar_produk`.`gambar` AS `gambar`,`produk`.`id_produk` AS `id_produk`,`detail_penjualan`.`jumlah` AS `jumlah`,`detail_penjualan`.`kode_penjualan` AS `kode_penjualan` from (((`detail_penjualan` join `variasi_produk` on((`detail_penjualan`.`id_variasi` = `variasi_produk`.`id_variasi`))) join `produk` on((`variasi_produk`.`id_produk` = `produk`.`id_produk`))) join `gambar_produk` on((`produk`.`id_produk` = `gambar_produk`.`id_produk`))) where (`detail_penjualan`.`keranjang` = '0') group by `detail_penjualan`.`id_detail_penjualan`;

-- ----------------------------
-- View structure for v_produk
-- ----------------------------
DROP VIEW IF EXISTS `v_produk`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_produk` AS select `produk`.`id_produk` AS `id_produk`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`id_merk` AS `id_merk`,`produk`.`harga_beli` AS `harga_beli`,`produk`.`detail` AS `detail`,`produk`.`harga_jual` AS `harga_jual`,`merk`.`nama_merk` AS `nama_merk`,`gambar_produk`.`gambar` AS `gambar` from ((`produk` join `merk` on((`produk`.`id_merk` = `merk`.`id_merk`))) left join `gambar_produk` on((`produk`.`id_produk` = `gambar_produk`.`id_produk`))) group by `produk`.`nama_produk`;

-- ----------------------------
-- View structure for v_stok
-- ----------------------------
DROP VIEW IF EXISTS `v_stok`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stok` AS select `v`.`ukuran` AS `ukuran`,`v`.`warna` AS `warna`,(ifnull(`pb`.`total_beli`,0) - ifnull(`pj`.`total_jual`,0)) AS `stok`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`id_produk` AS `id_produk`,`v`.`id_variasi` AS `id_variasi` from (((`variasi_produk` `v` left join (select `pembelian`.`id_variasi` AS `id_variasi`,sum(`pembelian`.`jumlah`) AS `total_beli` from `pembelian` group by `pembelian`.`id_variasi`) `pb` on((`v`.`id_variasi` = `pb`.`id_variasi`))) left join (select `detail_penjualan`.`id_variasi` AS `id_variasi`,sum(`detail_penjualan`.`jumlah`) AS `total_jual` from `detail_penjualan` group by `detail_penjualan`.`id_variasi`) `pj` on((`v`.`id_variasi` = `pj`.`id_variasi`))) join `produk` on((`v`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_thumbnailproduk
-- ----------------------------
DROP VIEW IF EXISTS `v_thumbnailproduk`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_thumbnailproduk` AS select `produk`.`nama_produk` AS `nama_produk`,`produk`.`harga_jual` AS `harga_jual`,`gambar_produk`.`gambar` AS `gambar`,`produk`.`id_produk` AS `id_produk`,`merk`.`nama_merk` AS `nama_merk`,`merk`.`id_merk` AS `id_merk` from ((`produk` join `gambar_produk` on((`produk`.`id_produk` = `gambar_produk`.`id_produk`))) join `merk` on((`produk`.`id_merk` = `merk`.`id_merk`))) group by `produk`.`nama_produk`;

-- ----------------------------
-- View structure for v_variasi
-- ----------------------------
DROP VIEW IF EXISTS `v_variasi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_variasi` AS select `variasi_produk`.`ukuran` AS `ukuran`,`variasi_produk`.`warna` AS `warna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`harga_beli` AS `harga_beli`,`variasi_produk`.`id_variasi` AS `id_variasi` from (`produk` join `variasi_produk` on((`produk`.`id_produk` = `variasi_produk`.`id_produk`)));

SET FOREIGN_KEY_CHECKS = 1;
