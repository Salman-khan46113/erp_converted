<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer Routing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Add Routing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if ($customer_part_master) %>
                                            <%foreach from=$customer_part_master item=poo %>
                                            <tr>
                                                <td><%$i %></td>
                                                <td><%$poo->part_number %></td>
                                                <td><%$poo->part_description %></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<%base_url('addrouting_customer_subcon/') %><%$poo->id %>">Add
                                                                Routing</a>
                                                </td>
                                            </tr>
                                            <%assign var="i" value=$i+1%>
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