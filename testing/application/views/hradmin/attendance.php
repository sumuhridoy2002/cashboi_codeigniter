<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Attendance List</h3>
                <a href="<?php echo site_url() ?>newempAttend" class="btn btn-primary" style="float: right;" ><i class="fa fa-plus"></i> New Attendance</a>
                <!--<button type="button" class="btn btn-primary add_customer" data-toggle="modal" data-target=".bs-example-modal-add_customer" style="float: right;" ><i class="fa fa-plus"></i> New Emp. Attendance</button>-->
              </div>
              <div class="card-body">
                <table id="example" class="table table-responsive table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#SN.</th>
                      <th>Date</th>
                      <th>Employee</th>
                      <th>Department</th>
                      <th>In</th>
                      <th>Out</th>
                      <th style="width: 15%;">Status</th>
                      <!--<th>Out</th>-->
                      <!--<th>Status Out</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($attendance as $value) {
                    $i++;

                    $atime_in = strtotime($value->ain);
                    $atime_out = strtotime($value->aout);
                    $ostime = strtotime($value->off_start);
                    $oetime = strtotime($value->off_end);
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($value->adate)); ?></td>
                      <td><?php echo $value->employeeName.' ( '.$value->emp_id.' )'; ?></td>
                      <td><?php echo $value->dept_name; ?></td>
                      <td><?php echo $value->ain; ?></td>
                      <?php if($value->aout == '00:00:00'){ ?>
                        <td>    
                          <form action="<?php echo base_url().'Hradmin/update_emp_attendance/'.$value->autoid; ?>" method="post">
                            <div class="input-group margin">
                              <input type="time" class="form-control" name="atime_out" placeholder="00:00:00" required >
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Out</button>
                              </div>
                            </div>
                          </form>
                        </td>
                      <?php } else { ?>
                        <td><?php echo $value->aout; ?></td>
                      <?php } ?>
                      <td><?php echo $value->oAddress; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <div class="modal fade bs-example-modal-add_customer" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" >
          <div class="modal-header">
            <h4 class="modal-title">Employee Attendance</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('Hradmin/save_emp_attendance');?>" method="post">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label>Select Employee</label>
                <select name="employee" class="form-control" required >
                  <option value="">Select</option>
                  <?php foreach($employee as $value){ ?>
                  <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName'].' ( '.$value['emp_id'].' )'; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>IN Time</label>
                <!--<input type="time" id="time-input" name="time">-->
                <input type="time" class="form-control timepicker" name="atime_in" placeholder="00:00:00" required >
              </div>
              <div class="form-group">
                <label>Office Address</label>
                <input type="text" class="form-control" name="oAddress" placeholder="Office Address" required >
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<?php $this->load->view('footer/footer'); ?>