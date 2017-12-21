-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 17-12-19 23:32
-- 서버 버전: 10.1.28-MariaDB
-- PHP 버전: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `myservice`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comments`
--

CREATE TABLE `comments` (
  `commentsID` int(10) UNSIGNED NOT NULL COMMENT '댓글 번호',
  `contentsID` int(10) UNSIGNED NOT NULL COMMENT '게시물 번호',
  `myMemberID` int(10) UNSIGNED NOT NULL COMMENT '회원번호 ',
  `comment` text NOT NULL COMMENT '댓글 내용',
  `regTime` int(10) UNSIGNED NOT NULL COMMENT '댓글 등록 시간'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='댓글';

--
-- 테이블의 덤프 데이터 `comments`
--

INSERT INTO `comments` (`commentsID`, `contentsID`, `myMemberID`, `comment`, `regTime`) VALUES
(1, 1, 1, '앙 공감띄~~~~~~', 1512208985),
(2, 1, 3, '호오', 1512209575),
(3, 4, 1, '앙 기모리!', 1512577946),
(4, 30101, 1, 'dsaf', 1513415229),
(5, 30102, 1, 'asdzxcv', 1513415233),
(6, 30104, 1, 'asdzxxcv', 1513415237),
(7, 10101, 1, '봐봐', 1513415293),
(8, 10101, 10, ';kj;l', 1513428138);

-- --------------------------------------------------------

--
-- 테이블 구조 `contents`
--

CREATE TABLE `contents` (
  `contentsID` int(10) UNSIGNED NOT NULL COMMENT '게시물 번호',
  `myMemberID` int(10) UNSIGNED NOT NULL COMMENT '작성한 고객번호',
  `content` longtext NOT NULL COMMENT '게시물 내용',
  `regTime` int(10) UNSIGNED NOT NULL COMMENT '등록 시간'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='게시물';

--
-- 테이블의 덤프 데이터 `contents`
--

INSERT INTO `contents` (`contentsID`, `myMemberID`, `content`, `regTime`) VALUES
(1, 1, 'gdgd', 1512208968),
(2, 3, '띠용!', 1512209569),
(3, 4, 'hi everyBody', 1512209609),
(4, 9, '?', 1512221482);

-- --------------------------------------------------------

--
-- 테이블 구조 `likes`
--

CREATE TABLE `likes` (
  `likesID` int(10) UNSIGNED NOT NULL COMMENT '공감 번호',
  `contentsID` int(10) UNSIGNED NOT NULL COMMENT '게시물 번호',
  `myMemberID` int(10) UNSIGNED NOT NULL COMMENT '고객번호',
  `regTime` int(10) UNSIGNED NOT NULL COMMENT '공감 누른 시간'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='공감하기';

--
-- 테이블의 덤프 데이터 `likes`
--

INSERT INTO `likes` (`likesID`, `contentsID`, `myMemberID`, `regTime`) VALUES
(1, 1, 1, 1512208973),
(2, 3, 2, 1512209622),
(20, 4, 1, 1513423383),
(56, 20201, 10, 1513446590),
(63, 10105, 5, 1513520206),
(71, 10101, 5, 1513520244),
(148, 10205, 10, 1513597696),
(205, 10101, 10, 1513720675),
(226, 10102, 10, 1513721315);

-- --------------------------------------------------------

--
-- 테이블 구조 `mymember`
--

CREATE TABLE `mymember` (
  `myMemberID` int(10) UNSIGNED NOT NULL COMMENT '고객번호',
  `userName` varchar(60) NOT NULL DEFAULT '' COMMENT '이름',
  `email` varchar(30) NOT NULL,
  `pw` varchar(40) NOT NULL COMMENT '비밀번호',
  `birthDay` char(10) NOT NULL COMMENT '생일',
  `gender` enum('w','m') NOT NULL COMMENT '성별',
  `class` char(1) NOT NULL DEFAULT '0',
  `profilePhoto` varchar(80) DEFAULT NULL COMMENT '프로필사진',
  `coverPhoto` varchar(80) DEFAULT NULL COMMENT '커버사진',
  `regTime` int(10) UNSIGNED NOT NULL COMMENT '가입시간'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='회원 정보';

--
-- 테이블의 덤프 데이터 `mymember`
--

INSERT INTO `mymember` (`myMemberID`, `userName`, `email`, `pw`, `birthDay`, `gender`, `class`, `profilePhoto`, `coverPhoto`, `regTime`) VALUES
(1, '제발요', 'test@abc.me', '57420c989c7fbded66720ac30c0524094708e20c', '2016-3-3', 'w', '0', '/myservice/images/myMemberProfilePhoto/myMemberProfilePhoto1.jpeg', '/myservice/images/myMemberCoverPhoto/myMemberCoverPhoto1.jpeg', 1512208963),
(2, '몰라요', 'a@a.a', '57420c989c7fbded66720ac30c0524094708e20c', '2015-2-10', 'm', '0', '/myservice/images/me/boy.png', '/myservice/images/me/happyCat.png', 1512209534),
(3, '잘생긴사람', 'b@bb.b', '57420c989c7fbded66720ac30c0524094708e20c', '2004-6-11', 'w', '0', '/myservice/images/me/girl.png', '/myservice/images/me/happyCat.png', 1512209561),
(4, 'forigener', 'fff@fuck.you', '57420c989c7fbded66720ac30c0524094708e20c', '2015-3-3', 'w', '0', '/myservice/images/me/girl.png', '/myservice/images/me/happyCat.png', 1512209599),
(5, '이종현', 'ant9406@naver.com', '57420c989c7fbded66720ac30c0524094708e20c', '1994-6-6', 'm', '0', '/myservice/images/me/boy.png', '/myservice/images/me/happyCat.png', 1512209615),
(6, '박하니', 'hani@sample.com', '57420c989c7fbded66720ac30c0524094708e20c', '1993-12-4', 'm', '0', '/myservice/images/me/boy.png', '/myservice/images/me/happyCat.png', 1512209625),
(7, '하엄지', 'eumji@sample.com', '57420c989c7fbded66720ac30c0524094708e20c', '2001-11-19', 'w', '0', '/myservice/images/me/girl.png', '/myservice/images/me/happyCat.png', 1512209680),
(8, '양야후', 'yahoo@sample.com', '57420c989c7fbded66720ac30c0524094708e20c', '1984-7-17', 'm', '0', '/myservice/images/me/boy.png', '/myservice/images/me/happyCat.png', 1512209791),
(9, '김주완', 'qwe123@naver.com', '284ea54d335511f554688096a55fdcf6b7f4205d', '1999-3-16', 'm', '0', '/myservice/images/myMemberProfilePhoto/myMemberProfilePhoto9.jpeg', '/myservice/images/myMemberCoverPhoto/myMemberCoverPhoto9.jpeg', 1512220693),
(10, 'rlrlrlrlrl', 'asdfasdf@naver.com', '57420c989c7fbded66720ac30c0524094708e20c', '2013-4-4', 'm', '0', '/myservice/images/me/boy.png', '/myservice/images/me/happyCat.png', 1513226993);

-- --------------------------------------------------------

--
-- 테이블 구조 `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_num` int(11) NOT NULL DEFAULT '0',
  `cate1` varchar(80) NOT NULL,
  `cate2` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `expiry_day` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `like_hate` int(11) DEFAULT '0',
  `productPhoto` varchar(80) DEFAULT '/myservice/images/me/boy.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `product`
--

INSERT INTO `product` (`p_id`, `p_num`, `cate1`, `cate2`, `name`, `expiry_day`, `price`, `like_hate`, `productPhoto`) VALUES
(10101, 10, '감미품', '초콜렛류', '가나', 365, 1000, 10, '/myservice/images/product/10101.jpg'),
(10102, 12, '감미품', '초콜렛류', '크런키', 365, 1000, 0, '/myservice/images/product/10102.jpg'),
(10103, 3, '감미품', '초콜렛류', '에이비씨', 365, 2000, 0, '/myservice/images/product/10103.jpg'),
(10104, 15, '감미품', '초콜렛류', '허쉬', 365, 1500, 3, '/myservice/images/product/10104.jpg'),
(10105, 5, '감미품', '초콜렛류', '킨더초콜릿', 365, 1500, 0, '/myservice/images/product/10105.jpg'),
(10201, 12, '감미품', '껌류', '와우', 365, 1000, 0, '/myservice/images/product/10201.jpg'),
(10202, 30, '감미품', '껌류', '후라보노', 365, 1000, 0, '/myservice/images/product/10202.jpg'),
(10203, 60, '감미품', '껌류', '아카시아', 365, 1000, 0, '/myservice/images/product/10203.jpg'),
(10204, 2, '감미품', '껌류', '자일리톨', 365, 1000, 0, '/myservice/images/product/10204.jpg'),
(10205, 18, '감미품', '껌류', '쥬시후레쉬', 365, 1000, 0, '/myservice/images/product/10205.jpg'),
(10301, 12, '감미품', '감자칩류', '포카칩', 180, 1500, 0, '/myservice/images/product/10301.jpg'),
(10302, 11, '감미품', '감자칩류', '스윙칩', 180, 1500, 0, '/myservice/images/product/10302.jpg'),
(10303, 8, '감미품', '감자칩류', '프링글스', 180, 2000, 0, '/myservice/images/product/10303.jpg'),
(10304, 6, '감미품', '감자칩류', '예감', 180, 1500, 0, '/myservice/images/product/10304.jpg'),
(10305, 15, '감미품', '감자칩류', '허니버터칩', 180, 1500, 0, '/myservice/images/product/10305.jpg'),
(10401, 7, '감미품', '비스켓류', '제크', 365, 2000, 0, '/myservice/images/product/10401.jpg'),
(10402, 8, '감미품', '비스켓류', '에이스', 365, 2000, 0, '/myservice/images/product/10402.jpg'),
(10403, 4, '감미품', '비스켓류', '다이제', 365, 2000, 5, '/myservice/images/product/10403.jpg'),
(10404, 3, '감미품', '비스켓류', '사브레', 365, 2000, 0, '/myservice/images/product/10404.jpg'),
(10405, 3, '감미품', '비스켓류', '엄마손파이', 365, 2000, 0, '/myservice/images/product/10405.jpg'),
(10501, 11, '감미품', '건과류', '콘칩', 180, 1500, 0, '/myservice/images/product/10501.jpg'),
(10502, 11, '감미품', '건과류', '꼬깔콘', 180, 1500, 0, '/myservice/images/product/10502.jpg'),
(10503, 13, '감미품', '건과류', '썬칩', 180, 1500, 0, '/myservice/images/product/10503.jpg'),
(10504, 5, '감미품', '건과류', '오잉', 180, 1500, 0, '/myservice/images/product/10504.jpg'),
(10505, 9, '감미품', '건과류', '새우깡', 180, 1500, 0, '/myservice/images/product/10505.jpg'),
(20101, 10, '식품', '라면류', '신라면', 180, 1000, 0, '/myservice/images/product/20101.jpg'),
(20102, 9, '식품', '라면류', '진라면', 180, 1000, 0, '/myservice/images/product/20102.jpg'),
(20103, 8, '식품', '라면류', '안성탕면', 180, 1000, 0, '/myservice/images/product/20103.jpg'),
(20104, 11, '식품', '라면류', '짜파게티', 180, 1000, 0, '/myservice/images/product/20104.jpg'),
(20105, 3, '식품', '라면류', '너구리', 180, 1000, 0, '/myservice/images/product/20105.jpg'),
(20201, 6, '식품', '레토르트류', '햇반', 210, 1500, 0, '/myservice/images/product/20201.jpg'),
(20202, 1, '식품', '레토르트류', '3분요리', 500, 2000, 0, '/myservice/images/product/20202.jpg'),
(20203, 5, '식품', '레토르트류', '고구마츄', 180, 2000, 0, '/myservice/images/product/20203.jpg'),
(20204, 3, '식품', '레토르트류', '양반참치죽', 500, 3000, 0, '/myservice/images/product/20204.jpg'),
(20205, 3, '식품', '레토르트류', '맛밤', 270, 2000, 0, '/myservice/images/product/20205.jpg'),
(20301, 2, '식품', '참치통조림류', '마일드참치', 1095, 1500, 0, '/myservice/images/product/20301.jpg'),
(20302, 2, '식품', '참치통조림류', '야채참치', 1095, 1700, 0, '/myservice/images/product/20302.jpg'),
(20303, 2, '식품', '참치통조림류', '고추참치', 1095, 1700, 0, '/myservice/images/product/20303.jpg'),
(20304, 2, '식품', '참치통조림류', '동원참치', 1095, 2000, 0, '/myservice/images/product/20304.jpg'),
(20305, 2, '식품', '참치통조림류', '사조참치', 1095, 1500, 0, '/myservice/images/product/20305.jpg'),
(20401, 2, '식품', '냉동식품류', '비비고왕교자', 365, 5000, 0, '/myservice/images/product/20401.jpg'),
(20402, 2, '식품', '냉동식품류', '오뚜기냉동피자', 365, 5000, 0, '/myservice/images/product/20402.jpg'),
(20403, 2, '식품', '냉동식품류', '동원개성왕만두', 365, 5000, 0, '/myservice/images/product/20403.jpg'),
(20404, 2, '식품', '냉동식품류', '치즈스틱', 365, 5000, 0, '/myservice/images/product/20404.jpg'),
(20405, 2, '식품', '냉동식품류', '냉동볶음밥', 365, 3000, 0, '/myservice/images/product/20405.jpg'),
(20501, 3, '식품', '신선식품류', '삼각김밥', 2, 1000, 0, '/myservice/images/product/20501.jpg'),
(20502, 2, '식품', '신선식품류', '도시락', 2, 4500, 0, '/myservice/images/product/20502.jpg'),
(20503, 2, '식품', '신선식품류', '샌드위치', 3, 2000, 0, '/myservice/images/product/20503.jpg'),
(20504, 2, '식품', '신선식품류', '햄버거', 3, 2500, 0, '/myservice/images/product/20504.jpg'),
(20505, 2, '식품', '신선식품류', '김밥', 2, 1800, 0, '/myservice/images/product/20505.jpg'),
(30101, 20, '빙과', '바류', '스크류바', 9999, 1000, 0, '/myservice/images/product/30101.jpg'),
(30102, 21, '빙과', '바류', '누가바', 9999, 1000, 0, '/myservice/images/product/30102.jpg'),
(30103, 23, '빙과', '바류', '돼지바', 9999, 1000, 0, '/myservice/images/product/30103.jpg'),
(30104, 16, '빙과', '바류', '메로나', 9999, 1000, 0, '/myservice/images/product/30104.jpg'),
(30105, 18, '빙과', '바류', '보석바', 9999, 1000, 0, '/myservice/images/product/30105.jpg'),
(30201, 10, '빙과', '콘류', '월드콘', 9999, 2000, 0, '/myservice/images/product/30201.jpg'),
(30202, 9, '빙과', '콘류', '구구콘', 9999, 2000, 0, '/myservice/images/product/30202.jpg'),
(30203, 13, '빙과', '콘류', '끌레도르콘', 9999, 2000, 0, '/myservice/images/product/30203.jpg'),
(30204, 14, '빙과', '콘류', '슈팅스타', 9999, 2000, 0, '/myservice/images/product/30204.jpg'),
(30205, 10, '빙과', '콘류', '빵빠레', 9999, 2000, 0, '/myservice/images/product/30205.jpg'),
(30301, 9, '빙과', '컵류', '팥빙수', 9999, 2000, 0, '/myservice/images/product/30301.jpg'),
(30302, 8, '빙과', '컵류', '찰떡아이스', 9999, 2000, 0, '/myservice/images/product/30302.jpg'),
(30303, 13, '빙과', '컵류', '와', 9999, 1500, 0, '/myservice/images/product/30303.jpg'),
(30304, 6, '빙과', '컵류', '구슬아이스크림', 9999, 2500, 0, '/myservice/images/product/30304.jpg'),
(30305, 5, '빙과', '컵류', '고드름', 9999, 2000, 0, '/myservice/images/product/30305.jpg'),
(30401, 12, '빙과', '튜브류', '설레임', 9999, 1500, 0, '/myservice/images/product/30401.jpg'),
(30402, 18, '빙과', '튜브류', '빠삐코', 9999, 1500, 0, '/myservice/images/product/30402.jpg'),
(30403, 6, '빙과', '튜브류', '뽕따', 9999, 1500, 0, '/myservice/images/product/30403.jpg'),
(30404, 15, '빙과', '튜브류', '탱크보이', 9999, 1500, 0, '/myservice/images/product/30404.jpg'),
(30405, 7, '빙과', '튜브류', '거북알', 9999, 1500, 0, '/myservice/images/product/30405.jpg'),
(30501, 2, '빙과', '패밀리류', '투게더', 9999, 5000, 0, '/myservice/images/product/30501.jpg'),
(30502, 2, '빙과', '패밀리류', '호두마루', 9999, 5000, 0, '/myservice/images/product/30502.jpg'),
(30503, 2, '빙과', '패밀리류', '쿠앤크', 9999, 5000, 0, '/myservice/images/product/30503.jpg'),
(30504, 2, '빙과', '패밀리류', '엑설런트', 9999, 5000, 0, '/myservice/images/product/30504.jpg'),
(30505, 2, '빙과', '패밀리류', '셀렉션', 9999, 5000, 0, '/myservice/images/product/30505.jpg'),
(40101, 12, '음료', '탄산류', '코카콜라', 365, 1500, 0, '/myservice/images/product/40101.jpg'),
(40102, 11, '음료', '탄산류', '칠성사이다', 365, 1400, 0, '/myservice/images/product/40102.jpg'),
(40103, 8, '음료', '탄산류', '밀키스', 365, 1200, 0, '/myservice/images/product/40103.jpg'),
(40104, 11, '음료', '탄산류', '웰치스', 365, 1000, 0, '/myservice/images/product/40104.jpg'),
(40105, 13, '음료', '탄산류', '트로피카나', 365, 1200, 0, '/myservice/images/product/40105.jpg'),
(40201, 15, '음료', '이온음료류', '포카리스웨트', 365, 1300, 0, '/myservice/images/product/40201.jpg'),
(40202, 7, '음료', '이온음료류', '게토레이', 365, 1000, 0, '/myservice/images/product/40202.jpg'),
(40203, 6, '음료', '이온음료류', '파워에이드', 365, 1200, 0, '/myservice/images/product/40203.jpg'),
(40204, 8, '음료', '이온음료류', '이프로부족할때', 365, 1000, 0, '/myservice/images/product/40204.jpg'),
(40205, 8, '음료', '이온음료류', '토레타', 365, 2000, 0, '/myservice/images/product/40205.jpg'),
(40301, 4, '음료', '과채음료류', '델몬트오렌지', 365, 3000, 0, '/myservice/images/product/40301.jpg'),
(40302, 4, '음료', '과채음료류', '자연은토마토', 365, 3000, 0, '/myservice/images/product/40302.jpg'),
(40303, 4, '음료', '과채음료류', '썬키스트자몽', 365, 3000, 0, '/myservice/images/product/40303.jpg'),
(40304, 4, '음료', '과채음료류', '미닛메이드', 365, 3000, 0, '/myservice/images/product/40304.jpg'),
(40305, 4, '음료', '과채음료류', '갈아만든배', 365, 3000, 0, '/myservice/images/product/40305.jpg'),
(40401, 6, '음료', '커피류', '바리스타', 365, 2000, 0, '/myservice/images/product/40401.jpg'),
(40402, 6, '음료', '커피류', '카와', 365, 2000, 0, '/myservice/images/product/40402.jpg'),
(40403, 6, '음료', '커피류', '티오피', 365, 2500, 0, '/myservice/images/product/40403.jpg'),
(40404, 18, '음료', '커피류', '레쓰비', 365, 1000, 0, '/myservice/images/product/40404.jpg'),
(40405, 6, '음료', '커피류', '칸타타', 365, 2500, 0, '/myservice/images/product/40405.jpg'),
(40501, 10, '음료', '숙취음료류', '컨디션', 365, 5000, 0, '/myservice/images/product/40501.jpg'),
(40502, 10, '음료', '숙취음료류', '여명', 365, 5000, 0, '/myservice/images/product/40502.jpg'),
(40503, 10, '음료', '숙취음료류', '모닝케어', 365, 5000, 0, '/myservice/images/product/40503.jpg'),
(40504, 10, '음료', '숙취음료류', '레디큐', 365, 5000, 0, '/myservice/images/product/40504.jpg'),
(40505, 4, '음료', '숙취음료류', '헛개수', 365, 2000, 0, '/myservice/images/product/40505.jpg'),
(50101, 2, '생활용품', '샴푸류', '케라시스', 365, 6000, 0, '/myservice/images/product/50101.jpg'),
(50102, 1, '생활용품', '샴푸류', '미쟝센', 365, 7000, 0, '/myservice/images/product/50102.jpg'),
(50103, 1, '생활용품', '샴푸류', '려', 365, 7000, 0, '/myservice/images/product/50103.jpg'),
(50104, 1, '생활용품', '샴푸류', '엘라스틴', 365, 6000, 0, '/myservice/images/product/50104.jpg'),
(50105, 1, '생활용품', '샴푸류', '댕기머리', 365, 6000, 0, '/myservice/images/product/50105.jpg'),
(50201, 2, '생활용품', '바디워시류', '도브', 365, 6000, 0, '/myservice/images/product/50201.jpg'),
(50202, 1, '생활용품', '바디워시류', '온더바디', 365, 6000, 0, '/myservice/images/product/50202.jpg'),
(50203, 2, '생활용품', '바디워시류', '해피바스', 365, 6000, 0, '/myservice/images/product/50203.jpg'),
(50204, 1, '생활용품', '바디워시류', '샤워메이트', 365, 6000, 0, '/myservice/images/product/50204.jpg'),
(50205, 1, '생활용품', '바디워시류', '비욘드', 365, 7000, 0, '/myservice/images/product/50205.jpg'),
(50301, 2, '생활용품', '세제류', '비트', 9999, 14000, 0, '/myservice/images/product/50301.jpg'),
(50302, 1, '생활용품', '세제류', '퍼실', 9999, 17000, 0, '/myservice/images/product/50302.jpg'),
(50303, 1, '생활용품', '세제류', '액츠', 9999, 9000, 0, '/myservice/images/product/50303.jpg'),
(50304, 1, '생활용품', '세제류', '스파크', 9999, 11000, 0, '/myservice/images/product/50304.jpg'),
(50305, 2, '생활용품', '세제류', '리큐', 9999, 13000, 0, '/myservice/images/product/50305.jpg'),
(50401, 3, '생활용품', '치약류', '2080', 365, 2000, 0, '/myservice/images/product/50401.jpg'),
(50402, 3, '생활용품', '치약류', '페리오', 365, 2000, 0, '/myservice/images/product/50402.jpg'),
(50403, 3, '생활용품', '치약류', '메디안', 365, 2000, 0, '/myservice/images/product/50403.jpg'),
(50404, 2, '생활용품', '치약류', '죽염', 365, 2000, 0, '/myservice/images/product/50404.jpg'),
(50405, 3, '생활용품', '치약류', '작트', 365, 2000, 0, '/myservice/images/product/50405.jpg'),
(50501, 4, '생활용품', '문구류', '포스트잇', 9999, 1000, 0, '/myservice/images/product/50501.jpg'),
(50502, 10, '생활용품', '문구류', '볼펜', 500, 1000, 0, '/myservice/images/product/50502.jpg'),
(50503, 5, '생활용품', '문구류', 'A4용지', 9999, 5000, 0, '/myservice/images/product/50503.jpg'),
(50504, 5, '생활용품', '문구류', '공책', 9999, 2000, 0, '/myservice/images/product/50504.jpg'),
(50505, 5, '생활용품', '문구류', '컴퓨터싸인펜', 500, 1000, 0, '/myservice/images/product/50505.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `product_like`
--

CREATE TABLE `product_like` (
  `pl_id` int(10) UNSIGNED NOT NULL,
  `product` int(11) NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `product_like`
--

INSERT INTO `product_like` (`pl_id`, `product`, `member`) VALUES
(1, 10101, 1),
(3, 10102, 1),
(4, 10103, 1),
(5, 10102, 2);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentsID`);

--
-- 테이블의 인덱스 `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contentsID`);

--
-- 테이블의 인덱스 `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likesID`);

--
-- 테이블의 인덱스 `mymember`
--
ALTER TABLE `mymember`
  ADD PRIMARY KEY (`myMemberID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 테이블의 인덱스 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- 테이블의 인덱스 `product_like`
--
ALTER TABLE `product_like`
  ADD PRIMARY KEY (`pl_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `commentsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '댓글 번호', AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `contents`
--
ALTER TABLE `contents`
  MODIFY `contentsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '게시물 번호', AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `likesID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '공감 번호', AUTO_INCREMENT=228;

--
-- 테이블의 AUTO_INCREMENT `mymember`
--
ALTER TABLE `mymember`
  MODIFY `myMemberID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '고객번호', AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `product_like`
--
ALTER TABLE `product_like`
  MODIFY `pl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
