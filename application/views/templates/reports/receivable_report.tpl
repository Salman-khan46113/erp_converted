<div class="wrapper" style="width:2500px">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Receivable Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Receivable Reports</li>
                        </ol>
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
                                    <div class="col-lg-2">
                                        <form action="<%$base_url%>receivable_report" method="post">
                                        <div class="form-group">
                                            <label for="">Select Customer  <span class="text-danger">*</span></label>
                                            <select name="customer_part_id" id="" class="form-control select2" required>
                                                <option value="">Select Customer</option>
                                                                <%if $customers%>
                                                                    <%foreach from=$customers item=c%>
                                                                    <option value="<%$c->id%>"
                                                                        <%if $selected_customer_part_id === $c->id%>selected<%/if%>
                                                                    ><%$c->customer_name%></option>
                                                                    <%/foreach%>
                                                                <%/if%>
                                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-primary mt-4" value="Search">
                                     </form>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->
                            </div>
                            <!-- Modal -->

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Customer Name</th>
                                            <th>Sales Inv No</th>
                                            <th>Sales Inv Date</th>
                                            <th>Basic Amount Total</th>
                                            <th>GST Total Amount</th>
                                            <th>Total Amount With GST</th>
                                            <th>Payment Terms in Days</th>
                                            <th>Due Date</th>
                                            <th>Due Days</th>
                                            <th>Payment Receipt Date</th>
                                            <th>Amount Received</th>
                                            <th>Transaction Details</th>
                                            <th>Balance Amount to Receive</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <%if $sales_parts%>
                                            <%foreach from=$sales_parts item=po name=report%>
                                               
                                                <%assign var="subtotal" value=round($po->ttlrt - $po->gstamnt,2)%>
                                                <%assign var="row_total" value=round($po->ttlrt,2) + round($po->tcsamnt,2)%>
                                                <tr>
                                                    <td><%$smarty.foreach.report.iteration%></td>
                                                    <td><%$po->customer_name%></td>
                                                    <td><%$po->sales_number%></td>
                                                    <td><%$po->created_date%></td>
                                                    <td><%$subtotal%></td>
                                                    <td><%number_format($po->gst, 2)%></td>
                                                    <td><%number_format($row_total, 2)%></td>
                                                    <td><%$po->payment_terms%></td>
                                                    <td>
                                                        <%$po->due_date%>
                                                    </td>
                                                  
                                                    <%if $po->due_days <= 0 && !$po->payment_receipt_date%>
                                                        <td style="background-color: red;"><%$po->due_days%></td>
                                                    <%else%>
                                                        <td><%$po->due_days%></td>
                                                    <%/if%>
                                                    <td><%if $po->payment_receipt_date%><%$po->payment_receipt_date|date_format:"%d/%m/%Y"%><%/if%></td>
                                                    <td><%$po->amount_received%></td>
                                                    <td><%$po->transaction_details%></td>
                                                    <td>
                                                        <%assign var="bal_amnt" value=$row_total - $po->amount_received%>
                                                        <%number_format($bal_amnt, 2)%>
                                                    </td>
                                                    <td>
                                                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary"
                                                            data-target="#exampleModal2<%$smarty.foreach.report.iteration%>"> <i class="fas fa-edit"></i></button>

                                                        <div class="modal fade" id="exampleModal2<%$smarty.foreach.report.iteration%>" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form action="<%$base_url%>update_receivable_report" method="POST">
                                                                            <input type="hidden" name="sales_number" required value="<%$po->sales_number%>">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="payment_receipt_date">Payment Receipt Date</label><span
                                                                                            class="text-danger">*</span>
                                                                                        <input type="date" name="payment_receipt_date" required
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Payment Receipt Date" value="<%$po->payment_receipt_date%>">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="amount_received">Amount Received</label><span
                                                                                            class="text-danger">*</span>
                                                                                        <input type="text"
                                                                                            name="amount_received" required
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Amount Received" value="<%$po->amount_received%>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="transaction_details">Trans. Details</label><span
                                                                                            class="text-danger"></span>
                                                                                        <input type="text"
                                                                                            name="transaction_details"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Transaction Details" value="<%$po->transaction_details%>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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
