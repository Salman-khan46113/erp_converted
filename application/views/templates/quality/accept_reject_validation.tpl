
<div class="
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Inward Inspection</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Insert List</li>
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
                 
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>GRN Number </th>
                              <th>GRN Date</th>
                              <th>PO Number</th>
                              <th>Supplier Name </th>
                              <th>Invoice Number</th>
                              <th>Date</th>
                              <th>Status</th>
                              <%if ($isMultiClient == "true") %>
                              <th>Delivery Unit</th>
                              <%/if%>
                              <th>View Details</th>
                           </tr>
                        </thead>
                        
                        <tbody>
                              <%assign var='i' value=1%>
                              <%if ($inwarding_data) %>
                                  <%foreach from=$inwarding_data item=t %>
                                      <%if ($t->status == "validate_grn" || $t->status == "accept") %>
				                           <tr>
				                              <td><%$i %></td>
				                              <td><%$t->grn_number %></td>
				                              <td><%$t->invoice_date %></td>
				                              <td><%$t->po_number %></td>
				                              <td><%$t->supplier_name %></td>
				                              <td><%$t->invoice_number %></td>
				                              <td><%$t->invoice_date %></td>
				                              <td><%$t->status %></td>
				                              <%if ($isMultiClient == "true") %>
				                              <td><%$t->delivery_unit %></td>
				                              <%/if%>
				                              <td><a href="<%base_url('inwarding_details_accept_reject/') %><%$t->id %>/<%$t->po_id %>" 
				                                 class="btn btn-<%if ($t->status == "accept") %>success<%else%>danger <%/if%>" href="">Accept / Reject Details</a></td>
				                           </tr>
		                              <%assign var='i' value=$i+1%>
		                              <%/if%>
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