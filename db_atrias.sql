/*
 Navicat Premium Data Transfer

 Source Server         : localhost-56
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_atrias

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 29/05/2020 07:32:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_barang
-- ----------------------------
DROP TABLE IF EXISTS `m_barang`;
CREATE TABLE `m_barang`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `merk_model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_serial_pabrik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ukuran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bahan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_buat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_kode_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `satuan_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_beli` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_barang
-- ----------------------------
INSERT INTO `m_barang` VALUES (2, 'GHER834534', 'INDOMIE', 'INDOFOOD', '90345345359894', '100gr', 'Mie', '2001', NULL, '10', 'Pcs', '2000');

-- ----------------------------
-- Table structure for m_divisi
-- ----------------------------
DROP TABLE IF EXISTS `m_divisi`;
CREATE TABLE `m_divisi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_divisi
-- ----------------------------
INSERT INTO `m_divisi` VALUES (2, 'IT');

-- ----------------------------
-- Table structure for m_gedung
-- ----------------------------
DROP TABLE IF EXISTS `m_gedung`;
CREATE TABLE `m_gedung`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gedung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_gedung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_gedung
-- ----------------------------
INSERT INTO `m_gedung` VALUES (3, '8234', 'Gedung Altira', 'Jl.Nangka');

-- ----------------------------
-- Table structure for m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jabatan
-- ----------------------------
INSERT INTO `m_jabatan` VALUES (3, 'Manager');

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jabatan` int(11) NULL DEFAULT NULL,
  `id_divisi` int(11) NULL DEFAULT NULL,
  `telp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_pegawai
-- ----------------------------
INSERT INTO `m_pegawai` VALUES (1, '2837423', 'Okki Setyawan', 'Jakarta', '2020-05-05', '', 'L', 3, 2, '02192834729', 'okkisetyawan@gmail.com', '91358492_10217085524357412_2843920759779229696_o.jpg');

-- ----------------------------
-- Table structure for m_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `m_ruangan`;
CREATE TABLE `m_ruangan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_ruangan
-- ----------------------------
INSERT INTO `m_ruangan` VALUES (3, '98JD', 'MELATI');
INSERT INTO `m_ruangan` VALUES (4, 'JKRN', 'MAWAR');
INSERT INTO `m_ruangan` VALUES (5, 'JK99', 'RAMPAI');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (9, 'okki', 'YQ==', '1', 1);

-- ----------------------------
-- Table structure for t_hapus
-- ----------------------------
DROP TABLE IF EXISTS `t_hapus`;
CREATE TABLE `t_hapus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NULL DEFAULT NULL,
  `tgl_hapus` date NULL DEFAULT NULL,
  `jml_barang` int(11) NULL DEFAULT NULL,
  `dokumen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_ruangan` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_hapus
-- ----------------------------
INSERT INTO `t_hapus` VALUES (1, 2, '2020-05-31', 888, 'sssyyyyyy', 3, 'ggjjjj', 'Huracan_Evo_RWD_Spyder_cc-blu_mehit-Vanir_19_Shiny_Black-yellow_caliper-sceneplate_env.png');

-- ----------------------------
-- Table structure for t_inventaris
-- ----------------------------
DROP TABLE IF EXISTS `t_inventaris`;
CREATE TABLE `t_inventaris`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_ruangan` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_inventaris
-- ----------------------------
INSERT INTO `t_inventaris` VALUES (1, 2, 3, 'sssss');

-- ----------------------------
-- Table structure for t_mutasi
-- ----------------------------
DROP TABLE IF EXISTS `t_mutasi`;
CREATE TABLE `t_mutasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_mutasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_gedung_asal` int(11) NULL DEFAULT NULL,
  `id_ruangan_asal` int(11) NULL DEFAULT NULL,
  `id_gedung_tujuan` int(11) NULL DEFAULT NULL,
  `id_ruangan_tujuan` int(11) NULL DEFAULT NULL,
  `jml_barang` int(11) NULL DEFAULT NULL,
  `tgl_mutasi` date NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_mutasi
-- ----------------------------
INSERT INTO `t_mutasi` VALUES (3, '202005270000001', 2, 3, 3, 3, 3, 4, '2020-05-30', 'asdasd', '040271800_1574853793-lamborghini_lambo_v12_vision_gt_0101.jpg');

-- ----------------------------
-- Table structure for t_perbaikan
-- ----------------------------
DROP TABLE IF EXISTS `t_perbaikan`;
CREATE TABLE `t_perbaikan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_ruangan` int(11) NULL DEFAULT NULL,
  `tgl_perbaikan` date NULL DEFAULT NULL,
  `jml_barang` int(11) NULL DEFAULT NULL,
  `kerusakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_perbaikan
-- ----------------------------
INSERT INTO `t_perbaikan` VALUES (3, 2, 3, '2020-05-27', NULL, 'sss', 'fff', 'Huracan_Evo_RWD_Spyder_cc-blu_mehit-Vanir_19_Shiny_Black-yellow_caliper-sceneplate_env.png');

SET FOREIGN_KEY_CHECKS = 1;
