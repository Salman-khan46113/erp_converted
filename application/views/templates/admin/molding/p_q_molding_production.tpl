<div class="wrapper" >
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Molding Production</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                     <li class="breadcrumb-item active">Molding Production</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
         <div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
               <br>
               <div class="col-lg-12">
                  <!-- Modal -->
                  <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Molding Production Quantity</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <form
                                    action="<%base_url('add_production_qty_molding_production') %>"
                                    method="POST" enctype="multipart/form-data">
                              </div>
                              <div class="form-group">
                              <label for="on click url">Customer Name / Part Number / Part Description<span
                                 class="text-danger">*</span></label>
                              <select required name="customer_part_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <%if ($customer_part_new) %>
                                    <%foreach from=$customer_part_new item=s %>
		                              <option value="<%$s->id %>">
		                              <%$s->customer_name %> / <%$s->part_number %> / <%$s->part_description %>
		                              </option>
		                            <%/foreach%>
                               <%/if%>
                              </select>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Machine<span
                                 class="text-danger">*</span></label>
                              <select required name="machine_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <%if ($machine) %>
                                  <%foreach from=$machine item=s %>
	                              	<option value="<%$s->id %>"><%$s->name %></option>
	                              <%/foreach%>
                               <%/if%>
                              </select>
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Select Customer Part / Mold Name / Cavity<span class="text-danger">*</span></label>
                              <select required name="mold_id" id="" class="form-control select2">
                              <%if ($mold_maintenance) %>
                                    <%foreach from=$mold_maintenance item=s %>
	                              <option value="<%$s->id %>">
	                              <%$s->part_number %>/<%$s->part_description %>/<%$s->mold_name %>/<%$s->no_of_cavity %>
	                              </option>
	                              <%/foreach%>
                               <%/if%>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Date
                              <span class="text-danger">*</span></label>
                              <input max="<%date('Y-m-d') %>" type="date"
                                 value="<%date('Y-m-d') %>" name="date" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label required for="on click url">Shift Type / Name / Start Time /
                              End Time<span class="text-danger">*</span></label>
                              <select name="shift_id" name="" id="" class="form-control select2">
                              <option value="">Select</option>
                              <%if ($shifts) %>
                                    <%foreach from=$shifts item=s %>
		                              <option value="<%$s->id %>">
		                              <%$s->shift_type %> / <%$s->name %> / <%$s->start_time %> / <%$s->end_time %>
		                              </option>
		                            <%/foreach%>
                               <%/if%>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Production OK Quantity<span
                                 class="text-danger">*</span></label>
                              <input type="number" min="1" value="0" name="qty" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Production Rejection<span
                                 class="text-danger">*</span></label>
                              <input type="number" min="0" value="0" name="rejection_qty" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Production Minutes<span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="production_hours" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Downtime in min <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="downtime_in_min" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Setup in min <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="setup_time_in_min" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Finish Part Weight <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="finish_part_weight" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Runner Weight <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="runner_weight" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-group">
                              <label for="on click url">Wastage / Gattha / Lumps (Kg)<span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="wastage" required
                                 class="form-control">
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Cycle Time Per Shot (sec) <span
                                 class="text-danger">*</span></label>
                              <input type="number" step="any" name="cycle_time" required
                                 class="form-control">
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-group">
                              <label for="on click url">Operator<span
                                 class="text-danger">*</span></label>
                              <select required name="operator_id" id="" class="form-control select2">
                              <option value="">Select</option>
                              <%if ($operator) %>
                                    <%foreach from=$operator item=s %>
		                              <option value="<%$s->id %>"><%$s->name %></option>
		                            <%/foreach%>
                              <%/if%>
                              </select>
                              </div>
                              </div>
                              </div>
                              <div class="form-group">
                              <label for="on click url">Remark</label>
                              <input type="text" name="remark" class="form-control">
                              </div>
                           </div>
                           <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"
                              data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                           data-target="#addPromo">
                        Add Molding Production Qty
                        </button>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Job Order No</th>
                                 <th>Part Number / Descriptions </th>
                                 <th>Mold Name</th>
                                 <th>Date</th>
                                 <th>Shift</th>
                                 <th>Machine</th>
                                 <th>Operator</th>
                                 <th>Production OK Qty</th>
                                 <th>Production Rejection Qty</th>
                                 <th>Accepted Qty by Quality</th>
                                 <th>Rejected Qty by Quality</th>
                                 <th>Onhold Qty</th>
                                 <th style="word-wrap: break-word;">Wastage / Gattha / Lumps (Kg)</th>
                                 <th>Status</th>
                                 <th>Production Minutes</th>
                                 <th>Downtime In Min</th>
                                 <!-- <th>Downtime Reason</th> -->
                                 <th>Setup Time In Min</th>
                                 <th>Cycle Time In Sec</th>
                                 <th>Finish Part Weight (gram)</th>
                                 <th>Runner Weight (gram)</th>
                                 <th>Shift Target Qty</th>
                                 <!-- <th>Remark</th> -->
                                 <!-- <th>Accept Reject</th> -->
                                 <th>Rejection Details</th>
                                 <th>Downtime Details</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <%if ($molding_production) %>
                                    <%assign var='i' value=1 %>
                                    <%foreach from=$molding_production item=u %>
		                              <tr>
		                                 <td>JO-<%$u->id %></td>
		                                 <td><%$u->part_number %> /
		                                    <%$u->part_description %>
		                                 </td>
		                                 <td><%$u->mold_name %></td>
		                                 <td><%$u->date %></td>
		                                 <td><%$u->shift_type %>/<%$u->name %>
		                                 </td>
		                                 <td><%$u->machine_name %></td>
		                                 <td><%$u->operator_name %></td>
		                                 <td><%$u->qty %></td>
		                                 <td><%$u->rejection_qty %></td>
		                                 <td><%$u->accepted_qty %></td>
		                                 <td><%$u->rejected_qty %></td>
		                                <td>
		                                    <%if (!empty($u->onhold_qty)) %>
		                                    <button type="button" class="btn btn-warning float-left "
		                                       data-toggle="modal" data-target="#onhold<%$i %>">
		                                    <%$u->onhold_qty %> </button>
		                                    <%else  %>
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
		                                                   action="<%base_url('update_p_q_onhold_molding') %>"
		                                                   method="POST" enctype='multipart/form-data' s>
		                                                   <div class="row">
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Qty</label>
		                                                            <input type="text"
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
		                                                               class="form-control"
		                                                               name="rejection_remark">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="id"
		                                                               value="<%$u->id %>">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="rejection_qty"
		                                                               value="<%$u->rejection_qty %>">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="qty"
		                                                               value="<%$u->onhold_qty %>">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="output_part_id"
		                                                               value="<%$u->output_part_id %>">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="accepted_qty_old"
		                                                               value="<%$u->accepted_qty %>">
		                                                            <input type="hidden"
		                                                               readonly class="form-control"
		                                                               name="rejected_qty_old"
		                                                               value="<%$u->rejected_qty %>">
		                                                            <input type="text"
		                                                               readonly class="form-control"
		                                                               name="customer_part_id"
		                                                               value="<%$u->customer_part_id %>">
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
		                                 <td><%$u->wastage %></td>
		                                 <td><%$u->status %></td>
		                                 <td><%$u->production_hours %></td>
		                                 <td><%$u->downtime_in_min %></td>
		                                 <td><%$u->setup_time_in_min %></td>
		                                 <td><%$u->cycle_time %></td>
		                                 <td><%$u->finish_part_weight %></td>
		                                 <td><%$u->runner_weight %></td>
		                                 <td><%$u->production_target_per_shift %></td>
		                                 <td>
		                                    <a class="btn btn-primary" href="<%base_url('view_rejection_details/') %><%$u->id %>/<%$u->customer_part_id %>/add">
		                                    <i class='far fa-edit'></i>
		                                    </a>
		                                 </td>
		                                 <td>
		                                    <a class="btn btn-primary" href="<%base_url('view_downtime_details/') %><%$u->id %>/<%$u->customer_part_id %>/add">
		                                    <i class='far fa-edit'></i>
		                                    </a>
		                                 </td>
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
		                                                <form
		                                                   action="<%base_url('update_p_q_molding_production') %>"
		                                                   method="POST" enctype='multipart/form-data' s>
		                                                   <div class="row">
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Date</label>
		                                                            <input type="text"
		                                                               value="<%$u->date %>"
		                                                               readonly class="form-control">
		                                                         </div>
		                                                      </div>
		                                                      <div class="col-lg-12">
		                                                         <div class="form-group">
		                                                            <label for="">Shift</label>
		                                                            <br>
		                                                            <span><%$u->shift_type %>/<%$u->name %></span>
		                                                         </div>
		                                                      </div>
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
		                                                         <label for="on click url">Enter Final
		                                                         Inspection Qty<span
		                                                            class="text-danger">*</span></label>
		                                                         <input type="number" min="0" value="0"
		                                                            max="" name="final_inspection_location"
		                                                            required class="form-control">
		                                                      </div>
		                                                   </div>
		                                                   
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="">Reject Remark</label>
		                                                         <input type="text"
		                                                            class="form-control"
		                                                            name="rejection_remark">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="id"
		                                                            value="<%$u->id %>">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="qty"
		                                                            value="<%$u->qty %>">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="customer_part_id"
		                                                            value="<%$u->customer_part_id %>">
		                                                         <input type="hidden"
		                                                            readonly class="form-control"
		                                                            name="accepted_qty_old"
		                                                            value="<%$u->accepted_qty %>">
		                                                         <input type="hidden"
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
				                     <!-- <td></td> -->
				                     </tr>
				                    <%assign var='i' value=$i+1 %>
				                   	<%/foreach%>
                        <%/if%>
                     </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- ./col -->
            </div>
         </div>
         <!-- /.row -->
         <!-- Main row -->
         <!-- /.row (main row) -->
   </div>
   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>