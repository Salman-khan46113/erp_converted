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
                        <h1>Pending PO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('') %>">Home</a></li>
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
                           
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier Name</th>
                                            <th>PO Number</th>
                                            <th>PO Expiry Date</th>
                                            <th>PO Date</th>
                                            <th>Created Date</th>
                                            <th>Download PDF PO</th>
                                            <th>Status</th>
                                            <th>View PO Details</th>
                                            <th>Close PO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var='i' value=1%>
                                       
                                        <%if ($new_po) %>
                                            <%foreach from=$new_po item=s %>
                                                <%assign var='expired' value='no'%>
                                                <%if ($s->expiry_po_date < date('Y-m-d')) %>
                                                    <%* // $expired =  "yes";
                                                    // echo $new_po[0]->expiry_po_date;
                                                    // echo "<br>";
                                                    // echo date('Y-m-d'); *%>
                                                <%else %>
                                                    <tr>
                                                        <td><%$i %></td>
                                                        <!-- <td><?php echo $child_part_data_new->supplier_name; ?></td> -->
                                                        <td><%$s->supplier_name %></td>
                                                        <td><%$s->po_number %></td>
                                                        <td><%$s->expiry_po_date %></td>
                                                        <td><%$s->po_date %></td>
                                                        <td><%$s->created_date %></td>
                                                        <td>
                                                            <%if ($s->status == "accept") %>
                                                           		<a href="<%base_url('download_my_pdf/') %><%$s->id %>" class="btn btn-primary" href="">Download</a>

                                                            <%/if%>
                                                        </td>
                                                        <td><%$s->status %></td>

                                                        <td><a href="<%base_url('view_new_po_by_id/') %><%$s->id %>" class="btn btn-primary" href="">PO Details</a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit<%$i %>">
                                                                Close PO
                                                            </button>
                                                            <div class="modal fade" id="edit<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Close PO</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<%base_url('close_po') %>" method="POST" enctype="multipart/form-data">
                                                                                <div class="form-group">

                                                                                    <label for="">Are You Sure Want To Close <%$s->po_number %> This PO? <span class="text-danger">*</span></label>
                                                                                    <input required value="<%$s->id %>" type="hidden" class="form-control" name="id">
                                                                                    <input required value="<%$s->po_number %>" type="hidden" class="form-control" name="po_number">
                                                                                </div>
                                                                                <div class="form-group">

                                                                                    <label for="">Remark<span class="text-danger">*</span></label>
                                                                                    <input required value="" placeholder="Enter Remark" type="text" class="form-control" class="form-control" name="remark">
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
                                                        </td>
                                                    </tr>
                                            	<%assign var='i' value=$i+1%>
                                                <%/if%>
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