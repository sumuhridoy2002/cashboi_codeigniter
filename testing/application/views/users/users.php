<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users List</h3>
                <button type="button" class="btn btn-primary add_user" data-toggle="modal" data-target=".bs-example-modal-auser" style="float: right" ><i class="fa fa-plus"></i> New User</button>
              </div>

              <div class="card-body">
                <table id="example" class="table table-responsive table-bordered" >
                  <thead>
                    <tr style="text-transform:uppercase;text-align:center;">
                      <th style="width: 5%;">SN</th>
                      <th style="width: 25%;">EMPLOYEE  NAME</th>
                      <th style="width: 25%;">EMAIL</th>
                      <th style="width: 15%;">MOBILE</th>
                      <th style="width: 10%;">ROLE</th>
                      <th style="width: 10%;">STATUS</th>
                      <th style="width: 10%;">OPTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($users as $value) {
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td><?php echo $value['mobile']; ?></td>
                      <td><?php echo $value['lavelName']; ?></td>
                      <td><?php echo $value['status']; ?></td>        
                      <td>
                        <button type="button" class="btn btn-success btn-xs user_edit" data-toggle="modal" data-target=".bs-example-modal-euser" data-id="<?php echo $value['uid']; ?>" ><i class="fa fa-edit"></i></button>
                        <a class=" btn btn-danger btn-xs" href="<?php echo site_url('User/delete_user').'/'.$value['uid']; ?>" onclick="return confirm('Are you sure you want to delete this user ?');" ><i class="fa fa-trash"></i></a>
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

    <div class="modal fade bs-example-modal-auser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" >
          <div class="modal-header">
            <h4 class="modal-title" >Add New User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('User/save_user');?>" method="post">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>Employee Name *</label>
                <select class="form-control select2" name="emp" required >
                  <option value="">Select One</option>
                  <?php foreach ($emp as $value){ ?> 
                  <option value="<?php echo $value->employeeID; ?>"><?php echo $value->employeeName; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label>User Role *</label>
                <select class="form-control select2" name="utype" required >
                  <option value="">Select type</option>
                  <?php foreach ($userrole as $value) { ?>
                  <option value="<?php echo $value['ax_id']; ?>"><?php echo $value['lavelName']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label>Password *</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required >
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

    <div class="modal fade bs-example-modal-euser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" > Update Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('User/update_User');?>" method="post">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>Employee Name *</label>
                <input type="text" class="form-control" id="empname" readonly >
              </div>
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>User Role *</label>
                <select class="form-control" name="utype" required id="role" >
                  <option value="">Select One</option>
                  <?php foreach ($userrole as $value) { ?>
                  <option value="<?php echo $value['ax_id']; ?>"><?php echo $value['lavelName']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-12">
                  <label>Password *</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                      </button>
                    </div>
                  </div>
                </div>
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>Status</label>
                <select class="form-control" name="status" id="status" >
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <input type="hidden" id="user_id" name="user_id" >
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

</div>

<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".user_edit").click(function(){
          var catid = $(this).data('id');
          //alert(l_id);
          $('input[name="user_id"]').val(catid);
          });

        $('.user_edit').click(function(){
          var id = $(this).data('id');
          //alert(id);
          var url = '<?php echo base_url() ?>User/get_user_data';
            //alert(url);
          $.ajax({
            method: 'POST',
            url     : url,
            dataType: 'json',
            data    : {'id' : id},
            success:function(data){ 
                //alert(data);
              var HTML = data["name"];
              var HTML2 = data["userrole"];
              var HTML1 = data["password"];
              var HTML3 = data["status"];
              //alert(HTML);
              $("#empname").val(HTML);
              $("#role").val(HTML2);
              $("#password").val(HTML1);
              $("#status").val(HTML3);
              },
            error:function(){
              alert('error');
              }
            });
          });
        });
    </script>
<script>
  var passwordInput = document.getElementById("password");
  var toggleButton = document.getElementById("togglePassword");
  var eyeIcon = document.getElementById("eyeIcon");

  toggleButton.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    }
  });
</script>