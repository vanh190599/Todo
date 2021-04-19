-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2020 lúc 01:29 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vastore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2020_03_29_111956_create_tbl_news_table', 1),
(54, '2020_03_29_141007_create_tbl_category_news_table', 2),
(57, '2014_10_12_000000_create_users_table', 3),
(58, '2019_08_19_000000_create_failed_jobs_table', 3),
(59, '2020_03_29_121733_create_tbl_admin_table', 3),
(60, '2020_03_29_121750_create_tbl_brand_table', 3),
(61, '2020_03_29_121805_create_tbl_category_table', 3),
(62, '2020_03_29_121909_create_tbl_customer_table', 3),
(63, '2020_03_29_121932_create_tbl_order_table', 3),
(64, '2020_03_29_121950_create_tbl_order_details_table', 3),
(65, '2020_03_29_122005_create_tbl_payment_table', 3),
(66, '2020_03_29_122022_create_tbl_product_table', 3),
(67, '2020_03_29_122043_create_tbl_shipping_table', 3),
(68, '2020_03_29_123927_create_tbl_social_table', 3),
(69, '2020_03_29_145422_create_tbl_news_category_table', 3),
(70, '2020_03_30_030800_create_tbl_news_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyen Van A', '0843190500', '2020-11-02 08:21:16', '2020-11-02 08:21:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Gucci', 1, '2020-11-02 08:24:27', '2020-11-02 08:24:27'),
(2, 'Việt Nam', 'Chinna', 1, '2020-11-02 08:29:11', '2020-11-21 05:18:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Áo Khoác', 'ÁO KHOÁC', 1, '2020-11-02 08:24:08', '2020-11-02 08:24:08'),
(2, 'Áo nỉ', 'Áo nỉ', 1, '2020-11-02 08:27:28', '2020-11-02 08:27:28'),
(3, 'Đầm', 'Áo nỉ', 1, '2020-11-02 08:27:39', '2020-11-02 08:27:39'),
(4, 'Áo len & Áo len đan', 'Áo len & Áo len đan', 1, '2020-11-02 08:28:12', '2020-11-02 08:28:12'),
(5, 'Áo Khoác & Áo Jackets', 'Áo Khoác & Áo Jackets', 1, '2020-11-02 08:28:45', '2020-11-02 08:28:45'),
(6, 'Áo thun', 'Áo thun', 1, '2020-11-02 08:45:10', '2020-11-02 08:45:10'),
(7, 'Quần Jean', 'QUẦN JEAN', 1, '2020-11-02 08:49:55', '2020-11-02 08:50:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_news`
--

CREATE TABLE `tbl_category_news` (
  `category_news_id` bigint(20) UNSIGNED NOT NULL,
  `category_news_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_news_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_news_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Vanh Anh', '123456', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-02 09:28:10', '2020-11-02 09:32:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `news_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_hot` int(11) NOT NULL,
  `news_status` int(11) NOT NULL,
  `news_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_category_id`, `news_title`, `news_desc`, `news_content`, `news_hot`, `news_status`, `news_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'SALE OFF 20-50% || TẾT TÝ SALE HẾT Ý || 5-19/1/2020', 'Tết Canh Tý, mua sắm ưng ý với mức SALE KHỦNG lên đến 5️⃣0️⃣% ++ tại Totoshop.', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/artCT/58476/blog.jpg\" /></p>\r\n\r\n<p>Tết Canh T&yacute;, mua sắm ưng &yacute; với mức SALE KHỦNG l&ecirc;n đến 5️⃣0️⃣% ++ tại Totoshop.</p>\r\n\r\n<p>V&igrave; một c&aacute;i Tết ấm no, đồ đẹp đầy tủ lại tiết kiệm tối đa, Totoshop hết m&igrave;nh gửi bạn ng&agrave;n ưu đ&atilde;i hấp dẫn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>▷ 𝐒𝐀𝐋𝐄 𝐎𝐅𝐅 𝟐𝟎-𝟓𝟎% 𝐒𝐄𝐋𝐄𝐂𝐓𝐄𝐃 𝐈𝐓𝐄𝐌𝐒.</p>\r\n\r\n<p>▷ H&agrave;ng trăm sản phẩm đồng gi&aacute; #69K - #99K.</p>\r\n\r\n<p>▷ Với h&oacute;a đơn từ 500k, được tặng ngay set BAO L&Igrave; X&Igrave;&nbsp;phi&ecirc;n bản Totoshop (số lượng c&oacute; hạn).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đừng đợi hết đồ đẹp, shop hết SALE, đến Totoshop ngay,&nbsp;mua sắm linh đ&igrave;nh với h&agrave;ng ng&agrave;n sản phẩm mới lại th&ecirc;m ưu đ&atilde;i qu&aacute; hời</p>\r\n\r\n<p>Tết Totoshop, Tết mốt nhất nh&agrave; ❤️</p>\r\n\r\n<p>_________</p>\r\n\r\n<p><strong>Cả nh&agrave; lưu &yacute;:</strong></p>\r\n\r\n<p>- CTKM kh&ocirc;ng &aacute;p dụng chung với Chiết khấu VIP, sinh nhật VIP (Kh&aacute;ch h&agrave;ng được chọn 1 trong 2: giảm Chiết khấu VIP hoặc c&aacute;c mức giảm gi&aacute; hiện c&oacute;).</p>\r\n\r\n<p>- Những sản phẩm kh&ocirc;ng nằm trong danh mục giảm gi&aacute; được &aacute;p dụng Chiết khấu VIP, sinh nhật VIP, Voucher.</p>\r\n\r\n<p>- Chương tr&igrave;nh Sale Tết T&yacute; kh&ocirc;ng &aacute;p dụng chung với c&aacute;c m&atilde; Coupon, Voucher v&agrave; c&aacute;c CTKM kh&aacute;c.</p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng c&oacute; thẻ th&agrave;nh vi&ecirc;n được t&iacute;ch lũy điểm dựa tr&ecirc;n tổng thanh to&aacute;n cuối c&ugrave;ng trong h&oacute;a đơn.</p>\r\n\r\n<p>- Sản phẩm sale vui l&ograve;ng kh&ocirc;ng đổi trả.</p>\r\n\r\n<p>&nbsp;</p>', 1, 1, '1604331217_Csapture.JPG', '2020-11-02 08:33:37', '2020-11-02 08:33:37'),
(2, 1, 'Mua Combo Giảm Giá Bất Ngờ', 'Khi mua COMBO BASIC (quần + áo) sẽ được giảm 5% + VIP. Khi mua FULLSET (quần + áo) + Phụ Kiện sẽ được giảm 10% + VIP', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/artCT/71090/blog_web.jpg\" /></p>\r\n\r\n<p><strong>𝐌𝐔𝐀 𝐓𝐑𝐎̣𝐍 𝐂𝐎𝐌𝐁𝐎 - 𝐆𝐈𝐀̉𝐌 𝐆𝐈𝐀́ 𝐁𝐀̂́𝐓 𝐍𝐆𝐎̛̀ || 𝟏𝟎.𝟎𝟗 - 𝟑𝟎.𝟎𝟗&nbsp;🤟🤟🤟</strong></p>\r\n\r\n<p><strong>✅&nbsp;Ưu đ&atilde;i d&agrave;nh ri&ecirc;ng cho c&aacute;c bạn th&iacute;ch c&aacute;c set đồ nh&agrave; Totoshop</strong></p>\r\n\r\n<p><strong>✅&nbsp;Thời gian: 10/09 - 30/09/2020</strong></p>\r\n\r\n<p><strong>Khi mua COMBO BASIC (quần + &aacute;o) sẽ được giảm&nbsp;5% + VIP</strong></p>\r\n\r\n<p><strong>Khi mua FULLSET (quần + &aacute;o) + Phụ Kiện sẽ được giảm&nbsp;10% + VIP</strong></p>\r\n\r\n<p><strong>*Lưu &yacute;: KH&Ocirc;NG &aacute;p dụng đồng thời c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c</strong></p>\r\n\r\n<p><strong>Cần hỗ trợ vui l&ograve;ng gọi&nbsp;Hotline 1900.633.501&nbsp;hoặc&nbsp;gửi tin nhắn&nbsp;<a href=\"https://www.messenger.com/t/Totoshop.com.vn\" rel=\"noreferrer noopener\" target=\"_blank\">Tại Đ&acirc;y</a></strong></p>', 1, 1, '1604331330_cvbcvbvcb.JPG', '2020-11-02 08:35:30', '2020-11-02 08:35:30'),
(3, 1, 'BILL NGÀN HAI TẶNG ÁO DÀI TAY', 'BILL NGÀN HAI TẶNG ÁO DÀI TAY', '<p><strong>Thời gian: Từ ng&agrave;y 05.08 - 31.08</strong></p>\r\n\r\n<p><u><strong>Chi tiết chương tr&igrave;nh</strong></u></p>\r\n\r\n<p><strong>🔸 Với h&oacute;a đơn sau giảm từ 1.200.000 VND -&nbsp;𝑻𝑨̣̆𝑵𝑮 𝑴𝑶̣̂𝑻 𝑨́𝑶 𝑻𝑯𝑼𝑵 𝑻𝑨𝒀 𝑫𝑨̀𝑰&nbsp;trong danh mục khuyến m&atilde;i<br />\r\n🔸Với h&oacute;a đơn sau giảm từ 800.000VND - ưu đ&atilde;i&nbsp;#𝐆𝐈𝐀̉𝐌_𝟓𝟎%&nbsp;khi mua &aacute;o thun tay d&agrave;i trong danh mục khuyến m&atilde;i.</strong></p>\r\n\r\n<p><br />\r\n<u><strong>Điều kiện &aacute;p dụng</strong></u></p>\r\n\r\n<p><strong>&Aacute;p dụng cho kh&aacute;ch mua h&agrave;ng trực tiếp tại c&aacute;c chi nh&aacute;nh của Totoshop v&agrave; mua online.<br />\r\n&Aacute;p dụng cho h&oacute;a đơn sau chiết&nbsp;khấu th&agrave;nh vi&ecirc;n.<br />\r\nKH&Ocirc;NG &aacute;p dụng đồng thời c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c.<br />\r\nCh&uacute;c c&aacute;c bạn mua sắm thật vui vẻ!</strong></p>', 1, 1, '1604333303_Capture.JPG', '2020-11-02 09:08:23', '2020-11-02 09:08:23'),
(4, 2, 'Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang.', '<p>Chị em n&ecirc;n để d&agrave;nh tiền cho những chiếc&nbsp;&aacute;o len&nbsp;chuẩn s&agrave;nh điệu th&igrave; hơn! &Aacute;o len l&agrave; một trong những items cơ bản của m&ugrave;a Đ&ocirc;ng</p>', '<p><strong>Chị em n&ecirc;n để d&agrave;nh tiền cho những chiếc<a href=\"https://vietgiaitri.com/ao-len-key/\">&nbsp;&aacute;o len&nbsp;</a>chuẩn s&agrave;nh điệu th&igrave; hơn! &Aacute;o len l&agrave; một trong những items cơ bản của m&ugrave;a Đ&ocirc;ng n&ecirc;n chắc chắn, chị em sẽ d&agrave;nh rất nhiều ng&acirc;n s&aacute;ch để sắm sửa mu&ocirc;n kiểu cho tủ đồ.</strong></p>\r\n\r\n<p>Nếu đưa ra những lựa chọn s&aacute;ng suốt, &aacute;o len sẽ rất hữu &iacute;ch trong việc n&acirc;ng tầm phong c&aacute;ch. V&agrave; ngược lại, nếu sắm nhầm 3 kiểu dưới đ&acirc;y th&igrave; mỗi lần diện, chị em dễ bị ch&ecirc; l&agrave; sến kh&ocirc;ng lối tho&aacute;t lắm!</p>\r\n\r\n<p><strong>1. &Aacute;o len b&egrave;o nh&uacute;n</strong></p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-2e9-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 1\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-2e9-5341809.jpg\" style=\"height:656px; width:820px\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o len b&egrave;o nh&uacute;n l&agrave; một item bạn n&ecirc;n c&acirc;n nhắc kỹ lưỡng trước khi sắm. Chi tiết b&egrave;o nh&uacute;n nếu được tiết chế kh&eacute;o l&eacute;o th&igrave; tr&ocirc;ng sẽ điệu đ&agrave;, nữ t&iacute;nh. Bằng kh&ocirc;ng, d&ugrave; bạn c&oacute; mix&amp;match thế n&agrave;o th&igrave; cũng kh&oacute; m&agrave; giảm thiểu được độ sến của những chiếc &aacute;o len xếp b&egrave;o. Nếu bạn muốn t&ocirc;n l&ecirc;n vẻ nữ t&iacute;nh của set đồ, những chiếc &aacute;o len trơn d&aacute;ng &ocirc;m, hay &aacute;o len cổ tim l&agrave; những lựa chọn kh&ocirc;ng tồi ch&uacute;t n&agrave;o.</p>\r\n\r\n<p><strong>2. &Aacute;o len độn vai th&ocirc; kệch</strong></p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-7f0-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 2\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-7f0-5341809.jpg\" style=\"height:656px; width:820px\" /></a></p>\r\n\r\n<p>Tất nhi&ecirc;n, vẫn c&oacute; những chiếc &aacute;o len độn vai hay tay bồng được c&aacute;c qu&yacute; c&ocirc; s&agrave;nh điệu<a href=\"https://vietgiaitri.com/yeu/\">&nbsp;y&ecirc;u&nbsp;</a>th&iacute;ch. Thế nhưng, c&aacute;i g&igrave; qu&aacute; cũng kh&ocirc;ng tốt v&agrave; bạn đừng n&ecirc;n chọn những chiếc &aacute;o len độn vai qu&aacute; cao, kết hợp với phần tay bồng to bởi item n&agrave;y sẽ khiến phần thần tr&ecirc;n của bạn trở n&ecirc;n th&ocirc; kệch, v&oacute;c d&aacute;ng k&eacute;m thanh tho&aacute;t. Vẻ ngo&agrave;i c&ograve;n c&oacute; thể h&oacute;a sến v&agrave; qu&ecirc; kiểng nữa.</p>\r\n\r\n<p><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\"><img src=\"https://vietgiaitri.com/ads/tm/3.jpg\" style=\"height:590px; width:820px\" /></a></p>\r\n\r\n<p>V&agrave; như đ&atilde; n&oacute;i ở tr&ecirc;n, &aacute;o len độn vai/tay bồng vừa phải sẽ đem đến vẻ thời thượng, sang chảnh cho người diện. C&ograve;n trong trường hợp, bạn kh&ocirc;ng qu&aacute; tự tin v&agrave;o khả năng chọn đồ của m&igrave;nh, cứ ưu ti&ecirc;n những chiếc &aacute;o len kiểu d&aacute;ng basic, mang gam m&agrave;u trung t&iacute;nh l&agrave; y&ecirc;n t&acirc;m mặc<a href=\"https://vietgiaitri.com/dep/\">&nbsp;đẹp&nbsp;</a>v&agrave; s&agrave;nh điệu.</p>\r\n\r\n<p><strong>3. &Aacute;o len buộc nơ</strong></p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-582-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 3\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-582-5341809.jpg\" /></a></p>\r\n\r\n<p>&Aacute;o blouse cổ buộc nơ th&igrave; rất ổn, đ&acirc;y l&agrave; item hot nhất nh&igrave; m&ugrave;a H&egrave; v&igrave; sự sang trọng v&agrave; bay bổng. Tuy nhi&ecirc;n &aacute;o len buộc nơ th&igrave; lại mang một cảm gi&aacute;c kh&aacute;c hẳn, c&oacute; lẽ l&agrave; do chất liệu vải d&agrave;y dặn, kh&ocirc;ng c&oacute; độ &ldquo;bay&rdquo; đ&atilde; khiến cho những chiếc &aacute;o len cổ nơ buộc trở n&ecirc;n k&eacute;m &ldquo;chanh sả&rdquo;, thệm ch&iacute; l&agrave; mang lại cảm gi&aacute;c thắm thơm, qu&ecirc; kiểng. &Aacute;o len vẫn đẹp nhất l&agrave; khi mang thiết kế cổ tr&ograve;n, cổ chữ V hoặc cổ bẻ. Những kiểu d&aacute;ng cơ bản n&agrave;y kh&ocirc;ng chỉ dễ mặc m&agrave; c&ograve;n rất dễ mix đồ. Bạn cứ kết hợp với quần jeans, quần ống rộng, ch&acirc;n v&aacute;y d&aacute;ng x&ograve;e, d&aacute;ng su&ocirc;ng rồi mix ngo&agrave;i chiếc &aacute;o blazer hay trench coat, vậy l&agrave; đẹp v&agrave; s&agrave;nh điệu khỏi nghĩ ngợi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>*Dưới đ&acirc;y l&agrave; gợi &yacute; một số địa chỉ mua sắm &aacute;o len s&agrave;nh điệu, bạn h&atilde;y lưu t&acirc;m để style m&ugrave;a Thu/Đ&ocirc;ng 2020 tiến bộ hơn năm ngo&aacute;i nhiều lần nh&eacute;!</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-f5e-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 4\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-f5e-5341809.jpg\" /></a></p>\r\n\r\n<p>Nơi mua: 22 D&eacute;cembre</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-98e-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 5\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-98e-5341809.jpg\" /></a></p>\r\n\r\n<p><iframe height=\"374\" src=\"https://imasdk.googleapis.com/js/core/bridge3.419.0_en.html#goog_1819701609\" width=\"665\"></iframe></p>\r\n\r\n<p>Volume 0%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nơi mua: The Sweater Weather</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-0cf-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 6\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-0cf-5341809.jpg\" /></a></p>\r\n\r\n<p><strong>Chị em n&ecirc;n để d&agrave;nh tiền cho những chiếc<a href=\"https://vietgiaitri.com/ao-len-key/\">&nbsp;&aacute;o len&nbsp;</a>chuẩn s&agrave;nh điệu th&igrave; hơn! &Aacute;o len l&agrave; một trong những items cơ bản của m&ugrave;a Đ&ocirc;ng n&ecirc;n chắc chắn, chị em sẽ d&agrave;nh rất nhiều ng&acirc;n s&aacute;ch để sắm sửa mu&ocirc;n kiểu cho tủ đồ.</strong></p>\r\n\r\n<p>Nếu đưa ra những lựa chọn s&aacute;ng suốt, &aacute;o len sẽ rất hữu &iacute;ch trong việc n&acirc;ng tầm phong c&aacute;ch. V&agrave; ngược lại, nếu sắm nhầm 3 kiểu dưới đ&acirc;y th&igrave; mỗi lần diện, chị em dễ bị ch&ecirc; l&agrave; sến kh&ocirc;ng lối tho&aacute;t lắm!</p>\r\n\r\n<p><strong>1. &Aacute;o len b&egrave;o nh&uacute;n</strong></p>\r\n\r\n<h3>Video đang HOT</h3>\r\n\r\n<p><iframe height=\"155\" id=\"_no-clickjacking-0\" src=\"https://imasdk.googleapis.com/js/core/bridge3.419.0_en.html#goog_1819701605\" width=\"272\"></iframe></p>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><iframe frameborder=\"0\" scrolling=\"no\" src=\"about:blank\"></iframe></p>\r\n\r\n<p>Volume 0%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>14</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-2e9-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 1\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-2e9-5341809.jpg\" /></a></p>\r\n\r\n<p><img alt=\"\" src=\"https://bs.serving-sys.com/Serving/adServer.bs?cn=display&amp;c=19&amp;pli=1075565625&amp;gdpr=${GDPR}&amp;gdpr_consent=${GDPR_CONSENT_68}&amp;adid=1080810346&amp;ord=1604333348865\" style=\"height:0px; width:0px\" /></p>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&Aacute;o len b&egrave;o nh&uacute;n l&agrave; một item bạn n&ecirc;n c&acirc;n nhắc kỹ lưỡng trước khi sắm. Chi tiết b&egrave;o nh&uacute;n nếu được tiết chế kh&eacute;o l&eacute;o th&igrave; tr&ocirc;ng sẽ điệu đ&agrave;, nữ t&iacute;nh. Bằng kh&ocirc;ng, d&ugrave; bạn c&oacute; mix&amp;match thế n&agrave;o th&igrave; cũng kh&oacute; m&agrave; giảm thiểu được độ sến của những chiếc &aacute;o len xếp b&egrave;o. Nếu bạn muốn t&ocirc;n l&ecirc;n vẻ nữ t&iacute;nh của set đồ, những chiếc &aacute;o len trơn d&aacute;ng &ocirc;m, hay &aacute;o len cổ tim l&agrave; những lựa chọn kh&ocirc;ng tồi ch&uacute;t n&agrave;o.</p>\r\n\r\n<p><strong>2. &Aacute;o len độn vai th&ocirc; kệch</strong></p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-7f0-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 2\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-7f0-5341809.jpg\" /></a></p>\r\n\r\n<p>Tất nhi&ecirc;n, vẫn c&oacute; những chiếc &aacute;o len độn vai hay tay bồng được c&aacute;c qu&yacute; c&ocirc; s&agrave;nh điệu<a href=\"https://vietgiaitri.com/yeu/\">&nbsp;y&ecirc;u&nbsp;</a>th&iacute;ch. Thế nhưng, c&aacute;i g&igrave; qu&aacute; cũng kh&ocirc;ng tốt v&agrave; bạn đừng n&ecirc;n chọn những chiếc &aacute;o len độn vai qu&aacute; cao, kết hợp với phần tay bồng to bởi item n&agrave;y sẽ khiến phần thần tr&ecirc;n của bạn trở n&ecirc;n th&ocirc; kệch, v&oacute;c d&aacute;ng k&eacute;m thanh tho&aacute;t. Vẻ ngo&agrave;i c&ograve;n c&oacute; thể h&oacute;a sến v&agrave; qu&ecirc; kiểng nữa.</p>\r\n\r\n<p><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\"><img src=\"https://vietgiaitri.com/ads/tm/3.jpg\" /></a></p>\r\n\r\n<h4><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\">&quot;Kh&ocirc; hạn&quot; l&agrave;m chị em giảm ham muốn h&atilde;y xem c&aacute;ch sau đ&acirc;y</a></h4>\r\n\r\n<p><br />\r\n<a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\">Gặp phải t&igrave;nh trạng n&agrave;y c&aacute;c chị em cần t&igrave;m ngay giải ph&aacute;p để tr&aacute;nh g&acirc;y những hậu quả như vi&ecirc;m nhiễm, ảnh hưởng đến khả năng sinh sản v&agrave; hạnh ph&uacute;c vợ chồng</a></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\">Chị em bị đau r&aacute;t khi &quot;y&ecirc;u&quot; l&agrave;m theo c&aacute;ch n&agrave;y nước sẽ về &quot;ướt &aacute;t&quot;</a></li>\r\n	<li><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\">T&ocirc;i v&agrave; chồng bị đau r&aacute;t mỗi khi gần gũi, nay đ&atilde; c&oacute; c&aacute;ch</a></li>\r\n	<li><a href=\"https://adclick.g.doubleclick.net/pcs/click?xai=AKAOjssRPJfBfdKR478-19Q55Rem_rfWp3kC1AhgaucHhA0hJSEdcri4-vyUj4YJVw4kfVTOrFMTGjcNFnDfu0lAl1nBQAQYAX-asjs8MqGKpzmDrsaSMpiD0hcqWe33YusQ_3LeOxqp0WzzYncddzdUJ4yoFIdnYk1ugjOCyR-5TVRsXLK0bW45PI5MPFUu23snKHJaxipNcKCziGrBO3yYvYTABBikl6asTIIlALUB8XfAT8fHCPmniIYxhQWB2SU03j-gyU6E1IHxtbI&amp;sai=AMfl-YRys2hdRC8EG0PiZmqPAdzftdzYCN4p2aq6xKvYo_byDOo4GaqHrtzhx2D9c15WIiazVjYKE_CGfYDyeTrfZKuCY8LGBqt2iYTzMAfjyskLgY2kiJN19En5rsFYu2E5HyfqOQ&amp;sig=Cg0ArKJSzC5eg-LcXunUEAE&amp;urlfix=1&amp;adurl=https%3A%2F%2Fwww.sladyvietnam.net%2Fslady%3Futm_source%3Dgiangnth%26utm_medium%3DNative_Vietgiaitri\" rel=\"nofollow\" target=\"_blank\">Vợ chồng trục trặc v&igrave; vợ &quot;kh&ocirc; hạn&quot; bị đau khi quan hệ phải l&agrave;m sao?</a></li>\r\n</ul>\r\n\r\n<p>V&agrave; như đ&atilde; n&oacute;i ở tr&ecirc;n, &aacute;o len độn vai/tay bồng vừa phải sẽ đem đến vẻ thời thượng, sang chảnh cho người diện. C&ograve;n trong trường hợp, bạn kh&ocirc;ng qu&aacute; tự tin v&agrave;o khả năng chọn đồ của m&igrave;nh, cứ ưu ti&ecirc;n những chiếc &aacute;o len kiểu d&aacute;ng basic, mang gam m&agrave;u trung t&iacute;nh l&agrave; y&ecirc;n t&acirc;m mặc<a href=\"https://vietgiaitri.com/dep/\">&nbsp;đẹp&nbsp;</a>v&agrave; s&agrave;nh điệu.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"237\" name=\"dableframe-0.44853065055214336\" scrolling=\"no\" src=\"https://api.dable.io/widgets/id/G7ZxaEXW/users/76506080.1602954399614?from=https%3A%2F%2Fvietgiaitri.com%2Fdan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-20201101i5341809%2F&amp;url=https%3A%2F%2Fvietgiaitri.com%2Fdan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-20201101i5341809%2F&amp;ref=https%3A%2F%2Fvietgiaitri.com%2Fthoi-trang%2F&amp;cid=76506080.1602954399614&amp;uid=76506080.1602954399614&amp;site=vietgiaitri.com&amp;id=dablewidget_G7ZxaEXW&amp;category1=Th%E1%BB%9Di%20trang&amp;category2=%C4%90%E1%BA%B9p&amp;ad_params=%7B%7D&amp;item_id=5341809&amp;pixel_ratio=1&amp;client_width=665&amp;network=non-wifi&amp;lang=vi&amp;pre_expose=1&amp;is_top_win=1&amp;top_win_accessible=1\" title=\"ĐỪNG BỎ QUA\" width=\"100%\"></iframe></p>\r\n\r\n<p><strong>3. &Aacute;o len buộc nơ</strong></p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-582-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 3\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-582-5341809.jpg\" /></a></p>\r\n\r\n<p>&Aacute;o blouse cổ buộc nơ th&igrave; rất ổn, đ&acirc;y l&agrave; item hot nhất nh&igrave; m&ugrave;a H&egrave; v&igrave; sự sang trọng v&agrave; bay bổng. Tuy nhi&ecirc;n &aacute;o len buộc nơ th&igrave; lại mang một cảm gi&aacute;c kh&aacute;c hẳn, c&oacute; lẽ l&agrave; do chất liệu vải d&agrave;y dặn, kh&ocirc;ng c&oacute; độ &ldquo;bay&rdquo; đ&atilde; khiến cho những chiếc &aacute;o len cổ nơ buộc trở n&ecirc;n k&eacute;m &ldquo;chanh sả&rdquo;, thệm ch&iacute; l&agrave; mang lại cảm gi&aacute;c thắm thơm, qu&ecirc; kiểng. &Aacute;o len vẫn đẹp nhất l&agrave; khi mang thiết kế cổ tr&ograve;n, cổ chữ V hoặc cổ bẻ. Những kiểu d&aacute;ng cơ bản n&agrave;y kh&ocirc;ng chỉ dễ mặc m&agrave; c&ograve;n rất dễ mix đồ. Bạn cứ kết hợp với quần jeans, quần ống rộng, ch&acirc;n v&aacute;y d&aacute;ng x&ograve;e, d&aacute;ng su&ocirc;ng rồi mix ngo&agrave;i chiếc &aacute;o blazer hay trench coat, vậy l&agrave; đẹp v&agrave; s&agrave;nh điệu khỏi nghĩ ngợi.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"280\" id=\"google_ads_iframe_/1015973/Desktop_Inpage2_336x280_0\" name=\"\" scrolling=\"no\" src=\"https://b411710317022e4ee091d447ecad34ca.safeframe.googlesyndication.com/safeframe/1-0-37/html/container.html\" title=\"3rd party ad content\" width=\"336\"></iframe></p>\r\n\r\n<p>*Dưới đ&acirc;y l&agrave; gợi &yacute; một số địa chỉ mua sắm &aacute;o len s&agrave;nh điệu, bạn h&atilde;y lưu t&acirc;m để style m&ugrave;a Thu/Đ&ocirc;ng 2020 tiến bộ hơn năm ngo&aacute;i nhiều lần nh&eacute;!</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-f5e-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 4\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-f5e-5341809.jpg\" /></a></p>\r\n\r\n<p>Nơi mua: 22 D&eacute;cembre</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-98e-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 5\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-98e-5341809.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Volume 0%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nơi mua: The Sweater Weather</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-0cf-5341809.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"Dân sành điệu sẽ chẳng buồn sắm 3 kiểu áo len này vì diện lên rõ là sến súa, kém sang - Hình 6\" src=\"https://i.vietgiaitri.com/2020/11/1/dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-0cf-5341809.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>', 1, 1, '1604333465_dan-sanh-dieu-se-chang-buon-sam-3-kieu-ao-len-nay-vi-dien-len-ro-la-sen-sua-kem-sang-7f0-5341809.jpg', '2020-11-02 09:11:05', '2020-11-02 09:20:31'),
(5, 1, '8 kĩ thuật layering khiến trang phục mùa đông của bạn ấn tượng hơn bao giờ hết', 'Chiếc áo veston cho phép bạn trở nên nổi bật với tay áo và cổ áo khác biệt.', '<p>Trong tủ quần &aacute;o thu đ&ocirc;ng của bạn cũng c&oacute; một chỗ cho những chiếc v&aacute;y c&oacute; d&acirc;y buộc v&agrave; v&aacute;y kh&ocirc;ng tay. Khi nhiệt độ bắt đầu giảm xuống, h&atilde;y chuyển đổi tủ quần &aacute;o của bạn bằng c&aacute;ch th&ecirc;m layer<a href=\"https://vietgiaitri.com/yeu/\">&nbsp;y&ecirc;u&nbsp;</a>th&iacute;ch của m&ugrave;a h&egrave; n&agrave;y b&ecirc;n ngo&agrave;i &aacute;o sơ mi hoặc &aacute;o len d&agrave;i tay. Nếu chiếc v&aacute;y được thiết kế vừa vặn, bạn h&atilde;y kết hợp n&oacute; với chất liệu vải thoải m&aacute;i một ch&uacute;t để tạo sự tương phản ấm c&uacute;ng v&agrave; giữ mọi thứ casual với gi&agrave;y d&eacute;p đơn giản (gi&agrave;y<a href=\"https://vietgiaitri.com/the-thao/\">&nbsp;thể thao&nbsp;</a>hoặc gi&agrave;y cao cổ) v&agrave; phụ kiện tối giản.</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-02c-5343499.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"8 kĩ thuật layering khiến trang phục mùa đông của bạn ấn tượng hơn bao giờ hết - Hình 1\" src=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-02c-5343499.jpg\" style=\"height:1230px; width:820px\" /></a></p>\r\n\r\n<p><strong>Poncho</strong></p>\r\n\r\n<p>Bạn h&atilde;y x&oacute;a bỏ h&igrave;nh ảnh bạn c&oacute; trong đầu về những bộ quần &aacute;o bằng nhựa v&agrave;n bởi v&igrave; &aacute;o poncho kh&ocirc;ng chỉ l&agrave; trang phục ng&agrave;y mưa. &Aacute;o poncho chất liệu nỉ thay thế rất ph&ugrave; hợp cho những ng&agrave;y m&ugrave;a thu kh&ocirc;ng qu&aacute; lạnh nhưng cũng kh&ocirc;ng qu&aacute; ấm. Bạn h&atilde;y kho&aacute;c n&oacute; l&ecirc;n một chiếc &aacute;o sơ mi hoặc &aacute;o cổ lọ vừa vặn v&agrave; kết hợp với quần jean để nếu cảm thấy kh&oacute; chịu, bạn c&oacute; thể tr&uacute;t bỏ lớp &aacute;o n&agrave;y. V&agrave;, v&igrave; hầu hết c&aacute;c loại &aacute;o poncho kh&ocirc;ng qu&aacute; cồng kềnh, bạn c&oacute; thể nhanh ch&oacute;ng gấp n&oacute; lại v&agrave; cho v&agrave;o t&uacute;i để giữ an to&agrave;n.</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-656-5343499.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"8 kĩ thuật layering khiến trang phục mùa đông của bạn ấn tượng hơn bao giờ hết - Hình 2\" src=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-656-5343499.jpg\" style=\"height:1230px; width:820px\" /></a></p>\r\n\r\n<p><strong>Overall v&agrave; Jumpsuit</strong></p>\r\n\r\n<p>Những bộ overall v&agrave; jumpsuit được thiết kế cho mục đ&iacute;ch layering. C&aacute;ch y&ecirc;u th&iacute;ch nhiều c&ocirc; n&agrave;ng để tạo kiểu cho ch&uacute;ng l&agrave; th&ecirc;m một chiếc &aacute;o cổ lọ ấm c&uacute;ng b&ecirc;n dưới với một chiếc<a href=\"https://vietgiaitri.com/ao-khoac-key/\">&nbsp;&aacute;o kho&aacute;c&nbsp;</a>b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-ad3-5343499.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"8 kĩ thuật layering khiến trang phục mùa đông của bạn ấn tượng hơn bao giờ hết - Hình 3\" src=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-ad3-5343499.jpg\" style=\"height:1230px; width:820px\" /></a></p>\r\n\r\n<p><strong>&Aacute;o veston nỉ</strong></p>\r\n\r\n<p>Chiếc<a href=\"https://vietgiaitri.com/ao-veston-key/\">&nbsp;&aacute;o veston&nbsp;</a>cho ph&eacute;p bạn trở n&ecirc;n nổi bật với tay &aacute;o v&agrave; cổ &aacute;o kh&aacute;c biệt. Để tạo th&ecirc;m ch&uacute;t hứng khởi cho vẻ ngo&agrave;i của bạn, ch&uacute;ng t&ocirc;i khuy&ecirc;n bạn n&ecirc;n kết hợp &aacute;o vest với &aacute;o c&oacute; tay bồng hoặc &aacute;o c&aacute;nh nhẹ để bổ sung cho phong c&aacute;ch cụ thể của &aacute;o vest.</p>\r\n\r\n<p><a href=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-61b-5343499.jpg\" onclick=\"return false;\" target=\"_blank\"><img alt=\"8 kĩ thuật layering khiến trang phục mùa đông của bạn ấn tượng hơn bao giờ hết - Hình 4\" src=\"https://i.vietgiaitri.com/2020/11/2/8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-61b-5343499.jpg\" style=\"height:1069px; width:820px\" /></a></p>', 1, 1, '1604333956_8-ki-thuat-layering-khien-trang-phuc-mua-dong-cua-ban-an-tuong-hon-bao-gio-het-656-5343499.jpg', '2020-11-02 09:19:16', '2020-11-02 09:19:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news_category`
--

CREATE TABLE `tbl_news_category` (
  `news_category_id` bigint(20) UNSIGNED NOT NULL,
  `news_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`news_category_id`, `news_category_name`, `news_category_desc`, `news_category_status`, `created_at`, `updated_at`) VALUES
(1, 'SALE OFF', 'SALE OFF', 1, '2020-11-02 08:32:28', '2020-11-02 08:32:28'),
(2, 'Thời trang', 'Thời trang', 1, '2020-11-02 09:17:16', '2020-11-02 09:17:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `order_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '815,000.00', 1, '2020-11-02 16:28:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sale_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sale_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'ÁO KHOÁC D1AKD090002', '450000', 1, NULL, NULL),
(2, 1, 7, 'QUẦN JEAN M1QJN100001', '365000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_sale_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_uu_dai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_so_luong` int(11) NOT NULL,
  `product_so_luong_ban` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_price`, `product_status`, `product_sale_price`, `product_image`, `product_desc`, `product_uu_dai`, `product_so_luong`, `product_so_luong_ban`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ÁO KHOÁC D2AKH090004', 300000, 1, 250000, '1604330768_IMG_6317_Doi.jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201019/25766873/brank_ong_nuoc_Doi.jpg\" style=\"height:4382px; width:700px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, NULL, '2020-11-02 08:26:08', '2020-11-02 08:41:38'),
(2, 5, 2, 'Áo khoác Túi màu trơn Giải trí', 400000, 1, 300000, '1604332934_IMG_1850.jpg', '<p>​​​​​​<img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201002/25228377/AO_KHOAC_W2AKD100002_(4).jpg\" style=\"height:1505px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 08:31:22', '2020-11-02 09:02:14'),
(3, 1, 1, 'ÁO KHOÁC D2AKH090001', 800000, 1, 790000, '1604331623_IMG_6311_Doi.jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201019/25766476/brank_ong_nuoc_Doi.jpg\" style=\"height:5133px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 08:40:23', '2020-11-02 09:00:57'),
(4, 4, 1, 'ÁO KHOÁC D1AKK100001', 500000, 1, 450000, '1604331785_IMG_1884_Doi.jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201019/25765881/brank_ong_nuoc_Doi.jpg\" style=\"height:5133px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 08:43:05', '2020-11-02 09:00:36'),
(5, 6, 2, 'ÁO THUN D1ATN090004', 600000, 1, 540000, '1604332036_IMG (5)_Doi.jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201015/25646651/brank_ong_nuoc_Doi.jpg\" style=\"height:5133px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 08:47:16', '2020-11-02 09:00:45'),
(6, 5, 2, 'ÁO KHOÁC D1AKD090002', 600000, 1, 450000, '1604332401_d2t9-U1AKD080002-ao khoac du-nam-nu-totoshop (2).jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201015/25644852/brank_ong_nuoc_Doi.jpg\" style=\"height:5133px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 99, 2, '2020-11-02 08:49:23', '2020-11-02 09:25:11'),
(7, 7, 2, 'QUẦN JEAN M1QJN100001', 385000, 1, 365000, '1604332273_IMG_1897.jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201001/25210713/QUAN_JEAN_M1QJN100001_(brank_ong_nuoc).jpg\" style=\"height:5133px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 99, 1, '2020-11-02 08:51:13', '2020-11-02 08:59:54'),
(8, 7, 2, 'QUẦN JEAN M1QJN080005', 200000, 1, 150000, '1604332329_D2T9_M1QJN080005_QUAN JEAN NAM_TOTOSHOP (3).jpg', '<p><img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20200818/24193066/QUAN_JEAN_M1QJN080005_(d2t9_m1qjn080005_quan_jean_nam_totoshop_(2)).jpg\" style=\"height:3280px; width:820px\" /></p>', '<p><strong>&raquo;&nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 08:52:09', '2020-11-02 08:59:42'),
(9, 5, 1, 'test', 15000, 1, 14000, '1604334690_IMG (5)_Doi.jpg', '<p>​​​​​​<img alt=\"\" src=\"https://bucket.nhanh.vn/store/7136/psCT/20201002/25228377/AO_KHOAC_W2AKD100002_(4).jpg\" style=\"height:1505px; width:820px\" /></p>', '<p><strong>&raquo; &nbsp;GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</strong></p>\r\n\r\n<p><strong>&raquo; ĐỔI H&Agrave;NG TRONG V&Ograve;NG 30 NG&Agrave;Y</strong></p>\r\n\r\n<p><strong>&raquo;&nbsp;HOTLINE B&Aacute;N H&Agrave;NG 1900 633 501</strong></p>', 100, 0, '2020-11-02 09:31:30', '2020-11-02 09:31:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_note`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Anh', 'HN', '01233456', 'anh195np@gmail.com', 'notr', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_social`
--

CREATE TABLE `tbl_social` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  ADD PRIMARY KEY (`category_news_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  ADD PRIMARY KEY (`news_category_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  MODIFY `category_news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  MODIFY `news_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
