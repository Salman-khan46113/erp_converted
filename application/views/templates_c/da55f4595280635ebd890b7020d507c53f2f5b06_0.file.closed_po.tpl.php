<?php
/* Smarty version 4.3.2, created on 2024-06-10 19:54:57
  from '/var/www/html/extra_work/ERP_REFRESH_MAIN/application/views/templates/purchase/closed_po.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66670cb999a557_22917085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da55f4595280635ebd890b7020d507c53f2f5b06' => 
    array (
      0 => '/var/www/html/extra_work/ERP_REFRESH_MAIN/application/views/templates/purchase/closed_po.tpl',
      1 => 1718029497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66670cb999a557_22917085 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="width: 100%" class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Closed PO</h1>
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
                        <div class="card">
                           <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>PO Number</th>
                                            <th>PO Date</th>
                                            <th>Created Date</th>
                                            <th>Remark</th>
                                            <th>Download PDF PO</th>
                                            <th>View PO Details</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                     	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php if ($_smarty_tpl->tpl_vars['new_po']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_po']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_number;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->po_date;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->created_date;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value->closed_remark;?>
</td>
                                                    <td>
                                                       <a href="<?php echo base_url('download_my_pdf/');
echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary" href="">Download</a>
                                                    </td>
                                                    <td><a href="<?php echo base_url('view_new_po_by_id/');
echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" class="btn btn-primary" href="">PO Details</a></td>
                                                </tr>

                                        	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                            
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
