<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                <h3 class="card-title">Money Receipt Information</h3>
              </div>

              <div class="card-body">
                <div class="invoice p-3 mb-3">
                  <div id="print">
                    <?php if($company){ ?>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <div style="display: flex;align-items: center;">
                                        <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>" style="height: 90px; width:auto; margin-right: 25px;">
                                    </div>
                                    <div style="text-align:center;">
                                        <h3><b><?php echo $company->com_name; ?></b></h3>
                                    
                                        <span><?php echo $company->com_address; ?></span><br>
                                    
                                        <?php echo $company->com_mobile; ?><br>
                                    
                                        Email :&nbsp;<?php echo $company->com_email; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                    <hr style="width: 100%; text-align: left; margin-left: 0; background-color: #4f7893;">

                    <div class="row">
                    <div class="col-md-8 col-12" style="background-color: ;">
                      <table class="table table-borderless" style="border-color: white;">
                        <tr style="line-height:13px !important;">
                          <td colspan="2" ><h5><u><b>Money Receipt To</b></u></h5></td>
                        </tr>
                        <tr style="line-height:13px !important;">
                          <td><b>Name</b></td>
                          <td><?php echo ": ".$prints['customerName']; ?></td>
                        </tr>
                        <tr style="line-height:13px !important;">
                          <td><b>Address</b></td>
                          <td><?php echo ": ".$prints['address']; ?></td>
                        </tr>
                        <tr style="line-height:13px !important;">
                          <td><b>Phone No</b></td>
                          <td><?php echo ": ".$prints['mobile']; ?></td>
                        </tr>
                        <tr style="line-height:13px !important;">
                          <td><b>Email</b></td>
                          <td><?php echo ": ".$prints['email']; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4 col-12" style="text-align: center; padding-top: 80px;">
                      <div class="" style="background-color: #dae6ed; padding: 20px; border-radius: 5rem;">
                        <h4>Money Receipt</h4>
                      </div>
                    </div>
                  </div> 
                                    
                  <div class="col-md-12 col-sm-12 col-12">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th style="text-align: left;">Date</th>
                          <th style="text-align: left;">Amount</th>
                          <th style="text-align: left;">Account</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        $stotal = 0;
                        foreach($salesp as $value){
                        $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($value['regdate'])); ?></td>
                          <td><?php echo number_format($value['amount'], 2); $stotal += $value['amount']; ?></td>
                          <td><?php echo $value['accountType']; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tbody>
                        <tr>
                          <td colspan="2" align="right">Total Amount</td>
                          <td><b><?php echo number_format($stotal, 2); ?></b></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><br><br>
                                    
                  <div class="col-md-12 col-sm-12 col-12" >
                    <div class="row"style="padding-left: 50px; padding-top: 10px; ;width:100%; margin-top:5px; margin-left: 30px;">
                      <div class="col-md-6 col-sm-6 col-6 text-center">
                        <p>_________________________</p>
                        <p>Received By</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-6 text-center">
                        <p>_________________________</p>
                        <p>Accepted By</p>
                      </div>
                    </div>
                  </div>

                  </div>
                  <div class="row no-print">
                    <div class="col-12" style="text-align: center;">
                      <a href="javascript:void(0)" class="btn btn-primary" onclick="printDiv('print')"><i class="fas fa-print"></i>Print</a>
                      <a href="<?php echo site_url('Sale') ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
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

<?php
      function convertNumber($number){
        $words = array(
          '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty');
    
        $number_length = strlen($number);

        $number_array = array(0,0,0,0,0,0,0,0,0);        
        $received_number_array = array();
    
        for($i=0;$i<$number_length;$i++)
          {    
          $received_number_array[$i] = substr($number,$i,1);    
          }
        
        for($i=9-$number_length,$j=0;$i<9;$i++,$j++)
          { 
          $number_array[$i] = $received_number_array[$j]; 
          }
        $number_to_words_string = "";

        for($i=0,$j=1;$i<9;$i++,$j++)
          {
          if($i==0 || $i==2 || $i==4 || $i==7)
            {
            if($number_array[$j]==0 || $number_array[$i] == "1")
              {
              $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
              $number_array[$i] = 0;
              }
            }
          }
        $value = "";
        for($i=0;$i<9;$i++)
          {
          if($i==0 || $i==2 || $i==4 || $i==7)
            {    
            $value = $number_array[$i]*10; 
            }
          else
            { 
            $value = $number_array[$i];    
            }            
          if($value!=0)
            {
            $number_to_words_string.= $words["$value"]." ";
            }
          if($i==1 && $value!=0)
            {
            $number_to_words_string.= "Crores ";
            }
          if($i==3 && $value!=0)
            {
            $number_to_words_string.= "Lakhs ";
            }
          if($i==5 && $value!=0)
            {
            $number_to_words_string.= "Thousand ";
            }
          if($i==6 && $value!=0)
            {
            $number_to_words_string.= "Hundred ";
            }            
          }
        if($number_length>9)
          {
          $number_to_words_string = "Sorry This does not support more than 99 Crores";
          }
        return ucwords(strtolower($number_to_words_string));
        }
    ?>

<script type="text/javascript">
function printpDiv(divName) {
    $('#pprint').show();
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>