-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 07:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `black-opal-ink-tatoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_appointment`
--

CREATE TABLE `advance_appointment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `cash_payment` int(11) NOT NULL,
  `online_payment` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advance_appointment`
--

INSERT INTO `advance_appointment` (`id`, `customer_id`, `artist_id`, `appointment_date`, `cash_payment`, `online_payment`, `status`) VALUES
(4, 80, 0, '2023-06-15 23:48:00', 500, 0, ''),
(5, 78, 0, '2023-06-16 01:48:00', 499, 0, ''),
(6, 69, 0, '2023-06-18 23:48:00', 500, 0, ''),
(7, 80, 0, '2023-06-20 14:00:00', 1000, 0, ''),
(8, 81, 0, '2023-06-18 02:40:00', 499, 0, 'Pending'),
(9, 81, 0, '2023-06-30 00:40:00', 500, 100, 'Pending'),
(10, 81, 15, '2023-06-30 00:40:00', 500, 100, 'Pending'),
(11, 79, 11, '2023-06-11 02:50:00', 500, 800, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `type` char(100) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `fname`, `mname`, `lname`, `contact`, `email`, `address`, `city`, `district`, `zip`, `type`, `salary`) VALUES
(6, 'Mamta', '', 'Digari', '9368129348', '', 'Khatima', 'Khatima', 'Udham Singh Nagar', '262308', 'Emerging Artist', 0),
(8, 'Deep ', '', 'Shah', '7506168043', '', '', 'Kolkata', 'Kolkata', '', 'Head Artist', 0),
(9, 'Akash ', '', 'Arora', '8077911915', '', '', 'Dehradun', 'Dehradun', '248001', 'Emerging Artist', 0),
(10, 'Vipin ', '', 'Rana', '8433287735', '', '', 'Rishikesh', 'Dehradun', '', 'Emerging Artist', 0),
(11, 'Devang', '', 'Verma', '7302204180', '', 'Pithoragarh', 'Pithoragarh', 'Pithoragarh', '', 'Pro Artist', 0),
(15, 'romin', '', 'fixed', '7874984410', 'romin@gmail.com', 'home', 'ahm', 'ahm', '380052', 'Fixed Artist', 39800);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `mname`, `lname`, `contact`, `email`, `address`, `city`, `district`, `zip`) VALUES
(9, 'Deepanshu', '', 'Mehta', '7988627920', 'deepanshumehta229@gmail.com', '', 'karnal', 'karnal', '132039'),
(10, 'Aman', '', 'Joshi', '8283054304', '', '', 'Chandigarh', 'Chandigarh', ''),
(11, 'Shyam', '', '', '9760127129', '', '', 'Dehradun', 'Dehradun', '248007'),
(12, 'Ajay ', '', 'Bhandari', '8126055537', '', 'Pithoragarh', 'Pithoragarh', 'Pithoragarh', '262501'),
(13, 'Amrit', '', '', '8126476788', 'amrit021999@gmail.com', 'Bidholi', 'Dehradun', 'Dehradun', '248007'),
(14, 'Tanmay', '', 'Malhotra', '8529477310', 'tanmay25200@gmail.com', 'b-6/239, Sector-8, Rohini', 'Delhi', 'Delhi', '110085'),
(15, 'Simran', '', 'Trivedi', '9618235909', '', 'Dehradun', 'Dehradun', 'Dehradun', '248007'),
(16, 'Nikhil', '', 'Chinta', '7337333396', '', '', '', '', ''),
(17, 'Vivek ', 'A', 'Oraon', '7091282057', 'oraonanand568@gmail.com', 'Kaulagarh road', 'Dehradun', 'Dehradun', '248001'),
(18, 'Jatin ', '', 'Arora', '8267883440', 'jjatinaroraa@gmail.com', '645, Mayur Vihar, Jawalapur', 'Haridwar', 'Haridwar', '249407'),
(19, 'Kamran', '', 'Bazaz', '9596010202', '', 'Shastri Nagar', 'Dehradun', 'Dehradun', '248001'),
(20, 'Shreya', '', 'Nautiyal', '8057649889', '', 'Mothrawala', 'Dehradun', 'Dehradun', '248001'),
(21, 'Akansha ', '', 'Kirpal', '7814670711', 'akankshak065@gmail.com', 'Woodstock hostel, bidholi', 'Dehradun', 'Dehradun', '248007'),
(22, 'Spandan', '', 'Das', '7585911384', 'spandanapex@gmail.com', 'Avalon royale hostel', 'Dehradun', 'Dehradun', '248007'),
(23, 'Divya ', '', 'Wadhwa', '7060824448', '', '25, Inder Road, Dalanwala', 'Dehradun', 'Dehradun', '248001'),
(24, 'Sarthak', '', '', '8171854797', 'sarthaksingh55109@gmail.com', 'Mussorie Woodstock school', 'Dehradun', 'Dehradun', ''),
(25, 'Ankur', '', 'Rana', '6396710381', '', '', 'Dehradun', 'Dehradun', '248001'),
(26, 'Meenakshi', '', 'Tomar', '8218618452', '', '', 'Agra', 'Agra', ''),
(27, 'Sumit', '', 'Sindhwal', '8126627047', '', '', 'Dehradun', 'Dehradun', ''),
(28, 'Apurva', '', 'Negi', '8979451216', 'apurva13198@gmail.com', '6/c4 Shastri Nagar', 'Dehradun', 'Dehradun', '248001'),
(29, 'Anish ', '', 'Walia', '', '', 'Dehradun', 'Dehradun', 'Dehradun', '248001'),
(30, 'Nainsi ', '', 'Jaiswal', '7985714530', '', 'IMS Unison University, Makkawalla', 'Dehradun', 'Dehradun', '248001'),
(31, 'Anurag', '', 'Saklani', '9805954240', 'anuragsaklani2002@gmail.com', '', 'Mandi', 'Mandi', '175001'),
(32, 'Ajay ', '', 'Rawat', '9906091947', '', 'nathuwala', 'Dehradun', 'Dehradun', '248001'),
(33, 'Ishan', '', 'Rana', '8445511162', '', '', 'Dehradun', 'Dehradun', ''),
(34, 'Paran', '', 'Lohmod', '8287434305', '', '', 'Delhi', '', ''),
(35, 'Anant', '', 'Goyal', '', '', 'Dehradun', 'Dehradun', 'Dehradun', '248001'),
(36, 'Avi', '', 'Arora', '8650222422', '', '', 'Dehradun', 'Dehradun', '248001'),
(37, 'Vineet', '', '', '', '', '', 'Dehradun', 'Dehradun', '248001'),
(38, 'Paran', '', 'Lahmod', '8287434305', '', '', '', '', ''),
(39, 'Anant', '', 'Goyal', '', '', '', '', '', ''),
(40, 'Avi', '', 'Arora', '8650222422', '', '', 'Dehradun', 'Dehradun', ''),
(41, 'Vineet', '', '', '', '', '', '', '', ''),
(42, 'Aviratna', '', '', '9557549656', '', '', '', '', ''),
(43, 'Shashank', '', 'Yadav', '9599702180', '', '', '', '', ''),
(44, 'Manu ', '', 'Gautam', '9599702180', '', '', '', '', ''),
(45, 'Asmi', '', '', '8192032003', '', '', '', '', ''),
(46, 'Shashank ', '', 'Yadav', '9557549656', '', '', '', '', ''),
(47, 'Manu ', '', 'Gautam', '9599702180', '', '', '', '', ''),
(48, 'Ajay', '', 'Rawat', '86300042251', '', '', '', '', ''),
(49, 'Ankit', '', 'Rawat', '7017652140', '', '', '', '', ''),
(50, 'Rohan', '', 'Singh', '9548228304', '', '', '', '', ''),
(51, 'Sakshi', '', 'Sahni', '9027575077', '', '', '', '', ''),
(52, 'Milan ', '', 'Anand', '7677084516', '', '', '', '', ''),
(53, 'Amit', '', '', '8505884822', '', '', '', '', ''),
(54, 'Aditi', '', '', '9182928185', '', '', '', '', ''),
(55, 'Shelly', '', '', '9548939704', '', '', '', '', ''),
(56, 'Deepak', '', '', '7078567437', '', '', '', '', ''),
(57, 'Abhishek', '', 'Tomar', '8130827492', '', '', '', '', ''),
(58, 'Udit ', '', 'Panthri', '9675524226', '', '', '', '', ''),
(59, 'Ujjwal', '', 'Mishra', '8219352898', '', '', '', '', ''),
(60, 'Aditi', '', 'Bora', '6398899205', '', '', '', '', ''),
(61, 'Abhishek', '', 'Singh', '7017356558', '', '', '', '', ''),
(62, 'Ansh ', '', 'Tiwari', '8791296007', '', '', '', '', ''),
(63, 'Zoysha', '', '', '6351875732', '', '', '', '', ''),
(64, 'Nishita', '', 'Verma', '8954410398', '', '', '', '', ''),
(65, 'Sandeep', '', 'Rana', '7503437061', '', '', '', '', ''),
(66, 'Pankaj', '', 'Kholia', '8410468743', '', '', '', '', ''),
(67, 'Ishan ', '', 'Vashisht', '8580551250', '', '', '', '', ''),
(68, 'Arshita', '', 'Vashisht', '8219352898', '', '', '', '', ''),
(69, 'Jyoti', '', '', '9873969647', '', '', '', '', ''),
(70, 'Kumari ', '', 'Anshika', '8102958497', '', '', '', '', ''),
(71, 'Aman', '', 'Khadwal', '8630584497', '', '', '', '', ''),
(72, 'Kashish', '', 'Kanhai', '8802850175', '', '', '', '', ''),
(73, 'Nathalie', '', 'Lervik', '4799383723', '', '', '', '', ''),
(74, 'Nathalie', '', 'Lervik', '4799383723', '', '', '', '', ''),
(75, 'Navnee', '', '', '7338972779', '', '', '', '', ''),
(76, 'Prakhar', '', 'Negi', '6396505171', '', '', '', '', ''),
(77, 'Vincent', '', 'Lervik', '478927545', '', '', '', '', ''),
(78, 'Videesha', '', '', '8008619058', '', '', '', '', ''),
(79, 'Aman', '', 'Khadwal', '8630584497', '', '', '', '', ''),
(80, 'Vikas', '', 'Jain', '9839815999', '', '', '', '', ''),
(81, 'Pragya', '', 'Gupta', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pending_amount`
--

CREATE TABLE `pending_amount` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `pending_amount` int(10) NOT NULL,
  `created_date` date DEFAULT NULL,
  `expected_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pending_amount`
--

INSERT INTO `pending_amount` (`id`, `customer_id`, `artist_id`, `pending_amount`, `created_date`, `expected_date`, `status`) VALUES
(7, 81, 15, 499, '2023-06-17', '2023-07-17', 'Pending'),
(8, 81, 15, 588, '2023-06-14', '2023-06-24', 'Pending'),
(9, 81, 15, 4990, '2023-06-14', '2023-06-25', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `minimum_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `type`, `description`, `minimum_quantity`) VALUES
(3, 'Tatt Wax', 'after-care', 'Tatt Wax', 5),
(4, 'Dermalize Velvet Cream', 'after-care', ' Dermalize Velvet Cream', 1),
(5, 'Dermalize Foam', 'after-care', 'Dermalize Foam', 5),
(6, 'Dermalize ', 'before-care', 'wert', 5),
(8, 'Stencil Stuff', 'before-care', '', 5),
(10, 'No Product', 'other', '', 0),
(11, 'Derma pad', 'after-care', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `quantity`, `date`, `user_id`, `studio_id`) VALUES
(1, 6, 10, '2022-09-27', 1, 7),
(2, 5, 12, '2022-09-27', 1, 4),
(3, 7, 0, '2022-10-02', 1, 7),
(4, 6, 2, '2023-01-28', 1, 6),
(5, 5, 4, '2023-01-28', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `salary_criteria`
--

CREATE TABLE `salary_criteria` (
  `id` int(11) NOT NULL,
  `type` char(100) NOT NULL,
  `sale-1` float NOT NULL,
  `incentive-p-1` float NOT NULL,
  `incentive-e-1` float NOT NULL,
  `sale-2` float NOT NULL,
  `incentive-p-2` float NOT NULL,
  `incentive-e-2` float NOT NULL,
  `sale-3` float NOT NULL,
  `incentive-p-3` float NOT NULL,
  `incentive-e-3` float NOT NULL,
  `sale-4` float NOT NULL,
  `incentive-p-4` float NOT NULL,
  `incentive-e-4` float NOT NULL,
  `sale-5` float NOT NULL,
  `incentive-p-5` float NOT NULL,
  `incentive-e-5` float NOT NULL,
  `sale-6` float NOT NULL,
  `incentive-p-6` float NOT NULL,
  `incentive-e-6` float NOT NULL,
  `sale-7` float NOT NULL,
  `incentive-p-7` float NOT NULL,
  `incentive-e-7` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_criteria`
--

INSERT INTO `salary_criteria` (`id`, `type`, `sale-1`, `incentive-p-1`, `incentive-e-1`, `sale-2`, `incentive-p-2`, `incentive-e-2`, `sale-3`, `incentive-p-3`, `incentive-e-3`, `sale-4`, `incentive-p-4`, `incentive-e-4`, `sale-5`, `incentive-p-5`, `incentive-e-5`, `sale-6`, `incentive-p-6`, `incentive-e-6`, `sale-7`, `incentive-p-7`, `incentive-e-7`) VALUES
(2, 'Junior', 40, 2.5, 0, 56, 5, 1000, 76, 7.5, 2000, 100, 10, 3000, 140, 12.5, 4500, 160, 15, 7000, 180, 17, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `salary_criteria_`
--

CREATE TABLE `salary_criteria_` (
  `id` int(11) NOT NULL,
  `type` char(100) NOT NULL,
  `sale` bigint(11) NOT NULL,
  `incentive_p` float NOT NULL,
  `incentive_e` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_criteria_`
--

INSERT INTO `salary_criteria_` (`id`, `type`, `sale`, `incentive_p`, `incentive_e`) VALUES
(25, 'Emerging Artist', 50000, 15, 0.5),
(26, 'Emerging Artist', 60000, 15, 0.5),
(27, 'Emerging Artist', 70000, 15, 0.5),
(28, 'Emerging Artist', 80000, 15, 0.5),
(32, 'Senior Artist', 100000, 20, 1),
(33, 'Senior Artist', 120000, 20, 1),
(34, 'Senior Artist', 140000, 20, 1),
(35, 'Senior Artist', 160000, 20, 1),
(42, 'Head Artist', 200000, 25, 1.5),
(43, 'Head Artist', 240000, 25, 1.5),
(44, 'Head Artist', 280000, 25, 1.5),
(45, 'Head Artist', 320000, 25, 1.5),
(46, 'Pro Artist', 400000, 30, 2),
(47, 'Pro Artist', 480000, 30, 2),
(48, 'Pro Artist', 560000, 30, 2),
(49, 'Pro Artist', 640000, 30, 2),
(50, 'Emerging Artist', 100000, 15, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `salary_rule`
--

CREATE TABLE `salary_rule` (
  `id` int(11) NOT NULL,
  `type` char(110) NOT NULL,
  `sale` int(11) NOT NULL,
  `incentive_p` float NOT NULL,
  `incentive_e` float NOT NULL,
  `customization` float NOT NULL,
  `custom_design` float NOT NULL,
  `laser` float NOT NULL,
  `piercing` float NOT NULL,
  `no_of_leaves` int(11) NOT NULL,
  `leave_deduaction` int(11) NOT NULL,
  `leave_award` int(11) NOT NULL,
  `product` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_rule`
--

INSERT INTO `salary_rule` (`id`, `type`, `sale`, `incentive_p`, `incentive_e`, `customization`, `custom_design`, `laser`, `piercing`, `no_of_leaves`, `leave_deduaction`, `leave_award`, `product`) VALUES
(3, 'Emerging Artist', 400000, 15, 0.5, 40, 10, 25, 30, 3, 500, 1000, 30),
(4, 'Senior Artist', 40000, 20, 1, 50, 15, 25, 30, 3, 1000, 2000, 0),
(5, 'Head Artist', 400000, 25, 1.5, 60, 20, 25, 30, 3, 2000, 4000, 0),
(6, 'Pro Artist', 2, 30, 2, 70, 25, 25, 30, 3, 4000, 8000, 0),
(7, 'Fixed Artist', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id`, `name`, `address`, `city`) VALUES
(6, 'Black Opal Ink - Dehradun', 'dehradun', 'dehradun'),
(7, 'Black Opal Ink - Haldwani', 'haldwani', 'haldwani');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(110) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tattoo_type` char(100) NOT NULL,
  `contact_no` char(100) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `customisation_charg` float NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `payment_type` char(100) NOT NULL,
  `total` float NOT NULL,
  `cash_payment` float NOT NULL,
  `online_payment` float NOT NULL,
  `date` char(200) NOT NULL,
  `date_month` char(100) NOT NULL,
  `has_customization` tinyint(1) NOT NULL,
  `has_custom_design` tinyint(1) NOT NULL,
  `has_laser` tinyint(1) NOT NULL,
  `charge_custom` float NOT NULL,
  `charge_custom_design` float NOT NULL,
  `charge_product` float NOT NULL,
  `charge_piercing` float NOT NULL,
  `charge_laser` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `serial_no`, `client_id`, `tattoo_type`, `contact_no`, `artist_id`, `customisation_charg`, `product_id`, `payment_type`, `total`, `cash_payment`, `online_payment`, `date`, `date_month`, `has_customization`, `has_custom_design`, `has_laser`, `charge_custom`, `charge_custom_design`, `charge_product`, `charge_piercing`, `charge_laser`) VALUES
(7, '23456', 2, 'Piercing', '9876543267', 1, 67, '6', 'Credit Card', 7890, 0, 0, '0000-00-00', '2022-08', 0, 0, 0, 0, 0, 0, 0, 0),
(10, '23456', 5, 'Select', '9876543267', 7, 120, '6', 'Select', 3244, 0, 0, '0000-00-00', '2022-08', 0, 0, 0, 0, 0, 0, 0, 0),
(11, '23456', 5, 'Piercing', '1232', 7, 122, '4', 'Cash', 2233, 0, 0, '0000-00-00', '2022-09', 0, 0, 0, 0, 0, 0, 0, 0),
(12, '23456', 5, 'Tattoo', '332', 7, 121, '5', 'Cash', 40000, 0, 0, '0000-00-00', '2022-09', 0, 0, 0, 0, 0, 0, 0, 0),
(13, '23456', 5, 'Tattoo', 'r544', 6, 223, '5', 'Cash', 23343, 0, 0, '2022-09-28 08:04:12pm', '2022-09', 0, 0, 0, 0, 0, 0, 0, 0),
(14, '1', 5, 'Tattoo', '9921897662', 7, 5000, '6', 'Cash', 20000, 0, 0, '2022-09-29 05:40:53pm', '2022-09', 0, 0, 0, 0, 0, 0, 0, 0),
(15, '', 5, 'Tattoo', '', 7, 0, '7', 'Select', 0, 0, 0, '2022-11-21 02:22:22pm', '2022-11', 0, 0, 0, 0, 0, 0, 0, 0),
(16, '', 5, 'Tattoo', '2546789', 1, 20000, '5', 'Cash', 500000, 0, 0, '2022-11-21 02:24:56pm', '2022-11', 0, 0, 0, 0, 0, 0, 0, 0),
(18, '21', 28, 'Tattoo', '8979451216', 9, 0, '6', 'Select', 599, 0, 0, '2022-12-06 04:01:50pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(19, '20', 27, 'Piercing', '8126627047', 8, 0, '6', 'Cash', 1000, 0, 0, '2022-12-06 04:14:46pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(20, '19', 26, 'Piercing', '8218618452', 8, 0, '6', 'Bank', 1000, 0, 0, '2022-12-06 04:16:29pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(21, '18', 25, 'Tattoo', '6396710381', 11, 0, '6', 'Bank', 22500, 0, 0, '2022-12-06 04:17:18pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(22, '17', 24, 'Tattoo', '8171854797', 10, 0, '6', 'Bank', 599, 0, 0, '2022-12-06 04:19:18pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(23, '16', 29, 'Tattoo', '', 11, 0, '6', 'Bank', 20450, 0, 0, '2022-12-06 04:20:57pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(24, '15', 23, 'Tattoo', '7060824448', 8, 0, '3', 'Bank', 5000, 0, 0, '2022-12-06 04:21:42pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(25, '14', 22, 'Tattoo', '7585911384', 6, 0, '6', 'Bank', 2100, 0, 0, '2022-12-06 04:22:24pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(26, '13', 21, 'Tattoo', '7814670711', 6, 0, '6', 'Bank', 2100, 0, 0, '2022-12-06 04:23:00pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(27, '12', 20, 'Tattoo', '8057649889', 10, 0, '3', 'Bank', 3700, 0, 0, '2022-12-06 04:23:43pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(28, '11', 18, 'Tattoo', '8267883440', 6, 500, '6', 'Cash', 3000, 0, 0, '2022-12-06 04:24:52pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(29, '10', 19, 'Tattoo', '9596010202', 8, 0, '3', 'Bank', 9500, 0, 0, '2022-12-06 04:26:19pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(30, '9', 17, 'Tattoo', '7091282057', 10, 0, '6', 'Bank', 4600, 0, 0, '2022-12-06 04:28:22pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(31, '8', 16, 'Piercing', '7337333396', 8, 0, '6', 'Bank', 700, 0, 0, '2022-12-06 04:29:16pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(32, '7', 15, 'Tattoo', '9618235909', 6, 0, '6', 'Bank', 4500, 0, 0, '2022-12-06 04:29:49pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(33, '6', 14, 'Tattoo', '8529477310', 10, 0, '6', 'Bank', 4000, 0, 0, '2022-12-06 04:30:34pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(34, '5', 13, 'Tattoo', '8126476788', 8, 0, '6', 'Cash', 9000, 0, 0, '2022-12-06 04:31:13pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(35, '4', 12, 'Tattoo', '8126055537', 9, 0, '6', 'Cash', 2500, 0, 0, '2022-12-06 04:32:24pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(36, '3', 11, 'Tattoo', '9760127129', 10, 0, '6', 'Cash', 3000, 0, 0, '2022-12-06 04:33:03pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(37, '2', 10, 'Tattoo', '8283054304', 8, 0, '6', 'Cash', 17900, 0, 0, '2022-12-06 04:34:01pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(38, '1', 9, 'Tattoo', '7988627920', 6, 0, '6', 'Bank', 5500, 0, 0, '2022-12-06 04:34:42pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(39, '22', 30, 'Tattoo', '7985714530', 8, 0, '6', 'Bank', 3000, 0, 0, '2022-12-06 05:08:49pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(40, '23', 31, 'Tattoo', '9805954240', 10, 0, '6', 'Bank', 3000, 0, 0, '2022-12-06 05:11:01pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(41, '24', 32, 'Tattoo', '9906091947', 10, 0, '3', 'Bank', 10500, 0, 0, '2022-12-08 11:46:16am', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(42, '25', 33, 'Tattoo', '', 8, 0, '3', 'Bank', 3500, 0, 0, '2022-12-09 02:30:32pm', '2022-12', 0, 0, 0, 0, 0, 0, 0, 0),
(43, '23456', 26, 'Tattoo', '656', 6, 0, '6', 'Credit Card', 20000, 0, 0, '2022-12-17 10:17:05am', '2022-12', 1, 1, 0, 0, 0, 0, 0, 0),
(44, '23456', 33, 'Piercing', '656', 6, 0, '6', 'Cash', 3000, 0, 0, '2022-12-17 05:55:34pm', '2022-12', 1, 0, 0, 0, 0, 0, 0, 0),
(45, '1', 34, 'Tattoo', '8287434305', 8, 0, '9', 'Cash', 2100, 0, 0, '2023-01-02 02:02:58pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(46, '2', 35, 'Tattoo', '', 9, 0, '9', 'Cash', 2100, 0, 0, '2023-01-02 02:06:10pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(47, '3', 37, 'Select', '8650222422', 11, 0, '9', 'Select', 2500, 0, 0, '2023-01-02 02:07:35pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(48, '4', 37, 'Tattoo', '', 8, 0, '9', 'Cash', 2100, 0, 0, '2023-01-02 02:08:52pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(49, '1', 38, 'Tattoo', '8287434305', 8, 0, '6', 'Cash', 2100, 0, 0, '2023-01-28 04:08:58pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(50, '2', 39, 'Tattoo', '', 9, 0, '6', 'Cash', 2100, 0, 0, '2023-01-28 04:10:00pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(51, '3', 40, 'Tattoo', '8650222422', 9, 0, '6', 'Cash', 2500, 0, 0, '2023-01-28 04:11:50pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(52, '4', 41, 'Tattoo', '', 8, 0, '6', 'Cash', 2100, 0, 0, '2023-01-28 04:12:52pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(53, '5', 42, 'Piercing', '9557549656', 8, 0, '8', 'Cash', 500, 0, 0, '2023-01-28 04:14:43pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(55, '8', 45, 'Tattoo', '8192032003', 8, 0, '3', 'Cash', 3000, 0, 0, '2023-01-28 04:20:34pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(56, '6', 46, 'Tattoo', '9557549656', 10, 0, '6', 'Cash', 3500, 0, 0, '2023-01-28 05:03:39pm', '2023-01', 0, 0, 0, 0, 0, 0, 0, 0),
(57, '7', 47, 'Tattoo', '9599702180', 8, 0, '3', 'Cash', 6000, 0, 0, '2023-01-28 05:05:10pm', '2023-01', 1, 0, 0, 0, 0, 0, 0, 0),
(58, '23456', 45, 'Piercing', '656', 6, 0, '8', 'Cash', 7000, 0, 0, '2023-02-09 07:35:42am', '2023-02', 1, 1, 1, 800, 10, 500, 600, 200),
(59, '23456', 45, 'Tattoo', '8888888', 6, 0, '6', 'Cash', 30000, 0, 0, '2023-02-09 07:38:56am', '2023-02', 1, 1, 1, 500, 1000, 800, 200, 100),
(60, '22', 45, 'Piercing', '23456', 6, 0, '8', 'Cash', 10000, 0, 0, '2023-02-09 07:39:57am', '2023-02', 1, 1, 1, 600, 700, 800, 300, 800),
(61, '23456', 45, 'Piercing', '34567', 6, 0, '6', 'Cash', 4000, 0, 0, '2023-02-09 09:34:38am', '2023-02', 1, 1, 1, 1000, 800, 500, 600, 300),
(62, '23456', 47, 'Tattoo', '3242', 6, 0, '8', 'Cash', 233343, 0, 0, '', '2023-02', 0, 0, 0, 1000, 1000, 3, 100, 1000),
(63, '23456', 47, 'Tattoo', '34567', 6, 0, '11', 'Cash', 111, 0, 0, '2023-02-09', '2023-02', 0, 0, 0, 11, 11, 22, 11, 22),
(64, '1', 48, 'Tattoo', '86300042251', 10, 0, '11', 'Cash', 5000, 0, 0, '2023-02-01', '2023-02', 0, 0, 0, 0, 0, 200, 0, 0),
(65, '2', 49, 'Tattoo', '7017652140', 8, 0, '10', 'Cash', 13500, 0, 0, '2023-02-01', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(66, '3', 50, 'Tattoo', '9548228304', 11, 0, '3', 'Cash', 15900, 0, 0, '2023-02-02', '2023-02', 0, 0, 0, 0, 0, 700, 0, 0),
(67, '4', 51, 'Tattoo', '9027575077', 10, 0, '10', 'Bank', 3200, 0, 0, '2023-02-03', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(68, '5', 52, 'Tattoo', '7677084516', 11, 0, '11', 'Bank', 22400, 0, 0, '2023-02-03', '2023-02', 1, 0, 0, 800, 0, 300, 0, 0),
(69, '6', 53, 'Tattoo', '8505884822', 8, 0, '10', 'Bank', 5300, 0, 0, '2023-02-04', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(70, '7', 54, 'Tattoo', '9182928185', 10, 0, '10', 'Bank', 3100, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(71, '8', 55, 'Tattoo', '9548939704', 8, 0, '10', 'Bank', 5600, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(72, '9', 56, 'Tattoo', '7078567437', 10, 0, '10', 'Bank', 1800, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(73, '10', 57, 'Tattoo', '8130827492', 10, 0, '10', 'Bank', 2300, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(74, '11', 58, 'Tattoo', '9675524226', 8, 0, '10', 'Bank', 4000, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(75, '12', 59, 'Tattoo', '8219352898', 8, 0, '10', 'Bank', 6250, 0, 0, '2023-02-05', '2023-02', 1, 0, 0, 700, 0, 0, 0, 0),
(76, '13', 60, 'Tattoo', '6398899205', 11, 0, '10', 'UPI', 9000, 0, 0, '2023-02-05', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(77, '14', 61, 'Piercing', '7017356558', 8, 0, '10', 'Cash', 0, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 600, 0),
(78, '15', 62, 'Tattoo', '8791296007', 10, 0, '10', 'Cash', 5800, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(79, '16', 63, 'Tattoo', '6351875732', 8, 0, '10', 'Cash', 2125, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(80, '17', 64, 'Tattoo', '8954410398', 8, 0, '10', 'Cash', 2125, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(81, '18', 65, 'Tattoo', '7503437061', 11, 0, '3', 'Bank', 16000, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 500, 0, 0),
(82, '19', 66, 'Tattoo', '8410468743', 8, 0, '10', 'Bank', 2500, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(83, '20', 67, 'Tattoo', '8580551250', 8, 0, '10', 'Bank', 2000, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(84, '21', 68, 'Tattoo', '8219352898', 8, 0, '10', 'Bank', 2500, 0, 0, '2023-02-06', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(85, '22', 69, 'Piercing', '9873969647', 11, 0, '10', 'Cash', 0, 0, 0, '2023-02-07', '2023-02', 0, 0, 0, 0, 0, 0, 1200, 0),
(86, '23', 70, 'Tattoo', '8102958497', 8, 0, '10', 'Cash', 2500, 0, 0, '2023-02-07', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(87, '24', 71, 'Tattoo', '8630584497', 8, 0, '10', 'Bank', 17000, 0, 0, '2023-02-08', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(88, '25', 72, 'Tattoo', '8802850175', 10, 0, '10', 'Bank', 2100, 0, 0, '2023-02-09', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(89, '26', 73, 'Tattoo', '4799383723', 10, 0, '10', 'Cash', 4000, 0, 0, '2023-02-09', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(90, '27', 74, 'Tattoo', '4799383723', 11, 0, '3', 'Cash', 15800, 0, 0, '2023-02-09', '2023-02', 1, 0, 0, 1000, 0, 700, 0, 0),
(91, '28', 75, 'Tattoo', '7338972779', 10, 0, '11', 'Bank', 6900, 0, 0, '2023-02-10', '2023-02', 0, 0, 0, 0, 0, 100, 0, 0),
(92, '29', 76, 'Piercing', '6396505171', 8, 0, '10', 'Bank', 0, 0, 0, '2023-02-10', '2023-02', 0, 0, 0, 0, 0, 0, 600, 0),
(93, '30', 77, 'Tattoo', '478927545', 11, 0, '5', 'Cash', 21000, 0, 0, '2023-02-10', '2023-02', 1, 0, 0, 1000, 0, 1000, 0, 0),
(94, '31', 78, 'Tattoo', '8008619058', 8, 0, '10', 'Cash', 5000, 0, 0, '2023-02-11', '2023-02', 1, 0, 0, 600, 0, 0, 0, 0),
(95, '32', 79, 'Tattoo', '8630584497', 11, 0, '10', 'Bank', 12000, 0, 0, '2023-02-11', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(96, '33', 80, 'Tattoo', '', 10, 0, '10', 'Bank', 2100, 0, 0, '2023-02-11', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(97, '34', 81, 'Tattoo', '', 8, 0, '10', 'Bank', 2100, 0, 0, '2023-02-11', '2023-02', 0, 0, 0, 0, 0, 0, 0, 0),
(98, '22', 69, 'Piercing', '9873969647', 8, 0, '10', 'Cash', 0, 0, 0, '2023-02-12 01:57:58pm', '2023-02', 0, 0, 0, 0, 0, 0, 1200, 0),
(99, '123', 81, 'Tattoo', '7874984410', 12, 0, '11', '0', 0, 502, 56, '2023-06-11', '2023-06', 0, 0, 0, 0, 0, 500, 0, 0),
(100, '125', 81, 'Tattoo', '456231251', 12, 0, '11', '0', 0, 555, 500, '2000-08-10', '2023-06', 0, 0, 0, 5, 5, 58, 5, 5),
(101, '131', 81, 'Tattoo', '5898745613', 12, 0, '11', '0', 0, 50, 55, '1999-08-10', '2023-06', 0, 0, 0, 50, 50, 654, 50, 50),
(102, '152', 81, 'Tattoo', '2589637410', 12, 0, '11', '0', 2095, 658, 952, '1000-10-10', '2023-06', 0, 0, 0, 0, 0, 485, 0, 0),
(103, '153', 81, 'Tattoo', '6595741852', 12, 0, '11', '0', 0, 56, 56, '1555-12-10', '2023-06', 0, 0, 0, 5, 0, 0, 0, 0),
(104, '154', 81, 'Tattoo', '5698741852', 12, 0, '11', '0', 0, 568, 500, '5415-02-10', '2023-06', 0, 0, 0, 5, 5, 56, 0, 5),
(105, '155', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 500, 500, '2055-05-05', '2023-06', 0, 0, 0, 5, 0, 0, 0, 0),
(106, '156', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 520, 200, '2023-12-10', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(107, '157', 81, 'Tattoo', '8798456321', 12, 0, '11', '0', 0, 45, 450, '0001-10-10', '2023-06', 0, 0, 0, 0, 0, 123, 0, 0),
(108, '520', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 50, 562, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(109, '174', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 456, 654, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(110, '177', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 177, 20, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(111, '178', 81, 'Tattoo', '7898789877', 12, 0, '11', '0', 0, 546, 520, '2023-12-10', '2023-06', 0, 0, 0, 0, 0, 546, 0, 0),
(112, '198', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 45, 650, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(113, '1895', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 565, 522, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(114, '546', 81, 'Tattoo', '', 12, 0, '11', '0', 0, 450, 650, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(115, '145', 81, 'Tattoo', '', 12, 0, '11', '0', 6950, 450, 6500, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(116, '789', 81, 'Tattoo', '', 12, 0, '0', '0', 1052, 500, 52, '', '2023-06', 0, 0, 0, 0, 0, 500, 0, 0),
(117, '001', 81, 'Tattoo', '', 12, 0, '0', '0', 0, 0, 0, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(118, '001', 81, 'Tattoo', '', 12, 0, '0', '0', 0, 0, 0, '', '2023-06', 0, 0, 0, 0, 0, 0, 0, 0),
(124, '147', 81, 'Tattoo', '8520741963', 15, 0, '8, 5', '0', 1498, 499, 499, '2023-06-13 05:31:10pm', '2023-06', 0, 0, 0, 0, 0, 499, 0, 0),
(127, '191', 81, 'Tattoo', '8520741963', 15, 0, '4', '0', 1828, 499, 580, '2023-06-13 05:37:24pm', '2023-06', 0, 0, 0, 0, 0, 599, 0, 150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` char(200) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `username`, `password`, `email`, `studio_id`, `fname`) VALUES
(2, 'super_admin', 'username', 'Super#boi', 'super@boi.com', 3, 'Superadmin'),
(4, 'studio_admin', 'username', 'Pravin#boi', 'pravin@boi.com', 6, 'Pravin'),
(5, 'studio_admin', 'username', 'Krishna@123', 'Krishna@boi.com', 7, 'sam'),
(7, 'studio_manager', 'username', 'Manager@123', 'manager@haldwani.com', 7, 'Manager'),
(8, 'studio_manager', 'username', 'Manager@123', 'manager@dehradun.com', 6, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_appointment`
--
ALTER TABLE `advance_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_amount`
--
ALTER TABLE `pending_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_criteria`
--
ALTER TABLE `salary_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_criteria_`
--
ALTER TABLE `salary_criteria_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_rule`
--
ALTER TABLE `salary_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_appointment`
--
ALTER TABLE `advance_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pending_amount`
--
ALTER TABLE `pending_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary_criteria`
--
ALTER TABLE `salary_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_criteria_`
--
ALTER TABLE `salary_criteria_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `salary_rule`
--
ALTER TABLE `salary_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
