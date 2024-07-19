<?php
/* Smarty version 4.3.2, created on 2024-06-21 14:25:45
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/operations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66754011737b82_17904210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '653f92ac4ae5621472c06cd5da3cbb2f021f1a37' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/operations.tpl',
      1 => 1718959327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66754011737b82_17904210 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper" >
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Operation Number</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Operation Number</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>

   <section class="content">
      <div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <br>
            <div class="col-lg-12">
               <!-- Modal -->
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form action="<?php echo base_url('add_operations');?>
" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label for="on click url">Operation Number <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="name" placeholder="Enter Operation Number" class="form-control" value="" id="">
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
               <div class="card">
                  <div class="card-header">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                     Add Operations
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th> Operation Number</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operations']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
                           <tr>
                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
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
                                             <form action="<?php echo base_url('update_operations');?>
" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                   <label for="">Operation Number <span class="text-danger">*</span></label>
                                                   <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
" type="text" class="form-control" name="name">
                                                   <input required value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
" type="hidden" class="form-control" name="id">
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
