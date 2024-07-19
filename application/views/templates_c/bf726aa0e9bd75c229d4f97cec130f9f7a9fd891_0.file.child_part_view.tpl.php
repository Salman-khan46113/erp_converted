<?php
/* Smarty version 4.3.2, created on 2024-06-25 15:00:44
  from '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/child_part_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667a8e443b2205_93802875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf726aa0e9bd75c229d4f97cec130f9f7a9fd891' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/child_part_view.tpl',
      1 => 1718900934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667a8e443b2205_93802875 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Content wrapper -->

<?php $_smarty_tpl->_assignInScope('entitlements', $_smarty_tpl->tpl_vars['session_data']->value['entitlements']);?>
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
          Master
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Item</em></a>
        </h1>
        <br>
        <span >Item Part List</span>
      </div>
    </nav>
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>
    <!-- Responsive Table -->
    <div class="card p-0 mt-4">
      <div class="table-responsive text-nowrap">
      <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="child_part_view">
      <thead>
          <tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'val', false, 'key');
$_smarty_tpl->tpl_vars['val']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->do_else = false;
?>
              <th><b>Search <?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</b></th>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </tr>
      </thead>
      <tbody></tbody>
  </table>

      </div>
    </div>
    <!--/ Responsive Table -->
  </div>
  <!-- / Content -->

 <div class="modal fade" id="child_part_update" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="POST" enctype='multipart/form-data' id="updatechildpart">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="part_number">Part Number</label><span class="text-danger">*</span>
                                    <input readonly type="text" value="" name="part_number"  class="form-control"  aria-describedby="emailHelp" placeholder="Part Number" id="part_number" />
                                    <input type="hidden" name="part_id" value="" id="part_id" />
                                    <input type="hidden" name="filter_child_part_id" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Client_name">Part Description</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="part_description" id="part_description" class="form-control"  aria-describedby="emailHelp" placeholder="Part Description" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="safty_buffer_stk">Safety Buffer Stock</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="saft__stk" id="saft__stk" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="hsn_code">HSN Code</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="hsn_code" id="hsn_code" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Purchase Item Category</label><span class="text-danger">*</span>
                                    <select class="form-control select2-init" name="sub_type" id="sub_type" style="width: 100%;">
                                        <option value="Regular grn">Regular GRN</option>
                                        <option value="RM">RM</option>
                                        <option value="Subcon grn">Subcon GRN</option>
                                        <option value="Subcon Regular">Subcon Regular</option>
                                        <option value="consumable">Consumable</option>
                                        <option value="customer_bom">Customer BOM</option>
                                        <option value="asset">Asset</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="store_rack_location">Store Rack Location</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="store_rack_location" id="store_rack_location" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="safty_buffer_stk">UOM Name</label><span class="text-danger">*</span>
                                    <!-- <input readonly type="text" value="" name="uom_name" id="uom_name" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" /> -->
                                     <select class="form-control select2-init" name="uom_id" id="uom_id" style="width: 100%;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uom']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                          <option <?php if (($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['po']->value->uom_id)) {?>selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                              <?php echo $_smarty_tpl->tpl_vars['c']->value->uom_name;?>

                                          </option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                      </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Max UOM</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="max_uom" id="max_uom" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Store Stock Rate</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="store_stock_rate" id="store_stock_rate" class="form-control"  aria-describedby="emailHelp" placeholder="Part Specification" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Weight</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="weight" id="weight" class="form-control"  aria-describedby="emailHelp" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Size</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="size" id="size" class="form-control"  aria-describedby="emailHelp" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Thickness</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="thickness" id="thickness" class="form-control"  aria-describedby="emailHelp" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_uom">Grade</label><span class="text-danger">*</span>
                                    <input type="text" value="" name="grade" id="grade" class="form-control"  aria-describedby="emailHelp" />
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer m-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?php echo '<script'; ?>
>
    var column_details =  <?php echo json_encode($_smarty_tpl->tpl_vars['data']->value);?>
;
    var page_length_arr = <?php echo json_encode($_smarty_tpl->tpl_vars['page_length_arr']->value);?>
;
    var is_searching_enable = <?php echo json_encode($_smarty_tpl->tpl_vars['is_searching_enable']->value);?>
;
    var is_top_searching_enable =  <?php echo json_encode($_smarty_tpl->tpl_vars['is_top_searching_enable']->value);?>
;
    var is_paging_enable =  <?php echo json_encode($_smarty_tpl->tpl_vars['is_paging_enable']->value);?>
;
    var is_serverSide =  <?php echo json_encode($_smarty_tpl->tpl_vars['is_serverSide']->value);?>
;
    var no_data_message =  <?php echo json_encode($_smarty_tpl->tpl_vars['no_data_message']->value);?>
;
    var is_ordering =  <?php echo json_encode($_smarty_tpl->tpl_vars['is_ordering']->value);?>
;
    var sorting_column = <?php echo $_smarty_tpl->tpl_vars['sorting_column']->value;?>
;
    var api_name =  <?php echo json_encode($_smarty_tpl->tpl_vars['api_name']->value);?>
;
    var base_url = <?php echo json_encode($_smarty_tpl->tpl_vars['base_url']->value);?>
;
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/js/purchase/add_child_part.js"><?php echo '</script'; ?>
>
<?php }
}
