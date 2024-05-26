<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Bank Book</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bank Book</h3>
            </div>

            <div class="card-body">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div id="print">
                        <?php if($company){ ?>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-4" style="margin-top: 25px;" >
                                <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>" style="height:90px; width:auto;">
                            </div>
                            <div class="col-sm-8 col-md-8 col-8">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <h3><b><?php echo $company->com_name; ?></b></h3>
                                </div>
                                <div class="col-sm-12 col-md-12 col-12">
                                    Address:<?php echo $company->com_address; ?>
                                </div>
                                <div class="col-sm-12 col-md-12 col-12">
                                    Email&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $company->com_email; ?>
                                </div>
                                <div class="col-sm-12 col-md-12 col-12">
                                    Mobile&nbsp;&nbsp;&nbsp;:<?php echo $company->com_mobile; ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div style="text-align: center;"><h3><b>Bank Book</b></h3></div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div>
                                <b>Date : <?php echo date("d-m-Y"). "<br>"; ?></b>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">#SN.</th>
                                            <th>Bank Name</th>
                                            <th>Account Name</th>
                                            <th>Opening Balance</th>
                                            <th style="width: 10%;">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $tba = 0;
                                        foreach ($bank as $value) {
                                        $id = $value['ba_id'];
                                        
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
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $value['bankName']; ?></td>
                                            <td><?php echo $value['accountName'].' - '.$value['accountNo']; ?></td>
                                            <td><?php echo number_format($value['balance'], 2); ?></td>
                                            <td><?php echo number_format((($value['balance']+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta)), 2); $tba += (($value['balance']+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta)); ?></td>
                                        </tr>   
                                        <?php } ?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="text-align: right;">Grand Total</th>
                                            <td><?php echo number_format(($tba), 2); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px">
                        <a href="javascript:void(0)" onclick="printDiv('print')" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
</div>

<?php $this->load->view('footer/footer'); ?>