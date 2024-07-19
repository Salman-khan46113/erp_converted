<div class="wrapper" style="width:2500px">
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
                        <h1>Sales Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Po Balance Qty</li>
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
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exportForTally">
                                            Sales Export For Tally
                                        </button>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <form action="<%$base_url%>sales_report" method="post">
                                            <div class="form-group">
                                                <label for="">Select Month <span class="text-danger">*</span></label>
                                                <select required name="created_month" id=""
                                                    class="form-control select2">
                                                   <%foreach $month_data as $key => $val%>
                                                <option <%if $month_number[$key] eq $created_month%>selected<%/if%>
                                                    value="<%$month_number[$key]%>"><%$val%></option>
                                            <%/foreach%>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Year <span class="text-danger">*</span></label>
                                            <select required name="created_year" id="" class="form-control select2">
                                                <%for $i=2022 to 2027%>
                                                <option <%if $i == $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
                                                <%/for%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" name="submit" class="btn btn-primary mt-4" value="Search">
                                        </form>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exportForTally" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sales Export
                                                            Criteria</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <form action="<%$base_url%>sales_report" method="POST">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Year:</label>
                                                            <select required name="search_year" id=""
                                                                class="form-control select2">
                                                                
                                                                <%if $created_month < 4%>
                                                                    <%assign var="year_sel" value=$created_year-1%>
                                                                <%/if%>
                                                                <%foreach from=$fincYears item=fyear%>
                                                                    <option <%if $fyear->startYear == $year_sel%>selected<%/if%> value="<%$fyear->startYear%>"><%$fyear->displayName%></option>
                                                                <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Month:
                                                                <span class="small"><br>Month will be ignored if Sale
                                                                    Number field is provided.</span>
                                                            </label>
                                                            <select required name="search_month" id=""
                                                                class="form-control select2">
                                                                <%foreach $month_data as $key => $val%>
                                                                <option <%if $month_number[$key] eq $created_month%>selected<%/if%>
                                                                    value="<%$month_number[$key]%>"><%$val%></option>
                                                            <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sale Number/Range:</label>
                                                            <span class="small">
                                                                <br>For Individual Sale: Use only <b>number</b>,
                                                                example: <b>21</b>
                                                                <br>For Sales number range : Use <b>hyphen</b>, example:
                                                                <b>23-27</b>
                                                                <br>For Specific sales : Use <b>comma</b>, example:
                                                                <b>11,15,17,18</b>
                                                                <br>&nbsp;
                                                            </span>&nbsp;<br>
                                                            <input type="text" value="" name="sale_numbers"
                                                                class="form-control" id="sale_id"
                                                                aria-describedby="emailHelp">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" name="export" class="btn btn-primary"
                                                            value="XML Export">Export</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%$base_url%>add_job_card" method="POST"
                                                    enctype='multipart/form-data'>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="po_num">Select Customer Name / Customer Code
                                                                    / Part Number / Description </label><span
                                                                    class="text-danger">*</span>
                                                                <select name="customer_part_id" id=""
                                                                    class="form-control select2">
                                                                    <%if $customer_part%>
                                                                        <%foreach from=$customer_part item=c%>
                                                                            <%*assign var="customer" value=$Crud.get_data_by_id("customer", $c.customer_id, "id")*%>
                                                                            <option value="<%$c.id%>">
                                                                                <%*$customer.0.customer_name%>/<%$customer.0.customer_code%>/<%$c.part_number%>/<%$c.part_description*%>
                                                                            </option>
                                                                        <%/foreach%>
                                                                    <%/if%>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="po_num">Required Quantity </label><span
                                                                    class="text-danger">*</span>
                                                                <input type="number" name="req_qty"
                                                                    placeholder="Enter Quantity" min="1" value=""
                                                                    class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
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
                                                <th>CUSTOMER NAME</th>
                                                <th>Customer PO No</th>
                                                <th>SALES INV NO</th>
                                                <th>SALES INV DATE</th>
                                                <th>SALES STATUS</th>
                                                <th>PART NO</th>
                                                <th>PART NAME</th>
                                                <th>HSN</th>
                                                <th>QTY</th>
                                                <th>UOM</th>
                                                <th>Part Price</th>
                                                <th>BASIC AMOUNT TOTAL</th>
                                                <th>SGST</th>
                                                <th>CGST</th>
                                                <th>IGST</th>
                                                <th>TCS</th>
                                                <th>GST TOTAL AMOUNT</th>
                                                <th>TOTAL AMOUNT WITH GST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <%assign var="i" value=1%>
                                            <%if $sales_parts%>
                                                <%foreach from=$sales_parts item=po%>
                                                <%if $po->basic_total > 0%>
                                                <%assign var="subtotal" value=$po->basic_total%>
                                                <%else%>
                                                    <%assign var="subtotal" value=round($po->total_rate - $po->gst_amount, 2)%>
                                                <%/if%>
                                                
                                                <%if $po->part_price > 0%>
                                                    <%assign var="rate" value=$po->part_price%>
                                                <%else%>
                                                    <%assign var="rate" value=round($subtotal / $po->qty, 2)%>
                                                <%/if%>
                                                    <%assign var="row_total" value=round($po->total_rate, 2) + round($po->tcs_amount, 2)%>
                                                    <tr>
                                                        <td><%$i%></td>
                                                        <td><%$po->customer_name%></td>
                                                        <td><%$po->po_number%></td>
                                                        <td><%$po->salesNumber%></td>
                                                        <td><%$po->sales_date%></td>
                                                        <td><%$po->status%></td>
                                                        <td><%$po->part_number%></td>
                                                        <td><%$po->part_description%></td>
                                                        <td><%$po->hsn_code%></td>
                                                        <td><%$po->qty%></td>
                                                        <td><%$po->uom_id%></td>
                                                        <td><%$rate%></td>
                                                        <td><%$subtotal%></td>
                                                        <td><%round($po->sgst_amount, 2)%></td>
                                                        <td><%round($po->cgst_amount, 2)%></td>
                                                        <td><%round($po->igst_amount, 2)%></td>
                                                        <td><%round($po->tcs_amount, 2)%></td>
                                                        <td><%round($po->gst_amount, 2)%></td>
                                                        <td><%round($row_total, 2)%></td>
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
