<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
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
                <span class="hide-menu">Part Number</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="child_part_id" class="form-control select2" id="part_number_search">
                    <option value="">Select Part Number</option>
                    <%foreach from=$supplier_part_list item=parts%>
                    <option value="<%$parts->id%>"><%$parts->part_number %></option>
                    <%/foreach%>
                  </select>
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Part Description</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="part_description_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
                </div>
              </li>
            </div>
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Name</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <input type="text" id="employee_name_search" class="form-control" placeholder="Name">
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
          Store
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Inwarding</em></a>
          </h1>
          <br>
          <span >Part GRN</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
      </div>

      <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="inwarding">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>PO Number</th>
                <th>Supplier Name</th>
                <th>PO Date</th>
                <th>Created Date</th>
                <th>Expiry Date</th>
                <th>Download PDF PO</th>
                <th>View PO Details</th>
                <th>Close PO</th>
              </tr>
            </thead>
            <tbody>
              <%assign var='i' value=1%>
              <%if ($new_po) %>
              <%foreach from=$new_po item=s %>
              <tr>
                <td><%$i %></td>
                <td><%$s->po_number %></td>
                <td><%$s->supplier_name %></td>
                <td><%$s->po_date %></td>
                <td><%$s->created_date %></td>
                <td><%$s->expiry_po_date %></td>
                <td><a href="<%base_url('download_my_pdf/') %><%$s->id %>" class="btn btn-primary" href="">Download</a></td>
                <td><a href="<%base_url('inwarding_invoice/') %><%$s->id %>" class="btn btn-primary" href="">Details</a></td>
                <td>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#close<%$i %>">
                    Close
                  </button>
                  <div class="modal fade" id="close<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Close PO</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<%base_url('close_po') %>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Are You Sure Want To Close <%$s->po_number %> This PO? <span class="text-danger">*</span></label>
                              <input required value="<%$s->id %>" type="hidden" class="form-control" name="id">
                              <input required value="<%$s->po_number %>" type="hidden" class="form-control" name="po_number">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Close</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <%assign var='i' value=$i+1%>
              <%/foreach%>
              <%/if%>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Responsive Table -->
    </div>
    <!-- /.col -->


    <div class="content-backdrop fade"></div>
  </div>
  <script src="<%$base_url%>public/js/store/inwarding.js"></script>
