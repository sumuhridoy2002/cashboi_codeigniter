<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

<style>
    .bill_logo{
        margin:5px 5px;
        width: 5%; 
        height: auto; 
        background-color: #fff; 
        padding: 3px; 
        border-radius: 0.3rem; 
        box-shadow: 4px 1px 14px 0px #a2a2a2;
    }
    .bill_logo:hover{
        box-shadow: 4px 1px 14px 0px #ffadad;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pay My Bill</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pay My Bill</li>
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
                            <h3 class="card-title"><b>Package Details</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-8" style="">
                                    <form method="post" action="">
                                        <div class="form-group col-md-12 col-sm-12 col-12">
                                          <input type="radio" id="1" name="basic" value="basic" checked="checked">
                                          <label for="basic" style="margin-bottom:-10px !important;"><h5><b>Basic Package - ( 499 Taka )</b></h5></label><br>
                                          <p>&nbsp &nbsp &nbsp ( 1 Month Plan )</p>
                                        </div>  
                                        <div class="form-group col-md-12 col-sm-12 col-12">
                                          <input type="radio" id="1" name="basic" value="basic">
                                          <label for="basic" style="margin-bottom:-10px !important;"><h5><b>Basic Package - ( 4999 Taka )</b></h5></label><br>
                                          <p>&nbsp &nbsp &nbsp ( 1 Year Plan )</p>
                                        </div>  
                                        <div class="form-group col-md-12 col-sm-12 col-12">
                                          <input type="radio" id="1" name="basic" value="basic">
                                          <label for="basic" style="margin-bottom:-10px !important;"><h5><b>Standard Package - ( 9999 Taka )</b></h5></label><br>
                                          <p>&nbsp &nbsp &nbsp ( 1 Year Plan )</p>
                                        </div>  
                                        <div class="form-group col-md-12 col-sm-12 col-12">
                                          <input type="radio" id="1" name="basic" value="basic">
                                          <label for="basic" style="margin-bottom:-10px !important;"><h5><b>Premium Package - ( 19999 Taka )</b></h5></label><br>
                                          <p>&nbsp &nbsp &nbsp ( 1 Year Plan )</p>
                                        </div>  
                                        
                                      
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12" style="">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td style="border-right:2px solid black;width:10%;">
                                                <b>Pay With</b>
                                            </td>
                                            <td id="bill">
                                                <div style="display: flex;">
                                                    <?php
                                                    $imageSources = [
                                                        base_url() . 'assets/dist/bill/bkash.png',
                                                        base_url() . 'assets/dist/bill/rocket.png',
                                                        base_url() . 'assets/dist/bill/brac.png',
                                                        base_url() . 'assets/dist/bill/dbbl.png',
                                                        base_url() . 'assets/dist/bill/city.png',
                                                        base_url() . 'assets/dist/bill/visa.jpg',
                                                        base_url() . 'assets/dist/bill/master.png',
                                                        base_url() . 'assets/dist/bill/amexp.png',
                                                        base_url() . 'assets/dist/bill/bankasia.jpg',
                                                        base_url() . 'assets/dist/bill/islami.png',
                                                        base_url() . 'assets/dist/bill/ab.png',
                                                        base_url() . 'assets/dist/bill/qcash.png',
                                                        base_url() . 'assets/dist/bill/fast.jpg',
                                                        base_url() . 'assets/dist/bill/mtb.jpg',
                                                        
                                                    ];
                            
                                                    for ($i = 0; $i < 14; $i++) {
                                                        echo '<img src="' . $imageSources[$i % count($imageSources)] . '" class="bill_logo">';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                      
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-12" style="display: flex;align-items: baseline;margin-top:20px;">
                                   <input type="checkbox">
                                      <!--<span class="checkmark"></span>-->
                                    <label class="" style="font-weight: 400;">&nbsp I have read and agree to the website terms and conditions, Privacy policy, Return and Refund Policy *.
                                    </label>
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

