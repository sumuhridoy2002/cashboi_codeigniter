<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff / Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Staff / Employee</li>
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
                <h3 class="card-title">Staff / Employee List</h3>
                <button type="button" class="btn btn-primary add_emp" data-toggle="modal" data-target=".bs-example-modal-aemp" style="float: right" ><i class="fa fa-plus"></i> New Staff</button>
              </div>

              <div class="card-body">
                <table id="example" class="table table-responsive table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>ID</th>
                      <th>IMAGE</th>
                      <th>NAME</th>
                      <th>MOBILE</th>
                      <th>EMAIL</th>
                      <th>ADDRESS</th>
                      <!--<th>JOIN DATE</th>-->
                      <!--<th>SALARY</th>-->
                      <th>STATUS</th>
                      <th style="width: 8%;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($employee as $value) {
                    $i++;
                    ?>
                    <tr class="gradeX">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['emp_id']; ?></td>
                      <td>
                          <?php if ($value['image']) { ?>
                                <img src="<?php echo base_url('upload/employee'); ?>/<?php echo $value['image']; ?>" width="60px" height="50px">
                            <?php } ?>
                      </td>
                      <td><?php echo $value['employeeName']; ?></td>
                      <td><?php echo $value['phone']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td><?php echo $value['empaddress']; ?></td>
                      <!--<td><?php echo date('d-m-Y', strtotime($value['joiningDate'])); ?></td>-->
                      <!--<td><?php echo number_format($value['salary'], 2); ?></td>-->
                      <td><?php echo $value['status']; ?></td>        
                      <td>
                        <button type="button" class="btn btn-success btn-xs emp_edit" data-toggle="modal" data-target=".bs-example-modal-eemp" data-id="<?php echo $value['employeeID']; ?>" ><i class="fa fa-edit"></i></button>
                        <a class=" btn btn-danger btn-xs" href="<?php echo site_url('employee/delete_Employee').'/'.$value['employeeID'] ?>" onclick="return confirm('Are you sure you want to Delete this Employee ?');" ><i class="fa fa-trash"></i></a>
                      </td>
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

    <div class="modal fade bs-example-modal-aemp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Staff Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('Employee/save_employee');?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="row">
                 
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Staff / Employee Name *</label>
                  <input type="text" class="form-control" name="employeeName" placeholder="Staff Name" required>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Department</label>
                  <select name="dpt_id" id="department" class="form-control"  >
                    <option value="">Select One</option>
                    <?php foreach ($dept as $value) { ?>
                    <option value="<?php echo $value['dpt_id']; ?>"><?php echo $value['dept_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Address *</label>
                  <input type="text" class="form-control" name="empaddress" placeholder="Address" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Contact Number *</label>
                  <input type="text" class="form-control" name="phone" placeholder="Mobile Number *" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="example@gmail.com" >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Joining Date *</label>
                  <input type="text" class="form-control datepicker" name="joiningDate" placeholder="Joining Date" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Salary</label>
                  <input type="text" class="form-control" name="salary" placeholder="Salary" >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>NID Number</label>
                  <input type="text" class="form-control" name="nid" placeholder="NID Number" >
                </div>
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label>Staff Image <small style="color: red; font-size:10px">( Maximum image size 500kb and png, jpg format )</small></label>
                    <input type="file" name="userfile" onchange="previewImage(event)">
                </div>
                <div id="image-preview" class="col-md-6 col-sm-12 col-12" ></div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-eemp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" >
          <div class="modal-header">
            <h4 class="modal-title" >Update Staff Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('Employee/update_Employee');?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="row">
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Staff / Employee Name *</label>
                  <input type="text" class="form-control" name="employeeName" id="empname" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Department</label>
                  <select name="dpt_id" id="empdept" class="form-control"  >
                    <option value="">Select One</option>
                    <?php foreach ($dept as $key => $value) { ?>
                    <option value="<?php echo $value['dpt_id']; ?>"><?php echo $value['dept_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Address *</label>
                  <input type="text" id="empaddress" class="form-control" name="empaddress" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Contact Number *</label>
                  <input type="text" id="mobile" class="form-control" name="phone" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" id="empemail" name="email" >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Joining Date *</label>
                  <input type="text" class="form-control datepicker" id="jdate" name="joiningDate" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Salary</label>
                  <input type="text" class="form-control" name="salary" id="salary" >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>NID</label>
                  <input type="text" class="form-control" name="nid" id="nid">
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label>Staff Image <small style="color: red; font-size:10px">( Maximum image size 500kb and png, jpg format )</small></label>
                    <input type="file" name="userfile" onchange="previewImage2(event)">
                </div>
                <div id="image-preview2" class="col-md-6 col-sm-12 col-12" >
                    <img id="saved-image-preview" src="" alt="Staff Image" style="width: 100px">
                </div>

                    
                
                <div class="form-group col-md-6 col-sm-6 col-12" >
                  <label>Status</label>
                  <select class="form-control" name="status" id="status" >
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
              </div>
              <input type="hidden" id="emp_id" name="emp_id" >
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
<?php $this->load->view('footer/footer'); ?>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image-preview');
                output.innerHTML = '<img src="' + reader.result + '" alt="Staff Image" style=" width:100px">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        function previewImage2(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image-preview2');
                output.innerHTML = '<img src="' + reader.result + '" alt="Staff Image" style=" width:100px">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".emp_edit").click(function(){
          var catid = $(this).data('id');
          //alert(l_id);
          $('input[name="emp_id"]').val(catid);
          });

        $('.emp_edit').click(function(){
          var id = $(this).data('id');
            //alert(id);
          var url = '<?php echo base_url() ?>Employee/get_emp_data';
            //alert(url);
          $.ajax({
            method: 'POST',
            url     : url,
            dataType: 'json',
            data    : {'id' : id},
            success:function(data){ 
              //alert(data);
              var HTML = data["employeeName"];
              var HTML2 = data["empaddress"];
              var HTML3 = data["phone"];
              var HTML4 = data["email"];
              var HTML5 = data["joiningDate"];
              var HTML6 = data["salary"];
              var HTML7 = data["nid"];
              var HTML8 = data["status"];
              var HTML9 = data["dpt_id"];
              var HTML10 = data["image"];
             
              $("#empname").val(HTML);
              $("#empaddress").val(HTML2);
              $("#mobile").val(HTML3);
              $("#empemail").val(HTML4);
              $("#jdate").val(HTML5);
              $("#salary").val(HTML6);
              $("#nid").val(HTML7);
              $("#status").val(HTML8);
              $("#empdept").val(HTML9);
              var savedImageUrl = '<?php echo base_url("upload/employee/"); ?>' + HTML10;
            $("#saved-image-preview").attr("src", savedImageUrl);
              },
            error:function(){
              alert('error');
              }
            });
          });
        });
    </script>