    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <!--<a href="<?php echo base_url(); ?>Dashboard" class="nav-link active">-->
              
               <a href="<?php echo base_url(); ?>Dashboard" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Dashboard'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard</p>
          </a>
        </li>
        
    <?php if($_SESSION['role'] > 1){ ?>
    
        <?php if($_SESSION['product'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Product" class="nav-link">-->
              
              <a href="<?php echo base_url(); ?>Product" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Product' || $_SERVER['REQUEST_URI'] == '/viewProduct'){ ?>active<?php } ?>">
            <i class="nav-icon fa fa-shopping-cart"></i><p> Products </p>
          </a>
        </li>
        
        <?php } if($_SESSION['purchase'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Purchase" class="nav-link">-->
              
               <a href="<?php echo base_url(); ?>Purchase" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Purchase' || $_SERVER['REQUEST_URI'] == '/newPurchase'){ ?>active<?php } ?>">
            <i class="nav-icon far fa-credit-card"></i><p> Purchases </p>
          </a>
        </li>
        
        <?php } if($_SESSION['return'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>pReturn" class="nav-link">-->
              
            <a href="<?php echo base_url(); ?>pReturn" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/pReturn' || $_SERVER['REQUEST_URI'] == '/newpReturn'){ ?>active<?php } ?>">
            <i class="nav-icon fa-solid fa-rotate-left"></i><p> Purchases Returns</p>
          </a>
        </li>
        
	    <?php } if($_SESSION['sales'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Sale" class="nav-link">-->
              
          <a href="<?php echo base_url(); ?>Sale" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Sale' || $_SERVER['REQUEST_URI'] == '/newSale'){ ?>active<?php } ?>">
            <i class="nav-icon fa fa-cart-plus"></i><p> Sales</p>
          </a>
        </li>
        
        <?php } if($_SESSION['return'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Return" class="nav-link">-->
              
         <a href="<?php echo base_url(); ?>Return" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Return' || $_SERVER['REQUEST_URI'] == '/newReturn'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-retweet"></i><p> Sales Return</p>
          </a>
        </li>
        
        
        <?php } if($_SESSION['quotation'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Quotation" class="nav-link">-->
          <a href="<?php echo base_url(); ?>Quotation" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Quotation' || $_SERVER['REQUEST_URI'] == '/newQuotation'){ ?>active<?php } ?>">
            <i class="nav-icon fa fa-file"></i><p> Quotation</p>
          </a>
        </li>
    
        <!--<li class="nav-item">-->
        <!--  <a href="<?php echo base_url(); ?>order" class="nav-link">-->
        <!--    <i class="nav-icon fa fa-desktop"></i><p> Online Order</p>-->
        <!--  </a>-->
        <!--</li>-->
        
        
        <!--<li class="nav-item">-->
        <!--  <a href="<?php echo base_url(); ?>serviceSale" class="nav-link">-->
        <!--    <i class="nav-icon fa fa-newspaper"></i><p> Service Sale</p>-->
        <!--  </a>-->
        <!--</li>-->
        
    
	    <?php } if($_SESSION['voucher'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Voucher" class="nav-link">-->
              
          <a href="<?php echo base_url(); ?>Voucher" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Voucher' || $_SERVER['REQUEST_URI'] == '/newVoucher'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-tasks"></i><p> Vouchers</p>
          </a>
        </li>
        
        <?php } if($_SESSION['voucher'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>adjustment_list" class="nav-link">-->
              
          <a href="<?php echo base_url(); ?>adjustment_list" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/adjustment_list' || $_SERVER['REQUEST_URI'] == '/balance_adjustment'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-tasks"></i><p>Balance Adjustment</p>
          </a>
        </li>
        
        <?php } if($_SESSION['Employee_payment'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>empPayment" class="nav-link">-->
              
         <a href="<?php echo base_url(); ?>empPayment" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/empPayment' || $_SERVER['REQUEST_URI'] == '/newempPayment'){ ?>active<?php } ?>">
            <i class="nav-icon fa fa-address-card"></i><p> Salary</p>
          </a>
        </li>
        
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>empAttend" class="nav-link">-->
              
          <a href="<?php echo base_url(); ?>empAttend" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/empAttend' || $_SERVER['REQUEST_URI'] == '/newempAttend'){ ?>active<?php } ?>">
            <i class="nav-icon fa-solid fa-clipboard-user"></i><p> Attendance</p>
          </a>
        </li>
        
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>transAccount" class="nav-link">-->
              
              <a href="<?php echo base_url(); ?>transAccount" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/transAccount' || $_SERVER['REQUEST_URI'] == '/transAccount'){ ?>active<?php } ?>">
            <i class="nav-icon fa-solid fa-dollar-sign"></i><p> Transfer</p>
          </a>
        </li>
        
	    <?php } if($_SESSION['users'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>uSetting" class="nav-link">-->
            <a href="<?php echo base_url(); ?>uSetting" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/uSetting' || $_SERVER['REQUEST_URI'] == '/uSetting'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-users"></i><p> Users</p>
          </a>
        </li>
        
	    <?php } if($_SESSION['report'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>uReport" class="nav-link">-->
              
             <a href="<?php echo base_url(); ?>uReport" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/uReport' || $_SERVER['REQUEST_URI'] == '/saleReport' || $_SERVER['REQUEST_URI'] == '/purchaseReport' || $_SERVER['REQUEST_URI'] == '/profil-Loss' || $_SERVER['REQUEST_URI'] == '/cusReport' || $_SERVER['REQUEST_URI'] == '/cusLedger' || $_SERVER['REQUEST_URI'] == '/supplierReport' || $_SERVER['REQUEST_URI'] == '/supplierLedger' || $_SERVER['REQUEST_URI'] == '/stockReport' || $_SERVER['REQUEST_URI'] == '/vReports' || $_SERVER['REQUEST_URI'] == '/dReport' || $_SERVER['REQUEST_URI'] == '/cashReport' || $_SERVER['REQUEST_URI'] == '/bankReport' || $_SERVER['REQUEST_URI'] == '/mobileReport' || $_SERVER['REQUEST_URI'] == '/orderReport' || $_SERVER['REQUEST_URI'] == '/salesiReport' || $_SERVER['REQUEST_URI'] == '/salesdReport' || $_SERVER['REQUEST_URI'] == '/tsProduct' || $_SERVER['REQUEST_URI'] == '/lowStock' || $_SERVER['REQUEST_URI'] == '/bankTReport' || $_SERVER['REQUEST_URI'] == '/costReport' || $_SERVER['REQUEST_URI'] == '/salepReport' || $_SERVER['REQUEST_URI'] == '/salevReport' || $_SERVER['REQUEST_URI'] == '/saleProduct' || $_SERVER['REQUEST_URI'] == '/trialBalance' || $_SERVER['REQUEST_URI'] == '/balanceSheet' || $_SERVER['REQUEST_URI'] == '/cashFlow' || $_SERVER['REQUEST_URI'] == '/incomeStatement'){ ?>active<?php } ?>">
            <i class="nav-icon far fa-flag"></i><p> Reports</p>
          </a>
        </li>
        
	    <?php } if($_SESSION['setting'] == '1') { ?>
		<li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>Setting" class="nav-link">-->
              
            <a href="<?php echo base_url(); ?>Setting" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/Setting'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-cogs"></i><p> Settings</p>
          </a>
        </li>
        
        <?php } if($_SESSION['role'] == 2) { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>sitelog" class="nav-link">-->
          
          <a href="<?php echo base_url(); ?>sitelog" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/sitelog'){ ?>active<?php } ?>">
            <i class="nav-icon far fa-arrow-alt-circle-left"></i><p> Site Log</p>
          </a>
        </li>
        
        <?php } if($_SESSION['access_setup'] == '1') { ?>
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>userAccess" class="nav-link">-->
              
            <a href="<?php echo base_url(); ?>userAccess" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/userAccess'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-cog"></i><p> Access Setup</p>
          </a>
        </li>
        
        <?php }   ?>
         <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>PayMyBill" class="nav-link">-->
              
              <a href="<?php echo base_url(); ?>PayMyBill" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/PayMyBill'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-hand-holding-usd"></i><p> Pay My Bill</p>
          </a>
        </li>
        
  
	   <?php } else if($_SESSION['role'] == 1){ ?>
	    <li class="nav-item">
          <a href="<?php echo base_url(); ?>accesSetup" class="nav-link">
            <i class="nav-icon fas fa-cog"></i><p> Access Setup</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>userList" class="nav-link">
            <i class="nav-icon fas fa-users"></i><p> User List</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>uPayment" class="nav-link">
            <i class="nav-icon fas fa-users"></i><p> User Payment</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>notice" class="nav-link">
            <i class="nav-icon fas fa-list"></i><p> Notice</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>helpASupport" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i><p>Help & Support</p>
          </a>
        </li>
        
        
        <?php } else{ ?>
        <?php } ?>
		<li class="nav-item">
          <a href="<?php echo base_url(); ?>Login/logout" class="nav-link">
            <i class="nav-icon far fa-arrow-alt-circle-left"></i><p> Logout</p>
          </a>
        </li>
        
     <?php if($_SESSION['role'] > 1) { ?>
    <?php if($_SESSION['help_support'] == '1') { ?>
     <!--   <li class="nav-header"> </li>-->
        
        
        <li class="nav-item">
          <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sunshine.saas" class="nav-link">
            <i class="nav-icon fas fa-arrow-alt-circle-left"></i><p>APPS Download</p>
          </a>
        </li>
        
        
        <li class="nav-item">
          <!--<a href="<?php echo base_url(); ?>helpSupport" class="nav-link">-->
              
         <a href="<?php echo base_url(); ?>helpSupport" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/helpSupport'){ ?>active<?php } ?>">
            <i class="nav-icon fas fa-question-circle"></i><p>Help & Support</p>
          </a>
        </li>
        
    <?php } } ?>
      </ul>
    </nav>