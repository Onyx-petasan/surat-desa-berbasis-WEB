/*
Navicat MySQL Data Transfer

Source Server         : App
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : surdes

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2020-01-14 23:16:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_desa
-- ----------------------------
DROP TABLE IF EXISTS `tb_desa`;
CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `nama_desa` varchar(100) DEFAULT NULL,
  `nama_kecamatan` varchar(100) DEFAULT NULL,
  `nama_kabupaten` varchar(100) DEFAULT NULL,
  `alamat_desa` text,
  `keterangan_lain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_desa
-- ----------------------------
INSERT INTO `tb_desa` VALUES ('1', '19122019113456indramayu.png', 'kedungwungu', 'anjatan', 'indramayu', 'Jl. Raya Kedungwungu No. 1 Desa Kedungwungu Kec. Anjatan Kab. Indramayu 45256', 'Website: http://kedungwungu.desa.id Email: kedungwungu@gmail.com');

-- ----------------------------
-- Table structure for tb_history
-- ----------------------------
DROP TABLE IF EXISTS `tb_history`;
CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_history_surat` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_history
-- ----------------------------
INSERT INTO `tb_history` VALUES ('1', '4');
INSERT INTO `tb_history` VALUES ('2', '4');

-- ----------------------------
-- Table structure for tb_isi_surat
-- ----------------------------
DROP TABLE IF EXISTS `tb_isi_surat`;
CREATE TABLE `tb_isi_surat` (
  `id_isi_surat` int(11) NOT NULL,
  `id_kategori_surat` int(11) NOT NULL,
  `isi_surat` text,
  PRIMARY KEY (`id_kategori_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_isi_surat
-- ----------------------------
INSERT INTO `tb_isi_surat` VALUES ('2', '1', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: justify;\">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>\r\n</body>\r\n</html>');
INSERT INTO `tb_isi_surat` VALUES ('3', '2', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: justify;\">Dengan ini menerangkan bahwa orang tersebut diatas memang benar belum pernah menikah.</p>\r\n<p style=\"text-align: justify;\">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>\r\n</body>\r\n</html>');
INSERT INTO `tb_isi_surat` VALUES ('1', '3', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: justify;\">Warga tersebut benar penduduk Desa Kedungwungu dan berdomisili sesuai alamat diatas.<br />Surat keterangan ini berlaku selama 6 (enam) bulan sejak dikeluarkan.</p>\r\n<p style=\"text-align: justify;\">Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<br />Atas kerja samanya diucapkan terima kasih.</p>\r\n</body>\r\n</html>');
INSERT INTO `tb_isi_surat` VALUES ('4', '4', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>oigaoidshopfpsfp</p>\r\n</body>\r\n</html>');

-- ----------------------------
-- Table structure for tb_kategori_surat
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori_surat`;
CREATE TABLE `tb_kategori_surat` (
  `id_kategori_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_surat` varchar(50) DEFAULT NULL,
  `kode_desa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_surat`,`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_kategori_surat
-- ----------------------------
INSERT INTO `tb_kategori_surat` VALUES ('2', 'Surat Keterangan Belum Menikah', '474', 'KDW');
INSERT INTO `tb_kategori_surat` VALUES ('3', 'Surat Keterangan Berdomisili', '470', 'KDW');
INSERT INTO `tb_kategori_surat` VALUES ('4', 'Surat Keterangan Kelahiran', '474', 'KDW');

-- ----------------------------
-- Table structure for tb_kelahiran
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelahiran`;
CREATE TABLE `tb_kelahiran` (
  `id_kelahiran` int(100) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(100) DEFAULT NULL,
  `no` int(10) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nik_ayah` varchar(100) DEFAULT NULL,
  `nik_ibu` varchar(100) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `waktu_lahir` time DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kelahiran`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_kelahiran
-- ----------------------------
INSERT INTO `tb_kelahiran` VALUES ('1', '4', '1', '474.001/KDW/XII/2019', '2019-12-20', '1404161004900001', '2112231204920001', 'suma', 'Laki-Laki', 'jogja', '09:08:00', '2019-12-04', null);

-- ----------------------------
-- Table structure for tb_kode_surat
-- ----------------------------
DROP TABLE IF EXISTS `tb_kode_surat`;
CREATE TABLE `tb_kode_surat` (
  `id_kode_surat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_surat` varchar(100) DEFAULT NULL,
  `kode_desa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kode_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_kode_surat
-- ----------------------------
INSERT INTO `tb_kode_surat` VALUES ('1', '32.12.23.', 'Kdw');

-- ----------------------------
-- Table structure for tb_penduduk
-- ----------------------------
DROP TABLE IF EXISTS `tb_penduduk`;
CREATE TABLE `tb_penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` text,
  `agama` varchar(15) DEFAULT NULL,
  `golongan_darah` varchar(15) DEFAULT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_penduduk
-- ----------------------------
INSERT INTO `tb_penduduk` VALUES ('1404161004900001', 'Suharyanto S.Kom', 'Kulonprogo', '1990-04-10', 'Laki-Laki', 'lendah', 'Islam', '-', 'Belum Kawin', 'Pelajar / Mahasiswa', 'WNI');
INSERT INTO `tb_penduduk` VALUES ('2112231204920001', 'Emma Nur Hamidah', 'Ciamis', '1992-04-12', 'Perempuan', 'ciamis', 'Islam', '-', 'WNI', 'Karyawan Swasta', '');
INSERT INTO `tb_penduduk` VALUES ('3212232509950002', 'Nanang Maulana Armand', 'Indramayu', '1995-09-25', 'Laki-Laki', 'disini ajah lah\r\n', 'Islam', 'O', 'Kawin', 'Pelajar / Mahasiswa', 'WNI');
INSERT INTO `tb_penduduk` VALUES ('3212232708910004', 'amelia fauziah', 'sukatani', '2019-12-01', 'Perempuan', 'dirumah menunggu', 'Islam', 'AB', 'Kawin', 'Petani / Pekebun', 'WNI');

-- ----------------------------
-- Table structure for tb_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES ('1', 'admin', 'admin', 'Nanang Maulana armand', 'admin', '');
INSERT INTO `tb_pengguna` VALUES ('8', '14330034', 'yakin', 'Bos Ok', 'admin', '');

-- ----------------------------
-- Table structure for tb_surat
-- ----------------------------
DROP TABLE IF EXISTS `tb_surat`;
CREATE TABLE `tb_surat` (
  `id_surat` int(100) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(100) DEFAULT NULL,
  `no` int(10) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_surat
-- ----------------------------
INSERT INTO `tb_surat` VALUES ('1', '2', '1', '474.001/KDW/XII/2019', '2019-12-20', '1404161004900001', 'Belum');
INSERT INTO `tb_surat` VALUES ('2', '3', '2', '470.002/KDW/XII/2019', '2019-12-31', '3212232509950002', 'Belum');

-- ----------------------------
-- Table structure for tb_tandatangan
-- ----------------------------
DROP TABLE IF EXISTS `tb_tandatangan`;
CREATE TABLE `tb_tandatangan` (
  `id_tandatangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penandatangan` varchar(100) DEFAULT NULL,
  `nip_penandatangan` varchar(100) DEFAULT NULL,
  `isi_tandatangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tandatangan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_tandatangan
-- ----------------------------
INSERT INTO `tb_tandatangan` VALUES ('12', 'amin ya allah', '1213131212', '30102019072813tandatangan.png');
SET FOREIGN_KEY_CHECKS=1;
