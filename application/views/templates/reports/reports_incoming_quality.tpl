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
                        <h1>Reports : Incoming Quality report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$smarty.const.BASE_URL%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Incoming Quality report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <form action="<%$smarty.const.BASE_URL%>reports_incoming_quality" method="post">

                                            <div class="form-group">
                                                <label for="">Select Month <span class="text-danger">*</span></label>
                                                <select required name="created_month" id=""
                                                    class="form-control select2">
                                                    <%foreach $month_data as $key => $val%>
                                                        <option <%if $month_number[$key] eq $created_month%>selected<%/if%>
                                                            value="<%$month_number[$key]%>"><%$val%></option>
                                                    <%/foreach%>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Select Year <span class="text-danger">*</span></label>
                                                <select required name="created_year" id="" class="form-control select2">
                                                <%for $i = 2022 to 2027%>
                                                <option <%if $i eq $created_year%>selected<%/if%> value="<%$i%>"><%$i%></option>
                                                 <%/for%>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-2">

                                        <input type="submit" class="btn btn-primary mt-4" value="Search">

                                    </div>
                                    </form>
                                </div>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                            Add </button> -->
                            </div>
                            <!-- Modal -->
                           

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier name</th>
                                            <th>Part No</th>
                                            <th>Part Description</th>
                                            <th>GRN No</th>
                                            <th>GRN Date</th>
                                            <th>Received Qty</th>
                                            <th>Validation QTY</th>
                                            <th>Accepted QTY</th>
                                            <th>Rejected QTY</th>
                                            <th>Rejection Remark</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <%assign var=i value=1%>
                                   
                                        <%foreach from=$grn_details item=g%>
                                            <tr>
                                                <td><%$i%></td>
                                                <td><%$supplier_data[$g->supplier_id][0]->supplier_name%></td>
                                                <td><%$child_part_data[$g->part_id][0]->part_number%></td>
                                                <td><%$child_part_data[$g->part_id][0]->part_description%></td>
                                                <td><%$inwarding[$g->inwarding_id][0]->grn_number%></td>
                                                <td><%$g->created_date%></td>
                                                <td><%$g->qty%></td>
                                                <td><%$g->verified_qty%></td>
                                                <td><%$g->accept_qty%></td>
                                                <td><%$g->reject_qty%></td>
                                                <td><%$g->remark%></td>
                                            </tr>
                                            <%assign var=i value=$i+1%>
                                        <%/foreach%>
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