<?php
/* Smarty version 4.3.2, created on 2024-06-20 13:54:35
  from '/var/www/html/extra/erp_converted/application/views/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673e743579ca3_10391645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6f0070f8c39c98022c6bd96365b9efcfa222eef' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/header.tpl',
      1 => 1718605193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673e743579ca3_10391645 (Smarty_Internal_Template $_smarty_tpl) {
if (!($_smarty_tpl->tpl_vars['session_data']->value['user_id'] > 0)) {
echo redirect('login');?>

<?php }?>

<?php $_smarty_tpl->_assignInScope('role', trim($_smarty_tpl->tpl_vars['session_data']->value['type']));
$_smarty_tpl->_assignInScope('Commodity', $_smarty_tpl->tpl_vars['session_data']->value['Commodity']);
$_smarty_tpl->_assignInScope('entitlements', $_smarty_tpl->tpl_vars['session_data']->value['entitlements']);
$_smarty_tpl->_assignInScope('base_url', base_url(''));
if ($_smarty_tpl->tpl_vars['title']->value == null) {
$_smarty_tpl->_assignInScope('title', "ERP-Management");
}?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
      <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"
         href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/favicon-16x16.png">
      <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
         integrity="sha512-cLuyDTDg9CSseBSFWNd4wkEaZ0TBEpclX0zD3D6HjI19pO39M58AgJ1SjHp6c7ZOp0/OCRcC2BCvvySU9KJaGw=="
         crossorigin="anonymous"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
      <?php echo '<script'; ?>
 src="html2pdf.bundle.min.js"><?php echo '</script'; ?>
>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet"
         href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jqvmap/jqvmap.min.css">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dist/css/adminlte.min.css">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dist/css/arom.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/summernote/summernote-bs4.min.css">
      <link rel="stylesheet"
         href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
      <style>
         /* Overlay CSS */
         #loading-overlay {
         display: none; /* Hidden by default */
         position: fixed; /* Stay in place */
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
         z-index: 10000; /* Specify a stack order */
         cursor: wait; /* Add a pointer on hover */
         }
         /* Centered spinner */
         #loading-spinner {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 50px;
         height: 50px;
         border: 5px solid #f3f3f3; /* Light grey */
         border-top: 5px solid #3498db; /* Blue */
         border-radius: 50%;
         animation: spin 1s linear infinite; /* Spinner animation */
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
         .wrapper, body, html {
         min-height: 0%;
         }
         .dataTables_scrollHeadInner .table-bordered {
            margin-bottom: -2px !important;
         }
         .dataTables_wrapper .dataTables_info ,.dataTables_wrapper .dataTables_paginate{
            margin-top: 18px;
         }
         /*.dataTables_wrapper .dataTables_paginate{
                float: right;
         }*/
         
      </style>
   </head>
   <body class="hold-transition layout-top-nav" style="line-height:1">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class=" main-header navbar navbar-expand-md navbar-light navbar-dark text-right" style="margin-left:-20%">
            <!-- <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark text-right"> -->
            <div class="container ">
               <!-- <h1></h1> -->
               <div style="padding-right:0.5em;color:white;"><?php echo $_smarty_tpl->tpl_vars['session_data']->value['clientUnitName'];?>
</div>
               <div style="padding-top:0.5em;padding-left:0.5em;">
                  <a href="<?php echo base_url('index');?>
" class="navbar-brand ">
                     <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                     <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/dist/img/softech.jpeg" alt="AROM Technology"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                     <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
                  </a>
               </div>
               <div class=" row collapse navbar-collapse order-3" id="navbarCollapse">
                  <!-- Left navbar links -->
                  <ul class="navbar-nav" style="text-align:right;padding-left: 3em; font-size:15px">
                     <li class="nav-item">
                        <div style="padding-top:0.5em;"></div>
                        <a href="<?php echo base_url('dashboard');?>
" class="nav-link">DASHBOARD</a>
                     </li>
                     <li class="nav-item">
                        <div style="padding-top:0.5em;"></div>
                        <a href="<?php echo base_url('home_2');?>
" class="nav-link">CHARTS</a>
                     </li>
                     <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">PURCHASE </a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Item Master</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('child_part/direct');?>
