<div style="width:100%" class="wrapper">
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
               <!-- <h1></h1> -->
               <form action="<%base_url('') %>" method="POST">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label for="po_num">Part Number </label><span class="text-danger">*</span>
                           <input type="text" readonly value="<%$child_part_data[0]->part_number %>" name="part_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <!-- <div class="form-group">
                           <label for="operation_number">Operation Number</label><span class="text-danger">*</span>
                           <input type="text" name="operationNumber" class="form-control" required id="exampleInputPassword1" placeholder="Operation Number">
                           
                           </div>-->
                        <div class="form-group">
                           <label for="po_num">Part Description </label><span class="text-danger">*</span>
                           <input type="text" readonly value="<%$child_part_data[0]->part_description %>" name="part_desc" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Description" aria-describedby="emailHelp">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                  <li class="breadcrumb-item active">Inward Inspection</li>
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
                     <!-- Button trigger modal -->
                     <a class="btn btn-dark" href="<%base_url('inwarding_details_accept_reject/') %><%$inwarding_data[0]->id %>/<%$po_id %>">
                     < Back </a>
                     <%if ($raw_material_inspection_master) %>
	                     <a class="btn btn-danger" href="<%base_url('download_my_pdf_inspection_report/') %><%$child_part_id %>/<%$po_id %>/<%$supplier_id %>/<%$inwarding_id %>/<%$accepted_qty %>/<%$rejected_qty %>/<%$child_part_id_table %>">
	                     Download Report </a>
                     <%/if%>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form action="<%base_url('add_raw_material_inspection_master') %>" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label> Parameter </label><span class="text-danger">*</span>
                                             <input type="text" required name="parameter" placeholder="Enter Parameter" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label> Specification </label><span class="text-danger">*</span>
                                             <input type="text" required name="specification" placeholder="Enter Specification" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label> Evalution Mesaurement Technique </label><span class="text-danger">*</span>
                                             <input type="text" required name="evalution_mesaurement_technique" placeholder="Enter Specification" class="form-control">
                                             <input type="hidden" value="<%$child_part_id %>" required name="child_part_id" placeholder="Enter Specification" class="form-control">
                                          </div>
                                       </div>
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
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Parameter</th>
                              <th>Specification</th>
                              <th>Evalution Mesaurement Technique</th>
                              <th>Observation 1</th>
                              <th>Observation 2</th>
                              <th>Observation 3</th>
                              <th>Observation 4</th>
                              <th>Observation 5</th>
                              <th>Remark</th>
                              <th>Submit</th>
                              <th>Update</th>
                           </tr>
                        </thead>
                        <tbody>
                              <%assign var='i' value=1 %>
                            <%if ($raw_material_inspection_master) %>
                                <%foreach from=$raw_material_inspection_master item=u  %>
                                <%assign var='raw_material_inspection_report_data' value=$u->raw_material_inspection_report_data %>
			                           <tr>
			                              <td><%$i %></td>
			                              <td><%$u->parameter %></td>
			                              <td><%$u->specification %></td>
			                              <td><%$u->evalution_mesaurement_technique %></td>
			                              <%if (empty($raw_material_inspection_report_data)) %>
				                              <form action="<%base_url('add_raw_material_inspection_report') %>" method="post">
				                                 <td>
				                                    <input type="text" required placeholder="Enter Observation" class="form-control" name="observation" value="">
				                                    <input type="hidden" required  class="form-control" name="raw_material_inspection_master_id" value="<%$u->id %>">
				                                    <input type="hidden" required  class="form-control" name="child_part_id" value="<%$child_part_id %>">
				                                    <input type="hidden" required  class="form-control" name="accepted_qty" value="<%$accepted_qty %>">
				                                    <input type="hidden" required  class="form-control" name="rej_qty" value="<%$rejected_qty %>">
				                                    <input type="hidden" required  class="form-control" name="invoice_number" value="<%$inwarding_data[0]->invoice_number %>">
				                                    <input type="hidden" required  class="form-control" name="invoice_date" value="<%$inwarding_data[0]->invoice_date %>">
				                                 </td>
				                                 <td>
				                                    <input type="text" required placeholder="Observation" class="form-control" name="observation2" value="">
				                                 </td>
				                                 <td>
				                                    <input type="text" required placeholder="Observation" class="form-control" name="observation3" value="">
				                                 </td>
				                                 <td>        
				                                    <input type="text" required placeholder="Observation" class="form-control" name="observation4" value="">
				                                 </td>
				                                 <td>        
				                                    <input type="text" required placeholder="Observation" class="form-control" name="observation5" value="">
				                                 </td>
				                                 <td>
				                                    <input type="text" required placeholder="Enter Remark" class="form-control" name="remark" value="">
				                                 </td>
				                                 <td>
				                                    <button type="submit" class="btn btn-primary">Submit</button>
				                                 </td>
			                                 <%else %>   
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->observation %>
				                                 </td>
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->observation2 %>
				                                 </td>
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->observation3 %>
				                                 </td>
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->observation4 %>
				                                 </td>
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->observation5 %>
				                                 </td>
				                                 <td>
				                                    <%$raw_material_inspection_report_data[0]->remark %>
				                                 </td>
				                                 <td>
				                                   already added
				                                 </td>
			                                 <%/if%>
			                              </form>
			                              </td>
			                              <td>
			                                 <%if (empty($raw_material_inspection_report_data)) %>
			                                 <%else %>
			                                 <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModa<%$i %>l">
			                                 <i class="fa fa-edit"></i>
			                                 </button>
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
			                                             <form action="<%base_url('update_raw_material_inspection_master_new') %>" method="POST">
			                                                <div class="row">
			                                                   <div class="col-lg-12">
			                                                      <div class="form-group">
			                                                         <label> Parameter </label><span class="text-danger">*</span>
			                                                         <input value="<%$u->parameter %>" readonly type="text" required name="parameter" placeholder="Enter Parameter" class="form-control">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label> Specification </label><span class="text-danger">*</span>
			                                                         <input value="<%$u->specification %>" readonly type="text" required name="specification" placeholder="Enter Specification" class="form-control">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label> Evalution Mesaurement Technique </label><span class="text-danger">*</span>
			                                                         <input value="<%$u->evalution_mesaurement_technique %>" readonly type="text" required name="evalution_mesaurement_technique" placeholder="Enter Specification" class="form-control">
			                                                         <input type="hidden" value="<%$raw_material_inspection_report_data[0]->id %>" required name="id" placeholder="Enter Specification" class="form-control">
			                                                      </div>
			                                                   </div>
			                                                </div>
			                                                <div class="col-lg-12">
			                                                   <div class="row">
			                                                      <div class="form-group">
			                                                         <label> Observation 1</label><span class="text-danger">*</span>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->observation %>" required placeholder="Enter Observation" class="form-control" name="observation">
			                                                      </div>
			                                                      &nbsp;&nbsp;&nbsp;&nbsp;
			                                                      <div class="form-group">
			                                                         <label> Observation 2</label>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->observation2 %>" placeholder="Enter Observation" class="form-control" name="observation2">
			                                                      </div>
			                                                   </div>
			                                                </div>
			                                                <div class="col-lg-12">
			                                                   <div class="row">
			                                                      <div class="form-group">
			                                                         <label> Observation 3</label>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->observation3 %>" placeholder="Enter Observation" class="form-control" name="observation3">
			                                                      </div>
			                                                      &nbsp;&nbsp;&nbsp;&nbsp;
			                                                      <div class="form-group">
			                                                         <label> Observation 4</label>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->observation4 %>" placeholder="Enter Observation" class="form-control" name="observation4">
			                                                      </div>
			                                                   </div>
			                                                </div>
			                                                <div class="col-lg-12">
			                                                   <div class="row">
			                                                      <div class="form-group">
			                                                         <label> Observation 5</label>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->observation5 %>" placeholder="Enter Observation" class="form-control" name="observation5">
			                                                      </div>
			                                                      &nbsp;&nbsp;&nbsp;&nbsp;
			                                                      <div class="form-group">
			                                                         <label> Remark</label><span class="text-danger">*</span>
			                                                         <input type="text" value="<%$raw_material_inspection_report_data[0]->remark %>" required placeholder="Enter Remark" class="form-control" name="remark" value="">
			                                                      </div>
			                                                   </div>
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
			                                 <%/if%>
			                                 </form>
			                              </td>
			                           </tr>
		                        <%assign var='i' value=$i+1 %>
		                        <%/foreach %>
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