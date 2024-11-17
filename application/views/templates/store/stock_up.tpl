
<div class="wrapper container-xxl flex-grow-1 container-p-y" >
<div class="content-wrapper">
   
   <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Reports
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing">
            <i class="ti ti-chevrons-right"></i>
            <em>Material Requisition</em></a>
        </h1>
        <br>
        <span>Stock Up/Return</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <%if checkGroupAccess("stock_up","add","No")%>
          <button type="button" class="btn btn-seconday float-left" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Add Stock </button>
        <%/if%>
        <%if checkGroupAccess("stock_up","export","No")%>
            <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
          <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <%/if%>
    </div>
   <!-- Main content -->
   <section class="content">
      <div class="">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  
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
                              <form action="<%base_url('add_stock_up') %>" method="POST" enctype='multipart/form-data' id="add_stock_up" class="custom-form">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="po_num">Select Part Number / Description / Stock </label><span class="text-danger">*</span>
                                          <select name="part_id"  id="excel" class="from-control select2 required-input" style="width:100%;">
                                             <%if ($child_part) %>
                                                    <%foreach from=$child_part item=c %>
                                                        <%assign var='stock' value=$c->stock%>
                                                        <%if (empty($stock)) %>
                                                            $stock = "0.00";
                                                        <%/if%>
                                                        <%if ($c->childPartId > 0) %>
			                                             <option value="<%$c->childPartId %>"><%$c->part_number %>/<%$c->part_description %>/<%$stock %></option>
                                                      <%/if%>
		                                            <%/foreach%>
                                             <%/if%>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label for="po_num">Enter Reason <span class="text-danger">*</span></label>
                                          <input type="text" name="reason"  placeholder="Enter Reason" class="form-control required-input">
                                       </div>
                                       <div class="form-group">
                                          <label for="po_num">Upload document</label>
                                          <input type="file" name="uploading_document"  class="form-control">
                                       </div>
                                       <div class="form-group">
                                          <label for="po_num">Enter Qty <span class="text-danger">*</span></label>
                                          <input type="number" name="qty" step="any" placeholder="Enter Qty"  class="form-control required-input">
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
                  <div class="">
                     <table id="stock_up" class="table table-striped">
                        <thead>
                           <tr>
                              <!-- <th>Sr. No.</th> -->
                              <th>Part Number / Description</th>
                              <th>Qty</th>
                              <th>UOM</th>
                              <th>Stock Qty</th>
                              <th>Reason</th>
                              <th>Document</th>
                              <th>Request Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                              <%assign var='i' value=1 %>
                              <%if ($stock_changes) %>
                                  	<%foreach from=$stock_changes item=c  %>
                                       <%if ($c->type == "addition") %>
					                           <tr>
					                              <!-- <td><%$i %></td>-->
					                              <td><%$c->part_number %>/<%$c->part_description %></td>
					                              <td><%$c->qty %></td>
					                              <td><%$c->uom_name %></td>
					                              <td><%$c->stock %></td>
					                              <td><%$c->reason %></td>
					                              <td>
					                                 <%if (!empty($c->uploading_document)) %>
					                                 <a class="btn btn-dark" download href="<%base_url('documents/') %> <%$c->uploading_document %>">Download</a>
					                                <%/if%>
					                              </td>
					                              <td><%$c->created_date %></td>
					                              <td>
					                                 <%if ($c->status == "pending") %>
                                            <%if checkGroupAccess("stock_up","update","No")%>
					                                     <a class="btn btn-warning transfer-stock-value" href="javascript:void(0)" data-href="<%base_url('add_stock/') %><%$c->id %>">Click To Transfer Stock</a>
                                            <%else%>
                                              <%display_no_character("")%>
                                            <%/if%>
					                                 <%else %>
					                                    stock transferred
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
            </div>
         </div>
      </div>
   </section>
</div>
    <script src="<%$base_url%>public/js/store/stock_up.js"></script>