"
                                    class="dropdown-item">Add Item</a></li>
                                 <li><a href="<?php echo base_url('child_part_view');?>
"
                                    class="dropdown-item">View Item</a></li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Supplier Part</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('child_part_supplier');?>
"
                                    class="dropdown-item">Add Supplier Part Price</a></li>
                                 <li><a href="<?php echo base_url('child_part_supplier_view');?>
"
                                    class="dropdown-item">View Supplier Part Price</a></li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Supplier</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                                 <li><a href="<?php echo base_url('supplier');?>
" class="dropdown-item">Add
                                    Supplier</a>
                                 </li>
                                 <?php }?>
                                 <li><a href="<?php echo base_url('approved_supplier');?>
"
                                    class="dropdown-item">View Supplier </a></li>
                              </ul>
                           </li>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Regular Po</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('new_po');?>
" class="dropdown-item">Generate
                                    PO</a>
                                 </li>
                                 <li><a href="<?php echo base_url('new_po_list_supplier');?>
"
                                    class="dropdown-item">Supplierwise PO List </a></li>
                                 <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">Pending
                                    PO </a>
                                 </li>
                                 <li><a href="<?php echo base_url('rejected_po');?>
"
                                    class="dropdown-item">Rejected PO
                                    </a>
                                 </li>
                                 <li><a href="<?php echo base_url('expired_po');?>
" class="dropdown-item">Expired
                                    PO </a>
                                 </li>
                                 <li><a href="<?php echo base_url('closed_po');?>
" class="dropdown-item">Closed
                                    PO </a>
                                 </li>
                              </ul>
                           </li>
                           <?php }?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Sub Con</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('new_po_sub');?>
"
                                    class="dropdown-item">Generate Subcon
                                    PO</a>
                                 </li>
                                 <li><a href="<?php echo base_url('new_po_list_supplier');?>
"
                                    class="dropdown-item">View
                                    Subcon PO list</a>
                                 </li>
                                 <li><a href="<?php echo base_url('routing');?>
" class="dropdown-item">Subcon
                                    routing </a>
                                 </li>
                                 <li><a href="<?php echo base_url('routing_customer');?>
"
                                    class="dropdown-item">Customer Subcon routing </a>
                                 </li>
                                 <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">Pending
                                    PO</a>
                                 </li>
                                 <li><a href="<?php echo base_url('expired_po');?>
" class="dropdown-item">Expired
                                    PO </a>
                                 </li>
                                 <li><a href="<?php echo base_url('rejected_po');?>
"
                                    class="dropdown-item">Rejected PO </a>
                                 </li>
                                 <li><a href="<?php echo base_url('closed_po');?>
" class="dropdown-item">Closed
                                    PO </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php }?>
                     <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">STORE</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Inwarding</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('inwarding');?>
" class="dropdown-item">Part
                                    GRN</a>
                                 </li>
                                 <li><a href="<?php echo base_url('grn_validation');?>
" class="dropdown-item">
                                    GRN
                                    Qty Validation </a>
                                 </li>
                              </ul>
                           </li>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Challan</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('view_add_challan');?>
"
                                    class="dropdown-item">Create challan</a></li>
                                 <li><a href="<?php echo base_url('view_supplier_challan');?>
"
                                    class="dropdown-item">
                                    Supplierwise challan list </a>
                                 </li>
                                 <li><a href="<?php echo base_url('view_add_challan_subcon');?>
"
                                    class="dropdown-item">Create challan Subcon</a></li>
                                 <li><a href="<?php echo base_url('view_supplier_challan_subcon');?>
"
                                    class="dropdown-item">
                                    Customerwise challan list </a>
                                 </li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Stock</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('part_stocks');?>
"
                                    class="dropdown-item">Supplier part
                                    stocks</a>
                                 </li>
                                 <li><a href="<?php echo base_url('part_stocks_inhouse');?>
"
                                    class="dropdown-item">Inhouse
                                    part
                                    stocks</a>
                                 </li>
                                 <li><a href="<?php echo base_url('fw_stock');?>
" class="dropdown-item">FG
                                    Stock</a>
                                 </li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded=""
                                 class="dropdown-item dropdown-toggle">Material
                              Requisition</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('stock_down');?>
