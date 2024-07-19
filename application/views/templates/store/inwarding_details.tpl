<%assign var='isMultiClient' value=$session_data['isMultipleClientUnits']%>

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
          <span >Inwarding Details</span>
        </div>
      </nav>
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> -->

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
        <a class="btn btn-dark mt-4"
           href="<%base_url('inwarding_invoice/') %><%$new_po_id %>">
        Back </a>
      </div>



      <!-- Main content -->
      <div class="card p-0 mt-4">
           <div class="container">
              <div class="row">
                 <div class="col-12">
                    <!-- /.card -->

                       <div class="card-header">
                          <div class="row">
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">GRN Number</label>
                                   <input type="text" readonly value="<%if ($status == 'verifed') %><%$inwarding_data[0]->grn_number %><%else %><%/if%>" class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">PO Number</label>
                                   <input type="text" readonly value="<%$new_po[0]->po_number %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">PO Date</label>
                                   <input type="text" readonly value="<%$new_po[0]->po_date %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">PO Status</label>
                                   <input type="text" readonly value="<%if ($new_po[0]->status == 'accpet') %>Released
                                    <%else %><%$new_po[0]->status%><%/if%>" class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Supplier Name</label>
                                   <input type="text" readonly
                                      value="<%$supplier[0]->supplier_name %>" class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Supplier Number</label>
                                   <input type="text" readonly
                                      value="<%$supplier[0]->supplier_number %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Supplier GST</label>
                                   <input type="text" readonly value="<%$supplier[0]->gst_number %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Inwarding Status</label>
                                   <input type="text" readonly
                                      value="<%$inwarding_data[0]->status %>" class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Invoice Number</label>
                                   <input type="text" readonly
                                      value="<%$inwarding_data[0]->invoice_number %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Invoice Amount</label>
                                   <input type="text" readonly
                                      value="<%$inwarding_data[0]->invoice_amount %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Software Calculated Amount</label>
                                   <input type="text" readonly value="<%$actual_price %>"
                                      class="form-control">
                                </div>
                             </div>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Invoice Amount Validation Status</label>
                                   <input type="text" readonly value="<%$status %>"
                                      class="form-control">
                                </div>
                             </div>
                             <%if ($isMultiClient == "true") %>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <label for="">Delivery Location</label>
                                   <input type="label" readonly value="<%$inwarding_data[0]->delivery_unit %>"
                                      class="form-control">
                                </div>
                             </div>
                             <%/if%>
                             <div class="col-lg-3">
                                <div class="form-group">
                                   <!-- <a class="btn btn-dark mt-4"
                                      href="<%base_url('inwarding_invoice/') %><%$new_po_id %>">
                                   < Back </a> &nbsp; -->
                                   <%if ($status == "not-verifed") %>
        	                           <button type="button" class="btn btn-primary mt-4" data-bstoggle="modal"
        	                              data-bstarget="#exampleModalmatch">
        	                           Match Invoice Amount </button>
                                   <%/if%>

                                    <%if ($inwarding_data[0]->status == "accepted") %>
                                      	<button class='btn btn-primary mt-4' disabled>Inwarding Already Accepted</button>
                                    <%else if ($status == "verifed") %>
                                          <%if ($inwarding_data[0]->status == "pending" || $inwarding_data[0]->status == "") %>
        			                           <button type="button" class="btn btn-danger mt-4" data-bstoggle="modal"
        			                              data-bstarget="#exampleModalgenerate">
        			                           Generate GRN </button>
        			                       <%/if%>
                                   <%/if%>
                                   <!-- Modal -->
                                   <div class="modal fade" id="exampleModalmatch" tabindex="-1" role="dialog"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                                         <div class="modal-content">
                                            <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Match Price.
                                               </h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                  aria-label="Close">

                                               </button>
                                            </div>
                                            <div class="modal-body">
                                               <form
                                                  action="<%base_url('validate_invoice_amount') %>"
                                                  method="POST">
                                                  <div class="row">
                                                     <div class="col-lg-12">
                                                        <div class="form-group">
                                                           <label> Invoice Amount </label><span
                                                              class="text-danger">*</span>
                                                           <input type="number" step="any"
                                                              name="invoice_amount"
                                                              placeholder="Invoice Amount"
                                                              value="" class="form-control">
                                                           <input type="hidden" name="inwarding_id"
                                                              value="<%$inwarding_id %>"
                                                              class="form-control">
                                                           <input type="hidden" name="actual_price"
                                                              value="<%$actual_price %>"
                                                              class="form-control">
                                                           <input type="hidden" name="minus_price"
                                                              value="<%$minus_price %>"
                                                              class="form-control">
                                                           <input type="hidden" name="plus_price"
                                                              value="<%$plus_price %>"
                                                              class="form-control">
                                                           <input type="hidden" name="actual_price"
                                                              value="<%$status %>"
                                                              class="form-control">
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Save
                                                     Changes</button>
                                                  </div>
                                               </form>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="modal fade" id="exampleModalgenerate" tabindex="-1"
                                      role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog " role="document">
                                         <div class="modal-content">
                                            <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Generate GRN
                                               </h5>
                                               <button type="button" class="close" data-bs-dismiss="modal"
                                                  aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                               </button>
                                            </div>
                                            <div class="modal-body">
                                               <form
                                                  action="<%base_url('generate_grn') %>"
                                                  method="POST">
                                                  <div class="row">
                                                     <div class="col-lg-12">
                                                        <div class="form-group">
                                                           <label> Are You Sure Want To Generate GRN ?
                                                           </label>
                                                           <input type="hidden" name="status"
                                                              placeholder="" value="generate_grn"
                                                              class="form-control">
                                                           <input type="hidden" name="inwarding_id"
                                                              value="<%$inwarding_id %>"
                                                              class="form-control">
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Save
                                                     Changes</button>
                                                  </div>
                                               </form>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="card-body">
                          <table class="table table-bordered table-striped" id="example1">
                             <thead>
                                <tr>
                                   <th>Sr No</th>
                                   <th>Part Number</th>
                                   <th>Part Description</th>
                                   <th>UOM</th>
                                   <th>PO QTY</th>
                                   <th>Balance QTY</th>
                                   <th>Price</th>
                                   <th>Inwarding Qty</th>
                                   <th>Action </th>
                                </tr>
                             </thead>
                             <tbody>
                               	<%if ($po_parts) %>
                                       <%assign var="i" value=1%>
                             		   <%assign var="final_po_amount" value=0%>
                                       <%foreach from=$po_parts item=p %>

                                           <%* //It will  select all matching child part master as we have multiple child part master for single child part id *%>
                                           <%assign var="child_part_data" value=$p->child_part_data%>
                                           <%*// $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id"); *%>
                                   		   <%assign var="uom_data" value=$p->uom_data%>
                                   		   <%assign var="part_rate_new" value=0%>
                                           <%if (empty($p->rate)) %>
                                           		<%assign var="part_rate_new" value=$child_part_data[0]->part_rate%>
                                           <%else %>
                                           		<%assign var="part_rate_new" value=$p->rate%>
                                           <%/if%>

                                           <%*//here we are only geting rate of only one from above list *%>
                                           <%assign var="total_rate" value=$part_rate_new * $p->qty%>
                                           <%assign var="final_po_amount" value=$final_po_amount + $total_rate%>
                                   		   <%assign var="grn_details_data" value=$p->grn_details_data%>
                                   		   <%assign var="data_present" value='no'%>
                                           <%if ($grn_details_data) %>
                                           		<%assign var="data_present" value='yes'%>
                                           <%else %>
                                           		<%assign var="data_present" value='no'%>
                                           <%/if%>
                                           <%assign var="subcon_po_inwarding_master" value=$p->subcon_po_inwarding_master%>
                                           <%if (empty($new_po[0]->process_id)) %>
                                <tr>
                                   <td><%$p->id %></td>
                                   <td><%$child_part_data[0]->part_number %></td>
                                   <td><%$child_part_data[0]->part_description %></td>
                                   <td><%$uom_data[0]->uom_name %></td>
                                   <td><%$p->qty %></td>
                                   <td><%$p->pending_qty %></td>
                                   <td><%$part_rate_new %></td>
                                   <td>
                                      <%if ($inwarding_data[0]->status == "accepted") %>
                                            <%$grn_details_data[0]->qty %>
                                       <%else if ($data_present == "yes") %>
                                            <%$grn_details_data[0]->qty %>
                                       <%else if ($inwarding_data[0]->status == "generate_grn") %>
                                            NA
                                       <%else%>
                                      <form action="<%base_url('add_grn_qty') %>" method="post">
                                         <input type="number" required step="any"
                                            max="<%$p->pending_qty %>"
                                            placeholder="Inwarding Qty"
                                            name="qty"
                                            class="form-control">
                                         <input type="hidden" name="inwarding_id"
                                            value="<%$inwarding_id  %>" class="form-control">
                                         <input type="hidden"
                                            name="new_po_id" value="<%$new_po_id %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="part_id" value="<%$p->part_id %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="invoice_number"
                                            value="<%$inwarding_data[0]->invoice_number %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="grn_number"
                                            value="<%$inwarding_data[0]->grn_number %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="po_part_id" value="<%$p->id %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="pending_qty" value="<%$p->pending_qty %>"
                                            class="form-control">
                                         <input type="hidden"
                                            name="part_rate" value="<%$part_rate_new %>"
                                            class="form-control">
                                         <input type="hidden"  name="tax_id"
                                            value="<%$p->tax_id %>" class="form-control">
                                         <input type="hidden" name="invoice_number"
                                            value="<%$invoice_number %>" class="form-control">
                                        <%/if%>
                                   </td>
                                   <td>
                                   <%if ($data_present == "yes" && $status != "verifed") %>
                                   <button type="button" class="btn btn-primary " title="Update" data-bs-toggle="modal" data-bs-target="#exampleModa<%$i %>l">
                                   <i class="fa fa-edit"></i>
                                   </button>
                                   <div class="modal fade" id="exampleModa<%$i %>l" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog " role="document">
                                   <div class="modal-content">
                                   <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                   </button>
                                   </div>
                                   <div class="modal-body">
                                   <form action="<%base_url('edit_grn_qty') %>" method="POST">
                                   <div class="row">
                                   <div class="col-lg-12">
                                   <div class="form-group">
                                   <label> Inwarding Qty </label><span class="text-danger">*</span>
                                   <input type="number" required step="any"
                                      max="<%$p->pending_qty %>"
                                      name="qty"
                                      value="<%$grn_details_data[0]->qty %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="inwarding_id"
                                      value="<%$inwarding_id %>" class="form-control">
                                   <input type="hidden"
                                      name="new_po_id" value="<%$new_po_id %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="part_id" value="<%$p->part_id %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="invoice_number"
                                      value="<%$inwarding_data[0]->invoice_number %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="grn_number"
                                      value="<%$inwarding_data[0]->grn_number %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="po_part_id" value="<%$p->id %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="part_rate" value="<%$part_rate_new %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="pending_qty" value="<%$p->pending_qty %>"
                                      class="form-control">
                                   <input type="hidden"
                                      name="tax_id"
                                      value="<%$p->tax_id %>" class="form-control">
                                   </div>
                                   <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Save</button>
                                   </div>
                                   </form>
                                   </div>
                                   </div>
                                   </div>
                                   </div>
                                   <%else if ($status == "not-verifed") %>
                                   <button type="submit" class="btn btn-info">Submit</button>
                                   </form>
                                   <%/if%>
                                   </td>
                                </tr>
                                <%else %>
                                <tr>
        	                        <td><%$i %></td>
        	                        <td><%$child_part_data[0]->part_number %></td>
        	                        <td><%$child_part_data[0]->part_description %></td>
        	                        <td><%$uom_data[0]->uom_name %></td>
        	                        <td><%$p->qty %></td>
        	                        <td><%$p->pending_qty %></td>
        	                        <td><%$part_rate_new %></td>
        	                        <td>
        	                        <%if ($inwarding_data[0]->status == "accepted") %>
        	                               <%$grn_details_data[0]->qty %>
        	                        <%else if ($data_present == "yes") %>
        	                               <%$grn_details_data[0]->qty %>
        	                        <%else %>
        	                        <%if (empty($subcon_po_inwarding_master[0]->inwarding_qty)) %>
        	                        <form action="<%base_url('add_grn_qty_subcon_view') %>"
        	                           method="post">
        	                        <input type="number" required step="any"
        	                           max="<%$p->pending_qty %>"
        	                           placeholder="Inwarding Qty" name="qty"
        	                           class="form-control">
        	                        <input type="hidden" name="inwarding_id"
        	                           value="<%$inwarding_id %>" class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="new_po_id" value="<%$new_po_id %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="part_id_new"
        	                           value="<%$child_part_data[0]->child_part_id %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="part_id" value="<%$p->part_id %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="number invoice"
        	                           name="invoice_number"
        	                           value="<%$inwarding_data[0]->invoice_number %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="grn_number"
        	                           value="<%$inwarding_data[0]->grn_number %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="po_part_id" value="<%$p->id %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="pending_qty" value="<%$p->pending_qty %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty"
        	                           name="part_rate" value="<%$part_rate_new %>"
        	                           class="form-control">
        	                        <input type="hidden" placeholder="Inwarding Qty" name="tax_id"
        	                           value="<%$p->tax_id %>" class="form-control">
        	                        <%else %>
        	                               <%$subcon_po_inwarding_master[0]->inwarding_qty %>
        	                        <%/if%>
        	                        <%/if%>
        	                        </td>
        	                        <td>
        	                        <%if ($subcon_po_inwarding_master) %>
        	                        <a class="btn btn-info"
        	                           href="<%base_url('grn_subcon_view/') %><%$p->part_id %>/<%$new_po_id %>/<%$inwarding_data[0]->id %>/<%$p->part_id %>"><i class="fas fa-eye"></i></a>
        	                        <%else if ($data_present == "yes") %>

        	                        <%else if ($status == "not-verifed") %>
        		                        <button type="submit" class="btn btn-info">Submit</button>
        		                        </form>
        	                        <%/if%>
        	                        </td>
                                </tr>
                                <%/if%>
                                <%assign var='i' value=$i+1%>
                                   <%/foreach%>
                                <%/if%>

                             </tbody>
                          </table>
                          </div>
                          </div>
                          <!-- /.card-body -->
                       </div>
                       <!-- /.card -->
                    </div>
                    <!-- /.col -->
                 </div>
                 <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
      <!--/ Responsive Table -->
    </div>
    </div>

    <!-- /.col -->


    <div class="content-backdrop fade"></div>
  </div>




  <script src="<%$base_url%>public/js/store/view_supplier_challan.js"></script>
