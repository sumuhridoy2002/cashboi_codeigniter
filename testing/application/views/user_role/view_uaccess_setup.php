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
                <h3 class="card-title">Access Setup Information</h3>
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
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Master</th>
                          <th>Page</th>
                          <th>Function</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <ul style="list-style-type:none;">
                            	<?php if($umaster[0]['dashboard'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['dashboard'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Dashboard
                              </li>
                              <?php } if($umaster[0]['product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Product
                              </li>
                              <?php } if($umaster[0]['purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Purchase
                              </li>
                              <?php } if($umaster[0]['sales'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['sales'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Sales
                              </li>
                              <?php } if($umaster[0]['return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Returns
                              </li>
                              <?php } if($umaster[0]['quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Quotations
                              </li>
                              <?php } if($umaster[0]['voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Vouchers
                              </li>
                              <?php } if($umaster[0]['Employee_payment'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['Employee_payment'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Employee Payment
                              </li>
                              <?php } if($umaster[0]['users'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['users'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Users
                              </li>
                              <?php } if($umaster[0]['report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Reports
                              </li>
                              <?php } if($umaster[0]['setting'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['setting'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Setting
                              </li>
                              <?php } if($umaster[0]['page_setup'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['page_setup'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Page Setup
                              </li>
                              <?php } if($umaster[0]['access_setup'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['access_setup'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Access Setup
                              </li>
                              <?php } if($umaster[0]['help_support'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($master[0]['help_support'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Help & Support
                              </li>
                              <?php } ?>
                            </ul>
                          </td>

                          <td>
                            <ul style="list-style-type:none;">
                              <?php if($upage[0]['dashboard'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['dashboard'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Dashboard
                              </li>
                              <?php } if($upage[0]['product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Products
                              </li>
                              <?php } if($upage[0]['purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Purchases
                              </li>
                              <?php } if($upage[0]['sales'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['sales'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Sales
                              </li>
                              <?php } if($upage[0]['return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Returns
                              </li>
                              <?php } if($upage[0]['quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Quotations
                              </li>
                              <?php } if($upage[0]['voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Vouchers
                              </li>
                              <?php } if($upage[0]['Employee_payment'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['Employee_payment'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Employee Payment
                              </li>
                              <?php } if($upage[0]['users'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['users'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Users
                              </li>
                              <?php } if($upage[0]['report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Reports
                              </li>
                              <?php } if($upage[0]['setting'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['setting'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Setting
                              </li>
                              <?php } if($upage[0]['page_setup'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['page_setup'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Page Setup
                              </li>
                              <?php } if($upage[0]['access_setup'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['access_setup'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Access Setup
                              </li>
                              <?php } if($upage[0]['help_support'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($page[0]['help_support'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Help & Support
                              </li>
                              <?php } ?>
                            </ul>
                          </td>

                          <td>
                            <ul style="list-style-type:none;">
                              <?php if($ufunction[0]['add_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['add_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Add Product
                              </li>
                              <?php } if($ufunction[0]['view_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Product
                              </li>
                              <?php } if($ufunction[0]['edit_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Product
                              </li>
                              <?php } if($ufunction[0]['delete_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Product
                              </li>
                              <?php } if($ufunction[0]['store_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['store_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Store Product
                              </li>
                              <?php } if($ufunction[0]['import_product'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['import_product'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Import Product
                              </li>
                              <?php } if($ufunction[0]['new_purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['new_purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Purchase
                              </li>
                              <?php } if($ufunction[0]['edit_purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Purchase
                              </li>
                              <?php } if($ufunction[0]['view_purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Purchase
                              </li>
                              <?php } if($ufunction[0]['delete_purchase'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_purchase'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Purchase
                              </li>
                              <?php } if($ufunction[0]['new_sale'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['new_sale'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Sale
                              </li>
                              <?php } if($ufunction[0]['view_sale'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_sale'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                    <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Sale
                              </li>
                              <?php } if($ufunction[0]['edit_sale'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_sale'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Sale
                              </li>
                              <?php } if($ufunction[0]['delete_sale'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_sale'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Sale
                              </li>
                              <?php } if($ufunction[0]['new_return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['new_return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Return
                              </li>
                              <?php } if($ufunction[0]['view_return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Return
                              </li>
                              <?php } if($ufunction[0]['edit_return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Return
                              </li>
                              <?php } if($ufunction[0]['delete_return'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_return'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Return
                              </li>
                              <?php } if($ufunction[0]['new_quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['new_quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Quotation
                              </li>
                              <?php } if($ufunction[0]['view_quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Quotation
                              </li>
                              <?php } if($ufunction[0]['edit_quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Quotation
                              </li>
                              <?php } if($ufunction[0]['delete_quotation'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_quotation'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Quotation
                              </li>
                              <?php } if($ufunction[0]['new_voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['new_voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Voucher
                              </li>
                              <?php } if($ufunction[0]['view_voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['view_voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> View Voucher
                              </li>
                              <?php } if($ufunction[0]['edit_voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['edit_voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Edit Voucher
                              </li>
                              <?php } if($ufunction[0]['delete_voucher'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['delete_voucher'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Delete Voucher
                              </li>
                              <?php } if($ufunction[0]['newPayment'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['newPayment'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> New Payment
                              </li>
                              <?php } if($ufunction[0]['customer'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['customer'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Customer
                              </li>
                              <?php } if($ufunction[0]['supplier'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['supplier'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Suppliers
                              </li>
                              <?php } if($ufunction[0]['employee'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['employee'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Employees
                              </li>
                              <?php } if($ufunction[0]['user'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['user'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Users
                              </li>
                              <?php } if($ufunction[0]['sales_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['sales_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Sales Report
                              </li>
                              <?php } if($ufunction[0]['purchase_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['purchase_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Purchase Report
                              </li>
                              <?php } if($ufunction[0]['profit_loss_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['profit_loss_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Profit / Loss Report
                              </li>
                              <?php } if($ufunction[0]['sales_purchase_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['sales_purchase_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Sales / Purchase Report
                              </li>
                              <?php } if($ufunction[0]['customer_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['customer_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Customer Report
                              </li>
                              <?php } if($ufunction[0]['customer_ledger'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['customer_ledger'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Customer Ledger
                              </li>
                              <?php } if($ufunction[0]['supplier_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['supplier_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Supplier Report
                              </li>
                              <?php } if($ufunction[0]['supplier_ledger'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['supplier_ledger'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Supplier Ledger
                              </li>
                              <?php } if($ufunction[0]['stock_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['stock_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Stock Report
                              </li>
                              <?php } if($ufunction[0]['voucher_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['voucher_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Voucher Report
                              </li>
                              <?php } if($ufunction[0]['daily_report'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['daily_report'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Daily Report
                              </li>
                              <?php } if($ufunction[0]['cash_book'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['cash_book'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Cash Book
                              </li>
                              <?php } if($ufunction[0]['bank_book'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['bank_book'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Bank Book
                              </li>
                              <?php } if($ufunction[0]['mobile_book'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['mobile_book'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Mobile Book
                              </li>
                              <?php } if($ufunction[0]['category'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['category'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Category
                              </li>
                              <?php } if($ufunction[0]['unit'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['unit'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Unit
                              </li>
                              <?php } if($ufunction[0]['expense_type'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['expense_type'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Expense Type
                              </li>
                              <?php } if($ufunction[0]['department'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['department'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Department
                              </li>
                              <?php } if($ufunction[0]['bank_account'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['bank_account'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Bank Account
                              </li>
                              <?php } if($ufunction[0]['mobile_account'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['mobile_account'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Mobile Account
                              </li>
                              <?php } if($ufunction[0]['notice'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['notice'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> Notices
                              </li>
                              <?php } if($ufunction[0]['user_type'] == '1'){ ?>
                              <li>
                                <b>
                                  <?php if($function[0]['user_type'] == '1'){ ?>
                                  <i class="fas fa-check" style="color:green;"> </i>
                                  <?php }else{ ?>
                                  <i class="fas fa-times" style="color:red;"> </i>
                                  <?php } ?>
                                </b> User Type
                              </li>
                              <?php } ?>
                            </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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