<div  class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                       <%assign var ='expired' value="no"%>
                        <%if empty($new_po[0]->process_id)%>
                            <%assign var = 'type' value="normal"%>
                        <%else%> 
                            <%assign var = 'type' value="Subcon grn"%>
                        <%/if%>
                        <a  class="btn btn-danger" href="<%$base_url%>customer_po_tracking_all">
                            < Back</a>
                    </div>
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>generate_po">Home </a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol> -->
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
                                             <label for="">Customer Name <span class="text-danger"></span></label>
                                            <br><span class="text-info"><label><%$customer[0]->customer_name%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Number<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->po_number%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Start Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->po_start_date%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO End Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->po_end_date%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">PO Amendment No</span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->po_amedment_number%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->status%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Created Date <span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->created_date%></label></span>
                                        </div>
                                    </div>
                                    <%if $customer_po_tracking[0]->status == 'closed'%>
                                     <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Remark<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->remark%></label></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Reason<span class="text-danger"></span> </label>
                                            <br><span class="text-info"><label><%$customer_po_tracking[0]->reason%></label></span>
                                        </div>
                                    </div>
                                    <%/if%>
                                    
                                    <!--<div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Expiry Date <span class="text-danger">*</span> </label>
                                                    <input type="text" readonly value="<%$new_po[0]->expiry_po_date%>" class="form-control">
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                            <div class="card-header">
                                <%if true || $new_po[0]->expiry_po_date <= date('Y-m-d') || true%>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <form action="<%$base_url%>add_parts_customer_trackings" method="post">
                                                    <label for="">Select Part Number // Description <span class="text-danger">*</span> </label>
                                                    <select name="part_id" id="" required class="form-control select2">
                                                        <%if $customer_part_data%>
                                                            <%foreach from=$customer_part_data item=c%>
                                                                <option value="<%$c->id%>">
                                                                    <%$c->part_number%> // <%$c->part_description%>
                                                                </option>
                                                            <%/foreach%>
                                                        <%/if%>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Enter Qty <span class="text-danger">*</span> </label>
                                                <input type="number" step="any" name="qty" placeholder="Enter QTY " required class="form-control">
                                                <input type="hidden" name="customer_po_tracking_id" value="<%$customer_po_tracking[0]->id%>" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-lg mt-4">Add Part to Tracking
                                                </button>
                                            </div>
                                        </div>
                                       </form>
                                    </div>
                                <%else%>
                                    Po  Expired!!
                                <%/if%>
                            </div>
                            <div class="card-header">
                                <%if $po_parts%>
                                    <%if $new_po[0]->status == "pending"%>
                                        <%if $smarty.session.type == 'admin' || $smarty.session.type == 'Admin'%>
                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#lock">
                                                Lock PO
                                            </button>
                                        <%/if%>
                                    <%/if%>
                                <%/if%>
                                <%if $new_po[0]->status == "lock"%>
                                    <%if $smarty.session.type == 'admin' || $smarty.session.type == 'Admin'%>
                                        <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                            Accept (Released) PO
                                        </button>
                                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete">
                                            Reject (delete) PO
                                        </button>
                                    <%/if%>
                                <%else%>
                                    <%if $new_po[0]->status != "pending"%>
                                        <button type="button" disabled class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                            PO Already Released
                                        </button>
                                        <a href="<%$base_url%>download_my_pdf/<%$new_po[0]->id%>" class="btn btn-primary" href="">Download</a>
                                    <%/if%>
                                <%/if%>
                                <!-- Modal -->
                                <div class="modal fade" id="accpet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="<%$base_url%>accept_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Released This PO?</b> </label>
                                                                <input type="hidden" name="id" value="<%$new_po[0]->id%>" required class="form-control">
                                                                <input type="hidden" name="status" value="accpet" required class="form-control">
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
                                                    <form action="<%$base_url%>accept_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Lock This PO?</b></label>
                                                                <input type="hidden" name="id" value="<%$new_po[0]->id%>" required class="form-control">
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
                                                    <form action="<%$base_url%>delete_po" method="POST">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for=""><b>Are You Sure Want To Delete This PO?</b> </label>
                                                                <input type="hidden" name="id" value="<%$new_po[0]->id%>" required class="form-control">
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
                                            <th>Part Price</th>
                                            <th>QTY</th>
                                            <th>Cumulative Sales Qty</th>
                                            <th>Balance QTY</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%if $parts_customer_trackings%>
                                            <%assign var="final_po_amount" value=0%>
                                            <%assign var="i" value=1%>
                                            <%foreach from=$parts_customer_trackings item=p%>
                                               
                                                <%assign var="start_date" value=$new_po[0]->po_start_date|date_format:"%d-%m-%Y"%>
                                                <%assign var="end_date" value=$new_po[0]->po_end_date|date_format:"%d-%m-%Y"%>

                                                <%if $sales_qty_data%>
                                                    <%if $sales_qty_data[$p->part_id][0]->MAINSUM gt 0%>
                                                        <%assign var='sales_qty' value="<%$sales_qty_data[$p->part_id][0]->MAINSUM%>"%>
                                                        <%else%>
                                                        <%assign var='sales_qty' value="0"%>
                                                    <%/if%>
                                                    <%assign var="balance_qty" value=$p->qty - $sales_qty%>
                                                <%/if%>
                                                
                                                <tr>
                                                    
                                                    <td><%$i%></td>
                                                    <td><%$child_part_data[$p->part_id][0]->part_number%></td>
                                                    <td><%$child_part_data[$p->part_id][0]->part_description%></td>
                                                    <td><%$child_part_rate[$child_part_data[$p->part_id][0]->id][0]->rate%></td>
                                                    <td><%$p->qty%></td>
                                                    <td><%$sales_qty%></td>
                                                    <td><%$balance_qty%></td>
                                                    <td>
                                                        <%if $new_po[0]->status == "pending"%>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<%$i%>">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelete<%$i%>">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<%$i%>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <form action="<%$base_url%>update_parts_customer_trackings" method="POST">
                                                                                        <label for="">Enter Qty <span class="text-danger">*</span></label>
                                                                                        <input type="number" name="qty" value="<%$p->qty%>" placeholder="Enter QTY " required class="form-control">
                                                                                        <input type="hidden" name="id" value="<%$p->id%>" required class="form-control">
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
                                                            <div class="modal fade" id="exampleModaldelete<%$i%>" tabindex="-1" aria-labelledby="" aria-hidden="true">
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
                                                                                <form action="<%$base_url%>delete" method="POST">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for=""> <b>Are You Sure Want To Delete This ? </b> </label>
                                                                                            <input type="hidden" name="id" value="<%$p->id%>" required class="form-control">
                                                                                            <input type="hidden" name="table_name" value="parts_customer_trackings" required class="form-control">
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
                                                        <%/if%>
                                                    </td>
                                                </tr>
                                                <%assign var="i" value=$i+1%>
                                            <%/foreach%>
                                        <%/if%>
                                    </tbody>
                                    <tfoot>
                                        <%if $po_parts%>
                                            <tr>
                                                <th colspan="11">Total</th>
                                                <th><%$final_po_amount%></th>
                                            </tr>
                                        <%/if%>
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
   
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->