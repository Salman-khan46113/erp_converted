<div class="wrapper">
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Rejection Details</h1>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"> </h3>
                  <div class="row">
                     <div class="col-lg-1">
                        <div class="form-group">
                           <%assign var='base_url' value='p_q_molding_production' %>
                           <%if ($view_page != 'add' ) %>
                           		<%assign var='base_url' value='view_p_q_molding_production' %>
                            <%/if%>
                           <a class="btn btn-dark" href="<%base_url($base_url) %>">< Back </a>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                           Add Rejection</button>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label for="po_num">Customer Name</label>
                           <input type="text" readonly value="<%$customer_part_details[0]->customer_name %>" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="po_num">Part Number</label>
                           <input type="text" readonly value="<%$customer_part_details[0]->part_number %>" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="po_num">Part Description</label>
                           <input type="text" readonly value="<%$customer_part_details[0]->part_description %>" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <label for="date">Date</label>
                           <input type="text" readonly value="<%$molding_prod_details[0]->date %>" required class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-1">
                        <div class="form-group">
                           <label for="po_num">Shift</label><br>
                           <label for="po_num">
                              <%$molding_prod_details[0]->shift_type %>/<%$molding_prod_details[0]->shift_name %>
                        </div>
                     </div>
                     <div class="col-lg-2">
                     <div class="form-group">
                     <label for="po_num">Machine</label>
                     <input type="text" readonly value="<%$molding_prod_details[0]->name %>" required class="form-control">
                     </div>
                     </div>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role=" document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add Rejection</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-12">
                                       <form action="<%base_url('add_rejection_details') %>" method="POST">
                                          <div class="form-group">
                                             <label for="">Rejection Reason<span
                                                class="text-danger">*</span></label>
                                             <select name="rejection_reason" id=""
                                                class="form-control select2" required>
                                                <%foreach from=$reject_remark item=r %>
                                                <option 
                                                   value="<%$r->id %>">
                                                   <%$r->name %>
                                                </option>
                                                <%/foreach%>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Rejection Qty<span
                                                class="text-danger">*</span></label>
                                             <input type="text"
                                                name="rejection_qty" required
                                                value=""
                                                class="form-control">
                                             <input type="hidden"
                                                readonly class="form-control"
                                                name="molding_production_id"
                                                value="<%$molding_production_id %>"
                                                >
                                          </div>
                                          <div class="form-group">
                                             <label for="">Cavity</label>
                                             <input type="text"
                                                name="cavity"
                                                value=""
                                                class="form-control">
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                             <button type="submit" class="btn btn-primary">Save</button>
                                       </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Rejection Reason</th>
                              <th>Rejection Quantity</th>
                              <th>Cavity</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%assign var='i' value=1 %>
                            <%if ($rejection_details) %>
                                <%foreach from=$rejection_details item=r %>
	                           <tr>
	                              <td><%$i %></td>
	                              <td><%$r->name %></td>
	                              <td><%$r->rejection_qty %></td>
	                              <td><%$r->cavity %></td>
	                              <td>
	                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<%$i %>"> <i class="fas fa-edit"></i></button>
	                                 <div class="modal fade" id="exampleModal2<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	                                    <div class="modal-dialog modal-lg" role="document">
	                                       <div class="modal-content">
	                                          <div class="modal-header">
	                                             <h5 class="modal-title" id="exampleModalLabel">Update Rejection</h5>
	                                             <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
	                                             <span aria-hidden="true">&times;</span>
	                                             </button>
	                                          </div>
	                                          <div class="modal-body">
	                                             <form action="<%base_url('update_rejection_details') %>" method="POST">
	                                                <div class="form-group">
	                                                   <label for="">Rejection Reason<span
	                                                      class="text-danger">*</span></label>
	                                                   <select name="rejection_reason" id=""
	                                                      class="form-control select2" required>
	                                                      <%foreach from=$reject_remark item=rr %>
	                                                      <option 
	                                                         value="<%$rr->id %>" 
	                                                         <%if ($r->rejection_reasonKy == $rr->id)
	                                                         %>selected <%/if%> >
	                                                         <%$rr->name %>
	                                                      </option>
	                                                      <%/foreach%>
	                                                   </select>
	                                                </div>
	                                                <div class="form-group">
	                                                   <label for="">Rejection Qty<span
	                                                      class="text-danger">*</span></label>
	                                                   <input type="text"
	                                                      name="rejection_qty"
	                                                      required
	                                                      value="<%$r->rejection_qty %>"
	                                                      class="form-control">
	                                                   <input type="hidden"
	                                                      readonly class="form-control"
	                                                      name="molding_production_id"
	                                                      value="<%$molding_production_id %>">
	                                                   <input type="hidden"
	                                                      readonly class="form-control"
	                                                      name="id"
	                                                      value="<%$r->id %>">
	                                                </div>
	                                                <div class="form-group">
	                                                   <label for="">Cavity</label>
	                                                   <input type="text"
	                                                      name="cavity"
	                                                      value="<%$r->cavity %>"
	                                                      class="form-control">
	                                                </div>
	                                                <div class="modal-footer">
	                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	                                                   <button type="submit" class="btn btn-primary">Save changes</button>
	                                                </div>
	                                             </form>
	                                          </div>
	                                       </div>
	                                    </div>
	                                 </div>
	                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal3<%$i %>"> <i class="far fa-trash-alt"></i></button>
	                                 <!-- Button trigger modal -->
	                                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	                                    Launch demo modal
	                                    </button> -->
	                                 <!-- Modal -->
	                                 <div class="modal fade" id="exampleModal3<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	                                    <div class="modal-dialog" role="document">
	                                       <div class="modal-content">
	                                          <div class="modal-header">
	                                             <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
	                                             <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
	                                             <span aria-hidden="true">&times;</span>
	                                             </button>
	                                          </div>
	                                          <form action="<%base_url('delete') %>" method="POST">
	                                             <div class="modal-body">
	                                                <input value="<%$r->id %>" name="id" type="hidden" required class="form-control">
	                                                <input value="mold_production_rejection_details" name="table_name" type="hidden" required class="form-control">
	                                                Are you sure you want to delete
	                                             </div>
	                                             <div class="modal-footer">
	                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	                                                <button type="submit" class="btn btn-danger">Delete </button>
	                                             </div>
	                                          </form>
	                                       </div>
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
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->