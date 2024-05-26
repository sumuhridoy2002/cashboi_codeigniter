<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brands</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Brands</li>
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
          <div class="col-md-8 col-sm-8 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brand List</h3>
              </div>

              <div class="card-body">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5%;">SN</th>
                      <th>Brand Name</th>
                      <th style="width: 12%;">Status</th>
                      <th style="width: 13%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    foreach ($brands as $key => $value) { 
                    $i++;
                    ?>
                    <tr class="gradeX">      
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['bName']; ?></td>
                      <td><?php echo $value['status']; ?></td>
                      <td>
                        <button type="button" class="btn btn-success btn-xs editColor" data-toggle="modal" data-target=".bs-example-modal-editColor" data-id="<?php echo $value['brid']; ?>" ><i class="fa fa-edit"></i></button>
                        <a class="btn btn-danger btn-xs" href="<?php echo site_url('Category/delete_brand').'/'.$value['brid']; ?>" onclick="return confirm('Are you sure you want to Delete this Brand ?');" ><i class="far fa-trash-alt"></i></a>
                      </td>
                    </tr>   
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade bs-example-modal-editColor" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Brand Information</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="<?php echo base_url('Category/update_brand');?>" method="post">
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Brand Name *</label>
                    <input type="text" class="form-control" name="bName" id="bName" required >
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status" >
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                  <input type="hidden" id="brid" name="brid" required >
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brand Information</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>Category/save_brand" >
                  <div class="form-group col-md-12 col-sm-12 col-12">
                    <label>Brand Name *</label>
                    <input type="text" class="form-control" name="bName" placeholder="Brand Name" required >
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" >
                    <button type="submit" class="form-control btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
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

    
    <script type="text/javascript">
      $(document).ready(function(){
        $(".editColor").click(function(){
          var brid = $(this).data('id');
            //alert(l_id);
          $('input[name="brid"]').val(brid);
          });

        $('.editColor').click(function(){
          var id = $(this).data('id');
          var url = '<?php echo base_url() ?>Category/get_brand_data';
            //alert(id); alert(url);
            $.ajax({
              method: 'POST',
              url     : url,
              dataType: 'json',
              data    : {'id' : id},
              success:function(data){ 
              //alert(data);
              var HTML = data["bName"];
              var HTML2 = data["status"];
              //alert(HTML);
              $("#bName").val(HTML);
              $("#status").val(HTML2);
              },
            error:function(){
              alert('error');
              }
            });
          });
        });
    </script>