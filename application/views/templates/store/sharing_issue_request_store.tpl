
<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Sharing Issue Request - Pending</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Assets</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      <div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <a class="btn btn-info" href="<%base_url('sharing_issue_request_store_completed') %>"> View Completed Requests</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
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
				                              <td><%$i %></td>
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
						                                <form action="<%base_url('accept_sharing_request') %>" method="post">
						                                    <input  name="accepted_qty" max="<%$u->qty %>" min="0.001" type="number" step="any" required class="form-control">
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
				                                 <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelet213123e<%$i %>">
				                                 Delete
				                                 </button>
				                              </td>
				                              <div class="modal fade" id="exampleModaldelet213123e<%$i %>" tabindex="-1" aria-labelledby="" aria-hidden="true">
				                                 <div class="modal-dialog">
				                                    <div class="modal-content">
				                                       <div class="modal-header">
				                                          <h5 class="modal-title" id="exampleModalLabel">Delete
				                                          </h5>
				                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                                          <span aria-hidden="true">&times;</span>
				                                          </button>
				                                       </div>
				                                       <div class="modal-body">
				                                          <div class="row">
				                                             <form action="<%base_url('delete') %>" method="POST">
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
				                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                                       <button type="submit" class="btn btn-danger">Delete</button>
				                                       </div>
				                                    </div>
				                                    </form>
				                                 </div>
				                              </div>
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