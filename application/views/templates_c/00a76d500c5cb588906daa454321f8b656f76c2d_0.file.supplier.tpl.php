<?php
/* Smarty version 4.3.2, created on 2024-06-19 14:35:04
  from '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/supplier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66729f4031f217_66793507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00a76d500c5cb588906daa454321f8b656f76c2d' => 
    array (
      0 => '/var/www/html/extra_work/erp_converted/application/views/templates/purchase/supplier.tpl',
      1 => 1718779297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66729f4031f217_66793507 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper" >
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
               <h1>Supplier List </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Supplier List</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <!-- /.card -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title"></h3>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary float-left" data-toggle="modal"
                        data-target="#exampleModal">
                     Add Supplier</button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                 <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <form action="<?php echo base_url('addSupplier');?>
"
                                          method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                             <label for="machine_name">Supplier Name</label><span
                                                class="text-danger">*</span>
                                             <input type="text" name="supplierName" required
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Name">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Supplier Code</label><span
                                                class="text-danger">*</span>
                                             <input type="text" name="supplierNumber" required
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Number">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Supplier Address</label><span
                                                class="text-danger">*</span>
                                             <input type="text" name="supplierlocation" required
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Location">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Supplier Mobile Number</label>
                                             <input type="number" name="supplierMnumber"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Mobile Number">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Supplier Pan</label>
                                             <input type="text" name="pan_card" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Enter Supplier pan card">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Upload NDA Document</label>
                                             <input type="file" name="nda_document"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Mobile Number">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Upload Registration
                                             Document</label>
                                             <input type="file" name="registration_document"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Mobile Number">
                                          </div>
                                          <div class="form-group">
                                             <label for="machine_name">Other Document 1</label>
                                             <input type="file" name="other_document_1"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Supplier Mobile Number">
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="machine_name">Supplier Email</label>
                                    <input type="email" name="supplierEmail"
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter Supplier Email">
                                    </div>
                                    <div class="form-group">
                                    <label>With in State </label><span
                                       class="text-danger">*</span>
                                    <select class="form-control select2" name="with_in_state"
                                       style="width: 100%;">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="customer_location">Add State</label><span
                                       class="text-danger">*</span>
                                    <input type="text" name="state" required
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Add State">
                                    </div>
                                    <div class="form-group">
                                    <label for="customer_location">Add GST Number</label><span
                                       class="text-danger">*</span>
                                    <input type="text" name="gst_no" required
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Add GST Number">
                                    </div>
                                    <div class="form-group">
                                    <label for="payment_terms">Payment Terms</label><span
                                       class="text-danger">*</span>
                                    <input type="number" step="any" min="0" name="paymentTerms" required
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Payment Terms">
                                    </div>
                                    <div class="form-group">
                                    <label for="machine_name">Other Document 2</label>
                                    <input type="file" name="other_document_2"
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter Supplier Mobile Number">
                                    </div>
                                    <div class="form-group">
                                    <label for="machine_name">Other Document 3</label>
                                    <input type="file" name="other_document_3"
                                       class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       placeholder="Enter Supplier Mobile Number">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                       data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save
                                    changes</button>
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Supplier Name</th>
                              <!--<th>Supplier Number</th>-->
                              <th>Supplier Address</th>
                              <!-- <th>Supplier Email</th>
                                 <th>Supplier Mobile Number</th> -->
                              <th>PAN</th>
                              <th>GST Number</th>
                              <th>State</th>
                              <th>Payment Terms</th>
                              <th>NDA Documents</th>
                              <th>Registration Documents</th>
                              <th>Other Document 1</th>
                              <th>Other Document 2</th>
                              <!-- <th>Other Document 3</th> -->
                              <th>Admin Approval</th>
                              <th>With In State</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        	<?php $_smarty_tpl->_assignInScope('i', 1);?>
                           	<?php if (count($_smarty_tpl->tpl_vars['supplier_list']->value) > 0) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_list']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
			                        <tr>
			                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->supplier_name;?>
</td>
			                              <!-- <td><?php echo '<?php'; ?>
 echo $s->supplier_number; <?php echo '?>'; ?>
</td> -->
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->location;?>
</td>
			                              <!-- <td><php echo $s->email; <?php echo '?>'; ?>
</td>
			                                 <td><php echo $s->mobile_no; <?php echo '?>'; ?>
</td> -->
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->pan_card;?>
</td>
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->gst_number;?>
</td>
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->state;?>
</td>
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->payment_terms;?>
</td>
			                              <td>
			                                 <?php if ((!empty($_smarty_tpl->tpl_vars['s']->value->nda_document))) {?>
			                                 <a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['s']->value->nda_documentm;?>
"
			                                    download>Download</a>
			                                 <?php }?>
			                              </td>
			                              <td>
			                                 <?php if ((!empty($_smarty_tpl->tpl_vars['s']->value->registration_document))) {?>
			                                 <a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['s']->value->registration_document;?>
"
			                                    download>Download</a>
			                                 <?php }?>
			                              </td>
			                              <td>
			                                 <?php if ((!empty($_smarty_tpl->tpl_vars['s']->value->other_document_1))) {?>
			                                 <a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['s']->value->other_document_1;?>
"
			                                    download>Download</a>
			                                 <?php }?>
			                              </td>
			                              <td>
			                                 <?php if ((!empty($_smarty_tpl->tpl_vars['s']->value->other_document_2))) {?>
			                                 <a href="<?php echo base_url('documents/');
echo $_smarty_tpl->tpl_vars['s']->value->other_document_2;?>
"
			                                    download>Download</a>
			                                 <?php }?>
			                              </td>
			                              <!-- <td>
			                                 <php
			                                         if (!empty($s->other_document_3)) {
			                                         <?php echo '?>'; ?>

			                                 <a href="<php echo base_url('documents/') . $s->other_document_3; <?php echo '?>'; ?>
"
			                                     download>Download</a>
			                                 <php
			                                         }
			                                         <?php echo '?>'; ?>

			                                 </td> -->
			                              <td>
			                                 <?php echo $_smarty_tpl->tpl_vars['s']->value->admin_approve;?>

			                              </td>
			                              <td><?php echo $_smarty_tpl->tpl_vars['s']->value->with_in_state;?>
</td>
			                              <td>
			                                 <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary"
			                                    data-target="#exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <i
			                                    class="fas fa-edit"></i></button>
			                                 <div class="modal fade" id="exampleModal2<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"
			                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			                                    aria-hidden="true">
			                                    <div class="modal-dialog modal-xl" role="document">
			                                       <div class="modal-content">
			                                          <div class="modal-header">
			                                             <h5 class="modal-title" id="exampleModalLabel">Update
			                                                Supplier Number
			                                             </h5>
			                                             <button type="button" class="close" data-dismiss="modal"
			                                                aria-label="Close">
			                                             <span aria-hidden="true">&times;</span>
			                                             </button>
			                                          </div>
			                                          <div class="modal-body">
			                                             <div class="row">
			                                                <div class="col-lg-6">
			                                                   <form
			                                                      action="<?php echo base_url('updateSupplier');?>
"
			                                                      method="POST" enctype="multipart/form-data">
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Supplier
			                                                         Name</label><span
			                                                            class="text-danger">*</span>
			                                                         <input value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
"
			                                                            name="id" type="hidden" required
			                                                            class="form-control" id="updateName"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Name">
			                                                         <input
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->supplier_name;?>
"
			                                                            readonly name="updateName"
			                                                            type="text" required
			                                                            class="form-control" id="updateName"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Name">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Approve
			                                                         Supplier</label><span
			                                                            class="text-danger">*</span>
			                                                         <select name="admin_approve" required
			                                                            id="" class="form-control">
			                                                            <option value="accept">accept
			                                                            </option>
			                                                            <option value="pending">pending
			                                                            </option>
			                                                         </select>
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Supplier
			                                                         Number</label><span
			                                                            class="text-danger">*</span>
			                                                         <input
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->supplier_number;?>
"
			                                                            readonly name="updateNumber"
			                                                            type="text" required
			                                                            class="form-control" id="updateName"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Supplier
			                                                         Address</label><span
			                                                            class="text-danger">*</span>
			                                                         <input type="text"
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->location;?>
"
			                                                            name="updatesupplierlocation"
			                                                            required class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Supplier
			                                                         Mobile Number</label><span
			                                                            class="text-danger">*</span>
			                                                         <input type="number"
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->mobile_no;?>
"
			                                                            name="updatesupplierMnumber"
			                                                            required class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Other Document
			                                                         2</label>
			                                                         <input type="file"
			                                                            name="other_document_2"
			                                                            class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                         <input type="hidden"
			                                                            name="other_document_2_old"
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->other_document_2;?>
"
			                                                            class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Other Document
			                                                         3</label>
			                                                         <input type="file"
			                                                            name="other_document_3"
			                                                            class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                         <input type="hidden"
			                                                            name="other_document_3_old"
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->other_document_3;?>
"
			                                                            class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label for="machine_name">Upload NDA
			                                                         Document</label>
			                                                         <input type="file" name="nda_document"
			                                                            class="form-control"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                         <input type="hidden"
			                                                            name="nda_document_old"
			                                                            class="form-control"
			                                                            value="<?php echo $_smarty_tpl->tpl_vars['s']->value->nda_document;?>
"
			                                                            id="exampleInputEmail1"
			                                                            aria-describedby="emailHelp"
			                                                            placeholder="Enter Supplier Mobile Number">
			                                                      </div>
			                                                      <div class="form-group">
			                                                         <label>With in State </label><span
			                                                            class="text-danger">*</span>
			                                                         <select class="form-control select2"
			                                                            name="with_in_state"
			                                                            style="width: 100%;">
			                                                            <option <?php if (($_smarty_tpl->tpl_vars['s']->value->with_in_state == "yes")) {?>selected <?php }?> value="yes">
			                                                               Yes
			                                                            </option>
			                                                            <option <?php if (($_smarty_tpl->tpl_vars['s']->value->with_in_state == "no")) {?>selected <?php }?> value="no">No
			                                                            </option>
			                                                         </select>
			                                                      </div>
			                                                </div>
			                                                <div class="col-lg-6">
			                                                <div class="form-group">
			                                                <label for="machine_name">Supplier
			                                                Email</label><span
			                                                   class="text-danger">*</span>
			                                                <input type="email"
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->email;?>
"
			                                                   name="updatesupplierEmail" required
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Supplier Email">
			                                                </div>
			                                                <div class="form-group">
			                                                <label for="customer_location">Add
			                                                State</label><span
			                                                   class="text-danger">*</span>
			                                                <input type="text" name="ustate" required
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->state;?>
"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Add State">
			                                                </div>
			                                                <div class="form-group">
			                                                <label for="customer_location">Add GST
			                                                Number</label><span
			                                                   class="text-danger">*</span>
			                                                <input type="text" name="ugst_no" required
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->gst_number;?>
"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Add GST Number">
			                                                </div>
			                                                <div class="form-group">
			                                                <label for="machine_name">Other Document
			                                                1</label>
			                                                <input type="file" name="other_document_1"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Supplier Mobile Number">
			                                                <input type="hidden"
			                                                   name="other_document_1_old"
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->other_document_1;?>
"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Supplier Mobile Number">
			                                                </div>
			                                                <div class="form-group">
			                                                <label for="payment_terms">Payment
			                                                Terms</label><span
			                                                   class="text-danger">*</span>
			                                                <input type="text"
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->payment_terms;?>
"
			                                                   name="upaymentTerms" required
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Payment Terms">
			                                                </div>
			                                                <div class="form-group">
			                                                <label for="machine_name">Upload
			                                                Registration Document</label>
			                                                <input type="file"
			                                                   name="registration_document"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Supplier Mobile Number">
			                                                <input type="hidden"
			                                                   name="registration_document_old"
			                                                   value="<?php echo $_smarty_tpl->tpl_vars['s']->value->registration_document;?>
"
			                                                   class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Supplier Mobile Number">
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
			                                 </div>
			                                 <!-- <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal<?php echo '<?'; ?>
PHP echo $i; <?php echo '?>'; ?>
"> <i class="far fa-trash-alt"></i></button> -->
			                                 <!-- Button trigger modal -->
			                                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			                                    Launch demo modal
			                                    </button> -->
			                                 <!-- Modal -->
			                                 <div class="modal fade" id="exampleModal<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" tabindex="-1"
			                                    role="dialog" aria-labelledby="exampleModalLabel"
			                                    aria-hidden="true">
			                                    <div class="modal-dialog" role="document">
			                                       <div class="modal-content">
			                                          <div class="modal-header">
			                                             <h5 class="modal-title" id="exampleModalLabel">Delete
			                                             </h5>
			                                             <button type="button" class="close" data-dismiss="modal"
			                                                aria-label="Close">
			                                             <span aria-hidden="true">&times;</span>
			                                             </button>
			                                          </div>
			                                          <div class="modal-body">
			                                             <form action="<?php echo base_url('delete');?>
"
			                                                method="POST">
			                                                <input value="<?php echo $_smarty_tpl->tpl_vars['s']->value->id;?>
" name="id"
			                                                   type="hidden" required class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Machine Name">
			                                                <input value="supplier" name="table_name"
			                                                   type="hidden" required class="form-control"
			                                                   id="exampleInputEmail1"
			                                                   aria-describedby="emailHelp"
			                                                   placeholder="Enter Machine Name">
			                                                Are you sure you want to delete
			                                          </div>
			                                          <div class="modal-footer">
			                                          <button type="button" class="btn btn-secondary"
			                                             data-dismiss="modal">Close</button>
			                                          <button type="submit" class="btn btn-danger">Delete
			                                          </button>
			                                          </div>
			                                          </form>
			                                       </div>
			                                    </div>
			                                 </div>
			                              </td>
			                           </tr>
	                           	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	                           	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           <?php }?>
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
<!-- /.content-wrapper --><?php }
}
