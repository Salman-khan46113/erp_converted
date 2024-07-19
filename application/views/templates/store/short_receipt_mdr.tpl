
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
          <span >MDR Rejection</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
      </div>


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="<%base_url('add_rejection_flow') %>" method="POST" enctype='multipart/form-data'>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="po_num">Select Part Number / Description / Stock </label><span class="text-danger">*</span>
                              <select name="part_id" id="" class="from-control select2">
                                <%if ($child_part) %>
                                        <%foreach from=$child_part item=c %>

                                          <%if ($c->stock > 0) %>
                                       <option value="<%$c->clientId %>"><%$c->part_number %>/<%$c->part_description %>/<%$c->stock %></option>
                                      <%/if%>
                                      <%/foreach%>
                                <%/if%>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="po_num">Select Supplier</label><span class="text-danger">*</span>
                              <select name="supplier_id" id="" class="from-control select2">
                                 <%if ($supplier) %>
                                        <%foreach from=$supplier item=c %>
                                       <option value="<%$c->id %>"><%$c->supplier_name %></option>
                                  <%/foreach%>
                                 <%/if%>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Reason <span class="text-danger">*</span></label>
                              <input type="text" name="reason" required placeholder="Enter Reason" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Upload debit note (approved document) <span class="text-danger">*</span></label>
                              <input type="file" name="uploading_document" required class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Qty <span class="text-danger">*</span></label>
                              <input type="number" name="qty" step="any" placeholder="Enter Qty" name="qty" required class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Remark </label>
                              <input type="text" name="remark" required placeholder="Enter Remark" class="form-control">
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
      </div>
      <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="short_receipt_mdr">
            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th>Part Number / Description</th>
                  <th>Rejection Reason</th>
                  <th>Supplier</th>
                  <th>Remark</th>
                  <th>Uploaded Debit Note</th>
                  <th>Qty</th>
                  <th>Download Debit Note</th>
               </tr>
            </thead>
            <tbody>
               <%assign var='i' value=1 %>
                <%if ($rejection_flow) %>
                      <%foreach from=$rejection_flow item=c %>
                          <%if ($c->type == "MDR") %>
                    <tr>
                              <td><%$i %></td>
                              <td><%$c->part_number %>/<%$c->part_description %></td>
                              <td><%$c->reason %></td>
                              <td><%$c->supplier_name %></td>
                              <td><%$c->remark %></td>
                              <td>
                                 <a class="btn btn-dark" download href="<%base_url('documents/') %><%$c->debit_note %>">Download Uploaded Document</a>
                              </td>
                              <td><%$c->qty %></td>
                              <td>
                                 <%if ($c->status == "approved" || true) %>
                                  <a class="btn btn-success" href="<%base_url('create_debit_note/') %><%$c->id %>">Download</a>
                                 <%else if ($c->status == "stock_transfered") %>

                                 <%else %>
                                        // echo "stock transfered";
                                  <%/if%>
                              </td>
                    </tr>
                     <%assign var='i' value=$i+1 %>
                    <%/if%>
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




  <script src="<%$base_url%>public/js/store/short_receipt_mdr.js"></script>
