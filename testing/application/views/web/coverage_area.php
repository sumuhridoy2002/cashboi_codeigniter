<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
        <!-- Breadcrumb -->
        <section class="theme-breadcrumb pad-50">                
            <div class="theme-container container ">  
                <div class="row">
                    <div class="title-wrap text-center">
                        <h2 class="section-title no-margin">কভারেজ এলাকা </h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Breadcrumb -->

        <!-- About Us -->
        <section class="pad-50 about-wrap">
            <div class="theme-container container">               
                <div class="row">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#SN.</th>
                  <th>Area</th>
                  <th>Address</th>
                  <th>Post Code</th>
                  <th>District</th>
                  <th>Home Delivery</th>
                  <th>Lockdown</th>
                  <th>Charge(1kg)</th>
                  <th>Charge(2kg)</th>
                  <th>Charge(3kg)</th>
                  <th>Charge(4kg)</th>
                  <th>Charge(5kg)</th>
                  <th>COD Charge (%)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($carea as $value){
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['area']; ?></td>
                  <td><?php echo $value['address']; ?></td>
                  <td><?php echo $value['post_code']; ?></td>
                  <td><?php echo $value['district']; ?></td>
                  <td><?php echo $value['home_delivery']; ?></td>
                  <td><?php echo $value['locdowan']; ?></td>
                  <td><?php echo $value['charge1kg']; ?></td>
                  <td><?php echo $value['charge2kg']; ?></td>
                  <td><?php echo $value['charge3kg']; ?></td>
                  <td><?php echo $value['charge4kg']; ?></td>
                  <td><?php echo $value['charge5kg']; ?></td>
                  <td><?php echo $value['cod']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
                </div>
            </div>
        </section>
    </article>
    <!-- /.Content Wrapper -->

<?php $this->load->view('web/footer/footer'); ?>