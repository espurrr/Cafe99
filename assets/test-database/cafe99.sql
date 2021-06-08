-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 02:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe99`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Announcement_id` int(4) NOT NULL,
  `Announcement_title` varchar(255) NOT NULL,
  `Announcement_date` date NOT NULL,
  `Announcement_time` time(6) NOT NULL,
  `Content` text NOT NULL,
  `To_whom` enum('All Employees','Restaurant managers','Cashiers','Delivery person','Kitchen managers') NOT NULL DEFAULT 'All Employees',
  `RM_User_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Announcement_id`, `Announcement_title`, `Announcement_date`, `Announcement_time`, `Content`, `To_whom`, `RM_User_ID`) VALUES
(1, 'Opening time tomorrow', '2020-07-18', '08:20:13.000000', 'Tomorrow restaurant will open at 7.00a.m. ', 'All Employees', 1),
(2, 'Employee of the month', '2020-11-28', '22:13:17.000000', 'Congratulations, Justin, Due to your excellent sales record, perfect attendance, and high evaluations from customers and coworkers, you have been selected as employee of the month. You will receive a plaque and a $100 American Express gift card when you are officially recognized at Monday\'s staff meeting. We look forward to acknowledging your achievements at Monday\'s meeting and appreciate the great example you set for other employees. Keep up the great work.', 'All Employees', 1),
(3, 'Seasonal holidays', '2020-11-29', '01:05:00.000000', 'Hi everyone, Our restaurant will be closed in the next weekend, Monday and Tuesday for Christmas. May this Christmas season bring lots of happiness to your life and make all of your wishes come true. Wishing very Happy Holidays to you and your family.', 'All Employees', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_id` int(100) NOT NULL,
  `Item_count` int(10) NOT NULL DEFAULT 0,
  `Sub_total` float NOT NULL DEFAULT 0,
  `User_ID` int(100) NOT NULL,
  `Special_notes` text DEFAULT NULL,
  `Order_type` varchar(10) DEFAULT NULL,
  `Order_is_for_me` tinyint(1) DEFAULT 1,
  `Service_date` date DEFAULT NULL,
  `Service_time` time DEFAULT NULL,
  `Service_address` varchar(255) DEFAULT NULL,
  `CreationDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Token_Payhere_Order_ID` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_id`, `Item_count`, `Sub_total`, `User_ID`, `Special_notes`, `Order_type`, `Order_is_for_me`, `Service_date`, `Service_time`, `Service_address`, `CreationDateTime`, `ModifiedDateTime`, `Token_Payhere_Order_ID`) VALUES
(60, 2, 670, 197, NULL, NULL, 1, NULL, NULL, NULL, '2021-03-28 14:10:05', '2021-03-28 14:16:47', NULL),
(77, 0, 0, 217, NULL, NULL, 1, NULL, NULL, NULL, '2021-03-31 13:07:07', '2021-03-31 13:07:07', NULL),
(87, 0, 0, 203, NULL, NULL, 1, NULL, NULL, NULL, '2021-03-31 23:53:12', '2021-03-31 23:53:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `Cart_id` int(100) NOT NULL,
  `CartItem_ID` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float DEFAULT 0,
  `CartItem_total` float NOT NULL,
  `Food_ID` int(100) NOT NULL,
  `CreationDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`Cart_id`, `CartItem_ID`, `Quantity`, `Price`, `Discount`, `CartItem_total`, `Food_ID`, `CreationDateTime`) VALUES
(0, 176, 1, 200, 0, 200, 67, '2021-03-26 15:48:34'),
(0, 177, 1, 150, 0, 150, 58, '2021-03-26 15:48:39'),
(0, 178, 1, 150, 0, 150, 58, '2021-03-26 15:48:40'),
(0, 179, 1, 150, 0, 150, 58, '2021-03-26 15:48:41'),
(60, 199, 1, 320, 0, 320, 64, '2021-03-28 14:13:04'),
(60, 200, 1, 350, 0, 350, 59, '2021-03-28 14:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `cashier_adds_to`
--

CREATE TABLE `cashier_adds_to` (
  `Food_ID` int(100) NOT NULL,
  `Cart_id` int(100) NOT NULL,
  `User_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(10) NOT NULL,
  `Category_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_name`) VALUES
(1, 'Food'),
(2, 'Drinks'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `Coupon_ID` int(100) NOT NULL,
  `Code` text DEFAULT NULL,
  `Type` varchar(40) NOT NULL,
  `CouponValue` float NOT NULL,
  `Start_Date` date NOT NULL,
  `Expiry_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dep_No` int(4) NOT NULL,
  `Dep_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dep_No`, `Dep_Name`) VALUES
(1, 'ManagementDepartment'),
(2, 'KitchenDepartment'),
(3, 'CashierDepartment'),
(4, 'DeliveryDepartment');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `Discount_ID` int(100) NOT NULL,
  `Dis_Percentage` float NOT NULL,
  `Valid_From` date NOT NULL,
  `Valid_Untill` date NOT NULL,
  `Minimum_Order_Value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `Favourite_ID` int(100) NOT NULL,
  `Food_ID` int(100) NOT NULL,
  `User_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`Favourite_ID`, `Food_ID`, `User_ID`) VALUES
(124, 2, 217),
(120, 10, 217),
(112, 11, 217),
(118, 58, 217);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fb_ID` int(100) NOT NULL,
  `Fb_date` date NOT NULL DEFAULT current_timestamp(),
  `First_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Experience` varchar(10) NOT NULL,
  `Fb_Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `Food_ID` int(10) NOT NULL,
  `Food_name` varchar(40) NOT NULL,
  `Unit_Price` float NOT NULL,
  `Description` text NOT NULL,
  `Availability` varchar(30) NOT NULL,
  `Current_count` int(10) NOT NULL DEFAULT 10,
  `Subcategory_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` (`Food_ID`, `Food_name`, `Unit_Price`, `Description`, `Availability`, `Current_count`, `Subcategory_ID`) VALUES
