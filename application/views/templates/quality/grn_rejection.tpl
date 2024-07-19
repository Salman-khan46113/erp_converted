<div class="wrapper" style="width:100%">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>GRN Rejection</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url()%>">Home</a></li>
                  <li class="breadcrumb-item active">Stock Rejection</li>
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
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Part Number / Description</th>
                              <th>Rejection Reason</th>
                              <th>Supplier</th>
                              <th>Remark</th>
                              <th>Uploaded Debit Note</th>
                              <th>Qty</th>
                              <th>Download Debit Note</th>
                           </tr>
                        </thead>
                        <tbody>
                              <%assign var='i' value=1 %>
                              <%if ($rejection_flow) %>
                                  <%foreach from=$rejection_flow item=c %>
			                           <tr>
			                              <td><%$i %></td>
			                              <td><%$c->part_number %>/<%$c->part_description %></td>
			                              <td><%$c->reason %></td>
			                              <td><%$c->supplier_name %></td>
			                              <td><%$c->remark %></td>
			                              <td>
			                                 <a class="btn btn-dark" download href="<%base_url('documents/') %><%$c->debit_note %>">Download Uploaded Document</a>
			                              </td>
			                              <td><%$c->qty %></td>
			                              <td>
			                                 <%if ($c->status == "approved" || true) %>
				                                 <a class="btn btn-success" href="<%base_url('create_debit_note/') %><%$c->id %>">Download</a>

			                                <%else if ($c->status == "stock_transfered") %>
			                                <% else %>
			                                       
			                                <%/if%>
			                              </td>
			                           </tr>
	                              <%assign var='i' value=$i+1 %>
	                              <%/foreach %>
                              <%/if%>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-header -->
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