<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Access Setup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Access Setup</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Permission Setup Information</h3>
              </div>

              <div class="card-body">
        				<div class="row">
        					<div class="col-md-12 col-sm-12 col-12">
              			<table>
              				<tbody>
                        <tr>
                          <td>User Type</td>
                          <td>: <?= $user[0]['lavelName']; ?></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>: <?= $user[0]['status']; ?></td>
                        </tr>
                      </tbody>
    					      </table>
                	</div>
            
            		  <div class="col-md-12 col-sm-12 col-12">
                    <div class="box-header">
                      <h3 class="box-title">List of Pages And Functions</h3>
                    </div>
                    <div class="box-body">
                      <form action="<?= base_url().'Access_setup/setup_user_access/'.$user[0]['ax_id']; ?>" method="post">
                        <div class="row">
                            <?php if($umaster[0]['dashboard'] == '1'){ ?>
		                      <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-1">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input class="master-checkbox" type="checkbox" name="dashboard" value="0"> Dashboard
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input class="checkbox-item" type="checkbox" name="dashboard" value="1" <?php if($page[0]['dashboard'] == '1'){ ?>checked<?php } ?>> Dashboard</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type:none;"></ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['product'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-2">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="product" value="0" > Product
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="product" value="1" <?php if($page[0]['product'] == '1'){ ?>checked<?php } ?>> Product</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="add_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="add_product" value="1" <?php if($function[0]['add_product'] == '1'){ ?>checked<?php } ?>> Add Product</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_product" value="1" <?php if($function[0]['view_product'] == '1'){ ?>checked<?php } ?>> View Product</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_product" value="1" <?php if($function[0]['edit_product'] == '1'){ ?>checked<?php } ?>> Edit Product</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_product" value="1" <?php if($function[0]['delete_product'] == '1'){ ?>checked<?php } ?>> Delete Product</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="store_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="store_product" value="1" <?php if($function[0]['store_product'] == '1'){ ?>checked<?php } ?>> Store Product</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="import_product" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="import_product" value="1" <?php if($function[0]['import_product'] == '1'){ ?>checked<?php } ?>> Import Product</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['purchase'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-3">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="purchase" value="0" > Purchase
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="purchase" value="1" <?php if($page[0]['purchase'] == '1'){ ?>checked<?php } ?>> Purchase</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="new_purchase" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="new_purchase" value="1" <?php if($function[0]['new_purchase'] == '1'){ ?>checked<?php } ?>> New Purchase</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_purchase" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_purchase" value="1" <?php if($function[0]['view_purchase'] == '1'){ ?>checked<?php } ?>> View Purchase</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_purchase" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_purchase" value="1" <?php if($function[0]['edit_purchase'] == '1'){ ?>checked<?php } ?>> Edit Purchase</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_purchase" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_purchase" value="1" <?php if($function[0]['delete_purchase'] == '1'){ ?>checked<?php } ?>> Delete Purchase</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['sales'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-4">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="sales" value="0" > Sales
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="sales" value="1" <?php if($page[0]['sales'] == '1'){ ?>checked<?php } ?>> Sales</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="new_sale" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="new_sale" value="1" <?php if($function[0]['new_sale'] == '1'){ ?>checked<?php } ?>> New Sale</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_sale" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_sale" value="1" <?php if($function[0]['view_sale'] == '1'){ ?>checked<?php } ?>> View Sale</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_sale" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_sale" value="1" <?php if($function[0]['edit_sale'] == '1'){ ?>checked<?php } ?>> Edit Sale</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_sale" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_sale" value="1" <?php if($function[0]['delete_sale'] == '1'){ ?>checked<?php } ?>> Delete Sale</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['return'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-5">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="return" value="0"> Return
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="return" value="1" <?php if($page[0]['return'] == '1'){ ?>checked<?php } ?>> Return</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="new_return" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="new_return" value="1" <?php if($function[0]['new_return'] == '1'){ ?>checked<?php } ?>> New Return</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_return" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_return" value="1" <?php if($function[0]['view_return'] == '1'){ ?>checked<?php } ?>> View Return</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_return" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_return" value="1" <?php if($function[0]['edit_return'] == '1'){ ?>checked<?php } ?>> Edit Return</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_return" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_return" value="1" <?php if($function[0]['delete_return'] == '1'){ ?>checked<?php } ?>> Delete Return</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['quotation'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-6">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="quotation" value="0" > Quotation
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="quotation" value="1" <?php if($page[0]['quotation'] == '1'){ ?>checked<?php } ?>> Quotation</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="new_quotation" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="new_quotation" value="1" <?php if($function[0]['new_quotation'] == '1'){ ?>checked<?php } ?>> New Quotation</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_quotation" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_quotation" value="1" <?php if($function[0]['view_quotation'] == '1'){ ?>checked<?php } ?>> View Quotation</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_quotation" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_quotation" value="1" <?php if($function[0]['edit_quotation'] == '1'){ ?>checked<?php } ?>> Edit Quotation</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_quotation" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_quotation" value="1" <?php if($function[0]['delete_quotation'] == '1'){ ?>checked<?php } ?>> Delete Quotation</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['voucher'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-7">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="voucher" value="0" > Voucher
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="voucher" value="1" <?php if($page[0]['voucher'] == '1'){ ?>checked<?php } ?>> Voucher</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="new_voucher" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="new_voucher" value="1" <?php if($function[0]['new_voucher'] == '1'){ ?>checked<?php } ?>> New Voucher</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="view_voucher" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="view_voucher" value="1" <?php if($function[0]['view_voucher'] == '1'){ ?>checked<?php } ?>> View Voucher</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="edit_voucher" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="edit_voucher" value="1" <?php if($function[0]['edit_voucher'] == '1'){ ?>checked<?php } ?>> Edit Voucher</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="delete_voucher" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="delete_voucher" value="1" <?php if($function[0]['delete_voucher'] == '1'){ ?>checked<?php } ?>> Delete Voucher</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['Employee_payment'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-8">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="Employee_payment" value="0" > Employee Payment
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="Employee_payment" value="1" <?php if($page[0]['Employee_payment'] == '1'){ ?>checked<?php } ?>> Employee Payment</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="newPayment" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="newPayment" value="1" <?php if($function[0]['newPayment'] == '1'){ ?>checked<?php } ?>> New Payment</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['users'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-9">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="users" value="0" > Users
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="users" value="1" <?php if($page[0]['users'] == '1'){ ?>checked<?php } ?>> Users</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="customer" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="customer" value="1" <?php if($function[0]['customer'] == '1'){ ?>checked<?php } ?>> Customer</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="supplier" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="supplier" value="1" <?php if($function[0]['supplier'] == '1'){ ?>checked<?php } ?>> Supplier</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="employee" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="employee" value="1" <?php if($function[0]['employee'] == '1'){ ?>checked<?php } ?>> Employee</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="user" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="user" value="1" <?php if($function[0]['user'] == '1'){ ?>checked<?php } ?>> User</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['report'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-10">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="report" value="0" > Reports
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="report" value="1" <?php if($page[0]['report'] == '1'){ ?>checked<?php } ?>> Report</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="sales_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="sales_report" value="1" <?php if($function[0]['sales_report'] == '1'){ ?>checked<?php } ?>> Sales Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="purchase_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="purchase_report" value="1" <?php if($function[0]['purchase_report'] == '1'){ ?>checked<?php } ?>> Purchase Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="profit_loss_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="profit_loss_report" value="1" <?php if($function[0]['profit_loss_report'] == '1'){ ?>checked<?php } ?>> Profit / Loss Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="sales_purchase_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="sales_purchase_report" value="1" <?php if($function[0]['sales_purchase_report'] == '1'){ ?>checked<?php } ?>> Sales / Purchase Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="customer_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="customer_report" value="1" <?php if($function[0]['customer_report'] == '1'){ ?>checked<?php } ?>> Customer Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="customer_ledger" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="customer_ledger" value="1" <?php if($function[0]['customer_ledger'] == '1'){ ?>checked<?php } ?>> Customer Ledger</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="supplier_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="supplier_report" value="1" <?php if($function[0]['supplier_report'] == '1'){ ?>checked<?php } ?>> Supplier Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="supplier_ledger" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="supplier_ledger" value="1" <?php if($function[0]['supplier_ledger'] == '1'){ ?>checked<?php } ?>> Supplier Ledger</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="stock_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="stock_report" value="1" <?php if($function[0]['stock_report'] == '1'){ ?>checked<?php } ?>> Stock Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="voucher_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="voucher_report" value="1" <?php if($function[0]['voucher_report'] == '1'){ ?>checked<?php } ?>> Voucher Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="daily_report" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="daily_report" value="1" <?php if($function[0]['daily_report'] == '1'){ ?>checked<?php } ?>> Daily Report</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="cash_book" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="cash_book" value="1" <?php if($function[0]['cash_book'] == '1'){ ?>checked<?php } ?>> Cash Book</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="bank_book" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="bank_book" value="1" <?php if($function[0]['bank_book'] == '1'){ ?>checked<?php } ?>> Bank Book</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="mobile_book" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="mobile_book" value="1" <?php if($function[0]['mobile_book'] == '1'){ ?>checked<?php } ?>> Mobile Book</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['setting'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-11">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="setting" value="0" > Setting
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 40%;">Page</th>
                                      <th style="width: 60%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="setting" value="1" <?php if($page[0]['setting'] == '1'){ ?>checked<?php } ?>> Setting</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;">
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="category" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="category" value="1" <?php if($function[0]['category'] == '1'){ ?>checked<?php } ?>> Category</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="unit" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="unit" value="1" <?php if($function[0]['unit'] == '1'){ ?>checked<?php } ?>> Unit</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="expense_type" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="expense_type" value="1" <?php if($function[0]['expense_type'] == '1'){ ?>checked<?php } ?>> Expense Type</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="department" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="department" value="1" <?php if($function[0]['department'] == '1'){ ?>checked<?php } ?>> Department</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="bank_account" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="bank_account" value="1" <?php if($function[0]['bank_account'] == '1'){ ?>checked<?php } ?>> Bank Account</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="mobile_account" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="mobile_account" value="1" <?php if($function[0]['mobile_account'] == '1'){ ?>checked<?php } ?>> Mobile Account</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="notice" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="notice" value="1" <?php if($function[0]['notice'] == '1'){ ?>checked<?php } ?>> Notice</label>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="checkbox">
                                              <input type="hidden" name="user_type" value="0">
                                              <label><input type="checkbox" class="checkbox-item" name="user_type" value="1" <?php if($function[0]['user_type'] == '1'){ ?>checked<?php } ?>> User Type</label>
                                            </div>
                                          </li>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['access_setup'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-12">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="access_setup" value="0"> Access Setup
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 50%;">Page</th>
                                      <th style="width: 50%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="access_setup" value="1" <?php if($page[0]['access_setup'] == '1'){ ?>checked<?php } ?>> Access Setup</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;"></ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if($umaster[0]['help_support'] == '1'){ ?>
                          <div class="col-md-4 col-sm-4 col-12 checkbox-group" id="checkbox-group-13">
                            <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                              <input type="checkbox" class="master-checkbox" name="help_support" value="0" > Help & Support
                            </h5>
                            <div class="page_box" >
                              <div class="col-md-12 col-sm-12 col-12">
                                <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th style="width: 50%;">Page</th>
                                      <th style="width: 50%;">Function</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="checkbox">
                                          <label><input type="checkbox" class="checkbox-item" name="help_support" value="1" <?php if($page[0]['help_support'] == '1'){ ?>checked<?php } ?>> Help & Support</label>
                                        </div>
                                      </td>
                                      <td>
                                        <ul style="list-style-type: none; margin-left: -40px;"></ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

								        </div>
	              				<div class="col-md-12 col-sm-12 col-12" style="text-align: center;">
                    			<button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                          <a href="<?php echo site_url('accesSetup') ?>" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
                    		</div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer');?>

<script>
  var checkboxGroups = document.querySelectorAll('.checkbox-group');

  checkboxGroups.forEach(function(group) {
    var checkboxItems = group.querySelectorAll('.checkbox-item');
    var masterCheckbox = group.querySelector('.master-checkbox');

    masterCheckbox.addEventListener('click', function() {
      for (var i = 0; i < checkboxItems.length; i++) {
        checkboxItems[i].checked = this.checked;
      }
    });

    for (var i = 0; i < checkboxItems.length; i++) {
      checkboxItems[i].addEventListener('click', function() {
        var allChecked = true;
        for (var j = 0; j < checkboxItems.length; j++) {
          if (!checkboxItems[j].checked) {
            allChecked = false;
            break;
          }
        }
        masterCheckbox.checked = allChecked;
      });
    }
  });
</script>

