<div style="width:100%" class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Report: Supplier Parts Stock</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
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
                            <div class="card-body">
                                <form action="<%$base_url%>parts_stock_report" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div style="">
                                                <div class="form-group">
                                                    <label for="on click url">Select Part Number<span class="text-danger">*</span></label> <br>
                                                    <select name="part_id" id="selectPart" class="form-control select2" required>
                                                        <option value="">Select Part ID</option>
                                                        <%foreach from=$customer_part_data_new_updated2 item=c%>
                                                            <option value="<%$c->id%>" <%if $filter_part_id === $c->id%>selected<%/if%>><%$c->part_number%></option>
                                                        <%/foreach%>
                                                        <option value="ALL">ALL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">&nbsp;</label> <br>
                                            <button class="btn btn-secondary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>UOM</th>
                                            <th>Store Stock</th>
                                            <th>Stock Rate</th>
                                            <th>Stock Value</th>
                                            <th>Inward Inspection QTY</th>
                                            <th>Prod QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $customer_part_list%>
                                            <%foreach from=$customer_part_list item=po%>
                                                
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$po->part_number%></td>
                                                    <td><%$po->part_description%></td>
                                                    <td><%$uom_data[$po->id][0]->uom_name%></td>
                                                    <td><%$po->stock%></td>
                                                    <td><%$po->store_stock_rate%></td>
                                                    <td><%$po->stock * $po->store_stock_rate%></td>
                                                    <td><%$underinspection_stock[$po->id]%></td>
                                                    <td><%$po->production_qty%></td>
                                                </tr>
                                                <%assign var="i" value=$i + 1%>
                                            <%/foreach%>
                                        <%/if%>
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
</div>
