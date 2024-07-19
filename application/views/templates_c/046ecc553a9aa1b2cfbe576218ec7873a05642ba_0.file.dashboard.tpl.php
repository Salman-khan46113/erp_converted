<?php
/* Smarty version 4.3.2, created on 2024-06-21 12:49:26
  from '/var/www/html/extra_work/erp_converted/application/views/templates/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6675297e5b1532_51639473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '046ecc553a9aa1b2cfbe576218ec7873a05642ba' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/dashboard.tpl',
      1 => 1717674611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6675297e5b1532_51639473 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                               		<?php echo $_smarty_tpl->tpl_vars['total_sales_value_yesterday']->value[0]->MAINSUM > 0 ? $_smarty_tpl->tpl_vars['total_sales_value_yesterday']->value[0]->MAINSUM : 0;?>

                                </h4>
                                <p>Total Sales Value YESTERDAY</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('pei_chart_sales_values_in_rs');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('isMultipleClientUnits', $_smarty_tpl->tpl_vars['session_data']->value['isMultipleClientUnits']);?>
                    <?php if (($_smarty_tpl->tpl_vars['isMultipleClientUnits']->value == "false")) {?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4><?php echo '<%'; ?>
 number_format($total_value,2) <?php echo '%>'; ?>
</h4>
                                    <p>Total RM Stock Value</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo base_url('part_stocks');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <?php } else { ?>
                            <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div style="display: flex;justify-content: space-between;">
                                        <div class="inner" style="padding-left: 1em;padding-top: 0.2em; flex-basis: 40%;;">
                                            <h4><?php echo number_format($_smarty_tpl->tpl_vars['total_value']->value,2);?>
<h4>
                                            <p>Total RM Stock - <br>Unit 1</p>
                                        </div>
                                        <div class="inner" style="padding-left: 1em;padding-top: 0.2em; flex-basis: 45%;">
                                            <h4><?php echo number_format($_smarty_tpl->tpl_vars['total_value_unit2']->value,2);?>
</h4>
                                            <p>Total RM Stock - <br>Unit 2</p>
                                        </div>
                                    </div>
                                        <a href="<?php echo base_url('part_stocks');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                    <?php }?>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>
                                    <?php echo number_format($_smarty_tpl->tpl_vars['grn_value_month']->value[0]->MAINSUM,2);?>

                                    <sup style="font-size: 20px"></sup>
                                </h4>

                                <p>GRN Value Current Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo '<?'; ?>
%base_url('reports_grn')<?php echo '%>'; ?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                                    <?php echo $_smarty_tpl->tpl_vars['customer_ppm_last_month']->value;?>

                                </h4>

                                <p>Customer PPM Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('rejection_invoices');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><?php echo $_smarty_tpl->tpl_vars['total_sales_value_month']->value[0]->MAINSUM > 0 ? number_format($_smarty_tpl->tpl_vars['total_sales_value_month']->value[0]->MAINSUM,2) : 0;?>

                                </h4>
                                <p>Total Sales Value Current Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('pei_chart_sales_values_in_rs');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4><?php echo number_format($_smarty_tpl->tpl_vars['total_value_fg']->value,2);?>
</h4>
                                <p>Total FG Stock Value</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo base_url('fw_stock');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h4>
                                	<?php echo $_smarty_tpl->tpl_vars['subcon_challan_stock']->value;?>

                                </h4>

                                <p>Subcon challan stock value</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('subcon_supplier_challan_part_report');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4>
                                	<?php echo $_smarty_tpl->tpl_vars['customer_ppm_fy']->value;?>

                                </h4>
                                <p>Customer PPM FY</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('rejection_invoices');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Production OEE</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('rejection_invoices');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Inhouse PPM</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('rejection_invoices');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><?php echo $_smarty_tpl->tpl_vars['total_amntreceivetotal']->value;?>
</h4>

                                <p>Receivable Due Amount</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('receivable_report');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Payable Due Amount</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('rejection_invoices');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4><?php echo $_smarty_tpl->tpl_vars['total_gsttotal']->value;?>
</h4>

                                <p>Total Amount with GST</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo base_url('receivable_report');?>
" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">                        
                        <div class="small-box bg-white">
                            <table class="table table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th rowspan="3" class="text-center align-middle">Total Production <br>on <?php echo $_smarty_tpl->tpl_vars['yesterday_date']->value;?>

                                        </th>
                                        <th colspan="2">YESTERDAY</th>
                                    </tr>
                                    <tr>
                                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shifts']->value, 'shift_data');
$_smarty_tpl->tpl_vars['shift_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shift_data']->value) {
$_smarty_tpl->tpl_vars['shift_data']->do_else = false;
?>
                                    		<th><?php echo $_smarty_tpl->tpl_vars['shift_data']->value->shift_type;?>
</th>
                                    	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                       
                                    </tr>
                                    <tr>
                                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shifts']->value, 'shift_data');
$_smarty_tpl->tpl_vars['shift_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shift_data']->value) {
$_smarty_tpl->tpl_vars['shift_data']->do_else = false;
?>
                                    		<?php $_smarty_tpl->_assignInScope('shift_data_val', (array) $_smarty_tpl->tpl_vars['shift_data']->value);?>
                                    		<?php if ((isset($_smarty_tpl->tpl_vars['shift_data_val']->value['MAINSUM']))) {?>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['shift_data_val']->value['MAINSUM'];?>
</th>
                                    		<?php } else { ?>
                                    			<th>0</th>
                                    		<?php }?>
                                    	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                 <div class="row">
                  
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php }
}
