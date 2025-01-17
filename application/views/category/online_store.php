<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Online Store</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Online Store</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <?php
    $exception = $this->session->userdata('exception');
    if(isset($exception))
    {
    echo $exception;
    $this->session->unset_userdata('exception');
    } ?>

    <?php if($store){ ?>
    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Online Store Link</h3>
            </div>

            <div class="card-body">
              <h3><a href="<?php echo base_url() . 'store/' . $store[0]['slug']; ?>" target="_blank" ><?php echo base_url().$store[0]['sName']; ?></a></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Online Store Information</h3>
              </div>

              <div class="card-body form-group">
                <form action="<?php echo base_url('Category/save_online_store');?>" method="post" enctype='multipart/form-data' >
                  <div class="col-md-12 col-sm-12 col-12">
                    
                    <div style="border: 1px solid gray; padding: 20px;">
                      <h4 class="text-center" style="text-decoration: underline;">Store Credentials</h4>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Online Store Name *</label>
                        <input type="text" class="form-control" name="sName" placeholder="Store Name" value="<?php if($store){ ?><?php echo $store[0]['sName']; ?><?php } ?>" required >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Mobile Number *</label>
                        <input type="text" class="form-control" name="sMobile" placeholder="Mobile Number" value="<?php if($store){ ?><?php echo $store[0]['sMobile']; ?><?php } ?>" onkeypress="return isNumberKey(event)"  required >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Store Address *</label>
                        <input type="text" class="form-control" name="sAddress" placeholder="Store Address" value="<?php if($store){ ?><?php echo $store[0]['sAddress']; ?><?php } ?>" required >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Banner  Image * <small style="color: red;">Size 1450X500 px</small></label>
                        <input type="file" name="userfile" required >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="sEmail" placeholder="exemple@sunshine.com" value="<?php if($store){ ?><?php echo $store[0]['sEmail']; ?><?php } ?>" >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Deleviry Charge</label>
                        <input type="text" class="form-control" name="sdCharge" placeholder="Amount" value="<?php if($store){ ?><?php echo $store[0]['sdCharge']; ?><?php } ?>" >
                      </div>
                    </div>
                    <br>
                    <div style="border: 1px solid gray; padding: 20px;">
                      <h4 class="text-center" style="text-decoration: underline;">Social Links Credentials</h4>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Facebook Link</label>
                        <input type="text" class="form-control" name="sFacebook" placeholder="Facebook Link" value="<?php if($store){ ?><?php echo $store[0]['sFacebook']; ?><?php } ?>" >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Google Plus Link</label>
                        <input type="text" class="form-control" name="sGoogle" placeholder="Google Plus Link" value="<?php if($store){ ?><?php echo $store[0]['sGoogle']; ?><?php } ?>" >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Twitter Link</label>
                        <input type="text" class="form-control" name="sTwitter" placeholder="Twitter Link" value="<?php if($store){ ?><?php echo $store[0]['sTwitter']; ?><?php } ?>" >
                      </div>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Instagram Link</label>
                        <input type="text" class="form-control" name="sInstagram" placeholder="instagram Link" value="<?php if($store){ ?><?php echo $store[0]['sInstagram']; ?><?php } ?>" >
                      </div>
                    </div>

                    <br>
                    <div style="border: 1px solid gray; padding: 20px;">
                      <h4 class="text-center" style="text-decoration: underline;">Facebook Pixel Credential</h4>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Facebook Pixel Id</label>
                        <input type="text" class="form-control" name="FACEBOOK_PIXEL_ID" placeholder="Facebook Pixel Id" value="<?php if($store){ ?><?php echo $store[0]['FACEBOOK_PIXEL_ID']; ?><?php } ?>" >
                      </div>
                    </div>

                    <br>
                    <div style="border: 1px solid gray; padding: 20px;">
                      <h4 class="text-center" style="text-decoration: underline;">Pathao Credentials</h4>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Pathao User Name</label>
                        <input type="text" class="form-control" name="PATHAO_USER_NAME" placeholder="Pathao User Name" value="<?php if($store){ ?><?php echo $store[0]['PATHAO_USER_NAME']; ?><?php } ?>" >
                      </div>

                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Pathao Password</label>
                        <input type="text" class="form-control" name="PATHAO_PASSWORD" placeholder="Pathao Password" value="<?php if($store){ ?><?php echo $store[0]['PATHAO_PASSWORD']; ?><?php } ?>" >
                      </div>

                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Pathao Client ID</label>
                        <input type="text" class="form-control" name="PATHAO_CLIENT_ID" placeholder="Pathao Client ID" value="<?php if($store){ ?><?php echo $store[0]['PATHAO_CLIENT_ID']; ?><?php } ?>" >
                      </div>

                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Pathao Client Secret</label>
                        <input type="text" class="form-control" name="PATHAO_CLIENT_SECRET" placeholder="Pathao Client Secret" value="<?php if($store){ ?><?php echo $store[0]['PATHAO_CLIENT_SECRET']; ?><?php } ?>" >
                      </div>
                    </div>

                    <br>
                    <div style="border: 1px solid gray; padding: 20px;">
                      <h4 class="text-center" style="text-decoration: underline;">Steadfast Credentials</h4>
                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Steadfast API Key</label>
                        <input type="text" class="form-control" name="STEADFAST_API_KEY" placeholder="Steadfast API Key" value="<?php if($store){ ?><?php echo $store[0]['STEADFAST_API_KEY']; ?><?php } ?>" >
                      </div>

                      <div class="form-group m-auto col-md-6 col-sm-6 col-12">
                        <label>Steadfast API Secret</label>
                        <input type="text" class="form-control" name="STEADFAST_API_SECRET" placeholder="Steadfast API Secret" value="<?php if($store){ ?><?php echo $store[0]['STEADFAST_API_SECRET']; ?><?php } ?>" >
                      </div>
                    </div>

                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" style="margin-top: 20px; text-align: center;">
                    <button type="submit" class="btn btn-info"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
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