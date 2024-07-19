<?php
/* Smarty version 4.3.2, created on 2024-06-20 18:31:42
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/view_all_child_parts_schedule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667428360ea922_91943371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a98a7dbd27ecb17b3892989d79aaa0a8d4d931f7' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/view_all_child_parts_schedule.tpl',
      1 => 1718888452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667428360ea922_91943371 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <h1>Monthly MRP Req</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div> -->
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
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <a class="btn btn-dark" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
planing_data/<?php echo $_smarty_tpl->tpl_vars['financial_year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
/0">Back</a>
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Update Schedule Qty 2 </button> -->
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add Planing</button> -->
                                <!-- Modal -->
                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Item part Number</th>
                                            <th>Item part Description</th>                                         
                                            <th>Actual Stock</th>
                                            <th>Net MRP Req</th>
                                            <th>Required Qty </th>
                                            <th>Part Rate</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php $_smarty_tpl->_assignInScope('total', 0);?>
                                      
                                        <?php if ($_smarty_tpl->tpl_vars['child_part_master']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part_master_main']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
                                                <?php $_smarty_tpl->_assignInScope('subtotal', 0);?>
                                                <?php $_smarty_tpl->_assignInScope('shortage_qty', 0);?>
                                                <?php $_smarty_tpl->_assignInScope('actual_stock', 0);?>
                                                <?php if ($_smarty_tpl->tpl_vars['child_part_master']->value[$_smarty_tpl->tpl_vars['t']->value->part_number]) {?>
                                                    
                                                    <?php $_smarty_tpl->_assignInScope('req_qty', 0);?>
                                                    <?php if ($_smarty_tpl->tpl_vars['planing_data']->value[$_smarty_tpl->tpl_vars['child_part_master']->value[0]->child_part_id]) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planing_data']->value[$_smarty_tpl->tpl_vars['child_part_master']->value[0]->child_part_id], 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
                                                            <?php $_smarty_tpl->_assignInScope('schedule_qty_2', $_smarty_tpl->tpl_vars['t']->value->schedule_qty_2);?>
                                                            <?php $_smarty_tpl->_assignInScope('schedule_qty', $_smarty_tpl->tpl_vars['t']->value->schedule_qty);?>
                                                            <?php $_smarty_tpl->_assignInScope('net_schedule', 0);?>

                                                            <?php if ($_smarty_tpl->tpl_vars['schedule_qty_2']->value != 0) {?>
                                                                <?php $_smarty_tpl->_assignInScope('net_schedule', $_smarty_tpl->tpl_vars['schedule_qty_2']->value-$_smarty_tpl->tpl_vars['schedule_qty']->value);?>
                                                                <?php $_smarty_tpl->_assignInScope('req_qty', $_smarty_tpl->tpl_vars['req_qty']->value+$_smarty_tpl->tpl_vars['t']->value->required_qty+($_smarty_tpl->tpl_vars['net_schedule']->value*$_smarty_tpl->tpl_vars['t']->value->bom_qty));?>
                                                            <?php } else { ?>
                                                                <?php $_smarty_tpl->_assignInScope('req_qty', $_smarty_tpl->tpl_vars['req_qty']->value+($_smarty_tpl->tpl_vars['t']->value->schedule_qty*$_smarty_tpl->tpl_vars['t']->value->bom_qty));?>
                                                            <?php }?>
                                                            <?php $_smarty_tpl->_assignInScope('actual_stock', $_smarty_tpl->tpl_vars['actual_stock']->value+$_smarty_tpl->tpl_vars['t']->value->actual_stock);?>
                                                            <?php $_smarty_tpl->_assignInScope('shortage_qty', $_smarty_tpl->tpl_vars['shortage_qty']->value+($_smarty_tpl->tpl_vars['req_qty']->value-$_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->stock));?>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <?php }?>
                                                    <?php $_smarty_tpl->_assignInScope('subtotal', $_smarty_tpl->tpl_vars['child_part_master']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->part_rate*$_smarty_tpl->tpl_vars['req_qty']->value);?>
                                                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['subtotal']->value);?>
                                                    <?php $_smarty_tpl->_assignInScope('net_mrp_req', $_smarty_tpl->tpl_vars['req_qty']->value-$_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->stock);?>
                                                <?php }?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->part_number;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->part_description;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_data']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->stock;?>
</td>
                                                    <td class="<?php if ($_smarty_tpl->tpl_vars['net_mrp_req']->value > 0) {?> text-danger <?php } else { ?> text-success <?php }?>"><?php echo $_smarty_tpl->tpl_vars['net_mrp_req']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['req_qty']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['child_part_master']->value[$_smarty_tpl->tpl_vars['t']->value->part_number][0]->part_rate;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
                                                </tr>
                                                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align:right">
                                            <th colspan="7">Total Purchase Value</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</th>
                                        </tr>
                                    </tfoot>
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
