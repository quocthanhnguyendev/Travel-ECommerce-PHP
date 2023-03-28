-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2023 lúc 07:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourist`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coinfarm`
--

CREATE TABLE `coinfarm` (
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `water_tree` int(11) DEFAULT 300,
  `level_tree` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coinfarm`
--

INSERT INTO `coinfarm` (`farm_id`, `user_id`, `water_tree`, `level_tree`) VALUES
(19, 25, 75, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `textcomment` text DEFAULT NULL,
  `comment_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `tour_id`, `textcomment`, `comment_created`) VALUES
(14, 32, 10, 'Chuyến đi tốt đẹp', '2023-03-13 01:35:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phonenumber` char(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `textcontent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `fullname`, `phonenumber`, `email`, `textcontent`) VALUES
(5, 'Nguyễn Tâm', '123451223', 'quocthanh@gmail.com', 'ãb\r\n'),
(6, 'Quốc Thành Nguyễn', '0123456789', 'toilaquocthanhday@gmail.com', 'Hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `ID_COUNTRY` int(11) NOT NULL,
  `NAME_COUNTRY` varchar(50) DEFAULT NULL,
  `IMAGE_COUNTRY` varchar(100) DEFAULT NULL,
  `CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`ID_COUNTRY`, `NAME_COUNTRY`, `IMAGE_COUNTRY`, `CREATED`) VALUES
(1, 'Viet Nam', 'vietnam.jpg', '2023-03-13 07:24:03'),
(2, 'Thailand', 'thailand.jpg', '2023-03-13 07:24:03'),
(3, 'America', 'america.jpg', '2023-03-13 07:24:03'),
(4, 'South Korea', 'southkorea.jpg', '2023-03-13 07:24:03'),
(37, 'Taiwan', 'socks_green.jpg', '2023-03-13 11:00:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `tour_id`) VALUES
(44, 32, 9),
(45, 32, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `quatity` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `tour_id`, `quatity`, `amount`, `transport`, `start_date`, `end_date`) VALUES
(7, 9, 1, 650, 'Bus', '2022-12-11', '2022-12-20'),
(8, 9, 3, 1950, 'Bus', '2022-12-11', '2022-12-20'),
(8, 10, 6, 4500, 'Train', '2022-12-11', '2022-12-20'),
(9, 9, 1, 650, 'Bus', '2022-12-11', '2022-12-20');

--
-- Bẫy `orderdetails`
--
DELIMITER $$
CREATE TRIGGER `update_total` AFTER INSERT ON `orderdetails` FOR EACH ROW UPDATE orders SET total = total + new.amount WHERE order_id = new.order_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `total` float DEFAULT 0,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `created`, `total`, `status`) VALUES
(7, 32, '2023-03-13 08:10:28', 650, 0),
(8, 32, '2023-03-13 08:35:23', 6450, -1),
(9, 32, '2023-03-13 10:38:36', 650, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_logout`
--

CREATE TABLE `orders_logout` (
  `order_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `total` float DEFAULT 0,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_logout`
--

INSERT INTO `orders_logout` (`order_id`, `firstname`, `lastname`, `email`, `phone`, `address`, `created`, `total`, `status`) VALUES
(3, 'Nguyễn', 'Văn c', '0368361849@gmail.com', '1234567890', 'Hà Nội', '2023-03-13 09:37:56', 750, 0),
(4, '1234', '234324', 'toilaquocthanhday@gmail.com', '234234234', '234', '2023-03-13 10:27:25', 750, 0),
(5, 'ádasd', 'ádasd', 'qth@gmail.com', '123123', '123123', '2023-03-13 10:28:13', 750, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details_logout`
--

CREATE TABLE `order_details_logout` (
  `order_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `quatity` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details_logout`
--

INSERT INTO `order_details_logout` (`order_id`, `tour_id`, `quatity`, `amount`, `transport`, `start_date`, `end_date`) VALUES
(3, 10, 1, 750, 'Train', '2022-12-11', '2022-12-20'),
(4, 10, 1, 750, 'Train', '2022-12-11', '2022-12-20'),
(5, 10, 1, 750, 'Train', '2022-12-11', '2022-12-20');

--
-- Bẫy `order_details_logout`
--
DELIMITER $$
CREATE TRIGGER `update_total_logout` BEFORE INSERT ON `order_details_logout` FOR EACH ROW update orders_logout set total = total + new.amount WHERE order_id = new.order_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tourist`
--

CREATE TABLE `tourist` (
  `ID_TOUR` int(11) NOT NULL,
  `NAME_TOUR` varchar(50) DEFAULT NULL,
  `PRICE_TOUR` float DEFAULT NULL,
  `SALE` int(11) DEFAULT 0,
  `DESCRIPTION` longtext DEFAULT NULL,
  `QUATITY` int(11) DEFAULT NULL,
  `ID_COUNTRY` int(11) DEFAULT NULL,
  `TRENDING` tinyint(1) DEFAULT NULL,
  `VIEWS` int(11) DEFAULT 0,
  `ID_TRANSPORT` int(11) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT current_timestamp(),
  `IMAGE_TOUR` varchar(50) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tourist`
--

INSERT INTO `tourist` (`ID_TOUR`, `NAME_TOUR`, `PRICE_TOUR`, `SALE`, `DESCRIPTION`, `QUATITY`, `ID_COUNTRY`, `TRENDING`, `VIEWS`, `ID_TRANSPORT`, `CREATED_DATE`, `IMAGE_TOUR`, `START_DATE`, `END_DATE`) VALUES
(1, 'Ho Chi Minh', 900, 400, 'Thành phố Hồ Chí Minh, còn gọi bằng tên cũ phổ biến là Sài Gòn, là thành phố lớn nhất Việt Nam và là một siêu đô thị trong tương lai gần. Đây còn là trung tâm kinh tế, chính trị, văn hóa, giải trí và giáo dục tại Việt Nam. Thành phố Hồ Chí Minh là thành phố trực thuộc trung ương thuộc loại đô thị đặc biệt của Việt Nam cùng với thủ đô Hà Nội.[8] Nằm trong vùng chuyển tiếp giữa Đông Nam Bộ và Tây Nam Bộ, thành phố này hiện có 16 quận, 1 thành phố và 5 huyện, tổng diện tích 2.095 km2 (809 dặm vuông Anh).[9] Theo kết quả điều tra dân số sơ bộ vào năm 2021 thì dân số thành phố là 9.166.800 người (chiếm 9,3% dân số Việt Nam), mật độ dân số trung bình 4.375 người/km² (cao nhất cả nước)[5]:90. Tuy nhiên, nếu tính những người cư trú không đăng ký hộ khẩu thì dân số thực tế của thành phố này năm 2018 là gần 14 triệu người.[10]\n\nThành phố Hồ Chí Minh năm 2011 chiếm 21,3% tổng sản phẩm (GDP) và 29,38% tổng thu ngân sách của cả Việt Nam.[11][12] Năm 2020, thành phố có GRDP theo giá hiện hành ước là 1.372 ngàn tỷ đồng, theo giá so sánh 2010 đạt 991.424 tỷ đồng (số liệu địa phương cung cấp, Tổng cục Thống kê sẽ công bố GRDP đánh giá lại), tăng 1,39% so với năm 2019, đóng góp trên 22% GDP và 27% tổng thu ngân sách cả nước. GRDP bình quân đầu người ước năm 2020 là 6.328 USD/người, xếp thứ 4 trong số các tỉnh thành cả nước, nhưng so với năm 2019 là giảm.[13] Thu nhập bình quân đầu người năm 2019 sơ bộ là 6,758 triệu VND/tháng, cao thứ hai cả nước sau Bình Dương. Nhờ điều kiện tự nhiên, Thành phố Hồ Chí Minh trở thành một đầu mối giao thông của Việt Nam và Đông Nam Á, bao gồm cả đường bộ, đường sắt, đường thủy và đường hàng không. Vào năm 2019, thành phố đón khoảng 8,6 triệu khách du lịch quốc tế.[14] Các lĩnh vực giáo dục, truyền thông, thể thao, giải trí, Thành phố Hồ Chí Minh đều giữ vị thế hàng đầu.', 200, 1, 0, 371, 3, '2022-12-11 12:38:58', 'hochiminh.jpg', '2022-12-11', '2022-12-20'),
(2, 'Ha Noi', 800, 150, 'Hà Nội là thủ đô, thành phố trực thuộc trung ương và là một đô thị loại đặc biệt của nước Cộng hòa Xã hội chủ nghĩa Việt Nam. Hà Nội nằm về phía tây bắc của trung tâm vùng đồng bằng châu thổ sông Hồng, với địa hình bao gồm vùng đồng bằng trung tâm và vùng đồi núi ở phía bắc và phía tây thành phố. Với diện tích 3.359,82 km²,[2] và dân số 8,33 triệu người,[4] Hà Nội là thành phố trực thuộc trung ương có diện tích lớn nhất Việt Nam, đồng thời cũng là thành phố đông dân thứ hai và có mật độ dân số cao thứ hai trong 63 đơn vị hành chính cấp tỉnh của Việt Nam, nhưng phân bố dân số không đồng đều. Hà Nội có 30 đơn vị hành chính cấp huyện, gồm 12 quận, 17 huyện và 1 thị xã.', 200, 1, 0, 337, 2, '2022-12-11 12:42:05', 'hanoi.jpg', '2022-12-11', '2022-12-20'),
(3, 'Seoul', 5000, 0, 'Seoul (Hangul: 서울, /soʊl/, tiếng Anh: /sʰʌul/  (Speaker Icon.svg nghe), phiên âm: \"Xơ-un\"), tên gọi chính thức là Thành phố Đặc biệt Seoul (Hangul: 서울특별시, Romaja quốc ngữ: Seoul Teukbyeol-si), là thủ đô kiêm đô thị lớn nhất của Hàn Quốc. Seoul nằm bên dòng sông Hán ở phía tây bắc Hàn Quốc, được xếp hạng là một thành phố toàn cầu hạng Alpha và có GDP đạt mức 433,5 tỷ USD - tương đương với Argentina (2019).[9][10] Đây là một trong những thành phố có mức bình quân chi phí sinh hoạt đắt đỏ nhất trên thế giới.[11] Xếp thứ 3 châu Á (sau Tokyo và Singapore), hạng 8 thế giới về chỉ số \'Thành phố quyền lực toàn cầu\' (2020).[12]\n\nSeoul là khu vực chính của vùng thủ đô Seoul, bao gồm các thành phố vệ tinh tiếp giáp xung quanh như Incheon và tỉnh Gyeonggi, là nơi sinh sống của gần một nửa dân số đất nước. Thành phố cách biên giới với Bắc Triều Tiên vào khoảng 50km về phía nam (Khu phi quân sự liên Triều). Seoul là thành phố cổ cũng như có vai trò quan trọng trên bán đảo Triều Tiên, từng lần lượt là thủ đô của Vương triều Bách Tế (18 TCN - 660), Vương quốc Cao Ly (918-1392, thứ cấp), Triều đại Triều Tiên (1392-1897), Đế quốc Đại Hàn (1897-1910), vùng lãnh thổ Triều Tiên thuộc Nhật (Chōsen, 1910-1945), Cộng hòa Nhân dân Triều Tiên (1945-1946), Chính quyền quân sự quân đội Hoa Kỳ tại Triều Tiên (1945-1948), Chính phủ Lâm thời Đại Hàn Dân Quốc (1919-1948) và là tâm điểm, mục tiêu chính của sự tranh giành giữa các bên tham chiến trong chiến tranh Triều Tiên (1950-1953). Thành phố trở thành thủ đô của chính thể Đệ Nhất Đại Hàn Dân Quốc sau khi chính phủ Hàn Quốc được thành lập vào năm 1948. Seoul ngày nay tiếp tục giữ vai trò là một thành phố đặc biệt. Với quy mô dân số là 25,9 triệu người năm 2019[13], Seoul là thành phố lớn nhất tại Hàn Quốc và đồng thời cũng là một trong những thành phố lớn nhất thế giới theo dân số.[14] Mặc dù có diện tích chỉ 605.21km² - nhỏ hơn Luân Đôn hay New York nhưng đây là một trong những đô thị có mật độ dân số cao nhất trên thế giới. Seoul cũng là một trong những thành phố có kết nối số cao nhất thế giới với số lượng người sử dụng Internet nhiều hơn tất cả các quốc gia thuộc khu vực châu Phi hạ Sahara (trừ Cộng hòa Nam Phi) cộng lại.[15] Ngoài ra, Seoul còn là một trong 20 thành phố toàn cầu quan trọng.\n\nVùng thủ đô Seoul có khoảng 26 triệu cư dân sinh sống (2020)[13], là vùng đô thị lớn thứ hai thế giới sau Tokyo.[16] Seoul là trung tâm kinh tế, văn hóa, chính trị của Hàn Quốc. Thành phố đóng vai trò quan trọng trong lịch sử phát triển của quốc gia này và là nơi khởi nguồn của Kỳ tích sông Hán.\n\nNăm 2020, Seoul ghi nhận tổng cộng hơn 24,3 triệu phương tiện cơ giới được đăng ký[17], đây là nguyên nhân khiến cho tình trạng kẹt xe xảy ra thường xuyên. Trong những năm gần đây, chính quyền thành phố đã áp dụng nhiều biện pháp để làm sạch nước và không khí đang bị ô nhiễm, sự phục hồi của suối Cheonggyecheon (vốn trước đây là một con kênh chết vì rác và chất thải công nghiệp) là thành quả tiêu biểu của nhiều dự án làm đẹp đô thị lớn', 200, 4, 1, 126, 3, '2022-12-11 12:42:05', 'seoul.jpg', '2022-12-11', '2022-12-20'),
(4, 'California', 7000, 6500, 'A jumbled collage of colorful neighborhoods and beautiful views, San Francisco draws those free-spirited types who have an eye for edgy art, a taste for imaginative cuisine and a zeal for adventure. It\'s really not surprising that songwriter Tony Bennett left his heart here: The city boasts jaw-dropping sights, world-class cuisine, cozy cafes and plenty of booming nightlife venues – there\'s no shortage of ways to stay busy here. Spend an hour or two sunning yourself alongside sea lions on the bay, admiring the views of the city from Twin Peaks, or strolling along the Marina. And for the quintessential San Franciscan experience, enjoy a ride on a cable car or hop on a boat tour for a cruise beneath the Golden Gate Bridge.\n\nOften described as Los Angeles\' more refined northern cousin, cool and compact San Francisco takes the big-city buzz exuded by its southern counterpart and melds it with a sense of small-town charm. Here, you\'ll discover a patchwork of culture flourishing throughout San Francisco\'s many vibrant quarters. Follow the crowds to the touristy Fisherman\'s Wharf area (which offers spectacular views of Alcatraz) before heading along the bay to the Presidio for a glimpse of the famous Golden Gate Bridge. But don\'t forget to save time for the Mission District, the Haight and the Castro for exposure to all of the different varieties of the San Francisco lifestyle. And when you\'re ready for a break from the city, join one of San Francisco\'s best wine tours for a relaxing daytrip.', 200, 3, 1, 116, 3, '2022-12-11 12:42:05', 'california.jpg', '2022-12-11', '2022-12-20'),
(5, 'Bangkok', 4500, 0, 'Dù sở thích của du khách là gì, Bangkok (hay còn được gọi với cái tên “du lịch” là Trái xoài lớn) đều chiều được hết. Thành phố này có nhiều chùa với nét văn hóa Phật giáo ấn tượng, nhiều cửa hàng bán lẻ rực rỡ, nhiều phố nhỏ (soi) nhằng nhịt như mê cung… Ở Bangkok, du khách có thể đi spa cao cấp với giá 3.000 baht, massage chân với giá 300 baht, thưởng thức đồ ăn lạ miệng ở các nhà hàng danh tiếng hoặc trải nghiệm ẩm thực đường phố với những món cực kỳ khoái khẩu. Không có khu trung tâm riêng biệt dễ nhận biết, Bangkok khiến người mới đến đau đầu khi phải tìm đường. Vì vậy, du khách nên chọn ở khách sạn gần nhà ga đường sắt trên cao hoặc bến tàu điện ngầm. Một khi đã thăm thú chùa chiền, khu mua sắm, du khách nên tới các khu lâu đời nhất của Bangkok để tìm hiểu cuộc sống bản địa. Khu Chinatown có vô số chợ sôi động và phố ẩm thực, trong khi quận Dusit có các đại lộ rợp bóng cây và công trình kiến trúc Trung Quốc-Bồ Đào Nha. Đường Khao San không phải là đặc sản Thái Lan nhưng không khí hội hè vui vẻ nơi đây luôn thu hút du khách “ba lô”.', 200, 2, 0, 132, 3, '2022-12-11 12:42:05', 'bangkok.jpg', '2022-12-11', '2022-12-20'),
(6, 'Da Nang', 2000, 0, 'Đà Nẵng là nơi chuyển tiếp đan xen giữa khí hậu miền Bắc và miền Nam, với tính trội là khí hậu nhiệt đới ở phía Nam. Mỗi năm có hai mùa rõ rệt: mùa khô từ tháng 1 đến tháng 7 và mùa mưa từ tháng 8 đến tháng 12, đôi khi có những đợt rét mùa đông nhưng không kéo dài và trời không rét đậm.\n\nCuối tháng 12 đến cuối tháng 3: Tiết trời mát mẻ và dễ chịu, lý tưởng nhất cho các chuyến du xuân. Giá cả dịch vụ khách sạn, ăn uống vào thời gian này được cho là bình ổn nhất trong năm. Lưu ý, du khách nên mang thêm áo khoác mỏng vì trời có thể se lạnh vào buổi tối, thi thoảng có mưa xuân.\n\nĐầu tháng 4 đến giữa tháng 9: Đây là thời gian đẹp nhất để du lịch Đà Nẵng, song cũng là mùa cao điểm du lịch hè, khá đông đúc và đắt đỏ. Tháng 4 là mùa cây rừng thay lá vàng, lá đỏ trên bán đảo Sơn Trà.\n\nGiữa tháng 9 đến cuối tháng 12: Trời không còn nắng nóng, bắt đầu lác đác mưa rào nhưng không kéo dài. Mùa cao điểm đã qua, nên vé máy bay, dịch vụ lưu trú, ăn uống có giá cả hợp lý.', 200, 1, 1, 145, 1, '2022-12-11 12:42:05', 'danang.jpg', '2022-12-11', '2022-12-20'),
(7, 'Phu Quoc', 2000, 0, 'Thời điểm lý tưởng nhất để du lịch Đảo Ngọc là từ khoảng tháng 11 đến tháng 4 năm sau. Đây là mùa khô ở phương Nam, trời ít mưa, biển lặng, sóng êm và nắng ấm thích hợp cho các hoạt động du lịch ngoài trời. Mùa này thích hợp cho những tour du lịch nghỉ dưỡng, không thích hợp cho khách đi bụi hoặc đi phượt.\n\nTừ khoảng tháng 5 đến tháng 10 là mùa mưa, đôi khi có bão nhưng Phú Quốc vẫn đông khách do rơi vào khoảng thời gian nghỉ hè. Nếu đi Phú Quốc mùa này, bạn nên đến vào khoảng cuối tháng 4, lúc này khách vẫn chưa đông và thời tiết còn đẹp, giá cả cũng không tăng quá cao như mùa cao điểm. Tháng 10 cũng là thời điểm giao mùa nên ít mưa.', 200, 1, 0, 149, 1, '2022-12-11 12:42:05', 'phuquoc.jpg', '2022-12-11', '2022-12-20'),
(8, 'Surat Thani', 500, 0, 'Surat thani trong tiếng Thái xưa có nghĩa là \"thành phố của những người tốt bụng\", đây là một thành phố cảng quan trọng của Thái Lan. Tuy không sở hữu nhiều địa điểm du lịch hấp dẫn như Bangkok thế nhưng với hệ thống những hòn đảo đẹp nhất nhì Thái Lan xung quanh đây, Surat Thani đang là một điểm đến thu hút rất nhiều du khách trong và ngoài nước.\nĐến đây, bạn có thể đắm mình tận hưởng làn nước trong xanh tuyệt vời tại Koh Samui, tham gia Lễ hội trăng tròn nổi tiếng tại đảo Koh Phangan hay lặn ngắm san hô tại đảo Koh Tao, thuê thuyền du ngoạn vòng quanh đảo.', 200, 2, 0, 147, 3, '2022-12-11 12:42:05', 'suratthani.jpg', '2022-12-11', '2022-12-20'),
(9, 'Ratchathani', 650, 0, 'Khu vực này đã là một phần của Đế quốc Khmer cho đến khi vua Ramathibodi, Vương quốc Ayutthaya đánh bại và sáp nhập lãnh thổ này vào vương quốc của mình. Sau khi Ayutthaya sụp đổ năm 1767, đã có nhiều bộ lạc sinh sống tại đây như Kha và Suai. Hai mươi năm sau, vua Rama I đã ban tặng tước quý tộc cho một lãnh đạo địa phương để vị này thống nhất các khu định cư vào một thị xã. Vào năm 1786, Thao Khamphong đã thành lập Ubon Ratchathani, đến năm 1792 nó trở thành một tỉnh và trung tâm của Isan. Năm 1925, nó trở thành một monthon của Nakhon Ratchasima. Năm 1933, sau khi monthon bị hủy bỏ, tỉnh này đã trở thành một đơn vị quốc gia đầu tiên của Thái Lan.\n\nTrước năm 1972, Ubon Ratchathani là tỉnh lớn nhất Thái Lan. Sau khi các tỉnh Yasothon năm 1972, Amnat Charoen năm 1993 được tách ra, Ubon Ratchathani chỉ đứng hạng thứ năm trong danh sách các tỉnh lớn nhất.', 194, 2, 0, 165, 3, '2022-12-11 12:42:05', 'ubonratchathani.jpg', '2022-12-11', '2022-12-20'),
(10, 'Chiang Mai', 750, 0, 'Songthaew là phương tiện được khuyên dùng nhiều nhất vì có thể đỗ ở bên đường, miễn là người lái xe biết được điểm đến. Giá xe ôm được tính theo khoảng cách, một chuyến đi khoảng 20-60 baht, khá rẻ. Tuy nhiên, nếu bạn muốn đi đến một nơi xa xôi, bạn nên tìm thuê tại các đại lý du lịch để đảm bảo an toàn và thuận tiện.\r\nNếu bạn cần đi du lịch đến nhiều địa điểm tham quan ở Chiang Mai trong thời gian ngắn thì hãy thuê luôn 1 chiếc xe riêng để được tài xế lành nghề và hướng dẫn viên du lịch người địa phương hỗ trợ. Bạn có thể , với các gói thuê từ 4 tiếng đến tận 3 ngày.', 0, 2, 1, 192, 2, '2022-12-11 12:42:05', 'chiangmai.jpg', '2022-12-11', '2022-12-20'),
(11, 'Hue', 800, 0, '123123123', 200, 3, 1, 0, 2, '2023-03-13 10:59:12', 'socks_blue.jpg', '2023-03-10', '2023-03-31'),
(12, '12', 12, 12, '123213', 12, 37, 0, 0, 1, '2023-03-13 11:01:54', 'socks_green.jpg', '2023-03-25', '2023-04-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transport`
--

CREATE TABLE `transport` (
  `ID_TRANSPORT` int(11) NOT NULL,
  `NAME_TRANSPORT` varchar(50) DEFAULT NULL,
  `ICON` varchar(100) DEFAULT NULL,
  `CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `transport`
--

INSERT INTO `transport` (`ID_TRANSPORT`, `NAME_TRANSPORT`, `ICON`, `CREATED`) VALUES
(1, 'Flights', '<i class=\"fa-solid fa-plane\"></i>', '2023-03-13 07:22:57'),
(2, 'Train', '<i class=\"fa-solid fa-train\"></i>', '2023-03-13 07:22:57'),
(3, 'Bus', '<i class=\"fa-solid fa-bus\"></i>', '2023-03-13 07:22:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `point` int(11) DEFAULT 0,
  `role` int(1) DEFAULT 0,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` char(30) DEFAULT NULL,
  `water` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `gender`, `point`, `role`, `user_created`, `avatar`, `water`) VALUES
(32, 'Nguyễn', 'Quốc Thành', 'toilaquocthanhday@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 'Hà Nội', b'0', 5102, 1, '2023-03-13 00:28:50', 'socks_green.jpg', 4750),
(33, 'Nguyễn', 'Văn A', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 'Hồ Chí Minh', b'1', 0, 2, '2023-03-13 00:29:45', NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `coinfarm`
--
ALTER TABLE `coinfarm`
  ADD PRIMARY KEY (`farm_id`,`user_id`),
  ADD KEY `FK_USER_ID_FARM` (`user_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_Comment_UserID` (`user_id`),
  ADD KEY `FK_Comment_TourID` (`tour_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID_COUNTRY`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`,`tour_id`),
  ADD KEY `fk_tourist_orderdetail` (`tour_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Chỉ mục cho bảng `orders_logout`
--
ALTER TABLE `orders_logout`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details_logout`
--
ALTER TABLE `order_details_logout`
  ADD PRIMARY KEY (`order_id`,`tour_id`),
  ADD KEY `fk_tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`ID_TOUR`),
  ADD KEY `FK_ID_TRANSPORT` (`ID_TRANSPORT`);

--
-- Chỉ mục cho bảng `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`ID_TRANSPORT`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `coinfarm`
--
ALTER TABLE `coinfarm`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `ID_COUNTRY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders_logout`
--
ALTER TABLE `orders_logout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tourist`
--
ALTER TABLE `tourist`
  MODIFY `ID_TOUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `transport`
--
ALTER TABLE `transport`
  MODIFY `ID_TRANSPORT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
