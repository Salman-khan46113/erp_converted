<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>UOM</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">UOM</li>
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
                     <h3 class="card-title"> </h3>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                     Add UOM</button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role=" document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add UOM</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="<%base_url('adduom') %>" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label for="contractorName">UOM Name</label><span class="text-danger">*</span>
                                             <input type="text" name="uomName" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UOM Name">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label for="contractorName">UOM Description</label><span class="text-danger">*</span>
                                             <textarea name="uomDescription" required class="form-control" placeholder="UOM Description"></textarea>                                                                
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </form>
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
                              <th>UOM Name</th>
                              <th>UOM Description</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<%assign var='i' value=1 %>
                            <%if ($uom)  %>
                                <%foreach from=$uom item=t %>
		                           <tr>
		                              <td><%$i %></td>
		                              <td><%$t->uom_name %></td>
		                              <td><%$t->uom_description %></td>
		                              <td>
		                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<%$i %>"> <i class="fas fa-edit"></i></button>
		                                 <div class="modal fade" id="exampleModal2<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog modal-lg" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Update UOM</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form action="<%base_url('updateuom') %>" method="POST">
		                                                <div class="row">
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="customer_name">UOM Name</label><span class="text-danger">*</span>
		                                                         <input value="<%$t->uom_name %>" type="text" name="uuomName" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
		                                                         <input value="<%$t->id %>" type="hidden" name="id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
		                                                      </div>
		                                                   </div>
		                                                   <div class="col-lg-12">
		                                                      <div class="form-group">
		                                                         <label for="contractorName">UOM Description</label><span class="text-danger">*</span>
		                                                         <textarea name="uomDescription" value="<%$t->uom_description %>" required class="form-control" placeholder="UOM Description"><%$t->uom_description %></textarea>                                                                
		                                                      </div>
		                                                   </div>
		                                                </div>
		                                                <div class="modal-footer">
		                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                                   <button type="submit" class="btn btn-primary">Save changes</button>
		                                                </div>
		                                             </form>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                                 <div class="modal fade" id="exampleModal3<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <form action="<%base_url('delete') %>" method="POST">
		                                             <div class="modal-body">
		                                                <input value="<%$t->id %>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
		                                                <input value="uom" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
		                                                Are you sure you want to delete
		                                             </div>
		                                             <div class="modal-footer">
		                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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