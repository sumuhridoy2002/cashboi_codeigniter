<?php $this->load->view('header/header'); ?>
<?php $this->load->view('navbar/navbar'); ?>

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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Product</h3>
              </div>

              <div class="card-body">
                <?php if($product['type'] == 'product') { ?>
                <form method="POST" action="<?php echo base_url() ?>Product/update_product" enctype="multipart/form-data" >
                  <div class="row">
                    <input type="hidden" class="form-control" name="productid" value="<?php echo $product['productID']; ?>" >
                    
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Product Name *</label>
                      <input type="text" class="form-control" name="productName" value="<?php echo $product['productName']; ?>" required >
                    </div>
                    
                    
                    <!--<div class="form-group col-md-6 col-sm-6 col-12">-->
                    <!--  <label>Category *</label> <br>-->
                    <!--  <select name="categoryID" style="width:100%;" id="categoryID" class="form-control select2"  >-->
                    <!--    <option value="">Select One</option>-->
                    <!--    <?php foreach($category as $value) { ?>-->
                    <!--    <option value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>-->
                    <!--    <?php } ?>-->
                    <!--    <option value="newCategory">New Category</option>-->
                    <!--  </select>-->
                    <!--</div>-->
                    
                    
                    
                    
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Product Code</label>
                      <input type="text" class="form-control" name="productcode" value="<?php echo $product['productcode']; ?>" readonly >
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Select Category *</label>
                      <select name="categoryID" class="form-control select2"  required >
                        <option value="">Select One</option>
                        <?php foreach($category as $value) { ?>
                        <option <?php echo ($product['categoryID'] == $value['categoryID'])?'selected':''?> value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <?php if($product['type'] == 'product') { ?>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Select Sub Category</label>
                        <select class="form-control select2" name="scategory" id="scategory" >
                          <option value="">Select One</option>
                          <?php foreach($subcategory as $value) { ?>
                          <option <?php echo ($product['scategory'] == $value['scatid'])?'selected':''?> value="<?php echo $value['scatid']; ?>"><?php echo $value['scatName']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>


                    <?php if($product['type'] == 'product') { ?>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Select Brand </label>
                        <select name="brand" class="form-control select2" >
                          <option value="">Select One</option>
                          <?php foreach($brand as $value) { ?>
                          <option <?php echo ($product['brand'] == $value['brid'])?'selected':''?> value="<?php echo $value['brid']; ?>"><?php echo $value['bName']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>

                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Select Unit *</label>
                      <select name="units" class="form-control select2" required >
                        <option value="">Select One</option>
                        <?php foreach($unit as $value) { ?>
                        <option <?php echo ($product['unit'] == $value->id)?'selected':''?> value="<?php echo $value->id; ?>"><?php echo $value->unitName; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <?php if($product['type'] == 'product') { ?>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Purchase Price *</label>
                        <input type="text" class="form-control" name="pprice" value="<?php echo $product['pprice']; ?>" required >
                      </div>
                    <?php } ?>

                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Sale Price *</label>
                      <input type="text" class="form-control" name="sprice" value="<?php echo $product['sprice']; ?>" required >
                    </div>
                    
                    <!--<div class="form-group col-md-4 col-sm-4 col-12">-->
                    <!--  <label>Whole Sale Price *</label>-->
                    <!--  <input type="text" class="form-control" name="wprice" value="<?php echo $product['wprice']; ?>" required >-->
                    <!--</div>-->
                    
                    <?php if($product['type'] == 'product') { ?>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Alert Qunatity</label>
                        <input type="text" class="form-control" name="alertqty" value="<?php echo $product['alertqty']; ?>">
                      </div>
                      <div class="form-group col-md-4 col-sm-4 col-12">
                        <label>Show Font Page *</label>
                        <div>
                          <?php if($product['spstatus'] == 1){ ?>
                          <input type="radio" name="spstatus" value="1" required checked >&nbsp;&nbsp;Yes&nbsp;&nbsp;
                          <input type="radio" name="spstatus" value="2" required >&nbsp;&nbsp;No
                          <?php } else{ ?>
                          <input type="radio" name="spstatus" value="1" required >&nbsp;&nbsp;Yes&nbsp;&nbsp;
                          <input type="radio" name="spstatus" value="2" required checked >&nbsp;&nbsp;No
                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                        <label>Product Image</label>
                        <div class="custom-file">
                            <input type="file" name="userfile" class="custom-file-input" id="customImg" onchange="loadFile(event)">
                            <label class="custom-file-label" for="customImg">Product Image <span style="color:gray;">(Optional)</span></label>
                        </div>
                        <div id="imagePreviewContainer">
                            <?php if ($product['image']) { ?>
                                <img src="<?php echo base_url('upload/product'); ?>/<?php echo $product['image']; ?>" width="100px">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>Product Description</label>
                        <textarea type="text" class="form-control" name="details" id="editor" rows="5" placeholder="Description" ><?php echo $product['details']; ?></textarea>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>Product Specification</label>
                        <textarea type="text" class="form-control" name="specification" id="ckeditor" rows="5" placeholder="Specification" ><?php echo $product['specifict']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px;">
                    <div class="col-md-9 col-md-offset-4">  
                      <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Update</button>
                      <a href="<?php echo site_url('Product') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                  </div>
                  </form>
                  <?php } else {?>

                  <form method="POST" action="<?php echo base_url() ?>Product/update_service" enctype="multipart/form-data" >
                  <div class="row">
                    <input type="hidden" class="form-control" name="productid" value="<?php echo $product['productID']; ?>" >
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Product Name *</label>
                      <input type="text" class="form-control" name="productName" value="<?php echo $product['productName']; ?>" required >
                    </div>
                    
                     <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Service Charge *</label>
                      <input type="text" class="form-control" name="sprice" value="<?php echo $product['sprice']; ?>" required >
                    </div>
                    
                    
                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Product Code</label>
                      <input type="text" class="form-control" name="productcode" value="<?php echo $product['productcode']; ?>" readonly >
                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Select Category *</label>
                      <select name="categoryID" class="form-control select2"  required >
                        <option value="">Select One</option>
                        <?php foreach($category as $value) { ?>
                        <option <?php echo ($product['categoryID'] == $value['categoryID'])?'selected':''?> value="<?php echo $value['categoryID']; ?>"><?php echo $value['categoryName']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-4 col-12">
                      <label>Select Unit *</label>
                      <select name="units" class="form-control select2" required >
                        <option value="">Select One</option>
                        <?php foreach($unit as $value) { ?>
                        <option <?php echo ($product['unit'] == $value->id)?'selected':''?> value="<?php echo $value->id; ?>"><?php echo $value->unitName; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                  
                    
                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                        <label>Product Image</label>
                        <div class="custom-file">
                            <input type="file" name="userfile" class="custom-file-input" id="customImg" onchange="loadFile(event)">
                            <label class="custom-file-label" for="customImg">Product Image <span style="color:gray;">(Optional)</span></label>
                        </div>
                        <div id="imagePreviewContainer">
                            <?php if ($product['image']) { ?>
                                <img src="<?php echo base_url('upload/product'); ?>/<?php echo $product['image']; ?>" width="100px">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>Product Description</label>
                        <textarea type="text" class="form-control" name="details" id="editor" rows="5" placeholder="Description" ><?php echo $product['details']; ?></textarea>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-12">
                        <label>Product Specification</label>
                        <textarea type="text" class="form-control" name="specification" id="ckeditor" rows="5" placeholder="Specification" ><?php echo $product['specifict']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-12" style="text-align: center; margin-top: 20px;">
                    <div class="col-md-9 col-md-offset-4">  
                      <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Update</button>
                      <a href="<?php echo site_url('Product') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('footer/footer'); ?>
<script>
    function loadFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var imagePreviewContainer = document.getElementById('imagePreviewContainer');
            var existingImage = imagePreviewContainer.querySelector('img');
            if (existingImage) {
                existingImage.src = reader.result;
            } else {
                var imgElement = document.createElement('img');
                imgElement.src = reader.result;
                imgElement.style.width = '100px';
                imagePreviewContainer.appendChild(imgElement);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#category').change(function(){
            var id = $('#category').val();
            var url = "<?php echo base_url(); ?>Product/get_subcategory_data";
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
            });
          });
      </script>