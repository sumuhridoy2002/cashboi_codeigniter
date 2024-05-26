<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Access</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">User Access</li>
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header" >
                <h3 class="card-title">User Access Setup</h3>
              </div>

              <div class="card-body">
                <form action="<?= base_url('user_access/Update/setup_user_type')?>" method="post">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Select Customer</label>
                        <select class="form-control" name="u_t" required >
                          <option value="">Select one</option>  
                          <?php foreach ($user as $value) { ?>
    									    <option value="<?= $value->compid; ?>"><?= $value->name.' ( '.$value->compname.' )'; ?></option>
    									    <?php } ?>
                        </select>  
                      </div>
                    </div>

	            <?php foreach ($master as $m){ ?>
                    <div class="col-md-4 col-sm-4 col-12">
                      <h5 style="background-color: #007bff; color: #fff; padding-left: 20px; border-radius: 10px;padding: 10px;">
                        <input type="checkbox" class="asd" name="<?= $m['master_title']; ?>" value="1" > <?= $m['c_master_title']; ?>
		                  </h5>
                      <div class="page_box" >
                    		<div class="col-md-12 col-sm-12 col-12">
                    			<table class="table table-bordered table-striped">
                    				<thead>
                    					<tr>
                    						<th style="width: 50%;">Page</th>
                        				<th style="width: 50%;">Function</th>
                    					</tr>
                    				</thead>
                  				  <tbody>
                  					  <?php foreach($pages as $p){ 
              						    if($p['master_page'] == $m['master_id']){ ?>
              						    <tr>
                      					<td>
                      						<div class="checkbox">
      											        <label>
      											          <input type="checkbox" name="<?= $p['pagename']; ?>" value="1">&nbsp;<?= $p['cname']; ?>
      											        </label>
      										        </div>
                  						  </td>
                      					<td>
                      						<ul style="list-style-type:none; margin-left: -40px;">
                      							<?php foreach($page_functions as $f){ 
                  								  if($p['pageid'] == $f['pageid'] ){ ?>
                  								  <li>
                  									  <div class="checkbox">
      													        <label>
      													          <input type="checkbox" name="<?= $f['pfunc_name']; ?>" value="1">&nbsp;<?= $f['fcname']; ?>
      													        </label>
      												        </div>
              									    </li>
                      							<?php } } ?>
                      						</ul>
                      					</td>
                    					</tr> 
                    					<?php } } ?>
                    				</tbody>
                    			</table>
                    		</div>
                      </div>
                    </div>
              <?php } ?>
                  </div>
                  <div class="col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
                  </div>
              	</form>
              </div>
            </div>
          </div>
        </div>
      </div>

  	</section>
  </div>

<?php $this->load->view('footer/footer');?>