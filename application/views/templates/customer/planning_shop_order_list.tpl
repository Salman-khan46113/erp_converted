<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
                  <div class="sub-header-left pull-left breadcrumb">
                     <h1>
                        Planning & Sales
                        <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="">
                        <i class="ti ti-chevrons-right"></i>
                        <em>Production Plan</em></a>
                     </h1>
                     <br>
                     <span>Production Plan</span>
                  </div>
               </nav>

        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                
                                <div class="row">
                                <div class="">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalShop">
                                        Add Order</button>
                                        
                                        <div class="modal fade" id="exampleModalShop" role="dialog"
                                        aria-labelledby="exampleModalShop" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role=" document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalShop">Production Plan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<%$base_url%>add_planning_shop_order" method="POST" id="add_planning_shop_order" class="add_planning_shop_order custom-form">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label for="">Customer <span class="text-danger">*</span></label>
                                                                <select name="customer_id" id="customerTracking"  class="form-control select2 required-input">
                                                                    <option value=''>Select</option>
                                                                    <%if $customer%>
                                                                        <%foreach $customer as $s%>
                                                                            <option value="<%$s->id%>"><%$s->customer_name%></option>
                                                                        <%/foreach%>
                                                                    <%/if%>
                                                                </select> 
                                                                </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                    <label for="">Select Customer Part Number / Description
                                                                    <span class="text-danger">*</span> </label>
                                                                    <select name="customerPartId" id="customerPartId"  class="form-control select2 required-input">
                                                                        <option value=''>Please select</option>
                                                                    </select>
                                                                </div>
                                                                 </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                        <label for="Date">Date
                                                                        </label><span class="text-danger">*</span>
                                                                        <input type="date" min="<%$min_date%>" max="<%$max_date%>"  name="shop_date" class="form-control required-input">
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="contractorName">Production Plan Qty</label><span class="text-danger">*</span>
                                                                        <input type="text"  name="scheduleQty"
                                                                            class="form-control onlyNumericInput required-input" data-min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-3">
                                        <form action="<%$base_url%>planning_shop_order_details" method="post">
                                        <div class="form-group">
                                                            <label for="">Customer <span class="text-danger">*</span></label>
                                                            <select name="selected_customer" class="form-control select2">
                                                            <option value="">Select</option>
                                                            <option value="ALL">ALL</option>
                                                            <%if $customer%>
                                                                <%foreach $customer as $c%>
                                                                   <option <%if $c->id == $selected_customer%>selected<%/if%> value="<%$c->id%>">
                                                                    <%$c->customer_name%></option>
                                                                <%/foreach%>
                                                            <%/if%>
                                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Month<span class="text-danger"></label>
                                            <select required name="filter_month" class="form-control select2">
                                               
                                                    <%foreach $month_data as $key => $val%>
                                                    <option <%if $month_number[$key] eq $filter_month%>selected<%/if%>
                                                        value="<%$month_number[$key]%>"><%$val%></option>
                                                <%/foreach%>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Year<span class="text-danger"></label>
                                            <select required name="filter_year" class="form-control select2">
                                                <%section name=i start=2022 loop=2028%>
                                                    <option  <%if $smarty.section.i.index == $filter_year%>selected<%/if%>
                                                            value="<%$smarty.section.i.index%>"><%$smarty.section.i.index%>-<%$smarty.section.i.index+1%></option>
                                                <%/section%>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <br><input type="submit" class="btn btn-primary mt-2" value="Search">
                                     </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                
                        </div>
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card mt-4">
                            <div class="">
                                <table id="rejection_invoices_table" class="table table-striped">
                                   <thead>
                                        <tr>
                                            <!-- <th>Sr.No.</th> -->
                                            <th>Production Plan No</th>
                                            <th>Customer</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>                                         
                                            <th>Production Plan Date</th>
                                            <th>Production Plan Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <%assign var='i' value=1%>
                                        <%$total=0%>
                                        <%if $planing_data%>
                                            <%foreach $planing_data as $p%>
                                                <tr>
                                                    <!-- <td><%$i%></td> -->
                                                    <td><%$p->shop_no%></td>
                                                    <td><%$p->customer_name%></td>
                                                    <td><%$p->part_number%></td>
                                                    <td><%$p->part_description%></td>
                                                    <td><%$p->shop_date|date_format:'%d/%m/%Y'%></td>
                                                    <td><%$p->scheduleQty%></td>
                                                </tr>
                                            <%assign var='i' value=$i+1%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   
 <script>
    $(document).ready(function() {
        $("#customerTracking").change(function() {
            var customer_id = $("#customerTracking").val();
            // var salesno = $('#sales_number').val();
            $.ajax({
                url: '<%$base_url%>PlanningController/get_customer_parts_for_planning',
                type: "POST",
                data: {
                    id: customer_id
                    //, salesno: salesno
                },
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response) {
                        $('#customerPartId').html(response);
                    } else {
                        $('#customerPartId').html(response);
                    }

                }
            });
        })
        $(".add_planning_shop_order").submit(function(e){
        e.preventDefault();
        var href = $(this).attr("action");
        var id = $(this).attr("id");
        let flag = formValidate(id);
        console.log(flag)
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
    function formValidate(form_class = ''){
        let flag = false;
        $(".custom-form."+form_class+" .required-input").each(function( index ) {
          var value = $(this).val();
          var dataMax = parseFloat($(this).attr('data-max'));
          var dataMin = parseFloat($(this).attr('data-min'));

          if(value == '' || value == null ){
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
            console.log(value,$(this),flag)
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
    });
</script>