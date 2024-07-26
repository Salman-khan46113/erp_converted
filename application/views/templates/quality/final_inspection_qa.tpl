
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
          Quality
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Final Inspection Production Qty</em></a>
          </h1>
          <br>
          <span >Final Inspection Production Qty</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>

        <button type="button" class="btn btn-seconday" id="AddProdButton" data-bs-toggle="modal" title="Add Production Qty"
           data-bs-target="#addPromo">
        <i class="ti ti-plus"></i>
        </button>
      </div>


      <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <!-- Modal content will be populated here by AJAX -->
            </div>
         </div>
      </div>

        <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="final_inspection_qa">
            <thead>
               <tr>
                  <th>Sr No</th>
                  <th>Output Part Number / Descriptions </th>
                  <th>Date</th>
                  <th>Shift</th>
                  <th>Machine</th>
                  <th>Operator</th>
                  <th>Qty</th>
                  <th>Scrap</th>
                  <th>Accepted Qty</th>
                  <th>Rejected Qty</th>
                  <th>Onhold Qty</th>
                  <th>Status</th>
                  <th>Actions</th>
                  <th>View Details</th>
               </tr>
            </thead>
            <tbody>
               <%if ($p_q) %>
                     <%assign var='i' value=1 %>
                     <%foreach from=$p_q item=u %>
                        <%assign var='output_part_data' value=$u->output_part_data %>
                           <tr>
                              <td><%$i %></td>
                              <td><%$output_part_data[0]->part_number %> /
                                 <%$output_part_data[0]->part_description %>
                              </td>
                              <td><%$u->date %></td>
                              <td><%$u->shift_type %>/<%$u->shift_name %></td>
                              <td><%$u->machine_name %></td>
                              <td><%$u->op_name %></td>
                              <td><%$u->qty %></td>
                              <td><%$u->scrap_factor %></td>
                              <td><%$u->accepted_qty %></td>
                              <td><%$u->rejected_qty %></td>
                              <td>
                                 <%if (!empty($u->onhold_qty)) %>
                                 <button type="button" class="btn btn-warning float-left " data-bs-toggle="modal" data-bs-target="#onhold<%$i %>">
                                 <%$u->onhold_qty %> </button>
                                 <%else %>
                                    0
                                 <%/if%>
                                 <div class="modal fade" id="onhold<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">
                                                Onhold
                                                Update
                                             </h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="<%base_url('update_p_q_onhold') %>" method="POST" enctype='multipart/form-data' s>
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Qty</label>
                                                         <input type="text" value="<%$u->onhold_qty %>" readonly class="form-control">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Accept Qty <span class="text-danger">*</span>
                                                         </label>
                                                         <input type="number" step="any" value="" max="<%$u->onhold_qty %>" min="0" class="form-control" name="accepted_qty" placeholder="Enter Accepted Quantity" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Rejection
                                                         Reason</label>
                                                         <select name="rejection_reason" id="" class="form-control select2">
                                                            <option value="NA">NA</option>
                                                            <%if ($reject_remark) %>
                                                                  <%foreach from=$reject_remark item=r %>
                                                                  <option value="<%$r->name %>">
                                                                     <%$r->name %>
                                                                  </option>
                                                                  <%/foreach%>
                                                            <%/if%>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Reject Remark</label>
                                                         <input type="text"  class="form-control" name="rejection_remark">
                                                         <input type="hidden"  readonly class="form-control" name="id" value="<%$u->id %>">
                                                         <input type="hidden"  readonly class="form-control" name="qty" value="<%$u->onhold_qty %>">
                                                         <input type="hidden"  readonly class="form-control" name="output_part_id" value="<%$u->output_part_id %>">
                                                         <input type="hidden"  readonly class="form-control" name="accepted_qty_old" value="<%$u->accepted_qty %>">
                                                         <input type="hidden"  readonly class="form-control" name="rejected_qty_old" value="<%$u->rejected_qty %>">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save
                                                   changes</button>
                                                </div>
                                          </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td><%$u->status %></td>
                              <td>
                                 <%if ($u->status == "pending") %>
                                 <button type="button" class="btn btn-danger float-left " data-bs-toggle="modal" data-bs-target="#acceptReject<%$i %>">
                                 Accept/Reject </button>
                                 <%else %>
                                    Completed
                                 <%/if%>
                                 <div class="modal fade" id="acceptReject<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="<%base_url('update_p_q') %>" method="POST" enctype='multipart/form-data' >
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Qty</label>
                                                         <input type="text" value="<%$u->qty %>" readonly class="form-control">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Accept Qty <span class="text-danger">*</span>
                                                         </label>
                                                         <input type="number" step="any" value="" max="<%$u->qty %>" min="0" class="form-control" name="accepted_qty" placeholder="Enter Accepted Quantity" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Onhold Qty <span class="text-danger">*</span>
                                                         </label>
                                                         <input type="number" step="any" value="" max="<%$u->qty %>" min="0" class="form-control" name="onhold_qty" placeholder="Enter onhold" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Rejection Reason</label>
                                                         <select name="rejection_reason" id="" class="form-control select2">
                                                            <option value="NA">NA</option>
                                                            <%if ($reject_remark) %>
                                                               <%foreach from=$reject_remark item=r %>
                                                                  <option value="<%$r->name %>">
                                                                     <%$r->name %>
                                                                  </option>
                                                               <%/foreach%>
                                                            <%/if%>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="">Reject Remark</label>
                                                         <input type="text"  class="form-control" name="rejection_remark">
                                                         <input type="hidden"  readonly class="form-control" name="id" value="<%$u->id %>">
                                                         <input type="hidden"  readonly class="form-control" name="qty" value="<%$u->qty %>">
                                                         <input type="hidden"  readonly class="form-control" name="output_part_id" value="<%$u->output_part_id %>">
                                                         <input type="hidden"  readonly class="form-control" name="scrap_factor" value="<%$u->scrap_factor %>">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save
                                                   changes</button>
                                                </div>
                                                </form>
                                          </div>

                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <a class="btn btn-info" href="<%base_url('details_production_qty/') %><%$u->id %>">
                                 View Details</a>
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



  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <script type="text/javascript">
     var ajax_url = <%site_url("SheetProdController/final_inspection_qty_add")|@json_encode%>;
  </script>
  <script>
     $(document).ready(function() {
        // $('.select2').select2();
       $("#AddProdButton").click(function() {
            $.ajax({
                url: ajax_url,
                type: "POST",
                data: {},
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                   if (response) {
                            $('#addPromo .modal-content').html(response);
                            $('#addPromo').modal('show');
                        } else {
                            $('#addPromo .modal-content').html('<p>No data found.</p>');
                            $('#addPromo').modal('show');
                        }
                }
            });
        });
     });

  </script>

  <script src="<%$base_url%>public/js/quality/final_inspection_qa.js"></script>
