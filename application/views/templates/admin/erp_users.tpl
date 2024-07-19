<div class="wrapper">
<div class="content-wrapper" >
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>ERP Users</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Part Family</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <br>
            <div class="col-lg-12">
               <!-- Modal -->
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add EPR Users</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<%base_url('add_users_data') %>" method="POST" enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Full Name<span class="text-danger">*</span></label> <br>
                           <input required type="text" name="user_name" placeholder="Enter Full Name" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Email<span class="text-danger">*</span></label> <br>
                           <input required type="email" name="user_email" placeholder="Enter Email" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">User Password<span class="text-danger">*</span></label> <br>
                           <input required type="password" name="user_password" placeholder="Enter Password" class="form-control" value="" id="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Role<span class="text-danger">*</span></label> <br>
                           <select name="user_role" class="form-control" id="">
                           <option value="Admin">Admin</option>
                           <option value="Purchase">Purchase</option>
                           <option value="Approver">Approver</option>
                           <option value="inward_stores">inward stores </option>
                           <option value="stores">stores </option>
                           <option value="production">production</option>
                           <option value="FG_stores">FG stores</option>
                           <option value="Marketing">Marketing</option>
                           <option value="Development">Development</option>
                           <option value="Quality">Quality</option>
                           <option value="Inward_Quality">Inward Quality</option>
                           <option value="Sales">Sales</option>
                           </select>
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
                     Add ERP Users
                     </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Role</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if (true) %>
                                <%assign var='i' value=1 %>
                                <%foreach from=$user_info item=u %>
		                           <tr>
		                              <td><%$i %></td>
		                              <td><%$u->user_name %></td>
		                              <td><%$u->user_email %></td>
		                              <td><%$u->user_password %></td>
		                              <td><%$u->type %></td>
		                              <!-- <td><?php echo $u->user_role ?></td> -->
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