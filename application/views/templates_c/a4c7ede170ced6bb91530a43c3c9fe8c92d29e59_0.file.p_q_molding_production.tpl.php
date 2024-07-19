<?php
/* Smarty version 4.3.2, created on 2024-06-25 00:29:20
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/p_q_molding_production.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6679c208d20369_59502172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4c7ede170ced6bb91530a43c3c9fe8c92d29e59' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/p_q_molding_production.tpl',
      1 => 1719255527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6679c208d20369_59502172 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper" >
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Molding Production</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                     <li class="breadcrumb-item active">Molding Production</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->
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
                              <h5 class="modal-title" id="exampleModalLabel">Add Molding Production Quantity</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <form
                                    action="<?php echo base_url('add_production_qty_molding_production');?>
"
                                    method="POST" enctype="multipart/form-data">
                              </div>
                              <div class="form-group">
                              <label for="on click url">Customer Name / Part Number / Part Description<span
                                 class="text-danger">*</span></label>
                              <select required name="customer_part_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <?php if (($_smarty_tpl->tpl_vars['customer_part_new']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part_new']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
		                              <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
">
		                              <?php echo $_smarty_tpl->tpl_vars['s']->value->customer_name;?>
 / <?php echo $_smarty_tpl->tpl_vars['s']->value->part_number;?>
 / <?php echo $_smarty_tpl->tpl_vars['s']->value->part_description;?>

		                              </option>
		                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                               <?php }?>
                              </select>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Machine<span
                                 class="text-danger">*</span></label>
                              <select required name="machine_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <?php if (($_smarty_tpl->tpl_vars['machine']->value)) {?>
                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
	                              	<option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value->name;?>
</option>
	                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                               <?php }?>
                              </select>
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Select Customer Part / Mold Name / Cavity<span class="text-danger">*</span></label>
                              <select required name="mold_id" id="" class="form-control select2">
                              <?php if (($_smarty_tpl->tpl_vars['mold_maintenance']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mold_maintenance']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
	                              <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
">
	                              <?php echo $_smarty_tpl->tpl_vars['s']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['s']->value->part_description;?>
/<?php echo $_smarty_tpl->tpl_vars['s']->value->mold_name;?>
/<?php echo $_smarty_tpl->tpl_vars['s']->value->no_of_cavity;?>

	                              </option>
	                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                               <?php }?>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Date
                              <span class="text-danger">*</span></label>
                              <input max="<?php echo date('Y-m-d');?>
" type="date"
                                 value="<?php echo date('Y-m-d');?>
" name="date" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label required for="on click url">Shift Type / Name / Start Time /
                              End Time<span class="text-danger">*</span></label>
                              <select name="shift_id" name="" id="" class="form-control select2">
                              <option value="">Select</option>
                              <?php if (($_smarty_tpl->tpl_vars['shifts']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shifts']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
		                              <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
">
		                              <?php echo $_smarty_tpl->tpl_vars['s']->value->shift_type;?>
 / <?php echo $_smarty_tpl->tpl_vars['s']->value->name;?>
 / <?php echo $_smarty_tpl->tpl_vars['s']->value->start_time;?>
 / <?php echo $_smarty_tpl->tpl_vars['s']->value->end_time;?>

		                              </option>
		                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                               <?php }?>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Production OK Quantity<span
                                 class="text-danger">*</span></label>
                              <input type="number" min="1" value="0" name="qty" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Production Rejection<span
                                 class="text-danger">*</span></label>
                              <input type="number" min="0" value="0" name="rejection_qty" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Production Minutes<span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="production_hours" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Downtime in min <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="downtime_in_min" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Setup in min <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="setup_time_in_min" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Finish Part Weight <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="finish_part_weight" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Runner Weight <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="runner_weight" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Wastage / Gattha / Lumps (Kg)<span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="wastage" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Cycle Time Per Shot (sec) <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="cycle_time" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Operator<span
                                 class="text-danger">*</span></label>
                              <select required name="operator_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <?php if (($_smarty_tpl->tpl_vars['operator']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operator']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
		                              <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value->name;?>
</option>
		                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                              <?php }?>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="form-group">
                              <label for="on click url">Remark</label>
                              <input type="text" name="remark" class="form-control">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                           data-target="#addPromo">
                        Add Molding Production Qty
                        </button>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Job Order No</th>
                                 <th>Part Number / Descriptions </th>
                                 <th>Mold Name</th>
                                 <th>Date</th>
                                 <th>Shift</th>
                                 <th>Machine</th>
                                 <th>Operator</th>
                                 <th>Production OK Qty</th>
                                 <th>Production Rejection Qty</th>
                                 <th>Accepted Qty by Quality</th>
                                 <th>Rejected Qty by Quality</th>
                                 <th>Onhold Qty</th>
                                 <th style="word-wrap: break-word;">Wastage / Gattha / Lumps (Kg)</th>
                                 <th>Status</th>
                                 <th>Production Minutes</th>
                                 <th>Downtime In Min</th>
                                 <!-- <th>Downtime Reason</th> -->
                                 <th>Setup Time In Min</th>
                                 <th>Cycle Time In Sec</th>
                                 <th>Finish Part Weight (gram)</th>
                                 <th>Runner Weight (gram)</th>
                                 <th>Shift Target Qty</th>
                                 <!-- <th>Remark</th> -->
                                 <!-- <th>Accept Reject</th> -->
                                 <th>Rejection Details</th>
                                 <th>Downtime Details</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if (($_smarty_tpl->tpl_vars['molding_production']->value)) {?>
                                    <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['molding_production']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
		                              <tr>
		                                 <td>JO-<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->part_number;?>
 /
		                                    <?php echo $_smarty_tpl->tpl_vars['u']->value->part_description;?>

		                                 </td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->mold_name;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->date;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->shift_type;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>

		                                 </td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->machine_name;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->operator_name;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->qty;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->rejection_qty;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->accepted_qty;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->rejected_qty;?>
</td>
		                                <td>
		                                    <?php if ((!empty($_smarty_tpl->tpl_vars['u']->value->onhold_qty))) {?>
		                                    <button type="button" class="btn btn-warning float-left "
		                                       data-toggle="modal" data-target="#onhold<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
		                                    <?php echo $_smarty_tpl->tpl_vars['u']->value->onhold_qty;?>
 </button>
		                                    <?php } else { ?>
		                                       0
		                                    <?php }?>
		                                    <div class="modal fade" id="onhold<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1"
		                                       role="dialog" aria-labelledby="exampleModalLabel"
		                                       aria-hidden="true">
		                                       <div class="modal-dialog modal-lg" role="document">
		                                          <div class="modal-content">
		                                             <div class="modal-header">
		                                                <h5 class="modal-title" id="exampleModalLabel">
		                                                   Onhold
		                                                   Update 
		                                                </h5>
		                                                <button type="button" class="close" data-dismiss="modal"
		                                                   aria-label="Close">
		                                                <span aria-hidden="true">&times;</span>
		                                                </button>
		                                             </div>
		                                             <div class="modal-body">
		                                                <form
		                                                   action="<?php echo base_url('update_p_q_onhold_molding');?>
"
		                                                   method="POST" enctype='multipart/form-data' s>
		                                                   <div class="row">
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Qty</label>
		                                                            <input type="text"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->onhold_qty;?>
"
		                                                               readonly class="form-control">
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Accept Qty <span
		                                                               class="text-danger">*</span>
		                                                            </label>
		                                                            <input type="number" step="any" value=""
		                                                               max="<?php echo $_smarty_tpl->tpl_vars['u']->value->onhold_qty;?>
"
		                                                               min="0" class="form-control"
		                                                               name="accepted_qty"
		                                                               placeholder="Enter Accepted Quantity"
		                                                               required>
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Rejection
		                                                            Reason</label>
		                                                            <select name="rejection_reason" id=""
		                                                               class="form-control select2">
		                                                               <option value="NA">NA</option>
		                                                               <?php if (($_smarty_tpl->tpl_vars['reject_remark']->value)) {?>
		                                                                  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reject_remark']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
			                                                               <option
			                                                                  value="<?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
">
			                                                                  <?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>

			                                                               </option>
			                                                               <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		                                                                <?php }?>
		                                                            </select>
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Reject Remark</label>
		                                                            <input type="text"
		                                                               class="form-control"
		                                                               name="rejection_remark">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="id"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="rejection_qty"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->rejection_qty;?>
">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="qty"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->onhold_qty;?>
">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="output_part_id"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->output_part_id;?>
">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="accepted_qty_old"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->accepted_qty;?>
">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="rejected_qty_old"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->rejected_qty;?>
">
		                                                            <input type="text"
		                                                               readonly class="form-control"
		                                                               name="customer_part_id"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
">
		                                                         </div>
		                                                      </div>
		                                                   </div>
		                                                   <div class="modal-footer">
		                                                      <button type="button" class="btn btn-secondary"
		                                                         data-dismiss="modal">Close</button>
		                                                      <button type="submit"
		                                                         class="btn btn-primary">Save
		                                                      changes</button>
		                                                   </div>
		                                             </div>
		                                             </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->wastage;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->status;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->production_hours;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->downtime_in_min;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->setup_time_in_min;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->cycle_time;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->finish_part_weight;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->runner_weight;?>
</td>
		                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->production_target_per_shift;?>
</td>
		                                 <td>
		                                    <a class="btn btn-primary" href="<?php echo base_url('view_rejection_details/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
/add">
		                                    <i class='far fa-edit'></i>
		                                    </a>
		                                 </td>
		                                 <td>
		                                    <a class="btn btn-primary" href="<?php echo base_url('view_downtime_details/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
/add">
		                                    <i class='far fa-edit'></i>
		                                    </a>
		                                 </td>
		                                 <td>
		                                    <?php if (($_smarty_tpl->tpl_vars['u']->value->status == "pending")) {?>
		                                    <button type="button" class="btn btn-danger float-left "
		                                       data-toggle="modal" data-target="#acceptReject<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
		                                    Accept/Reject </button>
		                                    <?php } else { ?>
		                                        Completed
		                                    <?php }?>
		                                    <div class="modal fade" id="acceptReject<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1"
		                                       role="dialog" aria-labelledby="exampleModalLabel"
		                                       aria-hidden="true">
		                                       <div class="modal-dialog modal-lg" role="document">
		                                          <div class="modal-content">
		                                             <div class="modal-header">
		                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
		                                                <button type="button" class="close" data-dismiss="modal"
		                                                   aria-label="Close">
		                                                <span aria-hidden="true">&times;</span>
		                                                </button>
		                                             </div>
		                                             <div class="modal-body">
		                                                <form
		                                                   action="<?php echo base_url('update_p_q_molding_production');?>
"
		                                                   method="POST" enctype='multipart/form-data' s>
		                                                   <div class="row">
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Date</label>
		                                                            <input type="text"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->date;?>
"
		                                                               readonly class="form-control">
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Shift</label>
		                                                            <br>
		                                                            <span><?php echo $_smarty_tpl->tpl_vars['u']->value->shift_type;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
</span>
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Qty</label>
		                                                            <input type="text"
		                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->qty;?>
"
		                                                               readonly class="form-control">
		                                                         </div>
		                                                      </div>
		                                                     
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="on click url">Enter Final
		                                                         Inspection Qty<span
		                                                            class="text-danger">*</span></label>
		                                                         <input type="number" min="0" value="0"
		                                                            max="" name="final_inspection_location"
		                                                            required class="form-control">
		                                                      </div>
		                                                   </div>
		                                                   
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="">Reject Remark</label>
		                                                         <input type="text"
		                                                            class="form-control"
		                                                            name="rejection_remark">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="id"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="qty"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['u']->value->qty;?>
">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="customer_part_id"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="accepted_qty_old"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['u']->value->accepted_qty;?>
">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="rejected_qty_old"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['u']->value->rejected_qty;?>
">
		                                                      </div>
		                                                   </div>
		                                             </div>
		                                             <div class="modal-footer">
		                                             <button type="button" class="btn btn-secondary"
		                                                data-dismiss="modal">Close</button>
		                                             <button type="submit"
		                                                class="btn btn-primary">Save
		                                             changes</button>
		                                             </div>
		                                          </div>
		                                          </form>
		                                       </div>
		                                    </div>
				                     </div>
				                     </td>
				                     <!-- <td></td> -->
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
