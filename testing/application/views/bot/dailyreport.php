

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Report</h1>
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
                <h3 class="card-title">Daily Report</h3>
              </div>

              <div class="card-body">
                <div class="col-sm-12 col-md-12 col-12">
                  <div id="print">
                   
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-12">
                        <h3>Date : <?php echo date('d-m-Y'); ?></h3>
                      </div>
                      <table class="table table-bordered" >
                        <thead>
                          <tr>
                            <th colspan="3" style="text-align: center;">Income</th>
                            <th colspan="3" style="text-align: center;">Expense</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="width: 10%;">1</td>
                            <td style="width: 20%;">Previous Amount</td>
                            <td style="width: 20%;">
                              <?php $pamount = (($psale->total+$pcvoucher->total)-($ppurchase->total+$pdvoucher->total+$pempp->total+$preturn->total+$psvoucher->total)); ?>
                              <?php echo number_format(($pamount), 2); ?>
                            </td>
                            <td style="width: 10%;">1</td>
                            <td style="width: 20%;">Purchase Amount</td>
                            <td style="width: 20%;"><?php echo number_format($cpurchase->total, 2); ?></td>
                          </tr>
                          <tr>
                            <td style="width: 10%;">2</td>
                            <td style="width: 20%;">Sales Amount</td>
                            <td style="width: 20%;"><?php echo number_format(($csale->total), 2); ?></td>
                            <td style="width: 10%;">2</td>
                            <td>Debit Voucher / Expense</td>
                            <td><?php echo number_format($cdvoucher->total, 2); ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Credit Voucher</td>
                            <td><?php echo number_format($ccvoucher->total, 2); ?></td>
                            <td>3</td>
                            <td>Supplier Pay</td>
                            <td><?php echo number_format($csvoucher->total, 2); ?></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>4</td>
                            <td>Employee Payments</td>
                            <td><?php echo number_format($cempp->total, 2); ?></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>5</td>
                            <td>Returns</td>
                            <td><?php echo number_format(($creturn->total), 2); ?></td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: center;"><b>Today Total Income</b></td>
                            <td>
                              <?php $ti = $csale->total+$ccvoucher->total+$pamount; ?>
                              <b><?php echo number_format($ti, 2); ?></b>
                            </td>
                            <td colspan="2" style="text-align: center;"><b>Today Total Expense</b></td>
                            <td>
                              <?php $te = $cpurchase->total+$cdvoucher->total+$csvoucher->total+$cempp->total+$creturn->total; ?>
                              <b><?php echo number_format($te, 2); ?></b>
                              </td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <th colspan="3" style="text-align: right;"><h4>Cash On Hand</h4></th>
                            <th colspan="3" style="text-align: left;"><h4><?php echo number_format(($ti-$te), 2); ?></h4></th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                  </div><br>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

