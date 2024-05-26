<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Sales Target Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Sales Target Reports</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <?php
    $exception = $this->session->userdata('exception');
    if(isset($exception))
    {
    echo $exception;
    $this->session->unset_userdata('exception');
    } ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Sales Target Reports</h3>
              </div>

              <div class="card-body">
                <div class="col-sm-12 col-md-12 col-12">
                  <form action="<?php echo base_url() ?>empTSale" method="get">
                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="form-group col-md-12 col-sm-12 col-12">
                        <b>
                          <input type="radio" name="reports" value="monthlyReports" id="monthly" required >&nbsp;&nbsp;Monthly Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="reports" value="yearlyReports" id="yearly" required >&nbsp;&nbsp;Yearly Reports
                        </b>
                      </div>

                      <div class="d-none" id="mreports">
                        <div class="row">
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Select Month *</label>
                            <select class="form-control" name="month" id="month" required="" >
                              <option value="">Select One</option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Select Year *</label>
                            <select class="form-control" name="year" id="year" required="" >
                              <?php $d = date("Y"); ?>
                              <option value="">Select One</option>
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
                          <div class="form-group col-md-3 col-sm-3 col-12">
                            <label>Select Year *</label>
                            <select class="form-control" name="ryear" id="ryear" required="" >
                              <?php $d = date("Y"); ?>
                            <option value="">Select One</option>
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
                
                <?php if(isset($_GET['search'])) { ?>
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
                    
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 5%;">#SN.</th>
                          <th>Month</th>
                          <th>Employee</th>
                          <th>Area</th>
                          <th>Notes</th>
                          <th>Target</th>
                          <th style="width: 10%;">Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach($target as $value) {
                        $i++;
                        
                        $id = $value['uid'];
    
                        if(isset($_GET['search']))
                          {
                          $report = $_GET['reports'];
                          $data['report'] = $report;
                          //var_dump($data['report']); exit();
                          if($report == 'monthlyReports')
                            {
                            $tsale = $this->db->select("SUM(totalAmount) as total")
                                            ->FROM('sales')
                                            ->WHERE('regby',$id)
                                            ->where('MONTH(saleDate)',$month)
                                            ->where('YEAR(saleDate)',$year)
                                            ->get()
                                            ->row();
    
                            }
                          else if($report == 'yearlyReports')
                            {
                            $tsale = $this->db->select("SUM(totalAmount) as total")
                                            ->FROM('sales')
                                            ->WHERE('regby',$id)
                                            ->where('YEAR(saleDate)',$year)
                                            ->get()
                                            ->row();
                            }
                          }
                        else
                          {
                          $tsale = $this->db->select("SUM(totalAmount) as total")
                                          ->FROM('sales')
                                          ->WHERE('regby',$id)
                                          ->get()
                                          ->row();
                          }
                        ?>
                        <tr class="gradeX">
                          <td><?php echo $i; ?></td>
                          <td>
                            <?php
                            $month = $value['month'];
                            if($month == 1)
                              {
                              $name = 'January';
                              }
                            elseif($month == 2)
                              {
                              $name = 'February';
                              }
                            elseif($month == 3)
                              {
                              $name = 'March';
                              }
                            elseif($month == 4)
                              {
                              $name = 'April';
                              }
                            elseif($month == 5)
                              {
                              $name = 'May';
                              }
                            elseif($month == 6)
                              {
                              $name = 'June';
                              }
                            elseif($month == 7)
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
                            <?php echo $name.' '.$value['year']; ?>
                          </td>
                          <td><?php echo $value['employeeName']; ?></td>
                          <td><?php echo $value['trCode']; ?></td>
                          <td><?php echo $value['notes']; ?></td>
                          <td><?php echo number_format($value['tAmount'], 2); ?></td>
                          <td><?php echo number_format($tsale->total, 2); ?></td>
                        </tr>   
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px">
                  <a href="javascript:void(0)" onclick="printDiv('print')" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#monthly').click(function(){
          $('#mreports').removeAttr('class','d-none');
          $('#yreports').attr('class','d-none');
          
          $('#month').attr('required','required');
          $('#year').attr('required','required');
          
          $('#ryear').removeAttr('required','required');
          });

        $('#yearly').click(function(){
          $('#yreports').removeAttr('class','d-none');
          $('#mreports').attr('class','d-none');
          
          $('#month').removeAttr('required','required');
          $('#year').removeAttr('required','required');
          
          $('#ryear').attr('required','required');
          });
        });
    </script>