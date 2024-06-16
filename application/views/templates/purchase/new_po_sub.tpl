<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%base_url('generate_po') %>">Home</a></li>
                            <li class="breadcrumb-item active">New PO</li>
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
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <form action="<%base_url('generate_new_po') %>" method="POST">
                                                <label for="">Select Supplier / Number / GST <span class="text-danger">*</span> </label>
                                                <select name="supplier_id" required id="" class="form-control select2">
                                                    <%if count($supplier) gt 0 %>
                                                        <%foreach from=$supplier item=s %>
                                                            <option value="<%$s->id %>"><%$s->supplier_name %> / <%$s->gst_number %> / <%$s->supplier_number %></option>
                                                    	<%/foreach%>
                                                    <%/if%>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select PO Date <span class="text-danger">*</span> </label>
                                            <input type="date" readonly value="<%date('Y-m-d') %>" required name="po_date" class="form-control">
                                            <input type="hidden" readonly value="1" required name="process_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Select Expiry Date </label>
                                            <input type="date" min="<%date('Y-m-d', strtotime('+ 1 day')) %>" required name="expiry_po_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Enter Remark </label>
                                            <input type="text" placeholder="Enter Remark" value="" name="remark" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="">Billing Address <span class="text-danger">*</span> </label>
                                            <select name="billing_address" required id="" class="form-control select2">
                                            <option value="">Select</option>
                                                <%foreach from=$client item=cli %>
                                                    <option value="<%$cli->billing_address %>">
                                                        <%$cli->client_unit %> / <%$cli->billing_address %></option>
                                                <%/foreach%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="">Shipping Address <span class="text-danger">*</span></label>
                                            <select name="shipping_address" required class="form-control select2">
                                            <option value="">Select</option>
                                                <%foreach from=$client item=cli %>
                                                    <option value="<%$cli->shifting_address %>">
                                                        <%$cli->client_unit %> / <%$cli->shifting_address %>
                                                    </option>
                                                <%/foreach%>
	                                                <%if count($supplier) > 0 %>
	                                                    <%foreach from=$supplier item=s %>
	                                                	<option value="<%$s->location %>">
	                                                        <%$s->supplier_name%> / <%$s->location %>
	                                                    </option>
	                                                    <%/foreach%>
	                                                <%/if%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mt-4">Generate PO</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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