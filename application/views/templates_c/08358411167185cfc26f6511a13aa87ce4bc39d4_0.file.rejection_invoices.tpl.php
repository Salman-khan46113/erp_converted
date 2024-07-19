<?php
/* Smarty version 4.3.2, created on 2024-06-21 10:53:34
  from '/var/www/html/extra/erp_converted/application/views/templates/quality/rejection_invoices.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66750e563f3b68_97430443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08358411167185cfc26f6511a13aa87ce4bc39d4' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/quality/rejection_invoices.tpl',
      1 => 1718774574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66750e563f3b68_97430443 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
   <!-- Navbar -->
   <!-- /.navbar -->
   <!-- Main Sidebar Container -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Rejection Invoice</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('index');?>
">Home</a></li>
                     <li class="breadcrumb-item active">Rejection Invoice</li>
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
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <form action="<?php echo base_url('generate_rejection_sales_invoice');?>
" method="POST">
                                    <label for="">Select Customer<span class="text-danger">*</span> </label>
                                    <select name="customer_id" required id="" class="form-control select2">
                                       <?php if (($_smarty_tpl->tpl_vars['customer']->value)) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
		                                       <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
">
		                                          <?php echo $_smarty_tpl->tpl_vars['s']->value->customer_name;?>

		                                       </option>
		                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </select>
                              </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Customer Debit Note No</label><span class="text-danger">*</span></label>
                           <input type="text" placeholder="Customer Debit Note No" name="customer_debit_note_no" class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="on click url">Customer Debit Note Date
                           <span class="text-danger">*</span></label>
                           <input max="<?php echo date('Y-m-d');?>
" type="date"
                              value="" name="customer_debit_note_date"
                              class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Client Sales Invoice No</label></label>
                           <input type="text" placeholder="Client Sales Invoice No" name="client_sales_invoice_no" class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="on click url">Client Invoice Date
                           </label>
                           <input max="<?php echo date('Y-m-d');?>
" type="date"
                              value="" name="client_invoice_date"
                              class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="on click url">Debit Basic Amount<span
                              class="text-danger">*</span></label>
                           <input type="number" step="any" min="0.00" value="0" name="debit_basic_amt"
                              class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <label for="on click url">GST Amount</label>
                           <input type="number" step="any" min="0.00" name="debit_gst_amt"
                              class="form-control">
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Enter Remark </label>
                           <input type="text" placeholder="Enter Remark" value="" name="remark" class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Rejection Reason</label>
                           <select name="rejection_reason" id=""
                              class="form-control select2">
                           <?php if (($_smarty_tpl->tpl_vars['reject_remark']->value)) {?>
	                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reject_remark']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
		                            <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
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
                           <div class="col-lg-2">
                           <div class="form-group">
                           <button type="submit" class="btn btn-primary mt-4">Generate Request</button>
                           </div>
                           </form>
                           </div>
                        </div>
                     </div>
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr No</th>
                                 <th>Rejection Invoice No</th>
                                 <th>Customer</th>
                                 <th>Customer Debit Note No</th>
                                 <th>Customer Debit Note Date</th>
                                 <th>Client Sales Invoice No</th>
                                 <th>Client Invoice Date</th>
                                 <th>Basic Amount</th>
                                 <th>GST Amount</th>
                                 <th>View Details</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if (($_smarty_tpl->tpl_vars['rejection_sales_invoice']->value)) {?>
                                    <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rejection_sales_invoice']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
			                              <tr>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->rejection_invoice_no;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->customer_name;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->document_number;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->debit_note_date;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->sales_invoice_number;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->client_invoice_date;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->debit_basic_amt;?>
</td>
			                                 <td><?php echo $_smarty_tpl->tpl_vars['u']->value->debit_gst_amt;?>
</td>
			                                 <td>
			                                    <a class="btn btn-info" href="<?php echo base_url('view_rejection_sales_invoice_by_id/');
echo $_smarty_tpl->tpl_vars['u']->value->id;?>
">
			                                    <i class="fa fa-history">
			                                    </i>
			                                    </a>
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
