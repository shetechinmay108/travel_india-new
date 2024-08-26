-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3380
-- Generation Time: Aug 26, 2024 at 03:11 PM
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
(50, 50, 'Harshvardhan Vathare', 'harsh1234vathare@gmail.com', '7972187168', '2024-08-20', 'Harshtour Packages', 12500, '4 Days, 3 Night', ' Couple & Famillty Packages are both', 'kkkkkk', '2024-08-17 11:30:12.002977', 'Approved'),
(54, 71, 'Soham Mohite', 'rupalivathare410@gmail.com', '9595805740', '2024-08-30', 'Swapnil Tour Package', 10500, '2 Days, 1 Night', ' Familly Package', 'yyyyyy', '2024-08-17 11:48:20.620301', 'approved'),
(55, 71, 'Chinmay Shettey', 'chinmay@gmail.com', '4356645454', '2024-08-20', 'Traval India', 165656, '4 Days, 3 Night', ' Couple Packages', 'ghfhfhf', '2024-08-17 11:49:29.472702', 'approved'),
(56, 50, 'Vaibhav Neje', 'rupalivathare410@gmail.com', '7972187168', '2024-08-30', 'Traval India', 165656, '4 Days, 3 Night', ' Couple Packages', 'kkkkk', '2024-08-17 12:01:54.790799', 'Approved'),
(57, 72, 'Akshay Vathare', 'akshayvathare42@gmail.com', '7620781481', '2024-08-22', 'Traval India', 0, '4 Days, 3 Night', ' Couple Packages', 'hello', '2024-08-17 18:55:54.367572', 'approved'),
(58, 72, 'Swami Pujari', 'vatharenandkumar@gmail.com', '6787678756', '2024-08-20', 'Mountain Adventure', 12350, '6 Days, 5 Night', ' Couple Packages', 'hello nandkumar vathare', '2024-08-19 10:27:08.606683', 'approved'),
(61, 82, 'Nandkumar Vathare', 'vatharenandkumar@gmail.com', '9595805740', '2024-08-30', 'Mountain Adventure', 12350, '4 Days, 3 Night', ' Couple Packages', 'my faurite place you know that', '2024-08-26 17:55:11.715455', 'Approved'),
(62, 68, 'Chinmay Shettey', 'shetechinmay0260@gmail.com', '222222222', '2024-08-28', 'Traval India', 15820, '4 Days, 3 Night', ' Couple Packages', 'thissss', '2024-08-26 18:32:37.795282', 'Approved');

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
(37, 'Vaibhav Neje', 'neje@gmail.com', 'This website is also add to tour packages in all in all freidsa so ..! '),
(38, 'Soham Mohite', 'mohitesoham@gmail.com', 'This website is very good and it is easy to use..!'),
(39, 'Pratik Lipare', 'pratiklipare@gmail.com', 'This Travel_India website is very easy to use and It is not complex website is so good and i am very happy to shere my massage..!'),
(43, 'Nandkumar Vathare', 'vatharenandkumar@gmail.com', 'this website is so fast other than other websites..!'),
(44, 'Chinmay Shettey', 'harsh1234vathare@gmail.com', 'this website very good..!');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `id` int(200) NOT NULL,
  `user_Id` int(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `Mobile_No` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `Hotel_Name` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Hotel_Address` varchar(300) NOT NULL,
  `Massage` varchar(300) NOT NULL,
  `created_booking` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`id`, `user_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `date`, `Hotel_Name`, `Price`, `Duration`, `Hotel_Address`, `Massage`, `created_booking`, `Status`) VALUES
(7, 50, 'Harshvardhan Vathare', 'vatharenandkumar@gmail.com', '7972187168', '2024-08-20', 'Renuka Hotel', '12345', '4 Days, 3 Night', 'Near the Ambai Bazar Ramnager Rendal', 'jhjhfckf', '2024-08-22 15:46:23', 'Approved');

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
(20, 'Traval India', 'Couple Packages', 'South India,416203', '15820', 'Hike through breathtaking mountain trails and enjoy scanic views.', 'it ithehakj hjffd', '../image/istockphoto-1199502531-170667a.webp');

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
(50, 'Harshvardhan', 'Vathare', 'harsh1234vathare@gmail.com', '1212', '', '15534391bc3dcf9c51cc282cd1c86793', 'active', '2024-08-09 11:49:07', 'user'),
(68, 'Chinmay', 'Shetty', 'shetechinmay0260@gmail.com', '9090', '', '56fa6048ec6be7d3660a038d21136f4c', 'active', '2024-08-13 14:16:02', 'user'),
(72, 'Akshay', 'Vathare', 'akshayvathare42@gmail.com', '5656', '', 'bfd89621596dde58971b40013210810a', 'active', '2024-08-17 13:20:41', 'user'),
(82, 'Nandkumar', 'Vathare', 'vatharenandkumar@gmail.com', '1313', '000000', 'bh182amgdijlf5o2kecn7', '', '2024-08-26 12:20:46', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Mobile_No` int(15) NOT NULL,
  `Address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_Id`, `DateOfBirth`, `Mobile_No`, `Address`) VALUES
(2, 72, '2024-08-30', 959580574, ' Ramnager Rendal 416203'),
(9, 50, '2024-08-28', 976998689, 'ramnager rendal\r\n'),
(11, 0, '2024-08-12', 0, '<br />\r\n<b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocs	ravel_india-newprofileprofile.php</b> on line <b>76</b><br />\r\n');

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
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `create_hotel`
--
ALTER TABLE `create_hotel`
  MODIFY `Hotel_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `msg_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour_package`
--
ALTER TABLE `tour_package`
  MODIFY `TourPackage_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
