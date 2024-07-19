<?php
/* Smarty version 4.3.2, created on 2024-06-23 15:16:25
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6677eef16eac20_58258088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d2428749944bb7589f7c22a8757690f24021342' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/machine_request_details.tpl',
      1 => 1719135984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6677eef16eac20_58258088 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>View Material Request 
                  <span style="font-style:normal;color:blue;">
                  MR-<?php echo $_smarty_tpl->tpl_vars['machine_request_id']->value;?>

                  </span>
               </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">View Material Request</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div>
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="modal fade" id="addChildPart" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Child Part</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<?php echo base_url('add_machine_request_details');?>
"
                                 method="POST" enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Child Part<span
                              class="text-danger">*</span></label>
                           <select name="child_part_id" required id="" class="form-control select2">
                           <option value="">Select</option>
                           <?php if (($_smarty_tpl->tpl_vars['child_part']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
		                           <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
		                           <?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>

		                           </option>
	                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Enter Qty <span
                              class="text-danger">*</span></label>
                           <input type="number" step="any" required placeholder="Enter Qty"
                              class="form-control" name="qty">
                           <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['machine_request_id']->value;?>
"
                              step="any" name="machine_request_id" required placeholder="Enter Qty"
                              class="form-control">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Enter Remark</label>
                           <input type="text" step="any" placeholder="Enter Remark"
                              class="form-control" name="remark">                      
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
                     <div class="row">
                        <div class="form-group">
                           <a class="btn btn-dark" href="<?php echo base_url('machine_request');?>
">< Back </a>
                        </div>
                        <?php if (($_smarty_tpl->tpl_vars['machine_request_parts']->value == null || $_smarty_tpl->tpl_vars['machine_request_parts']->value[0]->request_status == 'pending')) {?>
	                        <div class="form-group">&nbsp;
	                           <button type="button" class="btn btn-primary" data-toggle="modal"
	                              data-target="#addChildPart">
	                           Add
	                           </button>
	                        </div>
                        <?php }?>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Child Part </th>
                              <th>UOM</th>
                              <th>Requsted Qty</th>
                              <th>Issued Qty</th>
                              <th>Status</th>
                              <th>Remark</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (($_smarty_tpl->tpl_vars['machine_request_parts']->value)) {?>
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine_request_parts']->value, 'req');
$_smarty_tpl->tpl_vars['req']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['req']->value) {
$_smarty_tpl->tpl_vars['req']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['req']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['req']->value->part_description;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['req']->value->uom_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['req']->value->qty;?>
</td>
		                              <td>
		                                 <?php if (($_smarty_tpl->tpl_vars['req']->value->status == "pending")) {?>
		                                 <button type="button" class="btn btn-primary" data-toggle="modal"
		                                    data-target="#addPromo<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
		                                 Issue Qty
		                                 </button>
		                                 <?php } else { ?>
		                                    <?php echo $_smarty_tpl->tpl_vars['req']->value->accepted_qty;?>

		                                 <?php }?>
		                                 <div class="modal fade" id="addPromo<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1"
		                                    role="dialog" aria-labelledby="exampleModalLabel"
		                                    aria-hidden="true">
		                                    <div class="modal-dialog modal-lg" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Issue Qty</h5>
		                                             <button type="button" class="close" data-dismiss="modal"
		                                                aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <div class="form-group">
		                                                <form
		                                                   action="<?php echo base_url('issue_material_request_qty');?>
"
		                                                   method="POST" enctype="multipart/form-data">
		                                             </div>
		                                             <div class="form-group">
		                                             <label for="on click url">Enter Accept Qty
		                                             (Current Stock:<?php echo $_smarty_tpl->tpl_vars['req']->value->stock;?>
)<span
		                                                class="text-danger">*</span></label>
		                                             <br>
		                                             <?php if (($_smarty_tpl->tpl_vars['req']->value->stock > 0 && $_smarty_tpl->tpl_vars['req']->value->qty <= $_smarty_tpl->tpl_vars['req']->value->stock)) {?>
			                                             <input required type="number" name="accepted_qty"
			                                                placeholder="Enter Accept Qty"
			                                                class="form-control" min="1"
			                                                max="<?php echo $_smarty_tpl->tpl_vars['req']->value->qty;?>
" value="" id="">
			                                             <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['machine_request_id']->value;?>
"
			                                                name="machine_request_id" required
			                                                class="form-control">
			                                             <input required type="hidden" name="qty"
			                                                placeholder="Enter Accept Qty"
			                                                class="form-control" min="1"
			                                                value="<?php echo $_smarty_tpl->tpl_vars['req']->value->qty;?>
">
			                                             <input required type="hidden" name="id"
			                                                placeholder="Enter Accept Qty"
			                                                class="form-control"
			                                                value="<?php echo $_smarty_tpl->tpl_vars['req']->value->id;?>
" id="">
			                                             <input required type="hidden" name="part_number"
		                                                placeholder="Enter Accept Qty"
		                                                class="form-control"
		                                                value="<?php echo $_smarty_tpl->tpl_vars['req']->value->part_number;?>
"
		                                                id="">
		                                             <?php $_smarty_tpl->_assignInScope('disableSave', '');?>
		                                             <?php } else { ?>
		                                             	Please Add Store Stock 
		                                                <?php $_smarty_tpl->_assignInScope('disableSave', "disabled");?>
		                                             <?php }?>
		                                             </div>
		                                          </div>
		                                          <div class="modal-footer">
		                                          <button type="button" class="btn btn-secondary"
		                                             data-dismiss="modal">Close</button>
		                                          <button type="submit" <?php echo $_smarty_tpl->tpl_vars['disableSave']->value;?>
 class="btn btn-primary">Save</button>
		                                          </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['req']->value->status;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['req']->value->remark;?>
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
         <!-- /.row -->
         <!-- Main row -->
         <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div><?php }
}
