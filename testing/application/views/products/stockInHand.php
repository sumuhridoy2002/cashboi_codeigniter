<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Stock In Hand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Stock In Hand </li>
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
                            <h3 class="card-title">Stock In Hand</h3>
                        </div>

                        <div class="card-body">
                            <!--<div class="col-sm-12 col-md-12 col-12">-->
                            <!--    <form action="<?php echo base_url() ?>stockReport" method="get">-->
                            <!--        <div class="row">-->
                            <!--            <div class="form-group col-md-3 col-sm-3 col-12">-->
                            <!--                <label>Product Type *</label>-->
                            <!--                <select class="form-control" name="puType" required>-->
                            <!--                    <option value="">Select One</option>-->
                            <!--                    <option value="Local">Local</option>-->
                            <!--                    <option value="Import">Import</option>-->
                            <!--                </select>-->
                            <!--            </div>-->
                            <!--            <div class="form-group col-md-3 col-sm-3 col-12">-->
                            <!--                <button type="submit" name="search" class="btn btn-info"-->
                            <!--                    style="margin-top: 30px;"><i-->
                            <!--                        class="fa fa-search-plus"></i>&nbsp;Search</button>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->

                            <div id="print">
                                <div class="row" id="header" style="display: none">
                                    <?php if($company){ ?>
                                    <div class="col-sm-4 col-md-4 col-4" style="margin-top: 30px;">
                                        <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>"
                                            style="width: 100%; height: auto;">
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
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div class="text-center">
                                        <h4><b>Stock In Hand</b></h4>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th style="width: 5%;">#SL.</th>
                                                <!--<th>Date</th>-->
                                                <th>Code</th>
                                                <th>Product</th>
                                                <th>Store</th>
                                                <th>Total Purchase</th>
                                                <th>Total Sale</th>
                                                <th>Current Stock</th>
                                                <!--<th>Closing Stock</th>-->
                                                <!--<th>Rate</th>-->
                                                <!--<th>Average Rate</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $tpq = 0;
                                                $tsq = 0;
                                                $tq = 0;
                                                $tr = 0;
                                                $taq = 0;
                                                
                                                foreach ($stock as $result){
                                                $i++;
                                                $pid = $result->productID;
                                                // $cid = $result->compid;
                                                
                                                $stck = $this->db->select("SUM(totalPices) as tos")
                                                            ->from('stock')
                                                            ->where('product',$pid)
                                                            ->where('compid',$_SESSION['compid'])
                                                            ->get()
                                                            ->row();
                                                            
                                                $store = $this->db->select("SUM(totalPices) as tops")
                                                            ->from('stock_store')
                                                            ->where('product',$pid)
                                                            ->where('compid',$_SESSION['compid'])
                                                            ->get()
                                                            ->row();
                                                
                                                $pp = $this->db->select("purchase_product.*, SUM(quantity) as tp")
                                                            ->from('purchase_product')
                                                            ->where('productID',$pid)
                                                            // ->where('compid',$_SESSION['compid'])
                                                            ->order_by('purchase_product.regdate')
                                                            ->get()
                                                            ->result();
                                                            
                                                $con = $this->db->select("sale_product.*, SUM(sale_product.quantity) as ts")
                                                            ->from('sale_product')
                                                            ->where('productID',$pid)
                                                            // ->where('compid',$_SESSION['compid'])
                                                            ->order_by('sale_product.regdate')
                                                            ->get()
                                                            ->row();
                                                
                                                $tpur = 0;
                                                foreach($pp as $p){
                                                    $tpur += $p->tp;
                                                }
                                                
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><a target="_blank" href="<?php echo site_url('viewProduct').'/'.$pid ?>"><?php echo $result->productcode; ?></a></td>
                                                <td><?php echo $result->productName; ?></td>
                                                <td><?php echo $store->tops; ?></td>
                                                <td>
                                                    <?php foreach($pp as $p){?>
                                                    <?php echo $p->tp;?>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <?php if($con->ts > 0){ ?>
                                                    <?php echo $con->ts;?><br>
                                                    <?php } else {echo '0';}?>
                                                </td>
                                                <td><?php echo $stck->tos;?><br></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>
                            <div class="form-group col-md-12" style="text-align: center;margin-top: 20px">
                                <a href="javascript:void(0)" value="Print" onclick="printDiv('print')"
                                    class="btn btn-primary"><i class="fa fa-print"> </i> Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('footer/footer'); ?>