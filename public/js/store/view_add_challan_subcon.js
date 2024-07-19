$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "view_add_challan_subcon";
var pdf_title = "Supplier Challan List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#view_add_challan_subcon').DataTable();
    }
};
