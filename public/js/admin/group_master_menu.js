var table = '';
var file_name = "process";
var pdf_title = "Process";

$(document).ready(function() {
	// alert("ok");
    $('#updateGroupMenuRight').validate({
        rules: {
            namess: {
                // required: true
            }
        },
        messages: {
            namess: {
                // required: "Please enter the process name."
            }
        },
        submitHandler: function(form) {
            // Submit the form via AJAX
            $.ajax({
                url: base_url+"GlobalConfigController/updateGroupMenuRight", // Use the form's action attribute as the URL
                type: 'POST',
                data: new FormData(form), // Send the form data
                processData: false,
                contentType: false,
                success: function(response) {
                    // Parse the JSON response
                    let res = JSON.parse(response);
                    console.log(res.message)
                    if(res.success == 1){
                        // Show success message
                        toastr.success(res.message);
                        setTimeout(() => {
                            window.location.href = base_url+"/group_master";
                            // window.location.reload();
                        }, 1000);
                    } else {
                        // Show error message
                        toastr.error(res.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error
                    toastr.error('An error occurred: ' + errorThrown);
                }
            });
            return false; // Prevent the default form submission
        }
    });

    // Custom search filter event
  
   



});
