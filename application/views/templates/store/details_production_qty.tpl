<div class="wrapper">
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Production Details</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Production</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      <div>
         <div class="row">
            <br>
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-2">
                           <label for="">status</label>
                           <input type="text" readonly value="<%$p_q_data[0]->status %>"
                              class="form-control">
                        </div>
                        <div class="col-lg-2">
                           <label for="">Accepted Qty</label>
                           <input type="text" readonly value="<%$p_q_data[0]->accepted_qty %>"
                              class="form-control">
                        </div>
                        <div class="col-lg-2">
                           <label for="">Rejection Qty</label>
                           <input type="text" readonly value="<%$p_q_data[0]->rejected_qty %>"
                              class="form-control">
                        </div>
                        <%if (!empty($p_q_data[0]->rejected_qty)) %>
	                        <div class="col-lg-3">
	                           <label for="">Rejection Remark</label>
	                           <input type="text" readonly
	                              value="<%$p_q_data[0]->rejection_remark %>" class="form-control">
	                        </div>
	                        <div class="col-lg-3">
	                           <label for="">Rejection Reason</label>
	                           <input type="text" readonly
	                              value="<%$p_q_data[0]->rejection_reason %>" class="form-control">
	                        </div>
	                    <%/if%>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr No</th>
                              <th>Input Part Number / Description</th>
                              <th>Total Req Qty</th>
                              <th>Date & Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           <%if ($p_q_history) %>
                                <%assign var='i' value=1 %>
                                <%foreach from=$p_q_history item=u %>
		                           <tr>
		                              <td><%$u->input_part_number %></td>
		                              <td><%$u->output_part_data[0]->part_number %> /
		                                 <%$u->output_part_data[0]->part_description %>
		                              </td>
		                              <td><%$u->req_qty %></td>
		                              <td><%$u->created_date %>/ <%$u->created_time %></td>
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
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>