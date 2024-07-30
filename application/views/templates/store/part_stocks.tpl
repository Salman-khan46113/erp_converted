<div class="wrapper container-xxl flex-grow-1 container-p-y">
  <%assign var='role' value=trim($session_data['type'])%>

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
        <div class="simplebar-content">
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Select Part</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="part_id" id="selectPart" class="form-control select2" required id="">
                    <option value="ALL">All</option>
                    <%foreach from=$supplier_part_select_list item=c%>
                      <option <%if ($filter_part_id==$c->childPartId)%>selected <%/if%> value="<%$c->childPartId%>">
                            <%$c->part_number%>
                      </option>
                      <%/foreach%>
                        <!-- <option value="ALL">ALL</option> -->
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
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link"
            title="Back to Issue Request Listing">
            <i class="ti ti-chevrons-right"></i>
            <em>Supplier Parts (Item) Stock</em></a>
        </h1>
        <br>
        <span>Supplier Parts (Item) Stock</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i
          class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i
          class="ti ti-file-type-pdf"></i></button>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter"></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div>
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <a href="<%base_url('download_stock_variance')%>" class="btn btn-info">Download Stock Variance </a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card-body">
                    <div class="table-responsive text-nowrap">
                      <table id="part_stocks" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <%foreach from=$data key=key item=val%>
                              <th><b>Search <%$val['title']%></b></th>
                              <%/foreach%>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
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
    <div class="modal fade" id="storeToStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Transfer Stock Store to Store</h5>
          <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="<%base_url('transfer_child_store_to_store_stock')%>" method="POST" enctype="multipart/form-data">
                <label for="">Stock Qty <span class="text-danger">*</span></label>
                <input type="number" step="any" class="form-control" value="" max="<%$po->$stock_column_name %>" name="stock" required placeholder="Transfer Qty">
                <input type="hidden" class="form-control" value="<%$po->part_number%>" name="part_number" required>
                <input type="hidden" class="form-control" value="<%$po->childPartId%>" name="child_part_id" required>
            </div>
            <div class="col-lg-12">
              <br>
              <label for="">Supplier Part no / Description </label>
              <select name="customer_part_number" required id="" class="form-control select2">
                <option value="">Select Part</option>
               
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-second" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="prodToStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Transfer Production Stock to Store Stock</h5>
          <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="<%base_url('update_production_qty_child_part_production_qty')%>" method="POST" enctype="multipart/form-data">
                <label for="">Production Qty <span class="text-danger">*</span></label>
                <input type="number" step="any" class="form-control" value="" max="<%$po->$sheet_prod_column_name%>" name="production_qty" min="1" required placeholder="Enter Transfer Qty">
                <input type="hidden" class="form-control" value="<%$po->part_number%>" name="part_number" required>
                <input type="hidden" class="form-control" value="<%$po->childPartId%>" name="child_part_id" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- edit Plastic Modal -->
  <div class="modal fade" id="prodToStorePlastic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Transfer Production Qty to Store Stock</h5>
          <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="<%base_url('update_production_qty_child_part')%>" method="POST" enctype="multipart/form-data">
                <label for="">Machine Mold Stock Qty <span class="text-danger">*</span></label>
                <input type="number" step="any" class="form-control" value="" max="<%$po->$plastic_prod_column_name %>" name="machine_mold_issue_stock" min="1" required placeholder="Enter Transfer Qty">
                <input type="hidden" class="form-control" value="<%$po->part_number%>" name="part_number" required>
                <input type="hidden" class="form-control" value="<%$po->childPartId%>" name="child_part_id" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="fgtransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Transfer Store Stock to FG Stock</h5>
          <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <form action="<%base_url('transfer_child_part_to_fg_stock')%>" method="POST" enctype="multipart/form-data">
                <label for="">Enter Stock Qty <span class="text-danger">*</span></label>
                <input type="number" step="any" class="form-control" value="" max="<%$po->$stock_column_name%>" name="stock" required placeholder="Enter Transfer Qty">
                <input type="hidden" class="form-control" value="<%$po->part_number%>" name="part_number" required>
                <input type="hidden" class="form-control" value="<%$po->childPartId%>" name="child_part_id" required>
            </div>
            <div class="col-lg-12">
              <label for="">Select Customer Part Number / Customer Name </label>
              <select name="customer_part_number" required id="" class="form-control select2">
                <option value="">Select Part</option>
                
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-second" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
        
          <script>
            var column_details = <%$data|json_encode%> ;
            var page_length_arr = <%$page_length_arr|json_encode%> ;
            var is_searching_enable = <%$is_searching_enable|json_encode%> ;
            var is_top_searching_enable = <%$is_top_searching_enable|json_encode%> ;
            var is_paging_enable = <%$is_paging_enable|json_encode%> ;
            var is_serverSide = <%$is_serverSide|json_encode%> ;
            var no_data_message = <%$no_data_message|json_encode%> ;
            var is_ordering = <%$is_ordering|json_encode%> ;
            var sorting_column = <%$sorting_column%> ;
            var api_name = <%$api_name|json_encode%> ;
            var base_url = <%$base_url|json_encode%> ;
          </script>
<script src="<%$base_url%>/public/js/reports/supplier_part_stock_report.js"></script>