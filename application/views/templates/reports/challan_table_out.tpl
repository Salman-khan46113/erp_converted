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
            <div class="filter-row ">
              <li class="nav-small-cap">
                <span class="hide-menu">Supplier</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="month_number" class="form-control select2" id="supplier_search">
                  	<option value="">Select Supplier</option>
                  <%foreach $supplier as $key => $val%>
	                  <option value="<%$val->id%>"><%$val->supplier_name%></option>
	              <%/foreach%>
                  </select>
                </div>
              </li>
            </div>

             <div class="filter-row">
          <li class="nav-small-cap">
            <span class="hide-menu">Date</span>
            <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
          </li>
          <li class="sidebar-item">
            <div class="input-group">
            <input type="text" name="datetimes" class="dates form-control" id="date_range_filter" />
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
            <em >Challan</em></a>
        </h1>
        <br>
        <span >Challan Table 4 Out</span>
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
        <!-- <div class=" p-0 ms-1">
            <div class="card-header">
                <div class="row">
                    <div class="tgdp-rgt-tp-sect ms-2">
                        <p class="tgdp-rgt-tp-ttl">Total Quantity</p>
                        <p class="tgdp-rgt-tp-txt total_qty_block">0.00</p>
                    </div>
                    <div class="tgdp-rgt-tp-sect">
                        <p class="tgdp-rgt-tp-ttl">Total Amount</p>
                        <p class="tgdp-rgt-tp-txt total_rate_block">0.00</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Main content -->
        <section class="content mt-2">
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
<style type="text/css">
    tr.danger-row .due_days_block {
    color: #000 !important;
    background-color: red !important;
    box-shadow: inset 0 0 0 9999px #e84343 !important;
}
.tgdp-rgt-tp-sect {
    float: left;
    width: 25%;
    width: calc(25% - 19px);
    border-radius: 10px;
    background: #fff;
    height: 105px;
    margin-right: 17px;
    padding: 20px;
    display: inline-block;
}
.tgdp-rgt-tp-sect .tgdp-rgt-tp-ttl {

    font-size: 16px !important;
    margin-bottom: 0px;
    color: #000;
    font-size: 18px;
    font-family: "gilroymedium" !important;
    margin: 0;
}
.tgdp-rgt-tp-sect .tgdp-rgt-tp-txt {
    font-weight: 500;
    
    color: #000 !important;
    max-width: 95%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #000;
    font-size: 26px !important;
    font-family: 'gilroymedium';
    margin: 0;
    display: inline-block;
    line-height: 48px;
    cursor: pointer;
}
</style>
<script>
    var column_details =  <%$data|json_encode%>;
    var page_length_arr = <%$page_length_arr|json_encode%>;
    var is_searching_enable = <%$is_searching_enable|json_encode%>;
    var is_top_searching_enable =  <%$is_top_searching_enable|json_encode%>;
    var is_paging_enable =  <%$is_paging_enable|json_encode%>;
    var is_serverSide =  <%$is_serverSide|json_encode%>;
    var no_data_message =  <%$no_data_message|json_encode%>;
    var is_ordering =  <%$is_ordering|json_encode%>;
    var sorting_column = <%$sorting_column|json_encode%>;
    var api_name =  <%$api_name|json_encode%>;
    var base_url = <%$base_url|json_encode%>;
    var start_date = <%$start_date|json_encode%>;
    var end_date = <%$end_date|json_encode%>;
</script>
<script src="<%$base_url%>/public/js/reports/challan_table_out.js"></script>