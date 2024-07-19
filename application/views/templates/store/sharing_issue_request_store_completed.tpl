<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sharing Issue Request - Completed</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('dashboard') %>">Home</a></li>
                            <li class="breadcrumb-item active">Assets</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div>
                <div class="row">
                    <br>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-info"
                                    href="<%base_url('sharing_issue_request_store') %>">View Pending Requests</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number / Description / Thickness / Weight</th>
                                            <th>Status</th>
                                            <th>Date & Time</th>
                                            <th>Actual Store Stock</th>
                                            <th>Required Qty</th>
                                            <th>Accept Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%if ($sharing_issue_request) %>
                                            <%assign var='i' value=1 %>
                                            <%foreach from=$sharing_issue_request item=u %>
                                                <tr>
                                                    <td><%$i %></td>
                                                    <td><%$u->part_number %> /
                                                        <%$u->part_description %>/
                                                        <%$u->thickness %>/
                                                        <%$u->weight %>
                                                    </td>
                                                    <td><%$u->status %></td>
                                                    <td><%$u->created_date %> / <%$u->created_time %></td>
                                                    <td>
                                                        <%$u->stock %>
                                                    </td>
                                                    <td><%$u->qty %></td>
                                                    <td>
                                                        <%$u->accepted_qty %>
                                                    </td>
                                                </tr>
                                            <%assign var='i' value=$i+1 %>  
                                            <%/foreach%>
                                        <%/if%>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div><!-- /.container-fluid -->
        </section>
 </div>