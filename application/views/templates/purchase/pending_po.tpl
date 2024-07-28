<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <nav aria-label="breadcrumb">
                <div class="sub-header-left pull-left breadcrumb">
                    <h1>
                        Purchase
                        <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link"
                            title="Back to Issue Request Listing">
                            <i class="ti ti-chevrons-right"></i>
                            <em>Regular PO</em></a>
                    </h1>
                    <br>
                    <span>Pending PO</span>
                </div>
            </nav>
            <div class="card p-0 mt-4">

                <!-- /.card-header -->
                <div class="">
                    <table class="table table-striped" style="border-collapse: collapse;" id="pending_po_view">
                        <thead>
                            <tr>
                                <!-- <th>Sr. No.</th> -->
                                <th>Supplier Name</th>
                                <th>PO Number</th>
                                <th>PO Expiry Date</th>
                                <th>PO Date</th>
                                <th>Created Date</th>
                                <th>Download PDF PO</th>
                                <th>Status</th>
                                <th>View PO Details</th>
                                <th>Close PO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <%assign var='i' value=1%>
                                <%if ($new_po) %>
                                    <%foreach from=$new_po item=s %>
                                        <%assign var='expired' value='no' %>
                                            <%if ($s->expiry_po_date < date('Y-m-d')) %>
                                            <%else %>
                                                <tr>
                                                        <!-- <td><%$i %></td> -->
                                                        <td>
                                                            <%$s->supplier_name %>
                                                        </td>
                                                        <td>
                                                            <%$s->po_number %>
                                                        </td>
                                                        <td>
                                                            <%$s->expiry_po_date %>
                                                        </td>
                                                        <td>
                                                            <%$s->po_date %>
                                                        </td>
                                                        <td>
                                                            <%$s->created_date %>
                                                        </td>
                                                        <td>
                                                            <%if ($s->status == "accept") %>
                                                                <a href="<%base_url('download_my_pdf/') %><%$s->id %>"
                                                                    class="btn btn-primary" href="">Download</a>
                                                            <%else%>
                                                                    --
                                                            <%/if%>
                                                        </td>
                                                        <td>
                                                            <%$s->status %>
                                                        </td>
                                                        <td>
                                                            <a href="<%base_url('view_new_po_by_id/') %><%$s->id %>"
                                                                class="btn btn-primary" href="">PO Details</a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal" data-bs-target="#edit<%$i %>">
                                                                Close PO
                                                            </button>
                                                            <div class="modal fade" id="edit<%$i %>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Close PO</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="javascript:void(0)" method="POST" class="close_po_action close_po_action<%$s->id %> custom-form"
                                                                                method="POST"
                                                                                enctype="multipart/form-data" data-id="<%$s->id %>">
                                                                                <div class="form-group">

                                                                                    <label for="">Are You Sure Want To
                                                                                        Close <%$s->po_number %> This
                                                                                            PO? <span
                                                                                                class="text-danger">*</span></label>
                                                                                    <input required value="<%$s->id %>"
                                                                                        type="hidden"
                                                                                        class="form-control" name="id">
                                                                                    <input required
                                                                                        value="<%$s->po_number %>"
                                                                                        type="hidden"
                                                                                        class="form-control"
                                                                                        name="po_number">
                                                                                </div>
                                                                                <div class="form-group">

                                                                                    <label for="">Remark<span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input  value=""
                                                                                        placeholder="Enter Remark"
                                                                                        type="text" class="form-control  required-input"
                                                                                        name="remark">
                                                                                </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                            
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>           

                                                        <%assign var='i' value=$i+1%>
                                                </tr>
                                             <%/if%>
                                     <%/foreach%>
                                <%/if%>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>


        <!-- Main content -->

    </div>
    <script>
        var base_url = <%$base_url|json_encode %> ;
    </script>
    <script src="<%$base_url%>public/js/purchase/pending_po_view.js"></script>
<!-- /.content-wrapper -->