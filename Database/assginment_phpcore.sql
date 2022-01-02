-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:4306
-- Thời gian đã tạo: Th1 02, 2022 lúc 07:34 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assginment_phpcore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `bookid` varchar(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `yearOfPublication` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  `category` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `bookid`, `name`, `author`, `yearOfPublication`, `status`, `category`) VALUES
(63, 's1234', 'Cabins', 'PhilipJodidio', 2000, 1, 'ftson'),
(64, 'a1235', 'AYearinNature', 'HazelMaskell', 2006, 1, 'nfson'),
(65, 'a1236', 'MeBeforeYou', 'JojoMoyes', 2009, 1, 'ftson'),
(66, 'a1237', 'Factfulness', 'HansRosling', 2005, 0, 'ftson'),
(67, 'a1238', 'ThePowerOfRitual', 'CasperTerKuile', 2007, 1, 'ftson'),
(68, 'a1231', 'TheGuiltyFeminist', 'Deborah', 2019, 1, 'ftson'),
(69, 'a2345', 'HiddenFigures', 'MargotLee', 2003, 1, 'nfson'),
(70, 'a9901', 'Outliers', 'MalcolmGladwell', 2010, 1, 'ftson'),
(71, 'a3412', 'YouAretheUniverse', 'DeepakChopra', 2006, 1, 'biolo'),
(72, 'a4523', 'NoOneTellsYouThis', 'GlynnisMacnicol', 2007, 1, 'ltetu'),
(73, 'a3241', 'TheLeaderinMe', 'StephenRCovey', 2010, 1, 'biolo'),
(74, 'a0012', 'TheGirlintheDark', 'AngelaHart', 2011, 1, 'ltetu'),
(75, 'ac124', 'SocialMedia', 'JoanneWestwood', 2019, 1, 'ltetu'),
(76, 'as123', 'SlayInYourLane', 'ElizabethUviebinen', 1998, 0, 'biolo'),
(77, 'mk125', 'MedicalAssistant', 'KaplanNursing', 2002, 1, 'ltetu'),
(78, 'cfs12', 'FindYourSource', 'GaryThomas', 2004, 1, 'biolo'),
(79, 'gv123', 'Cabins', 'OEMAM', 2005, 1, 'slhep'),
(80, 'tys12', 'AYEAROFPOSITIVE', 'CyndieSpiegel', 2009, 1, 'ftson'),
(81, 'fa342', 'AShortGuide', 'AnnQuindlen', 2009, 1, 'ltetu'),
(82, 'mn981', 'EatPrayLove', 'ElizabethGilbert', 1023, 1, 'ftson'),
(83, 'nca12', 'EatTheApple', 'MattYoung', 2012, 1, 'ftson'),
(84, 'blla1', 'TheNewBook', 'NoAuthor', 2020, 1, 'ltetu'),
(85, 'vas12', 'HarryPoster3', 'NewAuthor', 1999, 1, 'ltetu'),
(86, 'mc981', 'MeBeforeGo', 'authornew', 2004, 1, 'po231'),
(95, 'sdca1', 'ddd', 'dadfasd', 2002, 1, 'biolo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryId` char(5) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryStatus`) VALUES
('biolo', 'Biology', 1),
('ftson', 'Fiction', 1),
('ltetu', 'Literature', 1),
('nfson', 'Non-Fiction', 1),
('po231', 'Poetry', 1),
('slhep', 'NewName', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `personid` varchar(5) NOT NULL,
  `personName` varchar(200) NOT NULL,
  `personAddress` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`id`, `personid`, `personName`, `personAddress`, `email`, `phone`, `birthday`) VALUES
(3, 'pe218', 'NguyenVanA', 'HaNoi', 'nguyenvana@gmail.com', '0906288712', '2021-12-10'),
(4, 'pe991', 'NguyenTienDat', 'HoanKiem', 'nguyenvanb@gmail.com', '0908788621', '2021-12-15'),
(5, 'ps901', 'DangThiHue', 'HaNam', 'dangthihue@gmail.com', '0906299367', '1998-07-30'),
(6, 'ps882', 'NguyenQuangHuy', 'HaNoi', 'quanghuy@gmail.com', '0339912341', '1997-11-20'),
(7, 'ps874', 'NguyenTienDong', 'HaNoi', 'tiendong@gmai.com', '09012322453', '1996-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rentbook`
--

CREATE TABLE `rentbook` (
  `id` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `dateStartRent` date NOT NULL,
  `dateEndRent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rentbook`
--

INSERT INTO `rentbook` (`id`, `personId`, `dateStartRent`, `dateEndRent`) VALUES
(7, 17, '2022-01-02', '2022-01-04'),
(9, 9, '2022-01-02', '2022-01-07'),
(12, 5, '2022-01-02', '2022-01-03'),
(14, 10, '2022-01-02', '2022-01-05'),
(15, 11, '2022-01-02', '2022-01-04'),
(16, 13, '2022-01-02', '2022-01-05'),
(32, 3, '2022-01-01', '2022-01-02'),
(54, 2, '2022-01-02', '2022-01-03'),
(87, 4, '2022-01-02', '2022-01-06'),
(230, 11, '2022-01-01', '2022-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rentdetail`
--

CREATE TABLE `rentdetail` (
  `id` int(11) NOT NULL,
  `rentbookId` int(11) NOT NULL,
  `bookId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rentdetail`
--

INSERT INTO `rentdetail` (`id`, `rentbookId`, `bookId`) VALUES
(18, 230, 's1234'),
(19, 230, 'a1235'),
(20, 32, 'a3412'),
(21, 32, 's1234'),
(22, 32, 'ac124'),
(24, 54, 's1234'),
(25, 54, 'a1237'),
(29, 12, 'vas12'),
(30, 12, 'a4523'),
(31, 12, 'tys12'),
(32, 14, 'as123'),
(33, 14, 'mn981'),
(34, 15, 's1234'),
(35, 15, 'ac124'),
(36, 16, 'a1237'),
(37, 16, 'mn981'),
(38, 7, 's1234'),
(39, 7, 'a1236'),
(40, 9, 'a1235'),
(41, 9, 'fa342'),
(42, 87, 'a1236');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_category` (`category`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rentbook`
--
ALTER TABLE `rentbook`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rentdetail`
--
ALTER TABLE `rentdetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `rentbook`
--
ALTER TABLE `rentbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT cho bảng `rentdetail`
--
ALTER TABLE `rentdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_category` FOREIGN KEY (`category`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
