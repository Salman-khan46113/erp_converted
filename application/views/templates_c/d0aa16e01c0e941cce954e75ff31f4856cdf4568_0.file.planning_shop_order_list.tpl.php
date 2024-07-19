<?php
/* Smarty version 4.3.2, created on 2024-06-21 10:53:30
  from '/var/www/html/extra/erp_converted/application/views/templates/customer/planning_shop_order_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66750e52b65710_37628823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0aa16e01c0e941cce954e75ff31f4856cdf4568' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/customer/planning_shop_order_list.tpl',
      1 => 1718946959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66750e52b65710_37628823 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/extra/erp_converted/application/third_party/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="wrapper">
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
                        <h1>Shop Order Details</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                
                                <div class="row">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalShop">
                                        Add Order</button>
                                        
                                        <div class="modal fade" id="exampleModalShop" role="dialog"
                                        aria-labelledby="exampleModalShop" aria-hidden="true">
                                        <div class="modal-dialog" role=" document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalShop">Shop Order</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
add_planning_shop_order" method="POST">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Customer <span class="text-danger">*</span></label>
                                                                <select name="customer_id" id="customerTracking" required class="form-control select2">
                                                                    <option value=''>Select</option>
                                                                    <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value->customer_name;?>
</option>
                                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                    <?php }?>
                                                                </select> 
                                                                </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                    <label for="">Select Customer Part Number / Description
                                                                    <span class="text-danger">*</span> </label>
                                                                    <select name="customerPartId" id="customerPartId" required class="form-control select2">
                                                                        <option value=''>Please select</option>
                                                                    </select>
                                                                </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                        <label for="Date">Date
                                                                        </label><span class="text-danger">*</span>
                                                                        <input type="date" min="<?php echo strtotime(smarty_modifier_date_format(time(),'%Y-%m-%d'))+smarty_modifier_date_format(1,'%Y-%m-%d');?>
" max="<?php echo strtotime(smarty_modifier_date_format(time(),'%Y-%m-%d'))+smarty_modifier_date_format(3,'%Y-%m-%d');?>
" required name="shop_date" class="form-control">
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="contractorName">SO Qty</label><span class="text-danger">*</span>
                                                                        <input type="number" required name="scheduleQty"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                                </div>
                                <!-- <div class="row"> -->
                                    <div class="col-lg-3">
                                        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
planning_shop_order_details" method="post">
                                        <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="selected_customer" class="form-control select2">
                                                            <option value="">Select</option>
                                                            <option value="ALL">ALL</option>
                                                            <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                                   <option <?php if ($_smarty_tpl->tpl_vars['c']->value->id == $_smarty_tpl->tpl_vars['selected_customer']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                    <?php echo $_smarty_tpl->tpl_vars['c']->value->customer_name;?>
</option>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            <?php }?>
                                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Month<span class="text-danger"></label>
                                            <select required name="filter_month" class="form-control select2">
                                               
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month_data']->value, 'val', false, 'key');
$_smarty_tpl->tpl_vars['val']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->do_else = false;
?>
                                                    <option <?php if ($_smarty_tpl->tpl_vars['month_number']->value[$_smarty_tpl->tpl_vars['key']->value] == $_smarty_tpl->tpl_vars['filter_month']->value) {?>selected<?php }?>
                                                        value="<?php echo $_smarty_tpl->tpl_vars['month_number']->value[$_smarty_tpl->tpl_vars['key']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Year<span class="text-danger"></label>
                                            <select required name="filter_year" class="form-control select2">
                                                <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 2022; $__section_i_0_iteration <= 6; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                                    <option  <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null) == $_smarty_tpl->tpl_vars['filter_year']->value) {?>selected<?php }?>
                                                            value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
</option>
                                                <?php
}
}
?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <br><input type="submit" class="btn btn-primary mt-2" value="Search">
                                     </form>
                                    </div>
                                <!-- </div> -->
                                </div>
                                </div>
                                </div>

                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Shop Order No</th>
                                            <th>Customer</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>                                         
                                            <th>SO Date</th>
                                            <th>SO Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                        <?php $_smarty_tpl->_assignInScope('total', 0);?>
                                        <?php if ($_smarty_tpl->tpl_vars['planing_data']->value) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planing_data']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->shop_no;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->customer_name;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->part_number;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->part_description;?>
</td>
                                                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value->shop_date,'%d/%m/%Y');?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value->scheduleQty;?>
</td>
                                                </tr>
                                            <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

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
    $(document).ready(function() {
        $("#customerTracking").change(function() {
            var customer_id = $("#customerTracking").val();
            // var salesno = $('#sales_number').val();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                    //, salesno: salesno
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customerPartId').html(response);
                    } else {
                        $('#customerPartId').html(response);
                    }

                }
            });
        })
    });
<?php echo '</script'; ?>
><?php }
}
