<%assign var='isMultiClient' value=$session_data['isMultipleClientUnits'] %>
<div class="wrapper">
<!-- Navbar -->
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>GRN Validation</h1>
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
                  <div class="card-header">
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="<%base_url('add_invoice_number') %>" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label for="tool_number">Invoice Number </label><span class="text-danger">*</span>
                                             <input type="text" name="invoice_number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                                             <input type="hidden" name="new_po_id" value="<%$new_po_id %>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                                          </div>
                                          <div class="form-group">
                                             <label for="tool_number">Invoice Date </label><span class="text-danger">*</span>
                                             <input type="date" name="invoice_date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
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
                              <th>Sr No</th>
                              <th>PO Number</th>
                              <th>Supplier Name </th>
                              <th>Invoice Number</th>
                              <th>Invoice Date</th>
                              <th>GRN  Number </th>
                              <th>GRN  Date </th>
                              <%if ($isMultiClient == "true") %>
                                 <th>Delivery Unit</th>
                              <%/if%>    
                              <th>View Details</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%assign var='i' value=1 %>
                              <%if ($inwarding_data) %>
                                 <%foreach from=$inwarding_data item=t %>
                                 
                                 <tr>
                                    <td><%$t->po_id %></td>
                                    <td><%$t->po_number %></td>
                                    <td><%$t->supplier_name %></td>
                                    <td><%$t->invoice_number %></td>
                                    <td><%$t->invoice_date %></td>
                                    <td><%$t->grn_number %></td>
                                    <td><%$t->grn_date %></td>
                                    <%if ($isMultiClient == "true") %>
                                       <td><%$t->delivery_unit %></td>
                                    <%/if%>
                                    <td>
                                       <a href="<%base_url('inwarding_details_validation/') %><%$t->id %>/<%$t->po_id %>" class="btn btn-danger" href="">Validation Details</a></td>
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
<style type="text/css">
   .dataTables_scrollHeadInner table,.dataTables_scrollBody table{
      width: 100% !important;
   }
   .dataTables_scrollHeadInner{
          width: 99.1%;
   }
</style>