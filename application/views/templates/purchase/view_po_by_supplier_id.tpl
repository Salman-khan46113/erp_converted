<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Purchase Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('')%>">Home</a></li>
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
                                <div class="row">
                                    <div class="col-lg-1">
                                        <a readonly href="<%base_url('new_po_list_supplier') %>" type="text" class="btn btn-dark mt-3" required>
                                            < Back </a>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Supplier Name</label>
                                        <input readonly value="<%$supplier_data[0]->supplier_name %>" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Supplier Number</label>
                                        <input readonly value="<%$supplier_data[0]->supplier_number %>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <h3 class="card-title"></h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Type</th>
                                            <th>PO Number</th>
                                            <th>PO Date</th>
                                            <th>Created Date</th>
                                            <th>Download PDF PO</th>
                                            <th>View PO Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Type</th>

                                            <th>PO Number</th>
                                            <th>PO Date</th>
                                            <th>Created Date</th>
                                            <th>Download PDF PO</th>
                                            <th>View PO Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<%assign var='i' value=1%>
                                        <%if count($new_po) > 0 %>
                                            <%foreach from=$new_po item=s %>
                                                <tr>
                                                    <td><%$i %></td>
                                                    <td>
                                                    	<%if (empty($s->process_id)) %>
                                                    		Normal PO 
                                                    	<%else%>
                                                    		Subcon PO 
                                                    	<%/if%>
                                                    	
                                                    </td>
                                                    <td><%$s->po_number %></td>
                                                    <td><%$s->po_date %></td>
                                                    <td><%$s->created_date %></td>
                                                    <td>
                                                        <%if ($s->status == "accpet") %>
                                                            <a href="<%base_url('download_my_pdf/') %><%$s->id %>" class="btn btn-primary" href="">Download</a>
                                                        <%/if%>
                                                    </td>
                                                    <td><a href="<%base_url('view_new_po_by_id/') %><%$s->id %>" class="btn btn-primary" href="">PO Details</a></td>
                                                    <td>
                                                     <%if ($s->expiry_po_date > date('Y-m-d')) %>
                                                     	<%assign var='expired' value='yes'%>
                                                     <%else %>
                                                               // echo "no";
                                                     <%/if%>
                                                        
                                                    <%if ($expired == "no") %>
                                                    	<%assign var='statusNew' value='Expired'%>
                                                    <%else if ($s->status == "accpet") %>
                                                    	<%assign var='statusNew' value='Released'%>
                                                    <%else %>
                                                   		<%assign var='statusNew' value=$s->status%>
                                                    <%/if%>
                                                    <%$statusNew %>
                                                    </td>
                                                </tr>
                                            <%assign var='i' value=$i+1 %>
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