"
                                    class="dropdown-item">Material
                                    Issue</a>
                                 </li>
                                 <?php if (($_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                                 <li><a href="<?php echo base_url('stock_up');?>
" class="dropdown-item">Stock
                                    Up/return</a>
                                 </li>
                                 <?php }?>
                                 <li><a href="<?php echo base_url('sharing_issue_request_store');?>
"
                                    class="dropdown-item">Sharing Issue Request - Pending
                                    </a>
                                 </li>
                                 <li><a href="<?php echo base_url('sharing_issue_request_store_completed');?>
"
                                    class="dropdown-item">Sharing Issue Request - Completed
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isJobRoot'] != null)) {?> 
                           <li><a href="<?php echo base_url('job_card_issued');?>
" class="dropdown-item">Issue
                              Released
                              Job Card</a>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li><a href="<?php echo base_url('stock_rejection');?>
" class="dropdown-item">Stock
                              Rejection</a>
                           </li>
                           <li><a href="<?php echo base_url('short_receipt');?>
" class="dropdown-item">MDR/Short
                              Receipt</a>
                           </li>
                           <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('grn_rejection') <?php echo '?>'; ?>
" class="dropdown-item">GRN
                              Rejection</a></li> -->
                           <?php }?>
                           <!-- 
                              <li><a href="<?php echo '<?php'; ?>
 echo base_url('stock_variance') <?php echo '?>'; ?>
" class="dropdown-item">Stock
                                      Variance</a></li> -->
                        </ul>
                     </li>
                     <?php }?>
                     <?php if (($_smarty_tpl->tpl_vars['role']->value == "production" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">PRODUCTION</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null)) {?>
                           <li><a href="<?php echo base_url('machine_request');?>
" class="dropdown-item">Material
                              Request: Add</a>
                           </li>
                           <li><a href="<?php echo base_url('machine_request_completed');?>
" class="dropdown-item">Material
                              Request Report</a>
                           </li>
                           <?php }?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Stock</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('part_stocks');?>
"
                                    class="dropdown-item">Supplier part
                                    stocks</a>
                                 </li>
                                 <li><a href="<?php echo base_url('part_stocks_inhouse');?>
"
                                    class="dropdown-item">Inhouse
                                    part
                                    stocks</a>
                                 </li>
                                 <li><a href="<?php echo base_url('fw_stock');?>
" class="dropdown-item">FG
                                    Stock</a>
                                 </li>
                              </ul>
                           </li>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li><a href="<?php echo base_url('stock_down');?>
"
                              class="dropdown-item">Material
                              Issue</a>
                           </li>
                           <li><a href="<?php echo base_url('sharing_issue_request');?>
"
                              class="dropdown-item">Create Sharing Request
                              </a>
                           </li>
                           <li><a href="<?php echo base_url('sharing_p_q');?>
" class="dropdown-item">Sharing
                              Production
                              </a>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "production" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Production QTY</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('p_q');?>
" class="dropdown-item">
                                    Add</a>
                                 </li>
                                 <li><a href="<?php echo base_url('view_p_q');?>
" class="dropdown-item">View</a>
                                 </li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null)) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">
                              Molding Production </a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('p_q_molding_production');?>
"
                                    class="dropdown-item">
                                    Add</a>
                                 </li>
                                 <li><a href="<?php echo base_url('view_p_q_molding_production');?>
"
                                    class="dropdown-item">View</a></li>
                              </ul>
                           </li>
                           <li><a href="<?php echo base_url('molding_stock_transfer ');?>
"
                              class="dropdown-item">Molding Stock Transfer </a></li>
                           <!-- <li>
                              <a href="<?php echo '<?php'; ?>
 echo base_url('deflashing_rqeust') <?php echo '?>'; ?>
"
                              class="dropdown-item">Deflashing
                              Request </a>
                              </li>
                              <li>
                              <a href="<?php echo '<?php'; ?>
 echo base_url('p_q_deflashing') <?php echo '?>'; ?>
" class="dropdown-item">Deflashing
                              Production </a>
                              </li>
                              -->
                           <li>
                              <a href="<?php echo base_url('final_inspection');?>
" class="dropdown-item">Final
                              Inspection
                              </a>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isJobRoot'] != null)) {?> 
                           <li><a href="<?php echo base_url('job_card_issued');?>
