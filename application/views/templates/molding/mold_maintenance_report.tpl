<div class="wrapper container-xxl flex-grow-1 container-p-y">

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
                <span class="hide-menu">Select Customer_part</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                <select name="customer_name" class="form-control select2" id="customer_name">
                <option <%if $filter_child_part_id eq "All"%>selected<%/if%> value="All">All</option>
                <%foreach $customer_part_filter_data as $key => $val%>
                    <option value="<%$val%>"><%$val%></option>
                <%/foreach%>
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
            <em >Mold Life Report</em></a>
        </h1>
        <br>
        <span >Mold Life Report</span>
      </div>
    </nav>
    <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
      <button class="btn btn-seconday" type="button" id="downloadCSVBtn" title="Download CSV"><i class="ti ti-file-type-csv"></i></button>
      <button class="btn btn-seconday" type="button" id="downloadPDFBtn" title="Download PDF"><i class="ti ti-file-type-pdf"></i></button>
      <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
      <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
    </div>

    <div class="content-wrapper">
       
        <section class="content">
        <div>
            <div class="row">
                <br>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Customer Part</th>
                                        <th>Mold Name</th>
                                        <th>No Of Cavity</th>
                                        <th>Mold Life Over Frequency</th>
                                        <th>Mold PM Frequency</th>
                                        <th>Molding Prod QTY</th>    
                                        <th style="width:100px">Last PM Date</th>    
                                        <th>PM Report</th>
                                        <th>Mold History</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <%if $mold_maintenance%>
                                        <%assign var="i" value=1%>
                                        <%foreach $mold_maintenance as $u%>
                                            <%if isset($filter_child_part_id) && $filter_child_part_id neq "All" && $filter_child_part_id neq $u['customer_part_id']%>
                                                <%continue%>
                                            <%/if%>
                                           
                                            <tr>
                                                <td><%$i%></td>
                                                <td><%$u['customer_name']%>/<%$u['part_number']%>/<%$u['part_description']%></td>
                                                <td><%$u['mold_name']%></td>
                                                <td><%$u['no_of_cavity']%></td>
                                                <td><%$u['target_over_life']%></td>
                                                <td><%$u['target_life']%></td>
                                                <%if $u['tot'] gt $u['target_life']%>
                                                    <td style="background-color:red;color:white"><%$u['tot']%></td>
                                                <%else%>
                                                    <td><%$u['tot']%></td>
                                                <%/if%>
                                                <td><%$mold_maintenance_docs[$u['mold_name']][0]->pm_date%></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uplddoc<%$i%>">
                                                      <i class="fas fa-upload" aria-hidden="true"></i>
                                                    </button>
                    
                                                    <%if !empty($mold_maintenance_docs[$u['mold_name']][0]->doc)%>
                                                        <a title="Download" class="btn btn-xs btn-success" download href="<%$base_url%>documents/<%$mold_maintenance_docs[$u['mold_name']][0]->doc%>"><i class="fas fa-download" aria-hidden="true"></i> </a>
                                                    <%/if%>
                  
                                                    <div class="modal fade" id="uplddoc<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            <form  id="form111" action="<%$base_url%>upload_mold_maintenance_doc" method="POST" id="form111" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="on click url">PM Date<span class="text-danger">*</span></label>
                                                                        <br>
                                                                        <input required type="date" name="pm_date" class="form-control" max="<%$smarty.now|date_format:'%Y-%m-%d'%>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="on click url">Document<span class="text-danger">*</span></label>
                                                                        <br>
                                                                        <input required type="file" name="doc" class="form-control" value="" id="fileInput111" onchange="checkFileSize(111)">
                                                                        <input type="hidden" name="no_of_cavity" value="<%$u['no_of_cavity']%>" class="form-control">
                                                                        <input type="hidden" name="mold_name" value="<%$u['mold_name']%>" class="form-control">
                                                                        <input type="hidden" name="customer_part_id" value="<%$u['customer_part_id']%>" class="form-control">
                                                                        <input type="hidden" name="target_life" value="<%$u['target_life']%>" class="form-control">         
                                                                        <input type="hidden" name="target_over_life" value="<%$u['target_over_life']%>" class="form-control">
                                                                        <input type="hidden" name="current_molding_prod_qty" value="<%$u['tot']%>" class="form-control">
                                                                        <input required type="hidden" value="<%$u['id']%>" name="id" placeholder="Enter Mold Life Over Frequency" class="form-control">
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
                                                </td>
                                                <td>
                                                    <%if !empty($mold_maintenance_docs[$u['mold_name']][0]->doc)%>
                                                    <a href="<%$base_url%>mold_maintenance_history/<%$u['mold_name']|replace:' ':'_'%>/<%$u['customer_part_id']                                                                                                                                                                                                                                                                         %>" class="btn btn-primary" href=""><i class="fa fa-history" aria-hidden="true"></i></a>
                                                    <%/if%>
                                                </td>
                                            </tr>
                                            <%assign var="i" value=$i+1%>
                                        <%/foreach%>
                                    <%/if%>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script src="<%$base_url%>/public/js/reports/mold_maintainance_report.js"></script>