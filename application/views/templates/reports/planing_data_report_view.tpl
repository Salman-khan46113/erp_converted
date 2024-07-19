<div class="wrapper" style="width:2000px">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Planning Data </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <form action="<%$smarty.server.PHP_SELF%>?action=planing_data_report_view" method="post">
                                            <div class="form-group">
                                                <label for="">Select Customer</label>
                                                <select name="customer_id" id="" class="form-control select2">
                                                    <option value="0">All</option>
                                                    <%foreach $c in $customer%>
                                                    <option <%if $c->id eq $customer_id%>selected<%/if%> value="<%$c->id%>"><%$c->customer_name%></option>
                                                    <%/foreach%>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Financial Year</label>
                                            <select name="financial_year" id="" class="form-control select2">
                                                <%for $i=2020 to 2027%>
                                                <%$year="FY-$i"%>
                                                <option value="<%$year%>"><%$year%></option>
                                                <%/for%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Month</label>
                                            <select name="month_id" id="" class="form-control select2">
                                                <option value="MAR">MAR</option>
                                                <option value="APR">APR</option>
                                                <option value="MAY">MAY</option>
                                                <option value="JUN">JUN</option>
                                                <option value="JUL">JUL</option>
                                                <option value="AUG">AUG</option>
                                                <option value="SEP">SEP</option>
                                                <option value="OCT">OCT</option>
                                                <option value="NOV">NOV</option>
                                                <option value="DEC">DEC</option>
                                                <option value="JAN">JAN</option>
                                                <option value="FEB">FEB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mt-4">Search</button>
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
                                            <th>Customer Part Number</th>
                                            <th>Customer Part Description</th>
                                            <th>Customer Name</th>
                                            <th>Month</th>
                                            <th>Schedule Qty 1</th>
                                            <th>Schedule Qty 2</th>
                                            <th>Job Card Qumulative Qty</th>
                                            <th>Job Card Balance Qty</th>
                                            <th>Job Card Issued</th>
                                            <th>Job Card Closed</th>
                                            <th>Customer Part Price</th>
                                            <th>Dispatch (sales qty)</th>
                                            <th>Balance Schedule qty</th>
                                            <th>Subtotal Schedule</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <%assign var=i value = 1%>
                                        <%foreach $planing_data as $t%>

                                        <tr>
                                            <td><%$i%></td>
                                            <td><%$customer_part_data[$t->id][0]->part_number%></td>
                                            <td><%$customer_part_data[$t->id][0]->part_description%></td>
                                            <td><%$customers_data[$t->id][0]->customer_name%></td>
                                            <td><%$t->month%></td>
                                            <td><%$planing_data_new[$t->id][0]->schedule_qty%></td>
                                            <td><%$planing_data_new[$t->id][0]->schedule_qty_2%></td>
                                            <td><%$job_card_qty[$t->id]%></td>
                                            <td>
                                            <%if empty($planing_data_new[$t->id][0]->schedule_qty_2)%>
                                            <%$planing_data_new[$t->id][0]->schedule_qty-$job_card_qty[$t->id]%>
                                            <%else%>
                                            <%$planing_data_new[$t->id][0]->schedule_qty_2-$job_card_qty[$t->id]%>
                                            <%/if%>
                                            </td>
                                            <td><%$issued[$t->id]%></td>
                                            <td><%$closed[$t->id]%></td>
                                            <td><%$rate[$t->id]%></td>
                                            <td><%$dispatch_sales_qty[$t->id]%></td>
                                            <td><%$balance_s_qty[$t->id]%></td>
                                            <td>
                                            <%if empty($planing_data_new[$t->id][0]->schedule_qty_2)%>
                                                <%$subtotal1[$t->id]%>
                                                <%else%>   
                                                <%$subtotal2[$t->id]%>
                                            <%/if%>
                                            </td>
                                            <td>
                                            
                                                <a class="btn btn-info" href="<%$base_url%>view_planing_data/<%$t->id%>">View Details</a>
                                            </td>
                                        </tr>
                                        <%if $customers_data[$t->id][0]->id eq $customer_id%>
                                        <tr>
                                            <td><%$i%></td>
                                            <td><%$customer_part_data[$t->id][0]->part_number%></td>
                                            <td><%$customer_part_data[$t->id][0]->part_description%></td>
                                            <td><%$customers_data[$t->id][0]->customer_name%></td>
                                            <td><%$t->month%></td>
                                            <td>
                                                <a class="btn btn-info" href="<%$base_url%>view_planing_data/<%$t->id%>">View Details</a>
                                            </td>
                                        </tr>
                                       <%/if%>
                                       <%assign var=i value = $i+1%>
                                        <%/foreach%>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align:right;">
                                            <th colspan="11">Total Sales Value</th>
                                            <th><%$total1%></th>
                                            <th><%$total2%></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
