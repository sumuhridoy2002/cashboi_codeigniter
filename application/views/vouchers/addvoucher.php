<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <!--<section class="content-header">-->
    <!--  <div class="container-fluid">-->
    <!--    <div class="row mb-2">-->
    <!--      <div class="col-sm-6">-->
    <!--        <h1>Voucher</h1>-->
    <!--      </div>-->
    <!--      <div class="col-sm-6">-->
    <!--        <ol class="breadcrumb float-sm-right">-->
    <!--          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>-->
    <!--          <li class="breadcrumb-item active">Voucher</li>-->
    <!--        </ol>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Voucher Information</h3>
              </div>

              <div class="card-body" style="text-transform:uppercase;">
                <form method="POST" action="<?php echo site_url("Voucher/save_voucher") ?>">
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Voucher Date *</label>
                        <input type="text" name="date" class="form-control datepicker" value="<?php echo date('m/d/Y') ?>" required>
                      </div>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Voucher Type *</label>
                        <select class="form-control" name="vaucher" id="vuType" readonly="" required >
                          <option value="">Select One</option>
                          <option value="Credit Voucher">Income Voucher</option>
                          <option value="Debit Voucher">Expense Voucher</option>
                          <option value="Supplier Pay">Supplier Pay</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Add Information</label>
                        <div>
                          <button type="button" class="btn btn-danger" id="addmore" ><i class="fa fa-plus"></i> Add More</button>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <ol id="list" style="list-style-type: none;"></ol>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Account Type *</label>
                        <select class="form-control" name="accountType" id="accountType" required >
                          <option value="Cash">Cash</option>
                          <option value="Bank">Bank</option>
                          <option value="Mobile">Mobile</option>
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
                        <input type="text" class="form-control" name="reference" placeholder="Reference / Note" >
                      </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; text-align: center;">
                      <button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                      <a href="<?php echo site_url('newVoucher'); ?>" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i>&nbsp;&nbsp;Reset</a>
                      <a href="<?php echo site_url('Voucher'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
                    </div>
                  </div>
                </form>

                <div class="d-none col-md-12 col-sm-12 col-xs-12">
                  <div id="credit">
                    <ol class="ct">
                      <div class="row" style="background-color: #17a2b838; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Customer</label>
                          <div style="width: 100%;">
                          <select class="form-control" name="customer[]" id="custSelect"  >
                            <option value="">Select One</option>
                            <?php foreach($customer as $value){ ?>
                            <option value="<?php echo $value['customerID']; ?>"><?php echo $value['customerName'].' ( '.$value['mobile'].' )'; ?></option>
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
                      <div class="row" style="background-color: #17a2b838; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Expenses Type</label>
                          <div style="width: 100%;" >
                          <select class="form-control" name="costtype[]" id="costSelect">
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
                      <div class="row" style="background-color: #17a2b838; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Select Supplier</label>
                          <div style="width: 100%;" >
                            <select class="form-control" name="supplier[]" id="supSelect" >
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
            $("#custSelect").select2();
            }
          else if(vuType == 'Debit Voucher')
            {
            $("#list").append($("#debit").html());
            $("ol ol.ct input").removeAttr("id");
            $('#vuType').attr('readonly', 'readonly');
            $("#costSelect").select2();
            }
          else if(vuType == 'Supplier Pay')
            {
            $("#list").append($("#supplierPay").html());
            $("ol ol.ct input").removeAttr("id");
            $('#vuType').attr('readonly', 'readonly');
            $("#supSelect").select2();
            }
          else
            {
            $('#vuType').removeAttr('readonly', 'readonly');
            //$(".select2").select2();
            alert('Please select voucher type first!')
            }
            // $(".custSelect").select2('destroy');
            // $(".costSelect").select2('destroy');
            // $(".supSelect").select2('destroy');
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
        $('#credit').click(function() {
          $('#customer').removeAttr('class', 'd-none');
          $('#employee').attr('class', 'd-none');
          $('#supplier').attr('class', 'd-none');
          $('#customerID').attr('required', 'required');
          $('#costType').removeAttr('required', 'required');
          $('#reference').removeAttr('required', 'required');
          $('#supplierID').removeAttr('required', 'required');
          });
        $('#debit').click(function() {
          $('#employee').removeAttr('class', 'd-none');
          $('#customer').attr('class', 'd-none');
          $('#supplier').attr('class', 'd-none');
          $('#customerID').removeAttr('required', 'required');
          $('#costType').attr('required', 'required');
          $('#reference').attr('required', 'required');
          $('#supplierID').removeAttr('required', 'required');
          });
        $('#supplierPay').click(function() {
          $('#supplier').removeAttr('class', 'd-none');
          $('#customer').attr('class', 'd-none');
          $('#employee').attr('class', 'd-none');
          $('#customerID').removeAttr('required', 'required');
          $('#costType').removeAttr('required', 'required');
          $('#reference').removeAttr('required', 'required');
          $('#supplierID').attr('required', 'required');
          });
        });
    </script>

    <?php 
    $cash = $this->db->select("ca_id")->FROM('cash')->where('compid',$_SESSION['compid'])->limit(1)->get()->row(); 
    if($cash)
      {
      $caid = $cash->ca_id;
      }
    else
      {
      $caid = 0;
      }
    ?>
    
    <script type="text/javascript">
      $(document).ready(function(){
        var value = $("#accountType").val();
        $('#accountNo').empty();
        getAccountNo(value, '#accountNo');
        $('#accountNo').val("<?php echo $caid; ?>");
        });
    
      $('#accountType').on('change', function() {
        var value = $(this).val();
        $('#accountNo').empty();
        getAccountNo(value, '#accountNo');
        $('.js-example-basic-single').select2();

        });

      function getAccountNo(value, place) {
        $(place).empty();
        if (value != '') {
          $.ajax({
            url: '<?php echo site_url()?>Voucher/getAccountNo',
            async: false,
            dataType: "json",
            data: 'id=' + value,
            type: "POST",
            success: function(data) {
              $(place).append(data);
              $(place).trigger("chosen:updated");
              }
            });
          } 
        else {
            customAlert('Please Select Account Type', "error", true);
          }
        }
    </script>

    