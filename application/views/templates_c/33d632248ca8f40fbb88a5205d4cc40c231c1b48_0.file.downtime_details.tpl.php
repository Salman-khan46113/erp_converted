<?php
/* Smarty version 4.3.2, created on 2024-06-25 00:26:52
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/downtime_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6679c174344375_50630433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33d632248ca8f40fbb88a5205d4cc40c231c1b48' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/downtime_details.tpl',
      1 => 1719255368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6679c174344375_50630433 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Downtime Details</h1>
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
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> </h3>
                  <div class="row">
                     <div class="col-lg-1">
                        <div class="form-group">
                           <?php $_smarty_tpl->_assignInScope('base_url', 'p_q_molding_production');?>
                           <?php if (($_smarty_tpl->tpl_vars['view_page']->value != 'add')) {?>
                           		<?php $_smarty_tpl->_assignInScope('base_url', 'view_p_q_molding_production');?>
                            <?php }?>
                           <a class="btn btn-dark" href="<$base_url($base_url) <?php echo '%>'; ?>
">< Back </a>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                           Add Downtime</button>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="po_num">Customer Name</label>
                           <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['customer_part_details']->value[0]->customer_name;?>
" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="po_num">Part Number</label>
                           <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['customer_part_details']->value[0]->part_number;?>
" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="po_num">Part Description</label>
                           <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['customer_part_details']->value[0]->part_description;?>
" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="date">Date</label>
                           <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['molding_prod_details']->value[0]->date;?>
" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-1">
                        <div class="form-group">
                           <label for="po_num">Shift</label><br>
                           <label for="po_num">
                              <?php echo $_smarty_tpl->tpl_vars['molding_prod_details']->value[0]->shift_type;?>
/<?php echo $_smarty_tpl->tpl_vars['molding_prod_details']->value[0]->shift_name;?>

                        </div>
                     </div>
                     <div class="col-lg-2">
                     <div class="form-group">
                     <label for="po_num">Machine</label>
                     <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['molding_prod_details']->value[0]->name;?>
" required class="form-control">
                     </div>
                     </div>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role=" document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add Downtime</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-12">
                                       <form action="<?php echo base_url('add_downtime_details');?>
" method="POST">
                                          <div class="form-group">
                                             <label for="">Downtime Reason</label>
                                             <select name="downtime_reason" id=""
                                                class="form-control select2">
                                                <option value="NA">NA</option>
                                                ';
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['downtime_master']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
                                                <option 
                                                   value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
">
                                                   <?php echo $_smarty_tpl->tpl_vars['d']->value->name;?>

                                                </option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Downtime in Min</label>
                                             <input type="text"
                                                name="downtime"
                                                value=""
                                                class="form-control">
                                             <input type="hidden"
                                                readonly class="form-control"
                                                name="molding_production_id"
                                                value="<?php echo $_smarty_tpl->tpl_vars['molding_production_id']->value;?>
"
                                                >
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                             <button type="submit" class="btn btn-primary">Save</button>
                                       </form>
                                       </div>
                                    </div>
                                 </div>
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
                              <th>Downtime Reason</th>
                              <th>Downtime in Min</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php if (($_smarty_tpl->tpl_vars['downtime_details']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['downtime_details']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->downtime;?>
</td>
		                              <td>
		                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i class="fas fa-edit"></i></button>
		                                 <div class="modal fade" id="exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog modal-lg" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Update Downtime</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form action="<?php echo base_url('update_downtime_details');?>
" method="POST">
		                                                <div class="form-group">
		                                                   <label for="">Downtime Reason</label>
		                                                   <select name="downtime_reason" id=""
		                                                      class="form-control select2">
		                                                      <option value="NA">NA</option>
		                                                      ';
		                                                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['downtime_master']->value, 'dm');
$_smarty_tpl->tpl_vars['dm']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dm']->value) {
$_smarty_tpl->tpl_vars['dm']->do_else = false;
?>
			                                                      <option 
			                                                         value="<?php echo $_smarty_tpl->tpl_vars['dm']->value->id;?>
" 
			                                                         <?php if (($_smarty_tpl->tpl_vars['r']->value->downtime_reasonKy == $_smarty_tpl->tpl_vars['dm']->value->id)) {?>selected <?php }?> >
			                                                         <?php echo $_smarty_tpl->tpl_vars['dm']->value->name;?>

			                                                      </option>
		                                                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		                                                   </select>
		                                                </div>
		                                                <div class="form-group">
		                                                   <label for="">Downtime in Min</label>
		                                                   <input type="text"
		                                                      name="downtime"
		                                                      value="<?php echo $_smarty_tpl->tpl_vars['r']->value->downtime;?>
"
		                                                      class="form-control">
		                                                   <input type="hidden"
		                                                      readonly class="form-control"
		                                                      name="molding_production_id"
		                                                      value="<?php echo $_smarty_tpl->tpl_vars['molding_production_id']->value;?>
">
		                                                   <input type="hidden"
		                                                      readonly class="form-control"
		                                                      name="id"
		                                                      value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
">
		                                                </div>
		                                                <div class="modal-footer">
		                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                                                   <button type="submit" class="btn btn-primary">Save changes</button>
		                                                </div>
		                                             </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal3<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i class="far fa-trash-alt"></i></button>
		                                 <!-- Button trigger modal -->
		                                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		                                    Launch demo modal
		                                    </button> -->
		                                 <!-- Modal -->
		                                 <div class="modal fade" id="exampleModal3<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <form action="<?php echo base_url('delete');?>
" method="POST">
		                                             <div class="modal-body">
		                                                <input value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
" name="id" type="hidden" required class="form-control">
		                                                <input value="mold_production_downtime_details" name="table_name" type="hidden" required class="form-control">
		                                                Are you sure you want to delete
		                                             </div>
		                                             <div class="modal-footer">
		                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                                                <button type="submit" class="btn btn-danger">Delete </button>
		                                             </div>
		                                          </form>
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
