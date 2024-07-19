<?php
/* Smarty version 4.3.2, created on 2024-06-23 12:41:45
  from '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/report_prod_rejection.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6677cab141ffb6_27793263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98b3dbdaa02982ea18df47c07488d18510f3c87d' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/admin/molding/report_prod_rejection.tpl',
      1 => 1719126704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6677cab141ffb6_27793263 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
<!-- Navbar -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Production Rejection Report</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>
">Home</a></li>
                  <li class="breadcrumb-item active">Report</li>
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
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">
                                 <span class="text-danger">Data Analysis </span>
                                 <div style="padding-left: 10px;padding-top:10px">
                                    <li>Total rejection across all the customers : <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['total_rejection']->value[0]->total_rejection_qty;?>
</span></li>
                                    <li>Maximum rejections are for reason <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['max_rejection_reason']->value[0]->name;?>
</span> with Quantity: <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['max_rejection_reason']->value[0]->total_rejection_qty;?>
</span></li>
                                    <li>Maximum rejection on machine : <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['machine_analysis']->value[0]->machine_name;?>
</span> for reason <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['machine_analysis']->value[0]->name;?>
</span> with Quantity: <span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['machine_analysis']->value[0]->total_rejection_qty;?>
</span></li>
                                 </div>
                              </label>
                           </div>
                        </div>
                     </div>
                     <span class="text-info"> Display more details</span>
                     <i id="showIcon" class="fas fa-eye" style="cursor: pointer; display: none;"></i>
                     <i id="hideIcon" class="fas fa-eye-slash" style="cursor: pointer; display: inline;"></i>
                     <div id="dataAnalysis" style="display: none;">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="card-body" style="text-wrap:nowrap;">
                                 <table id="exa" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>Top Rejection Reason</th>
                                          <th>Total Rejection QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php if (($_smarty_tpl->tpl_vars['max_rejection_reason']->value)) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['max_rejection_reason']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
		                                       <tr>
		                                          <td><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</td>
		                                          <td><?php echo $_smarty_tpl->tpl_vars['r']->value->total_rejection_qty;?>
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
                           <div class="col-lg-3">
                              <div class="card-body" style="text-wrap:nowrap;">
                                 <table id="exa" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>Machine Name</th>
                                          <th>Rejection Reason</th>
                                          <th>Total Rejection QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php if (($_smarty_tpl->tpl_vars['machine_analysis']->value)) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['machine_analysis']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
		                                       <tr>
		                                          <td><?php echo $_smarty_tpl->tpl_vars['r']->value->machine_name;?>
</td>
		                                          <td><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</td>
		                                          <td><?php echo $_smarty_tpl->tpl_vars['r']->value->total_rejection_qty;?>
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
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Rejection Reason</th>
                              <th>Rejection QTY</th>
                              <th>Customer</th>
                              <th>Part Details</th>
                              <th>Date/Shift</th>
                              <th>Machine</th>
                              <th>Operator</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php if (($_smarty_tpl->tpl_vars['report_prod_rejection']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['report_prod_rejection']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
		                           <tr>
		                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->rejection_reason;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->rejection_qty;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->customer_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->part_number;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->prod_date;?>
/ <?php echo $_smarty_tpl->tpl_vars['r']->value->shift_type;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->machine_name;?>
</td>
		                              <td><?php echo $_smarty_tpl->tpl_vars['r']->value->operator_name;?>
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
   document.getElementById("showIcon").addEventListener("click", function() {
       document.getElementById("dataAnalysis").style.display = "none";
       document.getElementById("showIcon").style.display = "none";
       document.getElementById("hideIcon").style.display = "inline";
   });
   
   document.getElementById("hideIcon").addEventListener("click", function() {
       document.getElementById("dataAnalysis").style.display = "block";
       document.getElementById("showIcon").style.display = "inline";
       document.getElementById("hideIcon").style.display = "none";
   });
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
