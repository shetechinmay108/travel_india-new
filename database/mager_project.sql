-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3380
-- Generation Time: Aug 16, 2024 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `User_Name` varchar(100) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Tour_Date` date NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Package_Price` int(100) NOT NULL,
  `Package_Duration` varchar(100) NOT NULL,
  `Package_Type` varchar(100) NOT NULL,
  `add_info` varchar(200) NOT NULL,
  `Booking_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `Status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `Tour_Date`, `Package_Name`, `Package_Price`, `Package_Duration`, `Package_Type`, `add_info`, `Booking_Date`, `Status`) VALUES
(32, 58, 'Sanika Shingare', 'sanika@gmail.com', '2121212126', '2024-08-30', 'Harshtour Packages', 12500, '4 Days, 3 Night', ' Couple & Famillty Packages are both', 'hello sanika', '2024-08-16 14:31:46.542751', 'approved'),
(33, 58, 'Mahesh Kothare', 'kotharemahesh@gmail.com', '7741058185', '2024-08-20', 'Harshtour Packages', 12500, '6 Days, 5 Night', ' Couple & Famillty Packages are both', 'hello mahesh kolthare', '2024-08-16 14:33:19.349555', 'approved'),
(35, 58, 'Akshay Vathare', 'akshayvathare42@gmail.com', '0959589643', '2024-08-25', 'Mountain Adventure', 12350, '6 Days, 5 Night', ' Couple Packages', 'my name is akshay vathare', '2024-08-16 20:22:37.742051', 'approved'),
(37, 68, 'Chinmay Shettey', 'shetechinmay0260@gmail.com', '4534675646', '2024-08-28', 'Mountain Adventure', 12350, '4 Days, 3 Night', ' Couple Packages', 'hey guys hello i am not finds..!', '2024-08-16 23:37:09.148437', 'approved');

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
(1, 'Sadhana Hoteles', 'Near the Hupari 416203', '7972187168', 'harsh@gmail.com', '8', 10850, 'It is the very comfetable for each othrers to all my familly freinds..!', '../hotel_image/OIP (2).jpg'),
(2, 'Panchvati Loges', 'Mukkam Post Ichlkaranji', '9595805740', 'sanket@gmail.com', '12', 5400, 'Panchvati loges is the best Loges in the Ichalkaranji.It is the Best To booking..!', '../hotel_image/download.jpg'),
(4, 'Narayan Hotels', 'Keshvnath near the Mumbai 416406', '5645346756', 'narayan@gmail.com', '8', 8500, 'this is the best to all familly caterings and very easy to all famillt members..!', '../hotel_image/th.jpg'),
(8, 'Renuka Hotel', 'Near the Ambai Bazar Ramnager Rendal', '7867564534', 'renuka@gmail.com', '14', 12345, 'This renuka hotel is so expensive and that can provide also easy to stay..!\r\n\r\n', '../hotel_image/OIP (3).jpg'),
(9, 'Panchvati Loges', 'Near the Hupari 416203', '07972187168', 'harsh@gmail.com', '10', 12000, 'fgnfkgukutdetrys', '../hotel_image/jkjkjk.jpg');

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
(36, 'Chinmay Shettey', 'chinmayshete@gmail.com', 'This Travel_India Website is very good to other tourism websites..!'),
(37, 'Vaibhav Neje', 'neje@gmail.com', 'This website is also add to tour packages in all in all freidsa so ..! '),
(38, 'Soham Mohite', 'mohitesoham@gmail.com', 'This website is very good and it is easy to use..!'),
(39, 'Pratik Lipare', 'pratiklipare@gmail.com', 'This Travel_India website is very easy to use and It is not complex website is so good and i am very happy to shere my massage..!'),
(40, 'pratik', 'pratikschougule033@gmail.com', 'hii'),
(41, 'pratik', 'pratikschougule033@gmail.com', 'hii'),
(42, 'pratik', 'pratikschougule033@gmail.com', 'hii');

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
  `Package_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_package`
--

INSERT INTO `tour_package` (`TourPackage_Id`, `Package_Name`, `Package_Type`, `Package_Location`, `Price`, `Package_Features`, `Package_Details`, `Package_Image`) VALUES
(15, 'Harshtour Packages', 'Couple & Famillty Packages are both', 'South India,416203', '12500', 'welcome to india..!', 'welcome to india in this wbsite..! to or many reqested', '../image/berlin-digital-nomads.jpg'),
(16, 'Swapnil Tour Package', 'Familly Package', 'Pune,in Maharashtra,416203', '10500', 'This is the best tour Package..!', 'This is the best tour Package..! to all my fammilly persons..!', '../image/360_F_209824591_K05Tob490TmBlTekkPlNrxh1Hy7IKMTU.jpg'),
(17, 'Mountain Adventure', 'Couple Packages', 'South India,416203', '12350', 'Hike through breathtaking mountain trails and enjoy scanic views.', 'it is not case sensitive', '../image/1c716292-9354-468c-a867-0557415e0f8593ec52edb7219e6d17_A7R00302-Edit.jpg'),
(20, 'Traval India', 'Couple Packages', 'South India,416203', '165656', 'Hike through breathtaking mountain trails and enjoy scanic views.', 'it ithehakj hjffd', '../image/istockphoto-1199502531-170667a.webp');

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
  `user_type` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `fname`, `lname`, `email`, `password`, `otp`, `activation_code`, `status`, `created_at`, `user_type`) VALUES
(13, 'Admin', 'Panel', 'admin@gmail.com', 'admin', '', '', 'active', '2024-08-07 09:48:15', 'admin'),
(50, 'Harshvardhan', 'Vathare', 'harsh1234vathare@gmail.com', '454545', '', '15534391bc3dcf9c51cc282cd1c86793', 'active', '2024-08-09 11:49:07', 'user'),
(58, 'Akshay', 'Vathare', 'akshayvathare42@gmail.com', '4545', '', '9d067a9f6c084b8c765a9631484dd5d7', 'active', '2024-08-09 16:33:38', 'user'),
(60, 'Utkarsh', 'Mali', 'vatharenandkumar@gmail.com', '1972', '', '09dkhgjlno2ca59bimef2', 'active', '2024-08-12 09:59:52', 'user'),
(68, 'Chinmay', 'Shetty', 'shetechinmay0260@gmail.com', '9090', '', '56fa6048ec6be7d3660a038d21136f4c', 'active', '2024-08-13 14:16:02', 'user'),
(69, 'Rupali', 'Vathare', 'rupalivathatr410@gmail.com', '303030', '792122', 'lg2ioh92nfj72kma1bedc', '', '2024-08-14 03:37:52', 'user'),
(70, 'Rupali', 'Vathare', 'rupalivathate410@gmail.com', '303030', '252845', 'mhf5ej5n8ac4dogi2bl2k', '', '2024-08-14 03:39:55', 'user'),
(71, 'Rupali', 'Vathare', 'rupalivathare410@gmail.com', '303030', '', 'fmoa4j1d2kei8g7clh8nb', 'active', '2024-08-14 03:41:10', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_hotel`
--
ALTER TABLE `create_hotel`
  ADD PRIMARY KEY (`Hotel_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`msg_Id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `create_hotel`
--
ALTER TABLE `create_hotel`
  MODIFY `Hotel_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `msg_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tour_package`
--
ALTER TABLE `tour_package`
  MODIFY `TourPackage_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
