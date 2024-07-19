<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Production Details - Sharing</h1>
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
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <a class="btn btn-dark" href="<%base_url('sharing_p_q')  %>">
                     < Back </a>
                     <hr>
                     <div class="row">
                        <div class="col-lg-2">
                           <label for="">Status</label>
                           <input type="text" readonly value="<%$sharing_p_q[0]->status %>"
                              class="form-control">
                        </div>
                        <div class="col-lg-2">
                           <label for="">Shifts Data</label>
                           <input type="text" readonly value="<%$sharing_p_q[0]->shift_name %>"
                              class="form-control">
                        </div>
                        <div class="col-lg-2">
                           <label for="">Machine Data</label>
                           <input type="text" readonly value="<%$sharing_p_q[0]->machine_name %>" 
                              class="form-control">
                        </div>
                        <div class="col-lg-2">
                           <label for="">Operator Data</label>
                           <input type="text" readonly value="<%$sharing_p_q[0]->op_name %>" 
                              class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="card-header">
                     <form action="<%base_url('add_sharing_p_q_history') %>" method="POST">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label> Select Output Part
                                 </label><span class="text-danger">*</span>
                                 <select class="form-control select2" name="output_part_id"
                                    style="width: 100%;">
                                    <%foreach from=$child_part_list item=c1 %>
                                           <%if ($c1->sub_type != "RM") %>
		                                    <option value="<%$c1->childPartId %>">
		                                       <%$c1->part_number %>/<%$c1->part_description %>
		                                    </option>
		                                   <%/if%>
                                    <%/foreach%>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label for="operation_name">Enter Qty</label><span class="text-danger">*</span>
                                 <input type="number" step="any" min="1" value="1" name="qty"
                                    class="form-control" required id="exampleInputPassword1"
                                    placeholder="Enter Qty ">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="operation_name">Scrap
                                 Quantity (kg)
                                 </label><span class="text-danger">*</span>
                                 <input type="number" step="any" min="0" value="0" name="scrap_factor"
                                    class="form-control" required id="exampleInputPassword1"
                                    placeholder="Operation Name ">
                                 <input type="hidden" name="sharing_p_q_id"
                                    value="<%$sharing_p_q_id %>" class="form-control" required
                                    id="exampleInputPassword1" placeholder="Operation Name ">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label> Select Input Part / sharing qty
                                 </label><span class="text-danger">*</span>
                                 <select class="form-control select2" name="input_part_id"
                                    style="width: 100%;">
                                        <%foreach from=$child_part_list item=c1 %>
                                           	<%if ($c1->sub_type == "RM") %>
		                                    <option value="<%$c1->childPartId %>">
		                                       <%$c1->part_number %>/<%$c1->part_description %> / <%$c1->$sharingQtyColName %>
		                                    </option>
		                                    <%/if%>
                                       	<%/foreach%>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group ml-2 mt-4">
                                 <button type="submit" class="btn btn-info" data-dismiss="modal">Add
                                 </button>
                     </form>
                     </div>
                     </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Output Part Number / Description</th>
                              <th>Input Part Number / Description</th>
                              <th>Scrap</th>
                              <th>Qty</th>
                              <th>Qty In Kg</th>
                              <th>Accepted Qty</th>
                              <th>Rejected Qty</th>
                              <th>Onhold Qty</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
						    <%if ($sharing_p_q_history) %>
						        <%assign var=i value=1 %>
						          <%foreach from=$sharing_p_q_history item=u %>
									<tr>
									      <td><%$i %></td>
									      <td><%$u->output_part_no %> /
									         <%$u->output_part_desc %>
									      </td>
									      <td><%$u->input_part_no %> /
									         <%$u->input_part_desc %>
									      </td>
									      <td><%$u->scrap_factor %></td>
									      <td><%$u->qty %></td>
									      <td><%$u->qty_in_kg %></td>
									      <td><%$u->accepted_qty %></td>
									      <td><%$u->rejected_qty %></td>
									      <td>
									         <%if (!empty($u->onhold_qty)) %>
										         <button type="button" class="btn btn-warning float-left " data-toggle="modal"
										            data-target="#onhold<%$i %>">
										        	 <%$u->onhold_qty %>
										       	 </button>
									         <%else %>
									            0
									         <%/if%>
									         <div class="modal fade" id="onhold<%$i %>" tabindex="-1" role="dialog"
									            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									                     <form action="<%base_url('update_p_q_onhold_sharing') %>"
									                        method="POST" enctype='multipart/form-data' s>
									                        <div class="row">
									                           <div class="col-lg-12">
									                              <div class="form-group">
									                                 <label for="">Qty</label>
									                                 <input type="number" step="any"
									                                    value="<%$u->onhold_qty %>" readonly
									                                    class="form-control">
									                              </div>
									                           </div>
									                           <div class="col-lg-12">
									                              <div class="form-group">
									                                 <label for="">Accept Qty <span
									                                    class="text-danger">*</span>
									                                 </label>
									                                 <input type="number" step="any" value=""
									                                    max="<%$u->onhold_qty %>" min="0"
									                                    class="form-control" name="accepted_qty"
									                                    placeholder="Enter Accepted Quantity" required>
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
											                                    <option value="<%$r->name %>">
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
									                                    class="form-control" name="rejection_remark">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control" name="id"
									                                    value="<%$u->id %>">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control" name="qty"
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
									                           <button type="submit" class="btn btn-primary">Save
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
										         <button type="button" class="btn btn-danger float-left" data-toggle="modal"
										            data-target="#acceptReject<%$i %>">
										         Accept/Reject </button>
										     <%else %>
									             Completed
									          <%/if%>
									         <div class="modal fade" id="acceptReject<%$i %>" tabindex="-1"
									            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									            <div class="modal-dialog modal-lg" role="document">
									               <div class="modal-content">
									                  <div class="modal-header">
									                     <h5 class="modal-title" id="exampleModalLabel">Accept/Reject</h5>
									                     <button type="button" class="close" data-dismiss="modal"
									                        aria-label="Close">
									                     <span aria-hidden="true">&times;</span>
									                     </button>
									                  </div>
									                  <div class="modal-body">
									                     <form action="<%base_url('update_p_q_sharing') %>"
									                        method="POST" enctype='multipart/form-data' s>
									                        <div class="row">
									                           <div class="col-lg-12">
									                              <div class="form-group">
									                                 <label for="">Qty</label>
									                                 <input type="text" value="<%$u->qty %>"
									                                    readonly class="form-control">
									                              </div>
									                           </div>
									                           <div class="col-lg-12">
									                              <div class="form-group">
									                                 <label for="">Accept Qty <span
									                                    class="text-danger">*</span>
									                                 </label>
									                                 <input type="number" value=""
									                                    max=" <%$u->qty %>" min="0"
									                                    class="form-control" name="accepted_qty"
									                                    placeholder="Enter Accepted Quantity" required>
									                              </div>
									                           </div>
									                           <div class="col-lg-12">
									                              <div class="form-group">
									                                 <label for="">Onhold Qty <span
									                                    class="text-danger">*</span>
									                                 </label>
									                                 <input type="number" value=""
									                                    max=" <%$u->qty %>" min="0"
									                                    class="form-control" name="onhold_qty"
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
										                                    <option value="<%$r->name %>">
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
									                                    class="form-control" name="rejection_remark">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control" name="id"
									                                    value="<%$u->id %>">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control" name="qty"
									                                    value="<%$u->qty %>">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control"
									                                    name="output_part_id"
									                                    value="<%$u->output_part_id %>">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control"
									                                    name="input_part_id"
									                                    value="<%$u->input_part_id %>">
									                                 <input type="hidden"
									                                    placeholder="Enter Rejection Remark If any"
									                                    readonly class="form-control" name="    "
									                                    value="<%$u->qty_in_kg %>">
									                              </div>
									                           </div>
									                        </div>
									                        <div class="modal-footer">
									                           <button type="button" class="btn btn-secondary"
									                              data-dismiss="modal">Close</button>
									                           <button type="submit" class="btn btn-primary">Save
									                           changes</button>
									                        </div>
									                  </div>
									                  </form>
									               </div>
									            </div>
									         </div>
									      </td>
									   </tr>
									<%assign var=i value=$i+1 %>
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