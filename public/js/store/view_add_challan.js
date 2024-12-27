$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "view_add_challan_list";
var pdf_title = "Challan List";

const page = {
    init: function() {
        this.dataTable();
        this.initiateForm();
        this.filter();
    },
    dataTable: function() {
      // table = $('#grn_validation').DataTable();
      // var data = {supplier_id:supplier_id,challan_id:challan_id};
      var data = this.serachParams();
      table = new DataTable("#view_add_challan", {
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
                              values.splice(9, 1);
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
                          row.splice(9, 1);
                      });
                  }
              },
          ],
          orderCellsTop: true,
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
          scrollX: false,
          scrollY: true,
          paging: is_paging_enable,
          fixedHeader: false,
          info: true,
          autoWidth: true,
          lengthChange: true,
          order: sorting_column,
          // fixedColumns: {
          //     leftColumns: 2,
          //     // end: 1
          // },
          ajax: {
              data: {'search':data},    
              url: "ChallanController/get_challan_search_data",
              type: "POST",
          },
           columnDefs: [{ sortable: false, targets: 9 }],
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
  filter: function(){
    let that = this;
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
      var challan_id = $("#challan_search").val();
      var supplier_id = $("#supplier_search").val();
      // var part_description = $("#part_description_search").val();
      var params = {
        challan_id:challan_id,
        supplier_id:supplier_id,
      };
      return params;
  },
  resetFilter: function(){
      $("#challan_search").val('').trigger('change');
      $("#supplier_search").val('').trigger('change');
      // $("#part_description_search").val('');
      table.destroy(); 
      this.dataTable();
  },
    initiateForm: function(){
      let that = this;

      $(".add_challan").submit(function(e){
        e.preventDefault();
        let flag = that.formValidate("add_challan");
        if(flag){
          return;
        }
        var formData = new FormData($('.add_challan')[0]);

        $.ajax({
          type: "POST",
          // url: base_url+"generate_challan",
          url: "generate_challan",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            var responseObject = JSON.parse(response);
            var msg = responseObject.messages;
            var success = responseObject.success;
            if (success == 1) {
              toastr.success(msg);
              $(this).parents(".modal").modal("hide")
              setTimeout(function(){
                window.location.reload();
              },1000);

            } else {
              toastr.error(msg);
            }
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
      });

    },
    formValidate: function(form_class = ''){
      let flag = false;
      $(".custom-form."+form_class+" input.required-input").each(function( index ) {
        var value = $(this).val();
        if(value == ''){
          flag = true;
          var label = $(this).parents(".form-group").find("label").contents().filter(function() {
            return this.nodeType === 3; // Filter out non-text nodes (nodeType 3 is Text node)
          }).text().trim();
          var exit_ele = $(this).parents(".form-group").find("label.error");
          if(exit_ele.length == 0){
            var start ="Please enter ";
            if($(this).prop("localName") == "select"){
              var start ="Please select ";
            }
            label = ((label.toLowerCase()).replace("enter", "")).replace("select", "");
            var validation_message = start+(label.toLowerCase()).replace(/[^\w\s*]/gi, '');
            var label_html = "<label class='error'>"+validation_message+"</label>";
            $(this).parents(".form-group").append(label_html)
          }

        }
      });
      return flag;
    }
};
