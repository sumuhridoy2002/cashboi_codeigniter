<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profit / Loss Reports</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profit / Loss</li>
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
                            <h3 class="card-title">Profit / Loss Reports</h3>
                        </div>

                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-12">
                                <form action="<?php echo base_url() ?>profil-Loss" method="get">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="form-group col-md-12 col-sm-12 col-12">
                                            <b>
                                                <input type="radio" name="reports" value="dailyReports" id="daily"
                                                    required>&nbsp;&nbsp;Daily
                                                Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="reports" value="monthlyReports" id="monthly"
                                                    required>&nbsp;&nbsp;Monthly
                                                Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="reports" value="yearlyReports" id="yearly"
                                                    required>&nbsp;&nbsp;Yearly Reports
                                            </b>
                                        </div>

                                        <div class="d-none" id="dreports">
                                            <div class="row">
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <label>Start Date *</label>
                                                    <input type="text" class="form-control datepicker" name="sdate"
                                                        value="<?php echo date('m/d/Y') ?>" id="sdate" required="">
                                                </div>
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <label>End Date *</label>
                                                    <input type="text" class="form-control datepicker" name="edate"
                                                        value="<?php echo date('m/d/Y') ?>" id="edate" required="">
                                                </div>
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <button type="submit" name="search" class="btn btn-info"
                                                        style="margin-top: 30px;"><i
                                                            class="fa fa-search-plus"></i>&nbsp;Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-none" id="mreports">
                                            <div class="row">
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <label>Month *</label>
                                                    <select class="form-control" name="month" id="month" required="">
                                                        <option value="">Select Month</option>
                                                        <option value="01">January</option>
                                                        <option value="02">February</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <label>Year *</label>
                                                    <select class="form-control" name="year" id="year" required="">
                                                        <?php $d = date("Y"); ?>
                                                        <option value="">Select Year</option>
                                                        <?php for ($x = 2020; $x <= $d; $x++) { ?>
                                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <button type="submit" name="search" class="btn btn-info"
                                                        style="margin-top: 30px;"><i
                                                            class="fa fa-search-plus"></i>&nbsp;Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-none" id="yreports">
                                            <div class="row">
                                                <div class="form-group col-md-2 col-sm-2 col-12">
                                                    <label>Year *</label>
                                                    <select class="form-control" name="ryear" id="ryear" required="">
                                                        <?php $d = date("Y"); ?>
                                                        <option value="">Select Year</option>
                                                        <?php for ($x = 2020; $x <= $d; $x++) { ?>
                                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 col-sm-2 col-xs-12">
                                                    <button type="submit" name="search" class="btn btn-info"
                                                        style="margin-top: 30px;"><i class="fa fa-search-plus"
                                                            aria-hidden="true"></i>&nbsp;Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-12 col-md-12 col-12">
                                <div id="print">
                                    <div class="row" id="header" style="display: none">
                                        <?php if($company){ ?>
                                        <div class="col-sm-4 col-md-4 col-4" style="margin-top: 30px;">
                                            <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>"
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-8 text-right">
                                            <div class="col-sm-12 col-md-12 col-12">
                                                <h3><b><?php echo $company->com_name; ?></b></h3>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-12">
                                                <b>Address&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_address; ?></b>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-12">
                                                <b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_email; ?></b>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-12">
                                                <b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_mobile; ?></b>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div><hr>
                                    <!-- <table class="table table-bordered">
                                        <thead style="width: 100%;">
                                            <tr style="width: 100%;">
                                                <th colspan="3" style="text-align: center;">Income</th>
                                                <th colspan="3" style="text-align: center;">Expense</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 10%;">1</td>
                                                <td style="width: 20%;">Sales Amount</td>
                                                <td style="width: 20%;"><?php echo number_format(($sale->total), 2); ?>
                                                </td>
                                                <td style="width: 10%;">1</td>
                                                <td style="width: 20%;">Purchase Amount</td>
                                                <td style="width: 20%;">
                                                    <?php echo number_format($purchase->total, 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Credit Voucher</td>
                                                <td><?php echo number_format($cvoucher->total, 2); ?></td>
                                                <td>2</td>
                                                <td>Debit Voucher / Expense</td>
                                                <td><?php echo number_format($dvoucher->total, 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>3</td>
                                                <td>Employee Payments</td>
                                                <td><?php echo number_format($empp->total, 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>4</td>
                                                <td>Returns</td>
                                                <td><?php echo number_format(($return->total), 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>5</td>
                                                <td>Supplier Pay</td>
                                                <td><?php echo number_format($svoucher->total, 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Total Income</td>
                                                <td>
                                                    <?php $ti = $sale->total+$cvoucher->total; ?>
                                                    <?php echo number_format($ti, 2); ?>
                                                </td>
                                                <td colspan="2" style="text-align: center;">Total Expense</td>
                                                <td>
                                                    <?php $te = $purchase->total+$dvoucher->total+$empp->total+$return->total+$svoucher->total; ?>
                                                    <?php echo number_format($te, 2); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr style="
                            <?php if ($ti > $te){ ?>
                              background: #a5e4ca; border: 2px solid #000;
                            <?php } else if ($ti < $te){ ?>
                              background: red; border: 2px solid #000;
                            <?php } else{ ?>
                              border: 2px solid #000;
                            <?php } ?>
                            ">
                                                <th colspan="3" style="text-align: right;">Net Profit / Loss</th>
                                                <th colspan="3" style="text-align: left;">
                                                    <?php echo number_format(($ti-$te), 2); ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12 col-sm-12 col-12" align="center">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-3">
                                                <p style="margin-top: 30px;">-----------------------</p>
                                                <p>Prepared By</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-3">
                                                <p style="margin-top: 30px;">-----------------------</p>
                                                <p>Checked By</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-3">
                                                <p style="margin-top: 30px;">-----------------------</p>
                                                <p>Verified By</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-3">
                                                <p style="margin-top: 30px;">-----------------------</p>
                                                <p>Authorized By</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br> -->
                                <div class="" style="text-align: center;">
                                 <h4>PROFIT AND LOSS</h4>
                                <?php if(isset($_GET['search'])) { ?>
                                
                                
                                 <?php if ($report == 'dailyReports') { ?>
                                  <div class="box-header" style="text-align: center;">
                                    <h5 class="box-title"><b><?php echo 'from '.$sdate.' to '.$edate; ?></b></h5>
                                  </div>
                                  <?php } else if ($report == 'monthlyReports') { ?>
                                  <div class="box-header" style="text-align: center;">
                                    <h5 class="box-title"><b> <?php echo $name.' '.$year; ?></b></h5>
                                  </div>
                                  <?php } else if ($report == 'yearlyReports') { ?>
                                  <div class="box-header" style="text-align: center;">
                                    <h5 class="box-title"><b> <?php echo $year; ?></b></h5>
                                  </div>
                                  <?php  
                                  
                                  } }?>
                    
                

              
                                </div>
                                <table class="table table-condensed">
                                        <thead style="width: 100%;">
                                            <tr style="width: 100%;">
                                                
                                                <th colspan="2" style="text-align: right;">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td style="border-color: black; border-width: medium;">Income</td>
                                            <td style="text-align: right; border-color: black; border-width: medium;"><b><?php $ti = (($sale->total+$cvoucher->total)-$return->total)+$service->total; ?>
                                                  <?php //echo number_format($svoucher->total, 2); ?>
                                                    <?php echo number_format($ti, 2); ?></b></td>
                                          </tr>
                                          <tr>
                                            <td>Cost of Goods Sold</td>
                                            <td style="text-align: right;">
                                            <b>
                                              <?php 
                                                $total=0; 
                                                foreach($cost as $cs) {
                                                  $pr=$cs->pprice;
                                                  $qt=$cs->quantity;
                                                  $total+= ($pr*$qt);
                                                }
                                                echo number_format($total, 2);
                                              ?> 
                                            </b></td>
                                          </tr>
                                           <tr>
                                            <td style="border-color: black; border-width: thin;"><b>GROSS PROFIT</b></td>
                                            <?php $gp=$ti-$total; if($gp>0){?>
                                            <td style="text-align: right;border-color: black; border-width: thin;"><b><?php echo number_format($gp, 2);?></b></td> <?php }
                                            else 
                                            { ?> <td style="color: red;text-align: right;border-color: black; border-width: medium;"><b><?php echo number_format($gp, 2);?></b></td>

                                            <?php }?>
                                          </tr>
                                          <tr>
                                            <td>Expenses</td>
                                            <td style="text-align: right;"><b><?php $te = $empp->total+$dvoucher->total+$empp->total+$svoucher->total; ?>
                                                    <?php echo number_format($te, 2); ?></b></td>
                                          </tr>
                                           <tr>
                                            <td style="border-color: black; border-width: thin;"><b>NET PROFIT</b></td>
                                            <?php $np=$gp-$te;
                                            if($np>0){?>
                                            <td style="color: green;text-align: right;border-color: black; border-width: thin;"><b><?php $np=$gp-$te; echo number_format($np, 2);?></b></td> <?php }
                                            else { ?>
                                            <td style="color: red;text-align: right;border-color: black; border-width: thin;"><b><?php $np=$gp-$te; echo number_format($np, 2);?></b></td> 

                                          <?php  } ?>
                                          </tr>


                            </tbody>
                            </table>
                            <?php
                             // echo '<pre>'.var_dump($cost).'</pre>';
                            ?>

                                <div class="form-group col-md-12 col-sm-12 col-12"
                                    style="text-align: center;margin-top: 20px">
                                    <a href="javascript:void(0)" style="width: 100px;" value="Print"
                                        onclick="printDiv('print')" class="btn btn-primary"><i class="fa fa-print"></i>
                                        Print</a>
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

<script>
$(document).ready(function() {
    $('#daily').click(function() {
        $('#dreports').removeAttr('class', 'd-none');
        $('#mreports').attr('class', 'd-none');
        $('#yreports').attr('class', 'd-none');

        $('#sdate').attr('required', 'required');
        $('#edate').attr('required', 'required');

        $('#month').removeAttr('required', 'required');
        $('#year').removeAttr('required', 'required');

        $('#ryear').removeAttr('required', 'required');
    });

    $('#monthly').click(function() {
        $('#mreports').removeAttr('class', 'd-none');
        $('#dreports').attr('class', 'd-none');
        $('#yreports').attr('class', 'd-none');

        $('#sdate').removeAttr('required', 'required');
        $('#edate').removeAttr('required', 'required');

        $('#month').attr('required', 'required');
        $('#year').attr('required', 'required');

        $('#ryear').removeAttr('required', 'required');
    });

    $('#yearly').click(function() {
        $('#yreports').removeAttr('class', 'd-none');
        $('#dreports').attr('class', 'd-none');
        $('#mreports').attr('class', 'd-none');

        $('#sdate').removeAttr('required', 'required');
        $('#edate').removeAttr('required', 'required');

        $('#month').removeAttr('required', 'required');
        $('#year').removeAttr('required', 'required');

        $('#ryear').attr('required', 'required');
    });
});
</script>