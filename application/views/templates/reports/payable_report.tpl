
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<div class="wrapper container-xxl flex-grow-1 container-p-y">

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
            <span class="hide-menu">Supplier</span>
            <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
          </li>
          <li class="sidebar-item">
            <div class="input-group">
            <select name="supplier_part_id" id="supplier_part_id" class="form-control select2" required>
            <option value="">Select Supplier</option>
                            <%if $supplier%>
                                <%foreach from=$supplier item=c%>
                                <option value="<%$c->id%>"
                                ><%$c->supplier_name%></option>
                                <%/foreach%>
                            <%/if%>
                        </select>
            </div>
          </li>
        </div>
         <div class="filter-row">
          <li class="nav-small-cap">
            <span class="hide-menu">Payment Status </span>
            <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
          </li>
          <li class="sidebar-item">
            <div class="input-group">
            <select name="status_search" id="status_search" class="form-control select2" required>
                <option value="">Select Payment Status</option>
                <option value="Pending">Pending</option>
                <option value="Received">Received</option>
                        </select>
            </div>
          </li>
        </div>
        <div class="filter-row">
          <li class="nav-small-cap">
            <span class="hide-menu">GRN Date</span>
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
            <em >Payable Reports</em></a>
        </h1>
        <br>
        <span >Payable Reports</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <%if checkGroupAccess("payable_report","export","No") %>
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <%/if%>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>

    <div class="w-100">
    <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
  </div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class=" p-0 ms-1">
            <div class="card-header">
                <div class="row">
                    <div class="tgdp-rgt-tp-sect ms-2">
                        <p class="tgdp-rgt-tp-ttl">Total Amount With GST</p>
                        <p class="tgdp-rgt-tp-txt total_amount_with_gst">
                            0.00
                        </p>
                    </div>
                    <div class="tgdp-rgt-tp-sect">
                        <p class="tgdp-rgt-tp-ttl">Total Amount Paid</p>
                        <p class="tgdp-rgt-tp-txt total_amount_paid">
                             0.00
                        </p>
                    </div>
                    <div class="tgdp-rgt-tp-sect">
                        <p class="tgdp-rgt-tp-ttl">Total Balance Amount to Pay</p>
                        <p class="tgdp-rgt-tp-txt total_balance_amount_to_pay" title="12">
                             0.00
                        </p>
                    </div>
                    <div class="tgdp-rgt-tp-sect">
                        <p class="tgdp-rgt-tp-ttl">Total TDS Amount</p>
                        <p class="tgdp-rgt-tp-txt total_tds_amount" title="12">
                             0.00
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content mt-4">
            <div class="">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            

                            <!-- /.card-header -->
                            <div class="">
                            <div class="table-responsive text-nowrap">
                                <table id="receivable_report" class="table table-striped">
                                    <thead>
                                        <%foreach from=$data key=key item=val%>
                                        <th><b>Search <%$val['title']%></b></th>
                                        <%/foreach%>
                                    </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </div>
                                    </tbody>
                                </table>
                                </div>
                            <!-- /.card-body -->
                        </div>
                       

                        <div class="modal fade" id="update_report_data" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form id="updateReceivableForm" method="POST" class="custom-form updateReceivableForm">
                                        <input type="hidden" name="grn_number" id="grn_number" value="">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="payment_receipt_date">Payment Paid Date</label><span
                                                        class="text-danger">*</span>
                                                    <input type="date" name="payment_receipt_date" 
                                                        class="form-control required-input "
                                                        placeholder="Payment Paid Date" value="" id="payment_receipt_date">
                                                </div>

                                                <div class="form-group">
                                                    <label for="amount_received">Amount Paid</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text"
                                                        name="amount_received" 
                                                        class="form-control required-input onlyNumericInput"
                                                        placeholder="Amount Paid" value=""id="amount_paid" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_details">Trans. Details</label><span
                                                        class="text-danger"></span>
                                                    <input type="text"
                                                        name="transaction_details"
                                                        class="form-control "
                                                        placeholder="Transaction Details" value="" id="transaction_details">
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_details">TDS</label><span
                                                        class="text-danger"></span>
                                                    <input type="text"
                                                        name="tds"
                                                        class="form-control "
                                                        id="tds"
                                                        placeholder="TDS" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_details">Remark</label><span
                                                        class="text-danger"></span>
                                                    <input type="text"
                                                        name="remark"
                                                        class="form-control "
                                                        id="remark"
                                                        placeholder="Remark" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
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
    var sorting_column = <%$sorting_column%>;
    var api_name =  <%$api_name|json_encode%>;
    var base_url = <%$base_url|json_encode%>;
    var start_date = <%$start_date|json_encode%>;
    var end_date = <%$end_date|json_encode%>;

</script>
<script src="<%$base_url%>/public/js/reports/payable_report.js"></script>