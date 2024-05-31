<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STOCK REPORT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Stock Report</li>
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
                <h3 class="card-title">Product Stock Report</h3>
              </div>

              <div class="card-body">
                <div id="print">
                    <div class="row" id="header" style="display: none" >
                      <?php if($company){ ?>
                      <div class="col-sm-4 col-md-4 col-4" style="margin-top: 30px;">
                        <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>"  style="width: 100%;">
                      </div>
                      <div class="col-sm-8 col-md-8 col-8 text-right">
                        <div class="col-sm-12 col-md-12 col-12">
                          <h3><b><?php echo $company->com_name; ?></b></h3>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                          <b>Address&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_address; ?></b>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                          <b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_email; ?></b>
                        </div>
                        <div class="col-sm-12 col-md-12 col-12">
                          <b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $company->com_mobile; ?></b>
                        </div>
                      </div>
                      <?php } ?>
                    </div><hr>
                    <div class="text-center">
                        <h4><b>Product Stock Report</b></h4>
                    </div>
                  <table id="example" class="table table-bordered" style="width: 100%;" >
                    <thead>
                      <tr>
                        <th style="width: 3%;">SN</th>
                        <th>ITEM</th>
                        <th>CODE</th>
                        <th>STORE</th>
                        <th>PURCHASE QTY</th>
                        <th>SALE QTY</th>
                        <th>RETURN QTY</th>
                        <th>STOCK QTY</th>
                        <th>STOCK SALE VALUE</th>
                        <th>PURCHASE VALUE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  if($stock){

                      $i = 0;
                      $ts = 0;
                      $tpq = 0;
                      $tsq = 0;
                      $tq = 0;
                      $tr = 0;
                      $taq = 0;
                      $taqq = 0;
                      foreach ($stock as $result){
                      $i++;
                      $pid = $result->product;
                      $cid = $result->compid;

                      $pp = $this->db->select("SUM(purchase_product.quantity) as tpq,purchase.compid")
                                    ->from('purchase_product')
                                    ->join('purchase','purchase.purchaseID = purchase_product.purchaseID','left')
                                    ->where('productID',$pid)
                                    ->where('compid',$cid)
                                    ->get()
                                    ->row();
                      if($pp)
                        {
                        $tpp = $pp->tpq;
                        }
                      else
                        {
                        $tpp = 0;
                        }
                      $spp = $this->db->select("SUM(sale_product.quantity) as tsq,sales.compid")
                                    ->from('sale_product')
                                    ->join('sales','sales.saleID = sale_product.saleID','left')
                                    ->where('productID',$pid)
                                    ->where('compid',$cid)
                                    ->get()
                                    ->row();
                      
                      if($spp)
                        {
                        $tspp = $spp->tsq;
                        }
                      else
                        {
                        $tspp = 0;
                        }
                        
                      $rpp = $this->db->select("SUM(returns_product.quantity) as trq,returns.compid")
                                    ->from('returns_product')
                                    ->join('returns','returns.returnId = returns_product.rt_id','left')
                                    ->where('productID',$pid)
                                    ->where('returns.compid',$cid)
                                    ->get()
                                    ->row();
                      if($rpp)
                        {
                        $trpp = $rpp->trq;
                        }
                      else
                        {
                        $trpp = 0;
                        }
                      $sp = $this->db->select("SUM(totalPices) as trq")
                                    ->from('stock_store')
                                    ->where('product',$pid)
                                    ->where('compid',$cid)
                                    ->get()
                                    ->row();
                      if($sp)
                        {
                        $tsp = $sp->trq;
                        }
                      else
                        {
                        $tsp = 0;
                        }
                      
                      $taqnt = ($tpp+$tsp+$trpp)-$tspp;
                      
                      $this->pm->update_stock_product($pid,$taqnt);
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result->productName; ?></td>
                        <td><a target="_blank" href="<?php echo site_url('viewProduct').'/'.$pid ?>"><?php echo $result->productcode; ?></a></td>
                        <td>
                          <?php echo $tsp; $ts += $tsp; ?>
                        </td>
                        <td>
                          <?php echo $tpp; $tpq += $tpp; ?>
                        </td>
                        <td>
                          <?php echo $tspp; $tsq += $tspp; ?>
                        </td>
                        <td>
                          <?php echo $trpp; $tr += $trpp; ?>
                        </td>
                        <td>
                          <?php echo $taqnt; $tq += $taqnt ?>
                            <?php 
                            // echo $result->totalPices; $tq += $result->totalPices; 
                            
                            ?>
                        </td>
                        <td><?php echo number_format(($tspp*$result->sprice), 2); $taqq += ($tspp*$result->sprice); ?></td>
                        <td><?php echo number_format(($result->avg_purchase), 2); $taq += ($result->avg_purchase); ?></td>
                      </tr>
                      <?php } }
                      else{
                        $i=0;
                      }?>

                      <?php
                    $j = $i;
                    foreach ($service as $result){
                    $j++;
                    
                    ?>
                    <tr>
                     <td><?php echo $j; ?></td>
                     <td><?php echo $result['siName'] ?></td>
                        <td><a target="_blank" href="<?php echo site_url('viewProduct').'/'.$pid ?>"><?php echo $result['siCode']; ?></a></td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td><?php echo number_format(($result['siPrice']), 2); $taqq += ($result['siPrice']); ?></td>
                        <td>0.00</td>
                    </tr>   
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3" style="text-align: right;" >Total</th>
                        <th><?php echo $ts; ?></th>
                        <th><?php echo $tpq; ?></th>
                        <th><?php echo $tsq; ?></th>
                        <th><?php echo $tr; ?></th>
                        <th><?php echo $tq; ?></th>
                        <th><?php echo number_format($taqq, 2); ?></th>
                        <th><?php echo number_format($taq, 2); ?></th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- Pagination -->
                  <?php echo $pagination_html; ?>
                </div><br>
                <div class="form-group col-md-12" style="text-align: center;margin-top: 20px">
                  <a href="javascript:void(0)" style="width: 100px;" value="Print" onclick="printDiv('print')" class="btn btn-primary"><i class="fa fa-print"> </i>  Print</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>