(1, 'Chicken Fried Rice', 490, 'Please note that vegetables may be substituted based on availability', 'Available', 10, 1),
(2, 'Mongolian Rice', 680, 'Mixed (Chicken and Seafood)', 'Available', 10, 1),
(3, 'Vegetables Fried Rice', 490, '', 'Available', 9, 1),
(4, 'Egg Fried Rice', 300, '', 'Available', 10, 1),
(5, 'Chopsuey Vegetables with Rice', 270, '', 'Available', 10, 1),
(6, 'Chopsuey Chicken with Rice', 450, '', 'Available', 10, 1),
(7, 'Chopsuey Fish with Rice', 300, '', 'Available', 10, 1),
(8, 'Chopsuey Sea Food with Rice', 350, '', 'Unavailable', 0, 1),
(9, 'Devilled Chicken ', 490, 'Devilled chicken in spicy sauce with a double layer of mozzarella cheese', 'Available', 10, 2),
(10, 'Sausage Delight', 490, 'Chicken sausages & onions with a double layer of mozzarella cheese\r\nPersonal-Rs.490\r\nMedium-Rs.940\r\nLarge-Rs.1,710', 'Available', 9, 2),
(11, 'Hot and Spicy Chicken', 555, 'Spicy chunks of chicken,capsicums & onions with a double layer of mozzarella cheese\r\nPersonal-Rs.555\r\nMedium-Rs.1,030\r\nLarge-Rs.1,880', 'Available', 9, 2),
(12, 'Hot Garlic Prawns', 735, 'Spicy prawns,hot garlic sauce,onions,peppers and tomatoes with double layer of mozzarella cheese\r\nPersonal-Rs.735\r\nMedium-Rs.1,410\r\nLarge-Rs.2,540', 'Available', 9, 2),
(13, 'Veggie Supreme', 590, 'Mushrooms,tomatoes,onions,black olives and bell peppers with a double layer of mozzarella cheese\r\nPersonal-Rs.590\r\nMedium-Rs.1,130\r\nLarge-Rs.2,070', 'Available', 10, 2),
(14, 'Chicken Pastry', 180, '', 'Available', 10, 3),
(15, 'Fish Pastry', 180, '', 'Available', 10, 3),
(16, 'Fish Roll', 90, '', 'Available', 10, 3),
(17, 'Vegetable Spiring Roll', 110, '', 'Available', 10, 3),
(18, 'Fish Pattie', 90, '', 'Available', 10, 3),
(19, 'Vegetable Pattie', 90, '', 'Available', 10, 3),
(20, 'Chicken Samosa', 120, '', 'Available', 10, 3),
(21, 'Prawn Samosa', 120, '', 'Available', 10, 3),
(22, 'Cheese Sandwich', 100, 'The Cheese Sandwich included sliced cheese,sandwiched with a slice of buttered bread \r\nA serving is 1 Triangle', 'Available', 10, 3),
(23, 'Tuna Sandwich', 280, 'The Tuna Sandwich includes a mixture of flaked tuna,green chilies,chopped onions and spices,sandwiched with triple layers of buttered half bread slices', 'Available', 10, 3),
(24, 'Chocolate Finger Gateaux(Chocolate Cake)', 4200, '1 kg', 'Available', 10, 4),
(25, 'Chocolate Chip(Chocolate Cake)', 2700, 'The chocolate chip cake is a square cake garnished with chocolate icing and ganache\r\n1 kg-Rs.2700\r\nPiece-160', 'Available', 10, 4),
(26, 'Chocolate Roll', 950, 'A childhood favorite and a rewarding treat. The Chocolate Roll consists of chocolate sponge and chocolate cream. Finished with a drizzle of chocolate ganache', 'Available', 10, 4),
(27, 'Coffee Cake', 1965, 'The Coffee Cake is rectangular in shape, and consists of two layers of coffee cake sandwiched with coffee icing, the cake is garnished with coffee icing, a border of gateaux cream, and sprinkled with cashew and a chocolate design\r\n2 kg-Rs.1960\r\nPiece-Rs.98', 'Available', 10, 4),
(28, 'Mixed Fruit Gateaux(Fruity Cake)', 3680, 'The Mixed Fruit gateaux is a round cake, comprising of two layers of syrup soaked vanilla sponge cake, sandwiched with custard - fresh cream, garnished with fruits & nuts\r\n1 kg-Rs.3680\r\nPiece-Rs.460', 'Available', 10, 4),
(29, 'Black Forest(Fruity Cake)', 4320, 'The Black Forest gateaux has two layers of \'sugar syrup soaked\' chocolate sponge, which is sandwiched with a layer of fresh cream and black cherries. Topped with a generous coating of fresh cream, the gateaux is decorated with grated chocolate and red cherries\r\n1 kg-Rs.4320\r\nPiece-Rs.360', 'Available', 10, 4),
(30, 'Baked Cheese Cake', 3100, 'The Baked Cheese cake has a base of marie biscuit which is then topped off with a cheese mixture and is baked.', 'Available', 10, 4),
(31, 'Kochchi Mac n Cheese', 480, 'Good ole mac ‘n’ cheese – this portion comes oozing with cheese and sizzling with kochchi chillies. Not for the faint at heart', 'Available', 10, 5),
(32, 'Chicken Bacon Mac \'n Cheese', 500, 'A filling portion of macaroni with molten cheese, teamed with lightly crisp and meaty pieces of chicken bacon', 'Available', 10, 5),
(33, 'Chicken Noodles ', 450, 'Long noodles with succulent and well-flavored chicken chunks, carrot, spring onion and herbs', 'Available', 10, 5),
(34, 'Penne Arabiata', 480, 'Creamy penne pasta with cherry tomato, tomato puree, parmesan cheese, dried oregano, thyme and chilli flakes.\r\n\r\nIngredients:Penne Pasta, Chilli Flakes, Dried Oregano, Thyme, Cherry Tomato, Tomato Puree, Parmesan Cheese', 'Available', 10, 5),
(35, 'Chicken Biriyani Sawan(Large)', 5200, 'A mouthwatering chicken biriyani sawan with four accompaniments and dessert.\r\n\r\nAccompaniments include a malay pickle, cashew curry, maldive fish sambal and pineapple. Not forgetting a full roast chicken for the large sawan and a half roast chicken for the small sawan', 'Available', 10, 6),
(36, 'Chicken Biriyani', 620, '', 'Available', 10, 6),
(37, 'Vegetable Biriyani', 560, '', 'Available', 10, 6),
(38, 'Fish Biriyani', 750, '', 'Available', 10, 6),
(39, 'Ham and Egg Bun', 150, '', 'Available', 10, 7),
(40, 'Tuna Bun', 120, '', 'Available', 10, 7),
(41, 'Sausage Bun', 100, '', 'Available', 10, 7),
(42, 'Hot Dog Bun', 420, 'A yummy chicken sausage, fresh iceberg lettuce and onion, with a killer combination of tomato sauce and lemon mustard dressing\r\n', 'Available', 10, 7),
(43, 'Cheese Bun', 200, '', 'Available', 10, 7),
(44, 'Chocolate Bun', 150, '', 'Available', 10, 7),
(45, 'Matcha Latte\'', 250, '\r\nOur Matcha Latte brims with so matcha flavour and goodness, it’s easy to understand why everyone shows it such a latte love', 'Available', 10, 8),
(46, 'Vanilla Caramel Latte ', 450, 'Coffee and fresh milk mixed with fresh vanilla', 'Unavailable', 0, 8),
(47, 'Yaara Kopi (Iced)', 290, 'Pulled milk coffee , well-aired and frothed up in the process, served with ice', 'Available', 10, 8),
(48, 'Iced Coffee', 400, 'Everybody\'s favourite at some point of time - milk coffee on the rocks', 'Available', 10, 8),
(49, 'Orange Juice', 180, '', 'Available', 10, 9),
(50, 'Apple Juice', 200, '', 'Available', 10, 9),
(51, 'Lime Juice', 180, '', 'Available', 9, 9),
(52, 'Pineapple Juice', 180, '', 'Available', 10, 9),
(53, 'Water Melon Juice', 180, '', 'Available', 10, 9),
(54, 'Milo', 100, '', 'Available', 10, 10),
(55, 'Iced Lemon Tea', 150, '', 'Available', 10, 10),
(56, 'Iced Cappuccino', 150, '', 'Available', 10, 10),
(57, 'Strawberry Milk Shake', 150, '', 'Available', 10, 11),
(58, 'Chocolate Milk Shake', 150, '', 'Unavailable', 0, 11),
(59, 'Hot Chocolate', 350, 'A warm and rich milky favourite, prepared with a generous proportion of the finest chocolate', 'Available', 10, 12),
(60, 'Rose With French Vanilla', 220, 'Pure Ceylon tea infused with rose petals and buds, and notes of natural vanilla', 'Available', 2, 12),
(61, 'Milk Tea', 200, 'A brew of Dilmah Exceptional tea, perfectly balanced with just the right amount of fresh milk', 'Available', 10, 12),
(62, 'Yaara Tea', 200, 'Pulled milk tea, well-aired and frothed up to enhance your taste experience', 'Available', 10, 12),
(63, 'Vanilla ice Cream with Oreo and Caramel', 380, 'Smooth, home-made ice cream, richly flavoured with real vanilla beans, dressed with gooey caramel sauce and topped with Oreo biscuit', 'Available', 10, 13),
(64, 'Avocado Ice cream', 320, '\r\nSmooth, home-made ice cream, richly flavored with real avocado and topped with ‘pani cadju’ pieces for a bit of crunch', 'Available', 10, 13),
(65, 'Chocolate Biscuit Pudding', 190, 'The Biscuit Pudding is prepared in a 100ml transparent cup and consists of three Layers of \'cold milk soaked\' marie biscuits, sandwiched together with chocolate cream and topped off with cream and garnished with pieces of cashew', 'Available', 10, 14),
(66, 'Egg Pudding', 150, 'Delighting dish made up of eggs and milk', 'Available', 10, 14),
(67, 'Layered Chocolate Pudding', 200, '', 'Available', 2, 14),
(68, 'Caramel Custard ', 200, '1 each: 259 calories, 7g fat (3g saturated fat), 172mg cholesterol, 92mg sodium, 42g carbohydrate (41g sugars, 0 fiber), 8g protein', 'Available', 9, 14),
(69, 'Chocolate Chip Muffin', 300, 'A dense chocolate muffin spruced up with chunky chocolate chips', 'Available', 10, 15),
(70, 'Raspberry White Chocolate Muffin', 280, 'Bits of tangy raspberry perfectly complement the sweetness of this white chocolate muffin', 'Available', 10, 15),
(71, 'Raspberry Cheesecake', 350, 'The very mobile Raspberry Cheescake,lovingly tucked into cups so you can take it or have it anywhere you want  ', 'Available', 10, 16),
(72, 'Caramel Cheesecake', 390, 'Everyone\'s favourite take-home Cheesecake in its glorious Caramel form', 'Available', 10, 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(100) NOT NULL,
  `Order_Date_Time` datetime(6) NOT NULL,
  `Item_count` int(10) NOT NULL,
  `Total_price` float NOT NULL,
  `Special_notes` text DEFAULT NULL,
  `Service_charge` float DEFAULT NULL,
  `Payment_method` enum('cash','payhere') NOT NULL DEFAULT 'cash',
  `Order_status` enum('onqueue','processing','ready','dispatched','delivery_new','delivery_ondelivery','delivery_dispatched','done') NOT NULL DEFAULT 'onqueue',
  `Order_type` enum('dine-in','pick-up','delivery') NOT NULL,
  `Kitchen_Manager` int(100) DEFAULT NULL,
  `Kitchen_Dispatch_DateTime` datetime DEFAULT NULL,
  `Delivery_Address` varchar(200) DEFAULT NULL,
  `Delivery_Person` int(100) DEFAULT NULL,
  `Delivery_Dispatch_DateTime` datetime DEFAULT NULL,
  `Order_is_for_me` tinyint(1) NOT NULL DEFAULT 1,
  `User_ID` int(100) NOT NULL,
  `isCashier` tinyint(4) NOT NULL DEFAULT 0,
  `Coupon_ID` int(100) DEFAULT NULL,
  `Discount_ID` int(100) DEFAULT NULL,
  `CreationDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Order_Date_Time`, `Item_count`, `Total_price`, `Special_notes`, `Service_charge`, `Payment_method`, `Order_status`, `Order_type`, `Kitchen_Manager`, `Kitchen_Dispatch_DateTime`, `Delivery_Address`, `Delivery_Person`, `Delivery_Dispatch_DateTime`, `Order_is_for_me`, `User_ID`, `isCashier`, `Coupon_ID`, `Discount_ID`, `CreationDateTime`, `ModifiedDateTime`) VALUES
