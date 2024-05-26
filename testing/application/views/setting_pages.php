<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>
<style>
    .bg1{
        background-color:#DBC4F0;
        color:#000;
    }
    .bg2{
        background-color:#FFD1DA;
        color:#000;
    }
    .bg3{
        background-color:#CAEDFF;
        color:#000;
    }
    .bg4{
        background-color:#FBF0B2;
        color:#000;
    }
</style>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Setting</h3>
            </div>

            <div class="card-body">
              <div class="row">
                <?php if($_SESSION['category'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Category') ?>" > 
                    <div class="info-box bg1">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Category</span>
                        <span class="info-box-number"><?php echo $category; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url() ?>subCategory" > 
                    <div class="info-box bg2">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Sub Category</span>
                        <!--<span class="info-box-number"><?php echo $scategory; ?></span>-->
                      </div>
                    </div>
                  </a>
                </div>
                <?php if($_SESSION['unit'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Unit') ?>" > 
                    <div class="info-box bg3">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Unit</span>
                        <span class="info-box-number"><?php echo $unit; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Brand') ?>" > 
                    <div class="info-box bg4">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Brand</span>
                        <!--<span class="info-box-number"><?php echo $unit; ?></span>-->
                      </div>
                    </div>
                  </a>
                </div>
                <?php if($_SESSION['expense_type'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Expense') ?>" > 
                    <div class="info-box bg1">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Expense Type</span>
                        <span class="info-box-number"><?php echo $expense; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['department'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Department') ?>" > 
                    <div class="info-box bg2">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Department</span>
                        <span class="info-box-number"><?php echo $dept; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Area') ?>" > 
                    <div class="info-box bg3">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Area</span>
                        <span class="info-box-number"><?php echo $area; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Asset') ?>" > 
                    <div class="info-box bg4">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Asset</span>
                        <span class="info-box-number"><?php echo $asset; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php  if($_SESSION['bank_account'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('CashAccount') ?>" > 
                    <div class="info-box bg1">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform: uppercase;">Cash Account</span>
                        <!--<span class="info-box-number"><?php echo $area; ?></span>-->
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('BankAccount') ?>" > 
                    <div class="info-box bg2">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Bank Account</span>
                        <span class="info-box-number"><?php echo $bank; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['mobile_account'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('MobileAccount') ?>" > 
                    <div class="info-box bg3">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Mobile Account</span>
                        <span class="info-box-number"><?php echo $mobile; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['notice'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('uNotice') ?>" > 
                    <div class="info-box bg4">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Notification</span>
                        <span class="info-box-number"><?php echo $notice; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['user_type'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('uRole') ?>" > 
                    <div class="info-box bg1">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">User Type</span>
                        <span class="info-box-number"><?php echo $utype; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
                <!--<div class="col-md-3 col-sm-6 col-12">-->
                <!--  <a href="<?php echo base_url('onlineStore') ?>" > -->
                <!--    <div class="info-box bg2">-->
                <!--      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>-->
                <!--      <div class="info-box-content">-->
                <!--        <span class="info-box-text" style="text-transform:uppercase;">Online Store</span>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </a>-->
                <!--</div>-->
                
                <!--<div class="col-md-3 col-sm-6 col-12">-->
                <!--  <a href="<?php echo base_url('pageSetting') ?>" > -->
                <!--    <div class="info-box bg3">-->
                <!--      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>-->
                <!--      <div class="info-box-content">-->
                <!--        <span class="info-box-text" style="text-transform:uppercase;">About Us</span>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </a>-->
                <!--</div>-->
                
                 <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('empTarget') ?>" > 
                    <div class="info-box bg4">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text" style="text-transform:uppercase;">Employee Target</span>
                      </div>
                    </div>
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>