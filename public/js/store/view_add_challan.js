$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "view_add_challan_list";
var pdf_title = "Challan List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#view_add_challan').DataTable();
    }
};
