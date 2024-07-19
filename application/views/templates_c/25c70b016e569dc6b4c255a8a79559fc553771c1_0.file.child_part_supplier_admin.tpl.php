<?php
/* Smarty version 4.3.2, created on 2024-06-19 12:28:37
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/child_part_supplier_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6672819d987b64_93150535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25c70b016e569dc6b4c255a8a79559fc553771c1' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/child_part_supplier_admin.tpl',
      1 => 1718780316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6672819d987b64_93150535 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
   <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Supplier Part Price </h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard');?>
">Home</a></li>
                     <li class="breadcrumb-item active">item part List</li>
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
                  <div class="card">
                     <!-- /.card-header -->
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr. No.</th>
                                 <th>Action</th>
                                 <th>Revision Number</th>
                                 <th>Revision Remark</th>
                                 <th>Revision Date</th>
                                 <th>Part Number</th>
                                 <th>Part Description</th>
                                 <th>Tax Structure</th>
                                 <th>With In State</th>
                                 <th>Supplier</th>
                                 <th>Part Price</th>
                                 <th>Quotation Document </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php if (($_smarty_tpl->tpl_vars['child_part_list']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_part_list']->value, 'poo');
$_smarty_tpl->tpl_vars['poo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['poo']->value) {
$_smarty_tpl->tpl_vars['poo']->do_else = false;
?>
                                 		<?php $_smarty_tpl->_assignInScope('po', $_smarty_tpl->tpl_vars['poo']->value->po);?>
                                        <?php if (($_smarty_tpl->tpl_vars['po']->value[0]->admin_approve == "no")) {?>
                                         	<?php $_smarty_tpl->_assignInScope('supplier_data', $_smarty_tpl->tpl_vars['poo']->value->supplier_data);?>
                                         	<?php $_smarty_tpl->_assignInScope('uom_data', $_smarty_tpl->tpl_vars['poo']->value->uom_data);?>
                                            <?php $_smarty_tpl->_assignInScope('gst_structure2', $_smarty_tpl->tpl_vars['poo']->value->gst_structure2);?>
				                            <tr>
				                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
				                                <td>
				                                    <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModaledit2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i class="fas fa-edit"></i></button>
				                                    <div class="modal fade" id="exampleModaledit2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				                                       <div class="modal-dialog " role="document">
				                                          <div class="modal-content">
				                                             <div class="modal-header">
				                                                <h5 class="modal-title" id="exampleModalLabel">Approve Price </h5>
				                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                                                <span aria-hidden="true">&times;</span>
				                                                </button>
				                                             </div>
				                                             <div class="modal-body">
				                                                <form action="<?php echo base_url('updatechildpart_supplier_admin');?>
" method="POST" enctype='multipart/form-data'>
				                                                   <div class="row">
				                                                      <div class="col-lg-12">
				                                                         <input value="<?php echo $_smarty_tpl->tpl_vars['po']->value[0]->id;?>
" type="hidden" name="id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
				                                                         <div class="form-group">
				                                                            <label for="po_num">Are You Sure Want to Approve this Price ? </label><span class="text-danger">*</span>
				                                                         </div>
				                                                         <div class="form-group">
				                                                            <label for="po_num">Part Number </label><span class="text-danger">*</span>
				                                                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['po']->value[0]->part_number;?>
" name="upart_number" readonly class="form-control" placeholder="Enter Part Number.">
				                                                         </div>
				                                                         <div class="form-group">
				                                                            <label for="po_num">Part Price </label><span class="text-danger">*</span>
				                                                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['po']->value[0]->part_rate;?>
" name="upart_desc"  required class="form-control" id="exampleInputEmail1">
				                                                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['po']->value[0]->id;?>
" name="id"  required class="form-control" id="exampleInputEmail1" >
				                                                         </div>
				                                                      </div>
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
							                     </td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->revision_no;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->revision_remark;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->revision_date;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->part_number;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->part_description;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['gst_structure2']->value[0]->code;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['supplier_data']->value[0]->with_in_state;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['supplier_data']->value[0]->supplier_name;?>
</td>
							                     <td><?php echo $_smarty_tpl->tpl_vars['po']->value[0]->part_rate;?>
</td>
							                     <td>
							                     <?php if ((!empty($_smarty_tpl->tpl_vars['po']->value[0]->quotation_document))) {?>
							                     	<a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['po']->value[0]->quotation_document;?>
" download>Download </a>
							                     <?php }?>
							                     </td>
							                </tr>
				                        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
				                        <?php }?>
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
