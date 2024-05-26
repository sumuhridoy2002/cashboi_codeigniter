<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transfer Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Transfer Account</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Transfer Account</h3>
            </div>

            <div class="card-body">
              <div class="col-md-12 col-sm-12 col-12">
                  <form method="POST" action="<?php echo base_url() ?>CashAccount/update_transfer_account">
        
                    <div class="" style="padding: 0px 15px 0px 15px;">
                      <div class="row" >
                          <input type="hidden" name="ta_id" value="<?php echo $cash['ta_id']; ?>">
                        <div class="col" style="margin-right: 10px; background-color: #e5f3e0a6; border-radius: 0.5rem;" >
                         <h4 style="text-align:center; padding-top:7px;">Sender</h4>
                          <div class="form-group">
                            <label>Sending Account *</label>
                            <select class="form-control" name="accountType" id="accountType" required >
                              <option value="">Select One</option>
                              <option value="Cash" <?php if ($cash['facType'] == "Cash") echo 'selected="selected"'; ?>>Cash</option>
                              <option value="Bank" <?php if ($cash['facType'] == "Bank") echo 'selected="selected"'; ?>>Bank</option>
                              <option value="Mobile" <?php if ($cash['facType'] == "Mobile") echo 'selected="selected"'; ?>>Mobile</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Sending Account Number *</label>
                            <select class="form-control" name="accountNo" id="accountNo" required >
                              <option value="">Select Account No.</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Balance Amount</label>
                            <select class="form-control" name="balance_amount" id="balance_amount" style="appearance: none;" readonly >
                            </select>                          
                          </div>
                          <div class="form-group">
                            <label>Transfer Amount</label>
                            <input type="text" class="form-control" name="amount" value="<?php echo $cash['amount'];?>" required >
                          </div>
                        </div>
                        <div class="col" style="margin-right: 10px; background-color: #f3e0e0a6; border-radius: 0.5rem;">
                          <h4 style="text-align:center; padding-top:7px;" >Receiver</h4>
                          <div class="form-group">
                            <label>Receiving Account *</label>
                            <select class="form-control" name="account2Type" id="account2Type" required >
                              <option value="">Select One</option>
                              <option value="Cash" <?php if ($cash['sacType'] == "Cash") echo 'selected="selected"'; ?>>Cash</option>
                              <option value="Bank" <?php if ($cash['sacType'] == "Bank") echo 'selected="selected"'; ?>>Bank</option>
                              <option value="Mobile" <?php if ($cash['sacType'] == "Mobile") echo 'selected="selected"'; ?>>Mobile</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Receiving Account Number *</label>
                            <select class="form-control" name="account2No" id="account2No" required >
                              <option value="">Select Account No.</option>
                            </select>
                          </div>
                          <div class="form-group">
                          <label>Note</label>
                          <input type="text" class="form-control" name="note" value="<?php echo $cash['note'];?>" placeholder="If have any note">
                        </div>
                        </div>
                      </div>
                      
                        
                      <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top:20px; text-align: center;" >
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" ></i> Update</button>
                        <a href="<?php echo site_url('transAccount')?>" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i> Back</a>
                      </div>
                    </div>
                  <!---------------------------------------------------------------------------------------------------->          
        
        
        
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
            var value = $("#accountType").val();
            $('#accountNo').empty();
            getAccountNo(value, '#accountNo');
            $('#accountNo').val("<?php echo $cash['facAcno'] ?>");
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

    <script type="text/javascript">
    
    $(document).ready(function(){
            var value = $("#account2Type").val();
            $('#account2No').empty();
            getAccountNo(value, '#account2No');
            $('#account2No').val("<?php echo $cash['sacAcno'] ?>");
            });
    
      $('#account2Type').on('change',function(){
        var value = $(this).val();
        //alert(value);
        $('#account2No').empty();
        getAccountNo(value,'#account2No');
        });

      function getAccountNo(value,place)
        {
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
          customAlert('Select Account Type',"error",true);
          }
        }
    </script>

<script type="text/javascript">
      $(document).ready(function(){
        $('#accountNo').change(function(){
          var id = $('#accountType').val();
          var id2 = $('#accountNo').val();
          if(id == 'Cash'){
            var base_url = '<?php echo base_url() ?>'+'CashAccount/account_balance_cash/'+id2;
          }else if(id == 'Mobile'){
            var base_url = '<?php echo base_url() ?>'+'CashAccount/account_balance_mobile/'+id2;
          }else if(id == 'Bank'){
            var base_url = '<?php echo base_url() ?>'+'CashAccount/account_balance_bank/'+id2;
          }
          $.ajax({
            type: 'POST',
            url: base_url,
            dataType: 'json',
            success: function(data){
                console.log("hafij",data);
                var HTML = "<option value='"+data["balance"]+"'>" + data["balance"]+"</option>";
              // for (var key in data) 
                // {
                // if(data.hasOwnProperty(key))
                //   {
                  // HTML +="<option value='"+data["balance"]+"'>" + data["balance"]+"</option>";
                // }}    
                //   alert(HTML);
              $('#balance_amount').html(HTML);     
              }
            });
          });
        });
    </script>