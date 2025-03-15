
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
          Production
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >View Material Request
               </em></a>
          </h1>
          <br>
          <span >MR-<%$machine_request_id %>  &nbsp;&nbsp;&nbsp;(<%$part_name%>) &nbsp;&nbsp;&nbsp;SO Qty: <%$machine_request[0]->qty%></span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>


        <!-- <%if ($machine_request_parts==null || $machine_request_parts[0]->request_status == 'pending')  %> -->

             <button type="button" class="btn btn-seconday" data-bs-toggle="modal"
                data-bs-target="#addChildPart">
             <i class="ti ti-plus"></i>
             </button>

        <!-- <%/if%> -->
        <a class="btn btn-seconday" href="<%base_url('machine_request') %>"><i class="ti ti-arrow-left"></i></a>


      </div>

      <div class="modal fade" id="addChildPart" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Child Part</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  </button>
               </div>
               <form action="<%base_url('add_machine_request_details') %>"
               method="POST" enctype="multipart/form-data" id="add_machine_request_details" class="add_machine_request_details custom-form">
               <div class="modal-body">
                  <div class="form-group">
                    
                  </div>
                  <div class="form-group">
                  <label for="on click url">Select Child Part<span
                     class="text-danger">*</span></label>
                  <select name="child_part_id"  id="" class="form-control select2 required-input">
                  <option value="">Select</option>
                  <%if ($child_part) %>
                       <%foreach from=$child_part item=c %>
                      <option value="<%$c->id %>">
                      <%$c->part_number %>/<%$c->part_description %>
                      </option>
                    <%/foreach%>
                   <%/if%>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="on click url">Enter Qty <span
                     class="text-danger">*</span></label>
                  <input type="text" step="any"  placeholder="Enter Qty"
                     class="form-control onlyNumericInput  required-input" name="qty">
                  <input type="hidden" value="<%$machine_request_id %>"
                     step="any" name="machine_request_id" required placeholder="Enter Qty"
                     class="form-control">
                  </div>
                  <div class="form-group">
                  <label for="on click url">Enter Remark</label>
                  <input type="text" step="any" placeholder="Enter Remark"
                     class="form-control" name="remark">
                  </div>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
               </form>
               </div>
            </div>
         </div>
      </div>
        <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="col-sm-2">
           <%if ($showDocRequestDetails=="true") %>
           Format No: STR-F-02 <br>
           Rev.Date : 3/3/2017 <br>
           Rev.No.  : 00
           <%/if%>
        </div>
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="machine_request_details">
            <thead>
               <tr>
                  <th width="1%" class="text-center">Sr No</th>
                  <th width="15%">Purchase Item </th>
                  <th width="5%" class="text-center">UOM</th>
                  <th width="5%" class="text-center">BOM Qty</th>
                  <th width="8%">Required Qty</th>
                  <th width="5%" class="text-center">Store Stock</th>
                  <th width="5%" class="text-center">Production Stock</th>
                  <th width="12%">Issued Qty</th>
                  <th width="12%">Remark</th>
                  <th width="5%" class="text-center">Action</th>
                  <th width="5%" class="text-center">Status</th>
               </tr>
            </thead>
            <tbody>
               <%if ($machine_request_parts_arr) %>
                    <%assign var='i' value= 1 %>
                    <%foreach from=$machine_request_parts_arr item=req %>
                   <tr>
                      <td class="text-center"><%$i %></td>
                      <td><%$req->part_number %>/<%$req->part_description %></td>
                      <td class="text-center"><%$req->uom_name %></td>
                      <td class="text-center"><%$req->bom_qty %></td>
                      <td><%$req->qty %></td>
                      <td class="text-center"><%$req->stock %></td>
                      <td class="text-center"><%$req->machine_mold_issue_stock %></td>
                      <td>
                         <%if ($req->status == "pending") %>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addPromo<%$i %>">
                         Issue Qty
                         </button>
                         <%else if ($req->status == "") %>
                         <form
                         action="<%base_url('issue_material_request_qty') %>"
                         method="POST" enctype="multipart/form-data" id="issue_material_request_qty<%$i %>" class="issue_material_request_qty<%$i %> issue_material_request_qty custom-form">
                         <div class="form-group">
                         <label for="on click url" style="display: none;">Accept Qty</label>
                         <input  type="text" name="accepted_qty"
                         placeholder="Accept Qty"
                         class="form-control required-input onlyNumericInput" data-min="1"
                         data-max="<%$req->stock %>" data-req="<%$req->stock %>" value="" id="">
                         </div>
                      <input type="hidden" value="<%$machine_request_id %>"
                         name="machine_request_id" required
                         class="form-control">
                      <input required type="hidden" name="qty"
                         placeholder="Enter Accept Qty"
                         class="form-control" min="1"
                         value="<%$req->qty %>">
                      <input required type="hidden" name="id"
                         placeholder="Enter Accept Qty"
                         class="form-control"
                         value="<%$req->id %>" id="">
                      <input required type="hidden" name="part_number"
                       placeholder="Enter Accept Qty"
                       class="form-control"
                       value="<%$req->part_number %>"
                       id="">
                         <%else %>
                            <%$req->accepted_qty%>
                         <%/if%>
                         
                      </td>
                      <td class="text-center">
                      <%if ($req->status != "Completed") %>
                        <input  type="text" name="remark"
                        placeholder="Enter Remark"
                        class="form-control"
                        value="<%$req->remark %>" />
                      <%else%>
                      <%$req->remark %>
                      <%/if%>
                      </td>
                      <td class="text-center">
                      <%if ($req->status != "Completed") %>
                        <button type="submit" class="btn btn-primary" >
                          Submit
                        </button>
                        </form>
                        <%else%>
                        <%display_no_character("")%>
                      <%/if%>
                      </td>
                      <td class="text-center">
                      <%if ($req->status != "Completed") %>
                        Pending
                      <%else%>
                      <%$req->status %>
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




  <script src="<%base_url()%>public/js/production/machine_request_details.js"></script>
