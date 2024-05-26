<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

<style>
  .dataTables_paginate {
    display: none;
  }

  .pagination {
    float: inline-end;
  }

  .paginated {
    padding: 10px;
    border: 1px solid gray;
    font-weight: bolder;
  }

  .paginated.active {
    background: #f5c593;
  }
</style>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff / Employee Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Staff / Employee Payments</li>
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
                <h3 class="card-title">Staff / Employee Payment Lists</h3>
                <a href="<?php echo site_url('newempPayment') ?>" class="btn btn-primary" style="float: right" ><i class="fa fa-plus"></i> New Payment</a>
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>EMPLOYEE NAME</th>
                      <th>MONTH</th>
                      <th>YEAR</th>
                      <th>TOTAL AMOUNT</th>
                      <th>PAID AMOUNT</th>
                      <th>ACCOUNT TYPE</th>
                      <th>NOTE</th>
                      <th>OPTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
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
                      <td><?php echo $value['salary']; ?></td>
                      <td><?php echo $value['paid']; ?></td>
                      <td><?php echo $value['accountType']; ?></td>
                      <td><?php echo $value['note']; ?></td>
                      <td>
                        <a class=" btn btn-success btn-xs" href="<?php echo site_url('empPaymentDetails').'/'.$value['empPid'] ?>" ><i class="fa fa-eye"></i> </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('editEmpPayment').'/'.$value['empPid']; ?>"><i class="fa fa-edit"></i></a>

                        <a class="btn btn-danger btn-xs" href="<?php echo site_url('Employee_payment/delete_salary').'/'.$value['empPid']; ?>" onclick="return confirm('Are you sure you want to Delete this Salary ?');" ><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>   
                    <?php } ?> 
                  </tbody>
                </table>
                <!-- Pagination -->
                <?php echo $pagination_html; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>

<?php $this->load->view('footer/footer'); ?>