" class="dropdown-item">WIP Job
                              Card</a>
                           </li>
                           <?php }?>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('job_card_issued') <?php echo '?>'; ?>
" class="dropdown-item">Operation BOM</a></li> -->
                           <?php }?>
                           <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('planning_year_page') <?php echo '?>'; ?>
" class="dropdown-item">Add FG
                              Stock</a></li> -->
                           <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('stock_up') <?php echo '?>'; ?>
" class="dropdown-item">Stock Up/Return</a> -->
                           </li>
                        </ul>
                        <?php if (($_smarty_tpl->tpl_vars['role']->value == "Quality" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">QUALITY</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <li><a href="<?php echo base_url('accept_reject_validation');?>
" class="dropdown-item">Inward Inspection</a></li>
                           <li><a href="<?php echo base_url('remarks');?>
" class="dropdown-item">Rejection Reasons</a>
                           </li>
                           <li><a href="<?php echo base_url('stock_rejection');?>
" class="dropdown-item">Stock
                              Rejection</a>
                           </li>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li><a href="<?php echo base_url('final_inspection_qa');?>
" class="dropdown-item">Final
                              Inspection Production
                              </a>
                           </li>
                           <?php }?>
                           <li><a href="<?php echo base_url('grn_rejection');?>
" class="dropdown-item">GRN
                              Rejection</a>
                           </li>
                           <li><a href="<?php echo base_url('rejection_invoices');?>
"
                              class="dropdown-item">Rejection
                              Invoices</a>
                           </li>
                        </ul>
                     </li>
                     <?php }?>
                     <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">PLANNING & SALES</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">SALES INVOICE</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('new_sales');?>
" class="dropdown-item">Create Sales
                                    Invoice</a>
                                 </li>
                                 <li><a href="<?php echo base_url('sales_invoice_released');?>
"
                                    class="dropdown-item">View
                                    Sales Invoice</a>
                                 </li>
                                 <!--<li><a href="<?php echo '<?php'; ?>
 echo base_url('new_sales_rejection') <?php echo '?>'; ?>
"
                                    class="dropdown-item">Create
                                    Scrap Sales Invoice</a></li> -->
                                 <li><a href="<?php echo base_url('rejection_invoices');?>
"
                                    class="dropdown-item">Rejection
                                    Invoices</a>
                                 </li>
                                 <li><a href="<?php echo base_url('rejection_flow');?>
"
                                    class="dropdown-item">Rejection
                                    Flow</a>
                                 </li>
                                 <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('new_sales_subcon') <?php echo '?>'; ?>
"
                                    class="dropdown-item">Create
                                    Customer Subcon Sales
                                    Invoice</a></li>
                                    <li><a href="<?php echo '<?php'; ?>
 echo base_url('sales_invoice_released_subcon') <?php echo '?>'; ?>
"
                                    class="dropdown-item">View
                                    Customer Subcon Sales Invoice</a></li> -->
                              </ul>
                           </li>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Customer</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('customer_parts_master');?>
"
                                    class="dropdown-item">Part Master</a></li>
                                 <li><a href="<?php echo base_url('customer');?>
" class="dropdown-item">Customers</a>
                                 </li>
                                 <li><a href="<?php echo base_url('customer_master');?>
"
                                    class="dropdown-item">Customer
                                    Master</a>
                                 </li>
                                 <li><a href="<?php echo base_url('consignee');?>
"
                                    class="dropdown-item">Consignee</a></li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Customer PO QTY Tracking</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['po_import_export'] != null)) {?>
                                 <li><a href="<?php echo base_url('customer_po_tracking_importExport');?>
"
                                    class="dropdown-item">Import/Export PO Tracking</a></li>
                                 <?php }?>
                                 <li><a href="<?php echo base_url('customer_po_tracking');?>
"
                                    class="dropdown-item">Create PO QTY Tracking</a></li>
                                 <li><a href="<?php echo base_url('customer_po_tracking_all');?>
"
                                    class="dropdown-item">View Pending</a></li>
                                 <li><a href="<?php echo base_url('customer_po_tracking_all_closed');?>
"
                                    class="dropdown-item">View Closed</a></li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Customer Scheduling</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('planning_year_page');?>
" class="dropdown-item">Monthly Plan</a></li>
                                 <li><a href="<?php echo base_url('planning_shop_order_details');?>
