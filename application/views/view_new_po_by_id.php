<div style="width:100%" class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        $expired = "no";
                        if ($new_po[0]->expiry_po_date > date('Y-m-d')) {
                            $expired =  "yes";
                        } else {
                        }
                        if (empty($new_po[0]->process_id)) {
                            $type = "normal";
                        } else {
                            $type = "Subcon grn";
                        }
                        ?>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('generate_po') ?>">Home </a></li>
                            <li class="breadcrumb-item active"></li>
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

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_number ?>" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">PO Date <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_date ?>" class="form-control">

                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">PO Expiry Date <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->expiry_po_date ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">PO Remark <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->remark ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Current Status <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php

                                                                                if ($expired == "no") {
                                                                                    echo $statusNew  = "Expired";
                                                                                } else if ($new_po[0]->status == "accept") {
                                                                                    echo $statusNew  = "Released";
                                                                                } else {
                                                                                    echo $new_po[0]->status;
                                                                                } ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Supplier Name <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->supplier_name ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Supplier Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->supplier_number ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Supplier GST <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->gst_number ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <?php
                                    if ($new_po[0]->expiry_po_date <=  date('Y-m-d') || true) {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <form action="<?php echo base_url('add_po_parts'); ?>" method="post">
                                                    <label for="">Select Part Number // Description // Supplier // Rate //
                                                        Tax Structure // Max Qty<span class="text-danger">*</span> </label>
                                                    <?php
                                                    
                                                    ?>
                                                    <select name="part_id" id="" required class="form-control select2">
                                                        <?php

                                                        if ($child_part) {
                                                            foreach ($child_part as $c) {
                                                               
                                                                if ($c->c != '') {
                                                                    if (empty($new_po[0]->process_id)) {
                                                                        $type = "normal";
                                                                    } else {
                                                                        $type = "Subcon grn";
                                                                    }
                                                                    if ($type == "normal") {
                                                                        if ($c->c2[0]->sub_type != "Subcon grn") {
                                                        ?>
                                                                            <option value="<?php echo $c->c2[0]->id ?>">
                                                                                <?php echo $c->c2[0]->part_number . " // " . $c->c2[0]->part_description . " // " . $supplier[0]->supplier_name . "//" . $c->c[0]->part_rate . " // " . $c->gst_structure[0]->code . "//" . $c->c2[0]->max_uom ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        if ($c->c2[0]->sub_type == "Subcon grn" || $c->c2[0]->sub_type == "Subcon Regular") {
                                                                        ?>
                                                                            <option value="<?php echo $c->c2[0]->id ?>">
                                                                                <?php echo $c->c2[0]->part_number . " // " . $c->c2[0]->part_description . " // " . $supplier[0]->supplier_name . "//" . $c->c[0]->part_rate . " // " . $c->gst_structure[0]->code . "//" . $c->c2[0]->max_uom ?>
                                                                            </option>
                                                        <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <?php
                                        if ($type != "normal") {
                                        ?>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="">Select Process <span class="text-danger">*</span> </label>
                                                    <select name="process" id="" class="form-control select2">
                                                        <?php
                                                        if ($process) {
                                                            foreach ($process as $s) {
                                                        ?>
                                                                <option value="<?php echo $s->name; ?>"><?php echo $s->name; ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Enter Qty <span class="text-danger">*</span> </label>
                                                <input type="number" step="any" name="qty" placeholder="Enter QTY " required class="form-control">
                                                <input type="hidden" name="po_number" value="<?php echo $new_po[0]->po_number ?>" required class="form-control">
                                                <input type="hidden" name="po_id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                <input type="hidden" name="supplier_id" value="<?php echo $supplier[0]->id ?>" placeholder=" " required class="form-control">
                                                <input type="hidden" name="type" value="<?php echo $type; ?>" placeholder="" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <?php
                                                if ($new_po[0]->status == "pending") {
                                                    if ($expired == "yes") {

                                                ?>
                                                        <button type="submit" class="btn btn-info btn mt-4">Add Child Part</button>
                                                <?php
                                                    } else {
                                                        echo "PO expired";
                                                    }
                                                } ?>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                <?php } else {
                                    echo "Po  Expired!!";
                                } ?>

                            </div>
                            <div class="card-header">
                                <?php if ($po_parts) {
                                    if ($new_po[0]->status == "pending") {

                                        if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') {
                                ?>
                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#lock">
                                                Lock PO
                                            </button>
                                <?php }
                                    }
                                } ?>
                                <?php if ($new_po[0]->status == "lock") {
                                    if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') {
                                ?>
                                        <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#accept">
                                            Accept (Released) PO
                                        </button>
                                        <!-- <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete">
                                            Reject (delete) PO
                                        </button> -->
                                    <?php
                                    }
                                } else {
                                    if ($new_po[0]->status != "pending") {
                                    ?>

                                        <button type="button" disabled class="btn btn-success ml-1" data-toggle="modal" data-target="#accept">
                                            PO Already Released
                                        </button>

                                        <a href="<?php echo base_url('download_my_pdf/') . $new_po[0]->id ?>" class="btn btn-primary" href="">Download</a>

                                <?php
                                    }
                                } ?>
                                <!-- Modal -->
                                <div class="modal fade" id="accept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="<?php echo base_url('accept_po'); ?>" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Released This
                                                                        PO?</b> </label>
                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                <input type="hidden" name="status" value="accept" required class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                           </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <form action="<?php echo base_url('accept_po'); ?>" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">

                                                                <label for=""><b>Are You Sure Want To Lock This PO?</b>
                                                                </label>
                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                <input type="hidden" name="status" value="lock" required class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <form action="<?php echo base_url('delete_po'); ?>" method="POST">

                                                        <div class="col-lg-12">
                                                            <div class="form-group">

                                                                <label for=""><b>Are You Sure Want To Delete This
                                                                        PO?</b> </label>
                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                <input type="hidden" name="status" value="reject" required class="form-control">
                                                                <input type="hidden" name="table_name" value="new_po" required class="form-control">


                                                            </div>


                                                        </div>


                                                </div>






                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>GST Strucutre Code</th>
                                            <th>UOM</th>
                                            <th>QTY</th>
                                            <?php
                                            if ($type != "normal") {
                                            ?>
                                                <th>Process</th>
                                            <?php } ?>
                                            <th>Price</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                            <th>Sub Total</th>
                                            <th>GST</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($po_parts) {
                                            $final_po_amount = 0;
                                            $i = 1;
                                            foreach ($po_parts as $p) {
                                                $data = array(
                                                    'supplier_id' => $supplier[0]->id,
                                                    "child_part_id" => $p->part_id,
                                                );
                                                $child_part_data = $this->Crud->get_data_by_id_multiple_condition("child_part_master", $data);
                                                pr($child_part_data,1);
                                                $part_rate_new = 0;
                                                if (empty($p->rate)) {
                                                    $part_rate_new = $child_part_data[0]->part_rate;
                                                } else {
                                                    $part_rate_new = $p->rate;
                                                }

                                                $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
                                                $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");
                                                $total_rate_old = $part_rate_new * $p->qty;
                                                $gst_structure = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
                                                $cgst_amount = ($total_rate_old * $gst_structure[0]->cgst) / 100;
                                                $sgst_amount = ($total_rate_old * $gst_structure[0]->sgst) / 100;
                                                $igst_amount = ($total_rate_old * $gst_structure[0]->igst) / 100;
                                                $gst_amount = $cgst_amount + $sgst_amount + $igst_amount;
                                                $total_rate = $total_rate_old + $cgst_amount + $sgst_amount + $igst_amount;
                                                $final_po_amount = $final_po_amount + $total_rate;


                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $child_part_data[0]->part_number; ?></td>
                                                    <td><?php echo $child_part_data[0]->part_description; ?></td>
                                                    <td><?php echo $gst_structure[0]->code; ?></td>
                                                    <td><?php echo $uom_data[0]->uom_name; ?></td>

                                                    <td><?php echo $p->qty; ?></td>
                                                    <?php
                                                    if ($type != "normal") {
                                                    ?>
                                                        <td><?php echo $p->process; ?></td>

                                                    <?php } ?>
                                                    <td><?php echo $part_rate_new; ?></td>
                                                    <td><?php echo $p->created_date; ?></td>

                                                    <td>
                                                        <?php
                                                        if ($new_po[0]->status == "pending") {
                                                        ?>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                                Edit
                                                            </button>

                                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelete<?php echo $i; ?>">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo base_url('update_po_parts'); ?>" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for="">Enter Qty <span class="text-danger">*</span>
                                                                                            </label>
                                                                                            <input type="number" name="qty" value="<?php echo $p->qty ?>" placeholder="Enter QTY " required class="form-control">
                                                                                            <input type="hidden" name="part_number" value="<?php echo $child_part_data[0]->part_number; ?>" placeholder="Enter part_number " required class="form-control">
                                                                                            <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModaldelete<?php echo $i; ?>" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo base_url('delete'); ?>" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""> <b>Are You Sure Want To
                                                                                                    Delete This ? </b> </label>
                                                                                            <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">
                                                                                           <input type="hidden" name="table_name" value="po_parts" required class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <?php } else {
                                                            if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') {
                                                                if ($statusNew) {

                                                            ?>
                                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal123123123<?php echo $i; ?>">
                                                                        PO Amendment
                                                                    </button>

                                                                    <div class="modal fade" id="exampleModal123123123<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">PO
                                                                                        Amendment</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <div class="row">

                                                                                        <div class="col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <?php
                                                                                                ?>
                                                                                                    <form action="<?php echo base_url('update_po_parts_amendment'); ?>" method="POST">

                                                                                                        <label for="">Enter Qty <span class="text-danger">*</span>
                                                                                                        </label>
                                                                                                        <input type="number" name="qty" value="<?php echo $p->new_po_qty ?>" placeholder="Enter QTY " required class="form-control">
                                                                                                        <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Update</button>

                                                                                </div>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                    if ($p->po_approved_updated == "pending") {
                                                                    ?>
                                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalapproved<?php echo $i; ?>">
                                                                            Approve Amendment
                                                                        </button>

                                                                        <div class="modal fade" id="exampleModalapproved<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">PO
                                                                                            Amendment Approval </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <div class="row">

                                                                                            <div class="col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <form action="<?php echo base_url('update_po_parts_amendment_approve'); ?>" method="POST">

                                                                                                        <label for="">Are You Sure Want To
                                                                                                            Approve this Amendment ? <span class="text-danger">*</span>
                                                                                                        </label>
                                                                                                        <input type="number" name="qty" value="<?php echo $p->new_po_qty ?>" placeholder="Enter QTY " required class="form-control">
                                                                                                        <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">
                                                                                                        <input type="hidden" name="new_po_id" value="<?php echo $new_po[0]->id; ?>" required class="form-control">


                                                                                                </div>
                                                                                                <div class="form-group">

                                                                                                    <label for="">Enter PO Amendment Number
                                                                                                        <span class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <input type="text" name="po_a_number" placeholder="Enter Po Amendment Number " required class="form-control">


                                                                                                </div>
                                                                                                <div class="form-group">

                                                                                                    <label for="">Privious Qty <span class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <input type="number" name="qty" readonly value="<?php echo $p->qty ?>" placeholder="Enter QTY " required class="form-control">


                                                                                                </div>
                                                                                                <div class="form-group">

                                                                                                    <label for="">New Qty <span class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <input type="number" name="new_qty" readonly value="<?php echo $p->new_po_qty ?>" placeholder="Enter QTY " required class="form-control">
                                                                                                    <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">


                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                  </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Update</button>

                                                                                    </div>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    if ($p->po_a_number != "") {
                                                                        echo "<br>";
                                                                        echo "Amendment No :" . $p->po_a_number;
                                                                        echo "<br>";
                                                                        echo "Amendment Date" . $p->date;
                                                                    }
                                                                    ?>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>


                                                    </td>
                                                    <td><?php echo $total_rate_old; ?></td>
                                                    <td><?php echo $gst_amount; ?></td>
                                                    <td><?php echo $total_rate; ?></td>

                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }

                                        ?>



                                    </tbody>

                                    <tfoot>
                                        <?php
                                        if ($po_parts) {
                                        ?>
                                            <tr>
                                                <th colspan="11">Total</th>
                                                <th><?php echo $final_po_amount; ?></th>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tfoot>
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
</div>
<!-- /.content-wrapper -->