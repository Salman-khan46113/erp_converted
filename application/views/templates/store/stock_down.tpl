<%assign var='isMultiClient' value=$session_data['isMultipleClientUnits']%>
<div class="wrapper container-xxl flex-grow-1 container-p-y">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Reports
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing">
            <i class="ti ti-chevrons-right"></i>
            <em>Material Requisition</em></a>
        </h1>
        <br>
        <span>Material Transfer Requests</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
       <%if (checkGroupAccess("stock_down","add","No")) %> 
         <button type="button" class="btn btn-seconday float-left" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                  New Request</button>
       <%/if%>
       <%if (checkGroupAccess("stock_down","export","No")) %> 
         <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
          <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <%/if%>
    </div>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Material Transfer Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                  </div>
                  <div class="modal-body">
                    <form action="<%base_url('add_stock_up') %>" method="POST"
                      enctype='multipart/form-data' id="add_stock_up" class="custom-form">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="po_num">Select Part Number / Description
                            <%if ($isMultiClient == "true") %>
                              / Stock 
                            <%/if%>
                            </label><span class="text-danger">*</span>
                            <select name="part_id"  class="from-control select2 required-input" style="width: 100%;">
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
	                            <select name="clientUnitFrom" id="clientIdFrom"  disabled class="form-control select2 required-input" style="width: 100%;">
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
	                            <select name="clientUnitTo" id="clientIdTo" class="form-control select2 required-input" style="width: 100%;">
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
                            <input type="text" name="reason" 
                              placeholder="Enter Reason" class="form-control required-input">
                          </div>
                          <div class="form-group">
                            <label for="po_num">Upload document</label>
                            <input type="file" name="uploading_document"
                              class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="po_num">Enter Qty <span
                              class="text-danger">*</span></label>
                            <input type="text" name="qty" step="any"
                              placeholder="Enter Qty" name="qty" 
                              class="form-control required-input onlyNumericInput">
                            <input type="hidden" name="type" value="minus" step="any"
                              placeholder="Enter Qty" name="qty" required
                              class="form-control">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="">
              <table id="example1" class="table table-striped">
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
                                    <%if (checkGroupAccess("stock_down","update","No")) %> 
  							                       <a class="btn btn-warning transfer-stock-value"
  							                        href="javascript:void(0)" data-href="<%base_url('remove_stock/') %><%$c->id %>">Click To Transfer Stock</a>
                                    <%else%>
                                      <%display_no_character("")%>
                                    <%/if%>
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
<script>
            var base_url = <%base_url()|json_encode%> ;
</script>
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
      var file_name = "material_transfer_request";
      var pdf_title = "Material Transfer Requests";
      var table = $("#example1").DataTable({
        dom: "Bfrtilp",
        buttons: [
            {
                extend: "csv",
                text: '<i class="ti ti-file-type-csv"></i>',
                init: function (api, node, config) {
                    $(node).attr("title", "Download CSV");
                },
                customize: function (csv) {
                        var lines = csv.split('\n');
                        var modifiedLines = lines.map(function(line) {
                            var values = line.split(',');
                            values.splice(6, 1);
                            values.splice(4, 1);
                            return values.join(',');
                        });
                        return modifiedLines.join('\n');
                    },
                    filename : file_name
                },
          
            {
                extend: "pdf",
                text: '<i class="ti ti-file-type-pdf"></i>',
                init: function (api, node, config) {
                    $(node).attr("title", "Download Pdf");
                },
                filename: file_name,
                customize: function (doc) {
                    doc.pageMargins = [15, 15, 15, 15];
                    doc.content[0].text = pdf_title;
                    doc.content[0].color = theme_color;
                    // doc.content[1].table.widths = ["19%", "19%", "13%", "13%", "15%", "15%"];
                    doc.content[1].table.body[0].forEach(function (cell) {
                        cell.fillColor = theme_color;
                    });
                    doc.content[1].table.body.forEach(function (row, index) {
                        row.splice(6, 1);
                        row.splice(4, 1);
                        row.forEach(function (cell) {
                            // Set alignment for each cell
                            cell.alignment = "center"; // Change to 'left' or 'right' as needed
                        });
                    });
                },
            },
        ],
        searching: true,
        // scrollX: true,
        scrollY: true,
        bScrollCollapse: true,
        columnDefs: [{ sortable: false, targets: 6 },{ sortable: false, targets: 4 }],
        pagingType: "full_numbers",
       
        
        });
        $('.dataTables_length').find('label').contents().filter(function() {
                return this.nodeType === 3; // Filter out text nodes
        }).remove();
        setTimeout(function(){
            $(".dataTables_length select").select2({
                minimumResultsForSearch: Infinity
            });
        },1000)
  });

  $("#add_stock_up").submit(function(e){
      e.preventDefault();
      let flag = formValidate("add_stock_up");
      if(flag){
        return;
      }
      var formData = new FormData($('#add_stock_up')[0]);

      $.ajax({
        type: "POST",
        url: base_url+"add_stock_up",
        // url: "add_invoice_number",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var responseObject = JSON.parse(response);
          var msg = responseObject.messages;
          var success = responseObject.success;
          if (success == 1) {
            toastr.success(msg);
            $(this).parents(".modal").modal("hide")
            setTimeout(function(){
              window.location.reload();
            },1000);

          } else {
            toastr.error(msg);
          }
        },
        error: function (error) {
          console.error("Error:", error);
        },
      });
    });
  $(document).on("click",".transfer-stock-value",function(e){
      e.preventDefault();
      console.log("ok")
      var href = $(this).attr("data-href");
      $.ajax({
        type: "GET",
        url: href,
        // url: "add_invoice_number",,
        success: function (response) {
          var responseObject = JSON.parse(response);
          var msg = responseObject.messages;
          var success = responseObject.success;
          if (success == 1) {
            toastr.success(msg);
            $(this).parents(".modal").modal("hide")
            setTimeout(function(){
              window.location.reload();
            },1000);

          } else {
            toastr.error(msg);
          }
        },
        error: function (error) {
          console.error("Error:", error);
        },
      });
    });
  function formValidate(form_class = ''){
    let flag = false;
    $(".custom-form#"+form_class+" .required-input").each(function( index ) {
      var value = $(this).val();
      if(value == ''){
        flag = true;
        var label = $(this).parents(".form-group").find("label").contents().filter(function() {
          return this.nodeType === 3; // Filter out non-text nodes (nodeType 3 is Text node)
        }).text().trim();
        var exit_ele = $(this).parents(".form-group").find("label.error");
        if(exit_ele.length == 0){
          var start ="Please enter ";
          if($(this).prop("localName") == "select"){
            var start ="Please select ";
          }
          label = ((label.toLowerCase()).replace("enter", "")).replace("select", "");
          var validation_message = start+(label.toLowerCase()).replace(/[^\w\s*]/gi, '');
          var label_html = "<label class='error'>"+validation_message+"</label>";
          $(this).parents(".form-group").append(label_html)
        }

      }
    });
    return flag;
  }
</script>
