<div class="wrapper">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Supplier Challan</h1>
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
                    <%assign var='i' value=1 %>
                    <%if ($challan_data) %>
                        <%foreach from=$challan_data item=c %>
		                  <tr>
		                    <td><%$i %></td>
		                    <td><%$c->challan_number %></td>
		                    <td>
		                      <a class="btn btn-primary" href="<%base_url('view_supplier_challan_details_part_wise/') %><%$c->id %>">View Challan Details</a>
		                    </td>
		                  </tr>
		                    <%assign var='i' value=$i+1%>
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