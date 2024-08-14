$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "asset";
var pdf_title = "asset";

const page = {
    init: function() {
        this.dataTable();
        this.initiateForm();

    },
    dataTable: function() {
        table = $('#asset').DataTable();
    },
    initiateForm: function(){
      let that = this;

      $(".add_shifts").submit(function(e){
        e.preventDefault();
        let flag = that.formValidate("add_shifts");

        if(flag){
          return;
        }
        var formData = new FormData($('.add_shifts')[0]);

        $.ajax({
          type: "POST",
          url: base_url+"add_shifts",
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
