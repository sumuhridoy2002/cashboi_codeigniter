<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">আপনার অ্যাকাউন্টে প্রবেশ করতে লগইন করুন</h2>
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
                        <form action="<?php echo base_url('admin/Login/check_forget_password_email');?>" method="POST" >
                            <div class="form-group has-feedback">
                                <input type="text" name="email" required placeholder="Mobile Number" class="form-control" minlength="11" maxlength="11" style="text-transform: none;" >
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button type="submit" name="submit" class="form-control btn btn-primary"  >Send Reset Instructions</button>
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