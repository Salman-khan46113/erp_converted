<?php
/* Smarty version 4.3.2, created on 2024-06-20 14:54:06
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking_all_closed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673f53623b615_41280118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb0b02b263b366ffb9d95a91407bddc9ce0b597a' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking_all_closed.tpl',
      1 => 1718874912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673f53623b615_41280118 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <h1>Closed Customer PO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                        <!-- /.card -->

                        <div class="card">
                        <!-- <div class="card-header">
                                <h3 class="card-title">Serch PO Number</h3>
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
                                            <th>Reason</th>
                                            <th>Remark</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php if ($_smarty_tpl->tpl_vars['customer_po_tracking']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_po_tracking']->value, 's', false, 'i');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
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
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->reason;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->remark;?>
</td>
                                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
view_customer_tracking_id/<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary">PO Details</a></td>
                                                </tr>
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
