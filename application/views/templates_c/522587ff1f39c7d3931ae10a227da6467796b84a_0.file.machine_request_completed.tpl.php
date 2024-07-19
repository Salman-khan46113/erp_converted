<?php
/* Smarty version 4.3.2, created on 2024-06-24 23:34:17
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request_completed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6679b5212f6748_01414830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '522587ff1f39c7d3931ae10a227da6467796b84a' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request_completed.tpl',
      1 => 1719252256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6679b5212f6748_01414830 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Material Request Report </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Material Request</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form action="<?php echo base_url('machine_request_completed');?>
" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-lg-2">
                              <div>
                                 <div class="form-group">
                                    <label for="on click url">Status<span class="text-danger"></span></label> <br>
                                    <select name="filter_by_status" class="form-control select2" id="">
                                       <?php echo '<?php'; ?>
 <?php echo '?>'; ?>

                                       <option <?php if (($_smarty_tpl->tpl_vars['filter_by_status']->value == 'pending')) {?>selected<?php }?> value="pending">Pending</option>
                                       <option <?php if (($_smarty_tpl->tpl_vars['filter_by_status']->value == 'Completed')) {?>selected<?php }?> value="Completed">Completed</option>

                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-8">
                              <label for="">&nbsp;</label> <br>
                              <button class="btn btn-secondary">Search </button>
                           </div>
                           <div class="col-sm-2">
                              <?php if (($_smarty_tpl->tpl_vars['showDocRequestDetails']->value == "true")) {?>
                              Format No: STR-F-02 <br>
                              Rev.Date : 3/3/2017 <br>
                              Rev.No.  : 00
                              <?php }?>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th style="word-wrap;">Request No</th>
                              <th>Machine </th>
                              <th>Operator </th>
                              <th>Customer Part </th>
                              <th>Child Part </th>
                              <th>UOM</th>
                              <th>Requested Qty</th>
                              <th>Issued Qty</th>
                              <th>Status</th>
                              <th>Remark</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (($_smarty_tpl->tpl_vars['machine_request_parts']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine_request_parts']->value, 'request');
$_smarty_tpl->tpl_vars['request']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['request']->value) {
$_smarty_tpl->tpl_vars['request']->do_else = false;
?>
	                           <tr>
	                              <td>MR-<?php echo $_smarty_tpl->tpl_vars['request']->value->id;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->machine_name;?>

	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->operator_name;?>

	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->part_no;?>
/<?php echo $_smarty_tpl->tpl_vars['request']->value->part_description;?>

	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->child_part_no;?>
/<?php echo $_smarty_tpl->tpl_vars['request']->value->child_desc;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->uom_name;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->qty;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->accepted_qty;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->status;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['request']->value->remark;?>
</td>
	                           </tr>
	                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- ./col -->
            </div>
         </div>
         <!-- /.row -->
         <!-- Main row -->
         <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div><?php }
}
