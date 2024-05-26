<?php $this->load->view('header/header'); ?>

<style>
      .login-page{
          background: url(assets/dist/img/cashboi_bginv.jpg)  no-repeat center;
       background-attachment: fixed;
      background-size: cover;
        /*  background-repeat: no-repeat,*/
        /* background-attachment: fixed;*/
        /*background-position: center;*/
        /* background-size: cover;*/
          
      
    } 
    
    .card {
   
    background-color: #c0d2e754;
    border-radius:1rem;
    box-shadow:10px 5px 5px #bfbfbfd4;
        
    }
    
    .login-card-body, .register-card-body {
    background: #c0d2e754;
    border-radius:1rem;
    color: #000;
}

.fa-classic, .fa-regular, .fa-solid, .far, .fas {
    font-family: "Font Awesome 6 Free";
    color: #000;
}

.login-card-body .input-group .form-control, .register-card-body .input-group .form-control {
    border-right: 0;
    background: #fff0;
    color: black !important;
}
.btn-success {
    color: #fff;
    background-color: #007bff;
    border-color:#007bff;
    box-shadow: none;
}
</style>

  <body class="hold-transition login-page">
    <div class="row" style="padding:20px;display:flex;align-items: center;">
      <div class="col-md-1 col-sm-1 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12"  style="padding:30px; border-radius: 10px; border:1px solid #fff;margin-top: -25px; ">
      <div class="login-logo">
        <img src="<?php echo base_url(); ?>assets/cashboi_login.jpg" style="width: 100%;" alert="logo" >
      </div> 
      <div class="card">
        <div class="card-body login-card-body">
          <h4 class="login-box-msg" style="text-align: left;">Login your Business Area</h4>
          <?php
          $exception = $this->session->userdata('exception');
          if(isset($exception))
          {
          echo $exception;
          $this->session->unset_userdata('exception');
          } ?>

          <form action="<?php echo base_url('Login/loginProcess'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Phone Number or Email" required >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="" style="display: flex;">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
            </div>
          </form>

          <p class="mb-1" style="margin:20px 0px;">
            <a href="<?php echo base_url(); ?>forgetPassword">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a style="color: #1c43b5;"  href="<?php echo base_url(); ?>signUp" class="text-center">Don't have any account <u>Register now!</u></a>
          </p>
          <p>
            <!-- <h4 style="margin-top:40px;"><b>Powered By</b></h4>
            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <img src="<?php echo base_url(); ?>assets/ict-2.png" style="width: 100%;" alert="logo" >
              </div>
              
            </div>
          </p> -->
        </div>
      </div>
      </div> 
      <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="form-group" style="background-color: #dce6f2ab; padding: 35px 35px;border-radius:1rem;  box-shadow:10px 5px 5px #bfbfbfd4;">
          <h3 style="color: #767373;" ><b>For Admin Confirmation Please Contact Admin (Call: +8801714044180)</b></h3>
          <p><b style="color: #4b75a7;">With Your Trial, You Get: </b></p>
          <p style="font-size: 18px; color: #000;">Preloaded data or upload your own. Preconfigured processes, reports, and dashboards. Guided experiences for sales reps, leaders, and administrators. Online training and live onboarding webinars</p>
          <a class="btn btn-success form-control" href="<?php echo base_url(); ?>signUp" >START YOUR BUINESS WITH US</a>
          
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