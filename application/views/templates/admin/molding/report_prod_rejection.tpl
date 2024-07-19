<div class="wrapper">
<!-- Navbar -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Production Rejection Report</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Report</li>
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
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">
                                 <span class="text-danger">Data Analysis </span>
                                 <div style="padding-left: 10px;padding-top:10px">
                                    <li>Total rejection across all the customers : <span class="text-danger"><%$total_rejection[0]->total_rejection_qty %></span></li>
                                    <li>Maximum rejections are for reason <span class="text-danger"><%$max_rejection_reason[0]->name %></span> with Quantity: <span class="text-danger"><%$max_rejection_reason[0]->total_rejection_qty %></span></li>
                                    <li>Maximum rejection on machine : <span class="text-danger"><%$machine_analysis[0]->machine_name %></span> for reason <span class="text-danger"><%$machine_analysis[0]->name %></span> with Quantity: <span class="text-danger"><%$machine_analysis[0]->total_rejection_qty %></span></li>
                                 </div>
                              </label>
                           </div>
                        </div>
                     </div>
                     <span class="text-info"> Display more details</span>
                     <i id="showIcon" class="fas fa-eye" style="cursor: pointer; display: none;"></i>
                     <i id="hideIcon" class="fas fa-eye-slash" style="cursor: pointer; display: inline;"></i>
                     <div id="dataAnalysis" style="display: none;">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="card-body" style="text-wrap:nowrap;">
                                 <table id="exa" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>Top Rejection Reason</th>
                                          <th>Total Rejection QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       	<%assign var='i' value=1 %>
                                        <%if ($max_rejection_reason) %>
                                            <%foreach from=$max_rejection_reason item=r %>
		                                       <tr>
		                                          <td><%$r->name %></td>
		                                          <td><%$r->total_rejection_qty %></td>
		                                       </tr>
		                                    <%assign var='i' value=$i+1 %>
		                                    <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="card-body" style="text-wrap:nowrap;">
                                 <table id="exa" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>Machine Name</th>
                                          <th>Rejection Reason</th>
                                          <th>Total Rejection QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <%assign var='i' value=1 %>
                                        <%if ($machine_analysis) %>
                                            <%foreach from=$machine_analysis item=r %>
		                                       <tr>
		                                          <td><%$r->machine_name %></td>
		                                          <td><%$r->name %></td>
		                                          <td><%$r->total_rejection_qty %></td>
		                                       </tr>
		                                    <%assign var='i' value=$i+1 %>
		                                    <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Rejection Reason</th>
                              <th>Rejection QTY</th>
                              <th>Customer</th>
                              <th>Part Details</th>
                              <th>Date/Shift</th>
                              <th>Machine</th>
                              <th>Operator</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%assign var='i' value=1 %>
                            <%if ($report_prod_rejection) %>
                                <%foreach from=$report_prod_rejection item=r %>
		                           <tr>
		                              <td><%$i %></td>
		                              <td><%$r->rejection_reason %></td>
		                              <td><%$r->rejection_qty %></td>
		                              <td><%$r->customer_name %></td>
		                              <td><%$r->part_number %></td>
		                              <td><%$r->prod_date %>/ <%$r->shift_type %></td>
		                              <td><%$r->machine_name %></td>
		                              <td><%$r->operator_name %></td>
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
<script>
   document.getElementById("showIcon").addEventListener("click", function() {
       document.getElementById("dataAnalysis").style.display = "none";
       document.getElementById("showIcon").style.display = "none";
       document.getElementById("hideIcon").style.display = "inline";
   });
   
   document.getElementById("hideIcon").addEventListener("click", function() {
       document.getElementById("dataAnalysis").style.display = "block";
       document.getElementById("showIcon").style.display = "inline";
       document.getElementById("hideIcon").style.display = "none";
   });
</script>
</body>
</html>