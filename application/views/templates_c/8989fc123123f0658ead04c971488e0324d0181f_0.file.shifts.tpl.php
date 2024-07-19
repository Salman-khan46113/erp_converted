<?php
/* Smarty version 4.3.2, created on 2024-06-21 14:39:11
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/shifts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66754337beac23_62331489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8989fc123123f0658ead04c971488e0324d0181f' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/shifts.tpl',
      1 => 1718960937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66754337beac23_62331489 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Shift </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Shift</li>
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
                  <div class="card-header">
                     <!-- <h3 class="card-title">Shift</h3> -->
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary float-left" data-toggle="modal"
                        data-target="#exampleModal">
                     Add Shift</button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add shift</h5>
                                 <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="<?php echo base_url('addShift');?>
" method="POST">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <!-- Example single danger button -->
                                          <div class="form-group">
                                             <label> Shift Name </label>
                                             <select required class="form-control select2"
                                                id="shiftName" name="shiftName"
                                                style="width: 100%;">
                                                <option value="8">8-hour</option>
                                                <option value="12">12-hour</option>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label for="shiftStart">Start Time</label><span
                                                class="text-danger">*</span>
                                             <input type="time" name="shiftStart" required
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Shift Start Time">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label> Shift Type </label>
                                             <select required class="form-control select2"
                                                name="shiftType" style="width: 100%;">
                                                <option value="1<sup>st</sup>" selected="selected">
                                                   1<sup>st</sup>
                                                </option>
                                                <option value="2<sup>nd</sup>">2<sup>nd</sup>
                                                </option>
                                                <option id='option_3' value="3<sup>rd</sup>">
                                                   3<sup>rd</sup>
                                                </option>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label for="shiftStart">End Time</label><span
                                                class="text-danger">*</span>
                                             <input type="time" name="shiftEnd" required
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Shift End Time">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label> PPT in min </label><span
                                                class="text-danger">*</span>
                                             <input type="number" name="ppt" min="0" value="0" required
                                                class="form-control">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Save
                                       changes</button>
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
                              <th>Shift Name</th>
                              <th>Shift Type</th>
                              <th>Start Time</th>
                              <th>End Time</th>
                              <th>PPT in min</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php if (($_smarty_tpl->tpl_vars['shifts']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shifts']->value, 'm');
$_smarty_tpl->tpl_vars['m']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value->shift_type;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value->start_time;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value->end_time;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['m']->value->ppt;?>
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
<!-- /.content-wrapper -->
<?php echo '<script'; ?>
>
   $(document).ready(function() {
       $('#shiftName').on('change', function() {
           var shift_type = $('#shiftName').find(":selected").val();
           shift_type = parseInt(shift_type);
           if (shift_type === 12) {
               $("#option_3").attr("disabled", "disabled");
           } else {
               $('#option_3').removeAttr('disabled');
   
           }
   
       });
   
   });
<?php echo '</script'; ?>
><?php }
}
