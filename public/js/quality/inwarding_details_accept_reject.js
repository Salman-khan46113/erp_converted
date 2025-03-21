
$(document).ready(function() {
    page.init();
});

var table = '';
var file_name = "inwarding_details_accept_reject";
var pdf_title = "inwarding_details_accept_reject";

const page = {
    init: function() {
        this.dataTable();
        this.initiateForm();
        if(!accept_inwarding_btn){
          $("#accept_inwarding_btn").remove();
        }
    },
    dataTable: function() {
        // table = $('#inwarding_details_accept_reject').DataTable();
    },
    initiateForm: function(){
      let that = this;

     
      $(".add_rejection_flow,.update_rm_batch_mtc_report").submit(function(e){
        e.preventDefault();
       
        var href = $(this).attr("action");
        var id = $(this).attr("id");
        let flag = that.formValidate(id);
        if(flag){
          return;
        }

        var formData = new FormData($('.'+id)[0]);

        $.ajax({
          type: "POST",
          url: href,
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
      $(".update_grn_qty_accept_reject").submit(function(e){
        e.preventDefault();
       
        var href = $(this).attr("action");
        var id = $(this).attr("id");
        let flag = that.formValidate(id);
        if(flag){
          return;
        }
        
        if($(this).parents(".item-row").find(".required-input-route").length > 0){
          var data_max = parseFloat($(this).parents(".item-row").find(".required-input-route").data('max'));
          var data_min = parseFloat($(this).parents(".item-row").find(".required-input-route").data('min'));
          var value = parseFloat($(this).parents(".item-row").find(".required-input-route").val());
          $(this).parents(".item-row").find(".rm-count-row .error").remove();
          value = value > -1 ? parseInt(value) : "NO";
          if(value == 'NO'){
            var validation_message = "Please enter RM Count";
            var label_html = "<label class='error'>"+validation_message+"</label>";
            $(this).parents(".item-row").find(".required-input-route").after(label_html);
            return;
          }else if(data_min > value){
            var validation_message = "RM Count should be greater than 0";
            var label_html = "<label class='error'>"+validation_message+"</label>";
            $(this).parents(".item-row").find(".required-input-route").after(label_html);
            return;
          }else if(data_max < value){
            var validation_message = "RM Count should be less than or equals to "+data_max;
            var label_html = "<label class='error'>"+validation_message+"</label>";
            $(this).parents(".item-row").find(".required-input-route").after(label_html);
            return;
          }
      }
      return;
        var formData = new FormData($('.'+id)[0]);

        $.ajax({
          type: "POST",
          url: href,
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
      $("#accept_inwarding_data").submit(function(e){
        e.preventDefault();
       
        var href = $(this).attr("action");
        var id = $(this).attr("id");
        
        var formData = new FormData($('#'+id)[0]);

        $.ajax({
          type: "POST",
          url: href,
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
      $(".custom-form."+form_class+" .required-input").each(function( index ) {
        var value = $(this).val();
        var dataMax = parseFloat($(this).attr('data-max'));
        var dataMin = parseFloat($(this).attr('data-min'));
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
        else if(dataMin !== undefined && dataMin > value){
          flag = true;
          var label = $(this).parents(".form-group").find("label").contents().filter(function() {
            return this.nodeType === 3; // Filter out non-text nodes (nodeType 3 is Text node)
          }).text().trim();
          var exit_ele = $(this).parents(".form-group").find("label.error");
          if(exit_ele.length == 0){
            var end =" must be greater than or equal to "+dataMin;
            label = ((label.toLowerCase()).replace("enter", "")).replace("select", "");
            label = (label.toLowerCase()).replace(/[^\w\s*]/gi, '');
            label = label.charAt(0).toUpperCase() + label.slice(1);
            var validation_message =label +end;
            var label_html = "<label class='error'>"+validation_message+"</label>";
            $(this).parents(".form-group").append(label_html)
          }
          }else if(dataMax !== undefined && dataMax < value){
            flag = true;
            var label = $(this).parents(".form-group").find("label").contents().filter(function() {
              return this.nodeType === 3; // Filter out non-text nodes (nodeType 3 is Text node)
            }).text().trim();
            var exit_ele = $(this).parents(".form-group").find("label.error");
            if(exit_ele.length == 0){
              var end =" must be less than or equal to "+dataMax;
              label = ((label.toLowerCase()).replace("enter", "")).replace("select", "");
              label = (label.toLowerCase()).replace(/[^\w\s*]/gi, '');
              label = label.charAt(0).toUpperCase() + label.slice(1)
              var validation_message =label +end;
              var label_html = "<label class='error'>"+validation_message+"</label>";
              $(this).parents(".form-group").append(label_html)
            }
        }
      });
     
      return flag;
  }
};
