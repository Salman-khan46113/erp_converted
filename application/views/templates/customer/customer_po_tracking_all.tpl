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
                        <h1>Customer PO QTY Tracking</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                        <!-- /.card -->

                        <div class="card"><!--
                            <div class="card-header">
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
                                            <th>Status</th>
                                            <th>View Details</th>
                                            <!-- <th>Close PO</th>-->
                                            <th>PO Document</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $customer_po_tracking%>
                                            <%foreach from=$customer_po_tracking item=s%>
                                               
                                                <%if $s->status != "closed"%>
                                                    <tr>
                                                        <td><%$i%></td>
                                                        <td><%$customer_data[$s->customer_id][0]->customer_name%></td>
                                                        <td><%$s->po_number%></td>
                                                        <td><%$s->po_start_date%></td>
                                                        <td><%$s->po_end_date%></td>
                                                        <td><%$s->po_amedment_number%></td>
                                                        <td><%$s->status%></td>
                                                        <td><a href="<%$base_url%>view_customer_tracking_id/<%$s->id%>" class="btn btn-primary">PO Details</a></td>
                                                        <td>
                                                            <%if $s->uploadedDoc != ""%>
                                                                <a download href="<%$base_url%>documents/<%$s->uploadedDoc%>" id="" class="btn btn-sm btn-primary remove_hoverr"><i class="fas fa-download"></i></a>
                                                            <%/if%>
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadDocument<%$i%>"><i class="fas fa-upload"></i></button>

                                                            <!-- Upload Modal -->
                                                            <div class="modal fade" id="uploadDocument<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Upload file</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<%$base_url%>add_part" method="post" enctype='multipart/form-data'>
                                                                                <div class="text-center">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Upload File<span class="text-danger">*</span>
                                                                                        <input required type="file" name="cad_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">
                                                                                    </div>
                                                                                    <input value="<%$s->id%>" type="hidden" name="uid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
                                                                                    <input type="hidden" name="table_name" value="customer_po_tracking">
                                                                                    <input type="hidden" name="column_name" value="uploadedDoc">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editenew<%$i%>">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </button>
                                                            <div class="modal fade" id="editenew<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<%$base_url%>update_customer_po_tracking_all" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">
                                                                                    <label for="">End Date<span class="text-danger">*</span></label>
                                                                                    <input required value="<%$s->po_end_date%>" type="date" class="form-control" name="end_date">
                                                                                    <input required value="<%$s->id%>" type="hidden" class="form-control" name="id">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#close<%$i%>">
                                                                Close PO
                                                            </button>
                                                            <div class="modal fade" id="close<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Close PO</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<%$base_url%>close_po_customer_po_tracking" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">
                                                                                    <label for="">Are you sure to close <u>PO Number : <%$s->po_number%></u> ?</label>
                                                                                    <br><br>
                                                                                    <input required value="<%$s->id%>" type="hidden" class="form-control" name="id">
                                                                                    <label for="">Remark<span class="text-danger"></span></label>
                                                                                    <input type="text" name="remark" placeholder="Enter Remark " class="form-control"/>
                                                                                    <label for="">Reason<span class="text-danger">*</span> </label>
                                                                                    <select name="reason" required id="" class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        <option value="Withdraw">Withdraw</option>
                                                                                        <option value="Completed">Completed</option>
                                                                                    </select>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <%assign var="i" value=$i+1%>
                                                <%/if%>
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
