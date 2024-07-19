<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Transporter</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Transporter</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Content Header (Page header) -->
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
                     <form action="<%base_url('add_transporter') %>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label for="on click url">Transporter Name <span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="name" placeholder="Enter Transporter" class="form-control" value="" id="">
                              </div>
                              <div class="form-group">
                                 <label for="on click url">Transporter ID<span class="text-danger">*</span></label> <br>
                                 <input required type="text" name="transporter_id" placeholder="Enter Transporter ID" class="form-control" pattern="^([0-9]{2}[0-9A-Z]{13})$" oninvalid="this.setCustomValidity('Please enter a valid Transporter no')" onchange="this.setCustomValidity('')" value="" id="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                     Add Transporter
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Transporter Name</th>
                              <th>Transporter ID</th>
                              <!-- <th>Action</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           		<%assign var='i' value=1 %>
                              <%foreach from=$transporter item=u %>
		                           <tr>
		                              <td><%$i %></td>
		                              <td><%$u->name %></td>
		                              <td><%$u->transporter_id %></td>
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