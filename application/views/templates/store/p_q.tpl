<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Production Qty</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Production</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      <div>
         <div class="row">
            <br>
            <div class="col-lg-12">
               <!-- Modal -->
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <!-- Modal content will be populated here by AJAX -->
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <button type="button" class="btn btn-primary" id="AddProdButton" data-toggle="modal"
                        data-target="#addPromo">
                     Add Production Qty
                     </button>
                  </div>
                  <div class="card-body">
                     <label style="color:red">Latest 10 records. For past records use </label> <a href="<%base_url('view_p_q') %>" > Production QTY: View </a>
                     <table id="example" class="table table-bordered table-striped">
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
                                <%assign var='i' value=1%>
                                <%foreach from=$p_q item=u %>
				                           <tr>
				                              <td><%$i %></td>
				                              <td><%$u->output_part_data[0]->part_number %> /
				                                 <%$u->output_part_data[0]->part_description %>
				                              </td>
				                              <td><%$u->date %></td>
				                              <td><%$u->shift_type %>/<%$u->shift_name %>
				                              </td>
				                              <td><%$u->machine_name %></td>
				                              <td><%$u->op_name %></td>
				                              <td><%$u->qty %></td>
				                              <td><%$u->scrap_factor %></td>
				                              <td><%$u->accepted_qty %></td>
				                              <td><%$u->rejected_qty %></td>
				                              <td>
				                                 <%if (!empty($u->onhold_qty)) %>
					                                 <button type="button" class="btn btn-warning float-left "
					                                    data-toggle="modal" data-target="#onhold<%$i %>">
					                                 <%$u->onhold_qty %> </button>
				                                 <%else %>
				                                    0
				                                 <%/if%>
				                                 <div class="modal fade" id="onhold<%$i %>" tabindex="-1"
				                                    role="dialog" aria-labelledby="exampleModalLabel"
				                                    aria-hidden="true">
				                                    <div class="modal-dialog modal-lg" role="document">
				                                       <div class="modal-content">
				                                          <div class="modal-header">
				                                             <h5 class="modal-title" id="exampleModalLabel">
				                                                Onhold
				                                                Update 
				                                             </h5>
				                                             <button type="button" class="close" data-dismiss="modal"
				                                                aria-label="Close">
				                                             <span aria-hidden="true">&times;</span>
				                                             </button>
				                                          </div>
				                                          <div class="modal-body">
				                                             <form
				                                                action="<%base_url('update_p_q_onhold') %>"
				                                                method="POST" enctype='multipart/form-data' >
				                                                <div class="row">
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Qty</label>
				                                                         <input type="number" step="any"
				                                                            value="<%$u->onhold_qty %>"
				                                                            readonly class="form-control">
				                                                      </div>
				                                                   </div>
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Accept Qty <span
				                                                            class="text-danger">*</span>
				                                                         </label>
				                                                         <input type="number" step="any" value=""
				                                                            max="<%$u->onhold_qty %>"
				                                                            min="0" class="form-control"
				                                                            name="accepted_qty"
				                                                            placeholder="Enter Accepted Quantity"
				                                                            required>
				                                                      </div>
				                                                   </div>
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Rejection
				                                                         Reason</label>
				                                                         <select name="rejection_reason" id=""
				                                                            class="form-control select2">
				                                                            <option value="NA">NA</option>
				                                                            <%if ($reject_remark) %>
				                                                               	<%foreach from=$reject_remark item=r %>
						                                                            <option
						                                                               value="<%$r->name %>">
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
				                                                         <input type="text"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            class="form-control"
				                                                            name="rejection_remark">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="id"
				                                                            value="<%$u->id %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="qty"
				                                                            value="<%$u->onhold_qty %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="output_part_id"
				                                                            value="<%$u->output_part_id %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="accepted_qty_old"
				                                                            value="<%$u->accepted_qty %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="rejected_qty_old"
				                                                            value="<%$u->rejected_qty %>">
				                                                      </div>
				                                                   </div>
				                                                </div>
				                                                <div class="modal-footer">
				                                                   <button type="button" class="btn btn-secondary"
				                                                      data-dismiss="modal">Close</button>
				                                                   <button type="submit"
				                                                      class="btn btn-primary">Save
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
					                                 <button type="button" class="btn btn-danger float-left "
					                                    data-toggle="modal" data-target="#acceptReject<%$i %>">
					                                 Accept/Reject </button>
					                                 <%else %>
				                                        Completed
				                                    <%/if%>
				                                 <div class="modal fade" id="acceptReject<%$i %>" tabindex="-1"
				                                    role="dialog" aria-labelledby="exampleModalLabel"
				                                    aria-hidden="true">
				                                    <div class="modal-dialog modal-lg" role="document">
				                                       <div class="modal-content">
				                                          <div class="modal-header">
				                                             <h5 class="modal-title" id="exampleModalLabel">Add </h5>
				                                             <button type="button" class="close" data-dismiss="modal"
				                                                aria-label="Close">
				                                             <span aria-hidden="true">&times;</span>
				                                             </button>
				                                          </div>
				                                          <div class="modal-body">
				                                             <form action="<%base_url('update_p_q') %>"
				                                                method="POST" enctype='multipart/form-data' s>
				                                                <div class="row">
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Qty</label>
				                                                         <input type="text"
				                                                            value="<%$u->qty %>"
				                                                            readonly class="form-control">
				                                                      </div>
				                                                   </div>
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Accept Qty <span
				                                                            class="text-danger">*</span>
				                                                         </label>
				                                                         <input type="number" step="any" value=""
				                                                            max="<%$u->qty %>" min="0"
				                                                            class="form-control"
				                                                            name="accepted_qty"
				                                                            placeholder="Enter Accepted Quantity"
				                                                            required>
				                                                      </div>
				                                                   </div>
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Onhold Qty <span
				                                                            class="text-danger">*</span>
				                                                         </label>
				                                                         <input type="number" step="any" value=""
				                                                            max="<%$u->qty %>" min="0"
				                                                            class="form-control"
				                                                            name="onhold_qty"
				                                                            placeholder="Enter onhold" required>
				                                                      </div>
				                                                   </div>
				                                                   <div class="col-lg-12">
				                                                      <div class="form-group">
				                                                         <label for="">Rejection Reason</label>
				                                                         <select name="rejection_reason" id=""
				                                                            class="form-control select2">
				                                                            <option value="NA">NA</option>
				                                                            <%if ($reject_remark) %>
				                                                               
				                                                                <%foreach from=$reject_remark item=r %>
					                                                            <option
					                                                               value="<%$r->name %>">
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
				                                                         <input type="text"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            class="form-control"
				                                                            name="rejection_remark">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="id"
				                                                            value="<%$u->id %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="qty"
				                                                            value="<%$u->qty %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="output_part_id"
				                                                            value="<%$u->output_part_id %>">
				                                                         <input type="hidden"
				                                                            placeholder="Enter Rejection Remark If any"
				                                                            readonly class="form-control"
				                                                            name="scrap_factor"
				                                                            value="<%$u->scrap_factor %>">
				                                                      </div>
				                                                   </div>
				                                                </div>
				                                                <div class="modal-footer">
				                                                   <button type="button" class="btn btn-secondary"
				                                                      data-dismiss="modal">Close</button>
				                                                   <button type="submit"
				                                                      class="btn btn-primary">Save
				                                                   changes</button>
				                                                </div>
				                                          </div>
				                                          </form>
				                                       </div>
				                                    </div>
				                                 </div>
				                              </td>
				                              <td>
				                                 <a class="btn btn-info"
				                                    href="<%base_url('details_production_qty/') %><%$u->id %>">
				                                 View Details</a>
				                              </td>
				                           </tr>
		                        <%assign var='i' value=$i+1%>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	var url = <%site_url("SheetProdController/production_qty_add")|@json_encode%>
</script>

<script>
   $(document).ready(function() {
     $("#AddProdButton").click(function() {
          $.ajax({
              url: url,
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