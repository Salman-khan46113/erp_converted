<div style="width:100%;" class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Supplier List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('') %>">Home</a></li>
                            <li class="breadcrumb-item active">Supplier List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
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
                                            <th>Supplier Name</th>
                                            <th>Supplier Number</th>
                                            <th>Supplier Location</th>
                                            <th class="text-center">View PO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<%assign var='i' value=1%>
                                        <%if count($supplier_list) > 0 %>
                                            <%foreach from=$supplier_list item=s %>
                                        	<tr >
                                                    <td width="5%"> <%$i %></td>
                                                    <td width="30%"><%$s->supplier_name %></td>
                                                    <td width="15%"><%$s->supplier_number %></td>
                                                    <td width="35%"><%$s->location %></td>
                                                    <td width="10%" class="text-center"><a href="<%base_url('view_po_by_supplier_id/') %><%$s->id %>" class="btn btn-primary" href="">View PO</a></td>
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