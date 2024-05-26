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
                <h3 class="card-title">Product View</h3>
              </div>

              <div class="card-body">
                <div class="row" style="display:flex;align-items:center;">
                   <div class="col-md-4 col-sm-4 col-4">
                    <div class="col-md-12 col-sm-12 col-12" >
                      <?php if($product['image'] == null){ ?>
                      <i class="fa fa-shopping-cart fa-5x" ></i>
                      <?php } else{ ?>
                      <img src="<?php echo base_url('upload/product');?>/<?php echo $product['image']; ?>" style="width: 100%;height: auto;" alt="Product Image" >
                      <?php } ?>
                    </div>    
                  </div>
                  <div class="col-md-8 col-sm-8 col-8">
                      <div class="col-md-12 col-sm-12 col-12 text-center">
                          <h4><b><?php if(isset($product['productName'])){echo $product['productName'];}else{echo '';}?></b></h4>
                          <h6><b>Sale Price: <?php if(isset($product['sprice'])){echo 'BDT '.number_format($product['sprice'], 2);}else{echo '';}?></b></h6>
                          <h6 style="color:blue;"><b> In Stock: 
                              <?php 
                            if(isset($product['productID'])){
                                $stock = $this->pm->get_stock_data($product['productID']);
                                if(isset($stock->totalPices)) {
                                    echo $stock->totalPices;
                                }else{
                                    echo 'Stock out';
                                }    
                            }else{
                                echo '';
                            }
                            ?>
                            <?php 
                              $query = $this->db->select('*')
                                            ->from('sma_units')
                                            ->where('id',$product['unit'])
                                            ->get();
                              $result = $query->row();
                              if($result->unitName) {
                                  echo $result->unitName;
                              } else {
                                  echo '';
                              }
                              ?>
                              
                          </b></h6>
                      </div>
                    <div class="col-md-12 col-sm-12 col-12" style="display: flex;">
                    <div class="col-md-6 col-sm-6 col-12">
                    <table class="table table-striped table-bordered">
                      <tr>
                        <td>Product Code</td>
                        <td><?php if(isset($product['productcode'])){echo $product['productcode'];}else{echo '';}?></td>
                      </tr>
                      <tr>
                        <td>Purchase Price (AVG)</td>
                        <td><?php if(isset($product['pprice'])){echo number_format($product['avg_purchase'], 2);}else{echo '';}?></td>
                      </tr>
                      <tr>
                          <td> Stock Alert Qunatity</td>
                          <td><?php echo $product['alertqty'].' '.$result->unitName?></td>
                      </tr>
                     
                    </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                    <table class="table table-striped table-bordered">
                      
                      <tr>
                        <td>Category Name</td>
                        <td><?php 
                        if(isset($product['categoryID']))
                          {
                          $cat_name = $this->pm->get_category_data($product['categoryID']);
                          if(isset($cat_name->categoryName))
                            {
                            echo $cat_name->categoryName;
                            }
                          else{
                            echo '';
                            }    
                          }
                        else{
                          echo '';
                          }
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Sub-Category</td>
                        <td><?php 
                        if(isset($product['scategory']))
                          {
                          $scat_name = $this->pm->get_sub_category_data($product['scategory']);
                          if(isset($scat_name->scatName))
                            {
                            echo $scat_name->scatName;
                            }
                          else{
                            echo '';
                            }    
                          }
                        else{
                          echo '';
                          }
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Brand Name</td>
                        <td><?php 
                        if(isset($product['brand']))
                          {
                          $cat_name = $this->pm->get_brand_data($product['brand']);
                          if(isset($cat_name->bName))
                            {
                            echo $cat_name->bName;
                            }
                          else{
                            echo '';
                            }    
                          }
                        else{
                          echo '';
                          }
                        ?>
                        </td>
                      </tr>
                      
                      
                    </table>
                    </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <table class="table table-striped table-bordered">
                            <tr>
                          <td><b>Product Description</b></td>
                          <td><?php echo $product['details']?></td>
                      </tr>
                      <tr>
                          <td><b>Product Specification</b></td>
                          <td><?php echo $product['specifict']?></td>
                      </tr>
                        </table>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-12" style="text-align: center;">
                  <a href="<?php echo site_url('Product') ?>" class="btn btn-danger" ><i class="fa fa-arrow-left"></i> Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php $this->load->view('footer/footer'); ?>