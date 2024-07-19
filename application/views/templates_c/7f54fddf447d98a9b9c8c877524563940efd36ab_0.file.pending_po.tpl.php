<?php
/* Smarty version 4.3.2, created on 2024-06-19 12:31:35
  from '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/pending_po.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6672824fb8b9c7_02114588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f54fddf447d98a9b9c8c877524563940efd36ab' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/pending_po.tpl',
      1 => 1718029403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6672824fb8b9c7_02114588 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
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
                        <h1>Pending PO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('');?>
">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                           
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier Name</th>
                                            <th>PO Number</th>
                                            <th>PO Expiry Date</th>
                                            <th>PO Date</th>
                                            <th>Created Date</th>
                                            <th>Download PDF PO</th>
                                            <th>Status</th>
                                            <th>View PO Details</th>
                                            <th>Close PO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                       
                                        <?php if (($_smarty_tpl->tpl_vars['new_po']->value)) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_po']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                <?php $_smarty_tpl->_assignInScope('expired', 'no');?>
                                                <?php if (($_smarty_tpl->tpl_vars['s']->value->expiry_po_date < date('Y-m-d'))) {?>
                                                                                                    <?php } else { ?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                        <!-- <td><?php echo '<?php'; ?>
 echo $child_part_data_new->supplier_name; <?php echo '?>'; ?>
</td> -->
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->supplier_name;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->expiry_po_date;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_date;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->created_date;?>
</td>
                                                        <td>
                                                            <?php if (($_smarty_tpl->tpl_vars['s']->value->status == "accept")) {?>
                                                           		<a href="<?php echo base_url('download_my_pdf/');
echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary" href="">Download</a>

                                                            <?php }?>
                                                        </td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['s']->value->status;?>
</td>

                                                        <td><a href="<?php echo base_url('view_new_po_by_id/');
echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary" href="">PO Details</a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                                Close PO
                                                            </button>
                                                            <div class="modal fade" id="edit<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
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
                                                                            <form action="<?php echo base_url('close_po');?>
" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">

                                                                                    <label for="">Are You Sure Want To Close <?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
 This PO? <span class="text-danger">*</span></label>
                                                                                    <input required value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" type="hidden" class="form-control" name="id">
                                                                                    <input required value="<?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
" type="hidden" class="form-control" name="po_number">
                                                                                </div>
                                                                                <div class="form-group">

                                                                                    <label for="">Remark<span class="text-danger">*</span></label>
                                                                                    <input required value="" placeholder="Enter Remark" type="text" class="form-control" class="form-control" name="remark">
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
    <!-- /.content-wrapper --><?php }
}
