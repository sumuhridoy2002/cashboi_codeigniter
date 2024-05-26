<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

<style>

</style>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Product List</h3>
                <?php if($_SESSION['add_product'] == '1') { ?>
                <button type="button" class="btn btn-primary product_add" data-toggle="modal" data-target=".bs-example-modal-product_add" style="float: right; margin-left: 10px;" ><i class="fa fa-plus"></i>&nbsp;Add New Product</button>
                <?php } if($_SESSION['store_product'] == '1') { ?>
                <button type="button" class="btn btn-danger product_store" data-toggle="modal" data-target=".bs-example-modal-product_store" style="float: right; margin-left: 10px;" ><i class="fa fa-plus"></i>&nbsp; Stock  Adjust</button>
                <?php } if($_SESSION['import_product'] == '1') { ?>
                <button type="button" class="btn btn-success template" data-toggle="modal" data-target=".bs-example-modal-template" style="float: right" ><i class="fa fa-plus"></i> Import Product  &nbsp; <i class="fa fa-solid fa-file-excel"></i> </button>
                <?php } ?>
              </div>

              <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%;" >
                  <thead>
                    <tr>
                      <th>#SN</th>
                      <th>IMAGE</th> 
                      <th style="width: 10%;" >CODE</th>
                      <th>ITEM NAME</th>
                      <th>CATEGORY</th>
                      <th>UNIT</th>
                      <th>PURCHASE PRICE</th>
                      <th>BUY PRICE</th>
                      <th>SALE PRICE</th>
                      <th>ALERT QTY</th>
                      
                      <th style="width: 5%;">STOCK</th>
                      
                      <th style="width: 10%;">OPTION</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    if($product){
                    foreach ($product as $value){
                    $i++;
                    
                    $stock = $this->db->select('*')
                                    ->from('stock')
                                    ->where('product',$value['productID'])
                                    ->where('compid',$_SESSION['compid'])
                                    ->get()
                                    ->row();

                    if($stock)
                      {
                      $st = $stock->totalPices;
                      }
                    else
                      {
                      $st = '0';
                      }
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                       <td>
                        <?php if($value['image'] == null) { ?>
                        <i class="fa fa-solid fa-images fa-4x  " aria-hidden="true" ></i>
                        <?php } else{ ?> 
                        <img src="<?php echo base_url().'/upload/product/'.$value['image']; ?>" style="width:50px; height:50px;">
                        <?php } ?> 
                      </td> 
                      <td><a href="<?php echo site_url('viewProduct').'/'.$value['productID']; ?>"><?php echo $value['productcode'] ?></a></td>
                      <td><?php echo $value['productName'] ?></td>
                      <td><?php echo $value['categoryName'] ?></td>
                      <td><?php echo $value['unitName'] ?></td>
                      <td><?php echo number_format($value['avg_purchase'], 2) ?></td>
                      <td><?php echo number_format($value['pprice'],2)?></td>
                      <td><?php echo number_format($value['sprice'], 2) ?></td>
                      <td><?php echo $value['alertqty'] ?></td>
                      
                      <td><?php echo $st; ?></td>
                      
                      <td>
                        <div class="input-group input-group-md mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Option </button>
                            <ul class="dropdown-menu">
                            <?php if($_SESSION['view_product'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('viewProduct').'/'.$value['productID']; ?>"><i class="fa fa-eye"></i> View</a></li>
                              <li class="dropdown-divider"></li>
                            <?php } if($_SESSION['edit_product'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('editProduct').'/'.$value['productID']; ?>"><i class="fa fa-edit"></i> Edit</a></li>
                              <li class="dropdown-divider"></li>
                            <?php } if($_SESSION['delete_product'] == '1') { ?>
                              <li class="dropdown-item"><a href="<?php echo site_url('Product/delete_products').'/'.$value['productID']; ?>" onclick="return confirm('Are you sure you want to Delete this Product ?');" ><i class="fa fa-trash"></i> Delete</a></li>
                            <?php } ?> 
                              <li class="dropdown-divider"></li>
                              
                              <li class="dropdown-item"><a href="<?php echo site_url().'pBarcode/'.$value['productID']; ?>"><i class="fa-solid fa-barcode"></i> Barcode</a></li>
                              
                              
                            </ul>
                          </div>
                        </div>
                      </td>
                    </tr>   
                    <?php } }
                    else{
                        $i=0;
                    }
                    ?> 
                    
                    
                    <?php
                    $j = $i;
                    foreach ($service as $value){
                    $j++;
                    
                    ?>
                    <tr>
                      <td><?php echo $j; ?></td>
                       <td>
                           <i class="fa-solid fa-gear fa-4x" aria-hidden="true"></i>
                         
                      </td> 
                      <td><?php echo $value['siCode'] ?></td>
                      <td><?php echo $value['siName'] ?></td>
                      <td><?php echo $value['categoryName'] ?></td>
                      <td><?php echo $value['unitName'] ?></td>
                      <td></td>
                      <td></td>
                      <td><?php echo number_format($value['siPrice'], 2) ?></td>
                      <td></td>
                      <td></td>
                      <td>
                        <div class="input-group input-group-md mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Action </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><button type="button" class="btn btn-sm eService" data-toggle="modal" data-target=".bs-example-modal-eService" 
                                data-id="<?php echo $value['siid']; ?>" id="<?php echo $value['siid']; ?>" onclick="document.getElementById('eService').style.display='block'" style="color:#007bff; font-weight:400;font-size:1rem;">
                                    <i class="fa fa-edit"></i> Edit</button></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><a class="btn btn-sm" href="<?php echo site_url('Service/delete_service_info').'/'.$value['siid']; ?>" 
                                onclick="return confirm('Are you sure you want to delete this Service ?');" style="color:#007bff; font-weight:400;font-size:1rem;"><i class="fa fa-trash"></i> Delete</a></li>
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


    <div class="modal fade bs-example-modal-product_add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 15px 15px;">
          <div class="modal-header">
            <h4 class="modal-title"><b>Add New Product or Service</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form method="POST" action="<?php echo base_url() ?>Product/save_product" enctype="multipart/form-data" >
            <div class="col-md-12 col-sm-12 col-12">
              <div class="row">
                <div class="form-group col-md-6 col-sm-6 col-12">
                  <label>Item Type*</label>
                     <select class="form-control" name="item_type" id="item_type">
                         <!--<option>Select Type</option>-->
                         <option class="active" value="Product">Product </option>
                         <option value="Service">Service </option>
                     </select>
                </div>
             </div>
             
                <!--<div style="display:none" id="productPanel">-->
                <div id="productPanel">
                    <div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Product Name *</label>
                      <input type="text" class="form-control" name="productName" placeholder="Product Name"  >
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Category *</label> <br>
                      <select name="categoryID" style="width:100%;" id="categoryID" class="form-control select2"  >
                        <option value="">Select One</option>
                        <?php foreach($category as $value) { ?>
                        <option value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
                        <?php } ?>
                        <option value="newCategory">New Category</option>
                      </select>
                    </div>
                    
                    </div>
                    <div class="row">
                    <div class="d-none" id="newCategory">
                      <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>New Category *</label> 
                        <input type="text" class="form-control" name="newCategory" placeholder="New Category" id="newcat"  >
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Sub Category (Optional)</label>
                      <select class="form-control select2" name="scategory" id="scategory" >
                        <option value="">Select One</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Brand (Optional)</label> <br>
                      <select name="brand" style="width:100%;" id="brand" class="form-control select2"  >
                        <option value="">Select One</option>
                        <?php foreach($brands as $value) { ?>
                        <option value="<?php echo $value['brid']; ?>"><?php echo $value['bName']; ?></option>
                        <?php } ?>
                        
                      </select>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label >Units *</label> <br>
                      <select name="units" id="unit" style="width:100%;" class="form-control select2"  >
                        <option value="">Select One</option>
                        <?php  foreach($unit as $value) { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['unitName']; ?></option>
                        <?php } ?>
                        <option value="newUnit">New Unit</option>
                      </select>
                    </div>
                    
                    <div class="d-none" id="newUnit">
                      <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>New Unit *</label>
                        <input type="text" class="form-control" name="newUnit" placeholder="New Unit" id="newut" >
                      </div>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Purchase Price *</label>
                      <input type="text" class="form-control" name="pprice" placeholder="Purchase price"   >
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Sale Price </label>
                      <input type="text" class="form-control" name="sprice" placeholder="Sale price"   >
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Alert Qunatity</label>
                      <input type="text" class="form-control" name="alertqty" placeholder="Alert Quantity">
                    </div>
                    <!--<div class="form-group col-md-6 col-sm-6 col-12">-->
                    <!--  <label>Whole Sale Price </label>-->
                    <!--  <input type="text" class="form-control" name="wprice" placeholder="Whole Sale price" >-->
                    <!--</div>-->
                    </div>
                    
                    <div class="row">
                    
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Show Product Online Store</label>
                      <div>
                        <input type="radio" name="spstatus" value="1"  >&nbsp;&nbsp;Yes&nbsp;&nbsp;
                        <input type="radio" name="spstatus" value="2" checked >&nbsp;&nbsp;No
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                        <label>Product Image</label>
                        
                      <!--<label>Product Image <span style="color:gray;">(Optional) </span>-->
                      <!--<br> <i> <p style="font-size:0.8rem; color: dodgerblue;"> (220X220 or 350X350 Px Size)</p> <i> </label>-->
                      <!--<input type="file" name="userfile"  onchange="loadFile(event)">-->
                      
                      <div class="custom-file">
                          
                          <input type="file" name="userfile" class="custom-file-input" id="customImg" onchange="loadFile(event)">
                          <label class="custom-file-label" for="customImg">Product Image <span style="color:gray;">(Optional) </span></label>
                      </div>
                      <img id="preview" width="100px" style="display: none;">
                    </div>
                    </div>
                    
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Product Description (Optional)</label>
                      <textarea type="text" class="form-control" name="details" rows="2" ></textarea>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Product Specification (Optional)</label>
                      <textarea type="text" class="form-control" name="specification" rows="2" ></textarea>
                    </div>
                  </div>
              </div>
              
              
              <div style="display:none" id="servicePanel">
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Service Name *</label>
                      <input type="text" class="form-control" name="sName" placeholder="Service Name"  >
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Service Charge *</label>
                      <input type="text" class="form-control" name="sPrice" placeholder="Amount" >
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label>Select Category *</label> <br>
                      <select name="category" style="width:100%;" id="categoryID" class="form-control select2"  >
                        <option value="">Select One</option>
                        <?php foreach($category as $value) { ?>
                        <option value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
                        <?php } ?>
                        <option value="newCategory">New Category</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12">
                      <label >Select Units *</label> <br>
                      <select name="units_service" id="unit" style="width:100%;" class="form-control select2"  >
                        <option value="">Select One</option>
                        <?php  foreach($unit as $value) { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['unitName']; ?></option>
                        <?php } ?>
                        <!-- <option value="newUnit">New Unit</option> -->
                      </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12">
                        <label>Product Image</label>
                      <!--<label>Product Image <span style="color:gray;">(Optional) </span>-->
                      <!--<br> <i> <p style="font-size:0.8rem; color: dodgerblue;"> (220X220 or 350X350 Px Size)</p> <i> </label>-->
                      <!--<input type="file" name="userfile"  onchange="loadFile(event)">-->
                      <div class="custom-file">
                          
                          <input type="file" name="userfile_service" class="custom-file-input" id="customImg" onchange="loadFile(event)">
                          <label class="custom-file-label" for="customImg">Product Image <span style="color:gray;">(Optional) </span></label>
                      </div>
                      <img id="preview" width="100px" style="display: none;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-12">
                      <label>Service Details</label>
                      <textarea class="form-control" name="sDetails" placeholder="Service Details Information" rows="5"></textarea>
                    </div>
                  </div>
              </div>
              
            </div>
            
            <div class="modal-footer form-group" >
                <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
               </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    
    
    <div class="modal fade bs-example-modal-eService" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Service Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form method="POST" action="<?php echo base_url() ?>Service/update_service_info" style="padding:10px 10px;">
            <div class="form-group col-md-12 col-sm-12 col-12">
              <label>Service Name *</label>
              <input type="text" class="form-control" name="sName" id="sName" placeholder="Service Name" required >
            </div>
            <div class="form-group col-md-12 col-sm-12 col-12">
              <label>Service Charge *</label>
              <input type="text" class="form-control" name="sPrice" id="sPrice" placeholder="Amount" required >
            </div>
            <div class="form-group col-md-12 col-sm-12 col-12">
              <label>Service Details</label>
              <textarea class="form-control" name="sDetails" id="sDetails" placeholder="Service Details Information" rows="5"></textarea>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-12">
              <label>Status</label>
              <select class="form-control" name="status" id="status" >
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <input type="hidden" id="siid" name="siid" required >
            <div class="modal-footer form-group">
              <button type="submit" class="btn btn-secondary btn-lg"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-product_store" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Store Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form action="<?php echo base_url() ?>Product/save_product_store" method="POST" >
            <div class="form-group col-md-12 col-sm-12 col-12">
              <!--<div class="form-group">-->
                <label>Select Product</label> <br>
                <select name="product" class="form-control select2" style="width:100%; " required >
                  <option value="">Select One</option>
                  <?php foreach($product as $value) { ?>
                  <option value="<?php echo $value['productID']; ?>"><?php echo $value['productName'].' ( '.$value['productcode'].' )'; ?></option>
                  <?php } ?>
                </select>
             </div>
            <div class="form-group col-md-12 col-sm-12 col-12">
              <!--<div class="form-group">-->
                <label>Adjust Product QTY</label>
                <input type="text" class="form-control" name="quantity" placeholder="Product Quantity" required >
              <!--</div>-->
            </div>
            <div class="modal-footer form-group">
              <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i>&nbsp;&nbsp;Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"></i>&nbsp;&nbsp;Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="templete" class="modal fade bs-example-modal-template" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" >
          <div class="modal-header">
            <h4 class="modal-title">Import Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="col-md-12 col-sm-12 col-12">
            <div class="row">
              <div class="form-group col-md-6 col-sm-6 col-12">
                <div style="width: 100%;height: 100px;background: #fff4f4;text-align: center;">
                  <a href="<?php echo base_url('assets/templates/products.xlsx') ?>" style="padding:1em;text-align: center;display:inline-block;text-decoration: none !important;margin:0 auto;">Blank format</a>
                </div>
              </div>
              <div class="form-group col-md-6 col-sm-6 col-12">
                <div style="width: 100%;height: 100px;background: #fff4f4;text-align: center;">
                  <a href="<?php echo base_url('Product/export_action') ?>" style="padding:1em;text-align: center;display:inline-block;text-decoration: none !important;margin:0 auto;">Sample data</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-12">
            <form method="post" id="import_form" enctype="multipart/form-data">
              <div class="form-group col-md-12 col-sm-12 col-12">
                <label>Import Product<span style="color: red">  *</span><br>(Excel file Upload)</label>
                <input type="file" name="file" id="file" required accept=".xls, .xlsx" >
              </div>
              <div class="form-group col-md-12 col-sm-12 col-12" style="margin-top: 20px; text-align: center;">
                <input type="submit" name="import" value="Import" class="btn btn-info" >
              </div>
            </form>
            <div class="progress">
              <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('footer/footer'); ?>

 <script type="text/javascript">
        $(document).ready(function(){
          $('#item_type').change(function(){
            var catid = $('#item_type').val();
              //alert(catid);
            if(catid == 'Product')
              {
              document.getElementById("productPanel").style= "display:block";
              }
            else
              {
              document.getElementById("productPanel").style= "display:none";
              }
            if(catid == 'Service')
              {
              document.getElementById("servicePanel").style= "display:block";
              }
            else
              {
              document.getElementById("servicePanel").style= "display:none";
              }
            });
          });
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#categoryID').change(function(){
            var catid = $('#categoryID').val();
              //alert(catid);
            if(catid == 'newCategory')
              {
              $('#newCategory').removeAttr('class','d-none');
              $('#newcat').attr('required','required');
              }
            else
              {
              $('#newCategory').attr('class','d-none');
              $('#newcat').removeAttr('required','required');
              
              var url = "<?php echo base_url(); ?>Product/get_subcategory_data";
              var id = catid;
                  // alert(url);alert(id);
              $.ajax({
                method: "POST",
                url     : url,
                dataType: 'json',
                data    : {"id" : id},
                success:function(data){ 
                    //alert(data);
                  $('#scategory').removeAttr("disabled")
                  var HTML = "<option value=''>Select One</option>";
                  for (var key in data) 
                    {
                    if(data.hasOwnProperty(key))
                      {
                      HTML +="<option value='"+data[key]["scatid"]+"'>" + data[key]["scatName"]+"</option>";
                    }}
                  $("#scategory").html(HTML);
                  },
                error:function(data){
                  alert('error');
                  }
                });
              
              }
            });
          });
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#unit').change(function(){
            var catid = $('#unit').val();
              //alert(catid);
            if(catid == 'newUnit')
              {
              $('#newUnit').removeAttr('class','d-none');
              $('#newut').attr('required','required');
              }
            else
              {
              $('#newUnit').attr('class','d-none');
              $('#newut').removeAttr('required','required');
              }
            });
          });
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#import_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
              url:"<?php echo base_url(); ?>Product/excel_import",
              method:"POST",
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                  if (e.lengthComputable) {
                    var percent = Math.round((e.loaded / e.total) * 100);
                    $('#progressBar').css('width', percent + '%').html(percent + '%');
                  }
                });
                return xhr;
              },
              success:function(data){
                  alert('ok');
                $('#file').val('');
                // load_data();
                // alert(data);
                console.log(data);
                $('#templete').remove();
                $('.modal-backdrop').remove();
                window.location.reload();
              }
            });
          });
        });
      </script> 