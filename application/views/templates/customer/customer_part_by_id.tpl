<div class="wrapper" style="width:2500px">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer Part </h1>
                    </div>
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>">Home</a></li>
                            <li class="breadcrumb-item active">Customer Part</li>
                        </ol> -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <a href="<%$base_url%>customer_master" class="btn btn-dark ">
                                            < Back </a>
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleAddModal">Add</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Modal -->
                            <div class="modal fade" id="exampleAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Customer Part</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<%$base_url%>addcustomerpart" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="">Select Part <span class="text-danger">*</span></label>
                                                            <select name="customer_parts_master_id" required id="" class="form-control select2">
                                                                <%if $customer_parts_master%>
                                                                    <%foreach from=$customer_parts_master item=c%>
                                                                        <option value="<%$c->id%>"><%$c->part_number%> / <%$c->part_description%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">HSN Code </label>
                                                            <input type="text" name="hsn_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label> Part Family </label><span class="text-danger">*</span>
                                                            <select readonly class="form-control select2" name="part_family" style="width: 100%;">
                                                                <%if $part_family%>
                                                                    <%foreach from=$part_family item=p%>
                                                                        <option value="<%$p->name%>"><%$p->name%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label> Select Tax Structure </label><span class="text-danger">*</span>
                                                            <select class="form-control select2" name="gst_id" style="width: 100%;">
                                                                <%foreach from=$gst_structure item=c%>
                                                                    <option value="<%$c->id%>"><%$c->code%></option>
                                                                <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label> UOM </label><span class="text-danger">*</span>
                                                            <select readonly class="form-control select2" name="uom" style="width: 100%;">
                                                                <%foreach from=$uom item=c%>
                                                                    <option value="<%$c->uom_name%>"><%$c->uom_name%> - <%$c->uom_description%></option>
                                                                <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Packaging QTY </label><span class="text-danger">*</span>
                                                            <input type="number" min="0" step="1" name="packaging_qty" required class="form-control" id="packaging_quantity">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Safety Stock </label><span class="text-danger">*</span>
                                                            <input type="number" name="safety_stock" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>

                                                        <div class="form-group">
                                                            <label> Customer List </label><span class="text-danger">*</span>
                                                            <select readonly class="form-control select2" name="customer_id" style="width: 100%;">
                                                                <%foreach from=$customers item=c%>
                                                                    <%if $customer_id == $c->id%>
                                                                        <option <%if $customer_id == $c->id%>selected<%/if%> value="<%$c->id%>"><%$c->customer_name%></option>
                                                                    <%/if%>
                                                                <%/foreach%>
                                                            </select>
                                                        </div>
                                                        <%if $entitlements.isPlastic%>
                                                            <div class="form-group">
                                                                <label for="po_num">Gross weight (gram) <span class="text-danger">*</span></label>
                                                                <input type="number" required step="any" name="gross_weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="po_num">Finish weight (gram) <span class="text-danger">*</span></label>
                                                                <input type="number" required step="any" name="finish_weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="po_num">Runner weight (gram) <span class="text-danger">*</span></label>
                                                                <input type="number" required step="any" name="runner_weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="po_num">Cycle Time <span class="text-danger">*</span></label>
                                                                <input type="number" required step="any" name="cycyle_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="po_num">Production Target Per Shift <span class="text-danger">*</span></label>
                                                                <input type="number" required step="any" name="production_target_per_shift" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                        <%/if%>
                                                        <%if $entitlements.isSheetMetal%>
                                                            <div class="form-group">
                                                                <label for="po_num">RM Grade<span class="text-danger">*</span></label>
                                                                <input type="text" required name="rm_grade" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <%if $TusharEngg%>
                                                                <div class="form-group">
                                                                    <label for="thickness">Thickness<span class="text-danger">*</span></label>
                                                                    <input type="number" step="any" required name="thickness" class="form-control" id="thickness" aria-describedby="thicknessHelp">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="passivationType">Passivation Type<span class="text-danger">*</span></label>
                                                                    <input type="text" required name="passivationType" class="form-control" id="passivationType" aria-describedby="passivationTypeHelp">
                                                                </div>
                                                            <%/if%>
                                                        <%/if%>
                                                        <div class="form-group">
                                                            <label> Select Type </label><span class="text-danger">*</span>
                                                            <select class="form-control select2" name="type" style="width: 100%;">
                                                                <option value="standard_po">Standard PO</option>
                                                                <option value="subcon_po">Subcon Po</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Is Service </label><span class="text-danger">*</span>
                                                            <select class="form-control select2" required name="isservice" style="width: 100%;">
                                                                <option value="">Select</option>
                                                                <option value="Y">YES</option>
                                                                <option value="N">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                    </div>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Add Production</th>
                                            <th>Customer Name</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>PO Type</th>
                                            <th>Part Family</th>
                                            <th>Tax Structure</th>
                                            <th>UOM</th>
                                            <th>Packaging QTY</th>
                                            <th>HSN</th>
                                            <th>Safety Stock</th>
                                            <%if $entitlements.isPlastic%>
                                                <th>Gross Weight (gram)</th>
                                                <th>Finish Weight(gram)</th>
                                                <th>Runner Weight(gram)</th>
                                                <th>Cycyle time(sec)</th>
                                                <th>Production target per shift</th>
                                            <%/if%>
                                            <%if $entitlements.isSheetMetal%>
                                                <th>RM Grade</th>
                                                <%if $TusharEngg%>
                                                    <th>Thickness</th>
                                                    <th>Passivation Type</th>
                                                <%/if%>
                                            <%/if%>
                                            <th>Is Service</th>
                                            <th>Update</th>
                                            <th>Drawing Parameters</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%assign var="i" value=1%>
                                        <%if $customer_part_list%>
                                            
                                            <%foreach from=$customer_part_list item=poo%>
                                               
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                                                            Add Production Qty
                                                        </button>
                                                        <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <form action="<%$base_url%>add_production_qty" method="POST" enctype="multipart/form-data">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label required for="on click url">Select Shift Type
                                                                                / Name / Start Time /
                                                                                End Time<span class="text-danger">*</span></label>
                                                                            <select name="shift_id" name="" id="" class="form-control select2">
                                                                                <%if $shifts%>
                                                                                    <%foreach from=$shifts item=s%>
                                                                                        <option value="<%$s->id%>"><%$s->shift_type%> / <%$s->name%> / <%$s->start_time%> / <%$s->end_time%></option>
                                                                                    <%/foreach%>
                                                                                <%/if%>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="on click url">Select Operator<span class="text-danger">*</span></label>
                                                                            <select required name="operator_id" id="" class="form-control select2">
                                                                                <%if $operator%>
                                                                                    <%foreach from=$operator item=s%>
                                                                                        <option value="<%$s->id%>"><%$s->name%></option>
                                                                                    <%/foreach%>
                                                                                <%/if%>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="on click url">Select Machine<span class="text-danger">*</span></label>
                                                                            <select required name="machine_id" id="" class="form-control select2">
                                                                                <%if $machine%>
                                                                                    <%foreach from=$machine item=s%>
                                                                                        <option value="<%$s->id%>"><%$s->name%></option>
                                                                                    <%/foreach%>
                                                                                <%/if%>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="on click url">Select Inhouse Part /
                                                                                Customer Part<span class="text-danger">*</span></label>
                                                                            <select required name="output_part_id" id="" class="form-control select2">
                                                                                <%if $operations_bom%>
                                                                                    <%foreach from=$operations_bom item=s%>
                                                                                        <%if $s->customer_part_number == $po[$poo->id][0]->part_number%>
                                                                                            <%if $operations_bom_inputs_data[$s->id]%>
                                                                                                <option value="<%$s->id%>"><%$s->customer_part_number%> / <%$output_part_data[$s->output_part_id][0]->part_number%> / <%$output_part_data[$s->output_part_id][0]->part_description%> / <%$s->customer_part_number%> / <%$s->id%></option>
                                                                                            <%/if%>
                                                                                        <%/if%>
                                                                                    <%/foreach%>
                                                                                <%/if%>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="on click url">Enter QTY<span class="text-danger">*</span></label>
                                                                            <input type="number" min="1" value="1" name="qty" required class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="on click url">Enter Date
                                                                                <span class="text-danger">*</span></label>
                                                                            <input max="<%$smarty.now|date_format:'%Y-%m-%d'%>" type="date" value="<%$smarty.now|date_format:'%Y-%m-%d'%>" name="date" required class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save
                                                                            changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><%$customer_data[0]->customer_name%></td>
                                                    <td><%$po[$poo->id][0]->part_number%></td>
                                                    <td><%$po[$poo->id][0]->part_description%></td>
                                                    <td><%$po[$poo->id][0]->type%></td>
                                                    <td><%$po[$poo->id][0]->part_family%></td>
                                                    <td><%$gst_structure2[$po[$poo->id][0]->gst_id][0]->code%></td>
                                                    <td><%$po[$poo->id][0]->uom%></td>
                                                    <td><%$po[$poo->id][0]->packaging_qty%></td>
                                                    <td><%$po[$poo->id][0]->hsn_code%></td>
                                                    <td><%$po[$poo->id][0]->safety_stock%></td>
                                                    <%if $entitlements.isPlastic%>
                                                        <td><%$po[$poo->id][0]->gross_weight%></td>
                                                        <td><%$po[$poo->id][0]->finish_weight%></td>
                                                        <td><%$po[$poo->id][0]->runner_weight%></td>
                                                        <td><%$po[$poo->id][0]->cycyle_time%></td>
                                                        <td><%$po[$poo->id][0]->production_target_per_shift%></td>
                                                    <%/if%>
                                                    <%if $entitlements.isSheetMetal%>
                                                        <td><%$po[$poo->id][0]->rm_grade%></td>
                                                        <%if $TusharEngg%>
                                                            <td><%$po[$poo->id][0]->thickness%></td>
                                                            <td><%$po[$poo->id][0]->passivationType%></td>
                                                        <%/if%>
                                                    <%/if%>
                                                    <td><%if $po[$poo->id][0]->isservice == 'Y'%>YES<%else%>NO<%/if%></td>
                                                    <td>
                                                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModaledit2333<%$i%>"> <i class="fas fa-edit"></i></button>
                                                        <div class="modal fade" id="exampleModaledit2333<%$i%>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog " role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update Part Details</h5>
                                                                      
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<%$base_url%>updatecustomerpart_new" method="POST" enctype='multipart/form-data'>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input value="<%$po[$poo->id][0]->id%>" type="hidden" name="id" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Customer Name">
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Part Description<span class="text-danger">*</span></label>
                                                                                        <input type="text" name="upart_description" required class="form-control" id="upart_description" value="<%$po[$poo->id][0]->part_description%>" aria-describedby="partDescriptionHelp">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Select Type </label><span class="text-danger">*</span>
                                                                                        <select class="form-control select2" name="type" style="width: 100%;">
                                                                                            <option value="standard_po" <%if $po[$poo->id][0]->type == 'standard_po'%>selected<%/if%>>Standard PO</option>
                                                                                            <option value="subcon_po" <%if $po[$poo->id][0]->type == 'subcon_po'%>selected<%/if%>>Subcon Po</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label> Part Family </label><span class="text-danger">*</span>
                                                                                        <select readonly class="form-control select2" name="part_family" style="width: 100%;">
                                                                                            <%if $part_family%>
                                                                                                <%foreach from=$part_family item=p%>
                                                                                                    <option value="<%$p->name%>"><%$p->name%></option>
                                                                                                <%/foreach%>
                                                                                            <%/if%>
                                                                                        </select>
                                                                                    </div>

                                                                                    <%if $entitlements.isPlastic%>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Gross weight (gram) <span class="text-danger">*</span></label>
                                                                                            <input type="number" required step="any" name="gross_weight" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->gross_weight%>" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Finish weight (gram) <span class="text-danger">*</span></label>
                                                                                            <input type="number" required step="any" name="finish_weight" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->finish_weight%>" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Runner weight (gram) <span class="text-danger">*</span></label>
                                                                                            <input type="number" required step="any" name="runner_weight" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->runner_weight%>" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Cycle Time <span class="text-danger">*</span></label>
                                                                                            <input type="number" required step="any" name="cycyle_time" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->cycyle_time%>" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="po_num">Production Target Per Shift <span class="text-danger">*</span></label>
                                                                                            <input type="number" required step="any" name="production_target_per_shift" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->production_target_per_shift%>" aria-describedby="emailHelp">
                                                                                        </div>
                                                                                    <%/if%>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">RM Grade <span class="text-danger">*</span></label>
                                                                                        <input type="text" required name="rm_grade" class="form-control" id="exampleInputEmail1" value="<%$po[$poo->id][0]->rm_grade%>" aria-describedby="emailHelp">
                                                                                    </div>
                                                                                    <%if $TusharEngg%>
                                                                                        <div class="form-group">
                                                                                            <label for="thickness">Thickness<span class="text-danger">*</span></label>
                                                                                            <input type="number" step="any" required name="thickness" class="form-control" id="thickness" value="<%$po[$poo->id][0]->thickness%>" aria-describedby="thicknessHelp">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="passivationType">Passivation Type<span class="text-danger">*</span></label>
                                                                                            <input type="text" required name="passivationType" class="form-control" id="passivationType" value="<%$po[$poo->id][0]->passivationType%>" aria-describedby="passivationTypeHelp">
                                                                                        </div>
                                                                                    <%/if%>
                                                                                    <div class="form-group">
                                                                                        <label for="safety_stock">Safety/buffer stock <span class="text-danger">*</span></label>
                                                                                        <input type="text" value="<%$po[$poo->id][0]->safety_stock%>" name="safety_stock" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safety/buffer stock">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="hsn_code">HSN Code<span class="text-danger">*</span></label>
                                                                                        <input type="text" value="<%$po[$poo->id][0]->hsn_code%>" name="hsn_code" required class="form-control" id="exampleInputEmail1" placeholder="Enter HSN Code">
                                                                                        <input type="hidden" value="<%$po[$poo->id][0]->id%>" name="id" required class="form-control" id="exampleInputEmail1">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label> Select Tax Structure</label><span class="text-danger">*</span>
                                                                                        <select class="form-control select2" name="gst_id" style="width: 100%;">
                                                                                            <%foreach from=$gst_structure item=c%>
                                                                                                <option <%if $c->id == $gst_structure2[$po[$poo->id]][0]->id%>selected<%/if%> value="<%$c->id%>"><%$c->code%></option>
                                                                                            <%/foreach%>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label> UOM </label><span class="text-danger">*</span>
                                                                                        <select class="form-control select2" readonly name="uom" style="width: 100%;">
                                                                                            <%foreach from=$uom item=c1%>
                                                                                                <option <%if $c1->uom_name == $po[$poo->id][0]->uom%>selected<%/if%> value="<%$c1->uom_name%>"><%$c1->uom_name%></option>
                                                                                            <%/foreach%>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="po_num">Packaging QTY </label><span class="text-danger">*</span>
                                                                                        <input type="number" min="0" step="1" name="packaging_qty" value="<%$po[$poo->id][0]->packaging_qty%>" required class="form-control" id="packaging_quantity">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label> Select Is Service </label><span class="text-danger">*</span>
                                                                                        <select class="form-control select2" required name="isservice" style="width: 100%;">
                                                                                            <option value="">Select Is-Service</option>
                                                                                            <option value="Y" <%if $po[$poo->id][0]->isservice == 'Y'%>selected<%/if%>>YES</option>
                                                                                            <option value="N" <%if $po[$poo->id][0]->isservice == 'N'%>selected<%/if%>>NO</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                </div>
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
                                                        <a class="btn btn-primary" href="<%$base_url%>view_inspection_parm_details/<%$customer_data[0]->id%>/<%$poo->id%>">
                                                            <i class='far fa-eye'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <%assign var="i" value=$i+1%>
                                            <%/foreach%>
                                        <%/if%>
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
    <!-- /.content-wrapper -->
</div>

