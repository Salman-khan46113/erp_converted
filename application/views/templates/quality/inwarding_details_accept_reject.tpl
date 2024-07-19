<div  class="wrapper">
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
                  <h1>Accept / Reject Validation </h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<%base_url('generate_po') %>">Home</a></li>
                     <li class="breadcrumb-item active"></li>
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
                           <div class="col-lg-1">
                              <div class="form-group">
                                 <a class="btn btn-dark"
                                    href="<%base_url('accept_reject_validation') %>">
                                 < Back</a>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">GRN Number</label>
                                 <input type="text" readonly
                                    value="<%$inwarding_data[0]->grn_number %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">PO Number</label>
                                 <input type="text" readonly value="<%$new_po[0]->po_number %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-1">
                              <div class="form-group">
                                 <label for="">PO Date</label>
                                 <input type="text" readonly value="<%$new_po[0]->po_date %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-1">
                              <div class="form-group">
                                 <label for="">PO Status</label>
                                 <input type="text" readonly value="<%if ($new_po[0]->status == "accpet") %>Released
                                    <%else %><%$new_po[0]->status %><%/if%>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Supplier Name  </label>
                                 <input type="text" readonly
                                    value="<%$supplier[0]->supplier_name %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-1">
                              <div class="form-group">
                                 <label for="">Supplier No</label>
                                 <input type="text" readonly
                                    value="<%$supplier[0]->supplier_number %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Supplier GST </label>
                                 <input type="text" readonly value="<%$supplier[0]->gst_number %>"
                                    class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Inwarding Status</label>
                                 <input type="text" readonly
                                    value="<%$inwarding_data[0]->status %>" class="form-control">
                              </div>
                           </div>
                           <%if ($isMultiClient == "true")  %>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Delivery Location</label>
                                 <input type="text" readonly
                                    value="<%$inwarding_data[0]->delivery_unit %>"
                                    class="form-control">
                              </div>
                           </div>
                           <%/if%>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Invoice Amount  </label>
                                 <input type="text" readonly
                                    value="<%$inwarding_data[0]->invoice_amount %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Software Calculated Amount
                                 </label>
                                 <input type="text" readonly value="<%$actual_price %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Invoice Amount Validate Status</label>
                                 <input type="text" readonly value="<%$status %>"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Accept </h5>
                                             <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form
                                                action="<%base_url('accept_inwarding_data') %>"
                                                method="POST">
                                                <div class="row">
                                                   <div class="form-group">
                                                      <label> Are You Sure Want To Accept This
                                                      Inwarding ?</label><span
                                                         class="text-danger">*</span>
                                                      <input type="hidden" name="inwarding_id"
                                                         value="<%$inwarding_id %>"
                                                         class="form-control">
                                                      <input type="hidden" name="invoice_number"
                                                         value="<%$invoice_number %>"
                                                         class="form-control">
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                      data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save
                                                   Changes</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal fade" id="exampleModalmatch" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg " role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Match Price
                                             </h5>
                                             <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form
                                                action="<%base_url('validate_invoice_amount') %>"
                                                method="POST">
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label> Invoice Amount </label><span
                                                            class="text-danger">*</span>
                                                         <input type="number" step="any" name="invoice_amount"
                                                            placeholder="Invoice Amount"
                                                            value="" class="form-control">
                                                         <input type="hidden" name="inwarding_id"
                                                            value="<%$inwarding_id %>"
                                                            class="form-control">
                                                         <input type="hidden" name="actual_price"
                                                            value="<%$actual_price %>"
                                                            class="form-control">
                                                         <input type="hidden" name="actual_price"
                                                            value="<%$status %>"
                                                            class="form-control">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                      data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save
                                                   Changes</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal fade" id="exampleModalgenerate" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Change Status
                                             </h5>
                                             <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form
                                                action="<%base_url('update_status_grn_inwarding') %>"
                                                method="POST">
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label> Are You Sure Want To Validate GRN ?
                                                         </label>
                                                         <input type="hidden" name="status"
                                                            placeholder="" value="validate_grn"
                                                            class="form-control">
                                                         <input type="hidden" name="inwarding_id"
                                                            value="<%$inwarding_id %>"
                                                            class="form-control">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                      data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save
                                                   Changes</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-body">
                        <table class="table table-bordered table-striped" id="example1">
                           <thead>
                              <tr>
                                 <th>Sr No</th>
                                 <th>Part Number</th>
                                 <th>Part Description</th>
                                 <!-- <th>Tax Strucutre Code</th> -->
                                 <th>UOM</th>
                                 <!-- <th>Delivery Date</th> -->
                                 <!-- <th>Expiry Date</th> -->
                                 <!-- <th>PO QTY</th> -->
                                 <!-- <th>Balance QTY</th> -->
                                 <th>Price</th>
                                 <th>Inwarding Qty</th>
                                 <th>GRN Validation Qty</th>
                                 <th>Accept Qty.</th>
                                 <th>Reject Qty</th>
                                 <th>Remark</th>
                                 <th>Submit </th>
                                 <th>GRN Rejection</th>
                                 <th>RM Batch No</th>
                                 <th>Supplier Report</th>
                                 <!-- MTC Report -->
                                 <th>Incoming Inspection Report </th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <%if ($po_parts) %>
                                    <%assign var='final_po_amount' value=0 %>
                                    <%assign var='i' value=1 %>
                                    <%foreach from=$po_parts item=p %>
                                        <%assign var='part_rate_new' value=0 %>
                                        <%if (empty($p->rate)) %>
                                            <%assign var='part_rate_new' value=$p->child_part_data->part_rate %>
                                        <%else %>
                                        	<%assign var='part_rate_new' value=$p->rate %>
                                        <%/if%>
                                        <%assign var='total_rate' value=$part_rate_new * $p->qty %>
                                        <%assign var='final_po_amount' value=$final_po_amount + $total_rate %>
                                        
                                        <%if ($p->grn_details_id > 0) %>
                                 
                                            <%if ($p->grn_details_id > 0) %>
                                                <%assign var='data_present' value="yes" %>
                                            <%else %>
                                            	<%assign var='data_present' value="no" %>
                                            <%/if%>

							                              <tr>
							                                 <td><%$i %></td>
							                                 <td><%$p->child_part_data->part_number %></td>
							                                 <td class="col-lg-2"><%$p->child_part_data->part_description %></td>
							                                 <td><%$p->uom_name %></td>
							                                 <td><%$part_rate_new %></td>
							                                 <td><%$p->grn_qty %></td>
							                                 <td><%$p->verified_qty %></td>
							                                 <%if (empty($p->accept_qty)) %>
							                                 <td class="col-lg-2">
							                                    <form action="<%base_url('update_grn_qty_accept_reject') %>"
							                                       method="post">
							                                       <input type="number" required min="0" value="" id="searchTxt"
							                                          step="any" required max="<%$p->verified_qty %>"
							                                          placeholder="Accept Qty" name="accept_qty" class="form-control">
							                                       <input type="hidden"
							                                          value="<%$p->qty %>"
							                                          placeholder="GRN Validation Qty4" name="privious_qty"
							                                          class="form-control">
							                                       <input type="hidden" name="grn_details_id"
							                                          value="<%$p->grn_details_id %>"
							                                          class="form-control">
							                                       <input type="hidden" placeholder="Inwarding Qty"
							                                          name="part_rate" value="<%$part_rate_new %>"
							                                          class="form-control">
							                                       <input type="hidden" placeholder="Inwarding Qty" name="tax_id"
							                                          value="<%$p->tax_id %>" class="form-control">
							                                       <input type="hidden" placeholder="Inwarding Qty"
							                                          name="verified_qty"
							                                          value="<%$p->verified_qty %>"
							                                          class="form-control">
							                                       <input type="hidden" placeholder="Inwarding Qty"
							                                          name="part_id" value="<%$p->part_id %>"
							                                          class="form-control">
							                                       <input type="hidden" name="invoice_number"
							                                          value="<%$invoice_number %>" class="form-control">
							                                       <input type="hidden" name="deliveryUnit"
							                                          value="<%$inwarding_data[0]->delivery_unit %>" class="form-control">
							                                <%else %>
								                                 <td>
								                                 <%$p->accept_qty %>
							                                <%/if%>
							                                 </td>
							                                 <td>
							                                 <%if (empty($p->reject_qty)) %>
							                                    <%$p->reject_qty %>
							                                 <%else %>
							                                    <%$p->reject_qty %>
							                                 <%/if%>
							                                 </td>
							                                 <td class="col-lg-1">
							                                 <%if (empty($p->accept_qty)) %>
							                                 <input type="text" name="remark" placeholder="Remark"
							                                    class="form-control">
							                                 <%else %>
							                                    <%$p->remark %>
							                                 <%/if%>
							                                 </td>
							                                 <td>
							                                 <%if (empty($p->accept_qty)) %>
							                                 	<button type="submit" class="btn btn-info">Submit</button>
							                                 </form>
							                                 <%/if%>
							                                 </td>
							                                 <td>
							                                    <%if ($p->rejection_flow_data) %>
								                                    <a class="btn btn-success"
								                                       href="<%base_url('create_debit_note/') %><%$p->rejection_flow_data->id %>">Download
								                                    Debit Note</a>
								                                    <br>
								                                    <br>
								                                    <a class="btn btn-danger"
								                                       href="<%base_url('documents/') %><%$p->rejection_flow_data->debit_note %>"
								                                       download>Download Document </a>
							                                    <%else %>
							                                           	<%if ($p) %>
							                                               <%if ($p->reject_qty != 0) %>
										                                    <button type="button" class="btn btn-warning float-left"
										                                       data-toggle="modal" data-target="#exampleModal123<%$i %>">
										                                    Add Rejection Debit Note
										                                    </button>
										                                    <%/if%>
									                                    <%/if%>
							                                    <%/if%>
							                                    <div class="modal fade" id="exampleModal123<%$i %>"
							                                       tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							                                       aria-hidden="true">
							                                       <div class="modal-dialog modal-lg" role="document">
							                                          <div class="modal-content">
							                                             <div class="modal-header">
							                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
							                                                <button type="button" class="close" data-dismiss="modal"
							                                                   aria-label="Close">
							                                                <span aria-hidden="true">&times;</span>
							                                                </button>
							                                             </div>
							                                             <div class="modal-body">
							                                                <form
							                                                   action="<%base_url('add_rejection_flow') %>"
							                                                   method="POST" enctype='multipart/form-data'>
							                                                   <div class="row">
							                                                      <div class="col-lg-12">
							                                                         <div class="form-group">
							                                                            <label for="po_num">Selected Part Number
							                                                            / Description / Stock </label><span
							                                                               class="text-danger">*</span>
							                                                            <input type="text" class="form-control"
							                                                               value="<%$p->child_part_data->part_number %>"
							                                                               name="" readonly required="required"
							                                                               id="">
							                                                            <input type="hidden"
							                                                               value="<%$p->part_id %>"
							                                                               name="part_id" readonly
							                                                               required="required" id="">
							                                                         </div>
							                                                         <div class="form-group">
							                                                            <label for="po_num">Selected
							                                                            Supplier</label><span
							                                                               class="text-danger">*</span>
							                                                            <input type="text" readonly
							                                                               value="<%$supplier[0]->supplier_name %>"
							                                                               class="form-control">
							                                                            <input type="hidden" readonly
							                                                               value="<%$supplier[0]->id %>"
							                                                               name="supplier_id"
							                                                               class="form-control">
							                                                         </div>
							                                                         <div class="form-group">
							                                                            <label for="po_num">Reason <span
							                                                               class="text-danger">*</span></label>
							                                                            <input type="text" name="reason"
							                                                               required placeholder="Reason"
							                                                               class="form-control">
							                                                            <input type="hidden" name="type"
							                                                               value="grn_rejection" required
							                                                               placeholder="Reason"
							                                                               class="form-control">
							                                                         </div>
							                                                         <div class="form-group">
							                                                            <label for="po_num">Upload Rejection
							                                                            Document <span
							                                                               class="text-danger">*</span></label>
							                                                            <input type="file"
							                                                               name="uploading_document" required
							                                                               class="form-control">
							                                                         </div>
							                                                         <div class="form-group">
							                                                            <label for="po_num">Rejection Qty <span
							                                                               class="text-danger">*</span></label>
							                                                            <input type="number" readonly name="qty"
							                                                               value="<%$p->reject_qty %>"
							                                                               step="any" placeholder="Qty"
							                                                               name="qty" required
							                                                               class="form-control">
							                                                            <input type="hidden" name="po_number"
							                                                               readonly
							                                                               value="<%$new_po[0]->id %>"
							                                                               class="form-control">
							                                                         </div>
							                                                         <div class="form-group">
							                                                            <label for="po_num">Remark
							                                                            </label>
							                                                            <input type="text" name="remark"
							                                                               required placeholder="Remark"
							                                                               class="form-control">
							                                                         </div>
							                                                      </div>
							                                                   </div>
							                                             </div>
							                                             <div class="modal-footer">
							                                             <button type="button" class="btn btn-secondary"
							                                                data-dismiss="modal">Close</button>
							                                             <button type="submit" class="btn btn-primary">Save
							                                             Changes</button>
							                                             </div>
							                                             </form>
							                                          </div>
							                                       </div>
							                                    </div>
							                                 </td>
							                                 <td><%$p->rm_batch_no %></td>
							                                 <!-- Supplier/MTC Report -->
							                                 <td>
							                                    <%if ($p->mtc_report != "") %>
							                                    <a download href="<%base_url('documents/mtc/') %><%$p->mtc_report %>" id="" class="btn btn-sm btn-primary remove_hoverr "><i class="fas fa-download"></i></a>
							                                    <%/if%>
							                                 </td>
							                                 <td>
							                                    <a class="btn btn-info" title="Raw Material Inspection"
							                                       href="<%base_url('raw_material_inspection_inwarding/') %><%$p->child_part_data->id %>/<%$new_po[0]->id %>/<%$supplier[0]->id %>/<%$inwarding_data[0]->id %>/<%$p->accept_qty %>/<%$p->reject_qty %>/<%$p->part_id %>">
							                                    <i class="fa fa-clipboard"></i>
							                                    </a>
							                                 </td>
							                                 <td>
							                                    <button type="button" class="btn btn-primary" data-toggle="modal"
							                                       data-target="#editRM<%$i %>">
							                                    <i class="fa fa-edit"></i>
							                                    </button>
							                                    <div class="modal fade" id="editRM<%$i %>" tabindex="-1"
							                                       role="dialog" aria-labelledby="exampleModalLabel"
							                                       aria-hidden="true">
							                                       <div class="modal-dialog" role="document">
							                                          <div class="modal-content">
							                                             <div class="modal-header">
							                                                <h5 class="modal-title" id="exampleModalLabel">Update
							                                                </h5>
							                                                <button type="button" class="close" data-dismiss="modal"
							                                                   aria-label="Close">
							                                                <span aria-hidden="true">&times;</span>
							                                                </button>
							                                             </div>
							                                             <div class="modal-body">
							                                                <form
							                                                   action="<%base_url('update_rm_batch_mtc_report') %>"
							                                                   method="POST" enctype="multipart/form-data">
							                                                   <div class="form-group">
							                                                      <label for="">RM Batch No<span
							                                                         class="text-danger">*</span></label>
							                                                      <input required value="<%$p->rm_batch_no %>"
							                                                         type="text" class="form-control"
							                                                         name="rm_batch_no">
							                                                      <input type="hidden" name="grn_details_id"
							                                                         value="<%$p->grn_details_id %>"
							                                                         class="form-control">
							                                                      
							                                                   </div>
							                                                   <div class="form-group">
							                                                      <label for="mtcReportFile">MTC Report</span>
							                                                      <input required type="file" name="mtc_report" class="form-control" id="mtcReportFile" aria-describedby="mtcReportFileHelp" placeholder="Select File">
							                                                   </div>
							                                             </div>
							                                             <div class="modal-footer">
							                                             <button type="button" class="btn btn-secondary"
							                                                data-dismiss="modal">Close</button>
							                                             <button type="submit" class="btn btn-primary">Save
							                                             Changes</button>
							                                             </form>
							                                             </div>
							                                          </div>
							                                       </div>
							                                    </div>
							                                 </td>
							                              </tr>
			                                <%assign var='i' value=$i+1 %>
			                            <%/if%>
                                 	<%/foreach%>
                                 <%/if%>
                           </tbody>
                        </table>
                        <div style="margin-left: 1200px ;">
                           <%if ($inwarding_data[0]->status == "accept") %>
                           	<button type="button" disabled class="btn btn-primary mt-4" data-toggle="modal"
                              data-target="#exampleModalgenerate">
                           	Inwarding Already Accepted </button>
                           <%else %>
	                           <button type="button" class="btn btn-primary mt-4" data-toggle="modal"
	                              data-target="#exampleModal">
	                           Accept Inwarding </button>
                           <%/if%>
                        </div>
                     </div>
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