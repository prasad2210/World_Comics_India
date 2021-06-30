-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 09:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(5) NOT NULL,
  `city` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `lat`, `lng`, `state`) VALUES
(1, 'Abohar', 30.144533, 74.19552, 'Punjab'),
(2, 'Adilabad', 19.4, 78.31, 'Telangana'),
(3, 'Agartala', 23.836049, 91.279386, 'Tripura'),
(4, 'Agra', 27.187935, 78.003944, 'Uttar Pradesh'),
(5, 'Ahmadnagar', 19.094571, 74.738432, 'Maharashtra'),
(6, 'Ahmedabad', 23.025793, 72.587265, 'Gujarat'),
(7, 'Aizawl  ', 23.736701, 92.714596, 'Mizoram'),
(8, 'Ajmer', 26.452103, 74.638667, 'Rajasthan'),
(9, 'Akola', 20.709569, 76.998103, 'Maharashtra'),
(10, 'Alappuzha', 9.494647, 76.331108, 'Kerala'),
(11, 'Aligarh', 27.881453, 78.07464, 'Uttar Pradesh'),
(12, 'Alipurduar', 26.4835, 89.522855, 'West Bengal'),
(13, 'Allahabad', 25.44478, 81.843217, 'Uttar Pradesh'),
(14, 'Alwar', 27.566291, 76.610202, 'Rajasthan'),
(15, 'Ambala', 30.360993, 76.797819, 'Haryana'),
(16, 'Amaravati', 20.933272, 77.75152, 'Maharashtra'),
(17, 'Amritsar', 31.622337, 74.875335, 'Punjab'),
(18, 'Asansol', 23.683333, 86.983333, 'West Bengal'),
(19, 'Aurangabad', 19.880943, 75.346739, 'Maharashtra'),
(20, 'Aurangabad', 24.752037, 84.374202, 'Bihar'),
(21, 'Bakshpur', 25.894283, 80.792104, 'Uttar Pradesh'),
(22, 'Bamanpuri', 28.804495, 79.040305, 'Uttar Pradesh'),
(23, 'Baramula', 34.209004, 74.342853, 'Jammu and Kashmir'),
(24, 'Barddhaman', 23.255716, 87.856906, 'West Bengal'),
(25, 'Bareilly', 28.347023, 79.421934, 'Uttar Pradesh'),
(26, 'Belgaum', 15.862643, 74.508534, 'Karnataka'),
(27, 'Bellary', 15.142049, 76.92398, 'Karnataka'),
(28, 'Bengaluru', 12.977063, 77.587106, 'Karnataka'),
(29, 'Bhagalpur', 25.244462, 86.971832, 'Bihar'),
(30, 'Bharatpur', 27.215251, 77.492786, 'Rajasthan'),
(31, 'Bharauri', 27.598203, 81.694709, 'Uttar Pradesh'),
(32, 'Bhatpara', 22.866431, 88.401129, 'West Bengal'),
(33, 'Bhavnagar', 21.774455, 72.152496, 'Gujarat'),
(34, 'Bhilai', 21.209188, 81.428497, 'Chhattisgarh'),
(35, 'Bhilwara', 25.347071, 74.640812, 'Rajasthan'),
(36, 'Bhiwandi', 19.300229, 73.058813, 'Maharashtra'),
(37, 'Bhiwani', 28.793044, 76.13968, 'Haryana'),
(38, 'Bhopal ', 23.254688, 77.402892, 'Madhya Pradesh'),
(39, 'Bhubaneshwar', 20.272411, 85.833853, 'Odisha'),
(40, 'Bhuj', 23.253972, 69.669281, 'Gujarat'),
(41, 'Bhusaval', 21.043649, 75.785058, 'Maharashtra'),
(42, 'Bidar', 17.913309, 77.530105, 'Karnataka'),
(43, 'Bijapur', 16.827715, 75.718988, 'Karnataka'),
(44, 'Bikaner', 28.017623, 73.314955, 'Rajasthan'),
(45, 'Bilaspur', 22.080046, 82.155431, 'Chhattisgarh'),
(46, 'Brahmapur', 19.311514, 84.792903, 'Odisha'),
(47, 'Budaun', 28.038114, 79.126677, 'Uttar Pradesh'),
(48, 'Bulandshahr', 28.403922, 77.857731, 'Uttar Pradesh'),
(49, 'Calicut', 11.248016, 75.780402, 'Kerala'),
(50, 'Chanda', 19.950758, 79.295229, 'Maharashtra'),
(51, 'Chandigarh ', 30.736292, 76.788398, 'Chandigarh'),
(52, 'Chennai', 13.084622, 80.248357, 'Tamil Nadu '),
(53, 'Chikka Mandya', 12.545602, 76.895078, 'Karnataka'),
(54, 'Chirala', 15.823849, 80.352187, 'Andhra Pradesh'),
(55, 'Coimbatore', 11.005547, 76.966122, 'Tamil Nadu '),
(56, 'Cuddalore', 11.746289, 79.764362, 'Tamil Nadu '),
(57, 'Cuttack', 20.522922, 85.78813, 'Odisha'),
(58, 'Daman', 20.414315, 72.83236, 'Daman and Diu'),
(59, 'Davangere', 14.469237, 75.92375, 'Karnataka'),
(60, 'DehraDun', 30.324427, 78.033922, 'Uttarakhand'),
(61, 'Delhi', 28.651952, 77.231495, 'Delhi'),
(62, 'Dhanbad', 23.801988, 86.443244, 'Jharkhand'),
(63, 'Dibrugarh', 27.479888, 94.90837, 'Assam'),
(64, 'Dindigul', 10.362853, 77.975827, 'Tamil Nadu '),
(65, 'Dispur', 26.135638, 91.800688, 'Assam'),
(66, 'Diu', 20.715115, 70.987952, 'Daman and Diu'),
(67, 'Faridabad', 28.411236, 77.313162, 'Haryana'),
(68, 'Firozabad', 27.150917, 78.397808, 'Uttar Pradesh'),
(69, 'Fyzabad', 26.775486, 82.150182, 'Uttar Pradesh'),
(70, 'Gangtok', 27.325739, 88.612155, 'Sikkim'),
(71, 'Gaya', 24.796858, 85.003852, 'Bihar'),
(72, 'Ghandinagar', 23.216667, 72.683333, 'Gujarat'),
(73, 'Ghaziabad', 28.665353, 77.439148, 'Uttar Pradesh'),
(74, 'Gopalpur', 26.735389, 83.38064, 'Uttar Pradesh'),
(75, 'Gulbarga', 17.335827, 76.83757, 'Karnataka'),
(76, 'Guntur', 16.299737, 80.457293, 'Andhra Pradesh'),
(77, 'Gurugram', 28.460105, 77.026352, 'Haryana'),
(78, 'Guwahati', 26.176076, 91.762932, 'Assam'),
(79, 'Gwalior', 26.229825, 78.173369, 'Madhya Pradesh'),
(80, 'Haldia', 22.025278, 88.058333, 'West Bengal'),
(81, 'Haora', 22.576882, 88.318566, 'West Bengal'),
(82, 'Hapur', 28.729845, 77.780681, 'Uttar Pradesh'),
(83, 'Haripur', 31.463218, 75.986418, 'Punjab'),
(84, 'Hata', 27.592698, 78.013843, 'Uttar Pradesh'),
(85, 'Hindupur', 13.828065, 77.491425, 'Andhra Pradesh'),
(86, 'Hisar', 29.153938, 75.722944, 'Haryana'),
(87, 'Hospet', 15.269537, 76.387103, 'Karnataka'),
(88, 'Hubli', 15.349955, 75.138619, 'Karnataka'),
(89, 'Hyderabad', 17.384052, 78.456355, 'Telangana'),
(90, 'Imphal', 24.808053, 93.944203, 'Manipur'),
(91, 'Indore', 22.717736, 75.85859, 'Madhya Pradesh'),
(92, 'Itanagar', 27.102349, 93.692047, 'Arunachal Pradesh'),
(93, 'Jabalpur', 23.174495, 79.935903, 'Madhya Pradesh'),
(94, 'Jaipur', 26.913312, 75.787872, 'Rajasthan'),
(95, 'Jammu', 32.735686, 74.869112, 'Jammu and Kashmir'),
(96, 'Jamshedpur', 22.802776, 86.185448, 'Jharkhand'),
(97, 'Jhansi', 25.458872, 78.579943, 'Uttar Pradesh'),
(98, 'Jodhpur', 26.26841, 73.005943, 'Rajasthan'),
(99, 'Jorhat', 26.757509, 94.203055, 'Assam'),
(100, 'Kagaznagar', 19.331589, 79.466051, 'Andhra Pradesh'),
(101, 'Kakinada', 16.960361, 82.238086, 'Andhra Pradesh'),
(102, 'Kalyan', 19.243703, 73.135537, 'Maharashtra'),
(103, 'Karimnagar', 18.436738, 79.13222, 'Telangana'),
(104, 'Karnal', 29.691971, 76.984483, 'Haryana'),
(105, 'Karur', 10.960277, 78.076753, 'Tamil Nadu '),
(106, 'Kavaratti', 10.566667, 72.616667, 'Lakshadweep'),
(107, 'Khammam', 17.247672, 80.143682, 'Telangana'),
(108, 'Khanapur', 21.273716, 76.117376, 'Maharashtra'),
(109, 'Kochi', 9.947743, 76.253802, 'Kerala'),
(110, 'Kohima', 25.674673, 94.110988, 'Nagaland'),
(111, 'Kolar', 13.137679, 78.129989, 'Karnataka'),
(112, 'Kolhapur', 16.695633, 74.231669, 'Maharashtra'),
(113, 'Kolkata ', 22.562627, 88.363044, 'West Bengal'),
(114, 'Kollam', 8.881131, 76.584694, 'Kerala'),
(115, 'Kota', 25.182544, 75.839065, 'Rajasthan'),
(116, 'Krishnanagar', 23.405761, 88.490733, 'West Bengal'),
(117, 'Krishnapuram', 12.869617, 79.719469, 'Tamil Nadu '),
(118, 'Kumbakonam', 10.959789, 79.377472, 'Tamil Nadu '),
(119, 'Kurnool', 15.828865, 78.036021, 'Andhra Pradesh'),
(120, 'Latur', 18.399487, 76.584252, 'Maharashtra'),
(121, 'Lucknow', 26.839281, 80.923133, 'Uttar Pradesh'),
(122, 'Ludhiana', 30.912042, 75.853789, 'Punjab'),
(123, 'Machilipatnam', 16.187466, 81.13888, 'Andhra Pradesh'),
(124, 'Madurai', 9.917347, 78.119622, 'Tamil Nadu '),
(125, 'Mahabubnagar', 16.75, 78, 'Telangana'),
(126, 'Malegaon Camp', 20.569974, 74.515415, 'Maharashtra'),
(127, 'Mangalore', 12.865371, 74.842432, 'Karnataka'),
(128, 'Mathura', 27.503501, 77.672145, 'Uttar Pradesh'),
(129, 'Meerut', 28.980018, 77.706356, 'Uttar Pradesh'),
(130, 'Mirzapur', 25.144902, 82.565335, 'Uttar Pradesh'),
(131, 'Moradabad', 28.838931, 78.776838, 'Uttar Pradesh'),
(132, 'Mumbai', 18.987807, 72.836447, 'Maharashtra'),
(133, 'Muzaffarnagar', 29.470914, 77.703324, 'Uttar Pradesh'),
(134, 'Muzaffarpur', 26.122593, 85.390553, 'Bihar'),
(135, 'Mysore', 12.292664, 76.638543, 'Karnataka'),
(136, 'Nagercoil', 8.177313, 77.43437, 'Tamil Nadu '),
(137, 'Nalgonda', 17.05, 79.27, 'Telangana'),
(138, 'Nanded', 19.160227, 77.314971, 'Maharashtra'),
(139, 'Nandyal', 15.477994, 78.483605, 'Andhra Pradesh'),
(140, 'Nasik', 19.999963, 73.776887, 'Maharashtra'),
(141, 'Navsari', 20.85, 72.916667, 'Gujarat'),
(142, 'Nellore', 14.449918, 79.986967, 'Andhra Pradesh'),
(143, 'New Delhi', 28.6, 77.2, 'Delhi'),
(144, 'Nizamabad', 18.673151, 78.10008, 'Telangana'),
(145, 'Ongole', 15.503565, 80.044541, 'Andhra Pradesh'),
(146, 'Pali', 25.775125, 73.320611, 'Rajasthan'),
(147, 'Panaji', 15.498289, 73.824541, 'Goa'),
(148, 'Panchkula', 30.691512, 76.853736, 'Haryana'),
(149, 'Panipat', 29.387471, 76.968246, 'Haryana'),
(150, 'Parbhani', 19.268553, 76.770807, 'Maharashtra'),
(151, 'Pathankot', 32.274842, 75.652865, 'Punjab'),
(152, 'Patiala', 30.336245, 76.392199, 'Punjab'),
(153, 'Patna', 25.615379, 85.101027, 'Bihar'),
(154, 'Pilibhit', 28.631245, 79.804362, 'Uttar Pradesh'),
(155, 'Porbandar', 21.641346, 69.600868, 'Gujarat'),
(156, 'Port Blair', 11.666667, 92.75, 'Andaman and Nicobar Islands'),
(157, 'Proddatur', 14.7502, 78.548129, 'Andhra Pradesh'),
(158, 'Puducherry', 11.933812, 79.829792, 'Puducherry'),
(159, 'Pune', 18.513271, 73.849852, 'Maharashtra'),
(160, 'Puri', 19.798254, 85.824938, 'Odisha'),
(161, 'Purnea', 25.776703, 87.473655, 'Bihar'),
(162, 'Raichur', 16.205459, 77.35567, 'Karnataka'),
(163, 'Raipur', 21.233333, 81.633333, 'Chhattisgarh'),
(164, 'Rajahmundry', 17.005171, 81.777839, 'Andhra Pradesh'),
(165, 'Rajapalaiyam', 9.451111, 77.556121, 'Tamil Nadu '),
(166, 'Rajkot', 22.291606, 70.793217, 'Gujarat'),
(167, 'Ramagundam', 18.45, 79.28, 'Telangana'),
(168, 'Rampura', 26.884682, 75.789336, 'Rajasthan'),
(169, 'Ranchi', 23.347768, 85.338564, 'Jharkhand'),
(170, 'Ratlam', 23.330331, 75.040315, 'Madhya Pradesh'),
(171, 'Raurkela', 22.224964, 84.864143, 'Odisha'),
(172, 'Rohtak', 28.894473, 76.589166, 'Haryana'),
(173, 'Saharanpur', 29.967896, 77.545221, 'Uttar Pradesh'),
(174, 'Saidapur', 27.598784, 80.75089, 'Uttar Pradesh'),
(175, 'Saidpur', 34.318174, 74.457093, 'Jammu and Kashmir'),
(176, 'Salem', 11.651165, 78.158672, 'Tamil Nadu '),
(177, 'Samlaipadar', 21.478072, 83.990505, 'Odisha'),
(178, 'Sangli', 16.856777, 74.569196, 'Maharashtra'),
(179, 'Saugor', 23.838766, 78.738738, 'Madhya Pradesh'),
(180, 'Shahbazpur', 27.874116, 79.879327, 'Uttar Pradesh'),
(181, 'Shiliguri', 26.710035, 88.428512, 'West Bengal'),
(182, 'Shillong ', 25.573987, 91.896807, 'Meghalaya'),
(183, 'Shimla', 31.104423, 77.166623, 'Himachal Pradesh'),
(184, 'Shimoga', 13.932424, 75.572555, 'Karnataka'),
(185, 'Sikar', 27.614778, 75.138671, 'Rajasthan'),
(186, 'Silchar', 24.827327, 92.797868, 'Assam'),
(187, 'Silvassa', 20.273855, 72.996728, 'Dadra and Nagar Haveli'),
(188, 'Sirsa', 29.534893, 75.028981, 'Haryana'),
(189, 'Sonipat', 28.994778, 77.019375, 'Haryana'),
(190, 'Srinagar', 34.085652, 74.805553, 'Jammu and Kashmir'),
(191, 'Surat', 21.195944, 72.830232, 'Gujarat'),
(192, 'Tezpur', 26.633333, 92.8, 'Assam'),
(193, 'Thanjavur', 10.785233, 79.139093, 'Tamil Nadu '),
(194, 'Tharati Etawah', 26.758236, 79.014875, 'Uttar Pradesh'),
(195, 'Thiruvananthapuram', 8.485498, 76.949238, 'Kerala'),
(196, 'Tiruchchirappalli', 10.815499, 78.696513, 'Tamil Nadu '),
(197, 'Tirunelveli', 8.725181, 77.684519, 'Tamil Nadu '),
(198, 'Tirupati', 13.635505, 79.419888, 'Andhra Pradesh'),
(199, 'Tiruvannamalai', 12.230204, 79.072954, 'Tamil Nadu '),
(200, 'Tonk', 26.168672, 75.786111, 'Rajasthan'),
(201, 'Tuticorin', 8.805038, 78.151884, 'Tamil Nadu '),
(202, 'Udaipur', 24.57951, 73.690508, 'Rajasthan'),
(203, 'Ujjain', 23.182387, 75.776433, 'Madhya Pradesh'),
(204, 'Vadodara', 22.299405, 73.208119, 'Gujarat'),
(205, 'Valparai', 10.325163, 76.955299, 'Tamil Nadu '),
(206, 'Varanasi', 25.31774, 83.005811, 'Uttar Pradesh'),
(207, 'Vellore', 12.905769, 79.137104, 'Tamil Nadu '),
(208, 'Vishakhapatnam', 17.704052, 83.297663, 'Andhra Pradesh'),
(209, 'Vizianagaram', 18.11329, 83.397743, 'Andhra Pradesh'),
(210, 'Warangal', 17.978423, 79.600209, 'Telangana'),
(211, 'Jorapokhar', 23.7, 86.41267, 'Jharkhand'),
(212, 'Brajrajnagar', 21.82, 83.92, 'Odisha'),
(213, 'Talcher', 20.95, 85.23, 'Odisha');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` int(11) NOT NULL,
  `comic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
