
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                               		<%($total_sales_value_yesterday[0]->MAINSUM > 0) ? $total_sales_value_yesterday[0]->MAINSUM :0%>
                                </h4>
                                <p>Total Sales Value YESTERDAY</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('pei_chart_sales_values_in_rs')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <%assign var="isMultipleClientUnits" value=$session_data['isMultipleClientUnits']%>
                    <%if ($isMultipleClientUnits == "false") %>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4><% number_format($total_value,2) %></h4>
                                    <p>Total RM Stock Value</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<%base_url('part_stocks')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <%else%>
                            <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                    <div style="display: flex;justify-content: space-between;">
                                        <div class="inner" style="padding-left: 1em;padding-top: 0.2em; flex-basis: 40%;;">
                                            <h4><%number_format($total_value,2)%><h4>
                                            <p>Total RM Stock - <br>Unit 1</p>
                                        </div>
                                        <div class="inner" style="padding-left: 1em;padding-top: 0.2em; flex-basis: 45%;">
                                            <h4><%number_format($total_value_unit2,2)%></h4>
                                            <p>Total RM Stock - <br>Unit 2</p>
                                        </div>
                                    </div>
                                        <a href="<%base_url('part_stocks')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                    <%/if%>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>
                                    <%number_format($grn_value_month[0]->MAINSUM,2)%>
                                    <sup style="font-size: 20px"></sup>
                                </h4>

                                <p>GRN Value Current Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?%base_url('reports_grn')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                                    <%$customer_ppm_last_month%>
                                </h4>

                                <p>Customer PPM Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('rejection_invoices')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><%($total_sales_value_month[0]->MAINSUM > 0)? number_format($total_sales_value_month[0]->MAINSUM,2) :  0 %>
                                </h4>
                                <p>Total Sales Value Current Month</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('pei_chart_sales_values_in_rs')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4><%number_format($total_value_fg,2)%></h4>
                                <p>Total FG Stock Value</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<%base_url('fw_stock')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h4>
                                	<%$subcon_challan_stock%>
                                </h4>

                                <p>Subcon challan stock value</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('subcon_supplier_challan_part_report')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4>
                                	<%$customer_ppm_fy%>
                                </h4>
                                <p>Customer PPM FY</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('rejection_invoices')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Production OEE</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('rejection_invoices')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Inhouse PPM</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('rejection_invoices')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><%$total_amntreceivetotal%></h4>

                                <p>Receivable Due Amount</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('receivable_report')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>
                                	--
                                </h4>

                                <p>Payable Due Amount</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('rejection_invoices')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4><%$total_gsttotal%></h4>

                                <p>Total Amount with GST</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<%base_url('receivable_report')%>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">                        
                        <div class="small-box bg-white">
                            <table class="table table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th rowspan="3" class="text-center align-middle">Total Production <br>on <%$yesterday_date%>
                                        </th>
                                        <th colspan="2">YESTERDAY</th>
                                    </tr>
                                    <tr>
                                    	<%foreach from=$shifts item=shift_data%>
                                    		<th><%$shift_data->shift_type%></th>
                                    	<%/foreach%>
                                       
                                    </tr>
                                    <tr>
                                    	<%foreach from=$shifts item=shift_data%>
                                    		<%assign var="shift_data_val" value=(array) $shift_data%>
                                    		<%if isset($shift_data_val['MAINSUM'])%>
                                    			<th><%$shift_data_val['MAINSUM']%></th>
                                    		<%else%>
                                    			<th>0</th>
                                    		<%/if%>
                                    	<%/foreach%>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                 <div class="row">
                  
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
