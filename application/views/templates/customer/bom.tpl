<div style="width:100%" class="wrapper">
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
                        <!-- <h1></h1> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer item part</li>
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

                                <!-- Button trigger modal -->
                                <a class="btn btn-danger" href="<%$base_url%>customer_master">
                                    Back </a>

                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>addbom" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label> item part </label><span class="text-danger">*</span>
                                                                <select class="form-control select2" name="child_part_id" style="width: 100%;">
                                                                    <%foreach from=$child_part_list item=c1%>
                                                                        <option value="<%$c1->id%>">
                                                                            <%$c1->part_number%>/<%$c1->part_description%>
                                                                        </option>
                                                                    <%/foreach%>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="po_num">Quantity</label><span class="text-danger">*</span>
                                                                <input type="number" name="quantity" required class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" aria-describedby="emailHelp">
                                                                <input type="hidden" name="customer_part_id" value="<%$customer[0]->id%>" required class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" aria-describedby="emailHelp">
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
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Customer Part Number</th> -->
                                            <th> Part Number</th>
                                            <th>Part Description</th>
                                            <th>Details</th>
                                            <%if $entitlements.isSheetMetal neq null%>
                                             <th>Operations BOM</th>
                                             <%/if%> 
                                             <%if $entitlements.isPlastic neq null%>
                                            <!-- <th>Deflashing BOM</th> -->
                                            <%/if%>
                                            <th>Customer Subcon bom </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Customer Part Number</th> -->
                                            <th> Part Number</th>
                                            <th>Part Description</th>
                                            <th>Details</th>
                                            <%if $entitlements.isSheetMetal neq null%>
                                             <th>Operations BOM</th>
                                             <%/if%> 
                                             <%if $entitlements.isPlastic neq null%>
                                            <!--<th>Deflashing BOM</th> -->
                                            <%/if%>
                                            <th>Customer Subcon bom </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <%if $customer_part%>
                                            <%assign var="i" value=1%>
                                            <%foreach from=$customer_part item=c%>
                                                <%if $customer_id == $c->customer_id%>
                                                    <tr>
                                                        <td><%$i%></td>
                                                        <td><%$c->part_number%></td>
                                                        <td><%$c->part_description%></td>
                                                        <td><a href="<%$base_url%>bom_by_id/<%$c->id%>" class="btn btn-info">RM BOM</a></td>
                                                        <%if $entitlements.isSheetMetal neq null%>
                                                            <td><a href="<%$base_url%>operations_bom/<%$c->id%>" class="btn btn-danger">Operations BOM</a></td>
                                                        <%/if%> 
                                                        <%if $entitlements.isPlastic neq null%>
                                                        <!-- <td><a href="<%$base_url%>deflashing_bom/<%$c->id%>" class="btn btn-success">Operations BOM</a></td> -->
                                                        <%/if%>
                                                        <td><a href="<%$base_url%>subcon_bom/<%$c->id%>" class="btn btn-warning">Subcon BOM</a></td>
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