(16, '2021-02-08 11:11:00.000000', 3, 1186.5, '', 56.5, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'flower rd$ Colombo 3', 198, '2021-03-31 01:52:59', 1, 1, 0, NULL, NULL, '2021-02-08 23:22:55', '2021-02-08 23:22:55'),
(21, '2021-02-09 12:33:00.000000', 2, 1701, '', 81, 'payhere', 'done', 'pick-up', 202, '2021-03-30 22:14:05', '', NULL, NULL, 1, 217, 0, NULL, NULL, '2021-02-09 02:51:00', '2021-02-09 02:51:00'),
(22, '2021-02-09 14:59:00.000000', 1, 231, '', 11, 'cash', 'done', 'dine-in', 202, NULL, '', NULL, NULL, 1, 4, 0, NULL, NULL, '2021-02-09 02:59:54', '2021-02-09 02:59:54'),
(23, '2021-02-09 15:03:00.000000', 1, 1260, '', 60, 'payhere', 'done', 'dine-in', 202, '2021-03-30 22:14:04', '', NULL, NULL, 1, 2, 0, NULL, NULL, '2021-02-09 03:03:41', '2021-02-09 03:03:41'),
(24, '2021-02-09 18:27:00.000000', 1, 840, '', 40, 'cash', 'done', 'pick-up', 202, '2021-03-30 22:14:05', '', NULL, NULL, 1, 217, 0, NULL, NULL, '2021-02-09 17:27:36', '2021-02-09 17:27:36'),
(34, '2021-02-14 13:10:00.000000', 2, 2850.75, 'double cheese for pizza', 135.75, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'temple rd$ Maharagama', 198, '2021-03-31 01:53:22', 1, 197, 0, NULL, NULL, '2021-02-14 01:09:47', '2021-02-14 01:09:47'),
(37, '2021-03-20 08:27:00.000000', 2, 514.5, '', 24.5, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'Maharagama Town$ Maharagama$ Sri Lanka', 198, '2021-03-31 01:53:27', 1, 6, 0, NULL, NULL, '2021-03-20 20:27:33', '2021-03-20 20:27:33'),
(38, '2021-03-21 12:03:00.000000', 2, 850.5, '', 40.5, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'Temple Road$ Maharagama$ Sri Lanka', 198, '2021-03-30 22:16:38', 1, 5, 0, NULL, NULL, '2021-03-22 00:03:09', '2021-03-22 00:03:09'),
(39, '2021-03-22 12:48:00.000000', 3, 2640.75, '', 125.75, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'Sri Devananda Road$ Maharagama$ Sri Lanka', 198, '2021-03-30 22:16:39', 1, 4, 0, NULL, NULL, '2021-03-22 00:48:34', '2021-03-22 00:48:34'),
(40, '2021-03-22 12:51:00.000000', 1, 1344, '', 64, 'cash', 'done', 'pick-up', 202, '2021-03-30 22:14:06', '', NULL, NULL, 1, 14, 0, NULL, NULL, '2021-03-22 00:51:24', '2021-03-22 00:51:24'),
(41, '2021-03-22 12:56:00.000000', 1, 1748.25, '', 83.25, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'Temple Road$ Maharagama$ Sri Lanka', 19, '2021-03-31 01:53:33', 1, 17, 0, NULL, NULL, '2021-03-22 00:56:44', '2021-03-22 00:56:44'),
(42, '2021-03-22 12:59:00.000000', 1, 336, '', 16, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:05', 'Temple Road$ Maharagama$ Sri Lanka', 19, '2021-03-31 01:53:38', 1, 1, 0, NULL, NULL, '2021-03-22 00:57:33', '2021-03-22 00:57:33'),
(43, '2021-03-22 12:04:00.000000', 1, 1470, '', 70, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Temple Road$ Maharagama$ Sri Lanka', 19, '2021-03-31 01:53:41', 1, 15, 0, NULL, NULL, '2021-03-22 00:59:29', '2021-03-22 00:59:29'),
(44, '2021-03-22 13:06:00.000000', 2, 1506.75, '', 71.75, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Temple Road$ Maharagama$ Sri Lanka', 198, '2021-03-30 22:16:40', 1, 5, 0, NULL, NULL, '2021-03-22 01:06:34', '2021-03-22 01:06:34'),
(45, '2021-03-22 13:12:00.000000', 2, 929.25, '', 44.25, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 198, '2021-03-30 22:16:41', 1, 3, 0, NULL, NULL, '2021-03-22 01:09:19', '2021-03-22 01:09:19'),
(46, '2021-03-22 13:10:00.000000', 2, 2478, '', 118, 'payhere', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 199, '2021-03-31 01:53:45', 1, 14, 0, NULL, NULL, '2021-03-22 01:11:06', '2021-03-22 01:11:06'),
(47, '2021-03-22 13:18:00.000000', 2, 829.5, '', 39.5, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 199, '2021-03-31 01:53:48', 1, 16, 0, NULL, NULL, '2021-03-22 01:18:39', '2021-03-22 01:18:39'),
(48, '2021-03-22 13:19:00.000000', 2, 472.5, '', 22.5, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 198, '2021-03-30 22:16:41', 1, 4, 0, NULL, NULL, '2021-03-22 01:19:54', '2021-03-22 01:19:54'),
(49, '2021-03-22 13:21:00.000000', 2, 777, '', 37, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 199, '2021-03-31 01:53:51', 1, 2, 0, NULL, NULL, '2021-03-22 01:21:05', '2021-03-22 01:21:05'),
(50, '2021-03-22 13:22:00.000000', 2, 1107.75, '', 52.75, 'cash', 'done', 'delivery', 202, '2021-03-30 22:14:06', 'Maharagama$ Sri Lanka', 198, '2021-03-31 01:53:54', 1, 6, 0, NULL, NULL, '2021-03-22 01:22:50', '2021-03-22 01:22:50'),
(51, '2021-03-22 13:26:00.000000', 2, 3512.25, '', 167.25, 'cash', 'done', 'delivery', 202, '2021-03-31 01:52:11', 'Temple Road$ Maharagama$ Sri Lanka', 198, '2021-03-31 01:53:58', 1, 217, 0, NULL, NULL, '2021-03-22 01:26:30', '2021-03-22 01:26:30'),
(52, '2021-03-22 13:28:00.000000', 4, 2483.25, '', 118.25, 'cash', 'done', 'delivery', 202, '2021-03-31 01:52:22', 'Temple Road$ Maharagama$ Sri Lanka', 19, '2021-03-31 01:54:01', 1, 17, 0, NULL, NULL, '2021-03-22 01:28:39', '2021-03-22 01:28:39'),
(53, '2021-03-22 13:34:00.000000', 2, 929.25, '', 44.25, 'cash', 'done', 'delivery', 202, '2021-03-31 01:52:33', 'Maharagama$ Sri Lanka', 198, '2021-03-31 09:41:25', 1, 18, 0, NULL, NULL, '2021-03-22 01:34:09', '2021-03-22 01:34:09'),
(54, '2021-03-22 13:39:00.000000', 2, 672, '', 32, 'payhere', 'done', 'delivery', 202, '2021-03-31 01:52:38', 'Temple Road$ Maharagama$ Sri Lanka', 19, '2021-03-31 01:54:03', 1, 15, 0, NULL, NULL, '2021-03-22 01:39:50', '2021-03-22 01:39:50'),
(97, '2021-03-31 13:35:00.000000', 2, 3512.25, '', 167.25, 'cash', 'done', 'delivery', 202, NULL, 'Temple Road$ Maharagama$ Sri Lanka', 198, '2021-03-31 09:41:26', 1, 217, 0, NULL, NULL, '2021-03-31 13:05:00', '2021-03-31 13:05:00'),
(98, '2021-03-31 14:06:00.000000', 1, 210, '', 10, 'payhere', 'done', 'dine-in', 202, '2021-03-31 09:38:43', '', NULL, NULL, 1, 217, 0, NULL, NULL, '2021-03-31 13:07:07', '2021-03-31 13:07:07'),
(106, '2021-03-31 23:53:12.000000', 1, 1029, '', 49, 'cash', 'onqueue', 'dine-in', NULL, NULL, NULL, NULL, NULL, 1, 203, 0, NULL, NULL, '2021-03-31 23:53:12', '2021-03-31 23:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `Order_Item_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Food_ID` int(11) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Price` float NOT NULL,
  `Food_Discount` float NOT NULL DEFAULT 0,
  `CreatedDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`Order_Item_ID`, `Order_ID`, `Food_ID`, `Quantity`, `Price`, `Food_Discount`, `CreatedDateTime`) VALUES
(28, 16, 64, 1, 320, 0, '2021-02-08 23:22:55'),
(29, 16, 64, 1, 320, 0, '2021-02-08 23:22:55'),
(30, 16, 3, 1, 490, 0, '2021-02-08 23:22:55'),
(31, 21, 58, 1, 150, 0, '2021-02-09 02:51:00'),
(32, 21, 10, 3, 490, 0, '2021-02-09 02:51:00'),
(33, 22, 60, 1, 220, 0, '2021-02-09 02:59:54'),
(34, 23, 9, 2, 490, 0, '2021-02-09 03:03:41'),
(35, 24, 67, 4, 200, 0, '2021-02-09 17:27:36'),
(48, 34, 59, 3, 350, 0, '2021-02-14 01:09:47'),
(49, 34, 11, 3, 555, 0, '2021-02-14 01:09:47'),
(53, 37, 60, 1, 220, 0, '2021-03-20 20:27:33'),
(54, 37, 5, 1, 270, 0, '2021-03-20 20:27:34'),
(55, 38, 64, 1, 320, 0, '2021-03-22 00:03:09'),
(56, 38, 1, 1, 490, 0, '2021-03-22 00:03:09'),
(57, 39, 12, 1, 735, 0, '2021-03-22 00:48:34'),
(58, 39, 63, 1, 380, 0, '2021-03-22 00:48:34'),
(59, 39, 70, 5, 280, 0, '2021-03-22 00:48:35'),
(60, 40, 64, 4, 320, 0, '2021-03-22 00:51:24'),
(61, 41, 11, 3, 555, 0, '2021-03-22 00:56:44'),
(62, 42, 64, 1, 320, 0, '2021-03-22 00:57:33'),
(63, 43, 70, 5, 280, 0, '2021-03-22 00:59:29'),
(64, 44, 59, 2, 350, 0, '2021-03-22 01:06:35'),
(65, 44, 12, 1, 735, 0, '2021-03-22 01:06:35'),
(66, 45, 58, 1, 150, 0, '2021-03-22 01:09:20'),
(67, 45, 12, 1, 735, 0, '2021-03-22 01:09:20'),
(68, 46, 27, 1, 1960, 0, '2021-03-22 01:11:06'),
(69, 46, 62, 2, 200, 0, '2021-03-22 01:11:06'),
(70, 47, 13, 1, 590, 0, '2021-03-22 01:18:40'),
(71, 47, 62, 1, 200, 0, '2021-03-22 01:18:40'),
(72, 48, 58, 1, 150, 0, '2021-03-22 01:19:55'),
(73, 48, 4, 1, 300, 0, '2021-03-22 01:19:55'),
(74, 49, 58, 1, 150, 0, '2021-03-22 01:21:05'),
(75, 49, 13, 1, 590, 0, '2021-03-22 01:21:05'),
(76, 50, 12, 1, 735, 0, '2021-03-22 01:22:50'),
(77, 50, 64, 1, 320, 0, '2021-03-22 01:22:50'),
(78, 51, 12, 3, 735, 0, '2021-03-22 01:26:30'),
(79, 51, 63, 3, 380, 0, '2021-03-22 01:26:30'),
(80, 52, 10, 1, 490, 0, '2021-03-22 01:28:39'),
(81, 52, 11, 1, 555, 0, '2021-03-22 01:28:39'),
(82, 52, 67, 1, 200, 0, '2021-03-22 01:28:40'),
(83, 52, 70, 4, 280, 0, '2021-03-22 01:28:40'),
(84, 53, 58, 1, 150, 0, '2021-03-22 01:34:10'),
(85, 53, 12, 1, 735, 0, '2021-03-22 01:34:10'),
(86, 54, 58, 1, 150, 0, '2021-03-22 01:39:51'),
(87, 54, 3, 1, 490, 0, '2021-03-22 01:39:51'),
(160, 97, 12, 3, 735, 0, '2021-03-31 13:05:00'),
(161, 97, 63, 3, 380, 0, '2021-03-31 13:05:00'),
(162, 98, 68, 1, 200, 0, '2021-03-31 13:07:07'),
(176, 106, 1, 2, 490, 0, '2021-03-31 23:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `other_recipient`
--

CREATE TABLE `other_recipient` (
  `Cart_ID` int(100) DEFAULT NULL,
  `Order_ID` int(100) DEFAULT NULL,
  `Recipient_ID` int(10) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone_Number` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payhere_order_status`
--

CREATE TABLE `payhere_order_status` (
  `Payhere_ID` int(100) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Order_ID` text NOT NULL,
  `Status` enum('success','failure') NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payhere_order_status`
--

INSERT INTO `payhere_order_status` (`Payhere_ID`, `User_ID`, `Order_ID`, `Status`, `DateTime`) VALUES
(8, 217, '6103ebfa5b3c17ffbdf02bf27a2b5116', 'success', '2021-02-08 00:16:30'),
(12, 217, 'dc6a37995a9b24697f3e0f94a4d90c71', 'success', '2021-02-09 02:18:30'),
(13, 217, 'e64faca75b5de1f6d9979ed6e60cb323', 'success', '2021-02-09 03:16:30'),
(19, 217, '7d042dd5f2b821c537b5580fca8b169e', 'success', '2021-02-14 00:29:43'),
(20, 217, 'f59a50b4c6b564394eb90c09319000d0', 'success', '2021-02-14 01:03:09'),
(26, 217, '08588d4a384f96453865f8704da07aba', 'success', '2021-03-31 13:07:07'),
(27, 230, '473154191347cdf662629f415fc50f9e', 'success', '2021-03-31 18:58:47'),
(29, 232, '50f45eaa0eb4a87c81818a18c0464ac8', 'success', '2021-03-31 23:44:16'),
(30, 232, '120a7efc90e69a3bd7aa3e2f943c854d', 'success', '2021-04-01 01:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `Subcategory_ID` int(10) NOT NULL,
  `Subcategory_name` varchar(100) NOT NULL,
  `Category_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`Subcategory_ID`, `Subcategory_name`, `Category_ID`) VALUES
(1, 'Rice', 1),
(2, 'Pizza', 1),
(3, 'Savouries', 1),
(4, 'Cakes', 1),
(5, 'NoodlesPastas', 1),
(6, 'Biriyani', 1),
(7, 'Buns', 1),
(8, 'Coffee', 2),
(9, 'FreshFruitJuice', 2),
(10, 'IceBlended', 2),
(11, 'MilkShakes', 2),
(12, 'Tea', 2),
(13, 'IceCreams', 3),
(14, 'CustardsandPuddings', 3),
(15, 'Muffins', 3),
(16, 'CheeseCakes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(100) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  `User_role` enum('customer','kitchen_manager','cashier','delivery_person','restaurant_manager') NOT NULL DEFAULT 'customer',
  `Phone_no` bigint(15) DEFAULT NULL,
  `Token` text NOT NULL,
  `User_status` varchar(30) DEFAULT 'inactive',
  `Email_address` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Postal_Code` int(10) DEFAULT NULL,
  `Registered_date` date NOT NULL,
  `DateTime_LastLoginAttempt` datetime DEFAULT NULL,
  `isAssignedCart` tinyint(1) NOT NULL DEFAULT 0,
  `Dep_No` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Password`, `User_name`, `User_role`, `Phone_no`, `Token`, `User_status`, `Email_address`, `AddressLine1`, `AddressLine2`, `City`, `Postal_Code`, `Registered_date`, `DateTime_LastLoginAttempt`, `isAssignedCart`, `Dep_No`) VALUES
(1, '$2y$10$8v9.glgkB2YOfhVXkgiABuRhl7MRniffs3tmq7/B3CeOdk07zjlbm', 'Kamal', 'customer', 774561235, '', 'active', 'kamalvitharana@gmail.com', NULL, NULL, NULL, NULL, '2020-01-12', '2020-08-17 00:00:00', 0, 1),
(2, '$2y$10$TGobq8OmE6xJ8qJ2.pq7VOn3yPatOlqGMPilhH16p0TvB1igfrsym', 'Nishani', 'customer', 725465236, '', 'active', 'nishani@gmail.com', NULL, NULL, NULL, NULL, '2020-03-18', '2020-08-17 00:00:00', 0, 3),
(3, '$2y$10$VR80sBp.z1cbfIQvZj.F9etNR1cEoCQUx847Cp6OOHZn/XjNvblga', 'kavishan', 'customer', 782356235, '', 'active', 'kavishandeemantha@gmail.com', NULL, NULL, NULL, NULL, '2020-02-23', '2020-08-17 00:00:00', 0, 1),
(4, '$2y$10$RuAldg4LsRPCZmllbumTCOlYSkDXh6svRN62avmnQftRA/70WDy16', 'Nimantha', 'customer', 774561236, '', 'active', 'nimanthaudara@gmail.com', NULL, NULL, NULL, NULL, '2020-02-02', '2020-08-17 00:00:00', 0, 3),
(5, '$2y$10$YgSj3wQzsqiDL5zlX3XQ5exussuqBHu0nKWC6vlzKt6uGWRRBviHi', 'Shashika', 'customer', 771234565, '', 'active', 'shashika@gmail.com', NULL, NULL, NULL, NULL, '2020-02-23', '2020-07-20 00:00:00', 0, NULL),
(6, '$2y$10$EkA6a6zhTDLet.3F7LVBlug8Cm/iRgRIh5dUoR.zG00NLlH0XgfFK', 'Nikini', 'customer', 768562456, '', 'active', 'nikinitharu@gmail.com', NULL, NULL, NULL, NULL, '2020-01-12', '2020-08-10 00:00:00', 0, NULL),
(7, '$2y$10$kPcNVIyIjjLTfwrvfuBWEOr8yQY0KKCujTuFntb6ETb...\r\n', 'Kasun', 'customer', 784512653, '', 'active', 'kasundisanayaka@gmail.com', NULL, NULL, NULL, NULL, '2020-01-10', '2020-08-17 00:00:00', 0, 2),
(8, '$2y$10$IRnvApvIsMeoPI5MeeJ57OJFcBm1N4BmAAot5rqzUnBTqEiJQxvCC', 'Kumarasiri', 'customer', 704562869, '', 'block', 'sirikumara@gmail.com', NULL, NULL, NULL, NULL, '2020-03-18', '2020-08-11 00:00:00', 0, NULL),
(9, '$2y$10$IKIBGdw7s/SoqgFwHOB5/OIg0xldLPRzDw4gggfn7ol...\r\n', 'Prasanga', 'customer', 764587589, '', 'block', 'prasanga@gmail.com', NULL, NULL, NULL, NULL, '2020-02-02', '2020-05-23 00:00:00', 0, 4),
(10, '$2y$10$lRLGwNitsLs/9HGznqDko.05eL8zhPYDnjfIVwOpEr.QfgilBW/xe', 'Vishaka', 'customer', 784963568, '', 'active', 'vishakasenanayaka@gmail.com', NULL, NULL, NULL, NULL, '2020-03-20', '2020-08-20 00:00:00', 0, NULL),
(11, '$2y$10$TKtNk1LcqwnDUOIsLZHQmOtzFKjHCDhTHJBc4pXgT2s...\r\n', 'Mihira', 'customer', 757898569, '', 'active', 'mihiraidunil@gmail.com', NULL, NULL, NULL, NULL, '2020-02-25', '2020-08-10 00:00:00', 0, NULL),
(12, '$2y$10$cfOrGWGu3zz9ghgjK93aGehDrfJVY2fk4PtTGWTLVOc...\r\n', 'Kumudu', 'customer', 775636986, '', 'active', 'kumudu@gmail.com', NULL, NULL, NULL, NULL, '2020-02-23', '2020-08-17 00:00:00', 0, 4),
(13, '$2y$10$gVTEaKhvHOlHzlQ22jQPjuZbmXAg9Wx4BiaMSjrW0N3rhoyJOqFg2', 'Rmananayaka', 'customer', 717856985, '', 'block', 'rama@gmail.com', NULL, NULL, NULL, NULL, '2020-01-23', '2020-04-10 00:00:00', 0, NULL),
(14, '$2y$10$l7ibxqc/O2L4Jvs8Glri8OYsWS/qEsWYE2e3xsoKkylNgLTa3b8rG', 'Keshara', 'customer', 708965823, '', 'active', 'kesharasewwandi@gmail.com', NULL, NULL, NULL, NULL, '2020-01-05', '2020-08-17 00:00:00', 0, 3),
(15, '$2y$10$/zDSRYvbScXJN9/RuJfkYOItvUcDWY.zLqm0rVBNfE3gxgz2g7QZ2', 'Kamani', 'customer', 777785698, '', 'active', 'kamaniudayangani@gmail.com', NULL, NULL, NULL, NULL, '2020-03-15', '2020-08-10 00:00:00', 0, NULL),
(16, '$2y$10$XDeD61CIx4EAv8HwUJ/89..v5vxpbPAxTaqLv0pGGOLeJ286Hs8LO', 'Nayana', 'customer', 757412658, '', 'active', 'nayana@gmail.com', NULL, NULL, NULL, NULL, '2020-01-09', '2020-05-10 00:00:00', 0, NULL),
(17, '$2y$10$5iKBoRO3042jNW38HRV72uO2N1lTn57MIZPqYA7Dly8yQvXMiCq4O', 'Thilakasiri', 'customer', 774568523, '', 'active', 'thilakasiri@gmail.com', NULL, NULL, NULL, NULL, '2020-02-10', '2020-08-17 00:00:00', 0, 2),
(18, '$2y$10$hxvcffNbWVwEtkK8PSh4vekzjLEBWQYWvP80l.RsiPX8AYm5Rslm6', 'Sobitha', 'customer', 787856253, '', 'active', 'sobitha@gmail.com', NULL, NULL, NULL, NULL, '2020-03-21', '2020-07-25 00:00:00', 0, NULL),
(19, '$2y$10$KCJGqWtuV3XmUae/0ibY1.VYvUh1tjFQJyiKESKOHHkcOEc2GDI2W', 'Kalana', 'delivery_person', 707854623, '', 'active', 'kalanavidushanka@gmail.com', NULL, NULL, NULL, NULL, '2020-05-18', '2020-08-17 00:00:00', 0, 4),
(197, '$2y$10$8MgQc3Y2R34MtqO24MGK9eYrvwAwxW3qnFJ8zc3ml55JP2N9hbw9q', 'Sanduni', 'customer', 774859685, '', 'active', 'sf@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', '2021-03-28 14:00:17', 1, NULL),
(198, '$2y$10$NEKEDREvMVk.k2JR/z1Y.u7k2BNeyS.JJuLDeY5DIJD9PJCgkvYhu', 'Udani', 'delivery_person', 784563256, '', 'active', 'udani@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', '2021-03-31 13:09:18', 0, NULL),
(199, '$2y$10$urlmmXezCMAExApf0uFFuegW.7UuxebQQD/U2dd08G0efIfubU1LW', 'Pramith', 'delivery_person', 789856894, '', 'active', 'lk@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', NULL, 0, NULL),
(200, '$2y$10$eh2I81mcACg2yCiWIj/7BuptZYdMPVHNTT1UXu4AajLLHvt7BXLtu', 'Imesha', 'restaurant_manager', 778985682, '', 'active', 'imesha@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', '2021-04-01 00:07:18', 0, NULL),
(201, '$2y$10$vefN0s4vy9OEaKvbafNOa.aU0nSe.62rWq3VnP/R0AIaZqXJpbl1u', 'Sanduni', 'customer', 768985681, '', 'active', 'po@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', '2020-11-22 22:19:03', 0, NULL),
(202, '$2y$10$kVlzn1I6N03OrtNOQMU/seqI/MMdQE6m7kpBLa5WJMTIHULbKfF6q', 'Yeshan', 'kitchen_manager', 774856253, '', 'active', 'yeshan@gmail.com', NULL, NULL, NULL, NULL, '2020-11-10', '2021-06-08 17:55:43', 0, NULL),
(203, '$2y$10$rQ.m36Dp56Zh14PG2K5U2e0xfZTj17ejTGMCN4sGmW4RAgDHfIYwS', 'Chenuka', 'cashier', 7894561255, '', 'active', 'chenuka@gmail.com', NULL, NULL, NULL, NULL, '2020-11-13', '2021-03-31 23:51:51', 1, NULL),
(206, '$2y$10$4vjDa3X7Zv/awQqHqsHKl.oI5VOv/4qxi8hiqEG1OpoFhWVbTL4Wq', 'sirimath', 'customer', 123456789, '', 'active', '4321yeshan@gmail.com', NULL, NULL, NULL, NULL, '2020-11-20', '2020-11-28 10:27:01', 0, NULL),
(208, '$2y$12$qS3FjLZE/PGk8oEPAeyuOOcgWFfeaU91QzWb2aWDQhbv.9Ux5L2qG', 'Kamal', 'customer', 774567895, '67e0cabea76c0e6af88ce0f322c217e7', 'inactive', 'kamal@gmail.com', NULL, NULL, NULL, NULL, '2020-11-29', NULL, 0, NULL),
(209, '$2y$12$N04ntNFlD9oIO86FYnQ0YuKU8UHMiFv6CLiv94NVaVs3UR5ckAyWi', 'Nishani', 'customer', 789456596, '', 'active', 'nishanii@gmail.com', NULL, NULL, NULL, NULL, '2020-11-29', '2020-12-01 15:07:45', 0, NULL),
(217, '$2y$12$xwTCewzmBKZaMRK9VGEtyO731yjgef2e11pPUeoBDAYZAhMNkg.Wy', 'Buddhini', 'customer', 714856582, '', 'active', 'buddhini@gmail.com', NULL, NULL, NULL, NULL, '2021-01-18', '2021-06-08 17:55:31', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Announcement_id`),
  ADD KEY `User_ID` (`RM_User_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_id`),
  ADD KEY `cart_user` (`User_ID`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`CartItem_ID`),
  ADD KEY `Food_ID` (`Food_ID`);

--
-- Indexes for table `cashier_adds_to`
--
ALTER TABLE `cashier_adds_to`
  ADD PRIMARY KEY (`Food_ID`,`Cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`Coupon_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dep_No`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`Discount_ID`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`Favourite_ID`),
  ADD UNIQUE KEY `Food_ID` (`Food_ID`,`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fb_ID`) USING BTREE;

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`Food_ID`),
  ADD KEY `Subcategory_ID` (`Subcategory_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Discount_ID` (`Discount_ID`),
  ADD KEY `Coupon_ID` (`Coupon_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `kitchen_manager_fk` (`Kitchen_Manager`),
  ADD KEY `delivery_person_fk` (`Delivery_Person`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`Order_Item_ID`),
  ADD KEY `order_id_fk` (`Order_ID`),
  ADD KEY `food_id_fk` (`Food_ID`);

--
-- Indexes for table `other_recipient`
--
ALTER TABLE `other_recipient`
  ADD PRIMARY KEY (`Recipient_ID`),
  ADD UNIQUE KEY `Cart_ID` (`Cart_ID`),
  ADD KEY `user_fk` (`User_ID`),
  ADD KEY `order_fk` (`Order_ID`);

--
-- Indexes for table `payhere_order_status`
--
ALTER TABLE `payhere_order_status`
  ADD PRIMARY KEY (`Payhere_ID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Subcategory_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Dep_No` (`Dep_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Announcement_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `CartItem_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `Favourite_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fb_ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `Food_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `Order_Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `other_recipient`
--
ALTER TABLE `other_recipient`
  MODIFY `Recipient_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payhere_order_status`
--
ALTER TABLE `payhere_order_status`
  MODIFY `Payhere_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Subcategory_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `RM_ID_ibfk_1` FOREIGN KEY (`RM_User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `fooditem` (`Food_ID`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `fooditem` (`Food_ID`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD CONSTRAINT `subcat_fk` FOREIGN KEY (`Subcategory_ID`) REFERENCES `subcategory` (`Subcategory_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `delivery_person_fk` FOREIGN KEY (`Delivery_Person`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `kitchen_manager_fk` FOREIGN KEY (`Kitchen_Manager`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Discount_ID`) REFERENCES `discount` (`Discount_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Coupon_ID`) REFERENCES `coupon` (`Coupon_ID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `food_id_fk` FOREIGN KEY (`Food_ID`) REFERENCES `fooditem` (`Food_ID`),
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`);

--
-- Constraints for table `other_recipient`
--
ALTER TABLE `other_recipient`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`Dep_No`) REFERENCES `department` (`Dep_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
