<?php
/* Smarty version 4.3.2, created on 2024-06-19 14:35:09
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/customer_parts_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66729f452db088_96497546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9758840f8dee6a9fec701333b65c4e65d9f613bf' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/customer_parts_admin.tpl',
      1 => 1718787873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66729f452db088_96497546 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper" style="width:100%">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Customer Parts</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active">Approval</li>
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
                     <h3 class="card-title">
                     </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form action="<?php echo base_url('customer_parts_admin');?>
" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-lg-4">
                              <div style="width: 400px;">
                                 <div class="form-group">
                                    <label for="on click url">Select Part Number <span
                                       class="text-danger">*</span></label> <br>
                                    <select name="part_id_selected" class="form-control select2" id="">
                                       	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_parts_list_distinct']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
											<option <?php if (($_smarty_tpl->tpl_vars['part_id_selected']->value === $_smarty_tpl->tpl_vars['c']->value->id)) {?>selected <?php }?>
	                                        value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
	                                            <?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>

	                                        </option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <label for="">&nbsp;</label> <br>
                              <button class="btn btn-secondary">Search </button>
                           </div>
                        </div>
                     </form>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Part Number</th>
                              <th>Part Description</th>
                              <th>FG Stock</th>
                              <?php if (($_smarty_tpl->tpl_vars['enableStockUpdate']->value == "true")) {?>
                              <th>Actions</th>
                              <?php }?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php if (($_smarty_tpl->tpl_vars['child_part']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part']->value, 'po');
$_smarty_tpl->tpl_vars['po']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['po']->value) {
$_smarty_tpl->tpl_vars['po']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['po']->value->part_number;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['po']->value->part_description;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['po']->value->fg_stock;?>
</td>
		                              <?php if (($_smarty_tpl->tpl_vars['enableStockUpdate']->value == "true")) {?>
		                              <td>
		                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary"
		                                    data-target="#exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i
		                                    class="fas fa-edit"></i></button>
		                                 <div class="modal fade" id="exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" role="dialog"
		                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog modal-lg" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Update
		                                             </h5>
		                                             <button type="button" class="close" data-dismiss="modal"
		                                                aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form
		                                                action="<?php echo base_url('update_customer_parts_master_fg_stock');?>
"
		                                                method="POST">
		                                                <div class="row">
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="part_number">Part
		                                                         Number</label><span
		                                                            class="text-danger">*</span>
		                                                         <input readonly type="text"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['po']->value->part_number;?>
"
		                                                            name="part_number" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Number">
		                                                         <input type="hidden" name="id"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['po']->value->id;?>
">
		                                                      </div>
		                                                      <div class="form-group">
		                                                         <label for="Client_name">Part
		                                                         Description</label><span
		                                                            class="text-danger">*</span>
		                                                         <input type="text"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['po']->value->part_description;?>
"
		                                                            name="part_description" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Description">
		                                                      </div>
		                                                      <div class="form-group">
		                                                         <label
		                                                            for="safty_buffer_stk">Stock</label><span
		                                                            class="text-danger">*</span>
		                                                         <input type="number"
		                                                            step="any"
		                                                            value="<?php echo $_smarty_tpl->tpl_vars['po']->value->fg_stock;?>
"
		                                                            name="stock" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Specification">
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
		                                             </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <?php }?>
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
