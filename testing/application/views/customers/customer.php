<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3 class="card-title">Customer List</h3>
                  <!-- <a class="btn btn-primary" href="<?php// echo site_url('Customer/export_action'); ?>"
                      style="float: right;padding-right:20px;"><i class="far fa-file-excel"></i> Export
                      Excel</a> -->
                <button type="button" class="btn btn-primary add_customer" data-toggle="modal" data-target=".bs-example-modal-add_customer" style="float: right; margin-right: 10px;"><i class="fa fa-plus"></i> NEW CUSTOMER</button>
                <button type="button" class="btn btn-success template" data-toggle="modal" data-target=".bs-example-modal-template" style="float: right; margin-right: 10px;"><i class="far fa-file-excel"></i> IMPORT</button>
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered table-striped" >
                  <thead>
                      <!--<?php //var_dump($customer);exit(); ?>-->
                    <tr>
                      <th style="width: 5%;">SN</th>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>COMPANY</th>
                      <th>Type</th>
                      <th>MOBILE</th>
                      <!--<th>Email</th>-->
                      <th>ADDRESS</th>
                      <!--<th>PREVIOUS</th>-->
                      <!--<th>TERRITORY</th>-->
                      <th>STATUS </th>
                      <th style="width: 10%;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($customer as $value){
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><a href="<?php echo site_url('customerView').'/'.$value['customerID']; ?>"><?php echo $value['cus_id']; ?></td>
                      <!--<td><?php //echo $value['cus_id']; ?></td>-->
                      <td><?php echo $value['customerName']; ?></td>
                      <td><?php echo $value['custCompany']; ?></td>
                      <td>
                        <?php if($value['custType'] == 2) { ?>
                        <?php echo 'Wholesale'; ?>
                        <?php } else{ ?> 
                        <?php echo 'Retail Customer'; ?>
                        <?php } ?> 
                      </td>
                      <td><?php echo $value['mobile']; ?><br><?php echo $value['custMobile']; ?></td>
                      <!--<td><?php echo $value['email']; ?></td>-->
                      <?php if($value['address']){?>
                      <td><?php echo $value['address']; ?></td>
                      <?php }else{?>
                      <td></td>
                      <?php }?>
                      <!--<td><?php echo number_format($value['balance'], 2); ?></td>-->
                      <!--<td><?php echo $value['trCode']; ?></td>-->
                      <td><?php echo $value['status']; ?></td>
                      <td>
                        <a class="btn btn-xs" style="background-color: #81e565;" href="<?php echo base_url().'customerView/'.$value['customerID']; ?>"><i class="fa fa-eye"></i></a>
                        <button type="button" class="btn btn-primary btn-xs customer_edit" data-toggle="modal" data-target=".bs-example-modal-customer_edit" data-id="<?php echo $value['customerID']; ?>" id="<?php echo $value['customerID']; ?>" onclick="document.getElementById('customer_edit').style.display='block'"><i class="fa fa-edit"></i></button>
                        <a class="btn btn-danger btn-xs" href="<?php echo site_url('Customer/delete_customer').'/'.$value['customerID']; ?>" onclick="return confirm('Are you sure you want to Delete this Customer ?');" ><i class="fa fa-trash"></i></a>
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

  <div class="modal fade bs-example-modal-add_customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Customer Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('Customer/save_customer'); ?>" method="post">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label>Customer Name *</label>
                  <input type="text" class="form-control" name="customerName" placeholder="Customer Name" required>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label>Customer Company </label>
                  <input type="text" class="form-control" name="custCompany" placeholder="Customer Company"  >
                </div>
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Contact Number </label>
                  <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" onkeypress="return isNumberKey(event)"   >
                </div>
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>2nd Contact Number</label>
                  <input type="text" class="form-control" name="custMobile" placeholder="Mobile Number" onkeypress="return isNumberKey(event)"  >
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label>Email ID</label>
                  <input type="text" class="form-control" name="email" placeholder="E-mail" >
                </div>
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Address </label>
                  <input type="text" class="form-control" name="address" placeholder="Address" >
                </div>
                <!--<div class="form-group col-md-4 col-sm-4 col-xs-12">-->
                <!--  <label>Select Division </label>-->
                <!--  <div class="form-group col-md-12 col-sm-12 col-xs-12">-->
                <!--    <select class="form-control division select2" name="division">-->
                <!--      <option value="">Select One</option>-->
                <!--      <?php foreach($division as $value){ ?>-->
                <!--      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>-->
                <!--      <?php } ?>-->
                <!--    </select>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="form-group col-md-4 col-sm-4 col-xs-12">-->
                <!--  <label>Select District </label>-->
                <!--  <select class="form-control district" name="district" id="district">-->
                <!--    <option value="">Select One</option>-->
                <!--  </select>-->
                <!--</div>-->
                <!--<div class="form-group col-md-4 col-sm-4 col-xs-12">-->
                <!--  <label>Select Upazila </label>-->
                <!--  <select class="form-control upazila" name="upazila" id="upazila">-->
                <!--    <option value="">Select One</option>-->
                <!--  </select>-->
                <!--</div>-->
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Notes</label>
                  <input type="text" class="form-control" name="custNotes" placeholder="If have any notes">
                </div>
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Opening Balance</label>
                  <input type="text" class="form-control" name="balance" placeholder="Previous Due">
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label>Credit Limit</label>
                  <input type="text" class="form-control" name="custLimit" placeholder="Amount">
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                  <label>Select Territory </label>
                  <select class="form-control" name="trCode" >
                    <option value="">Select One</option>
                    <?php foreach($territory as $value){ ?>
                    <option value="<?php echo $value['trName']; ?>"><?php echo $value['trName']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!--<div class="form-group col-md-4 col-sm-4 col-12">-->
                <!--  <label>Customer Terms </label>-->
                <!--  <select class="form-control" name="custTerms"  >-->
                <!--    <option value="">Select One</option>-->
                <!--    <option value="0">Cash One Delivery</option>-->
                <!--    <option value="7">7 Days</option>-->
                <!--    <option value="15">15 Days</option>-->
                <!--    <option value="30">30 Days</option>-->
                <!--    <option value="45">45 Days</option>-->
                <!--    <option value="90">90 Days</option>-->
                <!--    <option value="All">Unlimited</option>-->
                <!--  </select>-->
                <!--</div>-->
                <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Customer Type </label>
                  <select class="form-control" name="custType"  >
                    <option value="">Select One</option>
                    <option value="1">General</option>
                    <option value="2">Wholesale</option>
                  </select>
                </div>
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
  </div>

  <div class="modal fade bs-example-modal-customer_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Customer Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="<?php echo base_url('Customer/update_customer');?>" method="post">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="row">
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>Customer Name *</label>
                <input type="text" class="form-control" name="customerName" id="customerName" required>
              </div>
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>Customer Company</label>
                <input type="text" class="form-control" name="custCompany" id="custCompany">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label>Contact Number </label>
                <input type="text" class="form-control" name="mobile" id="mobile" onkeypress="return isNumberKey(event)"  >
              </div>
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>2nd Contact Number</label>
                <input type="text" class="form-control" name="custMobile" id="custMobile" onkeypress="return isNumberKey(event)">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label>Email ID</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>Address </label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
              </div>
              <!--<div class="form-group col-md-6 col-sm-6 col-xs-12">-->
              <!--  <label>Select Division </label>-->
              <!--  <select class="form-control division" name="division" id="divid">-->
              <!--    <option value="">Select One</option>-->
              <!--    <?php foreach($division as $value){ ?>-->
              <!--    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>-->
              <!--    <?php } ?>-->
              <!--  </select>-->
              <!--</div>-->
              <!--<div class="form-group col-md-6 col-sm-6 col-xs-12">-->
              <!--  <label>Select District </label>-->
              <!--  <select class="form-control district" name="district" id="disid">-->
              <!--    <option value="">Select One</option>-->
              <!--  </select>-->
              <!--</div>-->
              <!--<div class="form-group col-md-6 col-sm-6 col-xs-12">-->
              <!--  <label>Select Upazila </label>-->
              <!--  <select class="form-control upazila" name="upazila" id="upzid">-->
              <!--    <option value="">Select One</option>-->
              <!--  </select>-->
              <!--</div>-->
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>Notes</label>
                <input type="text" class="form-control" name="custNotes" id="custNotes" placeholder="If have any notes">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-12">
                <label>Opening Balance</label>
                <input type="text" class="form-control" name="balance" id="balance" placeholder="Previous Due">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label>Credit Limit</label>
                <input type="text" class="form-control" name="custLimit" id="custLimit" placeholder="Amount">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label>Select Territory </label>
                <select class="form-control" name="trCode" id="trCode" >
                  <option value="">Select One</option>
                  <?php foreach($territory as $value){ ?>
                  <option value="<?php echo $value['trName']; ?>"><?php echo $value['trName']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <!--<div class="form-group col-md-6 col-sm-6 col-12">-->
              <!--  <label>Customer Terms *</label>-->
              <!--  <select class="form-control" name="custTerms" id="custTerms" required >-->
              <!--    <option value="">Select One</option>-->
              <!--    <option value="0">Cash One Delivery</option>-->
              <!--    <option value="7">7 Days</option>-->
              <!--    <option value="15">15 Days</option>-->
              <!--    <option value="30">30 Days</option>-->
              <!--    <option value="45">45 Days</option>-->
              <!--    <option value="90">90 Days</option>-->
              <!--    <option value="All">Unlimited</option>-->
              <!--  </select>-->
              <!--</div>-->
              <div class="form-group col-md-4 col-sm-4 col-12">
                  <label>Customer Type </label>
                  <select class="form-control" name="custType" id="custType" >
                    <option value="">Select One</option>
                    <option value="1">General</option>
                    <option value="2">Wholesale</option>
                  </select>
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <input type="hidden" id="cus_id" name="cus_id" required>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-template" id="temp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" >
          <div class="modal-header" style="background-color: aliceblue;">
            <h4 class="modal-title">Customer Template</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="row" style="padding:20px;">
            <div class="form-group col-md-12 col-sm-12 col-12">
              <div style="width: 100%; height: 100px;background: aliceblue;text-align: center;">
                <a href="<?php echo base_url('assets/templates/customers.xlsx') ?>" style="padding:1em;text-align: center;display:inline-block;text-decoration: none !important;margin:0 auto;font-size:1.4rem;">New template</a>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-12">
            <form method="post" id="import_form" enctype="multipart/form-data">
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>Import Template<span style="color: red">*</span></label>
                <input type="file" name="file" id="file" required accept=".xls, .xlsx" >
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 25px; text-align: center;">
                <input type="submit" name="import" value="Import" class="btn btn-primary" style="width:150px;">
              </div>
            </form>
            <div class="progress">
              <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="modal-footer" style="background-color: aliceblue;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.division').change(function(){
          var url = "<?php echo base_url(); ?>Customer/get_district_data";
          var id = $('.division').val();
            //alert(url);alert(id);
          $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: {"id": id},
            success: function(data) {
                //alert(data);
              $('.district').removeAttr("disabled")
              var HTML = "<option value=''>Select One</option>";
              for(var key in data){
                if(data.hasOwnProperty(key)){
                  HTML += "<option value='" + data[key]["id"] + "'>" + data[key]["name"] + "</option>";
                  }
                }
              $(".district").html(HTML);
              },
            error: function(data){
              alert('error');
              }
            });
          });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.district').change(function(){
          var url = "<?php echo base_url(); ?>Customer/get_upazila_data";
          var id = $('.district').val();
            // alert(url);alert(id);
          $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: {"id": id},
            success: function(data){
                //alert(data);
              $('.upazila').removeAttr("disabled")
              var HTML = "<option value=''>Select One</option>";
              for(var key in data){
                if(data.hasOwnProperty(key)){
                  HTML += "<option value='" + data[key]["id"] + "'>" + data[key]["name"] + "</option>";
                  }
                }
              $(".upazila").html(HTML);
              },
            error: function(data){
              alert('error');
              }
            });
          });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.customer_edit', function(){
          var catid = $(this).attr('id');
          $('input[name="cus_id"]').val(catid);
          });

        $(document).on('click', '.customer_edit', function(){
          var id = $(this).attr('id');
          var url = '<?php echo base_url() ?>Customer/get_customer_data';
          $.ajax({
            method: 'POST',
            url: url,
            dataType: 'json',
            data: {'id': id},
            success: function(data) {
              var HTML = data["customerName"];
              var HTML1 = data["custCompany"];
              var HTML3 = data["mobile"];
              var HTML2 = data["custMobile"];
              var HTML4 = data["email"];
              var HTML5 = data["address"];
              var HTML6 = data["balance"];
              var HTML7 = data["status"];
              var HTML8 = data["divid"];
              var HTML9 = data["custNotes"];
              var HTML10 = data["trCode"];
              var HTML11 = data["custTerms"];
              var HTML12 = data["custLimit"];
              var HTML13 = data["custType"];
                //   var HTML14 = data["upzid"];

              $("#customerName").val(HTML);
              $("#custCompany").val(HTML1);
              $("#custMobile").val(HTML2);
              $("#mobile").val(HTML3);
              $("#email").val(HTML4);
              $("#address").val(HTML5);
              $("#divid").val(HTML8);
              $("#custNotes").val(HTML9);
              $("#balance").val(HTML6);
              $("#status").val(HTML7);
              $("#trCode").val(HTML10);
              $("#custTerms").val(HTML11);
              $("#custLimit").val(HTML12);
              $("#custType").val(HTML13);
                //   $("#upzid").val(HTML14);
              },
            error: function(){
              alert('error');
              }
            });
          });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#divid').change(function(){
          var url = "<?php echo base_url(); ?>Customer/get_district_data";
          var id = $('#divid').val();
            //alert(url);alert(id);
          $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: {"id": id},
            success: function(data){
                //alert(data);
              $('#disid').removeAttr("disabled")
              var HTML = "<option value=''>Select One</option>";
              for(var key in data){
                if(data.hasOwnProperty(key)){
                  HTML += "<option value='" + data[key]["id"] + "'>" + data[key]["name"] + "</option>";
                  }
                }
              $("#disid").html(HTML);
              },
            error: function(data){
              alert('error');
              }
            });
          });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#disid').change(function(){
          var url = "<?php echo base_url(); ?>Customer/get_upazila_data";
          var id = $('#disid').val();
            // alert(url);alert(id);
          $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: {"id": id},
            success: function(data){
                //alert(data);
              $('#upzid').removeAttr("disabled")
              var HTML = "<option value=''>Select One</option>";
              for(var key in data){
                if(data.hasOwnProperty(key)){
                  HTML += "<option value='" + data[key]["id"] + "'>" + data[key]["name"] + "</option>";
                  }
                }
              $("#upzid").html(HTML);
              },
            error: function(data){
              alert('error');
              }
            });
          });
        });
    </script>

    <script type="text/javascript" >
      $(document).ready(function(){
        $('#import_form').on('submit', function(event){
          event.preventDefault();
          $.ajax({
            url:"<?php echo base_url(); ?>Customer/excel_import",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                  if (e.lengthComputable) {
                    var percent = Math.round((e.loaded / e.total) * 100);
                    $('#progressBar').css('width', percent + '%').html(percent + '%');
                  }
                });
                return xhr;
              },
            success:function(data)
              {
                //   alert('hi');
              $('#file').val('');
            //   load_data();
            //   alert(data);
              $('#temp').remove();
              $('.modal-backdrop').remove();
              window.location.reload();
              }
            });
          });
        });
    </script>