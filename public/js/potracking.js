var table = '';
var file_name = "po_tracking";
var pdf_title = "PO Tracking";
const page = {
    init: function(){
        this.dataTable();
        this.filter();
        this.formValidation();
       
        $(document).on("click",".upload_doc",function(){
            var data = $(this).attr("data-value");
            data = JSON.parse(atob(data)); 
            $('#uid').val(data['id']);
           
        })

        $(document).on("click",".edit-part",function(){
            var data = $(this).attr("data-value");
            data = JSON.parse(atob(data)); 
            $('#end_date').val(data['po_end_date'])
            $('#part_id').val(data['id'])
           
        })
        $(document).on("click",".close-po",function(){
            var data = $(this).attr("data-value");
            data = JSON.parse(atob(data)); 
           $('#remarks').val(data['remark']);
           $('#reason').val(data['reason']);
           $('#close_id').val(data['id']);

           
        })

    },
    dataTable: function(){
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
            // scrollY: true,
            order: sorting_column,
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
                url: "POTrackingController/customerPoTrackingAjax",
                type: "POST",
            },
        });
        $('.dataTables_length').find('label').contents().filter(function() {
            return this.nodeType === 3; // Filter out text nodes
        }).remove();
        $('#serarch-filter-input').on('keyup', function() {
            table.search(this.value).draw();
        });
        table.on('init.dt', function() {
            $(".dataTables_length select").select2({
                minimumResultsForSearch: Infinity
            });
        });
       
    },
    formValidation: function(){
        let that = this;
    },
    filter: function(){
        let that = this;
        $('#customer_name').select2();
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
        var customer_id = $("#customer_name").val();
        var status = $("#status_val").val();
        var params = {customer_id:customer_id,status};
        return params;
    },
    resetFilter: function(){
        $("#customer_name").val('');
        $("#status_val").val('').trigger("change");
        table.destroy(); 
        this.dataTable();
    }
}

const uploadDoc = () => {
    $('#uploadForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Create a FormData object to handle file upload
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',                 // Set the request type
            data: formData,               // Send form data
            contentType: false,           // Prevent jQuery from setting content type
            processData: false,           // Prevent jQuery from processing the data
            success: function (response) {
                // Handle success response
                toastr.success('File uploaded successfully.')
                // Optionally, close the modal or perform other actions
                $('.modal').modal('hide');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle error response
                alert('Error uploading file: ' + textStatus);
            }
        });
    });

    $('#updateForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Create a FormData object to handle the form data
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',                 // Set the request type
            data: formData,               // Send form data
            contentType: false,           // Prevent jQuery from setting content type
            processData: false,           // Prevent jQuery from processing the data
            success: function (response) {
                // Handle success response
                toastr.success('Updated Succesfully');
                // Optionally, close the modal or perform other actions
                $('.modal').modal('hide');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle error response
                alert('Error saving changes: ' + textStatus);
            }
        });
    });

    $('#closePoForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission
       
        
        // Create a FormData object to handle the form data
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',                 // Set the request type
            data: formData,               // Send form data
            contentType: false,           // Prevent jQuery from setting content type
            processData: false,           // Prevent jQuery fromx processing the data
            success: function (response) {
                // Handle success response
                toastr.success('Closed Succesfully');
                // Optionally, close the modal or perform other actions
                $('.modal').modal('hide');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle error response
                alert('Error closing PO: ' + textStatus);
            }
        });
    });

}

$( document ).ready(function() {
    page.init();
    uploadDoc();
});