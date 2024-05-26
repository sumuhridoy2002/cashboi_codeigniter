<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <?php
    $exception=$this->session->userdata('exception');
    if(isset($exception))
    {
    echo $exception;
    $this->session->unset_userdata('exception');
    } ?>
    
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Attendance Information</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>Hradmin/saved_employee_attendance" >
                  <div class="row">
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Attendance Date *</label>
                      <input type="text" name="date" class="form-control datepicker" value="<?php echo date('m/d/Y') ?>" required >
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-12">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 5%;">#SN.</th>
                          <th>Employee</th>
                          <th>In Time</th>
                          <th>Out Time</th>
                          <th style="width: 15%;">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach ($employee as $value) {
                        $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td>
                           <?php echo $value['employeeName'].' ( '.$value['emp_id'].' )'; ?>
                           <input type="hidden" class="form-control" name="employee[]" value="<?php echo $value['employeeID']; ?>" reqired >
                           <input type="hidden" class="form-control" name="empName[]" value="<?php echo $value['employeeName']; ?>" required >
                          </td>
                          <td><input type="time" class="form-control" name="inTime[]" placeholder="00:00:00"  ></td>
                          <td><input type="time" class="form-control" name="outTime[]" placeholder="00:00:00"  ></td>
                          <td>
                            <select name="empOffice[]" class="form-control" required >
                              <option value="Present">Present</option>
                              <option value="Absence">Absence</option>
                              <option value="Leave">Leave</option>
                              <option value="Late">Late</option>
                            </select>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top:20px; text-align: center;">
                    <button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                    <a href="<?php echo site_url() ?>empAttend" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>