-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2024 at 07:05 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.0.33-74+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE `widget` (
  `widget_id` int NOT NULL,
  `tab_name` enum('Sales','Account','PurchaseGRN','Stores','Production','BusinessAnalytics','Quality','Subcon') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `widget_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `widget_type` enum('Block','SingleBar','DoubleBar','Pie','SemiCircle','SingleColumnBar','Table','Spline','ImageBlock') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `widget_funtion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`widget_id`, `tab_name`, `widget_name`, `widget_type`, `widget_funtion`, `status`) VALUES
(1, 'Sales', 'TODAY_SALES', 'Block', 'get_today_sales', 'Active'),
(2, 'Sales', 'YESTERDAYS_SALES', 'Block', 'get_yesterdays_sales', 'Active'),
(5, 'Sales', 'CURRENT_MONTH_PLAN', 'ImageBlock', 'get_current_month_plan', 'Active'),
(6, 'Sales', 'CURRENT_MONTH_SALE', 'Block', 'get_current_month_sale', 'Active'),
(7, 'Sales', 'CUSTOMER_SALES', 'Pie', 'get_customer_sales', 'Active'),
(8, 'Sales', 'MONTH_WISE_SALES', 'SingleBar', 'get_month_wise_sales', 'Active'),
(9, 'Sales', 'PRODUCT_DELIVERY', 'SemiCircle', 'get_production_product', 'Active'),
(10, 'Sales', 'PRODUCTION_STOCK', 'SingleColumnBar', 'get_production_stock', 'Active'),
(11, 'Account', 'TOTAL_PAYABLE_DUE', 'Block', 'get_total_payable_due', 'Active'),
(12, 'Account', 'TOTAL_PAYABLE_PAID', 'Block', 'get_total_payable_paid', 'Active'),
(13, 'Account', 'TOTAL_RECEIVABLES_DUE', 'Block', 'get_total_receivable_due', 'Active'),
(14, 'Account', 'TOTAL_RECEIVABLES_PAID', 'Block', 'get_total_receivable_paid', 'Active'),
(15, 'Account', 'CUSTOMER_RECEIVER_DUE', 'Pie', 'get_customer_receiver_due', 'Active'),
(16, 'Account', 'SALES_PLAN_AMOUNT_GST', 'DoubleBar', 'get_sales_plane_amount_gst', 'Active'),
(17, 'Sales', 'FY_PLAN_VS_SALES', 'DoubleBar', 'get_paln_sales_data', 'Active'),
(18, 'Account', 'CUSTOMER_RECEIVER_DUE_LIST', 'Table', 'get_cutomer_receiver_due_list', 'Active'),
(19, 'PurchaseGRN', 'CATEGORY_PURCHASE_AMOUNT', 'Pie', 'get_caterory_purchse_amount', 'Active'),
(20, 'PurchaseGRN', 'CASH_PURCHASE_AMOUNT', 'SingleBar', 'get_cash_purchase_amount', 'Active'),
(21, 'PurchaseGRN', 'PURCHASE_GRN_AMOUNT', 'SingleBar', 'get_purchase_grn_amount', 'Active'),
(22, 'Stores', 'PURCHASE_STOCK_AMOUNT', 'Block', 'get_purchase_stock_amount', 'Active'),
(23, 'Stores', 'IN_HOUSE_PARTS_STOCK', 'Block', 'get_in_house_parts_stock', 'Active'),
(24, 'Stores', 'FG_STOCK', 'Block', 'get_fg_stock', 'Active'),
(25, 'Stores', 'PURCHASE_STOCK', 'SingleBar', 'get_purchase_stock_amount_bar', 'Active'),
(26, 'Stores', 'SUBCON_STOCK', 'Block', 'get_store_subcon_stock', 'Active'),
(27, 'Production', 'PRODUCTION', 'Spline', 'get_production_data', 'Active'),
(28, 'Production', 'YESTERDAYS_PRODUCTION', 'Block', 'get_yesterdays_production', 'Active'),
(29, 'Production', 'YESTERDAYS_REJECTION', 'Block', 'get_yesterdays_rejection', 'Active'),
(30, 'Production', 'YESTERDAYS_OEE', 'Block', 'get_yesterday_oee', 'Active'),
(31, 'Production', 'YESTERDAYS_PPM', 'Block', 'get_yesterdays_ppm', 'Active'),
(32, 'Production', 'PRODUCTION_SCRAP', 'SingleBar', 'get_production_scrap', 'Active'),
(33, 'Production', 'PRODUCTION_OEE', 'SingleBar', 'get_production_oee', 'Active'),
(34, 'BusinessAnalytics', 'RECEIVABLE_DUE', 'Block', 'get_receivable_due_data', 'Active'),
(35, 'BusinessAnalytics', 'PAYABLE_DUE', 'Block', 'get_payable_due_data', 'Active'),
(36, 'BusinessAnalytics', 'SALES_VS_PURCASE', 'DoubleBar', 'get_sales_purchase_grn', 'Active'),
(37, 'BusinessAnalytics', 'RMSP', 'SingleBar', 'get_rmsp', 'Active'),
(38, 'Quality', 'IN_HOUSE_PPM', 'SingleBar', 'get_in_house_ppm', 'Active'),
(39, 'Quality', 'IN_HOUSE_REJECTION', 'SingleBar', 'get_in_house_rejection', 'Active'),
(40, 'Quality', 'IN_WARD_PPM', 'SingleBar', 'get_inward_ppm', 'Active'),
(41, 'Quality', 'CUSTOMER_PPM', 'SingleBar', 'get_customer_ppm', 'Active'),
(42, 'Quality', 'CUSTOMER_COMPLAINT', 'SemiCircle', 'get_customer_complaint', 'Active'),
(43, 'Subcon', 'SUBCON_STOCKS', 'Pie', 'get_subcon_stocks', 'Active'),
(44, 'PurchaseGRN', 'PURCHASE_GRN', 'ImageBlock', 'get_purchase_grn', 'Active'),
(45, 'Subcon', 'SUBCON_TOTAL_STOCKS', 'ImageBlock', 'get_subcon_total_stock', 'Active'),
(46, 'Sales', 'FY_TOTAL_SALES', 'Block', 'get_fy_total_sales', 'Active'),
(47, 'Sales', 'CUSTOMER_SALES_AMOUNT', 'Table', 'get_cutomer_sales_amount', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`widget_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
  MODIFY `widget_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;