<div class="wrapper container-xxl flex-grow-1 container-p-y">
  <!-- Navbar -->
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme filter-popup-block" style="width: 0px;">
    <div class="app-brand demo justify-content-between">
        <a href="javascript:void(0)" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Filter</span>
        </a>
        <div class="close-filter-btn d-block filter-popup cursor-pointer">
                <i class="ti ti-x fs-8"></i>
            </div>
    </div>
    <nav class="sidebar-nav scroll-sidebar filter-block" data-simplebar="init">
      <div class="simplebar-content" >
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <div class="filter-row">
              <li class="nav-small-cap">
                <span class="hide-menu">Select Month</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                <select name="supplier_id" class="form-control select2" id="supplier_id">
                <option value="All"> All </option><%foreach from=$supplier_list item=$s%> <option <%if ($filter_supplier_id === $s->id) %>selected <%/if%> value="<%$s->id %>"><%$s->supplier_name %> </option><%/foreach%>
              </select>
                </div>
              </li>
            </div>
           

        </ul>
      </div>
    </nav>
    <div class="filter-popup-btn">
            <button class="btn btn-outline-danger reset-filter">Reset</button>
            <button class="btn btn-primary search-filter">Search</button>
        </div>
</aside>

    <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Reports
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Approved Supplier List</em></a>
        </h1>
        <br>
        <span >Approved Supplier List</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="table-responsive text-nowrap">
                <table id="approved_supplier_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <%foreach from=$data key=key item=val%>
                  <th><b>Search <%$val['title']%></b></th>
                  <%/foreach%>
              </tr>
                  </thead>
                  <tbody>
                     <%* <%assign var=i value=1%><%if ($supplier_list) %>
                  	  <%foreach from=$supplier_list  item=$s %>
                  	  <%if (isset($filter_supplier_id) && $filter_supplier_id != "All" && $filter_supplier_id != $s->id) && $filter_supplier_id != "" %>
                  	  <%continue %>
                  	  <%/if%> 
                  	  <tr>
                      <td><%$i %> </td>
                      <td><%$s->supplier_name %> </td>
                      <td><%$s->supplier_number %> </td>
                      <td><%$s->location %> </td>
                      <td><%$s->email %> </td>
                      <td><%$s->mobile_no %> </td>
                      <td><%$s->pan_card %> </td>
                      <td><%$s->gst_number %> </td>
                      <td><%$s->state %> </td>
                      <td><%$s->payment_terms %> </td>
                      <td><%if (!empty($s->nda_document)) %> <a href="<%base_url('documents/') %><%$s->nda_document %>" download>Download </a><%/if%> </td>
                      <td><%if (!empty($s->registration_document)) %> <a href="<%base_url('documents/') %><%$s->registration_document %>" download>Download </a><%/if%> </td>
                      <td><%if (!empty($s->other_document_1)) %> <a href="<%base_url('documents/') %><%$s->other_document_1 %>" download>Download </a><%/if%> </td>
                      <td><%if (!empty($s->other_document_2)) %> <a href="<%base_url('documents/') %><%$s->other_document_2 %>" download>Download </a><%/if%> </td>
                      <td><%if (!empty($s->other_document_3)) %> <a href="<%base_url('documents/')%><%$s->other_document_3 %>" download>Download </a><%/if%> </td>
                      <td><%$s->admin_approve %> </td>
                      <td><%$s->with_in_state %> </td>
                      <td>
                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<%$i %>">
                          <i class="fas fa-edit"></i>
                        </button>
                        
                        <!-- <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal
						 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                    </button> -->
                        <!-- Modal -->
                       
                      </td>
                    </tr><%assign var=i value=$i+1%><%/foreach%><%/if%>  *%>
                    
                    </tbody>
                </table>
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
    <div class="modal fade" id="exampleModal2<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Supplier Number </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <form action="<%base_url('updateSupplier') %>" method="POST" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label for="machine_name">Supplier Name</label>
                                        <span class="text-danger">*</span>
                                        <input value="<%$s->id %>" name="id" type="hidden" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Name">
                                        <input value="<%$s->supplier_name %>" readonly name="updateName" type="text" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Name">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Approve Supplier</label>
                                        <span class="text-danger">*</span>
                                        <select name="admin_approve" required id="" class="form-control">
                                          <option value="accept">accept </option>
                                          <option value="pending">pending </option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Supplier Number</label>
                                        <span class="text-danger">*</span>
                                        <input value="<%$s->supplier_number %>" readonly name="updateNumber" type="text" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Number">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Supplier Address</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" value="<%$s->location %>" name="updatesupplierlocation" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Supplier Mobile Number</label>
                                        <span class="text-danger">*</span>
                                        <input type="number" value="<%$s->mobile_no %>" name="updatesupplierMnumber" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Other Document 2</label>
                                        <input type="file" name="other_document_2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                        <input type="hidden" name="other_document_2_old" value="<%$s->other_document_2 %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Other Document 3</label>
                                        <input type="file" name="other_document_3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                        <input type="hidden" name="other_document_3_old" value="<%$s->other_document_3 %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                      </div>
                                      <div class="form-group">
                                        <label for="machine_name">Upload NDA Document</label>
                                        <input type="file" name="nda_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                        <input type="hidden" name="nda_document_old" class="form-control" value="<%$s->nda_document %>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                      </div>
                                      <div class="form-group">
                                        <label>With in State </label>
                                        <span class="text-danger">*</span>
                                        <select class="form-control select2" name="with_in_state" style="width: 100%;">
                                          <option <%if ($s->with_in_state == "yes") %>selected<%/if%> value="yes"> Yes </option>
                                          <option <%if ($s->with_in_state == "no") %>selected <%/if%> value="no">No </option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="machine_name">Supplier Email</label>
                                      <span class="text-danger">*</span>
                                      <input type="email" value="<%$s->email %>" name="updatesupplierEmail" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">
                                    </div>
                                    <div class="form-group">
                                      <label for="customer_location">Add State</label>
                                      <span class="text-danger">*</span>
                                      <input type="text" name="ustate" required value="<%$s->state %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add State">
                                    </div>
                                    <div class="form-group">
                                      <label for="customer_location">Add GST Number</label>
                                      <span class="text-danger">*</span>
                                      <input type="text" name="ugst_no" required value="<%$s->gst_number %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add GST Number">
                                    </div>
                                    <div class="form-group">
                                      <label for="machine_name">Other Document 1</label>
                                      <input type="file" name="other_document_1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                      <input type="hidden" name="other_document_1_old" value="<%$s->other_document_1 %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                    </div>
                                    <div class="form-group">
                                      <label for="payment_terms">Payment Terms</label>
                                      <span class="text-danger">*</span>
                                      <input type="text" value="<%$s->payment_terms %>" name="upaymentTerms" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                    </div>
                                    <div class="form-group">
                                      <label for="machine_name">Upload Registration Document</label>
                                      <input type="file" name="registration_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                      <input type="hidden" name="registration_document_old" value="<%$s->registration_document %>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="exampleModal<%$i %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<%base_url('delete') %>" method="POST">
                                <input value="<%$s->id %>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                <input value="supplier" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name"> Are you sure you want to delete
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete </button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
  </div>
  <!-- /.content-wrapper -->

  <script>
    var column_details =  <%$data|json_encode%>;
    var page_length_arr = <%$page_length_arr|json_encode%>;
    var is_searching_enable = <%$is_searching_enable|json_encode%>;
    var is_top_searching_enable =  <%$is_top_searching_enable|json_encode%>;
    var is_paging_enable =  <%$is_paging_enable|json_encode%>;
    var is_serverSide =  <%$is_serverSide|json_encode%>;
    var no_data_message =  <%$no_data_message|json_encode%>;
    var is_ordering =  <%$is_ordering|json_encode%>;
    var sorting_column = <%$sorting_column%>;
    var api_name =  <%$api_name|json_encode%>;
    var base_url = <%$base_url|json_encode%>;
</script>
<script src="<%$base_url%>/public/js/reports/approved_supplier.js"></script>