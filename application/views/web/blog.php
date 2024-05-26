<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article class="about-page"> 
      <section class="theme-breadcrumb pad-50">                
        <div class="theme-container container ">  
          <div class="row">
            <div class="title-wrap text-center">
              <h2 class="section-title no-margin">ব্লগ তালিকা</h2>
            </div>
          </div>
        </div>
      </section>
        <!-- /.Breadcrumb -->

        <!-- About Us -->
      <section class="pad-20 about-wrap">
        <div class="theme-container container">               
          <div class="row">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="width: 3%;">#SN.</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th style="width: 7%;">View</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($contact as $value){
                $i++;
                ?>
                <tr>
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