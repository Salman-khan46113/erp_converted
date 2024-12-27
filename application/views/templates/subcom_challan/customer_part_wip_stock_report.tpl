<div style="width:100%" class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer item part</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form action="<%$smarty.const.BASE_URL%>customer_part_wip_stock_report" method="POST">
                  <div class="row">
                    <div class="col-lg-7">
                      <label for="">Select Part Number / Description / Customer</label>
                      <select name="selected_customer_part_number" required id="" class="form-control select2">
                        <option <%if $selected_customer_part_number eq 0%>selected <%/if%> value="0">NA</option>
                        <%if $customer_parts_data%>
                        <%foreach from=$customer_parts_data item=c%>
                        <option <%if $selected_customer_part_number eq $c->part_number%>selected <%/if%> value="
                                                                <%$c->part_number%>">
                          <%$c->part_number%> /
                          <%$c->part_description%> /
                          <%$c->customer_name%>
                        </option>
                        <%/foreach%>
                        <%/if%>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <button class="btn btn-danger mt-4">
                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Customer Name</th>
                      <th>Customer Part Number</th>
                      <th>item part Number</th>
                      <th>item part Description</th>
                      <th>Inhouse Stock</th>
                      <th>FG Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <%assign var="i" value=1%>
                    <%if $operations_bom%>
                     <%foreach from=$operations_bom item=po%>
                    
                    <tr>
                      <td>
                        <%$i%>
                      </td>
                      <td>
                        <%$customer_data[$po->id][0]->customer_name%>
                      </td>
                      <td>
                        <%$po->customer_part_number%>
                      </td>
                      <td>
                        <%$output_part_data[$po->id][0]->part_number%>
                      </td>
                      <td>
                        <%$output_part_data[$po->id][0]->part_description%>
                      </td>
                      <td>
                        <%if $type[$po->id] eq "inhouse_parts"%>
                        <%$current_stock[$po->id]%>
                        <%/if%>
                      </td>
                      <td>
                        <%if $type[$po->id] eq "customer_stock"%>
                        <%$current_stock[$po->id]%>
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