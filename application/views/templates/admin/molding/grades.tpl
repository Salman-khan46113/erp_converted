
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    
    <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Production
          <a hijacked="yes" href="javascript:void(0)" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Grades</em></a>
          </h1>
          <br>
          <span >Grades</span>
        </div>
      </nav>

      <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
        <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
        <%*<button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button> *%>

        <button type="button" class="btn btn-seconday" data-bs-toggle="modal"
        data-bs-target="#addPromo" title="Add Grades">
        <i class="ti ti-plus"></i>
      </button>
    </div>

    <div class="modal fade" id="addPromo" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">
          <form action="<%base_url('add_grades') %>" method="POST"
            enctype="multipart/form-data" id="gradesForm">
            <div class="form-group">
              <label for="on click url">Grades <span
                class="text-danger">*</span></label> <br>
                <input required type="text" name="name"
                placeholder="Enter Grade Name" class="form-control" value=""
                id="">
              </div>
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
              data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="card p-0 mt-4">

      <div class="table-responsive text-nowrap">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="grades">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Rejection Qty</th>
            </tr>
          </thead>
          <tbody>
            <%assign var='i' value= 1 %>
            <%if ($grades) %>
            <%foreach from=$grades item=u %>
            <tr>
              <td><%$i %></td>
              <td><%$u->name %></td>
              <td><%$u->rejection_qty %></td>
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




<script src="<%$base_url%>public/js/production/grades.js"></script>
