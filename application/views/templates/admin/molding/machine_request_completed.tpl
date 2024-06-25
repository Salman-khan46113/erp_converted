<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Material Request Report </h1>
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
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form action="<%base_url('machine_request_completed') %>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-lg-2">
                              <div>
                                 <div class="form-group">
                                    <label for="on click url">Status<span class="text-danger"></span></label> <br>
                                    <select name="filter_by_status" class="form-control select2" id="">
                                       <option <%if ($filter_by_status == 'pending' ) %>selected<%/if%> value="pending">Pending</option>
                                       <option <%if ($filter_by_status == 'Completed' ) %>selected<%/if%> value="Completed">Completed</option>

                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-8">
                              <label for="">&nbsp;</label> <br>
                              <button class="btn btn-secondary">Search </button>
                           </div>
                           <div class="col-sm-2">
                              <%if ($showDocRequestDetails=="true") %>
                              Format No: STR-F-02 <br>
                              Rev.Date : 3/3/2017 <br>
                              Rev.No.  : 00
                              <%/if%>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th style="word-wrap;">Request No</th>
                              <th>Machine </th>
                              <th>Operator </th>
                              <th>Customer Part </th>
                              <th>Child Part </th>
                              <th>UOM</th>
                              <th>Requested Qty</th>
                              <th>Issued Qty</th>
                              <th>Status</th>
                              <th>Remark</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if ($machine_request_parts)  %>
                                <%foreach from=$machine_request_parts item=request %>
	                           <tr>
	                              <td>MR-<%$request->id %></td>
	                              <td><%$request->machine_name %>
	                              <td><%$request->operator_name %>
	                              <td><%$request->part_no %>/<%$request->part_description %>
	                              <td><%$request->child_part_no %>/<%$request->child_desc %></td>
	                              <td><%$request->uom_name %></td>
	                              <td><%$request->qty %></td>
	                              <td><%$request->accepted_qty %></td>
	                              <td><%$request->status %></td>
	                              <td><%$request->remark %></td>
	                           </tr>
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