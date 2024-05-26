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
                <h3 class="card-title">Asset List</h3>
                <?php //if($_SESSION['add_asset'] == '1') { ?>
                <button type="button" class="btn btn-primary asset_add" data-toggle="modal" data-target=".bs-example-modal-asset_add" style="float: right; margin-left: 10px;" >
                    <i class="fa fa-plus"></i>&nbsp;Add Asset</button>
                <?php //}  ?>
               
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%;" >
                  <thead>
                    <tr>
                      <th style="width: 3%;">#SN.</th>
                      <th style="">CODE</th>
                      <th style="">ITEM NAME</th>
                      <th style="">BUY PRICE</th>
                      <!--<th style="">CURRENCY</th>-->
                      <th style="">QUANTITY</th>
                      <th style="">TOTAL PRICE</th>
                      <th style="">OPTION</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($asset as $value){
                    $i++;
                    
                    
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['ascode'] ?></td>
                      <td><?php echo $value['asName'] ?></td>
                      <td><?php echo number_format($value['pprice'], 2) ?></td>
                      <!--<td><?php //echo $value['cName'] ?></td>-->
                      <td><?php echo $value['qty'] ?></td>
                      <td><?php echo number_format(($value['qty']*$value['pprice']),2) ?></td>
                      <td>
                        <div class="input-group input-group-md mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Action </button>
                            <ul class="dropdown-menu">
                            <?php //if($_SESSION['edit_asset'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('editAsset').'/'.$value['asID']; ?>"><i class="fa fa-edit"></i> Edit</a></li>
                              <li class="dropdown-divider"></li>
                            <?php //} if($_SESSION['delete_asset'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('Asset/delete_asset').'/'.$value['asID']; ?>" onclick="return confirm('Are you sure you want to Delete this Asset ?');" ><i class="fa fa-trash"></i> Delete</a></li>
                            <?php //} ?> 
                              
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
    </section>
  </div>


    <div class="modal fade bs-example-modal-asset_add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 15px 15px;">
          <div class="modal-header">
            <h4 class="modal-title"><b>Add New Asset</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form method="POST" action="<?php echo base_url() ?>Asset/save_asset" enctype="multipart/form-data" >
            <div class="col-md-12 col-sm-12 col-12">
              <div class="row">
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Asset Name *</label>
                  <input type="text" class="form-control" name="asName" placeholder="Asset Name" required >
                </div>
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Purchase Price *</label>
                  <input type="text" class="form-control" name="pprice" placeholder="Purchase price"  required >
                </div>
                <!--<div class="form-group col-md-6 col-sm-6 col-12">-->
                <!--  <label>Currency *</label>-->
                <!-- <select name="currency" style="width:100%;" id="currency" class="form-control select2" required >-->
                <!--    <option value="">Select One</option>-->
                <!--    <?php foreach($currency as $value) { ?>-->
                <!--    <option value="<?php echo $value['cid']; ?>"><?php echo $value['cName']; ?></option>-->
                <!--    <?php } ?>-->
                   
                <!--  </select>-->
                <!--</div>-->
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Quantity</label> *</label>
                  <input type="text" class="form-control" name="qty" placeholder="Quantity"  required >
                </div>
              
              </div>
              
            </div>
            <div class="modal-footer form-group">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    

    <!--<div id="templete" class="modal fade bs-example-modal-template" tabindex="-1" role="dialog" aria-hidden="true">-->
    <!--  <div class="modal-dialog modal-md">-->
    <!--    <div class="modal-content" >-->
    <!--      <div class="modal-header">-->
    <!--        <h4 class="modal-title">Import Asset</h4>-->
    <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
    <!--      </div>-->
    <!--      <div class="col-md-12 col-sm-12 col-12">-->
    <!--        <div class="row">-->
    <!--          <div class="form-group col-md-12 col-sm-12 col-12">-->
    <!--            <div style="width: 100%;height: 100px;background: #fff4f4;text-align: center;">-->
    <!--              <a href="<?php echo base_url('assets/templates/products.xlsx') ?>" style="padding:1em;text-align: center;display:inline-block;text-decoration: none !important;margin:0 auto;font-size:1.5rem;">Blank format</a>-->
    <!--            </div>-->
    <!--          </div>-->
              <!--<div class="form-group col-md-6 col-sm-6 col-12">-->
              <!--  <div style="width: 100%;height: 100px;background: #fff4f4;text-align: center;">-->
              <!--    <a href="<?php echo base_url('Product/export_action') ?>" style="padding:1em;text-align: center;display:inline-block;text-decoration: none !important;margin:0 auto;">Sample data</a>-->
              <!--  </div>-->
              <!--</div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-md-12 col-sm-12 col-12">-->
    <!--        <form method="post" action="<?php echo base_url('Product/excel_import');?>" id="import_form" enctype="multipart/form-data">-->
    <!--          <div class="form-group col-md-12 col-sm-12 col-12">-->
    <!--            <label>Import Product<span style="color: red">  *</span><br>(Excel file Upload)</label>-->
    <!--            <input type="file" name="file" id="file" required accept=".xls, .xlsx" >-->
    <!--          </div>-->
    <!--          <div class="form-group col-md-12 col-sm-12 col-12" style="margin-top: 20px; text-align: center;">-->
    <!--            <input type="submit" name="import" value="Import" class="btn btn-info" style="font-size:1.3rem; width: 50%;" >-->
    <!--          </div>-->
    <!--        </form>-->
    <!--      </div>-->
    <!--      <div class="modal-footer">-->
    <!--        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

<?php $this->load->view('footer/footer'); ?>


