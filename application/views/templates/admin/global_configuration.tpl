<div class="wrapper">
<div class="content-wrapper" >
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Global Configurations</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Configuration</li>
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
            <div class="col-lg">
               <!-- Modal -->
               <div class="modal fade" id="addConfig" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Configuation</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<%base_url('add_new_config') %>" method="POST">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Display Name<span class="text-danger">*</span></label> <br>
                           <input required type="text" name="display_label" required maxlength="100" placeholder="Display Name" class="form-control" value="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Config Name<span class="text-danger">*</span></label> <br>
                           <input required type="text" name="config_name" required maxlength="100" placeholder="Config Name" class="form-control" value="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Config Value<span class="text-danger">*</span></label> <br>
                           <input required type="text" name="config_value" required placeholder="Config Value" class="form-control" value="">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Note<span class="text-danger">*</span></label> <br>
                           <textarea required type="text" name="note" required maxlength="255" placeholder="Note" class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                           <input type="checkbox" name="forAromOnly" checked>
                           <label for="original">For AROM ONLY ?</label><br>
                           </div>
                           <div class="form-group">    
                           <input type="checkbox" name="canCustomerModify">
                           <label for="original">Can User Modify ?</label><br>
                           </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <%if ($isAromAdmin=='true') %>
                  <div class="card-header">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addConfig">
                     Add New Config
                     </button>
                  </div>
                  <%/if%>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Config Name</th>
                              <%if ($isAromAdmin=='true') %>
                              <th>AROM Config Name</th>
                              <%/if%>
                              <th>Config Value</th>
                              <th>Note/Comment</th>
                              <th>Updated time</th>
                              <th>Updated User</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if (true) %>
                                <%assign var='i' value=1 %>
                                <%foreach from=$configurations item=config %>
			                           <tr>
			                              <td><%$config->displayLabel %></td>
			                              <%if ($isAromAdmin=='true') %>
			                              <td><%$config->config_name %></td>
			                              <%/if%>
			                              <td><%$config->config_value %></td>
			                              <td><%$config->note %></td>
			                              <td><%$config->updatedttm %></td>
			                              <td><%$config->updated_user %></td>
			                              <td>
			                                 <%if ($config->canModify) %>
			                                 <button type="button" class="btn btn-primary " title="Update" data-toggle="modal" data-target="#exampleModa<%$i %>l">
			                                 <i class="fa fa-edit"></i>
			                                 </button>
			                                 <%/if%>
			                                 <div class="modal fade" id="exampleModa<%$i %>l" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			                                    <div class="modal-dialog " role="document">
			                                       <div class="modal-content">
			                                          <div class="modal-header">
			                                             <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
			                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                             <span aria-hidden="true">&times;</span>
			                                             </button>
			                                          </div>
			                                          <div class="modal-body">
			                                             <form action="<%base_url('edit_config') %>" method="POST" enctype="multipart/form-data">
			                                                <input type="hidden" name="old_val" value="<%$config->config_value %>">
			                                                <div class="row">
			                                                   <div class="col-lg-12">
			                                                      <div class="form-group">
			                                                         <label for="on click url">Name<span class="text-danger">*</span></label> <br>
			                                                         <input required type="text" name="display_label" maxlength="100" placeholder="Display Name" class="form-control" value="<%$config->displayLabel %>">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="on click url">Config Name<span class="text-danger">*</span></label> <br>
			                                                         <input required type="text" disabled name="config_name" maxlength="100" placeholder="Config Name" class="form-control" value="<%$config->config_name %>">
			                                                         <input type="hidden" name="config_name" value="<%$config->config_name %>" class="form-control">
			                                                         <input type="hidden" name="configID" value="<%$config->id %>" class="form-control">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="on click url">Config Value<span class="text-danger">*</span></label> <br>
			                                                         <%if ($config->config_name == "companyLogo") %>
			                                                         <input required type="file" name="companyLogo" placeholder="Config Value" class="form-control" value="<%$config->config_value %>">
			                                                         <%else%>
			                                                         <input required type="text" name="config_value" placeholder="Config Value" class="form-control" value="<%$config->config_value %>">
			                                                         <%/if%>
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="on click url">Note<span class="text-danger">*</span></label> <br>
			                                                         <textarea required name="note" maxlength="255" placeholder="Note" class="form-control"><%$config->note %></textarea>
			                                                      </div>
			                                                      <%if ($isAromAdmin=='true') %>
			                                                      <div class="form-group">
			                                                         <input type="checkbox" name="forAromOnly" <%if ($config->ARMUserOnly == '1') %>checked<%/if%> >
			                                                         <label for="original">For AROM ONLY ?</label><br>
			                                                      </div>
			                                                      <div class="form-group">    
			                                                         <input type="checkbox" name="canCustomerModify" <%if ($config->canModify == '1') %>checked<%/if%> >
			                                                         <label for="original">Can User Modify ?</label><br>
			                                                      </div>
			                                                      <%else %>
			                                                      <input type="hidden" name="canCustomerModify" value="<%$config->canModify %>" class="form-control">
			                                                      <input type="hidden" name="forAromOnly" value="<%$config->ARMUserOnly %>" class="form-control">
			                                                   </div>
			                                                   <%/if%>
			                                                </div>
			                                                <div class="modal-footer">
			                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                                                   <button type="submit" class="btn btn-primary">Save</button>
			                                                </div>
			                                             </form>
			                                          </div>
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