" class="dropdown-item">Shop Order Details</a></li>
                                 <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isJobRoot'] != null)) {?> 
                                 <li><a href="<?php echo base_url('job_card');?>
" class="dropdown-item">Create
                                    JOB
                                    Card</a>
                                 </li>
                                 <li><a href="<?php echo base_url('job_card_released');?>
"
                                    class="dropdown-item">Released JOB Card</a></li>
                                 <li><a href="<?php echo base_url('job_card_closed');?>
" class="dropdown-item">Closed
                                    JOB Card</a>
                                 </li>
                                 <?php }?>
                              </ul>
                           </li>
                           <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Inhouse Parts</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('inhouse_parts');?>
" class="dropdown-item">Add
                                    Item</a>
                                 </li>
                                 <li><a href="<?php echo base_url('inhouse_parts_view');?>
"
                                    class="dropdown-item">View Item</a></li>
                              </ul>
                           </li>
                           <?php }?>
                           <?php }?>
                           </li>
                        </ul>
                     </li>
                     <?php }?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">REPORT </a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <li><a href="<?php echo base_url('sales_report');?>
" class="dropdown-item">Sales Report </a></li>
                           <li><a href="<?php echo base_url('receivable_report');?>
" class="dropdown-item">Receivable Report </a></li>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li><a href="<?php echo base_url('report_stock_transfer');?>
" class="dropdown-item">Stock Transfer</a></li>
                           <?php }?>
                           <li><a href="<?php echo base_url('child_part_view');?>
" class="dropdown-item">Item
                              Master</a>
                           </li>
                           <li><a href="<?php echo base_url('approved_supplier');?>
" class="dropdown-item">Approved
                              Supplier List</a>
                           </li>
                           <li><a href="<?php echo base_url('child_part_supplier_report');?>
"
                              class="dropdown-item">Supplier part price</a></li>
                           <li><a href="<?php echo base_url('supplier_parts_stock_report');?>
"
                              class="dropdown-item">Supplier Parts Stock</a></li>
                           <li><a href="<?php echo base_url('reports_po_balance_qty');?>
" class="dropdown-item">PO Summary Report</a></li>
                           <li><a href="<?php echo base_url('reports_grn');?>
" class="dropdown-item">GRN Report</a>
                           </li>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null)) {?>
                           <li><a href="<?php echo base_url('report_prod_rejection');?>
" class="dropdown-item">Production Rejection Reason</a></li>
                           <?php }?>
                           <li><a href="<?php echo base_url('reports_incoming_quality');?>
"
                              class="dropdown-item">Incoming Quality Report</a></li>
                           <li><a href="<?php echo base_url('reports_inspection');?>
" class="dropdown-item">Under
                              Inspection Parts Report</a>
                           </li>
                           <li><a href="<?php echo base_url('part_stocks');?>
" class="dropdown-item">Current Supplier
                              Part(Item) Stock </a>
                           </li>
                           <li><a href="<?php echo base_url('planing_data_report');?>
" class="dropdown-item">Plan vs
                              Dispatch
                              vs Balance qty required</a>
                           </li>
                           <li><a href="<?php echo base_url('pei_chart_sales_values_in_rs');?>
"
                              class="dropdown-item">Sales Values In Rs</a></li>
                           <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li><a href="<?php echo base_url('customer_part_wip_stock_report');?>
"
                              class="dropdown-item">CUSTOMER PART WIP STOCK REPORT </a></li>
                           <?php }?>
                           <li><a href="<?php echo base_url('subcon_supplier_challan_part_report');?>
"
                              class="dropdown-item">Subcon Supplier-Challan part stock report </a></li>
                           <li><a href="<?php echo base_url('mold_maintenance_report');?>
