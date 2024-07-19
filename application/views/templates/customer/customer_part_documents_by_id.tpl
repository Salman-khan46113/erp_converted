<%if $entitlements.isPLMEnabled%>
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
                        <h1>Customer Part Documents</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>">Home</a></li>
                            <li class="breadcrumb-item active">Customer Part</li>
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
                                <h3 class="card-title"></h3>
                                <a href="<%$base_url%>customer_master" class="btn btn-danger ">< Back </a>
                                &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button> 
                                </div>
                                <!-- Button trigger modal -->
                            </div>
                            <!-- search by part number -->
                            <div class="card-header">
                            <div class="row">
                                    <div class="col-lg-2">
                                    <form action="<%$base_url%>customer_part_documents/<%$customer_id%>" method="post">
                                       <div class="form-group">
                                             <label for="Search by Part No">Search by Parts</label>
                                             <select class="form-control select2" name="search_part_id" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    <option value="ALL" <%if $search_part_id == 'ALL'%>selected<%/if%>>ALL</option>
                                                <%foreach from=$customer_part item=part%>
                                                    <option <%if $search_part_id == $part->id%>selected<%/if%>
                                                        value="<%$part->id%>"><%$part->part_number%></option>
                                                <%/foreach%> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <br><input type="submit" class="btn btn-primary mt-2" value="Search">
                                    </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                            <!-- /.card-header -->
                            
                            <!-- Add Modal -->
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
                                            <form action="<%$base_url%>add_customer_document" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="po_num">Select Customer Name / Customer Code / Part Number / Description </label><span class="text-danger">*</span>
                                                            <select name="customer_master_id" id="" class="from-control select2" required>
                                                                <%foreach from=$customer_part item=c%>
                                                                    <%if $customer_id == $c->customer_id%>
                                                                        <option value="<%$c->id%>"><%$customer[$c->customer_id][0]->customer_name%>/<%$customer[$c->customer_id][0]->customer_code%>/<%$c->part_number%>/<%$c->part_description%></option>
                                                                    <%/if%>
                                                                <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Document Type </label><span class="text-danger">*</span>
                                                            <select name="type" id="" class="form-control">
                                                                <option value="APQP">APQP</option>
                                                                <option value="PPAP">PPAP</option>
                                                                <option value="QUALITY">QUALITY</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Document Name</label>
                                                            <input type="text" name="document_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Document Name" aria-describedby="emailHelp">
                                                            <input type="hidden" name="customer_id" value="<%$customer_id%>" class="form-control" id="exampleInputEmail1" placeholder="Enter Document Name" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Document <span class="text-danger">*</span></label>
                                                            <input type="file" name="document" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Description" aria-describedby="emailHelp">
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
                            <!-- End of Add modal -->

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>APQP</th>
                                            <th>PPAP</th>
                                            <th>QUALITY </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>APQP</th>
                                            <th>PPAP</th>
                                            <th>QUALITY </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <%if $search_customer_part%>
                                            <%assign var="i" value=1%>
                                            <%foreach from=$search_customer_part item=c%>
                                                <%if $customer_id == $c->customer_id%>
                                                    <tr>
                                                        <td><%$i%></td>
                                                        <td><%$c->part_number%></td>
                                                        <td><%$c->part_description%></td>
                                                        <td><a href="<%$base_url%>part_document/<%$c->customer_id%>/<%$c->id%>/APQP" class="btn btn-info">APQP</a></td>
                                                        <td><a href="<%$base_url%>part_document/<%$c->customer_id%>/<%$c->id%>/PPAP" class="btn btn-primary">PPAP</a></td>
                                                        <td><a href="<%$base_url%>part_document/<%$c->customer_id%>/<%$c->id%>/QUALITY" class="btn btn-danger">QUALITY</a></td>
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
<%/if%>
<!-- /.content-wrapper -->
