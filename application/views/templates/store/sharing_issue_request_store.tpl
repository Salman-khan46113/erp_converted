
<div class="wrapper container-xxl flex-grow-1 container-p-y">
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
        <span>Sharing Issue Request - Pending</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-seconday" href="<%base_url('sharing_issue_request_store_completed') %>"> View Completed Requests</a>
            <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
    </div>
   <section class="content">
      <div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="">
                     <table id="sharing_issue_request_store" class="table  table-striped">
                        <thead>
                           <tr>
                              <!-- <th>Sr No</th> -->
                              <th>Part Number / Description / Thickness / Weight</th>
                              <th>Status</th>
                              <th>Date & Time</th>
                              <th>Actual Store Stock</th>
                              <th>Required Qty</th>
                              <th>Enter Accept Qty</th>
                              <th>Submit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if ($sharing_issue_request) %>
                                  <%assign var='i' value=1 %>
                                  <%foreach from=$sharing_issue_request item=u %>
				                           <tr>
				                              <!--<td><%$i %></td>-->
				                              <td><%$u->part_number %> /
				                                 <%$u->part_description %>/
				                                 <%$u->thickness %>/
				                                 <%$u->weight %>
				                              </td>
				                              <td><%$u->status %></td>
				                              <td><%$u->created_date %> / <%$u->created_time %></td>
				                              <td>
				                                 <%$u->stock %>
				                              </td>
				                              <td><%$u->qty %></td>
				                              <td>
				                                 <%if ((int)$u->qty > (int)$u->stock) %>
				                                        Store Stock Not Available
				                                  <%else %>
						                                <form action="<%base_url('accept_sharing_request') %>" class="accept_sharing_request custom-form" method="post" id="accept_sharing_request<%$i %>">
						                                	<div class="form-group">
						                                		<label style="display: none;">Accept Qty</label>
						                                    <input  name="accepted_qty" data-max="<%$u->qty %>" data-min="0.001" type="text" step="any"  class="form-control onlyNumericInput required-input">
						                                </div>
						                                    <input  name="id" value="<%$u->id %>" min="1" type="hidden" required class="form-control">
						                                    <input  name="child_part_id" value="<%$u->child_part_id %>" type="hidden" required class="form-control">
						                                    <input  name="actual_stock" value="<%$u->stock %>" type="hidden" required class="form-control">
						                                    <input  name="sharing_qty" value="<%$u->sharing_qty %>" type="hidden" required class="form-control">
				                                  <%/if%>
				                              </td>
				                              <td>
				                              <%if ((int)$u->qty > (int)$u->stock) %>
				                              <%else %>
					                              <button type="submit" class="btn btn-danger">Submit</button>
					                              </form>
					                          <%/if%>
				                              </td>
				                              <td>
				                                 <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#exampleModaldelet213123e<%$i %>">
				                                 Delete
				                                 </button>
				                                 <div class="modal fade" id="exampleModaldelet213123e<%$i %>" tabindex="-1" aria-labelledby="" aria-hidden="true">
				                                 <div class="modal-dialog modal-dialog-centered">
				                                    <div class="modal-content">
				                                       <div class="modal-header">
				                                          <h5 class="modal-title" id="exampleModalLabel">Delete
				                                          </h5>
				                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				                                          </button>
				                                       </div>
				                                       <form action="<%base_url('delete') %>" method="POST" class="delete-data">
				                                       <div class="modal-body">
				                                          <div class="row">
				                                             
				                                                <div class="col-lg-12">
				                                                   <div class="form-group">
				                                                      <label for=""> <b>Are You Sure Want To
				                                                      Delete This ? </b> </label>
				                                                      <input type="hidden" name="id" value="<%$u->id %>" required class="form-control">
				                                                      <input type="hidden" name="table_name" value="sharing_issue_request" required class="form-control">
				                                                   </div>
				                                                </div>
				                                          </div>
				                                       </div>
				                                       <div class="modal-footer">
				                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				                                       <button type="submit" class="btn btn-danger">Delete</button>
				                                       </div>
				                                    </div>
				                                    </form>
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
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
<script src="<%$base_url%>public/js/store/sharing_issue_request_store.js"></script>