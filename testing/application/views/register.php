<?php $this->load->view('header/header'); ?>
 <style>
    .login-page{
         background: url(assets/dist/img/cashboi_bg1.jpg)  no-repeat center;
         height:50%;
       background-attachment: fixed;
      background-size: cover;
           
    } 
  .form-control {
    
    color: #000000;
    background-color: #0000;
   
}

.input-group-text {
    
    color: #000000;
    
    background-color: #e9ecef00;
}

label {
    
    color: #000;
}
     
 </style>
<body class="hold-transition login-page">
  <div class="row main-box" style="padding:50px; align-items: center;">
     
    <div class="col-md-1 col-sm-1 col-xs-12" style="background-color: #;"> </div>
      <div class="col-md-4 col-sm-4 col-xs-12"  style="background-color: #d5e6f4; padding:30px; border-radius: 10px; border:1px solid #fff; ">
        <div class="form-group">
         <h3 style="color: #000;"><b>Sign up</b></h3>
        </div>
        <div class="form-group">
          <div class="form-group">
            <!--<p class="login-box-msg">Register a New Membership</p>-->
            <p style="color: #000;">Create Your 7 Days Free Account</p>
            <?php
            $exception = $this->session->userdata('exception');
            if(isset($exception))
            {
            echo $exception;
            $this->session->unset_userdata('exception');
            } ?>
            <br>

            <form action="<?php echo base_url('Login/user_registration'); ?>" method="post">
              <div class="input-group mb-3">
                  
                <input type="text" class="form-control" name="name" placeholder="Business Name" required  >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="mobile" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" placeholder="Mobile Number" required >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-mobile"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="uemail" placeholder="Email ( Optional )" >
                <div class="input-group-append">
                  <div class="input-group-text" id="status" >
                    <span class='fas fa-envelope' ></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" onkeypress="return isNumberKey(event)" id="npassword" placeholder="PIN (Minimum 6 Digit)" minlength="6" required >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="repassword" id="cpassword" onkeyup="checkPass(); return false;" onkeypress="return isNumberKey(event)" placeholder="Retype PIN" required >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" required >
                    <label for="agreeTerms">
                   I agree to the <a href="#">Terms & Condition</a>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
              </div>
            </form>

            <p class="text-center" style="color:#000; margin-top:12px">I already have a membership <a href="<?php echo site_url() ?>Login">Sign In</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="form-group" style="background-color: #dce6f2ab; padding: 35px 35px;border-radius:1rem;  box-shadow:10px 5px 5px #bfbfbfd4;">
             
          <h3 style="color: #000;"><b>Start Your Free Trial</b></h3>
          <p style="color: #000;">No Credit Card Required, No Software To Install.</p>
          <p style="color: #007bff;">With Your 7-Days Trial, You Get</p>
          <p style="color: #000;">Pre-loaded data or upload your own.Pre-configured processes, reports, and dashboards. Guided experiences for sales reps, leaders, and administrators. Online training and live onboarding webinars</p></p>
          
           <img src="<?php echo base_url(); ?>assets/ict-2.png" style="width: 100%;" >
        </div>
      </div> 
      
    </div>
  
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>


    <script type="text/javascript">
      function isNumberKey(evt)
        {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
        }
    </script>

    <script type="text/javascript">
      $('#uemail').on('change',function (){
        var id = $('#uemail').val() ;
        //alert(id);
        var base_url = '<?php echo base_url() ?>'+'Login/check_user_email/';
        //alert(base_url);
        $.ajax({
          type: 'POST',
          async: false,
          url: base_url,
          data:{'id' : id},
          dataType: 'json',
          success: function(data){
          //alert(data);                            
            if(data == 1)
              {
              $('#status').html("<span class='fas fa-envelope' style='color:green;'></span>");
              }
            else{
              $('#status').html("<span class='fas fa-envelope' style='color:red;'></span>");
              }
            }
          });
        });
    </script>

    <script type="text/javascript" >   
      function checkPass()
        { 
        var password = document.getElementById('npassword');
        var confirm_password = document.getElementById('cpassword');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        if(password.value == confirm_password.value)
          {
          confirm_password.style.backgroundColor = goodColor;
          }
        else
          {
          confirm_password.style.backgroundColor = badColor; 
          }
        } 
    </script>