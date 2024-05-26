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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-newBank" style="float: right;" ><i class="fa fa-plus"></i> Balance Transfer</button>
            </div>

            <div class="card-body">
              <div class="col-md-12 col-sm-12 col-12">
                <table id="example" class="table table-bordered table-striped" >
                  <thead>
                    <tr style="text-transform:uppercase; text-align:center;">
                      <th style="width: 5%;">SN.</th>
                      <th>Date</th>
                      <th>Sending Account</th>
                      <th>Receiving Account</th>
                      <th>Transfer Amount</th>
                      <th>Note</th>
                      <th style="width: 10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($cash as $value){
                    $i++;
                    $ac = $value['facType'];

                    if($ac == 'Bank')
                      {
                      $where = array(
                        'ba_id' => $value['facAcno']
                            );
                      $account = $this->pm->get_data('bankaccount',$where);
                      if(count($account) == 0)
                        {
                        $str = "N/A";
                        }
                      else
                        {
                        $str = $account[0]['bankName'].' '.$account[0]['branchName'].' '.$account[0]['accountNo'].' '.$account[0]['accountName'];
                        }
                      }
                    else if($ac == 'Mobile')
                      {
                      $where = array(
                        'ma_id' => $value['facAcno']
                            );

                      $account = $this->pm->get_data('mobileaccount',$where);
                      if(count($account) == 0)
                        {
                        $str = "N/A";
                        }
                      else
                        {
                        $str = $account[0]['accountName'].' '.$account[0]['accountNo'];
                        }
                      }
                    else if($ac == 'Cash')
                      {
                      $where = array(
                        'ca_id' => $value['facAcno']
                            );

                      $account = $this->pm->get_data('cash',$where);
                      if(count($account) == 0)
                        {
                        $str = "N/A";
                        }
                      else
                        {
                        $str = $account[0]['cashName'];
                        }
                      }

                    $a2c = $value['sacType'];

                    if($a2c == 'Bank')
                      {
                      $where = array(
                        'ba_id' => $value['facAcno']
                            );
                      $account = $this->pm->get_data('bankaccount',$where);
                      if(count($account) == 0)
                        {
                        $s2tr = "N/A";
                        }
                      else
                        {
                        $s2tr = $account[0]['bankName'].' '.$account[0]['branchName'].' '.$account[0]['accountNo'].' '.$account[0]['accountName'];
                        }
                      }
                    else if($a2c == 'Mobile')
                      {
                      $where = array(
                        'ma_id' => $value['facAcno']
                            );

                      $account = $this->pm->get_data('mobileaccount',$where);
                      if(count($account) == 0)
                        {
                        $s2tr = "N/A";
                        }
                      else
                        {
                        $s2tr = $account[0]['accountName'].' '.$account[0]['accountNo'];
                        }
                      }
                    else if($a2c == 'Cash')
                      {
                      $where = array(
                        'ca_id' => $value['facAcno']
                            );

                      $account = $this->pm->get_data('cash',$where);
                      if(count($account) == 0)
                        {
                        $s2tr = "N/A";
                        }
                      else
                        {
                        $s2tr = $account[0]['cashName'];
                        }
                      }
                    ?>
                    <tr class="gradeX">
                      <td><?php echo $i; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($value['regdate'])) ?></td>
                      <td><?php echo $value['facType'].' :- '.$str; ?></td>
                      <td><?php echo $value['sacType'].' :- '.$s2tr; ?></td>
                      <td><?php echo number_format($value['amount'], 2); ?></td>
                      <td><?php echo $value['note']; ?></td>
                      <td>
                        <a class="btn btn-success btn-sm" href="<?php echo site_url('editTransAccount').'/'.$value['ta_id']; ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('CashAccount/delete_balance_transfer').'/'.$value['ta_id'] ?>" onclick="return confirm('Are you sure you want to delete this Balance Transfer ?');" ><i class="fa fa-trash"></i></a>
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

    <div class="modal fade bs-example-modal-newBank" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 10px 10px;">
          <div class="modal-header">
            <h4 class="modal-title" >New Balance Transfer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php base_url() ?>CashAccount/save_transfer_account" method="post" >

    <!--    <div class="col-md-12 col-sm-12 col-12">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Sending Account *</label>
                    <select class="form-control" name="accountType" id="accountType" required >
                      <option value="">Select One</option>
                      <option value="Cash">Cash</option>
                      <option value="Bank">Bank</option>
                      <option value="Mobile">Mobile</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Sending Account Number *</label>
                    <select class="form-control" name="accountNo" id="accountNo" required >
                      <option value="">Select Account No.</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Receiving Account *</label>
                    <select class="form-control" name="account2Type" id="account2Type" required >
                      <option value="">Select One</option>
                      <option value="Cash">Cash</option>
                      <option value="Bank">Bank</option>
                      <option value="Mobile">Mobile</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Receiving Account Number *</label>
                    <select class="form-control" name="account2No" id="account2No" required >
                      <option value="">Select Account No.</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Transfer Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Amount" required >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" placeholder="If have any note">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>

                    -->
                    
                    <div class="" style="padding: 0px 15px 0px 15px;">
                      <div class="row" >
                        <div class="col" style="margin-right: 10px; background-color: #e5f3e0a6; border-radius: 0.5rem;" >
                         <h4 style="text-align:center; padding-top:7px;">Sender</h4>
                          <div class="form-group">
                            <label>Sending Account *</label>
                            <select class="form-control" name="accountType" id="accountType" required >
                              <option value="">Select One</option>
                              <option value="Cash">Cash</option>
                              <option value="Bank">Bank</option>
                              <option value="Mobile">Mobile</option>
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
                            <input type="text" class="form-control" name="amount" placeholder="Amount" required >
                          </div>
                        </div>
                        <div class="col" style="margin-right: 10px; background-color: #f3e0e0a6; border-radius: 0.5rem;">
                          <h4 style="text-align:center; padding-top:7px;" >Receiver</h4>
                          <div class="form-group">
                            <label>Receiving Account *</label>
                            <select class="form-control" name="account2Type" id="account2Type" required >
                              <option value="">Select One</option>
                              <option value="Cash">Cash</option>
                              <option value="Bank">Bank</option>
                              <option value="Mobile">Mobile</option>
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
                          <input type="text" class="form-control" name="note" placeholder="If have any note">
                        </div>
                        </div>
                      </div>
                      
                        
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
          <!---------------------------------------------------------------------------------------------------->          



          </form>
        </div>
      </div>
    </div>

  </div>
<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $('#accountType').on('change',function(){
        var value = $(this).val();
        //alert(value);
        $('#accountNo').empty();
        getAccountNo(value,'#accountNo');
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