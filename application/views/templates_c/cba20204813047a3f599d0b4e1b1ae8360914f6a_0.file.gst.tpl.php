<?php
/* Smarty version 4.3.2, created on 2024-06-21 15:23:42
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/gst.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66754da6ea4a47_33916044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba20204813047a3f599d0b4e1b1ae8360914f6a' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/gst.tpl',
      1 => 1718963606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66754da6ea4a47_33916044 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>GST</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">GST</li>
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
                     <h3 class="card-title"> </h3>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                     Add Code </button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role=" document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add GST</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="<?php echo base_url('add_gst');?>
" method="POST">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">Enter Tax Code </label><span class="text-danger">*</span>
                                             <input type="text" name="code" required class="form-control" placeholder="Enter Tax Code">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">Enter SGST </label><span class="text-danger">*</span>
                                             <input type="number" step="any" min="0" max="100" name="sgst" required class="form-control" placeholder="Enter S-GST Value">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">Enter CGST </label><span class="text-danger">*</span>
                                             <input type="number" step="any" min="0" max="100" name="cgst" required class="form-control" placeholder="Enter C-GST Value">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">Enter IGST </label><span class="text-danger">*</span>
                                             <input type="number" step="any" min="0" max="100" name="igst" required class="form-control" placeholder="Enter I-GST Value">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">Enter TCS </label><span class="text-danger">*</span>
                                             <input type="number" step="any" min="0" max="100" name="tcs" required class="form-control" placeholder="Enter TCS Value">
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="contractorName">TCS on Taxable amount</label><span class="text-danger">*</span>
                                             <select name="tcs_on_tax" id="" class="form-control">
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                                <option value="NA">NA</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>With in State </label><span class="text-danger">*</span>
                                          <select class="form-control select2" name="with_in_state" style="width: 100%;">
                                             <option <?php if (($_smarty_tpl->tpl_vars['s']->value->with_in_state == "yes")) {?>selected<?php }?> value="yes">Yes</option>
                                             <option <?php if (($_smarty_tpl->tpl_vars['s']->value->with_in_state == "no")) {?>selected<?php }?> value="no">No</option>
                                          </select>
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
                              <th>Code</th>
                              <th>S-GST %</th>
                              <th>C-GST %</th>
                              <th>I-GST %</th>
                              <th>TCS %</th>
                              <th>TCS on taxable amount</th>
                              <th>Created Date</th>
                              <th>With In State</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php if (($_smarty_tpl->tpl_vars['gst']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gst']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->code;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->sgst;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->cgst;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->igst;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->tcs;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->tcs_on_tax;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->created_date;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['t']->value->with_in_state;?>
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
		                                                   <form action="<?php echo base_url('update_gst');?>
" method="POST" enctype="multipart/form-data">
		                                                      <div class="form-group">
		                                                         <label for="contractorName">Enter SGST </label><span class="text-danger">*</span>
		                                                         <input type="number" step="any" value="<?php echo $_smarty_tpl->tpl_vars['t']->value->sgst;?>
" min="0" max="100" name="sgst" required class="form-control" placeholder="Enter S-GST Value">
		                                                      </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                <div class="form-group">
		                                                <label for="contractorName">Enter CGST </label><span class="text-danger">*</span>
		                                                <input type="number" step="any" value="<?php echo $_smarty_tpl->tpl_vars['t']->value->cgst;?>
" min="0" max="100" name="cgst" required class="form-control" placeholder="Enter C-GST Value">
		                                                </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                <div class="form-group">
		                                                <label for="contractorName">Enter IGST </label><span class="text-danger">*</span>
		                                                <input type="number" step="any" min="0" value="<?php echo $_smarty_tpl->tpl_vars['t']->value->igst;?>
" max="100" name="igst" required class="form-control" placeholder="Enter I-GST Value">
		                                                </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                <div class="form-group">
		                                                <label for="contractorName">Enter TCS </label><span class="text-danger">*</span>
		                                                <input type="number" step="any" min="0" value="<?php echo $_smarty_tpl->tpl_vars['t']->value->tcs;?>
" max="100" name="tcs" required class="form-control" placeholder="Enter TCS Value">
		                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['t']->value->id;?>
" max="100" name="id" required class="form-control" placeholder="Enter TCS Value">
		                                                </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                <div class="form-group">
		                                                <label for="contractorName">TCS On GST</label><span class="text-danger">*</span>
		                                                <select name="tcs_on_tax" id="" class="form-control">
		                                                <option value="yes" <?php if (($_smarty_tpl->tpl_vars['t']->value->tcs == "yes")) {?>selected<?php }?>>yes</option>
		                                                <option value="no" <?php if (($_smarty_tpl->tpl_vars['t']->value->tcs == "no")) {?>selected<?php }?>>no</option>
		                                                <option value="no" <?php if (($_smarty_tpl->tpl_vars['t']->value->tcs == "NA")) {?>selected<?php }?>>NA</option>
		                                                </select>
		                                                </div>
		                                                </div>
		                                                <div class="form-group">
		                                                <label>With in State </label><span class="text-danger">*</span>
		                                                <select class="form-control select2" name="with_in_state" style="width: 100%;">
		                                                <option <?php if (($_smarty_tpl->tpl_vars['t']->value->with_in_state == "yes")) {?>selected<?php }?> value="yes">Yes</option>
		                                                <option <?php if (($_smarty_tpl->tpl_vars['t']->value->with_in_state == "no")) {?>selected<?php }?> value="no">No</option>
		                                                </select>
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
		                                 <!-- delete Modal -->
		                                 <div class="modal fade" id="delete<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
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
		                                             <form action="<?php echo base_url('delete_customer');?>
" method="POST" enctype="multipart/form-data">
		                                                Are You Sure Want To Delete This?
		                                                <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" type="hidden" class="form-control" name="id">
		                                          </div>
		                                          <div class="modal-footer">
		                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                          <button type="submit" class="btn btn-primary">Save changes</button>
		                                          </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                                 <!-- delete Modal -->
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
