<?php
/* Smarty version 4.3.2, created on 2024-06-07 13:00:39
  from '/var/www/html/extra_work/ERP_REFRESH_MAIN/application/views/templates/purchase/child_part_supplier_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6662b71fbfc0e5_02149882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26ff2f813a8be2002aedb33fb9f2f751f8279360' => 
    array (
      0 => '/var/www/html/extra_work/ERP_REFRESH_MAIN/application/views/templates/purchase/child_part_supplier_view.tpl',
      1 => 1717744775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6662b71fbfc0e5_02149882 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <h1>Supplier Part Price  </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Item part List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
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
                                <form action="<?php echo base_url('view_view_child_part_supplier_by_filter');?>
" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div style="width: 400px;">
                                                <div class="form-group">
                                                    <label for="on click url">Select Part Number / Description <span class="text-danger">*</span></label>
                                                    <br>
                                                    <select name="child_part_id" class="form-control select2" id="">
                                                        <!-- <option <?php echo '<?php'; ?>
 if ($filter_child_part_id === "All") <?php echo '?>'; ?>
 value="All">All</option> -->
                                                        <option value="">All</option>
                                                        <?php if (count($_smarty_tpl->tpl_vars['child_part_list_filter']->value) > 0) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part_list_filter']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                        	<option <?php if (($_smarty_tpl->tpl_vars['filter_child_part_id']->value == $_smarty_tpl->tpl_vars['c']->value->child_part_id)) {?>selected <?php }?> value="
                                                                <?php echo $_smarty_tpl->tpl_vars['c']->value->child_part_id;?>
">
                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
 / <?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>

                                                            </option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        <?php }?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">&nbsp;</label>
                                            <br>
                                            <button class="btn btn-secondary">Search </button>
                                        </div>
                                    </div>
                                </form>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Approval Status </th>
                                            <th>Rev. & History</th>
                                            <th>Revision Number</th>
                                            <th>Revision Remark</th>
                                            <th>Revision Date</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>UOM</th>
                                            <th>Tax Structure</th>
                                            <th>Update Tax</th>
                                            <th>Supplier</th>
                                            <th>Part Price</th>
                                            <th>Quotation Document </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php if (count($_smarty_tpl->tpl_vars['child_part_master']->value) > 0) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part_master']->value, 'poo');
$_smarty_tpl->tpl_vars['poo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['poo']->value) {
$_smarty_tpl->tpl_vars['poo']->do_else = false;
?>

                                            <tr>

                                                <td>
                                                    <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                                                </td>
                                                <td>
                                                    <?php echo $_smarty_tpl->tpl_vars['poo']->value->admin_approve;?>

                                                </td>
                                                <td>
                                                    <?php if (($_smarty_tpl->tpl_vars['poo']->value->admin_approve == "accept")) {?>
                                                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModaledit2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i class="fas fa-edit"></i></button>

                                                    <?php }?>
                                                            <a href="<?php echo base_url('price_revision/');
echo $_smarty_tpl->tpl_vars['poo']->value->part_number;?>
 / <?php echo $_smarty_tpl->tpl_vars['poo']->value->supplier_id;?>
" class="btn btn-primary btn-sm"> <i class="fas fa-history"></i></a>
                                                    <?php if (($_smarty_tpl->tpl_vars['poo']->value->admin_approve == "accept")) {?>
                                                            <div class="modal fade" id="exampleModaledit2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog " role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Add Revision </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo base_url('updatechildpart_supplier');?>
" method="POST" enctype='multipart/form-data'>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">

                                                                                        <input value="<?php echo $_smarty_tpl->tpl_vars['poo']->value->id;?>
" type="hidden" name="id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">

                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Number </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['poo']->value->part_number;?>
" name="upart_number" readonly class="form-control" placeholder="Enter Part Number.">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Description </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['poo']->value->part_description;?>
" name="upart_desc" readonly required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Description">
                                                                                        </div>
                                                                                        <!-- <div class="form-group">
                                                                                        <label for="po_num">Part Price </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo '<?php'; ?>
 echo $poo->part_rate  <?php echo '?>'; ?>
" name="upart_rate" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Price">
                                                                                    </div> -->
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Date </label><span class="text-danger">*</span>
                                                                                            <input type="date" value="<?php echo date('Y-m-d');?>
" name="urevision_date" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Price">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Number </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="" name="urevision_no" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safty/buffer stock" aria-describedby="emailHelp">
                                                                                            <input type="hidden" readonly value="<?php echo $_smarty_tpl->tpl_vars['poo']->value->supplier_id;?>
" name="supplier_id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safty/buffer stock" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Remark </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="" name="revision_remark" required class="form-control" id="exampleInputEmail1" placeholder="Enter revision_remark" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Price </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="" name="upart_rate" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Price">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Quotation Document</label>
                                                                                            <input type="file" name="quotation_document" class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Date" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label> Select Tax Structure </label><span class="text-danger">*</span>
                                                                                            <select class="form-control select2" name="gst_id" style="width: 100%;">

                                                                                            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gst_structure']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                                            		<option <?php if (($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['poo']->value->gs_id)) {?>selected <?php }?> value="
                                                                                                        <?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                                                            <?php echo $_smarty_tpl->tpl_vars['c']->value->code;?>

                                                                                                    </option>
                                                                                            	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                                            </select>
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
                                                            </div>
                                                    <?php }?>
                            </div>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->revision_no;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->revision_remark;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->revision_date;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->part_number;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->part_description;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->uom_name;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->gs_code;?>

                            </td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                    <i class='far fa-edit'></i>
                                </button>
                                <!-- edit Modal -->
                                <div class="modal fade" id="edit<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
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
                                                <div class="row">
                                                    <div class="col-lg-6">

                                                        <form action="<?php echo base_url('update_gst_report');?>
" method="POST" enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label> Select Tax Structure </label><span class="text-danger">*</span>
                                                                <input type="hidden" readonly value="<?php echo $_smarty_tpl->tpl_vars['poo']->value->id;?>
" name="id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safty/buffer stock" aria-describedby="emailHelp">
                                                                <input type="hidden" readonly value="<?php echo $_smarty_tpl->tpl_vars['filter_child_part_id']->value;?>
" name="filter_child_part_id">

                                                                <select class="form-control select2" name="gst_id" style="width: 100%;">
                                                                	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gst_structure']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                		<?php if (($_smarty_tpl->tpl_vars['poo']->value->with_in_state == "yes" && $_smarty_tpl->tpl_vars['c']->value->with_in_state == "yes" || true)) {?>
                                                                			<option <?php if (($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['poo']->value->gs_id)) {?>selected <?php }?> value="
                                                                            <?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->code;?>

                                                                        	</option>
                                                                        <?php } elseif (($_smarty_tpl->tpl_vars['poo']->value->with_in_state == "no" && $_smarty_tpl->tpl_vars['c']->value->with_in_state == "no")) {?>
                                                                        	<option <?php if (($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['poo']->value->gs_id)) {?>selected <?php }?> value="
                                                                                <?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->code;?>

                                                                            </option>
                                                                		<?php }?>
                                                                	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                </select>
                                                            </div>

                                                    </div>


                                                    <div class="col-lg-6">

                                                    </div>


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
                                <!-- edit Modal -->


                            </td>
                            <!-- <td><?php echo '<?php'; ?>
 echo $poo->with_in_state <?php echo '?>'; ?>
</td> -->

                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->supplier_name;?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['poo']->value->part_rate;?>

                            </td>
                            <td>
                                <?php if ((!empty($_smarty_tpl->tpl_vars['poo']->value->quotation_document))) {?>
                                    <a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['poo']->value->quotation_document;?>
" download>Download </a>
                                <?php }?>

                            </td>
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
