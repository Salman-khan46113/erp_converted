<?php
/* Smarty version 4.3.2, created on 2024-08-25 00:11:19
  from 'C:\xampp\htdocs\erp_converted\application\views\templates\admin\operations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66ca294fe7b1c6_76884614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c747e8757b2c445caf0e2ff4430a420c56f76364' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erp_converted\\application\\views\\templates\\admin\\operations.tpl',
      1 => 1724524770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ca294fe7b1c6_76884614 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme filter-popup-block" style="width: 0px;">
      <div class="app-brand demo justify-content-between">
        <a href="javascript:void(0)" class="app-brand-link">
          <span class="app-brand-text demo menu-text fw-bolder ms-2">Filter</span>
        </a>
        <div class="close-filter-btn d-block filter-popup cursor-pointer">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <nav class="sidebar-nav scroll-sidebar filter-block" data-simplebar="init">
        <div class="simplebar-content" >
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Part Number</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="child_part_id" class="form-control select2" id="part_number_search">
                    <option value="">Select Part Number</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_part_list']->value, 'parts');
$_smarty_tpl->tpl_vars['parts']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['parts']->value) {
$_smarty_tpl->tpl_vars['parts']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['parts']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parts']->value->part_number;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Part Description</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="part_description_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>

          </ul>
        </div>
      </nav>
      <div class="filter-popup-btn">
        <button class="btn btn-outline-danger reset-filter">Reset</button>
        <button class="btn btn-primary search-filter">Search</button>
      </div>
    </aside>

    <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Admin
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Master</em></a>
          </h1>
          <br>
          <span >Operation Number</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
               <button type="button" class="btn btn-seconday" data-bs-toggle="modal" data-bs-target="#addPromo" title="Add Operations">
          <i class="ti ti-plus"></i>
        </button>

      </div>

      <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  </button>
               </div>
               <form action="<?php echo base_url('add_operations');?>
" method="POST" enctype="multipart/form-data" id="add_opration">
               <div class="modal-body">
                     <div class="form-group">
                        <label for="on click url">Operation Number <span class="text-danger">*</span></label> <br>
                        <input required type="text" name="namess" placeholder="Enter Operation Number" class="form-control" value="" id="">
                     </div>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
               </form>
               </div>
            </div>
         </div>
      </div>


      <!-- Main content -->
      <div class="card p-0 mt-4">


          <div class="table-responsive text-nowrap">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="operations">
              <thead>
                 <tr>
                    <th>Sr No</th>
                    <th> Operation Number</th>
                    <th>Actions</th>
                 </tr>
              </thead>
              <tbody>
                 <?php $_smarty_tpl->_assignInScope('i', 1);?>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operations']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
                 <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
</td>
                    <td>
                       <!-- Button trigger modal -->
                       <button type="button" class="btn no-btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit" data-value='<?php echo base64_encode(json_encode($_smarty_tpl->tpl_vars['u']->value));?>
'>
                       <i class="ti ti-edit"></i>
                       </button>
                       <!-- edit Modal -->
                      
                       <!-- edit Modal -->
                       <!-- delete Modal -->
                       <div class="modal fade" id="delete<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                   <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                                </div>
                                <div class="modal-body">
                                   <form action="<?php echo base_url('delete_customer');?>
" method="POST" enctype="multipart/form-data">
                                      Are You Sure Want To Delete This?
                                      <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" type="hidden" class="form-control" name="id">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
                             </div>
                          </div>
                       </div>
                       <!-- delete Modal -->
                    </td>
                 </tr>
                  <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tbody>
           </table>
          </div>

        <!--/ Responsive Table -->
      </div>
      <!-- /.col -->

      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

               </button>
            </div>
            <div class="modal-body">
               <form action="<?php echo base_url('update_operations');?>
" method="POST" enctype="multipart/form-data" id="update_operation">
                  <div class="form-group">
                     <label for="">Operation Number <span class="text-danger">*</span></label>
                     <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
" type="text" class="form-control" name="namess">
                     <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" type="hidden" class="form-control" name="id">
                  </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
         </div>
      </div>
   </div>


      <div class="content-backdrop fade"></div>
    </div>


    <?php echo '<script'; ?>
 type="text/javascript">
    var base_url = <?php echo json_encode($_smarty_tpl->tpl_vars['base_url']->value);?>

    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/admin/operations.js"><?php echo '</script'; ?>
>
<?php }
}