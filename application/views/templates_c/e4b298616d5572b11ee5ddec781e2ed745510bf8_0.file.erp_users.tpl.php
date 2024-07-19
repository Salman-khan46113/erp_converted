<?php
/* Smarty version 4.3.2, created on 2024-06-21 15:36:42
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/erp_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667550b23f1376_95845468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4b298616d5572b11ee5ddec781e2ed745510bf8' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/erp_users.tpl',
      1 => 1718964401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667550b23f1376_95845468 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper" >
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>ERP Users</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Part Family</li>
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
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add EPR Users</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<?php echo base_url('add_users_data');?>
" method="POST" enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Full Name<span class="text-danger">*</span></label> <br>
                           <input required type="text" name="user_name" placeholder="Enter Full Name" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Email<span class="text-danger">*</span></label> <br>
                           <input required type="email" name="user_email" placeholder="Enter Email" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Password<span class="text-danger">*</span></label> <br>
                           <input required type="password" name="user_password" placeholder="Enter Password" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Role<span class="text-danger">*</span></label> <br>
                           <select name="user_role" class="form-control" id="">
                           <option value="Admin">Admin</option>
                           <option value="Purchase">Purchase</option>
                           <option value="Approver">Approver</option>
                           <option value="inward_stores">inward stores </option>
                           <option value="stores">stores </option>
                           <option value="production">production</option>
                           <option value="FG_stores">FG stores</option>
                           <option value="Marketing">Marketing</option>
                           <option value="Development">Development</option>
                           <option value="Quality">Quality</option>
                           <option value="Inward_Quality">Inward Quality</option>
                           <option value="Sales">Sales</option>
                           </select>
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
                     Add ERP Users
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Role</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if ((true)) {?>
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_info']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->user_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->user_email;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->user_password;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->type;?>
</td>
		                              <!-- <td><?php echo '<?php'; ?>
 echo $u->user_role <?php echo '?>'; ?>
</td> -->
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
