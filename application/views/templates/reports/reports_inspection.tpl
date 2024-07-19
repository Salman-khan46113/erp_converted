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
                        <h1>Reports : Parts Under Inspection Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Parts Under Inspection Reports</li>
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
                            <div class="row">
                                <div class = "col-lg-2">
                                    <form action="<%$base_url%>reports_inspection" method="post">
    
                                        <div class="form-group">
                                            <label for="">Select Month  <span class="text-danger">*</span></label>
                                            <select required name="created_month" id="" class="form-control select2">
                                                <%foreach $month_data as $key => $val%>
                                                    <option <%if $month_number[$key] eq $created_month%>selected<%/if%> value="<%$month_number[$key]%>"><%$val%></option>
                                                <%/foreach%> 
                                            </select>
                                        </div>
    
                                    </div>
                                    <div class = "col-lg-2">
    
                                        <div class="form-group">
                                            <label for="">Select Year  <span class="text-danger">*</span></label>
                                            <select required name="created_year" id="" class="form-control select2">
                                                <%for $i = 2022 to 2027%>
                                                    <option <%if $i eq $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
                                                <%/for%>
                                            </select>
                                        </div>
    
                                    </div>
                                    <div class = "col-lg-2">
    
                                        <input type="submit" class="btn btn-primary mt-4"value="Search">
    
                                    </div>
                                </div>
                            </div>

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
                                        <form action="<%$base_url%>add_job_card" method="POST" enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="col-lg-12">




                                                    <div class="form-group">
                                <label for="po_num">Select Customer Name / Customer Code / Part Number / Description </label><span class="text-danger">*</span>
                                <select name="customer_part_id" id="" class="from-control select2">
                                    <%foreach from=$customer_part item=c%>
                                        <%assign var="customer" value=$Crud->get_data_by_id("customer", $c->customer_id, "id")%>
                                        <option value="<%$c->id%>"><%$customer[0]->customer_name%>/<%$customer[0]->customer_code%>/<%$c->part_number%>/<%$c->part_description%></option>
                                    <%/foreach%>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="po_num">Required Quantity </label><span class="text-danger">*</span>
                                <input type="number" name="req_qty" placeholder="Enter Quantity" min="1" value="" class="form-control">

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
                                            <th>Supplier name</th>
                                            <th>Part No</th>
                                            <th>Part Description</th>
                                            <th>GRN No</th>
                                            <th>GRN Date</th>
                                            <th>Received QTY</th>
                                            <th>Validation QTY</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <%assign var="i" value=1%>
                                        <%foreach from=$grn_details item=g%>
                                                 <tr>
                                                <td><%$i%></td>
                                                <td><%$supplier_data[$g->id][0]->supplier_name%></td>
                                                <td><%$child_part_data[$g->id][0]->part_number%></td>
                                                <td><%$child_part_data[$g->id][0]->part_description%></td>
                                                <td><%$inwarding[$g->id][0]->grn_number%></td>
                                                <td><%$g->created_date%></td>
                                                <td><%$g->qty%></td>
                                                <td><%$g->verified_qty%></td>
                                            </tr>
                                            <%assign var="i" value=$i+1%>
                                        <%/foreach%>
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
        </div>
        <!-- /.content-wrapper -->
    </section>
    </div>