/*
 Navicat Premium Data Transfer

 Source Server         : vnexpress
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : omt

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 06/05/2022 14:37:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent` bigint(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Bóng đá', NULL, NULL, 7);
INSERT INTO `categories` VALUES (2, 'Thời sự', NULL, NULL, 0);
INSERT INTO `categories` VALUES (3, 'Show biz', NULL, NULL, 4);
INSERT INTO `categories` VALUES (4, 'Thế giới', NULL, NULL, 0);
INSERT INTO `categories` VALUES (5, 'Giáo dục', NULL, NULL, 2);
INSERT INTO `categories` VALUES (6, 'Pháp luật', NULL, NULL, 2);
INSERT INTO `categories` VALUES (7, 'Thể thao', NULL, NULL, 0);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 2, 82, 'Bài viết quá hay', NULL, NULL, NULL);
INSERT INTO `comments` VALUES (2, 4, 49, 'Quas tuyeejt voiw', NULL, '2022-04-25 15:12:29', '2022-04-26 03:00:58');
INSERT INTO `comments` VALUES (3, 4, 49, 'quas hay', NULL, '2022-04-25 15:29:49', '2022-04-25 15:29:49');
INSERT INTO `comments` VALUES (4, 4, 49, 'wow', '2022-04-26 03:01:13', '2022-04-25 15:30:54', '2022-04-26 03:01:13');
INSERT INTO `comments` VALUES (5, 4, 49, 'yup', '2022-04-26 03:01:15', '2022-04-25 15:35:04', '2022-04-26 03:01:15');
INSERT INTO `comments` VALUES (6, 4, 49, 'dc', '2022-04-26 03:01:16', '2022-04-25 15:35:36', '2022-04-26 03:01:16');
INSERT INTO `comments` VALUES (7, 4, 49, 'vcz', '2022-04-26 06:44:51', '2022-04-25 15:35:56', '2022-04-26 06:44:51');
INSERT INTO `comments` VALUES (8, 4, 49, 'sax', '2022-04-26 06:45:25', '2022-04-25 15:38:13', '2022-04-26 06:45:25');
INSERT INTO `comments` VALUES (9, 4, 49, 'al9', '2022-04-26 06:45:00', '2022-04-25 15:38:58', '2022-04-26 06:45:00');
INSERT INTO `comments` VALUES (10, 4, 49, 'ok', '2022-04-26 06:45:26', '2022-04-25 15:40:03', '2022-04-26 06:45:26');
INSERT INTO `comments` VALUES (11, 4, 49, 'ok', '2022-04-26 06:45:28', '2022-04-25 15:40:08', '2022-04-26 06:45:28');
INSERT INTO `comments` VALUES (12, 1, 82, 'good', NULL, '2022-04-26 02:15:48', '2022-04-26 02:15:48');
INSERT INTO `comments` VALUES (13, 1, 82, 'wow', '2022-04-27 03:10:08', '2022-04-26 02:23:38', '2022-04-27 03:10:08');
INSERT INTO `comments` VALUES (14, 1, 82, 'opp', '2022-04-26 06:45:32', '2022-04-26 02:24:20', '2022-04-26 06:45:32');
INSERT INTO `comments` VALUES (15, 1, 82, '12', '2022-04-26 06:45:07', '2022-04-26 02:26:15', '2022-04-26 06:45:07');
INSERT INTO `comments` VALUES (16, 1, 82, 'ww', '2022-04-26 06:45:09', '2022-04-26 02:27:32', '2022-04-26 06:45:09');
INSERT INTO `comments` VALUES (17, 1, 82, 'axa', '2022-04-26 06:45:11', '2022-04-26 02:27:44', '2022-04-26 06:45:11');
INSERT INTO `comments` VALUES (18, 1, 82, 'zz', '2022-04-26 06:45:13', '2022-04-26 02:27:55', '2022-04-26 06:45:13');
INSERT INTO `comments` VALUES (19, 1, 82, 'ad', '2022-04-26 06:45:17', '2022-04-26 02:28:15', '2022-04-26 06:45:17');
INSERT INTO `comments` VALUES (20, 1, 49, 'Opps!', NULL, '2022-04-26 03:23:33', '2022-04-26 03:23:33');
INSERT INTO `comments` VALUES (21, 1, 59, 'dep', NULL, '2022-04-26 03:41:07', '2022-04-26 03:41:07');
INSERT INTO `comments` VALUES (22, 1, 59, 'dep', '2022-04-26 06:25:34', '2022-04-26 03:41:09', '2022-04-26 06:25:34');
INSERT INTO `comments` VALUES (23, 1, 59, 'baut', '2022-04-26 06:25:32', '2022-04-26 03:41:36', '2022-04-26 06:25:32');
INSERT INTO `comments` VALUES (24, 1, 59, 'hap dan', '2022-04-26 06:25:27', '2022-04-26 03:42:21', '2022-04-26 06:25:27');
INSERT INTO `comments` VALUES (25, 1, 82, 'ac', '2022-04-26 06:45:36', '2022-04-26 06:24:31', '2022-04-26 06:45:36');
INSERT INTO `comments` VALUES (26, 8, 82, 'voi', '2022-04-27 03:09:55', '2022-04-26 07:04:36', '2022-04-27 03:09:55');
INSERT INTO `comments` VALUES (27, 4, 82, 'very  good', '2022-05-04 07:20:29', '2022-04-26 07:26:21', '2022-05-04 07:20:29');
INSERT INTO `comments` VALUES (28, 4, 82, 'good job', NULL, '2022-04-26 07:33:17', '2022-04-26 07:33:17');
INSERT INTO `comments` VALUES (29, 4, 82, 'good (y)', '2022-05-04 09:57:42', '2022-04-26 07:33:44', '2022-05-04 09:57:42');
INSERT INTO `comments` VALUES (30, 4, 82, 'asd', '2022-04-27 03:22:32', '2022-04-26 09:43:49', '2022-04-27 03:22:32');
INSERT INTO `comments` VALUES (31, 4, 82, 'amam', '2022-04-27 03:22:27', '2022-04-26 10:01:18', '2022-04-27 03:22:27');
INSERT INTO `comments` VALUES (32, 55, 82, 'tuyệt', NULL, '2022-04-27 04:50:25', '2022-04-27 04:50:25');
INSERT INTO `comments` VALUES (33, 55, 82, 'ok', NULL, '2022-04-27 04:51:57', '2022-04-27 04:51:57');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2022_03_29_095912_create_categories_table', 1);
INSERT INTO `migrations` VALUES (3, '2022_03_29_095746_create_posts_table', 2);
INSERT INTO `migrations` VALUES (5, '2022_04_06_081516_edit_users_table', 4);
INSERT INTO `migrations` VALUES (7, '2022_04_07_023635_edit_posts_table', 5);
INSERT INTO `migrations` VALUES (8, '2022_03_30_134137_edit_categories_table', 6);
INSERT INTO `migrations` VALUES (10, '2022_04_19_092321_create_roles_table', 7);
INSERT INTO `migrations` VALUES (11, '2022_04_19_092343_create_permissions_table', 7);
INSERT INTO `migrations` VALUES (12, '2022_04_19_095743_create_role_user_table', 7);
INSERT INTO `migrations` VALUES (13, '2022_04_19_095809_create_permission_role_table', 7);
INSERT INTO `migrations` VALUES (14, '2022_04_25_080515_create_comments_table', 8);
INSERT INTO `migrations` VALUES (15, '2014_10_12_100000_create_password_resets_table', 9);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `permission_role` VALUES (5, 2, 1, NULL, NULL);
INSERT INTO `permission_role` VALUES (6, 2, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (7, 3, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (8, 4, 4, NULL, NULL);
INSERT INTO `permission_role` VALUES (9, 1, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (10, 1, 3, NULL, NULL);
INSERT INTO `permission_role` VALUES (11, 1, 4, NULL, NULL);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'add_post', 'thêm bài viết', NULL, NULL);
INSERT INTO `permissions` VALUES (2, 'edit_post', 'chỉnh sửa bài viết', NULL, NULL);
INSERT INTO `permissions` VALUES (3, 'delete_post', 'xóa bài viết', NULL, NULL);
INSERT INTO `permissions` VALUES (4, 'restore_post', 'khôi phục bài viết', NULL, NULL);
INSERT INTO `permissions` VALUES (5, 'add_restore_post', 'Thêm và khôi phục', '2022-04-21 04:00:36', '2022-05-06 07:18:48');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `posts_categories_id_foreign`(`categories_id`) USING BTREE,
  CONSTRAINT `posts_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 93 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'vid', 'Covid.jpg', '<p>B&aacute;o c&aacute;o của Bộ Y tế cũng cho biết mặc d&ugrave; đ&atilde; qua đỉnh dịch, số mắc ng&agrave;y 29-3 chỉ bằng chưa đầy 30% của thời điểm cao nhất, nhưng H&agrave; Nội vẫn ghi nhận xấp xỉ 9.000 ca mới trong ng&agrave;y.</p>', 1, 4, 1, NULL, '2022-04-27 02:53:26', NULL);
INSERT INTO `posts` VALUES (4, 'Covid', 'Covid.jpg', 'Báo cáo của Bộ Y tế cũng cho biết mặc dù đã qua đỉnh dịch, số mắc ngày 29-3 chỉ bằng chưa đầy 30% của thời điểm cao nhất, nhưng Hà Nội vẫn ghi nhận xấp xỉ 9.000 ca mới trong ngày.', 0, 4, 6, NULL, '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (6, 'av', 'nguyenvanc.jpg', '“Tin buồn là 90% cơ sở hạ tầng của Mariupol bị phá hủy, trong đó 40% không thể khôi phục. Các vụ ném bom vẫn tiếp tục, trong khi pháo phản lực quân đội Nga nã vào thành phố ngày càng nhiều. Phần lớn chúng được bắn từ ngoài khơi, nơi các tàu chiến Nga hiện diện”, Vadym Boichenko – thị trưởng Mariupol – tuyên bố.\r\n\r\nChính quyền Mariupol cho biết, vẫn còn hơn 130.000 dân thường chưa thể sơ tán khỏi thành phố.\r\n\r\n“Chúng tôi muốn sơ tán những người còn mắc kẹt, nhưng có lẽ điều đó chưa thể thực hiện trong hôm nay”, ông Boichenko nói thêm.\r\n\r\nTrong một thông báo cùng ngày, Bộ Quốc phòng Ukraine cho biết, quân đội Nga đã tiếp quản Mariupol nhưng chưa thể giành toàn quyền kiểm soát thành phố. Hội đồng Mariupol tuyên bố, Nga đã hậu thuẫn một thị trưởng mới lên nắm quyền ở thành phố cảng chiến lược này.\r\n\r\nỦy ban Chữ thập đỏ Quốc tế (ICRC) cho biết, do chính quyền Ukraine không còn kiểm soát được Mariupol, nên tạm thời họ chưa thể tiếp cận thành phố để hỗ trợ dân thường.', 1, 1, 6, '2022-03-31 07:39:20', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (8, 'a2b', 'nigeriafannn.jpg', 'Những cuộc pháo kích ngày càng khốc liệt. Đêm qua, quân đội Nga muốn đột kích ở thành phố Rubizhne. Lực lượng của chúng tôi đã đẩy lùi họ. Hàng chục xe tăng bị phá hủy”, ông Serhiy Gaidai nói và kêu gọi người dân khẩn cấp rời khỏi Lugansk.\r\n\r\n“Làm ơn, đừng do dự. Chúng tôi đã sơ tán hơn 1.000 người. Xin đừng đợi cho đến khi nhà của bạn bị đánh bom mới rời khỏi”, ông Serhiy Gaidai nói thêm.', 1, 8, 3, '2022-03-31 07:41:42', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (9, '123', '4319621-pc-wallpaper-hd.jpg', 'Hôm 4.4, thống đốc vùng Lugansk – ông Serhiy Gaidai – thông báo, quân đội Nga đang đổ về ngày càng đông và chuẩn bị mở chiến dịch quy mô lớn ở khu vực này.\r\n\r\n“Phương tiện, vũ khí Nga dồn đến từ mọi hướng. Binh sĩ Nga tập hợp ngày càng đông. Họ đang chuẩn bị cho một cuộc tấn công lớn”, ông Serhiy Gaidai nói trong đoạn video đăng trên mạng xã hội.', 1, 9, 3, '2022-04-05 02:24:52', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (10, 'abbab', 'nigeriafannn.jpg', '1233333333333333333333333333333333', 1, 2, 2, '2022-04-05 10:48:49', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (13, 'accaca', '1649213537.jpg', 'asda', 1, 1, 1, '2022-04-06 02:52:17', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (15, 'a', '1649303593.png', 'a', 1, 1, 1, '2022-04-07 03:53:13', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (16, '123', 'C:\\fakepath\\img-ship.png', '123', 1, 1, 1, '2022-04-07 04:36:12', '2022-04-13 10:21:46', '2022-04-13 10:21:46');
INSERT INTO `posts` VALUES (17, '312', 'C:\\fakepath\\img-ship.png', '123', 1, 1, 1, '2022-04-07 04:36:38', '2022-04-13 10:21:43', '2022-04-13 10:21:43');
INSERT INTO `posts` VALUES (18, 'vav', 'C:\\fakepath\\product-3.png', 'vaava', 1, 1, 1, '2022-04-07 04:40:53', '2022-04-13 10:21:39', '2022-04-13 10:21:39');
INSERT INTO `posts` VALUES (19, 'fsa', 'mua-oppo-trung-vision.jpg', 'asd', 1, 1, 1, '2022-04-07 04:42:13', '2022-04-13 10:22:26', '2022-04-13 10:22:26');
INSERT INTO `posts` VALUES (20, 'asdasas', 'C:\\fakepath\\product-1.png', 'asd', 0, 2, 3, '2022-04-07 04:43:26', '2022-04-13 10:21:35', '2022-04-13 10:21:35');
INSERT INTO `posts` VALUES (21, '123123123', 'img-ship.png', '231232', 1, 1, 1, '2022-04-07 04:46:51', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (22, 'zcxas', 'C:\\fakepath\\product-1.png', 'dzxdz', 1, 1, 1, '2022-04-07 04:51:29', '2022-04-13 10:21:20', '2022-04-13 10:21:20');
INSERT INTO `posts` VALUES (23, 'zcxas', 'C:\\fakepath\\product-1.png', 'dzxdz', 1, 1, 1, '2022-04-07 04:51:37', '2022-04-13 10:21:17', '2022-04-13 10:21:17');
INSERT INTO `posts` VALUES (24, 'zxczxfc', 'C:\\fakepath\\product-2.png', 'zxczxczx', 1, 1, 1, '2022-04-07 04:52:34', '2022-04-13 10:21:24', '2022-04-13 10:21:24');
INSERT INTO `posts` VALUES (25, 'zxcdadsada', 'C:\\fakepath\\product-3.png', 'sdasdasd', 1, 1, 1, '2022-04-07 04:54:57', '2022-04-13 10:21:13', '2022-04-13 10:21:13');
INSERT INTO `posts` VALUES (26, 'zxcasdasasda1123', 'C:\\fakepath\\product-3.png', 'asddas', 1, 1, 1, '2022-04-07 04:55:19', '2022-04-13 10:21:03', '2022-04-13 10:21:03');
INSERT INTO `posts` VALUES (27, '1bcbz', 'C:\\fakepath\\product-3.png', '1xa', 1, 1, 1, '2022-04-07 06:32:17', '2022-04-13 10:20:59', '2022-04-13 10:20:59');
INSERT INTO `posts` VALUES (28, 'zcxczx', '1649313660.png', 'zcxcz', 1, 2, 3, '2022-04-07 06:41:00', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (29, 'jkljk', 'VERTU-SIGNATURE-S-YELLOW-GOLD-MIX-METAL.jpg', 'jjj', 1, 1, 1, '2022-04-07 06:56:34', '2022-04-13 10:16:54', '2022-04-13 10:16:54');
INSERT INTO `posts` VALUES (30, 'sdadas', 'C:\\fakepath\\logo.png', 'dasda', 1, 2, 1, '2022-04-07 07:34:12', '2022-04-13 10:21:55', '2022-04-13 10:21:55');
INSERT INTO `posts` VALUES (31, 'hfd', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php9F1D.tmp', 'fas', 1, 1, 1, '2022-04-07 08:06:50', '2022-04-13 10:22:14', '2022-04-13 10:22:14');
INSERT INTO `posts` VALUES (32, 'dasda12', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php280B.tmp', 'asdas', 1, 1, 1, '2022-04-07 08:09:37', '2022-04-13 10:20:54', '2022-04-13 10:20:54');
INSERT INTO `posts` VALUES (33, 'xcxc', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\phpF186.tmp', 'czxzxc', 1, 1, 1, '2022-04-07 08:10:28', '2022-04-13 10:22:00', '2022-04-13 10:22:00');
INSERT INTO `posts` VALUES (34, 'anma', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\phpFE11.tmp', 'zcxz', 0, 4, 6, '2022-04-07 08:15:59', '2022-04-13 10:22:04', '2022-04-13 10:22:04');
INSERT INTO `posts` VALUES (35, '318927', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php890.tmp', '12323', 1, 4, 2, '2022-04-07 09:10:38', '2022-04-13 10:22:18', '2022-04-13 10:22:18');
INSERT INTO `posts` VALUES (36, 'sda123', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php2745.tmp', 'czxasd', 1, 2, 3, '2022-04-07 09:14:03', '2022-04-13 10:22:09', '2022-04-13 10:22:09');
INSERT INTO `posts` VALUES (37, 'zcxcczccz', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\phpF508.tmp', 'zczczczc', 1, 1, 1, '2022-04-07 09:18:12', '2022-04-13 10:21:31', '2022-04-13 10:21:31');
INSERT INTO `posts` VALUES (38, 'asda', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php96B2.tmp', 'asdas', 1, 1, 1, '2022-04-07 09:27:38', '2022-04-13 10:21:09', '2022-04-13 10:21:09');
INSERT INTO `posts` VALUES (39, 'hfgh', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php3B30.tmp', 'fasf', 1, 1, 1, '2022-04-07 09:28:20', '2022-04-13 10:20:47', '2022-04-13 10:20:47');
INSERT INTO `posts` VALUES (40, 'asdas', 'C:\\Users\\kienk\\AppData\\Local\\Temp\\php6AAA.tmp', 'dasdasdasd', 1, 1, 1, '2022-04-07 09:32:54', '2022-04-13 10:20:33', '2022-04-13 10:20:33');
INSERT INTO `posts` VALUES (41, 'vccx', '1649324594.jpg', 'vcvc', 0, 2, 6, '2022-04-07 09:43:14', '2022-04-13 10:17:34', '2022-04-13 10:17:34');
INSERT INTO `posts` VALUES (42, '12323232', '1649325892.jpg', '1233123123', 0, 8, 3, '2022-04-07 10:04:52', '2022-04-22 03:32:09', '2022-04-22 03:32:09');
INSERT INTO `posts` VALUES (43, 't241', '1649326074.png', '123123123123', 0, 4, 3, '2022-04-07 10:07:54', '2022-04-19 08:06:48', NULL);
INSERT INTO `posts` VALUES (44, 'dasdasd', '1649326397.png', 'asdasdasd', 0, 4, 3, '2022-04-07 10:13:17', '2022-04-19 06:32:56', '2022-04-19 06:32:56');
INSERT INTO `posts` VALUES (45, 'dasdasd', '1649326438.jpg', 'asdda', 0, 4, 3, '2022-04-07 10:13:58', '2022-04-19 06:32:09', '2022-04-19 06:32:09');
INSERT INTO `posts` VALUES (46, 'kawasaki', '1649747553.jpg', 'Vừa mới đây “gã khổng lồ xanh” Kawasaki đã chính thức cho ra mắt mẫu mô tô cổ điển 2022 Meguro K3 tại thị trường Nhật Bản. Mẫu xe này được cho là có thiết kế rất độc đáo.\r\n\r\nNgắm xế nổ cổ điển 2022 Kawasaki Meguro K3 chất như nước cất - 1\r\nNgắm xế nổ cổ điển 2022 Kawasaki Meguro K3 chất như nước cất - 3\r\n\r\nNgắm xế nổ cổ điển 2022 Kawasaki Meguro K3 chất như nước cất - 4\r\n\r\nTrong thực tế cái tên Meguro vốn là một thương hiệu độc lập nhưng tới năm 1960 thì Kawasaki đã tiếp quản. Nhưng mẫu xe mang tên Meguro tới nay vẫn được duy trì tối đa thiết kế chỉ khác là được cập nhật về tính năng và động cơ để trở nên hiện đại hơn.\r\n\r\nNgắm xế nổ cổ điển 2022 Kawasaki Meguro K3 chất như nước cất - 5\r\n\r\nNgắm xế nổ cổ điển 2022 Kawasaki Meguro K3 chất như nước cất - 6\r\n\r\nCụ thể, cung cấp sức mạnh cho 2022 Kawasaki Meguro K3 là khối động cơ SOHC, dung tích 773cc, 2 xi lanh, 4 van, làm mát bằng không khí, có đường kính và hành trình piston là 77 x 83 mm. Khối động cơ này cho phép xe đạt công suất tối đa 52 mã lực tại 6.500 vòng/phút và mô-men xoắn cực đại 62 Nm tại 4.800 vòng/phút.', 1, 1, 2, '2022-04-07 10:20:52', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (47, 'thời sự', '1649386904.png', '<p>thoi su vtvvtttvtvvtvtvtvtvvtvtvtvtv</p>', 0, 4, 6, '2022-04-08 03:01:44', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (48, 'Lewan', '1649747432.jpg', 'Tờ báo mạng điện tử Ba Lan Interia Sport khẳng định Lewandowski đã đạt thỏa thuận cá nhân để gia nhập Barcelona sau khi từ chối gia hạn hợp đồng với Bayern Munich\r\n\r\nLewandowski gia nhập Bayern Munich từ đại kình địch Borussia Dortmund mùa hè năm 2014 và anh đã đạt những thành công vang dội cùng đội bóng lớn nhất nước Đức. Nhưng tiền đạo người Ba Lan được cho là vẫn muốn tìm kiếm thử thách ở một đội bóng mới dù bản hợp đồng hiện tại giữa anh và “Hùm xám xứ Bavaria” còn hơn 1 năm nữa mới đáo hạn.\r\n\r\nLiverpool, Paris Saint-Germain và Man City cũng đều rất muốn có Lewandowski, nhưng ngôi sao 33 tuổi đã quyết định lựa chọn Barcelona là bến đỗ tiếp theo trong sự nghiệp của mình. Liverpool, PSG lẫn Man City thậm chí đã liên hệ với cả người đại diện của Lewy, siêu cò người Israel Pini Zahavi nhưng họ vẫn không thể có được chữ ký của ngôi sao người Ba Lan.\r\n\r\nCũng theo tờ Interia Sport, Lewandowski và Barcelona đã đạt thỏa thuận về một bản hợp đồng có thời hạn 3 năm. Trong khi đó, trang tin Barca Universal cho hay, Barca đã thông báo với người đại diện Pini Zahavi của Lewandowski rằng họ sẵn sàng đáp ứng mức lương ngất ngưởng 25-30 triệu euro/năm cho ngôi sao đã ghi đến 46 bàn thắng cho Bayern Munich mùa này.', 1, 2, 1, '2022-04-08 09:55:08', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (49, 'giáo dục', '1649414369.jpg', 'Sáng 12/4, tại Trung tâm giới thiệu việc làm tỉnh Bình Dương, hàng trăm công nhân lao động tập trung đến làm thủ tục nhận bảo hiểm thất nghiệp. Trong số đó có người làm thủ tục nhận bảo hiểm một lần. Đây là lần công nhân tập trung đông nhất kể từ đầu năm đến nay, sau 3 ngày nghỉ lễ giỗ tổ Hùng Vương.\r\n\r\nAnh Nguyễn Văn Sang (quê Thái Bình) cho biết, do ảnh hưởng của dịch COVID-19, công ty có cắt giảm nhân sự nên anh nghỉ việc và đang tìm việc mới. “BHTN tuy không nhiều nhưng phần nào hỗ trợ kinh phí trang trải trong thời gian tiếp cận công việc mới. Tôi đến làm thủ tục tại trung tâm nhưng không nghĩ lại đông người đến vậy”, anh Sang nói.', 0, 2, 5, '2022-04-08 10:39:29', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (50, 'russia', '1649746289.png', 'Interfax dẫn lời Thiếu tướng Igor Konashenkov, phát ngôn viên Bộ Quốc phòng Nga, ngày 11/4 xác nhận một tên lửa Kinzhal được khai hỏa từ đường không đã phá hủy sở chỉ huy ngầm được bảo vệ kiên cố của một đơn vị quân đội Ukraine gần làng Chasov Yar tại vùng Donbass.\r\n\r\nĐây là lần thứ 3 tên lửa Kinzhal được sử dụng ở Ukraine. Bộ Quốc phòng Nga ngày 19/3 xác nhận lần đầu tiên sử dụng Kinzhal tấn công một căn cứ ở vùng Ivano-Frankivsk ở miền Đông Ukraine. Một ngày sau, một quả Kinzhal khác được khai hỏa vào kho nhiên liệu ở tỉnh Mykolaiv.\r\n\r\nKinzhal có tốc độ tối đa khoảng Mach 10-12 (gấp 10-12 lần vận tốc âm thanh). Tổng thống Mỹ Joe Biden hôm 21/3 cho rằng Kinzhal là \"vũ khí có tác động lớn nhưng không tạo ra nhiều khác biệt ngoại trừ việc gần như không thể bị đánh chặn\".\r\n\r\nTại họp báo cùng ngày, Tướng Konashenko thông báo thêm, quân đội Nga đã bắn hạ một máy bay chiến đấu Su-27 của Ukraine gần làng Sinelnikovo, tỉnh Dnepropetrovsk, gần nơi Moscow trước đó vài giờ xác nhận phá hủy tổ hợp tên lửa phòng không S-300 do một quốc gia châu Âu gửi sang Ukraine.', 1, 4, 3, '2022-04-12 06:51:29', '2022-04-13 10:15:19', NULL);
INSERT INTO `posts` VALUES (51, 'NGA', '1649835015.jpg', '<p>Nh&agrave; Trắng hồi tuần trước cho biết Mỹ đ&atilde; cung cấp hơn 1,7 tỉ USD hỗ trợ an ninh cho Ukraine kể từ khi Nga tiến h&agrave;nh chiến dịch qu&acirc;n sự đặc biệt ở Ukraine v&agrave;o ng&agrave;y 24-2. C&aacute;c l&ocirc; h&agrave;ng vũ kh&iacute; bao gồm t&ecirc;n lửa ph&ograve;ng kh&ocirc;ng Stinger v&agrave; t&ecirc;n lửa Javelin chống tăng, cũng như đạn dược v&agrave; &aacute;o gi&aacute;p. Tổng thống Ukraine Volodymyr Zelensky đ&atilde; li&ecirc;n tục k&ecirc;u gọi c&aacute;c nh&agrave; l&atilde;nh đạo Mỹ v&agrave; ch&acirc;u &Acirc;u cung cấp vũ kh&iacute; v&agrave; thiết bị hạng nặng để đối ph&oacute; với chiến dịch qu&acirc;n sự của Nga. Theo hai nguồn thạo tin, Lầu Năm G&oacute;c dự kiến tổ chức cuộc họp với c&aacute;c l&atilde;nh đạo của 8 nh&agrave; sản xuất vũ kh&iacute; h&agrave;ng đầu Mỹ trong ng&agrave;y 13-4 để thảo luận về khả năng đ&aacute;p ứng nhu cầu của Ukraine nếu cuộc xung đột k&eacute;o d&agrave;i nhiều năm. Theo Reuters, trong diễn biến căng thẳng tại Ukraine, Tổng thống Vladimir Putin h&ocirc;m 12-4 cho biết c&aacute;c cuộc đ&agrave;m ph&aacute;n h&ograve;a b&igrave;nh với Ukraine đ&atilde; đi v&agrave;o ng&otilde; cụt.</p>', 1, 4, 6, '2022-04-13 06:37:41', '2022-04-14 07:56:54', NULL);
INSERT INTO `posts` VALUES (52, '12331', '1649902778.png', '12313', 1, 1, 1, '2022-04-14 02:19:38', '2022-04-14 02:23:25', '2022-04-14 02:23:25');
INSERT INTO `posts` VALUES (53, 'lkjk', '1649902901.jpg', 'jkj', 1, 1, 1, '2022-04-14 02:21:41', '2022-04-14 02:23:20', '2022-04-14 02:23:20');
INSERT INTO `posts` VALUES (54, '13123123', '1649902946.jpg', '123123123', 1, 1, 1, '2022-04-14 02:22:26', '2022-04-14 02:23:23', '2022-04-14 02:23:23');
INSERT INTO `posts` VALUES (55, '999999990', '1649903022.jpg', '9090', 1, 1, 1, '2022-04-14 02:23:42', '2022-04-14 02:28:19', '2022-04-14 02:28:19');
INSERT INTO `posts` VALUES (56, 'yuty', '1649903073.jpg', 'tyuyu', 1, 1, 1, '2022-04-14 02:24:33', '2022-04-14 02:28:18', '2022-04-14 02:28:18');
INSERT INTO `posts` VALUES (57, 'asdadasdas', '1649903175.jpg', 'asdasdas', 1, 1, 1, '2022-04-14 02:26:15', '2022-04-14 02:28:16', '2022-04-14 02:28:16');
INSERT INTO `posts` VALUES (58, 'asdda', '1649903251.png', 'zczx', 0, 1, 3, '2022-04-14 02:27:31', '2022-04-14 02:28:14', '2022-04-14 02:28:14');
INSERT INTO `posts` VALUES (59, 'Hang Sơn Đoòng', '1649918006.png', '<p><em>Ng&agrave;y 14/4, <strong>Google</strong> thay h&igrave;nh đại diện tr&ecirc;n trang chủ nh&acirc;n kỷ niệm ng&agrave;y ph&aacute;t hiện hang <strong>Sơn Đo&ograve;ng</strong>. <strong>Hang Sơn Đo&ograve;ng</strong>, Quảng B&igrave;nh</em>, được quảng b&aacute; tr&ecirc;n trang chủ Google dưới dạng h&igrave;nh ảnh hoạt hoạ, để kỷ niệm ng&agrave;y &ocirc;ng Hồ Khanh v&agrave; đo&agrave;n th&aacute;m hiểm Ho&agrave;ng gia Anh ch&iacute;nh thức kh&aacute;m ph&aacute; ra hang động lớn nhất thế giới, 14/4/2009. Google Doodle t&aacute;i hiện h&igrave;nh ảnh hố sụt khổng lồ nằm s&acirc;u trong hang với &aacute;nh nắng chiếu rọi l&agrave;m s&aacute;ng khung cảnh với nhiều sắc th&aacute;i xanh của n&uacute;i rừng. H&igrave;nh ảnh n&agrave;y hiện ở trang chủ Google của 17 quốc gia v&agrave; l&atilde;nh thổ bao gồm Việt Nam, Anh, Romania, Thuỵ Điển, Hy Lạp, Singapore, Th&aacute;i Lan, Mexico, Argentina...</p>', 1, 4, 3, '2022-04-14 06:33:26', '2022-04-21 06:48:09', NULL);
INSERT INTO `posts` VALUES (60, 'Trịnh Văn Quyết', '1649932552.jpg', '<p>H&Agrave; NỘI Bộ C&ocirc;ng an đề nghị c&aacute;c địa phương tạm dừng chuyển nhượng, mua b&aacute;n với t&agrave;i sản, cổ phần của cựu chủ tịch FLC <span style=\"background-color:#2ecc71\">Trịnh Văn Quyết</span> v&agrave; nhiều người li&ecirc;n quan.</p>\r\n\r\n<p>C&ocirc;ng văn do Cơ quan Cảnh s&aacute;t điều tra (Bộ C&ocirc;ng an) gửi Chủ tịch UBND c&aacute;c tỉnh, th&agrave;nh phố trực thuộc trung ương về việc phối hợp phục vụ điều tra vụ &aacute;n&nbsp;<em>Thao t&uacute;ng thị trường chứng kho&aacute;n&nbsp;</em>xảy ra tại C&ocirc;ng ty CP Tập đo&agrave;n FLC, C&ocirc;ng ty CP Chứng kho&aacute;n BOS v&agrave; c&aacute;c c&ocirc;ng ty li&ecirc;n quan.</p>\r\n\r\n<p>Bộ C&ocirc;ng an đề nghị c&aacute;c địa phương r&agrave; so&aacute;t, cung cấp th&ocirc;ng tin, t&agrave;i liệu về t&agrave;i sản như bất động sản, cổ phần, cổ phiếu, g&oacute;p vốn đứng t&ecirc;n c&aacute; nh&acirc;n cựu chủ tịch FLC&nbsp;<a href=\"https://vnexpress.net/chu-de/trinh-van-quyet-1673\" rel=\"dofollow\">Trịnh Văn Quyết</a>&nbsp;v&agrave; vợ l&agrave; b&agrave; L&ecirc; Thị Ngọc Diệp, c&ugrave;ng hai em g&aacute;i ruột&nbsp;<a href=\"https://vnexpress.net/them-em-gai-ong-trinh-van-quyet-bi-bat-4447834.html?fbclid=IwAR1FxYdSnes5A5ZTY6KmZK17gQwxMsaYY2Jit2d6wxYIL4_ZBH8GXpDcRjE\" rel=\"dofollow\">Trịnh Thị Th&uacute;y Nga</a>,&nbsp;<a href=\"https://vnexpress.net/em-gai-ong-trinh-van-quyet-bi-bat-4447450.html?fbclid=IwAR14S5HeK1GAcMY04nDp3B37XK4lPz3MQTrgogCca4X8AAVwU7EdP5as9TM\" rel=\"dofollow\">Trịnh Thị Minh Huế</a>. Trong số n&agrave;y, &ocirc;ng Quyết c&ugrave;ng hai em g&aacute;i đ&atilde; bị khởi tố, tạm giam.</p>\r\n\r\n<p>Bộ C&ocirc;ng an cũng đề nghị c&aacute;c tỉnh tạm dừng cho giao dịch chuyển nhượng, mua, b&aacute;n, cho, tặng, cầm cố, thế chấp,... với c&aacute;c khối t&agrave;i sản như bất động sản, cổ phần, g&oacute;p vốn, cổ phiếu của &ocirc;ng Quyết v&agrave; c&aacute;c c&aacute; nh&acirc;n tr&ecirc;n. C01 đề nghị cung cấp th&ocirc;ng tin trước ng&agrave;y 15/4.</p>\r\n\r\n<p>C01 trước đ&oacute; cũng&nbsp;<a href=\"https://vnexpress.net/cong-an-de-nghi-8-ngan-hang-cung-cap-ho-so-ve-ong-trinh-van-quyet-4449093.html\" rel=\"dofollow\">đề nghị 8 ng&acirc;n h&agrave;ng</a>&nbsp;cung cấp hồ sơ mở t&agrave;i khoản, th&ocirc;ng tin t&agrave;i khoản thanh to&aacute;n, tiết kiệm, tiền vay (VNĐ v&agrave; ngoại tệ), sao k&ecirc; t&agrave;i khoản, sổ phụ t&agrave;i khoản, chứng từ giao dịch (c&aacute;c b&uacute;t to&aacute;n giao dịch k&yacute;, nhận, chuyển tiền) của cựu chủ tịch FLC v&agrave; một số người li&ecirc;n quan.</p>', 1, 1, 6, '2022-04-14 10:35:52', '2022-04-21 08:44:06', NULL);
INSERT INTO `posts` VALUES (61, 'casczx', '1650015712.png', '<p>czxcas</p>', 0, 2, 5, '2022-04-15 09:41:52', '2022-04-15 09:41:55', '2022-04-15 09:41:55');
INSERT INTO `posts` VALUES (62, '234', '1650019221.png', '<p>123</p>', 0, 1, 1, '2022-04-15 10:40:21', '2022-04-19 04:02:15', '2022-04-19 04:02:15');
INSERT INTO `posts` VALUES (63, 'asd', '1650019308.jpg', '<p>asd</p>', 0, 1, 1, '2022-04-15 10:41:48', '2022-04-18 13:12:19', '2022-04-18 13:12:19');
INSERT INTO `posts` VALUES (64, 'zxc', '1650288569.jpg', 'zxc', 0, 1, 1, '2022-04-18 13:29:29', '2022-04-18 13:39:09', '2022-04-18 13:39:09');
INSERT INTO `posts` VALUES (65, 'ad', '1650595174.jpg', 'asd', 1, 1, 2, '2022-04-22 02:39:34', '2022-04-22 02:41:40', '2022-04-22 02:41:40');
INSERT INTO `posts` VALUES (66, 'kokoko', '1650596949.jpg', '<p>koko</p>', 0, 2, 6, '2022-04-22 03:09:09', '2022-04-22 03:31:03', '2022-04-22 03:31:03');
INSERT INTO `posts` VALUES (67, 'asdasdasd', '1650598676.jpg', 'asdasasd', 1, 1, 5, '2022-04-22 03:37:56', '2022-04-22 03:38:10', '2022-04-22 03:38:10');
INSERT INTO `posts` VALUES (68, 'sfa', '1650598816.jpg', '<p>zxczxczxcxczxczxczxc</p>', 0, 1, 5, '2022-04-22 03:40:16', '2022-04-25 03:22:14', '2022-04-25 03:22:14');
INSERT INTO `posts` VALUES (69, 'fds', '1650598877.jpg', 'fds', 0, 1, 1, '2022-04-22 03:41:17', '2022-04-22 03:58:12', '2022-04-22 03:58:12');
INSERT INTO `posts` VALUES (70, 'das', '1650598899.jpg', 'dasd', 1, 1, 6, '2022-04-22 03:41:39', '2022-04-22 03:58:10', '2022-04-22 03:58:10');
INSERT INTO `posts` VALUES (71, 'dasdqqe', '1650598959.jpg', 'dasdqw', 1, 1, 6, '2022-04-22 03:42:39', '2022-04-22 03:58:00', '2022-04-22 03:58:00');
INSERT INTO `posts` VALUES (72, 'ijiji', 'kawasaki.jpg', '<p>ijijijiji</p>', 0, 2, 6, '2022-04-22 06:55:32', '2022-04-25 03:22:09', '2022-04-25 03:22:09');
INSERT INTO `posts` VALUES (73, 'lealaasd', 'public/uploads/1650610643.jpg', '<p>dasdzxc</p>', 0, 2, 5, '2022-04-22 06:57:23', '2022-04-22 07:21:25', '2022-04-22 07:21:25');
INSERT INTO `posts` VALUES (74, 'um', '$folderName\\1650856553.jpg', '<p>mu</p>', 0, 4, 1, '2022-04-25 03:15:53', '2022-04-25 03:22:07', '2022-04-25 03:22:07');
INSERT INTO `posts` VALUES (75, 'zcx', '$folderName\\1650856886.jpg', '<p>vzx</p>', 1, 2, 1, '2022-04-25 03:21:26', '2022-04-25 03:22:05', '2022-04-25 03:22:05');
INSERT INTO `posts` VALUES (76, 'MU', 'uploads\\1650856953.jpg', '<p>MU</p>', 1, 4, 1, '2022-04-25 03:22:33', '2022-04-25 03:43:58', '2022-04-25 03:43:58');
INSERT INTO `posts` VALUES (77, 'MUU', 'uploads\\1650857624.jpg', '<p>MUU</p>', 1, 2, 1, '2022-04-25 03:33:44', '2022-04-25 03:44:00', '2022-04-25 03:44:00');
INSERT INTO `posts` VALUES (78, 'ausmduma', 'uploads\\1650857786.jpg', '<p>admuuuad</p>', 0, 2, 1, '2022-04-25 03:36:26', '2022-04-25 03:44:02', '2022-04-25 03:44:02');
INSERT INTO `posts` VALUES (79, 'adsmmmu', '1650858231.jpg', '<p>asdas</p>', 1, 2, 1, '2022-04-25 03:43:51', '2022-04-25 04:11:34', '2022-04-25 04:11:34');
INSERT INTO `posts` VALUES (80, 'ddonghsom', '1650858485.png', '<p>dognansom</p>', 0, 2, 5, '2022-04-25 03:48:05', '2022-04-25 04:11:32', '2022-04-25 04:11:32');
INSERT INTO `posts` VALUES (81, 'vxcqqw', '1650859531.jpg', '<p>qww</p>', 1, 1, 2, '2022-04-25 04:05:31', '2022-04-25 04:11:16', '2022-04-25 04:11:16');
INSERT INTO `posts` VALUES (82, 'ManUTD', '1651033769.jpg', '<p>Đ&acirc;y đang l&agrave; thời điểm quyết định của m&ugrave;a giải năm nay khi c&aacute;c cuộc đua ng&agrave;y c&agrave;ng trở n&ecirc;n căng thẳng hơn. T&acirc;m điểm của v&ograve;ng 34 Ngoại hạng Anh ch&iacute;nh l&agrave; cuộc đối đầu giữa Arsenal v&agrave;&nbsp;<a href=\"https://www.24h.com.vn/manchester-united-c48e1521.html\" title=\"Man United\">Man United</a>. Với &yacute; nghĩa của một trận cầu 6 điểm khi cả hai đang cạnh tranh cho vị tr&iacute; thứ 4 tr&ecirc;n bảng xếp hạng, nhiều người chờ đợi một m&agrave;n rượt đuổi hấp dẫn v&agrave; kịch t&iacute;nh tại Emirates.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Hấp dẫn vòng 34 Ngoại hạng Anh: MU thảm bại Arsenal, Man City - Liverpool đua nghẹt thở - 1\" src=\"https://cdn.24h.com.vn/upload/2-2022/images/2022-04-25/nha-2-740-1650852308-28-width740height315.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Arsenal đ&aacute;nh bại MU&nbsp;tr&ecirc;n s&acirc;n nh&agrave;</p>\r\n\r\n<p>Thế nhưng, Arsenal lại sớm dập tắt &yacute; ch&iacute; chiến đấu của MU khi c&oacute; b&agrave;n thắng sớm ở ngay ph&uacute;t thứ 3 do c&ocirc;ng của Nuno Tavares. Tới ph&uacute;t 32, Bukayo Saka nh&acirc;n đ&ocirc;i c&aacute;ch biệt cho &quot;Ph&aacute;o thủ&quot; từ chấm phạt đền, trước khi Cristiano Ronaldo đ&aacute;nh dấu sự trở lại của m&igrave;nh sau biến cố gia đ&igrave;nh bằng b&agrave;n gỡ 1-2 để thắp l&ecirc;n hy vọng cho MU trước giờ nghỉ.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:41.7031px; top:52px\">&nbsp;</div>', 1, 4, 1, '2022-04-25 04:06:59', '2022-04-27 04:29:29', NULL);
INSERT INTO `posts` VALUES (83, '12312412312312', '1650861336.jpg', '<p>12312312</p>', 1, 1, 2, '2022-04-25 04:35:36', '2022-04-25 04:35:40', '2022-04-25 04:35:40');
INSERT INTO `posts` VALUES (84, 'asdasd', '1650874853.jpg', 'asddas', 0, 2, 6, '2022-04-25 08:20:53', '2022-04-25 08:21:08', '2022-04-25 08:21:08');
INSERT INTO `posts` VALUES (85, '123dajssdn', '1650967702.jpg', '<h2>(D&acirc;n tr&iacute;) - Qu&acirc;n đội Nga tuy&ecirc;n bố đ&atilde; ph&aacute; hủy 6 ga đường sắt ở miền T&acirc;y Ukraine được coi l&agrave; c&aacute;c đường tiếp viện kh&iacute; t&agrave;i qu&acirc;n sự của nước ngo&agrave;i cho Ukraine.</h2>\r\n\r\n<p><img alt=\"Nga tuyên bố phá hủy đường tiếp viện của phương Tây cho Ukraine - 1\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/26/ten-luart-1650963715111.jpg\" title=\"Nga tuyên bố phá hủy đường tiếp viện của phương Tây cho Ukraine - 1\" /></p>\r\n\r\n<p>Nga khai hỏa một t&ecirc;n lửa chiến thuật Iskander trong chiến dịch tại Ukraine (Ảnh: Sputnik).</p>\r\n\r\n<p><em>RT</em>&nbsp;dẫn lời người ph&aacute;t ng&ocirc;n Bộ Quốc ph&ograve;ng Nga Igor Konashenkov ng&agrave;y 25/4 cho biết, qu&acirc;n đội Nga đ&atilde; ph&aacute; hủy 6 nh&agrave; ga đường sắt ở c&aacute;c khu vực miền T&acirc;y Ukraine gồm Krasnoye, Zdolbunov, Zhmerinka, Berdichev, Kovel v&agrave; Korosten.</p>\r\n\r\n<p>Theo lời &ocirc;ng Konashenkov, đ&acirc;y l&agrave; c&aacute;c nh&agrave; ga điều h&agrave;nh những tuyến đường sắt &quot;đang được sử dụng để vận chuyển vũ kh&iacute;, kh&iacute; t&agrave;i&nbsp;<a href=\"https://dantri.com.vn/the-gioi/quan-su.htm\">qu&acirc;n sự</a>&nbsp;của nước ngo&agrave;i cho lực lượng Ukraine ở Donbass&quot;. Ngo&agrave;i ra, &ocirc;ng Konashenkov cho hay, qu&acirc;n đội Nga cũng kh&ocirc;ng k&iacute;ch ph&aacute; hủy 27 mục ti&ecirc;u qu&acirc;n sự kh&aacute;c của Ukraine, trong đ&oacute; c&oacute; 4 trung t&acirc;m chỉ huy.</p>\r\n\r\n<p>Trước đ&oacute;, &ocirc;ng Oleksander Kamyshin, người đứng đầu ng&agrave;nh đường sắt Ukraine, n&oacute;i rằng Nga đ&atilde; kh&ocirc;ng k&iacute;ch 5 ga đường sắt ở miền Trung v&agrave; miền T&acirc;y nước n&agrave;y trong khoảng một giờ đồng hồ. Đợt kh&ocirc;ng k&iacute;ch đầu ti&ecirc;n bắt đầu khoảng 8h30 s&aacute;ng ng&agrave;y 25/4 ở Krasne, gần th&agrave;nh phố Lviv.</p>\r\n\r\n<p>Qu&acirc;n đội Ukraine cho biết, ph&iacute;a Nga đang t&igrave;m c&aacute;ch ph&aacute; hủy hạ tầng đường sắt nhằm l&agrave;m gi&aacute;n đoạn nguồn tiếp viện kh&iacute; t&agrave;i qu&acirc;n sự của nước ngo&agrave;i cho Kiev. &quot;Họ đang cố ph&aacute; hủy c&aacute;c đường tiếp tế qu&acirc;n sự của c&aacute;c nước đối t&aacute;c cho Ukraine. Để l&agrave;m được điều đ&oacute;, họ tập trung kh&ocirc;ng k&iacute;ch mạng lưới đường sắt của ch&uacute;ng t&ocirc;i&quot;, &ocirc;ng Kamyshin viết tr&ecirc;n Facebook.</p>\r\n\r\n<p>Kể từ khi Nga ở chiến dịch qu&acirc;n sự ở Ukraine hồi cuối th&aacute;ng 2, phương T&acirc;y li&ecirc;n tục cung cấp vũ kh&iacute;, trang thiết bị gi&uacute;p Kiev đối ph&oacute; đ&agrave; tiến c&ocirc;ng của Moscow. Thậm ch&iacute;, gần đ&acirc;y, khi Nga chuyển trọng t&acirc;m, dồn lực lượng cho mặt trận Donbass ở miền Đ&ocirc;ng Ukraine, c&aacute;c nước phương T&acirc;y cũng rục rịch chuyển cho Kiev những vũ kh&iacute; hiện đại hơn, hạng nặng hơn như hệ thống ph&ograve;ng thủ t&ecirc;n lửa, xe tăng, xe bọc th&eacute;p, m&aacute;y bay kh&ocirc;ng người l&aacute;i chiến thuật.</p>\r\n\r\n<p>Phương T&acirc;y giữ b&iacute; mật về c&aacute;c tuyến đường vận chuyển vũ kh&iacute; cho Ukraine, song một số nguồn tin n&oacute;i rằng, nhiều l&ocirc; vũ kh&iacute; được vận chuyển th&ocirc;ng qua nước l&aacute;ng giềng Ba Lan.<br />\r\nHồi th&aacute;ng 3, Washington Post dẫn c&aacute;c nguồn thạo tin cho hay, c&aacute;c vũ kh&iacute; phương T&acirc;y chuyển cho Ukraine được tập kết tại một s&acirc;n bay b&iacute; mật ở Đ&ocirc;ng &Acirc;u. Bộ Tư lệnh ch&acirc;u &Acirc;u của Mỹ (EUCOM) được cho l&agrave; đ&oacute;ng vai tr&ograve; trung t&acirc;m của chiến dịch vận chuyển quy m&ocirc; lớn n&oacute;i tr&ecirc;n th&ocirc;ng qua việc sử dụng mạng lưới li&ecirc;n lạc với c&aacute;c đồng minh v&agrave; đối t&aacute;c để phối hợp giao nhận vũ kh&iacute; cho Ukraine.</p>\r\n\r\n<p>Nga nhiều lần chỉ tr&iacute;ch việc Mỹ v&agrave; đồng minh cung cấp vũ kh&iacute; cho Ukraine l&agrave; h&agrave;nh động nguy hiểm, đồng thời cảnh b&aacute;o bất cứ l&ocirc; vũ kh&iacute; nước ngo&agrave;i n&agrave;o v&agrave;o Ukraine cũng c&oacute; thể trở th&agrave;nh &quot;mục ti&ecirc;u ch&iacute;nh đ&aacute;ng&quot; của lực lượng Nga. Ngoại trưởng Nga Sergei Lavrov h&ocirc;m 25/4 n&oacute;i, việc phương T&acirc;y trang bị vũ kh&iacute; cho Ukraine &quot;kh&ocirc;ng kh&aacute;c n&agrave;o đang tham chiến với Nga&quot;. &quot;Những vũ kh&iacute; n&agrave;y sẽ l&agrave; mục ti&ecirc;u ch&iacute;nh đ&aacute;ng của qu&acirc;n đội Nga trong bối cảnh chiến dịch qu&acirc;n sự đặc biệt. C&aacute;c kho vũ kh&iacute; ở T&acirc;y Ukraine đ&atilde; hơn một lần bị tấn c&ocirc;ng. Điều đ&oacute; kh&ocirc;ng thể kh&aacute;c được&quot;, Ngoại trưởng Lavrov n&oacute;i.</p>\r\n\r\n<p>Bất chấp những cảnh b&aacute;o n&agrave;y, phương T&acirc;y vẫn tiếp tục cung cấp vũ kh&iacute;, trang thiết bị gi&uacute;p Ukraine đối ph&oacute; chiến dịch của Nga. Trong một diễn biến li&ecirc;n quan, Bộ trưởng Quốc ph&ograve;ng Mỹ Lloyd Austin h&ocirc;m nay 26/4 đ&atilde; chủ tr&igrave; một cuộc họp với giới chức qu&acirc;n sự của hơn 40 quốc gia tại căn cứ kh&ocirc;ng qu&acirc;n Ramstein của Đức. Cuộc họp được cho l&agrave; tập trung v&agrave;o nội dung l&agrave;m thế n&agrave;o để trang bị vũ kh&iacute; gi&uacute;p Ukraine đối ph&oacute; chiến dịch của Nga ở Donbass.</p>\r\n\r\n<p>Tin li&ecirc;n quan</p>', 0, 2, 5, '2022-04-26 10:08:22', '2022-04-27 02:22:45', '2022-04-27 02:22:45');
INSERT INTO `posts` VALUES (86, 'ohmygod', '1651025937.jpg', '<p>ok la</p>', 0, 4, 3, '2022-04-27 02:18:57', '2022-04-27 04:03:06', '2022-04-27 04:03:06');
INSERT INTO `posts` VALUES (87, 'oki', '/uploads/695787.png', '<p>oki</p>', 0, 4, 6, '2022-04-27 02:20:02', '2022-04-27 02:22:37', '2022-04-27 02:22:37');
INSERT INTO `posts` VALUES (88, 'okelaacaaa', '1651031522.png', '<p>pok</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:72.7812px; top:92px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 1, 4, 1, '2022-04-27 02:22:28', '2022-04-27 04:03:05', '2022-04-27 04:03:05');
INSERT INTO `posts` VALUES (89, 'asyohyeah', 'http://project1.test:8080/uploads/695787.png', '<p>oiiooiio</p>', 0, 4, 6, '2022-04-27 03:28:37', '2022-04-27 03:29:32', '2022-04-27 03:29:32');
INSERT INTO `posts` VALUES (90, '6hfih', '695787.png', '<p>rweer</p>', 0, 4, 5, '2022-04-27 04:02:31', '2022-04-27 04:03:03', '2022-04-27 04:03:03');
INSERT INTO `posts` VALUES (91, 'werg5', '1651032163.jpg', '<p>ger</p>', 1, 4, 5, '2022-04-27 04:02:43', '2022-04-27 04:03:01', '2022-04-27 04:03:01');
INSERT INTO `posts` VALUES (92, 'Đã khởi tố 8 cán bộ', '695787.png', '<h2>(D&acirc;n tr&iacute;) - Từ đầu năm đến nay, c&aacute;c cơ quan tố tụng đ&atilde; khởi tố 8 c&aacute;n bộ diện Trung ương quản l&yacute;. Trong đ&oacute; c&oacute; 1 thứ trưởng, 1 nguy&ecirc;n thứ trưởng, 1 nguy&ecirc;n Chủ tịch UBND tỉnh, 5 sỹ quan cấp tướng...</h2>\r\n\r\n<p>Ng&agrave;y 27/4, Tổng B&iacute; thư Nguyễn Ph&uacute; Trọng, Trưởng Ban Chỉ đạo Trung ương về ph&ograve;ng, chống tham nhũng, ti&ecirc;u cực đ&atilde; chủ tr&igrave; cuộc họp Thường trực Ban Chỉ đạo Trung ương về ph&ograve;ng, chống tham nhũng, ti&ecirc;u cực để thảo luận, cho &yacute; kiến chỉ đạo xử l&yacute; c&aacute;c vụ &aacute;n, vụ việc thuộc diện Ban Chỉ đạo theo d&otilde;i, chỉ đạo.</p>\r\n\r\n<p>Th&ocirc;ng b&aacute;o của Ban Nội ch&iacute;nh Trung ương (Cơ quan Thường trực của Ban Chỉ đạo) n&ecirc;u r&otilde;, thời gian vừa qua, c&aacute;c cơ quan chức năng, nhất l&agrave; Qu&acirc;n đội, C&ocirc;ng an, Viện kiểm s&aacute;t, T&ograve;a &aacute;n, Ủy ban Kiểm tra Trung ương, Ban Nội ch&iacute;nh v&agrave; c&aacute;c th&agrave;nh vi&ecirc;n Ban Chỉ đạo c&oacute; nhiều nỗ lực, cố gắng, kịp thời chỉ đạo th&aacute;o gỡ kh&oacute; khăn, vướng mắc, đẩy nhanh tiến độ x&aacute;c minh, điều tra, xử l&yacute; nhiều vụ việc, vụ &aacute;n tham nhũng, ti&ecirc;u cực nghi&ecirc;m trọng, phức tạp, dư luận x&atilde; hội quan t&acirc;m.</p>\r\n\r\n<p><img alt=\"Đã khởi tố 8 cán bộ thuộc diện Trung ương quản lý - 1\" src=\"https://icdn.dantri.com.vn/thumb_w/770/2022/04/27/vnapotaltongbithunguyenphutrongchutrihopthuongtrucbanchidaotrunguongvephongchongthamnhungtieucuc6074606-1651047523218.jpg\" title=\"Đã khởi tố 8 cán bộ thuộc diện Trung ương quản lý - 1\" /></p>\r\n\r\n<p>Tổng B&iacute; thư Nguyễn Ph&uacute; Trọng chủ tr&igrave; cuộc họp Thường trực Ban Chỉ đạo Trung ương về ph&ograve;ng, chống tham nhũng, ti&ecirc;u cực.</p>\r\n\r\n<p>Từ đầu năm đến nay, c&aacute;c cơ quan tố tụng cả nước đ&atilde; khởi tố, điều tra nhiều vụ &aacute;n lớn, đặc biệt nghi&ecirc;m trọng, phức tạp, như: Vụ &aacute;n &quot;Tham &ocirc; t&agrave;i sản; Lợi dụng chức vụ, quyền hạn trong khi thi h&agrave;nh c&ocirc;ng vụ v&agrave; Vi phạm quy định về đấu thầu g&acirc;y hậu quả nghi&ecirc;m trọng&quot; xảy ra tại Học viện Qu&acirc;n y, Bộ Quốc ph&ograve;ng; Vụ &aacute;n &quot;Tham &ocirc; t&agrave;i sản; Lợi dụng chức vụ, quyền hạn trong khi thi h&agrave;nh c&ocirc;ng vụ&quot; xảy ra tại Bộ Tư lệnh Cảnh s&aacute;t biển Việt Nam; Vụ &aacute;n &quot;Đưa hối lộ; Nhận hối lộ&quot; xảy ra tại Cục L&atilde;nh sự, Bộ Ngoại giao v&agrave; một số cơ quan c&oacute; li&ecirc;n quan; Vụ &aacute;n &quot;Thao t&uacute;ng thị trường chứng kho&aacute;n&quot; xảy ra tại C&ocirc;ng ty cổ phần tập đo&agrave;n FLC; Vụ &aacute;n &quot;Lừa đảo chiếm đoạt t&agrave;i sản&quot; xảy ra tại C&ocirc;ng ty TNHH Thương mại v&agrave; dịch vụ kh&aacute;ch sạn T&acirc;n Ho&agrave;ng Minh. Đ&atilde; khởi tố 8 c&aacute;n bộ diện Trung ương quản l&yacute; trong đ&oacute; c&oacute; 1 thứ trưởng, 1 nguy&ecirc;n thứ trưởng, 1 nguy&ecirc;n Chủ tịch UBND tỉnh, 5 sỹ quan cấp tướng trong lực lượng vũ trang.</p>', 1, 4, 6, '2022-04-27 10:55:28', '2022-05-04 02:43:14', NULL);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (4, 4, 1, NULL, NULL);
INSERT INTO `role_user` VALUES (6, 2, 3, NULL, NULL);
INSERT INTO `role_user` VALUES (7, 8, 4, NULL, NULL);
INSERT INTO `role_user` VALUES (11, 57, 4, NULL, NULL);
INSERT INTO `role_user` VALUES (13, 58, 4, NULL, NULL);
INSERT INTO `role_user` VALUES (14, 59, 2, NULL, NULL);
INSERT INTO `role_user` VALUES (15, 59, 3, NULL, NULL);
INSERT INTO `role_user` VALUES (16, 59, 4, NULL, NULL);
INSERT INTO `role_user` VALUES (25, 1, 2, NULL, NULL);
INSERT INTO `role_user` VALUES (30, 11, 4, NULL, NULL);
INSERT INTO `role_user` VALUES (33, 68, 2, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Quản trị viên', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'writer', 'Người viết bài', NULL, NULL);
INSERT INTO `roles` VALUES (3, 'editor', 'Người chỉnh sửa', NULL, NULL);
INSERT INTO `roles` VALUES (4, 'restorer', 'Người khôi phục', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`userName`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'A', 'Van', 'Nguyen', 'nguyenvana', 'nguyenvana@gmail.com', 'nguyenvana.jpg', '$2y$10$pV.zsbktC0Bby5hECXA1VOwzmIwGlSLQnSM30OGm.zi19Lv9L8ama', NULL, '2022-05-05 02:58:55', NULL);
INSERT INTO `users` VALUES (2, 'B', 'Van', 'Nguyen', 'nguyenvanb', 'nguyenvanb@gmail.com', 'nguyenvanb.jpg', '$2y$10$BQ4qos2gr9qXeX9Ll0sAxOQui7Oeb70hbwOeqTWz5ghWZMGT9DwOa', NULL, '2022-05-04 08:24:32', NULL);
INSERT INTO `users` VALUES (4, 'Kiên', 'Thế', 'Vũ', 'kienvu', 'vuthekien4398@gmail.com', 'kienvu.jpg', '$2y$10$Lalv917g.VdHA/fPXtB5xut5GWBRHlPwG0rx2U6kJ27Lky2bG4U7u', '2022-03-31 04:25:14', '2022-05-04 07:16:17', NULL);
INSERT INTO `users` VALUES (8, 'b', 'b', 'b', 'bbbb', 'bbbd@gmail.com', 'bbbb.jpg', '$2y$10$YjjtOf1eArUz7tVzd8VF1e1V9x0NFAlzALSjxxMkbENWE6dEjlHKS', '2022-03-31 08:13:20', '2022-05-04 08:03:40', NULL);
INSERT INTO `users` VALUES (9, 'vũ', 'thế', 'kiên', '213232', '123123123@gmail.com', '213232.jpg', '$2y$10$PXd25mP1NKPsidKN3vdB/uJNllAXwgY.GOe/UzxiuM3bwwYUVHFIu', '2022-04-03 14:17:52', '2022-04-19 09:44:01', '2022-04-19 09:44:01');
INSERT INTO `users` VALUES (10, 'xyz', 'acb', 'abc', 'abvaxax', 'avsvas@gmail.com', 'abvaxax.jpg', '$2y$10$0WkO/450nh/qYRj6yISmVOuVstFaT6UyzFgZl1VyeLQUakoi75r9W', '2022-04-04 14:43:43', '2022-04-19 09:43:21', '2022-04-19 09:43:21');
INSERT INTO `users` VALUES (11, 'nam', 'van', 'tran', 'nam123', 'namca@gmail.com', 'namca@gmail.com.jpg', '$2y$10$UKeqBpNPXYiWvakULvA1Ceve2iXWhDCCcwArZCUbjD9TY2uRzTgRm', '2022-04-04 14:47:56', '2022-04-22 10:06:22', NULL);
INSERT INTO `users` VALUES (12, 'chan', 'icu', 'xuka', 'xuka', 'xuka@gmail.com', '1649083823.jpg', '$2y$10$3w8ZqtA6N0wphBBhcvOjvO6p1/qjY9tRg64AUTWdCY2RnBtQVR.pa', '2022-04-04 14:50:23', '2022-04-15 08:24:42', NULL);
INSERT INTO `users` VALUES (13, 'tu', 'van', 'ver', 'vuter', 'vertu@gmial.com', '1650380560.jpg', '$2y$10$/SyiOc1r7cLD66/IMPenye75Aej.0LZEslft/l9hg7QD3Mp/8wW1C', '2022-04-04 14:59:01', '2022-04-19 15:02:40', NULL);
INSERT INTO `users` VALUES (14, 'qwe', 'qwe', 'qwe', 'qwe', 'qwend@gmail.com', '1649232695.jpg', '$2y$10$zCodNr.TTR0.xzEW9LTQgOQtxKxDP/Ww86ky.gnTwj97kKVWuT6X6', '2022-04-06 08:11:35', '2022-04-06 08:21:05', '2022-04-06 08:21:05');
INSERT INTO `users` VALUES (15, 'ád', 'qưe', '123', 'asdz', 'aaaza@gmail.com', '1649236196.jpg', '$2y$10$JPmcIkXPtj1NAjJC/EtrJ.DU2kU/h6OrYhCmGkNR1ti1jBnXmjBO.', '2022-04-06 09:09:56', '2022-04-19 09:44:27', '2022-04-19 09:44:27');
INSERT INTO `users` VALUES (16, 'ádă', 'sđâ', 'ấđá', 'sdsd', 'sdsynd@gmail.com', '1649301639.png', '$2y$10$LGZ.NQkT7obpU6j2J3ejlekBsqYZTtC/4r3HK7q2ioZa4XAyhWjnu', '2022-04-06 09:46:19', '2022-04-07 03:20:39', NULL);
INSERT INTO `users` VALUES (17, 'asdasd', 'asdasd', 'asdasd', 'adasd', 'asdasd', '1649317065.png', '$2y$10$paP2FiuFIzjJk/FFoid7B.rfDh5Pte6uFGFNNbZOmOyZRvKvDpNqa', '2022-04-07 07:37:45', '2022-04-22 04:11:35', '2022-04-22 04:11:35');
INSERT INTO `users` VALUES (18, '123', '123', '123', '123', '123nda@gmail.com', '1649317768.png', '$2y$10$mOBJLlYovE4GUiHVIiPPBeGJ5fiQZ7H2SRaEpzbo.yzR9WzpkFI72', '2022-04-07 07:49:28', '2022-04-19 09:51:06', '2022-04-19 09:51:06');
INSERT INTO `users` VALUES (19, 'xasdzx', 'dasdz', 'asdadaz', 'asdas', 'zcxasd@gmail.com', '1649318389.jpg', '$2y$10$XTwocbd3sD.JA5PfthLSRu3sAh9EszCKedy9kvDpvJTfgAMVurcXm', '2022-04-07 07:59:49', '2022-04-22 03:46:43', '2022-04-22 03:46:43');
INSERT INTO `users` VALUES (20, 'asd', 'asd', 'asd', 'asd', 'asd', '1649318436.jpg', '$2y$10$U0SfN6KfZnehobYyjPiI1.APNZdDnt728mOfn9PIyYVgUFkb45F/.', '2022-04-07 08:00:36', '2022-04-15 09:51:00', '2022-04-15 09:51:00');
INSERT INTO `users` VALUES (21, '523', '123', '432', '542', '421', '1649319570.jpg', '$2y$10$UrFhFyeTgZWews8aFk4lEONKkaVfY58vpxwlfWSrMHTzXJoA5RSnu', '2022-04-07 08:19:31', '2022-04-26 07:02:53', '2022-04-26 07:02:53');
INSERT INTO `users` VALUES (22, 'zxczxczx', 'zxczxczx', 'zxczxcz', 'zxczxc', 'zcxasd@gmail.comzxc', '1649323146.jpg', '$2y$10$DpUr4EJS0IxAzVtZEDMqMOgGOHY.FeS4gCCWF68U2FsWT4kLsGTTi', '2022-04-07 09:19:06', '2022-04-26 07:02:52', '2022-04-26 07:02:52');
INSERT INTO `users` VALUES (23, 'asdasd', 'dasdasda', 'adsdasda', 'asdasda', 'asdasd', '1649325304.jpg', '$2y$10$sdiW5q0EOfW18BcM9/iFIOzt0culRx78B3E5rXwsCdsOe0rTcY5UO', '2022-04-07 09:55:04', '2022-04-08 03:44:10', '2022-04-08 03:44:10');
INSERT INTO `users` VALUES (24, 'asdasdas', 'dasd', 'sdadsdas', 'asdasd', 'asdas@dfsad', '1649325574.jpg', '$2y$10$GZ4tsJuM00I1PcT8Vm8Y7.uWvq8WsHf/gTTMOf8abOfe50p5.mqKK', '2022-04-07 09:59:34', '2022-04-08 03:42:37', '2022-04-08 03:42:37');
INSERT INTO `users` VALUES (25, 'd', 'd', 'czxasdas', 'dd', 'qd', '1649325608.jpg', '$2y$10$RaB4vSP5j6AF3pvli2SwnuGntaVXEiSk/434DX6D5pZ/s52DJN.Zu', '2022-04-07 10:00:08', '2022-04-08 03:40:45', '2022-04-08 03:40:45');
INSERT INTO `users` VALUES (26, 'd', 'dsad', 'sadas', 'dasd', 'dsad', '1649325641.jpg', '$2y$10$WDJGrpNItOG0nAj.pBNSDO4ABaI41cxF/PM9L8ZZe2o4AlgIi5c62', '2022-04-07 10:00:41', '2022-04-08 03:40:23', '2022-04-08 03:40:23');
INSERT INTO `users` VALUES (27, 'dasda', 'dasda', 'dasda', 'dsada', 'dasd@gmail.com', '1649325726.png', '$2y$10$1QJoaH2VEZ2ELvTUU3pY9.wgi5Ug/o5aUzwHVYF3p2uWUKJAQd8iy', '2022-04-07 10:02:06', '2022-04-26 07:02:49', '2022-04-26 07:02:49');
INSERT INTO `users` VALUES (28, 'dsad', 'dsad', 'asdd', 'dsawd', 'das', '1649325764.png', '$2y$10$N/iB3yUx9AUACs6U9ytvfuuP48tkEPFa8tZbKI.RzAMVE1/wZM5qK', '2022-04-07 10:02:44', '2022-04-08 03:32:23', '2022-04-08 03:32:23');
INSERT INTO `users` VALUES (29, '4342', '23423', '45523', '12341', '14412', '1649325824.jpg', '$2y$10$Yua45pEOf2nwsszsJT41E.j5JJg0h0srkFINQ1MQU2HQ8U9sKjh7K', '2022-04-07 10:03:44', '2022-04-08 03:31:47', '2022-04-08 03:31:47');
INSERT INTO `users` VALUES (30, 'vũ', 'thế', 'kiên', 'vuthe123', '1231232@gmail.com', '1649384500.png', '$2y$10$DIhsugJFZS.GU7.oeHKYiuQfQuVcDJCikKh.HtJMZ3BvWNs7LrJN6', '2022-04-08 02:21:40', '2022-04-08 03:31:35', '2022-04-08 03:31:35');
INSERT INTO `users` VALUES (35, 'a', 'a', 'a', 'a', 'a', '1649384634.png', '$2y$10$tWV/ReSDJOgUlMbFNdnbHOeEWk.Jfn7/meVUcgY87h7NysyvYEkfW', '2022-04-08 02:23:54', '2022-04-08 03:28:16', '2022-04-08 03:28:16');
INSERT INTO `users` VALUES (36, '12', '12', '1', '12', '123@21', '1649385707.png', '$2y$10$XPH3FVR6UMNbyTTs3B9H8.KOSk33ZMpiAUJCvn/e4Pzuj45HMxspC', '2022-04-08 02:41:47', '2022-04-08 03:27:28', '2022-04-08 03:27:28');
INSERT INTO `users` VALUES (37, 'vũ', 'thế', 'kiên', '1233112', 'kienkoynd@gmail.com', '1649387107.jpg', '$2y$10$I6c1nzkVhJon2NuXkUaCPOmM58Z45LVJ0HLwD2pueZyGcPiE95B/W', '2022-04-08 03:05:07', '2022-04-08 03:27:06', '2022-04-08 03:27:06');
INSERT INTO `users` VALUES (38, 'as', 'as', 'as', 'asdf', 'asdas@gaa', '1649402470.png', '$2y$10$vxq5bjow3cJlPWIZSu9CvORfNPm/hZyyuaLNkL5rN7Yejqi40ILnm', '2022-04-08 07:21:10', '2022-04-26 07:02:47', '2022-04-26 07:02:47');
INSERT INTO `users` VALUES (39, 'vũ', 'thế', 'kiên', 'nguyenvanc31', 'kienkoynd@gmail.com', '1649406817.jpg', '$2y$10$UG5VRyO2yWFHayb3VKw4Eu4DXMQiRbpw43yKDar9h6ZCM424v4bWK', '2022-04-08 08:33:37', '2022-04-26 07:02:45', '2022-04-26 07:02:45');
INSERT INTO `users` VALUES (40, 'ac', 'asd', 'âcc', '12312', 'kienkoynd@gmail.com', '1649750658.jpg', '$2y$10$1wiTp7izXoGH8aVhFWyBQeJ1h3DXGpAXfvkk3c0iZ6C5Wa1sx9g/u', '2022-04-12 08:04:18', '2022-04-19 09:52:22', '2022-04-19 09:52:22');
INSERT INTO `users` VALUES (41, 'vũ', 'thế', 'kiên', 'nguyenvanc11', 'kienkoynd@gmail.com', '1649753017.jpg', '$2y$10$s0rGGtQ45oelQz4Ot.bj/uiw7HviCoQGm9DoRqs38cIOE21XsjpsK', '2022-04-12 08:43:37', '2022-04-19 09:51:36', '2022-04-19 09:51:36');
INSERT INTO `users` VALUES (43, 'vũ', 'thế', 'kiên', 'asdasdasd', 'asasd@gmail.com', '1649754316.png', '$2y$10$NZ5toN5xi49uB53bRBBbkutak/l6XV4KSR7qmzLpOkil9xlZGe1gC', '2022-04-12 09:05:16', '2022-04-19 06:21:46', '2022-04-19 06:21:46');
INSERT INTO `users` VALUES (44, 'vũ', 'thế', 'kiên', '12312dasd', 'asdsa@gmail.com', '1649754381.jpg', '$2y$10$5zLn39Cc.tc7qFMzzNcUPeAurvPxGEO1o/YjVaiNU1P./5bnWTpF.', '2022-04-12 09:06:21', '2022-04-19 04:56:56', '2022-04-19 04:56:56');
INSERT INTO `users` VALUES (45, 'tin', 'tin', 'pu', 'putin', 'putin@gmail.com', '1650335421.jpg', '$2y$10$OD47e4jNXuHC2XfJeYH4r.GeM.RoknBvYEQtjdGupWJE4qPoSvWTO', '2022-04-19 02:30:21', '2022-04-19 02:30:21', NULL);
INSERT INTO `users` VALUES (47, 'asd', 'da', 'asdzz', 'asdazzz', 'aaas@gmail.com', '1650335558.jpg', '$2y$10$lyAlTYbNsUGrHwnBknt2kOXmzECuOQR3W3d416LQkFqBEKG8L3A6a', '2022-04-19 02:32:38', '2022-04-19 04:56:25', '2022-04-19 04:56:25');
INSERT INTO `users` VALUES (51, 'dasda', 'adssd', 'a3', 'adsdas', 'asdasdd@gmail.com', '1650335972.jpg', '$2y$10$A4B9vnf2HtgydsLzqbMI0.vZBBe6.Yk04.jiheW452RPSc2Ee5HjO', '2022-04-19 02:39:32', '2022-04-19 04:56:00', '2022-04-19 04:56:00');
INSERT INTO `users` VALUES (52, 'bnm', 'mnm', 'mbnm', 'mnb', 'bmn@gmail.com', '1650339074.jpg', '$2y$10$ax59z.UGfjwxm5kCX1j2NOTtALYCHP0qxCijJVhiP3C9W/0Mvp.b6', '2022-04-19 03:31:14', '2022-04-19 03:35:46', '2022-04-19 03:35:46');
INSERT INTO `users` VALUES (53, 'mkmk', 'm', 'khkm', 'kmkmk', 'kmd@gmail.com', '1650339372.jpg', '$2y$10$liOPWo.yvS/srwczV9ZYBu.YQVNakgGD6Jxma7BVH1BLwD63o0lP.', '2022-04-19 03:36:12', '2022-04-19 04:55:49', '2022-04-19 04:55:49');
INSERT INTO `users` VALUES (54, 'vũ', 'thế', 'kiên', 'quyet', 'kienkoynd@gmail.com', '1650365851.jpg', '$2y$10$noQmS2dc10UkLni49t2uhOGkR4Q2npgHQEJNqtYEsrNwCbAmGtBvu', '2022-04-19 10:57:31', '2022-04-19 10:57:31', NULL);
INSERT INTO `users` VALUES (55, 'dow', 'wan', 'lee', 'ski', 'ski@gmail.com', '1650375020.jpg', '$2y$10$W.ZyPJIkMLlzqiEhvdk/qOvzLQpoBJUKV/DfDbEO6mFsU06GZ3ZIq', '2022-04-19 13:30:20', '2022-04-19 14:06:21', NULL);
INSERT INTO `users` VALUES (56, 'dong', 'don', 'son', 'son', 'soan@gmail.com', '1650377237.png', '$2y$10$u5DL6lom3L16dwY3eA8JM.fFSlf3xDwvL8FKyvGmgzXNCC/TbCgoW', '2022-04-19 14:07:17', '2022-04-20 03:20:48', '2022-04-20 03:20:48');
INSERT INTO `users` VALUES (57, 'vũ', 'thế', 'kiên', 'zcxcxzxc', 'kienkoynd@gmail.com', '1650599783.jpg', '$2y$10$PgFTx9z9SfglrYtXHoML/u.WD4qUOQWjEKgFrjK.4ust3IxCeWkOK', '2022-04-22 03:56:23', '2022-04-26 07:02:31', '2022-04-26 07:02:31');
INSERT INTO `users` VALUES (58, 'an', 'van', 'pham', 'anpham', 'anujcvu1@gmail.com', '1650617708.jpg', '$2y$10$nSJK0Z7GPA9PIviGv1SM/e0Elo.jFBfECgsuqk5RSn/9uwx/q2/72', '2022-04-22 08:55:08', '2022-04-22 08:55:08', NULL);
INSERT INTO `users` VALUES (59, 'vũ', 'thế', 'kiên', '12asd', 'kienkoynd@gmail.com', '1650860775.jpg', '$2y$10$DtUxR2CY3BZeEEkXlrdeYeXtQae8p7W0F6N041RV7IqdtxQYiYtFK', '2022-04-22 09:09:08', '2022-04-26 07:02:21', '2022-04-26 07:02:21');
INSERT INTO `users` VALUES (60, 'okok', 'ok', 'ook', 'okoko', 'okokok@gmail.com', '1650860807.jpg', '$2y$10$9wXZOq8mdAbWTSkYH2B.XO9db/Iso/Xcf3yn8B18IZiqmGADopir2', '2022-04-25 04:26:47', '2022-04-25 04:31:42', NULL);
INSERT INTO `users` VALUES (62, 'ads', 'add', 'ads', 'asdasd312', 'asdd@gmail.com', '1650956288.jpg', '$2y$10$powSrsNIgWPphGVB511na.IZByiXLYMrSss4LIGwHQ4.NeTa6dlhy', '2022-04-26 06:58:08', '2022-04-26 07:02:02', '2022-04-26 07:02:02');
INSERT INTO `users` VALUES (64, 'opkop', 'kopkfso', 'okpk', 'op2k13opk0', 'sdfosm@gmail.com', '1650956394.jpg', '$2y$10$qph2lBTrBwP9kCJQHe8j5eDCCGNegOkECJlLm8vDGmothMwstmY0S', '2022-04-26 06:59:54', '2022-04-26 07:01:59', '2022-04-26 07:01:59');
INSERT INTO `users` VALUES (65, 'vũ', 'thế', 'kiên', 'htyhrtyhyth', 'kienkoynd@gmail.com', '1650956465.jpg', '$2y$10$gW3TViHAmwYFlFLvt3up8OeWvjjlYGHYtC5CPavugjSK0fFu1iwDa', '2022-04-26 07:01:05', '2022-04-26 07:01:57', '2022-04-26 07:01:57');
INSERT INTO `users` VALUES (66, 'vũ', 'thế', 'kiên', 'nguyenvanccc', 'kienkoynd@gmail.com', '123.jpg', '$2y$10$OzX1XmnY/te1o1Xw2qdzKuVs9IB49WU4C9hvB5ynFwkkxBYAU7NpO', '2022-04-27 04:12:33', '2022-04-27 04:33:34', '2022-04-27 04:33:34');
INSERT INTO `users` VALUES (67, 'vũaaaa', 'thếaaaa', 'kiênaaaaaa', 'nguyenvancaaaaaaaaa', 'kienkoynd@gmail.com', '123.jpg', '$2y$10$9rL066lwSKovMfkohSjI7e/u.4GOHXyTJREOA.YcIRX.cgGqp3QJG', '2022-04-27 04:23:27', '2022-04-27 07:36:02', '2022-04-27 07:36:02');
INSERT INTO `users` VALUES (68, 'zxc', 'zxc', 'zxc', 'zxczxczxc', 'zxczxczxc@gmail.com', '123.jpg', '$2y$10$m5ijyDMZSGWuXbOyJzwR6Owvuf0LMm5Sadu6gu1klM1G8bw/7icGW', '2022-04-27 09:12:15', '2022-05-04 08:47:49', NULL);
INSERT INTO `users` VALUES (69, 'quyet', 'van', 'trinh', 'quyettrinh', 'quyettrinh@gmail.com', '1651721001.jpg', '$2y$10$1XpAWvvqElzIUfFzKDz.f.XIM.1TXGAT3wHmEgdyG.clezgLMQwCO', '2022-05-05 03:23:21', '2022-05-05 03:23:21', NULL);
INSERT INTO `users` VALUES (71, 'vũ', 'thế', 'kiên', 'ngudaaa', 'adsaw@gmail.com', '1651721100.jpg', '$2y$10$lt1zaHGJj1ljNl6hwUZ2huSrYInIyQq2T630V3aVy2sfzoOtoQpM.', '2022-05-05 03:25:00', '2022-05-05 03:25:45', '2022-05-05 03:25:45');
INSERT INTO `users` VALUES (72, '231fsd', '1sdf', 'dsa', 'sad12', 'asdynd@gmail.com', '1651721758.png', '$2y$10$4wAvYZkclMKlzKffeLwRwOWQTEEItFlkbCNcHdLeqXSbmruxgdOgS', '2022-05-05 03:35:59', '2022-05-05 03:40:09', '2022-05-05 03:40:09');
INSERT INTO `users` VALUES (73, 'vũ', 'thế', 'son', 'nguyenvancasd', 'asaaaa@gmail.com', '1651721795.jpg', '$2y$10$w94ntqg0RW2hQBy5SxDOy.QJVKyxRR1ia16PK2UKDHDi7xJTVlCzK', '2022-05-05 03:36:35', '2022-05-05 03:40:07', '2022-05-05 03:40:07');
INSERT INTO `users` VALUES (74, 'vũ', 'thế', 'kiên', 'nguyenvaaanc', 'kienkoynd@gmail.com', '1651721840.png', '$2y$10$psHmG5kZfmNSd/MISSWSK.9eRDXLNuzzJHfkUECxOxO.6twQHC3Am', '2022-05-05 03:37:20', '2022-05-05 03:40:04', '2022-05-05 03:40:04');
INSERT INTO `users` VALUES (75, 'vũ', 'thế', 'kiên', 'nguyenvancca', 'kienkoynd@gmail.com', '1651721971.jpg', '$2y$10$3NiMU.sQM8BHEmqJagh94OaEH3NYu47Onm8vpCtYZLMSGZJy.AlL2', '2022-05-05 03:39:31', '2022-05-05 03:40:02', '2022-05-05 03:40:02');
INSERT INTO `users` VALUES (76, 'vũ', 'thế', 'kiên', 'nguyenvanc54', 'kienkoynd@gmail.com', '123.jpg', '$2y$10$TfkfjBfkk/GT7A6b6j.WhOb.hBj0wGu/5ghUHS9YOZmHOwQFIg2Ta', '2022-05-05 03:40:31', '2022-05-05 03:40:40', '2022-05-05 03:40:40');

SET FOREIGN_KEY_CHECKS = 1;
