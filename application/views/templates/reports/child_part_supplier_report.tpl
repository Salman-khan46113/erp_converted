<div class="wrapper">
    <!-- Navbar -->
    <%assign var="role" value=$session->userdata.type|trim%>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:2000px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Supplier Part Price </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">item part List</li>
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

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-body">
                                <form action="<%$base_url%>view_child_part_supplier_by_filter" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div style="width: 400px;">
                                                <div class="form-group">
                                                    <label for="on click url">Select Supplier <span class="text-danger">*</span></label> <br>
                                                    <select name="supplier_id" class="form-control select2" id="">
                                                        <option <%if $filter_supplier_id === "All"%> selected <%/if%> value="All">All</option>
                                                        <%foreach from=$supplier_list item=s%>
                                                            <option <%if $filter_supplier_id === $s->id%> selected <%/if%> value="<%$s->id%>"><%$s->supplier_name%></option>
                                                        <%/foreach%>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">&nbsp;</label> <br>
                                            <button class="btn btn-secondary">Search </button>
                                        </div>
                                    </div>
                                </form>
                                
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Approval Status </th>
                                            <th>Rev. & History</th>
                                            <th>Revision Number</th>
                                            <th>Revision Remark</th>
                                            <th>Revision Date</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Tax Structure</th>
                                            <th>Supplier</th>
                                            <th>Part Price</th>
                                            <th>Quotation Document </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $child_part_master%>
                                            <%foreach from=$child_part_master item=poo%>
                                                <%if isset($filter_supplier_id) && $filter_supplier_id != "All" && $filter_supplier_id != $poo->supplier_id%>
                                                    <%continue%>
                                                <%/if%>
                                               
                            
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$po[$poo->part_number][0][0]->admin_approve%></td>
                                                    <td>
                                                        <%if $po[$poo->part_number][0][0]->admin_approve == "accept"%>
                                                            <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModaledit2<%$i%>"> <i class="fas fa-edit"></i></button>
                                                        <%/if%>
                                                        <a href="<%$base_url%>price_revision/<%$po[$poo->part_number][0][0]->part_number%>/<%$poo->supplier_id%>" class="btn btn-primary btn-sm"> <i class="fas fa-history"></i></a>
                                                        <div class="modal fade" id="exampleModaledit2<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Add Revision </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<%$base_url%>updatechildpart_supplier" method="POST" enctype='multipart/form-data'>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input value="<%$po[$poo->part_number][0][0]->id%>" type="hidden" name="id" required class="form-control" placeholder="Customer Name">
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Part Number </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<%$po[$poo->part_number][0][0]->part_number%>" name="upart_number" readonly class="form-control" placeholder="Enter Part Number.">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Part Description </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<%$po[$poo->part_number][0][0]->part_description%>" name="upart_desc" readonly required class="form-control" placeholder="Enter Part Description">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Revision Date </label><span class="text-danger">*</span>
                                                                                        <input type="date" value="<%$smarty.now|date_format:"%Y-%m-%d"%>" name="urevision_date" required class="form-control" placeholder="Enter Part Price">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Revision Number </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="" name="urevision_no" required class="form-control" placeholder="Enter Safty/buffer stock">
                                                                                        <input type="hidden" readonly value="<%$po[$poo->part_number][0][0]->supplier_id%>" name="supplier_id" required class="form-control" placeholder="Enter Safty/buffer stock">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Revision Remark </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="" name="revision_remark" required class="form-control" placeholder="Enter revision_remark">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Part Price </label><span class="text-danger">*</span>
                                                                                        <input type="text" value="" name="upart_rate" required class="form-control" placeholder="Enter Part Price">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Quotation Document</label>
                                                                                        <input type="file" name="quotation_document" class="form-control" placeholder="Enter Revision Date">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label> Select Tax Structure </label><span class="text-danger">*</span>
                                                                                        <select class="form-control select2" name="gst_id" style="width: 100%;">
                                                                                            <%foreach from=$gst_structure item=c%>
                                                                                                <option <%if $c->id == $gst_structure2[$poo->part_number][0][0]->id%> selected <%/if%> value="<%$c->id%>"><%$c->code%></option>
                                                                                            <%/foreach%>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><%$po[$poo->part_number][0][0]->revision_no%></td>
                                                    <td><%$po[$poo->part_number][0][0]->revision_remark%></td>
                                                    <td><%$po[$poo->part_number][0][0]->revision_date%></td>
                                                    <td><%$po[$poo->part_number][0][0]->part_number%></td>
                                                    <td><%$po[$poo->part_number][0][0]->part_description%></td>
                                                    <td><%$gst_structure2[$poo->part_number][0][0]->code%></td>
                                                    <td><%$supplier_data[$poo->supplier_id][0][0]->supplier_name%></td>
                                                    <td><%$po[$poo->part_number][0][0]->part_rate%></td>
                                                    <td>
                                                        <%if !empty($po[$poo->part_number][0][0]->quotation_document)%>
                                                            <a href="<%$base_url%>documents/<%$po[$poo->part_number][0][0]->quotation_document%>" download>Download </a>
                                                        <%/if%>
                                                    </td>
                                                </tr>
                                                <%assign var="i" value=$i + 1%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
