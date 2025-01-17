<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Return</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Return</li>
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
                <h3 class="card-title">Return List</h3>
                <?php if($_SESSION['new_return'] == '1') { ?>
                <a href="<?php echo site_url('newReturn') ?>" class="btn btn-primary" style="float: right;" ><i class="fa fa-plus"></i> New Return</a>
                <?php } ?> 
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%;" >
                        <thead>
                            <tr>
                                <th style="width: 5%;">SN</th>
                                <th style="width: 12%;">DATE</th>
                                <th style="width: 15%;">R-INV. NO.</th>
                                <th style="width: 18%;">CUSTOMER</th>
                                <th style="width: 10%;">QUANTITY</th>
                                <!-- <th style="width: 10%;">Unit Price</th>
 -->                            <th style="width: 10%;">TOTAL</th>
                                <th style="width: 10%;">CHARGE</th>
                                <th style="width: 10%;">PAID</th>
                                <th style="width: 10%;">OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($return as $value) {
                            $i++;
                            
                            $rp = $this->db->select('sum(quantity) as total')
                                            ->from('returns_product')
                                            ->where('rt_id',$value['returnId'])
                                            ->get()
                                            ->row();
                            ?>
                            <tr class="gradeX" style="border: 1px solid #000;">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['regdate']; ?></td>
                                <td><a href="<?php echo site_url('viewReturn').'/'.$value['returnId'] ?>"><?php echo $value['rid']; ?></a></td>
                                <td><?php echo $value['customerName']; ?><br><?php echo $value['mobile']; ?></td>
                                <td>
                                    <?php echo $rp->total; ?>
                                <!-- <?php foreach ($rp as $p) { ?>
                                <?php echo $p->quantity; ?><br>
                                <?php } ?> -->
                            </td>
                           <!--  <td>
                                <?php foreach ($rp as $p) { ?>
                                <?php echo $p->salePrice; ?><br>
                                <?php } ?>
                            </td> -->
                                <td><?php echo number_format($value['totalPrice'], 2); ?></td>
                                <td><?php echo number_format($value['scAmount'], 2); ?></td>
                                <td><?php echo number_format($value['paidAmount'], 2); ?></td>
                                <td>
                                    <div class="input-group input-group-md mb-3">
                                      <div class="input-group-prepend">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Action </button>
                                        <ul class="dropdown-menu">
                                
                                            <?php if($_SESSION['view_return'] == '1') { ?>
                                            <li class="dropdown-item"><a href="<?php echo site_url('viewReturn').'/'.$value['returnId'] ?>"><i class="fa fa-eye"></i> View</a></li>
                                            <!--<li class="dropdown-divider"></li>-->
                                            <?php } if($_SESSION['edit_return'] == '1') { ?>
                                            <!--<li class="dropdown-item"><a href="<?php echo site_url('editReturn').'/'.$value['returnId'] ?>"><i class="fa fa-edit"></i> Edit</a></li>-->
                                            <li class="dropdown-divider"></li>
                                            <?php } if($_SESSION['delete_return'] == '1') { ?>
                                            <li class="dropdown-item"><a href="<?php echo site_url('Returns/delete_returns').'/'.$value['returnId'] ?>" onclick="return confirm('Are you sure you want to Delete this Returns ?');" ><i class="fa fa-trash"></i> Delete</a></li>
                                            
                                            <?php } ?>
                                        </ul>
                                      </div>
                                    </div>
                                </td>
                            </tr>   
                            <?php } ?> 
                        </tbody>
                        <tfoot>
                          
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('footer/footer'); ?>