<div style="width:100%" class="wrapper">
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <%assign var='expired' value='no'%>
                  <%if ($new_po[0]->expiry_po_date > date('Y-m-d')) %>
                  <%assign var='expired' value='yes' %>
                  <%/if%>
                  <%if (empty($new_po[0]->process_id)) %>
                  <%assign var='type' value='normal' %>
                  <%else %>
                  <%assign var='type' value='Subcon grn' %>
                  <%/if%>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="<%base_url('generate_po') %>">Home </a></li>
                     <li class="breadcrumb-item active"></li>
                  </ol>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="row">
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">PO Number <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$new_po[0]->po_number %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">PO Date <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$new_po[0]->po_date %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">PO Expiry Date <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$new_po[0]->expiry_po_date %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">PO Remark <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$new_po[0]->remark %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <%if ($expired == 'no') %>
                                 <%assign var='statusNew'  value='Expired' %>
                                 <%else if ($new_po[0]->status == 'accept') %>
                                 <%assign var='statusNew'  value='Released' %>
                                 <%else %>
                                 <%assign var='statusNew'  value=$new_po[0]->status %>
                                 <%/if%>
                                 <label for="">Current Status <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$statusNew %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Supplier Name <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$supplier[0]->supplier_name %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Supplier Number <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$supplier[0]->supplier_number %>" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="form-group">
                                 <label for="">Supplier GST <span class="text-danger">*</span> </label>
                                 <input type="text" readonly value="<%$supplier[0]->gst_number %>" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-header">
                        <%if ($new_po[0]->expiry_po_date <=  date('Y-m-d') || true) %>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <form action="<%base_url('add_po_parts') %>" method="post">
                                    <label for="">Select Part Number // Description // Supplier // Rate //
                                    Tax Structure // Max Qty<span class="text-danger">*</span> </label>
                                    <select name="part_id" id="" required class="form-control select2">
                                       <%if ($child_part) %>
                                       <%foreach from=$child_part item=$c %>
                                       <%if ($c->c != '') %>
                                       <%if (empty($new_po[0]->process_id)) %>
                                       <%assign var='type' value='normal' %>
                                       <%else %>
                                       <%assign var='type' value='Subcon grn' %>
                                       <%/if%>
                                       <%if ($type == "normal") %>
                                       <%if ($c->c2[0]->sub_type != "Subcon grn") %>
                                       <option value="<%$c->c2[0]->id %>">
                                          <%$c->c2[0]->part_number %> // <%$c->c2[0]->part_description %> // <%$supplier[0]->supplier_name %>// <%$c->c[0]->part_rate %> // <%$c->gst_structure[0]->code %>//<%$c->c2[0]->max_uom %>
                                       </option>
                                       <%else %>
                                       <%if ($c->c2[0]->sub_type == "Subcon grn" || $c->c2[0]->sub_type == "Subcon Regular") %>
                                       <option value="<%$c->c2[0]->id %>">
                                          <%$c->c2[0]->part_number %> //
                                          <%$c->c2[0]->part_description %> //  <%$supplier[0]->supplier_name %>//<%$c->c[0]->part_rate %> // 
                                       </option>
                                       <%/if%>
                                       <%/if%>
                                       <%/if%>
                                       <%/if%>
                                       <%/foreach%>
                                       <%/if%>
                                    </select>
                              </div>
                           </div>
                           <%if ($type != "normal") %>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Select Process <span class="text-danger">*</span> </label>
                           <select name="process" id="" class="form-control select2">
                           <%if count($process) gt 0 %>
                           <%foreach from=$process item=s %>
                           <option value="<%$s->name %>"><%$s->name %></option>
                           <%/foreach%>
                           <%/if%>
                           </select>
                           </div>
                           </div>
                           <%/if%>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <label for="">Enter Qty <span class="text-danger">*</span> </label>
                           <input type="number" step="any" name="qty" placeholder="Enter QTY " required class="form-control">
                           <input type="hidden" name="po_number" value="<%$new_po[0]->po_number %>" required class="form-control">
                           <input type="hidden" name="po_id" value="<%$new_po[0]->id %>" required class="form-control">
                           <input type="hidden" name="supplier_id" value="<%$supplier[0]->id %>" placeholder=" " required class="form-control">
                           <input type="hidden" name="type" value="<%$type %>" placeholder="" required class="form-control">
                           </div>
                           </div>
                           <div class="col-lg-2">
                           <div class="form-group">
                           <%if ($new_po[0]->status == "pending") %>
                           <%if ($expired == "yes") %>
                           <button type="submit" class="btn btn-info btn mt-4">Add Child Part</button>
                           <%else %>
                           PO expired
                           <%/if%>
                           <%/if%>
                           </div>
                           </div>
                           </form>
                        </div>
                        <%else %>
                        Po  Expired!!
                        <%/if%>
                     </div>
                     <div class="card-header">
                        <%if ($po_parts) %>
                        <%if $new_po[0]->status == "pending"  %>
                        <%if ($session_data['type'] == 'admin' || $session_data['type'] == 'Admin') %>
                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#lock">
                        Lock PO
                        </button>
                        <%/if%>
                        <%/if%>
                        <%/if%>
                        <%if ($new_po[0]->status == "lock") %>
                        <%if ($session_data['type'] == 'admin' || $session_data['type'] == 'Admin') %>
                        <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#accept">
                        Accept (Released) PO
                        </button>
                        <!-- <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete">
                           Reject (delete) PO
                           </button> -->
                        <%/if%>
                        <%else %>
                        <%if ($new_po[0]->status != "pending") %>
                        <button type="button" disabled class="btn btn-success ml-1" data-toggle="modal" data-target="#accept">
                        PO Already Released
                        </button>
                        <a href="<%base_url('download_my_pdf/') %><%$new_po[0]->id %>" class="btn btn-primary" href="">Download</a>
                        <%/if%>
                        <%/if%>
                        <!-- Modal -->
                        <div class="modal fade" id="accept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <form action="<%base_url('accept_po') %>" method="POST">
                                          <div class="col-lg-12">
                                             <div class="form-group">
                                                <label for=""><b>Are You Sure Want To Released This
                                                PO?</b> </label>
                                                <input type="hidden" name="id" value="<%$new_po[0]->id %>" required class="form-control">
                                                <input type="hidden" name="status" value="accept" required class="form-control">
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                              </div>
                              </form>
                           </div>
                        </div>
                        <div class="modal fade" id="lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <form action="<%base_url('accept_po') %>" method="POST">
                                          <div class="col-lg-12">
                                             <div class="form-group">
                                                <label for=""><b>Are You Sure Want To Lock This PO?</b>
                                                </label>
                                                <input type="hidden" name="id" value="<%$new_po[0]->id %>" required class="form-control">
                                                <input type="hidden" name="status" value="lock" required class="form-control">
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                              </div>
                              </form>
                           </div>
                        </div>
                        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <form action="<%base_url('delete_po') %>" method="POST">
                                          <div class="col-lg-12">
                                             <div class="form-group">
                                                <label for=""><b>Are You Sure Want To Delete This
                                                PO?</b> </label>
                                                <input type="hidden" name="id" value="<%$new_po[0]->id %>" required class="form-control">
                                                <input type="hidden" name="status" value="reject" required class="form-control">
                                                <input type="hidden" name="table_name" value="new_po" required class="form-control">
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                              </div>
                              </form>
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
                                 <th>GST Strucutre Code</th>
                                 <th>UOM</th>
                                 <th>QTY</th>
                                 <%if ($type != "normal") %>
                                 <th>Process</th>
                                 <%/if%>
                                 <th>Price</th>
                                 <th>Created Date</th>
                                 <th>Actions</th>
                                 <th>Sub Total</th>
                                 <th>GST</th>
                                 <th>Total Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              <%if ($po_parts) %>
                              <%assign var='final_po_amount' value=0%>
                              <%assign var='i' value=1%>
                              <%foreach from=$po_parts item=p %>
                                  <%assign var='child_part_data' value=$p->child_part_data %>
	                              <%assign var='part_rate_new' value=0 %>
	                              <%if $p->rate == '' %>
	                              <%assign var='part_rate_new' value=$child_part_data[0]->part_rate %>
	                              <%else%>
	                              <%assign var='part_rate_new' value=$p->rate %>
	                              <%/if%>
	                              <%assign var='uom_data' value=$p->uom_data%>
	                              <%assign var='total_rate_old' value=$part_rate_new * $p->qty %>
	                              <%assign var='gst_structure' value=$p->gst_structure %>
	                              <%assign var='cgst_amount' value=($total_rate_old * $gst_structure[0]->cgst) / 100 %>
	                              <%assign var='sgst_amount' value=($total_rate_old * $gst_structure[0]->sgst) / 100 %>
	                              <%assign var='igst_amount' value=($total_rate_old * $gst_structure[0]->igst) / 100 %>
	                              <%assign var='gst_amount' value=$cgst_amount + $sgst_amount + $igst_amount %>
	                              <%assign var='total_rate' value=$total_rate_old + $cgst_amount + $sgst_amount + $igst_amount %>
	                              <%assign var='final_po_amount' value=$final_po_amount + $total_rate %>
                              <tr>
                                 <td><%$i %></td>
                                 <td><%$child_part_data[0]->part_number %></td>
                                 <td><%$child_part_data[0]->part_description %></td>
                                 <td><%$gst_structure[0]->code %></td>
                                 <td><%$uom_data[0]->uom_name %></td>
                                 <td><%$p->qty %></td>
                                 <%if ($type != "normal") %>
                                 <td><%$p->process %></td>
                                 <%/if%>
                                 <td><%$part_rate_new %></td>
                                 <td><%$p->created_date %></td>
                                 <td>
                                    <%if ($new_po[0]->status == "pending") %>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<%$i %>">
                                    Edit
                                    </button>
                                    <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelete<%$i %>">
                                    Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<%$i %>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <form action="<%base_url('update_po_parts') %>" method="POST">
                                                      <div class="col-lg-12">
                                                         <div class="form-group">
                                                            <label for="">Enter Qty <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="qty" value="<%$p->qty %>" placeholder="Enter QTY " required class="form-control">
                                                            <input type="hidden" name="part_number" value="<%$child_part_data[0]->part_number %>" placeholder="Enter part_number " required class="form-control">
                                                            <input type="hidden" name="id" value="<%$p->id %>" required class="form-control">
                                                         </div>
                                                      </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                          </div>
                                          </form>
                                       </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaldelete<%$i %>" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <form action="<%base_url('delete') %>" method="POST">
                                                      <div class="col-lg-12">
                                                         <div class="form-group">
                                                            <label for=""> <b>Are You Sure Want To
                                                            Delete This ? </b> </label>
                                                            <input type="hidden" name="id" value="<%$p->id %>" required class="form-control">
                                                            <input type="hidden" name="table_name" value="po_parts" required class="form-control">
                                                         </div>
                                                      </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                          </div>
                                          </form>
                                       </div>
                                    </div>
                                    <%else %>
                                    <%if ($session_data['type'] == 'admin' || $session_data['type'] == 'Admin') %>
                                    <%if ($statusNew) %>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal123123123<%$i %>">
                                    PO Amendment
                                    </button>
                                    <div class="modal fade" id="exampleModal123123123<%$i %>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PO
                                                   Amendment
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <form action="<%base_url('update_po_parts_amendment') %>" method="POST">
                                                            <label for="">Enter Qty <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="qty" value="<%$p->new_po_qty %>" placeholder="Enter QTY " required class="form-control">
                                                            <input type="hidden" name="id" value="<%$p->id %>" required class="form-control">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                          </div>
                                          </form>
                                       </div>
                                    </div>
                                    <%if ($p->po_approved_updated == "pending") %>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalapproved<%$i %>">
                                    Approve Amendment
                                    </button>
                                    <div class="modal fade" id="exampleModalapproved<%$i %>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PO
                                                   Amendment Approval 
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <form action="<%base_url('update_po_parts_amendment_approve') %>" method="POST">
                                                            <label for="">Are You Sure Want To
                                                            Approve this Amendment ? <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="qty" value="<%$p->new_po_qty %>" placeholder="Enter QTY " required class="form-control">
                                                            <input type="hidden" name="id" value="<%$p->id %>" required class="form-control">
                                                            <input type="hidden" name="new_po_id" value="<%$new_po[0]->id %>" required class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                      <label for="">Enter PO Amendment Number
                                                      <span class="text-danger">*</span>
                                                      </label>
                                                      <input type="text" name="po_a_number" placeholder="Enter Po Amendment Number " required class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                      <label for="">Privious Qty <span class="text-danger">*</span>
                                                      </label>
                                                      <input type="number" name="qty" readonly value="<%$p->qty %>" placeholder="Enter QTY " required class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                      <label for="">New Qty <span class="text-danger">*</span>
                                                      </label>
                                                      <input type="number" name="new_qty" readonly value="<%$p->new_po_qty %>" placeholder="Enter QTY " required class="form-control">
                                                      <input type="hidden" name="id" value="<%$p->id %>" required class="form-control">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                          </div>
                                          </form>
                                       </div>
                                    </div>
                                    <%/if%>
                                    <%if ($p->po_a_number != "") %>
                                    <br>
                                    Amendment No : <%$p->po_a_number %>
                                    <br>
                                    Amendment Date  <%$p->date %>
                                    <%/if%>
                                    <%/if%>
                                    <%/if%>
                                    <%/if%>
                                 </td>
                                 <td><%$total_rate_old %></td>
                                 <td><%$gst_amount %></td>
                                 <td><%$total_rate %></td>
                              </tr>
                              <%assign var='i' value=$i+1%>
                              <%/foreach%>
                              <%/if%>
                           </tbody>
                           <tfoot>
                              <%if ($po_parts) %>
                              <tr>
                                 <th colspan="11">Total</th>
                                 <th><%$final_po_amount %></th>
                              </tr>
                              <%/if%>
                           </tfoot>
                        </table>
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