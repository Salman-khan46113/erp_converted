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
                        <h1>Customer Part Price</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>">Home</a></li>
                            <li class="breadcrumb-item active">Customer Part</li>
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
                            <div class="card-header">
                                <h3 class="card-title">

                                </h3>
                                <!-- Button trigger modal -->
                                <a href="<%$base_url%>customer_master" class="btn btn-danger ">
                                    Back </a>
                                <br>
                                <br>
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<%$base_url%>add_customer_price" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="po_num">Select Customer Name / Customer Code / Part Number / Description  </label><span class="text-danger">*</span>
                                                            <select name="customer_master_id" id="" class="from-control select2">
                                                                <%if $customer_part%>
                                                                    <%foreach from=$customer_part item=c%>
                                                                        <%if $customer_id == $c->customer_id%>
                                                                            <option value="<%$c->id%>"><%$customer[$c->customer_id][0]->customer_name%>/<%$customer[$c->customer_id][0]->customer_code%>/<%$c->part_number%>/<%$c->part_description%></option>
                                                                        <%/if%>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Part Rate </label><span class="text-danger">*</span>
                                                            <input type="number" step="any" name="rate" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Rate" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Revision Number </label><span class="text-danger">*</span>
                                                            <input type="text" name="revision_no" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Number" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Revision Date</label><span class="text-danger">*</span>
                                                            <input type="date" name="revision_date" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Date" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Revision Remark</label><span class="text-danger">*</span>
                                                            <input type="text" name="revision_remark" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Remark" aria-describedby="emailHelp">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="po_num">Price Uploading Document</label>
                                                            <input type="file" name="uploading_document" class="form-control" id="exampleInputEmail1" placeholder="Enter Price Uploading Document" aria-describedby="emailHelp">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Add Revision</th>
                                            <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th>
                                            <th>Customer Name</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Part Rate</th>
                                            <th>Price Supporting Document </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Add Revision</th>
                                            <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th>
                                            <th>Customer Name</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Part Rate</th>
                                            <th>Price Supporting Document </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $customer_part_rate%>
                                            <%foreach from=$customer_part_rate item=poo%>
                                                
                                                <%if $customer_data[$po[$poo->customer_master_id][0]->customer_id][0]->id == $customer_id%>
                                                    <tr>
                                                        <td><%$i%></td>
                                                        <td>
                                                            <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModaledit2<%$i%>">Add Revision</button>
                                                            <a href="<%$base_url%>view_part_rate_history/<%$poo->customer_master_id%>" class="btn btn-primary btn-sm">history</a>
                                                            <div class="modal fade" id="exampleModaledit2<%$i%>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog " role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Operation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<%$base_url%>updatecustomerpartprice" method="POST" enctype='multipart/form-data'>
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <input value="<%$po[$poo->customer_master_id][0]->id%>" type="hidden" name="id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Number </label><span class="text-danger">*</span>
                                                                                            <input type="text" readonly value="<%$po[$poo->customer_master_id][0]->part_number%>" name="upart_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Description </label><span class="text-danger">*</span>
                                                                                            <input type="text" readonly value="<%$po[$poo->customer_master_id][0]->part_description%>" name="upart_desc" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Description" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Part Rate </label><span class="text-danger">*</span>
                                                                                            <input type="number" name="rate" step="any" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Rate" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Date </label><span class="text-danger">*</span>
                                                                                            <input type="date" value="<%$po[0]->revision_date%>" name="revision_date" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Date" aria-describedby="emailHelp">
                                                                                            <input type="hidden" value="<%$customer_part_rate_data[$poo->customer_master_id][0]->customer_master_id%>" name="customer_master_id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Rate" aria-describedby="emailHelp">
                                                                                            <input type="hidden" value="<%$customer_part_rate_data[$poo->customer_master_id][0]->uploading_document%>" name="uploading_document" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Rate" aria-describedby="emailHelp">
                                                                                            <input type="hidden" value="<%$customer_part_rate_data[$poo->customer_master_id][0]->customer_part_id%>" name="customer_part_id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Rate" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Number </label><span class="text-danger">*</span>
                                                                                            <input type="text" value="<%$po[$poo->customer_master_id][0]->revision_no%>" name="revision_no" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Number" aria-describedby="emailHelp">
                                                                                            <input type="hidden" value="<%$po[$poo->customer_master_id][0]->customer_id%>" name="customer_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                                            <input type="hidden" value="<%$po[$poo->customer_master_id][0]->customer_part_id%>" name="customer_part_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Revision Remark </label><span class="text-danger">*</span>
                                                                                            <input type="text" name="revision_remark" required class="form-control" id="exampleInputEmail1" placeholder="Enter Revision Remark" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><%$customer_part_rate_data[$poo->customer_master_id][0]->revision_no%></td>
                                                        <td><%$customer_part_rate_data[$poo->customer_master_id][0]->revision_date%></td>
                                                        <td><%$customer_part_rate_data[$poo->customer_master_id][0]->revision_remark%></td>
                                                       
                                                        <td><%$customer_data[$po[$poo->customer_master_id][0]->customer_id][0]->customer_name%></td>
                                                        <td><%$po[$poo->customer_master_id][0]->part_number%></td>
                                                        <td><%$po[$poo->customer_master_id][0]->part_description%></td>
                                                        <td><%$customer_part_rate_data[$poo->customer_master_id][0]->rate%></td>
                                                        <td>
                                                            <%if $customer_part_rate_data[$poo->customer_master_id][0]->uploading_document%>
                                                                <a download href="<%$base_url%>documents/<%$customer_part_rate_data[0]->uploading_document%>" class="btn btn-sm btn-primary">Download</a>
                                                            <%/if%>
                                                        </td>
                                                    </tr>
                                                    <%assign var="i" value=$i+1%>
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
</div>
