<div class="wrapper">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Process Master</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                  </ol>
                </div>
              </div>
            </div>
          </div> -->
        <!-- /.content-header -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Part Master</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Process</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 ml-3">
                                <%if $this->session->flashdata && $this->session->flashdata('errors')%>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error : </strong> <%$this->session->flashdata('errors')%>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <%/if%>
                                <%if $this->session->flashdata && $this->session->flashdata('success')%>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success :</strong> <%$this->session->flashdata('success')%>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <%/if%>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-lg-12">

                        <!-- Modal -->
                        <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Part</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="<%$base_url%>add_customer_parts_master" method="POST" enctype="multipart/form-data">
                                        </div>
                                        <div class="form-group">
                                            <label for="on click url">Part Number<span class="text-danger">*</span></label> <br>
                                            <input required type="text" name="part_number" placeholder="Enter Part Number" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="on click url">Part Description<span class="text-danger">*</span></label> <br>
                                            <input required type="text" name="part_description" placeholder="Enter Part Description" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="on click url">Rate<span class="text-danger">*</span></label> <br>
                                            <input required type="number" step="any" name="fg_rate" placeholder="Enter Rate" class="form-control" value="0" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">

                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                                    Add
                                </button>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>FG Stock</th>
                                            <th>Rate</th>
                                            <%if $entitlements.isPlastic != null%>
                                                <th>Grade</th>
                                            <%/if%>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <%if $customer_parts_master%>
                                            <%assign var="i" value=1%>
                                            <%foreach from=$customer_parts_master item=u%>
                                                <%if $entitlements.isPlastic != null%>
                                                    
                                                    <%assign var="grade_name" value=""%>
                                                    <%if $grades_data%>
                                                        <%assign var="grade_name" value=$grades_data[$u->grade_id][0]->name%>
                                                    <%/if%>
                                                <%/if%>

                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$u->part_number%></td>
                                                    <td><%$u->part_description%></td>
                                                    <td><%$u->fg_stock%></td>
                                                    <td><%$u->fg_rate%></td>
                                                    <%if $entitlements.isPlastic != null%>
                                                        <td><%$grade_name%></td>
                                                    <%/if%>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<%$i%>">
                                                            <i class='far fa-edit'></i>
                                                        </button>
                                                        <!-- edit Modal -->
                                                        <div class="modal fade" id="edit<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <form action="<%$base_url%>update_customer_parts_master" method="POST" enctype="multipart/form-data">
                                                                                    <div class="form-group">
                                                                                        <label> Part Description</label><span class="text-danger">*</span>
                                                                                        <input type="hidden" readonly value="<%$u->id%>" name="id" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safety/buffer stock" aria-describedby="emailHelp">
                                                                                        <input required type="text" name="part_description" placeholder="Enter Part Description" class="form-control" value="<%$u->part_description%>" id="">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label>Rate<span class="text-danger">*</span></label> <br>
                                                                                        <input required type="number" step="any" name="fg_rate" placeholder="Enter Rate" class="form-control" value="<%$u->fg_rate%>" required>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- edit Modal -->

                                                    </td>
                                                </tr>
                                                <%assign var="i" value=$i + 1%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- ./col -->
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
