$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "view_supplier_challan_details_part_wise";
var pdf_title = "Supplier Challan Details List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#view_supplier_challan_details_part_wise').DataTable();
    }
};
