<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Target</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Target</li>
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
          <div class="col-md-8 col-sm-8 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Target List</h3>
              </div>

              <div class="card-body">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#SN.</th>
                      <th>Month</th>
                      <th>Employee</th>
                      <th>Target</th>
                      <th>Notes</th>
                      <th style="width: 13%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach($target as $value) {
                    $i++;
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
                      <td><?php echo number_format($value['tAmount'], 2) ?></td>
                      <td><?php echo $value['notes']; ?></td>     
                      <td>
                        <button type="button" class="btn btn-primary btn-xs editTarget" data-toggle="modal" data-target=".bs-example-modal-editTarget" data-id="<?php echo $value['etid']; ?>" onclick="document.getElementById('editTarget').style.display='block'" ><i class="fa fa-edit"></i></button>
                        <a class=" btn btn-danger btn-xs" href="<?php echo site_url('Employee/delete_emp_target').'/'.$value['etid'] ?>" onclick="return confirm('Are you sure you want to Delete this Emp. Target ?');"  ><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>   
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade bs-example-modal-editTarget" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title">Emp Target Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="<?php echo base_url('Employee/update_emp_target'); ?>" method="post">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Select Month *</label>
                    <select class="form-control" name="month" id="month" required >
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
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Select Year *</label>
                    <select class="form-control" name="year" id="year" required >
                      <?php $d = date("Y"); ?>
                      <option value="">Select One</option>
                      <?php for ($x = 2020; $x <= $d; $x++) { ?>
                      <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Select Employee *</label>
                    <select class="form-control select2" name="employee" id="employee" required >
                      <option value="">Select One</option>
                      <?php foreach($employee as $value){ ?>
                      <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
                      <?php } ;?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Target Amount *</label>
                    <input type="text" class="form-control" name="tAmount" id="tAmount" required >
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Notes</label>
                    <input type="text" class="form-control" name="notes" id="notes" placeholder="If have any notes" >
                  </div>
                  <input type="hidden" id="etid" name="etid" required >
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
          <div class="col-md-4 col-sm-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Emp Target Information</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo site_url("Employee/save_emp_target"); ?>">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Select Month *</label>
                    <select class="form-control" name="month" required >
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
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Select Year *</label>
                    <select class="form-control" name="year" required >
                      <?php $d = date("Y"); ?>
                      <option value="">Select One</option>
                      <?php for ($x = 2020; $x <= $d; $x++) { ?>
                      <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Select Employee *</label>
                    <select class="form-control select2" name="employee" required >
                      <option value="">Select One</option>
                      <?php foreach($employee as $value){ ?>
                      <option value="<?php echo $value['employeeID']; ?>"><?php echo $value['employeeName']; ?></option>
                      <?php } ;?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Target Amount *</label>
                    <input type="text" class="form-control" name="tAmount" placeholder="Amount" required >
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Notes</label>
                    <input type="text" class="form-control" name="notes" placeholder="If have any notes" >
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" >
                    <button type="submit" class="form-control btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
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

    <script type="text/javascript">
      $(document).ready(function(){
        $(".editTarget").click(function(){
          var etid = $(this).data('id');
          //alert(l_id);
          $('input[name="etid"]').val(etid);
          });

        $('.editTarget').click(function(){
          var id = $(this).data('id');
            //alert(id);
          var url = '<?php echo base_url() ?>Employee/get_emp_target_data';
            //alert(url);
          $.ajax({
            method: 'POST',
            url     : url,
            dataType: 'json',
            data    : {'id' : id},
            success:function(data){ 
              //alert(data);
              var HTML = data["month"];
              var HTML2 = data["year"];
              var HTML3 = data["empid"];
              var HTML4 = data["tAmount"];
              var HTML5 = data["notes"];
                //alert(HTML);
              $("#month").val(HTML);
              $("#year").val(HTML2);
              $("#employee").val(HTML3);
              $("#tAmount").val(HTML4);
              $("#notes").val(HTML5);
              },
            error:function(){
              alert('error');
              }
            });
          });
        });
    </script>