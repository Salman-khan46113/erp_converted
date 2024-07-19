<?php
/* Smarty version 4.3.2, created on 2024-06-20 14:52:53
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/view_customer_tracking_id.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673f4ed8ea465_53684090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45f81056251439941c4b884447639db3c528f52' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/view_customer_tracking_id.tpl',
      1 => 1718875119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673f4ed8ea465_53684090 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/extra/erp_converted/application/third_party/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div  class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                       <?php $_smarty_tpl->_assignInScope('expired', "no");?>
                        <?php if (empty($_smarty_tpl->tpl_vars['new_po']->value[0]->process_id)) {?>
                            <?php $_smarty_tpl->_assignInScope('type', "normal");?>
                        <?php } else { ?> 
                            <?php $_smarty_tpl->_assignInScope('type', "Subcon grn");?>
                        <?php }?>
                        <a  class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
customer_po_tracking_all">
                            < Back</a>
                    </div>
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
generate_po">Home </a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                             <label for="">Customer Name <span class="text-danger"></span></label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->customer_name;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Number<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->po_number;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Start Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->po_start_date;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO End Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->po_end_date;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Amendment No</span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->po_amedment_number;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->status;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Created Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->created_date;?>
</label></span>
                                        </div>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->status == 'closed') {?>
                                     <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Remark<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->remark;?>
</label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Reason<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->reason;?>
</label></span>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    <!--<div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Expiry Date <span class="text-danger">*</span> </label>
                                                    <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['new_po']->value[0]->expiry_po_date;?>
" class="form-control">
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                            <div class="card-header">
                                <?php if (true || $_smarty_tpl->tpl_vars['new_po']->value[0]->expiry_po_date <= date('Y-m-d') || true) {?>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
add_parts_customer_trackings" method="post">
                                                    <label for="">Select Part Number // Description <span class="text-danger">*</span> </label>
                                                    <select name="part_id" id="" required class="form-control select2">
                                                        <?php if ($_smarty_tpl->tpl_vars['customer_part_data']->value) {?>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part_data']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
 // <?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>

                                                                </option>
                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        <?php }?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Enter Qty <span class="text-danger">*</span> </label>
                                                <input type="number" step="any" name="qty" placeholder="Enter QTY " required class="form-control">
                                                <input type="hidden" name="customer_po_tracking_id" value="<?php echo $_smarty_tpl->tpl_vars['customer_po_tracking']->value[0]->id;?>
" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-lg mt-4">Add Part to Tracking
                                                </button>
                                            </div>
                                        </div>
                                       </form>
                                    </div>
                                <?php } else { ?>
                                    Po  Expired!!
                                <?php }?>
                            </div>
                            <div class="card-header">
                                <?php if ($_smarty_tpl->tpl_vars['po_parts']->value) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['new_po']->value[0]->status == "pending") {?>
                                        <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'Admin') {?>
                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#lock">
                                                Lock PO
                                            </button>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['new_po']->value[0]->status == "lock") {?>
                                    <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'Admin') {?>
                                        <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                            Accept (Released) PO
                                        </button>
                                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete">
                                            Reject (delete) PO
                                        </button>
                                    <?php }?>
                                <?php } else { ?>
                                    <?php if ($_smarty_tpl->tpl_vars['new_po']->value[0]->status != "pending") {?>
                                        <button type="button" disabled class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                            PO Already Released
                                        </button>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
download_my_pdf/<?php echo $_smarty_tpl->tpl_vars['new_po']->value[0]->id;?>
" class="btn btn-primary" href="">Download</a>
                                    <?php }?>
                                <?php }?>
                                <!-- Modal -->
                                <div class="modal fade" id="accpet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
accept_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Released This PO?</b> </label>
                                                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['new_po']->value[0]->id;?>
" required class="form-control">
                                                                <input type="hidden" name="status" value="accpet" required class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
accept_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Lock This PO?</b></label>
                                                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['new_po']->value[0]->id;?>
" required class="form-control">
                                                                <input type="hidden" name="status" value="lock" required class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
delete_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Delete This PO?</b> </label>
                                                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['new_po']->value[0]->id;?>
" required class="form-control">
                                                                <input type="hidden" name="status" value="reject" required class="form-control">
                                                                <input type="hidden" name="table_name" value="new_po" required class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Part Price</th>
                                            <th>QTY</th>
                                            <th>Cumulative Sales Qty</th>
                                            <th>Balance QTY</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($_smarty_tpl->tpl_vars['parts_customer_trackings']->value) {?>
                                            <?php $_smarty_tpl->_assignInScope('final_po_amount', 0);?>
                                            <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parts_customer_trackings']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                               
                                                <?php $_smarty_tpl->_assignInScope('start_date', smarty_modifier_date_format($_smarty_tpl->tpl_vars['new_po']->value[0]->po_start_date,"%d-%m-%Y"));?>
                                                <?php $_smarty_tpl->_assignInScope('end_date', smarty_modifier_date_format($_smarty_tpl->tpl_vars['new_po']->value[0]->po_end_date,"%d-%m-%Y"));?>

                                                <?php if ($_smarty_tpl->tpl_vars['sales_qty_data']->value) {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['sales_qty_data']->value[$_smarty_tpl->tpl_vars['p']->value->part_id][0]->MAINSUM > 0) {?>
                                                        <?php $_smarty_tpl->_assignInScope('sales_qty', ((string)$_smarty_tpl->tpl_vars['sales_qty_data']->value[$_smarty_tpl->tpl_vars['p']->value->part_id][0]->MAINSUM));?>
                                                        <?php } else { ?>
                                                        <?php $_smarty_tpl->_assignInScope('sales_qty', "0");?>
                                                    <?php }?>
                                                    <?php $_smarty_tpl->_assignInScope('balance_qty', $_smarty_tpl->tpl_vars['p']->value->qty-$_smarty_tpl->tpl_vars['sales_qty']->value);?>
                                                <?php }?>
                                                
                                                <tr>
                                                    
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['p']->value->part_id][0]->part_number;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['p']->value->part_id][0]->part_description;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_rate']->value[$_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['p']->value->part_id][0]->id][0]->rate;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->qty;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['sales_qty']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['balance_qty']->value;?>
</td>
                                                    <td>
                                                        <?php if ($_smarty_tpl->tpl_vars['new_po']->value[0]->status == "pending") {?>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelete<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
update_parts_customer_trackings" method="POST">
                                                                                        <label for="">Enter Qty <span class="text-danger">*</span></label>
                                                                                        <input type="number" name="qty" value="<?php echo $_smarty_tpl->tpl_vars['p']->value->qty;?>
" placeholder="Enter QTY " required class="form-control">
                                                                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" required class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="exampleModaldelete<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
delete" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""> <b>Are You Sure Want To Delete This ? </b> </label>
                                                                                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" required class="form-control">
                                                                                            <input type="hidden" name="table_name" value="parts_customer_trackings" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <?php if ($_smarty_tpl->tpl_vars['po_parts']->value) {?>
                                            <tr>
                                                <th colspan="11">Total</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['final_po_amount']->value;?>
</th>
                                            </tr>
                                        <?php }?>
                                    </tfoot>
                                </table>
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
   
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper --><?php }
}