" 
                              class="dropdown-item">Mold Life report </a></li>
                        </ul>
                     </li>
                     <?php if (($_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">ADMIN</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Approval</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo base_url('supplier');?>
" class="dropdown-item">Supplier</a>
                                 </li>
                                 <li><a href="<?php echo base_url('child_part_supplier_admin');?>
"
                                    class="dropdown-item">Supplier Part Price</a></li>
                                 <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">PO
                                    Approval</a>
                                 </li>
                                 <li><a href="<?php echo base_url('child_parts');?>
" class="dropdown-item">Child
                                    Parts Stock Update</a>
                                 </li>
                                 <li><a href="<?php echo base_url('inhouse_parts_admin');?>
"
                                    class="dropdown-item">Inhouse
                                    Parts Stock Update</a>
                                 </li>
                                 <li><a href="<?php echo base_url('customer_parts_admin');?>
"
                                    class="dropdown-item">Customer Parts Stock Update</a>
                              </ul>
                           </li>
                           <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Masters</a>
                              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'])) {?>
                                 <li><a href="<?php echo base_url('grades');?>
" class="dropdown-item">Grades
                                    Master</a>
                                 </li>
                                 <?php }?>
                                 <li><a href="<?php echo base_url('part_family');?>
" class="dropdown-item">Part
                                    Family</a>
                                 </li>
                                 <li><a href="<?php echo base_url('process');?>
" class="dropdown-item">Process</a></li>
                                 <li><a href="<?php echo base_url('operations');?>
" class="dropdown-item">Operation
                                    No.</a>
                                 </li>
                                 <li><a href="<?php echo base_url('operations_data');?>
"
                                    class="dropdown-item">Operations
                                    Data</a>
                                 </li>
                                 <li><a href="<?php echo base_url('asset');?>
" class="dropdown-item">Asset</a></li>
                                 <li><a href="<?php echo base_url('shifts');?>
" class="dropdown-item">Shift</a></li>
                                 <li><a href="<?php echo base_url('operator');?>
" class="dropdown-item">Operator</a>
                                 </li>
                                 <li><a href="<?php echo base_url('machine');?>
" class="dropdown-item">Machine</a>
                                 </li>
                                 <li><a href="<?php echo base_url('downtime_master');?>
" class="dropdown-item">Down
                                    Time
                                    Reason</a>
                                 </li>
                                 <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'])) {?>
                                 <li><a href="<?php echo base_url('mold_maintenance');?>
" class="dropdown-item">Mold Master
                                    </a>
                                 </li>
                                 <!-- <li>
                                    <a href="<?php echo '<?php'; ?>
 echo base_url('deflashing_operation') <?php echo '?>'; ?>
"
                                        class="dropdown-item">Deflashing
                                        Operation
                                    </a></li>
                                    -->
                                 <?php }?>
                                 <!-- <li><a href="<?php echo '<?php'; ?>
 echo base_url('machine_mold') <?php echo '?>'; ?>
" class="dropdown-item">Machine
                                    Mold</a></li> -->
                                 <li><a href="<?php echo base_url('client');?>
" class="dropdown-item">Client</a></li>
                                 <li><a href="<?php echo base_url('uom');?>
" class="dropdown-item">UOM</a></li>
                                 <li><a href="<?php echo base_url('gst');?>
" class="dropdown-item">Tax Structure</a>
                                 <li><a href="<?php echo base_url('transporter');?>
" class="dropdown-item">Transporter</a>
                                 </li>
                              </ul>
                           </li>
                           <li><a href="<?php echo base_url('erp_users');?>
" class="dropdown-item">Users</a></li>
                           <li><a href="<?php echo base_url('configs');?>
" class="dropdown-item">Configurations</a></li>
                           <?php if (($_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                           <!-- <li class="dropdown-submenu dropdown-hover">
                              <a id="dropdownAromMenu" href="#" role="button" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false"
                                  class="dropdown-item dropdown-toggle">AROM Configuration</a>
                                 <ul aria-labelledby="dropdownAromMenu" class="dropdown-menu border-0 shadow">
                                 <li><a href="<?php echo '<?php'; ?>
 echo base_url('transporter') <?php echo '?>'; ?>
" class="dropdown-item">Table</a>
                                  </li>
                              </ul>
                              </li> -->
                           <?php }?>
                           </li>
                        </ul>
                     </li>
                     <?php }?>
                     <li>
                        <div style="padding-top:0.5em;"></div>
                        <a href="<?php echo base_url('logout');?>
" class="nav-link">LOGOUT</a>
                     </li>
                  </ul>
                  </li>
                  <?php }?>
                  </ul>
               </div>
               <!-- Right navbar links -->
            </div>
         </nav>
      </div><?php }
}
