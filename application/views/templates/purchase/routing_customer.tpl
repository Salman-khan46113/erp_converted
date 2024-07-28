
    
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
                        <em>Sub Con</em></a>
                </h1>
                <br>
                <span>Customer Routing</span>
            </div>
        </nav>
        <div class="card p-0 mt-4">

            <!-- /.card-header -->
            <div class="">
                <table class="table table-striped" style="border-collapse: collapse;" id="customer_routing_view">
                <thead>
                <tr>
                    <!-- <th>Sr. No.</th> -->
                    <th>Part Number</th>
                    <th>Part Description</th>
                    <th>Add Routing</th>
                </tr>
            </thead>
            <tbody>
                <%assign var="i" value=1%>
                <%if ($customer_part_master) %>
                    <%foreach from=$customer_part_master item=poo %>
                    <tr>
                        <!-- <td><%$i %></td> -->
                        <td><%$poo->part_number %></td>
                        <td><%$poo->part_description %></td>
                        <td>
                            <a class="btn btn-primary" href="<%base_url('addrouting_customer_subcon/') %><%$poo->id %>">Add
                                        Routing</a>
                        </td>
                    </tr>
                    <%assign var="i" value=$i+1%>
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
<script src="<%$base_url%>public/js/purchase/customer_routing_view.js"></script>