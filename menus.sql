/*
 Navicat Premium Data Transfer

 Source Server         : herd
 Source Server Type    : MySQL
 Source Server Version : 80039 (8.0.39)
 Source Host           : localhost:3366
 Source Schema         : newepaperv3

 Target Server Type    : MySQL
 Target Server Version : 80039 (8.0.39)
 File Encoding         : 65001

 Date: 12/12/2024 12:11:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `kdmenu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nmmenu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nmfrm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `lvl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `def` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('mni_PAPB', 'Analisa Piutang Baris', 'frm_data_ap', '1111', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_PAPBA', 'Analisa Piutang Baris (All)', 'frm_data_ap_all', '1120', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_UPA', 'Usia Piutang Average', 'frm_avgpiutang', '1121', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_LapNotaDK', 'Nota D/K Per Tanggal', 'frm_lap_19', '1042', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_Piutang', 'Piutang', '', '11', '', NULL, '/piutang');
INSERT INTO `menus` VALUES ('mni_SistemNT', 'Nomor Transaksi', 'frm_nomor', '0104', '', 'mni_Sistem', '/sistem/nomor-transaksi');
INSERT INTO `menus` VALUES ('mni_SistemInfo', 'Informasi', '', '0107', '', 'mni_Sistem', '/sistem/informasi');
INSERT INTO `menus` VALUES ('mni_lapmtstitipan', 'Mutasi Rekening Titipan Iklan', 'frm_lap_mtstitipan', '1046', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_OIPT', 'Omzet Iklan Per Tanggal', 'frm_lap_oipt', '1106', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_ikbp', 'Omzet Iklan Kolom dan Pembayaran', 'frm_lap_ikbp', '1107', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_PBB', 'Piutang Bulan Berjalan', 'frm_lap_piujalan', '1108', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_PAPK', 'Analisa Piutang Kolom', 'frm_data_ap', '1109', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_PAPKA', 'Analisa Piutang Kolom (All)', 'frm_data_ap_all', '1110', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpNotaKre', 'Rekap Nota D/K Iklan', 'frm_lap_26', '1041', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPostBar', 'Rekap Posting Barter', 'frm_lap_27', '102007', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPosTtpU', 'Rekap Posting Titipan Update', 'frm_lap_rkpttpupd', '102011', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPostDPU', 'Rekap Posting Dp Update', 'frm_lap_rkpdpupd', '102009', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPosTtp', 'Rekap Posting Titipan', 'frm_lap_rkpttp', '102010', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPostDP', 'Rekap Posting DP', 'frm_lap_rkpdp', '102008', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_Kwitansi', 'Kwitansi', '', '04', '', NULL, '/kwitansi');
INSERT INTO `menus` VALUES ('mni_PIK', 'Piutang Iklan Kolom', 'frm_data_piukol', '1101', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_PIB', 'Piutang Iklan Baris', 'frm_data_piukol', '1102', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_piupabkolom', 'Proses Akhir Bulan Iklan Kolom', 'frm_proseskol', '1103', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_piupabbaris', 'Proses Akhir Bulan Iklan Baris', 'frm_proseskol', '1104', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_lappkritlamp', 'Piutang Kritis Lampiran', 'frm_lap_piukritislamp', '1013', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapPostCBGBaru', 'Rekap Posting BG/Cheque Baru', 'frm_lap_postcbg', '102003', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPostTrs', 'Rekap Posting Transfer', 'frm_lap_23', '102002', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapCBGTempo', 'B/G Cheque Jatuh tempo', 'frm_data_cheque', '1007', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPostTun', 'Rekap Posting Tunai', 'frm_lap_22', '102001', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPosAll', 'Rekapitulasi Posting All', 'frm_lap_rkpposall', '1021', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapMtsJitu', 'Mutasi Piutang Jitu', 'frm_lap_piukritisjitu', '1014', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapCtkKwi', 'Cetak Kwitansi', 'frm_lap_20', '1005', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapKwiBlmPost', 'Kwitansi belum posting', 'frm_lap_29', '1006', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapHistoNota', 'Historis Nota', 'frm_lap_histon', '1009', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapHisto', 'Historis Voucher', 'frm_lap_histov', '1010', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapMtsJituLamp', 'Mutasi Piutang Jitu Lampiran', 'frm_lap_piukritislampjitu', '1015', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkp', 'Rekap Posting', '', '1020', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapPostCBGTol', 'Rekap Posting BG/Cheque Tolakan', 'frm_lap_25', '102004', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_lappkrit', 'Piutang Kritis', 'frm_lap_piukritis', '1012', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_lapssp', 'Daftar Iklan SSP', 'frm_lap_iklanssp', '0908', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_LapPostCBGGanti', 'Rekap Posting BG/Cheque Ganti', 'frm_lap_24', '102005', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_LapPostKlir2', 'Rekap Posting BG/Cheque Klring Ganti', 'frm_lap_postcbg2', '102006', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_CB', 'Cashback', '', '07', '', NULL, '/cashback');
INSERT INTO `menus` VALUES ('mni_CBK', 'Cashback Kolom', 'frm_isian_cb', '0701', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_CBB', 'Cashback Baris', 'frm_isian_cb', '0702', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_LapSisaPiut', 'Sisa Piutang Iklan', 'frm_lap_31', '1008', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_cbappr', 'Approval', 'frm_approval_cb', '0705', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_hiscb', 'Historis Cashback', 'frm_hiscb', '0706', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_cbbp', 'Cetak Bukti Potong PPH cashback', 'frm_ctk_cb', '0707', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_insentif', 'Insentif', '', '08', '', NULL, '/instensif');
INSERT INTO `menus` VALUES ('mni_insentifikl', 'Insentif Iklan', 'frm_isian_insentif', '0801', '', 'mni_insentif', NULL);
INSERT INTO `menus` VALUES ('mni_insentiflap', 'Laporan Insentif', 'frm_lap_ins', '0805', '', 'mni_insentif', NULL);
INSERT INTO `menus` VALUES ('mni_LCBK', 'Laporan Cashback', 'frm_lap_cb', '0708', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_LCBKbiro', 'Laporan Cashback sort biro', 'frm_lap_cb_biro', '0709', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_LCBKpph', 'Laporan Cashback PPH', 'frm_ctk_rkpcbpph', '0710', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_Master', 'Master', '', '03', '', NULL, '/master');
INSERT INTO `menus` VALUES ('mni_MasterBank', 'Bank', 'frm_isian_mastbank', '0303', '', 'mni_Master', '/master/bank');
INSERT INTO `menus` VALUES ('mni_MasterBiaya', 'Biaya', 'frm_isian_mastbiaya', '0301', '', 'mni_Master', '/master/biaya');
INSERT INTO `menus` VALUES ('mni_MasterBonus', 'Voucher Bonus', 'frm_isian_mastvb', '0304', '', 'mni_Master', '/master/voucher');
INSERT INTO `menus` VALUES ('mni_MasterDP', 'Deposit', 'frm_isian_mastdp', '0302', '', 'mni_Master', '/master/deposit');
INSERT INTO `menus` VALUES ('mni_NotaDK', 'Nota D/K', '', '06', '', NULL, '/nota');
INSERT INTO `menus` VALUES ('mni_NotaDKB', 'Nota D/K Baris', 'frm_isian_notadk', '0602', '', 'mni_NotaDK', NULL);
INSERT INTO `menus` VALUES ('mni_NotaDKK', 'Nota D/K Kolom', 'frm_isian_notadk', '0601', '', 'mni_NotaDK', NULL);
INSERT INTO `menus` VALUES ('mni_Laporan', 'Laporan', '', '10', '', NULL, '/laporan');
INSERT INTO `menus` VALUES ('mni_Lapvochr', 'Penerimaan Voucher Iklan (Harian)', 'frm_lap_trmvoc', '1001', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_Lapvochrrkp', 'Penerimaan Voucher Iklan (Harian) Rekap', 'frm_lap_trmvocrkp', '1002', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_LapCbgHr', 'Penerimaan Cheq/BG Harian', 'frm_lap_trmcbg', '1003', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot', 'Konfirmasi Nota', '', '1004', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot01', 'Konfirmasi Nota', 'frm_lap_konfirnot', '100401', '', 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot02', 'Konfirmasi Nota Client', 'frm_lap_konfirnot_client', '100402', '', 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot03', 'Konfirmasi Nota AE', 'frm_lap_konfirnot_ae', '100403', '', 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot09', 'Konfirmasi Barter Group', 'frm_lap_konfirnot_barter', '100409', '', 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnotjitu01', 'Konfirmasi Nota Jitu', 'frm_lap_konfirnotjitu', '100415', NULL, 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_lapkonfirnot10', 'Update Pemakaian Barter Group', 'frm_lap_konfirnot_updbarter', '100420', '', 'mni_lapkonfirnot', NULL);
INSERT INTO `menus` VALUES ('mni_PostBarter', 'Barter', 'frm_isian_posbarter', '0507', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostBarterReal', 'Barter Realisasi', 'frm_isian_posbarterreal', '0508', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostCBG', 'BG/Cheque-Kliring', 'frm_isian_posbgc', '0503', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_postCBK', 'Posting Cashback', 'frm_isian_postingcb', '0704', '', 'mni_CB', NULL);
INSERT INTO `menus` VALUES ('mni_PostDP', 'Deposit', 'frm_isian_posdp', '0509', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostDPUpd', 'Deposit Update', 'frm_isian_posdpupd', '0510', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostGantiCBG', 'BG/Cheque-Ganti', 'frm_isian_postingganticbg', '0505', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostGroupJP', 'Group JP', 'frm_isian_posgroupjp', '0514', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_Posting', 'Posting', '', '05', '', NULL, '/posting');
INSERT INTO `menus` VALUES ('mni_PostKlir2', 'BG/Cheque-Kliring Ganti', 'frm_isian_postingklir2', '0506', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostTitipan', 'Titipan', 'frm_isian_postitip', '0511', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostTitipUpd', 'Titipan Update', 'frm_isian_postitipupd', '0512', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostTolCBG', 'BG/Cheque-Tolakan', 'frm_isian_postingtolcbg', '0504', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostTransfer', 'Transfer', 'frm_isian_postransfer', '0502', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostTunai', 'Tunai', 'frm_isian_postunai', '0501', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_PostVoucher', 'Voucher', 'frm_isian_posvoucher', '0513', '', 'mni_Posting', NULL);
INSERT INTO `menus` VALUES ('mni_pphcekpphkem', 'Cek Pengembalian PPH', 'frm_cek_pphkem', '0910', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_pphlapbyrikl', 'Laporan Pembayaran Iklan', 'frm_lap_pphbyrikl', '0909', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_pphpiu', 'Pajak', '', '09', '', NULL, '/pajak');
INSERT INTO `menus` VALUES ('mni_pphpiukel', 'PPH Keluaran', 'frm_isian_pphjp', '0903', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_pphpiukelncb', 'PPH Keluaran Non Cashback', 'frm_isian_pphjpncb', '0904', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_pphpiukembali', 'Pengembalian PPH Kolom', 'frm_isian_pphkem', '0901', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_pphpiukembar', 'Pengembalian PPH Baris', 'frm_isian_pphkem', '0902', '', 'mni_pphpiu', NULL);
INSERT INTO `menus` VALUES ('mni_LapRkpPosVou', 'Rekap Posting Voucher', 'frm_lap_rkpvoucher', '102012', '', 'mni_LapRkp', NULL);
INSERT INTO `menus` VALUES ('mni_rkpomzet', 'Rekapitulasi Omzet', 'frm_rkpomziklan', '1011', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_SettingUser', 'Setting User', 'frm_isian_user', '02041', '', 'mni_User', '/uses/setting');
INSERT INTO `menus` VALUES ('mni_Sistem', 'Sistem', '', '01', 'D', NULL, '/sistem');
INSERT INTO `menus` VALUES ('mni_LapBBM', 'Bukti Bank Masuk', 'frm_lap_bbm', '1045', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_SistemKeluar', 'Keluar', '', '0109', '', 'mni_Sistem', '/sistem/keluar');
INSERT INTO `menus` VALUES ('mni_dafnom', 'Daftar Nominatif Biaya Produksi', '', '1047', '', 'mni_Laporan', NULL);
INSERT INTO `menus` VALUES ('mni_SistemSetup', 'Setup', 'frm_isian_setupmodul', '0102', '', 'mni_Sistem', '/sistem/setup');
INSERT INTO `menus` VALUES ('mni_TKwiBaris', 'Kwitansi Baris', 'frm_isian_kwitansi', '0401', '', 'mni_Kwitansi', '/kwitansi/baris');
INSERT INTO `menus` VALUES ('mni_TKwiKolom', 'Kwitansi Kolom', 'frm_isian_kwitansi', '0402', '', 'mni_Kwitansi', '/kwitansi/kolom');
INSERT INTO `menus` VALUES ('mni_TKwiKor', 'Koreksi Status Posting', 'frm_koreksiposkwi', '0406', '', 'mni_Kwitansi', '/kwitansi/koreksi-status-posting');
INSERT INTO `menus` VALUES ('mni_TNoVoucher', 'No. Voucher', 'frm_isian_novoucher', '0408', '', 'mni_Kwitansi', '/kwitansi/voucher');
INSERT INTO `menus` VALUES ('mni_PRTI', 'Rekapitulasi Transaksi Iklan', 'frm_rkptransikl', '1105', '', 'mni_Piutang', NULL);
INSERT INTO `menus` VALUES ('mni_User', 'User', '', '02', 'D', NULL, '/users');
INSERT INTO `menus` VALUES ('mni_UserLogin', 'User Login', 'frm_login', '0201', 'D', 'mni_User', '/users/login');
INSERT INTO `menus` VALUES ('mni_UserLo;ut', 'User Log Out', '', '0202', 'D', 'mni_User', '/users/logout');
INSERT INTO `menus` VALUES ('mni_UserPwd', 'User Password', 'frm_ganti_pwd', '0203', '', 'mni_User', '/users/pwd');
INSERT INTO `menus` VALUES ('mn_usermenu', 'User Menu', NULL, '0204', NULL, 'mni_User', '/uses/usermenu');
INSERT INTO `menus` VALUES ('UserMenu', 'User Menu', NULL, '001', NULL, NULL, '/user-menu/');
INSERT INTO `menus` VALUES ('UserMenuListMenus', 'List Menus', NULL, '0010002', NULL, 'UserMenu', '/user-menu/list-menu');
INSERT INTO `menus` VALUES ('List Level Menu', 'List Level Menu', NULL, '0010003', NULL, 'UserMenu', '/user-menu/list-level');

SET FOREIGN_KEY_CHECKS = 1;
