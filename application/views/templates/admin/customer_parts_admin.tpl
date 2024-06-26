<div class="wrapper" style="width:100%">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Customer Parts</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active">Approval</li>
               </ol>
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
               <!-- /.card -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                     </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form action="<%base_url('customer_parts_admin') %>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-lg-4">
                              <div style="width: 400px;">
                                 <div class="form-group">
                                    <label for="on click url">Select Part Number <span
                                       class="text-danger">*</span></label> <br>
                                    <select name="part_id_selected" class="form-control select2" id="">
                                       	<%foreach from=$child_parts_list_distinct item=c %>
											<option <%if ($part_id_selected === $c->id) %>selected <%/if%>
	                                        value="<%$c->id %>">
	                                            <%$c->part_number %>/<%$c->part_description %>
	                                        </option>
                                        <%/foreach%>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <label for="">&nbsp;</label> <br>
                              <button class="btn btn-secondary">Search </button>
                           </div>
                        </div>
                     </form>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Part Number</th>
                              <th>Part Description</th>
                              <th>FG Stock</th>
                              <%if ($enableStockUpdate=="true") %>
                              <th>Actions</th>
                              <%/if%>
                           </tr>
                        </thead>
                        <tbody>
                           <%assign var='i' value= 1 %>
                            <%if ($child_part) %>
                                <%foreach from=$child_part item=po %>
		                           <tr>
		                              <td><%$i %></td>
		                              <td><%$po->part_number %></td>
		                              <td><%$po->part_description %></td>
		                              <td><%$po->fg_stock %></td>
		                              <%if ($enableStockUpdate =="true") %>
		                              <td>
		                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary"
		                                    data-target="#exampleModal2<%$i %>"> <i
		                                    class="fas fa-edit"></i></button>
		                                 <div class="modal fade" id="exampleModal2<%$i %>" role="dialog"
		                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog modal-lg" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Update
		                                             </h5>
		                                             <button type="button" class="close" data-dismiss="modal"
		                                                aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form
		                                                action="<%base_url('update_customer_parts_master_fg_stock') %>"
		                                                method="POST">
		                                                <div class="row">
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="part_number">Part
		                                                         Number</label><span
		                                                            class="text-danger">*</span>
		                                                         <input readonly type="text"
		                                                            value="<%$po->part_number %>"
		                                                            name="part_number" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Number">
		                                                         <input type="hidden" name="id"
		                                                            value="<%$po->id %>">
		                                                      </div>
		                                                      <div class="form-group">
		                                                         <label for="Client_name">Part
		                                                         Description</label><span
		                                                            class="text-danger">*</span>
		                                                         <input type="text"
		                                                            value="<%$po->part_description  %>"
		                                                            name="part_description" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Description">
		                                                      </div>
		                                                      <div class="form-group">
		                                                         <label
		                                                            for="safty_buffer_stk">Stock</label><span
		                                                            class="text-danger">*</span>
		                                                         <input type="number"
		                                                            step="any"
		                                                            value="<%$po->fg_stock  %>"
		                                                            name="stock" required
		                                                            class="form-control"
		                                                            id="exampleInputEmail1"
		                                                            aria-describedby="emailHelp"
		                                                            placeholder="Part Specification">
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
		                                             </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <%/if%>
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