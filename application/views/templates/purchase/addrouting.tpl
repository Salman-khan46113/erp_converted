<div class="wrapper">
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Routing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Item part List</li>
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
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add Routing</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<%base_url('addRoutingParts') %>" method="POST" enctype='multipart/form-data' >
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label> Select Input item part </label><span class="text-danger">*</span>
                                                                <select class="form-control select2" name="routing_part_id" style="width: 100%;">
                                                                    <%if count($child_part_master) gt 0 %>
                                                                        <%foreach from=$child_part_master item=c %>
                                                                            <option value="<%$c->id %>"><%$c->part_number %></option>
	                                                                    <%/foreach%>
                                                                    <%/if%>
                                                                </select>
                                                            </div>
                                                                                                                        
                                                            <div class="form-group">
                                                                <label for="po_num">Qty</label><span class="text-danger">*</span>
                                                                <input type="number" step="any" value="" name="qty" required class="form-control" id="exampleInputEmail1" placeholder="Enter Qty">
                                                                <input type="hidden" value="<%$part_id %>" name="part_id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Output Part Number</th>
                                            <th>Output Part Description</th>
                                            <th>Input Part Number</th>
                                            <th>Input Part Description</th>
                                            <th>Input Part Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<%assign var="i" value=1 %>
                                    	<%if $routing != '' %>
	                                        <%foreach from=$routing item=poo %>
	                                                <tr>
	                                                    <td><%$i %></td>
	                                                    <td><%$poo->out_partNumber %></td>
	                                                    <td><%$poo->out_partDesc %></td>
	                                                    <td><%$poo->in_partNumber %></td>
	                                                    <td><%$poo->in_partDesc  %></td>
	                                                    <td><%$poo->qty %></td>
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