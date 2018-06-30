-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2018 at 05:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_Toymurad_Almamedov_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_charges`
--

CREATE TABLE `additional_charges` (
  `additional_charges` int(11) NOT NULL,
  `FK_drop_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_charges`
--

INSERT INTO `additional_charges` (`additional_charges`, `FK_drop_id`, `amount`, `description`) VALUES
(1, 3, 40, 'Tank was not filled');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `licence_plate_number` varchar(35) NOT NULL,
  `FK_car_model_id` varchar(55) DEFAULT NULL,
  `FK_office_id` int(11) DEFAULT NULL,
  `FK_supplier_id` int(11) DEFAULT NULL,
  `damages` tinyint(1) DEFAULT NULL,
  `tank_status` tinyint(1) DEFAULT NULL,
  `rental_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`licence_plate_number`, `FK_car_model_id`, `FK_office_id`, `FK_supplier_id`, `damages`, `tank_status`, `rental_price`) VALUES
('04KK4583', 'S8', 3, 2, 0, 1, 330),
('12ND-13', 'x5', 3, 1, 0, 1, 240),
('31ADD3', 'Koleos', 1, 1, 0, 1, 101),
('5NNY092', 'A180', 1, 2, 0, 1, 180),
('7YN-089', 'A6', 4, 1, 1, 1, 210),
('839-VGA', 'A6', 2, 1, 0, 1, 210),
('8KH-D70', '1M Coupe', 2, 1, 0, 1, 130),
('922-RIE', '1M Coupe', 1, 1, 0, 1, 130),
('A1F1-43', 'camry', 4, 2, 0, 1, 149),
('AD31-43', 'Captur', 4, 2, 0, 1, 120),
('SXN-9714', 'A180', 2, 1, 0, 1, 115);

-- --------------------------------------------------------

--
-- Table structure for table `cars_supplier`
--

CREATE TABLE `cars_supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_supplier`
--

INSERT INTO `cars_supplier` (`supplier_id`, `name`, `address`) VALUES
(1, 'Kern', '156-100 Hale Ave White Plains, NY 10605 USA'),
(2, 'Sulloy', '498-400 S Peach St Easton, PA 18042 USA');

-- --------------------------------------------------------

--
-- Table structure for table `car_manufacturer`
--

