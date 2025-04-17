<div class="wrapper container-xxl flex-grow-1 container-p-y">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
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
                <span class="hide-menu">Year</span>
                <span class="search-show-hide float-right"><i class="ti ti-minus"></i></span>
              </li>
              <li class="sidebar-item">
                <div class="input-group">
                  <select name="child_part_id" class="form-control select2" id="year_search">
                    <%foreach from=$year_array key=key item=year%>
                    <option value="<%$year['key']%>" <%if $selected_year eq $year['key']%>selected<%/if%>><%$year['val']%></option>
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
        Planning & Sales
        <a hijacked="yes" class="backlisting-link" title="Back to Issue Request Listing" >
          <i class="ti ti-chevrons-right" ></i>
          <em >Customer Scheduling</em></a>
      </h1>
      <br>
      <span >Financial Year</span>
    </div>
  </nav>
  <div class="dt-top-btn d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <button class="btn btn-seconday filter-icon" type="button"><i class="ti ti-filter" ></i></i></button>
        <button class="btn btn-seconday" type="button"><i class="ti ti-refresh reset-filter"></i></button>
      </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="">
                                <table id="example1" class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <!-- <th>Sr. No.</th> -->
                                            <th style="display: none;" >Key</th>
                                            <th class="text-center">Finanical Year</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <%foreach from=$year_arr key=key item=year%>
                                        <tr>
                                            <!-- <td><%$key+1%></td> -->
                                            <td style="display: none;"><%$year['Key']%></td>
                                            <td class="text-center"><%$year['value']%></td>
                                            <td class="text-center">
                                                <a class="btn btn-info" href="<%$base_url%>planing_data/<%$year['url']%>">View Details</a>
                                            </td>
                                        </tr>
                                        <%/foreach%>
                                    </tbody>
                                </table>
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
    <script type="text/javascript">
        table =  new DataTable('#example1',{
            dom: "Bfrtilp",
            scrollX: false, 
            
                searching: true,
          // scrollX: true,
          scrollY: true,
          bScrollCollapse: true,
          // columnDefs: [{ sortable: false, targets: 9 }],
          lengthMenu: [[12,50,100], [12,50,100]],
          pagingType: "full_numbers",
        });
      $('.dataTables_length').find('label').contents().filter(function() {
          return this.nodeType === 3; // Filter out text nodes
      }).remove();
      setTimeout(function(){
        $(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity
        });
      },1000)
        $(".search-filter").on("click",function(){
             let year= $('#year_search').val();
              // Ensure that the table and column exist before applying the search
              if (table && year) {
                  table.column(0).search(year).draw();
              }
        })
        $(".reset-filter").on("click",function(){
            that.resetFilter();
        })
        $(".search-filter").trigger("click");

    </script>
    <!-- /.content-wrapper -->
