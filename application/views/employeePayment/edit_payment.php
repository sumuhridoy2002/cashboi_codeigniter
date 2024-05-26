<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Payment</li>
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
                <h3 class="card-title">Update Employee Payment</h3>
              </div>

               <div class="card-body">
                <form action="<?php echo base_url('Employee_payment/update_Employee_Payment'); ?>" method="POST">
                  <div class="row">
                    <input type="hidden" name="empPid" value="<?php echo $payment['empPid']; ?>">
                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                        <label>Month *</label>
                        <select class="form-control" name="month" id="month" required>
                            <option value="">Select One</option>
                            <option value="01" <?php if ($payment['month'] == "01") echo 'selected="selected"'; ?>>January</option>
                            <option value="02" <?php if ($payment['month'] == "02") echo 'selected="selected"'; ?>>February</option>
                            <option value="03" <?php if ($payment['month'] == "03") echo 'selected="selected"'; ?>>March</option>
                            <option value="04" <?php if ($payment['month'] == "04") echo 'selected="selected"'; ?>>April</option>
                            <option value="05" <?php if ($payment['month'] == "05") echo 'selected="selected"'; ?>>May</option>
                            <option value="06" <?php if ($payment['month'] == "06") echo 'selected="selected"'; ?>>June</option>
                            <option value="07" <?php if ($payment['month'] == "07") echo 'selected="selected"'; ?>>July</option>
                            <option value="08" <?php if ($payment['month'] == "08") echo 'selected="selected"'; ?>>August</option>
                            <option value="09" <?php if ($payment['month'] == "09") echo 'selected="selected"'; ?>>September</option>
                            <option value="10" <?php if ($payment['month'] == "10") echo 'selected="selected"'; ?>>October</option>
                            <option value="11" <?php if ($payment['month'] == "11") echo 'selected="selected"'; ?>>November</option>
                            <option value="12" <?php if ($payment['month'] == "12") echo 'selected="selected"'; ?>>December</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                        <label>Year *</label>
                        <select class="form-control" name="year" id="year" required>
                            <?php $d = date("Y"); ?>
                            <option value="">Select One</option>
                            <?php for ($x = 2020; $x <= $d; $x++) { ?>
                                <option value="<?php echo $x; ?>" <?php if ($x == $payment['year']) echo 'selected="selected"'; ?>><?php echo $x; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Employee *</label>
                        <select class="form-control select2" name="empid" id="empid" required>
                            <option value="">Select One</option>
                            <?php foreach ($employee as $value) { ?>
                                <option value="<?php echo $value['employeeID']; ?>" <?php if ($value['employeeID'] == $payment['empid']) echo 'selected="selected"'; ?>><?php echo $value['employeeName']; ?></option>
                            <?php } ;?>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Salary Amount *</label>                        
                      <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $payment['salary'];?>" readonly >
                    </div>
                    
                    <?php
                    $ppaid=$this->pm->get_salary_empu($payment['month'],$payment['year'],$payment['empid'],$payment['empPid']);
                    //var_dump($ppaid);exit();
                    ?>
                    
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Previous Payment * </label>                        
                      <input type="text" class="form-control" name="ppaid" id="ppaid" value="<?php echo $ppaid->paid; ?>" readonly >
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Payable Amount * </label>                        
                      <input type="text" class="form-control" name="pAmount" id="pAmount" value="<?php echo $payment['paid'];?>" required >
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Payment Mode * </label>                        
                      <select class="form-control" name="accountType" id="accountType" required >
                        <option value="">Select One</option>
                        <option value="Cash" <?php if ($payment['accountType'] == "Cash") echo 'selected="selected"'; ?>>Cash</option>
                        <option value="Bank" <?php if ($payment['accountType'] == "Bank") echo 'selected="selected"'; ?>>Bank</option>
                        <option value="Mobile" <?php if ($payment['accountType'] == "Mobile") echo 'selected="selected"'; ?>>Mobile</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Account * </label>                        
                      <select class="form-control" name="accountNo" id="accountNo" required >
                        <option value="">Select One</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                      <label>Note</label>                        
                      <input type="text" class="form-control" placeholder="if have any Note" name="note">
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top:20px; text-align: center;" >
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" ></i> Update</button>
                    <a href="<?php echo site_url('empPayment')?>" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i> Back</a>
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

    <script type="text/javascript" >
        $(document).ready(function(){
          $('#month').change(function(){
            var url = "<?php echo base_url(); ?>Employee_payment/get_emp_salary";
            var id = $('#month').val();
            var id2 = $('#year').val();
            var id3 = $('#empid').val();
            // alert(id); alert(id2); alert(id3);
            $.ajax({
              method: "POST",
              url     : url,
              dataType: 'json',
              data    : {'id':id,'id2':id2,'id3':id3},
              success:function(data){ 
              //alert(data);
              var HTML = data["salary"];
              var HTML9 = data["paid"];
            //   alert(HTML9);
              var HTML2 = data["total"];
              if(HTML2==id3){
                  var HTML4= 0;
              }
              else
              {
                  HTML4 = HTML9;
              }
            //   alert(HTML4);
              var HTML3 = HTML - HTML4;

              $("#salary").val(HTML);
              $("#ppaid").val(HTML4);
              $("#pAmount").val(HTML3);
                },
              error:function(data){
              alert('error');
              }
            });
          });
        });
</script>

    <script type="text/javascript" >
        $(document).ready(function(){
          $('#year').change(function(){
            var url = "<?php echo base_url(); ?>Employee_payment/get_emp_salary";
            var id = $('#month').val();
            var id2 = $('#year').val();
            var id3 = $('#empid').val();
            // alert(id); alert(id2); alert(id3);
            $.ajax({
              method: "POST",
              url     : url,
              dataType: 'json',
              data    : {'id':id,'id2':id2,'id3':id3},
              success:function(data){ 
              //alert(data);
              var HTML = data["salary"];
              var HTML9 = data["paid"];
            //   alert(HTML9);
              var HTML2 = data["total"];
              if(HTML2==id3){
                  var HTML4= 0;
              }
              else
              {
                  HTML4 = HTML9;
              }
            //   alert(HTML4);
              var HTML3 = HTML - HTML4;

              $("#salary").val(HTML);
              $("#ppaid").val(HTML4);
              $("#pAmount").val(HTML3);
                },
              error:function(data){
              alert('error');
              }
            });
          });
        });
</script>

    <script type="text/javascript" >
    $(document).ready(function(){
      $('#empid').change(function(){
        var url = "<?php echo base_url(); ?>Employee_payment/get_emp_salary";
        var id = $('#month').val();
        var id2 = $('#year').val();
        var id3 = $('#empid').val();
        // alert(id); alert(id2); alert(id3);
        $.ajax({
          method: "POST",
          url     : url,
          dataType: 'json',
          data    : {'id':id,'id2':id2,'id3':id3},
          success:function(data){ 
          //alert(data);
          var HTML = data["salary"];
          var HTML9 = data["paid"];
        //   alert(HTML9);
          var HTML2 = data["total"];
          if(HTML2==id3){
              var HTML4= 0;
          }
          else
          {
              HTML4 = HTML9;
          }
        //   alert(HTML4);
          var HTML3 = HTML - HTML4;

          $("#salary").val(HTML);
          $("#ppaid").val(HTML4);
          $("#pAmount").val(HTML3);
            },
          error:function(data){
          alert('error');
          }
        });
      });
    });
  </script>
      
    <script type="text/javascript">

        $(document).ready(function(){
            var value = $("#accountType").val();
            $('#accountNo').empty();
            getAccountNo(value, '#accountNo');
            $('#accountNo').val("<?php echo $payment['accountNo'] ?>");
            });

      $('#accountType').on('change',function(){
        var value = $(this).val();
        $('#accountNo').empty();
        getAccountNo(value, '#accountNo');
        });
        
        function getAccountNo(value,place){
          $(place).empty();
          if(value != ''){
            $.ajax({
              url: '<?php echo site_url()?>Voucher/getAccountNo',
              async: false,
              dataType: "json",
              data: 'id=' + value,
              type: "POST",
              success: function (data){
                $(place).append(data);
                $(place).trigger("chosen:updated");
                }
              });
            }
          else
            {
            customAlert('Please Select Account Type', "error", true);
            }
          }
    </script>
    
    <script>
      var eloadFile = function(event) {
        var preview = document.getElementById('preview');
        preview.style.display = "block";
        preview.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>