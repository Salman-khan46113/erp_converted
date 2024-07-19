<?php
/* Smarty version 4.3.2, created on 2024-06-19 10:52:06
  from '/var/www/html/extra_work/erp_converted/application/views/templates/sales/new_sales.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66726afe896de2_64221818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7868e3bdc591a3c3f970b92e95741b4c72329692' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/sales/new_sales.tpl',
      1 => 1718774197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66726afe896de2_64221818 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <h1>Generate Sales Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
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
                                <div class="row">
                                    <div id="loading-overlay">
                                        <div id="loading-spinner"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
generate_new_sales" method="POST">
                                            <div class="form-group">
                                                <label for="">Customer <span class="text-danger">*</span></label>
                                                <select name="customer_id" id="customer_tracking" required class="form-control select2">
                                                    <option value=''>Select</option>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['customer']->value)) {?>
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Select Part Number // Description // FG Stock // Rate // Tax Structure
                                            <span class="text-danger">*</span> </label>
                                            <select name="part_id" id="part_id" required class="form-control select2">
                                                <option value=''>Please select</option>
                                            </select>
                                        </div>                            
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Mode Of Transport<span class="text-danger">*</span></label>
                                            <select name="mode" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="1">Road</option>
                                                <option value="2">Rail</option>
                                                <option value="3">Air</option>
                                                <option value="4">Ship</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Transporter<span class="text-danger">*</span></label>
                                            <select name="transporter" required class="form-control select2">
                                                <option value="">Select Transporter</option>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['transporter']->value)) {?>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transporter']->value, 'tr');
$_smarty_tpl->tpl_vars['tr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tr']->value) {
$_smarty_tpl->tpl_vars['tr']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tr']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['tr']->value->name;?>
 - <?php echo $_smarty_tpl->tpl_vars['tr']->value->transporter_id;?>
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
                                            <label for="">Vehicle No.<span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   placeholder="Enter Vehicle No" 
                                                   value="" 
                                                   name="vehicle_number" 
                                                   required class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">L.R No </label>
                                            <input type="text" placeholder="Enter L.R No" value="" name="lr_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Distance of Transportation<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Distance of Transportation" value="" name="distance" required class="form-control">
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="col-lg-8">
                                        <label>Shipping Address: </label><br>
                                        <div class="row" style="border:1px;">
                                            <div class="col-lg-2">
                                                <div class="form-group">   
                                                    <input type="radio" name="ship_addressType" checked value="customer" onchange="toggleConsigneeSelection()">
                                                    <br><label>Same as Customer</label><br>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">   
                                                    <input type="radio" name="ship_addressType" value="consignee" onchange="toggleConsigneeSelection()">
                                                    <br><label>Select Consignee Address</label><br>
                                                </div>
                                                <div class="form-group">
                                                    <select name="consignee" id="consigneeSelect" required disabled class="form-control">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['consignee_list']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                                                                <?php echo $_smarty_tpl->tpl_vars['c']->value->consignee_name;?>
 - <?php echo $_smarty_tpl->tpl_vars['c']->value->location;?>

                                                            </option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Remark</label>
                                            <input type="text" placeholder="Enter Remark" value="" name="remark" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mt-4">Generate</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
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
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->

<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function toggleConsigneeSelection() {
        var consigneeSelect = document.getElementById("consigneeSelect");
        var shipAddressType = document.querySelector('input[name="ship_addressType"]:checked').value;

        if (shipAddressType === "customer") {
             consigneeSelect.disabled = true;
             consigneeSelect.style.display = "none";
             consigneeSelect.value = ''; //change to default value as select.
        } else if (shipAddressType === "consignee") {
            consigneeSelect.disabled = false;
            consigneeSelect.style.display = "block";
        }
    }

    $(document).ready(function() {
        var consigneeSelect = document.getElementById("consigneeSelect");
        consigneeSelect.style.display = "none";
        var customer_id = $("#customer_tracking").val();
        // $('#new_po_id').val(id);
        // var salesno = $('#sales_number').val();
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
SalesController/get_customer_parts_for_sale',
            type: "POST",
            data: {
                id: customer_id
            },
            cache: false,
            beforeSend: function() {
                // Show the loading icon
                $("#loading-overlay").show();
            },
            success: function(response) {
                 // Hide the loading icon
                if (response) {
                    $('#part_id').html(response);
                } else {
                    $('#part_id').html(response);
                }
            },complete: function() {
                    // Hide the loading overlay
                    $("#loading-overlay").hide();
            }
       });
        $("#customer_tracking").change(function() {
            var customer_id = $("#customer_tracking").val();
            $.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
SalesController/get_customer_parts_for_sale',
                type: "POST",
                data: {
                    id: customer_id
                    //, salesno: salesno
                },
                cache: false,
                beforeSend: function() {
                     // Show the loading icon
                    $("#loading-overlay").show();
                },
                success: function(response) {
                    if (response) {
                        $('#part_id').html(response);
                    } else {
                        $('#part_id').html(response);
                    }
                },
                complete: function() {
                    // Hide the loading icon
                    $("#loading-overlay").hide();
                }        
            });
        })
    });
<?php echo '</script'; ?>
>
<?php }
}
