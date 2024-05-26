
<style>
    .goog-te-gadget-simple {
        border-radius: 20px;
        padding: 5px;
    }
    .goog-te-gadget-simple:hover {
        box-shadow: 0 0 4px 0px #4fd408;
    }
    .goog-te-banner-frame {
      display: none !important;
    }
    .notification-badge {
        position: absolute;
        top: 4px;
        right: 6px;
        background-color: red;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .nav-pills .nav-link {
        color: black;
    }
        .nav-pills:hover {
        color: #b54dc9 !important;
    }
         .nav-link:hover {
        color: #b54dc9 !important;
    }
     .navbar-nav .nav-link {
        color: rgb(0 0 0);
    }
    .menu-open :hover {
        color: white !important;
        background-color: #6b36a0 !important;
    }
    .n-icon:hover{
        color:#b54dc9 !important;
    }


  </style>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if($_SESSION['role'] > 1){ ?>
        <li class="nav-item">
            <div class="nav-link" id="google_translate_element"></div>
        </li>
        <?php if($_SESSION['notice'] == '1') { ?>
        
        <?php
        $pwhere = array(
            'compid' =>  $_SESSION['compid']
            );
        
        $product = $this->pm->get_data('products',$pwhere);
        $stock_count=0;
        if($product){
        foreach($product as $pro){
            $stock = $this->db->select('*')
                              ->from('stock')
                              ->where('totalPices <',$pro['alertqty'])
                              ->where('compid', $_SESSION['compid'])
                              ->get()
                              ->result();
        }
      
        if($stock){
            $stock_count = count($stock);}
        }
            else{
                $stock_count=0;
            }
            // var_dump($stock_count);
        
        ?>
        <li class="nav-item">
                <div class="nav-link" id="alert" style="font-size: 1.5rem; margin-top: -5px;">
                    <a href="<?php echo base_url(); ?>lowStock" style="color: #4bcbf4;" class="n-icon">
                        <i class="fas fa-exclamation-circle" title="Stock Alert"></i>
                        <span class="notification-badge"><?php echo $stock_count; ?></span> 
                    </a>
                </div>
            </li>
            <?php
          $query = $this->db->select('nid')
                  ->from('notice')
                  ->where('ntype','All')
                  ->get();
        if($query){
            $notice_count = $query->num_rows();
        }else{
             $notice_count = 0;
        }

          ?>
        <li class="nav-item">
          <div class="nav-link" style="font-size: 1.5rem;margin-top: -5px;">
              <a href="<?php echo base_url() ?>uNotice" style="color: #4bcbf4;" class="n-icon">
                   <i class="fas fa-bell " title="Notice"></i>
                  <span class="notification-badge"><?php echo $notice_count; ?></span>
              </a>
            
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link" style="font-size: 1.5rem;margin-top: -5px;">
              <a href="<?php echo base_url() ?>Setting" style="color: #4bcbf4;" class="n-icon">
                   <i class="fas fa-cog" title="Settings"></i>
              </a>
            
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link" style="font-size: 1.5rem;margin-top: -5px;">
              <a href="<?php echo base_url() ?>uReport" style="color: #4bcbf4;" class="n-icon">
                   <i class="fas fa-folder-open " title="Reports"></i>
              </a>
            
          </div>
        </li>
        <li class="nav-item">
        <?php if($_SESSION['role'] > 1){ ?>
          <a class="nav-link" href="<?php echo base_url(); ?>posSales" style="background-color: #d2f4ff; padding: 7px 10px 10px 10px; border-radius: 20px; color: #000;" >
              <i class="fa fa-th-large"></i> 
              POS
          </a>
        <?php } ?>
          </a>
        </li>
        <!--<li class="nav-item dropdown">-->
        <!--  <a class="nav-link" data-toggle="dropdown" href="#">-->
        <!--    <i class="far fa-bell"></i>-->
        <!--    <span class="badge badge-warning navbar-badge">0</span>-->
        <!--  </a>-->
        <!--  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
        <!--    <span class="dropdown-item dropdown-header">00 Notifications</span>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
        <!--      <i class="fas fa-envelope mr-2"></i>0 new messages-->
        <!--      <span class="float-right text-muted text-sm">0 mins</span>-->
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="<?php echo base_url() ?>uNotice" class="dropdown-item dropdown-footer">See All Notifications</a>-->
        <!--  </div>-->
        <!--</li>-->
        <?php } } ?>
        <li class="nav-item dropdown">
          <a class="nav-link notranslate" data-toggle="dropdown" href="#"><?= $_SESSION['name'] ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?php echo base_url(); ?>myProfile" class="dropdown-item">
              My Profile
            </a>
        <?php if($_SESSION['role'] == 2){ ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>comProfile" class="dropdown-item">Company Profile</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>uBill" class="dropdown-item">My Bill History</a>
        <?php } ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>aSetting" class="dropdown-item">
              Password Change
            </a>
            <a href="<?php echo base_url(); ?>Login/logout" class="dropdown-item">
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
  <!-- /.navbar -->

      <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #d2f4ff; ">
      <a href="<?php echo base_url(); ?>Dashboard" class="brand-link" style="text-align: center;margin-bottom: -20px !important;">
           <?php $company = $this->db->select("*")->FROM('com_profile')->WHERE('compid',$_SESSION['compid'])->get()->row(); ?>
        <img src="<?php echo base_url().'upload/company/'.$company->com_logo; ?>" alt="Logo" class="" style="width: 60%; height: auto;" />
        <!--<span class="notranslate brand-text" style="color:black"><?= $_SESSION['compname'] ?></span>-->
      </a>

    <!-- Sidebar -->
      <div class="sidebar">
        <div class="mt-3 mb-3" style="text-align: center;">
    <?php if($_SESSION['role'] > 1){ ?>
          <!--<a href="<?php echo base_url(); ?>posSales" style="background-color: #fff; padding: 10px; border-radius: 20px; color: #000;" ><i class="fa fa-plus"></i> POS SALE</a>-->
    <?php } ?>
        </div>

<?php $this->load->view('sidebar/sidebar'); ?>
	  
      </div>
    </aside>