<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

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
                                <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->
                            </div>
                            <!-- Modal -->
                            <!-- 
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
                                            <form action="<%base_url('add_job_card')%>" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="po_num">Select Customer Name / Customer Code / Part Number / Description </label><span class="text-danger">*</span>
                                                            <select name="customer_part_id" id="" class="from-control select2">
                                                                <%if $customer_part%>
                                                                    <%foreach from=$customer_part item=c%>
                                                                        <%assign var="customer" value=$this->Crud->get_data_by_id("customer", $c.customer_id, "id")%>
                                                                        <option value="<%$c.id%>"><%$customer[0].customer_name%>/<%$customer[0].customer_code%>/<%$c.part_number%>/<%$c.part_description%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
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
                            </div> -->
                            <div class="card">
                            <div class="card-header">
                            <div class="row">
                                    <div class="col-lg-2">
                                        <form action="<%base_url('sales_invoice_released')%>" method="post">
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
                                                <%foreach from=range(2022, 2027) item=i%>
                                                    <option <%if $i == $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
                                                <%/foreach%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <br><input type="submit" class="btn btn-primary mt-2"value="Search">
                                     </form>
                                    </div>
                                </div>
                                </div>
                                </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Invoice Date</th>
                                            <th>Vehicle Number</th>
                                            <th>Sales Invoice Number</th>
                                            <th>Customer</th>
                                            <th>View Details</th>
                                            <th>PDI</th>
                                            <th>E-Invoice Details</th>
                                            <th>Status</th>
                                            <th>E-Invoice Status</th>
                                            <th>Is EWay-Bill Available</th>
                                            <th>Total Price (Rs.)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="srNo" value=1%>
                                        <%if $new_sales%>
                                            <%foreach from=$new_sales item=c%>
                                                
                                                <%if isset($c->status)%>
                                                    <tr>
                                                        <td><%$srNo%></td>
                                                        <td><%$c->created_date%></td>
                                                        <td><%$c->vehicle_number%></td>
                                                        <td><%$c->sales_number%></td>
                                                        <td><%$c->customer_name%></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="<%$base_url%>view_new_sales_by_id/<%$c->id%>"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="<%$base_url%>view_PDI_inspection_report/<%$c->id%>"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <%if $c->status != "pending"%>
                                                            <a class="btn btn-primary btn-sm" href="<%$base_url%>view_e_invoice_by_id/<%$c->id%>"><i class="fas fa-eye"></i></a>
                                                            <%/if%>
                                                        </td>
                                                        <td><%$c->status%></td>
                                                       
                                                        <td><%$c->Status%></td>
                                                        <td><%if isset($c->Status)%><%$c->EwbStatus%><%/if%></td>
                                                        <%assign var="sales_id" value=$c->id%>
                                                        
                                                        <td><%number_format($final_po_amount[$sales_id], 2)%></td>
                                                        <td>
                                                            
                                                            <%if $c->status != "Cancelled" && (empty($c->Status) || $c->Status == "CANCELLED")%>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cancelInvoice<%$srNo%>">Cancel</button>&nbsp;
                                                            <%/if%>
                                                            <%if $c->status == "pending"%>
                                                            <button type="button" data-toggle="modal" class="btn btn-danger btn-sm" data-target="#deleteInvoice<%$srNo%>"><i class="fas fa-trash"></i></button>
                                                            <%/if%>

                                                            <div class="modal fade" id="cancelInvoice<%$srNo%>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<%base_url('cancel_sale_invoice')%>" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""><b>Are you sure want to Cancel this invoice?</b> </label>
                                                                                            <input type="hidden" name="sales_id" value="<%$c->id%>" required class="form-control">
                                                                                            <input type="hidden" name="sales_number" value="<%$c->sales_number%>" required class="form-control">
                                                                                            <input type="hidden" name="status" value="<%$c->status%>" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- delete model -->
                                                            <div class="modal fade" id="deleteInvoice<%$srNo%>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Invoice</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<%base_url('delete_sale_invoice')%>" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""><b>Are you sure want to Delete this invoice?</b> </label>
                                                                                            <input type="hidden" name="sales_id" value="<%$c->id%>" required class="form-control">
                                                                                            <input type="hidden" name="status" value="<%$c->status%>" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <%assign var="srNo" value=$srNo + 1%>
                                                <%/if%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>

                                    <!-- Pagination code
                                    
                                    <p><%$links%></p>
                                    <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
                                    
                                    -->
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
