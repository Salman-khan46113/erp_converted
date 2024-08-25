
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
          Admin
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Master</em></a>
          </h1>
          <br>
          <span >GST</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
       <%* <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button> *%>
        <button type="button" class="btn btn-seconday float-left" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Add Code">
         <i class="ti ti-plus"></i></button>
      </div>

      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role=" document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add GST</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  </button>
               </div>
               <form action="<%base_url('add_gst') %>" method="POST" id="add_gst">
               <div class="modal-body">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">Enter Tax Code </label><span class="text-danger">*</span>
                              <input type="text" name="code" required class="form-control" placeholder="Enter Tax Code">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">Enter SGST </label><span class="text-danger">*</span>
                              <input type="number" step="any" min="0" max="100" name="sgst" required class="form-control" placeholder="Enter S-GST Value">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">Enter CGST </label><span class="text-danger">*</span>
                              <input type="number" step="any" min="0" max="100" name="cgst" required class="form-control" placeholder="Enter C-GST Value">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">Enter IGST </label><span class="text-danger">*</span>
                              <input type="number" step="any" min="0" max="100" name="igst" required class="form-control" placeholder="Enter I-GST Value">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">Enter TCS </label><span class="text-danger">*</span>
                              <input type="number" step="any" min="0" max="100" name="tcs" required class="form-control" placeholder="Enter TCS Value">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="contractorName">TCS on Taxable amount</label><span class="text-danger">*</span>
                              <select name="tcs_on_tax" id="" class="form-control">
                                 <option value="yes">yes</option>
                                 <option value="no">no</option>
                                 <option value="NA">NA</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>With in State </label><span class="text-danger">*</span>
                           <select class="form-control select2" name="with_in_state" style="width: 100%;">
                              <option <%if ( $s->with_in_state == "yes") %>selected<%/if%> value="yes">Yes</option>
                              <option <%if ( $s->with_in_state == "no") %>selected<%/if%> value="no">No</option>
                           </select>
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
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="gst">
              <thead>
                 <tr>
                    <th>Sr. No.</th>
                    <th>Code</th>
                    <th>S-GST %</th>
                    <th>C-GST %</th>
                    <th>I-GST %</th>
                    <th>TCS %</th>
                    <th>TCS on taxable amount</th>
                    <th>Created Date</th>
                    <th>With In State</th>
                    <th>Actions</th>
                 </tr>
              </thead>
              <tbody>
                 <%assign var='i' value=1 %>
                  <%if ($gst) %>
                      <%foreach from=$gst item=t %>
                     <tr>
                        <td><%$i %></td>
                        <td><%$t->code %></td>
                        <td><%$t->sgst %></td>
                        <td><%$t->cgst %></td>
                        <td><%$t->igst %></td>
                        <td><%$t->tcs %></td>
                        <td><%$t->tcs_on_tax %></td>
                        <td><%$t->created_date %></td>
                        <td><%$t->with_in_state %></td>
                        <td>
                           <!-- Button trigger modal -->
                           <button type="button" class="btn no-btn btn-primary edit-part" data-bs-toggle="modal" data-bs-target="#edit" data-value="<%base64_encode(json_encode($t))%>">
                           <i class="ti ti-edit"></i>
                           </button>
                           <!-- edit Modal -->

                           <!-- edit Modal -->
                           <!-- delete Modal -->
                           <div class="modal fade" id="delete<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="<%base_url('delete_customer') %>" method="POST" enctype="multipart/form-data">
                                          Are You Sure Want To Delete This?
                                          <input required value="<%$u->id %>" type="hidden" class="form-control" name="id">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- delete Modal -->
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

      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

               </button>
            </div>
            <form action="<%base_url('update_gst') %>" method="POST" enctype="multipart/form-data" id="updateGstForm">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-6">
                        <div class="form-group">
                           <label for="contractorName">Enter SGST </label><span class="text-danger">*</span>
                           <input type="number" step="any" value="<%$t->sgst %>" min="0" max="100" name="sgst" required class="form-control" placeholder="Enter S-GST Value">
                        </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="contractorName">Enter CGST </label><span class="text-danger">*</span>
                  <input type="number" step="any" value="<%$t->cgst %>" min="0" max="100" name="cgst" required class="form-control" placeholder="Enter C-GST Value">
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="contractorName">Enter IGST </label><span class="text-danger">*</span>
                  <input type="number" step="any" min="0" value="<%$t->igst %>" max="100" name="igst" required class="form-control" placeholder="Enter I-GST Value">
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="contractorName">Enter TCS </label><span class="text-danger">*</span>
                  <input type="number" step="any" min="0" value="<%$t->tcs %>" max="100" name="tcs" required class="form-control" placeholder="Enter TCS Value">
                  <input type="hidden" value="<%$t->id %>" max="100" name="id" required class="form-control" placeholder="Enter TCS Value">
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="contractorName">TCS On GST</label><span class="text-danger">*</span>
                  <select name="tcs_on_tax" id="" class="form-control">
                  <option value="yes" <%if ($t->tcs == "yes") %>selected<%/if%>>yes</option>
                  <option value="no" <%if ($t->tcs == "no") %>selected<%/if%>>no</option>
                  <option value="no" <%if ($t->tcs == "NA") %>selected<%/if%>>NA</option>
                  </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label>With in State </label><span class="text-danger">*</span>
                  <select class="form-control select2" name="with_in_state" style="width: 100%;">
                  <option <%if ( $t->with_in_state == "yes") %>selected<%/if%> value="yes">Yes</option>
                  <option <%if ( $t->with_in_state == "no") %>selected<%/if%> value="no">No</option>
                  </select>
                  </div>
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


      <div class="content-backdrop fade"></div>
    </div>


    <script type="text/javascript">
    var base_url = <%$base_url|@json_encode%>
    </script>

    <script src="<%$base_url%>public/js/admin/gst.js"></script>