CREATE TABLE `car_manufacturer` (
  `car_manufacturer_id` int(11) NOT NULL,
  `make` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_manufacturer`
--

INSERT INTO `car_manufacturer` (`car_manufacturer_id`, `make`) VALUES
(1, 'BMW'),
(2, 'Mercedes'),
(3, 'Toyota'),
(4, 'Audi'),
(5, 'Renault');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `car_model_id` varchar(35) NOT NULL,
  `FK_manufacturer_id` int(11) DEFAULT NULL,
  `horse_power` int(11) DEFAULT NULL,
  `color` enum('red','white','blue','black','white','red','orange','grey') DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`car_model_id`, `FK_manufacturer_id`, `horse_power`, `color`, `price`, `img`) VALUES
('1M Coupe', 1, 335, 'red', 55000, '1m.png'),
('320i', 1, 180, 'white', 35000, '320i.png'),
('A180', 2, 120, 'white', 35000, 'a180.png'),
('A6', 4, 252, 'white', 57000, 'a6.png'),
('camry', 3, 203, 'blue', 28000, 'camry.png'),
('Captur', 5, 118, 'orange', 23000, 'captur1.png'),
('Koleos', 5, 150, 'grey', 38000, 'koleos1.png'),
('S8', 4, 435, 'red', 116000, 's8.png'),
('x5', 1, 255, 'black', 60000, 'x5.png');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `tel_number` int(11) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `admin_status` tinyint(1) DEFAULT '0',
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `email`, `tel_number`, `address`, `admin_status`, `pwd`) VALUES
(1, 'Tim', 'Almamedov', 'timur.almamedov@gmail.com', 2147483647, 'Donau-City-StraÃŸe 12/1/039', 1, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(2, 'John', 'Doe', 'johndoe@email.com', 2147483647, '51 Avenue, NYC', 0, ''),
(3, 'Lisa', 'Tate', 'lisatate@gmail.com', 1241513513, '2 Green Valley, LA', 0, ''),
(4, 'Lisa', 'Doe', 'lisadoe@email.com', 2147483647, '51 Avenue, NYC', 0, ''),
(5, 'Tom', 'Less', 'tomless@yahoo.com', 2147483647, 'Fagribaer 6-14, Reykjavik', 0, ''),
(6, 'John', 'Doe', 'john.doe@gmail.com', 238402934, 'Prinz Eugen-StraÃŸe 72/Stiege/Top 4', 0, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

-- --------------------------------------------------------

--
-- Table structure for table `drop`
--

CREATE TABLE `drop` (
  `drop_id` int(11) NOT NULL,
  `FK_invoice_number` int(11) DEFAULT NULL,
  `FK_office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drop`
--

INSERT INTO `drop` (`drop_id`, `FK_invoice_number`, `FK_office_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 4),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_number` int(11) NOT NULL,
  `FK_reservation_id` int(11) DEFAULT NULL,
  `pick_up_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_number`, `FK_reservation_id`, `pick_up_status`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `name` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `location`, `name`) VALUES
(1, '322-344 New York Ave Brooklyn, NY 11213 USA', 'New York Office 1'),
(2, '2260 University Ave Bronx, NY 10468 USA', 'New York Office 2'),
(3, '4328-4302 W Washington Blvd Los Angeles, CA 90016 USA', 'Los Angeles Office 1'),
(4, '1001-1099 S Catalina St Los Angeles, CA 90006 USA', 'Los Angeles Office 2');

-- --------------------------------------------------------

--
-- Table structure for table `pick_up`
--

CREATE TABLE `pick_up` (
  `pick_up_id` int(11) DEFAULT NULL,
  `FK_invoice_number` int(11) DEFAULT NULL,
  `pick_up_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pick_up`
--

INSERT INTO `pick_up` (`pick_up_id`, `FK_invoice_number`, `pick_up_status`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 0),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `FK_licence_plate_number` varchar(35) DEFAULT NULL,
  `FK_client_id` int(11) DEFAULT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `date_of_pick_up` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `FK_licence_plate_number`, `FK_client_id`, `date_of_reservation`, `date_of_pick_up`) VALUES
(1, '839-VGA', 1, '2018-03-12', '2018-03-16'),
(2, '839-VGA', 2, '2017-01-06', '2017-01-12'),
(3, '04KK4583', 1, '2018-05-29', '2018-06-01'),
(4, '7YN-089', 3, '2018-01-01', '2018-01-09'),
(5, '922-RIE', 4, '2015-08-13', '2015-08-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_charges`
--
ALTER TABLE `additional_charges`
  ADD PRIMARY KEY (`additional_charges`),
  ADD KEY `FK_drop_id` (`FK_drop_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`licence_plate_number`),
  ADD KEY `FK_car_model_id` (`FK_car_model_id`),
  ADD KEY `FK_office_id` (`FK_office_id`),
  ADD KEY `FK_supplier_id` (`FK_supplier_id`);

--
-- Indexes for table `cars_supplier`
--
ALTER TABLE `cars_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `car_manufacturer`
--
ALTER TABLE `car_manufacturer`
  ADD PRIMARY KEY (`car_manufacturer_id`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`car_model_id`),
  ADD KEY `FK_manufacturer_id` (`FK_manufacturer_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `drop`
--
ALTER TABLE `drop`
  ADD PRIMARY KEY (`drop_id`),
  ADD KEY `FK_invoice_number` (`FK_invoice_number`),
  ADD KEY `FK_office_id` (`FK_office_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `FK_reservation_id` (`FK_reservation_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `pick_up`
--
ALTER TABLE `pick_up`
  ADD KEY `FK_invoice_number` (`FK_invoice_number`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `FK_licence_plate_number` (`FK_licence_plate_number`),
  ADD KEY `FK_client_id` (`FK_client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_charges`
--
ALTER TABLE `additional_charges`
  ADD CONSTRAINT `additional_charges_ibfk_1` FOREIGN KEY (`FK_drop_id`) REFERENCES `drop` (`drop_id`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`FK_car_model_id`) REFERENCES `car_model` (`car_model_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`FK_office_id`) REFERENCES `office` (`office_id`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`FK_supplier_id`) REFERENCES `cars_supplier` (`supplier_id`);

--
-- Constraints for table `car_model`
--
ALTER TABLE `car_model`
  ADD CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`FK_manufacturer_id`) REFERENCES `car_manufacturer` (`car_manufacturer_id`);

--
-- Constraints for table `drop`
--
ALTER TABLE `drop`
  ADD CONSTRAINT `drop_ibfk_1` FOREIGN KEY (`FK_invoice_number`) REFERENCES `invoice` (`invoice_number`),
  ADD CONSTRAINT `drop_ibfk_2` FOREIGN KEY (`FK_office_id`) REFERENCES `office` (`office_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`FK_reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Constraints for table `pick_up`
--
ALTER TABLE `pick_up`
  ADD CONSTRAINT `pick_up_ibfk_1` FOREIGN KEY (`FK_invoice_number`) REFERENCES `invoice` (`invoice_number`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`FK_licence_plate_number`) REFERENCES `car` (`licence_plate_number`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`FK_client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
