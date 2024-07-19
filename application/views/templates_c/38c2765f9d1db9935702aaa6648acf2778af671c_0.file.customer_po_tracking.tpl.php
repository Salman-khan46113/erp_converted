<?php
/* Smarty version 4.3.2, created on 2024-06-20 14:23:36
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673ee101570d8_02864118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38c2765f9d1db9935702aaa6648acf2778af671c' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/customer_po_tracking.tpl',
      1 => 1718867871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673ee101570d8_02864118 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/extra/erp_converted/application/third_party/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div style="width:100%" class="wrapper">
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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
generate_po">Home</a></li>
                            <li class="breadcrumb-item active">Customer PO QTY Tracking</li>
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

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
generate_customer_po_tracking" method="POST" enctype='multipart/form-data'>
                                                <label for="">Select Customer <span class="text-danger">*</span> </label>
                                                <select name="customer_id" required id="" class="form-control select2">
                                                    <?php if ($_smarty_tpl->tpl_vars['customer_data']->value) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_data']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
">
                                                                <?php echo $_smarty_tpl->tpl_vars['p']->value->customer_name;?>

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
                                            <label for="">Select Start PO Date <span class="text-danger">*</span> </label>
                                            <input type="date" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" required name="po_start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select End Date </label>
                                            <input type="date" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" required name="po_end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Enter PO Number <span class="text-danger">*</span> </label>
                                            <input type="text" placeholder="Enter PO Number" required value="" name="po_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Enter PO Amendment No </label>
                                            <input type="number" step="any" placeholder="Enter Amendment PO number" value="" name="po_amedment_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select PO Amendment Date </label>
                                            <input type="date" value="" name="po_amendment_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="po_num">Upload PO</label>
                                            <input type="file" name="uploadedDoc" class="form-control" id="exampleuploadedDoc" placeholder="Upload PO" aria-describedby="uploadDocHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mt-4">Generate</button>
                                        </div>
                                      </form>
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
<?php }
}
