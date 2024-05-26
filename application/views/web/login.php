<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="title-wrap">
                            <h2 class="section-title no-margin">আপনার সার্ভিস জন্য সাইন ইন করুন</h2>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12"> 
                    <div class="user-login-form">
                        <h2 style="background-color: #fac014; color:#000" class="section-title no-margin login-form-title"> লগইন করুন</h2>
                            <?php
                            $exception = $this->session->userdata('exception');
                            if(isset($exception))
                            {
                            echo $exception;
                            $this->session->unset_userdata('exception');
                            } ?>
                            <form action="<?php base_url() ?>admin/Login/login_process" method="post" >
                                <!--<div class="form-group">-->
                                <!--    <input type="text" name="mobile" id="otpMobile" placeholder="মোবাইল নম্বর" minlength="11" maxlength="11" class="form-control" style="text-transform: none; color: #000;" required >-->
                                <!--  </div>-->
                                <!--  <div class="form-group" class="" id="otpSend">-->
                                <!--    <button class="btn btn-info form-control" type="button" id="sendOtp" style="color: #000;" onclick="checkOTP(); return false;" >Send OTP </button>-->
                                <!--  </div>-->
                                <!--  <div class="hidden" id="otpPassword">-->
                                <!--    <div class="form-group">-->
                                <!--      <input type="text" name="password" placeholder="OTP" class="form-control" required >-->
                                <!--    </div>-->
                                <!--    <div class="form-group">-->
                                <!--      <button class="btn btn-info form-control" type="submit" style="color: #000;" >সাইন ইন করুন </button>-->
                                <!--    </div>-->
                                <!--  </div>-->
                                <div class="form-group">
                                    <input type="text" name="mobile" placeholder="মোবাইল নম্বর" minlength="11" maxlength="11" class="form-control" style="text-transform: none; color: #000;" required >
                                </div>
                                <div class="form-group">
                                  <input type="password" name="password" placeholder="Password" class="form-control" required >
                                </div>
                                <div class="form-group">
                                  <button class="btn btn-info form-control" type="submit" style="color: #000;" >সাইন ইন করুন </button>
                                </div>
                            </form>
                            <div>
                                <p><a href="<?php echo base_url('fPassword'); ?>" class="green-clr"> পাসওয়ার্ড ভুলে গেছেন ?</a></p>
                                <a href="#"> কোন অ্যাকাউন্ট নেই ? </a> 
                                <a href="<?php echo base_url('Signup'); ?>" class="green-clr"> নতুন অ্যাকাউন্ট তৈরি করুন </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
    </article>

<?php $this->load->view('web/footer/footer'); ?>


    <script type="text/javascript">
      jQuery(document).ready(function($){
        $('#sendOtp').click(function(){
        //alert('Hello');
        var id = $('#otpMobile').val();
        var data = 'id='+ id;
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('admin/Login/send_otp_login') ?>",
          data: data,
          cache: false,
          success: function(result){
              //alert('Hello');
            $('#otpPassword').removeAttr('class','hidden');
            $('#otpSend').attr('class','hidden');
            }
          });
        });
        });
    </script>