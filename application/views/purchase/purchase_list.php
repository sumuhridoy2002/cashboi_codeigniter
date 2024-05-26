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
            <h1>Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">PURCHASE</li>
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
                <h3 class="card-title">PURCHASE LIST</h3>
                <?php if($_SESSION['new_purchase'] == '1') { ?>
                <a href="<?php echo site_url('newPurchase'); ?>" class="btn btn-primary" style="float: right;" ><i class="fa fa-plus"></i>&nbsp;New Purchase</a>
                <?php } ?>
              </div>

              <div class="card-body table-responsive">
                <table id="example" class="table table-bordered" style="width:100%;" >
                  
                  <thead>
                    <tr style="text-transform:uppercase; text-align:center">
                      <th style="width: 5%;">SN</th>
                      <th>PURCHASE No</th>
                      <th>DATE & Time</th>
                      <th>staff</th>
                      <th>SUPPLIER</th>
                      <th style="width: 15%;">PRODUCT NAME</th> 
                      <th>QTY</th>
                      <!-- <th style="width: 10%;">Unit Price</th> -->
                      <th>TOTAL</th>
                      <th>PAID</th>
                      
                      <th>DUE</th>
                      
                      <!-- <th>Status</th> -->
                      
                      <th style="width: 10%;">OPTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($purchase as $value){
                    $i++;
                    $pp = $this->db->select('purchase_product.quantity,products.productName,products.productcode')
                                  ->from('purchase_product')
                                  ->join('products','products.productID=purchase_product.productID','left')
                                  ->where('purchaseID',$value['purchaseID'])
                                  ->get()
                                  ->result();
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><a href="<?php echo site_url('viewPurchase').'/'.$value['purchaseID']; ?>"><?php echo $value['challanNo'] ?></a></td>
                      <td><?php echo $value['regdate'] ?></td>
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo $value['supplierName']; ?><br><?php echo $value['mobile']; ?></td>
                       <td>
                        <?php foreach ($pp as $p) { ?>
                        <?php echo $p->productName; ?><br>
                        <?php } ?>
                      </td> 
                      <td>
                         <?php foreach ($pp as $p) { ?>
                        <?php echo $p->quantity; ?><br>
                        <?php } ?> 
                        <?php //echo $pp->tq; ?>
                      </td>
                      <!-- <td>
                        <?php foreach ($pp as $p) { ?>
                        <?php echo number_format($p->pprice, 2); ?><br>
                        <?php } ?>
                      </td> -->
                      <td><?php echo number_format($value['totalPrice'], 2) ?></td>
                      <td><?php echo number_format($value['paidAmount'], 2) ?></td>
                      
                      <td style="color:RED;"><?php echo number_format($value['due'], 2); ?></td>
                      
                      <!-- <td>
                        <?php
                        if($value['due'] == 0){
                          echo '<span style="color:green">Paid</span>';
                        }elseif ($value['due'] < $value['totalPrice']) {
                          echo '<span style="color:red">Partial</span>';
                        }else{
                          echo '<span style="color:red">Due</span>';
                        } ?>
                      </td> -->
                      
                      <td>
                        <div class="input-group input-group-md mb-3">
                          <div class="input-group-prepend">
                              <!--<?php var_dump($value['purchaseID']);?>-->
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Option </button>
                            <ul class="dropdown-menu">
                            <?php if($_SESSION['view_purchase'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('viewPurchase').'/'.$value['purchaseID']; ?>"><i class="fa fa-eye"></i> View</a></li>
                              <li class="dropdown-divider"></li>
                            <?php } if($_SESSION['edit_purchase'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('editPurchase').'/'.$value['purchaseID']; ?>"><i class="fa fa-edit"></i> Edit</a></li>
                              <li class="dropdown-divider"></li>
                            <?php } if($_SESSION['delete_purchase'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('Purchase/delete_purchases').'/'.$value['purchaseID']; ?>" onclick="return confirm('Are you sure you want to Delete this Purchase ?');" ><i class="fa fa-trash"></i> Delete</a></li>
                            <?php } ?> 
                              <?php if($value['due'] > 0){ ?>
                              <li class="dropdown-divider"></li>
                              <li class="dropdown-item">
                                <a href="#" class="payment" data-toggle="modal" data-target=".bs-example-modal-payment" data-id="<?php echo $value['purchaseID']; ?>"><i class="fa fa-plus"></i> Payment</a>
                              </li>
                              <?php } ?> 
                            </ul>
                          </div>
                        </div>
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
  </div>

    <div class="modal fade bs-example-modal-payment" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" > Add Due Payment</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url('Purchase/save_purchase_payment');?>" method="post">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label>Due Amount</label>
                <input type="text" class="form-control" name="damount" id="damount" readonly >
              </div>
              <input type="hidden" class="form-control" name="pamount" id="pamount" >
              <div class="form-group">
                <label>Paid Amount *</label>
                <input type="text" class="form-control" name="amount" placeholder="Amount" required >
              </div>
              <div class="form-group col-md-12 col-sm-12 col-12">
                  <label>PAYMENT MODE *</label>
                  <select class="form-control" name="accountType" id="accountType" required >
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                    <option value="Mobile">Mobile</option>
                  </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-12">
                  <label>ACCOUNT *</label>
                  <select class="form-control" name="accountNo" id="accountNo" required >
                    <option value="">Select Account Type First</option>
                  </select>
                </div>
            </div>
            <input type="hidden" id="purchaseID" name="purchaseID" >
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="pbsubmit" ><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<?php $this->load->view('footer/footer'); ?>


    <script type="text/javascript">
      $(document).ready(function(){
        $(".payment").click(function(){
          var id = $(this).data('id');
        //alert(l_id);
          $('input[name="purchaseID"]').val(id);
          });

        $('.payment').click(function(){
          var id = $(this).data('id');
            //alert(id);
          var url = '<?php echo base_url() ?>Purchase/get_purchase_payment';
            //alert(url);
          $.ajax({
            type: 'POST',
            async: false,
            url: url,
            data:{"id":id},
            dataType: 'json',
            success: function(data){
            //alert(data);
              var HTML = data["due"];
              var HTML2 = data["paidAmount"];
            //alert(HTML2);
              $("#damount").val(HTML);
              $("#pamount").val(HTML2);
              },
            error:function(){
              alert('error');
              }
            });
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
    
      $('#accountType').on('change',function(){
        var value = $(this).val();
        $('#accountNo').empty();
        getAccountNo(value, '#accountNo');
        });
        
        function getAccountNo(value,place){
          $(place).empty();
          if(value != ''){
              //alert(value);
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