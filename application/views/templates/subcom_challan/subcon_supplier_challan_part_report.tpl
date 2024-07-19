<div style="width:100%" class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1></h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">subcon supplier-challan part stock report</li>
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
                <div class="card-header">
                    <form action="<%$smarty.const.BASE_URL%>subcon_supplier_challan_part_report" method="POST">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Select Part Number / Description</label>
                                <select name="selected_customer_part_number" required id="" class="form-control select2">
                                    <option <%if $selected_customer_part_number eq 0%>selected<%/if%> value="0">NA</option>
                                    <%if $customer_parts_data%>
                                        <%foreach from=$customer_parts_data item=c%>
                                            <option <%if $selected_customer_part_number eq $c->part_number%>selected<%/if%> value="<%$c->part_number%>"><%$c->part_number%> / <%$c->part_description%></option>
                                        <%/foreach%>
                                    <%/if%>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Select Supplier</label>
                                <select name="selected_supplier_id" required class="form-control select2">
                                    <option <%if $selected_supplier_id eq 0%>selected<%/if%> value="0">NA</option>
                                    <%if $supplier%>
                                        <%foreach from=$supplier item=c%>
                                            <option <%if $selected_supplier_id eq $c->id%>selected<%/if%> value="<%$c->id%>"><%$c->supplier_name%></option>
                                        <%/foreach%>
                                    <%/if%>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group mt-1">
                                    <button class="btn btn-danger mt-4">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Supplier</th>
                                <th>Child Part</th>
                                <th>Challan No</th>
                                <th>Challan Date</th>   
                        
                                <th>Aging Date</th>
                                <th>Challan Qty</th>
                                <th>Remaning qty</th>
                                <th>Process</th>
                                <th>Value (Challan Qty)</th>
                                <th>Value (Remaining Qty)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <%assign var="i" value=1%>
                             <%if $challan_parts%>
                                <%foreach from=$challan_parts item=c%>
                                    <%if $display_arr[$c->id]['show'] eq "yes"%>
                                        <tr>
                                            <td><%$i%></td>
                                            <td><%$supplier_data[$c->id][0]->supplier_name%></td>
                                            <td><%$child_part_data[$c->id][0]->part_number%> <%$child_part_data[0]->part_description%></td>
                                            <td><%$challan_data[$c->id][0]->challan_number%></td>
                                            <td><%$challan_data[$c->id][0]->created_date%></td>
                                            <td><%$aging[$c->id]%></td>
                                            <td><%$c->qty%></td>
                                            <td><%$c->remaning_qty%></td>
                                            <td><%$c->process%></td>
                                            <td><%$value_qty[$c->id]%></td>
                                            <td><%$value_qty_remaning[$c->id]%></td>
                                        </tr>
                                        <%assign var="i" value=$i+1%>
                                    <%/if%>
                                <%/foreach%>
                            <%/if%>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9">Total</td>
                                <td colspan=""><%$main_total%></td>
                                <td colspan=""><%$main_total_2%></td>
                            </tr>
                        </tfoot>
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
</div>
<!-- /.content-wrapper -->