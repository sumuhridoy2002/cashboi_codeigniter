<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Site Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Site Log</li>
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
                <h3 class="card-title">Site Log Information</h3>
              </div>
              <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%;" >
                    <thead>
                        <tr>
                            <th>#SN</th>
                            <th>User ID</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i= 0; 
                            foreach ($activity_logs as $log): 
                            $i++;
                            
                            $user = $this->db->select('*')
                                             ->from('users')
                                             ->where('uid', $log->user_id)
                                             ->get()
                                             ->row();
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $log->user_id.' ('.$user->name.')'; ?></td>
                            <td><?php echo $log->activity; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($log->timestamp)).'<br><span style="font-weight:bold">'.date('h:i:s a', strtotime($log->timestamp)).'</span>'; ?></td>
                            <!--<td><?php echo $log->timestamp; ?></td>-->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>