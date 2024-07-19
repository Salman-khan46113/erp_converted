
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
          <span >View Challan</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
        <button type="button" class="btn btn-primary float-left" title="Add Challan" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + </button>
        <!-- <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button> -->
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                  <form action="<%base_url('generate_challan') %>" method="post">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="Enter Challan Number">Select Supplier <span class="text-danger">*</span> </label>
                              <select class="form-control select2" name="supplier_id" style="width: 100%;" required>
                                 <option value="">Select</option>
                                 <%foreach from=$supplier item=c %>
                                   <option value="<%$c->id %>">
                                      <%$c->supplier_name %>
                                   </option>
                               <%/foreach%>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label>Shipping Address: </label>
                              <div class="row">
                                 <div class="col-lg-4">
                                    <input type="radio" name="ship_addressType" checked value="supplier" onchange="toggleConsigneeSelection()">
                                    <label>Same as Supplier</label><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <input type="radio" name="ship_addressType" value="consignee" onchange="toggleConsigneeSelection()">
                                    <label>Select Consignee Address</label><br>
                                    <select name="consignee" id="consigneeSelect" required disabled  class="form-control">
                                       <option value="">Select</option>
                                       <%foreach from=$consignee_list item=c %>
                                         <option value="<%$c->id %>">
                                            <%$c->consignee_name %> - <%$c->location %>
                                         </option>
                                       <%/foreach%>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Enter Remark </label>
                              <input type="text" placeholder="Enter Remark" value="" name="remark" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Enter Mode Of Transport </label>
                              <input type="text" placeholder="Enter Mode Of Transport" value="" name="mode" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Enter Transporter </label>
                              <input type="text" placeholder="Enter Transporter" value="" name="transpoter" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Enter Vehicle No. </label>
                              <input type="text" placeholder="Enter Vehicle No" value="" name="vechical_number" class="form-control">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Enter L.R No </label>
                              <input type="text" placeholder="Enter L.R No" value="" name="l_r_number" class="form-control">
                           </div>
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

      <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="view_add_challan">
            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th>Challan Number</th>
                  <th>Remark</th>
                  <th>Vehicle Number</th>
                  <th>Mode Of Transport</th>
                  <th>Transporter</th>
                  <th>L.R number</th>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  <th>View Details</th>
               </tr>
            </thead>
            <tbody>
               <%assign var='i' value=1%>
               <%if ($challan) %>
                    <%foreach from=$challan item=c %>
                   <tr>
                      <td><%$i %></td>
                      <td><%$c->challan_number %></td>
                      <td><%$c->remark %></td>
                      <td><%$c->vechical_number %></td>
                      <td><%$c->mode %></td>
                      <td><%$c->transpoter %></td>
                      <td><%$c->l_r_number %></td>
                      <td><%$c->created_date %></td>
                      <td><%$c->supplier_name %></td>
                      <td><%$c->status %></td>
                      <td>
                         <a class="btn btn-primary" href="<%base_url('view_challan_by_id/') %><%$c->id %>"><i class="fas fa-eye"></i></a>
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
  <!-- <style type="text/css">
     .dataTables_scrollHeadInner table,.dataTables_scrollBody table{
        width: 100% !important;
     }
     .dataTables_scrollHeadInner{
            width: 99.1%;
     }
  </style> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <!-- script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script -->
  <!-- <script>
     function toggleConsigneeSelection() {
        var consigneeSelect = document.getElementById("consigneeSelect");
        var shipAddressType = document.querySelector('input[name="ship_addressType"]:checked').value;

        if (shipAddressType === "supplier") {
             consigneeSelect.disabled = true;
             consigneeSelect.style.display = "none";
            // consigneeSelect.value = ''; //change to default value as select.
        } else if (shipAddressType === "consignee") {
            consigneeSelect.disabled = false;
            consigneeSelect.style.display = "block";
        }
     }


     $(document).ready(function() {
        var consigneeSelect = document.getElementById("consigneeSelect");
        consigneeSelect.style.display = "none";
        var customer_id = $("#customer_tracking").val();
     });
  </script> -->
  <script>
      function toggleConsigneeSelection() {
          var shipAddressType = $('input[name="ship_addressType"]:checked').val();
          var consigneeSelect = $('#consigneeSelect');

          if (shipAddressType === "supplier") {
              consigneeSelect.prop('disabled', true);
              consigneeSelect.hide();
              // consigneeSelect.val(''); //change to default value as select.
          } else if (shipAddressType === "consignee") {
              consigneeSelect.prop('disabled', false);
              consigneeSelect.show();
          }
      }

      $(document).ready(function() {
          var consigneeSelect = $('#consigneeSelect');
          consigneeSelect.hide();
          var customer_id = $("#customer_tracking").val();
      });
  </script>


  <script src="<%$base_url%>public/js/store/view_add_challan.js"></script>
