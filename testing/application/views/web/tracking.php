<?php $this->load->view('web/header/header'); ?>
    <!-- Content Wrapper -->
    <article> 
        <!-- Breadcrumb -->
        <!--<section class="theme-breadcrumb text-center" style="padding-top:40px">                -->
        <!--    <div class="theme-container container ">  -->
        <!--        <div class="row">-->
        <!--            <div class="col-sm-8 pull-left">-->
        <!--                <div class="title-wrap">-->
        <!--                    <h2 class="section-title no-margin"> পণ্য ট্র্যাকিং </h2>-->
        <!--                    <p class="fs-16 no-margin"><b> আপনার পণ্য ট্র্যাক করুন এবং বর্তমান অবস্থা দেখুন </b></p>-->
        <!--                </div>-->
        <!--            </div> -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!-- /.Breadcrumb -->

        <!-- Tracking -->
        <section class="pt-50 pb-120 tracking-wrap">    
            <div class="theme-container container">  
                <div class="row pad-10">
                   <div class="col-md-8 col-md-offset-2 tracking-form wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">     
                        <h2 class="title-1 text-center" style="padding-left: 10%;" > আপনার পণ্য ট্র্যাক করুন এবং বর্তমান অবস্থা রুন </h2>
                        <div class="row">
                            <form action="<?php echo base_url() ?>Tracking" method="get" >
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="parcel" placeholder="পার্সেল আইডি" required class="form-control box-shadow" id="mobile" oninput="omitLeadZero(this.id)" onkeypress="return isNumberKey(event)" >
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <button style="background-color: red;" type="submit" name="search" class="btn-1">ট্র্যাক করুন</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
                <div class="row">
                    <?php if($parcel){ ?>
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group" >
                          <span>Tracking ID</span><br>
                          <strong><?php echo $parcel[0]['parcel_id']; ?></strong>
                        </div>
                      </div>
        
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <?php
                        $d = $this->db->select("regdate")
                                    ->from('delivery_parcel')
                                    ->where('pa_id',$parcel[0]['pa_id'])
                                    ->get()
                                    ->row();
                        ?>
                        <?php
                        $ad = $this->db->select("assign_delivery.regdate,users.empid,users.name")
                                    ->from('assign_delivery')
                                    ->join('users','users.uid = assign_delivery.emp_id','left')
                                    ->where('pa_id',$parcel[0]['pa_id'])
                                    ->get()
                                    ->row();
                        ?>
                        <?php
                        $rh = $this->db->select("regdate")
                                    ->from('return_parcel')
                                    ->where('pa_id',$parcel[0]['pa_id'])
                                    ->get()
                                    ->row();
                        ?>
                        <?php
                        $pr = $this->db->select("regdate")
                                    ->from('receive_parcel')
                                    ->where('pa_id',$parcel[0]['pa_id'])
                                    ->get()
                                    ->row();
                        ?>
                        <?php
                        $pa = $this->db->select("assign_parcel.regdate,users.empid,users.name")
                                    ->from('assign_parcel')
                                    ->join('users','users.uid = assign_parcel.emp_id','left')
                                    ->where('pa_id',$parcel[0]['pa_id'])
                                    ->get()
                                    ->row();
                        ?>
                        
                        
                        
                        
                        
                        
                        <ul class="timeline">
            				<li>
            					<?php if($d){ ?>
                                <div class="form-group" >
                                  <h4>পার্সেল ডেলিভারি সম্পন্ন হয়েছে</h4>
                                  <p><?php echo date('jS F Y h:i A',strtotime($d->regdate)); ?></p>
                                </div>
                                <?php } ?>
            				</li>
            				<li>
            					<?php if($ad){ ?>
                                <div class="form-group vertical-timeline vertical-timeline--one-column" >
                                  <h4>ডেলিভারি এজেন্ট <?php echo $ad->name; ?> ( <?php echo $ad->empid; ?> ) ডেলিভারির জন্যে বের হয়েছে</h4>
                                  <p><?php echo date('jS F Y h:i A',strtotime($ad->regdate)); ?></p>
                                </div>
                                <?php } ?>
            				</li>
            				<li>
            					<?php if($rh){ ?>
                                <div class="form-group" >
                                  <h4>পার্সেলটি Hub এ রিসিভ করা হয়েছে</h4>
                                  <p><?php echo date('jS F Y h:i A',strtotime($rh->regdate)); ?></p>
                                </div>
                                <?php } ?>
            				</li>
            				<li>
            					<?php if($pr){ ?>
                                <div class="form-group" >
                                  <h4>পার্সেল পিকাপ সম্পন্ন হয়েছে</h4>
                                  <p><?php echo date('jS F Y h:i A',strtotime($pr->regdate)); ?></p>
                                </div>
                                <?php } ?>
            				</li>
            				<li>
            					<?php if($pa){ ?>
                                <div class="form-group" >
                                  <h4>পিকাপ এজেন্ট <?php echo $pa->name; ?> ( <?php echo $pa->empid; ?> ) পিকাপ জন্যে বের হয়েছে</h4>
                                  <p><?php echo date('jS F Y h:i A',strtotime($pa->regdate)); ?></p>
                                </div>
                                <?php } else{ ?>
                                  <h4>আপনার পার্সেলটি প্রক্রিয়াধিন</h4>
                                <?php } ?>
            				</li>
            			</ul>
                      </div>
                      
                      
        
                      <div class="col-md-3 col-sm-3 col-xs-12" style="background-color: #e8e6df; padding: 10px;">
                        <div class="form-group" style="text-align: center;" >
                          <h2 class="customer-info">কাস্টমার ও অর্ডারের তথ্য</h2>
                        </div>
                        <div class="form-group" >
                          <span>Parcel ID : </span><br>
                          <strong><?php echo $parcel[0]['parcel_id']; ?></strong>
                        </div>
                        <div class="form-group" >
                          <span>Customer Name : </span><br>
                          <strong><?php echo $parcel[0]['cname']; ?></strong>
                        </div>
                        <div class="form-group" >
                          <span>Area : </span><br>
                          <strong><?php echo $parcel[0]['area']; ?></strong>
                        </div>
                        <div class="form-group" >
                          <span>Placed At : </span><br>
                          <strong><?php echo date('jS F Y h:i A',strtotime($parcel[0]['regdate'])); ?></strong>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <!--<div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> -->
                    <!--    <img alt="" src="<?php echo base_url(); ?>assets/web/img/block/product-1.jpg" />-->
                    <!--</div>-->
                    <!--<div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> -->
                    <!--    <div class="prod-info white-clr">-->
                    <!--        <ul>-->
                    <!--            <li> <span class="title-2">পার্সেল আইড :</span> <span class="fs-16"><?php if($parcel){ ?><?php echo $parcel[0]['pa_id']; ?><?php } ?></span> </li>-->
                    <!--            <li> <span class="title-2">অর্ডারের তারিখ :</span> <span class="fs-16"><?php if($parcel){ ?><?php echo date('d-m-Y',strtotime($parcel[0]['regdate'])); ?><?php } ?></span> </li>-->
                    <!--            <li> <span class="title-2">অর্ডারের অবস্থা :</span> <span class="fs-16 theme-clr"><?php if($parcel){ ?><?php echo $parcel[0]['status']; ?><?php } ?></span> </li>-->
                    <!--            <li> <span class="title-2">ওজন (kg) :</span> <span class="fs-16"><?php if($parcel){ ?><?php echo $parcel[0]['weight'].' KG'; ?><?php } ?></span> </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <!-- <div class="progress-wrap">
                    <div class="progress-status">
                        <span class="border-left"></span>
                        <span class="border-right"></span>
                        <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                        <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s">  <span class="dot dot-center theme-clr-bg"></span> </span>
                        <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s"></span>
                    </div>
                    <div class="row progress-content upper-text">
                        <div class="col-md-3 col-xs-8 col-sm-2">
                            <p class="fs-12 no-margin"> FROM </p>
                            <h2 class="title-1 no-margin">London</h2>
                        </div>
                        <div class="col-md-2 col-xs-8 col-sm-3">
                            <p class="fs-12 no-margin"> [ <b class="black-clr">6 DAYS </b> ] </p>                                
                        </div>
                        <div class="col-md-4 col-xs-8 col-sm-4 text-center">
                            <p class="fs-12 no-margin"> currently in </p>
                            <h2 class="title-1 no-margin">singapore</h2>
                        </div>
                        <div class="col-md-1 col-xs-8 col-sm-1 no-pad">
                            <p class="fs-12 no-margin"> [ <b class="black-clr">2 DAYS </b> ] </p>                                
                        </div>
                        <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                            <p class="fs-12 no-margin"> to </p>
                            <h2 class="title-1 no-margin">dhaka</h2>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- /.Tracking -->

    </article>
    <!-- /.Content Wrapper -->

<?php $this->load->view('web/footer/footer'); ?>

    <script type="text/javascript">
        function omitLeadZero(mobile)
            {   
           var mob = document.getElementById(mobile);
            $(mob).keyup(function(){
                var value = $(this).val();
                value = value.replace(/^(0*)/,"");
            $(this).val(value);
            });
            }
    </script>

    <script type="text/javascript">
        function isNumberKey(evt)
            {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
            }
  </script>