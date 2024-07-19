<%assign var='isMultiClient' value=$session_data['isMultipleClientUnits']%>
<div class="wrapper">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Material Transfer Requests</h1>
          <%assign var='role'  value=trim($session_data['type']) %>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<%base_url() %>">Home</a></li>
            <li class="breadcrumb-item active">Material Transfer Requests</li>
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
              <h3 class="card-title">
              </h3>
              <!-- Button trigger modal -->
              <%if ($role == "Admin" || $role=="production") %>
	              <button type="button" class="btn btn-primary float-left" data-toggle="modal"
	                data-target="#exampleModal">
	              New Request</button>
              <%/if%>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Material Transfer Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<%base_url('add_stock_up') %>" method="POST"
                      enctype='multipart/form-data'>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="po_num">Select Part Number / Description
                            <%if ($isMultiClient == "true") %>
                              / Stock 
                            <%/if%>
                            </label><span class="text-danger">*</span>
                            <select name="part_id" required class="from-control select2">
                              <option value="">Select</option>
                              <%if ($child_part) %>
                                    <%foreach from=$child_part item=c %>
                                        <%if ($c->stock > 0 ) %>
			                              <option value="<%$c->id %>">
			                                <%$c->part_number %>/ <%$c->part_description %>/<%$c->stock %>
			                              </option>
		                                <%/if%>
		                            <%/foreach%>
                                <%/if%>
                            </select>
                          </div>
                          <%if ($isMultiClient == "true") %>
	                          <div class="form-group">
	                            <label>Transfer From Unit</label><span class="text-danger">*</span><br>
	                            <select name="clientUnitFrom" id="clientIdFrom" required disabled class="form-control select2">
	                              <option value="">Select</option>
	                              <%foreach from=$client_list item=cl %>
		                              <option value="<%$cl->id %>/<%$cl->client_unit %>"
		                                <%if ($clintUnitId == $cl->id ) %>selected <%/if%>
		                                ><%$cl->client_unit %>
		                              </option>
	                              <%/foreach%>
	                            </select>
	                          </div>
	                          <div class="form-group">
	                            <label for="po_num">Transfer To Unit<span
	                              class="text-danger">*</span></label>
	                            <select name="clientUnitTo" id="clientIdTo" class="form-control select2">
	                            </select>
	                          </div>
                          <%else %>
	                          <input type="hidden" name="type" value="stock" placeholder="Unit from" name="clientUnitFrom" required
	                            class="form-control">
	                          <input type="hidden" name="type" value="production_qty" placeholder="Unit to" name="clientUnitTo" required
                            class="form-control">
                          <%/if%>
                          <div class="form-group">
                            <label for="po_num">Enter Reason <span
                              class="text-danger">*</span></label>
                            <input type="text" name="reason" required
                              placeholder="Enter Reason" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="po_num">Upload document</label>
                            <input type="file" name="uploading_document"
                              class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="po_num">Enter Qty <span
                              class="text-danger">*</span></label>
                            <input type="number" name="qty" step="any"
                              placeholder="Enter Qty" name="qty" required
                              class="form-control">
                            <input type="hidden" name="type" value="minus" step="any"
                              placeholder="Enter Qty" name="qty" required
                              class="form-control">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Request Number</th>
                    <th>Part Number / Description</th>
                    <th>Request Qty</th>
                    <th>UOM</th>
                    <th>Reason</th>
                    <th>Document</th>
                    <th>Request Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <%assign var='i' value=1 %>
                    <%if ($stock_changes) %>
                        <%foreach from=$stock_changes item=c %>
	                            <%if ($c->type == "minus") %>
					                  <tr>
						                    <td><%$i %></td>
						                    <td><%$c->id %></td>
						                    <td><%$c->part_number %>/<%$c->part_description %></td>
						                    <td><%$c->qty %></td>
						                    <td><%$c->uom_name %></td>
						                    <td><%$c->reason %></td>
						                    <td>
						                      <%if (empty($c->uploading_document)) %>
						                        
						                      <%else %>
							                      <a class="btn btn-dark" download
							                        href="<%base_url('documents/') %><%$c->uploading_document %>">Download</a>
							                  <%/if%>
						                    </td>
						                    <td><%$c->created_date %></td>
						                    <td>
						                      <%if ($c->status == "pending") %>
							                      <a class="btn btn-warning"
							                        href="<%base_url('remove_stock/') %><%$c->id %>">Click To Transfer Stock</a>
						                      <%else %>
						                          stock transferred
						                      <%/if%>
						                    </td>
					                  </tr>
			                  	<%assign var='i' value=$i+1 %>
			                    <%/if%>
	                    <%/foreach%>
                    <%/if%>
                </tbody>
              </table>
            </div>
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
	var url = <%site_url("P_Molding/get_filtered_clientUnit")|@json_encode%>;
  $(document).ready(function() {
     // $("#clientIdFrom").change(function() {
      var client_id = $("#clientIdFrom").val();
      $.ajax({
          url: url,
          type: "POST",
          data: {
              clientUnitFrom: client_id
          },
          cache: false,
          beforeSend: function() {},
          success: function(response) {
              if (response) {
                  $('#clientIdTo').html(response);
              } else {
                  $('#clientIdTo').html(response);
              }
  
          }
      });
  
  });
</script>