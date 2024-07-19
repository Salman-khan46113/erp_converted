<div class="wrapper">
<div class="content-wrapper" >
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Operation Data Master</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Operation Data Master</li>
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
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form action="<%base_url('add_operations_data') %>" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label for="on click url">Product <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="product" placeholder="Enter Oproduct" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Process <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="process" placeholder="Enter Process" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Specification Tolerance <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="specification_tolerance" placeholder="Enter" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Evalution <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="evalution" placeholder="Enter" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Size <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="size" placeholder="Enter" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Frequency <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="frequency" placeholder="Enter" class="form-control" value="" id="">
                              </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                     Add Data
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <!-- <th>Operation Name</th> -->
                              <th>Product</th>
                              <th>Process</th>
                              <th>Specification Tolerance</th>
                              <th>Evalution</th>
                              <th>Size</th>
                              <th>Frequency</th>
                           </tr>
                        </thead>
                        <tbody>
                           	<%assign var='i' value=1 %>
                            <%foreach from=$operation_data item=u %>
	                           <tr>
	                              <td><%$i %></td>
	                              <!-- <td><?php echo $u->operation_name ?></td> -->
	                              <td><%$u->product %></td>
	                              <td><%$u->process %></td>
	                              <td><%$u->specification_tolerance %></td>
	                              <td><%$u->evalution %></td>
	                              <td><%$u->size %></td>
	                              <td><%$u->frequency %></td>
	                           </tr>
                           	<%assign var='i' value=$i+1 %>
                            <%/foreach%>
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