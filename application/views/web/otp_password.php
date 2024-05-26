<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">Enter Your OTP for Reset password</h2>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12"> 
                        <?php
                        $exception = $this->session->userdata('exception');
                        if(isset($exception))
                        {
                        echo $exception;
                        $this->session->unset_userdata('exception');
                        } ?>
                        <form action="<?php base_url() ?>admin/Login/check_otp" method="post" >
                            <div class="form-group">
                                <input type="text" name="otp" placeholder="OTP" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info form-control" type="submit" style="color: #000;" >Reset Password </button>
                            </div>
                        </form>
                        <div>
                            <a href="#"> আগেই সাইনআপ করেছেন ? </a> 
                            <a href="<?php echo base_url('Login'); ?>" class="green-clr"> লগইন করুন </a>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
    </article>

<?php $this->load->view('web/footer/footer'); ?>