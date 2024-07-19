<?php
/* Smarty version 4.3.2, created on 2024-06-25 22:11:02
  from '/var/www/html/extra_work/erp_converted/application/views/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667af31e34fed6_43930693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd2986b00e1c34c93f8703313b64a0d9aabedfb9' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/header.tpl',
      1 => 1719333661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667af31e34fed6_43930693 (Smarty_Internal_Template $_smarty_tpl) {
if (!($_smarty_tpl->tpl_vars['session_data']->value['user_id'] > 0)) {
echo redirect('login');?>

<?php }
$_smarty_tpl->_assignInScope('role', trim($_smarty_tpl->tpl_vars['session_data']->value['type']));
$_smarty_tpl->_assignInScope('Commodity', $_smarty_tpl->tpl_vars['session_data']->value['Commodity']);
$_smarty_tpl->_assignInScope('entitlements', $_smarty_tpl->tpl_vars['session_data']->value['entitlements']);
$_smarty_tpl->_assignInScope('base_url', base_url(''));
if ($_smarty_tpl->tpl_vars['title']->value == null) {
$_smarty_tpl->_assignInScope('title', "ERP-Management");
}?>
<!DOCTYPE html>
<html
   lang="en"
   class="light-style layout-menu-fixed layout-menu-collapsed  layout-navbar-fixed layout-menu-hover"
   dir="ltr"
   data-theme="theme-default"
   data-assets-path="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/"
   data-template="vertical-menu-template-free"
   >
   <head>
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
         />
      <title>AROM</title>
      <meta name="description" content="" />
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/img/favicon/favicon.png" />
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
         href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
         rel="stylesheet"
         />
      <!-- Icons. Uncomment required icon fonts -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/fonts/boxicons.css" />
      <!-- tabler css -->
      <link rel="stylesheet" href="public/css/plugin/tabler_css/tabler_icons.css">
      <!-- Core CSS -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/css/core.css" class="template-customizer-core-css" />
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/css/demo.css" />
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/css/theme.css" />
      <!-- Vendors CSS -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/libs/apex-charts/apex-charts.css" />
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/common.css" />
      <!-- Page CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
      <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/data_table/select.dataTables.min.css"> -->
      <!-- <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/data_table/jquery.dataTables.min.css"> -->
      <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/css/data_table/searchPanes.dataTables.min.css">
      <!-- Helpers -->
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/js/helpers.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/js/config.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/js/bootstrap.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/admin/plugin/jquery.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/admin/plugin/jquery.validate.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"><?php echo '</script'; ?>
>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="public/css/data_table/datatable.css">
      <!-- select2 -->
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript">
         var theme_color = "#ea1c31";
      <?php echo '</script'; ?>
>
   </head>
   <body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme hide">
         <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo.png" alt="" width="30">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">AROM</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle layout-menu-toggle-popup menu-link text-large ms-auto d-block">
            <i class="bx bx-chevron-right bx-sm align-middle"></i>
            </a>
         </div>
         <div class="menu-inner-shadow"></div>
         <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
               <a href="home" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
               </a>
            </li>
            <!-- Layouts -->
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Home</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="sidemap" class="menu-link">
                        <div data-i18n="Without menu">Sitemap</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="form" class="menu-link">
                        <div data-i18n="Without navbar">Form</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="listing" class="menu-link">
                        <div data-i18n="Without navbar">Listing</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="form" class="menu-link">
                        <div data-i18n="Without navbar">Shortcuts</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="layouts-container.html" class="menu-link">
                        <div data-i18n="Container">Custom Dashboard</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="layouts-fluid.html" class="menu-link">
                        <div data-i18n="Fluid">Watchlist</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="layouts-blank.html" class="menu-link">
                        <div data-i18n="Blank">Smart Dashboard</div>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="menu-header small text-uppercase">
               <span class="menu-header-text">Management</span>
            </li>
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Item Category</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">Manufacture</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="pages-account-settings-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Brand Master</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="pages-account-settings-connections.html" class="menu-link">
                        <div data-i18n="Connections">Activity Master</div>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                  <div data-i18n="Authentications">Authentications</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="login" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Login</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="register" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Register</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="forget-password" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Forgot Password</div>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                  <div data-i18n="Misc">Finance</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Finance Vouches</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="pages-misc-under-maintenance.html" class="menu-link">
                        <div data-i18n="Under Maintenance">Asset Classification</div>
                     </a>
                  </li>
               </ul>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Report</span></li>
            <!-- Cards -->
            <li class="menu-item">
               <a href="cards-basic.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Item Attribute Reports</div>
               </a>
            </li>
            <!-- User interface -->
            <li class="menu-item">
               <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-box"></i>
                  <div data-i18n="User interface">Batch Report</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="ui-accordion.html" class="menu-link">
                        <div data-i18n="Accordion">Stock Log Report</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="ui-alerts.html" class="menu-link">
                        <div data-i18n="Alerts">Activity Log</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="ui-badges.html" class="menu-link">
                        <div data-i18n="Badges">Big Transaction Report</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="ui-buttons.html" class="menu-link">
                        <div data-i18n="Buttons">User Activity</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="ui-carousel.html" class="menu-link">
                        <div data-i18n="Carousel">Import logs</div>
                     </a>
                  </li>
               </ul>
            </li>
            <!-- Extended components -->
            <li class="menu-item">
               <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-copy"></i>
                  <div data-i18n="Extended UI">Currencies</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Currency master</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="extended-ui-text-divider.html" class="menu-link">
                        <div data-i18n="Text Divider">Currency Conversion Master</div>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="menu-item">
               <a href="icons-boxicons.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-crown"></i>
                  <div data-i18n="Boxicons">Imports</div>
               </a>
            </li>
            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Resourse & Deliveries</span></li>
            <!-- Forms -->
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-detail"></i>
                  <div data-i18n="Form Elements">Resourse</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="forms-basic-inputs.html" class="menu-link">
                        <div data-i18n="Basic Inputs">Sync API logs</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="forms-input-groups.html" class="menu-link">
                        <div data-i18n="Input groups">System Emails</div>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-detail"></i>
                  <div data-i18n="Form Layouts">Assign & Track Deliveries</div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="form-layouts-vertical.html" class="menu-link">
                        <div data-i18n="Vertical Form">Delivery Request</div>
                     </a>
                  </li>
                  <li class="menu-item">
                     <a href="form-layouts-horizontal.html" class="menu-link">
                        <div data-i18n="Horizontal Form">Delivery Status</div>
                     </a>
                  </li>
               </ul>
            </li>
            <!-- Tables -->
            <li class="menu-item">
               <a href="tables-basic.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-table"></i>
                  <div data-i18n="Tables">Reports</div>
               </a>
            </li>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
               <a
                  href="https://github.com/themeselection/AROM-html-admin-template-free/issues"
                  target="_blank"
                  class="menu-link"
                  >
                  <i class="menu-icon tf-icons bx bx-support"></i>
                  <div data-i18n="Support">Support</div>
               </a>
            </li>
            <li class="menu-item">
               <a
                  href="https://themeselection.com/demo/AROM-bootstrap-html-admin-template/documentation/"
                  target="_blank"
                  class="menu-link"
                  >
                  <i class="menu-icon tf-icons bx bx-file"></i>
                  <div data-i18n="Documentation">Documentation</div>
               </a>
            </li>
         </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
      <!-- Navbar -->
      <!-- / Navbar -->
      <nav class="navbar navbar-expand-lg bg-navbar-theme">
         <div class="container-fluid">
            <a href="home" class="app-brand-link navbar-brand">
            <span class="app-brand-logo demo">
            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo.png" alt="" width="30">
            </span>
            <span class="stat-cards-info__num fw-bolder ms-2 pt-1">AROM</span>
            </a>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="<?php echo base_url('dashboard');?>
">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url('home_2');?>
">Charts</a>
                  </li>
                  <?php if (($_smarty_tpl->tpl_vars['role']->value == "Purchase" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkPurchase" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Purchase
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkPurchaseSubmenu">
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Item Master</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('child_part/direct');?>
" class="dropdown-item">Add Item</a></li>
                              <li><a href="<?php echo base_url('child_part_view');?>
" class="dropdown-item">View Item</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Supplier Parts</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('child_part_supplier');?>
" class="dropdown-item">Add Supplier Parts price</a></li>
                              <li><a href="<?php echo base_url('child_part_supplier_view');?>
" class="dropdown-item">View Supplier Parts price</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Supplier</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('supplier');?>
" class="dropdown-item">Add Supplier</a></li>
                              <li><a href="<?php echo base_url('approved_supplier');?>
" class="dropdown-item">View Supplier</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Regular PO</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('new_po');?>
" class="dropdown-item">Generate PO</a></li>
                              <li><a href="<?php echo base_url('new_po_list_supplier');?>
" class="dropdown-item">Supplierwise PO List</a></li>
                              <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">Pending PO</a></li>
                              <li><a href="<?php echo base_url('rejected_po');?>
" class="dropdown-item">Reject PO</a></li>
                              <li><a href="<?php echo base_url('expired_po');?>
" class="dropdown-item">Expired PO</a></li>
                              <li><a href="<?php echo base_url('closed_po');?>
" class="dropdown-item">Closed PO</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Sub Con</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('new_po_sub');?>
" class="dropdown-item">Generate subcon PO</a></li>
                              <li><a href="<?php echo base_url('new_po_list_supplier');?>
" class="dropdown-item">view subcon po list </a></li>
                              <li><a href="<?php echo base_url('routing');?>
" class="dropdown-item">subcon routing</a></li>
                              <li><a href="<?php echo base_url('routing_customer');?>
" class="dropdown-item">customer subcon routing</a></li>
                              <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">Pending PO</a></li>
                              <li><a href="<?php echo base_url('rejected_po');?>
" class="dropdown-item">Reject PO</a></li>
                              <li><a href="<?php echo base_url('expired_po');?>
" class="dropdown-item">Expired PO</a></li>
                              <li><a href="<?php echo base_url('closed_po');?>
" class="dropdown-item">Closed PO</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkStore" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Store
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkStoreSubmenu">
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Inwarding</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('inwarding');?>
" class="dropdown-item">Part GRN</a></li>
                              <li><a href="<?php echo base_url('grn_validation');?>
" class="dropdown-item">GRN Qty validation</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Challan</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('view_add_challan');?>
" class="dropdown-item">Create Challan</a></li>
                              <li><a href="<?php echo base_url('view_supplier_challan');?>
" class="dropdown-item">Supplierwise challan list</a></li>
                              <li><a href="<?php echo base_url('view_add_challan_subcon');?>
" class="dropdown-item">Create challan subcon</a></li>
                              <li><a href="<?php echo base_url('view_supplier_challan_subcon');?>
" class="dropdown-item">Customerwise Challan List</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Stock</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('part_stocks');?>
" class="dropdown-item">Supplier Part stocks</a></li>
                              <li><a href="<?php echo base_url('part_stocks_inhouse');?>
" class="dropdown-item">Inhouse Part stocks</a></li>
                              <li><a href="<?php echo base_url('fw_stock');?>
" class="dropdown-item">FG Stock</a></li>
                           </ul>
                        </li>
                        <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Material Requisition</a>
                           <ul class="dropdown-menu">
                               <li><a href="<?php echo base_url('stock_down');?>
" class="dropdown-item">Material issue</a></li>
                               <?php if (($_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                               <li><a href="<?php echo base_url('stock_up');?>
" class="dropdown-item">Stock Up/Return</a></li>
                               <?php }?>
                               <li><a href="<?php echo base_url('sharing_issue_request_store');?>
" class="dropdown-item">Sharing Isuue Request - Pending</a></li>
                               <li><a href="<?php echo base_url('sharing_issue_request_store_completed');?>
" class="dropdown-item">Sharing Isuue Request - Complete</a></li>
                           
                           </ul>
                           </li>
                        <?php }?>
                        <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isJobRoot'] != null)) {?> 
                        <li><a class="dropdown-item" href="<?php echo base_url('job_card_issued');?>
">Issue Released Job Card</a></li>
                        <?php }?>
                         <?php if (($_smarty_tpl->tpl_vars['role']->value == "stores" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                        <li><a class="dropdown-item" href="<?php echo base_url('stock_rejection');?>
">Stock Rejection</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('short_receipt');?>
">MRD Short Receipts</a></li>
                         <?php }?>
                     </ul>
                  </li>
                  <?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['role']->value == "production" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkProduction" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Production
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkProductionSubmenu">
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
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Stock</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('part_stocks');?>
" class="dropdown-item">Supplier Part stocks</a></li>
                              <li><a href="<?php echo base_url('part_stocks_inhouse');?>
" class="dropdown-item">Inhouse Part stocks</a></li>
                              <li><a href="<?php echo base_url('fw_stock');?>
" class="dropdown-item">FG Stock</a></li>
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
                        <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null)) {?>
                           <li class="dropdown-submenu ">
                              <a href="javascript:void(0)" role="button" data-toggle="dropdown"
                                aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">Production QTY</a>
                              <ul class="dropdown-menu">
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
                           <li class="dropdown-submenu ">
                              <a  href="javascript:void(0)" role="button" data-toggle="dropdown"  aria-expanded="false"
                                 class="dropdown-item dropdown-toggle">
                              Molding Production </a>
                              <ul  class="dropdown-menu ">
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
                     </ul>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkQuality" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Quality
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkQualitySubmenu">
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
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkPnS" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Planning & Sales
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkPnSSubmenu">
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Sale Invoice</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('new_sales');?>
" class="dropdown-item">Create Sale Invoice</a></li>
                              <li><a href="<?php echo base_url('sales_invoice_released');?>
" class="dropdown-item">View sale Invoice</a></li>
                              <li><a href="<?php echo base_url('rejection_invoices');?>
" class="dropdown-item">Rejection Invoice</a></li>
                              <li><a href="<?php echo base_url('rejection_flow');?>
" class="dropdown-item">Rejection Flow</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Customer</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('customer_parts_master');?>
" class="dropdown-item">Part Master</a></li>
                              <li><a href="<?php echo base_url('customer');?>
" class="dropdown-item">Customers</a></li>
                              <li><a href="<?php echo base_url('customer_master');?>
" class="dropdown-item">Customer Master</a></li>
                              <li><a href="<?php echo base_url('consignee');?>
" class="dropdown-item">Consignee</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Customer PO QTY Tracking</a>
                           <ul class="dropdown-menu">
                              <?php if (($_smarty_tpl->tpl_vars['entitlements']->value['po_import_export'] != null)) {?>
                                 <li><a href="<?php echo base_url('customer_po_tracking_importExport');?>
"
                                    class="dropdown-item">Import/Export PO Tracking</a></li>
                              <?php }?>
                              <li><a href="<?php echo base_url('customer_po_tracking');?>
" class="dropdown-item">create Po QTY Tracking</a></li>
                              <li><a href="<?php echo base_url('customer_po_tracking_all');?>
" class="dropdown-item">View pending</a></li>
                              <li><a href="<?php echo base_url('customer_po_tracking_all_closed');?>
" class="dropdown-item">View Closed</a></li>
                           </ul>
                        </li>
                        <?php if (($_smarty_tpl->tpl_vars['role']->value == "Sales" || $_smarty_tpl->tpl_vars['role']->value == "Admin")) {?>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Customer Scheduling</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('planning_year_page');?>
" class="dropdown-item">Monthly Plan</a></li>
                              <li><a href="<?php echo base_url('planning_shop_order_details');?>
" class="dropdown-item">Shop Order details</a></li>
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
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Inhouse Parts</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('inhouse_parts');?>
" class="dropdown-item">Add Item</a></li>
                              <li><a href="<?php echo base_url('inhouse_parts_view');?>
" class="dropdown-item">View Item</a></li>
                           </ul>
                        </li>
                        <?php }?>
                     </ul>
                  </li>
                  <?php }?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkReport" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Reports
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkReportSubmenu">
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
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLinkAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Admin
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkAdminSubmenu">
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Approval</a>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('supplier');?>
" class="dropdown-item">Supplier</a></li>
                              <li><a href="<?php echo base_url('child_part_supplier_admin');?>
" class="dropdown-item">Supplier Part Price</a></li>
                              <li><a href="<?php echo base_url('pending_po');?>
" class="dropdown-item">Po Approval</a></li>
                              <li><a href="<?php echo base_url('child_parts');?>
" class="dropdown-item">Child Part Stock Update</a></li>
                              <li><a href="<?php echo base_url('inhouse_parts_admin');?>
" class="dropdown-item">Inhouse Part Stock Update</a></li>
                              <li><a href="<?php echo base_url('customer_parts_admin');?>
" class="dropdown-item">Customer Part Stock Update</a></li>
                           </ul>
                        </li>
                        <li class="dropdown-submenu">
                           <a href="javascript:void(0)" class="dropdown-toggle dropdown-item" data-toggle="dropdown" aria-expanded="false">Master</a>
                           <ul class="dropdown-menu">
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
                                 <?php }?>
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
                        <!-- <li><a class="dropdown-item" href="#">Approval</a></li>
                           <li><a class="dropdown-item" href="#">Master</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">User</a></li>
                        <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Configurations</a></li>
                     </ul>
                  </li>
                  <?php }?>
                  <li class="nav-item">
                    <a href="<?php echo base_url('logout');?>
" class="nav-link">Logout</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- Content wrapper -->
      <div class="content-wrapper">
      <!-- Content --><?php }
}
