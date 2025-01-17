<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Service Sale</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
    $exception = $this->session->userdata('exception');
    if(isset($exception))
    {
    echo $exception;
    $this->session->unset_userdata('exception');
    } ?>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service Sale List</h3>
                <a href="<?php echo site_url('newSService'); ?>" class="btn btn-primary" style="float: right;" ><i class="fa fa-plus"></i>&nbsp;NEW SALE</a>
                <a href="<?php echo site_url('serviceInfo'); ?>" class="btn" style="float: right; margin-right: 10px;background-color: #ff0000;color:white;" ><i class="fas fa-list"></i>&nbsp;LIST SERVICE</a>
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%;" >
                  <thead>
                    <tr style="text-transform:uppercase;text-align:center;">
                      <th style="width: 5%;">SN</th>
                      <th>INVOICE NO</th>
                      <th>DATE</th>
                      <th>CUSTOMER</th>
                      <th>SERVICE NAME</th>
                      <th>TOTAL</th>
                      <th>PAID</th>
                      <th>DUE</th>
                      <th style="width: 13%;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($service as $value) {
                    $id = $value['ssid'];
                    $i++;

                    $pp = $this->db->select('
                                        service_sale_details.quantity,
                                        service_info.siName')
                                  ->from('service_sale_details')
                                  ->join('service_info','service_info.siid = service_sale_details.siid','left')
                                  ->where('ssid',$id)
                                  ->get()
                                  ->result();
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><a href="<?php echo site_url('viewSService').'/'.$id; ?>"><?php echo $value['ssCode']; ?></a></td>
                      <td><?php echo date('d-m-Y',strtotime($value['ssDate'])) ?></td>
                      <td><?php echo $value['customerName']; ?></td>
                      <td>
                        <?php if($pp){ ?>
                        <?php foreach ($pp as $p) { ?>
                        <?php echo $p->siName; ?><br>
                        <?php } } ?>
                      </td>
                      <td><?php echo number_format($value['amount'], 2); ?></td>
                      <td><?php echo number_format($value['pAmount'], 2); ?></td>
                      <td style="color:red;"><?php echo number_format($value['amount']-$value['pAmount'], 2); ?></td>
                      <td>
                        <div class="input-group input-group-md mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Action </button>
                            <ul class="dropdown-menu">
                          
                        <li class="dropdown-item"><a href="<?php echo site_url('viewSService').'/'.$id; ?>"><i class="fa fa-eye"></i> View</a></li>
                              <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="<?php echo site_url('editSService').'/'.$id; ?>"><i class="fa fa-edit"></i> Edit</a></li>
                              <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="<?php echo site_url('Service/delete_sale_service').'/'.$id; ?>" onclick="return confirm('Are you sure you want to delete this Service ?');" ><i class="fa fa-trash"></i> Delete</a>
                      </li>
                            </ul>
                          </div>
                        </div>
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
    </div>
  </div>
    
<?php $this->load->view('footer/footer'); ?>