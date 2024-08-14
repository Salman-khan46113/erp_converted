
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
          <span >UOM</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
        <button type="button" class="btn btn-seconday float-left" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Add UOM">
          <i class="ti ti-plus"></i></button>
        </div>

        <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role=" document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add UOM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </div>
                <form action="javascript:void(0)" class="adduom custom-form " method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="contractorName">UOM Name</label><span class="text-danger">*</span>
                          <input type="text" name="uomName" class="form-control required-input"  placeholder="UOM Name">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="contractorName">UOM Description</label><span class="text-danger">*</span>
                          <input type="text" name="uomDescription" class="form-control required-input"  placeholder="UOM Description">
                          <!-- <textarea name="uomDescription" class="form-control required-input" placeholder="UOM Description"></textarea> -->
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
              <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="uom">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>UOM Name</th>
                    <th>UOM Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <%assign var='i' value=1 %>
                  <%if ($uom)  %>
                  <%foreach from=$uom item=t %>
                  <tr>
                    <td><%$i %></td>
                    <td><%$t->uom_name %></td>
                    <td><%$t->uom_description %></td>
                    <td>
                      <button type="submit" data-bs-toggle="modal" class="btn no-btn btn-primary" data-bs-target="#exampleModal2<%$i %>"> <i class="ti ti-edit"></i></button>
                      <div class="modal fade" id="exampleModal2<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update UOM</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                              </button>
                            </div>
                            <form action="javascript:void(0)" class="updateuom custom-form" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="customer_name">UOM Name</label><span class="text-danger">*</span>
                                      <input value="<%$t->uom_name %>" type="text" name="uuomName"  class="form-control required-input" aria-describedby="emailHelp" placeholder="Customer Name">
                                      <input value="<%$t->id %>" type="hidden" name="id"  class="form-control required-input" aria-describedby="emailHelp" placeholder="Customer Name">
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="contractorName">UOM Description</label><span class="text-danger">*</span>
                                      <textarea name="uomDescription" value="<%$t->uom_description %>"  class="form-control required-input" placeholder="UOM Description"><%$t->uom_description %></textarea>
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
                      <div class="modal fade" id="exampleModal3<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                              </button>
                            </div>
                            <form action="<%base_url('delete') %>" method="POST">
                              <div class="modal-body">
                                <input value="<%$t->id %>" name="id" type="hidden" required class="form-control" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                <input value="uom" name="table_name" type="hidden" required class="form-control" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                Are you sure you want to delete
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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

      <script src="<%$base_url%>public/js/admin/uom.js"></script>
