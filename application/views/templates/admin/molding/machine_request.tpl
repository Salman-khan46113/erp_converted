<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Material Request</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Material Request</li>
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
               <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Machine Request 
                              <span style="font-style:normal;color:blue;">
                              <%if ($isMultiClient == "true") %> - <%$this->session->userdata['clientUnitName'] %><%/if%></span>
                           </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <form action="<%base_url('add_machine_request') %>" method="POST"
                                 enctype="multipart/form-data">
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Operator<span
                              class="text-danger">*</span></label>
                           <select name="operator_id" required id="" class="form-control select2">
                           	<%if ($operator) %>
                                <%foreach from=$operator item=c %>
		                           <option value="<%$c->id %>"><%$c->name %>
		                           </option>
		                        <%/foreach%>
                            <%/if%>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Machine<span
                              class="text-danger">*</span></label>
                           <select name="machine_id" required id="" class="form-control select2">
                           <%if ($machine) %>
                                <%foreach from=$machine item=c %>
		                           <option value="<%$c->id %>">
		                           <%$c->name %>
		                           </option>
		                        <%/foreach%>
                            <%/if%>
                           </select>
                           </div>
                           <div class="form-group">
                           <label for="on click url">Select Customer/Part Number/Part Description<span
                              class="text-danger">*</span></label>
                           <br><span style="font-style:italic;color:blue;">Note: This is list of parts which are defined in BOM</span>
                           <select name="customer_part_id" required class="form-control select2">
                           <option value="">Select</option>
                           <%if ($customer_part) %>
                                <%foreach from=$customer_part item=c %>
		                           <option value="<%$c->id %>">
		                           <%$c->customer_name %>/<%$c->part_number %>/<%$c->part_description %>
		                           </option>
	                           <%/foreach%>
                            <%/if%>
                           </select>
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
                     <div class="row mb-2">
                        <div class="col-sm-9" style="align:left;">
                           <button type="button" class="btn btn-primary" data-toggle="modal"
                              data-target="#addPromo">
                           Add
                           </button>
                        </div>
                        <div class="col-sm-2">
                           <%if ($showDocRequestDetails=="true") %>
                           Format No: STR-F-02 <br>
                           Rev.Date : 3/3/2017 <br>
                           Rev.No.  : 00
                           <%/if%>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th style="word-wrap;">Request No</th>
                              <th>Machine Mold </th>
                              <th>Operator</th>
                              <th>Customer Part</th>
                              <th>Date & Time</th>
                              <th>Status</th>
                              <th>Details</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if ($machine_request) %>
                                <%assign var='i' value=1 %>
                                <%foreach from=$machine_request item=c %>
                                    <%if ($c->req_parts) %>
                                    	<%assign var='delete' value=false %>
                                    <%else %>
                                        <%assign var='delete' value=true %>
                                    <%/if%>
		                           <tr>
		                              <td>MR-<%$c->id %></td>
		                              <td><%$c->machine_name %></td>
		                              <td><%$c->operator_name %></td>
		                              <td><%$c->part_number %>/<%$c->part_description %></td>
		                              <td><%$c->created_date %>/<%$c->created_time %></td>
		                              <td><%$c->status %></td>
		                              <td>
		                                 <a class="btn btn-info"
		                                    href="<%base_url('machine_request_details/') %><%$c->id %>">View
		                                 Details</a>
		                              </td>
		                              <td>
		                                 <%if ($delete == true) %>
			                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addPromo<%$i %>">
			                                 <i class="fa fa-trash"></i>
			                                 </button>
		                                 <%/if%>
		                                 <div class="modal fade" id="addPromo<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                       <div class="modal-content">
		                                          <div class="modal-header">
		                                             <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
		                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                             <span aria-hidden="true">&times;</span>
		                                             </button>
		                                          </div>
		                                          <div class="modal-body">
		                                             <form action="<%base_url('delete') %>" method="POST" enctype="multipart/form-data">
		                                                <label for="">Are You Sure Want To Delete This ?</label>
		                                                <input type="hidden" value="<%$c->id %>" name="id" class="form-control">
		                                                <input type="hidden" value="machine_request" name="table_name" class="form-control">
		                                          </div>
		                                          <div class="modal-footer">
		                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                          <button type="submit" class="btn btn-danger">Delete </button>
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
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>