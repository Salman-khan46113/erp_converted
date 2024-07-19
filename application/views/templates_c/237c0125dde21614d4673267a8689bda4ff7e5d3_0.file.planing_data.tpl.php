<?php
/* Smarty version 4.3.2, created on 2024-06-20 18:31:35
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/planing_data.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6674282f478686_97832109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '237c0125dde21614d4673267a8689bda4ff7e5d3' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/planing_data.tpl',
      1 => 1718884228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6674282f478686_97832109 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>Planning Data</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <div class="col-6"> -->
                                <h3 class="card-title"></h3>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add Planing</button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal1212">
                                    Add FG Stock</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1212" role="dialog"
                                    aria-labelledby="exampleModal1212Label" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1212Label">Add FG Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
add_planning_fg_stock"
                                                    method="POST">
                                                    <div class="row">
                                                    <div class="col-lg-12">
                                                            <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="customer_id" id="customer_tracking1" required id="" class="form-control select2">
                                                                <option value=''>Select</option>
                                                                <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value->customer_name;?>
</option>
                                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                <?php }?>
                                                            </select> 
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Select Customer Part Number / Description
                                                                <span class="text-danger">*</span> </label>
                                                                <select name="customer_part_id1" id="customer_part_id1" required class="form-control select2">
                                                                    <option value=''>Please select</option>
                                                                </select>
                                                            </div>

                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Select Month
                                                                    </label><span class="text-danger">*</span>
                                                                    <select name="month_id" id=""
                                                                        class="form-control select2">
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
">
                                                                            <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Production
                                                                        Quantity</label><span
                                                                        class="text-danger">*</span>
                                                                    <input type="number" required name="fg_stock"
                                                                        class="form-control">
                                                                    <input type="hidden" required name="financial_year"
                                                                        value="<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
"
                                                                        class="form-control">
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End-->

                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_all_child_parts_schedule/<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"
                                    class="btn btn-primary">
                                    Monthly MRP Req</a>
                                <!-- </div>
                                <div class="col-6" style="align:right;"> -->
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exportCustomerPartsOnly">
                                    Export Format</button>

                                <!-- Export Modal -->
                                <div class="modal fade" id="exportCustomerPartsOnly" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Export Customer Data for Planning Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
planning_export_customer_part"
                                                    method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <label for="contractorName">Customer</label><span
                                                                class="text-danger">*</span>
                                                            <select name="customer_id" id=""
                                                                class="form-control select2" required>
                                                                <option value="">Select</option>
                                                                <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
</option>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
"
                                                    class="hidden" name="financial_year">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"
                                                    class="hidden" name="month">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Export</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#importCustomerPartsOnly">
                                    Import Data</button>
                                
                                 <!-- Import Modal -->
                                 <div class="modal fade" id="importCustomerPartsOnly" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Planning Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
import_customer_planning" 
                                                method="POST" enctype='multipart/form-data'>
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <label>Customer</label><span
                                                                class="text-danger">*</span>
                                                            <select name="customer_id" id=""
                                                                class="form-control select2" required>
                                                                <option value="">Select</option>
                                                                <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
</option>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                <?php }?>
                                                            </select>
                                                            <div class="form-group">
                                                                <br><label for="po_num">Upload Plan</label><span
                                                                class="text-danger">*</span>
                                                                <input type="file" name="uploadedDoc" required class="form-control" id="exampleuploadedDoc" placeholder="Upload Plan" aria-describedby="uploadDocHelp">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['segment_2']->value;?>
"
                                                    class="hidden">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['segment_3']->value;?>
"
                                                    class="hidden">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                   
                                <!-- Add Planning Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Planing</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
add_planning_data"
                                                    method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="customer_id" id="customer_tracking" required id="" class="form-control select2">
                                                                <option value=''>Select</option>
                                                                <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                                   <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value->customer_name;?>
</option>
                                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                <?php }?>
                                                            </select> 
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Select Customer Part Number / Description
                                                                <span class="text-danger">*</span> </label>
                                                                <select name="customer_part_id" id="customer_part_id" required class="form-control select2">
                                                                    <option value=''>Please select</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Select Month
                                                                    </label><span class="text-danger">*</span>
                                                                    <select name="month_id" id=""
                                                                        class="form-control select2">
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
">
                                                                            <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">

                                                                <div class="form-group">
                                                                    <label for="contractorName">Enter Schedule Qty
                                                                    </label><span class="text-danger">*</span>
                                                                    <input type="number" required name="schedule_qty"
                                                                        class="form-control">
                                                                    <input type="hidden" required name="financial_year"
                                                                        value="<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
"
                                                                        class="form-control">
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <!-- Button trigger modal -->
                            <div class="row">
                                <div class="col-lg-2">
                                    <form
                                        action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
planing_data/<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
/0"
                                        method="post">
                                        <div class="form-group">
                                            <label for="">Select Customer</label>
                                            <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                 <option value="">Select</option>
                                                <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                <option <?php if ($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['customer_id']->value) {?> selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <?php }?>
                                                <option value="ALL">ALL</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="hidden" name="financial_year"
                                            value="<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
">
                                        <input type="hidden" name="month" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
">
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No..</th>
                                    <th>Customer Part Number</th>
                                    <th>Customer Part Description</th>
                                    <th>Customer Name</th>
                                    <th>Month </th>
                                    <th>Schedule Qty</th>
                                    <!--<th>Schedule Qty 2</th> -->
                                    <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isJobCard'] != null) {?>
                                    <th>Job Card Qumulative Qty</th>
                                    <th>Job Card Balance Qty</th>
                                    <th>Job Card Issued</th>
                                    <th>Job Card Closed</th>
                                    <?php }?>
                                    <!-- <th>Customer Part Price</th>-->
                                    <th>Dispatch (sales qty) </th>
                                    <th>Balance Schedule qty </th>
                                    <th>Subtotal Schedule </th>
                                    <!-- <th>Subtotal Schedule 2</th> -->
                                    <th class="noExport">View</th>
                                    <th class="noExport">Edit</th>
                                </tr>
                            </thead>
                                       
                            <tbody>
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php $_smarty_tpl->_assignInScope('total1', 0);?>
                                <?php $_smarty_tpl->_assignInScope('total2', 0);?>
                                <?php if ($_smarty_tpl->tpl_vars['planing_data']->value) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planing_data']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['month']->value == $_smarty_tpl->tpl_vars['t']->value->month) {?>
                                            <?php $_smarty_tpl->_assignInScope('issued', 0);?>
                                            <?php $_smarty_tpl->_assignInScope('closed', 0);?>
                                            <?php $_smarty_tpl->_assignInScope('main_qty', $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty);?>
                                            <?php $_smarty_tpl->_assignInScope('subtotal1', 0);?>
                                            <?php $_smarty_tpl->_assignInScope('rate', 0);?>
                                            <?php if ($_smarty_tpl->tpl_vars['customer_part_rate']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id]) {?>
                                                <?php $_smarty_tpl->_assignInScope('rate', $_smarty_tpl->tpl_vars['customer_part_rate']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->rate);?>
                                                <?php $_smarty_tpl->_assignInScope('subtotal1', $_smarty_tpl->tpl_vars['customer_part_rate']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->rate*$_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty);?>

                                                <?php $_smarty_tpl->_assignInScope('total1', $_smarty_tpl->tpl_vars['total1']->value+$_smarty_tpl->tpl_vars['subtotal1']->value);?>
                                            <?php }?>
                                            <?php $_smarty_tpl->_assignInScope('total_dispatched_qty', 0);?>
                                            <?php if ($_smarty_tpl->tpl_vars['sales_invoice']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id]) {?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sales_invoice']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id], 'sale');
$_smarty_tpl->tpl_vars['sale']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sale']->value) {
$_smarty_tpl->tpl_vars['sale']->do_else = false;
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['sale']->value->dispatched_qty > 0) {?>
                                                        <?php $_smarty_tpl->_assignInScope('dispatch_sales_qty', $_smarty_tpl->tpl_vars['sale']->value->dispatched_qty);?>
                                                    <?php } else { ?>
                                                        <?php $_smarty_tpl->_assignInScope('dispatch_sales_qty', 0);?>
                                                    <?php }?>
                                                    <?php $_smarty_tpl->_assignInScope('total_dispatched_qty', $_smarty_tpl->tpl_vars['total_dispatched_qty']->value+$_smarty_tpl->tpl_vars['dispatch_sales_qty']->value);?>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            <?php }?>
                                            <?php $_smarty_tpl->_assignInScope('balance_s_qty', $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty-$_smarty_tpl->tpl_vars['total_dispatched_qty']->value);?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['customer_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->part_number;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['customer_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->part_description;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['customers_data']->value[0]->customer_name;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value->month;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty;?>
</td>
                                    <!-- <td><?php echo $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty_2;?>
</td> -->
                                    <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isJobCard'] != null) {?>
                                    <td></td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty-$_smarty_tpl->tpl_vars['job_card_qty']->value;?>

                                    </td>

                                    <td><?php echo $_smarty_tpl->tpl_vars['issued']->value;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['closed']->value;?>
</td>
                                    <?php }?>
                                    <!-- <td><?php echo $_smarty_tpl->tpl_vars['rate']->value;?>
</td> -->
                                    <!-- <td><?php echo $_smarty_tpl->tpl_vars['subtotal1']->value;?>
-->
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['total_dispatched_qty']->value;?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['balance_s_qty']->value;?>

                                    </td>
                                    <td>
                                        Rs. <?php echo $_smarty_tpl->tpl_vars['subtotal1']->value;?>
 
                                    </td>
                                    <td class="noExport">
                                        <a class="btn btn-info"
                                            href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_planing_data/<?php echo $_smarty_tpl->tpl_vars['t']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['customer_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->customer_id;?>
"><i class="fas fa-eye"></i></a>
                                            <!-- Edit Modal -->
                                    </td>
                                    <td>
                                        <button title="Edit" type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editenew<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                                                               <div class="modal fade" id="editenew<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
update_planning_data"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="contractorName">Enter Schedule Qty</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['planing_data']->value[0]->schedule_qty;?>
" required name="schedule_qty"
                                                                    class="form-control">
                                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['t']->value->id;?>
"
                                                                    type="hidden" class="form-control"
                                                                    name="planning_id">
                                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['t']->value->customer_part_id;?>
"
                                                                    type="hidden" class="form-control"
                                                                    name="cust_part_id">
                                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['t']->value->month;?>
"
                                                                    type="hidden" class="form-control"
                                                                    name="month_id">
                                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['t']->value->financial_year;?>
"
                                                                    type="hidden" class="form-control"
                                                                    name="financial_year">
                                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['customer_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->customer_part_id][0]->customer_id;?>
"
                                                                    type="hidden" class="form-control"
                                                                    name="customer_id">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Modal Ends -->
                                    </td>
                                </tr>
                                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-lg-2" style="color: crimson;">
                                    <b>Total Sales Value: Rs. <?php echo $_smarty_tpl->tpl_vars['total1']->value;?>
</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php echo '<script'; ?>
>
    $(document).ready(function() {
        var customer_id = $("#customer_tracking").val();
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
            type: "POST",
            data: {
                id: customer_id
            },
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response) {
                    $('#customer_part_id').html(response);
                } else {
                    $('#customer_part_id').html(response);
                }
            }
        });

        $("#customer_tracking").change(function() {
            var customer_id = $("#customer_tracking").val();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customer_part_id').html(response);
                    } else {
                        $('#customer_part_id').html(response);
                    }
                }
            });
        });

        var customer_id = $("#customer_tracking1").val();
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
            type: "POST",
            data: {
                id: customer_id
            },
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response) {
                    $('#customer_part_id1').html(response);
                } else {
                    $('#customer_part_id1').html(response);
                }
            }
        });

        $("#customer_tracking1").change(function() {
            var customer_id = $("#customer_tracking1").val();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customer_part_id1').html(response);
                    } else {
                        $('#customer_part_id1').html(response);
                    }
                }
            });
        });

        $("#customerTracking").change(function() {
            var customer_id = $("#customerTracking").val();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customerPartId').html(response);
                    } else {
                        $('#customerPartId').html(response);
                    }
                }
            });
        });
    });
<?php echo '</script'; ?>
><?php }
}
