$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "short_receipt_mdr_list";
var pdf_title = "short receipt mdr";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#short_receipt_mdr').DataTable();
    }
};
