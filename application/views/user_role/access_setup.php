<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Access Setup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Access Setup</li>
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
              <div class="card-header">
                <h3 class="card-title">Access Setup List</h3>
              </div>

              <div class="card-body">
                <table id="example" class="table table-responsive table-bordered" >
                  <thead>
                    <tr>
                      <th style="width: 5%;">#SN.</th>
                      <th style="width: 10%;">Comp.ID</th>
                      <th style="width: 20%;">Company Name</th>
                      <th style="width: 20%;">Name</th>
                      <th style="width: 12%;">Mobile</th>
                      <th style="width: 13%;">Package</th>
                      <th style="width: 10%;">Join</th>
                      <th style="width: 10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($user as $value) {
                    $i++;
                    ?>
                    <tr class="gradeX">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['compid']; ?></td>
                      <td><?php echo $value['compname']; ?></td>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['mobile']; ?></td>
                      <td><?php echo 'Basic Package'; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($value['regdate'])); ?></td>                            
                      <td>
                        <a class="btn btn-info btn-xs" href="<?php echo site_url('Access_setup/view_access_setup').'/'.$value['compid']; ?>" ><i class="fa fa-eye"></i></a>
                        <a class="btn btn-success btn-xs" href="<?php echo site_url('Access_setup/edit_access_setup').'/'.$value['compid']; ?>" ><i class="fa fa-edit"></i></a>
                        <!-- <a class="btn btn-danger btn-xs" href="<?php echo site_url('Category/delete_units').'/'.$value['compid']; ?>" ><i class="fa fa-trash"></i></a> -->
                      </td>
                    </tr>   
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  	</section>
  </div>


<?php $this->load->view('footer/footer');?>