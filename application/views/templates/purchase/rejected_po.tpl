
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
                <span>Rejected PO</span>
            </div>
        </nav>
        <div class="card p-0 mt-4">

            <!-- /.card-header -->
            <div class="">
                <table class="table table-striped" style="border-collapse: collapse;" id="rejected_po_view">
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>PO Number</th>
                    <th>PO Date</th>
                    <th>Created Date</th>
                    <th>Download PDF PO</th>
                    <th>Status</th>
                    <th>View PO Details</th>
                </tr>
            </thead>
            <tbody>
                <%assign var='i' value=1%>
                   <%if $new_po %>
                    <%foreach from=$new_po item=s %>
                        <%if ($new_po[0]->expiry_po_date < date('Y-m-d')) %>
                        <tr>
                            <td><%$i %></td>
                            <td><%$s->po_number %></td>
                            <td><%$s->po_date %></td>
                            <td><%$s->created_date %></td>
                           <td>
                                <%if ($s->status == "accpet") %>
                                    <a href="<%base_url('download_my_pdf/') %><%$s->id %>" class="btn btn-primary" href="">Download</a>
                                <%else%>
                                    --
                                <%/if%>
                            </td>
                            <td><%$s->status %></td>

                            <td><a href="<%base_url('view_new_po_by_id/') %><%$s->id %>" class="btn btn-primary" href="">PO Details</a></td>

                        </tr>

                        <%assign var='i' value=$i+1%>
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
<script src="<%$base_url%>public/js/purchase/rejected_po_view.js"></script>