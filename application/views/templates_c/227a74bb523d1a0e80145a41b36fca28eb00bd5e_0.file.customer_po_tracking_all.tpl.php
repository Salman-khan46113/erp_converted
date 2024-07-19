<?php
/* Smarty version 4.3.2, created on 2024-06-20 14:53:58
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking_all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673f52ec14cb1_68897883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '227a74bb523d1a0e80145a41b36fca28eb00bd5e' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking_all.tpl',
      1 => 1718874413,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673f52ec14cb1_68897883 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="width: 2000px" class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer PO QTY Tracking</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                        <!-- /.card -->

                        <div class="card"><!--
                            <div class="card-header">
                                <div class="row">
                                     <div class="col-lg-2">
                                            <div class="form-group">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
inwarding_by_po" method="POST">
                                                <label for="">Enter PO Number <span class="text-danger">*</span> </label>
                                                <input type="text" name="po_number" class="form-control" required placeholder="Enter Valid PO Number : ">
                                            </div>

                                    </div>
                                    <div class="col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success mt-4">Search</button>
                                            </div>
                                            </form>

                                    </div> 
                                </div>

                            </div>-->

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Customer</th>
                                            <th>PO Number</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Amendment No</th>
                                            <th>Status</th>
                                            <th>View Details</th>
                                            <!-- <th>Close PO</th>-->
                                            <th>PO Document</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php if ($_smarty_tpl->tpl_vars['customer_po_tracking']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_po_tracking']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                               
                                                <?php if ($_smarty_tpl->tpl_vars['s']->value->status != "closed") {?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['customer_data']->value[$_smarty_tpl->tpl_vars['s']->value->customer_id][0]->customer_name;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_start_date;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_end_date;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_amedment_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->status;?>
</td>
                                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_customer_tracking_id/<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary">PO Details</a></td>
                                                        <td>
                                                            <?php if ($_smarty_tpl->tpl_vars['s']->value->uploadedDoc != '') {?>
                                                                <a download href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
documents/<?php echo $_smarty_tpl->tpl_vars['s']->value->uploadedDoc;?>
" id="" class="btn btn-sm btn-primary remove_hoverr"><i class="fas fa-download"></i></a>
                                                            <?php }?>
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadDocument<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><i class="fas fa-upload"></i></button>

                                                            <!-- Upload Modal -->
                                                            <div class="modal fade" id="uploadDocument<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Upload file</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
add_part" method="post" enctype='multipart/form-data'>
                                                                                <div class="text-center">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                        <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                    </div>
                                                                                    <input value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" type="hidden" name="uid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
                                                                                    <input type="hidden" name="table_name" value="customer_po_tracking">
                                                                                    <input type="hidden" name="column_name" value="uploadedDoc">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editenew<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </button>
                                                            <div class="modal fade" id="editenew<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
update_customer_po_tracking_all" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">
                                                                                    <label for="">End Date<span class="text-danger">*</span></label>
                                                                                    <input required value="<?php echo $_smarty_tpl->tpl_vars['s']->value->po_end_date;?>
" type="date" class="form-control" name="end_date">
                                                                                    <input required value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" type="hidden" class="form-control" name="id">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#close<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                                Close PO
                                                            </button>
                                                            <div class="modal fade" id="close<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Close PO</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
close_po_customer_po_tracking" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">
                                                                                    <label for="">Are you sure to close <u>PO Number : <?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
</u> ?</label>
                                                                                    <br><br>
                                                                                    <input required value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" type="hidden" class="form-control" name="id">
                                                                                    <label for="">Remark<span class="text-danger"></span></label>
                                                                                    <input type="text" name="remark" placeholder="Enter Remark " class="form-control"/>
                                                                                    <label for="">Reason<span class="text-danger">*</span> </label>
                                                                                    <select name="reason" required id="" class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        <option value="Withdraw">Withdraw</option>
                                                                                        <option value="Completed">Completed</option>
                                                                                    </select>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                            </div>
                            <!-- /.card-header -->

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
