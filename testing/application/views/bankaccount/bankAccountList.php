<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Bank Account</li>
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
              <h3 class="card-title">Bank Account</h3>
              <button type="button" class="btn btn-primary add_bank" data-toggle="modal" data-target=".bs-example-modal-abank" style="float: right" ><i class="fa fa-plus"></i> New Bank Account</button>
            </div>

            <div class="card-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%;">SN</th>
                            <th style="width: 10%;">ACCOUNT NAME</th>
                            <th style="width: 15%;">ACCOUNT NO</th>
                            <th style="width: 15%;">BANK NAME</th>
                            <th style="width: 10%;">BRANCH NAME</th>
                            <th style="width: 10%;">OPENING</th>
                            <th style="width: 10%;">CURRENT</th>
                            <th style="width: 10%;">STATUS</th>
                            <th style="width: 10%;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $tba = 0;
                        foreach ($bank as $value) {
                        $id = $value['ba_id'];
                        //var_dump($id);
                        $sser = $this->db->select('SUM(pAmount) as total')
                                                          ->from('service_sale')
                                                          ->where('accountType','Bank')
                                                          ->where('accountNo',$id)
                                                        //   ->where('compid',$_SESSION['compid'])
                                                          //->where('saleDate',date("Y-m-d"))
                                                          ->get()
                                                          ->row();
                                              //var_dump($sa); //exit();
                                              if($sser == null){
                                                $sserv = 0;
                                                }
                                              else{
                                                $sserv = $sser->total;
                                                }
                                        
                                        $sa = $this->db->select('SUM(pAmount) as total')
                                                    ->from('sales')
                                                    ->where('accountType','Bank')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($sa); //exit();
                                        if($sa == null){
                                            $saa = 0;
                                            }
                                        else{
                                            $saa = $sa->total;
                                            }
                                        
                                           // money receipt
                                         $smr = $this->db->select('SUM(amount) as total')
                                                      ->from('sales_payment')
                                                      ->where('accountType','Bank')
                                                       ->where('accountNo',$id)
                                                      ->get()
                                                      ->row();
                                          if($smr == null){
                                            $srec = 0;
                                            }
                                          else{
                                            $srec = $smr->total;
                                            }
                                            
                                      $pmr = $this->db->select('SUM(amount) as total')
                                                      ->from('purchase_payment')
                                                      ->where('accountType','Bank')
                                                       ->where('accountNo',$id)
                                                      ->get()
                                                      ->row();
                                          if($pmr == null){
                                            $prec = 0;
                                            }
                                          else{
                                            $prec = $pmr->total;
                                            }
                                        
                                        $pa = $this->db->select("SUM(pAmount) as total")
                                                    ->from('purchase')
                                                    ->where('accountType','Bank')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa);// exit();
                                        if($pa == null){
                                            $paa = 0;
                                            }
                                        else{
                                            $paa = $pa->total;
                                            }
            
                                        $va = $this->db->select("SUM(totalamount) as total")
                                                    ->from('vaucher')
                                                    ->where('accountType','Bank')
                                                    ->where('vauchertype','Credit Voucher')
                                                    ->where('accountNo',$id)
                                                    ->where('status',1)
                                                    ->get()
                                                    ->row();
                                        //var_dump($va); //exit();
                                        if($va == null){
                                            $vaa = 0;
                                            }
                                        else{
                                            $vaa = $va->total;
                                            }
            
                                        $va2 = $this->db->select("SUM(totalamount) as total")
                                                    ->from('vaucher')
                                                    ->where('accountType','Bank')
                                                    ->where_not_in('vauchertype','Credit Voucher')
                                                    ->where('accountNo',$id)
                                                    ->where('status',1)
                                                    ->get()
                                                    ->row();
                                        //var_dump($va2); //exit();
                                        if($va2 == null){
                                            $vaa2 = 0;
                                            }
                                        else{
                                            $vaa2 = $va2->total;
                                            }
                                        $tva = $vaa-$vaa2;
            
                                        $temp = $this->db->select("SUM(paid) as total")
                                                    ->from('employee_payment')
                                                    ->where('accountType','Bank')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($temp); //exit();
                                        if($temp == null){
                                            $tempa = 0;
                                            }
                                        else{
                                            $tempa = $temp->total;
                                            }
            
                                        $tr = $this->db->select("SUM(paidAmount) as total")
                                                    ->from('returns')
                                                    ->where('accountType','Bank')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($tr); //exit();
                                        if($tr == null){
                                            $tra = 0;
                                            }
                                        else{
                                            $tra = $tr->total;
                                            }
                                            
                                        $ptr = $this->db->select("SUM(totalPrice) as total")
                                                          ->from('preturns')
                                                          ->where('accountType','Bank')
                                                          ->where('accountNo',$id)
                                                          //->where('compid',$_SESSION['compid'])
                                                          ->get()
                                                          ->row();
                                              //var_dump($pa); //exit();
                                              if($ptr == null){
                                                $tptr = 0;
                                                }
                                              else{
                                                $tptr = $ptr->total;
                                                }
                                        
                                        $tfbt = $this->db->select("SUM(amount) as total")
                                                    ->from('transfer_account')
                                                    ->where('facType','Bank')
                                                    ->where('facAcno',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa); //exit();
                                        if($tfbt)
                                          {
                                          $tfbta = $tfbt->total;
                                          }
                                        else
                                          {
                                          $tfbta = 0;
                                          }
                                        
                                        $ttbt = $this->db->select("SUM(amount) as total")
                                                    ->from('transfer_account')
                                                    ->where('sacType','Bank')
                                                    ->where('sacAcno',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa); //exit();
                                        if($ttbt)
                                          {
                                          $ttbta = $ttbt->total;
                                          }
                                        else
                                          {
                                          $ttbta = 0;
                                          }

                        $i++;
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['accountName']; ?></td>
                            <td><?php echo $value['accountNo']; ?></td>
                            <td><?php echo $value['bankName']; ?></td>
                            <td><?php echo $value['branchName']; ?></td>
                            <td><?php echo number_format(($value['balance']), 2); ?></td>
                            <td><?php echo number_format((($value['balance']+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta)), 2); $tba += (($value['balance']+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta)); ?></td>
                            <td><?php echo $value['status']; ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs bank_edit" data-toggle="modal" data-target=".bs-example-modal-ebank" data-id="<?php echo $value['ba_id']; ?>" ><i class="fa fa-edit"></i></button>
                                <a href="<?php echo site_url('BankAccount/bank_account_delete').'/'.$value['ba_id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Mobile Account ?');" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>   
                        <?php } ?> 
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="modal fade bs-example-modal-abank" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >Bank Account Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                
                <form action="<?php echo base_url('BankAccount/save_bank_account');?>" method="post">
                    <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-12">
                            <label>Account Name *</label>
                            <input type="text" class="form-control" name="accountName" placeholder="Account Name" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-12">
                            <label>Account No *</label>
                            <input type="text" class="form-control" name="accountNo" placeholder="Account No" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-12">
                            <label>Bank Name *</label>
                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-12">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branchName" placeholder="Branch Name" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-12">
                            <label>Opening Balance</label>
                            <input type="text" class="form-control" name="balance" placeholder="Opening Balance" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                    </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-ebank" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >Bank Transaction Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="<?php echo base_url('BankAccount/update_bank_account');?>" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Account Name *</label>
                            <input type="text" class="form-control" name="accountName" id="accountName" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Account No *</label>
                            <input type="text" class="form-control" name="accountNo" id="accountNo" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Bank Name *</label>
                            <input type="text" class="form-control" name="bankName" id="bankName" required >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branchName" id="branchName" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Account Balance</label>
                            <input type="text" class="form-control" name="balance" id="balance" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                            <label>Status</label>
                            <select class="form-control" name="status" id="status" >
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="bankAccountId" name="bankAccountId" >
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</section>
</div>

<?php $this->load->view('footer/footer'); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".bank_edit").click(function () {
          var catid = $(this).data('id');
            //alert(l_id);
          $('input[name="bankAccountId"]').val(catid);
        });

        $('.bank_edit').click(function() {
          var id = $(this).data('id');
            //alert(id);
          var url = '<?php echo base_url() ?>BankAccount/get_bank_account';
            //alert(url);
            $.ajax({
              method: 'POST',
              url     : url,
              dataType: 'json',
              data    : {'id' : id},
              success:function(data){ 
                //alert(data);
              var HTML = data["accountNo"];
              var HTML2 = data["accountName"];
              var HTML3 = data["bankName"];
              var HTML6 = data["branchName"];
              var HTML4 = data["balance"];
              var HTML5 = data["status"];
            //alert(HTML);
              $("#accountNo").val(HTML);
              $("#accountName").val(HTML2);
              $("#bankName").val(HTML3);
              $("#branchName").val(HTML6);
              $("#balance").val(HTML4);
              $("#status").val(HTML5);
              },
              error:function(){
              alert('error');
              }
            });
        });
      });
    </script>