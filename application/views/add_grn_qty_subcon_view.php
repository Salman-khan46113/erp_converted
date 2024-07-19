<div style="width:1200px" class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
	
    <?php
    $arr = array(
        'inwarding_id' => $inwarding_data[0]->id,
        'invoice_number' => $inwarding_data[0]->invoice_number,
    );

    $invoice_amount = $inwarding_data[0]->invoice_amount;
    $grn_details_data_main = $this->Crud->get_data_by_id_multiple("grn_details", $arr);
	
	// For this grn_details get current part number and check for 
	// that quantity if it is equals to and inward added true then go for it - to not to show chllan button
	
	// echo count($grn_details_data_main);
    // print_r($grn_details_data_main);
    $actual_price = 0;
    foreach ($grn_details_data_main as $g) {
        $actual_price = $actual_price + $g->inwarding_price;
    }

    // $cgst_amount = ($actual_price*$gst_structure[0]->cgst)/100;
    // $sgst_amount = ($actual_price*$gst_structure[0]->sgst)/100;
    // $igst_amount = ($actual_price*$gst_structure[0]->igst)/100;

    // $actual_price = $actual_price + $cgst_amount +$sgst_amount+$igst_amount;
    $minus_price = $actual_price - 1;
    $plus_price = $actual_price + 1;

    if ($actual_price != 0) {
        if ($invoice_amount >= $minus_price) {
            if ($invoice_amount <= $plus_price) {
                $status = "verifed";
            } else {
                $status = "not-verifed";
            }
        } else {
            $status = "not-verifed";
        }
    } else {
        $status = "not-verifed";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <h1>Subcon View</h1>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('generate_po') ?>">Home</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>-->
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
                                    <!-- <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">GRN Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php
                                                                                if ($status == "verifed") {
                                                                                    echo $inwarding_data[0]->grn_number;
                                                                                } else {
                                                                                    echo "";
                                                                                }
                                                                                ?>" class="form-control">
										</div> 
                                    </div> -->
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Number</label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_number ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Date </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_date ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Status </label>
                                            <input type="text" readonly value="<?php if ($new_po[0]->status == "accpet") {
                                                                                    echo "Released";
                                                                                } else {
                                                                                    echo $new_po[0]->status;
                                                                                } ?>" class="form-control">
                                        </div>
								    </div>
									<div class="col-lg-2">
											<div class="form-group">
												<label for="">Supplier Name </label>
												<input type="text" readonly value="<?php echo $supplier[0]->supplier_name ?>" class="form-control">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="">Supplier Number </label>
												<input type="text" readonly value="<?php echo $supplier[0]->supplier_number ?>" class="form-control">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="">Supplier GST </label>
												<input type="text" readonly value="<?php echo $supplier[0]->gst_number ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
								    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Software Calculated Amount </label>
                                            <input type="text" readonly value="<?php echo $actual_price; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Invoice Amount Validation Status </label>
                                            <input type="text" readonly value="<?php echo $status; ?>" class="form-control">
                                        </div>
                                    </div>
									<div class="col-lg-2">
                                        <div class="form-group">
                                            <?php
                                            if ($status == "not-verifed") {
                                            ?>
                                                <?php
                                            }
                                            if ($inwarding_data[0]->status == "accepted") {

                                                echo "<button class='btn btn-primary mt-4' disabled>Inwarding Already Accepted</button>";
                                            } else if ($status == "verifed") {


                                                if ($inwarding_data[0]->status == "pending" || $inwarding_data[0]->status == "") {
                                                ?>

                                                    <!-- <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#exampleModalgenerate">
                                                        Generate GRN </button> -->
                                                <?php
                                                } else if ($inwarding_data[0]->status == "generate_grn") {
                                                ?>
                                                    <!-- <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">
                                                                                Receipt Quantity Inwarding </button> -->
                                            <?php
                                                }
                                            }
                                            ?>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Billing Data </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            if ($challan) {
                                                            ?>
                                                                <form action="<?php echo base_url('accept_inwarding_data') ?>" method="POST">

                                                                <?php
                                                            } else {
                                                                ?>
                                                                    <form action="<?php echo base_url('accept_inwarding_data') ?>" method="POST">

                                                                    <?php
                                                                }
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label> Are You Sure Want To Accept This Inwarding ? This Data can't be changed once it's Submit</label><span class="text-danger">*</span>
                                                                                <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">
                                                                                <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>" class="form-control">
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
                                            </div>
                                            <div class="modal fade" id="exampleModalgenerate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Change Status </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url('update_status_grn_inwarding') ?>" method="POST">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label> Are You Sure Want To Generate GRN ? </label>
                                                                            <input type="hidden" name="status" placeholder="" value="generate_grn" class="form-control">
                                                                            <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">

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
                                            </div>
                                        </div>
                                   </div>
                                </div>
								<div class="col-lg-2">
									<div class="form-group">
                                      <a class="btn btn-dark" href="<?php echo base_url('inwarding_details/') . $this->uri->segment('4')."/". $this->uri->segment('3'); ?>">
                                             < Back</a>
									</div>
								</div>
                            </div>
							<div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>UOM</th>
                                            <th>PO QTY</th>
                                            <th>Balance QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$inwardCompleted = false;
                                        if ($po_parts) {
                                            $final_po_amount = 0;
                                            $i = 1;
                                            foreach ($po_parts as $p) {
                                                $child_part_data = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "child_part_id");
                                                $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
                                                $routing = $this->Crud->get_data_by_id("routing", $p->part_id, "part_id");
                                                $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");

                                                $total_rate = $child_part_data[0]->part_rate * $p->qty;
                                                $final_po_amount = $final_po_amount + $total_rate;

                                                $arr = array(
                                                    'inwarding_id' => $inwarding_id,
                                                    'part_id' => $p->part_id,
                                                    'po_number' => $new_po_id,
                                                    'invoice_number' => $inwarding_data[0]->invoice_number,
                                                );
                                                $grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);
                                                if ($grn_details_data) {
                                                    $data_present = "yes";
                                                } else {
                                                    $data_present = "no";
                                                }
                                               
                                        ?>

                                                <tr>
                                                    <td><?php echo $child_part_data[0]->part_number; ?></td>
                                                    <td><?php echo $child_part_data[0]->part_description; ?></td>
                                                    <td><?php echo $uom_data[0]->uom_name; ?></td>
                                                    <td><?php echo $p->qty; ?></td>
                                                    <td><?php echo $p->pending_qty; ?></td>
                                                 </tr>
												 <tr>
                                                      <table class="table table-bordered table-striped" id="example1">
                                                            <tr>
                                                                <th>Name / Description</th>
                                                                <th>Inwarding Qty</th>
                                                                <th>Required Qty</th>
                                                                <th>Received Qty</th>
                                                                <th>Select Challan / Available Qty / Date</th>
                                                                <th>Submit</th>
                                                                <th>History</th>
                                                            </tr>

                                                            <?php
                                                            $ro = 1;
                                                            $completed = 0;
															
                                                            if ($subcon_po_inwarding_master) {
                                                                $subcon_po_inwarding_parts = $this->Crud->get_data_by_id("subcon_po_inwarding_parts", $subcon_po_inwarding_master[0]->id, "subcon_po_inwarding_id");
                                                                echo "<br>";
                                                               echo "<b><u>Input / Challan Part Details</u></b>";
                                                                echo "<br>";
                                                                foreach ($subcon_po_inwarding_parts as $r) {
                                                                    $child_part_new_new = $this->Crud->get_data_by_id("child_part", $r->input_part_id, "id");
                                                                    if ($child_part_new_new) {
                                                                        // $subcon_po_inwarding_parts = $this->Crud->get_data_by_id("challan_parts", $subcon_po_inwarding_master[0]->id, "subcon_po_inwarding_id");
                                                                        $challan_parts_array = array(
                                                                            'part_id' => $child_part_new_new[0]->id,
                                                                            'qty' => 1,

                                                                        );
                                                                        $role_management_data2 = $this->db->query('SELECT * FROM `challan_parts` WHERE part_id = ' . $child_part_new_new[0]->id . ' AND remaning_qty > 0 ');
                                                                        $challan_parts_data = $role_management_data2->result();
                                                                     ?>
                                                                        <tr>
                                                                            <form method="post" action="<?php echo base_url('add_challan_parts_history'); ?>">
                                                                                <td><?php echo $child_part_new_new[0]->part_number . " / " . $child_part_new_new[0]->part_description; ?></td>
                                                                                <td><?php echo $r->inwarding_qty; ?></td>
                                                                                <td><?php echo $r->input_part_req_qty; ?>
                                                                                    <input type="hidden" name="required_qty" value="<?php echo $qty * $r->qty; ?>">
                                                                                </td>
                                                                                <td><?php echo $r->recevied_req_qty; ?></td>
                                                                                <?php 
                                                                                    if ($r->recevied_req_qty == $r->input_part_req_qty) {
                                                                                        $completed++;
                                                                                        $inwardCompleted = true;
                                                                                        $disabled = true; 
                                                                                } ?>

                                                                                <td>
                                                                                    <select name="challan_id" style="width:400px" class="select2 form-control" 
                                                                                        <?php if($inwardCompleted == true) echo "disabled"; ?> >
                                                                                        <option value="0">NA</option>
                                                                                        <?php
                                                                                        if ($challan_parts_data) {
                                                                                            foreach ($challan_parts_data as $ch_parts) {
                                                                                                $challan_data = $this->Crud->get_data_by_id("challan", $ch_parts->challan_id, "id");
                                                                                                $arr = array(
                                                                                                    'id' => $ch_parts->challan_id,
                                                                                                    'supplier_id' => $p->supplier_id,

                                                                                                );

                                                                                                $invoice_amount = $inwarding_data[0]->invoice_amount;
                                                                                                $challan_check = $this->Crud->get_data_by_id_multiple("challan", $arr);

                                                                                                if ($challan_data) {
                                                                                                    if($challan_data[0]->supplier_id == $supplier[0]->id)
                                                                                                    {
                                                                                                    if($challan_data[0]->status == "completed")
                                                                                                    {
                                                                                                    foreach ($challan_data as $c_d) {
                                                                                        ?>
                                                                                                        <option value="<?php echo $c_d->id ?>"><?php echo $c_d->challan_number . " / " . $ch_parts->remaning_qty." / ".$ch_parts->created_date; ?></option>

                                                                                        <?php
                                                                                                    }
                                                                                                }
                                                                                                }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>

                                                                                    <input type="hidden" name="part_id" value="<?php echo $child_part_new_new[0]->id; ?>">
                                                                                    <input type="hidden" name="subcon_po_inwarding_parts_id" value="<?php echo $r->id; ?>">
                                                                                    <input type="hidden" name="req_qty" value="<?php echo $r->input_part_req_qty ?>">
                                                                                    <input type="hidden" name="rec_qty" value="<?php echo $r->recevied_req_qty ?>">
                                                                                    <input type="hidden" name="grn_number" value="<?php echo $inwarding_data[0]->grn_number; ?>">
                                                                                    <input type="hidden" name="invoice_number" value="<?php echo $inwarding_data[0]->invoice_number ?>">
                                                                                    <input type="hidden" name="po_id" value="<?php echo $new_po[0]->id ; ?>">
                                                                                    <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">
                                                                                    <input type="hidden" name="new_po_id" value="<?php echo $new_po_id ?>" class="form-control">
                                                                                    <input type="hidden" name="child_part_id" value="<?php echo $p->part_id; ?>" class="form-control">
                                                                                    <input type="hidden" name="invoice_number" placeholder="invoice_number" value="<?php echo $inwarding_data[0]->invoice_number; ?>" class="form-control">

                                                                                    <?php if($inwardCompleted == true) {
                                                                                        echo "inwarding added";
                                                                                    } else { ?>
                                                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <th>
                                                                                    <a class="btn btn-danger" href="<?php echo base_url('subcon_po_inwarding_history/') . $r->id ?>">History</a>
                                                                                </th>
                                                                            </form>

                                                                        </tr>
                                                            <?php
                                                                        $ro++;
                                                                    } else {
                                                                        echo "Part Not Found";
                                                                    }
                                                                }
                                                            }
															?>
															<tr class="text-right">
																	<td colspan="7">
																		<!-- <form action="<?php echo base_url('') ?>"> -->
																		<form action="<?php echo base_url('grn_complete_challan_process') ?>" method="post">
																			<?php
																			// print_r($inwarding_data);
																			$part_rate_new = 0;
																			if (empty($po_parts[0]->rate)) {
																				$part_rate_new = $child_part_data[0]->part_rate;
																			} else {
																				$part_rate_new = $p->rate;
																			}
																			?>
																			<input type="hidden" required step="any" value="<?php echo $subcon_po_inwarding_master[0]->inwarding_qty ?>" placeholder="$po_parts[0]->qty;" name="qty" class="form-control">
																			<input type="hidden" name="inwarding_id" value="<?php echo $inwarding_data[0]->id ?>" placeholder="98771231236" class="form-control">
																			<input type="hidden"  name="new_po_id" value="<?php echo $new_po_id ?>" class="form-control">
																			<input type="hidden"  name="part_id" value="<?php echo $po_parts[0]->part_id ?>" class="form-control">
																			<input type="hidden"  name="invoice_number" value="<?php echo $inwarding_data[0]->invoice_number ?>" class="form-control">
																			<input type="hidden"  name="grn_number" value="<?php echo $inwarding_data[0]->grn_number ?>" class="form-control">
																			<input type="hidden"  name="po_part_id" value="<?php echo $po_parts[0]->id ?>" class="form-control">
																			<input type="hidden"  name="pending_qty" value="<?php echo $po_parts[0]->pending_qty ?>" class="form-control">
																			<input type="hidden"  name="part_rate" value="<?php echo $part_rate_new ?>" class="form-control">
																			<input type="hidden"  name="tax_id" value="<?php echo $po_parts[0]->tax_id ?>" class="form-control">
																			 <?php 
																				//Old Logic : changed per discussion with Raghunath.
                                                                              	if ($data_present =='no') { ?>
																				<button type="submit" class="btn btn-primary">
																						  Complete Challan Process
																				</button>
																				<?php } ?>
																		</form>
																	</td>
																</tr>
                                                        </table>
                                                    </tr>
                                                <?php
                                                ?>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
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