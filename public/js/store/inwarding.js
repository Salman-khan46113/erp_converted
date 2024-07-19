$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "inwarding_list";
var pdf_title = "Inwarding List";

const page = {
    init: function() {
        this.dataTable();
    },
    dataTable: function() {
        table = $('#inwarding').DataTable();
    }
};
