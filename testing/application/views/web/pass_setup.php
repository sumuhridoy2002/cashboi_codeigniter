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
                        <form action="<?php echo base_url('admin/Login/save_passord_setup');?>" method="POST" enctype="multipart/form-data" >
                          <div class="form-group has-feedback">
                            <label>New Password</label>
                            <input type="password" name="npassword" id="npassword" required placeholder="New Password" class="form-control" style="border-radius: 5px;" minlength="6" maxlength="20" >
                          </div>
                          <div class="form-group has-feedback">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm Password" class="form-control" onkeyup="checkPass(); return false;" style="border-radius: 5px;" minlength="6" maxlength="20" >
                          </div>
                          <div class="form-group" style="text-align: center;">
                            <button type="submit" name="submit" class="form-control btn btn-primary" style="border-radius: 15px;" ><i class="fa fa-sign-in" ></i> Password Setup</button>
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

<script type="text/javascript" >   
      function checkPass()
        { 
        var npassword = document.getElementById('npassword');
        var cpassword = document.getElementById('cpassword');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        if(npassword.value == cpassword.value)
          {
          cpassword.style.backgroundColor = goodColor;
          }
        else
          {
          cpassword.style.backgroundColor = badColor; 
          }
        } 
    </script>