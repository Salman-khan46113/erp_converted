<?php
/* Smarty version 4.3.2, created on 2024-06-19 10:52:07
  from '/var/www/html/extra_work/erp_converted/application/views/templates/sales/sales_invoice_released.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66726affc86b34_85590887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0879ffe287ba4eb875f2de5e649842850f4a67f4' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/sales/sales_invoice_released.tpl',
      1 => 1718774197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66726affc86b34_85590887 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">

                                </h3>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->
                            </div>
                            <!-- Modal -->
                            <!-- 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('add_job_card');?>
" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="po_num">Select Customer Name / Customer Code / Part Number / Description </label><span class="text-danger">*</span>
                                                            <select name="customer_part_id" id="" class="from-control select2">
                                                                <?php if ($_smarty_tpl->tpl_vars['customer_part']->value) {?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                        <?php $_smarty_tpl->_assignInScope('customer', $_smarty_tpl->tpl_vars['this']->value->Crud->get_data_by_id("customer",$_smarty_tpl->tpl_vars['c']->value['customer_id'],"id"));?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customer']->value[0]['customer_name'];?>
/<?php echo $_smarty_tpl->tpl_vars['customer']->value[0]['customer_code'];?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value['part_number'];?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value['part_description'];?>
</option>
                                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                <?php }?>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Required Quantity </label><span class="text-danger">*</span>
                                                            <input type="number" name="req_qty" placeholder="Enter Quantity" min="1" value="" class="form-control">

                                                        </div>
                                                    </div>

                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                            <div class="card-header">
                            <div class="row">
                                    <div class="col-lg-2">
                                        <form action="<?php echo base_url('sales_invoice_released');?>
" method="post">
                                        <div class="form-group">
                                            <label for="">Select Month  <span class="text-danger">*</span></label>
                                            <select required name="created_month" id="" class="form-control select2">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month_data']->value, 'val', false, 'key');
$_smarty_tpl->tpl_vars['val']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->do_else = false;
?>
                                            <option <?php if ($_smarty_tpl->tpl_vars['month_number']->value[$_smarty_tpl->tpl_vars['key']->value] == $_smarty_tpl->tpl_vars['created_month']->value) {?>selected<?php }?>
                                                value="<?php echo $_smarty_tpl->tpl_vars['month_number']->value[$_smarty_tpl->tpl_vars['key']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Year  <span class="text-danger">*</span></label>
                                            <select required name="created_year" id="" class="form-control select2">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, range(2022,2027), 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
                                                    <option <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['created_year']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <br><input type="submit" class="btn btn-primary mt-2"value="Search">
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
                                            <th>Sr.No.</th>
                                            <th>Invoice Date</th>
                                            <th>Vehicle Number</th>
                                            <th>Sales Invoice Number</th>
                                            <th>Customer</th>
                                            <th>View Details</th>
                                            <th>PDI</th>
                                            <th>E-Invoice Details</th>
                                            <th>Status</th>
                                            <th>E-Invoice Status</th>
                                            <th>Is EWay-Bill Available</th>
                                            <th>Total Price (Rs.)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $_smarty_tpl->_assignInScope('srNo', 1);?>
                                        <?php if ($_smarty_tpl->tpl_vars['new_sales']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_sales']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                
                                                <?php if ((isset($_smarty_tpl->tpl_vars['c']->value->status))) {?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['srNo']->value;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->created_date;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->vehicle_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->sales_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_new_sales_by_id/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_PDI_inspection_report/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <?php if ($_smarty_tpl->tpl_vars['c']->value->status != "pending") {?>
                                                            <a class="btn btn-primary btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_e_invoice_by_id/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><i class="fas fa-eye"></i></a>
                                                            <?php }?>
                                                        </td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->status;?>
</td>
                                                       
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->Status;?>
</td>
                                                        <td><?php if ((isset($_smarty_tpl->tpl_vars['c']->value->Status))) {
echo $_smarty_tpl->tpl_vars['c']->value->EwbStatus;
}?></td>
                                                        <?php $_smarty_tpl->_assignInScope('sales_id', $_smarty_tpl->tpl_vars['c']->value->id);?>
                                                        
                                                        <td><?php echo number_format($_smarty_tpl->tpl_vars['final_po_amount']->value[$_smarty_tpl->tpl_vars['sales_id']->value],2);?>
</td>
                                                        <td>
                                                            
                                                            <?php if ($_smarty_tpl->tpl_vars['c']->value->status != "Cancelled" && (empty($_smarty_tpl->tpl_vars['c']->value->Status) || $_smarty_tpl->tpl_vars['c']->value->Status == "CANCELLED")) {?>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cancelInvoice<?php echo $_smarty_tpl->tpl_vars['srNo']->value;?>
">Cancel</button>&nbsp;
                                                            <?php }?>
                                                            <?php if ($_smarty_tpl->tpl_vars['c']->value->status == "pending") {?>
                                                            <button type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target="#deleteInvoice<?php echo $_smarty_tpl->tpl_vars['srNo']->value;?>
"><i class="fas fa-trash"></i></button>
                                                            <?php }?>

                                                            <div class="modal fade" id="cancelInvoice<?php echo $_smarty_tpl->tpl_vars['srNo']->value;?>
" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo base_url('cancel_sale_invoice');?>
" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""><b>Are you sure want to Cancel this invoice?</b> </label>
                                                                                            <input type="hidden" name="sales_id" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" required class="form-control">
                                                                                            <input type="hidden" name="sales_number" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->sales_number;?>
" required class="form-control">
                                                                                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->status;?>
" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- delete model -->
                                                            <div class="modal fade" id="deleteInvoice<?php echo $_smarty_tpl->tpl_vars['srNo']->value;?>
" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Invoice</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo base_url('delete_sale_invoice');?>
" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""><b>Are you sure want to Delete this invoice?</b> </label>
                                                                                            <input type="hidden" name="sales_id" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" required class="form-control">
                                                                                            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->status;?>
" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $_smarty_tpl->_assignInScope('srNo', $_smarty_tpl->tpl_vars['srNo']->value+1);?>
                                                <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </tbody>

                                    <!-- Pagination code
                                    
                                    <p><?php echo $_smarty_tpl->tpl_vars['links']->value;?>
</p>
                                    <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
                                    
                                    -->
                                </table>
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
<?php }
}
