<?php
/* Smarty version 4.3.2, created on 2024-08-21 22:55:16
  from '/var/www/html/extra_work/erp_converted/application/views/templates/customer/bom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66c622fc954b91_70185353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '943b2922973062e7fa08b34497bf79ba53f55e78' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/customer/bom.tpl',
      1 => 1724142425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66c622fc954b91_70185353 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="width:100%" class="wrapper">
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
                        <!-- <h1></h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer item part</li>
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
                            <div class="card-header">

                                <!-- Button trigger modal -->
                                <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
customer_master">
                                    Back </a>

                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
addbom" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label> item part </label><span class="text-danger">*</span>
                                                                <select class="form-control select2" name="child_part_id" style="width: 100%;">
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part_list']->value, 'c1');
$_smarty_tpl->tpl_vars['c1']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c1']->value) {
$_smarty_tpl->tpl_vars['c1']->do_else = false;
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c1']->value->id;?>
">
                                                                            <?php echo $_smarty_tpl->tpl_vars['c1']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['c1']->value->part_description;?>

                                                                        </option>
                                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="po_num">Quantity</label><span class="text-danger">*</span>
                                                                <input type="number" name="quantity" required class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" aria-describedby="emailHelp">
                                                                <input type="hidden" name="customer_part_id" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->id;?>
" required class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" aria-describedby="emailHelp">
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
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Customer Part Number</th> -->
                                            <th> Part Number</th>
                                            <th>Part Description</th>
                                            <th>Details</th>
                                            <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null) {?>
                                             <th>Operations BOM</th>
                                             <?php }?> 
                                             <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null) {?>
                                            <!-- <th>Deflashing BOM</th> -->
                                            <?php }?>
                                            <th>Customer Subcon bom </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Customer Part Number</th> -->
                                            <th> Part Number</th>
                                            <th>Part Description</th>
                                            <th>Details</th>
                                            <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null) {?>
                                             <th>Operations BOM</th>
                                             <?php }?> 
                                             <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null) {?>
                                            <!--<th>Deflashing BOM</th> -->
                                            <?php }?>
                                            <th>Customer Subcon bom </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if ($_smarty_tpl->tpl_vars['customer_part']->value) {?>
                                            <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['customer_id']->value == $_smarty_tpl->tpl_vars['c']->value->customer_id) {?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>
</td>
                                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bom_by_id/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="btn btn-info">RM BOM</a></td>
                                                        <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isSheetMetal'] != null) {?>
                                                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
operations_bom/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="btn btn-danger">Operations BOM</a></td>
                                                        <?php }?> 
                                                        <?php if ($_smarty_tpl->tpl_vars['entitlements']->value['isPlastic'] != null) {?>
                                                        <!-- <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
deflashing_bom/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="btn btn-success">Operations BOM</a></td> -->
                                                        <?php }?>
                                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
subcon_bom/<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="btn btn-warning">Subcon BOM</a></td>
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
    <!-- /.content-wrapper -->
<?php }
}