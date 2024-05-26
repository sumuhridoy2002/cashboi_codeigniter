<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Voucher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Voucher</li>
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
                <h3 class="card-title">Update Voucher Information</h3>
              </div>

              <div class="card-body">
                <form method="POST" action="<?php echo site_url('Voucher/update_voucher') ?>">
                  <div class="row">
                    <input type="hidden" name="vuid" value="<?php echo $voucher['vuid']; ?>" required >
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Date *</label>
                      <input type="text" name="date" class="form-control datepicker" value="<?php echo date('m/d/Y', strtotime($voucher['voucherdate'])); ?>" >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Voucher Type *</label>
                      <!--<select class="form-control" name="vaucher" id="vuType"  required >-->
                      <!--  <option value="">Select One</option>-->
                      <!--  <option <?php echo ($voucher['vauchertype'] == 'Credit Voucher')?'selected':''?> value="Credit Voucher">Income Voucher</option>-->
                      <!--  <option <?php echo ($voucher['vauchertype'] == 'Debit Voucher')?'selected':''?> value="Debit Voucher">Expense Voucher</option>-->
                      <!--  <option <?php echo ($voucher['vauchertype'] == 'Supplier Pay')?'selected':''?> value="Supplier Pay">Supplier Pay</option>-->
                      <!--</select>-->
                      <input type="text" name="vaucher" id="vuType" class="form-control" value="<?php echo $voucher['vauchertype']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Add Information</label>
                      <div>
                        <button type="button" class="btn btn-danger" id="addmore" ><i class="fa fa-plus"></i> Add More</button>
                      </div>
                    </div>
                  </div>
                    
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php foreach($voucherp as $vpvalue){ ?>
                      <?php if($vpvalue['vutype'] == 1){ ?>
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Customer</label>
                          <div>
                          <select class="form-control custSelect" name="customer[]" style="width: 100%;" >
                            <option value="">Select One</option>
                            <?php foreach($customer as $value){ ?>
                            <option <?php echo ($vpvalue['vutid'] == $value['customerID'])?'selected':''?> value="<?php echo $value['customerID']; ?>"><?php echo $value['customerName'].' ( '.$value['cus_id'].' )'; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="custNote[]" value="<?php echo $vpvalue['particulars']; ?>" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" value="<?php echo $vpvalue['amount']; ?>" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                      <?php } if($vpvalue['vutype'] == 2){ ?>
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Expenses Type</label>
                          <div>
                          <select class="form-control costSelect" name="costtype[]" style="width: 100%;" >
                            <option value="">Select One</option>
                            <?php foreach($costtype as $value){ ?>
                            <option <?php echo ($vpvalue['vutid'] == $value['ct_id'])?'selected':''?> value="<?php echo $value['ct_id']; ?>"><?php echo $value['costName']; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="expNote[]" value="<?php echo $vpvalue['particulars']; ?>" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" value="<?php echo $vpvalue['amount']; ?>" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                      <?php } if($vpvalue['vutype'] == 3){ ?>
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Supplier</label>
                          <div>
                            <select class="form-control supSelect" name="supplier[]" style="width: 100%;" >
                              <option value="">Select One</option>
                              <?php foreach($supplier as $value){ ?>
                              <option <?php echo ($vpvalue['vutid'] == $value['supplierID'])?'selected':''?> value="<?php echo $value['supplierID']; ?>"><?php echo $value['supplierName'].' ( '.$value['sup_id'].' )'; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="supNote[]" value="<?php echo $vpvalue['particulars']; ?>" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" value="<?php echo $vpvalue['amount']; ?>" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                      <?php } else{ ?>
                      <?php } ?>
                    <?php } ?>
                    <ol id="list" style="list-style-type: none;"></ol>
                  </div>
                    
                  <div class="row">
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Account Type *</label>
                      <select class="form-control" name="accountType" id="accountType" required >
                        <option value="">Select One</option>
                        <option <?php echo ($voucher['accountType'] == 'Cash')?'selected':''?> value="Cash">Cash</option>
                        <option <?php echo ($voucher['accountType'] == 'Bank')?'selected':''?> value="Bank">Bank</option>
                        <option <?php echo ($voucher['accountType'] == 'Mobile')?'selected':''?> value="Mobile">Mobile</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Account No *</label>
                      <select class="form-control" name="accountNo" id="accountNo" required >
                        <option value="">Select One</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Reference / Note</label>
                      <input type="text" class="form-control" name="reference" value="<?php echo ($voucher['reference']); ?>"  >
                    </div>
                  </div>

                  <div class="form-group col-md-12 col-sm-12 col-12" style="margin-top:20px; text-align: center;">
                    <button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                    <a href="<?php echo site_url('Voucher') ?>" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
                  </div>
                </form>
                
                <div class="d-none col-md-12 col-sm-12 col-xs-12">
                  <div id="credit">
                    <ol class="ct">
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Customer</label>
                          <div>
                          <select class="form-control custSelect" name="customer[]" style="width: 100%;" >
                            <option value="">Select One</option>
                            <?php foreach($customer as $value){ ?>
                            <option value="<?php echo $value['customerID']; ?>"><?php echo $value['customerName'].' ( '.$value['cus_id'].' )'; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="custNote[]" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                    </ol>
                  </div>
                </div>
                
                <div class="d-none col-md-12 col-sm-12 col-xs-12">
                  <div id="debit">
                    <ol class="ct">
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Expenses Type</label>
                          <div>
                          <select class="form-control costSelect" name="costtype[]" style="width: 100%;" >
                            <option value="">Select One</option>
                            <?php foreach($costtype as $value){ ?>
                            <option value="<?php echo $value['ct_id']; ?>"><?php echo $value['costName']; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="expNote[]" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                    </ol>
                  </div>
                </div>
                
                <div class="d-none col-md-12 col-sm-12 col-xs-12">
                  <div id="supplierPay">
                    <ol class="ct">
                      <div class="row" style="background-color: #c5c745; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Supplier</label>
                          <div>
                            <select class="form-control supSelect" name="supplier[]" style="width: 100%;" >
                              <option value="">Select One</option>
                              <?php foreach($supplier as $value){ ?>
                              <option value="<?php echo $value['supplierID']; ?>"><?php echo $value['supplierName'].' ( '.$value['sup_id'].' )'; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Notes</label>
                          <input type="text" class="form-control" name="supNote[]" placeholder="Notes" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="amount[]" placeholder="Amount" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-12">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;">
                        </div>
                      </div>
                    </ol>
                  </div>
                </div>
                
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
        $("#addmore").click(function(){
          var vuType = $('#vuType').val();
          //alert(vuType);
          if(vuType == 'Credit Voucher')
            {
            $("#list").append($("#credit").html());
            $("ol ol.ct input").removeAttr("id");
            $('#vuType').attr('readonly', 'readonly');
            $(".custSelect").select2();
            }
          else if(vuType == 'Debit Voucher')
            {
            $("#list").append($("#debit").html());
            $("ol ol.ct input").removeAttr("id");
            $('#vuType').attr('readonly', 'readonly');
            $(".costSelect").select2();
            }
          else if(vuType == 'Supplier Pay')
            {
            $("#list").append($("#supplierPay").html());
            $("ol ol.ct input").removeAttr("id");
            $('#vuType').attr('readonly', 'readonly');
            $(".supSelect").select2();
            }
          else
            {
            $('#vuType').removeAttr('readonly', 'readonly');
            //$(".select2").select2();
            alert('Please select voucher type first!')
            }
          });
        });
    </script>
    
    <script type="text/javascript">
      $(window).on('load', function() {
        var vuType = $('#vuType').val();
        if(vuType == 'Credit Voucher')
            {
            $('#vuType').attr('readonly', 'readonly');
            }
          else if(vuType == 'Debit Voucher')
            {
            $('#vuType').attr('readonly', 'readonly');
            }
          else if(vuType == 'Supplier Pay')
            {
            $('#vuType').attr('readonly', 'readonly');
            }
          else
            {
            $('#vuType').removeAttr('readonly', 'readonly');
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var value = $("#accountType").val();
            $('#accountNo').empty();
            getAccountNo(value, '#accountNo');
            $('#accountNo').val("<?php echo $voucher['accountNo']; ?>");
            });

        var url = '<?php echo site_url('Voucher')?>';

        $('#accountType').on('change', function () {
            var value = $(this).val();
            $('#accountNo').empty();
            getAccountNo(value,'#accountNo');
            });

        function getAccountNo(value, place) {
            $(place).empty();
            if (value != '') {
                $.ajax({
                    url: url+'/getAccountNo',
                    async: false,
                    dataType: "json",
                    data: 'id=' + value,
                    type: "POST",
                    success: function (data) {               
                        $(place).append(data);
                       $(place).trigger("chosen:updated");
                    }
                });

            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'Please Select Account Type',
                    type: "red",
                    icon: 'fa fa-warning',
                    theme: "material",
                });
            }
        }
    </script>