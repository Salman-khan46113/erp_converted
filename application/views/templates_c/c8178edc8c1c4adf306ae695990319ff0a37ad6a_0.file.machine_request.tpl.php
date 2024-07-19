<?php
/* Smarty version 4.3.2, created on 2024-06-23 14:48:22
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6677e85edc8717_81803091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8178edc8c1c4adf306ae695990319ff0a37ad6a' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request.tpl',
      1 => 1719134300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6677e85edc8717_81803091 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Material Request</h1>
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
               <!-- Modal -->
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Machine Request 
                              <span style="font-style:normal;color:blue;">
                              <?php if (($_smarty_tpl->tpl_vars['isMultiClient']->value == "true")) {?> - <?php echo $_smarty_tpl->tpl_vars['this']->value->session->userdata['clientUnitName'];
}?></span>
                           </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<?php echo base_url('add_machine_request');?>
" method="POST"
                                 enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Operator<span
                              class="text-danger">*</span></label>
                           <select name="operator_id" required id="" class="form-control select2">
                           	<?php if (($_smarty_tpl->tpl_vars['operator']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operator']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
		                           <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>

		                           </option>
		                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Machine<span
                              class="text-danger">*</span></label>
                           <select name="machine_id" required id="" class="form-control select2">
                           <?php if (($_smarty_tpl->tpl_vars['machine']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
		                           <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
		                           <?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>

		                           </option>
		                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Customer/Part Number/Part Description<span
                              class="text-danger">*</span></label>
                           <br><span style="font-style:italic;color:blue;">Note: This is list of parts which are defined in BOM</span>
                           <select name="customer_part_id" required class="form-control select2">
                           <option value="">Select</option>
                           <?php if (($_smarty_tpl->tpl_vars['customer_part']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
		                           <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
		                           <?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>

		                           </option>
	                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                           </select>
                           </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                           data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <div class="row mb-2">
                        <div class="col-sm-9" style="align:left;">
                           <button type="button" class="btn btn-primary" data-toggle="modal"
                              data-target="#addPromo">
                           Add
                           </button>
                        </div>
                        <div class="col-sm-2">
                           <?php if (($_smarty_tpl->tpl_vars['showDocRequestDetails']->value == "true")) {?>
                           Format No: STR-F-02 <br>
                           Rev.Date : 3/3/2017 <br>
                           Rev.No.  : 00
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th style="word-wrap;">Request No</th>
                              <th>Machine Mold </th>
                              <th>Operator</th>
                              <th>Customer Part</th>
                              <th>Date & Time</th>
                              <th>Status</th>
                              <th>Details</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (($_smarty_tpl->tpl_vars['machine_request']->value)) {?>
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine_request']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                    <?php if (($_smarty_tpl->tpl_vars['c']->value->req_parts)) {?>
                                    	<?php $_smarty_tpl->_assignInScope('delete', false);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->_assignInScope('delete', true);?>
                                    <?php }?>
		                           <tr>
		                              <td>MR-<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['c']->value->machine_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['c']->value->operator_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['c']->value->created_date;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->created_time;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['c']->value->status;?>
</td>
		                              <td>
		                                 <a class="btn btn-info"
		                                    href="<?php echo base_url('machine_request_details/');
echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">View
		                                 Details</a>
		                              </td>
		                              <td>
		                                 <?php if (($_smarty_tpl->tpl_vars['delete']->value == true)) {?>
			                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addPromo<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
			                                 <i class="fa fa-trash"></i>
			                                 </button>
		                                 <?php }?>
		                                 <div class="modal fade" id="addPromo<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form action="<?php echo base_url('delete');?>
" method="POST" enctype="multipart/form-data">
		                                                <label for="">Are You Sure Want To Delete This ?</label>
		                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" name="id" class="form-control">
		                                                <input type="hidden" value="machine_request" name="table_name" class="form-control">
		                                          </div>
		                                          <div class="modal-footer">
		                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                          <button type="submit" class="btn btn-danger">Delete </button>
		                                          </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
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
               <!-- ./col -->
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div><?php }
}
