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
            <a href="<%base_url('view_add_challan_subcon') %>" class="btn btn-danger">
            < Back </a>
            <%assign var='expired' value="no" %>
            <%if ($new_po[0]->expiry_po_date > date('Y-m-d')) %>
                <%assign var='expired' value="yes" %>
            <%else %>

            <%/if%>
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
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Challan Number <span class="text-danger">*</span> </label>
                      <input type="text" readonly value="<%$challan_data[0]->challan_number %>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Customer Name <span class="text-danger">*</span> </label>
                      <input type="text" readonly value="<%$customer[0]->customer_name %>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Challan Date & Time <span class="text-danger">*</span>
                      </label>
                      <input type="text" readonly value="<%$challan_data[0]->created_date %> / <%$challan_data[0]->created_time %>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <%if ($challan_data[0]->status != "completed") %>
	                    <button type="submit" data-bs-toggle="modal" class="btn btn-sm btn-dark mt-4" data-bs-target="#challanCOmplete">
	                    Complete Challan
	                    </button>
                    <%/if%>
                    <div class="modal fade" id="challanCOmplete" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Status Of
                              Challan
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<%base_url('change_challan_status_subcon') %>" method="POST">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="payment_terms">Are You Sure Want To
                                    Complete This Challan ? </label><span class="text-danger">*</span>
                                    <input type="hidden" value="<%$challan_id %>" name="challan_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save
                                changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <form action="<%base_url('add_challan_parts_subcon') %>" method="post">
                        <label for="">Select Part Number // Description // Current Stock<span class="text-danger">*</span> </label>
                        <select name="part_id" id="" required class="form-control select2">
                          <%if ($challan_data[0]->status == "completed") %>
                                Challan Completed
                          <%else %>
		                        <%if ($child_part) %>
		                            <%foreach from=$child_part item=c %>
		                                    <%if ($c->sub_type == "customer_bom") %>
					                          <option value="<%$c->id %>">
					                            <%$c->part_number %> // <%$c->part_description %>/ <%$c->child_part_data[0]->stock %>
					                          </option>
				                            <%/if%>
		                            <%/foreach%>
		                        <%/if%>

                         <%/if%>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                  <div class="form-group">
                  <label for="">Enter input Qty <span class="text-danger">*</span> </label>
                  <input type="number" step="any" name="qty" placeholder="Enter QTY " required class="form-control">
                  <input type="hidden" name="challan_id" value="<%$challan_data[0]->id %>" required class="form-control">
                  </div>
                  </div>
                  <div class="col-lg-3">
                  <div class="form-group">
                  <label for="">Select Process <span class="text-danger">*</span> </label>
                  <select name="process" required id="" class="form-control select2">
                  <%if ($process) %>
                        <%foreach from=$process item=s %>
		                  	<option value="<%$s->name %>"><%$s->name %></option>
		                <%/foreach%>
                   <%/if%>
                  </select>
                  </div>
                  </div>
                  <div class="col-lg-3">
                  <div class="form-group">
                  <%if ($challan_data[0]->status == "completed") %>
                       Challan Completed
                  <%else %>
	                  <button type="submit" class="btn btn-info btn-lg mt-4">Add Part TO
	                  challan</button>
                  <%/if%>
                  </div>
                  </div>
                  </form>
                </div>
              </div>
              <div class="card-header">
                <%if ($po_parts) %>
                  	<%if ($new_po[0]->status == "pending") %>

                      	<%if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') %>
			                <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#lock">
			                Lock PO
			                </button>
		                <%/if%>
		            <%/if%>
                <%/if%>
                <%if ($new_po[0]->status == "lock") %>
	                  <%if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') %>
	                  	<button type="button" class="btn btn-success ml-1" data-bs-toggle="modal" data-bs-target="#accpet">
		                Accept (Released) PO
		                </button>
		                <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#delete">
		                Reject (delete) PO
		                </button>
		              <%/if%>
                <%else %>
                  <%if ($new_po[0]->status != "pending") %>
	                <%* <!-- <button type="button" disabled class="btn btn-success ml-1" data-bs-toggle="modal" data-bs-target="#accpet">
	                  PO Already Released
	                  </button> -->
	                <!-- <a href="<?php echo base_url('download_my_pdf/') . $new_po[0]->id ?>" class="btn btn-primary" href="">Download</a> --> *%>
	               <%/if%>
                <%/if%>
                <!-- Modal -->
                <div class="modal fade" id="accpet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <form action="<%base_url('accept_po_sub') %>" method="POST">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for=""><b>Are You Sure Want To Released This
                                PO?</b> </label>
                                <input type="hidden" name="id" value="<%$new_po[0]->id %>" required class="form-control">
                                <input type="hidden" name="status" value="accpet" required class="form-control">
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="modal fade" id="lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <form action="<%base_url('accept_po_sub') %>" method="POST">
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

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
                                <input type="hidden" name="table_name" value="new_po_sub" required class="form-control">
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                      <th>Qty </th>
                      <th>Process</th>
                      <th>HSN</th>
                      <th>Value</th>
                      <th>Remaining Qty </th>
                      <th>Edit / Delete</th>
                      <th>Action</th>
                      <th>History</th>
                    </tr>
                  </thead>
                  <tbody>
                    <%if ($challan_parts) %>
                		<%assign var='i' value=1%>
                		<%assign var='final_po_amount' value=0%>
                        <%foreach from=$challan_parts item=p %>
			                    <tr>
			                      <td><%$i %></td>
			                      <td><%$p->part_number %></td>
			                      <td><%$p->part_description %></td>
			                      <td><%$p->qty %></td>
			                      <td><%$p->process %></td>
			                      <td><%$p->hsn %></td>
			                      <td><%$p->value %></td>
			                      <td><%$p->remaning_qty %></td>
			                      <td>
			                        <%if ($challan_data[0]->status != "completed") %>
			                         	 <!-- Button trigger modal -->
					                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa123123123123l<%$i %>">
					                        Edit
					                        </button>
					                        <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#exampleModaldelet213123e<%$i %>">
					                        Delete
					                        </button>
					                        <!-- Modal -->
					                        <div class="modal fade" id="exampleModa123123123123l<%$i %>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					                          <div class="modal-dialog modal-dialog-centered">
					                            <div class="modal-content">
					                              <div class="modal-header">
					                                <h5 class="modal-title" id="exampleModalLabel">Update
					                                </h5>
					                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

					                                </button>
					                              </div>
					                              <div class="modal-body">
					                                <div class="row">
					                                  <div class="col-lg-12">
					                                    <div class="form-group">
					                                      <form action="<%base_url('update_challan_parts_subcon') %>" method="POST">
					                                        <label for="">Enter Qty <span class="text-danger">*</span>
					                                        </label>
					                                        <input type="number" name="qty" value="<%$p->qty %>" placeholder="Enter QTY " required class="form-control">
					                                        <input type="hidden" name="id" value="<%$p->id %>" placeholder="Enter QTY " required class="form-control">
					                                    </div>
					                                  </div>
					                                </div>
					                              </div>
					                              <div class="modal-footer">
					                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					                              <button type="submit" class="btn btn-primary">Update</button>
					                              </div>
					                            </div>
					                            </form>
					                          </div>
					                        </div>
					                        <!-- Modal -->
					                        <div class="modal fade" id="exampleModaldelet213123e<%$i %>" tabindex="-1" aria-labelledby="" aria-hidden="true">
					                          <div class="modal-dialog modal-dialog-centered">
					                            <div class="modal-content">
					                              <div class="modal-header">
					                                <h5 class="modal-title" id="exampleModalLabel">Delete
					                                </h5>
					                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

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
					                                        <input type="hidden" name="table_name" value="challan_parts_subcon" required class="form-control">
					                                      </div>
					                                    </div>
					                                </div>
					                              </div>
					                              <div class="modal-footer">
					                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					                              <button type="submit" class="btn btn-primary">Update</button>
					                              </div>
					                            </div>
					                            </form>
					                          </div>
					                        </div>
			                        <%else %>
			                          Can't Update , This  is <%$new_sales[0]->status %>
			                        <%/if%>
			                      </td>
			                      <td>
			                        <%if ($p->challan_parts_history_id != '') %>
			                              <%if ($p->challan_parts_history_status == "completed") %>
			                                  Stock updated
			                              <%else %>
					                        <button type="submit" data-bs-toggle="modal" class="btn btn-sm btn-danger" data-bs-target="#exampleModal2123<%$i %>">
					                        Accept Challan Qty
					                        </button>
				                          <%/if%>
			                        <%else %>
			                          	<%if ($p->remaning_qty > 1) %>
				                        <button type="submit" data-bs-toggle="modal" class="btn btn-sm btn-primary" data-bs-target="#exampleModal2<%$i %>">
				                        Challan Return Qty
				                        </button>
				                        <%/if%>
			                        <%/if%>
			                        <div class="modal fade" id="exampleModal2123<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			                            <div class="modal-content">
			                              <div class="modal-header">
			                                <h5 class="modal-title" id="exampleModalLabel">Accept
			                                  Qty
			                                </h5>
			                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

			                                </button>
			                              </div>
			                              <div class="modal-body">
			                                <form action="<%base_url('update_challan_parts_history_challan') %>" method="POST">
			                                  <div class="row">
			                                    <div class="col-lg-12">
			                                      <div class="form-group">
			                                        <label for="payment_terms">Qty</label><span class="text-danger">*</span>
			                                        <input type="text" disabled value="<%$p->challan_parts_history_qty %>" name="123" required class="form-control" placeholder="Supplier Challan Number">
			                                        <input type="hidden" value="<%$p->challan_parts_history_qty  %>" name="qty_main" required class="form-control" placeholder="Supplier Challan Number">
			                                        <input type="hidden" value="<%$p->challan_parts_history_id  %>" name="challan_parts_history_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
			                                        <input type="hidden" value="<%$p->part_id %>" name="part_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
			                                        <input type="hidden" value="<%$p->challan_id %>" name="challan_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
			                                      </div>
			                                    </div>
			                                    <div class="col-lg-12">
			                                      <div class="form-group">
			                                        <label for="payment_terms">Enter Accept
			                                        Qty</label><span class="text-danger">*</span>
			                                        <input type="number" max="<%$p->challan_parts_history_accepeted_qty %>" name="accepeted_qty" required class="form-control" placeholder="Enter Qty">
			                                      </div>
			                                    </div>
			                                  </div>
			                                  <div class="modal-footer">
			                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			                                    <button type="submit" class="btn btn-primary">Save
			                                    changes</button>
			                                  </div>
			                                </form>
			                              </div>
			                            </div>
			                          </div>
			                        </div>
			                        <div class="modal fade" id="exampleModal2<%$i %>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			                            <div class="modal-content">
			                              <div class="modal-header">
			                                <h5 class="modal-title" id="exampleModalLabel">Return
			                                  Qty
			                                </h5>
			                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

			                                </button>
			                              </div>
			                              <div class="modal-body">
			                                <form action="<%base_url('add_challan_parts_history_challan') %>" method="POST">
			                                  <div class="row">
			                                    <div class="col-lg-12">
			                                      <div class="form-group">
			                                        <label for="payment_terms">Supplier
			                                        Challan Number</label><span class="text-danger">*</span>
			                                        <input type="text" name="supplier_challan_number" required class="form-control" placeholder="Supplier Challan Number">
			                                        <input type="hidden" value="<%$challan_id %>" name="challan_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
			                                        <input type="hidden" value="<%$p->part_id  %>" name="part_id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bank Details">
			                                      </div>
			                                    </div>
			                                    <div class="col-lg-12">
			                                      <div class="form-group">
			                                        <label for="payment_terms">Enter
			                                        Qty</label><span class="text-danger">*</span>
			                                        <input type="number" max="<%$p->remaning_qty %>" min="1" name="qty" required class="form-control" placeholder="Enter Qty">
			                                      </div>
			                                    </div>
			                                  </div>
			                                  <div class="modal-footer">
			                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			                                    <button type="submit" class="btn btn-primary">Save
			                                    changes</button>
			                                  </div>
			                                </form>
			                              </div>
			                            </div>
			                          </div>
			                        </div>
			                      </td>
			                      <td>
			                        <a class="btn btn-info" href="<%base_url('view_challan_parts_history_subcon/') %><%$p->challan_id %>/<%$p->part_id %>">History</a>
			                      </td>
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
