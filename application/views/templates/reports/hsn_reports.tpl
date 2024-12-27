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
                <span class="hide-menu">Customer</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="month_number" class="form-control select2" id="customer_search">
                  	<option value="">Select Customer</option>
                  <%foreach $customer as $key => $val%>
	                  <option value="<%$val->id%>"><%$val->customer_name%></option>
	              <%/foreach%>
                  </select>
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">HSN Code</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
              <div class="input-group">
                <input name="hsn" class="form-control " id="hsn_search" placeholder="Enter HSN Code"  />

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
            <em >HSN Reports</em></a>
        </h1>
        <br>
        <span >HSN Reports</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <%if checkGroupAccess("sales_report","export","No") %>
       
        
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
<script src="<%$base_url%>/public/js/reports/hsn_repots.js"></script>