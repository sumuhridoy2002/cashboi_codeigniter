<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Order</li>
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
                <h3 class="card-title">Order Information</h3>
              </div>

              <div class="card-body">
                <div class="invoice p-3 mb-3">
                  <div id="print">
                    <div class="row">
                      <div class="col-sm-3 col-3 invoice-col">
                      </div>
                      <div class="col-sm-3 col-3 invoice-col text-center">
                        <?php if($company){ ?><h3><b><?php echo $company->com_name; ?></b></h3>
                        <?php } ?>
                        <?php if($company){ ?><?php echo $company->com_address; ?><?php } ?><br>
                        <?php if($company){ ?><?php echo $company->com_mobile; ?><?php } ?>
                      
                      </div>
                      <div class="col-sm-3 col-3 invoice-col">
                        <h3><b>ORDER INVOICE</b></h3>
                          <table class="table table-striped table-bordered">
                            <tbody>
                              <tr style="line-height: 6px !important;">
                                <td>Order No. #</td>
                                <td><?php echo $order['order_no']; ?></td>
                              </tr>
                              <tr style="line-height: 6px !important;">
                                <td>Date #</td>
                                <td><?php echo date('d-m-Y', strtotime($order['regdate'])); ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                      </div>
                        
                    <div class="row">
                      <div class="col-sm-6 col-6 invoice-col">
                        <h3 style="background: #183B6A; color: #fff; padding: 5px;"><b>BILL FROM</b>
                        </h3>
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr style="line-height: 6px !important;">
                              <td>Name #</td>
                              <td><?php if($company){ ?><b><?php echo $company->com_name; ?></b><?php } ?>
                              </td>
                            </tr>
                            <tr style="line-height: 6px !important;">
                                <td>Mobile #</td>
                                <td><?php if($company){ ?><?php echo $company->com_mobile; ?><?php } ?>
                                </td>
                            </tr>
                            <tr style="line-height: 6px !important;">
                                <td>Address #</td>
                                <td><?php if($company){ ?><?php echo $company->com_address; ?><?php } ?>
                                </td>
                            </tr>
                             <tr style="line-height: 6px !important;">
                                <td>Email #</td>
                                <td><?php if($company){ ?><?php echo $company->com_email; ?><?php } ?>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>

                <div class="col-sm-6 col-6 invoice-col">
                  <h3 style="background: #183B6A; color: #fff; padding: 5px;"><b>BILL TO</b>
                  </h3>
                  <table class="table table-striped table-bordered">
                      <tbody>
                          <tr style="line-height: 6px !important;">
                              <td>Customer #</td>
                              <td><?php echo $order['custName']; ?></td>
                          </tr>
                          <tr style="line-height: 6px !important;">
                              <td>Mobile #</td>
                              <td><?php echo $order['custMobile']; ?></td>
                          </tr>
                          <tr style="line-height: 6px !important;">
                              <td>Address #</td>
                              <td><?php echo  $order['custAddres']; ?></td>
                          </tr>
                          <tr style="line-height: 6px !important;">
                              <td>Email #</td>
                              <td><?php echo  $order['custEmail']; ?></td>
                          </tr>
                      </tbody>
                  </table>
               </div>
       

                      <div class="col-md-12 col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>SN</th>
                              <th style="text-align: center;">Product Name</th>
                              <th style="text-align: center;">Quantity</th>
                              <th style="text-align: center;">Unit Price</th>
                              <th style="text-align: center;">Sub Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 0;
                            $tq = 0;
                            $stotal = 0;
                            foreach ($product as $value){
                            $i++;
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td style="text-align: center;"><?php echo $value['productName'].' ( '.$value['productcode'].' )'; ?></td>
                              <td style="text-align: center;"><?php echo round($value['quantity']); $tq += $value['quantity']; ?></td>
                              <td style="text-align: center;"><?php echo number_format($value['sprice'], 2);; ?></td>
                              <td style="text-align: center;"><?php echo number_format($value['tPrice'], 2); $stotal += $value['tPrice']; ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                          <tbody>
                            <tr>
                              <td colspan="2" style="text-align: center; ">Grand Total </td>
                              <td style="text-align: center "><?php echo $tq; ?></td>
                              <td></td>
                              <td><?php echo number_format($stotal, 2); ?></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                            <br><br>
                  
                    <div class="row">
                      <div class="col-md-12 col-12" >
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-6" style="text-align: center;">
                            <p>------------------------------</p>
                            <p>Customer</p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-6" style="text-align: center;">
                            <p>------------------------------</p>
                            <p>Authorized By</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                 
                  
                  <div class="row no-print" >
                    <div class="col-12" style="text-align: center;">
                      <a href="javascript:void(0)" class="btn btn-primary" onclick="printDiv('print')" ><i class="fas fa-print"></i> Print</a>
                      <a href="<?php echo site_url(); ?>order" class="btn btn-danger" ><i class="fas fa-arrow-left"></i> Back</a>
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


<?php $this->load->view('footer/footer'); ?>