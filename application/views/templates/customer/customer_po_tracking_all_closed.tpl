<div style="width: 2000px" class="wrapper">
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
                        <h1>Closed Customer PO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                        <!-- /.card -->

                        <div class="card">
                        <!-- <div class="card-header">
                                <h3 class="card-title">Serch PO Number</h3>
                                <div class="row">
                                    <div class="col-lg-2">
                                            <div class="form-group">
                                                <form action="<%$base_url%>inwarding_by_po" method="POST">
                                                <label for="">Enter PO Number <span class="text-danger">*</span> </label>
                                                <input type="text" name="po_number" class="form-control" required placeholder="Enter Valid PO Number : ">
                                            </div>

                                    </div>
                                    <div class="col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success mt-4">Search</button>
                                            </div>
                                            </form>
                                    </div> 
                                </div>
                            </div>-->

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Customer</th>
                                            <th>PO Number</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Amendment No</th>
                                            <th>Reason</th>
                                            <th>Remark</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <%if $customer_po_tracking%>
                                            <%foreach from=$customer_po_tracking item=s key=i%>
                                                
                                                <tr>
                                                    <td><%$i+1%></td>
                                                    <td><%$customer_data[$s->customer_id][0]->customer_name%></td>
                                                    <td><%$s->po_number%></td>
                                                    <td><%$s->po_start_date%></td>
                                                    <td><%$s->po_end_date%></td>
                                                    <td><%$s->po_amedment_number%></td>
                                                    <td><%$s->reason%></td>
                                                    <td><%$s->remark%></td>
                                                    <td><a href="<%$base_url%>view_customer_tracking_id/<%$s->id%>" class="btn btn-primary">PO Details</a></td>
                                                </tr>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-header -->

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
