<?php
/* Smarty version 4.3.2, created on 2024-06-20 13:55:27
  from '/var/www/html/extra/erp_converted/application/views/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6673e7775c0db4_59276732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86afeb5f969e26f9a47582786989f9c3a4685e0d' => 
    array (
      0 => '/var/www/html/extra/erp_converted/application/views/templates/footer.tpl',
      1 => 1718605193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6673e7775c0db4_59276732 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style type="text/css">

   .dataTables_scrollHeadInner table,.dataTables_scrollBody table{
      width: 100% !important;
   }
   .dataTables_scrollHeadInner{
          width: 99.1%;
   }

    .dataTables_scrollHeadInner .table-bordered,.dataTables_scrollBody .table-bordered{
        min-width: 1773px !important;
        margin-bottom: 0px;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 5.5px !important;
    padding-left: 7.5px;
}
</style>
<?php $_smarty_tpl->_assignInScope('base_url', base_url(''));?>
<footer class="main-footer">
    <strong>Copyright &copy; 2018-2024 <a href="https://www.arominfotech.com">AROM INFOTECH</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 3.1.0-rc -->
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.11.4 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jquery-ui/jquery-ui.min.js"><?php echo '</script'; ?>
>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?php echo '<script'; ?>
>
$.widget.bridge('uibutton', $.ui.button)
<?php echo '</script'; ?>
>
<!-- Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/bootstrap/js/"><?php echo '</script'; ?>
>
<!-- ChartJS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/chart.js/Chart.min.js"><?php echo '</script'; ?>
>
<!-- Sparkline -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/sparklines/sparkline.js"><?php echo '</script'; ?>
>
<!-- JQVMap -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jqvmap/jquery.vmap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jqvmap/maps/jquery.vmap.usa.js"><?php echo '</script'; ?>
>
<!-- jQuery Knob Chart -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/jquery-knob/jquery.knob.min.js"><?php echo '</script'; ?>
>
<!-- daterangepicker -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/moment/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- Tempusdominus Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"><?php echo '</script'; ?>
>
<!-- Summernote -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/summernote/summernote-bs4.min.js"><?php echo '</script'; ?>
>
<!-- overlayScrollbars -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dist/js/adminlte.js"><?php echo '</script'; ?>
>
<!-- AdminLTE for demo purposes -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dist/js/demo.js"><?php echo '</script'; ?>
>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
dist/js/pages/dashboard.js"><?php echo '</script'; ?>
>
<!-- jQuery -->
<!-- <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 echo base_url('') <?php echo '?>'; ?>
/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
> -->
<!-- Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<!-- DataTables  & Plugins -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-responsive/js/dataTables.responsive.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-buttons/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/jszip/jszip.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/pdfmake/pdfmake.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/pdfmake/vfs_fonts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-buttons/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-buttons/js/buttons.print.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/datatables-buttons/js/buttons.colVis.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<!-- <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 echo base_url('') <?php echo '?>'; ?>
/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
> -->
<!-- Bootstrap 4 -->
<!-- <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 echo base_url('') <?php echo '?>'; ?>
/plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
> -->
<!-- Select2 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/select2/js/select2.full.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/select2/js/select2.full.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"><?php echo '</script'; ?>
>
<!-- InputMask -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/moment/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/inputmask/jquery.inputmask.min.js"><?php echo '</script'; ?>
>
<!-- date-range-picker -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- bootstrap color picker -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"><?php echo '</script'; ?>
>
<!-- Tempusdominus Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap Switch -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bootstrap-switch/js/bootstrap-switch.min.js"><?php echo '</script'; ?>
>
<!-- BS-Stepper -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/bs-stepper/js/bs-stepper.min.js"><?php echo '</script'; ?>
>
<!-- dropzonejs -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/plugins/dropzone/min/dropzone.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

$(function() {
    // $("#example1").DataTable({
    //   "responsive": true,
    //   "lengthChange": true,
    //   "autoWidth": false,
    //   "paging": true,
    //   "info": true,
    //   "lengthMenu": [
    //     [10, 25, 50, 500, -1],
    //     [10, 25, 50, 500, "All"]
    //   ],
    //   "dom": '<"pull-left"f><"pull-right"l>tip',

    //   "buttons": ["copy", "csv", "excel", "pdf", "print", ]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example1").DataTable({
        // "responsive": true,
        "paging": true,
        "info": true,
        // "pageLength": 500,
        "lengthMenu": [
            [10, 25, 50, 500, -1],
            [10, 25, 50, 500, "All"]
        ],
        'scrollCollapse': true,
        'scrollY': '500px',
        'scrollX': true,

        "buttons": ["copy", "csv", "excel", "pdf", "print", ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
        "paging": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", ],
        'scrollCollapse': true,
        'scrollY': '500px',
        'scrollX': true,
    });
});


// DropzoneJS Demo Code End
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

$(function() {
    <?php if (($_smarty_tpl->tpl_vars['viewPage']->value != "dashboard/dashboard.php")) {?>
    //Initialize Select2 Elements
    $('.select2').select2()

   <?php }?>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

})

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});

// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false;

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file);
    };
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
});

myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
});

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
};
document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
};
// DropzoneJS Demo Code End
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function checkFileSize(formId) {
  const fileInput = document.getElementById(`fileInput${formId}`);
  const fileSize = fileInput.files[0].size; // Get file size in bytes
  const maxSize = 5 * 1024 * 1024; // 20MB in bytes

  if (fileSize > maxSize) {
    alert("File size exceeds 5MB not allowed to upload. Please select a smaller file.");
    fileInput.value = ""; // Clear the input field
  }
}

// You can also add an event listener to prevent form submission if the file size is too large.
document.getElementById(`form${formId}`).addEventListener("submit", function (event) {
  const fileInput = document.getElementById(`fileInput${formId}`);
  const fileSize = fileInput.files[0].size;
  const maxSize = 5 * 1024 * 1024;

  if (fileSize > maxSize) {
    alert("File size exceeds 5MB not allowed to upload. Please select a smaller file.");
    event.preventDefault(); // Prevent form submission
  }
});

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
