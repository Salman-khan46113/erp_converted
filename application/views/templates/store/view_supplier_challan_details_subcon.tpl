<div class="wrapper">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer  Challan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<%base_url('') %>">Home</a></li>
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
              <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                Add Challan </button> -->
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<%base_url('generate_challan') %>" method="post">
                        <div class="form-group">
                          <label for="Enter Challan Number">Challan Number <span class="text-danger">*</span> </label>
                          <input type="text" name="challan_number" placeholder="Challan Number " required class="form-control">
                        </div>
                        <label for="Enter Challan Number">Select Supplier <span class="text-danger">*</span> </label>
                        <select class="form-control select2" name="supplier_id" style="width: 100%;">
                          <%foreach from=$supplier item=c %>
                          	<option value="<%$c->id %>"><%$c->supplier_name %></option>
                          <%/foreach%>
                        </select>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </form>
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
                    <th>Challan Number</th>
                    <th>Challan Details</th>
                  </tr>
                </thead>
                <tbody>
                  <%assign var='i' value= 1 %>
                    <%if ($challan_data) %>
                        <%foreach from=$challan_data item=c %>
		                  <tr>
		                    <td><%$i %></td>
		                    <td><%$c->challan_number %></td>
		                    <td>
		                      <a class="btn btn-primary" href="<%base_url('view_supplier_challan_details_part_wise_subcon/') %><%$c->id %>">View Challan Details</a>
		                    </td>
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