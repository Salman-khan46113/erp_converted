<?php
/* Smarty version 4.3.2, created on 2024-06-25 11:04:56
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/view_p_q_molding_production.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667a5701016474_01381134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46f87905178e38a8ec2c97e15c458ad557074bf2' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/view_p_q_molding_production.tpl',
      1 => 1719293694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667a5701016474_01381134 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper" style="width:200%">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>View Molding Production</h1>
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
                  <div class="card">
                     <div class="card-header">
                        <div class="row">
                           <div class="col-lg-1">
                              <form action="<?php echo base_url('view_p_q_molding_production');?>
" method="post">
                                 <div class="form-group">
                                    <label for="">Select Month  <span class="text-danger">*</span></label>
                                    <select required name="created_month" id="" class="form-control select2">
                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month_arr']->value, 'month');
$_smarty_tpl->tpl_vars['month']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['month']->do_else = false;
?>
                                          <option <?php if (($_smarty_tpl->tpl_vars['month']->value['month_number'] == $_smarty_tpl->tpl_vars['created_month']->value)) {?>selected<?php }?>
                                          value="<?php echo $_smarty_tpl->tpl_vars['month']->value['month_number'];?>
"><?php echo $_smarty_tpl->tpl_vars['month']->value['month_data'];?>
</option>
                                       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                 </div>
                           </div>
                           <div class="col-lg-1">
                           <div class="form-group">
                           <label for="">Select Year  <span class="text-danger">*</span></label>
                           <select required name="created_year" id="" class="form-control select2">
                              <?php
$_smarty_tpl->tpl_vars['year'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['year']->step = 1;$_smarty_tpl->tpl_vars['year']->total = (int) ceil(($_smarty_tpl->tpl_vars['year']->step > 0 ? 2027+1 - (2022) : 2022-(2027)+1)/abs($_smarty_tpl->tpl_vars['year']->step));
if ($_smarty_tpl->tpl_vars['year']->total > 0) {
for ($_smarty_tpl->tpl_vars['year']->value = 2022, $_smarty_tpl->tpl_vars['year']->iteration = 1;$_smarty_tpl->tpl_vars['year']->iteration <= $_smarty_tpl->tpl_vars['year']->total;$_smarty_tpl->tpl_vars['year']->value += $_smarty_tpl->tpl_vars['year']->step, $_smarty_tpl->tpl_vars['year']->iteration++) {
$_smarty_tpl->tpl_vars['year']->first = $_smarty_tpl->tpl_vars['year']->iteration === 1;$_smarty_tpl->tpl_vars['year']->last = $_smarty_tpl->tpl_vars['year']->iteration === $_smarty_tpl->tpl_vars['year']->total;?>
                                 <option  <?php if (($_smarty_tpl->tpl_vars['year']->value == $_smarty_tpl->tpl_vars['created_year']->value)) {?>selected<?php }?>
                              value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                              <?php }
}
?>
                           </select>
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <br><input type="submit" class="btn btn-primary mt-2"value="Search">
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
                           <th>Job Order No</th>
                           <th>Part Number / Descriptions </th>
                           <th>Date</th>
                           <th>Shift</th>
                           <th>Machine</th>
                           <th>Operator</th>
                           <th>Target Production Qty</th>
                           <th>Production Ok Qty</th>
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
                           <th>Target Prod WT</th>
                           <th>Target Runner WT</th>
                           <th>Finish Part Weight (gram)</th>
                           <th>Runner Weight (gram)</th>
                           <!-- <th>Shift Target Qty</th> AROM-105 -->
                           <th>Production Efficiency</th>
                           <th>Quality Efficiency</th>
                           <th>PPM</th>
                           <th>OEE</th>
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
                                 <?php $_smarty_tpl->_assignInScope('total_pde', (($_smarty_tpl->tpl_vars['u']->value->accepted_qty/$_smarty_tpl->tpl_vars['u']->value->production_hours*$_smarty_tpl->tpl_vars['u']->value->name)/$_smarty_tpl->tpl_vars['u']->value->production_target_per_shift*100)*100);?>
                                 <?php $_smarty_tpl->_assignInScope('total_qe', ($_smarty_tpl->tpl_vars['u']->value->accepted_qty/$_smarty_tpl->tpl_vars['u']->value->qty)*100);?>
                                 <?php $_smarty_tpl->_assignInScope('total_ppm', (($_smarty_tpl->tpl_vars['u']->value->rejection_qty+$_smarty_tpl->tpl_vars['u']->value->rejected_qty)/$_smarty_tpl->tpl_vars['u']->value->qty)*1000000);?>
                                   
                                 <?php $_smarty_tpl->_assignInScope('planned_pt', ($_smarty_tpl->tpl_vars['u']->value->production_hours-$_smarty_tpl->tpl_vars['u']->value->ppt));?>
                                 <?php $_smarty_tpl->_assignInScope('runtime', $_smarty_tpl->tpl_vars['planned_pt']->value-($_smarty_tpl->tpl_vars['downtime_in_min']->value+$_smarty_tpl->tpl_vars['setup_time_in_min']->value));?>
                                 <?php $_smarty_tpl->_assignInScope('availbility', $_smarty_tpl->tpl_vars['runtime']->value/$_smarty_tpl->tpl_vars['planned_pt']->value);?>
                                 <?php $_smarty_tpl->_assignInScope('total_prod_qty', $_smarty_tpl->tpl_vars['u']->value->rejection_qty+$_smarty_tpl->tpl_vars['u']->value->qty);?>
                                 <?php $_smarty_tpl->_assignInScope('performance', ($_smarty_tpl->tpl_vars['u']->value->cycle_time*$_smarty_tpl->tpl_vars['total_prod_qty']->value)/($_smarty_tpl->tpl_vars['runtime']->value*60));?>
                                 <?php $_smarty_tpl->_assignInScope('quality', $_smarty_tpl->tpl_vars['u']->value->accepted_qty/$_smarty_tpl->tpl_vars['total_prod_qty']->value);?>
                           
                                 <?php $_smarty_tpl->_assignInScope('total_oee', $_smarty_tpl->tpl_vars['availbility']->value*$_smarty_tpl->tpl_vars['performance']->value*$_smarty_tpl->tpl_vars['quality']->value*100);?>
                                 <?php $_smarty_tpl->_assignInScope('target_production_qty', ($_smarty_tpl->tpl_vars['u']->value->production_hours*60)/$_smarty_tpl->tpl_vars['u']->value->cycle_time);?>
                                 <?php $_smarty_tpl->_assignInScope('target_prod_wt', $_smarty_tpl->tpl_vars['u']->value->finish_part_weight*$_smarty_tpl->tpl_vars['u']->value->qty);?>
                                 <?php $_smarty_tpl->_assignInScope('target_runner_wt', $_smarty_tpl->tpl_vars['u']->value->runner_weight*$_smarty_tpl->tpl_vars['u']->value->qty);?>
                              <tr>
                                 <td>JO-<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
</td>
                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->part_number;?>
 /
                                    <?php echo $_smarty_tpl->tpl_vars['u']->value->part_description;?>

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
                                 <td><?php echo round($_smarty_tpl->tpl_vars['target_production_qty']->value,2);?>
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
                                                   method="POST" enctype='multipart/form-data' >
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
                                                               placeholder="Enter Rejection Remark If any"
                                                               class="form-control"
                                                               name="rejection_remark">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="id"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="qty"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->onhold_qty;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="output_part_id"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->output_part_id;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="accepted_qty_old"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->accepted_qty;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="rejected_qty_old"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->rejected_qty;?>
">
                                                            <input type="text"
                                                               placeholder="Enter Rejection Remark If any"
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
                                 <td><?php echo $_smarty_tpl->tpl_vars['target_prod_wt']->value;?>
</td>
                                 <td><?php echo $_smarty_tpl->tpl_vars['target_runner_wt']->value;?>
</td>
                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->finish_part_weight;?>
</td>
                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->runner_weight;?>
</td>
                                 <td><?php echo round($_smarty_tpl->tpl_vars['total_pde']->value,2);?>
</td>
                                 <td><?php echo round($_smarty_tpl->tpl_vars['total_qe']->value,2);?>
</td>
                                 <td><?php echo round($_smarty_tpl->tpl_vars['total_ppm']->value,2);?>
</td>
                                 <td><?php echo round($_smarty_tpl->tpl_vars['total_oee']->value,2);?>
</td>
                                 <td>
                                    <a class="btn btn-primary" href="<?php echo base_url('view_rejection_details/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
/view">
                                    <i class='far fa-edit'></i>
                                    </a>
                                 </td>
                                 <td>
                                    <a class="btn btn-primary" href="<?php echo base_url('view_downtime_details/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
/view">
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
                                                            <label for="on click url">Enter Semi
                                                            Finished location QTY<span
                                                               class="text-danger">*</span></label>
                                                            <input type="number" min="0" value="0"
                                                               max="" name="semi_finished_location"
                                                               required class="form-control">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="form-group">
                                                            <label for="on click url">Enter Final
                                                            Inspection Qty<span
                                                               class="text-danger">*</span></label>
                                                            <input type="number" min="0" value="0"
                                                               max=""
                                                               name="final_inspection_location"
                                                               required class="form-control">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="form-group">
                                                            <label for="">Onhold Qty <span
                                                               class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" step="any" value=""
                                                               max="<?php echo $_smarty_tpl->tpl_vars['u']->value->qty;?>
" min="0"
                                                               class="form-control"
                                                               name="onhold_qty"
                                                               placeholder="Enter onhold" required>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="form-group">
                                                            <label for="">Rejection Reason</label>
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
                                                               placeholder="Enter Rejection Remark If any"
                                                               class="form-control"
                                                               name="rejection_remark">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="id"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="qty"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->qty;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="customer_part_id"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->customer_part_id;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
                                                               readonly class="form-control"
                                                               name="accepted_qty_old"
                                                               value="<?php echo $_smarty_tpl->tpl_vars['u']->value->accepted_qty;?>
">
                                                            <input type="hidden"
                                                               placeholder="Enter Rejection Remark If any"
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
