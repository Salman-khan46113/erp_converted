var table = '';
var file_name = "receivable_reports";
var pdf_title = "Receivable Reports";
// var myModal = new bootstrap.Modal(document.getElementById('update_report_data'))
const page = {
    init: function(){
        this.dataTable();
        this.filter();
        this.formValidation();
        $(document).on("click",".edit-part",function(){
            var data = $(this).attr("data-value");
            data = JSON.parse(atob(data)); 
            $("#payment_date_modal").val(data.payment_receipt_date);
            $("#receivable_amount_modal").val(data.amount_received);
            $("#transection_detail_modal").val(data.transaction_details);
            myModal.show();
        })

    },
    dataTable: function(){
        var data = this.serachParams();
        table = new DataTable("#approved_supplier_table", {
            dom: "Bfrtilp",
            buttons: [
              {     
                    extend: 'csv',
                      text: '<i class="ti ti-file-type-csv"></i>',
                      init: function(api, node, config) {
                      $(node).attr('title', 'Download CSV');
                      },
                      customize: function (csv) {
                            var lines = csv.split('\n');
                            var modifiedLines = lines.map(function(line) {
                                var values = line.split(',');
                                values.splice(13, 1);
                                return values.join(',');
                            });
                            return modifiedLines.join('\n');
                        },
                        filename : file_name
                    },
                
                  {
                    extend: 'pdf',
                    text: '<i class="ti ti-file-type-pdf"></i>',
                    init: function(api, node, config) {
                        $(node).attr('title', 'Download Pdf');
                    },
                    filename: file_name,
                    customize: function (doc) {
                      doc.pageMargins = [15, 15, 15, 15];
                      doc.content[0].text = pdf_title;
                      doc.content[0].color = theme_color;
                        // doc.content[1].table.widths = ['15%', '19%', '13%', '13%','15%', '15%', '10%'];
                        doc.content[1].table.body[0].forEach(function(cell) {
                            cell.fillColor = theme_color;
                        });
                        doc.content[1].table.body.forEach(function(row, rowIndex) {
                            row.forEach(function(cell, cellIndex) {
                                var alignmentClass = $('#child_part_view tbody tr:eq(' + rowIndex + ') td:eq(' + cellIndex + ')').attr('class');
                                var alignment = '';
                                if (alignmentClass && alignmentClass.includes('dt-left')) {
                                    alignment = 'left';
                                } else if (alignmentClass && alignmentClass.includes('dt-center')) {
                                    alignment = 'center';
                                } else if (alignmentClass && alignmentClass.includes('dt-right')) {
                                    alignment = 'right';
                                } else {
                                    alignment = 'left';
                                }
                                cell.alignment = alignment;
                            });
                            row.splice(14, 1);
                        });
                    }
                },
            ],
            orderCellsTop: true,
            fixedHeader: true,
            lengthMenu: page_length_arr,
            // "sDom":is_top_searching_enable,
            columns: column_details,
            processing: false,
            serverSide: is_serverSide,
            sordering: true,
            searching: is_searching_enable,
            ordering: is_ordering,
            bSort: true,
            orderMulti: false,
            pagingType: "full_numbers",
            scrollCollapse: true,
            scrollX: true,
            scrollY: true,
            paging: is_paging_enable,
            fixedHeader: false,
            info: true,
            autoWidth: true,
            lengthChange: true,
            fixedColumns: {
                leftColumns: 2,
                // end: 1
            },
            ajax: {
                data: {'search':data},    
                url: "Welcome/getApprovedSupplierData",
                type: "POST",
            },
        });
        $('.dataTables_length').find('label').contents().filter(function() {
            return this.nodeType === 3; // Filter out text nodes
        }).remove();
        $(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity
        });
    },
    formValidation: function(){
        let that = this;
    },
    filter: function(){
        let that = this;
        $('#supplier_id').select2();
        $(".search-filter").on("click",function(){
            table.destroy(); 
            that.dataTable();
            $(".close-filter-btn").trigger( "click" )
        })
        $(".reset-filter").on("click",function(){
            that.resetFilter();
        })
    },
    serachParams: function(){
        var supplier_id = $("#supplier_id").val();
        var params = {supplier_id:supplier_id};
        return params;
    },
    resetFilter: function(){
        $("#supplier_id").val('').trigger('change');
        table.destroy(); 
        this.dataTable();
    }
}

$( document ).ready(function() {
    page.init();
    // alert();
});