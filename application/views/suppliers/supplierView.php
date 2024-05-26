<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>
<style>

.button-62:not([disabled]):hover {
  box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}
</style>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
                <h3 class="card-title">Supplier View</h3>
              </div>

              <div class="card-body">
                <div class="row">
                   
                    <div class="col-md-12 col-sm-12 col-12" style="text-align:center;">
                         <img src="<?php echo base_url('assets/dist/img/user.png');?>" style="width: 10%;height: auto;" alt="Supplier Image" >
                     <b> <h3 style=""><?php echo $supplier['supplierName'] ;?></b></h3>
                    </div>  
                    
                  
                  </div>
                  <hr>
                   <div class="row">
                       <div class="col-md-6 col-sm-6 col-12">
                      <?php
                        $id=$supplier['supplierID'];//var_dump($id);exit();  
                      
                         $tsale= $this->db->select("SUM(totalPrice) as ttotal,SUM(paidAmount) as ptotal, SUM(due) as dtotal")
                                          ->from('purchase')
                                          ->where('supplier',$id)
                                          ->get()
                                          ->row();
                                          
                                          
                                                                                                  
                      ?>
                      <table class="table table-bordered table-striped">
                      <tr>
                        <td> Name</td>
                        <td><?php if(isset($supplier['supplierName'])){echo $supplier['supplierName'];}else{echo '';}?></td>
                      </tr>
                      <tr style="background-color: gray; color: white;">
                        <td> Company Name</td>
                        <td><?php if(isset($supplier['compname'])){echo $supplier['compname'];}else{echo '';}?></td>
                      </tr>
                      <tr class="">
                        <td> ID</td>
                        <td><?php if(isset($supplier['sup_id'])){echo $supplier['sup_id'];}else{echo '';}?></td>
                      </tr>
                      <tr style="background-color: gray; color: white;">
                        <td> Mobile</td>
                        <td><?php 
                        if(isset($supplier['mobile'])){echo $supplier['mobile'];}else{echo '';}
                        ?>
                        </td>
                      </tr>
                      <tr class="">
                        <td> Email</td>
                        <td><?php if(isset($supplier['email'])){echo $supplier['email'];}else{echo '';}?></td>
                      </tr>
                      <tr style="background-color: gray; color: white;">
                        <td> Address</td>
                        <td><?php if(isset($supplier['address'])){echo $supplier['address'];}else{echo '';}?></td>
                      </tr>
                      <tr class="">
                        <td> Status</td>
                        <td>
                          <?php 
                         if(isset($supplier['status'])){echo $supplier['status'];}else{echo '';}
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">
                      <table id="example" class="table table-bordered table-striped"  style="text-align:center;">
                          <thead>
                            <tr >
                                <th>SN #</th>
                                <th >Purchases</th>
                                <th >Date</th>
                                <th >Payment Status</th>
                                <th >Amount</th>
                            </tr>
                          </thead>
                           <tbody>
                                    <?php
                                        $i = 0;
                                       
                                        foreach ($supp as $value){
                                        $i++;
                                         if ($value['purchaseID']) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo site_url('viewPurchase').'/'.$value['purchaseID']; ?>"><?php echo $value['challanNo']; ?></td>
                                        <td><?php echo  $value['purchaseDate']; ?></td>
                                        <td><?php if($value['due']==0){
                                            echo '<span style="color:green;">PAID</span>';
                                        }
                                        else{
                                            if($value['paidAmount']==0){
                                                echo '<span style="color:red;">UNPAID</span>';
                                            }
                                            else{
                                                echo '<span style="color:blue;">PARTIAL</span>';
                                            }
                                        }
                                        ; ?></td>
                                        <td>
                                            <?php echo number_format($value['paidAmount'],2); ?>
                                        </td>
                                    </tr>
                      <?php } }?>
                            </tbody>
                          
                      
                    </table>
                  </div>
                  
                </div>
                <div class="col-sm-12 col-md-12 col-12" style="text-align: center;">
                  <a href="<?php echo site_url('Supplier') ?>" class="btn button-62" style="background-color:#fd7e14; color:white;"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php $this->load->view('footer/footer'); ?>