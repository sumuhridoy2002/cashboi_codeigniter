<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>
<style>
.button-62:not([disabled]):hover {
    box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}
span {
  content: "\201D";
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notice</li>
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
                            <h3 class="card-title">Notice View</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-12" style="text-align:center;">
                                    <img src="<?php echo base_url('assets/SunshineIT.png');?>"
                                        style="width: 30%;height: auto;" alt="Customer Image">
                                    <!--<b>-->
                                    <!--    <h3 style=""><?php echo $customer['customerName'] ;?>-->
                                    <!--</b></h3>-->
                                </div>
                            </div>
                               
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12" style="text-align:center;">
                                  <h4> Subject: <?php echo $notice['subject']; ?></h4>
                                </div>
                            </div>
                                <hr>
                            <div class="row" >
                                <div class="col-md-2 col-sm-2 col-12"></div>
                                <div class="col-md-8 col-sm-8 col-12" style="padding: 20px; background: #03275c7a  ;border-radius: 1rem;border-style: solid;border-color: #060f1c7d ;">
                                    <div style=" background: #cde2ff; border-radius: 1rem; padding: 30px; border-style: solid;border-color: white;">
                                        <h5><?php echo $notice['message']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-12" ></div>
                            </div><br>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12" style="text-align: center;">
                                    <a href="<?php echo site_url('uNotice') ?>" class="btn button-62"
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