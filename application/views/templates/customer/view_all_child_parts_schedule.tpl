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
                        <h1>Monthly MRP Req</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <a class="btn btn-dark" href="<%$base_url%>planing_data/<%$financial_year%>/<%$month%>/0">Back</a>
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Update Schedule Qty 2 </button> -->
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add Planing</button> -->
                                <!-- Modal -->
                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Item part Number</th>
                                            <th>Item part Description</th>                                         
                                            <th>Actual Stock</th>
                                            <th>Net MRP Req</th>
                                            <th>Required Qty </th>
                                            <th>Part Rate</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%assign var="total" value=0%>
                                      
                                        <%if $child_part_master%>
                                            <%foreach from=$child_part_master_main item=t%>
                                                <%assign var="subtotal" value=0%>
                                                <%assign var="shortage_qty" value=0%>
                                                <%assign var="actual_stock" value=0%>
                                                <%if $child_part_master[$t->part_number]%>
                                                    
                                                    <%assign var="req_qty" value=0%>
                                                    <%if $planing_data[$child_part_master[0]->child_part_id]%>
                                                        <%foreach from=$planing_data[$child_part_master[0]->child_part_id] item=t%>
                                                            <%assign var="schedule_qty_2" value=$t->schedule_qty_2%>
                                                            <%assign var="schedule_qty" value=$t->schedule_qty%>
                                                            <%assign var="net_schedule" value=0%>

                                                            <%if $schedule_qty_2 != 0%>
                                                                <%assign var="net_schedule" value=$schedule_qty_2 - $schedule_qty%>
                                                                <%assign var="req_qty" value=$req_qty + $t->required_qty + ($net_schedule * $t->bom_qty)%>
                                                            <%else%>
                                                                <%assign var="req_qty" value=$req_qty + ($t->schedule_qty * $t->bom_qty)%>
                                                            <%/if%>
                                                            <%assign var="actual_stock" value=$actual_stock + $t->actual_stock%>
                                                            <%assign var="shortage_qty" value=$shortage_qty + ($req_qty - $child_part_data[$t->part_number][0]->stock)%>
                                                        <%/foreach%>
                                                    <%/if%>
                                                    <%assign var="subtotal" value=$child_part_master[$t->part_number][0]->part_rate * $req_qty%>
                                                    <%assign var="total" value=$total + $subtotal%>
                                                    <%assign var="net_mrp_req" value=$req_qty - $child_part_data[$t->part_number][0]->stock%>
                                                <%/if%>
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$child_part_data[$t->part_number][0]->part_number%></td>
                                                    <td><%$child_part_data[$t->part_number][0]->part_description%></td>
                                                    <td><%$child_part_data[$t->part_number][0]->stock%></td>
                                                    <td class="<%if $net_mrp_req > 0%> text-danger <%else%> text-success <%/if%>"><%$net_mrp_req%></td>
                                                    <td><%$req_qty%></td>
                                                    <td><%$child_part_master[$t->part_number][0]->part_rate%></td>
                                                    <td><%$subtotal%></td>
                                                </tr>
                                                <%assign var="i" value=$i+1%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align:right">
                                            <th colspan="7">Total Purchase Value</th>
                                            <th><%$total%></th>
                                        </tr>
                                    </tfoot>
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
