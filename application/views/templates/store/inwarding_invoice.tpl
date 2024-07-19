<%assign var="isMultiClient" value=$session_data['isMultipleClientUnits']%>
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
            <em >Challan</em></a>
          </h1>
          <br>
          <span >Inwarding PO Invoice Numbers</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
        <button type="button" class="btn btn-primary" title="Add Invoice Number" data-bs-toggle="modal" data-bs-target="#exampleModal">
          +</button>
          <a class="btn btn-dark" href="<%base_url('inwarding') %>">Back</a>
        <!-- <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button> -->
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Invoice Number</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

              </button>
            </div>
            <div class="modal-body">
              <form action="<%base_url('add_invoice_number') %>" method="POST">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="tool_number">Invoice Number </label><span class="text-danger">*</span>
                      <input type="text" name="invoice_number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                      <input type="hidden" name="new_po_id" value="<%$new_po_id %>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                    </div>
                    <div class="form-group">
                      <label for="tool_number">Invoice Date </label><span class="text-danger">*</span>
                      <input type="date" name="invoice_date" max="<%date('Y-m-d') %>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                    </div>
                    <div class="form-group">
                      <label for="tool_number">GRN Date </label><span class="text-danger">*</span>
                      <input type="date" name="grn_date" readonly value="<%date('Y-m-d') %>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                    </div>
                    <div class="form-group">
                      <label for="">Vehicle No.</label>
                      <input type="text"
                      placeholder="Enter Vehicle No"
                      value=""
                      name="vehicle_number"
                      pattern="^([A-Z|a-z|0-9]{4,20})$"
                      oninvalid="this.setCustomValidity('Please enter a valid vehicle number in the format XX00XX0000')"
                      onchange="this.setCustomValidity('')"
                      class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="tool_number">Transporter ID </label><span class="text-danger">*</span>
                      <input type="text" name="transporter" value="" class="form-control" id="transporter" aria-describedby="emailHelp" placeholder="Enter transporter">
                    </div>
                    <!-- <php if($isMultiClient == "true") { ?>
                    <div class="form-group">
                    <label>Delivery Location</label><span class="text-danger">*</span><br>
                    <select name="deliveryUnit" required class="form-control select2" id="">
                    <option value="">Select</option>
                    <?php
                    foreach ($client_list as $cl) {
                    ?>
                    <option value="<?php echo $cl->client_unit ?>">
                    <?php echo $cl->client_unit; ?>
                  </option>
                  <?php
                }
                ?>
              </select>
            </div>
            <php } ?> -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

      <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="view_add_challan">

              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Invoice Number</th>
                  <th>Invoice Date</th>
                  <th>GRN Date</th>
                  <th>GRN Time</th>
                  <th>GRN Number </th>
                  <th>Vehicle No</th>
                  <th>Transporter</th>
                  <?php if($isMultiClient == "true") { ?>
                    <th>Delivery Location</th>
                  <?php } ?>
                  <th>View Details</th>
                </tr>
              </thead>
              <tbody>
                <%assign var='i' value=1%>
                <%if ($inwarding_data) %>
                <%foreach from=$inwarding_data item=t %>
                <%assign var='grn_number' value=$t->grn_number %>
                <tr>
                  <td><%$i %></td>
                  <td><%$t->invoice_number %></td>
                  <td><%$t->invoice_date %></td>
                  <td><%$t->grn_date %></td>

                  <%if ($t->created_dttm !=null) %>
                  <%assign var='dateTime' value= convertDateTime($t->created_dttm) %>
                  <%assign var='time' value= $dateTime->format('H:i:s') %>
                  <%else %>
                  <%assign var='time' value='Not available' %>
                  <%/if%>
                  <td><%$time %></td>
                  <td><%$grn_number %></td>
                  <td><%$t->vehicle_number %></td>
                  <td><%$t->transporter %></td>
                  <%if ($isMultiClient == "true") %>
                  <td><%$t->delivery_unit %></td>
                  <%/if%>
                  <td>
                    <a href="<%base_url('inwarding_details/') %><%$t->id %>/<%$new_po_id %>" class="btn btn-primary" href="">Inwarding Details</a>
                  </td>
                </tr>
                <%assign var='i' value=$i+1%>
                <%/foreach%>
                <%/if%>
              </tbody>
            </table>


            <table id="example1" class="table table-bordered table-striped mb-5">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Part Number</th>
                  <th>Part Description</th>
                  <th>Balance QTY </th>
                </tr>
              </thead>

              <tbody>
                <%assign var='flag' value=0%>
                <%if ($po_parts) %>
                <%assign var='final_po_amount' value=0%>
                <%assign var='i' value=1%>
                <%foreach from=$po_parts item=p %>
                <%assign var='qty' value=0%>
                <%assign var='qty' value=$p->pending_qty%>
                <%assign var='flag' value=$flag + $qty%>
                <tr>
                  <td><%$i %></td>
                  <td><%$p->child_part_data->part_number %></td>
                  <td><%$p->child_part_data->part_description %></td>
                  <td><%$qty %></td>
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



  <!-- <script src="<%$base_url%>public/js/store/view_add_challan.js"></script> -->
