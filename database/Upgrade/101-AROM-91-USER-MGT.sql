-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 11:43 PM
-- Server version: 8.0.39-0ubuntu0.20.04.1
-- PHP Version: 7.0.33-75+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo-plastic`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `group_master_id` int NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_code` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`group_master_id`, `group_name`, `group_code`, `status`) VALUES
(1, 'Admin', 'Admin', 'Active'),
(2, 'AROM', 'AROM', 'Active'),
(5, 'Purchase', 'purchase', 'Active'),
(6, 'Sales', 'sales', 'Active'),
(7, 'Quality', 'quality', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `group_rights`
--

CREATE TABLE `group_rights` (
  `group_rights_id` int NOT NULL,
  `group_master_id` int NOT NULL,
  `menu_master_id` int NOT NULL,
  `list` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'No',
  `add` enum('Yes','No') NOT NULL DEFAULT 'No',
  `update` enum('Yes','No') NOT NULL DEFAULT 'No',
  `delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `export` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `group_rights`
--

INSERT INTO `group_rights` (`group_rights_id`, `group_master_id`, `menu_master_id`, `list`, `add`, `update`, `delete`, `export`) VALUES
(18, 2, 2, 'No', 'Yes', 'Yes', 'No', 'No'),
(19, 2, 3, 'No', 'Yes', 'No', 'No', 'No'),
(46, 6, 1, 'No', 'Yes', 'No', 'No', 'No'),
(47, 7, 1, 'Yes', 'Yes', 'No', 'No', 'No'),
(48, 7, 3, 'Yes', 'No', 'No', 'No', 'No'),
(115, 5, 1, 'Yes', 'No', 'No', 'No', 'No'),
(116, 5, 4, 'Yes', 'No', 'No', 'No', 'No'),
(117, 5, 5, 'Yes', 'Yes', 'No', 'No', 'No'),
(118, 5, 11, 'Yes', 'No', 'No', 'No', 'No'),
(119, 5, 12, 'Yes', 'No', 'No', 'No', 'No'),
(120, 5, 13, 'Yes', 'No', 'No', 'No', 'No'),
(121, 5, 14, 'Yes', 'No', 'No', 'No', 'No'),
(122, 1, 1, 'Yes', 'No', 'No', 'No', 'No'),
(123, 1, 2, 'No', 'Yes', 'No', 'No', 'No'),
(124, 1, 3, 'Yes', 'Yes', 'Yes', 'No', 'No'),
(125, 1, 5, 'No', 'No', 'Yes', 'No', 'Yes'),
(126, 1, 6, 'Yes', 'No', 'No', 'No', 'No'),
(127, 1, 10, 'Yes', 'No', 'No', 'No', 'No'),
(128, 1, 17, 'Yes', 'Yes', 'Yes', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `menu_master_id` int NOT NULL,
  `diaplay_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`menu_master_id`, `diaplay_name`, `url`, `menu_category_id`, `status`) VALUES
(1, 'Purchase PO', 'new_po', 2, 'Active'),
(2, 'Subcon PO', 'new_po_sub', 2, 'Active'),
(3, 'Supplierwise PO List', 'new_po_list_supplier', 2, 'Active'),
(4, 'Item Master', 'child_part_view', 2, 'Active'),
(5, 'Purchase Parts Price', 'child_part_supplier_view', 2, 'Active'),
(6, 'Supplier', 'approved_supplier', 2, 'Active'),
(7, 'Subcon routing', 'routing', 2, 'Active'),
(8, 'customer subcon routing', 'routing_customer', 2, 'Active'),
(9, 'Users', 'erp_users', 0, 'Active'),
(10, 'GRN Entry', 'inwarding', 3, 'Active'),
(11, 'GRN Qty Validation', 'grn_validation', 3, 'Active'),
(12, 'Create Challan', 'view_add_challan', 3, 'Active'),
(13, 'Supplierwise challan list', 'view_supplier_challan', 3, 'Active'),
(14, 'Create challan subcon', 'view_add_challan_subcon', 3, 'Active'),
(15, 'Customerwise Challan List', 'view_supplier_challan_subcon', 3, 'Active'),
(16, 'Customer Challan Inward', 'challan_inward', 3, 'Active'),
(17, 'Customer Parts Return', 'challan_part_return', 3, 'Active'),
(18, 'Purchase Stock Transfer', 'part_stocks', 3, 'Active'),
(19, 'Inhouse Stock Transfer', 'part_stocks_inhouse', 3, 'Active'),
(20, 'FG Stock Transfer', 'fw_stock', 3, 'Active'),
(21, 'Material issue', 'stock_down', 3, 'Active'),
(22, 'Stock Up/Return', 'stock_up', 3, 'Active'),
(23, 'Sharing Isuue Request - Pending', 'sharing_issue_request_store', 3, 'Active'),
(24, 'Sharing Isuue Request - Complete', 'sharing_issue_request_store_completed', 3, 'Active'),
(25, 'Stock Rejection', 'stock_rejection', 3, 'Active'),
(26, 'MRD Short Receipts', 'short_receipt', 3, 'Active'),
(27, 'Material Request', 'machine_request', 4, 'Active'),
(28, 'Create Sharing Request', 'sharing_issue_request', 4, 'Active'),
(29, 'Sharing Production', 'sharing_p_q', 4, 'Active'),
(30, 'Production QTY', 'view_p_q', 4, 'Active'),
(31, 'Molding Production', 'p_q_molding_production', 4, 'Active'),
(32, 'Molding Production Approval', 'view_p_q_molding_production', 4, 'Active'),
(33, 'Inward Inspection', 'accept_reject_validation', 5, 'Active'),
(34, 'Final Inspection', 'final_inspection', 5, 'Active'),
(35, 'Inspection Production', 'final_inspection_qa', 5, 'Active'),
(36, 'Rejection Reasons', 'remarks', 5, 'Active'),
(37, 'CN-DN-PI', 'rejection_invoices', 5, 'Active'),
(38, 'Create Sale Invoice', 'new_sales', 6, 'Active'),
(39, 'View sale Invoice', 'sales_invoice_released', 6, 'Active'),
(41, 'Part Master', 'customer_parts_master', 6, 'Active'),
(42, 'Customers', 'customer', 6, 'Active'),
(43, 'Customer Master', 'customer_master', 6, 'Active'),
(44, 'Consignee', 'consignee', 6, 'Active'),
(45, 'Sales Order', 'customer_po_tracking_all', 6, 'Active'),
(46, 'Monthly Schedule', 'planning_year_page', 6, 'Active'),
(47, 'Shop Order', 'planning_shop_order_details', 6, 'Active'),
(48, 'Inhouse Parts', 'inhouse_parts_view', 6, 'Active'),
(49, 'Sales Report', 'sales_report', 7, 'Active'),
(50, 'Sales Summary report', 'sales_summary_report', 7, 'Active'),
(51, 'Receivable Report', 'receivable_report', 7, 'Active'),
(52, 'Payable Report', 'payable_report', 7, 'Active'),
(53, 'Stock Transfer', 'report_stock_transfer', 7, 'Active'),
(54, 'Purchase Price Report', 'child_part_supplier_report', 7, 'Active'),
(55, 'Purchase Stock', 'supplier_parts_stock_report', 7, 'Active'),
(56, 'PO Summary Report', 'reports_po_balance_qty', 7, 'Active'),
(57, 'GRN Report', 'reports_grn', 7, 'Active'),
(58, 'GRN Summary Report', 'grn_summary_report', 7, 'Active'),
(59, 'Production Rejection Reason', 'report_prod_rejection', 7, 'Active'),
(60, 'Incoming Quality Report', 'reports_incoming_quality', 7, 'Active'),
(61, 'Under Inspection Parts Report', 'reports_inspection', 7, 'Active'),
(62, 'GRN Rejection', 'grn_rejection', 7, 'Active'),
(63, 'Monthly Schedule Report', 'planing_data_report', 7, 'Active'),
(64, 'CUSTOMER PART WIP STOCK REPORT', 'customer_part_wip_stock_report', 7, 'Active'),
(65, 'Subcon Report', 'subcon_supplier_challan_part_report', 7, 'Active'),
(66, 'Mold Life report', 'mold_maintenance_report', 7, 'Active'),
(67, 'PO Under Approval', 'pending_po', 7, 'Active'),
(68, 'Reject PO', 'rejected_po', 7, 'Active'),
(69, 'Expired PO', 'expired_po', 7, 'Active'),
(70, 'Closed PO', 'closed_po', 7, 'Active'),
(71, 'Material Request Report', 'machine_request_completed', 7, 'Active'),
(72, 'Downtime Report', 'downtime_report', 7, 'Active'),
(74, 'Molding Stock Transfer', 'molding_stock_transfer', 7, 'Active'),
(75, 'Supplier Approval', 'supplier', 8, 'Active'),
(76, 'Purchase Price Approval', 'child_part_supplier_admin', 8, 'Active'),
(77, 'Child Part Stock Update', 'child_parts', 8, 'Active'),
(78, 'Inhouse Part Stock Update', 'inhouse_parts_admin', 8, 'Active'),
(79, 'Customer Part Stock Update', 'customer_parts_admin', 8, 'Active'),
(80, 'Grades Master', 'grades', 8, 'Active'),
(81, 'Part Family', 'part_family', 8, 'Active'),
(82, 'Process', 'process', 8, 'Active'),
(83, 'Operation No.', 'operations', 8, 'Active'),
(84, 'Operations Data', 'operations_data', 8, 'Active'),
(85, 'Asset', 'asset', 8, 'Active'),
(86, 'Shift', 'shifts', 8, 'Active'),
(87, 'Operator', 'operator', 8, 'Active'),
(88, 'Machine', 'machine', 8, 'Active'),
(89, 'Down Time Reason', 'downtime_master', 8, 'Active'),
(90, 'Mold Master', 'mold_maintenance', 8, 'Active'),
(91, 'Client', 'client', 8, 'Active'),
(92, 'UOM', 'uom', 8, 'Active'),
(93, 'Tax Structure', 'gst', 8, 'Active'),
(94, 'Transporter', 'transporter', 8, 'Active'),
(96, 'Category', 'category', 8, 'Active'),
(97, 'User', 'erp_users', 8, 'Active'),
(98, 'Configurations', 'configs', 8, 'Active'),
(99, 'Group Master', 'group_master', 8, 'Active'),
(100, 'Formate Configurations', 'global_formate_config', 8, 'Active'),
(101, 'Dashboard', 'dashboard', 1, 'Active'),
(103, 'Dashboard BA', 'dashboard_ba', 1, 'Active'),
(104, 'Dashboard Sales', 'dashboard_sales', 1, 'Active'),
(105, 'Dashboard Account', 'dashboard_account', 1, 'Active'),
(106, 'Dashboard Store', 'dashboard_store', 1, 'Active'),
(107, 'Dashboard Subcon', 'dashboard_subcon', 1, 'Active'),
(108, 'Dashboard Production', 'dashboard_production', 1, 'Active'),
(109, 'Dashboard Quality', 'dashboard_quality', 1, 'Active'),
(110, 'Dashboard Purchase Grn', 'dashboard_purchase_grn', 1, 'Active'),
(111, 'Customer Challan Report', 'customer_challan_report', 7, 'Active'),
(112, 'HSN Report', 'hsn_report', 7, 'Active'),
(113, 'Outstanding Report', 'outstanding_report', 7, 'Active');

INSERT INTO `menu_master` (`menu_master_id`, `diaplay_name`, `url`, `status`) 
VALUES (NULL, 'Customer Challan Report', 'customer_challan_report', 'Active');
INSERT INTO `menu_master` (`menu_master_id`, `diaplay_name`, `url`, `status`) 
VALUES (NULL, 'HSN Report', 'hsn_report', 'Active');
INSERT INTO `menu_master` (`menu_master_id`, `diaplay_name`, `url`, `status`) 
VALUES (NULL, 'Outstanding Report', 'outstanding_report', 'Active');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`group_master_id`);

--
-- Indexes for table `group_rights`
--
ALTER TABLE `group_rights`
  ADD PRIMARY KEY (`group_rights_id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`menu_master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `group_master_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_rights`
--
ALTER TABLE `group_rights`
  MODIFY `group_rights_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `menu_master_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

-- 

ALTER TABLE `group_rights` ADD `import` ENUM('Yes','No') NOT NULL DEFAULT 'No' AFTER `export`;

ALTER TABLE `userinfo` ADD `unit_ids` VARCHAR(255) NOT NULL AFTER `drawing_upload`;
ALTER TABLE `userinfo` ADD `groups` VARCHAR(255) NOT NULL AFTER `unit_ids`;



ALTER TABLE `menu_master` ADD `menu_category_id` INT NOT NULL AFTER `url`;




--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `menu_category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`menu_category_id`, `category_name`, `status`) VALUES
(1, 'Dashboard', 'Active'),
(2, 'Purchase', 'Active'),
(3, 'Store', 'Active'),
(4, 'Production', 'Active'),
(5, 'Quality', 'Active'),
(6, 'Planning & Sales', 'Active'),
(7, 'Reports', 'Active'),
(8, 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`menu_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `menu_category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;








/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;