<?php
/* Smarty version 4.3.2, created on 2024-06-21 16:28:46
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/grades.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66755ce6aa7832_04868342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92087cc4bddd82109cfaebf06efc757b4fe77314' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/grades.tpl',
      1 => 1718967415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66755ce6aa7832_04868342 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Grades</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Grades</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Content Header (Page header) -->
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
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form action="<?php echo base_url('add_grades');?>
" method="POST"
                              enctype="multipart/form-data">
                              <div class="form-group">
                                 <label for="on click url">Grades <span
                                    class="text-danger">*</span></label> <br>
                                 <input required type="text" name="name"
                                    placeholder="Enter Grade Name" class="form-control" value=""
                                    id="">
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
                  <?php echo '<?php'; ?>

                     <?php echo '?>'; ?>

                  <div class="card-header">
                     <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addPromo">
                     Add Grades
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Name</th>
                              <th>Rejection Qty</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                              <?php if (($_smarty_tpl->tpl_vars['grades']->value)) {?>
                              	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['grades']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->rejection_qty;?>
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
