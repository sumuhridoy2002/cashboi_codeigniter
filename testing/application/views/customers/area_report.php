<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Area Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Area Reports</li>
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
                <h3 class="card-title">Area Reports</h3>
              </div>

              <div class="card-body">
                <div class="col-sm-12 col-md-12 col-12">
                  <form action="<?php echo base_url() ?>custTReport" method="get">
                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="form-group col-md-12 col-sm-12 col-12">
                        <b>
                          <input type="radio" name="reports" value="dailyReports" id="daily" required >&nbsp;&nbsp;Daily Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="reports" value="monthlyReports" id="monthly" required >&nbsp;&nbsp;Monthly Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="reports" value="yearlyReports" id="yearly" required >&nbsp;&nbsp;Yearly Reports
                        </b>
                      </div>

                      <div class="d-none" id="dreports">
                        <div class="row">
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Start Date *</label>
                            <input type="text" class="form-control datepicker" name="sdate" value="<?php echo date('d/m/Y') ?>" id="sdate" required="" >
                          </div>
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>End Date *</label>
                            <input type="text" class="form-control datepicker" name="edate" value="<?php echo date('d/m/Y') ?>" id="edate" required="" >
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <button type="submit" name="search" class="btn btn-info" style="margin-top: 30px;"><i class="fa fa-search-plus" ></i>&nbsp;Search</button>
                          </div>
                        </div>
                      </div>

                      <div class="d-none" id="mreports">
                        <div class="row">
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Month *</label>
                            <select class="form-control" name="month" id="month" required="" >
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
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Year *</label>
                            <select class="form-control" name="year" id="year" required="" >
                              <?php $d = date("Y"); ?>
                            <option value="">Select Year</option>
                            <?php for ($x = 2020; $x <= $d; $x++) { ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <button type="submit" name="search" class="btn btn-info" style="margin-top: 30px;"><i class="fa fa-search-plus" ></i>&nbsp;Search</button>
                          </div>
                        </div>
                      </div>

                      <div class="d-none" id="yreports">
                        <div class="row">
                          <div class="form-group col-md-3 col-sm-2 col-12">
                            <label>Year *</label>
                            <select class="form-control" name="ryear" id="ryear" required="" >
                              <?php $d = date("Y"); ?>
                            <option value="">Select Year</option>
                            <?php for ($x = 2020; $x <= $d; $x++) { ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-xs-12">
                            <button type="submit" name="search" class="btn btn-info" style="margin-top: 30px;"><i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;Search</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="col-sm-12 col-md-12 col-12">
                  <div id="print">
                    <div class="row" id="header" style="display: none" >
                      <?php if($company){ ?>
                      <div class="col-sm-2 col-md-2 col-2" style="margin-top: 30px;">
                        <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>"  style="width: 100%;">
                      </div>
                      <div class="col-sm-10 col-md-10 col-10">
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
                    </div><br>
                    <div class="col-sm-12 col-md-12 col-12">
                    <?php if(isset($_GET['search'])) { ?>
                      <?php if ($report == 'dailyReports') { ?>
                        <div class="box-header" style="text-align: center;">
                          <h3 class="box-title"><b>Area Reports in : <?php echo $sdate.' - '.$edate; ?></b></h3>
                        </div>
                      <?php } else if ($report == 'monthlyReports') { ?>
                        <div class="box-header" style="text-align: center;">
                          <h3 class="box-title"><b>Area Reports in : <?php echo $name.' '.$year; ?></b></h3>
                        </div>
                      <?php } else if ($report == 'yearlyReports') { ?>
                        <div class="box-header" style="text-align: center;">
                          <h3 class="box-title"><b>Area Reports in : <?php echo $year; ?></b></h3>
                        </div>
                      <?php } ?>
                    <?php } ?>
                    </div>
                    <div class="table-responsive">
                      <table id="example" class="table table-bordered" >
                        <thead>
                          <tr>
                            <th style="width: 5%;">#SN.</th>
                            <th>Area</th>
                            <th>Sales</th>
                            <th>Paid</th>
                            <th>Payment</th>
                            <th>Return</th>
                            <th style="width: 10%;">Due</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 0;
                          $tsa = 0;
                          $tpa = 0;
                          $pat = 0;
                          $tra = 0;
                          $tda = 0;
                          foreach($area as $value){
                          $i++;

                          $id = $value['trName'];

                          if(isset($_GET['search']))
                            {
                            $report = $_GET['reports'];
                            $data['report'] = $report;
                              //var_dump($data['report']); exit();
                            if($report == 'dailyReports')
                              {
                              $tsale = $this->db->select("
                                                    SUM(sales.totalAmount) as total,
                                                    SUM(sales.paidAmount) as ptotal,
                                                    SUM(sales.dueamount) as dtotal,
                                                    customers.trCode")
                                                ->FROM('sales')
                                                ->join('customers','customers.customerID = sales.customerID','left')
                                                ->WHERE('trCode',$id)
                                                ->where('saleDate >=', $sdate)
                                                ->where('saleDate <=', $edate)
                                                ->where('sales.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();

                              $tvpaid = $this->db->select("SUM(vaucher.totalamount) as total,customers.trCode")
                                                  ->FROM('vaucher')
                                                  ->join('customers','customers.customerID = vaucher.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                  ->where('voucherdate >=', $sdate)
                                                  ->where('voucherdate <=', $edate)
                                                  ->WHERE('vauchertype','Credit Voucher')
                                                  ->where('vaucher.compid',$_SESSION['compid'])
                                                  ->where('vaucher.status',1)
                                                  ->get()
                                                  ->row();

                              $treturn = $this->db->select("SUM(returns.paidAmount) as total")
                                                  ->FROM('returns')
                                                  ->join('customers','customers.customerID = returns.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                  ->where('returnDate >=', $sdate)
                                                  ->where('returnDate <=', $edate)
                                                  ->where('returns.compid',$_SESSION['compid'])
                                                  ->get()
                                                  ->row();
                              }
                            else if($report == 'monthlyReports')
                              {
                              $tsale = $this->db->select("
                                                    SUM(sales.totalAmount) as total,
                                                    SUM(sales.paidAmount) as ptotal,
                                                    SUM(sales.dueamount) as dtotal,
                                                    customers.trCode")
                                                ->FROM('sales')
                                                ->join('customers','customers.customerID = sales.customerID','left')
                                                ->WHERE('trCode',$id)
                                                ->where('MONTH(saleDate)',$month)
                                                ->where('YEAR(saleDate)',$year)
                                                ->where('sales.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();

                              $tvpaid = $this->db->select("SUM(vaucher.totalamount) as total,customers.trCode")
                                                  ->FROM('vaucher')
                                                  ->join('customers','customers.customerID = vaucher.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                ->where('MONTH(voucherdate)',$month)
                                                ->where('YEAR(voucherdate)',$year)
                                                ->WHERE('vauchertype','Credit Voucher')
                                                ->where('vaucher.compid',$_SESSION['compid'])
                                                ->where('vaucher.status',1)
                                                ->get()
                                                ->row();

                              $treturn = $this->db->select("SUM(returns.paidAmount) as total")
                                                  ->FROM('returns')
                                                  ->join('customers','customers.customerID = returns.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                ->where('MONTH(returnDate)',$month)
                                                ->where('YEAR(returnDate)',$year)
                                                ->where('returns.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();

                              }
                            elseif($report == 'yearlyReports')
                              {
                              $tsale = $this->db->select("
                                                    SUM(sales.totalAmount) as total,
                                                    SUM(sales.paidAmount) as ptotal,
                                                    SUM(sales.dueamount) as dtotal,
                                                    customers.trCode")
                                                ->FROM('sales')
                                                ->join('customers','customers.customerID = sales.customerID','left')
                                                ->WHERE('trCode',$id)
                                                ->where('YEAR(saleDate)',$year)
                                                ->where('sales.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();

                              $tvpaid = $this->db->select("SUM(vaucher.totalamount) as total,customers.trCode")
                                                  ->FROM('vaucher')
                                                  ->join('customers','customers.customerID = vaucher.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                ->where('YEAR(voucherdate)',$year)
                                                ->WHERE('vauchertype','Credit Voucher')
                                                ->where('vaucher.compid',$_SESSION['compid'])
                                                ->where('vaucher.status',1)
                                                ->get()
                                                ->row();

                              $treturn = $this->db->select("SUM(returns.paidAmount) as total")
                                                  ->FROM('returns')
                                                  ->join('customers','customers.customerID = returns.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                ->where('YEAR(returnDate)',$year)
                                                ->where('returns.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();
                              }
                            }
                          else
                            {
                            $tsale = $this->db->select("
                                                    SUM(sales.totalAmount) as total,
                                                    SUM(sales.paidAmount) as ptotal,
                                                    SUM(sales.dueamount) as dtotal,
                                                    customers.trCode")
                                                ->FROM('sales')
                                                ->join('customers','customers.customerID = sales.customerID','left')
                                                ->WHERE('trCode',$id)
                                                ->where('sales.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();

                            $tvpaid = $this->db->select("SUM(vaucher.totalamount) as total,customers.trCode")
                                                  ->FROM('vaucher')
                                                  ->join('customers','customers.customerID = vaucher.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                ->WHERE('vauchertype','Credit Voucher')
                                                ->where('vaucher.compid',$_SESSION['compid'])
                                                ->where('vaucher.status',1)
                                                ->get()
                                                ->row();

                            $treturn = $this->db->select("SUM(returns.paidAmount) as total")
                                                  ->FROM('returns')
                                                  ->join('customers','customers.customerID = returns.customerID','left')
                                                  ->WHERE('trCode',$id)
                                                  ->where('returns.compid',$_SESSION['compid'])
                                                ->get()
                                                ->row();
                            }
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['trName']; ?></td>
                            <td><?php echo number_format($tsale->total, 2); $tsa += $tsale->total; ?></td>
                            <td><?php echo number_format($tsale->ptotal, 2); $tpa += $tsale->total; ?></td>
                            <td><?php echo number_format($tvpaid->total, 2); $pat += $tvpaid->total; ?></td>
                            <td><?php echo number_format($treturn->total, 2); $tra += $treturn->total; ?></td>
                            <td>
                              <?php $tdue = ($tsale->dtotal)-($tvpaid->total+$treturn->total); ?>
                              <?php echo number_format($tdue, 2); $tda += $tdue; ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2" style="text-align: right;">Total Amount</th>
                            <th><?php echo number_format($tsa, 2); ?></th>
                            <th><?php echo number_format($tpa, 2); ?></th>
                            <th><?php echo number_format($pat, 2); ?></th>
                            <th><?php echo number_format($tra, 2); ?></th>
                            <th><?php echo number_format($tda, 2); ?></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px">
                    <a href="javascript:void(0)" onclick="printDiv('print')" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
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

    <script type="text/javascript">
      $(document).ready(function() {
        $('#daily').click(function(){
          $('#dreports').removeAttr('class','d-none');
          $('#mreports').attr('class','d-none');
          $('#yreports').attr('class','d-none');

          $('#sdate').attr('required','required');
          $('#edate').attr('required','required');
          
          $('#month').removeAttr('required','required');
          $('#year').removeAttr('required','required');
          
          $('#ryear').removeAttr('required','required');
          });

        $('#monthly').click(function(){
          $('#mreports').removeAttr('class','d-none');
          $('#dreports').attr('class','d-none');
          $('#yreports').attr('class','d-none');

          $('#sdate').removeAttr('required','required');
          $('#edate').removeAttr('required','required');
          
          $('#month').attr('required','required');
          $('#year').attr('required','required');
          
          $('#ryear').removeAttr('required','required');
          });

        $('#yearly').click(function(){
          $('#yreports').removeAttr('class','d-none');
          $('#dreports').attr('class','d-none');
          $('#mreports').attr('class','d-none');

          $('#sdate').removeAttr('required','required');
          $('#edate').removeAttr('required','required');
          
          $('#month').removeAttr('required','required');
          $('#year').removeAttr('required','required');
          
          $('#ryear').attr('required','required');
          });
        });
    </script>