-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 03:12 PM
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
-- Database: pod
--

-- --------------------------------------------------------

--
-- Table structure for table admin
--

CREATE TABLE admin (
  name varchar(50) NOT NULL,
  admin_id int(11) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(15) NOT NULL,
  password varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table cart
--

CREATE TABLE cart (
  product_id int(15) NOT NULL,
  quantity int(50) NOT NULL,
  size bit(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table order
--

CREATE TABLE order (
  order_id int(15) NOT NULL,
  order_date date NOT NULL,
  order_amount int(50) NOT NULL,
  order_status varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table order
--

INSERT INTO order (order_id, order_date, order_amount, order_status) VALUES
(1, '0000-00-00', 0, ''),
(2, '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table payment
--

CREATE TABLE payment (
  payment_id int(15) NOT NULL,
  amount int(15) NOT NULL,
  date date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table product
--

CREATE TABLE product (
  product_id int(50) NOT NULL,
  product_name varchar(50) NOT NULL,
  product_category varchar(100) NOT NULL,
  product_description varchar(100) NOT NULL,
  amount int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table product_category
--

CREATE TABLE product_category (
  category_id int(15) NOT NULL,
  name varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  name varchar(50) NOT NULL,
  user_id int(15) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  phone varchar(15) NOT NULL,
  pincode int(11) NOT NULL,
  street varchar(50) NOT NULL,
  city varchar(50) NOT NULL,
  state varchar(50) NOT NULL,
  address varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table admin
--
ALTER TABLE admin
  ADD PRIMARY KEY (admin_id);

--
-- Indexes for table cart
--
ALTER TABLE cart
  ADD KEY product_id (product_id);

--
-- Indexes for table order
--
ALTER TABLE order
  ADD PRIMARY KEY (order_id);

--
-- Indexes for table payment
--
ALTER TABLE payment
  ADD PRIMARY KEY (payment_id);

--
-- Indexes for table product
--
ALTER TABLE product
  ADD PRIMARY KEY (product_id);

--
-- Indexes for table product_category
--
ALTER TABLE product_category
  ADD PRIMARY KEY (category_id);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (user_id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table admin
--
ALTER TABLE admin
  MODIFY admin_id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table order
--
ALTER TABLE order
  MODIFY order_id int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table payment
--
ALTER TABLE payment
  MODIFY payment_id int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table product
--
ALTER TABLE product
  MODIFY product_id int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table product_category
--
ALTER TABLE product_category
  MODIFY category_id int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table user
--
ALTER TABLE user
  MODIFY user_id int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table cart
--
ALTER TABLE cart
  ADD CONSTRAINT cart_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (product_id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;