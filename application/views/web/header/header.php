<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="hosting-dcv"  content="73edc006ed51ea6c8bf4c5c40abbaabc-b1649f3b6573ad12ac5be2d33ec28fda">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/web/img/logo/logo.jpg">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/plugins/bootstrap-3.3.6/css/bootstrap.min.css">        
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css">
    <!-- Fonts Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/plugins/font-elegant/elegant.css">
    <!-- OwlCarousel2 Slider Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/plugins/owl.carousel.2/assets/owl.carousel.css">

    <!-- Animate Css -->       
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/css/animate.css">

    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/css/style.css">
    <style type="text/css">
      .theme-clr, .hvr-clr:hover, .hvr-clr:focus, a:focus, a:hover, .theme-menu > li:hover > a::after, .theme-menu > li.active > a,
      .list-items li.active a, .header-main .theme-menu .dropdown-menu > li > a:hover, .header-main  .theme-menu .dropdown-menu > li > a:focus {
          color: #ed1c24; 
      }
        .small, .theme-clr-bg, .btn-1, .btn-round:hover, .btn-round:focus, .owl-nav div:hover, .owl-nav div:focus, .theme-menu > li > a::after,
      .header-style3 .menu-bar, .pagintn > li a:hover, .pagintn > li a:focus, .widget-wrap.tag-cloud a:hover, .widget-wrap.tag-cloud a:focus {
          background-color: #25247b;
      }
      .clrbg-before:before, .clrbg-after:after, .social-icons li a:hover, .social-icons li a:focus,
      .pricing-box.active .btn-round {
          background-color: #25247b;
      }
      .banner { border-bottom: 5px solid #ed1c24; }
      .form-control:focus, .themeclr-border, .social-icons li a:hover, .social-icons li a:focus, 
      .btn-round:hover, .btn-round:focus, .pricing-box.active, .pricing-box.active .btn-round {
          border-color: #25247b;
      }
      .customer-info {
         
            font-size: 23px;
            color: #000;
            text-align: left;
            margin-bottom: 24px;
            border-bottom: 2px solid #25247b;
            font-weight: 600;

      }
              ul.timeline {
            list-style-type: none;
            position: relative;
        }
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
        
    .navbar-collapse ul li a{
            color:#fff;
        }
        

   
}
    </style>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/web/fonts/LiShorifJonotaANSIV1.woff">
    
  </head>
  <body id="home" style="color: #000; font-family: lato,sans-serif, SiyamRupali;">
   
    <main class="wrapper">
      <header class="header-main" style=" background: #004AAD;">

        <nav class="menu-bar font2-title1" style=" background: #004AAD;">
          <div class="theme-container container">
            <div class="row" style="display:flex;align-items:center;">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" style="float: left;">
                  <span class="sr-only"> Peng Courier </span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-logo" href="<?php echo base_url() ?>"> <img src="<?php echo base_url(); ?>assets/web/img/logo/cashlg2.png" alt="logo" style="height: 80px; width: 200px; margin-bottom: 10px;" > </a>

                    <!--<a  href="<?php echo base_url('Login'); ?>" style="padding: 5px 20px; background-color: #000; color: #fff; border-radius: 25px;" class="mobile-logs btn"> login </a> -->
              </div>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div id="navbar" class="collapse navbar-collapse no-pad">
                  <ul class="navbar-nav theme-menu">
                    <li>
                     <a href="<?php echo base_url('Home'); ?>" >Home </a>
                    </li>
                    <li>
                     <a href="<?php echo base_url('About'); ?>">about us</a>
                   </li>
                    <li>
                     <a href="<?php echo base_url('Feature'); ?>">Feature</a>
                   </li>
                   <li>
                     <a href="<?php echo base_url('Package'); ?>"> Package</a>
                   </li>
                    <li>
                     <a href="<?php echo base_url('Blog'); ?>"> Blog</a>
                   </li>
                    <li>
                     <a href="<?php echo base_url('Contact'); ?>"> Contact</a>
                   </li>
                   <!--<li></li>-->
                   <!--   <a href="<?php echo base_url('upload/Peng_courier.apk'); ?>" dowanload="dowanload" target="_blank" >Dowanload APPS</a> -->
                   <!-- </li>-->
                    <!--<li>-->
                    <!--  <a href="<?php echo base_url('Login'); ?>">Login </a> -->
                    <!--</li>-->
                    <li>
                      <a class="btn" href="<?php echo base_url('Login'); ?>" style="padding: 5px 20px; background-color: #fff; color:blue; border-radius: 25px;">  Login </a>
                    </li>
                    
                  </ul>
                  
                </div>  
               
              </div>
              
            </div>
          </div>
        </nav>

      </header>