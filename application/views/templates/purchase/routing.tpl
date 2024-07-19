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
                        <h1>Routing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('') %>">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Weight</th>
                                            <th>Size</th>
                                            <th>Thickness</th>
                                            <th>Add Routing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<%assign var="i" value=1%>
                                        <%if count($child_part_master) > 0 %>
                                            <%foreach from=$child_part_master item=poo %>
                                                <%if ($poo->sub_type == "Subcon grn" || $poo->sub_type == "Subcon Regular") %>
			                                        <tr>
			                                            <td><%$i %></td>
			                                            <td><%$poo->part_number %></td>
			                                            <td><%$poo->part_description %></td>
			                                            <td><%$poo->weight %></td>
			                                            <td><%$poo->size %></td>
			                                            <td><%$poo->thickness %></td>
			                                            <td>
			                                                <a class="btn btn-primary"
			                                                    href="<%base_url('addrouting/') %><%$poo->id %>">Add
			                                                    Routing</a>
			                                            </td>
			                                        </tr>
			                                        <%assign var="i" value=$i+1%>
                                        		<%/if%>
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