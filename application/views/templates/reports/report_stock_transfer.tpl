<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reports : Stock</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
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
                        <div class="card">
                        <div class="card-header">
                                <div class="row">
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Number From </th>
                                            <th>Part Number To </th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Transferred Stock </th>
                                            <th>Date</th>
                                            <th>Time </th>                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%if $stock_report%>
                                            <%foreach from=$stock_report item=g name=report%>
                                                <tr>
                                                    <td><%$smarty.foreach.report.iteration%></td>
                                                    <td><%$g->part_number_from%></td>
                                                    <td><%$g->part_number_to%></td>
                                                    <td><%$g->from%></td>
                                                    <td><%$g->to%></td>
                                                    <td><%$g->actual_stock%></td>
                                                    <td><%$g->updated_time%></td>
                                                    <td><%$g->updated_date%></td>
                                                </tr>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
