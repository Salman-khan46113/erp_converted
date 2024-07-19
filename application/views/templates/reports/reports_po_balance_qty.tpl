<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PO Summary Report</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">PO Balance Qty</li>
                        </ol>
                    </div>-->
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
                                    <div class="col-lg-2">
                                        <form action="<%$base_url%>reports_po_balance_qty" method="post">
                                            <div class="form-group">
                                                <label for="">Select Month  <span class="text-danger">*</span></label>
                                                <select required name="created_month" id="" class="form-control select2">
                                                <%foreach $month_data as $key => $val%>
                                                <option <%if $month_number[$key] eq $created_month%>selected<%/if%>
                                                    value="<%$month_number[$key]%>"><%$val%></option>
                                            <%/foreach%>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Year  <span class="text-danger">*</span></label>
                                            <select required name="created_year" id="" class="form-control select2">
                                                <%for $i = 2022 to 2027%>
                                                    <option value="<%$i%>" <%if $i == $created_year%>selected<%/if%>><%$i%></option>
                                                <%/for%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-primary mt-4" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier name</th>
                                            <th>Part No</th>
                                            <th>Part Description</th>
                                            <th>PO Number</th>
                                            <th>Date</th>
                                            <th>Expiry Date</th>
                                            <th>Status</th>
                                            <th>Qty</th>
                                            <th>Received QTY</th>
                                            <th>Balance QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $po_data%>
                                            <%foreach from=$po_data item=po%>
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$po->supplier_name%></td>
                                                    <td><%$po->part_number%></td>
                                                    <td><%$po->part_description%></td>
                                                    <td><%$po->po_number%></td>
                                                    <td><%$po->created_date%></td>
                                                    <td><%$po->expiry_po_date%></td>
                                                    <td><%$po->status%></td>
                                                    <td><%$po->qty%></td>
                                                    <td><%$po->qty - $po->pending_qty%></td>
                                                    <td><%$po->pending_qty%></td>
                                                </tr>
                                                <%assign var="i" value=$i+1%>
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
