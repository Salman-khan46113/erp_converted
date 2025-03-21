
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
      <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
            Planning & Sales
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Sales (Tally) Categories </em></a>
          </h1>
          <br>
          <span >Tally Categories</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
         <%if (checkGroupAccess("sales_invoice_released","add","No")) %>
        <button type="button" class="btn btn-seconday" data-bs-toggle="modal" data-bs-target="#addPromo" title="Add Category">
       <i class="ti ti-plus"></i>
        </button>
        <%/if%>
        <%if (checkGroupAccess("sales_invoice_released","export","No")) %>
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <%/if%>
       <%* <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button> *%>
       

      </div>

      <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                 <form action="<%base_url('add_sales_category') %>" method="POST" enctype="multipart/form-data" id="addCategoryForm">
                  <div class="form-group">
                  <label for="on click url">Name<span class="text-danger">*</span></label> <br>
                  <input required type="text" name="category_name" placeholder="Enter Name" class="form-control" value="" id="">
                  </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
               </form>
               </div>
            </div>
         </div>
      </div>

      <div class="w-100">
            <input type="text" name="reason" placeholder="Filter Search" class="form-control serarch-filter-input m-3 me-0" id="serarch-filter-input" fdprocessedid="bxkoib">
        </div>
      <!-- Main content -->
      <div class="card p-0 mt-4 w-100">
        <div class="">

          <div class="table-responsive text-nowrap">
            <table id="salesCatagories" class="table table-striped w-100">
              <thead>
                 <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Action</th>
                 </tr>
              </thead>
              <tbody>
                 <%if ($sales_category) %>
                      <%assign var='i' value= 1 %>
                      <%foreach from=$sales_category item=u %>
                     <tr>
                        <td><%$i %></td>
                        <td><%$u->category_name %></td>
                        <td>

                                                            <a data-bs-toggle="modal" data-bs-target="#updatePromo<%$i%>" class="edit-role"><i class="ti ti-edit"></i></a>
                                                            <div class="modal fade" id="updatePromo<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog  modal-dialog-centered" role="document">
                                                                 <div class="modal-content">
                                                                    <div class="modal-header">
                                                                       <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                       </button>
                                                                    </div>
                                                                    <form action="<%base_url('update_sales_category') %>" method="POST" enctype="multipart/form-data" id="update_sales_category<%$i%>" class="update_sales_category update_sales_category<%$i%> custom-form">
                                                                    <div class="modal-body">
                                                                       <div class="form-group">
                                                                        <input type="hidden" name="category_id" value="<%$u->sales_category_id%>">
                                                                       </div>
                                                                       <div class="form-group">
                                                                          <label for="on click url">Category Name<span class="text-danger">*</span></label> <br>
                                                                          <input  type="text" name="category_name" placeholder="Enter Category Name" class="form-control required-input" value="<%$u->category_name %>">
                                                                       </div>
                                                                       <div class="modal-footer">
                                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                       <button type="submit" class="btn btn-primary">Save changes</button>
                                                                       </form>
                                                                       </div>
                                                                    </div>
                                                                 </div>
                                                              </div>
                                                           </div>
                                                          </td>
                     </tr>
                   <%assign var='i' value=$i+1 %>
                  <%/foreach%>
                  <%/if%>
              </tbody>
           </table>
          </div>
        </div>
        <!--/ Responsive Table -->
      </div>
      <!-- /.col -->
      <div class="content-backdrop fade"></div>
    </div>
<div class="modal fade" id="accessGroups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Page Access</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
         </div>
         <div class="modal-body">
            <div class="row">

            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<style type="text/css">
  input.check-box{
        width: 18px;
    height: 15px;
        cursor: pointer;
  }
  .menu-form-row {
    margin-top: 5px;
      padding-top: 5px;
      padding-bottom: 5px;
      width: 100%;
      position: relative;
  }
  .menu-form-row .form-label{
    float: left;
      width: 100% !important;
  }
  .menu-form-row .form-label lable{
     font-style: normal !important;
      display: block;
      margin-top: 3px;
      font-size: 17px;
      color: #919396;
      font-family: 'GilroySemibold', sans-serif !important;
  }
  .menu-form-row .form-right-div {
        margin: 10px 6px 10px 13px;
    float: left;
      width: 100% !important;
  }
  .menu-form-row .margin-equilize {
    float: left;
      width: 20%;
  }
  .menu-form-row .margin-equilize label{
      font-size: 17px;
      color: #000;
      margin: 0px 0px 2px 8px;
  }
  .menu-form-row .margin-equilize input{
    width: 17px;
      height: 15px;
      cursor: pointer;
  }
  #accessGroups .modal-body {
     padding: 0 20px 0 20px;
    max-height: 433px !important;
    overflow-y: scroll;
    overflow-x: clip;
  }
  .pointer-none{
    pointer-events: none;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: var(--bs-theme-light4-color) !important;

  }
</style>
    <script type="text/javascript">
    var base_url = <%$base_url|@json_encode%>
    </script>

    <script src="<%$base_url%>public/js/planning_and_sales/tally_sub_category.js"></script>
