<div class="wrapper">
    <div class="wrapper container-xxl flex-grow-1 container-p-y">
        <!-- Content Header (Page header) -->
        
        <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
        Reports
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Stock Transfer</em></a>
        </h1>
        <br>
        <span >Stock Transfer</span>
      </div>
    </nav>
    <div class="w-100">
            <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
        </div>
        <section class="card p-0 mt-4 w-100">
            <div class>
                <div class="row">
                    <div class="col-12">
                        <table  class="table table-striped" id="report_stock_transfer">
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
        </section>
    </div>
</div>
<script type="text/javascript">
    var table = '';
var file_name = "erp_users";
var pdf_title = "ERP Users";
// var accessGroupsModel = new bootstrap.Modal(document.getElementById('accessGroups'))
$(document).ready(function() {

    // Initialize the DataTable
    table = $("#report_stock_transfer").DataTable({
        dom: "Bfrtilp",
        buttons: [
            {
                extend: "csv",
                text: '<i class="ti ti-file-type-csv"></i>',
                init: function (api, node, config) {
                    $(node).attr("title", "Download CSV");
                },
                customize: function (csv) {
                        var lines = csv.split('\n');
                        var modifiedLines = lines.map(function(line) {
                            var values = line.split(',');
                            values.splice(7, 1);
                            return values.join(',');
                        });
                        return modifiedLines.join('\n');
                    },
                    filename : file_name
                },
          
            {
                extend: "pdf",
                text: '<i class="ti ti-file-type-pdf"></i>',
                init: function (api, node, config) {
                    $(node).attr("title", "Download Pdf");
                },
                filename: file_name,
                customize: function (doc) {
                    doc.pageMargins = [15, 15, 15, 15];
                    doc.content[0].text = pdf_title;
                    doc.content[0].color = theme_color;
                    // doc.content[1].table.widths = ["19%", "19%", "13%", "13%", "15%", "15%"];
                    doc.content[1].table.body[0].forEach(function (cell) {
                        cell.fillColor = theme_color;
                    });
                    doc.content[1].table.body.forEach(function (row, index) {
                        row.splice(7, 1);
                        row.forEach(function (cell) {
                            // Set alignment for each cell
                            cell.alignment = "center"; // Change to 'left' or 'right' as needed
                        });
                    });
                },
            },
        ],
        searching: true,
        // scrollX: true,
        scrollY: true,
        bScrollCollapse: true,
        // columnDefs: [{ sortable: false, targets: 7 }],
        pagingType: "full_numbers",
       
        
        });
        $('#serarch-filter-input').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('.dataTables_length').find('label').contents().filter(function() {
                return this.nodeType === 3; // Filter out text nodes
        }).remove();
        setTimeout(function(){
            $(".dataTables_length select").select2({
                minimumResultsForSearch: Infinity
            });
        },1000)

    $(".page-access-btn").on("click",function(){
        // $(this).
    })
    // Custom search filter event
  
   setTimeout(function(){
    $(".select2-multiple").select2()
   },1000)
    


});

</script>
