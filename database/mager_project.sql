-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mager_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(100) NOT NULL,
  `user_Id` int(50) NOT NULL,
  `Package_Id` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Tour_Date` date NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Package_Price` int(100) NOT NULL,
  `Package_Duration` varchar(100) NOT NULL,
  `Package_Type` varchar(100) NOT NULL,
  `No_of_Person` varchar(200) NOT NULL,
  `Booking_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `Status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_Id`, `Package_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `Tour_Date`, `Package_Name`, `Package_Price`, `Package_Duration`, `Package_Type`, `No_of_Person`, `Booking_Date`, `Status`) VALUES
(137, 93, '15', 'Harshvardhan Vathare', 'akshayvathare42@gmail.com', '7972187168', '2025-01-09', 'Harshtour Packages', 10000, '4 Days, 3 Night', ' Couple & Famillty Packages are both', '4', '2025-01-06 15:38:22.547349', 'Approved'),
(138, 93, '41', 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', '7972187168', '2025-01-16', 'Orange County 3', 24988, '2 Days, 1 Night', ' only friends', '4', '2025-01-06 15:44:47.094250', 'Approved'),
(139, 93, '', 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', '7972187168', '2025-01-14', 'Narayan Hotels', 11994, '2', ' 3', '4', '2025-01-06 23:37:20.496201', 'Approved'),
(143, 93, '15', 'Dhairyasheel patil', 'patilshiv481@gmail.com', '4334343434', '2025-02-20', 'Harshtour Packages', 22500, '3', ' Couple & Famillty Packages are both', '3', '2025-02-17 13:39:39.264925', 'Approved'),
(144, 93, '15', 'Dhairyasheel patil', 'patilshiv481@gmail.com', '123432344', '2025-02-28', 'Harshtour Packages', 40000, '4 Days', ' Couple & Famillty Packages are both', '4', '2025-02-17 13:49:56.970090', 'Approved'),
(145, 93, '15', 'Dhairyasheel patil', 'patilshiv481@gmail.com', '123432344', '2025-02-28', 'Harshtour Packages', 50000, '4 Days', ' Couple & Famillty Packages are both', '5', '2025-02-17 13:50:18.474552', 'Approved'),
(146, 93, '37', 'Harsh vathere', 'harsh1234vathare@gmail.com', '7895757878', '2025-02-20', 'Mahabaleshwar Tour Package', 30000, '2 Days', ' Family / Friends', '2', '2025-02-17 15:52:50.409648', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_Id` int(50) NOT NULL,
  `City_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_Id`, `City_Name`) VALUES
(100, 'Orange County'),
(200, 'New York'),
(300, 'Atlanta'),
(400, 'New Jersey'),
(500, 'Dallas'),
(600, 'Salt Lake City');

-- --------------------------------------------------------

--
-- Table structure for table `create_hotel`
--

CREATE TABLE `create_hotel` (
  `Hotel_Id` int(100) NOT NULL,
  `Hotel_Name` varchar(100) NOT NULL,
  `Hotel_Address` varchar(100) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NumberOfRooms` varchar(100) NOT NULL,
  `PriceOfRoom` int(100) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  `Hotel_Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_hotel`
--

INSERT INTO `create_hotel` (`Hotel_Id`, `Hotel_Name`, `Hotel_Address`, `PhoneNo`, `email`, `NumberOfRooms`, `PriceOfRoom`, `amenities`, `Hotel_Image`) VALUES
(13, 'Silver Sand Beach Resort', 'Vijay Nagar Beach Swaraj Dweep , Andaman and Nicobar', '3434546576', 'swarajdeepak@gmail.com', '12', 6599, 'Welcome to Silversand Beach Resort, Andaman and Nicobar Islands, India, the most beautiful of all the whole Islands. Get away from the crowds and see the nature as it should be. The way it used to be.From cottages to bungalows , our resort features newly constructed and beautifully decorated guest rooms in a breathtaking resort environment. ', ' ../hotel_image/silver-sand-beach-resort.jpg'),
(14, 'Jungle Hill Resort', 'Mekeri Village, Kaggodu Post, Madikeri 571201 India', '9595805745', 'junglehills@gmail.com', '10', 5600, 'Jungle Hill resort is a nature resort surrounding with coffee and pepper plantation and its located 5 KM away from Madikeri city, on the way to Virajpet.', ' ../hotel_image/la-flora-jungle-hill_2.jpg'),
(15, 'Woodstock Resorts', 'Mysore Highway Near Sampigekatte Junction, Next to Big Cup Café, Madikeri 571201 India', '7741058185', 'patilsardar@gmail.com', '14', 6450, 'Discover Coorg with a stay at Woodstock Resorts Located on the outskirts of the misty town of Madikeri, Woodstock Resorts is a premium resort with modern amenities to soothe your senses. Sheesham is a exclusive multi cuisine restaurant with selected delicacies from various parts of the country.', ' ../hotel_image/swimming-pool_3.jpg'),
(16, 'Hotel Shawrya The Grand', 'Madikeri - Virajpet Rd, Madikeri 571201 India', '9689917535', 'dreamhotel@gmail.com', '11', 4990, 'At Coorg Wilderness Resort & Spa we bring you to the very doorstep of nature, offering a rare opportunity to be part of the wild, yet with every possible comfort and luxury. The ambience is so warm and the air is so cool and cosy, air-conditioning is not required throughout the resort.', ' ../hotel_image/coorg-wilderness-resort (4).jpg'),
(17, 'The Leela Palace Bengaluru', '23 Hal Old Airport Rd Hal 2nd Stage, Bengaluru 560008 India', '8605824356', 'vaibhavmali@gmail.com', '8', 6530, 'The Leela Palace Bengaluru has been \"ranked 10 among the top ten city hotel’s in Asia by Travel & Leisure Reader’s choice award 2019.\" The hotel is nestled amidst seven acres of lush gardens and a sparkling lagoon, built in an art-deco form drawing inspiration from the architectural style of the Royal Palace of Mysore.', ' ../hotel_image/peacock-lounge_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `create_intern_package`
--

CREATE TABLE `create_intern_package` (
  `CIPackage_Id` int(50) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Package_Type` varchar(50) NOT NULL,
  `Package_Location` varchar(100) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Package_Feature` varchar(300) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Package_Image` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Package_Details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_intern_package`
--

INSERT INTO `create_intern_package` (`CIPackage_Id`, `Package_Name`, `Package_Type`, `Package_Location`, `Price`, `Package_Feature`, `Phone`, `Package_Image`, `City`, `Package_Details`) VALUES
(22, 'W Algarve', 'Only friends', 'Algarve, Portugal', '6460', 'Shereé planned this trip because she needed awareness and healing, to which the other Peaches said, “Best of luck to you.” Drew gets very worked up at the first dinner about a home', '4565237688', '', 'Atlanta', 'Shereé planned this trip because she needed awareness and healing, to which the other Peaches said, “Best of luck to you.” Drew gets very worked up at the first dinner about a home'),
(23, 'The Kelly Birmingham', 'only friends', 'Birmingham, Alabama', '7560', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Atlanta', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(24, 'W Algarve', 'only friends', 'Birmingham, Alabama', '7560', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Atlanta', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(25, 'Blue Ridge Chalet', 'only friends', 'Birmingham, Alabama', '7560', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Atlanta', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(26, 'New Jersey 1', 'only friends', 'Birmingham, Alabama', '7560', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'New Jersey', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(27, 'New Jersey 2', 'only friends', 'Birmingham, Alabama', '7560', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'New Jersey', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(28, 'New Jersey 3', 'only friends', 'Birmingham, Alabama', '6500', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'New Jersey', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(29, 'New Jersey 1', 'only friends', 'Birmingham, Alabama', '5600', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'New Jersey', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(31, 'Dallas 2', 'only friends', 'Birmingham, Alabama', '4570', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Dallas', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(32, 'Dallas 3', 'only friends', 'Birmingham, Alabama', '4570', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Dallas', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(33, 'Dallas 1', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Dallas', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(34, 'Dallas 2', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Dallas', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(35, 'Salt Lake City1', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Salt Lake City', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(36, 'Salt Lake City 2', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Salt Lake City', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(37, 'Salt Lake City 3', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Salt Lake City', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(38, 'Salt Lake City 1', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Salt Lake City', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(39, 'Orange County 1', 'only friends', 'Birmingham, Alabama', '5647', 'Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....', '4556677889', '', 'Orange County', ' Kenya, and Kenya Moore Hair Care, is performing the halftime show at the Magic City Classic, the country’s biggest HBCU football game. However, she is determined to keep it a secret until the....'),
(43, 'patil', 'Family / Friends', 'Ladakh Kashmir , India', '1200', 'Manali, India is a popular tourist destination with snow-capped mountains, adventure sports, and historic temples. ', '9975023083', '../image/coorg-wilderness-resort.jpg', 'Dallas', 'aaaaaaaaaaaaaaaaaa'),
(44, 'california', 'Family / Friends', 'Mahabaleshwar , Maharashtra', '3333', 'Visit the best places in Leh & ladakh ...! ', '9975023083', '../image/swimming-pool_3.jpg', 'Dallas', 'sdsdsdsdsd'),
(46, 'Harshtour Packages', 'Family / Friends', 'Mumbai , Maharashtra', '10', 'Visit the best places in Leh & ladakh ...! ', '9975023083', '../image/hotel1.jpeg', 'Atlanta', 'sdsdsdsdsd'),
(47, 'Erin\'s\" House', 'Family / Friends', 'The Hamptons, New York', '12000', 'What constitutes a “remodel?” Who can say, really? Has Erin’s kitchen been remodeled, as she claims? Or is this a new island and fixtures? Or, perhaps, this is not a freshening up, but the final', '9975023075', '../image/1.avif', 'New York', 'What constitutes a “remodel?” Who can say, really? Has Erin’s kitchen been remodeled, as she claims? Or is this a new island and fixtures? Or, perhaps, this is not a freshening up, but the final'),
(48, 'Long Bay Villas', 'Family / Friends', 'Long Bay Beach, Anguilla', '9600', 'One might think that Jenna Lyons’ choice to fly first while the rest of the apples suffer in coach would make her the villain of the trip. Nope! Not with Erin here. This meeting of the We Hate Erin club kicked off with a lovely boat trip....', '9975023056', '../image/2.avif', 'New York', 'One might think that Jenna Lyons’ choice to fly first while the rest of the apples suffer in coach would make her the villain of the trip. Nope! Not with Erin here. This meeting of the We Hate Erin club kicked off with a lovely boat trip....'),
(49, 'Ramona\'s Vacation House', 'Family / Friends', 'The Hamptons, New York', '8500', 'This is one of the least aspirational trips a group of Housewives has ever taken. Not because Ramona’s mansion, decked out in an HGTV palette of white and light gray, is not comfortable....', '9975023045', '../image/3.avif', 'New York', 'This is one of the least aspirational trips a group of Housewives has ever taken. Not because Ramona’s mansion, decked out in an HGTV palette of white and light gray, is not comfortable....'),
(50, 'Erin\'s\" House', 'Family / Friends', 'The Hamptons, New York', '12000', 'What constitutes a “remodel?” Who can say, really? Has Erin’s kitchen been remodeled, as she claims? Or is this a new island and fixtures? Or, perhaps, this is not a freshening up, but the final', '9975023083', '../image/1.avif', 'New York', 'What constitutes a “remodel?” Who can say, really? Has Erin’s kitchen been remodeled, as she claims? Or is this a new island and fixtures? Or, perhaps, this is not a freshening up, but the final');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `msg_Id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `massage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`msg_Id`, `name`, `email`, `massage`) VALUES
(3, 'Ramsager Pujari', 'pujari@gmail.com', 'This website is very strong to others websites'),
(9, 'Chinmay Shetty', 'chinmayshetty@gmail.com', 'He is the Frontend Devlopers in this website..!'),
(34, 'Harsh Vathare', 'rama@gmail.com', 'Tour tourism website is very attractive and very smoothfoll to others websites, So i like it..!'),
(37, 'Vaibhav Neje', 'neje@gmail.com', 'This website is also add to tour packages in all in all freidsa so ..! '),
(43, 'Nandkumar Vathare', 'vatharenandkumar@gmail.com', 'this website is so fast other than other websites..!');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `id` int(200) NOT NULL,
  `user_Id` int(100) NOT NULL,
  `Hotel_Id` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `Mobile_No` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `Hotel_Name` varchar(50) NOT NULL,
  `No_of_Person` varchar(200) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `created_booking` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`id`, `user_Id`, `Hotel_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `date`, `Hotel_Name`, `No_of_Person`, `Price`, `Duration`, `created_booking`, `Status`) VALUES
(7, 50, '', 'Harshvardhan Vathare', 'vatharenandkumar@gmail.com', '7972187168', '2024-08-20', 'Renuka Hotel', '', '2700', '4 Days, 3 Night', '2024-08-22 15:46:23', 'Approved'),
(13, 50, '4', 'Vaibhav Neje', 'harsh1234vathare@gmail.com', '7849243567', '2025-01-14', 'Narayan Hotels', '5', '23988', '4', '2025-01-07 00:46:02', 'Approved'),
(18, 83, '1', 'Dhairyasheel patil', 'patilshiv481@gmail.com', '1234123454', '2025-02-20', 'Sadhana Hoteles', '3', '4900', '2', '2025-02-17 12:58:08', 'Approved'),
(19, 93, '1', 'Dhairyasheel patil', 'patilshiv481@gmail.com', '5675656565', '2025-02-21', 'Sadhana Hoteles', '3', '29400', '4', '2025-02-17 13:55:58', 'Approved'),
(20, 93, '17', 'harsh vathare', 'harsh1234vathare@gmail.com', '1234512345', '2025-02-20', 'The Leela Palace Bengaluru', '5', '26120', '2', '2025-02-17 16:38:17', 'Approved'),
(21, 93, '17', 'harsh vathare', 'harsh1234vathare@gmail.com', '1234512345', '2025-02-20', 'The Leela Palace Bengaluru', '5', '26120', '2', '2025-02-17 16:38:44', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_payment`
--

CREATE TABLE `hotel_payment` (
  `User_Id` varchar(200) NOT NULL,
  `Hotel_Id` varchar(200) NOT NULL,
  `Razorpay_Payment_Id` varchar(200) NOT NULL,
  `Total_Price` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `Payment_Status` varchar(200) NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_payment`
--

INSERT INTO `hotel_payment` (`User_Id`, `Hotel_Id`, `Razorpay_Payment_Id`, `Total_Price`, `Name`, `Email_Id`, `Payment_Status`) VALUES
('93', '2', 'pay_PgGS3dsSZ2Vtdj', '11996', 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
('50', '4', 'pay_PgGn1aYCb5A6iI', '23988', 'Vaibhav Neje', 'harsh1234vathare@gmail.com', 'Success'),
('93', '1', 'pay_PgPTNyRL03inTl', '29400', 'Soham Mohite', 'harsh1234vathare@gmail.com', 'Success'),
('93', '4', 'pay_PgPoBuJ4VdaOqF', '23988', 'Chinmay Shettey', 'akshayvathare42@gmail.com', 'Success'),
('93', '2', 'pay_PgQ2JcdVqViLcN', '17994', 'Vaibhav Neje', 'harsh1234vathare@gmail.com', 'Success'),
('93', '4', 'pay_PgQ8JFf2cusRyP', '15992', 'Chinmay Shettey', 'harsh1234vathare@gmail.com', 'Success'),
('83', '1', 'pay_PwhAbno05I8REI', '4900', 'Dhairyasheel patil', 'patilshiv481@gmail.com', 'Success'),
('93', '17', 'pay_PwkvDjQClPO4pC', '26120', 'harsh vathare', 'harsh1234vathare@gmail.com', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user_Id` int(200) NOT NULL,
  `TourPackage_Id` varchar(200) NOT NULL,
  `razorpay_payment_Id` varchar(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Payment_Status` varchar(50) NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_Id`, `TourPackage_Id`, `razorpay_payment_Id`, `total_price`, `Name`, `email`, `Payment_Status`) VALUES
(50, '15', 'pay_PdgzhqPDGo1EmG', 10000, 'Vaibhav Neje', 'harshvathare@gmail.com', 'Success'),
(68, '27', 'pay_PdjoVHqSlLAngi', 21000, 'Soham Mohite', 'shetechinmay0260@gmail.com', 'Success'),
(50, '17', 'pay_PdjQu2rNqj5KsQ', 11700, 'Swapnil Shedsale', 'swapnil.shedsale@gmail.com', 'Success'),
(50, '15', 'pay_PdmMOLkJaJQDu1', 10000, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(50, '17', 'pay_PdnH8XpMSmk4G3', 18720, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(50, '27', 'pay_PdoDkgrxq3wWPW', 21000, 'Chinmay Shettey', 'harsh1234vathare@gmail.com', 'Success'),
(93, '16', 'pay_PdodwWRi7Ao7jE', 6200, 'Soham Mohite', 'akshayvathare42@gmail.com', 'Success'),
(93, '15', 'pay_PdrfNvKXJ2l2zH', 10000, 'Harshvardhan Vathare', 'akshayvathare42@gmail.com', 'Success'),
(93, '17', 'pay_PdsJUYsyIHw0W6', 18720, 'Akshay Vathare', 'akshayvathare42@gmail.com', 'Success'),
(68, '15', 'pay_PdssQHygrhE5fG', 10000, 'Chinmay Shettey', 'shetechinmay0260@gmail.com', 'Success'),
(50, '15', 'pay_PdtNxetBBp1tys', 10000, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(50, '15', 'pay_PdWwapMRt1qfv8', 20000, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(68, '16', 'pay_PdX4rRiAtgSXpg', 7750, 'Chinmay Shettey', 'shetechinmay0260@gmail.com', 'Success'),
(68, '15', 'pay_PdXAUc2qOO7jDY', 10000, 'Vaibhav Neje', 'shetechinmay0260@gmail.com', 'Success'),
(93, '30', 'pay_PeXFIcNRRJLuFO', 17500, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(93, '16', 'pay_PfSDOTFILHvDi5', 7750, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(93, '16', 'pay_PfSFCGaX9ujBls', 24988, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(93, '16', 'pay_PfSKXA6LrbiJNl', 28000, 'Vaibhav Neje', 'harsh1234vathare@gmail.com', 'Success'),
(93, '17', 'pay_Pg3vbDt0P6a2Vd', 18600, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(83, '41', 'pay_Pg44NRmHJ79o4b', 31235, 'Swapnil Shedsale', 'swapnil.shedsale@gmail.com', 'Success'),
(83, '17', 'pay_Pg6gydNKOURdrO', 11700, 'Soham Mohite', 'akshayvathare42@gmail.com', 'Success'),
(93, '23', 'pay_Pg6vpLFKhCXU1a', 37800, 'Chinmay Shettey', 'harsh1234vathare@gmail.com', 'Success'),
(93, '15', 'pay_Pg7SPRyLpt8S1D', 10000, 'Harshvardhan Vathare', 'akshayvathare42@gmail.com', 'Success'),
(93, '41', 'pay_Pg7ZCr2TJEbfns', 24988, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', 'Success'),
(83, '30', 'pay_PwgmSUz60hVyno', 10500, 'Dhairyasheel patil', 'patilshiv481@gmail.com', 'Success'),
(83, '40', 'pay_PwhNIOKlJ9Dwli', 19941, 'Dhairyasheel patil', 'patilshiv481@gmail.com', 'Success'),
(83, '30', 'pay_PwhV4gVddNt0bC', 10500, 'Dhairyasheel patil', 'patilshiv481@gmail.com', 'Success'),
(93, '15', 'pay_Pwi3erNV3Y5tdq', 50000, 'Dhairyasheel patil', 'patilshiv481@gmail.com', 'Success'),
(93, '37', 'pay_Pwk8h48yc98PJj', 30000, 'Harsh vathere', 'harsh1234vathare@gmail.com', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `tour_package`
--

CREATE TABLE `tour_package` (
  `TourPackage_Id` int(100) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Package_Type` varchar(212) NOT NULL,
  `Package_Location` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Package_Features` varchar(280) NOT NULL,
  `Package_Details` varchar(300) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Package_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_package`
--

INSERT INTO `tour_package` (`TourPackage_Id`, `Package_Name`, `Package_Type`, `Package_Location`, `Price`, `Package_Features`, `Package_Details`, `Phone`, `Package_Image`) VALUES
(33, 'Leh Tour Package', 'Family / Friends', 'Ladakh Kashmir , India', '4999', 'The biggest draw for visitors coming to Leh is the Tibetan Buddhist monasteries and historical monuments. The most impressive of all is the famous Shanti Stupa, located just outside the town. ', 'Leh, located in the state of Jammu and Kashmir, India, is a popular destination for tourists. It\'s known for its Tibetan Buddhist monasteries, historical monuments, and adventure activities. Attractions:\nShanti Stupa: A famous stupa located just outside of Leh \nKali Mandir: An 800-year-old temple th', '9975023083', '../image/leh.jpg'),
(34, 'Manali Tour Package', 'Family / Friends', 'Manali , Himachal Pradesh , India', '6550', 'Manali, India is a popular tourist destination with snow-capped mountains, adventure sports, and historic temples. ', 'Manali, India is a popular tourist destination with snow-capped mountains, adventure sports, and historic temples. ', '9975023084', '../image/manali.avif'),
(35, 'Mumbai Tour Package', 'Family / Friends', 'Mumbai , Maharashtra', '6590', 'Mumbai\'s best features for tourism include its iconic landmarks like the Gateway of India, the beautiful beaches like Juhu and Marine Drive, religious sites like Siddhivinayak Temple and Haji Ali Dargah, the bustling street markets, a vibrant Bollywood culture, the Elephanta Cave', 'Mumbai\'s best features for tourism include its iconic landmarks like the Gateway of India, the beautiful beaches like Juhu and Marine Drive, religious sites like Siddhivinayak Temple and Haji Ali Dargah, the bustling street markets, a vibrant Bollywood culture, the Elephanta Caves, and the modern Ba', '9975023085', '../image/mumbai.avif'),
(36, 'Amritsar Tour Package', 'Family / Friends', 'Amritsar , Punjab', '6450', 'THE 30 BEST Places to Visit in Amritsar (2025) - Must-See ...Amritsar, India is a city rich in history, culture, and spirituality. It\'s home to the Golden Temple, a revered Sikh holy site, and the Wagah Border, where you can witness the daily Beating Retreat Ceremony. ', 'THE 30 BEST Places to Visit in Amritsar (2025) - Must-See ...Amritsar, India is a city rich in history, culture, and spirituality. It\'s home to the Golden Temple, a revered Sikh holy site, and the Wagah Border, where you can witness the daily Beating Retreat Ceremony. ', '9975023086', '../image/amrutser.avif'),
(37, 'Mahabaleshwar Tour Package', 'Family / Friends', 'Mahabaleshwar , Maharashtra', '7500', 'Mahabaleshwar is a hill station in the Western Ghats of Maharashtra, India. It\'s known for its lush greenery, waterfalls, lakes, and ancient temples. ', 'Mahabaleshwar is a hill station in the Western Ghats of Maharashtra, India. It\'s known for its lush greenery, waterfalls, lakes, and ancient temples. ', '9975023088', '../image/m_mahabaleshwar_.avif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(20) NOT NULL,
  `fname` varchar(212) DEFAULT NULL,
  `lname` varchar(212) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `otp` varchar(200) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` varchar(20) DEFAULT 'user',
  `dob` varchar(50) NOT NULL,
  `Mobile_No` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `fname`, `lname`, `email`, `password`, `otp`, `activation_code`, `status`, `created_at`, `user_type`, `dob`, `Mobile_No`, `Address`) VALUES
(13, 'Admin', 'Panel', 'admin@gmail.com', 'admin', '', '', 'active', '2024-08-07 09:48:15', 'admin', '', '', ''),
(50, 'Harshvardhan', 'Vathare', 'harsh1234vathare@gmail.com', '3434', '787867', '6db84b9f166fe0562595843af597a171', 'active', '2024-08-09 11:49:07', 'user', '2003-02-10', '7972187168', '         Ramnager Rendal  Near the Ambai Bazar    '),
(68, 'Chinmay', 'Shetty', 'shetechinmay0260@gmail.com', '1234', '', '7e3bab4c74b6f414f4247918a60dbfc1', 'active', '2024-08-13 14:16:02', 'user', '2020-02-10', ' 9595805740', '    Ramnager Korochi  in Kolhapur'),
(83, 'swapnil', 'Shedsale', 'swapnil.shedsale@gmail.com', '3030', '', 'm1d54bconjef9klha64gi', 'active', '2024-09-12 11:40:49', 'user', '', '', ''),
(93, 'Akshay', 'Vathare', 'akshayvathare42@gmail.com', '5619', '', 'ek1amfig89h3jldnb3co0', 'active', '2024-12-31 14:15:42', 'user', '2025-02-26', '123123123', '   Ramnager Rendal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD UNIQUE KEY `City_Id` (`City_Id`);

--
-- Indexes for table `create_hotel`
--
ALTER TABLE `create_hotel`
  ADD PRIMARY KEY (`Hotel_Id`);

--
-- Indexes for table `create_intern_package`
--
ALTER TABLE `create_intern_package`
  ADD PRIMARY KEY (`CIPackage_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`msg_Id`);

--
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`razorpay_payment_Id`);

--
-- Indexes for table `tour_package`
--
ALTER TABLE `tour_package`
  ADD PRIMARY KEY (`TourPackage_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `create_hotel`
--
ALTER TABLE `create_hotel`
  MODIFY `Hotel_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `create_intern_package`
--
ALTER TABLE `create_intern_package`
  MODIFY `CIPackage_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `msg_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tour_package`
--
ALTER TABLE `tour_package`
  MODIFY `TourPackage_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
