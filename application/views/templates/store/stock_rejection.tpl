
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
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Stock Rejection</em></a>
          </h1>
          <br>
          <span >Stock Rejection</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
        <button type="button" class="btn btn-seconday" title="Add Stock Rejection" data-bs-toggle="modal" data-bs-target="#exampleModal">

          <i class="ti ti-plus"></i> </button>
      </div>


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Stock Rejection </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  </button>
               </div>
               <div class="modal-body">
                  <form action="javascript:void(0)" method="POST" class="custom-form add_stock_rejection" enctype='multipart/form-data'>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="po_num">Select Part Number / Description / Stock </label><span class="text-danger">*</span>
                              <select name="part_id" id="" class="from-control form-select required-input">
                                 <%if ($child_part) %>
                                        <%foreach from=$child_part item=c %>
                                            <%if ($c->stock > 0) %>
                                        <option value="<%$c->childPartId %>"><%$c->part_number %>/<%$c->part_description %>/<%$c->stock %></option>
                                      <%/if%>
                                      <%/foreach%>
                                 <%/if%>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="po_num">Select Supplier</label><span class="text-danger">*</span>
                              <select name="supplier_id" id="" class="from-control form-select required-input">
                                 <%if ($supplier) %>
                                        <%foreach from=$supplier item=c %>
                                      <option value="<%$c->id %>"><%$c->supplier_name %></option>
                                    <%/foreach%>
                                 <%/if%>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Reason <span class="text-danger">*</span></label>
                              <input type="text" name="reason"  placeholder="Enter Reason" class="form-control required-input">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Upload debit note (approved document)</label>
                              <input type="file" name="uploading_document" class="form-control required-input">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Qty <span class="text-danger">*</span></label>
                              <input type="number" name="qty" step="any" placeholder="Enter Qty" name="qty"  class="form-control required-input">
                           </div>
                           <div class="form-group">
                              <label for="po_num">Enter Remark </label>
                              <input type="text" name="remark"  placeholder="Enter Remark" class="form-control required-input">
                           </div>
                        </div>
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
                  <th>Transfer Stock</th>
                  <th>Download Debit Note</th>
               </tr>
            </thead>
            <tbody>
               <%assign var='i' value=1 %>
                    <%if ($rejection_flow) %>
                        <%foreach from=$rejection_flow item=c %>
                       <tr>
                          <td><%$i %></td>
                          <td><%$c->part_number %>/<%$c->part_description %></td>
                          <td><%$c->reason %></td>
                          <td><%$c->supplier_name %></td>
                          <td><%$c->remark %></td>
                          <td class="text-center">
                             <%if ($c->debit_note) %>
                             <a  download href="<%base_url('documents/') %><%$c->debit_note %>" title="Download Uploaded Document"><i class="ti ti-file-download"></i></a>
                             <%/if%>
                          </td>
                          <td>
                             <%if ($c->status == "pending") %>
                              <a class="btn btn-warning" href="<%base_url('transfer_stock/') %><%$c->id %>">Click To Transfer Stock</a>
                             <%else %>
                                stock transfered
                             <%/if%>
                          </td>
                          <td><%$c->qty %></td>
                          <td>
                             <%if ($c->status == "approved") %>
                              <p class="text-center"><a  href="<%base_url('create_debit_note/') %><%$c->id %>" title="Download"><i class="ti ti-download"></i></a></p>
                             <%else if ($c->status == "stock_transfered") %>
                               <button type="submit" data-bs-toggle="modal" class="btn btn-sm btn-primary" data-bs-target="#exampleModal2<%$i %>">Approve Rejection</button>
                               <div class="modal fade" id="exampleModal2<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                           <h5 class="modal-title" id="exampleModalLabel">Approve Rejection</h5>
                                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                           </button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="<%base_url('update_rejection_flow_status') %>" method="POST">
                                              <div class="row">
                                                 <div class="col-lg-12">
                                                    <div class="form-group">
                                                       <label for="Client_name">Are You Sure Want To Accept This Request ?</label><span class="text-danger">*</span>
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-12">
                                                    <div class="form-group">
                                                       <select name="status" id="" required class="form-control">
                                                          <option value="approved">Accept</option>
                                                          <option value="reject">Reject</option>
                                                       </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="<%$c->id %>" class="id">
                                                 </div>
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Accept</button>
                                              </div>
                                           </form>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                             <%/if%>
                          </td>
                       </tr>
                    <%assign var='i' value=$i+1 %>
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


  <script type="text/javascript">
    var base_url = <%$base_url|@json_encode%>
  </script>

  <script src="<%$base_url%>public/js/store/stock_rejection.js"></script>
