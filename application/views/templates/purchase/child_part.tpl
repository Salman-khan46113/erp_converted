<%assign var="entitlements" value=$session_data['entitlements']%>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Item part List</li>
      </ol>
    </nav>
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4> -->
    <div class="row">
      <div class="col-xl-12">

        <div class="nav-align-top mb-3">
          <ul class="nav nav-pills mb-1 justify-content-center" role="tablist">
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="false">
                Add Direct Regular Item
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="true">
                Add Direct Subcon Item
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                Add Direct Subcon Regular
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                Add Indirect Consumable Item
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                Add Customer Bom Asset
              </button>
            </li>
          </ul>
          <!-- <div class="tab-content">
          <div class="tab-pane fade" id="navs-pills-top-home" role="tabpanel">
          <p>
          Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps
          powder. Bear claw candy topping.
        </p>
        <p class="mb-0">
        Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
        jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
        jujubes sweet.
      </p>
    </div>
    <div class="tab-pane fade active show" id="navs-pills-top-profile" role="tabpanel">
    <p>
    Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
    cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
    cheesecake fruitcake.
  </p>
  <p class="mb-0">
  Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
  cotton candy liquorice caramels.
</p>
</div>
<div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
<p>
Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
cupcake gummi bears cake chocolate.
</p>
<p class="mb-0">
Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
jelly-o tart brownie jelly.
</p>
</div>
</div> -->
</div>
</div>


</div>
<!-- Basic Layout -->
<div class="row">

  <div class="col-xl">
    <div class="card mb-4 px-3">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0" id="form-title">Add</h5>
      </div>
      <div class="card-body">
        <form id="addchildpart" class="mb-3" action="javascript:void(0)" method="POST" enctype='multipart/form-data'>
          <div class="row">
            <div class="col-lg-6 ">
              <div class="form-group mb-3">
                <label for="po_num">Part Number</label><span class="text-danger">*</span>
                <input type="text" name="part_number"  class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
              </div>
              </div>
              <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="po_num">Part Description </label><span class="text-danger">*</span>
                <input type="text" name="part_desc"  class="form-control"  placeholder="Enter Part Description" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="po_num">Safety/buffer stock </label><span class="text-danger">*</span>
                <input type="text" name="safty_buffer_stk"  class="form-control"  placeholder="Enter Saftey/buffer stock" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label for="po_num">HSN Code</label>
                <input type="text" name="hsn_code" class="form-control" id="hsn_code" placeholder="Enter HSN Code" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3">
                <label> Purchase Item Category </label><span class="text-danger">*</span>
                <select class="form-control select2" name="sub_type">
                  <%if $type == "direct"%>
                  <option value="Regular grn">Regular grn</option>
                  <option value="RM">RM</option>
                  <%/if%>
                </select>
              </div>
            </div>


              <%if $type != "direct"%>
              <div class="col-lg-6">
              <div class="form-group mb-3">
                <label> Asset </label>
                <select class="form-control select2" name="asset" style="width: 100%;">
                  <option value="NA">NA</option>
                  <%foreach from=$asset item=a%>
                  <option value="<%$a->id %>">
                    <%$a->name %></option>
                    <%/foreach%>
                  </select>
                </div>
              </div>
                <%/if%>

              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label for="po_num">Store Rack Location</label>
                  <input type="text" name="store_rack_location" class="form-control" id="exampleInputEmail1" placeholder="Enter Store Rack Location" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label for="po_num">Store Stock Rate</label>
                  <input type="number" step="any" name="store_stock_rate" class="form-control" id="exampleInputEmail1" placeholder="Enter Store Stock Rate" aria-describedby="emailHelp">
                </div>
              </div>
                <%if ($entitlements['isSheetMetal']!=null) %>
                <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label for="po_num">Weight</label>
                  <input type="number" step="any" name="weight" class="form-control"  placeholder="Enter Weight" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label for="po_num">Size</label>
                  <input type="text" step="any" name="size" class="form-control"  placeholder="Enter Size" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label for="po_num">Thickness</label>
                  <input type="text" step="any" name="thickness" class="form-control"  placeholder="Enter Thickness" aria-describedby="emailHelp">
                </div>
              </div>

                <%/if%>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label> UOM </label><span class="text-danger">*</span>
                  <select class="form-control select2" name="uom_id" style="width: 100%;">
                    <%foreach from=$uom item=c1%>
                    <option value="<%$c1->id %>">
                      <%$c1->uom_name %></option>
                      <%/foreach%>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="po_num">Max PO Quantity </label><span class="text-danger">*</span>
                    <input  type="number" step="any" name="max_uom" class="form-control" id="hsn_code" placeholder="Enter Max UOM" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="po_num">Grade <span class="text-danger">*</span> </label>
                    <input type="text" name="grade" class="form-control"  placeholder="Enter grade" aria-describedby="emailHelp">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->


  <div class="content-backdrop fade"></div>
</div>
<script type="text/javascript">
  var base_url = <%$base_url|@json_encode%>
</script>
<script src="<%$base_url%>public/js/purchase/add_child_part_item.js"></script>

<!-- Content wrapper -->
