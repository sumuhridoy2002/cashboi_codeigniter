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
                <h3 class="card-title">Balance Information</h3>
              </div>

              <div class="card-body">
                <form method="POST" action="<?php echo site_url("CashAccount/save_balance_adjustment") ?>">
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Date *</label>
                        <input type="text" name="date" class="form-control datepicker" value="<?php echo date('m/d/Y') ?>" required >
                      </div>
                      <div class="form-group col-md-8 col-sm-8 col-12">
                        <label>Adjustment Type *</label>
                        <div>
                          <input type="radio" name="adjustment_type" value="Deposit"  required >&nbsp;&nbsp;Deposit&nbsp;&nbsp;
                          <input type="radio" name="adjustment_type" value="Withdrawal" required >&nbsp;&nbsp;Withdrawal&nbsp;&nbsp;
                        </div>
                      </div>
                    </div>

                    <!-- <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Adjustment Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Adjustment Amount" >
                    </div> -->

                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="row">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                            <label>Adjustment Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Adjustment Amount" >
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                            <label>Note</label>
                            <input type="text" class="form-control" id="note" name="note" placeholder="Note" >
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="row">
                        <div class="form-group col-md-4 col-sm-4 col-12">
                          <label>Mode *</label>
                          <select class="form-control" name="accountType" id="accountType" required >
                            <option value="">Select One</option>
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
                      </div>
                    </div>

                    <div class="row">   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <ol id="list" style="list-style-type:none;"></ol>
                        </div>
                    </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top:20px; text-align: center;">
                      <button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                      <a href="<?php echo site_url('Voucher') ?>" class="btn btn-danger" ><i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;Back</a>
                    </div>
                  </div>
                </form>

                <div class="d-none col-md-12 col-sm-12 col-xs-12">
                  <div id="product">
                    <ol class="ct">
                      <div class="row" style="background-color:#c5c745; border-radius: 4px; border:1px solid #fff; color: black; margin-left: -90px;" >
                        <div class="form-group col-md-6 col-sm-6 col-6">
                          <label>Particulars</label>
                          <input type="text" name="particular[]" placeholder="Particulars" class="form-control" >
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-4">
                          <label>Amount</label>
                          <input type="text" name="amount[]" placeholder="Amount" class="form-control" >
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-2">
                          <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();" style="margin-top: 30px;" >
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

    <div id="addCasttype" class="modal fade bs-example-modal-costType" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Expense Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label>Expense Type *</label>
              <input type="text" class="form-control" name="costName" id="costName" placeholder="Expense Type" required >
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="pbsubmit" ><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#credit').click(function(){
          $('#customer').removeAttr('class','d-none');
          $('#employee').attr('class','d-none');
          $('#supplier').attr('class','d-none');

          $('#customerID').attr('required','required');
          $('#costType').removeAttr('required','required');
          //$('#reference').removeAttr('required','required');
          $('#supplierID').removeAttr('required','required');
          });

        $('#debit').click(function(){
          $('#employee').removeAttr('class','d-none');
          $('#customer').attr('class','d-none');
          $('#supplier').attr('class','d-none');

          $('#customerID').removeAttr('required','required');
          $('#costType').attr('required','required');
          //$('#reference').attr('required','required');
          $('#supplierID').removeAttr('required','required');
          });

        $('#supplierPay').click(function(){
          $('#supplier').removeAttr('class','d-none');
          $('#customer').attr('class','d-none');
          $('#employee').attr('class','d-none');

          $('#customerID').removeAttr('required','required');
          $('#costType').removeAttr('required','required');
          //$('#reference').removeAttr('required','required');
          $('#supplierID').attr('required','required');
          });
        });
    </script>

    <script type="text/javascript">
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
        $("#addmore").click(function(){
          $("#list").append($("#product").html());
          $("ol ol.ct input").removeAttr("id");
          });

        $("#remove_more").click(function(){
          $('ol.ct').has('input:checkbox:checked').remove();
          });
        });
    </script>

    <script type="text/javascript" >
      $(function(){
        load_cost_type();
        // function load_cost_type(){
        //   var url = "<?php echo base_url()?>Voucher/get_cost_type";
        //   //alert(url);
        //   $.ajax({
        //     type:'POST',
        //     url: url,       
        //     dataType: 'json',
        //     success:function(data){ 
        //     //alert(data);
        //       var HTML = "<option value=''>Select One</option>";
        //       for (var key in data) 
        //         {
        //         if (data.hasOwnProperty(key))
        //           {
        //           HTML +="<option value='"+data[key]["ct_id"]+"'>" + data[key]["costName"]+"</option>";
        //           }
        //         }
        //       $("#costType").html(HTML);
        //       },
        //     error:function(data){
        //        alert('error');
        //       }
        //     });
        //   }

        $("#pbsubmit").click(function(){
          var costName = $("#costName").val();
          var dataString = 'costName='+ costName;
          // AJAX Code To Submit Form.
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('Cost/add_cost_type') ?>",
            data: dataString,
            cache: false,
            success: function(result){
              //alert(result);
              load_cost_type();
              $('#addCasttype').remove();
              $('.modal-backdrop').remove();
              }
            });
          return false;
        });
      });
    </script>