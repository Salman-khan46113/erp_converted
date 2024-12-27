<div class="wrapper container-xxl flex-grow-1 container-p-y" >
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme filter-popup-block" style="width: 0px;">
    <div class="app-brand demo justify-content-between">
        <a href="javascript:void(0)" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Filter</span>
        </a>
        <div class="close-filter-btn d-block filter-popup cursor-pointer">
                <i class="ti ti-x fs-8"></i>
            </div>
    </div>
    <nav class="sidebar-nav scroll-sidebar filter-block" data-simplebar="init">
      <div class="simplebar-content" >
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Select Month</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="month_number" class="form-control select2" id="month_number">
                  <%foreach $month_data as $key => $val%>
                  <option <%if $month_number[$key] eq $created_month%>selected<%/if%>
                      value="<%$month_number[$key]%>"><%$val%></option>
              <%/foreach%>
                  </select>
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Select Year</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
              <div class="input-group">
                <select name="year" class="form-control select2" id="year">
                <%for $i=2022 to 2027%>
                <option <%if $i == $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
                <%/for%>
                </select>
              </div>
            </li>
            </div>  
            

        </ul>
      </div>
    </nav>
    <div class="filter-popup-btn">
            <button class="btn btn-outline-danger reset-filter">Reset</button>
            <button class="btn btn-primary search-filter">Search</button>
        </div>
</aside>

    <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Reports
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Sales Reports</em></a>
        </h1>
        <br>
        <span >Sales Reports</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <%if checkGroupAccess("sales_report","export","No") %>
        <button type="button" class="btn btn-seconday" data-toggle="modal"
                                            data-bs-target="#exportForTally" data-bs-toggle="modal">
                                            Sales Export For Tally
                                        </button>
        
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <%/if%>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>
    <div class="w-100">
    <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
  </div>
    <div class="content-wrapper ">
     
        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header1">
                              
                                <div class="row">
                                    
                                        <!-- Modal -->
                                        <div class="modal fade" id="exportForTally" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sales Export
                                                            Criteria</h5>
                                                        <button type="button" class="close btn-close" data-dismiss="modal"
                                                            aria-label="Close" data-bs-dismiss="modal">
                                                            <%*<span aria-hidden="true">&times;</span>*%>
                                                        </button>
                                                    </div>
                                                    <form action="<%$base_url%>sales_report" method="POST" id="sales_report_export">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="export" value="export">
                                                        <div class="form-group">
                                                            <label for="">Year:</label>
                                                            <select required name="search_year" id=""
                                                                class="form-control select2" style="width: 100%;">
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
                                                                class="form-control select2" style="width: 100%;">
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
                                                            data-bs-dismiss="modal">Close</button>
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
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                <div class="">
                                    <div class="table-responsive text-nowrap">
                                        <table id="example1" class="table  table-striped">
                                            <thead>
                                            <tr>
                                            <%foreach from=$data key=key item=val%>
                                            <th><b>Search <%$val['title']%></b></th>
                                            <%/foreach%>
                                        </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        <%*   <tbody>
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
                                                            <td><%$uom_id%></td>
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
                                            </tbody> *%>
                                        </table>
                                    </div>
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
<script>
    var column_details =  <%$data|json_encode%>;
    var page_length_arr = <%$page_length_arr|json_encode%>;
    var is_searching_enable = <%$is_searching_enable|json_encode%>;
    var is_top_searching_enable =  <%$is_top_searching_enable|json_encode%>;
    var is_paging_enable =  <%$is_paging_enable|json_encode%>;
    var is_serverSide =  <%$is_serverSide|json_encode%>;
    var no_data_message =  <%$no_data_message|json_encode%>;
    var is_ordering =  <%$is_ordering|json_encode%>;
    var sorting_column = <%$sorting_column%>;
    var api_name =  <%$api_name|json_encode%>;
    var base_url = <%$base_url|json_encode%>;
</script>
<script src="<%$base_url%>/public/js/reports/sales_repots.js"></script>