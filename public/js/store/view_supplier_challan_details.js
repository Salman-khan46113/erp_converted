$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "view_supplier_challan_details";
var pdf_title = "Supplier Challan Details List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#view_supplier_challan_details').DataTable();
    }
};
