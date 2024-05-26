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
                    <h1>Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer</li>
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
                            <h3 class="card-title">Customer View</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 col-sm-6 col-12" style="text-align:center;">
                                    <img src="<?php echo base_url('assets/dist/img/user.png');?>"
                                        style="width: 45%;height: auto; margin-top: 20px;" alt="Customer Image">
                                    <b>
                                        <h3 style=""><?php echo $customer['customerName'] ;?>
                                    </b></h3>
                                </div>
                                <div class="col-md-6 col-sm-6 col-12">
                                    <?php
                        $id=$customer['customerID'];//var_dump($id);exit();  
                      
                         $tsale= $this->db->select("SUM(totalAmount) as ttotal,SUM(paidAmount) as ptotal, SUM(dueamount) as dtotal")
                                          ->from('sales')
                                          ->where('customerID',$id)
                                          ->get()
                                          ->row();
                                          
                                          
                                                                                                  
                      ?>
                                    <table class="table table-bordered">
                                        <tr class="" style="background-color: #808080; color: white">
                                            <td> Name</td>
                                            <td><?php if(isset($customer['customerName'])){echo $customer['customerName'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr class="" style="background-color: #808080; color: white">
                                            <td> Company Name</td>
                                            <td><?php if(isset($customer['custCompany'])){echo $customer['custCompany'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> ID</td>
                                            <td><?php if(isset($customer['cus_id'])){echo $customer['cus_id'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #808080; color: white">
                                            <td> Type</td>
                                            <td><?php if($customer['custType'] == 2) { ?>
                                                <?php echo 'Wholesale'; ?>
                                                <?php } else{ ?> 
                                                <?php echo 'General'; ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> Mobile</td>
                                            <td><?php if(isset($customer['mobile'])){echo $customer['mobile']." ; ".$customer['custMobile'];}else{echo '';}  ?></td>
                                        </tr>
                                        <tr style="background-color: #808080; color: white">
                                            <td> Email</td>
                                            <td><?php if(isset($customer['email'])){echo $customer['email'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <!--<tr class="">-->
                                        <!--    <td> City</td>-->
                                        <!--    <td><?php if(isset($customer['city'])){echo $customer['city'];}else{echo '';}  ?></td>-->
                                        <!--</tr>-->
                                        <tr class="">
                                            <td> Address</td>
                                            <td>
                                                <?php 
                                                if($customer['address']){$str1= $customer['address'].',';} else { $str1=' ';}
                                                if($customer['upName']){$str2= $customer['upName'].',';} else { $str2=' ';}
                                                if($customer['dsName']){$str3= $customer['dsName'].',';} else { $str3=' ';}
                                                if($customer['dbName']){$str4= $customer['dbName'];} else { $str4=' ';}
                                                echo $str1.$str2.$str3.$str4; ?>
                                                
                                            </td>
                                        </tr>
                                        <tr style="background-color: #808080; color: white">
                                            <td> Previous</td>
                                            <td><?php if(isset($customer['balance'])){echo $customer['balance'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #808080; color: white">
                                            <td> Credit Limit</td>
                                            <td><?php if(isset($customer['custLimit'])){echo $customer['custLimit'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> Territory</td>
                                            <td><?php if(isset($customer['trCode'])){echo $customer['trCode'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td> Note</td>
                                            <td><?php if(isset($customer['custNotes'])){echo $customer['custNotes'];}else{echo '';}?>
                                            </td>
                                        </tr>
                                        
                                        <tr style="background-color: #808080; color: white">
                                            <td> Status</td>
                                            <td>
                                                <?php 
                         if(isset($customer['status'])){echo $customer['status'];}else{echo '';}
                          ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                 
                                <div class="col-md-6 col-sm-6 col-12">
                                    <table class="table table-bordered table-striped" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>SN #</th>
                                                <th>Invoices</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                           
                                            foreach ($cust as $value){
                                            $i++;
                                            if($value['saleID']){
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><a href="<?php echo site_url('viewSale').'/'.$value['saleID']; ?>"><?php echo $value['invoice_no']; ?>
                                                </td>
                                                <td><?php echo  $value['saleDate']; ?></td>
                                                <td><?php 
                                            if($value['invoice_no']){
                                            if($value['dueamount']==0){
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
                                            }
                                            ; ?></td>
                                            </tr>
                                        <?php } } ?>
                                        </tbody>


                                    </table>
                                </div>
                                 
                                
                                  
                                   
                                <div class="col-md-3 col-sm-3 col-12">
                                    <table class="table table-bordered table-striped" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>SN #</th>
                                                <th>Transactions</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 0;
                                       
                                        foreach ($cust2 as $value){
                                        $i++;
                                         if ($value['vuid']) { 
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><a href="<?php echo site_url('viewVoucher').'/'.$value['vuid']; ?>"><?php echo $value['invoice']; ?>
                                                </td>
                                                <td><?php echo  $value['voucherdate']; ?></td>
                                            </tr>
                                        <?php } } ?>
                                        </tbody>


                                     
                                    </table>
                                </div>
                                     
                                      
                                 <div class="col-md-3 col-sm-3 col-12">
                                    <table class="table table-bordered table-striped" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>SN #</th>
                                                <th>Quotations</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 0;
                                       
                                        foreach ($cust3 as $value){
                                        $i++;
                                        if ($value['qutid']) { 
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><a href="<?php echo site_url('viewQuotation').'/'.$value['qutid']; ?>"><?php echo $value['qinvoice']; ?>
                                                </td>
                                                <td><?php echo  $value['quotationDate']; ?></td>
                                            </tr>
                                        <?php } 
                                        
                                        } ?>
                                        </tbody>


                                    </table>
                                </div>
                                
                            </div>
                            <div class="col-sm-12 col-md-12 col-12" style="text-align: center;">
                                <a href="<?php echo site_url('Customer') ?>" class="btn button-62"
                                    style="background-color:#fd7e14; color:white;"><i class="fa fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->load->view('footer/footer'); ?>