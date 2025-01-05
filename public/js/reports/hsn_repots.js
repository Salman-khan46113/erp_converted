var table = '';
var file_name = "hsn_summary_report";
var pdf_title = "Summary ";
// var myModal = new bootstrap.Modal(document.getElementById('child_part_update'))
const page = {
    init: function(){
        this.filter();
        this.dataTable();
        this.formValidation();
        
        $(document).on("click",".edit-part",function(){
            var data = $(this).attr("data-value");
            data = JSON.parse(atob(data)); 
            console.log(data)
            var option = '';
            if(data.sub_type == 'Regular grn' || data.sub_type == 'RM' ){
                option = '<option  value="Regular grn">Regular GRN</option><option  value="RM">RM</option>';
            }else if(data.sub_type == 'Subcon grn' || data.sub_type == 'Subcon Regular'){
                option = '<option  value="Subcon grn">Subcon GRN</option> <option value="Subcon Regular">Subcon Regular</option>';
            }else if(data.sub_type == 'consumable'){
                option = '<option sub_type value="consumable" >Consumable</option>';
            }else if(data.sub_type == 'customer_bom'){
                option = '<option sub_type value="customer_bom">Customer BOM</option>';
            }else if(data.sub_type == 'asset'){
                option = '<option sub_type value="asset" >Asset</option>';
            }
            $("#sub_type").html(option).select2();
            $("label.error").remove();
            $("input.error").removeClass('error');
            $("#part_id").val(data.part_id);
            $("#part_number").val(data.part_number);
            $("#part_description").val(data.part_description);
            $("#saft__stk").val(data.buffer_stock);
            $("#hsn_code").val(data.hsn_code);
            $("#sub_type").val(data.sub_type).trigger("change");
            $("#store_rack_location").val(data.store_rack_location);
            $("#store_stock_rate").val(data.store_stock_rate);
            $("#weight").val(data.weight);
            $("#size").val(data.size);
            $("#thickness").val(data.thickness);
            $("#uom_id").val(data.uom_id).trigger("change");
            $("#max_uom").val(data.max_uom);
            $("#grade").val(data.grade);
            // myModal.show();
        })
        this.initiateExport();

    },
    dataTable: function(){
        let that = this;
        var data = this.serachParams();
        table = new DataTable("#example1", {
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
                                // values.splice(13, 1);
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
                                var alignmentClass = $('#example1 tbody tr:eq(' + rowIndex + ') td:eq(' + cellIndex + ')').attr('class');
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
                            // row.splice(14, 1);
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
            order: sorting_column,
            fixedColumns: {
                leftColumns: 2,
                // end: 1
            },
            ajax: {
                data: {'search':that.serachParams()},    
                url: "SalesController/hsnReportsAjax",
                type: "POST",
            },
        });
        $('.dataTables_length').find('label').contents().filter(function() {
            return this.nodeType === 3; // Filter out text nodes
        }).remove();
        table.on('init.dt', function() {
            $(".dataTables_length select").select2({
                 minimumResultsForSearch: Infinity
            });
        });
        $('#serarch-filter-input').on('keyup', function() {
            table.search(this.value).draw();
        });
    },
    formValidation: function(){
        let that = this;
    },
    filter: function(){
        let that = this;
        $('#part_number_search').select2();
        $(".search-filter").on("click",function(){
            table.destroy(); 
            that.dataTable();
            $(".close-filter-btn").trigger( "click" )
        })
        $(".reset-filter").on("click",function(){
            that.resetFilter();
        })
        $('#date_range_filter').daterangepicker({
            singleDatePicker: false,
            showDropdowns: true,
            autoApply: true,
            locale: {
                format: 'YYYY/MM/DD' // Change this format as per your requirement
            }
        });
        dateRangePicker = $('#date_range_filter').data('daterangepicker');
        dateRangePicker.setStartDate(start_date);
        dateRangePicker.setEndDate(end_date);
    },
    serachParams: function(){
        var customer_search = $("#customer_search").val();
        var hsn_search = $("#hsn_search").val();
        var date_range = $("#date_range_filter").val();
        var params = {customer:customer_search,hsn_code:hsn_search,date_range:date_range};
        return params;
    },
    resetFilter: function(){
        $("#customer_search").val('').trigger('change');
        $("#hsn_search").val('');
        dateRangePicker.setStartDate(start_date);
        dateRangePicker.setEndDate(end_date);
        table.destroy(); 
        this.dataTable();
    },
    initiateExport: function(){
        $('#sales_report_export').on('submit', function(event) {
            // Prevent the form from submitting via the browser
           
               event.preventDefault(); // Prevent the form from submitting via the browser
               var form = $(this);
               var formData = form.serialize();
           
               $.ajax({
                   type: 'POST',
                   url: form.attr('action'),
                   data: formData,
                   success: function(response) {
                       var responseObject = JSON.parse(response);
                        var msg = responseObject.message;
                        var success = responseObject.success;
                        if (success == 1) {
                            toastr.success(msg);
                            setTimeout(function(){
                                 window.open(responseObject.pdf_utl, "_blank");
                            },1000);

                        } else {
                            toastr.error(msg);
                        }
                   },
                   error: function(xhr, status, error) {
                       // Handle error
                       toastr.success('unable to delete part.')
                   }
               });
            
        });
    }
}

$( document ).ready(function() {
    page.init();
});