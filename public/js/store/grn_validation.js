$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "grn_validation_list";
var pdf_title = "GRN Validation List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#grn_validation').DataTable();
    }
};
