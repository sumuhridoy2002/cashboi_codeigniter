<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Asset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Asset</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Asset</h3>
              </div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>Asset/update_asset"  >
                  <div class="row">
                    <input type="hidden" class="form-control" name="asID" value="<?php echo $asset['asID']; ?>" >
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Asset Name *</label>
                      <input type="text" class="form-control" name="asName" value="<?php echo $asset['asName']; ?>" required >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Asset Code</label>
                      <input type="text" class="form-control" name="ascode" value="<?php echo $asset['ascode']; ?>" readonly >
                    </div>
                    <!--<div class="form-group col-md-4 col-sm-4 col-12">-->
                    <!--  <label>Select Currency *</label>-->
                    <!--  <select name="currency" class="form-control select2"  required >-->
                    <!--    <option value="">Select One</option>-->
                    <!--    <?php foreach($currency as $value) { ?>-->
                    <!--    <option <?php echo ($asset['currency'] == $value['cid'])?'selected':''?> value="<?php echo $value['cid']; ?>"><?php echo $value['cName']; ?></option>-->
                    <!--    <?php } ?>-->
                    <!--  </select>-->
                    <!--</div>-->
                    
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Buy Price *</label>
                      <input type="text" class="form-control" name="pprice" value="<?php echo $asset['pprice']; ?>"  required >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Quantity *</label>
                      <input type="text" class="form-control" name="qty" value="<?php echo $asset['qty']; ?>"  required >
                    </div>
                   
                    
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px;">
                    <div class="col-md-9 col-md-offset-4">  
                      <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Update</button>
                      <a href="<?php echo site_url('Asset') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>