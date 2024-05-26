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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <h3 class="card-title">Users</h3>
            </div>

            <div class="card-body">
              <div class="row">
                <?php if($_SESSION['customer'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Customer'); ?>" > 
                    <div class="info-box bg1">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Customer</span>
                        <span class="info-box-number"><?php echo $customer; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['supplier'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Supplier') ?>" > 
                    <div class="info-box bg2">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Supplier</span>
                        <span class="info-box-number"><?php echo $supplier; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['employee'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('Employee') ?>" > 
                    <div class="info-box bg3">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Staff / Employee</span>
                        <span class="info-box-number"><?php echo $employee; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } if($_SESSION['user'] == '1') { ?>
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="<?php echo base_url('User') ?>" > 
                    <div class="info-box bg4">
                      <span class="info-box-icon"><i class="fas fa-align-center"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number"><?php echo $user; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>