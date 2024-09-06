
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
                <select name="part_id_selected" class="form-control select2" id="part_id_selected">
                <%foreach from=$part_select_list item=c %>
                <option
                   <%if ($part_id_selected === $c->id) %>selected <%/if%>
                   value="<%$c->part_number%>"><%$c->part_number %>/<%$c->part_description %>
                </option>
                <%/foreach%>
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
          Admin
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Approval</em></a>
          </h1>
          <br>
          <span >Item Master</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>

      </div>


      <div class="w-100">
            <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
        </div>
      <!-- Main content -->
      <div class="card p-0 mt-4 w-100">
        <div class="">
          <div class="table-responsive text-nowrap">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped " style="border-collapse: collapse;" border-color="#e1e1e1" id="child_parts">
              <thead>
                 <tr>
                    <!--<th>Sr. No.</th> -->
                    <th>Part Number</th>
                    <th>Part Description</th>
                    <th>Stock</th>
                    <%if ($enableStockUpdate == "true") %>
                    <th>Actions</th>
                    <%/if%>
                 </tr>
              </thead>
              <tbody>
                 <%assign var='i' value=1 %>
                  <%if ($child_part) %>
                      <%foreach from=$child_part item=po %>
                     <tr>
                        <!-- <td><%$i %></td> -->
                        <td><%$po->part_number %></td>
                        <td><%$po->part_description %></td>
                        <td><%$po->stock %></td>
                        <%if ($enableStockUpdate == "true") %>
                        <td>
                           <button type="submit" data-bs-toggle="modal" class="btn no-btn btn-primary"
                              data-bs-target="#exampleModal2<%$i %>"> <i class="ti ti-edit"></i></button>
                           <div class="modal fade" id="exampleModal2<%$i %>" role="dialog"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       <form
                                          action="<%base_url('update_child_stock') %>"
                                          method="POST">
                                          <div class="row">
                                             <div class="col-lg-12">
                                                <div class="form-group">
                                                   <label for="part_number">Part
                                                   Number</label><span
                                                      class="text-danger">*</span>
                                                   <input readonly type="text"
                                                      value="<%$po->part_number %>"
                                                      name="part_number" required
                                                      class="form-control"
                                                      id="exampleInputEmail1"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Part Number">
                                                   <input type="hidden" name="id"
                                                      value="<%$po->id %>">
                                                </div>
                                                <div class="form-group">
                                                   <label for="Client_name">Part
                                                   Description</label><span
                                                      class="text-danger">*</span>
                                                   <input type="text"
                                                      value="<%$po->part_description  %>"
                                                      name="part_description" required
                                                      class="form-control"
                                                      id="exampleInputEmail1"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Part Description">
                                                </div>
                                                <div class="form-group">
                                                   <label for="safty_buffer_stk"> Stock</label><span
                                                      class="text-danger">*</span>
                                                   <input type="number" step="any"
                                                      value="<%$po->stock  %>"
                                                      name="stock" required
                                                      class="form-control"
                                                      id="exampleInputEmail1"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Part Specification">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                             <button type="submit"
                                                class="btn btn-primary">Save
                                             changes</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <%/if%>
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

    <script src="<%$base_url%>public/js/admin/child_parts.js"></script>
