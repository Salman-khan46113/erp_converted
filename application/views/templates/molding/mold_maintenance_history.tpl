<div style="" class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a style="marign-right:" class="btn btn-danger" href="<%base_url('mold_maintenance_report')%>">< Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home </a></li>
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
                                        <label for="">Customer Part<span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$customer_part_data[0]->part_number%><%$customer_part_data[0]->part_description%>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Customer Name<span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$customer_data[0]->customer_name%>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Mold Name <span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$mld_data[0]->mold_name%>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Cavities <span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$mld_data[0]->no_of_cavity%>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Life Over Frequency<span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$mld_data[0]->target_life%>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Total Molding Prod QTY <span class="text-danger">*</span> </label>
                                        <input type="text" readonly value="<%$mld_data[0]->target_over_life%>" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Mold PM Frequency</th>
                                        <th>Molding Prod QTY</th>
                                        <th>Last PM Date</th>
                                        <th>Doc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <%if $mold_maintenance_history%>
                                        <%assign var=final_po_amount value=0%>
                                        <%assign var=i value=1%>
                                        <%assign var=totalQuantity value=0%>
                                        <%foreach from=$mold_maintenance_history item=p%>
                                           
                                            <%assign var=totalQuantity value=0%>
                                            <%foreach from=$molding_production_quantity_data item=molding_data%>
                                                <%assign var=totalQuantity value=$totalQuantity+$molding_data->qty%>
                                            <%/foreach%>
                                            
                                            <%if !empty($p->doc)%>
                                                <tr>
                                                    <td><%$i%></td>
                                                    <td><%$p->target_life%></td>
                                                    <td><%$p->current_molding_prod_qty%></td>
                                                    <td><%$p->pm_date%></td>
                                                    <td>
                                                        <%if !empty($p->doc)%>
                                                            <a title="Download" class="btn btn-xs btn-success" download href="<%base_url('documents/')%><%$p->doc%>"><i class="fas fa-download" aria-hidden="true"></i> </a>
                                                        <%/if%>
                                                    </td>
                                                </tr>
                                            <%/if%>
                                            <%assign var=i value=$i+1%>
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
                </div>
            </div>
        </div>
    </section>
</div>
</div>