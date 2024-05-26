<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Return</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Return</li>
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
                <h3 class="card-title">Return Information</h3>
              </div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>Returns/save_returns" >
                  <div class="row">
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Return Date *</label>
                      <input type="text" class="form-control datepicker" name="date" value="<?php echo date('m/d/Y'); ?>" required >
                    </div>
                    <?php
                           $cus=$returns['customerID'];
                           $query=$this->db->select('customerName')
                                           ->from('customers')
                                           ->where('customerID',$cus)
                                           ->get()
                                           ->row();
                        ?>
                        <div class="form-group col-md-4 col-sm-4 col-12">
                            <label>Select Customer *</label>
                             <input type="text" class="form-control" value="<?php echo $query->customerName; ?>" required readonly>
                             <input type="hidden" class="form-control" name="customer" value="<?php echo $returns['customerID']; ?>" required >
                            
                        </div> 
                    <!--<div class="form-group col-md-4 col-sm-4 col-12">-->
                    <!--  <label>Select Product</label>-->
                    <!--  <select name="productID" id="productID" class="form-control select2" >-->
                    <!--    <option value="">Select One</option>-->
                    <!--    <?php foreach($product as $value): ?>-->
                    <!--    <option value="<?php echo $value['productID']; ?>"><?php echo $value['productName'].' ( '.$value['productcode'].' )'; ?></option>-->
                    <!--    <?php endforeach?>-->
                    <!--  </select>-->
                    <!--</div>-->
                  </div>

                  <div class="col-md-12 col-sm-12 col-12" >
                    <table id="mtable" class="table table-bordered table-striped">
                      <thead class="btn-default">
                        <tr>
                          <th>Products</th>
                          <th>Sold Qty</th>              
                          <th>Retuned Qty</th>              
                          <th>Quantity</th>               
                          <th>Sale Price</th>
                          <th>Total Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php
                        foreach($rproduct as $value){
                        $id = $value['productID'];
                        
                        $query=$this->db->select('SUM(returns_product.quantity) as tq')
                                        ->from('returns_product')
                                        ->join('returns','returns.returnId = returns_product.rt_id','left')
                                        ->join('sales','sales.invoice_no =  returns.invoice' , 'left')
                                        // ->join('sale_product','sales.saleID =  sale_product.saleID' , 'left')/
                                        ->where('returns_product.productID',$id)
                                        ->where('returns.invoice',$returns['invoice_no'])
                                        ->get()
                                        ->row();
                        if($query->tq){
                            $rqty=$query->tq;
                        }
                        else{
                            $rqty=0;
                        }
                            $remain= $value['quantity']-$rqty;
                        ?>
                        <tr>
                          <td>
                            <?php echo $value['productName'] ?>
                            <input type='hidden' name='productID[]' value="<?php echo $id; ?>">
                          </td>       
                          <td>
                            <input class="form-control" type="text" name="sold[]" id="sold<?php echo $id ?>" value="<?php echo $value['quantity']; ?>" readonly>
                          </td>
                          <td>
                            <input class="form-control" type="text" name="return[]" id="return<?php echo $id ?>" value="<?php echo $rqty; ?>" readonly>
                          </td>
                          <td>
                            <input class="form-control" type="text" onkeyup="totalPrice(<?php echo $id ?>,this, <?php echo $remain; ?>)" 
                            name="pices[]" id="pices_<?php echo $id ?>" value="<?php echo $remain; ?>">
                          </td>
                          <td>
                            <input type='text' class='form-control'  onkeyup='totalPrice(<?php echo $id ?>)' name='salePrice[]' id='salePrice_<?php echo $id ?>' value="<?php echo $value['sprice']; ?>">
                          </td>
                          <td>
                            <input type='text' class='totalPrice form-control'  name='totalPrice[]' readonly id='totalPrice_<?php echo $id ?>' value="<?php echo $value['totalPrice']; ?>">
                          </td>
                          <td>
                            <input type="button" class="btn btn-danger" value="Remove" onClick="$(this).parent().parent().remove();">
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Total Amount *</label>
                      <input type="text" class="form-control" name="totalprice" id="totalprice" readonly required value="<?php echo $returns['totalAmount']?>" >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Service Charge</label>
                      <input type="text" class="form-control" name="scharge" id="scharge" value="0"  onkeyup="discountType()" >
                      <input type="hidden" class="form-control" id="sctype" name="sctype" >
                      <input type="hidden" class="form-control" id="scAmount" name="scAmount" value="0"  >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                      <label>Invoice No *</label>
                      <input type="text" class="form-control" name="invoice" value="<?php echo $returns['invoice_no']; ?>"  readonly required >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Account Type *</label>
                      <select class="form-control" name="accountType" id="accountType" required >
                        <option value="">Select One</option>
                        <option <?php echo ($returns['accountType'] == 'Cash')?'selected':''?> value="Cash">Cash</option>
                        <option <?php echo ($returns['accountType'] == 'Bank')?'selected':''?> value="Bank">Bank</option>
                        <option <?php echo ($returns['accountType'] == 'Mobile')?'selected':''?> value="Mobile">Mobile</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Account No *</label>
                      <select class="form-control" name="accountNo" id="accountNo" required >
                        <option value="">Select Account Type First</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Note</label>
                      <input type="text" class="form-control" name="note" value="<?php echo $returns['note']; ?>" >
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                    <a href="<?php echo site_url('Return') ?>" class="btn btn-danger" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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
      $('#productID').on('change',function(){
        var productID = $('#productID option:selected').val();
        //alert(productID);
        var table = 'products';
        var info = {'id':productID,'table':table};
        var base_url = '<?php echo base_url() ?>' + 'Returns/getDetails/';
        
        $.ajax({
          type: 'POST',
          async: false,
          url: base_url,
          data:info,
          dataType: 'json',
          success: function (data) {                            
              $('#mtable tbody').append(data);
              }
          });
        });
    </script>

<script type="text/javascript">
  function totalPrice(id) {
    var pices = parseFloat($('#pices_' + id).val());
    var sold = parseFloat($('#sold' + id).val());
    var returned = parseFloat($('#return' + id).val());
    var salePrice = parseFloat($('#salePrice_' + id).val());
    var remain = sold - returned;
    // alert(remain);
    
    if (pices >= 0 && pices <= remain) {
      var totalPrice = (salePrice.toFixed(2) * pices);
      $('#totalPrice_' + id).val(totalPrice.toFixed(2));
      
      calculateTotalPrice();
    } else {
      if (pices > remain) {
        alert("Value cannot be greater than remaining quantity.");
        $('#pices_' + id).val(remain);
      } else if(pices < 0) {
        alert("Negative amounts are not allowed.");
        $('#pices_' + id).val(remain);
      }
      
       // Revert to $remain
    }
  }

  function calculateTotalPrice() {
    var sum = 0;
    $(".totalPrice").each(function() {
      sum += parseFloat($(this).val());
    });
    $('#totalprice').val(sum.toFixed(2));
  }
</script>



    <script type="text/javascript">
      $(document).ready(function(){
        var value = $("#accountType").val();
        $('#accountNo').empty();
        getAccountNo(value, '#accountNo');
        $('#accountNo').val("<?php echo $returns['accountNo']; ?>");
        });

      var url = '<?php echo site_url('Voucher')?>';

      $('#accountType').on('change',function(){
        var value = $(this).val();
        $('#accountNo').empty();
        getAccountNo(value,'#accountNo');
        });

        function getAccountNo(value,place){
          $(place).empty();
          if(value != '')
            {
            $.ajax({
              url: url+'/getAccountNo',
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
          else {
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

    <script type="text/javascript">
      function discountType(){
        var disc = $('#scharge').val();
        var discc = disc.slice(-1);
        var disca = disc.substring(0, disc.length - 1);
        //alert(disca);
        $('#sctype').val(discc);
        $('#scAmount').val(disca);
        }
    </script>