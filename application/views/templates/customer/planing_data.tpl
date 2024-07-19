<div class="wrapper">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>Planning Data</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <div class="col-6"> -->
                                <h3 class="card-title"></h3>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add Planing</button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal1212">
                                    Add FG Stock</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1212" role="dialog"
                                    aria-labelledby="exampleModal1212Label" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1212Label">Add FG Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>add_planning_fg_stock"
                                                    method="POST">
                                                    <div class="row">
                                                    <div class="col-lg-12">
                                                            <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="customer_id" id="customer_tracking1" required id="" class="form-control select2">
                                                                <option value=''>Select</option>
                                                                <%if $customer%>
                                                                    <%foreach from=$customer item=s%>
                                                                   <option value="<%$s->id%>"><%$s->customer_name%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select> 
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Select Customer Part Number / Description
                                                                <span class="text-danger">*</span> </label>
                                                                <select name="customer_part_id1" id="customer_part_id1" required class="form-control select2">
                                                                    <option value=''>Please select</option>
                                                                </select>
                                                            </div>

                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Select Month
                                                                    </label><span class="text-danger">*</span>
                                                                    <select name="month_id" id=""
                                                                        class="form-control select2">
                                                                        <option value="<%$month%>">
                                                                            <%$month%></option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Production
                                                                        Quantity</label><span
                                                                        class="text-danger">*</span>
                                                                    <input type="number" required name="fg_stock"
                                                                        class="form-control">
                                                                    <input type="hidden" required name="financial_year"
                                                                        value="<%$financial_year%>"
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
                                <!-- Modal End-->

                                <a href="<%$base_url%>view_all_child_parts_schedule/<%$financial_year%>/<%$month%>"
                                    class="btn btn-primary">
                                    Monthly MRP Req</a>
                                <!-- </div>
                                <div class="col-6" style="align:right;"> -->
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exportCustomerPartsOnly">
                                    Export Format</button>

                                <!-- Export Modal -->
                                <div class="modal fade" id="exportCustomerPartsOnly" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Export Customer Data for Planning Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>planning_export_customer_part"
                                                    method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <label for="contractorName">Customer</label><span
                                                                class="text-danger">*</span>
                                                            <select name="customer_id" id=""
                                                                class="form-control select2" required>
                                                                <option value="">Select</option>
                                                                <%if $customer%>
                                                                    <%foreach from=$customer item=c%>
                                                                <option value="<%$c->id%>">
                                                                    <%$c->customer_name%></option>
                                                                <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" value="<%$financial_year%>"
                                                    class="hidden" name="financial_year">
                                                <input type="hidden" value="<%$month%>"
                                                    class="hidden" name="month">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Export</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#importCustomerPartsOnly">
                                    Import Data</button>
                                
                                 <!-- Import Modal -->
                                 <div class="modal fade" id="importCustomerPartsOnly" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Planning Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>import_customer_planning" 
                                                method="POST" enctype='multipart/form-data'>
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <label>Customer</label><span
                                                                class="text-danger">*</span>
                                                            <select name="customer_id" id=""
                                                                class="form-control select2" required>
                                                                <option value="">Select</option>
                                                                <%if $customer%>
                                                                    <%foreach from=$customer item=c%>
                                                                <option value="<%$c->id%>">
                                                                    <%$c->customer_name%></option>
                                                                <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                                            <div class="form-group">
                                                                <br><label for="po_num">Upload Plan</label><span
                                                                class="text-danger">*</span>
                                                                <input type="file" name="uploadedDoc" required class="form-control" id="exampleuploadedDoc" placeholder="Upload Plan" aria-describedby="uploadDocHelp">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" value="<%$segment_2%>"
                                                    class="hidden">
                                                <input type="hidden" value="<%$segment_3%>"
                                                    class="hidden">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                   
                                <!-- Add Planning Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Planing</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>add_planning_data"
                                                    method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="customer_id" id="customer_tracking" required id="" class="form-control select2">
                                                                <option value=''>Select</option>
                                                                <%if $customer%>
                                                                    <%foreach from=$customer item=s%>
                                                                   <option value="<%$s->id%>"><%$s->customer_name%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select> 
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Select Customer Part Number / Description
                                                                <span class="text-danger">*</span> </label>
                                                                <select name="customer_part_id" id="customer_part_id" required class="form-control select2">
                                                                    <option value=''>Please select</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="contractorName">Select Month
                                                                    </label><span class="text-danger">*</span>
                                                                    <select name="month_id" id=""
                                                                        class="form-control select2">
                                                                        <option value="<%$month%>">
                                                                            <%$month%></option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">

                                                                <div class="form-group">
                                                                    <label for="contractorName">Enter Schedule Qty
                                                                    </label><span class="text-danger">*</span>
                                                                    <input type="number" required name="schedule_qty"
                                                                        class="form-control">
                                                                    <input type="hidden" required name="financial_year"
                                                                        value="<%$financial_year%>"
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
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <!-- Button trigger modal -->
                            <div class="row">
                                <div class="col-lg-2">
                                    <form
                                        action="<%$base_url%>planing_data/<%$financial_year%>/<%$month%>/0"
                                        method="post">
                                        <div class="form-group">
                                            <label for="">Select Customer</label>
                                            <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                 <option value="">Select</option>
                                                <%if $customer%>
                                                    <%foreach from=$customer item=c%>
                                                <option <%if $c->id == $customer_id%> selected <%/if%> value="<%$c->id%>">
                                                    <%$c->customer_name%></option>
                                                <%/foreach%>
                                                <%/if%>
                                                <option value="ALL">ALL</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="hidden" name="financial_year"
                                            value="<%$financial_year%>">
                                        <input type="hidden" name="month" value="<%$month%>">
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No..</th>
                                    <th>Customer Part Number</th>
                                    <th>Customer Part Description</th>
                                    <th>Customer Name</th>
                                    <th>Month </th>
                                    <th>Schedule Qty</th>
                                    <!--<th>Schedule Qty 2</th> -->
                                    <%if $entitlements.isJobCard != null%>
                                    <th>Job Card Qumulative Qty</th>
                                    <th>Job Card Balance Qty</th>
                                    <th>Job Card Issued</th>
                                    <th>Job Card Closed</th>
                                    <%/if%>
                                    <!-- <th>Customer Part Price</th>-->
                                    <th>Dispatch (sales qty) </th>
                                    <th>Balance Schedule qty </th>
                                    <th>Subtotal Schedule </th>
                                    <!-- <th>Subtotal Schedule 2</th> -->
                                    <th class="noExport">View</th>
                                    <th class="noExport">Edit</th>
                                </tr>
                            </thead>
                                       
                            <tbody>
                                <%assign var="i" value=1%>
                                <%assign var="total1" value=0%>
                                <%assign var="total2" value=0%>
                                <%if $planing_data%>
                                    <%foreach from=$planing_data item=t%>
                                        <%if $month == $t->month%>
                                            <%assign var="issued" value=0%>
                                            <%assign var="closed" value=0%>
                                            <%assign var="main_qty" value=$planing_data[0]->schedule_qty%>
                                            <%assign var="subtotal1" value=0%>
                                            <%assign var="rate" value=0%>
                                            <%if $customer_part_rate[$t->customer_part_id]%>
                                                <%assign var="rate" value=$customer_part_rate[$t->customer_part_id][0]->rate%>
                                                <%assign var="subtotal1" value=$customer_part_rate[$t->customer_part_id][0]->rate * $planing_data[0]->schedule_qty%>

                                                <%assign var="total1" value=$total1 + $subtotal1%>
                                            <%/if%>
                                            <%assign var="total_dispatched_qty" value=0%>
                                            <%if $sales_invoice[$t->customer_part_id]%>
                                                <%foreach from=$sales_invoice[$t->customer_part_id] item=sale%>
                                                    <%if $sale->dispatched_qty > 0%>
                                                        <%assign var="dispatch_sales_qty" value=$sale->dispatched_qty%>
                                                    <%else%>
                                                        <%assign var="dispatch_sales_qty" value=0%>
                                                    <%/if%>
                                                    <%assign var="total_dispatched_qty" value=$total_dispatched_qty + $dispatch_sales_qty%>
                                                <%/foreach%>
                                            <%/if%>
                                            <%assign var="balance_s_qty" value= $planing_data[0]->schedule_qty - $total_dispatched_qty%>
                                <tr>
                                    <td><%$i%></td>
                                    <td><%$customer_part_data[$t->customer_part_id][0]->part_number%></td>
                                    <td><%$customer_part_data[$t->customer_part_id][0]->part_description%></td>
                                    <td><%$customers_data[0]->customer_name%></td>
                                    <td><%$t->month%></td>
                                    <td><%$planing_data[0]->schedule_qty%></td>
                                    <!-- <td><%$planing_data[0]->schedule_qty_2%></td> -->
                                    <%if $entitlements.isJobCard != null%>
                                    <td></td>
                                    <td>
                                        <%$planing_data[0]->schedule_qty - $job_card_qty%>
                                    </td>

                                    <td><%$issued%></td>
                                    <td><%$closed%></td>
                                    <%/if%>
                                    <!-- <td><%$rate%></td> -->
                                    <!-- <td><%$subtotal1%>-->
                                    <td>
                                        <%$total_dispatched_qty%>
                                    </td>
                                    <td>
                                        <%$balance_s_qty%>
                                    </td>
                                    <td>
                                        Rs. <%$subtotal1%> 
                                    </td>
                                    <td class="noExport">
                                        <a class="btn btn-info"
                                            href="<%$base_url%>view_planing_data/<%$t->id%>/<%$customer_part_data[$t->customer_part_id][0]->customer_id%>"><i class="fas fa-eye"></i></a>
                                            <!-- Edit Modal -->
                                    </td>
                                    <td>
                                        <button title="Edit" type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editenew<%$i%>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                                                               <div class="modal fade" id="editenew<%$i%>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<%$base_url%>update_planning_data"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="contractorName">Enter Schedule Qty</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="number" value="<%$planing_data[0]->schedule_qty%>" required name="schedule_qty"
                                                                    class="form-control">
                                                                <input required value="<%$t->id%>"
                                                                    type="hidden" class="form-control"
                                                                    name="planning_id">
                                                                <input required value="<%$t->customer_part_id%>"
                                                                    type="hidden" class="form-control"
                                                                    name="cust_part_id">
                                                                <input required value="<%$t->month%>"
                                                                    type="hidden" class="form-control"
                                                                    name="month_id">
                                                                <input required value="<%$t->financial_year%>"
                                                                    type="hidden" class="form-control"
                                                                    name="financial_year">
                                                                <input required value="<%$customer_part_data[$t->customer_part_id][0]->customer_id%>"
                                                                    type="hidden" class="form-control"
                                                                    name="customer_id">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Modal Ends -->
                                    </td>
                                </tr>
                                <%assign var="i" value=$i+1%>
                                <%/if%>
                                <%/foreach%>
                                <%/if%>
                            </tbody>
                        </table>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-lg-2" style="color: crimson;">
                                    <b>Total Sales Value: Rs. <%$total1%></b>
                                </div>
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


<script>
    $(document).ready(function() {
        var customer_id = $("#customer_tracking").val();
        $.ajax({
            url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
            type: "POST",
            data: {
                id: customer_id
            },
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response) {
                    $('#customer_part_id').html(response);
                } else {
                    $('#customer_part_id').html(response);
                }
            }
        });

        $("#customer_tracking").change(function() {
            var customer_id = $("#customer_tracking").val();
            $.ajax({
                url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customer_part_id').html(response);
                    } else {
                        $('#customer_part_id').html(response);
                    }
                }
            });
        });

        var customer_id = $("#customer_tracking1").val();
        $.ajax({
            url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
            type: "POST",
            data: {
                id: customer_id
            },
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response) {
                    $('#customer_part_id1').html(response);
                } else {
                    $('#customer_part_id1').html(response);
                }
            }
        });

        $("#customer_tracking1").change(function() {
            var customer_id = $("#customer_tracking1").val();
            $.ajax({
                url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customer_part_id1').html(response);
                    } else {
                        $('#customer_part_id1').html(response);
                    }
                }
            });
        });

        $("#customerTracking").change(function() {
            var customer_id = $("#customerTracking").val();
            $.ajax({
                url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
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
        });
    });
</script>