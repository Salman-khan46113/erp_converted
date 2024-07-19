<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mold Life Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<%$base_url%>dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Mold Life Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
        <div>
            <div class="row">
                <br>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<%$base_url%>view_mold_by_filter_report" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div style="width: 400px;">
                                            <div class="form-group">
                                                <label for="on click url">Select Part Number <span class="text-danger">*</span></label> <br>
                                                <select name="child_part_id" class="form-control select2" id="">
                                                    <option <%if $filter_child_part_id eq "All"%>selected<%/if%> value="All">All</option>
                                                    <%foreach $mold_maintenance as $u%>
                                                        <option <%if $filter_child_part_id eq $u['customer_part_id']%>selected<%/if%> value="<%$u['customer_part_id']%>"><%$u['customer_name']%>/<%$u['part_number']%>/<%$u['part_description']%></option>
                                                    <%/foreach%>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">&nbsp;</label> <br>
                                        <button class="btn btn-secondary">Search </button>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Customer Part</th>
                                        <th>Mold Name</th>
                                        <th>No Of Cavity</th>
                                        <th>Mold Life Over Frequency</th>
                                        <th>Mold PM Frequency</th>
                                        <th>Molding Prod QTY</th>    
                                        <th style="width:100px">Last PM Date</th>    
                                        <th>PM Report</th>
                                        <th>Mold History</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <%if $mold_maintenance%>
                                        <%assign var="i" value=1%>
                                        <%foreach $mold_maintenance as $u%>
                                            <%if isset($filter_child_part_id) && $filter_child_part_id neq "All" && $filter_child_part_id neq $u['customer_part_id']%>
                                                <%continue%>
                                            <%/if%>
                                           
                                            <tr>
                                                <td><%$i%></td>
                                                <td><%$u['customer_name']%>/<%$u['part_number']%>/<%$u['part_description']%></td>
                                                <td><%$u['mold_name']%></td>
                                                <td><%$u['no_of_cavity']%></td>
                                                <td><%$u['target_over_life']%></td>
                                                <td><%$u['target_life']%></td>
                                                <%if $u['tot'] gt $u['target_life']%>
                                                    <td style="background-color:red;color:white"><%$u['tot']%></td>
                                                <%else%>
                                                    <td><%$u['tot']%></td>
                                                <%/if%>
                                                <td><%$mold_maintenance_docs[$u['mold_name']][0]->pm_date%></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uplddoc<%$i%>">
                                                      <i class="fas fa-upload" aria-hidden="true"></i>
                                                    </button>
                    
                                                    <%if !empty($mold_maintenance_docs[$u['mold_name']][0]->doc)%>
                                                        <a title="Download" class="btn btn-xs btn-success" download href="<%$base_url%>documents/<%$mold_maintenance_docs[$u['mold_name']][0]->doc%>"><i class="fas fa-download" aria-hidden="true"></i> </a>
                                                    <%/if%>
                  
                                                    <div class="modal fade" id="uplddoc<%$i%>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            <form  id="form111" action="<%$base_url%>upload_mold_maintenance_doc" method="POST" id="form111" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="on click url">PM Date<span class="text-danger">*</span></label>
                                                                        <br>
                                                                        <input required type="date" name="pm_date" class="form-control" max="<%$smarty.now|date_format:'%Y-%m-%d'%>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="on click url">Document<span class="text-danger">*</span></label>
                                                                        <br>
                                                                        <input required type="file" name="doc" class="form-control" value="" id="fileInput111" onchange="checkFileSize(111)">
                                                                        <input type="hidden" name="no_of_cavity" value="<%$u['no_of_cavity']%>" class="form-control">
                                                                        <input type="hidden" name="mold_name" value="<%$u['mold_name']%>" class="form-control">
                                                                        <input type="hidden" name="customer_part_id" value="<%$u['customer_part_id']%>" class="form-control">
                                                                        <input type="hidden" name="target_life" value="<%$u['target_life']%>" class="form-control">         
                                                                        <input type="hidden" name="target_over_life" value="<%$u['target_over_life']%>" class="form-control">
                                                                        <input type="hidden" name="current_molding_prod_qty" value="<%$u['tot']%>" class="form-control">
                                                                        <input required type="hidden" value="<%$u['id']%>" name="id" placeholder="Enter Mold Life Over Frequency" class="form-control">
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
                                                    <%if !empty($mold_maintenance_docs[$u['mold_name']][0]->doc)%>
                                                    <a href="<%$base_url%>mold_maintenance_history/<%$u['mold_name']|replace:' ':'_'%>/<%$u['customer_part_id']                                                                                                                                                                                                                                                                         %>" class="btn btn-primary" href=""><i class="fa fa-history" aria-hidden="true"></i></a>
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