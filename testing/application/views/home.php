<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>
<style type=text/css>
    .diagram {
      height: 100%;
    }
    .col-lg-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 20%;
    }
    .services-list div{
        background: #fff;
        border-radius:10px;
        transition: background 0.5s, transform 0.5s;
    }
    .services-list div:hover{
        background: #fff;
        transform: translateY(-10px);
    }
     @media (max-width: 767px) {
            .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }

        }
</style>
  <div class="content-wrapper">
      <section class="content-header"></section>

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
          <div class="col-12">
            <div class="card">

              <div class="card-body">
      <?php if($_SESSION['role'] > 1){ ?>
                <section class="content">
                  <div class="container-fluid">
                    <!--<div class="box-header with-border">-->
                    <!--  <h2><b>WELCOME TO "<?php echo '<span class="notranslate">'.$_SESSION['compname'].'</span>'; ?>"</b></h2>-->
                    <!--</div>-->
                    
                    <?php $unotice = $this->db->select('*')->from('notice')->order_by('nid','DESC')->limit(1)->get()->row(); ?>
                      <div class="col-md-12 col-sm-12 col-12">
                        <?php if($unotice){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo $unotice->message; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button><br>
                          <a href="<?php echo site_url(); ?>uNotice" style="text-decoration: none;"  >All Notice</a>
                        </div>
                        <?php } ?>
                      </div>
          
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <div class="small-box box1" style="background-color:#DBC4F0;color:black;">
                          <div class="inner">
                            <h3><?php echo number_format($sale->total, 2); ?></h3>
                            <p>TODAY SALES</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-shopping-basket"></i>
                          </div>
                        </div>
                      </div>
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box box1" style="background-color:#FFD1DA;color:black;">
                          <div class="inner">
                            <h3><?php echo number_format($purchase->total, 2); ?></h3>
                            <p>TODAY PURCHASE</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-cart-shopping"></i>
                          </div>
                        </div>
                      </div>
                      
                        <div class="col-lg-3 col-6">
                        <div class="small-box box1" style="background-color:#CAEDFF;color:black;">
                          <div class="inner">
                            <h3><?php echo number_format($cvoucher->total, 2); ?></h3>
                            <p>TODAY COLLECTION</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-comment-dollar"></i>
                          </div>
                        </div>
                      </div>
                      
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box box1" style="background-color:#FBF0B2;color:black;">
                          <div class="inner">
                            <h3><?php echo number_format(($dvoucher->total+$svoucher->total), 2); ?></h3>
                            <p>TODAY EXPENSE</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-funnel-dollar"></i>
                          </div>
                        </div>
                      </div> 
                      
                      
                      
                      <div class="col-lg-3 col-6">
                        <div class="small-box box1" style="background-color:#C1ECE4;color:black;">
                          <div class="inner">
                            <h3><?php $tcash=0;
                             foreach ($cash as $key => $value) {
                                  $id = $value['ca_id'];
                             $tcash+= ($this->pm->cash_calculation($id))+$value['balance'];
                             
                             }
                            echo number_format($tcash,2);?></h3>
                            <p>CASH IN HAND</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-hand-holding-dollar"></i>
                          </div>
                        </div>
                      </div> 
                    </div>
                    
                    <div class="row">
                          <div class="col-lg-6 col-12 small-box" style="background-color:#d2ecfd8a;color:black;">
                              <br><h4 style="text-align:center;font-weight:bold;font-family: Times New Roman, Times, serif;">Top Sale Products</h4>
                              <div class="row" >
                                <?php
                                $i = 0;
                                foreach ($sales as $value){
                                  $i++;
                                  if($i <= 3){
                                ?>
                                <div class="col-4">
                                  <div class="small-box services-list" style="background-color:white;color:black;" >
                                    <div class="inner text-center" style="overflow:hidden;">
                                        <?php if($value->image == null) { ?>
                                        <i class="fa fa-shopping-cart fa-4x" aria-hidden="true" style="color:#88c423c9;"></i>
                                        <?php } else{ ?> 
                                        <img src="<?php echo base_url().'/upload/product/'.$value->image; ?>" style="width: 50px; height: 50px;">
                                        <?php } ?>
                                      <p style="text-align:center;font-weight:bold;"><?php echo $value->productName; ?></p>
                                      <p style="text-align:center;font-size:1.4rem;"><?php echo $value->total.' '.$value->unitName; ?></p>
                                    </div>
                                  </div>
                                </div>
                                <?php }} ?>
                              </div>
                              <div style="text-align:center;">
                                <a href="<?= base_url()?>tsProduct" target="_blank">
                                  <button class="btn" style="background-color:#005af1;text-align:center;color:white !important;margin:10px;">View More</button>
                                </a>
                              </div>
                            </div>

                     
                      <div class="col-lg-6 col-12">
                        <div class="small-box" style="background-color:#e7d6f791;color:black;">
                            <div class="inner table-responsive" id="table-content ">
                                <h4 style="text-align:center;font-weight:bold;font-family: Times New Roman, Times, serif;">Low Stock Products</h4>
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th style="width: 5%;">SN.</th>
                                        <!--<th>Code</th>-->
                                        <th>Name</th>
                                        <th>Quantity</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i = 0;
                                      foreach ($stock as $result){
                                      $i++;
                                      $pid = $result->product;
                                      $cid = $result->compid;
                                      if($i <= 3){
                                      ?>
                                      <tr>
                                        <td style="white-space: nowrap;overflow: hidden;width: 10px;height: 10px;text-overflow: ellipsis;"><?php echo $i; ?></td>
                                        <!--<td style="white-space: nowrap;overflow: hidden;width: 10px;height: 10px;text-overflow: ellipsis;"><?php echo $result->productcode; ?></td>-->
                                        <td style="white-space: nowrap;overflow: hidden;width: 10px;height: 10px;text-overflow: ellipsis;"><?php echo $result->productName; ?></td>
                                        <td style="white-space: nowrap;overflow: hidden;width: 10px;height: 10px;text-overflow: ellipsis;"><?php echo $result->totalPices;?></td>
                                      </tr>
                                      <?php }} ?>
                                    </tbody>
                                  </table>
                                  <div style="text-align:center;">
                                    <a href="<?= base_url()?>lowStock" target="_blank">
                                        <button class="btn" style="background-color:#6b36a0; text-align:center;color:white !important;">View More</button>
                                    </a>
                                </div>
                            </div>
                          <!--<div class="icon">-->
                          <!--  <i class="far fa-money-bill-alt"></i>-->
                          <!--</div>-->
                        </div>
                      </div>
                    </div>
                    
                    <?php 
                
                    $ti = (($tsale->total+$tcvoucher->total)-$return->total)+$service->total;   // total income 
                      $total=0; 
                      foreach($cost as $cs) {
                        $pr=$cs->pprice;
                        $qt=$cs->quantity;
                        $total+= ($pr*$qt); //cost of goods sold
                      }
                      
                      $gp=$ti-$total; // gross profit
                      $te = ($purchase->total+$empp->total+$dvoucher->total+$svoucher->total)-$preturn->total; //total expense
                      $np=$gp-$te; //net profit
    
                      // var_dump($te);
                 ?>
                    <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                      <div class="card text-center diagram">
                        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                      </div>
                    </div>

                 <!-- pie chart -->
                    <div class="col-md-6 col-sm-6 col-12">
                      <div class="card diagram" style="text-align: center;">
                        <h3 style="font-family:Times New Roman"><b>Profit Loss Pie Chart</b></h3>
                      <canvas id="myChart" style=" width: 50%;"></canvas>

                        
                      </div>
                    </div>
                    </div>
                  </div>
                </section>
      <?php } else if($_SESSION['role'] == 1){ ?>
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3><?php echo $user; ?></h3>
                            <p>Total User</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3><?php echo $auser; ?></h3>
                            <p>Active User</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user-friends"></i>
                          </div>
                        </div>
                      </div>
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3><?php echo $iuser; ?></h3>
                            <p>Inactive User</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user-times"></i>
                          </div>
                        </div>
                      </div>
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <h3><?php echo $tuser; ?></h3>
                            <p>New User Today</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user-plus"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3><?php echo $muser; ?></h3>
                            <p>User This Month</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user-plus"></i>
                          </div>
                        </div>
                      </div>
        
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>150</h3>
                            <p>Payments</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                </section>
      <?php } else{ ?>
      <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>

<script type="text/javascript">
 window.onload = function() {

  CanvasJS.addColorSet("greenShades", [
    "#1382d6",
    "#33A02C",
    "#FF7F00",
    "#6A3D9A",
    "#E31A1C",
    "#FDBF6F",
    "#B2DF8A"
  ]);

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light1",
    colorSet: "greenShades",
    title: {
        text: "Last 7 Days Sales",
        fontFamily: "Times New Roman",
        fontWeight: "bold",
        fontSize: 28
      },
    axisY: {
      title: "Products sales amount"
    },
       data: [{
            type: "column",
            yValueFormatString: "#,##0.## Taka",
            dataPoints: 
                <?php echo json_encode($this->pm->graph_data_point(), JSON_NUMERIC_CHECK); ?>
                
          }]
  });
  chart.render();
}

</script>
<script type="text/javascript">
  var gp = <?php echo $gp; ?>;
  var np = <?php echo $np; ?>;
  var te = <?php echo $te; ?>;
  var ti = <?php echo $ti; ?>;
  // alert(te);
  var data = {
  labels: ["Gross Profit", "Total Expense" , "Total Income", "Net Profit "],
  datasets: [
    {
      data: [gp, te, ti, np],
      backgroundColor: ["#b87dee", "#a8ddff", "#FBF0B2", "#ffd1da"]
    }
  ]
};
var ctx = document.getElementById("myChart").getContext("2d");
var myPieChart = new Chart(ctx, {
  type: "pie",
  data: data
});

</script>