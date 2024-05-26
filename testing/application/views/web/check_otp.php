<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">অ্যাকাউন্ট যাচাই করার জন্য আপনার ওটিপি টাইপ করুন</h2>
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
                        <form action="<?php base_url() ?>admin/Login/save_otp_checked" method="post" >
                            <div class="form-group">
                                <input type="text" name="otp" placeholder="OTP" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info form-control" type="submit" style="color: #000;" >Account Verify</button>
                            </div>
                        </form>
                        <div>
                            <a href="#"> কোন অ্যাকাউন্ট নেই ? </a> 
                            <a href="<?php echo base_url('Signup'); ?>" class="green-clr"> নতুন অ্যাকাউন্ট তৈরি করুন </a>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
    </article>

<?php $this->load->view('web/footer/footer'); ?>