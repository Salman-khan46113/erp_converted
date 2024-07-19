<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Molding Stock Transfer</h1>
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
                           <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<%base_url('add_molding_stock_transfer') %>"
                                 method="POST" enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Customer Part / Molding Production Qty<span
                              class="text-danger">*</span></label>
                           <select required name="customer_part_id" class="form-control select2">
                           <%if ($customer_part) %>
                                <%foreach from=$customer_part item=c %>
	                           <option value="<%$c->id %>">
	                           <%$c->part_number %> / <%$c->part_description %>/<%$c->molding_production_qty %>
	                           </option>
	                           <%/foreach%>
                            <%/if%>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Enter Final Inspection Qty<span
                              class="text-danger">*</span></label>
                           <input type="number" min="0" value="0" max=""
                              name="final_inspection_location" required class="form-control">
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
                     <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addPromo">
                        Add Request
                        </button> -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Part Number / Description</th>
                              <!-- <th>Semi Finished Qty</th>
                                 <th>Deflashing / Assembly Qty</th> -->
                              <th>Final Inspection Qty</th>
                              <th>Status</th>
                              <th>Transfer</th>
                              <th>Date & Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if ($molding_stock_transfer) %>
                                <%assign var='i' value=1 %>
                                <%foreach from=$molding_stock_transfer item=u %>
	                           <tr>
	                              <td><%$i %></td>
	                              <td><%$u->part_number %> /
	                                 <%$u->part_description %>/
	                              </td>
	                              <td><%$u->final_inspection_location %></td>
	                              <td><%$u->status %></td>
	                              <td><%if ($u->status == "pending") %>
	                                 <a class="btn btn-warning"
	                                    href="<%base_url('molding_stock_transfer_click/') %><%$u->id %>">Click
	                                 To
	                                 Transfer Stock</a>
	                                 <%else %>
	                                    Stock Transferred
	                                 <%/if%>
	                              </td>
	                              <td><%$u->created_date %> / <%$u->created_time %></td>
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