<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Payment Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Payment Reports</li>
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
                <h3 class="card-title">Employee Payment Reports</h3>
              </div>

              <div class="card-body">
                <div class="col-sm-12 col-md-12 col-12">
                  <form action="<?php echo base_url() ?>employeePayReport" method="get">
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
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <label>Start Date *</label>
                            <input type="text" class="form-control datepicker" name="sdate" value="<?php echo date('d-m-Y') ?>" id="sdate" required="" >
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <label>End Date *</label>
                            <input type="text" class="form-control datepicker" name="edate" value="<?php echo date('d-m-Y') ?>" id="edate" required="" >
                          </div>
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Employee *</label>
                            <select class="form-control" name="demployee" id="demployee" required="" >
                              <option value="All">All</option>
                              <?php foreach($employee as $value){ ?>
                              <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <button type="submit" name="search" class="btn btn-info" style="margin-top: 30px;"><i class="fa fa-search-plus" ></i>&nbsp;Search</button>
                          </div>
                        </div>
                      </div>

                      <div class="d-none" id="mreports">
                        <div class="row">
                          <div class="form-group col-md-2 col-sm-2 col-12">
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
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <label>Year *</label>
                            <select class="form-control" name="year" id="year" required="" >
                              <?php $d = date("Y"); ?>
                            <option value="">Select Year</option>
                            <?php for ($x = 2020; $x <= $d; $x++) { ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Employee *</label>
                            <select class="form-control" name="memployee" id="memployee" required="" >
                              <option value="All">All</option>
                              <?php foreach($employee as $value){ ?>
                              <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
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
                          <div class="form-group col-md-2 col-sm-2 col-12">
                            <label>Year *</label>
                            <select class="form-control" name="ryear" id="ryear" required="" >
                              <?php $d = date("Y"); ?>
                            <option value="">Select Year</option>
                            <?php for ($x = 2020; $x <= $d; $x++) { ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php } ?>
                            </select>
                            </div>

                            <div class="form-group col-md-2 col-sm-2 col-12">
                              <label>Employee *</label>
                                <select class="form-control" name="yemployee" id="yemployee" required="" >
                                <option value="All">All</option>
                                <?php foreach($employee as $value){ ?>
                                <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Employee *</label>
                            <select class="form-control" name="yemployee" id="yemployee" required="" >
                              <option value="All">All</option>
                              <?php foreach($employees as $value){ ?>
                              <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
                              <?php } ?>
                            </select>
                          </div> -->
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
                          <h3 class="box-title"><b>Employee Payment Reports in : <?php echo $sdate.' - '.$edate; ?></b></h3>
                        </div>
                      <?php } else if ($report == 'monthlyReports') { ?>
                        <div class="box-header" style="text-align: center;">
                          <h3 class="box-title"><b>Employee Payment Reports in : <?php echo $year; ?></b></h3>
                        </div>
                      <?php } else if ($report == 'yearlyReports') { ?>
                        <div class="box-header" style="text-align: center;">
                          <h3 class="box-title"><b>Employee Payment Reports in : <?php echo $year; ?></b></h3>
                        </div>
                      <?php } ?>
                    <?php } ?>
                    </div>
                    <div class="">
                    <table id="example" class="table table-bordered table-responsive" style="width: 100%; font-size:14px;">
                        <thead>
                          <tr>
                          <th style="width: 5%;">#SN.</th>
                            <th style="width: 15%;">EMPLOYEE NAME</th>
                            <th style="width: 15%;">MONTH</th>
                            <th style="width: 15%;">YEAR</th>
                            <th style="width: 20%;">ACCOUNT TYPE</th>
                            <th style="width: 15%;">TOTAL AMOUNT</th>
                            <th style="width: 15%;">PAID AMOUNT</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                    $i = 0;
                    $toa = 0;
                    $tsa = 0;
                    $tpa = 0;
                    $pat = 0;
                    $tra = 0;
                    $tda = 0;
                    foreach ($employees as $key => $value) {
                    $i++;
                    ?>
                    <tr class="gradeX">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['employeeName']; ?></td>
                      <td>
                        <?php
                        $month = $value['month'];
                        if($month == 01)
                          {
                          $name = 'January';
                          }
                        elseif($month == 02)
                          {
                          $name = 'February';
                          }
                        elseif($month == 03)
                          {
                          $name = 'March';
                          }
                        elseif($month == 04)
                          {
                          $name = 'April';
                          }
                        elseif($month == 05)
                          {
                          $name = 'May';
                          }
                        elseif($month == 06)
                          {
                          $name = 'June';
                          }
                        elseif($month == 07)
                          {
                          $name = 'July';
                          }
                        elseif($month == 8)
                          {
                          $name = 'August';
                          }
                        elseif($month == 9)
                          {
                          $name = 'September';
                          }
                        elseif($month == 10)
                          {
                          $name = 'October';
                          }
                        elseif($month == 11)
                          {
                          $name = 'November';
                          }
                        else
                          {
                          $name = 'December';
                          }
                        ?>
                        <?php echo $name; ?>
                      </td>
                      <td><?php echo $value['year']; ?></td>
                      <td><?php echo $value['accountType']; ?></td>
                      <td><?php echo number_format($value['salary'],2); $toa += $value['salary']?></td>
                      <td><?php echo number_format($value['paid'],2); $tsa += $value['paid'] ?></td>
                    </tr>   
                    <?php } ?> 
                      </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5" style="text-align: right;">Total Amount</th>
                            <th><?php echo number_format($toa, 2); ?></th>
                            <th><?php echo number_format($tsa, 2); ?></th>
                          </tr>
                        </tfoot>
                      </table>
                      <?php echo $pagination_html; ?>
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
          $('#demployee').attr('required','required');

          
          $('#month').removeAttr('required','required');
          $('#year').removeAttr('required','required');
          $('#yemployee').removeAttr('required','required');

          
          $('#ryear').removeAttr('required','required');
          $('#yemployee').removeAttr('required','required');
          });

        $('#monthly').click(function(){
          $('#mreports').removeAttr('class','d-none');
          $('#dreports').attr('class','d-none');
          $('#yreports').attr('class','d-none');

          $('#sdate').removeAttr('required','required');
          $('#edate').removeAttr('required','required');
          $('#demployee').removeAttr('required','required');

          
          $('#month').attr('required','required');
          $('#year').attr('required','required');
          $('#memployee').attr('required','required');

          
          $('#ryear').removeAttr('required','required');
          $('#yemployee').removeAttr('required','required');
          });

        $('#yearly').click(function(){
          $('#yreports').removeAttr('class','d-none');
          $('#dreports').attr('class','d-none');
          $('#mreports').attr('class','d-none');

          $('#sdate').removeAttr('required','required');
          $('#edate').removeAttr('required','required');
          $('#demployee').removeAttr('required','required');

          
          $('#month').removeAttr('required','required');
          $('#year').removeAttr('required','required');
          $('#memployee').removeAttr('required','required');

          
          $('#ryear').attr('required','required');
          $('#yemployee').attr('required','required');

          });
        });
    </script>