<div class="wrapper container-xxl flex-grow-1 container-p-y">
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
                <select required name="created_month" id="months" class="form-control select2">
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
              <select required name="created_year" id="year" class="form-control select2">
              <%for $i = 2022 to 2027%>
                  <option <%if $i eq $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
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
            <em >GRN Report</em></a>
        </h1>
        <br>
        <span >GRN Report</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button type="button" class="btn btn-seconday " data-bs-toggle="modal" data-bs-target="#exportForTally">Export For Tally</button>
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- 
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reports : GRN Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">GRN Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section> 
        -->

        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header1">
                                <div class="row">
                                    
                                    <div class="col-lg-1"></div>
                                    <div class="col-sm-2">
                                        <%if $showDocRequestDetails == "true"%>
                                            Format No: STR-F-03 <br>
                                            Rev.Date : 11/10/2017 <br>
                                            Rev.No.  : 00
                                        <%/if%>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exportForTally" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Export Criteria</h5>
                                        <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <%* <span aria-hidden="true">&times;</span> *%>
                                        </button>
                                    </div>
                                    <form action="<%$base_url%>grn_excel_export" method="POST" id="grn_excel_export">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Only Accepted Status GRN will be exported.</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Year:</label>
                                                <select required name="search_year" id="" class="form-control select2">
                                                    <%foreach $fincYears as $fyear%>
                                                        <option <%if $fyear->startYear == $created_year%>selected<%/if%> value="<%$fyear->startYear%>"><%$fyear->displayName%></option>
                                                    <%/foreach%>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Month:</label>
                                                <span class="small"><br>Month will be ignored if GRN Number field is provided.</span>
                                                <select required name="search_month" id="" class="form-control select2">
                                                    <%foreach $month_data as $key => $val%>
                                                        <option <%if $month_number[$key] eq $created_month%>selected<%/if%> value="<%$month_number[$key]%>"><%$val%></option>
                                                    <%/foreach%>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>GRN Number/Range:</label>
                                                <span class="small">
                                                    <br>For Individual GRN: Use only <b>number</b>, example: <b>21</b>
                                                    <br>For GRN number range: Use <b>hyphen</b>, example: <b>23-27</b>
                                                    <br>For Specific GRN: Use <b>comma</b>, example: <b>11,15,17,18</b>
                                                    <br>&nbsp;
                                                </span>&nbsp;<br>
                                                <input type="text" value="" name="grn_numbers" class="form-control" id="grn_id" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="export" class="btn btn-primary" value="XML Export">Export</button>
                                        </div>
                                        </div>
                                        </form>
                            </div>
                        </div>
                        

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                                            <select name="customer_part_id" id="customer_part_id" class="from-control select2">
                                                                <%if $customer_part%>
                                                                    <%foreach $customer_part as $c%>
                                                                        <%assign var="customer" value=$Crud->get_data_by_id("customer", $c->customer_id, "id")%>
                                                                        <option value="<%$c->id%>"><%$customer[0]->customer_name%>/<%$customer[0]->customer_code%>/<%$c->part_number%>/<%$c->part_description%></option>
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                            <div class="table-responsive text-nowrap">
                                <table id="gn_report" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th>Supplier name</th>
                                            <th>Part No</th>
                                            <th>Part Description</th>
                                            <th>Part Rate</th>
                                            <th>HSN</th>
                                            <th>UOM</th>
                                            <th>PO No</th>
                                            <th>PO Date</th>
                                            <th>GRN No</th>
                                            <th>GRN Date</th>
                                            <th>Invoice Number</th>
                                            <th>Invoice Date</th>
                                            <th>PO Qty</th>
                                            <th>Accepted QTY</th>
                                            <th>Basic Amount</th>
                                            <th>SGST</th>
                                            <th>CGST</th>
                                            <th>IGST</th>
                                            <th>TCS</th>
                                            <th>GST Total</th>
                                            <th>Total Amount With GST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
<script src="<%$base_url%>/public/js/reports/gn_report.js"></script>