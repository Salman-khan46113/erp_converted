<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <nav aria-label="breadcrumb">
      <div class="sub-header-left pull-left breadcrumb">
        <h1>
          Store
          <a hijacked="yes" href="#stock/issue_request/index" class="backlisting-link" title="Back to Issue Request Listing" >
            <i class="ti ti-chevrons-right" ></i>
            <em >Inwarding</em></a>
          </h1>
          <br>
          <span >Challan History</span>
        </div>
      </nav>


      <!-- Main content -->
      <div class="card p-0 mt-4">
        <div class="table-responsive text-nowrap">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped" style="border-collapse: collapse;" border-color="#e1e1e1" id="inwarding">
            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th>Supplier Challan Number</th>
                  <th>Qty</th>
                  <th>Accepted Qty</th>
                  <th>Rejected Qty</th>
                  <th>Status</th>
                  <th>Date & Time </th>
               </tr>
            </thead>
            <tbody>
                  <%assign var='i' value= 1 %>
                  <%if ($challan_parts_data) %>
                      <%foreach from=$challan_parts_data item=s %>
                   <tr>
                      <td><%$i %></td>
                      <td><%$s->supplier_challan_number %></td>
                      <td><%$s->qty %></td>
                      <td><%$s->accepeted_qty %></td>
                      <td><%$s->reject_qty %></td>
                      <td><%$s->status %></td>
                      <td><%$s->created_date %>/<%$s->created_time %></td>
                   </tr>
                    <%assign var='i' value= $i+1 %>
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
  <script src="<%$base_url%>public/js/store/inwarding.js"></script>
