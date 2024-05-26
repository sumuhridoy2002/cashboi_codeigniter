<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">আমাদের প্রোফেশনাল লজিস্টিক্স্‌‌ সাপোর্ট পেতে সাইন আপ করুন</h2>
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
                        <form action="<?php base_url() ?>admin/Login/register_user" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <input type="text" name="sname" placeholder="Shop Name" class="form-control" required style="color: #000; text-transform: none;" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="Address" class="form-control" required style="color: #000; text-transform: none;" >
                            </div> 
                            <div class="form-group">
                                <input type="text" name="name" placeholder="নাম" class="form-control" required style="color: #000; text-transform: none;" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="মোবাইল নম্বর" class="form-control" required maxlength="11" minlength="11" style="color: #000;" >
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="ইমেল ঠিকানা (Optional)" class="form-control"  style="color: #000; text-transform: none;" >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control" required style="color: #000;" >
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <input type="file" name="userfile" required style="color: #000;" >-->
                            <!--</div>-->
                            <div class="form-group">
                                <button style="background-color: #fac014;" type="submit" class="btn btn-info form-control" style="color:black;" > সাইনআপ করুন</button>
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