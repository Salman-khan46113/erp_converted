
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
                <span>Closed PO</span>
            </div>
        </nav>
            <div class="w-100">
        <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
    </div>
        <div class="card p-0 mt-4 w-100">

            <!-- /.card-header -->
            <div class="">
                <table class="table table-striped" style="border-collapse: collapse;" id="closed_po_view">
                <thead>
                <tr>
                    <!--<th>Sr. No.</th> -->
                    <th>PO Number</th>
                    <th>PO Date</th>
                    <th>Created Date</th>
                    <th>Remark</th>
                    <th>Download PDF PO</th>
                    <th>View PO Details</th>
                </tr>
            </thead>
             <tbody>
                 <%assign var='i' value=1 %>
                <%if $new_po %>
                    <%foreach from=$new_po item=s %>
                        <tr>
                            <!-- <td><%$i %></td> -->
                            <td><%$s->po_number %></td>
                            <td><%$s->po_date %></td>
                            <td><%$s->created_date %></td>
                            <td><%$s->closed_remark %></td>
                            <td>
                               <a href="<%base_url('download_my_pdf/') %><%$s->id %>" class="btn btn-primary" href="">Download</a>
                            </td>
                            <td><a href="<%base_url('view_new_po_by_id/') %><%$s->id %>" class="btn btn-primary" href="">PO Details</a></td>
                        </tr>

                    <%assign var='i' value=$i+1%>
                    
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
<script src="<%$base_url%>public/js/purchase/closed_po_view.js"></script>