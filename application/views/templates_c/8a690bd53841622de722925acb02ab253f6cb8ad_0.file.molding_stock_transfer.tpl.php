<?php
/* Smarty version 4.3.2, created on 2024-06-25 11:17:47
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/molding_stock_transfer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_667a5a039f3627_64424679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a690bd53841622de722925acb02ab253f6cb8ad' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/molding_stock_transfer.tpl',
      1 => 1719294467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667a5a039f3627_64424679 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Molding Stock Transfer</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Assets</li>
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
                           <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<?php echo base_url('add_molding_stock_transfer');?>
"
                                 method="POST" enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Customer Part / Molding Production Qty<span
                              class="text-danger">*</span></label>
                           <select required name="customer_part_id" class="form-control select2">
                           <?php if (($_smarty_tpl->tpl_vars['customer_part']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_part']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
	                           <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
	                           <?php echo $_smarty_tpl->tpl_vars['c']->value->part_number;?>
 / <?php echo $_smarty_tpl->tpl_vars['c']->value->part_description;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->molding_production_qty;?>

	                           </option>
	                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Enter Final Inspection Qty<span
                              class="text-danger">*</span></label>
                           <input type="number" min="0" value="0" max=""
                              name="final_inspection_location" required class="form-control">
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
                     <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addPromo">
                        Add Request
                        </button> -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Part Number / Description</th>
                              <!-- <th>Semi Finished Qty</th>
                                 <th>Deflashing / Assembly Qty</th> -->
                              <th>Final Inspection Qty</th>
                              <th>Status</th>
                              <th>Transfer</th>
                              <th>Date & Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (($_smarty_tpl->tpl_vars['molding_stock_transfer']->value)) {?>
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['molding_stock_transfer']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
	                           <tr>
	                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->part_number;?>
 /
	                                 <?php echo $_smarty_tpl->tpl_vars['u']->value->part_description;?>
/
	                              </td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->final_inspection_location;?>
</td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->status;?>
</td>
	                              <td><?php if (($_smarty_tpl->tpl_vars['u']->value->status == "pending")) {?>
	                                 <a class="btn btn-warning"
	                                    href="<?php echo base_url('molding_stock_transfer_click/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">Click
	                                 To
	                                 Transfer Stock</a>
	                                 <?php } else { ?>
	                                    Stock Transferred
	                                 <?php }?>
	                              </td>
	                              <td><?php echo $_smarty_tpl->tpl_vars['u']->value->created_date;?>
 / <?php echo $_smarty_tpl->tpl_vars['u']->value->created_time;?>
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
